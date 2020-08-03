-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 09:21 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trackstork`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `cust_name` text NOT NULL,
  `contact_person` text NOT NULL,
  `mobile` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `org_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `contact_person`, `mobile`, `phone`, `email`, `address`, `latitude`, `longitude`, `org_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'ABC1213131', 'DEF1', '1234456781', '23213', 'mail1', 'ssadsadasdad', '21321', '2312312', 1, 2, '2020-04-19 12:33:23', 2, '2020-04-20 04:01:45'),
(2, 'ABC2', 'DEF2', '1234456782', '', 'mail2', 'address2', '', '', 1, 2, '2020-04-19 12:33:23', 2, '2020-04-19 12:33:23'),
(3, 'ABC3', 'DEF3', '1234456783', '', 'mail3', 'address3', '', '', 1, 2, '2020-04-19 12:33:23', 2, '2020-04-19 12:33:23'),
(4, 'ABC4', 'DEF4', '1234456784', '', 'mail4', 'address4', '', '', 1, 2, '2020-04-19 12:33:23', 2, '2020-04-19 12:33:23'),
(5, 'ABC5', 'DEF5', '1234456785', '', 'mail5', 'address5', '', '', 1, 2, '2020-04-19 12:33:23', 2, '2020-04-19 12:33:23'),
(6, 'ABC6', 'DEF6', '1234456786', '', 'mail6', 'address6', '', '', 1, 2, '2020-04-19 12:33:23', 2, '2020-04-19 12:33:23'),
(7, 'ABC7', 'DEF7', '1234456787', '', 'mail7', 'address7', '', '', 1, 2, '2020-04-19 12:33:23', 2, '2020-04-19 12:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` text NOT NULL,
  `contact_person` text NOT NULL,
  `contact_1` text NOT NULL,
  `contact_2` text NOT NULL,
  `email_id` text NOT NULL,
  `address` text NOT NULL,
  `logo` text NOT NULL,
  `rl` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `organization_name`, `contact_person`, `contact_1`, `contact_2`, `email_id`, `address`, `logo`, `rl`, `created_at`, `updated_at`) VALUES
(1, 'IOTL', 'Ameen Saalim', '8606187387', '971565387921', 'ameen@gredenza.com', 'Bangalore', 'org_1_1587283894.png', 5, '2020-04-08 05:04:25', '2020-04-19 06:41:34'),
(2, 'Clayworks', 'anand samuel', '12312', '2133213', 'anand@clayworks.in', 'bangalore', 'org_2_1586613723.png', 10, '2020-04-08 06:43:08', '2020-04-11 12:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `contact_1` text NOT NULL,
  `contact_2` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `user_type` int(11) NOT NULL,
  `reference_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `username`, `password`, `user_type`, `reference_id`, `organization_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Super User', 'sudo', 'sudo', 0, 0, 0, '2020-04-05 16:34:32', 0, '2020-04-05 16:34:32', 0),
(2, 'IOTL', 'grd', 'grd', 1, 1, 1, '2020-04-08 05:04:25', 0, '2020-04-08 09:15:25', 0),
(3, 'Clayworks', 'ana', 'ana', 1, 2, 2, '2020-04-08 06:43:08', 0, '2020-04-08 09:16:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `registration` text NOT NULL,
  `make` text NOT NULL,
  `model` text NOT NULL,
  `org_id` int(11) NOT NULL,
  `vcode` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `registration`, `make`, `model`, `org_id`, `vcode`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, 'am2', 'ami', 'ami', 1, 'c81e728d9d4c2f636f067f89cc14862c', 2, '2020-04-20 09:01:06', 2, '2020-04-20 09:01:06'),
(3, 'ami3', 'ami', 'ami', 1, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 2, '2020-04-20 09:01:25', 2, '2020-04-20 09:01:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `cust_id` (`cust_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD UNIQUE KEY `organization_id` (`organization_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD UNIQUE KEY `profile_id` (`profile_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD UNIQUE KEY `vehicle_id``` (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
