-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2022 at 05:16 PM
-- Server version: 10.3.35-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ippsggqu_clozeth`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(12, 'Men\'s Fashion'),
(13, 'Women\'s Fashion'),
(14, 'Shoes'),
(15, 'Bags'),
(16, 'Wrist Watches'),
(17, 'Hairs And Wigs'),
(18, 'Glasses'),
(19, 'Beddings'),
(20, 'Kids Fashion'),
(21, 'Jewelries'),
(22, 'Deodorants'),
(23, 'Other Accessories'),
(24, 'Skin Care ');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `messages` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_time` datetime NOT NULL DEFAULT current_timestamp(),
  `recipient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `sender`, `messages`, `chat_time`, `recipient`) VALUES
(42, 32, '', '2022-08-08 07:43:41', 0),
(43, 32, 'How can I post my goods', '2022-08-08 07:44:00', 0),
(44, 32, '', '2022-08-08 08:06:48', 0),
(45, 26, 'Hello', '2022-08-08 19:09:31', 0),
(46, 33, 'Hello. the verification code should not be sent to email alone, there should be an option to choose if I want the code to be sent to my email or phone number', '2022-08-09 09:21:40', 0),
(47, 0, 'Good evening otuchiâ€™s luxury. Thanks for the honest review. We would work on that ASAP. \nOur team is looking into that already.\nThanks for using clozeth.\nWe are always here to help', '2022-08-09 13:38:07', 33),
(48, 0, 'Wetin happen', '2022-08-09 13:38:55', 26),
(49, 0, 'Sorry for d late response.\nWe see you have added items yourself already . \nYou can also check the help center. To help with other issues you may have. If it doesnâ€™t help. We will be here to help.\nThanks', '2022-08-09 13:40:38', 32),
(50, 0, '', '2022-08-09 13:41:16', 32),
(51, 0, 'Hello may gold.\nYou have an order that you need to attend to urgently.\nElse the customer may cancel the order', '2022-08-12 17:48:18', 32),
(52, 32, 'Hello ', '2022-08-13 06:16:30', 0),
(53, 0, 'Hi Maygold\nTrust business is good.\nWe noticed you have been inactive on clozeth for a while.\nHope no issues?\nHow can we be of help?', '2022-09-03 11:55:21', 32);

-- --------------------------------------------------------

--
-- Table structure for table `exhibitors`
--

CREATE TABLE `exhibitors` (
  `exhibitor_id` int(11) NOT NULL,
  `company_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner1` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner2` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner3` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL,
  `plan_package` int(11) NOT NULL,
  `expiration` datetime NOT NULL DEFAULT current_timestamp(),
  `company_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `verification_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exhibitors`
--

INSERT INTO `exhibitors` (`exhibitor_id`, `company_name`, `company_email`, `company_address`, `company_phone`, `contact_person`, `contact_phone`, `reg_number`, `company_logo`, `about`, `banner1`, `banner_description`, `banner2`, `banner3`, `payment_status`, `plan_package`, `expiration`, `company_password`, `reg_date`, `verification_code`, `reg_status`) VALUES
(13, 'admin', 'Admin@clozeth.com', '', '0000', 'Admin', '000', '', '', '', '', '', '', '', 0, 0, '2025-07-03 17:17:04', 'yMcmb@her0123!', '2022-06-27 16:02:07', '', 0),
(26, 'Gazelle_classics ', 'Gazelle@gmail.com', 'Lagos State ', '08100653703', 'Faniran Dorcas Oluwatoyin ', '08100653703', 'exh/Gazelle26', '5F53A4C7-254E-4995-8FC2-62D7C876AC82.jpeg', 'Gazelle Classics Is Brand That Deals With Luxury Leathers To Create Pure Comfort On Your Sole ,handcrafted From Scratch To Finishing . Letâ€™s Be A Part Of Your History , Letâ€™s Create Magic On Your Feet . ', '4C827369-1447-4471-98E3-2E01ECE29AC7.jpeg', 'When In Doubt Wear White', 'B80CF453-9FF4-47DA-8CF8-811C07857C5F.jpeg', 'AD70D8BA-CCA3-4807-9FA8-49C42854084F.jpeg', 0, 0, '2022-09-06 00:00:00', 'kelly_ikpe1234', '2022-08-07 07:32:05', '', 0),
(31, 'Toryâ€™s Place', 'Torytorytoria@gmail.com', 'No 13 Lateef Ibirogba ', '09015910977', 'Ikpefua Victory', '09015910977', 'exh/Torysplace31', '0B81D711-8528-4F33-B46C-9302AF08BC60.jpeg', '', 'banner1.jpg', 'This is an online store, you can purchase as much as you want', 'banner2.jpg', 'banner3.jpg', 2, 16, '2022-09-07 00:00:00', 'theresamom12345', '2022-08-08 05:06:50', '20681831', 1),
(32, 'Maygold Luxury ', 'Maygoldluxury@gmail.com', 'Edo State', '08062179055', 'Maygold ', '08062179055', 'exh/Maygold32', 'SnapPic Collage_20215791455786.jpg', '', 'banner1.jpg', 'This is an online store, you can purchase as much as you want', 'banner2.jpg', 'banner3.jpg', 2, 16, '2022-12-07 00:00:00', 'Maygold', '2022-08-08 07:41:48', '39265432', 1),
(33, 'Otuchi\'s Luxuries', 'Otuchieseosa@gmail.com', 'Online Store', '09032955604', '09032955604', '09032955604', 'exh/Otuchi33', 'Screenshot_20220218-220057_1.png', 'We Sell All Kinds Of Lingerie Sets, Bralettes, Bra, Panties, Panty Hose,corsets And Bustier Etc All Available At Affordable Prices', 'Screenshot_20220218-220057_1.png', '', 'banner2.jpg', 'banner3.jpg', 2, 16, '2022-12-08 00:00:00', 'kds4460', '2022-08-09 09:09:19', '7573533', 1),
(34, 'Bb_hairs', 'Bbhairs150@gmail.com', 'Warri, Delta State. Nigeria ', '09034486064', 'Blessing Richie', '08050614573', 'exh/Bb_hair34', 'F1135DA9-0886-4136-87B9-EE5B836F9F6A.jpeg', '', 'banner1.jpg', 'This is an online store, you can purchase as much as you want', 'banner2.jpg', 'banner3.jpg', 2, 16, '2022-12-08 00:00:00', '09034486064', '2022-08-09 13:37:04', '50264134', 1),
(35, 'Bracha\'s Hair', 'tosinige5@gmail.com', 'Okabere Sapele Road Benin City Edo State', '08103434818', 'Ige Victoria', '08103431818', 'exh/Bracha\'35', 'IMG-20220902-WA0006.jpg', 'I Sell All Kind Of Female Wig And Bundles', 'banner1.jpg', 'This is an online store, you can purchase as much as you want', 'banner2.jpg', 'banner3.jpg', 2, 16, '2022-12-03 00:00:00', 'rossy12', '2022-09-03 11:00:53', '8744135', 1),
(36, 'Taylor\'d2fit ', 'taylord2fitt@gmail.com', '17 Baptist Mission Road , Off Etete Powerline , GRA. Benin City', '07050983454', 'Omoluwa Jeanvival ', '07050983454', 'exh/Taylor\'36', 'Screenshot_20220910-081646_Drive.jpg', '', 'banner1.jpg', 'This is an online store, you can purchase as much as you want', 'banner2.jpg', 'banner3.jpg', 2, 16, '2022-12-10 00:00:00', 'omoluwa3071', '2022-09-10 03:19:49', '50057236', 1),
(37, 'Shopping CribðŸ›', 'omonoyan123@gmail.com', 'Sapele Rd Bypass', '08104398725', 'Felicia ', '08104398725', 'exh/Shoppin37', '6AB855BB-D065-48D9-AE6D-A1209757B063.jpeg', '', 'banner1.jpg', 'This is an online store, you can purchase as much as you want', 'banner2.jpg', 'banner3.jpg', 2, 16, '2022-12-12 00:00:00', 'Daniels', '2022-09-12 05:38:55', '38018837', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `item_category` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_prize` int(11) NOT NULL,
  `previous_price` int(11) NOT NULL,
  `item_foto` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_foto` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_status` int(11) NOT NULL,
  `featured_item` int(12) NOT NULL,
  `daily_deal` int(11) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `company`, `item_category`, `item_name`, `item_prize`, `previous_price`, `item_foto`, `other_foto`, `item_description`, `payment_option`, `delivery_time`, `item_status`, `featured_item`, `daily_deal`, `time_created`, `status`) VALUES
(53, 32, '21', 'Watch ', 40000, 0, 'IMG-20220621-WA0053.jpg', '42dfa883f5ca4f2f94e9586b9fe4185a.jpg', 'Quality luxury watches ', '50% upfront', '1 to 3 days', 0, 0, 0, '2022-08-08 19:42:14', 0),
(54, 32, '18', 'Luxury Glasses', 6000, 0, 'FB_IMG_1648624849251.jpg', 'FB_IMG_1632289426686.jpg', 'Glasses with quality. ', '50% upfront', '1 to 3 days', 0, 0, 0, '2022-08-08 19:52:08', 0),
(55, 32, '18', 'Rayban', 7000, 0, 'FB_IMG_1653934619774.jpg', 'FB_IMG_1653934619774.jpg', 'Luxury rayban ', '50% upfront', '1 to 3 days', 0, 1, 0, '2022-08-08 20:46:34', 0),
(56, 26, '14', 'Birkenstock ', 15000, 0, 'C1221E9C-9D6B-474A-817A-CD10F14F2D67.jpeg', '4870FF24-ACC6-431F-B7CE-EAF1EC6AC20B.jpeg', 'Birkenstock ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:00:21', 0),
(57, 26, '14', 'Doluh Pair', 10000, 0, '27BD076F-A684-4310-BDA7-0ABCA89BAF45.jpeg', '58D23ECA-591F-4355-BE8F-F875F763E4EC.jpeg', 'Comfortable and Elegant ', 'Full pyment', '1 to 3 days', 0, 1, 0, '2022-08-08 23:03:36', 0),
(58, 26, '14', 'Annie Pair', 8000, 0, '824BDEF6-3641-4F0D-AF02-9A0429529AF8.jpeg', 'F356EC1D-6F1C-4924-A448-07C171762AB8.jpeg', ' Classy lady ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:09:09', 0),
(59, 26, '14', 'Slides', 10000, 0, '782238C0-FAF5-4813-AC97-DED8CE0F9E78.jpeg', '586B7005-5D3E-4F78-AE46-9B952C541F4D.jpeg', 'Walk the walk on life ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:12:46', 0),
(60, 26, '14', 'Ester Pair ', 7000, 0, 'D72D59B6-8C4D-47D2-BF82-72E72FC2A415.jpeg', 'EB1CA724-9E9D-4C2A-B611-501491F47DBA.jpeg', 'Comfortable and classy', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:16:50', 0),
(61, 26, '14', 'Oyije Pair ', 7000, 0, 'F5564751-A1E2-4999-A119-7C9007FE4FCE.jpeg', '8EB3C734-FE60-4B33-B20A-7E249B7DF208.jpeg', 'Dare to be different ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:20:30', 0),
(62, 26, '14', 'Chris  Pair ', 10000, 0, 'D7A04A76-8AA0-4EEC-9F3E-DFECEE404A95.jpeg', '1C9A8780-B4AA-4422-8380-CEA920F6AEAC.jpeg', 'Dare to be different ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:21:34', 0),
(63, 26, '14', 'Uzor Pair ', 10000, 0, '9B3004EE-3EB5-4895-B890-D6AACDA81C58.jpeg', '2B1F892F-5F29-43BD-B29B-3BE171AA30F9.jpeg', 'Step out in comfort ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:22:50', 0),
(64, 26, '14', 'Dapo Pair ', 10000, 0, '5D2BBBD6-DC4A-4147-8730-842C881174F1.jpeg', '283403F5-6A3B-432F-A679-4274964E5386.jpeg', 'Dare to be different ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:24:00', 0),
(65, 26, '14', 'Oge  Pair ', 7000, 0, 'ACF2A0A6-75DD-4F6E-971C-2DA77FD6F62C.jpeg', '5DDD5AFF-2B1D-475C-9E0A-A8B8198F83A3.jpeg', 'Stepper ðŸ˜', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:25:39', 0),
(66, 26, '14', 'Abiola Pair ', 7000, 0, '8DE0E39B-7017-4737-BA22-2B573F8BE008.jpeg', '84BD5ECD-B38D-4224-B761-ED732538CCD5.jpeg', 'Stepper ðŸ˜', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:27:18', 0),
(67, 26, '14', 'ChinyerePair ', 7000, 0, 'EDCF89E2-AEC3-4C55-99EF-989144BC1CC7.jpeg', 'C8F9E7FD-9D87-4476-B3F6-E93C83FE926F.jpeg', 'Reddish red â¤ï¸', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:29:01', 0),
(68, 26, '14', 'Kay Pair ', 10000, 0, 'F6E38777-CA65-4221-AB16-97B20B32988F.jpeg', 'A5A8EB39-5C11-4632-9392-39BD1C1D1DC3.jpeg', 'For kings ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:30:36', 0),
(69, 26, '14', 'Henry Pair ', 10000, 0, '3188F49B-A47C-4F60-B5F6-9002DBBE473F.jpeg', '1E1EA9E3-DE26-4EBD-8E9E-D86AB5B33C33.jpeg', 'Show stopper â¤ï¸', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:32:12', 0),
(70, 26, '14', 'Somto  Pair ', 10000, 0, '76E9897D-532D-4A0E-82E2-F7C0205B3F95.jpeg', 'AA300567-8994-4A54-8672-0F7A99FCB6BA.jpeg', 'Show stopper â¤ï¸', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:33:45', 0),
(71, 26, '14', 'Onolunose   Pair ', 15000, 0, 'C38F96B0-6653-44AB-87B7-B178C08BDAA6.jpeg', '555B7491-5476-444C-AF76-484EF4C18BB5.jpeg', 'Boo ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:35:34', 0),
(72, 26, '14', ' Racheal Pair ', 7000, 0, '582A116B-4907-4FCC-8D2E-26198AE0888F.jpeg', 'A88C11EB-8404-405B-BA88-0AAAB3DFD33B.jpeg', 'Boo ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:38:28', 0),
(73, 26, '14', ' Timothy  Pair ', 15000, 0, 'D426414B-E396-4609-ADEB-C9C5344F868A.jpeg', 'B0F1CF7C-92CB-4F94-9155-D8050C76710F.jpeg', 'Peaceful ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:41:34', 0),
(74, 26, '14', ' Ola   Pair ', 15000, 15000, '1D21B81B-EAB4-4946-898A-E7FFF562D36A.jpeg', '68709E88-D8EA-4580-A9D7-5B2F5F7F9572.jpeg', 'Peaceful ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:43:04', 0),
(75, 26, '14', ' Aduragbemi Pair ', 10000, 0, '9574EBFE-6E77-4229-9887-2060903C382D.jpeg', 'AC234814-6DB3-4B76-8A40-9D48D84BD1E0.jpeg', 'Innocent ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:44:36', 0),
(76, 26, '14', 'Fatai Pair ', 10000, 0, '0A463715-65EC-4BF1-8C34-81FA03EF1902.png', 'AC234814-6DB3-4B76-8A40-9D48D84BD1E0.jpeg', 'Innocent ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:46:21', 0),
(77, 26, '14', 'Deji  Pair ', 10000, 0, '896FB34E-A867-4567-994C-2A22969BE699.jpeg', 'F2409F17-CAED-4F6B-BF48-A3629EB4D274.jpeg', 'Vibes ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:49:23', 0),
(78, 26, '14', 'Oke Pair ', 10000, 0, 'C4067A21-807E-4B10-A513-4C4CF42CC6B4.jpeg', '7F6F220C-57DF-4C01-86BB-6C2117F92C94.jpeg', 'Vibes ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:51:12', 0),
(79, 26, '14', 'Ayo Pair ', 15000, 0, 'DB30407B-07FF-4DE8-A9BC-DCBC2E5CA761.jpeg', '977C35DD-4355-4B35-AF78-9BA7243E4B71.jpeg', 'Vibes ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:52:42', 0),
(80, 26, '14', 'Adewale Pair ', 10000, 0, '6BA90B0A-9274-4112-AE83-DDBA882866A0.jpeg', '9A8D786A-7C85-4EAE-9F4B-36BF9690F45E.jpeg', 'Trending', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:54:39', 0),
(81, 26, '14', 'Janet Pair ', 7000, 0, 'D7DE4F2A-727B-4ABC-A5E5-47E9ED932F3E.jpeg', 'ABC737F2-C38D-4F30-B036-E3DBFA28836E.jpeg', 'Trending', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:56:21', 0),
(82, 26, '14', 'Fabulous Pair ', 10000, 0, '85E01190-BCAB-443F-9F24-B0A3B1BD6063.jpeg', 'C69D7F6C-5BF1-4416-AAF6-2CA14E62E692.jpeg', 'Croc leather ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:58:19', 0),
(83, 26, '14', ' Vincent Pair ', 10000, 0, 'E9774189-3E13-4D86-A6A5-7E5043B3C85F.jpeg', 'E9B44E6E-53B0-4CE0-B7E7-A258B2D95C75.jpeg', 'Classy men ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-08 23:59:45', 0),
(84, 26, '14', ' Pascal Pair ', 10000, 0, 'ADCBC687-C111-4365-AD52-9481D91209E3.jpeg', '071747F9-B643-4B76-8343-0914FEF961B4.jpeg', 'Classy men ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-09 00:01:36', 0),
(85, 26, '14', ' Joseph Pair ', 10000, 0, '25F66331-5458-4399-9544-110904D33C27.jpeg', '3CC6E1CF-C911-4104-BE41-5FEE47389F27.jpeg', 'Energy ', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-09 00:03:19', 0),
(86, 33, '13', 'Night Wear', 6000, 0, 'Screenshot_20220809-191322_7.png', 'Screenshot_20220809-193022_2.png', '3 in 1 lingerie sets...comes with hair bonnet', 'Full pyment', '1 to 3 days', 0, 0, 0, '2022-08-09 18:41:54', 0),
(87, 33, '13', 'Bralettes', 2500, 0, 'IMG-20220604-WA0034.jpg', 'IMG-20220604-WA0034.jpg', 'Sexy bralettes available in black, brown and Ash colour', 'Full pyment', '1 to 3 days', 0, 1, 0, '2022-08-09 19:14:42', 0),
(88, 31, '17', 'Wig Diana', 60000, 0, '0C895D7E-70C6-4D70-B30D-627BCAEE7CF8.jpeg', '9CF74C44-119D-4B63-80BB-8283FB4BE4F1.jpeg', '30 inches \r\nAvailable in gold black ', 'Full pyment', '1 to 3 days', 0, 1, 0, '2022-08-10 17:01:37', 0),
(89, 35, '17', 'Bone Straight', 85000, 0, 'IMG-20220723-WA0016.jpg', 'IMG-20220611-WA0001.jpg', '14&quot; burgundy hair bundles', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-04 18:26:23', 0),
(90, 35, '17', 'Hair Blend', 20000, 0, 'IMG-20220727-WA0013.jpg', 'IMG-20220727-WA0013.jpg', 'Two tone hair blend', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-04 18:31:49', 0),
(91, 35, '17', 'Human Hair', 75000, 0, 'IMG-20220513-WA0007.jpg', 'IMG-20220513-WA0007.jpg', 'BURGUNDY SDD PIXIE CURLS 16&quot; WITH CLOSURE', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-04 18:36:51', 0),
(92, 35, '17', '100% Human Hair', 65000, 0, 'IMG-20220727-WA0017.jpg', 'IMG-20220727-WA0017.jpg', '20&quot;hair with 16&quot; frontal bundles', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-04 18:42:55', 0),
(93, 37, '12', 'Jack Cactus Tee', 8000, 0, '66A1A9AA-2A2A-4DA6-8303-47935E585AB4.jpeg', '03F26F73-7F0D-4F96-8CC3-BE9554803B19.jpeg', 'Name:jack cactus tee\r\nSize:L,XL,2XL,3XL,4XL\r\ncolour:black and white', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-12 12:40:49', 0),
(94, 37, '13', 'Multi Color Gown', 8500, 0, '725B5360-E057-4C06-9363-880D0CFCE333.jpeg', '94507E99-891F-4B21-A6CF-2A7AB5D45A80.jpeg', 'Sizes:L,XL,XXL', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-12 13:03:49', 0),
(95, 35, '17', 'Pixie Curls', 80000, 0, 'IMG-20220914-WA0050.jpg', 'IMG-20220914-WA0050.jpg', '18&quot; Hair with T part closure', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-15 12:54:50', 0),
(96, 35, '17', 'SDD PIANO PIXIE', 62000, 0, 'IMG-20220914-WA0018.jpg', 'IMG-20220914-WA0018.jpg', '14&quot; hair with closure', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-15 13:00:17', 0),
(97, 35, '17', 'SDD PIANO BOUNCE', 72000, 0, 'IMG-20220912-WA0001.jpg', 'IMG-20220912-WA0001.jpg', 'Hair with full lace closure', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-15 13:01:42', 0),
(98, 35, '17', 'DD Chest Nut', 42000, 0, 'IMG-20220320-WA0042.jpg', 'IMG-20220320-WA0042.jpg', '10/12&quot; hair with T part closure', 'Full pyment', '4 to 7 day', 0, 0, 0, '2022-09-15 13:03:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `customer_email`, `subject`, `details`, `notification_date`, `status`) VALUES
(37, 'Josephoke@gmail.com', 'Item Dispensed for delivery', 'Hello Joseph, your order \' Aduragbemi Pair \', with order number: 0 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-08-08 20:18:03', 1),
(38, 'Josephoke@gmail.com', 'Item Delivered', 'Hello Joseph, this is to confirm that your order \' Aduragbemi Pair \', with order number: 0 has been delivered to your address. \n Thanks for your business. Do Shop more with Us', '2022-08-08 20:19:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_email` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_number` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` int(11) NOT NULL,
  `dispense_date` datetime NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_email`, `item_name`, `quantity`, `item_price`, `company`, `order_date`, `order_number`, `order_time`, `order_status`, `dispense_date`, `delivery_date`) VALUES
(73, 'Josephoke@gmail.com', ' Aduragbemi Pair ', 1, '10000', '26', '2022-08-08 20:15:00', '0', '2022-08-09 00:19:01', 1, '2022-08-08 00:00:00', '2022-08-08'),
(74, 'Josephoke@gmail.com', ' Pascal Pair ', 1, '10000', '26', '2022-08-08 20:15:00', '0', '2022-08-09 00:15:00', 0, '0000-00-00 00:00:00', '0000-00-00'),
(75, 'Josephoke@gmail.com', ' Ola   Pair ', 1, '15000', '26', '2022-08-08 20:27:12', '0', '2022-08-09 00:27:12', 0, '0000-00-00 00:00:00', '0000-00-00'),
(76, 'Josephoke@gmail.com', ' Vincent Pair ', 1, '10000', '26', '2022-08-08 20:27:12', '0', '2022-08-09 00:27:12', 0, '0000-00-00 00:00:00', '0000-00-00'),
(77, 'Josephoke@gmail.com', 'Luxury Glasses', 1, '6000', '32', '2022-08-08 20:29:55', '0', '2022-08-09 00:29:55', 0, '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `plan_id` int(11) NOT NULL,
  `plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`plan_id`, `plan`) VALUES
(10, 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `plan_package`
--

CREATE TABLE `plan_package` (
  `package_id` int(11) NOT NULL,
  `plan` int(255) NOT NULL,
  `package` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_price` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `features` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `booth_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_package`
--

INSERT INTO `plan_package` (`package_id`, `plan`, `package`, `package_price`, `duration`, `features`, `booth_status`) VALUES
(15, 10, 'Weekly', 1000, 7, 'Add new item. ith store management. Manage delivery', 0),
(16, 10, 'Monthly', 3500, 30, '', 0),
(17, 10, 'Annually', 36000, 365, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppers`
--

CREATE TABLE `shoppers` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppers`
--

INSERT INTO `shoppers` (`user_id`, `first_name`, `last_name`, `user_password`, `phone_number`, `email`, `address`, `city`, `reg_date`) VALUES
(6, 'Donald ', 'Ikpefua', 'Don14reaL', '07033348221', 'donald.dedon@yahoo.com', '8 Cac Street, Edjeba, Warri Delta State', '', '2022-08-07 07:28:46'),
(7, 'Kelly', 'Ikpefua', 'yMcmb@her0', '07068897068', 'onostarkels@gmail.com', 'Okabere', '', '2022-08-07 13:29:35'),
(8, 'Joseph', 'Oke', 'joseph2468', '08035218468', 'josephoke@gmail.com', 'Lagos State', '', '2022-08-08 20:13:38'),
(9, 'Rufus', 'EHIZOKHALE', 'Ikpefua', '08032908882', 'rufuspat7@gmail.com', 'Suite C-208 New Orisobare Shopping Complex, MDS Area, Osogbo Osun State, Nigeria', 'Osun', '2022-09-09 06:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `store_payments`
--

CREATE TABLE `store_payments` (
  `payment_id` int(11) NOT NULL,
  `exhibitor` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `payment_slip` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `exhibitors`
--
ALTER TABLE `exhibitors`
  ADD PRIMARY KEY (`exhibitor_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `plan_package`
--
ALTER TABLE `plan_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `shoppers`
--
ALTER TABLE `shoppers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `store_payments`
--
ALTER TABLE `store_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `exhibitors`
--
ALTER TABLE `exhibitors`
  MODIFY `exhibitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plan_package`
--
ALTER TABLE `plan_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shoppers`
--
ALTER TABLE `shoppers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store_payments`
--
ALTER TABLE `store_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
