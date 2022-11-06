-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 08:17 PM
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
(3, 'Pizza', 'Snack', 100);

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
(1, 3, 1, 10, 'order01');

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
('123', 1, 'Ankia', '2022-11-05 17:11:40', 1, '12', 'unpaid', '2022-11-05 17:11:40', 1),
('23', 2, 'Ankia', '2022-11-05 17:16:45', 1, NULL, 'unpaid', NULL, 0),
('283', 3, 'Ankia', '2022-11-05 18:38:43', 3, NULL, 'unpaid', NULL, 0),
('3', 1, 'Ankia', '2022-11-05 17:15:19', 1, NULL, 'unpaid', NULL, 0),
('order01', 1, 'Ankita', '2022-11-05 10:24:04', 2, '100', 'unpaid', '2022-11-05 10:24:04', 1);

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
  ADD KEY `orderID-ForeignKey` (`orderID`),
  ADD KEY `product-id-foreignKey` (`product-id`);

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
  MODIFY `product_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderparticulars`
--
ALTER TABLE `orderparticulars`
  MODIFY `sr.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `orderID-ForeignKey` FOREIGN KEY (`orderID`) REFERENCES `table-orders` (`OrderNumber`),
  ADD CONSTRAINT `product-id-foreignKey` FOREIGN KEY (`product-id`) REFERENCES `menu` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
