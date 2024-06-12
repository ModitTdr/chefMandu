-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Feb 14, 2024 at 11:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chefmandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Vegetarian'),
(2, 'Non-Vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `cmt`
--

CREATE TABLE `cmt` (
  `comId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cmt`
--

INSERT INTO `cmt` (`comId`, `comment`, `uid`, `rid`, `date`) VALUES
(1, 'asd', 5, 1, '2023-09-27'),
(2, 'nice', 2, 1, '2023-09-26'),
(16, 'easy and simple', 5, 13, '2023-09-28'),
(18, 'ihasd', 5, 1, '2023-09-29'),
(19, 'yumm!', 1, 11, '2023-09-29'),
(20, 'NICE', 1, 1, '2023-10-01'),
(21, 'nice', 1, 10, '2024-01-03'),
(24, 'nice\n', 1, 29, '2024-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `uid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`uid`, `rid`) VALUES
(2, 1),
(5, 1),
(5, 11),
(1, 1),
(1, 11),
(1, 10),
(8, 1),
(5, 10),
(1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `rid` int(11) NOT NULL,
  `rtitle` varchar(100) DEFAULT NULL,
  `ringredients` varchar(255) DEFAULT NULL,
  `rdescription` text DEFAULT NULL,
  `rimg` varchar(150) NOT NULL,
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `infos` text DEFAULT NULL,
  `prep_time_min` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`rid`, `rtitle`, `ringredients`, `rdescription`, `rimg`, `id`, `cate_id`, `infos`, `prep_time_min`) VALUES
(1, 'Burger', 'Buns 1,Lettuce 1,Cheese 2,Meat 200g', 'this explains cooking process', 'burger.jpg', 5, 2, 'elegant burger', 10),
(10, 'chocolate', 'ingredients', 'baking process here', 'salad.jpg', 2, 1, 'Chocolate similar to dairy milk at home within 30minutes', 25),
(11, 'Chicken Chilli', 'ingredients', 'cooking process', 'Easy-Crispy-Chilli-Chicken-Recipe.jpeg', 2, 2, 'Simple and easy to follow Chinese styled chicken chili', 35),
(13, 'Chicken Biryani', 'ingredients for cooking biryani', 'process for cooking', 'veg-biryani-683x1024.jpg', 1, 2, 'Indian and Pakistani fusioned style biryani. Taste from both country in one dish', 40),
(14, 'Corndog', 'ingredients', 'process', 'maxresdefault.jpg', 2, 2, 'Extreme cheesy corndog at home with cheese pull', 30),
(24, 'Burger', 'ingredients', 'process', 'burger.jpg', 1, 1, 'description of food', 30),
(29, 'potato chips', 'potato, salt, water, oil', 'boil potatoes ,cut them in slices, fry ', 'Potato-Chips.jpg', 1, 1, 'it is very good', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `repassword` varchar(100) NOT NULL,
  `role` varchar(6) NOT NULL DEFAULT 'client',
  `JoinedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `repassword`, `role`, `JoinedDate`) VALUES
(1, 'admin@admin.com', 'adminOne', 'admin', 'admin', 'admin', '2023-06-25 11:03:31'),
(2, 'ram@gmail.com', 'ram', 'asdfg', 'asdfg', 'client', '2023-06-25 11:03:31'),
(5, 'modittuladhar@gmail.com', 'modit', 'modit123', 'modit123', 'client', '2023-06-25 23:22:23'),
(7, 'sita@gmail.com', 'sita1', 'sita123', 'sita123', 'client', '2023-09-29 17:00:21'),
(8, 'rojina123@gmail.com', 'rojina', '12345', '12345', 'admin', '2024-01-05 07:45:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmt`
--
ALTER TABLE `cmt`
  ADD PRIMARY KEY (`comId`),
  ADD KEY `userId` (`uid`),
  ADD KEY `recipeId` (`rid`);

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD KEY `uid` (`uid`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `u_id` (`id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmt`
--
ALTER TABLE `cmt`
  MODIFY `comId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cmt`
--
ALTER TABLE `cmt`
  ADD CONSTRAINT `recipeId` FOREIGN KEY (`rid`) REFERENCES `recipes` (`rid`),
  ADD CONSTRAINT `userId` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `fav`
--
ALTER TABLE `fav`
  ADD CONSTRAINT `rid` FOREIGN KEY (`rid`) REFERENCES `recipes` (`rid`),
  ADD CONSTRAINT `uid` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `cate_id` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `u_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
