-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 12:39 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rex_inventory0`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(45) NOT NULL,
  `branch_address` varchar(100) NOT NULL,
  `branch_contact` varchar(45) NOT NULL,
  `skin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_address`, `branch_contact`, `skin`) VALUES
(1, 'SM City North Edsa', 'North Edsa, Quezon City', '0909 820 2040', 'purple'),
(2, 'SM City Fairview', 'Fairview, Quezon City', '0915 385 8690', 'red'),
(3, 'SM City Novaliches', 'Novaliches, Quezon City', '0909 123 1234', 'blue'),
(4, 'SM City Tungkong Manga', 'San Jose Del Monte City', '0909 555 1234', 'black');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Foods'),
(2, 'Drinks'),
(3, 'Garments'),
(4, 'Mobiles and Gadgets'),
(5, 'Home Appliances'),
(6, 'Kitchen Appliances'),
(7, 'Hardware'),
(8, 'Cosmetics');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_first` varchar(45) NOT NULL,
  `cust_last` varchar(45) NOT NULL,
  `cust_address` varchar(225) NOT NULL,
  `cust_contact` varchar(45) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `cust_pic` varchar(225) NOT NULL,
  `bday` date NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `house_status` varchar(45) NOT NULL,
  `years` varchar(45) NOT NULL,
  `rent` varchar(45) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_no` varchar(45) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_year` varchar(25) NOT NULL,
  `occupation` varchar(45) NOT NULL,
  `salary` varchar(45) NOT NULL,
  `spouse` varchar(45) NOT NULL,
  `spouse_no` varchar(45) NOT NULL,
  `spouse_emp` varchar(45) NOT NULL,
  `spouse_details` varchar(100) NOT NULL,
  `spouse_income` decimal(10,2) NOT NULL,
  `comaker` varchar(45) NOT NULL,
  `comaker_details` varchar(45) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `credit_status` varchar(10) NOT NULL,
  `ci_remarks` varchar(1000) NOT NULL,
  `ci_name` varchar(45) NOT NULL,
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
(2, 'Dennise', 'customer 1 ln', 'customer 1 address', '0909 820 2040', '0.00', 'd1.1.jpg', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, 'Approved', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(3, 'creditor1 fn', 'creditor1 ln', 'creditor1 address', '0909 820 2040', '130.80', 'default.gif', '1990-03-17', 'rex', 'owned', '', '', 'creditor1 business', '0909 820 2040', 'creditor1 business address ', '2018', 'Full Stack Developer', '12, 000', '', '', '', '', '0.00', '', '', 1, 'Approved', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(4, 'creditor2 fn', ' creditor2 ln', 'creditor2 pha', '0909 820 2040', '0.00', 'default.gif', '1990-04-25', 'Loren', 'rent', '5', 'creditor2 landlord name if renting', 'creditor2 employer', '0909 111 1111', 'creditor2 business address', '4', 'IT Staff', '10, 000', 'Rex Pogi', '0909 820 2040', 'Full Stack Developer', 'Self Business Address', '12.00', 'creditor2 co-maker', 'creditor2 co-maker address', 1, 'pending', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(8, 'asd fn', 'asd n', 'asd address', '09090 820 2040', '0.00', 'default.gif', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, '', '', '', '0000-00-00', 0, 0, 0, 0, 0);

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
(13, 7, 'added new product isda name.', '2018-08-06 06:07:50'),
(14, 7, 'update isda name product record', '2018-08-06 06:08:10'),
(15, 7, 'update isda name product record', '2018-08-06 06:08:29'),
(16, 7, 'added new buyer asd .', '2018-08-06 08:07:02'),
(17, 7, 'added new buyer ln .', '2018-08-06 08:14:10'),
(18, 7, 'has logged in the system at ', '2018-08-06 23:27:10'),
(19, 7, 'has logged in the system at ', '2018-08-06 23:27:20'),
(20, 7, 'added new buyer asd n .', '2018-08-06 23:49:10');

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
  `status` varchar(25) NOT NULL,
  `rebate` decimal(10,2) NOT NULL,
  `or_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `cust_id`, `sales_id`, `payment`, `payment_date`, `user_id`, `branch_id`, `payment_for`, `due`, `interest`, `remaining`, `status`, `rebate`, `or_no`) VALUES
(1, 2, 1, '2.00', '2018-08-02 20:15:35', 7, 1, '2018-08-02', '2.00', '0.00', '0.00', 'paid', '0.00', 1901),
(2, 4, 2, '10.00', '2018-08-02 23:23:54', 6, 1, '2018-08-02', '10.00', '0.00', '0.00', 'paid', '0.00', 1902),
(3, 4, 3, '2.00', '2018-08-02 23:36:10', 6, 1, '2018-08-02', '2.00', '0.00', '0.00', 'paid', '0.00', 1903),
(4, 3, 4, '1.65', '2018-08-03 15:01:44', 7, 1, '2018-09-02', '1.65', '0.00', '0.00', 'paid', '0.00', 0),
(5, 3, 4, '0.41', '2018-08-02 00:00:00', 6, 1, '2018-08-02', '0.41', '0.00', '0.00', 'paid', '0.00', 3151),
(6, 3, 5, '70.00', '2018-08-03 21:36:25', 7, 1, '2018-09-03', '370.80', '0.00', '130.80', 'partially paid', '0.00', 0),
(7, 3, 5, '92.70', '2018-08-03 00:00:00', 7, 1, '2018-08-03', '92.70', '0.00', '0.00', 'paid', '0.00', 3152),
(8, 4, 9, '98.00', '2018-08-07 06:12:53', 7, 1, '2018-08-07', '98.00', '0.00', '0.00', 'paid', '0.00', 1904),
(9, 4, 11, '20.00', '2018-08-07 06:17:49', 7, 1, '2018-08-07', '20.00', '0.00', '0.00', 'paid', '0.00', 1905),
(10, 8, 12, '20.00', '2018-08-07 06:22:09', 7, 1, '2018-08-07', '20.00', '0.00', '0.00', 'paid', '0.00', 1906);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_desc` varchar(225) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_pic` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `reorder` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `serial` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `prod_pic`, `cat_id`, `prod_qty`, `branch_id`, `reorder`, `supplier_id`, `serial`) VALUES
(1, 'kamote', 'kamote desc', '2.00', 'd1.1.jpg', 1, 12, 1, 20, 8, 'kamote code'),
(2, 'kamatis', 'kamatis desc', '10.00', 'd1.1.jpg', 1, 8, 1, 20, 9, 'kamatis code'),
(6, 'isda name', 'isdadesc', '20.00', 'd1.jpg', 8, 8, 1, 20, 5, 'isda code');

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
  `purchase_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_request`
--

INSERT INTO `purchase_request` (`pr_id`, `prod_id`, `qty`, `request_date`, `branch_id`, `purchase_status`) VALUES
(1, 1, 100, '2018-08-02', 1, 'pending'),
(2, 1, 2, '2018-08-02', 1, 'pending'),
(3, 2, 1, '2018-08-03', 1, 'pending');

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
  `modeofpayment` varchar(25) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `cust_id`, `user_id`, `cash_tendered`, `discount`, `amount_due`, `cash_change`, `date_added`, `modeofpayment`, `branch_id`, `total`) VALUES
(1, 2, 7, '10.00', '0.00', '2.00', '0.00', '2018-08-02 20:15:35', 'cash', 1, '2.00'),
(2, 4, 6, '15.00', '0.00', '10.00', '0.00', '2018-08-02 23:23:54', 'cash', 1, '10.00'),
(3, 4, 6, '0.00', '0.00', '2.00', '0.00', '2018-08-02 23:36:10', 'cash', 1, '2.00'),
(4, 3, 6, NULL, NULL, '0.00', NULL, '2018-08-02 23:37:22', 'credit', 1, '2.00'),
(5, 3, 7, NULL, NULL, '0.00', NULL, '2018-08-03 15:18:28', 'credit', 1, '450.00'),
(9, 4, 7, '0.00', '0.00', '98.00', '0.00', '2018-08-07 06:12:53', 'cash', 1, '98.00'),
(11, 4, 7, '0.00', '0.00', '20.00', '0.00', '2018-08-07 06:17:49', 'cash', 1, '20.00'),
(12, 8, 7, '100.00', '1.00', '20.00', '79.00', '2018-08-07 06:22:09', 'cash', 1, '20.00');

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
(9, 12, 6, '20.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `stockin_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`stockin_id`, `prod_id`, `qty`, `date`, `branch_id`) VALUES
(1, 1, 19, '2018-08-02 18:37:31', 1),
(2, 1, 10, '2018-08-02 18:44:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_contact` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`) VALUES
(1, 'LG Philippines', 'Makati City, Philippines', '423-4444'),
(2, 'Union Home Appliances', 'Marikina City, Philippines', '98878'),
(3, 'Hanabishi', 'Quezon City, Philippines', '034-666-087611'),
(4, 'Samsung Philippines', 'Ortigas City, Philippines', '42424'),
(5, 'Avon', 'Montalban Rizal, Philippines', '15562'),
(6, 'Bench', 'Manila City, Philippines', '09134567890'),
(7, 'ACE Hardware', 'Fairview, Quezon City, Philippines', '0909 111 2222'),
(8, 'Balintawak Market', 'Balintawak', '0909 999 1111'),
(9, 'asdupdate', 'asdupdate address', '0909 111 456');

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

--
-- Dumping data for table `temp_trans`
--

INSERT INTO `temp_trans` (`temp_trans_id`, `prod_id`, `price`, `qty`, `branch_id`) VALUES
(8, 1, '2.00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payable_for` varchar(11) NOT NULL,
  `term` varchar(11) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `payment_start` date NOT NULL,
  `down` decimal(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `sales_id`, `payable_for`, `term`, `due`, `payment_start`, `down`, `due_date`, `interest`, `status`) VALUES
(1, 4, '1', 'monthly', '1.65', '2018-08-02', '0.41', '2018-09-02', '0.06', 'paid'),
(2, 5, '1', 'monthly', '370.80', '2018-08-03', '92.70', '2018-09-03', '13.50', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` varchar(10) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `status`, `branch_id`) VALUES
(6, 'x', 'a1Bz20ydqelm8m1wql9dd4e461268c8034f5c8564e155', 'x', 'active', 1),
(7, 'edsa', 'edsa', 'edsa', 'active', 1),
(8, 'fvw', 'fvw', 'fvw', 'active', 2),
(9, 'tm', 'tm', 'tm', 'active', 4),
(10, 'nova', 'nova', 'nova', 'active', 3);

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
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `fk_customer_branch_idx` (`branch_id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_history_log_user1_idx` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_payment_customer1_idx` (`cust_id`),
  ADD KEY `fk_payment_sales1_idx` (`sales_id`),
  ADD KEY `fk_payment_user1_idx` (`user_id`),
  ADD KEY `fk_payment_branch1_idx` (`branch_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `fk_product_category1_idx` (`cat_id`),
  ADD KEY `fk_product_branch1_idx` (`branch_id`),
  ADD KEY `fk_product_supplier1_idx` (`supplier_id`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `fk_purchase_request_product1_idx` (`prod_id`),
  ADD KEY `fk_purchase_request_branch1_idx` (`branch_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `fk_sales_customer1_idx` (`cust_id`),
  ADD KEY `fk_sales_user1_idx` (`user_id`),
  ADD KEY `fk_sales_branch1_idx` (`branch_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_details_id`),
  ADD KEY `fk_sales_details_sales1_idx` (`sales_id`),
  ADD KEY `fk_sales_details_product1_idx` (`prod_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`stockin_id`),
  ADD KEY `fk_stockin_product1_idx` (`prod_id`),
  ADD KEY `fk_stockin_branch1_idx` (`branch_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`),
  ADD KEY `fk_temp_trans_product1_idx` (`prod_id`),
  ADD KEY `fk_temp_trans_branch1_idx` (`branch_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `fk_term_sales1_idx` (`sales_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_branch1_idx` (`branch_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_branch` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history_log`
--
ALTER TABLE `history_log`
  ADD CONSTRAINT `fk_history_log_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_customer1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_supplier1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD CONSTRAINT `fk_purchase_request_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_purchase_request_product1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_customer1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `fk_sales_details_product1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_details_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stockin`
--
ALTER TABLE `stockin`
  ADD CONSTRAINT `fk_stockin_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stockin_product1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD CONSTRAINT `fk_temp_trans_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_temp_trans_product1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `fk_term_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
