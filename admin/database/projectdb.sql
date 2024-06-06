-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 09:25 PM
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
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `s_id` int(11) NOT NULL,
  `s_img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `host_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `s_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`s_id`, `s_img`, `title`, `host_id`, `date_time`, `s_link`) VALUES
(4, 'cryptocurrency-design-template-landing-page_23-2149112834.jpg', 'Introduction to Trade2Z', 3, '2024-05-01 19:50:48', 'https://meet.google.com/'),
(12, 'learning-crypto-trading-banner-template_23-2149098010.jpg', 'How to Trade Crypto', 2, '2024-05-16 23:32:00', 'https://meet.google.com/'),
(17, 'cryptocurrency-banner-design-template_23-2149121479.jpg', 'Learn Crypto Currency', 1, '2024-05-17 22:05:00', 'https://meet.google.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk_userinfo_seminar` (`host_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `seminar`
--
ALTER TABLE `seminar`
  ADD CONSTRAINT `fk_expert_seminar` FOREIGN KEY (`host_id`) REFERENCES `expert` (`exp_id`),
  ADD CONSTRAINT `fk_expert_seminar_host` FOREIGN KEY (`host_id`) REFERENCES `expert` (`exp_id`),
  ADD CONSTRAINT `fk_userinfo_seminar` FOREIGN KEY (`host_id`) REFERENCES `userinfo` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
