-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2019 at 09:59 AM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gfB5trIsIq`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(10) UNSIGNED NOT NULL,
  `badge_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `badge_name`, `min_level`, `created_at`, `updated_at`) VALUES
(1, 'newbie', 1, '2019-08-29 18:16:18', '2019-08-29 21:55:59'),
(2, 'not bad', 3, '2019-08-30 16:30:12', '2019-08-30 16:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `badge_users`
--

CREATE TABLE `badge_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED DEFAULT NULL,
  `badge_id` int(10) UNSIGNED DEFAULT NULL,
  `total_checkin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badge_users`
--

INSERT INTO `badge_users` (`id`, `user_id`, `level_id`, `badge_id`, `total_checkin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2019-08-29 18:20:41', '2019-08-30 14:21:40'),
(3, 3, 10, 1, 7, '2019-08-29 22:40:56', '2019-08-30 14:26:24'),
(4, 4, 3, 1, 13, '2019-08-29 22:42:44', '2019-08-30 14:46:14'),
(5, 5, 1, 1, 0, '2019-08-29 22:43:38', '2019-08-29 22:43:38'),
(6, 6, 1, 1, 0, '2019-08-29 22:44:37', '2019-08-29 22:44:37'),
(7, 7, 1, 1, 0, '2019-08-29 22:45:21', '2019-08-29 22:45:21'),
(8, 8, 1, 1, 0, '2019-08-29 22:45:52', '2019-08-29 22:45:52'),
(9, 9, 1, 1, 0, '2019-08-29 22:47:00', '2019-08-29 22:47:00'),
(10, 10, 1, 1, 0, '2019-08-29 22:47:49', '2019-08-29 22:47:49'),
(11, 11, 1, 1, 0, '2019-08-29 22:48:51', '2019-08-29 22:48:51'),
(12, 12, 1, 1, 0, '2019-08-29 22:51:32', '2019-08-29 22:51:32'),
(13, 13, 1, 1, 0, '2019-08-29 22:52:48', '2019-08-29 22:52:48'),
(14, 14, 1, 1, 0, '2019-08-29 22:57:37', '2019-08-29 22:57:37'),
(15, 15, 1, 1, 0, '2019-08-30 14:53:28', '2019-08-30 14:53:28'),
(16, 16, 1, 1, 0, '2019-08-30 14:54:33', '2019-08-30 14:54:33'),
(17, 17, 2, 1, 5, '2019-08-30 15:26:38', '2019-08-30 16:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `min_checkin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `min_checkin`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2019-08-29 18:01:31', '2019-08-29 23:37:27'),
(2, 2, 5, '2019-08-29 18:30:06', '2019-08-29 18:30:06'),
(3, 3, 10, '2019-08-29 23:38:20', '2019-08-30 14:32:35'),
(4, 4, 15, '2019-08-29 23:38:41', '2019-08-30 14:33:54'),
(5, 5, 20, '2019-08-29 23:39:02', '2019-08-30 14:34:13'),
(6, 6, 25, '2019-08-29 23:39:15', '2019-08-30 14:34:40'),
(7, 7, 30, '2019-08-29 23:39:43', '2019-08-30 14:34:59'),
(8, 8, 35, '2019-08-29 23:39:59', '2019-08-30 14:35:15'),
(9, 9, 40, '2019-08-29 23:41:00', '2019-08-30 14:35:36'),
(10, 10, 45, '2019-08-29 23:41:14', '2019-08-30 14:35:57'),
(13, 11, 55, '2019-08-30 16:15:05', '2019-08-30 16:15:05');

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
(1, '2019_08_29_074546_create_users_table', 1),
(2, '2019_08_29_160102_create_levels_table', 1),
(3, '2019_08_29_160238_create_badges_table', 1),
(4, '2019_08_29_160416_create_badge_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Dimas Febri', 'dimas@yahoo.com', '$2y$10$QXsmxLYTVT2wvQ4S03m50.vPjv09fT9SgqZv7hagoxx.VndHRfUaW', '2019-08-29 18:20:40', '2019-08-29 18:20:40'),
(3, 'Febri', 'febri@yahoo.com', '$2y$10$O1SGxTsvzhepektm3Ud27.FseKErRkRhLevJFj73bBrlJooaZZrCS', '2019-08-29 22:40:55', '2019-08-29 22:40:55'),
(4, 'Febri Pras', 'febri1@yahoo.com', '$2y$10$nEqBjB8lYn0tJQ/bu7NzSuKfc948WQYidiGupfg7SjU6LbIIJj9jK', '2019-08-29 22:42:43', '2019-08-29 22:42:43'),
(5, 'Febri Prasetyo', 'febri2@yahoo.com', '$2y$10$DpAB//v5TGCMAZHXEru8c.mgRt2JAO1pUd1iEUkabdAitw3kXwUoq', '2019-08-29 22:43:37', '2019-08-29 22:43:37'),
(6, 'Febri Prasetyo', 'febri3@yahoo.com', '$2y$10$fdbgUK4FF6EBYHQu0ej2HOZxVwMQCDFg6z9Uk93T4SYJ1Wqv.dslK', '2019-08-29 22:44:37', '2019-08-29 22:44:37'),
(7, 'Febri Prasetyo', 'febri4@yahoo.com', '$2y$10$Ph7OXHf9sWGuuyYsrabjAuJnqZFnzsmqIEjwjvfMRMTNGSBLi/heC', '2019-08-29 22:45:20', '2019-08-29 22:45:20'),
(8, 'Febri Prasetyo', 'febri45@yahoo.com', '$2y$10$3VPkYoi.Kol4kmxfY.BILea5Jg9.Z0SgIm8EAM4Eh.EbIclaPeA8i', '2019-08-29 22:45:51', '2019-08-29 22:45:51'),
(9, 'Febri Prasetyo', 'febri46@yahoo.com', '$2y$10$N44tDlvFu4wZviytBIxqZ.eORhzhYsxTuoDV5k1sd3danjCpQ1XDW', '2019-08-29 22:46:59', '2019-08-29 22:46:59'),
(10, 'Febri Prasetyo', 'febri47@yahoo.com', '$2y$10$XwmcEg4aVmCmur3E.OEAkOF4tpbMZoRrElBnEmCMY/gcdBI/32xJ2', '2019-08-29 22:47:48', '2019-08-29 22:47:48'),
(11, 'Febri Prasetyo', 'febri48@yahoo.com', '$2y$10$lX9eP1EkCT61Ji6K9j1xbeTUN8eUSe02J3ZnAUFSzBLIB3IbM9.aO', '2019-08-29 22:48:50', '2019-08-29 22:48:50'),
(12, 'Febri Prasetyo', 'febri49@yahoo.com', '$2y$10$Dmk.8w9r2.btY5vLwywvt.a5MPb1HwnqiD/5huw./GtzqywiD7eIe', '2019-08-29 22:51:31', '2019-08-29 22:51:31'),
(13, 'Febri Prasetyo', 'febri400@yahoo.com', '$2y$10$LiGi5wwKMR3eNQd3NQ5y.uoEMj6orBVfW7AoWQOwsR.gs8Q2L3rJ.', '2019-08-29 22:52:47', '2019-08-29 22:52:47'),
(14, 'Febri Prasetyo', 'febri401@yahoo.com', '$2y$10$KUagZlJmEDRMMO8JbsACeu4tyWDpyxbxLMK7hxQb4w7qZmc1rViJ6', '2019-08-29 22:57:36', '2019-08-29 22:57:36'),
(15, 'Febri Prasetyo', '3333@yahoo.com', '$2y$10$MnAD2WdUiXVAEMRHEdrHEe3492HLd9Yn4ibg/4ksqfA/U0sv/A0Em', '2019-08-30 14:53:27', '2019-08-30 14:53:27'),
(16, 'Febri Prasetyo', '33336@yahoo.com', '$2y$10$h3j/gI1W.6aHen4js//hJOYVHm3KIFZMeh9v1vITLfcZmeDVa0kga', '2019-08-30 14:54:32', '2019-08-30 14:54:32'),
(17, 'test 1', 'test@gmail.com', '$2y$10$UNQV5jczW/MQQPdkls2Q9.rS5kBTgtexp2Uku2esH7rLKR3SVhIiC', '2019-08-30 15:26:37', '2019-08-30 15:26:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badge_users`
--
ALTER TABLE `badge_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `badge_users_user_id_foreign` (`user_id`),
  ADD KEY `badge_users_level_id_foreign` (`level_id`),
  ADD KEY `badge_users_badge_id_foreign` (`badge_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `badge_users`
--
ALTER TABLE `badge_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `badge_users`
--
ALTER TABLE `badge_users`
  ADD CONSTRAINT `badge_users_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `badge_users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `badge_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
