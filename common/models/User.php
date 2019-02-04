<?php

namespace common\models;

use Yii;
use frontend\modules\profile\helpers\UploadHelper;
use Symfony\Component\Console\Exception\LogicException;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const MALE = 1;
    const FEMAIL = 0;

    public $password;
    public $password_confirm;
    public $role;
    public $roles = ['user', 'administrator'];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'status', 'sex'], 'required'],
            [['created_at', 'updated_at', 'sex'], 'integer'],
            [['firstname', 'lastname'], 'string', 'max' => 64],
            [['password_hash'], 'string'],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'string', 'min' => 3, 'max' => 16],
            [
                'username', 'unique',
                'targetClass' => '\common\models\User',
                'message' => 'User with such login already exists.'
            ],
            [['email'], 'string'],
            ['email', 'email', 'message' => 'Invalid e-mail entered.'],
            [['phone'], 'string', 'min' => 6],
            ['phone', 'validatePhone'],
            [
                'phone', 'unique',
                'targetClass' => '\common\models\User',
                'message' => 'User with such phone already exists.'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'phone' => 'Телефон'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    // public function setPasswordRegister($password){}

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getUsername()
    {
        return str_replace(['+', ' ', '_', '-', '(', ')'], '', $this->username);
    }

    public function getPhone()
    {
        return str_replace(['+', ' ', '_', '-', '(', ')'], '', $this->phone);
    }

    public static function getRole()
    {
        $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id);

        $_roles = [];

        foreach ($roles as $key => $role) {
            $_roles[] = $role->name;
        }

        return isset($_roles[0]) ? $_roles[0] : null;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($this->role) {

            $auth = Yii::$app->authManager;
            $role = $auth->getRole($this->role);
            if ($role) {
                $auth->revokeAll($this->id);
                $auth->assign($role, $this->id);
            }
        }
    }

    public function validatePhone()
    {
        if (mb_strlen($this->getPhone()) < 11) {
            $this->addError('phone', 'Phone must contain 11 characters');
        }
    }

}
