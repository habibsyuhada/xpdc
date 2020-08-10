-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 10:39 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `tracking_no` varchar(50) NOT NULL,
  `shipper_name` text NOT NULL,
  `shipper_address` text NOT NULL,
  `shipper_city` text NOT NULL,
  `shipper_country` text NOT NULL,
  `shipper_postcode` int(11) NOT NULL,
  `shipper_contact_person` varchar(50) NOT NULL,
  `shipper_phone_number` varchar(50) NOT NULL,
  `shipper_email` text NOT NULL,
  `consignee_name` text NOT NULL,
  `consignee_address` text NOT NULL,
  `consignee_city` text NOT NULL,
  `consignee_country` text NOT NULL,
  `consignee_postcode` int(11) NOT NULL,
  `consignee_contact_person` varchar(50) NOT NULL,
  `consignee_phone_number` varchar(50) NOT NULL,
  `consignee_email` text NOT NULL,
  `type_of_shipment` varchar(50) NOT NULL,
  `type_of_mode` varchar(50) NOT NULL,
  `incoterms` varchar(50) NOT NULL,
  `sea` varchar(50) NOT NULL,
  `description_of_goods` text NOT NULL,
  `hscode` varchar(50) NOT NULL,
  `coo` varchar(50) NOT NULL,
  `declared_value` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `ref_no` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_delete` int(11) NOT NULL COMMENT '1 = active, 0 = delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`id`, `tracking_no`, `shipper_name`, `shipper_address`, `shipper_city`, `shipper_country`, `shipper_postcode`, `shipper_contact_person`, `shipper_phone_number`, `shipper_email`, `consignee_name`, `consignee_address`, `consignee_city`, `consignee_country`, `consignee_postcode`, `consignee_contact_person`, `consignee_phone_number`, `consignee_email`, `type_of_shipment`, `type_of_mode`, `incoterms`, `sea`, `description_of_goods`, `hscode`, `coo`, `declared_value`, `currency`, `ref_no`, `status`, `status_delete`) VALUES
(9, 'XPDC000001', 'Halim', 'Batu Aji', 'Batam', 'Indonesia', 29424, '082918491849', '081362244252', 'halim@halim.com', 'Putra', 'Serpong', 'Tangerang Selatan', 'Indonesia', 29102, '082948192855', '082948195858', 'putra@putra.com', 'International', 'Sea Transport', 'CIF (Cost Insurance Freight)', 'LCL', 'Container Pesawat', 'HS0295', 'Indonesia', '100000', 'IDR', 'REF#202949', 'Booked', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_detail`
--

CREATE TABLE `shipment_detail` (
  `id_detail` int(11) NOT NULL,
  `id_shipment` int(11) NOT NULL,
  `pickup_name` varchar(100) NOT NULL,
  `pickup_address` text NOT NULL,
  `pickup_city` varchar(100) NOT NULL,
  `pickup_country` varchar(100) NOT NULL,
  `pickup_postcode` int(11) NOT NULL,
  `pickup_contact_person` varchar(50) NOT NULL,
  `pickup_phone_number` varchar(50) NOT NULL,
  `pickup_email` varchar(100) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time NOT NULL,
  `pickup_notes` text NOT NULL,
  `billing_account` varchar(50) NOT NULL,
  `billing_name` varchar(100) NOT NULL,
  `billing_address` text NOT NULL,
  `billing_city` varchar(100) NOT NULL,
  `billing_country` varchar(100) NOT NULL,
  `billing_postcode` int(11) NOT NULL,
  `billing_contact_person` varchar(50) NOT NULL,
  `billing_phone_number` varchar(50) NOT NULL,
  `billing_email` varchar(100) NOT NULL,
  `main_agent_mawb_mbl` date NOT NULL,
  `main_agent_carrier` varchar(50) NOT NULL,
  `main_agent_voyage_flight_no` date NOT NULL,
  `secondary_agent_mawb_mbl` date NOT NULL,
  `secondary_agent_carrier` varchar(50) NOT NULL,
  `secondary_agent_voyage_flight_no` date NOT NULL,
  `port_of_loading` varchar(50) NOT NULL,
  `port_of_discharge` varchar(50) NOT NULL,
  `container_no` varchar(50) NOT NULL,
  `seal_no` varchar(50) NOT NULL,
  `cipl_no` varchar(50) NOT NULL,
  `permit_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipment_detail`
--

INSERT INTO `shipment_detail` (`id_detail`, `id_shipment`, `pickup_name`, `pickup_address`, `pickup_city`, `pickup_country`, `pickup_postcode`, `pickup_contact_person`, `pickup_phone_number`, `pickup_email`, `pickup_date`, `pickup_time`, `pickup_notes`, `billing_account`, `billing_name`, `billing_address`, `billing_city`, `billing_country`, `billing_postcode`, `billing_contact_person`, `billing_phone_number`, `billing_email`, `main_agent_mawb_mbl`, `main_agent_carrier`, `main_agent_voyage_flight_no`, `secondary_agent_mawb_mbl`, `secondary_agent_carrier`, `secondary_agent_voyage_flight_no`, `port_of_loading`, `port_of_discharge`, `container_no`, `seal_no`, `cipl_no`, `permit_no`) VALUES
(1, 9, 'Habibs', 'Batam Center', 'Batam', 'Indonesia', 29443, '081928528475', '082948194855', 'habib@habib.com', '2020-08-11', '15:00:00', 'Nothing have to do', 'XPDC295AS', 'Putra', 'Batu Aji', 'Batam', 'Indonesia', 29528, '0829485757281', '085929572858', 'putra@putra.com', '2020-08-11', 'CAR-259', '2020-08-11', '2020-08-11', 'CAR-260', '2020-08-11', 'PSL-020', 'PSD-2020', 'BCL20195912', 'SEAL-20201020', 'CIPL-000021', 'PLST-2050502001');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_history`
--

CREATE TABLE `shipment_history` (
  `id` int(11) NOT NULL,
  `id_shipment` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_delete` int(11) NOT NULL DEFAULT 1 COMMENT '1 = active; 0 = deleted;'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment_history`
--

INSERT INTO `shipment_history` (`id`, `id_shipment`, `date`, `time`, `location`, `status`, `remarks`, `create_date`, `status_delete`) VALUES
(8, 1, '2020-08-10', '14:31:54', 'Indonesia', 'Booked', '', '2020-08-10 07:31:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_old`
--

CREATE TABLE `shipment_old` (
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
  `pickup_details` text DEFAULT NULL,
  `pickup_datetime` datetime DEFAULT NULL,
  `shipper_name` varchar(200) DEFAULT NULL,
  `shipper_address` text DEFAULT NULL,
  `shipper_city` varchar(200) DEFAULT NULL,
  `shipper_country` varchar(200) DEFAULT NULL,
  `shipper_postcode` varchar(10) DEFAULT NULL,
  `shipper_pic` varchar(200) DEFAULT NULL,
  `shipper_phone_number` varchar(50) DEFAULT NULL,
  `receiver_name` varchar(200) DEFAULT NULL,
  `receiver_address` text DEFAULT NULL,
  `receiver_city` varchar(200) DEFAULT NULL,
  `receiver_country` varchar(200) DEFAULT NULL,
  `receiver_postcode` varchar(10) DEFAULT NULL,
  `receiver_pic` varchar(200) DEFAULT NULL,
  `receiver_phone_number` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL COMMENT 'lastest history',
  `time` time DEFAULT NULL COMMENT 'lastest history',
  `location` varchar(200) DEFAULT NULL COMMENT 'lastest history',
  `status` varchar(200) NOT NULL DEFAULT 'Booked',
  `remarks` text DEFAULT NULL COMMENT 'lastest history',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_delete` int(11) NOT NULL DEFAULT 1 COMMENT '1 = active; 0 = deleted;'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment_old`
--

INSERT INTO `shipment_old` (`id`, `tracking_no`, `shipment_date`, `type_of_shipment`, `type_of_mode`, `incoterms`, `description_of_goods`, `hs_code`, `shipment_value`, `currency`, `quantity`, `type_of_packages`, `actual_weight`, `vol_weight`, `ref_no`, `measurement`, `main_agent`, `master_awb`, `secondary_agent`, `house_awb`, `pickup_details`, `pickup_datetime`, `shipper_name`, `shipper_address`, `shipper_city`, `shipper_country`, `shipper_postcode`, `shipper_pic`, `shipper_phone_number`, `receiver_name`, `receiver_address`, `receiver_city`, `receiver_country`, `receiver_postcode`, `receiver_pic`, `receiver_phone_number`, `date`, `time`, `location`, `status`, `remarks`, `created_date`, `status_delete`) VALUES
(1, 'XPDC000001', '2020-08-01', 'Domestic Shipping', 'Land Shipping', '', '10', '20', '30', 'IDR', 40, 'Pallet', 50, 60, '70', '80', '', '90', '', '100', '110', '2020-08-03 23:11:00', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120', '130', '140', '2020-08-01', '12:18:00', 'Batam', 'Booked', '', '2020-08-01 04:57:01', 1),
(2, 'XPDC000002', '2020-08-01', 'Domestic Shipping', 'Land Shipping', '', '10', '20', '30', 'IDR', 40, 'Pallet', 50, 60, '70', '80', '', '90', '', '100', '110', '2020-08-03 23:11:00', '10', '20', '30', '40', '50', '60', '70', '80', '90', '100', '110', '120', '130', '140', NULL, NULL, NULL, '', NULL, '2020-08-01 04:57:01', 0),
(3, 'XPDC000003', '0000-00-00', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, 'Booked', NULL, '2020-08-01 07:22:00', 0),
(4, 'XPDC000004', '0000-00-00', '', '', '', '', '', '', '', 0, '', 0, 0, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, 'Booked', NULL, '2020-08-01 07:23:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_packages`
--

CREATE TABLE `shipment_packages` (
  `id` int(11) NOT NULL,
  `id_shipment` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `piece_type` varchar(200) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_delete` int(11) NOT NULL DEFAULT 1 COMMENT '1 = active; 0 = deleted;'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment_packages`
--

INSERT INTO `shipment_packages` (`id`, `id_shipment`, `qty`, `piece_type`, `length`, `width`, `height`, `weight`, `create_date`, `status_delete`) VALUES
(14, 9, 50, 'Carton', 10, 10, 10, 10, '2020-08-10 07:31:54', 1),
(15, 9, 100, 'Pallet', 20, 20, 20, 20, '2020-08-10 07:31:54', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment_detail`
--
ALTER TABLE `shipment_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `shipment_history`
--
ALTER TABLE `shipment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment_old`
--
ALTER TABLE `shipment_old`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shipment_detail`
--
ALTER TABLE `shipment_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipment_history`
--
ALTER TABLE `shipment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipment_old`
--
ALTER TABLE `shipment_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipment_packages`
--
ALTER TABLE `shipment_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
