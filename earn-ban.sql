-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 06:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earn-ban`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `active`, `image`, `image_two`, `image_three`, `image_four`, `created_at`, `updated_at`) VALUES
(1, 'Earn-Ban', 'Earn-Ban We’re constantly bringing new properties market so keep visiting our website that you don’t miss out on the next opportunity.', 1, 'images/banner/banner-1.png', 'images/banner/slide2.jpg', 'images/banner/bg.jpg', 'images/banner/bg.jpg', '2022-04-22 09:26:25', '2022-11-07 13:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `bidings`
--

CREATE TABLE `bidings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT NULL,
  `winner_status` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidings`
--

INSERT INTO `bidings` (`id`, `user_id`, `product_id`, `amount`, `date_time`, `winner_status`, `status`, `created_at`, `updated_at`) VALUES
(21, '2', '9', '10', '2022-11-10 20:03:32', 0, 1, '2022-11-10 20:03:32', '2022-11-10 20:03:32'),
(22, '2', '9', '100', '2022-11-10 20:03:41', 0, 1, '2022-11-10 20:03:41', '2022-11-10 20:03:41'),
(23, '2', '9', '120', '2022-11-10 20:03:59', 1, 1, '2022-11-10 20:03:59', '2022-11-12 11:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`, `active`, `created_at`, `updated_at`) VALUES
(3, 'Jewelry', 'images/category/02.png', 1, '2022-06-14 10:31:22', '2022-11-07 14:16:22'),
(5, 'Watches', 'images/category/03.png', 1, '2022-11-07 14:18:04', '2022-11-07 14:18:04'),
(6, 'Electronics', 'images/category/04.png', 1, '2022-11-07 14:18:28', '2022-11-07 14:18:28'),
(7, 'Sports', 'images/category/05.png', 1, '2022-11-07 14:18:58', '2022-11-07 14:18:58'),
(8, 'Real Estate', 'images/category/06.png', 1, '2022-11-07 14:19:25', '2022-11-07 14:19:25'),
(9, 'Vehicles', 'images/category/01.png', 1, '2022-11-07 14:19:45', '2022-11-07 14:19:45');

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
(5, '2022_04_08_192414_create_banners_table', 1),
(6, '2022_04_09_022834_create_setings_table', 1),
(7, '2022_04_11_173614_create_problems_table', 1),
(8, '2022_04_20_034844_create_categories_table', 1),
(9, '2022_04_20_052643_create_products_table', 1),
(10, '2022_11_09_193317_create_shippings_table', 2),
(13, '2022_11_09_195635_create_bidings_table', 3);

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
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tachnician_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tachnician_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `officer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `officer_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solve_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `officer_status` tinyint(1) DEFAULT 0,
  `officer_feedback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technician_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technician_status` tinyint(1) DEFAULT 0,
  `technician_feedback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auth_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_bidding_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidding_end_date` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_location` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidding_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new` tinyint(1) DEFAULT 1,
  `featured` tinyint(1) DEFAULT 0,
  `active` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `auth_id`, `product_name`, `category_id`, `user_id`, `details`, `regular_price`, `starting_bidding_amount`, `bidding_end_date`, `image`, `status`, `product_location`, `bidding_amount`, `new`, `featured`, `active`, `created_at`, `updated_at`) VALUES
(6, 1, 'java deeloper', '3', '2', 'NYC Fleet / DCAS units may be located at either of two locations:\r\nBrooklyn, NY (1908 Shore Parkway)\r\nMedford, NY (66 Peconic Ave)\r\nThis unit is located at:\r\nKenben Industries Ltd.\r\n1908 Shore Parkway\r\nBrooklyn, NY 11214\r\nAcceptance of condition - buyer inspection/preview\r\nVehicles and equipment often display significant wear and tear. http://127.0.0.1:8000/frontend/assets are sold AS IS with no warranty, express or implied, and we highly recommend previewing them before bidding. The preview period is the only opportunity to inspect an asset to verify condition and suitability. No refunds, adjustments or returns will be entertained.\r\n\r\nVehicle preview inspections of the vehicle can be done at the below location on Monday and Tuesday from 10am - 2pm. See Preview Rules Here.\r\n\r\nKenben Industries Ltd.\r\n1908 Shore Parkway\r\nBrooklyn, NY 11214\r\nBUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally http://127.0.0.1:8000/frontend/assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.\r\n\r\nLegal Notice\r\nVehicles may not be driven off the lot except with a dealer plate affixed. By law, vehicles are not permitted to be parked on or to drive on the streets of New York without registration and plates registered to the vehicle. If the buyer cannot obtain the required registration and plates prior to pick up, they should have the vehicle towed at their own expense. The buyer should have the vehicle towed at their own expense.\r\n\r\nCondition: Untested - Sold As-Is\r\n\r\nEmployees of Sbidu, its subcontractors and affiliated companies, employees of the NYC Government and those bidding on behalf of PropertyRoom.com, its subcontractors and affiliated companies and employees of the NYC Government are not permitted to bid on or purchase NYC Fleet/DCAS http://127.0.0.1:8000/frontend/assets.\r\n\r\nCondition\r\nThis ASSET is being listed on behalf of a law enforcement agency or other partner (\"SELLER\") by PropertyRoom.com on a Sold AS IS, WHERE IS, WITH ALL FAULTS basis, with no representation or warranty from PropertyRoom.com or SELLER. In many cases, the car, boat, truck, motorcycle, aircraft, mowers/tractors, etc. (\"ASSET\") sold on PropertyRoom.com comes from seizure or forfeiture, and the SELLER typically does not possess use-based knowledge of the ASSET. Further, PropertyRoom.com does not physically inspect the ASSET and cannot attest to actual working conditions. PropertyRoom.com and SELLER gather information about the ASSET from authoritative sources; still, errors may appear from time to time in the listing. PropertyRoom.com cautions any website user, shopper, bidder, etc. (\"BUYER\") to attempt to confirm, with us, information material to a bidding/purchasing decision.\r\n\r\nBidding\r\nAt this time Sbidu only accepts bidders from the United States, Canada and Mexico on Vehicles and Heavy Industrial Equipment. The Bid Now button will appear on auctions where you are qualified to place a bid.\r\n\r\nBuyer Responsibility\r\nThe BUYER will receive an email notification from PropertyRoom.com following the close of an auction. After fraud verification and payment settlement, we will email the BUYER instructions for retrieving the ASSET from the Will-Call Location listed above.\r\n\r\nAll applicable shipping, logistics, transportation, customs, fees, taxes, export/import activities and all associated costs are the sole responsibility of the BUYER. No shipping, customs, export or import assistance is available from Sbidu.\r\n\r\nWhen applicable for a given ASSET, BUYER bears responsibility for determining motor vehicle registration requirements in the applicable jurisdiction as well as costs, including any fees, registration fees, taxes, etc., owed as a result of BUYER registering an ASSET; for example, BUYER bears sole responsibility for all title/registration/smog and other such fees.\r\n\r\nBUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally http://127.0.0.1:8000/frontend/assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.', '2000', '1500', '2022-11-15', 'images/banner/Interpersona.jpg', '2', 'live', '1700', 1, 1, 1, '2022-06-14 10:34:38', '2022-11-10 14:38:18'),
(7, 1, 'java deeloper', '3', '2', 'NYC Fleet / DCAS units may be located at either of two locations:\r\nBrooklyn, NY (1908 Shore Parkway)\r\nMedford, NY (66 Peconic Ave)\r\nThis unit is located at:\r\nKenben Industries Ltd.\r\n1908 Shore Parkway\r\nBrooklyn, NY 11214\r\nAcceptance of condition - buyer inspection/preview\r\nVehicles and equipment often display significant wear and tear. http://127.0.0.1:8000/frontend/assets are sold AS IS with no warranty, express or implied, and we highly recommend previewing them before bidding. The preview period is the only opportunity to inspect an asset to verify condition and suitability. No refunds, adjustments or returns will be entertained.\r\n\r\nVehicle preview inspections of the vehicle can be done at the below location on Monday and Tuesday from 10am - 2pm. See Preview Rules Here.\r\n\r\nKenben Industries Ltd.\r\n1908 Shore Parkway\r\nBrooklyn, NY 11214\r\nBUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally http://127.0.0.1:8000/frontend/assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.\r\n\r\nLegal Notice\r\nVehicles may not be driven off the lot except with a dealer plate affixed. By law, vehicles are not permitted to be parked on or to drive on the streets of New York without registration and plates registered to the vehicle. If the buyer cannot obtain the required registration and plates prior to pick up, they should have the vehicle towed at their own expense. The buyer should have the vehicle towed at their own expense.\r\n\r\nCondition: Untested - Sold As-Is\r\n\r\nEmployees of Sbidu, its subcontractors and affiliated companies, employees of the NYC Government and those bidding on behalf of PropertyRoom.com, its subcontractors and affiliated companies and employees of the NYC Government are not permitted to bid on or purchase NYC Fleet/DCAS http://127.0.0.1:8000/frontend/assets.\r\n\r\nCondition\r\nThis ASSET is being listed on behalf of a law enforcement agency or other partner (\"SELLER\") by PropertyRoom.com on a Sold AS IS, WHERE IS, WITH ALL FAULTS basis, with no representation or warranty from PropertyRoom.com or SELLER. In many cases, the car, boat, truck, motorcycle, aircraft, mowers/tractors, etc. (\"ASSET\") sold on PropertyRoom.com comes from seizure or forfeiture, and the SELLER typically does not possess use-based knowledge of the ASSET. Further, PropertyRoom.com does not physically inspect the ASSET and cannot attest to actual working conditions. PropertyRoom.com and SELLER gather information about the ASSET from authoritative sources; still, errors may appear from time to time in the listing. PropertyRoom.com cautions any website user, shopper, bidder, etc. (\"BUYER\") to attempt to confirm, with us, information material to a bidding/purchasing decision.\r\n\r\nBidding\r\nAt this time Sbidu only accepts bidders from the United States, Canada and Mexico on Vehicles and Heavy Industrial Equipment. The Bid Now button will appear on auctions where you are qualified to place a bid.\r\n\r\nBuyer Responsibility\r\nThe BUYER will receive an email notification from PropertyRoom.com following the close of an auction. After fraud verification and payment settlement, we will email the BUYER instructions for retrieving the ASSET from the Will-Call Location listed above.\r\n\r\nAll applicable shipping, logistics, transportation, customs, fees, taxes, export/import activities and all associated costs are the sole responsibility of the BUYER. No shipping, customs, export or import assistance is available from Sbidu.\r\n\r\nWhen applicable for a given ASSET, BUYER bears responsibility for determining motor vehicle registration requirements in the applicable jurisdiction as well as costs, including any fees, registration fees, taxes, etc., owed as a result of BUYER registering an ASSET; for example, BUYER bears sole responsibility for all title/registration/smog and other such fees.\r\n\r\nBUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally http://127.0.0.1:8000/frontend/assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.', '2000', '1500', '2022-11-20', 'images/banner/Interpersona.jpg', '2', 'time', '1700', 1, 1, 1, '2022-06-14 10:34:38', '2022-11-10 13:15:41'),
(8, 1, 'java deeloper', '3', '2', 'NYC Fleet / DCAS units may be located at either of two locations:\r\nBrooklyn, NY (1908 Shore Parkway)\r\nMedford, NY (66 Peconic Ave)\r\nThis unit is located at:\r\nKenben Industries Ltd.\r\n1908 Shore Parkway\r\nBrooklyn, NY 11214\r\nAcceptance of condition - buyer inspection/preview\r\nVehicles and equipment often display significant wear and tear. http://127.0.0.1:8000/frontend/assets are sold AS IS with no warranty, express or implied, and we highly recommend previewing them before bidding. The preview period is the only opportunity to inspect an asset to verify condition and suitability. No refunds, adjustments or returns will be entertained.\r\n\r\nVehicle preview inspections of the vehicle can be done at the below location on Monday and Tuesday from 10am - 2pm. See Preview Rules Here.\r\n\r\nKenben Industries Ltd.\r\n1908 Shore Parkway\r\nBrooklyn, NY 11214\r\nBUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally http://127.0.0.1:8000/frontend/assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.\r\n\r\nLegal Notice\r\nVehicles may not be driven off the lot except with a dealer plate affixed. By law, vehicles are not permitted to be parked on or to drive on the streets of New York without registration and plates registered to the vehicle. If the buyer cannot obtain the required registration and plates prior to pick up, they should have the vehicle towed at their own expense. The buyer should have the vehicle towed at their own expense.\r\n\r\nCondition: Untested - Sold As-Is\r\n\r\nEmployees of Sbidu, its subcontractors and affiliated companies, employees of the NYC Government and those bidding on behalf of PropertyRoom.com, its subcontractors and affiliated companies and employees of the NYC Government are not permitted to bid on or purchase NYC Fleet/DCAS http://127.0.0.1:8000/frontend/assets.\r\n\r\nCondition\r\nThis ASSET is being listed on behalf of a law enforcement agency or other partner (\"SELLER\") by PropertyRoom.com on a Sold AS IS, WHERE IS, WITH ALL FAULTS basis, with no representation or warranty from PropertyRoom.com or SELLER. In many cases, the car, boat, truck, motorcycle, aircraft, mowers/tractors, etc. (\"ASSET\") sold on PropertyRoom.com comes from seizure or forfeiture, and the SELLER typically does not possess use-based knowledge of the ASSET. Further, PropertyRoom.com does not physically inspect the ASSET and cannot attest to actual working conditions. PropertyRoom.com and SELLER gather information about the ASSET from authoritative sources; still, errors may appear from time to time in the listing. PropertyRoom.com cautions any website user, shopper, bidder, etc. (\"BUYER\") to attempt to confirm, with us, information material to a bidding/purchasing decision.\r\n\r\nBidding\r\nAt this time Sbidu only accepts bidders from the United States, Canada and Mexico on Vehicles and Heavy Industrial Equipment. The Bid Now button will appear on auctions where you are qualified to place a bid.\r\n\r\nBuyer Responsibility\r\nThe BUYER will receive an email notification from PropertyRoom.com following the close of an auction. After fraud verification and payment settlement, we will email the BUYER instructions for retrieving the ASSET from the Will-Call Location listed above.\r\n\r\nAll applicable shipping, logistics, transportation, customs, fees, taxes, export/import activities and all associated costs are the sole responsibility of the BUYER. No shipping, customs, export or import assistance is available from Sbidu.\r\n\r\nWhen applicable for a given ASSET, BUYER bears responsibility for determining motor vehicle registration requirements in the applicable jurisdiction as well as costs, including any fees, registration fees, taxes, etc., owed as a result of BUYER registering an ASSET; for example, BUYER bears sole responsibility for all title/registration/smog and other such fees.\r\n\r\nBUYER is responsible for all storage fees at time of pick-up. See above under IMPORTANT PICK-UP TIMES for specific requirements for this asset, but generally http://127.0.0.1:8000/frontend/assets must be picked up within 2 business days of payment otherwise additional storage fees will be applied.', '2000', '1500', '2022-11-20', 'images/banner/Interpersona.jpg', '2', 'buy', '1700', 1, 1, 1, '2022-06-14 10:34:38', '2022-11-10 13:17:04'),
(9, 1, 'java deeloper', '3', '2', 'Test post', '2000', '1500', '2022-11-20', 'images/banner/Interpersona.jpg', '2', 'live', '1700', 1, 1, 1, '2022-06-14 10:34:38', '2022-11-10 13:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `setings`
--

CREATE TABLE `setings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setings`
--

INSERT INTO `setings` (`id`, `website_name`, `short_desc`, `address`, `email`, `image`, `phone`, `footer`, `facebook_url`, `twitter_url`, `linkedin_url`, `skype_link`, `instagram_link`, `created_at`, `updated_at`) VALUES
(1, 'Auction system', 'Auction system', 'Dhaka dhanmondi', 'support@gmail.com', 'images/banner/logo.png', '01600000000', 'Shakil', 'https://facebook.com/', 'https://facebook.com/', 'https://facebook.com/', 'https://facebook.com/', 'https://facebook.com/', NULL, '2022-11-10 14:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `within_10_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `within_5_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `within_2_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `within_10_days`, `within_5_days`, `within_2_days`, `created_at`, `updated_at`) VALUES
(1, '60', '70', '', NULL, '2022-11-09 13:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `multi_vendor` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `multi_vendor`, `name`, `image`, `type`, `phone`, `email`, `role`, `email_verified_at`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', NULL, '', '', 'superadmin@gmail.com', 1, NULL, '$2y$10$LIrlhEt1LzIHajW1/PCeTuFOkqjgFjzX2lghwIf.rzySN2d1caopy', 1, NULL, NULL, NULL),
(2, 0, 'User', 'images/profile/avatar.png', '', '01785449162', 'user@gmail.com', 3, NULL, '$2y$10$nrar7lDXKKaLom.HKhZ0l.xThi3C1Wte/6wmWL4gtxes9vOdx502u', 1, NULL, NULL, '2022-11-12 07:48:39'),
(3, NULL, 'Dipak Debnath', NULL, NULL, NULL, 'dipakdebn@gmail.com', 3, NULL, '$2y$10$VCuyaihYh4Q/iRsBWccRsuBoait0WVlaPzB9hVjpX4KiwjYidOOj.', 1, NULL, '2022-11-12 11:41:00', '2022-11-12 11:41:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_title_unique` (`title`);

--
-- Indexes for table `bidings`
--
ALTER TABLE `bidings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setings`
--
ALTER TABLE `setings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidings`
--
ALTER TABLE `bidings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setings`
--
ALTER TABLE `setings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
