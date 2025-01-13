-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 10:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookId` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vehicleType` int(11) DEFAULT NULL,
  `from_date` varchar(10) DEFAULT NULL,
  `too_date` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `book_status` int(11) DEFAULT 0,
  `dl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookId`, `vehicle_id`, `customer_id`, `vehicleType`, `from_date`, `too_date`, `description`, `book_status`, `dl`) VALUES
(1, 1, 1, 1, '2024-04-12', '2024-04-12', 'szdxfcgvhb', 1, 'Dl-1667Screenshot (2).png');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `car_name` varchar(100) DEFAULT NULL,
  `car_no` varchar(50) DEFAULT NULL,
  `modal_no` varchar(50) DEFAULT NULL,
  `car_rc` text DEFAULT NULL,
  `milage` varchar(50) DEFAULT NULL,
  `capacity` varchar(10) DEFAULT NULL,
  `car_type` varchar(50) DEFAULT NULL,
  `rent` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_available` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `owner_id`, `car_name`, `car_no`, `modal_no`, `car_rc`, `milage`, `capacity`, `car_type`, `rent`, `image`, `description`, `is_available`) VALUES
(1, 1, 'Tata Safari', 'KA19AB1234', '2019', 'Rc-787Screenshot (1).png', '15', '6', 'Diesel', 2000, 'Car-787Screenshot (2).png', 'description', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(10) UNSIGNED NOT NULL,
  `cus_name` varchar(50) DEFAULT NULL,
  `cus_age` int(11) DEFAULT NULL,
  `cus_email` varchar(100) DEFAULT NULL,
  `cus_contact` varchar(10) DEFAULT NULL,
  `cus_address` text DEFAULT NULL,
  `cus_password` varchar(50) DEFAULT NULL,
  `is_enabled` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_age`, `cus_email`, `cus_contact`, `cus_address`, `cus_password`, `is_enabled`) VALUES
(1, 'Abhinav K', 18, 'abhinavkunnuchi@gmail.com', '9999999999', 'address', 'abcd1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vehicle_type` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(10) UNSIGNED NOT NULL,
  `own_name` varchar(30) DEFAULT NULL,
  `own_age` int(11) DEFAULT NULL,
  `own_contact` varchar(10) DEFAULT NULL,
  `own_email` varchar(100) DEFAULT NULL,
  `own_address` text DEFAULT NULL,
  `own_password` varchar(100) DEFAULT NULL,
  `own_licenceno` varchar(20) DEFAULT NULL,
  `is_enabled` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `own_name`, `own_age`, `own_contact`, `own_email`, `own_address`, `own_password`, `own_licenceno`, `is_enabled`) VALUES
(1, 'Abhinav K', 22, '9999999999', 'abhinavkunnuchi@gmail.com', 'address', 'abcd1234', '1236547890', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
