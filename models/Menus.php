<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%menus}}".
 *
 * @property integer $ID
 * @property string $Menu
 * @property integer $FartherID
 * @property integer $NodePos
 * @property integer $NodeSort
 * @property string $URL
 */
class Menus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menus}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'URL'], 'required'],
            [['ID', 'FartherID', 'NodePos', 'NodeSort'], 'integer'],
            [['Menu', 'URL'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Menu' => 'Menu',
            'FartherID' => 'Farther ID',
            'NodePos' => 'Node Pos',
            'NodeSort' => 'Node Sort',
            'URL' => 'Url',
        ];
    }

    public static function getMenuByUserId($userid){


    }
}
