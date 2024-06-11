-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2022 at 11:33 AM
-- Server version: 8.0.17
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
-- Database: `onlinejewlleryshop1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card`
--

CREATE TABLE `tbl_card` (
  `card_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `card_name` varchar(20) NOT NULL,
  `exp_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_card`
--

INSERT INTO `tbl_card` (`card_id`, `cust_id`, `card_no`, `card_name`, `exp_date`) VALUES
(11, 3, '1234567890123456', 'hggh', '2025-04'),
(10, 3, '1234567890123456', 'hjfg', '2023-04'),
(9, 3, '1234567890123456', 'hgd', '2025-02'),
(8, 4, '3456789098768567', 'sbi', '2025-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartchild`
--

CREATE TABLE `tbl_cartchild` (
  `cart_child_id` int(11) NOT NULL,
  `cart_master_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` decimal(20,0) NOT NULL,
  `date` varchar(110) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `gram` decimal(10,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cartchild`
--

INSERT INTO `tbl_cartchild` (`cart_child_id`, `cart_master_id`, `item_id`, `qty`, `date`, `total_price`, `gram`) VALUES
(3, 2, 1, '1', '2022-11-04', '500.00', '1'),
(4, 3, 1, '11', '2022-11-04', '250500.00', '6'),
(5, 3, 3, '2', '2022-11-09', '29994.00', '3'),
(6, 4, 5, '4', '2022-11-09', '79984.00', '4'),
(7, 5, 5, '12', '2022-11-09', '239952.00', '4'),
(8, 6, 6, '13', '2022-11-09', '259948.00', '4'),
(9, 7, 6, '13', '2022-11-09', '259948.00', '4'),
(10, 8, 4, '400', '2022-11-09', '999999.99', '5'),
(11, 9, 4, '400', '2022-11-09', '999999.99', '5'),
(21, 11, 15, '60', '2022-11-14', '999999.99', '6'),
(20, 12, 15, '5', '2022-11-14', '149700.00', '6'),
(22, 12, 16, '10', '2022-11-14', '349300.00', '7'),
(17, 10, 14, '60', '2022-11-11', '999999.99', '550'),
(23, 13, 15, '10', '2022-11-14', '299400.00', '6'),
(24, 13, 16, '70', '2022-11-14', '999999.99', '7'),
(25, 14, 16, '80', '2022-11-14', '999999.99', '14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartmaster`
--

CREATE TABLE `tbl_cartmaster` (
  `cart_master_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cartmaster`
--

INSERT INTO `tbl_cartmaster` (`cart_master_id`, `cust_id`, `total_amount`, `status`) VALUES
(2, 1, '500.00', 'Payed'),
(3, 1, '64987.00', 'paid'),
(4, 2, '19996.00', 'paid'),
(5, 1, '59988.00', 'paid'),
(6, 2, '64987.00', 'paid'),
(7, 1, '64987.00', 'paid'),
(8, 2, '1996000.00', 'pending'),
(9, 1, '1999600.00', 'paid'),
(10, 4, '299400.00', 'paid'),
(11, 3, '299400.00', 'paid'),
(12, 4, '74850.00', 'pending'),
(13, 3, '399200.00', 'paid'),
(14, 3, '399200.00', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL,
  `cat_description` varchar(60) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_description`, `status`) VALUES
(1, 'Rings', 'Rings in various design\r\n', 'Active'),
(2, 'Bangles', 'Bangles in various design', 'Active'),
(3, 'Earring', 'Earrings in various designs', 'Active'),
(5, 'Chain', 'Chains in various design\r\n', 'Active'),
(6, 'Bracelet', 'Bracelets in various designs', 'Active'),
(7, 'Necklace', 'Necklace in various designs', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `cust_fname` varchar(10) NOT NULL,
  `cust_lname` varchar(10) NOT NULL,
  `cust_house` varchar(20) NOT NULL,
  `cust_city` varchar(15) NOT NULL,
  `cust_district` varchar(15) NOT NULL,
  `cust_pincode` int(6) NOT NULL,
  `cust_phone` decimal(10,0) NOT NULL,
  `cust_gender` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `username`, `cust_fname`, `cust_lname`, `cust_house`, `cust_city`, `cust_district`, `cust_pincode`, `cust_phone`, `cust_gender`, `dob`, `status`) VALUES
(1, 'cust@gmail.com', 'cust', 'hjshds', 'cusgsajdh', 'kaloor1', 'ekm1', 682035, '1234567890', 'female', '2022-11-13', 'Active'),
(2, 'hai@gmail.com', 'haii', 'hi', 'hgfhdgf', 'fsdh', 'hjfgeh', 123456, '8590956982', 'male', '2001-11-11', 'Active'),
(3, 'sooryasubhash@gmail.com', 'Soorya', 'Subhash', 'Kochumannel\r\nAzheeka', 'Kayamkulam', 'Alappuzha', 690503, '9207625374', 'female', '2001-09-03', 'InActive'),
(4, 'anakharavee@gmail.com', 'Anakha', 'Raveendran', 'Puthupally', 'Kayamkulam', 'Alappuzha', 690502, '8590822795', 'female', '2001-10-18', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_design`
--

CREATE TABLE `tbl_design` (
  `design_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `design_name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_design`
--

INSERT INTO `tbl_design` (`design_id`, `cat_id`, `design_name`, `description`, `status`) VALUES
(11, 2, 'Kangan', 'Kangan design', 'Active'),
(10, 1, 'Broad rings', 'Broad rings design', 'Active'),
(9, 1, 'Stackable', 'Stackable design', 'Active'),
(7, 1, 'Bands', 'Bands design', 'Active'),
(8, 1, 'Cocktail', 'Cocktail design', 'Active'),
(12, 2, 'Hollow', 'Hollow design', 'Active'),
(13, 2, 'Light weight', 'Light weight design', 'Active'),
(14, 3, 'Studs', 'Studs design', 'Active'),
(15, 3, 'Hoops & Bali', 'Hoops & Bali design', 'Active'),
(16, 3, 'Jhumki', 'Jhumki design', 'Active'),
(17, 5, 'Hand-crafted', 'Hand-crafted design', 'Active'),
(18, 5, 'Machine Made', 'Machine Made design', 'Active'),
(19, 5, 'Fancy', 'Fancy design', 'Active'),
(20, 6, 'Loose', 'Loose design', 'Active'),
(21, 6, 'Charm', 'Charm design', 'Active'),
(22, 7, 'Long', 'Long design', 'Active'),
(23, 7, 'Semi-Long', 'Semi-Long design', 'Active'),
(24, 7, 'Choker', 'Choker', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `item_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `stock` varchar(12) DEFAULT NULL,
  `item_description` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_image` varchar(1000) NOT NULL,
  `item_status` varchar(15) NOT NULL,
  `gram` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`item_id`, `staff_id`, `design_id`, `item_name`, `stock`, `item_description`, `item_image`, `item_status`, `gram`) VALUES
(14, 0, 24, 'Ethnix Gold Choker N', '0', 'Traditional Festive Gift', 'image/image_636d245b33983.jpg', 'Available', '50'),
(13, 0, 1, 'yuhfh', '9', 'kjhkj', 'image/image_636c52054c68b.jpg', 'Available', '7'),
(15, 0, 10, 'Band', '0', 'grhd', 'image/image_636d46560b43e.jpg', 'Available', '6'),
(16, 0, 9, 'Bangles', '-10', 'ghj', 'image/image_636d467913020.jpg', 'Available', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `password`, `user_type`, `status`) VALUES
('admin@gmail.com', 'admin', 'admin', 'Active'),
('anakharavee@gmail.com', 'anakha', 'Customer', 'Active'),
('sooryasubhash@gmail.com', 'soorya03', 'Customer', 'Active'),
('sarath@gmail.com', 'sarath', 'Staff', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `cart_master_id` int(11) NOT NULL,
  `o_date` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `cart_master_id`, `o_date`) VALUES
(1, 1, '2022-11-04'),
(2, 2, '2022-11-04'),
(3, 3, '2022-11-04'),
(4, 4, '2022-11-09'),
(5, 5, '2022-11-09'),
(6, 6, '2022-11-09'),
(7, 7, '2022-11-09'),
(8, 8, '2022-11-09'),
(9, 9, '2022-11-09'),
(10, 10, '2022-11-10'),
(11, 11, '2022-11-11'),
(12, 12, '2022-11-14'),
(13, 13, '2022-11-14'),
(14, 14, '2022-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `payment_amt` decimal(10,2) NOT NULL,
  `payment_date` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `order_id`, `card_id`, `payment_amt`, `payment_date`) VALUES
(1, 2, 1, '500.00', '2022-11-04'),
(2, 3, 2, '64987.00', '2022-11-09'),
(3, 5, 3, '59988.00', '2022-11-09'),
(4, 4, 4, '19996.00', '2022-11-09'),
(5, 7, 5, '64987.00', '2022-11-09'),
(6, 6, 6, '64987.00', '2022-11-09'),
(7, 9, 7, '1999600.00', '2022-11-09'),
(8, 10, 8, '299400.00', '2022-11-11'),
(9, 11, 9, '299400.00', '2022-11-14'),
(10, 13, 10, '399200.00', '2022-11-14'),
(11, 14, 11, '399200.00', '2022-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_child`
--

CREATE TABLE `tbl_purchase_child` (
  `pur_child_id` int(11) NOT NULL,
  `pur_master_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` decimal(6,0) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `gram` decimal(10,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_child`
--

INSERT INTO `tbl_purchase_child` (`pur_child_id`, `pur_master_id`, `item_id`, `quantity`, `cost_price`, `gram`) VALUES
(10, 10, 14, '28', '6994100.00', '150'),
(9, 9, 4, '4', '79984.00', '4'),
(8, 8, 1, '4', '79984.00', '4'),
(7, 8, 11, '4', '79984.00', '4'),
(6, 7, 2, '4', '79984.00', '4'),
(11, 11, 14, '9', '2245500.00', '50'),
(12, 12, 14, '50', '12497500.00', '50'),
(13, 13, 14, '70', '17465000.00', '50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_master`
--

CREATE TABLE `tbl_purchase_master` (
  `pur_master_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `tot_amount` decimal(12,0) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_master`
--

INSERT INTO `tbl_purchase_master` (`pur_master_id`, `staff_id`, `vendor_id`, `date`, `tot_amount`, `status`) VALUES
(12, 0, 1, '2022-11-13', '12497500', 'paid'),
(11, 0, 1, '2022-11-11', '2245500', 'paid'),
(10, 0, 1, '2022-11-11', '6994100', 'paid'),
(9, 0, 1, '2022-11-10', '79984', 'paid'),
(8, 0, 2, '2022-11-10', '159968', 'paid'),
(7, 0, 0, '2022-11-09', '79984', 'pending'),
(13, 0, 2, '2022-11-14', '17465000', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rate`
--

CREATE TABLE `tbl_rate` (
  `rate_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rate`
--

INSERT INTO `tbl_rate` (`rate_id`, `staff_id`, `price`, `date`) VALUES
(20, 0, '4990', '2022-11-14'),
(19, 0, '5000', '2022-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `staff_fname` varchar(10) NOT NULL,
  `staff_lname` varchar(10) NOT NULL,
  `staff_hname` varchar(20) NOT NULL,
  `staff_city` varchar(15) NOT NULL,
  `staff_dist` varchar(15) NOT NULL,
  `staff_pin` int(6) NOT NULL,
  `staff_phone` decimal(10,0) NOT NULL,
  `staff_gender` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `datejoin` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `username`, `staff_fname`, `staff_lname`, `staff_hname`, `staff_city`, `staff_dist`, `staff_pin`, `staff_phone`, `staff_gender`, `date`, `datejoin`, `status`) VALUES
(2, 'sarath@gmail.com', 'Sarath', 'S', 'JKKSJD', 'Kochi', 'Ernakulam', 690503, '9087654321', 'male', '2001-09-12', '2020-10-12', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(20) NOT NULL,
  `vendor_email` varchar(30) NOT NULL,
  `vendor_city` varchar(30) NOT NULL,
  `vendor_dist` varchar(20) NOT NULL,
  `vendor_pin` int(6) NOT NULL,
  `vendor_phone` decimal(10,0) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_id`, `vendor_name`, `vendor_email`, `vendor_city`, `vendor_dist`, `vendor_pin`, `vendor_phone`, `status`) VALUES
(1, 'vendor', 'vendor@gmail.com', 'kaloor', 'Ernakulam', 123456, '1234560987', 'Active'),
(2, 'vendor1', 'vendor1@gmail.com', 'kaloor', 'Ernakulam', 682031, '1234567890', 'Active'),
(3, 'Salman', 'salman@gmail.com', 'Kochi', 'Ernakulam', 123456, '9207625374', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_card`
--
ALTER TABLE `tbl_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `tbl_cartchild`
--
ALTER TABLE `tbl_cartchild`
  ADD PRIMARY KEY (`cart_child_id`);

--
-- Indexes for table `tbl_cartmaster`
--
ALTER TABLE `tbl_cartmaster`
  ADD PRIMARY KEY (`cart_master_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_design`
--
ALTER TABLE `tbl_design`
  ADD PRIMARY KEY (`design_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_purchase_child`
--
ALTER TABLE `tbl_purchase_child`
  ADD PRIMARY KEY (`pur_child_id`);

--
-- Indexes for table `tbl_purchase_master`
--
ALTER TABLE `tbl_purchase_master`
  ADD PRIMARY KEY (`pur_master_id`);

--
-- Indexes for table `tbl_rate`
--
ALTER TABLE `tbl_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_card`
--
ALTER TABLE `tbl_card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_cartchild`
--
ALTER TABLE `tbl_cartchild`
  MODIFY `cart_child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_cartmaster`
--
ALTER TABLE `tbl_cartmaster`
  MODIFY `cart_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_design`
--
ALTER TABLE `tbl_design`
  MODIFY `design_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_purchase_child`
--
ALTER TABLE `tbl_purchase_child`
  MODIFY `pur_child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_purchase_master`
--
ALTER TABLE `tbl_purchase_master`
  MODIFY `pur_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_rate`
--
ALTER TABLE `tbl_rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
