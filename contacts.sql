-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2022 at 09:55 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacts`
--

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` bigint(10) NOT NULL,
  `first_name` text COLLATE utf8_bin NOT NULL,
  `last_name` text COLLATE utf8_bin NOT NULL,
  `nickname` text COLLATE utf8_bin NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `occupation` text COLLATE utf8_bin NOT NULL,
  `phone_number_1_type` text COLLATE utf8_bin NOT NULL,
  `phone_number_1` text COLLATE utf8_bin NOT NULL,
  `phone_number_2_type` text COLLATE utf8_bin NOT NULL,
  `phone_number_2` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `street_address` text COLLATE utf8_bin NOT NULL,
  `suite_apt_number` text COLLATE utf8_bin NOT NULL,
  `zip_code` text COLLATE utf8_bin NOT NULL,
  `city` text COLLATE utf8_bin NOT NULL,
  `state` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `photo_attachment` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `first_name`, `last_name`, `nickname`, `title`, `occupation`, `phone_number_1_type`, `phone_number_1`, `phone_number_2_type`, `phone_number_2`, `email`, `street_address`, `suite_apt_number`, `zip_code`, `city`, `state`, `description`, `photo_attachment`) VALUES
(9, 'Shawn', 'Bieber', 'John', 'Mr.', 'Student', 'Mobile', '8087569977', 'Home', '8087993227', 'shawnbj@gmail.com', '87 Done St', '6E', '96813', 'Honolulu', 'HI', '', 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60'),
(10, 'David', 'Cho', 'Dav', 'Mr.', 'DBA', 'Personal', '2749220332', 'Office', '3832991103', 'davidcho@googlecareer.gmail', '1600 Amphitheatre Pkwy', '', '94043', 'Mountain View', 'California', '', 'https://images.unsplash.com/photo-1659535998184-15d6c9f5f873?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxzZWFyY2h8MTV8fHBlb3BsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60'),
(11, 'Christina', 'Phan', 'Chris', 'Miss', 'Secretary', 'School', '1234567890', 'Mobile', '7334552245', 'chrisphan@my.hpu.edu', '47 Dublin Ave', '', '38292', 'Columbus', 'Ohio', '', 'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60'),
(12, 'Oliver', 'Charley', 'Hailey', '', 'Model', 'Mobile 1', '8379930022', 'Mobile 2', '2482819918', 'icansee@gmail.com', '483 Kent', '', '', 'Cleverland', 'Ohio', '', 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fHBlb3BsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60'),
(13, 'Amanda', 'Jolie', 'AJ', 'Mrs.', 'Journalist', 'Office', '7229992222', 'Personal', '7820013992', 'amanda@gmail.com', '78 Apple Blvd', '', '28391', 'Vancouver', 'Washington', 'Food lover', 'https://plus.unsplash.com/premium_photo-1669135434767-7a05160f937e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fHBlb3BsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60'),
(14, 'Joseph', 'Christoper', '', '', 'Travel Vloger', 'Home', '2719920022', 'Work', '1279910082', 'lovetravel@gmail.com', '47 W 13th St', '', '10011', 'New York City', 'New York', '', 'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjR8fHBlb3BsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60'),
(15, 'Tony', 'Jeffery', 'Jef', 'Mr.', 'Photographer', 'Phone', '7383020002', 'Work', '7386627771', 'jeffertony@hotmail.com', '1382 Phillip St', '210', '96851', 'Honolulu', 'HI', 'Hi guys! I am currently single.', 'https://images.unsplash.com/photo-1488161628813-04466f872be2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fHBlb3BsZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
