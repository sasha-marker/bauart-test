<?php

use yii\db\Migration;

/**
 * Class m190127_175705_create_junction_table_for_railway_carriage_and_railway_carriage_data
 */
class m190127_175705_create_junction_table_for_railway_carriage_and_railway_carriage_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->createTable('{{%junction_railway_carriage_data}}', [
           'railway_carriage_id' => $this->integer(),
           'railway_carriage_data_id' => $this->integer(),
           'PRIMARY KEY(railway_carriage_id, railway_carriage_data_id)',
       ]);

       $this->createIndex(
           'idx-junction_railway_carriage_data-railway_carriage_id',
           '{{%junction_railway_carriage_data}}',
           'railway_carriage_id'
       );

       $this->addForeignKey(
           'fk-junction_railway_carriage_data-railway_carriage_id',
           '{{%junction_railway_carriage_data}}',
           'railway_carriage_id',
           '{{%railway_carriage}}',
           'id'
       );

       $this->createIndex(
           'idx-junction_railway_carriage_data-railway_carriage_data_id',
           '{{%junction_railway_carriage_data}}',
           'railway_carriage_data_id'
       );

       $this->addForeignKey(
           'fk-junction_railway_carriage_data-railway_carriage_data_id',
           '{{%junction_railway_carriage_data}}',
           'railway_carriage_data_id',
           '{{%railway_carriage_data}}',
           'id'
       );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%junction_railway_carriage_data}}');
    }

}
