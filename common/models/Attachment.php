<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "yii2_attachment".
 *
 * @property int $id
 * @property string $filename
 * @property string $extension
 * @property string $mime_type
 * @property string $size
 * @property int $duration
 * @property int $created_at
 * @property int $updated_at
 *
 * @property RailwayCarriageAttachment[] $railwayCarriageAttachments
 * @property RailwayCarriage[] $railwayCarriages
 */
class Attachment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%attachment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename', 'extension', 'mime_type', 'size', 'duration'], 'required'],
            [['duration', 'created_at', 'updated_at'], 'integer'],
            [['filename', 'extension', 'mime_type', 'size'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'extension' => 'extension',
            'mime_type' => 'Mime Type',
            'size' => 'Size',
            'duration' => 'Duration',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRailwayCarriageAttachments()
    {
        return $this->hasMany(RailwayCarriageAttachment::className(), ['attachment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRailwayCarriages()
    {
        return $this->hasMany(RailwayCarriage::className(), ['id' => 'railway_carriage_id'])->viaTable('yii2_railway_carriage_attachment', ['attachment_id' => 'id']);
    }
}
