<?php

namespace app\module\input\models;

use Yii;

/**
 * This is the model class for table "{{%bust}}".
 *
 * @property integer $ID
 * @property string $DepartID
 * @property string $Type
 * @property string $Year
 * @property string $CaseNumber
 * @property string $Supervise
 * @property string $SuperviseTel
 * @property string $FlowNumber
 * @property string $Case
 * @property string $LitigantOne
 * @property string $LitigantTwo
 * @property string $EntrustDeparment
 * @property string $Undertaker
 * @property string $UndertakerTel
 * @property string $TransferMaterial
 * @property string $SubjectMatter
 * @property string $LiquidationGroup
 * @property string $ChoiceWay
 * @property string $CaseClosedDate
 * @property string $PutOnRecordDate
 * @property integer $PutOnRecordCycle
 * @property string $EntrustDate
 * @property integer $EntrustCycle
 * @property string $LiquidationDate
 * @property string $GetbackDate
 * @property integer $Cycle
 * @property string $Progress
 * @property string $Fee
 * @property string $FllowResult
 * @property string $Remark
 */
class Bust extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $type = "破产";

    public static function tableName()
    {
        return '{{%bust}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'DepartID', 'Year', 'CaseNumber', 'FlowNumber', 'Case'], 'required'],
            [['ID', 'PutOnRecordCycle', 'EntrustCycle', 'Cycle'], 'integer'],
            [['DepartID', 'Fee'], 'number'],
            [['SubjectMatter', 'Remark'], 'string'],
            [['CaseClosedDate', 'PutOnRecordDate', 'EntrustDate', 'LiquidationDate', 'GetbackDate'], 'safe'],
            [['Type'], 'string', 'max' => 10],
            [['Year'], 'string', 'max' => 12],
            [['CaseNumber', 'FlowNumber', 'Case', 'LitigantOne', 'LitigantTwo', 'TransferMaterial', 'LiquidationGroup'], 'string', 'max' => 255],
            [['Supervise', 'SuperviseTel', 'Undertaker', 'UndertakerTel', 'ChoiceWay', 'FllowResult'], 'string', 'max' => 50],
            [['EntrustDeparment'], 'string', 'max' => 128],
            [['Progress'], 'string', 'max' => 36]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DepartID' => '部门ID',
            'Type' => '类型评估',
            'Year' => '年度',
            'CaseNumber' => '委托案号',
            'Supervise' => '督办人',
            'SuperviseTel' => '督办人电话',
            'FlowNumber' => '案件流水号',
            'Case' => '案由',
            'LitigantOne' => '当事人1',
            'LitigantTwo' => '当事人2',
            'EntrustDeparment' => '委托部门',
            'Undertaker' => '承办人',
            'UndertakerTel' => '承办人电话',
            'TransferMaterial' => '移交材料',
            'SubjectMatter' => '标的物',
            'LiquidationGroup' => '管理人/清算组',
            'ChoiceWay' => '选定方式',
            'CaseClosedDate' => '收案日期',
            'PutOnRecordDate' => '立案日期',
            'PutOnRecordCycle' => '立案周期',
            'EntrustDate' => '委托日期',
            'EntrustCycle' => '委托周期',
            'LiquidationDate' => '开始清算日期',
            'GetbackDate' => '结案日期',
            'Cycle' => '破产周期',
            'Progress' => '进度',
            'Fee' => '清算费用',
            'FllowResult' => '跟踪评查情况',
            'Remark' => '备注/结论',
        ];
    }


    public static function tableTh(){

        return [
            'No' => '序号',
            'Cycle' => '周期',
            'Progress' => '进度',
            'CaseNumber' => '清算案号',
            'EntrustDeparment' => '委托部门',
            'FlowNumber' => '原审案号',
            'Case' => '案由',
            'LitigantOne' => '当事人1',
            'LitigantTwo' => '当事人2',     
            'SubjectMatter' => '标的物',                  
            'ChoiceWay' => '选定方式',
            'LiquidationGroup' => '清算机构',
            'TransferMaterial' => '移交材料',            
            'CaseClosedDate' => '收案日期',
            'PutOnRecordDate' => '立案日期',
            'PutOnRecordCycle' => '立案周期',
            'EntrustDate' => '委托日期',
            'EntrustCycle' => '委托周期',
            'LiquidationDate' => '开始日期',
            'GetbackDate' => '结案日期',                        
            'FllowResult' => '跟踪评查情况',
            'Supervise' => '督办人',
            'SuperviseTel' => '督办人电话',
            'Undertaker' => '承办人',
            'UndertakerTel' => '承办人电话',            
            'Fee' => '清算费用',
            'Remark' => '备注/结论',
        ];

    }

}
