-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 09:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authordb`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorstb`
--

CREATE TABLE `authorstb` (
  `AuthorId` int(11) NOT NULL,
  `AuthorFullName` varchar(225) NOT NULL,
  `AuthorEmail` varchar(225) NOT NULL,
  `AuthorAddress` varchar(225) NOT NULL,
  `AuthorBiography` text NOT NULL,
  `AuthorDateOfBirth` date NOT NULL,
  `AuthorSuspended` boolean() NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `authorstb`
--

INSERT INTO `authorstb` (`AuthorId`, `AuthorFullName`, `AuthorEmail`, `AuthorAddress`, `AuthorBiography`, `AuthorDateOfBirth`, `AuthorSuspended`) VALUES
(11, 'John Snow', 'jsnow@gmail.com', 'Karen', 'Hi I am the author of some very known novels.', '1985-02-05', 'True'),
(12, 'Triza Wamboi', 'twamboi@gmail.com', 'Kajiado', 'Hi I am a new to this game of writers.', '2000-12-31', 'True'),
(14, 'Anthony', 'antony@gmail.com', 'Rongai', 'I am the author of this website!!!', '1971-06-20', 'True'),
(15, 'David Tony', 'DTony@gmail.com', 'Kiambu', 'Hello there!!!!', '1980-11-16', 'True'),
(17, 'Ben Ten', 'tben@gmail.com', 'Isiolo', 'Ben 10 is an ordinary kid', '1999-06-24', 'True'),
(18, 'Grace', 'Chip@gamil.com', 'gchip@gmail.com', 'srdtfyguhbijnokl;\'', '2023-11-18', 'True');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorstb`
--
ALTER TABLE `authorstb`
  ADD PRIMARY KEY (`AuthorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorstb`
--
ALTER TABLE `authorstb`
  MODIFY `AuthorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
