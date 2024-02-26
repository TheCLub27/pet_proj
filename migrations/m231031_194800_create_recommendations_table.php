<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recommendations}}`.
 */
class m231031_194800_create_recommendations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recommendations}}', [
            'recommendation_id' => $this->primaryKey(),
            'habit_id' => $this->integer(),
            'priority_level' => $this->string(256),
            'description' => $this->string(256),
        ]);

        $this->addForeignKey(
            'habit_id',
            'recommendations',
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
        $this->dropForeignKey('habit_id', 'recommendations');

        $this->dropTable('{{%recommendations}}');

    }
}
