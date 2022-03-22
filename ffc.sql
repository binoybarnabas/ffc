-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 03:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ffc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_uname` varchar(30) NOT NULL,
  `ad_email` varchar(45) NOT NULL,
  `ad_ph` bigint(10) NOT NULL,
  `ad_pwd` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_uname`, `ad_email`, `ad_ph`, `ad_pwd`) VALUES
(1, 'bbsm', 'binoyclashofclans@gmail.com', 2147483647, 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `textarea` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `textarea`) VALUES
(1, 'binoyb', 'binoyclashofclans@gmail.com', 'perfect 5 star');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `ordereduser` varchar(30) NOT NULL,
  `usercontact` bigint(10) NOT NULL,
  `useraddress` varchar(150) NOT NULL,
  `payment_type` varchar(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `res_status` varchar(11) NOT NULL,
  `delivery_status` varchar(11) NOT NULL,
  `deliveryboy` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `orderid`, `ordereduser`, `usercontact`, `useraddress`, `payment_type`, `totalprice`, `res_status`, `delivery_status`, `deliveryboy`) VALUES
(15, 42, 'bhagyanath', 9658743210, 'bhagyanath home kollam', 'online', 240, 'shipped', 'delivered', 'mammootty'),
(16, 43, '', 0, '', 'cod', 120, 'shipped', 'delivering', 'binoy'),
(26, 44, 'joel', 9633518952, 'joel home', 'online', 150, 'shipped', 'delivered', 'surya'),
(30, 45, '', 0, '', 'cod', 120, 'shipped', 'delivered', 'mammootty'),
(31, 46, 'bhagyanath', 9658743210, 'bhagyanath home kollam', 'online', 120, 'shipped', 'delivered', 'binoy'),
(32, 47, 'midhun', 9852364175, 'midhun home ', 'cod', 120, 'shipped', 'delivered', 'gokul');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy`
--

CREATE TABLE `deliveryboy` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `bgroup` varchar(11) NOT NULL,
  `license` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `status` varchar(3) NOT NULL,
  `dstatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryboy`
--

INSERT INTO `deliveryboy` (`id`, `name`, `uname`, `email`, `bgroup`, `license`, `contact`, `address`, `profile`, `pwd`, `status`, `dstatus`) VALUES
(4, 'mammootty', 'mammootty', 'mammootty@gmail.com', 'AB+', 'ma123', 7859643210, 'mammootty bhavan kavandu kollam', '5ff97ea781d728.11549153.png', 'mammootty', 'yes', 'Ready'),
(8, 'binoy', 'binoy', 'binoy@gmail.com', 'A+', '123', 9512587456, 'asdfgtrewq ', '602a8581934254.87167643.png', '123', 'yes', 'Ready'),
(10, 'gokulspookie', 'gokul', 'gokul@gmail.com', 'A+', '2135211', 9633518945, 'gokul home kollam', '60f049ec8710b9.78575004.jpg', '1234', 'yes', 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `foodlist`
--

CREATE TABLE `foodlist` (
  `fid` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `fprice` varchar(15) NOT NULL,
  `fdescription` varchar(100) NOT NULL,
  `frestaurents` varchar(50) NOT NULL,
  `fimage` varchar(125) NOT NULL,
  `manager` varchar(45) NOT NULL,
  `foodstatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodlist`
--

INSERT INTO `foodlist` (`fid`, `fname`, `fprice`, `fdescription`, `frestaurents`, `fimage`, `manager`, `foodstatus`) VALUES
(20, 'chiken biriyani', '120', 'kerala style Chicken Biriyani', 'ravis hotel', '5ff97a10830dd7.14302264.jpg', 'ravis', 'available'),
(21, 'Masala Dosa', '60', 'kerala masala dosa', 'ravis hotel', '6066042262ca32.13043927.jfif', 'ravis', 'available'),
(22, 'Chicken curry', '150', 'cheesy chicken curry', 'ravis hotel', '606604842a2a88.02566841.jpg', 'ravis', 'available'),
(23, 'shavarma', '120', 'chicken and cheesy shavarma', 'ravis hotel', '60660556ccbba2.75595776.jfif', 'ravis', 'available'),
(25, 'falooda', '120', 'sweet falooda', 'qwe', '60f041fe4caab1.81001290.jpg', 'qwe', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `foodorders`
--

CREATE TABLE `foodorders` (
  `orderid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `fprice` int(10) NOT NULL,
  `frestaurent` varchar(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `ordereduser` varchar(50) NOT NULL,
  `totalprice` int(10) NOT NULL,
  `ordered_date` date DEFAULT NULL,
  `payment_type` varchar(20) NOT NULL,
  `res_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodorders`
--

INSERT INTO `foodorders` (`orderid`, `fid`, `fname`, `fprice`, `frestaurent`, `qty`, `ordereduser`, `totalprice`, `ordered_date`, `payment_type`, `res_status`) VALUES
(42, 20, 'chiken biriyani', 120, 'ravis hotel', 2, 'bhagyanath123', 240, '2021-01-09', 'online', 'delivered'),
(43, 23, 'shavarma', 120, 'ravis hotel', 1, 'ravis', 120, '2021-07-15', 'cod', 'shipped'),
(44, 22, 'Chicken curry', 150, 'ravis hotel', 1, 'joel', 150, '2021-07-15', 'online', 'shipped'),
(45, 25, 'falooda', 120, 'qwe', 1, 'mammootty', 120, '2021-07-15', 'cod', 'delivered'),
(46, 25, 'falooda', 120, 'qwe', 1, 'bhagyanath123', 120, '2021-07-15', 'online', 'delivered'),
(47, 23, 'shavarma', 120, 'ravis hotel', 1, 'midhun123', 120, '2021-07-15', 'cod', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `restaurents`
--

CREATE TABLE `restaurents` (
  `rid` int(11) NOT NULL,
  `rname` varchar(30) NOT NULL,
  `runame` varchar(40) NOT NULL,
  `remail` varchar(45) NOT NULL,
  `rplace` varchar(100) NOT NULL,
  `rcontactno` bigint(10) NOT NULL,
  `raddress` text NOT NULL,
  `rpwd` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurents`
--

INSERT INTO `restaurents` (`rid`, `rname`, `runame`, `remail`, `rplace`, `rcontactno`, `raddress`, `rpwd`, `status`) VALUES
(9, 'ravis hotel', 'ravis', 'raviskollam@gmail.com', 'ashtamudi kollam', 9633548754, 'ravis hotel akshtamudi kollam', 'ravis123', 'enable'),
(10, 'qwe', 'qwe', 'qwe@gmail.com', 'qwerty', 9876542222, 'qwed', '123', 'enable'),
(11, 'aryas', 'aryashotel', 'aryashotel@gmail.com', 'kottiyam kollam', 9513578521, 'aryas hotel kollam kottiyam', 'aryas123', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contactno` bigint(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `profile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `contactno`, `address`, `pwd`, `profile`) VALUES
(7, 'bhagyanath', 'bhagyanath123', 'bhagyanath@gmail.com', 9658743210, 'bhagyanath home kollam', 'bhagyanath123', '../uploads/defaultprofile.png'),
(13, 'joel', 'joel', 'joeljoy@gmail.com', 9633518952, 'joel home', '1234', '../uploads/defaultprofile.png'),
(14, 'midhun', 'midhun123', 'midhun123@gmail.com', 9852364175, 'midhun home ', '3333', '../uploads/pubg_screentshot.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`),
  ADD UNIQUE KEY `ad_uname` (`ad_uname`),
  ADD UNIQUE KEY `ad_ph` (`ad_ph`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderid` (`orderid`);

--
-- Indexes for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodlist`
--
ALTER TABLE `foodlist`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `foodorders`
--
ALTER TABLE `foodorders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `restaurents`
--
ALTER TABLE `restaurents`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `contactno` (`contactno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `foodlist`
--
ALTER TABLE `foodlist`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `foodorders`
--
ALTER TABLE `foodorders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `restaurents`
--
ALTER TABLE `restaurents`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
