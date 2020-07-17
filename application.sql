-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 01:34 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `education` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `religion` varchar(250) NOT NULL,
  `state` int(11) NOT NULL,
  `date_birth` date NOT NULL,
  `image` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `access_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id`, `access_code`) VALUES
(1, 'FN1234'),
(2, 'FN2456');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='States in Nigeria.';

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
