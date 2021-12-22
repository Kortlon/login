-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 12:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `First_Name`, `Last_Name`, `DOB`, `Gender`) VALUES
(1, 'Jones', 'Calloway', '1985-06-29', 'Male'),
(2, 'Albert', 'kaze', '1988-06-06', 'male'),
(3, 'Jackss', 'Malone', '0000-00-00', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `ISBN` bigint(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Publication_Date` date NOT NULL,
  `Price` int(11) NOT NULL,
  `Author_ID` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `ItemNumber` int(11) NOT NULL,
  `supplier_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `ISBN`, `Title`, `Publication_Date`, `Price`, `Author_ID`, `code`, `ItemNumber`, `supplier_ID`) VALUES
(1, 123456789123, 'The Lone Wolf', '1992-05-18', 40, 1, 1, 0, 1),
(9, 798765432198, 'The Lone Wolf', '0000-00-00', 60, 3, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ISBN` bigint(20) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `PPU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `code` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`code`, `category`) VALUES
(1, 'Action & Adventure'),
(2, 'Biography');

-- --------------------------------------------------------

--
-- Table structure for table `contactdetails`
--

CREATE TABLE `contactdetails` (
  `id` int(11) NOT NULL,
  `phonenum` bigint(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `userid` int(11) NOT NULL,
  `authorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactdetails`
--

INSERT INTO `contactdetails` (`id`, `phonenum`, `email`, `address`, `userid`, `authorid`) VALUES
(5, 5456667894, 'some', 'somewhere', 3, 0),
(6, 5456667894, 'some@.com', 'somewhere', 0, 1),
(7, 5456667894, 'some@.com', 'somewhere', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mainsupplier`
--

CREATE TABLE `mainsupplier` (
  `worknumber` int(11) NOT NULL,
  `cellnumber` bigint(20) NOT NULL,
  `Fname` varchar(1000) NOT NULL,
  `Lname` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mainsupplier`
--

INSERT INTO `mainsupplier` (`worknumber`, `cellnumber`, `Fname`, `Lname`, `email`) VALUES
(1, 7875556321, 'Main', 'Corp', 'maincorp@maincorp.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ISBN` bigint(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phonenum` bigint(120) NOT NULL,
  `email` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `value`, `date`, `ISBN`, `qty`, `address`, `phonenum`, `email`) VALUES
(21137, 1, 640, '2021-12-03 02:35:59', 123456789123, 16, '162 longleaf circle', 4697655968, 'erindelaneym@gmail.com'),
(21138, 1, 640, '2021-12-03 02:43:46', 123456789123, 16, '162 longleaf circle', 4697655968, 'erindelayneym@gmail.com'),
(21139, 1, 60, '2021-12-03 02:43:46', 798765432198, 1, '162 longleaf circle', 4697655968, 'erindelayneym@gmail.com'),
(21140, 1, 640, '2021-12-03 02:49:08', 123456789123, 16, '162 longleaf circle', 4697655968, 'erindelayneym@gmail.com'),
(21141, 3, 40, '2021-12-03 16:48:29', 123456789123, 1, 'somehwere', 5456667894, 'ericm@some.com');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ISBN` bigint(11) NOT NULL,
  `review` longtext NOT NULL,
  `rating` smallint(6) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `ISBN`, `review`, `rating`, `book_id`) VALUES
(47, 1, 123456789123, 'new review', 3, 1),
(48, 2, 987654321987, 'yo this book slaps!!', 5, 8),
(49, 2, 798765432198, 'this book sucks', 1, 9),
(50, 2, 123456789123, 'yo', 1, 1),
(51, 1, 987654321987, 'this book sucks', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockid` int(11) NOT NULL,
  `ISBN` bigint(11) NOT NULL,
  `supplier_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockid`, `ISBN`, `supplier_ID`, `quantity`) VALUES
(1, 987654321987, 1, 1500),
(2, 123456789123, 1, 73),
(3, 798765432198, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `user_id` varchar(1000) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(1000) NOT NULL,
  `worknumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `user_id`, `first_name`, `last_name`, `worknumber`) VALUES
(1, '2', 'erin', 'mcclinton', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isSupplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`, `First_Name`, `Last_Name`, `isAdmin`, `isSupplier`) VALUES
(1, 407270909, 'kortlon', '1234', '2021-12-01 04:37:39', 'Kortlon', 'Erskine', 1, 0),
(2, 2147483647, 'erin', 'mcc555', '2021-11-25 03:50:21', 'erin', 'mcclnton', 0, 1),
(3, 55156914, 'eric', 'mmm', '2021-12-03 17:23:14', 'eric', 'mitchtwooo', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Author_ID` (`Author_ID`),
  ADD UNIQUE KEY `ItemNumber` (`ItemNumber`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `contactdetails`
--
ALTER TABLE `contactdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainsupplier`
--
ALTER TABLE `mainsupplier`
  ADD PRIMARY KEY (`worknumber`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactdetails`
--
ALTER TABLE `contactdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mainsupplier`
--
ALTER TABLE `mainsupplier`
  MODIFY `worknumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21142;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
