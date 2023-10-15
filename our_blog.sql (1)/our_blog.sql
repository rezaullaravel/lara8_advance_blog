-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2023 at 04:27 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `our_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2a$10$p9gVBQdOCkaDJN.yfcHMtO/Cgy388SZ9qGLd/1EcDGfNOmjfjx3Me', NULL, NULL, '2023-08-07 13:19:33'),
(2, 'admin2', 'admin2@gmail.com', NULL, '$2a$10$p9gVBQdOCkaDJN.yfcHMtO/Cgy388SZ9qGLd/1EcDGfNOmjfjx3Me', NULL, NULL, NULL),
(3, 'karim', 'mrkkarim1991@gmail.com', NULL, '$2a$10$p9gVBQdOCkaDJN.yfcHMtO/Cgy388SZ9qGLd/1EcDGfNOmjfjx3Me', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `creator_id` int NOT NULL,
  `category_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `view_post` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `creator_id`, `category_id`, `title`, `description`, `image`, `user_type`, `user_email`, `status`, `view_post`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'This is a laravel post.', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/blog_images/1463584788.laravel1.jpg', 'admin', 'admin@gmail.com', '1', 3, '2023-09-16 07:56:02', '2023-10-05 10:13:10'),
(2, 1, 2, 'Laravel is a popular framework.', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 'upload/blog_images/383498180.laravel3.png', 'admin', 'admin@gmail.com', '1', 6, '2023-09-16 07:56:29', '2023-09-18 01:26:27'),
(3, 1, 1, 'Php is a server side scripting language.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'upload/blog_images/1120769460.php2.png', 'user', 'sumon@gmail.com', '2', 0, '2023-09-16 07:59:12', '2023-09-18 01:04:28'),
(4, 1, 1, 'We are learning php.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'upload/blog_images/692190615.php3.png', 'user', 'sumon@gmail.com', '1', 9, '2023-09-16 08:00:07', '2023-10-05 10:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `created_at`, `updated_at`) VALUES
(1, 'php', NULL, '2023-07-29 08:28:07', '2023-07-29 08:28:07'),
(2, 'laravel', NULL, '2023-07-29 08:28:13', '2023-07-29 08:28:13'),
(3, 'javascript', NULL, '2023-07-29 08:28:18', '2023-07-29 08:28:18'),
(4, 'Vue', NULL, '2023-07-29 08:28:23', '2023-07-29 08:28:23'),
(5, 'Python', NULL, '2023-07-29 08:28:31', '2023-07-29 08:28:31'),
(7, 'django', NULL, '2023-07-29 08:29:35', '2023-09-16 13:25:38'),
(8, 'Rubby', NULL, '2023-09-14 08:33:15', '2023-09-16 13:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `commenter_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commenter_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `child_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_commenter_id_commenter_type_index` (`commenter_id`,`commenter_type`),
  KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  KEY `comments_child_id_foreign` (`child_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commenter_id`, `commenter_type`, `guest_name`, `guest_email`, `commentable_type`, `commentable_id`, `comment`, `approved`, `child_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '4', 'This is my first comment......', 1, NULL, NULL, '2023-08-26 07:50:06', '2023-08-26 07:51:50'),
(2, '2', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '4', 'Oi miah, what are you saying???', 1, 1, NULL, '2023-08-26 07:53:41', '2023-08-26 07:53:41'),
(3, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '4', 'This is my awesome commnets.....', 1, NULL, NULL, '2023-08-26 08:48:13', '2023-08-26 08:48:13'),
(4, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '4', 'hello brother', 1, 2, NULL, '2023-08-26 08:49:37', '2023-08-26 08:49:37'),
(5, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '6', 'hello hi', 1, NULL, NULL, '2023-08-26 08:53:19', '2023-08-26 08:53:19'),
(6, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '4', 'You are so brilliant brother...', 1, 2, NULL, '2023-08-31 08:25:48', '2023-08-31 08:25:48'),
(7, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '4', 'This is a very important post for us...', 1, NULL, NULL, '2023-09-03 05:17:24', '2023-09-03 05:17:24'),
(8, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '3', 'This is my first comment.', 1, NULL, NULL, '2023-09-03 05:21:09', '2023-09-03 05:21:09'),
(9, '2', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '4', '@Sumon ভাই কেমন আছেন?', 1, 7, NULL, '2023-09-04 12:22:17', '2023-09-04 12:23:02'),
(10, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '4', 'dsgsgsdgsdg', 1, 9, NULL, '2023-09-05 05:10:52', '2023-09-05 05:10:52'),
(11, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Blog', '4', 'sgsdgsdgdf', 1, 9, NULL, '2023-09-05 05:11:08', '2023-09-05 05:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

DROP TABLE IF EXISTS `comment_likes`;
CREATE TABLE IF NOT EXISTS `comment_likes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`id`, `comment_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 2, 1, '2023-09-08 10:05:44', '2023-09-08 10:05:44'),
(8, 1, 1, '2023-09-08 10:07:32', '2023-09-08 10:07:32'),
(15, 1, 2, '2023-09-08 10:52:55', '2023-09-08 10:52:55'),
(16, 2, 2, '2023-09-08 10:52:57', '2023-09-08 10:52:57'),
(18, 4, 2, '2023-09-08 10:53:24', '2023-09-08 10:53:24'),
(19, 10, 1, '2023-09-24 08:01:04', '2023-09-24 08:01:04'),
(20, 6, 1, '2023-10-05 10:15:11', '2023-10-05 10:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `view_status`, `created_at`, `updated_at`) VALUES
(1, 'Sumon', 'sumon@gmail.com', '111222', 'Laravel', 'How many days we need to learn laravel? I want to learn this web framework. Thank you.', 1, '2023-09-24 09:08:11', '2023-09-24 10:10:23'),
(2, 'karim', 'karim@gmail.com', '222244444', 'Php', 'Php is server side scripting language.', 1, '2023-09-24 09:09:24', '2023-09-24 10:09:39'),
(3, 'jamal', 'jamal@gmail.com', '35346346436', 'fdgdfhfh', 'hjgfjgfkghkhgk hjkghlhgl lijljhljjh;hj', 1, '2023-09-24 10:11:28', '2023-09-24 10:14:09'),
(4, 'khan', 'khan@gmail.com', '555559999', 'react js', 'I am a frontend web developer.', 1, '2023-09-24 12:24:12', '2023-09-24 12:30:28'),
(5, 'jannat', 'jannat@gmail.com', '225566', 'Asia cup', 'Which team has won asia cup 2023?', 1, '2023-10-05 10:32:19', '2023-10-05 10:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_20_135248_create_admins_table', 1),
(6, '2023_07_09_044236_create_categories_table', 1),
(7, '2023_07_29_143241_create_blogs_table', 2),
(10, '2023_08_15_063608_create_blogs_table', 3),
(11, '2018_06_30_113500_create_comments_table', 4),
(12, '2023_09_08_151222_create_comment_likes_table', 5),
(13, '2023_09_24_143324_create_contacts_table', 6),
(14, '2023_09_30_150117_create_settings_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_fb_link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_twitter_link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_linkedin_link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `header_phone`, `header_address`, `header_email`, `footer_fb_link`, `footer_twitter_link`, `footer_linkedin_link`, `about_img`, `about_description`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo_image/31432497.blog1.jpg', '11112222', 'Uttora-5, Dhaka.', 'sumonkhan@gmail.com', 'https://web.facebook.com/profile.php?id=100030520350623', 'https://www.twitter.com', 'https://www.linkedin.com', 'upload/about_image/1234578166.jeet.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur nisi cum, numquam, soluta dignissimos asperiores veritatis aliquam rem non fuga reiciendis rerum nam cumque? Illo quam neque odio in ab voluptatem, porro praesentium perspiciatis rem quia aut, adipisci assumenda optio delectus facere qui velit sapiente, modi possimus sit atque pariatur beatae incidunt. Vitae eligendi consectetur non id commodi dolores quod quas! Vitae quaerat earum sapiente enim numquam aliquam officia accusamus non tenetur tempore error illo accusantium quo, labore aperiam velit laborum quas ab at blanditiis abcd efgh', NULL, '2023-10-08 09:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sumon', 'sumon@gmail.com', 'upload/user_images/1732024874.jeet.jpg', NULL, '$2y$10$LbBeXMTK8e8iVkj0huocY.qhDtqOhyYkrTzrtmwbMcby5Gc0hRQqK', NULL, NULL, '2023-09-21 09:49:42'),
(2, 'user2', 'user2@gmail.com', 'upload/user_images/user2.jpg', NULL, '$2y$10$zSDoxs4a8ChkrqfA4c/cr.XLlrSWe6k825ZU5Q4lciUDenFZKXL2W', NULL, NULL, NULL),
(3, 'user3', 'user3@gmail.com', 'upload/user_images/user3.jpg', NULL, '$2y$10$zSDoxs4a8ChkrqfA4c/cr.XLlrSWe6k825ZU5Q4lciUDenFZKXL2W', NULL, NULL, NULL),
(4, 'Najmul Hossain', 'najmul@gmail.com', NULL, NULL, '$2y$10$xZUtiQZ.Cf8VislBD2rC5.JACRsZjmOoszf5SlT8EQ35pyU/2mzLm', NULL, '2023-09-24 08:26:17', '2023-09-24 08:26:17');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
