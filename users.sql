-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 03, 2024 at 11:00 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$B1iCM67ZG5nNc9WtE0fybujQ69KGSOz3JhcQye8Rnl70Ib3pEj1fG'),
(2, 'saja', '$2y$10$7MjvUe/oLuybUQRos8fuZ.WwUr6liAyO3nfdDUXrKY83L/TQBk6Ry'),
(3, 'saja2', '$2y$10$F9boA03eDE4RlOEHBHtUMeuyp0dSMXrhmhUOJ7WN5zEoOl6MP/V1i'),
(4, 'eyad', '$2y$10$tBUbwayqIXyuP6SK1suOVu7jOFhURMts07VXVJ.6uBCiuf7W9LPI6'),
(5, '', '$2y$10$.VDr.rkWW6IZoo66mvqX9Oc59.AC3n180Xq7sA2e9/Urge774wwWu'),
(6, 'eyad2', '$2y$10$KnM73k2Cz/T2PfpesFebF.N.R1MVnxXnMpNAdBaycSF/RjSOgogeG'),
(7, 'soso', '$2y$10$IS8KAzwoyOTM2.m.8NhQF.q8URR3isdYNQEZaOXJioiFZYKu/rjrG'),
(8, 'ss', '$2y$10$Y9kl.G/dc1ieEs0tEDPuFOTRwAJx46u1OvNDZH7/4.yb1Eb4GZJrC'),
(9, 'sss', '$2y$10$gVq938cd8KwSw7KxOORFJ.db92rc/GRintJsjSpJJYYF/zLLrWnc6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
