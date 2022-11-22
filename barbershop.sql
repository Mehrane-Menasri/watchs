-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 12:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barbershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `facebook` varchar(191) NOT NULL,
  `twitter` varchar(191) NOT NULL,
  `instagram` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `logo` varchar(191) NOT NULL,
  `thank` text DEFAULT NULL,
  `pixel` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `title`, `phone`, `email`, `facebook`, `twitter`, `instagram`, `address`, `logo`, `thank`, `pixel`) VALUES
(1, 'ساعات اصلية ', '0661266637', 'example@gmail.com', 'https://www.facebook.com/profile.php?id=100055225800369', 'https://twitter.com/uBXDxk4qrdE80nO', 'https://www.instagram.com/mehrane_menasri/?hl=fr', 'بوسعادة - المسيلة - 28000', '17639_26854_1288_6.png', 'شكرا لشراء منتجاتنا و زيارة متجرنا', 'jldsfsdjsdmfjsqmdfkjsdqmlkfjsdmlfjsdlkfjsmldkfj lkdj mjfdsmf ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `hairstyle` varchar(255) DEFAULT NULL,
  `res_date` date DEFAULT NULL,
  `res_time` time DEFAULT NULL,
  `res_status` varchar(255) NOT NULL DEFAULT 'pending',
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client`, `email`, `phone`, `location`, `address`, `hairstyle`, `res_date`, `res_time`, `res_status`, `create_at`) VALUES
(1, 'mehrane menasri', 'mehranemen@gmail.com', '0781411509', 'New York', 'M\'sila, Algeria.', 'Haircut', '2022-11-22', '23:00:00', 'pending', '2022-11-21'),
(2, 'mehrane menasri', 'mehranemen@gmail.com', '0781411509', 'New York', 'M\'sila, Algeria.', 'Haircut', '2022-11-22', '23:00:00', 'pending', '2022-11-21'),
(3, 'mehrane menasri', 'mehranemen@gmail.com', '0661266637', 'Houston', '91 Ichbelia', 'Haircut', '2022-11-23', '20:04:00', 'pending', '2022-11-21'),
(6, 'mary ', '', '0781411509', 'Chicago', 'Alex', 'Haircut', '2022-11-25', '12:30:00', 'pending', '2022-11-22'),
(7, 'ahmed', 'admin@gmail.com', '7738793232', 'Chicago', 'chicago', 'Choose City', '2022-11-24', '23:09:00', 'pending', '2022-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `full_name`, `is_admin`, `user_status`) VALUES
(4, 'mahrane menasri', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mehranemen@gmail.com', 'mehrane menasri', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `visit_date`) VALUES
(1, '127.0.0.1', '2022-09-19 21:00:35'),
(2, '::1', '2022-09-19 21:02:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
