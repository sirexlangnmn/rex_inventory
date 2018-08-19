-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 10:10 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory2`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `branch_address` varchar(100) NOT NULL,
  `branch_contact` varchar(50) NOT NULL,
  `skin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_address`, `branch_contact`, `skin`) VALUES
(1, 'SM City North Edsa', 'North Edsa, Quezon City', '09098202040', 'red'),
(2, 'SM City Fairview', 'Fairview, Quezon City', '09153858690', 'purple'),
(3, 'SM City Tungkong Manga', 'San Jose Del Monte City', '09095551234', 'black'),
(4, 'SM City Novaliches', 'Novaliches, Quezon City', '09091231234', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(5, 'Television'),
(6, 'Sofa'),
(7, 'Video Player'),
(8, 'Home Appliance'),
(9, 'Kitchen Appliance'),
(10, 'Gadget'),
(11, 'Rice Cooker'),
(12, 'Cosmetics');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_first` varchar(50) NOT NULL,
  `cust_last` varchar(30) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_contact` varchar(30) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `cust_pic` varchar(300) NOT NULL,
  `bday` date NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `house_status` varchar(30) NOT NULL,
  `years` varchar(20) NOT NULL,
  `rent` varchar(10) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_no` varchar(30) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_year` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `salary` varchar(30) NOT NULL,
  `spouse` varchar(30) NOT NULL,
  `spouse_no` varchar(30) NOT NULL,
  `spouse_emp` varchar(50) NOT NULL,
  `spouse_details` varchar(100) NOT NULL,
  `spouse_income` decimal(10,2) NOT NULL,
  `comaker` varchar(30) NOT NULL,
  `comaker_details` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `credit_status` varchar(10) NOT NULL,
  `ci_remarks` varchar(1000) NOT NULL,
  `ci_name` varchar(50) NOT NULL,
  `ci_date` date NOT NULL,
  `payslip` int(11) NOT NULL,
  `valid_id` int(11) NOT NULL,
  `cert` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_first`, `cust_last`, `cust_address`, `cust_contact`, `balance`, `cust_pic`, `bday`, `nickname`, `house_status`, `years`, `rent`, `emp_name`, `emp_no`, `emp_address`, `emp_year`, `occupation`, `salary`, `spouse`, `spouse_no`, `spouse_emp`, `spouse_details`, `spouse_income`, `comaker`, `comaker_details`, `branch_id`, `credit_status`, `ci_remarks`, `ci_name`, `ci_date`, `payslip`, `valid_id`, `cert`, `cedula`, `income`) VALUES
(1, 'Kenneth', 'Aboy', 'Silay City\r\n', '09098', '0.00', 'default.gif', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, '', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(2, 'Honeylee', 'Magbanua', 'Brgy. Busay, bago CIty', '09051914070', '12360.00', 'default.gif', '1989-10-14', 'lee', 'owned', '27', 'NA', 'Stratium Software', '034-707-1630', 'Ayala Northpoint', '1', 'Systems Administrator', '12000', 'NA', 'NA', 'NA', 'NA', '0.00', 'Kaye Angela Cueva', 'Cadiz City', 1, 'Approved', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(3, 'federex', 'potolin', 'Quezon City', '09098202040', '37080.00', 'default.gif', '1990-03-17', 'rex', 'owned', '10', 'NA', 'Legitize Drops', '090-082-0123', 'Quezon City', '4', 'Full Stack Developer', '12000', 'NA', 'NA', 'NA', 'NA', '0.00', 'Dannize Zabballero', 'Novaliches Quezon City', 1, 'Approved', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(4, 'Daphne', 'Zaballero', 'Quezon City', '09098202040', '0.00', 'default.gif', '1990-03-17', 'dap', 'owned', '20', 'NA', 'Hospital', '090-082-0123', 'Quezon City', '4', 'Psychologist', '12000', 'NA', 'NA', 'NA', 'NA', '0.00', 'Federex Potolin', 'Quezon City', 1, 'Pending', '', '', '0000-00-00', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `user_id`, `action`, `date`) VALUES
(43, 1, 'sales 80.', '2018-08-09 05:47:20'),
(44, 1, 'sales 160.', '2018-08-09 05:49:41'),
(45, 1, 'has logged in the system at ', '2018-08-09 19:37:09'),
(46, 1, 'has logged in the system at ', '2018-08-09 19:37:41'),
(47, 1, 'sales 120.', '2018-08-09 22:49:22'),
(48, 1, 'sales 120.', '2018-08-09 22:50:45'),
(49, 1, 'sales 0.', '2018-08-10 03:07:25'),
(50, 1, 'has logged in the system at ', '2018-08-10 19:54:44'),
(51, 1, 'has logged in the system at ', '2018-08-10 19:59:21'),
(52, 1, 'request to purchase 1 19898981.', '2018-08-10 00:00:00'),
(53, 1, 'request to purchase 1 19898981.', '2018-08-10 00:00:00'),
(54, 1, 'request to purchase 1 19898981.', '2018-08-10 00:00:00'),
(55, 1, 'request to purchase 1 19898981.', '2018-08-10 00:00:00'),
(56, 1, 'request to purchase 1 19898981.', '2018-08-11 00:00:00'),
(57, 1, 'deleted 1 LG 43\" UHD TV UH6100 from purchase request', '2018-08-11 00:03:07'),
(58, 1, 'deleted 1 LG 43\" UHD TV UH6100 from purchase request', '2018-08-11 00:04:04'),
(59, 1, 'deleted 1 LG 43\" UHD TV UH6100 from purchase request', '2018-08-11 00:04:14'),
(60, 1, 'request to purchase 1 19898981.', '2018-08-11 00:00:00'),
(61, 1, 'added 1 of Samsung', '2018-08-11 04:19:51'),
(62, 1, 'added 1 of Samsung', '2018-08-11 04:21:25'),
(63, 1, 'added 1 of Samsung', '2018-08-11 04:21:42'),
(64, 1, 'added 3 of Samsung', '2018-08-11 04:21:52'),
(65, 1, 'sales 120.', '2018-08-11 06:10:57'),
(66, 1, 'sales 0.', '2018-08-11 06:11:38'),
(67, 1, 'sales 0.', '2018-08-11 06:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payment_for` date NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `remaining` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rebate` decimal(10,2) NOT NULL,
  `or_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `cust_id`, `sales_id`, `payment`, `payment_date`, `user_id`, `branch_id`, `payment_for`, `due`, `interest`, `remaining`, `status`, `rebate`, `or_no`) VALUES
(3303, 2, 63, '0.00', '2018-08-10 03:07:25', 1, 1, '2018-08-10', '0.00', '0.00', '0.00', 'Paid', '0.00', 1901),
(3304, 2, 64, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-09-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3305, 2, 64, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-10-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3306, 2, 64, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-11-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3307, 2, 64, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-12-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3308, 2, 64, '0.00', '0000-00-00 00:00:00', 1, 1, '2019-01-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3309, 2, 64, '0.00', '0000-00-00 00:00:00', 1, 1, '2019-02-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3310, 2, 64, '3090.00', '2018-08-10 00:00:00', 1, 1, '2018-08-10', '3090.00', '0.00', '0.00', 'paid', '0.00', 3151),
(3311, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-09-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3312, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-10-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3313, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-11-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3314, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-12-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3315, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2019-01-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3316, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2019-02-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3317, 2, 65, '3090.00', '2018-08-10 00:00:00', 1, 1, '2018-08-10', '3090.00', '0.00', '0.00', 'paid', '0.00', 3152),
(3318, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-09-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3319, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-10-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3320, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-11-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3321, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-12-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3322, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2019-01-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3323, 2, 65, '0.00', '0000-00-00 00:00:00', 1, 1, '2019-02-10', '2060.00', '0.00', '2060.00', '', '0.00', 0),
(3324, 2, 65, '3090.00', '2018-08-10 00:00:00', 1, 1, '2018-08-10', '3090.00', '0.00', '0.00', 'paid', '0.00', 3153),
(3325, 3, 66, '0.00', '0000-00-00 00:00:00', 1, 1, '2018-09-10', '37080.00', '0.00', '37080.00', '', '0.00', 0),
(3326, 3, 66, '9270.00', '2018-08-10 00:00:00', 1, 1, '2018-08-10', '9270.00', '0.00', '0.00', 'paid', '0.00', 3154),
(3327, 3, 67, '120.00', '2018-08-11 06:10:57', 1, 1, '2018-08-11', '120.00', '0.00', '0.00', 'Paid', '0.00', 1902),
(3328, 3, 68, '0.00', '2018-08-11 06:11:38', 1, 1, '2018-08-11', '0.00', '0.00', '0.00', 'Paid', '0.00', 1903),
(3329, 3, 69, '0.00', '2018-08-11 06:11:38', 1, 1, '2018-08-11', '0.00', '0.00', '0.00', 'Paid', '0.00', 1904);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_pic` varchar(300) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `reorder` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `serial` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `prod_pic`, `cat_id`, `prod_qty`, `branch_id`, `reorder`, `supplier_id`, `serial`) VALUES
(5, 'LG 43\" UHD TV UH6100', '', '45000.00', 'tv.jpg', 5, 48, 1, 50, 4, '19898981'),
(13, 'Rice Cooker', '', '550.00', 'WIN_20160728_16_56_20_Pro (2).jpg', 9, 49, 1, 50, 4, '22ewew'),
(14, 'Samsung', '', '15000.00', 'WIN_20160209_16_45_20_Pro.jpg', 10, 104, 1, 50, 5, 'erere323'),
(15, 'Lotion', '', '120.00', 'default.gif', 12, 99, 1, 50, 6, '1101388911'),
(16, 'Sample', 'description', '110.00', 'default.gif', 10, 100, 1, 50, 2, '878878');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `pr_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `purchase_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_request`
--

INSERT INTO `purchase_request` (`pr_id`, `prod_id`, `qty`, `request_date`, `branch_id`, `purchase_status`) VALUES
(1, 5, 1, '2018-08-10', 1, 'pending'),
(2, 5, 1, '2018-08-10', 1, 'pending'),
(6, 5, 1, '2018-08-11', 1, 'pending'),
(7, 5, 1, '2018-08-11', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_tendered` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `cash_change` decimal(10,2) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `modeofpayment` varchar(15) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `cust_id`, `user_id`, `cash_tendered`, `discount`, `amount_due`, `cash_change`, `date_added`, `modeofpayment`, `branch_id`, `total`) VALUES
(44, 1, 1, '1000.00', '20.00', '100.00', '900.00', '2018-08-09 05:47:20', 'Cash', 1, '80.00'),
(45, 1, 1, '1000.00', '40.00', '200.00', '800.00', '2018-08-09 05:49:41', 'Cash', 1, '160.00'),
(46, 1, 1, '0.00', '0.00', '120.00', '0.00', '2018-08-09 22:49:22', 'Cash', 1, '120.00'),
(47, 1, 1, '1120.00', '0.00', '120.00', '1000.00', '2018-08-09 22:50:45', 'Cash', 1, '120.00'),
(48, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-09 23:47:49', 'credit', 1, '120.00'),
(49, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-09 23:47:56', 'credit', 1, '120.00'),
(50, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-09 23:54:42', 'credit', 1, '120.00'),
(51, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-09 23:55:56', 'credit', 1, '120.00'),
(52, 2, 1, NULL, NULL, '0.00', NULL, '2018-08-10 02:55:49', 'credit', 1, '45.00'),
(53, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 02:55:56', 'credit', 1, '120.00'),
(54, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 02:56:12', 'credit', 1, '120.00'),
(55, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 02:56:28', 'credit', 1, '120.00'),
(56, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 02:57:00', 'credit', 1, '120.00'),
(57, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 02:57:32', 'credit', 1, '120.00'),
(58, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 02:57:44', 'credit', 1, '120.00'),
(59, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 02:58:33', 'credit', 1, '120.00'),
(60, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 02:58:56', 'credit', 1, '120.00'),
(61, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 03:00:11', 'credit', 1, '120.00'),
(62, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 03:00:30', 'credit', 1, '120.00'),
(63, 2, 1, '0.00', '0.00', '0.00', '0.00', '2018-08-10 03:07:25', 'Cash', 1, '0.00'),
(64, 2, 1, NULL, NULL, '0.00', NULL, '2018-08-10 03:08:07', 'credit', 1, '15.00'),
(65, 2, 1, NULL, NULL, '0.00', NULL, '2018-08-10 03:32:49', 'credit', 1, '15.00'),
(66, 3, 1, NULL, NULL, '0.00', NULL, '2018-08-10 22:48:21', 'credit', 1, '45.00'),
(67, 3, 1, '0.00', '0.00', '120.00', '-120.00', '2018-08-11 06:10:57', 'Cash', 1, '120.00'),
(68, 3, 1, '120.00', '0.00', '0.00', '120.00', '2018-08-11 06:11:38', 'Cash', 1, '0.00'),
(69, 3, 1, '120.00', '0.00', '0.00', '120.00', '2018-08-11 06:11:38', 'Cash', 1, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_details_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sales_details_id`, `sales_id`, `prod_id`, `price`, `qty`) VALUES
(32, 44, 15, '120.00', 1),
(33, 45, 15, '120.00', 2),
(34, 46, 15, '120.00', 1),
(35, 47, 15, '120.00', 1),
(36, 48, 15, '120.00', 1),
(37, 50, 15, '120.00', 1),
(38, 51, 15, '120.00', 1),
(39, 52, 15, '45000.00', 1),
(40, 54, 15, '120.00', 1),
(41, 55, 15, '120.00', 1),
(42, 56, 15, '120.00', 1),
(43, 57, 15, '120.00', 1),
(44, 58, 15, '120.00', 1),
(45, 59, 15, '120.00', 1),
(46, 60, 15, '120.00', 1),
(47, 61, 15, '120.00', 1),
(48, 62, 15, '120.00', 1),
(49, 64, 14, '15000.00', 1),
(50, 65, 14, '15000.00', 1),
(51, 66, 5, '45000.00', 1),
(52, 67, 15, '120.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `stockin_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(6) NOT NULL,
  `date_delivered` datetime NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`stockin_id`, `prod_id`, `qty`, `date_delivered`, `branch_id`) VALUES
(1, 5, 5, '2018-02-04 01:10:41', 1),
(2, 15, 100, '2018-02-04 01:10:49', 1),
(3, 13, 10, '2018-02-04 01:10:55', 1),
(4, 14, 5, '2018-02-04 01:11:07', 1),
(5, 14, 1, '2018-08-11 04:19:51', 1),
(6, 14, 1, '2018-08-11 04:21:25', 1),
(7, 14, 1, '2018-08-11 04:21:42', 1),
(8, 14, 3, '2018-08-11 04:21:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(300) NOT NULL,
  `supplier_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`) VALUES
(2, 'LG Philippines', 'Makati City, Philippines', '423-4444'),
(3, 'Union Home Appliances', 'Binondo, Manila', '98878'),
(4, 'Hanabishi', 'Bacolod City', '034-666-087611'),
(5, 'Samsung Philippines', 'Philippines', '42424'),
(6, 'Avon', 'Bacolod City', '15562'),
(7, 'iStore PH', 'Manila City,Philippines', '09134567890');

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(11) NOT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `payable_for` varchar(10) NOT NULL,
  `term` varchar(11) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `payment_start` date NOT NULL,
  `down` decimal(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `sales_id`, `payable_for`, `term`, `due`, `payment_start`, `down`, `due_date`, `interest`, `status`) VALUES
(1, 8, '4', 'monthly', '113.30', '2017-02-21', '113.30', '2017-06-21', '16.50', ''),
(2, 9, '4', 'monthly', '113.30', '2017-02-21', '113.30', '2017-06-21', '16.50', ''),
(3, 51, '3', 'daily', '1.10', '2018-08-10', '24.72', '2018-11-10', '3.60', ''),
(4, 51, '1', 'monthly', '98.88', '2018-08-10', '24.72', '2018-09-10', '3.60', ''),
(5, 51, '1', 'monthly', '98.88', '2018-08-10', '24.72', '2018-09-10', '3.60', ''),
(6, 64, '6', 'monthly', '2060.00', '2018-08-10', '3090.00', '2019-02-10', '450.00', ''),
(7, 65, '6', 'monthly', '2060.00', '2018-08-10', '3090.00', '2019-02-10', '450.00', ''),
(8, 65, '6', 'monthly', '2060.00', '2018-08-10', '3090.00', '2019-02-10', '450.00', ''),
(9, 66, '1', 'monthly', '37080.00', '2018-08-10', '9270.00', '2018-09-10', '1350.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `status`, `branch_id`) VALUES
(1, 'edsa', 'edsa', 'edsa name', 'active', 1),
(4, 'fvw', 'fvw', 'fvw name', 'active', 2),
(5, 'nova', 'nova', 'nova name', 'active', 4),
(6, 'tm', 'tm', 'tm name', 'active', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_details_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`stockin_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3330;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
