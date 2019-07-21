-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 06:29 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trishul`
--

-- --------------------------------------------------------

--
-- Table structure for table `apikeys`
--

CREATE TABLE `apikeys` (
  `apikey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`) VALUES
(1, 'Customer1'),
(2, 'Customer2'),
(3, 'Customer3'),
(4, 'Customer4');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `total` double NOT NULL,
  `cb_flag` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `order_date`, `total`, `cb_flag`, `customer_id`, `order_status`) VALUES
(1, '2019-07-09', 45678, 1, 1, 0),
(2, '2019-07-02', 1000, 1, 2, 0),
(3, '2019-07-10', 345, 0, 4, 1),
(4, '2019-07-10', 2355, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_product_mapping`
--

CREATE TABLE `order_product_mapping` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product_mapping`
--

INSERT INTO `order_product_mapping` (`order_id`, `product_id`, `qty`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 3, 4),
(4, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `price`, `quantity`, `image`, `team_id`) VALUES
(1, 'Handcrafted necklace', 500, 4, 'upload/necklace.jpg', 1),
(2, 'Beaded Bag', 1230, 10, 'upload/prod11.jpeg', 2),
(3, 'Handcrafted carry bag', 300, 30, 'upload/prod13.jpeg', 2),
(4, 'necklace fancy', 400, 24, 'upload/prod16.jpeg', 3),
(5, 'Wooden doll', 250, 40, 'upload/prod19.jpeg', 1),
(6, 'Ganpati idol', 200, 35, 'upload/prod20.jpeg', 3),
(7, 'Jhola Bag', 300, 30, 'upload/prod12.jpeg', 2),
(8, 'Earrings', 50, 30, 'upload/prod15.jpeg', 1),
(9, 'Woven basket', 780, 4, 'upload/prod18.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `region`) VALUES
(1, 'Woman Bags', 'Nagpur'),
(2, 'Handicraft', 'Haryana'),
(3, 'Women rocks', 'Thane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_product_mapping`
--
ALTER TABLE `order_product_mapping`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
