-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql301.infinityfree.com
-- Generation Time: Jul 05, 2023 at 04:54 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_34172411_lokeshwarfashionhouse`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `admin_phone_no`, `admin_description`, `admin_photo`, `datetime`, `otp`, `admin_last_ip_address`, `admin_last_used_os`, `admin_last_used_device`, `active_theme`, `admin_role`) VALUES
(1, 'Birat', 'biratdeb82@gmail.com', '$2y$10$vqq1iEMyIKaibGQ7A4BR2Obl7Pv/BDYULUNfn93Lf8yqWp5/701wO', 5521211, 'dfds', 'pexels-hugo-sykes-14891032 (1).jpg', '2023-02-25 22:22:50', '3759', '', '', '', 'light-theme', 'admin'),
(2, 'Lokeshwar', 'lokeshwarfashionhouse@gmail.com', '$2y$10$LMFvkVZAdazko6t/voVABOj8DD2Nzq5eu3cGQSRQCaVHAL65hRipW', 0, '', '', '2023-02-26 14:35:56', '4185', '', '', '', '', 'users'),
(3, 'dfd', 'jhumur.roy.pro@gmail.com', '', 552121, 'ghhg', 'ghg', '2023-02-26 15:20:04', '', '', '', '', '', ''),
(4, 'Lipi Roy', 'jhumur.roy.pro@gmail.com', '$2y$10$/bsZj3LZUrx/xJcZO51GCeF9EQhJd52SRuLpjk9k1JBuPVHTD6Sme', 0, '', 'maxresdefault.jpg', '2023-02-27 03:52:07', '', '', '', '', '', 'admin'),
(5, 'Lipi', 'jhumur.roy.pro@gmail.com', '$2y$10$It5IFdfWtVVxkTmmy0bbX.fE4GKSjKDUX.gRl9H51HLkFxzN.2/2S', 0, '', 'maxresdefault.jpg', '2023-02-27 03:58:39', '', '', '', '', '', 'admin'),
(6, 'Lokeshwar Deb', 'lokeshwarfashionhouse@gmail.com', '$2y$10$oLzJ5rSj16QBJOD5YzPTSOmJ3fSCei9Vdp3CyRW0UIi1/CSngZ9HC', 4568, '', 'pink-room.jpg.jpeg', '2023-02-27 05:07:43', '4223', '58.145.187.253', 'Windows 10', 'Computer', 'light-theme', 'Admin'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_users`
--

INSERT INTO `cus_users` (`cus_id`, `cus_username`, `cus_desc`, `cus_email`, `cus_phone_no`, `cus_pass`, `cus_photo`, `cus_address`, `otp`, `cus_last_ip_address`, `cus_last_used_os`, `cus_last_used_device`, `verify_status`, `cus_joined_datatime`) VALUES
(13, 'Lokanth baba', '', 'lokeshwarfashionhouse@gmail.com', '1212', '$2y$10$8ciq/fMS2tHA9R1rWlPrQeohUqVEA74A/ZMUkQx9sH1Pqef4Z/RT.', 'oc-gonzalez-xg8z_KhSorQ-unsplash.jpg', 'Bangladesh', '', '', '', '', '', '2023-03-30 02:34:50'),
(15, 'Birat', '', 'lokeshwarfashionhouse@gmail.com', '12', '$2y$10$aw.7gi26F0/jbwOktwkcduVIrWaulcCjE9MtahZUZWnLTRlmngWGq', '', 'Bangladesh', '', '', '', '', '', '2023-03-30 02:40:25'),
(16, 'Lokeshwar Deb', 'this is my description', 'lokeshwarfashionhouse@gmail.com', '1212', '$2y$10$HzzCM/RFnfe7kGCJrPrFoO26Ls6w67lZ4jI9OcK7O0kOPW8lH5HEu', 'hand-tshirt.png.jpeg', 'Bangladesh', '4118', '58.145.184.248', 'Windows 10', 'Computer', 'Email Verified', '2023-03-30 04:06:33'),
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
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `newsletter_email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `device` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `newsletter_email`, `ip_address`, `os`, `browser`, `device`, `datetime`) VALUES
(1, 'daviddeb8479@gmail.com', '', '', '', '', '2023-05-27 12:16:35'),
(2, '1lokeshwarfashionhouse@gmail.com', '', '', '', '', '2023-05-27 12:45:36'),
(4, '', '', '', '', '', '2023-05-27 13:24:44'),
(5, '2lokeshwarfashionhouse@gmail.com', '', '', '', '', '2023-05-27 13:27:43'),
(6, '3lokeshwarfashionhouse@gmail.com', '', '', '', '', '2023-05-27 13:29:10'),
(7, 'lokeshwarfashionhouse@gmail.comm', '::1', 'Windows 10', 'Chrome', 'Computer', '2023-05-27 14:45:58'),
(8, 'lokeshwarfashionhouse@gmail.com', '::1', 'Windows 10', 'Chrome', 'Computer', '2023-05-27 14:51:46');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `product_id`, `customer_id_on_order`, `order_phone_no`, `order_email`, `order_shipping_address`, `order_delivered_datetime`, `order_est_delivery_datetime`, `order_accepting_status`, `order_packaging_status`, `courier_handing_status`, `courier_handing_desc`, `order_placed_datetime`, `packaging_status`, `payment_method`, `payment_status`, `product_last_checked_in`, `product_last_checked_in_datetime`, `total_amount`, `orders_quantity`, `price`, `order_status`, `cancel_reason`) VALUES
(178, '#lokfa290520232413', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-3400, Bangladesh', '', '05-06-2023', 'order accepted', 'packaging has started', 'handed on courier', '', '2023-05-29 11:40:44', '', 'cod', 'paid', '', '', '1200', '', '', 'completed', 'order_completed'),
(179, '#lokfa290520231124178', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Brahmanbaria, sadar-Kishoreganj-3400, Bangladesh', '', '05-06-2023', 'order accepted', 'packaging has started', 'handed on courier', '', '2023-05-29 11:41:19', '', 'cod', 'paid', '', '', '1200', '', '', 'completed', 'order_completed'),
(180, '#lokfa290520237502179', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'order accepted', 'packaging has started', 'handed on courier', '', '2023-05-29 11:48:16', '', 'cod', 'paid', '', '', '1450', '', '', 'completed', 'order_completed'),
(181, '#lokfa290520234290180', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:52:31', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(182, '#lokfa290520232749181', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:36', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(183, '#lokfa290520231280182', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:36', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(184, '#lokfa290520232478183', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:36', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(185, '#lokfa290520232974184', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:36', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(186, '#lokfa290520237177185', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:37', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(187, '#lokfa290520232552186', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'order accepted', 'packaging has started', 'handed on courier', '', '2023-05-29 11:55:37', '', 'cod', 'paid', '', '', '1450', '', '', 'completed', 'order_completed'),
(188, '#lokfa290520237401187', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:37', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(189, '#lokfa290520235465188', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:40', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(190, '#lokfa290520236893189', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:40', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(191, '#lokfa290520237019190', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:41', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(192, '#lokfa290520236518191', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:41', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(193, '#lokfa290520233819192', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:41', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(194, '#lokfa290520233625193', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:41', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(195, '#lokfa290520237037194', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:42', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(196, '#lokfa290520237855195', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Gopalganj-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 11:55:42', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(197, '#lokfa290520235157196', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Sherpur-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:11:04', '', 'cod', '', '', '', '2650', '', '', 'cancelled', 'not accepted by admin'),
(198, '#lokfa290520233880197', '50', '1010', '12', 'lokeshwarfashionhouse@gmail.com', 'Dhaka, S-Gopalganj-34, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:14:48', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(199, '#lokfa290520237454198', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Natore-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:22:31', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(200, '#lokfa290520233462199', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Natore-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:22:53', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(201, '#lokfa290520238398200', '54', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:23:54', '', 'cod', '', '', '', '1450', '', '', 'cancelled', 'not accepted by admin'),
(202, '#lokfa290520236273201', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Faridpur-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:25:37', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(203, '#lokfa290520234108202', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Faridpur-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:27:13', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(204, '#lokfa290520234307203', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Sherpur-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:28:28', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(205, '#lokfa290520238949204', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Sherpur-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:28:51', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(206, '#lokfa290520231569205', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Sherpur-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:29:30', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(207, '#lokfa290520231438206', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Sherpur-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:29:47', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(208, '#lokfa290520238191207', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:31:57', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(209, '#lokfa290520238051208', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:34:51', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(210, '#lokfa290520234359209', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:35:23', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(211, '#lokfa290520237407210', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Dhaka-1200, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:43:31', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(212, '#lokfa290520239502211', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Tangail-3400, Bangladesh', '', '05-06-2023', 'not accepted by admin', '', '', '', '2023-05-29 12:50:12', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin'),
(213, '#lokfa040620231922212', '', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Manikganj-3400, Bangladesh', '', '11-06-2023', '', '', '', '', '2023-06-04 09:30:20', '', 'cod', '', '', '', '1200', '', '', 'pending', ''),
(214, '#lokfa040620236962213', '50', '1010', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Sadar-Narsingdi-3400, Bangladesh', '', '11-06-2023', 'not accepted by admin', '', '', '', '2023-06-04 11:34:59', '', 'cod', '', '', '', '1200', '', '', 'cancelled', 'not accepted by admin');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_customers`
--

INSERT INTO `order_customers` (`id`, `cus_id`, `order_no`, `customer_firstname`, `customer_lastname`, `datetime`) VALUES
(151, '1010', '#lokfa290520232413', 'Lipi', 'Roy', '2023-05-29 11:40:44'),
(152, '1010', '#lokfa290520231124178', 'Lipi', 'Roy', '2023-05-29 11:41:19'),
(153, '1010', '#lokfa290520237502179', 'Lipi', 'Roy', '2023-05-29 11:48:16'),
(154, '1010', '#lokfa290520234290180', 'Lipi', 'Roy', '2023-05-29 11:52:31'),
(155, '1010', '#lokfa290520232749181', 'Lipi', 'Roy', '2023-05-29 11:55:36'),
(156, '1010', '#lokfa290520231280182', 'Lipi', 'Roy', '2023-05-29 11:55:36'),
(157, '1010', '#lokfa290520232478183', 'Lipi', 'Roy', '2023-05-29 11:55:36'),
(158, '1010', '#lokfa290520232974184', 'Lipi', 'Roy', '2023-05-29 11:55:36'),
(159, '1010', '#lokfa290520237177185', 'Lipi', 'Roy', '2023-05-29 11:55:37'),
(160, '1010', '#lokfa290520232552186', 'Lipi', 'Roy', '2023-05-29 11:55:37'),
(161, '1010', '#lokfa290520237401187', 'Lipi', 'Roy', '2023-05-29 11:55:37'),
(162, '1010', '#lokfa290520235465188', 'Lipi', 'Roy', '2023-05-29 11:55:40'),
(163, '1010', '#lokfa290520236893189', 'Lipi', 'Roy', '2023-05-29 11:55:40'),
(164, '1010', '#lokfa290520237019190', 'Lipi', 'Roy', '2023-05-29 11:55:41'),
(165, '1010', '#lokfa290520236518191', 'Lipi', 'Roy', '2023-05-29 11:55:41'),
(166, '1010', '#lokfa290520233819192', 'Lipi', 'Roy', '2023-05-29 11:55:41'),
(167, '1010', '#lokfa290520233625193', 'Lipi', 'Roy', '2023-05-29 11:55:41'),
(168, '1010', '#lokfa290520237037194', 'Lipi', 'Roy', '2023-05-29 11:55:42'),
(169, '1010', '#lokfa290520237855195', 'Lipi', 'Roy', '2023-05-29 11:55:42'),
(170, '1010', '#lokfa290520235157196', 'Lipi', 'Roy', '2023-05-29 12:11:04'),
(171, '1010', '#lokfa290520235157196', 'Lipi', 'Roy', '2023-05-29 12:11:04'),
(172, '1010', '#lokfa290520233880197', 'Birat', 'Deb', '2023-05-29 12:14:48'),
(173, '1010', '#lokfa290520237454198', 'Lipi', 'Roy', '2023-05-29 12:22:31'),
(174, '1010', '#lokfa290520233462199', 'Lipi', 'Roy', '2023-05-29 12:22:53'),
(175, '1010', '#lokfa290520238398200', 'Lipi', 'Roy', '2023-05-29 12:23:54'),
(176, '1010', '#lokfa290520236273201', 'Lipi', 'Roy', '2023-05-29 12:25:37'),
(177, '1010', '#lokfa290520234108202', 'Lipi', 'Roy', '2023-05-29 12:27:13'),
(178, '1010', '#lokfa290520234307203', 'Lipi', 'Roy', '2023-05-29 12:28:28'),
(179, '1010', '#lokfa290520238949204', 'Lipi', 'Roy', '2023-05-29 12:28:51'),
(180, '1010', '#lokfa290520231569205', 'Lipi', 'Roy', '2023-05-29 12:29:30'),
(181, '1010', '#lokfa290520231438206', 'Lipi', 'Roy', '2023-05-29 12:29:47'),
(182, '1010', '#lokfa290520238191207', 'Lipi', 'Roy', '2023-05-29 12:31:57'),
(183, '1010', '#lokfa290520238051208', 'Lipi', 'Roy', '2023-05-29 12:34:51'),
(184, '1010', '#lokfa290520234359209', 'Lipi', 'Roy', '2023-05-29 12:35:23'),
(185, '1010', '#lokfa290520237407210', 'Lipi', 'Roy', '2023-05-29 12:43:31'),
(186, '1010', '#lokfa290520239502211', 'Lipi', 'Roy', '2023-05-29 12:50:12'),
(187, '1010', '#lokfa040620231922212', 'Lipi', 'Roy', '2023-06-04 09:30:20'),
(188, '1010', '#lokfa040620236962213', 'Lipi', 'Roy', '2023-06-04 11:34:59');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `orders_id`, `product_id`, `product_qty`, `customer_id_on_order`, `datetime`) VALUES
(188, '#lokfa290520232413', '50', '1', '1010', '2023-05-29 11:40:44'),
(189, '#lokfa290520231124178', '50', '1', '1010', '2023-05-29 11:41:19'),
(190, '#lokfa290520237502179', '54', '1', '1010', '2023-05-29 11:48:16'),
(191, '#lokfa290520234290180', '54', '1', '1010', '2023-05-29 11:52:31'),
(192, '#lokfa290520232749181', '54', '1', '1010', '2023-05-29 11:55:36'),
(193, '#lokfa290520231280182', '54', '1', '1010', '2023-05-29 11:55:36'),
(194, '#lokfa290520232478183', '54', '1', '1010', '2023-05-29 11:55:36'),
(195, '#lokfa290520232974184', '54', '1', '1010', '2023-05-29 11:55:36'),
(196, '#lokfa290520237177185', '54', '1', '1010', '2023-05-29 11:55:37'),
(197, '#lokfa290520232552186', '54', '1', '1010', '2023-05-29 11:55:37'),
(198, '#lokfa290520237401187', '54', '1', '1010', '2023-05-29 11:55:37'),
(199, '#lokfa290520235465188', '54', '1', '1010', '2023-05-29 11:55:40'),
(200, '#lokfa290520236893189', '54', '1', '1010', '2023-05-29 11:55:40'),
(201, '#lokfa290520237019190', '54', '1', '1010', '2023-05-29 11:55:41'),
(202, '#lokfa290520236518191', '54', '1', '1010', '2023-05-29 11:55:41'),
(203, '#lokfa290520233819192', '54', '1', '1010', '2023-05-29 11:55:41'),
(204, '#lokfa290520233625193', '54', '1', '1010', '2023-05-29 11:55:41'),
(205, '#lokfa290520237037194', '54', '1', '1010', '2023-05-29 11:55:42'),
(206, '#lokfa290520237855195', '54', '1', '1010', '2023-05-29 11:55:42'),
(207, '#lokfa290520235157196', '54', '1', '1010', '2023-05-29 12:11:04'),
(208, '#lokfa290520235157196', '50', '1', '1010', '2023-05-29 12:11:04'),
(209, '#lokfa290520233880197', '50', '1', '1010', '2023-05-29 12:14:48'),
(210, '#lokfa290520237454198', '54', '1', '1010', '2023-05-29 12:22:31'),
(211, '#lokfa290520233462199', '54', '1', '1010', '2023-05-29 12:22:53'),
(212, '#lokfa290520238398200', '54', '1', '1010', '2023-05-29 12:23:54'),
(213, '#lokfa290520236273201', '50', '1', '1010', '2023-05-29 12:25:37'),
(214, '#lokfa290520234108202', '50', '1', '1010', '2023-05-29 12:27:13'),
(215, '#lokfa290520234307203', '50', '1', '1010', '2023-05-29 12:28:28'),
(216, '#lokfa290520238949204', '50', '1', '1010', '2023-05-29 12:28:51'),
(217, '#lokfa290520231569205', '50', '1', '1010', '2023-05-29 12:29:30'),
(218, '#lokfa290520231438206', '50', '1', '1010', '2023-05-29 12:29:47'),
(219, '#lokfa290520238191207', '50', '1', '1010', '2023-05-29 12:31:57'),
(220, '#lokfa290520238051208', '50', '1', '1010', '2023-05-29 12:34:51'),
(221, '#lokfa290520234359209', '50', '1', '1010', '2023-05-29 12:35:23'),
(222, '#lokfa290520237407210', '50', '1', '1010', '2023-05-29 12:43:31'),
(223, '#lokfa290520239502211', '50', '1', '1010', '2023-05-29 12:50:12'),
(224, '#lokfa040620231922212', '', '1', '1010', '2023-06-04 09:30:20'),
(225, '#lokfa040620236962213', '50', '1', '1010', '2023-06-04 11:34:59');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `hero_aria_bold_word`, `hero_aria_offer_title`, `hero_aria_offer_title_photo`, `hero_aria_offer_canvas_img1`, `hero_aria_offer_canvas_img2`, `hero_aria_offer_canvas_img3`, `datetime`) VALUES
(1, 'N', 'ew Sale !', 'lokfahou-banner.jpg.jpeg', 'hand-tshirt.png.jpeg', 'pexels-tembela-bohle-1884581.jpg.jpeg', 'Brown Minimalist Fashion Product Banner.png.jpeg', '2023-05-17 18:13:30');

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
  `product_keywords` varchar(255) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `promo_code_discount` varchar(255) NOT NULL,
  `make_as_featured` varchar(255) NOT NULL,
  `product_added_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_img`, `product_price`, `product_status`, `product_keywords`, `promo_code`, `promo_code_discount`, `make_as_featured`, `product_added_datetime`) VALUES
(41, 'প্রিমিয়াম কোয়ালিটি সফ্ট সিল্ক কাতান শাড়ি', '** ম্যাটেরিয়ালঃ সফট সিল্ক। ** লম্বাঃ ১২.৫ হাত। বহরঃ ৪৬ ইঞ্চি। **ব্লাউস পিস হবে না! সম্পূর্ণ বডিতে কাজ করা।', 'lokesfahou-haq-katan-11252640518.jpg.jpeg', '1200', 'In-stock', 'প্রিমিয়াম কোয়ালিটি সফ্ট সিল্ক কাতান শাড়ি, #new, #lokeshwarfashionhouse, #প্রিমিয়াম_কোয়ালিটি_সফ্ট_সিল্ক_কাতান_শাড়ি, #LokeshwarFashionHouse', '', '', 'not_featured_product', '2023-05-28 06:11:14'),
(42, 'কটন নকশি পাইর শাড়ী ', 'পিওর আড়ংয়ের কটন নকশি পাইর শাড়ী \r\nফুল বডি সুতার নিখুত মিনাকারী কাজ করা \r\nরানিং ব্লাউজ পিস আছে সাথে।', 'lokfahou-cotton-nokshi-pair-sari.jpg.jpeg', '1200', 'In-stock', 'কটন নকশি পাইর শাড়ী , #কটন_নকশি_পাইর_শাড়ী , #new, #lokeshwarfashionhouse, best_কটন_নকশি_পাইর_শাড়ী, #brand, #brand_new, lokeshwarfashionhouse', '', '', '', '2023-05-28 10:17:35'),
(47, 'পিওর সুতি প্রিন্ট শাড়ী', 'পিওর সুতি প্রিন্ট শাড়ী\r\n১২+ হাত শাড়ী \r\n', 'lokesfahou-babuha-suti-sari.jpg.jpeg', '800', 'In-stock', 'পিওর সুতি প্রিন্ট শাড়ী , #পিওর_সুতি_প্রিন্ট_শাড়ী , #new, #lokeshwarfashionhouse, best_পিওর_সুতি_প্রিন্ট_শাড়ী, #brand, #brand_new, lokeshwarfashionhouse', '', '', '', '2023-05-28 10:29:51'),
(48, 'প্রিমিয়াম কোয়ালিটি আফসান প্রিন্ট শাড়ী', '', 'lokesfahou-ron-toro-afsan-print-sari.jpg.jpeg', '1200', 'In-stock', 'প্রিমিয়াম কোয়ালিটি আফসান প্রিন্ট শাড়ী , #প্রিমিয়াম_কোয়ালিটি_আফসান_প্রিন্ট শাড়ী , #new, #lokeshwarfashionhouse, best_পিওর_সুতি_প্রিন্ট_শাড়ী, #brand, #brand_new, lokeshwarfashionhouse', '', '', '', '2023-05-28 13:49:54'),
(50, 'প্রিমিয়াম কোয়ালিটি আড়ংকটন নকশী পাইর শাড়ী', '১৪ হাত শাড়ী রানিং ব্লাউজ পিস আছে \r\nফুল বডি সুতার নিখুঁত কাজ করা ', 'lokesfahou-babuha-half-silk-nokshi-cotton-sari.jpg.jpeg', '1200', 'In-stock', 'প্রিমিয়াম কোয়ালিটি আড়ংকটন নকশী পাইর শাড়ী , #প্রিমিয়াম_কোয়ালিটি_আড়ংকটন_নকশী_পাইর_শাড়ী , #new, #lokeshwarfashionhouse, best_প্রিমিয়াম_কোয়ালিটি_আড়ংকটন_নকশী_পাইর_শাড়ী, #brand, #brand_new, lokeshwarfashionhouse', '', '', 'featured_product', '2023-05-28 14:34:31'),
(51, 'প্রিমিয়াম কোয়ালিটি টাঙ্গাইল পিউর সুতি/ কটন শাড়ি', '১৪ হাত শাড়ি রানিং ব্লাউছ পিস (মূল শাড়ি ১২ হাত, ব্লাউজপিস ২ হাত (১গজ) এচাস্ট করা যা শাড়ির লাষ্ট প্রান্ত থেকে কেটে নিতে হবে।\r\n14 হাত শাড়ি 47&quot; বহর \r\n রানিং ব্লাউছ পিস আছে \r\n(আপনি কেটে নিবেন) ', 'lokesfahou-tan-tat-suti-cotton-sari.jpg.jpeg', '1200', 'In-stock', 'প্রিমিয়াম কোয়ালিটি আড়ংকটন নকশী পাইর শাড়ী , #প্রিমিয়াম_কোয়ালিটি_আড়ংকটন_নকশী_পাইর_শাড়ী , #new, #lokeshwarfashionhouse, best_প্রিমিয়াম_কোয়ালিটি_আড়ংকটন_নকশী_পাইর_শাড়ী, #brand, #brand_new, lokeshwarfashionhouse', '', '', '', '2023-05-28 14:59:42'),
(52, 'হাল্ফসিল্ক নকশি পাইর শাড়ি ', '১৩ হাত শাড়ি', 'lokesfahou-babuha-half-silk-sari.jpg.jpeg', '1200', 'In-stock', 'হাল্ফসিল্ক নকশি পাইর শাড়ি  , #হাল্ফসিল্ক_নকশি_পাইর_শাড়ি  , #new, #lokeshwarfashionhouse, best_হাল্ফসিল্ক_নকশি_পাইর_শাড়ি, #brand, #brand_new, lokeshwarfashionhouse', '', '', 'featured_product', '2023-05-28 15:09:43'),
(53, 'CHANDERI SILK WITH KHADI PRINT DESIGN WITH READYMADE LACE BORDER*', '*BLOUSE:BANGLORI SILK PIGMENT DESIGN *\r\n*RATE:2200\r\n*WEIGHT:400GMS*\r\n*BEST QUALITY BEST PRICE *', 'lokesfahou-shi-chanderi-silk-khadi-design-lace-border-sari.jpg.jpeg', '2500', 'In-stock', 'CHANDERI SILK WITH KHADI PRINT DESIGN WITH READYMADE LACE BORDER , #CHANDERI_SILK_WITH_KHADI_PRINT_DESIGN_WITH_READYMADE_LACE_BORDER , #new, #lokeshwarfashionhouse, best_CHANDERI_SILK_WITH_KHADI_PRINT_DESIGN_WITH_READYMADE_LACE_BORDER, #brand, #brand_new,', '', '', 'not_featured_product', '2023-05-28 15:18:08'),
(54, 'প্রিমিয়াম কোয়ালিটি টাঙ্গাইল পিউর সুতি/ কটন শাড়ি ', 'Metarials:- 100% Cotton', 'lokesfahou-tan-tat-suti-cotton-sari6_1050tk.jpg.jpeg', '1450', 'In-stock', 'প্রিমিয়াম কোয়ালিটি আড়ংকটন নকশী পাইর শাড়ী , #প্রিমিয়াম_কোয়ালিটি_আড়ংকটন_নকশী_পাইর_শাড়ী , #new, #lokeshwarfashionhouse, best_প্রিমিয়াম_কোয়ালিটি_আড়ংকটন_নকশী_পাইর_শাড়ী, #brand, #brand_new, lokeshwarfashionhouse, #lokeshwarfashionhouse #clothing #clothingboutiq', '', '', 'featured_product', '2023-05-29 07:24:38'),
(55, 'প্রিমিয়াম কোয়ালিটি টাঙ্গাইল পিউর সুতি/ কটন শাড়ি ', 'Metarials:- 100% Cotton', 'lokesfahou-tan-tat-suti-cotton-sari7_1250tk.jpg.jpeg', '1650', 'In-stock', 'প্রিমিয়াম কোয়ালিটি আড়ংকটন নকশী পাইর শাড়ী , #প্রিমিয়াম_কোয়ালিটি_আড়ংকটন_নকশী_পাইর_শাড়ী , #new, #lokeshwarfashionhouse, best_প্রিমিয়াম_কোয়ালিটি_আড়ংকটন_নকশী_পাইর_শাড়ী, #brand, #brand_new, lokeshwarfashionhouse, #lokeshwarfashionhouse #clothing #clothingboutiq', '', '', 'featured_product', '2023-05-29 07:29:04'),
(56, 'রাজস্থানী কোটা শাড়ি', '', 'lokesfahou-rajkota-1.jpg.jpeg', '2550', 'In-stock', 'রাজস্থানী কোটা শাড়ি , #রাজস্থানী_কোটা_শাড়ি , #new, #lokeshwarfashionhouse, best_রাজস্থানী_কোটা_শাড়ি, #indian_sari , indian_রাজস্থানী_কোটা_শাড়ি,  #brand, #brand_new, lokeshwarfashionhouse', '', '', '', '2023-06-03 12:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `promo_id` int(11) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `promo_discount` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_description`, `website_contract_email`, `website_slogan`, `product_currency`, `logo_img_upload`, `admin_photo`, `login_img`, `users_login_img`, `authors_name`, `authors_email`, `company_name`, `phone_no`, `website_facebook_page`, `active_theme`, `datetime`) VALUES
(4, 'Jai sri ramkrishna', 'jai sri ramkrishna this is a checking', '', '', '', 'joy-baba-loknath.png', '', '328289925_862151155072334_3389313899434758256_n.jpg', '', 'Sri ramkrishna', 'jaisriramkrishna@ramkrishna.com', 'Sri Ramkrishna Limited', '45454', '', '', '2023-01-24 20:19:47'),
(5, 'Lokeshwar Fashion House ', 'We are a online fashion store. You will find fashionable and designable clothes on our store. We are a online fashion store. You will find fashionable and designable clothes on our store. We are a online fashion store. You will find fashionable and design', 'lokeshwarfashionhouse@gmail.com', 'feel the shopping ', 'bdt', 'lokeshwar_fashion_house_logo.jpg.jpeg', '', 'back_img.jpg.jpeg', 'pexels-tembela-bohle-1884581.jpg.jpeg', 'Sri ramkrishna', 'jaisriramkrishna@ramkrishna.com', 'Sri Ramkrishna Limited', '1854117783', 'facebook.com/lokeshwarfashionhouse', '', '2023-02-26 14:57:24');

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
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `order_customers`
--
ALTER TABLE `order_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
