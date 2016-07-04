-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2016 at 09:09 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE IF NOT EXISTS `tbl_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(25) NOT NULL,
  `company_email` varchar(25) NOT NULL,
  `company_location` varchar(25) NOT NULL,
  `company_num` int(11) NOT NULL,
  `company_website` varchar(25) NOT NULL,
  `company_type` varchar(25) NOT NULL,
  `company_tagline` varchar(25) NOT NULL,
  `company_description` mediumtext NOT NULL,
  `company_vision` varchar(25) NOT NULL,
  `company_mission` varchar(25) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `user_id`, `company_name`, `company_email`, `company_location`, `company_num`, `company_website`, `company_type`, `company_tagline`, `company_description`, `company_vision`, `company_mission`) VALUES
(1, 0, 'test', 'test@ymai.com', 'test', 223388, 'test', 'test', 'test', 'test', 'test', 'test'),
(2, 0, 'test', 'test@ymai.com', 'test', 223388, 'test', 'test', 'test', 'test', 'test', 'test'),
(3, 0, '', '', '', 0, '', '', '', '', '', ''),
(4, 0, 'asdas', 'asdas@sdfsd', 'asda', 0, 'asdasd', 'Full Time', 'sadasd', '<p>asdasd</p>', 'asdasd', 'asdasd'),
(5, 0, 'dfsdfsd', 'sdfsd@sdf', '', 0, '', 'Choose a job type', 'sdfsdf', '', '', ''),
(8, 102, 'xchangin', 'xchangin@gmail.com', 'gurgaon', 22334455, 'xchanging.com', 'Full Time', 'up always', '<p>mnc originates at britainâ€ƒ</p>', 'to serve quality', 'world''s topmost web devel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_del`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_del` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `martial_status` varchar(25) NOT NULL,
  `facebook_id` varchar(50) NOT NULL,
  `linkedin_id` varchar(50) NOT NULL,
  `Physically_challenged` varchar(255) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_employee_del`
--

INSERT INTO `tbl_employee_del` (`employee_id`, `user_id`, `name`, `email`, `phoneno`, `address`, `zip`, `age`, `gender`, `martial_status`, `facebook_id`, `linkedin_id`, `Physically_challenged`) VALUES
(1, 0, 'test', 'test', 'test', 'test', '', '12', 'test', '', '', '', ''),
(2, 0, 'test', 'test', 'test', 'test', '', '12', 'test', '', '', '', ''),
(3, 0, 'asss', 'ass', 'ass', 'asas', '', '1', 'Other', '', '', '', ''),
(4, 0, 'werwr4', '43534er', 'werwrw', 'fsff', '', '5', 'Other', '', '', '', ''),
(5, 0, '', '', '', '', '', '0', '', '', '', '', ''),
(6, 0, 'asdasd', 'asdasda', 'asdasdasd', 'asdasdadasd', '', '23', 'femal', '', '', '', ''),
(16, 120, 'Gagandeep Singh', 'gsaini94@ymail.', '7508767900', '#37, Guru Gobind Singh Av', '', '21', 'male', 'N', 'aavvss', 'ssaww', ''),
(8, 0, 'dsaasd', 'asdd', 'asdad', '', '', '0', '', '', '', '', ''),
(9, 0, 'Gagandeep Singh', 'gsaini94@ymail.', '7508767900', '#37, Guru Gobind Singh Av', '', '22', 'male', '', '', '', ''),
(10, 0, 'saini', 'saini@gmail.com', '22334433', 'abc town', '', '28', 'femal', '', '', '', ''),
(11, 0, 'vishu', 'vishu@gmail.com', '112233332', 'vishu city', '', '22', 'male', '', '', '', ''),
(12, 0, 'adam', 'adam@ymail.com', '07508767900', 'adam town', '', '55', 'femal', '', '', '', ''),
(13, 104, 'rahul', 'rahul@gmail.com', '22332323', 'rahul town', '', '22', 'male', '', '', '', ''),
(14, 0, 'adsd', 'schumi.offi2124', '312123123', 'aasddsa', '', '21', 'male', '', '', '', ''),
(15, 120, 'rahul', 'rahul1@gmail.co', '1233442', 'rahul town', '', '20', 'male', '', '', '', ''),
(17, 0, 'Aman Khanna', 'nityam.aman@gma', '987', 'b 100 a south city 1', '', '39', 'male', 'M', 'www.facebook.com/nityam.aman', 'www.linkedin.com/amanits', ''),
(18, 0, 'Gagandeep,Singh', 'gsaini94@ymail.', '7508767900', '#37, Guru Gobind Singh Av', '144001', '0', 'male', 'N', 'll', 'gff', 'kk'),
(19, 0, 'Gagandeep,Singh', 'gsaini94@ymail.', '7508767900', '#37, Guru Gobind Singh Avenue,Jalandhar,Punjab', '144001', '2,12,1994', 'male', 'N', 'xcxc', 'cxcx', ''),
(20, 0, 'Gagandeep Singh', 'gsaini94@ymail.', '7508767900', '#37, Guru Gobind Singh Avenue,Jalandhar,Punjab', '144001', '2-12-1994', 'male', 'N', 'xcxc', 'cxcx', ''),
(21, 0, 'Gagandeep Singh', 'gsaini94@ymail.com', '7508767900', '#37, Guru Gobind Singh Avenue,Jalandhar,Punjab', '144001', '2-12-1994', 'male', 'N', 'xcxc', 'cxcx', 'dsff'),
(22, 0, 'Gagandeep Singh', 'gsaini94@ymail.com', '7508767900', '#37, Guru Gobind Singh Avenue,Jalandhar,Punjab', '144001', 'w-03-32', 'femal', '', '', '', ''),
(23, 0, 'Gagandeep Singh', 'gsaini94@ymail.com', '7508767900', '#37, Guru Gobind Singh Avenue,Jalandhar,Punjab', '144001', '3-02-2233', 'femal', '', '', '', ''),
(24, 0, 'aman khanna', 'nityam.aman@gmail.com', '9871333203', 'b 100 a, south city,gurgaon,Haryana', '122001', '13-09-1977', 'male', 'M', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_edd`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_edd` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_name` varchar(15) NOT NULL,
  `school_city` varchar(11) NOT NULL,
  `school_qualifications` varchar(15) NOT NULL,
  `school_board` varchar(25) NOT NULL,
  `school_passing` year(4) NOT NULL,
  `grad_school` varchar(15) NOT NULL,
  `grad_city` varchar(11) NOT NULL,
  `grad_qualifications` varchar(15) NOT NULL,
  `grad_board` varchar(25) NOT NULL,
  `grad_passing` year(4) NOT NULL,
  `postgrad_school` varchar(15) NOT NULL,
  `postgrad_city` varchar(11) NOT NULL,
  `postgrad_qualifications` varchar(15) NOT NULL,
  `postgrad_board` varchar(25) NOT NULL,
  `postgrad_passing` year(4) NOT NULL,
  `certificate` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee_edd`
--

INSERT INTO `tbl_employee_edd` (`employee_id`, `user_id`, `school_name`, `school_city`, `school_qualifications`, `school_board`, `school_passing`, `grad_school`, `grad_city`, `grad_qualifications`, `grad_board`, `grad_passing`, `postgrad_school`, `postgrad_city`, `postgrad_qualifications`, `postgrad_board`, `postgrad_passing`, `certificate`) VALUES
(0, 0, 'test', 'test', 'test', '2016-05-04', 2000, 'test', 'test', 'test', '2016-05-02', 2000, 'test', 'test', 'test', '2016-05-17', 2000, ''),
(0, 0, 'test', 'test', 'test', '2016-05-04', 2000, 'test', 'test', 'test', '2016-05-02', 2000, 'test', 'test', 'test', '2016-05-17', 2000, ''),
(14, 0, '', '', '', '', 0000, '', '', '', '', 0000, '', '', '', '', 0000, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(13, 104, 'laww', 'delhi', 'sada', 'dsdfk', 2012, 'djnds', 'jdsnjds', 'dsjnsjd', 'sdjkfn', 2014, 'asdjnasj', 'sd jksd', 'sd fkjs', 'dkf ksjd', 2016, 'ajksdnjasd,'),
(12, 79, 'law1', 'delji', 'masters', 'cbse', 2011, 'laww', 'delhi', 'maters in', 'ptu', 2013, 'rayat', 'delhi', 'post masters', 'du', 2015, 'nse,'),
(0, 0, 'law1', 'delji', 'masters', 'cbse', 2011, 'laww', 'delhi', 'maters in', 'ptu', 2013, 'rayat', 'delhi', 'post masters', 'du', 2015, 'nse,'),
(0, 0, 'law', 'Jalandhar', 'non med', 'cbse', 2012, 'rayat', 'chandigarh', 'btech', 'ptu', 2014, 'bahra', 'chandigarh', 'masters', 'ptu', 2016, 'nss,'),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 0000, '', '', '', '', 0000, '', '', '', '', 0000, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 2016, '', '', '', '', 2016, '', '', '', '', 2016, ','),
(14, 0, '', '', '', '', 0000, '', '', '', '', 0000, '', '', '', '', 0000, ','),
(14, 0, '', '', '', '', 0000, '', '', '', '', 0000, '', '', '', '', 0000, ','),
(17, 0, 'halwasiya vidya', 'bhiwani', '10+2', 'cbse', 1994, 'tITS ', 'bhiwani', 'btech', 'MDU', 1998, 'tits', 'bhi', 'mtech', 'mdu', 2014, 'RHCSA,DM'),
(21, 0, '', '', '', '', 0000, '', '', '', '', 0000, '', '', '', '', 0000, ','),
(21, 0, '', '', '', '', 0000, '', '', '', '', 0000, '', '', '', '', 0000, ','),
(24, 0, '', '', '', '', 0000, '', '', '', '', 0000, '', '', '', '', 0000, ',');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_exp`
--

CREATE TABLE IF NOT EXISTS `tbl_employee_exp` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `experience_yrs` int(11) NOT NULL,
  `key_skills` varchar(25) NOT NULL,
  `last_job` varchar(11) NOT NULL,
  `notice_period` varchar(25) NOT NULL,
  `company_worked` longtext NOT NULL,
  `current_salary` varchar(255) NOT NULL,
  `expected_salary` varchar(255) NOT NULL,
  `prefered_loc` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee_exp`
--

INSERT INTO `tbl_employee_exp` (`employee_id`, `user_id`, `experience_yrs`, `key_skills`, `last_job`, `notice_period`, `company_worked`, `current_salary`, `expected_salary`, `prefered_loc`) VALUES
(0, 0, 10, 'adasdasd', 'asdaddad', '', '0', '', '', ''),
(0, 0, 1, 'asdasd', 'advsdfsdfsd', '', '0', '', '', ''),
(0, 0, -1, '', '', '', '0', '', '', ''),
(12, 79, 1, 'taleneted', 'student', '', '0', '', '', ''),
(13, 104, 4, 'ds fs', 'dk sldkfds', '', '0', '', '', ''),
(14, 0, 0, '', '', '', '0', '', '', ''),
(14, 0, 1, 'asdasd', '', '', '0', '', '', ''),
(14, 0, 1, 'asdasd', '', '', '0', '', '', ''),
(14, 0, 1, 'asdasd', '', '', '0', '', '', ''),
(14, 0, 1, 'asdasd', '', '', '0', '', '', ''),
(14, 0, 1, 'asdasd', '', '', '0', '', '', ''),
(14, 0, 1, 'asdasd', '', '', '0', '', '', ''),
(15, 120, 1, 'asdasdas', 'asdasd', '', '0', '', '', ''),
(15, 120, 1, 'asdasdas', 'asdasd', '', '0', '', '', ''),
(15, 120, 1, 'asdasdas', 'asdasd', '', '0', '', '', ''),
(15, 120, 0, 'aasdddd', 'dddsss', '', 'none', 'none', '3', 'Chandigarh'),
(17, 0, 8, 'vmware', 'ceo', '', '4', '8+', '7', 'Delhi'),
(21, 0, 0, 'rrr', 'advsdfsdfsd', '44f', 'none', '0.5', '2', 'Delhi'),
(21, 0, 0, '', '', '', '', '', '', ''),
(23, 0, 0, '', '', '', '', '', '', ''),
(23, 0, 0, '', '', '', '', '', '', ''),
(24, 0, 0, '', '', 'Select', '', 'Select', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE IF NOT EXISTS `tbl_jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_title` varchar(25) NOT NULL,
  `department` varchar(25) NOT NULL,
  `role_location` varchar(25) NOT NULL,
  `job_type` varchar(25) NOT NULL,
  `job_category` varchar(25) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `job_experience` varchar(25) NOT NULL,
  `job_designation` varchar(25) NOT NULL,
  `remuneration` varchar(25) NOT NULL,
  `key_skills` varchar(255) NOT NULL,
  `keys_accountabilities` varchar(255) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`job_id`, `company_id`, `user_id`, `role_title`, `department`, `role_location`, `job_type`, `job_category`, `qualifications`, `job_description`, `job_experience`, `job_designation`, `remuneration`, `key_skills`, `keys_accountabilities`) VALUES
(1, 0, 0, 'web designer', 'Web developer', 'new york', 'Freelance', 'Internet Services', 'bachlors in computer, masters in web technology', 'this job is for web designer<br>basic knowledge of designing', '5', 'web designer', '2% after 1 year', 'htm<br>css<br>basic php', 'team worker<br>leader<br>working spirit'),
(2, 6, 102, 'sales', 'Sales Executive', 'delhi', 'Full Time', 'Management', 'masters', '<p>classic jobâ€ƒ</p>', '5', 'salea employee', '2% after 1 year', '<p>skill full&nbsp;â€ƒ</p>', '<p>leader</p><p><br></p>');

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
  `company_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `user`, `password`, `phoneno`, `type`, `auth_to`, `status`, `company_id`, `employee_id`) VALUES
(57, '', 'asd1213@asd.com', 'cddddddfdsf2', '0', '', '', '', 0, 0),
(56, 'gagan', 'gsaini94@ymail.com', 'wUq1jAi0Fx', '0', '1', '1', '1', 0, 0),
(58, '', 'sdfs8998@gmail.com', 'sadad', '0', '', '', '', 0, 0),
(79, 'assd', 'ada', 'asdasd', 'qwqww', '2', '', '1', 0, 0),
(105, 'asdsdad', 'asdsda@d.com', 'bahsdhbsdad', '432234234', '2', '', '1', 0, 0),
(104, 'rahul', 'rahul@gmail.com', 'qwerty', '22332323', '2', '', '1', 0, 0),
(106, 'sad', 'sdfs8998@gmail.com', 'dasdasdadad', '23423423423', '3', '', '1', 0, 0),
(107, 'sdfsdf', 'sdfs8998@gmail.com', '23ddsfsdf', '232323', '3', '', '1', 0, 0),
(108, 'sdfsdf', 'sdfs8998@gmail.com', '23ddsfsdf', '232323', '3', '', '1', 0, 0),
(109, 'sdfsdf', 'sdfs8998@gmail.com', '23ddsfsdf', '232323', '3', '', '1', 0, 0),
(110, 'sdfsdf', 'sdfs8998@gmail.com', '23ddsfsdf', '232323', '3', '', '1', 0, 0),
(111, 'sdfsdf', 'sdfs8998@gmail.com', '23ddsfsdf', '232323', '3', '', '1', 0, 0),
(112, 'sdfsdf', 'sdfs8998@gmail.com', 'dadasdasdasd', '232323', '3', '', '1', 0, 0),
(113, 'sdfsdf', 'sdfs8998@gmail.com', 'dadasdasdasd', '232323', '3', '', '1', 0, 0),
(114, 'asdad', 'sdfs8998@gmail.com', 'sadaddsds', '323232', '3', '', '1', 0, 0),
(116, 'sasdasd', 'cccv@ss.com', 'asdsdsds', '2342344', '3', '', '1', 0, 0),
(119, 'ddddd', 'ggn@ymail.com', 'eeeeeeee', '423434', '3', '', '1', 0, 0),
(120, 'rahul', 'rahul1@gmail.com', 'qwertyu', '122334444', '2', '', '1', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
