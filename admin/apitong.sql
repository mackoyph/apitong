-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2016 at 05:14 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apitong`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `ACCESS_NO` int(11) NOT NULL,
  `ACCESS_FIRSTNAME` varchar(255) NOT NULL,
  `ACCESS_LASTNAME` varchar(255) NOT NULL,
  `ACCESS_USERNAME` varchar(255) NOT NULL,
  `ACCESS_PASSWORD` varchar(255) NOT NULL,
  `ACCESS_EMAIL` varchar(255) NOT NULL,
  `ACCESS_PHOTO` varchar(255) NOT NULL,
  `ACCESS_CONTACT` varchar(255) NOT NULL,
  `ACCESS_ADDRESS` varchar(255) NOT NULL,
  `ACCESS_STATUS` int(11) NOT NULL,
  `DATE_REGISTERED` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_LOGIN` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`ACCESS_NO`, `ACCESS_FIRSTNAME`, `ACCESS_LASTNAME`, `ACCESS_USERNAME`, `ACCESS_PASSWORD`, `ACCESS_EMAIL`, `ACCESS_PHOTO`, `ACCESS_CONTACT`, `ACCESS_ADDRESS`, `ACCESS_STATUS`, `DATE_REGISTERED`, `LAST_LOGIN`) VALUES
(1, 'Test', 'Test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 'n/a', 'test', 'test', 0, '2016-10-06 21:36:48', '2016-10-06 23:03:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`ACCESS_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `ACCESS_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
