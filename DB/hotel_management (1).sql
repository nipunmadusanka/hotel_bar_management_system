-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2023 at 06:22 AM
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
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminType` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `profile` text NOT NULL,
  `business_name` text NOT NULL,
  `brandColor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminType`, `email`, `password`, `name`, `profile`, `business_name`, `brandColor`) VALUES
(1, 1, '', '', 'Sahan', 'admin.png', 'check', '');

-- --------------------------------------------------------

--
-- Table structure for table `bar_bottlesize`
--

CREATE TABLE `bar_bottlesize` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `name` text NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar_bottlesize`
--

INSERT INTO `bar_bottlesize` (`id`, `hotelID`, `name`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(1, 1, '300ml', 1, '2023-11-17 02:28:00', 0, '0000-00-00 00:00:00'),
(2, 1, '300ml', 1, '2023-11-17 02:28:37', 0, '0000-00-00 00:00:00'),
(3, 1, '100ml', 1, '2023-11-17 02:29:13', 0, '0000-00-00 00:00:00'),
(4, 1, '900ml', 1, '2023-11-18 16:08:53', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bar_brands`
--

CREATE TABLE `bar_brands` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `name` text NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar_brands`
--

INSERT INTO `bar_brands` (`id`, `hotelID`, `name`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(7, 1, 'Johnnie Walker', 1, '2023-11-16 10:46:38', 0, '0000-00-00 00:00:00'),
(8, 1, 'Smirnoff', 1, '2023-11-16 10:46:44', 0, '0000-00-00 00:00:00'),
(9, 1, 'Hennessy', 1, '2023-11-16 10:46:50', 0, '0000-00-00 00:00:00'),
(10, 1, 'Jack Daniel\'s', 1, '2023-11-16 10:46:58', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bar_category`
--

CREATE TABLE `bar_category` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `name` text NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar_category`
--

INSERT INTO `bar_category` (`id`, `hotelID`, `name`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(1, 1, 'Other', 1, '2023-11-16 00:01:32', 0, '0000-00-00 00:00:00'),
(4, 1, 'Vodka', 1, '2023-11-16 10:48:26', 0, '0000-00-00 00:00:00'),
(5, 1, 'Gin', 1, '2023-11-16 10:48:32', 0, '0000-00-00 00:00:00'),
(6, 1, 'Whiskey', 1, '2023-11-16 10:48:37', 0, '0000-00-00 00:00:00'),
(7, 1, 'Brandy', 1, '2023-11-16 10:48:42', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bar_distributors`
--

CREATE TABLE `bar_distributors` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` text NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar_distributors`
--

INSERT INTO `bar_distributors` (`id`, `hotelID`, `name`, `contact`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(3, 1, 'ASIA DUTY FREE', '0713561234', 1, '2023-11-16 10:47:37', 0, '0000-00-00 00:00:00'),
(4, 1, 'CEYLON BEVERAGE', '0713564321', 1, '2023-11-16 10:47:53', 0, '0000-00-00 00:00:00'),
(5, 1, 'COSMOVEDA ', '0713564123', 1, '2023-11-16 10:48:07', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bar_inventory`
--

CREATE TABLE `bar_inventory` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `distributorID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `drinkName` varchar(250) NOT NULL,
  `bottleSizeID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stockDate` date NOT NULL,
  `unit_price` int(11) NOT NULL,
  `full_amount` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `total_stock` int(11) NOT NULL,
  `authorizedBy` int(11) NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar_inventory`
--

INSERT INTO `bar_inventory` (`id`, `hotelID`, `categoryID`, `distributorID`, `brandID`, `drinkName`, `bottleSizeID`, `quantity`, `stockDate`, `unit_price`, `full_amount`, `discount_price`, `total_stock`, `authorizedBy`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(4, 1, 4, 4, 8, 'Alcohol name', 1, 8, '2023-11-28', 800, 10000, 20, 2, 0, 1, '2023-11-16', 0, '0000-00-00'),
(5, 1, 5, 4, 7, 'Alcohol name', 1, 7, '2023-11-06', 700, 10000, 20, 10, 0, 1, '2023-11-16', 0, '0000-00-00'),
(6, 1, 6, 5, 9, 'Alcohol iiiiii', 1, 8, '2023-11-21', 1000, 10000, 20, 10, 0, 1, '2023-11-16', 0, '0000-00-00'),
(7, 1, 5, 5, 7, 'test', 1, 8, '2023-11-20', 66, 10000, 20, 10, 0, 1, '2023-11-18', 0, '0000-00-00'),
(8, 1, 4, 5, 8, 'uuuu', 1, 98, '2023-11-30', 0, 100, 0, 10, 0, 1, '2023-11-30', 0, '0000-00-00'),
(9, 1, 6, 4, 8, 'tyu', 1, 20, '2023-11-29', 1000, 500, 200, 10, 0, 1, '2023-11-30', 0, '0000-00-00'),
(10, 1, 5, 4, 9, 'uuuu', 1, 10, '2023-11-30', 1000, 120, 0, 10, 15, 1, '2023-11-30', 0, '0000-00-00'),
(11, 1, 4, 3, 8, 'yiiiiii', 1, 20, '2023-11-30', 1000, 120, 20, 10, 0, 1, '2023-11-30', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `bar_selldrinks`
--

CREATE TABLE `bar_selldrinks` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `drinkID` int(11) NOT NULL,
  `bottleSizeID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payingTypeID` int(11) NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar_selldrinks`
--

INSERT INTO `bar_selldrinks` (`id`, `hotelID`, `categoryID`, `brandID`, `drinkID`, `bottleSizeID`, `roomID`, `customerID`, `unit_price`, `quantity`, `total`, `payingTypeID`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(1, 1, 1, 7, 4, 1, 0, 1, 566, 5, 77, 0, 1, '2023-11-17', 0, '0000-00-00'),
(2, 1, 4, 9, 5, 3, 0, 1, 566, 5, 77, 0, 1, '2023-11-17', 0, '0000-00-00'),
(3, 1, 1, 7, 4, 1, 0, 1, 800, 6, 777, 0, 1, '2023-11-17', 0, '0000-00-00'),
(4, 1, 6, 9, 5, 2, 0, 1, 700, 3, 4800, 0, 1, '2023-11-17', 0, '0000-00-00'),
(5, 1, 5, 8, 6, 2, 0, 1, 1000, 8, 3000, 0, 1, '2023-11-17', 0, '0000-00-00'),
(6, 1, 1, 7, 4, 1, 0, 0, 800, 6, 0, 1, 1, '2023-11-18', 0, '0000-00-00'),
(7, 1, 6, 8, 5, 2, 0, 0, 700, 3, 4000, 1, 1, '2023-11-18', 0, '0000-00-00'),
(8, 1, 5, 9, 5, 3, 0, 0, 700, 3, 4200, 2, 1, '2023-11-18', 0, '0000-00-00'),
(9, 1, 5, 9, 5, 2, 0, 3, 700, 3, 2800, 3, 1, '2023-11-18', 0, '0000-00-00'),
(10, 1, 6, 10, 6, 1, 2, 3, 1000, 8, 4000, 3, 1, '2023-11-18', 0, '0000-00-00'),
(11, 1, 6, 10, 6, 3, 2, 3, 1000, 8, 1000, 2, 1, '2023-11-18', 0, '0000-00-00'),
(12, 1, 4, 9, 5, 3, 2, 3, 700, 3, 700, 2, 1, '2023-11-18', 0, '0000-00-00'),
(13, 1, 5, 9, 6, 2, 1, 3, 1000, 8, 3000, 3, 1, '2023-11-18', 0, '0000-00-00'),
(14, 1, 6, 7, 5, 1, 1, 3, 700, 2, 700, 3, 1, '2023-11-22', 0, '0000-00-00'),
(15, 1, 6, 7, 4, 1, 2, 3, 800, 6, 2400, 2, 1, '2023-11-22', 0, '0000-00-00'),
(16, 1, 1, 7, 4, 1, 1, 3, 800, 3, 0, 1, 1, '2023-11-25', 0, '0000-00-00'),
(17, 1, 5, 8, 6, 2, 2, 3, 1000, 5, 0, 2, 1, '2023-11-29', 0, '0000-00-00'),
(18, 1, 6, 9, 6, 3, 2, 3, 1000, 1, 0, 2, 1, '2023-11-29', 0, '0000-00-00'),
(19, 1, 6, 10, 6, 3, 1, 3, 1000, 1, 0, 2, 1, '2023-11-29', 0, '0000-00-00'),
(20, 1, 6, 9, 5, 2, 1, 3, 700, 1, 680, 2, 1, '2023-11-29', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_brands`
--

CREATE TABLE `restaurant_brands` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `name` text NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_brands`
--

INSERT INTO `restaurant_brands` (`id`, `hotelID`, `name`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(1, 1, 'tesyt', 1, '2023-11-22 09:39:35', 0, '0000-00-00 00:00:00'),
(2, 1, 'hello', 1, '2023-11-24 16:40:18', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_category`
--

CREATE TABLE `restaurant_category` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `name` text NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_category`
--

INSERT INTO `restaurant_category` (`id`, `hotelID`, `name`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(1, 1, 'hh', 1, '2023-11-24 00:16:36', 0, '0000-00-00 00:00:00'),
(2, 1, 'res2', 1, '2023-11-24 16:39:45', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_distributors`
--

CREATE TABLE `restaurant_distributors` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` text NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_distributors`
--

INSERT INTO `restaurant_distributors` (`id`, `hotelID`, `name`, `contact`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(1, 1, 'yy', '+94713565117', 1, '2023-11-24 00:31:52', 0, '0000-00-00 00:00:00'),
(2, 1, 'myDis', '0713565990', 1, '2023-11-24 16:40:38', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_foodsize`
--

CREATE TABLE `restaurant_foodsize` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `name` text NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_foodsize`
--

INSERT INTO `restaurant_foodsize` (`id`, `hotelID`, `name`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(1, 1, '200ml', 1, '2023-11-24 00:40:01', 0, '0000-00-00 00:00:00'),
(2, 1, '250g', 1, '2023-11-24 16:40:04', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_inventory`
--

CREATE TABLE `restaurant_inventory` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `distributorID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `drinkName` varchar(250) NOT NULL,
  `bottleSizeID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stockDate` datetime NOT NULL,
  `unit_price` int(11) NOT NULL,
  `full_amount` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `total_stock` int(11) NOT NULL,
  `authorizedBy` int(11) NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_inventory`
--

INSERT INTO `restaurant_inventory` (`id`, `hotelID`, `categoryID`, `distributorID`, `brandID`, `drinkName`, `bottleSizeID`, `quantity`, `stockDate`, `unit_price`, `full_amount`, `discount_price`, `total_stock`, `authorizedBy`, `addBy`, `add_date`, `updateBy`, `update_date`) VALUES
(1, 1, 1, 1, 1, 'test', 1, 2, '2023-11-07 00:00:00', 800, 10000, 20, 10, 0, 1, '2023-11-24 16:39:07', 0, '0000-00-00 00:00:00'),
(2, 1, 2, 2, 2, 'abcd', 1, 2, '2023-11-23 00:00:00', 500, 100000, 20, 10, 1, 1, '2023-11-24 16:42:49', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_sellfoods`
--

CREATE TABLE `restaurant_sellfoods` (
  `id` int(11) NOT NULL,
  `hotelID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `brandID` int(11) NOT NULL,
  `drinkID` int(11) NOT NULL,
  `bottleSizeID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payingTypeID` int(11) NOT NULL,
  `addBy` int(11) NOT NULL,
  `add_date` datetime NOT NULL,
  `updateBy` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bar_bottlesize`
--
ALTER TABLE `bar_bottlesize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `bar_brands`
--
ALTER TABLE `bar_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `bar_category`
--
ALTER TABLE `bar_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `bar_distributors`
--
ALTER TABLE `bar_distributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `bar_inventory`
--
ALTER TABLE `bar_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `distributorID` (`distributorID`),
  ADD KEY `brandID` (`brandID`),
  ADD KEY `bottleSizeID` (`bottleSizeID`),
  ADD KEY `authorizedBy` (`authorizedBy`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `bar_selldrinks`
--
ALTER TABLE `bar_selldrinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `brandID` (`brandID`),
  ADD KEY `drinkID` (`drinkID`),
  ADD KEY `bottleSizeID` (`bottleSizeID`),
  ADD KEY `roomID` (`roomID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `payingTypeID` (`payingTypeID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `restaurant_brands`
--
ALTER TABLE `restaurant_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `restaurant_category`
--
ALTER TABLE `restaurant_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `restaurant_distributors`
--
ALTER TABLE `restaurant_distributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `restaurant_foodsize`
--
ALTER TABLE `restaurant_foodsize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `restaurant_inventory`
--
ALTER TABLE `restaurant_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `distributorID` (`distributorID`),
  ADD KEY `brandID` (`brandID`),
  ADD KEY `bottleSizeID` (`bottleSizeID`),
  ADD KEY `authorizedBy` (`authorizedBy`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- Indexes for table `restaurant_sellfoods`
--
ALTER TABLE `restaurant_sellfoods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelID` (`hotelID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `brandID` (`brandID`),
  ADD KEY `drinkID` (`drinkID`),
  ADD KEY `bottleSizeID` (`bottleSizeID`),
  ADD KEY `roomID` (`roomID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `payingTypeID` (`payingTypeID`),
  ADD KEY `addBy` (`addBy`),
  ADD KEY `updateBy` (`updateBy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bar_bottlesize`
--
ALTER TABLE `bar_bottlesize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bar_brands`
--
ALTER TABLE `bar_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bar_category`
--
ALTER TABLE `bar_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bar_distributors`
--
ALTER TABLE `bar_distributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bar_inventory`
--
ALTER TABLE `bar_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bar_selldrinks`
--
ALTER TABLE `bar_selldrinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `restaurant_brands`
--
ALTER TABLE `restaurant_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant_category`
--
ALTER TABLE `restaurant_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant_distributors`
--
ALTER TABLE `restaurant_distributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant_foodsize`
--
ALTER TABLE `restaurant_foodsize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant_inventory`
--
ALTER TABLE `restaurant_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant_sellfoods`
--
ALTER TABLE `restaurant_sellfoods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
