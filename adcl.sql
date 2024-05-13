-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 08:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `parent_club` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `club_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `parent_club`, `country`, `description`, `club_logo`, `created_at`, `updated_at`) VALUES
(4, 'United Cricket Lads', 'None', 'United Arab Emirates', 'United Cricket Lads also known as UCL', '1713285943.png', '2024-04-16 11:45:43', '2024-04-16 11:45:43'),
(5, 'ADCL', '4', 'United Arab Emirates', 'none', '1713286176.jpeg', '2024-04-16 11:49:36', '2024-04-18 00:49:38'),
(6, 'AACL', '4', 'United Arab Emirates', 'NONE', '1713286215.jpeg', '2024-04-16 11:50:15', '2024-04-18 01:14:39'),
(8, 'IU', '4', 'United Arab Emirates', 'PSL Team', '1713420670.png', '2024-04-18 01:10:32', '2024-04-18 01:14:51');

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
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_resets_table', 1),
(34, '2019_08_19_000000_create_failed_jobs_table', 1),
(35, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(36, '2023_07_24_094603_create_players_table', 1),
(37, '2023_08_17_075020_create_tournaments_table', 1),
(38, '2023_08_24_192244_create_tournament_matches_table', 1),
(39, '2023_08_27_092946_create_team_tournament_table', 1),
(40, '2023_09_01_053613_create_teams_table', 1),
(41, '2023_09_02_083206_create_player_team_table', 1),
(42, '2024_01_31_174034_create_clubs_table', 1),
(43, '2024_02_20_162450_create_my_clubs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_clubs`
--

CREATE TABLE `my_clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `my_club` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `picture` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `height` varchar(255) NOT NULL,
  `playing_role` enum('batsman','bowler','all_rounder','wicketkeeper_batsman','coach','umpire','manager','administrator') NOT NULL,
  `batting_style` enum('right_hand','left_hand') NOT NULL,
  `bowling_style` enum('right_arm_off_break','right_arm_leg_break','left_arm_chinaman','slow_right_arm_orthodox','slow_left_arm_orthodox','right_arm_medium_fast','right_arm_fast','left_arm_medium_fast','left_arm_fast','left_arm_wrist_spin') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `picture`, `name`, `email`, `club_name`, `nationality`, `gender`, `height`, `playing_role`, `batting_style`, `bowling_style`, `status`, `description`, `created_at`, `updated_at`) VALUES
(7, '1713417581.jpeg', 'Ali Rathore', 'alirathore@gmial.com', 'United Cricket Lads', 'United Arab Emirates', 'male', '58', 'batsman', 'right_hand', 'right_arm_fast', 'active', 'none', '2024-04-18 00:19:42', '2024-04-18 00:19:42'),
(8, '1713417665.png', 'Talha Ahmad', 'talhaahmad316@gmail.com', 'United Cricket Lads', 'United Arab Emirates', 'male', '58', 'batsman', 'left_hand', 'right_arm_fast', 'active', 'none', '2024-04-18 00:21:06', '2024-04-18 00:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `player_team`
--

CREATE TABLE `player_team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_team`
--

INSERT INTO `player_team` (`id`, `player_id`, `team_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 4, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 7, 10, NULL, NULL),
(8, 8, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `club` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `logo`, `club`, `status`, `description`, `created_at`, `updated_at`) VALUES
(10, 'ADCL Reds', '1713286619.png', 'ADCL', 'active', 'ADCL Reds team', '2024-04-16 11:56:59', '2024-04-16 11:56:59'),
(11, 'ADCL Blues', '1713286701.png', 'ADCL', 'active', 'ADCL Blues Team', '2024-04-16 11:58:21', '2024-04-16 11:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `team_tournament`
--

CREATE TABLE `team_tournament` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `tournament_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_tournament`
--

INSERT INTO `team_tournament` (`id`, `team_id`, `tournament_id`, `created_at`, `updated_at`) VALUES
(1, 1, 23, NULL, NULL),
(2, 2, 23, NULL, NULL),
(7, 10, 28, NULL, NULL),
(8, 11, 28, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tournamentname` varchar(255) NOT NULL,
  `tournamentLocation` varchar(255) NOT NULL,
  `tournamentCountry` varchar(255) NOT NULL,
  `tournamentStartTime` date NOT NULL,
  `tournamentEndTime` date NOT NULL,
  `tournamentStatus` enum('active','inactive') NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `tournamentname`, `tournamentLocation`, `tournamentCountry`, `tournamentStartTime`, `tournamentEndTime`, `tournamentStatus`, `banner_image`, `created_at`, `updated_at`) VALUES
(28, 'UCL Season 2024', 'Dubai', 'United Arab Emirates', '2024-01-01', '2024-11-01', 'active', 'tournament_images/UC1NCPRYpswxjja74DlbMlvOJiu33elWI19o3mzh.jpg', '2024-04-16 12:11:35', '2024-04-16 12:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_matches`
--

CREATE TABLE `tournament_matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matchName` varchar(255) NOT NULL,
  `team_id` int(11) NOT NULL,
  `matchNo` int(11) NOT NULL,
  `matchDate` date NOT NULL,
  `format` varchar(255) NOT NULL,
  `week` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `finishTime` time NOT NULL,
  `reportingTime` time NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'demo', 'demo@demo.com', '1', NULL, '$2y$10$y3pqe2kfnfcFbPef8v4E5.TeQr7Kvu.tb0rat2T3ty/XjeLNOVtfe', 0, 'Y1Ws0dZQTXwVqwxxa1unixyfz3AtlfO6AA0HOGTBfTHx3A2NWa4mRNcZ6lsl', '2024-03-28 03:01:27', '2024-03-28 03:01:27');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_tournament`
--
ALTER TABLE `team_tournament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament_matches`
--
ALTER TABLE `tournament_matches`
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
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `my_clubs`
--
ALTER TABLE `my_clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `player_team`
--
ALTER TABLE `player_team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team_tournament`
--
ALTER TABLE `team_tournament`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tournament_matches`
--
ALTER TABLE `tournament_matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
