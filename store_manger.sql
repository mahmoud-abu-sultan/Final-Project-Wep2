-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 11:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_manger`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `title`, `description`, `token`) VALUES
(8, 'Ahmad Nahal 2', 'ahmad@gmail.com', '123456', 1, 'HR', 'Humen resource and salary s 800', 'eRtGcTxc*NGaAEwNla63DFX[bg1xRwDcAsTkl8R'),
(11, 'Quamar Rocha', 'fenixun@mailinator.com', 'Pa$$w0rd!', 1, 'Dolor dolorem eius d', 'Qui qui non nulla en', NULL),
(12, 'Savannah Strickland', 'xesypiro@mailinator.com', 'Pa$$w0rd!', 1, 'Quo suscipit porro i', 'Amet cumque laudant', NULL),
(13, 'Nayda Goodman', 'budeg@mailinator.com', 'Pa$$w0rd!', 0, 'Ut facere aut in occ', 'Et commodo aut eius ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(13, 'Electronic', 'Electronic devices mobile phones refrigerators'),
(14, 'Games', 'Electronic games and video games PlayStation'),
(15, 'Clothes', 'Summer and winter clothes for all seasons'),
(16, 'Sports', 'Sports devices mobile phones refrigerators'),
(17, 'Gym', 'Gym where you can find all the sports equipment');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `like` tinyint(4) NOT NULL,
  `dislike` tinyint(4) NOT NULL,
  `users_id` int(11) NOT NULL,
  `stor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `like`, `dislike`, `users_id`, `stor_id`) VALUES
(5, 0, 1, 8, 10),
(6, 0, 1, 8, 11),
(7, 1, 0, 8, 12),
(8, 0, 1, 8, 15),
(9, 0, 1, 8, 14),
(10, 0, 1, 8, 13),
(11, 1, 0, 8, 17),
(12, 0, 1, 8, 16),
(13, 0, 1, 8, 18);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `description`, `phone`, `logo`, `category_id`) VALUES
(10, 'KSA Store', 'KSA Store For All Sport Prudacts', '0592146000', 'media/1652470627gradient-indonesian-national-sports-day-illustration_52683-65598.jpg', 16),
(11, 'GAZA electronics', 'Gaza electronics for all electronics devices', '8452301', 'media/1652470751headphones-mouse-orange-background_23-2148182104 (1).jpg', 13),
(12, 'Dahlia Duncan', 'Repellendus Nemo qu', '+1 (895) 343-3696', 'media/1652470816electronic-devices-set-usb-hard-drive-player-web-camera-joystic-computer_1284-44163.webp', 13),
(13, 'Salvador Knight', 'Ut perspiciatis sim', '+1 (363) 755-1693', 'media/1652470847home-security-isometric-card-set_1284-9878.webp', 13),
(14, 'Hannah Burton', 'Est voluptas sed nat', '+1 (618) 843-4897', 'media/1652470853security-camera-icon_1284-4747.webp', 13),
(15, 'Amir Bishop', 'Ea nihil ea magna ve', '+1 (915) 158-4783', 'media/1652471017full-shot-man-training-gym_23-2149307712.jpg', 17),
(16, 'Alma Holman', 'Facere aut nihil ali', '+1 (272) 976-7019', 'media/1652471026full-shot-man-training-with-kettlebells-gym_23-2149307709.webp', 17),
(17, 'Hu Avery', 'Error laboris eos vo', '+1 (578) 838-8374', 'media/1652470957gradient-indonesian-national-sports-day-illustration_52683-65598.jpg', 17),
(18, 'Cade Floyd', 'Aliquid tempore neq', '+1 (355) 547-3236', 'media/1652470974training-gym-concept-with-kettlebells_23-2149307767.jpg', 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`) VALUES
(1, 'Ahmad', 'Ahmad@ahmad.com', '234567', 'eRt4gG6iNXVUWx/DThq[nb8K3L*VUQlxfsTkl8R'),
(2, 'Omer', 'Omer@agm.com3456789', '345678', NULL),
(7, 'Dora', 'dora@name.com', '123456', 'eRtw8rB4CwS28bvUhaVl[gwVxZurAaRNDsTkl8R'),
(8, 'ahmad', 'ahmad1@gmail.com', '123456', 'eRt[8hhh/oUSv3GXDrNBXh6CcYgwTMY[OsTkl8R');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rating_users1_idx` (`users_id`),
  ADD KEY `fk_rating_stor1_idx` (`stor_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stor_category_idx` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_rating_stor1` FOREIGN KEY (`stor_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rating_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `fk_stor_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
