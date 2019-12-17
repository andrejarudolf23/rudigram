-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 08:17 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rudigram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `commentBody` text NOT NULL,
  `postedBy` varchar(100) NOT NULL,
  `postedTo` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commentBody`, `postedBy`, `postedTo`, `dateAdded`, `removed`, `postId`) VALUES
(1, 'Yes', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 16:11:31', 'no', 5),
(2, 'Hey', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 16:44:15', 'no', 3),
(3, 'Nice', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 17:09:50', 'no', 4),
(4, 'Hey', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 18:00:12', 'no', 4),
(5, '', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 18:00:13', 'no', 4),
(6, '', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 18:00:36', 'no', 4),
(7, '       ', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 19:18:35', 'no', 4),
(8, 'a', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 19:44:43', 'no', 6),
(9, 'adadadada', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 20:57:12', 'no', 6),
(10, 'a', 'andreja_rudolf', 'andreja_rudolf', '2019-12-16 22:54:21', 'no', 6),
(11, '     ', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 01:15:15', 'no', 6),
(12, 'Hello', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 18:47:51', 'no', 6),
(13, 'Hey', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 18:50:46', 'no', 6),
(14, '  ', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 19:54:17', 'no', 6),
(15, '    ', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 20:00:27', 'no', 6),
(16, '   ', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 20:00:51', 'no', 6),
(17, '    ', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 20:01:29', 'no', 6),
(18, '   ', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 20:04:10', 'no', 6),
(19, '  ', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 20:05:31', 'no', 6);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `postId`) VALUES
(27, 'andreja_rudolf', 5),
(29, 'andreja_rudolf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `addedBy` varchar(100) NOT NULL,
  `userTo` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `userClosed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  `commentCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `addedBy`, `userTo`, `dateAdded`, `userClosed`, `deleted`, `likes`, `commentCount`) VALUES
(1, 'Just checking guys!', 'andreja_rudolf', 'none', '2019-12-10 15:14:04', 'no', 'no', 0, 0),
(2, 'Just checking guys!', 'andreja_rudolf', 'none', '2019-12-10 15:14:35', 'no', 'no', 0, 0),
(3, 'Hello :)', 'andreja_rudolf', 'none', '2019-12-10 15:16:29', 'no', 'no', 0, 1),
(4, 'Me again :)', 'andreja_rudolf', 'none', '2019-12-10 15:17:51', 'no', 'no', 1, 5),
(5, 'Also me!', 'andreja_rudolf', 'none', '2019-12-10 15:17:57', 'no', 'no', 1, 1),
(6, 'Hey', 'andreja_rudolf', 'none', '2019-12-10 18:12:37', 'no', 'no', 0, 12),
(7, 'It\'s working i guess!', 'matija_nikcevic', 'none', '2019-12-10 18:56:27', 'no', 'no', 0, 0),
(8, 'Just checking yo', 'nikola_micevic', 'none', '2019-12-10 19:00:22', 'no', 'no', 0, 0),
(9, 'Provera', 'luka_kozoder', 'none', '2019-12-11 02:34:44', 'no', 'no', 0, 0),
(10, 'Provera', 'luka_kozoder', 'none', '2019-12-11 02:34:49', 'no', 'no', 0, 0),
(11, 'Jos jedna', 'luka_kozoder', 'none', '2019-12-11 02:34:54', 'no', 'no', 0, 0),
(12, 'Hey', 'nikola_micevic', 'none', '2019-12-11 02:39:04', 'no', 'no', 0, 0),
(13, 'Hey', 'luka_kozoder', 'none', '2019-12-11 02:39:18', 'no', 'no', 0, 0),
(14, 'Hey', 'luka_kozoder', 'none', '2019-12-11 02:57:28', 'no', 'no', 0, 0),
(15, 'Lol', 'luka_ostojic', 'none', '2019-12-11 12:12:26', 'no', 'no', 0, 0),
(16, 'Spam', 'luka_ostojic', 'none', '2019-12-11 12:12:30', 'no', 'no', 0, 0),
(17, 'yes', 'bogdan_ponocko', 'none', '2019-12-11 12:13:01', 'no', 'no', 0, 0),
(18, 'It is an interesting thing really', 'luka_ostojic', 'none', '2019-12-11 12:13:19', 'no', 'no', 0, 0),
(19, 'It really is my mate', 'bogdan_ponocko', 'none', '2019-12-11 12:13:30', 'no', 'no', 0, 0),
(20, 'Well yeah, see you later then', 'luka_ostojic', 'none', '2019-12-11 12:13:45', 'no', 'no', 0, 0),
(21, 'Yea for sure, see ya', 'bogdan_ponocko', 'none', '2019-12-11 12:13:51', 'no', 'no', 0, 0),
(22, 'Check', 'luka_ostojic', 'none', '2019-12-11 12:14:17', 'no', 'no', 0, 0),
(23, 'Programming is interesting, youtube is fun, ecommerce is great. Enjoy guys!', 'luka_ostojic', 'none', '2019-12-11 12:16:16', 'no', 'no', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `numPosts` int(11) NOT NULL,
  `numLikes` int(11) NOT NULL,
  `userClosed` varchar(3) NOT NULL,
  `friendArray` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `password`, `signUpDate`, `profilePic`, `numPosts`, `numLikes`, `userClosed`, `friendArray`) VALUES
(1, 'Andreja', 'Rudolf', 'andreja_rudolf', 'andreja@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:27:11', 'assets/images/profilePics/defaults/head_sun_flower.png', 5, 0, 'no', ','),
(2, 'Matija', 'Nikcevic', 'matija_nikcevic', 'matke@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:30:42', 'assets/images/profilePics/defaults/head_sun_flower.png', 1, 0, 'no', ','),
(3, 'Luka', 'Kozoder', 'luka_kozoder', 'luka@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:33:02', 'assets/images/profilePics/defaults/head_deep_blue.png', 5, 0, 'no', ','),
(4, 'Bogdan', 'Ponocko', 'bogdan_ponocko', 'bogdan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:35:27', 'assets/images/profilePics/defaults/head_sun_flower.png', 3, 0, 'no', ','),
(5, 'Nikola', 'Micevic', 'nikola_micevic', 'nikola@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:46:06', 'assets/images/profilePics/defaults/head_deep_blue.png', 2, 0, 'no', ','),
(6, 'Dimitrije', 'Milacic', 'dimitrije_milacic', 'dimitrije@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:56:26', 'assets/images/profilePics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(7, 'Danilo', 'Kasum', 'danilo_kasum', 'danilo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 16:00:04', 'assets/images/profilePics/defaults/head_alizarin.png', 0, 0, 'no', ','),
(8, 'Stefan', 'Vranic', 'stefan_vranic', 'vranic@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 16:15:53', 'assets/images/profilePics/defaults/head_alizarin.png', 0, 0, 'no', ','),
(9, 'Luka', 'Ostojic', 'luka_ostojic', 'ostoja@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 16:26:09', 'assets/images/profilePics/defaults/head_emerald.png', 6, 0, 'no', ','),
(10, 'Nemanja', 'Popadic', 'nemanja_popadic', 'pop@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 16:35:08', 'assets/images/profilePics/defaults/head_red.png', 0, 0, 'no', ',');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
