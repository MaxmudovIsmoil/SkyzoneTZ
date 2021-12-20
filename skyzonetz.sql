-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 07:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skyzonetz`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `user_id`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '998332087090', '2021-12-19 04:27:11', '2021-12-19 04:27:11', NULL),
(3, 1, '915487592', '2021-12-19 04:52:00', '2021-12-19 04:52:00', NULL),
(4, 1, '998975486513', '2021-12-19 04:52:09', '2021-12-19 04:52:09', NULL),
(5, 4, '903096574', '2021-12-19 11:44:01', '2021-12-19 11:44:01', NULL),
(6, 4, '978465196', '2021-12-19 11:47:59', '2021-12-19 11:47:59', NULL),
(7, 4, '932329590', '2021-12-19 12:07:22', '2021-12-19 12:07:22', NULL),
(8, 1, '125545300', '2021-12-20 03:05:14', '2021-12-20 03:05:14', NULL),
(9, 2, '998978465123', '2021-12-20 03:06:50', '2021-12-20 03:06:50', NULL),
(10, 2, '915435871', '2021-12-20 03:07:00', '2021-12-20 03:07:00', NULL),
(11, 2, '996581005', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(12, 2, '996581006', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(13, 2, '996581007', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(14, 2, '996581008', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(15, 2, '996581009', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(16, 2, '996581010', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(17, 2, '996581011', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(18, 2, '996581012', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(19, 2, '996581013', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(20, 2, '996581014', '2021-12-20 04:26:46', '2021-12-20 04:26:46', NULL),
(21, 1, '996581025', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL),
(22, 1, '996581026', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL),
(23, 1, '996581027', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL),
(24, 1, '996581028', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL),
(25, 1, '996581029', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL),
(26, 1, '996581030', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL),
(27, 1, '996581031', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL),
(28, 1, '996581032', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL),
(29, 1, '996581033', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL),
(30, 1, '996581034', '2021-12-20 04:51:45', '2021-12-20 04:51:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sys_admin` tinyint(1) NOT NULL DEFAULT 2,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `sys_admin`, `active`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$10$u83FMfMtIsYDbIEy.D0AB.dAHyZvGwmqjO2NjwMs91JlQ9HjyargK', 'Ismoil', 1, 1, '', NULL, NULL, '2021-11-08 02:02:35', NULL, NULL),
(2, 'umidjon', '$2y$10$DoI7ij93H5qYSVLY98sutuzPIlx21.bzCrnxoFLFUe5fHLbGhFD2S', 'Umidjon', 2, 0, 'test@gmail.com', NULL, NULL, '2021-12-19 05:42:51', '2021-12-20 05:36:23', NULL),
(3, 'javohir', '$2y$10$u83FMfMtIsYDbIEy.D0AB.dAHyZvGwmqjO2NjwMs91JlQ9HjyargK', 'Javohir', 2, 1, 'user@gmail.com', NULL, NULL, '2021-12-19 05:26:02', '2021-12-20 05:25:54', NULL),
(4, 'bek', '$2y$10$lhFg3yDTFjS2wmVJ3e0cm.F7UgQ/PE3PlNWLD.npd9xKAVCw/s0Se', 'Bekmurod', 2, 1, 'sss@gmail.com', NULL, NULL, '2021-12-19 05:53:55', '2021-12-20 06:12:29', NULL),
(5, 'gayrat', '$2y$10$d70W87TMF6GAsu2UQg4xtegR6dRJBR/7aSBBqrfpn5R2GW7W/NXYe', 'G\'ayrat', 2, 1, 'aa@gmail.com', NULL, NULL, '2021-12-19 06:09:24', '2021-12-20 05:26:06', NULL),
(6, 'azizbek', '$2y$10$LzdGHMGLkWI/jeTS3Ti.zOmfMQUKjtGrLdHwkXbSzhcc2r5gdEZdu', 'Azizbek', 2, 1, 'we@gmail.com', NULL, NULL, '2021-12-19 06:15:31', '2021-12-20 05:34:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
