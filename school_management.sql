-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 07:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_categorys_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_categorys_id`, `course_name`, `course_description`, `end_date`, `created_at`, `update_at`) VALUES
(1, '1', 'Lớp A', 'Lớp chuyên', '2021-10-31', '2021-10-13 16:44:26', '2021-10-13 16:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `course_categorys`
--

CREATE TABLE `course_categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categorys`
--

INSERT INTO `course_categorys` (`id`, `category_name`, `category_description`, `created_at`, `update_at`) VALUES
(1, 'PHP', 'PHP 8                                         ', '2021-10-13 15:45:58', '2021-10-13 16:35:30'),
(5, 'JAVA', 'Java', '2021-10-14 12:15:59', '2021-10-14 12:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `trainee`
--

CREATE TABLE `trainee` (
  `id` int(10) UNSIGNED NOT NULL,
  `trainee_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainee_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainee_password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainee_sex` tinyint(4) NOT NULL DEFAULT 1,
  `trainee_phone` int(11) NOT NULL,
  `course_id` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainee`
--

INSERT INTO `trainee` (`id`, `trainee_name`, `trainee_email`, `trainee_password`, `trainee_sex`, `trainee_phone`, `course_id`, `created_at`, `update_at`, `age`) VALUES
(1, 'ABC', 'b@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 134432, 1, '2021-10-14 12:23:14', '2021-10-14 15:02:33', 18),
(2, 'Bình Nguyễn', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0, 3333333, 1, '2021-10-14 15:47:16', '2021-10-14 15:53:46', 12),
(3, 'aasd', 'asd@gmail.com', 'bc554ecf2b33458ff1f152433cd4c813', 1, 134432, 0, '2021-10-14 15:51:11', '2021-10-14 16:32:41', 18);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(10) UNSIGNED NOT NULL,
  `trainer_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_phone` int(11) NOT NULL,
  `trainer_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `level` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `trainer_name`, `trainer_email`, `trainer_password`, `trainer_phone`, `trainer_address`, `course_id`, `created_at`, `update_at`, `level`) VALUES
(1, 'giáo viên', 'gv@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 12120123, 'szcasadasdas', 1, '2021-10-14 12:14:33', '2021-10-14 15:02:45', 2);

-- --------------------------------------------------------

--
-- Table structure for table `training_staff`
--

CREATE TABLE `training_staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `training_staff_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_staff_password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_staff_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_staff_phone` int(15) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_staff`
--

INSERT INTO `training_staff` (`id`, `training_staff_name`, `training_staff_password`, `training_staff_email`, `training_staff_phone`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 987654321, 0, '2021-10-11 12:05:26', '2021-10-14 12:15:40'),
(4, 'Binh', 'c4ca4238a0b923820dcc509a6f75849b', 'nguyenbinh@gmail.com', 123456789, 1, '2021-10-14 15:07:37', '2021-10-14 15:07:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_categorys`
--
ALTER TABLE `course_categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainee`
--
ALTER TABLE `trainee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainer_email` (`trainer_email`);

--
-- Indexes for table `training_staff`
--
ALTER TABLE `training_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `training_staff_email` (`training_staff_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_categorys`
--
ALTER TABLE `course_categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainee`
--
ALTER TABLE `trainee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training_staff`
--
ALTER TABLE `training_staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
