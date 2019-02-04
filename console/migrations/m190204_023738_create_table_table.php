<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%table}}`.
 */
class m190204_023738_create_table_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%table}}', [
            'id' => $this->primaryKey(),
            'json' => $this->json(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%table}}');
    }
}
