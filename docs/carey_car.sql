-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2014 at 03:08 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table contains data about requests' AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `requestline`
--

CREATE TABLE IF NOT EXISTS `requestline` (
  `RequestLineID` int(255) NOT NULL AUTO_INCREMENT,
  `requestID` varchar(100) NOT NULL,
  `testerID` varchar(3) NOT NULL,
  PRIMARY KEY (`RequestLineID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Data about each request' AUTO_INCREMENT=59 ;

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
(1, 'Kiran', 'Patel', '074512365', '200 Bath Road', '200 Bath Road', 'kipatel@blackberry.com', '03e9db264eefdedef0ab380e9854c940', 'kipatel'),
(2, 'Asif', 'Jafferali', '123', '200 Bath Road', '200 Bath Road', 'ajafferali@blackberry.com', '03e9db264eefdedef0ab380e9854c940', 'ajafferali');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
