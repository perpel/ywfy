<?php

namespace app\module\admin\models;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property integer $ID
 * @property string $Name
 * @property string $Password
 * @property string $DepartNum
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'Password', 'DepartNum'], 'required'],
            [['Name'], 'string', 'max' => 50],
            [['Password', 'DepartNum'], 'string', 'max' => 128],
            [['Name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
            'Password' => 'Password',
            'DepartNum' => 'Depart Num',
        ];
    }
}
