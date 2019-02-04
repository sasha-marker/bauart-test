<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii2_junction_railway_carriage_data".
 *
 * @property int $railway_carriage_id
 * @property int $railway_carriage_data_id
 *
 * @property RailwayCarriageData $railwayCarriageData
 * @property RailwayCarriage $railwayCarriage
 */
class JunctionRailwayCarriageData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii2_junction_railway_carriage_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['railway_carriage_id', 'railway_carriage_data_id'], 'required'],
            [['railway_carriage_id', 'railway_carriage_data_id'], 'integer'],
            [['railway_carriage_id', 'railway_carriage_data_id'], 'unique', 'targetAttribute' => ['railway_carriage_id', 'railway_carriage_data_id']],
            [['railway_carriage_data_id'], 'exist', 'skipOnError' => true, 'targetClass' => RailwayCarriageData::className(), 'targetAttribute' => ['railway_carriage_data_id' => 'id']],
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
            'railway_carriage_data_id' => 'Railway Carriage Data ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRailwayCarriageData()
    {
        return $this->hasOne(RailwayCarriageData::className(), ['id' => 'railway_carriage_data_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRailwayCarriage()
    {
        return $this->hasOne(RailwayCarriage::className(), ['id' => 'railway_carriage_id']);
    }
}
