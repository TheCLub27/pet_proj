<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m231010_182009_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'user_id' => $this->primaryKey(),
            'username' => $this->string(256),
            'first_name' => $this->string(256),
            'last_name' => $this->string(256),
            'email' => $this->string(256),
            'password' => $this->string(256),
            'authKey' => $this->string(256)->null(),
            'is_admin' => $this->integer()->defaultValue(0),
            'created_at' => $this->timestamp(),
            'updated' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
