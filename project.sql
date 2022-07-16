-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 09:02 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Compiler Design', 'Compiler Design is the structure and set of principles that guide the translation, analysis, and optimization process of a compiler.'),
(2, 'Computer Networks', 'A computer network is a set of computers sharing resources located on or provided by network nodes.'),
(3, 'Linear Algebra', 'Linear algebra is the branch of mathematics concerning linear equations, linear maps and their representations in vector spaces and through matrices.'),
(4, 'Java Programming', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible'),
(5, 'OOPS', 'Object-oriented programming is a programming paradigm based on the concept of objects, which can contain data and code: data in the form of fields, and code, in the form of procedures.'),
(6, 'Software Engineering', 'Software engineering is the systematic application of engineering approaches to the development of software.'),
(19, 'Theory of Computation', 'Mathematical subject');

-- --------------------------------------------------------

--
-- Table structure for table `quacat`
--

CREATE TABLE `quacat` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quacat`
--

INSERT INTO `quacat` (`id`, `category`) VALUES
(1, 'Compiler Design'),
(44, 'Java Programming');

-- --------------------------------------------------------

--
-- Table structure for table `quans`
--

CREATE TABLE `quans` (
  `id` int(11) UNSIGNED NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` longtext DEFAULT NULL,
  `askedby` varchar(255) NOT NULL,
  `answeredby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quans`
--

INSERT INTO `quans` (`id`, `question`, `answer`, `askedby`, `answeredby`) VALUES
(1, 'What is the difference between Overloading and Overriding?', 'When you have two methods of the same name but having different properties, the case is called Overloading. On the other hand, Overriding refers to a situation where two methods with the same name and properties occur, but the two occurring in a parent and child class respectively.<br>or<br>hdg', 'VP', 'VP2305'),
(44, 'What is JIT compiler?', 'Just-In-Time(JIT) compiler: It is used to improve the performance. JIT compiles parts of the bytecode that have similar functionality at the same time, and hence reduces the amount of time needed for compilation. Here the term “compiler” refers to a translator from the instruction set of a Java virtual machine (JVM) to the instruction set of a specific CPU.<br>or<br>Abc<br>or<br>Aaa', 'Navvya', 'Ishu, @ Navvya');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Type` varchar(20) NOT NULL DEFAULT 'STUDENT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `join_date`, `Type`) VALUES
(34, 'Ishu', '$2y$10$k3KVIRpAjfuAzodvFD.gJe71jog77R87P57ng6MzL0VkZ9khHyvFS', 'Ishwarya', 'ishwariya@gmail.com', '2022-01-07 13:09:19', 'MENTOR'),
(35, 'Ishu1', '$2y$10$NuTT7v8yRgnGt6BLIenp5e/O5mbktarplk6cUJw01W7Ji1wB5W2we', 'Iss', 'iss@gmail.com', '2022-01-07 13:21:09', 'STUDENT'),
(36, 'Navvya', '$2y$10$qFst5lzmuW4shUa9csvQJ.GWswcX97qe6OwHYsRzQnod9rRWBTu56', 'Navvya', 'navvya@gmail.com', '2022-01-07 13:28:47', 'STUDENT'),
(1, 'VP', 'vitchu23', 'Vishnupriya', 'vishnupriyacbe23@gmail.com', '2021-11-30 18:30:00', 'STUDENT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`,`name`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `quacat`
--
ALTER TABLE `quacat`
  ADD PRIMARY KEY (`category`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `quans`
--
ALTER TABLE `quans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `askedby` (`askedby`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quans`
--
ALTER TABLE `quans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quacat`
--
ALTER TABLE `quacat`
  ADD CONSTRAINT `quacat_ibfk_1` FOREIGN KEY (`id`) REFERENCES `quans` (`id`),
  ADD CONSTRAINT `quacat_ibfk_3` FOREIGN KEY (`category`) REFERENCES `category` (`name`);

--
-- Constraints for table `quans`
--
ALTER TABLE `quans`
  ADD CONSTRAINT `quans_ibfk_1` FOREIGN KEY (`askedby`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
