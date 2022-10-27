-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 07:21 AM
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountID` int(255) NOT NULL,
  `profileID` varchar(999) NOT NULL,
  `fullName` varchar(999) NOT NULL,
  `email` varchar(999) NOT NULL,
  `accountPassword` varchar(999) NOT NULL,
  `phoneNumber` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `profileID`, `fullName`, `email`, `accountPassword`, `phoneNumber`) VALUES
(1, 'customer', 'Alan Bobby Cedric Daniel', 'fyp2022test@gmail.com', 'fyp_22_s3_22', '91238123'),
(2, 'customer', 'lucas', 'lucasleeht@gmail.com', 'lucas', '91239123'),
(3, 'customer', 'lucas', 'lucas@gmail.com', 'lucas', '91239122'),
(4, 'customer', 'lu', 'lu@gmail.com', 'lu', '09120912');

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
(10, '2', '2022-10-27', '00:17', '$43.20', 'In-progress', 'None', 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, '1234123412341234');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(255) NOT NULL,
  `inboxStatus` varchar(999) NOT NULL,
  `inboxDescription` varchar(999) NOT NULL,
  `inboxDate` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `inboxStatus`, `inboxDescription`, `inboxDate`) VALUES
(1, 'Reservation', 'RNaN: Reservation for lucas~~ at 2022/10/20~~ 11:00~~ for 4(H)', '2022/10/15'),
(2, 'Reservation', 'RNaN: Reservation for lucas~~ at 2022/10/20~~ 17:00~~ for 4(H)', '2022/10/15'),
(3, 'Reservation', 'R3: Reservation for fyp2022~~ at 2022/10/20~~ 11:00~~ for 1(B)', '2022/10/16'),
(4, 'Reservation', 'R4: Reservation for lucas~~ at 2022/10/20~~ 15:00~~ for 1(G)', '2022/10/16');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `menu_item_ID` int(255) NOT NULL,
  `item_category` varchar(999) NOT NULL,
  `item_name` varchar(999) NOT NULL,
  `item_description` varchar(999) NOT NULL,
  `item_picture` varchar(999) NOT NULL,
  `item_price` varchar(999) NOT NULL,
  `item_stock` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`menu_item_ID`, `item_category`, `item_name`, `item_description`, `item_picture`, `item_price`, `item_stock`) VALUES
(1, 'signature', 'HAWAIIAN SALMON', 'The go-to option for those who love a hawaiian kick with the flavourish salmon!', '../MoshiQ2 IMG Assets/Menu/Hawaiian Salmon.png', '15.50', 'Available'),
(2, 'signature', 'COLOURFUL GODDESS', 'Our classic goddess bowl that will most definitely make your mouth water! Comes with 7 toppings and 2 garnishes.', '../MoshiQ2 IMG Assets/Menu/Colourful Goddess.png', '15.50', 'Unavailable'),
(5, 'signature', 'SPICY MIXED SALMON', 'A touch of spice on your fresh bowl of salmon will bring forth a wave of flavour!', '../MoshiQ2 IMG Assets/Menu/Spicy Mixed Salmon.png', '15.50', 'Available'),
(7, 'diy', 'SHOYU TUNA SPECIAL', 'Sweet and salty makes the umami go crazy on your tastebuds.', '../MoshiQ2 IMG Assets/Menu/Shoyu Tuna Specials.png', '12.80', 'Unavailable'),
(8, 'diy', 'FULL VEGGIELICIOUS', 'For the vege lovers out there this dish is made just for you!', '../MoshiQ2 IMG Assets/Menu/Full Vegelicious.png', '12.80', 'Available'),
(9, 'diy', 'AVOCADO SUPREME', 'Avocado Loveacado is there anything you can hate about it?', '../MoshiQ2 IMG Assets/Menu/Avocado Supreme.png', '12.80', 'Available'),
(10, 'acai', 'SUMMER FLING', 'This dish embodies the hot passionate summer time we had back in the day!', '../MoshiQ2 IMG Assets/Menu/Summer Fling.png', '8.90', 'Available'),
(11, 'acai', 'CHOC SWEET', 'Chocolate is always the number one dessert!', '../MoshiQ2 IMG Assets/Menu/Choc Sweet.png', '8.90', 'Available'),
(12, 'acai', 'CARAMEL NUTTIN', 'Nuts make the world go nuts. ', '../MoshiQ2 IMG Assets/Menu/Caramel Nuttin.png', '9.80', 'Available'),
(13, 'beverages', 'INCREDIBLE HULK', 'This drink has a secret that is only known when you try it!', '../MoshiQ2 IMG Assets/Menu/Incredible Hulk.png', '6.90', 'Available'),
(14, 'beverages', 'ORANGE MADNESS', 'Orange you glad that you got this?', '../MoshiQ2 IMG Assets/Menu/Orange Madness.png', '5.60', 'Available'),
(15, 'beverages', 'SPIDEY SENSES', 'All it takes is a leap of faith to bring your senses to a new world!', '../MoshiQ2 IMG Assets/Menu/Spidey Senses.png', '5.60', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `promoID` int(255) NOT NULL,
  `codeName` varchar(999) NOT NULL,
  `discountRate` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`promoID`, `codeName`, `discountRate`) VALUES
(1, 'moshiqq50', '50');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_ID` int(255) NOT NULL,
  `cust_ID` varchar(999) NOT NULL,
  `user_fullname` varchar(999) NOT NULL,
  `emailAddress` varchar(999) NOT NULL,
  `phoneNumber` varchar(999) NOT NULL,
  `outletLocation` varchar(999) NOT NULL,
  `dateSlot` varchar(999) NOT NULL,
  `timeSlot` varchar(999) NOT NULL,
  `paxAmount` varchar(999) NOT NULL,
  `seatingArea` varchar(999) NOT NULL,
  `promoCode` varchar(999) NOT NULL,
  `item_1` varchar(999) NOT NULL,
  `item_2` varchar(999) NOT NULL,
  `item_3` varchar(999) NOT NULL,
  `item_4` varchar(999) NOT NULL,
  `item_5` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_ID`, `cust_ID`, `user_fullname`, `emailAddress`, `phoneNumber`, `outletLocation`, `dateSlot`, `timeSlot`, `paxAmount`, `seatingArea`, `promoCode`, `item_1`, `item_2`, `item_3`, `item_4`, `item_5`) VALUES
(1, '2', 'lucas', 'lucasleeht@gmail.com', '91239123', 'CHANGI', '2022-10-20', 'timeSlot1', '4', 'H', 'moshiqq50', 'none', 'none', 'none', 'Summer Fling', 'Spidey Senses'),
(2, '2', 'lucas', 'lucasleeht@gmail.com', '91239123', 'CHANGI', '2022-10-20', 'timeSlot7', '4', 'H', 'moshiqq50', 'none', 'none', 'none', 'Summer Fling', 'Spidey Senses'),
(3, '2', 'fyp2022', 'fyp2022test@gmail.com', '91239123', 'YISHUN', '2022-10-20', 'timeSlot1', '1', 'B', 'moshiqq50', 'none', 'none', 'none', 'none', 'Spidey Senses'),
(4, '2', 'lucas', 'fyp2022test@gmail.com', '90009000', 'CHANGI', '2022-10-20', 'timeSlot5', '1', 'G', 'none', 'none', 'none', 'Shoyu Tuna Specials', 'none', 'none');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`menu_item_ID`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`promoID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `menu_item_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `promoID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
