<?php

namespace app\module\execution\models;

use Yii;
use app\models\Conclusion;

class Projectcost extends Conclusion
{

   public $type = "工程造价";
   public $module_type = "执行";

    public function attributeLabels()
    {
       return [
                'ID' => '序号',
                'UCycle' => '鉴定周期',
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
                'Agency'=> '鉴定机构',
                'UndertakerTel' => '承办人电话',
                'SuperviseTel' => '督办人电话',
                'IdentifiedCondition' => '鉴定要求',
                'Assessor' => '鉴定人',
                'AssessorTel' => '鉴定人电话',
                'TropschOffice' => '送委托办日期',//收案日期
                'FirstDraftDate' => '初稿日期',
                'SuspendedDate' => '暂缓日期',
                'RetractDate' => '撤回日期',
                'SendDate' => '送卷日期',//委托日期
                'EntrustCycle' => '委托周期',
                'MaterialsCompletionDate' => '材料补全日期',//立案日期
                'TransferMaterial' => '移交材料',
                'SiteSurveyDate' => '现场勘察日期',
                'GetbackDate' => '回卷日期',//结案日期
                'DeliveryCourtDate' => '送达业务庭日期',
                'ChargesDate' => '缴费日期',
                'Cycle' => '结案周期',
                'Price' => '价格', //评估价
                'FllowResult' => '跟踪评查情况',
                'Chambers' => '业务庭承办人', 
                'Supervise' => '督办人',
                'Money' => '鉴定费用', //评估费用  
                'IdentifiedResult' => '鉴定结论', 
                'SourceIdentifiedDepartment' => '原鉴定机构',
                'SourceIdentifiedResult' => '原鉴定结论',  
                'Remark' => '备注',               
        ];
    }

    public static function status(){

        return [
            ""=>"选择进度",
            "委托"=>"委托",
            "暂缓"=>"暂缓",
            "撤回"=>"撤回",
            "完成"=>"完成",
        ];
    }

}