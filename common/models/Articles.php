<?php

namespace common\models;

use Yii;
use yii\behaviors\{TimestampBehavior};

/**
 * This is the model class for table "yii2_article".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $created_at
 * @property int $updated_at
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    public function behaviors()
    {
        return [
          TimestampBehavior::className()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'text' => 'Анонс',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
