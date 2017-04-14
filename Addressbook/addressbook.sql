-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 07:28 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addressbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `user_name`, `email`, `password`) VALUES
(1, 'Abdullah Al Shiam', 'shiam_cse_ru', 'shiam_cse_ru@yahoo.com', 'shiam143143'),
(2, 'Asm Shiam', 'shiam_cse_ru@gmail.com', 'shiam@gmail.com', 'shiam143143');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `identified` int(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `identified`, `firstname`, `lastname`, `qualification`, `number`, `email`, `address`) VALUES
(15, 1, 'Rasel', 'rasel', 'student', '01782985443', 'rasel@gmail.com', 'Mymensingh'),
(16, 2, 'Rafi', 'hares', 'student', '017287654321', 'rafi@gmail.com', 'Khulna'),
(17, 2, 'Sourav', 'paul', 'student', '01728765432', 'sourav@gmail.com', 'Khulna'),
(18, 2, 'Maruf', 'abdullah', 'student', '01675432134', 'maruf@gmail.com', 'Rajshahi'),
(20, 1, 'Abdullah Al', 'Shiam', 'student', '123123123213', 'shiam_cse_ru@yahoo.com', 'Dhaka'),
(21, 1, 'Abdullh Al ', 'Tuhin', 'Employee', '01987654321', 'tuhin@gmail.com', 'Chuadanga'),
(22, 1, 'Shhekhar', 'Debnath', 'student', '01927854634', 'shekhardebnath@gmail.com', 'Khulna'),
(23, 1, 'Golam', 'Mostofa', 'student', '0178654321', 'mostofa@gmail.com', 'Rajshahi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
