<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class InstallController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actions(){

        echo "【数据库安装配置信息】" . "\n";
    }

    public function actionIndex($host, $user, $pw, $db = "case", $admin, $admin_pw, $prefix = "case_")
    {
        echo "主机地址：" . $host . "\n";
        echo "用户名：" . $user . "\n";
        echo "密码：" . $pw . "\n";
        echo "数据库：" . $db . "\n";
        echo "表前缀：" . $prefix . "\n";
        //file_put_contents( dirname(__FILE__) . "/config/db.php", "123");
        $this->db_config($host, $user, $pw, $db, $prefix);
        $this->test_db();

        $con = mysql_connect($host, $user, $pw);
        if (!$con){
            die('数据库连接失败!\n' . mysql_error());
        }else{
            echo "数据库连接成功!\n";
        }

        if (mysql_query("CREATE DATABASE $db default character set utf8", $con)){
            echo "数据库 $db 创建成功!\n";
        }else{
            echo "数据库 $db 创建失败!\n" . mysql_error();
        }

        mysql_select_db($db, $con);

        $this->createAdmin($con, $prefix);
        $this->createAgency($con, $prefix);
        $this->createAssess($con, $prefix);
        $this->createAuction($con, $prefix);
        $this->createBust($con, $prefix);
        $this->createDepartment($con, $prefix);
        $this->createDocument($con, $prefix);
        $this->createTemplate($con, $prefix);
        $this->createIdentify($con, $prefix);
        $this->createLogs($con, $prefix);
        $this->createPersonnel($con, $prefix);
        $this->createProject($con, $prefix);
        $this->createReport($con, $prefix);
        $this->end($con, $prefix);
        $this->initAdmin($con, $prefix, $admin, $admin_pw);
        echo "系统初始化完成..." . "\n";
        mysql_close($con);
        //echo $message . "\n";
        //$results = exec('getchar()'); 
        //exec('echo 请输入正确的数字'); 
        //echo $results;
        //$out = sscanf('file_name.gif', 'file_%s.%s', $fpart1, $fpart2);
    }

    protected function initAdmin($con, $prefix, $admin, $admin_pw){

      $sql = "INSERT INTO `t`.`{$prefix}admin` (`ID`, `Name`, `Password`, `DepartNum`) VALUES (NULL, '{$admin}', '{$admin_pw}', 'super');";
      if(mysql_query($sql, $con)){
          echo "超级管理员{$admin}创建成功\n";
      }
    }

    protected function db_config($host, $user, $pw, $db, $prefix){

            $db=<<<DB
<?php
        return [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=$host;dbname=$db',
            'username' => '$user',
            'password' => '$pw',
            'charset' => 'utf8',
            'tablePrefix'=>'$prefix',
        ];
DB;
            if(file_put_contents( Yii::$app->basePath . "/config/db.php", $db)){

                echo "数据库配置成功！" . "\n";
            }

    }

    protected function test_db(){
            $this->progress("创建数据库");
    }

    protected function progress($msg, $tail = "\n"){

            echo $msg;
            $i = 0;
            while( $i < 5 ){
                    echo ".";
                    sleep(1);
                    $i++;
            }
            echo $tail;
    }

    protected function createAdmin($con, $prefix){

        $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}admin` (
                  `ID` int(11) NOT NULL,
                  `Name` varchar(50) NOT NULL,
                  `Password` varchar(128) NOT NULL,
                  `DepartNum` varchar(128) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        echo date("Y-m-d G:i:s") . "创建" . $prefix . "admin" . "表";
        $this->progress("", "");
        if(mysql_query($tb, $con)){
            echo "成功\n";
        }

        $alert = "ALTER TABLE `{$prefix}admin`
              ADD PRIMARY KEY (`ID`),
              ADD UNIQUE KEY `Name` (`Name`);";

        mysql_query($alert, $con);
        
    }

    protected function createAgency($con, $prefix){

        $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}agency` (
                  `ID` int(10) unsigned NOT NULL COMMENT '序号',
                  `DepartID` varchar(255) NOT NULL,
                  `Type` varchar(16) DEFAULT NULL COMMENT '机构类型',
                  `Name` varchar(128) NOT NULL COMMENT '机构名称',
                  `LicenseNumber` varchar(20) DEFAULT NULL COMMENT '执业证号',
                  `Contacts` varchar(20) DEFAULT NULL COMMENT '联系人',
                  `ContactsPhone` varchar(20) DEFAULT NULL COMMENT '联系人电话',
                  `LegalRepresentative` varchar(20) DEFAULT NULL COMMENT '法定代表人',
                  `LegalRepresentativePhone` varchar(20) DEFAULT NULL COMMENT '法定代表人电话',
                  `Tel` varchar(20) DEFAULT NULL COMMENT '电话',
                  `Fax` varchar(20) DEFAULT NULL COMMENT '传真',
                  `Qualification` varchar(36) DEFAULT NULL COMMENT '资质',
                  `ServiceArea` varchar(128) DEFAULT NULL COMMENT '服务范围',
                  `Remark` varchar(255) DEFAULT NULL COMMENT '备注'
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "agency" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}agency`
                  ADD PRIMARY KEY (`ID`),
                  ADD UNIQUE KEY `Name` (`Name`);";

                mysql_query($alert, $con);

    }

    protected function createAssess($con, $prefix){

            $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}assess` (
              `ID` int(18) unsigned NOT NULL,
              `DepartID` decimal(18,0) NOT NULL COMMENT '部门ID',
              `Type` varchar(10) DEFAULT '评估' COMMENT '类型评估',
              `Year` varchar(12) NOT NULL COMMENT '年度',
              `CaseNumber` varchar(255) NOT NULL COMMENT '委托案号',
              `Supervise` varchar(50) DEFAULT NULL COMMENT '督办人',
              `SuperviseTel` varchar(50) DEFAULT NULL COMMENT '督办人电话',
              `FlowNumber` varchar(255) NOT NULL COMMENT '案件流水号',
              `Case` varchar(255) NOT NULL COMMENT '案由',
              `LitigantOne` varchar(255) DEFAULT NULL COMMENT '当事人1',
              `LitigantTwo` varchar(255) DEFAULT NULL COMMENT '当事人2',
              `EntrustDeparment` varchar(128) DEFAULT NULL COMMENT '委托部门',
              `Undertaker` varchar(50) DEFAULT NULL COMMENT '承办人',
              `UndertakerTel` varchar(50) DEFAULT NULL COMMENT '承办人电话',
              `TransferMaterial` varchar(255) DEFAULT NULL COMMENT '移交材料',
              `SubjectMatter` text COMMENT '标的物',
              `Agency` varchar(100) DEFAULT NULL COMMENT '评估机构',
              `Master` varchar(50) DEFAULT NULL COMMENT '评估师',
              `MasterTel` varchar(50) DEFAULT NULL COMMENT '评估师电话',
              `ChoiceWay` varchar(50) DEFAULT NULL COMMENT '选定方式',
              `ChoicedDate` date DEFAULT NULL COMMENT '选定日期',
              `CaseClosedDate` date DEFAULT NULL COMMENT '收案日期',
              `PutOnRecordDate` date DEFAULT NULL COMMENT '立案日期',
              `SuspendedDate` date DEFAULT NULL COMMENT '暂缓日期',
              `EntrustDate` date DEFAULT NULL COMMENT '委托日期',
              `MaterialsCompletionDate` date DEFAULT NULL COMMENT '材料补全日期',
              `RetractDate` date DEFAULT NULL COMMENT '撤回日期',
              `SiteSurveyDate` date DEFAULT NULL COMMENT '现场勘察日期',
              `GetbackDate` date DEFAULT NULL COMMENT '结案日期',
              `GetbackCycle` int(11) DEFAULT NULL COMMENT '结案周期',
              `Progress` varchar(36) DEFAULT NULL COMMENT '进度',
              `Money` decimal(20,4) DEFAULT NULL COMMENT '评估价',
              `ChargesDate` date DEFAULT NULL COMMENT '缴费日期',
              `Fee` decimal(20,4) DEFAULT NULL COMMENT '评估费用',
              `DeliveryCourtDate` date DEFAULT NULL COMMENT '送达业务庭日期',
              `FllowResult` varchar(50) DEFAULT NULL COMMENT '跟踪评查情况',
              `Remark` text COMMENT '备注',
              `Cycle` int(11) DEFAULT NULL COMMENT '评估周期',
              `PutOnRecordCycle` int(11) DEFAULT NULL COMMENT '立案周期',
              `EntrustCycle` int(11) DEFAULT NULL COMMENT '委托周期'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "assess" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}assess`
                  ADD PRIMARY KEY (`ID`),
                  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);";

                mysql_query($alert, $con);

    }

    protected function createAuction($con, $prefix){

            $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}auction` (
                      `ID` int(18) unsigned NOT NULL,
                      `DepartID` decimal(18,0) NOT NULL COMMENT '部门ID',
                      `Type` varchar(10) DEFAULT '评估' COMMENT '类型评估',
                      `Year` varchar(12) NOT NULL COMMENT '年度',
                      `CaseNumber` varchar(255) NOT NULL COMMENT '委托案号',
                      `Supervise` varchar(50) DEFAULT NULL COMMENT '督办人',
                      `SuperviseTel` varchar(50) DEFAULT NULL COMMENT '督办人电话',
                      `FlowNumber` varchar(255) NOT NULL COMMENT '案件流水号',
                      `Case` varchar(255) NOT NULL COMMENT '案由',
                      `LitigantOne` varchar(255) DEFAULT NULL COMMENT '当事人1',
                      `LitigantTwo` varchar(255) DEFAULT NULL COMMENT '当事人2',
                      `EntrustDeparment` varchar(128) DEFAULT NULL COMMENT '委托部门',
                      `Undertaker` varchar(50) DEFAULT NULL COMMENT '承办人',
                      `UndertakerTel` varchar(50) DEFAULT NULL COMMENT '承办人电话',
                      `TransferMaterial` varchar(255) DEFAULT NULL COMMENT '移交材料',
                      `SubjectMatter` text COMMENT '标的物',
                      `Agency` varchar(100) DEFAULT NULL COMMENT '拍卖机构',
                      `ChoiceWay` varchar(50) DEFAULT NULL COMMENT '选定方式',
                      `CaseClosedDate` date DEFAULT NULL COMMENT '收案日期',
                      `PutOnRecordDate` date DEFAULT NULL COMMENT '立案日期',
                      `GetbackDate` date DEFAULT NULL COMMENT '结案日期',
                      `EntrustDate` date DEFAULT NULL COMMENT '委托日期',
                      `Progress` varchar(36) DEFAULT NULL COMMENT '进度',
                      `AnnouncementDate1` date DEFAULT NULL COMMENT '第一次公告日期',
                      `TimeDate1` date DEFAULT NULL COMMENT '第一次拍卖日期',
                      `Status1` varchar(18) DEFAULT NULL COMMENT '第一次拍卖状态',
                      `StartAuctionPrice1` decimal(18,4) DEFAULT NULL COMMENT '第一次起拍价',
                      `Price1` decimal(18,4) DEFAULT NULL COMMENT '第一次拍卖价',
                      `AnnouncementDate2` date DEFAULT NULL COMMENT '第二次公告日期',
                      `TimeDate2` date DEFAULT NULL COMMENT '第二次拍卖日期',
                      `Status2` varchar(18) DEFAULT NULL COMMENT '第二次拍卖状态',
                      `StartAuctionPrice2` decimal(18,4) DEFAULT NULL COMMENT '第二次起拍价',
                      `Price2` decimal(18,4) DEFAULT NULL COMMENT '第二次拍卖价',
                      `AnnouncementDate3` date DEFAULT NULL COMMENT '第三次公告日期',
                      `TimeDate3` date DEFAULT NULL COMMENT '第三次拍卖日期',
                      `Status3` varchar(18) DEFAULT NULL COMMENT '第三次拍卖状态',
                      `StartAuctionPrice3` decimal(18,4) DEFAULT NULL COMMENT '第三次起拍价',
                      `Price3` decimal(18,4) DEFAULT NULL COMMENT '第三次拍卖价',
                      `AuctionStatus` varchar(10) DEFAULT NULL COMMENT '拍卖状态',
                      `AuctionPrice` decimal(20,4) DEFAULT NULL COMMENT '拍卖价格',
                      `AuctionDate` date DEFAULT NULL COMMENT '拍卖日期',
                      `ArrivalDate` date DEFAULT NULL COMMENT '拍卖款到帐日期',
                      `ArrivalCycle` date DEFAULT NULL COMMENT '到帐周期',
                      `SuspendedDate` date DEFAULT NULL COMMENT '暂缓日期',
                      `RetractDate` date DEFAULT NULL COMMENT '撤回日期',
                      `Fee` decimal(20,4) DEFAULT NULL COMMENT '拍卖费用',
                      `Master` varchar(20) DEFAULT NULL COMMENT '拍卖师',
                      `ChargesDate` date DEFAULT NULL COMMENT '缴费日期',
                      `Cycle` int(11) DEFAULT NULL COMMENT '拍卖周期',
                      `FllowResult` varchar(50) DEFAULT NULL COMMENT '跟踪评查情况',
                      `Remark` text COMMENT '备注',
                      `GetbackCycle` int(11) DEFAULT NULL COMMENT '结案周期',
                      `PutOnRecordCycle` int(11) DEFAULT NULL COMMENT '立案周期',
                      `EntrustCycle` int(11) DEFAULT NULL COMMENT '委托周期',
                      `SaleDate` date NOT NULL COMMENT '变卖日期',
                      `SalePrice` decimal(18,4) NOT NULL COMMENT '变卖价格',
                      `SaleStatus` varchar(10) NOT NULL COMMENT '变卖状态'
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "auction" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                 $alert = "ALTER TABLE `{$prefix}auction`
                  ADD PRIMARY KEY (`ID`),
                  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);";
                mysql_query($alert, $con);
    }

    protected function createBust($con, $prefix){

        $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}bust` (
                  `ID` int(18) unsigned NOT NULL,
                  `DepartID` decimal(18,0) NOT NULL COMMENT '部门ID',
                  `Type` varchar(10) DEFAULT '评估' COMMENT '类型评估',
                  `Year` varchar(12) NOT NULL COMMENT '年度',
                  `CaseNumber` varchar(255) NOT NULL COMMENT '委托案号',
                  `Supervise` varchar(50) DEFAULT NULL COMMENT '督办人',
                  `SuperviseTel` varchar(50) DEFAULT NULL COMMENT '督办人电话',
                  `FlowNumber` varchar(255) NOT NULL COMMENT '案件流水号',
                  `Case` varchar(255) NOT NULL COMMENT '案由',
                  `LitigantOne` varchar(255) DEFAULT NULL COMMENT '当事人1',
                  `LitigantTwo` varchar(255) DEFAULT NULL COMMENT '当事人2',
                  `EntrustDeparment` varchar(128) DEFAULT NULL COMMENT '委托部门',
                  `Undertaker` varchar(50) DEFAULT NULL COMMENT '承办人',
                  `UndertakerTel` varchar(50) DEFAULT NULL COMMENT '承办人电话',
                  `TransferMaterial` varchar(255) DEFAULT NULL COMMENT '移交材料',
                  `SubjectMatter` text COMMENT '标的物',
                  `Agency` varchar(255) DEFAULT NULL COMMENT '管理人/清算组',
                  `ChoiceWay` varchar(50) DEFAULT NULL COMMENT '选定方式',
                  `CaseClosedDate` date DEFAULT NULL COMMENT '收案日期',
                  `PutOnRecordDate` date DEFAULT NULL COMMENT '立案日期',
                  `PutOnRecordCycle` int(11) DEFAULT NULL COMMENT '立案周期',
                  `EntrustDate` date DEFAULT NULL COMMENT '委托日期',
                  `EntrustCycle` int(11) DEFAULT NULL COMMENT '委托周期',
                  `LiquidationDate` date DEFAULT NULL COMMENT '开始清算日期',
                  `GetbackDate` date DEFAULT NULL COMMENT '结案日期',
                  `Cycle` int(11) DEFAULT NULL COMMENT '破产周期',
                  `Progress` varchar(36) DEFAULT NULL COMMENT '进度',
                  `Fee` decimal(20,4) DEFAULT NULL COMMENT '清算费用',
                  `FllowResult` varchar(50) DEFAULT NULL COMMENT '跟踪评查情况',
                  `Remark` text COMMENT '备注/结论'
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "bust" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}bust`
                  ADD PRIMARY KEY (`ID`),
                  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);";
                mysql_query($alert, $con);

    }

    protected function createDepartment($con, $prefix){

            $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}department` (
                      `ID` int(11) NOT NULL,
                      `Name` varchar(128) NOT NULL,
                      `Number` varchar(255) NOT NULL,
                      `FlowNumber` varchar(64) NOT NULL,
                      `StartDate` date NOT NULL,
                      `EndDate` date NOT NULL,
                      `RegistrationCode` varchar(255) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "department" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}department`
                  ADD PRIMARY KEY (`ID`),
                  ADD UNIQUE KEY `Name_2` (`Name`),
                  ADD UNIQUE KEY `Number` (`Number`),
                  ADD KEY `Name` (`Name`,`Number`);";
                mysql_query($alert, $con);

    }

    protected function createDocument($con, $prefix){

            $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}document` (
                          `ID` int(11) NOT NULL,
                          `DepartmentNumber` int(11) NOT NULL,
                          `Name` varchar(255) DEFAULT NULL,
                          `Assess` tinyint(4) DEFAULT NULL,
                          `Identify` tinyint(4) DEFAULT NULL,
                          `Auction` tinyint(4) DEFAULT NULL,
                          `Project` tinyint(4) DEFAULT NULL,
                          `Bust` tinyint(4) DEFAULT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "document" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}document`
                         ADD PRIMARY KEY (`ID`);";
                mysql_query($alert, $con);

    }

    protected function createTemplate($con, $prefix){

            $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}document_template` (
                          `ID` int(11) NOT NULL,
                          `DocumentID` int(11) NOT NULL,
                          `URL` varchar(255) NOT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "document_template" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}document_template`
                        ADD PRIMARY KEY (`ID`);";
                mysql_query($alert, $con);
    }

    protected function createIdentify($con, $prefix){

            $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}identify` (
                          `ID` int(18) unsigned NOT NULL,
                          `DepartID` decimal(18,0) NOT NULL COMMENT '部门ID',
                          `Type` varchar(10) DEFAULT '评估' COMMENT '类型评估',
                          `Year` varchar(12) NOT NULL COMMENT '年度',
                          `CaseNumber` varchar(255) NOT NULL COMMENT '委托案号',
                          `Supervise` varchar(50) DEFAULT NULL COMMENT '督办人',
                          `SuperviseTel` varchar(50) DEFAULT NULL COMMENT '督办人电话',
                          `FlowNumber` varchar(255) NOT NULL COMMENT '案件流水号',
                          `Case` varchar(255) NOT NULL COMMENT '案由',
                          `LitigantOne` varchar(255) DEFAULT NULL COMMENT '当事人1',
                          `LitigantTwo` varchar(255) DEFAULT NULL COMMENT '当事人2',
                          `EntrustDeparment` varchar(128) DEFAULT NULL COMMENT '委托部门',
                          `Undertaker` varchar(50) DEFAULT NULL COMMENT '承办人',
                          `UndertakerTel` varchar(50) DEFAULT NULL COMMENT '承办人电话',
                          `TransferMaterial` varchar(255) DEFAULT NULL COMMENT '移交材料',
                          `SubjectMatter` text COMMENT '标的物',
                          `Agency` varchar(100) DEFAULT NULL COMMENT '鉴定机构',
                          `Master` varchar(50) DEFAULT NULL COMMENT '鉴定人',
                          `MasterTel` varchar(50) DEFAULT NULL COMMENT '鉴定人电话',
                          `ChoiceWay` varchar(50) DEFAULT NULL COMMENT '选定方式',
                          `ChoicedDate` date DEFAULT NULL COMMENT '选定日期',
                          `IdentifiedType` varchar(50) DEFAULT NULL COMMENT '鉴定类型',
                          `CaseClosedDate` date DEFAULT NULL COMMENT '收案日期',
                          `PutOnRecordDate` date DEFAULT NULL COMMENT '立案日期',
                          `SuspendedDate` date DEFAULT NULL COMMENT '暂缓日期',
                          `EntrustDate` date DEFAULT NULL COMMENT '委托日期',
                          `MaterialsCompletionDate` date DEFAULT NULL COMMENT '材料补全日期',
                          `RetractDate` date DEFAULT NULL COMMENT '撤回日期',
                          `SiteSurveyDate` date DEFAULT NULL COMMENT '现场勘察日期',
                          `GetbackDate` date DEFAULT NULL COMMENT '结案日期',
                          `Progress` varchar(36) DEFAULT NULL COMMENT '进度',
                          `DeliveryCourtDate` date DEFAULT NULL COMMENT '送达业务庭日期',
                          `GetbackCycle` int(11) DEFAULT NULL COMMENT '结案周期',
                          `FllowResult` varchar(50) DEFAULT NULL COMMENT '跟踪评查情况',
                          `Fee` decimal(20,4) DEFAULT NULL COMMENT '鉴定费用',
                          `Suggestion` varchar(50) DEFAULT NULL COMMENT '鉴定意见',
                          `SuggestionAdmissible` char(12) DEFAULT NULL COMMENT '鉴定意见是否采信',
                          `IdentifiedResult` text COMMENT '鉴定结论',
                          `Remark` text COMMENT '备注',
                          `Cycle` int(11) DEFAULT NULL COMMENT '鉴定周期',
                          `PutOnRecordCycle` int(11) DEFAULT NULL COMMENT '立案周期',
                          `EntrustCycle` int(11) DEFAULT NULL COMMENT '委托周期',
                          `SourceIdentifiedDepartment` varchar(255) DEFAULT NULL COMMENT '原鉴定单位',
                          `SourceIdentifiedResult` varchar(255) DEFAULT NULL COMMENT '原鉴定结果'
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "identify" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}identify`
                  ADD PRIMARY KEY (`ID`),
                  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);";
                mysql_query($alert, $con);

    }

    protected function createLogs($con, $prefix){

                $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}logs` (
                          `ID` int(10) unsigned NOT NULL,
                          `FlowNumber` varchar(255) NOT NULL,
                          `InputMan` varchar(36) NOT NULL,
                          `InputDate` datetime NOT NULL,
                          `CtrlType` varchar(36) NOT NULL,
                          `Department` varchar(255) NOT NULL DEFAULT '20032'
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "logs" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}logs`
                            ADD PRIMARY KEY (`ID`);";
                mysql_query($alert, $con);

    }

    protected function createPersonnel($con, $prefix){

            $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}personnel` (
                      `ID` int(10) unsigned NOT NULL COMMENT '主键ID',
                      `Number` varchar(45) NOT NULL COMMENT '用户帐号',
                      `Password` varchar(45) DEFAULT '000000' COMMENT '用户密码',
                      `LastOnlineTime` datetime DEFAULT NULL COMMENT '最后登录时间',
                      `Name` varchar(45) DEFAULT '员工' COMMENT '用户姓名',
                      `IDNumber` varchar(18) DEFAULT NULL,
                      `Sex` varchar(10) DEFAULT '男',
                      `Position` varchar(10) DEFAULT NULL,
                      `DepartmentNumber` varchar(45) NOT NULL COMMENT '部门编号',
                      `Address` varchar(255) DEFAULT NULL COMMENT '住址',
                      `CellNumber` varchar(45) DEFAULT NULL COMMENT '手机号码',
                      `TelNumber` varchar(45) DEFAULT NULL COMMENT '电话号码',
                      `Education` varchar(10) DEFAULT NULL COMMENT '教育学历',
                      `Remarks` varchar(45) DEFAULT NULL COMMENT '备注',
                      `TranVersion` varchar(255) DEFAULT NULL COMMENT '版本号',
                      `AccessToken` varchar(200) DEFAULT NULL,
                      `AuthKey` varchar(200) DEFAULT NULL,
                      `CreateTime` datetime DEFAULT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "personnel" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}personnel`
                  ADD PRIMARY KEY (`ID`),
                  ADD UNIQUE KEY `ida_user_UNIQUE` (`ID`),
                  ADD UNIQUE KEY `Number_UNIQUE` (`Number`),
                  ADD UNIQUE KEY `TranVersion_UNIQUE` (`TranVersion`);";
                mysql_query($alert, $con);

    }

    protected function createProject($con, $prefix){

            $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}project` (
                      `ID` int(18) unsigned NOT NULL,
                      `DepartID` decimal(18,0) NOT NULL COMMENT '部门ID',
                      `Type` varchar(10) DEFAULT '评估' COMMENT '类型评估',
                      `Year` varchar(12) NOT NULL COMMENT '年度',
                      `CaseNumber` varchar(255) NOT NULL COMMENT '委托案号',
                      `Supervise` varchar(50) DEFAULT NULL COMMENT '督办人',
                      `SuperviseTel` varchar(50) DEFAULT NULL COMMENT '督办人电话',
                      `FlowNumber` varchar(255) NOT NULL COMMENT '案件流水号',
                      `Case` varchar(255) NOT NULL COMMENT '案由',
                      `LitigantOne` varchar(255) DEFAULT NULL COMMENT '当事人1',
                      `LitigantTwo` varchar(255) DEFAULT NULL COMMENT '当事人2',
                      `EntrustDeparment` varchar(128) DEFAULT NULL COMMENT '委托部门',
                      `Undertaker` varchar(50) DEFAULT NULL COMMENT '承办人',
                      `UndertakerTel` varchar(50) DEFAULT NULL COMMENT '承办人电话',
                      `TransferMaterial` varchar(255) DEFAULT NULL COMMENT '移交材料',
                      `Claim` varchar(255) DEFAULT NULL COMMENT '鉴定要求',
                      `Agency` varchar(100) DEFAULT NULL COMMENT '鉴定机构',
                      `Master` varchar(50) DEFAULT NULL COMMENT '鉴定人',
                      `MasterTel` varchar(50) DEFAULT NULL COMMENT '鉴定人电话',
                      `ChoiceWay` varchar(50) DEFAULT NULL COMMENT '选定方式',
                      `ChoicedDate` date DEFAULT NULL COMMENT '选定日期',
                      `CaseClosedDate` date DEFAULT NULL COMMENT '收案日期',
                      `PutOnRecordDate` date DEFAULT NULL COMMENT '初稿日期',
                      `SuspendedDate` date DEFAULT NULL COMMENT '暂缓日期',
                      `EntrustDate` date DEFAULT NULL COMMENT '委托日期',
                      `MaterialsCompletionDate` date DEFAULT NULL COMMENT '材料补全日期',
                      `RetractDate` date DEFAULT NULL COMMENT '撤回日期',
                      `SiteSurveyDate` date DEFAULT NULL COMMENT '现场勘察日期',
                      `GetbackDate` date DEFAULT NULL COMMENT '结案日期',
                      `Progress` varchar(36) DEFAULT NULL COMMENT '进度',
                      `DeliveryCourtDate` date DEFAULT NULL COMMENT '送达业务庭日期',
                      `GetbackCycle` int(11) DEFAULT NULL COMMENT '结案周期',
                      `FllowResult` varchar(50) DEFAULT NULL COMMENT '跟踪评查情况',
                      `Fee` decimal(20,4) DEFAULT NULL COMMENT '鉴定费用',
                      `Suggestion` varchar(255) DEFAULT NULL COMMENT '鉴定意见',
                      `SourceIdentifiedDepartment` varchar(1000) DEFAULT NULL COMMENT '原鉴定机构',
                      `SourceIdentifiedResult` varchar(200) DEFAULT NULL COMMENT '原鉴定结论',
                      `Remark` text COMMENT '备注',
                      `Cycle` int(11) DEFAULT NULL COMMENT '鉴定周期',
                      `PutOnRecordCycle` int(11) DEFAULT NULL COMMENT '立案周期',
                      `EntrustCycle` int(11) DEFAULT NULL COMMENT '委托周期'
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "project" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

                $alert = "ALTER TABLE `{$prefix}project`
                      ADD PRIMARY KEY (`ID`),
                      ADD UNIQUE KEY `ID_UNIQUE` (`ID`);";
                mysql_query($alert, $con);

    }

    protected function createReport($con, $prefix){

            $tb = "CREATE TABLE IF NOT EXISTS `{$prefix}report` (
                          `ID` int(11) NOT NULL,
                          `UID` int(11) NOT NULL,
                          `Name` varchar(255) NOT NULL,
                          `URL` varchar(255) DEFAULT NULL,
                          `Type` varchar(36) NOT NULL
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                echo date("Y-m-d G:i:s") . "创建" . $prefix . "report" . "表";
                $this->progress("", "");
                if(mysql_query($tb, $con)){
                    echo "成功\n";
                }

              $alert = "ALTER TABLE `{$prefix}report`
                            ADD PRIMARY KEY (`ID`);";
                mysql_query($alert, $con);  

    }

    protected function end($con, $prefix){

            $sql1 = "ALTER TABLE `{$prefix}admin` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
            mysql_query($sql1);

            $sql2 = "ALTER TABLE `{$prefix}agency` MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '序号';";
            mysql_query($sql2);

            $sql3 = "ALTER TABLE `{$prefix}assess` MODIFY `ID` int(18) unsigned NOT NULL AUTO_INCREMENT;";
            mysql_query($sql3);

            $sql4 = "ALTER TABLE `{$prefix}auction` MODIFY `ID` int(18) unsigned NOT NULL AUTO_INCREMENT;";
            mysql_query($sql4);

            $sql5 = "ALTER TABLE `{$prefix}bust` MODIFY `ID` int(18) unsigned NOT NULL AUTO_INCREMENT;";
            mysql_query($sql5);

            $sql6 = "ALTER TABLE `{$prefix}department` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
            mysql_query($sql6);

            $sql7 = "ALTER TABLE `{$prefix}document` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
            mysql_query($sql7);

            $sql8 = "ALTER TABLE `{$prefix}document_template` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
            mysql_query($sql8);

            $sql9 = "ALTER TABLE `{$prefix}identify` MODIFY `ID` int(18) unsigned NOT NULL AUTO_INCREMENT;";
            mysql_query($sql9);

            $sql10 = "ALTER TABLE `{$prefix}logs` MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;";
            mysql_query($sql10);

            $sql11 = "ALTER TABLE `{$prefix}personnel` MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID';";
            mysql_query($sql11);

            $sql12 = "ALTER TABLE `{$prefix}project` MODIFY `ID` int(18) unsigned NOT NULL AUTO_INCREMENT;";
            mysql_query($sql12);

            $sql13 = "ALTER TABLE `{$prefix}report` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
            mysql_query($sql13);

    }



}