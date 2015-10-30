<?php

namespace app\module\execution\models;

use Yii;
use app\models\Conclusion;

class Auction extends Conclusion
{

   public $type = "拍卖";
   public $module_type = "执行";
 
    public function attributeLabels()
    {
       return [
                'ID' => '序号',
                'UCycle' => '拍卖周期',
                'AuctionStatus' => '进度',
                'FlowNumber' => '拍卖案号',
                'EntrustDeparment' => '委托部门',
                'CaseNumber' => '原审案号',
                'Case' => '案由',
                'LitigantOne' => '当事人1',
                'LitigantTwo' => '当事人2',
                'Chambers' => '业务庭承办人',
                'UndertakerTel' => '承办人电话',
                'TransferMaterial' => '移交材料',
                'FllowResult' => '跟踪评查情况',
                'Assessor' => '拍卖师',
                'SubjectMatter' => '标的物',
                'AuctionStatus' => '进度',
                'Supervise' => '督办人',
                'SuperviseTel' => '督办人电话',
                'JudgmentExecuteReceives' => '审判执行收卷日期',
                'MaterialsCompletionDate' => '材料补全日期',
                'Cycle' => '拍卖周期',
                'SendDate' => '送卷日期',//委托日期
                'EntrustCycle' => '委托周期',
                'Agency'=> '拍卖机构',
                'TransferMaterial' => '移交材料',
                'AnnouncementDate1' => '公告1',
                'StartAuctionPrice1' => '起拍价1',
                'AnnouncementDate2' => '公告2',
                'StartAuctionPrice2' => '起拍价2',
                'AnnouncementDate3' => '公告3',
                'StartAuctionPrice3' => '起拍价3',
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
                'AuctionPrice' => '成交价',
                'SalePrice' => '拍卖价格', 
                'GetbackDate' => '回卷日期',
                'AuctionDate' => '拍卖日期',
                'SaleDate' => '变卖日期',
                'SalePrice' => '变卖价格',
                'SaleStatus' => '变卖状态',
                'RetractDate' => '撤回日期',
                'SuspendedDate' => '暂缓日期',
                'Money' => '拍卖费用', //评估费用
        ];
    }

    public static function status(){

        return [
            ""=>"选择进度",
            "收卷"=>"收卷",
            "立案"=>"立案",
            "委托"=>"委托",
            "拍卖1"=>"拍卖1",
            "拍卖2"=>"拍卖2",
            "拍卖3"=>"拍卖3",
            "撤拍"=>"撤拍",
        ];
    }

    public static function status2(){

        return [
            ""=>"选择拍卖状态",
            "成交"=>"成交",
            "流拍"=>"流拍",
            "撤拍"=>"撤拍",
        ];
    }

}