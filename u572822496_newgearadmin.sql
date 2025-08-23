-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2025 at 06:24 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u572822496_newgearadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `subtitle`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Discreet Luxury Real Estate Services', 'Your Trusted Partner in High-End Property Acquisition', '<p>\r\n                                            Simran Home Solution stands at the intersection of elegance and investment. We are a boutique real estate brokerage that exclusively deals in luxury residential spaces. Our handpicked portfolio features only the finest properties, backed by in-depth market knowledge and discreet, personalized service.\r\n\r\n                                            Simran Home Solution offers a platform where aspirations meet achievement. Whether you’re buying a family mansion or investing in a penthouse, we bring you the most exclusive luxury properties, paired with guidance that’s as sharp as it is honest.\r\n\r\n                                            Simran Home Solution brings you closer to curated living in India’s prime locations. With a trusted network of developers, architects, and legal experts, we ensure your journey from viewing to possession is seamless, secure, and truly elite.\r\n                                        </p>\r\n                                        <p>\r\n                                    Our clientele includes top business leaders, celebrities, and global investors who value privacy and performance. At Simran Home Solution, we handle every transaction with absolute confidentiality, offering bespoke solutions that go beyond expectations. \r\n                                    From iconic skyline residences to heritage bungalows, Simran Home Solution is your gateway to the best in high-end real estate. We don\'t just offer luxury homes — we deliver properties that embody culture, craftsmanship, and class.\r\n                                    \r\n                                    Simran Home Solution is your dedicated partner in finding homes that reflect who you are. Every client receives personalized guidance and access to exclusive listings that are otherwise off-market. Our team believes in quality over quantity, and excellence over everything else.\r\n\r\n                                    Simran Home Solution offers a platform where aspirations meet achievement. Whether you’re buying a family mansion or investing in a penthouse, we bring you the most exclusive luxury properties, paired with guidance that’s as sharp as it is honest.\r\n                                        </p>', '2025-06-19 09:10:59', '2025-06-19 09:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Landscaped Podium Deck', 'amenities/2025/03/1741267709-landscaped-podium-deck.svg', 1, '2025-06-05 07:58:29', '2025-07-06 09:17:01'),
(17, 'Rooftop Garden', 'amenities/2025/03/1741267739-rooftop-garden.svg', 1, '2025-06-05 07:58:59', '2025-06-18 02:13:34'),
(18, 'Outdoor Rooftop Cinema', 'amenities/2025/03/1741267762-outdoor-rooftop-cinema.svg', 1, '2025-06-05 07:59:22', '2025-06-18 02:13:48'),
(19, 'Outdoor Yoga Area', 'amenities/2025/03/1741267782-outdoor-yoga-area.svg', 1, '2025-06-05 07:59:42', '2025-06-18 02:14:03'),
(20, 'Pool deck', 'amenities/2025/03/1741267806-pool-deck.svg', 1, '2025-06-05 08:00:06', '2025-06-18 02:14:31'),
(21, 'Kids\' playground', 'amenities/2025/03/1741267845-kids-playground.svg', 1, '2025-06-05 08:00:45', '2025-06-18 02:14:49'),
(22, 'Multipurpose Sports Court', 'amenities/2025/03/1741267865-multipurpose-sports-court.svg', 1, '2025-06-05 08:01:05', '2025-06-18 02:15:10'),
(23, 'Fitness centres in each tower', 'amenities/2025/03/1741267888-fitness-centres-in-each-tower.svg', 1, '2025-06-05 08:01:28', '2025-06-18 02:15:29'),
(24, 'sports club', 'amenities/2025/07/1751394731-udhyogvihar.jpg', 1, '2025-07-01 18:32:11', '2025-07-01 18:32:11'),
(25, 'club house', 'amenities/2025/07/1751394862-wewe.webp', 1, '2025-07-01 18:34:22', '2025-07-01 18:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(50) NOT NULL,
  `type` enum('video','image') DEFAULT 'image',
  `heading` varchar(255) DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `page`, `type`, `heading`, `sub_heading`, `description`, `video`, `status`, `created_at`, `updated_at`) VALUES
(3, 'home', 'video', 'Prestigious Address', 'Your Next', 'Over 1000 Crores worth Property Sold. The Best real estate brand in gurgaon.', 'banners/videos/1751307088-home-banner2.mp4', 1, '2025-06-30 06:13:30', '2025-07-06 02:50:14'),
(4, 'about', 'image', 'Simran Home Solution', 'About', 'Step into a world of refined spaces, handpicked for your lifestyle. Discover elite homes in the heart of Gurugram and beyond.', 'banners/videos/1751309136-aboutvdo.mp4', 1, '2025-06-30 06:22:26', '2025-07-06 17:06:52'),
(6, 'location', 'image', 'Simran Home Solution', NULL, NULL, NULL, 1, '2025-07-01 05:27:05', '2025-07-01 05:27:05'),
(7, 'contact', 'image', 'Contact Us', NULL, NULL, NULL, 1, '2025-07-01 05:30:08', '2025-07-01 05:30:08'),
(8, 'privacy', 'image', 'Privacy Policy', NULL, NULL, NULL, 1, '2025-07-01 06:03:22', '2025-07-01 06:03:22'),
(9, 'terms', 'image', 'Terms', NULL, NULL, NULL, 1, '2025-07-01 06:15:04', '2025-07-01 06:15:04'),
(11, 'blogs', 'image', 'Blogs', NULL, NULL, NULL, 1, '2025-07-05 05:00:31', '2025-07-05 05:00:31'),
(12, 'developers', 'image', 'All Developers', NULL, NULL, NULL, 1, '2025-07-05 05:02:18', '2025-07-05 05:02:18'),
(13, 'property', 'image', 'Residential Properties', NULL, NULL, NULL, 1, '2025-07-05 23:19:48', '2025-07-05 23:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner_id` int(10) UNSIGNED DEFAULT NULL,
  `image` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `banner_id`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(5, 3, 'banners/images/1751264010-p00s1b0v.jpg', 0, '2025-06-30 06:13:30', '2025-06-30 06:13:30'),
(6, 3, 'banners/images/1751264010-1746706454-overview-image.png', 1, '2025-06-30 06:13:30', '2025-06-30 06:13:30'),
(7, 3, 'banners/images/1751264010-advantages-of-buying.webp', 2, '2025-06-30 06:13:30', '2025-06-30 06:13:30'),
(8, 4, 'banners/images/1751264546-img-2-uvgegvoghtpn.jpg', 0, '2025-06-30 06:22:26', '2025-06-30 06:22:26'),
(9, 4, 'banners/images/1751264546-img-1-8pc1dcnvtmvk.jpg', 1, '2025-06-30 06:22:26', '2025-06-30 06:22:26'),
(10, 4, 'banners/images/1751264546-img-41-kwgwltqba2k6.jpg', 2, '2025-06-30 06:22:26', '2025-06-30 06:22:26'),
(11, 4, 'banners/images/1751264546-img-3-9fqwjfsfw19h.jpg', 3, '2025-06-30 06:22:26', '2025-06-30 06:22:26'),
(16, 6, 'banners/images/1751347625-bg1.webp', 0, '2025-07-01 05:27:05', '2025-07-01 05:27:05'),
(17, 6, 'banners/images/1751347625-bg2.webp', 1, '2025-07-01 05:27:05', '2025-07-01 05:27:05'),
(18, 6, 'banners/images/1751347625-bg3.webp', 2, '2025-07-01 05:27:05', '2025-07-01 05:27:05'),
(19, 7, 'banners/images/1751347808-bg1.webp', 0, '2025-07-01 05:30:08', '2025-07-01 05:30:08'),
(20, 7, 'banners/images/1751347808-bg2.webp', 1, '2025-07-01 05:30:08', '2025-07-01 05:30:08'),
(21, 7, 'banners/images/1751347808-bg3.webp', 2, '2025-07-01 05:30:08', '2025-07-01 05:30:08'),
(22, 8, 'banners/images/1751349802-bg1.webp', 0, '2025-07-01 06:03:22', '2025-07-01 06:03:22'),
(23, 8, 'banners/images/1751349802-bg2.webp', 1, '2025-07-01 06:03:22', '2025-07-01 06:03:22'),
(24, 8, 'banners/images/1751349802-bg3.webp', 2, '2025-07-01 06:03:22', '2025-07-01 06:03:22'),
(25, 9, 'banners/images/1751350504-blog.jpg', 0, '2025-07-01 06:15:04', '2025-07-01 06:15:04'),
(26, 11, 'banners/images/1751691631-bg1.webp', 0, '2025-07-05 05:00:31', '2025-07-05 05:00:31'),
(27, 11, 'banners/images/1751691631-bg2.webp', 1, '2025-07-05 05:00:31', '2025-07-05 05:00:31'),
(28, 11, 'banners/images/1751691631-bg3.webp', 2, '2025-07-05 05:00:31', '2025-07-05 05:00:31'),
(29, 12, 'banners/images/1751691738-bg1.webp', 0, '2025-07-05 05:02:18', '2025-07-05 05:02:18'),
(30, 12, 'banners/images/1751691738-bg2.webp', 1, '2025-07-05 05:02:18', '2025-07-05 05:02:18'),
(31, 12, 'banners/images/1751691738-bg3.webp', 2, '2025-07-05 05:02:18', '2025-07-05 05:02:18'),
(34, 13, 'banners/images/1751757588-banner-1.jpg', 0, '2025-07-05 23:19:48', '2025-07-05 23:19:48'),
(35, 13, 'banners/images/1751757588-banner-2.jpg', 1, '2025-07-05 23:19:48', '2025-07-05 23:19:48'),
(36, 13, 'banners/images/1751757588-banner-3.jpg', 2, '2025-07-05 23:19:48', '2025-07-05 23:19:48'),
(37, 13, 'banners/images/1751757690-banner-4.jpg', 999, '2025-07-05 23:21:30', '2025-07-05 23:21:30'),
(38, 12, 'banners/images/1751757782-banner-1.jpg', 999, '2025-07-05 23:23:02', '2025-07-05 23:23:02'),
(39, 6, 'banners/images/1751757828-banner-1.jpg', 999, '2025-07-05 23:23:48', '2025-07-05 23:23:48'),
(40, 11, 'banners/images/1751757912-banner-1.jpg', 999, '2025-07-05 23:25:12', '2025-07-05 23:25:12'),
(41, 7, 'banners/images/1751757972-banner-1.jpg', 999, '2025-07-05 23:26:12', '2025-07-05 23:26:12'),
(42, 9, 'banners/images/1751758031-banner-1.jpg', 999, '2025-07-05 23:27:11', '2025-07-05 23:27:11'),
(43, 9, 'banners/images/1751758031-banner-2.jpg', 999, '2025-07-05 23:27:11', '2025-07-05 23:27:11'),
(44, 9, 'banners/images/1751758031-banner-3.jpg', 999, '2025-07-05 23:27:11', '2025-07-05 23:27:11'),
(45, 9, 'banners/images/1751758031-banner-4.jpg', 999, '2025-07-05 23:27:11', '2025-07-05 23:27:11'),
(46, 8, 'banners/images/1751758049-banner-1.jpg', 999, '2025-07-05 23:27:29', '2025-07-05 23:27:29'),
(47, 8, 'banners/images/1751758049-banner-2.jpg', 999, '2025-07-05 23:27:29', '2025-07-05 23:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `full_content` longtext NOT NULL,
  `breadcrumbs_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `heading`, `slug`, `main_image`, `full_content`, `breadcrumbs_image`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Here are five compelling reasons why 2025 is the right time to invest in luxury real estate:', 'here-are-five-compelling-reasons-why-2025-is-the-right-time-to-invest-in-luxury-real-estate', 'blogs/2025/06/1750225370-blog.jpg', '<p>In the ever-evolving world of real estate, luxury properties continue to shine as both a symbol of success and a smart investment opportunity. At Simran Home Solution, we understand what makes a property not just desirable &mdash; but truly valuable.</p>\r\n<p>&nbsp;</p>\r\n<h5>Here are <strong>five compelling</strong> reasons why 2025 is the right time to invest in luxury real estate:</h5>\r\n<p>&nbsp;</p>\r\n<h6 id=\"heading-anchor-0\">1. Stability in Uncertain Times</h6>\r\n<p>Luxury real estate has proven to be resilient, offering long-term value appreciation even during market fluctuations. With limited inventory and high demand, luxury homes tend to hold their value better than mass-market properties.</p>\r\n<p>&nbsp;</p>\r\n<h6 id=\"heading-anchor-1\">2. Exceptional Lifestyle Benefits</h6>\r\n<p>Beyond investment, luxury properties deliver unparalleled living experiences. From designer interiors and private amenities to smart automation and concierge services, you\'re not just buying a home &mdash; you\'re upgrading your lifestyle.</p>\r\n<p>&nbsp;</p>\r\n<h6 id=\"heading-anchor-2\">3. Simran Home Solution</h6>\r\n<p>Whether it\'s a penthouse in South Delhi or a villa in Gurugram, luxury homes are often located in thriving urban hubs. These prime locations continue to attract HNIs and NRIs alike, ensuring strong future appreciation.</p>\r\n<p>&nbsp;</p>\r\n<h6 id=\"heading-anchor-3\">4. Stronger Rental Yields</h6>\r\n<p>Luxury homes often attract high-net-worth tenants who are willing to pay a premium for comfort and convenience. This translates into higher rental yields and consistent passive income for owners.</p>\r\n<p>&nbsp;</p>\r\n<h6 id=\"heading-anchor-4\">5. Exclusive Investment Opportunities</h6>\r\n<p>With new-age developments by trusted builders like DLF, M3M, and 4S, buyers have access to world-class infrastructure, cutting-edge architecture, and future-ready living spaces.</p>\r\n<p>&nbsp;</p>\r\n<h5 id=\"heading-anchor-5\">Final Thoughts</h5>\r\n<p>Luxury real estate is more than just a status symbol &mdash; it&rsquo;s a strategic investment backed by tangible assets, high demand, and a legacy of long-term growth. At Simran Home Solution, we bring you handpicked properties that combine sophistication with solid ROI.</p>\r\n<p>&nbsp;</p>\r\n<h5 id=\"heading-anchor-6\">Key Features of Luxury Homes</h5>\r\n<ul>\r\n<li>Prime locations with easy connectivity</li>\r\n<li>World-class amenities like pools, gyms, spas</li>\r\n<li>Advanced security and automation systems</li>\r\n<li>Premium construction and interiors</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h5 id=\"heading-anchor-7\">Top Locations to Watch</h5>\r\n<ul>\r\n<li>Gurugram - Golf Course Road &amp; DLF Phase 5</li>\r\n<li>South Delhi - Vasant Vihar, Panchsheel Park</li>\r\n<li>Hyderabad - Jubilee Hills</li>\r\n</ul>\r\n<p><img src=\"../../../storage/app/public/blogs/2025/06/1750225370-blog.jpg\" alt=\"\" width=\"1366\" height=\"650\" /></p>\r\n<p>&nbsp;</p>', 'blogs/2025/06/1750225370-blog.jpg', 'Is Real Estate Really Shaping the Indian Skyline?', 'Is Real Estate Really Shaping the Indian Skyline?', 'Is Real Estate Really Shaping the Indian Skyline?', 1, '2025-06-18 05:42:50', '2025-07-06 09:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `builders`
--

CREATE TABLE `builders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `years_of_experience` int(10) UNSIGNED DEFAULT 0,
  `total_projects` int(10) UNSIGNED DEFAULT 0,
  `total_cities` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `builders`
--

INSERT INTO `builders` (`id`, `name`, `slug`, `logo`, `content`, `status`, `created_at`, `updated_at`, `years_of_experience`, `total_projects`, `total_cities`) VALUES
(2, 'M3m', 'm3m', 'builders/2025/01/1735709232-3.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 05:57:13', '2025-07-05 07:14:35', 20, 15, 10),
(3, 'Emaar', 'emaar', 'builders/2025/01/1735709244-7.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 05:57:34', '2025-06-18 08:31:36', 0, 0, 0),
(4, 'Godrej', 'godrej', 'builders/2025/01/1735709271-1.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 06:02:15', '2025-06-18 08:32:40', 0, 0, 0),
(5, 'Sliverglades', 'sliverglades', 'builders/2025/01/1735709323-2.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 05:28:43', '2025-06-18 08:32:55', 0, 0, 0),
(6, 'Omaxe', 'omaxe', 'builders/2025/01/1735709342-4.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 05:29:02', '2025-06-18 08:33:15', 0, 0, 0),
(7, 'Whiteland', 'whiteland', 'builders/2025/01/1735709358-5.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 05:29:18', '2025-06-18 08:33:25', 0, 0, 0),
(8, 'Trump Tower', 'trump-tower', 'builders/2025/01/1735709375-6.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 05:29:35', '2025-06-18 08:33:37', 0, 0, 0),
(9, 'Aipl', 'aipl', 'builders/2025/01/1735709390-8.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 05:29:50', '2025-06-18 08:33:53', 0, 0, 0),
(10, 'Adani', 'adani', 'builders/2025/01/1735709407-9.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 05:30:07', '2025-06-18 08:34:03', 0, 0, 0),
(11, 'Dlf', 'dlf', 'builders/2025/01/1735709425-10.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-05 05:30:25', '2025-06-18 08:34:13', 0, 0, 0),
(12, 'Elan', 'elan', 'builders/2025/01/1735709443-11.png', NULL, 1, '2025-06-05 05:30:55', '2025-06-18 08:34:26', 0, 0, 0),
(13, 'Smart Word', 'smart-word', 'builders/2025/01/1735709460-12.png', NULL, 1, '2025-06-05 05:31:00', '2025-06-18 08:34:43', 0, 0, 0),
(15, 'Signature Global', 'signature-global', 'builders/2025/01/1738310329-new-project-58.png', '<p><span style=\"font-weight: 400;\">Signature Global is a name that stands for quality, trust, and a commitment to excellence in the real estate sector. With a strong foundation built on over two decades of experience, Signature Global has carved a niche for itself as a developer that truly understands the needs and aspirations of modern homebuyers. The company&rsquo;s focus is not just on constructing buildings, but on creating living spaces that enhance the lifestyle of their residents.</span></p>\r\n<p><span style=\"font-weight: 400;\">Driven by a vision to provide affordable luxury, Signature Global has consistently delivered projects that combine quality construction, innovative design, and thoughtful amenities. The developer&rsquo;s portfolio spans residential, commercial, and mixed-use developments, with each project being a testament to their dedication to providing spaces that balance comfort, style, and practicality.</span></p>\r\n<p><span style=\"font-weight: 400;\">What sets Signature Global apart is its deep respect for the environment. The company places a strong emphasis on sustainability and green building practices, ensuring that every project is designed with not only the comfort of its residents in mind but also the well-being of the planet. Whether it\'s incorporating energy-efficient systems or designing layouts that blend harmoniously with nature, Signature Global is committed to creating homes that are as sustainable as they are beautiful.</span></p>', 1, '2025-06-05 07:58:49', '2025-06-18 08:34:55', 0, 0, 0),
(19, 'Subh Housing', 'subh-housing', 'builders/2025/06/1751265281-subh-housing-logo-purple.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget bibendum nisl. Nullam turpis magna, vulputate vel scelerisque in, euismod in nibh. Suspendisse sit amet urna ullamcorper, lobortis nibh sit amet, consequat purus. Mauris varius auctor nulla sit amet sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum felis eget viverra rhoncus. Morbi sit amet enim rutrum, tincidunt odio ac, volutpat lorem. Aenean diam erat, tempus sit amet nisi a, feugiat interdum leo. Sed dictum, sapien eu consequat dignissim, elit felis pharetra orci, at vestibulum neque urna sed orci. Aenean id sem ornare, accumsan enim commodo, eleifend mauris. Morbi mauris odio, efficitur a condimentum a, lobortis sed sapien. Quisque auctor mi vitae odio scelerisque maximus.</p>', 1, '2025-06-30 06:34:41', '2025-06-30 06:34:41', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `builder_city`
--

CREATE TABLE `builder_city` (
  `id` int(11) UNSIGNED NOT NULL,
  `builder_id` int(11) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `builder_city`
--

INSERT INTO `builder_city` (`id`, `builder_id`, `city_id`, `created_at`, `updated_at`) VALUES
(47, 2, 1, NULL, NULL),
(48, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `punchline` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `short_content` text DEFAULT NULL,
  `order_number` tinyint(255) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `slug`, `punchline`, `main_image`, `short_content`, `order_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gurgaon', 'gurgaon', 'Luxury Properties in Gurgaon', 'cities/2025/06/1750093556-gurgaon.webp', 'Luxury Properties in Gurgaon', 1, 1, '2025-06-05 17:05:56', '2025-07-05 23:46:36'),
(2, 'Delhi', 'delhi', 'Luxury Properties in Delhi', 'cities/2025/06/1750095907-delhi.webp', 'Luxury Properties in Delhi', 2, 1, '2025-06-05 17:45:08', '2025-07-05 23:46:37'),
(3, 'Bangalore', 'bangalore', 'Luxury Properties in Bangalore', 'cities/2025/06/1750096186-bangalore.webp', 'Luxury Properties in Bangalore', 3, 1, '2025-06-05 17:49:46', '2025-07-05 23:46:37'),
(4, 'Mumbai', 'mumbai', 'Luxury Properties in Mumbai', 'cities/2025/06/1750096235-mumbai.webp', 'Luxury Properties in Mumbai', 4, 1, '2025-06-05 17:50:35', '2025-07-05 23:46:38'),
(5, 'Hyderabad', 'hyderabad', 'Luxury Properties in Hyderabad', 'cities/2025/06/1750096345-hyderabad.webp', 'Luxury Properties in Hyderabad', 5, 1, '2025-06-05 17:52:25', '2025-07-05 23:46:39'),
(6, 'Dubai', 'dubai', 'Luxury Properties in Dubai', 'cities/2025/06/1750096389-dubai.webp', 'Luxury Properties in Dubai', 6, 1, '2025-06-05 17:53:09', '2025-07-05 23:46:41'),
(7, 'Himachal Pradesh', 'himachal-pradesh', 'Luxury Properties in Himachal Pradesh', 'cities/2025/06/1750096429-himachal-pradesh.webp', 'Luxury Properties in Himachal Pradesh', 7, 1, '2025-06-05 17:53:49', '2025-07-05 23:46:42'),
(8, 'Panchkula', 'panchkula', 'Luxury Properties in Panchkula', 'cities/2025/06/1750096468-panchkula.webp', 'Luxury Properties in Panchkula', 8, 1, '2025-06-05 17:54:28', '2025-07-05 23:46:43'),
(9, 'Goa', 'goa', 'Luxury Properties in Goa', 'cities/2025/06/1750096504-goa.webp', 'Luxury Properties in Goa', 9, 1, '2025-06-16 17:55:04', '2025-07-05 23:46:44'),
(10, 'Pune', 'pune', 'Luxury Properties in Pune', 'cities/2025/06/1750096541-pune.webp', 'Luxury Properties in Pune', 10, 1, '2025-06-05 17:55:41', '2025-07-05 23:46:45'),
(11, 'Noida', 'noida', 'Luxury Properties in Noida', 'cities/2025/06/1750096577-noida.webp', 'Luxury Properties in Noida', 11, 1, '2025-06-05 17:56:17', '2025-06-18 11:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `countryCode` varchar(255) DEFAULT NULL,
  `property_name` text DEFAULT NULL,
  `budget_range` varchar(255) DEFAULT NULL,
  `page_url` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `type`, `fname`, `lname`, `name`, `email`, `mobile`, `countryCode`, `property_name`, `budget_range`, `page_url`, `message`, `created_at`, `updated_at`) VALUES
(41, 'blog', NULL, NULL, 'ARYA', 'info@luxurhomez.in', '0987654321', '+91', NULL, NULL, 'https://luxuryhomez.sgpsspn.com/blog/here-are-five-compelling-reasons-why-2025-is-the-right-time-to-invest-in-luxury-real-estate', 'TEST MAIL', '2025-07-01 19:27:38', '2025-07-01 19:27:38'),
(42, 'contact', NULL, NULL, 'Testing', 'testing@gmail.com', '123456789', NULL, NULL, '₹ 50 Lac to ₹ 80 Lac', 'https://luxuryhomez.sgpsspn.com/contact-us', 'Testing', '2025-07-06 10:08:25', '2025-07-06 10:08:25'),
(43, 'contact', NULL, NULL, 'Heena Khan', 'testing@gmail.com', '1231234567', NULL, NULL, 'Under ₹ 50 Lac', 'https://luxuryhomez.com/contact-us', 'ccc', '2025-07-08 05:53:39', '2025-07-08 05:53:39');

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
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `blog_id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, 'What are the amenities included in the project?', 'The project features a luxury clubhouse, rooftop infinity pool, fully equipped gym, yoga deck, indoor games room, co-working spaces, landscaped gardens, and a 24x7 concierge service.', 'active', '2025-06-18 06:11:49', '2025-06-18 06:15:57'),
(2, 17, 'Is the property RERA registered?', 'Yes, this project is RERA registered under registration number HRERA-GGM-2024-00567, ensuring transparency and timely possession as per government norms.', 'active', '2025-06-18 06:15:08', '2025-06-18 06:15:57'),
(3, 17, 'What is the payment plan and booking amount?', 'We offer flexible payment plans including CLP, PLP, and subvention schemes. The booking amount starts from ₹2 Lakhs, with milestone-based payments throughout the construction period.', 'active', '2025-06-18 06:15:08', '2025-06-18 06:15:57'),
(4, 17, 'How far is the project from major landmarks?', 'The project is just 10 minutes from the airport, 5 minutes from NH-48, and walking distance to top international schools, hospitals, and the nearest metro station.', 'active', '2025-06-18 06:15:08', '2025-06-18 06:15:57'),
(5, 17, 'Are there any rental or resale options available?', 'Yes, our dedicated resale and rental team helps buyers lease or resell units with ease. The expected rental yield is around 4.5% annually, based on current market trends.', 'active', '2025-06-18 06:15:08', '2025-06-18 06:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `founders`
--

CREATE TABLE `founders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `founders`
--

INSERT INTO `founders` (`id`, `title`, `subtitle`, `description`, `name`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Founder\'s Desk', 'Penned by the visionary shaping stories of success.', '<p>At Simran Home Solution, our vision has always been to redefine the experience of buying and selling luxury homes. As the Director of this organization, I take immense pride in leading a team that shares a deep passion for quality, integrity, and personalized service.</p>\r\n<p>Over the years, we have established ourselves as a trusted name in the premium real estate segment of Gurugram and beyond. Our journey has been built on strong values, long-term relationships, and an unwavering commitment to excellence. We believe that every home we represent is more than just property&mdash;it\'s a lifestyle statement and a personal milestone for our clients.</p>\r\n<p>We understand that luxury is not just about price, but about experience, comfort, exclusivity, and trust. That is why we go the extra mile to ensure that every interaction with Simran Home Solution reflects our dedication to high standards and client satisfaction.</p>\r\n<p>As we continue to grow and adapt in an ever-evolving market, our core mission remains the same&mdash;to connect you with exceptional residences that match your aspirations.</p>\r\n<p>Thank you for placing your trust in us.</p>', 'Manish Gupta', 'Founder & Managing Director', 'amenities/2025/06/1751017806-founder.webp', '2025-06-19 08:37:07', '2025-06-27 09:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `home_statistics`
--

CREATE TABLE `home_statistics` (
  `id` int(11) NOT NULL,
  `icon_path` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `home_statistics`
--

INSERT INTO `home_statistics` (`id`, `icon_path`, `count`, `label`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/stat-icons/3d7ekHN27rwhq8qdLDZRGl4LJhTlqMKwBSwwJA75.svg', 150, 'Projects Listed', 1, '2025-06-23 06:21:51', '2025-06-23 06:43:11'),
(3, 'uploads/stat-icons/DVoFsvZfKfid4ocES0nuBx5UvfPLhVfn9odIHAjE.svg', 15, 'Years Industry Experience', 1, '2025-06-23 06:44:08', '2025-06-23 06:44:08'),
(4, 'uploads/stat-icons/A1zVURkMhJFCKjH9wYA2yK6eSGcS7KACPhZbQ5F1.svg', 780, 'Satisfied Customers', 1, '2025-06-23 06:44:53', '2025-06-23 06:44:53'),
(5, 'uploads/stat-icons/R3hE7cAUARu6RkMItCR3wD10eIAAUgF1URXXIDyI.svg', 100, 'Happiness Guaranteed', 1, '2025-06-23 06:45:50', '2025-06-23 06:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword_section_id` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `keyword_section_id`, `text`, `content`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(32, 7, 'Top Real Esate i Gurgoan', '<b>About Max Estate 36A</b>\r\nMax Estate Sector 36A Luxury Flats on Dwarka Expressway Gurgaon offers a luxurious and modern lifestyle in the heart of the city. These meticulously designed apartments provide a perfect blend of comfort, convenience, and style.\r\nKey Features:\r\n•	Prime Location: Strategically located in Sector 36A, Gurgaon, Max Estate offers easy access to major highways, schools, hospitals, and shopping centers.\r\n•	Spacious Apartments: The apartments are designed to provide ample living space, ensuring comfort and privacy.\r\n•	Modern Amenities: Residents can enjoy a wide range of amenities, including a clubhouse, swimming pool, gym, landscaped gardens, and a children\'s play area.\r\n•	High-Quality Construction: The apartments are built using the latest construction techniques and high-quality materials, ensuring durability and longevity.\r\n•	Investment Opportunity: Max Estate Sector 36A is a great investment opportunity, offering a combination of luxurious living and potential appreciation in property value.\r\nWhy Choose Max Estate Sector 36A Luxury Flats?\r\n•	Convenient Location: Enjoy the benefits of living in a prime location with easy access to everything you need.\r\n•	Modern Lifestyle: Experience the comfort and convenience of modern living with spacious apartments and state-of-the-art amenities.\r\n•	Investment Potential: Benefit from the increasing property values in Gurgaon and the surrounding areas.\r\n•	Reputed Developer: Max Estate is a renowned developer with a proven track record of delivering quality projects.\r\nExperience the epitome of luxury living at Max Estate Sector 36A Luxury Flats on Dwarka Expressway Gurgaon.', 'top-real-esate-i-gurgoan', 1, '2025-07-01 10:33:48', '2025-07-06 09:58:23'),
(33, 7, 'Top Real Esate in Noida', NULL, 'top-real-esate-in-noida', 1, '2025-07-01 10:33:48', '2025-07-01 10:33:48'),
(34, 7, 'Top Real || Esate in Delhi', NULL, 'top-real-esate-in-delhi', 1, '2025-07-01 10:33:48', '2025-07-04 18:48:16'),
(35, 8, 'Testing In || Noida', 'Testing Testing In || Noida', 'testing-in-noida', 1, '2025-07-05 00:27:25', '2025-07-05 00:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `keyword_property`
--

CREATE TABLE `keyword_property` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keyword_property`
--

INSERT INTO `keyword_property` (`id`, `keyword_id`, `property_id`, `created_at`, `updated_at`) VALUES
(17, 32, 49, NULL, NULL),
(18, 32, 50, NULL, NULL),
(19, 33, 49, NULL, NULL),
(20, 33, 50, NULL, NULL),
(21, 34, 49, NULL, NULL),
(23, 35, 49, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keyword_sections`
--

CREATE TABLE `keyword_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `keyword_sections`
--

INSERT INTO `keyword_sections` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Top Real Esate', 1, '2025-07-01 10:33:48', '2025-07-06 10:05:14'),
(8, 'Testing', 1, '2025-07-05 00:27:25', '2025-07-05 00:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `kfaqs`
--

CREATE TABLE `kfaqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kfaqs`
--

INSERT INTO `kfaqs` (`id`, `keyword_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 32, 'Is the property RERA registered?', 'Yes, this project is RERA registered under registration number HRERA-GGM-2024-00567, ensuring transparency and timely possession as per government norms.', '2025-07-05 01:45:09', '2025-07-05 01:47:01'),
(2, 32, 'What are the amenities included in the project?', 'The project features a luxury clubhouse, rooftop infinity pool, fully equipped gym, yoga deck, indoor games room, co-working spaces, landscaped gardens, and a 24x7 concierge service.', '2025-07-05 01:45:47', '2025-07-05 01:46:29'),
(3, 32, 'What is the payment plan and booking amount?', 'We offer flexible payment plans including CLP, PLP, and subvention schemes. The booking amount starts from ₹2 Lakhs, with milestone-based payments throughout the construction period.', '2025-07-05 01:47:53', '2025-07-05 01:47:53');

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
(5, '2024_06_11_064527_add_is_admin_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@example.com', '$2y$12$9qkt.6KCXrsjj/892nfRT.GCRB2dgtMmuAxTI9X/V9Hlq0CkIRN4.', '2024-06-11 06:51:34');

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
-- Table structure for table `pfaqs`
--

CREATE TABLE `pfaqs` (
  `id` int(11) UNSIGNED NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pfaqs`
--

INSERT INTO `pfaqs` (`id`, `property_id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(2, 49, 'Q. What are the amenities included in the project?', 'The project features a luxury clubhouse, rooftop infinity pool, fully equipped gym, yoga deck, indoor games room, co-working spaces, landscaped gardens, and a 24x7 concierge service.', 'active', '2025-06-21 06:54:29', '2025-07-01 18:51:52'),
(4, 49, 'Q. What are the amenities included in the project?', 'The project features a luxury clubhouse, rooftop infinity pool, fully equipped gym, yoga deck, indoor games room, co-working spaces, landscaped gardens, and a 24x7 concierge service.', 'active', '2025-07-01 06:18:26', '2025-07-01 18:51:52'),
(5, 50, 'Testing', 'Testing', 'active', '2025-07-01 07:44:28', '2025-07-01 07:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `property_type` varchar(500) DEFAULT NULL,
  `property_sub_type` varchar(255) DEFAULT NULL,
  `property_status` varchar(500) DEFAULT NULL,
  `main_image` varchar(500) DEFAULT NULL,
  `banner_image` varchar(500) DEFAULT NULL,
  `about_image` varchar(500) DEFAULT NULL,
  `about_content` text DEFAULT NULL,
  `about_heading` varchar(255) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `property_city_wise` varchar(255) DEFAULT NULL,
  `price` varchar(500) DEFAULT NULL,
  `brochure` text DEFAULT NULL,
  `unit_size` varchar(255) DEFAULT NULL,
  `configuration` varchar(255) DEFAULT NULL,
  `highlights_content` text DEFAULT NULL,
  `highlights_img` varchar(500) DEFAULT NULL,
  `highlights_heading` varchar(255) DEFAULT NULL,
  `direction_link` varchar(255) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sequence` int(11) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `schema_seo` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `builder_id` int(10) UNSIGNED DEFAULT NULL,
  `is_trending_project` varchar(3) DEFAULT 'No',
  `is_featured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `heading`, `slug`, `property_type`, `property_sub_type`, `property_status`, `main_image`, `banner_image`, `about_image`, `about_content`, `about_heading`, `location`, `property_city_wise`, `price`, `brochure`, `unit_size`, `configuration`, `highlights_content`, `highlights_img`, `highlights_heading`, `direction_link`, `map`, `status`, `sequence`, `meta_title`, `meta_keywords`, `meta_description`, `schema_seo`, `created_at`, `updated_at`, `builder_id`, `is_trending_project`, `is_featured`) VALUES
(49, 'Whiteland The urban resorts', 'whiteland-the-urban-resorts', 'residential', 'luxury', 'under-construction', 'properties/2025/06/1750235884-blog.jpg', 'properties/2025/06/1750235884-blog.jpg', 'properties/2025/07/1751781297-tab-img.jpg', '<div class=\"ar-left-col ar-propt-pd0\"><span id=\"ar-read-func-preview\" class=\"ar-read-func-text ar-read-func-wrapper\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</span></div>\r\n<div class=\"ar-right-col\">\r\n<div class=\"ar-image-wrapper\">&nbsp;</div>\r\n<div class=\"ar-image-wrapper\">&nbsp;</div>\r\n<div class=\"ar-image-wrapper\">\r\n<div class=\"ar-left-col ar-propt-pd0\"><span id=\"ar-read-func-preview\" class=\"ar-read-func-text ar-read-func-wrapper\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</span></div>\r\n<div class=\"ar-right-col\">\r\n<div class=\"ar-image-wrapper\">&nbsp;</div>\r\n<div class=\"ar-image-wrapper\">&nbsp;</div>\r\n<div class=\"ar-image-wrapper\">\r\n<div class=\"ar-left-col ar-propt-pd0\"><span id=\"ar-read-func-preview\" class=\"ar-read-func-text ar-read-func-wrapper\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</span></div>\r\n<div class=\"ar-right-col\">\r\n<div class=\"ar-image-wrapper\">&nbsp;</div>\r\n<div class=\"ar-image-wrapper\">\r\n<div class=\"ar-left-col ar-propt-pd0\"><span id=\"ar-read-func-preview\" class=\"ar-read-func-text ar-read-func-wrapper\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</span></div>\r\n<div class=\"ar-right-col\">\r\n<div class=\"ar-image-wrapper\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'Experience Modern living in Trump Towers launch with spacious & luxurious apartments', 'rrr', 'gurgaon', '4 cr', 'properties/2025/06/1750497914-dummy.pdf', '1250 sq.ft.', '4 bhk', '<p class=\"ar-description\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"ar-propt-li\">\r\n<div class=\"ar-cpoint d-flex\"><img src=\"https://lhresp.golfhills.in/assets/icon/check-circle.svg\" alt=\"\" />\r\n<h6>51 floors with entrance lobby of sculpturally refined architecture</h6>\r\n</div>\r\n<div class=\"ar-cpoint d-flex\"><img src=\"https://lhresp.golfhills.in/assets/icon/check-circle.svg\" alt=\"\" />\r\n<h6>Amongst the tallest towers in the region</h6>\r\n</div>\r\n<div class=\"ar-cpoint d-flex\"><img src=\"https://lhresp.golfhills.in/assets/icon/check-circle.svg\" alt=\"\" />\r\n<h6>Three-side walls of glass offer sweeping views of City</h6>\r\n</div>\r\n<div class=\"ar-cpoint d-flex\"><img src=\"https://lhresp.golfhills.in/assets/icon/check-circle.svg\" alt=\"\" />\r\n<h6>22 feet double height living room</h6>\r\n</div>\r\n<div class=\"ar-cpoint d-flex\"><img src=\"https://lhresp.golfhills.in/assets/icon/check-circle.svg\" alt=\"\" />\r\n<h6>Private elevator opens directly into your residence</h6>\r\n</div>\r\n<div class=\"ar-cpoint d-flex\"><img src=\"https://lhresp.golfhills.in/assets/icon/check-circle.svg\" alt=\"\" />\r\n<h6>22 feet double height living room</h6>\r\n</div>\r\n<div class=\"ar-cpoint d-flex\"><img src=\"https://lhresp.golfhills.in/assets/icon/check-circle.svg\" alt=\"\" />\r\n<h6>Private elevator opens directly into your residence</h6>\r\n</div>\r\n</div>', 'properties/2025/06/1750235884-blog.jpg', 'Highlights Heading', 'rr', 'rr', 1, 2, 'rrd', 'rr', 'rr', 'schema_seo', '2025-06-18 08:38:04', '2025-07-06 10:51:37', 2, '1', 1),
(50, 'Silvglades 59', 'silvglades-59', 'residential', 'luxury', 'new-launch', 'properties/2025/07/1751355867-blog.jpg', 'properties/2025/07/1751355868-blog.jpg', 'properties/2025/07/1751355868-blog.jpg', '<p>Testing</p>', 'Testing', 'Testing', 'gurgaon', 'on request', 'properties/2025/07/1751355868-dummy.pdf', '2000 sq.ft', '2 bhk', '<p>Testing</p>', 'properties/2025/07/1751355868-blog.jpg', 'Testing', 'Testing', 'Testing', 1, 1, 'Testing', 'Testing', 'Testing', 'schema_seo', '2025-07-01 07:44:28', '2025-07-06 10:51:37', 3, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_amenity`
--

CREATE TABLE `property_amenity` (
  `id` int(11) NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `amenity_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_amenity`
--

INSERT INTO `property_amenity` (`id`, `property_id`, `amenity_id`, `created_at`, `updated_at`) VALUES
(198, 49, 23, NULL, NULL),
(199, 49, 16, NULL, NULL),
(200, 49, 21, NULL, NULL),
(201, 49, 18, NULL, NULL),
(202, 50, 23, NULL, NULL),
(203, 50, 16, NULL, NULL),
(204, 50, 22, NULL, NULL),
(205, 50, 19, NULL, NULL),
(206, 50, 17, NULL, NULL),
(207, 49, 22, NULL, NULL),
(208, 49, 19, NULL, NULL),
(209, 49, 20, NULL, NULL),
(210, 49, 17, NULL, NULL),
(211, 49, 24, NULL, NULL),
(212, 49, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_floor_plans`
--

CREATE TABLE `property_floor_plans` (
  `id` int(11) NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_floor_plans`
--

INSERT INTO `property_floor_plans` (`id`, `property_id`, `name`, `size`, `type`, `image`, `created_at`, `updated_at`) VALUES
(101, 49, 'Floor 1', '1250 sq.ft', '4BHK', 'properties/2025/06/1750497030-blog.jpg', '2025-06-21 09:05:11', '2025-07-01 06:17:27'),
(102, 49, 'Floor 2', '1350 sq.ft', '1BHK', 'properties/2025/06/1750497078-blog.jpg', '2025-06-21 09:05:11', '2025-06-21 09:11:18'),
(105, 50, 'Testing', 'Testing', '1BHK', 'properties/2025/07/1751355868-blog.jpg', '2025-07-01 07:44:28', '2025-07-01 07:44:28'),
(106, 49, 'Full Layout', '1450 sq.ft', '2BHK', 'properties/2025/07/1751783970-s2.jpg', '2025-07-06 06:39:30', '2025-07-06 06:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `property_galleries`
--

CREATE TABLE `property_galleries` (
  `id` int(11) NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_galleries`
--

INSERT INTO `property_galleries` (`id`, `property_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(58, 50, 'Testing', 'properties/2025/07/1751355868-blog.jpg', '2025-07-01 07:44:28', '2025-07-01 07:44:28'),
(59, 49, 'Testing', 'properties/2025/07/1751395681-responsible-woman-protective-mask-working-restaurant-386167-10425.jpg', '2025-07-01 18:45:36', '2025-07-01 18:48:01'),
(60, 49, 'gggg', 'properties/2025/07/1751395743-african-woman-harvesting-vegetables-23-2151441194.jpg', '2025-07-01 18:49:03', '2025-07-01 18:49:03'),
(61, 49, 'ccc', 'properties/2025/07/1751784292-s5.jpg', '2025-07-06 06:44:52', '2025-07-06 06:44:52'),
(62, 49, 'ff', 'properties/2025/07/1751784328-s4.jpg', '2025-07-06 06:45:28', '2025-07-06 06:45:28'),
(63, 49, 'ss', 'properties/2025/07/1751784328-s5.jpg', '2025-07-06 06:45:28', '2025-07-06 06:45:28'),
(64, 49, 'ddd', 'properties/2025/07/1751784368-core-bg.jpg', '2025-07-06 06:46:08', '2025-07-06 06:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `property_location_advantages`
--

CREATE TABLE `property_location_advantages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `distance` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_location_advantages`
--

INSERT INTO `property_location_advantages` (`id`, `property_id`, `name`, `distance`, `type`, `created_at`, `updated_at`) VALUES
(1, 49, 'jjj', '20', 'Education', '2025-06-23 20:39:44', '2025-06-23 20:54:32'),
(2, 49, 'jjj', 'kkk', 'Education', '2025-06-23 20:40:10', '2025-06-23 20:54:32'),
(3, 49, 'fff', '50', 'Education', '2025-07-01 06:16:02', '2025-07-01 06:16:34'),
(4, 50, 'Testing', 'Testing', 'Education', '2025-07-01 07:44:28', '2025-07-01 07:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `property_prices`
--

CREATE TABLE `property_prices` (
  `id` int(11) NOT NULL,
  `property_id` int(11) UNSIGNED NOT NULL,
  `unit_type` varchar(255) NOT NULL,
  `unit_size` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_prices`
--

INSERT INTO `property_prices` (`id`, `property_id`, `unit_type`, `unit_size`, `price`, `created_at`, `updated_at`) VALUES
(180, 50, 'Testing', 'Testing', 'Testing', '2025-07-06 00:49:04', '2025-07-06 00:49:04'),
(225, 49, '5 BHK Apartments', '9400 Sq. Ft.', 'On Request', '2025-07-06 10:32:51', '2025-07-06 10:32:51'),
(226, 49, '4 BHK Apartments', '8400 Sq. Ft.', 'On Request', '2025-07-06 10:32:51', '2025-07-06 10:32:51'),
(227, 49, '3 BHK Apartments', '7400 Sq. Ft.', 'On Request', '2025-07-06 10:32:51', '2025-07-06 10:32:51'),
(228, 49, '1 BHK Apartments', '7400 Sq. Ft.', 'On Request', '2025-07-06 10:32:51', '2025-07-06 10:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `property_sub_types`
--

CREATE TABLE `property_sub_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `psubtype_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `order_number` int(11) DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property_sub_types`
--

INSERT INTO `property_sub_types` (`id`, `psubtype_name`, `slug`, `main_image`, `order_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Luxury', 'luxury', '1750655707_luxury.webp', 1, 1, '2025-06-23 05:15:07', '2025-07-06 09:24:25'),
(2, 'Ultra Luxury', 'ultra-luxury', '1750655965_Ultra Luxury.webp', 2, 1, '2025-06-23 05:19:25', '2025-07-01 18:05:47'),
(3, 'Super Luxury', 'super-luxury', '1750656100_Premium.webp', 2, 1, '2025-06-23 05:21:40', '2025-07-01 18:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` text DEFAULT NULL,
  `contact_page_logo` text DEFAULT NULL,
  `contact_sec1_heading` text DEFAULT NULL,
  `contact_sec2_heading` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `map_embed_code` text DEFAULT NULL,
  `direction_link` text DEFAULT NULL,
  `social_facebook` text DEFAULT NULL,
  `social_instagram` text DEFAULT NULL,
  `social_whatsapp` varchar(20) DEFAULT NULL,
  `social_linkedin` text DEFAULT NULL,
  `social_twitter` text DEFAULT NULL,
  `footer_about` text DEFAULT NULL,
  `footer_disclaimer` text DEFAULT NULL,
  `copyright` text DEFAULT NULL,
  `rera_haryana` text DEFAULT NULL,
  `rera_karnataka` text DEFAULT NULL,
  `rera_himachal` text DEFAULT NULL,
  `rera_delhi` text DEFAULT NULL,
  `rera_up` text DEFAULT NULL,
  `rera_maharashtra` text DEFAULT NULL,
  `rera_goa` text DEFAULT NULL,
  `rera_tamilnadu` text DEFAULT NULL,
  `rera_telangana` text DEFAULT NULL,
  `rera_andhra_pradesh` text DEFAULT NULL,
  `rera_arunachal_pradesh` text DEFAULT NULL,
  `rera_assam` text DEFAULT NULL,
  `rera_bihar` text DEFAULT NULL,
  `rera_chhattisgarh` text DEFAULT NULL,
  `rera_gujarat` text DEFAULT NULL,
  `rera_himachal_pradesh` text DEFAULT NULL,
  `rera_jharkhand` text DEFAULT NULL,
  `rera_kerala` text DEFAULT NULL,
  `rera_madhya_pradesh` text DEFAULT NULL,
  `rera_manipur` text DEFAULT NULL,
  `rera_meghalaya` text DEFAULT NULL,
  `rera_mizoram` text DEFAULT NULL,
  `rera_nagaland` text DEFAULT NULL,
  `rera_odisha` text DEFAULT NULL,
  `rera_punjab` text DEFAULT NULL,
  `rera_rajasthan` text DEFAULT NULL,
  `rera_sikkim` text DEFAULT NULL,
  `rera_tamil_nadu` text DEFAULT NULL,
  `rera_tripura` text DEFAULT NULL,
  `rera_uttar_pradesh` text DEFAULT NULL,
  `rera_uttarakhand` text DEFAULT NULL,
  `rera_west_bengal` text DEFAULT NULL,
  `rera_andaman_and_nicobar_islands` text DEFAULT NULL,
  `rera_chandigarh` text DEFAULT NULL,
  `rera_dadra_and_nagar_haveli_and_daman_and_diu` text DEFAULT NULL,
  `rera_jammu_and_kashmir` text DEFAULT NULL,
  `rera_ladakh` text DEFAULT NULL,
  `rera_lakshadweep` text DEFAULT NULL,
  `rera_puducherry` text DEFAULT NULL,
  `home_sec1_heading` text DEFAULT NULL,
  `home_sec1_paragraph` text DEFAULT NULL,
  `home_sec2_heading` text DEFAULT NULL,
  `home_sec2_paragraph` text DEFAULT NULL,
  `home_sec3_heading` text DEFAULT NULL,
  `home_sec4_heading` text DEFAULT NULL,
  `home_sec4_paragraph` text DEFAULT NULL,
  `home_sec5_heading` text DEFAULT NULL,
  `home_sec5_paragraph` text DEFAULT NULL,
  `home_sec5_link` text DEFAULT NULL,
  `home_sec6_heading` text DEFAULT NULL,
  `home_sec6_paragraph` text DEFAULT NULL,
  `home_sec7_heading` text DEFAULT NULL,
  `home_sec7_paragraph` text DEFAULT NULL,
  `home_sec8_heading` text DEFAULT NULL,
  `home_sec8_paragraph` text DEFAULT NULL,
  `home_sec9_heading` text DEFAULT NULL,
  `home_sec9_paragraph` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `locationPFSheading` varchar(255) DEFAULT NULL,
  `locationPFSparagraph` text DEFAULT NULL,
  `locationPFSsubparagraph` text DEFAULT NULL,
  `pamentiesparagraph` text DEFAULT NULL,
  `ppricelistparagraph` text DEFAULT NULL,
  `pfloorplanparagraph` text DEFAULT NULL,
  `pgalleryparagraph` text DEFAULT NULL,
  `padvantageparagraph` text DEFAULT NULL,
  `pstrip1heading` varchar(255) DEFAULT NULL,
  `pstrip2heading` varchar(255) DEFAULT NULL,
  `pstrip1paragraph` text DEFAULT NULL,
  `pstrip2paragraph` text DEFAULT NULL,
  `pfaqheading` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `contact_page_logo`, `contact_sec1_heading`, `contact_sec2_heading`, `email`, `contact_number`, `address`, `map_embed_code`, `direction_link`, `social_facebook`, `social_instagram`, `social_whatsapp`, `social_linkedin`, `social_twitter`, `footer_about`, `footer_disclaimer`, `copyright`, `rera_haryana`, `rera_karnataka`, `rera_himachal`, `rera_delhi`, `rera_up`, `rera_maharashtra`, `rera_goa`, `rera_tamilnadu`, `rera_telangana`, `rera_andhra_pradesh`, `rera_arunachal_pradesh`, `rera_assam`, `rera_bihar`, `rera_chhattisgarh`, `rera_gujarat`, `rera_himachal_pradesh`, `rera_jharkhand`, `rera_kerala`, `rera_madhya_pradesh`, `rera_manipur`, `rera_meghalaya`, `rera_mizoram`, `rera_nagaland`, `rera_odisha`, `rera_punjab`, `rera_rajasthan`, `rera_sikkim`, `rera_tamil_nadu`, `rera_tripura`, `rera_uttar_pradesh`, `rera_uttarakhand`, `rera_west_bengal`, `rera_andaman_and_nicobar_islands`, `rera_chandigarh`, `rera_dadra_and_nagar_haveli_and_daman_and_diu`, `rera_jammu_and_kashmir`, `rera_ladakh`, `rera_lakshadweep`, `rera_puducherry`, `home_sec1_heading`, `home_sec1_paragraph`, `home_sec2_heading`, `home_sec2_paragraph`, `home_sec3_heading`, `home_sec4_heading`, `home_sec4_paragraph`, `home_sec5_heading`, `home_sec5_paragraph`, `home_sec5_link`, `home_sec6_heading`, `home_sec6_paragraph`, `home_sec7_heading`, `home_sec7_paragraph`, `home_sec8_heading`, `home_sec8_paragraph`, `home_sec9_heading`, `home_sec9_paragraph`, `created_at`, `updated_at`, `locationPFSheading`, `locationPFSparagraph`, `locationPFSsubparagraph`, `pamentiesparagraph`, `ppricelistparagraph`, `pfloorplanparagraph`, `pgalleryparagraph`, `padvantageparagraph`, `pstrip1heading`, `pstrip2heading`, `pstrip1paragraph`, `pstrip2paragraph`, `pfaqheading`) VALUES
(1, 'settings/2025/06/1751187699-main_logo.png', 'settings/2025/06/1751193184-logo.png', 'Let’s Start a || Conversation', 'Ready to Build Your <br>  Dream Home?', 'info@luxurhomez.in', '+91 9876 543 210', 'Unit No 518-19, Tower B4, Spaze 1- Tech park, sector 49, Sohna Road, Gurgaon', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d205562.42365611845!2d76.990081!3d28.422601000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19d582e38859%3A0x2cf5fe8e5c64b1e!2sGurugram%2C%20Haryana!5e1!3m2!1sen!2sin!4v1751190777843!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://maps.app.goo.gl/8J3qiR8K9VRXjRNH9', '#', '#', '919876543210', '#', '#', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam enim vitae sequi. Error dicta eos ipsum similique voluptatem natus velit possimus odio', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam enim vitae sequi. Error dicta eos ipsum similique voluptatem natus velit possimus odio', '© Copyright Simran Home Solution All Rights Reserved.', 'GGM/128/2017/IR/177/EXT1/2022/8', 'GGM/128/2017/IR/177/EXT1/2022/8', 'GGM/128/2017/IR/177/EXT1/2022/8', 'GGM/128/2017/IR/177/EXT1/2022/8', 'GGM/128/2017/IR/177/EXT1/2022/8', NULL, 'GGM/128/2017/IR/177/EXT1/2022/8', 'GGM/128/2017/IR/177/EXT1/2022/8', 'GGM/128/2017/IR/177/EXT1/2022/8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GGM/128/2017/IR/177/EXT1/2022/8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Curated Collaborations, ||  Unmatched Quality', 'Luxury Homes partners with top-tier developers gloabally. Together, we bring you properties that embody luxury, prestige, and opprotunity.', 'Exclusive Homes Dessigned for ||  Discerning tastes', 'Discover a curated collection of luxury, ultra luxury, and premium residences. Each space is meticulously crafted to match your elevated lifestyle and standards.', 'Your trusted experts in || Premium real estate', 'Discover your || Space', 'Browse our most sought-after listings loved by clients and investors alike. Each one is a symbol of class, comfort, and lifestyle.', 'Find your perfect property', 'Looking for your perfect luxury space? Connect with our experts and explore homes tailored to your aspirations.', '#', 'Explore property || types', 'Whether you\'re looking for residential comfort, commercial growth, or SCO plots investments, our collection brings you the finest opportunities in every category.', 'Luxury homes, || global vision', 'Our reach extends across premium markets, offering clients international property options with seamless service and local expertise.', 'client || testimonials', 'Real feedback from clients who trusted us with their most important decisions. Their stories reflect the integrity and service Luxury Homes is known for.', 'our || blogs', 'Stay ahead with property trends, buying tips, and lifestyle updates. Explore our blogs for everything you need to know about luxury real estate.', NULL, '2025-07-06 03:28:49', 'Premium Properties || Prime Locations', 'DLF takes immense pride in upholding unwavering integrity in customer engagement and ensuring the highest standards of quality assurance. With a remarkable legacy spanning 75 years, our core mission remains centred around delivering real estate development, management, and investment services of the utmost excellence.\r\n\r\nEstablished in 1946 by Chaudhary Raghvendra Singh, DLF embarked on its journey by creating 22 urban colonies in Delhi. In a bold move in 1985, we expanded into the then-undeveloped region of Gurugram, pioneering exceptional living and working spaces for the emerging Indian global professionals. Presently, DLF stands as the largest publicly listed real estate company in India, with a strong presence in 15 states and 24 cities, offering retail, commercial, and residential properties.\r\n\r\nOur diverse verticals reflect our commitment to developing holistic ecosystems that cater to India\'s evolving needs. However, at the heart of our success lies our dedicated employees, valued customers, trusted stakeholders, and esteemed shareholders. We prioritise investment in spearheading innovation by fostering empowerment and embracing optimism, with the goal of building a future for India that builds upon the rich legacy of our past.', 'DLF takes immense pride in upholding unwavering integrity in customer engagement and ensuring the highest standards of quality assurance.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'Connect for best Price', 'Make an Appointment', 'Looking for your perfect luxury space? Connect with our experts and explore homes tailored to your aspirations.', 'Looking for your perfect luxury space? Connect with our experts and explore homes tailored to your aspirations.', 'Frequently Asked Questions');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `star` tinyint(1) DEFAULT 5,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `position`, `message`, `star`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Atul Kumar', 'Web Developer', 'Simran Home Solution made my dream of owning a modern, luxurious home come true. From the first showing to closing the deal, their professionalism and attention to detail were unmatched. I couldn’t be happier!', 3, 1, '2025-06-05 20:31:46', '2025-07-05 06:42:34'),
(2, 'Mohan Pal', 'Web Developer', 'Simran Home Solution made my dream of owning a modern, luxurious home come true. From the first showing to closing the deal, their professionalism and attention to detail were unmatched. I couldn’t be happier!', 5, 1, '2025-06-05 20:33:25', '2025-06-18 02:16:03'),
(3, 'Raman Mishra', 'Web Developer', 'Simran Home Solution made my dream of owning a modern, luxurious home come true. From the first showing to closing the deal, their professionalism and attention to detail were unmatched. I couldn’t be happier!', 5, 1, '2025-06-05 20:34:03', '2025-06-18 02:16:14'),
(4, 'Rohit Sharma', 'Web Developer', 'Simran Home Solution made my dream of owning a modern, luxurious home come true. From the first showing to closing the deal, their professionalism and attention to detail were unmatched. I couldn’t be happier!', 5, 1, '2025-06-05 20:34:33', '2025-06-18 02:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'admin@luxuryhomez.com', NULL, '$2y$12$vTgZpwsskfVHWNHo1BayAuajXFLUZYSMbaGFSvj9tYLa4V/YJGcb6', 'tp00vFbR7RrVLpwU7GFHy1vV3szcFw9ayPX9qC8dHtNwkJihxdmAKOIp1EHR', '2024-06-11 02:13:43', '2025-03-05 01:07:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vision_mission_strengths`
--

CREATE TABLE `vision_mission_strengths` (
  `id` int(11) NOT NULL,
  `visionTitle` varchar(255) DEFAULT NULL,
  `missionTitle` varchar(255) DEFAULT NULL,
  `strengthTitle` varchar(255) DEFAULT NULL,
  `visionDescription` text DEFAULT NULL,
  `missionDescription` text DEFAULT NULL,
  `strengthDescription` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vision_mission_strengths`
--

INSERT INTO `vision_mission_strengths` (`id`, `visionTitle`, `missionTitle`, `strengthTitle`, `visionDescription`, `missionDescription`, `strengthDescription`, `created_at`, `updated_at`) VALUES
(1, 'Create. Innovate. Enhance the future.', 'Success is a journey, not a destination.', 'Best shapes are created only by the best craftsmen.', '<p>To be India&rsquo;s most trusted and preferred name in luxury real estate &mdash; a brand synonymous with excellence, elegance, and exclusivity. We envision redefining the landscape of high-end living by offering meticulously curated properties that reflect timeless architecture, premium quality, and modern sophistication. Our goal is to create enduring value for our clients by consistently exceeding expectations and setting new benchmarks in luxury real estate.</p>\r\n<p>To deliver exceptional service, expert guidance, and unmatched value in luxury real estate, ensuring every client&rsquo;s experience is seamless, transparent, and truly rewarding. To deliver exceptional service, expert guidance, and unmatched value in luxury real estate, ensuring every client&rsquo;s experience is seamless, transparent, and truly rewarding. To deliver exceptional service, expert guidance, and unmatched value in luxury real estate, ensuring every client&rsquo;s experience is seamless, transparent, and truly rewarding.</p>', '<p>Our mission is to deliver an unmatched real estate experience characterized by exceptional service, expert guidance, and unwavering integrity. We strive to empower clients with accurate market insights, tailored property solutions, and seamless end-to-end support throughout their real estate journey. By maintaining a transparent and client-centric approach, we aim to foster long-term relationships, maximize value, and make every transaction a rewarding and memorable one.</p>\r\n<p>To be India&rsquo;s most trusted and preferred name in luxury real estate, connecting discerning clients with homes that define excellence, elegance, and exclusivity. To deliver exceptional service, expert guidance, and unmatched value in luxury real estate, ensuring every client&rsquo;s experience is seamless, transparent, and truly rewarding. To deliver exceptional service, expert guidance, and unmatched value in luxury real estate, ensuring every client&rsquo;s experience is seamless, transparent, and truly rewarding. To deliver exceptional service, expert guidance, and unmatched value in luxury real estate.</p>', '<p>Our strength is rooted in deep market intelligence, an exclusive portfolio of handpicked luxury properties, and a client-first philosophy that puts your needs at the heart of everything we do. With a seasoned team of real estate professionals, marketing strategists, and legal advisors, we ensure every deal is expertly handled from start to finish. Our robust network of developers, architects, and financial institutions further enhances our ability to offer bespoke solutions. Whether buying, selling, or investing, we translate property goals into exceptional outcomes &mdash; making us a trusted partner in your journey to luxury living.</p>\r\n<p>Our strength lies in our local market expertise, curated property portfolio, client-first approach, and strong network of industry partners. Backed by a dedicated team of real estate professionals, we turn property dreams into lasting success stories. lies in our local market expertise, curated property portfolio, client-first approach, and strong network of industry partners. Backed by a dedicated team of real estate professionals, we turn property dreams into lasting success stories.</p>', '2025-06-19 09:05:31', '2025-06-23 11:38:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banner_id` (`banner_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `builders`
--
ALTER TABLE `builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `builder_city`
--
ALTER TABLE `builder_city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_builder_city_builder` (`builder_id`),
  ADD KEY `fk_builder_city_city` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `founders`
--
ALTER TABLE `founders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_statistics`
--
ALTER TABLE `home_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `slug_2` (`slug`),
  ADD KEY `keyword_section_id` (`keyword_section_id`);

--
-- Indexes for table `keyword_property`
--
ALTER TABLE `keyword_property`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_keyword_property` (`keyword_id`,`property_id`),
  ADD KEY `fk_property` (`property_id`);

--
-- Indexes for table `keyword_sections`
--
ALTER TABLE `keyword_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kfaqs`
--
ALTER TABLE `kfaqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyword_id` (`keyword_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pfaqs`
--
ALTER TABLE `pfaqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pfaqs_ibfk_1` (`property_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_builder_property` (`builder_id`);

--
-- Indexes for table `property_amenity`
--
ALTER TABLE `property_amenity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `amenity_id` (`amenity_id`);

--
-- Indexes for table `property_floor_plans`
--
ALTER TABLE `property_floor_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `property_galleries`
--
ALTER TABLE `property_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `property_location_advantages`
--
ALTER TABLE `property_location_advantages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_prices`
--
ALTER TABLE `property_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_property_prices_property_id` (`property_id`);

--
-- Indexes for table `property_sub_types`
--
ALTER TABLE `property_sub_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `vision_mission_strengths`
--
ALTER TABLE `vision_mission_strengths`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `builders`
--
ALTER TABLE `builders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `builder_city`
--
ALTER TABLE `builder_city`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `founders`
--
ALTER TABLE `founders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_statistics`
--
ALTER TABLE `home_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `keyword_property`
--
ALTER TABLE `keyword_property`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `keyword_sections`
--
ALTER TABLE `keyword_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kfaqs`
--
ALTER TABLE `kfaqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pfaqs`
--
ALTER TABLE `pfaqs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `property_amenity`
--
ALTER TABLE `property_amenity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `property_floor_plans`
--
ALTER TABLE `property_floor_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `property_galleries`
--
ALTER TABLE `property_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `property_location_advantages`
--
ALTER TABLE `property_location_advantages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property_prices`
--
ALTER TABLE `property_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `property_sub_types`
--
ALTER TABLE `property_sub_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vision_mission_strengths`
--
ALTER TABLE `vision_mission_strengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD CONSTRAINT `banner_images_ibfk_1` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `builder_city`
--
ALTER TABLE `builder_city`
  ADD CONSTRAINT `fk_builder_city_builder` FOREIGN KEY (`builder_id`) REFERENCES `builders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_builder_city_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keywords`
--
ALTER TABLE `keywords`
  ADD CONSTRAINT `keywords_ibfk_1` FOREIGN KEY (`keyword_section_id`) REFERENCES `keyword_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keyword_property`
--
ALTER TABLE `keyword_property`
  ADD CONSTRAINT `fk_keyword` FOREIGN KEY (`keyword_id`) REFERENCES `keywords` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_property` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kfaqs`
--
ALTER TABLE `kfaqs`
  ADD CONSTRAINT `kfaqs_ibfk_1` FOREIGN KEY (`keyword_id`) REFERENCES `keywords` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pfaqs`
--
ALTER TABLE `pfaqs`
  ADD CONSTRAINT `pfaqs_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `fk_builder_property` FOREIGN KEY (`builder_id`) REFERENCES `builders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `property_amenity`
--
ALTER TABLE `property_amenity`
  ADD CONSTRAINT `property_amenity_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_amenity_ibfk_2` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_floor_plans`
--
ALTER TABLE `property_floor_plans`
  ADD CONSTRAINT `property_floor_plans_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_galleries`
--
ALTER TABLE `property_galleries`
  ADD CONSTRAINT `property_galleries_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_prices`
--
ALTER TABLE `property_prices`
  ADD CONSTRAINT `fk_property_prices_property_id` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
