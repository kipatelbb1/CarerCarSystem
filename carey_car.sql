-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2014 at 10:20 AM
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
  PRIMARY KEY (`requestID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table contains data about requests' AUTO_INCREMENT=79 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `date_request`, `PTime`, `PLoc`, `Duration`, `DLocation`, `Veh_Type`, `Cost_Center`, `GL_Code`, `add_Comments`) VALUES
(71, '2014-07-29', '00:10:00', '200 Bath Road, Slough, SL1 3XE, UK', '30', '200 Bath Road, Slough, SL1 3XE, UK', 'executive', '313211', '650003', ''),
(72, '2014-07-29', '00:10:00', '200 Bath Road, Slough, SL1 3XE, UK', '30', '200 Bath Road, Slough, SL1 3XE, UK', 'executive', '313000', '650003', ''),
(73, '2014-07-30', '00:10:00', '200 Bath Road, Slough, SL1 3XE, UK', '30', '200 Bath Road, Slough, SL1 3XE, UK', 'executive', '313211', '650003', ''),
(74, '2014-07-09', '00:10:00', '200 Bath Road, Slough, SL1 3XE, UK', '30', '200 Bath Road, Slough, SL1 3XE, UK', 'executive', '313211', '650003', ''),
(75, '2014-07-31', '00:11:00', '200 Bath Road, Slough, SL1 3XE, UK', '30', '200 Bath Road, Slough, SL1 3XE, UK', 'executive', '313211', '650003', ''),
(76, '2014-08-04', '00:10:00', 'Slough Bath Road', '30', 'Slough Bath Road', 'mpv', '313211', '650003', 'testest'),
(77, '2014-07-24', '00:10:00', 'sad', '30', 'ssad', 'executive', '313211', '650003', ''),
(78, '2014-08-06', '00:10:00', 'sad', '30', 'ssad', 'executive', '313211', '650003', '');

-- --------------------------------------------------------

--
-- Table structure for table `requestline`
--

CREATE TABLE IF NOT EXISTS `requestline` (
  `RequestLineID` int(255) NOT NULL AUTO_INCREMENT,
  `requestID` varchar(100) NOT NULL,
  `testerID` varchar(3) NOT NULL,
  PRIMARY KEY (`RequestLineID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Data about each request' AUTO_INCREMENT=122 ;

--
-- Dumping data for table `requestline`
--

INSERT INTO `requestline` (`RequestLineID`, `requestID`, `testerID`) VALUES
(110, '71', '1'),
(111, '72', '1'),
(112, '73', '1'),
(113, '73', '1'),
(114, '74', '1'),
(115, '75', '1'),
(116, '75', '1'),
(117, '75', '1'),
(118, '76', '1'),
(119, '77', '1'),
(120, '78', '1'),
(121, '78', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tester`
--

CREATE TABLE IF NOT EXISTS `tester` (
  `testerID` int(3) NOT NULL AUTO_INCREMENT,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `MobileNo` varchar(11) NOT NULL,
  `PLocation` varchar(200) NOT NULL,
  `DLocation` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  PRIMARY KEY (`testerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table holds data on the Testers' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tester`
--

INSERT INTO `tester` (`testerID`, `fName`, `lName`, `MobileNo`, `PLocation`, `DLocation`, `email`, `Password`, `username`) VALUES
(1, 'Kiran', 'Patel', '07451236556', 'Slough Bath Road', 'Slough Bath Road', 'kipatel@blackberry.com', '03e9db264eefdedef0ab380e9854c940', 'kipatel'),
(2, 'Asif', 'Jafferali', '07859654125', '200 Bath Road, Slough, SL1 3XE, UK', '200 Bath Road, Slough, SL1 3XE, UK', 'ajafferali@blackberry.com', '03e9db264eefdedef0ab380e9854c940', 'ajafferali');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
