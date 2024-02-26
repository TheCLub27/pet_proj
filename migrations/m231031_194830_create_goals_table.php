<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goals}}`.
 */
class m231031_194830_create_goals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goals}}', [
            'goal_id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'goal_name' => $this->string(256),
            'description' => $this->string(256),
            'status' => $this->string(256),
            'start_date' => $this->timestamp(),
            'end_date' => $this->timestamp(),
        ]);

        $this->addForeignKey(
            'user_id',
            'goals',
            'user_id',
            'users',
            'user_id',
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('user_id', 'goals');
        
        $this->dropTable('{{%goals}}');

    }
}
