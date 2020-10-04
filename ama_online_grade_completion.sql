-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 07:53 AM
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
-- Database: `ama_online_grade_completion`
--

-- --------------------------------------------------------

--
-- Table structure for table `change_grade_request`
--

CREATE TABLE `change_grade_request` (
  `id` int(11) NOT NULL,
  `p_q` int(100) NOT NULL,
  `p_cs` int(100) NOT NULL,
  `p_pe` int(100) NOT NULL,
  `p_ol` int(100) NOT NULL,
  `pg` int(100) NOT NULL,
  `m_q` int(100) NOT NULL,
  `m_cs` int(100) NOT NULL,
  `m_me` int(100) NOT NULL,
  `m_ol` int(100) NOT NULL,
  `mg` int(100) NOT NULL,
  `f_q` int(100) NOT NULL,
  `f_cs` int(100) NOT NULL,
  `f_fe` int(100) NOT NULL,
  `f_ol` int(100) NOT NULL,
  `fg` int(100) NOT NULL,
  `lec` int(3) NOT NULL,
  `lab` int(3) NOT NULL,
  `ave` int(100) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `statuss` varchar(10) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(30) NOT NULL,
  `class_number` varchar(30) NOT NULL,
  `trimester` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `units` int(30) NOT NULL,
  `school_year` varchar(10) NOT NULL,
  `date_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `old_grades`
--

CREATE TABLE `old_grades` (
  `id` int(11) NOT NULL,
  `usn` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `p_q` int(3) NOT NULL,
  `p_cs` int(3) NOT NULL,
  `p_pe` int(3) NOT NULL,
  `p_ol` int(3) NOT NULL,
  `pg` int(3) NOT NULL,
  `m_q` int(3) NOT NULL,
  `m_cs` int(3) NOT NULL,
  `m_me` int(3) NOT NULL,
  `m_ol` int(3) NOT NULL,
  `mg` int(3) NOT NULL,
  `f_q` int(3) NOT NULL,
  `f_cs` int(3) NOT NULL,
  `f_fe` int(3) NOT NULL,
  `f_ol` int(3) NOT NULL,
  `fg` int(3) NOT NULL,
  `lec` int(3) NOT NULL,
  `lab` int(3) NOT NULL,
  `ave` int(3) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `sheet` varchar(20) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statuss` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_grade`
--

CREATE TABLE `table_grade` (
  `id` int(11) NOT NULL,
  `usn` varchar(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `p_q` int(3) NOT NULL,
  `p_cs` int(3) NOT NULL,
  `p_pe` int(3) NOT NULL,
  `p_ol` int(3) NOT NULL,
  `pg` int(3) NOT NULL,
  `m_q` int(3) NOT NULL,
  `m_cs` int(3) NOT NULL,
  `m_me` int(3) NOT NULL,
  `m_ol` int(3) NOT NULL,
  `mg` int(3) NOT NULL,
  `f_q` int(3) NOT NULL,
  `f_cs` int(3) NOT NULL,
  `f_fe` int(3) NOT NULL,
  `f_ol` int(3) NOT NULL,
  `fg` int(3) NOT NULL,
  `lec` int(3) NOT NULL,
  `lab` int(3) NOT NULL,
  `ave` int(3) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `sheet` varchar(20) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `class_number` varchar(50) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `date_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statuss` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_sched`
--

CREATE TABLE `teacher_sched` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `monday` varchar(15) NOT NULL,
  `tuestday` varchar(15) NOT NULL,
  `wednesday` varchar(15) NOT NULL,
  `thursday` varchar(15) NOT NULL,
  `friday` varchar(15) NOT NULL,
  `saturday` varchar(15) NOT NULL,
  `sunday` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_teacher`
--

CREATE TABLE `upload_teacher` (
  `id` int(11) NOT NULL,
  `filename` varchar(300) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `downloads` int(11) NOT NULL,
  `date_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teacher` varchar(100) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `doc_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `usertype` int(10) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `usertype`, `username`, `pass`) VALUES
(2, 'de Chavez John Allen Belen', 5, 'admin', '202cb962ac59075b964b07152d234b70'),
(3, 'de Chavez John Allen Belen', 1, '1500554200', '202cb962ac59075b964b07152d234b70'),
(4, 'teacher teacher teacher', 2, 'teacher', '202cb962ac59075b964b07152d234b70'),
(5, 'dean dean dean', 3, 'dean', '202cb962ac59075b964b07152d234b70'),
(6, 'Michael Berana', 2, 'teacher2', '202cb962ac59075b964b07152d234b70'),
(10, 'John Allen Belen de Chavez', 1, '15000554200', '202cb962ac59075b964b07152d234b70'),
(11, 'RegistrarL RegistrarN RegistrarM', 4, 'registrar', '202cb962ac59075b964b07152d234b70'),
(12, 'Ricardo k Dalisay', 1, '18002511800', '202cb962ac59075b964b07152d234b70'),
(13, 'Robin k Hood', 1, '17002302900', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `change_grade_request`
--
ALTER TABLE `change_grade_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_grades`
--
ALTER TABLE `old_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_grade`
--
ALTER TABLE `table_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_teacher`
--
ALTER TABLE `upload_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `change_grade_request`
--
ALTER TABLE `change_grade_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `old_grades`
--
ALTER TABLE `old_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `table_grade`
--
ALTER TABLE `table_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `upload_teacher`
--
ALTER TABLE `upload_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=584;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
