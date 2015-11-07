-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2015 at 03:51 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `date`, `time`, `action`) VALUES
(1, 1, '2015-11-07', '20:18:25', '::1 - Logged in. (Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0 ) ');

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
