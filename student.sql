-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 09:59 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `information`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `studentNo` varchar(50) NOT NULL,
  `studentName` varchar(100) NOT NULL,
  `studentContact` varchar(100) NOT NULL,
  `studentAge` varchar(30) NOT NULL,
  `studentAddress` varchar(200) NOT NULL,
  `studentStatus` varchar(30) NOT NULL,
  `studentGender` varchar(10) NOT NULL,
  `studentStudy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studentNo`, `studentName`, `studentContact`, `studentAge`, `studentAddress`, `studentStatus`, `studentGender`, `studentStudy`) VALUES
(5, '140628', 'Jose Rizal', '0928', '26', 'Quezon City', 'Single', 'Male', 'College'),
(6, '992827', 'Juan Dela Cruz', '0912121', '26', 'Quezon City', 'Single', 'Male', 'College'),
(8, '1212132', 'Josie Batungbakal', '129189212678', '26', 'Cubao, Quezon City', 'Single', 'Male', 'College');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
