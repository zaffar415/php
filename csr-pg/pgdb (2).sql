-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2020 at 09:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'name', 'test@gmail.com', 'Sub', '', '2020-11-21 13:51:14'),
(2, 'test', 'test@gmail.com', 'sunject', '', '2020-11-21 13:51:14'),
(3, 'test', 'test@gmail.com', 'subject', 'mesage\r\n                            ', '2020-11-21 13:51:14'),
(4, 'test', 'test@gmail.com', 'subject', 'mesage\r\n                            ', '2020-11-21 13:51:14'),
(5, 'test', 'test@gmail.com', 'sub', 'message\r\n                            ', '2020-11-21 13:51:14'),
(6, 'test', 'test@gmail.com', 'sub', 'msg\r\n                            ', '2020-11-21 13:51:14'),
(7, 'test', 'test@gmail.com', 'subject', 'essage\r\n                            ', '2020-11-21 13:51:14');

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
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renewals`
--

INSERT INTO `renewals` (`id`, `user_id`, `user`, `email`, `room_id`, `room_name`, `extend`, `status`, `created_at`) VALUES
(39, 7, 'abc', 'abc@gmail.com', 5, 'Adayar Shared PG for Girls ', 30, 'pending', '2020-11-21 13:50:35');

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
  `end_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `userid`, `name`, `email`, `room`, `room_id`, `start_date`, `end_date`, `duration`, `quantity`, `status`, `description`, `created_at`) VALUES
(49, 6, 'new', 'new@gmail.com', 'Adayar Single PG for Boys ', 9, '2020-11-22', '2021-11-22', 12, 1, 'pending', '', '2020-11-21 13:48:48'),
(50, 3, 'queen', 'test@gmail.com', 'Adayar Shared PG for Girls (A/C)', 4, '2020-11-22', '2020-12-22', 1, 3, 'pending', '', '2020-11-21 13:48:48'),
(51, 7, 'abc', 'abc@gmail.com', 'Adayar Shared PG for Girls ', 5, '2020-11-28', '2022-11-28', 24, 1, 'approved', '', '2020-11-21 13:48:48'),
(52, 7, 'abc', 'abc@gmail.com', 'Adayar Shared PG for Girls (A/C)', 8, '2020-11-22', '2021-11-22', 12, 1, 'pending', NULL, '2020-11-21 13:48:48'),
(53, 6, 'new', 'new@gmail.com', 'Adayar Single PG for Boys ', 9, '2020-11-22', '2021-11-22', 12, 1, 'pending', NULL, '2020-11-21 13:49:11'),
(54, 6, 'new', 'new@gmail.com', 'Adayar Shared PG for Girls ', 11, '2020-11-22', '2020-12-22', 1, 2, 'pending', NULL, '2020-11-21 13:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `descrip` longtext NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `food` tinyint(1) NOT NULL DEFAULT 1,
  `laundry` tinyint(1) NOT NULL DEFAULT 1,
  `wifi` tinyint(1) NOT NULL,
  `occupied` varchar(100) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `plans` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `descrip`, `ac`, `food`, `laundry`, `wifi`, `occupied`, `max`, `price`, `total`, `plans`, `created_at`) VALUES
(1, 'Adayar Single PG for Boys ', 'pg1.jpg', 'Rooms Available with all facilities', 1, 1, 1, 1, '0', 1, 12000, 10, 'short', '2020-11-21 14:05:43'),
(2, 'Adayar Single PG for Girls ', 'pg2.jpg', 'Rooms Available with all facilities', 1, 1, 1, 1, '0', 1, 12000, 10, 'short', '2020-11-21 14:05:43'),
(3, 'Adayar Shared PG for Boys (A/C)', 'pg3.jpg', 'Rooms Available with all facilities', 1, 1, 1, 1, '0', 4, 6000, 40, 'short', '2020-11-21 14:05:43'),
(4, 'Adayar Shared PG for Girls (A/C)', 'pg4.jpg', 'Rooms Available with all facilities', 1, 1, 1, 1, '0', 4, 6000, 40, 'short', '2020-11-21 14:05:43'),
(5, 'Adayar Shared PG for Girls ', 'pg5.jpg', 'Rooms Available with all facilities', 0, 1, 0, 1, '1', 4, 4000, 60, 'long', '2020-11-21 14:05:43'),
(6, 'Adayar Shared PG for Boys ', 'pg6.jpg', 'Rooms Available with all facilities', 0, 1, 0, 1, '0', 4, 4000, 60, 'long', '2020-11-21 14:05:43'),
(7, 'Adayar Shared PG for Boys (A/C)', 'pg7.jpeg', 'Rooms Available with all facilities', 1, 1, 1, 1, '0', 4, 6000, 60, 'long', '2020-11-21 14:05:43'),
(8, 'Adayar Shared PG for Girls (A/C)', 'pg8.jpeg', 'Rooms Available with all facilities', 1, 1, 1, 1, '0', 4, 6000, 60, 'long', '2020-11-21 14:05:43'),
(9, 'Adayar Single PG for Boys ', 'pg7.jpg', 'Rooms Available with all facilities', 1, 1, 1, 1, '0', 1, 12000, 10, 'long', '2020-11-21 14:05:43'),
(10, 'Adayar Single PG for Girls ', 'pg10.jpg', 'Rooms Available with all facilities', 1, 1, 1, 1, '0', 1, 12000, 10, 'long', '2020-11-21 14:05:43'),
(11, 'Adayar Shared PG for Girls ', 'pg11.jpg', 'Rooms Available with all facilities', 0, 1, 0, 1, '0', 4, 4000, 40, 'short', '2020-11-21 14:05:43'),
(12, 'Adayar Shared PG for Boys ', 'pg12.jpeg', 'Rooms Available with all facilities', 0, 1, 0, 1, '0', 4, 4000, 40, 'short', '2020-11-21 14:05:43');

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `username`, `address`, `contact`, `verified`, `deleted`, `created_at`) VALUES
(1, 'user1', 'user1@gmail.com', 'toor', 'Administrator', 'root', '', 0, 0, 0, '2020-11-21 13:52:04'),
(2, 'thofa', 'tt@gmail.com', 'thofa', 'Customer', 'thofa', 'aadsozdczdocdk', 123456, 0, 0, '2020-11-21 13:52:04'),
(3, 'queen', 'test@gmail.com', 'queen', 'Customer', 'queen', 'fgh', 9876567898, 0, 0, '2020-11-21 13:52:04'),
(6, 'new', 'new@gmail.com', 'new pass', 'Customer', 'new', '123', 123, 0, 0, '2020-11-21 13:52:04'),
(7, 'abc', 'abc@gmail.com', '12345', 'Customer', 'abc', '12345', 12345, 0, 0, '2020-11-21 13:52:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `renewals`
--
ALTER TABLE `renewals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
