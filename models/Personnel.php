<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%personnel}}".
 *
 * @property integer $ID
 * @property string $Number
 * @property string $Password
 * @property string $LastOnlineTime
 * @property string $Name
 * @property string $IDNumber
 * @property integer $Sex
 * @property string $Position
 * @property string $DepartmentNumber
 * @property string $Address
 * @property string $CellNumber
 * @property string $TelNumber
 * @property string $Education
 * @property string $Remarks
 * @property string $TranVersion
 * @property string $AccessToken
 * @property string $AuthKey
 * @property string $CreateTime
 */
class Personnel extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%personnel}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Number', 'DepartmentNumber'], 'required'],
            [['Sex'], 'integer'],
            [['LastOnlineTime', 'CreateTime'], 'safe'],
            [['Number', 'Password', 'Name', 'DepartmentNumber', 'CellNumber', 'TelNumber', 'Remarks'], 'string', 'max' => 45],
            [['IDNumber'], 'string', 'max' => 18],
            [['Position', 'Education'], 'string', 'max' => 10],
            [['Address', 'TranVersion'], 'string', 'max' => 255],
            [['AccessToken', 'AuthKey'], 'string', 'max' => 200],
            [['ID'], 'unique'],
            [['Number'], 'unique'],
            [['TranVersion'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Number' => '帐号',
            'Password' => '密码',
            'LastOnlineTime' => '最后登录时间',
            'Name' => '姓名',
            'IDNumber' => '身份证',
            'Sex' => '性别',
            'Position' => '职务',
            'DepartmentNumber' => '部门编号',
            'Address' => '地址',
            'CellNumber' => '手机号码',
            'TelNumber' => '电话号码',
            'Education' => '学历',
            'Remarks' => '备注',
            'TranVersion' => 'Tran Version',
            'AccessToken' => 'Access Token',
            'AuthKey' => 'Auth Key',
            'CreateTime' => '创建时间',
        ];
    }


    public static function findIdentity($id)  
    {  
        //自动登陆时会调用  
        $temp = parent::find()->where(['ID'=>$id])->one();  
        return isset($temp)?new static($temp):null;  
    }  


     public static function findIdentityByAccessToken($token, $type = null)  
    {  
        return static::findOne(['AccessToken' => $token]);  
    }  
      
    public function getId()  
    {  
        return $this->ID;  
    }  
      
    public function getAuthKey()  
    {  
        return $this->AuthKey;  
    }  
      
    public function validateAuthKey($authKey)  
    {  
        return $this->AuthKey === $authKey;  
    }  
      
      
    public function validatePassword($password)  
    {  
        return $this->Password === $password;  
    }  



}