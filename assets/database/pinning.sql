-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2015 at 11:57 पूर्वाह्न
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pinning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'pine', '70f910cbd2983be954d35a35bb8c6ce6d79de7ce');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `org` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `website` text CHARACTER SET utf8 COLLATE utf8_bin,
  `date_deal` text NOT NULL,
  `domain_expire` text,
  `hosting_expire` text,
  `dealer` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `contact` text NOT NULL,
  `email` text,
  `domain_status` int(11) NOT NULL DEFAULT '0',
  `hosting_status` int(11) NOT NULL DEFAULT '0',
  `dealing_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client`, `org`, `website`, `date_deal`, `domain_expire`, `hosting_expire`, `dealer`, `contact`, `email`, `domain_status`, `hosting_status`, `dealing_price`) VALUES
(1, 'asdf', 'askdfgj', 'http://www.pinesofts.com', '2015-03-07', '2015-03-29', '2015-03-19', '1', '9887867', 'prachanda.gurung@gmail.com', 1, 1, 0),
(2, 'himalayan tiger askdjf', 'trek and adventure', 'http://www.htnpl.com', '2015-03-17', '2015-03-30', '2015-03-31', '2', '8796543', 'czinka62@yahoo.com', 1, 1, 0),
(3, 'the jukson', 'jukson.com', 'http://www.chartjs.org/docs/', '2015-01-01', '2015-01-01', '2015-01-31', '2', '878566545', 'czinka62@yahoo.com', 0, 0, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense` text NOT NULL,
  `amount` int(11) NOT NULL,
  `date` text NOT NULL,
  `year` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `month` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `expense`, `amount`, `date`, `year`, `month`) VALUES
(4, 'additionla', 10000, '2015-12-31', '2015', '12'),
(5, 'tiffin', 2000, '2016-01-30', '2016', '01'),
(6, 'internet', 12344, '2015-03-28', '2015', '03'),
(7, 'tiffin', 12345, '2015-12-02', '2015', '12'),
(8, 'tiffin', 123, '2015-12-01', '2015', '12');

-- --------------------------------------------------------

--
-- Table structure for table `funding`
--

CREATE TABLE IF NOT EXISTS `funding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taken_by` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `date` text NOT NULL,
  `year` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `month` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `funding`
--

INSERT INTO `funding` (`id`, `taken_by`, `amount`, `date`, `year`, `month`) VALUES
(6, '2', 15000, '2015-03-27', '2015', '03');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `received_date` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `received_by` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `received_amount` int(11) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `client_id`, `received_date`, `received_by`, `received_amount`, `remarks`) VALUES
(6, 3, '2014-12-21', '1', 25000, '');

-- --------------------------------------------------------

--
-- Table structure for table `project_logs`
--

CREATE TABLE IF NOT EXISTS `project_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `commitment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `project_logs`
--

INSERT INTO `project_logs` (`id`, `date`, `start_time`, `end_time`, `commitment`, `user_id`, `project_id`) VALUES
(1, '2015-01-01', '13:00', '00:00', 'asfjkj', 1, 2),
(2, '2015-01-01', '13:00', '01:00', 'this is the focus', 1, 1),
(3, '2015-01-02', '01:00', '01:00', 'hey this is commitment', 2, 1),
(4, '2016-12-01', '01:58', '02:00', 'hard one', 2, 1),
(5, '2015-01-01', '01:01', '13:59', 'asdfj jakshdf kasdhf  kjshdf a', 2, 1),
(6, '2015-12-31', '12:59', '00:00', 'lorem epsum is te aasfn ', 2, 1),
(7, '2015-12-01', '01:00', '01:00', 'laksdf', 2, 2),
(8, '2015-01-01', '01:00', '01:00', 'lkadnsf', 2, 2),
(9, '2015-04-04', '08:07', '08:09', 'Playing with the project.', 2, 1),
(10, '2015-09-09', '09:07', '15:04', 'askdn klasdn f', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'pracanda', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', 'prachanda.gurung@gmail.com'),
(2, 'pine', 'd3d3c9b08aa454d3d3512fd20bd686e65f7f75d2', 'czinka62@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
