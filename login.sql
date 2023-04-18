-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 07:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(319) NOT NULL,
  `phoneNum` varchar(16) NOT NULL,
  `address` varchar(128) NOT NULL,
  `dateAndTime` datetime(6) NOT NULL,
  `description` mediumtext NOT NULL,
  `resolved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `phoneNum`, `address`, `dateAndTime`, `description`, `resolved`) VALUES
(1, 'Jane Doe', 'janedoe@gmail.com', '8566859001', '18 PennyLane, Voorhees, New Jersey', '2023-03-31 15:23:27.000000', 'My shed needs repairs. The door is falling off. ', 0),
(0, 'Brendan V', 'brendanveit@gmail.com', '8566859001', '18 Clearbrook Drive, Gibbsboro, NJ', '2023-04-20 12:08:11.000000', 'My shed fell apart. It needs to be rebuilt :(', 0),
(2, 'Brendan V', 'brendanveit@gmail.com', '8566859001', '18 Clearbrook Drive, Gibbsboro, NJ', '2023-04-20 12:08:11.000000', 'My shed fell apart. It needs to be rebuilt :(', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `address` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `authLevel` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `address`, `password`, `authLevel`) VALUES
(1, 'Jane Doe', 'janedoe@gmail.com', '278-856-4444', 'eee', 'password', 0),
(2, 'Brendan Veit', 'brendanveit@gmail.com', '8566859001', '', 'password', 0),
(6, 'e', 'janedoe@gmail.com', 'e', '', 'password', 0),
(7, 'MT Art Shed Repair', 'mtartsheds@gmail.com', '856-662-7528', '27 Jones Avenue, New Brunswick, New Jersey', 'password', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
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
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
