-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 12:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake`
--

CREATE TABLE `cake` (
  `cake_id` int(11) NOT NULL,
  `cake_name` varchar(50) NOT NULL,
  `cake_img` varchar(30) NOT NULL,
  `cake_price` int(11) NOT NULL,
  `cake_desc` varchar(50) NOT NULL,
  `cake_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`cake_id`, `cake_name`, `cake_img`, `cake_price`, `cake_desc`, `cake_status`) VALUES
(1, 'Chocolate Cake', 'imgChocolate', 800, 'Chocolate cake', 1),
(2, 'White Chocolate', 'imgWhiteChcolate', 700, 'White Chocolate Cake', 1),
(3, 'White Forest Cake', 'imgWhiteForest', 600, 'White Forest Cake', 1),
(4, 'Black Forest Cake', 'imgBlackForest', 650, 'Black Forest Cake', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_sn` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_total` int(11) NOT NULL,
  `item_status` varchar(10) NOT NULL,
  `item_placed` timestamp NULL DEFAULT NULL,
  `item_paid` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_card_no` varchar(10) NOT NULL,
  `user_pin_no` varchar(4) NOT NULL,
  `user_balance` int(7) NOT NULL,
  `user_role` varchar(6) NOT NULL,
  `user_address` varchar(20) NOT NULL,
  `user_city` varchar(10) NOT NULL,
  `user_creation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_first_name`, `user_last_name`, `user_email`, `user_contact`, `user_password`, `user_card_no`, `user_pin_no`, `user_balance`, `user_role`, `user_address`, `user_city`, `user_creation`) VALUES
(999999, 'Administrator', '', '', 'admin@gmail.com', '', '$2y$10$wE2jh6G1x7yQ6Ug8Aeyra.MxVOK2HPD/shWI1A6mrAFVHiGn92A2a', '1222231312', '2311', 1800, 'Admin', '', '', '2024-06-17 10:43:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`cake_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake`
--
ALTER TABLE `cake`
  MODIFY `cake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
