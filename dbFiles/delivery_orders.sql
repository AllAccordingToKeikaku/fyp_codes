-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 07:16 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19649955_fyp2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_orders`
--

CREATE TABLE `delivery_orders` (
  `orderID` int(11) NOT NULL,
  `accountID` varchar(999) NOT NULL,
  `order_date` varchar(999) NOT NULL,
  `order_time` varchar(999) NOT NULL,
  `order_price` varchar(999) NOT NULL,
  `order_status` varchar(999) NOT NULL,
  `order_promocode` varchar(999) NOT NULL,
  `HAWAIIAN_SALMON` int(255) NOT NULL,
  `COLOURFUL_GODDESS` int(255) NOT NULL,
  `SPICY_MIXED_SALMON` int(255) NOT NULL,
  `SHOYU_TUNA_SPECIAL` int(255) NOT NULL,
  `FULL_VEGGIELICIOUS` int(255) NOT NULL,
  `AVOCADO_SUPREME` int(255) NOT NULL,
  `SUMMER_FLING` int(255) NOT NULL,
  `CHOC_SWEET` int(255) NOT NULL,
  `CARAMEL_NUTTIN` int(255) NOT NULL,
  `INCREDIBLE_HULK` int(255) NOT NULL,
  `ORANGE_MADNESS` int(255) NOT NULL,
  `SPIDEY_SENSES` int(255) NOT NULL,
  `cc_number` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_orders`
--

INSERT INTO `delivery_orders` (`orderID`, `accountID`, `order_date`, `order_time`, `order_price`, `order_status`, `order_promocode`, `HAWAIIAN_SALMON`, `COLOURFUL_GODDESS`, `SPICY_MIXED_SALMON`, `SHOYU_TUNA_SPECIAL`, `FULL_VEGGIELICIOUS`, `AVOCADO_SUPREME`, `SUMMER_FLING`, `CHOC_SWEET`, `CARAMEL_NUTTIN`, `INCREDIBLE_HULK`, `ORANGE_MADNESS`, `SPIDEY_SENSES`, `cc_number`) VALUES
(7, '2', '2022-10-27', '00:17', '$98.90', 'In-progress', 'moshiqq50', 4, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, '1234123412341235'),
(8, '2', '2022-10-27', '00:17', '$59.85', 'Delivered', 'moshiqq50', 1, 0, 2, 0, 1, 0, 0, 1, 0, 1, 0, 3, '1234123112321233'),
(9, '1', '2022-22-2', '11:11', '$50.00', 'Delivered', 'None', 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, '1231231231231231'),
(10, '2', '2022-10-27', '00:17', '$43.20', 'In-progress', 'None', 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, '1234123412341234'),
(11, '2', '2022-10-27', '21:41', '$51.50', 'In-progress', 'None', 2, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, '1234123412341231'),
(12, '2', '2022-10-27', '22:16', '$13.75', 'In-progress', 'moshiqq50', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1234123412341231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD PRIMARY KEY (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
