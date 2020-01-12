-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 11:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(7, 'edomomodo', 'cc03e747a6afbbcbf8be7668acfebee5', 'edo.momodo@gmail.com', 'Yes', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `pid_fk` int(11) DEFAULT NULL,
  `uid_fk` int(11) DEFAULT NULL,
  `payerID` varchar(300) DEFAULT NULL,
  `paymentID` varchar(400) NOT NULL DEFAULT '',
  `token` varchar(400) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `link` varchar(400) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plenty`
--

CREATE TABLE IF NOT EXISTS `plenty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid_fk` int(11) NOT NULL,
  `api_uid` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created` int(11) DEFAULT NULL,
  `qty` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `qty_done` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `oid_fk` int(11) UNSIGNED DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plenty_test`
--

CREATE TABLE IF NOT EXISTS `plenty_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `followers` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
