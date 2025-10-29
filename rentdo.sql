-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2024 at 01:25 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint UNSIGNED NOT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_cover` double(8,2) DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `ads_count` int NOT NULL DEFAULT '2',
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_id` bigint UNSIGNED DEFAULT NULL,
  `favicon_id` bigint UNSIGNED DEFAULT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ads_show` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `city_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(2, 1, 'Jashore', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(3, 1, 'Rajshahi', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(4, 1, 'Dinajpur', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(5, 1, 'Mymensingh', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(6, 1, 'Comilla', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(7, 1, 'Barisal', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(8, 1, 'Khulna', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(9, 1, 'Tangail', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(10, 1, 'Sirajganj', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(11, 1, 'Noakhali', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(12, 2, 'Dhaka', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(13, 2, 'Jashore', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(14, 2, 'Rajshahi', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(15, 2, 'Dinajpur', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(16, 2, 'Mymensingh', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(17, 2, 'Comilla', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(18, 2, 'Barisal', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(19, 2, 'Khulna', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(20, 2, 'Tangail', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(21, 2, 'Sirajganj', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(22, 2, 'Noakhali', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(23, 3, 'Dhaka', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(24, 3, 'Jashore', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(25, 3, 'Rajshahi', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(26, 3, 'Dinajpur', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(27, 3, 'Mymensingh', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(28, 3, 'Comilla', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(29, 3, 'Barisal', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(30, 3, 'Khulna', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(31, 3, 'Tangail', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(32, 3, 'Sirajganj', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(33, 3, 'Noakhali', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(34, 4, 'Dhaka', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(35, 4, 'Jashore', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(36, 4, 'Rajshahi', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(37, 4, 'Dinajpur', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(38, 4, 'Mymensingh', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(39, 4, 'Comilla', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(40, 4, 'Barisal', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(41, 4, 'Khulna', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(42, 4, 'Tangail', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(43, 4, 'Sirajganj', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(44, 4, 'Noakhali', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(45, 5, 'Dhaka', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(46, 5, 'Jashore', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(47, 5, 'Rajshahi', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(48, 5, 'Dinajpur', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(49, 5, 'Mymensingh', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(50, 5, 'Comilla', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(51, 5, 'Barisal', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(52, 5, 'Khulna', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(53, 5, 'Tangail', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(54, 5, 'Sirajganj', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(55, 5, 'Noakhali', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(56, 6, 'Dhaka', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(57, 6, 'Jashore', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(58, 6, 'Rajshahi', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(59, 6, 'Dinajpur', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(60, 6, 'Mymensingh', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(61, 6, 'Comilla', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(62, 6, 'Barisal', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(63, 6, 'Khulna', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(64, 6, 'Tangail', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(65, 6, 'Sirajganj', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(66, 6, 'Noakhali', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(67, 7, 'Dhaka', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(68, 7, 'Jashore', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(69, 7, 'Rajshahi', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(70, 7, 'Dinajpur', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(71, 7, 'Mymensingh', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(72, 7, 'Comilla', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(73, 7, 'Barisal', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(74, 7, 'Khulna', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(75, 7, 'Tangail', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(76, 7, 'Sirajganj', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(77, 7, 'Noakhali', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(78, 8, 'Dhaka', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(79, 8, 'Jashore', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(80, 8, 'Rajshahi', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(81, 8, 'Dinajpur', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(82, 8, 'Mymensingh', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(83, 8, 'Comilla', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(84, 8, 'Barisal', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(85, 8, 'Khulna', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(86, 8, 'Tangail', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(87, 8, 'Sirajganj', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(88, 8, 'Noakhali', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(89, 9, 'Dhaka', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(90, 9, 'Jashore', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(91, 9, 'Rajshahi', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(92, 9, 'Dinajpur', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(93, 9, 'Mymensingh', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(94, 9, 'Comilla', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(95, 9, 'Barisal', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(96, 9, 'Khulna', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(97, 9, 'Tangail', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(98, 9, 'Sirajganj', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(99, 9, 'Noakhali', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(100, 10, 'Dhaka', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(101, 10, 'Jashore', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(102, 10, 'Rajshahi', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(103, 10, 'Dinajpur', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(104, 10, 'Mymensingh', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(105, 10, 'Comilla', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(106, 10, 'Barisal', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(107, 10, 'Khulna', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(108, 10, 'Tangail', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(109, 10, 'Sirajganj', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(110, 10, 'Noakhali', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(111, 11, 'Dhaka', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(112, 11, 'Jashore', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(113, 11, 'Rajshahi', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(114, 11, 'Dinajpur', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(115, 11, 'Mymensingh', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(116, 11, 'Comilla', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(117, 11, 'Barisal', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(118, 11, 'Khulna', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(119, 11, 'Tangail', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(120, 11, 'Sirajganj', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(121, 11, 'Noakhali', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(122, 12, 'Dhaka', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(123, 12, 'Jashore', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(124, 12, 'Rajshahi', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(125, 12, 'Dinajpur', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(126, 12, 'Mymensingh', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(127, 12, 'Comilla', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(128, 12, 'Barisal', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(129, 12, 'Khulna', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(130, 12, 'Tangail', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(131, 12, 'Sirajganj', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(132, 12, 'Noakhali', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(133, 13, 'Dhaka', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(134, 13, 'Jashore', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(135, 13, 'Rajshahi', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(136, 13, 'Dinajpur', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(137, 13, 'Mymensingh', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(138, 13, 'Comilla', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(139, 13, 'Barisal', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(140, 13, 'Khulna', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(141, 13, 'Tangail', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(142, 13, 'Sirajganj', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(143, 13, 'Noakhali', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(144, 14, 'Dhaka', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(145, 14, 'Jashore', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(146, 14, 'Rajshahi', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(147, 14, 'Dinajpur', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(148, 14, 'Mymensingh', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(149, 14, 'Comilla', '2024-01-25 07:25:13', '2024-01-25 07:25:13'),
(150, 14, 'Barisal', '2024-01-25 07:25:14', '2024-01-25 07:25:14'),
(151, 14, 'Khulna', '2024-01-25 07:25:14', '2024-01-25 07:25:14'),
(152, 14, 'Tangail', '2024-01-25 07:25:14', '2024-01-25 07:25:14'),
(153, 14, 'Sirajganj', '2024-01-25 07:25:14', '2024-01-25 07:25:14'),
(154, 14, 'Noakhali', '2024-01-25 07:25:14', '2024-01-25 07:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `areas_lat_lng`
--

CREATE TABLE `areas_lat_lng` (
  `area_id` bigint UNSIGNED NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bkashes`
--

CREATE TABLE `bkashes` (
  `id` bigint UNSIGNED NOT NULL,
  `app_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `short_name`, `created_at`, `updated_at`) VALUES
(1, 'Africa', 'AF', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(2, 'North America', 'NA', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(3, 'Oceania', 'OC', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(4, 'Antarctica', 'AN', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(5, 'Asia', 'AS', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(6, 'Europe', 'EU', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(7, 'South America', 'SA', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(8, 'Australia', 'AU', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(9, 'Austria', 'AT', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(10, 'Azerbaijan', 'AZ', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(11, 'Bahamas', 'BS', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(12, 'Bahrain', 'BH', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(13, 'Bangladesh', 'BD', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(14, 'Barbados', 'BB', '2024-01-25 07:25:12', '2024-01-25 07:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` bigint UNSIGNED NOT NULL,
  `rent_id` bigint UNSIGNED NOT NULL,
  `rent_price` double(8,2) DEFAULT NULL,
  `electric` double(8,2) DEFAULT NULL,
  `water` double(8,2) DEFAULT NULL,
  `gas` double(8,2) DEFAULT NULL,
  `service` double(8,2) DEFAULT NULL,
  `negotiable` tinyint(1) NOT NULL DEFAULT '0',
  `others` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `symbol` enum('$','¥','৳','₡','£','₹','¢','﷼','Дин') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device_keys`
--

CREATE TABLE `device_keys` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint UNSIGNED NOT NULL,
  `rent_id` bigint UNSIGNED NOT NULL,
  `lift` tinyint(1) NOT NULL DEFAULT '0',
  `generator` tinyint(1) NOT NULL DEFAULT '0',
  `guard` tinyint(1) NOT NULL DEFAULT '0',
  `parking` tinyint(1) NOT NULL DEFAULT '0',
  `gas` tinyint(1) NOT NULL DEFAULT '0',
  `internet` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `rent_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `for_rents`
--

CREATE TABLE `for_rents` (
  `id` bigint UNSIGNED NOT NULL,
  `rent_id` bigint UNSIGNED NOT NULL,
  `male_student` tinyint(1) NOT NULL DEFAULT '0',
  `female_student` tinyint(1) NOT NULL DEFAULT '0',
  `man_job` tinyint(1) NOT NULL DEFAULT '0',
  `women_job` tinyint(1) NOT NULL DEFAULT '0',
  `any` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `businessman` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('image','audio','video','pdf','docs','excel','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` enum('jpg','jpeg','png','svg','gif','mp4','pdf','flv','avi','webm','mkv','mpeg-4, mov') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `name`, `src`, `path`, `extension`, `description`, `created_at`, `updated_at`) VALUES
(1, 'image', 'dolorum', 'images/dummy/dummy-user.png', 'images/dummy/', 'png', 'Hic voluptate voluptatem consequatur ad perspiciatis in animi.', '2024-01-25 07:25:14', '2024-01-25 07:25:14'),
(2, 'image', 'et', 'images/dummy/dummy-user.png', 'images/dummy/', 'png', 'Nam expedita suscipit harum.', '2024-01-25 07:25:14', '2024-01-25 07:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2010_05_12_164656_create_medias_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_05_11_053400_create_customers_table', 1),
(12, '2022_05_12_164930_create_rents_table', 1),
(13, '2022_05_12_165210_create_costs_table', 1),
(14, '2022_05_12_165253_create_facilities_table', 1),
(15, '2022_05_12_165356_create_rent_thumbnails_table', 1),
(16, '2022_05_12_165400_create_cities_table', 1),
(17, '2022_05_12_165410_create_areas_table', 1),
(18, '2022_05_12_165412_create_rent_infos_table', 1),
(19, '2022_05_12_165434_create_religions_table', 1),
(20, '2022_05_12_165507_create_messages_table', 1),
(21, '2022_05_12_165538_create_favorites_table', 1),
(22, '2022_05_12_180143_create_for_rents_table', 1),
(23, '2022_05_12_181305_create_permission_tables', 1),
(24, '2022_05_19_050442_create_otps_table', 1),
(25, '2022_06_11_065329_create_currencies_table', 1),
(26, '2022_09_12_045811_create_socials_table', 1),
(27, '2022_11_13_115736_add_price_to_rents_table', 1),
(28, '2023_01_14_080026_create_device_keys_table', 1),
(29, '2023_01_14_080138_create_notifications_table', 1),
(30, '2023_12_03_052542_add_lat_long_to_rents_table', 1),
(31, '2023_12_03_062410_add_bussinessman_column_to_for_rents_table', 1),
(32, '2023_12_04_052646_create_areas_lat_lng_table', 1),
(33, '2023_12_09_062859_create_subscriptions_table', 1),
(34, '2023_12_09_130415_create_ads_table', 1),
(35, '2023_12_09_130631_create_user_subscriptions_table', 1),
(36, '2023_12_10_111811_create_app_settings_table', 1),
(37, '2023_12_18_030321_add_city_id_nullable_to_rent_infos_table', 1),
(38, '2023_12_31_105837_create_rent_configs_table', 1),
(39, '2023_12_31_110417_add_is_paid_column_to_rents_table', 1),
(40, '2024_01_01_070015_add_user_is_nullable_to_ads_table', 1),
(41, '2024_01_01_075411_add_ads_show_column_to_app_settings_table', 1),
(42, '2024_01_02_055953_add_payment_status_to_rents_table', 1),
(43, '2024_01_02_093730_create_bkashes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isRead` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'XXLINV5kyEXXgIqnLDbjRqzf1u37H206ihcfawwt', NULL, 'http://localhost', 1, 0, 0, '2024-01-25 07:25:14', '2024-01-25 07:25:14'),
(2, NULL, 'Laravel Password Grant Client', 'PCcK1oRCjF3MIFEBNoqZMeuoX5mpYKrmkO5dMoLb', 'users', 'http://localhost', 0, 1, 0, '2024-01-25 07:25:14', '2024-01-25 07:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-01-25 07:25:14', '2024-01-25 07:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `o_t_p_s`
--

CREATE TABLE `o_t_p_s` (
  `id` bigint UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'root', 'web', '2024-01-25 07:25:12', '2024-01-25 07:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint UNSIGNED NOT NULL,
  `rent_id` bigint UNSIGNED NOT NULL,
  `islam` tinyint(1) NOT NULL DEFAULT '0',
  `hindu` tinyint(1) NOT NULL DEFAULT '0',
  `christian` tinyint(1) NOT NULL DEFAULT '0',
  `bouddho` tinyint(1) NOT NULL DEFAULT '0',
  `any` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Seat Rent','Sublet Rent','Flat Rent','Office','Shop','Others') COLLATE utf8mb4_unicode_ci NOT NULL,
  `washroom` int NOT NULL,
  `balcony` int DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bad` int NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `ads_price` double(8,2) DEFAULT '0.00',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent_configs`
--

CREATE TABLE `rent_configs` (
  `id` bigint UNSIGNED NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent_infos`
--

CREATE TABLE `rent_infos` (
  `id` bigint UNSIGNED NOT NULL,
  `rent_id` bigint UNSIGNED NOT NULL,
  `available_from` date NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `area_id` bigint UNSIGNED DEFAULT NULL,
  `city_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent_thumbnails`
--

CREATE TABLE `rent_thumbnails` (
  `id` bigint UNSIGNED NOT NULL,
  `rent_id` bigint UNSIGNED NOT NULL,
  `media_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'root', 'web', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(2, 'admin', 'web', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(3, 'customer', 'web', '2024-01-25 07:25:12', '2024-01-25 07:25:12'),
(4, 'visitor', 'web', '2024-01-25 07:25:12', '2024-01-25 07:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `number_of_ads` int NOT NULL,
  `duration` int NOT NULL,
  `duration_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `media_id` bigint UNSIGNED DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `additional_phone`, `email_verified_at`, `phone_verified_at`, `media_id`, `password`, `is_approved`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Visitor', 'Thaddeus Howell', 'visitor@example.com', '01234567889', NULL, '2024-01-25 07:25:14', '2024-01-25 07:25:14', 1, '$2y$10$ZTOa7/uQFvAw7zZ21ETeT.yrQZvn1WRgX3cU9F2wtXnsx4OXWuYB.', 0, 'e62HfNfwIU', '2024-01-25 07:25:14', '2024-01-25 07:25:14'),
(2, 'Admin', 'Miss Cecilia Kemmer', 'admin@example.com', '01234567891', NULL, '2024-01-25 07:25:14', '2024-01-25 07:25:14', 2, '$2y$10$L76sIfOkEFI/KZ/cULztou13N2S/nZ2q1.3wWjk1iwoA48LLbyWFS', 1, 'clCuf9741M', '2024-01-25 07:25:14', '2024-01-25 07:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `subscription_id` bigint UNSIGNED NOT NULL,
  `expiry_date` datetime NOT NULL,
  `available_ads` int NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_media_id_foreign` (`media_id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_settings_logo_id_foreign` (`logo_id`),
  ADD KEY `app_settings_favicon_id_foreign` (`favicon_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `areas_lat_lng`
--
ALTER TABLE `areas_lat_lng`
  ADD KEY `areas_lat_lng_area_id_foreign` (`area_id`);

--
-- Indexes for table `bkashes`
--
ALTER TABLE `bkashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costs_rent_id_foreign` (`rent_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `device_keys`
--
ALTER TABLE `device_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_keys_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facilities_rent_id_foreign` (`rent_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_customer_id_foreign` (`customer_id`),
  ADD KEY `favorites_rent_id_foreign` (`rent_id`);

--
-- Indexes for table `for_rents`
--
ALTER TABLE `for_rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `for_rents_rent_id_foreign` (`rent_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `o_t_p_s`
--
ALTER TABLE `o_t_p_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `o_t_p_s_otp_unique` (`otp`),
  ADD UNIQUE KEY `o_t_p_s_token_unique` (`token`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `religions_rent_id_foreign` (`rent_id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rents_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `rent_configs`
--
ALTER TABLE `rent_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_infos`
--
ALTER TABLE `rent_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_infos_rent_id_foreign` (`rent_id`),
  ADD KEY `rent_infos_area_id_foreign` (`area_id`),
  ADD KEY `rent_infos_city_id_foreign` (`city_id`);

--
-- Indexes for table `rent_thumbnails`
--
ALTER TABLE `rent_thumbnails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_thumbnails_rent_id_foreign` (`rent_id`),
  ADD KEY `rent_thumbnails_media_id_foreign` (`media_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_media_id_foreign` (`media_id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `user_subscriptions_subscription_id_foreign` (`subscription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `bkashes`
--
ALTER TABLE `bkashes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_keys`
--
ALTER TABLE `device_keys`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `for_rents`
--
ALTER TABLE `for_rents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `o_t_p_s`
--
ALTER TABLE `o_t_p_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_configs`
--
ALTER TABLE `rent_configs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_infos`
--
ALTER TABLE `rent_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_thumbnails`
--
ALTER TABLE `rent_thumbnails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD CONSTRAINT `app_settings_favicon_id_foreign` FOREIGN KEY (`favicon_id`) REFERENCES `media` (`id`),
  ADD CONSTRAINT `app_settings_logo_id_foreign` FOREIGN KEY (`logo_id`) REFERENCES `media` (`id`);

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `areas` (`id`);

--
-- Constraints for table `areas_lat_lng`
--
ALTER TABLE `areas_lat_lng`
  ADD CONSTRAINT `areas_lat_lng_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `costs`
--
ALTER TABLE `costs`
  ADD CONSTRAINT `costs_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `device_keys`
--
ALTER TABLE `device_keys`
  ADD CONSTRAINT `device_keys_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `favorites_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`);

--
-- Constraints for table `for_rents`
--
ALTER TABLE `for_rents`
  ADD CONSTRAINT `for_rents_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `religions`
--
ALTER TABLE `religions`
  ADD CONSTRAINT `religions_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`);

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `rent_infos`
--
ALTER TABLE `rent_infos`
  ADD CONSTRAINT `rent_infos_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `rent_infos_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `rent_infos_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`);

--
-- Constraints for table `rent_thumbnails`
--
ALTER TABLE `rent_thumbnails`
  ADD CONSTRAINT `rent_thumbnails_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`),
  ADD CONSTRAINT `rent_thumbnails_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Constraints for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD CONSTRAINT `user_subscriptions_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
