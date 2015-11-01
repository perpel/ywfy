<?php

namespace app\module\trial\models;

use Yii;
use app\models\Conclusion;

class Bust extends Conclusion
{

   public $type = "破产";
   public $module_type = "审判";

    public function attributeLabels()
    {
       return [
                'ID' => '序号',
                'UCycle' => '周期',
                'AuctionStatus' => '进度',
                'FlowNumber' => '清算案号',
                'EntrustDeparment' => '委托部门',
                'CaseNumber' => '原审案号',
                'Case' => '案由',
                'LitigantOne' => '当事人1',
                'LitigantTwo' => '当事人2',
                'SubjectMatter' => '标的物',
                'ChoiceWay' => '选定方式',
                'Agency'=> '清算机构',
                'TransferMaterial' => '移交材料',
                'TropschOffice' => '收案日期',//送委托办日期
                'MaterialsCompletionDate' => '立案日期',//材料补全日期
                'UCaseCycle'=>'立案周期',
                'SendDate' => '委托日期',//送卷日期
                'EntrustCycle' => '委托周期',
                'BeginDate' => '开始日期',//补充材料日期
                'GetbackDate' => '结案日期',//回卷日期
                'FllowResult' => '跟踪评查情况',
                'Supervise' => '督办人',
                'SuperviseTel' => '督办人电话',
                'Chambers' => '业务庭承办人', 
                'UndertakerTel' => '承办人电话',
                'Money' => '清算费用', //评估费用
                'Remark' => '备注', 
        ];
    }

     public static function status(){

        return [
            ""=>"选择进度",
            "收卷"=>"收卷",
            "立案"=>"立案",
            "委托"=>"委托",
            "审计"=>"审计",
            "完成"=>"完成",
            "撤销"=>"撤销",
        ];
    }

}