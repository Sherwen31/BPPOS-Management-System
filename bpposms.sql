-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 03:30 AM
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
-- Database: `bpposms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `evaluation_items`
--

CREATE TABLE `evaluation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evaluation_id` bigint(20) UNSIGNED NOT NULL,
  `performance_indications` varchar(255) DEFAULT NULL,
  `point_allocation` decimal(8,1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `evaluation_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evaluation_item_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `numerical_rating` int(11) DEFAULT NULL,
  `weight_score` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_positions_table', 1),
(2, '0001_01_01_000002_create_units_table', 1),
(3, '0001_01_01_000004_create_users_table', 1),
(4, '0001_01_01_000006_create_cache_table', 1),
(5, '0001_01_01_000007_create_jobs_table', 1),
(6, '2024_08_26_053014_create_permission_tables', 1),
(7, '2024_09_21_013026_create_evaluations_table', 2),
(8, '2024_09_21_013037_create_evaluation_items_table', 2),
(9, '2024_09_21_013057_create_evaluation_ratings_table', 2),
(10, '2024_09_21_013038_create_evaluation_items_table', 3),
(11, '2024_09_21_013058_create_evaluation_ratings_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'access-all-pages', 'web', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(2, 'access-admin-pages', 'web', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(3, 'access-user-pages', 'web', '2024-09-19 00:18:52', '2024-09-19 00:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `created_at`, `updated_at`) VALUES
(1, 'Chief of Police', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(2, 'Deputy Chief', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(3, 'Captain', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(4, 'Lieutenant', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(5, 'Sergeant', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(6, 'Detective', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(7, 'Officer', '2024-09-19 00:18:52', '2024-09-19 00:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(2, 'admin', 'web', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(3, 'user', 'web', '2024-09-19 00:18:52', '2024-09-19 00:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qGbyOZInaXdVpkxRI2PlYLdon415MW40HJRG98AL', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieEVGSXF1SHBWcTVaT0ZGU0VYbHRVQkd4UzlNbnBtQWpMeG5jYVlVNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMS9zdXBlci1hZG1pbi9wcmludC9wcmludGluZy1kZXRhaWxzL3ByZXZpZXcvOC8xMjMxMjMvaW5mbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1727141412);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_assignment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_assignment`, `created_at`, `updated_at`) VALUES
(1, 'Homicide Unit', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(2, 'Cybercrime Unit', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(3, 'Narcotics Unit', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(4, 'Traffic Unit', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(5, 'Patrol Unit', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(6, 'K-9 Unit', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(7, 'Internal Affairs', '2024-09-19 00:18:52', '2024-09-19 00:18:52'),
(8, 'Special Weapons and Tactics (SWAT)', '2024-09-19 00:18:52', '2024-09-19 00:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Not selected','') DEFAULT NULL,
  `police_id` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `year_attended` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `middle_name`, `username`, `date_of_birth`, `gender`, `police_id`, `contact_number`, `rank`, `position_id`, `unit_id`, `address`, `year_attended`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Doe', 'John', 'Boltiks', 'johndoe', NULL, NULL, '1234-1234', '09123456789', 'Police Executive Master Sergeant', 5, 5, 'New York City', '2020-10-10', 'johndoe@gmail.com', '2024-09-19 00:18:52', '$2y$12$3j7mLxmxhUFuBNMO/gkIpeimERUsml0t5IX9T9S3UlcgrjGFH/8p2', NULL, '2024-09-19 00:18:53', '2024-09-19 00:18:53'),
(2, 'Admin', 'Admin', NULL, 'admin', NULL, NULL, 'admin', '09123456789', 'Assistant Chief', 2, 2, 'Los Angeles', '2019-08-08', 'admin@gmail.com', '2024-09-19 00:18:53', '$2y$12$aHyQx5mcl/wtnoNSUSfM1udrSJtKXl6GOpucpk0Ct2tY6gh1fZgB2', NULL, '2024-09-19 00:18:53', '2024-09-19 16:41:11'),
(3, 'Administrator', 'Super', NULL, 'superadmin', '2001-06-01', 'Male', '123-124124', '09123456789', 'Director-General', 1, 1, 'USA', '2019-08-08', 'super_admin@gmail.com', '2024-09-19 00:18:53', '$2y$12$x/8ov8wbPYz4HmnxTwj1BewGyIBlSJTAISO/hZ4zh0pnXCG63XOfa', NULL, '2024-09-19 00:18:53', '2024-09-19 21:10:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_items`
--
ALTER TABLE `evaluation_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_items_evaluation_id_foreign` (`evaluation_id`);

--
-- Indexes for table `evaluation_ratings`
--
ALTER TABLE `evaluation_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_ratings_evaluation_item_id_foreign` (`evaluation_item_id`),
  ADD KEY `evaluation_ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_position_id_foreign` (`position_id`),
  ADD KEY `users_unit_id_foreign` (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `evaluation_items`
--
ALTER TABLE `evaluation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `evaluation_ratings`
--
ALTER TABLE `evaluation_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `evaluation_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
