-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2019 at 04:21 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_mngt`
--

-- --------------------------------------------------------

--
-- Table structure for table `TM_emp_details`
--

CREATE TABLE `TM_emp_details` (
  `id` int(2) NOT NULL,
  `TM_empid` int(11) NOT NULL,
  `TM_empname` varchar(35) NOT NULL,
  `TM_email` text NOT NULL,
  `TM_creation_date` date NOT NULL,
  `TM_creation_date_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TM_feature_info`
--

CREATE TABLE `TM_feature_info` (
  `TM_feature_id` int(2) NOT NULL,
  `TM_feature_tag_name` char(25) NOT NULL,
  `TM_feature_name` varchar(12) NOT NULL,
  `TM_created_date_time` datetime(6) NOT NULL,
  `TM_created_date` datetime(6) NOT NULL,
  `TM_menu_flag` int(2) NOT NULL,
  `TM_display_flag` int(2) NOT NULL,
  `TM_feature_display_name` char(15) NOT NULL,
  `isActive` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TM_feature_info`
--

INSERT INTO `TM_feature_info` (`TM_feature_id`, `TM_feature_tag_name`, `TM_feature_name`, `TM_created_date_time`, `TM_created_date`, `TM_menu_flag`, `TM_display_flag`, `TM_feature_display_name`, `isActive`) VALUES
(1, 'add', 'Add', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 1, 1, 'Create Feature', 1),
(2, 'VIEW', 'view', '2019-05-01 00:00:00.000000', '2019-05-02 02:00:00.000000', 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TM_map_feature`
--

CREATE TABLE `TM_map_feature` (
  `id` int(2) NOT NULL,
  `TM_feature_id` int(2) NOT NULL,
  `Tm_Role_id` int(2) NOT NULL,
  `isActive` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TM_map_feature`
--

INSERT INTO `TM_map_feature` (`id`, `TM_feature_id`, `Tm_Role_id`, `isActive`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `TM_map_role`
--

CREATE TABLE `TM_map_role` (
  `id` int(2) NOT NULL,
  `TM_info_user_id` int(2) NOT NULL,
  `TM_role_id` int(2) NOT NULL,
  `isActive` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TM_map_role`
--

INSERT INTO `TM_map_role` (`id`, `TM_info_user_id`, `TM_role_id`, `isActive`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `TM_roll_info`
--

CREATE TABLE `TM_roll_info` (
  `TM_role_id` int(2) NOT NULL,
  `TM_role_name` varchar(12) NOT NULL,
  `TM_role_description` varchar(100) NOT NULL,
  `isActive` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TM_roll_info`
--

INSERT INTO `TM_roll_info` (`TM_role_id`, `TM_role_name`, `TM_role_description`, `isActive`) VALUES
(1, 'SuperAdmin', 'Admin has full access', 1),
(2, 'Admin', 'Manager has only view and add access', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TM_user_info`
--

CREATE TABLE `TM_user_info` (
  `TM_info_user_id` int(10) NOT NULL,
  `TM_info_user_name` varchar(26) NOT NULL,
  `TM_info_user_pass` varchar(200) NOT NULL,
  `TM_info_user_emailid` varchar(26) NOT NULL,
  `TM_info_user_rollid` int(10) NOT NULL,
  `TM_info_user_createdby` int(10) NOT NULL,
  `TM_info_user_created_date_time` datetime(6) NOT NULL,
  `TM_info_user_created_date` datetime(6) NOT NULL,
  `TM_info_user_isActive` int(2) NOT NULL,
  `TM_info_login_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TM_user_info`
--

INSERT INTO `TM_user_info` (`TM_info_user_id`, `TM_info_user_name`, `TM_info_user_pass`, `TM_info_user_emailid`, `TM_info_user_rollid`, `TM_info_user_createdby`, `TM_info_user_created_date_time`, `TM_info_user_created_date`, `TM_info_user_isActive`, `TM_info_login_id`) VALUES
(1, 'SHREYA', '827ccb0eea8a706c4c34a16891f84e7b', 'shreyakumar375@gmail.com', 1, 1, '2019-05-06 17:06:14.000000', '2019-05-06 17:06:14.000000', 0, 11),
(2, 'SURYA', 'e10adc3949ba59abbe56e057f20f883e', 'surya123@gmail.com', 2, 0, '2019-05-13 11:32:18.000000', '2019-05-13 11:32:18.000000', 1, 0),
(3, 'kamalraj1', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(4, 'Bhosdrike chutiyta', '123', 'rahul12@gmail.com', 0, 0, '2019-05-02 16:08:03.000000', '2019-05-02 16:08:03.000000', 0, 0),
(5, 'raj', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(6, 'roshan', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(7, 'raja', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(8, 'shreyansh', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(9, 'shreyanshdfd', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(10, 'SHREYASFDD', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(11, 'SHREYAo', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(12, 'fbfbfv', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(13, '', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 1, 0),
(14, 'rahulroy', '9ecf7d2f798a8b33', 'rahul122@gmail.com', 0, 0, '2019-05-14 15:26:03.000000', '2019-05-14 15:26:03.000000', 1, 2),
(15, 'ravi', '14251', 'ravirangan2123@gmail.com', 0, 0, '2019-05-07 13:03:05.000000', '2019-05-07 13:03:05.000000', 0, 3),
(16, 'ravis', 'jbvbvkjdbssd', 'ravirangan2223@gmail.com', 0, 0, '2019-04-30 01:40:00.000000', '2019-04-30 00:00:00.000000', 0, 4),
(17, 'ravneesh', '21545', 'ravdfdn2223@gmail.com', 0, 0, '2019-04-30 01:43:00.000000', '2019-04-30 00:00:00.000000', 0, 5),
(18, '', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 1, 0),
(19, '', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 1, 0),
(20, '', '', '', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 1, 0),
(21, 'syedsahi', '321456', 'syedsahiba@gmail.com', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 10),
(22, 'SURYA', '123456', 'surya123@gmail.com', 2, 0, '2019-05-02 04:46:00.000000', '2019-05-10 00:00:00.000000', 0, 1124),
(23, 'syedsahiba', '1421', 'syedsahiba@gmail.com', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 1425),
(24, 'syedsahiba@gmail.com', '321456', 'syedsahiba@gmail.com', 0, 0, '2019-05-07 16:59:00.000000', '2019-05-07 16:59:00.000000', 0, 0),
(25, 'SHREYAS', '81dc9bdb52d04dc2', 'surya12233@gmail.com', 0, 0, '2019-05-10 11:31:30.000000', '2019-05-10 11:31:30.000000', 1, 2),
(26, 'bvfjknjf', 'gdfgdfg', 'chsb@gmkdnmkgm', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 2323),
(27, 'asdfd', 'vdsvdsf', 'dsafdsafasdf', 0, 0, '2019-05-25 05:20:00.000000', '2019-05-10 00:00:00.000000', 0, 1124),
(28, 'SHAREYANSH', '1245', 'shreyansh2131@gmail.com', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0),
(29, 'ramas roy', '1425', 'ramas12@gmail.com', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 454),
(30, 'shre', '12345', 'shreyakumar3765@gmail.com', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 1414),
(31, 'ukujhkyuhk', 'yukyuk', 'ukujhkyuhk@gmail.com', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 1421),
(32, 'shakit roy', '89466a9e14ee803e', 'shakit3451@gmail.com', 0, 0, '2019-05-10 11:31:10.000000', '2019-05-10 11:31:10.000000', 1, 1247),
(33, 'Radhike roy', '4561', 'radhike191@gmail.com', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 4587),
(34, 'wwqq', '73e5f60ed2a36e84', 'shakit3451@gmail.com', 0, 0, '2019-05-10 11:30:24.000000', '2019-05-10 11:30:24.000000', 0, 111),
(35, 'priytosh', '827ccb0eea8a706c4c34a16891f84e7b', 'priyotosh123@gmail.com', 0, 0, '2019-05-16 13:24:56.000000', '2019-05-16 13:24:56.000000', 1, 14145),
(36, 'sdfgh', 'fcea920f7412b5da', 'shreyakumar375@gmail.com', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 12345),
(37, 'bvjknbjvknkj', '8bb802c7e87c5e63', 'shreya375@gmail.com', 0, 0, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 789),
(38, 'rakesh singh', 'a4f3e2a65158f75932acafcd57d5142c', 'rakesh1234@gmail.com', 0, 0, '2019-05-16 13:13:47.000000', '2019-05-16 13:13:47.000000', 1, 141431),
(39, 'shreyas', 'ec6a6536ca304edf844d1d248a4f08dc', 'iyer4321@gmail.com', 0, 0, '2019-05-20 10:39:34.000000', '2019-05-20 10:39:34.000000', 1, 0),
(40, 'Rohini Dey', '025d61b7c6b3c37f3104afd3251ba7ff', 'rohini12@gmail.com', 0, 0, '2019-05-16 17:14:51.000000', '2019-05-16 17:14:51.000000', 1, 2313214),
(41, 'shabina', '9ecf7d2f798a8b33b3a993f2d6b528e4', 'shabina949@gmail.com', 0, 0, '2019-05-15 16:59:58.000000', '2019-05-15 16:59:58.000000', 1, 1554),
(42, 'sunmugaraj', '65f7a8c59283b5e0b379ea0ee5de8e03', 'sunmugarajd@ninestars.in', 0, 0, '2019-05-16 11:50:37.000000', '2019-05-16 11:50:37.000000', 1, 2450),
(43, 'avikroy', '08fa0a7e19b1eaaa7655d54fabf8ec61', 'avikroy123@gmail.com', 0, 0, '2019-05-16 13:34:08.000000', '2019-05-16 13:34:08.000000', 0, 1414),
(44, 'sana', 'b5e50dc6642a7fce5f623c097de86fa1', 'sana123@gmail.com', 0, 0, '2019-05-16 15:20:42.000000', '2019-05-16 15:20:42.000000', 1, 1237895),
(45, 'ronisa', '791da938da2842aa5b11bf9bd47d3c0a', 'ronia12@gmail.com', 0, 0, '2019-05-17 11:27:22.000000', '2019-05-17 11:27:22.000000', 1, 0),
(46, 'hfgthgf', '7f9f580abbb44c05db8224c7b547842e', 'htfhtfhyftghbfgh', 0, 0, '2019-05-17 11:30:01.000000', '2019-05-17 11:30:01.000000', 0, 0),
(47, 'dsfsdfdsf', '827ccb0eea8a706c4c34a16891f84e7b', 'dsfsdfdsf@gmail.com', 0, 0, '2019-05-17 11:33:58.000000', '2019-05-17 11:33:58.000000', 0, 0),
(48, 'shreya kumar', 'd95b06e2191a9364cfd59d86530106e9', 'shreya123@gmail.com', 0, 0, '2019-05-17 11:34:48.000000', '2019-05-17 11:34:48.000000', 1, 0),
(49, 'Ronak', '733d7be2196ff70efaf6913fc8bdcabf', 'ronak121@gmail.com', 0, 0, '2019-05-20 14:48:14.000000', '2019-05-20 14:48:14.000000', 1, 0),
(50, 'ward', 'e10adc3949ba59abbe56e057f20f883e', 'ward123@gmail.com', 0, 0, '2019-05-20 14:52:40.000000', '2019-05-20 14:52:40.000000', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `TM_user_log`
--

CREATE TABLE `TM_user_log` (
  `TM_user_log_id` int(2) NOT NULL,
  `TM_user_log_modify_id` int(2) NOT NULL,
  `TM_user_log_myid` int(2) NOT NULL,
  `TM_user_log_info` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TM_usser_log`
--

CREATE TABLE `TM_usser_log` (
  `TM_user_log_id` int(2) NOT NULL,
  `TM_user_log_modify_id` int(2) NOT NULL,
  `TM_user_log_myid` int(2) NOT NULL,
  `TM_user_log_info` char(35) NOT NULL,
  `isActive` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TM_emp_details`
--
ALTER TABLE `TM_emp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TM_feature_info`
--
ALTER TABLE `TM_feature_info`
  ADD PRIMARY KEY (`TM_feature_id`);

--
-- Indexes for table `TM_map_feature`
--
ALTER TABLE `TM_map_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TM_map_role`
--
ALTER TABLE `TM_map_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TM_roll_info`
--
ALTER TABLE `TM_roll_info`
  ADD PRIMARY KEY (`TM_role_id`);

--
-- Indexes for table `TM_user_info`
--
ALTER TABLE `TM_user_info`
  ADD PRIMARY KEY (`TM_info_user_id`);

--
-- Indexes for table `TM_user_log`
--
ALTER TABLE `TM_user_log`
  ADD PRIMARY KEY (`TM_user_log_id`);

--
-- Indexes for table `TM_usser_log`
--
ALTER TABLE `TM_usser_log`
  ADD PRIMARY KEY (`TM_user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TM_emp_details`
--
ALTER TABLE `TM_emp_details`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TM_feature_info`
--
ALTER TABLE `TM_feature_info`
  MODIFY `TM_feature_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `TM_map_feature`
--
ALTER TABLE `TM_map_feature`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `TM_map_role`
--
ALTER TABLE `TM_map_role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `TM_roll_info`
--
ALTER TABLE `TM_roll_info`
  MODIFY `TM_role_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `TM_user_info`
--
ALTER TABLE `TM_user_info`
  MODIFY `TM_info_user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `TM_user_log`
--
ALTER TABLE `TM_user_log`
  MODIFY `TM_user_log_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TM_usser_log`
--
ALTER TABLE `TM_usser_log`
  MODIFY `TM_user_log_id` int(2) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
