-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 04:52 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `cust_num` varchar(200) NOT NULL,
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

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_num`, `contact_person`, `mobile`, `phone`, `email`, `address`, `latitude`, `longitude`, `org_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(29, 'Customer 1', 'C1', 'Contact 1', '97100000002', '', 'customer1@gmail.com', 'Address1', '12.9177', '77.6238', 1, 2, '2020-07-18 23:10:28', 2, '2020-11-16 00:34:48'),
(30, 'Customer 2', 'C2', 'Contact 2', '97100000002', '', 'customer2@gmail.com', 'Address 2', '12.9982', '77.5530', 1, 2, '2020-07-18 23:12:30', 2, '2020-07-18 23:12:30'),
(31, 'FEWA CLIENT', '9994', 'Tom Hanks', '0507861234', '', 'tom.hanks@gmail.com', '', '25.2865978', '55.4013419', 4, 51, '2020-07-20 05:56:15', 51, '2020-07-20 06:39:57'),
(32, 'MADINA CLIENT', '9995', 'Victor Hugo', '0507861236', '', 'victor.hugo@gmail.com', '', '25.2826282', '55.3990103', 4, 51, '2020-07-20 05:57:44', 51, '2020-07-20 06:41:31'),
(33, 'RIHAN CLIENT', '9991', 'Beyonce', '0507861238', '', 'beyonce@gmail.com', '', '25.2798721', '55.3867844', 4, 51, '2020-07-20 06:00:08', 51, '2020-07-20 06:45:13'),
(34, 'RAK CLIENT', '9992', 'Stephen Hawking', '0507861237', '', 'stephen.hawking@gmail.com', '', '25.2835616', '55.3880238', 4, 51, '2020-07-20 06:01:19', 51, '2020-07-20 06:42:49'),
(35, 'GALADARI CLIENT', '9993', 'Charles Darwin', '0507861235', '', 'charles.darwin@gmail.com', '', '25.2913555', '55.3947094', 4, 51, '2020-07-20 06:03:20', 51, '2020-07-20 06:40:48'),
(36, 'Customer 3', 'cus 3', '', '9895102234', '', '', '', '13.0250', '77.5340', 1, 2, '2020-07-25 18:36:43', 2, '2020-07-25 18:36:43'),
(37, 'Sukanya', 'SK1', 'Sukumaran', '9745442378', '', '', '', '12.8811', '77.5340', 1, 2, '2020-08-14 18:24:24', 2, '2020-09-19 16:33:27'),
(38, 'Sruthi', 'SR1', 'Subhash', '9897969594', '', '', '', '', '', 1, 2, '2020-08-14 18:24:24', 2, '2020-08-14 18:24:24'),
(39, 'Jishi ', 'JS1', '', '', '', '', '', '13.0250', '77.6602', 1, 2, '2020-08-16 17:38:02', 2, '2020-09-19 18:03:26'),
(40, 'Ameen', 'AM1', '', '', '', '', '', '', '', 1, 2, '2020-08-16 17:38:02', 2, '2020-08-16 17:38:02'),
(41, 'C1', 'C1o1', '', '', '', '', '', '', '', 1, 2, '2020-08-16 17:40:21', 2, '2020-08-16 17:40:21'),
(42, 'C2', 'C2o1', '', '', '', '', '', '', '', 1, 2, '2020-08-16 17:40:21', 2, '2020-08-16 17:40:21'),
(43, 'cus 3', 'C3o1', '', '', '', '', '', '', '', 1, 2, '2020-08-16 17:40:21', 2, '2020-08-16 17:40:21'),
(44, 'AM1', 'Amo1', '', '', '', '', '', '', '', 1, 2, '2020-08-16 17:40:21', 2, '2020-08-16 17:40:21'),
(45, 'JS1', 'Js01', '', '', '', '', '', '', '', 1, 2, '2020-08-16 17:40:21', 2, '2020-08-16 17:40:21'),
(46, 'Shishira', 'SS1', '', '', '', '', '', '', '', 1, 2, '2020-09-09 16:10:37', 2, '2020-09-09 16:10:37'),
(47, 'Ajil', '8593967684', 'Ajil', '8593967684', '', 'edusat999@gmail.com', '', '12.9177', '76.9177', 1, 2, '2020-12-01 05:32:38', 2, '2020-12-05 06:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `despatch`
--

CREATE TABLE `despatch` (
  `despatch_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_no` text NOT NULL,
  `remarks` text NOT NULL,
  `despatch_import_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delivered` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_timestamp` timestamp NULL DEFAULT NULL,
  `is_manual` tinyint(1) NOT NULL DEFAULT 0,
  `imported_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `despatch`
--

INSERT INTO `despatch` (`despatch_id`, `customer_id`, `order_no`, `remarks`, `despatch_import_timestamp`, `is_delivered`, `delivery_timestamp`, `is_manual`, `imported_by`) VALUES
(5, 29, 'desp1', '', '2020-12-08 03:51:22', 1, '2020-12-08 12:52:48', 0, 2),
(6, 30, 'desp 2', '', '2020-12-05 07:00:31', 0, NULL, 0, 2),
(7, 36, 'O3', 'New order', '2020-12-08 03:51:24', 1, '2020-12-08 12:52:55', 0, 2),
(12, 30, 'Oc2', '', '2020-12-02 12:56:35', 1, '2020-12-04 12:56:30', 0, 2),
(21, 29, 'C1o1', '', '2020-12-05 07:00:37', 1, '2020-12-02 12:53:02', 0, 2),
(22, 30, 'C2o1', '', '2020-12-05 07:00:39', 1, '2020-12-02 12:53:01', 0, 2),
(23, 36, 'C3o1', '', '2020-08-14 18:18:25', 0, NULL, 0, 2),
(24, 29, 'C1o2', '', '2020-08-14 18:19:51', 0, NULL, 0, 2),
(25, 40, 'Amo1', '', '2020-12-02 11:56:20', 1, NULL, 0, 2),
(41, 37, 'sk1o1', '', '2020-09-19 18:01:00', 0, NULL, 0, 2),
(46, 34, 'W1111115', '', '2020-09-29 20:00:03', 0, NULL, 0, 51),
(47, 35, 'W1111112', '', '2020-09-29 20:00:03', 0, NULL, 0, 51),
(48, 31, 'W1111117', '', '2020-09-29 20:00:03', 0, NULL, 0, 51),
(49, 32, 'W1111119', '', '2020-09-29 20:00:03', 0, NULL, 0, 51),
(50, 37, 'O2', 'ksj', '2020-12-01 03:22:00', 0, NULL, 0, 2),
(51, 47, 'O250', '', '2020-12-08 06:31:00', 1, '2020-12-07 07:44:00', 0, 2),
(52, 47, 'O300', '', '2020-12-08 03:51:29', 1, '2020-12-08 07:44:04', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` bigint(11) NOT NULL,
  `address` text NOT NULL,
  `sales` tinyint(1) NOT NULL,
  `delivery` tinyint(1) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `org_id`, `name`, `phone`, `address`, `sales`, `delivery`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(73, 1, 'Driver 1', 971400000001, 'Address 1', 1, 0, 2, '2020-07-18 23:13:58', 2, '2020-12-05 06:35:40'),
(74, 1, 'Driver 2', 971400000002, 'Address 2', 1, 1, 2, '2020-07-18 23:19:16', 2, '2020-07-18 23:19:16'),
(75, 1, 'Driver 3', 971400000003, 'Address 3', 0, 1, 2, '2020-07-18 23:20:05', 2, '2020-07-18 23:20:05'),
(76, 1, 'Demo driver', 971563829190, 'Demo', 1, 1, 51, '2020-07-20 05:51:29', 51, '2020-07-20 05:51:29'),
(77, 1, 'ram', 9897979798, 'Kp', 1, 0, 2, '2020-12-01 03:19:10', 2, '2020-12-01 03:19:10');

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
(1, 'IOTL', 'Ameen Saalim', '8606187387', '971565387921', 'ameen@gredenza.com', 'Bangalore sing', 'org_1_1591629975.jpg', 5, '2020-04-08 05:04:25', '2020-06-08 13:56:15'),
(2, 'Clayworks', 'anand samuel', '12312', '2133213', 'anand@clayworks.in', 'bangalore', 'org_2_1586613723.png', 10, '2020-04-08 06:43:08', '2020-04-11 12:32:03'),
(4, 'LuLu', 'admin', '', '', 'admin@lulu.com', '', '', 16, '2020-07-13 15:38:27', '2020-07-13 15:38:27');

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

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `name`, `contact_1`, `contact_2`, `email`, `address`, `photo`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(16, 'Sukanya', '9745442379', '', 'sukanya@gmail.com', 'Kollaparambil', '', '2020-06-11 09:19:32', 1, '2020-06-11 09:20:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `waytrip_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `return_to_warehouse` tinyint(1) NOT NULL,
  `enable_traffic` tinyint(1) NOT NULL,
  `total_distance` text NOT NULL,
  `avg_speed` text NOT NULL,
  `detention_time` text NOT NULL,
  `total_time` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `waytrip_id`, `driver_id`, `warehouse_id`, `return_to_warehouse`, `enable_traffic`, `total_distance`, `avg_speed`, `detention_time`, `total_time`, `time_stamp`, `created_by`, `created_at`) VALUES
(20, 2, 74, 17, 0, 0, '', '40', '5', '', '2020-07-25 18:30:39', 2, '2020-07-25 18:30:39'),
(21, 3, 75, 17, 0, 0, '18.057', '40      ', '5', '00:37:05', '2020-08-16 18:27:40', 2, '2020-08-16 18:27:40'),
(22, 11, 76, 18, 0, 0, '2.745', '40 ', '5', '00:19:07', '2020-08-16 17:49:27', 51, '2020-08-16 17:49:27'),
(23, 14, 76, 18, 1, 0, '5.383', '40 ', '5', '00:28:04', '2020-08-17 18:25:03', 51, '2020-08-17 18:25:03'),
(25, 17, 76, 18, 1, 0, '6.284', '40 ', '5', '00:34:25', '2020-09-29 08:33:46', 51, '2020-09-29 08:33:46'),
(26, 18, 74, 17, 1, 0, '139.712', '40   ', '5', '03:44:34', '2020-12-05 06:36:54', 2, '2020-12-05 06:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `route_items`
--

CREATE TABLE `route_items` (
  `route_item_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `is_fixed` tinyint(1) NOT NULL,
  `item_order` int(11) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `delay` text NOT NULL,
  `distance_from_prev` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_items`
--

INSERT INTO `route_items` (`route_item_id`, `route_id`, `customer_id`, `is_fixed`, `item_order`, `latitude`, `longitude`, `delay`, `distance_from_prev`) VALUES
(239, 20, 29, 0, 1, '12.9177', '77.6238', '13:19:16', '7.392'),
(240, 20, 30, 0, 2, '12.9982', '77.5530', '13:40:06', '10.557'),
(250, 22, 35, 0, 1, '25.2913555', '55.3947094', '410.43', '1.227'),
(251, 22, 32, 0, 2, '25.2826282', '55.3990103', '406.83', '1.187'),
(252, 22, 31, 0, 3, '25.2865978', '55.4013419', '329.79', '0.331'),
(265, 23, 35, 0, 1, '25.2913555', '55.3947094', '410.43', '1.227'),
(266, 23, 32, 0, 2, '25.2826282', '55.3990103', '406.83', '1.187'),
(267, 23, 31, 0, 3, '25.2865978', '55.4013419', '329.79', '0.331'),
(272, 21, 30, 1, 1, '12.9982', '77.5530', '480', '2'),
(273, 21, 36, 0, 2, '13.0250', '77.5340', '570', '3'),
(274, 21, 39, 0, 3, '13.0250', '77.6602', '1200', '10'),
(275, 21, 37, 0, 4, '12.8811', '77.5340', '2010', '19'),
(276, 21, 29, 0, 5, '12.9177', '77.6238', '1020', '8'),
(292, 25, 35, 0, 1, '25.2913555', '55.3947094', '410.43', '1.227'),
(293, 25, 32, 0, 2, '25.2826282', '55.3990103', '406.83', '1.187'),
(294, 25, 31, 0, 3, '25.2865978', '55.4013419', '329.79', '0.331'),
(295, 25, 34, 0, 4, '25.2835616', '55.3880238', '499.34999999999997', '2.215'),
(302, 26, 37, 1, 1, '12.8811', '77.5340', '1209.8999999999999', '10.11'),
(303, 26, 47, 0, 2, '12.9177', '76.9177', '6536.370000000001', '69.293');

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
(51, 'LuLu', 'lulu', 'lulu', 1, 4, 4, '2020-07-13 15:38:27', 0, '2020-07-13 15:38:27', 0),
(53, 'Driver 1', 'dvr1', 'dvr1', 2, 73, 1, '2020-07-18 23:13:58', 2, '2020-12-05 06:35:40', 2),
(54, 'Driver 2', 'drv2', 'drv2', 2, 74, 1, '2020-07-18 23:19:16', 2, '2020-07-18 23:19:16', 2),
(55, 'Driver 3', 'drv3', 'drv3', 2, 75, 1, '2020-07-18 23:20:05', 2, '2020-07-18 23:20:05', 2),
(56, 'Demo driver', 'demo', 'demo', 2, 76, 4, '2020-07-20 05:51:29', 51, '2020-07-20 05:51:29', 51),
(57, 'ram', 'abc', 'abc', 2, 77, 1, '2020-12-01 03:19:10', 2, '2020-12-01 03:19:10', 2);

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
(2, 'am22', 'ami2', 'ami', 1, 'c81e728d9d4c2f636f067f89cc14862c', 2, '2020-04-20 09:01:06', 2, '2020-06-04 06:36:53'),
(3, 'ami3', 'ami', 'ami', 1, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 2, '2020-04-20 09:01:25', 2, '2020-04-20 09:01:25'),
(14, 'am1', 'msuah', 'sfdfdg', 1, 'aab3238922bcc25a6f606eb525ffdc56', 2, '2020-06-02 03:41:19', 2, '2020-06-04 06:30:13'),
(19, 'Demo Car', 'Demo', 'Demo', 4, '1f0e3dad99908345f7439f8ffabdffc4', 51, '2020-07-20 05:48:45', 51, '2020-07-20 05:48:45'),
(20, 'Veh 1', 'Honda', '2015', 1, '98f13708210194c475687be6106a3b84', 2, '2020-11-06 12:28:58', 2, '2020-11-06 12:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouse_id` int(11) NOT NULL,
  `warehouse_name` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `org_id` int(200) NOT NULL,
  `created_by` int(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` int(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `warehouse_name`, `latitude`, `longitude`, `org_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(17, 'Gredenza telematics wh1', '12.9767', '77.5713', 1, 2, '2020-07-18 23:05:59', 2, '2020-12-05 06:34:32'),
(18, 'Gredenza Warehouse', '25.2781935', '55.3837377', 4, 51, '2020-07-20 05:48:18', 0, '2020-07-19 18:48:18'),
(19, 'Muhaisnah WAREHOUSE', '25.2784309', '55.4034256', 4, 51, '2020-07-20 13:51:09', 0, '2020-07-20 02:51:09'),
(20, 'Gredenza telematics wh2', '12.9769', '77.5715', 1, 2, '2020-08-14 18:30:38', 0, '2020-08-14 07:30:38'),
(21, 'Gredenza telematics wh3', '12.977', '77.5716', 1, 2, '2020-08-14 18:30:38', 0, '2020-08-14 07:30:38'),
(22, 'Gredenza telematics wh4', '12.978', '77.5717', 1, 2, '2020-08-16 17:36:25', 0, '2020-08-16 06:36:26'),
(23, 'Gredenza telematics wh5', '12.979', '77.5718', 1, 2, '2020-08-16 17:36:25', 0, '2020-08-16 06:36:26'),
(24, 'Gredenza telematics wh6', '12.98', '77.5719', 1, 2, '2020-09-09 16:12:21', 0, '2020-09-09 05:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `waytrip`
--

CREATE TABLE `waytrip` (
  `waytrip_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `driver_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `total_orders` int(11) NOT NULL,
  `delivered_orders` int(11) NOT NULL DEFAULT 0,
  `trip_start_time` timestamp NULL DEFAULT NULL,
  `trip_start_lat` text DEFAULT NULL,
  `trip_start_lon` text DEFAULT NULL,
  `trip_completed` tinyint(1) NOT NULL DEFAULT 0,
  `trip_end_time` timestamp NULL DEFAULT NULL,
  `trip_end_lat` text DEFAULT NULL,
  `trip_end_lon` text DEFAULT NULL,
  `assigned_by` int(11) NOT NULL,
  `assigned_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waytrip`
--

INSERT INTO `waytrip` (`waytrip_id`, `date`, `driver_id`, `vehicle_id`, `total_orders`, `delivered_orders`, `trip_start_time`, `trip_start_lat`, `trip_start_lon`, `trip_completed`, `trip_end_time`, `trip_end_lat`, `trip_end_lon`, `assigned_by`, `assigned_at`) VALUES
(3, '2020-09-15', 75, NULL, 7, 1, '2020-12-01 09:43:17', '12.98', '77.25', 0, NULL, NULL, NULL, 2, '2020-07-25 18:39:02'),
(17, '2020-07-20', 76, NULL, 4, 1, '2020-12-02 06:43:00', '18.365', '85.3655', 0, NULL, NULL, NULL, 51, '2020-09-29 08:32:47'),
(18, '2020-12-02', 74, NULL, 4, 1, '2020-12-01 04:48:36', '18.365', '85.365', 0, NULL, NULL, NULL, 2, '2020-11-29 03:37:44'),
(19, '2020-12-07', 74, NULL, 2, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 2, '2020-12-01 03:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `waytrip_items`
--

CREATE TABLE `waytrip_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `waytrip_id` int(11) NOT NULL,
  `despatch_id` int(11) NOT NULL,
  `is_delivered` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_timestamp` timestamp NULL DEFAULT NULL,
  `delivery_lat` text DEFAULT NULL,
  `delivery_lon` text DEFAULT NULL,
  `pod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waytrip_items`
--

INSERT INTO `waytrip_items` (`id`, `waytrip_id`, `despatch_id`, `is_delivered`, `delivery_timestamp`, `delivery_lat`, `delivery_lon`, `pod_id`) VALUES
(7, 3, 5, 1, '2020-12-07 06:58:45', NULL, NULL, NULL),
(8, 3, 7, 1, '2020-12-07 06:58:52', NULL, NULL, NULL),
(9, 3, 6, 1, '2020-12-03 06:58:56', NULL, NULL, NULL),
(25, 3, 21, 1, '2020-12-05 06:59:00', NULL, NULL, NULL),
(26, 3, 24, 0, NULL, NULL, NULL, NULL),
(27, 3, 23, 0, NULL, NULL, NULL, NULL),
(39, 3, 22, 0, NULL, NULL, NULL, NULL),
(57, 17, 46, 1, NULL, NULL, NULL, NULL),
(58, 17, 47, 1, NULL, NULL, NULL, NULL),
(59, 17, 48, 0, NULL, NULL, NULL, NULL),
(60, 17, 49, 0, NULL, NULL, NULL, NULL),
(61, 18, 41, 1, NULL, NULL, NULL, NULL),
(62, 19, 25, 0, NULL, NULL, NULL, NULL),
(63, 19, 12, 0, NULL, NULL, NULL, NULL),
(64, 18, 50, 1, NULL, NULL, NULL, NULL),
(66, 18, 51, 0, NULL, NULL, NULL, NULL),
(67, 18, 52, 0, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `cust_id` (`cust_id`);

--
-- Indexes for table `despatch`
--
ALTER TABLE `despatch`
  ADD UNIQUE KEY `despatch_id` (`despatch_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `route_items`
--
ALTER TABLE `route_items`
  ADD PRIMARY KEY (`route_item_id`);

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
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `waytrip`
--
ALTER TABLE `waytrip`
  ADD UNIQUE KEY `waytrip_id` (`waytrip_id`);

--
-- Indexes for table `waytrip_items`
--
ALTER TABLE `waytrip_items`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `despatch`
--
ALTER TABLE `despatch`
  MODIFY `despatch_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `route_items`
--
ALTER TABLE `route_items`
  MODIFY `route_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `waytrip`
--
ALTER TABLE `waytrip`
  MODIFY `waytrip_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `waytrip_items`
--
ALTER TABLE `waytrip_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
