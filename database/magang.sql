-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2022 at 09:05 AM
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
(1, 'super', NULL, NULL, '2022-09-20 09:01:02', 1, '2022-09-20 09:01:02', 1);

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
(1, 110, NULL),
(1, 111, NULL),
(1, 112, NULL),
(1, 113, NULL),
(1, 114, NULL),
(1, 115, NULL),
(1, 116, NULL),
(1, 117, NULL),
(1, 118, NULL),
(1, 119, NULL),
(1, 120, NULL),
(1, 121, NULL),
(1, 122, NULL),
(1, 123, NULL),
(1, 124, NULL),
(1, 125, NULL),
(1, 126, NULL),
(1, 127, NULL),
(1, 128, NULL),
(1, 129, NULL),
(1, 130, NULL),
(1, 131, NULL),
(1, 132, NULL),
(1, 133, NULL),
(1, 134, NULL),
(1, 135, NULL),
(1, 136, NULL),
(1, 137, NULL),
(1, 138, NULL),
(1, 139, NULL),
(1, 140, NULL),
(1, 141, NULL),
(1, 142, NULL),
(1, 143, NULL),
(1, 144, NULL),
(1, 145, NULL),
(1, 146, NULL),
(1, 147, NULL),
(1, 148, NULL),
(1, 149, NULL),
(1, 150, NULL),
(1, 151, NULL),
(1, 152, NULL),
(1, 153, NULL),
(1, 154, NULL),
(1, 155, NULL),
(1, 156, NULL),
(1, 157, NULL),
(1, 158, NULL),
(1, 159, NULL),
(1, 160, NULL);

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
(1, 'access_group_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(2, 'access_group_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(3, 'access_group_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(4, 'access_group_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(5, 'access_group_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(6, 'access_master_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(7, 'access_master_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(8, 'access_master_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(9, 'access_master_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(10, 'access_master_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(11, 'company_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(12, 'company_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(13, 'company_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(14, 'company_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(15, 'company_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(16, 'course_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(17, 'course_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(18, 'course_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(19, 'course_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(20, 'course_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(21, 'course_class_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(22, 'course_class_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(23, 'course_class_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(24, 'course_class_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(25, 'course_class_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(26, 'course_class_member_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(27, 'course_class_member_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(28, 'course_class_member_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(29, 'course_class_member_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(30, 'course_class_member_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(31, 'course_class_member_history_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(32, 'course_class_member_history_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(33, 'course_class_member_history_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(34, 'course_class_member_history_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(35, 'course_class_member_history_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(36, 'course_module_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(37, 'course_module_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(38, 'course_module_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(39, 'course_module_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(40, 'course_module_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(41, 'course_price_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(42, 'course_price_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(43, 'course_price_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(44, 'course_price_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(45, 'course_price_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(46, 'course_price_benefit_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(47, 'course_price_benefit_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(48, 'course_price_benefit_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(49, 'course_price_benefit_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(50, 'course_price_benefit_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(51, 'course_tutor_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(52, 'course_tutor_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(53, 'course_tutor_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(54, 'course_tutor_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(55, 'course_tutor_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(56, 'general_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(57, 'general_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(58, 'general_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(59, 'general_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(60, 'general_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(61, 'member_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(62, 'member_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(63, 'member_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(64, 'member_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(65, 'member_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(66, 'member_testimonial_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(67, 'member_testimonial_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(68, 'member_testimonial_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(69, 'member_testimonial_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(70, 'member_testimonial_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(71, 'message_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(72, 'message_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(73, 'message_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(74, 'message_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(75, 'message_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(76, 'm_bank_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(77, 'm_bank_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(78, 'm_bank_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(79, 'm_bank_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(80, 'm_bank_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(81, 'm_bank_account_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(82, 'm_bank_account_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(83, 'm_bank_account_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(84, 'm_bank_account_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(85, 'm_bank_account_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(86, 'm_course_type_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(87, 'm_course_type_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(88, 'm_course_type_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(89, 'm_course_type_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(90, 'm_course_type_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(91, 'm_difficulty_type_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(92, 'm_difficulty_type_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(93, 'm_difficulty_type_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(94, 'm_difficulty_type_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(95, 'm_difficulty_type_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(96, 'm_payment_type_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(97, 'm_payment_type_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(98, 'm_payment_type_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(99, 'm_payment_type_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(100, 'm_payment_type_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(101, 'm_tutor_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(102, 'm_tutor_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(103, 'm_tutor_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(104, 'm_tutor_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(105, 'm_tutor_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(106, 'promotion_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(107, 'promotion_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(108, 'promotion_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(109, 'promotion_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(110, 'promotion_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(111, 'promotion_course_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(112, 'promotion_course_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(113, 'promotion_course_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(114, 'promotion_course_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(115, 'promotion_course_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(116, 'trans_order_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(117, 'trans_order_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(118, 'trans_order_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(119, 'trans_order_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(120, 'trans_order_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(121, 'trans_order_confirm_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(122, 'trans_order_confirm_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(123, 'trans_order_confirm_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(124, 'trans_order_confirm_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(125, 'trans_order_confirm_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(126, 'users_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(127, 'users_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(128, 'users_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(129, 'users_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(130, 'users_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(131, 'users_failed_attempts_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(132, 'users_failed_attempts_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(133, 'users_failed_attempts_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(134, 'users_failed_attempts_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(135, 'users_failed_attempts_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(136, 'users_logs_manage', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(137, 'users_logs_create', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(138, 'users_logs_read', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(139, 'users_logs_update', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(140, 'users_logs_delete', NULL, '2022-09-20 09:01:08', 1, '2022-09-20 09:01:08', 1),
(141, 'dashboard_manage', NULL, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(142, 'dashboard_create', NULL, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(143, 'dashboard_read', NULL, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(144, 'dashboard_update', NULL, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(145, 'dashboard_delete', NULL, '2022-09-20 09:01:41', 1, '2022-09-20 09:01:41', 1),
(146, 'course_module_child_manage', NULL, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(147, 'course_module_child_create', NULL, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(148, 'course_module_child_read', NULL, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(149, 'course_module_child_update', NULL, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(150, 'course_module_child_delete', NULL, '2022-09-20 15:41:15', 1, '2022-09-20 15:41:15', 1),
(151, 'trans_order_report_manage', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(152, 'trans_order_report_create', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(153, 'trans_order_report_read', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(154, 'trans_order_report_update', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(155, 'trans_order_report_delete', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(156, 'trans_order_confirm_report_manage', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(157, 'trans_order_confirm_report_create', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(158, 'trans_order_confirm_report_read', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(159, 'trans_order_confirm_report_update', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1),
(160, 'trans_order_confirm_report_delete', NULL, '2022-09-21 10:11:14', 1, '2022-09-21 10:11:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
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
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `description`, `logo`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Tokopedia', '', '6c6eb0e2ce404783fbfa2fb14682d944.png', 1, '2022-09-12 09:20:37', 1, '2022-09-12 09:20:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_m_course_type` int(11) NOT NULL,
  `id_m_difficulty_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`, `id_m_course_type`, `id_m_difficulty_type`) VALUES
(1, 'Backend', 'backend', '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Backend Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-12 11:02:48', 1, '2022-09-20 16:09:24', 1, 1, 1),
(2, 'Knockout JS', 'knockout-js', '<p>Knockout adalah pustaka JavaScript yang membantu Anda membuat tampilan yang kaya, responsif, dan antarmuka pengguna editor dengan model data dasar yang bersih. Setiap kali Anda memiliki bagian UI yang diperbarui secara dinamis (mis., berubah tergantung pada tindakan pengguna atau ketika sumber data eksternal berubah), KO dapat membantu Anda menerapkannya dengan lebih sederhana dan dapat dipelihara.</p>', 1, '2022-09-14 11:26:27', 1, '2022-09-20 16:09:28', 1, 2, 1),
(3, 'Frontend', 'frontend', '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Frontend Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-12 11:02:48', 1, '2022-09-20 16:09:29', 1, 1, 1),
(4, 'UI/UX', 'ui-ux', '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai UI/UX Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-12 11:02:48', 1, '2022-09-20 16:09:31', 1, 1, 1),
(5, 'Entrepreneur', 'entrepeneur', '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Entrepreneur Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-12 11:02:48', 1, '2022-09-20 16:09:33', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_class`
--

CREATE TABLE `course_class` (
  `id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `quota` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Unlimited',
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_class`
--

INSERT INTO `course_class` (`id`, `batch`, `start_date`, `end_date`, `quota`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`, `id_course`) VALUES
(1, 1, '2022-09-12', '2022-10-11', 0, 1, '2022-09-12 14:42:45', 1, '2022-09-14 14:22:09', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_class_member`
--

CREATE TABLE `course_class_member` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_course_class` int(11) NOT NULL,
  `id_trans_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_class_member_history`
--

CREATE TABLE `course_class_member_history` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_module`
--

CREATE TABLE `course_module` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `priority` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_course_module_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_module`
--

INSERT INTO `course_module` (`id`, `name`, `description`, `priority`, `level`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`, `id_course`, `id_course_module_parent`) VALUES
(1, 'Introduction to Knockout JS', '<div>(a)\n<p>Introduction to Knockout.js</p>\n</div>', 0, 1, 1, '2022-09-12 15:23:36', 1, '2022-09-21 08:40:13', 1, 2, NULL),
(2, 'Working with lists and collection', 'mengenal lists dan collection di knockout.js', 0, 2, 1, '2022-09-14 10:08:55', 1, '2022-09-20 11:52:48', 1, 2, NULL),
(3, 'Single App Aplication', 'belajar membuat single app application menggunakan knockout.js', 0, 3, 1, '2022-09-14 10:08:55', 1, '2022-09-20 11:52:49', 1, 2, NULL),
(4, 'Create Custom Binding', 'belajar membuat custom binding', 0, 4, 1, '2022-09-14 10:08:55', 1, '2022-09-20 11:52:52', 1, 2, NULL),
(5, 'Loading dan Saving data', 'belajar bagaimana save dan load data menggunakan knockout.js', 0, 5, 1, '2022-09-14 10:08:55', 1, '2022-09-20 11:52:53', 1, 2, NULL),
(6, 'Introduction', '<h2>Selamat Datang!</h2>\\n\\n                            <p>pada tutorial ini anda akan belajar beberapa hal dasar dalam membangun UI website\\n                                <em>Model-View-ViewModel</em> (MVVM) menggunakan knockout.js\\n                            </p>\\n\\n                            <p>Anda akan belajar bagaimana mendefinisikan tampilan UI menggunakan <strong>views</strong> dan\\n                                <strong>declarative bindings</strong>, ata dan perilakunya menggunakan <strong>viewmodels</strong> dan\\n                                <strong>observables</strong>,\\n                                dan bagaimana semuanya tetap sinkron secara otomatis dengan bantuan Knockout\\\'s <strong>dependency\\n                                    tracking</strong>\\n                            </p>\\n\\n                            <h3>Menggunakan bindings di view</h3>\\n\\n                            <p>Di sudut kanan bawah, anda dapat melihat <em>viewmodel</em> yang berisi data orang. Di sudut kanan atas, Anda memiliki <em>view</em> yang seharusnya menampilkan data orang. Saat ini hanya menampilkan \\\"<em>todo</em>\\\", jadi mari kita perbaiki itu.</p>\\n\\n                            <p>Ubah dua elemen <code>&lt;strong&gt;</code> dalam tampilan, tambahkan attribute <code>data-bind</code> untuk menampilkan nama orang:\\n                            </p>\\n\\n                            <pre><code><span class=\\\"tag\\\">&lt;<span class=\\\"title\\\">p</span>&gt;</span>First name: <span class=\\\"tag\\\">&lt;<span class=\\\"title\\\">strong</span> <span class=\\\"highlight\\\"><span class=\\\"attribute\\\">data-bind</span>=<span class=\\\"value\\\">\\\"text: firstName\\\"</span></span>&gt;</span><span class=\\\"tag\\\">&lt;/<span class=\\\"title\\\">strong</span>&gt;</span><span class=\\\"tag\\\">&lt;/<span class=\\\"title\\\">p</span>&gt;</span>\\n                            </code></pre>\\n                            <pre><code><span class=\\\"tag\\\">&lt;<span class=\\\"title\\\">p</span>&gt;</span>Last name: <span class=\\\"tag\\\">&lt;<span class=\\\"title\\\">strong</span> <span class=\\\"highlight\\\"><span class=\\\"attribute\\\">data-bind</span>=<span class=\\\"value\\\">\\\"text: lastName\\\"</span></span>&gt;</span><span class=\\\"tag\\\">&lt;/<span class=\\\"title\\\">strong</span>&gt;</span><span class=\\\"tag\\\">&lt;/<span class=\\\"title\\\">p</span>&gt;</span>\\n                            </code></pre>\\n\\n\\n                            <p>attribute <code>data-bind</code> adalah bagaimana knockout memungkinkan anda secara deklaratif mengaitkan viewmodel properties dengan DOM element kamu baru saja menggunakan <code>text</code> binding untuk menetapkan text ke DOM elemen.</p>', 1, 1, 1, '2022-09-21 09:20:09', 1, '2022-09-21 09:30:47', 1, 2, 1),
(7, 'Introduction', '<h2>Membuat data bisa diedit</h2>\\r\\n\\r\\n                            <p>Anda tidak dibatasi untuk menampilkan data statis. Mari gunakan <code>value</code> binding,  bersama dengan beberapa  <code>&lt;input&gt;</code> HTML biasa, untuk membuat data dapat diedit.</p>\\r\\n\\r\\n                            <p>Tambahkan markup berikut ke bagian bawah tampilan Anda (biarkan markup yang ada tetap di atasnya):</p>\\r\\n\\r\\n                            <pre><code class=\\\"xml\\\" data-result=\\\"[object Object]\\\"><span class=\\\"tag\\\">&lt;<span class=\\\"title\\\">p</span>&gt;</span>First name: <span class=\\\"tag\\\">&lt;<span class=\\\"title\\\">input</span> <span class=\\\"attribute\\\">data-bind</span>=<span class=\\\"value\\\">\\\"value: firstName\\\"</span> /&gt;</span><span class=\\\"tag\\\">&lt;/<span class=\\\"title\\\">p</span>&gt;</span>\\r\\n                                                                                    </code></pre>\\r\\n                            <pre><code class=\\\"xml\\\" data-result=\\\"[object Object]\\\"><span class=\\\"tag\\\">&lt;<span class=\\\"title\\\">p</span>&gt;</span>Last name: <span class=\\\"tag\\\">&lt;<span class=\\\"title\\\">input</span> <span class=\\\"attribute\\\">data-bind</span>=<span class=\\\"value\\\">\\\"value: lastName\\\"</span>/&gt;</span><span class=\\\"tag\\\">&lt;/<span class=\\\"title\\\">p</span>&gt;</span></code></pre>\\r\\n\\r\\n\\r\\n                            <p>Sekarang jalankan aplikasinya. Apa yang terjadi ketika Anda mengedit teks di salah satu kotak teks?</p>\\r\\n\\r\\n                            <p>Hmm... ternyata tidak terjadi apa-apa. Mari kita perbaiki itu...</p>\\r\\n                            <h3>Pengenalan Observables</h3>\\r\\n\\r\\n                            <p>Sebenarnya, saat anda mengedit salah satu dari text box, itu akan memperbarui data viewmodelnya. Tetapi karena properti viewmodel hanyalah string JavaScript biasa, mereka tidak memiliki cara untuk memberi tahu siapa pun bahwa mereka telah berubah, sehingga UI tetap statis. Itu sebabnya Knockout memiliki konsep <strong>observables</strong> - ini adalah properti yang secara otomatis akan mengeluarkan pemberitahuan setiap kali nilainya berubah.</p>\\r\\n\\r\\n                            <p>Ubah viewmodel anda untuk membuat isi dari <code>firstName</code> dan <code>lastName</code> <em>observable</em> menggunakan <code>ko.observable</code>:</p>\\r\\n\\r\\n                            <pre><code class=\\\"javascript\\\" data-result=\\\"[object Object]\\\"><span class=\\\"function\\\"><span class=\\\"keyword\\\">function</span> <span class=\\\"title\\\">AppViewModel</span><span class=\\\"params\\\">()</span>{</span>\\r\\n    <span class=\\\"keyword\\\">this</span>.firstName = <span class=\\\"highlight\\\">ko.observable(<span class=\\\"string\\\">\\\"Bert\\\"</span>)</span>;\\r\\n    <span class=\\\"keyword\\\">this</span>.lastName = <span class=\\\"highlight\\\">ko.observable(<span class=\\\"string\\\">\\\"Bertington\\\"</span>)</span>;\\r\\n        }\\r\\n                                            </code></pre>\\r\\n\\r\\n                            <p>Sekarang jalankan kembali aplikasi dan edit kotak teks. Kali ini Anda tidak hanya akan melihat bahwa data model tampilan yang mendasarinya diperbarui saat Anda mengedit, tetapi semua UI terkait juga diperbarui secara sinkron dengannya. </p>', 2, 1, 1, '2022-09-21 09:29:52', 1, '2022-09-21 09:30:30', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_price`
--

CREATE TABLE `course_price` (
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

--
-- Dumping data for table `course_price`
--

INSERT INTO `course_price` (`id`, `name`, `description`, `price`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Early Birds', '', 3000000, 1, '2022-09-12 10:46:54', 1, '2022-09-21 09:40:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_price_benefit`
--

CREATE TABLE `course_price_benefit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_course_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_price_benefit`
--

INSERT INTO `course_price_benefit` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`, `id_course_price`) VALUES
(13, 'More than 60 total learning session (self and live learning)', '', 1, '2022-09-21 09:40:21', 1, '2022-09-21 09:40:21', 1, 1),
(14, 'Intensive career and softskill session', '', 1, '2022-09-21 09:40:21', 1, '2022-09-21 09:40:21', 1, 1),
(15, 'Unlimited learning access', '', 1, '2022-09-21 09:40:21', 1, '2022-09-21 09:40:21', 1, 1),
(16, 'Career Profiler Assessments', '', 1, '2022-09-21 09:40:21', 1, '2022-09-21 09:40:21', 1, 1),
(17, 'Lifetime Job-Connector services', '', 1, '2022-09-21 09:40:21', 1, '2022-09-21 09:40:21', 1, 1),
(18, '4 Real-projects for your portfolio', '', 1, '2022-09-21 09:40:21', 1, '2022-09-21 09:40:21', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_tutor`
--

CREATE TABLE `course_tutor` (
  `id` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_m_tutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tutor`
--

INSERT INTO `course_tutor` (`id`, `id_course`, `id_m_tutor`) VALUES
(1, 1, 1),
(4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `name`, `value`, `updated_at`, `updated_id`) VALUES
(1, 'nama_lengkap', 'Linkmagangku', '2022-09-12 08:57:58', 1),
(2, 'nama_singkat', 'magangku', '2022-09-12 08:57:58', 1),
(3, 'alamat_lengkap', 'Woodland 9 No 19, Surabaya', '2022-09-12 08:57:58', 1),
(4, 'alamat', 'Woodland 9 No 19', '2022-09-12 08:57:58', 1),
(5, 'alamat2', 'Surabaya, Jawa Timur', '2022-09-12 08:57:58', 1),
(6, 'alamat3', 'Indonesia', '2022-09-12 08:57:58', 1),
(7, 'nama_contact', 'magangku', '2022-09-12 08:57:58', 1),
(8, 'telepon', '0452 324978 ', '2022-09-12 08:57:58', 1),
(9, 'logo', 'uploads/general/6c849634e81d130098fcfc54b062d4ec.jpg', '2022-09-12 08:57:58', 1),
(10, 'email', 'toro@mail.com', '2022-09-14 08:42:06', 1),
(12, 'facebook', 'facebook.com', '2022-09-15 07:27:42', 1),
(13, 'instagram', 'instagram.com', '2022-09-15 07:27:42', 1),
(14, 'twitter', 'twitter.com', '2022-09-15 07:27:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_picture` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `password`, `phone`, `address`, `profile_picture`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Budi', 'budi@mail.com', '$2y$10$hcwS9WSX1KOIrX567bBX/.3WgcMOeFNL7uJ6eGlBSK/oDQqdR9uOC', '081321321321', 'Jl. Rumah Budi 123', '3c17dfde6e58c6ba2eb3a2e468cd13c1.png', 1, '2022-09-12 15:06:54', '2022-09-19 06:49:38'),
(2, 'bambang', 'bambang@mail.com', '$2y$10$7UYn9Evqpp0KkLfXWJkdwuRYdNip5/.KGXMFauz7rqMHesWsH5nAK', NULL, NULL, NULL, 1, '2022-09-14 03:20:39', '2022-09-14 03:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `member_testimonial`
--

CREATE TABLE `member_testimonial` (
  `id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_member` int(11) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_testimonial`
--

INSERT INTO `member_testimonial` (`id`, `stars`, `description`, `created_at`, `updated_at`, `id_member`, `id_course`) VALUES
(2, 5, '\"Setelah ikut bootcamp di Linkmagangku, kemampuan saya berkembang dengan baik dalam penggunaan tools, teknik maupun secara teori. Bootcamp ini membantu saya untuk career shifting dari latar belakang sekarang berhasil kerja di bidang data. Saya juga lebih dilirik dan diperhitungkan oleh recruiter yang sedang mencari data talent.\"', '2022-09-15 08:29:13', '2022-09-15 08:29:13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Stephen', 'stephen@mail.com', 'Hello', 'Hello !', '2022-09-14 08:55:33', '2022-09-14 08:55:33'),
(2, 'Stephanie', 'steph@mail.com', 'Hellow', 'Hellow !', '2022-09-14 08:58:09', '2022-09-14 08:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `m_bank`
--

CREATE TABLE `m_bank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_bank`
--

INSERT INTO `m_bank` (`id`, `name`, `code`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'BANK BRI', '002', '', 1, '2017-10-04 00:00:00', 1, '2022-08-10 11:09:18', 1),
(2, 'BANK EKSPOR INDONESIA', '003', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(3, 'BANK MANDIRI', '008', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(4, 'BANK BNI', '009', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(5, 'BANK DANAMON', '011', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(6, 'PERMATA BANK', '013', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(7, 'BANK BCA', '014', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(8, 'BANK BII', '016', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(9, 'BANK PANIN', '019', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(10, 'BANK ARTA NIAGA KENCANA', '020', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(11, 'BANK NIAGA', '022', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(12, 'BANK BUANA IND', '023', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(13, 'BANK LIPPO', '026', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(14, 'BANK NISP', '028', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(15, 'AMERICAN EXPRESS BANK LTD', '030', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(16, 'CITIBANK N.A.', '031', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(17, 'JP. MORGAN CHASE BANK, N.A.', '032', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(18, 'BANK OF AMERICA, N.A', '033', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(19, 'ING INDONESIA BANK', '034', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(20, 'BANK MULTICOR TBK.', '036', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(21, 'BANK ARTHA GRAHA', '037', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(22, 'BANK CREDIT AGRICOLE INDOSUEZ', '039', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(23, 'THE BANGKOK BANK COMP. LTD', '040', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(24, 'THE HONGKONG & SHANGHAI B.C.', '041', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(25, 'THE BANK OF TOKYO MITSUBISHI UFJ LTD', '042', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(26, 'BANK SUMITOMO MITSUI INDONESIA', '045', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(27, 'BANK DBS INDONESIA', '046', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(28, 'BANK RESONA PERDANIA', '047', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(29, 'BANK MIZUHO INDONESIA', '048', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(30, 'STANDARD CHARTERED BANK', '050', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(31, 'BANK ABN AMRO', '052', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(32, 'BANK KEPPEL TATLEE BUANA', '053', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(33, 'BANK CAPITAL INDONESIA, TBK.', '054', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(34, 'BANK BNP PARIBAS INDONESIA', '057', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(35, 'BANK UOB INDONESIA', '058', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(36, 'KOREA EXCHANGE BANK DANAMON', '059', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(37, 'RABOBANK INTERNASIONAL INDONESIA', '060', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(38, 'ANZ PANIN BANK', '061', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(39, 'DEUTSCHE BANK AG.', '067', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(40, 'BANK WOORI INDONESIA', '068', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(41, 'BANK OF CHINA LIMITED', '069', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(42, 'BANK BUMI ARTA', '076', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(43, 'BANK EKONOMI', '087', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(44, 'BANK ANTARDAERAH', '088', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(45, 'BANK HAGA', '089', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(46, 'BANK IFI', '093', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(47, 'BANK CENTURY, TBK.', '095', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(48, 'BANK MAYAPADA', '097', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(49, 'BANK JABAR', '110', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(50, 'BANK DKI', '111', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(51, 'BPD DIY', '112', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(52, 'BANK JATENG', '113', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(53, 'BANK JATIM', '114', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(54, 'BPD JAMBI', '115', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(55, 'BPD ACEH', '116', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(56, 'BANK SUMUT', '117', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(57, 'BANK NAGARI', '118', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(58, 'BANK RIAU', '119', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(59, 'BANK SUMSEL', '120', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(60, 'BANK LAMPUNG', '121', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(61, 'BPD KALSEL', '122', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(62, 'BPD KALIMANTAN BARAT', '123', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(63, 'BPD KALTIM', '124', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(64, 'BPD KALTENG', '125', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(65, 'BPD SULSEL', '126', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(66, 'BANK SULUT', '127', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(67, 'BPD NTB', '128', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(68, 'BPD BALI', '129', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(69, 'BANK NTT', '130', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(70, 'BANK MALUKU', '131', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(71, 'BPD PAPUA', '132', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(72, 'BANK BENGKULU', '133', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(73, 'BPD SULAWESI TENGAH', '134', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(74, 'BANK SULTRA', '135', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(75, 'BANK NUSANTARA PARAHYANGAN', '145', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(76, 'BANK SWADESI', '146', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(77, 'BANK MUAMALAT', '147', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(78, 'BANK MESTIKA', '151', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(79, 'BANK METRO EXPRESS', '152', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(80, 'BANK SHINTA INDONESIA', '153', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(81, 'BANK MASPION', '157', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(82, 'BANK HAGAKITA', '159', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(83, 'BANK GANESHA', '161', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(84, 'BANK WINDU KENTJANA', '162', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(85, 'HALIM INDONESIA BANK', '164', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(86, 'BANK HARMONI INTERNATIONAL', '166', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(87, 'BANK KESAWAN', '167', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(88, 'BANK TABUNGAN NEGARA (PERSERO)', '200', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(89, 'BANK HIMPUNAN SAUDARA 1906, TBK .', '212', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(90, 'BANK TABUNGAN PENSIUNAN NASIONAL', '213', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(91, 'BANK SWAGUNA', '405', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(92, 'BANK JASA ARTA', '422', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(93, 'BANK MEGA', '426', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(94, 'BANK JASA JAKARTA', '427', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(95, 'BANK BUKOPIN', '441', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(96, 'BANK SYARIAH MANDIRI', '451', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(97, 'BANK BISNIS INTERNASIONAL', '459', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(98, 'BANK SRI PARTHA', '466', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(99, 'BANK JASA JAKARTA', '472', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(100, 'BANK BINTANG MANUNGGAL', '484', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(101, 'BANK BUMIPUTERA', '485', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(102, 'BANK YUDHA BHAKTI', '490', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(103, 'BANK MITRANIAGA', '491', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(104, 'BANK AGRO NIAGA', '494', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(105, 'BANK INDOMONEX', '498', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(106, 'BANK ROYAL INDONESIA', '501', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(107, 'BANK ALFINDO', '503', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(108, 'BANK SYARIAH MEGA', '506', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(109, 'BANK INA PERDANA', '513', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(110, 'BANK HARFA', '517', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(111, 'PRIMA MASTER BANK', '520', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(112, 'BANK PERSYARIKATAN INDONESIA', '521', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(113, 'BANK AKITA', '525', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(114, 'LIMAN INTERNATIONAL BANK', '526', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(115, 'ANGLOMAS INTERNASIONAL BANK', '531', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(116, 'BANK DIPO INTERNATIONAL', '523', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(117, 'BANK KESEJAHTERAAN EKONOMI', '535', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(118, 'BANK UIB', '536', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(119, 'BANK ARTOS IND', '542', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(120, 'BANK PURBA DANARTA', '547', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(121, 'BANK MULTI ARTA SENTOSA', '548', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(122, 'BANK MAYORA', '553', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(123, 'BANK INDEX SELINDO', '555', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(124, 'BANK VICTORIA INTERNATIONAL', '566', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(125, 'BANK EKSEKUTIF', '558', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(126, 'CENTRATAMA NASIONAL BANK', '559', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(127, 'BANK FAMA INTERNASIONAL', '562', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(128, 'BANK SINAR HARAPAN BALI', '564', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(129, 'BANK HARDA', '567', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(130, 'BANK FINCONESIA', '945', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(131, 'BANK MERINCORP', '946', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(132, 'BANK MAYBANK INDOCORP', '947', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(133, 'BANK OCBC – INDONESIA', '948', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(134, 'BANK CHINA TRUST INDONESIA', '949', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1),
(135, 'BANK COMMONWEALTH', '950', NULL, 1, '2017-10-04 00:00:00', 1, '2022-08-10 10:15:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_bank_account`
--

CREATE TABLE `m_bank_account` (
  `id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL,
  `id_m_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_bank_account`
--

INSERT INTO `m_bank_account` (`id`, `account_name`, `account_number`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`, `id_m_bank`) VALUES
(1, 'toro', '111', '', 1, '2022-09-13 10:36:57', 1, '2022-09-13 10:36:57', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `m_course_type`
--

CREATE TABLE `m_course_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_course_type`
--

INSERT INTO `m_course_type` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Bootcamp', '', 1, '2022-09-20 10:11:47', 1, '2022-09-20 10:11:47', 1),
(2, 'Rapid Onboarding', '', 1, '2022-09-20 10:12:01', 1, '2022-09-20 10:12:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_difficulty_type`
--

CREATE TABLE `m_difficulty_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_difficulty_type`
--

INSERT INTO `m_difficulty_type` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Beginner', '', 1, '2022-09-12 10:51:10', 1, '2022-09-12 10:51:10', 1),
(2, 'Intermediate', '', 1, '2022-09-20 09:59:17', 1, '2022-09-20 09:59:17', 1),
(3, 'Advance', '', 1, '2022-09-20 09:59:27', 1, '2022-09-20 10:00:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_payment_type`
--

CREATE TABLE `m_payment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_payment_type`
--

INSERT INTO `m_payment_type` (`id`, `name`, `description`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'Bank Transfer', '', 1, '2022-09-13 10:56:55', 1, '2022-09-13 10:56:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_tutor`
--

CREATE TABLE `m_tutor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `role` varchar(255) DEFAULT NULL,
  `profile_picture` text,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_tutor`
--

INSERT INTO `m_tutor` (`id`, `name`, `description`, `role`, `profile_picture`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`, `id_company`) VALUES
(1, 'Hendra', '', 'Data Scientist', '4a1a7cfc897545767ba01af7ec3076f9.jpg', 1, '2022-09-12 10:19:33', 1, '2022-09-12 10:19:33', 1, 1),
(2, 'Daniel', NULL, 'Data Analyst', NULL, 1, '2022-09-15 09:04:16', 1, '2022-09-15 09:04:16', 1, 1);

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

--
-- Dumping data for table `no_generator`
--

INSERT INTO `no_generator` (`id`, `month`, `year`, `value`, `type`) VALUES
(1, 9, 2022, 2, 'ORDER'),
(2, 9, 2022, 3, 'CONFIRM');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `discount_type` enum('PERCENTAGE','FIXED') NOT NULL,
  `discount` varchar(255) NOT NULL,
  `max_discount` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `name`, `code`, `description`, `start_date`, `end_date`, `discount_type`, `discount`, `max_discount`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`) VALUES
(1, 'test promo', 'TESTPROMO', '<p>promo</p>', '2022-09-21 10:02:00', '2022-09-30 10:02:00', 'FIXED', '500000', NULL, 1, '2022-09-21 10:03:20', 1, '2022-09-21 11:33:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_course`
--

CREATE TABLE `promotion_course` (
  `id` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion_course`
--

INSERT INTO `promotion_course` (`id`, `id_course`, `id_promotion`) VALUES
(3, 4, 1),
(4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_order`
--

CREATE TABLE `trans_order` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `discount` double DEFAULT NULL,
  `total_after_discount` double NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Not Completed, 1 = Completed, 2 = Partial, 4 = Canceled',
  `forced_id` int(11) DEFAULT NULL,
  `forced_comment` text,
  `forced_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_id` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_course_class` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_course_price` int(11) DEFAULT NULL,
  `id_promotion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_order`
--

INSERT INTO `trans_order` (`id`, `order_number`, `date`, `total`, `discount`, `total_after_discount`, `status`, `forced_id`, `forced_comment`, `forced_at`, `created_at`, `created_id`, `updated_at`, `updated_id`, `id_course`, `id_course_class`, `id_member`, `id_course_price`, `id_promotion`) VALUES
(1, 'ORDER/2022/09/001', '2022-09-21 11:43:22', 3000000, 0, 3000000, 1, 1, 'mantap', '2022-09-21 12:02:12', '2022-09-21 11:43:22', 1, '2022-09-21 12:02:12', 1, 1, 1, 1, 1, NULL),
(2, 'ORDER/2022/09/002', '2022-09-21 11:44:05', 3000000, 500000, 2500000, 0, NULL, NULL, NULL, '2022-09-21 11:44:05', 1, '2022-09-21 11:44:05', 1, 6, 3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trans_order_confirm`
--

CREATE TABLE `trans_order_confirm` (
  `id` int(11) NOT NULL,
  `order_confirm_number` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `sender_account_name` varchar(255) DEFAULT NULL,
  `sender_account_number` varchar(255) DEFAULT NULL,
  `sender_bank` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `verified_at` datetime DEFAULT NULL,
  `verified_id` int(11) DEFAULT NULL,
  `verified_comment` text,
  `created_at` datetime NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_id` int(11) NOT NULL,
  `id_trans_order` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_course_class` int(11) DEFAULT NULL,
  `id_m_payment_type` int(11) NOT NULL,
  `id_m_bank_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_order_confirm`
--

INSERT INTO `trans_order_confirm` (`id`, `order_confirm_number`, `date`, `sender_account_name`, `sender_account_number`, `sender_bank`, `amount`, `status`, `verified_at`, `verified_id`, `verified_comment`, `created_at`, `created_id`, `updated_at`, `updated_id`, `id_trans_order`, `id_course`, `id_course_class`, `id_m_payment_type`, `id_m_bank_account`) VALUES
(1, 'CONFIRM/2022/09/001', '2022-09-21 13:25:00', 'Budi', '111', 7, 3000000, 0, NULL, NULL, NULL, '2022-09-21 13:25:25', 1, '2022-09-21 13:39:42', 1, 1, 1, 1, 1, 1),
(3, 'CONFIRM/2022/09/003', '2022-09-21 15:52:53', 'Bambang', '222', 7, 2500000, 0, NULL, NULL, NULL, '2022-09-21 15:53:12', 1, '2022-09-21 15:53:12', 1, 2, 6, 3, 1, 1);

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
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_class`
--
ALTER TABLE `course_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_class_member`
--
ALTER TABLE `course_class_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_class_member_history`
--
ALTER TABLE `course_class_member_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_module`
--
ALTER TABLE `course_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_price`
--
ALTER TABLE `course_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_price_benefit`
--
ALTER TABLE `course_price_benefit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tutor`
--
ALTER TABLE `course_tutor`
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
-- Indexes for table `member_testimonial`
--
ALTER TABLE `member_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bank`
--
ALTER TABLE `m_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bank_account`
--
ALTER TABLE `m_bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_course_type`
--
ALTER TABLE `m_course_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_difficulty_type`
--
ALTER TABLE `m_difficulty_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_payment_type`
--
ALTER TABLE `m_payment_type`
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
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_course`
--
ALTER TABLE `promotion_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_order_confirm`
--
ALTER TABLE `trans_order_confirm`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_class`
--
ALTER TABLE `course_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_class_member`
--
ALTER TABLE `course_class_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_class_member_history`
--
ALTER TABLE `course_class_member_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_module`
--
ALTER TABLE `course_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_price`
--
ALTER TABLE `course_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_price_benefit`
--
ALTER TABLE `course_price_benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course_tutor`
--
ALTER TABLE `course_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_testimonial`
--
ALTER TABLE `member_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_bank`
--
ALTER TABLE `m_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `m_bank_account`
--
ALTER TABLE `m_bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_course_type`
--
ALTER TABLE `m_course_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_difficulty_type`
--
ALTER TABLE `m_difficulty_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_payment_type`
--
ALTER TABLE `m_payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_tutor`
--
ALTER TABLE `m_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `no_generator`
--
ALTER TABLE `no_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotion_course`
--
ALTER TABLE `promotion_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trans_order_confirm`
--
ALTER TABLE `trans_order_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
