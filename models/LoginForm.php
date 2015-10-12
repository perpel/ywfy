<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Personnel;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = false;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */

 //登陆  
    public function login()  
    {  
        if ($this->validate())  
            return Yii::$app->user->login($this->getUser(), 3600*24*30);  
        else  
            return false;  
    }  


//判断账号密码是否正确  
    public function validatePassword($attribute, $params)  
    {  
        if (!$this->hasErrors())   
        {  
            $user = $this->getUser();  
              
            if (!$user)  
            {  
                $this->addError($attribute, '账号或密码不正确');  
            }  
              
        }  
    }  



//根据邮箱和密码查询数据库  
    public function getUser()  
    {  
        if ($this->_user === false)  
        {  
            $this->_user = Personnel::find()->where(['Number'=>$this->username,'Password'=>$this->password])->one();  
        }  
        return $this->_user;  
    }  
      
}