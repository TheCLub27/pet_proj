<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%habits}}`.
 */
class m231010_182052_create_habits_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%habits}}', [
            'habit_id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'habit_name' => $this->string(256),
            'description' => $this->string(256),
            'recommended_time' => $this->timestamp(),
        ]);

        $this->addForeignKey(
            'category_id',
            'habits',
            'category_id',
            'habit_categories',
            'category_id',
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('category_id', 'habits');
        
        $this->dropTable('{{%habits}}');

    }
}
