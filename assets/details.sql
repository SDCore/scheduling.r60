-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2016 at 04:07 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

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

CREATE TABLE `detail_tickets` (
  `id` int(11) NOT NULL,
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
  `mat` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(42, 1, 'espenosa', '', '3314446355', '2016-01-05', 'Honda', 'Pilot', 'Beige', 35, '7', 'Paid/Completed', '1', '2904020468', '', 'Jeff', '0', '0', '0'),
(44, 1, 'Joe', 'Palminteri', '8477105570', '2016-01-16', 'cadillac', 'CTS', 'sILVER', 40, '7', 'Paid/Completed', '1', '2905947172', '', 'Jeff', '0', '0', '0'),
(45, 1, 'GREG', 'lEONARD', '5132767251', '2016-01-16', 'iNFINITY', 'FX35X', 'tAN', 19, '3', 'Paid/Completed', '1', '2905951276', '', 'Jeff', '0', '0', '0'),
(46, 1, 'matt', 'udoni', '8479551929', '2016-01-16', 'audi', 'Q&amp;7', 'grey', 0, '7', 'Paid/Completed', '1', '2905952372', '', 'Jeff', '0', '0', '0'),
(47, 1, 'Matt', 'Udoni', '8479551929', '2016-01-16', 'Audi', 'A6', 'grey', 0, '7', 'Paid/Completed', '1', '2905968374', '', 'Jeff', '0', '0', '0'),
(48, 1, 'Shawn', 'Cosby', '4045934141', '2016-01-17', 'Range rover', 'Sport', 'red', 40, '7', 'Paid/Completed', '1', '2906123260', '', 'Jeff', '0', '0', '0'),
(49, 1, 'Nadeem', 'Ghias', '8474773634', '2016-01-26', 'Toyota', 'FJ crusier', 'Blue', 99, '6', 'Paid/Completed', '1', '2907642394', '', 'Jeff', '0', '0', '0'),
(50, 1, 'Donna', 'DeBusman', '8472933944', '2016-01-26', 'Toyota', 'Rav4', 'Bronze', 99, '6', 'Paid/Completed', '1', '2907674716', '', 'Jeff', '0', '0', '0'),
(51, 1, 'Ai', 'Lockard', '8479700360', '2016-01-31', 'Kia ', 'Soal', 'Silver', 39, '3', 'Paid/Completed', '1', '2908533170', '', 'Jeff', '0', '0', '0'),
(52, 1, 'Rick', 'Loiben', '8477721030', '2016-02-06', 'Chrysler', 'town and country', 'Silver', -21, '1', 'Paid/Completed', '1', '2909564692', 'WASH ONLY EXTERIOR', 'Jeff', '0', '0', '0'),
(53, 1, 'Mel', 'k', '2245183684', '2016-02-06', 'Chevy ', 'Impala', 'Dark grey', 40, '7', 'Paid/Completed', '1', '2909581778', 'Full service', 'Jeff', '0', '0', '0'),
(54, 1, 'Niraj', 'Shah', '2246598411', '2016-02-07', 'Toyota ', 'Camary', 'Black', 0, '1', 'Paid/Completed', '1', '2909737272', '', 'Jeff', '0', '0', '0'),
(55, 1, 'Tom', 'vawgne', '8478378368', '2016-02-13', 'Infinity', 'G5', 'grey', 40, '7', 'Paid/Completed', '1', '2910786736', '', 'Jeff', '0', '0', '0'),
(56, 1, 'Alex', 'Moskvitchev', '8474092125', '2016-02-27', 'Merceeds', 'ML', 'Black', 0, '7', 'Paid/Completed', '1', '2913172722', '', 'Jeff', '0', '0', '0'),
(57, 1, 'shawn', 'Cosby', '4045934141', '2016-02-28', 'lexus', 'GX470', 'Black', 20, '7', 'Paid/Completed', '1', '2913374646', '', 'Jeff', '0', '0', '0'),
(58, 0, 'steve', '', '8473048180', '2016-03-10', 'Jeep', 'grand cherokee', 'black', 24, '3', 'Appointment', '1', '2914398276', '', 'Jeff', '0', '0', '0'),
(59, 0, 'Suk', 'Molga', '8476377797', '2016-03-08', 'Nissan ', 'Pathfinder', 'White', -11, '1', 'Paid/Completed', '1', '2914936604', '', 'Jeff', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `detail_users`
--

CREATE TABLE `detail_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `avatar` varchar(1024) NOT NULL DEFAULT 'http://placehold.it/300x300',
  `active` int(11) NOT NULL DEFAULT '1',
  `zipcode` varchar(10) NOT NULL DEFAULT '000000',
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users table for Details.';

--
-- Dumping data for table `detail_users`
--

INSERT INTO `detail_users` (`user_id`, `username`, `password`, `avatar`, `active`, `zipcode`, `name`) VALUES
(1, 'route60admin', '5dcd21b592ec9e121e9b7ee95d093ff2b8e7a72098245605b6fd070e58e0b1517c98111debf19efb6c4bc433e3881363511874df3231218a2da0d7603d1ec45e', 'assets/imgs/BackgroundV2.png', 1, '12783979', 'Route 60'),
(2, 'lakecookadmin', '5dcd21b592ec9e121e9b7ee95d093ff2b8e7a72098245605b6fd070e58e0b1517c98111debf19efb6c4bc433e3881363511874df3231218a2da0d7603d1ec45e', 'http://placehold.it/500x500', 1, '12783991', 'Lake Cook');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Lock_Em_Up` ON SCHEDULE EVERY 1 DAY STARTS '2015-12-08 22:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Makes tickets that are "Paid/Completed" locked at 10PM nightly.' DO UPDATE detail_tickets SET locked=1 WHERE pre_paid_done = "Paid/Completed"$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
