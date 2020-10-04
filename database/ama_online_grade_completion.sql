-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 01:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `change_grade_request`
--

INSERT INTO `change_grade_request` (`id`, `p_q`, `p_cs`, `p_pe`, `p_ol`, `pg`, `m_q`, `m_cs`, `m_me`, `m_ol`, `mg`, `f_q`, `f_cs`, `f_fe`, `f_ol`, `fg`, `lec`, `lab`, `ave`, `grade`, `statuss`, `date_time`) VALUES
(1, 96, 96, 96, 0, 96, 96, 96, 96, 0, 96, 96, 96, 96, 0, 96, 96, 0, 96, '', '', '2020-04-07 17:41:40'),
(13, 77, 77, 89, 0, 83, 78, 99, 76, 0, 79, 89, 90, 77, 0, 83, 82, 88, 84, 'B+', '', '2020-04-08 15:17:52'),
(14, 89, 89, 90, 0, 90, 99, 90, 91, 0, 94, 71, 71, 88, 0, 80, 87, 89, 88, 'A-', '', '2020-04-08 15:12:01'),
(15, 99, 89, 90, 0, 94, 98, 88, 67, 0, 82, 67, 78, 60, 0, 65, 78, 80, 79, 'B', '', '2020-04-07 18:06:06');

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
  `date_upload` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `subject_code`, `class_number`, `trimester`, `description`, `units`, `school_year`, `date_upload`) VALUES
(13, 'IT341', '10559', '1st Trimester', 'IT MAJOR ELECTIVE 1', 3, '20-21', '2020-04-03 18:17:48'),
(14, 'IT 300B', '19191', '3rd Trimester', 'CISCO 4', 3, '20-21', '2020-04-05 18:44:24'),
(15, 'IT301', '121200000', '2nd Trimester', 'Web Prog 3', 3, '20-21', '2020-04-10 12:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `old_grades`
--

CREATE TABLE `old_grades` (
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
  `grade` varchar(2) NOT NULL,
  `sheet` varchar(20) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statuss` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_grades`
--

INSERT INTO `old_grades` (`id`, `usn`, `fullname`, `p_q`, `p_cs`, `p_pe`, `p_ol`, `pg`, `m_q`, `m_cs`, `m_me`, `m_ol`, `mg`, `f_q`, `f_cs`, `f_fe`, `f_ol`, `fg`, `lec`, `lab`, `ave`, `grade`, `sheet`, `teacher`, `date_time`, `statuss`) VALUES
(1, '2147483647', 'PRINCE ARCE', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'IC', 'f2f', 'teacher', '2020-04-06 02:16:00', 'teacher'),
(2, '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', 'teacher', '2020-04-06 02:16:00', 'teacher'),
(3, '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', 'teacher', '2020-04-06 02:16:01', 'teacher'),
(4, '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', 'teacher', '2020-04-06 02:16:01', 'teacher'),
(5, '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', 'teacher', '2020-04-06 02:16:02', 'teacher'),
(6, '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', 'teacher', '2020-04-06 02:16:02', 'teacher'),
(7, '0', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', 'teacher', '2020-04-06 02:16:02', 'teacher'),
(8, '2147483647', 'prince arce', 90, 90, 90, 0, 90, 89, 56, 77, 0, 80, 89, 67, 77, 0, 81, 83, 80, 82, 'B+', 'f2fleclab', 'teacher', '2020-04-08 01:03:00', 'teacher'),
(9, '2147483647', 'allen', 77, 77, 89, 0, 83, 78, 99, 76, 0, 79, 89, 90, 77, 0, 83, 82, 70, 77, 'B', 'f2fleclab', 'teacher', '2020-04-08 01:03:00', 'teacher'),
(10, '2147483647', 'jose rizal', 89, 89, 90, 0, 90, 99, 90, 91, 0, 94, 71, 71, 88, 0, 80, 87, 75, 82, 'B+', 'f2fleclab', 'teacher', '2020-04-08 01:03:00', 'teacher'),
(11, '2147483647', 'juan dela cruz', 99, 89, 90, 0, 94, 98, 88, 67, 0, 82, 67, 78, 60, 0, 65, 78, 50, 67, 'C+', 'f2fleclab', 'teacher', '2020-04-08 01:03:00', 'teacher'),
(12, '2147483647', 'prince arce', 90, 90, 90, 0, 90, 89, 56, 77, 0, 80, 89, 67, 70, 0, 77, 82, 0, 49, 'IC', 'f2fleclab', 'teacher', '2020-04-08 01:05:31', 'teacher'),
(13, '2147483647', 'allen', 77, 77, 89, 0, 83, 78, 99, 76, 0, 79, 89, 90, 77, 0, 83, 82, 0, 49, 'IC', 'f2fleclab', 'teacher', '2020-04-08 01:05:32', 'teacher'),
(14, '2147483647', 'jose rizal', 89, 89, 90, 0, 90, 99, 90, 91, 0, 94, 71, 71, 88, 0, 80, 70, 0, 42, 'IC', 'f2fleclab', 'teacher', '2020-04-08 01:05:32', 'teacher'),
(15, '16000110703', 'juan dela cruz', 99, 89, 90, 0, 94, 98, 88, 67, 0, 82, 67, 78, 60, 0, 65, 78, 0, 47, 'IC', 'f2fleclab', 'teacher', '2020-04-09 01:45:54', 'teacher');

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
  `date_upload` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statuss` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_grade`
--

INSERT INTO `table_grade` (`id`, `usn`, `fullname`, `p_q`, `p_cs`, `p_pe`, `p_ol`, `pg`, `m_q`, `m_cs`, `m_me`, `m_ol`, `mg`, `f_q`, `f_cs`, `f_fe`, `f_ol`, `fg`, `lec`, `lab`, `ave`, `grade`, `sheet`, `filename`, `teacher`, `subject_name`, `class_number`, `subject_code`, `date_upload`, `statuss`) VALUES
(1, '16000110700', 'PRINCE ARCE', 96, 96, 96, 0, 96, 96, 96, 96, 0, 96, 96, 96, 96, 0, 96, 96, 0, 96, '', 'f2f', '', 'teacher', '', '19191', 'IT 300B', '2020-04-10 15:20:17', 'done'),
(2, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', '', 'teacher', '', '19191', 'IT 300B', '2020-04-05 19:16:00', 'teacher'),
(3, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', '', 'teacher', '', '19191', 'IT 300B', '2020-04-05 19:16:00', 'teacher'),
(4, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', '', 'teacher', '', '19191', 'IT 300B', '2020-04-05 19:16:01', 'teacher'),
(5, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', '', 'teacher', '', '19191', 'IT 300B', '2020-04-05 19:16:02', 'teacher'),
(6, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', '', 'teacher', '', '19191', 'IT 300B', '2020-04-05 19:16:02', 'teacher'),
(7, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'f2f', '', 'teacher', '', '19191', 'IT 300B', '2020-04-05 19:16:02', 'teacher'),
(8, '16000110700', 'prince arce', 90, 90, 90, 0, 90, 89, 56, 77, 0, 80, 89, 67, 77, 0, 81, 83, 80, 82, 'B+', 'f2fleclab', '', 'teacher', '', '19191', 'IT 300B', '2020-04-07 18:03:00', 'teacher'),
(9, '16000110701', 'allen', 77, 77, 89, 0, 83, 78, 99, 76, 0, 79, 89, 90, 77, 0, 83, 82, 70, 77, 'B', 'f2fleclab', '', 'teacher', '', '19191', 'IT 300B', '2020-04-07 18:03:00', 'teacher'),
(10, '16000110702', 'jose rizal', 89, 89, 90, 0, 90, 99, 90, 91, 0, 94, 71, 71, 88, 0, 80, 87, 75, 82, 'B+', 'f2fleclab', '', 'teacher', '', '19191', 'IT 300B', '2020-04-07 18:03:00', 'teacher'),
(11, '16000110703', 'juan dela cruz', 99, 89, 90, 0, 94, 98, 88, 67, 0, 82, 67, 78, 60, 0, 65, 78, 50, 67, 'C+', 'f2fleclab', '', 'teacher', '', '19191', 'IT 300B', '2020-04-07 18:03:00', 'teacher'),
(12, '16000110700', 'prince arce', 90, 90, 90, 0, 90, 89, 56, 77, 0, 80, 89, 67, 70, 0, 77, 82, 0, 49, 'IC', 'f2fleclab', '', 'teacher', '', '10559', 'IT341', '2020-04-07 18:05:31', 'teacher'),
(13, '16000110701', 'allen', 77, 77, 89, 0, 83, 78, 99, 76, 0, 79, 89, 90, 77, 0, 83, 82, 88, 84, 'B+', 'f2fleclab', '', 'teacher', '', '10559', 'IT341', '2020-04-09 16:06:36', 'done'),
(14, '16000110702', 'jose rizal', 89, 89, 90, 0, 90, 99, 90, 91, 0, 94, 71, 71, 88, 0, 80, 70, 0, 42, 'IC', 'f2fleclab', '', 'teacher', '', '10559', 'IT341', '2020-04-08 15:12:01', 'dean'),
(15, '16000110703', 'juan dela cruz', 99, 89, 90, 0, 94, 98, 88, 67, 0, 82, 67, 78, 60, 0, 65, 78, 80, 79, 'B', 'f2fleclab', '', 'teacher', '', '10559', 'IT341', '2020-04-08 15:03:50', 'done');

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
  `date_upload` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacher` varchar(100) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `doc_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_teacher`
--

INSERT INTO `upload_teacher` (`id`, `filename`, `size`, `type`, `downloads`, `date_upload`, `teacher`, `subject_code`, `doc_type`) VALUES
(589, '04-06-20-IT 300B-19191.csv', 356, '', 0, '2020-04-05 19:16:00', 'teacher', '', 'grade_sheet'),
(590, '04-08-20-IT 300B-19191.csv', 521, '', 0, '2020-04-07 18:03:00', 'teacher', '', 'grade_sheet'),
(591, '04-08-20-IT341-10559.csv', 507, '', 1, '2020-04-07 18:25:29', 'teacher', '', 'grade_sheet'),
(592, '16000110703-10559-IT341-1st Trimester-20-21-recommedation_letter.pdf', 0, '', 3, '2020-04-10 14:04:23', '16000110703', 'IT341', 'recom_letter'),
(593, '16000110701-10559-IT341-1st Trimester-20-21-recommedation_letter.pdf', 0, '', 1, '2020-04-10 12:28:25', '16000110701', 'IT341', 'recom_letter'),
(594, '16000110700-19191-IT 300B-3rd Trimester-20-21-recommedation_letter.pdf', 0, '', 1, '2020-04-10 15:22:00', '16000110700', 'IT 300B', 'recom_letter');

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
(13, 'Robin k Hood banana', 1, '17002302900', 'd9b1d7db4cd6e70935368a1efb10e377'),
(14, 'Remeline P. Alnaru', 6, 'SD_LIPA', '202cb962ac59075b964b07152d234b70'),
(15, 'AMAICSys -- ADMIN', 5, '0000', '8e71bb6a423a913a22bcc23655283741'),
(17, 'Prince Carrable Arce', 1, '16000110700', 'a2eba14bde87fd6edc6f5a7cc39abbc4');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `old_grades`
--
ALTER TABLE `old_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_grade`
--
ALTER TABLE `table_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `upload_teacher`
--
ALTER TABLE `upload_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
