-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2016 at 07:23 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `report_profiles`
--

CREATE TABLE IF NOT EXISTS `report_profiles` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `phone_number` text NOT NULL,
  `storeID` text NOT NULL,
  `picture` text NOT NULL,
  `store` text NOT NULL,
  `average` int(11) NOT NULL,
  `strikes` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `working` int(11) NOT NULL DEFAULT '1' COMMENT 'Whether the person is currently employed or not.'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_profiles`
--

INSERT INTO `report_profiles` (`id`, `first_name`, `last_name`, `phone_number`, `storeID`, `picture`, `store`, `average`, `strikes`, `rating`, `working`) VALUES
(1, 'Michael', 'Voell', '608-302-9226', '98', 'http://placehold.it/500x500', 'Route 60', 0, 0, 0, 1),
(2, 'Jessie', 'Haines', '847-732-1295', '21', 'http://placehold.it/500x500', 'Route 60', 0, 0, 0, 1),
(3, 'Sarah', 'Kolb', '847-361-4778', '115', 'http://placehold.it/500x500', 'Route 60', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_users`
--

CREATE TABLE IF NOT EXISTS `report_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `avatar` varchar(1024) NOT NULL DEFAULT 'http://placehold.it/300x300',
  `active` int(11) NOT NULL DEFAULT '1',
  `name` text NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users table for Reports.';

--
-- Dumping data for table `report_users`
--

INSERT INTO `report_users` (`user_id`, `username`, `password`, `avatar`, `active`, `name`, `zipcode`) VALUES
(1, 'cj', '5dcd21b592ec9e121e9b7ee95d093ff2b8e7a72098245605b6fd070e58e0b1517c98111debf19efb6c4bc433e3881363511874df3231218a2da0d7603d1ec45e', 'assets/imgs/BackgroundV2.png', 1, 'CJ', 12783979);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report_profiles`
--
ALTER TABLE `report_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_users`
--
ALTER TABLE `report_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report_profiles`
--
ALTER TABLE `report_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Lock_Em_Up` ON SCHEDULE EVERY 1 DAY STARTS '2015-12-08 22:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Makes tickets that are "Paid/Completed" locked at 10PM nightly.' DO UPDATE detail_tickets SET locked=1 WHERE pre_paid_done = "Paid/Completed"$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
