-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 01:47 AM
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
-- Database: `e-commercce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `ID` int(4) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`ID`, `name`, `description`, `created-at`, `updated_at`) VALUES
(13, 'CARDIO', 'products for cardio', '2024-06-05 22:09:55', '2024-06-06 19:58:55'),
(14, 'STRENGTH', 'For STRENGTH', '2024-06-05 22:10:17', '2024-06-06 19:58:31'),
(15, 'YOGA', 'products for yoga', '2024-06-06 21:59:19', NULL),
(16, 'FLOORING', 'gym accsesours for floor\r\n', '2024-06-06 22:01:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(4) NOT NULL,
  `productname` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `category_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `productname`, `description`, `price`, `category_id`, `user_id`, `created_at`, `updated_at`, `image`) VALUES
(28, 'Squat Rack Bundle', 'make some squat and make your ass bigger', 100, 14, 1, '2024-06-05 22:08:06', '2024-06-07 00:06:09', 'img/rw1000_model_folded_onyx_900_610x_crop_center.webp'),
(29, 'Power Cage Bundle', 'this bundle makes you feel beter', 600, 14, 0, '2024-06-05 22:08:36', '2024-06-07 00:05:31', 'img/Lifespan-tr2000i-folding-treadmill-console_900_900x900_crop_center-600x600.webp'),
(30, ' Heavy Duty Power Cage Bundle', ' Heavy Duty Power Cage Bundle for increase your muscle ', 500, 14, 0, '2024-06-06 20:48:23', '2024-06-07 00:04:35', 'img/LifeSpan-TR5500i-Folded-Treadmill_900x900_crop_center.webp\r\n'),
(31, 'Olympic Rubber Bumper Plates', 'just good for your healt', 50, 14, 0, '2024-06-06 22:07:13', NULL, 'img/370176105_6752939931436935_3969612717734008636_n.webp\r\n'),
(32, 'Ultimate Commercial Weight Bench', 'for your fat back ', 145, 14, 0, '2024-06-06 22:08:19', NULL, 'img/IMG_0616.webp\r\n'),
(33, 'Heavy-Duty Rubber Crossfit Stall Mats ½” (4’ x 6’) Rated 5.00 out of 5', 'feel better  on floar', 100, 16, 0, '2024-06-06 22:09:10', NULL, 'img/IMG_8569.webp\r\n'),
(34, 'Armour Rubber Interlocking 8mm Tiles (6-Pack)', 'better quality', 150, 16, 0, '2024-06-06 22:09:33', NULL, 'img/B30.webp\r\n'),
(35, 'Rubber Impact 1-Inch Tiles (6-Pack)', 'only one inch', 50, 16, 0, '2024-06-06 22:09:58', NULL, 'img/Copy-of-Purple-and-Beige-Bright-Punchy-Headphones-Electronics-Product-Images-1-1.webp'),
(36, 'GymShop Extra Thick Yoga Mat Red', ' for your yoga', 150, 15, 0, '2024-06-06 22:10:41', NULL, 'img/images.jpg'),
(37, 'SP1000 Stretch Partner Pro', 'partner pro', 1500, 15, 0, '2024-06-06 22:11:15', NULL, 'img/1-3.webp\r\n'),
(38, 'GymShop Suspension Fitness Trainer', 'trainer', 150, 15, 0, '2024-06-06 22:11:42', NULL, 'img/IMG_4911.webp\r\n'),
(39, 'C5i Upright Bike', 'bike in home', 1500, 13, 0, '2024-06-06 22:12:48', NULL, 'img/Adjustable-Dumbbells-1.webp'),
(40, 'Lifespan TR2000i Folding Treadmill', 'floding treadmil', 2000, 13, 0, '2024-06-06 22:13:12', NULL, 'img/IMG_9217.webp'),
(41, 'Lifespan TR4000I Folding Treadmill', 'folding treatmill 2', 2002, 13, 0, '2024-06-06 22:13:39', NULL, 'img/45LB-Bumper-Plate.webp'),
(42, 'GymShop 50FT Battle Ropes (1″ Handles)', 'just do it ', 150, 13, 0, '2024-06-06 22:14:08', NULL, 'img/L101-Side.webp\r\n'),
(43, ' Flywheel Inertia Resistance Trainer', 'best trainer', 1200, 13, 0, '2024-06-06 22:14:40', NULL, 'img/IMG_0228.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(254) NOT NULL,
  `last_login` datetime NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `last_login`, `role`) VALUES
(67, 'Irakli ', '123456', 'irkali@gmail.com', '0000-00-00 00:00:00', 'admin'),
(74, 'nikoloz', '123456', 'nikanika11@gmail.com', '0000-00-00 00:00:00', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `ID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
