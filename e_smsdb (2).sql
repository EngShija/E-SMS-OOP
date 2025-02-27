-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 03:19 PM
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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `day`, `student_id`, `status`) VALUES
(3, '2025-02-11', 'Tuesday', 'ID67a91229a0d432.54460126', 'present'),
(11, '2025-02-13', 'Thursday ', 'ID67a91229a0d432.54460126', 'present'),
(12, '2025-02-13', 'Thursday ', 'ID67ae146836ddc3.72912548', 'present'),
(13, '2025-02-13', 'Thursday ', 'ID67ae154276b083.96317429', 'absent'),
(17, '2025-02-14', 'Friday', 'ID67a91229a0d432.54460126', 'present'),
(18, '2025-02-14', 'Friday', 'ID67ae146836ddc3.72912548', 'absent'),
(19, '2025-02-14', 'Friday', 'ID67ae154276b083.96317429', 'absent');

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
(5, 'Midterm Test 2');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `physical_address` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'parent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `unique_id`, `student_id`, `first_name`, `last_name`, `email_address`, `phone`, `gender`, `physical_address`, `relation`, `profile_image`, `password`, `role`) VALUES
(14, 'ID67a9124080cc61.31381762', 'ID67a91229a0d432.54460126', 'Kitalima', 'Sitta', 'kitalima@gmail.com', '0786857533', 'male', 'Mwanza', 'brother', NULL, 'd677d1346b8d149dc1a6f94411afe993', 'parent'),
(15, 'ID67ae156e8e6d68.00745316', 'ID67ae154276b083.96317429', 'Test', 'User', 'test@gmail.com', '0786857511', 'male', 'Moshi', 'brother', NULL, '2e40ad879e955201df4dedbf8d479a12', 'parent');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `marks` decimal(5,0) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `description` varchar(20) DEFAULT NULL,
  `point` int(2) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `subject_name`, `exam_type`, `marks`, `grade`, `description`, `point`, `status`) VALUES
(1, 'ID67a91229a0d432.54460126', 'Programming', 'Midterm Test 1 2025', 90, 'A', 'Excellent', 1, 'pending'),
(2, 'ID67ae154276b083.96317429', 'Mathematics', 'Midterm Test 1 2025', 50, 'D', 'Stisfactory', 4, 'pending'),
(3, 'ID67ae154276b083.96317429', 'Geography', 'Midterm Test 1 2025', 70, 'B', 'Very Good', 2, 'pending'),
(4, 'ID67ae154276b083.96317429', 'Biology', 'Midterm Test 1 2025', 45, 'E', 'Poor', 5, 'pending'),
(5, 'ID67ae154276b083.96317429', 'Physics', 'Midterm Test 1 2025', 80, 'A', 'Excellent', 1, 'pending'),
(6, 'ID67ae154276b083.96317429', 'Programming', 'Midterm Test 1 2025', 60, 'C', 'Good', 3, 'pending'),
(7, 'ID67ae154276b083.96317429', 'Psychology', 'Midterm Test 1 2025', 90, 'A', 'Excellent', 1, 'pending'),
(8, 'ID67ae154276b083.96317429', 'Graphics', 'Midterm Test 1 2025', 75, 'A', 'Excellent', 1, 'pending'),
(9, 'ID67ae154276b083.96317429', 'History', 'Midterm Test 1 2025', 57, 'D', 'Stisfactory', 4, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `reg_no` varchar(30) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `class` varchar(12) DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `unique_id`, `first_name`, `middle_name`, `last_name`, `gender`, `reg_no`, `reg_date`, `class`, `profile_image`) VALUES
(17, 'ID67a91229a0d432.54460126', 'Maziba', 'Shija', 'Sitta', 'male', 'NIT/BCS/2023/200', '2025-02-09', 'FORM ONE', ''),
(18, 'ID67ae146836ddc3.72912548', 'Singili', 'Gasamalu', 'Makula', 'male', 'NIT/BCS/2023/201', '2025-02-13', 'FORM ONE', ''),
(19, 'ID67ae154276b083.96317429', 'Test1', 'Test', 'User', 'female', 'NIT/BCS/2023/204', '2025-02-13', 'FORM ONE', '');

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
(26, 'Psychology', 'Arts');

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

INSERT INTO `timetable` (`id`, `subject_id`, `class_id`, `day`, `time_slots`, `timetable_type`, `date`, `exam_id`, `yos`) VALUES
(1, 19, 2, 'Monday', '02:30 - 03:30', 'Exam', '2025-02-02', NULL, 2025),
(2, 20, 1, 'Monday', '10:00 - 11:00', 'Class', '', NULL, 2025),
(7, 19, 1, 'Monday', '13:00 - 14:00', 'Exam', '2025-01-30', 1, 2025),
(9, 25, 1, 'Friday', '08:00 - 09:00', 'Class', '', NULL, 2025);

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
  `subject_tought` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `first_name`, `last_name`, `email_address`, `gender`, `password`, `profile_image`, `role`, `subject_tought`) VALUES
(1, 'ID123456789', 'Nkinda', 'Sitta', 'shija0105@gmail.com', 'male', '21232f297a57a5a743894a0e4a801fc3', '', 'admin', NULL),
(3, 'ID67015c14d07119.50844433', 'Singili', 'Makula', 'singili@gmail.com', 'male', '827ccb0eea8a706c4c34a16891f84e7b', 'PROFILE_IMAGE', 'teacher', NULL),
(4, 'ID67015d92d60128.06247950', 'Kushaha', 'Shija', 'kushaha@gmail.com', 'male', '827ccb0eea8a706c4c34a16891f84e7b', 'PROFILE_IMAGE', 'teacher', 'Graphics'),
(5, 'ID67015ee6ce3db1.59470423', 'Charles', 'Mahuma', 'mahuma@gmail.com', 'male', '827ccb0eea8a706c4c34a16891f84e7b', 'PROFILE_IMAGE', 'teacher', 'Swahili language');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subject_category`
--
ALTER TABLE `subject_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
