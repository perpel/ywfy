-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-10-11 17:11:09
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
-- 表的结构 `a_detail`
--

CREATE TABLE IF NOT EXISTS `a_detail` (
  `ID` decimal(18,0) NOT NULL,
  `DepartID` decimal(18,0) NOT NULL COMMENT '	',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_detail`
--

INSERT INTO `a_detail` (`ID`, `DepartID`, `Type`, `Year`, `FlowNumber`, `CaseNumber`, `Case`, `SubjectMatter`, `LitigantOne`, `LitigantTwo`, `TransferMaterial`, `Supervise`, `Chambers`, `Agency`, `JudgmentExecuteReceives`, `TropschOffice`, `SendCycle`, `SendDate`, `EntrustCycle`, `MaterialsCompletionDate`, `GetbackDate`, `Cycle`, `Result`, `Price`, `UnitID`, `InputMan`, `InputDate`, `EditMan`, `EditDate`, `Remark`, `EntrustDeparment`, `ChoiceWay`, `Money`, `IsAdoption`, `FllowResult`, `Time1`, `Status1`, `Price1`, `Time2`, `Status2`, `Price2`, `Time3`, `Status3`, `Price3`, `Time4`, `BeginDate`, `IdentifiedType`, `IdentifiedCondition`, `ChoicedDate`, `FirstDraftDate`, `AnnouncementDate1`, `StartAuctionPrice1`, `AnnouncementDate2`, `StartAuctionPrice2`, `AnnouncementDate3`, `StartAuctionPrice3`, `NotifyPaymentDate`, `ChargesDate`, `SiteSurveyDate`, `IdentifiedResult`, `Unadoption`, `SourceIdentifiedDepartment`, `SourceIdentifiedResult`, `UndertakerTel`, `SuperviseTel`, `TotalDate`, `AuctionStatus`, `AuctionPrice`, `AuctionDate`, `SuspendedDate`, `Assessor`, `AssessorTel`, `DeliveryCourtDate`, `SaleDate`, `SalePrice`, `SaleStatus`, `RetractDate`, `TranVersion`) VALUES
('12', '2014', 'TEST', '2011', 'aaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
('13', '2014', 'TEST', '2011', '萨发送傅', '傅阿斯傅', ' 阿斯顿傅', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_personnel`
--

INSERT INTO `a_personnel` (`ID`, `Number`, `Password`, `LastOnlineTime`, `Name`, `IDNumber`, `Sex`, `Position`, `DepartmentNumber`, `Address`, `CellNumber`, `TelNumber`, `Education`, `Remarks`, `TranVersion`, `AccessToken`, `AuthKey`, `CreateTime`) VALUES
(2, '007', '007', NULL, '的会空', NULL, 1, '', 'fdsaf', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'test', 'test', NULL, '', NULL, 1, '', '213123', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_detail`
--
ALTER TABLE `a_detail`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FlowNumber_UNIQUE` (`FlowNumber`),
  ADD UNIQUE KEY `CaseNumber_UNIQUE` (`CaseNumber`),
  ADD UNIQUE KEY `Case_UNIQUE` (`Case`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

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
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
