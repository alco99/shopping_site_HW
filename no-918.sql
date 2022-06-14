-- Adminer 4.8.1 MySQL 5.5.5-10.4.21-MariaDB-log dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ProductQuantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `cart` (`ID`, `UserID`, `ProductID`, `ProductName`, `ProductPrice`, `ProductQuantity`) VALUES
(15,	2,	9,	'《世界鋼筆圖鑑》',	350,	0),
(16,	2,	6,	'《蘇記棺材鋪》',	240,	0),
(17,	2,	4,	'《五月的我們》',	750,	2),
(18,	2,	10,	'《INFINITY》',	750,	0),
(19,	4,	2,	'《AWM》下',	180,	0),
(20,	4,	1,	'《AWM》上',	180,	0),
(21,	5,	2,	'《AWM》下',	180,	0),
(22,	5,	1,	'《AWM》上',	180,	0),
(24,	2,	5,	'《Year of Fate》',	340,	0),
(25,	2,	2,	'《AWM》下',	180,	0),
(26,	2,	1,	'《AWM》上',	180,	0),
(27,	2,	3,	'《我和我對家》',	180,	1),
(28,	7,	11,	'《星體投射》',	1000,	0),
(29,	7,	10,	'《INFINITY》',	750,	0),
(30,	3,	11,	'《星體投射》',	1000,	1),
(31,	3,	7,	'《Evergreen Days》',	650,	1),
(32,	8,	8,	'《平和世界》',	800,	2),
(33,	8,	12,	'《很想很想你》',	200,	0);

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Account` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `member` (`ID`, `Account`, `Password`, `Name`, `Email`) VALUES
(1,	'manager',	'sunny',	'kar98',	'morrow@mail.fcu.edu.tw'),
(2,	'amy',	'258',	'M24',	'fghjk@email.com'),
(3,	'tina',	'654',	NULL,	NULL),
(4,	'tim',	'147',	'tim',	'qwert@email.com'),
(5,	'penny',	'369',	'pennychen',	'fhjlf@email.com'),
(6,	'ump9',	'741',	NULL,	NULL),
(7,	'choco',	'98765',	'amber',	'poiuyt@email.com'),
(8,	'divinia',	'753',	'angel',	'angel@email.com');

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderNum` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `ReceiveAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ReceiveName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ReceivePhone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Payment` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `Sent` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `Evaluation` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `order` (`ID`, `OrderNum`, `ProductID`, `UserID`, `Amount`, `ReceiveAddress`, `ReceiveName`, `ReceivePhone`, `Payment`, `Sent`, `Evaluation`) VALUES
(13,	1,	2,	2,	1,	'fcu',	'233',	'0912345678',	'y',	'y',	4),
(14,	2,	6,	2,	2,	'fcu',	'AKamy',	'0987654321',	'y',	'y',	5),
(15,	4,	4,	2,	1,	'cksh',	'AKamy',	'0987654321',	'y',	'y',	3),
(16,	1,	1,	4,	2,	'ddd',	'tim',	'0974185263',	'y',	'y',	NULL),
(17,	1,	1,	5,	1,	'hsinchu',	'sunny',	'0974185263',	'y',	'y',	NULL),
(18,	1,	2,	5,	2,	'hsinchu',	'sunny',	'0974185263',	'y',	'y',	NULL),
(19,	8,	5,	2,	1,	'werr',	'AKamy',	'0912345678',	'y',	'y',	2),
(20,	8,	10,	2,	1,	'werr',	'AKamy',	'0912345678',	'y',	'y',	4),
(21,	24,	1,	2,	1,	'uytr',	'AKamy',	'0912345678',	'n',	'y',	NULL),
(22,	24,	4,	2,	1,	'uytr',	'AKamy',	'0912345678',	'n',	'y',	NULL),
(23,	1,	10,	7,	1,	'fcu',	'amber',	'0985134699',	'n',	'n',	NULL),
(24,	1,	11,	7,	1,	'fcu',	'amber',	'0985134699',	'n',	'n',	NULL),
(25,	1,	12,	8,	2,	'fcu',	'angel',	'0975348512',	'y',	'y',	NULL);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `InStock` int(11) DEFAULT NULL,
  `Category` int(1) NOT NULL,
  `Author` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Issuer` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `products` (`ID`, `ProductName`, `UnitPrice`, `InStock`, `Category`, `Author`, `Issuer`) VALUES
(1,	'《AWM》上',	180,	2,	1,	'漫漫何其多',	'北京時代華文書局'),
(2,	'《AWM》下',	180,	1,	1,	'漫漫何其多',	'北京時代華文書局'),
(3,	'《我和我對家》',	180,	1,	1,	'PEPA',	'廣東旅遊出版社'),
(4,	'《五月的我們》',	750,	3,	2,	'Mario',	'北京電視藝術中心音像出版社'),
(5,	'《Year of Fate》',	340,	5,	2,	'Fool&Idiot傻子與白痴',	'哇唧唧哇娛樂'),
(6,	'《蘇記棺材鋪》',	240,	0,	1,	'青垚',	'三采文化'),
(7,	'《Evergreen Days》',	650,	1,	2,	'西瓜KUNE',	'廣東音像出版社'),
(8,	'《平和世界》',	800,	5,	2,	'Mario',	'北京東方影音'),
(9,	'《世界鋼筆圖鑑》',	350,	1,	1,	'万年筆の圖鑑編輯部',	'良品文化'),
(10,	'《INFINITY》',	750,	1,	2,	'雨洛',	'中國科學文化音像出版社'),
(11,	'《星體投射》',	1000,	2,	2,	'KBShinya',	'北京電視藝術中心音像出版社'),
(12,	'《很想很想你》',	200,	2,	1,	'墨寶非寶',	'百花洲文藝出版社'),
(13,	'《你聽的到》',	250,	4,	1,	'桑玠',	'江蘇文藝出版社'),
(16,	'《夜長夢少》',	340,	4,	2,	'Fool&Idiot傻子與白痴',	'哇唧唧哇娛樂');

-- 2022-06-14 14:08:25
