-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2023 at 04:52 PM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fxpromin_crestdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `track_prefix` varchar(255) NOT NULL,
  `track_num` varchar(255) NOT NULL,
  `invoice_terms` text NOT NULL,
  `allow_print` enum('Yes','No','','') NOT NULL,
  `show_map` enum('Yes','No','','') NOT NULL,
  `email_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `mail_track_update` enum('Yes','No','','') NOT NULL,
  `mail_track_save` enum('Yes','No','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `site_title`, `site_url`, `track_prefix`, `track_num`, `invoice_terms`, `allow_print`, `show_map`, `email_name`, `email_address`, `mail_track_update`, `mail_track_save`) VALUES
(1, 'Crest Courier', 'Logistics', 'https://www.crestcourier.com', 'CC', '6', 'terms', 'Yes', 'Yes', 'Crest', 'info@crestcourier.com', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_contact` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dispatch_location` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_contact` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `dispatch_date` varchar(255) NOT NULL,
  `delivery_date` varchar(255) NOT NULL,
  `pdesc` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `current_location` varchar(255) DEFAULT NULL,
  `carrier` varchar(255) NOT NULL,
  `carrier_ref` varchar(255) NOT NULL,
  `ship_mode` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `delivery_time` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `tracking_number`, `sender_name`, `sender_contact`, `sender_email`, `sender_address`, `status`, `dispatch_location`, `receiver_email`, `receiver_name`, `receiver_contact`, `receiver_address`, `dispatch_date`, `delivery_date`, `pdesc`, `destination`, `current_location`, `carrier`, `carrier_ref`, `ship_mode`, `weight`, `quantity`, `payment_mode`, `image`, `delivery_time`, `date`) VALUES
(5, 'CC-04-193685', 'John Mark', '1234124124', 'john@mail.com', 'wishville', 'On hold', 'China', 'brytedree@gmail.com', 'Diana Rock', '333333134123', 'VTC', '2023-04-05', '2023-04-15', 'A black big bag', 'US', '47 W 13th St, New York, NY 10011, USA', 'DHL', '1234234', 'Air', '33', '4', 'cash', 'CC-04-193685.png', '08:33', '2023-04-08 21:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `track_update`
--

CREATE TABLE `track_update` (
  `id` int(11) NOT NULL,
  `track_num` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `current_location` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track_update`
--

INSERT INTO `track_update` (`id`, `track_num`, `status`, `date`, `time`, `note`, `current_location`, `updated_at`) VALUES
(1, 'CC-04-193685', 'Active', '22:33', '10:35', 'Its going', 'New York', '2023-04-08 22:31:32'),
(2, 'CC-04-193685', 'Inactive', '2023-04-13', '10:35', 'Its going ooooooo', 'New York', '2023-04-08 22:32:36'),
(3, 'CC-04-193685', 'Delivered', '2023-04-28', '22:53', 'In lag', 'Lagos', '2023-04-08 22:52:06'),
(4, 'CC-04-193685', 'Picked Up', '2023-04-04', '01:27', 'Its in mali', 'Mali', '2023-04-09 00:27:39'),
(5, 'CC-04-193685', 'On hold', '2022-12-31', '12:34', 'Being Held by the FBI', '47 W 13th St, New York, NY 10011, USA', '2023-04-15 19:37:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_update`
--
ALTER TABLE `track_update`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `track_update`
--
ALTER TABLE `track_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
