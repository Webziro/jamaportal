-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2023 at 06:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jamaportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `sys_log`
--

CREATE TABLE `sys_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `log_time_diff` varchar(35) DEFAULT NULL,
  `log_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_log`
--

INSERT INTO `sys_log` (`log_id`, `user_id`, `login_time`, `logout_time`, `log_time_diff`, `log_date`) VALUES
(1, 2, '2023-03-30 17:26:45', '2023-03-30 19:26:54', NULL, '2023-03-30 16:26:45'),
(2, 2, '2023-03-30 17:27:03', '2023-03-30 17:27:39', NULL, '2023-03-30 16:27:03'),
(3, 2, '2023-03-30 15:49:07', '2023-03-30 17:49:16', NULL, '2023-03-30 16:49:07'),
(4, 2, '2023-03-30 18:06:48', '2023-03-30 18:07:33', NULL, '2023-03-30 17:06:48'),
(5, 2, '2023-03-30 18:09:59', '2023-03-30 18:11:20', NULL, '2023-03-30 17:09:59'),
(6, 2, '2023-03-30 18:11:31', '2023-03-30 18:15:21', NULL, '2023-03-30 17:11:31'),
(7, 2, '2023-03-30 18:15:26', '2023-03-30 18:15:48', NULL, '2023-03-30 17:15:26'),
(8, 2, '2023-03-30 18:15:53', '2023-03-30 18:58:02', NULL, '2023-03-30 17:15:53'),
(9, 2, '2023-03-30 18:58:13', '2023-03-30 20:54:55', NULL, '2023-03-30 17:58:13'),
(10, 2, '2023-03-30 20:58:08', NULL, NULL, '2023-03-30 19:58:08'),
(11, 5, '2023-03-31 11:24:18', '2023-03-31 11:24:22', NULL, '2023-03-31 10:24:18'),
(12, 5, '2023-03-31 11:24:28', '2023-03-31 15:12:06', NULL, '2023-03-31 10:24:28'),
(13, 3, '2023-03-31 12:45:26', NULL, NULL, '2023-03-31 11:45:26'),
(14, 3, '2023-03-31 12:53:04', NULL, NULL, '2023-03-31 11:53:04'),
(15, 7, '2023-03-31 14:31:40', NULL, NULL, '2023-03-31 13:31:40'),
(16, 7, '2023-03-31 16:39:44', NULL, NULL, '2023-03-31 15:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `sys_task`
--

CREATE TABLE `sys_task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(30) DEFAULT NULL,
  `date_started` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `supervisor` varchar(30) DEFAULT NULL,
  `task_status` enum('P','A','PR') NOT NULL DEFAULT 'P' COMMENT 'P:Pending, A:Approved, PR:Processing',
  `assigned_to` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_task`
--

INSERT INTO `sys_task` (`task_id`, `task_name`, `date_started`, `date_end`, `supervisor`, `task_status`, `assigned_to`) VALUES
(27, 'Front end API', '2023-03-29 14:07:36', NULL, 'Jama', 'P', '2'),
(28, ' Newt Project Update Tesing', '2023-03-31 00:00:00', '2023-04-07 00:00:00', 'Jerry', 'P', '2'),
(29, 'Front end API TESTING', '2023-03-30 00:00:00', '2023-04-09 00:00:00', 'Divine', 'A', '2'),
(30, 'New Project', '2023-03-29 16:21:56', NULL, 'Kelvin', 'PR', '4'),
(37, ' Back end structure and Git', '2023-03-29 18:41:45', NULL, '27', 'P', '3'),
(38, ' Push all Projects to git lab', '2023-03-29 18:44:03', NULL, '29', 'P', '2'),
(40, ' Consume Api', '2023-03-31 00:00:00', '2023-04-07 00:00:00', NULL, 'P', '7');

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

CREATE TABLE `sys_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `user_password` varchar(250) DEFAULT NULL,
  `roles` enum('staff','admin') NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`id`, `full_name`, `department`, `user_name`, `user_password`, `roles`) VALUES
(2, 'user', 'Front-end', 'jamasoft', '12345', 'staff'),
(3, 'Chidera Lilian', 'Front-end/React', 'dera', '12345', 'staff'),
(4, 'Victor Ifeanyi', 'Backend PHP', 'victor', '12345', 'staff'),
(5, 'Jerry Chukwudi', 'React', 'admin-1', '12345', 'admin'),
(7, 'Stanley Aamziro', 'PHP', 'stanley', '12345', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sys_log`
--
ALTER TABLE `sys_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sys_task`
--
ALTER TABLE `sys_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sys_log`
--
ALTER TABLE `sys_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sys_task`
--
ALTER TABLE `sys_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sys_log`
--
ALTER TABLE `sys_log`
  ADD CONSTRAINT `sys_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sys_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
