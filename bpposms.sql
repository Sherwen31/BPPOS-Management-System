-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2024 at 02:09 AM
-- Server version: 8.2.0
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpposms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `title`, `sub_title`, `created_at`, `updated_at`) VALUES
(1, 'Output', '25', '2024-09-20 19:00:41', '2024-09-20 19:00:41'),
(2, 'Job Knowledge', '25', '2024-09-20 19:01:29', '2024-09-20 19:01:29'),
(3, 'Work Management', '15', '2024-09-20 19:01:39', '2024-09-20 19:01:39'),
(4, 'Interpersonal Relationship', '15', '2024-09-20 19:01:51', '2024-09-20 19:01:51'),
(5, 'Concern for the Organization', '10', '2024-09-20 19:01:59', '2024-09-20 19:01:59'),
(6, 'Personal Qualities', '10', '2024-09-20 19:02:12', '2024-09-20 19:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_attachments`
--

DROP TABLE IF EXISTS `evaluation_attachments`;
CREATE TABLE IF NOT EXISTS `evaluation_attachments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `evaluation_item_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `attachment` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluation_attachments_evaluation_item_id_foreign` (`evaluation_item_id`),
  KEY `evaluation_attachments_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation_attachments`
--

INSERT INTO `evaluation_attachments` (`id`, `evaluation_item_id`, `user_id`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'uploaded-attachments/d1DZyhnSJbz9ciTycd15EuN69ts4Y2QhmzQEV07S.jpg', '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(2, 2, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(3, 3, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(4, 4, 1, 'uploaded-attachments/dQm2vyS78WfwKdpOwsNaUzdd74eGxfeIGKVuN5cf.jpg', '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(5, 5, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(6, 6, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(7, 9, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(8, 10, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(9, 11, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(10, 12, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(11, 13, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(12, 14, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(13, 15, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(14, 16, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(15, 17, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(16, 18, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(17, 19, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(18, 20, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(19, 21, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(20, 22, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(21, 23, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(22, 24, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(23, 25, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(24, 26, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(25, 27, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(26, 28, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01'),
(27, 29, 1, NULL, '2024-11-10 18:30:01', '2024-11-10 18:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_items`
--

DROP TABLE IF EXISTS `evaluation_items`;
CREATE TABLE IF NOT EXISTS `evaluation_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `evaluation_id` bigint UNSIGNED NOT NULL,
  `performance_indications` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point_allocation` decimal(8,1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluation_items_evaluation_id_foreign` (`evaluation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation_items`
--

INSERT INTO `evaluation_items` (`id`, `evaluation_id`, `performance_indications`, `point_allocation`, `created_at`, `updated_at`) VALUES
(1, 1, 'a. Quality of Work', 7.0, '2024-09-20 19:09:57', '2024-09-20 19:09:57'),
(2, 1, 'b. Timeliness of Work', 6.0, '2024-09-20 19:10:54', '2024-09-20 19:10:54'),
(3, 1, 'c. Acceptability of output base on standard', 6.0, '2024-09-20 19:11:05', '2024-09-20 19:11:05'),
(4, 1, 'd. Accomplishment of target', 6.0, '2024-09-20 19:11:16', '2024-09-20 19:11:16'),
(5, 2, 'a. Understanding of the job description', 6.0, '2024-09-20 19:11:31', '2024-09-20 19:11:31'),
(6, 2, 'b. Awareness of the vision, mission and objectives of the organization', 6.0, '2024-09-20 19:11:43', '2024-09-20 19:11:43'),
(9, 2, 'c. Community Oriented Policing System', 6.0, '2024-09-20 19:22:13', '2024-09-20 19:22:13'),
(10, 2, 'd. Creativity / Resourcefulness', 6.0, '2024-09-20 19:22:20', '2024-09-20 19:22:20'),
(11, 2, 'e. Analytical Ability', 6.0, '2024-09-20 19:22:26', '2024-09-20 19:22:26'),
(12, 2, 'f. Ability to solve problems/troubleshooting', 6.0, '2024-09-20 19:22:34', '2024-09-20 19:22:34'),
(13, 2, 'g. Oral and written communication', 6.0, '2024-09-20 19:22:40', '2024-09-20 19:22:40'),
(14, 2, 'h. Law Enforcement & Maintenance of Law/Order', 6.0, '2024-09-20 19:22:49', '2024-09-20 19:22:49'),
(15, 3, 'a. Records Management & Submission of Reports', 6.0, '2024-09-20 19:24:15', '2024-09-20 19:24:15'),
(16, 3, 'b. Compliance with & Implementation of Policies', 6.0, '2024-09-20 19:24:25', '2024-09-20 19:24:25'),
(17, 3, 'c. Sense of Priority', 6.0, '2024-09-20 19:24:30', '2024-09-20 19:24:30'),
(18, 3, 'd. Client Satisfaction / Orientation', 6.0, '2024-09-20 19:24:35', '2024-09-20 19:24:35'),
(19, 3, 'e. Cost effectiveness', 6.0, '2024-09-20 19:24:42', '2024-09-20 19:24:42'),
(20, 3, 'f. Involvement / Presence in Activities', 6.0, '2024-09-20 19:24:49', '2024-09-20 19:24:49'),
(21, 4, 'a. Receptive to ideas/suggestions', 6.0, '2024-09-20 19:25:14', '2024-09-20 19:25:14'),
(22, 4, 'b. Teamwork Management', 6.0, '2024-09-20 19:25:20', '2024-09-20 19:25:20'),
(23, 4, 'c. Build Linkages and networks', 6.0, '2024-09-20 19:25:25', '2024-09-20 19:25:25'),
(24, 4, 'd. Ability to lead and follow', 6.0, '2024-09-20 19:25:32', '2024-09-20 19:25:32'),
(25, 4, 'e. Motivation', 6.0, '2024-09-20 19:25:37', '2024-09-20 19:25:37'),
(26, 5, 'a. Stewardship of unit\'s properties', 6.0, '2024-09-20 19:25:53', '2024-09-20 19:25:53'),
(27, 5, 'b. Preservation of unit interest', 6.0, '2024-09-20 19:25:59', '2024-09-20 19:25:59'),
(28, 5, 'c. Coordination', 6.0, '2024-09-20 19:26:04', '2024-09-20 19:26:04'),
(29, 6, 'Personal Trait', 6.0, '2024-09-20 19:31:17', '2024-09-20 19:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_ratings`
--

DROP TABLE IF EXISTS `evaluation_ratings`;
CREATE TABLE IF NOT EXISTS `evaluation_ratings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `evaluation_item_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_rater_id` bigint UNSIGNED NOT NULL,
  `user_reviewer_id` bigint UNSIGNED NOT NULL,
  `numerical_rating` int DEFAULT NULL,
  `weight_score` int DEFAULT '0',
  `attachment` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluation_ratings_evaluation_item_id_foreign` (`evaluation_item_id`),
  KEY `evaluation_ratings_user_id_foreign` (`user_id`),
  KEY `evaluation_ratings_user_rater_id_foreign` (`user_rater_id`),
  KEY `evaluation_ratings_user_reviewer_id_foreign` (`user_reviewer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation_ratings`
--

INSERT INTO `evaluation_ratings` (`id`, `evaluation_item_id`, `user_id`, `user_rater_id`, `user_reviewer_id`, `numerical_rating`, `weight_score`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 4, 5, 35, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(2, 2, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(3, 3, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(4, 4, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(5, 5, 2, 3, 4, 4, 24, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(6, 6, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(7, 9, 2, 3, 4, 4, 24, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(8, 10, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(9, 11, 2, 3, 4, 4, 24, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(10, 12, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(11, 13, 2, 3, 4, 4, 24, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(12, 14, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(13, 15, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(14, 16, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(15, 17, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(16, 18, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(17, 19, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(18, 20, 2, 3, 4, 3, 18, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(19, 21, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(20, 22, 2, 3, 4, 4, 24, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(21, 23, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(22, 24, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(23, 25, 2, 3, 4, 4, 24, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(24, 26, 2, 3, 4, 2, 12, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(25, 27, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(26, 28, 2, 3, 4, 3, 18, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(27, 29, 2, 3, 4, 5, 30, NULL, '2024-03-31 17:53:21', '2024-03-31 17:53:21'),
(28, 1, 2, 3, 4, 5, 35, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(29, 2, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(30, 3, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(31, 4, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(32, 5, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(33, 6, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(34, 9, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(35, 10, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(36, 11, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(37, 12, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(38, 13, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(39, 14, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(40, 15, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(41, 16, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(42, 17, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(43, 18, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(44, 19, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(45, 20, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(46, 21, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(47, 22, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(48, 23, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(49, 24, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(50, 25, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(51, 26, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(52, 27, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(53, 28, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20'),
(54, 29, 2, 3, 4, 5, 30, NULL, '2024-11-11 17:55:20', '2024-11-11 17:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_positions_table', 1),
(2, '0001_01_01_000002_create_units_table', 1),
(3, '0001_01_01_000003_create_ranks_table', 1),
(4, '0001_01_01_000005_create_users_table', 1),
(5, '0001_01_01_000006_create_cache_table', 1),
(6, '0001_01_01_000007_create_jobs_table', 1),
(7, '2024_08_26_053014_create_permission_tables', 1),
(8, '2024_09_21_013026_create_evaluations_table', 1),
(9, '2024_09_21_013038_create_evaluation_items_table', 1),
(10, '2024_09_21_013058_create_evaluation_ratings_table', 1),
(11, '2024_10_14_060021_create_performance_report_items_table', 1),
(12, '2024_10_14_060031_create_performance_report_ratings_table', 1),
(13, '2024_09_21_013063_create_evaluation_ratings_table', 2),
(14, '2024_11_08_083248_create_evaluation_attachments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_report_items`
--

DROP TABLE IF EXISTS `performance_report_items`;
CREATE TABLE IF NOT EXISTS `performance_report_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measures` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `targets` int DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_report_items`
--

INSERT INTO `performance_report_items` (`id`, `activity`, `measures`, `targets`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'a. Monitor and comply submission of report to higher headquarters.', 'No. of submitted report', 5, 'Weekly', '2024-10-13 23:15:36', '2024-10-13 23:15:36'),
(2, 'b. Monitor and consolidation of initial incidents reports from all lower units/police station to Regional HQS and perform other operational duties as needed.', 'No. of prepared and submitted list', 80, 'Weekly', '2024-10-13 23:17:47', '2024-10-13 23:17:47'),
(3, 'c. Monitored received calls, text message and instruction from Higher Headquarters and disseminate to lower units concerned.', 'No. of received calls and text', NULL, 'Weekly', '2024-10-13 23:19:19', '2024-10-13 23:19:19'),
(4, 'd. Perform other tasks as directed by the POMU Officer.', 'No. of consolidated reports', 100, 'Weekly', '2024-10-13 23:19:37', '2024-10-13 23:19:37'),
(5, 'e. Perform other duties as directed by POMU.', 'No. of performed duties', 5, 'Weekly', '2024-10-13 23:19:53', '2024-10-13 23:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `performance_report_ratings`
--

DROP TABLE IF EXISTS `performance_report_ratings`;
CREATE TABLE IF NOT EXISTS `performance_report_ratings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `performance_report_item_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `monday` int DEFAULT '0',
  `tuesday` int DEFAULT '0',
  `wednesday` int DEFAULT '0',
  `thursday` int DEFAULT '0',
  `friday` int DEFAULT '0',
  `saturday` int DEFAULT '0',
  `sunday` int DEFAULT '0',
  `total` int DEFAULT '0',
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `performance_report_ratings_performance_report_item_id_foreign` (`performance_report_item_id`),
  KEY `performance_report_ratings_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_report_ratings`
--

INSERT INTO `performance_report_ratings` (`id`, `performance_report_item_id`, `user_id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `total`, `cost`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 5, 5, 5, 5, 5, 5, 35, '54564', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:20:59', '2024-10-29 00:20:59'),
(2, 2, 1, 5, 5, 5, 55, 5, 5, 5, 85, '65654', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:20:59', '2024-10-29 00:20:59'),
(3, 3, 1, 555, 5, 5, 5, 55, 5, 5, 635, '5', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:20:59', '2024-10-29 00:20:59'),
(4, 4, 1, 5, 5, 5, 55, 5, 5, 55, 135, '5454', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:20:59', '2024-10-29 00:20:59'),
(5, 5, 1, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:20:59', '2024-10-29 00:20:59'),
(6, 1, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-10-29 00:27:14', '2024-10-29 00:27:14'),
(7, 2, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-10-29 00:27:14', '2024-10-29 00:27:14'),
(8, 3, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-10-29 00:27:14', '2024-10-29 00:27:14'),
(9, 4, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-10-29 00:27:14', '2024-10-29 00:27:14'),
(10, 5, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-10-29 00:27:14', '2024-10-29 00:27:14'),
(11, 1, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:27:55', '2024-10-29 00:27:55'),
(12, 2, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:27:55', '2024-10-29 00:27:55'),
(13, 3, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:27:55', '2024-10-29 00:27:55'),
(14, 4, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:27:55', '2024-10-29 00:27:55'),
(15, 5, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-10-28 00:00:00', '2024-11-03 00:00:00', '2024-10-29 00:27:55', '2024-10-29 00:27:55'),
(16, 1, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:49:00', '2024-11-20 01:49:00'),
(17, 2, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:49:00', '2024-11-20 01:49:00'),
(18, 3, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:49:00', '2024-11-20 01:49:00'),
(19, 4, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:49:00', '2024-11-20 01:49:00'),
(20, 5, 2, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:49:00', '2024-11-20 01:49:00'),
(21, 1, 1, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:51:26', '2024-11-20 01:51:26'),
(22, 2, 1, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:51:26', '2024-11-20 01:51:26'),
(23, 3, 1, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:51:26', '2024-11-20 01:51:26'),
(24, 4, 1, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:51:26', '2024-11-20 01:51:26'),
(25, 5, 1, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-18 00:00:00', '2024-11-24 00:00:00', '2024-11-20 01:51:26', '2024-11-20 01:51:26'),
(26, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '0', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-11-07 01:02:38', '2024-11-07 01:02:38'),
(27, 2, 1, 1, 1, 1, 11, 1, 0, 0, 15, '0', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-11-07 01:02:38', '2024-11-07 01:02:38'),
(28, 3, 1, 1, 1, 1, 1, 1, 1, 1, 7, '1', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-11-07 01:02:38', '2024-11-07 01:02:38'),
(29, 4, 1, 5, 5, 5, 5, 5, 5, 5, 35, '5', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-11-07 01:02:38', '2024-11-07 01:02:38'),
(30, 5, 1, 5, 21, 21, 21, 212, 1, 21, 302, '0', '2024-11-04 00:00:00', '2024-11-10 00:00:00', '2024-11-07 01:02:38', '2024-11-07 01:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'access-all-pages', 'web', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(2, 'access-admin-pages', 'web', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(3, 'access-user-pages', 'web', '2024-10-28 18:41:51', '2024-10-28 18:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `created_at`, `updated_at`) VALUES
(1, 'Provincial Director', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(2, 'City Director', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(3, 'Chief of Police', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(4, 'Station Commander', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(5, 'Precinct Commander', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(6, 'Chief, Criminal Investigation and Detection Group (CIDG)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(7, 'Director, Highway Patrol Group (HPG)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(8, 'Cief, Special Action Forces (SAF)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(9, 'Chief, Internal Affairs Services (IAS)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(10, 'Chief, Personnel and Records Management', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(11, 'Chief, Finance Service', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(12, 'Chief, Logistics', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(13, 'Chief, Public Information Office', '2024-10-28 18:41:51', '2024-10-28 18:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
CREATE TABLE IF NOT EXISTS `ranks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `rank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `rank_name`, `created_at`, `updated_at`) VALUES
(1, 'Police General (PGEN)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(2, 'Police Lieutenant General (PLTGEN)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(3, 'Police Brigadier General (PBGEN)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(4, 'Police Colonel (PCOL)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(5, 'Police Lieutenant Colonel (PLTCOL)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(6, 'Police Major (PMAJ)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(7, 'Police Captain (PCPT)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(8, 'Police Lieutenant (PLT)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(9, 'Police Executive Master Sergeant (PEMS)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(10, 'Police Chief Master Sergeant (PCMS)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(11, 'Police Senior Master Sergeant (PSMS)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(12, 'Police Master Sergeant (PMSg)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(13, 'Police Staff Sergeant (PSSg)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(14, 'Police Corporal (PCpl)', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(15, 'Patrolman/Patrolwoman (Pat)', '2024-10-28 18:41:51', '2024-10-28 18:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(2, 'admin', 'web', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(3, 'user', 'web', '2024-10-28 18:41:51', '2024-10-28 18:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(2, 2),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('10Hld0NS522YbwcxAm73rUTxJbXlHPYfA1ML2ZFC', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicHhDSzIwUVFtWDQzSmlnMXdqbTg3empiRXRnR3hGRnBCcWltTmY2MiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjEwODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL215LWV2YWx1YXRpb24tc2NvcmUvMjAyNC0wNC0wMSUyMDAxOjUzOjIxL015JTIwTGFzdCUyME5hbWUvQWRtaW5pc3RyYXRvci9hZG1pbi8yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1731377108),
('3AokyaLuPQKtSiNeX5sCyLZVMTSjvpxGEx0nTIAL', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMTVXY3d0cWJNVVVOams0azIxU0x1bGg5VTJSM3djU1RKenFla2dLdCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2MDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3N1cGVyLWFkbWluL2V2YWx1YXRpb24vdXNlci1ldmFsdWF0aW9uIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zdXBlci1hZG1pbi9ldmFsdWF0aW9uL3VzZXItZXZhbHVhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1735720625),
('fcOrW3Aq1Ga4RZJDk8x4AYjXb1Uckp8s7O8BUpmc', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVzlVVzhUYkR5ajNTTUxVYWtEQVdBcVlOOFkxWWhrdmNVbG9BdVpyWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zdXBlci1hZG1pbi9ldmFsdWF0aW9uL3VzZXItZXZhbHVhdGlvbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1731377044),
('lNXgdMEVewTPACupImflDLhrDuzW9gHHcaXr8ppC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTkRvZmZsTlYwZWo1ckczdVlpRG9RaW5wWU5MakwyUjNFODBXUThycyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo2MDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3N1cGVyLWFkbWluL2V2YWx1YXRpb24vdXNlci1ldmFsdWF0aW9uIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1731376455);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_assignment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_assignment`, `created_at`, `updated_at`) VALUES
(1, 'Homicide Unit', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(2, 'Cybercrime Unit', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(3, 'Narcotics Unit', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(4, 'Traffic Unit', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(5, 'Patrol Unit', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(6, 'K-9 Unit', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(7, 'Internal Affairs', '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(8, 'Special Weapons and Tactics (SWAT)', '2024-10-28 18:41:51', '2024-10-28 18:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_picture` longtext COLLATE utf8mb4_unicode_ci,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `rank_id` bigint UNSIGNED NOT NULL,
  `year_attended` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` enum('Married','Single','Widowed','Divorced','Separated','Engaged','Not selected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female','Not selected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_position_id_foreign` (`position_id`),
  KEY `users_unit_id_foreign` (`unit_id`),
  KEY `users_rank_id_foreign` (`rank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_picture`, `last_name`, `first_name`, `middle_name`, `username`, `police_id`, `position_id`, `unit_id`, `rank_id`, `year_attended`, `contact_number`, `age`, `nationality`, `religion`, `address`, `email`, `date_of_birth`, `civil_status`, `gender`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Doe', 'John', 'Optional', 'johndoe', '1234-1234', 5, 5, 2, '2020-10-10', '09123456789', '25', 'Filipino', 'Catholic', 'New York City', 'johndoe@gmail.com', '1998-10-13', 'Married', 'Male', '2024-10-28 18:41:51', '$2y$12$YxqgxqCdwCFmXbn271cdn..8i1eklMpuiJqKA3nxist4GGr497Dei', NULL, '2024-10-28 18:41:51', '2024-11-07 00:53:14'),
(2, 'profile_attachments/XJ0vUB4FeZOaHQlzQlZifwBjrbykm1Q1Ug0Fr95X.jpg', 'My Last Name', 'Administrator', NULL, 'admin', 'admin', 2, 5, 5, '2019-08-08', '09123456789', '12', 'Filipino', 'Catholic', 'Los Angeles', 'admin@gmail.com', '2024-11-12', 'Married', 'Male', '2024-10-28 18:41:51', '$2y$12$Epau5mHabKOmf5lndSvH6eZzh3KeWlas0QCqDHG.lTT3KnwSg5gRu', NULL, '2024-10-28 18:41:51', '2024-11-11 17:44:53'),
(3, NULL, 'Administrator', 'Super', NULL, 'super_admin', 'super_admin', 1, 1, 3, '2019-08-08', '09123456789', NULL, NULL, NULL, 'USA', 'super_admin@gmail.com', NULL, NULL, NULL, '2024-10-28 18:41:51', '$2y$12$IeWyBRhJoKviB9ZtPJ13IujzmrAwEepVOZrJEWOl.j3BY7l9vbyRC', NULL, '2024-10-28 18:41:51', '2024-10-28 18:41:51'),
(4, NULL, 'Mascarinas', 'Allan', '', 'allan', '2112332', 12, 1, 1, '2022-09-15', NULL, NULL, NULL, NULL, NULL, 'allan@gmail.com', NULL, NULL, NULL, '2024-10-28 19:16:24', '$2y$12$hyvXEFzws2cKOH0FIo/f7upIsDnNfFVp94TOCHRbNV7jXVrf7zOua', NULL, '2024-10-28 19:16:24', '2024-10-28 19:16:24'),
(5, NULL, 'asd', 'asd', 'asd', 'user', '123213', 12, 1, 14, '2024-10-17', '12345678901', '52', 'asd', 'asd', 'asd', 'asd@gmail.com', '2024-10-14', 'Widowed', 'Male', '2024-10-29 19:25:38', '$2y$12$fla99rCr1zhNgVZLrB3I..6Etjfzm.KUdQgooIQHdTv2ecOqa8HyW', NULL, '2024-10-29 19:25:38', '2024-10-29 19:25:38');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluation_attachments`
--
ALTER TABLE `evaluation_attachments`
  ADD CONSTRAINT `evaluation_attachments_evaluation_item_id_foreign` FOREIGN KEY (`evaluation_item_id`) REFERENCES `evaluation_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_attachments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluation_items`
--
ALTER TABLE `evaluation_items`
  ADD CONSTRAINT `evaluation_items_evaluation_id_foreign` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluation_ratings`
--
ALTER TABLE `evaluation_ratings`
  ADD CONSTRAINT `evaluation_ratings_evaluation_item_id_foreign` FOREIGN KEY (`evaluation_item_id`) REFERENCES `evaluation_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_ratings_user_rater_id_foreign` FOREIGN KEY (`user_rater_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluation_ratings_user_reviewer_id_foreign` FOREIGN KEY (`user_reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `performance_report_ratings`
--
ALTER TABLE `performance_report_ratings`
  ADD CONSTRAINT `performance_report_ratings_performance_report_item_id_foreign` FOREIGN KEY (`performance_report_item_id`) REFERENCES `performance_report_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `performance_report_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `users_rank_id_foreign` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`),
  ADD CONSTRAINT `users_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
