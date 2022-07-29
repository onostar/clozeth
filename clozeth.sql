-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 10:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clozeth`
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
  `customer_email` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `item_name`, `quantity`, `item_price`, `company`, `customer_email`) VALUES
(67, 'Black Shoe', 2, '10000', '14', '&lt;br /&gt;\r\n&lt;b&gt;Warning&lt;/b&gt;:  Undefined Variable $user In &lt;b&gt;C:xampphtdocsclozethviewitem_info.php&lt;/b&gt; On Line &lt;b&gt;74&lt;/b&gt;&lt;br /&gt;\r\n'),
(86, 'Gucci Watch', 2, '8000', '14', 'Onostarkels@gmail.com');

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
(12, 'Mens Fashion'),
(13, 'Womens Fashion'),
(14, 'Shoes'),
(15, 'Bag'),
(16, 'Wrist Watches'),
(17, 'Hairs And Wigs'),
(18, 'Glasses'),
(19, 'Beddings'),
(20, 'Kids Fashion'),
(21, 'Jewelries');

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
(33, 14, 'Hi', '2022-06-29 21:23:13', 0),
(34, 14, 'Hi', '2022-06-29 23:24:46', 0),
(35, 14, 'Wadup', '2022-06-29 23:25:26', 0),
(36, 14, 'Hello', '2022-06-30 08:13:43', 0),
(37, 14, 'Good morning', '2022-06-30 08:14:44', 0),
(38, 14, 'How is work', '2022-06-30 08:15:06', 0),
(39, 14, 'Yo', '2022-06-30 08:15:46', 0),
(40, 14, 'Cool', '2022-06-30 08:16:16', 0);

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
  `banner1` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner2` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner3` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL,
  `plan_package` int(11) NOT NULL,
  `expiration` datetime NOT NULL DEFAULT current_timestamp(),
  `company_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exhibitors`
--

INSERT INTO `exhibitors` (`exhibitor_id`, `company_name`, `company_email`, `company_address`, `company_phone`, `contact_person`, `contact_phone`, `reg_number`, `company_logo`, `banner1`, `banner_description`, `banner2`, `banner3`, `payment_status`, `plan_package`, `expiration`, `company_password`, `reg_date`) VALUES
(13, 'admin', 'Admin@clozeth.com', '', '0000', 'Admin', '000', '', '', '', '', '', '', 0, 0, '2025-07-03 17:17:04', 'yMcmb@her0123!', '2022-06-27 16:02:07'),
(14, 'Onostar Media', 'Onostarkels@gmail.com', '23 Father Healey Street Warri', '07057456881', 'Kelly Ikpefua', '07068897068', 'exh/Onostar14', 'psn_logo2.png', 'tanks.JPG', 'Where Media And Ict Is Simply The Best. ANy Ict Service At Your Beck And Call', 'banner2.JPG', 'banner1.JPG', 2, 19, '2022-08-01 00:00:00', 'yMcmb@her0123', '2022-06-27 19:46:40'),
(16, 'Temix Empire', 'Temixempire@gmail.com', '106 Jakpa Road, Warri', '08157985866', 'Temidayo Omotoye', '09023140300', 'exh/Temix E16', 'temix_empire_logo1.jpg', 'temix-empire-cakes.jpg', 'Where Cake Become Art', 'bed_sheet.jpg', 'temix-cake.jpg', 2, 16, '2022-08-02 00:00:00', 'temiday0', '2022-07-03 22:18:40'),
(17, 'Vina Empire', 'Vina@gmail.com', 'Airport Road Benin', '08023445566', 'Vivian Isoken', '09023140300', 'exh/Vina Em17', 'sponge_bob cake.jpg', 'banner1.jpg', 'This is an online store, you can purchase as much as you want', 'banner2.jpg', 'banner3.jpg', 2, 16, '2022-08-04 00:00:00', 'isoken@omo1', '2022-07-05 09:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel`, `website`, `hotel_address`) VALUES
(16, 'Uyi Grand Hotel', 'www.uyigrand.com', '23 Boundary Road, GRA, Benin City'),
(17, 'Baid', '', ''),
(18, '', 'www.baiden-baiden.com', '123 Sapele Road Opp Limit Road, Benin City'),
(19, 'Baiden Baiden', 'www.baiden-baiden.com', '124 Sapele Road Opposit Limit Junction, Benin City'),
(20, 'Morzi Hotels', 'www.morzi.com', '23 Ugbor Road, Benin City');

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

INSERT INTO `menu` (`item_id`, `company`, `item_category`, `item_name`, `item_prize`, `previous_price`, `item_foto`, `item_description`, `payment_option`, `delivery_time`, `item_status`, `featured_item`, `daily_deal`, `time_created`, `status`) VALUES
(40, 14, '19', 'Classic Bedsheets', 3000, 4000, 'bed6.jpg', 'A proper bedsheet made for you', '', '', 0, 0, 0, '2022-07-05 14:29:45', 0),
(41, 14, '14', 'Black Shoe', 6000, 5000, 'onostar_shoe.jpg', 'Classic gentle man shoe with black lace', '', '', 0, 0, 0, '2022-07-05 14:42:22', 0),
(42, 14, '16', 'Gucci Watch', 4000, 8000, 'wrist_wateches.jpg', 'delet watch', '', '', 0, 0, 0, '2022-07-06 12:32:13', 0),
(43, 14, '21', 'Necklace On Black', 24000, 0, 'jewelries.webp', 'classic necklace on black stand', '50% upfront', '', 0, 0, 0, '2022-07-16 10:48:55', 0),
(44, 16, '19', 'Blue Bed Sheet', 5000, 0, 'bedding_slide1.jpg', 'Bed for all to sleep', 'pay on delivery', '', 0, 0, 0, '2022-07-19 10:04:01', 0),
(45, 17, '17', 'Black Human Hair', 23000, 0, 'hair2.webp', 'kjakjf    kjacjkljkl kjdc k lkkd', 'pay on delivery', '', 0, 0, 0, '2022-07-24 21:20:20', 0);

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
(18, 'Onostarkels@gmail.com', 'Item Dispensed', 'Hello Kelly, your order Gucci Watch, with order number:  has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-16 07:05:05', 1),
(19, 'Onostarkels@gmail.com', 'Order Cancelled', 'Hello Kelly, your order Gucci Watch, with order number: 2222022071010111254 has been Cancelled for some reason. \n You can order again. Thanks for your business', '2022-07-18 22:01:14', 1),
(20, 'Onostarkels@gmail.com', 'Item Dispensed for delivery', 'Hello Kelly, your order \'Black Shoe\', with order number:  has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-20 00:07:54', 1),
(21, 'Paulinhonavas@gmail.com', 'Item Dispensed for delivery', 'Hello Paul, your order \'Blue Bed Sheet\', with order number: 37192022071910531155 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-20 00:21:05', 0),
(22, 'Onostarkels@gmail.com', 'Item Dispensed for delivery', 'Hello Kelly, your order \'Blue Bed Sheet\', with order number:  has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-20 00:30:07', 1),
(23, 'Onostarkels@gmail.com', 'Item Delivered', 'Hello Kelly, this is to confirm that your order \'Black Shoe\', with order number:  has been delivered to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-21 06:57:31', 1),
(24, 'Onostarkels@gmail.com', 'Item Dispensed for delivery', 'Hello Kelly, your order \'Necklace On Black\', with order number:  has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-21 06:58:53', 0),
(25, 'Onostarkels@gmail.com', 'Item Delivered', 'Hello Kelly, this is to confirm that your order \'Necklace On Black\', with order number:  has been delivered to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-21 06:59:06', 0),
(26, 'Paulinhonavas@gmail.com', 'Item Dispensed for delivery', 'Hello Paul, your order \'Classic Bedsheets\', with order number: 10152022071910573356 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-21 09:39:50', 0),
(27, 'Paulinhonavas@gmail.com', 'Item Delivered', 'Hello Paul, this is to confirm that your order \'Classic Bedsheets\', with order number: 10152022071910573356 has been delivered to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-21 09:40:00', 0),
(28, 'Paulinhonavas@gmail.com', 'Item Dispensed for delivery', 'Hello Paul, your order \'Necklace On Black\', with order number:  has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-21 15:59:05', 0),
(29, 'Paulinhonavas@gmail.com', 'Item Delivered', 'Hello Paul, this is to confirm that your order \'Necklace On Black\', with order number:  has been delivered to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-21 15:59:19', 0),
(30, 'Onostarkels@gmail.com', 'Item Delivered', 'Hello Kelly, this is to confirm that your order \'Blue Bed Sheet\', with order number:  has been delivered to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-22 19:20:28', 0),
(31, 'Gazelle@gmail.com', 'Item Dispensed for delivery', 'Hello Toyin, your order \'Gucci Watch\', with order number: 44362022072311513961 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-23 10:53:16', 0),
(32, 'Gazelle@gmail.com', 'Item Delivered', 'Hello Toyin, this is to confirm that your order \'Gucci Watch\', with order number: 44362022072311513961 has been delivered to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-23 10:54:24', 0),
(33, 'Gazelle@gmail.com', 'Item Dispensed for delivery', 'Hello Toyin, your order \'Necklace On Black\', with order number: 6192022072311555162 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-23 10:56:37', 0),
(34, 'Gazelle@gmail.com', 'Item Delivered', 'Hello Toyin, this is to confirm that your order \'Necklace On Black\', with order number: 6192022072311555162 has been delivered to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-23 10:56:57', 0),
(35, 'Paulinhonavas@gmail.com', 'Item Dispensed for delivery', 'Hello Paul, your order \'Black Shoe\', with order number: 48362022072312011263 has been dispensed for delivery to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-23 11:01:22', 0),
(36, 'Paulinhonavas@gmail.com', 'Item Delivered', 'Hello Paul, this is to confirm that your order \'Black Shoe\', with order number: 48362022072312011263 has been delivered to your address. \n Thanks for your business. Do Shop more with Us', '2022-07-23 11:01:39', 0);

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
(51, 'Onostarkels@gmail.com', 'Black Shoe', 2, '10000', '14', '2022-07-09 20:54:54', '', '2022-07-21 05:57:31', 1, '2022-07-20 00:00:00', '2022-07-21'),
(52, 'Onostarkels@gmail.com', 'Gucci Watch', 2, '8000', '14', '2022-07-09 20:54:54', '', '2022-07-16 06:05:05', 1, '2022-07-19 23:16:35', '2022-07-16'),
(54, 'Onostarkels@gmail.com', 'Gucci Watch', 2, '8000', '14', '2022-07-10 21:11:12', '2222022071010111254', '2022-07-18 21:01:14', -1, '2022-07-19 23:16:35', '2022-07-18'),
(55, 'Paulinhonavas@gmail.com', 'Blue Bed Sheet', 2, '10000', '16', '2022-07-19 21:53:11', '37192022071910531155', '2022-07-19 23:21:04', 2, '2022-07-20 00:00:00', '0000-00-00'),
(56, 'Paulinhonavas@gmail.com', 'Classic Bedsheets', 1, '3000', '14', '2022-07-19 21:57:33', '10152022071910573356', '2022-07-21 08:39:59', 1, '2022-07-21 00:00:00', '2022-07-21'),
(57, 'Onostarkels@gmail.com', 'Necklace On Black', 2, '48000', '14', '2022-07-20 00:28:50', '', '2022-07-21 05:59:06', 1, '2022-07-21 00:00:00', '2022-07-21'),
(58, 'Onostarkels@gmail.com', 'Blue Bed Sheet', 1, '5000', '16', '2022-07-20 00:28:50', '', '2022-07-22 18:20:28', 1, '2022-07-20 00:00:00', '2022-07-22'),
(59, 'Paulinhonavas@gmail.com', 'Necklace On Black', 2, '48000', '14', '2022-07-21 15:56:47', '', '2022-07-21 14:59:19', 1, '2022-07-21 00:00:00', '2022-07-21'),
(60, 'Onostarkels@gmail.com', 'Blue Bed Sheet', 1, '5000', '16', '2022-07-21 21:32:16', '24352022072110321660', '2022-07-21 21:31:05', -1, '0000-00-00 00:00:00', '2022-07-21'),
(61, 'Gazelle@gmail.com', 'Gucci Watch', 1, '4000', '14', '2022-07-23 10:51:39', '44362022072311513961', '2022-07-23 09:54:24', 1, '2022-07-23 00:00:00', '2022-07-23'),
(62, 'Gazelle@gmail.com', 'Necklace On Black', 3, '72000', '14', '2022-07-23 10:55:51', '6192022072311555162', '2022-07-23 09:56:57', 1, '2022-07-23 00:00:00', '2022-07-23'),
(63, 'Paulinhonavas@gmail.com', 'Black Shoe', 4, '24000', '14', '2022-07-23 11:01:12', '48362022072312011263', '2022-07-23 10:01:39', 1, '2022-07-23 00:00:00', '2022-07-23'),
(64, 'Onostarkels@gmail.com', 'Black Shoe', 1, '6000', '14', '2022-07-27 15:29:30', '23972022072704293064', '2022-07-27 14:29:30', 0, '0000-00-00 00:00:00', '0000-00-00'),
(65, 'Onostarkels@gmail.com', 'Classic Bedsheets', 1, '3000', '14', '2022-07-27 15:29:30', '23972022072704293064', '2022-07-27 14:29:30', 0, '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `paid_members`
--

CREATE TABLE `paid_members` (
  `payment_id` int(11) NOT NULL,
  `pcn_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paid_members`
--

INSERT INTO `paid_members` (`payment_id`, `pcn_number`, `first_name`, `last_name`, `whatsapp`, `res_state`, `user_email`, `gender`) VALUES
(7, '425716', 'kelly', 'Ikpefua', '07068897068', 'Edo', 'onostarkels@gmail.com', 'M'),
(8, '111122', 'james', 'john', '0806677777', 'Lagos', 'james@gmail.com', 'm');

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
(9, 'Basic Plan'),
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
(17, 10, 'Annually', 36000, 365, '', 0),
(18, 9, 'Weekly', 500, 7, '', 0),
(19, 9, 'Monthly', 1800, 30, '', 0),
(20, 9, 'Annually', 20400, 365, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_hotel`
--

CREATE TABLE `request_hotel` (
  `request_id` int(11) NOT NULL,
  `pcn_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_status` int(11) NOT NULL,
  `request_date` datetime NOT NULL DEFAULT current_timestamp(),
  `request_by` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_evidence` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in_date` date DEFAULT NULL,
  `bulk` int(11) NOT NULL,
  `bulk_evidence` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_hotel`
--

INSERT INTO `request_hotel` (`request_id`, `pcn_number`, `hotel`, `room`, `request_status`, `request_date`, `request_by`, `payment_evidence`, `check_in_date`, `bulk`, `bulk_evidence`, `amount`) VALUES
(23, '425716', 'Baiden Baiden', 'Standard Room', 1, '2022-03-21 05:22:12', '425716', 'cake_slide2.jpg', '2022-07-24', 1, 'cake_slide2.jpg', 0),
(24, '691141', 'Morzi Hotels', 'Standard Room', 1, '2022-03-21 05:33:43', '691141', 'cake_slide2.jpg', '2022-07-25', 0, '', 0),
(27, '688970', 'Baiden Baiden', 'Standard Room', 1, '2022-03-21 06:04:38', '425716', '', '2022-07-24', 0, '', 20000),
(28, '223344', 'Baiden Baiden', 'Standard Room', 1, '2022-03-21 06:07:31', '425716', '', '2022-07-24', 0, '', 20000),
(29, '002299', 'Uyi Grand Hotel', 'Basic Room', 1, '2022-03-21 07:47:13', '425716', '', '2022-07-24', 0, '', 17000),
(30, '003399', 'Uyi Grand Hotel', 'Basic Room', 1, '2022-03-21 07:47:25', '425716', '', '2022-07-24', 0, '', 17000),
(31, '001188', 'Morzi Hotels', 'Standard Room', 1, '2022-03-21 07:48:07', '425716', '', '2022-07-24', 0, '', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `hotel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `room_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `hotel`, `room`, `price`, `room_quantity`) VALUES
(22, 'Baiden Baiden', 'Standard Room', 20000, 3),
(23, 'Baiden Baiden', 'Business Suite', 40000, 5),
(24, 'Morzi Hotels', 'Standard Room', 22000, 8),
(25, 'Morzi Hotels', 'Exquisite Room', 43000, 3),
(26, 'Uyi Grand Hotel', 'Basic Room', 17000, 13),
(27, 'Uyi Grand Hotel', 'Royal Suite', 56000, 2);

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
(2, 'Kelly', 'Ikpefua', 'yMcmb@her0123', '07068897068', 'onostarkels@gmail.com', '23 sapele road', 'Benin', '2022-03-14 09:15:18'),
(3, 'Paul', 'Ikpefua', 'paulinh0', '08035716496', 'paulinhonavas@gmail.com', '23 Father Healey Street, Warri', '', '2022-06-25 23:09:56'),
(5, 'Toyin', 'Faniran', 'oluwat0y1n', '08100653703', 'gazelle@gmail.com', '23 Badagry Road, Lagos', '', '2022-07-10 11:40:47');

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
-- Dumping data for table `store_payments`
--

INSERT INTO `store_payments` (`payment_id`, `exhibitor`, `package`, `payment_slip`, `payment_status`, `payment_date`) VALUES
(1, 14, 19, 'beans-with-plantain.jpg', 1, '2022-07-02 08:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcn_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_receipt` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `pcn_number`, `res_state`, `whatsapp`, `other_number`, `user_email`, `passport`, `payment_receipt`, `reg_number`, `reg_date`, `payment_status`, `attendance`, `gender`) VALUES
(76, '', 'Admin', '12345', '', '', '', '', '', '', '', '2022-03-14 08:54:45', 0, 0, ''),
(99, 'Kelly', 'Ikpefua', '425716', 'Edo', '07068897068', '07057456882', 'onostarkels@gmail.com', 'chef pee.png', '', 'EDO/2022/001/0099', '2022-03-20 13:15:49', 2, 1, 'M'),
(100, 'Kalvin', 'Paul', '223344', 'Edo', '08035716496', '0988888', 'paulinhonavas@gmail.com', 'akpu-egusi.jpg', 'cake_slide2.jpg', 'EDO/2022/002/00100', '2022-03-20 13:25:55', 2, 1, 'M'),
(101, 'James', 'Jimoh', '000011', 'Lagos', '08023232344', '08012334455', 'james@gmail.com', 'chef-pee-corporate-beans-plantain.jpg', 'cake_slide2.jpg', 'LAG/2022/001/00101', '2022-03-21 03:07:54', 2, 0, 'M'),
(104, 'James', 'John', '111122', 'Lagos', '0806677777', '0990099', 'james@gmail.com', 'beans-with-plantain.jpg', '', 'LAG/2022/002/00104', '2022-03-21 03:14:22', 2, 1, 'm'),
(106, 'Justice', 'Oseghae', '691141', 'Anambra', '08069114149', '0909998877', 'm.oseghae@appliedmacros.com', 'cake3.jpg', 'akpu-egusi.jpg', 'ANA/2022/001/00106', '2022-03-21 05:26:46', 2, 0, 'M'),
(107, 'Cynthia', 'Ikpefua', '688970', 'Edo', '07057456881', '', 'cy@gmail.com', 'akpu-egusi.jpg', 'sponge_bob cake.jpg', 'EDO/2022/003/00107', '2022-03-21 05:41:23', 2, 0, 'F'),
(108, 'Chima', 'Onyema', '002299', 'Edo', '08122334455', '08122334455', 'mexylj@yahoo.com', 'chef pee.png', 'akpu-egusi.jpg', 'EDO/2022/006/00108', '2022-03-21 07:36:53', 2, 0, 'M'),
(109, 'Kenneth', 'Okhuakhua', '003399', 'Edo', '09188776655', '0909998877', 'ken@gmail.com', 'banga-soup.jpg', 'cake_slide2.jpg', 'EDO/2022/004/00109', '2022-03-21 07:38:08', 2, 0, 'M'),
(110, 'Rufus', 'Ehizokhale', '001188', 'Edo', '089000111', '098111000', 'rufus@gmail.com', 'beddings7.jpg', 'cake_slide2.jpg', 'EDO/2022/005/00110', '2022-03-21 07:39:06', 2, 0, 'M'),
(111, 'Dorcas', 'Faniran', '653703', 'Osun', '08100653703', '0705442277', 'gazelle@gmail.com', 'akpu-egusi.jpg', 'cake_slide2.jpg', 'OSU/2022/001/00111', '2022-03-21 07:54:40', 2, 0, 'F');

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
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

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
-- Indexes for table `paid_members`
--
ALTER TABLE `paid_members`
  ADD PRIMARY KEY (`payment_id`);

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
-- Indexes for table `request_hotel`
--
ALTER TABLE `request_hotel`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `exhibitors`
--
ALTER TABLE `exhibitors`
  MODIFY `exhibitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `paid_members`
--
ALTER TABLE `paid_members`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `request_hotel`
--
ALTER TABLE `request_hotel`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `shoppers`
--
ALTER TABLE `shoppers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_payments`
--
ALTER TABLE `store_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
