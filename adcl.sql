-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 08:09 PM
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
-- Table structure for table `bowlling_scorecards`
--

CREATE TABLE `bowlling_scorecards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `overs` int(11) DEFAULT NULL,
  `runs` int(11) DEFAULT NULL,
  `wickets` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bowlling_scorecards`
--

INSERT INTO `bowlling_scorecards` (`id`, `player_id`, `match_id`, `overs`, `runs`, `wickets`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 4, 49, 3, '2024-06-04 12:41:01', '2024-06-04 12:41:01'),
(2, 8, 2, 4, 55, 2, '2024-06-04 12:41:01', '2024-06-04 12:41:01'),
(3, 9, 2, 4, 52, 2, '2024-06-04 12:41:02', '2024-06-04 12:41:02'),
(4, 7, 3, NULL, NULL, NULL, '2024-06-04 12:55:56', '2024-06-04 12:55:56'),
(5, 8, 3, 4, 43, 5, '2024-06-04 12:55:56', '2024-06-04 12:55:56');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) NOT NULL,
  `alternateText` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `caption`, `alternateText`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Demo Caption', 'Tournament Poster', 'None', '1718214714.jpg', '2024-06-12 12:51:54', '2024-06-12 12:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matchName` varchar(255) NOT NULL,
  `home_team` varchar(255) NOT NULL,
  `away_team` varchar(255) NOT NULL,
  `tournament_id` int(11) NOT NULL,
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

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `matchName`, `home_team`, `away_team`, `tournament_id`, `matchNo`, `matchDate`, `format`, `week`, `startTime`, `finishTime`, `reportingTime`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Match 2', 'ADCL Reds', 'ADCL Blues', 28, 2, '2024-05-16', 'T20', 1, '21:31:00', '23:33:00', '12:01:00', 'images/T5msWL9Y8XpHycSxCbSggKv7pBXDdi3V5OnchmSK.jpg', '2024-05-14 13:30:12', '2024-05-15 11:10:11'),
(3, 'Match 1', 'ADCL Reds', 'Lahore Qalandar', 28, 1, '2024-05-16', 'T20', 1, '07:02:00', '21:02:00', '21:32:00', 'matches/UDrwPlgqOLqxRybrC4HvHvrs3BHFSa1cBILE67A2.jpg', '2024-05-15 11:04:42', '2024-05-15 11:04:42'),
(5, 'Match 3', 'ADCL Reds', 'Peshawar Zalmi', 28, 3, '2024-05-18', 'T20', 1, '12:50:00', '23:50:00', '12:50:00', '1715877853.png', '2024-05-15 11:51:34', '2024-05-16 11:44:13');

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
(43, '2024_02_20_162450_create_my_clubs_table', 1),
(44, '2024_05_14_052655_create_matches_table', 2),
(45, '2024_05_24_165231_create_scores_table', 3),
(46, '2024_06_04_170917_create_bowlling_scorecards_table', 4),
(47, '2024_06_12_163532_create_galleries_table', 5);

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
  `gender` varchar(50) NOT NULL,
  `height` varchar(255) NOT NULL,
  `playing_role` varchar(100) NOT NULL,
  `batting_style` varchar(100) NOT NULL,
  `bowling_style` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `picture`, `name`, `email`, `club_name`, `nationality`, `gender`, `height`, `playing_role`, `batting_style`, `bowling_style`, `status`, `description`, `created_at`, `updated_at`) VALUES
(7, '1713417581.jpeg', 'Ali Rathore', 'alirathore@gmail.com', 'United Cricket Lads', 'United Arab Emirates', 'Male', '5 ft 8 inches', 'Batsman', 'Right Hand', 'Right Arm Off Break', 'Active', 'none', '2024-04-18 00:19:42', '2024-06-11 13:15:43'),
(8, '1713417665.png', 'Talha Ahmad', 'talhaahmad316@gmail.com', 'United Cricket Lads', 'United Arab Emirates', 'Male', '5ft 8inches', 'Batsman', 'Right Hand', 'Right Arm Off Break', 'Active', 'none', '2024-04-18 00:21:06', '2024-06-11 13:14:50'),
(9, '1714557387.jpg', 'Babar Azam', 'babarazam56@gmail.com', 'United Cricket Lads', 'Pakistan', 'Male', '5ft 8 inches', 'Batsman', 'Right Hand', 'Right Arm Off Break', 'Active', 'C', '2024-04-30 13:27:47', '2024-06-11 13:16:27');

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
(8, 8, 10, NULL, NULL),
(9, 9, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `runs` int(11) DEFAULT NULL,
  `balls_faced` int(11) DEFAULT NULL,
  `fours` int(11) DEFAULT NULL,
  `sixes` int(11) DEFAULT NULL,
  `how_they_got_out` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `player_id`, `match_id`, `runs`, `balls_faced`, `fours`, `sixes`, `how_they_got_out`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 54, 34, 6, 2, 'C And  B Haris Rouf', '2024-05-28 12:52:14', '2024-05-28 12:52:14'),
(2, 8, 2, 67, 44, 7, 3, 'C Shadab B Shaheen', '2024-05-28 12:52:14', '2024-05-28 12:52:14'),
(3, 9, 2, 122, 76, 12, 7, 'Not Out', '2024-05-28 12:52:14', '2024-05-28 12:52:14'),
(4, 7, 3, 74, 34, 10, 5, 'not out', '2024-06-04 12:45:24', '2024-06-04 12:45:24'),
(6, 8, 3, NULL, NULL, NULL, NULL, NULL, '2024-06-04 12:47:13', '2024-06-04 12:47:13');

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
(7, 10, 28, NULL, NULL);

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
  `format` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `tournamentname`, `tournamentLocation`, `tournamentCountry`, `tournamentStartTime`, `tournamentEndTime`, `tournamentStatus`, `format`, `banner_image`, `created_at`, `updated_at`) VALUES
(28, 'UCL Season 2024', 'Dubai', 'United Arab Emirates', '2024-01-01', '2024-11-01', 'active', 'T20', 'tournament_images/UC1NCPRYpswxjja74DlbMlvOJiu33elWI19o3mzh.jpg', '2024-04-16 12:11:35', '2024-05-20 12:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `tournament_matches`
--

CREATE TABLE `tournament_matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matchName` varchar(255) NOT NULL,
  `team_id` varchar(255) NOT NULL,
  `matchNo` int(11) NOT NULL,
  `matchDate` date NOT NULL,
  `format` varchar(255) NOT NULL,
  `week` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `finishTime` time NOT NULL,
  `reportingTime` time NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournament_matches`
--

INSERT INTO `tournament_matches` (`id`, `matchName`, `team_id`, `matchNo`, `matchDate`, `format`, `week`, `startTime`, `finishTime`, `reportingTime`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Russell Franks', '10', 58, '2013-02-06', 'Occaecat quos quasi', 34, '15:56:00', '03:45:00', '04:38:00', 'images/n4ZqyvAzQbnxXe4Lzi56pAxESTocSBBbvCt8qU7W.jpg', '2024-05-05 02:02:35', '2024-05-05 02:02:35'),
(2, 'Phelan Farmer', '10', 94, '2016-02-26', 'Assumenda reiciendis', 100, '20:58:00', '03:14:00', '15:22:00', NULL, '2024-05-05 02:08:27', '2024-05-05 02:08:27');

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
-- Indexes for table `bowlling_scorecards`
--
ALTER TABLE `bowlling_scorecards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bowlling_scorecards_player_id_foreign` (`player_id`),
  ADD KEY `bowlling_scorecards_match_id_foreign` (`match_id`);

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
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_player_id_foreign` (`player_id`),
  ADD KEY `scores_match_id_foreign` (`match_id`);

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
-- AUTO_INCREMENT for table `bowlling_scorecards`
--
ALTER TABLE `bowlling_scorecards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `player_team`
--
ALTER TABLE `player_team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tournament_matches`
--
ALTER TABLE `tournament_matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bowlling_scorecards`
--
ALTER TABLE `bowlling_scorecards`
  ADD CONSTRAINT `bowlling_scorecards_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bowlling_scorecards_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
