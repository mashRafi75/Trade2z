-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 04:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `Email`, `Password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `crypto_info`
--

CREATE TABLE `crypto_info` (
  `c_id` int(11) NOT NULL,
  `c_img` varchar(255) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crypto_info`
--

INSERT INTO `crypto_info` (`c_id`, `c_img`, `c_name`, `c_price`) VALUES
(1, '', 'bitcoin', '500'),
(2, '', 'ethereum', '700'),
(3, '', 'tether', '300'),
(4, '', 'aass', ''),
(5, '', 'gdstrstrs', ''),
(6, '', 'sfdsf', '345'),
(7, 'bitcoin.png', 'burrrr', '500');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `msg` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `msg`) VALUES
(26, 'and you?'),
(334, 'e3e'),
(2, 'sds'),
(1, 'as'),
(2, 'axa'),
(1, 'no'),
(2, 'zsss'),
(2, 'xs'),
(2, 'xsss'),
(1, 'xsss'),
(1, 'bfbff'),
(1, 'sdsggg'),
(1, 'as'),
(2, 'hi'),
(1, 'hello'),
(3, 'hi i am mr Lee hongKong'),
(3, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `user_id` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_transection`
--

CREATE TABLE `trade_transection` (
  `t_sl` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `buy_sell` varchar(50) NOT NULL,
  `crypto_name` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trade_transection`
--

INSERT INTO `trade_transection` (`t_sl`, `user_id`, `buy_sell`, `crypto_name`, `price`, `date_time`) VALUES
(59, 1, 'buy', 'tether', '300', '2024-04-21 09:11:09'),
(60, 1, 'sell', 'bitcoin', '500', '2024-04-21 09:12:10'),
(61, 1, 'sell', 'ethereum', '700', '2024-04-21 09:12:13'),
(62, 1, 'buy', 'tether', '300', '2024-04-21 09:25:47'),
(63, 1, 'buy', 'tether', '300', '2024-04-21 09:28:20'),
(64, 2, 'sell', 'bitcoin', '500', '2024-04-21 10:03:25'),
(65, 2, 'sell', 'bitcoin', '500', '2024-04-21 10:04:37'),
(66, 1, 'buy', 'bitcoin', '500', '2024-04-21 11:58:36'),
(67, 1, 'sell', 'ethereum', '700', '2024-04-21 11:58:53'),
(68, 1, 'buy', 'bitcoin', '500', '2024-04-21 12:28:02'),
(69, 1, 'sell', 'ethereum', '700', '2024-04-21 12:29:27'),
(70, 1, 'buy', 'ethereum', '700', '2024-04-21 12:59:04'),
(71, 8, 'buy', 'bitcoin', '300', '2024-04-25 19:13:30'),
(72, 8, 'sell', 'bitcoin', '700', '2024-04-25 19:13:30'),
(73, 2, 'buy', 'bitcoin', '100', '2024-04-25 19:13:30'),
(74, 9, 'sell', 'bitcoin', '600', '2024-04-26 13:57:21'),
(75, 6, 'sell', 'bitcoin', '600', '2024-04-26 13:57:21'),
(76, 4, 'sell', 'bitcoin', '400', '2024-04-26 13:58:02'),
(77, 7, 'sell', 'bitcoin', '600', '2024-04-26 13:58:02'),
(78, 4, 'sell', 'bitcoin', '700', '2024-04-26 13:59:24'),
(79, 3, 'sell', 'bitcoin', '1600', '2024-04-26 13:59:24'),
(80, 5, 'sell', 'bitcoin', '700', '2024-04-26 14:01:04'),
(81, 6, 'sell', 'bitcoin', '1600', '2024-04-26 14:01:04'),
(82, 10, 'sell', 'bitcoin', '700', '2024-04-26 14:18:41'),
(83, 11, 'sell', 'bitcoin', '1600', '2024-04-26 14:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `img`, `name`, `email`, `password`, `country`, `region`) VALUES
(1, '', 'Emon', 'abc@d.com', 'Emon007', 'Italy', 'Europe'),
(2, '', 'Mosaddik Mashrafi', 'mosaddikmashrafi10@gmail.com', 'myPass1234', 'France', 'Europe'),
(3, '', 'Lee', 'lee@gmail.com', 'mrLee007', 'China', 'Asia'),
(4, '', 'Abc', 'abc@gmail.com', 'Abc00000', 'Bangladesh', 'Asia'),
(5, '', 'Bcd', 'bcd@gmail.com', 'Bcd00000', 'Bangladesh', 'Asia'),
(6, '', 'Cde', 'cde@gmail.com', 'Cde00000', 'Bangladesh', 'Asia'),
(7, '', 'Ye Ho', 'yeho@gmail.com', 'Yehoo00000', 'China', 'Asia'),
(8, '', 'Sakhawat', 'sakhawat@gmail.com', 'Pass12345', 'Germany', 'Europe'),
(9, '', 'Adam Cole', 'adam@gmail.com', 'Adam007', 'Australia', 'Australia'),
(10, '', 'Jack', 'jack@gmail.com', 'jack007', 'France', 'Europe'),
(11, '', 'boby', 'boby@gmail.com', 'boby007', 'Italy', 'Europe'),
(12, '8dff641a9e6bd12edd79d121b7150476.jpg', '', '', '', '', ''),
(13, 'f124b84035858f36e649fffe88f6dd9f.jpg', 'test', 'test@gmail.com', '', 'BD', 'Asia');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invest` varchar(30) NOT NULL,
  `cur_balance` varchar(30) NOT NULL,
  `profit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `user_id`, `invest`, `cur_balance`, `profit`) VALUES
(1, 1, '10000', '10500.0000', '500.0000'),
(2, 2, '12000', '13000.0000', '1000.0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `crypto_info`
--
ALTER TABLE `crypto_info`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `trade_transection`
--
ALTER TABLE `trade_transection`
  ADD PRIMARY KEY (`t_sl`),
  ADD KEY `fk_userinfo_trade_transection` (`user_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `fk_userinfo_wallet` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crypto_info`
--
ALTER TABLE `crypto_info`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trade_transection`
--
ALTER TABLE `trade_transection`
  MODIFY `t_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trade_transection`
--
ALTER TABLE `trade_transection`
  ADD CONSTRAINT `fk_userinfo_trade_transection` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `fk_userinfo_wallet` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
