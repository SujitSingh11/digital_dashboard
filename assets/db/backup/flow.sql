-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 12:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flow`
--

-- --------------------------------------------------------

--
-- Table structure for table `fl_admin`
--

CREATE TABLE `fl_admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fl_employee`
--

CREATE TABLE `fl_employee` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `dep_id` int(100) NOT NULL,
  `ID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_employee`
--

INSERT INTO `fl_employee` (`employee_id`, `user_id`, `dep_id`, `ID`) VALUES
(3, 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fl_manager`
--

CREATE TABLE `fl_manager` (
  `manager_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `ID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fl_project`
--

CREATE TABLE `fl_project` (
  `project_id` int(11) NOT NULL,
  `manager_id` int(5) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_desc` mediumtext NOT NULL,
  `dept_code` int(11) NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fl_user`
--

CREATE TABLE `fl_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `user_type` tinyint(5) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `login_counter` int(100) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_user`
--

INSERT INTO `fl_user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `hash`, `user_type`, `active`, `login_counter`, `create_time`) VALUES
(3, 'Sujit', 'Singh', 'sujitkumarsingh29@gmail.com', '$2y$10$2x.8AsKbn6zJz30lAXODCuuc38OfN60ib3ihdrGfDfocYusnO1w8q', '8df707a948fac1b4a0f97aa554886ec8', 2, 1, 0, '2019-09-27 14:43:59'),
(4, '', '', '', '', '', 0, 0, 1, '2019-09-27 15:03:19'),
(5, '', '', '', '', '', 0, 0, 1, '2019-09-27 15:22:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fl_admin`
--
ALTER TABLE `fl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `fl_employee`
--
ALTER TABLE `fl_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `fl_manager`
--
ALTER TABLE `fl_manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `fl_project`
--
ALTER TABLE `fl_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `fl_user`
--
ALTER TABLE `fl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fl_admin`
--
ALTER TABLE `fl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fl_employee`
--
ALTER TABLE `fl_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fl_manager`
--
ALTER TABLE `fl_manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fl_project`
--
ALTER TABLE `fl_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fl_user`
--
ALTER TABLE `fl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
