-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 12:58 PM
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
-- Database: `ecom-admin`
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
  `active_theme` varchar(255) NOT NULL,
  `admin_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `admin_phone_no`, `admin_description`, `admin_photo`, `datetime`, `otp`, `active_theme`, `admin_role`) VALUES
(1, 'Birat', 'biratdeb82@gmail.com', '$2y$10$vqq1iEMyIKaibGQ7A4BR2Obl7Pv/BDYULUNfn93Lf8yqWp5/701wO', 5521211, 'dfds', 'pexels-hugo-sykes-14891032 (1).jpg', '2023-02-25 22:22:50', '3759', 'light-theme', 'admin'),
(2, 'Lokeshwar', 'lokeshwarfashionhouse@gmail.com', '$2y$10$LMFvkVZAdazko6t/voVABOj8DD2Nzq5eu3cGQSRQCaVHAL65hRipW', 0, '', '', '2023-02-26 14:35:56', '', '', 'users'),
(3, 'dfd', 'sd', '', 552121, 'ghhg', 'ghg', '2023-02-26 15:20:04', '', '', ''),
(4, 'Lipi Roy', 'lipi@gmail.com', '$2y$10$/bsZj3LZUrx/xJcZO51GCeF9EQhJd52SRuLpjk9k1JBuPVHTD6Sme', 0, '', 'maxresdefault.jpg', '2023-02-27 03:52:07', '', '', 'admin'),
(5, 'Lipi', 'lipi@gmail.com', '$2y$10$It5IFdfWtVVxkTmmy0bbX.fE4GKSjKDUX.gRl9H51HLkFxzN.2/2S', 0, '', 'maxresdefault.jpg', '2023-02-27 03:58:39', '', '', 'admin'),
(6, 'Lokeshwar Deb', 'lokeshwarfashionhouse@gmail.com', '$2y$10$iU5ZMJTddP0FkJ1fcTunguvvd.TwSYd4JS8awAmpSmJb1Lb9CMl8e', 4568, '', 'IMG_20230214_124527_9.jpg', '2023-02-27 05:07:43', '6706', 'light-theme', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone_no` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `join_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone_no`, `customer_address`, `join_datetime`) VALUES
(1, 'birat', 'birat@birat.com', '54520215200.', 'thekkenjknkfn kniknd', '2023-01-14 22:21:11'),
(2, 'loknath', 'loknath@loknath.com', '01223352', 'lokabjkdbjfbdjbk', '2023-01-14 23:03:10'),
(1005, 'FF', 'FD@gmail.com', 'SD', 'ss', '2023-01-14 23:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `customer_id_on_order` varchar(255) NOT NULL,
  `order_shipping_address` varchar(255) NOT NULL,
  `order_delivered_datetime` varchar(255) NOT NULL,
  `order_placed_datetime` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `product_last_checked_in` varchar(255) NOT NULL,
  `product_last_checked_in_datetime` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `orders_quantity` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `cancel_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `product_id`, `customer_id_on_order`, `order_shipping_address`, `order_delivered_datetime`, `order_placed_datetime`, `payment_method`, `payment_status`, `product_last_checked_in`, `product_last_checked_in_datetime`, `total_amount`, `orders_quantity`, `product_name`, `product_desc`, `product_img`, `price`, `order_status`, `cancel_reason`) VALUES
(1, '#lokfa25340001', '10', '2', 'dhaka, bangladesh', '12-3-2023', '12-3-23', 'mobile banking(bkash)', 'paid', 'Dhaka, bangladesh', '13-03-2023 05:57:17:pm', '5000', '15', 'test', 'this is the test', 'test\r\n', '40', 'completed', 'order_completed'),
(2, '#lokfa25340002', '15', '2', 'dhaka.bangladesh', '12-3-2023', '12-3-2023', 'cash-on-deliveryd', 'unpaid', 'Dhaka, bangladesh', '12-03-2023 08:51:54:pm', '7000', '2', 'best', 'best', 'b', '40', 'In-process', 'order_In-process');

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
  `product_added_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_img`, `product_price`, `product_status`, `product_added_datetime`) VALUES
(1, 'this is bestd', 'the good and best products', '', '5', 'In-stock', '2023-01-14 23:34:38'),
(2, 'f', 'ss', 'blue.jpg', 'ge', 'Out-stock', '2023-01-14 23:37:18'),
(10, 'Katan sari(কাতান শাড়ি) ', 'নতুন কাতান শাড়ি মহিলাদের জন্য ', 'lokesfahou-haq-katan-11252736246.jpg', '5', 'In-stock', '2023-03-03 23:51:24'),
(15, 'Katan sari(কাতান শাড়ি) ', 'dfhjhdfjhfd', 'lokesfahou-haq-katan-1125273626.jpg', '5', 'In-stock', '2023-03-04 01:56:19'),
(16, 'Katan sari(কাতান শাড়ি) dsffsfgr', 'katan sarifjhjfdh tuhfkjkfdkjks', 'dawid-zawila--G3rw6Y02D0-unsplash.jpg', '500', 'In-stock', '2023-03-04 02:01:25'),
(17, 'Katan sari(কাতান শাড়ি)GG=', 'the new katan sari Katan sari(কাতান শাড়ি)dfdfdfdsfGF', '', '5004554', 'Out-stock', '2023-03-04 02:07:06'),
(19, 'ghh', 'lk;', 'lokesfahou-haq-katan-11252736246.jpg', '5858', 'Out-stock', '2023-03-04 02:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `website_description` varchar(255) NOT NULL,
  `logo_img_upload` varchar(255) NOT NULL,
  `admin_photo` varchar(255) NOT NULL,
  `login_img` varchar(255) NOT NULL,
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

INSERT INTO `settings` (`id`, `website_name`, `website_description`, `logo_img_upload`, `admin_photo`, `login_img`, `authors_name`, `authors_email`, `company_name`, `phone_no`, `active_theme`, `datetime`) VALUES
(4, 'Jai sri ramkrishna', 'jai sri ramkrishna this is a checking', 'joy-baba-loknath.png', '', '328289925_862151155072334_3389313899434758256_n.jpg', 'Sri ramkrishna', 'jaisriramkrishna@ramkrishna.com', 'Sri Ramkrishna Limited', '45454', '', '2023-01-24 20:19:47'),
(5, 'Jai sri ramkrishna', 'jai sri ramkrishna this is a checking', 'oc-gonzalez-xg8z_KhSorQ-unsplash.jpg', '', 'dawid-zawila--G3rw6Y02D0-unsplash.jpg', 'Sri ramkrishna', 'jaisriramkrishna@ramkrishna.com', 'Sri Ramkrishna Limited', '45454', '', '2023-02-26 14:57:24');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
