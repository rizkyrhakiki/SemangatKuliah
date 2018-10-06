-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2018 at 11:26 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyeletuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `comment` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `comment`, `user`, `time`) VALUES
(2, 6, 'testcomment', 'faathir', '2018-10-06 16:52:00'),
(3, 6, 'komentar', 'faathir', '2018-10-06 19:18:33'),
(4, 7, 'komentar', 'faathir', '2018-10-06 19:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `vote_count` int(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user`, `text`, `vote_count`, `category`, `status`, `time`) VALUES
(6, 'faathir', 'hurahuraa', 2, 'makanan1', 1, '2018-10-06 19:08:45'),
(7, 'faathir', 'makan makan', 2, 'makanan1', 0, '2018-10-06 19:16:22'),
(8, 'faathir', 'coba post baru', 1, 'makanan3', 0, '2018-10-06 19:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `stats_id` int(20) NOT NULL,
  `post_id` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `user` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`stats_id`, `post_id`, `type`, `user`, `time`) VALUES
(31, 6, 'vote', 'faathir', '2018-10-06 18:59:35'),
(32, 6, 'vote', 'faathir', '2018-10-06 19:00:01'),
(33, 6, 'bagikan', 'faathir', '2018-10-06 19:03:09'),
(34, 6, 'dilihat', 'faathir', '2018-10-06 19:06:05'),
(35, 7, 'vote', 'faathir', '2018-10-06 19:11:14'),
(36, 6, 'bagikan', 'faathir', '2018-10-06 19:12:50'),
(37, 6, 'dilihat', 'faathir', '2018-10-06 19:14:06'),
(38, 7, 'dilihat', 'faathir', '2018-10-06 19:14:11'),
(39, 7, 'vote', 'faathir', '2018-10-06 19:16:22'),
(42, 8, 'vote', 'faathir', '2018-10-06 21:25:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`stats_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `stats_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
