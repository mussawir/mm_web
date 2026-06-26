-- Database: `orderupf_mzamax`
--
CREATE DATABASE IF NOT EXISTS `orderupf_mzamax` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `orderupf_mzamax`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint DEFAULT NULL COMMENT 'Admin=0, Operator=1, Vendor=2',
  `fcm_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `email`, `password`, `role`, `fcm_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin@example.com', '$2y$10$G6ZuYjwZr/Vrti7lWRKVKeJDNerfNsCXdvmROrA76wzfAAYCDpq9G', 0, 'eGI8-coCTNiLb9ziKyhiv7:APA91bGSwTEMe2-1w8cU8ZH-62p95PMjppj7L9wwFTV1HUgMIBe07-YwYc2FoXMIs8d5zK7WFp3T10aEocZSrgVNlpxfC--6htBuijgOVpmIxLzXZYB9NYSJNqYSZ1MNFPvi0C4xXDpG', '2024-02-14 07:10:54', '2023-10-12 12:47:10'),
(9, 9, 'operator@example.com', '$2y$10$tQYROkUlcVCMluWUYmXZJetCPY4ysgfA/H3WelmHge3mMV8dqs2Ce', 1, NULL, '2024-08-28 11:42:48', '2024-02-23 13:39:07'),
(16, 7, 'rahul.operator@example.com', '$2y$10$NaaGcgXRYZMpCivIuxkNcOZ6dMeH18SrT6/YVZRSvjsiZ7UfHMSzW', 1, NULL, '2024-02-23 13:40:47', '2024-02-23 13:40:47'),
(17, 8, 'ah.operator@example.com', '$2y$10$GOnP9gpRrVD5x3b5vRebnutjSc3jC/lErDqsjOosahuQmppKbQvlq', 1, NULL, '2024-02-23 13:41:47', '2024-02-23 13:41:47'),
(18, 91, 'gk.operator@example.com', '$2y$10$cfjzNBWYU4v1Xc6Hfl8w6eG/vEDzw4EPsTYwGidGyKmPnpMZr7i7y', 1, NULL, '2024-08-28 11:42:43', '2024-02-23 13:42:32'),
(19, 10, 'je.operator@example.com', '$2y$10$SiDAjlUsboCZ1Vf.r4FbCuHME3gL.jtzddY.SsnFT5WpLFHp1w9/a', 1, NULL, '2024-02-23 13:43:45', '2024-02-23 13:43:45'),
(20, 31, 'urban@gmail.com', '$2y$10$jVorvpeNWDMUE.wyEKaxdujQVfhb0aC0qpTt1M7wy44cdwRNHmncm', 2, 'caA0ieDiRSS6xi3hwPB3hT:APA91bFL5GETmOQg3Ek8Ih9XU2bLS258Il1lsY7QvnWbmnwB7liUpCVuvRGZ2XqmjpfF1Ghc6QNRA2Nl_eRBDhFGbwxNxctti9sv03ou2zKpQ_NNySTZ4_1D_iQjdCbBvGqbqqO0D5S4', '2024-06-14 10:22:43', '2024-02-23 14:06:54'),
(21, 32, 'spicesphere@gmail.com', '$2y$10$gyGdOpEkKj4LnYkphuTKLOdwtkGkN3qDU3GuN3jCkdvMiAresnMLW', 2, NULL, '2024-02-23 14:07:30', '2024-02-23 14:07:30'),
(22, 33, 'minimart@gmail.com', '$2y$10$j9.VYPwr8zYZB2I8tJM4Le0ajM3cBhKJWZKNW.Vq41kyWSFnAdAO.', 2, 'd4jMc3U9RnSA9CEMXXul-a:APA91bHM6iEUycPp0wKxSlpLv3aXHtxcdruus4ILZDWuapokQlxN2Bo2X96ACl_mYmWtz4MzRlWZBnvOym9OmDNAcmWc-MRNW4J_5kNEwIVCFJrQowHZy-dpKgW3rh0uT7rbzpaLhjjp', '2024-02-23 13:41:09', '2024-02-23 14:25:38'),
(23, 34, 'flavorfoodstand@gmail.com', '$2y$10$zxGlqvwjk67t9IqkwaKoTOdskU2gVectb6rbG95i0Mdm6Y7YNwelS', 2, 'cQZef9GkQTa5DVEO36nUhK:APA91bE5-aMeiCf0qXtkbAT0Z6D3_eKBd97eAu0BnGhi3c0VyiJDyagLDZg8IYgCb0VBCGJXUxOPomW-NrHtAb1-aTu3KISu8ESIFmmUjj_-pS_LthSSZnBh8_UHkgJBkm2q3HElczJU', '2024-02-26 12:16:50', '2024-02-23 19:42:30'),
(24, 35, 'expressmunch@gmail.com', '$2y$10$AssUR/vU2kom5ZNSOUaWXOyQ5b/ikRcYYrtqqs8UuE2I1T/iK6Jqq', 2, NULL, '2024-02-23 19:59:57', '2024-02-23 19:59:57'),
(25, 36, 'freshmart@gmail.com', '$2y$10$PhyDV/sjfqgwi8wcmf09uemYnEKwTmnRxl49GvIk2mnwdgbTiiNZK', 2, NULL, '2024-02-23 20:06:17', '2024-02-23 20:06:17'),
(26, 37, 'hungrykitchen@gmail.com', '$2y$10$CtKqB2vs5mOVKp6vFoUZ/umvOnfsj6uwbAMSCpJYG6m99FvtsrNY.', 2, NULL, '2024-02-23 20:11:17', '2024-02-23 20:11:17'),
(27, 38, 'nexustech@gmail.com', '$2y$10$L4thz6kMjUHTuJvGfkHLNeoPIyecdQ4VLYSzI2fhFxo8dZPxW9Mb6', 2, 'f4ZaZn-1Tfy672So4lEalD:APA91bFoiWP9rVddXpWa6iR-pGs4XsK8fk9Utxd8pp_nQPDhrJIX7jWl8vzICsuTpwpLjUWWTPzwcajSkkxF-lx7Nf_dn6NFgDnPMhpquPSfQQf9xUq3_ejccYgGggYop48mPZRmJfic', '2024-02-27 12:30:32', '2024-02-26 13:53:29'),
(28, 39, 'innovatex@gmail.com', '$2y$10$hIuJx9E1VQbyhrejmgvxReMJ6fh2CAjcq.5Jm29CYK6A08EPxOAUO', 2, 'f4ZaZn-1Tfy672So4lEalD:APA91bFoiWP9rVddXpWa6iR-pGs4XsK8fk9Utxd8pp_nQPDhrJIX7jWl8vzICsuTpwpLjUWWTPzwcajSkkxF-lx7Nf_dn6NFgDnPMhpquPSfQQf9xUq3_ejccYgGggYop48mPZRmJfic', '2024-02-27 12:50:05', '2024-02-26 13:56:39'),
(29, 40, 'zipzapfoods@gmail.com', '$2y$10$DdeLi.bS/3GsXe8afPDKIOeh0W9MtkePDh.2DGeFRVjBmoSxIRX1O', 2, NULL, '2024-02-26 14:11:57', '2024-02-26 14:11:57'),
(30, 41, 'urbantastehub@gmail.com', '$2y$10$LjmVPbl.UyqtBWMjt0gGpuphVypK.OR6LMQU.4b9b09h0K9gs60J2', 2, NULL, '2024-02-26 14:22:02', '2024-02-26 14:22:02'),
(31, 42, 'sprintbites@gmail.com', '$2y$10$j4SK/9JVYhVlLpdNzSsmQOuM8cVO9B12J2Ly8tvmj6HXAdM0wzrSC', 2, 'f4ZaZn-1Tfy672So4lEalD:APA91bFoiWP9rVddXpWa6iR-pGs4XsK8fk9Utxd8pp_nQPDhrJIX7jWl8vzICsuTpwpLjUWWTPzwcajSkkxF-lx7Nf_dn6NFgDnPMhpquPSfQQf9xUq3_ejccYgGggYop48mPZRmJfic', '2024-02-27 12:21:33', '2024-02-26 14:29:45'),
(32, 43, 'harvesthub@gmail.com', '$2y$10$xHbem0vj5ejV.Qx2oNI2LeRupV2zEqiMkCLh09qPdS6PNIX5eIpny', 2, NULL, '2024-02-26 14:35:19', '2024-02-26 14:35:19'),
(33, 44, 'supergrocerystore@gmail.com', '$2y$10$.F1hipdNITyZICelMnKArOzeTKoq/vmUP03aMXugWU4FM1SWvKTSO', 2, NULL, '2024-02-26 14:51:11', '2024-02-26 14:51:11'),
(34, 45, 'lazeezbiryanicenter@gmail.com', '$2y$10$nTmEtupHpTEPUA83A.bLcOhDXSD4olkEV46QWB2nBb/NfNiQ.88I.', 2, NULL, '2024-02-26 15:12:59', '2024-02-26 15:12:59'),
(35, 46, 'maxipizza@gmail.com', '$2y$10$5wSOZtyUOzjZD4/KJb/rPe2Vj/sIA8T/I3wt4dKX0uRF.FZsBZX9u', 2, NULL, '2024-02-26 15:50:44', '2024-02-26 15:50:44'),
(36, 47, 'mussawir20@gmail.com', '$2y$10$RnQBqNfvwHl0hJ8iOP31IOkElp.QzVZllgpqlZV2JqkXBndJLYwhu', 2, NULL, '2024-08-28 18:36:30', '2024-08-28 18:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `deleted` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `phone`, `city_id`, `banner`, `description`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Saddar', '03123746343', 1, NULL, NULL, 0, '2024-02-07 11:56:14', '2024-02-07 12:33:40'),
(2, 'DHA', '03187558899', 1, NULL, NULL, 0, '2024-02-07 12:29:35', '2024-02-07 13:42:44'),
(3, 'Burns Road', '03145784634', 1, NULL, NULL, 0, '2024-02-09 07:54:06', '2024-02-09 07:54:06'),
(4, 'Do Darya', '0326555555', 1, NULL, NULL, 0, '2024-02-09 07:54:57', '2024-02-09 07:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `branches_customers`
--

CREATE TABLE `branches_customers` (
  `id` int UNSIGNED NOT NULL,
  `branch_id` int DEFAULT NULL COMMENT 'Branch ID',
  `customer_id` int DEFAULT NULL COMMENT 'Customer ID',
  `status` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_addons`
--

CREATE TABLE `cart_addons` (
  `id` int NOT NULL,
  `cart_master_id` int DEFAULT NULL,
  `cart_detail_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `addon_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_deal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_deal_options`
--

CREATE TABLE `cart_deal_options` (
  `id` int NOT NULL,
  `deal_id` bigint NOT NULL,
  `cart_master_id` bigint NOT NULL,
  `cart_detail_id` bigint NOT NULL,
  `item_id` bigint NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `item_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_original_price` int NOT NULL DEFAULT '0',
  `deal_price` decimal(10,0) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_deal_options`
--

INSERT INTO `cart_deal_options` (`id`, `deal_id`, `cart_master_id`, `cart_detail_id`, `item_id`, `item_name`, `item_description`, `item_image`, `item_original_price`, `deal_price`, `quantity`, `created_at`, `updated_at`) VALUES
(239, 7, 26, 158, 162, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, NULL, NULL),
(240, 7, 26, 158, 162, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int NOT NULL,
  `cart_master_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `unique_key` varchar(50) DEFAULT NULL,
  `sub_total` decimal(8,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `measuring_unit` varchar(30) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `item_price` decimal(7,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deal` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `cart_master_id`, `item_id`, `unique_key`, `sub_total`, `qty`, `measuring_unit`, `item_name`, `main_image`, `item_price`, `created_at`, `updated_at`, `is_deal`) VALUES
(40, 6, 10, NULL, 1600.00, 1, NULL, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-03-17 18:23:02', '2024-03-17 18:23:02', 1),
(47, 9, 7, '7-255-254', 2400.00, 2, NULL, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-28 06:14:00', '2024-03-28 06:14:00', 1),
(151, 23, 146, '146', 350.00, 1, NULL, 'Grape (1kg)', '1708675292.jpg', 350.00, '2024-04-02 11:25:01', '2024-04-02 11:25:02', 0),
(152, 23, 157, '157', 775.00, 1, NULL, 'Spicy Tikka Masala Pizza', '1708681789.jpg', 775.00, '2024-04-02 11:25:20', '2024-04-02 11:25:20', 0),
(153, 24, 10, '10-244-244-247-246', 1600.00, 1, NULL, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-04-03 08:50:59', '2024-04-03 08:50:59', 1),
(158, 26, 7, '7-253-253', 1200.00, 1, NULL, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-09-03 20:07:23', '2024-09-03 20:07:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_master`
--

CREATE TABLE `cart_master` (
  `id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `operator_id` int DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `item_quantity` int DEFAULT NULL,
  `grand_total` decimal(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = Not ready, 1 = ready, 2 = on delivery, 3 = delivered, 4 = canceled',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_master`
--

INSERT INTO `cart_master` (`id`, `customer_id`, `operator_id`, `ip_address`, `branch_id`, `vendor_id`, `item_quantity`, `grand_total`, `status`, `created_at`, `updated_at`) VALUES
(6, NULL, 9, '103.93.13.65', NULL, 31, 1, 1600.00, 1, '2024-03-17 18:23:02', '2024-03-17 18:23:02'),
(9, NULL, 9, '103.82.120.27', NULL, 31, 2, 3050.00, 1, '2024-03-28 06:13:48', '2024-03-28 06:14:47'),
(23, NULL, 9, '103.93.12.175', NULL, 31, 1, 775.00, 1, '2024-04-02 11:25:00', '2024-04-02 11:25:20'),
(24, NULL, 9, '103.93.12.227', NULL, 31, 1, 1600.00, 1, '2024-04-03 08:50:59', '2024-04-03 08:50:59'),
(26, NULL, 9, '103.93.12.6', NULL, 31, 1, 1400.00, 1, '2024-09-03 20:07:23', '2024-09-03 20:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Karachi', '2024-02-07 18:48:40', '2024-02-07 18:51:37'),
(2, 'Islamabad', '2024-02-07 19:26:10', '2024-02-16 06:43:14'),
(3, 'Hyderabad', '2024-02-16 06:42:57', '2024-02-16 06:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `commission_rates`
--

CREATE TABLE `commission_rates` (
  `id` int NOT NULL,
  `rate_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` decimal(5,0) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cross_sell`
--

CREATE TABLE `cross_sell` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `currency_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_name`, `symbol`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 'United States', 0, '2023-10-12 19:47:10', '2023-10-12 19:47:10'),
(2, 'PKR', 'Rs.', 'Pakistan', 1, '2024-02-07 23:36:53', '2024-02-07 23:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_location` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `phone_number` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ctmr Name, H#, S#, Area, SubArea, City',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `pin` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_customer` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = not verified , 1 = verified',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `geo_location`, `city_id`, `phone_number`, `house_number`, `street`, `address`, `email`, `email_verified_at`, `pin`, `remember_token`, `verified_customer`, `created_at`, `updated_at`) VALUES
(1, 'Sorab', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', NULL, '03351207068', 'House no: SS10 defense view', 'Defense view phase2', 'Ss10 defense view phase 2', NULL, NULL, '1234', NULL, 1, '2024-02-12 13:46:21', '2024-03-26 17:47:35'),
(2, 'Asif', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', NULL, '03331207068', NULL, NULL, 'Ss10 defence view phase 2', NULL, NULL, '1234', NULL, 1, '2024-02-23 17:28:01', '2024-02-23 17:31:54'),
(3, 'Sorab', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', NULL, '03321207068', NULL, NULL, 'Flat no 16 clifton block 8', NULL, NULL, '1234', NULL, 1, '2024-02-23 20:53:40', '2024-02-23 20:54:48'),
(4, 'Asif', NULL, NULL, '03162117669', NULL, NULL, NULL, NULL, NULL, '0999', NULL, 0, '2024-02-27 16:42:45', '2024-02-27 16:42:45'),
(5, 'Asif', NULL, NULL, '03162117629', NULL, NULL, NULL, NULL, NULL, '1234', NULL, 0, '2024-02-27 16:44:12', '2024-02-27 16:44:12'),
(6, NULL, NULL, NULL, '03002694873', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-02-27 16:45:59', '2024-02-27 16:45:59'),
(7, 'Mike', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', NULL, '03331258052', NULL, NULL, 'Mumtaz square', NULL, NULL, '1234', NULL, 1, '2024-02-27 19:36:40', '2024-02-27 19:38:52'),
(8, 'Ali', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', NULL, '03102427314', NULL, NULL, 'ss-10 saddar', NULL, NULL, '1234', NULL, 0, '2024-03-07 19:00:05', '2024-03-15 18:51:53'),
(9, 'Test', NULL, NULL, '03125436795', NULL, NULL, NULL, NULL, NULL, '1234', NULL, 0, '2024-03-07 19:36:47', '2024-03-07 19:36:47'),
(10, 'Yyyy', NULL, NULL, '03333385555', NULL, NULL, NULL, NULL, NULL, '1234', NULL, 0, '2024-03-08 14:02:51', '2024-03-08 14:02:51'),
(11, NULL, NULL, NULL, '03083500720', NULL, NULL, NULL, NULL, NULL, '1234', NULL, 0, '2024-03-13 12:56:19', '2024-03-13 12:56:19'),
(12, NULL, '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', NULL, '03162061478', NULL, NULL, 'G96 DEFENCE VIEW PHASE 2', NULL, NULL, NULL, NULL, 0, '2024-03-26 00:25:10', '2024-03-26 00:26:21'),
(13, NULL, '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', NULL, '03002117669', NULL, NULL, 'manzor colony', NULL, NULL, '1234', NULL, 0, '2024-03-28 13:18:11', '2024-03-28 13:19:39'),
(14, 'ASIF Hussain', NULL, NULL, '03331234567', NULL, NULL, NULL, NULL, NULL, '1234', NULL, 1, '2024-04-01 15:03:11', '2024-04-01 15:03:27'),
(15, 'sorab', NULL, NULL, '03339999999', NULL, NULL, NULL, NULL, NULL, '1234', NULL, 1, '2024-04-02 14:31:00', '2024-04-02 14:31:15'),
(16, 'sorab', NULL, NULL, '03351207060', NULL, NULL, NULL, NULL, NULL, '1234', NULL, 0, '2024-04-02 14:33:56', '2024-04-02 14:33:56'),
(17, 'Asifhussain', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', NULL, '03112511650', NULL, NULL, 'Saddar', NULL, NULL, '1234', NULL, 1, '2024-04-02 17:18:06', '2024-04-02 17:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `customer_operator`
--

CREATE TABLE `customer_operator` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL DEFAULT '0',
  `operator_id` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT (now()),
  `updated_at` datetime NOT NULL DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_operator`
--

INSERT INTO `customer_operator` (`id`, `customer_id`, `operator_id`, `created_at`, `updated_at`) VALUES
(1, 2, 10, '2024-02-23 10:31:54', '2024-02-23 10:31:54'),
(2, 3, 10, '2024-02-23 13:54:48', '2024-02-23 13:54:48'),
(3, 1, 6, '2024-02-26 10:08:39', '2024-02-26 10:08:39'),
(4, 1, 8, '2024-02-27 12:29:00', '2024-02-27 12:29:00'),
(5, 7, 8, '2024-02-27 12:38:52', '2024-02-27 12:38:52'),
(6, 1, 9, '2024-03-07 07:22:15', '2024-03-07 07:22:15'),
(7, 8, 9, '2024-03-15 11:51:53', '2024-03-15 11:51:53'),
(8, 12, 9, '2024-03-25 17:26:21', '2024-03-25 17:26:21'),
(9, 13, 9, '2024-03-28 06:19:39', '2024-03-28 06:19:39'),
(10, 17, 9, '2024-04-02 10:58:47', '2024-04-02 10:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `cust_reg_otp`
--

CREATE TABLE `cust_reg_otp` (
  `id` int NOT NULL,
  `customer_id` bigint DEFAULT NULL,
  `phone_number` varchar(25) DEFAULT NULL,
  `otp_number` smallint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_reg_otp`
--

INSERT INTO `cust_reg_otp` (`id`, `customer_id`, `phone_number`, `otp_number`, `created_at`, `updated_at`) VALUES
(9, 8, NULL, 2021, '2024-03-07 12:00:05', '2024-06-14 11:30:18'),
(10, 9, NULL, 2290, '2024-03-07 12:36:47', '2024-03-07 12:36:47'),
(11, 10, NULL, 9063, '2024-03-08 07:02:51', '2024-03-08 07:02:51'),
(12, NULL, '03083500720', NULL, '2024-03-13 05:56:14', '2024-03-13 05:56:19'),
(13, NULL, '03351207068', NULL, '2024-03-13 05:57:30', '2024-03-13 11:10:31'),
(14, NULL, '03102427314', NULL, '2024-03-15 11:48:32', '2024-03-15 11:48:38'),
(15, 4, NULL, 6145, '2024-03-19 09:29:23', '2024-03-19 09:29:23'),
(16, NULL, '03162061478', NULL, '2024-03-25 17:25:02', '2024-03-25 17:25:10'),
(17, NULL, '03002117669', NULL, '2024-03-28 06:18:00', '2024-03-29 11:36:59'),
(18, 13, NULL, 3618, '2024-04-01 08:02:12', '2024-04-01 08:02:12'),
(21, 16, '03351207060', 3061, '2024-04-02 07:33:56', '2024-04-02 07:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `deals_details`
--

CREATE TABLE `deals_details` (
  `id` bigint UNSIGNED NOT NULL,
  `deal_id` bigint UNSIGNED NOT NULL,
  `item_type_id` bigint UNSIGNED NOT NULL,
  `item_type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals_details`
--

INSERT INTO `deals_details` (`id`, `deal_id`, `item_type_id`, `item_type_name`, `quantity`, `created_at`, `updated_at`) VALUES
(27, 4, 2, 'Zinger Burger', 2, '2024-02-23 17:49:43', '2024-02-23 17:49:43'),
(30, 6, 10, 'Chicken Burger', 2, '2024-02-23 17:59:34', '2024-02-23 17:59:34'),
(31, 5, 3, 'Beef Burger', 2, '2024-02-23 18:00:57', '2024-02-23 18:00:57'),
(34, 9, 38, 'Appetizing Sandwich', 2, '2024-02-23 18:10:28', '2024-02-23 18:10:28'),
(81, 29, 2, 'Zinger Burger', 2, '2024-02-26 20:31:25', '2024-02-26 20:31:25'),
(82, 30, 37, 'Delicious Sandwiches', 1, '2024-02-26 20:35:06', '2024-02-26 20:35:06'),
(83, 30, 2, 'Zinger Burger', 2, '2024-02-26 20:35:06', '2024-02-26 20:35:06'),
(84, 31, 2, 'Zinger Burger', 3, '2024-02-26 20:37:07', '2024-02-26 20:37:07'),
(85, 31, 34, 'Coca Cola', 1, '2024-02-26 20:37:07', '2024-02-26 20:37:07'),
(86, 32, 28, 'Rolls', 1, '2024-02-26 20:53:02', '2024-02-26 20:53:02'),
(87, 32, 46, 'Beef Steak', 1, '2024-02-26 20:53:02', '2024-02-26 20:53:02'),
(88, 33, 47, 'Chicken Steak', 1, '2024-02-26 20:55:59', '2024-02-26 20:55:59'),
(89, 33, 27, 'French Fries', 1, '2024-02-26 20:55:59', '2024-02-26 20:55:59'),
(90, 33, 28, 'Rolls', 1, '2024-02-26 20:55:59', '2024-02-26 20:55:59'),
(91, 34, 46, 'Beef Steak', 1, '2024-02-26 20:58:57', '2024-02-26 20:58:57'),
(92, 34, 34, 'Coca Cola', 1, '2024-02-26 20:58:57', '2024-02-26 20:58:57'),
(93, 16, 44, 'Beef Nahari', 2, '2024-02-27 16:44:11', '2024-02-27 16:44:11'),
(94, 15, 40, 'Chicken Biryani', 2, '2024-02-27 16:45:25', '2024-02-27 16:45:25'),
(95, 14, 34, 'Coca Cola', 1, '2024-02-27 16:46:46', '2024-02-27 16:46:46'),
(96, 14, 33, 'Chicken Fajita Pizza', 2, '2024-02-27 16:46:46', '2024-02-27 16:46:46'),
(97, 13, 10, 'Chicken Burger', 3, '2024-02-27 16:48:09', '2024-02-27 16:48:09'),
(98, 11, 34, 'Coca Cola', 1, '2024-02-27 16:49:28', '2024-02-27 16:49:28'),
(99, 11, 3, 'Beef Burger', 2, '2024-02-27 16:49:28', '2024-02-27 16:49:28'),
(100, 12, 2, 'Zinger Burger', 2, '2024-02-27 16:55:58', '2024-02-27 16:55:58'),
(101, 22, 34, 'Coca Cola', 1, '2024-02-27 17:00:43', '2024-02-27 17:00:43'),
(102, 22, 4, 'Chicken Tikka Pizza', 2, '2024-02-27 17:00:43', '2024-02-27 17:00:43'),
(103, 21, 33, 'Chicken Fajita Pizza', 2, '2024-02-27 17:01:30', '2024-02-27 17:01:30'),
(104, 18, 34, 'Coca Cola', 2, '2024-02-27 17:03:25', '2024-02-27 17:03:25'),
(105, 18, 4, 'Chicken Tikka Pizza', 1, '2024-02-27 17:03:25', '2024-02-27 17:03:25'),
(106, 25, 34, 'Coca Cola', 1, '2024-02-27 17:05:13', '2024-02-27 17:05:13'),
(107, 25, 40, 'Chicken Biryani', 2, '2024-02-27 17:05:13', '2024-02-27 17:05:13'),
(108, 24, 41, 'Beef Biryani', 2, '2024-02-27 17:06:51', '2024-02-27 17:06:51'),
(110, 23, 40, 'Chicken Biryani', 2, '2024-02-27 17:07:59', '2024-02-27 17:07:59'),
(113, 20, 32, 'Chicken Pizza', 2, '2024-02-27 17:18:14', '2024-02-27 17:18:14'),
(114, 20, 34, 'Coca Cola', 2, '2024-02-27 17:18:14', '2024-02-27 17:18:14'),
(115, 17, 32, 'Chicken Pizza', 2, '2024-02-27 17:19:49', '2024-02-27 17:19:49'),
(116, 17, 34, 'Coca Cola', 2, '2024-02-27 17:19:49', '2024-02-27 17:19:49'),
(117, 19, 32, 'Chicken Pizza', 2, '2024-02-27 17:25:53', '2024-02-27 17:25:53'),
(118, 19, 34, 'Coca Cola', 2, '2024-02-27 17:25:53', '2024-02-27 17:25:53'),
(119, 10, 32, 'Chicken Pizza', 2, '2024-02-27 17:25:56', '2024-02-27 17:25:56'),
(120, 10, 27, 'French Fries', 2, '2024-02-27 17:25:56', '2024-02-27 17:25:56'),
(121, 8, 32, 'Chicken Pizza', 2, '2024-02-27 17:26:22', '2024-02-27 17:26:22'),
(122, 8, 34, 'Coca Cola', 1, '2024-02-27 17:26:22', '2024-02-27 17:26:22'),
(123, 7, 32, 'Chicken Pizza', 2, '2024-02-27 17:26:42', '2024-02-27 17:26:42'),
(124, 26, 3, 'Beef Burger', 2, '2024-02-27 17:32:01', '2024-02-27 17:32:01'),
(125, 26, 34, 'Coca Cola', 2, '2024-02-27 17:32:01', '2024-02-27 17:32:01'),
(128, 27, 3, 'Beef Burger', 2, '2024-02-27 17:40:11', '2024-02-27 17:40:11'),
(129, 27, 34, 'Coca Cola', 2, '2024-02-27 17:40:11', '2024-02-27 17:40:11'),
(130, 28, 2, 'Zinger Burger', 1, '2024-02-27 17:46:55', '2024-02-27 17:46:55'),
(131, 28, 34, 'Coca Cola', 2, '2024-02-27 17:46:55', '2024-02-27 17:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `deals_master`
--

CREATE TABLE `deals_master` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vendor_id` bigint DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` decimal(8,2) NOT NULL,
  `offer` decimal(8,2) NOT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals_master`
--

INSERT INTO `deals_master` (`id`, `name`, `description`, `vendor_id`, `start_date`, `end_date`, `banner`, `grand_total`, `offer`, `status`, `created_at`, `updated_at`) VALUES
(4, 'HAPPY HOUR HAPPINESS', 'BUY ANY 2 ZINGER BURGER', 32, '2024-02-23 00:00:00', '2024-03-01 00:00:00', '1708683895.jpg', 1800.00, 10.00, 1, '2024-02-23 17:26:45', '2024-02-23 17:49:43'),
(5, 'FAMILY FUN BUNDLE', 'BUY ANY 2  BEEF BURGER', 32, '2024-02-23 00:00:00', '2024-03-01 00:00:00', '1708684069.jpg', 1500.00, 10.00, 1, '2024-02-23 17:28:50', '2024-02-23 18:00:57'),
(6, 'VALUE MEAL OFFER', 'BUY ANY 2 CHICKEN BURGER', 32, '2024-02-23 00:00:00', '2024-03-01 00:00:00', '1708684217.jpg', 1000.00, 10.00, 1, '2024-02-23 17:32:17', '2024-02-23 17:59:34'),
(7, 'Chicken Feast Pizza Special', 'Indulge in our Chicken Feast Pizza Special Buy Any 2 Pizza', 31, '2024-02-20 00:00:00', '2024-02-25 00:00:00', '1708684874.jpg', 1200.00, 10.00, 1, '2024-02-23 17:43:57', '2024-02-27 17:26:42'),
(8, 'Chick-a-Licious Pizza Offer', 'Get two pizzas for the price of one with our exclusive deal today and soft drink', 31, '2024-02-20 00:00:00', '2024-02-29 00:00:00', '1708685337.jpg', 1100.00, 10.00, 1, '2024-02-23 17:57:59', '2024-02-27 17:26:22'),
(9, 'SNACK ATTACK SPECIAL', 'BUY ANY 2 SANDWHICH', 32, '2024-02-23 00:00:00', '2024-03-01 00:00:00', '1708685765.jpg', 1100.00, 10.00, 1, '2024-02-23 17:58:01', '2024-02-23 18:10:28'),
(10, 'FLAVOR FUSION DEAL', 'BUY 2 PIZZA AND 2 FRIES', 31, '2024-02-23 00:00:00', '2024-03-01 00:00:00', '1708687053.jpg', 1400.00, 10.00, 1, '2024-02-23 18:19:03', '2024-02-27 17:25:56'),
(11, 'ROYAL DEAL', 'BUY ANY 2 BEEF BURGER AND COLD DRINK FREE', 37, '2024-02-24 00:00:00', '2024-03-01 00:00:00', '1708774188.jpg', 1800.00, 10.00, 1, '2024-02-24 18:31:21', '2024-02-27 16:49:28'),
(12, 'TASTE SENSATION DEAL', 'BUY ANY 2 ZINGER BURGER', 37, '2024-02-24 00:00:00', '2024-03-01 00:00:00', '1708774376.jpg', 1150.00, 10.00, 1, '2024-02-24 18:34:59', '2024-02-27 16:55:58'),
(13, 'FAMILY DEAL', 'BUY ANY 3 CHICKEN BURGER', 37, '2024-02-24 00:00:00', '2024-03-01 00:00:00', '1708774580.png', 1200.00, 10.00, 1, '2024-02-24 18:37:19', '2024-02-27 16:48:09'),
(14, 'HERITAGE COMBO', 'BUY PIZZA AND FREE COLD DRINK', 34, '2024-02-24 00:00:00', '2024-03-01 00:00:00', '1708774804.jpg', 2300.00, 10.00, 1, '2024-02-24 18:40:54', '2024-02-27 16:46:46'),
(15, 'BIRYANI DELIGHT DAYS', 'BUY ANY 2 CHICKEN BIRYANI', 34, '2024-02-24 00:00:00', '2024-03-01 00:00:00', '1708775081.jpg', 800.00, 10.00, 1, '2024-02-24 18:45:22', '2024-02-27 16:45:25'),
(16, 'NIHARI NIGHT SPECIAL', 'BUY ANY 2 BEEF NIHARI', 34, '2024-02-24 00:00:00', '2024-03-01 00:00:00', '1708775253.jpg', 700.00, 10.00, 1, '2024-02-24 18:48:37', '2024-02-27 16:44:11'),
(17, 'Dough Dazzlers', 'Enjoy exclusive discounts and rewards on your favorite pizzas with Pizza Perks deals buy Any two pizzas with two soft drink', 40, '2024-02-27 00:00:00', '2024-03-03 00:00:00', '1708948014.jpg', 1400.00, 5.00, 1, '2024-02-26 17:19:30', '2024-02-27 17:19:49'),
(18, 'Pizza Party Package', 'Buy any 1 pizza and 2 cold drink', 46, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708947648.jpg', 1800.00, 10.00, 1, '2024-02-26 18:44:35', '2024-02-27 17:03:25'),
(19, 'Dough Dazzlers', 'Enjoy exclusive discounts and rewards on your favorite pizzas with pizza perks deals buy any two pizzas with two soft drink', 40, '2024-02-27 00:00:00', '2024-03-03 00:00:00', '1708948014.jpg', 1400.00, 5.00, 1, '2024-02-26 18:50:39', '2024-02-27 17:25:53'),
(20, 'Pizza Palooza', 'Pizza Palooza offers mouthwatering deals on a variety of pizzas, perfect for satisfying any craving buy any two pizzas with  two soft drink', 40, '2024-03-01 00:00:00', '2024-03-07 00:00:00', '1708952519.jpg', 1200.00, 5.00, 1, '2024-02-26 20:02:52', '2024-02-27 17:18:14'),
(21, 'Family Feast Fiesta', 'Buy any 2 pizza', 46, '2024-02-27 00:00:00', '2024-03-01 00:00:00', '1708952539.jpg', 2400.00, 10.00, 1, '2024-02-26 20:03:19', '2024-02-27 17:01:30'),
(22, 'Delight Deal', 'Buy any 2 pizza and cold drink', 46, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708952677.jpg', 2300.00, 10.00, 1, '2024-02-26 20:05:34', '2024-02-27 17:00:43'),
(23, 'Rice Delight Deal', 'Buy any 2 chicken biryani', 45, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708952863.jpg', 750.00, 10.00, 1, '2024-02-26 20:08:14', '2024-02-27 17:07:59'),
(24, 'Biryani Bliss Bargain', 'Buy any 2 beef biryani', 45, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708952979.jpg', 700.00, 10.00, 1, '2024-02-26 20:10:39', '2024-02-27 17:06:51'),
(25, 'Spice Sensation', 'buy any 2 chicken biryani and cold drink', 45, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708953127.jpg', 900.00, 10.00, 1, '2024-02-26 20:12:57', '2024-02-27 17:05:13'),
(26, 'Burger Blitz Bonanza', 'Burger Blitz Bonanza: Sizzling \r\ndeals on your favorite burgers for a limited time buy any two beef burgers with two soft drinks', 42, '2024-03-01 00:00:00', '2024-03-07 00:00:00', '1708953161.jpg', 1000.00, 5.00, 1, '2024-02-26 20:14:03', '2024-02-27 17:32:01'),
(27, 'Beefy Bargains', 'Indulge in mouthwatering beefy bargains with our delicious burger selectio buy any two burgers with two soft drinks', 42, '2024-03-01 00:00:00', '2024-03-08 00:00:00', '1708953336.jpg', 800.00, 5.00, 1, '2024-02-26 20:17:39', '2024-02-27 17:40:11'),
(28, 'Burger Feast Frenzy', 'Indulge in a frenzy of delicious burgers with our Burger Feast - a tantalizing array of flavors to satisfy every craving buy any two burgers with two soft drinks', 42, '2024-03-05 00:00:00', '2024-03-10 00:00:00', '1708953749.jpg', 1100.00, 5.00, 1, '2024-02-26 20:24:23', '2024-02-27 17:46:55'),
(29, 'Family Burger Deal', 'Buy any 2 zinger burgers.', 39, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708954231.jpg', 1200.00, 10.00, 1, '2024-02-26 20:31:25', '2024-02-26 20:31:25'),
(30, 'Zinger Combo', 'Buy any 2 zinger and sandwhich', 39, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708954396.jpg', 1700.00, 10.00, 1, '2024-02-26 20:35:06', '2024-02-26 20:35:06'),
(31, 'Happy Hour', 'Buy any 3 zinger and cold drink', 39, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708954561.jpg', 2200.00, 10.00, 1, '2024-02-26 20:37:07', '2024-02-26 20:37:07'),
(32, 'Heaven Deal', 'buy beef stake and roll', 38, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708954757.jpg', 1200.00, 10.00, 1, '2024-02-26 20:53:02', '2024-02-26 20:53:02'),
(33, 'Juicy Stake Jublee', 'Buy chicken stake , fries and cold drink', 38, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708955691.jpg', 1000.00, 10.00, 1, '2024-02-26 20:55:59', '2024-02-26 20:55:59'),
(34, 'Meat lover Feast', 'Buy beef stake and cold drink', 38, '2024-02-26 00:00:00', '2024-03-01 00:00:00', '1708955887.jpg', 1200.00, 10.00, 1, '2024-02-26 20:58:57', '2024-02-26 20:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `deal_addons`
--

CREATE TABLE `deal_addons` (
  `id` bigint UNSIGNED NOT NULL,
  `deal_id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_addons`
--

INSERT INTO `deal_addons` (`id`, `deal_id`, `item_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(3, 22, 194, 1, 1, '2024-04-05 14:11:54', '2024-04-05 14:11:54'),
(4, 25, 332, 1, 1, '2024-04-05 14:13:28', '2024-04-05 14:13:28'),
(7, 10, 180, 1, 1, '2024-04-08 14:04:58', '2024-04-08 14:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `deal_options`
--

CREATE TABLE `deal_options` (
  `id` int NOT NULL,
  `deal_id` bigint UNSIGNED NOT NULL,
  `deal_detail_id` bigint NOT NULL,
  `item_id` bigint NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `item_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `item_original_price` int NOT NULL DEFAULT '0',
  `deal_price` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_options`
--

INSERT INTO `deal_options` (`id`, `deal_id`, `deal_detail_id`, `item_id`, `item_name`, `item_description`, `item_image`, `item_original_price`, `deal_price`, `created_at`, `updated_at`) VALUES
(63, 4, 27, 126, 'INFERNO ZINGER TWIST', 'Inferno Zinger Twist.', '1708673775.jpg', 1200, 0, '2024-02-23 17:49:43', '2024-02-23 17:49:43'),
(64, 4, 27, 125, 'MIGHTY ZINGER', 'Juicy chicken breast, coated in fiery spices, nestled in a soft bun', '1708673610.jpg', 1000, 0, '2024-02-23 17:49:43', '2024-02-23 17:49:43'),
(70, 6, 30, 140, 'SUPREME CHICKEN SENSATIONS', 'flavor-packed journey that will elevate your taste experience to new heights.', '1708674882.png', 600, 0, '2024-02-23 17:59:34', '2024-02-23 17:59:34'),
(71, 6, 30, 138, 'CRISPY COOP BURGER', 'Where crispy goodness meets savory satisfaction.', '1708674814.png', 550, 0, '2024-02-23 17:59:34', '2024-02-23 17:59:34'),
(72, 5, 31, 133, 'MOUTHWATERING BEEF MEDLEY', 'A symphony of taste in every bite.', '1708674546.jpg', 1350, 50, '2024-02-23 18:00:57', '2024-02-23 18:00:57'),
(73, 5, 31, 129, 'BEEFY BLISS BOMB', 'a taste sensation that will leave you craving more.', '1708674068.jpg', 750, 0, '2024-02-23 18:00:57', '2024-02-23 18:00:57'),
(74, 5, 31, 128, 'JUICY ANGUS CLASSIC', 'savor the essence of perfection in every bite.', '1708673966.jpg', 890, 0, '2024-02-23 18:00:57', '2024-02-23 18:00:57'),
(79, 9, 34, 158, 'ROAST BEEF REVEAL', 'Juicy roast beef nestled between layers of fresh bread, a true delight for your taste buds.', '1708681802.jpg', 650, 0, '2024-02-23 18:10:28', '2024-02-23 18:10:28'),
(80, 9, 34, 155, 'CHICKEN CHEESE SANDWHICH', 'Tender grilled chicken layered with melted cheese.', '1708681686.jpg', 600, 0, '2024-02-23 18:10:28', '2024-02-23 18:10:28'),
(177, 29, 81, 284, 'Flame-Kissed Zinger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942717.jpg', 780, 0, '2024-02-26 20:31:25', '2024-02-26 20:31:25'),
(178, 29, 81, 282, 'Heatwave Zinger Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942515.jpg', 750, 0, '2024-02-26 20:31:25', '2024-02-26 20:31:25'),
(179, 30, 82, 303, 'Grand Slamwich', 'Savor our club sandwich, stacked high with layers of succulent meats, crisp lettuce, juicy tomatoes, and creamy spreads, all nestled between toasted bread for a satisfying bite.', '1708945621.jpg', 490, 0, '2024-02-26 20:35:06', '2024-02-26 20:35:06'),
(180, 30, 83, 284, 'Flame-Kissed Zinger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942717.jpg', 780, 200, '2024-02-26 20:35:06', '2024-02-26 20:35:06'),
(181, 30, 83, 282, 'Heatwave Zinger Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942515.jpg', 750, 0, '2024-02-26 20:35:06', '2024-02-26 20:35:06'),
(182, 30, 83, 264, 'BlazeBite Zinger Buger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708941265.jpg', 800, 0, '2024-02-26 20:35:06', '2024-02-26 20:35:06'),
(183, 31, 84, 264, 'BlazeBite Zinger Buger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708941265.jpg', 800, 0, '2024-02-26 20:37:07', '2024-02-26 20:37:07'),
(184, 31, 84, 257, 'Flaming Zest Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708940528.jpg', 780, 0, '2024-02-26 20:37:07', '2024-02-26 20:37:07'),
(185, 31, 84, 254, 'Spicy Blaze Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708940373.jpg', 750, 0, '2024-02-26 20:37:07', '2024-02-26 20:37:07'),
(186, 31, 85, 286, 'Coca Cola 350 ml', 'Coca-Cola, the iconic fizzy beverage, delights with its refreshing blend of caramel sweetness and effervescence, sparking moments of happiness with every sip.', '1708942861.jpg', 450, 0, '2024-02-26 20:37:07', '2024-02-26 20:37:07'),
(187, 32, 86, 316, 'ZestyRoll', 'Bursting with bold flavors and a tantalizing zest, this roll offers a mouthwatering combination of savory ingredients wrapped in a soft, doughy embrace.', '1708952929.jpg', 450, 0, '2024-02-26 20:53:02', '2024-02-26 20:53:02'),
(188, 32, 87, 314, 'Garlic Butter Beef Steak', 'Indulge in our juicy Beef steak, grilled to perfection and bursting with savory flavors in every tender bite.', '1708952674.jpg', 1000, 0, '2024-02-26 20:53:02', '2024-02-26 20:53:02'),
(189, 33, 88, 313, 'Grilled Chicken Supreme', 'Indulge in our juicy chicken steak, grilled to perfection and bursting with savory flavors in every tender bite.', '1708947568.jpg', 700, 0, '2024-02-26 20:55:59', '2024-02-26 20:55:59'),
(190, 33, 89, 321, 'Curly Fries', 'Golden and crispy fries, the perfect combination of fluffy inside and crunchy outside.', '1708953384.jpg', 100, 0, '2024-02-26 20:55:59', '2024-02-26 20:55:59'),
(191, 33, 90, 315, 'RollBite', 'A delightful fusion of savory fillings wrapped in a tender, bite-sized roll, perfect for on-the-go snacking or as appetizers for any occasion.', '1708952854.jpg', 450, 0, '2024-02-26 20:55:59', '2024-02-26 20:55:59'),
(192, 34, 91, 314, 'Garlic Butter Beef Steak', 'Indulge in our juicy Beef steak, grilled to perfection and bursting with savory flavors in every tender bite.', '1708952674.jpg', 1000, 0, '2024-02-26 20:58:57', '2024-02-26 20:58:57'),
(193, 34, 92, 319, 'Coca Cola 350 ml', 'Coca-Cola: the iconic, bubbly beverage loved worldwide for its sweet and refreshing taste.', '1708953136.jpg', 450, 0, '2024-02-26 20:58:57', '2024-02-26 20:58:57'),
(194, 16, 93, 228, 'BEEF NIHARI', 'slow-cooked to perfection in a rich, aromatic gravy infused with a medley of spices like cloves, cinnamon, and cardamom, until the meat is incredibly tender and flavorful', '1708773676.jpg', 380, 0, '2024-02-27 16:44:11', '2024-02-27 16:44:11'),
(195, 16, 93, 227, 'NALLI NIHARI', 'Tender nalli (bone marrow) pieces, slow-cooked in a rich, flavorful gravy infused with aromatic spices like cloves, cardamom, and cinnamon, until the meat falls off the bone', '1708773606.jpg', 450, 0, '2024-02-27 16:44:11', '2024-02-27 16:44:11'),
(196, 15, 94, 222, 'ZAFFRAN CHICKEN BIRYANI', 'Aromatic basmati rice layered with tender marinated chicken', '1708773065.jpg', 550, 0, '2024-02-27 16:45:25', '2024-02-27 16:45:25'),
(197, 15, 94, 221, 'HYEDRABADI CHICKEN BIRYANI', 'Aromatic basmati rice layered with tender marinated chicken', '1708772998.jpg', 400, 0, '2024-02-27 16:45:25', '2024-02-27 16:45:25'),
(198, 14, 95, 220, 'PEPSI  350ml', 'PEPSI is a carbonated soft drink known for its caramel color, distinctive flavor, and worldwide popularity.', '1708772957.jpg', 400, 0, '2024-02-27 16:46:46', '2024-02-27 16:46:46'),
(199, 14, 96, 217, 'CHICKEN FAJITA (LARGE)', 'grilled with bell peppers and onions, wrapped in a warm tortilla, topped with creamy guacamole and tangy salsa, creating a flavorful Tex-Mex delight that\'s sure to satisfy any craving.', '1708772810.jpg', 1550, 0, '2024-02-27 16:46:46', '2024-02-27 16:46:46'),
(200, 14, 96, 216, 'CHICKEN FAJITA (MEDIUM)', 'grilled with bell peppers and onions, wrapped in a warm tortilla, topped with creamy guacamole and tangy salsa, creating a flavorful Tex-Mex delight that\'s sure to satisfy any craving.', '1708772759.jpg', 700, 0, '2024-02-27 16:46:46', '2024-02-27 16:46:46'),
(201, 13, 97, 192, 'FLAVORFUL CHICKEN FUSION', 'crispy goodness meets savory satisfaction.', '1708696460.png', 450, 0, '2024-02-27 16:48:09', '2024-02-27 16:48:09'),
(202, 13, 97, 191, 'GOLDEN CRISP BURGER', 'Indulge in the perfect combination of juicy goodness and crispy perfection.', '1708696376.png', 550, 0, '2024-02-27 16:48:09', '2024-02-27 16:48:09'),
(203, 13, 97, 190, 'ZESTY CHICKEN BURGER', 'A crunchy sensation that\'ll make your taste buds dance', '1708695483.png', 400, 0, '2024-02-27 16:48:09', '2024-02-27 16:48:09'),
(204, 11, 98, 194, 'PEPSI (350 ML)', 'a carbonated soft drink.', '1708696997.jpg', 450, 0, '2024-02-27 16:49:28', '2024-02-27 16:49:28'),
(205, 11, 99, 189, 'MIGHTY BEEF BURGER', 'A powerhouse of flavor and spice.', '1708695100.jpg', 850, 0, '2024-02-27 16:49:28', '2024-02-27 16:49:28'),
(206, 11, 99, 187, 'BOLD BEEF BUSTER', 'sure to satisfy your cravings and leave you wanting more, every time.', '1708695010.jpg', 800, 0, '2024-02-27 16:49:28', '2024-02-27 16:49:28'),
(207, 12, 100, 185, 'TANGO BLAZE ZINGER', 'Fiery feast that ignites your taste buds.', '1708694595.jpg', 650, 0, '2024-02-27 16:55:58', '2024-02-27 16:55:58'),
(208, 12, 100, 184, 'CHEESE ZINGER', 'Try our cheesey sensation today!', '1708694451.jpg', 600, 0, '2024-02-27 16:55:58', '2024-02-27 16:55:58'),
(209, 22, 101, 271, 'Coca Cola (350 ML)', 'a carbonated soft drink.', '1708941539.jpg', 400, 0, '2024-02-27 17:00:43', '2024-02-27 17:00:43'),
(210, 22, 102, 265, 'Chicken Tikka (LARGE)', 'Top pizza dough with a layer of tikka sauce, cooked chicken tikka, onions, and cheese.', '1708941288.jpg', 1500, 0, '2024-02-27 17:00:43', '2024-02-27 17:00:43'),
(211, 22, 102, 263, 'Chicken Tikka (MEDIUM)', 'Top pizza dough with a layer of tikka sauce, cooked chicken tikka, onions, and cheese.', '1708941252.jpg', 1100, 0, '2024-02-27 17:00:43', '2024-02-27 17:00:43'),
(212, 21, 103, 269, 'Chicken Fajita (LARGE)', 'top with cooked chicken fajita strips, bell peppers, onions, and cheese. Bake until crust is golden and cheese is bubbly, then serve with sour cream', '1708941467.jpg', 1550, 0, '2024-02-27 17:01:30', '2024-02-27 17:01:30'),
(213, 21, 103, 267, 'Chicken Fajita (MEDIUM)', 'top with cooked chicken fajita strips, bell peppers, onions, and cheese. Bake until crust is golden and cheese is bubbly, then serve with sour cream', '1708941431.jpg', 1200, 0, '2024-02-27 17:01:30', '2024-02-27 17:01:30'),
(214, 18, 104, 272, 'Pepsi (350 ML)', 'a carbonated soft drink.', '1708941672.jpg', 350, 0, '2024-02-27 17:03:25', '2024-02-27 17:03:25'),
(215, 18, 104, 271, 'Coca Cola (350 ML)', 'a carbonated soft drink.', '1708941539.jpg', 400, 0, '2024-02-27 17:03:25', '2024-02-27 17:03:25'),
(216, 18, 105, 265, 'Chicken Tikka (LARGE)', 'Top pizza dough with a layer of tikka sauce, cooked chicken tikka, onions, and cheese.', '1708941288.jpg', 1500, 200, '2024-02-27 17:03:25', '2024-02-27 17:03:25'),
(217, 18, 105, 263, 'Chicken Tikka (MEDIUM)', 'Top pizza dough with a layer of tikka sauce, cooked chicken tikka, onions, and cheese.', '1708941252.jpg', 1100, 0, '2024-02-27 17:03:25', '2024-02-27 17:03:25'),
(218, 18, 105, 261, 'Chicken Tikka (SMALL)', 'Top pizza dough with a layer of tikka sauce, cooked chicken tikka, onions, and cheese.', '1708941210.jpg', 650, 0, '2024-02-27 17:03:25', '2024-02-27 17:03:25'),
(219, 25, 106, 285, 'Pepsi (350 ML)', 'a carbonated soft drink.', '1708942717.jpg', 350, 0, '2024-02-27 17:05:13', '2024-02-27 17:05:13'),
(220, 25, 107, 281, 'Hyderabadi Chicken Biryani', 'Serve hot, garnished with fried onions, mint leaves, and a sprinkle of saffron strands for a flavorful feast.', '1708942507.jpg', 320, 0, '2024-02-27 17:05:13', '2024-02-27 17:05:13'),
(221, 25, 107, 280, 'Zaffran Chicken Biryani', 'Prepare succulent chicken marinated with yogurt, spices, and saffron-infused water, layered with fragrant basmati rice and cooked until perfection', '1708942401.jpg', 420, 0, '2024-02-27 17:05:13', '2024-02-27 17:05:13'),
(222, 24, 108, 279, 'Dumba Beef Biryani', 'Cook tender beef pieces with basmati rice, aromatic spices, and saffron-infused water until perfectly cooked', '1708942240.jpg', 450, 0, '2024-02-27 17:06:51', '2024-02-27 17:06:51'),
(223, 24, 108, 277, 'Beef Biryani', 'Cook tender beef pieces with basmati rice, aromatic spices, and saffron-infused water until perfectly cooked.', '1708942171.jpg', 380, 0, '2024-02-27 17:06:51', '2024-02-27 17:06:51'),
(226, 23, 110, 280, 'Zaffran Chicken Biryani', 'Prepare succulent chicken marinated with yogurt, spices, and saffron-infused water, layered with fragrant basmati rice and cooked until perfection', '1708942401.jpg', 420, 0, '2024-02-27 17:07:59', '2024-02-27 17:07:59'),
(227, 23, 110, 275, 'Chicken Biryani', 'Cook marinated chicken with rice, spices, and saffron-infused water until tender and fragrant', '1708942027.jpg', 350, 0, '2024-02-27 17:07:59', '2024-02-27 17:07:59'),
(232, 20, 113, 250, 'Teriyaki Tango Pizza (small)', 'Teriyaki Tango Pizza: A mouthwatering fusion of savory teriyaki flavors atop a crispy pizza crust, offering a delightful twist on traditional pizza', '1708939991.jpg', 890, 50, '2024-02-27 17:18:14', '2024-02-27 17:18:14'),
(233, 20, 113, 242, 'BBQ Bird Blast', 'Pizza BBQ Bird Blast: A tantalizing fusion of smoky barbecue flavors and savory toppings, delivering a mouthwatering explosion of taste in every bite.', '1708939515.jpg', 795, 0, '2024-02-27 17:18:14', '2024-02-27 17:18:14'),
(234, 20, 114, 298, 'Pepsi (350 ml)', 'A carbonated soft drink', '1708943732.jpg', 400, 0, '2024-02-27 17:18:14', '2024-02-27 17:18:14'),
(235, 20, 114, 293, 'Coca Cola (350 ml)', 'Coca-Cola Original Taste has the full refreshing flavor you know and love', '1708946613.jpg', 400, 0, '2024-02-27 17:18:14', '2024-02-27 17:18:14'),
(236, 17, 115, 246, 'Poultry Perfection Pie', 'Indulge in a Poultry Perfection Pie – a savory pizza topped with a delightful medley of chicken and poultry goodness', '1708939871.jpg', 1099, 0, '2024-02-27 17:19:49', '2024-02-27 17:19:49'),
(237, 17, 115, 243, 'Cheeky Chicken Chorizo', 'Indulge in a tantalizing twist with our Cheeky Chicken Chorizo pizza, bursting with savory chicken, spicy chorizo, and a medley of mouthwatering flavors', '1708939746.jpg', 1650, 500, '2024-02-27 17:19:49', '2024-02-27 17:19:49'),
(238, 17, 116, 298, 'Pepsi (350 ml)', 'A carbonated soft drink', '1708943732.jpg', 400, 0, '2024-02-27 17:19:49', '2024-02-27 17:19:49'),
(239, 17, 116, 293, 'Coca Cola (350 ml)', 'Coca-Cola Original Taste has the full refreshing flavor you know and love', '1708946613.jpg', 400, 0, '2024-02-27 17:19:49', '2024-02-27 17:19:49'),
(240, 19, 117, 246, 'Poultry Perfection Pie', 'Indulge in a Poultry Perfection Pie – a savory pizza topped with a delightful medley of chicken and poultry goodness', '1708939871.jpg', 1099, 0, '2024-02-27 17:25:53', '2024-02-27 17:25:53'),
(241, 19, 117, 243, 'Cheeky Chicken Chorizo', 'Indulge in a tantalizing twist with our Cheeky Chicken Chorizo pizza, bursting with savory chicken, spicy chorizo, and a medley of mouthwatering flavors', '1708939746.jpg', 1650, 500, '2024-02-27 17:25:53', '2024-02-27 17:25:53'),
(242, 19, 118, 298, 'Pepsi (350 ml)', 'A carbonated soft drink', '1708943732.jpg', 400, 0, '2024-02-27 17:25:53', '2024-02-27 17:25:53'),
(243, 19, 118, 293, 'Coca Cola (350 ml)', 'Coca-Cola Original Taste has the full refreshing flavor you know and love', '1708946613.jpg', 400, 0, '2024-02-27 17:25:53', '2024-02-27 17:25:53'),
(244, 10, 119, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, '2024-02-27 17:25:56', '2024-02-27 17:25:56'),
(245, 10, 119, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, '2024-02-27 17:25:56', '2024-02-27 17:25:56'),
(246, 10, 120, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, '2024-02-27 17:25:56', '2024-02-27 17:25:56'),
(247, 10, 120, 181, 'Golden Garlic Fries', 'Crispy, golden-brown fries seasoned with aromatic garlic, offering a perfect balance of savory flavor and satisfying crunch in every bite, sure to tantalize the taste buds of garlic enthusiasts.', '1708685260.jpg', 150, 0, '2024-02-27 17:25:56', '2024-02-27 17:25:56'),
(248, 8, 121, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, '2024-02-27 17:26:22', '2024-02-27 17:26:22'),
(249, 8, 121, 150, 'Chicken Delight Pizza', 'Chicken Delight Pizza: A delicious combination of tender chicken, savory sauce, and melted cheese on a crispy crust.\"', '1708675811.jpg', 649, 0, '2024-02-27 17:26:22', '2024-02-27 17:26:22'),
(250, 8, 121, 148, 'Chicken Supreme Pizza', 'A delectable pizza featuring tender chicken, savory bacon, flavorful mushrooms, and creamy mozzarella cheese on a crispy crust.', '1708675578.jpg', 899, 100, '2024-02-27 17:26:22', '2024-02-27 17:26:22'),
(251, 8, 122, 180, 'Pepsi  500ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', '1708685114.jpg', 100, 0, '2024-02-27 17:26:22', '2024-02-27 17:26:22'),
(252, 8, 122, 179, 'Coca cola 500 ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', '1708685021.jpg', 90, 0, '2024-02-27 17:26:22', '2024-02-27 17:26:22'),
(253, 7, 123, 162, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, '2024-02-27 17:26:42', '2024-02-27 17:26:42'),
(254, 7, 123, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, '2024-02-27 17:26:42', '2024-02-27 17:26:42'),
(255, 7, 123, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, '2024-02-27 17:26:42', '2024-02-27 17:26:42'),
(256, 26, 124, 262, 'Smoky BBQ Bliss', 'Indulge in the smoky satisfaction of our Smoky BBQ Bliss burger, where every bite is a savory delight', '1708941222.jpg', 390, 0, '2024-02-27 17:32:01', '2024-02-27 17:32:01'),
(257, 26, 124, 260, 'Classic Cowboy', 'The Classic Cowboy: A hearty burger featuring a juicy beef patty topped with cheddar cheese, crispy bacon, tangy barbecue sauce, and crispy onion rings, all served on a toasted bun', '1708940749.jpg', 649, 200, '2024-02-27 17:32:01', '2024-02-27 17:32:01'),
(258, 26, 125, 318, 'Pepsi  ( ml350 )', 'Soft Drink', '1708953124.jpg', 350, 0, '2024-02-27 17:32:01', '2024-02-27 17:32:01'),
(259, 26, 125, 317, 'Coca Cola    ( ml 350 )', 'Soft Drink', '1708953049.jpg', 350, 0, '2024-02-27 17:32:01', '2024-02-27 17:32:01'),
(264, 27, 128, 270, 'Blue Cheese Bonanza', 'Indulge in a Cheese Bonanza with our mouthwatering burger piled high with a variety of melted cheeses for the ultimate cheesy delight', '1708941482.jpg', 490, 100, '2024-02-27 17:40:11', '2024-02-27 17:40:11'),
(265, 27, 128, 262, 'Smoky BBQ Bliss', 'Indulge in the smoky satisfaction of our Smoky BBQ Bliss burger, where every bite is a savory delight', '1708941222.jpg', 390, 0, '2024-02-27 17:40:11', '2024-02-27 17:40:11'),
(266, 27, 129, 318, 'Pepsi  ( ml350 )', 'Soft Drink', '1708953124.jpg', 350, 0, '2024-02-27 17:40:11', '2024-02-27 17:40:11'),
(267, 27, 129, 317, 'Coca Cola    ( ml 350 )', 'Soft Drink', '1708953049.jpg', 350, 0, '2024-02-27 17:40:11', '2024-02-27 17:40:11'),
(268, 28, 130, 256, 'Zesty Ranchero', 'A mouthwatering burger infused with zesty ranchero flavors, perfect for an unforgettable dining experience', '1708940421.jpg', 799, 100, '2024-02-27 17:46:55', '2024-02-27 17:46:55'),
(269, 28, 130, 253, 'Cluckin\' Classic', 'Cluckin\' Classic: A savory burger featuring a juicy chicken patty seasoned to perfection, nestled between toasted buns with fresh toppings for a timeless taste sensation', '1708940245.jpg', 699, 0, '2024-02-27 17:46:55', '2024-02-27 17:46:55'),
(270, 28, 131, 318, 'Pepsi  ( ml350 )', 'Soft Drink', '1708953124.jpg', 350, 0, '2024-02-27 17:46:55', '2024-02-27 17:46:55'),
(271, 28, 131, 317, 'Coca Cola    ( ml 350 )', 'Soft Drink', '1708953049.jpg', 350, 0, '2024-02-27 17:46:55', '2024-02-27 17:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int NOT NULL,
  `order_master_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `rider_id` int DEFAULT NULL,
  `pick_up_time` datetime DEFAULT NULL,
  `delivered_time` datetime DEFAULT NULL,
  `customer_comments` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `comments` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rating` tinyint DEFAULT NULL COMMENT '5 star rating',
  `base_return_time` datetime DEFAULT NULL COMMENT 'return to base location time',
  `commission_amount` decimal(10,0) DEFAULT NULL,
  `status` tinyint DEFAULT NULL COMMENT '0 = not_picked, 1= picked, 2 = on the way, 3 = delivered, 4 = canceled, 5 = missed, 6 = theft ',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Delivery process info';

-- --------------------------------------------------------

--
-- Table structure for table `favourite_vendors`
--

CREATE TABLE `favourite_vendors` (
  `id` int NOT NULL,
  `vendor_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourite_vendors`
--

INSERT INTO `favourite_vendors` (`id`, `vendor_id`, `customer_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 34, 11, '2024-05-06 11:41:37', '2024-05-06 11:41:37', NULL),
(3, 42, 1, '2024-05-07 10:54:27', '2024-05-07 10:54:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_lists`
--

CREATE TABLE `items_lists` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `vendor_id` bigint DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `discription` varchar(255) DEFAULT NULL COMMENT 'Description of the item',
  `discount` decimal(6,2) DEFAULT NULL,
  `instock` tinyint(1) DEFAULT '1',
  `price` decimal(7,2) DEFAULT NULL,
  `qty` int DEFAULT '0' COMMENT 'qty in hand',
  `measuring_unit` varchar(30) DEFAULT NULL COMMENT 'To mention for Kg, ltr for grocery items',
  `qty_reorder` int DEFAULT NULL COMMENT 'the quantity where we will have to give new order',
  `max_order_qty` int DEFAULT NULL,
  `sort_by` int DEFAULT NULL,
  `main_image` varchar(225) DEFAULT NULL,
  `is_addon` tinyint NOT NULL DEFAULT '0',
  `is_grocery` tinyint DEFAULT '0' COMMENT '0 = food, 1 = grocery',
  `preparation_time` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_lists`
--

INSERT INTO `items_lists` (`id`, `category_id`, `vendor_id`, `name`, `discription`, `discount`, `instock`, `price`, `qty`, `measuring_unit`, `qty_reorder`, `max_order_qty`, `sort_by`, `main_image`, `is_addon`, `is_grocery`, `preparation_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(210, 4, 34, 'CHICKEN TIKKA (SMALL)', 'nestled on a crispy pizza crust, tantalizing taste buds with a fusion of Indian and Italian flavors', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708772529.jpg', 0, 0, '20', '2024-02-24 11:02:09', '2024-02-24 11:02:09', NULL),
(209, 19, 36, 'Unsalted Butter( 200g)', 'Unsalted butter is creamy, rich dairy goodness without added salt, ideal for precise control of seasoning in cooking and baking.', 10.00, 1, 400.00, 99, NULL, NULL, 100, NULL, '1708772354.jpg', 0, 0, '10', '2024-02-24 10:59:14', '2024-02-24 10:59:14', NULL),
(208, 21, 36, 'Swiss cheese', 'Swiss cheese is a semi-hard cheese with a nutty flavor and iconic holes, versatile for sandwiches, fondue, or pairing with fruit and wine.', 10.00, 1, 600.00, 99, NULL, NULL, 100, NULL, '1708766055.jpg', 0, 0, '10', '2024-02-24 09:14:15', '2024-02-24 09:14:15', NULL),
(207, 21, 36, 'Pizza Cheese (400g)', 'Pizza cheese typically refers to a blend of mozzarella and other cheeses, chosen for their melting qualities and savory flavor, essential for creating the gooey, indulgent topping on pizzas.', 10.00, 1, 1100.00, 99, NULL, NULL, 100, NULL, '1708765810.jpg', 0, 0, '10', '2024-02-24 09:10:10', '2024-02-24 09:10:10', NULL),
(206, 21, 36, 'Mozzarella Cheese (500g)', 'Mozzarella is a soft, stretchy cheese with a mild flavor, perfect for melting on pizzas or adding creaminess to salads.', 10.00, 1, 650.00, 99, NULL, NULL, 100, NULL, '1708765710.jpg', 0, 0, '10', '2024-02-24 09:08:30', '2024-02-24 09:08:30', NULL),
(205, 6, 36, 'Grapes (1kg)', 'Grapes are small, sweet, and juicy berries, available in a variety of colors, enjoyed fresh or as a flavorful addition to salads and desserts.', 10.00, 1, 300.00, 99, NULL, NULL, 100, NULL, '1708765402.jpg', 0, 0, '10', '2024-02-24 09:03:23', '2024-02-24 09:03:23', NULL),
(204, 6, 36, 'Watermelon (1kg)', 'Watermelons are large, juicy fruits with a sweet, refreshing taste, perfect for staying hydrated on hot summer days.', 10.00, 1, 100.00, 99, NULL, NULL, 100, NULL, '1708765332.jpg', 0, 0, '10', '2024-02-24 09:02:12', '2024-02-24 09:02:12', NULL),
(203, 6, 36, 'Orange (1kg)', 'Oranges are juicy citrus fruits known for their bright color and tangy-sweet flavor, packed with vitamin C and refreshing taste.', 10.00, 1, 200.00, 99, NULL, NULL, 100, NULL, '1708765274.jpg', 0, 0, '10', '2024-02-24 09:01:14', '2024-02-24 09:01:14', NULL),
(202, 6, 36, 'Banana (1kg)', 'Bananas are soft, creamy fruits encased in a yellow peel, offering a convenient and nutritious snack rich in potassium and vitamins. Their natural sweetness and smooth texture make them a versatile ingredient in smoothies, desserts, and baked goods.', 10.00, 1, 150.00, 99, NULL, NULL, 100, NULL, '1708765044.jpg', 0, 0, '10', '2024-02-24 08:57:25', '2024-02-24 08:57:25', NULL),
(201, 6, 36, 'Apple (1kg)', 'Apples are crisp and juicy fruits, available in a variety of colors and flavors, perfect for snacking or baking into pies and crumbles. Packed with fiber and essential nutrients, they\'re a delicious and nutritious addition to any diet.', 10.00, 1, 250.00, 99, NULL, NULL, 100, NULL, '1708764940.jpg', 0, 0, '10', '2024-02-24 08:55:40', '2024-02-24 08:55:40', NULL),
(200, 7, 36, 'Corn (1kg)', 'Corn, with its golden kernels, is a staple cereal grain renowned for its sweet taste and versatility in cooking. Whether grilled on the cob or popped into popcorn, it\'s a beloved ingredient worldwide.', 10.00, 1, 100.00, 99, NULL, NULL, 100, NULL, '1708764848.jpg', 0, 0, '10', '2024-02-24 08:54:08', '2024-02-24 08:54:08', NULL),
(199, 7, 36, 'Turnip 500g', 'Turnips are crisp, white-fleshed root vegetables with a slightly peppery taste, often enjoyed roasted or mashed. Their robust flavor adds a distinctive touch to soups, stews, and other savory dishes.', 10.00, 1, 60.00, 99, NULL, NULL, 100, NULL, '1708764785.jpg', 0, 0, '10', '2024-02-24 08:53:05', '2024-02-24 08:53:05', NULL),
(198, 7, 36, 'Onion (500g)', 'Onions are pungent bulb vegetables with layers of flavor, adding depth to a variety of dishes worldwide. Whether raw in salads or caramelized in stews, they offer a versatile culinary experience.', 10.00, 1, 90.00, 99, NULL, NULL, 100, NULL, '1708764612.jpg', 0, 0, '10', '2024-02-24 08:50:12', '2024-02-24 08:50:12', NULL),
(197, 7, 36, 'Carrot (1kg)', 'Carrots are vibrant orange root vegetables known for their sweet taste and crunchy texture. Packed with beta-carotene, they are not only delicious but also contribute to healthy eyesight and glowing skin.', 10.00, 1, 100.00, 99, NULL, NULL, 100, NULL, '1708764470.jpg', 0, 0, '10', '2024-02-24 08:47:50', '2024-02-24 08:47:50', NULL),
(196, 27, 37, 'Pizza Fries', 'A delectable fusion of two classics: crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, creating a mouthwatering pizza-inspired deligh', 10.00, 1, 250.00, 99, NULL, NULL, 100, NULL, '1708697100.jpg', 0, 0, '15', '2024-02-23 14:05:00', '2024-02-23 14:05:00', NULL),
(194, 34, 37, 'PEPSI (350 ML)', 'a carbonated soft drink.', 10.00, 1, 450.00, 100, NULL, NULL, 99, NULL, '1708696997.jpg', 0, 0, '20', '2024-02-23 14:03:20', '2024-02-23 14:03:20', NULL),
(195, 27, 37, 'Fries', 'Golden, crispy perfection, each bite delivers a satisfying crunch followed by a fluffy, potato-filled interior. These fries are the epitome of comfort food bliss.', 10.00, 1, 100.00, 99, NULL, NULL, 100, NULL, '1708697021.jpg', 0, 0, '15', '2024-02-23 14:03:41', '2024-02-23 14:03:41', NULL),
(193, 34, 37, 'COCA COLA (350 ML)', 'a carbonated soft drink.', 10.00, 1, 400.00, 100, NULL, NULL, 99, NULL, '1708696853.jpg', 0, 0, '10', '2024-02-23 14:00:55', '2024-02-23 14:00:55', NULL),
(191, 10, 37, 'GOLDEN CRISP BURGER', 'Indulge in the perfect combination of juicy goodness and crispy perfection.', 10.00, 1, 550.00, 99, NULL, NULL, 100, NULL, '1708696376.png', 0, 0, '20', '2024-02-23 13:52:56', '2024-02-23 13:52:56', NULL),
(192, 10, 37, 'FLAVORFUL CHICKEN FUSION', 'crispy goodness meets savory satisfaction.', 10.00, 1, 450.00, 100, NULL, NULL, 99, NULL, '1708696460.png', 0, 0, '20', '2024-02-23 13:54:20', '2024-02-23 13:54:20', NULL),
(190, 10, 37, 'ZESTY CHICKEN BURGER', 'A crunchy sensation that\'ll make your taste buds dance', 10.00, 1, 400.00, 100, NULL, NULL, 99, NULL, '1708695483.png', 0, 0, '20', '2024-02-23 13:38:03', '2024-02-23 13:38:03', NULL),
(189, 3, 37, 'MIGHTY BEEF BURGER', 'A powerhouse of flavor and spice.', 10.00, 1, 850.00, 99, NULL, NULL, 100, NULL, '1708695100.jpg', 0, 0, '20', '2024-02-23 13:31:40', '2024-02-23 13:31:40', NULL),
(187, 3, 37, 'BOLD BEEF BUSTER', 'sure to satisfy your cravings and leave you wanting more, every time.', 10.00, 1, 800.00, 100, NULL, NULL, 99, NULL, '1708695010.jpg', 0, 0, '20', '2024-02-23 13:30:10', '2024-02-23 13:30:10', NULL),
(188, 15, 36, 'Milk', 'Rich and creamy, milk is a staple dairy product loved for its versatility and nutritional benefits', 0.00, 1, 213.00, 100, NULL, NULL, 99, NULL, '1708695085.png', 0, 0, '10', '2024-02-23 13:31:25', '2024-02-23 13:31:25', NULL),
(186, 3, 37, 'PRIME BEEF ROYALE', 'A gourmet delight.', 10.00, 1, 700.00, 100, NULL, NULL, 99, NULL, '1708694780.jpg', 0, 0, '20', '2024-02-23 13:26:21', '2024-02-23 13:26:21', NULL),
(184, 2, 37, 'CHEESE ZINGER', 'Try our cheesey sensation today!', 10.00, 1, 600.00, 99, NULL, NULL, 100, NULL, '1708694451.jpg', 0, 0, '20', '2024-02-23 13:20:51', '2024-02-23 13:20:51', NULL),
(185, 2, 37, 'TANGO BLAZE ZINGER', 'Fiery feast that ignites your taste buds.', 10.00, 1, 650.00, 99, NULL, NULL, 100, NULL, '1708694595.jpg', 0, 0, '20', '2024-02-23 13:23:15', '2024-02-23 13:23:15', NULL),
(183, 2, 37, 'ZESTY ZINGER DELEXUE', 'A vibrant burst of flavor, for instant refreshment or mixing with spirits.', 10.00, 1, 500.00, 99, NULL, NULL, 100, NULL, '1708694313.jpg', 0, 0, '20', '2024-02-23 13:18:33', '2024-02-23 13:18:33', NULL),
(182, 27, 31, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', 10.00, 1, 250.00, 99, NULL, NULL, 100, NULL, '1708685349.jpg', 0, 0, '15', '2024-02-23 10:49:09', '2024-02-23 10:49:09', NULL),
(181, 27, 31, 'Golden Garlic Fries', 'Crispy, golden-brown fries seasoned with aromatic garlic, offering a perfect balance of savory flavor and satisfying crunch in every bite, sure to tantalize the taste buds of garlic enthusiasts.', 10.00, 1, 150.00, 99, NULL, NULL, 100, NULL, '1708685260.jpg', 0, 0, '15', '2024-02-23 10:47:40', '2024-02-23 10:47:40', NULL),
(180, 34, 31, 'Pepsi  500ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', 10.00, 1, 100.00, 99, NULL, NULL, 100, NULL, '1708685114.jpg', 0, 0, '10', '2024-02-23 10:45:17', '2024-02-23 10:50:19', NULL),
(179, 34, 31, 'Coca cola 500 ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', 10.00, 1, 90.00, 99, NULL, NULL, 100, NULL, '1708685021.jpg', 0, 0, '15', '2024-02-23 10:43:41', '2024-02-23 10:43:41', NULL),
(178, 34, 31, 'Coca cola 350 ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708684819.jpg', 0, 0, '10', '2024-02-23 10:40:19', '2024-02-23 10:40:19', NULL),
(177, 4, 31, 'Chicken Caesar Pizza', 'A delectable fusion of classic Caesar salad ingredients like grilled chicken, romaine lettuce, Parmesan cheese, and Caesar dressing atop a crispy pizza crust', 10.00, 1, 649.00, 100, NULL, NULL, 99, NULL, '1708684386.jpg', 0, 0, '25', '2024-02-23 10:33:06', '2024-02-23 10:36:12', '2024-02-23 17:36:12'),
(176, 4, 31, 'Chicken Caesar Pizza', 'A delectable fusion of classic Caesar salad ingredients like grilled chicken, romaine lettuce, Parmesan cheese, and Caesar dressing atop a crispy pizza crust', 10.00, 1, 649.00, 100, NULL, NULL, 99, NULL, '1708684313.jpg', 0, 0, '25', '2024-02-23 10:31:53', '2024-02-23 10:31:53', NULL),
(175, 4, 31, 'Chicken Pesto Pizza', 'Succulent chicken and savory pesto on a crispy pizza crust.', 10.00, 1, 930.00, 100, NULL, NULL, 99, NULL, '1708684157.jpg', 0, 0, '20', '2024-02-23 10:29:17', '2024-02-23 10:29:17', NULL),
(174, 4, 31, 'Fiery Tikka Blaze Pizza', 'Indulge in the bold flavors of our Fiery Tikka Blaze Pizza, featuring spicy tikka sauce, tender chicken, and a fiery blend of seasonings', 10.00, 1, 899.00, 100, NULL, NULL, 99, NULL, '1708683939.jpg', 0, 0, '20', '2024-02-23 10:25:39', '2024-02-23 10:25:39', NULL),
(173, 19, 33, 'Cultured Butter', 'Cultured butter: Known for its tangy flavor and creamy texture, it is made by fermenting cream before churning, resulting in a distinctive taste prized by chefs and food enthusiasts alike.', 10.00, 1, 600.00, 99, NULL, NULL, 100, NULL, '1708683908.jpg', 0, 0, '15', '2024-02-23 10:25:10', '2024-02-23 10:25:10', NULL),
(172, 19, 33, 'Unsalted Butter( 200g)', 'Smooth and creamy, unsalted butter is a versatile ingredient used in baking, cooking, and spreading, offering a pure, rich flavor without the added salt, allowing for precise control of seasoning in recipes.', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708683586.jpg', 0, 0, '10', '2024-02-23 10:19:48', '2024-02-23 10:19:48', NULL),
(171, 4, 31, 'Tikka Supreme Pizza', 'A delicious combination of tikka chicken, onions, bell peppers, and spicy tikka sauce on a pizza crust', 10.00, 1, 699.00, 100, NULL, NULL, 99, NULL, '1708683232.jpg', 0, 0, '20', '2024-02-23 10:13:53', '2024-02-23 10:13:53', NULL),
(170, 4, 31, 'Tikka Tango Pizza', 'Tikka Tango Pizza: A fusion of Indian flavors and Italian cuisine, offering a spicy and tangy twist on traditional pizza', 10.00, 1, 700.00, 100, NULL, NULL, 99, NULL, '1708682963.jpg', 0, 0, '20', '2024-02-23 10:09:23', '2024-02-23 10:09:23', NULL),
(169, 28, 32, 'SAVORY HERB ROLLS', 'each bite offers a burst of savory goodness, a flavorful accompaniment to any meal or enjoyed on its own.', 10.00, 1, 350.00, 99, NULL, NULL, 100, NULL, '1708682878.jpg', 0, 0, '10', '2024-02-23 10:07:58', '2024-02-23 10:07:58', NULL),
(168, 4, 31, 'Tikka Ranch Pizza', 'Tikka Ranch Pizza: A flavorful fusion of Indian tikka spices with classic ranch dressing on a crispy pizza crust', 10.00, 1, 649.00, 100, NULL, NULL, 99, NULL, '1708682615.jpg', 0, 0, '20', '2024-02-23 10:03:35', '2024-02-23 10:03:35', NULL),
(167, 13, 33, 'Everything Bagel', 'Everything Bagel: A flavorful masterpiece, adorned with a savory blend of sesame seeds, poppy seeds, garlic, onion, and salt, offering a delightful explosion of taste in every bite, perfect for breakfast or as a base for gourmet sandwiches.', 10.00, 1, 300.00, 99, NULL, NULL, 100, NULL, '1708682597.jpg', 0, 0, '15', '2024-02-23 10:03:17', '2024-02-23 10:03:17', NULL),
(166, 28, 32, 'GOLDEN CRUST ROLLS', 'Each bite promises a perfect balance of soft, fluffy texture and golden, crispy crust, a true delight for your senses.', 10.00, 1, 470.00, 99, NULL, NULL, 100, NULL, '1708682560.jpg', 0, 0, '10', '2024-02-23 10:02:41', '2024-02-23 10:02:41', NULL),
(165, 4, 31, 'Butter Chicken Tikka Pizza', 'Butter Chicken Tikka Pizza: A fusion of classic Indian flavors with a traditional Italian dish, featuring tender chicken tikka marinated in buttery sauce atop a crispy pizza crust.', 10.00, 1, 1099.00, 100, NULL, NULL, 99, NULL, '1708682324.jpg', 0, 0, '20', '2024-02-23 09:58:44', '2024-02-23 09:58:44', NULL),
(164, 28, 32, 'CHICKEN ROLL', 'Tender chicken, seasoned to perfection, wrapped in a soft.', 10.00, 1, 400.00, 99, NULL, NULL, 100, NULL, '1708682305.jpg', 0, 0, '10', '2024-02-23 09:58:26', '2024-02-23 09:58:26', NULL),
(163, 13, 33, 'Sesame Bagel', 'Sesame Bagel: A classic breakfast staple, boasting a chewy interior and a golden crust generously coated with nutty sesame seeds, perfect for pairing with savory or sweet toppings.', 10.00, 1, 250.00, 99, NULL, NULL, 100, NULL, '1708682298.jpg', 0, 0, '15', '2024-02-23 09:58:18', '2024-02-23 09:58:18', NULL),
(162, 32, 31, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', 10.00, 1, 1099.00, 100, NULL, NULL, 99, NULL, '1708682047.jpg', 0, 0, '25', '2024-02-23 09:54:07', '2024-02-23 09:54:07', NULL),
(161, 16, 33, 'Coffee Toffee Cake', 'Coffee Toffee Cake: A decadent delight marrying the rich flavor of coffee-infused sponge with crunchy toffee bits, topped with a velvety coffee buttercream, promising a luxurious treat for coffee aficionados.', 10.00, 1, 350.00, 99, NULL, NULL, 100, NULL, '1708681905.jpg', 0, 0, '15', '2024-02-23 09:51:45', '2024-02-23 09:51:45', NULL),
(160, 38, 32, 'PEANUT BUTTER SANDWHICH', 'Creamy peanut butter spread between soft slices of bread, a simple yet satisfying treat.', 10.00, 1, 300.00, 99, NULL, NULL, 10, NULL, '1708681894.jpg', 0, 0, '10', '2024-02-23 09:51:34', '2024-02-23 09:51:34', NULL),
(159, 16, 33, 'Lemon Drizzle Cake', 'Zesty and moist, Lemon Drizzle Cake features a light sponge infused with tangy lemon syrup and topped with a delicate drizzle of lemon icing, creating a delightful balance of sweet and citrusy flavors.', 10.00, 1, 650.00, 99, NULL, NULL, 100, NULL, '1708681825.jpg', 0, 0, '15', '2024-02-23 09:50:25', '2024-02-23 09:50:25', NULL),
(158, 38, 32, 'ROAST BEEF REVEAL', 'Juicy roast beef nestled between layers of fresh bread, a true delight for your taste buds.', 10.00, 1, 650.00, 99, NULL, NULL, 100, NULL, '1708681802.jpg', 0, 0, '10', '2024-02-23 09:50:03', '2024-02-23 09:50:03', NULL),
(157, 32, 31, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', 10.00, 1, 775.00, 100, NULL, NULL, 99, NULL, '1708681789.jpg', 0, 0, '25', '2024-02-23 09:49:49', '2024-02-23 09:49:49', NULL),
(156, 16, 33, 'Chocolate Fudge Cake', 'Rich and indulgent, Chocolate Fudge Cake boasts layers of moist chocolate cake smothered in velvety fudge frosting, delivering a decadent treat for chocolate lovers.', 15.00, 1, 650.00, 99, NULL, NULL, 100, NULL, '1708681725.jpg', 0, 0, '20', '2024-02-23 09:48:45', '2024-02-23 09:48:45', NULL),
(155, 38, 32, 'CHICKEN CHEESE SANDWHICH', 'Tender grilled chicken layered with melted cheese.', 10.00, 1, 600.00, 99, NULL, NULL, 100, NULL, '1708681686.jpg', 0, 0, '20', '2024-02-23 09:48:06', '2024-02-23 09:48:06', NULL),
(154, 16, 33, 'Strawberry Shortcake', 'Sumptuously layered, Strawberry Shortcake harmonizes tender biscuits with ripe strawberries and billows of whipped cream, offering a delightful symphony of flavors and textures in each bite.', 10.00, 1, 250.00, 99, NULL, NULL, 100, NULL, '1708681625.jpg', 0, 0, '15', '2024-02-23 09:47:05', '2024-02-23 09:47:05', NULL),
(153, 38, 32, 'DELEXUE ITALIAN SANDWHICH', 'Layers of savory meat and fresh veggies .', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708681586.jpg', 0, 0, '10', '2024-02-23 09:46:26', '2024-02-23 09:46:26', NULL),
(152, 32, 31, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', 10.00, 1, 599.00, 100, NULL, NULL, 99, NULL, '1708681559.jpg', 0, 0, '20', '2024-02-23 09:46:00', '2024-02-23 09:46:00', NULL),
(151, 21, 33, 'Swiss cheese', 'Swiss cheese: Known for its nutty flavor and iconic appearance with large holes, Swiss cheese adds a delightful taste and texture to sandwiches, burgers, and cheese platters.', 10.00, 1, 650.00, 99, NULL, NULL, 100, NULL, '1708675818.jpg', 0, 0, '10', '2024-02-23 08:10:18', '2024-02-23 08:10:18', NULL),
(150, 32, 31, 'Chicken Delight Pizza', 'Chicken Delight Pizza: A delicious combination of tender chicken, savory sauce, and melted cheese on a crispy crust.\"', 10.00, 1, 649.00, 100, NULL, NULL, 99, NULL, '1708675811.jpg', 0, 0, '20', '2024-02-23 08:10:11', '2024-02-23 08:10:11', NULL),
(149, 21, 33, 'Cheddar Pizza Cheese (200g)', 'Cheddar pizza cheese: A rich and savory blend, offering a bold flavor and smooth melting properties, perfect for adding a deliciously cheesy touch to your favorite pizzas.', 10.00, 1, 700.00, 99, NULL, NULL, 100, NULL, '1708675600.jpg', 0, 0, '10', '2024-02-23 08:06:40', '2024-02-23 08:06:40', NULL),
(148, 32, 31, 'Chicken Supreme Pizza', 'A delectable pizza featuring tender chicken, savory bacon, flavorful mushrooms, and creamy mozzarella cheese on a crispy crust.', 10.00, 1, 899.00, 100, NULL, NULL, 99, NULL, '1708675578.jpg', 0, 0, '20', '2024-02-23 08:06:18', '2024-02-23 08:06:18', NULL),
(147, 21, 33, 'Mozzarella Cheese (400g)', 'Soft and creamy, mozzarella cheese is renowned for its mild flavor and stretchy texture, making it a perfect topping for pizzas and a delicious addition to salads and sandwiches.', 10.00, 1, 1150.00, 99, NULL, NULL, 100, NULL, '1708675491.jpg', 0, 0, '10', '2024-02-23 08:04:51', '2024-02-23 08:06:59', NULL),
(146, 6, 33, 'Grape (1kg)', 'Small and succulent, grapes offer a burst of sweetness with each bite, making them a delightful snack and a versatile ingredient in various culinary creations.', 10.00, 1, 350.00, 99, NULL, NULL, 100, NULL, '1708675292.jpg', 0, 0, '10', '2024-02-23 08:01:33', '2024-02-23 08:01:33', NULL),
(145, 6, 33, 'Watermelon (1kg)', 'Sweet and hydrating, watermelon is a summertime favorite, with its crisp, juicy flesh and vibrant pink hue, perfect for refreshing snacks and desserts.', 10.00, 1, 180.00, 99, NULL, NULL, 100, NULL, '1708675188.jpg', 0, 0, '10', '2024-02-23 07:59:48', '2024-02-23 07:59:48', NULL),
(144, 6, 33, 'Orange (1kg)', 'Juicy and refreshing, the orange is a citrus fruit prized for its tangy-sweet flavor and high vitamin C content, perfect for snacking or juicing.', 10.00, 1, 200.00, 99, NULL, NULL, 100, NULL, '1708675111.jpg', 0, 0, '10', '2024-02-23 07:58:32', '2024-02-23 07:58:32', NULL),
(143, 1, 31, 'Pesto Paradise', 'Indulge in a taste of paradise with our Pizza Pesto Paradise featuring a delectable combination of fresh pesto, savory toppings, and melted cheese on a crisp crus', 10.00, 1, 450.00, 100, NULL, NULL, 99, NULL, '1708675101.jpg', 0, 0, '20', '2024-02-23 07:58:22', '2024-02-23 07:58:22', NULL),
(142, 6, 33, 'Banana (1kg)', 'Creamy and sweet, the banana is a convenient and nutritious fruit enjoyed worldwide for its energy-boosting properties and smooth texture.', 10.00, 1, 120.00, 99, NULL, NULL, 100, NULL, '1708675038.jpg', 0, 0, '10', '2024-02-23 07:57:18', '2024-02-23 07:57:18', NULL),
(141, 6, 33, 'Apple (1kg)', 'Crisp and juicy, the apple offers a delightful balance of sweetness and tartness, making it a beloved snack and versatile ingredient in both sweet and savory dishes.', 10.00, 1, 200.00, 99, NULL, NULL, 100, NULL, '1708674896.jpg', 0, 0, '10', '2024-02-23 07:54:56', '2024-02-23 07:54:56', NULL),
(140, 10, 32, 'SUPREME CHICKEN SENSATIONS', 'flavor-packed journey that will elevate your taste experience to new heights.', 10.00, 1, 600.00, 99, NULL, NULL, 100, NULL, '1708674882.png', 0, 0, '20', '2024-02-23 07:54:43', '2024-02-23 07:54:43', NULL),
(139, 1, 31, 'Very Veggie', 'A delightful medley of fresh vegetables including bell peppers, mushrooms, onions, olives, and tomatoes atop a savory pizza crust.', 10.00, 1, 1279.00, 100, NULL, NULL, 99, NULL, '1708674846.jpg', 0, 0, '20', '2024-02-23 07:54:07', '2024-02-23 07:54:07', NULL),
(138, 10, 32, 'CRISPY COOP BURGER', 'Where crispy goodness meets savory satisfaction.', 10.00, 1, 550.00, 99, NULL, NULL, 100, NULL, '1708674814.png', 0, 0, '20', '2024-02-23 07:53:34', '2024-02-23 07:53:34', NULL),
(137, 7, 33, 'Fresh Turnip (500g)', 'Turnip: Root vegetable known for its crisp texture and slightly peppery flavor, often used in soups, stews, and roasted dishes for a hearty and nutritious addition.', 10.00, 1, 60.00, 99, NULL, NULL, 100, NULL, '1708674752.jpg', 0, 0, '10', '2024-02-23 07:52:33', '2024-02-23 07:52:33', NULL),
(136, 10, 32, 'CRISPY CHICKEN DELIGHT', 'A crunchy sensation that\'ll make your taste buds dance with joy.', 10.00, 1, 400.00, 99, NULL, NULL, 100, NULL, '1708674721.png', 0, 0, '20', '2024-02-23 07:52:01', '2024-02-23 07:52:01', NULL),
(135, 7, 33, 'Corn (1kg)', 'Golden kernels packed with sweetness and crunch, a staple in cuisines worldwide.', 10.00, 1, 100.00, 99, NULL, NULL, 100, NULL, '1708675214.jpg', 0, 0, '10', '2024-02-23 07:50:21', '2024-02-23 08:00:14', NULL),
(134, 1, 31, 'Chicken Fajita', 'Chicken Fajita: Sizzling strips of seasoned chicken, sautéed with onions and bell peppers, served with warm tortillas and optional toppings like sour cream, salsa, and guacamole.', 10.00, 1, 1300.00, 100, NULL, NULL, 99, NULL, '1708674566.jpg', 0, 0, '20', '2024-02-23 07:49:26', '2024-02-23 07:49:26', NULL),
(133, 3, 32, 'MOUTHWATERING BEEF MEDLEY', 'A symphony of taste in every bite.', 10.00, 1, 1350.00, 99, NULL, NULL, 100, NULL, '1708674546.jpg', 0, 0, '20', '2024-02-23 07:49:06', '2024-02-23 07:49:06', NULL),
(132, 1, 31, 'Chicken Tikka', 'Chicken Tikka is a popular Indian dish consisting of marinated and grilled chunks of chicken served with spices and often accompanied by onions and peppers.', 10.00, 1, 1279.00, 100, NULL, NULL, 99, NULL, '1708674375.jpg', 0, 0, '20', '2024-02-23 07:46:15', '2024-02-23 07:46:15', NULL),
(131, 7, 33, 'Onion (250g)', 'Versatile bulb vegetable with layers of pungent, savory flavor, widely used in culinary dishes worldwide for its ability to add depth and richness.', 10.00, 1, 88.00, 99, NULL, NULL, 100, NULL, '1708674353.jpg', 0, 0, '10', '2024-02-23 07:45:54', '2024-02-23 07:45:54', NULL),
(129, 3, 32, 'BEEFY BLISS BOMB', 'a taste sensation that will leave you craving more.', 10.00, 1, 750.00, 99, NULL, NULL, 100, NULL, '1708674068.jpg', 0, 0, '20', '2024-02-23 07:41:08', '2024-02-23 07:41:08', NULL),
(130, 3, 32, 'SIGNATURE BEEF EUPHORIA', 'Where every bite brings culinary bliss to your palate.', 10.00, 1, 1199.00, 99, NULL, NULL, 100, NULL, '1708674263.jpg', 0, 0, '20', '2024-02-23 07:44:23', '2024-02-23 07:44:23', NULL),
(128, 3, 32, 'JUICY ANGUS CLASSIC', 'savor the essence of perfection in every bite.', 10.00, 1, 890.00, 99, NULL, NULL, 100, NULL, '1708673966.jpg', 0, 0, '20', '2024-02-23 07:39:26', '2024-02-23 07:39:26', NULL),
(127, 7, 33, 'Carrot (1kg)', 'Vibrant orange root vegetable packed with essential nutrients and a sweet, earthy flavor.', 10.00, 1, 200.00, 99, NULL, NULL, 100, NULL, '1708673939.jpg', 0, 0, '10', '2024-02-23 07:38:59', '2024-02-23 07:38:59', NULL),
(125, 2, 32, 'MIGHTY ZINGER', 'Juicy chicken breast, coated in fiery spices, nestled in a soft bun', 10.00, 1, 1000.00, 99, NULL, NULL, 10, NULL, '1708673610.jpg', 0, 0, '20', '2024-02-23 07:33:30', '2024-02-23 07:33:30', NULL),
(126, 2, 32, 'INFERNO ZINGER TWIST', 'Inferno Zinger Twist.', 10.00, 1, 1200.00, 99, NULL, NULL, 100, NULL, '1708673775.jpg', 0, 0, '20', '2024-02-23 07:36:15', '2024-02-23 07:36:15', NULL),
(124, 2, 32, 'SMOKIN HOT ZINGER', 'A fiery feast that ignites your taste buds.', 10.00, 1, 700.00, 99, NULL, NULL, 100, NULL, '1708673517.jpg', 0, 0, '20', '2024-02-23 07:31:57', '2024-02-23 07:31:57', NULL),
(123, 2, 32, 'HOTSHOT ZINGER SUPREME', 'A fiery flavor explosion in every bite.', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708673113.jpg', 0, 0, '20', '2024-02-23 07:25:13', '2024-02-23 07:25:13', NULL),
(211, 19, 36, 'Grass-fed Butter', 'Grass-fed butter is made from the milk of cows that have been primarily fed a diet of grass or forage, rather than grains', 10.00, 1, 400.00, 99, NULL, NULL, 100, NULL, '1708772539.jpg', 0, 0, '10', '2024-02-24 11:02:21', '2024-02-24 11:02:21', NULL),
(212, 4, 34, 'CHICKEN TIKKA (MEDIUM)', 'nestled on a crispy pizza crust, tantalizing taste buds with a fusion of Indian and Italian flavors', 10.00, 1, 650.00, 99, NULL, NULL, 100, NULL, '1708772582.jpg', 0, 0, '20', '2024-02-24 11:03:02', '2024-02-24 11:03:02', NULL),
(213, 19, 36, 'Clarified Butter (Ghee)', 'Clarified butter, also known as ghee, is butter that has been melted to separate the milk solids, resulting in a golden liquid with a nutty flavor and higher smoke point.', 10.00, 1, 600.00, 99, NULL, NULL, 100, NULL, '1708772608.jpg', 0, 0, '10', '2024-02-24 11:03:28', '2024-02-24 11:03:28', NULL),
(214, 4, 34, 'CHICKEN TIKKA (LARGE)', 'nestled on a crispy pizza crust, tantalizing taste buds with a fusion of Indian and Italian flavors', 10.00, 1, 1500.00, 99, NULL, NULL, 100, NULL, '1708772627.jpg', 0, 0, '20', '2024-02-24 11:03:47', '2024-02-24 11:03:47', NULL),
(215, 33, 34, 'CHICKEN FAJITA (SMALL)', 'grilled with bell peppers and onions, wrapped in a warm tortilla, topped with creamy guacamole and tangy salsa, creating a flavorful Tex-Mex delight that\'s sure to satisfy any craving.', 10.00, 1, 500.00, 100, NULL, NULL, 99, NULL, '1708772724.jpg', 0, 0, '20', '2024-02-24 11:05:24', '2024-02-24 11:05:24', NULL),
(216, 33, 34, 'CHICKEN FAJITA (MEDIUM)', 'grilled with bell peppers and onions, wrapped in a warm tortilla, topped with creamy guacamole and tangy salsa, creating a flavorful Tex-Mex delight that\'s sure to satisfy any craving.', 10.00, 1, 700.00, 100, NULL, NULL, 99, NULL, '1708772759.jpg', 0, 0, '20', '2024-02-24 11:06:00', '2024-02-24 11:06:00', NULL),
(217, 33, 34, 'CHICKEN FAJITA (LARGE)', 'grilled with bell peppers and onions, wrapped in a warm tortilla, topped with creamy guacamole and tangy salsa, creating a flavorful Tex-Mex delight that\'s sure to satisfy any craving.', 10.00, 1, 1550.00, 100, NULL, NULL, 99, NULL, '1708772810.jpg', 0, 0, '20', '2024-02-24 11:06:51', '2024-02-24 11:06:51', NULL),
(218, 34, 34, 'Coca cola 350 ml', 'Coca-Cola is a carbonated soft drink known for its caramel color, distinctive flavor, and worldwide popularity.', 10.00, 1, 400.00, 99, NULL, NULL, 100, NULL, '1708772882.jpg', 0, 0, '10', '2024-02-24 11:08:03', '2024-02-24 11:08:03', NULL),
(219, 40, 34, 'CHICKEN BIRYANI', 'Aromatic basmati rice layered with tender marinated chicken.', 10.00, 1, 350.00, 100, NULL, NULL, 99, NULL, '1708772917.jpg', 0, 0, '20', '2024-02-24 11:08:37', '2024-02-24 11:21:49', NULL),
(220, 34, 34, 'PEPSI  350ml', 'PEPSI is a carbonated soft drink known for its caramel color, distinctive flavor, and worldwide popularity.', 10.00, 1, 400.00, 99, NULL, NULL, 100, NULL, '1708772957.jpg', 0, 0, '10', '2024-02-24 11:09:20', '2024-02-24 11:09:20', NULL),
(221, 40, 34, 'HYEDRABADI CHICKEN BIRYANI', 'Aromatic basmati rice layered with tender marinated chicken', 10.00, 1, 400.00, 100, NULL, NULL, 99, NULL, '1708772998.jpg', 0, 0, '20', '2024-02-24 11:09:58', '2024-02-24 11:09:58', NULL),
(222, 40, 34, 'ZAFFRAN CHICKEN BIRYANI', 'Aromatic basmati rice layered with tender marinated chicken', 10.00, 1, 550.00, 100, NULL, NULL, 99, NULL, '1708773065.jpg', 0, 0, '20', '2024-02-24 11:11:05', '2024-02-24 11:11:05', NULL),
(223, 41, 34, 'NALLI BIRYANI', 'Tender lamb shank, slow-cooked to perfection, nestled amidst fragrant basmati rice, infused with a symphony of spices', 10.00, 1, 300.00, 100, NULL, NULL, 99, NULL, '1708773158.jpg', 0, 0, '20', '2024-02-24 11:12:38', '2024-02-24 11:12:38', NULL),
(224, 41, 34, 'BEEF BIRYANI', 'marinated in a blend of aromatic spices, layered between fragrant basmati rice infused with saffron, caramelized onions, and mint leaves, creating a symphony of flavors.', 10.00, 1, 350.00, 100, NULL, NULL, 99, NULL, '1708773361.jpg', 0, 0, '20', '2024-02-24 11:16:02', '2024-02-24 11:16:02', NULL),
(225, 41, 34, 'DUMBA BIRYANI', 'delicately spiced and slow-cooked to perfection, layered with aromatic basmati rice infused with saffron, caramelized onions, and fragrant herbs, culminating in a divine feast known as Dumba Biryani', 10.00, 1, 400.00, 100, NULL, NULL, 99, NULL, '1708773447.jpg', 0, 0, '20', '2024-02-24 11:17:27', '2024-02-24 11:17:27', NULL),
(226, 43, 34, 'CHICKEN NIHARI', 'slow-cooked to perfection until the meat is melt-in-your-mouth tender, creating a flavorful and comforting dish known as Chicken Nihari', 10.00, 1, 400.00, 100, NULL, NULL, 99, NULL, '1708773537.jpg', 0, 0, '20', '2024-02-24 11:18:58', '2024-02-24 11:18:58', NULL),
(227, 44, 34, 'NALLI NIHARI', 'Tender nalli (bone marrow) pieces, slow-cooked in a rich, flavorful gravy infused with aromatic spices like cloves, cardamom, and cinnamon, until the meat falls off the bone', 10.00, 1, 450.00, 100, NULL, NULL, 99, NULL, '1708773606.jpg', 0, 0, '20', '2024-02-24 11:20:08', '2024-02-24 11:20:08', NULL),
(228, 44, 34, 'BEEF NIHARI', 'slow-cooked to perfection in a rich, aromatic gravy infused with a medley of spices like cloves, cinnamon, and cardamom, until the meat is incredibly tender and flavorful', 10.00, 1, 380.00, 100, NULL, NULL, 99, NULL, '1708773676.jpg', 0, 0, '20', '2024-02-24 11:21:18', '2024-02-24 11:21:18', NULL),
(229, 6, 41, 'Apple (1kg)', 'Crisp and refreshing, apples offer a delightful balance of sweetness and tartness in every juicy bite.', 10.00, 1, 260.00, 99, NULL, NULL, 100, NULL, '1708932530.jpg', 0, 0, '10', '2024-02-26 07:28:50', '2024-02-26 07:28:50', NULL),
(230, 6, 41, 'Orange (1kg)', 'Juicy and citrusy, oranges burst with vibrant flavor and a refreshing zing in every bite.', 10.00, 1, 200.00, 99, NULL, NULL, 100, NULL, '1708932629.jpg', 0, 0, '10', '2024-02-26 07:30:29', '2024-02-26 07:30:29', NULL),
(231, 6, 41, 'Watermelon (1kg)', 'Sweet and hydrating, watermelon is the epitome of summer refreshment, with its juicy, crisp flesh and subtle sweetness.', 15.00, 1, 150.00, 99, NULL, NULL, 100, NULL, '1708932702.jpg', 0, 0, '10', '2024-02-26 07:31:42', '2024-02-26 07:31:42', NULL),
(232, 6, 41, 'Banana (1kg)', 'Creamy and satisfying, bananas offer a naturally sweet flavor and a creamy texture, perfect for a quick and healthy snack.', 10.00, 1, 150.00, 99, NULL, NULL, 100, NULL, '1708932992.jpg', 0, 0, '10', '2024-02-26 07:36:32', '2024-02-26 07:36:32', NULL),
(233, 1, 40, 'BBQ Chicken Bliss', 'Savor the blissful combination of tangy barbecue sauce, succulent chicken, and melted cheese atop a perfectly baked pizza crust (medium)', 10.00, 1, 1499.00, 100, NULL, NULL, 99, NULL, '1708933949.jpg', 0, 0, '20', '2024-02-26 07:52:29', '2024-02-26 10:13:21', NULL),
(234, 1, 40, 'Pesto Paradise', 'Pesto Paradise: A slice of pizza heaven where basil-infused pesto takes center stage amidst a harmony of gourmet toppings.', 10.00, 1, 1399.00, 99, NULL, NULL, 100, NULL, '1708934152.jpg', 0, 0, '25', '2024-02-26 07:55:52', '2024-02-26 07:55:52', NULL),
(235, 1, 40, 'Fiery Diablo', 'Indulge in the fiery heat of the Diablo pizza, featuring a devilishly delicious combination of spicy toppings sure to ignite your taste buds (small)', 10.00, 1, 849.00, 99, NULL, NULL, 100, NULL, '1708934542.jpg', 0, 0, '25', '2024-02-26 08:02:23', '2024-02-26 10:12:48', NULL),
(236, 1, 40, 'Fiery Diablo', 'Indulge in the fiery heat of the Diablo pizza, featuring a devilishly delicious combination of spicy toppings sure to ignite your taste buds', 10.00, 1, 849.00, 99, NULL, NULL, 100, NULL, '1708934847.jpg', 0, 0, '25', '2024-02-26 08:07:28', '2024-02-26 09:33:37', '2024-02-26 16:33:37'),
(237, 7, 41, 'Onion', 'Sharp and pungent, onions add layers of flavor to dishes, whether raw in salads or caramelized to sweet perfection in savory recipes.', 10.00, 1, 250.00, 99, NULL, NULL, 100, NULL, '1708935122.jpg', 0, 0, '10', '2024-02-26 08:12:02', '2024-02-26 08:12:02', NULL),
(238, 1, 40, 'Caprese Classic', 'Pizza Caprese Classic: A traditional Italian delight featuring fresh tomatoes, mozzarella cheese, basil leaves, and a drizzle of olive oil on a thin crust', 10.00, 1, 895.00, 99, NULL, NULL, 100, NULL, '1708935271.jpg', 0, 0, '25', '2024-02-26 08:14:31', '2024-02-26 08:14:31', NULL),
(239, 7, 41, 'Carrot (1kg)', 'Crunchy and sweet, carrots are vibrant orange gems packed with nutrients and versatile in both raw and cooked dishes.', 10.00, 1, 100.00, 99, NULL, NULL, 100, NULL, '1708935303.jpg', 0, 0, '10', '2024-02-26 08:15:03', '2024-02-26 08:15:03', NULL),
(240, 7, 41, 'Corn (1kg)', 'Corn, with its golden kernels and sweet taste, is a classic summertime favorite, perfect for grilling, boiling, or enjoying fresh off the cob.', 10.00, 1, 150.00, 99, NULL, NULL, 100, NULL, '1708935446.jpg', 0, 0, '10', '2024-02-26 08:17:26', '2024-02-26 08:17:26', NULL),
(241, 7, 41, 'Turnip 500g', 'Fresh and crisp, this 500g pack of turnips offers earthy sweetness and versatility for a variety of culinary creations.', 10.00, 1, 60.00, 99, NULL, NULL, 100, NULL, '1708935846.jpg', 0, 0, '10', '2024-02-26 08:24:06', '2024-02-26 08:24:06', NULL),
(242, 32, 40, 'BBQ Bird Blast', 'Pizza BBQ Bird Blast: A tantalizing fusion of smoky barbecue flavors and savory toppings, delivering a mouthwatering explosion of taste in every bite.', 10.00, 1, 795.00, 99, NULL, NULL, 100, NULL, '1708939515.jpg', 0, 0, '25', '2024-02-26 09:25:15', '2024-02-26 09:25:15', NULL),
(243, 32, 40, 'Cheeky Chicken Chorizo', 'Indulge in a tantalizing twist with our Cheeky Chicken Chorizo pizza, bursting with savory chicken, spicy chorizo, and a medley of mouthwatering flavors', 10.00, 1, 1650.00, 99, NULL, NULL, 100, NULL, '1708939746.jpg', 0, 0, '25', '2024-02-26 09:29:06', '2024-02-26 09:29:06', NULL),
(244, 21, 41, 'Mozzarella', 'Cheese, a dairy delight, comes in a multitude of flavors, textures, and varieties, elevating dishes with its creamy richness and savory goodness.', 10.00, 1, 650.00, 99, NULL, NULL, 100, NULL, '1708939783.jpg', 0, 0, '10', '2024-02-26 09:29:44', '2024-02-26 09:29:44', NULL),
(245, 21, 41, 'Gouda cheese', 'Cheese, a dairy delight, comes in a multitude of flavors, textures, and varieties, elevating dishes with its creamy richness and savory goodness.', 10.00, 1, 500.00, 99, NULL, NULL, 100, NULL, '1708939831.jpg', 0, 0, '10', '2024-02-26 09:30:32', '2024-02-26 09:30:32', NULL),
(246, 32, 40, 'Poultry Perfection Pie', 'Indulge in a Poultry Perfection Pie – a savory pizza topped with a delightful medley of chicken and poultry goodness', 10.00, 1, 1099.00, 99, NULL, NULL, 100, NULL, '1708939871.jpg', 0, 0, '25', '2024-02-26 09:31:11', '2024-02-26 09:31:11', NULL),
(247, 21, 41, 'Swiss cheese', 'Swiss cheese: Known for its nutty flavor and iconic appearance with large holes, Swiss cheese adds a delightful taste and texture to sandwiches, burgers, and cheese platters.', 10.00, 1, 600.00, 99, NULL, NULL, 100, NULL, '1708939872.jpg', 0, 0, '10', '2024-02-26 09:31:13', '2024-02-26 09:31:13', NULL),
(248, 19, 41, 'Unsalted Butter', 'Smooth and creamy, butter adds richness and depth to dishes, enhancing flavors with its irresistible velvety texture.', 10.00, 1, 750.00, 99, NULL, NULL, 100, NULL, '1708939954.jpg', 0, 0, '10', '2024-02-26 09:32:34', '2024-02-26 09:32:34', NULL),
(249, 19, 41, 'Grass-Fed Butter', 'Smooth and creamy, butter adds richness and depth to dishes, enhancing flavors with its irresistible velvety texture.', 10.00, 1, 700.00, 99, NULL, NULL, 100, NULL, '1708939986.jpg', 0, 0, '10', '2024-02-26 09:33:07', '2024-02-26 09:33:07', NULL),
(250, 32, 40, 'Teriyaki Tango Pizza (small)', 'Teriyaki Tango Pizza: A mouthwatering fusion of savory teriyaki flavors atop a crispy pizza crust, offering a delightful twist on traditional pizza', 10.00, 1, 890.00, 99, NULL, NULL, 100, NULL, '1708939991.jpg', 0, 0, '25', '2024-02-26 09:33:11', '2024-02-26 10:11:18', NULL),
(251, 13, 41, 'Everything Bagel', 'Soft and chewy, bagels boast a satisfyingly dense texture and a subtle hint of sweetness, perfect for a hearty breakfast or a delicious snack any time of day.', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708940137.jpg', 0, 0, '10', '2024-02-26 09:35:37', '2024-02-26 09:35:37', NULL),
(252, 13, 41, 'Jalapeno Bagel', 'Soft and chewy, bagels boast a satisfyingly dense texture and a subtle hint of sweetness, perfect for a hearty breakfast or a delicious snack any time of day.', 10.00, 1, 400.00, 99, NULL, NULL, 100, NULL, '1708940191.jpg', 0, 0, '10', '2024-02-26 09:36:31', '2024-02-26 09:36:31', NULL),
(253, 2, 42, 'Cluckin\' Classic', 'Cluckin\' Classic: A savory burger featuring a juicy chicken patty seasoned to perfection, nestled between toasted buns with fresh toppings for a timeless taste sensation', 10.00, 1, 699.00, 99, NULL, NULL, 100, NULL, '1708940245.jpg', 0, 0, '25', '2024-02-26 09:37:25', '2024-02-26 09:37:25', NULL),
(254, 2, 39, 'Spicy Blaze Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', 10.00, 1, 750.00, 99, NULL, NULL, 100, NULL, '1708940373.jpg', 0, 0, '10', '2024-02-26 09:39:33', '2024-02-26 09:39:33', NULL),
(255, 1, 46, 'Chicken Fajita pan 6\' pizza', 'Chicken Fajita pan 6\' pizza', 20.00, 1, 800.00, 20, NULL, NULL, 20, NULL, '1708940415.jpg', 0, 0, '25', '2024-02-26 09:40:15', '2024-02-26 09:50:54', '2024-02-26 16:50:54'),
(256, 2, 42, 'Zesty Ranchero', 'A mouthwatering burger infused with zesty ranchero flavors, perfect for an unforgettable dining experience', 10.00, 1, 799.00, 99, NULL, NULL, 100, NULL, '1708940421.jpg', 0, 0, '25', '2024-02-26 09:40:22', '2024-02-26 09:40:22', NULL),
(257, 2, 39, 'Flaming Zest Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', 10.00, 1, 780.00, 99, NULL, NULL, 100, NULL, '1708940528.jpg', 0, 0, '10', '2024-02-26 09:42:08', '2024-02-26 09:42:08', NULL),
(258, 2, 42, 'Southern BBQ Bliss', 'Savor the taste of Southern BBQ bliss in every bite with our mouthwatering burger', 10.00, 1, 599.00, 99, NULL, NULL, 100, NULL, '1708940534.jpg', 0, 0, '25', '2024-02-26 09:42:15', '2024-02-26 09:42:15', NULL),
(259, 1, 46, 'Arabian Night (New)', 'Spicy chicken, Tahini sauce & cheese', 10.00, 1, 750.00, 25, NULL, NULL, 20, NULL, '1708940570.jpg', 0, 0, '25', '2024-02-26 09:42:50', '2024-02-26 09:50:44', '2024-02-26 16:50:44'),
(260, 3, 42, 'Classic Cowboy', 'The Classic Cowboy: A hearty burger featuring a juicy beef patty topped with cheddar cheese, crispy bacon, tangy barbecue sauce, and crispy onion rings, all served on a toasted bun', 10.00, 1, 649.00, 99, NULL, NULL, 100, NULL, '1708940749.jpg', 0, 0, '25', '2024-02-26 09:45:49', '2024-02-26 09:45:49', NULL),
(261, 4, 46, 'Chicken Tikka (SMALL)', 'Top pizza dough with a layer of tikka sauce, cooked chicken tikka, onions, and cheese.', 10.00, 1, 650.00, 100, NULL, NULL, 99, NULL, '1708941210.jpg', 0, 0, '20', '2024-02-26 09:53:30', '2024-02-26 10:04:23', NULL),
(262, 3, 42, 'Smoky BBQ Bliss', 'Indulge in the smoky satisfaction of our Smoky BBQ Bliss burger, where every bite is a savory delight', 10.00, 1, 390.00, 99, NULL, NULL, 100, NULL, '1708941222.jpg', 0, 0, '25', '2024-02-26 09:53:42', '2024-02-26 09:53:42', NULL),
(263, 4, 46, 'Chicken Tikka (MEDIUM)', 'Top pizza dough with a layer of tikka sauce, cooked chicken tikka, onions, and cheese.', 10.00, 1, 1100.00, 100, NULL, NULL, 99, NULL, '1708941252.jpg', 0, 0, '20', '2024-02-26 09:54:12', '2024-02-26 10:03:59', NULL),
(264, 2, 39, 'BlazeBite Zinger Buger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', 10.00, 1, 800.00, 99, NULL, NULL, 100, NULL, '1708941265.jpg', 0, 0, '15', '2024-02-26 09:54:26', '2024-02-26 09:54:26', NULL),
(265, 4, 46, 'Chicken Tikka (LARGE)', 'Top pizza dough with a layer of tikka sauce, cooked chicken tikka, onions, and cheese.', 10.00, 1, 1500.00, 100, NULL, NULL, 99, NULL, '1708941288.jpg', 0, 0, '20', '2024-02-26 09:54:48', '2024-02-26 10:03:42', NULL),
(266, 33, 46, 'Chicken Fajita (SMALL)', 'top with cooked chicken fajita strips, bell peppers, onions, and cheese. Bake until crust is golden and cheese is bubbly, then serve with sour cream', 10.00, 1, 700.00, 100, NULL, NULL, 99, NULL, '1708941378.jpg', 0, 0, '20', '2024-02-26 09:56:18', '2024-02-26 10:03:25', NULL),
(267, 33, 46, 'Chicken Fajita (MEDIUM)', 'top with cooked chicken fajita strips, bell peppers, onions, and cheese. Bake until crust is golden and cheese is bubbly, then serve with sour cream', 10.00, 1, 1200.00, 100, NULL, NULL, 99, NULL, '1708941431.jpg', 0, 0, '20', '2024-02-26 09:57:11', '2024-02-26 10:03:08', NULL),
(268, 3, 42, 'Blue Cheese Bonanza', 'Indulge in a Cheese Bonanza with our mouthwatering burger piled high with a variety of melted cheeses for the ultimate cheesy delight', 10.00, 1, 490.00, 99, NULL, NULL, 100, NULL, '1708941442.jpg', 0, 0, '25', '2024-02-26 09:57:22', '2024-02-26 09:57:22', NULL),
(269, 33, 46, 'Chicken Fajita (LARGE)', 'top with cooked chicken fajita strips, bell peppers, onions, and cheese. Bake until crust is golden and cheese is bubbly, then serve with sour cream', 10.00, 1, 1550.00, 100, NULL, NULL, 99, NULL, '1708941467.jpg', 0, 0, '20', '2024-02-26 09:57:47', '2024-02-26 10:02:42', NULL),
(270, 3, 42, 'Blue Cheese Bonanza', 'Indulge in a Cheese Bonanza with our mouthwatering burger piled high with a variety of melted cheeses for the ultimate cheesy delight', 10.00, 1, 490.00, 99, NULL, NULL, 100, NULL, '1708941482.jpg', 0, 0, '25', '2024-02-26 09:58:02', '2024-02-26 09:58:02', NULL),
(271, 34, 46, 'Coca Cola (350 ML)', 'a carbonated soft drink.', 10.00, 1, 400.00, 100, NULL, NULL, 99, NULL, '1708941539.jpg', 0, 0, '10', '2024-02-26 09:59:00', '2024-02-26 10:02:11', NULL),
(272, 34, 46, 'Pepsi (350 ML)', 'a carbonated soft drink.', 10.00, 1, 350.00, 100, NULL, NULL, 99, NULL, '1708941672.jpg', 0, 0, '10', '2024-02-26 10:01:15', '2024-02-26 10:02:24', NULL),
(273, 38, 42, 'Zesty Mediterranean', 'Vibrant flavors and fresh ingredients inspired by the lively cuisines of the Mediterranean region', 10.00, 1, 850.00, 99, NULL, NULL, 100, NULL, '1708941770.jpg', 0, 0, '25', '2024-02-26 10:02:50', '2024-02-26 10:02:50', NULL),
(274, 38, 42, 'Tangy Thai Fusion', 'A tantalizing fusion of Thai flavors with a zesty twist', 10.00, 1, 249.00, 99, NULL, NULL, 100, NULL, '1708941967.jpg', 0, 0, '25', '2024-02-26 10:06:07', '2024-02-26 10:06:07', NULL),
(275, 40, 45, 'Chicken Biryani', 'Cook marinated chicken with rice, spices, and saffron-infused water until tender and fragrant', 10.00, 1, 350.00, 100, NULL, NULL, 99, NULL, '1708942027.jpg', 0, 0, '10', '2024-02-26 10:07:07', '2024-02-26 10:15:27', NULL),
(276, 41, 45, 'Nalli Biryani', 'Cook tender lamb nalli (marrow) with fragrant basmati rice, spices, and saffron-infused water', 10.00, 1, 450.00, 100, NULL, NULL, 99, NULL, '1708942109.jpg', 0, 0, '20', '2024-02-26 10:08:29', '2024-02-26 10:08:29', NULL),
(277, 41, 45, 'Beef Biryani', 'Cook tender beef pieces with basmati rice, aromatic spices, and saffron-infused water until perfectly cooked.', 10.00, 1, 380.00, 100, NULL, NULL, 99, NULL, '1708942171.jpg', 0, 0, '20', '2024-02-26 10:09:31', '2024-02-26 10:09:31', NULL),
(278, 38, 42, 'Savory Tuscan Treat', '4 Pieces A mouthwatering Tuscan dish featuring savory flavors from the region\'s rich culinary heritage', 10.00, 1, 550.00, 99, NULL, NULL, 100, NULL, '1708942210.jpg', 0, 0, '25', '2024-02-26 10:10:10', '2024-02-26 10:10:10', NULL),
(279, 41, 45, 'Dumba Beef Biryani', 'Cook tender beef pieces with basmati rice, aromatic spices, and saffron-infused water until perfectly cooked', 10.00, 1, 450.00, 100, NULL, NULL, 99, NULL, '1708942240.jpg', 0, 0, '20', '2024-02-26 10:10:40', '2024-02-26 10:10:40', NULL),
(280, 40, 45, 'Zaffran Chicken Biryani', 'Prepare succulent chicken marinated with yogurt, spices, and saffron-infused water, layered with fragrant basmati rice and cooked until perfection', 10.00, 1, 420.00, 100, NULL, NULL, 99, NULL, '1708942401.jpg', 0, 0, '20', '2024-02-26 10:13:21', '2024-02-26 10:13:21', NULL),
(281, 40, 45, 'Hyderabadi Chicken Biryani', 'Serve hot, garnished with fried onions, mint leaves, and a sprinkle of saffron strands for a flavorful feast.', 10.00, 1, 320.00, 100, NULL, NULL, 99, NULL, '1708942507.jpg', 0, 0, '20', '2024-02-26 10:15:07', '2024-02-26 10:15:07', NULL),
(282, 2, 39, 'Heatwave Zinger Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', 10.00, 1, 750.00, 99, NULL, NULL, 100, NULL, '1708942515.jpg', 0, 0, '15', '2024-02-26 10:15:15', '2024-02-26 10:15:15', NULL),
(283, 34, 45, 'Coca Cola (350 ML)', 'a carbonated soft drink.', 10.00, 1, 400.00, 100, NULL, NULL, 99, NULL, '1708942581.jpg', 0, 0, '20', '2024-02-26 10:16:22', '2024-02-26 10:16:22', NULL),
(284, 2, 39, 'Flame-Kissed Zinger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', 10.00, 1, 780.00, 99, NULL, NULL, 100, NULL, '1708942717.jpg', 0, 0, '15', '2024-02-26 10:18:37', '2024-02-26 10:18:37', NULL),
(285, 34, 45, 'Pepsi (350 ML)', 'a carbonated soft drink.', 10.00, 1, 350.00, 100, NULL, NULL, 99, NULL, '1708942717.jpg', 0, 0, '20', '2024-02-26 10:18:40', '2024-02-26 10:18:40', NULL),
(286, 34, 39, 'Coca Cola 350 ml', 'Coca-Cola, the iconic fizzy beverage, delights with its refreshing blend of caramel sweetness and effervescence, sparking moments of happiness with every sip.', 15.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708942861.jpg', 0, 0, '10', '2024-02-26 10:21:02', '2024-02-26 10:21:02', NULL),
(287, 6, 44, 'Apple (1kg)', 'juicy fruits that come in various colors and flavors, rich in fiber and vitamin C.', 10.00, 1, 300.00, 100, NULL, NULL, 99, NULL, '1708942908.jpg', 0, 0, '10', '2024-02-26 10:21:48', '2024-02-26 10:21:48', NULL),
(288, 34, 39, 'Coca Cola 500 ml', 'Coca-Cola, the iconic fizzy beverage, delights with its refreshing blend of caramel sweetness and effervescence, sparking moments of happiness with every sip.', 10.00, 1, 220.00, 99, NULL, NULL, 100, NULL, '1708942910.jpg', 0, 0, '10', '2024-02-26 10:21:50', '2024-02-26 10:21:50', NULL),
(289, 34, 39, 'Pepsi 500ML', 'Pepsi, the iconic fizzy beverage, delights with its refreshing blend of caramel sweetness and effervescence, sparking moments of happiness with every sip.', 15.00, 1, 220.00, 99, NULL, NULL, 100, NULL, '1708942993.jpg', 0, 0, '10', '2024-02-26 10:23:15', '2024-02-26 10:23:15', NULL),
(290, 6, 44, 'Orange (1kg)', 'Oranges are citrus fruits known for their tangy flavor and vibrant color, rich in vitamin C and antioxidants.', 10.00, 1, 350.00, 100, NULL, NULL, 99, NULL, '1708943009.jpg', 0, 0, '20', '2024-02-26 10:23:29', '2024-02-26 10:23:29', NULL),
(291, 6, 44, 'Water Melon (1kg)', 'Watermelon is a juicy, refreshing fruit with a sweet, watery flesh and a green rind, rich in hydration and vitamins A and C,', 10.00, 1, 150.00, 100, NULL, NULL, 99, NULL, '1708943116.jpg', 0, 0, '20', '2024-02-26 10:25:16', '2024-02-26 10:25:16', NULL),
(292, 6, 44, 'Banana ( 1 dozen)', 'Bananas are elongated, curved fruits with a creamy texture and a sweet flavor, rich in potassium, fiber, and vitamins B6 and C.', 10.00, 1, 200.00, 100, NULL, NULL, 99, NULL, '1708943197.jpg', 0, 0, '10', '2024-02-26 10:26:37', '2024-02-26 10:26:37', NULL),
(293, 34, 40, 'Coca Cola (350 ml)', 'Coca-Cola Original Taste has the full refreshing flavor you know and love', 10.00, 1, 400.00, 99, NULL, NULL, 100, NULL, '1708946613.jpg', 0, 0, '10', '2024-02-26 10:27:42', '2024-02-26 11:23:59', NULL);
INSERT INTO `items_lists` (`id`, `category_id`, `vendor_id`, `name`, `discription`, `discount`, `instock`, `price`, `qty`, `measuring_unit`, `qty_reorder`, `max_order_qty`, `sort_by`, `main_image`, `is_addon`, `is_grocery`, `preparation_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(294, 27, 39, 'Golden Crisp Fries', 'Crispy on the outside and fluffy on the inside, our fries are the perfect balance of golden perfection, delivering irresistible taste in every bite.', 10.00, 1, 100.00, 99, NULL, NULL, 100, NULL, '1708943272.jpg', 0, 0, '10', '2024-02-26 10:27:52', '2024-02-26 10:27:52', NULL),
(295, 7, 44, 'Onion ( 1kg)', 'Onions are versatile vegetables with layers of pungent flavor, used in various cuisines worldwide.', 10.00, 1, 300.00, 100, NULL, NULL, 99, NULL, '1708943276.jpg', 0, 0, '10', '2024-02-26 10:27:57', '2024-02-26 10:27:57', NULL),
(296, 27, 39, 'Pizza Fries', 'Indulge in our Pizza Fries – a mouthwatering fusion of crispy fries topped with melted cheese, savory marinara sauce, and tantalizing pepperoni, bringing the flavors of pizza to your fingertips.', 10.00, 1, 250.00, 99, NULL, NULL, 100, NULL, '1708943341.jpg', 0, 0, '10', '2024-02-26 10:29:01', '2024-02-26 10:29:01', NULL),
(297, 7, 44, 'Redish (1kg)', 'Radishes are crunchy, peppery root vegetables with vibrant red or pink skin and white flesh, commonly enjoyed raw in salads.', 10.00, 1, 450.00, 100, NULL, NULL, 99, NULL, '1708943351.jpg', 0, 0, '10', '2024-02-26 10:29:11', '2024-02-26 10:29:11', NULL),
(298, 34, 40, 'Pepsi (350 ml)', 'A carbonated soft drink', 10.00, 1, 400.00, 99, NULL, NULL, 100, NULL, '1708943732.jpg', 0, 0, '10', '2024-02-26 10:35:34', '2024-02-26 10:35:34', NULL),
(299, 7, 44, 'Potatoes (1kg)', 'Potatoes are starchy tuber vegetables known for their versatility and mild flavor, enjoyed worldwide in various dishes such as mashed potatoes.', 10.00, 1, 100.00, 100, NULL, NULL, 99, NULL, '1708943779.jpg', 0, 0, '10', '2024-02-26 10:36:19', '2024-02-26 10:36:19', NULL),
(300, 7, 44, 'Carrot (1kg)', 'Carrots are crunchy, sweet root vegetables rich in beta-carotene, a precursor of vitamin A,', 10.00, 1, 350.00, 100, NULL, NULL, 99, NULL, '1708943930.jpg', 0, 0, '10', '2024-02-26 10:38:50', '2024-02-26 10:38:50', NULL),
(301, 37, 39, 'Super Sub Club', 'Savor our club sandwich, stacked high with layers of succulent meats, crisp lettuce, juicy tomatoes, and creamy spreads, all nestled between toasted bread for a satisfying bite.', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708945520.jpg', 0, 0, '15', '2024-02-26 11:05:20', '2024-02-26 11:05:20', NULL),
(302, 37, 39, 'Mega Club Combo', 'Savor our club sandwich, stacked high with layers of succulent meats, crisp lettuce, juicy tomatoes, and creamy spreads, all nestled between toasted bread for a satisfying bite.', 10.00, 1, 480.00, 99, NULL, NULL, 100, NULL, '1708945570.jpg', 0, 0, '15', '2024-02-26 11:06:10', '2024-02-26 11:06:10', NULL),
(303, 37, 39, 'Grand Slamwich', 'Savor our club sandwich, stacked high with layers of succulent meats, crisp lettuce, juicy tomatoes, and creamy spreads, all nestled between toasted bread for a satisfying bite.', 10.00, 1, 490.00, 99, NULL, NULL, 100, NULL, '1708945621.jpg', 0, 0, '15', '2024-02-26 11:07:01', '2024-02-26 11:07:01', NULL),
(304, 7, 44, 'Corn (1kg)', 'Cereal grain with sweet and juicy kernels arranged in rows on a cob. It\'s a versatile ingredient used in various cuisines worldwide, enjoyed steamed, boiled, grilled, or roasted.', 10.00, 1, 270.00, 100, NULL, NULL, 99, NULL, '1708946008.jpg', 0, 0, '10', '2024-02-26 11:13:28', '2024-02-26 11:13:28', NULL),
(305, 19, 44, 'Butter (1/2 kg)', 'Butter is a dairy product made from churning cream, separating the butterfat from the buttermilk.', 10.00, 1, 540.00, 100, NULL, NULL, 99, NULL, '1708946208.jpg', 0, 0, '10', '2024-02-26 11:16:50', '2024-02-26 11:16:50', NULL),
(306, 19, 44, 'Ghee (1kg)', 'clarified butter that has been simmered to remove water content and milk solids, leaving behind pure butterfat. It\'s commonly used in Indian cuisine .', 10.00, 1, 700.00, 100, NULL, NULL, 99, NULL, '1708946369.jpg', 0, 0, '10', '2024-02-26 11:19:32', '2024-02-26 11:19:32', NULL),
(307, 19, 44, 'Ghee (1kg)', 'clarified butter that has been simmered to remove water content and milk solids, leaving behind pure butterfat. It\'s commonly used in Indian cuisine .', 10.00, 1, 700.00, 100, NULL, NULL, 99, NULL, '1708946369.jpg', 0, 0, '10', '2024-02-26 11:19:32', '2024-02-26 11:19:32', NULL),
(308, 20, 44, 'Yogurt (1/2kg)', 'It\'s rich in protein, calcium, probiotics, and other nutrients, making it a nutritious addition to diets.', 10.00, 1, 180.00, 100, NULL, NULL, 99, NULL, '1708946474.jpg', 0, 0, '10', '2024-02-26 11:21:14', '2024-02-26 11:21:14', NULL),
(309, 37, 39, 'Epic Clubhouse Crunch', 'Savor our club sandwich, stacked high with layers of succulent meats, crisp lettuce, juicy tomatoes, and creamy spreads, all nestled between toasted bread for a satisfying bite.', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708946687.jpg', 0, 0, '15', '2024-02-26 11:24:47', '2024-02-26 11:24:47', NULL),
(310, 47, 45, 'Chicken Steak', ', skinless chicken breast that has been pounded to an even thickness, seasoned, and then grilled, pan-seared, or baked until cooked through.', 10.00, 1, 700.00, 100, NULL, NULL, 99, NULL, '1708947037.jpg', 0, 0, '20', '2024-02-26 11:30:38', '2024-02-26 11:30:38', NULL),
(311, 46, 45, 'Beef steak', 'It\'s usually cooked by grilling, broiling, pan-searing, or baking to the desired level of doneness. Beef steaks come in various cuts, including ribeye, sirloin, filet mignon, and T-bone, each with its own flavor, tenderness,', 10.00, 1, 1000.00, 100, NULL, NULL, 99, NULL, '1708947387.jpg', 0, 0, '20', '2024-02-26 11:36:29', '2024-02-26 11:36:29', NULL),
(312, 34, 40, 'Coca Cola (350  ml)', 'Operator email ID:  1. je.operator@example.com 2. gk.operator@example.com 3. ah.operator@example.com 4. rahul.operator@example.com 5. operator@example.com  Password: 12345678', 10.00, 1, 300.00, 99, NULL, NULL, 100, NULL, '1708947558.jpg', 0, 0, '10', '2024-02-26 11:39:19', '2024-02-26 11:39:19', NULL),
(313, 47, 38, 'Grilled Chicken Supreme', 'Indulge in our juicy chicken steak, grilled to perfection and bursting with savory flavors in every tender bite.', 10.00, 1, 700.00, 99, NULL, NULL, 100, NULL, '1708947568.jpg', 0, 0, '20', '2024-02-26 11:39:29', '2024-02-26 11:39:29', NULL),
(314, 46, 38, 'Garlic Butter Beef Steak', 'Indulge in our juicy Beef steak, grilled to perfection and bursting with savory flavors in every tender bite.', 10.00, 1, 1000.00, 99, NULL, NULL, 100, NULL, '1708952674.jpg', 0, 0, '15', '2024-02-26 13:04:36', '2024-02-26 13:04:36', NULL),
(315, 28, 38, 'RollBite', 'A delightful fusion of savory fillings wrapped in a tender, bite-sized roll, perfect for on-the-go snacking or as appetizers for any occasion.', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708952854.jpg', 0, 0, '15', '2024-02-26 13:07:34', '2024-02-26 13:07:34', NULL),
(316, 28, 38, 'ZestyRoll', 'Bursting with bold flavors and a tantalizing zest, this roll offers a mouthwatering combination of savory ingredients wrapped in a soft, doughy embrace.', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708952929.jpg', 0, 0, '15', '2024-02-26 13:08:49', '2024-02-26 13:08:49', NULL),
(317, 34, 42, 'Coca Cola    ( ml 350 )', 'Soft Drink', 10.00, 1, 350.00, 99, NULL, NULL, 100, NULL, '1708953049.jpg', 0, 0, '10', '2024-02-26 13:10:51', '2024-02-26 13:10:51', NULL),
(318, 34, 42, 'Pepsi  ( ml350 )', 'Soft Drink', 5.00, 1, 350.00, 99, NULL, NULL, 100, NULL, '1708953124.jpg', 0, 0, '10', '2024-02-26 13:12:07', '2024-02-26 13:12:07', NULL),
(319, 34, 38, 'Coca Cola 350 ml', 'Coca-Cola: the iconic, bubbly beverage loved worldwide for its sweet and refreshing taste.', 10.00, 1, 450.00, 99, NULL, NULL, 100, NULL, '1708953136.jpg', 0, 0, '10', '2024-02-26 13:12:16', '2024-02-26 13:12:16', NULL),
(320, 34, 38, 'Pepsi  500ml', 'Pepsi: the iconic, bubbly beverage loved worldwide for its sweet and refreshing taste.', 10.00, 1, 220.00, 99, NULL, NULL, 100, NULL, '1708953202.jpg', 0, 0, '15', '2024-02-26 13:13:24', '2024-02-26 13:13:24', NULL),
(321, 27, 38, 'Curly Fries', 'Golden and crispy fries, the perfect combination of fluffy inside and crunchy outside.', 10.00, 1, 100.00, 99, NULL, NULL, 100, NULL, '1708953384.jpg', 0, 0, '15', '2024-02-26 13:16:24', '2024-02-26 13:16:24', NULL),
(322, 19, 43, 'Butter 1kg', 'A versatile dairy product used for cooking, baking, and spreading on various foods.', 0.00, 1, 780.00, 99, NULL, NULL, 100, NULL, '1708954813.jpg', 0, 0, '10', '2024-02-26 13:40:13', '2024-02-26 13:40:13', NULL),
(323, 20, 43, 'Yogurt', 'Creamy fermented dairy product often consumed as a nutritious snack or ingredient in various dishes', 0.00, 1, 240.00, 99, NULL, NULL, 100, NULL, '1708954900.jpg', 0, 0, '10', '2024-02-26 13:41:40', '2024-02-26 13:41:40', NULL),
(324, 18, 43, 'Eggs (12)', 'Versatile and nutritious, eggs are a staple food enjoyed worldwide for their culinary diversity and health benefits', 0.00, 1, 260.00, 99, NULL, NULL, 100, NULL, '1708955051.jpg', 0, 0, '10', '2024-02-26 13:44:11', '2024-02-26 13:44:11', NULL),
(325, 15, 43, 'Milk ( 1 litre )', 'A nutrient-rich liquid produced by mammals, commonly consumed by humans for its health benefits and versatility in cooking and baking', 3.00, 1, 213.00, 99, NULL, NULL, 100, NULL, '1708955179.png', 0, 0, '10', '2024-02-26 13:46:19', '2024-02-26 13:46:19', NULL),
(326, 6, 43, 'Apples (1kg)', 'A versatile and nutritious fruit enjoyed worldwide in various culinary applications', 10.00, 1, 300.00, 99, NULL, NULL, 100, NULL, '1708955381.jpg', 0, 0, '10', '2024-02-26 13:49:41', '2024-02-27 05:51:45', NULL),
(327, 7, 43, 'Tomatoes  (1kg)', 'Tomatoes are edible fruits commonly used in culinary dishes, known for their versatile flavor and rich nutrient content', 0.00, 1, 164.00, 99, NULL, NULL, 100, NULL, '1708955648.jpg', 0, 0, '10', '2024-02-26 13:54:08', '2024-02-26 13:54:08', NULL),
(328, 7, 43, 'Redish (1kg)', 'reddish vegetable, rich in earthy flavor and nutrients.', 10.00, 1, 400.00, 100, NULL, NULL, 99, NULL, '1709012748.jpg', 0, 0, '10', '2024-02-27 05:45:48', '2024-02-27 05:45:48', NULL),
(329, 7, 43, 'Potatoes (1kg)', 'Red Thumb potato, exhibit reddish skin.', 10.00, 1, 200.00, 100, NULL, NULL, 99, NULL, '1709012846.jpg', 0, 0, '10', '2024-02-27 05:47:26', '2024-02-27 05:47:26', NULL),
(330, 6, 43, 'WATER MELON ( 1KG)', 'its juicy, sweet flesh, with vibrant red color, makes it a refreshing and delicious summer treat.', 10.00, 1, 200.00, 100, NULL, NULL, 99, NULL, '1709012938.jpg', 0, 0, '10', '2024-02-27 05:48:58', '2024-02-27 05:50:43', NULL),
(331, 6, 43, 'Banana ( 1 dozen)', 'often sweeter and creamier than their yellow counterparts.', 10.00, 1, 150.00, 100, NULL, NULL, 99, NULL, '1709013017.jpg', 0, 0, '10', '2024-02-27 05:50:17', '2024-02-27 05:50:17', NULL),
(332, 24, 31, 'Orange Juice', 'Fresh Orange Juice', 10.00, 1, 200.00, 100, NULL, NULL, 10, NULL, '1709710059.jpg', 1, 0, '25', '2024-03-06 07:27:39', '2024-03-06 07:27:39', NULL),
(333, 1, 46, 'Red-Sauce', 'Red-Sauce-with-bowl', 0.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712208887.png', 1, 0, '10', '2024-04-04 05:34:47', '2024-04-04 05:34:47', NULL),
(334, 1, 46, 'ketchup-sauce', 'ketchup-sauce-cup', 0.00, 1, 45.00, 100, NULL, NULL, 99, NULL, '1712209378.png', 1, 0, '10', '2024-04-04 05:42:58', '2024-04-04 05:42:58', NULL),
(335, 2, 46, 'Red-Sauce', 'Red-Sauce-in-bowl', 10.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712213938.png', 1, 0, '10', '2024-04-04 06:58:59', '2024-04-04 06:58:59', NULL),
(336, 2, 46, 'Tomato paste', 'Tomato paste isolated', 0.00, 1, 40.00, 100, NULL, NULL, 99, NULL, '1712214580.jpg', 1, 0, '10', '2024-04-04 07:09:40', '2024-04-04 07:09:40', NULL),
(337, 3, 46, 'sauce', 'A red bowl filled with sauce on top', 0.00, 1, 40.00, 100, NULL, NULL, 99, NULL, '1712215126.jpg', 1, 0, '10', '2024-04-04 07:18:46', '2024-04-04 07:18:46', NULL),
(338, 3, 46, 'Mayonnaise sauce', 'Mayonnaise sauce', 0.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712215256.jpg', 1, 0, '10', '2024-04-04 07:20:57', '2024-04-04 07:20:57', NULL),
(339, 4, 46, 'Chilli sauce', 'Chilli sauce in a glass', 0.00, 1, 55.00, 100, NULL, NULL, 99, NULL, '1712215722.jpg', 1, 0, '10', '2024-04-04 07:28:42', '2024-04-04 07:28:42', NULL),
(340, 4, 46, 'Cranberry sauce', 'Cranberry sauce isolated', 5.00, 1, 60.00, 100, NULL, NULL, 99, NULL, '1712215853.jpg', 1, 0, '10', '2024-04-04 07:30:54', '2024-04-04 07:30:54', NULL),
(341, 4, 46, 'saucepans', 'saucepans  with mustard mayonnaise and red chili sauce', 0.00, 1, 180.00, 100, NULL, NULL, 99, NULL, '1712216929.jpg', 1, 0, '10', '2024-04-04 07:48:50', '2024-04-04 07:48:50', NULL),
(342, 10, 46, 'Tomato sauce', 'Tomato sauce in a bowl', 0.00, 1, 40.00, 100, NULL, NULL, 99, NULL, '1712217295.jpg', 1, 0, '10', '2024-04-04 07:54:55', '2024-04-04 07:54:55', NULL),
(343, 10, 46, 'Sauce', 'Espagnole Sauce', 0.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712217425.jpg', 1, 0, '10', '2024-04-04 07:57:05', '2024-04-04 07:57:05', NULL),
(344, 27, 46, 'Sauce', 'Espagnole Sauce', 0.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712217527.jpg', 1, 0, '15', '2024-04-04 07:58:47', '2024-04-04 07:58:47', NULL),
(345, 27, 46, 'Sauce', 'Hoi Sin Sauce', 0.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712217616.jpg', 1, 0, '10', '2024-04-04 08:00:16', '2024-04-04 08:00:16', NULL),
(346, 27, 46, 'Chilli sauce', 'Chilli sauce on little white bowl', 0.00, 1, 60.00, 100, NULL, NULL, 99, NULL, '1712217778.jpg', 1, 0, '10', '2024-04-04 08:02:58', '2024-04-04 08:02:58', NULL),
(347, 27, 46, 'ketchup', 'ketchup or tomato paste', 0.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712217904.jpg', 1, 0, '10', '2024-04-04 08:05:04', '2024-04-04 08:05:04', NULL),
(348, 27, 46, 'ketchup', 'Delicious ketchup in white bowl', 0.00, 1, 60.00, 100, NULL, NULL, 99, NULL, '1712218202.jpg', 1, 0, '10', '2024-04-04 08:10:02', '2024-04-04 08:10:02', NULL),
(349, 29, 46, 'Bordelaise Sauce', 'Bordelaise Sauce', 0.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712218404.jpg', 1, 0, '10', '2024-04-04 08:13:24', '2024-04-04 08:13:24', NULL),
(350, 30, 46, 'Sauce', 'Adobo Sauce', 0.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712218702.jpg', 0, 0, '10', '2024-04-04 08:18:22', '2024-04-04 08:18:22', NULL),
(351, 30, 46, 'Sauce', 'A couple of bowls filled with different types of sauce', 0.00, 1, 140.00, 100, NULL, NULL, 99, NULL, '1712220434.jpg', 1, 0, '10', '2024-04-04 08:47:15', '2024-04-04 08:47:15', NULL),
(352, 32, 46, 'Ketchup', 'Ketchup Sauce', 0.00, 1, 50.00, 100, NULL, NULL, 99, NULL, '1712220702.jpg', 1, 0, '10', '2024-04-04 08:51:42', '2024-04-04 08:51:42', NULL),
(353, 1, 46, 'Coke in a glass', 'Cold coke in a glass', 0.00, 1, 160.00, 100, NULL, NULL, 99, NULL, '1712221151.jpg', 1, 0, '10', '2024-04-04 08:59:12', '2024-04-04 08:59:12', NULL),
(354, 1, 46, 'coke in a glass', 'Cold coke in a glass', 10.00, 1, 150.00, 100, NULL, NULL, 99, NULL, '1712221639.jpg', 1, 0, '10', '2024-04-04 09:07:19', '2024-04-04 09:07:19', NULL),
(355, 2, 46, 'Coke in a glass', 'Cold coke in a glass', 5.00, 1, 160.00, 100, NULL, NULL, 99, NULL, '1712222301.jpg', 1, 0, '10', '2024-04-04 09:18:21', '2024-04-04 09:18:21', NULL),
(356, 2, 46, 'cocktail on dark surface', 'Long island cocktail on dark surface', 0.00, 1, 140.00, 100, NULL, NULL, 99, NULL, '1712222482.jpg', 1, 0, '10', '2024-04-04 09:21:22', '2024-04-04 09:21:22', NULL),
(357, 2, 46, 'Coca Cola', 'Fresh cola drink in glass', 10.00, 1, 150.00, 100, NULL, NULL, 99, NULL, '1712222974.jpg', 1, 0, '10', '2024-04-04 09:29:34', '2024-04-04 09:29:34', NULL),
(358, 36, 45, 'Cold drink', 'Brown carbonated drink in a glass with ice', 10.00, 1, 150.00, 100, NULL, NULL, 99, NULL, '1712223658.jpg', 1, 0, '10', '2024-04-04 09:40:58', '2024-04-04 09:40:58', NULL),
(359, 36, 45, 'Coca Cola', 'Cola in glass with ice cubes', 0.00, 1, 140.00, 100, NULL, NULL, 99, NULL, '1712223877.jpg', 1, 0, '10', '2024-04-04 09:44:37', '2024-04-04 09:44:37', NULL),
(360, 41, 45, 'Coca Cola', 'Soda bubbles in a cola with ice in glass coolness', 10.00, 1, 150.00, 100, NULL, NULL, 99, NULL, '1712224624.jpg', 1, 0, '10', '2024-04-04 09:57:04', '2024-04-04 09:57:04', NULL),
(361, 41, 45, 'Coca Cola', 'Cola With Ice Cubes In Glass', 10.00, 1, 150.00, 100, NULL, NULL, 99, NULL, '1712225324.jpg', 1, 0, '10', '2024-04-04 10:08:44', '2024-04-04 10:08:44', NULL),
(362, 48, 45, 'Orange Juice', 'Delicious glass of orange juice', 10.00, 1, 180.00, 100, NULL, NULL, 99, NULL, '1712226303.jpg', 1, 0, '10', '2024-04-04 10:25:04', '2024-04-04 10:25:04', NULL),
(363, 48, 45, 'Orange Juice', 'Glass of orange juice and the oranges', 0.00, 1, 150.00, 100, NULL, NULL, 99, NULL, '1712226594.jpg', 1, 0, '10', '2024-04-04 10:29:54', '2024-04-04 10:29:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_addons`
--

CREATE TABLE `item_addons` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `addon_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_addons`
--

INSERT INTO `item_addons` (`id`, `item_id`, `addon_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 182, 332, 1, '2024-03-06 14:28:02', '2024-03-06 14:28:02'),
(2, 265, 339, 1, '2024-04-05 12:41:34', '2024-04-05 12:41:34'),
(3, 265, 340, 1, '2024-04-05 12:41:34', '2024-04-05 12:41:34'),
(4, 311, 360, 1, '2024-04-05 12:44:06', '2024-04-05 12:44:06'),
(5, 310, 360, 1, '2024-04-05 14:06:17', '2024-04-05 14:06:17'),
(6, 281, 361, 1, '2024-04-05 14:06:59', '2024-04-05 14:06:59'),
(7, 250, 359, 1, '2024-04-05 14:09:58', '2024-04-05 14:09:58'),
(8, 246, 355, 1, '2024-04-05 14:10:23', '2024-04-05 14:10:23'),
(9, 243, 353, 1, '2024-04-05 14:15:29', '2024-04-05 14:15:29'),
(10, 242, 356, 1, '2024-04-05 14:16:11', '2024-04-05 14:16:11'),
(11, 176, 339, 1, '2024-04-05 14:22:16', '2024-04-05 14:22:16'),
(12, 176, 340, 1, '2024-04-05 14:22:16', '2024-04-05 14:22:16'),
(13, 316, 357, 1, '2024-04-05 14:30:20', '2024-04-05 14:30:20'),
(14, 315, 360, 1, '2024-04-05 14:30:43', '2024-04-05 14:30:43'),
(15, 314, 361, 1, '2024-04-05 14:31:01', '2024-04-05 14:31:01'),
(16, 313, 358, 1, '2024-04-05 14:31:20', '2024-04-05 14:31:20'),
(17, 192, 339, 1, '2024-04-05 14:32:12', '2024-04-05 14:32:12'),
(18, 192, 338, 1, '2024-04-05 14:32:12', '2024-04-05 14:32:12'),
(19, 191, 349, 1, '2024-04-05 14:32:49', '2024-04-05 14:32:49'),
(20, 191, 352, 1, '2024-04-05 14:32:49', '2024-04-05 14:32:49'),
(21, 190, 341, 1, '2024-04-05 14:33:20', '2024-04-05 14:33:20'),
(22, 189, 333, 1, '2024-04-05 14:33:45', '2024-04-05 14:33:45'),
(23, 187, 358, 1, '2024-04-05 14:34:17', '2024-04-05 14:34:17'),
(24, 186, 352, 1, '2024-04-05 14:35:17', '2024-04-05 14:35:17'),
(25, 186, 354, 1, '2024-04-05 14:35:17', '2024-04-05 14:35:17'),
(26, 185, 339, 1, '2024-04-05 14:35:46', '2024-04-05 14:35:46'),
(27, 185, 333, 1, '2024-04-05 14:35:46', '2024-04-05 14:35:46'),
(28, 183, 338, 1, '2024-04-05 14:36:13', '2024-04-05 14:36:13'),
(29, 225, 361, 1, '2024-04-05 14:42:35', '2024-04-05 14:42:35'),
(30, 224, 360, 1, '2024-04-05 14:42:54', '2024-04-05 14:42:54'),
(31, 223, 359, 1, '2024-04-05 14:43:15', '2024-04-05 14:43:15'),
(32, 222, 360, 1, '2024-04-05 14:43:34', '2024-04-05 14:43:34'),
(33, 219, 361, 1, '2024-04-05 14:44:08', '2024-04-05 14:44:08'),
(34, 217, 347, 1, '2024-04-05 14:44:27', '2024-04-05 14:44:27'),
(35, 217, 361, 1, '2024-04-05 14:44:27', '2024-04-05 14:44:27'),
(36, 216, 347, 1, '2024-04-05 14:44:45', '2024-04-05 14:44:45'),
(37, 216, 361, 1, '2024-04-05 14:44:45', '2024-04-05 14:44:45'),
(38, 215, 347, 1, '2024-04-05 14:45:08', '2024-04-05 14:45:08'),
(39, 215, 361, 1, '2024-04-05 14:45:08', '2024-04-05 14:45:08'),
(40, 214, 338, 1, '2024-04-05 14:45:35', '2024-04-05 14:45:35'),
(41, 214, 336, 1, '2024-04-05 14:45:35', '2024-04-05 14:45:35'),
(42, 212, 338, 1, '2024-04-05 14:45:59', '2024-04-05 14:45:59'),
(43, 212, 336, 1, '2024-04-05 14:45:59', '2024-04-05 14:45:59'),
(44, 210, 338, 1, '2024-04-05 14:46:22', '2024-04-05 14:46:22'),
(45, 210, 336, 1, '2024-04-05 14:46:22', '2024-04-05 14:46:22'),
(46, 169, 333, 1, '2024-04-05 14:47:32', '2024-04-05 14:47:32'),
(47, 166, 346, 1, '2024-04-05 14:47:50', '2024-04-05 14:47:50'),
(48, 164, 343, 1, '2024-04-05 14:48:32', '2024-04-05 14:48:32'),
(49, 158, 346, 1, '2024-04-05 14:49:12', '2024-04-05 14:49:12'),
(50, 153, 342, 1, '2024-04-05 14:49:46', '2024-04-05 14:49:46'),
(51, 140, 342, 1, '2024-04-05 14:50:53', '2024-04-05 14:50:53'),
(52, 140, 353, 1, '2024-04-05 14:50:53', '2024-04-05 14:50:53'),
(53, 138, 342, 1, '2024-04-05 14:51:50', '2024-04-05 14:51:50'),
(54, 138, 353, 1, '2024-04-05 14:51:50', '2024-04-05 14:51:50'),
(55, 136, 342, 1, '2024-04-05 14:52:28', '2024-04-05 14:52:28'),
(56, 136, 353, 1, '2024-04-05 14:52:28', '2024-04-05 14:52:28'),
(57, 133, 352, 1, '2024-04-05 14:53:38', '2024-04-05 14:53:38'),
(58, 133, 353, 1, '2024-04-05 14:53:38', '2024-04-05 14:53:38'),
(59, 130, 338, 1, '2024-04-05 14:54:35', '2024-04-05 14:54:35'),
(60, 130, 358, 1, '2024-04-05 14:54:35', '2024-04-05 14:54:35'),
(61, 126, 335, 1, '2024-04-05 14:55:15', '2024-04-05 14:55:15'),
(62, 126, 357, 1, '2024-04-05 14:55:15', '2024-04-05 14:55:15'),
(63, 125, 336, 1, '2024-04-05 14:55:53', '2024-04-05 14:55:53'),
(64, 125, 355, 1, '2024-04-05 14:55:53', '2024-04-05 14:55:53'),
(65, 123, 352, 1, '2024-04-05 14:56:38', '2024-04-05 14:56:38'),
(66, 123, 353, 1, '2024-04-05 14:56:38', '2024-04-05 14:56:38'),
(67, 309, 358, 1, '2024-04-05 15:54:25', '2024-04-05 15:54:25'),
(68, 309, 351, 1, '2024-04-05 15:54:25', '2024-04-05 15:54:25'),
(69, 303, 361, 1, '2024-04-05 15:55:31', '2024-04-05 15:55:31'),
(70, 303, 333, 1, '2024-04-05 15:55:31', '2024-04-05 15:55:31'),
(71, 302, 363, 1, '2024-04-05 15:57:11', '2024-04-05 15:57:11'),
(72, 301, 361, 1, '2024-04-05 15:58:19', '2024-04-05 15:58:19'),
(73, 296, 344, 1, '2024-04-05 15:59:26', '2024-04-05 15:59:26'),
(74, 296, 359, 1, '2024-04-05 15:59:26', '2024-04-05 15:59:26'),
(75, 294, 344, 1, '2024-04-05 15:59:51', '2024-04-05 15:59:51'),
(76, 294, 352, 1, '2024-04-05 15:59:51', '2024-04-05 15:59:51'),
(77, 284, 358, 1, '2024-04-05 16:04:39', '2024-04-05 16:04:39'),
(78, 284, 349, 1, '2024-04-05 16:04:39', '2024-04-05 16:04:39'),
(79, 282, 347, 1, '2024-04-05 16:05:01', '2024-04-05 16:05:01'),
(80, 282, 359, 1, '2024-04-05 16:05:01', '2024-04-05 16:05:01'),
(81, 264, 346, 1, '2024-04-05 16:05:37', '2024-04-05 16:05:37'),
(82, 257, 333, 1, '2024-04-05 16:06:11', '2024-04-05 16:06:11'),
(83, 254, 335, 1, '2024-04-05 16:06:34', '2024-04-05 16:06:34'),
(84, 254, 357, 1, '2024-04-05 16:06:34', '2024-04-05 16:06:34'),
(85, 184, 335, 1, '2024-04-05 16:21:41', '2024-04-05 16:21:41'),
(86, 184, 336, 1, '2024-04-05 16:21:41', '2024-04-05 16:21:41'),
(87, 162, 341, 1, '2024-04-05 16:26:23', '2024-04-05 16:26:23'),
(88, 170, 339, 1, '2024-04-05 16:26:49', '2024-04-05 16:26:49'),
(89, 170, 353, 1, '2024-04-05 16:26:49', '2024-04-05 16:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `vendor_type_id` int DEFAULT NULL,
  `sort_by` int DEFAULT NULL,
  `is_mu` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'is most used',
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `parent_id`, `vendor_type_id`, `sort_by`, `is_mu`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, 1, 'Pizza', '1707307669.jpg', '2024-02-07 12:07:49', '2024-02-09 11:01:43', NULL),
(2, 9, 1, NULL, 1, 'Zinger Burger', '1707458086.png', '2024-02-09 05:54:46', '2024-02-09 13:47:36', NULL),
(3, 9, 1, NULL, 1, 'Beef Burger', '1707458654.png', '2024-02-09 06:04:14', '2024-02-09 13:47:27', NULL),
(4, 31, 1, NULL, 1, 'Chicken Tikka Pizza', '1707459514.jpg', '2024-02-09 06:18:34', '2024-02-26 11:41:31', NULL),
(5, NULL, 3, NULL, 0, 'Fresh', '1707483415.jpg', '2024-02-09 12:56:55', '2024-02-09 12:56:55', NULL),
(6, 5, 3, NULL, 0, 'Fruits', '1707483921.jpg', '2024-02-09 13:05:22', '2024-02-09 13:05:22', NULL),
(7, 5, 3, NULL, 0, 'Vegetables', '1707484922.jpg', '2024-02-09 13:22:02', '2024-02-09 13:22:02', NULL),
(8, NULL, 3, NULL, 0, 'Dairy', '1707486411.jpg', '2024-02-09 13:46:51', '2024-02-12 10:07:36', NULL),
(9, NULL, 1, NULL, 1, 'BURGER', '1707486430.png', '2024-02-09 13:47:10', '2024-02-09 13:47:17', NULL),
(10, 9, 1, NULL, 1, 'Chicken Burger', '1707486518.png', '2024-02-09 13:48:38', '2024-02-09 13:48:51', NULL),
(11, NULL, 3, NULL, 0, 'BAKERY', '1707487513.jpg', '2024-02-09 14:05:13', '2024-02-09 14:05:13', NULL),
(12, 11, 3, NULL, 0, 'Bread', '1707487901.jpg', '2024-02-09 14:11:42', '2024-02-09 14:11:42', NULL),
(13, 11, 3, NULL, 0, 'Bagels', '1707488349.jpg', '2024-02-09 14:19:09', '2024-02-09 14:19:09', NULL),
(14, 11, 3, NULL, 0, 'Pastries', '1707488450.jpg', '2024-02-09 14:20:51', '2024-02-09 14:20:51', NULL),
(15, 8, 3, NULL, 0, 'Milk', '1707488535.jpg', '2024-02-09 14:22:16', '2024-02-09 14:22:16', NULL),
(16, 11, 3, NULL, 0, 'Cakes', '1707488550.jpg', '2024-02-09 14:22:30', '2024-02-09 14:22:30', NULL),
(17, 11, 3, NULL, 0, 'Cookies', '1707488644.jpg', '2024-02-09 14:24:05', '2024-02-09 14:24:05', NULL),
(18, 8, 3, NULL, 0, 'Eggs', '1707488667.jpg', '2024-02-09 14:24:27', '2024-02-09 14:24:27', NULL),
(19, 8, 3, NULL, 0, 'Butter', '1707718631.jpg', '2024-02-12 06:17:11', '2024-02-12 06:17:11', NULL),
(20, 8, 3, NULL, 0, 'Yogurt', '1707719204.jpg', '2024-02-12 06:26:44', '2024-02-12 06:26:44', NULL),
(21, 8, 3, NULL, 0, 'Cheese', '1707720063.jpg', '2024-02-12 06:41:04', '2024-02-12 06:41:04', NULL),
(22, NULL, 1, NULL, 1, 'Beverages', '1707732787.jpg', '2024-02-12 10:13:07', '2024-02-12 13:23:00', NULL),
(23, 22, 1, NULL, 1, 'Water', '1707733103.jpg', '2024-02-12 10:18:24', '2024-02-12 13:24:19', NULL),
(24, 22, 1, NULL, 1, 'Juice (orange juice, apple juice, etc.)', '1707733322.jpg', '2024-02-12 10:22:02', '2024-02-26 13:44:48', NULL),
(25, NULL, 1, NULL, 0, 'BBQ', '1707735612.jpg', '2024-02-12 10:56:10', '2024-02-26 13:51:53', NULL),
(26, 25, 1, NULL, 0, 'Shawarma', '1707735714.jpg', '2024-02-12 11:01:54', '2024-02-12 11:01:54', NULL),
(27, 25, 1, NULL, 1, 'French Fries', '1707735911.jpg', '2024-02-12 11:05:11', '2024-02-26 13:52:08', NULL),
(28, 25, 1, NULL, 1, 'Rolls', '1707736233.jpg', '2024-02-12 11:05:14', '2024-02-26 13:52:27', NULL),
(29, 29, 1, NULL, 1, 'Snacks', '1707737565.jpg', '2024-02-12 11:32:45', '2024-02-23 13:36:55', NULL),
(30, 29, 1, NULL, 0, 'Samosa', '1707737723.jpg', '2024-02-12 11:35:23', '2024-02-12 11:35:23', NULL),
(31, NULL, 1, NULL, 0, 'Pizza', '1707738636.jpg', '2024-02-12 11:50:36', '2024-02-12 11:50:36', NULL),
(32, 31, 1, NULL, 1, 'Chicken Pizza', '1707739106.jpg', '2024-02-12 11:58:26', '2024-02-23 13:36:18', NULL),
(33, 31, 1, NULL, 1, 'Chicken Fajita Pizza', '1707740906.jpg', '2024-02-12 12:28:26', '2024-02-26 11:42:59', NULL),
(34, 22, 1, NULL, 1, 'Coca Cola', '1707744425.jpg', '2024-02-12 13:27:06', '2024-02-13 06:28:46', NULL),
(35, NULL, 1, NULL, 0, 'Club Sandwich', '1707804618.jpg', '2024-02-13 06:10:18', '2024-02-13 06:34:41', NULL),
(36, 35, 1, NULL, 1, 'Grilled cheese', '1707805312.jpg', '2024-02-13 06:21:52', '2024-02-13 06:33:51', NULL),
(37, 35, 1, NULL, 1, 'Delicious Sandwiches', '1707805564.jpg', '2024-02-13 06:26:04', '2024-02-13 06:33:28', NULL),
(38, 35, 1, NULL, 1, 'Appetizing Sandwich', '1707806284.jpg', '2024-02-13 06:26:05', '2024-02-13 06:38:04', NULL),
(39, NULL, 1, NULL, 0, 'Biryani', '1708694997.jpg', '2024-02-23 13:29:57', '2024-02-23 13:37:26', NULL),
(40, 39, 1, NULL, 1, 'Chicken Biryani', '1708695044.jpg', '2024-02-23 13:30:44', '2024-02-23 13:33:47', NULL),
(41, 39, 1, NULL, 1, 'Beef Biryani', '1708695267.jpg', '2024-02-23 13:34:27', '2024-02-23 13:34:33', NULL),
(42, NULL, 1, NULL, 0, 'Nahari', '1708695695.jpg', '2024-02-23 13:41:35', '2024-02-23 13:41:35', NULL),
(43, 42, 1, NULL, 1, 'Chicken Nahari', '1708696097.jpg', '2024-02-23 13:42:25', '2024-02-23 13:48:18', NULL),
(44, 42, 1, NULL, 1, 'Beef Nahari', '1708696126.jpg', '2024-02-23 13:45:16', '2024-02-23 13:48:46', NULL),
(45, NULL, 1, NULL, 0, 'steak', '1708696398.jpg', '2024-02-23 13:46:43', '2024-02-23 13:53:18', NULL),
(46, 45, 1, NULL, 1, 'Beef Steak', '1708696454.jpg', '2024-02-23 13:54:14', '2024-02-23 13:54:23', NULL),
(47, 45, 1, NULL, 1, 'Chicken Steak', '1708696536.jpg', '2024-02-23 13:55:36', '2024-02-23 13:55:42', NULL),
(48, 48, 1, NULL, 1, 'BBQ Bonanza', '1708955399.jpg', '2024-02-26 13:49:59', '2024-02-26 13:50:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_ext_img`
--

CREATE TABLE `item_ext_img` (
  `id` int NOT NULL,
  `item_id` int DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `shop_id` bigint NOT NULL,
  `customer_id` bigint NOT NULL,
  `message_url` varchar(225) NOT NULL,
  `message_limit` int NOT NULL DEFAULT '4',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nsa_leads`
--

CREATE TABLE `nsa_leads` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` int NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `neighbourhood` varchar(255) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Non service area Leads';

-- --------------------------------------------------------

--
-- Table structure for table `operator_commission_history`
--

CREATE TABLE `operator_commission_history` (
  `id` int NOT NULL,
  `vendor_id` int DEFAULT NULL,
  `commission percentage` decimal(10,0) DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operator_commission_history`
--

INSERT INTO `operator_commission_history` (`id`, `vendor_id`, `commission percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10, NULL, '2024-02-07 12:59:18', '2024-02-07 12:59:18'),
(2, 1, 20, NULL, '2024-02-07 13:26:49', '2024-02-07 13:26:49'),
(3, 2, 20, NULL, '2024-02-07 13:42:08', '2024-02-07 13:42:08'),
(4, 3, 20, NULL, '2024-02-07 13:48:51', '2024-02-07 13:48:51'),
(5, 4, 20, NULL, '2024-02-07 13:49:01', '2024-02-07 13:49:01'),
(6, 5, 20, NULL, '2024-02-07 13:52:28', '2024-02-07 13:52:28'),
(7, 6, 20, NULL, '2024-02-09 06:06:19', '2024-02-09 06:06:19'),
(8, 7, 20, NULL, '2024-02-09 07:08:10', '2024-02-09 07:08:10'),
(9, 8, 20, NULL, '2024-02-09 07:12:18', '2024-02-09 07:12:18'),
(10, 9, 20, NULL, '2024-02-09 07:31:42', '2024-02-09 07:31:42'),
(11, 10, 20, NULL, '2024-02-09 07:34:56', '2024-02-09 07:34:56'),
(12, 11, 20, NULL, '2024-02-09 07:37:33', '2024-02-09 07:37:33'),
(13, 12, 20, NULL, '2024-02-09 07:45:44', '2024-02-09 07:45:44'),
(14, 13, 20, NULL, '2024-02-09 08:10:46', '2024-02-09 08:10:46'),
(15, 14, 20, NULL, '2024-02-09 08:12:29', '2024-02-09 08:12:29'),
(16, 15, 20, NULL, '2024-02-09 08:49:25', '2024-02-09 08:49:25'),
(17, 16, 20, NULL, '2024-02-09 09:00:35', '2024-02-09 09:00:35'),
(18, 17, 20, NULL, '2024-02-09 09:46:46', '2024-02-09 09:46:46'),
(19, 18, 20, NULL, '2024-02-09 10:10:14', '2024-02-09 10:10:14'),
(20, 19, 20, NULL, '2024-02-09 10:15:45', '2024-02-09 10:15:45'),
(21, 20, 20, NULL, '2024-02-09 11:11:03', '2024-02-09 11:11:03'),
(22, 21, 20, NULL, '2024-02-09 12:12:06', '2024-02-09 12:12:06'),
(23, 22, 10, NULL, '2024-02-09 13:34:50', '2024-02-09 13:34:50'),
(24, 23, 10, NULL, '2024-02-09 14:04:11', '2024-02-09 14:04:11'),
(25, 24, 20, NULL, '2024-02-12 07:33:54', '2024-02-12 07:33:54'),
(26, 25, 20, NULL, '2024-02-12 07:48:25', '2024-02-12 07:48:25'),
(27, 26, 20, NULL, '2024-02-12 13:42:16', '2024-02-12 13:42:16'),
(28, 27, 5, NULL, '2024-02-15 12:18:43', '2024-02-15 12:18:43'),
(29, 28, 10, NULL, '2024-02-15 14:01:15', '2024-02-15 14:01:15'),
(30, 29, 12, NULL, '2024-02-15 14:04:58', '2024-02-15 14:04:58'),
(31, 30, 10, NULL, '2024-02-16 11:26:48', '2024-02-16 11:26:48'),
(32, 31, 20, NULL, '2024-02-23 07:06:54', '2024-02-23 07:06:54'),
(33, 32, 20, NULL, '2024-02-23 07:07:30', '2024-02-23 07:07:30'),
(34, 33, 20, NULL, '2024-02-23 07:25:38', '2024-02-23 07:25:38'),
(35, 34, 20, NULL, '2024-02-23 12:42:30', '2024-02-23 12:42:30'),
(36, 35, 20, NULL, '2024-02-23 12:59:57', '2024-02-23 12:59:57'),
(37, 36, 20, NULL, '2024-02-23 13:06:17', '2024-02-23 13:06:17'),
(38, 37, 20, NULL, '2024-02-23 13:11:17', '2024-02-23 13:11:17'),
(39, 38, 20, NULL, '2024-02-26 06:53:29', '2024-02-26 06:53:29'),
(40, 39, 20, NULL, '2024-02-26 06:56:39', '2024-02-26 06:56:39'),
(41, 40, 20, NULL, '2024-02-26 07:11:57', '2024-02-26 07:11:57'),
(42, 41, 20, NULL, '2024-02-26 07:22:02', '2024-02-26 07:22:02'),
(43, 42, 15, NULL, '2024-02-26 07:29:45', '2024-02-26 07:29:45'),
(44, 43, 20, NULL, '2024-02-26 07:35:19', '2024-02-26 07:35:19'),
(45, 44, 20, NULL, '2024-02-26 07:51:11', '2024-02-26 07:51:11'),
(46, 45, 20, NULL, '2024-02-26 08:12:59', '2024-02-26 08:12:59'),
(47, 46, 20, NULL, '2024-02-26 08:50:44', '2024-02-26 08:50:44'),
(48, 47, 10, NULL, '2024-08-28 11:36:30', '2024-08-28 11:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `operator_details`
--

CREATE TABLE `operator_details` (
  `id` int NOT NULL,
  `operator_id` int DEFAULT NULL,
  `city_id` int NOT NULL,
  `operation_geo_location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'Used for defining its operation radius',
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `operation_radius` int DEFAULT NULL,
  `operational_area` tinyint DEFAULT NULL,
  `commission_percentage` double DEFAULT NULL,
  `area_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator_details`
--

INSERT INTO `operator_details` (`id`, `operator_id`, `city_id`, `operation_geo_location`, `address`, `operation_radius`, `operational_area`, `commission_percentage`, `area_name`, `created_at`, `updated_at`) VALUES
(8, 6, 1, '{\"latitude\":24.838756100000001225680534844286739826202392578125,\"longitude\":67.08091120000000273648765869438648223876953125}', 'Saddar Karachi, Pakistan', 1, 1, 10, 'Defence View Phase 2', '2024-02-23 13:39:07', '2024-03-12 15:45:33'),
(9, 7, 1, '{\"latitude\":24.834255299999998811699697398580610752105712890625,\"longitude\":67.055392699999998740167939104139804840087890625}', 'Saddar Karachi, Pakistan', 1, 1, 15, 'Defense DHA Phase 2', '2024-02-23 13:40:47', '2024-03-12 15:43:11'),
(10, 8, 1, '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 'Saddar Karachi, Pakistan', 1, 1, 10, 'Clifton', '2024-02-23 13:41:47', '2024-03-12 15:40:52'),
(11, 9, 1, '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 'Saddar Karachi, Pakistan', 1, 1, 12, 'Saddar', '2024-02-23 13:42:32', '2024-02-23 13:42:32'),
(12, 10, 1, '{\"latitude\":24.80848519999999979290805640630424022674560546875,\"longitude\":67.0470516999999972540535964071750640869140625}', 'Saddar Karachi, Pakistan', 1, 1, 10, 'Defence Phase 5', '2024-02-23 13:43:45', '2024-03-12 15:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `operator_dues`
--

CREATE TABLE `operator_dues` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `operator_id` int DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL COMMENT 'This will contain calculated commission on each order',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator_dues`
--

INSERT INTO `operator_dues` (`id`, `order_id`, `vendor_id`, `operator_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 31, 10, 90, '2024-03-01 07:35:01', '2024-03-01 07:35:01'),
(2, 2, 31, 10, 260, '2024-03-01 07:35:01', '2024-03-01 07:35:01'),
(3, 3, 31, 10, 60, '2024-03-01 07:35:01', '2024-03-01 07:35:01'),
(4, 4, 34, 6, 130, '2024-03-01 07:35:01', '2024-03-01 07:35:01'),
(5, 5, 34, 6, 140, '2024-03-01 07:35:01', '2024-03-01 07:35:01'),
(6, 6, 38, 8, 210, '2024-03-01 07:35:01', '2024-03-01 07:35:01'),
(7, 7, 38, 8, 240, '2024-03-01 07:35:01', '2024-03-01 07:35:01'),
(8, 8, 39, 8, 600, '2024-03-01 07:35:01', '2024-03-01 07:35:01'),
(9, 9, 39, 8, 360, '2024-03-01 07:35:01', '2024-03-01 07:35:01'),
(16, 10, 39, 8, 300, '2024-03-01 17:22:24', '2024-03-01 17:22:24'),
(17, 11, 39, 8, 270, '2024-03-01 18:15:02', '2024-03-01 18:15:02'),
(18, 12, 39, 8, 390, '2024-03-01 19:13:53', '2024-03-01 19:13:53'),
(19, 13, 31, 9, 60, '2024-03-07 14:22:15', '2024-03-07 14:22:15'),
(20, 14, 31, 9, 78, '2024-03-07 14:25:41', '2024-03-07 14:25:41'),
(21, 15, 31, 9, 246, '2024-03-10 15:53:18', '2024-03-10 15:53:18'),
(22, 16, 36, 9, 72, '2024-03-11 14:38:41', '2024-03-11 14:38:41'),
(23, 17, 31, 9, 144, '2024-03-12 15:02:49', '2024-03-12 15:02:49'),
(24, 18, 31, 9, 144, '2024-03-12 15:04:17', '2024-03-12 15:04:17'),
(25, 19, 31, 9, 264, '2024-03-12 16:00:16', '2024-03-12 16:00:16'),
(26, 24, 31, 9, 144, '2024-03-14 17:02:16', '2024-03-14 17:02:16'),
(27, 25, 31, 9, 84, '2024-03-14 17:02:42', '2024-03-14 17:02:42'),
(28, 26, 31, 9, 90, '2024-03-14 17:03:04', '2024-03-14 17:03:04'),
(29, 27, 31, 9, 78, '2024-03-14 17:03:27', '2024-03-14 17:03:27'),
(30, 28, 31, 9, 78, '2024-03-14 17:03:45', '2024-03-14 17:03:45'),
(31, 29, 31, 9, 144, '2024-03-14 18:07:28', '2024-03-14 18:07:28'),
(32, 30, 31, 9, 264, '2024-03-14 18:12:54', '2024-03-14 18:12:54'),
(33, 31, 31, 9, 168, '2024-03-14 18:50:54', '2024-03-14 18:50:54'),
(34, 32, 31, 9, 90, '2024-03-14 18:51:29', '2024-03-14 18:51:29'),
(35, 33, 45, 9, 77, '2024-03-15 18:51:53', '2024-03-15 18:51:53'),
(36, 34, 31, 9, 168, '2024-03-15 18:54:21', '2024-03-15 18:54:21'),
(37, 35, 34, 9, 162, '2024-03-15 18:58:24', '2024-03-15 18:58:24'),
(38, 36, 31, 9, 84, '2024-03-19 16:31:16', '2024-03-19 16:31:16'),
(39, 37, 31, 9, 144, '2024-03-19 16:31:44', '2024-03-19 16:31:44'),
(40, 38, 33, 9, 108, '2024-03-19 16:32:23', '2024-03-19 16:32:23'),
(41, 39, 33, 9, 108, '2024-03-19 16:33:04', '2024-03-19 16:33:04'),
(42, 40, 36, 9, 96, '2024-03-19 16:35:55', '2024-03-19 16:35:55'),
(43, 41, 32, 9, 126, '2024-03-19 18:28:39', '2024-03-19 18:28:39'),
(44, 42, 34, 9, 168, '2024-03-20 13:28:51', '2024-03-20 13:28:51'),
(45, 43, 31, 9, 156, '2024-03-20 13:38:31', '2024-03-20 13:38:31'),
(46, 44, 41, 9, 94, '2024-03-20 13:52:58', '2024-03-20 13:52:58'),
(47, 45, 41, 9, 94, '2024-03-20 14:00:01', '2024-03-20 14:00:01'),
(48, 46, 34, 9, 162, '2024-03-20 14:10:36', '2024-03-20 14:10:36'),
(49, 47, 32, 9, 108, '2024-03-20 14:36:02', '2024-03-20 14:36:02'),
(50, 48, 31, 9, 108, '2024-03-20 14:37:18', '2024-03-20 14:37:18'),
(51, 49, 33, 9, 108, '2024-03-20 15:05:33', '2024-03-20 15:05:33'),
(52, 50, 31, 9, 114, '2024-03-20 15:07:02', '2024-03-20 15:07:02'),
(53, 51, 32, 9, 120, '2024-03-26 00:26:21', '2024-03-26 00:26:21'),
(54, 52, 32, 9, 840, '2024-03-26 15:54:21', '2024-03-26 15:54:21'),
(55, 53, 32, 9, 216, '2024-03-26 16:52:36', '2024-03-26 16:52:36'),
(56, 54, 32, 9, 216, '2024-03-26 16:52:39', '2024-03-26 16:52:39'),
(57, 55, 32, 9, 216, '2024-03-26 16:52:40', '2024-03-26 16:52:40'),
(58, 56, 32, 9, 216, '2024-03-26 16:52:41', '2024-03-26 16:52:41'),
(59, 57, 32, 9, 216, '2024-03-26 16:52:42', '2024-03-26 16:52:42'),
(60, 58, 32, 9, 216, '2024-03-26 16:52:43', '2024-03-26 16:52:43'),
(61, 59, 31, 9, 492, '2024-03-26 17:06:27', '2024-03-26 17:06:27'),
(62, 60, 31, 9, 528, '2024-03-26 17:23:14', '2024-03-26 17:23:14'),
(63, 61, 31, 9, 1002, '2024-03-26 17:32:38', '2024-03-26 17:32:38'),
(64, 62, 31, 9, 90, '2024-03-26 17:45:43', '2024-03-26 17:45:43'),
(65, 63, 31, 9, 324, '2024-03-26 17:47:35', '2024-03-26 17:47:35'),
(66, 64, 31, 9, 696, '2024-03-28 13:19:39', '2024-03-28 13:19:39'),
(67, 65, 32, 9, 372, '2024-03-28 13:54:41', '2024-03-28 13:54:41'),
(68, 66, 34, 9, 756, '2024-03-28 13:56:58', '2024-03-28 13:56:58'),
(69, 67, 31, 9, 168, '2024-03-28 14:06:51', '2024-03-28 14:06:51'),
(70, 68, 33, 9, 72, '2024-03-28 15:49:14', '2024-03-28 15:49:14'),
(71, 69, 45, 9, 168, '2024-03-28 16:34:13', '2024-03-28 16:34:13'),
(72, 70, 37, 9, 144, '2024-03-29 13:56:02', '2024-03-29 13:56:02'),
(73, 71, 31, 9, 444, '2024-03-29 14:11:27', '2024-03-29 14:11:27'),
(74, 72, 44, 9, 120, '2024-03-29 14:12:49', '2024-03-29 14:12:49'),
(75, 73, 32, 9, 288, '2024-03-29 16:26:44', '2024-03-29 16:26:44'),
(76, 74, 32, 9, 264, '2024-04-02 17:58:47', '2024-04-02 17:58:47'),
(77, 75, 31, 9, 198, '2024-04-02 18:06:38', '2024-04-02 18:06:38'),
(78, 76, 31, 9, 210, '2024-04-02 18:16:46', '2024-04-02 18:16:46'),
(79, 77, 44, 9, 240, '2024-04-02 18:20:14', '2024-04-02 18:20:14'),
(80, 78, 31, 9, 348, '2024-04-09 17:59:47', '2024-04-09 17:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `operator_master`
--

CREATE TABLE `operator_master` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `company_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `banner` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `single_vendor` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT (now()),
  `updated_at` datetime NOT NULL DEFAULT (now())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator_master`
--

INSERT INTO `operator_master` (`id`, `name`, `email`, `phone`, `company_name`, `logo`, `banner`, `single_vendor`, `created_at`, `updated_at`) VALUES
(6, 'Khalid Faqih', 'operator@example.com', '03023800520', 'Kindred Kitchens', '1710233133.jpg', '', NULL, '2024-02-23 06:39:07', '2024-03-12 08:45:33'),
(7, 'Rahul Anjum', 'rahul.operator@example.com', '03023800521', 'Tabletop Tales', '1710232991.jpg', '', NULL, '2024-02-23 06:40:47', '2024-03-12 08:43:11'),
(8, 'Azad Hayat', 'ah.operator@example.com', '03023800522', 'Crafted Cuisines', '1710232852.jpg', '', NULL, '2024-02-23 06:41:47', '2024-03-12 08:40:52'),
(9, 'Ghadir Kazmi', 'gk.operator@example.com', '03153838766', 'Food Ocean', '1710230497.jpg', '1710230497.jpg', NULL, '2024-02-23 06:42:32', '2024-03-12 08:01:37'),
(10, 'Jericho Elahi', 'je.operator@example.com', '03183535588', 'The Wandering Fork', '1710232611.jpg', '', NULL, '2024-02-23 06:43:45', '2024-03-12 08:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `operator_payment_details`
--

CREATE TABLE `operator_payment_details` (
  `id` int NOT NULL,
  `payment_id` int DEFAULT NULL COMMENT 'This is id from operator_payment_master',
  `payment_method` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'online or cash',
  `invoice_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'if online then add transaction id, if cash then add invoice id',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operator_payment_master`
--

CREATE TABLE `operator_payment_master` (
  `id` int NOT NULL,
  `operator_id` int DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operator_payment_master`
--

INSERT INTO `operator_payment_master` (`id`, `operator_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 8, 500, '2024-03-01 08:08:07', '2024-03-01 08:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_addons`
--

CREATE TABLE `order_addons` (
  `id` int NOT NULL,
  `order_master_id` int DEFAULT NULL,
  `order_detail_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `addon_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_deal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_addons`
--

INSERT INTO `order_addons` (`id`, `order_master_id`, `order_detail_id`, `item_id`, `addon_id`, `quantity`, `created_at`, `updated_at`, `is_deal`) VALUES
(1, 14, 16, 182, 332, 2, '2024-03-07 07:25:41', '2024-03-07 07:25:41', 0),
(2, 15, 17, 182, 332, 2, '2024-03-10 08:53:18', '2024-03-10 08:53:18', 0),
(3, 19, 22, 182, 332, 2, '2024-03-12 09:00:16', '2024-03-12 09:00:16', 0),
(4, 20, 24, 10, 332, 2, '2024-03-13 06:08:26', '2024-03-13 06:08:26', 1),
(5, 20, 25, 182, 332, 1, '2024-03-13 06:08:26', '2024-03-13 06:08:26', 0),
(6, 22, 29, 10, 332, 1, '2024-03-13 11:10:48', '2024-03-13 11:10:48', 1),
(7, 23, 30, 182, 332, 1, '2024-03-13 11:23:54', '2024-03-13 11:23:54', 0),
(8, 25, 32, 182, 332, 1, '2024-03-14 10:02:42', '2024-03-14 10:02:42', 0),
(9, 33, 44, 10, 332, 4, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 1),
(10, 36, 55, 182, 332, 1, '2024-03-19 09:31:16', '2024-03-19 09:31:16', 0),
(11, 48, 67, 182, 332, 2, '2024-03-20 07:37:18', '2024-03-20 07:37:18', 0),
(12, 50, 69, 182, 332, 1, '2024-03-20 08:07:02', '2024-03-20 08:07:02', 0),
(13, 65, 87, 182, 332, 2, '2024-03-28 06:54:41', '2024-03-28 06:54:41', 0),
(14, 75, 152, 182, 332, 1, '2024-04-02 11:06:39', '2024-04-02 11:06:39', 0),
(15, 76, 154, 182, 332, 1, '2024-04-02 11:16:51', '2024-04-02 11:16:51', 0),
(16, 78, 160, 310, 360, 1, '2024-04-09 10:59:47', '2024-04-09 10:59:47', 0),
(17, 78, 161, 176, 339, 1, '2024-04-09 10:59:47', '2024-04-09 10:59:47', 0),
(18, 78, 161, 176, 340, 1, '2024-04-09 10:59:47', '2024-04-09 10:59:47', 0),
(19, 78, 162, 10, 180, 1, '2024-04-09 10:59:47', '2024-04-09 10:59:47', 1),
(20, 78, 163, 10, 180, 1, '2024-04-09 10:59:47', '2024-04-09 10:59:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_deal_options`
--

CREATE TABLE `order_deal_options` (
  `id` int NOT NULL,
  `deal_id` bigint NOT NULL,
  `order_master_id` bigint NOT NULL,
  `order_detail_id` bigint NOT NULL,
  `item_id` bigint NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `item_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_original_price` int NOT NULL DEFAULT '0',
  `deal_price` decimal(10,0) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_deal_options`
--

INSERT INTO `order_deal_options` (`id`, `deal_id`, `order_master_id`, `order_detail_id`, `item_id`, `item_name`, `item_description`, `item_image`, `item_original_price`, `deal_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 2, 98, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-02-23 13:54:48', '2024-02-23 13:54:48'),
(2, 7, 2, 2, 100, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-02-23 13:54:48', '2024-02-23 13:54:48'),
(3, 14, 5, 5, 110, 'CHICKEN FAJITA (LARGE)', 'grilled with bell peppers and onions, wrapped in a warm tortilla, topped with creamy guacamole and tangy salsa, creating a flavorful Tex-Mex delight that\'s sure to satisfy any craving.', '1708772810.jpg', 1550, 0, 0, '2024-02-26 12:18:22', '2024-02-26 12:18:22'),
(4, 14, 5, 5, 112, 'PEPSI  350ml', 'PEPSI is a carbonated soft drink known for its caramel color, distinctive flavor, and worldwide popularity.', '1708772957.jpg', 400, 0, 0, '2024-02-26 12:18:22', '2024-02-26 12:18:22'),
(5, 32, 7, 7, 187, 'ZestyRoll', 'Bursting with bold flavors and a tantalizing zest, this roll offers a mouthwatering combination of savory ingredients wrapped in a soft, doughy embrace.', '1708952929.jpg', 450, 0, 0, '2024-02-27 12:38:52', '2024-02-27 12:38:52'),
(6, 32, 7, 7, 188, 'Garlic Butter Beef Steak', 'Indulge in our juicy Beef steak, grilled to perfection and bursting with savory flavors in every tender bite.', '1708952674.jpg', 1000, 0, 0, '2024-02-27 12:38:52', '2024-02-27 12:38:52'),
(7, 29, 8, 8, 177, 'Flame-Kissed Zinger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942717.jpg', 780, 0, 0, '2024-02-27 12:46:32', '2024-02-27 12:46:32'),
(8, 29, 8, 8, 177, 'Flame-Kissed Zinger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942717.jpg', 780, 0, 0, '2024-02-27 12:46:32', '2024-02-27 12:46:32'),
(9, 29, 9, 9, 177, 'Flame-Kissed Zinger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942717.jpg', 780, 0, 0, '2024-02-27 12:52:20', '2024-02-27 12:52:20'),
(10, 29, 9, 9, 178, 'Heatwave Zinger Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942515.jpg', 750, 0, 0, '2024-02-27 12:52:20', '2024-02-27 12:52:20'),
(11, 29, 11, 12, 177, 'Flame-Kissed Zinger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942717.jpg', 780, 0, 0, '2024-03-01 11:15:02', '2024-03-01 11:15:02'),
(12, 29, 11, 12, 178, 'Heatwave Zinger Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942515.jpg', 750, 0, 0, '2024-03-01 11:15:02', '2024-03-01 11:15:02'),
(13, 29, 12, 14, 178, 'Heatwave Zinger Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942515.jpg', 750, 0, 0, '2024-03-01 12:13:53', '2024-03-01 12:13:53'),
(14, 29, 12, 14, 178, 'Heatwave Zinger Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942515.jpg', 750, 0, 0, '2024-03-01 12:13:53', '2024-03-01 12:13:53'),
(15, 7, 15, 18, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-10 08:53:18', '2024-03-10 08:53:18'),
(16, 7, 15, 18, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-10 08:53:18', '2024-03-10 08:53:18'),
(17, 8, 17, 20, 248, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-12 08:02:49', '2024-03-12 08:02:49'),
(18, 8, 17, 20, 250, 'Chicken Supreme Pizza', 'A delectable pizza featuring tender chicken, savory bacon, flavorful mushrooms, and creamy mozzarella cheese on a crispy crust.', '1708675578.jpg', 899, 100, 0, '2024-03-12 08:02:49', '2024-03-12 08:02:49'),
(19, 8, 17, 20, 251, 'Pepsi  500ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', '1708685114.jpg', 100, 0, 0, '2024-03-12 08:02:49', '2024-03-12 08:02:49'),
(20, 7, 18, 21, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-12 08:04:17', '2024-03-12 08:04:17'),
(21, 7, 18, 21, 255, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-12 08:04:17', '2024-03-12 08:04:17'),
(22, 7, 19, 23, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-12 09:00:16', '2024-03-12 09:00:16'),
(23, 7, 19, 23, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-12 09:00:16', '2024-03-12 09:00:16'),
(24, 10, 20, 24, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-13 06:08:26', '2024-03-13 06:08:26'),
(25, 10, 20, 24, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-13 06:08:26', '2024-03-13 06:08:26'),
(26, 10, 20, 24, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-03-13 06:08:26', '2024-03-13 06:08:26'),
(27, 10, 20, 24, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-03-13 06:08:26', '2024-03-13 06:08:26'),
(28, 10, 22, 29, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-13 11:10:48', '2024-03-13 11:10:48'),
(29, 10, 22, 29, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-13 11:10:48', '2024-03-13 11:10:48'),
(30, 10, 22, 29, 181, 'Golden Garlic Fries', 'Crispy, golden-brown fries seasoned with aromatic garlic, offering a perfect balance of savory flavor and satisfying crunch in every bite, sure to tantalize the taste buds of garlic enthusiasts.', '1708685260.jpg', 150, 0, 0, '2024-03-13 11:10:48', '2024-03-13 11:10:48'),
(31, 10, 22, 29, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-03-13 11:10:48', '2024-03-13 11:10:48'),
(32, 7, 24, 31, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-14 10:02:16', '2024-03-14 10:02:16'),
(33, 7, 24, 31, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-14 10:02:16', '2024-03-14 10:02:16'),
(34, 7, 29, 36, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-14 11:07:28', '2024-03-14 11:07:28'),
(35, 7, 29, 36, 255, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-14 11:07:28', '2024-03-14 11:07:28'),
(36, 8, 30, 37, 248, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-14 11:12:54', '2024-03-14 11:12:54'),
(37, 8, 30, 37, 248, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-14 11:12:54', '2024-03-14 11:12:54'),
(38, 8, 30, 37, 251, 'Pepsi  500ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', '1708685114.jpg', 100, 0, 0, '2024-03-14 11:12:54', '2024-03-14 11:12:54'),
(39, 7, 31, 38, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-14 11:50:54', '2024-03-14 11:50:54'),
(40, 7, 31, 38, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-14 11:50:54', '2024-03-14 11:50:54'),
(41, 10, 33, 44, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-15 11:51:53', '2024-03-15 11:51:53'),
(42, 10, 33, 44, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-15 11:51:53', '2024-03-15 11:51:53'),
(43, 10, 33, 44, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-03-15 11:51:53', '2024-03-15 11:51:53'),
(44, 10, 33, 44, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-03-15 11:51:53', '2024-03-15 11:51:53'),
(45, 7, 34, 53, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-15 11:54:21', '2024-03-15 11:54:21'),
(46, 7, 34, 53, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-15 11:54:21', '2024-03-15 11:54:21'),
(47, 7, 37, 56, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-19 09:31:44', '2024-03-19 09:31:44'),
(48, 7, 37, 56, 255, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-19 09:31:44', '2024-03-19 09:31:44'),
(49, 16, 42, 61, 194, 'BEEF NIHARI', 'slow-cooked to perfection in a rich, aromatic gravy infused with a medley of spices like cloves, cinnamon, and cardamom, until the meat is incredibly tender and flavorful', '1708773676.jpg', 380, 0, 0, '2024-03-20 06:28:51', '2024-03-20 06:28:51'),
(50, 16, 42, 61, 195, 'NALLI NIHARI', 'Tender nalli (bone marrow) pieces, slow-cooked in a rich, flavorful gravy infused with aromatic spices like cloves, cardamom, and cinnamon, until the meat falls off the bone', '1708773606.jpg', 450, 0, 0, '2024-03-20 06:28:51', '2024-03-20 06:28:51'),
(51, 7, 43, 62, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-20 06:38:31', '2024-03-20 06:38:31'),
(52, 7, 43, 62, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-20 06:38:31', '2024-03-20 06:38:31'),
(53, 6, 51, 70, 140, 'SUPREME CHICKEN SENSATIONS', 'flavor-packed journey that will elevate your taste experience to new heights.', '1708674882.png', 600, 0, 0, '2024-03-25 17:26:21', '2024-03-25 17:26:21'),
(54, 6, 51, 70, 138, 'CRISPY COOP BURGER', 'Where crispy goodness meets savory satisfaction.', '1708674814.png', 550, 0, 0, '2024-03-25 17:26:21', '2024-03-25 17:26:21'),
(55, 7, 59, 71, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:06:27', '2024-03-26 10:06:27'),
(56, 7, 59, 71, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-26 10:06:27', '2024-03-26 10:06:27'),
(57, 7, 59, 72, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:06:27', '2024-03-26 10:06:27'),
(58, 7, 59, 72, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:06:27', '2024-03-26 10:06:27'),
(59, 7, 60, 74, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:23:14', '2024-03-26 10:23:14'),
(60, 7, 60, 74, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-26 10:23:14', '2024-03-26 10:23:14'),
(61, 7, 60, 75, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:23:14', '2024-03-26 10:23:14'),
(62, 7, 60, 75, 255, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-26 10:23:14', '2024-03-26 10:23:14'),
(63, 7, 61, 77, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:32:38', '2024-03-26 10:32:38'),
(64, 7, 61, 77, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:32:38', '2024-03-26 10:32:38'),
(65, 7, 61, 78, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:32:38', '2024-03-26 10:32:38'),
(66, 7, 61, 78, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-26 10:32:38', '2024-03-26 10:32:38'),
(67, 7, 63, 80, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:47:35', '2024-03-26 10:47:35'),
(68, 7, 63, 80, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:47:35', '2024-03-26 10:47:35'),
(69, 7, 63, 81, 253, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-26 10:47:35', '2024-03-26 10:47:35'),
(70, 7, 63, 81, 254, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-26 10:47:35', '2024-03-26 10:47:35'),
(71, 10, 64, 86, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-28 06:19:39', '2024-03-28 06:19:39'),
(72, 10, 64, 86, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-28 06:19:39', '2024-03-28 06:19:39'),
(73, 10, 64, 86, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-03-28 06:19:39', '2024-03-28 06:19:39'),
(74, 10, 64, 86, 181, 'Golden Garlic Fries', 'Crispy, golden-brown fries seasoned with aromatic garlic, offering a perfect balance of savory flavor and satisfying crunch in every bite, sure to tantalize the taste buds of garlic enthusiasts.', '1708685260.jpg', 150, 0, 0, '2024-03-28 06:19:39', '2024-03-28 06:19:39'),
(75, 5, 65, 89, 133, 'MOUTHWATERING BEEF MEDLEY', 'A symphony of taste in every bite.', '1708674546.jpg', 1350, 50, 0, '2024-03-28 06:54:41', '2024-03-28 06:54:41'),
(76, 5, 65, 89, 128, 'JUICY ANGUS CLASSIC', 'savor the essence of perfection in every bite.', '1708673966.jpg', 890, 0, 0, '2024-03-28 06:54:41', '2024-03-28 06:54:41'),
(77, 16, 66, 90, 228, 'BEEF NIHARI', 'slow-cooked to perfection in a rich, aromatic gravy infused with a medley of spices like cloves, cinnamon, and cardamom, until the meat is incredibly tender and flavorful', '1708773676.jpg', 380, 0, 0, '2024-03-28 06:56:58', '2024-03-28 06:56:58'),
(78, 16, 66, 90, 227, 'NALLI NIHARI', 'Tender nalli (bone marrow) pieces, slow-cooked in a rich, flavorful gravy infused with aromatic spices like cloves, cardamom, and cinnamon, until the meat falls off the bone', '1708773606.jpg', 450, 0, 0, '2024-03-28 06:56:58', '2024-03-28 06:56:58'),
(79, 15, 66, 91, 222, 'ZAFFRAN CHICKEN BIRYANI', 'Aromatic basmati rice layered with tender marinated chicken', '1708773065.jpg', 550, 0, 0, '2024-03-28 06:56:58', '2024-03-28 06:56:58'),
(80, 15, 66, 91, 221, 'HYEDRABADI CHICKEN BIRYANI', 'Aromatic basmati rice layered with tender marinated chicken', '1708772998.jpg', 400, 0, 0, '2024-03-28 06:56:58', '2024-03-28 06:56:58'),
(81, 14, 66, 92, 220, 'PEPSI  350ml', 'PEPSI is a carbonated soft drink known for its caramel color, distinctive flavor, and worldwide popularity.', '1708772957.jpg', 400, 0, 0, '2024-03-28 06:56:58', '2024-03-28 06:56:58'),
(82, 14, 66, 92, 217, 'CHICKEN FAJITA (LARGE)', 'grilled with bell peppers and onions, wrapped in a warm tortilla, topped with creamy guacamole and tangy salsa, creating a flavorful Tex-Mex delight that\'s sure to satisfy any craving.', '1708772810.jpg', 1550, 0, 0, '2024-03-28 06:56:58', '2024-03-28 06:56:58'),
(83, 14, 66, 92, 216, 'CHICKEN FAJITA (MEDIUM)', 'grilled with bell peppers and onions, wrapped in a warm tortilla, topped with creamy guacamole and tangy salsa, creating a flavorful Tex-Mex delight that\'s sure to satisfy any craving.', '1708772759.jpg', 700, 0, 0, '2024-03-28 06:56:58', '2024-03-28 06:56:58'),
(84, 20, 67, 94, 250, 'Teriyaki Tango Pizza (small)', 'Teriyaki Tango Pizza: A mouthwatering fusion of savory teriyaki flavors atop a crispy pizza crust, offering a delightful twist on traditional pizza', '1708939991.jpg', 890, 50, 0, '2024-03-28 07:06:51', '2024-03-28 07:06:51'),
(85, 20, 67, 94, 242, 'BBQ Bird Blast', 'Pizza BBQ Bird Blast: A tantalizing fusion of smoky barbecue flavors and savory toppings, delivering a mouthwatering explosion of taste in every bite.', '1708939515.jpg', 795, 0, 0, '2024-03-28 07:06:51', '2024-03-28 07:06:51'),
(86, 20, 67, 94, 298, 'Pepsi (350 ml)', 'A carbonated soft drink', '1708943732.jpg', 400, 0, 0, '2024-03-28 07:06:51', '2024-03-28 07:06:51'),
(87, 20, 67, 94, 293, 'Coca Cola (350 ml)', 'Coca-Cola Original Taste has the full refreshing flavor you know and love', '1708946613.jpg', 400, 0, 0, '2024-03-28 07:06:51', '2024-03-28 07:06:51'),
(88, 10, 67, 95, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-28 07:06:51', '2024-03-28 07:06:51'),
(89, 10, 67, 95, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-28 07:06:51', '2024-03-28 07:06:51'),
(90, 10, 67, 95, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-03-28 07:06:51', '2024-03-28 07:06:51'),
(91, 10, 67, 95, 181, 'Golden Garlic Fries', 'Crispy, golden-brown fries seasoned with aromatic garlic, offering a perfect balance of savory flavor and satisfying crunch in every bite, sure to tantalize the taste buds of garlic enthusiasts.', '1708685260.jpg', 150, 0, 0, '2024-03-28 07:06:51', '2024-03-28 07:06:51'),
(92, 13, 68, 97, 192, 'FLAVORFUL CHICKEN FUSION', 'crispy goodness meets savory satisfaction.', '1708696460.png', 450, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(93, 13, 68, 97, 191, 'GOLDEN CRISP BURGER', 'Indulge in the perfect combination of juicy goodness and crispy perfection.', '1708696376.png', 550, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(94, 13, 68, 97, 190, 'ZESTY CHICKEN BURGER', 'A crunchy sensation that\'ll make your taste buds dance', '1708695483.png', 400, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(95, 11, 68, 98, 194, 'PEPSI (350 ML)', 'a carbonated soft drink.', '1708696997.jpg', 450, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(96, 11, 68, 98, 189, 'MIGHTY BEEF BURGER', 'A powerhouse of flavor and spice.', '1708695100.jpg', 850, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(97, 11, 68, 98, 187, 'BOLD BEEF BUSTER', 'sure to satisfy your cravings and leave you wanting more, every time.', '1708695010.jpg', 800, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(98, 4, 68, 101, 126, 'INFERNO ZINGER TWIST', 'Inferno Zinger Twist.', '1708673775.jpg', 1200, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(99, 4, 68, 101, 125, 'MIGHTY ZINGER', 'Juicy chicken breast, coated in fiery spices, nestled in a soft bun', '1708673610.jpg', 1000, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(100, 12, 68, 103, 185, 'TANGO BLAZE ZINGER', 'Fiery feast that ignites your taste buds.', '1708694595.jpg', 650, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(101, 12, 68, 103, 184, 'CHEESE ZINGER', 'Try our cheesey sensation today!', '1708694451.jpg', 600, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(102, 34, 68, 104, 314, 'Garlic Butter Beef Steak', 'Indulge in our juicy Beef steak, grilled to perfection and bursting with savory flavors in every tender bite.', '1708952674.jpg', 1000, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(103, 34, 68, 104, 319, 'Coca Cola 350 ml', 'Coca-Cola: the iconic, bubbly beverage loved worldwide for its sweet and refreshing taste.', '1708953136.jpg', 450, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(104, 8, 68, 106, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(105, 8, 68, 106, 148, 'Chicken Supreme Pizza', 'A delectable pizza featuring tender chicken, savory bacon, flavorful mushrooms, and creamy mozzarella cheese on a crispy crust.', '1708675578.jpg', 899, 100, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(106, 8, 68, 106, 179, 'Coca cola 500 ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', '1708685021.jpg', 90, 0, 0, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(107, 12, 69, 108, 185, 'TANGO BLAZE ZINGER', 'Fiery feast that ignites your taste buds.', '1708694595.jpg', 650, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(108, 12, 69, 108, 184, 'CHEESE ZINGER', 'Try our cheesey sensation today!', '1708694451.jpg', 600, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(109, 11, 69, 109, 194, 'PEPSI (350 ML)', 'a carbonated soft drink.', '1708696997.jpg', 450, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(110, 11, 69, 109, 189, 'MIGHTY BEEF BURGER', 'A powerhouse of flavor and spice.', '1708695100.jpg', 850, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(111, 11, 69, 109, 187, 'BOLD BEEF BUSTER', 'sure to satisfy your cravings and leave you wanting more, every time.', '1708695010.jpg', 800, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(112, 31, 69, 111, 254, 'Spicy Blaze Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708940373.jpg', 750, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(113, 31, 69, 111, 257, 'Flaming Zest Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708940528.jpg', 780, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(114, 31, 69, 111, 264, 'BlazeBite Zinger Buger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708941265.jpg', 800, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(115, 31, 69, 111, 286, 'Coca Cola 350 ml', 'Coca-Cola, the iconic fizzy beverage, delights with its refreshing blend of caramel sweetness and effervescence, sparking moments of happiness with every sip.', '1708942861.jpg', 450, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(116, 32, 69, 113, 316, 'ZestyRoll', 'Bursting with bold flavors and a tantalizing zest, this roll offers a mouthwatering combination of savory ingredients wrapped in a soft, doughy embrace.', '1708952929.jpg', 450, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(117, 32, 69, 113, 314, 'Garlic Butter Beef Steak', 'Indulge in our juicy Beef steak, grilled to perfection and bursting with savory flavors in every tender bite.', '1708952674.jpg', 1000, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(118, 34, 69, 114, 314, 'Garlic Butter Beef Steak', 'Indulge in our juicy Beef steak, grilled to perfection and bursting with savory flavors in every tender bite.', '1708952674.jpg', 1000, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(119, 34, 69, 114, 319, 'Coca Cola 350 ml', 'Coca-Cola: the iconic, bubbly beverage loved worldwide for its sweet and refreshing taste.', '1708953136.jpg', 450, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(120, 19, 69, 116, 246, 'Poultry Perfection Pie', 'Indulge in a Poultry Perfection Pie – a savory pizza topped with a delightful medley of chicken and poultry goodness', '1708939871.jpg', 1099, 0, 0, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(121, 19, 69, 116, 243, 'Cheeky Chicken Chorizo', 'Indulge in a tantalizing twist with our Cheeky Chicken Chorizo pizza, bursting with savory chicken, spicy chorizo, and a medley of mouthwatering flavors', '1708939746.jpg', 1650, 500, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(122, 19, 69, 116, 293, 'Coca Cola (350 ml)', 'Coca-Cola Original Taste has the full refreshing flavor you know and love', '1708946613.jpg', 400, 0, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(123, 19, 69, 116, 298, 'Pepsi (350 ml)', 'A carbonated soft drink', '1708943732.jpg', 400, 0, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(124, 17, 69, 117, 243, 'Cheeky Chicken Chorizo', 'Indulge in a tantalizing twist with our Cheeky Chicken Chorizo pizza, bursting with savory chicken, spicy chorizo, and a medley of mouthwatering flavors', '1708939746.jpg', 1650, 500, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(125, 17, 69, 117, 246, 'Poultry Perfection Pie', 'Indulge in a Poultry Perfection Pie – a savory pizza topped with a delightful medley of chicken and poultry goodness', '1708939871.jpg', 1099, 0, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(126, 17, 69, 117, 298, 'Pepsi (350 ml)', 'A carbonated soft drink', '1708943732.jpg', 400, 0, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(127, 17, 69, 117, 293, 'Coca Cola (350 ml)', 'Coca-Cola Original Taste has the full refreshing flavor you know and love', '1708946613.jpg', 400, 0, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(128, 30, 69, 118, 303, 'Grand Slamwich', 'Savor our club sandwich, stacked high with layers of succulent meats, crisp lettuce, juicy tomatoes, and creamy spreads, all nestled between toasted bread for a satisfying bite.', '1708945621.jpg', 490, 0, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(129, 30, 69, 118, 282, 'Heatwave Zinger Burger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708942515.jpg', 750, 0, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(130, 30, 69, 118, 264, 'BlazeBite Zinger Buger', 'Satisfy your craving with our zinger burger - a tantalizing combination of crispy, spicy chicken, nestled between soft buns, topped with fresh lettuce, juicy tomatoes, and zesty mayo, delivering a burst of flavor in every bite.', '1708941265.jpg', 800, 0, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(131, 5, 69, 119, 129, 'BEEFY BLISS BOMB', 'a taste sensation that will leave you craving more.', '1708674068.jpg', 750, 0, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(132, 5, 69, 119, 133, 'MOUTHWATERING BEEF MEDLEY', 'A symphony of taste in every bite.', '1708674546.jpg', 1350, 50, 0, '2024-03-28 09:34:14', '2024-03-28 09:34:14'),
(133, 13, 70, 126, 192, 'FLAVORFUL CHICKEN FUSION', 'crispy goodness meets savory satisfaction.', '1708696460.png', 450, 0, 0, '2024-03-29 06:56:02', '2024-03-29 06:56:02'),
(134, 13, 70, 126, 191, 'GOLDEN CRISP BURGER', 'Indulge in the perfect combination of juicy goodness and crispy perfection.', '1708696376.png', 550, 0, 0, '2024-03-29 06:56:02', '2024-03-29 06:56:02'),
(135, 13, 70, 126, 190, 'ZESTY CHICKEN BURGER', 'A crunchy sensation that\'ll make your taste buds dance', '1708695483.png', 400, 0, 0, '2024-03-29 06:56:03', '2024-03-29 06:56:03'),
(136, 8, 71, 127, 148, 'Chicken Supreme Pizza', 'A delectable pizza featuring tender chicken, savory bacon, flavorful mushrooms, and creamy mozzarella cheese on a crispy crust.', '1708675578.jpg', 899, 100, 0, '2024-03-29 07:11:27', '2024-03-29 07:11:27'),
(137, 8, 71, 127, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-29 07:11:27', '2024-03-29 07:11:27'),
(138, 8, 71, 127, 179, 'Coca cola 500 ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', '1708685021.jpg', 90, 0, 0, '2024-03-29 07:11:27', '2024-03-29 07:11:27'),
(139, 7, 71, 128, 162, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-03-29 07:11:27', '2024-03-29 07:11:27'),
(140, 7, 71, 128, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-29 07:11:27', '2024-03-29 07:11:27'),
(141, 16, 73, 133, 227, 'NALLI NIHARI', 'Tender nalli (bone marrow) pieces, slow-cooked in a rich, flavorful gravy infused with aromatic spices like cloves, cardamom, and cinnamon, until the meat falls off the bone', '1708773606.jpg', 450, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(142, 16, 73, 133, 228, 'BEEF NIHARI', 'slow-cooked to perfection in a rich, aromatic gravy infused with a medley of spices like cloves, cinnamon, and cardamom, until the meat is incredibly tender and flavorful', '1708773676.jpg', 380, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(143, 5, 73, 134, 129, 'BEEFY BLISS BOMB', 'a taste sensation that will leave you craving more.', '1708674068.jpg', 750, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(144, 5, 73, 134, 128, 'JUICY ANGUS CLASSIC', 'savor the essence of perfection in every bite.', '1708673966.jpg', 890, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(145, 4, 73, 135, 126, 'INFERNO ZINGER TWIST', 'Inferno Zinger Twist.', '1708673775.jpg', 1200, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(146, 4, 73, 135, 126, 'INFERNO ZINGER TWIST', 'Inferno Zinger Twist.', '1708673775.jpg', 1200, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(147, 10, 73, 136, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(148, 10, 73, 136, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(149, 10, 73, 136, 181, 'Golden Garlic Fries', 'Crispy, golden-brown fries seasoned with aromatic garlic, offering a perfect balance of savory flavor and satisfying crunch in every bite, sure to tantalize the taste buds of garlic enthusiasts.', '1708685260.jpg', 150, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(150, 10, 73, 136, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(151, 34, 73, 137, 314, 'Garlic Butter Beef Steak', 'Indulge in our juicy Beef steak, grilled to perfection and bursting with savory flavors in every tender bite.', '1708952674.jpg', 1000, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(152, 34, 73, 137, 319, 'Coca Cola 350 ml', 'Coca-Cola: the iconic, bubbly beverage loved worldwide for its sweet and refreshing taste.', '1708953136.jpg', 450, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(153, 17, 73, 139, 246, 'Poultry Perfection Pie', 'Indulge in a Poultry Perfection Pie – a savory pizza topped with a delightful medley of chicken and poultry goodness', '1708939871.jpg', 1099, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(154, 17, 73, 139, 243, 'Cheeky Chicken Chorizo', 'Indulge in a tantalizing twist with our Cheeky Chicken Chorizo pizza, bursting with savory chicken, spicy chorizo, and a medley of mouthwatering flavors', '1708939746.jpg', 1650, 500, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(155, 17, 73, 139, 293, 'Coca Cola (350 ml)', 'Coca-Cola Original Taste has the full refreshing flavor you know and love', '1708946613.jpg', 400, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(156, 17, 73, 139, 298, 'Pepsi (350 ml)', 'A carbonated soft drink', '1708943732.jpg', 400, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(157, 4, 73, 140, 126, 'INFERNO ZINGER TWIST', 'Inferno Zinger Twist.', '1708673775.jpg', 1200, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(158, 4, 73, 140, 125, 'MIGHTY ZINGER', 'Juicy chicken breast, coated in fiery spices, nestled in a soft bun', '1708673610.jpg', 1000, 0, 0, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(159, 11, 74, 142, 194, 'PEPSI (350 ML)', 'a carbonated soft drink.', '1708696997.jpg', 450, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(160, 11, 74, 142, 189, 'MIGHTY BEEF BURGER', 'A powerhouse of flavor and spice.', '1708695100.jpg', 850, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(161, 11, 74, 142, 187, 'BOLD BEEF BUSTER', 'sure to satisfy your cravings and leave you wanting more, every time.', '1708695010.jpg', 800, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(162, 7, 74, 143, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(163, 7, 74, 143, 162, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(164, 8, 74, 144, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(165, 8, 74, 144, 148, 'Chicken Supreme Pizza', 'A delectable pizza featuring tender chicken, savory bacon, flavorful mushrooms, and creamy mozzarella cheese on a crispy crust.', '1708675578.jpg', 899, 100, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(166, 8, 74, 144, 179, 'Coca cola 500 ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', '1708685021.jpg', 90, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(167, 7, 74, 145, 162, 'Tikka Twist Pizza', 'Experience a flavorful fusion with our Tikka Twist Pizza, blending traditional Indian tikka spices with classic pizza ingredients for a unique taste sensation.', '1708682047.jpg', 1099, 100, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(168, 7, 74, 145, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(169, 5, 74, 146, 133, 'MOUTHWATERING BEEF MEDLEY', 'A symphony of taste in every bite.', '1708674546.jpg', 1350, 50, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(170, 5, 74, 146, 129, 'BEEFY BLISS BOMB', 'a taste sensation that will leave you craving more.', '1708674068.jpg', 750, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(171, 9, 74, 148, 158, 'ROAST BEEF REVEAL', 'Juicy roast beef nestled between layers of fresh bread, a true delight for your taste buds.', '1708681802.jpg', 650, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(172, 9, 74, 148, 155, 'CHICKEN CHEESE SANDWHICH', 'Tender grilled chicken layered with melted cheese.', '1708681686.jpg', 600, 0, 0, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(173, 6, 75, 149, 140, 'SUPREME CHICKEN SENSATIONS', 'flavor-packed journey that will elevate your taste experience to new heights.', '1708674882.png', 600, 0, 0, '2024-04-02 11:06:38', '2024-04-02 11:06:38'),
(174, 6, 75, 149, 138, 'CRISPY COOP BURGER', 'Where crispy goodness meets savory satisfaction.', '1708674814.png', 550, 0, 0, '2024-04-02 11:06:38', '2024-04-02 11:06:38'),
(175, 8, 75, 151, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-04-02 11:06:38', '2024-04-02 11:06:38'),
(176, 8, 75, 151, 148, 'Chicken Supreme Pizza', 'A delectable pizza featuring tender chicken, savory bacon, flavorful mushrooms, and creamy mozzarella cheese on a crispy crust.', '1708675578.jpg', 899, 100, 0, '2024-04-02 11:06:38', '2024-04-02 11:06:38'),
(177, 8, 75, 151, 180, 'Pepsi  500ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', '1708685114.jpg', 100, 0, 0, '2024-04-02 11:06:38', '2024-04-02 11:06:38'),
(178, 8, 76, 153, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-04-02 11:16:46', '2024-04-02 11:16:46'),
(179, 8, 76, 153, 148, 'Chicken Supreme Pizza', 'A delectable pizza featuring tender chicken, savory bacon, flavorful mushrooms, and creamy mozzarella cheese on a crispy crust.', '1708675578.jpg', 899, 100, 0, '2024-04-02 11:16:50', '2024-04-02 11:16:50'),
(180, 8, 76, 153, 180, 'Pepsi  500ml', 'A carbonated soft drink renowned for its distinctive caramel flavor, refreshing effervescence, and iconic red branding, enjoyed by millions worldwide since its inception in 1886.', '1708685114.jpg', 100, 0, 0, '2024-04-02 11:16:50', '2024-04-02 11:16:50'),
(181, 10, 78, 162, 152, 'Tandoori Chicken Tikka Pizza', '\"Delicious Tandoori Chicken Tikka Pizza featuring juicy marinated chicken pieces, fragrant spices, and gooey cheese on a crispy crust.\"', '1708681559.jpg', 599, 0, 0, '2024-04-09 10:59:47', '2024-04-09 10:59:47'),
(182, 10, 78, 162, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-04-09 10:59:47', '2024-04-09 10:59:47'),
(183, 10, 78, 162, 181, 'Golden Garlic Fries', 'Crispy, golden-brown fries seasoned with aromatic garlic, offering a perfect balance of savory flavor and satisfying crunch in every bite, sure to tantalize the taste buds of garlic enthusiasts.', '1708685260.jpg', 150, 0, 0, '2024-04-09 10:59:47', '2024-04-09 10:59:47'),
(184, 10, 78, 162, 181, 'Golden Garlic Fries', 'Crispy, golden-brown fries seasoned with aromatic garlic, offering a perfect balance of savory flavor and satisfying crunch in every bite, sure to tantalize the taste buds of garlic enthusiasts.', '1708685260.jpg', 150, 0, 0, '2024-04-09 10:59:47', '2024-04-09 10:59:47'),
(185, 10, 78, 163, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-04-09 10:59:47', '2024-04-09 10:59:47'),
(186, 10, 78, 163, 157, 'Spicy Tikka Masala Pizza', 'A tantalizing fusion of Indian spices and Italian pizza, featuring fiery tikka masala sauce and a medley of vibrant toppings.', '1708681789.jpg', 775, 0, 0, '2024-04-09 10:59:47', '2024-04-09 10:59:47'),
(187, 10, 78, 163, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-04-09 10:59:47', '2024-04-09 10:59:47'),
(188, 10, 78, 163, 182, 'Pizza Fries', 'Crispy fries topped with gooey melted cheese, savory marinara sauce, and pepperoni slices, offering a delectable fusion of pizza flavors in each bite, perfect for indulgent snacking or sharing with friends.', '1708685349.jpg', 250, 0, 0, '2024-04-09 10:59:47', '2024-04-09 10:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_master_id` int DEFAULT NULL,
  `sub_total` decimal(8,2) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `item_price` decimal(7,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deal` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_master_id`, `sub_total`, `qty`, `item_id`, `item_name`, `main_image`, `item_price`, `created_at`, `updated_at`, `is_deal`) VALUES
(1, 1, 899.00, 1, 174, 'Fiery Tikka Blaze Pizza', '1708683939.jpg', 899.00, '2024-02-23 10:31:54', '2024-02-23 10:31:54', 0),
(2, 2, 2600.00, 2, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-02-23 13:54:48', '2024-02-23 13:54:48', 1),
(3, 3, 600.00, 4, 181, 'Golden Garlic Fries', '1708685260.jpg', 150.00, '2024-02-23 13:55:30', '2024-02-23 13:55:30', 0),
(4, 4, 1300.00, 2, 212, 'CHICKEN TIKKA (MEDIUM)', '1708772582.jpg', 650.00, '2024-02-26 10:08:39', '2024-02-26 10:08:39', 0),
(5, 5, 1400.00, 1, 14, 'HERITAGE COMBO', '1708774804.jpg', 1400.00, '2024-02-26 12:18:22', '2024-02-26 12:18:22', 1),
(6, 6, 2100.00, 3, 313, 'Grilled Chicken Supreme', '1708947568.jpg', 700.00, '2024-02-27 12:29:00', '2024-02-27 12:29:00', 0),
(7, 7, 2400.00, 2, 32, 'Heaven Deal', '1708954757.jpg', 1200.00, '2024-02-27 12:38:52', '2024-02-27 12:38:52', 1),
(8, 8, 6000.00, 5, 29, 'Family Burger Deal', '1708954231.jpg', 1200.00, '2024-02-27 12:46:32', '2024-02-27 12:46:32', 1),
(9, 9, 3600.00, 3, 29, 'Family Burger Deal', '1708954231.jpg', 1200.00, '2024-02-27 12:52:20', '2024-02-27 12:52:20', 1),
(10, 10, 3000.00, 4, 254, 'Spicy Blaze Burger', '1708940373.jpg', 750.00, '2024-03-01 10:22:24', '2024-03-01 10:22:24', 0),
(11, 11, 1500.00, 2, 254, 'Spicy Blaze Burger', '1708940373.jpg', 750.00, '2024-03-01 11:15:02', '2024-03-01 11:15:02', 0),
(12, 11, 1200.00, 1, 29, 'Family Burger Deal', '1708954231.jpg', 1200.00, '2024-03-01 11:15:02', '2024-03-01 11:15:02', 1),
(13, 12, 1500.00, 2, 254, 'Spicy Blaze Burger', '1708940373.jpg', 750.00, '2024-03-01 12:13:53', '2024-03-01 12:13:53', 0),
(14, 12, 2400.00, 2, 29, 'Family Burger Deal', '1708954231.jpg', 1200.00, '2024-03-01 12:13:53', '2024-03-01 12:13:53', 1),
(15, 13, 500.00, 2, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-07 07:22:15', '2024-03-07 07:22:15', 0),
(16, 14, 650.00, 1, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-07 07:25:41', '2024-03-07 07:25:41', 0),
(17, 15, 650.00, 1, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-10 08:53:18', '2024-03-10 08:53:18', 0),
(18, 15, 1400.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-10 08:53:18', '2024-03-10 08:53:18', 1),
(19, 16, 600.00, 1, 208, 'Swiss cheese', '1708766055.jpg', 600.00, '2024-03-11 07:38:41', '2024-03-11 07:38:41', 0),
(20, 17, 1200.00, 1, 8, 'Chick-a-Licious Pizza Offer', '1708685337.jpg', 1100.00, '2024-03-12 08:02:49', '2024-03-12 08:02:49', 1),
(21, 18, 1200.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-12 08:04:17', '2024-03-12 08:04:17', 1),
(22, 19, 900.00, 2, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-12 09:00:16', '2024-03-12 09:00:16', 0),
(23, 19, 1300.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-12 09:00:16', '2024-03-12 09:00:16', 1),
(24, 20, 1800.00, 1, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-03-13 06:08:26', '2024-03-13 06:08:26', 1),
(25, 20, 450.00, 1, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-13 06:08:26', '2024-03-13 06:08:26', 0),
(26, 20, 350.00, 1, 169, 'SAVORY HERB ROLLS', '1708682878.jpg', 350.00, '2024-03-13 06:08:26', '2024-03-13 06:08:26', 0),
(27, 21, 1200.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-13 06:27:45', '2024-03-13 06:27:45', 1),
(28, 21, 450.00, 1, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-13 06:27:45', '2024-03-13 06:27:45', 0),
(29, 22, 1600.00, 1, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-03-13 11:10:48', '2024-03-13 11:10:48', 1),
(30, 23, 500.00, 2, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-13 11:23:54', '2024-03-13 11:23:54', 0),
(31, 24, 1200.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-14 10:02:16', '2024-03-14 10:02:16', 1),
(32, 25, 700.00, 2, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-14 10:02:42', '2024-03-14 10:02:42', 0),
(33, 26, 750.00, 5, 181, 'Golden Garlic Fries', '1708685260.jpg', 150.00, '2024-03-14 10:03:04', '2024-03-14 10:03:04', 0),
(34, 27, 649.00, 1, 176, 'Chicken Caesar Pizza', '1708684313.jpg', 649.00, '2024-03-14 10:03:27', '2024-03-14 10:03:27', 0),
(35, 28, 649.00, 1, 168, 'Tikka Ranch Pizza', '1708682615.jpg', 649.00, '2024-03-14 10:03:45', '2024-03-14 10:03:45', 0),
(36, 29, 1200.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-14 11:07:28', '2024-03-14 11:07:28', 1),
(37, 30, 2200.00, 2, 8, 'Chick-a-Licious Pizza Offer', '1708685337.jpg', 1100.00, '2024-03-14 11:12:54', '2024-03-14 11:12:54', 1),
(38, 31, 1400.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-14 11:50:54', '2024-03-14 11:50:54', 1),
(39, 32, 750.00, 5, 181, 'Golden Garlic Fries', '1708685260.jpg', 150.00, '2024-03-14 11:51:29', '2024-03-14 11:51:29', 0),
(40, 33, 300.00, 2, 181, 'Golden Garlic Fries', '1708685260.jpg', 150.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(41, 33, 250.00, 1, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(42, 33, 899.00, 1, 148, 'Chicken Supreme Pizza', '1708675578.jpg', 899.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(43, 33, 450.00, 1, 178, 'Coca cola 350 ml', '1708684819.jpg', 450.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(44, 33, 2800.00, 2, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 1),
(45, 33, 10232.00, 8, 132, 'Chicken Tikka', '1708674375.jpg', 1279.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(46, 33, 700.00, 2, 272, 'Pepsi (350 ML)', '1708941672.jpg', 350.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(47, 33, 1300.00, 1, 134, 'Chicken Fajita', '1708674566.jpg', 1300.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(48, 33, 2100.00, 3, 306, 'Ghee (1kg)', '1708946369.jpg', 700.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(49, 33, 400.00, 1, 193, 'COCA COLA (350 ML)', '1708696853.jpg', 400.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(50, 33, 100.00, 1, 195, 'Fries', '1708697021.jpg', 100.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(51, 33, 470.00, 1, 166, 'GOLDEN CRUST ROLLS', '1708682560.jpg', 470.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(52, 33, 640.00, 2, 281, 'Hyderabadi Chicken Biryani', '1708942507.jpg', 320.00, '2024-03-15 11:51:53', '2024-03-15 11:51:53', 0),
(53, 34, 1400.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-15 11:54:21', '2024-03-15 11:54:21', 1),
(54, 35, 1350.00, 3, 210, 'CHICKEN TIKKA (SMALL)', '1708772529.jpg', 450.00, '2024-03-15 11:58:24', '2024-03-15 11:58:24', 0),
(55, 36, 700.00, 2, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-19 09:31:16', '2024-03-19 09:31:16', 0),
(56, 37, 1200.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-19 09:31:44', '2024-03-19 09:31:44', 1),
(57, 38, 900.00, 3, 167, 'Everything Bagel', '1708682597.jpg', 300.00, '2024-03-19 09:32:23', '2024-03-19 09:32:23', 0),
(58, 39, 900.00, 2, 172, 'Unsalted Butter( 200g)', '1708683586.jpg', 450.00, '2024-03-19 09:33:04', '2024-03-19 09:33:04', 0),
(59, 40, 800.00, 2, 209, 'Unsalted Butter( 200g)', '1708772354.jpg', 400.00, '2024-03-19 09:35:55', '2024-03-19 09:35:55', 0),
(60, 41, 1050.00, 3, 169, 'SAVORY HERB ROLLS', '1708682878.jpg', 350.00, '2024-03-19 11:28:39', '2024-03-19 11:28:39', 0),
(61, 42, 1400.00, 2, 16, 'NIHARI NIGHT SPECIAL', '1708775253.jpg', 700.00, '2024-03-20 06:28:51', '2024-03-20 06:28:51', 1),
(62, 43, 1300.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-20 06:38:31', '2024-03-20 06:38:31', 1),
(63, 44, 780.00, 3, 229, 'Apple (1kg)', '1708932530.jpg', 260.00, '2024-03-20 06:52:58', '2024-03-20 06:52:58', 0),
(64, 45, 780.00, 3, 229, 'Apple (1kg)', '1708932530.jpg', 260.00, '2024-03-20 07:00:01', '2024-03-20 07:00:01', 0),
(65, 46, 1350.00, 3, 210, 'CHICKEN TIKKA (SMALL)', '1708772529.jpg', 450.00, '2024-03-20 07:10:36', '2024-03-20 07:10:36', 0),
(66, 47, 900.00, 3, 160, 'PEANUT BUTTER SANDWHICH', '1708681894.jpg', 300.00, '2024-03-20 07:36:02', '2024-03-20 07:36:02', 0),
(67, 48, 900.00, 2, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-20 07:37:18', '2024-03-20 07:37:18', 0),
(68, 49, 900.00, 3, 167, 'Everything Bagel', '1708682597.jpg', 300.00, '2024-03-20 08:05:33', '2024-03-20 08:05:33', 0),
(69, 50, 950.00, 3, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-20 08:07:02', '2024-03-20 08:07:02', 0),
(70, 51, 1000.00, 1, 6, 'VALUE MEAL OFFER', '1708684217.jpg', 1000.00, '2024-03-25 17:26:21', '2024-03-25 17:26:21', 1),
(71, 59, 1300.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-26 10:06:27', '2024-03-26 10:06:27', 1),
(72, 59, 2800.00, 2, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-26 10:06:27', '2024-03-26 10:06:27', 1),
(73, 60, 500.00, 2, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-26 10:23:14', '2024-03-26 10:23:14', 0),
(74, 60, 2600.00, 2, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-26 10:23:14', '2024-03-26 10:23:14', 1),
(75, 60, 1300.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-26 10:23:14', '2024-03-26 10:23:14', 1),
(76, 61, 250.00, 1, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-26 10:32:38', '2024-03-26 10:32:38', 0),
(77, 61, 4200.00, 3, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-26 10:32:38', '2024-03-26 10:32:38', 1),
(78, 61, 3900.00, 3, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-26 10:32:38', '2024-03-26 10:32:38', 1),
(79, 62, 750.00, 3, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-26 10:45:43', '2024-03-26 10:45:43', 0),
(80, 63, 1400.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-26 10:47:35', '2024-03-26 10:47:35', 1),
(81, 63, 1300.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-26 10:47:35', '2024-03-26 10:47:35', 1),
(82, 64, 1250.00, 5, 163, 'Sesame Bagel', '1708682298.jpg', 250.00, '2024-03-28 06:19:39', '2024-03-28 06:19:39', 0),
(83, 64, 600.00, 2, 287, 'Apple (1kg)', '1708942908.jpg', 300.00, '2024-03-28 06:19:39', '2024-03-28 06:19:39', 0),
(84, 64, 300.00, 2, 291, 'Water Melon (1kg)', '1708943116.jpg', 150.00, '2024-03-28 06:19:39', '2024-03-28 06:19:39', 0),
(85, 64, 3000.00, 2, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-03-28 06:19:39', '2024-03-28 06:19:39', 1),
(86, 64, 2800.00, 2, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-03-28 06:19:39', '2024-03-28 06:19:39', 1),
(87, 65, 900.00, 2, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-03-28 06:54:41', '2024-03-28 06:54:41', 0),
(88, 65, 1099.00, 1, 162, 'Tikka Twist Pizza', '1708682047.jpg', 1099.00, '2024-03-28 06:54:41', '2024-03-28 06:54:41', 0),
(89, 65, 3000.00, 2, 5, 'FAMILY FUN BUNDLE', '1708684069.jpg', 1500.00, '2024-03-28 06:54:41', '2024-03-28 06:54:41', 1),
(90, 66, 1400.00, 2, 16, 'NIHARI NIGHT SPECIAL', '1708775253.jpg', 700.00, '2024-03-28 06:56:58', '2024-03-28 06:56:58', 1),
(91, 66, 1600.00, 2, 15, 'BIRYANI DELIGHT DAYS', '1708775081.jpg', 800.00, '2024-03-28 06:56:58', '2024-03-28 06:56:58', 1),
(92, 66, 2300.00, 1, 14, 'HERITAGE COMBO', '1708774804.jpg', 2300.00, '2024-03-28 06:56:58', '2024-03-28 06:56:58', 1),
(93, 66, 1000.00, 2, 215, 'CHICKEN FAJITA (SMALL)', '1708772724.jpg', 500.00, '2024-03-28 06:56:58', '2024-03-28 06:56:58', 0),
(94, 67, 2400.00, 2, 20, 'Pizza Palooza', '1708952519.jpg', 1200.00, '2024-03-28 07:06:51', '2024-03-28 07:06:51', 1),
(95, 67, 1400.00, 1, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-03-28 07:06:51', '2024-03-28 07:06:51', 1),
(96, 68, 900.00, 3, 160, 'PEANUT BUTTER SANDWHICH', '1708681894.jpg', 300.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 0),
(97, 68, 1200.00, 1, 13, 'FAMILY DEAL', '1708774580.png', 1200.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 1),
(98, 68, 3600.00, 2, 11, 'ROYAL DEAL', '1708774188.jpg', 1800.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 1),
(99, 68, 960.00, 3, 281, 'Hyderabadi Chicken Biryani', '1708942507.jpg', 320.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 0),
(100, 68, 1298.00, 2, 260, 'Classic Cowboy', '1708940749.jpg', 649.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 0),
(101, 68, 1800.00, 1, 4, 'HAPPY HOUR HAPPINESS', '1708683895.jpg', 1800.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 1),
(102, 68, 470.00, 1, 166, 'GOLDEN CRUST ROLLS', '1708682560.jpg', 470.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 0),
(103, 68, 1150.00, 1, 12, 'TASTE SENSATION DEAL', '1708774376.jpg', 1150.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 1),
(104, 68, 2400.00, 2, 34, 'Meat lover Feast', '1708955887.jpg', 1200.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 1),
(105, 68, 1600.00, 1, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 1),
(106, 68, 2200.00, 2, 8, 'Chick-a-Licious Pizza Offer', '1708685337.jpg', 1100.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 1),
(107, 68, 600.00, 2, 167, 'Everything Bagel', '1708682597.jpg', 300.00, '2024-03-28 08:49:14', '2024-03-28 08:49:14', 0),
(108, 69, 2300.00, 2, 12, 'TASTE SENSATION DEAL', '1708774376.jpg', 1150.00, '2024-03-28 09:34:13', '2024-03-28 09:34:13', 1),
(109, 69, 1800.00, 1, 11, 'ROYAL DEAL', '1708774188.jpg', 1800.00, '2024-03-28 09:34:13', '2024-03-28 09:34:13', 1),
(110, 69, 250.00, 1, 196, 'Pizza Fries', '1708697100.jpg', 250.00, '2024-03-28 09:34:13', '2024-03-28 09:34:13', 0),
(111, 69, 2200.00, 1, 31, 'Happy Hour', '1708954561.jpg', 2200.00, '2024-03-28 09:34:13', '2024-03-28 09:34:13', 1),
(112, 69, 1560.00, 2, 284, 'Flame-Kissed Zinger', '1708942717.jpg', 780.00, '2024-03-28 09:34:13', '2024-03-28 09:34:13', 0),
(113, 69, 1200.00, 1, 32, 'Heaven Deal', '1708954757.jpg', 1200.00, '2024-03-28 09:34:13', '2024-03-28 09:34:13', 1),
(114, 69, 1200.00, 1, 34, 'Meat lover Feast', '1708955887.jpg', 1200.00, '2024-03-28 09:34:13', '2024-03-28 09:34:13', 1),
(115, 69, 700.00, 1, 313, 'Grilled Chicken Supreme', '1708947568.jpg', 700.00, '2024-03-28 09:34:13', '2024-03-28 09:34:13', 0),
(116, 69, 2800.00, 2, 19, 'Dough Dazzlers', '1708948014.jpg', 1400.00, '2024-03-28 09:34:13', '2024-03-28 09:34:13', 1),
(117, 69, 1400.00, 1, 17, 'Dough Dazzlers', '1708948014.jpg', 1400.00, '2024-03-28 09:34:14', '2024-03-28 09:34:14', 1),
(118, 69, 1700.00, 1, 30, 'Zinger Combo', '1708954396.jpg', 1700.00, '2024-03-28 09:34:14', '2024-03-28 09:34:14', 1),
(119, 69, 1500.00, 1, 5, 'FAMILY FUN BUNDLE', '1708684069.jpg', 1500.00, '2024-03-28 09:34:14', '2024-03-28 09:34:14', 1),
(120, 69, 800.00, 2, 252, 'Jalapeno Bagel', '1708940191.jpg', 400.00, '2024-03-28 09:34:14', '2024-03-28 09:34:14', 0),
(121, 69, 1560.00, 2, 322, 'Butter 1kg', '1708954813.jpg', 780.00, '2024-03-28 09:34:14', '2024-03-28 09:34:14', 0),
(122, 69, 700.00, 2, 219, 'CHICKEN BIRYANI', '1708772917.jpg', 350.00, '2024-03-28 09:34:14', '2024-03-28 09:34:14', 0),
(123, 69, 1400.00, 2, 310, 'Chicken Steak', '1708947037.jpg', 700.00, '2024-03-28 09:34:14', '2024-03-28 09:34:14', 0),
(124, 70, 450.00, 3, 331, 'Banana ( 1 dozen)', '1709013017.jpg', 150.00, '2024-03-29 06:56:02', '2024-03-29 06:56:02', 0),
(125, 70, 1950.00, 3, 158, 'ROAST BEEF REVEAL', '1708681802.jpg', 650.00, '2024-03-29 06:56:02', '2024-03-29 06:56:02', 0),
(126, 70, 1200.00, 1, 13, 'FAMILY DEAL', '1708774580.png', 1200.00, '2024-03-29 06:56:02', '2024-03-29 06:56:02', 1),
(127, 71, 2200.00, 2, 8, 'Chick-a-Licious Pizza Offer', '1708685337.jpg', 1100.00, '2024-03-29 07:11:27', '2024-03-29 07:11:27', 1),
(128, 71, 1200.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-03-29 07:11:27', '2024-03-29 07:11:27', 1),
(129, 72, 300.00, 1, 287, 'Apple (1kg)', '1708942908.jpg', 300.00, '2024-03-29 07:12:49', '2024-03-29 07:12:49', 0),
(130, 72, 350.00, 1, 290, 'Orange (1kg)', '1708943009.jpg', 350.00, '2024-03-29 07:12:49', '2024-03-29 07:12:49', 0),
(131, 72, 150.00, 1, 291, 'Water Melon (1kg)', '1708943116.jpg', 150.00, '2024-03-29 07:12:49', '2024-03-29 07:12:49', 0),
(132, 72, 200.00, 1, 292, 'Banana ( 1 dozen)', '1708943197.jpg', 200.00, '2024-03-29 07:12:49', '2024-03-29 07:12:49', 0),
(133, 73, 700.00, 1, 16, 'NIHARI NIGHT SPECIAL', '1708775253.jpg', 700.00, '2024-03-29 09:26:44', '2024-03-29 09:26:44', 1),
(134, 73, 1500.00, 1, 5, 'FAMILY FUN BUNDLE', '1708684069.jpg', 1500.00, '2024-03-29 09:26:44', '2024-03-29 09:26:44', 1),
(135, 73, 1800.00, 1, 4, 'HAPPY HOUR HAPPINESS', '1708683895.jpg', 1800.00, '2024-03-29 09:26:44', '2024-03-29 09:26:44', 1),
(136, 73, 1400.00, 1, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-03-29 09:26:44', '2024-03-29 09:26:44', 1),
(137, 73, 1200.00, 1, 34, 'Meat lover Feast', '1708955887.jpg', 1200.00, '2024-03-29 09:26:44', '2024-03-29 09:26:44', 1),
(138, 73, 700.00, 1, 313, 'Grilled Chicken Supreme', '1708947568.jpg', 700.00, '2024-03-29 09:26:44', '2024-03-29 09:26:44', 0),
(139, 73, 2800.00, 2, 17, 'Dough Dazzlers', '1708948014.jpg', 1400.00, '2024-03-29 09:26:44', '2024-03-29 09:26:44', 1),
(140, 73, 1800.00, 1, 4, 'HAPPY HOUR HAPPINESS', '1708683895.jpg', 1800.00, '2024-03-29 09:26:44', '2024-03-29 09:26:44', 1),
(141, 73, 600.00, 2, 160, 'PEANUT BUTTER SANDWHICH', '1708681894.jpg', 300.00, '2024-03-29 09:26:44', '2024-03-29 09:26:44', 0),
(142, 74, 3600.00, 2, 11, 'ROYAL DEAL', '1708774188.jpg', 1800.00, '2024-04-02 10:58:47', '2024-04-02 10:58:47', 1),
(143, 74, 2400.00, 2, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-04-02 10:58:47', '2024-04-02 10:58:47', 1),
(144, 74, 2200.00, 2, 8, 'Chick-a-Licious Pizza Offer', '1708685337.jpg', 1100.00, '2024-04-02 10:58:47', '2024-04-02 10:58:47', 1),
(145, 74, 1200.00, 1, 7, 'Chicken Feast Pizza Special', '1708684874.jpg', 1200.00, '2024-04-02 10:58:47', '2024-04-02 10:58:47', 1),
(146, 74, 3000.00, 2, 5, 'FAMILY FUN BUNDLE', '1708684069.jpg', 1500.00, '2024-04-02 10:58:47', '2024-04-02 10:58:47', 1),
(147, 74, 3000.00, 2, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-04-02 10:58:47', '2024-04-02 10:58:47', 1),
(148, 74, 2200.00, 2, 9, 'SNACK ATTACK SPECIAL', '1708685765.jpg', 1100.00, '2024-04-02 10:58:47', '2024-04-02 10:58:47', 1),
(149, 75, 1000.00, 1, 6, 'VALUE MEAL OFFER', '1708684217.jpg', 1000.00, '2024-04-02 11:06:38', '2024-04-02 11:06:38', 1),
(150, 75, 700.00, 2, 290, 'Orange (1kg)', '1708943009.jpg', 350.00, '2024-04-02 11:06:38', '2024-04-02 11:06:38', 0),
(151, 75, 1100.00, 1, 8, 'Chick-a-Licious Pizza Offer', '1708685337.jpg', 1100.00, '2024-04-02 11:06:38', '2024-04-02 11:06:38', 1),
(152, 75, 450.00, 1, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-04-02 11:06:39', '2024-04-02 11:06:39', 0),
(153, 76, 1100.00, 1, 8, 'Chick-a-Licious Pizza Offer', '1708685337.jpg', 1100.00, '2024-04-02 11:16:46', '2024-04-02 11:16:46', 1),
(154, 76, 450.00, 1, 182, 'Pizza Fries', '1708685349.jpg', 250.00, '2024-04-02 11:16:50', '2024-04-02 11:16:50', 0),
(155, 76, 100.00, 1, 180, 'Pepsi  500ml', '1708685114.jpg', 100.00, '2024-04-02 11:16:52', '2024-04-02 11:16:52', 0),
(156, 77, 600.00, 2, 287, 'Apple (1kg)', '1708942908.jpg', 300.00, '2024-04-02 11:20:15', '2024-04-02 11:20:15', 0),
(157, 77, 700.00, 2, 290, 'Orange (1kg)', '1708943009.jpg', 350.00, '2024-04-02 11:20:15', '2024-04-02 11:20:15', 0),
(158, 77, 300.00, 2, 291, 'Water Melon (1kg)', '1708943116.jpg', 150.00, '2024-04-02 11:20:15', '2024-04-02 11:20:15', 0),
(159, 77, 400.00, 2, 292, 'Banana ( 1 dozen)', '1708943197.jpg', 200.00, '2024-04-02 11:20:15', '2024-04-02 11:20:15', 0),
(160, 78, 850.00, 1, 310, 'Chicken Steak', '1708947037.jpg', 700.00, '2024-04-09 10:59:47', '2024-04-09 10:59:47', 0),
(161, 78, 764.00, 1, 176, 'Chicken Caesar Pizza', '1708684313.jpg', 649.00, '2024-04-09 10:59:47', '2024-04-09 10:59:47', 0),
(162, 78, 2900.00, 2, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-04-09 10:59:47', '2024-04-09 10:59:47', 1),
(163, 78, 2800.00, 2, 10, 'FLAVOR FUSION DEAL', '1708687053.jpg', 1400.00, '2024-04-09 10:59:47', '2024-04-09 10:59:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int NOT NULL,
  `operator_id` int DEFAULT NULL,
  `vendor_id` bigint DEFAULT NULL,
  `customer_id` bigint DEFAULT NULL,
  `order_address` mediumtext,
  `order_geo_location` varchar(255) DEFAULT NULL COMMENT 'Customer Order Address Geo Location',
  `item_quantity` int DEFAULT NULL,
  `order_amount` decimal(10,0) DEFAULT NULL,
  `delivery_charges` decimal(10,0) DEFAULT NULL,
  `grand_total` decimal(8,2) DEFAULT NULL,
  `further_instructions` mediumtext,
  `cancelation_reason` mediumtext,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0  = Not Ready, 1 = Waiting for approval, 2 = Preparation, 3 = Prepared waiting for rider / customer , 4 = Out for delivery, 5 = Delivered, 6 = Pickedup, 7 = Canceled, 8 = Canceled by rider',
  `order_type` tinyint(1) DEFAULT NULL,
  `rider_id` bigint DEFAULT NULL,
  `operator_commission` decimal(8,2) DEFAULT NULL,
  `admin_commission` decimal(8,2) DEFAULT NULL,
  `preparation_time` datetime DEFAULT NULL,
  `order_confirmed` datetime DEFAULT NULL,
  `order_prepared` datetime DEFAULT NULL,
  `pickup_time` datetime DEFAULT NULL,
  `drop_off_time` datetime DEFAULT NULL,
  `order_canceled` datetime DEFAULT NULL,
  `payment_type` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `operator_id`, `vendor_id`, `customer_id`, `order_address`, `order_geo_location`, `item_quantity`, `order_amount`, `delivery_charges`, `grand_total`, `further_instructions`, `cancelation_reason`, `status`, `order_type`, `rider_id`, `operator_commission`, `admin_commission`, `preparation_time`, `order_confirmed`, `order_prepared`, `pickup_time`, `drop_off_time`, `order_canceled`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 10, 31, 2, 'Ss10 defence view phase 2', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 1, 899, 150, 1049.00, 'Bring ASAP', NULL, 3, 1, NULL, 179.80, 89.90, NULL, '2024-03-14 09:54:53', '2024-03-14 09:56:25', NULL, NULL, NULL, 1, '2024-02-23 10:31:54', '2024-03-14 09:56:25'),
(2, 10, 31, 3, 'Flat no 16 clifton block 8', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 2, 2600, 0, 2600.00, 'Pleasing bring ASAP', NULL, 3, 1, NULL, 520.00, 260.00, NULL, '2024-03-14 09:56:29', '2024-03-14 09:56:34', NULL, NULL, NULL, 1, '2024-02-23 13:54:48', '2024-03-14 09:56:34'),
(3, 10, 31, 3, 'Flat no 16 clifton block 8', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 4, 600, 150, 750.00, NULL, NULL, 3, 1, NULL, 120.00, 60.00, NULL, '2024-03-14 09:08:40', '2024-03-14 09:08:47', NULL, NULL, NULL, 1, '2024-02-23 13:55:30', '2024-03-14 09:08:47'),
(4, 6, 34, 1, NULL, 'null', 2, 1300, 0, 1300.00, NULL, 'Customer is not answering calls', 7, 2, NULL, 260.00, 130.00, NULL, '2024-02-26 10:16:12', '2024-02-26 10:16:22', NULL, NULL, '2024-02-26 10:17:15', 1, '2024-02-26 10:08:39', '2024-02-26 10:17:15'),
(5, 6, 34, 1, 'Ss10 defence view phase 2', '{\"latitude\":24.838756100000001225680534844286739826202392578125,\"longitude\":67.08091120000000273648765869438648223876953125}', 1, 1400, 0, 1400.00, 'Bring ASAP', NULL, 1, 1, NULL, 280.00, 140.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-02-26 12:18:22', '2024-02-26 12:18:22'),
(6, 8, 38, 1, 'Ss10 defence view phase 2', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 3, 2100, 0, 2100.00, NULL, NULL, 5, 1, 1, 420.00, 210.00, NULL, '2024-02-27 12:30:47', '2024-02-27 12:30:52', '2024-02-27 12:33:01', '2024-02-27 12:33:05', NULL, 1, '2024-02-27 12:29:00', '2024-02-27 12:33:05'),
(7, 8, 38, 7, 'Mumtaz square', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 2, 2400, 0, 2400.00, NULL, 'Customer not answering calls', 8, 1, 1, 480.00, 240.00, NULL, '2024-02-27 12:39:27', '2024-02-27 12:39:34', '2024-02-27 12:40:12', NULL, '2024-02-27 12:40:29', 1, '2024-02-27 12:38:52', '2024-02-27 12:40:29'),
(8, 8, 39, 1, 'Mumtaz square Clifton block 8', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 5, 6000, 0, 6000.00, NULL, NULL, 5, 1, 1, 1200.00, 600.00, NULL, '2024-02-27 12:50:12', '2024-02-27 12:50:22', '2024-02-27 12:51:10', '2024-02-27 12:51:23', NULL, 2, '2024-02-27 12:46:32', '2024-02-27 12:51:23'),
(9, 8, 39, 1, 'Mumtaz square Clifton block 8', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 3, 3600, 0, 3600.00, NULL, NULL, 5, 1, 1, 720.00, 360.00, NULL, '2024-02-27 12:52:54', '2024-02-27 12:52:58', '2024-03-01 11:28:18', '2024-03-01 12:25:33', NULL, 1, '2024-02-27 12:52:20', '2024-03-01 12:25:33'),
(10, 8, 39, 1, 'Mumtaz square Clifton block 8', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 4, 3000, 0, 3000.00, NULL, NULL, 2, 1, NULL, 600.00, 300.00, NULL, '2024-03-01 10:30:57', NULL, NULL, NULL, NULL, 1, '2024-03-01 10:22:24', '2024-03-01 10:30:57'),
(11, 8, 39, 1, 'Mumtaz square Clifton block 8', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 3, 2700, 0, 2700.00, NULL, NULL, 5, 1, 1, 540.00, 270.00, NULL, '2024-03-01 12:21:59', '2024-03-01 12:22:07', '2024-03-01 12:26:52', '2024-03-01 12:27:00', NULL, 1, '2024-03-01 11:15:02', '2024-03-01 12:27:00'),
(12, 8, 39, 1, 'Mumtaz square Clifton block 8', '{\"latitude\":24.826987700000000103273123386316001415252685546875,\"longitude\":67.025095999999990681317285634577274322509765625}', 4, 3900, 0, 3900.00, 'Bring ASAP', 'Too much pending orders', 7, 1, NULL, 780.00, 390.00, NULL, NULL, NULL, NULL, NULL, '2024-03-01 12:22:50', 1, '2024-03-01 12:13:53', '2024-03-01 12:22:50'),
(13, 9, 31, 1, 'Mumtaz square Clifton block 8', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 500, 150, 650.00, 'Bring ASAP', 'Due to traffic jam', 8, 1, 1, 100.00, 60.00, NULL, '2024-03-14 09:57:11', '2024-03-14 10:05:17', '2024-03-14 11:37:30', NULL, '2024-03-14 11:37:54', 2, '2024-03-07 07:22:15', '2024-03-14 11:37:54'),
(14, 9, 31, 1, 'Mumtaz square Clifton block 8', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 650, 150, 800.00, NULL, 'Not answering calls', 8, 1, 1, 130.00, 78.00, NULL, '2024-03-14 09:53:25', '2024-03-14 09:56:17', '2024-03-14 09:58:28', NULL, '2024-03-14 09:58:46', 1, '2024-03-07 07:25:41', '2024-03-14 09:58:46'),
(15, 9, 31, 1, 'City residancy', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 2050, 0, 2050.00, 'Bring ASAP', 'Not answering calls', 8, 1, 1, 410.00, 246.00, NULL, '2024-03-14 09:08:26', '2024-03-14 09:08:33', '2024-03-14 09:35:41', '2024-03-14 09:36:24', '2024-03-14 09:47:40', 1, '2024-03-10 08:53:18', '2024-03-14 09:47:40'),
(16, 9, 36, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 600, 120, 720.00, NULL, NULL, 1, 1, NULL, 120.00, 72.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-11 07:38:41', '2024-03-11 07:38:41'),
(17, 9, 31, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1200, 0, 1200.00, NULL, NULL, 5, 1, 1, 240.00, 144.00, NULL, '2024-03-14 09:53:19', '2024-03-14 09:56:13', '2024-03-14 09:58:06', '2024-03-14 09:58:15', NULL, 1, '2024-03-12 08:02:49', '2024-03-14 09:58:15'),
(18, 9, 31, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1200, 0, 1200.00, NULL, NULL, 5, 1, 1, 240.00, 144.00, NULL, '2024-03-14 09:08:00', '2024-03-14 09:08:07', '2024-03-14 09:22:28', '2024-03-14 09:28:40', NULL, 1, '2024-03-12 08:04:17', '2024-03-14 09:28:40'),
(19, 9, 31, 1, 'City residancy saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 2200, 0, 2200.00, 'Bring ASAP', 'Restraint closed', 7, 1, NULL, 440.00, 264.00, NULL, '2024-03-13 11:04:22', NULL, NULL, NULL, '2024-03-13 11:05:55', 2, '2024-03-12 09:00:16', '2024-03-13 11:05:55'),
(20, 9, 31, 1, 'Saddar Karachi, Pakistan', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 2250, 0, 2250.00, 'Bring ASAP', NULL, 5, 1, 1, 450.00, NULL, NULL, '2024-03-13 09:18:41', '2024-03-13 09:31:52', '2024-03-14 08:06:49', '2024-03-14 08:19:49', NULL, 1, '2024-03-13 06:08:26', '2024-03-14 08:19:49'),
(21, 9, 31, 11, 'Saddar Karachi, Pakistan', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 1750, 0, 1750.00, NULL, 'Technical issue please order again', 7, 1, NULL, 350.00, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-13 11:20:28', 1, '2024-03-13 06:27:45', '2024-03-13 11:20:28'),
(22, 9, 31, 1, 'Saddar Karachi, Pakistan', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1600, 0, 1600.00, NULL, 'Restaurant is closed', 7, 1, NULL, 320.00, NULL, NULL, '2024-03-13 11:56:28', NULL, NULL, NULL, '2024-03-13 11:57:04', 1, '2024-03-13 11:10:48', '2024-03-13 11:57:04'),
(23, 9, 31, 1, 'Saddar Karachi, Pakistan', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 700, 150, 850.00, 'Bring ASAP', NULL, 6, 2, NULL, 140.00, NULL, NULL, '2024-03-13 11:24:35', '2024-03-13 11:24:49', NULL, NULL, NULL, NULL, '2024-03-13 11:23:54', '2024-03-13 11:25:07'),
(24, 9, 31, 1, 'City residancy', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1200, 0, 1200.00, NULL, NULL, 5, 1, 1, 240.00, 144.00, NULL, '2024-03-14 11:39:52', '2024-03-14 11:42:15', '2024-03-14 11:52:01', '2024-03-14 11:52:05', NULL, 2, '2024-03-14 10:02:16', '2024-03-14 11:52:05'),
(25, 9, 31, 1, 'City residancy', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 700, 150, 850.00, NULL, NULL, 5, 1, 1, 140.00, 84.00, NULL, '2024-03-14 10:04:19', '2024-03-14 10:04:41', '2024-03-14 11:37:04', '2024-03-14 11:37:08', NULL, 1, '2024-03-14 10:02:42', '2024-03-14 11:37:08'),
(26, 9, 31, 1, 'City residancy', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 5, 750, 150, 900.00, NULL, 'Due to traffic jam', 8, 1, 1, 150.00, 90.00, NULL, '2024-03-14 10:04:25', '2024-03-14 10:05:23', '2024-03-14 11:34:49', NULL, '2024-03-14 11:35:17', 1, '2024-03-14 10:03:04', '2024-03-14 11:35:17'),
(27, 9, 31, 1, 'City residancy', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 649, 150, 799.00, NULL, NULL, 5, 1, 1, 129.80, 77.88, NULL, '2024-03-14 10:04:13', '2024-03-14 10:04:36', '2024-03-14 10:06:35', '2024-03-14 10:06:43', NULL, 1, '2024-03-14 10:03:27', '2024-03-14 10:06:43'),
(28, 9, 31, 1, 'City residancy', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 649, 150, 799.00, NULL, 'Traffic jam', 8, 1, 1, 129.80, 77.88, NULL, '2024-03-14 10:04:08', '2024-03-14 10:04:31', '2024-03-14 10:06:01', NULL, '2024-03-14 10:06:24', 1, '2024-03-14 10:03:45', '2024-03-14 10:06:24'),
(29, 9, 31, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1200, 0, 1200.00, NULL, NULL, 5, 1, 1, 240.00, 144.00, NULL, '2024-03-14 11:39:46', '2024-03-14 11:42:08', '2024-03-14 11:48:30', '2024-03-14 11:49:25', NULL, 1, '2024-03-14 11:07:28', '2024-03-14 11:49:25'),
(30, 9, 31, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 2200, 0, 2200.00, NULL, NULL, 5, 1, 1, 440.00, 264.00, NULL, '2024-03-14 11:39:39', '2024-03-14 11:42:03', '2024-03-14 11:48:16', '2024-03-14 11:48:19', NULL, 1, '2024-03-14 11:12:54', '2024-03-14 11:48:19'),
(31, 9, 31, 1, 'Ss10 defense view', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1400, 0, 1400.00, NULL, NULL, 5, 1, 1, 280.00, 168.00, NULL, '2024-03-14 11:52:42', '2024-03-14 11:52:53', '2024-03-19 10:02:00', '2024-03-19 10:02:03', NULL, 1, '2024-03-14 11:50:54', '2024-03-19 10:02:03'),
(32, 9, 31, 1, 'Ss10 defense view', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 5, 750, 150, 900.00, NULL, NULL, 5, 1, 1, 150.00, 90.00, NULL, '2024-03-14 11:52:36', '2024-03-14 11:52:47', '2024-03-14 11:54:47', '2024-03-14 11:54:53', NULL, 1, '2024-03-14 11:51:29', '2024-03-14 11:54:53'),
(33, 9, 45, 8, 'ss-10 saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 640, 200, 840.00, NULL, NULL, 1, 1, NULL, 128.00, 76.80, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-15 11:51:53', '2024-03-15 11:51:53'),
(34, 9, 31, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1400, 0, 1400.00, NULL, NULL, 1, 1, NULL, 280.00, 168.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-15 11:54:21', '2024-03-15 11:54:21'),
(35, 9, 34, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 1350, 0, 1350.00, NULL, NULL, 1, 1, NULL, 270.00, 162.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-15 11:58:24', '2024-03-15 11:58:24'),
(36, 9, 31, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 700, 150, 850.00, NULL, NULL, 1, 1, NULL, 140.00, 84.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-19 09:31:16', '2024-03-19 09:31:16'),
(37, 9, 31, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1200, 0, 1200.00, NULL, NULL, 5, 1, 1, 240.00, 144.00, NULL, '2024-03-20 07:13:43', '2024-03-20 07:13:49', '2024-03-20 07:19:05', '2024-03-20 07:19:10', NULL, 1, '2024-03-19 09:31:44', '2024-03-20 07:19:10'),
(38, 9, 33, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 900, 150, 1050.00, NULL, NULL, 1, 1, NULL, 180.00, 108.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-19 09:32:23', '2024-03-19 09:32:23'),
(39, 9, 33, 1, 'Ss10', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 900, 150, 1050.00, NULL, NULL, 1, 1, NULL, 180.00, 108.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-03-19 09:33:04', '2024-03-19 09:33:04'),
(40, 9, 36, 1, NULL, 'null', 2, 800, 0, 800.00, NULL, NULL, 1, 2, NULL, 160.00, 96.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-03-19 09:35:55', '2024-03-19 09:35:55'),
(41, 9, 32, 1, NULL, 'null', 3, 1050, 0, 1050.00, NULL, NULL, 1, 2, NULL, 210.00, 126.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-19 11:28:39', '2024-03-19 11:28:39'),
(42, 9, 34, 1, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 1400, 0, 1400.00, NULL, NULL, 1, 1, NULL, 280.00, 168.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-20 06:28:51', '2024-03-20 06:28:51'),
(43, 9, 31, 1, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1300, 0, 1300.00, NULL, NULL, 5, 1, 1, 260.00, 156.00, NULL, '2024-03-20 06:39:02', '2024-03-20 06:40:00', '2024-03-20 06:40:59', '2024-03-20 06:42:10', NULL, 1, '2024-03-20 06:38:31', '2024-03-20 06:42:10'),
(44, 9, 41, 1, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 780, 150, 930.00, NULL, NULL, 1, 1, NULL, 156.00, 93.60, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-20 06:52:58', '2024-03-20 06:52:58'),
(45, 9, 41, 1, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 780, 150, 930.00, NULL, NULL, 1, 1, NULL, 156.00, 93.60, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-20 07:00:01', '2024-03-20 07:00:01'),
(46, 9, 34, 1, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 1350, 0, 1350.00, NULL, NULL, 1, 1, NULL, 270.00, 162.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-20 07:10:36', '2024-03-20 07:10:36'),
(47, 9, 32, 1, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 900, 150, 1050.00, NULL, NULL, 1, 1, NULL, 180.00, 108.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-20 07:36:02', '2024-03-20 07:36:02'),
(48, 9, 31, 1, NULL, 'null', 2, 900, 0, 900.00, NULL, NULL, 6, 2, NULL, 180.00, 108.00, NULL, '2024-03-20 07:37:44', '2024-03-20 07:37:52', NULL, NULL, NULL, 1, '2024-03-20 07:37:18', '2024-03-20 07:37:58'),
(49, 9, 33, 1, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 900, 150, 1050.00, NULL, NULL, 1, 1, NULL, 180.00, 108.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-20 08:05:33', '2024-03-20 08:05:33'),
(50, 9, 31, 1, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 950, 150, 1100.00, NULL, NULL, 5, 1, 1, 190.00, 114.00, NULL, '2024-03-20 08:08:58', '2024-03-20 08:09:37', '2024-03-20 08:11:54', '2024-03-20 08:12:24', NULL, 1, '2024-03-20 08:07:02', '2024-03-20 08:12:24'),
(51, 9, 32, 12, 'G96 DEFENCE VIEW PHASE 2', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1000, 150, 1150.00, NULL, NULL, 1, 1, NULL, 200.00, 120.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-25 17:26:21', '2024-03-25 17:26:21'),
(52, 9, 32, 1, NULL, 'null', 4, 7000, 0, 7000.00, NULL, NULL, 1, 2, NULL, 1400.00, 840.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-26 08:54:21', '2024-03-26 08:54:21'),
(53, 9, 32, 1, NULL, 'null', 1, 1800, 0, 1800.00, 'Saddar', NULL, 1, 2, NULL, 360.00, 216.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-26 09:52:36', '2024-03-26 09:52:36'),
(54, 9, 32, 1, NULL, 'null', 1, 1800, 0, 1800.00, 'Saddar', NULL, 1, 2, NULL, 360.00, 216.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-26 09:52:39', '2024-03-26 09:52:39'),
(55, 9, 32, 1, NULL, 'null', 1, 1800, 0, 1800.00, 'Saddar', NULL, 1, 2, NULL, 360.00, 216.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-26 09:52:40', '2024-03-26 09:52:40'),
(56, 9, 32, 1, NULL, 'null', 1, 1800, 0, 1800.00, 'Saddar', NULL, 1, 2, NULL, 360.00, 216.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-26 09:52:41', '2024-03-26 09:52:41'),
(57, 9, 32, 1, NULL, 'null', 1, 1800, 0, 1800.00, 'Saddar', NULL, 1, 2, NULL, 360.00, 216.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-26 09:52:42', '2024-03-26 09:52:42'),
(58, 9, 32, 1, NULL, 'null', 1, 1800, 0, 1800.00, 'Saddar', NULL, 1, 2, NULL, 360.00, 216.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-26 09:52:43', '2024-03-26 09:52:43'),
(59, 9, 31, 1, NULL, 'null', 3, 4100, 0, 4100.00, NULL, NULL, 1, 2, NULL, 820.00, 492.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-03-26 10:06:27', '2024-03-26 10:06:27'),
(60, 9, 31, 1, NULL, 'null', 5, 4400, 0, 4400.00, NULL, NULL, 1, 2, NULL, 880.00, 528.00, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-03-26 10:23:14', '2024-03-26 10:23:14'),
(61, 9, 31, 1, NULL, 'null', 7, 8350, 0, 8350.00, NULL, NULL, 3, 2, NULL, 1670.00, 1002.00, NULL, '2024-03-26 10:41:52', '2024-03-26 10:42:04', NULL, NULL, NULL, 2, '2024-03-26 10:32:38', '2024-03-26 10:42:04'),
(62, 9, 31, 1, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 750, 150, 900.00, NULL, NULL, 3, 1, NULL, 150.00, 90.00, NULL, '2024-03-26 10:46:16', '2024-03-26 10:46:23', NULL, NULL, NULL, 1, '2024-03-26 10:45:43', '2024-03-26 10:46:23'),
(63, 9, 31, 1, 'Ss10 defense view phase 2', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 2700, 0, 2700.00, NULL, NULL, 5, 1, 1, 540.00, 324.00, NULL, '2024-03-26 10:48:13', '2024-03-26 10:48:19', '2024-03-26 10:48:54', '2024-03-26 10:49:06', NULL, 1, '2024-03-26 10:47:35', '2024-03-26 10:49:06'),
(64, 9, 31, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 5800, 0, 5800.00, NULL, NULL, 1, 2, NULL, 1160.00, 696.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-28 06:19:39', '2024-03-28 06:19:39'),
(65, 9, 32, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 3100, 0, 3100.00, NULL, NULL, 1, 2, NULL, 620.00, 372.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-28 06:54:41', '2024-03-28 06:54:41'),
(66, 9, 34, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 4, 6300, 0, 6300.00, NULL, NULL, 1, 1, NULL, 1260.00, 756.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-28 06:56:58', '2024-03-28 06:56:58'),
(67, 9, 31, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1400, 0, 1400.00, NULL, NULL, 1, 1, NULL, 280.00, 168.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-28 07:06:51', '2024-03-28 07:06:51'),
(68, 9, 33, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 600, 150, 750.00, NULL, NULL, 1, 1, NULL, 120.00, 72.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-28 08:49:14', '2024-03-28 08:49:14'),
(69, 9, 45, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1400, 200, 1600.00, 'Faizan', NULL, 1, 2, NULL, 280.00, 168.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-28 09:34:13', '2024-03-28 09:34:13'),
(70, 9, 37, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 1200, 0, 1200.00, NULL, NULL, 1, 1, NULL, 240.00, 144.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-29 06:56:02', '2024-03-29 06:56:02'),
(71, 9, 31, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 3700, 0, 3700.00, NULL, NULL, 1, 2, NULL, 740.00, 444.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-29 07:11:27', '2024-03-29 07:11:27'),
(72, 9, 44, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 4, 1000, 200, 1200.00, NULL, NULL, 1, 1, NULL, 200.00, 120.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-29 07:12:49', '2024-03-29 07:12:49'),
(73, 9, 32, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 2400, 0, 2400.00, NULL, NULL, 1, 1, NULL, 480.00, 288.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-29 09:26:44', '2024-03-29 09:26:44'),
(74, 9, 32, 17, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 2200, 0, 2200.00, NULL, NULL, 1, 1, NULL, 440.00, 264.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-02 10:58:47', '2024-04-02 10:58:47'),
(75, 9, 31, 17, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 2, 1650, 0, 1650.00, NULL, NULL, 1, 1, NULL, 330.00, 198.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-02 11:06:38', '2024-04-02 11:06:38'),
(76, 9, 31, 17, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 3, 1750, 0, 1750.00, NULL, NULL, 1, 1, NULL, 350.00, 210.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-02 11:16:45', '2024-04-02 11:16:45'),
(77, 9, 44, 17, 'Saddar', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 4, 2000, 0, 2000.00, NULL, NULL, 1, 1, NULL, 400.00, 240.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-04-02 11:20:13', '2024-04-02 11:20:13'),
(78, 9, 31, 13, 'manzor colony', '{\"latitude\":24.86159839999999832116372999735176563262939453125,\"longitude\":67.0290743999999989455318427644670009613037109375}', 1, 2900, 0, 2900.00, NULL, NULL, 2, 1, NULL, 580.00, 348.00, NULL, '2024-06-14 10:23:34', NULL, NULL, NULL, NULL, 1, '2024-04-09 10:59:47', '2024-06-14 10:23:34');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `reservation_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `no_of_guests` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` int NOT NULL,
  `operator_id` int DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_rate` decimal(10,0) DEFAULT NULL,
  `current_commission` decimal(10,0) DEFAULT NULL,
  `total_earn` decimal(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `operator_id`, `first_name`, `last_name`, `phone_number`, `email`, `photo`, `password`, `street`, `address`, `commission_rate`, `current_commission`, `total_earn`, `created_at`, `updated_at`) VALUES
(1, 9, 'Mike', 'Ross', '03331234567', 'rider@example.com', NULL, '$2y$10$h9ylpDtvROOaiV792YLuDe94MXgNHWxRzUWckYq/D83DwCFQ0XIli', NULL, NULL, 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rider_earnings`
--

CREATE TABLE `rider_earnings` (
  `id` int NOT NULL,
  `rider_id` int DEFAULT NULL,
  `delivery_id` int DEFAULT NULL,
  `commission_rate_id` int DEFAULT NULL,
  `earnings_amount` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int NOT NULL,
  `operator_id` int DEFAULT NULL,
  `vendor_type_id` int DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_balance` decimal(10,2) DEFAULT NULL,
  `points_in_hand` float DEFAULT NULL,
  `date_joining` datetime DEFAULT NULL,
  `contact_number_primary` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_sec` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_percentage` double DEFAULT NULL,
  `delivery_free_after` double DEFAULT NULL,
  `delivery_charges` double DEFAULT NULL,
  `minimum_delivery_amount` double DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_account` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `operator_id`, `vendor_type_id`, `name`, `slug`, `company_name`, `shop_number`, `full_address`, `logo`, `banner1`, `banner2`, `banner3`, `current_balance`, `points_in_hand`, `date_joining`, `contact_number_primary`, `contact_number_sec`, `commission_percentage`, `delivery_free_after`, `delivery_charges`, `minimum_delivery_amount`, `email`, `facebook`, `website`, `instagram`, `twitter_account`, `created_at`, `updated_at`, `deleted_at`) VALUES
(31, 9, 1, 'StreetSizzle Kitchen', '', 'StreetSizzle Kitchen', '2345', 'Saddar', '1708672014.jpg', '17086720140.jpg', '17086720141.jpg', '17086720142.jpg', 9999.00, 2000, '2024-02-23 00:00:00', '03452138945', '03542137228', 20, 1200, 150, 500, 'streetsizzlekitchen@gmail.com', NULL, NULL, NULL, NULL, '2024-02-23 07:06:54', '2024-02-27 09:31:34', NULL),
(32, 9, 1, 'DelishDomain Catering', '', 'DelishDomain Catering', '1222', 'Saddar', '1708672050.jpg', '17086720500.jpg', '17086720501.jpg', '17086720502.jpg', 20000.00, 2000, '2024-02-23 00:00:00', '03221556452', '0321654555', 20, 1300, 150, 500, 'delishdomaincatering@gmail.com', NULL, NULL, NULL, NULL, '2024-02-23 07:07:30', '2024-02-26 13:57:06', NULL),
(33, 9, 3, 'SUPER MART', '', 'SUPER MART', '155', 'Saddar', '1708673138.jpg', '17086731380.jpg', '17086731381.jpg', '17086731382.jpg', 25000.00, 2000, '2024-02-23 00:00:00', '03216545621', '03216549865', 20, 1300, 150, 500, 'supermart@gmail.com', NULL, NULL, NULL, NULL, '2024-02-23 07:25:38', '2024-02-26 13:55:18', NULL),
(34, 9, 1, 'Crepe Station', '', 'Crepe Station', '9876', 'Saddar', '1708692150.jpg', '17086921500.jpg', '17086921501.jpg', '17086921502.jpg', 9999.00, 2000, '2024-02-23 00:00:00', '03472318785', '0321328756', 20, 1000, 100, 500, 'crepestation@gmail.com', NULL, NULL, NULL, NULL, '2024-02-23 12:42:30', '2024-02-26 13:42:11', NULL),
(35, 9, 1, 'ExpressMunch', '', 'ExpressMunch', '346544', 'Saddar', '1708693197.jpg', '17086931970.jpg', '17086931971.jpg', '17086931972.jpg', 70000.00, 15000, '2024-02-23 00:00:00', '03272349629', '03087234702', 20, 1400, 160, 400, 'expressmunch@gmail.com', NULL, NULL, NULL, NULL, '2024-02-23 12:59:57', '2024-02-23 13:13:47', '2024-02-23 20:13:47'),
(36, 9, 3, 'Mexican Food Stall', '', 'Mexican Food Stall', '3466', 'Saddar', '1708693577.jpg', '17086935770.jpg', '17086935771.jpg', '17086935772.jpg', 60000.00, 50000, '2024-02-23 00:00:00', '03458574766', '03373874558', 20, 1100, 120, 350, 'mexicanfoodstall@gmail.com', NULL, NULL, NULL, NULL, '2024-02-23 13:06:17', '2024-02-26 13:41:13', NULL),
(37, 9, 1, 'Sushi Bar on Wheels', '', 'Sushi Bar on Wheels', '7654', 'Saddar', '1708693877.jpg', '17086938770.jpg', '17086938771.jpg', '17086938772.jpg', 9999.00, 2000, '2024-02-23 00:00:00', '03452137228', '03332138789', 20, 1000, 100, 500, 'sushibaronwheels@gmail.com', NULL, NULL, NULL, NULL, '2024-02-23 13:11:17', '2024-02-26 13:21:15', NULL),
(38, 9, 1, 'GourmetGrove', '', 'GourmetGrove', '255', 'Saddar', '1708930409.jpg', '17089304090.jpg', '17089304091.jpg', '17089304092.jpg', 45000.00, 2000, '2024-02-26 00:00:00', '03214785296', '03698528545', 20, 1450, 150, 500, 'GourmetGrove@gmail.com', NULL, NULL, NULL, NULL, '2024-02-26 06:53:29', '2024-02-26 12:47:33', NULL),
(39, 9, 1, 'TastyTrails', '', 'TastyTrails', '8855', 'Saddar', '1708930599.jpg', '17089305990.jpg', '17089305991.jpg', '17089305992.jpg', 41000.00, 1000, '2024-02-26 00:00:00', '03698527454', '032165498765', 20, 1550, 150, 500, 'TastyTrails@gmail.com', NULL, NULL, NULL, NULL, '2024-02-26 06:56:39', '2024-02-26 12:46:47', NULL),
(40, 9, 1, 'ZipZap Foods', '', 'ZipZap Foods', '43333', 'Saddar', '1708931517.jpg', '17089315170.jpg', '17089315171.jpg', '17089315172.jpg', 60000.00, 5599, '2024-02-26 00:00:00', '03420808221', '03092784571', 20, 1500, 190, 350, 'zipzapfoods@gmail.com', NULL, NULL, NULL, NULL, '2024-02-26 07:11:57', '2024-02-26 07:11:57', NULL),
(41, 9, 3, 'CraveCuisine', '', 'CraveCuisine', '5555', 'Saddar', '1708932122.jpg', '17089321220.jpg', '17089321221.jpg', '17089321222.jpg', 45000.00, 4000, '2024-02-26 00:00:00', '03216546666', '03265556445', 20, 1550, 150, 500, 'CraveCuisine@gmail.com', NULL, NULL, NULL, NULL, '2024-02-26 07:22:02', '2024-02-26 12:45:42', NULL),
(42, 9, 1, 'SprintBites', '', 'SprintBites', '5345', 'Saddar', '1708932585.jpg', '17089325850.jpg', '17089325851.jpg', '17089325852.jpg', 3565.00, 88760, '2024-02-26 00:00:00', '03243287911', '03165432791', 15, 1600, 150, 360, 'sprintbites@gmail.com', NULL, NULL, NULL, NULL, '2024-02-26 07:29:45', '2024-02-26 07:29:45', NULL),
(43, 9, 3, 'The Green Grocer', '', 'The Green Grocer', '54446', 'Saddar', '1708932919.jpg', '17089329190.jpg', '17089329191.jpg', '17089329192.jpg', 30000.00, 60000, '2024-02-26 00:00:00', '03245747571', '03225567821', 20, 1600, 150, 350, 'thegreengrocer@gmail.com', NULL, NULL, NULL, NULL, '2024-02-26 07:35:19', '2024-02-26 12:42:15', NULL),
(44, 9, 3, 'Mini Store', '', 'Mini Store', '85152', 'Saddar', '1708933871.jpg', '17089338710.jpg', '17089338711.jpg', '17089338712.jpg', 20000.00, 2000, '2024-02-26 00:00:00', '03125748609', '03124587654', 20, 1500, 200, 500, 'ministore@gmail.com', NULL, NULL, NULL, NULL, '2024-02-26 07:51:11', '2024-02-26 12:54:35', NULL),
(45, 9, 1, 'Biryani House', '', 'Biryani House', '58464', 'Saddar', '1708935179.jpg', '17089351790.jpg', '17089351791.jpg', '17089351792.jpg', 20000.00, 1500, '2024-02-26 00:00:00', '03125468797', '03354687508', 20, 1500, 200, 500, 'biryanihouse@gmail.com', NULL, NULL, NULL, NULL, '2024-02-26 08:12:59', '2024-02-26 12:55:40', NULL),
(46, 9, 1, 'Crust Pizza Parlor', '', 'Crust Pizza Parlor', '2563', 'Saddar', '1708937444.jpg', '17089374440.jpg', '17089374441.jpg', '17089374442.jpg', 35000.00, 2000, '2024-02-26 00:00:00', '03215546998', '03265987402', 20, 1450, 200, 500, 'crustpizzaparlor@gmail.com', NULL, NULL, NULL, NULL, '2024-02-26 08:50:44', '2024-02-26 12:49:36', NULL),
(47, 7, 1, 'Musavir Iftekhar', NULL, 'Devoppia', '012345678', 'G-96 Defence View phase 2', '1724844990.png', '17248449900.jpg', '17248449901.jpg', '17248449902.jpg', 10000.00, 10000, '2024-08-28 00:00:00', '03162061478', '12345678', 10, 1000, 100, 50, 'mussawir20@gmail.com', NULL, NULL, NULL, NULL, '2024-08-28 11:36:30', '2024-08-28 11:36:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_types`
--

CREATE TABLE `vendor_types` (
  `id` int NOT NULL,
  `type_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_food` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_types`
--

INSERT INTO `vendor_types` (`id`, `type_name`, `is_food`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pizza', 1, 1, '2024-02-07 11:57:18', '2024-02-07 13:35:25', NULL),
(3, 'Dairy', 0, 1, '2024-02-09 12:13:05', '2024-02-09 12:50:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches_customers`
--
ALTER TABLE `branches_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_addons`
--
ALTER TABLE `cart_addons`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cart_deal_options`
--
ALTER TABLE `cart_deal_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_master`
--
ALTER TABLE `cart_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_rates`
--
ALTER TABLE `commission_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cross_sell`
--
ALTER TABLE `cross_sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `customer_operator`
--
ALTER TABLE `customer_operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust_reg_otp`
--
ALTER TABLE `cust_reg_otp`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `deals_details`
--
ALTER TABLE `deals_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deals_details_deal_id_foreign` (`deal_id`);

--
-- Indexes for table `deals_master`
--
ALTER TABLE `deals_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_addons`
--
ALTER TABLE `deal_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_options`
--
ALTER TABLE `deal_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_vendors`
--
ALTER TABLE `favourite_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_lists`
--
ALTER TABLE `items_lists`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `item_addons`
--
ALTER TABLE `item_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_ext_img`
--
ALTER TABLE `item_ext_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nsa_leads`
--
ALTER TABLE `nsa_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_commission_history`
--
ALTER TABLE `operator_commission_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_details`
--
ALTER TABLE `operator_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_dues`
--
ALTER TABLE `operator_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_master`
--
ALTER TABLE `operator_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_payment_master`
--
ALTER TABLE `operator_payment_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_addons`
--
ALTER TABLE `order_addons`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `order_deal_options`
--
ALTER TABLE `order_deal_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservations_reservation_id_unique` (`reservation_id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rider_earnings`
--
ALTER TABLE `rider_earnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_types`
--
ALTER TABLE `vendor_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branches_customers`
--
ALTER TABLE `branches_customers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_addons`
--
ALTER TABLE `cart_addons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart_deal_options`
--
ALTER TABLE `cart_deal_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `cart_master`
--
ALTER TABLE `cart_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commission_rates`
--
ALTER TABLE `commission_rates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cross_sell`
--
ALTER TABLE `cross_sell`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_operator`
--
ALTER TABLE `customer_operator`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cust_reg_otp`
--
ALTER TABLE `cust_reg_otp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `deals_details`
--
ALTER TABLE `deals_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `deals_master`
--
ALTER TABLE `deals_master`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `deal_addons`
--
ALTER TABLE `deal_addons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deal_options`
--
ALTER TABLE `deal_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_vendors`
--
ALTER TABLE `favourite_vendors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items_lists`
--
ALTER TABLE `items_lists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `item_addons`
--
ALTER TABLE `item_addons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `item_ext_img`
--
ALTER TABLE `item_ext_img`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nsa_leads`
--
ALTER TABLE `nsa_leads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator_commission_history`
--
ALTER TABLE `operator_commission_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `operator_details`
--
ALTER TABLE `operator_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `operator_dues`
--
ALTER TABLE `operator_dues`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `operator_master`
--
ALTER TABLE `operator_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_addons`
--
ALTER TABLE `order_addons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_deal_options`
--
ALTER TABLE `order_deal_options`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rider_earnings`
--
ALTER TABLE `rider_earnings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `vendor_types`
--
ALTER TABLE `vendor_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--
