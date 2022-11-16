-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 07:16 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user-registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `banneradd_image`
--

CREATE TABLE `banneradd_image` (
  `bannerID` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banneradd_image`
--

INSERT INTO `banneradd_image` (`bannerID`, `image`) VALUES
(1, 'cactus-plant-pot-stand-1599155636.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(100) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `time`) VALUES
('user1@gmail.com', '2022-11-13'),
('user1@gmail.com', '2022-11-14'),
('user1@gmail.com', '2022-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `preferance`
--

CREATE TABLE `preferance` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferance`
--

INSERT INTO `preferance` (`id`, `product_name`) VALUES
(1, 'succulent plants');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`id`, `product_name`, `qty`, `date`) VALUES
(1, 'succulent plants', '2', '22-10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `username`, `password`, `cpassword`, `email`, `create_at`, `contact`, `address`, `state`, `city`, `image`) VALUES
(4, 'Abdullah', '$2y$10$qI2A6CRnjVXzS77sb54RI.5qgH2hBB9rD1F4DNJeKx/.M112bzGkq', '$2y$10$WfhatBPKClGxqaEuHVdKLuKn1cuVptplXNSUgqF6BNnd7u51JJWla', 'a@gmail.com', '2022-10-26 10:05:30', '123456789', 'deLOFT', 'Sarawak', 'Kuching', '9275-Abdullah.jfif'),
(7, 'admin', '$2y$10$RwGT2N.toosBHmxOXQjiQO8QUgytLfbr1oyMEklNF41bj5/iMl3Vi', '$2y$10$QGEUT8XjICeSHzNoFpR/V.dKnBiHf46XxrfmobqkzV3bTuaCF3c0K', 'admin@gmail.com', '2022-11-07 09:18:09', '', '', '', '', ''),
(8, 'user1', '$2y$10$4CQN3pbge55CKf.H11g9CeqWq.gWRIfT6NR/0p2FHK03R9WS3IECq', '$2y$10$1TeHsVx9X7gbRUiJdjHc..cRb9z9YULyrIJixxHCpY6udJbmFpDbG', 'user1@gmail.com', '2022-11-07 09:41:47', '0123456789', 'lorong unta 11, taman southern,', 'sabahh', 'kota kinabalu', '4757-cactus-plant-pot-stand-1599155636.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banneradd_image`
--
ALTER TABLE `banneradd_image`
  ADD PRIMARY KEY (`bannerID`);

--
-- Indexes for table `preferance`
--
ALTER TABLE `preferance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banneradd_image`
--
ALTER TABLE `banneradd_image`
  MODIFY `bannerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `preferance`
--
ALTER TABLE `preferance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
