-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-10-18 16:55:54
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

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
(9, '评估', '213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '评估', '123213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '工程造价', '诉阿飞', '法定的 撒旦撒', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `a_basic_case`
--

CREATE TABLE IF NOT EXISTS `a_basic_case` (
  `ID` int(11) NOT NULL COMMENT '序号',
  `Type` varchar(64) DEFAULT '案由' COMMENT '类别',
  `Name` varchar(255) DEFAULT NULL COMMENT '名称',
  `Remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_basic_case`
--

INSERT INTO `a_basic_case` (`ID`, `Type`, `Name`, `Remark`) VALUES
(1, 'ceshi', '123', NULL),
(2, '案由', 'AAA', NULL),
(3, '案由', 'BBBB', NULL),
(9, '', '啊伐送达123', '123123'),
(12, '案由', '31234 21423 ', '23 4 '),
(13, '案由', ' 萨发送到傅', '的撒'),
(14, '案由', '送达', ' 的撒'),
(15, '案由', '阿法定萨傅', ''),
(16, '案由', '123214', ' fsadf sda ');

-- --------------------------------------------------------

--
-- 表的结构 `a_conclusion`
--

CREATE TABLE IF NOT EXISTS `a_conclusion` (
  `ID` int(18) unsigned NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_conclusion`
--

INSERT INTO `a_conclusion` (`ID`, `DepartID`, `Type`, `Year`, `FlowNumber`, `CaseNumber`, `Case`, `SubjectMatter`, `LitigantOne`, `LitigantTwo`, `TransferMaterial`, `Supervise`, `Chambers`, `Agency`, `JudgmentExecuteReceives`, `TropschOffice`, `SendCycle`, `SendDate`, `EntrustCycle`, `MaterialsCompletionDate`, `GetbackDate`, `Cycle`, `Result`, `Price`, `UnitID`, `InputMan`, `InputDate`, `EditMan`, `EditDate`, `Remark`, `EntrustDeparment`, `ChoiceWay`, `Money`, `IsAdoption`, `FllowResult`, `Time1`, `Status1`, `Price1`, `Time2`, `Status2`, `Price2`, `Time3`, `Status3`, `Price3`, `Time4`, `BeginDate`, `IdentifiedType`, `IdentifiedCondition`, `ChoicedDate`, `FirstDraftDate`, `AnnouncementDate1`, `StartAuctionPrice1`, `AnnouncementDate2`, `StartAuctionPrice2`, `AnnouncementDate3`, `StartAuctionPrice3`, `NotifyPaymentDate`, `ChargesDate`, `SiteSurveyDate`, `IdentifiedResult`, `Unadoption`, `SourceIdentifiedDepartment`, `SourceIdentifiedResult`, `UndertakerTel`, `SuperviseTel`, `TotalDate`, `AuctionStatus`, `AuctionPrice`, `AuctionDate`, `SuspendedDate`, `Assessor`, `AssessorTel`, `DeliveryCourtDate`, `SaleDate`, `SalePrice`, `SaleStatus`, `RetractDate`, `TranVersion`) VALUES
(12, '322000', '评估', '0', 'aaaaaaaaaaaaaaaaaaaaaa', '1231', 'aaaaaaaaaaaaaaaaaaaaaa', 'gsdfg sg sfg ', '', '', 'xzcxdzvzcv', '', '', '', NULL, NULL, NULL, NULL, NULL, '2015-10-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'retewrtrew', 'gdfsgdsfg', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '2011', NULL, NULL, NULL, '', '', '2015-09-30 00:00:00', NULL, NULL, NULL, NULL, NULL),
(16, '20032', '鉴定', '0', '123213', '1231', '213123123', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(18, '20032', '鉴定', '0', 'AA', 'wrqewqrew', 'rewqreqwrewqrqewrweq', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(19, '20032', '评估', '0', 'dsfdsfsd', 'fdsfsdfsdfg', 'fdghfhgfghgf', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_document`
--

INSERT INTO `a_document` (`ID`, `DepartmentNumber`, `Name`, `Assess`, `Identify`, `Auction`, `ProjectCost`, `Bust`) VALUES
(1, 322000, '213', 0, 1, 1, 1, NULL),
(2, 322000, '123', 1, NULL, 1, 1, 1),
(4, 322000, '2131231萨芬阿迪诉傅', 1, 1, 1, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a_personnel`
--

INSERT INTO `a_personnel` (`ID`, `Number`, `Password`, `LastOnlineTime`, `Name`, `IDNumber`, `Sex`, `Position`, `DepartmentNumber`, `Address`, `CellNumber`, `TelNumber`, `Education`, `Remarks`, `TranVersion`, `AccessToken`, `AuthKey`, `CreateTime`) VALUES
(7, 'test', 'test', NULL, '员工', NULL, 1, NULL, '20032', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '序号',AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `a_basic_case`
--
ALTER TABLE `a_basic_case`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `a_conclusion`
--
ALTER TABLE `a_conclusion`
  MODIFY `ID` int(18) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `a_document`
--
ALTER TABLE `a_document`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
  MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
