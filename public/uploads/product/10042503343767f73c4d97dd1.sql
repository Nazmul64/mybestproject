-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2025 at 04:49 PM
-- Server version: 8.0.41
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digiservzone_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `about_titel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_titel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_titel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamworking_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ourmission_titel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ourmission_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ourvission_titel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ourvission_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ouridea_titel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ouridea_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ouridea_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ourvission_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ourmission_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_summery_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `order_summery_id`, `name`, `phone`, `email`, `note`, `photo`, `created_at`, `updated_at`) VALUES
(1, 2, 'gdgdg', '01301689535', 'omsitbd@gmail.com', 'gdgdgdg', '1742460178.jpg', '2025-03-20 02:42:58', '2025-03-20 02:42:58'),
(2, 3, 'oms it', '01706640864', 'omsitbd@gmail.com', 'fsfsf', '1742460710.jpg', '2025-03-20 02:51:50', '2025-03-20 02:51:50'),
(3, 4, 'oms it', '01706640864', 'omsitbd@gmail.com', 'fsfsfsf', '1742461631.jpg', '2025-03-20 03:07:11', '2025-03-20 03:07:11'),
(4, 5, 'oms it', '01706640864', 'omsitbd@gmail.com', 'gdgdgdg', '1742463767.jpg', '2025-03-20 03:42:47', '2025-03-20 03:42:47'),
(5, 6, 'oms it', '01706640864', 'omsitbd@gmail.com', 'fsfsfsf', '1742466806.jpg', '2025-03-20 04:33:26', '2025-03-20 04:33:26'),
(6, 7, 'oms it', '01706640864', 'omsitbd@gmail.com', 'fsfsfsf', '1742468256.jpg', '2025-03-20 04:57:36', '2025-03-20 04:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('mahadihassanlged@gmail.com|103.140.83.162', 'i:1;', 1742484620),
('mahadihassanlged@gmail.com|103.140.83.162:timer', 'i:1742484620;', 1742484620),
('nazmulhossain3691215@gmail.com|103.140.83.162', 'i:1;', 1742485551),
('nazmulhossain3691215@gmail.com|103.140.83.162:timer', 'i:1742485551;', 1742485551);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL COMMENT 'customer-identifier',
  `product_id` int NOT NULL,
  `amount` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip` int NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `amount`, `created_at`, `updated_at`, `ip`, `price`) VALUES
(7, 26, 2, 1, '2025-03-20 15:55:59', '2025-03-20 15:55:59', 69, 330);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'PROXY', 'proxy', '1742485103.jpg', '1', '2025-03-20 05:33:04', '2025-03-20 15:38:23'),
(5, 'MAIL', 'mail', '1742485124.jpg', '1', '2025-03-20 05:33:23', '2025-03-20 15:38:44'),
(6, 'VERTUAL CARD', 'vertual-card', '1742485144.jpg', '1', '2025-03-20 05:34:04', '2025-03-20 15:39:04'),
(7, 'VPS', 'vps', '1742485175.jpg', '1', '2025-03-20 05:34:29', '2025-03-20 15:39:51'),
(8, 'VIRTUAL NUMBER  SITE', 'virtual-number-site', '1742485207.jpg', '1', '2025-03-20 05:34:48', '2025-03-20 15:40:07'),
(9, 'USA DL WITH SSN', 'usa-dl-with-ssn', '1742485229.jpg', '1', '2025-03-20 05:35:09', '2025-03-20 15:40:29'),
(10, 'USA BANK STATEMENT', 'usa-bank-statement', '1742485241.jpg', '1', '2025-03-20 05:35:30', '2025-03-20 15:40:41'),
(11, 'SSN', 'ssn', '1742485256.jpg', '1', '2025-03-20 05:35:50', '2025-03-20 15:40:56'),
(12, 'VPN', 'vpn', '1742485275.jpg', '1', '2025-03-20 05:36:04', '2025-03-20 15:41:15'),
(13, 'LLC', 'llc', '1742485299.jpg', '1', '2025-03-20 05:36:24', '2025-03-20 15:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percentage` int NOT NULL,
  `validity` date NOT NULL,
  `limit` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `mainabouts`
--

CREATE TABLE `mainabouts` (
  `id` bigint UNSIGNED NOT NULL,
  `about_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_compay_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_compay_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_mission_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_mission_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_mission_photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_vision_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_vision_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_vision_photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_13_180929_create_sliders_table', 1),
(5, '2025_02_14_040918_create_permission_tables', 1),
(6, '2025_02_17_184234_create_table_categories', 1),
(7, '2025_02_18_083247_create_subcategories_table', 1),
(8, '2025_02_18_130234_create_websettings_table', 1),
(9, '2025_02_19_060916_create_shippingmethods_table', 1),
(10, '2025_02_19_073231_create_seometatags_table', 1),
(11, '2025_02_19_093604_create_abouts_table', 1),
(12, '2025_02_19_131006_create_products_table', 1),
(13, '2025_02_23_173400_create_supporttexts_table', 1),
(14, '2025_02_24_173647_create_brands_table', 1),
(15, '2025_02_27_093412_create_wishlists_table', 1),
(16, '2025_03_01_185333_create_carts_table', 1),
(17, '2025_03_02_153856_create_coupons_table', 1),
(18, '2025_03_03_210504_create_paymentsetups_table', 1),
(19, '2025_03_04_095407_create_order_summeries_table', 1),
(20, '2025_03_04_102606_create_billing_details_table', 1),
(21, '2025_03_04_163749_create_order_details_table', 1),
(22, '2025_03_06_110643_add_delivered_to_order_order_summeries_table', 1),
(23, '2025_03_06_153235_create_ratings_table', 1),
(24, '2025_03_13_200810_create_mainabouts_table', 1),
(25, '2025_03_14_153223_create_contacts_table', 1),
(26, '2025_03_14_173748_create_paymentpolicies_table', 1),
(27, '2025_03_14_190052_create_privacies_table', 1),
(28, '2025_03_14_195247_create_termsandcondations_table', 1),
(29, '2025_03_17_184303_add_column_carts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_summery_id` int NOT NULL,
  `product_id` int NOT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_summery_id`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2025-03-20 02:43:01', '2025-03-20 02:43:01'),
(2, 3, 2, 1, '2025-03-20 02:51:54', '2025-03-20 02:51:54'),
(3, 4, 2, 1, '2025-03-20 03:07:16', '2025-03-20 03:07:16'),
(4, 5, 2, 1, '2025-03-20 03:42:52', '2025-03-20 03:42:52'),
(5, 6, 2, 1, '2025-03-20 04:33:32', '2025-03-20 04:33:32'),
(6, 7, 2, 1, '2025-03-20 04:57:41', '2025-03-20 04:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_summeries`
--

CREATE TABLE `order_summeries` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_total` int NOT NULL,
  `copon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_total` int NOT NULL DEFAULT '0',
  `sub_total` int NOT NULL,
  `payment_status` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deviled_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `order_summeries`
--

INSERT INTO `order_summeries` (`id`, `cart_total`, `copon_name`, `discount_total`, `sub_total`, `payment_status`, `user_id`, `created_at`, `updated_at`, `deviled_status`) VALUES
(6, 330, '', 0, 330, 0, 20, '2025-03-20 04:33:26', '2025-03-20 04:33:26', 0),
(7, 330, '', 0, 330, 0, 4, '2025-03-20 04:57:36', '2025-03-20 04:57:36', 0),
(8, 330, '', 0, 330, 0, 26, '2025-03-20 15:56:31', '2025-03-20 15:56:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `paymentpolicies`
--

CREATE TABLE `paymentpolicies` (
  `id` bigint UNSIGNED NOT NULL,
  `paymentmethod_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentmethod_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `paymentsetups`
--

CREATE TABLE `paymentsetups` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_type` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `bkash` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `binance` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `privacies`
--

CREATE TABLE `privacies` (
  `id` bigint UNSIGNED NOT NULL,
  `paymentmethod_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentmethod_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `product_name` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci,
  `product_details_description` longtext COLLATE utf8mb4_unicode_ci,
  `slug_name_description` longtext COLLATE utf8mb4_unicode_ci,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `multiple_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ips_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `sale_price` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `photo` longtext COLLATE utf8mb4_unicode_ci,
  `gallery_image` longtext COLLATE utf8mb4_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `is_advertise` tinyint(1) NOT NULL DEFAULT '1',
  `is_clothing` tinyint(1) NOT NULL DEFAULT '1',
  `is_trending` tinyint(1) NOT NULL DEFAULT '1',
  `is_featured` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `product_name`, `slug`, `product_id`, `product_description`, `product_details_description`, `slug_name_description`, `video_url`, `stock`, `multiple_name`, `ips_items`, `sale_price`, `photo`, `gallery_image`, `is_published`, `is_advertise`, `is_clothing`, `is_trending`, `is_featured`, `category_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(2, 'Dolorem cum sit et a', 'Dylan Soto', NULL, NULL, 'Consequuntur minima', NULL, '-AiWZaG', NULL, 5000, 'Yvette Solomon', '[\"69\"]', '[\"330\"]', '1742477818_1742455279_Produtc 1.jpg', '[\"1742460365_67dbd5cdb03b2.jpg\",\"1742477818_1742455279_Produtc 1.jpg\"]', 1, 1, 1, 1, 1, NULL, NULL, '2025-03-20 02:46:05', '2025-03-20 07:56:44'),
(4, 'fsfsfsfsfsffsfsf', 'Lorem Ipsum is simply dummy text of the printing', NULL, NULL, 'fsfsfsfsfsffsfsf', NULL, '-lpXUzK', NULL, 500, 'ggdg', '[\"1212\",\"21212\"]', '[\"2121\",\"21212\"]', '1742477854_1742455279_Produtc 1.jpg', '[\"1742476084_67dc13341d0b4.jpg\",\"1742477854_1742455279_Produtc 1.jpg\"]', 1, 1, 1, 1, 1, NULL, NULL, '2025-03-20 07:08:04', '2025-03-20 07:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `order_detials_id` int NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `seometatags`
--

CREATE TABLE `seometatags` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_focus_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0t5Y0A4iJKyLrAqKn2E37s16ApzaXrWWg0eqOkKf', 1, '103.140.83.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiN1dock1wS2ZvODM3YWhZTHNkMk9WZFpWZ1g2djdXNjJsYURsa1hiRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vZGlnaXNlcnZ6b25lLmNvbS9jYXRlZ29yeS9pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0MjQ4NDk2MTt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1742485648),
('1a736eItV4FO3I8pzKCgWjbPKlsKsxikL3xKrWgY', NULL, '43.135.142.7', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia01lVUFSaHR4TmJ1VzlTdXhpSXc0VnFkZXVkQ3pPWXVWbmdLcGpkUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuZGlnaXNlcnZ6b25lLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742483050),
('2Vth0H8MM2KX7gIUyfavsXUmXpWtvGIowIlZcVs4', NULL, '89.22.101.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXhEYW1JYzcxSFVQVGxzNGhCS1lVZkRIUHBQNTJWd1l1RHF0V0NEZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9kaWdpc2VydnpvbmUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742484566),
('43MBNpCe4RefWhTMZRexzkECQwJxFe569sfOG5br', NULL, '66.249.74.134', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.6998.88 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEVCeUo3UmcxYTIweU9rdFdnVkdmd21WbHM5UjhwbFM1N0pCS3oxdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vd3d3LmRpZ2lzZXJ2em9uZS5jb20vcHJvZHVjdC9kZXRhaWxzL25pZ2h0LXF1ZWVuLWJlYXV0eS1jcmVhbS16WG1HZUQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742488555),
('43XJnHsq4YMqFwjZqBR2JdWuROcYML8LLdojMpua', NULL, '178.63.190.211', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYk1VandQTDN0am9VWmlBT2ZvVWpCSXhxVUYyR1dxMlFNRjVKYmF5QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9kaWdpc2VydnpvbmUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742488670),
('6bkvtbEHTqij50qvovlPdtCuyCQOIh3MwtI4k3lZ', NULL, '20.120.134.35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFVzZW00SUFpSEFVaGdXQ0pQRVlNVVRaSFlueWRPaURQZmJrZ3dObyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTI1OiJodHRwczovL2RpZ2lzZXJ2em9uZS5jb20vcHJvZHVjdC9kZXRhaWxzL29yaWdpbmFsLWRvdWJsZS1wb2x5LW5ldy1zdHlsaXNoLWJsYWNrLXN1bmdsYXNzLWZvci1tZW4tMjAyNC1kYWJsLXBsaS1zYW5nbGFzLUZFZkZZVCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742483004),
('BFXIiFcc5TeYeuDImsBA3B505LZMWS8YEF2Wj9ng', NULL, '43.153.96.233', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTRKVFNOQUtvTGppaDhsVllnUVJZN0ZyRThzRXFBUnNJM1l3TEQ4MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93d3cuZGlnaXNlcnZ6b25lLmNvbS9jb250YWN0ZGV0YWlscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742488694),
('bYKbm4ZN0pESAGxbq2lq5K9UUaZiEbrNjZIrUXOZ', NULL, '103.140.83.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUg2VUlMUzNuYmVNOTNFRU5MdHJaTnNrVHVvMHd4SElCVnBnZzJEUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vZGlnaXNlcnZ6b25lLmNvbS9yZWdpc3RlciI7fX0=', 1742485206),
('CADjkvxqUMvUJVytIU4I6zHDnBpJgmYZ27fPQlww', NULL, '103.140.83.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHJ6TlNra21xeHltMjVFREhkZldwSUhmTjZ2cnFuY0ZacjRjMGVaWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9kaWdpc2VydnpvbmUuY29tL3JlZ2lzdGVyIjt9fQ==', 1742485008),
('cZEazz4BCDZ4MJo9ZgmCelIQfbYKbfeiLLBXPkNc', NULL, '178.63.190.211', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0xZT2R1NmNGakxSZEVqcVdxSjNjbHRZd1dBaDFqQUY3Y3hTRHRsdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9kaWdpc2VydnpvbmUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742486834),
('D8yP4I3kyzJhkSI16EmN3i0WI30MlJrVYtWPMUeH', NULL, '43.165.65.180', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicG9pV1JLY0Z3U0tVQWFoYXJOM0hUVnFzS1lvYUlldk1NQVI0NkVJQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly93d3cuZGlnaXNlcnZ6b25lLmNvbS90cmFtc2FuZGNvbmRhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742483823),
('fHZnvZPEfifpVd3nBMWM4UBlZtFCeAcveSRKzOv8', NULL, '103.134.56.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVUNoTmRPWjFoeVhuTlZJblFCYVBhZDgzUUNGRm90ZGFmd3dIYUdKRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742487348),
('FN8VRz1EZKnwHjtTQBlNLQN7KuewsBkRnj2WDJB8', NULL, '103.140.83.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSU9maWVpZHh6NjBoTUtQeWlZeHNlWXJCbXdCR24zRXpWblJnQkdFOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vZGlnaXNlcnZ6b25lLmNvbS9yZWdpc3RlciI7fX0=', 1742484582),
('GWVVGt3TiOXqAgZmcD8k9ZDFVmbKVWQ992Axj7mW', NULL, '43.173.1.69', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFp6aThCQVVTcVp4UnRLSnpRbkNhOGVjbWlydVlZbnpweDVPd05QeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuZGlnaXNlcnZ6b25lLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742483024),
('hgHMw8rOVnM2uaJKXn3dup48SFfFUt4ncREKaNef', NULL, '49.51.39.209', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0RGcmFUZ1BMM2xwRG14aDZlSXgyOTQ5NlhqU3l6MHYza1h3cW5CMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly93d3cuZGlnaXNlcnZ6b25lLmNvbS9wcm9kdWN0L2RldGFpbHMvLWxwWFV6SyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742486270),
('J86xSjnsPWXcHGwndVk5lXzmMDHYnOhpbnI3qyLV', NULL, '66.249.74.131', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.6998.88 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnZsdDhxMFAyS3QzcUZIWWJmaEhLdHliYXpKdWJWd0t0M0RuMFl4TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjY6Imh0dHBzOi8vd3d3LmRpZ2lzZXJ2em9uZS5jb20vcHJvZHVjdC9kZXRhaWxzL2h1cnJ5LXVwLW9ubHlzLUZMRWJ6YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742486763),
('L6jIaPRc8FUGVgxvMUe9xNy7lyr5Yl3HRs7dFtEs', NULL, '103.140.83.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWWU5amU0eXdNellWQ0xTaUF2TFJDa3JMTlM0a1I2MnFaUUtqdzMwQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGlnaXNlcnZ6b25lLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0MjQ4NjI4NTt9czoxMzoic19jb3Vwb25fbmFtZSI7czowOiIiO3M6MTI6InNfY2FydF90b3RhbCI7ZDozMzA7czoxNjoic19kaXNjb3VudF90b3RhbCI7aTowO30=', 1742486988),
('MgXNo0UAWULhSuYmet4lLHlMoowIkbHfLsYwAMib', NULL, '66.249.74.132', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.6998.88 Mobile Safari/537.36 (compatible; GoogleOther)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXZ4WDlCU1dyRmxoRmUwdGxGdkZMOVZMb25yWk53VmNldkUxbmZYbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vd3d3LmRpZ2lzZXJ2em9uZS5jb20vY2F0ZWdvcnkvMTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742486756),
('NZOrQEbwX0vusvbedp4W5iRrGTpPbIdXyedM0pZN', NULL, '43.167.157.80', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3N0d1E3ZXlIcXk2YUwyakN4WVJPRlI3Wld5amgwVlk2ZEVhNkFJSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93d3cuZGlnaXNlcnZ6b25lLmNvbS9jb250YWN0ZGV0YWlscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742485485),
('pDztCNUbgEWC9iVhaKXf7sE3fw7ihGxdesz23xlJ', NULL, '66.249.74.132', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.6998.88 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnNBVUtWMURUbm5wa0IyMzUwemJxR0g3SUtaVDZwQkZyWVpsbGlZaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Njc6Imh0dHBzOi8vd3d3LmRpZ2lzZXJ2em9uZS5jb20vcHJvZHVjdC9kZXRhaWxzL2h1cnJ5LXVwLW9ubHlzcy1rckVKdHIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742483154),
('r5jiqGaBrhuszHz27jVojQLbDEBOCJgArJukgkRI', NULL, '3.235.198.205', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:24.0) Gecko/20100101 Firefox/24.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGx4dHFzVGhQY2doNXg5ZWhERUMwakxPaEpMT3BKYlpGMWw4YWE0YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGlnaXNlcnZ6b25lLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742483653),
('rx8lA6PWGDXaQA5hhZw5R6LyMaAGUBrLLnJChZey', NULL, '178.63.190.211', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclJwOEpEdVRCbUhVckVwVUhvM2w1MkREbTN5d1VXQU5mOXcwUFdqeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9kaWdpc2VydnpvbmUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742483278),
('ssTEfxTtanr32YbpwBJwGaSRJmJ3Oj124zRxdd3s', NULL, '66.249.74.130', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.6998.88 Mobile Safari/537.36 (compatible; GoogleOther)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXpLZWV5NU9mV01WWFZVNzlRSjFLelYySlFHN0JFUVh0c0cweDlqQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vd3d3LmRpZ2lzZXJ2em9uZS5jb20vY2F0ZWdvcnkvMTUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742486770),
('Te4OzwU7NdfK90CMBvAvdrZ4uVzaNM7Q8tqHYsqh', NULL, '43.157.95.131', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieW5COFhIa3RRZWVndzVnRTNCbGxCWDVpUG1mMk5kcVVBSEl1anB2ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93d3cuZGlnaXNlcnZ6b25lLmNvbS9jb250YWN0ZGV0YWlscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742489252),
('TGd6ygcPZqa38hcwMs9316mDd1wdS1uEWDIjKAWK', NULL, '43.157.251.48', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1lydlBDbUxYZndkTHhZS1lVWEk5ZlAyTmo4M28wTmQxRzdkTTNGbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9kaWdpc2VydnpvbmUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742488004),
('ulnKfolOWAU1RP1sQqRaUXaUQ4dMAUKJGPNYbmIv', NULL, '170.106.140.110', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDJlR1NKeUlpRWdXdDQ2R3VPUkVlQ0htQ2hsdjkzc05BQnFuZGZvaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly93d3cuZGlnaXNlcnZ6b25lLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742484573),
('Un6Wy2fX8m2bmBm332pURQw8UnfcVypvBPvVlNz9', NULL, '103.140.83.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVplY1ZQNERTNXZUUHBuSFlKMTVUM3FRRUlwdXdiWGEzT0xTSHRSRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vZGlnaXNlcnZ6b25lLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742485510),
('ymtY1cms2M44RVRZyRtEYiJQPOHTIwbSuq72DEv5', NULL, '178.63.190.211', 'Python/3.11 aiohttp/3.9.2', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiam44cG44SVI5NGlNOHNhaFRmYkdta2tCeFlpN1RTdkJIcGU5VEc5SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9kaWdpc2VydnpvbmUuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742485012);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` bigint UNSIGNED NOT NULL,
  `shipping_method_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method_amount` decimal(8,2) NOT NULL,
  `is_active` bigint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `photo`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '1742485564.jpg', 0, '2025-03-20 15:46:04', '2025-03-20 15:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `supporttexts`
--

CREATE TABLE `supporttexts` (
  `id` bigint UNSIGNED NOT NULL,
  `free_fast_delivery_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free_fast_delivery_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_24_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_24_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_quality_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_quality_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gift_voucher_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gift_voucher_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `termsandcondations`
--

CREATE TABLE `termsandcondations` (
  `id` bigint UNSIGNED NOT NULL,
  `trams_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trams_title_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user','employee') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$khIu2MT2ot6NcMkxylZTheKTfLCiJLrpuhLvb21gvpNga4V1vHjZW', NULL, 'admin', 1, NULL, NULL),
(2, 'General User', 'user@gmail.com', NULL, '$2y$12$k/WCDIToNfoIFSHCuPX/KuWN2zJNddA9WobdvcrfVM1XxjuMqdtnK', NULL, 'user', 1, '2025-03-20 02:32:45', '2025-03-20 02:32:45'),
(3, 'Employee User', 'employee@gmail.com', NULL, '$2y$12$a1hYUc2umTDcc930c8VJw.GrR8RyMW6vtx0rCy.OSwik9h.w1YaPy', NULL, 'employee', 1, '2025-03-20 02:32:45', '2025-03-20 02:32:45'),
(4, 'oms it', 'omsitbd@gmail.com', '2025-03-20 03:43:59', '$2y$12$Pk9gcwaOcqTPeA5H.zU40Oe6C6aOtzXH0eemL4v6n8SScNSL0vpUy', 'wSY2SLfdx7Sk6A6Npie6J40t2Xm6aQgbFuiEHhz2', 'user', 1, '2025-03-20 02:42:21', '2025-03-20 15:44:59'),
(5, 'oms it', 'omsitbdsss@gmail.com', NULL, '$2y$12$bitIVKkG3CtFxjVfwja/HuPXflEALRpbDJPaVHQmxKwon138rQ8Y.', NULL, 'user', 1, '2025-03-20 03:38:14', '2025-03-20 03:38:14'),
(6, 'oms it', 'omsitbd123@gmail.com', NULL, '$2y$12$wgDgCibCoAZqGHJ3KwIjZuFynqaouzX3kn1.H4jADlQ71CKfv9I02', NULL, 'user', 1, '2025-03-20 03:48:28', '2025-03-20 03:48:28'),
(7, 'oms it', 'oms it', NULL, '$2y$12$3o.8iFHpuZEBz/5GXhKAFeN2Qemj7C.MGYSGNevtrb7TKlKkioWcu', '2xxFJ6YQMT2Ho4FdZ7WRpuKNbM8TzrFcQTD7CZNW', 'user', 1, '2025-03-20 04:07:53', '2025-03-20 04:07:53'),
(8, 'Shahu', 'Shahu', NULL, '$2y$12$mWjhI2ufG0iC3CVF8qkcROiGv1KFNG1o3.VrMtCPAiyJ/1Le/G1Ea', '9dSxUPIVxd9EKG6walgcpQNTenwLtHMKabQJKggZ', 'user', 1, '2025-03-20 04:09:52', '2025-03-20 04:09:52'),
(10, 'Bevis Gross', 'Bevis Gross', NULL, '$2y$12$HTqeu4veCBjVHYUA8YmyoO4Tr3/VrBYf85mZhcOGlnOXvFjeP9sXK', 'rcyBa7xFFeaVk51Ozm2Un38r8dOofm1SpwwyMmMj', 'user', 1, '2025-03-20 04:11:33', '2025-03-20 04:11:33'),
(12, 'Adele Vinson', 'Adele Vinson', NULL, '$2y$12$M7ufHEvEuvB8J/EPSqe9fOjM/Y/di/nKOCV9N.3U0ObgppzrxDvz6', 'zHo10yULptLhlSYDfZtPhhblVMHHj664S0Zr06Wa', 'user', 1, '2025-03-20 04:12:12', '2025-03-20 04:12:12'),
(14, 'Merrill Maldonado', 'Merrill Maldonado', NULL, '$2y$12$pzlNVkFlFVPeehsDoSnUKuOJHdNX61PQnl4loPbV4gu4i6qi.IKAW', 'TPiFxu8CL7QWPeSAPwTZaH75TPulxQ8uvAA95UHb', 'user', 1, '2025-03-20 04:13:09', '2025-03-20 04:13:09'),
(15, 'Eaton Wilson', 'lefix@mailinator.com', NULL, '$2y$12$0U9z4xGZj1jtrwm2hiK89u/K90HMYkd.RzHHRpRorrNzwLF39WkwG', 'vkHyBJNWnyNR7Mozur973roeV3yauw1LY9ScFm7D', 'user', 1, '2025-03-20 04:16:02', '2025-03-20 04:16:02'),
(16, 'Diana Schroeder', 'vipomukoq@mailinator.com', NULL, '$2y$12$hYTi4IgKkTL0cBAQrJhzgulgu7TILi2.8pBKw1iZbN8fUJ2yRB7QS', 'yznOoPEkoucjAIGuwpWgDT3LVxbCKDp7VjRy2gJ4', 'user', 1, '2025-03-20 04:17:02', '2025-03-20 04:17:02'),
(17, 'Clarke Church', 'sexow@mailinator.com', NULL, '$2y$12$wRnAMrqxZZYIPvcIKD56ve5.8KcXrfUMso36O0LX.m0r2tUytHCSS', 't2HmHubbW0TY9CQISHNjuDkqQjhgvBntYC7kTnxm', 'user', 1, '2025-03-20 04:21:54', '2025-03-20 04:21:54'),
(18, 'Wayne Mcneil', 'buwu@mailinator.com', NULL, '$2y$12$cktNFDtEOZvJmEUWEHp6uO5YvQVQVHOKaG8NxuIW5Sx7pckcLzgwi', 'llyjU0vA4EXQDM2wkXDZ8kER2CBqZ12qRwuqFTXH', 'user', 1, '2025-03-20 04:25:05', '2025-03-20 04:25:05'),
(19, 'Rooney Gilliam', 'jitina@mailinator.com', NULL, '$2y$12$LuyWIy5FCvw/lUOvmmDAPuR.nkaEwF6rdvu02PhMXVZY9WlYFPY8y', 'mQi7DNdGc3I8xRwErz0iNzLqYs3zG8QqJKk7OJaE', 'user', 1, '2025-03-20 04:27:14', '2025-03-20 04:27:14'),
(20, 'omsitbd', 'omsitbdsssaa@gmail.com', NULL, '$2y$12$ZlKDcSHy6KqFNaZoCVhADuYQJDVAxjcfAwVlnk74r.8fulLbEtWtq', 'lhEM8FbuDHUerxOtNEnhh8HXkuDCveWgh22Z4szA', 'user', 1, '2025-03-20 04:32:46', '2025-03-20 04:32:46'),
(21, 'Gareth Ashley', 'nobyp@mailinator.com', NULL, '$2y$12$Y9ZyZsXlwKVdidsgnfNmWu.orLlPNxFWWpUB4YLwgYpAPXfXLKseO', 'Twz7tyv4swi1CPKO5DDroFqkosCyPax8zZ3wlMh8', 'user', 1, '2025-03-20 05:16:18', '2025-03-20 05:16:18'),
(22, 'Yen Crosby', 'jisihal@mailinator.com', NULL, '$2y$12$OnXBswGNor3sqXyEOwIyVu.BVJuXgNbW7jkJgEwl4bYOS2gx2XSl.', '56MiSYj305T9ju27ah34aldSOWqnxXOr6hGNhJH3', 'user', 1, '2025-03-20 05:16:46', '2025-03-20 05:16:46'),
(23, 'nazmulhossain3691215', 'nazmulhossain3691215@gmail.com', '2025-03-20 05:23:40', '$2y$12$d3.UWNzBAZHqsQkoiPOnR.pZy1EQ1cyismeWrBpunq73phofiFkLq', 'p7cKd8LDFtkk3dWqxahkCEEbydE0zgwZB8o2Fjmo', 'user', 1, '2025-03-20 05:21:28', '2025-03-20 15:43:22'),
(24, 'oms it', 'omsorgbd@gmail.com', NULL, '$2y$12$g8b1r6FsKwLf4WwuYhpfjuvuEJscIA80TfLCeg37LrzzJCsIxSvCS', 'KLkenMdkbPtvSFkY7PhcMBWZHNm5vUV1kgK0xQKS', 'user', 1, '2025-03-20 14:49:13', '2025-03-20 15:21:43'),
(25, 'Md Mahadi Hassan', 'mehedihassan.verified@gmail.com', NULL, '$2y$12$lI5g34SNcR/EshQyqhyYIusF0IKA7Cohd7PEJz4pUv40IAjWnrUIa', 'AYMgq2Mb9IhJ4XfzlYYluCSshmAKTnW6CKCvcg47', 'user', 1, '2025-03-20 15:29:39', '2025-03-20 15:29:39'),
(26, 'Md Mahadi Hassan', 'omsitinstitute@gmail.com', NULL, '$2y$12$WmChr6W0NzY.76PUMsK5ouCDWvbTdhJbDLtL6OOwQvcvLTuK5ycFC', 'DN1IWV0YoxKeRm1pOddrJ4bJEjVaDQbfUTRAR1bOBZYrJCsv0QqgvJ36kjfa', 'user', 1, '2025-03-20 15:30:30', '2025-03-20 15:30:30'),
(27, 'Taherit Bd', 'nazmulhossain3691288@gmail.com', NULL, '$2y$12$lsuSdRX43ZtXIilUhu5hu.CTov6URkXUkMPBLVZNz3c8Q49ivfJbq', 'R1oVV6Lry2HlC7AKLSwIEyHiGSQa4RCUJOVL2QmU', 'user', 1, '2025-03-20 15:40:04', '2025-03-20 15:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `websettings`
--

CREATE TABLE `websettings` (
  `id` bigint UNSIGNED NOT NULL,
  `number1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkash_merchant_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkash_merchant_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_pixel_setup` text COLLATE utf8mb4_unicode_ci,
  `order_create_sms` text COLLATE utf8mb4_unicode_ci,
  `order_confirm_sms` text COLLATE utf8mb4_unicode_ci,
  `marquee_title` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Dumping data for table `websettings`
--

INSERT INTO `websettings` (`id`, `number1`, `number2`, `email`, `support_number`, `currency`, `bkash_merchant_one`, `bkash_merchant_two`, `facebook`, `twitter`, `youtube`, `whatsapp`, `instagram`, `photo`, `favicon_icon`, `payment_icon`, `facebook_pixel_setup`, `order_create_sms`, `order_confirm_sms`, `marquee_title`, `description`, `address`, `created_at`, `updated_at`) VALUES
(1, '01706640864', '01706640864', 'omsitbd@gmail.com', '01706640864', NULL, '01706640864', NULL, NULL, NULL, NULL, NULL, NULL, '1742477948_1742335007_Screenshot 2025-03-19 035613.png', '1742468485_WhatsApp Image 2025-03-18 at 13.33.17_05ed00e2.jpg', '1742477948_1742335007_Screenshot 2025-03-19 035613.png', NULL, NULL, NULL, NULL, NULL, 'House:74; Road: 5; Block: C; Mohanagar Project, Rampura, Dhaka-1212', '2025-03-20 02:34:00', '2025-03-20 07:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `innodb_system`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_name_unique` (`coupon_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainabouts`
--
ALTER TABLE `mainabouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_summeries`
--
ALTER TABLE `order_summeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `paymentpolicies`
--
ALTER TABLE `paymentpolicies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentsetups`
--
ALTER TABLE `paymentsetups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `privacies`
--
ALTER TABLE `privacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seometatags`
--
ALTER TABLE `seometatags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_name_unique` (`name`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `supporttexts`
--
ALTER TABLE `supporttexts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termsandcondations`
--
ALTER TABLE `termsandcondations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websettings`
--
ALTER TABLE `websettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mainabouts`
--
ALTER TABLE `mainabouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_summeries`
--
ALTER TABLE `order_summeries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paymentpolicies`
--
ALTER TABLE `paymentpolicies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentsetups`
--
ALTER TABLE `paymentsetups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacies`
--
ALTER TABLE `privacies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seometatags`
--
ALTER TABLE `seometatags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supporttexts`
--
ALTER TABLE `supporttexts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `termsandcondations`
--
ALTER TABLE `termsandcondations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `websettings`
--
ALTER TABLE `websettings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
