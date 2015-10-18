<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%document}}".
 *
 * @property integer $ID
 * @property integer $DepartmentNumber
 * @property integer $Name
 * @property integer $Assess
 * @property integer $Identify
 * @property integer $Auction
 * @property integer $ProjectCost
 * @property integer $Bust
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%document}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartmentNumber'], 'required'],
            [['Name'], 'string'],
            [['DepartmentNumber', 'Assess', 'Identify', 'Auction', 'ProjectCost', 'Bust'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DepartmentNumber' => '部门编号',
            'Name' => '名称',
            'Assess' => '评估',
            'Identify' => '鉴定',
            'Auction' => '拍卖',
            'ProjectCost' => '工程造价',
            'Bust' => '破产',
        ];
    }


    public static function tableTh(){

        return [
            'ID' => '序号',
            'DepartmentNumber' => '部门编号',
            'Name' => '名称',
            'Assess' => '评估',
            'Identify' => '鉴定',
            'Auction' => '拍卖',
            'ProjectCost' => '工程造价',
            'Bust' => '破产',
        ];
    }

}
