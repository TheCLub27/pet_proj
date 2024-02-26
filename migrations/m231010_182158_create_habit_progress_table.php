<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%habit_progress}}`.
 */
class m231010_182158_create_habit_progress_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%habit_progress}}', [
            'progress_id' => $this->primaryKey(),
            'user_habit_id' => $this->integer(),
            'date' => $this->timestamp(),
            'status' => $this->string(256),
        ]);

        $this->addForeignKey(
            'user_habit_id',
            'habit_progress',
            'user_habit_id',
            'user_habits',
            'user_habit_id',
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('user_habit_id', 'habit_progress');

        $this->dropTable('{{%habit_progress}}');

    }
}
