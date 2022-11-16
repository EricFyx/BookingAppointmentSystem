-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 05:45 AM
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_email`, `feedback`) VALUES
(8, 'a@gmail.com', 'Hi Abdullah'),
(0, 'fooeric55@gmail.com', 'Not sure what to do');

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
('user1@gmail.com', '2022-11-14'),
('user2@gmail.com', '2022-11-16'),
('user1@gmail.com', '2022-11-16'),
('user1@gmail.com', '2022-11-16'),
('user1@gmail.com', '2022-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notiID` int(11) NOT NULL,
  `notiText` text NOT NULL,
  `notiTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notiID`, `notiText`, `notiTitle`) VALUES
(1, 'Please Be Aware, Booking Slot for Has been Updated!!', 'Booking Slot Updated');

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
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointmentID` int(11) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appointmentStartTime` time NOT NULL,
  `appointmentEndTime` time NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `customerEmail` varchar(255) NOT NULL,
  `appointmentCreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointmentID`, `appointmentDate`, `appointmentStartTime`, `appointmentEndTime`, `customerName`, `bookingID`, `customerEmail`, `appointmentCreatedAt`) VALUES
(39, '2022-11-24', '11:39:00', '12:37:00', 'user2', 23, 'user2@gmail.com', '2022-11-15 18:37:04'),
(40, '2022-11-24', '11:39:00', '12:37:00', 'user1', 23, 'user1@gmail.com', '2022-11-15 18:49:41'),
(48, '2022-11-19', '19:50:00', '20:51:00', 'user1', 22, 'user1@gmail.com', '2022-11-15 20:13:32'),
(49, '2022-12-25', '14:33:00', '18:33:00', 'user3', 21, 'fooeric55@gmail.com', '2022-11-16 02:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `bookingID` int(255) NOT NULL,
  `bookingDate` date NOT NULL,
  `bookingStartTime` time NOT NULL,
  `bookingEndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`bookingID`, `bookingDate`, `bookingStartTime`, `bookingEndTime`) VALUES
(20, '2022-11-26', '22:47:00', '23:47:00'),
(21, '2022-12-25', '14:33:00', '18:33:00'),
(22, '2022-11-19', '19:50:00', '20:51:00'),
(23, '2022-11-24', '11:39:00', '12:37:00'),
(24, '2022-11-19', '09:12:00', '11:12:00'),
(25, '2022-11-19', '09:12:00', '11:12:00');

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
  `validation_key` int(11) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `username`, `password`, `cpassword`, `email`, `create_at`, `validation_key`, `contact`, `address`, `state`, `city`, `image`, `otp`) VALUES
(4, 'Abdullah', '$2y$10$qI2A6CRnjVXzS77sb54RI.5qgH2hBB9rD1F4DNJeKx/.M112bzGkq', '$2y$10$WfhatBPKClGxqaEuHVdKLuKn1cuVptplXNSUgqF6BNnd7u51JJWla', 'a@gmail.com', '2022-10-26 10:05:30', 0, '123456789', 'deLOFT', 'Sarawak', 'Kuching', '9275-Abdullah.jfif', 0),
(7, 'admin', '$2y$10$RwGT2N.toosBHmxOXQjiQO8QUgytLfbr1oyMEklNF41bj5/iMl3Vi', '$2y$10$QGEUT8XjICeSHzNoFpR/V.dKnBiHf46XxrfmobqkzV3bTuaCF3c0K', 'admin@gmail.com', '2022-11-07 09:18:09', 0, '', '', '', '', '', 0),
(8, 'user1', '$2y$10$4CQN3pbge55CKf.H11g9CeqWq.gWRIfT6NR/0p2FHK03R9WS3IECq', '$2y$10$1TeHsVx9X7gbRUiJdjHc..cRb9z9YULyrIJixxHCpY6udJbmFpDbG', 'user1@gmail.com', '2022-11-07 09:41:47', 0, '0123456789', 'lorong unta 11, taman southern,', 'sabahh', 'kota kinabalu', '4757-cactus-plant-pot-stand-1599155636.jpg', 0),
(9, 'user2', '$2y$10$JSCc/22kuHd.FxFltY8QhuehsIw5haSudBJGs4qjbr45AhWQA35/i', '$2y$10$uj9vju7Lvg/B7iGnJUkUdua/x3uT35Nyqo.N47A4bEXDAO4PQFrn6', 'user2@gmail.com', '2022-11-15 07:34:21', 0, '', '', '', '', '', 0),
(10, 'user3', '$2y$10$hToKGQzTop7qQP3L55Gc9e3NkGULmg/xeg1EI6R6/xn59Gdtjo7MG', '$2y$10$Lwg4ztyIqKCoy.36X07tz.QVbbizlMIQB4tHWzb13NYol4xwFuMF2', 'user3@gmail.com', '2022-11-15 08:51:38', 0, '', '', '', '', '', 0),
(11, 'user3', '$2y$10$z0Oy5uKEu685aApIKjjPO.Uq7evxrFARY.Bo5AXWCZ9SxwjlXogNu', '$2y$10$z0Oy5uKEu685aApIKjjPO.Uq7evxrFARY.Bo5AXWCZ9SxwjlXogNu', 'fooeric55@gmail.com', '2022-11-16 04:31:29', 0, '', '', '', '', '', 466253);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banneradd_image`
--
ALTER TABLE `banneradd_image`
  ADD PRIMARY KEY (`bannerID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notiID`);

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
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`bookingID`);

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
  MODIFY `bannerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `bookingID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
