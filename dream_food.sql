-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2024 at 08:40 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dream_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `behind` text COLLATE utf8mb4_unicode_ci,
  `mission` text COLLATE utf8mb4_unicode_ci,
  `service` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admincontacts`
--

DROP TABLE IF EXISTS `admincontacts`;
CREATE TABLE IF NOT EXISTS `admincontacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh Food Item', 'categories/UrKLnWbFOfhuoQKYgqJZJODXAFOnKfTIjvBzK6jU.jpg', NULL, '2024-10-05 01:03:39', '2024-10-05 01:03:39'),
(2, 'Pakistan Food Item', 'categories/upDL7KVf6CnwG9rRVXLIejwsqCKovtL4YLw2S2Kl.jpg', NULL, '2024-10-05 01:04:03', '2024-10-05 01:06:39'),
(3, 'Italy Food Item', 'categories/oRECJg5cE2HLpIGuQA3b6lFAMAq5aibmxYxb5ie5.jpg', NULL, '2024-10-05 01:04:27', '2024-10-05 01:04:27'),
(4, 'India Food Item', 'categories/nqdOpriIsOBkm9jXXOgM2I1aNifV2F1GJ2ohCrdR.jpg', NULL, '2024-10-05 01:04:49', '2024-10-05 01:04:49'),
(5, 'Netherlands Food Item', 'categories/YHkhjTSusInBLBMmTYHxBSSAnDS2xOp7wN0xbRKl.jpg', NULL, '2024-10-05 01:05:35', '2024-10-05 01:05:35'),
(6, 'Romania Food Item', 'categories/GYoqU9KW0i2lZdh2vPmXR8bpY36KyVpITQx07Qeu.jpg', NULL, '2024-10-05 01:06:04', '2024-10-05 01:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `chefcontacts`
--

DROP TABLE IF EXISTS `chefcontacts`;
CREATE TABLE IF NOT EXISTS `chefcontacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chef_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featureds`
--

DROP TABLE IF EXISTS `featureds`;
CREATE TABLE IF NOT EXISTS `featureds` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `information` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
CREATE TABLE IF NOT EXISTS `heroes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_subscribecontacts_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_07_06_072612_create_heroes_table', 1),
(7, '2024_07_07_072212_create_summers_table', 1),
(8, '2024_07_07_091426_create_mychefs_table', 1),
(9, '2024_07_07_091426_create_winters_table', 1),
(10, '2024_07_08_084510_create_chefcontacts_table', 1),
(11, '2024_07_08_084510_create_usercontacts_table', 1),
(12, '2024_07_08_092413_create_admincontacts_table', 1),
(13, '2024_07_09_084343_create_abouts_table', 1),
(14, '2024_07_14_082911_create_cache_table', 1),
(15, '2024_07_16_094149_create_clients_table', 1),
(16, '2024_07_16_095457_create_featureds_table', 1),
(17, '2024_07_16_100236_create_recents_table', 1),
(18, '2024_07_29_045835_create_categories_table', 1),
(19, '2024_07_29_050255_create_subcategories_table', 1),
(20, '2024_07_29_050531_create_products_table', 1),
(21, '2024_08_18_063109_create_carts_table', 1),
(22, '2024_08_18_063132_create_orders_table', 1),
(23, '2024_08_18_110731_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mychefs`
--

DROP TABLE IF EXISTS `mychefs`;
CREATE TABLE IF NOT EXISTS `mychefs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `old_price` decimal(8,2) DEFAULT NULL,
  `sub_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `information` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'breakfast',
  `status_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Stock',
  PRIMARY KEY (`id`),
  KEY `products_subcategory_id_foreign` (`subcategory_id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `category_id`, `name`, `title`, `sub_title`, `image`, `price`, `old_price`, `sub_description`, `description`, `information`, `created_at`, `updated_at`, `status`, `status_1`) VALUES
(1, 1, 1, 'Chicken Galantine', 'new', 'Voluptate libero et', 'products/6I8oHyIBTzoErToMM4ftspK3ZfcUsJyk0UYTQ2Cz.png', '621.00', '689.00', 'sdgdgsd', 'asfdsdf', 'sdfgsdfg', '2024-10-05 01:18:06', '2024-10-05 01:18:06', 'breakfast', 'In Stock'),
(2, 1, 1, 'Healthy Oatmeal', 'new', 'Architecto voluptate', 'products/spoIWQTlCJfkUxjZ6L6JsRcMALnR2bVqScOdoMBu.png', '581.00', '689.00', 'sdfsdfgsdf', 'sdfsdfsd', 'asfsdfsdf', '2024-10-05 01:24:12', '2024-10-05 01:24:12', 'breakfast', 'In Stock'),
(3, 1, 1, 'Barley Porridge', 'xcv', 'Sed totam cillum ull', 'products/5lsIwOPHQdHjU7hFqsBuYGeDcr3wRGtfU14kwpKZ.png', '468.00', '772.00', 'fdzgdfgzdf', 'fgvbdfzgdfz', 'dfzgdfgzddf', '2024-10-05 01:24:51', '2024-10-05 01:24:51', 'breakfast', 'In Stock'),
(4, 1, 1, 'Sald Salmon', 'new', 'Architecto voluptate', 'products/rckyHfoyMJLGKC1qmvTfmwsT78noY18rrKF3gaFn.png', '647.00', '690.00', 'dzfgdfghdf', 'dsfghdf', 'dfhdsdsdf', '2024-10-05 01:26:05', '2024-10-05 01:26:05', 'breakfast', 'In Stock'),
(5, 1, 1, 'Avocado Tuna', 'new', 'Sed totam cillum ull', 'products/eotQgsXzBQuzxHssIeNpIrOPs1PMxZ4ZDuGNUnhB.png', '139.00', '294.00', 'dfgdfgfsd', 'sdfgdrg', 'dfsgdgds', '2024-10-05 01:40:36', '2024-10-05 01:43:20', 'lunch', 'In Stock'),
(6, 1, 1, 'Shrimps Tomato', 'hot', 'Officia ad asperiore', 'products/e5TDPTXRznTiK5zqKoMxqyfZt29QP24649B2iFT6.png', '581.00', '689.00', 'gdsfgdsfgf', 'adgdfgfd', 'dsfdsfdsfgf', '2024-10-05 01:41:48', '2024-10-05 01:43:26', 'dinner', 'In Stock'),
(7, 1, 1, 'Boiled Egg', 'new', 'Architecto voluptate', 'products/6jnL2Sk2UqeZ3f528O0rRR8OKtb4QsI3Mqn41nEv.png', '468.00', '690.00', 'dsgdfasgdf', 'qasdefaesfg', 'dsfgdsfghf', '2024-10-05 01:42:29', '2024-10-05 01:43:30', 'drinks', 'In Stock'),
(8, 1, 1, 'Chicken Galantine', 'new', 'Officia ad asperiore', 'products/gv3GsZdeJGMECzmfZSSRoXe9E4uLr8GtExUoYT3c.png', '601.00', '689.00', 'dfsgdfsg', 'sdfzgvdfg', 'sdfgdfgd', '2024-10-05 01:43:13', '2024-10-05 01:43:34', 'dessert', 'In Stock'),
(9, 2, 2, 'Boiled Egg', 'new', 'Architecto voluptate', 'products/HNzEDvaNGFxuxjIV7BgUjh67wmjwaV2xwFhG253l.png', '139.00', '294.00', 'dfsdfdshsdf', 'dfhfsghdsfhdfs', 'dfshdfsdfhdf', '2024-10-05 01:45:53', '2024-10-05 01:45:53', 'breakfast', 'In Stock'),
(10, 2, 2, 'Barley Porridge', 'new', 'Sed totam cillum ull', 'products/vnOXbPJrpMTbVSZ77MbgpBCWW9E1x83KDOevVSc1.png', '581.00', '689.00', 'dfgdfdsgds', 'awetfgsdfgdf', 'dfsdfgfdg', '2024-10-05 01:47:14', '2024-10-05 01:51:18', 'lunch', 'In Stock'),
(11, 2, 2, 'Sald Salmon', 'new', 'Architecto voluptate', 'products/VrSiOi4iUnX4ReRo6kZxwxRwiSamqdLEPREW32Gq.png', '581.00', '772.00', 'sddgfsasda', 'sdagfasd', 'sdfsdafdfsfa', '2024-10-05 01:49:32', '2024-10-05 01:51:25', 'dinner', 'In Stock'),
(12, 2, 2, 'Avocado Tuna', 'new', 'Officia ad asperiore', 'products/WltFbdPTHzZFff6dcU5jPuYr1xQ0hL59gzP4u6bB.png', '139.00', '294.00', 'fghfghgf', 'dfxhg', 'fdxghfgdhfg', '2024-10-05 01:50:30', '2024-10-05 01:51:31', 'drinks', 'In Stock'),
(13, 2, 2, 'Shrimps Tomato', 'new', 'Officia ad asperiore', 'products/FKZzGiufzT0F8QiIpYD6BErJjnNGiqmDsUV53pGd.png', '581.00', '772.00', 'dfgfdgfd', 'dzfghdfzgdfgd', 'dfgdfgfdg', '2024-10-05 01:52:20', '2024-10-05 01:52:25', 'dessert', 'In Stock'),
(14, 3, 3, 'Barley Porridge', 'new', 'Officia ad asperiore', 'products/zTBc1J8GCUOE5MZXjLOmidezwJ3j7ZfAkioy4MXZ.png', '581.00', '294.00', 'dfshdshsd', 'sdfhdfh', 'dfhdfshdfh', '2024-10-05 01:54:22', '2024-10-05 01:54:22', 'breakfast', 'In Stock'),
(15, 3, 3, 'Sald Salmon', 'new', 'Voluptate libero et', 'products/YhJD3EQVkl5ldQGWeTZo8AwSVaaYb7MbEchw3Wjs.png', '581.00', '294.00', 'dfgdsfgdsfg', 'edrfgdsfgf', 'dsfgdsfgdfg', '2024-10-05 01:56:12', '2024-10-05 01:58:17', 'lunch', 'In Stock'),
(16, 3, 3, 'Boiled Egg', 'hot', 'Officia ad asperiore', 'products/wBAP0vBzSyOhSKRUv3RvyvYTCsEEVHP0GNyXIRJG.png', '139.00', '294.00', 'xcgbnxcfgbnfgv', 'bnxcfgbhxgfh', 'cvfgnxcfgvvfgb', '2024-10-05 01:57:09', '2024-10-05 01:58:28', 'dinner', 'In Stock'),
(17, 3, 3, 'Chicken Galantine', 'hot', 'Sed totam cillum ull', 'products/KYL4lRGlNe2scy6vgaJTklKIDQp8Vw5JmXlwfMBD.png', '621.00', '690.00', 'dfhdfhfdshdfs', 'dfhgdfdfh', 'dsfhdshsdh', '2024-10-05 01:58:07', '2024-10-05 01:58:40', 'drinks', 'In Stock'),
(18, 3, 3, 'Healthy Oatmeal', 'new', 'Voluptate libero et', 'products/rs460zWPXiYwr9mn8AfThBBXVbLuOh4WkrQJunLL.png', '581.00', '690.00', 'dfgfdfdfd', 'sdfgdfg', 'dsfgdsfdg', '2024-10-05 02:00:05', '2024-10-05 02:00:12', 'dessert', 'In Stock'),
(19, 4, 4, 'Boiled Egg', 'new', 'Officia ad asperiore', 'products/WCFqRvGbyXFmkwv2614eYVsxNQYmZuBhXBfaZq1h.png', '581.00', '689.00', 'fzdgvdfg', 'dfzxgdfg', 'dfgdfg', '2024-10-05 02:02:42', '2024-10-05 02:02:57', 'breakfast', 'In Stock'),
(20, 4, 4, 'Barley Porridge', 'hot', 'Architecto voluptate', 'products/24aeI3KvesxJegfQ0KPnvkySW1DICbv1EQS14xCh.png', '468.00', '690.00', 'dfgdfzsgdfg', 'etfgedrtgedr', 'fdgsddfgdf', '2024-10-05 02:03:53', '2024-10-05 02:08:02', 'lunch', 'In Stock'),
(21, 4, 4, 'Sald Salmon', 'new', 'Architecto voluptate', 'products/dBULXuvH7AKSE19vW8inv35TSMzXCKQePxapLqIv.png', '139.00', '294.00', 'dcxfgdfxgdf', 'dfgbdfgdfg', 'dfxghdfgdf', '2024-10-05 02:04:32', '2024-10-05 02:08:16', 'dinner', 'In Stock'),
(22, 4, 4, 'Healthy Oatmeal', 'new', 'Voluptate libero et', 'products/HJKQf2wjhv3t57liDg8cdOQNDtkvTM3Jp6JoIZkm.png', '601.00', '689.00', 'drgdfgd', 'waertgesrg', 'dsfgfgdgdf', '2024-10-05 02:05:42', '2024-10-05 02:08:23', 'drinks', 'In Stock'),
(23, 5, 4, 'Shrimps Tomato', 'new', 'Voluptate libero et', 'products/3LC9OoS9e87se6RZI0iRXukFlugGRi17BouEEbFO.png', '581.00', '772.00', 'gdfgdfgdf', 'dfgdsfgdf', 'gdffdfgd', '2024-10-05 02:07:01', '2024-10-05 02:07:01', 'breakfast', 'In Stock'),
(24, 4, 4, 'Avocado Tuna', 'new', 'Architecto voluptate', 'products/vp7S6iuHiQTrNk279Petcf8NxbOsixYXBaBNf69J.png', '581.00', '772.00', 'fdgdfgdfg', 'dfgdfgdf', 'dfgdfgdfg', '2024-10-05 02:07:45', '2024-10-05 02:08:37', 'dessert', 'In Stock'),
(25, 5, 5, 'Avocado Tuna', 'hot', 'Officia ad asperiore', 'products/P8XlL5rLVTfGgDmLGQsiHiWp28bII62QOLu9c3wM.png', '581.00', '772.00', 'fghfdghfdg', 'fghfghfdgh', 'gfhfdghfgh', '2024-10-05 02:09:27', '2024-10-05 02:09:27', 'breakfast', 'In Stock'),
(26, 5, 5, 'Barley Porridge', 'new', 'Architecto voluptate', 'products/gREFH79AeGa1RKVWRVtVJclsZzDona8ZTUAvMoE4.png', '468.00', '690.00', 'dfgdsfgdsf', 'sdfgdsgf', 'dfgfdgdfg', '2024-10-05 02:10:05', '2024-10-05 02:10:05', 'breakfast', 'In Stock'),
(27, 5, 5, 'Boiled Egg', 'hot', 'Officia ad asperiore', 'products/JJbKyeGsNXXox6cj5tESDpu6VoiudMGUpJadCg7s.png', '468.00', '690.00', 'dfgffdgdsg', 'fghdsfgdsf', 'sdgfdfdf', '2024-10-05 02:10:41', '2024-10-05 02:10:41', 'breakfast', 'In Stock'),
(28, 5, 5, 'Sald Salmon', 'new', 'Architecto voluptate', 'products/qKfO0ER2IYp4USwrILD0jTqufSL7Mp6Nmd0ngkVm.png', '581.00', '772.00', 'dfgdsfgdf', 'dghdfgdf', 'dfgdsfgdfg', '2024-10-05 02:11:22', '2024-10-05 02:11:22', 'breakfast', 'In Stock'),
(29, 5, 5, 'Avocado Tuna', 'new', 'Architecto voluptate', 'products/mXIF9IWLVXIMjy1dydlUJkVVR4L52FfPo1BrpxZY.png', '581.00', '772.00', 'dfgdsfgdsf', 'asdrgedrf', 'dfgdfgdsf', '2024-10-05 02:27:24', '2024-10-05 02:30:34', 'lunch', 'In Stock'),
(30, 5, 5, 'Shrimps Tomato', 'hot', 'Architecto voluptate', 'products/OxWfbw4rQteR39UR9HNZQI0uWl2BvWZuL2lMmgRS.png', '581.00', '690.00', 'xcvbxcvxc', 'zdvxsfv', 'zxdfcbvxczvb', '2024-10-05 02:28:01', '2024-10-05 02:30:42', 'dinner', 'In Stock'),
(31, 5, 5, 'Boiled Egg', 'new', 'Architecto voluptate', 'products/aYL1bglbKg5w3agZI7A79C7ws7lgRaA7gdcXuZKN.png', '581.00', '772.00', 'dfgdfsfd', 'fdgdzfgdzf', 'dfgdffdfdfg', '2024-10-05 02:28:43', '2024-10-05 02:30:55', 'drinks', 'In Stock'),
(32, 5, 5, 'Barley Porridge', 'hot', 'Voluptate libero et', 'products/o9ztLNgqkfKEgVCFqE1ywHPvkn24K7Zdqs41jcJp.png', '601.00', '689.00', 'dfdfgdf', 'zdfgdzf', 'dfdfdfdf', '2024-10-05 02:29:17', '2024-10-05 02:31:06', 'dessert', 'In Stock'),
(33, 5, 5, 'Healthy Oatmeal', 'new', 'Architecto voluptate', 'products/vpUsmfm2D4Cqe62qKwKfpP4V2BUFqSpn3u37oYLb.png', '581.00', '689.00', 'dfhdfhfdg', 'xdfbhdfxgh', 'drgdfgfd', '2024-10-05 02:30:06', '2024-10-05 02:31:13', 'lunch', 'In Stock'),
(34, 6, 6, 'Barley Porridge', 'new', 'Officia ad asperiore', 'products/Vypk5Olzgs3PP9GJO18NpCB8fex2mA113kLgN8EL.png', '468.00', '690.00', 'dszfgdfgdf', 'sdfgsdsf', 'dfgdsfgdsfg', '2024-10-05 02:33:56', '2024-10-05 02:33:56', 'breakfast', 'In Stock'),
(35, 6, 6, 'Barley Porridge', 'new', 'Architecto voluptate', 'products/K623B4WewYxyLmmSU2Kqo3ggejq354hAcvzdq4IO.png', '647.00', '690.00', 'dfghdfghfdh', 'dfghfhbfgdh', 'sdfhbfd', '2024-10-05 02:35:15', '2024-10-05 02:37:36', 'lunch', 'In Stock'),
(36, 6, 6, 'Boiled Egg', 'new', 'Sed totam cillum ull', 'products/a3na6zC7ojf07q5cJkHd6BnCxYoDpfAEHSa53Xit.png', '139.00', '294.00', 'fghdsfghdf', 'dfghfsdghfd', 'dfhgfsdhfg', '2024-10-05 02:35:51', '2024-10-05 02:37:43', 'dinner', 'In Stock'),
(37, 6, 6, 'Chicken Galantine', 'new', 'Officia ad asperiore', 'products/N4MyrMEu7I7pH9pHtFcD3yGvyxqL8vbVOVsrhdZq.png', '601.00', '689.00', 'dfgdfgdfg', 'dfzgdfg', 'dfxgdfsgd', '2024-10-05 02:36:47', '2024-10-05 02:37:48', 'drinks', 'In Stock'),
(38, 6, 6, 'Sald Salmon', 'hot', 'Architecto voluptate', 'products/sYd9BsTI24XuyM0fLwm0AsWR8FNjcLNK1EeOIOT9.png', '139.00', '294.00', 'sgdsfgdsfgdg', 'zsdfgdfgdf', 'ssdgsdfg', '2024-10-05 02:37:25', '2024-10-05 02:37:53', 'dessert', 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `recents`
--

DROP TABLE IF EXISTS `recents`;
CREATE TABLE IF NOT EXISTS `recents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `information` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategories_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bangladesh', 'subcategories/S5MDQhw8jYALuzVTNgzz1uT4PRsZDxMcG0qo1NqG.jpg', NULL, '2024-10-05 01:14:34', '2024-10-05 01:14:34'),
(2, 2, 'Pakistan', 'subcategories/eb7IYnc7qswxOy3wa8yGQ9YKhXVEI03YNOqg2Wfd.jpg', NULL, '2024-10-05 01:14:56', '2024-10-05 01:14:56'),
(3, 3, 'Italy', 'subcategories/ZyBmjAWerMryPQIzOMLB27aabMApToyKM543XvGF.jpg', NULL, '2024-10-05 01:15:23', '2024-10-05 01:15:23'),
(4, 4, 'India', 'subcategories/LeCNMRMQ39AGzcnyydBNqTRrSWbLi2VTXrEoMpEX.jpg', NULL, '2024-10-05 01:15:50', '2024-10-05 01:15:50'),
(5, 5, 'Netherlands', 'subcategories/8txOTHkJf4RA2qtEoGW5h9TzrIzaaSQV586VjdWn.jpg', NULL, '2024-10-05 01:16:27', '2024-10-05 01:16:27'),
(6, 6, 'Romania', 'subcategories/eBnDpdrYfDSsqFqcaEvtlT2m5KW8SAPfWSn3tEsS.jpg', NULL, '2024-10-05 01:17:08', '2024-10-05 01:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `subscribecontacts`
--

DROP TABLE IF EXISTS `subscribecontacts`;
CREATE TABLE IF NOT EXISTS `subscribecontacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `summers`
--

DROP TABLE IF EXISTS `summers`;
CREATE TABLE IF NOT EXISTS `summers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usercontacts`
--

DROP TABLE IF EXISTS `usercontacts`;
CREATE TABLE IF NOT EXISTS `usercontacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `role` enum('admin','vendor','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `vendor_short_info` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `vendor_short_info`, `remember_token`, `created_at`, `updated_at`) VALUES
('bd52c6a4-722e-4703-9b43-92c06c268139', 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$IUXHpi5aCrGyYKrc7APgPeAgjvXzUHxoKhykow8ewxoRyza1O8ONO', NULL, NULL, NULL, 'admin', 'active', NULL, NULL, '2024-10-05 01:01:08', '2024-10-05 01:01:08'),
('e0f5b401-5dbd-44a9-9709-4de6c00b5d6b', 'Vendor', 'vendor', 'vendor@gmail.com', NULL, '$2y$10$OY2Wg504Lm6g8yPTMU/aVO.hvulQWYgzJzk2wLQn2x6hPTUxjijHW', NULL, NULL, NULL, 'vendor', 'active', NULL, NULL, '2024-10-05 01:01:08', '2024-10-05 01:01:08'),
('c576d599-33d4-4ab7-98dd-cb74995888b0', 'User', 'user', 'user@gmail.com', NULL, '$2y$10$bUht62tbWQlv6EIbMGSM.OdJ82AkNfp83/0bUc1nGwiw6zZcylTOW', NULL, NULL, NULL, 'user', 'active', NULL, NULL, '2024-10-05 01:01:08', '2024-10-05 01:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `winters`
--

DROP TABLE IF EXISTS `winters`;
CREATE TABLE IF NOT EXISTS `winters` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
