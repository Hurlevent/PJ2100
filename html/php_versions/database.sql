-- COPYRIGHT gruppe17( eftoli14, banfro14, hallar14, dallar14, ausasl14, komchr14, odeand14)
-- Database for PJ2100 exam-project
--
-- Creating the Schema
--
DROP SCHEMA IF EXISTS eftoli14;
CREATE SCHEMA eftoli14;
USE eftoli14;

--
-- Structure for table 'Grupperom'
--

-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Host: mysql.nith.no
-- Generation Time: Mar 17, 2015 at 02:05 PM
-- Server version: 5.1.73
-- PHP Version: 5.4.4-14+deb7u14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eftoli14`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `booked_from` datetime DEFAULT NULL,
  `booked_to` datetime DEFAULT NULL,
  `room_id` int(6) unsigned DEFAULT NULL,
  `user_id` int(6) unsigned DEFAULT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `booked_from`, `booked_to`, `room_id`, `user_id`, `added`) VALUES
(38, '2015-03-18 00:00:00', '0000-00-00 00:00:00', 2, 701395, '2015-03-17 13:04:44'),
(37, '2015-03-27 00:00:00', '2015-03-27 00:00:00', 2, 701395, '2015-03-17 13:03:15'),
(36, '2015-03-17 00:00:00', '0000-00-00 00:00:00', 5, 701395, '2015-03-17 13:02:58'),
(35, '2015-03-15 00:00:00', '0000-00-00 00:00:00', 1, 701395, '2015-03-17 13:02:58'),
(34, '2015-03-15 00:00:00', '2015-03-16 00:00:00', 1, 701395, '2015-03-17 12:59:03'),
(33, '2015-03-17 00:00:00', '2015-03-18 00:00:00', 1, 701395, '2015-03-17 12:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `projector` enum('HDMI','VGA') DEFAULT NULL,
  `capacity` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `projector`, `capacity`) VALUES
(1, 'Rom 81', 'HDMI', 2),
(2, 'Rom 42', 'VGA', 3),
(3, 'Rom 4', 'HDMI', 4),
(4, 'Rom 10', 'VGA', 2),
(5, 'Vrimle', 'HDMI', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `student_id` int(6) unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone_number` int(8) unsigned NOT NULL,
  `email_address` varchar(150) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`student_id`, `name`, `password`, `phone_number`, `email_address`) VALUES
(701395, 'Frode B.', 'Frode', 46899973, 'frode@riseup.net');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
