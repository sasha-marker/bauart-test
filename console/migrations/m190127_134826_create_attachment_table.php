<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%attachment}}`.
 */
class m190127_134826_create_attachment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ($this->db->driverName === 'mysql') {
              // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }
          $this->createTable('{{%attachment}}', [
            'id' => $this->primaryKey(),
            'filename'=>$this->string()->notNull(),
            'extension'=>$this->string()->notNull(),
            'mime_type'=>$this->string()->notNull(),
            'size'=>$this->string()->notNull(),
            'duration'=>$this->integer()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
          ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%attachment}}');
    }
}
