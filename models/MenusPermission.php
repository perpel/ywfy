<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%menus_permission}}".
 *
 * @property integer $ID
 * @property integer $MenuID
 * @property integer $UserID
 * @property boolean $MenuShow
 * @property boolean $Add
 * @property boolean $Del
 * @property boolean $Edit
 * @property boolean $View
 * @property boolean $Print
 * @property boolean $ImportExcel
 * @property boolean $ExportExcel
 */
class MenusPermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menus_permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MenuID', 'UserID'], 'integer'],
            [['MenuShow', 'Add', 'Del', 'Edit', 'View', 'Print', 'ImportExcel', 'ExportExcel'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'MenuID' => 'Menu ID',
            'UserID' => 'User ID',
            'MenuShow' => 'Menu Show',
            'Add' => 'Add',
            'Del' => 'Del',
            'Edit' => 'Edit',
            'View' => 'View',
            'Print' => 'Print',
            'ImportExcel' => 'Import Excel',
            'ExportExcel' => 'Export Excel',
        ];
    }
}
