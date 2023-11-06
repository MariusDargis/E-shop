-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 06, 2023 at 07:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_number` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_info` varchar(250) DEFAULT 'Preparing...',
  `quantity` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_number`, `item_name`, `item_info`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 10001, 'Stacionarus kompiuteris', 'Stacionarus kompiuteris Acer Nitro 50, Intel Core i5-12400F/GeForce GTX 1660S/512 GB SSD/12 GB RAM/W11H', 5, '2023-10-31 19:03:29', '2023-11-02 09:27:17'),
(13, 10002, 'Nešiojamas kompiuteris', 'Nešiojamas kompiuteris Acer Swift 3 SF314, 14\'\', FHD, i5, 16 GB, 512 GB, ENG', 5, '2023-10-31 21:48:00', '2023-11-02 09:29:46'),
(15, 10003, 'Klaviatūra', 'Klaviatūra Razer BlackWidow V4, Green Switch, mechanical, US, black', 8, '2023-10-31 22:18:09', '2023-11-02 09:34:13'),
(16, 10004, 'Nešiojamas kompiuteris', 'Nešiojamas kompiuteris HP Spectre x360 2-in-1 Laptop 16-f2008no, 16\'\', 3K+, i7, 16 GB, 1 TB, SWE', 3, '2023-11-02 07:30:44', '2023-11-02 09:30:44'),
(17, 10005, 'Monitorius', 'Monitorius Samsung Odyssey G6, 27\'\', 2560x1440, 240 Hz, LED VA, 1000R, 1 ms', 5, '2023-11-02 07:35:32', '2023-11-02 09:35:32'),
(18, 10006, 'Pelė', 'Pelė HyperX Pulsefire Haste 2', 13, '2023-11-02 07:38:08', '2023-11-02 09:38:08'),
(19, 10007, 'Monitorius', 'Monitorius Samsung LC49G95TSSPXEN 49\'\', lenktas, QLED, QHD, 240 Hz', 4, '2023-11-02 07:40:36', '2023-11-02 09:40:36'),
(20, 10008, 'Planšete', 'Planšetinis kompiuteris Samsung Galaxy Tab S7 FE 5G', 3, '2023-11-02 15:31:27', '2023-11-02 17:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2023-10-27 13:08:49', '2023-10-27 16:08:49'),
(2, 'Marko', 'Marko', '2023-10-27 13:08:49', '2023-10-27 16:08:49'),
(4, 'Renata', 'Renata', '2023-10-27 13:19:48', '2023-10-27 16:19:48'),
(8, 'Elenora', 'Elenora', '2023-10-29 21:00:48', '2023-10-29 23:00:48'),
(13, 'Leo', 'Leo', '2023-11-05 15:19:35', '2023-11-05 17:19:35'),
(15, 'Erikas', 'Erikas', '2023-11-05 15:22:52', '2023-11-05 17:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `users_privileges`
--

CREATE TABLE `users_privileges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_user` tinyint(1) DEFAULT 0,
  `delete_user` tinyint(1) DEFAULT 0,
  `create_item` tinyint(1) DEFAULT 0,
  `update_item` tinyint(1) DEFAULT 0,
  `delete_item` tinyint(1) DEFAULT 0,
  `add_pr_user` tinyint(1) DEFAULT 0,
  `update_privileges` tinyint(1) DEFAULT 0,
  `remove_pr_user` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_privileges`
--

INSERT INTO `users_privileges` (`id`, `user_id`, `create_user`, `delete_user`, `create_item`, `update_item`, `delete_item`, `add_pr_user`, `update_privileges`, `remove_pr_user`, `created_at`, `update_at`) VALUES
(1, 2, 1, 1, 1, 1, 1, 1, 1, 1, '2023-10-27 14:43:40', '2023-11-05 22:15:59'),
(2, 4, 0, 0, 1, 1, 1, 0, 0, 0, '2023-10-27 14:45:09', '2023-11-05 22:16:21'),
(16, 8, 0, 0, 1, 1, 0, 0, 0, 0, '2023-11-05 15:18:55', '2023-11-05 22:16:31'),
(20, 15, 1, 0, 0, 0, 0, 1, 0, 0, '2023-11-05 15:24:10', '2023-11-05 22:16:49'),
(21, 13, 1, 1, 1, 0, 0, 0, 1, 0, '2023-11-05 18:39:59', '2023-11-05 22:29:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_number` (`item_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_privileges`
--
ALTER TABLE `users_privileges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_privileges`
--
ALTER TABLE `users_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_privileges`
--
ALTER TABLE `users_privileges`
  ADD CONSTRAINT `users_privileges_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
