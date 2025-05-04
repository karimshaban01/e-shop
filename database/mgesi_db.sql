-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 11:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgesi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification_tbl`
--

CREATE TABLE `notification_tbl` (
  `notification_id` int(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notificationBody` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `direct` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timeInter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE `orders_tbl` (
  `orderID` int(255) NOT NULL,
  `productID` varchar(255) NOT NULL,
  `productType` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `locationArrived` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `dateAded` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `productID` int(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `producttype` varchar(255) NOT NULL,
  `productquantity` varchar(255) NOT NULL,
  `productprice` varchar(255) NOT NULL,
  `productdescription` varchar(2550) NOT NULL,
  `uploadeddate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_db`
--

CREATE TABLE `system_db` (
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_db`
--

INSERT INTO `system_db` (`status`) VALUES
('on');

-- --------------------------------------------------------

--
-- Table structure for table `track_tbl`
--

CREATE TABLE `track_tbl` (
  `trackID` int(255) NOT NULL,
  `orderID` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `productID` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `track_tbl`
--

INSERT INTO `track_tbl` (`trackID`, `orderID`, `userID`, `productID`, `action`) VALUES
(8, '41', '8', '4', 'pending'),
(9, '41', '8', '4', 'accept'),
(10, '41', '8', '4', 'outgoing'),
(11, '41', '8', '4', 'completed'),
(12, '42', '8', '4', 'pending'),
(13, '42', '8', '4', 'declined'),
(14, '43', '8', '8', 'pending'),
(15, '44', '8', '11', 'pending'),
(16, '45', '8', '4', 'pending'),
(17, '45', '8', '4', 'accept'),
(18, '44', '8', '11', 'declined'),
(19, '45', '8', '4', 'outgoing'),
(20, '45', '8', '4', 'completed'),
(21, '46', '8', '8', 'pending'),
(22, '46', '8', '8', 'accept'),
(23, '46', '8', '8', 'outgoing'),
(24, '46', '8', '8', 'completed'),
(25, '47', '13', '12', 'pending'),
(26, '48', '13', '13', 'pending'),
(27, '48', '13', '13', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `types_tbl`
--

CREATE TABLE `types_tbl` (
  `typeId` int(255) NOT NULL,
  `typename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `userID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilepicture` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`userID`, `username`, `phonenumber`, `password`, `profilepicture`, `status`, `role`) VALUES
(1, 'admin', '255752409811', 'admin', 'profile.jpg', 'active', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `track_tbl`
--
ALTER TABLE `track_tbl`
  ADD PRIMARY KEY (`trackID`);

--
-- Indexes for table `types_tbl`
--
ALTER TABLE `types_tbl`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  MODIFY `notification_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `orderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `productID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `track_tbl`
--
ALTER TABLE `track_tbl`
  MODIFY `trackID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `types_tbl`
--
ALTER TABLE `types_tbl`
  MODIFY `typeId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
