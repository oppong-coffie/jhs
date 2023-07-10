-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 06:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `images` varchar(50) DEFAULT NULL,
  `admin_id` varchar(10) DEFAULT NULL,
  `name` tinytext DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `images`, `admin_id`, `name`, `email`, `phone`, `birth_date`, `password`, `date`, `role`) VALUES
(1, 'admin.jpg', 'admin', 'admin', 'admin@gmail.com', 1234, '0000-00-00', 'admin', '0000-00-00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `std_id` varchar(250) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `role` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `std_id`, `email`, `password`, `role`) VALUES
(1, 'SHJHS1001', 'p1@gmail.com', 'p1', 'parent');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(10) NOT NULL,
  `std_id` varchar(250) DEFAULT NULL,
  `teacher_id` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `mark` varchar(250) DEFAULT NULL,
  `term` int(250) DEFAULT NULL,
  `class` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `std_id`, `teacher_id`, `subject`, `type`, `mark`, `term`, `class`) VALUES
(1, NULL, 's2', 'maths', 'exercise', '20', 1, 'jhs1'),
(3, 's1', 't1', 'maths', 'exercise', '23', 1, 'jhs1'),
(5, 's3', 't1', 'maths', 'exercise', '15', NULL, ''),
(6, 's4', 't1', 'maths', 'exercise', '23', NULL, ''),
(7, 's4', 't1', 'maths', 'exercise', '23', NULL, ''),
(8, 's4', 't1', 'maths', 'exercise', '23', NULL, ''),
(9, 's4', 't1', 'maths', 'exercise', '23', NULL, ''),
(10, 'SHJHS2001', 't1', 'maths', 'exercise', '23', NULL, 'jhs2'),
(11, 'SHJHS1001', 't1', 'maths', 'exercise', '17', 1, 'jhs1'),
(12, 'SHJHS1002', 't1', 'maths', 'exercise', '12', 1, 'jhs1'),
(13, 'SHJHS1003', 't1', 'maths', 'exercise', '15', 1, 'jhs1'),
(14, 'SHJHS2002', 't1', 'maths', 'exercise', '14', 1, 'jhs2'),
(15, 'SHJHS2002', 't1', 'maths', 'exercise', '16', 1, 'jhs2'),
(16, 'SHJHS2003', 't1', 'maths', 'exercise', '11', 1, 'jhs2'),
(18, 'SHJHS3001', 't1', 'maths', 'exercise', '9', 1, 'jhs3'),
(19, 'SHJHS3002', 't1', 'maths', 'exercise', '22', 1, 'jhs3'),
(20, 'SHJHS1001', 't1', 'maths', 'homework', '23', 1, 'jhs1'),
(21, 'SHJHS1002', 't1', 'maths', 'homework', '11', 1, 'jhs1'),
(22, 'SHJHS1003', 't1', 'maths', 'homework', '12', 1, 'jhs1'),
(23, 'SHJHS2001', 't1', 'maths', 'homework', '11', 1, 'jhs2'),
(24, 'SHJHS2002', 't1', 'maths', 'homework', '23', 1, 'jhs2'),
(25, 'SHJHS2003', 't1', 'maths', 'homework', '15', 1, 'jhs2'),
(26, 'SHJHS1001', 't2', 'english', 'exercise', '23', 1, 'jhs1'),
(27, 'SHJHS1002', 't2', 'english', 'exercise', '11', 1, 'jhs1'),
(28, 'SHJHS1003', 't2', 'english', 'exercise', '10', 1, 'jhs1'),
(29, 'SHJHS1001', 't3', 'science', 'exam', '50', 1, 'jhs1'),
(30, 'SHJHS2002', 't3', 'science', 'exam', '45', 1, 'jhs1'),
(31, 'SHJHS1003', 't3', 'science', 'exam', '66', 1, 'jhs1'),
(32, 'SHJHS1001', 't4', 'social studies', 'homework', '11', 1, 'jhs1'),
(33, 'SHJHS2002', 't4', 'social studies', 'homework', '15', 1, 'jhs1'),
(34, 'SHJHS1003', 't4', 'social studies', 'homework', '11', 1, 'jhs1'),
(37, 'SHJHS1001', 't5', 'BDT', 'exercise', '11', 1, 'jhs1'),
(38, 'SHJHS1002', 't5', 'BDT', 'exercise', '14', 1, 'jhs1'),
(39, 'SHJHS1003', 't5', 'BDT', 'exercise', '10', 1, 'jhs1'),
(40, 'SHJHS1001', 't6', 'french', 'exam', '45', 1, 'jhs1'),
(41, 'SHJHS1002', 't6', 'french', 'exam', '70', 1, 'jhs1'),
(42, 'SHJHS1003', 't6', 'french', 'exam', '23', 1, 'jhs1'),
(43, 'SHJHS1001', 't7', 'R M E', 'homework', '10', 1, 'jhs1'),
(44, 'SHJHS1002', 't7', 'R M E', 'homework', '7', 1, 'jhs1'),
(45, 'SHJHS1003', 't7', 'R M E', 'homework', '5', 1, 'jhs1'),
(46, 'SHJHS1001', 't8', 'Creative Art', 'exercise', '11', 1, 'jhs1'),
(47, 'SHJHS1002', 't8', 'Creative Art', 'exercise', '11', 1, 'jhs1'),
(48, 'SHJHS1003', 't8', 'Creative Art', 'exercise', '10', 1, 'jhs1'),
(49, 'SHJHS1001', 't8', 'Creative Art', 'homework', '10', 1, 'jhs1'),
(50, 'SHJHS1002', 't8', 'Creative Art', 'homework', '7', 1, 'jhs1'),
(51, 'SHJHS1003', 't8', 'Creative Art', 'homework', '6', 1, 'jhs1'),
(52, 'SHJHS1001', 't8', 'Creative Art', 'exam', '45', 1, 'jhs1'),
(53, 'SHJHS1002', 't8', 'Creative Art', 'exam', '23', 1, 'jhs1'),
(54, 'SHJHS1003', 't8', 'Creative Art', 'exam', '66', 1, 'jhs1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(250) DEFAULT NULL,
  `std_id` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `class` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `std_id`, `email`, `class`, `password`, `role`) VALUES
('student1', 's1', 'student1', 'jhs1', 'student1', NULL),
('student2', 's2', 'student2', 'jhs1', 'student2', NULL),
('student3', 's3', 'student3', 'jhs1', 'student3', NULL),
('student4', 's4', 'student4', 'jhs1', 'student4', NULL),
('Asana Coffie', 'SHJHS1001', 'shjhs1001@gmail.com', 'jhs1', 'shjhs1001', 'student'),
('Janet Ahenkorah', 'SHJHS1002', 'shjhs1002@gmail.com', 'jhs1', 'shjhs1002', 'student'),
('Janet Ahenkorah', 'SHJHS1003', 'shjhs1003@mail.com', 'jhs1', 'shjhs1003', 'student'),
('Adwoa Ahenkorah', 'SHJHS2001', 'shjhs2001@gmail.com', 'jhs2', 'shjhs2001', 'student'),
('Adwoa Ahenkorah', 'SHJHS2002', 'shjhs2002@gmail.com', 'jhs2', 'shjhs2002', NULL),
('Adwoa Ahenkorah', 'SHJHS2003', 'shjhs2003@gmail.com', 'jhs2', 'shjhs2003', 'student'),
('Adwoa Ahenkorah', 'SHJHS3001', 'shjhs3001@gmail.com', 'jhs2', 'shjhs3001', 'student'),
('Adwoa Ahenkorah', 'SHJHS3002', 'shjhs3003@gmail.com', 'jhs3', 'shjhs3003', 'student'),
('Abigail Ahenkorah', 'SHJHS3003', 'shjhs3004@gmail.com', 'jhs3', 'shjhs3004', 'student'),
('Oppong', 'student', 'student@gmail.com', 'jhs1', 'student', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `teacher_id` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` tinytext DEFAULT NULL,
  `jhs1` varchar(250) NOT NULL,
  `jhs2` varchar(250) NOT NULL,
  `jhs3` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `teacher_id`, `subject`, `mobile`, `email`, `password`, `role`, `jhs1`, `jhs2`, `jhs3`) VALUES
(1, 'teacher1', 't1', 'maths', '1', 'teacher1@gmail.com', 'teacher1', 'teacher', 'jhs1', 'q', 'q'),
(2, 'teacher2', 't2', 'english', '1', 'teacher2@gmail.com', 'teacher2', 'teacher', 'jhs1', '', ''),
(3, 'teacher3', 't3', 'science', '1', 'teacher3@gmail.com', 'teacher3', 'teacher', 'jhs1', 'jhs2', ''),
(4, 'Coffie oppong', 't4', 'social studies', '0246414197', 'teacher4@gmail.com', 'teacher4', 'teacher', 'jhs1', 'jhs2', 'jhs3'),
(5, 'Coffie oppong', 't5', 'BDT', '0246414197', 'teacher5@gmail.com', 'teacher5', 'teacher', 'jhs1', 'jhs2', 'jhs3'),
(6, 'Coffie oppong', 't6', 'french', '0246414197', 'teacher6@gmail.com', 'teacher6', 'teacher', 'jhs1', 'jhs2', 'jhs3'),
(7, 'Coffie oppong', 't7', 'R M E', '0246414197', 'teacher7@gmail.com', 'teacher7', 'teacher', 'jhs1', 'jhs2', ''),
(8, 'teacher8', 't8', 'Creative Art', '1', 'teacher8@gmail.com', 'teacher8', 'teacher', 'jhs1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term1 _start` date NOT NULL,
  `term1 _end` date NOT NULL,
  `term2_start` date NOT NULL,
  `term2_end` date NOT NULL,
  `term3_start` date NOT NULL,
  `term3_end` date NOT NULL,
  `current_term` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term1 _start`, `term1 _end`, `term2_start`, `term2_end`, `term3_start`, `term3_end`, `current_term`) VALUES
('2023-06-19', '2023-06-14', '2023-06-08', '2023-06-23', '2023-06-08', '2023-06-15', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
