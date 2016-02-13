-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2016 at 05:08 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `off`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `joining_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `joining_date`) VALUES
(1, 'erfan', '25f9e794323b453885f5181f1b624d0b', 'erfan@yahoo.com', '2016-01-16 14:26:56'),
(2, 'amin', '25f9e794323b453885f5181f1b624d0b', 'amin@yahoo.com', '2016-01-16 14:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE IF NOT EXISTS `center` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `admin` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `name`, `admin`) VALUES
(7, 'واحد مرکزی', 2),
(8, 'واحد بردیس', 2),
(9, 'واحد شهرستان', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groh`
--

CREATE TABLE IF NOT EXISTS `groh` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `admin` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groh`
--

INSERT INTO `groh` (`id`, `name`, `admin`) VALUES
(2, 'ویژه', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `gender` int(2) NOT NULL,
  `age` int(11) NOT NULL,
  `degree` int(11) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `marrageState` int(11) NOT NULL,
  `admin` int(10) NOT NULL,
  `groh` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `phone`, `gender`, `age`, `degree`, `registerDate`, `marrageState`, `admin`, `groh`) VALUES
(3, 'عرفان اویسی', 'sara@mail.com', '0912121212', 1, 22, 2, '2016-01-16 10:31:18', 1, 1, 0),
(4, 'عرفان اویسی', 'erfan@mail.com', '09188888888', 1, 22, 2, '2016-01-18 06:44:36', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gender` int(10) NOT NULL,
  `degree` int(2) DEFAULT NULL,
  `mount` int(2) NOT NULL,
  `maxAge` int(2) DEFAULT '0',
  `minAge` int(2) DEFAULT '0',
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `marrageState` int(2) NOT NULL,
  `centerId` int(10) NOT NULL,
  `admin` int(10) NOT NULL,
  `groh` int(11) NOT NULL DEFAULT '0',
  `forWho` int(10) NOT NULL DEFAULT '0',
  `limitt` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `name`, `gender`, `degree`, `mount`, `maxAge`, `minAge`, `create`, `marrageState`, `centerId`, `admin`, `groh`, `forWho`, `limitt`) VALUES
(1, 'تابستانه', 3, 4, 20, 30, 10, '2016-01-16 10:27:30', 3, 7, 2, 0, 0, NULL),
(2, 'بهار', 1, 4, 7, 22, 10, '2016-01-16 10:27:44', 3, 9, 1, 0, 0, 3),
(7, 'تست', 2, 4, 10, 12, 10, '2016-01-18 06:46:18', 2, 8, 2, 0, 0, NULL),
(8, 'نوروزی', 3, 4, 10, 77, 7, '2016-01-18 10:38:55', 3, 8, 2, 2, 0, NULL),
(9, 'حراجی', 1, 1, 20, 0, 0, '2016-01-18 17:00:59', 1, 9, 1, 0, 3, 2),
(10, 'تست', 1, 2, 2000, 0, 0, '2016-01-18 17:08:53', 1, 9, 1, 0, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `offermember`
--

CREATE TABLE IF NOT EXISTS `offermember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who` int(11) NOT NULL,
  `which` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `offermember`
--

INSERT INTO `offermember` (`id`, `who`, `which`) VALUES
(1, 3, 10),
(2, 3, 2),
(3, 3, 10),
(4, 3, 2),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `totaloffer`
--

CREATE TABLE IF NOT EXISTS `totaloffer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `center` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `offer` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `totaloffer`
--

INSERT INTO `totaloffer` (`id`, `center`, `payment`, `offer`, `admin`) VALUES
(1, 9, 93, 7, 1),
(2, 9, 750, 250, 1),
(3, 9, 750000, 250000, 1),
(4, 9, 91000, 9000, 1),
(5, 9, 93000, 7000, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
