-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 05:47 AM
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
-- Table structure for table `table_grade`
--

CREATE TABLE `table_grade` (
  `id` int(11) NOT NULL,
  `usn` varchar(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `p_q` int(3) NOT NULL,
  `p_cs` int(3) NOT NULL,
  `p_ol` int(3) NOT NULL,
  `p_pe` int(3) NOT NULL,
  `pg` int(3) NOT NULL,
  `m_q` int(3) NOT NULL,
  `m_cs` int(3) NOT NULL,
  `m_ol` int(3) NOT NULL,
  `m_me` int(3) NOT NULL,
  `mg` int(3) NOT NULL,
  `f_q` int(3) NOT NULL,
  `f_cs` int(3) NOT NULL,
  `f_ol` int(3) NOT NULL,
  `f_fe` int(3) NOT NULL,
  `fg` int(3) NOT NULL,
  `ave` int(3) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_grade`
--

INSERT INTO `table_grade` (`id`, `usn`, `fullname`, `p_q`, `p_cs`, `p_ol`, `p_pe`, `pg`, `m_q`, `m_cs`, `m_ol`, `m_me`, `mg`, `f_q`, `f_cs`, `f_ol`, `f_fe`, `fg`, `ave`, `grade`, `email`) VALUES
(279, '15000554200', 'John allen de chavez', 89, 29, 89, 78, 78, 98, 89, 88, 87, 88, 66, 88, 99, 77, 66, 0, 'IC', ''),
(280, '12199919999', 'Prince Arce', 89, 29, 89, 78, 78, 98, 89, 88, 87, 88, 66, 88, 99, 77, 66, 0, 'C', ''),
(281, '13424242222', 'Ben Lawrence', 89, 29, 89, 78, 78, 98, 89, 88, 87, 88, 66, 88, 99, 77, 66, 0, 'A', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_grade`
--
ALTER TABLE `table_grade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_grade`
--
ALTER TABLE `table_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
