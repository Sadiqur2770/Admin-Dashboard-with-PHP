-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 01:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hati`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `birthday`, `country`, `gender`, `user_photo`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$SlprJYZ2rya1QA2ZAk.qdOwKseyWmXhudFAQ8uHATi73rnNff44/q', '+8801718323443', '2023-08-29', 'Bangladesh', 'Male', '1.jpeg', 0),
(2, 'Sadiqur Rahamn', 'sadiq@gmail.com', '$2y$10$DuFM7ASBdCtws0eEHsYpm.55BSM6eidXfR689XmQsXVA46fE/wM/O', '+8801718313943', '2023-08-29', 'USA', 'Male', '2.jpg', 0),
(3, 'Sohag', 'sohag@gmail.com', '$2y$10$4/H9Komqzw.qfC967cRGRuDZiiU5gW29ZUdoapD90/x6evwWlkT.O', '+8801718987654', '2023-08-27', 'India', 'Male', '3.jpg', 0),
(4, 'Abul Kalam', 'abul@gmail.com', '$2y$10$F.RUvjh.56rbyKJKA0gK0eKOJk.wYChrB.L5uL9rVbzRkQfb4vvYK', '+8801718787865', '2023-08-31', 'India', 'Male', '4.jpg', 0),
(5, 'Soniya Ali', 'soniya@gmail.com', '$2y$10$c0tjCPNYWJTjFcCCBjq/XOIvRcVaIjapweNjt68FcVTYEwYkXehcG', '+8801718987865', '2023-08-29', 'India', 'Female', '5.jpg', 0),
(6, 'Sumi Akter', 'sumi@gmail.com', '$2y$10$HehBQhLu.xqaiIbW9P5iq.zikbdsJFoTCV.LDMOH9bch.4oFJRRl2', '+8801718318789', '2023-08-30', 'Bangladesh', 'Female', '6.jpg', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
