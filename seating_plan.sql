-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2015 at 01:23 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `date`, `time`, `action`) VALUES
(1, 1, '2015-11-07', '20:18:25', '::1 - Logged in. (Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0 ) '),
(2, 1, '2015-11-13', '13:49:52', '::1 - Logged in. (Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0 ) '),
(3, 1, '2015-11-13', '22:14:04', '::1 - Logged in. (Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0 ) '),
(4, 1, '2015-11-13', '23:49:49', 'Updated program paper - CSE (CSE) -Dual Degree Program (1)'),
(5, 1, '2015-11-13', '23:50:04', 'Updated program paper - CSE (CSE) -Dual Degree Program x (1)'),
(6, 1, '2015-11-13', '23:50:08', 'Updated program paper - CSE (CSE) -Dual Degree Program (1)'),
(7, 1, '2015-11-13', '23:50:19', '::1 - Deleted program  (0) - (94)'),
(8, 1, '2015-11-13', '23:50:29', '::1 - Deleted program  (0) - (51)'),
(9, 1, '2015-11-13', '23:50:33', '::1 - Deleted program  (0) - (52)'),
(10, 1, '2015-11-13', '23:50:46', '::1 - Deleted program  (0) - (93)'),
(11, 1, '2015-11-13', '23:50:50', '::1 - Deleted program  (0) - (92)'),
(12, 1, '2015-11-13', '23:50:53', '::1 - Deleted program  (0) - (91)'),
(13, 1, '2015-11-13', '23:50:58', '::1 - Deleted program  (0) - (90)'),
(14, 1, '2015-11-13', '23:51:01', '::1 - Deleted program  (0) - (89)'),
(15, 1, '2015-11-13', '23:51:05', '::1 - Deleted program  (0) - (88)'),
(16, 1, '2015-11-13', '23:51:11', '::1 - Deleted program  (0) -%B#WúÈøÃiýŸ‹Zf|	Í#¾IžE†O (87)'),
(17, 1, '2015-11-13', '23:51:18', '::1 - Deleted program  (0) - (85)'),
(18, 1, '2015-11-13', '23:52:02', 'Updated program paper - CSE (CSE) -Dual Degree Program '' (1)'),
(19, 1, '2015-11-13', '23:52:12', 'Updated program paper - CSE (CSE) -Dual Degree Program (1)'),
(20, 1, '2015-11-13', '23:55:52', 'Updated program paper - CSE (CSE) -Dual Degree Program '' (2)'),
(21, 1, '2015-11-13', '23:59:44', 'Updated program paper - CSE (CSE) -Dual Degree Program '' (1)'),
(22, 1, '2015-11-14', '00:07:13', 'Updated program paper - CSE (CSE) -Dual Degree Program (1)'),
(23, 1, '2015-11-14', '00:07:18', 'Updated program paper - CSE (CSE) -Dual Degree Program (2)'),
(24, 1, '2015-11-14', '14:21:24', '::1 - Logged in. (Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0 ) '),
(25, 1, '2015-11-14', '14:32:18', 'Created room number - IL 2014'),
(26, 1, '2015-11-14', '14:32:37', '::1 - Deleted room  ()'),
(27, 1, '2015-11-14', '14:32:40', '::1 - Deleted room  ()'),
(28, 1, '2015-11-14', '14:33:35', '::1 - Deleted room IL 2014 (2)'),
(29, 1, '2015-11-14', '14:33:53', 'Updated room NumberIL 202 (1)'),
(30, 1, '2015-11-14', '14:34:01', 'Updated room NumberIL 202'''' (1)'),
(31, 1, '2015-11-14', '14:34:10', 'Updated room NumberIL 202 " " (1)'),
(32, 1, '2015-11-14', '14:34:20', 'Updated room NumberIL 202 111~~~!@ (1)'),
(33, 1, '2015-11-14', '14:34:29', 'Updated room NumberIL 202 111 (1)'),
(34, 1, '2015-11-14', '16:09:12', '::1 - Deleted student  (1)'),
(35, 1, '2015-11-14', '17:36:58', 'Created roll number - 13ics057'),
(36, 1, '2015-11-14', '17:49:06', 'Created roll numbers Range - 13ics 001 057'),
(37, 1, '2015-11-14', '17:49:20', 'Updated Roll Number13ics001 (3)'),
(38, 1, '2015-11-14', '17:49:30', 'Updated Roll Number13ics001 (3)'),
(39, 1, '2015-11-14', '17:50:04', 'Created roll numbers Range - 12ics 008 45'),
(40, 1, '2015-11-14', '17:50:45', 'Created roll number - 13ics001'),
(41, 1, '2015-11-14', '17:51:47', 'Created roll numbers Range - 13ics 006 010');

-- --------------------------------------------------------

--
-- Table structure for table `program_details`
--

CREATE TABLE IF NOT EXISTS `program_details` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `program` varchar(70) NOT NULL,
  `branch` varchar(60) NOT NULL,
  `semester` int(20) NOT NULL,
  `subjects` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `program_details`
--

INSERT INTO `program_details` (`id`, `program`, `branch`, `semester`, `subjects`) VALUES
(1, 'Dual Degree Program', 'CSE', 1, 'CY101 MA101 CE101 CS101 EC101 HU101 SS101'),
(2, 'Dual Degree Program', 'CSE', 2, 'PH102 MA102 CE106 CS102 EE102 HU102 SS102'),
(3, 'Dual Degree Program', 'CSE', 3, 'MA201 EC201 CS201 CS203 CS205 CS207'),
(4, 'Dual Degree Program', 'CSE', 4, 'MA202 EC210 CS202 CS204 CS206 CS208'),
(5, 'Dual Degree Program', 'CSE', 5, 'CS301 CS303 CS305 CS307 CS309 ME311'),
(6, 'Dual Degree Program', 'CSE', 6, 'CS302 CS304 CS306 CS308 EC304 ME312'),
(7, 'Dual Degree Program', 'CSE', 7, 'SS401 CS401 CS403 CS405 EC564'),
(8, 'Dual Degree Program', 'CSE', 8, 'MA402 CS402 CS404 CS442 CS444'),
(9, 'Dual Degree Program', 'CSE', 9, 'CS501 CS503 CS545 CS547'),
(10, 'Dual Degree Program', 'ECE', 1, 'CY101 MA101 CE101 CS101 EC101 HU101 SS101'),
(11, 'Dual Degree Program', 'ECE', 2, 'PH102 MA102 CE106 CS102 EE102 HU102 SS102'),
(12, 'Dual Degree Program', 'ECE', 3, 'MA201 EC201 EC203 EC205 CS205 EC207'),
(13, 'Dual Degree Program', 'ECE', 4, 'MA202 EE202 EC202 EC204 EC206 EC208'),
(14, 'Dual Degree Program', 'ECE', 5, 'EC301 EC303 EC305 EE305 CS309 ME311'),
(15, 'Dual Degree Program', 'ECE', 6, 'EC302 EC304 EC306 EC308 CS310 ME312'),
(16, 'Dual Degree Program', 'ECE', 7, 'SS401 EC401 EC403 EC405 EC465'),
(17, 'Dual Degree Program', 'ECE', 8, 'MA402 EC402 EC404 EC406 EC408'),
(18, 'Dual Degree Program', 'ECE', 9, 'EC501 CS503 EC505 EC507'),
(27, 'M.Tech Science Graduate', 'VLSI Design', 1, ''),
(28, 'M.Tech Science Graduate', 'VLSI Design', 2, ''),
(29, 'M.Tech Science Graduate', 'VLSI Design', 3, ''),
(30, 'M.Tech Science Graduate', 'VLSI Design', 4, ''),
(31, 'M.Tech Science Graduate', 'Wireless Comm & Network', 1, ''),
(32, 'M.Tech Science Graduate', 'Wireless Comm & Network', 2, ''),
(33, 'M.Tech Science Graduate', 'Wireless Comm & Network', 3, ''),
(34, 'M.Tech Science Graduate', 'Wireless Comm & Network', 4, ''),
(35, 'Ph.D Working Professional', 'ISR', 1, ''),
(36, 'Ph.D Working Professional', 'SE', 1, ''),
(37, 'Ph.D Working Professional', 'VLSI Design', 1, ''),
(38, 'Ph.D Working Professional', 'Wireless Comm & Network', 1, ''),
(39, 'Ph.D Working Professional', 'ISR', 2, ''),
(40, 'Ph.D Working Professional', 'SE', 2, ''),
(41, 'Ph.D Working Professional', 'VLSI Design', 2, ''),
(42, 'Ph.D Working Professional', 'Wireless Comm & Network', 2, ''),
(43, 'Ph.D Working Professional', 'ISR', 3, ''),
(44, 'Ph.D Working Professional', 'SE', 3, ''),
(45, 'Ph.D Working Professional', 'VLSI Design', 3, ''),
(46, 'Ph.D Working Professional', 'Wireless Comm & Network', 3, ''),
(47, 'Ph.D Working Professional', 'ISR', 4, ''),
(48, 'Ph.D Working Professional', 'SE', 4, ''),
(49, 'Ph.D Working Professional', 'VLSI Design', 4, ''),
(50, 'Ph.D Working Professional', 'Wireless Comm & Network', 4, ''),
(53, 'â\0UT\r\0æFEêFEæFEPK\0\0\0\0\0\0!\0—¹Ýˆ\0\0¬\0\0\0r\0docProps/app.xmlSD]\0¤', '', 0, ''),
(54, '*KF÷Ö$ûúIr“¦IÇ`~’Î¹÷ø]IÜì:[ÐxW±é¤d8íkã¶»Û|½þÄ', '', 0, ''),
(55, '¢„ÃŠµDý‚sÔ-t', '', 0, ''),
(56, '', '', 0, ''),
(57, '', '', 0, ''),
(58, '', '', 0, ''),
(59, '', '', 0, ''),
(60, '', '', 0, ''),
(61, '', '', 0, ''),
(62, '’3R', '', 0, ''),
(63, '', '', 0, ''),
(64, '', '', 0, ''),
(65, '', '', 0, ''),
(66, 'â\0UT\r\0çFEçFEæFEPK\0\0\0\0\0\0!\0 ƒÄ®‘\0\0d\0\0\r\0r\0xl/styles.xmlSD]\0¤\0\0\0', '', 0, ''),
(67, '', '', 0, ''),
(68, '', '', 0, ''),
(69, '', '', 0, ''),
(70, '', '', 0, ''),
(71, '', '', 0, ''),
(72, 'â\0UT\r\0æFEæFEæFEPK\0\0\0\0\0\0!\0é¦%¸²\0\0S\0\0\0r\0xl/theme/theme1.xmlSD', '', 0, ''),
(73, 'øe\0ìû`©³‚uû-§3ç©òËUÞÝšWsËxc¿Ñét¼¾±Ä»+øV­én×Kxw‰÷Võïlw»ÍÞ[â›+øþ¥', '$}AÕ¶>N0TÄòòÙ/Ÿ=A/Ÿ=>~ðôøÁ/Ç?øÙ@x\rÇNøâû/þþöSô×“ï^<úÊŒ', 0, ''),
(74, 'Ä•pÀÙ5}BUxâÄ8™„@¬‰.á$`UòÎŽ“ŒÏö¼ùÐXíòQ¾ÝÐÏ†6Ù*º FÊ`]aKo&ÌÉ', 'äã¤ma’‚Ë(~2m@˜qÛòUaÊ+‹ù¤Áæ´tj•—D$Bª', 0, ''),
(75, '}áœêJ—}+ç‘7¹ Tû4@‚B§S¡ dOv¾‚™S×Ÿ¯sFEŸY¨+“üwH	¤ÕÛLí·P8ï&…#2ÜÉ Ù¦ê\Z', '³ˆ«5}íQ°ñf*œñQ[7[÷Ö~Ô&pø@é4n*|¶œo|¢%‚D¼Ð*Êo±9[šq)«w', 0, ''),
(76, '', '', 0, ''),
(77, '', '', 0, ''),
(78, 'â\0UT\r\0çFEçFEçFEPK\0\0\0\0\0\0!\0_8Ó\0\0Ç\0\0\0r\0xl/worksheets/sheet1.', '', 0, ''),
(79, '', '', 0, ''),
(80, 'î@„Y?a&?¡%ˆ1“=±!„!³šˆO$Ç:WÞü\0PK\0\0\0\0\0\0!\0¸JK-\0\0·\0\0\0r\0xl/work', '', 0, ''),
(81, 'î@„Y?a&?¡%ˆ1“=±!„!³šˆO$Ç:WÞü\0PK', '', 0, ''),
(82, '', '', 0, ''),
(83, 'â\0UT\r\0çFEçFEçFEPK\0\0\0\0\0\0!\0–wÍ›ë\0\0\0X\0\0\Z\0r\0xl/_rels/workbook.xml', '', 0, ''),
(84, '', '', 0, ''),
(86, 'â\0UT\r\0çFEçFEçFEPK\0\0\0\0\0\0!\0ùJ­¬î\0\0\0W\0\0\0r\0_rels/.relsSD]\0¤\0\0\0\0', '', 0, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `rows`, `columns`) VALUES
(1, 'IL 202 111', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_no` varchar(30) NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `roll_no`, `program_id`) VALUES
(1, '13ics001', 1),
(2, '13ics006', 1),
(3, '13ics007', 1),
(4, '13ics008', 1),
(5, '13ics009', 1),
(6, '13ics010', 1);

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
