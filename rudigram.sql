-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 08:53 PM
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
(19, '  ', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 20:05:31', 'no', 6),
(20, 'adada', 'andreja_rudolf', 'andreja_rudolf', '2019-12-17 23:09:08', 'no', 2),
(21, 'Hey Hello', 'nikola_micevic', 'andreja_rudolf', '2019-12-18 01:00:29', 'no', 5),
(22, 'Check', 'nikola_micevic', 'nikola_micevic', '2019-12-18 01:12:26', 'no', 12),
(23, 'Hey', 'nikola_micevic', 'nikola_micevic', '2019-12-18 01:13:01', 'no', 12),
(24, 'Hey', 'nikola_micevic', 'nikola_micevic', '2019-12-18 01:18:09', 'no', 8),
(25, 'Hey', 'nikola_micevic', 'nikola_micevic', '2019-12-18 01:18:51', 'no', 8),
(26, 'Yes', 'nikola_micevic', 'nikola_micevic', '2019-12-18 01:22:35', 'no', 8),
(27, 'Well done', 'nikola_micevic', 'nikola_micevic', '2019-12-18 01:25:46', 'no', 12),
(28, 'Again', 'nikola_micevic', 'nikola_micevic', '2019-12-18 11:53:15', 'no', 12),
(29, 'No', 'nikola_micevic', 'nikola_micevic', '2019-12-18 11:54:15', 'no', 8),
(30, 'ok', 'nikola_micevic', 'nikola_micevic', '2019-12-18 11:56:50', 'no', 8),
(31, 'New', 'nikola_micevic', 'nikola_micevic', '2019-12-18 12:02:27', 'no', 12),
(32, 'Hey', 'nikola_micevic', 'andreja_rudolf', '2019-12-18 12:05:14', 'no', 1),
(33, 'Hey', 'andreja_rudolf', 'andreja_rudolf', '2019-12-18 12:07:47', 'no', 25),
(34, 'Just checking', 'andreja_rudolf', 'andreja_rudolf', '2019-12-18 12:09:28', 'no', 26),
(35, 'Ok', 'andreja_rudolf', 'andreja_rudolf', '2019-12-18 12:11:56', 'no', 27),
(36, 'Again me', 'andreja_rudolf', 'andreja_rudolf', '2019-12-18 12:12:00', 'no', 27),
(37, 'hmm', 'andreja_rudolf', 'andreja_rudolf', '2019-12-18 16:54:11', 'no', 4),
(38, 'Ok', 'andreja_rudolf', 'andreja_rudolf', '2019-12-20 16:41:34', 'no', 24),
(39, 'Hmm', 'andreja_rudolf', 'nikola_micevic', '2019-12-22 22:59:24', 'no', 12),
(40, 'hmm', 'andreja_rudolf', 'andreja_rudolf', '2019-12-23 00:59:55', 'no', 36),
(41, '??', 'andreja_rudolf', 'andreja_rudolf', '2019-12-23 02:26:01', 'no', 32);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `userTo` varchar(100) NOT NULL,
  `userFrom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(35, 'andreja_rudolf', 5),
(36, 'andreja_rudolf', 4),
(37, 'andreja_rudolf', 3),
(38, 'andreja_rudolf', 2),
(39, 'andreja_rudolf', 1),
(55, 'andreja_rudolf', 6),
(68, 'nikola_micevic', 12),
(75, 'andreja_rudolf', 24),
(76, 'andreja_rudolf', 27),
(92, 'andreja_rudolf', 8),
(99, 'andreja_rudolf', 32);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `userFrom` varchar(100) NOT NULL,
  `userTo` varchar(100) NOT NULL,
  `messageBody` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Just checking guys!', 'andreja_rudolf', 'none', '2019-12-10 15:14:04', 'no', 'no', 1, 1),
(2, 'Just checking guys!', 'andreja_rudolf', 'none', '2019-12-10 15:14:35', 'no', 'no', 1, 1),
(3, 'Hello :)', 'andreja_rudolf', 'none', '2019-12-10 15:16:29', 'no', 'no', 1, 1),
(4, 'Me again :)', 'andreja_rudolf', 'none', '2019-12-10 15:17:51', 'no', 'no', 1, 6),
(5, 'Also me!', 'andreja_rudolf', 'none', '2019-12-10 15:17:57', 'no', 'no', 1, 2),
(6, 'Hey', 'andreja_rudolf', 'none', '2019-12-10 18:12:37', 'no', 'no', 1, 12),
(7, 'It\'s working i guess!', 'matija_nikcevic', 'none', '2019-12-10 18:56:27', 'no', 'no', 0, 0),
(8, 'Just checking yo', 'nikola_micevic', 'none', '2019-12-10 19:00:22', 'no', 'no', 1, 5),
(9, 'Provera', 'luka_kozoder', 'none', '2019-12-11 02:34:44', 'no', 'no', 0, 0),
(10, 'Provera', 'luka_kozoder', 'none', '2019-12-11 02:34:49', 'no', 'no', 0, 0),
(11, 'Jos jedna', 'luka_kozoder', 'none', '2019-12-11 02:34:54', 'no', 'no', 0, 0),
(12, 'Hey', 'nikola_micevic', 'none', '2019-12-11 02:39:04', 'no', 'no', 1, 6),
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
(23, 'Programming is interesting, youtube is fun, ecommerce is great. Enjoy guys!', 'luka_ostojic', 'none', '2019-12-11 12:16:16', 'no', 'no', 0, 0),
(24, 'Hello', 'andreja_rudolf', 'none', '2019-12-18 12:07:17', 'no', 'no', 1, 1),
(26, 'Hello', 'andreja_rudolf', 'none', '2019-12-18 12:09:08', 'no', 'no', 0, 1),
(27, 'Hello', 'andreja_rudolf', 'none', '2019-12-18 12:11:47', 'no', 'no', 1, 2),
(28, 'Boo', 'andreja_rudolf', 'none', '2019-12-22 22:32:09', 'no', 'no', 0, 0),
(29, '1 more', 'andreja_rudolf', 'none', '2019-12-22 22:32:14', 'no', 'no', 0, 0),
(30, 'Hey', 'andreja_rudolf', 'none', '2019-12-22 23:03:37', 'no', 'no', 0, 0),
(31, 'Again', 'andreja_rudolf', 'none', '2019-12-22 23:05:57', 'no', 'no', 0, 0),
(32, 'Again', 'andreja_rudolf', 'none', '2019-12-22 23:06:20', 'no', 'no', 1, 1),
(33, 'Yo', 'andreja_rudolf', 'none', '2019-12-22 23:06:37', 'no', 'no', 0, 0),
(34, 'Yo', 'andreja_rudolf', 'none', '2019-12-22 23:08:23', 'no', 'no', 0, 0),
(35, 'Yo', 'andreja_rudolf', 'nikola_micevic', '2019-12-22 23:10:41', 'no', 'no', 0, 0),
(36, 'Checking', 'andreja_rudolf', 'none', '2019-12-22 23:22:51', 'no', 'no', 0, 1),
(37, 'Hey', 'andreja_rudolf', 'nikola_micevic', '2019-12-22 23:23:08', 'no', 'no', 0, 0);

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
(1, 'Andreja', 'Rudolf', 'andreja_rudolf', 'andreja@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:27:11', 'assets/images/profilePics/andreja_rudolf7a9393e03a94991db44b108cc4e7b83an.jpeg', 20, 0, 'no', ',nikola_micevic,luka_kozoder,'),
(2, 'Matija', 'Nikcevic', 'matija_nikcevic', 'matke@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:30:42', 'assets/images/profilePics/defaults/head_sun_flower.png', 1, 0, 'no', ','),
(3, 'Luka', 'Kozoder', 'luka_kozoder', 'luka@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:33:02', 'assets/images/profilePics/defaults/head_deep_blue.png', 5, 0, 'no', ',andreja_rudolf,'),
(4, 'Bogdan', 'Ponocko', 'bogdan_ponocko', 'bogdan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:35:27', 'assets/images/profilePics/defaults/head_sun_flower.png', 3, 0, 'no', ','),
(5, 'Nikola', 'Micevic', 'nikola_micevic', 'nikola@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:46:06', 'assets/images/profilePics/defaults/head_deep_blue.png', 2, 0, 'no', ',andreja_rudolf,'),
(6, 'Dimitrije', 'Milacic', 'dimitrije_milacic', 'dimitrije@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 15:56:26', 'assets/images/profilePics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(7, 'Danilo', 'Kasum', 'danilo_kasum', 'danilo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2019-12-09 16:00:04', 'assets/images/profilePics/danilo_kasum760cf4db780d9858a993c8c42b44d182n.jpeg', 0, 0, 'no', ','),
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
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
