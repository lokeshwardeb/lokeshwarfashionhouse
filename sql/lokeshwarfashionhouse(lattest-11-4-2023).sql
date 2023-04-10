-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 10:13 PM
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
(1014, '20', 'Lokeshwar Deb Protik', 'lokeshwarfashionhouse@gmail.com', '1212', 'Bangladesh', '2023-04-10 22:23:32');

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
  `cus_joined_datatime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cus_users`
--

INSERT INTO `cus_users` (`cus_id`, `cus_username`, `cus_desc`, `cus_email`, `cus_phone_no`, `cus_pass`, `cus_photo`, `cus_address`, `cus_joined_datatime`) VALUES
(20, 'Lokeshwar Deb Protik', '', 'lokeshwarfashionhouse@gmail.com', '1212', '$2y$10$OF9wc2r2Re.fW6euyefNEuBdE1HOdR1ITAea6r4u7RcNXaref5JeO', 'IMG_20230214_124527_9.jpg', 'Bangladesh', '2023-04-10 22:23:32');

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
(88, '#lokfa100420239464', '1', '1014', '01776123062', '', 'Bangladesh, Cumilla-1200, Bangladesh', '', '17-04-2023', '', '', '', '', '2023-04-10 22:36:13', '', 'cod', '', '', '', '5', '', '', 'pending', ''),
(89, '#lokfa10042023422388', '2', '1014', '01776123062', '', 'Bangladesh, Dhaka-1200, Bangladesh', '', '17-04-2023', '', '', '', '', '2023-04-10 22:43:33', '', 'cod', '', '', '', '50', '', '', 'pending', ''),
(90, '#lokfa10042023386989', '2', '1014', '01776123062', '', 'Arambug, Dhaka-1200, Bangladesh', '', '17-04-2023', '', '', '', '', '2023-04-10 23:57:11', '', 'cod', '', '', '', '55', '', '', 'pending', ''),
(91, '#lokfa11042023340190', '1', '1014', '01776123062', 'lokeshwarfashionhouse@gmail.com', 'Bangladesh, Cumilla-1200, Bangladesh', '', '18-04-2023', 'order accepted', '', '', '', '2023-04-11 00:21:38', '', 'cod', '', '', '', '5', '', '', 'In-process', '');

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
(52, '1014', '#lokfa100420239464', 'Lipi', 'Roy', '2023-04-10 22:36:13'),
(53, '1014', '#lokfa10042023422388', 'Lipi', 'Roy', '2023-04-10 22:43:33'),
(54, '1014', '#lokfa10042023386989', 'Lipi', 'Roy', '2023-04-10 23:57:11'),
(55, '1014', '#lokfa10042023386989', 'Lipi', 'Roy', '2023-04-10 23:57:11'),
(56, '1014', '#lokfa11042023340190', 'Lipi', 'Roy', '2023-04-11 00:21:38');

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
(90, '#lokfa100420239464', '1', '1', '1014', '2023-04-10 22:36:13'),
(91, '#lokfa10042023422388', '2', '1', '1014', '2023-04-10 22:43:33'),
(92, '#lokfa10042023386989', '1', '1', '1014', '2023-04-10 23:57:11'),
(93, '#lokfa10042023386989', '2', '1', '1014', '2023-04-10 23:57:11'),
(94, '#lokfa11042023340190', '1', '1', '1014', '2023-04-11 00:21:38');

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
(1, 'this is bestdn', 'fjfjh fhfejhejn jj jjjjj jnjfuijuid theu jvew gun mdeuhuj dnd ndu u dnjn fj dnj bd hjdhjbnjnjd  djd j  ds  mdfnj dj mndnio iojifk nkfjk k jn kkdkfjij kmnkofokmek  fnjnjke njk fj nj n kkcnjnf j jf jk jk fk nkf \r\nmm', 'lokesfahou-haq-katan-11252736246.jpg', '5', 'In-stock', '', '', 'featured_product', '2023-01-14 23:34:38'),
(2, 'f', 'ss', 'lokesfahou-haq-katan-1125273626.jpg', '50', 'Out-stock', 'LOKFASHOU153172', '10', 'featured_product', '2023-01-14 23:37:18'),
(10, 'Katan sari(কাতান শাড়ি) ', 'নতুন কাতান শাড়ি মহিলাদের জন্য ', 'lokesfahou-haq-katan-11252736246.jpg', '5', 'In-stock', 'LOKFASHOU153172', '10', 'featured_product', '2023-03-03 23:51:24'),
(15, 'Katan sari(কাতান শাড়ি) ', 'dfhjhdfjhfd', 'lokesfahou-haq-katan-1125273626.jpg', '550', 'In-stock', 'LOKFASHOU158806', '', 'not_featured_product', '2023-03-04 01:56:19'),
(16, 'Katan sari(কাতান শাড়ি) dsffsfgr', 'katan sarifjhjfdh tuhfkjkfdkjks', 'dawid-zawila--G3rw6Y02D0-unsplash.jpg', '500', 'In-stock', 'LOKFASHOU166268', '', 'not_featured_product', '2023-03-04 02:01:25'),
(17, 'Katan sari(কাতান শাড়ি)GG=', 'the new katan sari Katan sari(কাতান শাড়ি)dfdfdfdsfGF', '', '5004554', 'Out-stock', 'LOKFASHOU178911', '', 'not_featured_product', '2023-03-04 02:07:06'),
(19, 'ghh', 'lk;', 'lokesfahou-haq-katan-11252736246.jpg', '5858', 'Out-stock', 'LOKFASHOU195852', '', 'not_featured_product', '2023-03-04 02:58:12');

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
(1, 'LOKFASHOU153172', '10', '2023-03-27 16:54:26'),
(2, 'lokfashhou-1251215', '50', '2023-04-10 22:31:11');

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
(5, 'Jai sri ramkrishna', 'We are a online fashion store. You will find fashionable and designable clothes on our store. We are a online fashion store. You will find fashionable and designable clothes on our store. We are a online fashion store. You will find fashionable and design', 'lokeshwarfashionhouse@gmail.com', 'feel the shopping jai sri ramkrishna', 'bdt', 'oc-gonzalez-xg8z_KhSorQ-unsplash.jpg', '', 'pexels-hugo-sykes-14891032 (1).jpg', 'pexels-hugo-sykes-14891032.jpg', 'Sri ramkrishna', 'jaisriramkrishna@ramkrishna.com', 'Sri Ramkrishna Limited', '45454', '', '2023-02-26 14:57:24');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `cus_users`
--
ALTER TABLE `cus_users`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `order_customers`
--
ALTER TABLE `order_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
