-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 04:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `product_id` bigint(50) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_category` varchar(50) NOT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`product_id`, `product_name`, `product_category`, `price`) VALUES
(1, 'Fries', 'Snacks', 20),
(2, 'Coke', 'Drinks', 10),
(3, 'Pizza', 'Snack', 100),
(4, 'Burger', 'snacks', 40);

-- --------------------------------------------------------

--
-- Table structure for table `orderparticulars`
--

CREATE TABLE `orderparticulars` (
  `sr.no` int(11) NOT NULL,
  `product-id` bigint(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `orderID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderparticulars`
--

INSERT INTO `orderparticulars` (`sr.no`, `product-id`, `quantity`, `amount`, `orderID`) VALUES
(74, 1, 1, 20, '3812'),
(75, 1, 1, 20, '3812'),
(76, 1, 1, 20, '3916'),
(77, 3, 1, 100, '3916'),
(78, 2, 1, 10, '3916'),
(79, 2, 1, 10, '3916'),
(80, 4, 1, 40, '3916'),
(81, 1, 1, 20, '3916'),
(82, 2, 1, 10, '3916'),
(83, 3, 1, 100, '3916'),
(84, 3, 1, 100, '3916'),
(85, 4, 1, 40, '3916'),
(86, 1, 1, 20, '3916'),
(87, 3, 1, 100, '3916'),
(88, 2, 1, 10, '3916'),
(89, 2, 1, 10, '3916'),
(90, 3, 1, 100, '3916'),
(91, 2, 1, 10, '3916'),
(92, 3, 1, 100, '3916'),
(93, 1, 1, 20, '5057'),
(94, 3, 1, 100, '1337'),
(95, 3, 1, 100, '8434'),
(96, 3, 1, 100, '3963'),
(97, 3, 1, 100, '233'),
(98, 3, 1, 100, '3706'),
(99, 2, 1, 10, '8187'),
(100, 2, 1, 10, '8187'),
(101, 2, 1, 10, '8187'),
(102, 2, 1, 10, '8187'),
(103, 2, 1, 10, '8187'),
(104, 2, 1, 10, '8187'),
(105, 2, 1, 10, '8187'),
(106, 2, 1, 10, '8187'),
(107, 1, 1, 20, '4974'),
(108, 3, 1, 100, '4974'),
(109, 4, 1, 40, '4974'),
(110, 1, 1, 20, '4974'),
(111, 2, 1, 10, '6398');

-- --------------------------------------------------------

--
-- Table structure for table `table-orders`
--

CREATE TABLE `table-orders` (
  `OrderNumber` varchar(50) NOT NULL,
  `TableNumber` int(50) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `OccupiedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `NoOfGuests` int(50) NOT NULL,
  `TotalBill` decimal(50,0) DEFAULT NULL,
  `PaymentStatus` varchar(50) NOT NULL DEFAULT 'unpaid',
  `RelievedAt` timestamp NULL DEFAULT NULL,
  `tableVacant` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table-orders`
--

INSERT INTO `table-orders` (`OrderNumber`, `TableNumber`, `CustomerName`, `OccupiedAt`, `NoOfGuests`, `TotalBill`, `PaymentStatus`, `RelievedAt`, `tableVacant`) VALUES
('1337', 1, '3', '2022-11-06 15:20:00', 3, '100', 'paid', '2022-11-06 15:20:02', 1),
('233', 4, '4', '2022-11-06 15:20:29', -14, '100', 'paid', '2022-11-06 15:20:31', 1),
('3706', 2, '2x', '2022-11-06 15:27:35', 1, '100', 'paid', '2022-11-06 15:29:11', 1),
('3812', 8, 'q', '2022-11-06 13:30:32', 1, '40', 'paid', '2022-11-06 14:42:14', 1),
('3916', 2, 'a', '2022-11-06 14:52:49', 1, '800', 'paid', '2022-11-06 15:19:48', 1),
('3963', 4, '4', '2022-11-06 15:20:21', 4, '100', 'paid', '2022-11-06 15:20:23', 1),
('4974', 3, 'a', '2022-11-06 15:35:16', 5, '180', 'paid', '2022-11-06 15:46:09', 1),
('5057', 1, '1', '2022-11-06 15:19:51', 1, '20', 'paid', '2022-11-06 15:19:54', 1),
('6398', 2, 'q', '2022-11-06 15:46:14', 1, NULL, 'unpaid', NULL, 0),
('8187', 2, '1', '2022-11-06 15:29:18', 1, '80', 'paid', '2022-11-06 15:35:08', 1),
('8434', 3, 'c', '2022-11-06 15:20:09', 3, '100', 'paid', '2022-11-06 15:20:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `email`, `password`, `Role`) VALUES
(3, 'Waiter1', 'waiter1@mail.com', '202cb962ac59075b964b07152d234b70', 'Waiter'),
(4, 'Admin', 'admin@mail.com', '202cb962ac59075b964b07152d234b70', 'Admin'),
(5, 'Customer', 'customer@mail.com', '202cb962ac59075b964b07152d234b70', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `orderparticulars`
--
ALTER TABLE `orderparticulars`
  ADD PRIMARY KEY (`sr.no`),
  ADD KEY `product-id-foreignKey` (`product-id`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `table-orders`
--
ALTER TABLE `table-orders`
  ADD PRIMARY KEY (`OrderNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `product_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderparticulars`
--
ALTER TABLE `orderparticulars`
  MODIFY `sr.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderparticulars`
--
ALTER TABLE `orderparticulars`
  ADD CONSTRAINT `orderparticulars_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `table-orders` (`OrderNumber`) ON DELETE CASCADE,
  ADD CONSTRAINT `product-id-foreignKey` FOREIGN KEY (`product-id`) REFERENCES `menu` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
