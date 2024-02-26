<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_habits}}`.
 */
class m231010_182121_create_user_habits_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_habits}}', [
            'user_habit_id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'habit_id' => $this->integer(),
            'start_date' => $this->timestamp(),
        ]);

        $this->addForeignKey(
            'user_id',
            'user_habits',
            'user_id',
            'users',
            'user_id',
        );

        $this->addForeignKey(
            'habit_id',
            'user_habits',
            'habit_id',
            'habits',
            'habit_id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('user_id', 'user_habits');
        $this->dropForeignKey('habit_id', 'user_habits');

        $this->dropTable('{{%user_habits}}');

    }
}
