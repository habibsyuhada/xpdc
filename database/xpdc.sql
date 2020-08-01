-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 09:45 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(200) NOT NULL,
  `shipment_date` date NOT NULL,
  `type_of_shipment` varchar(200) DEFAULT NULL,
  `type_of_mode` varchar(200) DEFAULT NULL,
  `incoterms` varchar(200) DEFAULT NULL,
  `description_of_goods` varchar(200) DEFAULT NULL,
  `hs_code` varchar(200) DEFAULT NULL,
  `shipment_value` varchar(200) DEFAULT NULL,
  `currency` varchar(200) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `type_of_packages` varchar(200) DEFAULT NULL,
  `actual_weight` int(11) DEFAULT NULL,
  `vol_weight` int(11) DEFAULT NULL,
  `ref_no` varchar(200) DEFAULT NULL,
  `measurement` varchar(200) DEFAULT NULL,
  `main_agent` varchar(200) DEFAULT NULL,
  `master_awb` varchar(200) DEFAULT NULL,
  `secondary_agent` varchar(200) DEFAULT NULL,
  `house_awb` varchar(200) DEFAULT NULL,
  `pickup_details` text,
  `pickup_datetime` datetime DEFAULT NULL,
  `shipper_name` varchar(200) DEFAULT NULL,
  `shipper_address` text,
  `shipper_city` varchar(200) DEFAULT NULL,
  `shipper_country` varchar(200) DEFAULT NULL,
  `shipper_postcode` varchar(10) DEFAULT NULL,
  `shipper_pic` varchar(200) DEFAULT NULL,
  `shipper_phone_number` varchar(50) DEFAULT NULL,
  `receiver_name` varchar(200) DEFAULT NULL,
  `receiver_address` text,
  `receiver_city` varchar(200) DEFAULT NULL,
  `receiver_country` varchar(200) DEFAULT NULL,
  `receiver_postcode` varchar(10) DEFAULT NULL,
  `receiver_pic` varchar(200) DEFAULT NULL,
  `receiver_phone_number` varchar(50) DEFAULT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Booked',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_delete` int(11) NOT NULL DEFAULT '1' COMMENT '1 = active; 0 = deleted;'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`id`, `tracking_no`, `shipment_date`, `type_of_shipment`, `type_of_mode`, `incoterms`, `description_of_goods`, `hs_code`, `shipment_value`, `currency`, `quantity`, `type_of_packages`, `actual_weight`, `vol_weight`, `ref_no`, `measurement`, `main_agent`, `master_awb`, `secondary_agent`, `house_awb`, `pickup_details`, `pickup_datetime`, `shipper_name`, `shipper_address`, `shipper_city`, `shipper_country`, `shipper_postcode`, `shipper_pic`, `shipper_phone_number`, `receiver_name`, `receiver_address`, `receiver_city`, `receiver_country`, `receiver_postcode`, `receiver_pic`, `receiver_phone_number`, `status`, `created_date`, `status_delete`) VALUES
(1, 'XPDC000001', '2020-08-01', 'Domestic Shipping', 'Land Shipping', '', '10', '20', '30', 'IDR', 40, 'Pallet', 50, 60, '70', '80', '', '90', '', '100', '110', '2020-08-03 23:11:00', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120', '130', '140', 'Booked', '2020-08-01 04:57:01', 1),
(2, 'XPDC000002', '2020-08-01', 'Domestic Shipping', 'Land Shipping', '', '10', '20', '30', 'IDR', 40, 'Pallet', 50, 60, '70', '80', '', '90', '', '100', '110', '2020-08-03 23:11:00', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120', '130', '140', 'Booked', '2020-08-01 04:57:01', 0),
(3, 'XPDC000003', '0000-00-00', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Booked', '2020-08-01 07:22:00', 0),
(4, 'XPDC000004', '0000-00-00', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Booked', '2020-08-01 07:23:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_packages`
--

CREATE TABLE `shipment_packages` (
  `id` int(11) NOT NULL,
  `id_shipment` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `piece_type` varchar(200) DEFAULT NULL,
  `description` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_delete` int(11) NOT NULL DEFAULT '1' COMMENT '1 = active; 0 = deleted;'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment_packages`
--

INSERT INTO `shipment_packages` (`id`, `id_shipment`, `qty`, `piece_type`, `description`, `length`, `width`, `height`, `weight`, `value`, `create_date`, `status_delete`) VALUES
(1, 1, 10, 'Carton', 20, 30, 40, 50, 60, 70, '2020-08-01 04:57:01', 1),
(2, 1, 80, 'Crate', 90, 100, 110, 120, 130, 140, '2020-08-01 04:57:01', 1),
(3, 1, 1, 'Others', 2, 3, 4, 5, 6, 7, '2020-08-01 06:58:13', 0),
(4, 1, 1, 'Pallet', 2, 3, 4, 5, 6, 7, '2020-08-01 07:18:16', 0),
(5, 1, 1, 'Crate', 2, 3, 4, 5, 6, 7, '2020-08-01 07:20:19', 0),
(6, 3, 0, '', 0, 0, 0, 0, 0, 0, '2020-08-01 07:22:00', 1),
(7, 4, 0, '', 0, 0, 0, 0, 0, 0, '2020-08-01 07:23:01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment_packages`
--
ALTER TABLE `shipment_packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipment_packages`
--
ALTER TABLE `shipment_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
