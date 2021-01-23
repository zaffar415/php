-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2020 at 06:57 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `calc`
--

CREATE TABLE `calc` (
  `id` int(5) NOT NULL,
  `value1` float NOT NULL,
  `value2` float NOT NULL,
  `operator` varchar(5) NOT NULL,
  `result` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calc`
--

INSERT INTO `calc` (`id`, `value1`, `value2`, `operator`, `result`) VALUES
(1, 5, 5, '+', 10),
(2, 10, 5, '+', 15),
(3, 3, 3, '+', 6),
(4, 5, 4, '+', 9),
(5, 9, 2, 'x', 18),
(6, 18, 3, '/', 6),
(7, 6, 1, '-', 5),
(8, 0, 5, '+', 5),
(9, 1, 1, '+', 2),
(10, 0.5, 1.2, '+', 1.7),
(11, 2, 2, '+', 4),
(12, 4, 6.5, '+', 10.5),
(13, 10.5, 2, 'x', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calc`
--
ALTER TABLE `calc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calc`
--
ALTER TABLE `calc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
