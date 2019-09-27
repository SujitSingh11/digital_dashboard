-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 10:32 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `fl_user`
--

CREATE TABLE `fl_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `user_type` tinyint(5) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `login_counter` int(100) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fl_manager`
--
ALTER TABLE `fl_manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fl_user`
--
ALTER TABLE `fl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
