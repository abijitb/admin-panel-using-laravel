-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 07:10 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `long_questions`
--

CREATE TABLE `long_questions` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `subject_code` varchar(1000) NOT NULL,
  `year` varchar(1000) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `suggestion` longtext NOT NULL,
  `status` int(255) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `long_questions`
--

INSERT INTO `long_questions` (`id`, `user_id`, `subject_code`, `year`, `question`, `answer`, `suggestion`, `status`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'BCA103', '2016', '<p>Why use C?</p>\r\n', '<p>C was initially used for system development work, particularly the programs that make-up the operating system. C was adopted as a system development language because it produces code that runs nearly as fast as the code written in assembly language.</p>\r\n', '', 1, '::1', '2018-02-19 18:15:49', '2018-02-19 18:15:49'),
(2, 1, 'BCA104', '2013', '<p>How you can connect with cloud service on word 2013 ?</p>\r\n', '<p>To connect with the cloud service on word 2013 you have to go to</p>\r\n\r\n<p>a Main Menu &nbsp;Open One Drive &nbsp;click on sign in option &nbsp; enter the e-mail address and it will connect you with cloud service</p>\r\n', '', 1, '::1', '2018-02-19 18:23:29', '2018-02-19 18:23:29'),
(3, 1, 'BCA103', '2016', '<p>What is a stack?</p>\r\n', '<p>A stack is one form of a data structure. Data is stored in stacks using the FILO (First In Last Out) approach. At any particular instance, only the top of the stack is accessible, which means that in order to retrieve data that is stored inside the stack, those on the upper part should be extracted first. Storing data in a stack is also referred to as a PUSH, while data retrieval is referred to as a POP.</p>\r\n', '', 2, '::1', '2018-02-19 18:31:07', '2018-02-23 11:23:40'),
(4, 1, 'BCA104', '2015', '<p>How to add foot-node &amp; end note in word?</p>\r\n', '<p>To add foot node, bring the cursor at the end of page where you want to add the foot node than go to main menu click on Reference Option click on Insert Footnotes. &nbsp;Likewise you can add end note by clicking on &ldquo;Insert endnote&rdquo;.</p>\r\n', '', 0, '::1', '2018-02-19 18:31:49', '2018-02-19 18:31:49'),
(5, 1, 'BCA101', '2011', '<p>aaaaa ww wew&nbsp; w w ee ?</p>\r\n', '<p>ds dfs ds&nbsp; dfe esrwer wdr ewrw&nbsp;</p>\r\n', 'https://www.google.co.in/?gfe_rd=cr&dcr=0&ei=VEGQWqbFN5PK8Aecrr6QCA<br /><br /><br /><br /><br /><br /><br />\r\nhttps://www.youtube.com/<br /><br /><br /><br />', 1, '::1', '2018-02-23 16:29:28', '2018-05-28 16:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `mcq_questions`
--

CREATE TABLE `mcq_questions` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `subject_code` varchar(1000) NOT NULL,
  `year` varchar(1000) NOT NULL,
  `question` longtext NOT NULL,
  `option1` longtext NOT NULL,
  `option2` longtext NOT NULL,
  `option3` longtext NOT NULL,
  `option4` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `status` int(255) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_questions`
--

INSERT INTO `mcq_questions` (`id`, `user_id`, `subject_code`, `year`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `status`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'BCA103', '2012', '<p>Which of the following statements should be used to obtain a remainder after dividing 3.14 by 2.1 ?</p>\r\n', 'rem = 3.14 % 2.1;', 'rem = modf(3.14, 2.1)', 'rem = fmod(3.14, 2.1);', 'Remainder cannot be obtain in floating point division.', 'rem = fmod(3.14, 2.1);', 1, '::1', '2018-02-19 18:11:42', '2018-02-23 16:45:44'),
(2, 1, 'BCA103', '2013', '<p>What are the types of linkages?</p>\r\n', 'Internal and External', 'External, Internal and Non', 'External and None', 'Internal', 'External, Internal and Non', 1, '::1', '2018-02-19 18:13:18', '2018-05-28 16:59:24'),
(3, 1, 'BCA104', '2013', '<p>What is gutter margin ?</p>\r\n', 'Margin that is added to right margin when printing', 'Margin that is added to the left margin when printing', 'Margin that is added to the outside of the page when printing', 'Margin that is added to the binding side of page when printing', 'Margin that is added to the binding side of page when printing', 0, '::1', '2018-02-19 18:22:14', '2018-02-23 11:22:02'),
(4, 1, 'BCA104', '2014', '<p>Landscape is ?</p>\r\n', 'A font style', 'Paper Size', 'Page Layout', 'Page Orientation', 'Page Orientation', 0, '::1', '2018-02-19 18:22:58', '2018-02-19 18:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_code` varchar(500) NOT NULL,
  `subject_name` varchar(1000) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_code`, `subject_name`, `ip_address`, `created_at`, `updated_at`) VALUES
('BCA101', 'Digital Electronics', '::1', '2018-02-17 15:41:32', '2018-02-17 15:41:32'),
('BCA102', 'Business Systems and Applications', '::1', '2018-02-17 15:42:38', '2018-02-17 15:42:38'),
('BCA103', 'Introduction to Programming', '::1', '2018-02-17 15:43:08', '2018-02-17 15:43:08'),
('BCA104', 'PC Software', '::1', '2018-02-17 15:43:51', '2018-02-17 15:43:51'),
('BCA193', 'Programming Lab (C/ Pascal)', '::1', '2018-02-17 15:44:22', '2018-02-17 15:44:22'),
('BCA194', 'PC Software Lab', '::1', '2018-02-17 15:44:08', '2018-02-17 15:44:08'),
('BCA401', 'Data Base Management System', '::1', '2018-03-10 08:17:04', '2018-03-10 08:17:04'),
('BM101', 'Mathematics', '::1', '2018-02-17 15:43:27', '2018-02-17 15:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role` int(255) NOT NULL,
  `first_name` varchar(1000) NOT NULL,
  `last_name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `display_name` varchar(1000) NOT NULL,
  `avatar` varchar(1000) NOT NULL,
  `commentst` varchar(1000) NOT NULL,
  `remember_token` varchar(1000) NOT NULL,
  `phone_no` varchar(1000) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `status` int(255) NOT NULL,
  `last_ip_address` varchar(1000) NOT NULL,
  `last_login` datetime NOT NULL,
  `forgot` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `email`, `password`, `user_name`, `display_name`, `avatar`, `commentst`, `remember_token`, `phone_no`, `ip_address`, `status`, `last_ip_address`, `last_login`, `forgot`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$nRwbYYRr9LbgJgV8L6ANuuES0nZMN1EaU1c3xhaq8hUt0IhJ1tQw.', 'admin', '', '', '', 'RabEH3aLdKuBIkWyhdLk3S0ZT669dVwEwM4naXO13KQct8Yd6V6YMNafiElt', '9876543210', '::1', 1, '::1', '2018-05-28 17:05:40', '', '2018-05-28 16:25:26', '2018-05-28 17:02:40'),
(5, 2, 'staff', 'staff', 'staff@gmail.com', '$2y$10$bjgMSLbN27f15cCuR/n28esxLCk4CE9BmloTWV6caGMketlEikRT.', 'staff', '', '', '', 'qsZwvjMMm2nLikdAGVR460ky6xw78X3uHKXugU9hwGwxVVFKDvO98OwY3x87', '9638527410', '::1', 1, '::1', '2018-05-28 17:05:25', '', '2018-05-28 17:00:49', '2018-05-28 17:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `year` varchar(500) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`year`, `ip_address`, `created_at`, `updated_at`) VALUES
('2011', '::1', '2018-02-17 16:08:29', '2018-02-17 16:08:29'),
('2012', '::1', '2018-02-17 16:08:41', '2018-02-17 16:08:41'),
('2013', '::1', '2018-02-17 16:08:44', '2018-02-17 16:08:44'),
('2014', '::1', '2018-02-17 16:08:48', '2018-02-17 16:08:48'),
('2015', '::1', '2018-02-17 16:08:51', '2018-02-17 16:08:51'),
('2016', '::1', '2018-02-17 16:08:54', '2018-02-17 16:08:54'),
('2017', '::1', '2018-02-17 16:08:56', '2018-02-17 16:08:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `long_questions`
--
ALTER TABLE `long_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `long_questions`
--
ALTER TABLE `long_questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mcq_questions`
--
ALTER TABLE `mcq_questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;
