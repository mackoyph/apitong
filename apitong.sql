-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 02:09 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apitong`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_access`
--

CREATE TABLE IF NOT EXISTS `admin_access` (
  `ACCESS_NO` int(11) NOT NULL AUTO_INCREMENT,
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
  `LAST_LOGIN` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACCESS_NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_access`
--

INSERT INTO `admin_access` (`ACCESS_NO`, `ACCESS_FIRSTNAME`, `ACCESS_LASTNAME`, `ACCESS_USERNAME`, `ACCESS_PASSWORD`, `ACCESS_EMAIL`, `ACCESS_PHOTO`, `ACCESS_CONTACT`, `ACCESS_ADDRESS`, `ACCESS_STATUS`, `DATE_REGISTERED`, `LAST_LOGIN`) VALUES
(1, 'Admin', 'Admin', 'admin', '1f10e0eeec7a2950849a2a1d8fa9ecbd', 'admin@admin.com', 'img/profile/586a39a5f1c7ariley123.jpg', '099999999', '127.0.0.1', 1, '2017-01-02 19:29:41', '2017-01-02 19:44:30'),
(3, 'Apitong', 'Apitong', 'apitong', '1f10e0eeec7a2950849a2a1d8fa9ecbd', 'newadmin@gmail.com', 'img/profile/586a3ef445b7echix number 2.jpg', '0999999', '127.0.0.1', 1, '2017-01-02 19:52:20', '2017-01-02 19:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `content_id` int(11) NOT NULL AUTO_INCREMENT,
  `content_desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `lasted_edited_by` int(11) NOT NULL,
  `lasted_edited_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`content_id`, `content_desc`, `content`, `lasted_edited_by`, `lasted_edited_date`, `status`) VALUES
(1, 'header - main name', 'A P I T O N G  V I L L A G E S', 1, '2017-01-02 20:19:01', 1),
(2, 'header - tagline', 'Experience the charm of urban living here at Apitong Court Residence', 1, '2016-12-17 10:20:13', 1),
(3, 'footer - contactnumber', '+234 23 9873237', 1, '2016-12-17 12:07:58', 1),
(4, 'footer - twitter', 'http://www.twitter.com/apitong', 1, '2016-12-17 10:23:13', 1),
(5, 'footer - facebook', 'http://www.facebook.com/apitong', 1, '2016-12-17 10:23:16', 1),
(7, 'footer - note', 'has created an immense selection of affordable yet quality houses within a masterplanned community where everything that you need is close to your home.', 1, '2016-12-17 10:23:57', 1),
(8, 'footer - contantemail', 'some.email@somewhere.com', 1, '2016-12-17 12:07:58', 1),
(9, 'footer - contactaddress', '234 Hidden Pond Road, Ashland City, TN 37015', 1, '2016-12-17 12:07:59', 1),
(10, 'home - security', 'Apitong guarantees its homeowners'' safety with exquisitely designed guarded entrance gates equipped with CCTV, as well as high perimeter fences, and round-the-clock roving security guards. These security features allow families to feel safe in their own homes – as should always be the case – and enjoy worry-free lives every single day, making their homes and community safe havens and comfortable escapes from the stresses and fears of city living.', 1, '2016-12-17 12:38:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
  `ACCESS_NO` int(11) NOT NULL AUTO_INCREMENT,
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
  `LAST_LOGIN` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ACCESS_NO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`ACCESS_NO`, `ACCESS_FIRSTNAME`, `ACCESS_LASTNAME`, `ACCESS_USERNAME`, `ACCESS_PASSWORD`, `ACCESS_EMAIL`, `ACCESS_PHOTO`, `ACCESS_CONTACT`, `ACCESS_ADDRESS`, `ACCESS_STATUS`, `DATE_REGISTERED`, `LAST_LOGIN`) VALUES
(1, 'Test', 'Test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 'n/a', 'test', 'test', 1, '2016-10-06 21:36:48', '2017-01-02 19:54:44'),
(2, 'Tester', 'Tester', 'test2', '1f10e0eeec7a2950849a2a1d8fa9ecbd', 'testtest@gmail.com', 'img/profile/586a37862fefe12166026_1097660480252157_1099898397_n.jpg', '919191919', 'Test Address', 0, '2017-01-02 19:20:38', '2017-01-02 19:20:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
