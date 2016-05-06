-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2016 at 03:14 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `its_portal`
--
CREATE DATABASE `its_portal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `its_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `employeeprof1`
--

CREATE TABLE IF NOT EXISTS `employeeprof1` (
  `name` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `address` varchar(25) NOT NULL,
  `age` int(4) NOT NULL,
  `gender` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeprof1`
--

INSERT INTO `employeeprof1` (`name`, `email`, `phoneno`, `address`, `age`, `gender`) VALUES
('test', 'test', 'test', 'test', 12, 'test'),
('test', 'test', 'test', 'test', 12, 'test'),
('asss', 'ass', 'ass', 'asas', 1, 'Other'),
('werwr4', '43534er', 'werwrw', 'fsff', 5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_edd`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_edd` (
  `school_name` varchar(15) NOT NULL,
  `school_city` varchar(11) NOT NULL,
  `school_qualifications` varchar(15) NOT NULL,
  `school_start` date NOT NULL,
  `school_end` date NOT NULL,
  `grad_school` varchar(15) NOT NULL,
  `grad_city` varchar(11) NOT NULL,
  `grad_qualifications` varchar(15) NOT NULL,
  `grad_start` date NOT NULL,
  `grad_end` date NOT NULL,
  `postgrad_school` varchar(15) NOT NULL,
  `postgrad_city` varchar(11) NOT NULL,
  `postgrad_qualifications` varchar(15) NOT NULL,
  `postgrad_start` date NOT NULL,
  `postgrad_end` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee_edd`
--

INSERT INTO `tbl_employee_edd` (`school_name`, `school_city`, `school_qualifications`, `school_start`, `school_end`, `grad_school`, `grad_city`, `grad_qualifications`, `grad_start`, `grad_end`, `postgrad_school`, `postgrad_city`, `postgrad_qualifications`, `postgrad_start`, `postgrad_end`) VALUES
('test', 'test', 'test', '2016-05-04', '0000-00-00', 'test', 'test', 'test', '2016-05-02', '0000-00-00', 'test', 'test', 'test', '2016-05-17', '0000-00-00'),
('test', 'test', 'test', '2016-05-04', '0000-00-00', 'test', 'test', 'test', '2016-05-02', '0000-00-00', 'test', 'test', 'test', '2016-05-17', '0000-00-00'),
('addsa', 'asdasd', 'asdasd', '2016-05-10', '2016-05-09', 'adasd', 'asdasd', 'adsasd', '2016-05-03', '2016-05-18', 'asdasd', 'asdasd', 'adad', '2016-05-12', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `type` varchar(255) NOT NULL,
  `auth_to` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `user`, `password`, `phoneno`, `type`, `auth_to`, `status`) VALUES
(57, '', 'asd1213@asd.com', 'cddddddfdsf2', '0', '', '', ''),
(56, '', 'gsaini94@ymail.com', 'wUq1jAi0Fx', '0', '1', '1', '1'),
(58, '', 'sdfs8998@gmail.com', 'sadad', '0', '', '', ''),
(79, 'assd', 'ada', 'asdasd', 'qwqww', '2', '', '1'),
(63, 'sfsdf', 'sdfs89ds98@gmail.com', 'adadsd', '1231442', '1', '', '1'),
(80, 'asdjnsdad', 'asddd', 'asddqw', 'qwdqdw', '2', '', '1'),
(81, 'asdas', 'asdfas', 'adadqw2', '221121221', '2', '', '1'),
(82, 'sdqw', 'qwdqwd', 'qwdqwd', 'qwdqwd', '2', '', '1'),
(83, 'asdas', 'asdasd', 'asdasda', 'asdasd', '2', '', '1'),
(84, 'asdas', 'asdasd', 'asdasda', 'asdasd', '2', '', '1'),
(85, 'fdaf', 'fafq32', '32eqew', 'fwewef2323', '2', '', '1'),
(86, 'asdadwq', 'qwdqw', 'qwqwd', 'qwqfwf', '2', '', '1'),
(87, 'wefwef', 'wefwef', 'wefwef23', 'ew232f', '2', '', '1'),
(88, 'asdasad', 'adsdad', 'sdw23d', 'asd2d2d', '2', '', '1'),
(89, 'asdasda', 'adadasd', 'adadad', 'adadada', '2', '', '1'),
(90, 'sfdsdf', 'asdfsa', 'sffd', 'sdff', '2', '', '1'),
(91, 'sdfsdff', 'sdfsfs', 'sfsdfsdf', 'sdfsfdsf', '2', '', '1'),
(92, 'sdcsdcsdc', 'sdcscsdcs', 'sdcsdcsdc', 'sdcsdcsdc', '3', '', '1'),
(53, '', 'asd1213@asd.com', 'cddddddfdsf2', '0', '', '', ''),
(1, '', 'asd1213@asd.com', 'cddddddfdsf2', '0', '', '', ''),
(2, '', 'gsaini94@ymail.com', 'wUq1jAi0Fx', '0', '1', '1', '1'),
(3, '', 'sdfs8998@gmail.com', 'sadad', '0', '', '', ''),
(93, 'werr', 'rwrwe', 'werwe', 'wrwer4', '2', '', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
