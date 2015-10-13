<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%conclusion}}".
 *
 * @property integer $ID
 * @property string $DepartID
 * @property string $Type
 * @property string $Year
 * @property string $FlowNumber
 * @property string $CaseNumber
 * @property string $Case
 * @property string $SubjectMatter
 * @property string $LitigantOne
 * @property string $LitigantTwo
 * @property string $TransferMaterial
 * @property string $Supervise
 * @property string $Chambers
 * @property string $Agency
 * @property string $JudgmentExecuteReceives
 * @property string $TropschOffice
 * @property integer $SendCycle
 * @property string $SendDate
 * @property integer $EntrustCycle
 * @property string $MaterialsCompletionDate
 * @property string $GetbackDate
 * @property integer $Cycle
 * @property string $Result
 * @property string $Price
 * @property integer $UnitID
 * @property string $InputMan
 * @property string $InputDate
 * @property string $EditMan
 * @property string $EditDate
 * @property string $Remark
 * @property string $EntrustDeparment
 * @property string $ChoiceWay
 * @property string $Money
 * @property integer $IsAdoption
 * @property string $FllowResult
 * @property string $Time1
 * @property string $Status1
 * @property string $Price1
 * @property string $Time2
 * @property string $Status2
 * @property string $Price2
 * @property string $Time3
 * @property string $Status3
 * @property string $Price3
 * @property string $Time4
 * @property string $BeginDate
 * @property string $IdentifiedType
 * @property string $IdentifiedCondition
 * @property string $ChoicedDate
 * @property string $FirstDraftDate
 * @property string $AnnouncementDate1
 * @property string $StartAuctionPrice1
 * @property string $AnnouncementDate2
 * @property string $StartAuctionPrice2
 * @property string $AnnouncementDate3
 * @property string $StartAuctionPrice3
 * @property string $NotifyPaymentDate
 * @property string $ChargesDate
 * @property string $SiteSurveyDate
 * @property string $IdentifiedResult
 * @property string $Unadoption
 * @property string $SourceIdentifiedDepartment
 * @property string $SourceIdentifiedResult
 * @property string $UndertakerTel
 * @property string $SuperviseTel
 * @property string $TotalDate
 * @property string $AuctionStatus
 * @property string $AuctionPrice
 * @property string $AuctionDate
 * @property string $SuspendedDate
 * @property string $Assessor
 * @property string $AssessorTel
 * @property string $DeliveryCourtDate
 * @property string $SaleDate
 * @property string $SalePrice
 * @property string $SaleStatus
 * @property string $RetractDate
 * @property string $TranVersion
 */
class Conclusion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conclusion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartID', 'Type', 'Year', 'FlowNumber', 'CaseNumber', 'Case'], 'required'],
            [['DepartID', 'Price', 'Money', 'Price1', 'Price2', 'Price3', 'StartAuctionPrice1', 'StartAuctionPrice2', 'StartAuctionPrice3', 'AuctionPrice', 'SalePrice'], 'number'],
            [['SubjectMatter', 'IdentifiedCondition', 'IdentifiedResult'], 'string'],
            [['JudgmentExecuteReceives', 'TropschOffice', 'SendDate', 'MaterialsCompletionDate', 'GetbackDate', 'InputDate', 'EditDate', 'Time1', 'Time2', 'Time3', 'Time4', 'BeginDate', 'ChoicedDate', 'FirstDraftDate', 'AnnouncementDate1', 'AnnouncementDate2', 'AnnouncementDate3', 'NotifyPaymentDate', 'ChargesDate', 'SiteSurveyDate', 'TotalDate', 'AuctionDate', 'SuspendedDate', 'DeliveryCourtDate', 'SaleDate', 'RetractDate'], 'safe'],
            [['SendCycle', 'EntrustCycle', 'Cycle', 'UnitID', 'IsAdoption'], 'integer'],
            [['Type', 'Result', 'InputMan', 'EditMan', 'ChoiceWay', 'Status1', 'Status2', 'Status3', 'IdentifiedType', 'AuctionStatus', 'SaleStatus'], 'string', 'max' => 10],
            [['Year'], 'string', 'max' => 12],
            [['FlowNumber', 'CaseNumber', 'Case', 'TransferMaterial', 'EntrustDeparment', 'FllowResult', 'UndertakerTel', 'SuperviseTel'], 'string', 'max' => 50],
            [['LitigantOne', 'LitigantTwo', 'SourceIdentifiedResult'], 'string', 'max' => 200],
            [['Supervise', 'Chambers', 'Assessor', 'AssessorTel'], 'string', 'max' => 20],
            [['Agency', 'Remark'], 'string', 'max' => 100],
            [['Unadoption', 'SourceIdentifiedDepartment'], 'string', 'max' => 1000],
            [['TranVersion'], 'string', 'max' => 255],
            [['FlowNumber'], 'unique'],
            [['CaseNumber'], 'unique'],
            [['Case'], 'unique']
        ];
    }


    public function attributeLabels(){
        
        return [
            'ID' => '序号',
            'DepartID' => '部门编号',
            'Type' => '类别',
            'Year' => '年度',
            'FlowNumber' => '委托案号',
            'CaseNumber' => '原审案号',
            'Case' => '案由',
            'SubjectMatter' => '标的物',
            'LitigantOne' => '当事人1',
            'LitigantTwo' => '当事人2',
            'TransferMaterial' => '移交材料',
            'Supervise' => '督办人',
            'Chambers' => '业务庭承办人',
            'Agency'=> '机构名称',
            'JudgmentExecuteReceives' => '审判执行收卷日期',
            'TropschOffice' => '送委托办日期',//收案日期
            'SendCycle' => '送卷周期',
            'SendDate' => '送卷日期',//委托日期
            'EntrustCycle' => '委托周期',
            'MaterialsCompletionDate' => '材料补全日期',//立案日期
            //立案周期=收案日期-立案日期
            //委托周期=立案日期-委托日期
            //评估周期/结案周期=开始日期-结案日期
            'GetbackDate' => '回卷日期',//结案日期
            'Cycle' => '结案周期',
            'Result' => '结果',
            'Price' => '价格',
            'UnitID' => '单位',
            'InputMan' => '录入人',
            'InputDate' => '录入日期',
            'EditMan' => '修改人',
            'EditDate' => '修改日期',
            'Remark' => '备注',
            'EntrustDeparment' => '委托部门',
            'ChoiceWay' => '选定方式',
            'Money' => '费用',
            'IsAdoption' => '是否采纳',
            'FllowResult' => '跟踪评查情况',
            'Time1' => '时间1',
            'Status1' => '状态1',
            'Price1' => '价格1',
            'Time2' => '时间2',
            'Status2' => '状态2',
            'Price2' => '价格2',
            'Time3' => '时间3',
            'Status3' => '状态3',
            'Price3' => '价格3',
            'Time4' => '时间4',
            'BeginDate' => '开始日期',
            'IdentifiedType' => '鉴定类型',
            'IdentifiedCondition' => '鉴定要求',
            'ChoicedDate' => '选定时间',
            'FirstDraftDate' => '初稿日期',
            'AnnouncementDate1' => '公告1',
            'StartAuctionPrice1' => '起拍价1',
            'AnnouncementDate2' => '公告2',
            'StartAuctionPrice2' => '起拍价2',
            'AnnouncementDate3' => '公告3',
            'StartAuctionPrice3' => '起拍价3',
            'NotifyPaymentDate' => '通知收费时间',
            'ChargesDate' => '缴费日期',
            'SiteSurveyDate' => '现场勘察日期',
            'IdentifiedResult' => '鉴定结论',
            'Unadoption' => '未采纳原因',
            'SourceIdentifiedDepartment' => '原鉴定机构',
            'SourceIdentifiedResult' => '原鉴定结论',
            'UndertakerTel' => '承办人电话',
            'SuperviseTel' => '督办人电话',
            'TotalDate' => '统计日期',
            'AuctionStatus' => '进度',
            'AuctionDate' => '拍卖日期',
            'AuctionPrice' => '拍卖价',
            'SuspendedDate' => '暂缓日期',
            'Assessor' => '评估师',
            'AssessorTel' => '评估师电话',
            'DeliveryCourtDate' => '送达业务庭日期',
            'SaleDate' => '变卖日期',
            'SalePrice' => '变卖价格',
            'SaleStatus' => '变卖状态',
            'RetractDate' => '撤回日期',
            'TranVersion' => 'Tran Version',
        ];
    }


    public static function tableTh($action){

        switch($action){

            case "assess":
                return ['No', '评估周期', '进度', '委托案号', '委托部门', '原审案号', '案由', '当事人1','当事人2', '标的物', '选定方式', '选定日期', '评估机构', '收案日期', '立案日期', '立案周期', '移交材料', '委托日期', '委托周期', '勘验日期', '撤回日期', '暂缓日期', '送达业务庭日期', '缴费日期', '结案日期', '结案周期', '评估价（万元）', '跟踪评查情况', '业务庭承办人', '督办人', '评估费用', '评估师', '评估师电话', '承办人电话', '督办人电话', '备注'];
            break;

        }
    }




}
