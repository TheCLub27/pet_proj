<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $user_id
 * @property string|null $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $authKey
 * @property int|null $is_admin
 * @property string|null $created_at
 * @property string|null $updated
 *
 * @property Goals[] $goals
 * @property Notifications[] $notifications
 * @property UserHabits[] $userHabits
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_admin'], 'default', 'value' => null],
            [['is_admin'], 'integer'],
            [['created_at', 'updated'], 'safe'],
            [['username', 'first_name', 'last_name', 'email', 'password', 'authKey'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'is_admin' => 'Is Admin',
            'created_at' => 'Created At',
            'updated' => 'Updated',
        ];
    }

    public static function findIdentity($user_id){
        return Users::findOne($user_id);
    }
//_____________________________________________________________________
    public static function findIdentityByAccessToken($token, $type = null)
    {
       
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
//_____________________________________________________________________


    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username){
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function HashPassword($password){
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**________________________________________________________________________
     * Gets query for [[Goals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGoals()
    {
        return $this->hasMany(Goals::class, ['user_id' => 'user_id']);
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::class, ['user_id' => 'user_id']);
    }

    /**
     * Gets query for [[UserHabits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserHabits()
    {
        return $this->hasMany(UserHabits::class, ['user_id' => 'user_id']);
    }
}
