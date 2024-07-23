-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 02:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'admin', 'admin@gmail.com', '1234', 1148458757);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(101, 'M D Guptaa'),
(102, 'Chetan Bhagat'),
(103, 'Robin Sharma'),
(107, 'J.K Rowling'),
(108, 'Amish Tripathi1'),
(109, 'William Shakespeare'),
(110, 'Agatha Christie'),
(111, 'Paul Coleho'),
(112, 'Virginia Woolf'),
(113, 'R D Sharma'),
(114, 'H C Varma'),
(115, 'Stan Lee'),
(116, 'Peter Lynch'),
(117, 'Charles Dickens'),
(118, 'Stephen Covey'),
(119, 'Douglas Adams'),
(120, 'Robert L Piccioni'),
(121, 'Stephen Hawking');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `instore` varchar(11) NOT NULL,
  `book_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author_id`, `cat_id`, `book_no`, `instore`, `book_price`) VALUES
(2, 'Data structure', 107, 4, 4518, '258', 300),
(39, 'You Can WIn', 103, 2, 123, '51', 20111),
(40, 'Harry Potter', 107, 2, 1333, '24', 2000),
(43, 'Software engineering', 101, 4, 2025, '22', 500),
(46, 'To The Lighthouse', 112, 2, 5005, '33', 320),
(47, 'Macbeth', 109, 15, 5010, '55', 300),
(48, 'Mathematics for class tenth', 113, 13, 3000, '22', 560),
(49, 'Mathematics for class eleventh', 113, 13, 3005, '24', 500),
(50, 'Concept of Physics', 114, 13, 3010, '532', 555),
(51, 'The hound of Death', 110, 15, 6000, '13', 410),
(52, 'Two States', 102, 2, 6005, '44', 450),
(53, 'The Alchemist', 111, 5, 7000, '11', 300),
(54, 'the monk who sold his ferrari', 103, 4, 7005, '23', 500),
(55, 'The Greatness Guide', 103, 4, 7015, '23', 230),
(56, 'Eleven minutes', 111, 14, 7020, '22', 225),
(57, 'Sita', 108, 2, 7025, '2', 335),
(58, 'The Meluha', 108, 2, 7030, '42', 200),
(59, 'Learn to Earn', 116, 16, 8000, '134', 200),
(60, 'One Up On Wall Streat', 116, 16, 8010, '32', 225),
(61, 'Beating The Street', 116, 16, 8015, '21', 320),
(62, 'Aleph', 111, 2, 8020, '2', 330),
(63, 'A Mysterious Life', 110, 12, 8025, '66', 420),
(64, 'Midwinter Murder Fireside Tales from the Queen of mystery', 110, 15, 8030, '64', 300),
(65, 'The Patriotic Murders', 110, 15, 8035, '12', 200),
(66, 'Oliver Twist', 117, 2, 8040, '442', 300),
(67, 'Spiderman Miles Moralisa', 115, 14, 9000, '', 700),
(68, 'Ironman', 115, 14, 9005, '', 300),
(69, 'Hard Times', 117, 10, 9010, '', 320),
(70, 'Einstein For Everyonebooks', 120, 17, 10000, '', 450),
(71, 'Life Universe and Everything', 119, 17, 10005, '', 600),
(72, 'The Theory Of Everything books', 121, 17, 10010, '', 560),
(73, 'George and the Blue Moon', 121, 17, 10015, '', 700),
(74, 'Seven Habits of Highly Effective People', 118, 10, 10020, '', 770),
(75, 'First Things First', 118, 10, 10025, '', 450),
(76, 'Hitchhiker guide to the galaxy', 119, 2, 3020, '', 400),
(78, 'The Eights Habit', 118, 4, 6020, '', 460),
(79, 'test_book', 101, 2, 67, '76', 343),
(80, 'dummy_book', 103, 4, 121, '51', 1222);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(2, 'Novel'),
(4, 'Motivational'),
(5, 'Story'),
(10, 'Self-Help'),
(12, 'Psychology'),
(13, 'Education'),
(14, 'Comics'),
(15, 'Horror'),
(16, 'Finance'),
(17, 'Science Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `s_no` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `issue_date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`s_no`, `book_no`, `book_name`, `book_author`, `student_id`, `status`, `issue_date`) VALUES
(52, 3000, 'Mathematics for class tenth', 'R D Sharma', 28, 1, '2121-04-24'),
(53, 1333, 'Harry Potter', 'J.K Rowling', 28, 1, '2121-04-24'),
(54, 6005, 'Two States', 'Chetan Bhagat', 28, 1, '2121-04-24'),
(55, 7025, 'Sita', 'Amish Tripathi1', 28, 1, '2121-04-24'),
(56, 8000, 'Learn to Earn', 'Peter Lynch', 28, 1, '2121-04-24'),
(57, 5010, 'Macbeth', 'William Shakespeare', 11, 1, '2121-04-24'),
(58, 5005, 'To The Lighthouse', 'Virginia Woolf', 11, 1, '2121-04-25'),
(59, 3010, 'Concept of Physics', 'H C Varma', 11, 1, '2121-04-25'),
(60, 7000, 'The Alchemist', 'Paul Coleho', 11, 1, '2121-04-25'),
(62, 7030, 'The Meluha', 'Amish Tripathi1', 29, 1, '2121-04-25'),
(66, 9000, 'Spiderman Miles Moralisa', 'Stan Lee', 29, 1, '2121-04-25'),
(67, 10000, 'Einstein For Everyonebooks', 'Stephen Hawking', 30, 1, '2121-04-26'),
(68, 6020, 'The Eights Habit', 'Stephen Covey', 30, 1, '2121-04-26'),
(69, 10015, 'George and the Blue Moon', 'Stephen Hawking', 30, 1, '2121-04-26'),
(70, 9010, 'Hard Times', 'Charles Dickens', 30, 1, '2121-04-26'),
(71, 8010, 'One Up On Wall Streat', 'Peter Lynch', 30, 1, '2121-04-26'),
(72, 9005, 'Ironman', 'Stan Lee', 31, 1, '2121-04-26'),
(73, 8040, 'Oliver Twist', 'Charles Dickens', 31, 1, '2121-04-26'),
(74, 7020, 'Eleven minutes', 'Paul Coleho', 32, 1, '2121-04-26'),
(75, 7015, 'The Greatness Guide', 'Robin Sharma', 33, 1, '2121-04-26'),
(919, 5005, 'You Can WIn', 'M D Guptaa', 31, 1, '2424-04-07'),
(920, 2025, 'Data structure', 'M D Guptaa', 31, 1, '2424-04-07'),
(921, 123, 'You Can WIn', 'M D Guptaa', 31, 1, '2424-04-07'),
(922, 123, 'Mathematics for class eleventh', 'M D Guptaa', 31, 1, '2424-04-07'),
(923, 2025, 'The hound of Death', 'M D Guptaa', 31, 1, '2424-04-07'),
(924, 2025, 'Data structure', 'M D Guptaa', 31, 1, '2424-04-07'),
(925, 2025, 'the monk who sold his ferrari', 'M D Guptaa', 31, 1, '2424-04-07'),
(926, 123, 'The hound of Death', 'M D Guptaa', 29, 1, '2424-04-07'),
(927, 121, 'dummy_book', 'Robin Sharma', 31, 1, '2424-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `returnbook`
--

CREATE TABLE `returnbook` (
  `book_id` int(20) NOT NULL,
  `book_no` int(20) NOT NULL,
  `status` int(5) NOT NULL,
  `date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returnbook`
--

INSERT INTO `returnbook` (`book_id`, `book_no`, `status`, `date`) VALUES
(10, 123, 0, '2121-03-31'),
(12, 123, 1, '2121-03-31'),
(13, 123, 0, '2121-03-31'),
(14, 4518, 0, '2121-03-31'),
(15, 2025, 1, '2121-03-31'),
(16, 2025, 0, '2121-03-31'),
(17, 123, 1, '2121-03-31'),
(18, 1010, 1, '2121-03-31'),
(19, 1010, 1, '2121-03-31'),
(20, 1333, 0, '2121-03-31'),
(21, 5231, 0, '2121-03-31'),
(22, 2040, 1, '2121-03-31'),
(23, 1333, 1, '2121-03-31'),
(24, 1333, 0, '2121-03-31'),
(25, 1333, 1, '2121-03-31'),
(26, 1010, 0, '2121-04-10'),
(27, 123, 0, '2121-04-10'),
(28, 1333, 0, '2121-04-10'),
(29, 999, 1, '2121-04-14'),
(30, 3000, 1, '2121-04-24'),
(31, 1333, 1, '2121-04-24'),
(32, 6005, 1, '2121-04-24'),
(33, 7025, 1, '2121-04-24'),
(34, 8000, 1, '2121-04-24'),
(35, 5010, 1, '2121-04-24'),
(36, 5005, 1, '2121-04-25'),
(37, 3010, 1, '2121-04-25'),
(38, 7000, 1, '2121-04-25'),
(39, 8015, 1, '2121-04-25'),
(40, 7030, 1, '2121-04-25'),
(41, 8025, 1, '2121-04-25'),
(42, 6000, 1, '2121-04-25'),
(43, 7005, 1, '2121-04-25'),
(44, 9000, 1, '2121-04-25'),
(45, 10000, 1, '2121-04-26'),
(46, 6020, 1, '2121-04-26'),
(47, 10015, 1, '2121-04-26'),
(48, 9010, 1, '2121-04-26'),
(49, 8010, 1, '2121-04-26'),
(50, 9005, 1, '2121-04-26'),
(51, 8040, 1, '2121-04-26'),
(52, 7020, 1, '2121-04-26'),
(53, 7015, 1, '2121-04-26'),
(54, 6000, 0, '2121-04-27'),
(55, 7005, 0, '2121-04-27'),
(56, 8025, 0, '2121-04-27'),
(57, 8015, 0, '2121-04-27'),
(58, 5005, 1, '2424-04-07'),
(59, 2025, 1, '2424-04-07'),
(60, 123, 1, '2424-04-07'),
(61, 123, 1, '2424-04-07'),
(62, 2025, 1, '2424-04-07'),
(63, 2025, 1, '2424-04-07'),
(64, 2025, 1, '2424-04-07'),
(65, 123, 1, '2424-04-07'),
(66, 121, 1, '2424-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `address`) VALUES
(4, 'user', 'user1@gmail.com', 'user@1234', 2147483644, 'XYZ Coloney, PQR Nagar , Jaipur'),
(11, 'rohan', 'rohan@gmail.com', '12345', 123456789, 'Kota, Jaipur'),
(27, 'Rahul', 'rahul@gmail.com', 'Rahul@1234', 2147483647, 'Plot no-1244/1, Sector-3 A, Gandhinagar, Gujarat-382006'),
(28, 'Riya Revdiwala', '18bce197@nirmauni.ac.in', 'Riya1234!@#', 2147483647, 'Oman'),
(29, 'Kishan Prajapati', '18bce181@nirmauni.ac.in', 'Kishan123@@@', 2147483647, 'Plot no-1244/1, Sector-3 A, Gandhinagar, Gujarat-382006'),
(30, 'Pradumna', '18bce179@nirmauni.ac.in', 'Pradumna123#', 2147483647, 'Surat'),
(31, 'Meet Mavani', '18bce118@nirmauni.ac.in', 'Meet1234$$', 2147483647, 'Bhavnagar'),
(32, 'Neha', 'Neha@gmail.com', 'Neha1234@#', 2147483647, 'Plot no-561/1, Sector-13 A, Gandhinagar, Gujarat-382006'),
(33, 'Paridhi Sharma', 'Pari@gmail.com', 'Pari1234@@', 1234567899, 'UK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_no` (`book_no`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`s_no`),
  ADD KEY `book_no` (`book_no`),
  ADD KEY `book_name` (`book_name`),
  ADD KEY `book_author` (`book_author`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `returnbook`
--
ALTER TABLE `returnbook`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=928;

--
-- AUTO_INCREMENT for table `returnbook`
--
ALTER TABLE `returnbook`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`);

--
-- Constraints for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD CONSTRAINT `issued_books_ibfk_1` FOREIGN KEY (`book_no`) REFERENCES `books` (`book_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
