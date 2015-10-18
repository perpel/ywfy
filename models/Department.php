<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%department}}".
 *
 * @property integer $Number
 * @property integer $Superiors
 * @property string $Name
 * @property string $Address
 * @property string $Tel
 * @property string $Fax
 * @property string $Contacts
 * @property string $AuthorizationCode
 * @property string $SerialNumber
 * @property string $IsCurrent
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
            [['Number', 'Superiors', 'Name', 'AuthorizationCode', 'SerialNumber', 'IsCurrent'], 'required'],
            [['Number', 'Superiors'], 'integer'],
            [['Name'], 'string', 'max' => 36],
            [['Address'], 'string', 'max' => 255],
            [['Tel', 'Fax'], 'string', 'max' => 20],
            [['Contacts'], 'string', 'max' => 12],
            [['AuthorizationCode', 'SerialNumber'], 'string', 'max' => 50],
            [['IsCurrent'], 'string', 'max' => 1],
            [['Name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Number' => 'Number',
            'Superiors' => 'Superiors',
            'Name' => 'Name',
            'Address' => 'Address',
            'Tel' => 'Tel',
            'Fax' => 'Fax',
            'Contacts' => 'Contacts',
            'AuthorizationCode' => 'Authorization Code',
            'SerialNumber' => 'Serial Number',
            'IsCurrent' => 'Is Current',
        ];
    }
}
