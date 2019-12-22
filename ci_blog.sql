-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 02:07 PM
-- Server version: 10.4.8-MariaDB
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
-- Database: `ci_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `intro_img` int(11) NOT NULL,
  `full_img` int(11) NOT NULL,
  `meta_kw` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Active | 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `user_id`, `title`, `body`, `intro_img`, `full_img`, `meta_kw`, `meta_desc`, `created`, `modified`, `status`) VALUES
(1, 0, 'Test', '', 12, 13, '', '', '2019-12-06 02:30:05', '2019-12-06 02:30:05', 1),
(2, 0, 'Test', '', 14, 15, '', '', '2019-12-06 02:30:20', '2019-12-06 02:30:20', 1),
(3, 0, 'Test', '', 16, 17, '', '', '2019-12-06 02:30:59', '2019-12-06 02:30:59', 1),
(4, 1, 'Test', '', 18, 19, '', '', '2019-12-06 02:31:45', '2019-12-06 02:31:45', 0),
(5, 1, 'Test', '', 0, 0, '', '', '2019-12-06 05:26:38', '2019-12-06 05:26:38', 0),
(6, 1, 'Test', '', 0, 0, '', '', '2019-12-06 05:37:24', '2019-12-06 05:37:24', 1),
(7, 1, 'Ttesst', '', 0, 0, '', '', '2019-12-06 05:38:15', '2019-12-06 05:38:15', 1),
(8, 1, '123123', '', 0, 0, '', '', '2019-12-06 05:39:20', '2019-12-06 05:39:20', 1),
(9, 1, 'Test', '<p>asdad a</p><p>asdsad</p><p>asd</p><p>asda</p><p>asd</p>', 0, 0, '', '', '2019-12-09 01:02:24', '2019-12-09 01:02:24', 1),
(10, 1, 'Test test 1234', '<p><b>asda test asd a</b></p><p><u>asdasdasd123123sdfdsf1223123</u></p><p><u><br></u></p><p><u><br></u></p><p><u>asdasdsda123123</u></p><p><u>asdsdasdasda</u></p><p><img style=\"width: 800px;\" src=\"http://blog.john/assets/uploads/v419.gif\"><u><br></u></p><p><u><br></u></p><p><u>asdadasd12312&nbsp;</u></p><p><img style=\"width: 1038.98px;\" src=\"http://blog.john/assets/uploads/2019-11-28_10-09-242.jpg\"><u><br></u></p>', 0, 0, '', '', '2019-12-09 01:07:16', '2019-12-09 01:07:16', 1),
(11, 1, 'Asdadassd', '<p>asdadas</p>', 0, 0, '', '', '2019-12-09 01:58:00', '2019-12-09 01:58:00', 1),
(12, 1, 'Asdad', '<p>asdad</p>', 0, 0, '', '', '2019-12-09 01:58:53', '2019-12-09 01:58:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user_id`, `name`, `created`, `modified`) VALUES
(1, 1, '2019-11-28_10-09-112.jpg', '2019-12-05 05:22:35', '2019-12-05 05:22:35'),
(2, 1, '2019-11-28_10-09-241.jpg', '2019-12-05 05:25:06', '2019-12-05 05:25:06'),
(3, 1, '2019-11-28_10-09-113.jpg', '2019-12-05 05:25:58', '2019-12-05 05:25:58'),
(4, 1, 'v43.gif', '2019-12-06 02:08:27', '2019-12-06 02:08:27'),
(5, 1, 'v44.gif', '2019-12-06 02:08:27', '2019-12-06 02:08:27'),
(6, 1, 'v45.gif', '2019-12-06 02:28:59', '2019-12-06 02:28:59'),
(7, 1, 'v46.gif', '2019-12-06 02:28:59', '2019-12-06 02:28:59'),
(8, 1, 'v47.gif', '2019-12-06 02:29:26', '2019-12-06 02:29:26'),
(9, 1, 'v48.gif', '2019-12-06 02:29:26', '2019-12-06 02:29:26'),
(10, 1, 'v49.gif', '2019-12-06 02:29:36', '2019-12-06 02:29:36'),
(11, 1, 'v410.gif', '2019-12-06 02:29:36', '2019-12-06 02:29:36'),
(12, 1, 'v411.gif', '2019-12-06 02:30:05', '2019-12-06 02:30:05'),
(13, 1, 'v412.gif', '2019-12-06 02:30:05', '2019-12-06 02:30:05'),
(14, 1, 'v413.gif', '2019-12-06 02:30:20', '2019-12-06 02:30:20'),
(15, 1, 'v414.gif', '2019-12-06 02:30:20', '2019-12-06 02:30:20'),
(16, 1, 'v415.gif', '2019-12-06 02:30:59', '2019-12-06 02:30:59'),
(17, 1, 'v416.gif', '2019-12-06 02:30:59', '2019-12-06 02:30:59'),
(18, 1, 'v417.gif', '2019-12-06 02:31:45', '2019-12-06 02:31:45'),
(19, 1, 'v418.gif', '2019-12-06 02:31:45', '2019-12-06 02:31:45'),
(20, 1, '2019-11-28_10-09-114.jpg', '2019-12-09 00:59:17', '2019-12-09 00:59:17'),
(21, 1, 'v419.gif', '2019-12-09 01:06:56', '2019-12-09 01:06:56'),
(22, 1, '2019-11-28_10-09-242.jpg', '2019-12-09 01:07:10', '2019-12-09 01:07:10'),
(23, 1, '2019-11-28_10-09-243.jpg', '2019-12-09 01:22:57', '2019-12-09 01:22:57'),
(24, 1, '2019-11-28_10-09-115.jpg', '2019-12-09 01:23:42', '2019-12-09 01:23:42'),
(25, 1, '2019-11-28_10-09-116.jpg', '2019-12-09 01:24:14', '2019-12-09 01:24:14'),
(26, 1, '2019-11-28_10-09-244.jpg', '2019-12-09 01:25:02', '2019-12-09 01:25:02'),
(27, 1, '2019-11-28_10-09-245.jpg', '2019-12-09 01:26:47', '2019-12-09 01:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created`, `modified`) VALUES
(1, 'admin', '2019-12-04 04:00:00', '2019-12-04 04:00:00'),
(2, 'user', '2019-12-04 04:00:00', '2019-12-04 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `created`, `modified`, `status`) VALUES
(1, 1, 'John Carlo', 'De Leon', 'john@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-12-04 00:00:00', '2019-12-04 00:00:00', 1),
(2, 2, 'David', 'Paguinto', 'david@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-12-04 01:11:42', '2019-12-04 01:11:42', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
