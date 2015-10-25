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
    }

}