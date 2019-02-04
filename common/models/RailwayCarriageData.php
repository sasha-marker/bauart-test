<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii2_railway_carriage_data".
 *
 * @property int $id
 * @property string $msr_date
 * @property int $msr_date_int
 * @property int $wagnum
 * @property int $tms_code
 * @property string $tms_select_name
 * @property string $tms_start_st_code
 * @property string $tms_end_st_code
 * @property double $axl1_l_w_flange
 * @property double $axl1_r_w_flange
 * @property double $axl2_l_w_flange
 * @property double $axl2_r_w_flange
 * @property double $axl3_l_w_flange
 * @property double $axl3_r_w_flange
 * @property double $axl4_l_w_flange
 * @property double $axl4_r_w_flange
 * @property double $axl5_l_w_flange
 * @property double $axl5_r_w_flange
 * @property double $axl6_l_w_flange
 * @property double $axl6_r_w_flange
 * @property double $axl7_l_w_flange
 * @property double $axl7_r_w_flange
 * @property double $axl8_l_w_flange
 * @property double $axl8_r_w_flange
 * @property double $axl1_l_w_rim
 * @property double $axl1_r_w_rim
 * @property double $axl2_l_w_rim
 * @property double $axl2_r_w_rim
 * @property double $axl3_l_w_rim
 * @property double $axl3_r_w_rim
 * @property double $axl4_l_w_rim
 * @property double $axl4_r_w_rim
 * @property double $axl5_l_w_rim
 * @property double $axl5_r_w_rim
 * @property double $axl6_l_w_rim
 * @property double $axl6_r_w_rim
 * @property double $axl7_l_w_rim
 * @property double $axl7_r_w_rim
 * @property double $axl8_l_w_rim
 * @property double $axl8_r_w_rim
 * @property int $created_at
 * @property int $updated_at
 *
 * @property JunctionRailwayCarriageData[] $junctionRailwayCarriageDatas
 * @property RailwayCarriage[] $railwayCarriages
 */
class RailwayCarriageData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii2_railway_carriage_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['msr_date', 'msr_date_int', 'wagnum', 'tms_code', 'tms_select_name', 'tms_start_st_code', 'tms_end_st_code', 'axl1_l_w_flange', 'axl1_r_w_flange', 'axl2_l_w_flange', 'axl2_r_w_flange', 'axl3_l_w_flange', 'axl3_r_w_flange', 'axl4_l_w_flange', 'axl4_r_w_flange', 'axl5_l_w_flange', 'axl5_r_w_flange', 'axl6_l_w_flange', 'axl6_r_w_flange', 'axl7_l_w_flange', 'axl7_r_w_flange', 'axl8_l_w_flange', 'axl8_r_w_flange', 'axl1_l_w_rim', 'axl1_r_w_rim', 'axl2_l_w_rim', 'axl2_r_w_rim', 'axl3_l_w_rim', 'axl3_r_w_rim', 'axl4_l_w_rim', 'axl4_r_w_rim', 'axl5_l_w_rim', 'axl5_r_w_rim', 'axl6_l_w_rim', 'axl6_r_w_rim', 'axl7_l_w_rim', 'axl7_r_w_rim', 'axl8_l_w_rim', 'axl8_r_w_rim'], 'required'],
            [['msr_date_int', 'wagnum', 'tms_code', 'created_at', 'updated_at'], 'integer'],
            [['axl1_l_w_flange', 'axl1_r_w_flange', 'axl2_l_w_flange', 'axl2_r_w_flange', 'axl3_l_w_flange', 'axl3_r_w_flange', 'axl4_l_w_flange', 'axl4_r_w_flange', 'axl5_l_w_flange', 'axl5_r_w_flange', 'axl6_l_w_flange', 'axl6_r_w_flange', 'axl7_l_w_flange', 'axl7_r_w_flange', 'axl8_l_w_flange', 'axl8_r_w_flange', 'axl1_l_w_rim', 'axl1_r_w_rim', 'axl2_l_w_rim', 'axl2_r_w_rim', 'axl3_l_w_rim', 'axl3_r_w_rim', 'axl4_l_w_rim', 'axl4_r_w_rim', 'axl5_l_w_rim', 'axl5_r_w_rim', 'axl6_l_w_rim', 'axl6_r_w_rim', 'axl7_l_w_rim', 'axl7_r_w_rim', 'axl8_l_w_rim', 'axl8_r_w_rim'], 'number'],
            [['msr_date'], 'string', 'max' => 255],
            [['tms_select_name'], 'string', 'max' => 128],
            [['tms_start_st_code', 'tms_end_st_code'], 'string', 'max' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'msr_date' => 'Msr Date',
            'msr_date_int' => 'Msr Date Int',
            'wagnum' => 'Wagnum',
            'tms_code' => 'Tms Code',
            'tms_select_name' => 'Tms Select Name',
            'tms_start_st_code' => 'Tms Start St Code',
            'tms_end_st_code' => 'Tms End St Code',
            'axl1_l_w_flange' => 'Axl1 L W Flange',
            'axl1_r_w_flange' => 'Axl1 R W Flange',
            'axl2_l_w_flange' => 'Axl2 L W Flange',
            'axl2_r_w_flange' => 'Axl2 R W Flange',
            'axl3_l_w_flange' => 'Axl3 L W Flange',
            'axl3_r_w_flange' => 'Axl3 R W Flange',
            'axl4_l_w_flange' => 'Axl4 L W Flange',
            'axl4_r_w_flange' => 'Axl4 R W Flange',
            'axl5_l_w_flange' => 'Axl5 L W Flange',
            'axl5_r_w_flange' => 'Axl5 R W Flange',
            'axl6_l_w_flange' => 'Axl6 L W Flange',
            'axl6_r_w_flange' => 'Axl6 R W Flange',
            'axl7_l_w_flange' => 'Axl7 L W Flange',
            'axl7_r_w_flange' => 'Axl7 R W Flange',
            'axl8_l_w_flange' => 'Axl8 L W Flange',
            'axl8_r_w_flange' => 'Axl8 R W Flange',
            'axl1_l_w_rim' => 'Axl1 L W Rim',
            'axl1_r_w_rim' => 'Axl1 R W Rim',
            'axl2_l_w_rim' => 'Axl2 L W Rim',
            'axl2_r_w_rim' => 'Axl2 R W Rim',
            'axl3_l_w_rim' => 'Axl3 L W Rim',
            'axl3_r_w_rim' => 'Axl3 R W Rim',
            'axl4_l_w_rim' => 'Axl4 L W Rim',
            'axl4_r_w_rim' => 'Axl4 R W Rim',
            'axl5_l_w_rim' => 'Axl5 L W Rim',
            'axl5_r_w_rim' => 'Axl5 R W Rim',
            'axl6_l_w_rim' => 'Axl6 L W Rim',
            'axl6_r_w_rim' => 'Axl6 R W Rim',
            'axl7_l_w_rim' => 'Axl7 L W Rim',
            'axl7_r_w_rim' => 'Axl7 R W Rim',
            'axl8_l_w_rim' => 'Axl8 L W Rim',
            'axl8_r_w_rim' => 'Axl8 R W Rim',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJunctionRailwayCarriageDatas()
    {
        return $this->hasMany(JunctionRailwayCarriageData::className(), ['railway_carriage_data_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRailwayCarriages()
    {
        return $this->hasMany(RailwayCarriage::className(), ['id' => 'railway_carriage_id'])->viaTable('yii2_junction_railway_carriage_data', ['railway_carriage_data_id' => 'id']);
    }
}
