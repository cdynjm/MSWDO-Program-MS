-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 11:37 AM
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
-- Database: `mswdo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `latitude` decimal(11,4) DEFAULT NULL,
  `longitude` decimal(11,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `brgy`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Talisay', '124.9658', '10.3636', '2023-07-30 06:04:31', NULL),
(2, 'Anahao', '124.9190', '10.3002', '2023-07-30 06:04:55', NULL),
(3, 'Banahao', '124.9010', '10.4207', '2023-07-30 06:06:20', NULL),
(4, 'Baugo', '124.9203', '10.3824', '2023-07-30 06:06:20', NULL),
(5, 'Beniton', '124.9190', '10.3670', '2023-07-30 06:06:20', NULL),
(6, 'Buenavista', '124.9259', '10.3339', '2023-07-30 06:11:44', NULL),
(7, 'Bunga', '124.9314', '10.3094', '2023-07-30 06:11:45', NULL),
(8, 'Casao', '124.9631', '10.3688', '2023-07-30 06:11:45', NULL),
(9, 'Catmon', '124.9148', '10.3449', '2023-07-30 06:11:45', NULL),
(10, 'Catoogan', '124.8983', '10.3708', '2023-07-30 06:11:45', NULL),
(11, 'Cawayanan', '124.9443', '10.3439', '2023-07-30 06:11:45', NULL),
(12, 'Dao', '124.9438', '10.3258', '2023-07-30 06:11:45', NULL),
(13, 'Divisoria', '124.9638', '10.3426', '2023-07-30 06:11:45', NULL),
(14, 'Esperanza', '124.9306', '10.3592', '2023-07-30 06:11:45', NULL),
(15, 'Guinsangaan', '124.9548', '10.3554', '2023-07-30 06:11:45', NULL),
(16, 'Hibagwan', '124.9093', '10.3551', '2023-07-30 06:14:51', NULL),
(17, 'Hilaan', '124.8985', '10.4055', '2023-07-30 06:14:51', NULL),
(18, 'Himakilo', '124.9404', '10.3647', '2023-07-30 06:14:51', NULL),
(19, 'Hitawos', '124.8987', '10.4401', '2023-07-30 06:14:51', NULL),
(20, 'Lanao', '124.8928', '10.3906', '2023-07-30 06:14:51', NULL),
(21, 'Lawgawan', '124.9211', '10.4212', '2023-07-30 06:14:51', NULL),
(22, 'Mahayahay', '124.9124', '10.3091', '2023-07-30 06:14:51', NULL),
(23, 'Malbago', '124.9206', '10.3819', '2023-07-30 06:15:09', NULL),
(24, 'Mauylab', '124.9524', '10.3315', '2023-07-30 06:16:13', NULL),
(25, 'Olisihan', '124.9143', '10.4759', '2023-07-30 06:16:13', NULL),
(26, 'Paku', '124.9259', '10.3196', '2023-07-30 06:16:13', NULL),
(27, 'Pamahawan', '124.9093', '10.3216', '2023-07-30 06:18:19', NULL),
(28, 'Pamigsian', '124.9259', '10.4248', '2023-07-30 06:18:19', NULL),
(29, 'Pangi', '124.9556', '10.3806', '2023-07-30 06:18:19', NULL),
(30, 'Poblacion', '124.9706', '10.3541', '2023-07-30 06:18:19', NULL),
(31, 'Pong-on', '124.9093', '10.3933', '2023-07-30 06:18:19', NULL),
(32, 'Sampongon', '124.9369', '10.3326', '2023-07-30 06:18:19', NULL),
(33, 'San Ramon', '124.9631', '10.3568', '2023-07-30 06:18:19', NULL),
(34, 'San Vicente', '124.9482', '10.3339', '2023-07-30 06:20:35', NULL),
(35, 'Santa Cruz', '124.9658', '10.3756', '2023-07-30 06:20:35', NULL),
(36, 'Santo Nino', '124.9644', '10.3483', '2023-07-30 06:20:35', NULL),
(37, 'Taa', '124.9369', '10.3851', '2023-07-30 06:20:35', NULL),
(38, 'Taytagan', '124.9465', '10.3589', '2023-07-30 06:20:35', NULL),
(39, 'Tuburan', '124.9369', '10.3708', '2023-07-30 06:20:35', NULL),
(40, 'Union', '124.9700', '10.3330', '2023-07-30 06:20:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`id`, `name`, `gender`, `contact_number`, `address`, `birthdate`, `created_at`, `updated_at`) VALUES
(56, 'TINDUGAN, MARIBEL C.', 'F', '09661195690', '13', '1985-05-08', '2023-08-06 06:16:37', NULL),
(57, 'TUAN, JESSALYN QUIBAS', 'F', '09661195690', '38', '1991-03-21', '2023-08-06 06:18:22', NULL),
(58, 'BONGCALES, AMADO GALENDEZ JR.', 'M', '09661195690', '34', '2004-09-27', '2023-08-06 06:23:15', NULL),
(59, 'DIABORDO, DELIA PAULIN', 'F', '09661195690', '23', '1976-05-26', '2023-08-06 06:29:51', NULL),
(60, 'MOLINDA, MARIA LORINA L.', 'F', '09661195690', '13', '1978-02-17', '2023-08-06 06:34:19', NULL),
(61, 'MAGDUGO, ANGELINA L.', 'F', '09661195690', '24', '1974-08-07', '2023-08-06 06:38:23', NULL),
(62, 'VALLINAS, EVE C.', 'F', '09355209089', '24', '1995-05-18', '2023-08-06 07:33:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('01d33e69-d23c-494a-adb2-7321506d6ddb', 1, 43, 'good morning', NULL, 1, '2023-08-06 13:28:06', '2023-08-06 13:35:22'),
('27d13409-9a33-4b61-8457-b332abb00869', 43, 5, 'hi morning too', NULL, 1, '2023-08-06 13:49:01', '2023-08-06 14:01:41'),
('30ceb6d6-fb41-4e91-8e97-ec004d47dc5d', 5, 41, 'what ca i do for youu?', NULL, 1, '2023-08-06 16:18:16', '2023-08-06 17:40:29'),
('31fd6b3b-d918-42b0-9d72-09068e3a9806', 5, 43, 'heyoww', NULL, 1, '2023-08-06 13:43:14', '2023-08-06 13:48:55'),
('35d3caba-8a47-48b0-910e-885b1ea5c975', 1, 48, 'helloo', NULL, 0, '2023-08-06 23:38:32', '2023-08-06 23:38:32'),
('35f34fa1-4dd3-417f-a1db-6710a5272178', 43, 1, 'okay lang po😁', NULL, 1, '2023-08-06 13:35:55', '2023-08-06 13:36:00'),
('6309e8e9-6e2e-4068-b157-404a0457f0cb', 1, 5, 'hello', NULL, 1, '2023-08-09 01:17:47', '2023-08-14 18:27:04'),
('6560af8c-989d-4ef0-84fc-e5d641b1de5f', 5, 1, 'i&#039;m fine', NULL, 1, '2023-08-08 23:08:42', '2023-08-08 23:08:43'),
('6c8a0e3d-2aeb-491a-a697-8d4bb92cc5c3', 41, 5, 'Good afternoon', NULL, 1, '2023-08-06 20:01:20', '2023-08-07 16:26:33'),
('84572e12-7efb-4e5d-a2a1-d1a186683074', 5, 41, 'helloo', NULL, 1, '2023-08-07 16:26:40', '2023-08-07 18:35:27'),
('8a2fad8b-48fa-435e-b08d-b11b8c9a0ac6', 1, 43, 'ohh thats nicee', NULL, 1, '2023-08-06 13:38:53', '2023-08-07 22:04:44'),
('bf93db12-cb05-4b5b-bd49-cfd5adbfbc08', 5, 1, 'good afternoon', NULL, 1, '2023-08-08 23:08:19', '2023-08-08 23:08:26'),
('ca221c8c-b5b5-4fec-bf0d-7f4f4971d21f', 41, 5, 'good morning maam', NULL, 1, '2023-08-06 16:15:50', '2023-08-06 16:18:07'),
('e9ea39ab-cb77-4e6d-88df-1c0c0d4a8dee', 1, 43, 'how are you', NULL, 1, '2023-08-06 13:34:21', '2023-08-06 13:35:22'),
('f655f3f0-9fc1-4633-8ba1-a4e044cef994', 43, 3, 'thank you sir', NULL, 0, '2023-08-09 22:36:34', '2023-08-09 22:36:34'),
('fc2c091d-4ade-431a-8fc6-5a0e1cb05cd3', 1, 5, 'hello how are you', NULL, 1, '2023-08-08 23:08:34', '2023-08-08 23:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `program` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `date`, `program`, `location`, `time`, `created_at`, `updated_at`) VALUES
(64, 'PWD Cash Assistance', '2023-08-17', 5, 'Bontoc Covered Court', '8:00 AM - 5:00 PM', '2023-08-15 02:07:54', NULL),
(65, 'Solo Parent Program Cash Assistance', '2023-08-26', 4, 'Casao Covered Court', '8:00 AM - 5:00 PM', '2023-08-15 02:24:20', NULL);

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
-- Table structure for table `focal_persons`
--

CREATE TABLE `focal_persons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `focal_persons`
--

INSERT INTO `focal_persons` (`id`, `name`, `address`, `contact_number`, `created_at`, `updated_at`) VALUES
(22, 'ARNEL HINAY', 'Sogod Southern Leyte', '09661195690', '2023-08-01 00:27:58', NULL),
(23, 'DEXTER DIZON', 'Bontoc Southern Leyte', '09661195690', '2023-08-01 00:29:05', NULL),
(24, 'JESSIE CADAYONA', 'Bontoc Southern Leyte', '09661195690', '2023-08-01 00:30:24', NULL),
(25, 'EVELYN CADAYONA', 'Bontoc Southern Leyte', '09661195690', '2023-08-01 00:31:35', NULL),
(26, 'JEMUEL CADAYONA', 'Bontoc Southern Leyte', '09661195690', '2023-08-01 00:33:57', NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_06_999999_add_active_status_to_users', 2),
(6, '2023_08_06_999999_add_avatar_to_users', 2),
(7, '2023_08_06_999999_add_dark_mode_to_users', 2),
(8, '2023_08_06_999999_add_messenger_color_to_users', 2),
(9, '2023_08_06_999999_create_chatify_favorites_table', 2),
(10, '2023_08_06_999999_create_chatify_messages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` bigint(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `cash` decimal(11,2) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `userid`, `program_id`, `title`, `date`, `cash`, `status`, `type`, `created_at`, `updated_at`) VALUES
(95, 56, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-07 01:01:11', NULL),
(96, 60, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-07 01:01:11', NULL),
(97, 61, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-07 01:01:11', NULL),
(98, 62, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-07 01:01:11', NULL),
(100, 56, 4, 'Cash Received', NULL, '2333.00', 0, 2, '2023-08-07 01:05:07', NULL),
(101, 60, 4, 'Cash Received', NULL, '2333.00', 0, 2, '2023-08-07 01:05:08', NULL),
(102, 61, 4, 'Cash Received', NULL, '2333.00', 0, 2, '2023-08-07 01:05:08', NULL),
(103, 62, 4, 'Cash Received', NULL, '2333.00', 0, 2, '2023-08-07 01:05:08', NULL),
(110, 56, 4, 'Cash Received', NULL, '3000.00', 0, 2, '2023-08-07 01:05:53', NULL),
(111, 60, 4, 'Cash Received', NULL, '3000.00', 0, 2, '2023-08-07 01:05:53', NULL),
(112, 61, 4, 'Cash Received', NULL, '3000.00', 0, 2, '2023-08-07 01:05:53', NULL),
(113, 62, 4, 'Cash Received', NULL, '3000.00', 0, 2, '2023-08-07 01:05:53', NULL),
(120, 56, 4, 'Cash Received', NULL, '2999.00', 0, 2, '2023-08-07 01:12:56', NULL),
(121, 60, 4, 'Cash Received', NULL, '2999.00', 0, 2, '2023-08-07 01:12:56', NULL),
(122, 61, 4, 'Cash Received', NULL, '2999.00', 0, 2, '2023-08-07 01:12:56', NULL),
(123, 62, 4, 'Cash Received', NULL, '2999.00', 0, 2, '2023-08-07 01:12:56', NULL),
(125, 56, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-07 01:22:26', NULL),
(126, 60, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-07 01:22:26', NULL),
(127, 61, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-07 01:22:26', NULL),
(128, 62, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-07 01:22:26', NULL),
(130, 56, 4, 'Cash Received', NULL, '5000.00', 0, 2, '2023-08-07 01:22:36', NULL),
(131, 60, 4, 'Cash Received', NULL, '5000.00', 0, 2, '2023-08-07 01:22:36', NULL),
(132, 61, 4, 'Cash Received', NULL, '5000.00', 0, 2, '2023-08-07 01:22:36', NULL),
(133, 62, 4, 'Cash Received', NULL, '5000.00', 0, 2, '2023-08-07 01:22:36', NULL),
(139, 57, 5, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-08 04:40:45', NULL),
(140, 58, 5, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-08 04:40:46', NULL),
(141, 59, 5, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-08 04:40:46', NULL),
(145, 57, 5, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-08 04:42:28', NULL),
(146, 58, 5, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-08 04:42:29', NULL),
(147, 59, 5, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-08 04:42:29', NULL),
(150, 58, 1, 'Cash Received', NULL, '3000.00', 0, 2, '2023-08-09 00:18:59', NULL),
(151, 59, 1, 'Cash Received', NULL, '3000.00', 0, 2, '2023-08-09 00:18:59', NULL),
(152, 57, 2, 'Cash Received', NULL, '5000.00', 0, 2, '2023-08-10 06:36:10', NULL),
(153, 60, 2, 'Cash Received', NULL, '5000.00', 0, 2, '2023-08-10 06:36:10', NULL),
(232, 56, 4, 'Cash Received', NULL, '2000.00', 1, 2, '2023-08-14 10:24:13', NULL),
(233, 60, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-14 10:24:15', NULL),
(234, 61, 4, 'Cash Received', NULL, '2000.00', 1, 2, '2023-08-14 10:24:17', NULL),
(235, 62, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-14 10:24:18', NULL),
(236, 56, 4, 'Cash Received', NULL, '3000.00', 1, 2, '2023-08-14 10:26:48', NULL),
(237, 60, 4, 'Cash Received', NULL, '3000.00', 0, 2, '2023-08-14 10:26:50', NULL),
(238, 61, 4, 'Cash Received', NULL, '3000.00', 1, 2, '2023-08-14 10:26:51', NULL),
(239, 62, 4, 'Cash Received', NULL, '3000.00', 0, 2, '2023-08-14 10:26:53', NULL),
(244, 56, 4, 'Cash Received', NULL, '4000.00', 1, 2, '2023-08-15 02:06:55', NULL),
(245, 60, 4, 'Cash Received', NULL, '4000.00', 0, 2, '2023-08-15 02:06:56', NULL),
(246, 61, 4, 'Cash Received', NULL, '4000.00', 1, 2, '2023-08-15 02:06:57', NULL),
(247, 62, 4, 'Cash Received', NULL, '4000.00', 0, 2, '2023-08-15 02:06:58', NULL),
(248, 57, 5, '64', '2023-08-17', NULL, 1, 1, '2023-08-15 02:07:55', NULL),
(249, 58, 5, '64', '2023-08-17', NULL, 0, 1, '2023-08-15 02:07:57', NULL),
(250, 59, 5, '64', '2023-08-17', NULL, 1, 1, '2023-08-15 02:07:58', NULL),
(251, 56, 4, '65', '2023-08-26', NULL, 1, 1, '2023-08-15 02:24:21', NULL),
(252, 61, 4, '65', '2023-08-26', NULL, 1, 1, '2023-08-15 02:24:22', NULL),
(253, 62, 4, '65', '2023-08-26', NULL, 1, 1, '2023-08-15 02:24:23', NULL),
(254, 56, 4, 'Cash Received', NULL, '2000.00', 1, 2, '2023-08-15 02:25:51', NULL),
(255, 61, 4, 'Cash Received', NULL, '2000.00', 1, 2, '2023-08-15 02:25:52', NULL),
(256, 62, 4, 'Cash Received', NULL, '2000.00', 0, 2, '2023-08-15 02:25:53', NULL);

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
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `programtype_id` int(11) NOT NULL,
  `balance` decimal(11,2) NOT NULL,
  `status` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `userid`, `programtype_id`, `balance`, `status`, `program`, `created_at`, `updated_at`) VALUES
(17, 56, 57, '6000.00', 1, 4, '2023-08-06 06:16:38', NULL),
(18, 57, 58, '0.00', 0, 5, '2023-08-06 06:18:23', NULL),
(19, 58, 59, '0.00', 0, 5, '2023-08-06 06:23:15', NULL),
(20, 59, 60, '0.00', 0, 5, '2023-08-06 06:29:51', NULL),
(21, 60, 61, '0.00', 0, 4, '2023-08-06 06:34:20', NULL),
(22, 61, 62, '6000.00', 1, 4, '2023-08-06 06:38:24', NULL),
(23, 62, 63, '0.00', 0, 4, '2023-08-06 07:33:19', NULL),
(24, 58, 64, '0.00', 0, 1, '2023-08-08 09:33:46', NULL),
(25, 59, 65, '0.00', 0, 1, '2023-08-08 10:14:14', NULL),
(26, 57, 66, '0.00', 0, 2, '2023-08-08 10:28:34', NULL),
(27, 60, 67, '0.00', 0, 2, '2023-08-09 00:03:23', NULL);

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `focal_person` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program`, `description`, `focal_person`, `created_at`, `updated_at`) VALUES
(1, 'Assistance to Individuals in Crisis (AICS)', 'A social safety net or a stop-gap mechanism to support the recovery of individuals and families from unexpected crisis such as illness or death of a family member, and other crisis situations.', 22, '2023-08-01 00:27:58', NULL),
(2, 'Early Childhood Care and Development', 'Quality nurturing care during this period - adequate nutrition, good health care, protection, play and early education - is vital for children\'s physical, cognitive, linguistic and social-emotional development.', 23, '2023-08-01 00:29:05', NULL),
(3, 'Social Pension Program for Indigent Senior Citizens', 'The program seeks to improve the condition of indigent senior citizens by augmenting their daily subsistence and medical needs; reduce incidence of hunger; and protect them from neglect, abuse, deprivation, and natural and man-made disasters.', 24, '2023-08-01 00:30:24', NULL),
(4, 'Solo Parent Program', 'The Solo Parent Cash Assistance is intended to help solo parents cover their basic needs, such as food, shelter, and clothing.', 25, '2023-08-01 00:31:36', NULL),
(5, 'Person with Disabilities', 'It is intended to enhance PWDs capacity to attain a more meaningful, productive and satisfying way of life and ultimately become self-reliant, productive and contributing members of society.', 26, '2023-08-01 00:33:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_type`
--

CREATE TABLE `program_type` (
  `id` int(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `control_number` varchar(255) DEFAULT NULL,
  `program` int(11) DEFAULT NULL,
  `disability` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_type`
--

INSERT INTO `program_type` (`id`, `userid`, `control_number`, `program`, `disability`, `address`, `status`, `created_at`, `updated_at`) VALUES
(57, 56, '2023-002', 4, NULL, '13', 1, '2023-08-06 06:16:38', NULL),
(58, 57, '08-6402-000-0000001', 5, 'MENTAL DISABILITY', '38', 1, '2023-08-06 06:18:23', NULL),
(59, 58, '08-6402-000-0000002', 5, 'VISUAL DISABILITY', '34', 1, '2023-08-06 06:23:15', NULL),
(60, 59, '08-6402-000-0000003', 5, 'PHYSICAL DISABILITY', '23', 1, '2023-08-06 06:29:51', NULL),
(61, 60, '2023-003', 4, NULL, '13', 1, '2023-08-06 06:34:20', NULL),
(62, 61, '2023-004', 4, NULL, '24', 1, '2023-08-06 06:38:24', NULL),
(63, 62, '2023-004', 4, NULL, '24', 1, '2023-08-06 07:33:19', NULL),
(64, 58, '2023-001', 1, NULL, '34', 1, '2023-08-08 09:33:46', NULL),
(65, 59, '2023-002', 1, NULL, '23', 1, '2023-08-08 10:14:14', NULL),
(66, 57, '2023-001', 2, NULL, '38', 1, '2023-08-08 10:28:34', NULL),
(67, 60, '2023-001', 2, NULL, '13', 1, '2023-08-09 00:03:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_token_identity`
--

CREATE TABLE `sms_token_identity` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) NOT NULL,
  `mobile_identity` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sms_token_identity`
--

INSERT INTO `sms_token_identity` (`id`, `url`, `access_token`, `mobile_identity`, `created_at`, `updated_at`) VALUES
(1, 'https://api.pushbullet.com/v2/texts', 'o.Pt7qSSvqP6bwCqQqeHauyf34B6vtwYS3', 'ujvUXBTRPTEsjyzlSV4qya', '2023-08-15 01:50:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `programtype_id` int(11) NOT NULL,
  `cash` decimal(11,2) NOT NULL,
  `address` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `userid`, `program`, `programtype_id`, `cash`, `address`, `created_at`, `updated_at`) VALUES
(49, 60, 4, 61, '4000.00', 13, '2023-08-15 02:29:18', NULL),
(50, 62, 4, 63, '6000.00', 24, '2023-08-16 02:10:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `email`, `email_verified_at`, `phone`, `location`, `about`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 0, 'BONTOC MSWDO', 'bontoc@admin.com', '2023-07-31 16:16:55', '09661195690', 'Bontoc Southern Leyte', 'MSWDO Administrator', '$2y$10$1TnQO/F2kFHWsJCksS00We5f11Gj5k61TqkZyyHPtPzpH5Y/19/7y', 'TIrIvlP6mNYJbe4bKMSSYKxWS0BDR37amrPYCul46NHNQ2KWcxi9pZisgVMK', '2023-07-31 16:16:55', '2023-08-13 00:32:04', 1, 0, '', 0, '#4CAF50'),
(2, 22, 'ARNEL HINAY', 'arnel@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$s0iMinuG33xzULwcPyAu8u1PLGIAK8gmesQIw5xmCij3.TxGb/LAK', NULL, '2023-07-31 16:27:58', '2023-08-13 00:55:49', 2, 1, '', 0, '#2180f3'),
(3, 23, 'DEXTER DIZON', 'dexter@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$0HkKYhaEKAZFgzlhzSOBkeSyi1idyxToIfUQEmWGZbRWZ9.lTPK9S', NULL, '2023-07-31 16:29:05', '2023-08-15 18:33:54', 2, 0, '', 0, NULL),
(4, 24, 'JESSIE CADAYONA', 'jessie@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$EPtSDEZEgn4MGl5mdeBu4OkBjur2OIJRY6I6CMXE6X6ir3M5hJH8.', NULL, '2023-07-31 16:30:24', '2023-08-13 01:10:04', 2, 0, '', 0, NULL),
(5, 25, 'EVELYN CADAYONA', 'evelyn@gmail.com', NULL, '09661195690', 'Bontoc Southern Leyte', 'Focal Person', '$2y$10$ZDUMGyM0uI9NDw.oIGLwWedX1I04Mxbjc7XaWuJR1zBqExDgmWuOG', NULL, '2023-07-31 16:31:36', '2023-08-15 18:14:02', 2, 1, '', 0, NULL),
(6, 26, 'JEMUEL CADAYONA', 'jem@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$/nrqadS/ZyTVgVepLX1u5O05DjDt.zQx/6cR01llg503.wt93B1.i', NULL, '2023-07-31 16:33:57', '2023-08-14 18:55:44', 2, 0, '', 0, NULL),
(42, 56, 'TINDUGAN, MARIBEL C.', 'maribel@user.com', NULL, '09661195690', 'Brgy. Divisoria, Bontoc, Southern Leyte', 'Beneficiary', '$2y$10$pcIV9V4IbMTcPIvYdwuP3e8OfkWgljgsB/SdqM2.QhvRKRFlfZedW', NULL, '2023-08-05 22:16:38', '2023-08-14 18:22:48', 3, 0, '', 0, NULL),
(43, 57, 'TUAN, JESSALYN QUIBAS', 'jessalyn@user.com', NULL, '09661195690', NULL, NULL, '$2y$10$6izDWi.gKVymLxLcApwhTuhPC7CluK9Y5wqr0gt2A6Yh3ecogkS.u', NULL, '2023-08-05 22:18:23', '2023-08-13 01:19:06', 3, 1, '', 0, NULL),
(44, 58, 'BONGCALES, AMADO GALENDEZ JR.', 'amado@user.com', NULL, '09661195690', NULL, NULL, '$2y$10$zzCWf0Nbz8emh7xLnM3QE.fXHsJpgALOhRkIeFzy5DoFudGv9J2oe', NULL, '2023-08-05 22:23:15', '2023-08-13 00:34:09', 3, 0, '', 0, NULL),
(45, 59, 'DIABORDO, DELIA PAULIN', 'delia@user.com', NULL, '09661195690', NULL, NULL, '$2y$10$gSNruzkspx6eY.gtgdGLVee6uQB8OD5zaYI482qN7cVhrchI7aPP.', NULL, '2023-08-05 22:29:51', '2023-08-13 00:50:59', 3, 0, '', 0, NULL),
(46, 60, 'MOLINDA, MARIA LORINA L.', 'maria@user.com', NULL, '09661195690', NULL, NULL, '$2y$10$ZXZuHIjb/dl25XsyW07E3ue/gdtk.6WLwLddTcc5ok8HrmtLbiRc6', NULL, '2023-08-05 22:34:20', '2023-08-15 18:09:15', 3, 0, '', 0, NULL),
(47, 61, 'MAGDUGO, ANGELINA L.', 'angelina@user.com', NULL, '09661195690', NULL, NULL, '$2y$10$CNccEZd4ajQXCOhC5dJYjugeNlitChyorZWwjUZZyDdwOmrTBASnG', NULL, '2023-08-05 22:38:24', '2023-08-14 18:20:22', 3, 0, '', 0, NULL),
(48, 62, 'VALLINAS, EVE C.', 'eve@user.com', NULL, '09355209089', 'Brgy. Mauylab, Bontoc, Southern Leyte', 'Beneficiary', '$2y$10$04rEghdzoSUQ3bq17MYhduqUfjd1b5HGOQtseU.nEiKkr1vppunG6', NULL, '2023-08-05 23:33:19', '2023-08-14 01:18:36', 3, 0, '', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `focal_persons`
--
ALTER TABLE `focal_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_type`
--
ALTER TABLE `program_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_token_identity`
--
ALTER TABLE `sms_token_identity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
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
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `focal_persons`
--
ALTER TABLE `focal_persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `program_type`
--
ALTER TABLE `program_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sms_token_identity`
--
ALTER TABLE `sms_token_identity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
