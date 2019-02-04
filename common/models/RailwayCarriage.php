<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii2_railway_carriage".
 *
 * @property int $id
 * @property int $railway_carriage_number
 * @property int $created_at
 * @property int $updated_at
 *
 * @property RailwayCarriageAttachment[] $railwayCarriageAttachments
 * @property Attachment[] $attachments
 */
class RailwayCarriage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii2_railway_carriage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['railway_carriage_number'], 'required'],
            [['railway_carriage_number', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'railway_carriage_number' => 'Railway Carriage Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRailwayCarriageAttachments()
    {
        return $this->hasMany(RailwayCarriageAttachment::className(), ['railway_carriage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachments()
    {
        return $this->hasMany(Attachment::className(), ['id' => 'attachment_id'])->viaTable('yii2_railway_carriage_attachment', ['railway_carriage_id' => 'id']);
    }
}
