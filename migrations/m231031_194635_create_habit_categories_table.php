<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%habit_categories}}`.
 */
class m231031_194635_create_habit_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%habit_categories}}', [
            'category_id' => $this->primaryKey(),
            'category_name' => $this->string(256),
            'description' => $this->string(256),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%habit_categories}}');
    }
}
