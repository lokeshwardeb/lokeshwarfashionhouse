-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 08:49 AM
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
-- Table structure for table `analyzer`
--

CREATE TABLE `analyzer` (
  `id` int(11) NOT NULL,
  `user_ip_address` varchar(255) NOT NULL,
  `user_os` varchar(255) NOT NULL,
  `user_browser` varchar(255) NOT NULL,
  `user_device` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analyzer`
--

INSERT INTO `analyzer` (`id`, `user_ip_address`, `user_os`, `user_browser`, `user_device`, `datetime`) VALUES
(4, '::1', 'Windows 10', 'Chrome', 'Computer', '2023-05-24 01:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `analyzer_unique_users`
--

CREATE TABLE `analyzer_unique_users` (
  `id` int(11) NOT NULL,
  `unique_users` varchar(255) NOT NULL,
  `users_ip_address` varchar(255) NOT NULL,
  `users_os` varchar(255) NOT NULL,
  `users_browser` varchar(255) NOT NULL,
  `users_device` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analyzer_unique_users`
--

INSERT INTO `analyzer_unique_users` (`id`, `unique_users`, `users_ip_address`, `users_os`, `users_browser`, `users_device`, `datetime`) VALUES
(3, 'yes', '::1', 'Windows 10', 'Chrome', 'Computer', '2023-05-24 03:16:58'),
(4, 'yes', '::1', 'Windows 10', 'Chrome', 'Computer', '2023-05-24 03:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `city/state`
--

CREATE TABLE `city/state` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `zip_code/post_code` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city/state`
--

INSERT INTO `city/state` (`district_id`, `district_name`, `zip_code/post_code`, `datetime`) VALUES
(1, 'Dhaka', '', '2023-05-20 19:27:59'),
(2, 'Faridpur', '', '2023-05-20 19:28:18'),
(3, 'Gazipur', '', '2023-05-20 19:35:34'),
(4, 'Gopalganj', '', '2023-05-20 19:35:50'),
(5, 'Jamalpur', '', '2023-05-20 19:36:06'),
(6, 'Kishoreganj', '', '2023-05-20 19:37:34'),
(7, 'Madaripur', '', '2023-05-20 19:38:52'),
(8, 'Manikganj', '', '2023-05-20 19:39:09'),
(9, 'Munshiganj', '', '2023-05-20 19:39:21'),
(10, 'Mymensingh', '', '2023-05-20 19:39:31'),
(11, 'Narayanganj', '', '2023-05-20 19:39:40'),
(12, 'Narsingdi', '', '2023-05-20 19:39:55'),
(13, 'Netrokona', '', '2023-05-20 19:40:24'),
(14, 'Rajbari', '', '2023-05-20 19:40:36'),
(15, 'Shariatpur', '', '2023-05-20 19:40:47'),
(16, 'Sherpur', '', '2023-05-20 19:40:59'),
(17, 'Tangail', '', '2023-05-20 19:41:13'),
(18, 'Bogra', '', '2023-05-20 19:41:26'),
(19, 'Joypurhat', '', '2023-05-20 19:41:41'),
(20, 'Naogaon', '', '2023-05-20 19:41:52'),
(21, 'Natore', '', '2023-05-20 19:42:05'),
(22, 'Nawabganj', '', '2023-05-20 19:42:14'),
(23, 'Pabna', '', '2023-05-20 19:42:39'),
(24, 'Rajshahi', '', '2023-05-20 19:42:49'),
(25, 'Sirajgonj', '', '2023-05-20 19:43:00'),
(26, 'Dinajpur', '', '2023-05-20 19:43:15'),
(27, 'Gaibandha', '', '2023-05-20 19:43:25'),
(28, 'Kurigram', '', '2023-05-20 19:44:15'),
(29, 'Lalmonirhat', '', '2023-05-20 19:44:33'),
(30, 'Nilphamari', '', '2023-05-20 19:44:43'),
(31, 'Panchagarh', '', '2023-05-20 19:47:04'),
(32, 'Rangpur', '', '2023-05-20 19:47:17'),
(33, 'Thakurgaon', '', '2023-05-20 19:47:31'),
(34, 'Barguna', '', '2023-05-20 19:47:43'),
(35, 'Barisal', '', '2023-05-20 19:48:32'),
(36, 'Bhola', '', '2023-05-20 19:48:43'),
(37, 'Jhalokati', '', '2023-05-20 19:48:54'),
(38, 'Patuakhali', '', '2023-05-20 19:49:04'),
(39, 'Pirojpur', '', '2023-05-20 19:49:15'),
(40, 'Bandarban', '', '2023-05-20 19:49:27'),
(41, 'Brahmanbaria', '', '2023-05-20 19:49:38'),
(42, 'Chandpur', '', '2023-05-20 19:49:52'),
(43, 'Chittagong', '', '2023-05-20 19:50:07'),
(44, 'Comilla', '', '2023-05-20 19:50:23'),
(45, 'Cox\'s Bazar ', '', '2023-05-20 19:50:44'),
(46, 'Feni', '', '2023-05-20 19:51:05'),
(47, 'Khagrachari', '', '2023-05-20 19:51:15'),
(48, 'Lakshmipur', '', '2023-05-20 19:51:30'),
(49, 'Noakhali', '', '2023-05-20 19:51:41'),
(50, 'Rangamati', '', '2023-05-20 19:51:53'),
(51, 'Habiganj', '', '2023-05-20 19:52:03'),
(52, 'Maulvibazar', '', '2023-05-20 19:52:17'),
(53, 'Sunamganj', '', '2023-05-20 19:52:30'),
(54, 'Sylhet', '', '2023-05-20 19:52:42'),
(55, 'Bagerhat', '', '2023-05-20 19:52:54'),
(56, 'Chuadanga', '', '2023-05-20 19:53:07'),
(57, 'Jessore', '', '2023-05-20 19:53:22'),
(58, 'Jhenaidah', '', '2023-05-20 19:53:34'),
(59, 'Khulna', '', '2023-05-20 19:53:59'),
(60, 'Kushtia', '', '2023-05-20 19:54:10'),
(61, 'Magura', '', '2023-05-20 19:54:19'),
(62, 'Meherpur', '', '2023-05-20 19:54:32'),
(63, 'Narail', '', '2023-05-20 19:54:42'),
(64, 'Satkhira', '', '2023-05-20 19:54:53');

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
(16, 'Lokeshwar Deb', 'this is my description', 'lokeshwarfashionhouse@gmail.com', '1212', '$2y$10$HzzCM/RFnfe7kGCJrPrFoO26Ls6w67lZ4jI9OcK7O0kOPW8lH5HEu', 'hand-tshirt.png.jpeg', 'Bangladesh', '4118', '::1', 'Windows 10', 'Computer', 'Email Verified', '2023-03-30 04:06:33'),
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
  `order_email` varchar(255) NOT NULL,
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

INSERT INTO `orders` (`id`, `order_no`, `product_id`, `customer_id_on_order`, `order_phone_no`, `order_email`, `order_shipping_address`, `order_delivered_datetime`, `order_est_delivery_datetime`, `order_accepting_status`, `order_packaging_status`, `courier_handing_status`, `courier_handing_desc`, `order_placed_datetime`, `packaging_status`, `payment_method`, `payment_status`, `product_last_checked_in`, `product_last_checked_in_datetime`, `total_amount`, `orders_quantity`, `price`, `order_status`, `cancel_reason`) VALUES
(61, '#lokfa050420237773', '2', '1010', '', '', 'Bangladesh', '', '', '', '', 'handed on courier', '', '2023-04-27 02:25:26', '', 'cod', '', '', '', '50', '', '', '', ''),
(62, '#lokfa05042023845761', '10', '1010', '', '', 'Bangladesh', '', '', '', '', '', '', '2023-10-26 02:25:42', '', 'cod', '', '', '', '5', '', '', '', ''),
(63, '#lokfa05042023845761', '16', '1010', '', '', 'Bangladesh', '', '', '', '', '', '', '1900-01-12 02:26:37', '', 'cod', '', '', '', '505', '', '', '', ''),
(64, '#lokfa05042023275863', '1', '1010', '1212', '', 'Bangladesh', '', '4545454', '', '', 'handed on courier', '', '2023-01-19 02:26:59', '', 'cod', 'unpaid', '', '06-04-2023 02:59:56:am', '5', '', '', 'cancelled', 'not accepted by admin'),
(65, '#lokfa06042023114564', '1', '1010', '1212', '', 'Bangladesh', '', '25-3-2023', 'order accepted', 'packaging has started -dkjkdjk454', 'handed on courier', '', '2023-04-06 01:58:08', '', 'cod', 'paid', '', '06-04-2023 02:53:55:am', '5', '', '', 'completed', 'order_completed'),
(66, '#lokfa09042023656765', '1', '1010', '1212', '', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 22:45:03', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(67, '#lokfa09042023656765', '2', '1010', '1212', '', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 22:45:03', '', 'cod', '', '', '', '55', '', '', 'pending', ''),
(68, '#lokfa09042023501067', '1', '1010', '1212', '', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 23:09:11', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(69, '#lokfa09042023822368', '1', '1010', '1212', '', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 23:09:52', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(70, '#lokfa09042023822368', '2', '1010', '1212', '', 'Dhaka, Dhaka-1100, Bangladesh', '', '16-04-2023', '', '', '', '', '2023-04-09 23:09:52', '', 'cod', '', '', '', '55', '', '', 'pending', ''),
(71, '#lokfa20052023371870', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Brahmanbaria, sadar-Dhaka-3400, Bangladesh', '', '27-05-2023', '', '', '', '', '2023-05-20 20:33:26', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(72, '#lokfa20052023140471', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '27-05-2023', '', '', '', '', '2023-05-20 23:29:09', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(73, '#lokfa20052023620572', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '27-05-2023', '', '', '', '', '2023-05-20 23:30:16', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(74, '#lokfa21052023605073', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Brahmanbaria, sadar-Brahmanbaria-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 00:12:26', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(75, '#lokfa21052023299774', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Brahmanbaria, sadar-Brahmanbaria-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 00:12:50', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(76, '#lokfa21052023739575', '2', '1010', '01776123062', '', 'Bangladesh, Brahmanbaria, sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 00:35:16', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(77, '#lokfa21052023389576', '2', '1010', '01776123062', '', 'Bangladesh, Brahmanbaria, sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 00:36:02', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(78, '#lokfa21052023817477', '2', '1010', '01776123062', '', 'Bangladesh, Brahmanbaria, sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 00:36:38', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(79, '#lokfa21052023376378', '2', '1010', '01776123062', '', 'Bangladesh, Brahmanbaria, sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 00:39:27', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(80, '#lokfa21052023468779', '2', '1010', '01776123062', '', 'Bangladesh, Brahmanbaria, sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 00:39:59', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(81, '#lokfa21052023634380', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 01:09:15', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(82, '#lokfa21052023698081', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Comilla-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 01:20:35', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(83, '#lokfa21052023154482', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 01:26:21', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(84, '#lokfa21052023135483', '', '1010', '1212', 'lokeshwarfashionhouse@gmail.com', 'Dhaka, Brahmanbaria, sadar-Gopalganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 01:41:49', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(85, '#lokfa21052023625084', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:01:44', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(86, '#lokfa21052023628485', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:02:51', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(87, '#lokfa21052023244386', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:04:57', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(88, '#lokfa21052023553887', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:05:29', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(89, '#lokfa21052023872788', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:08:13', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(90, '#lokfa21052023955789', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:08:56', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(91, '#lokfa21052023669190', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:10:34', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(92, '#lokfa21052023627191', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:12:13', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(93, '#lokfa21052023987492', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:12:57', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(94, '#lokfa21052023478393', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:14:12', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(95, '#lokfa21052023764394', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:15:16', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(96, '#lokfa21052023455095', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:18:34', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(97, '#lokfa21052023485896', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:19:47', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(98, '#lokfa21052023389597', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:20:51', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(99, '#lokfa21052023454998', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:21:32', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(100, '#lokfa21052023382499', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 17:21:51', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(101, '#lokfa210520233993100', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 18:58:46', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(102, '#lokfa210520231227101', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 19:00:21', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(103, '#lokfa210520237594102', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 19:00:48', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(104, '#lokfa210520235158103', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 19:13:19', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(105, '#lokfa210520231822104', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Kishoreganj-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 19:27:10', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(106, '#lokfa210520232018105', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 19:36:36', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(107, '#lokfa210520236977106', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 19:56:15', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(108, '#lokfa210520236788107', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 20:56:18', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(109, '#lokfa210520232303108', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 20:56:52', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(110, '#lokfa210520236438109', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 21:13:09', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(111, '#lokfa210520231907110', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 21:54:57', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(112, '#lokfa210520236191111', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 21:56:11', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(113, '#lokfa210520236664112', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 21:59:42', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(114, '#lokfa210520233980113', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 22:13:22', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(115, '#lokfa210520231194114', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 22:13:55', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(116, '#lokfa210520239750115', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 22:18:27', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(117, '#lokfa210520235441116', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 22:20:00', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(118, '#lokfa210520234601117', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 22:20:25', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(119, '#lokfa210520236466118', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 22:22:17', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(120, '#lokfa210520236644119', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 22:24:01', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(121, '#lokfa210520238160120', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Brahmanbaria, sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 22:25:48', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(122, '#lokfa210520239808121', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 22:27:23', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(123, '#lokfa210520237395122', '2', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '28-05-2023', '', '', '', '', '2023-05-21 23:59:39', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(124, '#lokfa220520234851123', '2', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 00:00:29', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(125, '#lokfa220520235720124', '2', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 00:02:15', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(126, '#lokfa220520232433125', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 00:11:04', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(127, '#lokfa220520239795126', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 00:27:39', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(128, '#lokfa220520234328127', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 00:52:41', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(129, '#lokfa220520234562128', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Tangail-3400, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 01:31:45', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(130, '#lokfa220520236524129', '2', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 01:43:23', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(131, '#lokfa220520235534130', '2', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 01:57:41', '', 'cod', '', '', '', '55', '', '', 'pending', ''),
(132, '#lokfa220520236048131', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 02:01:44', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(133, '#lokfa220520233270132', '2', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 02:03:39', '', 'cod', '', '', '', '55', '', '', 'pending', ''),
(134, '#lokfa220520231307133', '2', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '29-05-2023', '', '', '', '', '2023-05-22 02:33:00', '', 'cod', '', '', '', '55', '', '', 'pending', ''),
(135, '#lokfa250520235006134', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '01-06-2023', '', '', '', '', '2023-05-25 01:39:43', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(136, '#lokfa250520233214135', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '01-06-2023', '', '', '', '', '2023-05-25 01:41:15', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(137, '#lokfa250520231262136', '1', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '01-06-2023', '', '', '', '', '2023-05-25 01:49:43', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(138, '#lokfa250520232576137', '23', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gazipur-3400, Bangladesh', '', '01-06-2023', 'order accepted', 'packaging has started', 'handed on courier', '', '2023-05-25 02:04:48', '', 'cod', 'paid', '', '25-05-2023 09:26:28:pm', '110', '', '', 'In-process', 'order_In-process');

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
(34, '1010', '#lokfa17052023226170', 'Lokeshwar ', 'Deb', '2023-05-17 20:03:19'),
(35, '1010', '#lokfa20052023419170', 'Lipi', 'Roy', '2023-05-20 20:22:46'),
(36, '1010', '#lokfa20052023541770', 'Lipi', 'Roy', '2023-05-20 20:30:29'),
(37, '1010', '#lokfa20052023371870', 'Lipi', 'Roy', '2023-05-20 20:33:26'),
(38, '1010', '#lokfa20052023140471', 'Lipi', 'Roy', '2023-05-20 23:29:09'),
(39, '1010', '#lokfa20052023620572', 'Lipi', 'Roy', '2023-05-20 23:30:16'),
(40, '1010', '#lokfa21052023605073', 'Lipi', 'Roy', '2023-05-21 00:12:26'),
(41, '1010', '#lokfa21052023299774', 'Lipi', 'Roy', '2023-05-21 00:12:50'),
(42, '1010', '#lokfa21052023739575', 'Lipi', 'Roy', '2023-05-21 00:35:16'),
(43, '1010', '#lokfa21052023389576', 'Lipi', 'Roy', '2023-05-21 00:36:02'),
(44, '1010', '#lokfa21052023817477', 'Lipi', 'Roy', '2023-05-21 00:36:38'),
(45, '1010', '#lokfa21052023376378', 'Lipi', 'Roy', '2023-05-21 00:39:27'),
(46, '1010', '#lokfa21052023468779', 'Lipi', 'Roy', '2023-05-21 00:39:59'),
(47, '1010', '#lokfa21052023634380', 'Lipi', 'Roy', '2023-05-21 01:09:15'),
(48, '1010', '#lokfa21052023698081', 'Lipi', 'Roy', '2023-05-21 01:20:35'),
(49, '1010', '#lokfa21052023154482', 'Lipi', 'Roy', '2023-05-21 01:26:21'),
(50, '1010', '#lokfa21052023135483', 'Lokeshwar', 'Deb', '2023-05-21 01:41:49'),
(51, '1010', '#lokfa21052023625084', 'Lipi', 'Roy', '2023-05-21 17:01:44'),
(52, '1010', '#lokfa21052023628485', 'Lipi', 'Roy', '2023-05-21 17:02:51'),
(53, '1010', '#lokfa21052023244386', 'Lipi', 'Roy', '2023-05-21 17:04:57'),
(54, '1010', '#lokfa21052023553887', 'Lipi', 'Roy', '2023-05-21 17:05:29'),
(55, '1010', '#lokfa21052023872788', 'Lipi', 'Roy', '2023-05-21 17:08:13'),
(56, '1010', '#lokfa21052023955789', 'Lipi', 'Roy', '2023-05-21 17:08:56'),
(57, '1010', '#lokfa21052023669190', 'Lipi', 'Roy', '2023-05-21 17:10:34'),
(58, '1010', '#lokfa21052023627191', 'Lipi', 'Roy', '2023-05-21 17:12:13'),
(59, '1010', '#lokfa21052023987492', 'Lipi', 'Roy', '2023-05-21 17:12:57'),
(60, '1010', '#lokfa21052023478393', 'Lipi', 'Roy', '2023-05-21 17:14:12'),
(61, '1010', '#lokfa21052023764394', 'Lipi', 'Roy', '2023-05-21 17:15:16'),
(62, '1010', '#lokfa21052023455095', 'Lipi', 'Roy', '2023-05-21 17:18:34'),
(63, '1010', '#lokfa21052023485896', 'Lipi', 'Roy', '2023-05-21 17:19:47'),
(64, '1010', '#lokfa21052023389597', 'Lipi', 'Roy', '2023-05-21 17:20:51'),
(65, '1010', '#lokfa21052023454998', 'Lipi', 'Roy', '2023-05-21 17:21:32'),
(66, '1010', '#lokfa21052023382499', 'Lipi', 'Roy', '2023-05-21 17:21:51'),
(67, '1010', '#lokfa210520233993100', 'Lipi', 'Roy', '2023-05-21 18:58:46'),
(68, '1010', '#lokfa210520231227101', 'Lipi', 'Roy', '2023-05-21 19:00:21'),
(69, '1010', '#lokfa210520237594102', 'Lipi', 'Roy', '2023-05-21 19:00:48'),
(70, '1010', '#lokfa210520235158103', 'Lipi', 'Roy', '2023-05-21 19:13:19'),
(71, '1010', '#lokfa210520231822104', 'Lipi', 'Roy', '2023-05-21 19:27:10'),
(72, '1010', '#lokfa210520232018105', 'Lipi', 'Roy', '2023-05-21 19:36:36'),
(73, '1010', '#lokfa210520236977106', 'Lipi', 'Roy', '2023-05-21 19:56:15'),
(74, '1010', '#lokfa210520236788107', 'Lipi', 'Roy', '2023-05-21 20:56:18'),
(75, '1010', '#lokfa210520232303108', 'Lipi', 'Roy', '2023-05-21 20:56:52'),
(76, '1010', '#lokfa210520236438109', 'Lipi', 'Roy', '2023-05-21 21:13:09'),
(77, '1010', '#lokfa210520231907110', 'Lipi', 'Roy', '2023-05-21 21:54:57'),
(78, '1010', '#lokfa210520236191111', 'Lipi', 'Roy', '2023-05-21 21:56:11'),
(79, '1010', '#lokfa210520236664112', 'Lipi', 'Roy', '2023-05-21 21:59:42'),
(80, '1010', '#lokfa210520233980113', 'Lipi', 'Roy', '2023-05-21 22:13:22'),
(81, '1010', '#lokfa210520231194114', 'Lipi', 'Roy', '2023-05-21 22:13:55'),
(82, '1010', '#lokfa210520239750115', 'Lipi', 'Roy', '2023-05-21 22:18:27'),
(83, '1010', '#lokfa210520235441116', 'Lipi', 'Roy', '2023-05-21 22:20:00'),
(84, '1010', '#lokfa210520234601117', 'Lipi', 'Roy', '2023-05-21 22:20:25'),
(85, '1010', '#lokfa210520236466118', 'Lipi', 'Roy', '2023-05-21 22:22:17'),
(86, '1010', '#lokfa210520236644119', 'Lipi', 'Roy', '2023-05-21 22:24:01'),
(87, '1010', '#lokfa210520238160120', 'Lipi', 'Roy', '2023-05-21 22:25:48'),
(88, '1010', '#lokfa210520239808121', 'Lipi', 'Roy', '2023-05-21 22:27:23'),
(89, '1010', '#lokfa210520237395122', 'Lipi', 'Roy', '2023-05-21 23:59:39'),
(90, '1010', '#lokfa220520234851123', 'Lipi', 'Roy', '2023-05-22 00:00:29'),
(91, '1010', '#lokfa220520235720124', 'Lipi', 'Roy', '2023-05-22 00:02:15'),
(92, '1010', '#lokfa220520232433125', 'Lipi', 'Roy', '2023-05-22 00:11:04'),
(93, '1010', '#lokfa220520239795126', 'Lipi', 'Roy', '2023-05-22 00:27:39'),
(94, '1010', '#lokfa220520234328127', 'Lipi', 'Roy', '2023-05-22 00:52:41'),
(95, '1010', '#lokfa220520234562128', 'Lipi', 'Roy', '2023-05-22 01:31:45'),
(96, '1010', '#lokfa220520236524129', 'Lipi', 'Roy', '2023-05-22 01:43:23'),
(97, '1010', '#lokfa220520235534130', 'Lipi', 'Roy', '2023-05-22 01:57:41'),
(98, '1010', '#lokfa220520235534130', 'Lipi', 'Roy', '2023-05-22 01:57:41'),
(99, '1010', '#lokfa220520236048131', 'Lipi', 'Roy', '2023-05-22 02:01:44'),
(100, '1010', '#lokfa220520233270132', 'Lipi', 'Roy', '2023-05-22 02:03:39'),
(101, '1010', '#lokfa220520233270132', 'Lipi', 'Roy', '2023-05-22 02:03:39'),
(102, '1010', '#lokfa220520231307133', 'Lipi', 'Roy', '2023-05-22 02:33:00'),
(103, '1010', '#lokfa220520231307133', 'Lipi', 'Roy', '2023-05-22 02:33:00'),
(104, '1010', '#lokfa250520235006134', 'Lipi', 'Roy', '2023-05-25 01:39:43'),
(105, '1010', '#lokfa250520233214135', 'Lipi', 'Roy', '2023-05-25 01:41:15'),
(106, '1010', '#lokfa250520231262136', 'Lipi', 'Roy', '2023-05-25 01:49:43'),
(107, '1010', '#lokfa250520232576137', 'Lipi', 'Roy', '2023-05-25 02:04:48'),
(108, '1010', '#lokfa250520232576137', 'Lipi', 'Roy', '2023-05-25 02:04:48'),
(109, '1010', '#lokfa250520232576137', 'Lipi', 'Roy', '2023-05-25 02:04:48'),
(110, '1010', '#lokfa250520232576137', 'Lipi', 'Roy', '2023-05-25 02:04:48');

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
(71, '#lokfa17052023226170', '1', '1', '1010', '2023-05-17 20:03:19'),
(72, '#lokfa20052023419170', '', '', '1010', '2023-05-20 20:22:46'),
(73, '#lokfa20052023541770', '1', '1', '1010', '2023-05-20 20:30:29'),
(74, '#lokfa20052023371870', '1', '1', '1010', '2023-05-20 20:33:26'),
(75, '#lokfa20052023140471', '', '', '1010', '2023-05-20 23:29:09'),
(76, '#lokfa20052023620572', '', '', '1010', '2023-05-20 23:30:16'),
(77, '#lokfa21052023605073', '', '', '1010', '2023-05-21 00:12:26'),
(78, '#lokfa21052023299774', '', '', '1010', '2023-05-21 00:12:50'),
(79, '#lokfa21052023739575', '2', '1', '1010', '2023-05-21 00:35:16'),
(80, '#lokfa21052023389576', '2', '1', '1010', '2023-05-21 00:36:02'),
(81, '#lokfa21052023817477', '2', '1', '1010', '2023-05-21 00:36:38'),
(82, '#lokfa21052023376378', '2', '1', '1010', '2023-05-21 00:39:27'),
(83, '#lokfa21052023468779', '2', '1', '1010', '2023-05-21 00:39:59'),
(84, '#lokfa21052023634380', '', '1', '1010', '2023-05-21 01:09:15'),
(85, '#lokfa21052023698081', '', '', '1010', '2023-05-21 01:20:35'),
(86, '#lokfa21052023154482', '1', '1', '1010', '2023-05-21 01:26:21'),
(87, '#lokfa21052023135483', '', '', '1010', '2023-05-21 01:41:49'),
(88, '#lokfa21052023625084', '', '', '1010', '2023-05-21 17:01:44'),
(89, '#lokfa21052023628485', '', '', '1010', '2023-05-21 17:02:51'),
(90, '#lokfa21052023244386', '', '', '1010', '2023-05-21 17:04:57'),
(91, '#lokfa21052023553887', '', '', '1010', '2023-05-21 17:05:29'),
(92, '#lokfa21052023872788', '', '', '1010', '2023-05-21 17:08:13'),
(93, '#lokfa21052023955789', '', '', '1010', '2023-05-21 17:08:56'),
(94, '#lokfa21052023669190', '', '', '1010', '2023-05-21 17:10:34'),
(95, '#lokfa21052023627191', '', '', '1010', '2023-05-21 17:12:13'),
(96, '#lokfa21052023987492', '', '', '1010', '2023-05-21 17:12:57'),
(97, '#lokfa21052023478393', '', '', '1010', '2023-05-21 17:14:12'),
(98, '#lokfa21052023764394', '', '', '1010', '2023-05-21 17:15:16'),
(99, '#lokfa21052023455095', '', '', '1010', '2023-05-21 17:18:34'),
(100, '#lokfa21052023485896', '', '', '1010', '2023-05-21 17:19:47'),
(101, '#lokfa21052023389597', '', '', '1010', '2023-05-21 17:20:51'),
(102, '#lokfa21052023454998', '', '', '1010', '2023-05-21 17:21:32'),
(103, '#lokfa21052023382499', '', '', '1010', '2023-05-21 17:21:51'),
(104, '#lokfa210520233993100', '', '', '1010', '2023-05-21 18:58:46'),
(105, '#lokfa210520231227101', '1', '1', '1010', '2023-05-21 19:00:21'),
(106, '#lokfa210520237594102', '1', '1', '1010', '2023-05-21 19:00:48'),
(107, '#lokfa210520235158103', '1', '1', '1010', '2023-05-21 19:13:19'),
(108, '#lokfa210520231822104', '1', '1', '1010', '2023-05-21 19:27:10'),
(109, '#lokfa210520232018105', '1', '1', '1010', '2023-05-21 19:36:36'),
(110, '#lokfa210520236977106', '1', '1', '1010', '2023-05-21 19:56:15'),
(111, '#lokfa210520236788107', '1', '1', '1010', '2023-05-21 20:56:18'),
(112, '#lokfa210520232303108', '1', '1', '1010', '2023-05-21 20:56:52'),
(113, '#lokfa210520236438109', '1', '1', '1010', '2023-05-21 21:13:09'),
(114, '#lokfa210520231907110', '1', '1', '1010', '2023-05-21 21:54:57'),
(115, '#lokfa210520236191111', '1', '1', '1010', '2023-05-21 21:56:11'),
(116, '#lokfa210520236664112', '1', '1', '1010', '2023-05-21 21:59:42'),
(117, '#lokfa210520233980113', '1', '1', '1010', '2023-05-21 22:13:22'),
(118, '#lokfa210520231194114', '1', '1', '1010', '2023-05-21 22:13:55'),
(119, '#lokfa210520239750115', '1', '1', '1010', '2023-05-21 22:18:27'),
(120, '#lokfa210520235441116', '1', '1', '1010', '2023-05-21 22:20:00'),
(121, '#lokfa210520234601117', '1', '1', '1010', '2023-05-21 22:20:25'),
(122, '#lokfa210520236466118', '1', '1', '1010', '2023-05-21 22:22:17'),
(123, '#lokfa210520236644119', '1', '1', '1010', '2023-05-21 22:24:01'),
(124, '#lokfa210520238160120', '1', '1', '1010', '2023-05-21 22:25:48'),
(125, '#lokfa210520239808121', '1', '1', '1010', '2023-05-21 22:27:23'),
(126, '#lokfa210520237395122', '2', '1', '1010', '2023-05-21 23:59:39'),
(127, '#lokfa220520234851123', '2', '1', '1010', '2023-05-22 00:00:29'),
(128, '#lokfa220520235720124', '2', '1', '1010', '2023-05-22 00:02:15'),
(129, '#lokfa220520232433125', '1', '1', '1010', '2023-05-22 00:11:04'),
(130, '#lokfa220520239795126', '1', '1', '1010', '2023-05-22 00:27:39'),
(131, '#lokfa220520234328127', '1', '1', '1010', '2023-05-22 00:52:41'),
(132, '#lokfa220520234562128', '1', '1', '1010', '2023-05-22 01:31:45'),
(133, '#lokfa220520236524129', '2', '1', '1010', '2023-05-22 01:43:23'),
(134, '#lokfa220520235534130', '1', '1', '1010', '2023-05-22 01:57:41'),
(135, '#lokfa220520235534130', '2', '1', '1010', '2023-05-22 01:57:41'),
(136, '#lokfa220520236048131', '1', '1', '1010', '2023-05-22 02:01:44'),
(137, '#lokfa220520233270132', '1', '1', '1010', '2023-05-22 02:03:39'),
(138, '#lokfa220520233270132', '2', '1', '1010', '2023-05-22 02:03:39'),
(139, '#lokfa220520231307133', '1', '2', '1010', '2023-05-22 02:33:00'),
(140, '#lokfa220520231307133', '2', '1', '1010', '2023-05-22 02:33:00'),
(141, '#lokfa250520235006134', '1', '1', '1010', '2023-05-25 01:39:43'),
(142, '#lokfa250520233214135', '1', '1', '1010', '2023-05-25 01:41:15'),
(143, '#lokfa250520231262136', '1', '1', '1010', '2023-05-25 01:49:43'),
(144, '#lokfa250520232576137', '1', '1', '1010', '2023-05-25 02:04:48'),
(145, '#lokfa250520232576137', '2', '1', '1010', '2023-05-25 02:04:48'),
(146, '#lokfa250520232576137', '10', '1', '1010', '2023-05-25 02:04:48'),
(147, '#lokfa250520232576137', '23', '1', '1010', '2023-05-25 02:04:48');

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
(1, 'this is bestd', 'fjfjh fhfejhejn jj jjjjj jnjfuijuid theu jvew gun mdeuhuj dnd ndu u dnjn fj dnj bd hjdhjbnjnjd  djd j  ds  mdfnj dj mndnio iojifk nkfjk k jn kkdkfjij kmnkofokmek  fnjnjke njk fj nj n kkcnjnf j jf jk jk fk nkf \r\nmm', 'maxresdefault.jpg', '5', 'In-stock', '', '', 'featured_product', '2023-01-14 23:34:38'),
(2, 'f', 'ss', 'pexels-pixabay-325876.jpg', '50', 'Out-stock', '', '', 'featured_product', '2023-01-14 23:37:18'),
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
  `website_facebook_page` varchar(255) NOT NULL,
  `active_theme` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_description`, `website_contract_email`, `website_slogan`, `product_currency`, `logo_img_upload`, `admin_photo`, `login_img`, `users_login_img`, `authors_name`, `authors_email`, `company_name`, `phone_no`, `website_facebook_page`, `active_theme`, `datetime`) VALUES
(4, 'Jai sri ramkrishna', 'jai sri ramkrishna this is a checking', '', '', '', 'joy-baba-loknath.png', '', '328289925_862151155072334_3389313899434758256_n.jpg', '', 'Sri ramkrishna', 'jaisriramkrishna@ramkrishna.com', 'Sri Ramkrishna Limited', '45454', '', '', '2023-01-24 20:19:47'),
(5, 'Jai sri ramkrishna', 'We are a online fashion store. You will find fashionable and designable clothes on our store. We are a online fashion store. You will find fashionable and designable clothes on our store. We are a online fashion store. You will find fashionable and design', 'lokeshwarfashionhouse@gmail.com', 'feel the shopping jai sri ramkrishna', 'bdt', 'lokeshwar_fashion_house_logo.jpg.jpeg', '', 'back_img.jpg.jpeg', 'front-self.jpg.jpeg', 'Sri ramkrishna', 'jaisriramkrishna@ramkrishna.com', 'Sri Ramkrishna Limited', '45454', 'facebook.com/lokeshwarfashionhouse', '', '2023-02-26 14:57:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analyzer`
--
ALTER TABLE `analyzer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analyzer_unique_users`
--
ALTER TABLE `analyzer_unique_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city/state`
--
ALTER TABLE `city/state`
  ADD PRIMARY KEY (`district_id`);

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
-- AUTO_INCREMENT for table `analyzer`
--
ALTER TABLE `analyzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `analyzer_unique_users`
--
ALTER TABLE `analyzer_unique_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city/state`
--
ALTER TABLE `city/state`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `order_customers`
--
ALTER TABLE `order_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

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
