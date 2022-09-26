-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2022 at 04:33 AM
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
(1, 'Toro Developer', '', '8bcd0bfbcd853ed4cafe638656d810b1.jpg', 1, '2022-09-26 10:52:29', 1, '2022-09-26 10:52:41', 1);

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
(1, 'Backend', 'backend', '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Backend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-26 10:56:03', 1, '2022-09-26 10:56:03', 1, 1, 1),
(2, 'Frontend', 'frontend', '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Frontend Developer Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-26 10:56:27', 1, '2022-09-26 10:56:27', 1, 1, 1),
(3, 'UI/UX', 'ui-ux', '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai UI/UX Expert dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-26 10:56:54', 1, '2022-09-26 10:56:54', 1, 1, 1),
(4, 'Entrepreneur', 'entrepreneur', '<p>Kami dapat membantumu mendapatkan pekerjaan impian sebagai Entrepreneur dalam hitungan bulan, dengan jaminan uang kembali 100%</p>', 1, '2022-09-26 10:57:28', 1, '2022-09-26 10:57:28', 1, 1, 1),
(5, 'Knockout JS', 'knockout-js', '<p>Knockout is a JavaScript library that helps you to create rich, responsive display and editor user interfaces with a clean underlying data model. Any time you have sections of UI that update dynamically (e.g., changing depending on the user’s actions or when an external data source changes), KO can help you implement it more simply and maintainably.</p>', 1, '2022-09-26 10:58:16', 1, '2022-09-26 10:58:16', 1, 2, 1);

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
(1, 1, '2022-09-26', '2022-12-26', 0, 1, '2022-09-26 10:58:50', 1, '2022-09-26 10:58:50', 1, 1),
(2, 1, '2022-09-26', '2022-12-26', 0, 1, '2022-09-26 10:59:16', 1, '2022-09-26 10:59:16', 1, 2),
(3, 1, '2022-09-26', '2022-12-26', 0, 1, '2022-09-26 10:59:38', 1, '2022-09-26 10:59:38', 1, 3),
(4, 1, '2022-09-26', '2022-12-26', 0, 1, '2022-09-26 11:00:02', 1, '2022-09-26 11:00:02', 1, 4),
(5, 1, '2022-09-26', '2022-12-26', 0, 1, '2022-09-26 11:00:28', 1, '2022-09-26 11:00:28', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `course_class_member`
--

CREATE TABLE `course_class_member` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_course_class` int(11) NOT NULL,
  `id_trans_order` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_class_member`
--

INSERT INTO `course_class_member` (`id`, `id_member`, `id_course_class`, `id_trans_order`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '2022-09-26 11:31:58', '2022-09-26 11:31:58'),
(2, 1, 1, 2, '2022-09-26 11:32:36', '2022-09-26 11:32:36'),
(3, 2, 1, 3, '2022-09-26 11:33:23', '2022-09-26 11:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `course_class_member_history`
--

CREATE TABLE `course_class_member_history` (
  `id` int(11) NOT NULL,
  `id_course_class_member` int(11) NOT NULL,
  `id_course_module` int(11) NOT NULL,
  `description` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(1, 'Introduction to the World of Programming', '<div>(a)\n<p>Introduction Internet.</p>\n</div>\n<div>(b)\n<p>Introduction to Programming.</p>\n</div>', 1, 0, 1, '2022-09-26 11:05:09', 1, '2022-09-26 11:05:09', 1, 1, NULL),
(2, 'Backend Developer Career Path', '<div>(a)\n<p>Introduction to Backend Web Developer.</p>\n</div>\n<div>(b)\n<p>Career Roles and Opportunities.</p>\n</div>', 2, 0, 1, '2022-09-26 11:05:48', 1, '2022-09-26 11:05:48', 1, 1, NULL),
(3, 'HTML Fundamental', '<div>(a)\n<p>HTML Fundamentals.</p>\n<p> </p>\n</div>\n<div>(b)\n<p>HTML Hands-On.</p>\n</div>', 3, 0, 1, '2022-09-26 11:06:16', 1, '2022-09-26 11:06:16', 1, 1, NULL),
(4, 'Javascript Fundamental', '<div>(a)\n<p>Introduction to Javascript.</p>\n<p> </p>\n</div>\n<div>(b)\n<p>Basic Javascript.</p>\n<p> </p>\n</div>\n<div>(c)\n<p>Operator &amp; Expression.</p>\n<p> </p>\n</div>\n<div>(d)\n<p>Basic Javascript Technique.</p>\n</div>', 4, 0, 1, '2022-09-26 11:06:32', 1, '2022-09-26 11:10:16', 1, 1, NULL),
(5, 'Version Control', '<div>(a)\n<p>Command Line.</p>\n<p> </p>\n</div>\n<div>(b)\n<p>GIT.</p>\n</div>', 5, 0, 1, '2022-09-26 11:06:52', 1, '2022-09-26 11:06:52', 1, 1, NULL),
(6, 'Database Design', '<div>(a)\n<p>Express JS.</p>\n<p> </p>\n</div>\n<div>(b)\n<p>Restful API.</p>\n<p> </p>\n</div>\n<div>(c)\n<p>Database.</p>\n<p> </p>\n</div>\n<div>(d)\n<p>SQL.</p>\n<p> </p>\n</div>\n<div>(e)\n<p>ORM (Object Relational Mapping).</p>\n</div>', 6, 0, 1, '2022-09-26 11:07:09', 1, '2022-09-26 11:07:09', 1, 1, NULL),
(7, 'API Architecture and Documentation', '<div>(a)\n<p>Design Pattern.</p>\n<p> </p>\n</div>\n<div>(b)\n<p>Asynchronous.</p>\n<p> </p>\n</div>\n<div>(c)\n<p>Authorization.</p>\n<p> </p>\n</div>\n<div>(d)\n<p>API Documentation.</p>\n</div>', 7, 0, 1, '2022-09-26 11:07:32', 1, '2022-09-26 11:07:32', 1, 1, NULL),
(8, 'Introduction to the World of Programming', '<div>(a)\r\n<p>Introduction Internet.</p>\r\n</div>\r\n<div>(b)\r\n<p>Introduction to Programming.</p>\r\n</div>', 1, 0, 1, '2022-09-26 11:05:09', 1, '2022-09-26 11:05:09', 1, 2, NULL),
(9, 'Frontend Developer Career Path', '<div>(a)\r\n<p>Introduction to Frontend Web Developer.</p>\r\n</div>\r\n<div>(b)\r\n<p>Career Roles and Opportunities.</p>\r\n</div>', 2, 0, 1, '2022-09-26 11:05:48', 1, '2022-09-26 11:05:48', 1, 2, NULL),
(10, 'HTML Fundamental', '<div>(a)\r\n<p>HTML Fundamentals.</p>\r\n<p> </p>\r\n</div>\r\n<div>(b)\r\n<p>HTML Hands-On.</p>\r\n</div>', 3, 0, 1, '2022-09-26 11:06:16', 1, '2022-09-26 11:06:16', 1, 2, NULL),
(11, 'CSS Fundamental', '<div>(a)\n<p>CSS.</p>\n<p> </p>\n</div>\n<div>(b)\n<p>CSS Framework.</p>\n<p> </p>\n</div>\n<div>(c)\n<p>Layouting UI.</p>\n<p> </p>\n</div>\n<div>(d)\n<p>UI Responsive.</p>\n</div>', 4, 0, 1, '2022-09-26 11:09:32', 1, '2022-09-26 11:09:32', 1, 2, NULL),
(12, 'Javascript Fundamental', '<div>(a)\r\n<p>Introduction to Javascript.</p>\r\n<p> </p>\r\n</div>\r\n<div>(b)\r\n<p>Basic Javascript.</p>\r\n<p> </p>\r\n</div>\r\n<div>(c)\r\n<p>Operator &amp; Expression.</p>\r\n<p> </p>\r\n</div>\r\n<div>(d)\r\n<p>Basic Javascript Technique.</p>\r\n</div>', 5, 0, 1, '2022-09-26 11:06:32', 1, '2022-09-26 11:10:16', 1, 2, NULL),
(13, 'Version Control', '<div>(a)\r\n<p>Command Line.</p>\r\n<p> </p>\r\n</div>\r\n<div>(b)\r\n<p>GIT.</p>\r\n</div>', 6, 0, 1, '2022-09-26 11:06:52', 1, '2022-09-26 11:06:52', 1, 2, NULL),
(14, 'API Architecture and Documentation', '<div>(a)\r\n<p>Design Pattern.</p>\r\n<p> </p>\r\n</div>\r\n<div>(b)\r\n<p>Asynchronous.</p>\r\n<p> </p>\r\n</div>\r\n<div>(c)\r\n<p>Authorization.</p>\r\n<p> </p>\r\n</div>\r\n<div>(d)\r\n<p>API Documentation.</p>\r\n</div>', 7, 0, 1, '2022-09-26 11:07:32', 1, '2022-09-26 11:07:32', 1, 2, NULL),
(15, 'ReactJS Framework', '<div>(a)\n<p>React JS.</p>\n<p> </p>\n</div>\n<div>(b)\n<p>React Router &amp; API Integration.</p>\n<p> </p>\n</div>\n<div>(c)\n<p>OAuth.</p>\n<p> </p>\n</div>\n<div>(d)\n<p>Redux.</p>\n</div>', 8, 0, 1, '2022-09-26 11:11:16', 1, '2022-09-26 11:11:16', 1, 2, NULL),
(16, 'Introduction to UI-UX Design', 'Memahami tentang role seorang UI-UX Designer dari segi teknis dan dari segi kebermanfaatan terhadap bisnis, tentang dengan siapa mereka akan berinteraksi/bekerja, apa kebutuhan usernya, apa tanggung jawab mereka terhadap usernya, dan bagaimana role tersebut menarik untuk mereka', 1, 0, 1, '2022-09-26 11:14:12', 1, '2022-09-26 11:14:12', 1, 3, NULL),
(17, 'Intro to Design Thinking', '(a)\r\nMemahami bagaimana menggunakan metode Design Thinking yang praktis di setiap tahap masalah, dengan bantuan templat metode.\r\n\r\n(b)\r\nMemahami bagaimana memulai budaya kerja baru berdasarkan pendekatan yang berpusat pada pengguna, empati, ideasi, pembuatan prototipe, dan pengujian yang menyenangkan.\r\n\r\n(c)\r\nMemahami bagaimana menggunakan metode etnografi dan analisis, seperti wawancara, kelompok fokus, dan survei.\r\n\r\n(d)\r\nMengetahui channel yang ada di Digital Marketing.\r\n\r\n(e)\r\nMemahami bagaimana membuat prototipe awal dan cepat, dan use case dari pembelajaran real case.', 2, 0, 1, '2022-09-26 11:14:12', 1, '2022-09-26 11:14:12', 1, 3, NULL),
(18, 'User and Product Research', '(a)\r\nMengetahui User Research penting dalam proses desain UX.\r\n\r\n(b)\r\nMengetahui berbagai metode penelitian pengguna.\r\n\r\n(c)\r\nMenentukan kapan wawancara pengguna bermanfaat proses desain.\r\n\r\n(d)\r\nBerlatih melakukan wawancara dan menulis problem statement.', 3, 0, 1, '2022-09-26 11:14:12', 1, '2022-09-26 11:14:12', 1, 3, NULL),
(19, 'Flow and Wireframe', '(a)\r\nMemahami nilai Storyboard, peta perjalanan, dan user flow dalam proses UX\r\n\r\n(b)\r\nBerlatih mendokumentasikan dan membuat user flow berdasarkan skenario yang relevan\r\n\r\n(c)\r\nMampu menghubungkan userflow ke wireframes\r\n\r\n(d)\r\nMampu menjelaskan apa itu wireframe dan fungsi dalam proses desain\r\n\r\n(e)\r\nMentukan wireframe fidelity yang akan dijadikan dasar pada sebuah skenario\r\n\r\n(f)\r\nMengidentifikasi jenis dan kualitas navigasi dalam mendorong user experience yang kuat', 4, 0, 1, '2022-09-26 11:14:12', 1, '2022-09-26 11:14:12', 1, 3, NULL),
(20, 'Visual Design', '(a)\r\nMampu merancang mobile design berdasarkan mobile usability best practice\r\n\r\n(b)\r\nMampu menggunakan persona dan task modelling untuk merencanakan mobile user experience\r\n\r\n(c)\r\nMemahami bagaimana konsep desain interface akan berbeda di antara platform operasi (mis. IOS vs Android)\r\n\r\n(d)\r\nMampu mengevaluasi mobile desain dan menghindari mobile user experience yang buruk\r\n\r\n(e)\r\nMampu menerapkan strategi mobile desain UX', 5, 0, 1, '2022-09-26 11:14:12', 1, '2022-09-26 11:14:12', 1, 3, NULL),
(21, 'Introduction', '<div>(a)\n<p>Introduction to Knockout.js</p>\n</div>', 1, 0, 1, '2022-09-12 15:23:36', 1, '2022-09-26 11:17:19', 1, 5, NULL),
(22, 'Introduction', '<h2>Selamat Datang!</h2>\r\n\r\n                            <p>pada tutorial ini anda akan belajar beberapa hal dasar dalam membangun UI website\r\n                                <em>Model-View-ViewModel</em> (MVVM) menggunakan knockout.js\r\n                            </p>\r\n\r\n                            <p>Anda akan belajar bagaimana mendefinisikan tampilan UI menggunakan <strong>views</strong> dan\r\n                                <strong>declarative bindings</strong>, ata dan perilakunya menggunakan <strong>viewmodels</strong> dan\r\n                                <strong>observables</strong>,\r\n                                dan bagaimana semuanya tetap sinkron secara otomatis dengan bantuan Knockout\'s <strong>dependency\r\n                                    tracking</strong>\r\n                            </p>\r\n\r\n                            <h3>Menggunakan bindings di view</h3>\r\n\r\n                            <p>Di sudut kanan bawah, anda dapat melihat <em>viewmodel</em> yang berisi data orang. Di sudut kanan atas, Anda memiliki <em>view</em> yang seharusnya menampilkan data orang. Saat ini hanya menampilkan \"<em>todo</em>\", jadi mari kita perbaiki itu.</p>\r\n\r\n                            <p>Ubah dua elemen <code>&lt;strong&gt;</code> dalam tampilan, tambahkan attribute <code>data-bind</code> untuk menampilkan nama orang:\r\n                            </p>\r\n\r\n                            <pre><code><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>First name: <span class=\"tag\">&lt;<span class=\"title\">strong</span> <span class=\"highlight\"><span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: firstName\"</span></span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">strong</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                            </code></pre>\r\n                            <pre><code><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>Last name: <span class=\"tag\">&lt;<span class=\"title\">strong</span> <span class=\"highlight\"><span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: lastName\"</span></span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">strong</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                            </code></pre>\r\n\r\n\r\n                            <p>attribute <code>data-bind</code> adalah bagaimana knockout memungkinkan anda secara deklaratif mengaitkan viewmodel properties dengan DOM element kamu baru saja menggunakan <code>text</code> binding untuk menetapkan text ke DOM elemen.</p>', 1, 1, 1, '2022-09-22 08:58:43', 1, '2022-09-26 11:18:37', 1, 5, 21),
(23, 'Introduction', '<h2>Membuat data bisa diedit</h2>\r\n\r\n                            <p>Anda tidak dibatasi untuk menampilkan data statis. Mari gunakan <code>value</code> binding,  bersama dengan beberapa  <code>&lt;input&gt;</code> HTML biasa, untuk membuat data dapat diedit.</p>\r\n\r\n                            <p>Tambahkan markup berikut ke bagian bawah tampilan Anda (biarkan markup yang ada tetap di atasnya):</p>\r\n\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>First name: <span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: firstName\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                                                                                    </code></pre>\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>Last name: <span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: lastName\"</span>/&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span></code></pre>\r\n\r\n\r\n                            <p>Sekarang jalankan aplikasinya. Apa yang terjadi ketika Anda mengedit teks di salah satu kotak teks?</p>\r\n\r\n                            <p>Hmm... ternyata tidak terjadi apa-apa. Mari kita perbaiki itu...</p>\r\n                            <h3>Pengenalan Observables</h3>\r\n\r\n                            <p>Sebenarnya, saat anda mengedit salah satu dari text box, itu akan memperbarui data viewmodelnya. Tetapi karena properti viewmodel hanyalah string JavaScript biasa, mereka tidak memiliki cara untuk memberi tahu siapa pun bahwa mereka telah berubah, sehingga UI tetap statis. Itu sebabnya Knockout memiliki konsep <strong>observables</strong> - ini adalah properti yang secara otomatis akan mengeluarkan pemberitahuan setiap kali nilainya berubah.</p>\r\n\r\n                            <p>Ubah viewmodel anda untuk membuat isi dari <code>firstName</code> dan <code>lastName</code> <em>observable</em> menggunakan <code>ko.observable</code>:</p>\r\n\r\n                            <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">AppViewModel</span><span class=\"params\">()</span>{</span>\r\n    <span class=\"keyword\">this</span>.firstName = <span class=\"highlight\">ko.observable(<span class=\"string\">\"Bert\"</span>)</span>;\r\n    <span class=\"keyword\">this</span>.lastName = <span class=\"highlight\">ko.observable(<span class=\"string\">\"Bertington\"</span>)</span>;\r\n        }\r\n                                            </code></pre>\r\n\r\n                            <p>Sekarang jalankan kembali aplikasi dan edit kotak teks. Kali ini Anda tidak hanya akan melihat bahwa data model tampilan yang mendasarinya diperbarui saat Anda mengedit, tetapi semua UI terkait juga diperbarui secara sinkron dengannya. </p>', 2, 1, 1, '2022-09-22 09:00:09', 1, '2022-09-26 11:18:41', 1, 5, 21),
(24, 'Introduction', '<h2>Mendefinisikan nilai yang dihitung</h2>\r\n\r\n                            <p>seringkali, anda ingin menggabungkan atau mengubah banyak observables values untuk membuat yang lain, pada contoh ini anda mungkin ingin mendefinisikan <em>full name</em> sebagain\r\n                                <em>first name</em> plus <em>space</em> plus <em>last name</em>.\r\n                            </p>\r\n\r\n                            <p>Untuk menangani ini, Knockout memiliki konsep <strong>computed properties</strong> -\r\n                                ini adalah <em>observable</em> (yaitu, mereka memberi tahu tentang perubahan) dan dihitung berdasarkan nilai dari observables lainnya.</p>\r\n\r\n                            <p>Tambahkan <code>fullName</code> ke view model anda, dengan menambahkan kode berikut di dalam AppViewModel, setelah namaDepan dan namaBelakang dideklarasikan:\r\n\r\n                                <code>AppViewModel</code>, after <code>firstName</code> and <code>lastName</code>\r\n                                are\r\n                                declared:\r\n                            </p>\r\n\r\n                            <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"keyword\">this</span>.fullName = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"keyword\">return</span> <span class=\"keyword\">this</span>.firstName() + <span class=\"string\">\" \"</span> + <span class=\"keyword\">this</span>.lastName();\r\n    }, <span class=\"keyword\">this</span>);\r\n                                                            </code></pre>\r\n\r\n                            <p>Seperti yang bisa anda lihat, kami meneruskan fungsi panggilan balik ke <code>ko.computed</code>\r\n                                yang menentukan bagaimana seharusnya menghitung nilainya. Selanjutnya, tampilkan nilai \r\n <code>fullName</code> di UI Anda dengan menambahkan markup di bagian bawah tampilan Anda:</p>\r\n\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">p</span>&gt;</span>Full name: <span class=\"tag\">&lt;<span class=\"title\">strong</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: fullName\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">strong</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">p</span>&gt;</span>\r\n                                                                                    </code></pre>\r\n\r\n                            <p>Jika Anda menjalankan aplikasi sekarang dan mengedit kotak teks, Anda akan melihat bahwa semua elemen UI (termasuk tampilan nama lengkap) tetap sinkron dengan data yang mendasarinya.</p>\r\n\r\n                            <h3>Bagaimana cara kerjanya?</h3>\r\n\r\n                            <p>Segalanya tetap sinkron karena pelacakan ketergantungan otomatis:\r\n                                <code>&lt;strong&gt;</code> terakhir di sana bergantung pada <code>fullName</code>, yang bergantung pada <code>firstName</code>\r\n                                dan <code>lastName</code>, dan salah satu dari keduanya dapat diubah dengan mengedit textbox.\r\n                            </p>', 3, 1, 1, '2022-09-22 09:02:03', 1, '2022-09-26 11:18:43', 1, 5, 21),
(25, 'Introduction', '<h2>Menambahkan lebih banyak behavior</h2>\r\n\r\n                            <p>Untuk menyelesaikan contoh ini, mari tambahkan satu behavior lagi. Yaitu button yang membuat value namaBelakang berubah menjadi huruf kapital.\r\n                            </p>\r\n\r\n                            <h3>Memperbarui view model</h3>\r\n\r\n                            <p>Pertama, tambahkan fungsi <code>capitalizeLastName</code>ke viewmodel untuk mengimplementasikan behavior ini:</p>\r\n\r\n                            <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">AppViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave firstName, lastName, and fullName unchanged here ...</span>\r\n    <span class=\"keyword\">this</span>.capitalizeLastName = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n        <span class=\"keyword\">var</span> currentVal = <span class=\"keyword\">this</span>.lastName();        <span class=\"comment\">// Read the current value</span>\r\n        <span class=\"keyword\">this</span>.lastName(currentVal.toUpperCase()); <span class=\"comment\">// Write back a modified value</span>\r\n    };\r\n    }\r\n                            </code></pre>\r\n\r\n                            <p>Perhatikan bahwa, untuk membaca atau menulis nilai observables, Anda memanggilnya sebagai fungsi.</p>\r\n\r\n                            <h3>Memperbarui tampilan</h3>\r\n\r\n                            <p>Selanjutnya, tambahkan tombol ke tampilan, menggunakan pengikatan klik untuk mengaitkan klik dengan fungsi model tampilan yang baru saja Anda tambahkan:</p>\r\n\r\n                            <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: capitalizeLastName\"</span>&gt;</span>Go caps<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n                            </code></pre>\r\n\r\n                            <p>Jika kamu menjalankan ini sekarang dan klik tombol \"Go Caps\", anda akan melihat semua bagian UI yang relevan diperbarui agar sesuai dengan status model tampilan yang diubah.</p>', 4, 1, 1, '2022-09-22 09:02:40', 1, '2022-09-26 11:18:45', 1, 5, 21),
(26, 'Introduction', '<h2>Kerja yang baik!</h2>\r\n\r\n                            <p>Ini adalah contoh yang sangat mendasar, tetapi itu menggambarkan beberapa poin kunci dari MVVM:</p>\r\n\r\n                            <ul>\r\n                                <li>Anda sudah mempelajari object-oriented representasi dari data UI dan behaviour anda (viewmodel)</li>\r\n                                <li>Secara terpisah, Anda memiliki representasi deklaratif tentang bagaimana itu harus ditampilkan secara visual(pandangan Anda)</li>\r\n                                <li>Anda dapat menerapkan behavior canggih hanya dengan memperbarui objek viewmodel. Anda tidak perlu khawatir tentang elemen DOM mana yang perlu diubah/ditambahkan/dihapus - Framework dapat menangani sinkronisasi untuk Anda.</li>\r\n                            </ul>\r\n\r\n                            <p>Tutorial selanjutnya akan membawa Anda lebih dalam :)</p>', 5, 1, 1, '2022-09-22 09:03:59', 1, '2022-09-26 11:18:53', 1, 5, 21),
(27, 'Working with list and collection', 'mengenal lists dan collection di knockout.js', 2, 0, 1, '2022-09-22 09:06:43', 1, '2022-09-26 11:17:31', 1, 5, NULL),
(28, 'Working with list and collection', '<h2>Bekerja dengan Lists dan Collection</h2>\r\n                            \r\n                                <p>Seringkali , Anda ingin membuat blok elemen UI yang berulang, terutama saat menampilkan list dimana user dapat menambahkan dan menghapus elemen. Knockout memungkinkan Anda melakukannya dengan mudah, menggunakan <em>observable arrays</em> dan <code>foreach</code> binding. </p>\r\n                            \r\n                                <h3>Getting started</h3>\r\n                            \r\n                                <p>Dalam beberapa menit kedepan anda akan membangun UI dinamis untuk reservasi kursi dan makanan - ini bisa menjadi salah satu langkah dalam proses pemesanan maskapai. Di panel kanan bawah, Anda sudah mendapatkan:</p>\r\n                            \r\n                                <ul>\r\n                                    <li><code>SeatReservation</code>, konstruktor kelas JavaScript sederhana yang menyimpan nama penumpang dengan pilihan makanan</li>\r\n                                    <li><code>ReservationsViewModel</code>, kelas viewmodel yang menampung:\r\n                                        <ul>\r\n                                            <li><code>availableMeals</code>, objek JavaScript yang menyediakan data makanan</li>\r\n                                            <li><code>seats</code>, sebuah array yang menyimpan koleksi awal instans SeatReservation. Perhatikan bahwa ini adalah <code>ko.observableArray</code> - tidak mengherankan, itu setara dengan array biasa, yang berarti dapat secara otomatis     memicu pembaruan UI setiap kali item ditambahkan atau dihapus.\r\n</li>\r\n                                        </ul>\r\n                                    </li>\r\n                                </ul>\r\n                            \r\n                                <p>Tampilan (panel kanan atas) belum menampilkan data reservasi, jadi mari kita perbaiki. Perbarui element <code>&lt;tbody&gt;</code> untuk menggunakan <code>foreach</code> binding, sehingga akan membuat salinan child elemennya untuk setiap entri dalam array <code>seats</code>:</p>\r\n                            \r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"highlight\"><span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: seats\"</span></span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n                            </code></pre>\r\n                            \r\n                                <p>dan kemudian isi element <code>&lt;tbody&gt;</code> dengan beberapa markup untuk mengatakan bahwa Anda menginginkan baris tabel (<code>&lt;tr&gt;</code>) untuk setiap entri:</p>\r\n                            \r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: seats\"</span>&gt;</span>\r\n                                <span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n                                    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: name\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                                    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: meal().mealName\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                                    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: meal().price\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                                <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>    \r\n                            <span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n                            </code></pre>\r\n                            \r\n                                <p>Perhatikan bahwa, karena properti <code>meal</code> adalah <em>observable</em>, penting untuk memanggil <code>meal()</code> sebagai fungsi (untuk mendapatkan nilai saat ini) sebelum mencoba membaca sub-properti. Dengan kata lain, tulis <code>meal().price</code>, <em>bukan</em>\r\n                                    <code>meal.price</code>.</p>\r\n                            \r\n                                <p>Hasil? Jika Anda menjalankan aplikasi sekarang, Anda akan melihat tabel sederhana informasi reservasi kursi.</p>\r\n                            \r\n                                <p><code>foreach</code> adalah bagian dari keluarga <em>control flow bindings</em> yang mencakup\r\n                                    <a href=\"http://knockoutjs.com/documentation/foreach-binding.html\"><code>foreach</code></a>,\r\n                                    <a href=\"http://knockoutjs.com/documentation/if-binding.html\"><code>if</code></a>,\r\n                                    <a href=\"http://knockoutjs.com/documentation/ifnot-binding.html\"><code>ifnot</code></a>, dan\r\n                                    <a href=\"http://knockoutjs.com/documentation/with-binding.html\"><code>with</code></a>. Ini memungkinkan untuk membangun segala jenis UI berulang, bersyarat, atau bersarang berdasarkan viewmodel dinamis Anda.\r\n                                </p>', 1, 1, 1, '2022-09-22 09:14:16', 1, '2022-09-26 11:18:57', 1, 5, 27),
(29, 'Working with list and collection', '<h2>Menambahkan item</h2>\r\n                            \r\n                                <p>Mengikuti pola MVVM membuatnya sangat mudah untuk bekerja dengan grafik objek yang dapat diubah seperti array dan hierarki. Anda memperbarui data yang mendasarinya, dan UI secara otomatis diperbarui secara sinkron.</p>\r\n                            \r\n                                <h3>Menambahkan seat reservation</h3>\r\n                            \r\n                                <p>Tambahkan tombol ke tampilan Anda, menggunakan binding click untuk mengaitkan kliknya dengan fungsi pada viewmodel anda:</p>\r\n                            \r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: addSeat\"</span>&gt;</span>Reserve another seat<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n                            </code></pre>\r\n                            \r\n                                <p>kemudian implementasi fungsi addSeat, membuatnya mendorong entri tambahan ke dalam array <code>seats</code>:</p>\r\n                            \r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">ReservationsViewModel</span><span class=\"params\">()</span> {</span>\r\n                                <span class=\"comment\">// ... leave all the rest unchanged ...</span>\r\n                            \r\n                                <span class=\"comment\">// Operations</span>\r\n                                self.addSeat = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n                                    self.seats.push(<span class=\"keyword\">new</span> SeatReservation(<span class=\"string\">\"\"</span>, self.availableMeals[<span class=\"number\">0</span>]));\r\n                                }\r\n                            }\r\n                            </code></pre>\r\n                            \r\n                                <p>Cobalah - sekarang ketika Anda mengklik \"Reserve seat\", UI diperbarui agar sesuai. Ini karena <code>seats</code> adalah observable array, jadi menambahkan atau menghapus item akan memicu pembaruan UI secara otomatis.\r\n</p>\r\n                            \r\n                                <p>Perhatikan bahwa menambahkan baris <em>tidak</em> melibatkan pembuatan ulang seluruh UI. Untuk efisiensi, Knockout melacak apa yang telah berubah di model tampilan Anda, dan melakukan serangkaian pembaruan DOM minimal untuk dicocokkan. Ini berarti Anda dapat meningkatkan hingga UI yang sangat besar atau canggih, dan dapat tetap tajam dan responsif bahkan pada perangkat seluler kelas bawah.</p>', 2, 1, 1, '2022-09-22 09:15:25', 1, '2022-09-26 11:18:59', 1, 5, 27),
(30, 'Working with list and collection', '<h2>Membuat data dapat diedit</h2>\r\n\r\n                                <p>Anda bisa menggunakan binding di dalam block <code>foreach</code> sama seperti di tempat lain, jadi cukup mudah untuk mengupgrade apa yang kita miliki menjadi editor data lengkap. Perbarui tampilan Anda:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: seats\"</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n                                <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: name\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n                                <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">select</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"options: $root.availableMeals, value: meal, optionsText: \'mealName\'\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">select</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n                                <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: meal().price\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>    \r\n                        <span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n                        </code></pre>\r\n\r\n                                <p>Kode ini menggunakan dua binding baru, <code>options</code> dan <code>optionsText</code>, yang bersama-sama mengontrol kumpulan item yang tersedia dalam daftar dropdown, dan properti objek mana ((dalam hal ini, <code>mealName</code>) yang digunakan untuk mewakili setiap item di layar.</p>\r\n                                <p>Cobalah - sekarang Anda dapat memilih dari makanan yang tersedia, dan hal itu akan menyebabkan baris yang sesuai (hanya) di-refresh untuk menampilkan harga makanan tersebut.</p>\r\n\r\n                                <h2>Memformat harga</h2>\r\n\r\n                                <p>Kami memiliki representasi berorientasi objek yang bagus dari data kami, sehingga kami dapat dengan mudah menambahkan properti dan fungsi tambahan di mana saja di grafik objek. Mari berikan kelas <code>SeatReservation</code> kemampuan untuk memformat data harganya sendiri menggunakan beberapa logika khusus.\r\n</p>\r\n\r\n                                <p>Karena harga yang diformat akan dihitung berdasarkan makanan yang dipilih, kami dapat mewakilinya menggunakan <code>ko.computed</code> (sehingga akan diperbarui secara otomatis setiap kali pilihan makanan berubah):</p>\r\n\r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">SeatReservation</span><span class=\"params\">(name, initialMeal)</span> {</span>\r\n                            <span class=\"keyword\">var</span> self = <span class=\"keyword\">this</span>;\r\n                            self.name = name;\r\n                            self.meal = ko.observable(initialMeal);\r\n                        \r\n                            self.formattedPrice = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n                                <span class=\"keyword\">var</span> price = self.meal().price;\r\n                                <span class=\"keyword\">return</span> price ? <span class=\"string\">\"$\"</span> + price.toFixed(<span class=\"number\">2</span>) : <span class=\"string\">\"None\"</span>;        \r\n                            });\r\n                        }\r\n                        </code></pre>\r\n\r\n                                <p>Sekarang Anda dapat memperbarui tampilan untuk menggunakan <code>formattedPrice</code> pada setiap instance <code>SeatReservation</code>:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: name\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">select</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"options: $root.availableMeals, value: meal, optionsText: \'mealName\'\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">select</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                            <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: <span class=\"highlight\">formattedPrice</span>\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n                        <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>\r\n                        </code></pre>', 3, 1, 1, '2022-09-22 09:31:34', 1, '2022-09-26 11:19:00', 1, 5, 27),
(31, 'Working with list and collection', '<h2>Menghapus item dan menunjukkan total biaya tambahan</h2>\r\n\r\n                                <p>Karena Anda dapat menambahkan item, Anda juga harus dapat menghapusnya, bukan? Seperti yang Anda harapkan, ini hanyalah masalah memperbarui data yang mendasarinya.</p>\r\n\r\n                                <p>Perbarui tampilan Anda sehingga menampilkan tautan \"remove\" di sebelah setiap item:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: name\"</span> /&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">select</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"options: $root.availableMeals, value: meal, optionsText: \'mealName\'\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">select</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: formattedPrice\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n    <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span>&gt;</span><span class=\"tag\">&lt;<span class=\"title\">a</span> <span class=\"attribute\">href</span>=<span class=\"value\">\"#\"</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: $root.removeSeat\"</span>&gt;</span>Remove<span class=\"tag\">&lt;/<span class=\"title\">a</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>         \r\n</code></pre>\r\n\r\n                                <p>Perhatikan bahwa <code>$root.</code> prefix menyebabkan Knockout mencari handler <code>removeSeat</code> removeSeat pada model tampilan tingkat atas Anda alih-alih pada instance <code>SeatReservation</code> yang terikat --- itu adalah tempat yang lebih baik untuk menempatkan <code>removeSeat</code> dalam contoh ini. Jadi, tambahkan fungsi <code>removeSeat</code> yang sesuai ke kelas root viewmodel Anda, <code>ReservationsViewModel</code>:</p>\r\n\r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">ReservationsViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave the rest unchanged ...</span>\r\n\r\n    <span class=\"comment\">// Operations</span>\r\n    self.addSeat = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> <span class=\"comment\">/* ... leave unchanged ... */</span> }\r\n    <span class=\"highlight\">self.removeSeat = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(seat)</span> {</span> self.seats.remove(seat) }</span>\r\n}    \r\n</code></pre>\r\n\r\n                                <p>Sekarang jika anda jalankan aplikasinya, anda akan dapat menghapus dan menambahkan item.</p>\r\n\r\n                                <h3>Menampilkan total biaya</h3>\r\n\r\n                                <p>Akan menyenangkan untuk memberi tahu pelanggan berapa yang akan mereka bayar, bukan? Tidak mengherankan, kita dapat mendefinisikan total sebagai <em>computed property</em>, dan membiarkan kerangka kerja mengetahui kapan harus menghitung ulang dan menyegarkan tampilan.</p>\r\n\r\n                                <p>Tambahkan properti <code>ko.computed</code> berikut di dalam <code>ReservationsViewModel</code>:</p>\r\n\r\n                                <pre><code class=\"javascript\" data-result=\"[object Object]\">self.totalSurcharge = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n   <span class=\"keyword\">var</span> total = <span class=\"number\">0</span>;\r\n   <span class=\"keyword\">for</span> (<span class=\"keyword\">var</span> i = <span class=\"number\">0</span>; i &lt; self.seats().length; i++)\r\n       total += self.seats()[i].meal().price;\r\n   <span class=\"keyword\">return</span> total;\r\n});\r\n</code></pre>\r\n\r\n                                <p>Sekali lagi, perhatikan bahwa karena <code>seats</code> dan <code>meal</code> keduanya adalah observables, kami memanggilnya sebagai fungsi untuk membaca nilainya saat ini ((mis., <code>self.seats().length</code>).</p>\r\n\r\n                                <p>Tampilkan total biaya tambahan dengan menambahkan elemen <code>&lt;h3&gt;</code> berikut ke bagian bawah tampilan Anda:\r\n</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">h3</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"visible: totalSurcharge() &gt; 0\"</span>&gt;</span>\r\n    Total surcharge: $<span class=\"tag\">&lt;<span class=\"title\">span</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: totalSurcharge().toFixed(2)\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">span</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">h3</span>&gt;</span>\r\n</code></pre>\r\n\r\n                                <p>Cuplikan ini menunjukkan dua poin baru:</p>\r\n\r\n                                <ul>\r\n                                    <li><code>visible</code> binding membuat elemen terlihat atau tidak terlihat saat data Anda berubah (secara internal, ini mengubah gaya tampilan CSS elemen). Dalam hal ini, kami memilih untuk menampilkan informasi \"biaya tambahan   total\" hanya jika lebih besar dari nol.</li>\r\n                                    <li>Anda dapat menggunakan <strong>ekspresi JavaScript arbitrer</strong> di dalam binding deklaratif. Di sini, kami menggunakan <code>totalSurcharge() &gt; 0</code> dan\r\n                                        <code>totalSurcharge().toFixed(2)</code>. Secara internal, ini sebenarnya mendefinisikan properti   yang dihitung untuk mewakili output dari ekspresi itu. Ini hanya alternatif sintaksis yang sangat ringan dan   nyaman.                                    </li>\r\n                                </ul>\r\n\r\n                                <p>Sekarang jika Anda menjalankan kode, Anda akan melihat \"biaya tambahan total\" muncul dan menghilang sebagaimana mestinya, dan berkat pelacakan ketergantungan, ia tahu kapan harus menghitung ulang nilainya sendiri — Anda tidak perlu memasukkan kode apa pun di \"tambah\" Anda atau fungsi \"hapus\" untuk memaksa dependensi memperbarui secara manual.</p>', 4, 1, 1, '2022-09-22 09:32:07', 1, '2022-09-26 11:19:02', 1, 5, 27),
(32, 'Working with list and collection', '<h2>Tips terakhir</h2>\r\n\r\n                                <p>Setelah mengikuti pola MVVM dan mendapatkan representasi berorientasi objek dari data dan perilaku UI, Anda berada dalam posisi yang bagus untuk menggunakan behavior ekstra dengan cara yang nyaman.</p>\r\n\r\n                                <p>Misalnya, jika Anda diminta untuk menampilkan jumlah total kursi yang dipesan, Anda dapat menerapkannya hanya di satu tempat, dan Anda tidak perlu menulis kode tambahan untuk memperbarui jumlah kursi saat Anda menambah atau menghapus item. Cukup perbarui <code>&lt;h2&gt;</code> \r\ndi bagian atas tampilan Anda:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\" data-second_best=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">h2</span>&gt;</span>Your seat reservations <span class=\"highlight\">(<span class=\"tag\">&lt;<span class=\"title\">span</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: seats().length\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">span</span>&gt;</span>)</span><span class=\"tag\">&lt;/<span class=\"title\">h2</span>&gt;</span>\r\n</code></pre>\r\n\r\n                                <p>Trivial.</p>\r\n\r\n                                <p>Mirip, jika anda diminta untuk menaruh limit pada jumlah kursi yang dapat di pesan, katakanlah, Anda dapat membuat UI menyatakannya dengan menggunakan <code>enable</code> binding:</p>\r\n\r\n                                <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: addSeat<span class=\"highlight\">, enable: seats().length &lt; 5</span>\"</span>&gt;</span>Reserve another seat<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n                                <p>Tombol akan dinonaktifkan ketika batas kursi tercapai. Anda tidak perlu menulis kode apa pun untuk mengaktifkannya kembali saat pengguna menghapus beberapa kursi (mengacaukan logika \"hapus\" Anda), karena ekspresi akan secara otomatis dievaluasi ulang oleh Knockout saat data terkait berubah.</p>\r\n\r\n                                <p>Jika Anda ingin mempelajari cara menyimpan kembali data yang diperbarui ke server, lihat tutorial Memuat dan Menyimpan Data.</p>', 5, 1, 1, '2022-09-22 09:32:38', 1, '2022-09-26 11:19:04', 1, 5, 27),
(33, 'Create custom binding', 'Belajar membuat custom binding', 3, 0, 1, '2022-09-22 10:23:19', 1, '2022-09-26 11:17:39', 1, 5, NULL),
(34, 'Create custom binding', '<h2>Membuat binding khusus</h2>\r\n\r\n<p>Dalam interpretasi Knockout tentang MVVM, <em>bindings</em> adalah yang menyatukan tampilan dan viewmodel Anda. Binding adalah perantara; mereka melakukan pembaruan di kedua arah:</p>\r\n\r\n<ul>\r\n    <li>Binding melihat <strong>perubahan viewmodel</strong> dan memperbarui <strong>tampilan DOM</strong></li>\r\n    <li>Binding menangkap <strong>event DOM</strong> dan memperbarui <strong>properti viewmodel</strong></li>\r\n</ul>\r\n\r\n<p>Knockout memiliki kumpulan binding bawaan yang fleksibel dan komprehensif (misalnya, text, click, foreach), tetapi tidak berhenti di situ - Anda dapat membuat binding khusus hanya dalam beberapa baris kode. Dalam aplikasi realistis apa pun, Anda akan merasa manfaat merangkum pola UI umum di dalam binding, sehingga pola tersebut dapat digunakan kembali dengan mudah di banyak tempat. Misalnya, situs web ini menggunakan custom binding untuk merangkum pendekatannya terhadap dialog, panel yang dapat diseret, editor kode, dan bahkan untuk merender teks yang Anda baca.\r\n</p>\r\n\r\n<h3>Oke, mari kita buat sendiri</h3>\r\n\r\n<p>Anda sudah mendapatkan beberapa kode yang mewakili halaman survei yang tidak menarik tetapi berfungsi. Cobalah menggunakannya. Sekarang mari kita tingkatkan tampilan dan nuansa dalam tiga cara:</p>\r\n\r\n<ul>\r\n    <li>... dengan transisi animasi pada peringatan \"<em>Anda telah menggunakan terlalu banyak poin</em>\"</li>\r\n    <li>... dengan gaya yang ditingkatkan pada tombol Selesai</li>\r\n    <li>... dengan tampilan peringkat bintang yang menyenangkan untuk digunakan untuk menetapkan poin, alih-alih daftar drop-down yang mengganggu</li>\r\n</ul>', 1, 1, 1, '2022-09-22 10:24:42', 1, '2022-09-26 11:19:07', 1, 5, 33);
INSERT INTO `course_module` (`id`, `name`, `description`, `priority`, `level`, `status`, `created_at`, `created_id`, `updated_at`, `updated_id`, `id_course`, `id_course_module_parent`) VALUES
(35, 'Create custom binding', '<h2>Menerapkan transisi animasi</h2>\r\n\r\n<p>Ketika pengunjung memberikan terlalu banyak poin, peringatan \"<em>You\'ve used too many points</em>\" akan langsung terlihat, karena tampilannya dikontrol menggunakan <code>visible</code> binding.\r\n    Jika Anda ingin membuatnya memudar masuk dan keluar dengan lancar, Anda bisa menulis custom binding yang cepat dan dapat digunakan kembali yang secara internal menggunakan fungsi <code>fade</code> jQuery untuk mengimplementasikan animasi.</p>\r\n\r\n<p>Anda dapat menentukan binding khusus dengan menetapkan properti baru ke objek <code>ko.bindingHandlers</code>. Properti Anda dapat mengekspos dua fungsi panggilan balik:</p>\r\n\r\n<ul>\r\n    <li><code>init</code>, untuk dipanggil saat binding pertama kali terjadi (berguna untuk mengatur status awal atau mendaftarkan event handler)</li>\r\n    <li><code>update</code>, untuk dipanggil setiap kali data terkait diperbarui (sehingga Anda dapat memperbarui DOM agar sesuai)</li>\r\n</ul>\r\n\r\n<p>Mulai tentukan binding <code>fadeVisible</code> dengan menambahkan kode berikut di bagian atas panel viewmodel:</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.fadeVisible = {\r\n    update: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"comment\">// On update, fade in/out</span>\r\n        <span class=\"keyword\">var</span> shouldDisplay = valueAccessor();\r\n        shouldDisplay ? $(element).fadeIn() : $(element).fadeOut();\r\n    }\r\n};\r\n</code></pre>\r\n\r\n<p>Seperti yang Anda lihat, <code>update</code> handler diberikan elemen yang terikat padanya, dan fungsi yang mengembalikan nilai saat ini dari data terkait. Berdasarkan nilai saat ini, Anda dapat menggunakan jQuery untuk memudarkan elemen masuk atau keluar.</p>\r\n\r\n<p>Untuk menggunakan custom binding Anda, cukup ubah peringatan \"<em>You\'ve used too many points</em>\" sehingga menggunakan <code>fadeVisible</code> alih-alih <code>visible</code>:</p>\r\n\r\n<pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">h3</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"<span class=\"highlight\">fadeVisible</span>: pointsUsed() &gt; pointsBudget\"</span>&gt;</span>You\'ve used too many points! Please remove some.<span class=\"tag\">&lt;/<span class=\"title\">h3</span>&gt;</span>\r\n</code></pre>\r\n\r\n<p>Coba jalankan - behavior sudah hampir sempurna. Peringatan akan memudar masuk dan keluar dengan lancar sesuai kebutuhan.</p>\r\n\r\n<h2>Mengatur status awal elemen</h2>\r\n\r\n<p>Ada satu hal yang tidak beres: saat halaman pertama kali dimuat, peringatan tersebut untuk sementara mulai terlihat dan segera menghilang (klik Jalankan beberapa kali jika Anda perlu melihatnya terjadi). Anda harus menggunakan <code>handler</code> untuk memastikan status awal elemen cocok dengan data viewmodel awal.</p>\r\n\r\n<p>Itu cukup mudah - tambahkan <code>init</code> handler ke custom binding Anda:</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.fadeVisible = {\r\n    init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"comment\">// Start visible/invisible according to initial value</span>\r\n        <span class=\"keyword\">var</span> shouldDisplay = valueAccessor();\r\n        $(element).toggle(shouldDisplay);\r\n    },\r\n    update: <span class=\"comment\">// ... leave the \"update\" handler unchanged ...</span>\r\n};\r\n</code></pre>\r\n\r\n<p>Itu memperbaikinya! Sekarang animasi hanya terjadi ketika viewmodel berubah.</p>\r\n\r\n<p>Membuat binding <code>fadeVisible</code> mungkin tampak seperti sedikit pekerjaan, tetapi ini adalah kode yang sepenuhnya dapat digunakan kembali, sehingga Anda dapat menyimpannya dalam file JavaScript \"bindings\" yang terpisah dan kemudian menggunakannya sebagai pengganti <code>visible</code> di mana saja di aplikasi Anda.</p>\r\n', 2, 1, 1, '2022-09-22 10:26:10', 1, '2022-09-26 11:19:09', 1, 5, 33),
(36, 'Create custom binding', '<h2>Mengintegrasikan dengan komponen pihak ketiga</h2>\r\n\r\n<p>Jika Anda ingin tampilan Anda berisi komponen dari library JavaScript eksternal (misalnya, jQuery UI atau YUI) dan mengikatnya ke properti viewmodel, teknik termudah adalah membuat custom binding. binding Anda akan menjadi perantara antara viewmodel Anda dan komponen pihak ketiga.</p>\r\n\r\n<p>Sebagai contoh, mari gunakan <a href=\"http://jqueryui.com/demos/button/\">widget \"Button\" jQuery UI</a> untuk meningkatkan tampilan dan nuansa tombol \"Finished\".</p>\r\n\r\n<p>Memulai cukup mudah. Definisikan <code>jqButton</code> binding dengan menambahkan kode berikut di bagian atas panel viewmodel:</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.jqButton = {\r\n    init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element)</span> {</span>\r\n       $(element).button(); <span class=\"comment\">// Turns the element into a jQuery UI button</span>\r\n    }\r\n};\r\n</code></pre>\r\n\r\n<p>Untuk menggunakan binding, perbarui tombol \"<em>Finished</em>\" di view:</p>\r\n\r\n<pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"<span class=\"highlight\">jqButton: true,</span> enable: pointsUsed() &lt;= pointsBudget, click: save\"</span>&gt;</span>Finished<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n<p>Cobalah - ini sudah cukup berhasil. Tampilan tombol ditingkatkan, dan mengkliknya masih berfungsi sama</p>\r\n\r\n<h3>Toggling status \"disabled\" tombol</h3>\r\n\r\n<p>Tombol Anda tidak lagi terlihat dinonaktifkan ketika pengunjung telah melebihi anggaran poin mereka. <code>enable</code>\r\n    binding tidak berfungsi secara langsung dengan tombol UI jQuery, karena tombol UI jQuery tidak secara otomatis merespons atribut \"<code>disabled</code>\" HTML biasa. Sebagai gantinya, tombol jQuery UI memiliki API khusus untuk mengontrol tampilan yang enabled/disabled\r\n</p>\r\n\r\n<p>Itu tidak masalah: Anda dapat menggunakan <code>update</code> handler untuk memberi tahu tombol kapan harus mengaktifkan/menonaktifkan sendiri:\r\n</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.jqButton = {\r\n    init: <span class=\"comment\">/* ... leave \"init\" unchanged ... */</span>,\r\n    update: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"keyword\">var</span> currentValue = valueAccessor();\r\n        <span class=\"comment\">// Here we just update the \"disabled\" state, but you could update other properties too</span>\r\n        $(element).button(<span class=\"string\">\"option\"</span>, <span class=\"string\">\"disabled\"</span>, currentValue.enable === <span class=\"literal\">false</span>);\r\n    }\r\n};\r\n</code></pre>\r\n\r\n<p>Untuk menggunakan ini, perbarui tombol \"<em>Finished</em>\" sehingga Anda meneruskan properti <code>enable</code> ke dalam <code>jqButton</code> binding:</p>\r\n\r\n<pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"<span class=\"highlight\">jqButton: { enable: pointsUsed() &lt;= pointsBudget }</span>, click: save\"</span>&gt;</span>Finished<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n<p>Sekarang tombol akan terlihat abu-abu jika pengunjung melebihi anggaran poin mereka.</p>\r\n\r\n<p>Sekali lagi, <code>jqButton</code> binding dapat digunakan kembali pada tombol mana saja di aplikasi Anda, memungkinkan Anda secara deklaratif mengaitkan status tombol yang enabled/disabled dengan kondisi model tampilan apa pun. Anda juga dapat meningkatkan pengikatan untuk mengontrol secara deklaratif properti tombol UI jQuery lainnya juga, seperti ikon mana yang muncul di tombol.\r\n</p>\r\n', 3, 1, 1, '2022-09-22 10:26:35', 1, '2022-09-26 11:19:11', 1, 5, 33),
(37, 'Create custom binding', '    <h2>Menerapkan widget khusus</h2>\r\n\r\n    <p>Untuk menyelesaikan tutorial ini, mari lakukan sesuatu yang sedikit lebih menarik. Mari kita ganti dropdown \"importance\" dengan sistem peringkat bintang yang lebih baik untuk digunakan. Anda dapat melakukan ini hanya dalam beberapa baris kode dengan membuat binding untuk membungkus widget peringkat bintang yang ada (contoh) tetapi demi pembelajaran, mari kita buat sepenuhnya dari awal.\r\n    </p>\r\n\r\n    <p>Untuk memulai, tentukan pengikatan <code>starRating</code> dengan menambahkan yang berikut ini ke bagian atas panel viewmodel:\r\n    </p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\" data-second_best=\"[object Object]\">ko.bindingHandlers.starRating = {\r\n    init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        $(element).addClass(<span class=\"string\">\"starRating\"</span>);\r\n        <span class=\"keyword\">for</span> (<span class=\"keyword\">var</span> i = <span class=\"number\">0</span>; i &lt; <span class=\"number\">5</span>; i++)\r\n           $(<span class=\"string\">\"&lt;span&gt;\"</span>).appendTo(element);\r\n    }\r\n};\r\n</code></pre>\r\n\r\n    <p>Kode ini hanya menyisipkan serangkaian element <code>&lt;span&gt;</code> Sudah ada beberapa CSS yang disiapkan untuk Anda tampilkan sebagai bintang. Untuk menggunakannya, perbarui tampilan Anda, singkirkan <code>&lt;select&gt;</code> dropdowns:</p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">tbody</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"foreach: answers\"</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">tr</span>&gt;</span>\r\n        <span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"text: answerText\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span>\r\n        <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">td</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"starRating: points\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">td</span>&gt;</span></span>\r\n    <span class=\"tag\">&lt;/<span class=\"title\">tr</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">tbody</span>&gt;</span>\r\n</code></pre>\r\n\r\n    <h3>Menampilkan rating saat ini</h3>\r\n\r\n    <p>Anda ingin peringkat bintang diperbarui secara otomatis setiap kali data model tampilan yang mendasarinya berubah, sehingga Anda dapat menggunakan <code>update</code> handler untuk menetapkan kelas CSS yang sesuai bergantung pada data saat ini:\r\n    </p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">ko.bindingHandlers.starRating = {\r\n    init: <span class=\"comment\">/* ... leave \"init\" unchanged ... */</span>,\r\n    update: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n        <span class=\"comment\">// Give the first x stars the \"chosen\" class, where x &lt;= rating</span>\r\n        <span class=\"keyword\">var</span> observable = valueAccessor();\r\n        $(<span class=\"string\">\"span\"</span>, element).each(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(index)</span> {</span>\r\n            $(<span class=\"keyword\">this</span>).toggleClass(<span class=\"string\">\"chosen\"</span>, index &lt; observable());\r\n        });\r\n    }\r\n};\r\n</code></pre>\r\n\r\n    <p>Karena alokasi poin awal semuanya 1, Anda harus mendapatkan satu bintang yang disorot untuk setiap jawaban.</p>\r\n\r\n    <h3>Highlighting saat mouse hover</h3>\r\n\r\n    <p>Saat pengunjung mengarahkan mouse ke bintang, ada baiknya untuk menyorot bintang yang akan mereka pilih. Status \"highlight\" tidak benar-benar perlu ditautkan ke model tampilan karena Anda tidak menyimpan data itu dengan cara apa pun, jadi opsi termudah adalah mengontrol highlighting dengan beberapa kode jQuery mentah.</p>\r\n\r\n    <p>Anda dapat menggunakan fungsi <code>hover</code> jQuery untuk menangkap acara hover-in dan hover-out, mengatur kelas CSS yang sesuai pada bintang yang terpengaruh:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">init: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(element, valueAccessor)</span> {</span>\r\n    <span class=\"comment\">// ... leave existing code unchanged ... </span>\r\n\r\n    <span class=\"comment\">// Handle mouse events on the stars</span>\r\n    $(<span class=\"string\">\"span\"</span>, element).each(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(index)</span> {</span>\r\n        $(<span class=\"keyword\">this</span>).hover(\r\n            <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).addClass(<span class=\"string\">\"hoverChosen\"</span>) },\r\n            <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).removeClass(<span class=\"string\">\"hoverChosen\"</span>) }\r\n        );\r\n    });\r\n},\r\n</code></pre>\r\n\r\n    <p>Sekarang saat Anda menggerakkan mouse, Anda akan melihat bintang-bintang menyala.</p>\r\n\r\n    <h3>Menulis data kembali ke viewmodel</h3>\r\n\r\n    <p>Saat pengunjung mengeklik bintang, Anda ingin menyimpan peringkat mereka yang diperbarui dalam model tampilan yang mendasarinya, sehingga UI lainnya dapat diupdate secara otomatis. Ini cukup mudah dilakukan: gunakan <code>click</code> fucntion jQuery untuk menangkap click tersebut:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"comment\">// Handle mouse events on the stars</span>\r\n$(<span class=\"string\">\"span\"</span>, element).each(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(index)</span> {</span>\r\n    $(<span class=\"keyword\">this</span>).hover(\r\n        <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).addClass(<span class=\"string\">\"hoverChosen\"</span>) },\r\n        <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> $(<span class=\"keyword\">this</span>).prevAll().add(<span class=\"keyword\">this</span>).removeClass(<span class=\"string\">\"hoverChosen\"</span>) }\r\n    )<span class=\"highlight\">.click(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span> </span>\r\n    <span class=\"highlight\">   <span class=\"keyword\">var</span> observable = valueAccessor(); </span> <span class=\"comment\">// Get the associated observable</span>\r\n    <span class=\"highlight\">   observable(index+<span class=\"number\">1</span>);              </span> <span class=\"comment\">// Write the new rating to it</span>\r\n    <span class=\"highlight\"> }); </span>\r\n});\r\n</code></pre>\r\n\r\n    <p>Cobalah - sistem peringkat bintang Anda sekarang harus berfungsi penuh! UI sekarang semua pembaruan sinkron dengan peringkat pengunjung.</p>\r\n\r\n    <h3>Ringkasan</h3>\r\n\r\n    <p><code>starRating</code> binding sama rumitnya dengan ikatan yang biasanya didapat. Ini menggambarkan bagaimana binding sering kali menjadi tempat kode Anda turun di bawah lapisan MVVM deklaratif yang berorientasi objek dengan baik dan ke dalam lapisan manipulasi DOM tingkat rendah yang lebih mentah untuk membuat pembaruan UI yang diperlukan. Apakah ini nyaman dan mudah bagi Anda atau tidak tergantung pada keahlian Anda dengan jQuery atau perpustakaan DOM lainnya ...</p>\r\n\r\n    <p>Seperti biasa, <code>starRating</code> benar-benar dapat digunakan kembali di mana saja di aplikasi Anda di mana Anda ingin menampilkan properti model tampilan numerik karena beberapa bintang di layar, secara otomatis menyegarkan tampilan setiap kali data model tampilan berubah. Ini dengan rapi memisahkan bisnis menampilkan bintang dari logika model tampilan apa pun yang berkaitan dengan pilihan pengunjung.\r\n    </p>\r\n', 4, 1, 1, '2022-09-22 11:00:42', 1, '2022-09-26 11:19:13', 1, 5, 33),
(38, 'Loading and saving data', 'Belajar bagaimana load dan save data di knockout.js', 4, 0, 1, '2022-09-22 11:02:05', 1, '2022-09-26 11:17:42', 1, 5, NULL),
(39, 'Loading and saving data', '<h2>Memuat dan menyimpan data</h2>\r\n\r\n<p>Sekarang, Anda telah memiliki pemahaman yang baik tentang bagaimana pola MVVM membantu Anda mengatur kode sisi klien dengan rapi untuk UI dinamis, dan bagaimana\r\n    Knockout\'s <em>observables</em>, <em>bindings</em>, and <em>dependency tracking</em> membuatnya bekerja. Di hampir semua aplikasi web, Anda juga perlu mendapatkan data dari server, dan mengirim kembali data yang dimodifikasi.\r\n</p>\r\n\r\n<p>Karena Knockout adalah perpustakaan sisi klien murni, ia memiliki fleksibilitas untuk bekerja dengan teknologi sisi server apa pun (mis., ASP.NET, Rails, PHP, dll.), dan pola arsitektur apa pun, basis data, apa pun. Selama kode sisi server Anda dapat mengirim dan menerima data JSON — tugas sepele untuk teknologi web yang setengah-layak — Anda akan dapat menggunakan teknik yang ditunjukkan dalam tutorial ini.\r\n</p>\r\n\r\n<h3>Skenario untuk tutorial ini</h3>\r\n\r\n<p>Semua perpustakaan JavaScript diwajibkan secara hukum untuk menawarkan contoh \"daftar tugas\" (catatan: itu lelucon) jadi ini dia. Luangkan waktu sejenak untuk memainkannya - tambahkan dan hapus beberapa tugas - dan baca kode untuk memahami cara kerjanya. Ini cukup mendasar dan dapat diprediksi. Selanjutnya, Anda akan memuat beberapa daftar tugas awal dari server, dan kemudian melihat dua cara berbeda untuk menyimpan data yang dimodifikasi kembali ke server\r\n</p>\r\n', 1, 1, 1, '2022-09-22 11:06:24', 1, '2022-09-26 11:19:16', 1, 5, 38),
(40, 'Loading and saving data', '<h2>Memuat data dari server</h2>\r\n\r\n<p>Cara termudah untuk mendapatkan data JSON dari server adalah dengan membuat permintaan Ajax. Dalam tutorial ini, Anda akan menggunakan fungsi <code>$.getJSON</code> and <code>$.ajax</code> jQuery\r\n    untuk melakukannya. Setelah Anda mendapatkan datanya, Anda dapat menggunakannya untuk memperbarui model tampilan Anda, dan membiarkan UI memperbarui dirinya sendiri secara otomatis.\r\n</p>\r\n\r\n<p>Di server ini, ada beberapa kode yang menangani permintaan ke URL <code>/tasks</code>, dan merespons dengan data JSON. Tambahkan kode ke akhir <code>TaskListViewModel</code>\r\n    untuk meminta data tersebut dan menggunakannya untuk mengisi array <code>tasks</code>:\r\n</p>\r\n\r\n<pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">TaskListViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave the existing code unchanged ...</span>\r\n\r\n    <span class=\"comment\">// Load initial state from server, convert it to Task instances, then populate self.tasks</span>\r\n    $.getJSON(<span class=\"string\">\"/tasks\"</span>, <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(allData)</span> {</span>\r\n        <span class=\"keyword\">var</span> mappedTasks = $.map(allData, <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(item)</span> {</span> <span class=\"keyword\">return</span> <span class=\"keyword\">new</span> Task(item) });\r\n        self.tasks(mappedTasks);\r\n    });\r\n}\r\n</code></pre>\r\n\r\n<p><em><strong>Catatan penting!</strong> Perhatikan bahwa Anda <strong>tidak</strong> memanggil <code>ko.applyBindings</code> setelah memuat data. Banyak pendatang baru Knockout membuat kesalahan dengan mencoba mengikat ulang UI tmereka setiap kali mereka memuat beberapa data, tetapi itu tidak berguna. Tidak ada alasan untuk mengikat ulang - cukup memperbarui model tampilan yang ada sudah cukup untuk membuat seluruh UI diperbarui.\r\n    </em></p>\r\n\r\n<p>Kode ini mengambil data mentah array yang dikembalikan oleh server dan menggunakan helper jQuery <code>$.map</code> untuk membuat instance <code>Task</code> dari setiap entri mentah. Hasil array objek <code>Task</code> kemudia didorong ke dalam array <code>tasks</code>, yang menyebabkan UI diperbarui karena dia observables.</p>\r\n\r\n', 2, 1, 1, '2022-09-22 11:06:24', 1, '2022-09-26 11:19:17', 1, 5, 38),
(41, 'Loading and saving data', '\r\n    <h2>Mengirim data kembali ke server: metode 1</h2>\r\n\r\n    <p>Tentu saja, Anda juga dapat menggunakan permintaan Ajax untuk mengirim data kembali ke server.\r\n        Tetapi sebelum kita sampai pada itu, ada alternatif yang mungkin lebih sederhana untuk dipertimbangkan.</p>\r\n\r\n    <p>Jika Anda memiliki beberapa representasi data model Anda di dalam <code>&lt;form&gt;</code>, HTML biasa, maka Anda cukup membiarkan pengguna memposting formulir itu ke server Anda.\r\n        Ini sangat mudah untuk dilakukan. Misalnya, tambahkan markup formulir berikut di bagian bawah tampilan Anda:</p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">form</span> <span class=\"attribute\">action</span>=<span class=\"value\">\"/tasks/saveform\"</span> <span class=\"attribute\">method</span>=<span class=\"value\">\"post\"</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">textarea</span> <span class=\"attribute\">name</span>=<span class=\"value\">\"tasks\"</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: ko.toJSON(tasks)\"</span>&gt;</span><span class=\"tag\">&lt;/<span class=\"title\">textarea</span>&gt;</span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">type</span>=<span class=\"value\">\"submit\"</span>&gt;</span>Save<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">form</span>&gt;</span>\r\n</code></pre>\r\n\r\n    <p>Cuplikan ini menggunakan <code>&lt;textarea&gt;</code> agar Anda dapat melihat apa yang terjadi di balik layar. Cobalah: saat pengunjung mengedit data di UI, pelacakan ketergantungan akan menyebabkan representasi JSON di area teks diperbarui secara otomatis. Saat pengunjung mengirimkan formulir, kode sisi server Anda akan menerima data JSON tersebut.\r\n    </p>\r\n\r\n    <p>Anda tidak benar-benar ingin menampilkan <code>&lt;textarea&gt;</code> yang terlihat kepada pengunjung sebenarnya, jadi gantilah dengan kontrol input hidden:</p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">form</span> <span class=\"attribute\">action</span>=<span class=\"value\">\"/tasks/saveform\"</span> <span class=\"attribute\">method</span>=<span class=\"value\">\"post\"</span>&gt;</span>\r\n    <span class=\"highlight\"><span class=\"tag\">&lt;<span class=\"title\">input</span> <span class=\"attribute\">type</span>=<span class=\"value\">\"hidden\"</span> <span class=\"attribute\">name</span>=<span class=\"value\">\"tasks\"</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"value: ko.toJSON(tasks)\"</span> /&gt;</span></span>\r\n    <span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">type</span>=<span class=\"value\">\"submit\"</span>&gt;</span>Save<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n<span class=\"tag\">&lt;/<span class=\"title\">form</span>&gt;</span>\r\n</code></pre>\r\n\r\n', 3, 1, 1, '2022-09-22 11:06:24', 1, '2022-09-26 11:19:19', 1, 5, 38),
(42, 'Loading and saving data', '<div data-bind=\"markdown: currentTutorialStep() &amp;&amp; currentTutorialStep().Instructions\">\r\n    <h2>Mengirim data kembali ke server: metode 2</h2>\r\n\r\n    <p>Sebagai alternatif dari posting <code>&lt;form&gt;</code> HTML lengkap, Anda tentu saja dapat mengirim data model Anda ke server menggunakan request Ajax. misalnya,\r\n        <em>hapus</em> <code>&lt;form&gt;</code> yang baru saja Anda tambahkan di langkah sebelumnya, dan ganti dengan <code>&lt;button&gt;</code> sederhana:\r\n    </p>\r\n\r\n    <pre><code class=\"xml\" data-result=\"[object Object]\"><span class=\"tag\">&lt;<span class=\"title\">button</span> <span class=\"attribute\">data-bind</span>=<span class=\"value\">\"click: save\"</span>&gt;</span>Save<span class=\"tag\">&lt;/<span class=\"title\">button</span>&gt;</span>\r\n</code></pre>\r\n\r\n    <p>... lalu implementasikan <code>save</code> fungsi simpan dengan menambahkan fungsi tambahan ke <code>TaskListViewModel</code>:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\"><span class=\"function\"><span class=\"keyword\">function</span> <span class=\"title\">TaskListViewModel</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"comment\">// ... leave all the existing code unchanged ...  </span>\r\n\r\n    self.save = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n        $.ajax(<span class=\"string\">\"/tasks\"</span>, {\r\n            data: ko.toJSON({ tasks: self.tasks }),\r\n            type: <span class=\"string\">\"post\"</span>, contentType: <span class=\"string\">\"application/json\"</span>,\r\n            success: <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(result)</span> {</span> alert(result) }\r\n        });\r\n    };\r\n}\r\n</code></pre>\r\n\r\n    <p>Dalam contoh ini, <code>success</code> handler hanya <code>memberitahu</code> apa pun yang ditanggapi server, hanya agar Anda dapat melihat server benar-benar menerima dan memahami data. Dalam aplikasi nyata, Anda akan lebih cenderung menampilkan pesan flash \"tersimpan\" atau mengalihkan ke halaman lain.\r\n    </p>\r\n</div>\r\n', 4, 1, 1, '2022-09-22 11:06:24', 1, '2022-09-26 11:19:21', 1, 5, 38),
(43, 'Loading and saving data', '    <h2>Pelacakan penghapusan</h2>\r\n\r\n    <p>Jika pengguna telah menghapus beberapa data pada klien, bagaimana server tahu untuk menghapus catatan database yang sesuai? Salah satu kemungkinannya adalah server harus memeriksa kumpulan data yang masuk, membandingkannya dengan apa yang ada di database, dan menyimpulkan catatan mana yang dihapus. Tapi itu cukup canggung - jauh lebih baik jika klien mengirimkan data yang secara eksplisit menyatakan catatan mana yang dihapus.</p>\r\n\r\n    <p>Saat memanipulasi observable array, Anda dapat dengan mudah melacak penghapusan dengan menggunakan fungsi <code>destroy</code> untuk menghapus item.\r\n        Misalnya, perbarui fungsi <code>removeTask</code> anda:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">self.removeTask = <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(task)</span> {</span> self.tasks.<span class=\"highlight\">destroy</span>(task) };\r\n</code></pre>\r\n\r\n    <p>Apa fungsinya? Yah, itu tidak lagi benar-benar menghapus instansi <code>Task</code> dari <code>tasks</code> array - sebagai gantinya, itu hanya menambahkan properti <code>_destroy</code>\r\n        ke instance <code>Task</code> dengan nilai. <code>true</code>. Ini sama persis dengan konvensi Ruby on Rails menggunakan <code>_destroy</code> untuk menunjukkan bahwa item yang dikirimkan harus dihapus.\r\n        <code>foreach</code> binding mengetahui hal ini, dan tidak akan menampilkan item apa pun dengan nilai properti itu (itulah sebabnya item menghilang saat dihancurkan).\r\n    </p>\r\n\r\n    <h3>Bagaimana server menangani ini?</h3>\r\n\r\n    <p>Jika Anda menyimpan data sekarang, Anda akan melihat bahwa server masih menerima item yang dihancurkan, dan server dapat mengetahui item mana yang ingin Anda hapus\r\n        (karena mereka memiliki properti <code>_destroy</code> yang disetel ke <code>true</code>).</p>\r\n\r\n    <ul>\r\n        <li>Jika Anda menggunakan fitur parsing JSON otomatis di Rails, ActiveRecord akan mengetahui bahwa Anda ingin menghapus item terkait.</li>\r\n        <li>Untuk teknologi lain, Anda dapat menambahkan sedikit kode sisi server untuk menemukan <code>_destroy</code> dan menghapus item tersebut.</li>\r\n    </ul>\r\n\r\n    <p>Jika Anda ingin melihat lebih jelas data apa yang diterima server dalam contoh ini, coba ganti tombol \"Save\" dengan ajax dengan teknik form-HTML dari langkah 3 dalam tutorial ini.\r\n        .</p>\r\n\r\n    <h3>Hei, penghitung tugas saya tidak lagi berfungsi!</h3>\r\n\r\n    <p>Perhatikan bahwa keterangan \"<em>You have x incomplete task(s)</em>\" tidak lagi memfilter item yang dihapus, arena properti <code>incompleteTasks</code> computed\r\n        tidak mengetahui apa pun tentang flag <code>_destroy</code> Perbaiki ini dengan memfilter tugas yang dihancurkan:</p>\r\n\r\n    <pre><code class=\"javascript\" data-result=\"[object Object]\">self.incompleteTasks = ko.computed(<span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">()</span> {</span>\r\n    <span class=\"keyword\">return</span> ko.utils.arrayFilter(self.tasks(), <span class=\"function\"><span class=\"keyword\">function</span><span class=\"params\">(task)</span> {</span> <span class=\"keyword\">return</span> !task.isDone() <span class=\"highlight\">&amp;&amp; !task._destroy</span> });\r\n});\r\n</code></pre>\r\n\r\n    <p>Sekarang UI akan secara konsisten melihat <code>_destroy</code>ed tasks tidak ada, meskipun mereka masih dilacak secara internal.</p>\r\n', 5, 1, 1, '2022-09-22 11:06:24', 1, '2022-09-26 11:19:23', 1, 5, 38);

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
(1, 'Package 1', '', 2000000, 1, '2022-09-26 11:02:01', 1, '2022-09-26 11:02:01', 1),
(2, 'Package 2', '', 5000000, 1, '2022-09-26 11:02:35', 1, '2022-09-26 11:02:35', 1),
(3, 'Package 3', '', 25000000, 1, '2022-09-26 11:03:22', 1, '2022-09-26 11:03:22', 1);

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
(1, 'More than 60 total learning session (self and live learning)', '', 1, '2022-09-26 11:02:01', 1, '2022-09-26 11:02:01', 1, 1),
(2, 'Intensive career and softskill session', '', 1, '2022-09-26 11:02:01', 1, '2022-09-26 11:02:01', 1, 1),
(3, 'Unlimited learning access', '', 1, '2022-09-26 11:02:01', 1, '2022-09-26 11:02:01', 1, 1),
(4, 'More than 60 total learning session (self and live learning)', '', 1, '2022-09-26 11:02:35', 1, '2022-09-26 11:02:35', 1, 2),
(5, 'Intensive career and softskill session', '', 1, '2022-09-26 11:02:35', 1, '2022-09-26 11:02:35', 1, 2),
(6, 'Unlimited learning access', '', 1, '2022-09-26 11:02:35', 1, '2022-09-26 11:02:35', 1, 2),
(7, '4 Real-projects for your portfolio', '', 1, '2022-09-26 11:02:35', 1, '2022-09-26 11:02:35', 1, 2),
(8, 'More than 60 total learning session (self and live learning)', '', 1, '2022-09-26 11:03:22', 1, '2022-09-26 11:03:22', 1, 3),
(9, 'Intensive career and softskill session', '', 1, '2022-09-26 11:03:22', 1, '2022-09-26 11:03:22', 1, 3),
(10, 'Unlimited learning access', '', 1, '2022-09-26 11:03:22', 1, '2022-09-26 11:03:22', 1, 3),
(11, '4 Real-projects for your portfolio', '', 1, '2022-09-26 11:03:22', 1, '2022-09-26 11:03:22', 1, 3),
(12, 'Career Profiler Assessment', '', 1, '2022-09-26 11:03:22', 1, '2022-09-26 11:03:22', 1, 3),
(13, 'Lifetime Job-Connector services', '', 1, '2022-09-26 11:03:22', 1, '2022-09-26 11:03:22', 1, 3);

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
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

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
(1, 'Budi', 'budi@mail.com', '$2y$10$aUFJ6wrXFB7PE3Sc5yiYA.n.upAhU3lLGDy.OCKbYY/deifEpQocS', NULL, NULL, NULL, 1, '2022-09-26 04:21:34', '2022-09-26 04:21:34'),
(2, 'Hendra', 'hendra@mail.com', '$2y$10$fzRM8rnt4sxdobABBaafZemD4YbClQlsWVb15EnqcmLcgjDye8HnK', NULL, NULL, NULL, 1, '2022-09-26 04:27:02', '2022-09-26 04:27:02'),
(3, 'Jess', 'jess@mail.com', '$2y$10$1O1jN.14dAc/KXwakFtnaOUohX6IaXx7qHe./jtyIbkjGo2YxLgoq', NULL, NULL, NULL, 1, '2022-09-26 04:27:21', '2022-09-26 04:27:21');

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
  `id_course_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_testimonial`
--

INSERT INTO `member_testimonial` (`id`, `stars`, `description`, `created_at`, `updated_at`, `id_member`, `id_course_class`) VALUES
(1, 5, 'Setelah lulus dari Magangku, saya berkesempatan mendapat offer dari salah satu perusahaan ternama di Indonesia. Walaupun background saya gak relate dengan pekerjaan saya, namun mengikuti backend bootcamp membuat saya memiliki nilai jual lebih di mata recruiter dan tentunya itu sangat membantu.', '2022-09-26 11:24:24', '2022-09-26 11:24:24', 1, 1),
(2, 5, 'Metode belajarnya tidak membosankan karena pengajarnya dari praktisi data di perusahaan besar, sehingga business case dan insight data-nya sangat relate banget sama waktu sekarang.', '2022-09-26 11:29:21', '2022-09-26 11:29:21', 2, 1),
(3, 5, 'Di Magangku, saya selalu menemukan hal baru untuk dipelajari dan bisa langsung mengaplikasikannya di dalam pekerjaan saya saat ini. Setelah lulus, saya lebih percaya diri ketika melihat kualifikasi yang diminta perusahaan, sehingga percaya diri untuk apply di beberapa job posting. Berbekal pengetahuan dari bootcamp, saya jadi paham apa yang harus dikerjakan saat technical test dari recruiter dan terbukti, akhirnya saya berhasil sebagai lulusan psikologi mendapat offer di salah satu perusahaan di Indonesia sebagai Frontend Engineer.', '2022-09-26 11:29:21', '2022-09-26 11:29:21', 3, 2);

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
(1, 'Andy Febrico Bintoro', '', 'CEO', '1aaadb05410d923695a0c6fc36c6e901.jpg', 1, '2022-09-26 10:55:07', 1, '2022-09-26 10:55:07', 1, 1);

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
(1, 9, 2022, 3, 'ORDER');

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

-- --------------------------------------------------------

--
-- Table structure for table `promotion_course`
--

CREATE TABLE `promotion_course` (
  `id` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'ORDER/2022/09/001', '2022-09-26 04:31:42', 5000000, NULL, 5000000, 0, NULL, NULL, NULL, '2022-09-26 04:31:42', 1, '2022-09-26 04:31:42', 1, 2, 2, 3, 2, NULL),
(2, 'ORDER/2022/09/002', '2022-09-26 04:32:28', 2000000, NULL, 2000000, 0, NULL, NULL, NULL, '2022-09-26 04:32:28', 1, '2022-09-26 04:32:28', 1, 1, 1, 1, 1, NULL),
(3, 'ORDER/2022/09/003', '2022-09-26 04:33:11', 5000000, NULL, 5000000, 0, NULL, NULL, NULL, '2022-09-26 04:33:11', 1, '2022-09-26 04:33:11', 1, 1, 1, 2, 2, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_class`
--
ALTER TABLE `course_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_class_member`
--
ALTER TABLE `course_class_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_class_member_history`
--
ALTER TABLE `course_class_member_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_module`
--
ALTER TABLE `course_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `course_price`
--
ALTER TABLE `course_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_price_benefit`
--
ALTER TABLE `course_price_benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course_tutor`
--
ALTER TABLE `course_tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_testimonial`
--
ALTER TABLE `member_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `no_generator`
--
ALTER TABLE `no_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_course`
--
ALTER TABLE `promotion_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trans_order_confirm`
--
ALTER TABLE `trans_order_confirm`
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
