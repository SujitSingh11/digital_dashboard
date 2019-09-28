-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 06:17 AM
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

--
-- Dumping data for table `fl_admin`
--

INSERT INTO `fl_admin` (`admin_id`, `user_id`, `ID`) VALUES
(1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fl_comment`
--

CREATE TABLE `fl_comment` (
  `comment_id` int(11) NOT NULL,
  `task_id` int(100) NOT NULL,
  `employee_id` int(100) DEFAULT NULL,
  `manager_id` int(100) DEFAULT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fl_employee`
--

CREATE TABLE `fl_employee` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `ID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_employee`
--

INSERT INTO `fl_employee` (`employee_id`, `user_id`, `ID`) VALUES
(4, 10, NULL),
(5, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fl_manager`
--

CREATE TABLE `fl_manager` (
  `manager_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `ID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_manager`
--

INSERT INTO `fl_manager` (`manager_id`, `user_id`, `ID`) VALUES
(1, 9, NULL),
(4, 14, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fl_project`
--

CREATE TABLE `fl_project` (
  `project_id` int(11) NOT NULL,
  `manager_id` int(5) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_desc` text NOT NULL,
  `deadline` date DEFAULT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_project`
--

INSERT INTO `fl_project` (`project_id`, `manager_id`, `project_name`, `project_desc`, `deadline`, `time_created`) VALUES
(11, 1, 'Node Application', 'Build an application using Node JS', '2019-10-01', '2019-09-27 19:20:04'),
(13, 1, 'Creating an Activity Tracker', 'Creating an Activity Tracker', '2019-09-30', '2019-09-27 19:34:56'),
(15, 1, 'Adding', 'Added', '2020-11-20', '2019-09-28 03:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `fl_task`
--

CREATE TABLE `fl_task` (
  `task_id` int(11) NOT NULL,
  `project_id` int(100) NOT NULL,
  `task_name` text NOT NULL,
  `task_description` text NOT NULL,
  `manager_id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `task_status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fl_task_assigned`
--

CREATE TABLE `fl_task_assigned` (
  `task_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
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
(3, 'SujitKumar', 'Singh', 'sujitkumarsingh29@gmail.com', '$2y$10$2x.8AsKbn6zJz30lAXODCuuc38OfN60ib3ihdrGfDfocYusnO1w8q', '8df707a948fac1b4a0f97aa554886ec8', 0, 1, 6, '2019-09-27 14:43:59'),
(9, 'Parth', 'Ladda', 'parth@gmail.com', '$2y$10$tWkEjyjT8wSZ934azMv4Jexufb31ix6aCMYczWEV1Ma9WexiNZ5cG', '9c82c7143c102b71c593d98d96093fde', 1, 1, 7, '2019-09-27 17:46:09'),
(10, 'SapnaK', 'Rathod', 'sapna@gmail.com', '$2y$10$.3C.Yg5UP3HC9RuXVxutU.san3nQ0y1zBezBfq5p9cv/WHU7GO5ea', '24b16fede9a67c9251d3e7c7161c83ac', 2, 1, 4, '2019-09-27 17:50:31'),
(11, 'agham', 'shah', 'agham@gmail.com', '$2y$10$sRrvmFbXldx0fg//GPFh4uFqyR9nbYHj9XUkJHs2QGZdN7UcaxQku', '5487315b1286f907165907aa8fc96619', 1, 1, 0, '2019-09-27 18:53:53'),
(12, 'Sanket', 'Kulkarni', 'sanket@gmail.com', '$2y$10$kbfk05nf3ucyQ295hXb6lO4TzdFT3ofe/s0tckJnwWuxnkYqlSKtO', '70efdf2ec9b086079795c442636b55fb', 1, 1, 0, '2019-09-27 20:44:12'),
(13, 'Shubham', 'Shirpurkar', 'shirpurkar.shubham@gmail.com', '$2y$10$ExgIZqIa/ir3qan2DnbJEekDMzPSrsYhj3x4BDlt4gaqGJlgNxeZy', 'd56b9fc4b0f1be8871f5e1c40c0067e7', 0, 1, 0, '2019-09-27 21:54:49'),
(14, 'Aarti', 'Tiwari', 'aarti@gmail.com', '$2y$10$jMV2d/D4FxVpfkcrjX871ex56GmuR6/3kL5V.SNRAkwGjsju7zv46', '1bb91f73e9d31ea2830a5e73ce3ed328', 1, 1, 0, '2019-09-28 01:07:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fl_admin`
--
ALTER TABLE `fl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `fl_comment`
--
ALTER TABLE `fl_comment`
  ADD PRIMARY KEY (`comment_id`);

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
-- Indexes for table `fl_task`
--
ALTER TABLE `fl_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `fl_task_assigned`
--
ALTER TABLE `fl_task_assigned`
  ADD PRIMARY KEY (`task_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fl_comment`
--
ALTER TABLE `fl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fl_employee`
--
ALTER TABLE `fl_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fl_manager`
--
ALTER TABLE `fl_manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fl_project`
--
ALTER TABLE `fl_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fl_task`
--
ALTER TABLE `fl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fl_task_assigned`
--
ALTER TABLE `fl_task_assigned`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fl_user`
--
ALTER TABLE `fl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
