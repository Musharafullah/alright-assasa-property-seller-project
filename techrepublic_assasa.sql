-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2023 at 09:52 AM
-- Server version: 10.5.18-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techrepublic_assasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DHA', NULL, NULL),
(2, 'Bahria', NULL, NULL),
(3, 'CDA', NULL, NULL),
(4, 'Gulberg', NULL, NULL),
(6, 'Test Area', '2023-02-09 14:55:03', '2023-02-09 14:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `area_phases`
--

CREATE TABLE `area_phases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_phases`
--

INSERT INTO `area_phases` (`id`, `title`, `area_id`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(2, '2', 1, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(3, '3', 1, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(4, '4', 1, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(5, '5', 1, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(6, '6', 1, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(7, '7', 1, '2023-01-26 02:43:05', '2023-02-09 12:12:49'),
(8, '1', 2, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(9, '2', 2, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(10, '3', 2, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(11, '4', 2, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(12, '5', 2, '2023-01-26 02:43:05', '2023-02-09 12:02:04'),
(13, '6', 2, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(14, '7', 2, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(15, '1', 3, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(16, '2', 3, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(17, '3', 3, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(18, '4', 3, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(19, '5', 3, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(20, '6', 3, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(21, '7', 3, '2023-01-26 02:43:05', '2023-02-09 12:08:40'),
(22, '1', 4, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(23, '2', 4, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(24, '3', 4, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(25, '4', 4, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(26, '5', 4, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(27, '6', 4, '2023-01-26 02:43:05', '2023-01-26 02:43:05'),
(28, '9', 4, '2023-01-26 02:43:05', '2023-02-09 12:05:35'),
(68, '9', 1, '2023-02-09 13:21:44', '2023-02-09 13:21:44'),
(69, '8', 1, '2023-02-09 13:22:21', '2023-02-09 13:22:21'),
(70, '10', 1, '2023-02-09 13:22:21', '2023-02-09 13:22:21'),
(73, '1', 6, '2023-02-09 14:55:03', '2023-02-09 14:55:03'),
(74, '2', 6, '2023-02-09 14:55:03', '2023-02-09 14:55:03'),
(75, '3', 6, '2023-02-09 14:55:03', '2023-02-09 14:55:03'),
(76, '4', 6, '2023-02-09 14:55:03', '2023-02-09 14:55:03'),
(77, '5', 6, '2023-02-09 14:55:18', '2023-02-09 14:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `area_user`
--

CREATE TABLE `area_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_user`
--

INSERT INTO `area_user` (`id`, `user_id`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(13, 7, 2, '2023-02-02 06:57:49', '2023-02-02 06:57:49'),
(16, 5, 1, '2023-02-06 10:53:03', '2023-02-06 10:53:03'),
(17, 9, 1, '2023-02-07 08:10:25', '2023-02-07 08:10:25'),
(18, 9, 2, '2023-02-07 08:10:25', '2023-02-07 08:10:25'),
(19, 10, 1, '2023-02-07 11:42:17', '2023-02-07 11:42:17'),
(20, 10, 2, '2023-02-07 11:42:17', '2023-02-07 11:42:17'),
(21, 11, 3, '2023-02-08 13:26:41', '2023-02-08 13:26:41'),
(23, 3, 1, '2023-02-08 17:32:51', '2023-02-08 17:32:51'),
(24, 3, 4, '2023-02-08 17:32:51', '2023-02-08 17:32:51'),
(25, 13, 1, '2023-02-08 17:33:18', '2023-02-08 17:33:18'),
(26, 6, 1, '2023-02-08 17:39:18', '2023-02-08 17:39:18'),
(27, 12, 3, '2023-02-08 17:39:31', '2023-02-08 17:39:31'),
(29, 14, 1, '2023-02-09 08:54:14', '2023-02-09 08:54:14'),
(30, 15, 1, '2023-02-09 08:55:07', '2023-02-09 08:55:07'),
(31, 16, 2, '2023-02-09 09:33:14', '2023-02-09 09:33:14'),
(32, 16, 3, '2023-02-09 09:33:14', '2023-02-09 09:33:14'),
(33, 17, 1, '2023-02-09 09:41:24', '2023-02-09 09:41:24'),
(34, 17, 3, '2023-02-09 09:41:24', '2023-02-09 09:41:24'),
(35, 18, 2, '2023-02-09 12:58:39', '2023-02-09 12:58:39'),
(36, 18, 4, '2023-02-09 12:58:39', '2023-02-09 12:58:39'),
(37, 19, 2, '2023-02-09 14:56:33', '2023-02-09 14:56:33');

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
(5, '2023_01_09_125009_create_areas_table', 1),
(6, '2023_01_09_130251_create_area_phases_table', 1),
(7, '2023_01_09_144938_create_properties_table', 1),
(8, '2023_01_12_143414_create_area_user_table', 1);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'mobileAppToken', 'd99995e8ee30d86bf3d420de05e964e5c5d431efe81307bc32d9f9faaf695453', '[\"*\"]', '2023-02-13 08:33:45', NULL, '2023-02-07 07:57:42', '2023-02-13 08:33:45'),
(3, 'App\\Models\\User', 1, 'mobileAppToken', '15cfaf8b7edb12b29bc815c78e111b460484f3347186b5d5d317e1fa0b51a868', '[\"*\"]', NULL, NULL, '2023-02-08 04:42:08', '2023-02-08 04:42:08'),
(4, 'App\\Models\\User', 1, 'mobileAppToken', '04560b6461b7ba0ddc513b02e1b89dc6fb1c26ab1b6c1ceebd536b846193e7be', '[\"*\"]', NULL, NULL, '2023-02-08 04:42:18', '2023-02-08 04:42:18'),
(5, 'App\\Models\\User', 1, 'mobileAppToken', 'cbd2c1050374a3a8d77d1d67ce09b454eff22b3a7a39394c662911ca8404074e', '[\"*\"]', NULL, NULL, '2023-02-08 04:44:55', '2023-02-08 04:44:55'),
(6, 'App\\Models\\User', 1, 'mobileAppToken', '6e0a84e7a08f28c39e0cd60cf4bc21ecd3e6a9707c1f69ed5d1c0d8dc930d7b3', '[\"*\"]', '2023-02-08 05:34:00', NULL, '2023-02-08 04:52:24', '2023-02-08 05:34:00'),
(7, 'App\\Models\\User', 1, 'mobileAppToken', 'bb29fbc6aeebc3c6cdbea2edf9fffe44e1d46726884a1929c0e8ca2a28a7a6c0', '[\"*\"]', NULL, NULL, '2023-02-08 05:14:14', '2023-02-08 05:14:14'),
(8, 'App\\Models\\User', 1, 'mobileAppToken', 'd0053b34574c2b621f524d140c7e1b88cad4cbb91d30d52fec2199eb664d1a7d', '[\"*\"]', NULL, NULL, '2023-02-08 06:10:51', '2023-02-08 06:10:51'),
(9, 'App\\Models\\User', 1, 'mobileAppToken', '0f7b1e1a7d57171697e082e30724a84e8319b3004b3a7b3a61fa21ec026ee4dd', '[\"*\"]', '2023-02-08 06:59:53', NULL, '2023-02-08 06:40:02', '2023-02-08 06:59:53'),
(10, 'App\\Models\\User', 1, 'mobileAppToken', '9e0964e397cb27ecf30af9096e7d4fc5913bb0429da331b6e852fcb677d10dfb', '[\"*\"]', '2023-02-08 15:51:12', NULL, '2023-02-08 07:03:03', '2023-02-08 15:51:12'),
(11, 'App\\Models\\User', 1, 'mobileAppToken', '16a90f369de819b230cc00cd7a0434a3ed6a0928c3af7b581a86d867c366e7cd', '[\"*\"]', '2023-02-08 07:44:51', NULL, '2023-02-08 07:04:05', '2023-02-08 07:44:51'),
(12, 'App\\Models\\User', 1, 'mobileAppToken', 'e0bf93a747da713e476f1be0fc1d8bc593f42a345adb153980e6095303813ad6', '[\"*\"]', '2023-02-08 08:29:47', NULL, '2023-02-08 08:24:22', '2023-02-08 08:29:47'),
(13, 'App\\Models\\User', 1, 'mobileAppToken', '6ac0bfe5499ba6fc2e0260373876163601c32cd91d187ed255cb7309985d33a2', '[\"*\"]', '2023-02-08 08:53:11', NULL, '2023-02-08 08:35:42', '2023-02-08 08:53:11'),
(14, 'App\\Models\\User', 1, 'mobileAppToken', '900aa704a118c33cd1e65b9ce334f1f36b3f531a37cf6d1300d2a17d0f2a1070', '[\"*\"]', '2023-02-08 09:55:03', NULL, '2023-02-08 09:45:57', '2023-02-08 09:55:03'),
(15, 'App\\Models\\User', 1, 'mobileAppToken', '3aafa18174ada84e2718032409d84850bd1446338377d54d5fbd7b3c361a9ba5', '[\"*\"]', '2023-02-08 11:27:10', NULL, '2023-02-08 10:28:48', '2023-02-08 11:27:10'),
(17, 'App\\Models\\User', 1, 'mobileAppToken', '07d1abb3990d9f3a163032fe093a0913a3705d86a1afed0dccaf6a7ae2409063', '[\"*\"]', '2023-02-08 13:58:12', NULL, '2023-02-08 13:46:44', '2023-02-08 13:58:12'),
(18, 'App\\Models\\User', 1, 'mobileAppToken', '273efa7da1757115bbfad358ead734f79e456a55a57375a2f8322688d1c5ceb8', '[\"*\"]', '2023-02-08 16:24:07', NULL, '2023-02-08 15:21:41', '2023-02-08 16:24:07'),
(19, 'App\\Models\\User', 1, 'mobileAppToken', 'bf7c9159efad46ed431d0c7a5faeb37571fa3d641af8441b2a519cca580e4f4f', '[\"*\"]', '2023-02-08 16:30:10', NULL, '2023-02-08 16:29:26', '2023-02-08 16:30:10'),
(20, 'App\\Models\\User', 2, 'mobileAppToken', '8b00f5599efe82d8afbfed2e2a2039e11178e5e659d7d1616412dee9d127a09f', '[\"*\"]', '2023-02-08 17:38:21', NULL, '2023-02-08 17:25:47', '2023-02-08 17:38:21'),
(21, 'App\\Models\\User', 1, 'mobileAppToken', 'fd624da1334fae4b972186afd873399d785fb9ada0b9331482551bd2f863c1dc', '[\"*\"]', '2023-02-09 03:57:11', NULL, '2023-02-09 03:57:05', '2023-02-09 03:57:11'),
(22, 'App\\Models\\User', 1, 'mobileAppToken', '51c60c435f822697544eb64601e7d636fa0d0eec674d87f3437d162679622923', '[\"*\"]', '2023-02-09 05:15:38', NULL, '2023-02-09 05:15:35', '2023-02-09 05:15:38'),
(24, 'App\\Models\\User', 2, 'mobileAppToken', '3fcdf7efaf536b944dbd34f2d273a77ab80a4267728200f0c0f2e164544d1180', '[\"*\"]', '2023-02-09 05:53:11', NULL, '2023-02-09 05:46:32', '2023-02-09 05:53:11'),
(26, 'App\\Models\\User', 2, 'mobileAppToken', 'f57f5afb86625b35ba54b11f5b181b6a09e71e4816b255d61890d7a054d3152b', '[\"*\"]', NULL, NULL, '2023-02-09 07:04:37', '2023-02-09 07:04:37'),
(27, 'App\\Models\\User', 2, 'mobileAppToken', '082c47a3d76a1026ce84eaeee52a2590361bf3cc92ae6894614df96dd0a9e6c9', '[\"*\"]', '2023-02-09 09:38:38', NULL, '2023-02-09 07:11:40', '2023-02-09 09:38:38'),
(29, 'App\\Models\\User', 14, 'mobileAppToken', '273699e426af9d581a3130a3d1a2a08c039401d2463bc454067f9ef1fbc4c20f', '[\"*\"]', NULL, NULL, '2023-02-09 08:53:49', '2023-02-09 08:53:49'),
(30, 'App\\Models\\User', 15, 'mobileAppToken', 'd20a689854097ec6d7c030e6bede36581df5f8a75335604a8690b43d578982d3', '[\"*\"]', NULL, NULL, '2023-02-09 08:55:21', '2023-02-09 08:55:21'),
(31, 'App\\Models\\User', 2, 'mobileAppToken', 'e6ea0aec98c657b376379de5922cf1abd83838a6c9cd70fea761615cbd3e0d85', '[\"*\"]', '2023-02-09 09:05:33', NULL, '2023-02-09 09:04:39', '2023-02-09 09:05:33'),
(34, 'App\\Models\\User', 1, 'mobileAppToken', '2e54b80f4adda20850aca53d6f2203e8cc55c934d1df5965f357123b64918ac6', '[\"*\"]', '2023-02-09 09:40:08', NULL, '2023-02-09 09:35:58', '2023-02-09 09:40:08'),
(35, 'App\\Models\\User', 1, 'mobileAppToken', 'f67e11df906c600c31cabb456ea444f568e90e76422a1f5f5c05307870500b62', '[\"*\"]', NULL, NULL, '2023-02-09 09:41:46', '2023-02-09 09:41:46'),
(38, 'App\\Models\\User', 1, 'mobileAppToken', 'e451cad9a2ceafea0605b3319e96ef5f6a6cf83fed279c0499df2aac15763e08', '[\"*\"]', '2023-02-09 09:53:06', NULL, '2023-02-09 09:52:48', '2023-02-09 09:53:06'),
(40, 'App\\Models\\User', 2, 'mobileAppToken', '67adbd27ae0efc119dbfa60b20fd4ccd94dcc5cfc3d35848ed0fc03fedaa1c7d', '[\"*\"]', '2023-02-09 10:14:55', NULL, '2023-02-09 10:14:38', '2023-02-09 10:14:55'),
(42, 'App\\Models\\User', 2, 'mobileAppToken', 'e511505b7391b8ab9479296c3d29d3a09f376ae9ef86879a849d98addd796be0', '[\"*\"]', '2023-02-09 10:56:57', NULL, '2023-02-09 10:29:18', '2023-02-09 10:56:57'),
(43, 'App\\Models\\User', 1, 'mobileAppToken', '0fec3dbef12126faa6b28ab2aca37294c7f0170cb7f045cdf7f1fb66466f5330', '[\"*\"]', '2023-02-09 11:34:25', NULL, '2023-02-09 11:10:30', '2023-02-09 11:34:25'),
(44, 'App\\Models\\User', 2, 'mobileAppToken', 'e78b5ff8bfea8c8688fd9737dfbdb00ee165a6cba7a6f4618e7abafca3817844', '[\"*\"]', '2023-02-09 13:09:41', NULL, '2023-02-09 12:48:54', '2023-02-09 13:09:41'),
(45, 'App\\Models\\User', 3, 'mobileAppToken', 'e1f956549485b89fc756b27409dcc32e63a3f687c9ad650e507b9380ce47676c', '[\"*\"]', NULL, NULL, '2023-02-09 12:56:45', '2023-02-09 12:56:45'),
(46, 'App\\Models\\User', 18, 'mobileAppToken', '7efcea7e1d49d42923b905672e927fc16610f729d58817a1c9e47cd69b6058b2', '[\"*\"]', NULL, NULL, '2023-02-09 12:58:53', '2023-02-09 12:58:53'),
(48, 'App\\Models\\User', 18, 'mobileAppToken', '88733eab6a81ec1cea4e1e63be89b85ec25fea7a2e3c41aef00d908320f39ec3', '[\"*\"]', NULL, NULL, '2023-02-09 13:15:49', '2023-02-09 13:15:49'),
(49, 'App\\Models\\User', 18, 'mobileAppToken', 'e4beacbefb0150b00838d85349cf0b9dc2fd60097e8597e024e7e05dd8ed966c', '[\"*\"]', NULL, NULL, '2023-02-09 13:16:32', '2023-02-09 13:16:32'),
(50, 'App\\Models\\User', 18, 'mobileAppToken', '810aa07cbd00dd743c3f07a0f8c00db5d3eaa2df3bb43f6fa41051bd1d5256a9', '[\"*\"]', NULL, NULL, '2023-02-09 13:17:08', '2023-02-09 13:17:08'),
(51, 'App\\Models\\User', 18, 'mobileAppToken', '3fe0166eeafd7d015514ffa030b6c45a92cf7190a9e7e00e0020e901d5869c63', '[\"*\"]', NULL, NULL, '2023-02-09 13:18:01', '2023-02-09 13:18:01'),
(52, 'App\\Models\\User', 18, 'mobileAppToken', '9d3786687788e4618fa1afd5436fac94397af0ae2f43d3aec443f82ed3e72c97', '[\"*\"]', NULL, NULL, '2023-02-09 13:20:24', '2023-02-09 13:20:24'),
(53, 'App\\Models\\User', 2, 'mobileAppToken', 'd8bd5118385513753d697ce326ecccc47f8bf3571f4e987a48fa88004941ab74', '[\"*\"]', NULL, NULL, '2023-02-09 13:22:21', '2023-02-09 13:22:21'),
(54, 'App\\Models\\User', 19, 'mobileAppToken', '0decec9fbceafd2e54614bf8bf8574ebff43f0d4992e7940cf3d51b216b8efeb', '[\"*\"]', NULL, NULL, '2023-02-09 14:56:49', '2023-02-09 14:56:49'),
(55, 'App\\Models\\User', 19, 'mobileAppToken', '3c625e82d973c7dd06ace00c439c3072c855b541829bca3c937481e422d01b5f', '[\"*\"]', NULL, NULL, '2023-02-09 14:56:54', '2023-02-09 14:56:54'),
(57, 'App\\Models\\User', 18, 'mobileAppToken', 'd1de130ba925bca5c6d6ef6d1e2ea2dc2b576326bf8de71e2c37ab44353903b4', '[\"*\"]', '2023-02-09 15:08:28', NULL, '2023-02-09 15:08:18', '2023-02-09 15:08:28'),
(58, 'App\\Models\\User', 19, 'mobileAppToken', '0ced7137620d1eb4ca12c843c9ce4c85d2628304a43ab77fc425fe7121a30a42', '[\"*\"]', NULL, NULL, '2023-02-09 15:35:41', '2023-02-09 15:35:41'),
(59, 'App\\Models\\User', 19, 'mobileAppToken', 'a1afe6ffd96c5f96d155ec8ca1eefeecd7882a7ce8782f339571fe6113745e2e', '[\"*\"]', NULL, NULL, '2023-02-09 15:35:46', '2023-02-09 15:35:46'),
(61, 'App\\Models\\User', 19, 'mobileAppToken', '520f122ccd9eb9491408f8a089dd4c5e3bb748ba250a074eb28e18489ef5ecca', '[\"*\"]', '2023-02-09 17:32:33', NULL, '2023-02-09 17:27:51', '2023-02-09 17:32:33'),
(62, 'App\\Models\\User', 1, 'mobileAppToken', '85967ad6e45e26f8972f466f49d3db582412c422e00098144df5631d777b5cde', '[\"*\"]', '2023-02-11 15:43:57', NULL, '2023-02-11 15:38:20', '2023-02-11 15:43:57'),
(63, 'App\\Models\\User', 2, 'mobileAppToken', '636df65bf804ea17d70c03702dfdcefdccce8306a78a502707d36b3c384eb4e3', '[\"*\"]', '2023-02-11 16:10:59', NULL, '2023-02-11 16:03:19', '2023-02-11 16:10:59'),
(64, 'App\\Models\\User', 1, 'mobileAppToken', 'e1fd491b4b825a4a6ea45d415dc766031cf119a948e162b11ea08365b3b4c0b2', '[\"*\"]', '2023-02-11 17:09:20', NULL, '2023-02-11 16:14:02', '2023-02-11 17:09:20'),
(65, 'App\\Models\\User', 2, 'mobileAppToken', '36a23076b6144a60e67c40088231becb823dfa530499b0617635014ecad69088', '[\"*\"]', '2023-02-11 17:18:46', NULL, '2023-02-11 17:16:40', '2023-02-11 17:18:46'),
(66, 'App\\Models\\User', 2, 'mobileAppToken', '6e5d8d96a27724a641af9d56d436fc66862438d09063d27da9cf9c5e617a977d', '[\"*\"]', '2023-02-12 01:46:14', NULL, '2023-02-12 01:31:33', '2023-02-12 01:46:14'),
(67, 'App\\Models\\User', 2, 'mobileAppToken', 'bddc02e150401464bf9a01af63f44e06f91667c1f6e49a1119c1f363b18d2352', '[\"*\"]', '2023-02-13 04:21:35', NULL, '2023-02-13 04:12:54', '2023-02-13 04:21:35'),
(68, 'App\\Models\\User', 2, 'mobileAppToken', 'a03545da1c27f61e81f2a74c2830fbec20aabbfe4bc677ea71060a21aa57b413', '[\"*\"]', NULL, NULL, '2023-02-13 04:14:22', '2023-02-13 04:14:22'),
(69, 'App\\Models\\User', 2, 'mobileAppToken', 'd7afca9eb03ac5c087318d4efa7878b56b1e3e0e26b206aecd7c47dc8edf225c', '[\"*\"]', '2023-02-13 04:16:21', NULL, '2023-02-13 04:14:25', '2023-02-13 04:16:21'),
(70, 'App\\Models\\User', 2, 'mobileAppToken', '2a74b299dd92d571f907f6e96a1b131511ebb7a56e3e24b2ba75a2373508df18', '[\"*\"]', '2023-02-13 05:44:27', NULL, '2023-02-13 05:42:50', '2023-02-13 05:44:27'),
(71, 'App\\Models\\User', 2, 'mobileAppToken', '631fd8f0e1ce248b0b7e3fc90ed6b1943640cd76623ca940ca418abe7c3b679c', '[\"*\"]', '2023-02-13 08:40:19', NULL, '2023-02-13 06:36:09', '2023-02-13 08:40:19'),
(72, 'App\\Models\\User', 2, 'mobileAppToken', '1328ea3b12d764b64410bbff6745882e356c3534a31110cd812938ec23e1eb8e', '[\"*\"]', '2023-02-13 09:50:21', NULL, '2023-02-13 09:34:59', '2023-02-13 09:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property` enum('rent','sale') NOT NULL,
  `item_status` enum('plot','flat','shop','house','plot_file') NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `area_phase_id` bigint(20) UNSIGNED NOT NULL,
  `street_number` varchar(255) DEFAULT NULL,
  `house_number` varchar(255) DEFAULT NULL,
  `plot_number` varchar(255) DEFAULT NULL,
  `sector` varchar(255) NOT NULL,
  `size` double NOT NULL,
  `size_unit` enum('marla','kanal','hectare') NOT NULL,
  `price` double NOT NULL,
  `orientation` enum('north','south','east','west') NOT NULL,
  `category` varchar(1000) NOT NULL,
  `extra_land` varchar(255) DEFAULT NULL COMMENT 'If any extra information present with property',
  `item_condition` enum('direct_client','direct_dealer','one_down_dealer','other') NOT NULL,
  `agency_name` varchar(255) DEFAULT NULL,
  `reference_name` varchar(255) DEFAULT NULL,
  `reference_mobile` varchar(255) DEFAULT NULL,
  `plot_type` enum('residential','commercial','others') DEFAULT NULL,
  `purchase_status` enum('pending','sold') NOT NULL DEFAULT 'pending',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property`, `item_status`, `area_id`, `area_phase_id`, `street_number`, `house_number`, `plot_number`, `sector`, `size`, `size_unit`, `price`, `orientation`, `category`, `extra_land`, `item_condition`, `agency_name`, `reference_name`, `reference_mobile`, `plot_type`, `purchase_status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'rent', 'flat', 2, 13, '900', '2', '2', 'A', 61, 'kanal', 591, 'south', '[\"new\",\"newnew\"]', 'Test extra land', 'direct_client', 'Alright Tech', 'Hedley Robinson', '01234567891', 'residential', 'pending', 1, '2023-01-27 06:53:52', '2023-02-08 07:16:05'),
(3, 'sale', 'shop', 1, 4, '404', '3', '224', 'A', 59, 'kanal', 510, 'west', '[\"Corner\",\"General\",\"Avenue\"]', 'Quos perspiciatis m', 'one_down_dealer', 'Keelie Ramos', 'Adam Potter', '01234567891', 'commercial', 'sold', 2, '2023-01-27 07:29:06', '2023-02-08 17:38:21'),
(4, 'rent', 'plot', 3, 18, '62263', '12', '1', 'A', 184, 'marla', 415, 'west', '[\"Corner\",\"General\",\"Avenue\"]', 'Test Land', 'direct_dealer', 'Vrund Achari', 'Dhanapati Shah', '01234567891', NULL, 'pending', 3, '2023-01-27 07:30:04', '2023-02-09 17:38:15'),
(8, 'rent', 'plot', 1, 4, '601', NULL, NULL, 'Praesentium ex inven', 37, 'kanal', 942, 'west', '[\"Corner\",\"General\",\"Avenue\"]', 'Tempore fugiat eos', 'direct_dealer', 'Beverly Mcgowan', 'Stone Grant', '+1 (617) 526-7054', NULL, 'pending', 1, '2023-02-08 10:28:47', '2023-02-08 10:28:47'),
(9, 'sale', 'plot', 2, 4, '121', NULL, NULL, 'Ea facilis illo sunt', 1, 'kanal', 731, 'south', '[\"Corner\",\"General\"]', 'Proident est in su', 'direct_client', 'Marvin Glover', 'Hall Cohen', '+1 (936) 336-5146', NULL, 'pending', 1, '2023-02-08 10:30:27', '2023-02-08 10:30:27'),
(10, 'sale', 'shop', 2, 2, '434', NULL, NULL, 'Quasi dolor amet do', 33, 'hectare', 429, 'north', '[\"General\",\"Avenue\"]', 'Dolor dolor ut conse', 'direct_client', 'Mohammad Black', 'Nicholas Emerson', '+1 (899) 731-3436', NULL, 'pending', 1, '2023-02-08 10:32:16', '2023-02-08 10:32:16'),
(11, 'sale', 'plot', 1, 4, '623', NULL, NULL, 'Saepe est mollit et', 58, 'kanal', 838, 'west', '[\"Corner\",\"Avenue\"]', 'Mollit dolore aute i', 'direct_client', 'Faith Wilkins', 'Vaughan Gibbs', '0987654321', NULL, 'pending', 1, '2023-02-08 10:33:14', '2023-02-08 10:33:14'),
(12, 'sale', 'flat', 4, 2, '842', NULL, NULL, 'Placeat soluta exce', 49, 'marla', 448, 'east', '[\"Corner\",\"General\",\"Avenue\"]', 'Et illum quam occae', 'one_down_dealer', 'Hedley Spears', 'Madaline Griffin', '+1 (269) 338-9284', NULL, 'pending', 1, '2023-02-08 11:14:57', '2023-02-08 11:14:57'),
(15, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 2000000, 'north', '[\"passes\",\"passesok\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, NULL, 'residential', 'sold', 9, '2023-02-08 11:51:40', '2023-02-08 11:51:40'),
(16, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 2000000, 'north', '[\"passes\",\"passesok\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, NULL, 'residential', 'sold', 9, '2023-02-08 11:52:44', '2023-02-08 11:52:44'),
(17, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 2000000, 'north', '[\"passes\",\"passesok\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, NULL, 'residential', 'sold', 9, '2023-02-08 11:54:15', '2023-02-08 11:54:15'),
(18, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 2000000, 'north', '[\"passes\",\"passesok\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, NULL, 'residential', 'sold', 9, '2023-02-08 12:56:11', '2023-02-08 12:56:11'),
(19, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 2000000, 'north', '[\"passes\",\"passesok\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, '0123456789', 'residential', 'sold', 9, '2023-02-08 12:56:41', '2023-02-08 12:56:41'),
(20, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 2000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, '0123456789', 'residential', 'sold', 9, '2023-02-08 13:20:37', '2023-02-08 13:20:37'),
(21, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 2000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, '0123456789', 'residential', 'sold', 9, '2023-02-08 13:21:35', '2023-02-08 13:21:35'),
(22, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, '0123456789', 'residential', 'sold', 9, '2023-02-08 13:24:47', '2023-02-08 13:24:47'),
(23, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, '0123456789', 'residential', 'sold', 1, '2023-02-08 13:50:42', '2023-02-08 13:50:42'),
(24, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'Alright Tech', NULL, '0123456789', 'residential', 'sold', 1, '2023-02-08 13:51:44', '2023-02-08 13:51:44'),
(25, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', NULL, NULL, '0123456789', 'residential', 'sold', 1, '2023-02-08 13:53:14', '2023-02-08 13:53:14'),
(26, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', NULL, NULL, '0123456789', 'residential', 'sold', 1, '2023-02-08 13:55:05', '2023-02-08 13:55:05'),
(27, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'No Agency', NULL, '0123456789', 'residential', 'pending', 1, '2023-02-08 15:24:46', '2023-02-08 15:24:46'),
(28, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'No Agency', NULL, '0123456789', 'residential', 'pending', 1, '2023-02-08 15:32:27', '2023-02-08 15:32:27'),
(29, 'sale', 'flat', 1, 4, 'gxxh', NULL, '20', 'hxhx', 20, 'marla', 900000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'No Agency', NULL, '689889', 'residential', 'pending', 1, '2023-02-08 15:33:02', '2023-02-08 15:33:02'),
(30, 'sale', 'flat', 3, 4, 'gxxh', NULL, '20', 'hxhx', 20, 'marla', 900000000, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'No Agency', NULL, '689889', 'residential', 'pending', 1, '2023-02-08 15:34:30', '2023-02-08 15:34:30'),
(31, 'rent', 'plot', 3, 4, 'gxxh', NULL, '20', 'hxhx', 20, 'marla', 688665, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', 'No Agency', NULL, '689889', 'residential', 'pending', 1, '2023-02-08 15:40:47', '2023-02-08 15:40:47'),
(32, 'rent', 'plot', 3, 4, 'gxxh', NULL, '68686', 'hxhx', 68686868, 'marla', 688665, 'north', '[\"Corner\",\"General\",\"Avenue\"]', 'hdhc', 'direct_client', 'No Agency', NULL, '689889', 'residential', 'pending', 1, '2023-02-08 15:42:03', '2023-02-08 15:42:03'),
(33, 'rent', 'plot', 3, 4, 'gxxh', NULL, '68686', 'hxhx', 68686868, 'marla', 688665, 'north', '[\"Corner\",\"Avenue\",\"Boulevard\"]', 'hdhc', 'direct_client', 'No Agency', NULL, '689889', 'residential', 'pending', 1, '2023-02-08 15:42:32', '2023-02-08 15:42:32'),
(34, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'west', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', NULL, NULL, '0123456789', 'residential', 'sold', 1, '2023-02-08 15:45:50', '2023-02-08 15:45:50'),
(35, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'west', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', NULL, NULL, '0123456789', 'residential', 'sold', 1, '2023-02-08 15:46:10', '2023-02-08 15:46:10'),
(36, 'rent', 'plot', 3, 4, 'gxxh', NULL, '68686', 'hxhx', 68686868, 'marla', 688665, 'west', '[\"Corner\",\"Avenue\",\"Boulevard\"]', 'hdhc', 'direct_client', 'No Agency', NULL, '689889', 'residential', 'pending', 1, '2023-02-08 15:48:37', '2023-02-08 15:48:37'),
(37, 'rent', 'plot', 3, 4, 'gxxh', NULL, '68686', 'hxhx', 68686868, 'marla', 688665, 'north', '[\"Corner\",\"Avenue\",\"Boulevard\"]', 'hdhc', 'direct_client', 'No Agency', NULL, '689889', 'residential', 'pending', 1, '2023-02-08 15:48:55', '2023-02-08 15:48:55'),
(38, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'west', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_client', NULL, NULL, '0123456789', 'residential', 'sold', 1, '2023-02-08 15:50:53', '2023-02-08 15:50:53'),
(39, 'sale', 'flat', 1, 4, '20', NULL, '20', 'A', 20, 'marla', 900000000, 'west', '[\"Corner\",\"General\",\"Avenue\"]', 'testing extra', 'direct_dealer', NULL, NULL, '0123456789', 'residential', 'sold', 1, '2023-02-08 15:51:12', '2023-02-08 15:51:12'),
(40, 'rent', 'plot', 3, 4, 'gxxh', NULL, '68686', 'hxhx', 68686868, 'marla', 688665, 'north', '[\"Corner\",\"Avenue\",\"Boulevard\"]', 'hdhc', 'direct_client', 'No Agency', NULL, '689889', 'residential', 'pending', 1, '2023-02-08 15:52:18', '2023-02-08 15:52:18'),
(41, 'rent', 'plot', 3, 4, 'gxxh', NULL, '68686', 'hxhx', 68686868, 'marla', 688665, 'north', '[\"Corner\",\"Avenue\",\"Boulevard\"]', 'hdhc', 'direct_client', 'No Agency', NULL, '689889', 'residential', 'pending', 1, '2023-02-08 15:53:06', '2023-02-08 15:53:06'),
(42, 'rent', 'house', 1, 5, '5', NULL, '2', 't', 10, 'marla', 1000, 'north', '[\"Corner\",\"General\"]', 'Any extra information.', 'direct_dealer', 'No Agency', NULL, '333', 'residential', 'pending', 2, '2023-02-08 17:26:47', '2023-02-08 17:26:47'),
(43, 'rent', 'plot', 2, 3, '6', NULL, '2', 't', 10, 'marla', 30000000, 'north', '[\"Avenue\",\"General\"]', 'no', 'direct_client', 'No Agency', NULL, '358', 'residential', 'pending', 2, '2023-02-08 17:36:44', '2023-02-08 17:36:44'),
(45, 'rent', 'flat', 3, 19, '649', NULL, NULL, 'Culpa fugiat molesti', 60, 'hectare', 934, 'north', '[\"avenue\",\"general\"]', 'Et suscipit illo eli', 'other', 'Talon Carter', 'Mollie York', '+1 (842) 708-1846', NULL, 'pending', 1, '2023-02-09 04:44:54', '2023-02-09 05:49:37'),
(46, 'sale', 'plot', 1, 7, '10', NULL, '10', 'K', 30, 'marla', 1000000, 'north', '[\"Corner\"]', 'Any extra information.', 'direct_client', 'No Agency', NULL, '03008888800', 'residential', 'pending', 2, '2023-02-09 05:48:22', '2023-02-09 05:48:22'),
(47, 'rent', 'house', 1, 1, '5', NULL, '2', 't', 6, 'marla', 50000, 'north', '[\"boulvard\",\"avenue\",\"general\",\"corner\"]', 'Any extra information.', 'direct_client', 'No Agency', 'Steel Cunningham', '03055555', 'residential', 'pending', 2, '2023-02-09 05:49:40', '2023-02-09 06:01:54'),
(48, 'sale', 'house', 1, 5, '4', NULL, '2', 'h', 30, 'marla', 500000, 'north', '[\"Corner\",\"General\",\"Avenue\",\"Corner\"]', 'Any extra information.', 'direct_client', 'No Agency', NULL, '555555', 'residential', 'pending', 2, '2023-02-09 05:52:16', '2023-02-09 05:52:16'),
(49, 'sale', 'house', 2, 5, '943', NULL, NULL, 'Dolores optio velit', 79, 'marla', 834, 'south', '[\"avenue\"]', 'Deserunt voluptas mi', 'direct_dealer', 'Bertha Higgins', 'Claudia Golden', '+1 (135) 174-8416', NULL, 'pending', 1, '2023-02-09 06:46:47', '2023-02-09 06:46:47'),
(50, 'sale', 'shop', 2, 6, '62', NULL, NULL, 'Aut consequat Alias', 13, 'marla', 906, 'east', '[\"boulvard\",\"general\",\"corner\"]', 'Voluptate laborum P', 'direct_client', 'Talon Burns', 'Paki Medina', '+1 (916) 721-5981', NULL, 'pending', 1, '2023-02-09 06:48:22', '2023-02-09 06:48:22'),
(51, 'rent', 'plot', 1, 6, '905', '920', '412', 'Voluptatem Iusto mi', 5, 'kanal', 336, 'west', '[\"boulvard\",\"avenue\",\"general\"]', 'Pariatur Eos id mi', 'other', 'Philip Rocha', 'Kieran Bentley', '+1 (257) 816-7233', NULL, 'pending', 1, '2023-02-09 06:52:04', '2023-02-09 06:52:04'),
(52, 'rent', 'house', 2, 4, 'zhhxhs', NULL, '796767', 'zhhdh', 555555, 'marla', 76679, 'north', '[\"Corner\",\"General\",\"Boulevard\",\"Avenue\"]', 'sghsh', 'direct_client', 'No Agency', NULL, '564656656', 'residential', 'pending', 2, '2023-02-09 06:56:21', '2023-02-09 06:56:21'),
(53, 'rent', 'plot', 2, 3, 'sgshh', '464664', '464664', 'shdhh', 76646, 'marla', 799797, 'east', '[\"Corner\",\"General\",\"Avenue\"]', 'hdhdhdhhd', 'direct_client', 'No Agency', NULL, '797667', 'residential', 'pending', 2, '2023-02-09 07:01:29', '2023-02-09 07:01:29'),
(54, 'sale', 'plot', 1, 1, '7', '2', '2', '6', 3, 'marla', 555555, 'north', '[\"General\",\"Avenue\"]', 'Any extra information.', 'direct_client', 'No Agency', NULL, '3335', 'commercial', 'pending', 2, '2023-02-09 08:16:47', '2023-02-09 08:16:47'),
(55, 'rent', 'plot', 4, 2, '48', NULL, '888', 'Do aut sint consecte', 8, 'hectare', 938, 'east', '[\"avenue\",\"general\"]', 'Cupiditate sed rem p', 'direct_dealer', 'Marsden French', 'Kennan Mills', '09876543211', NULL, 'pending', 1, '2023-02-09 10:02:47', '2023-02-09 10:02:47'),
(56, 'rent', 'shop', 1, 2, '812', NULL, NULL, 'Aut similique cumque', 3, 'marla', 516, 'north', '[\"boulvard\",\"avenue\",\"general\"]', 'Sint aut omnis in iu', 'direct_client', NULL, 'Herrod Gillespie', '09876543211', NULL, 'pending', 1, '2023-02-09 10:46:07', '2023-02-09 10:46:07'),
(58, 'rent', 'flat', 1, 7, '247', NULL, NULL, 'Hic est tenetur veri', 30, 'marla', 108, 'north', '[\"boulvard\",\"general\",\"corner\"]', 'Repellendus Volupta', 'direct_client', NULL, 'Fay Fields', '09876543211', NULL, 'pending', 1, '2023-02-09 12:12:10', '2023-02-09 12:12:10'),
(59, 'rent', 'plot', 1, 1, '4', NULL, '4', '4', 3, 'marla', 444444, 'north', '[\"boulvard\",\"avenue\"]', NULL, 'direct_client', NULL, 'ff', '03076679053', NULL, 'pending', 3, '2023-02-09 17:37:19', '2023-02-09 17:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Related with same table.',
  `type` enum('admin','user','dealer') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `designation` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `agencyname` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `parent_id`, `type`, `is_active`, `designation`, `image`, `address`, `agencyname`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nouman Habib', '12345678913', 'admin@gmail.com', NULL, '$2a$12$LqOQGbVX0N1hdedHFrev5O531ckHzzb0Mxgvb3mlnFIW4LDhKljVi', NULL, 'admin', 1, 'Salesman', 'users/nouman-habib-1675932250.webp', 'Test address', 'Test', 't9RrFen9ODAg3vAgmmegnupymJXJGMaNVw28cpczGBZuvOSkuSHralNVkkRQ', '2023-01-26 02:43:05', '2023-02-09 08:44:10'),
(2, 'Dealer', '0123456789', 'dealer@gmail.com', NULL, '$2a$12$LqOQGbVX0N1hdedHFrev5O531ckHzzb0Mxgvb3mlnFIW4LDhKljVi', 1, 'dealer', 1, 'New Dealer', 'users/m-ahsan-raza-1675339341.jpg', 'ISB', 'Testing RealEstate', 'oZZtI8uPrkUBdsxIEMnKF1w99BNNd9uJysKH9pMqHXM2keFleq64KD7ccZzI', '2023-01-26 02:43:06', '2023-02-06 02:23:19'),
(3, 'Test User', '01234567891', 'user@gmail.com', NULL, '$2a$12$LqOQGbVX0N1hdedHFrev5O531ckHzzb0Mxgvb3mlnFIW4LDhKljVi', 2, 'user', 1, 'Sales Person', 'users/m-ahsan-raza-1675339341.jpg', 'Test Address', 'Alright Tech', NULL, '2023-01-26 02:43:06', '2023-01-27 10:14:02'),
(5, 'M Ahsan Raza', '03101788277', 'ahsan@gmail.com', NULL, '$2y$10$kZE8FM1/shxVHn/WftKU1eaTa9KVqir2vgMZTtkAXYrNHdAldcNui', 1, 'user', 1, 'Tester', 'users/m-ahsan-raza-1675339341.jpg', 'Murree road  Shamsabad, Rawalpindi', 'NO Agency', NULL, '2023-02-01 04:52:28', '2023-02-02 07:02:21'),
(6, 'Noel Patton', '56786482153', 'qulab@mailinator.com', NULL, '$2y$10$7EO4C3JeXshlAcEMm9mxvOCoIcThDaeRYIngpsyRCI54M2EEwHHZi', 1, 'user', 0, 'Minima', 'users/m-ahsan-raza-1675339341.jpg', 'Aut cumque veniam e', 'k', NULL, '2023-02-01 06:25:28', '2023-02-08 17:45:03'),
(7, 'Michelle Whitney', '09876543211', 'nukeged@mailinator.com', NULL, '$2y$10$DPccfFFiBKe9WBe1pEJ0oeIsjUDwMpK6yYPGc0pnTipURVe9AwqIi', 2, 'user', 0, 'Harum excepteur et e', 'users/m-ahsan-raza-1675339341.jpg', 'Obcaecati quae vel d', 'kokok', NULL, '2023-02-02 06:57:49', '2023-02-06 02:05:13'),
(9, 'Nouman Habib', '12345678911', 'noumanhabib332211@gmail.com', NULL, '$2y$10$lKYElGBt5C1CcuQJ/eLYl.Nfw78Wg7DFVnksMAG939b6n3gNmuabC', 2, 'user', 0, 'Salesman', 'users/m-ahsan-raza-1675339341.jpg', 'Test address', 'Test', NULL, '2023-02-07 08:10:25', '2023-02-09 06:16:39'),
(10, 'Nouman Habib', '12345678911', 'noumanhabib332211@gmail.co', NULL, '$2y$10$tuqWst07AJP4O38vDWL7vOSDXrd9iJ9Gd6aUHlUv9XMkLHMYAal.i', 2, 'user', 1, 'Salesman', 'users/m-ahsan-raza-1675339341.jpg', 'Test address', 'Test', NULL, '2023-02-07 11:42:17', '2023-02-07 11:42:17'),
(11, 'Dorian Charles', '09876543211', 'fyjysona@mailinator.com', NULL, '$2y$10$CB867OHBcYeqoiuwvKdahO/9739SZR./XZZW8T.O1Y8GWEJTaUFe.', 1, 'user', 0, 'Officiis reiciendis', 'users/dorian-charles-1675862801.png', 'Eveniet qui esse bl', NULL, NULL, '2023-02-08 13:26:41', '2023-02-08 13:26:59'),
(12, 'Lesley Murphy', '09876543211', 'fege@mailinator.com', NULL, '$2y$10$16IgItEStdiUVFWYh3Yc/OmPqeX5B8kUWS01iwmotEpeDAjncqKLu', 1, 'user', 1, 'Ex di', 'users/lesley-murphy-1675862862.jpg', 'Excepturi occaecat e', NULL, NULL, '2023-02-08 13:27:42', '2023-02-08 17:39:31'),
(13, 'Ahsan', '03076679053', 'ahsan1001058@gmail.com', NULL, '$2y$10$Dq2E8xntfNG4DAvZ8zQ8uuHeAe4b2xWzhuw7z5DWZRx8D0WXlDrx6', 1, 'user', 1, 'Test', NULL, 'ABX', NULL, NULL, '2023-02-08 17:33:18', '2023-02-08 17:33:18'),
(14, 'Ahsan', '03076679053', 'aa@gmail.com', NULL, '$2y$10$N0Y98De/U2JYR.aWpoaYJuIyqIpHBkhBFrj1JyjAdywgbSJiiORTa', 1, 'user', 1, 'Marketing Exective', NULL, NULL, NULL, NULL, '2023-02-09 08:53:00', '2023-02-09 08:53:00'),
(15, 'Ahsan', '03076679053', 'b@gmail.com', NULL, '$2y$10$IOXgRT444cKH2KJDhCkLrODLe7ph4uWix.uz8EQItHM6LwqAHnz.G', 1, 'user', 1, 'Marketing Exective', NULL, NULL, NULL, NULL, '2023-02-09 08:55:07', '2023-02-09 08:55:07'),
(16, 'Tana Cain', '09876543211', 'fevafo@mailinator.com', NULL, '$2y$10$FfZRn7SbdWhWN.6rjLp5RejSaiSk4EUfUeqDYkHiF9c/A7B7H05de', 1, 'user', 1, 'Excepteur quo volupt', 'users/tana-cain-1675935194.png', 'Amet enim deleniti', NULL, NULL, '2023-02-09 09:33:14', '2023-02-09 09:33:14'),
(17, 'Tae-yeon', '09876543211', 'thesycoahsan@gmail.com', NULL, '$2y$10$R/LFf2uP9CfgqdhCaB7BmOJIAJeoyomyoT1dUk33HKJVmbo.c.GVa', 1, 'dealer', 1, 'Tester', 'users/tae-yeon-1675935684.png', '209-1, Yonggang-dong,', NULL, NULL, '2023-02-09 09:41:24', '2023-02-09 09:41:24'),
(18, 'Elaine Rich', '09876543211', 'test@gmail.com', NULL, '$2y$10$8Op9H9nSDU7DnXclIAsOoOpqe.FxKrJeDutz4SuCB/2R18St0kiXC', 1, 'user', 1, 'Veritatis obcaecati', 'users/elaine-rich-1675947519.jpg', 'Sint non adipisci l', NULL, NULL, '2023-02-09 12:58:39', '2023-02-09 12:58:39'),
(19, 'ttt', '03076679053', 't@gmail.com', NULL, '$2y$10$5NPDYHngSB9oVsIbbG4y/.g6NGjRwiGNLdk4EjOpVVfxXvsnGlhSu', 1, 'user', 1, 'Test', NULL, NULL, NULL, NULL, '2023-02-09 14:56:33', '2023-02-09 14:56:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_phases`
--
ALTER TABLE `area_phases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_phases_area_id_foreign` (`area_id`);

--
-- Indexes for table `area_user`
--
ALTER TABLE `area_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_user_user_id_foreign` (`user_id`),
  ADD KEY `area_user_area_id_foreign` (`area_id`);

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
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_area_id_foreign` (`area_id`),
  ADD KEY `properties_area_phase_id_foreign` (`area_phase_id`),
  ADD KEY `properties_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `area_phases`
--
ALTER TABLE `area_phases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `area_user`
--
ALTER TABLE `area_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_phases`
--
ALTER TABLE `area_phases`
  ADD CONSTRAINT `area_phases_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`);

--
-- Constraints for table `area_user`
--
ALTER TABLE `area_user`
  ADD CONSTRAINT `area_user_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `area_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `properties_area_phase_id_foreign` FOREIGN KEY (`area_phase_id`) REFERENCES `area_phases` (`id`),
  ADD CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
