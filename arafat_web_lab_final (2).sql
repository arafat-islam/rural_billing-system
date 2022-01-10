-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 02:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arafat_web_lab_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `meterId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `total_bill` float NOT NULL DEFAULT 0,
  `demandcharge` int(11) NOT NULL DEFAULT 50,
  `month` varchar(20) NOT NULL,
  `isPaid` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `meterId`, `userId`, `unit`, `total_bill`, `demandcharge`, `month`, `isPaid`) VALUES
(1, 27, 4, 500, 2415, 10, 'January', 1),
(2, 31, 6, 100, 417.5, 50, 'February', 1),
(4, 31, 6, 100, 417.5, 0, 'March', 1),
(5, 32, 15, 500, 0, 0, 'April', 0),
(6, 32, 15, 100, 0, 0, 'May', 0),
(7, 31, 6, 100, 417.5, 0, 'January', 1),
(8, 64, 4, 46435, 356114, 0, 'March', 0),
(9, 31, 16, 234, 0, 0, 'February', 0),
(10, 27, 15, 192, 0, 0, 'October', 0),
(11, 32, 23, 424, 0, 0, 'August', 0),
(12, 63, 6, 700, 3955, 0, 'August', 1),
(13, 27, 6, 100, 0, 0, 'January', 0),
(14, 63, 4, 100, 417.5, 0, 'February', 0),
(15, 63, 4, 1234, 8066.8, 0, 'June', 0),
(16, 27, 31, 100, 417.5, 0, 'February', 1),
(17, 31, 32, 938, 5787.6, 0, 'December', 1),
(18, 64, 30, 100, 417.5, 0, 'January', 0),
(19, 63, 4, 56, 255.8, 50, 'February', 0),
(20, 27, 6, 23, 0, 50, 'March', 0),
(21, 27, 15, 13, 0, 50, 'April\"', 0);

-- --------------------------------------------------------

--
-- Table structure for table `meters`
--

CREATE TABLE `meters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meters`
--

INSERT INTO `meters` (`id`, `name`, `userId`) VALUES
(27, 'METER 01', 4),
(31, 'METER 04', 6),
(32, 'METER 05', 15),
(63, 'null Meter 1', NULL),
(64, 'New Meter 01', NULL),
(65, 'Digital Meter 1', NULL),
(70, 'Digital Meter 2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_applications`
--

CREATE TABLE `new_applications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `district` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `isConfirmed` int(11) NOT NULL DEFAULT 0,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_applications`
--

INSERT INTO `new_applications` (`id`, `name`, `email`, `phone`, `district`, `address`, `isConfirmed`, `applied_at`) VALUES
(1, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '01736246765', 'Barishal', 'fasd', 1, '2022-01-07 17:31:34'),
(2, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '01736246765', 'Barishal', 'fasd', 1, '2022-01-07 17:31:34'),
(3, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '01736246765', 'Barishal', 'fasd', 1, '2022-01-07 19:13:55'),
(4, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '01736246765', 'Barishal', 'fasd', 1, '2022-01-07 19:14:04'),
(5, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '01736246765', 'Barishal', 'fasd', 1, '2022-01-07 19:14:14'),
(6, 'New Connection', 'newconnection@gmail.com', '01736246765', 'Barishal', 'Connection', 0, '2022-01-08 17:59:00'),
(7, 'New User', 'user@gmail.com', '01736246765', 'Barishal', 'test123', 1, '2022-01-08 18:03:53'),
(8, 'Arafat Islam', 'arafat.cse5.bu@gmail.com', '01736246765', 'Barishal', 'Dhaka', 0, '2022-01-09 07:28:39'),
(9, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '01736246765', 'Barishal', 'test123', 0, '2022-01-09 07:28:54'),
(10, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '01736246765', 'Dhaka', 'Dhaka', 0, '2022-01-10 07:15:43'),
(11, 'Connection', 'connection@gmail.com', '01736232423', 'Dhaka', 'Dhaka, Gulisthan', 0, '2022-01-10 07:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `meterId` int(11) DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `userType` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `meterId`, `name`, `email`, `password`, `phone`, `userType`, `address`, `district`) VALUES
(1, 27, 'Arafat Islam', 'arafat.cse5.bu@gmail.com', '0f0a24fb6d926e172d2d2f7a61444560', '01736246765', 1, 'Baligram, Bakerganj, Barishal', 'Barishal'),
(3, 31, 'Biller', 'biller@gmail.com', '202cb962ac59075b964b07152d234b70', '01728552639', 2, 'Dhaka, Gulshan', 'Dhaka'),
(4, 63, 'consumer', 'consumer2@gmail.com', '202cb962ac59075b964b07152d234b70', '01738293848', 3, 'Barishal, Bakerganj', 'Barishal'),
(5, 63, 'Manager', 'manager@gmail.com', '202cb962ac59075b964b07152d234b70', '017382738473', 4, 'Barisal, Baligram', 'Barishal'),
(6, 27, 'New Consumer', 'newconsumer@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'Dhaka, Gulisthan', 'Dhaka'),
(15, 27, 'Valo Consumer', 'valo@gmail.com', '202cb962ac59075b964b07152d234b70', '01728372832', 3, 'Dhaka', 'Barishal'),
(16, 31, 'Hive2021', 'arafat.cse5.bu@gmail.com', '31ed2161a6ed76ecd66b2555dcba8da7', '01736246765', 3, 'fasd', 'Barishal'),
(17, 31, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 0, 'fasd', 'Barishal'),
(18, 27, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'fasd', 'Barishal'),
(19, 27, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'Dhaka', 'Barishal'),
(20, 27, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'fasd', 'Barishal'),
(21, 27, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'fasd', 'Barishal'),
(22, 63, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'fasd', 'Barishal'),
(23, 32, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'Barishal, Bakerganj', 'Barishal'),
(27, 32, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'fasd', 'Barishal'),
(28, 27, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'fasd', 'Barishal'),
(29, 32, 'arafat.cse5.bu@gmail.com', 'arafat.cse5.bu@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'fasd', 'Barishal'),
(30, 64, 'Consuer ', 'consumer@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'Dhaka', 'Baligram'),
(31, 64, 'New User', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', '01736246765', 3, 'test123', 'Barishal'),
(32, 27, 'kk.shahid66@gmail.com', 'kk.shahid66@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01736246765', 3, 'Barisal, Baligram', 'Baligram');

-- --------------------------------------------------------

--
-- Table structure for table `user_complains`
--

CREATE TABLE `user_complains` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `complaintBy` int(11) NOT NULL,
  `reply` text DEFAULT NULL,
  `complained_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_complains`
--

INSERT INTO `user_complains` (`id`, `name`, `email`, `message`, `complaintBy`, `reply`, `complained_at`) VALUES
(1, 'Arafat', 'arafat.cse5.bu@gmail.com', 'Hello, I\'ve faced a issue, could you please fix it?', 4, 'Thanks for contacting us, we\'ll try to fix your issue asap.', '2022-01-07 00:00:00'),
(2, 'Fadil', 'user@gmail.com', 'I need to repair my electricity line. ', 4, 'Ok Sure.', '2022-01-07 00:00:00'),
(4, 'User', 'user@gmail.com', 'faltu', 15, 'fasdfas', '2022-01-07 00:00:00'),
(5, 'Arafat', 'arafat.cse5.bu@gmail.com', 'fasd', 15, NULL, '2022-01-07 00:00:00'),
(6, 'Arafat', 'arafat.cse5.bu@gmail.com', 'This is a complaints', 15, NULL, '2022-01-07 00:00:00'),
(7, 'User', 'user@gmail.com', 'More questions From me.', 15, 'We will fix your issue asap.', '2022-01-07 00:00:00'),
(8, 'user', 'user@gmail.com', 'Please reply to me.', 15, NULL, '2022-01-07 00:00:00'),
(9, 'user', 'user@gmail.com', 'Check the date.', 15, 'hey, faltu, thanks for your faltu complaints. We\'ll fix your issue soon. Thanks', '2022-01-07 01:38:02'),
(12, 'consumer', 'consumer@gmail.com', 'cosumer', 30, NULL, '2022-01-08 22:33:33'),
(13, 'consumer', 'consumer@gmail.com', 'Hey, I have an issue, could you please fix it?', 30, 'Okay, Let me fix the issue. Thanks for connecting us.', '2022-01-08 22:39:29'),
(14, 'New User', 'user@gmail.com', 'Hey, I am a new user.', 31, NULL, '2022-01-09 00:46:53'),
(15, 'New User', 'user@gmail.com', 'I am user@gmail.com', 31, 'Okay, Thanks for your complain.', '2022-01-09 01:00:08'),
(16, 'kk.shahid66@gmail.com', 'kk.shahid66@gmail.com', 'Okay. ', 32, 'Great.', '2022-01-09 01:08:10'),
(17, 'kk.shahid66@gmail.com', 'kk.shahid66@gmail.com', 'Awesome, It works fine. Thanks.', 32, NULL, '2022-01-09 01:12:51'),
(18, 'Consuer ', 'consumer@gmail.com', 'Thanks for the reply.', 30, NULL, '2022-01-09 13:10:18'),
(19, 'consumer', 'consumer2@gmail.com', 'I\'ve faced a issue.', 4, NULL, '2022-01-10 19:24:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `meterId` (`meterId`);

--
-- Indexes for table `meters`
--
ALTER TABLE `meters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `new_applications`
--
ALTER TABLE `new_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_complains`
--
ALTER TABLE `user_complains`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `meters`
--
ALTER TABLE `meters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `new_applications`
--
ALTER TABLE `new_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_complains`
--
ALTER TABLE `user_complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bill_details_ibfk_2` FOREIGN KEY (`meterId`) REFERENCES `meters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
