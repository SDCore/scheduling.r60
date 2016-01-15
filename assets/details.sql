-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2016 at 03:13 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `details`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tickets`
--

CREATE TABLE IF NOT EXISTS `detail_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locked` int(11) NOT NULL DEFAULT '0',
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
  `ticket_creator` text NOT NULL,
  `engine` varchar(2) NOT NULL DEFAULT '0',
  `wax` varchar(2) NOT NULL DEFAULT '0',
  `mat` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `detail_tickets`
--

INSERT INTO `detail_tickets` (`id`, `locked`, `first_name`, `last_name`, `phone_number`, `date`, `vehicle_make`, `vehicle_model`, `vehicle_color`, `discount`, `services`, `pre_paid_done`, `user_id`, `ticket_id`, `notes`, `ticket_creator`, `engine`, `wax`, `mat`) VALUES
(4, 1, 'Michael', 'Voell', '608-302-9226', '2015-10-25', 'Dodge', 'Durango', 'Blue', 19, '3', 'Paid/Completed', '1', '308684574.38732', 'Commission: Jeff Voell', 'Person', '0', '0', '0'),
(5, 1, 'Jeff', 'Voell', '6088441263', '2015-10-25', 'Hummer ', 'H2', 'Champagine', 0, '7', 'Paid/Completed', '1', '131002580.1566', '', 'Person', '0', '0', '0'),
(8, 1, 'CJ', '', '6087181873', '2015-11-07', 'kia', 'sportage', 'green', 0, '6', 'Paid/Completed', '1', '47526268.589997', '', 'jeff', '0', '0', '0'),
(10, 1, 'Paul', '', '8477028240', '2015-11-14', 'Lexus', 'rx350', 'champange', 0, '7', 'Paid/Completed', '1', '238796262.33603', 'wipe down trim, appt 930 am', 'Jeff', '0', '0', '0'),
(12, 1, 'Michael', '', '847-791-2075', '2015-11-14', 'Nissan', 'Sentra', 'Grey', -1, '1', 'Paid/Completed', '1', '57591808.973886', 'Add basic car wash $1.00', 'Jeff', '0', '0', '0'),
(13, 1, 'Randy', '', '319-290-0856', '2015-11-14', 'Ford', 'flex', 'blue', 119, '6', 'Paid/Completed', '1', '23214188.82702', '', 'Jeff', '0', '0', '0'),
(14, 1, 'Mike', '', '847-367-6473', '2015-11-15', 'Buick', 'Enclave', 'White', 0, '7', 'Paid/Completed', '1', '191037526.17754', 'call when done', 'Jeff', '0', '0', '0'),
(15, 1, 'Frank', '', '6085560529', '2015-11-28', 'Acura', 'MDX', 'Silver', 15, '7', 'Paid/Completed', '1', '330093988.67737', '', 'Jeff', '0', '0', '0'),
(16, 1, 'Frank', '', '6085560529', '2015-11-28', 'Audi', 'Q7', 'White', 15, '7', 'Paid/Completed', '1', '38041776.14066', '', 'Jeff', '0', '0', '0'),
(17, 1, 'jennifer', 'Waugh', '8474776428', '2015-11-29', 'Honda', 'Pilot', 'Red', 35, '7', 'Paid/Completed', '1', '234369632.66621', '', 'Jeff', '0', '0', '0'),
(18, 1, 'Jennifer', 'Waugh', '8474776428', '2015-11-29', 'Pontiac', 'G6', 'Blue', 35, '7', 'Paid/Completed', '1', '311794124.26014', '', 'Jeff', '0', '0', '0'),
(20, 1, 'Tony', 'Vardin', '8478782921', '2015-12-01', 'toyota', 'salara', 'beige', 29, '3', 'Paid/Completed', '1', '53265546.737557', '', 'Jeff', '0', '0', '0'),
(21, 1, 'Lisa', 'Lorenzi', '8472077424', '2015-12-06', 'Chevy', 'Sonic', 'White', 0, '3', 'Paid/Completed', '1', '287102590.00266', '', 'Jeff', '0', '0', '0'),
(22, 1, 'Lisa', 'Lorenzi', '8472077424', '2015-12-06', 'Chevy', 'Sonic', 'White', 39, '3', 'Paid/Completed', '1', '84538906.275294', '', 'Jeff', '0', '0', '0'),
(23, 1, 'Staci', 'Hetlinger', '8476120369', '2015-12-06', 'Mitsubishi', 'Outlander', 'Grey', 59, '5', 'Paid/Completed', '1', '188073238.83572', 'Take off paint, tar, and minor paint transfer drivers side', 'Jeff', '0', '0', '0'),
(24, 1, 'Glen', 'Mikolajczak', '8475078779', '2015-12-06', 'Jeep', 'Grand cherokee', 'Black', 0, '7', 'Paid/Completed', '1', '58278514.473546', '', 'Jeff', '0', '0', '0'),
(25, 1, 'mariann', '', '8475667444', '2015-12-08', 'Chevy', 'Equanox', 'Black', 35, '7', 'Paid/Completed', '1', '235123250.26633', '', 'Jeff', '0', '0', '0'),
(28, 1, 'Scott', 'Huckis', '8478630272', '2015-12-12', 'Nissan', 'Armada', 'Black', 15, '7', 'Paid/Completed', '1', '149748810.15539', 'Full service', 'Jeff', '0', '0', '0'),
(29, 1, 'Rich', '', '8154058865', '2015-12-15', 'Toyota', 'Camary', 'Black', 39, '3', 'Paid/Completed', '1', '281358022.03024', '', 'Jeff', '0', '0', '0'),
(30, 1, 'Orlando', 'Villalobos', '8478281990', '2015-12-19', 'Infinity', 'FX35', 'White', 0, '7', 'Paid/Completed', '1', '193052750.54932', '', 'Jeff', '0', '0', '0'),
(34, 1, 'Ivann', '', '8477695417', '2015-12-19', 'JMC', 'Sierra', 'White', 15, '7', 'Paid/Completed', '1', '27616.592363', '', 'Jeff', '0', '0', '0'),
(37, 1, 'lavu', '', '5714396300', '2015-12-19', 'Toyota', 'Camary', 'Black', 0, '4', 'Paid/Completed', '1', '2901123132', '', 'Jeff', '0', '0', '0'),
(38, 1, 'Taylor', 'Murray', '8478461847', '2015-12-21', 'Jeep ', 'Wrangler', 'Black', 35, '7', 'Paid/Completed', '1', '2901307906', '', 'Jeff', '0', '0', '0'),
(39, 1, 'Rich', 'lafnitzegger', '8154058865', '2015-12-27', 'Jeep', 'Grand Cherokee', 'Black', 39, '3', 'Paid/Completed', '1', '2902495692', 'Add engine,                      last large discount', 'Jeff', '0', '0', '0'),
(40, 1, 'Cindy', 'Brennan', '8476510564', '2015-12-29', 'Infinty', 'G37', 'Blue', 99, '6', 'Paid/Completed', '1', '2902816870', '', 'Jeff', '0', '0', '0'),
(42, 1, 'espenosa', '', '3314446355', '2016-01-05', 'Honda', 'Pilot', 'Beige', 35, '7', 'Paid/Completed', '1', '2904020468', '', 'Jeff', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `detail_users`
--

CREATE TABLE IF NOT EXISTS `detail_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `avatar` varchar(1024) NOT NULL DEFAULT 'http://placehold.it/300x300',
  `active` int(11) NOT NULL DEFAULT '1',
  `zipcode` varchar(10) NOT NULL DEFAULT '000000',
  `name` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users table for Details.';

--
-- Dumping data for table `detail_users`
--

INSERT INTO `detail_users` (`user_id`, `username`, `password`, `avatar`, `active`, `zipcode`, `name`) VALUES
(1, 'route60admin', '5dcd21b592ec9e121e9b7ee95d093ff2b8e7a72098245605b6fd070e58e0b1517c98111debf19efb6c4bc433e3881363511874df3231218a2da0d7603d1ec45e', 'assets/imgs/BackgroundV2.png', 1, '12783979', 'Route 60'),
(2, 'lakecookadmin', '5dcd21b592ec9e121e9b7ee95d093ff2b8e7a72098245605b6fd070e58e0b1517c98111debf19efb6c4bc433e3881363511874df3231218a2da0d7603d1ec45e', 'http://placehold.it/500x500', 1, '12783991', 'Lake Cook');

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Lock_Em_Up` ON SCHEDULE EVERY 1 DAY STARTS '2015-12-08 22:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Makes tickets that are "Paid/Completed" locked at 10PM nightly.' DO UPDATE detail_tickets SET locked=1 WHERE pre_paid_done = "Paid/Completed"$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
