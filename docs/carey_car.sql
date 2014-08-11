-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2014 at 01:08 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carey_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `requestID` int(6) NOT NULL AUTO_INCREMENT,
  `date_request` date NOT NULL,
  `PTime` time NOT NULL,
  `PLoc` varchar(100) NOT NULL,
  `Duration` varchar(10) NOT NULL,
  `DLocation` varchar(100) NOT NULL,
  `Veh_Type` varchar(20) NOT NULL,
  `Cost_Center` varchar(6) DEFAULT NULL,
  `GL_Code` varchar(6) DEFAULT NULL,
  `add_Comments` varchar(500) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`requestID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table contains data about requests' AUTO_INCREMENT=109 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `date_request`, `PTime`, `PLoc`, `Duration`, `DLocation`, `Veh_Type`, `Cost_Center`, `GL_Code`, `add_Comments`, `status`) VALUES
(103, '2014-08-12', '00:14:00', 'Slough UK', '30', 'Slough EMEA', 'executive', '313211', '650003', '', NULL),
(104, '2014-08-21', '00:10:00', 'Slough UK', '30', 'Slough EMEA', 'executive', '313211', '650003', '', NULL),
(105, '2014-08-19', '00:10:00', 'Slough UK', '30', 'Slough EMEA', 'executive', '313211', '650003', '', 'SENT'),
(106, '2014-08-12', '00:10:00', 'Slough UK', '30', 'Slough EMEA', 'executive', '313211', '650003', '', 'SENT'),
(107, '2014-08-12', '00:10:00', 'Slough UK', '30', 'Slough EMEA', 'executive', '313000', '650003', '', NULL),
(108, '2014-08-15', '00:13:30', 'Slough UK', '30', 'Slough EMEA', 'executive', '313211', '650003', '', 'SENT');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
