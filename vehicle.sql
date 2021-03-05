-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 07:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `card_id` int(11) NOT NULL,
  `card` varchar(20) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`card_id`, `card`, `month`, `year`, `cvv`, `amount`) VALUES
(1, '7777888899994444', '11', '2022', '111', '86000'),
(2, '9999666633332222', '12', '2023', '222', '97000'),
(3, '1111222233334444', '8', '2025', '333', '100000'),
(4, '7777888844445555', '6', '2023', '444', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `reg_number`
--

CREATE TABLE `reg_number` (
  `reg_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `registered_number` varchar(10) NOT NULL,
  `wheeler` varchar(10) NOT NULL,
  `random_custom` varchar(15) NOT NULL,
  `number` varchar(15) NOT NULL,
  `payment` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_number`
--

INSERT INTO `reg_number` (`reg_id`, `user_id`, `registered_number`, `wheeler`, `random_custom`, `number`, `payment`) VALUES
(2, '3', 'AP39EH1001', 'Two Wheele', 'RANDOM', '1001', 'Paid'),
(3, '4', 'AP39EH1048', 'Two Wheele', 'CUSTOM', '1048', 'Paid'),
(7, '15', 'AP39EH1051', 'Two Wheele', 'CUSTOM', '1051', 'Paid'),
(11, '22', 'AP39EH1060', 'Two Wheele', 'CUSTOM', '1060', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_de` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_de`, `user_id`, `name`, `address`, `status`) VALUES
(1, 3, 'karthik', 'Vijayawada', 'Pending'),
(2, 4, 'raj', 'Vizag', 'APPROVED'),
(6, 15, 'kalyan', 'vizag', 'APPROVED'),
(12, 22, 'karthi', 'kolkata', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `mobile`, `aadhar`, `user_type`) VALUES
(1, 'admin', '123', '1'),
(3, '9888888888', '999999999999', '2'),
(4, '7777777777', '888888888888', '2'),
(15, '9999999999', '666666666666', '2'),
(22, '6665555666', '888855558885', '2');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `vehicle_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `transport` varchar(20) NOT NULL,
  `chasis_number` varchar(11) NOT NULL,
  `engine_number` varchar(11) NOT NULL,
  `company` varchar(11) NOT NULL,
  `wheeler` varchar(20) NOT NULL,
  `img` varchar(30) NOT NULL DEFAULT 'image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`vehicle_id`, `user_id`, `transport`, `chasis_number`, `engine_number`, `company`, `wheeler`, `img`) VALUES
(6, '3', 'NON-TRANSPORT', '7987989898', '6549879879', 'HERO', 'Two Wheeler', 'c3.jpg'),
(7, '4', 'NON-TRANSPORT', '3216549879', '6546549879', 'BAJAJ', 'Two Wheeler', 'c1.jpg'),
(11, '15', 'NON-TRANSPORT', '9879879879', '6546546546', 'HERO', 'Two Wheeler', 'c4.jpg'),
(17, '22', 'TRANSPORT', '5555666666', '4444545454', 'HERO', 'Two Wheeler', 'c2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `reg_number`
--
ALTER TABLE `reg_number`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `reg_number` (`registered_number`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_de`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `aadhar` (`aadhar`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD UNIQUE KEY `chasis_number` (`chasis_number`) USING BTREE,
  ADD UNIQUE KEY `engine_number` (`engine_number`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_details`
--
ALTER TABLE `card_details`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reg_number`
--
ALTER TABLE `reg_number`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_de` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
