-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 02:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisi_sig_test`
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
-- Table structure for table `i_error_application`
--

CREATE TABLE `i_error_application` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `modules` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_line` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_message` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `param` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_level` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_name` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_link` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_icon` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_level`, `menu_name`, `menu_link`, `menu_icon`, `parent_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Dashboard', 'http://localhost:8000', NULL, NULL, '1', '1', '2023-01-20 09:58:22', '2023-01-20 09:58:22', NULL),
(2, 1, 'Menu', 'http://localhost:8000/menus', NULL, NULL, '1', '1', '2023-01-20 09:58:22', '2023-01-20 09:58:22', NULL),
(3, 1, 'Menu Level', 'http://localhost:8000/menu-levels', NULL, NULL, '1', '1', '2023-01-20 09:58:22', '2023-01-20 09:58:22', NULL),
(4, 1, 'User', 'http://localhost:8000/users', NULL, NULL, '1', '1', '2023-01-20 09:58:22', '2023-01-20 09:58:22', NULL),
(5, 1, 'Log Error', 'http://localhost:8000/logs', NULL, NULL, '1', '1', '2023-01-20 09:58:22', '2023-01-20 09:58:22', NULL),
(6, 1, 'Activity User', 'http://localhost:8000/activities', NULL, NULL, '1', '1', '2023-01-20 09:58:22', '2023-01-20 09:58:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_level`
--

CREATE TABLE `menu_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_level`
--

INSERT INTO `menu_level` (`id`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Superuser', '2023-01-20 09:58:22', '2023-01-20 09:58:22', NULL),
(2, 'User', '2023-01-20 09:58:22', '2023-01-20 09:58:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_user`
--

CREATE TABLE `menu_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_user`
--

INSERT INTO `menu_user` (`id`, `user_id`, `menu_id`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '1', '2023-01-20 09:58:22', '2023-01-20 10:10:55', '2023-01-20 10:10:55'),
(2, 1, 2, '1', '2023-01-20 09:58:22', '2023-01-20 10:10:55', '2023-01-20 10:10:55'),
(3, 1, 3, '1', '2023-01-20 09:58:22', '2023-01-20 10:10:55', '2023-01-20 10:10:55'),
(4, 1, 4, '1', '2023-01-20 09:58:22', '2023-01-20 10:10:55', '2023-01-20 10:10:55'),
(5, 1, 5, '1', '2023-01-20 09:58:22', '2023-01-20 10:10:55', '2023-01-20 10:10:55'),
(6, 1, 6, '1', '2023-01-20 09:58:22', '2023-01-20 10:10:55', '2023-01-20 10:10:55'),
(7, 1, 1, '1', '2023-01-20 10:10:55', '2023-01-21 03:52:14', '2023-01-21 03:52:14'),
(8, 1, 2, '1', '2023-01-20 10:10:55', '2023-01-21 03:52:14', '2023-01-21 03:52:14'),
(9, 1, 3, '1', '2023-01-20 10:10:55', '2023-01-21 03:52:14', '2023-01-21 03:52:14'),
(10, 1, 4, '1', '2023-01-20 10:10:55', '2023-01-21 03:52:14', '2023-01-21 03:52:14'),
(11, 1, 5, '1', '2023-01-20 10:10:55', '2023-01-21 03:52:14', '2023-01-21 03:52:14'),
(12, 1, 6, '1', '2023-01-20 10:10:55', '2023-01-21 03:52:14', '2023-01-21 03:52:14'),
(13, 1, 1, '1', '2023-01-21 03:52:14', '2023-01-21 04:35:56', '2023-01-21 04:35:56'),
(14, 1, 2, '1', '2023-01-21 03:52:14', '2023-01-21 04:35:56', '2023-01-21 04:35:56'),
(15, 1, 3, '1', '2023-01-21 03:52:14', '2023-01-21 04:35:56', '2023-01-21 04:35:56'),
(16, 1, 4, '1', '2023-01-21 03:52:14', '2023-01-21 04:35:56', '2023-01-21 04:35:56'),
(17, 1, 5, '1', '2023-01-21 03:52:14', '2023-01-21 04:35:56', '2023-01-21 04:35:56'),
(18, 1, 6, '1', '2023-01-21 03:52:14', '2023-01-21 04:35:56', '2023-01-21 04:35:56'),
(19, 1, 1, '1', '2023-01-21 04:35:56', '2023-01-21 04:35:56', NULL),
(20, 1, 2, '1', '2023-01-21 04:35:56', '2023-01-21 04:35:56', NULL),
(21, 1, 3, '1', '2023-01-21 04:35:56', '2023-01-21 04:35:56', NULL),
(22, 1, 4, '1', '2023-01-21 04:35:56', '2023-01-21 04:35:56', NULL),
(23, 1, 5, '1', '2023-01-21 04:35:56', '2023-01-21 04:35:56', NULL),
(24, 1, 6, '1', '2023-01-21 04:35:56', '2023-01-21 04:35:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_19_144531_create_menu_user_table', 1),
(6, '2023_01_19_144902_create_menu_level_table', 1),
(7, '2023_01_19_145006_create_menu_table', 1),
(8, '2023_01_19_145304_create_user_foto_table', 1),
(9, '2023_01_19_145713_create_user_activity_table', 1),
(10, '2023_01_19_145951_create_i_error_application_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_jenis_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `no_hp`, `wa`, `pin`, `id_jenis_user`, `status_user`, `created_by`, `updated_by`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Roziq', '$2y$10$LzcOLwHE8R7PPhPhNmkmDefkMWcqdisKJ.YrkWrqCJwReF0vesnZ6', 'bauroziq@gmail.com', NULL, NULL, NULL, NULL, 'active', NULL, '1', NULL, NULL, '2023-01-20 09:58:22', '2023-01-20 10:10:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `menu_id`, `deskripsi`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Mengubah data user dengan email bauroziq@gmail.com', NULL, '1', '2023-01-20 10:10:55', '2023-01-20 10:10:55', NULL),
(2, 1, NULL, 'Mengubah data user dengan email bauroziq@gmail.com', NULL, '1', '2023-01-21 03:52:14', '2023-01-21 03:52:14', NULL),
(3, 1, NULL, 'Mengubah data user dengan email bauroziq@gmail.com', NULL, '1', '2023-01-21 04:35:56', '2023-01-21 04:35:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_foto`
--

CREATE TABLE `user_foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_foto`
--

INSERT INTO `user_foto` (`id`, `user_id`, `foto`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'user_photo/AdUpMrmgGYuf99iILXTfDVXZ8T21UyQNISf5CN9R.png', '1', '1', '2023-01-21 04:35:56', '2023-01-21 04:35:56', NULL);

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
-- Indexes for table `i_error_application`
--
ALTER TABLE `i_error_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id_level_index` (`id_level`);

--
-- Indexes for table `menu_level`
--
ALTER TABLE `menu_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_user`
--
ALTER TABLE `menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activity_user_id_index` (`user_id`),
  ADD KEY `user_activity_menu_id_index` (`menu_id`);

--
-- Indexes for table `user_foto`
--
ALTER TABLE `user_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_foto_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `i_error_application`
--
ALTER TABLE `i_error_application`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_level`
--
ALTER TABLE `menu_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_user`
--
ALTER TABLE `menu_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_foto`
--
ALTER TABLE `user_foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
