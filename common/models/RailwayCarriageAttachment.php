<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii2_railway_carriage_attachment".
 *
 * @property int $railway_carriage_id
 * @property int $attachment_id
 *
 * @property Attachment $attachment
 * @property RailwayCarriage $railwayCarriage
 */
class RailwayCarriageAttachment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii2_railway_carriage_attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['railway_carriage_id', 'attachment_id'], 'required'],
            [['railway_carriage_id', 'attachment_id'], 'integer'],
            [['railway_carriage_id', 'attachment_id'], 'unique', 'targetAttribute' => ['railway_carriage_id', 'attachment_id']],
            [['attachment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attachment::className(), 'targetAttribute' => ['attachment_id' => 'id']],
            [['railway_carriage_id'], 'exist', 'skipOnError' => true, 'targetClass' => RailwayCarriage::className(), 'targetAttribute' => ['railway_carriage_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'railway_carriage_id' => 'Railway Carriage ID',
            'attachment_id' => 'Attachment ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachment()
    {
        return $this->hasOne(Attachment::className(), ['id' => 'attachment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRailwayCarriage()
    {
        return $this->hasOne(RailwayCarriage::className(), ['id' => 'railway_carriage_id']);
    }
}
