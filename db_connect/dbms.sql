-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 08:50 AM
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
(1, 'Admin', 'admin@gmail.com', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `b_id` int(11) NOT NULL,
  `b_img` varchar(255) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`b_id`, `b_img`, `writer_id`, `title`, `content`, `date_time`) VALUES
(1, 'cryptocurrency-trading-guide.png', 1, 'Crypto Trading Guide', 'A cryptocurrency is a digital or virtual currency that uses cryptography to secure and verify transactions and control the creation of new currency units. Because they only exist digitally, cryptocurrencies do not have a physical form like notes or coins.\r\n\r\nUnlike traditional currencies, which are typically issued and governed by a central authority, such as the US Federal Reserve or the European Central Bank, cryptocurrencies are decentralised. This means they operate independently of a central bank and are instead managed by a network of computers around the world.\r\n\r\nThe first cryptocurrency and the largest in terms of market capitalisation is Bitcoin. It was created in 2009 by an individual or group under the pseudonym Satoshi Nakamoto, and since then, thousands of other cryptocurrencies have been developed.\r\n', '2024-05-05 00:30:16'),
(2, 'Learn_Illustration_What_is_a_Crypto_Wallet.png', 3, 'What is cryptocurrency?', 'At its core, cryptocurrency is typically decentralized digital money designed to be used over the internet. Bitcoin, which launched in 2008, was the first cryptocurrency, and it remains by far the biggest, most influential, and best-known. In the decade since, Bitcoin and other cryptocurrencies like Ethereum have grown as digital alternatives to money issued by governments.\r\n\r\nThe most popular cryptocurrencies, by market capitalization, are Bitcoin, Ethereum, Tether and Solana. Other well-known cryptocurrencies include Tezos, EOS, and ZCash. Some are similar to Bitcoin. Others are based on different technologies, or have new features that allow them to do more than transfer value.\r\n\r\nCrypto makes it possible to transfer value online without the need for a middleman like a bank or payment processor, allowing value to transfer globally, near-instantly, 24/7, for low fees.\r\n\r\nCryptocurrencies are usually not issued or controlled by any government or other central authority. They’re managed by peer-to-peer networks of computers running free, open-source software. Generally, anyone who wants to participate is able to.\r\n\r\nIf a bank or government isn’t involved, how is crypto secure? It’s secure because all transactions are vetted by a technology called a blockchain.\r\n\r\nA cryptocurrency blockchain is similar to a bank’s balance sheet or ledger. Each currency has its own blockchain, which is an ongoing, constantly re-verified record of every single transaction ever made using that currency.\r\n\r\nUnlike a bank’s ledger, a crypto blockchain is distributed across participants of the digital currency’s entire network\r\n\r\nNo company, country, or third party is in control of it; and anyone can participate. A blockchain is a breakthrough technology only recently made possible through decades of computer science and mathematical innovations.', '2024-05-04 08:30:16'),
(3, 'trade2z.png', 3, ' Unleashing the Potential of Crypto Trading: Trade2z', 'In the dynamic world of cryptocurrency, where volatility reigns supreme and fortunes are made and lost in the blink of an eye, having the right platform can make all the difference. That\'s where Trade2z comes in – a revolutionary cryptocurrency trading website designed to empower traders of all levels with cutting-edge features and a vibrant community.\r\n\r\nThe Expert Seminar Sessions: A Gateway to Knowledge\r\nAt Trade2z, we understand that knowledge is power in the crypto sphere. That\'s why we offer expert seminar sessions conducted by seasoned professionals in the field. These sessions delve deep into the intricacies of cryptocurrency trading, covering everything from technical analysis and market trends to risk management strategies. Whether you\'re a novice looking to learn the ropes or a seasoned trader seeking to refine your skills, our expert seminars provide invaluable insights to help you navigate the crypto markets with confidence.\r\n\r\nConnect and Collaborate with Fellow Traders\r\nTrading can often feel like a solitary pursuit, but it doesn\'t have to be. With Trade2z\'s intuitive chat feature, you can connect with fellow traders from around the globe in real-time. Share insights, discuss market trends, and collaborate on trading strategies – all within a supportive and engaging community. Whether you\'re looking for a quick chat or a deep dive into market analysis, our chat feature provides the perfect platform to connect with like-minded individuals and expand your trading network.\r\n\r\nDive into Engaging and Informative Blogs\r\nIn addition to expert seminars and real-time chat, Trade2z offers a treasure trove of written content to educate and inspire traders. Our blog section features articles penned by industry experts, covering a wide range of topics including market analysis, trading tips, and cryptocurrency news. Whether you\'re looking for in-depth analysis of the latest market developments or practical advice to enhance your trading skills, our blog content has you covered. Stay informed, stay inspired, and stay ahead of the curve with Trade2z.\r\n\r\nElevating Your Trading Experience\r\nAt Trade2z, we\'re committed to providing traders with the tools and resources they need to thrive in the fast-paced world of cryptocurrency trading. From expert seminars and real-time chat to engaging blog content, our platform is designed to empower traders of all levels with the knowledge and support they need to succeed. Join us on Trade2z and unlock the full potential of your crypto trading journey.', '2024-05-13 01:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `to_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `id`, `msg`, `to_id`, `date_time`) VALUES
(22, 3, 'hy', 1, '2024-05-04 16:03:08'),
(25, 3, 'hy', 1, '2024-05-04 16:03:08'),
(26, 3, 'hmm', 1, '2024-05-04 16:16:54'),
(27, 1, 'hhhm', 3, '2024-05-04 16:21:07'),
(41, 3, 'hello', 1, '2024-05-05 03:46:10'),
(51, 3, 'hh', 1, '2024-05-05 06:09:47'),
(52, 3, 'hey there\r\n', 1, '2024-06-03 03:28:50'),
(53, 3, 'helllo', 1, '2024-06-03 04:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `crypto_info`
--

CREATE TABLE `crypto_info` (
  `c_id` int(11) NOT NULL,
  `c_img` varchar(255) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_price` varchar(30) NOT NULL,
  `graph` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crypto_info`
--

INSERT INTO `crypto_info` (`c_id`, `c_img`, `c_name`, `c_price`, `graph`) VALUES
(1, 'bitcoin.jpg', 'bitcoin', '1575', 'up'),
(2, 'ethereum.png', 'ethereum', '700', 'up'),
(3, 'Tether.png', 'tether', '450', 'up'),
(4, 'bnb.jpg', 'BNB', '500', 'down'),
(5, 'Solana.jpg', 'Solana', '350', 'up'),
(6, 'xrp.png', 'XRP', '300', 'down'),
(7, 'cardano.png', 'Cardano', '800', 'up'),
(8, 'Avalanche.jpg', 'Avalanche', '600', 'down');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `exp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `n_blog` int(11) NOT NULL,
  `n_session` int(11) NOT NULL,
  `exp_payment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`exp_id`, `user_id`, `n_blog`, `n_session`, `exp_payment`) VALUES
(1, 1, 0, 1, '60'),
(2, 2, 0, 2, '70'),
(3, 4, 0, 1, '80');

-- --------------------------------------------------------

--
-- Table structure for table `expert_sessions`
--

CREATE TABLE `expert_sessions` (
  `s_id` int(11) NOT NULL,
  `exp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `s_topic` varchar(255) NOT NULL,
  `s_hour` int(11) NOT NULL,
  `s_description` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expert_sessions`
--

INSERT INTO `expert_sessions` (`s_id`, `exp_id`, `user_id`, `date_time`, `s_topic`, `s_hour`, `s_description`, `status`) VALUES
(25, 1, 3, '2024-06-04 01:40:00', ' df', 1, 'dfdfd', 'pending'),
(26, 2, 3, '2024-05-15 02:05:00', ' hntg', 2, 'ffffg', 'pending'),
(27, 2, 3, '2024-05-22 21:59:00', ' coin', 2, 'sdfsd', 'pending'),
(28, 3, 3, '2024-06-27 10:10:00', ' adad', 1, 'sdsd', 'pending');

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
(1, 'cryptocurrency-design-template-landing-page_23-2149112834.jpg', 'Introduction to Trade2Z', 1, '2024-05-01 06:28:08', 'https://meet.google.com/'),
(2, 'learning-crypto-trading-banner-template_23-2149098010.jpg', 'How to Trade Crypto', 2, '2024-05-16 06:27:39', 'https://meet.google.com/'),
(5, 'cryptocurrency-banner-design-template_23-2149121479.jpg', 'Learn Crypto Currency', 2, '2024-05-17 09:11:06', 'https://meet.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `trade_transection`
--

CREATE TABLE `trade_transection` (
  `t_sl` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `buy_sell` varchar(50) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `crypto_name` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `profit` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trade_transection`
--

INSERT INTO `trade_transection` (`t_sl`, `user_id`, `buy_sell`, `c_id`, `crypto_name`, `price`, `profit`, `date_time`) VALUES
(129, 2, 'buy', 1, 'bitcoin', '500', '4400.0000', '2024-06-02 09:36:43'),
(130, 2, 'sell', 1, 'bitcoin', '500', '4900.0000', '2024-06-02 09:37:03'),
(131, 2, 'buy', 3, 'tether', '300', '4600.0000', '2024-06-02 09:37:17'),
(132, 2, 'buy', 2, 'ethereum', '700', '3900.0000', '2024-06-02 09:37:33'),
(133, 2, 'buy', 1, 'bitcoin', '500', '3400.0000', '2024-06-02 09:37:48'),
(134, 2, 'buy', 1, 'bitcoin', '500', '2900.0000', '2024-06-02 09:37:51'),
(135, 3, 'buy', 1, 'bitcoin', '500', '100.0000', '2024-06-02 09:39:44'),
(136, 3, 'buy', 3, 'tether', '300', '-200.0000', '2024-06-02 09:39:47'),
(137, 3, 'buy', 3, 'tether', '300', '-500.0000', '2024-06-02 09:39:50'),
(138, 3, 'buy', 2, 'ethereum', '700', '-1200.0000', '2024-06-02 09:39:54'),
(139, 3, 'sell', 3, 'tether', '300', '-900.0000', '2024-06-02 09:40:34'),
(140, 1, 'buy', 3, 'tether', '450', '1450.0000', '2024-06-02 23:55:32'),
(141, 1, 'buy', 6, 'XRP', '300', '1150.0000', '2024-06-02 23:55:42'),
(142, 2, 'buy', 5, 'Solana', '350', '2550.0000', '2024-06-02 23:56:11'),
(143, 2, 'buy', 2, 'ethereum', '700', '1850.0000', '2024-06-02 23:56:14'),
(144, 2, 'sell', 5, 'Solana', '350', '2200.0000', '2024-06-02 23:56:20'),
(145, 4, 'buy', 6, 'XRP', '300', '5700.0000', '2024-06-02 23:57:18'),
(146, 4, 'buy', 3, 'tether', '450', '5250.0000', '2024-06-02 23:57:34'),
(147, 4, 'buy', 5, 'Solana', '350', '4900.0000', '2024-06-02 23:57:37'),
(148, 4, 'buy', 7, 'Cardano', '800', '4100.0000', '2024-06-02 23:57:46'),
(149, 4, 'sell', 7, 'Cardano', '800', '4900.0000', '2024-06-02 23:57:49'),
(150, 5, 'buy', 3, 'tether', '450', '4550.0000', '2024-06-02 23:58:15'),
(151, 5, 'buy', 2, 'ethereum', '700', '3850.0000', '2024-06-02 23:58:17'),
(152, 5, 'sell', 2, 'ethereum', '700', '4550.0000', '2024-06-02 23:58:20'),
(153, 5, 'buy', 3, 'tether', '450', '4100.0000', '2024-06-02 23:58:25'),
(154, 6, 'buy', 5, 'Solana', '350', '5650.0000', '2024-06-02 23:58:52'),
(155, 6, 'buy', 7, 'Cardano', '800', '4850.0000', '2024-06-02 23:58:54'),
(156, 6, 'buy', 1, 'bitcoin', '1500', '3350.0000', '2024-06-02 23:58:57'),
(157, 6, 'sell', 7, 'Cardano', '800', '4150.0000', '2024-06-02 23:58:59'),
(158, 7, 'buy', 1, 'bitcoin', '1500', '3500.0000', '2024-06-02 23:59:21'),
(159, 7, 'buy', 7, 'Cardano', '800', '2700.0000', '2024-06-02 23:59:25'),
(160, 7, 'sell', 7, 'Cardano', '800', '3500.0000', '2024-06-02 23:59:27'),
(161, 7, 'buy', 5, 'Solana', '350', '3150.0000', '2024-06-02 23:59:33'),
(162, 7, 'buy', 6, 'XRP', '300', '2850.0000', '2024-06-02 23:59:41'),
(163, 7, 'buy', 4, 'BNB', '500', '2350.0000', '2024-06-02 23:59:44'),
(164, 7, 'buy', 3, 'tether', '450', '1900.0000', '2024-06-02 23:59:48'),
(165, 7, 'sell', 3, 'tether', '450', '2350.0000', '2024-06-02 23:59:51'),
(166, 9, 'buy', 6, 'XRP', '300', '4700.0000', '2024-06-03 00:00:12'),
(167, 9, 'buy', 2, 'ethereum', '700', '4000.0000', '2024-06-03 00:00:14'),
(168, 9, 'buy', 4, 'BNB', '500', '3500.0000', '2024-06-03 00:00:17'),
(169, 9, 'sell', 4, 'BNB', '500', '4000.0000', '2024-06-03 00:00:20'),
(170, 10, 'buy', 3, 'tether', '450', '4550.0000', '2024-06-03 00:01:00'),
(171, 10, 'buy', 6, 'XRP', '300', '4250.0000', '2024-06-03 00:01:02'),
(172, 10, 'buy', 7, 'Cardano', '800', '3450.0000', '2024-06-03 00:01:05'),
(173, 10, 'buy', 8, 'Avalanche', '600', '2850.0000', '2024-06-03 00:01:07'),
(174, 10, 'buy', 4, 'BNB', '500', '2350.0000', '2024-06-03 00:01:12'),
(175, 10, 'sell', 4, 'BNB', '500', '2850.0000', '2024-06-03 00:01:16'),
(176, 10, 'buy', 1, 'bitcoin', '1500', '1350.0000', '2024-06-03 00:01:26'),
(177, 10, 'buy', 5, 'Solana', '350', '1000.0000', '2024-06-03 00:01:29'),
(178, 10, 'buy', 2, 'ethereum', '700', '300.0000', '2024-06-03 00:01:32'),
(179, 10, 'buy', 7, 'Cardano', '800', '-500.0000', '2024-06-03 00:01:34'),
(180, 10, 'sell', 7, 'Cardano', '800', '300.0000', '2024-06-03 00:01:36'),
(181, 12, 'sell', 3, 'Tether', '600', '787', '2024-06-03 00:04:54'),
(182, 13, 'buy', 6, 'xrp', '500', '300', '2024-06-03 00:04:54'),
(183, 14, 'sell', NULL, 'Tether', '800', '800', '2024-06-03 00:05:58'),
(184, 15, 'buy', 3, 'Tether', '500', '700', '2024-06-03 00:05:58'),
(185, 16, 'sell', 3, 'Tether', '800', '800', '2024-06-03 00:06:20'),
(186, 17, 'buy', 3, 'Tether', '500', '700', '2024-06-03 00:06:20'),
(187, 18, 'buy', 1, 'bitcoin', '1200', '8000', '2024-06-03 00:07:20'),
(188, 18, 'buy', 2, 'ethereum', '900', '1700', '2024-06-03 00:07:20'),
(189, 3, 'buy', 1, 'bitcoin', '1500', '-2400.0000', '2024-06-03 00:08:53');

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
(1, 'Mostafiz.jpg', 'Emon', 'mostafizur@gmail.com', 'Emon007', 'Italy', 'Europe'),
(2, 'mashrafi.jpg', 'Mosaddik Mashrafi', 'mosaddikmashrafi10@gmail.com', 'myPass1234', 'France', 'Europe'),
(3, 'lee.jpeg', 'Lee', 'lee@gmail.com', 'mrLee007', 'China', 'Asia'),
(4, 'sakhawat.jpeg', 'Sakhawat Hossain', 'mdsakhawathossain17@gmail.com', 'Sakhawat123', 'Bangladesh', 'Asia'),
(5, 'johnsmitm.jpeg', 'John Smith', 'john.smith@gmail.com', 'Bcd00000', 'France', 'Europe'),
(6, 'Emma.png', 'Emma', 'emma@gmail.com', 'Cde00000', 'Bangladesh', 'Asia'),
(7, 'Henry Clark.png', 'Henry Clark', 'HenryClark@gmail.com', 'Yehoo00000', 'China', 'Asia'),
(8, 'Sophia Lewis.jpeg', 'Sophia Lewis', 'SophiaLewis@gmail.com', 'Pass12345', 'Germany', 'Europe'),
(9, 'Ella Wright.jpg', 'Ella Wright', 'EllaWright@gmail.com', 'Adam007', 'Australia', 'Australia'),
(10, 'Madison Baker.png', 'Madison Baker ', 'MadisonBaker @gmail.com', 'jack007', 'France', 'Europe'),
(11, 'Logan Carter.png', 'Logan Carter', 'Logan Carter@gmail.com', 'boby007', 'Italy', 'Europe'),
(12, 'suit.jpeg', 'Suit', 'suit@gamil.com', '', 'France', 'Europe'),
(13, 'Grace Nelson.jpeg', 'Grace Nelson', 'GraceNelson@gmail.com', '', 'Germany', 'Europe'),
(14, 'Chloe Perez.jpg', 'Chloe Perez', 'ChloePerez@gmail.com', '', 'Italy', 'Europe'),
(15, 'David Edwards.jpg', 'David Edwards', 'Davidedwards@gmail.com', '', 'Australia', 'Australia'),
(16, 'Zoey Morris.jpg', 'Zoey Morris', 'Zoeymorris@gmai.com', '', 'Australia', 'Australia'),
(17, 'Lillian Price.jpg', 'Lillian Price', 'Lillianprice@gmail.com', '', 'Germany', 'Europe'),
(18, 'Sofia Cooper.jpg', 'Sofia Cooper', 'SofiaCooper@gmail.com', '', 'Bangladesh', 'Asia');

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
(1, 1, '10000', '11150.0000', '1150.0000'),
(2, 2, '12000', '14200.0000', '2200.0000'),
(3, 3, '12000', '14000', '2000.0000'),
(4, 4, '12000', '16900.0000', '4900.0000'),
(5, 5, '10000', '14100.0000', '4100.0000'),
(6, 6, '12000', '16150.0000', '4150.0000'),
(7, 7, '10000', '12350.0000', '2350.0000'),
(8, 8, '12000', '18000', '6000'),
(9, 9, '10000', '14000.0000', '4000.0000'),
(10, 10, '10000', '10300.0000', '300.0000'),
(11, 11, '12000', '18000', '6000'),
(12, 12, '5000', '5000', '0'),
(13, 13, '2000', '2220', '220'),
(14, 14, '3200', '4000', '800'),
(15, 15, '1000', '1500', '500'),
(16, 16, '300', '350', '50'),
(17, 17, '1000', '1700', '700'),
(18, 18, '3000', '5000', '2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `FK_userinfo_blogs` (`writer_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `FK_user_id_from` (`id`),
  ADD KEY `FK_user_id_to_` (`to_id`);

--
-- Indexes for table `crypto_info`
--
ALTER TABLE `crypto_info`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `FK_user_id_userinfo` (`user_id`);

--
-- Indexes for table `expert_sessions`
--
ALTER TABLE `expert_sessions`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `FK_expert_expert_session_id` (`exp_id`),
  ADD KEY `FK_userinfo_expert_session_id` (`user_id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `FK_expert_seminar` (`host_id`);

--
-- Indexes for table `trade_transection`
--
ALTER TABLE `trade_transection`
  ADD PRIMARY KEY (`t_sl`),
  ADD KEY `fk_userinfo_trade_transection` (`user_id`),
  ADD KEY `FK_crypto_transecton` (`c_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `crypto_info`
--
ALTER TABLE `crypto_info`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expert_sessions`
--
ALTER TABLE `expert_sessions`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trade_transection`
--
ALTER TABLE `trade_transection`
  MODIFY `t_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `FK_exp_id_expert` FOREIGN KEY (`writer_id`) REFERENCES `expert` (`exp_id`),
  ADD CONSTRAINT `FK_userinfo_blogs` FOREIGN KEY (`writer_id`) REFERENCES `expert` (`exp_id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `FK_user_id_from` FOREIGN KEY (`id`) REFERENCES `userinfo` (`user_id`),
  ADD CONSTRAINT `FK_user_id_to` FOREIGN KEY (`id`) REFERENCES `userinfo` (`user_id`),
  ADD CONSTRAINT `FK_user_id_to_` FOREIGN KEY (`to_id`) REFERENCES `userinfo` (`user_id`);

--
-- Constraints for table `expert`
--
ALTER TABLE `expert`
  ADD CONSTRAINT `FK_user_id_userinfo` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`);

--
-- Constraints for table `expert_sessions`
--
ALTER TABLE `expert_sessions`
  ADD CONSTRAINT `FK_expert_expert_session_id` FOREIGN KEY (`exp_id`) REFERENCES `expert` (`exp_id`),
  ADD CONSTRAINT `FK_userinfo_expert_session_id` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`);

--
-- Constraints for table `seminar`
--
ALTER TABLE `seminar`
  ADD CONSTRAINT `FK_expert_seminar` FOREIGN KEY (`host_id`) REFERENCES `userinfo` (`user_id`),
  ADD CONSTRAINT `FK_userinfo_seminar` FOREIGN KEY (`host_id`) REFERENCES `userinfo` (`user_id`);

--
-- Constraints for table `trade_transection`
--
ALTER TABLE `trade_transection`
  ADD CONSTRAINT `FK_crypto_transecton` FOREIGN KEY (`c_id`) REFERENCES `crypto_info` (`c_id`),
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
