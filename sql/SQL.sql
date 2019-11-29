-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2019 at 12:13 AM
-- Server version: 5.6.44-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `StudyMonks`
--

-- --------------------------------------------------------

--
-- Table structure for table `prefix_failed_jobs`
--

CREATE TABLE `prefix_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefix_migrations`
--

CREATE TABLE `prefix_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prefix_migrations`
--

INSERT INTO `prefix_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_22_171712_create_posts_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_09_05_162109_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prefix_model_has_permissions`
--

CREATE TABLE `prefix_model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefix_model_has_roles`
--

CREATE TABLE `prefix_model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prefix_model_has_roles`
--

INSERT INTO `prefix_model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prefix_password_resets`
--

CREATE TABLE `prefix_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefix_permissions`
--

CREATE TABLE `prefix_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prefix_permissions`
--

INSERT INTO `prefix_permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create user', 'web', '2019-09-07 10:38:13', '2019-09-07 11:13:22'),
(2, 'edit user', 'web', '2019-09-07 10:49:09', '2019-09-07 10:49:09'),
(3, 'delete user', 'web', '2019-09-07 10:49:21', '2019-09-07 10:49:21'),
(4, 'view user', 'web', '2019-09-07 11:12:01', '2019-09-07 11:13:30'),
(5, 'create role', 'web', '2019-09-07 11:12:19', '2019-09-07 11:13:40'),
(6, 'edit role', 'web', '2019-09-07 11:12:28', '2019-09-07 11:13:50'),
(7, 'delete role', 'web', '2019-09-07 11:12:36', '2019-09-07 11:13:59'),
(8, 'view role', 'web', '2019-09-07 11:12:51', '2019-09-07 11:12:51'),
(9, 'create permission', 'web', '2019-09-07 11:14:38', '2019-09-07 11:14:38'),
(10, 'edit permission', 'web', '2019-09-07 11:14:56', '2019-09-07 11:14:56'),
(11, 'delete permission', 'web', '2019-09-07 11:15:05', '2019-09-07 11:15:05'),
(12, 'view permission', 'web', '2019-09-07 11:15:15', '2019-09-07 11:15:15'),
(13, 'add post', 'web', '2019-09-07 11:32:36', '2019-09-07 11:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `prefix_roles`
--

CREATE TABLE `prefix_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prefix_roles`
--

INSERT INTO `prefix_roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2019-09-07 10:42:24', '2019-09-07 10:42:24'),
(2, 'user', 'web', '2019-09-07 11:33:35', '2019-09-07 11:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `prefix_role_has_permissions`
--

CREATE TABLE `prefix_role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prefix_role_has_permissions`
--

INSERT INTO `prefix_role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prefix_users`
--

CREATE TABLE `prefix_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'assets/images/faces/face1.jpg',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prefix_users`
--

INSERT INTO `prefix_users` (`id`, `avatar`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'assets/images/faces/face1.jpg', 'Vijendra Maurya', 'admin@gmail.com', NULL, '$2y$10$rSXVKo4lcAV30EoFjQYyVeEGL0VORacpRMTDTWPHO9GfAf46v9.YS', NULL, '2019-09-07 09:16:50', '2019-09-07 11:09:45'),
(2, 'assets/images/faces/face1.jpg', 'Vijendra Sinha', 'user@gmail.com', NULL, '$2y$10$C5Tur/J213.i1qjc4ih8P.OYLUD2OL1r20ZClTy8ng0XNtnd3G662', NULL, '2019-09-07 11:43:38', '2019-09-07 11:43:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prefix_failed_jobs`
--
ALTER TABLE `prefix_failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_migrations`
--
ALTER TABLE `prefix_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_model_has_permissions`
--
ALTER TABLE `prefix_model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `prefix_model_has_roles`
--
ALTER TABLE `prefix_model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `prefix_password_resets`
--
ALTER TABLE `prefix_password_resets`
  ADD KEY `prefix_password_resets_email_index` (`email`);

--
-- Indexes for table `prefix_permissions`
--
ALTER TABLE `prefix_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_roles`
--
ALTER TABLE `prefix_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prefix_role_has_permissions`
--
ALTER TABLE `prefix_role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `prefix_role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `prefix_users`
--
ALTER TABLE `prefix_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prefix_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prefix_failed_jobs`
--
ALTER TABLE `prefix_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prefix_migrations`
--
ALTER TABLE `prefix_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prefix_permissions`
--
ALTER TABLE `prefix_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `prefix_roles`
--
ALTER TABLE `prefix_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prefix_users`
--
ALTER TABLE `prefix_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
