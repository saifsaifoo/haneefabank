-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 09:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sender_id` int(100) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sender_id`, `receiver_id`, `sender_name`, `receiver_name`, `amount`, `at`) VALUES
(12345, 12348, 'Krishna Veni', 'Celeste Dsouza', 500, '2020-11-20 10:39:23'),
(12345, 12346, 'Krishna Veni', 'Rahul Shrivastav', 10000, '2020-11-20 10:52:44'),
(12348, 12346, 'Celeste Dsouza', 'Rahul Shrivastav', 87, '2020-11-20 10:54:27'),
(12346, 12348, 'Rahul Shrivastav', 'Celeste Dsouza', 500, '2020-11-20 11:17:21'),
(12347, 12345, 'Fatima', 'Krishna Veni', 2000, '2020-11-20 11:17:48'),
(12349, 12345, 'Hamzah', 'Krishna Veni', 5000, '2020-11-20 11:18:50'),
(12347, 12349, 'Fatima', 'Hamzah', 2000, '2020-11-20 11:19:10'),
(12346, 12348, 'Rahul Shrivastav', 'Celeste Dsouza', 87, '2020-11-20 11:20:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
