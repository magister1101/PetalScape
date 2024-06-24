-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 09:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `userName` varchar(124) NOT NULL,
  `password` varchar(124) NOT NULL,
  `firstName` varchar(124) NOT NULL,
  `lastName` varchar(124) NOT NULL,
  `email` varchar(124) NOT NULL,
  `contactNumber` varchar(124) NOT NULL,
  `address` varchar(248) NOT NULL,
  `img` varchar(1024) NOT NULL,
  `isAdmin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `userName`, `password`, `firstName`, `lastName`, `email`, `contactNumber`, `address`, `img`, `isAdmin`) VALUES
(1, 'admin', 'adminpassword', '', '', '', '', '', '', 1),
(2, 'magister', 'markjules123', 'Mark jules', 'Barrantes', 'markjules@yahoo.com', '09065098934', '#3 something street, bacoor city', '', 0),
(11, 'nnet', '12345', 'kenneth', 'doblon', 'kennethdoblon@gmail.com', '0934930490', 'rqeqweqweqw', 'flower-option-icon.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(124) NOT NULL,
  `accountId` int(124) NOT NULL,
  `productId` varchar(124) NOT NULL,
  `quantity` int(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `accountId`, `productId`, `quantity`) VALUES
(20, 0, '22', 1),
(24, 2, '25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(124) NOT NULL,
  `name` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(5, 'No category'),
(18, 'Top Sellers'),
(20, 'New Arrival');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(124) NOT NULL,
  `accountId` int(124) NOT NULL,
  `productId` int(124) NOT NULL,
  `name` varchar(124) NOT NULL,
  `quantity` int(124) NOT NULL,
  `email` varchar(124) NOT NULL,
  `address` varchar(248) NOT NULL,
  `contactNumber` varchar(248) NOT NULL,
  `modeOfPayment` varchar(124) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` int(124) NOT NULL COMMENT '0 for "waiting for payment", 1 for "accepted payment/to be ship", 3 for "out for delivery"',
  `receipt` varchar(1000) NOT NULL COMMENT 'if gcash payment',
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `accountId`, `productId`, `name`, `quantity`, `email`, `address`, `contactNumber`, `modeOfPayment`, `message`, `status`, `receipt`, `orderDate`) VALUES
(8, 11, 22, 'kenneth doblon', 1, 'kenneth@gmail.com', 'pascam 2, sanjose, ph, philippines, 4107', '091221121111', 'cod', 'heh', 3, '', '2024-05-31 20:58:58'),
(9, 2, 27, 'Mark Jules barrantes', 1, 'markjules136@gmail.com', 'new, town, state, philippines, 4102', '09065098934', 'cod', '', 3, '', '2024-06-24 13:18:10'),
(10, 2, 23, 'Mark Jules barrantes', 1, 'markjules136@gmail.com', '24, 242, 24, philippines, 4224', '24', 'gcash', '', 0, 'rec.png', '2024-06-24 15:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(124) NOT NULL,
  `name` varchar(124) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(124) NOT NULL,
  `quantity` int(124) NOT NULL,
  `category` varchar(124) NOT NULL,
  `img` varchar(1024) NOT NULL,
  `archive` int(124) NOT NULL COMMENT '1 means archived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `category`, `img`, `archive`) VALUES
(22, 'Mint and Honey', 'Vibrant green flowers adds elegance and freshness to anyone’s eyes, perfect for brightening up your day.', 1899, 1, 'Top Sellers', 'flower3.png', 0),
(23, 'Lilies Blush', 'A combination of purple and pink lilies that gives off a sweet vibe', 2140, 1, 'Top Sellers', 'flower4.png', 0),
(24, 'Sunset', 'Feel the warm of yellow and orange tulips with sunflower', 865, 1, 'Top Sellers', 'flower6.png', 0),
(25, 'Purple Daisy', 'Enchanting purple daisy radiates grace and charm', 565, 1, 'Top Sellers', 'flower5.png', 0),
(26, 'Poppies', 'Brighten up your indoor spaces with this vibrant poppies', 1890, 1, 'New Arrival', 'flower2.png', 0),
(27, 'Dream Bday', 'Soft pastel hues, a delightful addition to any celebration', 565, 1, 'New Arrival', 'flower8.png', 0),
(28, 'Coquette', 'Whimsy and elegance in one basket', 1880, 1, 'New Arrival', 'flower1.png', 0),
(29, 'Archive Item', 'Arched', 10000, 1, 'Top Sellers', 'rizal-3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(124) NOT NULL,
  `accountId` int(124) NOT NULL,
  `productId` int(124) NOT NULL,
  `comment` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(124) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(124) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(124) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(124) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(124) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
