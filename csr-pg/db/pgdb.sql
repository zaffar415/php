-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 08:51 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `renewals`
--

CREATE TABLE `renewals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `extend` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renewals`
--

INSERT INTO `renewals` (`id`, `user_id`, `user`, `email`, `room_id`, `room_name`, `extend`, `status`) VALUES
(6, 1, 'name', 'mail@mail.com', 1, '1 BHK Pg Room', 30, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room` varchar(100) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `userid`, `name`, `email`, `room`, `room_id`, `start_date`, `end_date`, `duration`, `quantity`, `status`, `description`) VALUES
(23, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2020-11-28', 1, 1, 'approved', ''),
(28, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2021-02-20', 183, 1, 'rejected', ''),
(29, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2021-02-20', 1095, 1, 'rejected', ''),
(30, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2021-02-10', 90, 1, 'rejected', ''),
(31, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2021-05-12', 6, 1, 'approved', ''),
(32, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2020-12-12', 1, 2, 'approved', ''),
(33, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2021-02-12', 3, 2, 'approved', ''),
(34, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2021-05-12', 6, 2, 'pending', ''),
(35, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2022-11-12', 24, 2, 'approved', ''),
(36, 1, 'name', 'mail@mail.com', '1 BHK Pg Room', 1, '2020-11-12', '2023-11-12', 36, 1, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'bed.jpeg',
  `descrip` longtext NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `food` tinyint(1) NOT NULL DEFAULT 1,
  `laundry` tinyint(1) NOT NULL DEFAULT 1,
  `wifi` tinyint(1) NOT NULL,
  `occupied` varchar(100) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `descrip`, `ac`, `food`, `laundry`, `wifi`, `occupied`, `price`) VALUES
(1, '1 BHK Pg Room', 'bed.jpeg', 'My DEscription', 0, 1, 1, 0, '33', 6999),
(2, '2 BHK Pg Room', 'bed.jpeg', 'My DEscription', 0, 1, 1, 0, '11', 4999),
(4, '1 BHK Delux Pg Room', 'bed.jpeg', 'My DEscription', 1, 0, 1, 1, '0', 6999),
(5, '2 BHK Delux Pg Room', 'bed.jpeg', 'My DEscription', 1, 0, 1, 1, '0', 4999);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'Customer',
  `username` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(2) NOT NULL DEFAULT 0,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `username`, `address`, `contact`, `verified`, `deleted`, `regdate`) VALUES
(1, 'user1', 'user1@gmail.com', 'toor', 'Administrator', 'root', '', 0, 0, 0, '2020-11-10 07:22:56'),
(2, 'thofa', 'tt@gmail.com', '12345', 'Customer', 'thofa', 'aadsozdczdocdk', 123456, 0, 0, '2020-11-10 07:22:56'),
(3, 'queen', 'qq@gmail.com', '12345', 'Customer', 'queen', '', 12345, 0, 0, '2020-11-10 07:22:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `renewals`
--
ALTER TABLE `renewals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `renewals`
--
ALTER TABLE `renewals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
