-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2013 at 06:30 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `expenses`
--

-- --------------------------------------------------------

--
-- Table structure for table `official`
--

CREATE TABLE IF NOT EXISTS `official` (
  `code` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `paidto` varchar(100) NOT NULL,
  `rate` varchar(7) NOT NULL,
  `quantity` varchar(4) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `official`
--

INSERT INTO `official` (`code`, `date`, `title`, `details`, `paidto`, `rate`, `quantity`, `total`) VALUES
('1361539668', '2012-01-01', 'asdfkbj', 'kjhkjhkj', 'jkhjkh', '89', '898', '898937'),
('1361539730', '2012-01-01', 'hkhk', 'hkjhkh', 'hjkhj', '8999', '8999', '65699'),
('1361540031', '2012-01-01', 'yjtgyj', 'tkjytgjhyh', 'gkhjkh', '988', '8989', '8989'),
('1361540046', '2013-02-22', 'server cost', 'cost of server f', 'eshlok', '45', '54', '45564'),
('1361540102', '2012-01-01', 'afafs', 'afsjasfw', 'hslss', '45', '154', '114521'),
('1361540139', '2012-01-01', 'nmhjabmhasngvha', 'by me', 'jjgjgjgjg', '76', '67', '7'),
('1361540130', '2012-01-01', 'asdsdsdw', 'chaanged by me', 'esdfdsfs', '4855', '55', '4499946'),
('1361540110', '2012-01-01', 'jyada', 'hmgjaasas', 'mhajsha', '9999', '1000', '1111'),
('1361540497', '2012-01-01', 'new tag', 'sdsdgsg', 'sfsfhdghgsd', '455', '444', '5555'),
('1361557588', '2012-01-01', 'hjk', 'hkjh', 'hkjhk', '4', '7465', '56'),
('1361558467', '2012-01-01', 'fjh', 'fhfhjdf', 'gf', '37', '37', '37'),
('1361563539', '2012-01-01', 'Brainse Launch Party 2013', 'Submit buttons should give trust to your visitors. Did you know that green and blue are the most relaxing colors? Look for the most popular websites and you will see that all of them are using these colors somewhere.', 'chancellor', '8', '87', '8654'),
('1361540051', '2012-01-01', 'ghshfjh', 'nngafsdjqjvqkwtdkqwbqwsqgf', 'jacks sparrow', '687', '343', '343'),
('1361681165', '2012-01-01', 'uerwhkj', 'hjkhkjhkj', 'kjjjhkj', '89', '7897', '78979'),
('1361896733', '2012-01-01', 'tyfrty', 'fhjgfhjgfhj', 'fhjghg', '567', '5675', '7657'),
('1361896834', '2012-01-01', 'hello world', 'ghjgjh', 'ghj', '789', '789', '789798'),
('1361899058', '2013-08-01', 'java dsa', 'hgsadsakjldkhg', 'sdghj', '87', '786', '9876');

-- --------------------------------------------------------

--
-- Table structure for table `unofficial`
--

CREATE TABLE IF NOT EXISTS `unofficial` (
  `code` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `paidto` varchar(100) NOT NULL,
  `rate` varchar(7) NOT NULL,
  `quantity` varchar(4) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unofficial`
--

INSERT INTO `unofficial` (`code`, `date`, `title`, `details`, `paidto`, `rate`, `quantity`, `total`) VALUES
('1361539668', '2012-01-01', 'asdfkbj', 'kjhkjhkj', 'jkhjkh', '89', '898', '898937'),
('1361539730', '2012-01-01', 'hkhk', 'hkjhkh', 'hjkhj', '8999', '8999', '65699'),
('1361540031', '2012-01-01', 'yjtgyj', 'tkjytgjhyh', 'gkhjkh', '988', '8989', '8989'),
('1361540046', '2013-02-22', 'server cost', 'cost of server f', 'eshlok', '45', '54', '45564'),
('1361540048', '2012-01-01', 'yjtgyjdfdfg', 'tkjytgjhyh', 'gkhjkh', '988fdg', '8989', '8989'),
('1361540102', '2012-01-01', 'afafs', 'afsjasfw', 'hslss', '45', '154', '114521'),
('1361540139', '2012-01-01', 'nmhjabmhasngvha', 'by me', 'jjgjgjgjg', '76', '67', '7'),
('1361540110', '2012-01-01', 'jyada', 'hmgjaasas', 'mhajsha', '9999', '1000', '1111'),
('1361540497', '2012-01-01', 'new tag', 'sdsdgsg', 'sfsfhdghgsd', '455', '444', '5555'),
('1361540130', '2012-01-01', 'asdsdsdw', 'chaanged by me', 'esdfdsfs', '4855', '55', '4499946'),
('1361540751', '2012-01-01', 'oho', 'dhdd', 'dgdg', '4', '5', '6666'),
('1361557588', '2012-01-01', 'hjk', 'hkjh', 'hkjhk', '4', '7465', '56'),
('1361558467', '2012-01-01', 'fjh', 'fhfhjdf', 'gf', '37', '37', '37'),
('1361563539', '2012-01-01', 'Brainse Launch Party 2013', 'Submit buttons should give trust to your visitors. Did you know that green and blue are the most relaxing colors? Look for the most popular websites and you will see that all of them are using these colors somewhere.', 'chancellor', '8', '87', '8654'),
('1361617023', '2012-01-01', 'sdfjkgh', 'gkdjsfhkj', 'sdfkj', '809', '809', '0909'),
('1361540051', '2012-01-01', 'ghshfjh', 'nngafsdjqjvqkwtdkqwbqwsqgf', 'jacks sparrow', '687', '343', '343'),
('1361681165', '2012-01-01', 'uerwhkj', 'hjkhkjhkj', 'kjjjhkj', '89', '7897', '78979'),
('1361896733', '2012-01-01', 'tyfrty', 'fhjgfhjgfhj', 'fhjghg', '567', '5675', '7657'),
('1361896834', '2012-01-01', 'hello world', 'ghjgjh', 'ghj', '789', '789', '789798'),
('1361899058', '2013-08-01', 'java dsa', 'hgsadsakjldkhg', 'sdghj', '87', '786', '9876');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
