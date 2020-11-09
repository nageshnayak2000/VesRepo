-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 07:05 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vesrepo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `approved_status` bit(60) NOT NULL,
  `user_id` int(255) NOT NULL,
  `request_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cert_pic` blob NOT NULL,
  `date` date NOT NULL,
  `account_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `name` varchar(255) NOT NULL,
  `conducted` bit(60) NOT NULL,
  `attended` bit(60) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `duration` varchar(255) NOT NULL,
  `cert_pic` blob NOT NULL,
  `account_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `cert_pic` blob NOT NULL,
  `account_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `company_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `cert_pic` blob NOT NULL,
  `account_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `type` varchar(255) NOT NULL,
  `description` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `cert_pic` blob NOT NULL,
  `account_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper_published`
--

CREATE TABLE `paper_published` (
  `topic` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `website` varchar(255) NOT NULL,
  `account_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `account_id` int(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `social_media` varchar(255) NOT NULL,
  `profile_pic` blob NOT NULL,
  `display_pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` int(255) NOT NULL,
  `roll_no` int(255) NOT NULL,
  `year` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `user_id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(200) NOT NULL,
  `phone_no` int(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `ves_email` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `account_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `view_only`
--

CREATE TABLE `view_only` (
  `user_id` int(255) NOT NULL,
  `request_id` int(255) NOT NULL,
  `is_approved` bit(60) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `name` varchar(255) NOT NULL,
  `conducted` bit(60) NOT NULL,
  `attended` bit(60) NOT NULL,
  `date` date NOT NULL,
  `cert_pic` blob NOT NULL,
  `account_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`name`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`name`),
  ADD KEY `account_fk02` (`account_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`name`),
  ADD KEY `account_fk01` (`account_id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`company_name`),
  ADD KEY `account_fk03` (`account_id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD KEY `account_fk04` (`account_id`);

--
-- Indexes for table `paper_published`
--
ALTER TABLE `paper_published`
  ADD PRIMARY KEY (`topic`),
  ADD KEY `account_fk05` (`account_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD KEY `user_fk01` (`user_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD KEY `user_fk02` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `account_fk08` (`account_id`);

--
-- Indexes for table `view_only`
--
ALTER TABLE `view_only`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_fk03` (`user_id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`name`),
  ADD KEY `account_fk06` (`account_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `request_id` FOREIGN KEY (`request_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `competitions`
--
ALTER TABLE `competitions`
  ADD CONSTRAINT `account_id` FOREIGN KEY (`account_id`) REFERENCES `profile` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `account_fk02` FOREIGN KEY (`account_id`) REFERENCES `profile` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `account_fk01` FOREIGN KEY (`account_id`) REFERENCES `profile` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `account_fk03` FOREIGN KEY (`account_id`) REFERENCES `profile` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other`
--
ALTER TABLE `other`
  ADD CONSTRAINT `account_fk04` FOREIGN KEY (`account_id`) REFERENCES `profile` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paper_published`
--
ALTER TABLE `paper_published`
  ADD CONSTRAINT `account_fk05` FOREIGN KEY (`account_id`) REFERENCES `profile` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `user_fk01` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `user_fk02` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `account_fk08` FOREIGN KEY (`account_id`) REFERENCES `profile` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `view_only`
--
ALTER TABLE `view_only`
  ADD CONSTRAINT `user_fk03` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workshops`
--
ALTER TABLE `workshops`
  ADD CONSTRAINT `account_fk06` FOREIGN KEY (`account_id`) REFERENCES `profile` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
