-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2022 at 04:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfect_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgot_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rand_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','general-admin','developer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general-admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `forgot_password`, `rand_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'developer@gmail.com', 'developer', NULL, NULL, NULL, 'admin', '2022-03-13 09:27:42', '2022-03-13 09:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `auths`
--

CREATE TABLE `auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgot_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rand_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','general-admin','developer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general-admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auths`
--

INSERT INTO `auths` (`id`, `name`, `email`, `password`, `image`, `forgot_password`, `rand_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'jakariya', 'jakariya@gmail.com', 'jakariya', NULL, NULL, NULL, 'admin', '2022-03-10 16:07:00', '2022-03-10 16:07:00'),
(2, 'developer', 'developer@gmail.com', 'developer', NULL, NULL, NULL, 'developer', '2022-03-10 16:56:50', '2022-03-10 16:56:50'),
(3, 'general-admin', 'general@gmail.com', 'general-admin', NULL, NULL, NULL, 'general-admin', '2022-03-10 16:56:50', '2022-03-10 16:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `short_desc`, `btn_name`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Damaka offer only for you-2', 'demo descdd', 'Shop Now', 'uploads/banner/banner1059223502.png', 'damaka-offer-only-for-you-2', 'active', '2022-02-27 22:44:45', '2022-03-08 21:27:51'),
(2, 'Damaka offer only for you', 'today damaka offer buy now.today damaka offer buy now.today damaka offer buy today damaka offer buy now.today damaka offer buy now.today damaka offer buy today damaka offer buy now.today damaka offer buy now.today damaka offer buy', 'see more', 'uploads/banner/banner1002557987.jpg', 'damaka-offer-only-for-you', 'active', '2022-02-27 22:56:17', '2022-03-09 06:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Adidas', 'adidas', 'uploads/Brand/Brand1084858142.png', 'active', '2022-02-27 00:21:58', '2022-03-08 21:32:00'),
(3, 'Nike', 'nike', 'uploads/Brand/Brand1108788032.png', 'active', '2022-03-08 21:52:04', '2022-03-08 21:52:04'),
(4, 'Icon', 'icon', 'uploads/Brand/Brand1021471818.jpg', 'active', '2022-03-08 21:52:39', '2022-03-08 21:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_attr_id` bigint(20) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_attr_id`, `user_id`, `user_type`, `qty`, `date`) VALUES
(64, 15, 29, '19', 'regi', '1', '03-10-22'),
(65, 13, 25, '17', 'regi', '1', '03-12-22'),
(66, 12, 22, '17', 'regi', '2', '03-12-22'),
(67, 11, 20, '17', 'regi', '2', '03-12-22'),
(68, 12, 23, '17', 'regi', '3', '03-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent_id`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Woman', NULL, 'woman', 'uploads/category/category1018312435.jpg', 'active', '2022-02-28 01:06:47', '2022-03-03 22:07:04'),
(4, 'ELECTROINIC', NULL, 'electroinic', 'uploads/category/category1044399550.jpg', 'active', '2022-02-28 01:08:32', '2022-03-03 22:06:13'),
(6, 'Mobile', 4, 'mobile', 'uploads/category/category1050761970.jpg', 'active', '2022-03-03 22:09:18', '2022-03-03 22:09:18'),
(7, 'Proudct', NULL, 'proudct', 'uploads/category/category1074348623.jpg', 'active', '2022-03-03 22:11:03', '2022-03-03 22:17:36'),
(8, 'Man', NULL, 'man', 'uploads/category/category1109976843.jpg', 'active', '2022-03-03 22:14:59', '2022-03-08 21:20:35'),
(9, 'Kitchen', NULL, 'kitchen', 'uploads/category/category1037551416.png', 'active', '2022-03-08 21:21:49', '2022-03-08 21:21:49'),
(10, 'Cosmatics', NULL, 'cosmatics', 'uploads/category/category1050410869.png', 'active', '2022-03-08 21:22:24', '2022-03-08 21:22:24'),
(11, 'Watch', NULL, 'watch', 'uploads/category/category1094575768.png', 'active', '2022-03-08 21:22:44', '2022-03-08 21:22:44'),
(12, 'Vagetables', NULL, 'vagetables', 'uploads/category/category1097747251.png', 'active', '2022-03-08 21:23:25', '2022-03-08 21:23:25'),
(13, 'Fruits', NULL, 'fruits', 'uploads/category/category1021273915.png', 'active', '2022-03-08 21:23:58', '2022-03-08 21:23:58'),
(14, 'Toys', NULL, 'toys', 'uploads/category/category1040037883.png', 'active', '2022-03-08 21:24:47', '2022-03-08 21:24:47'),
(15, 'Baby', 15, 'baby', 'uploads/category/category1026951865.jpg', 'active', '2022-03-08 21:25:00', '2022-03-08 22:00:31'),
(16, 'Gingger', NULL, 'gingger', 'uploads/category/category1011540313.png', 'active', '2022-03-08 22:01:09', '2022-03-08 22:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `created_at`, `updated_at`, `status`) VALUES
(3, 'Blue', '2022-02-27 05:26:34', '2022-02-27 05:29:27', 'active'),
(4, 'Green', '2022-02-27 05:29:45', '2022-02-27 05:29:45', 'active'),
(5, 'Pink', '2022-02-27 05:30:14', '2022-02-27 05:30:14', 'active'),
(6, 'danger', '2022-02-27 05:30:44', '2022-02-27 05:35:43', 'inactive'),
(7, 'orange', '2022-02-27 05:31:12', '2022-02-27 05:31:12', 'active'),
(8, 'succes', '2022-02-27 05:33:18', '2022-02-27 05:33:18', 'active'),
(9, 'Yellow', '2022-02-27 05:35:37', '2022-02-27 05:35:37', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mobile`, `desc`, `date`, `created_at`, `updated_at`) VALUES
(1, 'jakarkiay', '01601158098', 'jakarkiay', '12-03-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile`, `password`, `image`, `created_at`, `updated_at`) VALUES
(17, 'developer', '01601158098', 'eyJpdiI6ImV5SCs4STI0L09LRldjUG1IUGJYalE9PSIsInZhbHVlIjoiNXlCd21VRlZUbmV6c3lIc3dyK1Jnc05IMDlQYUE2TzFVaXpqYU5vdGZxbz0iLCJtYWMiOiJkMTkwODc3MTNkN2UwNWZiNjNiMzU3MWJiZjlkOGFiM2Q5ZTBmN2NlNmQ5NTA5MDNhZjdmNjJmMWQyNjBmMWM4IiwidGFnIjoiIn0=', 'frontend/assets/img/profile-icon.png', NULL, NULL),
(18, 'Jakariya', '01771158098', 'eyJpdiI6IjErMHVyNjErOC9LTnptdDFwRU9wOEE9PSIsInZhbHVlIjoiRFlGaENJM2RsQTVlb2VUbVBoWkpvdz09IiwibWFjIjoiMjk1OThlZTE1MjU4NzQ3OGUwNGI2ZmU1NTBhNDAwZTNhYTRhNGI4YjU2Y2U5OGVlNmMwOGU2NGFiZGU2ZjViZiIsInRhZyI6IiJ9', 'frontend/assets/img/profile-icon.png', NULL, NULL),
(19, 'demo user', '01771158090', 'eyJpdiI6IjB4R3Z4dXA1bkxzbDM0YXZuUnQ1YkE9PSIsInZhbHVlIjoiN09JY25JSmd3d3REOUp2V3JjVFpmdz09IiwibWFjIjoiYzE4YzMwN2IxOWEzMjc3YzgwNDJmMTk1MzQ2MmUzY2Y3MWY5ZWRmMzI2MWUwNDU4NzcxZmIzYWI2ZDRhYzQ3ZSIsInRhZyI6IiJ9', 'frontend/assets/img/profile-icon.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_26_130827_create_brands_table', 1),
(6, '2022_02_27_094046_create_sizes_table', 2),
(7, '2022_02_27_102826_create_colors_table', 3),
(8, '2022_02_27_112149_create_colors_table', 4),
(9, '2022_02_28_015441_create_sliders_table', 5),
(10, '2022_02_28_020957_create_sliders_table', 6),
(11, '2022_02_28_035153_create_banners_table', 7),
(12, '2022_02_28_061415_create_categories_table', 8),
(13, '2022_03_01_034836_create_products_table', 9),
(14, '2022_03_01_102414_product_atts', 10),
(15, '2022_03_01_132205_product_atts', 11),
(16, '2022_03_02_044249_products', 12),
(17, '2022_03_02_044554_product_atts', 12),
(18, '2022_03_05_083145_create_carts_table', 13),
(19, '2022_03_05_084420_carts', 14),
(20, '2022_03_07_020318_create_customers_table', 15),
(21, '2022_03_07_090135_order', 16),
(22, '2022_03_07_091645_order_details', 16),
(23, '2022_03_07_130927_order', 17),
(24, '2022_03_08_023532_orders', 18),
(25, '2022_03_08_023724_order_details', 18),
(26, '2022_03_10_151314_create_auths_table', 19),
(27, '2022_03_12_044614_create_contacts_table', 20),
(28, '2022_03_13_092336_admins', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rand_order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_track_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` enum('pending','on-the-way','success') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `payment_type`, `payment_status`, `total_amount`, `rand_order_id`, `delivery_info`, `add_track_info`, `date`, `order_status`, `created_at`, `updated_at`) VALUES
(5, 18, 'CasOnDelivery', 'Hand Case', '1260', 'order_id457024797', 'dhaka,sabar,road.120,flor-2', NULL, '', 'pending', NULL, NULL),
(6, 18, 'CasOnDelivery', 'Hand Case', '700', 'order_id668502479', 'delivery info', NULL, '08-03-22', 'success', NULL, NULL),
(8, 17, 'CasOnDelivery', 'Hand Case', '700', 'order_id700482255', 'nice location', NULL, '09-03-22', 'success', NULL, NULL),
(9, 17, 'CasOnDelivery', 'Hand Case', '100', 'order_id985245527', 'ggddd', NULL, '09-03-22', 'pending', NULL, NULL),
(10, 17, 'CasOnDelivery', 'Hand Case', '900', 'order_id423625872', 'ddd', NULL, '09-03-22', 'pending', NULL, NULL),
(12, 19, 'CasOnDelivery', 'Hand Case', '410', 'order_id712006499', 'demo location', NULL, '09-03-22', 'on-the-way', NULL, NULL),
(13, 19, 'CasOnDelivery', 'Hand Case', '100', 'order_id220170827', 'demo delivery location', NULL, '10-03-22', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_attr_id` bigint(20) NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_attr_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(5, 4, 6, 5, '1', '120', NULL, NULL),
(6, 4, 6, 7, '1', '140', NULL, NULL),
(7, 4, 6, 6, '4', '130', NULL, NULL),
(8, 5, 7, 9, '1', '400', NULL, NULL),
(9, 5, 7, 8, '1', '400', NULL, NULL),
(10, 5, 7, 10, '3', '420', NULL, NULL),
(11, 6, 7, 8, '2', '350', NULL, NULL),
(13, 8, 7, 8, '2', '350', NULL, NULL),
(14, 9, 9, 15, '1', '100', NULL, NULL),
(15, 10, 14, 27, '3', '300', NULL, NULL),
(18, 12, 10, 17, '3', '400', NULL, NULL),
(19, 12, 10, 18, '1', '410', NULL, NULL),
(20, 13, 10, 17, '3', '400', NULL, NULL),
(21, 13, 11, 20, '1', '25', NULL, NULL),
(22, 13, 15, 29, '1', '200', NULL, NULL),
(23, 13, 9, 14, '1', '100', NULL, NULL),
(24, 13, 9, 16, '1', '90', NULL, NULL),
(25, 13, 9, 15, '1', '100', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `sub_cat_id` bigint(20) DEFAULT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `size_id` bigint(20) DEFAULT NULL,
  `color_id` bigint(20) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_id` bigint(20) DEFAULT NULL,
  `slider_id` bigint(20) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `cat_id`, `sub_cat_id`, `brand_id`, `size_id`, `color_id`, `price`, `mrp`, `description`, `image`, `warranty`, `banner_id`, `slider_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(7, 'most offer product new bran collected', 'most offer product new bran collected', 8, 6, 2, 3, 6, '450', '400', '<p><strong>most offer product new bran collected/most offer product new bran collectedmost offer product new bran collected/most offer product new bran collectedmost offer product new bran collected/most offer product new bran collectedmost offer product new bran collected/most offer product new bran collectedmost offer product new bran collected/most offer product new bran collectedmost offer product new bran collected/most offer product new bran collectedmost offer product new bran collected/most offer product new bran collectedmost offer product new bran collected/most offer product new bran collected</strong></p>', 'uploads/product/1646746601id7.jpg', 'yes', 2, 2, '03-08-22', 'active', '2022-03-04 04:30:40', '2022-03-08 07:36:41'),
(9, 'Babay shirt for the Kids', 'Babay shirt for the Kids', 15, 6, 3, 3, 9, '120', '100', '<p><i>baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.baby tshirt.</i></p>', 'uploads/product/1646798298id0.jpg', 'no', 2, 2, '03-09-22', 'active', '2022-03-08 21:58:19', '2022-03-08 21:58:19'),
(10, 'Mant black hand watch', 'Mant black hand watch', 8, 6, 3, 6, 9, '500', '450', '<p>new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.new man watchy.</p>', 'uploads/product/1646798719id0.png', 'no', 2, 2, '03-09-22', 'active', '2022-03-08 22:05:19', '2022-03-08 22:05:19'),
(11, 'Yelllow Top poly bad', 'Yelllow Top poly bad', 7, 6, 3, 6, 9, '4', '35', '<p>demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .</p>', 'uploads/product/1646798996id0.jpg', 'no', 2, 2, '03-09-22', 'active', '2022-03-08 22:09:56', '2022-03-08 22:09:56'),
(12, 'Nutela Nodoles(2pc) free 1 tree chamoc', 'Nutela Nodoles(2pc) free 1 tree chamoc', 9, 16, 2, 5, 9, '50', '40', '<p>demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .</p>', 'uploads/product/1646799264id0.png', 'no', 2, 2, '03-09-22', 'active', '2022-03-08 22:14:25', '2022-03-08 22:14:25'),
(13, '1kg lades pinger only today', '1kg lades pinger only today', 12, 16, 2, 3, 4, '40', '3.5', '<p>demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .</p>', 'uploads/product/1646799457id0.png', 'no', 2, 2, '03-09-22', 'active', '2022-03-08 22:17:37', '2022-03-08 22:17:37'),
(14, 'Boby Oil for Girl,women,chil best product', 'Boby Oil for Girl,women,chil best product', 10, 6, 3, 6, 4, '200', '180', '<p>demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .</p>', 'uploads/product/1646799698id0.png', 'no', 2, 2, '03-09-22', 'active', '2022-03-08 22:21:38', '2022-03-08 22:21:38'),
(15, '1kg Grapps only 200 tk', '1kg Grapps only 200 tk', 13, 15, 3, 5, 8, '250', '200', '<p>demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .demo description demo description demo description demo description demo description .</p>', 'uploads/product/1646799938id0.png', 'no', 2, 2, '03-09-22', 'active', '2022-03-08 22:25:38', '2022-03-08 22:25:38'),
(16, 'edit demo product', 'edit demo product', 12, 6, 2, 5, 9, '120', '100', '<p>demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.demo product description.</p>', 'uploads/product/1646812118id16.jpg', 'no', 2, 3, '03-09-22', 'inactive', '2022-03-09 01:42:49', '2022-03-09 01:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_atts`
--

CREATE TABLE `product_atts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `attr_size` bigint(20) DEFAULT NULL,
  `attr_color` bigint(20) DEFAULT NULL,
  `attr_mrp` int(11) DEFAULT NULL,
  `attr_price` int(11) DEFAULT NULL,
  `attr_qty` int(11) DEFAULT NULL,
  `attr_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_atts`
--

INSERT INTO `product_atts` (`id`, `product_id`, `attr_size`, `attr_color`, `attr_mrp`, `attr_price`, `attr_qty`, `attr_image`) VALUES
(5, 6, 6, 7, 110, 120, 4, 'uploads/AttrImage/1646389607614510410.png'),
(6, 6, 4, 5, 120, 130, 12, 'uploads/AttrImage/1646389607411668040.jpg'),
(7, 6, 5, 4, 130, 140, 6, 'uploads/AttrImage/1646389607432582633.jpg'),
(8, 7, 6, 9, 350, 400, 1, 'uploads/AttrImage/1646389840286058777.jpg'),
(14, 9, 6, 5, 100, 120, 5, 'uploads/AttrImage/1646798299675922696.png'),
(15, 9, 5, 7, 100, 140, 2, 'uploads/AttrImage/1646798299985794665.png'),
(16, 9, 6, 9, 90, 100, 4, 'uploads/AttrImage/1646798299872031918.jpg'),
(17, 10, 6, 3, 400, 480, 2, 'uploads/AttrImage/1646798720909344720.png'),
(18, 10, 1, 5, 410, 420, 2, 'uploads/AttrImage/1646798720195567381.png'),
(19, 10, 5, 9, 420, 500, 2, 'uploads/AttrImage/1646798720349623524.png'),
(20, 11, 4, 7, 25, 30, 4, 'uploads/AttrImage/1646798997346530191.jpg'),
(21, 11, 5, 7, 25, 40, 1, 'uploads/AttrImage/1646798997904127147.jpg'),
(22, 12, 3, 3, 50, 60, 4, 'uploads/AttrImage/1646799265697422361.png'),
(23, 12, 6, 9, 35, 40, 14, 'uploads/AttrImage/1646799265670246920.png'),
(24, 12, 1, 4, 40, 40, 1, 'uploads/AttrImage/1646799265692936843.png'),
(25, 13, 6, 4, 35, 40, 12, NULL),
(26, 13, 3, 6, 35, 45, 40, 'uploads/AttrImage/1646799457812114323.png'),
(27, 14, 5, 9, 300, 350, 5, 'uploads/AttrImage/1646799698745051543.png'),
(28, 14, 1, 6, 200, 240, 2, 'uploads/AttrImage/1646799698212078132.png'),
(29, 15, 5, 9, 200, 250, 50, 'uploads/AttrImage/1646799938932671824.png'),
(31, 16, 5, 9, 100, 120, 5, 'uploads/AttrImage/1646811769682168989.png'),
(32, 16, 4, 5, 400, 450, 4, 'uploads/AttrImage/1646811770522821726.png');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MM', 'active', '2022-02-27 04:17:40', '2022-02-27 04:17:40'),
(3, 'XL', 'active', '2022-02-27 05:05:09', '2022-02-27 05:05:09'),
(4, 'lg', 'active', '2022-02-27 05:05:28', '2022-02-27 05:05:28'),
(5, 'SM', 'active', '2022-02-27 05:05:39', '2022-02-27 05:05:39'),
(6, 'xs', 'active', '2022-02-27 05:06:28', '2022-02-27 05:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `price`, `short_desc`, `image`, `btn_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New Poly bad. summer collection product -2', '80', 'new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.new perfectbd online shop.', 'uploads/Slider/Slider1041735263.jpg', 'shop now', 'new-poly-bad-summer-collection-product-2', 'active', '2022-02-27 20:58:56', '2022-03-08 21:26:56'),
(2, 'New Poly bad. summer collection product', '120', 'new descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew descriptionnew description', 'uploads/Slider/Slider1079537218.jpg', 'Order Now', 'new-poly-bad-summer-collection-product', 'active', '2022-02-27 21:50:23', '2022-03-03 22:18:52'),
(3, 'demo slide', '450', 'demo slide add title', 'uploads/Slider/Slider1033405086.jpg', 'demo button', 'demo-slide', 'inactive', '2022-03-09 01:33:21', '2022-03-09 06:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `auths`
--
ALTER TABLE `auths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auths_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
-- Indexes for table `product_atts`
--
ALTER TABLE `product_atts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auths`
--
ALTER TABLE `auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_atts`
--
ALTER TABLE `product_atts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
