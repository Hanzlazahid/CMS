-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 04:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(31, 'React'),
(32, 'Node'),
(33, 'Express'),
(34, 'MongoDB'),
(35, 'Bootstrap'),
(36, 'HTML'),
(37, 'CSS'),
(38, 'Javascript'),
(39, 'PHP'),
(40, 'Laravel');

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
(21, 58, 'Ahmed', 'ahmed@gmail.com', 'My Name is ahmed.', 'Approved', '2022-10-27'),
(22, 56, 'Hanzla', 'hanzla@gmail.com', 'This is an amazing blog', 'Approved', '2022-10-27'),
(23, 57, 'Ahsan', 'ahsan@gmail.com', 'This is a helpful and informative blog', 'unapproved', '2022-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(56, 31, 'React', 'Jordan Walke', '2022-10-27', 'react.jfif', 'We typically have a number of projects being worked on at any time, ranging from the more experimental to the clearly defined. Looking ahead, we’d like to start regularly sharing more about what we’ve been working on with the community across these projects.\r\n\r\nTo set expectations, this is not a roadmap with clear timelines. Many of these projects are under active research and are difficult to put concrete ship dates on. They may possibly never even ship in their current iteration depending on what we learn. Instead, we want to share with you the problem spaces we’re actively thinking about, and what we’ve learned so far.', 'javascript,react,mern', 1, 'published'),
(57, 32, 'Node', 'Ryan Dahl', '2022-10-27', 'node.png', 'As we mentioned in the previous article, at NodeSource, we are dedicated to observability in our day-to-day, and we know that a great way to extend our reach and interoperability is to include the Opentelemetry framework as a standard in our development flows; because in the end our vision is to achieve high-performance software, and it is what we want to accompany the journey of developers in their Node.js base applications.\r\n\r\nWith this, we know that understanding the bases was very important to know the standard and its scope, but that it is necessary to put it into practice. How to integrate Opentelemetry in our application?; and although NodeSource has direct integration into its product in addition to more than 10 key functionalities in N|Solid, that extend the offer of a traditional APM, as you know, we are great contributors to the Open Source project, we also support the binary distributions of the Node.js project, our DNA is always helping the community and showing you how through Open Source tools you can still increase the visibility. So through this article, we want to share how to set up OpenTelemetry with Open Source tools.\r\n\r\nIn this article, you will find How to Apply the OpenTelemetry OS framework in your Node.js Application, which includes:\r\n\r\nStep 1: Export data to the backend\r\nStep 2: Set up the Open Telemetry SDK\r\nStep 3: Inspect Prometheus to review we&#039;re receiving data\r\nStep 4: Inspect Jaeger to review we&#039;re receiving data\r\nStep 5: Getting deeper at Jaeger 👀', 'node,javascript,mern', 1, 'published'),
(58, 35, 'Bootstrap', 'Mark Otto', '2022-10-27', 'bootstrap.jfif', 'In the official Bootstrap documentation, Bootstrap states that they &quot;prefer to write HTML and CSS over JavaScript&quot; due to HTML and CSS performing faster in the browser, along with being more available and accessible to developers of all different levels of experience.\r\n\r\nWhen creating SB UI Kit Pro, we have followed Bootstrap’s recommended approach to extending the Bootstrap framework, giving you a clean, functional, and highly extendable product that can be used by a wider range of developers or varying levels.\r\n\r\nWhen you purchase a pro product from Start Bootstrap, you receive product support from the developers who created the product. Our support includes bug fixes and improvements to the base product. We don&#039;t sell third party products on Start Bootstrap, so there&#039;s never a question of quality from product to product.', 'bootstrap', 1, 'published'),
(59, 33, 'Express', 'George C. Chesbro', '2022-10-27', 'express.jfif', 'Node.js on-board resources. Lastly we installed the Express module and configured simple routes as application end points that respond to http client requests. In this Part 2 I would like to take a closer look at the most important functionalities of Express with you. At the end of this article I will develop a small blog app. This blog app reads and writes data to a data file using HTTP POST requests and data are displayed in response to HTTP GET requests.\r\n\r\nYou install the Express module locally in the application root directory using npm package manager.\r\n\r\nWhat happens here ? The express() function is exported from the express module using the require() function and referenced to the variable express. The express() function is basically the main function within the Express Framework and documented in detail in the API reference. The express() function generates an Application Object which is stored in the variable app. The Application Object is also well documented in the API reference and has methods that can be attached to this object such as methods for Routing HTTP requests and configure Middleware. We will see some hands on lines of code to understand Routing and Middleware in this article.', 'express,javascript,mern', 0, 'draft'),
(60, 31, 'REACT 2', 'Jordan Walke', '2022-10-27', 'react.jfif', 'We typically have a number of projects being worked on at any time, ranging from the more experimental to the clearly defined. Looking ahead, we’d like to start regularly sharing more about what we’ve been working on with the community across these projects. To set expectations, this is not a roadmap with clear timelines. Many of these projects are under active research and are difficult to put concrete ship dates on. They may possibly never even ship in their current iteration depending on what we learn. Instead, we want to share with you the problem spaces we’re actively thinking about, and what we’ve learned so far.\r\n\r\n', 'react,javascript', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(3) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `fname`, `lname`, `email`, `phone`, `msg`) VALUES
(2, 'sufyan', 'Zahid', 'sufyan488@gmail.com', '0333 227 0516', 'brainmotif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(8, 'Hanzla', 'hanzla', 'Hanzla', 'Zahid', 'hanzlazahid488@gmail.com', '', 'Admin', ''),
(9, 'Andrew', 'andrew', 'Andrew', 'Tate', 'andrew@gmail.com', '', 'Subscriber', ''),
(31, 'demo', 'demo', 'demo', 'demo', 'demo@gmail.com', '', 'Admin', '$2y$10$iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

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
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
