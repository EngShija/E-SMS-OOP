-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 05:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_smsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `day` varchar(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `day`, `student_id`, `status`) VALUES
(3, '2025-02-11', 'Tuesday', 'ID67a91229a0d432.54460126', 'present'),
(11, '2025-02-13', 'Thursday ', 'ID67a91229a0d432.54460126', 'present'),
(12, '2025-02-13', 'Thursday ', 'ID67ae146836ddc3.72912548', 'present'),
(17, '2025-02-14', 'Friday', 'ID67a91229a0d432.54460126', 'present'),
(18, '2025-02-14', 'Friday', 'ID67ae146836ddc3.72912548', 'absent'),
(20, '2025-02-24', 'Monday', 'ID67a91229a0d432.54460126', 'present'),
(21, '2025-02-24', 'Monday', 'ID67ae146836ddc3.72912548', 'absent'),
(23, '2025-02-26', 'Wednesday', 'ID67a91229a0d432.54460126', 'absent'),
(24, '2025-02-26', 'Wednesday', 'ID67ae146836ddc3.72912548', 'present'),
(26, '2025-03-02', 'Sunday', 'ID67a91229a0d432.54460126', 'present'),
(27, '2025-03-02', 'Sunday', 'ID67ae146836ddc3.72912548', 'absent'),
(28, '2025-03-02', 'Sunday', 'ID67ae154276b083.96317429', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`) VALUES
(1, 'FORM ONE'),
(2, 'FORM TWO'),
(3, 'FIRST YEAR');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `exam_name`) VALUES
(4, 'Midterm Test 1'),
(5, 'Midterm Test 2'),
(6, 'Competance Exam');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `login_time`, `status`) VALUES
(40, 'ID123456789', '2025-02-27 17:16:03', 'success'),
(48, 'ID67a9124080cc61.31381762', '2025-02-28 11:27:43', 'success'),
(49, 'ID67a9124080cc61.31381762', '2025-02-28 12:00:52', 'success'),
(50, 'ID67a9124080cc61.31381762', '2025-02-28 12:40:08', 'success'),
(51, 'ID67a9124080cc61.31381762', '2025-02-28 12:40:08', 'success'),
(52, 'ID67a9124080cc61.31381762', '2025-02-28 12:42:35', 'success'),
(53, 'ID67a9124080cc61.31381762', '2025-02-28 12:45:53', 'success'),
(54, 'ID67a9124080cc61.31381762', '2025-02-28 12:45:53', 'success'),
(55, 'ID67a9124080cc61.31381762', '2025-02-28 12:45:57', 'success'),
(56, 'ID67a9124080cc61.31381762', '2025-02-28 12:53:53', 'success'),
(57, 'ID67a9124080cc61.31381762', '2025-02-28 13:00:58', 'success'),
(58, 'ID67a9124080cc61.31381762', '2025-02-28 13:00:58', 'success'),
(59, 'ID67a9124080cc61.31381762', '2025-02-28 13:04:03', 'success'),
(60, 'ID67a9124080cc61.31381762', '2025-02-28 13:19:36', 'success'),
(104, 'ID67a9124080cc61.31381762', '2025-02-28 17:12:22', 'failed (incorrect password)'),
(105, 'ID67a9124080cc61.31381762', '2025-02-28 17:12:22', 'failed (incorrect password)'),
(106, 'ID123456789', '2025-02-28 17:13:36', 'success'),
(107, 'ID123456789', '2025-02-28 17:15:34', 'success'),
(108, 'ID67015c14d07119.50844433', '2025-02-28 17:15:59', 'success'),
(109, 'ID67a9124080cc61.31381762', '2025-02-28 17:17:01', 'failed (incorrect password)'),
(110, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:40', 'failed (incorrect password)'),
(111, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:40', 'failed (incorrect password)'),
(112, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:52', 'failed (incorrect password)'),
(113, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:53', 'failed (incorrect password)'),
(114, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:53', 'failed (incorrect password)'),
(115, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:55', 'failed (incorrect password)'),
(116, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:55', 'failed (incorrect password)'),
(117, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:55', 'failed (incorrect password)'),
(118, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:55', 'failed (incorrect password)'),
(119, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:56', 'failed (incorrect password)'),
(120, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:56', 'failed (incorrect password)'),
(121, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:56', 'failed (incorrect password)'),
(122, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:56', 'failed (incorrect password)'),
(123, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:56', 'failed (incorrect password)'),
(124, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:56', 'failed (incorrect password)'),
(125, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:57', 'failed (incorrect password)'),
(126, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:57', 'failed (incorrect password)'),
(127, 'ID67a9124080cc61.31381762', '2025-02-28 17:40:57', 'failed (incorrect password)'),
(128, 'ID67a9124080cc61.31381762', '2025-02-28 17:41:31', 'failed (incorrect password)'),
(129, 'ID67a9124080cc61.31381762', '2025-02-28 17:50:30', 'failed (incorrect password)'),
(130, 'ID67a9124080cc61.31381762', '2025-02-28 17:50:31', 'failed (incorrect password)'),
(131, 'ID123456789', '2025-02-28 17:50:36', 'success'),
(132, 'ID123456789', '2025-02-28 17:50:36', 'success'),
(133, 'ID123456789', '2025-02-28 17:50:44', 'success'),
(134, 'ID123456789', '2025-02-28 17:50:45', 'success'),
(135, 'ID123456789', '2025-02-28 17:51:13', 'success'),
(136, 'ID123456789', '2025-02-28 17:51:14', 'success'),
(137, 'ID123456789', '2025-02-28 17:52:20', 'success'),
(138, 'ID123456789', '2025-02-28 17:52:21', 'success'),
(139, 'ID67a9124080cc61.31381762', '2025-02-28 17:55:18', 'failed (incorrect password)'),
(140, 'ID123456789', '2025-02-28 17:55:24', 'success'),
(141, 'ID123456789', '2025-02-28 17:55:24', 'success'),
(142, 'ID123456789', '2025-02-28 17:56:51', 'success'),
(143, 'ID123456789', '2025-02-28 17:57:16', 'success'),
(144, 'ID67a9124080cc61.31381762', '2025-02-28 17:57:26', 'failed (incorrect password)'),
(145, 'ID67a9124080cc61.31381762', '2025-02-28 18:16:24', 'success'),
(146, 'ID67a9124080cc61.31381762', '2025-02-28 18:16:24', 'success'),
(147, 'ID123456789', '2025-02-28 18:20:47', 'success'),
(148, 'ID123456789', '2025-02-28 18:20:48', 'success'),
(149, 'ID123456789', '2025-02-28 18:20:55', 'success'),
(150, 'ID67c1fecc586fd4.87068564', '2025-02-28 18:22:37', 'success'),
(151, 'ID123456789', '2025-02-28 18:23:43', 'success'),
(152, 'ID67ae156e8e6d68.00745316', '2025-02-28 18:25:07', 'failed (incorrect password)'),
(153, 'ID67ae156e8e6d68.00745316', '2025-02-28 18:25:49', 'success'),
(154, 'ID67ae156e8e6d68.00745316', '2025-02-28 18:30:08', 'success'),
(155, 'ID123456789', '2025-02-28 18:32:24', 'success'),
(156, 'ID123456789', '2025-02-28 18:32:25', 'success'),
(157, 'ID123456789', '2025-02-28 18:55:07', 'success'),
(159, 'ID67015c14d07119.50844433', '2025-02-28 18:56:58', 'failed (incorrect password)'),
(160, 'ID67015c14d07119.50844433', '2025-02-28 18:57:01', 'success'),
(210, 'ID67ae156e8e6d68.00745316', '2025-03-01 01:19:48', 'success'),
(232, 'ID67a9124080cc61.31381762', '2025-03-01 03:45:21', 'success'),
(233, 'ID67a9124080cc61.31381762', '2025-03-01 03:45:21', 'success'),
(234, 'ID67a9124080cc61.31381762', '2025-03-01 03:56:09', 'success'),
(235, 'ID67a9124080cc61.31381762', '2025-03-01 04:01:27', 'success'),
(237, 'ID67a9124080cc61.31381762', '2025-03-01 04:07:52', 'success'),
(238, 'ID67a9124080cc61.31381762', '2025-03-01 04:14:56', 'success'),
(239, 'ID67a9124080cc61.31381762', '2025-03-01 04:28:30', 'success'),
(240, 'ID67a9124080cc61.31381762', '2025-03-01 04:54:00', 'success'),
(241, 'ID67a9124080cc61.31381762', '2025-03-01 04:55:48', 'success'),
(242, 'ID67a9124080cc61.31381762', '2025-03-01 04:55:48', 'success'),
(246, 'ID67a9124080cc61.31381762', '2025-03-01 05:39:38', 'success'),
(247, 'ID67a9124080cc61.31381762', '2025-03-01 05:39:38', 'success'),
(265, 'ID67c351e9e40cc3.57957349', '2025-03-01 19:31:19', 'success'),
(266, 'ID67015c14d07119.50844433', '2025-03-01 19:35:45', 'failed (incorrect password)'),
(267, 'ID67015c14d07119.50844433', '2025-03-01 19:35:48', 'success'),
(275, 'ID67015c14d07119.50844433', '2025-03-01 20:26:47', 'success'),
(276, 'ID67015c14d07119.50844433', '2025-03-01 20:26:47', 'success'),
(277, 'ID67015c14d07119.50844433', '2025-03-01 20:33:54', 'success'),
(278, 'ID67015c14d07119.50844433', '2025-03-01 20:33:55', 'success'),
(279, 'ID67015c14d07119.50844433', '2025-03-01 20:35:01', 'success'),
(280, 'ID67015c14d07119.50844433', '2025-03-01 20:42:29', 'success'),
(302, 'ID67015c14d07119.50844433', '2025-03-02 11:31:52', 'success'),
(303, 'ID67015c14d07119.50844433', '2025-03-02 11:31:53', 'success'),
(304, 'ID67015c14d07119.50844433', '2025-03-02 11:31:54', 'success'),
(305, 'ID67015c14d07119.50844433', '2025-03-02 11:39:35', 'success'),
(318, 'ID67015d92d60128.06247950', '2025-03-02 15:26:26', 'success'),
(319, 'ID67015d92d60128.06247950', '2025-03-02 15:26:26', 'success'),
(320, 'ID123456789', '2025-03-02 15:29:55', 'success'),
(321, 'ID67015d92d60128.06247950', '2025-03-02 15:30:41', 'success'),
(322, 'ID67015d92d60128.06247950', '2025-03-02 15:30:42', 'success'),
(323, 'ID67015d92d60128.06247950', '2025-03-02 22:39:04', 'success'),
(324, 'ID67015d92d60128.06247950', '2025-03-02 22:39:04', 'success'),
(325, 'ID67015d92d60128.06247950', '2025-03-02 22:52:46', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `physical_address` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `unique_id`, `student_id`, `phone`, `gender`, `physical_address`, `relation`) VALUES
(1, 'ID67c351e9e40cc3.57957349', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father'),
(2, 'ID67c351e9e40cc3.57957349', 'ID67ae146836ddc3.72912548', '0686798738', 'male', 'Bariadi', 'father'),
(3, 'ID67c351e9e40cc3.57957349', 'ID67c4679f13f453.33403629', '0686798738', 'male', 'Bariadi', 'father'),
(4, 'ID67c46b5f3d8c86.40326566', 'ID67ae154276b083.96317429', '0686798738', 'male', 'Bariadi', 'uncle'),
(5, 'ID67c472046e6459.22521429', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father'),
(6, 'ID67c472046e6459.22521429', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father'),
(7, 'ID67c4e17c4598c4.53489939', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father'),
(8, 'ID67c4e17c8db204.99374017', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father'),
(9, 'ID67c4e21ea95843.78450904', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `marks` decimal(5,0) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `description` varchar(20) DEFAULT NULL,
  `point` int(2) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `teacher_id`, `subject_name`, `exam_type`, `marks`, `grade`, `description`, `point`, `status`, `added_at`) VALUES
(2, 'ID67a91229a0d432.54460126', 'ID67015d92d60128.06247950', 'Mathematics', 'Midterm Test 1 2025', '80', 'A', 'Excellent', 1, 'verified', '2025-03-01 05:29:21'),
(3, 'ID67a91229a0d432.54460126', 'ID67015d92d60128.06247950', 'Programming', 'Midterm Test 1 2025', '70', 'B', 'Very Good', 2, 'verified', '2025-03-01 05:29:21'),
(4, 'ID67a91229a0d432.54460126', 'ID67015d92d60128.06247950', 'Biology', 'Midterm Test 1 2025', '90', 'A', 'Excellent', 1, 'verified', '2025-03-01 05:29:21'),
(5, 'ID67ae146836ddc3.72912548', 'ID67015d92d60128.06247950', 'History', 'Midterm Test 1 2025', '78', 'A', 'Excellent', 1, 'verified', '2025-03-01 05:29:21'),
(6, 'ID67a91229a0d432.54460126', 'ID67015d92d60128.06247950', 'Physics', 'Midterm Test 1 2025', '85', 'A', 'Excellent', 1, 'verified', '2025-03-01 05:29:21'),
(7, 'ID67ae146836ddc3.72912548', 'ID67015d92d60128.06247950', 'Graphics', 'Midterm Test 1 2025', '100', 'A', 'Excellent', 1, 'verified', '2025-03-01 05:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `reg_no` varchar(30) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `class` varchar(12) DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `unique_id`, `parent_id`, `first_name`, `middle_name`, `last_name`, `gender`, `reg_no`, `reg_date`, `class`, `profile_image`, `status`) VALUES
(17, 'ID67a91229a0d432.54460126', 'ID67c4e21ea95843.78450904', 'Maziba', 'Shija', 'Sitta', 'male', 'NIT/BCS/2023/200', '2025-02-09', 'FORM ONE', '', 'active'),
(18, 'ID67ae146836ddc3.72912548', 'ID67c351e9e40cc3.57957349', 'Singili', 'Gasamalu', 'Makula', 'male', 'NIT/BCS/2023/201', '2025-02-13', 'FORM ONE', '', 'active'),
(19, 'ID67ae154276b083.96317429', NULL, 'Test1', 'Test', 'User', 'female', 'NIT/BCS/2023/204', '2025-02-13', 'FORM ONE', '', 'deleted'),
(20, 'ID67c4679f13f453.33403629', 'ID67c351e9e40cc3.57957349', 'Juma', 'Adam', 'Matondo', 'male', '3333', '2025-03-02', 'FORM TWO', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub_name`, `category`) VALUES
(2, 'Physics', 'science'),
(7, 'Geography', 'science'),
(8, 'Programming', 'science'),
(20, 'Biology', 'Science'),
(21, 'Mathematics', 'Science'),
(24, 'History', 'Arts'),
(25, 'Graphics', 'Science'),
(26, 'Psychology', 'Arts'),
(27, 'Ecology', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `subject_category`
--

CREATE TABLE `subject_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_category`
--

INSERT INTO `subject_category` (`id`, `category`) VALUES
(1, 'Science'),
(2, 'Arts'),
(3, 'Religion'),
(4, 'Commercial'),
(5, 'Language');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time_slots` varchar(20) DEFAULT NULL,
  `timetable_type` varchar(255) NOT NULL,
  `date` varchar(30) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `yos` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `teacher_id`, `subject_id`, `class_id`, `day`, `time_slots`, `timetable_type`, `date`, `exam_id`, `yos`) VALUES
(1, '', 21, 2, 'Monday', '02:30 - 03:30', 'Exam', '2025-02-02', NULL, 2025),
(2, '', 20, 1, 'Monday', '10:00 - 11:00', 'Class', '', NULL, 2025),
(7, '', 17, 1, 'Monday', '13:00 - 14:00', 'Exam', '2025-01-30', 1, 2025),
(9, '', 25, 1, 'Friday', '08:00 - 09:00', 'Class', '', NULL, 2025),
(10, 'ID67015d92d60128.06247950', 21, 2, 'Tuesday', '08:00 - 09:00', 'Class', '', NULL, 2025);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'teacher',
  `subject_tought` varchar(255) DEFAULT NULL,
  `change_password_attemts` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `first_name`, `last_name`, `email_address`, `gender`, `password`, `profile_image`, `role`, `subject_tought`, `change_password_attemts`) VALUES
(1, 'ID123456789', 'Nkinda', 'Sitta', 'shija0105@gmail.com', 'male', '$2y$10$LHtsWeoJSBbImcKNBZvvYO11Vlir93F9UFwRUA.6xyLiLk/qWDJn.', '', 'admin', NULL, 0),
(3, 'ID67015c14d07119.50844433', 'Singili', 'Makula', 'singili@gmail.com', 'male', '$2y$10$xKhjwpOK/aJqGkuIMgBB3eZa2hjv.UU.T6u8eEYWldgnyMJyNRmWG', 'PROFILE_IMAGE', 'teacher', NULL, 0),
(4, 'ID67015d92d60128.06247950', 'Kushaha', 'Shija', 'kushaha@gmail.com', 'male', '$2y$10$tQsrZaCdjtDCgJLofmkg..okuzGh/QkhdiFrmjb1vAlqolZ4bIOa.', 'PROFILE_IMAGE', 'admin', 'Graphics', 0),
(6, 'ID67c351e9e40cc3.57957349', 'Adam', 'Matondo', 'adam@gmail.com', 'male', '$2y$10$9fErpSZKbKbwa9HmtNnFAe8qR82MOGtR2WmRvwSEci2.gOiLTYyAa', NULL, 'parent', NULL, 0),
(7, 'ID67c366ad101621.09100774', 'Juma', 'Mgunda', 'mgunda@gmail.com', 'male', '$2y$10$akCU8oWsdr7NyieEbnIseOBGXauDypfeK8qsT6gJR7fox4P3thjbO', 'PROFILE_IMAGE', 'teacher', 'Psychology', 0),
(9, 'ID67c46b5f3d8c86.40326566', 'test', 'user', 'test@gmail.com', 'male', '$2y$10$rFomZ0v7sjDmOTyGOomf8OkOmXTztznRyGL96tyb8io.NXQPjMhJa', NULL, 'parent', NULL, 0),
(10, 'ID67c46f1e9d8487.88084010', 'Adam', 'Matondo', 'adam@gmail.com', 'male', '$2y$10$3leZzoDMx//w2skQ1uQDIuI4td4ufBkhNye3AB6PWjVbVjfYd/K1e', NULL, 'parent', NULL, 0),
(11, 'ID67c472046e6459.22521429', 'Shija', 'Mboje', 'shijamboje@gmail.com', 'male', '$2y$10$lJuYRIsY65gfr3RqvrzlzuAWkRstcbofUaioQCfDEx/Siks1.yIOC', NULL, 'parent', NULL, 0),
(12, 'ID67c4debf3119d4.12936218', 'Shija', 'Mboje', 'shijamboje@gmail.com', 'male', '$2y$10$HzB.r43rChddHFg2vwI8wuNMqQN6peMsMTRFdXUNEu9XXjASSo8IO', NULL, 'parent', NULL, 0),
(13, 'ID67c4e17c4598c4.53489939', 'Shija', 'Mboje', 'shija@gmail.com', 'male', '$2y$10$678i6gxYC7S85eBjgZaR7ew/F83dhfXT2OD9Z3daHXBw/500KUv9S', NULL, 'parent', NULL, 0),
(14, 'ID67c4e17c8db204.99374017', 'Shija', 'Mboje', 'shija@gmail.com', 'male', '$2y$10$QBr9qfq3PISn6tWwLZIlpOuB8CjOBNQIoOuC5FNK51Qo5UtmxLnuK', NULL, 'parent', NULL, 0),
(15, 'ID67c4e21ea95843.78450904', 'Adam', 'Matondo', 'adam@gmail.com', 'male', '$2y$10$strrpZwIvcRAuHRlYu0uo.q7qEwHu14XSDhoQ1umWG.JOSsxdIFgq', NULL, 'parent', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_category`
--
ALTER TABLE `subject_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subject_category`
--
ALTER TABLE `subject_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
