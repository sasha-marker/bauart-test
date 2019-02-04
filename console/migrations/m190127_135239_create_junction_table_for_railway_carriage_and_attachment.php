<?php

use yii\db\Migration;

/**
 * Class m190127_135239_create_junction_table_for_railway_carriage_and_attachment
 */
class m190127_135239_create_junction_table_for_railway_carriage_and_attachment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%railway_carriage_attachment}}', [
             'railway_carriage_id' => $this->integer(),
             'attachment_id' => $this->integer(),
             'PRIMARY KEY(railway_carriage_id, attachment_id)',
         ]);

         $this->createIndex(
             'idx-railway_carriage_attachment-railway_carriage_id',
             '{{%railway_carriage_attachment}}',
             'railway_carriage_id'
         );

         $this->addForeignKey(
             'fk-railway_carriage_attachment-railway_carriage_id',
             '{{%railway_carriage_attachment}}',
             'railway_carriage_id',
             '{{%railway_carriage}}',
             'id'
         );

         $this->createIndex(
             'idx-railway_carriage_attachment-attachment_id',
             '{{%railway_carriage_attachment}}',
             'attachment_id'
         );

         $this->addForeignKey(
             'fk-railway_carriage_attachment-attachment_id',
             '{{%railway_carriage_attachment}}',
             'attachment_id',
             '{{%attachment}}',
             'id'
         );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%railway_carriage_attachment}}');
    }

}
