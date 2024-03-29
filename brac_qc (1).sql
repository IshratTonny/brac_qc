-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 02:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brac_qc`
--

-- --------------------------------------------------------

--
-- Table structure for table `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Super Admin Group'),
(3, 'Default', 'Default Access Group');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(39) DEFAULT '0',
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_perms`
--

INSERT INTO `aauth_perms` (`id`, `name`, `definition`) VALUES
(1, 'add_post', ''),
(2, 'edit_post', ''),
(3, 'delete_post', '');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_perm_to_group`
--

INSERT INTO `aauth_perm_to_group` (`perm_id`, `group_id`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `pass`, `username`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `totp_secret`, `ip_address`) VALUES
(1, 'admin@example.com', 'dd5073c93fb477a167fd69072e95455834acd93df8fed41a2c468c45b394bfe3', 'Admin', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(2, 'tahmid@example.com', '85331630fca2b67c234b6b57e7affc9403d62cf186989c71675956e3ccc2a20d', 'tahmidrana', 0, NULL, NULL, '2018-04-09 13:18:30', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app_log`
--

CREATE TABLE `tbl_app_log` (
  `ser_id` int(11) NOT NULL,
  `log_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'created by user: from session',
  `log_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

CREATE TABLE `tbl_districts` (
  `district_id` int(11) NOT NULL,
  `bn_district_name` varchar(255) DEFAULT NULL,
  `en_district_name` varchar(255) DEFAULT NULL,
  `tbl_division_division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_districts`
--

INSERT INTO `tbl_districts` (`district_id`, `bn_district_name`, `en_district_name`, `tbl_division_division_id`) VALUES
(1, 'কুমিল্লা', 'Comilla', 1),
(2, 'ফেনী', 'Feni', 1),
(3, 'ব্রাহ্মণবাড়িয়া', 'Brahmanbaria', 1),
(4, 'রাঙ্গামাটি', 'Rangamati', 1),
(5, 'নোয়াখালী', 'Noakhali', 1),
(6, 'চাঁদপুর', 'Chandpur', 1),
(7, 'লক্ষ্মীপুর', 'Lakshmipur', 1),
(8, 'চট্টগ্রাম', 'Chittagong', 1),
(9, 'কক্সবাজার', 'Coxsbazar', 1),
(10, 'খাগড়াছড়ি', 'Khagrachhari', 1),
(11, 'বান্দরবান', 'Bandarban', 1),
(12, 'সিরাজগঞ্জ', 'Sirajganj', 2),
(13, 'পাবনা', 'Pabna', 2),
(14, 'বগুড়া', 'Bogra', 2),
(15, 'রাজশাহী', 'Rajshahi', 2),
(16, 'নাটোর', 'Natore', 2),
(17, 'জয়পুরহাট', 'Joypurhat', 2),
(18, 'চাঁপাইনবাবগঞ্জ', 'Chapainawabganj', 2),
(19, 'নওগাঁ', 'Naogaon', 2),
(20, 'যশোর', 'Jessore', 3),
(21, 'সাতক্ষীরা', 'Satkhira', 3),
(22, 'মেহেরপুর', 'Meherpur', 3),
(23, 'নড়াইল', 'Narail', 3),
(24, 'চুয়াডাঙ্গা', 'Chuadanga', 3),
(25, 'কুষ্টিয়া', 'Kushtia', 3),
(26, 'মাগুরা', 'Magura', 3),
(27, 'খুলনা', 'Khulna', 3),
(28, 'বাগেরহাট', 'Bagerhat', 3),
(29, 'ঝিনাইদহ', 'Jhenaidah', 3),
(30, 'ঝালকাঠি', 'Jhalakathi', 4),
(31, 'পটুয়াখালী', 'Patuakhali', 4),
(32, 'পিরোজপুর', 'Pirojpur', 4),
(33, 'বরিশাল', 'Barisal', 4),
(34, 'ভোলা', 'Bhola', 4),
(35, 'বরগুনা', 'Barguna', 4),
(36, 'সিলেট', 'Sylhet', 5),
(37, 'মৌলভীবাজার', 'Moulvibazar', 5),
(38, 'হবিগঞ্জ', 'Habiganj', 5),
(39, 'সুনামগঞ্জ', 'Sunamganj', 5),
(40, 'নরসিংদী', 'Narsingdi', 6),
(41, 'গাজীপুর', 'Gazipur', 6),
(42, 'শরীয়তপুর', 'Shariatpur', 6),
(43, 'নারায়ণগঞ্জ', 'Narayanganj', 6),
(44, 'টাঙ্গাইল', 'Tangail', 6),
(45, 'কিশোরগঞ্জ', 'Kishoreganj', 6),
(46, 'মানিকগঞ্জ', 'Manikganj', 6),
(47, 'ঢাকা', 'Dhaka', 6),
(48, 'মুন্সিগঞ্জ', 'Munshiganj', 6),
(49, 'রাজবাড়ী', 'Rajbari', 6),
(50, 'মাদারীপুর', 'Madaripur', 6),
(51, 'গোপালগঞ্জ', 'Gopalganj', 6),
(52, 'ফরিদপুর', 'Faridpur', 6),
(53, 'পঞ্চগড়', 'Panchagarh', 7),
(54, 'দিনাজপুর', 'Dinajpur', 7),
(55, 'লালমনিরহাট', 'Lalmonirhat', 7),
(56, 'নীলফামারী', 'Nilphamari', 7),
(57, 'গাইবান্ধা', 'Gaibandha', 7),
(58, 'ঠাকুরগাঁও', 'Thakurgaon', 7),
(59, 'রংপুর', 'Rangpur', 7),
(60, 'কুড়িগ্রাম', 'Kurigram', 7),
(61, 'শেরপুর', 'Sherpur', 8),
(62, 'ময়মনসিংহ', 'Mymensingh', 8),
(63, 'জামালপুর', 'Jamalpur', 8),
(64, 'নেত্রকোণা', 'Netrokona', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisions`
--

CREATE TABLE `tbl_divisions` (
  `division_id` int(11) NOT NULL,
  `bn_division_name` varchar(255) DEFAULT NULL,
  `en_division_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_divisions`
--

INSERT INTO `tbl_divisions` (`division_id`, `bn_division_name`, `en_division_name`) VALUES
(1, 'চট্টগ্রাম', 'Chittagong'),
(2, 'রাজশাহী', 'Rajshahi'),
(3, 'খুলনা', 'Khulna'),
(4, 'বরিশাল', 'Barisal'),
(5, 'সিলেট', 'Sylhet'),
(6, 'ঢাকা', 'Dhaka'),
(7, 'রংপুর', 'Rangpur'),
(8, 'ময়মনসিংহ', 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `ser_id` int(8) NOT NULL,
  `menu_label` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_icon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_menu` int(8) DEFAULT NULL,
  `menu_level` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`ser_id`, `menu_label`, `menu_url`, `menu_icon`, `parent_menu`, `menu_level`) VALUES
(2, 'Admin Console', NULL, 'fa-cog', NULL, 2),
(3, 'Group', 'auth/group', NULL, 2, 3),
(4, 'User', 'auth/user', NULL, 2, 2),
(6, 'Menu', 'auth/menu', NULL, 2, 0),
(8, 'Permission', 'auth/permission', NULL, 2, 0),
(9, 'Office', 'app_console/office', NULL, 10, 1),
(10, 'App Console', '#', 'fa-cogs', NULL, 1),
(11, 'Evaluation form', 'forms/add_new_evaluation_form', 'fa-file-text', NULL, 3),
(12, 'New', 'forms/add_new_evaluation_form', 'fa-file-text', 11, 1),
(13, 'Manage', 'forms/manage_evaluation_form', NULL, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_to_group`
--

CREATE TABLE `tbl_menu_to_group` (
  `ser_id` int(10) NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upazila`
--

CREATE TABLE `tbl_upazila` (
  `upazila_id` int(11) NOT NULL,
  `bn_upazila_name` varchar(255) DEFAULT NULL,
  `en_upazila_name` varchar(255) DEFAULT NULL,
  `tbl_district_district_id` int(11) NOT NULL,
  `tbl_division_division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_upazila`
--

INSERT INTO `tbl_upazila` (`upazila_id`, `bn_upazila_name`, `en_upazila_name`, `tbl_district_district_id`, `tbl_division_division_id`) VALUES
(1, 'দেবিদ্বার', 'Debidwar', 1, 1),
(2, 'বরুড়া', 'Barura', 1, 1),
(3, 'ব্রাহ্মণপাড়া', 'Brahmanpara', 1, 1),
(4, 'চান্দিনা', 'Chandina', 1, 1),
(5, 'চৌদ্দগ্রাম', 'Chauddagram', 1, 1),
(6, 'দাউদকান্দি', 'Daudkandi', 1, 1),
(7, 'হোমনা', 'Homna', 1, 1),
(8, 'লাকসাম', 'Laksam', 1, 1),
(9, 'মুরাদনগর', 'Muradnagar', 1, 1),
(10, 'নাঙ্গলকোট', 'Nangalkot', 1, 1),
(11, 'কুমিল্লা সদর', 'Comillasadar', 1, 1),
(12, 'মেঘনা', 'Meghna', 1, 1),
(13, 'মনোহরগঞ্জ', 'Monohargonj', 1, 1),
(14, 'সদর দক্ষিণ', 'Sadarsouth', 1, 1),
(15, 'তিতাস', 'Titas', 1, 1),
(16, 'বুড়িচং', 'Burichang', 1, 1),
(17, 'ছাগলনাইয়া', 'Chhagalnaiya', 2, 1),
(18, 'ফেনী', 'Sadar', 2, 1),
(19, 'সোনাগাজী', 'Sonagazi', 2, 1),
(20, 'ফুলগাজী', 'Fulgazi', 2, 1),
(21, 'পরশুরাম', 'Parshuram', 2, 1),
(22, 'দাগনভূঞা', 'Daganbhuiyan', 2, 1),
(23, 'ব্রাহ্মণবাড়িয়া', 'Sadar', 3, 1),
(24, 'কসবা', 'Kasba', 3, 1),
(25, 'নাসিরনগর', 'Nasirnagar', 3, 1),
(26, 'সরাইল', 'Sarail', 3, 1),
(27, 'আশুগঞ্জ', 'Ashuganj', 3, 1),
(28, 'আখাউড়া', 'Akhaura', 3, 1),
(29, 'নবীনগর', 'Nabinagar', 3, 1),
(30, 'বাঞ্ছারামপুর', 'Bancharampur', 3, 1),
(31, 'বিজয়নগর', 'Bijoynagar', 3, 1),
(32, 'রাঙ্গামাটি', 'Sadar', 4, 1),
(33, 'কাপ্তাই', 'Kaptai', 4, 1),
(34, 'কাউখালী', 'Kawkhali', 4, 1),
(35, 'বাঘাইছড়ি', 'Baghaichari', 4, 1),
(36, 'বরকল', 'Barkal', 4, 1),
(37, 'লংগদু', 'Langadu', 4, 1),
(38, 'রাজস্থলী', 'Rajasthali', 4, 1),
(39, 'বিলাইছড়ি', 'Belaichari', 4, 1),
(40, 'জুরাছড়ি', 'Juraichari', 4, 1),
(41, 'নানিয়ারচর', 'Naniarchar', 4, 1),
(42, 'নোয়াখালী', 'Sadar', 5, 1),
(43, 'কোম্পানীগঞ্জ', 'Companiganj', 5, 1),
(44, 'বেগমগঞ্জ', 'Begumganj', 5, 1),
(45, 'হাতিয়া', 'Hatia', 5, 1),
(46, 'সুবর্ণচর', 'Subarnachar', 5, 1),
(47, 'কবিরহাট', 'Kabirhat', 5, 1),
(48, 'সেনবাগ', 'Senbug', 5, 1),
(49, 'চাটখিল', 'Chatkhil', 5, 1),
(50, 'সোনাইমুড়ী', 'Sonaimori', 5, 1),
(51, 'হাইমচর', 'Haimchar', 6, 1),
(52, 'কচুয়া', 'Kachua', 6, 1),
(53, 'শাহরাস্তি', 'Shahrasti', 6, 1),
(54, 'চাঁদপুর', 'Sadar', 6, 1),
(55, 'মতলব', 'Matlabsouth', 6, 1),
(56, 'হাজীগঞ্জ', 'Hajiganj', 6, 1),
(57, 'মতলব', 'Matlabnorth', 6, 1),
(58, 'ফরিদগঞ্জ', 'Faridgonj', 6, 1),
(59, 'লক্ষ্মীপুর', 'Sadar', 7, 1),
(60, 'কমলনগর', 'Kamalnagar', 7, 1),
(61, 'রায়পুর', 'Raipur', 7, 1),
(62, 'রামগতি', 'Ramgati', 7, 1),
(63, 'রামগঞ্জ', 'Ramganj', 7, 1),
(64, 'রাঙ্গুনিয়া', 'Rangunia', 8, 1),
(65, 'সীতাকুন্ড', 'Sitakunda', 8, 1),
(66, 'মীরসরাই', 'Mirsharai', 8, 1),
(67, 'পটিয়া', 'Patiya', 8, 1),
(68, 'সন্দ্বীপ', 'Sandwip', 8, 1),
(69, 'বাঁশখালী', 'Banshkhali', 8, 1),
(70, 'বোয়ালখালী', 'Boalkhali', 8, 1),
(71, 'আনোয়ারা', 'Anwara', 8, 1),
(72, 'চন্দনাইশ', 'Chandanaish', 8, 1),
(73, 'সাতকানিয়া', 'Satkania', 8, 1),
(74, 'লোহাগাড়া', 'Lohagara', 8, 1),
(75, 'হাটহাজারী', 'Hathazari', 8, 1),
(76, 'ফটিকছড়ি', 'Fatikchhari', 8, 1),
(77, 'রাউজান', 'Raozan', 8, 1),
(78, 'কর্ণফুলী', 'Karnafuli', 8, 1),
(79, 'কক্সবাজার', 'Sadar', 9, 1),
(80, 'চকরিয়া', 'Chakaria', 9, 1),
(81, 'কুতুবদিয়া', 'Kutubdia', 9, 1),
(82, 'উখিয়া', 'Ukhiya', 9, 1),
(83, 'মহেশখালী', 'Moheshkhali', 9, 1),
(84, 'পেকুয়া', 'Pekua', 9, 1),
(85, 'রামু', 'Ramu', 9, 1),
(86, 'টেকনাফ', 'Teknaf', 9, 1),
(87, 'খাগড়াছড়ি', 'Sadar', 10, 1),
(88, 'দিঘীনালা', 'Dighinala', 10, 1),
(89, 'পানছড়ি', 'Panchari', 10, 1),
(90, 'লক্ষীছড়ি', 'Laxmichhari', 10, 1),
(91, 'মহালছড়ি', 'Mohalchari', 10, 1),
(92, 'মানিকছড়ি', 'Manikchari', 10, 1),
(93, 'রামগড়', 'Ramgarh', 10, 1),
(94, 'মাটিরাঙ্গা', 'Matiranga', 10, 1),
(95, 'গুইমারা', 'Guimara', 10, 1),
(96, 'বান্দরবান', 'Sadar', 11, 1),
(97, 'আলীকদম', 'Alikadam', 11, 1),
(98, 'নাইক্ষ্যংছড়ি', 'Naikhongchhari', 11, 1),
(99, 'রোয়াংছড়ি', 'Rowangchhari', 11, 1),
(100, 'লামা', 'Lama', 11, 1),
(101, 'রুমা', 'Ruma', 11, 1),
(102, 'থানচি', 'Thanchi', 11, 1),
(103, 'বেলকুচি', 'Belkuchi', 12, 2),
(104, 'চৌহালি', 'Chauhali', 12, 2),
(105, 'কামারখন্দ', 'Kamarkhand', 12, 2),
(106, 'কাজীপুর', 'Kazipur', 12, 2),
(107, 'রায়গঞ্জ', 'Raigonj', 12, 2),
(108, 'শাহজাদপুর', 'Shahjadpur', 12, 2),
(109, 'সিরাজগঞ্জ সদর', 'Sirajganjsadar', 12, 2),
(110, 'তাড়াশ', 'Tarash', 12, 2),
(111, 'উল্লাপাড়া', 'Ullapara', 12, 2),
(112, 'সুজানগর', 'Sujanagar', 13, 2),
(113, 'ঈশ্বরদী', 'Ishurdi', 13, 2),
(114, 'ভাঙ্গুড়া', 'Bhangura', 13, 2),
(115, 'পাবনা সদর', 'Pabnasadar', 13, 2),
(116, 'বেড়া', 'Bera', 13, 2),
(117, 'আটঘরিয়া', 'Atghoria', 13, 2),
(118, 'চাটমোহর', 'Chatmohar', 13, 2),
(119, 'সাঁথিয়া', 'Santhia', 13, 2),
(120, 'ফরিদপুর', 'Faridpur', 13, 2),
(121, 'কাহালু', 'Kahaloo', 14, 2),
(122, 'বগুড়া', 'Sadar', 14, 2),
(123, 'সারিয়াকান্দি', 'Shariakandi', 14, 2),
(124, 'শাজাহানপুর', 'Shajahanpur', 14, 2),
(125, 'দুপচাচিঁয়া', 'Dupchanchia', 14, 2),
(126, 'আদমদিঘি', 'Adamdighi', 14, 2),
(127, 'নন্দিগ্রাম', 'Nondigram', 14, 2),
(128, 'সোনাতলা', 'Sonatala', 14, 2),
(129, 'ধুনট', 'Dhunot', 14, 2),
(130, 'গাবতলী', 'Gabtali', 14, 2),
(131, 'শেরপুর', 'Sherpur', 14, 2),
(132, 'শিবগঞ্জ', 'Shibganj', 14, 2),
(133, 'পবা', 'Paba', 15, 2),
(134, 'দুর্গাপুর', 'Durgapur', 15, 2),
(135, 'মোহনপুর', 'Mohonpur', 15, 2),
(136, 'চারঘাট', 'Charghat', 15, 2),
(137, 'পুঠিয়া', 'Puthia', 15, 2),
(138, 'বাঘা', 'Bagha', 15, 2),
(139, 'গোদাগাড়ী', 'Godagari', 15, 2),
(140, 'তানোর', 'Tanore', 15, 2),
(141, 'বাগমারা', 'Bagmara', 15, 2),
(142, 'নাটোর', 'Natoresadar', 16, 2),
(143, 'সিংড়া', 'Singra', 16, 2),
(144, 'বড়াইগ্রাম', 'Baraigram', 16, 2),
(145, 'বাগাতিপাড়া', 'Bagatipara', 16, 2),
(146, 'লালপুর', 'Lalpur', 16, 2),
(147, 'গুরুদাসপুর', 'Gurudaspur', 16, 2),
(148, 'নলডাঙ্গা', 'Naldanga', 16, 2),
(149, 'আক্কেলপুর', 'Akkelpur', 17, 2),
(150, 'কালাই', 'Kalai', 17, 2),
(151, 'ক্ষেতলাল', 'Khetlal', 17, 2),
(152, 'পাঁচবিবি', 'Panchbibi', 17, 2),
(153, 'জয়পুরহাট সদর', 'Joypurhatsadar', 17, 2),
(154, 'চাঁপাইনবাবগঞ্জ সদর', 'Chapainawabganjsadar', 18, 2),
(155, 'গোমস্তাপুর', 'Gomostapur', 18, 2),
(156, 'নাচোল', 'Nachol', 18, 2),
(157, 'ভোলাহাট', 'Bholahat', 18, 2),
(158, 'শিবগঞ্জ', 'Shibganj', 18, 2),
(159, 'মহাদেবপুর', 'Mohadevpur', 19, 2),
(160, 'বদলগাছী', 'Badalgachi', 19, 2),
(161, 'পত্নিতলা', 'Patnitala', 19, 2),
(162, 'ধামইরহাট', 'Dhamoirhat', 19, 2),
(163, 'নিয়ামতপুর', 'Niamatpur', 19, 2),
(164, 'মান্দা', 'Manda', 19, 2),
(165, 'আত্রাই', 'Atrai', 19, 2),
(166, 'রাণীনগর', 'Raninagar', 19, 2),
(167, 'নওগাঁ সদর', 'Naogaonsadar', 19, 2),
(168, 'পোরশা', 'Porsha', 19, 2),
(169, 'সাপাহার', 'Sapahar', 19, 2),
(170, 'মণিরামপুর', 'Manirampur', 20, 3),
(171, 'অভয়নগর', 'Abhaynagar', 20, 3),
(172, 'বাঘারপাড়া', 'Bagherpara', 20, 3),
(173, 'চৌগাছা', 'Chougachha', 20, 3),
(174, 'ঝিকরগাছা', 'Jhikargacha', 20, 3),
(175, 'কেশবপুর', 'Keshabpur', 20, 3),
(176, 'যশোর', 'Sadar', 20, 3),
(177, 'শার্শা', 'Sharsha', 20, 3),
(178, 'আশাশুনি', 'Assasuni', 21, 3),
(179, 'দেবহাটা', 'Debhata', 21, 3),
(180, 'কলারোয়া', 'Kalaroa', 21, 3),
(181, 'সাতক্ষীরা', 'Satkhirasadar', 21, 3),
(182, 'শ্যামনগর', 'Shyamnagar', 21, 3),
(183, 'তালা', 'Tala', 21, 3),
(184, 'কালিগঞ্জ', 'Kaliganj', 21, 3),
(185, 'মুজিবনগর', 'Mujibnagar', 22, 3),
(186, 'মেহেরপুর সদর', 'Meherpursadar', 22, 3),
(187, 'গাংনী', 'Gangni', 22, 3),
(188, 'নড়াইল সদর', 'Narailsadar', 23, 3),
(189, 'লোহাগড়া', 'Lohagara', 23, 3),
(190, 'কালিয়া', 'Kalia', 23, 3),
(191, 'চুয়াডাঙ্গা সদর', 'Chuadangasadar', 24, 3),
(192, 'আলমডাঙ্গা', 'Alamdanga', 24, 3),
(193, 'দামুড়হুদা', 'Damurhuda', 24, 3),
(194, 'জীবননগর', 'Jibannagar', 24, 3),
(195, 'কুষ্টিয়া', 'Kushtiasadar', 25, 3),
(196, 'কুমারখালী', 'Kumarkhali', 25, 3),
(197, 'খোকসা', 'Khoksa', 25, 3),
(198, 'মিরপুর', 'Mirpurkushtia', 25, 3),
(199, 'দৌলতপুর', 'Daulatpur', 25, 3),
(200, 'ভেড়ামারা', 'Bheramara', 25, 3),
(201, 'শালিখা', 'Shalikha', 26, 3),
(202, 'শ্রীপুর', 'Sreepur', 26, 3),
(203, 'মাগুরা', 'Magurasadar', 26, 3),
(204, 'মহম্মদপুর', 'Mohammadpur', 26, 3),
(205, 'পাইকগাছা', 'Paikgasa', 27, 3),
(206, 'ফুলতলা', 'Fultola', 27, 3),
(207, 'দিঘলিয়া', 'Digholia', 27, 3),
(208, 'রূপসা', 'Rupsha', 27, 3),
(209, 'তেরখাদা', 'Terokhada', 27, 3),
(210, 'ডুমুরিয়া', 'Dumuria', 27, 3),
(211, 'বটিয়াঘাটা', 'Botiaghata', 27, 3),
(212, 'দাকোপ', 'Dakop', 27, 3),
(213, 'কয়রা', 'Koyra', 27, 3),
(214, 'ফকিরহাট', 'Fakirhat', 28, 3),
(215, 'বাগেরহাট', 'Sadar', 28, 3),
(216, 'মোল্লাহাট', 'Mollahat', 28, 3),
(217, 'শরণখোলা', 'Sarankhola', 28, 3),
(218, 'রামপাল', 'Rampal', 28, 3),
(219, 'মোড়েলগঞ্জ', 'Morrelganj', 28, 3),
(220, 'কচুয়া', 'Kachua', 28, 3),
(221, 'মোংলা', 'Mongla', 28, 3),
(222, 'চিতলমারী', 'Chitalmari', 28, 3),
(223, 'ঝিনাইদহ', 'Sadar', 29, 3),
(224, 'শৈলকুপা', 'Shailkupa', 29, 3),
(225, 'হরিণাকুন্ডু', 'Harinakundu', 29, 3),
(226, 'কালীগঞ্জ', 'Kaliganj', 29, 3),
(227, 'কোটচাঁদপুর', 'Kotchandpur', 29, 3),
(228, 'মহেশপুর', 'Moheshpur', 29, 3),
(229, 'ঝালকাঠি', 'Sadar', 30, 4),
(230, 'কাঠালিয়া', 'Kathalia', 30, 4),
(231, 'নলছিটি', 'Nalchity', 30, 4),
(232, 'রাজাপুর', 'Rajapur', 30, 4),
(233, 'বাউফল', 'Bauphal', 31, 4),
(234, 'পটুয়াখালী', 'Sadar', 31, 4),
(235, 'দুমকি', 'Dumki', 31, 4),
(236, 'দশমিনা', 'Dashmina', 31, 4),
(237, 'কলাপাড়া', 'Kalapara', 31, 4),
(238, 'মির্জাগঞ্জ', 'Mirzaganj', 31, 4),
(239, 'গলাচিপা', 'Galachipa', 31, 4),
(240, 'রাঙ্গাবালী', 'Rangabali', 31, 4),
(241, 'পিরোজপুর', 'Sadar', 32, 4),
(242, 'নাজিরপুর', 'Nazirpur', 32, 4),
(243, 'কাউখালী', 'Kawkhali', 32, 4),
(244, 'জিয়ানগর', 'Zianagar', 32, 4),
(245, 'ভান্ডারিয়া', 'Bhandaria', 32, 4),
(246, 'মঠবাড়ীয়া', 'Mathbaria', 32, 4),
(247, 'নেছারাবাদ', 'Nesarabad', 32, 4),
(248, 'বরিশাল সদর', 'Barisalsadar', 33, 4),
(249, 'বাকেরগঞ্জ', 'Bakerganj', 33, 4),
(250, 'বাবুগঞ্জ', 'Babuganj', 33, 4),
(251, 'উজিরপুর', 'Wazirpur', 33, 4),
(252, 'বানারীপাড়া', 'Banaripara', 33, 4),
(253, 'গৌরনদী', 'Gournadi', 33, 4),
(254, 'আগৈলঝাড়া', 'Agailjhara', 33, 4),
(255, 'মেহেন্দিগঞ্জ', 'Mehendiganj', 33, 4),
(256, 'মুলাদী', 'Muladi', 33, 4),
(257, 'হিজলা', 'Hizla', 33, 4),
(258, 'ভোলা', 'Sadar', 34, 4),
(259, 'বোরহান', 'Borhanuddin', 34, 4),
(260, 'চরফ্যাশন', 'Charfesson', 34, 4),
(261, 'দৌলতখান', 'Doulatkhan', 34, 4),
(262, 'মনপুরা', 'Monpura', 34, 4),
(263, 'তজুমদ্দিন', 'Tazumuddin', 34, 4),
(264, 'লালমোহন', 'Lalmohan', 34, 4),
(265, 'আমতলী', 'Amtali', 35, 4),
(266, 'বরগুনা', 'Sadar', 35, 4),
(267, 'বেতাগী', 'Betagi', 35, 4),
(268, 'বামনা', 'Bamna', 35, 4),
(269, 'পাথরঘাটা', 'Pathorghata', 35, 4),
(270, 'তালতলি', 'Taltali', 35, 4),
(271, 'বালাগঞ্জ', 'Balaganj', 36, 5),
(272, 'বিয়ানীবাজার', 'Beanibazar', 36, 5),
(273, 'বিশ্বনাথ', 'Bishwanath', 36, 5),
(274, 'কোম্পানীগঞ্জ', 'Companiganj', 36, 5),
(275, 'ফেঞ্চুগঞ্জ', 'Fenchuganj', 36, 5),
(276, 'গোলাপগঞ্জ', 'Golapganj', 36, 5),
(277, 'গোয়াইনঘাট', 'Gowainghat', 36, 5),
(278, 'জৈন্তাপুর', 'Jaintiapur', 36, 5),
(279, 'কানাইঘাট', 'Kanaighat', 36, 5),
(280, 'সিলেট', 'Sylhetsadar', 36, 5),
(281, 'জকিগঞ্জ', 'Zakiganj', 36, 5),
(282, 'দক্ষিণ', 'Dakshinsurma', 36, 5),
(283, 'ওসমানী', 'Osmaninagar', 36, 5),
(284, '', '', 36, 5),
(285, 'বড়লেখা', 'Barlekha', 37, 5),
(286, 'কমলগঞ্জ', 'Kamolganj', 37, 5),
(287, 'কুলাউড়া', 'Kulaura', 37, 5),
(288, 'মৌলভীবাজার সদর', 'Moulvibazarsadar', 37, 5),
(289, 'রাজনগর', 'Rajnagar', 37, 5),
(290, 'শ্রীমঙ্গল', 'Sreemangal', 37, 5),
(291, 'জুড়ী', 'Juri', 37, 5),
(292, 'নবীগঞ্জ', 'Nabiganj', 38, 5),
(293, 'বাহুবল', 'Bahubal', 38, 5),
(294, 'আজমিরীগঞ্জ', 'Ajmiriganj', 38, 5),
(295, 'বানিয়াচং', 'Baniachong', 38, 5),
(296, 'লাখাই', 'Lakhai', 38, 5),
(297, 'চুনারুঘাট', 'Chunarughat', 38, 5),
(298, 'হবিগঞ্জ', 'Habiganjsadar', 38, 5),
(299, 'মাধবপুর', 'Madhabpur', 38, 5),
(300, 'সুনামগঞ্জ', 'Sunamganj Sadar', 39, 5),
(301, 'দক্ষিণ সুনামগঞ্জ', 'Southsunamganj', 39, 5),
(302, 'বিশ্বম্ভরপুর', 'Bishwambarpur', 39, 5),
(303, 'ছাতক', 'Chhatak', 39, 5),
(304, 'জগন্নাথপুর', 'Jagannathpur', 39, 5),
(305, 'দোয়ারাবাজার', 'Dowarabazar', 39, 5),
(306, 'তাহিরপুর', 'Tahirpur', 39, 5),
(307, 'ধর্মপাশা', 'Dharmapasha', 39, 5),
(308, 'জামালগঞ্জ', 'Jamalganj', 39, 5),
(309, 'শাল্লা', 'Shalla', 39, 5),
(310, 'দিরাই', 'Derai', 39, 5),
(311, 'বেলাবো', 'Belabo', 40, 6),
(312, 'মনোহরদী', 'Monohardi', 40, 6),
(313, 'নরসিংদী', 'Narsingdisadar', 40, 6),
(314, 'পলাশ', 'Palash', 40, 6),
(315, 'রায়পুরা', 'Raipura', 40, 6),
(316, 'শিবপুর', 'Shibpur', 40, 6),
(317, 'কালীগঞ্জ', 'Kaliganj', 41, 6),
(318, 'কালিয়াকৈর', 'Kaliakair', 41, 6),
(319, 'কাপাসিয়া', 'Kapasia', 41, 6),
(320, 'গাজীপুর সদর', 'Gazipur Sadar', 41, 6),
(321, 'শ্রীপুর', 'Sreepur', 41, 6),
(322, 'শরিয়তপুর', 'Sadar', 42, 6),
(323, 'নড়িয়া', 'Naria', 42, 6),
(324, 'জাজিরা', 'Zajira', 42, 6),
(325, 'গোসাইরহাট', 'Gosairhat', 42, 6),
(326, 'ভেদরগঞ্জ', 'Bhedarganj', 42, 6),
(327, 'ডামুড্যা', 'Damudya', 42, 6),
(328, 'আড়াইহাজার', 'Araihazar', 43, 6),
(329, 'বন্দর', 'Bandar', 43, 6),
(330, 'নারায়নগঞ্জ', 'Narayanganjsadar', 43, 6),
(331, 'রূপগঞ্জ', 'Rupganj', 43, 6),
(332, 'সোনারগাঁ', 'Sonargaon', 43, 6),
(333, 'বাসাইল', 'Basail', 44, 6),
(334, 'ভুয়াপুর', 'Bhuapur', 44, 6),
(335, 'দেলদুয়ার', 'Delduar', 44, 6),
(336, 'ঘাটাইল', 'Ghatail', 44, 6),
(337, 'গোপালপুর', 'Gopalpur', 44, 6),
(338, 'মধুপুর', 'Madhupur', 44, 6),
(339, 'মির্জাপুর', 'Mirzapur', 44, 6),
(340, 'নাগরপুর', 'Nagarpur', 44, 6),
(341, 'সখিপুর', 'Sakhipur', 44, 6),
(342, 'টাঙ্গাইল সদর', 'Tangailsadar', 44, 6),
(343, 'কালিহাতী', 'Kalihati', 44, 6),
(344, 'ধনবাড়ী', 'Dhanbari', 44, 6),
(345, 'ইটনা', 'Itna', 45, 6),
(346, 'কটিয়াদী', 'Katiadi', 45, 6),
(347, 'ভৈরব', 'Bhairab', 45, 6),
(348, 'তাড়াইল', 'Tarail', 45, 6),
(349, 'হোসেনপুর', 'Hossainpur', 45, 6),
(350, 'পাকুন্দিয়া', 'Pakundia', 45, 6),
(351, 'কুলিয়ারচর', 'Kuliarchar', 45, 6),
(352, 'কিশোরগঞ্জ সদর', 'Kishoreganjsadar', 45, 6),
(353, 'করিমগঞ্জ', 'Karimgonj', 45, 6),
(354, 'বাজিতপুর', 'Bajitpur', 45, 6),
(355, 'অষ্টগ্রাম', 'Austagram', 45, 6),
(356, 'মিঠামইন', 'Mithamoin', 45, 6),
(357, 'নিকলী', 'Nikli', 45, 6),
(358, 'হরিরামপুর', 'Harirampur', 46, 6),
(359, 'সাটুরিয়া', 'Saturia', 46, 6),
(360, 'মানিকগঞ্জ', 'Sadar', 46, 6),
(361, 'ঘিওর', 'Gior', 46, 6),
(362, 'শিবালয়', 'Shibaloy', 46, 6),
(363, 'দৌলতপুর', 'Doulatpur', 46, 6),
(364, 'সিংগাইর', 'Singiar', 46, 6),
(365, 'সাভার', 'Savar', 47, 6),
(366, 'ধামরাই', 'Dhamrai', 47, 6),
(367, 'কেরাণীগঞ্জ', 'Keraniganj', 47, 6),
(368, 'নবাবগঞ্জ', 'Nawabganj', 47, 6),
(369, 'দোহার', 'Dohar', 47, 6),
(370, 'মুন্সিগঞ্জ সদর', 'Sadar', 48, 6),
(371, 'শ্রীনগর', 'Sreenagar', 48, 6),
(372, 'সিরাজদিখান', 'Sirajdikhan', 48, 6),
(373, 'লৌহজং', 'Louhajanj', 48, 6),
(374, 'গজারিয়া', 'Gajaria', 48, 6),
(375, 'টংগীবাড়ি', 'Tongibari', 48, 6),
(376, 'রাজবাড়ী', 'Sadar', 49, 6),
(377, 'গোয়ালন্দ', 'Goalanda', 49, 6),
(378, 'পাংশা', 'Pangsa', 49, 6),
(379, 'বালিয়াকান্দি', 'Baliakandi', 49, 6),
(380, 'কালুখালী', 'Kalukhali', 49, 6),
(381, 'মাদারীপুর', 'Sadar', 50, 6),
(382, 'শিবচর', 'Shibchar', 50, 6),
(383, 'কালকিনি', 'Kalkini', 50, 6),
(384, 'রাজৈর', 'Rajoir', 50, 6),
(385, 'গোপালগঞ্জ', 'Sadar', 51, 6),
(386, 'কাশিয়ানী', 'Kashiani', 51, 6),
(387, 'টুংগীপাড়া', 'Tungipara', 51, 6),
(388, 'কোটালীপাড়া', 'Kotalipara', 51, 6),
(389, 'মুকসুদপুর', 'Muksudpur', 51, 6),
(390, 'ফরিদপুর', 'Sadar', 52, 6),
(391, 'আলফাডাঙ্গা', 'Alfadanga', 52, 6),
(392, 'বোয়ালমারী', 'Boalmari', 52, 6),
(393, 'সদরপুর', 'Sadarpur', 52, 6),
(394, 'নগরকান্দা', 'Nagarkanda', 52, 6),
(395, 'ভাঙ্গা', 'Bhanga', 52, 6),
(396, 'চরভদ্রাসন', 'Charbhadrasan', 52, 6),
(397, 'মধুখালী', 'Madhukhali', 52, 6),
(398, 'সালথা', 'Saltha', 52, 6),
(399, 'পঞ্চগড়', 'Panchagarhsadar', 53, 7),
(400, 'দেবীগঞ্জ', 'Debiganj', 53, 7),
(401, 'বোদা', 'Boda', 53, 7),
(402, 'আটোয়ারী', 'Atwari', 53, 7),
(403, 'তেতুলিয়া', 'Tetulia', 53, 7),
(404, 'নবাবগঞ্জ', 'Nawabganj', 54, 7),
(405, 'বীরগঞ্জ', 'Birganj', 54, 7),
(406, 'ঘোড়াঘাট', 'Ghoraghat', 54, 7),
(407, 'বিরামপুর', 'Birampur', 54, 7),
(408, 'পার্বতীপুর', 'Parbatipur', 54, 7),
(409, 'বোচাগঞ্জ', 'Bochaganj', 54, 7),
(410, 'কাহারোল', 'Kaharol', 54, 7),
(411, 'ফুলবাড়ী', 'Fulbari', 54, 7),
(412, 'দিনাজপুর সদর', 'Dinajpursadar', 54, 7),
(413, 'হাকিমপুর', 'Hakimpur', 54, 7),
(414, 'খানসামা', 'Khansama', 54, 7),
(415, 'বিরল', 'Birol', 54, 7),
(416, 'চিরিরবন্দর', 'Chirirbandar', 54, 7),
(417, 'লালমনিরহাট', 'Sadar', 55, 7),
(418, 'কালীগঞ্জ', 'Kaliganj', 55, 7),
(419, 'হাতীবান্ধা', 'Hatibandha', 55, 7),
(420, 'পাটগ্রাম', 'Patgram', 55, 7),
(421, 'আদিতমারী', 'Aditmari', 55, 7),
(422, 'সৈয়দপুর', 'Syedpur', 56, 7),
(423, 'ডোমার', 'Domar', 56, 7),
(424, 'ডিমলা', 'Dimla', 56, 7),
(425, 'জলঢাকা', 'Jaldhaka', 56, 7),
(426, 'কিশোরগঞ্জ', 'Kishorganj', 56, 7),
(427, 'নীলফামারী সদর', 'Nilphamarisadar', 56, 7),
(428, 'সাদুল্লাপুর', 'Sadullapur', 57, 7),
(429, 'গাইবান্ধা সদর', 'Gaibandhasadar', 57, 7),
(430, 'পলাশবাড়ী', 'Palashbari', 57, 7),
(431, 'সাঘাটা', 'Saghata', 57, 7),
(432, 'গোবিন্দগঞ্জ', 'Gobindaganj', 57, 7),
(433, 'সুন্দরগঞ্জ', 'Sundarganj', 57, 7),
(434, 'ফুলছড়ি', 'Phulchari', 57, 7),
(435, 'ঠাকুরগাঁও সদর', 'Thakurgaonsadar', 58, 7),
(436, 'পীরগঞ্জ', 'Pirganj', 58, 7),
(437, 'রাণীশংকৈল', 'Ranisankail', 58, 7),
(438, 'হরিপুর', 'Haripur', 58, 7),
(439, 'বালিয়াডাঙ্গী', 'Baliadangi', 58, 7),
(440, 'রংপুর সদর', 'Rangpursadar', 59, 7),
(441, 'গংগাচড়া', 'Gangachara', 59, 7),
(442, 'তারাগঞ্জ', 'Taragonj', 59, 7),
(443, 'বদরগঞ্জ', 'Badargonj', 59, 7),
(444, 'মিঠাপুকুর', 'Mithapukur', 59, 7),
(445, 'পীরগঞ্জ', 'Pirgonj', 59, 7),
(446, 'কাউনিয়া', 'Kaunia', 59, 7),
(447, 'পীরগাছা', 'Pirgacha', 59, 7),
(448, 'কুড়িগ্রাম সদর', 'Kurigramsadar', 60, 7),
(449, 'নাগেশ্বরী', 'Nageshwari', 60, 7),
(450, 'ভুরুঙ্গামারী', 'Bhurungamari', 60, 7),
(451, 'ফুলবাড়ী', 'Phulbari', 60, 7),
(452, 'রাজারহাট', 'Rajarhat', 60, 7),
(453, 'উলিপুর', 'Ulipur', 60, 7),
(454, 'চিলমারী', 'Chilmari', 60, 7),
(455, 'রৌমারী', 'Rowmari', 60, 7),
(456, 'চর', 'Charrajibpur', 60, 7),
(457, 'শেরপুর সদর', 'Sherpursadar', 61, 8),
(458, 'নালিতাবাড়ী', 'Nalitabari', 61, 8),
(459, 'শ্রীবরদী', 'Sreebordi', 61, 8),
(460, 'নকলা', 'Nokla', 61, 8),
(461, 'ঝিনাইগাতী', 'Jhenaigati', 61, 8),
(462, 'ফুলবাড়ীয়া', 'Fulbaria', 62, 8),
(463, 'ত্রিশাল', 'Trishal', 62, 8),
(464, 'ভালুকা', 'Bhaluka', 62, 8),
(465, 'মুক্তাগাছা', 'Muktagacha', 62, 8),
(466, 'ময়মনসিংহ সদর', 'Mymensinghsadar', 62, 8),
(467, 'ধোবাউড়া', 'Dhobaura', 62, 8),
(468, 'ফুলপুর', 'Phulpur', 62, 8),
(469, 'হালুয়াঘাট', 'Haluaghat', 62, 8),
(470, 'গৌরীপুর', 'Gouripur', 62, 8),
(471, 'গফরগাঁও', 'Gafargaon', 62, 8),
(472, 'ঈশ্বরগঞ্জ', 'Iswarganj', 62, 8),
(473, 'নান্দাইল', 'Nandail', 62, 8),
(474, 'তারাকান্দা', 'Tarakanda', 62, 8),
(475, 'জামালপুর সদর', 'Jamalpursadar', 63, 8),
(476, 'মেলান্দহ', 'Melandah', 63, 8),
(477, 'ইসলামপুর', 'Islampur', 63, 8),
(478, 'দেওয়ানগঞ্জ', 'Dewangonj', 63, 8),
(479, 'সরিষাবাড়ী', 'Sarishabari', 63, 8),
(480, 'মাদারগঞ্জ', 'Madarganj', 63, 8),
(481, 'বকশীগঞ্জ', 'Bokshiganj', 63, 8),
(482, 'বারহাট্টা', 'Barhatta', 64, 8),
(483, 'দুর্গাপুর', 'Durgapur', 64, 8),
(484, 'কেন্দুয়া', 'Kendua', 64, 8),
(485, 'আটপাড়া', 'Atpara', 64, 8),
(486, 'মদন', 'Madan', 64, 8),
(487, 'খালিয়াজুরী', 'Khaliajuri', 64, 8),
(488, 'কলমাকান্দা', 'Kalmakanda', 64, 8),
(489, 'মোহনগঞ্জ', 'Mohongonj', 64, 8),
(490, 'পূর্বধলা', 'Purbadhala', 64, 8),
(491, 'নেত্রকোণা সদর', 'Netrokonasadar', 64, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indexes for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perm_to_group`
--
ALTER TABLE `aauth_perm_to_group`
  ADD PRIMARY KEY (`perm_id`,`group_id`);

--
-- Indexes for table `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`perm_id`,`user_id`);

--
-- Indexes for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`);

--
-- Indexes for table `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_index` (`user_id`);

--
-- Indexes for table `tbl_app_log`
--
ALTER TABLE `tbl_app_log`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_divisions`
--
ALTER TABLE `tbl_divisions`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`ser_id`),
  ADD KEY `fk_tbl_menu_parent_menu_id` (`parent_menu`);

--
-- Indexes for table `tbl_menu_to_group`
--
ALTER TABLE `tbl_menu_to_group`
  ADD PRIMARY KEY (`ser_id`),
  ADD KEY `fk_aauth_groups_id` (`group_id`),
  ADD KEY `fk_tbl_menu_ser_id` (`menu_id`);

--
-- Indexes for table `tbl_upazila`
--
ALTER TABLE `tbl_upazila`
  ADD PRIMARY KEY (`upazila_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_app_log`
--
ALTER TABLE `tbl_app_log`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_divisions`
--
ALTER TABLE `tbl_divisions`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `ser_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_menu_to_group`
--
ALTER TABLE `tbl_menu_to_group`
  MODIFY `ser_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_upazila`
--
ALTER TABLE `tbl_upazila`
  MODIFY `upazila_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD CONSTRAINT `fk_tbl_menu_parent_menu_id` FOREIGN KEY (`parent_menu`) REFERENCES `tbl_menu` (`ser_id`);

--
-- Constraints for table `tbl_menu_to_group`
--
ALTER TABLE `tbl_menu_to_group`
  ADD CONSTRAINT `fk_aauth_groups_id` FOREIGN KEY (`group_id`) REFERENCES `aauth_groups` (`id`),
  ADD CONSTRAINT `fk_tbl_menu_ser_id` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`ser_id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
