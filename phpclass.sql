-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2024 at 05:44 PM
-- Server version: 8.0.34
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Email`, `Password`) VALUES
(1, 'mohsin@gmail.com', '7547'),
(3, 'omer@gmail.com', '4444'),
(9, 'osman@gmail.com', '4444'),
(10, 'shahzaib@gmail.com', '8585'),
(11, 'emaik@gamaul.com', '54545');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(251) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_c;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `title`, `description`) VALUES
(1, 'Feature ', '            tal'),
(2, 'Latest Product', '<p>top trending&nbsp;</p>'),
(13, 'clothes', '<p>fashion&nbsp;</p>'),
(14, 'kh', '<p>bbg&nbsp; &nbsp;</p>'),
(15, 'new', 'new and trending ');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(251) NOT NULL,
  `Subject` text NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `Name`, `Email`, `Subject`, `Message`) VALUES
(6, 'shoaib', 'sh@gmail.com', 'request', '\r\ni m here for getting more information about your web pages . i m here for getting more information about your web pagesi m here for getting more information about your web pages'),
(19, 'omer', 'omer@gmail.com', 'order confirmation', 'i hope this message finds you well. i have not received any confirmation message yet'),
(20, 'talha', 'talha@gmail.com', 'order confirmation', 'i have not received any message yet'),
(21, 'talha', 'talha@gmail.com', 'order confirmation', 'i have not received any message yet');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `std_id` int NOT NULL,
  `std_name` varchar(45) NOT NULL,
  `std_add` varchar(11) NOT NULL,
  `std_ph` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`std_id`, `std_name`, `std_add`, `std_ph`) VALUES
(3, 'thomsn', 'germ', '0310'),
(4, 'er', 'fd', 'dfdfdf'),
(5, 'haider', 'skp', '13111'),
(6, 'mohsn', 'skp', '03154'),
(9, 'talha', 'lhr', '0214'),
(11, 'talha', 'lhr', '0214');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `title` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_quality` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_brand` varchar(100) DEFAULT NULL,
  `product_description` text,
  `product_price` decimal(10,2) NOT NULL,
  `product_stock` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `title`, `product_image`, `product_name`, `product_size`, `product_quality`, `product_brand`, `product_description`, `product_price`, `product_stock`) VALUES
(85, 2, 'Latest Product', '../p_imges/download.jpeg', 'Food Processor', 'Small', 'Steel', 'Gerber Gear', '', 50.00, 44.00),
(86, 1, 'Feature ', '../p_imges/p4.webp', 'knife set', 'Small', 'Steel', 'Gerber Gear', '', 44.00, 25.00),
(88, 1, 'Feature ', '../p_imges/download (1).jpeg', 'chopping set', 'Small', 'Steel', 'Gerber Gear', '', 61.00, 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_ID` int NOT NULL,
  `user_image` varchar(500) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(251) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `user_image`, `Name`, `Email`, `Password`) VALUES
(5, '', 'shoaib', 'shoaibelahi291@gmail.com', 'talha'),
(21, '', 'talha', 'talha@gmail.com', '4545'),
(22, '', 'omer', 'omer@gmail.com', '4444'),
(24, 'imges/IMG-20220610-WA0028.jpg', 'talha', 'talha@gmail.com', '11222'),
(25, 'imges/IMG_20230302_234854_567.jpg', 'saeed ', 'saeed@gmail.com', '766666'),
(26, 'imges/IMG_20220326_083010_268.jpg', 'anas', 'talha@gmail.com', '44444'),
(27, 'imges/FB_IMG_1648797435907.jpg', 'monny', 'emaik@gamaul.com', '47747'),
(38, '../userimges/FB_IMG_1648797435907.jpg', 'monny', 'omer@gmail.com', '7474');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `std_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `U_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
