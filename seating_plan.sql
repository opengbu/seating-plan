-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2015 at 09:21 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seating_plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `action` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `date`, `time`, `action`) VALUES
(1, 1, '2015-11-07', '20:18:25', '::1 - Logged in. (Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0 ) '),
(2, 1, '2015-11-13', '13:49:52', '::1 - Logged in. (Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0 ) ');

-- --------------------------------------------------------

--
-- Table structure for table `program_details`
--

CREATE TABLE IF NOT EXISTS `program_details` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `program` varchar(70) NOT NULL,
  `branch` varchar(60) NOT NULL,
  `year` int(30) NOT NULL,
  `semester` int(20) NOT NULL,
  `subjects` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `program_details`
--

INSERT INTO `program_details` (`id`, `program`, `branch`, `year`, `semester`, `subjects`) VALUES
(1, 'Dual Degree Program', 'CSE', 1, 1, 'CY101 MA101 CE101 CS101 EC101 HU101 SS101'),
(2, 'Dual Degree Program', 'CSE', 1, 2, 'PH102 MA102 CE106 CS102 EE102 HU102 SS102'),
(3, 'Dual Degree Program', 'CSE', 2, 3, 'MA201 EC201 CS201 CS203 CS205 CS207'),
(4, 'Dual Degree Program', 'CSE', 2, 4, 'MA202 EC210 CS202 CS204 CS206 CS208'),
(5, 'Dual Degree Program', 'CSE', 3, 5, 'CS301 CS303 CS305 CS307 CS309 ME311'),
(6, 'Dual Degree Program', 'CSE', 3, 6, 'CS302 CS304 CS306 CS308 EC304 ME312'),
(7, 'Dual Degree Program', 'CSE', 4, 7, 'SS401 CS401 CS403 CS405 EC564'),
(8, 'Dual Degree Program', 'CSE', 4, 8, 'MA402 CS402 CS404 CS442 CS444'),
(9, 'Dual Degree Program', 'CSE', 5, 9, 'CS501 CS503 CS545 CS547'),
(10, 'Dual Degree Program', 'ECE', 1, 1, 'CY101 MA101 CE101 CS101 EC101 HU101 SS101'),
(11, 'Dual Degree Program', 'ECE', 1, 2, 'PH102 MA102 CE106 CS102 EE102 HU102 SS102'),
(12, 'Dual Degree Program', 'ECE', 2, 3, 'MA201 EC201 EC203 EC205 CS205 EC207'),
(13, 'Dual Degree Program', 'ECE', 2, 4, 'MA202 EE202 EC202 EC204 EC206 EC208'),
(14, 'Dual Degree Program', 'ECE', 3, 5, 'EC301 EC303 EC305 EE305 CS309 ME311'),
(15, 'Dual Degree Program', 'ECE', 3, 6, 'EC302 EC304 EC306 EC308 CS310 ME312'),
(16, 'Dual Degree Program', 'ECE', 4, 7, 'SS401 EC401 EC403 EC405 EC465'),
(17, 'Dual Degree Program', 'ECE', 4, 8, 'MA402 EC402 EC404 EC406 EC408'),
(18, 'Dual Degree Program', 'ECE', 5, 9, 'EC501 CS503 EC505 EC507'),
(27, 'M.Tech Science Graduate', 'VLSI Design', 1, 1, ''),
(28, 'M.Tech Science Graduate', 'VLSI Design', 1, 2, ''),
(29, 'M.Tech Science Graduate', 'VLSI Design', 2, 3, ''),
(30, 'M.Tech Science Graduate', 'VLSI Design', 2, 4, ''),
(31, 'M.Tech Science Graduate', 'Wireless Comm & Network', 1, 1, ''),
(32, 'M.Tech Science Graduate', 'Wireless Comm & Network', 1, 2, ''),
(33, 'M.Tech Science Graduate', 'Wireless Comm & Network', 2, 3, ''),
(34, 'M.Tech Science Graduate', 'Wireless Comm & Network', 2, 4, ''),
(35, 'Ph.D Working Professional', 'ISR', 1, 1, ''),
(36, 'Ph.D Working Professional', 'SE', 1, 1, ''),
(37, 'Ph.D Working Professional', 'VLSI Design', 1, 1, ''),
(38, 'Ph.D Working Professional', 'Wireless Comm & Network', 1, 1, ''),
(39, 'Ph.D Working Professional', 'ISR', 1, 2, ''),
(40, 'Ph.D Working Professional', 'SE', 1, 2, ''),
(41, 'Ph.D Working Professional', 'VLSI Design', 1, 2, ''),
(42, 'Ph.D Working Professional', 'Wireless Comm & Network', 1, 2, ''),
(43, 'Ph.D Working Professional', 'ISR', 2, 3, ''),
(44, 'Ph.D Working Professional', 'SE', 2, 3, ''),
(45, 'Ph.D Working Professional', 'VLSI Design', 2, 3, ''),
(46, 'Ph.D Working Professional', 'Wireless Comm & Network', 2, 3, ''),
(47, 'Ph.D Working Professional', 'ISR', 2, 4, ''),
(48, 'Ph.D Working Professional', 'SE', 2, 4, ''),
(49, 'Ph.D Working Professional', 'VLSI Design', 2, 4, ''),
(50, 'Ph.D Working Professional', 'Wireless Comm & Network', 2, 4, ''),
(51, '', '', 0, 0, ''),
(52, '', '', 0, 0, ''),
(53, 'â\0UT\r\0æFEêFEæFEPK\0\0\0\0\0\0!\0—¹Ýˆ\0\0¬\0\0\0r\0docProps/app.xmlSD]\0¤', '', 0, 0, ''),
(54, '*KF÷Ö$ûúIr“¦IÇ`~’Î¹÷ø]IÜì:[ÐxW±é¤d8íkã¶»Û|½þÄ', '', 0, 0, ''),
(55, '¢„ÃŠµDý‚sÔ-t', '', 0, 0, ''),
(56, '', '', 0, 0, ''),
(57, '', '', 0, 0, ''),
(58, '', '', 0, 0, ''),
(59, '', '', 0, 0, ''),
(60, '', '', 0, 0, ''),
(61, '', '', 0, 0, ''),
(62, '’3R', '', 0, 0, ''),
(63, '', '', 0, 0, ''),
(64, '', '', 0, 0, ''),
(65, '', '', 0, 0, ''),
(66, 'â\0UT\r\0çFEçFEæFEPK\0\0\0\0\0\0!\0 ƒÄ®‘\0\0d\0\0\r\0r\0xl/styles.xmlSD]\0¤\0\0\0', '', 0, 0, ''),
(67, '', '', 0, 0, ''),
(68, '', '', 0, 0, ''),
(69, '', '', 0, 0, ''),
(70, '', '', 0, 0, ''),
(71, '', '', 0, 0, ''),
(72, 'â\0UT\r\0æFEæFEæFEPK\0\0\0\0\0\0!\0é¦%¸²\0\0S\0\0\0r\0xl/theme/theme1.xmlSD', '', 0, 0, ''),
(73, 'øe\0ìû`©³‚uû-§3ç©òËUÞÝšWsËxc¿Ñét¼¾±Ä»+øV­én×Kxw‰÷Võïlw»ÍÞ[â›+øþ¥', '$}AÕ¶>N0TÄòòÙ/Ÿ=A/Ÿ=>~ðôøÁ/Ç?øÙ@x\rÇNøâû/þþöSô×“ï^<úÊŒ', 0, 0, ''),
(74, 'Ä•pÀÙ5}BUxâÄ8™„@¬‰.á$`UòÎŽ“ŒÏö¼ùÐXíòQ¾ÝÐÏ†6Ù*º FÊ`]aKo&ÌÉ', 'äã¤ma’‚Ë(~2m@˜qÛòUaÊ+‹ù¤Áæ´tj•—D$Bª', 0, 0, ''),
(75, '}áœêJ—}+ç‘7¹ Tû4@‚B§S¡ dOv¾‚™S×Ÿ¯sFEŸY¨+“üwH	¤ÕÛLí·P8ï&…#2ÜÉ Ù¦ê\Z', '³ˆ«5}íQ°ñf*œñQ[7[÷Ö~Ô&pø@é4n*|¶œo|¢%‚D¼Ð*Êo±9[šq)«w', 0, 0, ''),
(76, '', '', 0, 0, ''),
(77, '', '', 0, 0, ''),
(78, 'â\0UT\r\0çFEçFEçFEPK\0\0\0\0\0\0!\0_8Ó\0\0Ç\0\0\0r\0xl/worksheets/sheet1.', '', 0, 0, ''),
(79, '', '', 0, 0, ''),
(80, 'î@„Y?a&?¡%ˆ1“=±!„!³šˆO$Ç:WÞü\0PK\0\0\0\0\0\0!\0¸JK-\0\0·\0\0\0r\0xl/work', '', 0, 0, ''),
(81, 'î@„Y?a&?¡%ˆ1“=±!„!³šˆO$Ç:WÞü\0PK', '', 0, 0, ''),
(82, '', '', 0, 0, ''),
(83, 'â\0UT\r\0çFEçFEçFEPK\0\0\0\0\0\0!\0–wÍ›ë\0\0\0X\0\0\Z\0r\0xl/_rels/workbook.xml', '', 0, 0, ''),
(84, '', '', 0, 0, ''),
(85, '', '', 0, 0, ''),
(86, 'â\0UT\r\0çFEçFEçFEPK\0\0\0\0\0\0!\0ùJ­¬î\0\0\0W\0\0\0r\0_rels/.relsSD]\0¤\0\0\0\0', '', 0, 0, ''),
(87, '%B#WúÈøÃiýŸ‹Zf|	Í#¾IžE†O', '', 0, 0, ''),
(88, '', '', 0, 0, ''),
(89, '', '', 0, 0, ''),
(90, '', '', 0, 0, ''),
(91, '', '', 0, 0, ''),
(92, '', '', 0, 0, ''),
(93, '', '', 0, 0, ''),
(94, '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_no` varchar(40) NOT NULL,
  `rows` int(11) NOT NULL,
  `columns` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_type` varchar(30) NOT NULL DEFAULT 'single' COMMENT 'values - single, range',
  `roll_no` varchar(30) NOT NULL,
  `range_beg` varchar(30) NOT NULL,
  `range_end` varchar(30) NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `update_info`
--

CREATE TABLE IF NOT EXISTS `update_info` (
  `version` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_info`
--

INSERT INTO `update_info` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `profile_picture` varchar(50) NOT NULL DEFAULT 'resources/images/default-user.png',
  `full_name` varchar(40) NOT NULL,
  `roll_number` varchar(10) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `confirmation_link` varchar(36) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `type`, `email`, `active`, `profile_picture`, `full_name`, `roll_number`, `phone_number`, `confirmation_link`) VALUES
(1, 'varun', '$2a$08$Zu3VrELhRcG42tOXzulIL.U0vKKcv6PYGUaRS/rNR6CPfPOOVxzcK', 'superadmin', 'varun.10@live.com', 1, 'resources/images/default-user.png', 'Varun Garg', '13/ICS/057', '', 'bad7011d94999d05699bc26cedb326da6dc1'),
(10, 'rishabh', '$2a$08$6eeEXtrWTDWVNdvg6uoD/O8teioyfkDDWS7jYoPEcnoK/jJwnm21u', 'superadmin', 'r@r.r', 1, 'resources/images/default-user.png', 'rishabh', '', '', '5f6bb0c422cd4788ae2f95982e29b89819cc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
