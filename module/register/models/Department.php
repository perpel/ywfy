<?php

namespace app\module\register\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%department}}".
 *
 * @property integer $ID
 * @property string $Name
 * @property string $Number
 * @property string $StartDate
 * @property string $EndDate
 * @property string $RegistrationCode
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%department}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StartDate', 'EndDate'], 'required'],
            ['Name', 'required', 'message'=>'法院名称不能为空'],
            ['Name', 'unique', 'message'=>'法院名称已存在'],
            ['Number', 'required', 'message'=>'法院编号不能为空'],
            ['Number', 'unique', 'message'=>'法院编号已存在'],
            ['FlowNumber', 'required', 'message'=>'法院代号不能为空'],
            ['RegistrationCode', 'required', 'message'=>'软件注册码不能为空'],
            [['StartDate', 'EndDate'], 'safe'],
            [['Name'], 'string', 'max' => 128],
            [['Number', 'RegistrationCode'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => '法院名称',
            'Number' => '法院编号',
            'FlowNumber' => '法院代号',
            'StartDate' => 'Start Date',
            'EndDate' => 'End Date',
            'RegistrationCode' => '系统标识码',
        ];
    }

    public static function courtList(){

        return ArrayHelper::map( Department::find()->select("Number, Name")->asArray()->all(), 'Number', 'Name');
    }

    public static function courtName($number){

        return Department::find()->where(["Number"=>$number])->one()->Name;
    }

    public static function flowNumber($number){

        return Department::find()->where(["Number"=>$number])->one()->FlowNumber;
    }
}
