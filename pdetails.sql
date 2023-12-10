-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 07:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `user_id` varchar(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mobile` int(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `dob` date NOT NULL,
  `branch` varchar(255) NOT NULL,
  `fav` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `program` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`user_id`, `name`, `mobile`, `course`, `nickname`, `extra`, `exam`, `year`, `dob`, `branch`, `fav`, `company`, `program`) VALUES
('201fa04409', 'shiv', 2147483647, '', 'asu', 'bkc', '', 0, '2023-09-22', '', 'chat', 'l&t', NULL),
('201fa04408', 'amit', 2147483647, 'btech', 'kodu', 'no', 'yes', 2024, '2023-09-22', 'cse', 'chat', 'aws', NULL),
('201fa04411', 'r', 0, '', '', '', '', 0, '0000-00-00', '', '', '', NULL),
('201fa04425', 'Kumar', 2147483647, 'btech', 'situ', 'cric', 'yes', 2024, '2023-09-15', 'cse', 'chat', 'aws', NULL),
('201fa04429', 'arun', 0, '', '', '', '', 0, '0000-00-00', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fry`
--

CREATE TABLE `fry` (
  `user_id` varchar(250) NOT NULL,
  `frnd` varchar(250) NOT NULL,
  `opinion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fry`
--

INSERT INTO `fry` (`user_id`, `frnd`, `opinion`) VALUES
('4409', '4408', 'how are you'),
('4409', '4433', 'asdsa'),
('4409', '4412', 'fussd'),
('', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prefer`
--

CREATE TABLE `prefer` (
  `user_id` varchar(250) NOT NULL,
  `checkbox` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prefer`
--

INSERT INTO `prefer` (`user_id`, `checkbox`) VALUES
('4408', 'checkbox1, checkbox3, checkbox4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
