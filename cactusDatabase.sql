-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2016 at 03:45 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cactusDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unknown',
  `summary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `url`, `author`, `summary`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'Space Law 101: An Introduction to Space Law', 'http://www.americanbar.org/groups/young_lawyers/publications/the_101_201_practice_series/space_law_101_an_introduction_to_space_law.html', 'Unknown', 'we', 1, 1, '2016-12-02 23:36:49', '2016-12-02 23:36:49'),
(2, 'Who Owns the Moon? | Space Law & Outer Space Treaties', 'http://www.space.com/33440-space-law.html', 'Unknown', 'Space Law', 1, 1, '2016-12-02 23:37:48', '2016-12-02 23:37:48'),
(3, 'Congress Questions Report on Benefits of Asteroid Redirect Mission', 'http://www.space.com/34860-congress-questions-report-on-benefits-of-asteroid-redirect-mission.html', 'Jeff Foust', 'Nasa', 1, 1, '2016-12-02 23:40:40', '2016-12-02 23:40:40'),
(4, 'Rosetta spacecraft is now orbiting a comet 249 million miles away', 'http://www.theverge.com/2014/8/6/5974145/rosetta-spacecraft-comet', 'Cassandra Khaw', 'The verge', 1, 1, '2016-12-02 23:42:56', '2016-12-02 23:42:56'),
(5, 'Great Barrier Reef is almost officially dead', 'http://www.independent.co.uk/news/world/australasia/great-barrier-reef-climate-change-australia-coral-bleaching-environment-a7360696.html', 'Charlotte England', 'reef', 1, 1, '2016-12-03 00:26:03', '2016-12-03 00:26:03'),
(6, 'Europe ministers debate space future - BBC News', 'http://www.bbc.com/news/science-environment-38177385', 'BBC News', 'Something about space', 3, 1, '2016-12-03 07:05:01', '2016-12-03 07:05:01'),
(7, 'Vivienne Tam’s Spring collection is the best NASA-inspired fashion yet', 'http://www.theverge.com/2016/9/16/12920912/vivienne-tam-nasa-nyfw-2016-spring-photos', 'Elizabeth Lopatto', 'dresses', 4, 1, '2016-12-03 22:12:41', '2016-12-03 22:12:41'),
(8, 'Gambia''s Adama Barrow says shock win heralds ''new hope'' - BBC News', 'http://www.bbc.com/news/world-africa-38186751', 'BBC News', 'Africa', 2, 1, '2016-12-04 19:40:11', '2016-12-04 19:40:11'),
(9, 'A Warming Earth Is Making It Harder to Study Mars', 'https://www.wired.com/2016/12/warming-earth-making-harder-study-mars/', 'Ria Misra', 'Wired article about mars', 1, 1, '2016-12-04 22:07:16', '2016-12-04 22:07:16'),
(10, 'The influential Confucian philosopher you’ve never heard of – Bryan W Van Norden | Aeon Essays', 'https://aeon.co/essays/the-influential-confucian-philosopher-you-ve-never-heard-of', 'AeonMagazine', 'Confucian philosopher Mengzi provides an intriguing (and oddly modern) alternative to Aristotelian accounts of human virtue', 2, 2, '2016-12-05 05:33:39', '2016-12-05 05:33:39'),
(11, 'Adolescence is no longer a bridge between childhood and adult life – Paula S Fass | Aeon Essays', 'https://aeon.co/essays/adolescence-is-no-longer-a-bridge-between-childhood-and-adult-life', 'AeonMagazine', 'In the 20th century it offered a bridge from the innocence of childhood to the responsibilities of adult life. Not any more.', 2, 2, '2016-12-05 05:34:27', '2016-12-05 05:34:27'),
(12, 'Brand new leader, same old autocracy as Uzbeks go to polls', 'https://www.theguardian.com/world/2016/dec/02/uzbekistan-poisoning-rumours-unlikely-to-halt-landslide-karimovs-disciple', 'Joanna Lillis', '\r\nShavkat Mirziyoyev expected to continue Islam Karimov’s iron-fisted rule in Uzbekistan, which has no free press or opposition.', 2, 2, '2016-12-05 05:35:06', '2016-12-05 05:35:06'),
(13, 'Modi is no Mao, Marx or Mahatma. And demonetisation is no Cultural Revolution', 'http://qz.com/850459/narendra-modi-is-no-mao-zedong-karl-marx-or-mahatma-gandhi-and-demonetisation-is-no-cultural-revolution/', 'Written by\n 	 		 			 			Rajrishi Singhal', 'The blurring of sharp lines between plitical opposits in India.', 2, 2, '2016-12-05 05:37:33', '2016-12-05 05:37:33'),
(14, 'Two giant Chinese companies are getting thousands of students into US schools—by committing fraud', 'http://qz.com/852042/two-giant-chinese-companies-are-getting-thousands-of-students-into-us-schools-by-committing-fraud/', 'Amy X. Wang', 'For $1,450 to $7,300, New Oriental Education & Technology Group will help a Chinese student get into college in America. ', 2, 2, '2016-12-05 05:39:03', '2016-12-05 05:39:03'),
(15, 'Isolation and hallucinations: the mental health challenges faced by astronauts', 'https://www.theguardian.com/science/2014/oct/05/hallucinations-isolation-astronauts-mental-health-space-missions', 'Vaughan Bell', 'This is about mental health. ', 6, 2, '2016-12-05 06:09:41', '2016-12-05 06:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'xomkhhv', '2016-12-03 00:26:28', '2016-12-03 00:26:28'),
(2, 6, 3, 'Comment\r\n', '2016-12-03 07:05:24', '2016-12-03 07:05:24'),
(3, 6, 3, 'another one', '2016-12-03 07:05:32', '2016-12-03 07:05:32'),
(4, 7, 4, 'f wa', '2016-12-03 22:12:58', '2016-12-03 22:12:58'),
(5, 2, 5, 'wert', '2016-12-04 21:48:37', '2016-12-04 21:48:37'),
(6, 13, 6, ' A place for comments and discussions.', '2016-12-05 06:08:41', '2016-12-05 06:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `concepts`
--

CREATE TABLE `concepts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dbpedia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `freebase` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opencyc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `geo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yago` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `concepts`
--

INSERT INTO `concepts` (`id`, `name`, `dbpedia`, `freebase`, `opencyc`, `geo`, `yago`, `created_at`, `updated_at`) VALUES
(1, 'Satellite', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:50', '2016-12-02 23:36:50'),
(2, 'International Space Station', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:50', '2016-12-02 23:36:50'),
(3, 'Space exploration', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:50', '2016-12-02 23:36:50'),
(4, 'Outer space', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(5, 'Spaceflight', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(6, 'NASA', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(7, 'Human spaceflight', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(8, 'Spacecraft', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(9, 'Space Race', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(10, 'Space debris', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(11, 'United Nations Charter', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:37:50', '2016-12-02 23:37:50'),
(12, 'Space law', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:37:50', '2016-12-02 23:37:50'),
(13, 'Outer Space Treaty', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:37:50', '2016-12-02 23:37:50'),
(14, 'European Space Agency', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:37:50', '2016-12-02 23:37:50'),
(15, 'Asteroid', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(16, 'Near-Earth object', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(17, 'United States Congress', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(18, 'Science', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(19, 'Charles F. Bolden, Jr.', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(20, 'Meteoroid', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:40:42', '2016-12-02 23:40:42'),
(21, 'Jupiter', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:40:42', '2016-12-02 23:40:42'),
(22, 'Venus', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:40:42', '2016-12-02 23:40:42'),
(23, 'Philae lander', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:42:57', '2016-12-02 23:42:57'),
(24, 'Orbit', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:42:57', '2016-12-02 23:42:57'),
(25, 'General relativity', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:42:57', '2016-12-02 23:42:57'),
(26, 'Universe', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:42:58', '2016-12-02 23:42:58'),
(27, 'European Union', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:42:58', '2016-12-02 23:42:58'),
(28, 'Metric space', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:42:58', '2016-12-02 23:42:58'),
(29, 'French Guiana', NULL, NULL, NULL, NULL, NULL, '2016-12-02 23:42:58', '2016-12-02 23:42:58'),
(30, 'Coral reef', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:04', '2016-12-03 00:26:04'),
(31, 'Great Barrier Reef', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:04', '2016-12-03 00:26:04'),
(32, 'Coral', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:04', '2016-12-03 00:26:04'),
(33, 'Algae', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(34, 'Coral bleaching', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(35, 'Symbiosis', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(36, 'Scleractinia', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(37, 'Zooxanthella', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(38, 'Belize Barrier Reef', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(39, 'Climate change', NULL, NULL, NULL, NULL, NULL, '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(40, 'Mir', NULL, NULL, NULL, NULL, NULL, '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(41, 'Space Shuttle', NULL, NULL, NULL, NULL, NULL, '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(42, 'Canadian Space Agency', NULL, NULL, NULL, NULL, NULL, '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(43, 'Automated Transfer Vehicle', NULL, NULL, NULL, NULL, NULL, '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(44, 'Hubble Space Telescope', NULL, NULL, NULL, NULL, NULL, '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(45, 'Trousers', NULL, NULL, NULL, NULL, NULL, '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(46, 'Astronomy', NULL, NULL, NULL, NULL, NULL, '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(47, 'Fashion', NULL, NULL, NULL, NULL, NULL, '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(48, 'Clothing', NULL, NULL, NULL, NULL, NULL, '2016-12-03 22:12:43', '2016-12-03 22:12:43'),
(49, 'Goddard Space Flight Center', NULL, NULL, NULL, NULL, NULL, '2016-12-03 22:12:43', '2016-12-03 22:12:43'),
(50, 'The Gambia', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(51, 'Yahya Jammeh', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(52, 'Africa', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(53, 'West Africa', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(54, 'Senegal', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(55, 'Ghana', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(56, 'Atlantic slave trade', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(57, 'Fula people', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(58, 'Alliance for Patriotic Reorientation and Construction', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:14', '2016-12-04 19:40:14'),
(59, 'Economic Community of West African States', NULL, NULL, NULL, NULL, NULL, '2016-12-04 19:40:14', '2016-12-04 19:40:14'),
(60, 'Temperature', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:16', '2016-12-04 22:07:16'),
(61, 'Climate', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:16', '2016-12-04 22:07:16'),
(62, 'Mars', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:16', '2016-12-04 22:07:16'),
(63, 'Antarctica', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:16', '2016-12-04 22:07:16'),
(64, 'Sun', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(65, 'Global warming', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(66, 'Cold', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(67, 'Martian', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(68, 'Celsius', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(69, 'Earth', NULL, NULL, NULL, NULL, NULL, '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(70, 'Confucianism', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:40', '2016-12-05 05:33:40'),
(71, 'Virtue', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(72, 'Human', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(73, 'Morality', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(74, 'Ethics', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(75, 'Confucius', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(76, 'Zhu Xi', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(77, 'Chinese philosophy', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(78, 'Mencius', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(79, 'Mozi', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(80, 'High school', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(81, 'Adolescence', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(82, 'Childhood', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(83, 'Secondary school', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(84, 'Youth', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(85, '20th century', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(86, 'College', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(87, 'Puberty', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(88, 'School types', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:30', '2016-12-05 05:34:30'),
(89, 'Secondary education', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:34:30', '2016-12-05 05:34:30'),
(90, 'Uzbekistan', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(91, 'Authoritarianism', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(92, 'Islam Karimov', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(93, 'Democracy', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(94, 'Human rights', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(95, 'Shavkat Mirziyoyev', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:35:08', '2016-12-05 05:35:08'),
(96, 'Opposition', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:35:08', '2016-12-05 05:35:08'),
(97, 'Prison', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:35:08', '2016-12-05 05:35:08'),
(98, 'Soviet Union', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:35:08', '2016-12-05 05:35:08'),
(99, 'Bharatiya Janata Party', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(100, 'Indian National Congress', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(101, 'Marxism', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(102, 'Narendra Modi', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(103, 'Karl Marx', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(104, 'Indira Gandhi', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(105, 'Gujarat', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(106, 'Communism', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:38', '2016-12-05 05:37:38'),
(107, 'Left-wing politics', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:38', '2016-12-05 05:37:38'),
(108, 'Vladimir Lenin', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:37:38', '2016-12-05 05:37:38'),
(109, 'Standardized test', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(110, 'Education', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(111, 'University', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(112, 'Student', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(113, 'School', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(114, 'Standardized tests', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(115, 'Employment', NULL, NULL, NULL, NULL, NULL, '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(116, 'Psychology', NULL, NULL, NULL, NULL, NULL, '2016-12-05 06:09:43', '2016-12-05 06:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `concept_relationships`
--

CREATE TABLE `concept_relationships` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `concept_id` int(10) UNSIGNED NOT NULL,
  `relevance` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `concept_relationships`
--

INSERT INTO `concept_relationships` (`id`, `article_id`, `concept_id`, `relevance`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0.95', '2016-12-02 23:36:50', '2016-12-02 23:36:50'),
(2, 1, 2, '0.83', '2016-12-02 23:36:50', '2016-12-02 23:36:50'),
(3, 1, 3, '0.81', '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(4, 1, 4, '0.70', '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(5, 1, 5, '0.66', '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(6, 1, 6, '0.57', '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(7, 1, 7, '0.55', '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(8, 1, 8, '0.49', '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(9, 1, 9, '0.47', '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(10, 1, 10, '0.46', '2016-12-02 23:36:51', '2016-12-02 23:36:51'),
(11, 2, 2, '0.97', '2016-12-02 23:37:49', '2016-12-02 23:37:49'),
(12, 2, 4, '0.91', '2016-12-02 23:37:49', '2016-12-02 23:37:49'),
(13, 2, 6, '0.81', '2016-12-02 23:37:49', '2016-12-02 23:37:49'),
(14, 2, 3, '0.79', '2016-12-02 23:37:49', '2016-12-02 23:37:49'),
(15, 2, 1, '0.71', '2016-12-02 23:37:49', '2016-12-02 23:37:49'),
(16, 2, 5, '0.66', '2016-12-02 23:37:50', '2016-12-02 23:37:50'),
(17, 2, 11, '0.58', '2016-12-02 23:37:50', '2016-12-02 23:37:50'),
(18, 2, 12, '0.56', '2016-12-02 23:37:50', '2016-12-02 23:37:50'),
(19, 2, 13, '0.56', '2016-12-02 23:37:50', '2016-12-02 23:37:50'),
(20, 2, 14, '0.55', '2016-12-02 23:37:50', '2016-12-02 23:37:50'),
(21, 3, 3, '0.96', '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(22, 3, 15, '0.82', '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(23, 3, 16, '0.69', '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(24, 3, 6, '0.64', '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(25, 3, 17, '0.58', '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(26, 3, 18, '0.56', '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(27, 3, 19, '0.55', '2016-12-02 23:40:41', '2016-12-02 23:40:41'),
(28, 3, 20, '0.54', '2016-12-02 23:40:42', '2016-12-02 23:40:42'),
(29, 3, 21, '0.53', '2016-12-02 23:40:42', '2016-12-02 23:40:42'),
(30, 3, 22, '0.52', '2016-12-02 23:40:42', '2016-12-02 23:40:42'),
(31, 4, 14, '0.98', '2016-12-02 23:42:57', '2016-12-02 23:42:57'),
(32, 4, 23, '0.89', '2016-12-02 23:42:57', '2016-12-02 23:42:57'),
(33, 4, 24, '0.84', '2016-12-02 23:42:57', '2016-12-02 23:42:57'),
(34, 4, 3, '0.82', '2016-12-02 23:42:57', '2016-12-02 23:42:57'),
(35, 4, 25, '0.77', '2016-12-02 23:42:57', '2016-12-02 23:42:57'),
(36, 4, 26, '0.75', '2016-12-02 23:42:58', '2016-12-02 23:42:58'),
(37, 4, 27, '0.75', '2016-12-02 23:42:58', '2016-12-02 23:42:58'),
(38, 4, 6, '0.69', '2016-12-02 23:42:58', '2016-12-02 23:42:58'),
(39, 4, 28, '0.67', '2016-12-02 23:42:58', '2016-12-02 23:42:58'),
(40, 4, 29, '0.66', '2016-12-02 23:42:58', '2016-12-02 23:42:58'),
(41, 5, 30, '0.95', '2016-12-03 00:26:04', '2016-12-03 00:26:04'),
(42, 5, 31, '0.92', '2016-12-03 00:26:04', '2016-12-03 00:26:04'),
(43, 5, 32, '0.74', '2016-12-03 00:26:04', '2016-12-03 00:26:04'),
(44, 5, 33, '0.61', '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(45, 5, 34, '0.54', '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(46, 5, 35, '0.38', '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(47, 5, 36, '0.36', '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(48, 5, 37, '0.35', '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(49, 5, 38, '0.32', '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(50, 5, 39, '0.32', '2016-12-03 00:26:05', '2016-12-03 00:26:05'),
(51, 6, 2, '0.95', '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(52, 6, 14, '0.76', '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(53, 6, 6, '0.70', '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(54, 6, 3, '0.67', '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(55, 6, 7, '0.49', '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(56, 6, 40, '0.44', '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(57, 6, 41, '0.43', '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(58, 6, 27, '0.40', '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(59, 6, 42, '0.39', '2016-12-03 07:05:03', '2016-12-03 07:05:03'),
(60, 6, 43, '0.39', '2016-12-03 07:05:04', '2016-12-03 07:05:04'),
(61, 7, 44, '0.95', '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(62, 7, 3, '0.75', '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(63, 7, 45, '0.65', '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(64, 7, 6, '0.63', '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(65, 7, 46, '0.57', '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(66, 7, 47, '0.56', '2016-12-03 22:12:42', '2016-12-03 22:12:42'),
(67, 7, 48, '0.52', '2016-12-03 22:12:43', '2016-12-03 22:12:43'),
(68, 7, 14, '0.50', '2016-12-03 22:12:43', '2016-12-03 22:12:43'),
(69, 7, 41, '0.49', '2016-12-03 22:12:43', '2016-12-03 22:12:43'),
(70, 7, 49, '0.47', '2016-12-03 22:12:43', '2016-12-03 22:12:43'),
(71, 8, 50, '0.95', '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(72, 8, 51, '0.81', '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(73, 8, 52, '0.62', '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(74, 8, 53, '0.53', '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(75, 8, 54, '0.49', '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(76, 8, 55, '0.49', '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(77, 8, 56, '0.46', '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(78, 8, 57, '0.46', '2016-12-04 19:40:13', '2016-12-04 19:40:13'),
(79, 8, 58, '0.46', '2016-12-04 19:40:14', '2016-12-04 19:40:14'),
(80, 8, 59, '0.45', '2016-12-04 19:40:14', '2016-12-04 19:40:14'),
(81, 9, 60, '0.95', '2016-12-04 22:07:16', '2016-12-04 22:07:16'),
(82, 9, 61, '0.75', '2016-12-04 22:07:16', '2016-12-04 22:07:16'),
(83, 9, 62, '0.72', '2016-12-04 22:07:16', '2016-12-04 22:07:16'),
(84, 9, 63, '0.63', '2016-12-04 22:07:16', '2016-12-04 22:07:16'),
(85, 9, 64, '0.57', '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(86, 9, 65, '0.49', '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(87, 9, 66, '0.49', '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(88, 9, 67, '0.48', '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(89, 9, 68, '0.46', '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(90, 9, 69, '0.45', '2016-12-04 22:07:17', '2016-12-04 22:07:17'),
(91, 10, 70, '0.96', '2016-12-05 05:33:40', '2016-12-05 05:33:40'),
(92, 10, 71, '0.85', '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(93, 10, 72, '0.70', '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(94, 10, 73, '0.61', '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(95, 10, 74, '0.60', '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(96, 10, 75, '0.59', '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(97, 10, 76, '0.58', '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(98, 10, 77, '0.57', '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(99, 10, 78, '0.50', '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(100, 10, 79, '0.46', '2016-12-05 05:33:41', '2016-12-05 05:33:41'),
(101, 11, 80, '0.98', '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(102, 11, 81, '0.86', '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(103, 11, 82, '0.51', '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(104, 11, 83, '0.51', '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(105, 11, 84, '0.47', '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(106, 11, 85, '0.46', '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(107, 11, 86, '0.45', '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(108, 11, 87, '0.42', '2016-12-05 05:34:29', '2016-12-05 05:34:29'),
(109, 11, 88, '0.42', '2016-12-05 05:34:30', '2016-12-05 05:34:30'),
(110, 11, 89, '0.38', '2016-12-05 05:34:30', '2016-12-05 05:34:30'),
(111, 12, 90, '0.98', '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(112, 12, 91, '0.91', '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(113, 12, 92, '0.72', '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(114, 12, 93, '0.66', '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(115, 12, 94, '0.64', '2016-12-05 05:35:07', '2016-12-05 05:35:07'),
(116, 12, 95, '0.63', '2016-12-05 05:35:08', '2016-12-05 05:35:08'),
(117, 12, 96, '0.59', '2016-12-05 05:35:08', '2016-12-05 05:35:08'),
(118, 12, 97, '0.56', '2016-12-05 05:35:08', '2016-12-05 05:35:08'),
(119, 12, 98, '0.53', '2016-12-05 05:35:08', '2016-12-05 05:35:08'),
(120, 12, 96, '0.46', '2016-12-05 05:35:08', '2016-12-05 05:35:08'),
(121, 13, 99, '0.98', '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(122, 13, 100, '0.74', '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(123, 13, 101, '0.72', '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(124, 13, 102, '0.68', '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(125, 13, 103, '0.66', '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(126, 13, 104, '0.64', '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(127, 13, 105, '0.64', '2016-12-05 05:37:37', '2016-12-05 05:37:37'),
(128, 13, 106, '0.58', '2016-12-05 05:37:38', '2016-12-05 05:37:38'),
(129, 13, 107, '0.58', '2016-12-05 05:37:38', '2016-12-05 05:37:38'),
(130, 13, 108, '0.56', '2016-12-05 05:37:38', '2016-12-05 05:37:38'),
(131, 14, 109, '0.94', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(132, 14, 86, '0.77', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(133, 14, 110, '0.70', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(134, 14, 111, '0.64', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(135, 14, 112, '0.63', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(136, 14, 89, '0.63', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(137, 14, 113, '0.60', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(138, 14, 114, '0.56', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(139, 14, 80, '0.55', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(140, 14, 115, '0.55', '2016-12-05 05:39:04', '2016-12-05 05:39:04'),
(141, 15, 2, '0.98', '2016-12-05 06:09:43', '2016-12-05 06:09:43'),
(142, 15, 3, '0.94', '2016-12-05 06:09:43', '2016-12-05 06:09:43'),
(143, 15, 7, '0.86', '2016-12-05 06:09:43', '2016-12-05 06:09:43'),
(144, 15, 4, '0.81', '2016-12-05 06:09:43', '2016-12-05 06:09:43'),
(145, 15, 5, '0.78', '2016-12-05 06:09:43', '2016-12-05 06:09:43'),
(146, 15, 8, '0.71', '2016-12-05 06:09:43', '2016-12-05 06:09:43'),
(147, 15, 116, '0.68', '2016-12-05 06:09:43', '2016-12-05 06:09:43'),
(148, 15, 1, '0.55', '2016-12-05 06:09:43', '2016-12-05 06:09:43'),
(149, 15, 6, '0.53', '2016-12-05 06:09:43', '2016-12-05 06:09:43'),
(150, 15, 40, '0.52', '2016-12-05 06:09:43', '2016-12-05 06:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', '2016-12-02 23:26:41', '2016-12-05 05:12:35'),
(2, 'Sociology', '2016-12-05 05:17:19', '2016-12-05 05:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `key_sentiments`
--

CREATE TABLE `key_sentiments` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword_id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `sentiment` decimal(5,2) NOT NULL,
  `relevence` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_role` enum('student','teacher') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `user_id`, `group_id`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'student', '2016-12-02 23:28:03', '2016-12-02 23:28:03'),
(2, 2, 1, 'student', '2016-12-02 23:45:39', '2016-12-02 23:45:39'),
(3, 3, 1, 'student', '2016-12-03 07:02:44', '2016-12-03 07:02:44'),
(4, 4, 1, 'student', '2016-12-03 22:11:37', '2016-12-03 22:11:37'),
(5, 5, 1, 'student', '2016-12-04 21:48:00', '2016-12-04 21:48:00'),
(6, 2, 2, 'student', '2016-12-05 05:32:49', '2016-12-05 05:32:49'),
(7, 6, 1, 'student', '2016-12-05 06:08:03', '2016-12-05 06:08:03'),
(8, 6, 2, 'student', '2016-12-05 06:08:03', '2016-12-05 06:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(137, '2014_10_12_000000_create_users_table', 1),
(138, '2014_10_12_100000_create_password_resets_table', 1),
(139, '2016_11_27_182006_create_article_table', 1),
(140, '2016_11_27_194904_create_comment_table', 1),
(141, '2016_11_28_172937_create_group_table', 1),
(142, '2016_11_28_180159_create_membership_table', 1),
(143, '2016_11_30_005109_create_keywords_table', 1),
(144, '2016_11_30_005248_create_keySentiments_table', 1),
(145, '2016_11_30_065851_create_concepts_table', 1),
(146, '2016_11_30_065945_create_concept_relationships_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marla', 'marla@plant.com', '$2y$10$MJ0ttCHUXmNvd0lTvJRaW.Na90fBMpS8CAzStmSC9gjLM0c4YXl8W', 'gvhZS43EeNbXjvCw7gEYfX2fwMSnkc9vpqs5V1yCdGSOIoQr8oh45Za8s7Dc', '2016-12-02 23:25:32', '2016-12-02 23:45:20'),
(2, 'Chanel', 'chanel@plant.com', '$2y$10$c7wQ2/XQPtHbXwIH2Ct91.yd7x0gKCrHBsHkoU5gNMbv38uMjfbDW', 'FUWNaqmPYLQU3VcLOREPEleiqv9qCNx2w6xpAhneX0uysog3fsM6HfHzIXsX', '2016-12-02 23:45:35', '2016-12-05 05:39:18'),
(3, 'Michelle', 'pichelle@plant.com', '$2y$10$j5ebr4baddTCi2ayson0EefpYZtpxPHBlpH6K.GCelSAX5zxZJOSe', NULL, '2016-12-03 07:01:56', '2016-12-03 07:01:56'),
(4, 'Nick', 'nick@plant.com', '$2y$10$.eXcl3PBAtxXS43wd2GUce7V5FFMy/V93VyFDU6SAGw4CEnGOdHXq', NULL, '2016-12-03 22:11:29', '2016-12-03 22:11:29'),
(5, 'Vijay', 'vj@plant.com', '$2y$10$8dMfRft0uSvmks/ZMGV/iuBitKn.O/.6AShJ9Ud90tOPLIh.tX.9O', 'vZgHs4dMucBov7q0iohiDtQ42s93WFEcdPsOfFRvPsbu73Z4xuKjlk5phAMH', '2016-12-04 21:47:47', '2016-12-04 22:06:06'),
(6, 'Kyle', 'kyle@plant.com', '$2y$10$x85.dVl9Axd7QvHD4C.vVOhx2866m9dW8/HGQNSmzVXfqjL3wEXDm', NULL, '2016-12-05 06:07:32', '2016-12-05 06:07:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_url_unique` (`url`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_article_id_index` (`article_id`);

--
-- Indexes for table `concepts`
--
ALTER TABLE `concepts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concept_relationships`
--
ALTER TABLE `concept_relationships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concept_relationships_article_id_index` (`article_id`),
  ADD KEY `concept_relationships_concept_id_index` (`concept_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keywords_name_unique` (`name`);

--
-- Indexes for table `key_sentiments`
--
ALTER TABLE `key_sentiments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_sentiments_keyword_id_index` (`keyword_id`),
  ADD KEY `key_sentiments_article_id_index` (`article_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `concepts`
--
ALTER TABLE `concepts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `concept_relationships`
--
ALTER TABLE `concept_relationships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `key_sentiments`
--
ALTER TABLE `key_sentiments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
