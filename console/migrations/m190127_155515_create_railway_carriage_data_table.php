<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%railway_carriage}}`.
 */
class m190127_155515_create_railway_carriage_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%railway_carriage_data}}', [
            'id' => $this->primaryKey(),
            'msr_date' => $this->string()->notNull(),
            'msr_date_int' => $this->integer()->notNull(),
            'wagnum' => $this->integer(6)->notNull(),
            'tms_code' => $this->integer(4)->notNull(),
            'tms_select_name' => $this->string(128)->notNull(),
            'tms_start_st_code' => $this->string(6)->notNull(),
            'tms_end_st_code' => $this->string(6)->notNull(),
            'axl1_l_w_flange' => $this->double()->notNull(),
            'axl1_r_w_flange' => $this->double()->notNull(),
            'axl2_l_w_flange' => $this->double()->notNull(),
            'axl2_r_w_flange' => $this->double()->notNull(),
            'axl3_l_w_flange' => $this->double()->notNull(),
            'axl3_r_w_flange' => $this->double()->notNull(),
            'axl4_l_w_flange' => $this->double()->notNull(),
            'axl4_r_w_flange' => $this->double()->notNull(),
            'axl5_l_w_flange' => $this->double()->notNull(),
            'axl5_r_w_flange' => $this->double()->notNull(),
            'axl6_l_w_flange' => $this->double()->notNull(),
            'axl6_r_w_flange' => $this->double()->notNull(),
            'axl7_l_w_flange' => $this->double()->notNull(),
            'axl7_r_w_flange' => $this->double()->notNull(),
            'axl8_l_w_flange' => $this->double()->notNull(),
            'axl8_r_w_flange' => $this->double()->notNull(),
            'axl1_l_w_rim' => $this->double()->notNull(),
            'axl1_r_w_rim' => $this->double()->notNull(),
            'axl2_l_w_rim' => $this->double()->notNull(),
            'axl2_r_w_rim' => $this->double()->notNull(),
            'axl3_l_w_rim' => $this->double()->notNull(),
            'axl3_r_w_rim' => $this->double()->notNull(),
            'axl4_l_w_rim' => $this->double()->notNull(),
            'axl4_r_w_rim' => $this->double()->notNull(),
            'axl5_l_w_rim' => $this->double()->notNull(),
            'axl5_r_w_rim' => $this->double()->notNull(),
            'axl6_l_w_rim' => $this->double()->notNull(),
            'axl6_r_w_rim' => $this->double()->notNull(),
            'axl7_l_w_rim' => $this->double()->notNull(),
            'axl7_r_w_rim' => $this->double()->notNull(),
            'axl8_l_w_rim' => $this->double()->notNull(),
            'axl8_r_w_rim' => $this->double()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%railway_carriage_data}}');
    }
}
