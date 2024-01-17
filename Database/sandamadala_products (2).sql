-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 05:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandamadala_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batch_no` int(11) NOT NULL,
  `no_of_units` decimal(25,2) NOT NULL,
  `raw_cost_per_unit` decimal(25,2) NOT NULL,
  `raw_cost_for_units` decimal(25,2) NOT NULL,
  `useful_units` decimal(25,2) NOT NULL,
  `wastage` decimal(25,2) NOT NULL,
  `transport` decimal(25,2) NOT NULL,
  `depreciation` decimal(25,2) NOT NULL,
  `cerosene` decimal(25,2) NOT NULL,
  `labor` decimal(25,2) NOT NULL,
  `polythene` decimal(25,2) NOT NULL,
  `sticker` decimal(25,2) NOT NULL,
  `electricity` decimal(25,2) NOT NULL,
  `wastage_cost` decimal(25,2) NOT NULL,
  `transport_cost` decimal(25,2) NOT NULL,
  `depreciation_cost` decimal(25,2) NOT NULL,
  `cerosene_cost` decimal(25,2) NOT NULL,
  `labor_cost` decimal(25,2) NOT NULL,
  `polythene_cost` decimal(25,2) NOT NULL,
  `sticker_cost` decimal(25,2) NOT NULL,
  `electricity_cost` decimal(25,2) NOT NULL,
  `tot_cost_per_unit` decimal(25,2) NOT NULL,
  `tot_cost` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_no`, `no_of_units`, `raw_cost_per_unit`, `raw_cost_for_units`, `useful_units`, `wastage`, `transport`, `depreciation`, `cerosene`, `labor`, `polythene`, `sticker`, `electricity`, `wastage_cost`, `transport_cost`, `depreciation_cost`, `cerosene_cost`, `labor_cost`, `polythene_cost`, `sticker_cost`, `electricity_cost`, `tot_cost_per_unit`, `tot_cost`) VALUES
(1, '100000.00', '0.77', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '12.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '21600.00', '1800.00', '0.77', '77400.00'),
(2, '100000.00', '0.77', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '12.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '21600.00', '1800.00', '0.77', '77400.00'),
(3, '100000.00', '0.77', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '12.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '21600.00', '1800.00', '0.77', '77400.00'),
(4, '100000.00', '0.77', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '12.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '21600.00', '1800.00', '0.77', '77400.00'),
(5, '100000.00', '0.77', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '12.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '21600.00', '1800.00', '0.77', '77400.00'),
(6, '100000.00', '0.77', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '12.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '21600.00', '1800.00', '0.77', '77400.00'),
(7, '100000.00', '0.77', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '12.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '21600.00', '1800.00', '0.77', '77400.00'),
(8, '100000.00', '0.77', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '12.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '21600.00', '1800.00', '0.77', '77400.00'),
(9, '100000.00', '0.77', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '12.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '21600.00', '1800.00', '0.77', '77400.00'),
(10, '100000.00', '0.63', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '4.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '7200.00', '1800.00', '0.63', '63000.00'),
(11, '100000.00', '0.63', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '4.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '7200.00', '1800.00', '0.63', '63000.00'),
(12, '100000.00', '0.63', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '4.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '7200.00', '1800.00', '0.63', '63000.00'),
(13, '100000.00', '0.63', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '4.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '7200.00', '1800.00', '0.63', '63000.00'),
(14, '100000.00', '0.63', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '4.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '7200.00', '1800.00', '0.63', '63000.00'),
(15, '100000.00', '0.63', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '4.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '7200.00', '1800.00', '0.63', '63000.00'),
(16, '100000.00', '0.63', '180000.00', '91000.00', '9.00', '5.00', '2.00', '2.00', '10.00', '2.00', '4.00', '1.00', '16200.00', '9000.00', '3600.00', '3600.00', '18000.00', '3600.00', '7200.00', '1800.00', '0.63', '63000.00'),
(17, '214550.00', '0.74', '386190.00', '195240.50', '9.00', '5.00', '8.00', '2.00', '10.00', '2.00', '4.00', '1.00', '34757.10', '19309.50', '30895.20', '7723.80', '38619.00', '7723.80', '15447.60', '3861.90', '0.74', '158337.90');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product`, `qty`, `amount`) VALUES
(1, 1, '50g', 100, '16500.00'),
(2, 1, '100g', 50, '15750.00'),
(3, 1, '150g', 25, '12500.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_header`
--

CREATE TABLE `order_header` (
  `order_id` int(11) NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(25,2) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_header`
--

INSERT INTO `order_header` (`order_id`, `date`, `customer_name`, `address`, `amount`, `status`) VALUES
(1, '.2023-02-10.', 'sathira', 'kundasale,kandy', '44750.00', 'To Complete');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` int(11) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `product` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `suggested_wholesale_price` decimal(25,2) NOT NULL,
  `suggested_retail_price` decimal(25,2) NOT NULL,
  `updated_wholesale_price` decimal(25,2) NOT NULL,
  `updated_retail_price` decimal(25,2) NOT NULL,
  `net_profit` decimal(25,2) NOT NULL,
  `tot_profit` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_id`, `batch_no`, `product`, `suggested_wholesale_price`, `suggested_retail_price`, `updated_wholesale_price`, `updated_retail_price`, `net_profit`, `tot_profit`) VALUES
(1, 3, '50g', '154.44', '160.88', '0.00', '0.00', '25.74', '39526.99'),
(2, 3, '100g', '308.88', '321.75', '0.00', '0.00', '51.48', '19763.49'),
(3, 3, '150g', '463.32', '482.63', '0.00', '0.00', '77.22', '19763.49'),
(4, 4, '50g', '154.44', '160.88', '0.00', '0.00', '25.74', '39526.99'),
(5, 4, '100g', '308.88', '321.75', '0.00', '0.00', '51.48', '19763.49'),
(6, 4, '150g', '463.32', '482.63', '0.00', '0.00', '77.22', '19763.49'),
(7, 5, '50g', '154.44', '160.88', '0.00', '0.00', '25.74', '39526.99'),
(8, 5, '100g', '308.88', '321.75', '0.00', '0.00', '51.48', '19763.49'),
(9, 5, '150g', '463.32', '482.63', '0.00', '0.00', '77.22', '19763.49'),
(10, 6, '50g', '154.44', '160.88', '0.00', '0.00', '25.74', '39526.99'),
(11, 6, '100g', '308.88', '321.75', '0.00', '0.00', '51.48', '19763.49'),
(12, 6, '150g', '463.32', '482.63', '0.00', '0.00', '77.22', '19763.49'),
(13, 7, '50g', '154.44', '160.88', '0.00', '0.00', '25.74', '39526.99'),
(14, 7, '100g', '308.88', '321.75', '0.00', '0.00', '51.48', '19763.49'),
(15, 7, '150g', '463.32', '482.63', '0.00', '0.00', '77.22', '19763.49'),
(16, 8, '50g', '154.44', '160.88', '0.00', '0.00', '25.74', '39526.99'),
(17, 8, '100g', '308.88', '321.75', '0.00', '0.00', '51.48', '19763.49'),
(18, 8, '150g', '463.32', '482.63', '0.00', '0.00', '77.22', '19763.49'),
(19, 9, '50g', '154.44', '160.88', '0.00', '0.00', '25.74', '39526.99'),
(20, 9, '100g', '308.88', '321.75', '0.00', '0.00', '51.48', '19763.49'),
(21, 9, '150g', '463.32', '482.63', '0.00', '0.00', '77.22', '19763.49'),
(22, 10, '50g', '145.80', '151.88', '0.00', '0.00', '24.30', '37315.69'),
(23, 10, '100g', '291.60', '303.75', '0.00', '0.00', '48.60', '18657.84'),
(24, 10, '150g', '437.40', '455.63', '0.00', '0.00', '72.90', '18657.84'),
(25, 11, '50g', '145.80', '151.88', '0.00', '0.00', '24.30', '37315.69'),
(26, 11, '100g', '291.60', '303.75', '0.00', '0.00', '48.60', '18657.84'),
(27, 11, '150g', '437.40', '455.63', '0.00', '0.00', '72.90', '18657.84'),
(28, 12, '50g', '145.80', '151.88', '0.00', '0.00', '24.30', '37315.69'),
(29, 12, '100g', '291.60', '303.75', '0.00', '0.00', '48.60', '18657.84'),
(30, 12, '150g', '437.40', '455.63', '0.00', '0.00', '72.90', '18657.84'),
(31, 13, '50g', '145.80', '151.88', '0.00', '0.00', '24.30', '37315.69'),
(32, 13, '100g', '291.60', '303.75', '0.00', '0.00', '48.60', '18657.84'),
(33, 13, '150g', '437.40', '455.63', '0.00', '0.00', '72.90', '18657.84'),
(34, 14, '50g', '145.80', '151.88', '0.00', '0.00', '24.30', '37315.69'),
(35, 14, '100g', '291.60', '303.75', '0.00', '0.00', '48.60', '18657.84'),
(36, 14, '150g', '437.40', '455.63', '0.00', '0.00', '72.90', '18657.84'),
(37, 15, '50g', '145.80', '151.88', '0.00', '0.00', '24.30', '37315.69'),
(38, 15, '100g', '291.60', '303.75', '0.00', '0.00', '48.60', '18657.84'),
(39, 15, '150g', '437.40', '455.63', '0.00', '0.00', '72.90', '18657.84'),
(40, 16, '50g', '145.80', '151.88', '150.00', '160.00', '24.30', '37315.69'),
(41, 16, '100g', '291.60', '303.75', '310.00', '320.00', '48.60', '18657.84'),
(42, 16, '150g', '437.40', '455.63', '450.00', '460.00', '72.90', '18657.84'),
(43, 17, '50g', '152.28', '158.63', '165.00', '170.00', '25.38', '83619.07'),
(44, 17, '100g', '304.56', '317.25', '315.00', '320.00', '50.76', '41809.53'),
(45, 17, '150g', '456.84', '475.88', '500.00', '550.00', '76.14', '41809.53');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `product` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `batch_no`, `product`, `cost`) VALUES
(1, 17, '50g', '126.90'),
(2, 17, '100g', '253.80'),
(3, 17, '150g', '380.70');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `production_id` int(11) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `product` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(25) NOT NULL,
  `stock` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `batch_no`, `product`, `qty`, `stock`) VALUES
(1, 12, '50g', 910, 0),
(2, 12, '100g', 228, 0),
(3, 12, '150g', 152, 0),
(4, 13, '50g', 910, 910),
(5, 13, '100g', 228, 228),
(6, 13, '150g', 152, 152),
(7, 14, '50g', 910, 1820),
(8, 14, '100g', 228, 456),
(9, 14, '150g', 152, 304),
(10, 15, '50g', 910, 2730),
(11, 15, '100g', 228, 684),
(12, 15, '150g', 152, 456),
(13, 16, '50g', 910, 3190),
(14, 16, '100g', 228, 762),
(15, 16, '150g', 152, 518),
(16, 17, '50g', 1952, 4142),
(17, 17, '100g', 488, 1050),
(18, 17, '150g', 325, 743);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `sales_id`, `product`, `qty`, `amount`) VALUES
(1, 2, '.50g.', 200, '188000.00'),
(2, 2, '.100g.', 100, '188000.00'),
(3, 2, '.150g.', 50, '188000.00'),
(4, 3, '.50g.', 200, '188000.00'),
(5, 3, '.100g.', 100, '188000.00'),
(6, 3, '.150g.', 50, '188000.00'),
(7, 4, '.50g.', 200, '188000.00'),
(8, 4, '.100g.', 100, '188000.00'),
(9, 4, '.150g.', 50, '188000.00'),
(10, 5, '.50g.', 150, '24000.00'),
(11, 5, '.100g.', 50, '48000.00'),
(12, 5, '.150g.', 40, '69000.00'),
(13, 6, '.50g.', 100, '16000.00'),
(14, 6, '.100g.', 0, '32000.00'),
(15, 6, '.150g.', 0, '46000.00'),
(16, 7, '.50g.', 1000, '170000.00'),
(17, 7, '.100g.', 200, '320000.00'),
(18, 7, '.150g.', 100, '550000.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_header`
--

CREATE TABLE `sales_header` (
  `sales_id` int(11) NOT NULL,
  `date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_no` int(25) NOT NULL,
  `salesman_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales_header`
--

INSERT INTO `sales_header` (`sales_id`, `date`, `invoice_no`, `salesman_name`, `customer`, `amount`) VALUES
(1, '.2023-02-09.', 123, 'udara', 'udara stors', '94000.00'),
(2, '.2023-02-09.', 1234, 'udara', 'udara stors', '188000.00'),
(3, '.2023-02-09.', 12345, 'udara', 'udara stors', '188000.00'),
(4, '.2023-02-09.', 123456, 'udara', 'udara stors', '188000.00'),
(5, '.2023-02-10.', 234, 'udara', 'sathira stors', '141000.00'),
(6, '.2023-02-10.', 3213, 'udara', 'udara stors', '94000.00'),
(7, '.2023-02-10.', 2345, 'udara', 'sathira stors', '1040000.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_position`, `user_password`) VALUES
(4, 'manager', 'amilanwijesinghe01@gmail.com', 'Manager', '2470a88faf7c65dcc41ca8bc6fe3e53be057ed2c'),
(5, 'udara', 'udara@gmail.com', 'Salesman', 'c9639adbc3d7c402aa16e242b5b3e6b2d724b911'),
(6, 'sathira', 'sathira@gmail.com', 'customer', 'c773c94fe10d414598e9f910fc7ba17f71918fd6'),
(15, 'Amila Wijesinghe', 'amilanwijesinghe01@gmail.com', 'Manager', '2724cee9968df203259f82a428f7816572a783fa'),
(16, 'sathira', 'sathira@gmail.com', 'Customer', 'd151c90704597b638bae6ea3ce9ee87c033ff64f'),
(17, 'udara', 'udara@gmail.com', 'Salesman', 'd2b9933c967e51bd7e886b87c6cec3131b7f8208');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch_no`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_header`
--
ALTER TABLE `order_header`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`production_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_header`
--
ALTER TABLE `sales_header`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_header`
--
ALTER TABLE `order_header`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `production_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales_header`
--
ALTER TABLE `sales_header`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
