-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2020 at 07:31 AM
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
-- Database: `Exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `No` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`No`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Answers`
--

CREATE TABLE `Answers` (
  `No` int(5) NOT NULL,
  `Options` varchar(100) NOT NULL,
  `Qno` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Answers`
--

INSERT INTO `Answers` (`No`, `Options`, `Qno`) VALUES
(1, 'Operating System', 1),
(2, 'Computer Virus', 1),
(3, 'Firewall', 1),
(4, 'Anti-Virus', 1),
(1, 'Mosaic', 2),
(2, 'Opera', 2),
(3, 'Safari', 2),
(4, 'MSIE', 2),
(1, 'Uniform Research Limited', 3),
(2, 'Uniform Resource Locator', 3),
(3, 'Uniline Resource Lab', 3),
(4, 'Uniform Research Locator', 3),
(1, 'Bit transferred per unit time', 4),
(2, 'Byte transferred per unit time', 4),
(3, 'Bit transferred per square unit time', 4),
(4, 'None of these', 4),
(1, 'Google Bol', 5),
(2, 'Yahoo Talk', 5),
(3, 'Rediff Messenger', 5),
(4, 'None of these', 5),
(1, 'Blind Carbon Copy', 6),
(2, 'Blind Copy Carbon', 6),
(3, 'Blind Compose Copy', 6),
(4, 'Blind Copy Compose', 6),
(1, '.zip', 7),
(2, '.tar', 7),
(3, '.rar', 7),
(4, 'All of these', 7),
(1, 'Telephone Network', 8),
(2, 'IP Network', 8),
(3, 'TV', 8),
(4, 'None of these', 8),
(1, 'Wireless LAN', 9),
(2, 'wifi', 9),
(3, 'Wimax', 9),
(4, 'All of these', 9),
(1, 'E-teaching', 10),
(2, 'Chatting', 10),
(3, 'E-learning', 10),
(4, 'Video Conferencing', 10),
(1, 'Making a Machine Intelligence', 101),
(2, 'Programming with your own intelligence', 101),
(3, 'putting more memory into Computer', 101),
(4, 'putting your intelligence into Computer', 101),
(1, 'Charless Babbage', 102),
(2, 'Lee De Forest', 102),
(3, 'John McCarthy', 102),
(4, 'Microsoft', 102),
(1, 'Communication', 104),
(2, 'Weather forecasting ', 104),
(3, 'Agriculture and forestry', 104),
(4, 'All the above', 104),
(1, 'Hydrogen', 105),
(2, 'Diesel', 105),
(3, 'Kerosene', 105),
(4, 'Coal', 105),
(1, 'Laser Interferometer Gravitational wave Observatory', 103),
(2, 'Light Induced Gravity Observatory', 103),
(3, 'Light Interferometer Gravitational wave Observatory', 103),
(4, 'Laser Induced Gaseous Optics.', 103),
(1, 'Ctrl + X', 11),
(2, 'Ctrl + C', 11),
(3, 'Ctrl + A', 11),
(4, 'Ctrl + Z', 11),
(1, 'Bio Chips', 12),
(2, 'Transistors', 12),
(3, 'Integrated Circuit', 12),
(4, 'Vacuum Tubes', 12);

-- --------------------------------------------------------

--
-- Table structure for table `Feedbacks`
--

CREATE TABLE `Feedbacks` (
  `No` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sub` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `QA`
--

CREATE TABLE `QA` (
  `Qno` int(5) NOT NULL,
  `Question` varchar(300) NOT NULL,
  `Answer` varchar(100) NOT NULL,
  `Section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QA`
--

INSERT INTO `QA` (`Qno`, `Question`, `Answer`, `Section`) VALUES
(1, '............ is the first web browser.', 'Mosaic', 'General Knowledge - Computer'),
(2, 'Learning through online is known as ..............', 'E-learning', 'General Knowledge - Computer'),
(3, 'Windows is an example of ............ System.', 'Operating', 'General Knowledge - Computer'),
(4, 'MS-Office is an ................ Software', 'Application', 'General Knowledge - Computer'),
(5, '...... browser allows you to view the webpage.', 'web', 'General Knowledge - Computer'),
(6, 'In fibre-optics, the signal source is ......... waves.', 'Light', 'General Knowledge - Computer'),
(7, '....... is the inventor of www.', 'Tim Berners-Lee', 'General Knowledge - Computer'),
(8, '....... is the father of Computer.', 'Charles Babbage', 'General Knowledge - Computer'),
(9, 'SQL Stands for -', 'Structured Query Language', 'General Knowledge - Computer'),
(10, '.......... is the smallest and the fastest memory in computer.', 'Cache', 'General Knowledge - Computer');

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `Qno` int(5) NOT NULL,
  `Question` varchar(500) NOT NULL,
  `Ansid` varchar(40) NOT NULL,
  `Section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`Qno`, `Question`, `Ansid`, `Section`) VALUES
(1, 'A/ An ......... is a computer program that spreads by inserting copies of itself into other executable code or documents.', '2', 'GK General Knowledge - Computer Quiz'),
(2, 'Which web browser was the first web browser from the following?', '1', 'GK General Knowledge - Computer Quiz'),
(3, 'Every web page that is displayed on the internet has a specific address associated with it. this address is known as -', '2', 'GK General Knowledge - Computer Quiz'),
(4, 'The Speed of the Internet is measured in the number of -', '1', 'GK General Knowledge - Computer Quiz'),
(5, 'Which of the following is a chat engine?', '4', 'GK General Knowledge - Computer Quiz'),
(6, 'At the time of composing any e-mail, we have three options - To, CC and BCC. What is the meaning of BCC here?', '1', 'GK General Knowledge - Computer Quiz'),
(7, 'At the time of  downloading from the internet, some files may be in compressed from having extension -', '4', 'GK General Knowledge - Computer Quiz'),
(8, 'Video conferencing is done through -', '2', 'GK General Knowledge - Computer Quiz'),
(9, 'Which of the following texhnologies provide high speed data communication over wireless network?', '4', 'GK General Knowledge - Computer Quiz'),
(10, 'Learning online through internet is also known as -', '3', 'GK General Knowledge - Computer Quiz'),
(101, 'What is Artificial Intelligence?', '1', 'Science and Technology'),
(102, 'Who among the following is considered as the Father of Artificial Intelligence?', '3', 'Science and Technology'),
(104, 'A Sattelite is used for -', '4', 'Science and Technology'),
(105, 'Which of the fuel would produce minimum environment pollution?', '1', 'Science and Technology'),
(103, 'LIGO stands for -', '1', 'Science and Technology'),
(11, 'To Undo the last work, we have to use which of the following windows shortcut key?', '4', 'GK General Knowledge - Computer Quiz'),
(12, 'The Third generation Computers were made with - ', '3', 'GK General Knowledge - Computer Quiz');

-- --------------------------------------------------------

--
-- Table structure for table `Rank`
--

CREATE TABLE `Rank` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `score` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rank`
--

INSERT INTO `Rank` (`id`, `name`, `score`) VALUES
(1, 'User1', 16);

-- --------------------------------------------------------

--
-- Table structure for table `Result`
--

CREATE TABLE `Result` (
  `No` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `stud_id` int(5) NOT NULL,
  `Correct` int(5) NOT NULL,
  `Result` varchar(5) NOT NULL,
  `Section` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Result`
--

INSERT INTO `Result` (`No`, `name`, `stud_id`, `Correct`, `Result`, `Section`, `date`) VALUES
(1, 'User1', 1, 1, '1', 'GK General Knowledge - Computer Quiz', '2019-12-23 09:54:55am'),
(2, 'User1', 1, 5, '10', 'General Knowledge - Computer', '2019-12-26 05:57:07pm'),
(3, 'User1', 1, 5, '5', 'Science and Technology', '2019-12-26 05:58:24pm');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `stud_id` int(5) NOT NULL,
  `stud_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `stud_pass` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Aadhar_no` bigint(50) NOT NULL,
  `mobile_no` bigint(25) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`stud_id`, `stud_name`, `email`, `stud_pass`, `DOB`, `Gender`, `Aadhar_no`, `mobile_no`, `date`) VALUES
(1, 'User1', 'user1@gmail.com', 'password', '1999-12-01', 'male', 12345678910, 9876543210, '2019-12-23 08:11:19am');

-- --------------------------------------------------------

--
-- Table structure for table `Students1`
--

CREATE TABLE `Students1` (
  `stud_id` int(5) NOT NULL,
  `stud_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `stud_pass` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Aadhar_no` bigint(50) NOT NULL,
  `mobile_no` bigint(25) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Students1`
--

INSERT INTO `Students1` (`stud_id`, `stud_name`, `email`, `stud_pass`, `DOB`, `Gender`, `Aadhar_no`, `mobile_no`, `date`) VALUES
(1, 'User1', 'user1@gmail.com', 'password', '1999-12-01', 'male', 12345678910, 9876543210, '2019-12-23 08:11:19am');

-- --------------------------------------------------------

--
-- Table structure for table `Title`
--

CREATE TABLE `Title` (
  `id` int(5) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `visibility` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Title`
--

INSERT INTO `Title` (`id`, `Subject`, `visibility`) VALUES
(1, 'GK General Knowledge - Computer Quiz', b'1'),
(2, 'Science and Technology', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `Title1`
--

CREATE TABLE `Title1` (
  `id` int(5) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `visibility` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Title1`
--

INSERT INTO `Title1` (`id`, `Subject`, `visibility`) VALUES
(1, 'General Knowledge - Computer', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `Feedbacks`
--
ALTER TABLE `Feedbacks`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `Result`
--
ALTER TABLE `Result`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `Students1`
--
ALTER TABLE `Students1`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `Title`
--
ALTER TABLE `Title`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Title1`
--
ALTER TABLE `Title1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Feedbacks`
--
ALTER TABLE `Feedbacks`
  MODIFY `No` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Result`
--
ALTER TABLE `Result`
  MODIFY `No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `stud_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Students1`
--
ALTER TABLE `Students1`
  MODIFY `stud_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Title`
--
ALTER TABLE `Title`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Title1`
--
ALTER TABLE `Title1`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
