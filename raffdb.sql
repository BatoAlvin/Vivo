-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 08:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raffdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cardattachments`
--

CREATE TABLE `cardattachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `card_id` varchar(255) NOT NULL,
  `unit_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cardattachments`
--

INSERT INTO `cardattachments` (`id`, `client_id`, `card_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '2023-06-17 07:04:32', '2023-06-17 07:04:32'),
(2, '2', '2', '3', '2023-06-17 07:30:08', '2023-06-17 07:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `cardholders`
--

CREATE TABLE `cardholders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cardholder` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cardholders`
--

INSERT INTO `cardholders` (`id`, `cardholder`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lex', 1, '2023-06-02 08:52:31', '2023-06-02 08:52:31'),
(2, 'Stewve', 1, '2023-06-02 08:52:39', '2023-06-02 08:52:39'),
(3, 'Yota', 1, '2023-06-02 08:52:48', '2023-06-02 08:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `cardnumbers`
--

CREATE TABLE `cardnumbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cardnumber` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cardnumbers`
--

INSERT INTO `cardnumbers` (`id`, `cardnumber`, `status`, `created_at`, `updated_at`) VALUES
(1, 7654, 1, '2023-06-02 08:51:50', '2023-06-02 08:51:50'),
(2, 12357, 1, '2023-06-02 08:51:59', '2023-06-02 08:51:59'),
(3, 86688, 1, '2023-06-02 08:52:08', '2023-06-02 08:52:08'),
(4, 89087, 1, '2023-06-16 10:05:39', '2023-06-16 10:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `cardunits`
--

CREATE TABLE `cardunits` (
  `id` int(11) NOT NULL,
  `cardnumber_id` bigint(20) NOT NULL,
  `unitnumber_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cardunits`
--

INSERT INTO `cardunits` (`id`, `cardnumber_id`, `unitnumber_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-06-16 09:40:53', '2023-06-16 09:40:53'),
(2, 1, 2, 1, '2023-06-16 09:48:50', '2023-06-16 09:48:50'),
(3, 2, 1, 1, '2023-06-16 09:49:02', '2023-06-16 09:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rec_id` varchar(255) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `clientname` varchar(255) DEFAULT NULL,
  `units` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `rec_id`, `code`, `clientname`, `units`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'KHS0001', 'Lenovo', '100', 1, '2023-06-02 08:58:02', '2023-06-02 08:58:02'),
(2, '2', 'KHS0002', 'Kool', '90', 1, '2023-06-05 06:31:13', '2023-06-05 06:31:13'),
(3, '3', 'KHS0003', 'Jerry', '70', 1, '2023-06-05 06:31:41', '2023-06-05 06:31:41'),
(4, '4', 'KHS0004', 'Frank', '30', 1, '2023-06-10 05:05:46', '2023-06-10 05:05:46'),
(5, '5', 'KHS0005', 'Kelly', '20', 1, '2023-06-10 05:09:20', '2023-06-10 05:09:20'),
(6, '6', 'KHS0006', 'Grey', '100', 1, '2023-06-10 06:21:51', '2023-06-10 06:21:51');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_01_160643_create_cardnumbers_table', 1),
(6, '2023_01_04_112354_create_clients_table', 1),
(7, '2023_01_04_113746_create_vivos_table', 1),
(8, '2023_01_15_143827_create_projects_table', 1),
(9, '2023_01_15_150839_create_cardholders_table', 1),
(10, '2023_01_15_171110_create_products_table', 1),
(11, '2023_01_15_173513_create_vivorecords_table', 1),
(12, '2023_01_15_182201_create_registrations_table', 1),
(13, '2023_06_16_095757_create_units_table', 2);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Unit A', 'within 20km', 1, '2023-06-16 09:07:56', '2023-06-16 09:07:56'),
(2, 'Unit B', 'within 70km', 1, '2023-06-16 09:46:25', '2023-06-16 09:46:25'),
(3, 'Unit C', 'within 100km', 1, '2023-06-16 09:46:43', '2023-06-16 09:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dan', 'dan@gmail.com', NULL, '$2y$10$m1u9Gsvb14Fa2thESZzc1ue6EfemRkJQUPaRPegvV6ONDASzQxf2.', NULL, '2023-03-22 04:54:50', '2023-03-22 04:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `vivorecords`
--

CREATE TABLE `vivorecords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `litres` varchar(255) NOT NULL,
  `unit_cost` varchar(255) NOT NULL,
  `purchases` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vivos`
--

CREATE TABLE `vivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `card_id` varchar(255) NOT NULL,
  `unit_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vivos`
--

INSERT INTO `vivos` (`id`, `client_id`, `card_id`, `unit_id`, `status`, `created_at`, `updated_at`) VALUES
(8, '1', '1', '4', 1, '2023-06-10 07:31:51', '2023-06-10 08:04:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardattachments`
--
ALTER TABLE `cardattachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardholders`
--
ALTER TABLE `cardholders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardnumbers`
--
ALTER TABLE `cardnumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardunits`
--
ALTER TABLE `cardunits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vivorecords`
--
ALTER TABLE `vivorecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vivos`
--
ALTER TABLE `vivos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cardattachments`
--
ALTER TABLE `cardattachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cardholders`
--
ALTER TABLE `cardholders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cardnumbers`
--
ALTER TABLE `cardnumbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cardunits`
--
ALTER TABLE `cardunits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vivorecords`
--
ALTER TABLE `vivorecords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vivos`
--
ALTER TABLE `vivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
