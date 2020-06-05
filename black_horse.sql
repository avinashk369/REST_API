-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2020 at 08:15 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `black_horse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

DROP TABLE IF EXISTS `admin_master`;
CREATE TABLE IF NOT EXISTS `admin_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `user_name`, `password`, `is_admin`, `flags`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$jZusTBEuqtNOCT8APdJy3eavGTs.D4ojqoQfS1KzSiJBWzOczikVu', 1, '00000', '2020-06-03 22:59:30', '2020-06-03 22:59:30'),
(2, 'subadmin', '$2y$10$fu9U0BjcGgE8JtTVofhaW.x3pVnbXsyWlHavBrrF.jPBDMI64H.oy', 0, '00000', '2020-06-04 05:56:05', '2020-06-04 05:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game_master`
--

DROP TABLE IF EXISTS `game_master`;
CREATE TABLE IF NOT EXISTS `game_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tag_line` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `l_num_prize` double(8,2) NOT NULL DEFAULT '0.00',
  `r_num_prize` double(8,2) NOT NULL DEFAULT '0.00',
  `p_num_prize` double(8,2) NOT NULL DEFAULT '0.00',
  `is_offer` tinyint(1) NOT NULL,
  `offer_id` bigint(20) DEFAULT NULL,
  `result_time` timestamp NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_master`
--

INSERT INTO `game_master` (`id`, `name`, `tag_line`, `l_num_prize`, `r_num_prize`, `p_num_prize`, `is_offer`, `offer_id`, `result_time`, `flags`, `created_at`, `updated_at`) VALUES
(1, 'Morining', 'double dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-29 02:23:23', '10000', '2020-06-05 13:36:56', '2020-05-29 14:49:01'),
(2, 'Afternoon', 'douoble dhamaka', 500.00, 100.00, 50.00, 0, NULL, '2020-05-29 02:23:23', '10000', '2020-06-05 14:44:03', '2020-05-31 23:31:18'),
(3, 'Morining', 'double dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-29 02:23:23', '00000', '2020-05-29 14:44:20', '2020-05-29 14:44:20'),
(5, 'Morining', 'double dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 00:17:37', '2020-05-30 00:17:37'),
(6, 'Morining', 'double dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 00:35:52', '2020-05-30 00:35:52'),
(7, 'Afternoon', 'double dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 02:58:40', '2020-05-30 02:58:40'),
(8, 'Afternoon', 'double dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 08:32:30', '2020-05-30 08:32:30'),
(9, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 08:44:54', '2020-05-30 08:44:54'),
(10, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 07:53:23', '00000', '2020-05-30 14:16:56', '2020-05-30 14:16:56'),
(11, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 06:25:29', '2020-05-30 06:25:29'),
(12, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 06:27:56', '2020-05-30 06:27:56'),
(13, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-29 18:30:00', '2020-05-30 06:28:11'),
(14, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-29 18:30:00', '2020-05-30 06:28:18'),
(15, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-29 18:30:00', '2020-05-30 06:28:19'),
(16, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-29 18:30:00', '2020-05-30 06:28:21'),
(17, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 06:28:26', '2020-05-30 06:28:26'),
(18, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 06:31:52', '2020-05-30 06:31:52'),
(19, 'Afternoon', 'bonus dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 06:32:19', '2020-05-30 06:32:19'),
(20, 'evening', 'evening dhamaka', 500.00, 0.00, 0.00, 0, NULL, '2020-05-30 02:23:23', '00000', '2020-05-30 06:33:22', '2020-05-30 06:34:10'),
(21, 'Morining', 'douoble dhamaka', 500.00, 500.00, 500.00, 1, NULL, '2020-05-29 02:23:23', '00000', '2020-05-31 13:39:19', '2020-05-31 13:39:19'),
(22, 'Morining', 'douoble dhamaka', 500.00, 500.00, 500.00, 1, NULL, '2020-06-05 02:23:23', '00000', '2020-06-05 02:33:57', '2020-06-05 02:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `game_type`
--

DROP TABLE IF EXISTS `game_type`;
CREATE TABLE IF NOT EXISTS `game_type` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `game_type_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_type`
--

INSERT INTO `game_type` (`id`, `name`, `flags`, `created_at`, `updated_at`) VALUES
(2, 'Right', '00000', '2020-05-31 12:47:39', '2020-05-31 12:47:39'),
(3, 'Pair', '00000', '2020-05-31 12:47:43', '2020-05-31 12:47:43'),
(4, 'Left', '00000', '2020-05-31 12:51:20', '2020-05-31 12:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `kyc_master`
--

DROP TABLE IF EXISTS `kyc_master`;
CREATE TABLE IF NOT EXISTS `kyc_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `pan_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pan_verified` tinyint(1) NOT NULL,
  `bank_verified` tinyint(1) NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kyc_master_pan_num_unique` (`pan_num`),
  UNIQUE KEY `kyc_master_account_num_unique` (`account_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_05_29_101125_create_result_masters_table', 2),
(10, '2020_05_29_102439_create_user_game_masters_table', 2),
(11, '2020_05_29_103245_create_winner_masters_table', 2),
(12, '2020_05_29_103506_create_wallet_masters_table', 2),
(13, '2020_05_29_103738_create_withdraw_masters_table', 2),
(14, '2020_05_29_103836_create_transaction_masters_table', 2),
(15, '2020_05_29_104023_create_kyc_masters_table', 2),
(16, '2020_05_29_105552_create_game_types_table', 2),
(17, '2020_05_29_105704_create_game_masters_table', 2),
(18, '2020_05_29_111506_create_offer_masters_table', 2),
(19, '2020_06_03_120817_admin_master', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('035d1c6182a03f3df7d2f313efe4acd5fcbaee947c4df548f231dcfe59a6ebe94e5c0a434b470ee7', 2, 1, 'access_token', '[]', 0, '2020-06-04 05:56:05', '2020-06-04 05:56:05', '2021-06-04 11:26:05'),
('0aa51b9221ff9e7eadc0fada0de5d35bd55a3bd8624fcdf8ef4f90cf01609e90dd7b0b2890bd7367', 1, 1, 'access_token', '[]', 0, '2020-06-04 00:57:54', '2020-06-04 00:57:54', '2021-06-04 06:27:54'),
('12a100008d625ed5c338bf45cf87025586bf589aefcc7b4063ba7ade93e79a40026a95e5c2d640cf', 1, 1, 'access_token', '[]', 0, '2020-06-04 05:55:32', '2020-06-04 05:55:32', '2021-06-04 11:25:32'),
('173723698b1c7853db80d265f7411e2e9689700768eac093e7f3eecd1594ef8df4fc0f0d9c3a04a7', 2, 1, 'access_token', '[]', 0, '2020-06-04 23:24:08', '2020-06-04 23:24:08', '2021-06-05 04:54:08'),
('18c36b3b399802f983ce9c616a0a86fb164e5e860d111f5bd6e97f7bf76176ab0b05bfe6131db66f', 1, 1, 'access_token', '[]', 0, '2020-06-04 05:08:53', '2020-06-04 05:08:53', '2021-06-04 10:38:53'),
('1a07a8da86085c0a625a1510b31e4255fdd6f967877a213421a5e9c9f7fca8ae1a1ba3be7619e44c', 1, 1, 'access_token', '[]', 0, '2020-06-04 00:52:36', '2020-06-04 00:52:36', '2021-06-04 06:22:36'),
('1ac84656efccac83745c9e0b43140ac43e444744a0d2021b61c50e0258ab239e3a6cc89f06246742', 1, 1, 'access_token', '[]', 0, '2020-06-04 23:09:31', '2020-06-04 23:09:31', '2021-06-05 04:39:31'),
('2338dc536ac0a60fdd20a261de2e425c86591ee7c43fc764dcad322a68ed25dc6a12908c92fd4d0b', 1, 1, 'access_token', '[]', 0, '2020-05-29 07:40:09', '2020-05-29 07:40:09', '2021-05-29 13:10:09'),
('2a3e36f2b0259a57900b43ec98840bf6e043806c055b4ef6f24f43df00d27a738ec9630fa0329b95', 1, 1, 'access_token', '[]', 0, '2020-06-04 11:28:46', '2020-06-04 11:28:46', '2021-06-04 16:58:46'),
('2cd425539896cc96b73f428a462470f95c3bb43892f68e48263abbc85828f9acc5474fd9acb8c42f', 1, 1, 'access_token', '[]', 0, '2020-06-04 00:06:30', '2020-06-04 00:06:30', '2021-06-04 05:36:30'),
('3267713be236abe6d13eaadd5ac08e3c73a9e79d6ba6a609a5b6b9ebcc0ef15b042e0eff3bd51c2b', 1, 1, 'access_token', '[]', 0, '2020-06-04 11:29:00', '2020-06-04 11:29:00', '2021-06-04 16:59:00'),
('3d8b23dfc4dc2a9d9888114aa58f4e1f94561b3bf296635796d85ba6f8537ab9cec05ca4c564c998', 1, 1, 'access_token', '[]', 0, '2020-05-29 02:26:42', '2020-05-29 02:26:42', '2021-05-29 07:56:42'),
('42dc4d12365ecb84c922ed11b2f10114e8e752da8b612bd4ebf1577e2040cd7b1cf85bc90b6c1927', 1, 1, 'access_token', '[]', 0, '2020-05-29 02:23:23', '2020-05-29 02:23:23', '2021-05-29 07:53:23'),
('44dc2d11305c6b7c783842c9200cf009393034ba6c1bc20f0ddcde0fd1335aa6a2655dd2c3da5b5e', 1, 1, 'access_token', '[]', 0, '2020-06-04 00:57:32', '2020-06-04 00:57:32', '2021-06-04 06:27:32'),
('4b134b343dbd35555e6240546c7c6ed244903a5827f80de496dfa663a798003d97f073116574eace', 1, 1, 'access_token', '[]', 0, '2020-06-04 05:04:24', '2020-06-04 05:04:24', '2021-06-04 10:34:24'),
('53983d26aed89a32d23f7a4d4f3664d28842a07e61656e2fa4b11d76594beb2eaee1917c63ed9cd5', 1, 1, 'access_token', '[]', 0, '2020-06-03 23:35:30', '2020-06-03 23:35:30', '2021-06-04 05:05:30'),
('5815d8a4557bc15965c1cd48a89c5d2d182242c26c17eb8536854a610eca469cb47e5af07f0f3253', 1, 1, 'access_token', '[]', 0, '2020-06-04 01:14:46', '2020-06-04 01:14:46', '2021-06-04 06:44:46'),
('6404849c02a521c0f0dcbf2de45164359ab5952a0f0bdac262f8daf81959023af0ea10f2b1a5d5f2', 1, 1, 'access_token', '[]', 0, '2020-06-04 01:13:05', '2020-06-04 01:13:05', '2021-06-04 06:43:05'),
('662261ac7c2546bcb4543a832cfe09f0f9efe55e9e6d3d5f8f13df1718fc684010db6c94b8abd325', 1, 1, 'access_token', '[]', 0, '2020-06-04 01:15:24', '2020-06-04 01:15:24', '2021-06-04 06:45:24'),
('69bc7786516019d066a4afc7cb12bef513f2f71127840340c966722b9becf5f790313cc1f449712a', 1, 1, 'access_token', '[]', 0, '2020-06-04 10:34:09', '2020-06-04 10:34:09', '2021-06-04 16:04:09'),
('6c2c8430c06f42dd0aa9f918b8956d1af083ae82f6e828136ce82caed28e950498865c31cb0cdf36', 1, 1, 'access_token', '[]', 0, '2020-06-03 23:35:12', '2020-06-03 23:35:12', '2021-06-04 05:05:12'),
('6fc3544be0a230bdabf70969e6b24f940228785ece7493af3995017b015c7e5ce4278d5edb9dafa9', 2, 1, 'access_token', '[]', 0, '2020-05-30 22:23:00', '2020-05-30 22:23:00', '2021-05-31 03:53:00'),
('8f12bad64a19dbabf087c8e8cc6985abcbc63d1045e73f36062f7553cf37fbddac815327bb1a8e91', 1, 1, 'access_token', '[]', 0, '2020-06-04 11:28:25', '2020-06-04 11:28:25', '2021-06-04 16:58:25'),
('8fe9fd8daee7151ad603d9856e4ac4ca69cddab836afc02fd5527d4a0a0f27fe4ebe874646bdfc3c', 1, 1, 'access_token', '[]', 0, '2020-06-04 05:05:11', '2020-06-04 05:05:11', '2021-06-04 10:35:11'),
('9056c813e8c3c3f5f3d0e81dcca807322d08565e1971d86e8cb1e0b1a7b7382acd562b2cb09104b7', 1, 1, 'access_token', '[]', 0, '2020-06-04 11:20:25', '2020-06-04 11:20:25', '2021-06-04 16:50:25'),
('925b228c40385b0814ed1753d75d5d5e95f7841541230404fccd3ac446dda239eb7de82e6c4f71c1', 1, 1, 'access_token', '[]', 0, '2020-06-04 05:04:42', '2020-06-04 05:04:42', '2021-06-04 10:34:42'),
('981f9278501aa7b2c46fc6386077fa8fe460512da8b0aebc7c7cff7bbfbc4ddc789f7f09365aa5b5', 1, 1, 'access_token', '[]', 0, '2020-06-04 00:58:28', '2020-06-04 00:58:28', '2021-06-04 06:28:28'),
('9a4a6e35c748544511ed8d4107be1a2e9fd2f5e3fa5e7b0e5da3b312e58d300f2a5def7c04c3c11e', 1, 1, 'access_token', '[]', 0, '2020-06-04 01:11:26', '2020-06-04 01:11:26', '2021-06-04 06:41:26'),
('9ab5971ba9f78ca859f0056c4198bed5566bc1cfe35e5c6c333bd8efc1f070e6ea2a49acba290826', 1, 1, 'access_token', '[]', 0, '2020-06-04 01:12:28', '2020-06-04 01:12:28', '2021-06-04 06:42:28'),
('9ee247a992049ca1319b6c5b08208539725de1e03dd486656499abf4d551631dfec7080e82928693', 1, 1, 'access_token', '[]', 0, '2020-06-04 07:13:48', '2020-06-04 07:13:48', '2021-06-04 12:43:48'),
('9efebccc0099da66061627a678bc36c4405ba2579646f66fc63f5625ad3110d063899766c8e15bf0', 1, 1, 'access_token', '[]', 0, '2020-06-04 10:30:57', '2020-06-04 10:30:57', '2021-06-04 16:00:57'),
('a784f56406bdd611e15e463abbdd65256de66ad964abeb6203277e752b6072196cc04d7a35766d6d', 1, 1, 'access_token', '[]', 0, '2020-06-03 22:59:30', '2020-06-03 22:59:30', '2021-06-04 04:29:30'),
('a9aac194b887059b24129e77f2b5339e3278116d187b2b98c5c6eae30cd72731dde152073372c14f', 1, 1, 'access_token', '[]', 0, '2020-06-04 05:04:35', '2020-06-04 05:04:35', '2021-06-04 10:34:35'),
('afb3d879eb4619d33a12971249c1133d5d5442e305e815d35ac38c9d074d25f4a6b765d143a4e124', 1, 1, 'access_token', '[]', 0, '2020-06-04 05:00:09', '2020-06-04 05:00:09', '2021-06-04 10:30:09'),
('b0b59175678d378c87544f0b7e3bfec8c17b816602b3446f29190974a792ba4974afda1e58a1ff4e', 1, 1, 'access_token', '[]', 0, '2020-06-04 01:14:57', '2020-06-04 01:14:57', '2021-06-04 06:44:57'),
('ba601d1a6e681e1ec1666b150a4e5eac679933324b6dc9568d875be1e9ab37d68cc3d157110eb98c', 1, 1, 'access_token', '[]', 0, '2020-06-04 01:14:10', '2020-06-04 01:14:10', '2021-06-04 06:44:10'),
('bd7fbcc46110ba2c7ae904396556d5df361bc6f6e30936f3e547d2188b2a7699a6642b9ca47b6ff0', 1, 1, 'access_token', '[]', 0, '2020-06-04 05:55:39', '2020-06-04 05:55:39', '2021-06-04 11:25:39'),
('dd6262b6dbb98f75a2f57c3dd8c0818fd7475c3f116ab98a76fa6d755da0cd3585a7790e33c10cad', 1, 1, 'access_token', '[]', 0, '2020-06-04 01:13:55', '2020-06-04 01:13:55', '2021-06-04 06:43:55'),
('df152c3f40fa19c4ea603d89fbce46e29e220f8737af584d6f80712ee081fa018ad6844acf43a321', 1, 1, 'access_token', '[]', 0, '2020-06-04 05:55:34', '2020-06-04 05:55:34', '2021-06-04 11:25:34'),
('df8f5725bbbcf5365f3d907624b9183a919dc3d0637b4ed9cf2f73c262afa620e9f319c735e2cf5d', 1, 1, 'access_token', '[]', 0, '2020-05-29 02:24:00', '2020-05-29 02:24:00', '2021-05-29 07:54:00'),
('f1c57ad30cffaaa5614e9963b6325c59b55ffbde26443309cfd6b6f3cff868d1d568c88603fe98ab', 1, 1, 'access_token', '[]', 0, '2020-06-03 23:35:45', '2020-06-03 23:35:45', '2021-06-04 05:05:45'),
('f284303dc7661c4eb91209b0117ed3588d2534e7ef35de68c57cc6304e269afc64203c7ee0381b17', 1, 1, 'access_token', '[]', 0, '2020-06-03 23:55:14', '2020-06-03 23:55:14', '2021-06-04 05:25:14'),
('f3279447b31a3083ee7feeca369b8b2be6ecf83a6f7ed9e1733586292d5b684392d4a09c89eb2eb3', 1, 1, 'access_token', '[]', 0, '2020-06-03 23:32:28', '2020-06-03 23:32:28', '2021-06-04 05:02:28'),
('f395906b7f9f3445c1de2a47cdfd6266fc96e72be0003311ae9837580753cc9940fbd5245c6bc91d', 1, 1, 'access_token', '[]', 0, '2020-06-03 23:47:31', '2020-06-03 23:47:31', '2021-06-04 05:17:31'),
('f509d0c287b76c635982d68c406d5ba9c9d8a97f1259b59134df3f823a6731913c19c480c38ca5c9', 1, 1, 'access_token', '[]', 0, '2020-06-04 00:06:17', '2020-06-04 00:06:17', '2021-06-04 05:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'GT2eO8kqPdENHObcF1pBxWAV9izZDLZ33eANO9IF', NULL, 'http://localhost', 1, 0, 0, '2020-05-29 02:22:21', '2020-05-29 02:22:21'),
(2, NULL, 'Laravel Password Grant Client', 'CSQzP2w09SoTZl9bRsv7izEdGGZHghwPgOTAcARj', 'users', 'http://localhost', 0, 1, 0, '2020-05-29 02:22:21', '2020-05-29 02:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-05-29 02:22:21', '2020-05-29 02:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_master`
--

DROP TABLE IF EXISTS `offer_master`;
CREATE TABLE IF NOT EXISTS `offer_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tag_line` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_master`
--

DROP TABLE IF EXISTS `result_master`;
CREATE TABLE IF NOT EXISTS `result_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `game_id` bigint(20) NOT NULL,
  `l_num` int(11) NOT NULL,
  `r_num` int(11) NOT NULL,
  `pair_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `result_master`
--

INSERT INTO `result_master` (`id`, `game_id`, `l_num`, `r_num`, `pair_num`, `flags`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 6, '7,9', '00000', '2020-05-31 23:31:18', '2020-05-31 23:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_master`
--

DROP TABLE IF EXISTS `transaction_master`;
CREATE TABLE IF NOT EXISTS `transaction_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `t_amount` double(8,2) NOT NULL,
  `is_credit` tinyint(1) NOT NULL,
  `is_debit` tinyint(1) NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction_master`
--

INSERT INTO `transaction_master` (`id`, `user_id`, `t_amount`, `is_credit`, `is_debit`, `flags`, `created_at`, `updated_at`) VALUES
(1, 1, 2.00, 1, 0, '00000', '2020-06-01 04:10:28', '2020-06-01 04:10:28'),
(2, 1, 4.00, 1, 0, '00000', '2020-06-01 04:13:39', '2020-06-01 04:13:39'),
(3, 1, 2.00, 1, 0, '00000', '2020-06-01 04:14:19', '2020-06-01 04:14:19'),
(4, 1, 4.00, 0, 1, '00000', '2020-06-01 04:26:59', '2020-06-01 04:26:59'),
(5, 1, 10.00, 0, 1, '00000', '2020-06-01 04:27:36', '2020-06-01 04:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_game_master`
--

DROP TABLE IF EXISTS `user_game_master`;
CREATE TABLE IF NOT EXISTS `user_game_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `game_id` bigint(20) NOT NULL,
  `l_num` int(11) DEFAULT NULL,
  `r_num` int(11) DEFAULT NULL,
  `pair_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0,0',
  `is_left` tinyint(1) DEFAULT '0',
  `is_right` tinyint(1) DEFAULT '0',
  `is_pair` tinyint(1) DEFAULT '0',
  `bet_amount` double(8,2) NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_game_master`
--

INSERT INTO `user_game_master` (`id`, `user_id`, `game_id`, `l_num`, `r_num`, `pair_num`, `is_left`, `is_right`, `is_pair`, `bet_amount`, `flags`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 3, 1, '3,6', 0, 1, 0, 100.00, '00000', '2020-05-30 12:15:14', '2020-05-30 12:15:14'),
(3, 2, 1, 2, 1, '6,6', 1, 0, 0, 100.00, '00000', '2020-05-30 12:15:17', '2020-05-30 12:15:17'),
(4, 1, 1, 3, 1, '6,3', 1, 1, 0, 100.00, '00000', '2020-05-30 12:16:24', '2020-05-30 12:16:24'),
(5, 1, 1, 4, 1, '3,6', 0, 1, 0, 100.00, '00000', '2020-05-30 12:16:25', '2020-05-30 12:16:25'),
(6, 1, 5, 4, 1, '5,7', 0, 1, 1, 100.00, '00000', '2020-05-30 12:16:27', '2020-05-30 12:16:27'),
(7, 1, 2, 4, 6, '9,9', 0, 1, 0, 100.00, '00000', '2020-05-30 12:16:29', '2020-05-30 12:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

DROP TABLE IF EXISTS `user_master`;
CREATE TABLE IF NOT EXISTS `user_master` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_master_mobile_unique` (`mobile`),
  UNIQUE KEY `user_master_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `name`, `email`, `mobile`, `flags`, `email_verified_at`, `password`, `otp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '9540621919', '00000', NULL, '$2y$10$s72aPu82TWJRW92xRVyEI.XnMQ5B7.AfWU5KGJYOT3UWYX5/cWU4.', '$2y$10$F6GtOiOF96Ye3.lZ7M0bT.lkG2iadARblJ6inYcyPbvQvY0Tnr8ei', NULL, '2020-05-29 02:23:23', '2020-05-29 02:23:23'),
(2, NULL, NULL, '9540621911', '00000', NULL, '$2y$10$1Ns/CF/NSpX1.dt3vrLGt.P8QZCIaqIUz7FaCbI42Hc0IY9QHsdYq', '$2y$10$vX2GkmvD8RTm608zxxwqx.3JJYmHd1hP8TF6l4jY01TtJrWkoZZay', NULL, '2020-05-30 22:22:59', '2020-05-30 22:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_master`
--

DROP TABLE IF EXISTS `wallet_master`;
CREATE TABLE IF NOT EXISTS `wallet_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `cash_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `promo_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `avl_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallet_master`
--

INSERT INTO `wallet_master` (`id`, `user_id`, `cash_amount`, `promo_amount`, `avl_amount`, `flags`, `created_at`, `updated_at`) VALUES
(16, 1, 6.00, 24.00, 30.00, '00000', '2020-06-01 04:10:27', '2020-06-01 04:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `winner_master`
--

DROP TABLE IF EXISTS `winner_master`;
CREATE TABLE IF NOT EXISTS `winner_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_game_id` bigint(20) NOT NULL,
  `game_id` bigint(20) NOT NULL,
  `is_win` tinyint(1) NOT NULL,
  `is_lost` tinyint(1) NOT NULL,
  `winning_amount` double(8,2) NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `winner_master`
--

INSERT INTO `winner_master` (`id`, `user_id`, `user_game_id`, `game_id`, `is_win`, `is_lost`, `winning_amount`, `flags`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, 0, 1, 0.00, '00000', '2020-05-31 23:31:18', '2020-05-31 23:31:18'),
(2, 1, 7, 2, 1, 0, 100.00, '00000', '2020-05-31 23:31:18', '2020-05-31 23:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_master`
--

DROP TABLE IF EXISTS `withdraw_master`;
CREATE TABLE IF NOT EXISTS `withdraw_master` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `w_amount` double(8,2) NOT NULL,
  `flags` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `withdraw_master`
--

INSERT INTO `withdraw_master` (`id`, `user_id`, `w_amount`, `flags`, `created_at`, `updated_at`) VALUES
(3, 1, 4.00, '00000', '2020-06-01 04:26:59', '2020-06-01 04:26:59'),
(4, 1, 10.00, '00000', '2020-06-01 04:27:36', '2020-06-01 04:27:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
