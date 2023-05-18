-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 07:53 PM
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
-- Database: `admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmissions`
--

CREATE TABLE `addmissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applied_for` varchar(255) NOT NULL,
  `applied_for_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `student_info` longtext NOT NULL,
  `residential_info` longtext NOT NULL,
  `prev_school_info` longtext NOT NULL,
  `father_info` text NOT NULL,
  `mother_info` text NOT NULL,
  `sibling_info` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addmissions`
--

INSERT INTO `addmissions` (`id`, `applied_for`, `applied_for_id`, `user_id`, `student_info`, `residential_info`, `prev_school_info`, `father_info`, `mother_info`, `sibling_info`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Schools', 4, 7, '{\"dob\":\"2023-04-09T18:00:59.467Z\",\"category\":\"general\",\"mother_tounge\":\"hindi\",\"name\":\"Gsmdkodmbgomdn\",\"father_name\":\"H de odnkxk\",\"mother_name\":\"Isj soond b\",\"adhar_no\":\"6467995846343186434968697946\",\"blood_group\":\"B\",\"gender\":\"Male\"}', '{\"religion\":\"hindu\",\"nationality\":\"indian\",\"city\":\"jaipur\",\"state\":\"rajasthan\",\"address\":\"Bxklxm bsokxn\",\"pincode\":\"7864998086643648496\"}', '{\"grade\":\"28088633588335\",\"school_name\":\"Noxlsn\",\"location\":\"Vziodn\",\"class\":\"Guujkjchlln\",\"years\":\"Osjxkd\"}', '{\"qualification\":\"asd\",\"occupation\":\"ssd\",\"organization\":\"asd\",\"mobile_no\":\"1234567890\",\"adhar_no\":\"11111144477777\",\"email\":\"ads@gmail.com\",\"annual_income\":\"4lac\",\"landline_no\":\"789456\"}', '{\"qualification\":\"asd\",\"occupation\":\"ssd\",\"organization\":\"asd\",\"mobile_no\":\"1234567890\",\"adhar_no\":\"11111144477777\",\"email\":\"ads@gmail.com\",\"annual_income\":\"4lac\",\"landline_no\":\"789456\"}', '[{\"name\":\"zxcz\",\"class\":\"5\",\"currentlyStudy\":\"adas\"},{\"name\":\"\",\"class\":\"\",\"currentlyStudy\":\"\"}]', 1, '2023-05-04 10:42:06', '2023-05-14 11:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `present` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `class_id`, `present`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, 1, '2023-05-12 18:30:00', '2023-05-13 12:23:51'),
(2, 1, 2, 0, 1, '2023-05-13 17:53:17', '2023-05-13 12:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `class_categories`
--

CREATE TABLE `class_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_categories`
--

INSERT INTO `class_categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test', NULL, 1, '2023-04-23 13:46:19', '2023-04-23 13:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_details` text NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `discount_type` enum('P','F') NOT NULL,
  `max_reedem` int(11) NOT NULL DEFAULT 0,
  `max_user` int(11) NOT NULL DEFAULT 0,
  `max_discount` int(11) NOT NULL DEFAULT 0,
  `amount` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_details`, `valid_from`, `valid_to`, `discount_type`, `max_reedem`, `max_user`, `max_discount`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(2, 'TEST', '<p>dasd</p>', '2023-04-24', '2023-04-25', 'P', 0, 0, 0, 10.00, 1, '2023-04-23 13:10:04', '2023-04-23 13:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `title`, `subject`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', '<p>test</p>', 1, '2023-04-22 12:54:23', '2023-04-22 12:54:23'),
(2, 'test2', 'test2', '<p>test2</p>', 1, '2023-04-22 12:57:44', '2023-04-22 12:57:44');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(2, 'test question2?', 'test answer2.', 0, '2023-04-21 10:51:42', '2023-04-21 10:51:42'),
(3, 'test3 asd?', 'test3.', 1, '2023-04-21 06:30:29', '2023-04-21 06:38:56');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_21_085700_create_faqs_table', 2),
(8, '2023_04_22_162545_create_static_pages_table', 3),
(9, '2023_04_22_175501_create_email_templates_table', 4),
(10, '2023_04_23_173009_create_coupons_table', 5),
(11, '2023_04_23_184901_create_class_categories_table', 6),
(12, '2023_04_24_173545_create_students_table', 7),
(13, '2023_04_25_172224_create_teachers_table', 8),
(14, '2023_04_25_174604_create_plans_table', 9),
(16, '2023_04_28_171832_create_school_management_table', 10),
(18, '2023_05_03_121121_create_addmissions_table', 11),
(21, '2023_05_07_084902_create_roles_table', 12),
(22, '2023_05_07_085012_create_permissions_table', 12),
(23, '2023_05_07_085455_create_permission_role_table', 13),
(24, '2023_05_07_090119_create_role_user_table', 13),
(25, '2023_05_12_171755_create_student_transfers_table', 14),
(26, '2023_05_13_120735_create_attendances_table', 15);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'user create', 'user_create', '2023-05-07 05:24:31', '2023-05-07 05:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'plan', 'plan something something', 1, '2023-04-25 12:23:48', '2023-04-25 12:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-05-08 12:10:14', '2023-05-08 12:10:14'),
(2, 'school', '2023-05-08 12:10:27', '2023-05-08 12:10:27'),
(3, 'teacher', '2023-05-08 12:10:36', '2023-05-08 12:10:36'),
(4, 'student', '2023-05-08 12:10:49', '2023-05-08 12:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 3, 4),
(3, 2, 8),
(4, 3, 7),
(5, 2, 9),
(6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_management`
--

CREATE TABLE `school_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `image` text DEFAULT NULL,
  `info` text NOT NULL,
  `top_students` text DEFAULT NULL,
  `achievements` text DEFAULT NULL,
  `gallery` text DEFAULT NULL,
  `fee_structure` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_management`
--

INSERT INTO `school_management` (`id`, `name`, `user_id`, `email`, `phone`, `address`, `open_time`, `close_time`, `image`, `info`, `top_students`, `achievements`, `gallery`, `fee_structure`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'testingschool', 9, 'testingschool@gmail.com', '1234567899', 'test', '23:17:00', '23:17:00', '[\"http:\\/\\/127.0.0.1:8000\\/images\\/school_images\\/header_image\\/73032sucide.jpeg\"]', '{\"about_us\":\"test\",\"principal_detail\":\"test\",\"facilities\":[\"test\",\"test2\"],\"features\":[\"test1\",\"test2\"],\"principal_image\":\"http:\\/\\/127.0.0.1:8000\\/images\\/school_images\\/principal_image\\/73032sucide.jpeg\"}', '[{\"name\":\"test\",\"class\":\"X\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/images\\/school_images\\/top_students\\/73032logo.jpeg\"}]', '[{\"name\":\"test\",\"year\":\"2000\",\"description\":\"test\",\"image\":\"http:\\/\\/127.0.0.1:8000\\/images\\/school_images\\/achievements\\/730323389152.png\"}]', '[{\"url\":\"http:\\/\\/127.0.0.1:8000\\/images\\/school_images\\/gallery\\/73032logo.jpeg\"},{\"url\":\"http:\\/\\/127.0.0.1:8000\\/images\\/school_images\\/gallery\\/732893389152.png\"}]', '[{\"title\":\"test\",\"content\":\"test\",\"registration\":\"13\",\"quarter1\":\"21\",\"quarter2\":\"21\",\"quarter3\":\"21\"}]', 1, '2023-05-15 12:20:33', '2023-05-18 12:16:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE `static_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `title`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(4, 'test', 'test', '<p>test</p>', 1, '2023-04-22 12:07:44', '2023-04-22 12:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `password` text NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `previous_school_id` int(11) DEFAULT NULL,
  `email_otp` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `fcm_token` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `unique_id`, `phone`, `dob`, `gender`, `password`, `profile_image`, `user_id`, `class_id`, `school_id`, `previous_school_id`, `email_otp`, `status`, `fcm_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'test@test.com', '201312345', '1234567890', '2023-04-24', 'male', '$2y$10$/kUvh68U3zVs/H2z5DWaG.RXryL6Ea08cuK3E.dpQV9To.KERVeKm', '64407sucide.jpeg', NULL, NULL, 4, NULL, NULL, 1, NULL, '2023-04-24 13:43:06', '2023-05-15 13:36:23', NULL),
(3, 'Gsmdkodmbgomdn', 'admin@admin.com', '202312345', '1234567890', '2023-04-09', 'male', '$2y$10$SKt0bXnBO/vaLTDjU4c.uu7dNjCjZubpPj0ZBf8k/ub0zjnqQuIcq', NULL, NULL, 2, 4, 2, NULL, 1, NULL, '2023-05-04 08:30:08', '2023-05-15 13:35:04', NULL),
(4, 'testing', 'test21@gmail.com', '202312345612', '1234567892', '2023-05-14', 'male', '$2y$10$7Dx7veDVFxW8AycvJdqIWOjSsT98n26usfFzv3jiiXMnS4SVg2FMC', '83581logo.jpeg', 8, 2, 4, NULL, NULL, 1, NULL, '2023-05-14 11:29:20', '2023-05-14 11:29:54', '2023-05-14 11:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `student_transfers`
--

CREATE TABLE `student_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `from_school_id` int(11) NOT NULL,
  `to_school_id` int(11) NOT NULL,
  `status` enum('pending','rejected','success') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_transfers`
--

INSERT INTO `student_transfers` (`id`, `student_id`, `from_school_id`, `to_school_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 4, 'success', '2023-05-12 14:00:28', '2023-05-14 12:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `password` text NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email_otp` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `fcm_token` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `unique_id`, `phone`, `dob`, `gender`, `password`, `profile_image`, `class_id`, `school_id`, `user_id`, `email_otp`, `status`, `fcm_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'test2', 'test2@gmail.com', '202312345327', '1234567898', '2023-05-14', 'female', '$2y$10$9XyV/xvwM03rfpkJ35n.W.Wl3XUYRDBJNKBUKPPMQNb/LQvTxhiaa', '56732logo.jpeg', 2, 4, 4, NULL, 1, NULL, '2023-05-14 04:02:12', '2023-05-14 04:24:21', '2023-05-14 04:24:21'),
(3, 'test', 'test2@gmail.com', '202312345616', '1234567898', '2023-05-14', 'male', '$2y$10$E/o6zhDdQB4eAnGVG/aRoun1Qh5/OCHpnt0j3cdiMKD0jSS9ARQwO', '82200sucide.jpeg', 2, 4, 7, NULL, 1, NULL, '2023-05-14 11:02:57', '2023-05-18 12:14:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `so_google` varchar(255) DEFAULT NULL,
  `email_otp` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `fcm_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `unique_id`, `dob`, `gender`, `profile_image`, `user_type`, `so_google`, `email_otp`, `status`, `fcm_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@admin.com', '1234567890', NULL, '$2y$10$50NDue1ZwDaxJ3yrEMv2OeK1wcn9rN3UKMHxBuOxoRDJqv53FRb/C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-20 19:12:37', '2023-04-20 19:12:37', NULL),
(4, 'test2', 'test2@gmail.com', '1234567898', NULL, '$2y$10$9XyV/xvwM03rfpkJ35n.W.Wl3XUYRDBJNKBUKPPMQNb/LQvTxhiaa', NULL, '202312345327', '2023-05-14', 'female', '56732logo.jpeg', 'teacher', NULL, NULL, 1, NULL, '2023-05-14 04:02:12', '2023-05-14 04:24:21', '2023-05-14 04:24:21'),
(7, 'test', 'test2@gmail.com', '1234567898', NULL, '$2y$10$E/o6zhDdQB4eAnGVG/aRoun1Qh5/OCHpnt0j3cdiMKD0jSS9ARQwO', NULL, '202312345616', '2023-05-14', 'male', '82200sucide.jpeg', 'teacher', NULL, NULL, 1, NULL, '2023-05-14 11:02:57', '2023-05-18 12:14:26', NULL),
(8, 'testing', 'test21@gmail.com', '1234567892', NULL, '$2y$10$7Dx7veDVFxW8AycvJdqIWOjSsT98n26usfFzv3jiiXMnS4SVg2FMC', NULL, '202312345612', '2023-05-14', 'male', '83581logo.jpeg', 'student', NULL, NULL, 1, NULL, '2023-05-14 11:29:20', '2023-05-14 11:29:54', '2023-05-14 11:29:54'),
(9, 'testingschool', 'testingschool@gmail.com', '1234567899', NULL, '$2y$10$90EaKyyIdCxeuOBra4u4s.HbHqZYemkI3bjdF6LqKBBK4M6Jo4yvq', NULL, '2023153', '2023-05-18', 'male', '31490logo.jpeg', 'school', NULL, NULL, 1, NULL, '2023-05-15 12:20:33', '2023-05-18 12:16:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmissions`
--
ALTER TABLE `addmissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_categories`
--
ALTER TABLE `class_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_templates_title_unique` (`title`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `school_management`
--
ALTER TABLE `school_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_transfers`
--
ALTER TABLE `student_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addmissions`
--
ALTER TABLE `addmissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_categories`
--
ALTER TABLE `class_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_management`
--
ALTER TABLE `school_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_transfers`
--
ALTER TABLE `student_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
