-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2017 at 09:41 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bokul_electronics_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cooling & Heating', '2017-08-07 06:30:43', '2017-08-07 06:30:43'),
(2, 'Cooking Appliances', '2017-08-07 06:31:41', '2017-08-07 06:31:41'),
(3, 'Kitchen', '2017-08-07 06:32:24', '2017-08-07 06:32:24'),
(4, 'TV', '2017-08-07 06:32:49', '2017-08-07 06:32:49'),
(5, 'Audio', '2017-08-07 06:33:12', '2017-08-07 06:33:12'),
(6, 'Others', '2017-08-08 15:30:02', '2017-08-08 15:30:02'),
(7, 'Entertainment', '2017-08-12 06:12:42', '2017-08-12 06:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'general_cust',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `type`, `phone`, `address`, `email`, `nationalId`, `dateOfBirth`, `date`, `created_at`, `updated_at`) VALUES
(1, 'First Customer', 'general_cust', '77777777777', NULL, NULL, NULL, NULL, '2017-07-19', '2017-07-19 10:56:47', '2017-07-19 10:56:47'),
(2, '2nd', 'general_cust', '09009988987', NULL, NULL, NULL, NULL, '2017-08-06', '2017-08-06 07:07:30', '2017-08-06 07:07:30'),
(3, 'Rahimin', 'general_cust', '01846966564', NULL, NULL, NULL, NULL, '2017-08-06', '2017-08-06 07:20:32', '2017-08-06 07:20:32'),
(4, 'another', 'general_cust', '77777777777', NULL, NULL, NULL, NULL, '2017-08-09', '2017-08-09 02:02:03', '2017-08-09 02:02:03'),
(5, 'New', 'general_cust', '09009988987', NULL, NULL, NULL, NULL, '2017-08-12', '2017-08-12 06:09:59', '2017-08-12 06:09:59'),
(6, 'New General 1', 'installment_cust', '09009900990', 'ctg', 'new@g.com', '090009090909080808', '1972-07-13', '2017-08-12', '2017-08-12 06:10:44', '2017-08-12 06:10:44'),
(7, 'Installment Customer New', 'installment_cust', '09009988987', 'ctg', 'rrr@gmail.com', '090009090909080808', '2017-09-05', '2017-09-22', '2017-09-22 12:00:20', '2017-09-22 12:00:20'),
(8, 'Rafi', 'general_cust', '87878865443', 'ctg', NULL, NULL, NULL, '2017-09-26', '2017-09-26 13:16:14', '2017-09-26 13:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fatherName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentAddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentAddPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeWay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OwnOrRent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeLiving` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyMemberNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanentAddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanentAddPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(150) CHARACTER SET utf8 NOT NULL,
  `monthlyIncome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maritalStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cashPrice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InstallmentPrice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `downPayment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthlyInstallment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstPersonName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstPersonFatherName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstPersonPresent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstPersonPresentPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstPersonJob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstPersonJobPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondPersonName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondPersonFatherName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondPersonPresent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondPersonPresentPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondPersonJob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondPersonJobPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `name`, `nickName`, `fatherName`, `presentAddress`, `presentAddPhone`, `homeWay`, `OwnOrRent`, `timeLiving`, `familyMemberNo`, `permanentAddress`, `permanentAddPhone`, `occupation`, `monthlyIncome`, `age`, `maritalStatus`, `product`, `cashPrice`, `InstallmentPrice`, `downPayment`, `monthlyInstallment`, `firstPersonName`, `firstPersonFatherName`, `firstPersonPresent`, `firstPersonPresentPhone`, `firstPersonJob`, `firstPersonJobPhone`, `secondPersonName`, `secondPersonFatherName`, `secondPersonPresent`, `secondPersonPresentPhone`, `secondPersonJob`, `secondPersonJobPhone`, `cust_id`, `created_at`, `updated_at`) VALUES
(1, 'ক', 'ক', 'ক', 'ক', '09009988987', 'ক্কক', 'ক', 'ক', '৫', 'ক', '09009988987', 'ক', '৩৫০০০', 'ক', 'ক', 'সিঙ্গার টিভি, ইজি ফ্রিজ', '৫৬০০০', '৫৬০০০', '২৫০০০', '৩১০০০', 'ক', 'ক', 'ক', '09009988654', 'ক', '09009988654', 'ক', 'ক', 'ক', '09009988762', 'ক', '09098987876', 7, '2017-09-26 08:46:31', '2017-09-26 08:46:31'),
(2, 'ক', 'ক', 'ক', 'ক', '09009988987', 'ক্কক', 'ক', 'ক', '৫', 'ক', '09009988987', 'ক', '৩৫০০০', 'ক', 'ক', 'সিঙ্গার টিভি, ইজি ফ্রিজ', '৫৬০০০', '৫৬০০০', '২৫০০০', '৩১০০০', 'ক', 'ক', 'ক', '09009988654', 'ক', '09009988654', 'ক', 'ক', 'ক', '09009988762', 'ক', '09098987876', 7, '2017-09-26 09:38:16', '2017-09-26 09:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `installments`
--

CREATE TABLE `installments` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_of_inst` int(11) DEFAULT NULL,
  `inst_paid` int(11) NOT NULL DEFAULT '0',
  `amount` double(8,2) DEFAULT NULL,
  `date` date NOT NULL,
  `cust_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installments`
--

INSERT INTO `installments` (`id`, `no_of_inst`, `inst_paid`, `amount`, `date`, `cust_id`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 28080.00, '2017-09-25', 7, '2017-09-25 10:30:39', '2017-09-25 12:09:13'),
(2, 5, 1, 34200.00, '2017-09-26', 7, '2017-09-26 13:24:23', '2017-09-26 13:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `installment_payments`
--

CREATE TABLE `installment_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `w_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `instal_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installment_payments`
--

INSERT INTO `installment_payments` (`id`, `w_month`, `amount`, `date`, `instal_id`, `created_at`, `updated_at`) VALUES
(1, '1st', 6000.00, '2017-09-25', 1, '2017-09-25 11:03:43', '2017-09-25 11:03:43'),
(2, '2nd', 2500.00, '2017-09-25', 1, '2017-09-25 12:09:13', '2017-09-25 12:09:13'),
(3, '1st', 10000.00, '2017-09-26', 2, '2017-09-26 13:38:34', '2017-09-26 13:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `title`, `model`, `company`, `description`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, 'Oven', 'O1', 'lg', 'Microwave Oven', '2017-07-19', '2017-07-19 10:56:00', '2017-07-19 10:56:00'),
(2, 6, 'Tv', 'S1', 'Sony', 'LCD', '2017-07-19', '2017-07-19 10:56:16', '2017-07-19 10:56:16'),
(5, 6, 'Light', 'l1', 'efl', 'good light', '2017-08-02', '2017-08-02 10:30:28', '2017-08-02 10:30:28'),
(7, 6, 'light', 'l12', 'Lg', 'Bulbe', '2017-08-09', '2017-08-09 06:01:53', '2017-08-09 06:01:53'),
(8, 6, 'light', 'l12', 'Lg', 'bulbe', '2017-08-09', '2017-08-09 06:02:38', '2017-08-09 06:02:38'),
(9, 6, 'light', 'l12', 'Lg', 'lightsss', '2017-08-09', '2017-08-09 06:04:25', '2017-08-09 06:04:25'),
(10, 4, 'TV', 't11', 'Samsung', 'LCD TV', '2017-08-10', '2017-08-10 12:50:38', '2017-08-10 12:50:38'),
(11, 1, 'Ac', 'Acc2', 'Gree', '1 Ton Ac', '2017-08-12', '2017-08-12 06:15:39', '2017-08-12 06:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_08_183239_create_customers_table', 1),
(4, '2017_07_08_183359_create_items_table', 1),
(5, '2017_07_15_150058_create_stocks_table', 2),
(6, '2017_07_15_155612_create_installments_table', 3),
(7, '2017_07_15_161430_create_installment_payments_table', 4),
(8, '2017_07_15_153845_create_sells_table', 5),
(9, '2017_08_07_121601_create_categories_table', 6),
(10, '2017_09_20_134521_create_customer_details_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('abc@gmail.com', '$2y$10$nfD4/yoPUnYe/3yhSGrHKeVo17GOYm67T8oH6XdgJ2AmyndM/rFNC', '2017-08-13 09:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_item` int(11) NOT NULL,
  `sell_price` double(8,2) NOT NULL,
  `sell_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `instal_id` int(10) UNSIGNED DEFAULT NULL,
  `cust_id` int(10) UNSIGNED DEFAULT NULL,
  `stock_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `no_item`, `sell_price`, `sell_type`, `date`, `item_id`, `user_id`, `instal_id`, `cust_id`, `stock_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5500.00, 'Installment', '2017-09-25', 1, 1, 1, 7, 5, '2017-09-25 10:31:15', '2017-09-25 10:31:15'),
(2, 1, 55000.00, 'Installment', '2017-09-25', 2, 1, 1, 7, 2, '2017-09-25 10:31:53', '2017-09-25 10:31:53'),
(3, 2, 5500.00, 'Instant', '2017-09-26', 1, 5, NULL, 8, 1, '2017-09-26 13:21:14', '2017-09-26 13:21:14'),
(4, 1, 55000.00, 'Instant', '2017-09-26', 2, 5, NULL, 8, 2, '2017-09-26 13:21:33', '2017-09-26 13:21:33'),
(5, 2, 5600.00, 'Installment', '2017-09-26', 1, 5, 2, 7, 1, '2017-09-26 13:24:37', '2017-09-26 13:24:37'),
(6, 1, 58000.00, 'Installment', '2017-09-26', 2, 5, 2, 7, 2, '2017-09-26 13:24:54', '2017-09-26 13:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `numberOfItems` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `item_id`, `numberOfItems`, `sold`, `price`, `user_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 4, 5500.00, 1, '2017-09-22', '2017-09-22 06:24:17', '2017-09-26 13:24:37'),
(2, 2, 5, 3, 52500.00, 1, '2017-09-22', '2017-09-22 06:24:29', '2017-09-26 13:24:54'),
(3, 5, 12, 0, 450.00, 1, '2017-09-22', '2017-09-22 06:24:44', '2017-09-23 12:12:06'),
(4, 10, 5, 0, 45000.00, 1, '2017-09-22', '2017-09-22 06:24:54', '2017-09-24 00:54:21'),
(5, 1, 5, 1, 5000.00, 1, '2017-09-24', '2017-09-24 01:01:50', '2017-09-25 10:31:15'),
(6, 2, 5, 0, 50000.00, 1, '2017-09-24', '2017-09-24 01:01:56', '2017-09-24 01:01:56'),
(7, 5, 15, 0, 500.00, 1, '2017-09-24', '2017-09-24 01:02:04', '2017-09-24 01:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `password`, `address`, `phone`, `email`, `nationalId`, `dateOfBirth`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ami', 'Admin', '$2y$10$KtRYXeXbk9Nd6i.4wbpWp.2ECOd.vZN8vc7s91QuCURFOxO5CFkUW', 'ctg', '09009898776', 'ami@g.com', '7878765561991', '2017-07-26', 'Yjl8PkpjEIWcunfW1LpEMpm7G2CkwicQQltvyJ72yYpb9xfXv6HQ8DQSWcmY', NULL, NULL),
(2, '1st User', 'User', '$2y$10$2UYufxr3x0H2B8HYdXSQve8Oud8WX2R1jV4Tu8TDc7ltLennh9m3.', 'Ctg', '09009900990', 'user@g.com', '090009090909080808', '1994-02-09', 'ksK5q7RoyMRvcdN3aM1adtPLkrQGnvwY74XT1bgpXzLKy8UQkEfGcowrR9GW', '2017-08-09 01:18:51', '2017-08-09 01:18:51'),
(3, 'Someone', 'Admin', '$2y$10$9iwAfAO1T2e1qE7L7MwW3.To0He4ypums5.fxAxhPtGwzyp4oYIx6', 'ctg', '09009988987', 'abc@gmail.com', '00000000001991111', '1992-02-05', 'QjZepIAv7laU8Vlt4mArBtY3nYgAWS7v2MylFFw9dVQyYlSgPg7DZQL8Jzuq', '2017-08-12 06:07:41', '2017-08-12 06:07:41'),
(5, 'another user', 'Admin', '$2y$10$PEp0VoWnDVqlSNk.tC1bQuBerza4PoC6yyK8di9qtqbYZ1YNXKKwe', 'ctg', '09009900990', 'rrr@gmail.com', '090009090909076767', '2017-09-10', NULL, '2017-09-26 13:13:51', '2017-09-26 13:13:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_details_customer_id_foreign` (`cust_id`);

--
-- Indexes for table `installments`
--
ALTER TABLE `installments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `installments_customer_id_foreign` (`cust_id`);

--
-- Indexes for table `installment_payments`
--
ALTER TABLE `installment_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `installment_payments_instal_id_foreign` (`instal_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sells_item_id_foreign` (`item_id`),
  ADD KEY `sells_user_id_foreign` (`user_id`),
  ADD KEY `sells_instal_id_foreign` (`instal_id`),
  ADD KEY `sells_cust_id_foreign` (`cust_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_item_id_foreign` (`item_id`),
  ADD KEY `stocks_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nationalid_unique` (`nationalId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `installments`
--
ALTER TABLE `installments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `installment_payments`
--
ALTER TABLE `installment_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD CONSTRAINT `customer_details_customer_id_foreign` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `installments`
--
ALTER TABLE `installments`
  ADD CONSTRAINT `installments_customer_id_foreign` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `installment_payments`
--
ALTER TABLE `installment_payments`
  ADD CONSTRAINT `installment_payments_instal_id_foreign` FOREIGN KEY (`instal_id`) REFERENCES `installments` (`id`);

--
-- Constraints for table `sells`
--
ALTER TABLE `sells`
  ADD CONSTRAINT `sells_cust_id_foreign` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sells_instal_id_foreign` FOREIGN KEY (`instal_id`) REFERENCES `installments` (`id`),
  ADD CONSTRAINT `sells_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `sells_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `stocks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
