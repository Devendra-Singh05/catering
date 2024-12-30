-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 06:51 PM
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
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `place` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `select date for booking` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(5) NOT NULL,
  `item` varchar(50) DEFAULT NULL,
  `discription` text DEFAULT NULL,
  `availablity` enum('yes','no') DEFAULT 'yes',
  `category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `picture` varchar(150) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `item`, `discription`, `availablity`, `category`, `created_at`, `updated_at`, `picture`, `price`, `unit`) VALUES
(86, 'shahi paneer\'s', 'This dish is prepared by emulsifying tomatoes, onions, ground cashews, clarified butter and cream into a curry, with the addition of chhena/paneer cubes and a variety of spices. It is mainly eaten with traditional Indian flat-breads like tawa roti or tandoori roti, rice and bread', 'yes', 'maincourse', '2024-12-25 17:02:25', '2024-12-29 15:58:01', '1735146145paneer1.jpeg', 350, 'Plate'),
(87, 'gulab jamun', 'Gulab jamun are soft delicious berry sized balls made with milk solids, flour & a leavening agent. These are soaked in rose flavored sugar syrup & enjoyed. The word “Gulab” translates to rose in Hindi', 'yes', 'maincourse,dessert', '2024-12-25 17:03:44', '2024-12-29 15:57:54', '1735146224gulab jamun.jpeg', 300, 'KG'),
(88, 'samose', 'A small, triangular, cone, or crescent-shaped pastry with a savory filling. Samosas are often made with spiced potatoes, onions, peas, and lentils, but can also include meat or fish. They are characterized by a flaky pastry coating and are often served hot with chutney. ', 'yes', 'fastfood', '2024-12-25 17:19:30', '2024-12-29 15:57:44', '1735147170pexels-marvin-ozz-1297854-2474658.jpg', 15, 'Piece'),
(89, 'gate ki sabji', 'A small, triangular, cone, or crescent-shaped pastry with a savory filling. Samosas are often made with spiced potatoes, onions, peas, and lentils, but can also include meat or fish. They are characterized by a flaky pastry coating and are often served hot with chutney. \r\n\r\n', 'yes', 'starter,maincourse,dessert,fastfood', '2024-12-25 17:26:58', '2024-12-29 15:57:33', '1735147617pexels-tomfisk-1519753.jpg', 400, 'Plate'),
(93, 'paneer buttor masala', 'fadsafcasdf', 'yes', 'maincourse', '2024-12-29 16:18:22', '2024-12-29 16:18:22', '1735489102paneer.jpg', 100, 'KG');

-- --------------------------------------------------------

--
-- Table structure for table `slip`
--

CREATE TABLE `slip` (
  `id` int(5) NOT NULL,
  `customer_id` int(5) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `price_per_unit` float DEFAULT NULL,
  `discount_per_unit` float DEFAULT NULL,
  `after_discount_price_per_unit` float DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'devendra', '4622363efdee629509fd723130a362c6', '2024-12-15 07:14:40', '2024-12-15 09:59:46'),
(2, 'admin', '0192023a7bbd73250516f069df18b500', '2024-12-15 07:15:00', '2024-12-15 10:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slip`
--
ALTER TABLE `slip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `slip`
--
ALTER TABLE `slip`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `slip`
--
ALTER TABLE `slip`
  ADD CONSTRAINT `slip_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
