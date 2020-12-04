-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 06:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stream`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `item_number` varchar(1000) DEFAULT NULL,
  `item_price` varchar(50) DEFAULT NULL,
  `item_price_currency` varchar(50) DEFAULT NULL,
  `paid_amount` varchar(100) DEFAULT NULL,
  `paid_amount_currency` varchar(50) DEFAULT NULL,
  `txn_id` varchar(1000) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `created` varchar(50) DEFAULT NULL,
  `modified` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `name`, `email`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`, `status`) VALUES
(1, 'shahram awan', 'shahramawan0@gmail.com', '100', '34781296', '10', 'USD', '10', 'usd', 'txn_1HlzDJBGhm1w5wrwJtzV7j40', 'succeeded', '2020-11-10 20:56:56', '2020-11-10 20:56:56', 'Pending'),
(2, 'shahram awan', 'shahramawan0@gmail.com', '100', '80179336', '10', 'USD', '10', 'usd', 'txn_1HlzpeBGhm1w5wrw0xIiYmwB', 'succeeded', '2020-11-10 21:36:33', '2020-11-10 21:36:33', 'Pending'),
(3, 'shahram awan', 'shahramawan0@gmail.com', '1000', '90466460', '100', 'USD', '100', 'usd', 'txn_1HlzseBGhm1w5wrwLrG2bYZ7', 'succeeded', '2020-11-10 21:39:39', '2020-11-10 21:39:39', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

CREATE TABLE `coins` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `coins` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`id`, `email`, `coins`) VALUES
(1, 'shahramawan0@gmail.com', '150'),
(2, 'nishaawan14@gmail.com', '0'),
(3, 'dfg@gmail.com', '0'),
(4, 'ssdas@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `id` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `videoid` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`id`, `email`, `videoid`) VALUES
(1, 'ssdas@gmail.com', '6'),
(2, 'ssdas@gmail.com', '6'),
(3, 'ssdas@gmail.com', '8'),
(4, 'ssdas@gmail.com', '9');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `password`, `date`, `language`, `country`, `type`) VALUES
(4, '55013491', 'shahram awan', 'shahramawan0@gmail.com', '4567', '2020-11-13', 'English', 'American Samoa', 'user'),
(8, '14898789', 'shahram awan', 'fgh@gmail.com', '1234', '2020-11-25', 'English', 'Anguilla', 'user'),
(9, '31079387', 'shahram awan', 'lkj@gmail.com', '1234', '2020-11-25', 'English', 'Anguilla', 'user'),
(10, '44269338', 'shahram awan', 'dfg@gmail.com', '1234', '2020-11-26', 'English', 'Anguilla', 'user'),
(11, '50308587', 'shahram awan', 'ssdas@gmail.com', '1234', '2020-11-24', 'English', 'Anguilla', 'user'),
(12, '3435632', 'shahram', 'abc@gmail.com', '1234', '12/03/1998', 'English', 'Pakistan', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `v_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `thumb` varchar(2000) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `video` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`v_id`, `title`, `thumb`, `category`, `date`, `description`, `video`) VALUES
(6, 'funny', 'domain.PNG', 'Crime', '2020-11-26', 'sdfghnbvcx', 'VID-20200402-WA0005.mp4'),
(7, 'new', 'Capture.PNG', 'Crime', '2020-11-25', 'asdfgjhghnbvcx', 'VID-20200402-WA0005.mp4'),
(8, 'how ', 'Capture.PNG', 'Romance', '2020-11-24', 'asdfghjkmnbvcx', 'VID-20200402-WA0005.mp4'),
(9, 'new latest funny', 'Capture.PNG', 'Horror', '2020-11-24', 'asdfghjnbvcx', 'VID-20200402-WA0005.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
