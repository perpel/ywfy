<?php

namespace app\models;

use Yii;

class Conclusion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conclusion}}';
    }

    public static function years(){

        return [ "2001", "2002", "2003", "2004"];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartID', 'Type', 'Year'], 'required'],
            [['FlowNumber'], 'required', 'message'=>'委托案号必填'],
            [['CaseNumber'], 'required', 'message'=>'原审案号必填'],
            [['Case'], 'required', 'message'=>'案由必填'],
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
            //[['FlowNumber'], 'unique'],
            //[['CaseNumber'], 'unique'],
            //[['Case'], 'unique']
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
            'Cycle' => '周期',
            'Result' => '结果',
            'Price' => '价格', //评估价
            'UnitID' => '单位',
            'InputMan' => '录入人',
            'InputDate' => '录入日期',
            'EditMan' => '修改人',
            'EditDate' => '修改日期',
            'Remark' => '备注',
            'EntrustDeparment' => '委托部门',
            'ChoiceWay' => '选定方式',
            'Money' => '费用', //评估费用
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
            'BeginDate' => '开始日期',//补充材料日期
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
            'AuctionPrice' => '拍卖价', //评估价
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

            return [
                'ID' => '序号',
                'UCycle' => '评估周期',
                'AuctionStatus' => '进度',
                'FlowNumber' => '委托案号',
                'EntrustDeparment' => '委托部门',
                'CaseNumber' => '原审案号',
                'Case' => '案由',
                'LitigantOne' => '当事人1',
                'LitigantTwo' => '当事人2',
                'SubjectMatter' => '标的物',
                'ChoiceWay' => '选定方式',
                'ChoicedDate' => '选定时间',
                'Agency'=> '机构名称',
                'TropschOffice' => '送委托办日期',//收案日期
                'MaterialsCompletionDate' => '材料补全日期',//立案日期
                'TransferMaterial' => '移交材料',
                'SendDate' => '送卷日期',//委托日期
                'EntrustCycle' => '委托周期',
                'SiteSurveyDate' => '现场勘察日期',
                'RetractDate' => '撤回日期',
                'SuspendedDate' => '暂缓日期',
                'DeliveryCourtDate' => '送达业务庭日期',
                'ChargesDate' => '缴费日期',
                'GetbackDate' => '回卷日期',//结案日期
                'Cycle' => '结案周期',
                'Price' => '价格', //评估价
                'FllowResult' => '跟踪评查情况',
                'Chambers' => '业务庭承办人', 
                'Supervise' => '督办人',
                'Money' => '费用', //评估费用
                'Assessor' => '评估师',
                'AssessorTel' => '评估师电话',
                'UndertakerTel' => '承办人电话',
                'SuperviseTel' => '督办人电话',
                'Remark' => '备注',               
        ];
        break;

        case "identify":

            return [
                'ID' => '序号',
                'UCycle' => '鉴定周期',
                'AuctionStatus' => '进度',
                'FlowNumber' => '鉴定案号',
                'EntrustDeparment' => '委托部门',
                'CaseNumber' => '原审案号',
                'Case' => '案由',
                'LitigantOne' => '当事人1',
                'LitigantTwo' => '当事人2',
                'TransferMaterial' => '移交材料',
                'IdentifiedType' => '鉴定类型',
                'IdentifiedCondition' => '鉴定要求',
                'TropschOffice' => '送委托办日期',//收案日期
                'MaterialsCompletionDate' => '材料补全日期',//立案日期
                'ChoiceWay' => '选定方式',
                'ChoicedDate' => '选定时间',
                'Agency'=> '鉴定机构',
                'Money' => '鉴定费用', //评估费用
                'SendDate' => '送卷日期',//委托日期
                'EntrustCycle' => '委托周期',
                'SiteSurveyDate' => '现场勘察日期',
                'IdentifiedResult' => '鉴定意见',
                'GetbackDate' => '回卷日期',//结案日期
                'Cycle' => '结案周期',
                'FllowResult' => '跟踪评查情况',
                'Assessor' => '鉴定人',
                'AssessorTel' => '鉴定人电话',
                'Supervise' => '督办人',
                'RetractDate' => '撤回日期',
                'SuspendedDate' => '暂缓日期',
                'Chambers' => '业务庭承办人', 
                'UndertakerTel' => '承办人电话',
                'SourceIdentifiedDepartment' => '原鉴定机构',
                'SourceIdentifiedResult' => '原鉴定结论',
                'Remark' => '备注', 
                            
        ];
        break;

        }
    }




}
