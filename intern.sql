-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2017 at 07:54 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `workshops` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `workshops`) VALUES
(5, 'sharat@gmail.com', '5d41402abc4b2a76b9719d911017c592', '0,1,3');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL,
  `details` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `heading`, `extra`, `details`) VALUES
(1, 'Complete Web Development Workshop', 'Become a Web Artisan', 'This workshop intends to take you from beginner to a pro in the web development industry . Taught by leading professional tutors, the workshop is a 6-week specialized course to make you a master of web technologies.'),
(2, 'Complete  Graphic Designer Workshop', 'Become a design-geek.', 'This workshop is especially designed for those who have a special niche for creative design sense. You will learn  not only the fundamental skills to become a graphic designer but also receive a special training to re-invent your creative human ability. '),
(3, 'Complete Digital Marketing Workshop', 'Become a Social-virus..', 'If Social media and business acumen is your taste, this one\'s for you . Learn the abilities of strategy-oriented marketing along-with industrial tools to market your product from here to anywhere.'),
(4, 'Complete Data Science Workshop', 'Become a data-master.', 'If subtle analysis and automation is your passion , do look forward for this. You will learn not only the hard-core skills of data analysis and data-mining but also the sexiest skill of machine-learning that makes your your computer a self-dependent.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
