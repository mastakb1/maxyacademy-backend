-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2022 at 03:01 AM
-- Server version: 5.7.33
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_group`
--

CREATE TABLE `access_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `access_detail` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_group`
--

INSERT INTO `access_group` (`id`, `name`, `description`, `access_detail`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'super', NULL, NULL, '2022-09-09 15:21:34', 1, '2022-09-09 15:21:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `access_group_detail`
--

CREATE TABLE `access_group_detail` (
  `id_access_group` int(11) NOT NULL,
  `id_access_master` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_group_detail`
--

INSERT INTO `access_group_detail` (`id_access_group`, `id_access_master`, `priority`) VALUES
(1, 1, NULL),
(1, 2, NULL),
(1, 3, NULL),
(1, 4, NULL),
(1, 5, NULL),
(1, 6, NULL),
(1, 7, NULL),
(1, 8, NULL),
(1, 9, NULL),
(1, 10, NULL),
(1, 11, NULL),
(1, 12, NULL),
(1, 13, NULL),
(1, 14, NULL),
(1, 15, NULL),
(1, 16, NULL),
(1, 17, NULL),
(1, 18, NULL),
(1, 19, NULL),
(1, 20, NULL),
(1, 21, NULL),
(1, 22, NULL),
(1, 23, NULL),
(1, 24, NULL),
(1, 25, NULL),
(1, 26, NULL),
(1, 27, NULL),
(1, 28, NULL),
(1, 29, NULL),
(1, 30, NULL),
(1, 31, NULL),
(1, 32, NULL),
(1, 33, NULL),
(1, 34, NULL),
(1, 35, NULL),
(1, 36, NULL),
(1, 37, NULL),
(1, 38, NULL),
(1, 39, NULL),
(1, 40, NULL),
(1, 41, NULL),
(1, 42, NULL),
(1, 43, NULL),
(1, 44, NULL),
(1, 45, NULL),
(1, 46, NULL),
(1, 47, NULL),
(1, 48, NULL),
(1, 49, NULL),
(1, 50, NULL),
(1, 51, NULL),
(1, 52, NULL),
(1, 53, NULL),
(1, 54, NULL),
(1, 55, NULL),
(1, 56, NULL),
(1, 57, NULL),
(1, 58, NULL),
(1, 59, NULL),
(1, 60, NULL),
(1, 61, NULL),
(1, 62, NULL),
(1, 63, NULL),
(1, 64, NULL),
(1, 65, NULL),
(1, 66, NULL),
(1, 67, NULL),
(1, 68, NULL),
(1, 69, NULL),
(1, 70, NULL),
(1, 71, NULL),
(1, 72, NULL),
(1, 73, NULL),
(1, 74, NULL),
(1, 75, NULL),
(1, 76, NULL),
(1, 77, NULL),
(1, 78, NULL),
(1, 79, NULL),
(1, 80, NULL),
(1, 81, NULL),
(1, 82, NULL),
(1, 83, NULL),
(1, 84, NULL),
(1, 85, NULL),
(1, 86, NULL),
(1, 87, NULL),
(1, 88, NULL),
(1, 89, NULL),
(1, 90, NULL),
(1, 91, NULL),
(1, 92, NULL),
(1, 93, NULL),
(1, 94, NULL),
(1, 95, NULL),
(1, 96, NULL),
(1, 97, NULL),
(1, 98, NULL),
(1, 99, NULL),
(1, 100, NULL),
(1, 101, NULL),
(1, 102, NULL),
(1, 103, NULL),
(1, 104, NULL),
(1, 105, NULL),
(1, 106, NULL),
(1, 107, NULL),
(1, 108, NULL),
(1, 109, NULL),
(1, 110, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `access_master`
--

CREATE TABLE `access_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_master`
--

INSERT INTO `access_master` (`id`, `name`, `description`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'access_group_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(2, 'access_group_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(3, 'access_group_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(4, 'access_group_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(5, 'access_group_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(6, 'access_master_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(7, 'access_master_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(8, 'access_master_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(9, 'access_master_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(10, 'access_master_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(11, 'course_batch_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(12, 'course_batch_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(13, 'course_batch_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(14, 'course_batch_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(15, 'course_batch_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(16, 'course_tutor_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(17, 'course_tutor_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(18, 'course_tutor_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(19, 'course_tutor_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(20, 'course_tutor_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(21, 'general_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(22, 'general_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(23, 'general_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(24, 'general_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(25, 'general_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(26, 'member_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(27, 'member_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(28, 'member_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(29, 'member_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(30, 'member_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(31, 'member_bootcamp_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(32, 'member_bootcamp_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(33, 'member_bootcamp_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(34, 'member_bootcamp_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(35, 'member_bootcamp_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(36, 'member_course_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(37, 'member_course_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(38, 'member_course_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(39, 'member_course_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(40, 'member_course_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(41, 'modul_tutorial_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(42, 'modul_tutorial_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(43, 'modul_tutorial_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(44, 'modul_tutorial_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(45, 'modul_tutorial_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(46, 'm_company_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(47, 'm_company_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(48, 'm_company_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(49, 'm_company_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(50, 'm_company_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(51, 'm_course_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(52, 'm_course_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(53, 'm_course_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(54, 'm_course_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(55, 'm_course_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(56, 'm_discount_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(57, 'm_discount_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(58, 'm_discount_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(59, 'm_discount_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(60, 'm_discount_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(61, 'm_level_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(62, 'm_level_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(63, 'm_level_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(64, 'm_level_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(65, 'm_level_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(66, 'm_major_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(67, 'm_major_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(68, 'm_major_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(69, 'm_major_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(70, 'm_major_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(71, 'm_modul_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(72, 'm_modul_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(73, 'm_modul_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(74, 'm_modul_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(75, 'm_modul_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(76, 'm_package_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(77, 'm_package_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(78, 'm_package_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(79, 'm_package_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(80, 'm_package_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(81, 'm_tutor_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(82, 'm_tutor_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(83, 'm_tutor_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(84, 'm_tutor_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(85, 'm_tutor_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(86, 'order_course_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(87, 'order_course_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(88, 'order_course_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(89, 'order_course_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(90, 'order_course_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(91, 'package_benefit_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(92, 'package_benefit_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(93, 'package_benefit_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(94, 'package_benefit_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(95, 'package_benefit_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(96, 'users_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(97, 'users_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(98, 'users_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(99, 'users_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(100, 'users_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(101, 'users_failed_attempts_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(102, 'users_failed_attempts_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(103, 'users_failed_attempts_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(104, 'users_failed_attempts_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(105, 'users_failed_attempts_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(106, 'users_logs_manage', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(107, 'users_logs_create', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(108, 'users_logs_read', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(109, 'users_logs_update', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1),
(110, 'users_logs_delete', NULL, '2022-09-12 09:54:38', 1, '2022-09-12 09:54:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_batch`
--

CREATE TABLE `course_batch` (
  `id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `quota` int(11) NOT NULL COMMENT '0 = Unlimited',
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_m_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_tutor`
--

CREATE TABLE `course_tutor` (
  `id_m_course` int(11) NOT NULL,
  `id_m_tutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_picture` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_answer`
--

CREATE TABLE `member_answer` (
  `id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_bootcamp`
--

CREATE TABLE `member_bootcamp` (
  `id_member` int(11) NOT NULL,
  `id_course_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_course`
--

CREATE TABLE `member_course` (
  `id_member` int(11) NOT NULL,
  `id_m_course` int(11) NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modul_tutorial`
--

CREATE TABLE `modul_tutorial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `tier` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_m_modul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_company`
--

CREATE TABLE `m_company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `logo` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_company`
--

INSERT INTO `m_company` (`id`, `name`, `description`, `logo`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Tokopedia', '', '6c6eb0e2ce404783fbfa2fb14682d944.png', 1, '2022-09-12 09:20:37', 1, '2022-09-12 09:20:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_course`
--

CREATE TABLE `m_course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `type` enum('SHORT COURSE','CAREER BOOTCAMP') NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_m_major` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_discount`
--

CREATE TABLE `m_discount` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `discount_type` enum('PERCENTAGE','FIXED') NOT NULL,
  `discount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_m_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_major`
--

CREATE TABLE `m_major` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_modul`
--

CREATE TABLE `m_modul` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_m_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_package`
--

CREATE TABLE `m_package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_tutor`
--

CREATE TABLE `m_tutor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `role` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_m_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `no_generator`
--

CREATE TABLE `no_generator` (
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_course`
--

CREATE TABLE `order_course` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `total_price` double NOT NULL,
  `id_m_package` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Not Completed, 1 = Completed, 2 = Partial, 4 = Canceled',
  `forced_id` int(11) DEFAULT NULL,
  `forced_comment` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_benefit`
--

CREATE TABLE `package_benefit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_access_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `id_access_group`) VALUES
(1, 'toro', 'toro@mail.com', '$2y$10$bADbRS70xYSWFUM8eF.LCu1s3rY/HDNYybH3siwPdH7/LEzHj0HIG', '2022-09-09 07:46:26', '2022-09-09 07:46:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_failed_attempts`
--

CREATE TABLE `users_failed_attempts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_group`
--
ALTER TABLE `access_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_master`
--
ALTER TABLE `access_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_batch`
--
ALTER TABLE `course_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_answer`
--
ALTER TABLE `member_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_company`
--
ALTER TABLE `m_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_course`
--
ALTER TABLE `m_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_discount`
--
ALTER TABLE `m_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_major`
--
ALTER TABLE `m_major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_modul`
--
ALTER TABLE `m_modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_package`
--
ALTER TABLE `m_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_tutor`
--
ALTER TABLE `m_tutor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `no_generator`
--
ALTER TABLE `no_generator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_course`
--
ALTER TABLE `order_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_benefit`
--
ALTER TABLE `package_benefit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_failed_attempts`
--
ALTER TABLE `users_failed_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_group`
--
ALTER TABLE `access_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `access_master`
--
ALTER TABLE `access_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `course_batch`
--
ALTER TABLE `course_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_answer`
--
ALTER TABLE `member_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_company`
--
ALTER TABLE `m_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_course`
--
ALTER TABLE `m_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_discount`
--
ALTER TABLE `m_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_major`
--
ALTER TABLE `m_major`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_modul`
--
ALTER TABLE `m_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_package`
--
ALTER TABLE `m_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_tutor`
--
ALTER TABLE `m_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `no_generator`
--
ALTER TABLE `no_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_course`
--
ALTER TABLE `order_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_benefit`
--
ALTER TABLE `package_benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_failed_attempts`
--
ALTER TABLE `users_failed_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
