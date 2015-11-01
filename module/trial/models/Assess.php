<?php

namespace app\module\trial\models;

use Yii;
use app\models\Conclusion;

class Assess extends Conclusion
{

   public $type = "评估";
   public $module_type = "审判";

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
                'ChoicedDate' => '选定日期',
                'Agency'=> '评估机构',
                'TropschOffice' => '收案日期',//送委托办日期
                'MaterialsCompletionDate' => '立案日期',//材料补全日期
                'UCaseCycle'=>'立案周期',
                'TransferMaterial' => '移交材料',
                'SendDate' => '委托日期',//送卷日期
                'EntrustCycle' => '委托周期',
                'SiteSurveyDate' => '现场勘察日期',
                'RetractDate' => '撤回日期',
                'SuspendedDate' => '暂缓日期',
                'DeliveryCourtDate' => '送达业务庭日期',
                'ChargesDate' => '缴费日期',
                'GetbackDate' => '结案日期',//回卷日期
                'Cycle' => '结案周期',
                'Price' => '评估价(万元)', //价格
                'FllowResult' => '跟踪评查情况',
                'Chambers' => '业务庭承办人', 
                'Supervise' => '督办人',
                'Money' => '评估费用', //评估费用
                'Assessor' => '评估师',
                'AssessorTel' => '评估师电话',
                'UndertakerTel' => '承办人电话',
                'SuperviseTel' => '督办人电话',
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