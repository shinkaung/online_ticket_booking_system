-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2022 at 04:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_booking_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `tid` int(6) NOT NULL,
  `uid` int(6) NOT NULL,
  `bid` int(6) NOT NULL,
  `seat_no` int(2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `b_date` varchar(255) NOT NULL,
  `b_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`tid`, `uid`, `bid`, `seat_no`, `status`, `b_date`, `b_time`) VALUES
(62, 1, 1, 1, 'CANCELLED', '2022-04-04', '2022-04-04 12:08 am'),
(63, 1, 1, 3, 'CANCELLED', '2022-04-04', '2022-04-04 08:34 am'),
(64, 1, 1, 4, 'PENDING', '2022-04-04', '2022-04-04 08:34 am'),
(65, 1, 1, 8, 'CANCELLED', '2022-04-04', '2022-04-04 06:33 am'),
(66, 1, 3, 1, 'PENDING', '2022-04-05', '2022-04-04 10:16 am'),
(67, 1, 3, 2, 'CANCELLED', '2022-04-05', '2022-04-04 08:15 am'),
(68, 1, 3, 3, 'CANCELLED', '2022-04-05', '2022-04-04 10:46 am'),
(69, 1, 3, 4, 'PENDING', '2022-04-05', '2022-04-04 10:46 am'),
(70, 1, 3, 8, 'CANCELLED', '2022-04-05', '2022-04-04 08:45 am'),
(71, 1, 1, 1, 'CANCELLED', '2022-04-05', '2022-04-04 11:01 am'),
(72, 1, 1, 2, 'CANCELLED', '2022-04-05', '2022-04-04 09:01 am'),
(73, 2, 1, 15, 'CANCELLED', '2022-04-05', '2022-04-04 11:13 am'),
(74, 2, 1, 16, 'CANCELLED', '2022-04-05', '2022-04-04 11:13 am'),
(75, 2, 1, 20, 'CANCELLED', '2022-04-05', '2022-04-04 09:12 am'),
(76, 1, 4, 1, 'CANCELLED', '2022-04-05', '2022-04-04 02:50 pm'),
(77, 1, 4, 2, 'CANCELLED', '2022-04-05', '2022-04-04 12:50 pm'),
(78, 1, 1, 3, 'PENDING', '2022-04-06', '2022-04-05 11:59 pm'),
(79, 1, 1, 4, 'PENDING', '2022-04-06', '2022-04-05 11:59 pm'),
(80, 1, 1, 5, 'CANCELLED', '2022-04-06', '2022-04-06 12:03 am'),
(81, 1, 1, 6, 'PENDING', '2022-04-06', '2022-04-06 12:03 am'),
(82, 1, 1, 7, 'CONFIRMED', '2022-04-06', '2022-04-06 12:03 am'),
(83, 1, 1, 3, 'CANCELLED', '2022-04-07', '2022-04-06 12:22 am'),
(84, 1, 1, 4, 'CANCELLED', '2022-04-07', '2022-04-06 12:22 am'),
(85, 1, 1, 8, 'CANCELLED', '2022-04-07', '2022-04-06 12:22 am'),
(86, 1, 2, 4, 'PENDING', '2022-04-07', '2022-04-06 12:48 am'),
(87, 1, 1, 2, 'PENDING', '2022-04-07', '2022-04-06 08:04 am'),
(88, 1, 1, 3, 'PENDING', '2022-04-07', '2022-04-06 08:04 am'),
(89, 1, 1, 4, 'PENDING', '2022-04-07', '2022-04-06 08:04 am');

-- --------------------------------------------------------

--
-- Table structure for table `bus_info`
--

CREATE TABLE `bus_info` (
  `id` int(6) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `r_from` varchar(255) NOT NULL,
  `r_to` varchar(255) NOT NULL,
  `d_time` varchar(255) NOT NULL,
  `price` int(6) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `seat` int(2) NOT NULL,
  `route` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bus_info`
--

INSERT INTO `bus_info` (`id`, `bus_name`, `r_from`, `r_to`, `d_time`, `price`, `logo`, `seat`, `route`) VALUES
(1, 'Shwe Sin Set Kyar', 'Yangon', 'Mandalay', '10:30 PM', 25000, 'ShweSinSetKyar.png', 44, 'Yangon - Mandalay'),
(2, 'Shwe Sin Set Kyar', 'Yangon', 'Naypyidaw', '8:00 AM', 20000, 'ShweSinSetKyar.png', 44, 'Yangon - Naypyidaw'),
(3, 'Shwe Mandalar', 'Yangon', 'Mandalay', '8:00 AM', 25000, 'shweMandalar.png', 44, 'Yangon - Mandalay'),
(4, 'Khine Mandalay', 'Yangon', 'Mandalay', '8:00 AM', 23000, 'KhaingMandalay.png', 44, 'Yangon - Mandalay'),
(5, 'GI Group Express', 'Mandalay', 'TaungGyi', '9:00 AM', 40000, 'GI.png', 44, 'Mandalay - TaungGyi'),
(6, 'Shwe Mandalar', 'Yangon', 'Naypyidaw', '9:00 AM', 25000, 'shweMandalar.png', 44, 'Yangon - Naypyidaw'),
(8, 'Lumbini', 'Yangon', 'Taunggyi', '08:00 AM', 45000, 'Lumbini.png', 44, 'Yangon - Taunggyi'),
(9, 'Lumbini', 'Yangon', 'Mandalay', '08:00 AM', 45000, 'Lumbini.png', 44, 'Yangon - Mandalay');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(6) NOT NULL,
  `uid` int(6) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `comment`, `date`) VALUES
(1, 1, 'testing feedback', '2022-04-05'),
(2, 1, 'thank you', '2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `uid` int(6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`uid`, `username`, `email`, `password`, `role`) VALUES
(1, 'shinkaung', 'shinkaung@gmail.com', '123', 0),
(2, 'nu war', 'nuwar@gmail.com', '12345', 0),
(3, 'admin', 'admin@gmail.com', 'asd123', 1),
(4, 'marc', 'marc@gmail.com', 'user123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `bus_info`
--
ALTER TABLE `bus_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `tid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `bus_info`
--
ALTER TABLE `bus_info`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `uid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
