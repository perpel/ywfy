<?php

namespace app\module\trial\models;

use Yii;
use app\models\Conclusion;

class Projectcost extends Conclusion
{

   public $type = "工程造价";
   public $module_type = "审判";

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
                'TransferMaterial' => '移交材料',
                'IdentifiedCondition' => '鉴定要求',
                'TropschOffice' => '收案日期',//送委托办日期
                'MaterialsCompletionDate' => '初稿日期',
                'ChoiceWay' => '选定方式',
                'ChoicedDate' => '选定日期',
                'Agency'=> '鉴定机构',
                'Money' => '鉴定费用', //评估费用
                'SendDate' => '委托日期',//送卷日期
                'EntrustCycle' => '委托周期',
                'SiteSurveyDate' => '勘验日期',
                'IdentifiedResult' => '鉴定意见',
                'UCaseCycle'=>'立案周期',
                'GetbackDate' => '结案日期',//回卷日期
                'Cycle' => '结案周期',
                'FllowResult' => '跟踪评查情况',
                'Supervise' => '督办人',
                'SuperviseTel' => '督办人电话',
                'SourceIdentifiedDepartment' => '原鉴定机构',
                'SourceIdentifiedResult' => '原鉴定结论', 
                'SuspendedDate' => '暂缓日期',
                'RetractDate' => '撤回日期',
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