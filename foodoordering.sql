-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 07:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodoordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `password`) VALUES
('vivek123', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `uid` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` int(10) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `rating_c` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`uid`, `name`, `contact`, `uname`, `pass`, `address`, `image`, `rating_c`) VALUES
(8, 'vivek', 2147483647, 'charlie', '12345', 'Kaudiya kotdwara, Uttrakhand', 'AnimeX_1049571.jpeg', 171),
(12, 'nitjn ratolia', 1234567890, 'nitin@gmail.com', '12345', 'Kaudiya kotdwara', 'AnimeX_1046823.jpeg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `f_id` int(150) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `r_id` int(90) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`f_id`, `f_name`, `r_id`, `price`) VALUES
(139, 'golgappa', 80, 40),
(140, 'biryani ', 80, 200),
(141, 'tandoori chicken', 80, 300),
(142, 'veg thali ', 80, 70),
(143, 'non veg thali ', 80, 90),
(144, 'soya chaaap', 80, 200),
(145, 'mutter paneer', 80, 250),
(146, 'shahi paneer', 80, 350),
(147, 'mix veg', 80, 200),
(148, 'chole bhatore', 80, 40),
(149, 'veg thali ', 81, 60),
(151, 'butter naan', 81, 45),
(152, 'non veg thali', 81, 80),
(153, 'butter naan', 81, 30),
(154, 'channa', 81, 40),
(155, 'chaap', 81, 30),
(156, 'lemon chicken', 81, 300),
(157, 'fruit chat', 81, 20),
(158, 'ras malai', 81, 56),
(159, 'burger', 81, 30),
(160, 'aloo tikki', 81, 45),
(161, 'afgani chaap', 81, 150),
(162, 'afgani chicken', 81, 300),
(163, 'veg thali ', 82, 55),
(164, 'non veg thali', 82, 75),
(165, 'mix veg', 82, 25),
(166, 'chaap', 82, 50),
(167, 'lemon chaap', 82, 250),
(168, 'veg burger', 82, 25),
(169, 'tandoori chicken', 82, 300),
(170, 'non veg burger ', 82, 50),
(171, 'veg pakora ', 82, 30),
(172, 'butter chicken', 82, 350),
(173, 'soya chaap ', 82, 350),
(174, 'bread pakora', 82, 50),
(175, 'veg thali ', 83, 60),
(176, 'non veg thali ', 83, 70),
(177, 'mix veg', 83, 45),
(178, 'veg pakora ', 83, 25),
(179, 'lemon chicken', 83, 400),
(180, 'lemon chaap', 83, 250),
(181, 'pizza', 83, 300),
(182, 'mutter paneer', 83, 250),
(183, 'non veg burger ', 83, 35),
(184, 'burger ', 83, 30),
(185, 'channa', 83, 24),
(186, 'maggi', 83, 50),
(187, 'maggi', 82, 25),
(188, 'roll', 82, 50),
(189, 'fruit chat', 82, 40),
(190, 'momos', 82, 20),
(191, 'noodles', 82, 30),
(192, 'veg thali ', 82, 60),
(193, 'non veg thali ', 82, 60),
(194, 'spring roll ', 82, 40),
(195, 'butter naan', 82, 50),
(196, 'veg pakora ', 82, 30),
(197, 'kadai chicken', 82, 350),
(198, 'mutter paneer', 82, 250),
(199, 'shahi paneer', 82, 260),
(200, 'aloo tikki ', 82, 230),
(201, 'aloo tikki', 83, 20),
(202, 'noodles', 83, 240),
(203, 'chaap', 83, 230),
(204, 'mix veg ', 83, 230),
(205, 'tandoori chicken', 83, 400),
(206, 'chole bhatore', 83, 40),
(207, 'ras malai', 83, 30),
(208, 'sanwitch', 83, 25),
(209, 'fruit chat', 83, 30),
(210, 'fried rice', 83, 200),
(211, 'veg biryani', 83, 250),
(212, 'non veg burger ', 83, 230),
(213, 'aloo tikki', 83, 200),
(214, 'mix juice', 83, 25),
(215, 'veg thali ', 84, 200),
(216, 'veg pakora ', 84, 230),
(217, 'veg biryani', 84, 300),
(218, 'veg burger', 84, 30),
(219, 'non veg thali ', 84, 200),
(220, 'non veg burger ', 84, 233),
(221, 'non veg thali', 84, 233),
(222, 'maggi', 84, 40),
(223, 'momos', 84, 39),
(224, 'milk', 84, 30),
(225, 'oreo shake ', 84, 40),
(226, 'veg thali ', 85, 60),
(227, 'veg pakora ', 85, 80),
(228, 'veg biryani', 85, 100),
(229, 'veg burger', 85, 150),
(230, 'non veg thali ', 85, 150),
(231, 'maggi', 85, 50),
(232, 'non veg thali ', 85, 200),
(233, 'non veg burger ', 85, 300),
(234, 'rice ', 85, 100),
(235, 'mix veg', 85, 50),
(236, 'veg thali ', 85, 60),
(237, 'non veg thali ', 85, 60),
(238, 'veg biryani', 85, 30),
(239, 'non veg thali ', 85, 300),
(240, 'soup', 85, 233),
(241, ' lemon juice', 85, 230),
(242, 'veg thali ', 86, 140),
(243, 'veg pakora ', 86, 200),
(244, 'veg burger', 85, 140),
(245, 'non veg thali ', 85, 120),
(246, 'non veg burger ', 85, 120),
(247, 'momos ', 85, 120),
(248, 'non veg thali ', 85, 120),
(249, 'tandoori chicken', 85, 300),
(250, 'lemon chicken', 85, 240),
(251, 'oreo shake ', 85, 120),
(252, 'maagi ', 85, 120),
(253, 'momos ', 85, 120),
(254, 'veg thali ', 87, 65),
(255, 'veg pakora ', 87, 70),
(256, 'veg biryani', 86, 70),
(257, 'veg burger', 87, 55),
(258, 'ras malai', 87, 120),
(259, 'soup ', 87, 50),
(260, 'momos', 87, 120),
(261, 'fried rice', 87, 100),
(262, 'maggi ', 87, 30),
(263, 'non veg thali ', 87, 140),
(264, 'non veg burger ', 87, 200),
(265, 'fried rice ', 87, 150),
(266, 'Vivek', 86, 50),
(267, 'shahi paneer', 85, 80),
(268, 'shahi paneer', 85, 80),
(269, 'shahi paneer', 85, 80),
(270, 'panner', 82, 200),
(271, 'curry', 80, 60),
(272, 'non veg thali ', 87, 50);

-- --------------------------------------------------------

--
-- Table structure for table `order_c`
--

CREATE TABLE `order_c` (
  `o_id` int(60) NOT NULL,
  `uid` int(30) NOT NULL,
  `r_id` int(90) NOT NULL,
  `f_id` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL,
  `t_price` int(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  `date_del` varchar(30) DEFAULT NULL,
  `date_status` varchar(30) NOT NULL,
  `date_del_all` varchar(30) DEFAULT NULL,
  `message` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_c`
--

INSERT INTO `order_c` (`o_id`, `uid`, `r_id`, `f_id`, `status`, `t_price`, `date`, `date_del`, `date_status`, `date_del_all`, `message`) VALUES
(104, 8, 80, ',146,145,143,142,139', 'cancelled', 800, '20-11-19 09:57:08am', NULL, '20-11-19 09:58:15am', NULL, NULL),
(105, 8, 81, ',157,153,151', 'completed', 95, '20-11-19 10:12:14am', '10:44:39am', '20-11-19 10:14:39am', '20-11-19 10:44:39am11', 0),
(106, 12, 80, ',147,146,145,144,143', 'completed', 1090, '08-12-19 07:31:00pm', '12:00:48am', '03-02-20 11:30:48pm', '03-02-20 12:00:48pm02', 1),
(107, 8, 80, ',145,143,142,140', 'completed', 610, '15-12-19 09:22:00pm', '09:52:55pm', '15-12-19 09:22:55pm', '15-12-19 09:52:55p12', 1),
(108, 8, 80, ',140', 'pending', 200, '03-02-20 11:29:52pm', NULL, '03-02-20 11:29:52pm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `r_id` int(90) NOT NULL,
  `r_name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `rating` int(5) NOT NULL,
  `address` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`r_id`, `r_name`, `password`, `description`, `rating`, `address`, `image`, `username`) VALUES
(80, 'RS RASOI', '1234', '\'I cook with wine, sometimes I even add it to the food\'', 5, 'Kaudiya kotdwara, Uttrakhand', '3604916.jpg', 'rsrasoi'),
(81, 'rm kitchen', '12345', 'A fit, healthy body—that is the best fashion statement', 2, 'kharar', '3604916.jpg', 'rmkitchen'),
(82, 'tc rasoi', '12345', 'Let food be thy medicine and medicine be thy food.', 3, 'himachal', 'csm_restaurant-img-02_d666f4932c.jpg', 'tcrasoi'),
(83, 'vr rasoi', '123456', 'Wait. Why am I thinking about Krispy Kremes? We’re supposed to be exercising.', 5, 'Kaudiya kotdwara, Uttrakhand', 'f14747c0d85c4d799bbff95b34dbe526.jpg', 'vrrasoi'),
(84, 'dc dhaba', '123456', 'Wait. Why am I thinking about Krispy Kremes? We’re supposed to be exercising', 2, 'kharar', 'TheWindingStair-Food-4-DaveSweeney.jpg', 'dcdhabba'),
(85, 'katani dhaba', '123456', 'Wait. Why am I thinking about Krispy Kremes? We’re supposed to be exercising', 4, 'kotdwar', 'Restaurant-Cucina-Byblos_Ambiance_Hotel-Byblos-Saint-Tropez-14-1600x1000.jpg', 'katani'),
(86, 'biryani corner', '12345', 'You are what what you eat eats.', 4, 'amritsar', 'Restaurant-Cucina-Byblos_Ambiance_Hotel-Byblos-Saint-Tropez-14-1600x1000.jpg', 'bcorner'),
(87, 'hot fat burger', '123456', 'I am a better person when I have less on my plate', 5, 'kangra', 'Restaurant-22.jpg', 'hfburger');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `foreign key` (`r_id`);

--
-- Indexes for table `order_c`
--
ALTER TABLE `order_c`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `foreign key2` (`uid`),
  ADD KEY `foreign key3` (`r_id`),
  ADD KEY `foreign key4` (`f_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `uid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `f_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `order_c`
--
ALTER TABLE `order_c`
  MODIFY `o_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `r_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`r_id`) REFERENCES `restaurant` (`r_id`);

--
-- Constraints for table `order_c`
--
ALTER TABLE `order_c`
  ADD CONSTRAINT `foreign key2` FOREIGN KEY (`uid`) REFERENCES `customer` (`uid`),
  ADD CONSTRAINT `foreign key3` FOREIGN KEY (`r_id`) REFERENCES `restaurant` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
