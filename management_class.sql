-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 06:02 PM
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
-- Database: `management_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `accademicyear`
--

CREATE TABLE `accademicyear` (
  `id` int(11) NOT NULL,
  `year` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accademicyear`
--

INSERT INTO `accademicyear` (`id`, `year`, `date`) VALUES
(1, '2021/2022', '2023-07-13'),
(2, '2023/2024', '2023-07-13'),
(3, '2023/2024', '2023-07-13'),
(4, '2023/2024', '2023-07-13'),
(5, '2023/2024', '2023-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `adminId` varchar(10) NOT NULL,
  `name` tinytext NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthDate` date NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `gender` tinytext NOT NULL,
  `role` tinytext NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `images`, `adminId`, `name`, `email`, `birthDate`, `phoneNo`, `gender`, `role`, `password`, `date`) VALUES
(1, 'gyan.jpg', 'gyan123', 'Mends Gyan', 'gyan@gmail.com', '2023-07-21', 548348485, 'Male', 'Admin', '*9BDBC07A9', '2023-07-11'),
(2, 'IMG_20200424_102915.jpg', 'bcict20099', 'Emman', 'emma@gmail.com', '2023-07-28', 54, 'Male', 'Admin', 'emma', '2023-07-11'),
(3, 'gyan.jpg', 'bcict20010', 'Paa Kwasi', 'pkay@gmail.com', '2023-07-28', 548348485, 'Male', 'Admin', 'pkay123', '2023-07-11'),
(4, 'gyan.jpg', 'bcict20098', 'Mends Gyan', 'admin@gmail.com', '2023-07-27', 548348485, 'Male', 'Admin', 'gyan', '2023-07-11'),
(5, 'gyan.jpg', 'bcict20098', 'Mends Gyan', 'admin@gmail.com', '2023-07-28', 548348485, 'Male', 'Admin', 'admin', '2023-07-11'),
(6, 'gyan.jpg', 'bcict20098', 'Mends Gyan', 'admin@gmail.com', '2023-07-28', 548348485, 'Male', 'Admin', 'gyan', '2023-07-11'),
(7, 'gyan.jpg', 'bcict20098', 'Mends Gyan', 'admin@gmail.com', '2023-07-27', 548348485, 'Male', 'Admin', 'admin', '2023-07-11'),
(8, 'gyan.jpg', 'bcict20099', 'Mends Gyan', 'admin@mail.com', '2023-07-21', 548348485, 'Male', 'Admin', 'admin', '2023-07-11'),
(9, 'gyan.jpg', 'bcict20098', 'Mends Gyan', 'admin@mail.com', '2023-07-20', 548348485, 'Male', 'Admin', 'admin', '2023-07-11'),
(10, 'gyan.jpg', 'bcict20098', 'Mends Gyan', 'admin@mail.com', '2023-07-27', 548348485, 'Male', '', 'admin', '2023-07-11'),
(11, 'gyan.jpg', 'bcict20098', 'Mends Gyan', 'admin@mail.com', '2023-07-20', 548348485, 'Male', 'Admin', 'admin123', '2023-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `classese`
--

CREATE TABLE `classese` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `sub_class` tinytext DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classese`
--

INSERT INTO `classese` (`id`, `class_name`, `sub_class`, `teacher_id`, `date`) VALUES
(10, 'JHS ONE', 'C', 1, '2023-07-14'),
(11, 'JHS TWO', 'A', 1, '2023-07-14'),
(12, 'JHS THREE', 'B', 1, '2023-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `date`) VALUES
(1, 'Mathematics', '2023-07-12'),
(2, 'English', '2023-07-12'),
(3, 'Social', '2023-07-12'),
(4, 'French', '2023-07-12'),
(5, 'Science', '2023-07-12'),
(6, 'Pre-Technical Skills', '2023-07-12'),
(7, 'Religious and Moral Education', '2023-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `phoneNo` varchar(10) DEFAULT NULL,
  `gender` tinytext DEFAULT NULL,
  `role` tinytext DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `name`, `email`, `birthDate`, `phoneNo`, `gender`, `role`, `password`, `date`, `image`) VALUES
(1, 'Mends Gyan', 'admin@gmail.com', '2023-07-28', '0548348485', 'Male', 'parent\r\n', 'gyan', '2023-07-13', 'IMG_20200424_102915.jpg'),
(2, 'Mends Gyan', 'admin@gmail.com', '2023-07-29', '0548348485', 'Male', 'Admin', 'admin123', '2023-07-13', 'gyan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `student_id` int(50) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `semester` tinytext DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `sub_class` tinytext DEFAULT NULL,
  `subject` tinytext DEFAULT NULL,
  `marks` int(10) DEFAULT NULL,
  `result_type` tinytext DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `year`, `semester`, `class`, `sub_class`, `subject`, `marks`, `result_type`, `date`) VALUES
(6, 3, '2021/2022', 'Second Semester', ' JSH 1', 'A', 'English', 89, 'Examinatoin', '2023-07-14'),
(7, 3, '2021/2022', 'Second Semester', ' JSH 2', 'A', 'Pre-Technical Skills', 98, 'Examinatoin', '2023-07-14'),
(8, 3, '2021/2022', 'Second Semester', ' JSH1', 'A', 'Pre-Technical Skills', 40, 'Examinatoin', '2023-07-14'),
(10, 3, '2021/2022', 'First Semester', ' JHS ONE', 'A', 'English', 98, 'Examinatoin', '2023-07-14'),
(11, 3, '2021/2022', 'First Semester', 'JHS ONE', 'C', 'Social', 98, 'Examinatoin', '2023-07-14'),
(12, 3, '2021/2022', 'Second Semester', 'JHS ONE', 'C', 'French', 98, 'Examinatoin', '2023-07-14'),
(13, 3, '2021/2022', 'First Semester', 'JHS TWO', 'A', 'Pre-Technical Skills', 40, 'Examinatoin', '2023-07-14'),
(14, 3, '2021/2022', 'Second Semester', 'JHS TWO', 'A', 'Social', 98, 'Examinatoin', '2023-07-14'),
(15, 3, '2021/2022', 'First Semester', 'JHS THREE', 'B', 'French', 98, 'Examinatoin', '2023-07-14'),
(16, 3, '2021/2022', 'Second Semester', 'JHS THREE', 'A', 'Pre-Technical Skills', 89, 'Examinatoin', '2023-07-14');

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
(2, 'SHJHS1001', 't1', 'maths', 'homework', '23', 1, 'jhs1'),
(3, 'SHJHS1002', 't1', 'maths', 'homework', '55', 1, 'jhs1'),
(4, 'SHJHS1001', 't6', 'french', 'exercise', '17', 1, 'jhs1'),
(5, 'SHJHS1002', 't6', 'french', 'exercise', '10', 1, 'jhs1'),
(6, 'SHJHS1001', 't6', 'french', 'exam', '11', 1, 'jhs1'),
(7, 'SHJHS1003', 't6', 'french', 'exercise', '55', 1, 'jhs1');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`, `date`) VALUES
(1, 'First Semester', '2023-07-13'),
(2, 'Second Semester', '2023-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `phoneNo` varchar(10) DEFAULT NULL,
  `gender` tinytext DEFAULT NULL,
  `role` tinytext DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `birthDate`, `phoneNo`, `gender`, `role`, `password`, `date`, `image`, `parent_id`) VALUES
(1, 'Mends Gyan', 'mends@gmail.com', '2023-07-21', '08948984', 'Male', 'Admin', 'gyan', '2023-07-13', 'IMG_20200424_102915.jpg', NULL),
(2, 'Mends Gyan', 'admin@gmail.com', '2023-07-27', '0548348485', 'Male', 'Admin', 'gyan', '2023-07-13', 'IMG_20200424_102915.jpg', NULL),
(3, 'Mends Gyan', 'admin@gmail.com', '2023-07-21', '0548348485', 'Male', 'Admin', 'gyan', '2023-07-14', 'gyan.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `sub_class` tinytext DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `role` tinytext DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `std_id`, `email`, `class`, `password`, `role`, `parent_id`) VALUES
('student1', 's1', 'student1', 'jhs1', 'student1', NULL, NULL),
('student2', 's2', 'student2', 'jhs1', 'student2', NULL, NULL),
('student3', 's3', 'student3', 'jhs1', 'student3', NULL, NULL),
('student4', 's4', 'student4', 'jhs1', 'student4', NULL, NULL),
('Asana Coffie', 'SHJHS1001', 'shjhs1001@gmail.com', 'jhs1', 'shjhs1001', 'student', NULL),
('Janet Ahenkorah', 'SHJHS1002', 'shjhs1002@gmail.com', 'jhs1', 'shjhs1002', 'student', NULL),
('Janet Ahenkorah', 'SHJHS1003', 'shjhs1003@mail.com', 'jhs1', 'shjhs1003', 'student', NULL),
('Adwoa Ahenkorah', 'SHJHS2001', 'shjhs2001@gmail.com', 'jhs2', 'shjhs2001', 'student', NULL),
('Adwoa Ahenkorah', 'SHJHS2002', 'shjhs2002@gmail.com', 'jhs2', 'shjhs2002', NULL, NULL),
('Adwoa Ahenkorah', 'SHJHS2003', 'shjhs2003@gmail.com', 'jhs2', 'shjhs2003', 'student', NULL),
('Adwoa Ahenkorah', 'SHJHS3001', 'shjhs3001@gmail.com', 'jhs2', 'shjhs3001', 'student', NULL),
('Adwoa Ahenkorah', 'SHJHS3002', 'shjhs3003@gmail.com', 'jhs3', 'shjhs3003', 'student', NULL),
('Abigail Ahenkorah', 'SHJHS3003', 'shjhs3004@gmail.com', 'jhs3', 'shjhs3004', 'student', NULL),
('Oppong', 'student', 'student@gmail.com', 'jhs1', 'student', 'student', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentsubject`
--

CREATE TABLE `studentsubject` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsubject`
--

INSERT INTO `studentsubject` (`id`, `student_id`, `subject_id`, `date`) VALUES
(1, 1, 2, '2023-07-13'),
(2, 1, 1, '2023-07-13'),
(3, 1, 5, '2023-07-13'),
(4, 1, 1, '2023-07-13'),
(5, 1, 4, '2023-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `teacherclass`
--

CREATE TABLE `teacherclass` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `sub_class` tinytext DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `phoneNo` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `birthDate`, `phoneNo`, `gender`, `role`, `password`, `date`, `image`) VALUES
(1, 'Mends Gyan', 'gyan@gmail.com', '2023-07-28', '0548348485', 'Male', 'teacher', 'gyan', '2023-07-12', 'gyan.jpg'),
(2, 'Emmanuel', 'emma@gmail.com', '2023-07-28', '0548348485', 'Male', 'Admin', 'emma', '2023-07-12', 'gyan.jpg'),
(3, 'pkay', 'pkay@gmail.com', '2023-07-26', '0548348485', 'Male', 'teacher', 'pkay', '2023-07-14', 'IMG_20200424_102915.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accademicyear`
--
ALTER TABLE `accademicyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `classese`
--
ALTER TABLE `classese`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student_parents` (`parent_id`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `fk_students_parents` (`parent_id`);

--
-- Indexes for table `studentsubject`
--
ALTER TABLE `studentsubject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `teacherclass`
--
ALTER TABLE `teacherclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accademicyear`
--
ALTER TABLE `accademicyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `classese`
--
ALTER TABLE `classese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentclass`
--
ALTER TABLE `studentclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentsubject`
--
ALTER TABLE `studentsubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacherclass`
--
ALTER TABLE `teacherclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classese`
--
ALTER TABLE `classese`
  ADD CONSTRAINT `classese_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_parents` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`);

--
-- Constraints for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD CONSTRAINT `studentclass_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `studentclass_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classese` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_parents` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`);

--
-- Constraints for table `studentsubject`
--
ALTER TABLE `studentsubject`
  ADD CONSTRAINT `studentsubject_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `studentsubject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `teacherclass`
--
ALTER TABLE `teacherclass`
  ADD CONSTRAINT `teacherclass_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `teacherclass_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classese` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
