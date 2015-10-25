<?php

namespace app\module\data\models;

use Yii;

/**
 * This is the model class for table "{{%basic_case}}".
 *
 * @property integer $ID
 * @property string $Type
 * @property string $Name
 * @property string $Remark
 */
class BasicCase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%basic_case}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Type' => '类型',
            'Name' => '案由名称',
            'Remark' => '备注',

        ];
    }

    public static function tableTh(){

        return [
            'ID' => '序号',
            'Name' => '案由名称',
            'Remark' => '备注',
        ];
    }

}