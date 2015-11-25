<?php

namespace app\module\basic\models;

use Yii;

/**
 * This is the model class for table "{{%agency}}".
 *
 * @property integer $ID
 * @property string $Type
 * @property string $Name
 * @property string $LicenseNumber
 * @property string $Contacts
 * @property string $ContactsPhone
 * @property string $LegalRepresentative
 * @property string $LegalRepresentativePhone
 * @property string $Tel
 * @property string $Fax
 * @property string $Qualification
 * @property string $ServiceArea
 * @property string $Remark
 */
class Agency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%agency}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartID', 'Name'], 'required'],
            [['Type'], 'string', 'max' => 16],
            [['Name', 'ServiceArea'], 'string', 'max' => 128],
            [['LicenseNumber', 'Contacts', 'ContactsPhone', 'LegalRepresentative', 'LegalRepresentativePhone', 'Tel', 'Fax'], 'string', 'max' => 20],
            [['Qualification'], 'string', 'max' => 36],
            [['Remark'], 'string', 'max' => 255],
            [['Name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => '序号',
            'Type' => '机构类型',
            'Name' => '机构名称',
            'LicenseNumber' => '执业证号',
            'Contacts' => '联系人',
            'ContactsPhone' => '联系人电话',
            'LegalRepresentative' => '法定代表人',
            'LegalRepresentativePhone' => '法定代表人电话',
            'Tel' => '电话',
            'Fax' => '传真',
            'Qualification' => '资质',
            'ServiceArea' => '服务范围',
            'Remark' => '备注',
        ];
    }

    public static function tableTh(){

        return [
            'ID' => '序号',
            'Type' => '类别',
            'Name' => '机构名称',
            'LicenseNumber' => '执业证号',
            'Contacts' => '联系人',
            'ContactsPhone' => '联系人手机',
            'LegalRepresentative' => '法定代表人',
            'LegalRepresentativePhone' => '法定代表人手机',
            'Tel' => '电话',
            'Fax' => '传真',
            'Qualification' => '资质',
            'ServiceArea' => '服务范围',
            'Remark' => '备注',
        ];
    }

    public static function dropList( $type ){

        $dropList = [];
        $list = self::find()->select("Name")->where(["Type"=>$type])->asArray()->all();
        foreach ($list as $key => $value) {
            $dropList[$value["Name"]] = $value["Name"];
        }

        return $dropList;

    }
    
}
