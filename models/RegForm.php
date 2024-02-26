<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read Users|null $users
 *
 */
class RegForm extends Model
{
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $email;
    public $password_repeat;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'first_name', 'last_name', 'email', 'password'], 'required'],
            ['username', 'unique', 'targetClass'=> '/app/models/Users', 'message' => 'Пользователь с таким именем аккаунта уже существует'],
            ['email', 'unique', 'targetClass'=> '/app/models/Users', 'message' => 'Аккаунт с такой электронной почтой уже существует'],
            ['email', 'email'],
            ['password', 'string', 'min'=> 6],
            ['password_repeat', 'string', 'min'=> 6],
            ['password_repeat', 'compare', 'compareAttribute'=> 'password'],
        ];
    }

   public function register(){
        if($this->validate()){
            return null;
        }
        $user = new Users();
        $user->username = $this->username;
        $user->HashPassword($this->password);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        
        return $user->save() ? $user : null;
   }
}
