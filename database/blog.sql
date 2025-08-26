-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 09:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `password`, `date`) VALUES
(2, 'Yopoo ', 'Motivations', 'admin@gmail.com', 'admin', '2024-11-24 06:19:06'),
(3, 'Abigail', 'Nketiah', 'admin2@gmail.com', 'admin', '2025-01-09 07:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile_photo`
--

CREATE TABLE `admin_profile_photo` (
  `admin_profile_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_profile_photo`
--

INSERT INTO `admin_profile_photo` (`admin_profile_id`, `admin_id`, `email`, `profession`, `image`, `date`) VALUES
(3, 2, 'admin@gmail.com', 'FrontEnd And BackEnd Developer ', '6744b148bec75.jpg', '2024-11-25 17:18:00'),
(4, 1, 'frimpongfredrick87@gmail.com', 'FrontEnd And BackEnd Developer ', '68926c026b613.png', '2025-08-05 20:39:30'),
(5, 1, 'frimpongfredrick87@gmail.com', 'FrontEnd And BackEnd Developer ', '68926c5b5b81b.png', '2025-08-05 20:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_image` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`post_id`, `user_id`, `fname`, `lname`, `title`, `description`, `content`, `content_image`, `date`, `status`) VALUES
(7, 1, 'Fredrick', 'Frimpong', 'BEFORE THE ALTAR', 'LOGOS', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.\r\n\r\nTo make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.\r\n\r\nThemes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme.\r\n', '68921e8b87d0e.png', '2025-08-05 15:08:59', '1'),
(8, 1, 'Fredrick', 'Frimpong', 'THE GOD IN MAN ', 'LOGOS', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.\r\n\r\nTo make your document look professionally produced, Word provides header, footer, cover page, and text box\r\ndesigns that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.\r\n\r\nThemes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme.\r\n', '6733b607cbe0b.jpg', '2024-11-12 20:09:43', 'Pending'),
(9, 3, 'Rosalinda', 'Quansah', 'THE SPIRIT WORLD', 'PNEUMATOLOGY', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.\r\n\r\nTo make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.\r\n\r\nThemes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme.\r\n', '6733d9c1cab41.jpg', '2024-11-12 22:42:09', '1'),
(10, 3, 'Rosalinda', 'Quansah', 'The Theory of man', 'Pneumatology', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other.\r\n\r\nFor example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme.\r\n\r\nWhen you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, \r\nclick it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign.\r\n', '673c3978759e2.jpeg', '2024-11-19 07:08:40', '1'),
(11, 2, 'Abigail ', 'Nketiah', 'In His Presence', 'LOGOS', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other.\r\n\r\n\r\nFor example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. \r\n\r\nWhen you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme.\r\n\r\nWhen you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign.\r\n', '673eceaf7467c.jpg', '2024-11-21 06:09:51', 'Pending'),
(13, 0, 'Yopoo ', 'Motivations', 'From Admin 2', 'Admin testing 2', 'Admin testing 2', '674314903ada7.jpg', '2024-11-24 11:57:04', '1'),
(14, 0, 'Yopoo ', 'Motivations', 'GRACE', 'Admin testing 3', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\n\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\n\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\n', '6743a0e378710.jpg', '2024-11-24 21:55:47', 'Pending'),
(22, 0, 'Yopoo ', 'Motivations', 'GREAT IS THE LORD', 'PNEUMA', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. \r\n\r\nTo make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated.\r\n\r\n When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\n\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\n', '6743a02dd741e.jpg', '2024-11-24 21:52:45', 'Pending'),
(23, 0, 'Yopoo ', 'Motivations', 'New Recruit ', 'AAMUSTED ADMITTING NEW LECTURERS', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document.\r\nTo make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.\r\nThemes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme.\r\n', '68079d6369b12.jpg', '2025-04-22 13:45:07', 'Pending'),
(50, 1, 'Fredrick', 'Frimpong', 'Am tired', 'Oh my God help me', 'asbjhbcs', 'post_6893b485275df5.20716299.png', '2025-08-06 20:01:09', '1'),
(52, 15, '', '', 'Am really tired', 'But God has done all', 'Kudo My God', 'post_6893bf8ea19250.23523472.png', '2025-08-06 20:48:14', '1'),
(53, 16, '', '', 'All is working', 'I really thank my God', 'Indeed my God has never failed me', 'post_6893c11f485fc8.65358176.png', '2025-08-06 20:54:55', '1'),
(54, 15, '', '', 'Today testting', 'Dont fail me', 'hmmmm', 'post_68945a57c3fc83.69666762.jpg', '2025-08-07 07:48:39', '1');

-- --------------------------------------------------------

--
-- Table structure for table `blog_users`
--

CREATE TABLE `blog_users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_users`
--

INSERT INTO `blog_users` (`user_id`, `fname`, `lname`, `email`, `password`, `user_name`, `gender`, `role`, `date`, `status`) VALUES
(1, 'Fredrick', 'Frimpong', 'frimpongfredrick87@gmail.com', '0548567598', 'fredrick_frimpong_279165', 'male', 'admin', '2024-11-25 16:44:28', '1'),
(2, 'Abigail ', 'Nketiah', 'nketiahabigail87@gmail.com', '0240595887', 'abigail _nketiah_909227', 'female', 'user', '2024-11-25 16:39:34', '1'),
(3, 'Rosalinda', 'Quansah', 'rose@gmail.com', '123456', 'rosalinda_quansah_553011', 'female', '', '2024-11-12 13:57:41', 'Pending'),
(13, 'Gloria', 'Twenewaah', 'gloria@gmail.com', '123456', 'gloria_twenewaah_952414', 'female', 'user', '2025-07-17 17:41:17', '1'),
(15, 'Elsie', 'Frimpong', 'nana@gmail.com', '$2y$10$r0J17CVPOYlTSYYjbY3dUuJz7Tthz3FGnxXXPgeo.3mwxlTiKv/m6', 'elsie_frimpong_588308', 'female', 'user', '2025-08-06 19:11:47', '1'),
(16, 'Fredrica', 'Frimpong', 'ohemaa@gmail.com', '$2y$10$h6SaXYevkW.pqskeE7JYR.qrFvyGgiv6k7s8BExRukIfrNVJt5/CS', 'fredrica_frimpong_886998', 'female', 'admin', '2025-08-06 19:24:38', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_commented` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `name`, `email`, `user_id`, `post_id`, `message`, `date_commented`) VALUES
(19, '', '', 3, 9, '\r\nThis is a rely good message', '2024-11-19 04:23:46'),
(20, '', '', 3, 9, '\r\nThis is a rely good message', '2024-11-19 04:24:37'),
(21, '', '', 3, 9, '\r\nThis is a rely good message', '2024-11-19 04:28:31'),
(22, '', '', 3, 9, '\r\nThis is a rely good message', '2024-11-19 04:28:49'),
(23, '', '', 3, 9, '\r\nThis is a rely good message', '2024-11-19 04:29:01'),
(24, '', '', 3, 9, '\r\nThis is a rely good message', '2024-11-19 04:52:36'),
(25, 'Rosalinda', 'Quansah', 3, 9, 'Comment', '2024-11-19 04:53:10'),
(26, 'Fredrica Frimpong', 'ohemaa@gmail.com', 3, 9, 'Very Nice Content', '2024-11-19 05:24:38'),
(27, 'Oppong Christian', 'oppongchristian884@gmail.com', 3, 10, 'This is a powerful message', '2024-11-19 07:25:55'),
(28, 'Tei Clement', 'teiclement@gmail.com', 1, 7, 'Very touching message', '2024-11-21 00:51:12'),
(29, 'sampson', 'joyceayeh716@gmail.com', 1, 7, 'yuguygu', '2024-11-21 00:53:47'),
(30, 'Frank Osei', 'oseifrank@gmail.com', 2, 11, 'Very deep and touching message', '2024-11-21 06:11:59'),
(31, 'Oppong Christian', 'oppongchristian884@gmail.com', 1, 7, 'idodhs', '2024-11-24 13:18:24'),
(32, 'Clinton Yeboah', 'clinton@gmail.com', 0, 22, 'woww', '2024-11-24 14:08:41'),
(33, 'sampson', 'joyceayeh716@gmail.com', 1, 7, 'hjhjh', '2024-11-28 15:41:44'),
(34, 'sampson', 'joyceayeh716@gmail.com', 0, 22, 'nice', '2024-12-06 15:19:10'),
(35, 'Yopoo Motivations', 'yopoo@gmail.com', 1, 7, 'Just testing', '2025-01-09 06:24:04'),
(36, 'sampson', 'joyceayeh716@gmail.com', 3, 10, 'Nice system', '2025-01-24 10:57:13'),
(37, 'sampson', 'joyceayeh716@gmail.com', 1, 8, 'hi', '2025-01-28 12:55:55'),
(38, 'Grace Adom', 'graceadom@gmail.com', 3, 9, 'hmm is ok\r\n', '2025-06-25 08:40:25'),
(39, 'JOYCE AYEH', 'joyceayeh716@gmail.com', 0, 23, 'Hello\r\n', '2025-06-27 10:10:49'),
(40, 'sampson Ayariga', 'joyceayeh716@gmail.com', 1, 8, 'This color dey bee ooo', '2025-07-12 20:52:35'),
(41, 'Oppong Christian', 'JOYCEAYEH716@GMAIL.COM', 0, 23, 'i hv seen it', '2025-07-17 17:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `dislike_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date_disliked` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`dislike_id`, `fname`, `lname`, `user_id`, `post_id`, `date_disliked`) VALUES
(21, 'fname', 'lname', 1, 7, '2025-01-09 05:24:01'),
(22, 'Fredrick', 'Frimpong', 1, 7, '2025-01-09 05:24:31'),
(23, 'Fredrick', 'Frimpong', 1, 7, '2025-01-09 05:28:21'),
(24, 'Yopoo ', 'Motivations', 2, 22, '2025-01-09 05:31:04'),
(25, 'Yopoo ', 'Motivations', 2, 22, '2025-01-09 05:35:15'),
(26, 'Yopoo ', 'Motivations', 2, 22, '2025-01-09 05:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date_liked` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `fname`, `lname`, `user_id`, `post_id`, `date_liked`) VALUES
(123, 'Fredrick', 'Frimpong', 0, 7, '2025-01-09'),
(131, 'Yopoo ', 'Motivations', 2, 22, '2025-01-09'),
(132, 'Yopoo ', 'Motivations', 2, 22, '2025-01-09'),
(133, 'Yopoo ', 'Motivations', 2, 22, '2025-01-09'),
(134, 'Yopoo ', 'Motivations', 2, 22, '2025-01-09'),
(135, 'Yopoo ', 'Motivations', 2, 22, '2025-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `profile_photo`
--

CREATE TABLE `profile_photo` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_photo`
--

INSERT INTO `profile_photo` (`profile_id`, `user_id`, `user_name`, `profession`, `image`, `date`) VALUES
(10, 1, 'fredrick_frimpong_406442', 'PHP Developer', '6731d0a6f2a8e.jpg', '2024-11-11 09:38:46'),
(11, 2, 'abigail _nketiah_723824', 'Front End Developer', '673210c294ff8.jpg', '2024-11-11 14:12:18'),
(12, 3, 'rosalinda_quansah_553011', 'Teacher', '6733601ccca73.jpg', '2024-11-12 14:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `comment_id` int(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_replied` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_profile_photo`
--
ALTER TABLE `admin_profile_photo`
  ADD PRIMARY KEY (`admin_profile_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `blog_users`
--
ALTER TABLE `blog_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`dislike_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `profile_photo`
--
ALTER TABLE `profile_photo`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_profile_photo`
--
ALTER TABLE `admin_profile_photo`
  MODIFY `admin_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `blog_users`
--
ALTER TABLE `blog_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `dislike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `profile_photo`
--
ALTER TABLE `profile_photo`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
