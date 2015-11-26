-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2015 at 10:30 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `details`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tickets`
--

CREATE TABLE IF NOT EXISTS `detail_tickets` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `phone_number` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `vehicle_make` text NOT NULL,
  `vehicle_model` text NOT NULL,
  `vehicle_color` text NOT NULL,
  `discount` int(11) NOT NULL,
  `services` varchar(32) NOT NULL,
  `pre_paid_done` varchar(32) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `ticket_id` varchar(32) NOT NULL,
  `notes` text NOT NULL,
  `ticket_creator` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tickets`
--

INSERT INTO `detail_tickets` (`id`, `first_name`, `last_name`, `phone_number`, `date`, `vehicle_make`, `vehicle_model`, `vehicle_color`, `discount`, `services`, `pre_paid_done`, `user_id`, `ticket_id`, `notes`, `ticket_creator`) VALUES
(1, 'John', 'Smith', '555-555-5555', '2015-10-24', 'Dodge', 'Durango', 'Blue', 25, '1', 'Paid', '1', '1', '', 'Jeff V'),
(2, 'Smithgggg', 'Johnffff', '444-444-5555', '2015-10-23', 'Durangopppp', 'Dodgeeeee', 'Reddddd', 10, '6', 'Paid', '1', '2', 'THIS IS A NOTEeeeeee', 'Michael V'),
(3, 'Jawn', 'Smiffinhimer', '122-333-4444', '2015-10-24', 'Dawdge', 'Duranger', 'Blargh', 0, '3', 'Completed', '1', '31526862.860153', 'Blermhim none ', 'Michael V'),
(4, 'Michael', '', '123132123', '2015-11-05', '23123', '1231231', '23123123', 2131, '3', 'Completed', '1', '10636874.303285', 'Notes.', 'Michael V'),
(5, 'Max', 'Caulfield', '555-555-1263', '2015-11-07', 'Dodge', 'Durango', 'Blue', 0, '6', 'Completed', '1', '245289158.5846', 'Note.', 'Michael Voell');

-- --------------------------------------------------------

--
-- Table structure for table `detail_users`
--

CREATE TABLE IF NOT EXISTS `detail_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `avatar` varchar(1024) NOT NULL DEFAULT 'http://placehold.it/300x300',
  `description` varchar(10000) NOT NULL DEFAULT 'I''m a newly registered user on HoloHex!',
  `power_rank` varchar(1024) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `type` varchar(32) NOT NULL DEFAULT 'User',
  `dob` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users table for Details.';

--
-- Dumping data for table `detail_users`
--

INSERT INTO `detail_users` (`user_id`, `username`, `password`, `email`, `avatar`, `description`, `power_rank`, `active`, `type`, `dob`) VALUES
(1, 'route60admin', '5dcd21b592ec9e121e9b7ee95d093ff2b8e7a72098245605b6fd070e58e0b1517c98111debf19efb6c4bc433e3881363511874df3231218a2da0d7603d1ec45e', 'sdcored@gmail.com', 'http://i.imgur.com/GD9pndo.png', 'Route 60', '3', 1, 'Admin', '2015-05-19 20:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tickets`
--
ALTER TABLE `detail_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_users`
--
ALTER TABLE `detail_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tickets`
--
ALTER TABLE `detail_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
