-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2026 at 01:57 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-samiralsaied07@gmail.com|127.0.0.1', 'i:4;', 1770339060),
('laravel-cache-samiralsaied07@gmail.com|127.0.0.1:timer', 'i:1770339060;', 1770339060),
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:43:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:18:\"الاعدادات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:20:\"المستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:27:\"اضافة مستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:27:\"تعديل مستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:23:\"حذف مستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:27:\"عرض المستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"الصلاحيات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:23:\"اضافة صلاحية\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:23:\"تعديل صلاحية\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:19:\"حذف صلاحية\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:27:\"اعدادت السيستم\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:14:\"الاقسام\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:17:\"اضافة صنف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"تعديل صنف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:13:\"حذف صنف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:13:\"عرض صنف\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:16:\"المنتجات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:19:\"اضافة منتج\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:19:\"تعديل منتج\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:15:\"حذف منتج\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:15:\"عرض منتج\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:16:\"الطاولات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:23:\"اضافة طاولات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:23:\"تعديل طاولات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:19:\"حذف طاولات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:23:\"عرض الطاولات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:16:\"الحجوزات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:23:\"اضافة حجوزات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:23:\"تعديل حجوزات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:19:\"حذف حجوزات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:23:\"عرض الحجوزات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:5;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:14:\"الطلبات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:8;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:21:\"اضافة طلبات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:21:\"تعديل طلبات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:17:\"حذف طلبات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:21:\"عرض الطلبات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:8;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:30:\"تحديث حالة الطلب\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:12:\"المطبخ\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:9;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:30:\"عرض طلبات المطبخ\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:9;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:45:\"تحديث حالة الطلب بالمطبخ\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:9;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:16:\"التقارير\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:23:\"عرض التقارير\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:14:\"الكاشير\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:8;}}}s:5:\"roles\";a:4:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:6:\"waiter\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:8;s:1:\"b\";s:7:\"Cashier\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:9;s:1:\"b\";s:13:\"Kitchen Staff\";s:1:\"c\";s:3:\"web\";}}}', 1770582545);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'الساندوتشات', '2026-01-25 22:46:10', '2026-01-25 22:46:10'),
(3, 'المكرونات', '2026-01-25 22:46:28', '2026-01-25 22:46:28'),
(4, 'البيتزا', '2026-01-25 22:46:47', '2026-01-25 22:46:47'),
(5, 'الوجبات', '2026-01-25 22:47:02', '2026-01-25 22:47:16'),
(6, 'المشروبات', '2026-01-25 22:47:29', '2026-01-25 22:47:29'),
(7, 'الحلويات', '2026-01-25 22:47:37', '2026-01-25 22:47:37');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_21_031309_create_permission_tables', 1),
(5, '2026_01_22_200628_create_categories_table', 1),
(6, '2026_01_23_004145_create_products_table', 1),
(7, '2026_01_23_230825_create_tables_table', 1),
(8, '2026_01_23_232009_create_reservations_table', 1),
(9, '2026_01_30_020802_create_orders_table', 1),
(10, '2026_01_30_195405_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 4),
(9, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `table_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','preparing','ready','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `table_id`, `user_id`, `status`, `total`, `created_at`, `updated_at`) VALUES
(46, NULL, 1, 'completed', 34.00, '2026-02-08 00:23:52', '2026-02-08 00:24:06'),
(47, 1, 1, 'pending', 23.00, '2026-02-08 00:24:25', '2026-02-08 00:24:25'),
(48, NULL, 1, 'completed', 988.00, '2026-02-08 01:41:15', '2026-02-08 01:41:25'),
(49, 1, 1, 'pending', 49.00, '2026-02-08 01:42:22', '2026-02-08 01:42:22'),
(50, NULL, 1, 'pending', 30.00, '2026-02-08 01:45:17', '2026-02-08 01:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(96, 46, 3, 1, 7.00, '2026-02-08 00:23:52', '2026-02-08 00:23:52'),
(97, 46, 4, 1, 8.00, '2026-02-08 00:23:52', '2026-02-08 00:23:52'),
(98, 46, 11, 1, 19.00, '2026-02-08 00:23:52', '2026-02-08 00:23:52'),
(99, 47, 5, 1, 15.00, '2026-02-08 00:24:25', '2026-02-08 00:24:25'),
(100, 47, 4, 1, 8.00, '2026-02-08 00:24:25', '2026-02-08 00:24:25'),
(101, 48, 3, 1, 7.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(102, 48, 4, 1, 8.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(103, 48, 5, 1, 15.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(104, 48, 7, 1, 12.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(105, 48, 10, 2, 30.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(106, 48, 11, 2, 19.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(107, 48, 14, 2, 200.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(108, 48, 13, 2, 140.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(109, 48, 9, 1, 120.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(110, 48, 12, 1, 8.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(111, 48, 16, 1, 20.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(112, 48, 17, 1, 20.00, '2026-02-08 01:41:15', '2026-02-08 01:41:15'),
(113, 49, 11, 1, 19.00, '2026-02-08 01:42:22', '2026-02-08 01:42:22'),
(114, 49, 3, 1, 7.00, '2026-02-08 01:42:22', '2026-02-08 01:42:22'),
(115, 49, 4, 1, 8.00, '2026-02-08 01:42:22', '2026-02-08 01:42:22'),
(116, 49, 5, 1, 15.00, '2026-02-08 01:42:22', '2026-02-08 01:42:22'),
(117, 50, 3, 1, 7.00, '2026-02-08 01:45:17', '2026-02-08 01:45:17'),
(118, 50, 4, 1, 8.00, '2026-02-08 01:45:17', '2026-02-08 01:45:17'),
(119, 50, 5, 1, 15.00, '2026-02-08 01:45:17', '2026-02-08 01:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'الاعدادات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(2, 'المستخدمين', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(3, 'اضافة مستخدمين', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(4, 'تعديل مستخدمين', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(5, 'حذف مستخدمين', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(6, 'عرض المستخدمين', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(7, 'الصلاحيات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(8, 'اضافة صلاحية', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(9, 'تعديل صلاحية', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(10, 'حذف صلاحية', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(11, 'اعدادت السيستم', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(12, 'الاقسام', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(13, 'اضافة صنف', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(14, 'تعديل صنف', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(15, 'حذف صنف', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(16, 'عرض صنف', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(17, 'المنتجات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(18, 'اضافة منتج', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(19, 'تعديل منتج', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(20, 'حذف منتج', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(21, 'عرض منتج', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(22, 'الطاولات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(23, 'اضافة طاولات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(24, 'تعديل طاولات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(25, 'حذف طاولات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(26, 'عرض الطاولات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(27, 'الحجوزات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(28, 'اضافة حجوزات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(29, 'تعديل حجوزات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(30, 'حذف حجوزات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(31, 'عرض الحجوزات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(32, 'الطلبات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(33, 'اضافة طلبات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(34, 'تعديل طلبات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(35, 'حذف طلبات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(36, 'عرض الطلبات', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(37, 'تحديث حالة الطلب', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(38, 'المطبخ', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(39, 'عرض طلبات المطبخ', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(40, 'تحديث حالة الطلب بالمطبخ', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(41, 'التقارير', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(42, 'عرض التقارير', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(43, 'الكاشير', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `image`, `price`, `created_at`, `updated_at`) VALUES
(3, 'ساندوتش فول', 2, '1769395982_download.jpg', 7, '2026-01-25 22:53:02', '2026-01-25 22:53:02'),
(4, 'ساندوتش  طعمية', 2, '1769396025_download.jpg', 8, '2026-01-25 22:53:45', '2026-01-25 22:53:45'),
(5, 'ساندوتش فارم بالكاتشب والمايونيز', 2, '1769396067_download (1).jpg', 15, '2026-01-25 22:54:27', '2026-01-25 22:54:27'),
(6, 'ساندوتش رومى سوبر', 2, '1769396129_download (2).jpg', 15, '2026-01-25 22:55:29', '2026-01-25 22:55:29'),
(7, 'ساندوتش حلاوة سادة', 2, '1770496233_download.jpg', 12, '2026-01-25 22:56:07', '2026-02-07 20:30:33'),
(8, 'ساندوتش شاورما دجاج سوري', 2, '1769396230_download (3).jpg', 25, '2026-01-25 22:57:10', '2026-01-25 22:57:10'),
(9, 'بيتزا جمبرى', 4, '1769396352_download (4).jpg', 120, '2026-01-25 22:59:12', '2026-01-25 22:59:12'),
(10, 'مكرونة شاورما فراخ', 3, '1769396397_download.jpg', 30, '2026-01-25 22:59:57', '2026-01-25 22:59:57'),
(11, 'بيبسي', 6, '1769396924_download (6).jpg', 19, '2026-01-25 23:00:44', '2026-01-25 23:08:44'),
(12, 'مياه صغيرة', 6, '1769396904_download (5).jpg', 8, '2026-01-25 23:01:22', '2026-01-25 23:08:24'),
(13, 'وجبة فراخ مشوية', 5, '1769397034_download (10).jpg', 140, '2026-01-25 23:03:20', '2026-01-25 23:10:34'),
(14, 'وجبة مشكل كباب', 5, '1769397067_download (11).jpg', 200, '2026-01-25 23:03:59', '2026-01-25 23:11:07'),
(15, 'ارز بلبن سادة', 7, '1769396978_download (8).jpg', 20, '2026-01-25 23:05:11', '2026-01-25 23:09:38'),
(16, 'قطعه بسبوسة', 7, '1769396950_download (7).jpg', 20, '2026-01-25 23:05:48', '2026-01-25 23:09:10'),
(17, 'قطعه جلاش', 7, '1769397006_download (9).jpg', 20, '2026-01-25 23:06:14', '2026-01-25 23:10:06'),
(20, 'Lael Gutierrez', 4, 'default.jpg', 760, '2026-02-06 01:04:27', '2026-02-06 01:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_count` int NOT NULL,
  `table_id` bigint UNSIGNED NOT NULL,
  `status` enum('في الانتظار','تم الحجز','اكتمل الطلب','ملغي') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'في الانتظار',
  `datetime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `customer_name`, `phone`, `guest_count`, `table_id`, `status`, `datetime`, `created_at`, `updated_at`) VALUES
(1, 'باشمهندس محمد غنيم', '01225399152', 1, 1, 'تم الحجز', '2026-02-04 01:17:00', '2026-02-03 23:17:16', '2026-02-08 00:20:06'),
(2, 'باشمهندس زياد', '01225399159', 1, 2, 'تم الحجز', '2026-02-04 01:17:00', '2026-02-03 23:17:40', '2026-02-08 00:18:48');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-02-03 21:57:17', '2026-02-03 21:57:17'),
(5, 'waiter', 'web', '2026-02-03 23:16:23', '2026-02-03 23:16:23'),
(8, 'Cashier', 'web', '2026-02-03 23:46:16', '2026-02-03 23:46:16'),
(9, 'Kitchen Staff', 'web', '2026-02-03 23:48:46', '2026-02-03 23:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(22, 5),
(24, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(31, 5),
(32, 8),
(36, 8),
(43, 8),
(38, 9),
(39, 9),
(40, 9);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vaPnOUVjJlqft8o9VJB6GbdYK6EpQChCDj8Qfo0I', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSmJxOVRvOVBWUnNzdncxTlhYdWJweHB5akhzZXRUZUREZjdjek1lcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1770515777);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_guests` int NOT NULL DEFAULT '1',
  `max_guests` int NOT NULL DEFAULT '4',
  `status` enum('متاحة','مشغولة','محجوزة') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'متاحة',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `number`, `min_guests`, `max_guests`, `status`, `created_at`, `updated_at`) VALUES
(1, 'C11', 1, 4, 'محجوزة', '2026-02-03 22:04:35', '2026-02-08 01:42:23'),
(2, 'C25', 1, 3, 'متاحة', '2026-02-03 22:47:05', '2026-02-08 00:24:48');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'samir', 'samir@gamil.com', NULL, '$2y$12$knRXUcql1slrjGTXxQ6M4eRXhkWRhLj6gqycj4VlQnFpD5mf8tXSS', 'ETOAu8K72xKQy9ljllXIkUZQ9B48Nk0zl0Fcg3m4r8LgadYbRhzRwvfdD3hm', '2026-02-03 21:57:18', '2026-02-03 21:57:18'),
(3, 'ahmed', 'ahmed@gamil.com', NULL, '$2y$12$IabvpklgCPWpeaebBU1Nye5lADh/zvhvivTqHyMjO6kzszuoMMh3W', NULL, '2026-02-03 22:42:13', '2026-02-03 23:16:37'),
(4, 'محمد', 'mohamed@gmail.com', NULL, '$2y$12$ge34oeJaG329AUtLL.Alx.W7.zUW6DfSasSlDsKIpKHHbbZaLCA3C', NULL, '2026-02-03 23:21:48', '2026-02-03 23:21:48'),
(5, 'على', 'ali@gamil.com', NULL, '$2y$12$mrwMpAp/8DZlI0TYQlzbo.xsdUop5WCaCDFcviXFiVuNilod85kyi', NULL, '2026-02-03 23:49:10', '2026-02-03 23:49:10');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_table_id_foreign` (`table_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_table_id_foreign` (`table_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tables_number_unique` (`number`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
