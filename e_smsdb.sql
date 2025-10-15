-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 06:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `status` varchar(20) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `day`, `student_id`, `status`, `school_id`) VALUES
(3, '2025-02-11', 'Tuesday', 'ID67a91229a0d432.54460126', 'present', 1),
(11, '2025-02-13', 'Thursday ', 'ID67a91229a0d432.54460126', 'present', 1),
(12, '2025-02-13', 'Thursday ', 'ID67ae146836ddc3.72912548', 'present', 1),
(17, '2025-02-14', 'Friday', 'ID67a91229a0d432.54460126', 'present', 1),
(18, '2025-02-14', 'Friday', 'ID67ae146836ddc3.72912548', 'absent', 1),
(20, '2025-02-24', 'Monday', 'ID67a91229a0d432.54460126', 'present', 1),
(21, '2025-02-24', 'Monday', 'ID67ae146836ddc3.72912548', 'absent', 1),
(23, '2025-02-26', 'Wednesday', 'ID67a91229a0d432.54460126', 'absent', 1),
(24, '2025-02-26', 'Wednesday', 'ID67ae146836ddc3.72912548', 'present', 1),
(26, '2025-03-02', 'Sunday', 'ID67a91229a0d432.54460126', 'present', 1),
(27, '2025-03-02', 'Sunday', 'ID67ae146836ddc3.72912548', 'absent', 1),
(28, '2025-03-02', 'Sunday', 'ID67ae154276b083.96317429', 'present', 1),
(29, '2025-03-16', 'Sunday', 'ID67a91229a0d432.54460126', 'absent', 1),
(30, '2025-03-16', 'Sunday', 'ID67ae146836ddc3.72912548', 'present', 1),
(31, '2025-03-16', 'Sunday', 'ID67ae154276b083.96317429', 'present', 1),
(32, '2025-03-18', 'Tuesday', 'ID67a91229a0d432.54460126', 'absent', 1),
(33, '2025-03-18', 'Tuesday', 'ID67ae146836ddc3.72912548', 'present', 1),
(34, '2025-03-18', 'Tuesday', 'ID67ae154276b083.96317429', 'present', 1),
(35, '2025-03-23', 'Sunday', 'ID67a91229a0d432.54460126', 'present', 1),
(36, '2025-03-23', 'Sunday', 'ID67ae146836ddc3.72912548', 'absent', 1),
(37, '2025-03-23', 'Sunday', 'ID67ae154276b083.96317429', 'present', 1),
(38, '2025-03-27', 'Thursday', 'ID67a91229a0d432.54460126', 'absent', 1),
(39, '2025-03-27', 'Thursday', 'ID67ae146836ddc3.72912548', 'present', 1),
(40, '2025-03-27', 'Thursday', 'ID67ae154276b083.96317429', 'present', 1),
(41, '2025-04-02', 'Wednesday', 'ID67a91229a0d432.54460126', 'present', 1),
(42, '2025-04-02', 'Wednesday', 'ID67ae146836ddc3.72912548', 'absent', 1),
(43, '2025-04-02', 'Wednesday', 'ID67ae154276b083.96317429', 'present', 1),
(44, '2025-04-03', 'Thursday', 'ID67c4679f13f453.33403629', 'present', 1),
(45, '2025-04-03', 'Thursday', 'ID67a91229a0d432.54460126', 'present', 1),
(46, '2025-04-03', 'Thursday', 'ID67ae146836ddc3.72912548', 'absent', 1),
(47, '2025-04-03', 'Thursday', 'ID67ae154276b083.96317429', 'present', 1),
(48, '2025-04-07', 'Monday', 'ID67a91229a0d432.54460126', 'present', 1),
(49, '2025-04-07', 'Monday', 'ID67ae146836ddc3.72912548', 'present', 1),
(50, '2025-04-07', 'Monday', 'ID67ae154276b083.96317429', 'absent', 1),
(51, '2025-04-09', 'Wednesday', 'ID67a91229a0d432.54460126', 'absent', 1),
(52, '2025-04-09', 'Wednesday', 'ID67ae146836ddc3.72912548', 'present', 1),
(53, '2025-04-09', 'Wednesday', 'ID67ae154276b083.96317429', 'present', 1),
(54, '2025-04-09', 'Wednesday', 'ID67f45da24ce1d3.82759712', 'absent', 1),
(55, '2025-04-11', 'Friday', 'ID67a91229a0d432.54460126', 'present', 0),
(56, '2025-04-11', 'Friday', 'ID67a91229a0d432.54460126', 'absent', 0),
(57, '2025-04-11', 'Friday', 'ID67a91229a0d432.54460126', 'present', 0),
(58, '2025-04-11', 'Friday', 'ID67a91229a0d432.54460126', 'absent', 0),
(59, '2025-04-11', 'Friday', 'ID67ae146836ddc3.72912548', 'absent', 0),
(60, '2025-04-11', 'Friday', 'ID67ae154276b083.96317429', 'absent', 0),
(61, '2025-04-11', 'Friday', 'ID67f45da24ce1d3.82759712', 'absent', 0),
(62, '2025-04-12', 'Saturday', 'ID67ae146836ddc3.72912548', 'absent', 0),
(63, '2025-04-12', 'Saturday', 'ID67a91229a0d432.54460126', 'present', 0),
(64, '2025-04-12', 'Saturday', 'ID67ae154276b083.96317429', 'present', 0),
(65, '2025-04-12', 'Saturday', 'ID67f45da24ce1d3.82759712', 'absent', 0),
(66, '2025-04-12', 'Saturday', 'ID67c4679f13f453.33403629', 'present', 0),
(67, '2025-04-14', 'Monday', 'ID67a91229a0d432.54460126', 'absent', 0),
(68, '2025-04-14', 'Monday', 'ID67ae146836ddc3.72912548', 'present', 0),
(69, '2025-04-14', 'Monday', 'ID67ae154276b083.96317429', 'present', 0),
(70, '2025-04-14', 'Monday', 'ID67f45da24ce1d3.82759712', 'absent', 0),
(71, '2025-04-14', 'Monday', 'ID67c4679f13f453.33403629', 'present', 0),
(73, '2025-04-14', 'Monday', 'ID67f46245c4c2d7.53856666', 'present', 0),
(74, '2025-04-14', 'Monday', 'ID67f58b4554c6b9.90531333', 'present', 0),
(75, '2025-04-14', 'Monday', 'ID67f58b71027772.44734149', 'present', 0),
(76, '2025-04-14', 'Monday', 'ID67f58b88a50b06.82568008', 'absent', 0),
(77, '2025-04-14', 'Monday', 'ID67f58ba9b4c030.85486313', 'absent', 0),
(78, '2025-04-14', 'Monday', 'ID67f58c3a427bc7.45396973', 'present', 0),
(79, '2025-04-14', 'Monday', 'ID67f836609e3590.99352512', 'absent', 0),
(80, '2025-04-14', 'Monday', 'ID67f8371eb5f635.07730886', 'absent', 0),
(81, '2025-04-14', 'Monday', 'ID67f4488c571ee7.00401299', 'present', 0),
(82, '2025-05-02', 'Friday', 'ID67a91229a0d432.54460126', 'present', 1),
(83, '2025-05-02', 'Friday', 'ID67ae146836ddc3.72912548', 'absent', 1),
(84, '2025-05-03', 'Saturday', 'ID67a91229a0d432.54460126', 'present', 1),
(85, '2025-05-03', 'Saturday', 'ID67ae146836ddc3.72912548', 'absent', 1),
(86, '2025-05-03', 'Saturday', 'ID67ae154276b083.96317429', 'present', 1),
(87, '2025-05-03', 'Saturday', 'ID67f45da24ce1d3.82759712', 'absent', 1),
(88, '2025-05-03', 'Saturday', 'ID67c4679f13f453.33403629', 'absent', 1),
(89, '2025-05-03', 'Saturday', 'ID67f4488c571ee7.00401299', 'present', 1),
(90, '2025-05-04', 'Sunday', 'ID67a91229a0d432.54460126', 'present', 1),
(91, '2025-05-04', 'Sunday', 'ID67ae146836ddc3.72912548', 'absent', 1),
(92, '2025-05-04', 'Sunday', 'ID67ae154276b083.96317429', 'absent', 1),
(93, '2025-05-04', 'Sunday', 'ID67f45da24ce1d3.82759712', 'absent', 1),
(95, '2025-05-05', 'Monday', 'ID67f4488c571ee7.00401299', 'present', 1),
(96, '2025-05-05', 'Monday', 'ID67f46245c4c2d7.53856666', 'present', 1),
(97, '2025-05-05', 'Monday', 'ID67f58b4554c6b9.90531333', 'present', 1),
(98, '2025-05-05', 'Monday', 'ID67f58b71027772.44734149', 'present', 1),
(99, '2025-05-05', 'Monday', 'ID67f58b88a50b06.82568008', 'absent', 1),
(100, '2025-05-05', 'Monday', 'ID67f58ba9b4c030.85486313', 'present', 1),
(101, '2025-05-05', 'Monday', 'ID67f58c3a427bc7.45396973', 'present', 1),
(102, '2025-05-05', 'Monday', 'ID67a91229a0d432.54460126', 'absent', 1),
(103, '2025-05-05', 'Monday', 'ID67ae146836ddc3.72912548', 'present', 1),
(104, '2025-05-05', 'Monday', 'ID67ae154276b083.96317429', 'absent', 1),
(105, '2025-05-05', 'Monday', 'ID67f45da24ce1d3.82759712', 'present', 1),
(106, '2025-05-05', 'Monday', 'ID67c4679f13f453.33403629', 'absent', 1),
(107, '2025-05-13', 'Tuesday', 'ID67a91229a0d432.54460126', 'present', 1),
(108, '2025-05-13', 'Tuesday', 'ID67ae146836ddc3.72912548', 'present', 1),
(109, '2025-05-13', 'Tuesday', 'ID67ae154276b083.96317429', 'absent', 1),
(110, '2025-05-13', 'Tuesday', 'ID67f45da24ce1d3.82759712', 'absent', 1),
(111, '2025-05-19', 'Monday', 'ID67f8371eb5f635.07730886', 'present', 2),
(112, '2025-05-19', 'Monday', 'ID67f836609e3590.99352512', 'absent', 2),
(113, '2025-06-09', 'Monday', 'ID67a91229a0d432.54460126', 'absent', 1),
(114, '2025-06-09', 'Monday', 'ID67f45da24ce1d3.82759712', 'present', 1),
(115, '2025-06-09', 'Monday', 'ID67f58ba9b4c030.85486313', 'present', 1),
(116, '2025-06-09', 'Monday', 'ID67f58c3a427bc7.45396973', 'absent', 1),
(117, '2025-06-09', 'Monday', 'ID684584d6a02321.18662372', 'absent', 1),
(118, '2025-06-09', 'Monday', 'ID684584d6a0a482.22452927', 'present', 1),
(119, '2025-06-09', 'Monday', 'ID684584d6a0e338.80537672', 'present', 1),
(120, '2025-06-09', 'Monday', 'ID67f836609e3590.99352512', 'present', 2),
(122, '2025-06-09', 'Monday', 'ID684563be13ff20.51155197', 'present', 2),
(123, '2025-06-09', 'Monday', 'ID684563be145637.19813706', 'absent', 2),
(124, '2025-06-09', 'Monday', 'ID684563be1526b0.47130065', 'present', 2),
(125, '2025-06-09', 'Monday', 'ID684563be156d19.36450372', 'present', 2),
(126, '2025-06-09', 'Monday', 'ID684563be15daa0.41259651', 'present', 2),
(127, '2025-06-09', 'Monday', 'ID684563be164852.76303585', 'present', 2),
(128, '2025-06-09', 'Monday', 'ID67f8371eb5f635.07730886', 'present', 2),
(129, '2025-07-10', 'Thursday', 'ID67a91229a0d432.54460126', 'present', 1),
(130, '2025-07-10', 'Thursday', 'ID67f45da24ce1d3.82759712', 'absent', 1),
(131, '2025-07-10', 'Thursday', 'ID67f58ba9b4c030.85486313', 'present', 1),
(132, '2025-07-10', 'Thursday', 'ID67f58c3a427bc7.45396973', 'present', 1),
(133, '2025-07-19', 'Saturday', 'ID67a91229a0d432.54460126', 'absent', 1),
(134, '2025-07-19', 'Saturday', 'ID67f45da24ce1d3.82759712', 'present', 1),
(135, '2025-07-19', 'Saturday', 'ID67f58ba9b4c030.85486313', 'present', 1),
(136, '2025-07-19', 'Saturday', 'ID67f58c3a427bc7.45396973', 'present', 1),
(137, '2025-07-19', 'Saturday', 'ID684584d6a02321.18662372', 'absent', 1),
(138, '2025-07-19', 'Saturday', 'ID684584d6a0a482.22452927', 'absent', 1),
(139, '2025-07-19', 'Saturday', 'ID684584d6a0e338.80537672', 'present', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `school_id`) VALUES
(1, 'PCM', 1),
(2, 'PCB', 1),
(3, 'HKL', 1),
(4, 'CBG', 2),
(5, 'HGK', 1),
(6, 'EGM', 2),
(7, 'FORM ONE', 0),
(8, 'FORM TWO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `exam_name`, `school_id`) VALUES
(4, 'Midterm Test 1', 1),
(5, 'Midterm Test 2', 1),
(6, 'Competance Exam', 1),
(7, 'Annual Exam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_timetable`
--

CREATE TABLE `exam_timetable` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `day` varchar(15) NOT NULL,
  `time_slots` varchar(30) NOT NULL,
  `timetable_type` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `yos` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `category_name`, `description`, `school_id`) VALUES
(1, 'Tuition Fee', 'Annually', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_payments`
--

CREATE TABLE `fee_payments` (
  `id` int(11) NOT NULL,
  `student_fee_id` int(11) NOT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_mode` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_structures`
--

CREATE TABLE `fee_structures` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `term` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee_structures`
--

INSERT INTO `fee_structures` (`id`, `class_id`, `category_id`, `amount`, `term`) VALUES
(1, 1, 1, 70000.00, 'Full anual'),
(2, 3, 1, 70000.00, 'Full anual'),
(3, 2, 1, 80000.00, 'Full anual'),
(4, 5, 1, 70000.00, 'Full anual');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `platform` varchar(100) DEFAULT NULL,
  `device_type` varchar(50) DEFAULT NULL,
  `login_time` datetime DEFAULT current_timestamp(),
  `login_status` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `ip_address`, `browser`, `platform`, `device_type`, `login_time`, `login_status`, `school_id`) VALUES
(1, NULL, '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-09 14:33:00', 'Success', 1),
(15, 'ID67e659d7e890d3.16823785', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-09 23:13:03', 'Success', 0),
(48, 'ID123456789', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-10 23:56:04', 'Success', 0),
(49, 'ID123456789', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-10 23:58:38', 'Success', 0),
(50, 'ID123456789', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-11 00:02:02', 'Success', 0),
(51, 'ID123456789', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-11 00:03:57', 'Success', 0),
(52, 'ID123456789', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-11 00:04:29', 'Success', 0),
(53, 'ID123456789', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-11 00:08:47', 'Success', 0),
(80, 'ID67f59f0164f049.45244214', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-14 01:37:10', 'Failed - Invalid Password', 0),
(81, 'ID67f59f0164f049.45244214', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-14 01:37:18', 'Failed - Invalid Password', 0),
(82, 'ID67f59f0164f049.45244214', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-14 01:37:44', 'Success', 0),
(93, 'ID123456789', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-23 06:19:49', 'Success', 0),
(97, 'ID123456789', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-04-23 06:45:35', 'Success', 0),
(115, 'ID67e659d7e890d3.16823785', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-02 12:13:34', 'Success', 0),
(117, 'ID67e659d7e890d3.16823785', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-02 12:15:45', 'Success', 0),
(119, 'ID67e659d7e890d3.16823785', '127.0.0.1', 'Edge 135.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-03 23:52:08', 'Success', 0),
(229, 'ID123456789', '127.0.0.1', 'Edge 136.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-19 06:09:46', 'Success', 0),
(230, 'ID67c4e17c4598c4.53489939', '127.0.0.1', 'Edge 136.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-19 06:10:06', 'Failed - Invalid Password', 0),
(231, 'ID67f59c9a398433.41583407', '127.0.0.1', 'Edge 136.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-19 06:12:02', 'Failed - Invalid Password', 0),
(232, 'ID67f59c9a398433.41583407', '127.0.0.1', 'Edge 136.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-19 06:12:12', 'Failed - Invalid Password', 0),
(233, 'ID67f59c9a398433.41583407', '127.0.0.1', 'Edge 136.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-19 06:12:14', 'Failed - Invalid Password', 0),
(234, 'ID67f59c9a398433.41583407', '127.0.0.1', 'Edge 136.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-19 06:13:05', 'Success', 0),
(235, 'ID67f59c9a398433.41583407', '127.0.0.1', 'Edge 136.0.0.0', 'Windows 10.0', 'Desktop', '2025-05-19 06:21:33', 'Success', 0),
(275, 'ID67015c14d07119.50844433', '127.0.0.1', 'Edge 136.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-02 12:35:12', 'Success', 0),
(287, 'ID67015c14d07119.50844433', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-08 11:57:57', 'Success', 0),
(289, 'ID67015c14d07119.50844433', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-08 12:09:42', 'Success', 0),
(290, 'ID67015c14d07119.50844433', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-08 12:13:14', 'Success', 0),
(299, 'ID67015c14d07119.50844433', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-09 12:07:05', 'Success', 0),
(325, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 17:51:27', 'Success', 0),
(326, 'ID67015c14d07119.50844433', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 18:06:09', 'Success', 0),
(327, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 20:25:10', 'Success', 0),
(328, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 20:40:07', 'Success', 0),
(329, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 21:01:48', 'Success', 0),
(330, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 21:05:22', 'Success', 0),
(331, 'ID67f59c637e3f92.78061388', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 21:24:11', 'Failed - Invalid Password', 0),
(332, 'ID67f59c637e3f92.78061388', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 21:24:24', 'Failed - Invalid Password', 0),
(333, 'ID67f59c637e3f92.78061388', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 21:25:28', 'Success', 0),
(334, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 21:29:20', 'Success', 0),
(335, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 21:43:00', 'Success', 0),
(336, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 21:56:44', 'Success', 0),
(337, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 22:02:36', 'Success', 0),
(338, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-11 22:20:53', 'Success', 0),
(339, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-12 13:47:36', 'Success', 0),
(340, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 09:37:44', 'Success', 0),
(341, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 12:14:10', 'Success', 0),
(342, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 12:24:54', 'Success', 0),
(343, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 12:29:05', 'Success', 0),
(344, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 12:35:28', 'Success', 0),
(345, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 12:40:37', 'Success', 0),
(346, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 13:08:52', 'Success', 0),
(347, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 13:12:37', 'Success', 0),
(348, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 13:22:33', 'Success', 0),
(349, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 13:28:52', 'Success', 0),
(350, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 15:06:06', 'Success', 0),
(351, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 15:44:38', 'Success', 0),
(352, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 16:03:58', 'Success', 0),
(353, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 19:08:15', 'Success', 0),
(354, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 19:37:55', 'Success', 0),
(355, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-13 21:59:40', 'Success', 0),
(356, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-14 12:02:34', 'Success', 0),
(357, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-14 12:26:30', 'Success', 0),
(358, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-14 13:03:48', 'Success', 0),
(359, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-14 13:12:50', 'Success', 0),
(360, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-14 13:17:21', 'Success', 0),
(361, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-14 13:28:59', 'Success', 0),
(362, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-14 13:55:48', 'Success', 0),
(363, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-14 14:04:41', 'Success', 0),
(364, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-14 14:16:52', 'Success', 0),
(365, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 15:48:14', 'Success', 0),
(366, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 21:13:42', 'Success', 0),
(367, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 21:19:06', 'Success', 0),
(368, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 21:31:17', 'Success', 0),
(369, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 21:42:42', 'Success', 0),
(370, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 21:48:34', 'Success', 0),
(371, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 21:59:05', 'Success', 0),
(372, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 22:15:54', 'Success', 0),
(373, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 22:28:35', 'Success', 0),
(374, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 22:35:28', 'Success', 0),
(375, 'ID123456789', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 22:36:04', 'Success', 0),
(376, 'ID123456789', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 22:41:12', 'Success', 0),
(377, 'ID123456789', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 22:53:52', 'Success', 0),
(378, 'ID123456789', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-15 23:07:07', 'Success', 0),
(379, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-16 03:42:05', 'Success', 0),
(380, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-16 03:47:09', 'Success', 0),
(381, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-16 03:56:26', 'Success', 0),
(382, 'ID67015d92d60128.06247950', '192.168.138.196', 'Chrome 136.0.0.0', 'AndroidOS 10', 'Mobile', '2025-06-16 03:57:41', 'Success', 0),
(383, 'ID67015d92d60128.06247950', '192.168.138.196', 'Chrome 136.0.0.0', 'AndroidOS 10', 'Mobile', '2025-06-16 03:59:46', 'Success', 0),
(384, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-16 15:28:11', 'Success', 0),
(385, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-16 18:01:04', 'Success', 0),
(386, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-06-27 12:56:48', 'Success', 0),
(387, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 137.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-05 22:32:29', 'Success', 0),
(388, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 19:14:12', 'Success', 0),
(389, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 19:37:17', 'Success', 0),
(390, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 19:41:29', 'Success', 0),
(391, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 19:41:30', 'Success', 0),
(392, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 22:00:35', 'Success', 0),
(393, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 22:09:01', 'Success', 0),
(394, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 22:14:50', 'Success', 0),
(395, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 22:28:17', 'Success', 0),
(396, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 22:52:57', 'Success', 0),
(397, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-10 23:16:13', 'Success', 0),
(398, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-12 21:58:57', 'Success', 0),
(399, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 11:29:38', 'Success', 0),
(400, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 11:32:57', 'Success', 0),
(401, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 18:49:28', 'Success', 0),
(402, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 19:24:44', 'Success', 0),
(403, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 20:13:58', 'Success', 0),
(404, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 20:45:26', 'Success', 0),
(405, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 20:54:26', 'Success', 0),
(406, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 20:59:05', 'Success', 0),
(407, 'ID67c4e17c4598c4.53489939', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 20:59:42', 'Failed - Invalid Password', 0),
(408, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:00:15', 'Success', 0),
(409, 'ID67e659d7e890d3.16823785', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:03:06', 'Failed - Invalid Password', 0),
(410, 'ID67e659d7e890d3.16823785', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:03:53', 'Failed - Invalid Password', 0),
(411, 'ID67e659d7e890d3.16823785', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:04:00', 'Success', 0),
(412, 'ID67c472046e6459.22521429', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:05:48', 'Success', 0),
(413, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:16:52', 'Success', 0),
(414, 'ID67c351e9e40cc3.57957349', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:20:11', 'Success', 0),
(415, 'ID67c351e9e40cc3.57957349', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:30:33', 'Success', 0),
(416, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:35:43', 'Success', 0),
(417, 'ID67c351e9e40cc3.57957349', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:35:53', 'Success', 0),
(418, 'ID67c351e9e40cc3.57957349', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:43:42', 'Success', 0),
(419, 'ID67f59c637e3f92.78061388', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-13 21:57:21', 'Success', 0),
(420, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-14 00:33:56', 'Success', 0),
(421, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-14 00:46:31', 'Success', 0),
(422, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-15 21:58:37', 'Success', 0),
(423, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-19 14:17:41', 'Success', 0),
(424, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-19 14:23:54', 'Success', 0),
(425, 'ID67015d92d60128.06247950', '127.0.0.1', 'Edge 138.0.0.0', 'Windows 10.0', 'Desktop', '2025-07-19 22:05:49', 'Success', 0);

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
  `relation` varchar(255) DEFAULT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `unique_id`, `student_id`, `phone`, `gender`, `physical_address`, `relation`, `school_id`) VALUES
(1, 'ID67c351e9e40cc3.57957349', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father', 1),
(2, 'ID67c351e9e40cc3.57957349', 'ID67ae146836ddc3.72912548', '0686798738', 'male', 'Bariadi', 'father', 1),
(3, 'ID67c351e9e40cc3.57957349', 'ID67c4679f13f453.33403629', '0686798738', 'male', 'Bariadi', 'father', 1),
(4, 'ID67c46b5f3d8c86.40326566', 'ID67ae154276b083.96317429', '0686798738', 'male', 'Bariadi', 'uncle', 1),
(5, 'ID67c472046e6459.22521429', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father', 1),
(6, 'ID67c472046e6459.22521429', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father', 1),
(7, 'ID67c4e17c4598c4.53489939', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father', 1),
(8, 'ID67c4e17c8db204.99374017', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father', 1),
(9, 'ID67c4e21ea95843.78450904', 'ID67a91229a0d432.54460126', '0686798738', 'male', 'Bariadi', 'father', 1),
(11, 'ID67e659d7e890d3.16823785', 'ID67f4488c571ee7.00401299', '0786857533', NULL, 'Mwanza', 'father', 1),
(13, 'ID67015c14d07119.50844433', 'ID67f45da24ce1d3.82759712', '0786857533', 'male', 'Mwanza', 'father', 1),
(15, 'ID67f462e3d70d79.32984350', 'ID67f46245c4c2d7.53856666', '0786857533', 'male', 'Mwanza', 'father', 1),
(19, 'ID67f83d9f368868.21446556', 'ID67f8371eb5f635.07730886', '0786857539', 'male', 'Mwanza', 'father', 2),
(20, 'ID67f83dbe62a793.23871577', 'ID67f836609e3590.99352512', '0786857539', 'male', 'Mwanza', 'father', 2);

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
  `school_id` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `teacher_id`, `subject_name`, `exam_type`, `marks`, `grade`, `description`, `point`, `status`, `school_id`, `added_at`) VALUES
(2, 'ID67a91229a0d432.54460126', 'ID67015d92d60128.06247950', 'Mathematics', 'Midterm Test 1 2025', 80, 'A', 'Excellent', 1, 'verified', 1, '2025-03-01 05:29:21'),
(3, 'ID67a91229a0d432.54460126', 'ID67015d92d60128.06247950', 'Programming', 'Midterm Test 1 2025', 70, 'B', 'Very Good', 2, 'verified', 1, '2025-03-01 05:29:21'),
(4, 'ID67a91229a0d432.54460126', 'ID67015d92d60128.06247950', 'Biology', 'Midterm Test 1 2025', 90, 'A', 'Excellent', 1, 'verified', 1, '2025-03-01 05:29:21'),
(5, 'ID67ae146836ddc3.72912548', 'ID67015d92d60128.06247950', 'History', 'Midterm Test 1 2025', 78, 'A', 'Excellent', 1, 'verified', 1, '2025-03-01 05:29:21'),
(6, 'ID67a91229a0d432.54460126', 'ID67015d92d60128.06247950', 'Physics', 'Midterm Test 1 2025', 85, 'A', 'Excellent', 1, 'verified', 1, '2025-03-01 05:29:21'),
(7, 'ID67ae146836ddc3.72912548', 'ID67015d92d60128.06247950', 'Graphics', 'Midterm Test 1 2025', 100, 'A', 'Excellent', 1, 'verified', 1, '2025-03-01 05:29:21'),
(8, 'ID67ae154276b083.96317429', 'ID67015d92d60128.06247950', 'Mathematics', 'Midterm Test 1 2025', 78, 'A', 'Excellent', 1, 'verified', 1, '2025-05-13 20:05:41'),
(9, 'ID67c4679f13f453.33403629', 'ID67015d92d60128.06247950', 'Geography', 'Midterm Test 1 2025', 78, 'A', 'Excellent', 1, 'verified', 0, '2025-05-13 20:05:41'),
(10, 'ID67f4488c571ee7.00401299', 'ID67015d92d60128.06247950', 'Geography', 'Midterm Test 1 2025', 89, 'A', 'Excellent', 1, 'verified', 0, '2025-05-13 20:05:41'),
(11, 'ID67f836609e3590.99352512', 'ID67015c14d07119.50844433', 'Networking', 'Midterm Test 1 2025', 78, 'A', 'Excellent', 1, 'verified', 0, '2025-06-10 18:48:02'),
(22, 'ID684584d6a14465.12091315', 'ID67015d92d60128.06247950', 'Physics', 'Midterm Test 1 2025', 58, 'D', 'Stisfactory', 4, 'verified', 0, '2025-06-11 10:38:25'),
(23, 'ID67f4488c571ee7.00401299', 'ID67015d92d60128.06247950', 'Chemistry', 'Midterm Test 1 2025', 90, 'A', 'Excellent', 1, 'verified', 0, '2025-06-11 10:38:25'),
(24, 'ID684584d6a14465.12091315', 'ID67015d92d60128.06247950', 'Physics', 'Midterm Test 2 2025', 58, 'D', 'Stisfactory', 4, 'pending', 0, '2025-06-10 21:56:57'),
(25, 'ID67f4488c571ee7.00401299', 'ID67015d92d60128.06247950', 'Chemistry', 'Midterm Test 2 2025', 90, 'A', 'Excellent', 1, 'pending', 0, '2025-06-10 21:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `capacity` int(10) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_name`, `capacity`, `school_id`) VALUES
(1, 'CLASS 1', 80, 1),
(2, 'class 2', 70, 1),
(3, 'class 3', 100, 1),
(4, 'Aviation', 150, 1),
(5, 'Block 10', 55, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `school_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `address`, `phone`, `email`, `school_logo`) VALUES
(1, 'Green Valley High School', '123 Green Valley Rd', '1234567890', 'info@greenvalley.edu', NULL),
(2, 'Blue Ocean Academy', '456 Blue Ocean St', '0987654321', 'contact@blueocean.edu', NULL),
(3, 'Sunrise International School', '789 Sunrise Blvd', '1122334455', 'admin@sunrise.edu', NULL),
(4, 'BAGAMOYO SECONDARY SCHOOL', 'bBAGAMOYO PWANI', '0786857533', 'bagamoyosec@gmail.com', NULL);

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
  `class_id` varchar(12) DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `unique_id`, `parent_id`, `first_name`, `middle_name`, `last_name`, `gender`, `reg_no`, `reg_date`, `class_id`, `profile_image`, `status`, `school_id`) VALUES
(17, 'ID67a91229a0d432.54460126', 'ID67c4e17c4598c4.53489939', 'Maziba', 'Shija', 'Sitta', 'male', 'NIT/BCS/2023/200', '2025-02-09', '1', '', 'active', 1),
(18, 'ID67ae146836ddc3.72912548', 'ID67c4e17c4598c4.53489939', 'Singili', 'Gasamalu', 'Makula', 'male', 'NIT/BCS/2023/201', '2025-02-13', '2', '', 'active', 1),
(19, 'ID67ae154276b083.96317429', NULL, 'Test1', 'Test', 'User', 'female', 'NIT/BCS/2023/204', '2025-02-13', '3', '', 'deleted', 1),
(20, 'ID67c4679f13f453.33403629', 'ID67c351e9e40cc3.57957349', 'Juma', 'Adam', 'Matondo', 'male', '3333', '2025-03-02', '2', '', 'active', 1),
(21, 'ID67f4488c571ee7.00401299', 'ID67e659d7e890d3.16823785', 'Buddy', 'Nyankali', 'Nzige', 'female', 'NIT/BCS/2023/2011', '2025-04-07', '5', '', 'active', 1),
(22, 'ID67f45da24ce1d3.82759712', 'ID67015c14d07119.50844433', 'Kulwa', 'Singili', 'Gasamalu', 'male', 'NIT/BCS/2023/123', '2025-04-08', '1', '', 'active', 1),
(23, 'ID67f46245c4c2d7.53856666', 'ID67f462e3d70d79.32984350', 'Tajiri', 'Miliara', 'Logerieki', 'male', 'NIT/BCS/2023/452', '2025-04-08', '2', '', 'deleted', 1),
(24, 'ID67f58b4554c6b9.90531333', NULL, 'Silya', 'Shija', 'Sitta', 'female', 'NIT/BCS/2023/234', '2025-04-08', '2', '', 'active', 1),
(25, 'ID67f58b71027772.44734149', NULL, 'Tillu', 'Shija', 'Sitta', 'female', 'NIT/BCS/2023/238', '2025-04-08', '2', '', 'active', 1),
(26, 'ID67f58b88a50b06.82568008', NULL, 'Sibaba', 'Shija', 'Sitta', 'male', 'NIT/BCS/2023/239', '2025-04-08', '2', '', 'active', 1),
(27, 'ID67f58ba9b4c030.85486313', NULL, 'Samalu', 'Shija', 'Sitta', 'male', 'NIT/BCS/2023/240', '2025-04-08', '1', '', 'active', 1),
(28, 'ID67f58c3a427bc7.45396973', NULL, 'Raphael', 'Zacharia', 'Khanga', 'male', 'NIT/BCS/2023/241', '2025-04-08', '1', '', 'active', 1),
(29, 'ID67f836609e3590.99352512', 'ID67f83dbe62a793.23871577', 'Daudi', 'Nzumbi', 'Daudi', 'male', 'NIT/BCS/2023/248', '2025-04-10', '4', '', 'active', 2),
(30, 'ID67f8371eb5f635.07730886', 'ID67f83d9f368868.21446556', 'Frank', 'Samwel', 'Abraham', 'male', 'NIT/BCS/2023/2389', '2025-04-10', '4', '', 'active', 2),
(68, 'ID684563be13ff20.51155197', NULL, 'Nkinda', 'Shija', 'Sitta', 'male', '123456', '2025-06-08', '4', '', 'active', 2),
(69, 'ID684563be145637.19813706', NULL, 'John', 'Doe', 'Hamza', 'male', '66677', '2025-06-08', '4', '', 'active', 2),
(70, 'ID684563be14b2a4.86899139', NULL, 'Mlinda', 'Amani', 'Mwendwa', 'male', '131431', '2025-06-08', '6', '', 'active', 2),
(71, 'ID684563be1526b0.47130065', NULL, 'Halima', 'Omary', 'Millah', 'female', '11111', '2025-06-08', '4', '', 'active', 2),
(72, 'ID684563be156d19.36450372', NULL, 'Neema', 'Juma', 'James', 'female', '22222', '2025-06-08', '4', '', 'active', 2),
(73, 'ID684563be15daa0.41259651', NULL, 'Emmanuel', 'Dindayi', 'Salu', 'male', '33333', '2025-06-08', '4', '', 'active', 2),
(74, 'ID684563be164852.76303585', NULL, 'Sumayi', 'Masumbi', 'Masumbi', 'female', '565656', '2025-06-08', '4', '', 'active', 2),
(75, 'ID684563be168cc9.60250097', NULL, 'Asela', 'Ladislaus', 'Tarimo', 'female', '232323', '2025-06-08', '6', '', 'active', 2),
(76, 'ID684563be1719d2.94611063', NULL, 'Onestar', 'Florence', 'Ilongela', 'female', 'NIT/BCS/2022/475', '2025-06-08', '6', '', 'active', 2),
(77, 'ID684584d69f28d7.34886979', NULL, 'Nkinda', 'Shija', 'Sitta', 'male', '123456', '2025-06-08', '5', '', 'active', 1),
(78, 'ID684584d69f93c7.30157499', NULL, 'John', 'Doe', 'Hamza', 'male', '66677', '2025-06-08', '2', '', 'active', 1),
(79, 'ID684584d69fddb5.96550803', NULL, 'Mlinda', 'Amani', 'Mwendwa', 'male', '131431', '2025-06-08', '2', '', 'active', 1),
(80, 'ID684584d6a02321.18662372', NULL, 'Halima', 'Omary', 'Millah', 'female', '11111', '2025-06-08', '1', '', 'active', 1),
(81, 'ID684584d6a0a482.22452927', NULL, 'Neema', 'Juma', 'James', 'female', '22222', '2025-06-08', '1', '', 'active', 1),
(82, 'ID684584d6a0e338.80537672', NULL, 'Emmanuel', 'Dindayi', 'Salu', 'male', '33333', '2025-06-08', '1', '', 'active', 1),
(83, 'ID684584d6a11376.77786882', NULL, 'Sumayi', 'Masumbi', 'Masumbi', 'female', '565656', '2025-06-08', '2', '', 'active', 1),
(84, 'ID684584d6a14465.12091315', NULL, 'Asela', 'Ladislaus', 'Tarimo', 'female', '232323', '2025-06-08', '3', '', 'active', 1),
(85, 'ID684584d6a17791.40608618', NULL, 'Onestar', 'Florence', 'Ilongela', 'female', 'NIT/BCS/2022/475', '2025-06-08', '3', '', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `roll_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `structure_id` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `amount_due` decimal(10,2) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT 0.00,
  `payment_status` enum('Unpaid','Partial','Paid') DEFAULT 'Unpaid',
  `last_payment_date` date DEFAULT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub_name`, `category`, `school_id`) VALUES
(2, 'Physics', 'science', 1),
(7, 'Geography', 'science', 1),
(8, 'Programming', 'science', 1),
(20, 'Biology', 'Science', 1),
(21, 'Mathematics', 'Science', 1),
(25, 'Graphics', 'Science', 1),
(28, 'Networking', 'Science', 2),
(29, 'Computer Science', 'Science', 0),
(32, 'System Security', 'Science', 0),
(33, 'Chemistry', 'Science', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_category`
--

CREATE TABLE `subject_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_category`
--

INSERT INTO `subject_category` (`id`, `category`, `school_id`) VALUES
(1, 'Science', 1),
(2, 'Arts', 1),
(3, 'Religion', 1),
(4, 'Commercial', 1),
(5, 'Language', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `room_id` varchar(255) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time_slots` varchar(20) DEFAULT NULL,
  `timetable_type` varchar(255) NOT NULL,
  `date` varchar(30) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `yos` varchar(20) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `teacher_id`, `subject_id`, `room_id`, `class_id`, `day`, `time_slots`, `timetable_type`, `date`, `exam_id`, `yos`, `school_id`) VALUES
(209, 'ID67e659d7e890d3.16823785', 0, '1', 0, 'wednesday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 1),
(210, 'ID67e659d7e890d3.16823785', 0, '1', 0, 'friday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 1),
(211, 'ID67e659d7e890d3.16823785', 2, '1', 1, 'saturday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 1),
(212, 'ID67e659d7e890d3.16823785', 2, '1', 1, 'sunday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 1),
(213, 'ID67e659d7e890d3.16823785', 2, '1', 1, 'monday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 1),
(214, 'ID67e659d7e890d3.16823785', 2, '1', 1, 'tuesday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 1),
(215, 'ID67e659d7e890d3.16823785', 2, '1', 1, 'saturday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 1),
(216, 'ID67e659d7e890d3.16823785', 2, '1', 1, 'sunday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 1),
(217, 'ID67e659d7e890d3.16823785', 2, '1', 1, 'wednesday', '12:00 PM - 1:00 PM', 'class', NULL, NULL, '', 1),
(218, 'ID67e659d7e890d3.16823785', 2, '1', 1, 'friday', '12:00 PM - 1:00 PM', 'class', NULL, NULL, '', 1),
(219, 'ID67e659d7e890d3.16823785', 2, '1', 1, 'wednesday', '1:00 PM - 2:00 PM', 'class', NULL, NULL, '', 1),
(224, 'ID67f59c637e3f92.78061388', 8, '4', 5, 'sunday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 1),
(225, 'ID67f59c637e3f92.78061388', 8, '4', 5, 'wednesday', '12:00 PM - 1:00 PM', 'class', NULL, NULL, '', 1),
(226, 'ID67f59c637e3f92.78061388', 8, '4', 5, 'saturday', '1:00 PM - 2:00 PM', 'class', NULL, NULL, '', 1),
(227, 'ID67f59c637e3f92.78061388', 8, '4', 5, 'sunday', '1:00 PM - 2:00 PM', 'class', NULL, NULL, '', 1),
(228, 'ID67f59c9a398433.41583407', 0, '1', 0, 'thursday', '8:00 AM - 9:00 AM', 'class', NULL, NULL, '', 1),
(229, 'ID67f59c9a398433.41583407', 8, '2', 2, 'monday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 1),
(230, 'ID67f59c9a398433.41583407', 8, '2', 2, 'friday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 1),
(231, 'ID67f59c9a398433.41583407', 8, '2', 2, 'wednesday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 1),
(232, 'ID67f59c9a398433.41583407', 8, '2', 2, 'thursday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 1),
(233, 'ID67f59c9a398433.41583407', 8, '2', 2, 'wednesday', '12:00 PM - 1:00 PM', 'class', NULL, NULL, '', 1),
(234, 'ID67f59da3693db5.05978014', 8, '3', 1, 'monday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 1),
(235, 'ID67f59da3693db5.05978014', 8, '3', 1, 'tuesday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 1),
(236, 'ID67f59da3693db5.05978014', 8, '3', 1, 'tuesday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 1),
(237, 'ID67f59da3693db5.05978014', 8, '3', 1, 'monday', '12:00 PM - 1:00 PM', 'class', NULL, NULL, '', 1),
(238, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'monday', '8:00 AM - 9:00 AM', 'class', NULL, NULL, '', 2),
(239, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'wednesday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 2),
(240, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'thursday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 2),
(241, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'sunday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 2),
(242, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'monday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 2),
(243, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'tuesday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 2),
(244, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'friday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 2),
(245, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'wednesday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 2),
(246, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'saturday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 2),
(247, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'thursday', '12:00 PM - 1:00 PM', 'class', NULL, NULL, '', 2),
(248, 'ID67fc4c7d750d00.93886171', 28, '5', 4, 'sunday', '1:00 PM - 2:00 PM', 'class', NULL, NULL, '', 2),
(249, 'ID67f59dea50d774.95785441', 25, '1', 1, 'friday', '8:00 AM - 9:00 AM', 'class', NULL, NULL, '', 1),
(251, 'ID67f59dea50d774.95785441', 25, '1', 1, 'thursday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 1),
(252, 'ID67f59dea50d774.95785441', 25, '1', 1, 'thursday', '12:00 PM - 1:00 PM', 'class', NULL, NULL, '', 1),
(253, 'ID67f59c637e3f92.78061388', 21, '2', 1, 'wednesday', '8:00 AM - 9:00 AM', 'class', NULL, NULL, '', 0),
(254, 'ID67f59c637e3f92.78061388', 0, '1', 0, 'monday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 0),
(255, 'ID67015c14d07119.50844433', 7, '4', 1, 'wednesday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 0),
(256, 'ID67e659d7e890d3.16823785', 7, '1', 2, 'monday', '8:00 AM - 9:00 AM', 'class', NULL, NULL, '', 0),
(258, 'ID67e659d7e890d3.16823785', 7, '3', 3, 'monday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 0),
(259, 'ID67e659d7e890d3.16823785', 7, '3', 3, 'thursday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 0),
(260, 'ID67e659d7e890d3.16823785', 7, '3', 3, 'friday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 0),
(261, 'ID67e659d7e890d3.16823785', 7, '3', 3, 'saturday', '10:00 AM - 11:00 AM', 'class', NULL, NULL, '', 0),
(262, 'ID67f59c637e3f92.78061388', 20, '3', 2, 'tuesday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 0),
(263, 'ID67015c14d07119.50844433', 7, '3', 2, 'thursday', '9:00 AM - 10:00 AM', 'class', NULL, NULL, '', 0),
(265, 'ID67015c14d07119.50844433', 28, '5', 1, 'thursday', '8:00 AM - 9:00 AM', 'class', NULL, NULL, '', 0),
(266, 'ID67015c14d07119.50844433', 28, '5', 1, 'thursday', '11:00 AM - 12:00 PM', 'class', NULL, NULL, '', 0),
(267, 'ID67015c14d07119.50844433', 28, '5', 1, 'monday', '1:00 PM - 2:00 PM', 'class', NULL, NULL, '', 0),
(268, 'ID67015c14d07119.50844433', 28, '5', 1, 'tuesday', '1:00 PM - 2:00 PM', 'class', NULL, NULL, '', 0);

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
  `profile_image` varchar(255) DEFAULT 'default_profile.svg',
  `role` varchar(255) NOT NULL DEFAULT 'teacher',
  `change_password_attemts` int(20) NOT NULL DEFAULT 0,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `first_name`, `last_name`, `email_address`, `gender`, `password`, `profile_image`, `role`, `change_password_attemts`, `school_id`) VALUES
(1, 'ID123456789', 'Nkinda', 'Sitta', 'shija0105@gmail.com', 'male', '$2y$10$LHtsWeoJSBbImcKNBZvvYO11Vlir93F9UFwRUA.6xyLiLk/qWDJn.', 'SHIMILE logo on grasses.png', 'superadmin', 0, 0),
(3, 'ID67015c14d07119.50844433', 'Singili', 'Makula', 'singili@gmail.com', 'male', '$2y$10$xKhjwpOK/aJqGkuIMgBB3eZa2hjv.UU.T6u8eEYWldgnyMJyNRmWG', 'Screenshot 2025-02-06 213305.png', 'admin', 0, 2),
(4, 'ID67015d92d60128.06247950', 'Kushaha', 'Shija', 'kushaha@gmail.com', 'male', '$2y$10$HlAaVc3dTc97gZ0IUjKSdeOAu7RHj1C0z2DmM2FpQN1mC4s3l4KGS', 'a man Working out 3.jpg', 'admin', 0, 1),
(6, 'ID67c351e9e40cc3.57957349', 'Adam', 'Matondo', 'adam@gmail.com', 'male', '$2y$10$/HzNsNqaV6pniKPmKhPeiO7PITFbxQOYiNSTeI/QAkcCz9SpfoJ4m', 'SHIMILE2.png', 'parent', 0, 1),
(7, 'ID67c366ad101621.09100774', 'Juma', 'Mgunda', 'mgunda@gmail.com', 'male', '$2y$10$akCU8oWsdr7NyieEbnIseOBGXauDypfeK8qsT6gJR7fox4P3thjbO', 'PROFILE_IMAGE', 'deleted', 0, 1),
(9, 'ID67c46b5f3d8c86.40326566', 'test', 'user', 'test@gmail.com', 'male', '$2y$10$rFomZ0v7sjDmOTyGOomf8OkOmXTztznRyGL96tyb8io.NXQPjMhJa', 'img39.jpg', 'parent', 0, 1),
(10, 'ID67c46f1e9d8487.88084010', 'Adam', 'Matondo', 'adam@gmail.com', 'male', '$2y$10$/HzNsNqaV6pniKPmKhPeiO7PITFbxQOYiNSTeI/QAkcCz9SpfoJ4m', NULL, 'parent', 0, 1),
(11, 'ID67c472046e6459.22521429', 'Shija', 'Mboje', 'shijamboje@gmail.com', 'male', '$2y$10$lJuYRIsY65gfr3RqvrzlzuAWkRstcbofUaioQCfDEx/Siks1.yIOC', NULL, 'parent', 0, 1),
(12, 'ID67c4debf3119d4.12936218', 'Shija', 'Mboje', 'shijamboje@gmail.com', 'male', '$2y$10$HzB.r43rChddHFg2vwI8wuNMqQN6peMsMTRFdXUNEu9XXjASSo8IO', NULL, 'parent', 0, 1),
(13, 'ID67c4e17c4598c4.53489939', 'Adam', 'Matondo', 'shija@gmail.com', 'male', '$2y$10$678i6gxYC7S85eBjgZaR7ew/F83dhfXT2OD9Z3daHXBw/500KUv9S', NULL, 'parent', 2, 1),
(14, 'ID67c4e17c8db204.99374017', 'Shija', 'Mboje', 'shija@gmail.com', 'male', '$2y$10$QBr9qfq3PISn6tWwLZIlpOuB8CjOBNQIoOuC5FNK51Qo5UtmxLnuK', NULL, 'parent', 0, 1),
(15, 'ID67c4e21ea95843.78450904', 'Adam', 'Matondo', 'adam@gmail.com', 'male', '$2y$10$/HzNsNqaV6pniKPmKhPeiO7PITFbxQOYiNSTeI/QAkcCz9SpfoJ4m', NULL, 'parent', 0, 1),
(16, 'ID67e5a4366069a7.55454109', 'gfjgh', 'hjkh', 'cvnhjv@g.fg', 'male', '$2y$10$oWL9wzfcIiRNrLP3am.2dORQKF7HPdA5I6e0ihuTCSp7d3Piz3PQK', 'PROFILE_IMAGE', 'deleted', 0, 1),
(18, 'ID67e659d7e890d3.16823785', 'Maige', 'Sitta', 'maige@gmail.com', '', '$2y$10$PLZpnCNPgu.YawstDR010OW8U41nAQfHXeNI1w5WCApwIKi9aQnj6', 'SHIMILE LOGO.png', 'admin', 0, 1),
(20, 'ID67015c14d07119.50844433', 'Singili', 'Makula', 'singili@gmail.com', 'male', '$2y$10$xDziPZrJi9a0fA7taUVKDe9Az6Nn/HATd5n.TxnqYoIy7AS/xE5/i', 'Screenshot 2025-02-06 213305.png', 'parent', 0, 1),
(22, 'ID67f462e3d70d79.32984350', 'Miliara', 'Logerieki', 'miliara@gmail.com', 'male', '$2y$10$Qxm7OaVh9eonLoo9SvwjZePFDArrMnHin0wi0PxizFLMtWqXvsk9G', NULL, 'parent', 0, 1),
(23, 'ID67f59c637e3f92.78061388', 'Peter', 'Mwakalinga', 'mwakalinga@gmail.com', 'male', '$2y$10$8izJEXqM66fPeo7RwcECkuM6jCcG411CJzw7dVnri3dLgHLy3zEi6', 'default_profile.svg', 'teacher', 0, 1),
(24, 'ID67f59c9a398433.41583407', 'Victor', 'Nkwera', 'nkwera@gmail.com', 'male', '$2y$10$es6B.Rl0Ve9Gccu08vzTj.dNo/uDqpjsQpQhMoGgd1YLXsc5SmYne', 'default_profile.svg', 'teacher', 0, 1),
(25, 'ID67f59ccd727a04.00539020', 'Mike', 'Kakwaya', 'mike@gmail.com', 'male', '$2y$10$Lq5K9lxZRxo7YtE3w9hq7Oi7wMR9dqM79a0jQNlNgjsQsTfKYXj0O', 'default_profile.svg', 'deleted', 0, 1),
(26, 'ID67f59d3f192ae9.42242083', 'Maulid', 'Shafii', 'shafii@gmail.com', 'male', '$2y$10$uyhWIsKiY0Ax24JTPUqZLuHvqXHT7f8lKpgWVRGocwpAflABIBm2.', 'default_profile.svg', 'deleted', 0, 1),
(27, 'ID67f59d65afc469.58958321', 'Eunice', 'Mkwasi', 'mkwasi@gmail.com', 'female', '$2y$10$SFCX6ww8URZ7E.6oUjH5e.Itbq9pKhFWGKqT6g4iMIUeZVT00w9CO', 'default_profile.svg', 'deleted', 0, 1),
(28, 'ID67f59da3693db5.05978014', 'Laurent', 'Haule', 'haule@gmail.com', 'male', '$2y$10$TyRE95xMa6z4WFACTEcAVuxdIiHdMB7z39vX0CvgqCa69sc32jAue', 'default_profile.svg', 'teacher', 0, 1),
(29, 'ID67f59dea50d774.95785441', 'Ponsiono', 'Mamboleo', 'mamboleo@gmail.com', 'male', '$2y$10$CiEOPiPHDBbn6hTi5RaoFO6/pz7WYMZqCJ.v5ariShQQ3oT4u4ni.', 'default_profile.svg', 'deleted', 0, 1),
(30, 'ID67f59f0164f049.45244214', 'Benald', 'Hayuma', 'hayuma@gmail.com', 'male', '$2y$10$6zXaRLamOUsrIR44TV7QVOaewRqrN5i4ICoJ7iHkmj5EawBMAHLcm', 'Screenshot 2025-02-13 124337.png', 'deleted', 0, 1),
(31, 'ID67f83d9f368868.21446556', 'Samwel', 'Abraham', 'samwel@gmail.com', 'male', '$2y$10$i1sjWtRUEmXCuLFU4BwOHOt1XSLD2niLmocw6Nz9DDS9xiaAV3bBO', NULL, 'parent', 0, 2),
(32, 'ID67f83dbe62a793.23871577', 'Nzumbi', 'Maduhu', 'nzumbi@gmail.com', 'male', '$2y$10$l7ACUh1kSGIsCQvzXmVNpO7hHbnhxpaeFMfPmytFS0RxZTCRD4Hxy', NULL, 'parent', 0, 2),
(33, 'ID67fc4c7d750d00.93886171', 'Kennedy', 'Kayinga', 'kennedy@gmail.com', 'male', '$2y$10$tL9rHPCRs3hep6qnlXctsuEX21z5zFnlJkWrlcgKilnfo3uz7l27.', 'default_profile.svg', 'teacher', 0, 2);

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
-- Indexes for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_payments`
--
ALTER TABLE `fee_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_fee_id` (`student_fee_id`);

--
-- Indexes for table `fee_structures`
--
ALTER TABLE `fee_structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `structure_id` (`structure_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fee_payments`
--
ALTER TABLE `fee_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_structures`
--
ALTER TABLE `fee_structures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee_payments`
--
ALTER TABLE `fee_payments`
  ADD CONSTRAINT `fee_payments_ibfk_1` FOREIGN KEY (`student_fee_id`) REFERENCES `student_fees` (`id`);

--
-- Constraints for table `fee_structures`
--
ALTER TABLE `fee_structures`
  ADD CONSTRAINT `fee_structures_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `fee_categories` (`id`);

--
-- Constraints for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD CONSTRAINT `student_fees_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_fees_ibfk_2` FOREIGN KEY (`structure_id`) REFERENCES `fee_structures` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
