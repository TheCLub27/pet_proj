<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notifications}}`.
 */
class m231031_194743_create_notifications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notifications}}', [
            'notification_id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'message' => $this->string(256),
            'status' => $this->string(256),
            'date_time' => $this->timestamp(),
        ]);

        $this->addForeignKey(
            'user_id',
            'notifications',
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
        $this->dropForeignKey('user_id', 'notifications');
        
        $this->dropTable('{{%notifications}}');
    }
}
