-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2025 at 12:21 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concept360`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

DROP TABLE IF EXISTS `tbl_company`;
CREATE TABLE IF NOT EXISTS `tbl_company` (
  `n_id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `company_code` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `logo` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_count` int NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `company_logo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `n_active` int NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`n_id`, `company_name`, `company_code`, `parent_id`, `logo`, `user_count`, `username`, `password`, `company_logo`, `n_active`) VALUES
(1, 'EMIGO NETWORK EXPERTS PVT LTD', '421003', 0, '', 3, 'admin', '1111', 'https://qr-experts.com/profiles/cmp_1738745736/logo.png', 1),
(9, 'EMIGO NETWORK CONSULTANCIES EST', '34302', 0, '', 3, 'admindxb', '1111', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

DROP TABLE IF EXISTS `tbl_enquiry`;
CREATE TABLE IF NOT EXISTS `tbl_enquiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visitor_name` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `company_id` int NOT NULL,
  `purpose_of_visit` varchar(200) NOT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `contact_person` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_read` int NOT NULL COMMENT 'if (read ==0 not seen and 1==seen)',
  `seen_by` int NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`id`, `visitor_name`, `phone_number`, `email`, `company_id`, `purpose_of_visit`, `company_name`, `contact_person`, `is_read`, `seen_by`, `created_date`, `date`) VALUES
(40, 'arjun', '7012713312', 'arjun@gmail.com', 1, 'delivery pickup', 'coinoneglobal', 'hr', 1, 9, '2025-08-18 07:02:41', '2025-04-07'),
(67, 'JOBY', '4445444444', 'xcxcxc@gmail.com', 1, 'Person meeting', NULL, 'HR', 1, 2, '2025-08-18 07:02:44', '2025-04-10'),
(5, 'VIJAY', '+919995210574', 'vijaykrishnanvakayil@gmail.com', 1, 'business meeting', 'Emigo Networks Pvt Ltd', 'Managing Director', 1, 2, '2025-08-18 07:02:46', '2025-04-04'),
(63, 'arjun', '3333333333', 'arunkumarc9745@gmail.com', 1, 'Person meeting', NULL, 'ARUN KUMAR CHNAGARAMKULATH', 1, 9, '2025-08-18 07:02:48', '2025-04-08'),
(41, 'coinone', '7012713312', 'coinone@gmail.com', 1, 'Person meeting', NULL, 'hr', 1, 9, '2025-08-18 07:02:50', '2025-04-07'),
(38, 'sreeraj', '7012713312', 'sreeraj@gmail.com', 1, 'business meeting', 'coinone global', 'hr', 1, 9, '2025-08-18 07:02:52', '2025-04-07'),
(42, 'coinone', '7012713312', 'coinone@gmail.com', 1, 'business meeting', 'coinone global', 'hr', 1, 8, '2025-08-18 07:02:56', '2025-04-07'),
(65, 'Jeevan', '6699885544', 'Test@gmail.com', 1, 'interview', NULL, 'Hr', 1, 13, '2025-08-18 07:02:59', '2025-04-09'),
(66, 'Jeevan', '6699885544', 'Test@gmail.com', 1, 'interview', NULL, 'Hr', 1, 13, '2025-08-18 07:03:01', '2025-04-09'),
(68, 'poly', '9995210574', 'vijaykrishnanvakayil@gmail.com', 1, 'Person meeting', NULL, 'hr', 0, 0, '2025-08-18 07:03:03', '2025-04-10'),
(49, 'coinone', '1233333333', 'arunkumarc9745@gmail.com', 1, 'interview', NULL, 'ARUN KUMAR CHNAGARAMKULATH', 1, 2, '2025-08-18 07:03:05', '2025-04-07'),
(58, 'admindxb', '1111111111', 'admin@gmail.com', 1, 'Person meeting', NULL, 'HR', 1, 9, '2025-08-18 07:03:07', '2025-04-08'),
(57, 'arjun', '7510949135', 'arjunvt004@gmail.com', 1, 'Person meeting', NULL, 'hr', 1, 13, '2025-08-18 07:03:09', '2025-04-08'),
(56, 'arjun vt', '7510949135', 'arjun@gmail.com', 1, 'Person meeting', NULL, 'hr', 1, 13, '2025-08-18 07:03:11', '2025-04-08'),
(62, 'Vijay', '9995210574', 'vijaykrishnanvakayil@gmail.com', 1, 'Person meeting', NULL, 'HR', 1, 9, '2025-08-18 07:03:15', '2025-04-08'),
(64, 'ererer', '3333333333', 'ddd@gmail.com', 1, 'Person meeting', NULL, 'wewe', 1, 10, '2025-08-18 07:03:17', '2025-04-08'),
(69, 'arjun vt', '7510949135', 'arjun@gmailvt.com', 1, 'Person meeting', NULL, 'ghhh', 0, 0, '2025-08-18 07:03:19', '2025-04-11'),
(70, 'arjun', '7510949135', 'arjunvt@gmail.com', 1, 'Person meeting', NULL, 'hr', 1, 2, '2025-08-18 07:03:21', '2025-04-11'),
(71, 'vishnu kv', '7510949135', 'riyesh@emigonetworks.com', 1, 'Person meeting', NULL, 'hr', 0, 0, '2025-08-18 07:03:23', '2025-04-11'),
(72, 'arjun vt', '751094913512345', '', 1, 'Person meeting', NULL, 'hr', 0, 0, '2025-08-18 07:03:25', '2025-04-11'),
(76, 'arjun vinod', '7510949135', '', 1, 'Person meeting', NULL, 'manager', 0, 0, '2025-08-18 07:03:30', '2025-04-15'),
(75, 'visitor', '7510949135', '', 1, 'Person meeting', NULL, 'hr', 0, 0, '2025-08-18 07:03:32', '2025-04-15'),
(77, 'visitor', '7510949135', '', 1, 'Person meeting', NULL, 'hr', 0, 0, '2025-08-18 07:03:34', '2025-04-15'),
(78, 'arjunvt', '7510949135', 'arjunvt@gmail.com', 1, 'vendor supplier', 'coinone', 'hr', 0, 0, '2025-08-18 07:03:36', '2025-04-15'),
(79, 'arjun vt', '+917510949135', 'arjunvt@gmail.com', 1, 'interview', NULL, '', 0, 0, '2025-08-18 07:03:55', '2025-04-15'),
(80, 'arjun vt', '7510949135', '', 1, 'Person meeting', NULL, '', 0, 0, '2025-08-18 07:04:10', '2025-04-15'),
(81, 'vishnu kv', '+917510949135', 'arjun@gmailvt.com', 1, 'interview', NULL, '', 0, 0, '2025-08-18 07:04:32', '2025-04-15'),
(82, 'abhijith', '82816370345', 'abhijith@gmail.com', 1, 'business meeting', 'coinone', '', 0, 0, '2025-08-18 07:04:35', '2025-04-15'),
(83, 'arjun vinod', '7510949135', 'Arjunvt004@gmail.com', 1, 'Person meeting', NULL, 'hr', 0, 0, '2025-08-18 07:04:38', '2025-04-16'),
(84, 'arjun vinod', '7510949135', 'Arjunvt004@gmail.com', 1, 'Person meeting', NULL, 'hr', 0, 0, '2025-08-18 07:05:00', '2025-04-16'),
(85, 'arjun vinod', '7510949135', 'Arjunvt004@gmail.com', 1, 'Person meeting', NULL, 'hr', 0, 0, '2025-08-18 07:05:02', '2025-04-16'),
(86, 'arjun vinod', '7510949135', 'Arjunvt004@gmail.com', 1, 'Person meeting', NULL, 'hr', 0, 0, '2025-08-18 07:05:05', '2025-04-16'),
(87, 'arjun', '7510949135', 'arjunvt004@gmail.com', 1, 'Person meeting', NULL, '', 0, 0, '2025-08-18 07:05:06', '2025-04-16'),
(88, 'arjun', '7510949135', 'arjunvt004@gmail.com', 1, 'Person meeting', NULL, '', 0, 0, '2025-08-18 10:07:05', '2025-04-16'),
(89, 'achu', '7012713312', '', 1, 'Person meeting', NULL, '', 0, 0, '2025-08-18 10:07:07', '2025-04-16'),
(90, 'achu', '7012713312', '', 1, 'Person meeting', NULL, '', 0, 0, '2025-08-18 10:07:08', '2025-04-16'),
(91, 'achuss', '7012713312', '', 1, 'Person meeting', NULL, '', 0, 0, '2025-08-18 10:07:12', '2025-04-16'),
(92, 'achuss', '7012713312', '', 1, 'Person meeting', NULL, '', 0, 0, '2025-08-18 10:07:16', '2025-04-16'),
(93, 'achuss', '1234567890', 'Arjunvt004@gmail.com', 1, 'Person meeting', NULL, 'Arjun Vt', 1, 2, '2025-08-18 10:07:18', '2025-04-16'),
(94, 'achuss', '1234567890', 'Arjunvt004@gmail.com', 1, 'Person meeting', NULL, 'Arjun Vt', 0, 0, '2025-08-18 10:07:20', '2025-04-16'),
(95, 'devadathan', '8086373858', 'devadathan@gmail.com', 1, 'Person meeting', NULL, '', 0, 0, '2025-08-18 10:07:22', '2025-04-16'),
(96, 'devadathan', '8086373858', 'devadathan@gmail.com', 1, 'Person meeting', NULL, '', 0, 0, '2025-08-18 10:07:23', '2025-04-16'),
(97, 'joice saju', '7012713312', '', 6, 'Person meeting', NULL, '', 1, 2, '2025-04-17 10:10:35', '2025-04-16'),
(98, 'joice saju', '7012713312', '', 6, 'Person meeting', NULL, '', 1, 2, '2025-04-17 10:10:27', '2025-04-16'),
(99, 'aravind nr', '7034181853', 'aravind@gmail.com', 6, 'Person meeting', NULL, '', 1, 2, '2025-04-17 07:21:14', '2025-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `userroleid` int NOT NULL,
  `company_id` int NOT NULL,
  `Name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `UserEmail` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `UserName` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `UserPassword` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `UserPhoneNumber` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `UserAddress` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Profile_Img` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Is_Active` int NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `userroleid`, `company_id`, `Name`, `UserEmail`, `UserName`, `UserPassword`, `UserPhoneNumber`, `UserAddress`, `Profile_Img`, `Is_Active`) VALUES
(1, 1, 1, 'CONCEPT 360 PLUS', 'sales@concepts360plus.com', 'concept', '21232f297a57a5a743894a0e4a801fc3', '0', '0', NULL, 1),
(3, 2, 6, 'EMIGO NETWORK EXPERTS PVT LTD', '', 'user1', 'B59C67BF196A4758191E42F76670CEBA', '0', '0', NULL, 1),
(8, 3, 6, 'arjun', 'arjun@gmail.com', 'arjun', 'B59C67BF196A4758191E42F76670CEBA', '7510949135', 'ramapuram', NULL, 1),
(9, 1, 9, 'EMIGO NETWORK CONSULTANCIES EST', '', 'admindxb', 'B59C67BF196A4758191E42F76670CEBA', '', '', NULL, 1),
(10, 2, 9, '', '', 'dxbuser', 'b59c67bf196a4758191e42f76670ceba', '', '', NULL, 1),
(15, 3, 9, '', '', 'achu', 'b59c67bf196a4758191e42f76670ceba', '', '', NULL, 1),
(16, 2, 9, '', '', 'abhi', 'b59c67bf196a4758191e42f76670ceba', '', '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

DROP TABLE IF EXISTS `user_activity`;
CREATE TABLE IF NOT EXISTS `user_activity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `company_id` int NOT NULL,
  `date` date NOT NULL,
  `activity` varchar(200) DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=384 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `company_id`, `date`, `activity`, `logout_time`, `created_at`) VALUES
(170, 9, 9, '2025-04-10', 'admindxb logged in on 2025-04-10 10:31:17 AM', '2025-04-10 03:24:04', '2025-04-10 05:01:17'),
(169, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of ererer on 2025-04-10 09:26:44 AM', '2025-04-10 03:24:04', '2025-04-10 03:56:44'),
(168, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of ererer on 2025-04-10 09:24:18 AM', '2025-04-10 03:24:04', '2025-04-10 03:54:18'),
(167, 9, 9, '2025-04-10', 'admindxb logged in on 2025-04-10 09:15:36 AM', '2025-04-10 03:24:04', '2025-04-10 03:45:36'),
(166, 9, 9, '2025-04-10', 'admindxb logged in on 2025-04-10 09:12:44 AM', '2025-04-10 03:24:04', '2025-04-10 03:42:44'),
(165, 9, 9, '2025-04-10', 'admindxb logged in on 2025-04-10 09:11:09 AM', '2025-04-10 03:24:04', '2025-04-10 03:41:09'),
(164, 2, 6, '2025-04-10', 'admin(Logged User) viewed enquiry of JOBY on 2025-04-10 08:59:35 AM', '2025-04-17 05:39:25', '2025-04-10 03:29:35'),
(163, 2, 6, '2025-04-10', 'admin(Logged User) viewed enquiry of JOBY on 2025-04-10 08:59:25 AM', '2025-04-17 05:39:25', '2025-04-10 03:29:25'),
(162, 2, 6, '2025-04-10', 'admin(Logged User) viewed enquiry of JOBY on 2025-04-10 08:58:12 AM', '2025-04-17 05:39:25', '2025-04-10 03:28:12'),
(161, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 08:54:35 AM', '2025-04-17 05:39:25', '2025-04-10 03:24:35'),
(160, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 08:50:43 AM', '2025-04-17 05:39:25', '2025-04-10 03:20:43'),
(159, 14, 6, '2025-04-10', 'vijay logged in on 2025-04-10 08:50:03 AM', '2025-04-10 08:50:10', '2025-04-10 03:20:03'),
(158, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 08:49:41 AM', '2025-04-17 05:39:25', '2025-04-10 03:19:41'),
(157, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 08:49:08 AM', '2025-04-17 05:39:25', '2025-04-10 03:19:08'),
(156, 10, 9, '2025-04-10', 'dxbuser logged in on 2025-04-10 05:50:09 AM', '2025-04-10 03:20:07', '2025-04-10 00:20:09'),
(155, 14, 6, '2025-04-10', 'vijay logged in on 2025-04-10 05:48:43 AM', '2025-04-10 08:50:10', '2025-04-10 00:18:43'),
(154, 2, 6, '2025-04-10', 'admin(Logged User) viewed enquiry of coinone on 2025-04-10 05:46:07 AM', '2025-04-17 05:39:25', '2025-04-10 00:16:07'),
(153, 2, 6, '2025-04-10', 'admin(Logged User) viewed enquiry of Jeevan on 2025-04-10 05:46:01 AM', '2025-04-17 05:39:25', '2025-04-10 00:16:01'),
(152, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 05:45:37 AM', '2025-04-17 05:39:25', '2025-04-10 00:15:37'),
(151, 13, 6, '2025-04-10', 'test(Logged User) viewed enquiry of Jeevan on 2025-04-10 05:42:42 AM', '2025-04-10 05:45:29', '2025-04-10 00:12:42'),
(150, 13, 6, '2025-04-10', 'test(Logged User) viewed enquiry of Jeevan on 2025-04-10 05:42:39 AM', '2025-04-10 05:45:29', '2025-04-10 00:12:39'),
(149, 13, 6, '2025-04-10', 'test(Logged User) viewed enquiry of arjun vt on 2025-04-10 05:38:57 AM', '2025-04-10 05:45:29', '2025-04-10 00:08:57'),
(148, 13, 6, '2025-04-10', 'test(Logged User) viewed enquiry of arjun on 2025-04-10 05:38:53 AM', '2025-04-10 05:45:29', '2025-04-10 00:08:53'),
(147, 13, 6, '2025-04-10', 'test(Logged User) viewed enquiry of Jeevan on 2025-04-10 05:38:48 AM', '2025-04-10 05:45:29', '2025-04-10 00:08:48'),
(146, 13, 6, '2025-04-10', 'test logged in on 2025-04-10 05:38:43 AM', '2025-04-10 05:45:29', '2025-04-10 00:08:43'),
(145, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 05:33:03 AM', '2025-04-17 05:39:25', '2025-04-10 00:03:03'),
(144, 2, 6, '2025-04-09', 'admin(Logged User) viewed enquiry of arjun on 2025-04-09 06:15:30 PM', '2025-04-17 05:39:25', '2025-04-09 00:45:30'),
(143, 2, 6, '2025-04-09', 'admin logged in on 2025-04-09 17:46:56 PM', '2025-04-17 05:39:25', '2025-04-09 12:16:56'),
(142, 2, 6, '2025-04-09', 'admin(Logged User) viewed enquiry of VIJAY on 2025-04-09 03:06:11 PM', '2025-04-17 05:39:25', '2025-04-08 21:36:11'),
(141, 2, 6, '2025-04-09', 'admin logged in on 2025-04-09 15:05:54 PM', '2025-04-17 05:39:25', '2025-04-09 09:35:54'),
(171, 9, 9, '2025-04-10', 'admindxb logged in on 2025-04-10 10:59:52 AM', '2025-04-10 03:24:04', '2025-04-10 05:29:52'),
(172, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 11:07:40 AM', '2025-04-17 05:39:25', '2025-04-10 05:37:40'),
(173, 9, 9, '2025-04-10', 'admindxb logged in on 2025-04-10 11:19:07 AM', '2025-04-10 03:24:04', '2025-04-10 05:49:07'),
(174, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of admindxb on 2025-04-10 11:24:18 AM', '2025-04-10 03:24:04', '2025-04-10 05:54:18'),
(175, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of admindxb on 2025-04-10 11:24:30 AM', '2025-04-10 03:24:04', '2025-04-10 05:54:30'),
(176, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of Vijay on 2025-04-10 11:26:23 AM', '2025-04-10 03:24:04', '2025-04-10 05:56:23'),
(177, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of Vijay on 2025-04-10 11:26:27 AM', '2025-04-10 03:24:04', '2025-04-10 05:56:27'),
(178, 10, 9, '2025-04-10', 'dxbuser logged in on 2025-04-10 11:26:44 AM', '2025-04-10 03:20:07', '2025-04-10 05:56:44'),
(179, 10, 9, '2025-04-10', 'dxbuser(Logged User) viewed enquiry of Vijay on 2025-04-10 11:26:48 AM', '2025-04-10 03:20:07', '2025-04-10 05:56:48'),
(180, 10, 9, '2025-04-10', 'dxbuser(Logged User) viewed enquiry of admindxb on 2025-04-10 11:26:51 AM', '2025-04-10 03:20:07', '2025-04-10 05:56:51'),
(181, 10, 9, '2025-04-10', 'dxbuser(Logged User) viewed enquiry of admindxb on 2025-04-10 11:28:51 AM', '2025-04-10 03:20:07', '2025-04-10 05:58:51'),
(182, 9, 9, '2025-04-10', 'admindxb logged in on 2025-04-10 11:29:06 AM', '2025-04-10 03:24:04', '2025-04-10 05:59:06'),
(183, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of admindxb on 2025-04-10 11:29:08 AM', '2025-04-10 03:24:04', '2025-04-10 05:59:08'),
(184, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of admindxb on 2025-04-10 11:29:12 AM', '2025-04-10 03:24:04', '2025-04-10 05:59:12'),
(185, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of ererer on 2025-04-10 11:39:39 AM', '2025-04-10 03:24:04', '2025-04-10 06:09:39'),
(186, 9, 9, '2025-04-10', 'admindxb(Logged User) viewed enquiry of admindxb on 2025-04-10 11:40:21 AM', '2025-04-10 03:24:04', '2025-04-10 06:10:21'),
(187, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 12:05:00 PM', '2025-04-17 05:39:25', '2025-04-10 06:35:00'),
(188, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 15:04:43 PM', '2025-04-17 05:39:25', '2025-04-10 09:34:43'),
(189, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 15:07:01 PM', '2025-04-17 05:39:25', '2025-04-10 09:37:01'),
(190, 10, 9, '2025-04-10', 'dxbuser logged in on 2025-04-10 15:19:46 PM', '2025-04-10 03:20:07', '2025-04-10 09:49:46'),
(191, 10, 9, '2025-04-10', 'dxbuser viewed enquiry of admindxb on 2025-04-10 03:19:50 PM', '2025-04-10 03:20:07', '2025-04-09 21:49:50'),
(192, 9, 9, '2025-04-10', 'admindxb logged in on 2025-04-10 15:20:17 PM', '2025-04-10 03:24:04', '2025-04-10 09:50:17'),
(193, 9, 9, '2025-04-10', 'admindxb logged in on 2025-04-10 15:22:33 PM', '2025-04-10 03:24:04', '2025-04-10 09:52:33'),
(194, 16, 9, '2025-04-10', 'abhi logged in on 2025-04-10 15:24:12 PM', '2025-04-10 03:29:50', '2025-04-10 09:54:12'),
(195, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 15:29:56 PM', '2025-04-17 05:39:25', '2025-04-10 09:59:56'),
(196, 2, 6, '2025-04-10', 'admin logged in on 2025-04-10 15:36:48 PM', '2025-04-17 05:39:25', '2025-04-10 10:06:48'),
(197, 2, 6, '2025-04-11', 'admin logged in on 2025-04-11 09:13:54 AM', '2025-04-17 05:39:25', '2025-04-11 03:43:54'),
(198, 2, 6, '2025-04-11', 'admin logged in on 2025-04-11 10:36:59 AM', '2025-04-17 05:39:25', '2025-04-11 05:06:59'),
(199, 2, 6, '2025-04-11', 'admin logged in on 2025-04-11 11:46:34 AM', '2025-04-17 05:39:25', '2025-04-11 06:16:34'),
(200, 2, 6, '2025-04-11', 'admin logged in on 2025-04-11 11:53:40 AM', '2025-04-17 05:39:25', '2025-04-11 06:23:40'),
(201, 2, 6, '2025-04-11', 'admin logged in on 2025-04-11 12:24:20 PM', '2025-04-17 05:39:25', '2025-04-11 06:54:20'),
(202, 2, 6, '2025-04-11', 'Admin logged in on 2025-04-11 12:32:04 PM', '2025-04-17 05:39:25', '2025-04-11 07:02:04'),
(203, 2, 6, '2025-04-11', 'admin logged in on 2025-04-11 13:03:52 PM', '2025-04-17 05:39:25', '2025-04-11 07:33:52'),
(204, 8, 6, '2025-04-11', 'arjun logged in on 2025-04-11 13:04:16 PM', '2025-04-17 05:41:00', '2025-04-11 07:34:16'),
(205, 2, 6, '2025-04-11', 'admin logged in on 2025-04-11 13:04:26 PM', '2025-04-17 05:39:25', '2025-04-11 07:34:26'),
(206, 2, 6, '2025-04-11', 'admin logged in on 2025-04-11 15:40:16 PM', '2025-04-17 05:39:25', '2025-04-11 10:10:16'),
(207, 2, 6, '2025-04-15', 'admin logged in on 2025-04-15 09:30:29 AM', '2025-04-17 05:39:25', '2025-04-15 04:00:29'),
(208, 2, 6, '2025-04-15', 'admin logged in on 2025-04-15 11:28:16 AM', '2025-04-17 05:39:25', '2025-04-15 05:58:16'),
(209, 2, 6, '2025-04-15', 'admin logged in on 2025-04-15 11:39:44 AM', '2025-04-17 05:39:25', '2025-04-15 06:09:44'),
(210, 2, 6, '2025-04-15', 'admin logged in on 2025-04-15 11:43:40 AM', '2025-04-17 05:39:25', '2025-04-15 06:13:40'),
(211, 2, 6, '2025-04-15', 'admin logged in on 2025-04-15 17:59:58 PM', '2025-04-17 05:39:25', '2025-04-15 12:29:58'),
(212, 2, 6, '2025-04-16', 'admin logged in on 2025-04-16 09:42:49 AM', '2025-04-17 05:39:25', '2025-04-16 04:12:49'),
(213, 2, 6, '2025-04-16', 'admin logged in on 2025-04-16 12:35:40 PM', '2025-04-17 05:39:25', '2025-04-16 07:05:40'),
(214, 2, 6, '2025-04-16', 'admin logged in on 2025-04-16 14:09:31 PM', '2025-04-17 05:39:25', '2025-04-16 08:39:31'),
(215, 2, 6, '2025-04-16', 'admin logged in on 2025-04-16 14:12:47 PM', '2025-04-17 05:39:25', '2025-04-16 08:42:47'),
(216, 2, 6, '2025-04-17', 'admin logged in on 2025-04-17 10:15:57 AM', '2025-04-17 05:39:25', '2025-04-17 04:45:57'),
(217, 2, 6, '2025-04-17', 'admin logged in on 2025-04-17 12:51:08 PM', '2025-04-17 05:39:25', '2025-04-17 07:21:08'),
(218, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 12:51:14 PM', '2025-04-17 05:39:25', '2025-04-17 07:21:14'),
(219, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 01:07:00 PM', '2025-04-17 05:39:25', '2025-04-16 19:37:00'),
(220, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 01:09:45 PM', '2025-04-17 05:39:25', '2025-04-16 19:39:45'),
(221, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 01:11:24 PM', '2025-04-17 05:39:25', '2025-04-16 19:41:24'),
(222, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 01:12:12 PM', '2025-04-17 05:39:25', '2025-04-16 19:42:12'),
(223, 2, 6, '2025-04-17', 'admin logged in on 2025-04-17 15:25:40 PM', '2025-04-17 05:39:25', '2025-04-17 09:55:40'),
(224, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:25:44 PM', '2025-04-17 05:39:25', '2025-04-16 21:55:44'),
(225, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:25:48 PM', '2025-04-17 05:39:25', '2025-04-16 21:55:48'),
(226, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:25:51 PM', '2025-04-17 05:39:25', '2025-04-16 21:55:51'),
(227, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:25:52 PM', '2025-04-17 05:39:25', '2025-04-16 21:55:52'),
(228, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:25:54 PM', '2025-04-17 05:39:25', '2025-04-16 21:55:54'),
(229, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:27:38 PM', '2025-04-17 05:39:25', '2025-04-16 21:57:38'),
(230, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:29:16 PM', '2025-04-17 05:39:25', '2025-04-16 21:59:16'),
(231, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:30:01 PM', '2025-04-17 05:39:25', '2025-04-16 22:00:01'),
(232, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:32:33 PM', '2025-04-17 05:39:25', '2025-04-16 22:02:33'),
(233, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:34:39 PM', '2025-04-17 05:39:25', '2025-04-16 22:04:39'),
(234, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:35:38 PM', '2025-04-17 05:39:25', '2025-04-16 22:05:38'),
(235, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:37:05 PM', '2025-04-17 05:39:25', '2025-04-16 22:07:05'),
(236, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:37:13 PM', '2025-04-17 05:39:25', '2025-04-16 22:07:13'),
(237, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:37:37 PM', '2025-04-17 05:39:25', '2025-04-16 22:07:37'),
(238, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:38:00 PM', '2025-04-17 05:39:25', '2025-04-16 22:08:00'),
(239, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:38:37 PM', '2025-04-17 05:39:25', '2025-04-16 22:08:37'),
(240, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:40:03 PM', '2025-04-17 05:39:25', '2025-04-16 22:10:03'),
(241, 2, 6, '2025-04-17', 'admin viewed enquiry of joice saju on 2025-04-17 03:40:27 PM', '2025-04-17 05:39:25', '2025-04-16 22:10:27'),
(242, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:40:31 PM', '2025-04-17 05:39:25', '2025-04-16 22:10:31'),
(243, 2, 6, '2025-04-17', 'admin viewed enquiry of joice saju on 2025-04-17 03:40:35 PM', '2025-04-17 05:39:25', '2025-04-16 22:10:35'),
(244, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:40:38 PM', '2025-04-17 05:39:25', '2025-04-16 22:10:38'),
(245, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:41:39 PM', '2025-04-17 05:39:25', '2025-04-16 22:11:39'),
(246, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:41:44 PM', '2025-04-17 05:39:25', '2025-04-16 22:11:44'),
(247, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:42:21 PM', '2025-04-17 05:39:25', '2025-04-16 22:12:21'),
(248, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:42:59 PM', '2025-04-17 05:39:25', '2025-04-16 22:12:59'),
(249, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:43:28 PM', '2025-04-17 05:39:25', '2025-04-16 22:13:28'),
(250, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:43:49 PM', '2025-04-17 05:39:25', '2025-04-16 22:13:49'),
(251, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:45:13 PM', '2025-04-17 05:39:25', '2025-04-16 22:15:13'),
(252, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:45:54 PM', '2025-04-17 05:39:25', '2025-04-16 22:15:54'),
(253, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:49:52 PM', '2025-04-17 05:39:25', '2025-04-16 22:19:52'),
(254, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:50:17 PM', '2025-04-17 05:39:25', '2025-04-16 22:20:17'),
(255, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 03:50:29 PM', '2025-04-17 05:39:25', '2025-04-16 22:20:29'),
(256, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:02:42 PM', '2025-04-17 05:39:25', '2025-04-16 22:32:42'),
(257, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:03:15 PM', '2025-04-17 05:39:25', '2025-04-16 22:33:15'),
(258, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:03:23 PM', '2025-04-17 05:39:25', '2025-04-16 22:33:23'),
(259, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:18:55 PM', '2025-04-17 05:39:25', '2025-04-16 22:48:55'),
(260, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:19:11 PM', '2025-04-17 05:39:25', '2025-04-16 22:49:11'),
(261, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:20:33 PM', '2025-04-17 05:39:25', '2025-04-16 22:50:33'),
(262, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:21:14 PM', '2025-04-17 05:39:25', '2025-04-16 22:51:14'),
(263, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:21:58 PM', '2025-04-17 05:39:25', '2025-04-16 22:51:58'),
(264, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:22:56 PM', '2025-04-17 05:39:25', '2025-04-16 22:52:56'),
(265, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:23:30 PM', '2025-04-17 05:39:25', '2025-04-16 22:53:30'),
(266, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:26:34 PM', '2025-04-17 05:39:25', '2025-04-16 22:56:34'),
(267, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:26:50 PM', '2025-04-17 05:39:25', '2025-04-16 22:56:50'),
(268, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:26:54 PM', '2025-04-17 05:39:25', '2025-04-16 22:56:54'),
(269, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:27:09 PM', '2025-04-17 05:39:25', '2025-04-16 22:57:09'),
(270, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:27:54 PM', '2025-04-17 05:39:25', '2025-04-16 22:57:54'),
(271, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:28:23 PM', '2025-04-17 05:39:25', '2025-04-16 22:58:23'),
(272, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:28:55 PM', '2025-04-17 05:39:25', '2025-04-16 22:58:55'),
(273, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:30:24 PM', '2025-04-17 05:39:25', '2025-04-16 23:00:24'),
(274, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:31:26 PM', '2025-04-17 05:39:25', '2025-04-16 23:01:26'),
(275, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:37:20 PM', '2025-04-17 05:39:25', '2025-04-16 23:07:20'),
(276, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:38:55 PM', '2025-04-17 05:39:25', '2025-04-16 23:08:55'),
(277, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:40:05 PM', '2025-04-17 05:39:25', '2025-04-16 23:10:05'),
(278, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:40:38 PM', '2025-04-17 05:39:25', '2025-04-16 23:10:38'),
(279, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:40:59 PM', '2025-04-17 05:39:25', '2025-04-16 23:10:59'),
(280, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:41:08 PM', '2025-04-17 05:39:25', '2025-04-16 23:11:08'),
(281, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:42:12 PM', '2025-04-17 05:39:25', '2025-04-16 23:12:12'),
(282, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:42:48 PM', '2025-04-17 05:39:25', '2025-04-16 23:12:48'),
(283, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:45:17 PM', '2025-04-17 05:39:25', '2025-04-16 23:15:17'),
(284, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:46:18 PM', '2025-04-17 05:39:25', '2025-04-16 23:16:18'),
(285, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:47:00 PM', '2025-04-17 05:39:25', '2025-04-16 23:17:00'),
(286, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 04:49:17 PM', '2025-04-17 05:39:25', '2025-04-16 23:19:17'),
(287, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 04:49:28 PM', '2025-04-17 05:39:25', '2025-04-16 23:19:28'),
(288, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 04:50:21 PM', '2025-04-17 05:39:25', '2025-04-16 23:20:21'),
(289, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 04:52:17 PM', '2025-04-17 05:39:25', '2025-04-16 23:22:17'),
(290, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 04:53:56 PM', '2025-04-17 05:39:25', '2025-04-16 23:23:56'),
(291, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 04:54:22 PM', '2025-04-17 05:39:25', '2025-04-16 23:24:22'),
(292, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 04:55:24 PM', '2025-04-17 05:39:25', '2025-04-16 23:25:24'),
(293, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:21:46 PM', '2025-04-17 05:39:25', '2025-04-16 23:51:46'),
(294, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:22:03 PM', '2025-04-17 05:39:25', '2025-04-16 23:52:03'),
(295, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:22:31 PM', '2025-04-17 05:39:25', '2025-04-16 23:52:31'),
(296, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:22:52 PM', '2025-04-17 05:39:25', '2025-04-16 23:52:52'),
(297, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:23:31 PM', '2025-04-17 05:39:25', '2025-04-16 23:53:31'),
(298, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:24:59 PM', '2025-04-17 05:39:25', '2025-04-16 23:54:59'),
(299, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:25:18 PM', '2025-04-17 05:39:25', '2025-04-16 23:55:18'),
(300, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:26:35 PM', '2025-04-17 05:39:25', '2025-04-16 23:56:35'),
(301, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:27:03 PM', '2025-04-17 05:39:25', '2025-04-16 23:57:03'),
(302, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:27:39 PM', '2025-04-17 05:39:25', '2025-04-16 23:57:39'),
(303, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:28:10 PM', '2025-04-17 05:39:25', '2025-04-16 23:58:10'),
(304, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:28:46 PM', '2025-04-17 05:39:25', '2025-04-16 23:58:46'),
(305, 2, 6, '2025-04-17', 'admin viewed enquiry of achuss on 2025-04-17 05:29:50 PM', '2025-04-17 05:39:25', '2025-04-16 23:59:50'),
(306, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:29:54 PM', '2025-04-17 05:39:25', '2025-04-16 23:59:54'),
(307, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:30:25 PM', '2025-04-17 05:39:25', '2025-04-17 00:00:25'),
(308, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:31:32 PM', '2025-04-17 05:39:25', '2025-04-17 00:01:32'),
(309, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:36:26 PM', '2025-04-17 05:39:25', '2025-04-17 00:06:26'),
(310, 8, 6, '2025-04-17', 'arjun logged in on 2025-04-17 17:39:32 PM', '2025-04-17 05:41:00', '2025-04-17 12:09:32'),
(311, 8, 6, '2025-04-17', 'arjun viewed enquiry of aravind nr on 2025-04-17 05:39:36 PM', '2025-04-17 05:41:00', '2025-04-17 00:09:36'),
(312, 8, 6, '2025-04-17', 'arjun viewed enquiry of aravind nr on 2025-04-17 05:40:53 PM', '2025-04-17 05:41:00', '2025-04-17 00:10:53'),
(313, 2, 6, '2025-04-17', 'admin logged in on 2025-04-17 17:41:10 PM', NULL, '2025-04-17 12:11:10'),
(314, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:41:13 PM', NULL, '2025-04-17 00:11:13'),
(315, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:41:52 PM', NULL, '2025-04-17 00:11:52'),
(316, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:41:57 PM', NULL, '2025-04-17 00:11:57'),
(317, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:43:17 PM', NULL, '2025-04-17 00:13:17'),
(318, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:44:22 PM', NULL, '2025-04-17 00:14:22'),
(319, 2, 6, '2025-04-17', 'admin viewed enquiry of aravind nr on 2025-04-17 05:50:34 PM', NULL, '2025-04-17 00:20:34'),
(320, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 05:54:21 PM', NULL, '2025-04-17 00:24:21'),
(321, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 05:54:27 PM', NULL, '2025-04-17 00:24:27'),
(322, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 05:56:54 PM', NULL, '2025-04-17 00:26:54'),
(323, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 05:57:09 PM', NULL, '2025-04-17 00:27:09'),
(324, 2, 6, '2025-04-17', 'admin viewed enquiry of sreeraj on 2025-04-17 05:58:02 PM', NULL, '2025-04-17 00:28:02'),
(325, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:00:19 PM', NULL, '2025-04-17 00:30:19'),
(326, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:00:33 PM', NULL, '2025-04-17 00:30:33'),
(327, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:00:41 PM', NULL, '2025-04-17 00:30:41'),
(328, 2, 6, '2025-04-17', 'admin viewed enquiry of sreeraj on 2025-04-17 06:01:32 PM', NULL, '2025-04-17 00:31:32'),
(329, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:02:17 PM', NULL, '2025-04-17 00:32:17'),
(330, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:02:30 PM', NULL, '2025-04-17 00:32:30'),
(331, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:02:33 PM', NULL, '2025-04-17 00:32:33'),
(332, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:03:36 PM', NULL, '2025-04-17 00:33:36'),
(333, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:04:27 PM', NULL, '2025-04-17 00:34:27'),
(334, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:04:41 PM', NULL, '2025-04-17 00:34:41'),
(335, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:05:05 PM', NULL, '2025-04-17 00:35:05'),
(336, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:05:14 PM', NULL, '2025-04-17 00:35:14'),
(337, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:05:34 PM', NULL, '2025-04-17 00:35:34'),
(338, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:07:01 PM', NULL, '2025-04-17 00:37:01'),
(339, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:08:18 PM', NULL, '2025-04-17 00:38:18'),
(340, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:08:26 PM', NULL, '2025-04-17 00:38:26'),
(341, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:08:52 PM', NULL, '2025-04-17 00:38:52'),
(342, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:10:29 PM', NULL, '2025-04-17 00:40:29'),
(343, 2, 6, '2025-04-17', 'admin viewed enquiry of Jeevan on 2025-04-17 06:13:30 PM', NULL, '2025-04-17 00:43:30'),
(344, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:13:32 PM', NULL, '2025-04-17 00:43:32'),
(345, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:13:39 PM', NULL, '2025-04-17 00:43:39'),
(346, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:22:36 PM', NULL, '2025-04-17 00:52:36'),
(347, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:30:48 PM', NULL, '2025-04-17 01:00:48'),
(348, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:32:55 PM', NULL, '2025-04-17 01:02:55'),
(349, 2, 6, '2025-04-17', 'admin viewed enquiry of arjun on 2025-04-17 06:33:31 PM', NULL, '2025-04-17 01:03:31'),
(350, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:34:43 PM', NULL, '2025-04-17 01:04:43'),
(351, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:34:45 PM', NULL, '2025-04-17 01:04:45'),
(352, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:34:53 PM', NULL, '2025-04-17 01:04:53'),
(353, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:35:20 PM', NULL, '2025-04-17 01:05:20'),
(354, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:35:51 PM', NULL, '2025-04-17 01:05:51'),
(355, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:36:31 PM', NULL, '2025-04-17 01:06:31'),
(356, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:37:01 PM', NULL, '2025-04-17 01:07:01'),
(357, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:38:48 PM', NULL, '2025-04-17 01:08:48'),
(358, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:39:27 PM', NULL, '2025-04-17 01:09:27'),
(359, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:39:43 PM', NULL, '2025-04-17 01:09:43'),
(360, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:40:23 PM', NULL, '2025-04-17 01:10:23'),
(361, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:41:01 PM', NULL, '2025-04-17 01:11:01'),
(362, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:42:06 PM', NULL, '2025-04-17 01:12:06'),
(363, 2, 6, '2025-04-17', 'admin viewed enquiry of coinone on 2025-04-17 06:42:42 PM', NULL, '2025-04-17 01:12:42'),
(364, 2, 6, '2025-04-19', 'admin logged in on 2025-04-19 12:46:05 PM', NULL, '2025-04-19 07:16:05'),
(365, 2, 6, '2025-04-19', 'admin logged in on 2025-04-19 14:15:08 PM', NULL, '2025-04-19 08:45:08'),
(366, 2, 6, '2025-04-22', 'admin logged in on 2025-04-22 14:30:40 PM', NULL, '2025-04-22 09:00:40'),
(367, 2, 6, '2025-04-25', 'admin logged in on 2025-04-25 09:22:33 AM', NULL, '2025-04-25 03:52:33'),
(368, 2, 6, '2025-04-30', 'admin logged in on 2025-04-30 11:49:41 AM', NULL, '2025-04-30 06:19:41'),
(369, 2, 6, '2025-05-24', 'admin logged in on 2025-05-24 11:39:26 AM', NULL, '2025-05-24 06:09:26'),
(370, 2, 6, '2025-05-24', 'admin logged in on 2025-05-24 14:55:50 PM', NULL, '2025-05-24 09:25:50'),
(371, 2, 6, '2025-05-24', 'admin viewed enquiry of aravind nr on 2025-05-24 02:55:55 PM', NULL, '2025-05-23 21:25:55'),
(372, 2, 6, '2025-05-24', 'admin viewed enquiry of aravind nr on 2025-05-24 02:56:00 PM', NULL, '2025-05-23 21:26:00'),
(373, 2, 6, '2025-05-24', 'admin viewed enquiry of aravind nr on 2025-05-24 02:56:15 PM', NULL, '2025-05-23 21:26:15'),
(374, 2, 6, '2025-05-24', 'admin viewed enquiry of aravind nr on 2025-05-24 02:56:31 PM', NULL, '2025-05-23 21:26:31'),
(375, 2, 6, '2025-05-24', 'admin viewed enquiry of joice saju on 2025-05-24 02:56:56 PM', NULL, '2025-05-23 21:26:56'),
(376, 2, 6, '2025-08-18', 'admin logged in on 2025-08-18 09:30:06 AM', NULL, '2025-08-18 04:00:06'),
(377, 2, 6, '2025-08-18', 'admin viewed enquiry of joice saju on 2025-08-18 09:31:04 AM', NULL, '2025-08-18 04:01:04'),
(378, 1, 1, '2025-08-18', 'concept logged in on 2025-08-18 09:54:35 AM', '2025-08-18 09:59:09', '2025-08-18 04:24:35'),
(379, 1, 1, '2025-08-18', 'concept logged in on 2025-08-18 09:54:51 AM', '2025-08-18 09:59:09', '2025-08-18 04:24:51'),
(380, 1, 1, '2025-08-18', 'concept logged in on 2025-08-18 09:59:17 AM', NULL, '2025-08-18 04:29:17'),
(381, 1, 1, '2025-08-18', 'concept logged in on 2025-08-18 12:39:49 PM', NULL, '2025-08-18 07:09:49'),
(382, 1, 1, '2025-08-18', 'concept logged in on 2025-08-18 15:22:16 PM', NULL, '2025-08-18 09:52:16'),
(383, 1, 1, '2025-08-18', 'concept logged in on 2025-08-18 16:12:01 PM', NULL, '2025-08-18 10:42:01');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
