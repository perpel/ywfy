<?php

namespace app\models;
use yii\base\Model;

class Import extends Model{

    public static function tpl($action){

        switch($action){

            case 'assess':
                return self::tplAssess();
            break;

        }

    }


    private static function tplAssess(){

        return [
            //'No' => 'No',
            //'周期' => '周期',
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
            'TropschOffice' => '收案日期',
            'MaterialsCompletionDate' => '立案日期',
            //'立案周期' => '立案周期',
            'TransferMaterial' => '移交材料',
            'SendDate' => '委托日期',
            'EntrustCycle' => '委托周期',
            'SiteSurveyDate' => '勘验日期',
            'RetractDate' => '撤回日期',
            'SuspendedDate' => '暂缓日期',
            'DeliveryCourtDate' => '送达业务庭日期',
            'ChargesDate' => '缴费日期',
            'GetbackDate' => '结案日期',
            //'结案周期' => '结案周期',
            'Price' => '评估价（万元）',
            'FllowResult' => '跟踪评查情况',
            'Chambers' => '业务庭承办人',
            'Supervise' => '督办人',
            'Money' => '评估费用',
            'Assessor' => '评估师',
            'AssessorTel' => '评估师电话',
            'UndertakerTel' => '承办人电话',
            'SuperviseTel' => '督办人电话',
            'Remark' => '备注',
        ];
       
    }

}