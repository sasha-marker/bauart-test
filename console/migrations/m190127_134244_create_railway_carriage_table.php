<?php

use yii\db\Migration;

/**
 * Class m190127_134244_create_railway_carriage_tabel
 */
class m190127_134244_create_railway_carriage_table extends Migration
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

        $this->createTable('{{%railway_carriage}}', [
          'id' => $this->primaryKey(),
          'railway_carriage_number' => $this->integer(8)->notNull(),
          'created_at' => $this->integer(),
          'updated_at' => $this->integer()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%railway_carriage}}');
    }

}
