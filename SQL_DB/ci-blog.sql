-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 01:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed', 'moha1234@gmail.com', '$2y$10$889yVBNmsyDBDqDhQTmO0.11A0I8sgL6H7ZFZ0agqWdaHc7mu/T62', '2023-09-09 09:43:09', '2023-09-09 09:43:09'),
(2, 'admin.second', 'admin.second@gmail.com', '$2y$10$T3OxAU600Nv9.t3KEx7xeOHvMdp93tqQADqI8X8j6hCiyNi3dIajK', '2023-09-09 13:42:23', '2023-09-09 13:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'user', '2023-09-04 09:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text DEFAULT NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'm111@gmail.com', '$2y$10$889yVBNmsyDBDqDhQTmO0.11A0I8sgL6H7ZFZ0agqWdaHc7mu/T62', NULL, NULL, 0, '2023-09-10 13:10:33', '2023-09-04 09:33:15', '2023-09-10 13:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-04 09:35:05', 1),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-04 11:02:35', 1),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-07 09:33:23', 1),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-08 08:25:02', 1),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-08 08:54:14', 1),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-08 09:04:05', 1),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-08 09:58:09', 1),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-09 17:16:19', 1),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-10 11:04:37', 1),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-10 13:05:43', 1),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'email_password', 'm111@gmail.com', 1, '2023-09-10 13:10:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'business', '2023-09-05 13:16:18', '2023-09-05 13:16:18'),
(2, 'culture', '2023-09-05 13:16:18', '2023-09-05 13:16:18'),
(3, 'politics', '2023-09-05 13:16:18', '2023-09-05 13:16:18'),
(4, 'travel', '2023-09-05 13:16:18', '2023-09-05 13:16:18'),
(5, 'food', '2023-09-05 13:16:18', '2023-09-05 13:16:18'),
(6, 'adventure', '2023-09-05 13:16:18', '2023-09-05 13:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_name`, `comment`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'moha12345', 'Holisticly whiteboard sustainable value whereas extensible technologies. Collaboratively negotiate alternative processes before out-of-the-box models', 1, '2023-09-06 09:36:43', '2023-09-06 09:36:43'),
(2, 'moha12345', 'Rapidiously architect 24/365 products via extensible initiatives. Collaboratively maximize scalable e-commerce without leveraged outsourcing. AsserRapidiously architect 24/365 products via extensible initiatives. Collaboratively maximize scalable e-commerce without leveraged outsourcing. Asser', 2, '2023-09-06 09:36:43', '2023-09-06 09:36:43'),
(3, 'moha12345', 'Uniquely communicate intermandated solutions for cross-unit value. Holisticly build one-to-one leadership before highly efficient leadership. ', 1, '2023-09-07 09:41:31', '2023-09-07 09:41:31'),
(4, 'moha12345', 'Assertively engage e-business information through best-of-breed ROI. Energistically generate innovative leadership skills without state of the art benefits.', 1, '2023-09-07 09:43:22', '2023-09-07 09:43:22'),
(5, 'moha12345', 'Rapidiously provide access to prospective results with plug-and-play expertise. Authoritatively procrastinate reliable opportunities without seaml', 4, '2023-09-07 09:48:08', '2023-09-07 09:48:08'),
(6, 'moha12345', 'Rapidiously provide access to prospective results with plug-and-play expertise. Authoritatively procrastinate reliable opportunities without seaml', 4, '2023-09-07 09:51:34', '2023-09-07 09:51:34'),
(7, 'moha12345', 'ss to prospective results with plug-and-play expertise. Authoritatively procrastinate reliabl', 4, '2023-09-07 09:53:00', '2023-09-07 09:53:00'),
(8, 'moha12345', 'Uniquely enhance synergistic portals and adaptive e-services. Compellingly incentivize premium e-', 4, '2023-09-07 09:55:06', '2023-09-07 09:55:06'),
(9, 'moha12345', 'provide access to prospective results with plug-and-play expertise. Authoritatively procrastinate reliable opportunities without seaml', 4, '2023-09-07 09:56:01', '2023-09-07 09:56:01'),
(10, 'moha12345', 'new comment form Web Coding', 2, '2023-09-08 09:58:32', '2023-09-08 09:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1693819532, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1693819532, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1693819533, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `body`, `user_id`, `user_name`, `category`, `created_at`, `updated_at`) VALUES
(2, 'Intro to PHP CI controllers', 'img_5_horizontal.jpg', '                                        Enthusiastically transition end-to-end niche markets vis-a-vis client-focused collaboration and idea-sharing. Efficiently mesh frictionless products through progressive innovation. Distinctively foster timely content through B2C channels. Globally Enthusiastically transition end-to-end niche markets vis-a-vis client-focused collaboration and idea-sharing. Efficiently mesh frictionless products through progressive innovation. Distinctively foster timely content through B2C channels. Globally  \r\n\r\n\r\nEfficiently mesh frictionless products through progressive innovation. Distinctively foster timely content through B2C channels. Globally  Efficiently mesh frictionless products through progressive innovation. Distinctively foster timely content through B2C channels. Globally  Efficiently mesh frictionless products through progressive innovation. Distinctively foster timely content through B2C channels. Globally                                 ', 1, 'moha12345', 'business', '2023-09-04 11:11:34', '2023-09-04 11:11:34'),
(3, 'Globally harness process-centric materials and enterprise web-readiness', 'img_3_horizontal.jpg', 'Interactively promote impactful deliverables rather than client-based schemas. Assertively engage robust technology through efficient value. Distinctively customize customer directed leadership skills without superior value. Phosfluorescently revolutionize team driven solutions after effective intellectual capital.Interactively promote impactful deliverables rather than client-based schemas. Assertively engage robust technology through efficient value. Distinctively customize customer directed leadership skills without superior value. Phosfluorescently revolutionize team driven solutions after effective intellectual capital.', 1, 'moha12345', 'politics', '2023-09-05 08:59:13', '2023-09-05 08:59:13'),
(4, 'potentialities. Dramatically streamline customer', 'img_4_horizontal.jpg', 'Proactively productivate extensive experiences with resource sucking innovation. Professionally implement B2B strategic theme areas after cost effective core competencies. Professionally transform cross-media collaboration and idea-sharing and exceptional technology. Interactively promote Proactively productivate extensive experiences with resource sucking innovation. Professionally implement B2B strategic theme areas after cost effective core competencies. Professionally transform cross-media collaboration and idea-sharing and exceptional technology. Interactively promote ', 1, 'moha12345', 'travel', '2023-09-05 08:59:13', '2023-09-05 08:59:13'),
(5, 'innovative e-services vis-a-vis resource sucking', 'img_5_horizontal.jpg', 'Enthusiastically seize superior ROI vis-a-vis economically sound solutions. Phosfluorescently generate multifunctional ideas rather than multidisciplinary meta-services. Proactively engage impactful partnerships with user-centric e-business. Authoritatively pontificate goal-oriented quality Enthusiastically seize superior ROI vis-a-vis economically sound solutions. Phosfluorescently generate multifunctional ideas rather than multidisciplinary meta-services. Proactively engage impactful partnerships with user-centric e-business. Authoritatively pontificate goal-oriented quality ', 1, 'moha12345', 'business', '2023-09-04 11:11:34', '2023-09-04 11:11:34'),
(12, 'innovative e-services vis-a-vis resource sucking', 'img_5_horizontal.jpg', 'Enthusiastically seize superior ROI vis-a-vis economically sound solutions. Phosfluorescently generate multifunctional ideas rather than multidisciplinary meta-services. Proactively engage impactful partnerships with user-centric e-business. Authoritatively pontificate goal-oriented quality Enthusiastically seize superior ROI vis-a-vis economically sound solutions. Phosfluorescently generate multifunctional ideas rather than multidisciplinary meta-services. Proactively engage impactful partnerships with user-centric e-business. Authoritatively pontificate goal-oriented quality ', 1, 'moha12345', 'culture', '2023-09-04 11:11:34', '2023-09-04 11:11:34'),
(13, 'without virtual networks. Assertively create ', 'img_1_sq.jpg', 'Enthusiastically seize superior ROI vis-a-vis economically sound solutions. Phosfluorescently generate multifunctional ideas rather than multidisciplinary meta-services. Proactively engage impactful partnerships with user-centric e-business. Authoritatively pontificate goal-oriented quality Enthusiastically seize superior ROI vis-a-vis economically sound solutions. Phosfluorescently generate multifunctional ideas rather than multidisciplinary meta-services. Proactively engage impactful partnerships with user-centric e-business. Authoritatively pontificate goal-oriented quality ', 1, 'moha12345', 'culture', '2023-09-04 11:11:34', '2023-09-04 11:11:34'),
(14, 'without virtual networks. Assertively create Assertively create ', 'img_1_sq.jpg', 'Enthusiastically seize superior ROI vis-a-vis economically sound solutions. Phosfluorescently generate multifunctional ideas rather than multidisciplinary meta-services. Proactively engage impactful partnerships with user-centric e-business. Authoritatively pontificate goal-oriented quality Enthusiastically seize superior ROI vis-a-vis economically sound solutions. Phosfluorescently generate multifunctional ideas rather than multidisciplinary meta-services. Proactively engage impactful partnerships with user-centric e-business. Authoritatively pontificate goal-oriented quality ', 1, 'moha12345', 'culture', '2023-09-04 11:11:34', '2023-09-04 11:11:34'),
(15, 'Globally harness process-centric materials ', 'img_3_horizontal.jpg', 'Interactively promote impactful deliverables rather than client-based schemas. Assertively engage robust technology through efficient value. Distinctively customize customer directed leadership skills without superior value. Phosfluorescently revolutionize team driven solutions after effective intellectual capital.Interactively promote impactful deliverables rather than client-based schemas. Assertively engage robust technology through efficient value. Distinctively customize customer directed leadership skills without superior value. Phosfluorescently revolutionize team driven solutions after effective intellectual capital.', 1, 'moha12345', 'politics', '2023-09-05 08:59:13', '2023-09-05 08:59:13'),
(16, 'promote impactful deliverables rather than client-based ', 'img_3_horizontal.jpg', 'Interactively promote impactful deliverables rather than client-based schemas. Assertively engage robust technology through efficient value. Distinctively customize customer directed leadership skills without superior value. Phosfluorescently revolutionize team driven solutions after effective intellectual capital.Interactively promote impactful deliverables rather than client-based schemas. Assertively engage robust technology through efficient value. Distinctively customize customer directed leadership skills without superior value. Phosfluorescently revolutionize team driven solutions after effective intellectual capital.', 1, 'moha12345', 'politics', '2023-09-05 08:59:13', '2023-09-05 08:59:13'),
(17, 'potentialities. Dramatically streamline customer', 'img_4_horizontal.jpg', 'Proactively productivate extensive experiences with resource sucking innovation. Professionally implement B2B strategic theme areas after cost effective core competencies. Professionally transform cross-media collaboration and idea-sharing and exceptional technology. Interactively promote Proactively productivate extensive experiences with resource sucking innovation. Professionally implement B2B strategic theme areas after cost effective core competencies. Professionally transform cross-media collaboration and idea-sharing and exceptional technology. Interactively promote ', 1, 'moha12345', 'travel', '2023-09-05 08:59:13', '2023-09-05 08:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(9) NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'moha12345', NULL, NULL, 1, NULL, '2023-09-04 09:33:15', '2023-09-04 09:33:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
