-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 07:29 AM
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
-- Database: `project-mudra-patel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mudra', 'miu@mail', '123', '1', '2023-03-28 12:58:34', '0000-00-00 00:00:00'),
(3, 'meet', 'muda@mail', '1243', '2', '2023-03-28 16:29:48', NULL),
(4, 'mudra', 'mudr@mail', '1283', '2', '2023-03-28 16:29:48', NULL),
(6, 'mudra', 'mud@mail', '1237', '1', '2023-03-28 16:29:48', NULL),
(7, 'meet', 'meeet@mail', '7894', '2', '2023-04-01 13:33:16', NULL),
(11, 'mudra', 'mudra@mail', '789400', '2', '2023-04-01 13:33:16', NULL),
(12, 'maya', 'maya@mail', '12054', '1', '2023-04-01 13:29:38', NULL),
(13, 'meet', 'meeet@mail', '42894', '2', '2023-04-01 13:33:16', NULL),
(14, 'honey', 'honey@mail', '102487', '2', '2023-04-01 13:29:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `status`, `description`, `created_at`, `updated_at`) VALUES
(9, 'asde', '1', '', '2023-03-22 10:53:29', '2023-03-28 11:35:38'),
(10, 'dfr', '1', 'dvgsg', '2023-03-22 11:01:54', '2023-03-28 11:35:45'),
(11, 'dfr', '1', '', '2023-03-22 11:02:12', '2023-03-28 11:36:02'),
(14, 'mudra', '2', '', '2023-03-23 06:35:27', '2023-03-28 11:35:34'),
(15, 'meeta', '1', 'cybercom', '2023-03-25 08:51:11', '2023-03-28 11:36:14'),
(16, 'mudra', '1', 'creation', '2023-03-26 07:00:01', '2023-03-28 11:36:10'),
(17, 'meet', '2', 'there', '2023-03-28 11:33:24', '2023-03-28 11:35:56'),
(18, 'mudra', '1', 'cybercom', '2023-03-28 11:33:42', '2023-03-28 11:35:51'),
(19, 'mudra', '2', 'cyebr', '2023-03-29 06:03:00', NULL),
(20, 'meet', '2', 'creation', '2023-03-29 06:40:24', '2023-03-29 06:56:40'),
(21, 'meet', '1', 'dert', '2023-03-29 06:41:02', NULL),
(22, 'mudra', '2', 'create', '2023-03-29 08:22:50', '2023-03-29 08:23:20'),
(24, 'mudra', '2', 'aswew', '2023-03-30 01:50:54', NULL),
(29, 'meet', '1', 'type', '2023-03-31 13:15:58', '2023-03-31 13:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `mobile` int(15) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `gender`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(14, 'myuudra', 'minjib', 'vyvtyc', 'male', 458, '1', '2023-03-27 06:07:07', '2023-03-28 11:40:31'),
(15, 'qwerty', 'asd', 'csd', 'female', 4578, '2', '2023-03-28 11:41:10', '2023-04-03 11:23:43'),
(16, 'Patel', 'mehul', 'mudra@gmail.com', 'female', 96, '1', '2023-03-28 11:41:41', '2023-04-03 11:19:13'),
(19, 'mudra', 'lpko', 'mail@mail', 'female', 123457, '2', '2023-03-29 10:14:33', '2023-03-30 10:27:52'),
(24, 'meet', 'p', 'mail@', 'male', 79801, '2', '2023-04-02 18:09:30', '2023-04-03 11:25:50'),
(35, 'meeta', 'patel', 'mail@mail', 'male', 12345, '2', NULL, '2023-04-03 11:31:34'),
(37, 'meet', 'qwe', 'rty', 'male', 1248, '1', NULL, '2023-04-03 11:21:10'),
(43, 'meet', '', '', 'male', 123, '1', '2023-04-04 05:53:54', '2023-04-04 07:17:19'),
(44, 'meet', '', '', 'male', 0, '1', '2023-04-04 07:17:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`address_id`, `customer_id`, `address`, `city`, `state`, `country`, `zipcode`) VALUES
(7, 14, 'asdes', 'mikni', 'india', 'bhuv h', 0),
(8, 15, 'dvsfvds', 'sdf', 'dfsw', 'gfvrg', 45789),
(9, 16, '25,bdgdte', 'Ahmedabad', 'kajshs', 'ijdhtr', 3800),
(12, 19, 'asdw', 'qwer', 'zxcv', 'sder', 789);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `thumbnail` tinyint(4) NOT NULL,
  `small` tinyint(4) NOT NULL,
  `base` tinyint(4) NOT NULL,
  `gallery` tinyint(4) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` enum('1','2') NOT NULL,
  `payment_method` enum('cod','gpay','cheque','paytm') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `name`, `status`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 'mudra p', '1', 'paytm', NULL, '2023-03-28 11:43:09'),
(5, 'mudra patel', '1', 'paytm', NULL, '2023-03-28 11:43:15'),
(9, 'meet', '2', 'cod', '2023-03-28 11:43:34', '2023-03-28 11:43:46'),
(10, 'mudra', '1', 'cod', '2023-03-28 11:45:04', '2023-03-28 11:45:14'),
(11, 'meet', '2', 'cod', '2023-03-30 09:56:21', NULL),
(12, 'qwerty', '1', 'cod', '2023-03-31 12:50:07', '2023-03-31 12:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `sku` int(11) NOT NULL,
  `cost` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `color` enum('red','green','blue') NOT NULL,
  `material` enum('copper','iron','plastic','steel','wood') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `sku`, `cost`, `price`, `quantity`, `description`, `status`, `color`, `material`, `created_at`, `updated_at`) VALUES
(24, 123, 1000, 1500, 10, 'nokia', '1', 'red', 'copper', '2023-04-03 15:45:57', NULL),
(25, 456, 1500, 2000, 20, 'nokia', '2', 'green', 'iron', '2023-04-03 15:46:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `salesman_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `mobile` int(15) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `company` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`salesman_id`, `first_name`, `last_name`, `email`, `gender`, `mobile`, `status`, `company`, `created_at`, `updated_at`) VALUES
(23, 'mudra', 'patel', 'mIl@mail', 'female', 123456, '2', 'cfdr', '2023-03-31 06:25:55', NULL),
(24, 'meet', '', '', 'male', 0, '1', '', '2023-04-02 03:47:27', NULL),
(25, 'meeta', '', '', 'male', 0, '1', '', '2023-04-03 03:47:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesmanprice`
--

CREATE TABLE `salesmanprice` (
  `entity_id` int(11) NOT NULL,
  `salesman_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `salesman_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesman_address`
--

CREATE TABLE `salesman_address` (
  `address_id` int(11) NOT NULL,
  `salesman_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesman_address`
--

INSERT INTO `salesman_address` (`address_id`, `salesman_id`, `address`, `city`, `state`, `country`, `zipcode`) VALUES
(8, 23, 'qaz', 'wsx', 'edc', 'rfv', 789),
(9, 24, '', '', '', '', 0),
(10, 25, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `name`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(2, 'meet', 20000, '2', NULL, '2023-03-31 12:25:08'),
(5, 'ajsyt', 5000, '2', NULL, '2023-03-30 11:57:35'),
(7, 'mudra', 78900, '1', '2023-03-30 12:06:58', '2023-03-30 12:07:07'),
(8, 'mudra', 1000, '2', '2023-03-31 12:08:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `mobile` int(15) NOT NULL,
  `status` enum('1','2') NOT NULL,
  `company` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `first_name`, `last_name`, `email`, `gender`, `mobile`, `status`, `company`, `created_at`, `updated_at`) VALUES
(15, 'meets', 'sdfsf', 'fsd@mail', 'male', 45685, '', 'dserefvdsff', '2023-03-27 09:48:24', '2023-03-27 09:48:34'),
(16, 'mudra', 'aptel', 'mail@mail', 'female', 7875, '2', 'smdk', '2023-03-30 11:34:33', '2023-03-30 11:34:44'),
(20, 'meet', 'patel', 'mail@mail', 'male', 1230, '2', 'qwerty', NULL, NULL),
(21, 'meet', 'patel', 'mail@mail', 'male', 1230, '2', 'qwerty', '2023-04-03 11:35:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_address`
--

CREATE TABLE `vendor_address` (
  `address_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_address`
--

INSERT INTO `vendor_address` (`address_id`, `vendor_id`, `address`, `city`, `state`, `country`, `zipcode`) VALUES
(11, 15, 'fdxf', 'fdef', 'fdfdsf', 'fsds', 45),
(12, 16, 'qwer', 'dscsc', 'cdcsd', 'dfer', 789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`salesman_id`);

--
-- Indexes for table `salesmanprice`
--
ALTER TABLE `salesmanprice`
  ADD PRIMARY KEY (`entity_id`),
  ADD KEY `salesman` (`salesman_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `salesman_address`
--
ALTER TABLE `salesman_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `salesman_id` (`salesman_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_address`
--
ALTER TABLE `vendor_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `salesman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `salesmanprice`
--
ALTER TABLE `salesmanprice`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salesman_address`
--
ALTER TABLE `salesman_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vendor_address`
--
ALTER TABLE `vendor_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesmanprice`
--
ALTER TABLE `salesmanprice`
  ADD CONSTRAINT `salesmanprice_ibfk_1` FOREIGN KEY (`salesman_id`) REFERENCES `salesman` (`salesman_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salesmanprice_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesman_address`
--
ALTER TABLE `salesman_address`
  ADD CONSTRAINT `salesman_address_ibfk_1` FOREIGN KEY (`salesman_id`) REFERENCES `salesman` (`salesman_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor_address`
--
ALTER TABLE `vendor_address`
  ADD CONSTRAINT `vendor_address_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
