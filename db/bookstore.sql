-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 10:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `book_id` int(3) NOT NULL,
  `book_category_id` int(3) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_publisher` varchar(255) NOT NULL,
  `book_price` float NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_image` text NOT NULL,
  `book_tags` varchar(255) NOT NULL,
  `book_status` varchar(255) NOT NULL DEFAULT 'draft',
  `book_comment_count` int(11) NOT NULL,
  `upload_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_category_id`, `book_name`, `book_publisher`, `book_price`, `book_author`, `book_image`, `book_tags`, `book_status`, `book_comment_count`, `upload_date`) VALUES
(3, 2, 'clean code', 'adams & co.', 40.99, 'robert cecil martin', 'clean-code.jpg', 'coding, programming, technology, computer', 'published', 5, '2022-02-17 '),
(5, 7, 'new york corporation law', 'mathew bender elite products', 5.99, 'legalEase solutions', 'new-york-law-corporation.jpg', 'law', 'published', 4, '2022-02-17 '),
(6, 2, 'Introduction to Hospitality Management 5th Edition ', 'Pearson; 5th edition (January 7, 2016)', 59.97, 'John Walker ', 'hospitality.jpg', 'hotel, hospitality', 'published', 1, '2022-02-17 ');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(2, 'computer science'),
(3, 'hospitality and hotel mgmt'),
(6, 'engineering'),
(7, 'Law Book Review'),
(8, 'Accountancy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(2, 5, 'Jim Carey', 'jimmy@gmail.com', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, ab maxime odit omnis doloribus sit!', 'unapproved', '2022-02-17'),
(3, 3, 'Sandy Jones', 'sandy@cutemail.com', 'Heyyy Tea, you are making progress with your program.', 'approved', '2022-02-17'),
(4, 3, 'Sandy Jones', 'sandy@cutemail.com', 'Heyyy Tea, you are making progress with your program.', 'unapproved', '2022-02-17'),
(5, 4, 'Juan', 'juan@yahhooo.com', 'HEYYYYYYYYYYYYYYYYYYYY', 'unapproved', '2022-02-17'),
(6, 4, 'Jesus', 'jman@chrirst.com', 'heyy there ', 'unapproved', '2022-02-17'),
(7, 3, 'Jeramae', 'jera@gmail.com', 'This is for testing purposes only!', 'approved', '2022-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(3) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_category` varchar(255) NOT NULL,
  `book_price` float NOT NULL,
  `client_firstname` varchar(255) NOT NULL,
  `client_lastname` varchar(255) NOT NULL,
  `client_username` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_city` varchar(255) NOT NULL,
  `client_street_address` varchar(255) NOT NULL,
  `purchase_status` varchar(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `payment_method` varchar(11) NOT NULL,
  `payment_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `book_name`, `book_author`, `book_category`, `book_price`, `client_firstname`, `client_lastname`, `client_username`, `client_email`, `client_city`, `client_street_address`, `purchase_status`, `purchase_date`, `payment_method`, `payment_status`) VALUES
(4, 'Introduction To Hospitality Management 5th Edition ', 'John Walker ', '2', 59.97, 'Williams', 'Dafoe', 'Will', 'will@smith.com', 'Las Pinas', '123 Main Avenue', 'Completed', '2022-02-19', 'paypal', 'Paid'),
(5, 'Introduction To Hospitality Management 5th Edition ', 'John Walker ', '2', 59.97, 'Christine', 'Joy', 'Christine', 'c@gmail.com', 'LP', 'Main Avenue', 'pending', '2022-02-19', 'pending pay', 'pending pay'),
(6, 'Introduction To Hospitality Management 5th Edition ', 'John Walker ', '2', 59.97, 'Christine', 'Joy', 'Christine', 'c@gmail.com', 'LP', 'Main Avenue', 'pending', '2022-02-19', 'mastercard', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_street_address` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_zip_code` int(11) NOT NULL,
  `user_gender` varchar(11) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `username`, `user_email`, `user_country`, `user_street_address`, `user_city`, `user_zip_code`, `user_gender`, `user_role`, `user_password`) VALUES
(29, 'Christine', 'Joy', 'christine', 'c@gmail.com', 'PH', 'Main Avenue', 'LP', 12333, 'female', 'admin', '$2y$12$bpN4HPS0sm4ET7hVb43H0u8MbQICqMazam0rnPDkyhiT7u5Q8HBGe'),
(30, 'Faith', 'Calawod', 'faith', 'f@gmail.com', 'PH', '123 Mango Street', 'LP', 17511, 'female', 'subscriber', '$2y$12$uDWE29tl1cux3fAcyEwGSuuv7K8lEGHC.qh4lr5h/F21XfPzcsnWm'),
(31, 'Williams', 'Dafoe', 'Will', 'will@smith.com', 'PH', '123 Main Avenue', 'Las Pinas', 17711, 'male', 'subscriber', '$2y$12$3zgW4pMipyZfn84toAfZvesLpxITbPG6vZMwYYdCSpBF37re.AxDK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
