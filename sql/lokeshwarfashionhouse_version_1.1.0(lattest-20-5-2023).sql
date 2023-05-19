-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 09:56 PM
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
-- Database: `lokeshwarfashionhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_phone_no` int(255) NOT NULL,
  `admin_description` varchar(255) NOT NULL,
  `admin_photo` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `otp` varchar(255) NOT NULL,
  `admin_last_ip_address` varchar(255) NOT NULL,
  `admin_last_used_os` varchar(255) NOT NULL,
  `admin_last_used_device` varchar(255) NOT NULL,
  `active_theme` varchar(255) NOT NULL,
  `admin_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `admin_phone_no`, `admin_description`, `admin_photo`, `datetime`, `otp`, `admin_last_ip_address`, `admin_last_used_os`, `admin_last_used_device`, `active_theme`, `admin_role`) VALUES
(1, 'Birat', 'biratdeb82@gmail.com', '$2y$10$vqq1iEMyIKaibGQ7A4BR2Obl7Pv/BDYULUNfn93Lf8yqWp5/701wO', 5521211, 'dfds', 'pexels-hugo-sykes-14891032 (1).jpg', '2023-02-25 22:22:50', '3759', '', '', '', 'light-theme', 'admin'),
(2, 'Lokeshwar', 'lokeshwarfashionhouse@gmail.com', '$2y$10$LMFvkVZAdazko6t/voVABOj8DD2Nzq5eu3cGQSRQCaVHAL65hRipW', 0, '', '', '2023-02-26 14:35:56', '4185', '', '', '', '', 'users'),
(3, 'dfd', 'jhumur.roy.pro@gmail.com', '', 552121, 'ghhg', 'ghg', '2023-02-26 15:20:04', '', '', '', '', '', ''),
(4, 'Lipi Roy', 'jhumur.roy.pro@gmail.com', '$2y$10$/bsZj3LZUrx/xJcZO51GCeF9EQhJd52SRuLpjk9k1JBuPVHTD6Sme', 0, '', 'maxresdefault.jpg', '2023-02-27 03:52:07', '', '', '', '', '', 'admin'),
(5, 'Lipi', 'jhumur.roy.pro@gmail.com', '$2y$10$It5IFdfWtVVxkTmmy0bbX.fE4GKSjKDUX.gRl9H51HLkFxzN.2/2S', 0, '', 'maxresdefault.jpg', '2023-02-27 03:58:39', '', '', '', '', '', 'admin'),
(6, 'Lokeshwar Deb', 'lokeshwarfashionhouse@gmail.com', '$2y$10$iU5ZMJTddP0FkJ1fcTunguvvd.TwSYd4JS8awAmpSmJb1Lb9CMl8e', 4568, '', 'pink-room.jpg.jpeg', '2023-02-27 05:07:43', '6559', '::1', 'Windows 10', 'Computer', 'light-theme', 'Admin'),
(8, 'jh', 'jhumur.roy.pro@gmail.com', '$2y$10$/Eg9UkmgKmnjf2TF95IkKu1.IaQ2GGpx.iv6CMvP9XGciksAx9l9q', 12, 'jh', 'delivery.png.jpeg', '2023-05-17 17:55:23', '', '', '', '', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `cus_id` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone_no` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `join_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `cus_id`, `customer_name`, `customer_email`, `customer_phone_no`, `customer_address`, `join_datetime`) VALUES
(1007, '13', 'Lokanth baba', 'lokeshwarfashionhouse@gmail.com', '1212', 'Bangladesh', '2023-03-30 02:34:50'),
(1009, '15', 'Birat', 'lokeshwarfashionhouse@gmail.com', '12', 'Bangladesh', '2023-03-30 02:40:25'),
(1010, '16', 'Lokeshwar Deb', 'lokeshwarfashionhouse@gmail.com', '12', 'Bangladesh', '2023-03-30 04:06:33'),
(1014, '48', 'Jhumur Roy', 'biratdeb82@gmail.com', '12', 'D', '2023-05-18 12:17:10'),
(1020, '54', 'Om Namah Shivay', 'biratdeb82@gmail.com', '12', '12', '2023-05-18 12:49:51'),
(1027, '61', 'Beauty', 'biratdeb82@gmail.com', '12', '12', '2023-05-18 13:49:50'),
(1028, '62', 'Jhumur Roy Beauty', 'biratdeb82@gmail.com', '12', 'Bangladesh', '2023-05-18 23:48:57'),
(1029, '63', 'Lipi Roy', 'biratdeb82@gmail.com', '12', '12', '2023-05-19 12:52:57'),
(1030, '64', 'Anju Das', 'biratdeb82@gmail.com', '12', '12', '2023-05-19 16:46:37'),
(1031, '65', 'chi', 'biratdeb82@gmail.com', '12', '12', '2023-05-19 16:54:45'),
(1032, '66', 'chinidi', 'biratdeb82@gmail.com', '12', '12', '2023-05-19 17:19:50'),
(1033, '67', 'chinidi n', 'biratdeb82@gmail.com', '12', '12', '2023-05-19 20:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `cus_users`
--

CREATE TABLE `cus_users` (
  `cus_id` int(11) NOT NULL,
  `cus_username` varchar(255) NOT NULL,
  `cus_desc` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_phone_no` varchar(255) NOT NULL,
  `cus_pass` varchar(255) NOT NULL,
  `cus_photo` varchar(255) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `cus_last_ip_address` varchar(255) NOT NULL,
  `cus_last_used_os` varchar(255) NOT NULL,
  `cus_last_used_device` varchar(255) NOT NULL,
  `verify_status` varchar(255) NOT NULL,
  `cus_joined_datatime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cus_users`
--

INSERT INTO `cus_users` (`cus_id`, `cus_username`, `cus_desc`, `cus_email`, `cus_phone_no`, `cus_pass`, `cus_photo`, `cus_address`, `otp`, `cus_last_ip_address`, `cus_last_used_os`, `cus_last_used_device`, `verify_status`, `cus_joined_datatime`) VALUES
(13, 'Lokanth baba', '', 'lokeshwarfashionhouse@gmail.com', '1212', '$2y$10$8ciq/fMS2tHA9R1rWlPrQeohUqVEA74A/ZMUkQx9sH1Pqef4Z/RT.', 'oc-gonzalez-xg8z_KhSorQ-unsplash.jpg', 'Bangladesh', '', '', '', '', '', '2023-03-30 02:34:50'),
(15, 'Birat', '', 'lokeshwarfashionhouse@gmail.com', '12', '$2y$10$aw.7gi26F0/jbwOktwkcduVIrWaulcCjE9MtahZUZWnLTRlmngWGq', '', 'Bangladesh', '', '', '', '', '', '2023-03-30 02:40:25'),
(16, 'Lokeshwar Deb', 'this is my description', 'lokeshwarfashionhouse@gmail.com', '1212', '$2y$10$HzzCM/RFnfe7kGCJrPrFoO26Ls6w67lZ4jI9OcK7O0kOPW8lH5HEu', 'hand-tshirt.png.jpeg', 'Bangladesh', '', '::1', 'Windows 10', 'Computer', '', '2023-03-30 04:06:33'),
(48, 'Jhumur Roy', '', 'biratdeb82@gmail.com', '12', '$2y$10$znQy1H7SQPCIZoPf8ixTZeR0TBVLmZHwhnDN9Crz6b.JVIsdeLo2.', '', 'D', '', '', '', '', '', '2023-05-18 12:17:10'),
(54, 'Om Namah Shivay', '', 'biratdeb82@gmail.com', '12', '$2y$10$3ubD9hoZGvnEmjBq3TfNZuu6I9D8PE5zbZRP1FI1mcGUhBRsAii3i', '', '12', '25', '', '', '', '', '2023-05-18 12:49:51'),
(61, 'Beauty', '', 'biratdeb82@gmail.com', '12', '$2y$10$Qi4BwE53yMgP.vq9SL8wzOlN6xPTRXciz0VqGZtfyZI/nNjteKovi', '', '12', '8187', '', '', '', 'Email Verified', '2023-05-18 13:49:50'),
(62, 'Jhumur Roy Beauty', '', 'biratdeb82@gmail.com', '12', '$2y$10$i5wI9D4NBHfb0qXgQis3W.0LOJaaeoGCfqs1NDi0L28rPDVYaaJmW', '', 'Bangladesh', '6075', '', '', '', 'Email Verified', '2023-05-18 23:48:57'),
(63, 'Lipi Roy', '', 'biratdeb82@gmail.com', '12', '$2y$10$fYVMfMJJDNJ.t.Wy4rghMeNzh6zTab4WJkqvYuUXY78mvwXqXgGBi', '', '12', '7162', '', '', '', 'Email Verified', '2023-05-19 12:52:57'),
(64, 'Anju Das', '', 'biratdeb82@gmail.com', '12', '$2y$10$WX37aRH5qKvzB3TRFjX/7e53NGAp0Yw.FV8X2VQEQN4YyuAndPE5W', '', '12', '2529', '::1', 'Windows 10', 'Computer', '', '2023-05-19 16:46:37'),
(65, 'chi', '', 'biratdeb82@gmail.com', '12', '$2y$10$X1pggcKXI/NkUbs7zvy4W.KtnRhebeOn7D3DgWtZjOylQkm1go0pW', '', '12', '9105', '', '', '', '', '2023-05-19 16:54:45'),
(66, 'chinidi', '', 'biratdeb82@gmail.com', '12', '$2y$10$g0VfjXfqwUNJkWBrOdiSVe3.9MfwTwNYovLo2UepmCt4gxiFKZiBG', '', '12', '1868', '::1', 'Windows 10', 'Computer', '', '2023-05-19 17:19:50'),
(67, 'chinidi n', '', 'biratdeb82@gmail.com', '12', '$2y$10$LzEVqAh6YQxBOQUsl1rqpOlOdwEyIBcMpIy3umTgzX5lha1kHEgVW', '', '12', '5227', '::1', 'Windows 10', 'Computer', '', '2023-05-19 20:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `customer_id_on_order` varchar(255) NOT NULL,
  `order_phone_no` varchar(255) NOT NULL,
  `order_shipping_address` varchar(255) NOT NULL,
  `order_delivered_datetime` varchar(255) NOT NULL,
  `order_est_delivery_datetime` varchar(255) NOT NULL,
  `order_accepting_status` varchar(255) NOT NULL,
  `order_packaging_status` varchar(255) NOT NULL,
  `courier_handing_status` varchar(255) NOT NULL,
  `courier_handing_desc` varchar(255) NOT NULL,
  `order_placed_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `packaging_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `product_last_checked_in` varchar(255) NOT NULL,
  `product_last_checked_in_datetime` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `orders_quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `cancel_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `product_id`, `customer_id_on_order`, `order_phone_no`, `order_shipping_address`, `order_delivered_datetime`, `order_est_delivery_datetime`, `order_accepting_status`, `order_packaging_status`, `courier_handing_status`, `courier_handing_desc`, `order_placed_datetime`, `packaging_status`, `payment_method`, `payment_status`, `product_last_checked_in`, `product_last_checked_in_datetime`, `total_amount`, `orders_quantity`, `price`, `order_status`, `cancel_reason`) VALUES
(61, '#lokfa050420237773', '2', '1010', '', 'Bangladesh', '', '', '', '', 'handed on courier', '', '2023-04-27 02:25:26', '', 'cod', '', '', '', '50', '', '', '', ''),
(62, '#lokfa05042023845761', '10', '1010', '', 'Bangladesh', '', '', '', '', '', '', '2023-10-26 02:25:42', '', 'cod', '', '', '', '5', '', '', '', ''),
(63, '#lokfa05042023845761', '16', '1010', '', 'Bangladesh', '', '', '', '', '', '', '1900-01-12 02:26:37', '', 'cod', '', '', '', '505', '', '', '', ''),
(64, '#lokfa05042023275863', '1', '1010', '1212', 'Bangladesh', '', '4545454', '', '', 'handed on courier', '', '2023-01-19 02:26:59', '', 'cod', 'unpaid', '', '06-04-2023 02:59:56:am', '5', '', '', 'cancelled', 'not accepted by admin'),
(65, '#lokfa06042023114564', '1', '1010', '1212', 'Bangladesh', '', '25-3-2023', 'order accepted', 'packaging has started -dkjkdjk454', 'handed on courier', '', '2023-04-06 01:58:08', '', 'cod', 'paid', '', '06-04-2023 02:53:55:am', '5', '', '', 'completed', 'order_completed'),
(66, '#lokfa09042023656765', '1', '1010', '1212', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 22:45:03', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(67, '#lokfa09042023656765', '2', '1010', '1212', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 22:45:03', '', 'cod', '', '', '', '55', '', '', 'pending', ''),
(68, '#lokfa09042023501067', '1', '1010', '1212', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 23:09:11', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(69, '#lokfa09042023822368', '1', '1010', '1212', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 23:09:52', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(70, '#lokfa09042023822368', '2', '1010', '1212', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 23:09:52', '', 'cod', '', '', '', '55', '', '', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_customers`
--

CREATE TABLE `order_customers` (
  `id` int(11) NOT NULL,
  `cus_id` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `customer_firstname` varchar(255) NOT NULL,
  `customer_lastname` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_customers`
--

INSERT INTO `order_customers` (`id`, `cus_id`, `order_no`, `customer_firstname`, `customer_lastname`, `datetime`) VALUES
(24, '1010', '#lokfa050420237773', 'Lipi', 'Roy', '2023-04-05 16:59:22'),
(25, '1010', '#lokfa05042023845761', 'Lipi', 'Roy', '2023-04-05 17:00:33'),
(26, '1010', '#lokfa05042023845761', 'Lipi', 'Roy', '2023-04-05 17:00:33'),
(27, '1010', '#lokfa05042023275863', 'Lipi', 'Roy', '2023-04-05 22:24:30'),
(28, '1010', '#lokfa06042023114564', 'Lipi', 'Roy', '2023-04-06 01:58:08'),
(29, '1010', '#lokfa09042023656765', 'David', 'Deb', '2023-04-09 22:45:03'),
(30, '1010', '#lokfa09042023656765', 'David', 'Deb', '2023-04-09 22:45:04'),
(31, '1010', '#lokfa09042023501067', 'David', 'Deb', '2023-04-09 23:09:11'),
(32, '1010', '#lokfa09042023822368', 'David', 'Deb', '2023-04-09 23:09:52'),
(33, '1010', '#lokfa09042023822368', 'David', 'Deb', '2023-04-09 23:09:52'),
(34, '1010', '#lokfa17052023226170', 'Lokeshwar ', 'Deb', '2023-05-17 20:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(255) NOT NULL,
  `orders_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `customer_id_on_order` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `orders_id`, `product_id`, `product_qty`, `customer_id_on_order`, `datetime`) VALUES
(61, '#lokfa050420237773', '2', '1', '1010', '2023-04-05 16:59:22'),
(62, '#lokfa05042023845761', '10', '1', '1010', '2023-04-05 17:00:33'),
(63, '#lokfa05042023845761', '16', '1', '1010', '2023-04-05 17:00:33'),
(64, '#lokfa05042023275863', '1', '1', '1010', '2023-04-05 22:24:30'),
(65, '#lokfa06042023114564', '1', '1', '1010', '2023-04-06 01:58:08'),
(66, '#lokfa09042023656765', '1', '1', '1010', '2023-04-09 22:45:03'),
(67, '#lokfa09042023656765', '2', '1', '1010', '2023-04-09 22:45:04'),
(68, '#lokfa09042023501067', '1', '1', '1010', '2023-04-09 23:09:11'),
(69, '#lokfa09042023822368', '1', '1', '1010', '2023-04-09 23:09:52'),
(70, '#lokfa09042023822368', '2', '1', '1010', '2023-04-09 23:09:52'),
(71, '#lokfa17052023226170', '1', '1', '1010', '2023-05-17 20:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` int(11) NOT NULL,
  `hero_aria_bold_word` varchar(255) NOT NULL,
  `hero_aria_offer_title` varchar(255) NOT NULL,
  `hero_aria_offer_title_photo` varchar(255) NOT NULL,
  `hero_aria_offer_canvas_img1` varchar(255) NOT NULL,
  `hero_aria_offer_canvas_img2` varchar(255) NOT NULL,
  `hero_aria_offer_canvas_img3` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `hero_aria_bold_word`, `hero_aria_offer_title`, `hero_aria_offer_title_photo`, `hero_aria_offer_canvas_img1`, `hero_aria_offer_canvas_img2`, `hero_aria_offer_canvas_img3`, `datetime`) VALUES
(1, 'fd', 'fd', 'google.png.jpeg', 'hand-tshirt.png.jpeg', 'f', 'f', '2023-05-17 18:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `promo_code_discount` varchar(255) NOT NULL,
  `make_as_featured` varchar(255) NOT NULL,
  `product_added_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_img`, `product_price`, `product_status`, `promo_code`, `promo_code_discount`, `make_as_featured`, `product_added_datetime`) VALUES
(1, 'this is bestd', 'fjfjh fhfejhejn jj jjjjj jnjfuijuid theu jvew gun mdeuhuj dnd ndu u dnjn fj dnj bd hjdhjbnjnjd  djd j  ds  mdfnj dj mndnio iojifk nkfjk k jn kkdkfjij kmnkofokmek  fnjnjke njk fj nj n kkcnjnf j jf jk jk fk nkf \r\nmm', 'lokesfahou-haq-katan-11252736246.jpg', '5', 'In-stock', 'LOKFASHOU153172', '10', 'featured_product', '2023-01-14 23:34:38'),
(2, 'f', 'ss', 'lokesfahou-haq-katan-1125273626.jpg', '50', 'Out-stock', 'LOKFASHOU153172', '10', 'featured_product', '2023-01-14 23:37:18'),
(10, 'Katan sari(কাতান শাড়ি) ', 'নতুন কাতান শাড়ি মহিলাদের জন্য ', 'lokesfahou-haq-katan-11252736246.jpg', '5', 'In-stock', 'LOKFASHOU153172', '10', 'featured_product', '2023-03-03 23:51:24'),
(15, 'Katan sari(কাতান শাড়ি) ', 'dfhjhdfjhfd', 'lokesfahou-haq-katan-1125273626.jpg', '550', 'In-stock', 'LOKFASHOU158806', '', 'not_featured_product', '2023-03-04 01:56:19'),
(16, 'Katan sari(কাতান শাড়ি) dsffsfgr', 'katan sarifjhjfdh tuhfkjkfdkjks', 'dawid-zawila--G3rw6Y02D0-unsplash.jpg', '500', 'In-stock', 'LOKFASHOU166268', '', 'not_featured_product', '2023-03-04 02:01:25'),
(17, 'Katan sari(কাতান শাড়ি)GG=', 'the new katan sari Katan sari(কাতান শাড়ি)dfdfdfdsfGF', '', '5004554', 'Out-stock', 'LOKFASHOU178911', '', 'not_featured_product', '2023-03-04 02:07:06'),
(19, 'ghh', 'lk;', 'lokesfahou-haq-katan-11252736246.jpg', '5858', 'Out-stock', 'LOKFASHOU195852', '', 'not_featured_product', '2023-03-04 02:58:12'),
(22, 'the best product', 'ggf', 'shirts-bundle.jpg.jpeg', '50', 'In-stock', '', '', '', '2023-05-17 17:45:07'),
(23, 'the best product', 'ggf', 'shirts-bundle.jpg.jpeg', '50', 'In-stock', '', '', '', '2023-05-17 17:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `promo_id` int(11) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `promo_discount` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo_code`
--

INSERT INTO `promo_code` (`promo_id`, `promo_code`, `promo_discount`, `datetime`) VALUES
(1, 'LOKFASHOU153172', '10', '2023-03-27 16:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `website_description` varchar(255) NOT NULL,
  `website_contract_email` varchar(255) NOT NULL,
  `website_slogan` varchar(255) NOT NULL,
  `product_currency` varchar(255) NOT NULL,
  `logo_img_upload` varchar(255) NOT NULL,
  `admin_photo` varchar(255) NOT NULL,
  `login_img` varchar(255) NOT NULL,
  `users_login_img` varchar(255) NOT NULL,
  `authors_name` varchar(255) NOT NULL,
  `authors_email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `active_theme` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_description`, `website_contract_email`, `website_slogan`, `product_currency`, `logo_img_upload`, `admin_photo`, `login_img`, `users_login_img`, `authors_name`, `authors_email`, `company_name`, `phone_no`, `active_theme`, `datetime`) VALUES
(4, 'Jai sri ramkrishna', 'jai sri ramkrishna this is a checking', '', '', '', 'joy-baba-loknath.png', '', '328289925_862151155072334_3389313899434758256_n.jpg', '', 'Sri ramkrishna', 'jaisriramkrishna@ramkrishna.com', 'Sri Ramkrishna Limited', '45454', '', '2023-01-24 20:19:47'),
(5, 'Jai sri ramkrishna', 'We are a online fashion store. You will find fashionable and designable clothes on our store. We are a online fashion store. You will find fashionable and designable clothes on our store. We are a online fashion store. You will find fashionable and design', 'lokeshwarfashionhouse@gmail.com', 'feel the shopping jai sri ramkrishna', 'bdt', 'delivery-man.png.jpeg', '', 'back_img.jpg.jpeg', 'front-self.jpg.jpeg', 'Sri ramkrishna', 'jaisriramkrishna@ramkrishna.com', 'Sri Ramkrishna Limited', '45454', '', '2023-02-26 14:57:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `cus_users`
--
ALTER TABLE `cus_users`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_customers`
--
ALTER TABLE `order_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;

--
-- AUTO_INCREMENT for table `cus_users`
--
ALTER TABLE `cus_users`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `order_customers`
--
ALTER TABLE `order_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
