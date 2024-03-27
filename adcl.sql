-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2024 at 12:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adcl`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint UNSIGNED NOT NULL,
  `club_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_club` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `parent_club`, `country`, `description`, `club_logo`, `created_at`, `updated_at`) VALUES
(3, 'United Cricket Lads - UCL', 'None', 'United Arab Emirates', 'This is the main parent club of all other clubs.', '1710699184.png', '2024-03-17 13:13:04', '2024-03-17 13:13:04'),
(4, 'hi', 'None', 'United Arab Emirates', 'sfddsf', '1710772823.png', '2024-03-18 09:40:23', '2024-03-18 09:40:23'),
(5, 'Darius Barr', 'None', 'United Arab Emirates', 'Veniam tempore vel', '1710951532.png', '2024-03-20 11:18:52', '2024-03-20 11:18:52'),
(6, 'Tiger Washington', 'None', 'United Arab Emirates', 'Ut eum distinctio A', '1711039903.jpeg', '2024-03-21 11:51:43', '2024-03-21 11:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_24_094603_create_players_table', 1),
(6, '2023_08_09_142810_create_teams_table', 1),
(7, '2023_08_17_075020_create_tournaments_table', 1),
(8, '2023_08_22_145313_create_matches_table', 1),
(9, '2023_08_22_163618_create_teams_table', 2),
(10, '2023_08_24_081834_create_matches_table', 3),
(11, '2023_08_24_094234_create_matches_table', 4),
(12, '2023_08_24_192244_create_tournament_matches_table', 5),
(13, '2023_08_27_092946_create_team_tournament_table', 6),
(14, '2023_09_01_053613_create_teams_table', 7),
(15, '2023_09_01_170613_create_team_player_table', 8),
(16, '2023_09_01_173956_create_player_team_table', 9),
(17, '2023_09_01_175030_create_player_team_table', 10),
(18, '2023_09_02_045139_create_player_team_table', 11),
(19, '2023_09_02_051801_create_players_teams_table', 12),
(20, '2023_09_02_083206_create_player_team_table', 13),
(21, '2024_01_31_174034_create_clubs_table', 14),
(22, '2024_02_20_162450_create_my_clubs_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `my_clubs`
--

CREATE TABLE `my_clubs` (
  `id` bigint UNSIGNED NOT NULL,
  `my_club` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint UNSIGNED NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` int NOT NULL,
  `playing_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batting_style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bowling_style` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `picture`, `name`, `email`, `club_name`, `nationality`, `gender`, `height`, `playing_role`, `batting_style`, `bowling_style`, `status`, `description`, `created_at`, `updated_at`) VALUES
(2, '1710945548.png', 'Beck Gilmore', 'zysuxy@mailinator.com', 'United Cricket Lads - UCL', 'Bangladesh', 'female', 86, 'Select player role', 'right hand', 'right arm fast', 'inactive', 'Sit Nam similique nu', '2024-03-20 09:39:08', '2024-03-20 09:39:08'),
(3, '1710950928.jpg', 'hsmxs', 'tuvedusu@mailinator.com', 'hi', 'Uzbekistan', 'others', 87, 'administrator', 'left hand', 'left arm chinaman', 'active', 'A obcaecati nobis re', '2024-03-20 10:52:50', '2024-03-20 11:16:36'),
(4, '1711030246.jpeg', 'Rinah Parks', 'jutyhyxibi@mailinator.com', 'United Cricket Lads - UCL', 'Cook Islands', 'male', 87, 'manager', 'left hand', 'left arm medium fast', 'inactive', 'Dolor dolores cupidi', '2024-03-21 09:10:46', '2024-03-21 09:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `player_team`
--

CREATE TABLE `player_team` (
  `id` bigint UNSIGNED NOT NULL,
  `player_id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_team`
--

INSERT INTO `player_team` (`id`, `player_id`, `team_id`, `created_at`, `updated_at`) VALUES
(5, 9, 3, NULL, NULL),
(14, 11, 1, NULL, NULL),
(15, 12, 1, NULL, NULL),
(16, 6, 1, NULL, NULL),
(17, 7, 1, NULL, NULL),
(18, 8, 1, NULL, NULL),
(19, 5, 1, NULL, NULL),
(20, 13, 3, NULL, NULL),
(21, 14, 3, NULL, NULL),
(22, 10, 3, NULL, NULL),
(23, 16, 1, NULL, NULL),
(24, 15, 1, NULL, NULL),
(25, 17, 3, NULL, NULL),
(26, 18, 3, NULL, NULL),
(27, 19, 3, NULL, NULL),
(28, 25, 4, NULL, NULL),
(29, 28, 4, NULL, NULL),
(30, 23, 4, NULL, NULL),
(31, 22, 4, NULL, NULL),
(32, 21, 4, NULL, NULL),
(33, 24, 4, NULL, NULL),
(34, 26, 4, NULL, NULL),
(35, 29, 4, NULL, NULL),
(36, 27, 4, NULL, NULL),
(37, 32, 2, NULL, NULL),
(38, 31, 2, NULL, NULL),
(39, 33, 2, NULL, NULL),
(40, 34, 2, NULL, NULL),
(41, 37, 2, NULL, NULL),
(42, 35, 2, NULL, NULL),
(43, 36, 2, NULL, NULL),
(44, 38, 2, NULL, NULL),
(45, 30, 2, NULL, NULL),
(48, 41, 5, NULL, NULL),
(49, 42, 5, NULL, NULL),
(50, 43, 5, NULL, NULL),
(51, 45, 5, NULL, NULL),
(52, 46, 5, NULL, NULL),
(53, 47, 5, NULL, NULL),
(54, 48, 5, NULL, NULL),
(55, 44, 5, NULL, NULL),
(56, 39, 5, NULL, NULL),
(57, 40, 5, NULL, NULL),
(58, 55, 6, NULL, NULL),
(59, 50, 6, NULL, NULL),
(60, 49, 6, NULL, NULL),
(61, 52, 6, NULL, NULL),
(62, 53, 6, NULL, NULL),
(63, 56, 6, NULL, NULL),
(64, 51, 6, NULL, NULL),
(65, 57, 6, NULL, NULL),
(66, 42, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `club` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `logo`, `club`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cally Palmeradsssssssssssssss', '1711120645.png', 'United Cricket Lads - UCL', 'inactive', 'Aliqua Nemo temporddddddddddddddddddddddddd', '2024-03-21 12:09:59', '2024-03-22 10:17:25'),
(2, 'Brendan Dillon', '1711117904.png', 'hi', 'active', 'Ea do vitae optio n', '2024-03-22 09:31:45', '2024-03-22 09:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `team_tournament`
--

CREATE TABLE `team_tournament` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `tournament_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_tournament`
--

INSERT INTO `team_tournament` (`id`, `team_id`, `tournament_id`, `created_at`, `updated_at`) VALUES
(6, 2, 1, NULL, NULL),
(7, 1, 1, NULL, NULL),
(8, 2, 1, NULL, NULL),
(9, 3, 1, NULL, NULL),
(10, 3, 1, NULL, NULL),
(11, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint UNSIGNED NOT NULL,
  `tournamentname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tournamentLocation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tournamentCountry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tournamentStartTime` date NOT NULL,
  `tournamentEndTime` date NOT NULL,
  `tournamentStatus` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `tournamentname`, `tournamentLocation`, `tournamentCountry`, `tournamentStartTime`, `tournamentEndTime`, `tournamentStatus`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, 'ABC', 'Rigel Vinson', 'United Arab Emirates', '1992-11-02', '2001-06-05', 'active', 'tournament_images/F1jEY1Teg5j2DQpNGEmjDrDugodC8A8ckr9XnCc0.png', '2023-08-22 12:01:26', '2023-08-22 12:01:26'),
(2, 'Myra Callahan', 'Ruby Burke', 'United Arab Emirates', '1984-07-17', '1992-10-04', 'active', 'tournament_images/on0EHpGSE2eMOdG6gMf74eYZ6Qk5ZMaWBLGrqurL.png', '2023-08-22 12:01:48', '2023-08-22 12:01:48'),
(3, 'Orson Moran', 'Rashad Adkins', 'United Arab Emirates', '1979-05-09', '1983-11-15', 'active', 'tournament_images/geNaWy52eHNT6f59cRSEjhk1IMhcwMRmzcMwx0Vk.png', '2023-08-22 12:02:52', '2023-08-22 12:02:52'),
(4, 'ADCL Season 2023', 'Abu Dhabi', 'United Arab Emirates', '2023-01-01', '2023-12-31', 'active', 'tournament_images/VF0anIewvpOVqzhKW49qMxVW5IgZPSLMThZSD59A.png', '2023-08-31 04:14:23', '2023-08-31 04:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_matches`
--

CREATE TABLE `tournament_matches` (
  `id` bigint UNSIGNED NOT NULL,
  `matchName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `matchNo` int NOT NULL,
  `matchDate` date NOT NULL,
  `format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `week` int NOT NULL,
  `startTime` time NOT NULL,
  `finishTime` time NOT NULL,
  `reportingTime` time NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_matches`
--

INSERT INTO `tournament_matches` (`id`, `matchName`, `team_id`, `matchNo`, `matchDate`, `format`, `week`, `startTime`, `finishTime`, `reportingTime`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tallulah Daniels', 1, 91, '1971-10-14', 'Vel velit in consect', 53, '19:25:00', '10:25:00', '19:59:00', 'images/af483J4XMLykZqWGBDqKu9A7muG742Jr9fbPZWWQ.png', '2023-08-24 14:29:48', '2023-08-24 14:29:48'),
(2, 'Piper Crosby', 2, 100, '1987-08-22', 'Aut consequatur eum', 47, '12:16:00', '00:04:00', '02:07:00', 'images/05WmpyKaKZWzy3YDdvSW8Mx4HsTDNvV74fTospxV.png', '2023-08-24 14:33:37', '2023-08-24 14:33:37'),
(3, 'Piper Crosby', 2, 100, '1987-08-22', 'Aut consequatur eum', 47, '12:16:00', '00:04:00', '02:07:00', 'images/cidkdOKnDuDAkpMjOG1JahG1r5YJcRZt2xyEaUZK.png', '2023-08-24 14:34:37', '2023-08-24 14:34:37'),
(4, 'Raven Jackson', 2, 42, '1989-03-10', 'Perferendis tempora', 69, '17:27:00', '16:16:00', '00:25:00', 'images/O3q2TktN5DWqdoKYrBdEgW3k2aQHy9IUzCBPF5Bb.png', '2023-08-24 14:41:14', '2023-08-24 14:41:14'),
(5, 'Iris Justice', 2, 98, '1979-04-28', 'Inventore officia sa', 11, '11:31:00', '13:31:00', '08:43:00', 'images/fyZhzPupgXhNiHf2Uy8ei6GjuRaIqhVn8Phs0qAL.png', '2023-08-27 07:19:16', '2023-08-27 07:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `role` int NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'demo', 'demo@demo.com', NULL, '$2y$10$TZBPvDsUAILPY7mi3/nae.qzFvjHh/MykVN/6BCXMZJUJV3.uKtwm', 0, 1, 'XgsiGemeJfXmlWgNgeHEUf8tcGEO1kPYMtTzgAKcrXr8adUp7FbbddipMRfp', '2024-03-04 11:33:32', '2024-03-04 11:33:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_clubs`
--
ALTER TABLE `my_clubs`
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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_team`
--
ALTER TABLE `player_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_team_player_id_foreign` (`player_id`),
  ADD KEY `player_team_team_id_foreign` (`team_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_tournament`
--
ALTER TABLE `team_tournament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_tournament_team_id_foreign` (`team_id`),
  ADD KEY `team_tournament_tournament_id_foreign` (`tournament_id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament_matches`
--
ALTER TABLE `tournament_matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tournament_matches_team_id_foreign` (`team_id`);

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
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `my_clubs`
--
ALTER TABLE `my_clubs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `player_team`
--
ALTER TABLE `player_team`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_tournament`
--
ALTER TABLE `team_tournament`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tournament_matches`
--
ALTER TABLE `tournament_matches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `player_team`
--
ALTER TABLE `player_team`
  ADD CONSTRAINT `player_team_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `player_team_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_tournament`
--
ALTER TABLE `team_tournament`
  ADD CONSTRAINT `team_tournament_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_tournament_tournament_id_foreign` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tournament_matches`
--
ALTER TABLE `tournament_matches`
  ADD CONSTRAINT `tournament_matches_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
