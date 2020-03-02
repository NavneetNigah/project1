-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 08:04 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `bookName` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `bookDesc` varchar(200) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `bookName`, `price`, `bookDesc`, `img`) VALUES
(1, 'Such a Fun Age', 15, 'When anyone asks for a book recommendation, this is my default pick for the new year. Reid’s brisk, darkly funny debut follows Emira, a black, underemployed 25-year-old who splits her time.', 'p1.jpg'),
(2, 'The Hunger Games', 19, 'In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts.', 'p2.jpg'),
(3, 'Pride and Prejudice', 14, 'Since its immediate success in 1813, Pride and Prejudice has remained one of the most popular novels in the English language. ', 'p3.jpg'),
(4, 'The Book Thief', 23, 'By her brother\'s graveside, Liesel\'s life is changed when she picks up a single object, partially hidden in the snow.', 'p4.jpg'),
(5, 'Twilight', 25, 'Second, there was a part of him—and I didn\'t know how dominant that part might be—that thirsted for my blood.', 'p5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bookID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invID`, `quantity`, `bookID`) VALUES
(1, 18, 1),
(2, 20, 2),
(3, 18, 3),
(4, 20, 4),
(5, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `total` float NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Payment` text NOT NULL,
  `bookID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `total`, `FirstName`, `LastName`, `address`, `Payment`, `bookID`) VALUES
(1, 15, 'DIVYA', 'GUPTA', '702, 425 Wilson Fairway', 'cod', 1),
(2, 15, 'DIVYA', 'GUPTA', '702, 425 Wilson Fairway', 'cod', 1),
(3, 15, 'DIVYA', 'GUPTA', '702, 425 Wilson Fairway', 'cod', 1),
(4, 14, 'rtertt', 'retert', 'ertert', 'debit', 3),
(5, 14, 'rtertt', 'retert', 'ertert', 'debit', 3),
(6, 15, 'rrrrrr', 'rrrrr', 'rrrrrrr', 'debit', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `bookID` (`bookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
