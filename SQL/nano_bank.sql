-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 08:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nano_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `sno` int(10) NOT NULL,
  `sender` char(50) NOT NULL,
  `receiver` char(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `datetime` datetime(2) NOT NULL DEFAULT current_timestamp(2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`sno`, `sender`, `receiver`, `amount`, `datetime`) VALUES
(1, 'Siya', 'Niya', 1000, '2021-09-18 21:25:15.27'),
(2, 'Siya', 'Niya', 1000, '2021-09-18 21:31:09.78'),
(3, 'Siya', 'Niya', 1000, '2021-09-18 21:32:13.56'),
(4, 'Siya', 'Niya', 100, '2021-09-18 21:32:47.39'),
(5, 'Kirtika', 'Shivansh', 1000, '2021-09-18 21:33:08.48'),
(6, 'Kirtika', 'Shivansh', 1000, '2021-09-18 21:34:22.59'),
(7, 'Kirtika', 'Shivansh', 1000, '2021-09-18 21:34:39.61'),
(8, 'Shivansh', 'Kirtika', 3000, '2021-09-18 21:34:56.42'),
(9, 'Niya', 'Siya', 3100, '2021-09-18 21:35:18.91'),
(10, 'Dim', 'Siya', 1000, '2021-09-18 21:44:22.82'),
(11, 'Siya', 'Dim', 1000, '2021-09-18 21:45:28.73');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Siya', 'kha@gmail.com', 40000),
(2, 'Kirtika', 'k@gmail.com', 60000),
(3, 'Niya', 'na@gmail.com', 50000),
(4, 'Kush', 'ksssk@gmail.com', 20000),
(5, 'Krish', 'demo@gmail.com', 30000),
(6, 'Pihu', 'Pih@gmail.com', 40000),
(7, 'Shivansh', 'Shivu@gmail.com', 10000),
(8, 'Dim', 'Dm@gmail.com', 70000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
