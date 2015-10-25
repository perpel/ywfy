-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-10-25 15:26:23
-- 服务器版本： 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archives`
--

-- --------------------------------------------------------

--
-- 表的结构 `a_agency`
--

CREATE TABLE IF NOT EXISTS `a_agency` (
  `ID` int(10) unsigned NOT NULL COMMENT '序号',
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_agency`
--

INSERT INTO `a_agency` (`ID`, `Type`, `Name`, `LicenseNumber`, `Contacts`, `ContactsPhone`, `LegalRepresentative`, `LegalRepresentativePhone`, `Tel`, `Fax`, `Qualification`, `ServiceArea`, `Remark`) VALUES
(2, '鉴定', '1231231', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '评估', '12312', '12312', '3123', '135365467', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '拍卖', '的撒发送', ' 法定萨傅', ' 苏打粉诉', ' 萨萨 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '评估', '123121', '213', '', 'fsdf ', '', '', NULL, NULL, NULL, NULL, NULL),
(6, '拍卖', 'w2313', '213 ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '评估', '诉阿', ' 的撒', ' 送达', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '工程造价', ' 司法2', ' 阿凡提阿', ' 送达', ' 送达', '傅苏打粉', ' 萨傅', ' 苏打粉', ' ', NULL, NULL, NULL),
(9, '评估', '213', '321312', '3213', 'werw', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'case', '123213', 'fsdfa', NULL, 'fasdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'case', 'qwewqe', 'weqrwqr', 'weqreqw', 'weqr', 'ewqr', 'rweqrwqe', 'rewqr', 'eqwr', 'qwerqwe', 'weqr', 'wqre'),
(13, 'case', 'ewqr', 'ewqr', 'qwer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'case', 'wqer', 'rweqr', 'weqr', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '鉴定', 'qwewq', 'weqe', 'wqeqw', 'wqewq', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '破产', '12321321', '213', '123', '213', '', NULL, NULL, NULL, NULL, NULL, NULL),
(18, '工程造价', '1231', '213', '213', '213', '213', '123', '123', '1', NULL, NULL, NULL),
(19, '工程造价', '21312', '213', NULL, '123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `a_basic_case`
--

CREATE TABLE IF NOT EXISTS `a_basic_case` (
  `ID` int(11) NOT NULL COMMENT '序号',
  `Type` varchar(64) DEFAULT '案由' COMMENT '类别',
  `Name` varchar(255) DEFAULT NULL COMMENT '名称',
  `Remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_basic_case`
--

INSERT INTO `a_basic_case` (`ID`, `Type`, `Name`, `Remark`) VALUES
(1, 'ceshi', '123', NULL),
(2, '案由', 'AAA', '152123'),
(3, '案由', 'BBBB', NULL),
(13, '案由', ' 萨发送到傅', '的撒'),
(14, '案由', '送达12131', ' 的撒'),
(19, '案由', 'aaaaaaaaaaaaaa', ''),
(20, '案由', 'bbbbbbbbbbbbbbba', NULL),
(21, '案由', 'dddddddddddddddd', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `a_conclusion`
--

CREATE TABLE IF NOT EXISTS `a_conclusion` (
  `ID` int(18) unsigned NOT NULL,
  `DepartID` decimal(18,0) NOT NULL COMMENT '	',
  `ModuleType` varchar(25) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Year` varchar(12) NOT NULL COMMENT '	',
  `FlowNumber` varchar(50) NOT NULL,
  `CaseNumber` varchar(50) NOT NULL COMMENT '		',
  `Case` varchar(50) NOT NULL,
  `SubjectMatter` text COMMENT '标的物',
  `LitigantOne` varchar(200) DEFAULT NULL COMMENT '当事人1',
  `LitigantTwo` varchar(200) DEFAULT NULL COMMENT '当事人2',
  `TransferMaterial` varchar(50) DEFAULT NULL COMMENT '移交材料',
  `Supervise` varchar(20) DEFAULT NULL COMMENT '督办人',
  `Chambers` varchar(20) DEFAULT NULL COMMENT '业务庭承办人',
  `Agency` varchar(100) DEFAULT NULL,
  `JudgmentExecuteReceives` datetime DEFAULT NULL COMMENT '审判执行收卷日期',
  `TropschOffice` datetime DEFAULT NULL COMMENT '托办日期',
  `SendCycle` int(11) DEFAULT NULL COMMENT '送卷周期',
  `SendDate` datetime DEFAULT NULL COMMENT '送卷时间',
  `EntrustCycle` int(11) DEFAULT NULL COMMENT '委托周期',
  `MaterialsCompletionDate` datetime DEFAULT NULL COMMENT '材料补全日期',
  `GetbackDate` datetime DEFAULT NULL COMMENT '回卷日期',
  `Cycle` int(11) DEFAULT NULL COMMENT '周期',
  `Result` varchar(10) DEFAULT NULL COMMENT '结果',
  `Price` decimal(18,2) DEFAULT NULL,
  `UnitID` int(11) DEFAULT NULL,
  `InputMan` varchar(10) DEFAULT NULL,
  `InputDate` datetime DEFAULT NULL,
  `EditMan` varchar(10) DEFAULT NULL,
  `EditDate` datetime DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  `EntrustDeparment` varchar(50) DEFAULT NULL COMMENT '委托部门',
  `ChoiceWay` varchar(10) DEFAULT NULL COMMENT '选定方式',
  `Money` decimal(18,4) DEFAULT NULL COMMENT '费用',
  `IsAdoption` int(11) DEFAULT NULL COMMENT '是否采纳',
  `FllowResult` varchar(50) DEFAULT NULL COMMENT '跟踪评查情况',
  `Time1` datetime DEFAULT NULL,
  `Status1` varchar(10) DEFAULT NULL,
  `Price1` decimal(18,4) DEFAULT NULL,
  `Time2` datetime DEFAULT NULL,
  `Status2` varchar(10) DEFAULT NULL,
  `Price2` decimal(18,4) DEFAULT NULL,
  `Time3` datetime DEFAULT NULL,
  `Status3` varchar(10) DEFAULT NULL,
  `Price3` decimal(18,4) DEFAULT NULL,
  `Time4` datetime DEFAULT NULL,
  `BeginDate` datetime DEFAULT NULL,
  `IdentifiedType` varchar(10) DEFAULT NULL COMMENT '鉴定类型',
  `IdentifiedCondition` text COMMENT '鉴定要求',
  `ChoicedDate` datetime DEFAULT NULL COMMENT '选定日期',
  `FirstDraftDate` datetime DEFAULT NULL COMMENT '初稿日期',
  `AnnouncementDate1` datetime DEFAULT NULL COMMENT '公告一',
  `StartAuctionPrice1` decimal(18,4) DEFAULT NULL COMMENT '起拍价一',
  `AnnouncementDate2` datetime DEFAULT NULL COMMENT '公告二',
  `StartAuctionPrice2` decimal(18,4) DEFAULT NULL COMMENT '起拍价二',
  `AnnouncementDate3` datetime DEFAULT NULL COMMENT '公告三',
  `StartAuctionPrice3` decimal(18,4) DEFAULT NULL COMMENT '起拍价三',
  `NotifyPaymentDate` datetime DEFAULT NULL COMMENT '通知收费日期',
  `ChargesDate` datetime DEFAULT NULL COMMENT '缴费日期',
  `SiteSurveyDate` datetime DEFAULT NULL COMMENT '现场勘察日期',
  `IdentifiedResult` text COMMENT '鉴定结果',
  `Unadoption` varchar(1000) DEFAULT NULL COMMENT '机构名称',
  `SourceIdentifiedDepartment` varchar(1000) DEFAULT NULL COMMENT '原鉴定单位',
  `SourceIdentifiedResult` varchar(200) DEFAULT NULL COMMENT '原鉴定结果',
  `UndertakerTel` varchar(50) DEFAULT NULL COMMENT '承办人电话',
  `SuperviseTel` varchar(50) DEFAULT NULL COMMENT '督办人电话',
  `TotalDate` datetime DEFAULT NULL,
  `AuctionStatus` varchar(10) DEFAULT NULL COMMENT '拍卖状态',
  `AuctionPrice` decimal(20,4) DEFAULT NULL COMMENT '拍卖价格',
  `AuctionDate` datetime DEFAULT NULL COMMENT '拍卖日期',
  `SuspendedDate` datetime DEFAULT NULL COMMENT '暂缓日期',
  `Assessor` varchar(20) DEFAULT NULL COMMENT '评估师',
  `AssessorTel` varchar(20) DEFAULT NULL COMMENT '评估师电话',
  `DeliveryCourtDate` datetime DEFAULT NULL COMMENT '送达业务庭日期',
  `SaleDate` datetime DEFAULT NULL,
  `SalePrice` decimal(18,4) DEFAULT NULL,
  `SaleStatus` varchar(10) DEFAULT NULL,
  `RetractDate` datetime DEFAULT NULL,
  `TranVersion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_conclusion`
--

INSERT INTO `a_conclusion` (`ID`, `DepartID`, `ModuleType`, `Type`, `Year`, `FlowNumber`, `CaseNumber`, `Case`, `SubjectMatter`, `LitigantOne`, `LitigantTwo`, `TransferMaterial`, `Supervise`, `Chambers`, `Agency`, `JudgmentExecuteReceives`, `TropschOffice`, `SendCycle`, `SendDate`, `EntrustCycle`, `MaterialsCompletionDate`, `GetbackDate`, `Cycle`, `Result`, `Price`, `UnitID`, `InputMan`, `InputDate`, `EditMan`, `EditDate`, `Remark`, `EntrustDeparment`, `ChoiceWay`, `Money`, `IsAdoption`, `FllowResult`, `Time1`, `Status1`, `Price1`, `Time2`, `Status2`, `Price2`, `Time3`, `Status3`, `Price3`, `Time4`, `BeginDate`, `IdentifiedType`, `IdentifiedCondition`, `ChoicedDate`, `FirstDraftDate`, `AnnouncementDate1`, `StartAuctionPrice1`, `AnnouncementDate2`, `StartAuctionPrice2`, `AnnouncementDate3`, `StartAuctionPrice3`, `NotifyPaymentDate`, `ChargesDate`, `SiteSurveyDate`, `IdentifiedResult`, `Unadoption`, `SourceIdentifiedDepartment`, `SourceIdentifiedResult`, `UndertakerTel`, `SuperviseTel`, `TotalDate`, `AuctionStatus`, `AuctionPrice`, `AuctionDate`, `SuspendedDate`, `Assessor`, `AssessorTel`, `DeliveryCourtDate`, `SaleDate`, `SalePrice`, `SaleStatus`, `RetractDate`, `TranVersion`) VALUES
(112, '20032', '审判', '评估', '2015', '(2015)浙义法委鉴4号', '（2014）金义商初字第3124号', '股权转让纠纷', '', '黄克云', '蒋展峰、于斌华', '对收条“今收到黄克云购买义乌市明盛袜厂50%股份预付款肆拾万元整（400000），蒋展峰，2013年', '', '85328279', '123121', NULL, '2015-01-06 00:00:00', NULL, '2015-01-07 00:00:00', 0, '2015-01-07 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '招标', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '文书', '', '2015-01-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '季东勤', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(113, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴5号', '（2014）金义立预字第714号', '机动车交通事故责任纠纷', NULL, '施燕', '袁勇等人', '对原告的伤残等级进行重新鉴定', '', '85328076', '金华精诚司法鉴定所', NULL, '2015-01-06 00:00:00', NULL, '2015-01-07 00:00:00', 0, '2015-01-07 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '于月才', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(116, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴6号', '（2015）金义立预字第2号', '机动车交通事故责任纠纷', NULL, '王顺远', '骆文棋等人', '对原告精神障碍、伤残等级以及误工、营养、护理期限进行鉴定', '', '85258536', '金华天鉴司法鉴定所', NULL, '2015-01-07 00:00:00', NULL, '2015-01-07 00:00:00', 0, '2015-01-07 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '指定', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '陈琳', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(117, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴9号', '（2014）金义立预字第724号', '机动车交通事故责任纠纷', NULL, '陈中跃', '方陶福等人', '对原告的伤残等级、误工期限进行重新鉴定', '', '85258536', '金华精诚司法鉴定所', NULL, '2015-01-07 00:00:00', NULL, '2015-01-08 00:00:00', 1, '2015-01-07 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '陈琳', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(118, '20032', '审判', '评估', '2007', '(2015)浙义法委鉴8号', '（2014）金义立预字第700号', '机动车交通事故责任纠纷', '', '许贞俊', '汪家鸿等人', '对原告的误工期限进行重新鉴定', '', '85328079', '12312', NULL, '2015-01-07 00:00:00', NULL, '2015-01-08 00:00:00', 0, '2015-01-15 00:00:00', '0000-00-00 00:00:00', 2015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '随机', NULL, NULL, '18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-13 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '未缴费，退回', NULL, '', '', '蒋华锋', '', NULL, '暂缓', NULL, NULL, '2015-10-16 00:00:00', '', '', NULL, NULL, NULL, NULL, '2015-10-13 00:00:00', NULL),
(119, '20032', '审判', '评估', '2015', '(2015)浙义法委鉴7号', '（2014）金义立预字第725号', '机动车交通事故责任纠纷', '', '张守棋', '梅川等人', '对原告的伤残等级进行重新鉴定', '', '85328079', '金华精诚司法鉴定所', NULL, '2015-01-06 00:00:00', NULL, '2015-01-07 00:00:00', 0, '2015-01-07 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-07 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '广福司法鉴定所', '十级、九级', '蒋华锋', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(120, '20032', '审判', '评估', '2015', '(2015)浙义法委鉴10号', '(2015)金义立预字第20号', '机动车交通事故责任纠纷', '', '周丽花', '楼定国等人', '对原告伤残等级、误工期限、护理期限、营养期限进行鉴定', '', '85328076', '金华职业技术学院司法鉴定所', NULL, '2015-01-08 00:00:00', NULL, '2015-01-08 00:00:00', 0, '2015-01-08 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '于月才', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(121, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴11号', '（2015）金义立预字第21号', '机动车交通事故责任纠纷', NULL, '方胡福', '施清林等人', '对原告伤残等级、误工期限、护理期限、营养期限进行鉴定', '', '85328076', '金华广福司法鉴定所', NULL, '2015-01-08 00:00:00', NULL, '2015-01-08 00:00:00', 0, '2015-01-08 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-08 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '于月才', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(122, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴13号', '(2014)金义立预字第690号', '建设工程施工合同纠纷', NULL, '核工业金华建设工程公司', '义乌市供销合作总社', '原告在本工程中使用的材质名称（复合型风管）跟合同约定的材料是否一致', '', '85328292', '杭州标质技术检测有限公司', NULL, '2015-01-13 00:00:00', NULL, '2015-01-14 00:00:00', 0, '2015-01-14 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '简二庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '产品质量', '', '2015-01-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '毛滨', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(123, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴12号', '(2014）金义立预字第660号', '医疗损害责任纠纷', NULL, '王樟钱等人', '义乌市第二人民医院', '被申请人的医疗行为与患者的损害后果之间有无关系，如存在因果关系，请明确参与度', '', '85328238', '金华医学会', NULL, '2015-01-09 00:00:00', NULL, '2015-01-09 00:00:00', 0, '2015-01-09 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ' 民一庭', '指定', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '吴新辉', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(124, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴16号', '（2015）金义立预字第29号', '提供劳务者受害责任纠纷', NULL, '邵强', '王关田', '对原告的伤残等级、误工期限、营养期限、后期治疗费、医药费的合理性进行鉴定', '', '85328292', '金华广福司法鉴定所', NULL, '2015-01-13 00:00:00', NULL, '2015-01-14 00:00:00', 0, '2015-01-14 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '简二庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '毛滨', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(128, '20032', '审判', '鉴定', '2015', '(2015)浙义法委鉴18号', '（2015）金义佛堂商初字第48号', '买卖合同纠纷', '', '陈景富', '王新明', '被告王新明在欠条上的签名“王新明”是否本人所写及欠条上“在2013年年底付清”这句话是否与欠条主文同', '', '85728219', '浙江汉博司法鉴定中心', NULL, '2015-01-13 00:00:00', NULL, '2015-01-15 00:00:00', 0, '2015-01-15 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '指定', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '文书', '', '2015-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '傅建星', '', NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(129, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴19号', '（2015）金义民初字第217号', '机动车交通事故责任纠纷', NULL, '吴常军', '宗江飞等人', '对原告的伤残等级进行重新鉴定', '', '85258537', '金华精诚司法鉴定所', NULL, '2015-01-15 00:00:00', NULL, '2015-01-15 00:00:00', 0, '2015-01-15 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '黄晓青', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(130, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴21号', '（2013）金义民初字第2111号', '物权保护纠纷', NULL, '方榴英', '陈旭芳', '1.对原告居住房屋漏水的原因是什么，是否由楼上住户（被告）造成。2.原告的财产损失与被告的房屋漏水是', '', '85328102', '浙江中浩应用工程技术研究院有限公司', NULL, '2015-01-16 00:00:00', NULL, '2015-01-16 00:00:00', 0, '2015-01-16 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '简二庭', '指定', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '产品质量', '', '2015-01-16 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '何小甫', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(132, '20032', '执行', '鉴定', '2015', '(2015)浙义法委鉴20号', '(2015)金义民初字第27号', '机动车交通事故责任纠纷', NULL, '骆东健', '张应生等人', '对原告所有的浙G0R866号车辆因交通事故所造成的损失参照当地市场价格进行重新鉴定', '', '85414205', '浦江县诚公旧机动车评估鉴定有限公司', NULL, '2015-01-15 00:00:00', NULL, '2015-01-15 00:00:00', 0, '2015-01-15 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '其他', '', '2015-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '黄晓青', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(133, '20032', '审判', '鉴定', '2015', '(2015)浙义法委鉴25号', '（2015）金义苏溪民初字第2号', '建设工程施工合同纠纷', NULL, '傅永丰', '义乌市大陈镇宦塘村民委员会等人', '对义乌市大陈镇宦塘村村口公园景观工程的造价进行鉴定', '', '85914909', '浙江华耀建设咨询有限公司金华分公司', NULL, '2015-01-20 00:00:00', NULL, '2015-01-21 00:00:00', 0, '2015-01-21 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '指定', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '工程造价', '', '2015-01-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '张小燕', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(136, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴27号', '（2015）金义立预字第12号', '机动车交通事故责任纠纷', NULL, '金永余', '陈克平等人', '对原告的伤残等级、护理期限、营养期限、误工期限及后续治疗费进行重新鉴定', '', '85328076', '金华广福司法鉴定所', NULL, '2015-01-20 00:00:00', NULL, '2015-01-21 00:00:00', 0, '2015-01-21 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '于月才', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(137, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴28号', '（2014）金义立预字第717号', '机动车交通事故责任纠纷', NULL, '胡飞', '黄世良等人', '对原告的伤残等级进行重新鉴定', '', '85328079', '金华职业技术学院司法鉴定所', NULL, '2015-01-20 00:00:00', NULL, '2015-01-21 00:00:00', 0, '2015-01-21 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '蒋华锋', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(138, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴29号', '（2015）金义立预字第23号', '机动车交通事故责任纠纷', NULL, '郎向', '蒋荃领等人', '对原告的伤残等级、误工期限、营养期限、护理期限进行鉴定', '', '85328079', '金华广福司法鉴定所', NULL, '2015-01-20 00:00:00', NULL, '2015-01-21 00:00:00', 0, '2015-01-21 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '蒋华锋', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(139, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴26号', '（2015）金义立预字第9号', '机动车交通事故责任纠纷', NULL, '王家信', '林成元等人', '对原告的伤残等级进行重新鉴定', '', '85328076', '金华精诚司法鉴定所', NULL, '2015-01-20 00:00:00', NULL, '2015-01-21 00:00:00', 0, '2015-01-21 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '于月才', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(140, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴30号', '(2015)金义立预字第45号', '机动车交通事故责任纠纷', NULL, '冯树根', '甄素萍等人', '对原告伤残等级、误工期限、营养期限、护理期限进行鉴定', '', '85258536', '金华精诚司法鉴定所', NULL, '2015-01-20 00:00:00', NULL, '2015-01-21 00:00:00', 0, '2015-01-21 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-21 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '陈琳', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(142, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴33号', '（2015）金义立预字第18号', '机动车交通事故责任纠纷', NULL, '方雨田', '王锦月', '对原告的伤残等级、误工期限、营养期限、护理期限进行重新鉴定', '', '85328079', '金华精诚司法鉴定所', NULL, '2015-01-27 00:00:00', NULL, '2015-01-28 00:00:00', 0, '2015-01-28 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '蒋华锋', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(143, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴32号', '(2015）金义立预字第24号', '机动车交通事故责任纠纷', NULL, '傅肃钧', '黄建伟等人', '对原告右手和右脚进行伤残等级鉴定，对后续治疗费进行鉴定', '', '85328076', '金华广福司法鉴定所', NULL, '2015-01-27 00:00:00', NULL, '2015-01-28 00:00:00', 0, '2015-01-28 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '于月才', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(144, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴34号', '（2015）金义民初字第254号', '机动车交通事故责任纠纷', NULL, '杨通春', '吴建荣', '对原告的误工期限、护理期限、营养期限进行重新鉴定，对护理依赖程度进行鉴定', '', '85328079', '金华职业技术学院司法鉴定所', NULL, '2015-01-27 00:00:00', NULL, '2015-01-28 00:00:00', 0, '2015-01-28 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '蒋华锋', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(145, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴36号', '（2014）金义行初字第113号', '诉街道其他行政行为', NULL, '刘兴民', '义乌市人民政府后宅街道办事处', '对义乌市人民政府后宅街道办事处提供的“旧房收回契约”的“刘兴民”签字和指纹进行鉴定', '', '85328235', '金华精诚司法鉴定所', NULL, '2015-01-28 00:00:00', NULL, NULL, NULL, '2015-01-29 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '行政庭', '指定', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '文书', '', '2015-01-29 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '贾明明', NULL, NULL, '立案', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(146, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴35号', '（2015）金义立预字第36号', '机动车交通事故责任纠纷', NULL, '郭晓川', '金振华等人', '对原告的伤残等级进行重新鉴定', '', '85328079', '金华广福司法鉴定所', NULL, '2015-01-27 00:00:00', NULL, '2015-01-28 00:00:00', 0, '2015-01-28 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '民三庭', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '法医', '', '2015-01-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '蒋华锋', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(147, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴37号', '（2014）金义民初字第3074号', '财产损害赔偿纠纷', NULL, '陈贤来、楼金红', '张光森、王云', '一、对义乌市苏溪镇下陈村上村六层的七间水泥混泥土框架结构的房屋的主体结构做损伤鉴定', '', '85328327', '浙江省建筑科学设计研究院有限公司', NULL, '2015-02-02 00:00:00', NULL, '2015-02-02 00:00:00', 0, '2015-02-02 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '简二庭', '指定', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '产品质量', '', '2015-02-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '陈锦忠', NULL, NULL, '委托', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(148, '20032', '', '鉴定', '2015', '(2015)浙义法委鉴38号', '3213213', '保证合同纠纷', NULL, '123213', '213213', 'rwerwerwe', '21312', '1231232134', '国家安全生产宜春烟花爆竹检测中心,国家建筑工程质量监督检验中心司法鉴定所', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '佛堂', '随机', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '工程质量', 'werwerewr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', NULL, NULL, '收卷', NULL, NULL, NULL, '', 'ewrwe', NULL, NULL, NULL, NULL, NULL, NULL),
(149, '0', '审判', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, '20032', '', '评估', '0', 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, '20032', '', '评估', '0', 'KKKKKKKKK', 'KKKKKKKKKKKKKk', 'KKKKKKKKKKKKK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, '20032', '', '评估', '0', 'qrewreqw', 'rqwereqw', 'reqwreqw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, '20032', '', '评估', '0', 'f', 'wwwwwwwwww', 'wwwwwwwwwww', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, '20032', '', '评估', '0', 'bbbbbb', 'bbb', 'bbb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, '20032', '', '评估', '0', 'bbbbbqqqq', 'bb', 'bb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, '20032', '', '评估', '0', 'bvv', 'ccc', 'ccc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, '20032', '', '评估', '0', 'mmmm', 'mm', 'mm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, '20032', '审判', '评估', '2011', '啊啊啊啊啊', '啊啊啊啊啊', '啊啊啊啊啊', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(186, '20032', '审判', '评估', '2014', '000000000000', 'sadas', 'sada', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(201, '20032', '执行', '评估', '2015', '2015', '(2011)金义执民字第3472号', '借款合同纠纷', '', '金华银行股份有', '义乌市牧野工艺品厂', '', '', '龚凌槐', '杭州永正房地产土地评估有限公司义乌分公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-01 00:00:00', 0, '2042-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85715305', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(202, '20032', '执行', '评估', '2015', '2015浙义法委评4号', '（2014）金义执民字第6648号', '信用卡纠纷', '浙GH725U汽车一辆', '中国工行义乌分行', '叶真荣', '', '', '吴坚', '金华市安顺旧机动车鉴定估价有限公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-02 00:00:00', 0, '2042-01-02 00:00:00', '2015-12-10 00:00:00', 15, NULL, '26.20', NULL, NULL, NULL, NULL, NULL, '', '', '摇号', '2500.0000', NULL, '92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-02-06 00:00:00', NULL, NULL, NULL, NULL, NULL, '85328319', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(203, '20032', '执行', '评估', '0', '2015浙义法委评5号', '（2014）金义执民字第4986号1', '民间借贷纠纷', '车牌号为浙G232CC小型汽车一辆', '朱永平', '陈中卫', '', '', '楼豇炜', '金华市安顺旧机动车鉴定估价有限公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-02 00:00:00', 0, '2042-01-02 00:00:00', '2042-02-07 00:00:00', 15, NULL, '14.50', NULL, NULL, NULL, NULL, NULL, '', '', '摇号', '1500.0000', NULL, '92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-12-10 00:00:00', NULL, NULL, NULL, NULL, NULL, '85328278', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(206, '20032', '审判', '评估', '2015', '2015浙义法委评4号', '（2014）金义执民字第6648号', '信用卡纠纷', '浙GH725U汽车一辆', '中国工行义乌分行', '叶真荣', '', '', '吴坚', '金华市安顺旧机动车鉴定估价有限公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-02 00:00:00', 0, '2042-01-02 00:00:00', '2015-12-10 00:00:00', 15, NULL, '26.20', NULL, NULL, NULL, NULL, NULL, '', '', '摇号', '2500.0000', NULL, '92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-02-06 00:00:00', NULL, NULL, NULL, NULL, NULL, '85328319', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(207, '20032', '审判', '评估', '2015', '2015', '(2011)金义执民字第3472号', '借款合同纠纷', '', '金华银行股份有', '义乌市牧野工艺品厂', '', '', '龚凌槐', '杭州永正房地产土地评估有限公司义乌分公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-01 00:00:00', 0, '2042-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85715305', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(208, '20032', '审判', '评估', '2015', '2015浙义法委评5号', '（2014）金义执民字第4986号', '民间借贷纠纷', '车牌号为浙G232CC小型汽车一辆', '朱永平', '陈中卫', '', '', '楼豇炜', '金华市安顺旧机动车鉴定估价有限公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-02 00:00:00', 0, '2042-01-02 00:00:00', '2042-02-07 00:00:00', 15, NULL, '14.50', NULL, NULL, NULL, NULL, NULL, '', '', '摇号', '1500.0000', NULL, '92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-12-10 00:00:00', NULL, NULL, NULL, NULL, NULL, '85328278', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(209, '20032', '审判', '评估', '0', '苏打粉', ' 阿斯顿傅', ' 苏打粉', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, '20032', '审判', '评估', '2015', '2015', '(2011)金义执民字第3472号', '借款合同纠纷', '', '金华银行股份有', '义乌市牧野工艺品厂', '2', '龚凌槐', '', '杭州永正房地产土地评估有限公司义乌分公司', NULL, '2042-00-09 00:00:00', NULL, NULL, 42011, '2042-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '', '85715305', NULL, '完成', NULL, NULL, '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(213, '20032', '审判', '评估', '2015', '2015浙义法委评4号', '（2014）金义执民字第6648号', '信用卡纠纷', '浙GH725U汽车一辆', '中国工行义乌分行', '叶真荣', '', '', '吴坚', '金华市安顺旧机动车鉴定估价有限公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-02 00:00:00', 0, '2042-01-02 00:00:00', '2015-12-10 00:00:00', 15, NULL, '26.20', NULL, NULL, NULL, NULL, NULL, '', '', '摇号', '2500.0000', NULL, '92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-02-06 00:00:00', NULL, NULL, NULL, NULL, NULL, '85328319', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(214, '20032', '鉴定', '评估', '2015', '2015浙义法委评4号', '（2014）金义执民字第6648号', '信用卡纠纷', '浙GH725U汽车一辆', '中国工行义乌分行', '叶真荣', '3', '', '吴坚', '金华市安顺旧机动车鉴定估价有限公司', NULL, '2042-00-09 00:00:00', NULL, NULL, 42012, '2042-01-02 00:00:00', '2015-12-10 00:00:00', 15, NULL, '26.20', NULL, NULL, NULL, NULL, NULL, '', '', '摇号', '2500.0000', NULL, '92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-02-06 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '85328319', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(215, '20032', '鉴定', '评估', '2015', '2015浙义法委评5号', '（2014）金义执民字第4986号', '民间借贷纠纷', '车牌号为浙G232CC小型汽车一辆', '朱永平', '陈中卫', '3', '', '楼豇炜', '金华市安顺旧机动车鉴定估价有限公司', NULL, '2042-00-09 00:00:00', NULL, NULL, 42012, '2042-01-02 00:00:00', '2042-02-07 00:00:00', 15, NULL, '14.50', NULL, NULL, NULL, NULL, NULL, '', '', '摇号', '1500.0000', NULL, '92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-12-10 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '85328278', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(216, '20032', '审判', '拍卖', '2015', '2015浙义法委评4号', '（2014）金义执民字第6648号', '信用卡纠纷', '浙GH725U汽车一辆', '中国工行义乌分行', '叶真荣', '', '', '吴坚', '金华市安顺旧机动车鉴定估价有限公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-02 00:00:00', 0, '2042-01-02 00:00:00', '2015-12-10 00:00:00', 15, NULL, '26.20', NULL, NULL, NULL, NULL, NULL, '', '', '摇号', '2500.0000', NULL, '92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-02-06 00:00:00', NULL, NULL, NULL, NULL, NULL, '85328319', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(217, '20032', '审判', '拍卖', '2015', '2015浙义法委评5号', '（2014）金义执民字第4986号', '民间借贷纠纷', '车牌号为浙G232CC小型汽车一辆', '朱永平', '陈中卫', '', '', '楼豇炜', '金华市安顺旧机动车鉴定估价有限公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-02 00:00:00', 0, '2042-01-02 00:00:00', '2042-02-07 00:00:00', 15, NULL, '14.50', NULL, NULL, NULL, NULL, NULL, '', '', '摇号', '1500.0000', NULL, '92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-12-10 00:00:00', NULL, NULL, NULL, NULL, NULL, '85328278', '', NULL, '完成', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(218, '20032', '审判', '拍卖', '2015', '2015', '(2011)金义执民字第3472号', '借款合同纠纷', '', '金华银行股份有', '义乌市牧野工艺品厂', '', '', '龚凌槐', '杭州永正房地产土地评估有限公司义乌分公司', NULL, '2042-00-09 00:00:00', NULL, '2042-01-01 00:00:00', 0, '2042-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '摇号', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2042-01-01 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85715305', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(219, '20032', '审判', '破产', '2015', '瑞特污染', '万恶确认其万恶', '万恶前人', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(220, '20032', '审判', '拍卖', '2015', '阿斯顿发送到', ' 萨法大赛', ' 法定萨', '', ' 风速达傅', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ' 撒旦傅', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(222, '20032', '审判', '破产', '2015', '发送到发', '法定萨傅11231231', '大赛发', '', '', '傅', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(223, '20032', '审判', '工程造价', '2015', '沃尔沃俄11111', '万恶热舞', '万恶额外', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(224, '20032', '审判', '破产', '2015', 'aaaa', 'aaa', 'aaa', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(225, '20032', '审判', '鉴定', '2015', 'aaa', 'aaa', 'aaa', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(226, '20032', '审判', '评估', '2015', 'aaa', 'aa', 'aa', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(227, '20032', '执行', '评估', '2015', 'aaa', 'aa', 'aa', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(228, '20032', '执行', '破产', '2015', 'aa', 'aa', 'aa', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(229, '20032', '执行', '工程造价', '2015', 'bb', 'bb', 'bb', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `a_department`
--

CREATE TABLE IF NOT EXISTS `a_department` (
  `Number` int(18) unsigned NOT NULL COMMENT '单位编号',
  `Superiors` int(18) unsigned NOT NULL COMMENT '上级单位',
  `Name` varchar(36) NOT NULL COMMENT '单位名称',
  `Address` varchar(255) DEFAULT NULL COMMENT '单位地址',
  `Tel` varchar(20) DEFAULT NULL COMMENT '单位电话',
  `Fax` varchar(20) DEFAULT NULL COMMENT '传真',
  `Contacts` char(12) DEFAULT NULL COMMENT '联系人',
  `AuthorizationCode` varchar(50) NOT NULL COMMENT '授权码',
  `SerialNumber` varchar(50) NOT NULL COMMENT '流水号前缀',
  `IsCurrent` char(1) NOT NULL COMMENT '是否当前单位'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `a_document`
--

CREATE TABLE IF NOT EXISTS `a_document` (
  `ID` int(11) NOT NULL,
  `DepartmentNumber` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Assess` tinyint(4) DEFAULT NULL,
  `Identify` tinyint(4) DEFAULT NULL,
  `Auction` tinyint(4) DEFAULT NULL,
  `ProjectCost` tinyint(4) DEFAULT NULL,
  `Bust` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_document`
--

INSERT INTO `a_document` (`ID`, `DepartmentNumber`, `Name`, `Assess`, `Identify`, `Auction`, `ProjectCost`, `Bust`) VALUES
(1, 20032, '213', 1, 0, 1, 1, NULL),
(2, 20032, '123', 1, 1, 1, 1, 1),
(4, 20032, '2131231萨芬阿迪诉傅', 1, 1, 1, 1, NULL),
(5, 20032, 'sdaflkads', NULL, NULL, NULL, NULL, NULL),
(6, 20032, 'dsafa', 1, 1, NULL, NULL, NULL),
(7, 20032, 'aaaaaaaaaa', NULL, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `a_excel_tpl`
--

CREATE TABLE IF NOT EXISTS `a_excel_tpl` (
  `ID` int(11) NOT NULL COMMENT '		',
  `Type` varchar(45) DEFAULT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `Content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `a_fnc`
--

CREATE TABLE IF NOT EXISTS `a_fnc` (
  `FncCode` char(4) NOT NULL COMMENT '	',
  `FncName` varchar(45) NOT NULL,
  `FncURI` varchar(45) NOT NULL COMMENT '	',
  `FncDesc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `a_menus`
--

CREATE TABLE IF NOT EXISTS `a_menus` (
  `ID` tinyint(3) unsigned NOT NULL,
  `Menu` varchar(45) NOT NULL DEFAULT '菜单项' COMMENT '菜单项',
  `FartherID` tinyint(4) NOT NULL DEFAULT '0' COMMENT '父元素ID',
  `NodePos` tinyint(4) NOT NULL DEFAULT '1' COMMENT '节点位置',
  `NodeSort` tinyint(4) NOT NULL DEFAULT '1' COMMENT '节点排序',
  `URL` varchar(45) NOT NULL COMMENT '菜单URL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `a_menus_permission`
--

CREATE TABLE IF NOT EXISTS `a_menus_permission` (
  `ID` int(11) NOT NULL COMMENT '	',
  `MenuID` tinyint(3) unsigned DEFAULT NULL,
  `UserID` int(10) unsigned DEFAULT NULL,
  `MenuShow` bit(1) NOT NULL DEFAULT b'1',
  `Add` bit(1) NOT NULL DEFAULT b'1',
  `Del` bit(1) NOT NULL DEFAULT b'1',
  `Edit` bit(1) NOT NULL DEFAULT b'1',
  `View` bit(1) NOT NULL DEFAULT b'1',
  `Print` bit(1) NOT NULL DEFAULT b'1',
  `ImportExcel` bit(1) NOT NULL DEFAULT b'1',
  `ExportExcel` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `a_personnel`
--

CREATE TABLE IF NOT EXISTS `a_personnel` (
  `ID` int(10) unsigned NOT NULL COMMENT '主键ID',
  `Number` varchar(45) NOT NULL COMMENT '用户帐号',
  `Password` varchar(45) DEFAULT '000000' COMMENT '用户密码',
  `LastOnlineTime` datetime DEFAULT NULL COMMENT '最后登录时间',
  `Name` varchar(45) DEFAULT '员工' COMMENT '用户姓名',
  `IDNumber` varchar(18) DEFAULT NULL,
  `Sex` tinyint(4) DEFAULT '1',
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_personnel`
--

INSERT INTO `a_personnel` (`ID`, `Number`, `Password`, `LastOnlineTime`, `Name`, `IDNumber`, `Sex`, `Position`, `DepartmentNumber`, `Address`, `CellNumber`, `TelNumber`, `Education`, `Remarks`, `TranVersion`, `AccessToken`, `AuthKey`, `CreateTime`) VALUES
(7, 'test', 'test', NULL, '员工', NULL, 1, NULL, '20032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'perpel', '123214', NULL, '员工', 'safasfd', 1, NULL, '20032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'qwe', '000000', NULL, '员工', NULL, 1, NULL, '20032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '123', '000000', NULL, '员工', NULL, 1, NULL, '20032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_agency`
--
ALTER TABLE `a_agency`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `a_basic_case`
--
ALTER TABLE `a_basic_case`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name_UNIQUE` (`Name`);

--
-- Indexes for table `a_conclusion`
--
ALTER TABLE `a_conclusion`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `a_department`
--
ALTER TABLE `a_department`
  ADD PRIMARY KEY (`Number`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `a_document`
--
ALTER TABLE `a_document`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `a_excel_tpl`
--
ALTER TABLE `a_excel_tpl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `a_fnc`
--
ALTER TABLE `a_fnc`
  ADD PRIMARY KEY (`FncCode`),
  ADD UNIQUE KEY `FncURI_UNIQUE` (`FncURI`);

--
-- Indexes for table `a_menus`
--
ALTER TABLE `a_menus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `a_menus_permission`
--
ALTER TABLE `a_menus_permission`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `a_personnel`
--
ALTER TABLE `a_personnel`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ida_user_UNIQUE` (`ID`),
  ADD UNIQUE KEY `Number_UNIQUE` (`Number`),
  ADD UNIQUE KEY `TranVersion_UNIQUE` (`TranVersion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_agency`
--
ALTER TABLE `a_agency`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '序号',AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `a_basic_case`
--
ALTER TABLE `a_basic_case`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `a_conclusion`
--
ALTER TABLE `a_conclusion`
  MODIFY `ID` int(18) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=230;
--
-- AUTO_INCREMENT for table `a_document`
--
ALTER TABLE `a_document`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `a_excel_tpl`
--
ALTER TABLE `a_excel_tpl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '		';
--
-- AUTO_INCREMENT for table `a_menus_permission`
--
ALTER TABLE `a_menus_permission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '	';
--
-- AUTO_INCREMENT for table `a_personnel`
--
ALTER TABLE `a_personnel`
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


