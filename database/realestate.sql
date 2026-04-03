-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2026 at 08:25 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `excerpt`, `content`, `category`, `image_url`, `image_id`, `published_at`, `is_active`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `og_image_url`, `created_at`, `updated_at`) VALUES
(1, 'Why Kathmandu Valley is a Secure Investment', 'why-kathmandu-valley-secure-investment', 'Exploring the factors driving property values in the capital and long-term hold strategies.', '<p>The Kathmandu Valley has consistently shown appreciation in property values over the past decade. Multiple infrastructure projects, expanding road networks, and growing urbanization make it one of the safest real estate investments in Nepal.</p>', 'Invest', 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', NULL, '2026-03-15', 1, 1, 'test', 'test one', 'hello, test', NULL, '2026-04-02 19:58:54', '2026-04-02 23:23:46'),
(2, 'Aana Vs. Square Feet: A Complete Guide', 'aana-vs-square-feet-guide', 'A comprehensive guide for non-resident Nepalis explaining local measurement units.', 'Understanding Nepali land measurement units is crucial for any investor. 1 Ropani = 5,476 sq ft, 1 Aana = 342.25 sq ft, 1 Paisa = 85.56 sq ft, 1 Dam = 21.39 sq ft. This guide breaks down all conversions you need.', 'Legal', 'https://images.unsplash.com/photo-1554469384-e58fac16e23a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', NULL, '2026-03-02', 1, 2, NULL, NULL, NULL, NULL, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(3, '5 Essential Suburb Plotted Land Checks', '5-suburb-plotted-land-checks', 'Learn how to verify road access, drainage, and utilities before signing the deed.', 'Before purchasing plotted land in the suburbs, ensure you check: 1) Road access width, 2) Drainage systems, 3) Electricity and water supply, 4) Soil quality for construction, 5) Future development plans in the area.', 'Tips', 'https://images.unsplash.com/photo-1516156008625-3a9d045f6211?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', NULL, '2026-02-28', 1, 3, NULL, NULL, NULL, NULL, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(4, 'Rise of Co-Working Spaces in Nepal', 'rise-of-co-working-spaces', 'How the post-pandemic landscape is shaping commercial real estate demands in Nepal.', 'The demand for co-working spaces has surged in Nepal, particularly in Kathmandu. This shift is creating new opportunities for commercial real estate investors looking to capitalize on the flexible workspace trend.', 'Commercial', 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', NULL, '2026-02-12', 1, 4, NULL, NULL, NULL, NULL, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(5, 'Modernizing Neo-Classic Homes', 'modernizing-neo-classic-homes', 'Tips on renovating older Kathmandu homes while preserving their classic architectural charm.', 'Blending modern amenities with traditional Newari architecture is both an art and a science. Learn how homeowners are retrofitting classic Kathmandu homes with contemporary interiors while maintaining their heritage facades.', 'Design', 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80', NULL, '2026-01-05', 1, 5, NULL, NULL, NULL, NULL, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(6, 'Elit animi eum mai', 'elit-animi-eum-mai', 'Ab aut in qui except', '<p>As a <strong>Xero Approved Developer</strong> Databuzz can help integrate your FileMaker solution with the Xero Accounting Software.&nbsp;If you use FileMaker as your Customer Relationship Management (CRM) or to generate customer invoices we can help eliminate any double data entry by automatically “pushing” FileMaker Contacts, Invoices, Products, Payments etc directly to Xero. Here’s some examples of how we can integrate your FileMaker solution with Xero:</p><ul><li>upload FileMaker Contact data to Xero</li><li>upload FileMaker Invoice data to Xero</li><li>upload FileMaker Products/Inventory Items to Xero</li><li>upload FileMaker Invoice Payments to Xero</li></ul><p>No more re-entering FileMaker data into Xero – with a click of a button you can push your FileMaker data directly to Xero within seconds! We can also download the same data from Xero to FileMaker if you prefer to work directly in Xero but need to have your Invoices visible to your FileMaker users.</p><p>We use both FileMaker and Xero to run our business so we understand how much time can be saved integrating FileMaker with Xero.</p>', 'Deserunt quis beatae', '/storage/blogs/1775184293_69cf29a565d9b.jpg', NULL, '2024-04-25', 1, 11, 'Sequi commodi nisi voluptatem ipsa numquam sint ea numquam ea', 'Consequatur praesentium enim ut aliquam sit est hic', 'Fugiat quis veritat', NULL, '2026-04-02 20:59:53', '2026-04-02 20:59:53'),
(7, 'Reprehenderit ab il', 'reprehenderit-ab-il', 'Doloribus sunt irure', '<h1>🌞 Summer Travel Tips: Your Ultimate Guide to a Perfect Vacation</h1><p>Summer is the perfect time to explore new destinations, relax on sunny beaches, and create unforgettable memories. But traveling during the hottest season also comes with its own set of challenges. From staying cool to avoiding crowds, a little preparation can make a big difference. Here are some essential summer travel tips to help you enjoy a smooth and stress-free trip.</p><h2>✈️ Plan Ahead and Book Early</h2><p>Summer is peak travel season, which means flights, hotels, and attractions can fill up quickly. Booking early not only ensures availability but can also help you save money. Look for deals and consider flexible dates to get the best rates.</p><h2>🧳 Pack Smart and Light</h2><p>When it comes to summer travel, less is more. Pack lightweight, breathable clothing like cotton or linen. Don’t forget essentials such as:</p><ul><li>Sunglasses 🕶️</li><li>Sunscreen ☀️</li><li>Hat or cap 🧢</li><li>Comfortable walking shoes 👟</li></ul><p>A reusable water bottle is also a must to stay hydrated throughout your journey.</p><h2>💧 Stay Hydrated</h2><p>Hot weather can quickly lead to dehydration. Drink plenty of water, even if you don’t feel thirsty. Avoid excessive caffeine and alcohol, as they can dehydrate your body faster.</p><h2>🌅 Start Your Day Early</h2><p>Beat the heat (and the crowds) by starting your day early. Mornings are usually cooler and less crowded, making it the perfect time to explore attractions, go sightseeing, or enjoy outdoor activities.</p><h2>🌴 Protect Your Skin</h2><p>Sunburn can ruin your vacation. Apply sunscreen with at least SPF 30 and reapply every few hours, especially after swimming or sweating. Wearing protective clothing can also help shield your skin from harmful UV rays.</p><h2>🗺️ Choose the Right Destination</h2><p>Not all destinations are ideal during summer. Consider places with milder climates, such as hill stations, coastal towns, or destinations known for pleasant summer weather.</p><h2>🚗 Be Flexible with Your Itinerary</h2><p>Summer travel can come with unexpected delays, from traffic jams to long queues. Keep your itinerary flexible and allow extra time between activities.</p><h2>🍉 Eat Light and Fresh</h2><p>Hot weather calls for light meals. Enjoy fresh fruits, salads, and local seasonal dishes. Not only are they refreshing, but they also help keep your energy levels up.</p><h2>🏖️ Take Breaks and Rest</h2><p>Don’t try to do everything at once. Schedule breaks during the hottest part of the day (usually noon to 3 PM). Use this time to relax indoors, enjoy a nap, or visit air-conditioned places like museums or cafes.</p><h2>📱 Keep Your Devices Safe</h2><p>Heat can affect your gadgets too. Avoid leaving your phone or camera in direct sunlight, and carry a power bank to keep your devices charged on the go.</p><h2>🌟 Final Thoughts</h2><p>Summer travel can be an amazing experience if you plan wisely and take care of your health. With the right preparation, you can beat the heat, avoid stress, and fully enjoy your adventure.</p><p>So pack your bags, embrace the sunshine, and get ready for a memorable summer getaway! 🌍✨</p>', 'Blanditiis omnis adi', '/storage/blogs/1775191395_69cf456309b9e.jpg', NULL, '2026-04-03', 1, 42, 'Proident fugit sint enim libero esse voluptatibus', 'Omnis quod quibusdam doloremque quia ipsum et quas magni in exercitationem omnis consectetur aute nulla consequatur Mollitia', 'Obcaecati elit labo', NULL, '2026-04-02 22:58:15', '2026-04-02 22:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Rent', 'rent', '2026-03-27 03:13:41', '2026-03-27 03:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'RetailCare SEO', 'retailcare.seo@gmail.com', '+619859745632', 'Partnership', 'Hello evo', 1, '2026-04-03 01:20:44', '2026-04-03 01:20:52'),
(2, 'Jelani Holt', 'sahoduj@mailinator.com', '+1 (227) 905-4357', 'Site Visit Request: Commodo id incididun', 'Property: Commodo id incididun\nProperty Link: http://127.0.0.1:8000/properties/Commodo-id-incididun\n\nRequested Site Visit:\nDate: 2026-04-03\nTime: afternoon\n', 1, '2026-04-03 02:14:08', '2026-04-03 02:14:53'),
(3, 'Rabi sudedhi', 'rabindrasubedi2016@gmail.com', '98012345678', 'Site Visit Request: Commodo id incididun', 'Property: Commodo id incididun\nProperty Link: http://127.0.0.1:8000/properties/Commodo-id-incididun\n\nRequested Site Visit:\nDate: 2026-04-10\nTime: afternoon\n', 1, '2026-04-03 02:20:26', '2026-04-03 02:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bhojpur', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(2, 1, 'Dhankuta', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(3, 1, 'Ilam', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(4, 1, 'Jhapa', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(5, 1, 'Khotang', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(6, 1, 'Morang', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(7, 1, 'Okhaldhunga', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(8, 1, 'Panchthar', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(9, 1, 'Sankhuwasabha', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(10, 1, 'Solukhumbu', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(11, 1, 'Sunsari', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(12, 1, 'Taplejung', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(13, 1, 'Terhathum', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(14, 1, 'Udayapur', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(15, 2, 'Bara', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(16, 2, 'Dhanusha', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(17, 2, 'Mahottari', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(18, 2, 'Parsa', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(19, 2, 'Rautahat', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(20, 2, 'Saptari', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(21, 2, 'Sarlahi', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(22, 2, 'Siraha', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(23, 3, 'Bhaktapur', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(24, 3, 'Chitwan', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(25, 3, 'Dhading', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(26, 3, 'Dolakha', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(27, 3, 'Kathmandu', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(28, 3, 'Kavrepalanchok', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(29, 3, 'Lalitpur', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(30, 3, 'Makwanpur', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(31, 3, 'Nuwakot', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(32, 3, 'Rasuwa', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(33, 3, 'Ramechhap', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(34, 3, 'Sindhuli', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(35, 3, 'Sindhupalchok', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(36, 4, 'Baglung', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(37, 4, 'Gorkha', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(38, 4, 'Kaski', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(39, 4, 'Lamjung', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(40, 4, 'Manang', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(41, 4, 'Mustang', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(42, 4, 'Myagdi', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(43, 4, 'Nawalpur', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(44, 4, 'Parbat', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(45, 4, 'Syangja', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(46, 4, 'Tanahu', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(47, 5, 'Arghakhanchi', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(48, 5, 'Banke', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(49, 5, 'Bardiya', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(50, 5, 'Dang', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(51, 5, 'Gulmi', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(52, 5, 'Kapilvastu', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(53, 5, 'Nawalparasi East', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(54, 5, 'Palpa', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(55, 5, 'Pyuthan', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(56, 5, 'Rolpa', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(57, 5, 'Rukum East', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(58, 5, 'Rupandehi', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(59, 6, 'Dailekh', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(60, 6, 'Dolpa', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(61, 6, 'Humla', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(62, 6, 'Jajarkot', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(63, 6, 'Jumla', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(64, 6, 'Kalikot', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(65, 6, 'Mugu', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(66, 6, 'Rukum West', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(67, 6, 'Salyan', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(68, 6, 'Surkhet', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(69, 7, 'Achham', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(70, 7, 'Baitadi', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(71, 7, 'Bajhang', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(72, 7, 'Bajura', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(73, 7, 'Dadeldhura', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(74, 7, 'Kanchanpur', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(75, 7, 'Kailali', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(76, 7, 'Doti', '2026-03-28 20:38:28', '2026-03-28 20:38:28'),
(77, 7, 'Darchula', '2026-03-28 20:38:28', '2026-03-28 20:38:28');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'How do I verify the legal documents of a property?', 'Our team conducts a thorough 5-point verification check for every property we list. This includes checking the Lalpurja (Land Ownership Certificate), Blueprint, trace map, tax clearance, and citizenship of the owner. We also facilitate meetings with legal experts to give you complete peace of mind.', 1, 1, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(2, 'What are your commission rates?', 'For our owned projects, there is absolutely zero commission or middleman fee. You buy direct from the developer. For brokered listings, our standard agency fee is transparently communicated upfront before any transaction begins, strictly abiding by Nepal\'s real estate associations\' guidelines.', 1, 2, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(3, 'Can Non-Resident Nepalese (NRNs) buy property here?', 'Yes, NRNs can easily invest in real estate in Nepal. The new NRN act allows NRN cardholders to purchase limited residential land or apartments. Our legal team will guide you step-by-step through the updated banking, repatriation, and registration processes specialized for expatriates.', 1, 3, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(4, 'Do you help with home loans and financing?', 'Absolutely! We have partnered with Nepal\'s leading Class-A commercial banks. Once you finalize a property, we assist in fast-tracking your home loan appraisal and approval process, often securing preferred interest rates for our clients due to our strong banking relationships.', 1, 4, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(5, 'Voluptas laudantium', 'Mollit sed quidem ir', 1, 5, '2026-04-02 20:42:38', '2026-04-02 20:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint UNSIGNED NOT NULL,
  `directory` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_type`, `imageable_id`, `directory`, `file_name`, `alt_text`, `is_primary`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\Slider', 4, 'sliders', '1774591906_69c61fa2ca7d3.jpg', 'Et ducimus explicab', 1, '2026-03-27 00:26:46', '2026-03-27 00:26:46'),
(5, 'App\\Models\\Slider', 5, 'sliders', '1774592108_69c6206c3321f.jpg', 'Voluptatem sunt volu', 1, '2026-03-27 00:30:08', '2026-03-27 00:30:08'),
(6, 'App\\Models\\Slider', 6, 'sliders', '1774593054_69c6241ece5a8.jpg', 'Dolorem non voluptat', 1, '2026-03-27 00:45:54', '2026-03-27 00:45:54'),
(8, 'App\\Models\\Property', 2, 'properties', '1774755785_69c89fc986fd6.jpg', NULL, 0, '2026-03-28 21:58:05', '2026-03-30 01:11:16'),
(9, 'App\\Models\\Property', 2, 'properties', '1774755785_69c89fc9a4606.jpg', NULL, 0, '2026-03-28 21:58:05', '2026-03-30 01:11:16'),
(10, 'App\\Models\\Property', 2, 'properties', '1774755785_69c89fc9a5719.jpg', NULL, 0, '2026-03-28 21:58:05', '2026-03-30 01:11:16'),
(11, 'App\\Models\\Property', 3, 'properties', '1774837306_69c9de3a2f296.jpg', NULL, 1, '2026-03-29 20:36:46', '2026-03-29 20:36:46'),
(12, 'App\\Models\\Property', 3, 'properties', '1774837306_69c9de3a6a601.jpg', NULL, 0, '2026-03-29 20:36:46', '2026-03-29 20:36:46'),
(13, 'App\\Models\\Property', 3, 'properties', '1774837306_69c9de3a705c2.jpg', NULL, 0, '2026-03-29 20:36:46', '2026-03-29 20:36:46'),
(14, 'App\\Models\\Property', 2, 'properties', '1774838164_69c9e194a8d9b.jpg', NULL, 1, '2026-03-29 20:51:04', '2026-03-30 01:11:16'),
(15, 'App\\Models\\Property', 4, 'properties', '1774838784_69c9e4003d79a.jpg', NULL, 1, '2026-03-29 21:01:24', '2026-03-29 21:01:24'),
(16, 'App\\Models\\Property', 4, 'properties', '1774838784_69c9e4004242b.jpg', NULL, 0, '2026-03-29 21:01:24', '2026-03-29 21:01:24'),
(17, 'App\\Models\\Property', 4, 'properties', '1774838784_69c9e4004567c.jpg', NULL, 0, '2026-03-29 21:01:24', '2026-03-29 21:01:24'),
(18, 'App\\Models\\Property', 5, 'properties', '1774853293_69ca1cada4b9a.jpg', NULL, 1, '2026-03-30 01:03:13', '2026-03-30 01:03:13'),
(19, 'App\\Models\\Property', 5, 'properties', '1774853293_69ca1cada94c5.jpg', NULL, 0, '2026-03-30 01:03:13', '2026-03-30 01:03:13'),
(20, 'App\\Models\\Property', 5, 'properties', '1774853293_69ca1cadadc59.jpg', NULL, 0, '2026-03-30 01:03:13', '2026-03-30 01:03:13'),
(21, 'App\\Models\\Property', 6, 'properties', '1775195761_69cf56717cfb9.jpg', NULL, 1, '2026-04-03 00:11:01', '2026-04-03 00:11:01'),
(22, 'App\\Models\\Property', 6, 'properties', '1775195761_69cf567181e52.jpg', NULL, 0, '2026-04-03 00:11:01', '2026-04-03 00:11:01'),
(23, 'App\\Models\\Property', 6, 'properties', '1775195761_69cf567186dbf.jpg', NULL, 0, '2026-04-03 00:11:01', '2026-04-03 00:11:01'),
(24, 'App\\Models\\Property', 6, 'properties', '1775195761_69cf567188159.jpg', NULL, 0, '2026-04-03 00:11:01', '2026-04-03 00:11:01'),
(25, 'App\\Models\\Property', 6, 'properties', '1775195761_69cf5671892a1.jpg', NULL, 0, '2026-04-03 00:11:01', '2026-04-03 00:11:01'),
(26, 'App\\Models\\Property', 6, 'properties', '1775195761_69cf56718a096.jpg', NULL, 0, '2026-04-03 00:11:01', '2026-04-03 00:11:01');

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
(4, '2026_02_27_000001_create_images_table', 1),
(5, '2026_02_27_000002_create_sliders_table', 1),
(6, '2026_02_27_000003_create_property_types_table', 1),
(7, '2026_02_27_000004_create_business_types_table', 1),
(8, '2026_02_27_000005_create_states_table', 2),
(9, '2026_02_27_000006_create_municipalities_table', 2),
(12, '2026_02_27_000007_create_properties_table', 3),
(13, '2026_02_27_000008_create_property_features_table', 3),
(15, '2026_03_29_021821_create_districts_table', 4),
(16, '2026_03_29_022301_add_district_foreign_key_to_municipalities_table', 5),
(17, '2026_03_29_022659_add_district_id_to_properties_table', 6),
(18, '2026_03_29_024956_add_land_area_unit_to_properties_table', 7),
(19, '2026_04_03_013422_create_blogs_table', 8),
(20, '2026_04_03_013505_create_testimonials_table', 8),
(21, '2026_04_03_013511_create_faqs_table', 8),
(22, '2026_04_03_013519_create_site_stats_table', 8),
(23, '2026_04_03_082100_add_seo_fields_to_blogs_table', 9),
(24, '2026_04_03_051731_add_seo_fields_to_properties_table', 10),
(25, '2026_04_03_063857_create_contact_messages_table', 11),
(26, '2026_04_03_064703_create_site_settings_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `district_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `state_id`, `name`, `created_at`, `updated_at`, `district_id`) VALUES
(1, 1, 'Inaruwa Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(2, 1, 'Dharan Sub-Metropolitan City', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(3, 1, 'Itahari Sub-Metropolitan City', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(4, 1, 'Barahachhetra Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(5, 1, 'Bhokraha Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(6, 1, 'Koshi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(7, 1, 'Harinagara Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(8, 1, 'Gadhi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(9, 1, 'Dewangan Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(10, 1, 'Panchakanya Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(11, 1, 'Ramdhuni Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(12, 1, 'Barju Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 11),
(13, 1, 'Triyuga Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(14, 1, 'Katari Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(15, 1, 'Belaka Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(16, 1, 'Rautamai Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(17, 1, 'Limbuwakot Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(18, 1, 'Tapli Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(19, 1, 'Chaudandigadhi Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(20, 1, 'Shivasatakshi Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(21, 1, 'Udayapurgadhi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(22, 1, 'Jogidaha Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(23, 1, 'Bhulke Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(24, 1, 'Halesi Tuwachung Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 14),
(25, 1, 'Diktel Rupakota Majhuwagadhi', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(26, 1, 'Sakela Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(27, 1, 'Aiselukharka Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(28, 1, 'Bhumlung Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(29, 1, 'Diprung Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(30, 1, 'Jantedhunga Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(31, 1, 'Kepilasgadhi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(32, 1, 'Khemal Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(33, 1, 'Marek Katahare Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(34, 1, 'Rawabesi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(35, 1, 'Saune Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(36, 1, 'Tribeni Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(37, 1, 'Yamuna Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 5),
(38, 1, 'Siddhicharan Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(39, 1, 'Molung Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(40, 1, 'Sunkoshi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(41, 1, 'Khijikant Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(42, 1, 'Kunjo Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(43, 1, 'Madhavpur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(44, 1, 'Mali Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(45, 1, 'Mandeepur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(46, 1, 'Okhaldhunga Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(47, 1, 'Ragani Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(48, 1, 'Sidingwa Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(49, 1, 'Tarkali Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(50, 1, 'Thakle Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 7),
(51, 1, 'Phidim Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(52, 1, 'Ektin Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(53, 1, 'Falelung Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(54, 1, 'Hilihang Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(55, 1, 'Kummayak Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(56, 1, 'Miklajung Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(57, 1, 'Maiwakhola Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(58, 1, 'Phungling Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(59, 1, 'Panchthar Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(60, 1, 'Yangwarak Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(61, 1, 'Tumbewa Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(62, 1, 'Yashok Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 8),
(63, 1, 'Myanglung Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 13),
(64, 1, 'Aathrai Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 13),
(65, 1, 'Chhathar Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 13),
(66, 1, 'Laligurash Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 13),
(67, 1, 'Maijogmai Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 13),
(68, 1, 'Mekhligunj Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 13),
(69, 1, 'Sankranti Bazar Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 13),
(70, 1, 'Sabla Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 13),
(71, 1, 'Khandbari Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(72, 1, 'Bhotkhola Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(73, 1, 'Chichila Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(74, 1, 'Madi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(75, 1, 'Makalu Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(76, 1, 'Mangtewa Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(77, 1, 'Panchakharp Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(78, 1, 'Pakhribas Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(79, 1, 'Tumlingtar Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(80, 1, 'Chainpur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(81, 1, 'Siddhapokhari Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(82, 1, 'Sankhuwasabha Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(83, 1, 'Silichong Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 9),
(84, 1, 'Solukhumbu Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 10),
(85, 1, 'Sotang Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 10),
(86, 1, 'Thulung Dudhkoshi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 10),
(87, 1, 'Mahakulung Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 10),
(88, 1, 'Nechasalyan Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 10),
(89, 1, 'Likhu Pike Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 10),
(90, 1, 'Khote-Rangas Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 10),
(91, 1, 'Jubu Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 10),
(92, 1, 'Khumbu Pasang Lhamu Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 10),
(93, 1, 'Dhankuta Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 2),
(94, 1, 'Chhathar Jorpati Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 2),
(95, 1, 'Mahadeva Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 2),
(96, 1, 'Sahid Smarak Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 2),
(97, 1, 'Maiwakhola Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 2),
(98, 1, 'Mundum Bahumati Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 2),
(99, 1, 'Ilam Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(100, 1, 'Mechinagar Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(101, 1, 'Mai Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(102, 1, 'Suryodaya Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(103, 1, 'Deumai Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(104, 1, 'Sandakpur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(105, 1, 'Maijogmai Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(106, 1, 'Shree Antu Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(107, 1, 'Chulachuli Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(108, 1, 'Rong Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 3),
(109, 1, 'Mechinagar Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(110, 1, 'Birtamod Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(111, 1, 'Kankai Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(112, 1, 'Arjundhara Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(113, 1, 'Bhadrapur Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(114, 1, 'Kachankawal Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(115, 1, 'Haldibari Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(116, 1, 'Shivasatakshi Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(117, 1, 'Gauradaha Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(118, 1, 'Gaurigadh Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(119, 1, 'Jhapa Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(120, 1, 'Kamal Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(121, 1, 'Pathari Shanishchare Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(122, 1, 'Buddhashanti Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(123, 1, 'Damak Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(124, 1, 'Baharangi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 4),
(125, 1, 'Biratnagar Metropolitan City', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(126, 1, 'Urlabari Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(127, 1, 'Rangeli Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(128, 1, 'Sundar Haraicha Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(129, 1, 'Kerabari Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(130, 1, 'Katahari Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(131, 1, 'Letang Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(132, 1, 'Belbari Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(133, 1, 'Sunawarshi Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(134, 1, 'Ratuwamai Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(135, 1, 'Gramthan Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(136, 1, 'Miklajung Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(137, 1, 'Dhanpalthan Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(138, 1, 'Budhiganga Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(139, 1, 'Jahada Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(140, 1, 'Kanepokhari Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(141, 1, 'Bhogateni Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 6),
(142, 2, 'Kalaiya Sub-Metropolitan City', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(143, 2, 'Jitpur Simara Sub-Metropolitan City', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(144, 2, 'Nijgadh Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(145, 2, 'Mahagadhimai Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(146, 2, 'Suwarna Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(147, 2, 'Prasauni Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(148, 2, 'Debahi Chhara Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(149, 2, 'Parwanipur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(150, 2, 'Pheta Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(151, 2, 'Bishrampur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(152, 2, 'Madhav Narayan Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(153, 2, 'Kabilasi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(154, 2, 'Brindaban Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(155, 2, 'Karaiya Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(156, 2, 'Pachrauta Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(157, 2, 'Simraungadh Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(158, 2, 'Chakragatti Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 15),
(159, 2, 'Janakpur Sub-Metropolitan City', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(160, 2, 'Bhanpur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(161, 2, 'Bishnupur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(162, 2, 'Chakka Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(163, 2, 'Dhanauj Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(164, 2, 'Ganeshpur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(165, 2, 'Hansapur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(166, 2, 'Janakradha Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(167, 2, 'Kamala Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(168, 2, 'Mukhiyapatti Mushargiya Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(169, 2, 'Sahidnagar Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(170, 2, 'Sabaila Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(171, 2, 'Tilathi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(172, 2, 'Aurahi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 16),
(173, 2, 'Jaleshwor Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(174, 2, 'Bhangaha Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(175, 2, 'Bardibas Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(176, 2, 'Bhramarpuri Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(177, 2, 'Ekarwa Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(178, 2, 'Gaushala Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(179, 2, 'Jaleshwor Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(180, 2, 'Loharpatti Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(181, 2, 'Mahottari Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(182, 2, 'Matihani Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(183, 2, 'Nauwakot Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(184, 2, 'Ramgadhiwa Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(185, 2, 'Samsi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(186, 2, 'Shreepur Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 17),
(187, 2, 'Birgunj Metropolitan City', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 18),
(188, 2, 'Bhaurahi Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 18),
(189, 2, 'Bindabasini Rural Municipality', '2026-03-29 20:55:18', '2026-03-29 20:55:18', 18),
(190, 2, 'Birgunj Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(191, 2, 'Chhathwa Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(192, 2, 'Jagarnathpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(193, 2, 'Jirabhawani Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(194, 2, 'Kalikamai Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(195, 2, 'Lahabati Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(196, 2, 'Lalbandi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(197, 2, 'Parsagadhi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(198, 2, 'Paterwa Sugauli Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(199, 2, 'Sahidnagar Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(200, 2, 'Sirsiya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(201, 2, 'Thadi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(202, 2, 'Bageshwori Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(203, 2, 'Pokhariya Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(204, 2, 'Srivani Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 18),
(205, 2, 'Gaur Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(206, 2, 'Brindaban Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(207, 2, 'Chandrapur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(208, 2, 'Dewahi Gonahi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(209, 2, 'Durga Bhagawati Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(210, 2, 'Fatuwa Bijayapur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(211, 2, 'Garuda Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(212, 2, 'Gujara Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(213, 2, 'Ishwarpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(214, 2, 'Katahariya Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(215, 2, 'Madhav Narayan Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(216, 2, 'Matiarwa Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(217, 2, 'Parsa Devi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(218, 2, 'Pharwaha Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(219, 2, 'Rajdevi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(220, 2, 'Rajpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(221, 2, 'Ramnagar Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(222, 2, 'Yoginimai Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 19),
(223, 2, 'Malangwa Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(224, 2, 'Aishwarya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(225, 2, 'Bagmati Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(226, 2, 'Balara Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(227, 2, 'Barahathwa Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(228, 2, 'Brahmapuri Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(229, 2, 'Chakragadhi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(230, 2, 'Dhankaul Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(231, 2, 'Godaita Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(232, 2, 'Haripur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(233, 2, 'Harion Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(234, 2, 'Ishwarpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(235, 2, 'Kabilasi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(236, 2, 'Lalbandi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(237, 2, 'Laxmipur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(238, 2, 'Parsa Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(239, 2, 'Ramnagar Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(240, 2, 'Salempur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(241, 2, 'Sahodara Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 21),
(242, 2, 'Siraha Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(243, 2, 'Arnama Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(244, 2, 'Bishnupur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(245, 2, 'Bhagawanpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(246, 2, 'Bhogawa Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(247, 2, 'Dhanagadi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(248, 2, 'Dhanauja Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(249, 2, 'Gadhimai Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(250, 2, 'Kalyanpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(251, 2, 'Karahi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(252, 2, 'Lahan Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(253, 2, 'Mithila Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(254, 2, 'Nawarajpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(255, 2, 'Sakhuwa Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(256, 2, 'Sukhipur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(257, 2, 'Tarahi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(258, 2, 'Golbazar Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(259, 2, 'Mirchaiya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(260, 2, 'Bishnupaduka Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 22),
(261, 2, 'Rajbiraj Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(262, 2, 'Bishnupur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(263, 2, 'Bodebarsain Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(264, 2, 'Chhinnamasta Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(265, 2, 'Dhanagadhi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(266, 2, 'Fattepur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(267, 2, 'Hanumannagar Kankalini Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(268, 2, 'Khadak Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(269, 2, 'Kishanpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(270, 2, 'Mahadeva Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(271, 2, 'Rajbiraj Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(272, 2, 'Ramaroshan Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(273, 2, 'Rupani Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(274, 2, 'Sambhunath Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(275, 2, 'Saraswor Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(276, 2, 'Surunga Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(277, 2, 'Tilathi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(278, 2, 'Tirhut Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(279, 2, 'Bhagawatpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 20),
(280, 3, 'Nilkantha Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(281, 3, 'Benighat Rorang Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(282, 3, 'Gajuri Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(283, 3, 'Gorkha Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(284, 3, 'Jeevanpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(285, 3, 'Khadadevi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(286, 3, 'Khaniyabas Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(287, 3, 'Netrawali Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(288, 3, 'Siddhalek Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(289, 3, 'Tangilbang Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(290, 3, 'Thakre Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(291, 3, 'Tripurasundari Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 25),
(292, 3, 'Bhimeshwar Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(293, 3, 'Baiteshwor Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(294, 3, 'Bhimtar Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(295, 3, 'Chankheli Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(296, 3, 'Chilankha Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(297, 3, 'Dolakha Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(298, 3, 'Gaurishankar Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(299, 3, 'Jiri Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(300, 3, 'Kalinchowk Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(301, 3, 'Khadka Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(302, 3, 'Lamidanda Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(303, 3, 'Mai Pokhari Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(304, 3, 'Melung Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(305, 3, 'Sailung Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(306, 3, 'Sunakhani Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(307, 3, 'Tamakoshi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 26),
(308, 3, 'Bidur Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(309, 3, 'Belkotgadhi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(310, 3, 'Bhimtang Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(311, 3, 'Dupcheshwar Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(312, 3, 'Kakani Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(313, 3, 'Kispang Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(314, 3, 'Likhu Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(315, 3, 'Mylang Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(316, 3, 'Panchkhal Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(317, 3, 'Rashad Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(318, 3, 'Shivapuri Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(319, 3, 'Suryagadhi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(320, 3, 'Tadi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(321, 3, 'Tarakeshwor Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(322, 3, 'Tadi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(323, 3, 'Ugratara Kaliika Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(324, 3, 'Wunekot Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 31),
(325, 3, 'Uttargaya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 32),
(326, 3, 'Aamachhodingmo Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 32),
(327, 3, 'Kalika Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 32),
(328, 3, 'Naukunda Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 32),
(329, 3, 'Parbatikunda Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 32),
(330, 3, 'Thulosirubari Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 32),
(331, 3, 'Manthali Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(332, 3, 'Bhimchuli Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(333, 3, 'Bhatauliya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(334, 3, 'Doramba Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(335, 3, 'Goganda Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(336, 3, 'Khadadevi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(337, 3, 'Khimti Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(338, 3, 'Likhu Tamakoshi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(339, 3, 'Madi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(340, 3, 'Ramechhap Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(341, 3, 'Sunarpani Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(342, 3, 'Sukajor Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(343, 3, 'Umakunda Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(344, 3, 'Uttar Gaya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 33),
(345, 3, 'Kamalamai Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(346, 3, 'Bhimeshwor Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(347, 3, 'Baldengadhi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(348, 3, 'Golanjor Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(349, 3, 'Hariharpur Gadhi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(350, 3, 'Jogajuli Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(351, 3, 'Kamalamai Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(352, 3, 'Kusheshwor Dumja Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(353, 3, 'Marin Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(354, 3, 'Ramaroshan Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(355, 3, 'Sunkoshi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(356, 3, 'Tinpatan Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(357, 3, 'Fikkal Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(358, 3, 'Gadhi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 34),
(359, 3, 'Chautara Sangachokgadhi', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(360, 3, 'Bahrabise Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(361, 3, 'Bhotang Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(362, 3, 'Chautara Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(363, 3, 'Dubachaur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(364, 3, 'Gati Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(365, 3, 'Ghyanglefedi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(366, 3, 'Gumthang Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(367, 3, 'Helambu Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(368, 3, 'Jugal Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(369, 3, 'Kalika Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(370, 3, 'Lisankhu Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(371, 3, 'Majhafed Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(372, 3, 'Nawalpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(373, 3, 'Panchkhal Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(374, 3, 'Sangachok Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(375, 3, 'Selang Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(376, 3, 'Sunkoshi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(377, 3, 'Tatopani Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(378, 3, 'Thampalkot Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(379, 3, 'Thambu Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(380, 3, 'Tripurasundari Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(381, 3, 'Yamunadhan Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 35),
(382, 3, 'Kathmandu Metropolitan City', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(383, 3, 'Kageshwori Manohara Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(384, 3, 'Tokha Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(385, 3, 'Tarakeshwor Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(386, 3, 'Dakshinkali Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(387, 3, 'Chandragiri Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(388, 3, 'Budhanilkantha Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(389, 3, 'Gokarneshwor Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(390, 3, 'Kirtipur Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(391, 3, 'Shankharapur Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(392, 3, 'Mahadevsthan Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 27),
(393, 3, 'Lalitpur Metropolitan City', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 29),
(394, 3, 'Mahalaxmi Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 29),
(395, 3, 'Godawari Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 29),
(396, 3, 'Konjyosom Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 29),
(397, 3, 'Bagmati Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 29),
(398, 3, 'Lalitpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 29),
(399, 3, 'Bhaktapur Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 23),
(400, 3, 'Suryabinayak Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 23),
(401, 3, 'Changunarayan Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 23),
(402, 3, 'Madhyapur Thimi Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 23),
(403, 3, 'Dhulikhel Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(404, 3, 'Banepa Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(405, 3, 'Panauti Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(406, 3, 'Panchkhal Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(407, 3, 'Namobuddha Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(408, 3, 'Khanikhola Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(409, 3, 'Bhumlung Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(410, 3, 'Bhumlu Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(411, 3, 'Bethanchowk Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(412, 3, 'Mahadevtar Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(413, 3, 'Made Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(414, 3, 'Temal Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(415, 3, 'Koshidekha Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 28),
(416, 3, 'Bharatpur Metropolitan City', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 24),
(417, 3, 'Ratnanagar Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 24),
(418, 3, 'Khairahani Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 24),
(419, 3, 'Madi Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 24),
(420, 3, 'Kalika Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 24),
(421, 3, 'Rapti Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 24),
(422, 3, 'Ichchhakamana Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 24),
(423, 3, 'Bagauda Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 24),
(424, 3, 'Bharatpur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 24),
(425, 4, 'Pokhara Metropolitan City', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 38),
(426, 4, 'Madi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 38),
(427, 4, 'Rupa Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 38),
(428, 4, 'Bindhyabasini Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 38),
(429, 4, 'Sikles Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 38),
(430, 4, 'Annapurna Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 38),
(431, 4, 'Machhapuchhre Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 38),
(432, 4, 'Syangja Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(433, 4, 'Putalibazar Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(434, 4, 'Waling Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(435, 4, 'Chapakot Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(436, 4, 'Galyang Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(437, 4, 'Biruwa Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(438, 4, 'Arkhale Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(439, 4, 'Harinas Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(440, 4, 'Panchawati Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(441, 4, 'Khalanga Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(442, 4, 'Jagat Bhanjyang Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(443, 4, 'Phedikhola Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 45),
(444, 5, 'Siddharthanagar Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(445, 5, 'Butwal Sub-Metropolitan City', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(446, 5, 'Devdaha Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(447, 5, 'Sainamaina Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(448, 5, 'Kothiyahi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(449, 5, 'Marchawari Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(450, 5, 'Ayodhyapuri Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(451, 5, 'Gaidahawa Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(452, 5, 'Siyari Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(453, 5, 'Omsatiya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(454, 5, 'Parroha Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(455, 5, 'Sammarimai Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(456, 5, 'Mayadevi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(457, 5, 'Tilottama Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(458, 5, 'Shivraj Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(459, 5, 'Kanchan Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(460, 5, 'Banganga Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(461, 5, 'Madhavaniya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 58),
(462, 5, 'Kapilvastu Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(463, 5, 'Shivaraj Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(464, 5, 'Krishnanagar Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(465, 5, 'Maharajgunj Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(466, 5, 'Yashodhara Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(467, 5, 'Bijaynagar Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(468, 5, 'Suddhodhan Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(469, 5, 'Bodhaban Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(470, 5, 'Patari Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(471, 5, 'Nigdhuvan Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(472, 5, 'Balarampur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 52),
(473, 6, 'Birendranagar Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(474, 6, 'Bheri Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(475, 6, 'Gurvakohol Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(476, 6, 'Chaukune Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(477, 6, 'Lekbeshi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(478, 6, 'Panchapuri Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(479, 6, 'Barahatal Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(480, 6, 'Rajhena Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(481, 6, 'Chingad Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(482, 6, 'Dabhe Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 68),
(483, 6, 'Sharada Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(484, 6, 'Kalimati Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(485, 6, 'Kumalakot Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(486, 6, 'Dhanagadhi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(487, 6, 'Bagchaur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(488, 6, 'Chhatreshwori Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(489, 6, 'Shaikhapur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(490, 6, 'Kapurkot Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(491, 6, 'Bhagawatimai Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(492, 6, 'Damkada Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(493, 6, 'Tribeni Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 67),
(494, 7, 'Dhangadhi Sub-Metropolitan City', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(495, 7, 'Godawari Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(496, 7, 'Tikapur Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(497, 7, 'Bhajani Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(498, 7, 'Janaki Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(499, 7, 'Joshipur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(500, 7, 'Ghodaghodi Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(501, 7, 'Kailari Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(502, 7, 'Chure Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(503, 7, 'Bardagoriya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(504, 7, 'Gauriganga Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(505, 7, 'Masuriya Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(506, 7, 'Udasipur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(507, 7, 'Pachharal Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(508, 7, 'Shreepur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(509, 7, 'Phulbari Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(510, 7, 'Durgauli Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(511, 7, 'Api Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 75),
(512, 7, 'Mahendranagar Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(513, 7, 'Bedkot Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(514, 7, 'Belauri Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(515, 7, 'Beldandi Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(516, 7, 'Shuklaphanta Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(517, 7, 'Punarbas Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(518, 7, 'Bhimdatta Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(519, 7, 'Krishnapur Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(520, 7, 'Mahakali Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(521, 7, 'Sreepur Rural Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(522, 7, 'Doodhara Chandani Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74),
(523, 7, 'Parashuram Municipality', '2026-03-29 20:55:19', '2026-03-29 20:55:19', 74);

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
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `property_type_id` bigint UNSIGNED NOT NULL,
  `business_type_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `municipality_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(15,2) DEFAULT NULL,
  `price_period` enum('total','monthly','yearly') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'total',
  `land_area_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_area_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `status` enum('available','sold','rented','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_type_id`, `business_type_id`, `state_id`, `district_id`, `municipality_id`, `title`, `slug`, `description`, `price`, `price_period`, `land_area_size`, `land_area_unit`, `address`, `latitude`, `longitude`, `status`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, 6, 131, 'Eum exercitation ten', 'eum-exercitation-ten', 'This exceptional property offers a perfect blend of modern design and functional living spaces. Located in a prime area with easy access to schools, shopping centers, and transportation. The property features spacious rooms with ample natural light and ventilation. Ideal for families or professionals seeking comfort and convenience. Contact us to schedule a viewing and experience this wonderful property firsthand.', 102.00, 'total', '92', 'sqft', 'Corporis culpa veli', -61.00000000, 23.00000000, 'available', NULL, NULL, NULL, 1, '2026-03-28 21:58:05', '2026-04-02 22:10:19'),
(3, 2, 1, 5, 52, 467, 'Ratione quaerat recu', 'ratione-quaerat-recu', '<p>Discover this stunning Plot located in the heart of Kalika Rural Municipality, Sindhupalchok. This exceptional property offers a perfect blend of modern design and functional living spaces. With 72 sqft of well-designed space, this property features spacious rooms with ample natural light and ventilation. <b>The property is strategically located</b> with easy access to schools, shopping centers, and transportation hubs. Rent at an attractive price of Rs. 263. This is an ideal opportunity for families or professionals seeking comfort and convenience in a desirable neighborhood. Contact us today to schedule a viewing and experience this wonderful property firsthand.</p><p><br></p><ul><li>sdvs<i>sdvd</i></li></ul><p><i><u>sdfssdfsd</u></i></p><p><i><u><b>sdfsdfd</b></u></i></p>', 263.00, 'total', '72', 'sqft', 'Ipsam voluptatem su', 60.00000000, 87.00000000, 'available', NULL, NULL, NULL, 1, '2026-03-29 20:36:46', '2026-04-02 22:15:35'),
(4, 2, 1, 1, 5, 29, 'Placeat nostrud lab', 'placeat-nostrud-lab', 'This beautiful Plot situated in Diprung Rural Municipality, Khotang presents an excellent opportunity for discerning buyers. The property boasts contemporary architecture and high-quality construction, offering a perfect combination of style and functionality. The interior spaces are thoughtfully designed to maximize comfort and usability, with modern fixtures and finishes throughout. Natural light floods through strategically placed windows, creating a warm and inviting atmosphere throughout the day. The surrounding area offers excellent amenities including schools, healthcare facilities, and recreational options. Rent at Rs. 256. Don\'t miss this chance to own a property in this sought-after location.', 256.00, 'total', '53', 'aana', 'Magna et quis sunt', -27.00000000, 39.00000000, 'available', NULL, NULL, NULL, 1, '2026-03-29 21:01:24', '2026-03-30 01:29:17'),
(5, 2, 1, 1, 5, 28, 'Quaerat adipisci sol', 'quaerat-adipisci-sol', 'This beautiful property is located in a prime location with excellent accessibility and modern amenities. The property offers spacious living areas with natural lighting and ventilation. Perfect for families looking for a comfortable and convenient lifestyle. Contact us for more details or to schedule a visit.', 941.00, 'total', '23', 'sqft', 'Veniam fuga Minim', 19.00000000, 149.00000000, 'available', NULL, NULL, NULL, 1, '2026-03-30 01:03:13', '2026-03-30 01:21:33'),
(6, 2, 1, 2, 15, 147, 'Commodo id incididun', 'Commodo-id-incididun', '<p>Summer is the perfect time to explore new destinations, relax on sunny beaches, and create unforgettable memories. But traveling during the hottest season also comes with its own set of challenges. From staying cool to avoiding crowds, a little preparation can make a big difference. Here are some essential summer travel tips to help you enjoy a smooth and stress-free trip.</p><p>&nbsp;</p><h2>✈️ Plan Ahead and Book Early</h2><p>Summer is peak travel season, which means flights, hotels, and attractions can fill up quickly. Booking early not only ensures availability but can also help you save money. Look for deals and consider flexible dates to get the best rates.</p><p>&nbsp;</p><h2>🧳 Pack Smart and Light</h2><p>When it comes to summer travel, less is more. Pack lightweight, breathable clothing like cotton or linen. Don’t forget essentials such as:</p><ul><li>Sunglasses 🕶️</li><li>Sunscreen ☀️</li><li>Hat or cap 🧢</li><li>Comfortable walking shoes 👟</li></ul><p>A reusable water bottle is also a must to stay hydrated throughout your journey.</p>', 85.00, 'total', '84', 'sqft', 'Ex quia rerum lorem', 84.00000000, 15.00000000, 'available', 'Anim aut illo eu con', 'Adipisci nisi et deb', 'Assumenda beatae ex', 1, '2026-04-03 00:11:01', '2026-04-03 00:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

CREATE TABLE `property_features` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_features`
--

INSERT INTO `property_features` (`id`, `property_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(5, 2, 'hii', 'iii Heloo', '2026-03-30 00:20:21', '2026-03-30 00:32:47'),
(7, 2, 'School', 'Near 100m', '2026-03-30 00:29:35', '2026-03-30 00:29:35'),
(8, 5, 'Free wifi', 'Free wifi', '2026-03-30 01:23:38', '2026-03-30 01:23:38'),
(9, 5, 'Near School', 'Near School', '2026-03-30 01:24:11', '2026-03-30 01:24:11'),
(10, 5, 'Swiming pool', 'Swiming pool', '2026-03-30 01:24:30', '2026-03-30 01:24:30'),
(11, 5, '24/7 Support', '24/7 Support', '2026-03-30 01:25:14', '2026-03-30 01:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Plot', 'plot', '2026-03-27 03:13:58', '2026-03-27 03:13:58');

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
('eO2FKQbaFvgEtXhbyEXQkQZ0agbOldTodSupbYm3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDVISTliVVZvNDloRzl3VHFmQnh2OXl2MzB4cHMwWTVrY1JRWmdzeiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zZXR0aW5ncy9jb250YWN0IjtzOjU6InJvdXRlIjtzOjIyOiJhZG1pbi5zZXR0aW5ncy5jb250YWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1775204496),
('WFUkHiCyDxGu2oFl12xBnW5c6izAr9zesBi02kBe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmhoUWh3SDN3ZHdqaUlkemZVV3djNkVUelNnb2F6cjl1VW83V2p4dCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9wZXJ0aWVzL0NvbW1vZG8taWQtaW5jaWRpZHVuIjtzOjU6InJvdXRlIjtzOjI0OiJmcm9udGVuZC5wcm9wZXJ0aWVzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1775203267);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `key`, `value`, `group`, `created_at`, `updated_at`) VALUES
(1, 'about_hero_title', 'Building Trust in Real Estate Investment', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(2, 'about_hero_subtitle', 'Sapphire Investment is Nepal\'s premier real estate consultancy, helping investors and families find verified, high-potential properties across the country.', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(3, 'about_stat_1_value', '1000', 'about', '2026-04-03 01:15:56', '2026-04-03 01:51:22'),
(4, 'about_stat_1_label', 'Properties Sold', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(5, 'about_stat_2_value', '100', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(6, 'about_stat_2_label', 'Years Experience', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(7, 'about_stat_3_value', '15', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(8, 'about_stat_3_label', 'Expert Agents', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(9, 'about_stat_4_value', '20000', 'about', '2026-04-03 01:15:56', '2026-04-03 01:51:22'),
(10, 'about_stat_4_label', 'Client Satisfaction', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(11, 'about_story_title', 'Transforming Nepal\'s Real Estate Landscape', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(12, 'about_story_content', 'Founded with a vision to bring transparency and trust to Nepal\'s property market, Sapphire Investment has grown from a small consultancy to one of the most recognized names in real estate. Our journey began with the simple belief that every family and investor deserves access to verified, high-quality property options.\r\n\r\nToday, we operate across multiple provinces, with a team of seasoned professionals who understand the nuances of Nepal\'s diverse real estate landscape. From the bustling Kathmandu Valley to the serene hills of Pokhara, we\'ve helped hundreds of clients find their perfect property.', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(13, 'about_mission', 'To democratize real estate investment in Nepal by providing verified, transparent, and accessible property solutions for every investor, regardless of scale. We aim to set the industry standard for trust and reliability.', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(14, 'about_vision', 'To become Nepal\'s most trusted real estate platform, establishing a digitally integrated marketplace where buyers, sellers, and investors can connect with complete confidence and security.', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(15, 'about_values', 'Transparency, integrity, and client-first approach guide everything we do. We believe sustainable growth comes from building lasting relationships, not short-term transactions.', 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(16, 'about_team_member_1_name', 'Rajesh Sada', 'about', '2026-04-03 01:15:56', '2026-04-03 01:16:57'),
(17, 'about_team_member_1_role', 'Dev', 'about', '2026-04-03 01:15:56', '2026-04-03 01:16:42'),
(18, 'about_team_member_2_name', 'Binaya Sir', 'about', '2026-04-03 01:15:56', '2026-04-03 01:51:22'),
(19, 'about_team_member_2_role', 'HERO', 'about', '2026-04-03 01:15:56', '2026-04-03 01:51:22'),
(20, 'about_team_member_3_name', NULL, 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(21, 'about_team_member_3_role', NULL, 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(22, 'about_team_member_4_name', NULL, 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(23, 'about_team_member_4_role', NULL, 'about', '2026-04-03 01:15:56', '2026-04-03 01:15:56'),
(24, 'contact_phone', '+977 9824894944', 'contact', '2026-04-03 01:18:20', '2026-04-03 01:53:29'),
(25, 'contact_email', 'info@sapphireinvestment.com', 'contact', '2026-04-03 01:18:20', '2026-04-03 01:18:20'),
(26, 'contact_address', 'Imadol-28, Kathmandu, Nepal', 'contact', '2026-04-03 01:18:20', '2026-04-03 01:53:29'),
(27, 'contact_working_hours_weekday', 'Sunday - Friday: 9:00 AM - 6:00 PM', 'contact', '2026-04-03 01:18:20', '2026-04-03 01:18:20'),
(28, 'contact_working_hours_saturday', 'Saturday: 10:00 AM - 5:00 PM', 'contact', '2026-04-03 01:18:20', '2026-04-03 01:18:20'),
(29, 'contact_map_embed', NULL, 'contact', '2026-04-03 01:18:20', '2026-04-03 01:18:20'),
(30, 'contact_facebook', 'https:fb.com/rajesh', 'contact', '2026-04-03 01:18:20', '2026-04-03 01:52:33'),
(31, 'contact_instagram', NULL, 'contact', '2026-04-03 01:18:20', '2026-04-03 01:18:20'),
(32, 'contact_linkedin', NULL, 'contact', '2026-04-03 01:18:20', '2026-04-03 01:18:20'),
(33, 'contact_whatsapp', NULL, 'contact', '2026-04-03 01:18:20', '2026-04-03 01:18:20'),
(34, 'site_name', 'SAPPHIRE INVESTMENT', 'general', '2026-04-03 01:28:23', '2026-04-03 02:35:49'),
(35, 'site_title', 'Welcome to My Awesome Real Estate', 'general', '2026-04-03 01:28:23', '2026-04-03 01:28:23'),
(36, 'site_description', 'Discover premium real estate properties in Nepal with Sapphire Investment. We offer verified residential and commercial listings.', 'general', '2026-04-03 01:28:23', '2026-04-03 01:28:23'),
(37, 'site_keywords', 'real estate nepal, properties in kathmandu, buy land nepal, sapphire investment', 'general', '2026-04-03 01:28:23', '2026-04-03 01:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `site_stats`
--

CREATE TABLE `site_stats` (
  `id` bigint UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_stats`
--

INSERT INTO `site_stats` (`id`, `label`, `value`, `icon`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Houses For Sale', '5,635', 'fas fa-home', 1, 1, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(2, 'Open Houses', '324', 'fas fa-door-open', 1, 2, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(3, 'Houses Recently Sold', '105', 'fas fa-check-circle', 1, 3, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(4, 'Price Reduced', '301', 'fas fa-tag', 1, 4, '2026-04-02 19:58:54', '2026-04-02 19:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `order_column` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `link`, `is_active`, `order_column`, `created_at`, `updated_at`) VALUES
(4, 'Kathmandu', 'Find plot', 'https://www.hyxikegysizyf.me', 1, 2, '2026-03-27 00:26:46', '2026-03-27 03:07:03'),
(5, 'Lalitpur', 'Labim mall', 'https://www.bekysojilu.info', 1, 3, '2026-03-27 00:30:08', '2026-03-27 03:07:47'),
(6, 'Aspernatur pariatur', 'Eligendi qui qui id', 'https://www.xokod.us', 1, 4, '2026-03-27 00:45:54', '2026-03-27 00:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Koshi Province', 'Province No. 1', '2026-03-28 20:08:36', '2026-03-28 20:08:36'),
(2, 'Madhesh Province', 'Province No. 2', '2026-03-28 20:08:36', '2026-03-28 20:08:36'),
(3, 'Bagmati Province', 'Bagmati Province', '2026-03-28 20:08:36', '2026-03-28 20:08:36'),
(4, 'Gandaki Province', 'Gandaki Province', '2026-03-28 20:08:36', '2026-03-28 20:08:36'),
(5, 'Lumbini Province', 'Lumbini Province', '2026-03-28 20:08:36', '2026-03-28 20:08:36'),
(6, 'Karnali Province', 'Karnali Province', '2026-03-28 20:08:36', '2026-03-28 20:08:36'),
(7, 'Sudurpashchim Province', 'Sudurpashchim Province', '2026-03-28 20:08:36', '2026-03-28 20:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(2,1) NOT NULL DEFAULT '5.0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `client_designation`, `client_photo_url`, `content`, `rating`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Rajesh Shrestha', 'Corporate Director', 'https://randomuser.me/api/portraits/men/32.jpg', 'The level of professionalism is unmatched. They found us commercial land in Kathmandu perfectly suited for our warehouse expansion. The transparency in dealing was refreshing.', 5.0, 1, 1, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(2, 'Sita Sharma', 'NRN Investor', 'https://randomuser.me/api/portraits/women/44.jpg', 'As an NRN, I was worried about investing in property back home. They made the process transparent and easy, with regular updates and all documents verified properly.', 5.0, 1, 2, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(3, 'Prakash K.C.', 'Home Owner', 'https://randomuser.me/api/portraits/men/86.jpg', 'The team understood exactly what I was looking for and showed me multiple options within my budget. I found my dream home within 2 weeks of working with them!', 4.5, 1, 3, '2026-04-02 19:58:54', '2026-04-02 19:58:54'),
(4, 'Ravi Sir', 'QA', '/storage/testimonials/1775183148_69cf252c3665b.png', 'Fuga Quaerat vel qu', 5.0, 1, 4, '2026-04-02 20:40:48', '2026-04-02 20:42:00');

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
(1, 'Test User', 'test@example.com', '2026-03-28 20:08:36', '$2y$12$G4EjxB2SRtzEFON1A6tnHejvdlcW3iJI7oI0ncAyPbDWKYyndx8CK', 'mEzbu8rRo2', '2026-03-28 20:08:36', '2026-03-28 20:08:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_image_id_foreign` (`image_id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_types_name_unique` (`name`),
  ADD UNIQUE KEY `business_types_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_state_id_foreign` (`state_id`);

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
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`),
  ADD KEY `images_imageable_id_imageable_type_index` (`imageable_id`,`imageable_type`);

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
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipalities_state_id_index` (`state_id`),
  ADD KEY `municipalities_name_index` (`name`),
  ADD KEY `municipalities_district_id_foreign` (`district_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_slug_unique` (`slug`),
  ADD KEY `properties_property_type_id_index` (`property_type_id`),
  ADD KEY `properties_business_type_id_index` (`business_type_id`),
  ADD KEY `properties_state_id_index` (`state_id`),
  ADD KEY `properties_municipality_id_index` (`municipality_id`),
  ADD KEY `properties_status_index` (`status`),
  ADD KEY `properties_is_featured_index` (`is_featured`),
  ADD KEY `properties_price_index` (`price`),
  ADD KEY `properties_district_id_foreign` (`district_id`);

--
-- Indexes for table `property_features`
--
ALTER TABLE `property_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_features_property_id_index` (`property_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `property_types_name_unique` (`name`),
  ADD UNIQUE KEY `property_types_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`);

--
-- Indexes for table `site_stats`
--
ALTER TABLE `site_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `states_code_unique` (`code`),
  ADD KEY `states_name_index` (`name`),
  ADD KEY `states_code_index` (`code`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property_features`
--
ALTER TABLE `property_features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `site_stats`
--
ALTER TABLE `site_stats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `municipalities_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `municipalities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_business_type_id_foreign` FOREIGN KEY (`business_type_id`) REFERENCES `business_types` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `properties_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `properties_municipality_id_foreign` FOREIGN KEY (`municipality_id`) REFERENCES `municipalities` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `properties_property_type_id_foreign` FOREIGN KEY (`property_type_id`) REFERENCES `property_types` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `properties_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `property_features`
--
ALTER TABLE `property_features`
  ADD CONSTRAINT `property_features_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
