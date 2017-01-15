-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2017 at 03:00 PM
-- Server version: 5.6.34
-- PHP Version: 5.6.27

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
-- Table structure for table `admin_access`
--

CREATE TABLE `admin_access` (
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
-- Dumping data for table `admin_access`
--

INSERT INTO `admin_access` (`ACCESS_NO`, `ACCESS_FIRSTNAME`, `ACCESS_LASTNAME`, `ACCESS_USERNAME`, `ACCESS_PASSWORD`, `ACCESS_EMAIL`, `ACCESS_PHOTO`, `ACCESS_CONTACT`, `ACCESS_ADDRESS`, `ACCESS_STATUS`, `DATE_REGISTERED`, `LAST_LOGIN`) VALUES
(1, 'Admin', 'Admin', 'admin', '1f10e0eeec7a2950849a2a1d8fa9ecbd', 'admin@admin.com', 'img/profile/586a39a5f1c7ariley123.jpg', '099999999', 'asdfasdfasdf', 1, '2017-01-02 19:29:41', '2017-01-13 13:41:06'),
(3, 'Apitong', 'Apitong', 'apitong', '1f10e0eeec7a2950849a2a1d8fa9ecbd', 'newadmin@gmail.com', 'img/profile/586a3ef445b7echix number 2.jpg', '0999999', '<b>asdfasdf</b>', 1, '2017-01-02 19:52:20', '2017-01-15 08:23:32'),
(4, 'asdf', 'asdf', 'asdf', '', 'asdf', '', '1234', 'asdf', 0, '2017-01-15 22:35:03', '2017-01-15 22:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `last_edited_by` int(11) NOT NULL,
  `last_edit_date` datetime NOT NULL,
  `gallery` int(11) DEFAULT NULL,
  `title` varchar(250) NOT NULL,
  `text` varchar(5000) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `author_id`, `creation_date`, `last_edited_by`, `last_edit_date`, `gallery`, `title`, `text`, `category`) VALUES
(1, 1, '2017-01-13 00:00:00', 1, '2017-01-15 19:56:35', 0, 'About Us', '<p>Apitong has created a self-sustaining and integrated masterplanned city development called Communicity. Apitong is the residential component of the Communicity. We are not just providing the Filipino family a mere residence but blending the bond of a community and the exciting bustle of the city.</p>\r\n\r\n<p>Why Apitong Village? The land where this village is situated used to be a place where Apitong Trees grow gracefully and fruitfully before it was developed, hence naming the street leading to the village, Apitong Drive. And as we think for a name, someone suggested why not use Apitong? It depicts all the good elements that a tree can have, a strong branch, a useful fruits and leaves, almost all of its parts are advantageous. Just like our village, where everyone is willing to help each other, a village bound by a good relationship, a useful and helpful community, and where everyone will have their minds at a peaceful state.</p>', 2),
(2, 1, '2017-01-13 00:00:00', 1, '2017-01-15 19:56:49', NULL, 'About the location', '<p>The development is located in the Apitong road.</p>', 4),
(3, 1, '2017-01-12 00:00:00', 1, '2017-01-13 00:00:00', NULL, 'History in the 90\'s', 'asdfasdfasdfasdf', 3),
(4, 3, '2017-01-13 00:00:00', 3, '2017-01-13 00:00:00', NULL, 'History of the 80s', 'asdfasdfasdfasdf', 3),
(5, 1, '2017-01-14 21:50:27', 1, '2017-01-14 21:50:27', NULL, 'Single Detached home', '<p>Type your article hereasdfasdfasdf</p>', 4),
(6, 1, '2017-01-15 05:59:45', 1, '2017-01-15 05:59:45', NULL, 'asdfasdfasdfasdf', '<p>Type your article hereasdfasdfasdfasdfasdf</p>', 4),
(7, 1, '2017-01-15 14:01:13', 1, '2017-01-15 14:36:11', NULL, 'asia manila dapat timezone neto', '<p>Type your article heredfasdfasdfas</p>', 4);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `root_category` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `last_edited_by` int(11) NOT NULL,
  `last_edit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id`, `name`, `root_category`, `author_id`, `creation_date`, `last_edited_by`, `last_edit_date`) VALUES
(2, 'About', NULL, 1, '2017-01-13 00:00:00', 1, '2017-01-13 00:00:00'),
(3, 'History', NULL, 1, '2017-01-13 00:00:00', 1, '2017-01-13 00:00:00'),
(4, 'House Types', 2, 1, '2017-01-13 00:00:00', 1, '2017-01-13 00:00:00'),
(5, 'Customized', 2, 1, '2017-01-15 00:00:00', 1, '2017-01-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `content_id` int(11) NOT NULL,
  `content_desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `lasted_edited_by` int(11) NOT NULL,
  `lasted_edited_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`content_id`, `content_desc`, `content`, `lasted_edited_by`, `lasted_edited_date`, `status`) VALUES
(1, 'header-mainname', 'A P I T O N G  V I L L A G E S', 1, '2017-01-15 15:54:52', 1),
(2, 'header-tagline', 'Experience the charm of urban living here at Apitong Court Residence', 1, '2017-01-15 15:54:52', 1),
(3, 'footer-contactnumber', '+234 23 9873237', 1, '2017-01-15 15:54:52', 1),
(4, 'footer-twitter', 'http://www.twitter.com/apitong', 1, '2017-01-15 15:54:52', 1),
(5, 'footer-facebook', 'http://www.facebook.com/apitong', 1, '2017-01-15 15:54:52', 1),
(7, 'footer-note', 'has created an immense selection of affordable yet quality houses within a masterplanned community where everything that you need is close to your home.', 1, '2017-01-15 15:54:52', 1),
(8, 'footer-contactemail', 'some.email@somewhere.com', 1, '2017-01-15 16:14:07', 1),
(9, 'footer-contactaddress', '234 Hidden Pond Road, Ashland City, TN 37015', 1, '2017-01-15 15:54:52', 1),
(10, 'home-security', 'Apitong guarantees its homeowners security and peace of mind.', 1, '2017-01-15 22:10:27', 1),
(11, 'home-design', 'Apitong Village is designed by an excellent and reputable developer, each house is set in a breathtaking tropical modern aesthetic that provides optimal natural ventilation, light, and shade designed by Architect Dan Rainier Calingo. A well-lit and designed guardhouse and front entrance, complements an organically formed lustrous landscape that capitalizes on the uniqueness of a tropical plants.', 1, '2017-01-15 20:20:08', 1),
(12, 'home-located', 'Apitong Village is strategically situated near schools, hospitals and medical centers, places of worship, shopping malls and leisure centers, government institutions, transportation hubs and main access roads. A proof that we value your family’s health, future and bond. Because we believe that a village starts with a family.', 1, '2017-01-15 20:22:23', 1),
(13, 'home-money', 'Apitong Village situated at the very heart of Sto. Nino, Meycauayan, Bulacan, aims to provide value to your hard earned money. We promise to give you more than what you are paying for, the quality of the materials to be used in building your home, the community that surrounds the village, and our heartfelt commitment in making sure that you get a home, not just a house.', 1, '2017-01-15 20:22:24', 1),
(14, 'home-header', 'Live at the heart of Meycauayan City', 1, '2017-01-15 21:18:19', 1),
(15, 'home-tagline', 'Apitong Court Residences is conveniently located near schools, transport terminals, commercial establishments, place of worship, industrial parks and government offices.', 1, '2017-01-15 20:23:53', 1);

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
(1, 'Test', 'Test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 'n/a', 'test', 'test', 1, '2016-10-06 21:36:48', '2017-01-15 18:34:27'),
(2, 'Tester', 'Tester', 'test2', '1f10e0eeec7a2950849a2a1d8fa9ecbd', 'testtest@gmail.com', 'img/profile/586a37862fefe12166026_1097660480252157_1099898397_n.jpg', '919191919', 'Test Address', 0, '2017-01-02 19:20:38', '2017-01-02 19:20:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_access`
--
ALTER TABLE `admin_access`
  ADD PRIMARY KEY (`ACCESS_NO`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `last_edited_by` (`last_edited_by`),
  ADD KEY `gallery` (`gallery`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `last_edited_by` (`last_edited_by`),
  ADD KEY `root_category` (`root_category`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`ACCESS_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_access`
--
ALTER TABLE `admin_access`
  MODIFY `ACCESS_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `ACCESS_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `admin_access` (`ACCESS_NO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`last_edited_by`) REFERENCES `admin_access` (`ACCESS_NO`) ON DELETE NO ACTION,
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`category`) REFERENCES `article_category` (`id`);

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `article_category_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `admin_access` (`ACCESS_NO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_category_ibfk_2` FOREIGN KEY (`last_edited_by`) REFERENCES `admin_access` (`ACCESS_NO`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
