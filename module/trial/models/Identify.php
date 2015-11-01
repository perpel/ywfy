<?php

namespace app\module\trial\models;

use Yii;
use app\models\Conclusion;

class Identify extends Conclusion
{

   public $type = "鉴定";
   public $module_type = "审判";

    public function attributeLabels()
    {
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
                'TropschOffice' => '收案日期',//送委托办日期
                'MaterialsCompletionDate' => '立案日期',//材料补全日期
                'UCaseCycle'=>'立案周期',
                'ChoiceWay' => '选定方式',
                'ChoicedDate' => '选定时间',
                'Agency'=> '鉴定机构',
                'Money' => '鉴定费用', //鉴定费用
                'SendDate' => '委托日期',//送卷日期
                'EntrustCycle' => '委托周期',
                'SiteSurveyDate' => '勘察日期',
                'IdentifiedResult' => '鉴定意见',//******
                'GetbackDate' => '结案日期',//回卷日期
                'Cycle' => '结案周期',
                'FllowResult' => '跟踪评查情况',
                'Assessor' => '鉴定人',
                'AssessorTel' => '鉴定人电话',
                'Supervise' => '督办人',
                'SuspendedDate' => '暂缓日期',
                'RetractDate' => '撤回日期',
                'SuperviseTel' => '督办人电话',
                'Chambers' => '业务庭承办人',
                'UndertakerTel' => '承办人电话',
                'SourceIdentifiedDepartment' => '原鉴定机构',
                'SourceIdentifiedResult' => '原鉴定结论',
                'Remark' => '备注',
                                          
        ];
    }

    public static function IdentifyType(){
        return [
            ""=>"选择鉴定类型",
            "物证"=>"物证",
            "法医"=>"法医",
            "产品质量"=>"产品质量",
            "工程质量"=>"工程质量",
            "会计审计"=>"会计审计",
            "其他"=>"其他",         
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