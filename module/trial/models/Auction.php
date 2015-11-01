<?php

namespace app\module\trial\models;

use Yii;
use app\models\Conclusion;

class Auction extends Conclusion
{

   public $type = "拍卖";
   public $module_type = "审判";

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
                'SubjectMatter' => '标的物',
                'GetbackDate' => '结案日期',//回卷日期
                'MaterialsCompletionDate' => '立案日期',//材料补全日期
                'UCaseCycle'=>'立案周期',
                'SendDate' => '委托日期',//送卷日期
                'EntrustCycle' => '委托周期',
                'Agency'=> '拍卖机构',
                'TransferMaterial' => '移交材料',
                'AnnouncementDate1' => '第一次公告时间',
                'StartAuctionPrice1' => '第一次起拍价',
                'Time1' => '第一次拍卖时间',
                'AnnouncementDate2' => '第二次公告时间',
                'StartAuctionPrice2' => '第二次起拍价',
                'Time2' => '第二次拍卖时间',
                'AnnouncementDate3' => '第三次公告时间',
                'StartAuctionPrice3' => '第三次起拍价',
                'Time3' => '第三次拍卖时间',
                'AuctionPrice' => '成交价(万元)',
                'TotalDate' => '拍卖款到帐日期',
                //到帐周期
                'Money' => '拍卖费用', //评估费用
                'Assessor' => '拍卖师',
                'GetbackDate' => '结案日期',//回卷日期
                'Cycle' => '结案周期',
                'SaleDate' => '变卖日期',
                'SalePrice' => '变卖价格',
                'SaleStatus' => '变卖状态',
                'FllowResult' => '跟踪评查情况',
                'Chambers' => '业务庭承办人', 
                'UndertakerTel' => '承办人电话',
                'Supervise' => '督办人',
                'SuperviseTel' => '督办人电话',
                'SuspendedDate' => '暂缓日期',
                'RetractDate' => '撤回日期',
                'Remark' => '备注', 
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