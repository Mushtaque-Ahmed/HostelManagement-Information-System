-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 09:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `contact`, `password`) VALUES
(1, 'GYANDEEP NATH', 'gyandeep@gmail.com', 1234567890, '12'),
(2, 'ADMIN', 'admin@gmail.com', 1234567890, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `name` int(255) NOT NULL,
  `complain_letter` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `name`, `complain_letter`) VALUES
(1, 0, 'Default checkboxes and radios are improved upon with the help of .form-check, a single class for both input types that improves the layout and behavior of their HTML elements. Checkboxes are for selecting one or several options in a list, while radios are for selecting one option from many.'),
(2, 0, 'An article is any member of a class of dedicated words that are used with noun phrases to mark the identifiability of the referents of the noun phrases. The category of articles constitutes a part of speech. In English, both \"the\" and \"a/an\" are articles, which'),
(2, 0, 'An article is any member of a class of dedicated words that are used with noun phrases to mark the identifiability of the referents of the noun phrases. The category of articles constitutes a part of speech. In English, both \"the\" and \"a/an\" are articles, which'),
(1, 0, ''),
(1, 0, 'HI I have an complain regarding hostel. My fan is not working  properly.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_username` varchar(100) NOT NULL,
  `s_email` varchar(100) NOT NULL,
  `s_password` varchar(100) NOT NULL,
  `s_dob` date NOT NULL,
  `s_contact` bigint(100) NOT NULL,
  `s_gname` varchar(100) NOT NULL,
  `s_gcontact` bigint(100) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `s_fname` varchar(100) NOT NULL,
  `s_mname` varchar(100) NOT NULL,
  `s_department` varchar(100) NOT NULL,
  `s_semester` varchar(50) NOT NULL,
  `s_roomid` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `complain` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_username`, `s_email`, `s_password`, `s_dob`, `s_contact`, `s_gname`, `s_gcontact`, `s_address`, `s_fname`, `s_mname`, `s_department`, `s_semester`, `s_roomid`, `status`, `complain`) VALUES
(1, 'ANSHUMAN GOGOI', 'a@gmail.com', '123', '2022-03-12', 123456789, 'CRPF', 1234567, '  asdfasf', 'a', 'b', 'bca', '5', '1234', 1, ''),
(2, 'RAHUL TALUKDAR', 'r@gmail.com', '123', '2022-03-14', 17854903, 'crp', 0, ' qweqrert', 's', 'r', '', '5', '321', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
