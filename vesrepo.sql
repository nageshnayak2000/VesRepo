-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 02:43 PM
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

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`name`, `description`, `cert_pic`, `date`, `account_id`) VALUES
('DeepBlue', 'Hackathon', 0x323032302d31312d3133, '0000-00-00', 0);

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
  `account_id` int(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`company_name`, `start_date`, `end_date`, `cert_pic`, `account_id`, `Role`) VALUES
('Edunomics', '2020-11-05', '2020-11-29', 0x62672e6a7067, 0, 'Web developer'),
('Wipro', '2020-11-13', '2020-11-26', 0x666c61742d64657369676e2d7765622d706167652d74656d706c617465732d6f6e6c696e652d726563727569746d656e742d6a6f625f353337392d3130312e7631202831292e6a7067, 0, 'Jr Developer');

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

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`type`, `description`, `date`, `cert_pic`, `account_id`) VALUES
('Chess winner', 'National level', '2020-11-07', 0x62672e6a7067, 0);

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
  `user_id` int(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `social_media` varchar(255) NOT NULL,
  `profile_pic` blob NOT NULL,
  `display_pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`account_id`, `user_id`, `hobbies`, `social_media`, `profile_pic`, `display_pic`) VALUES
(1010, 1001, 'Coding', '2018.vv@ves.ac.in', '', ''),
(1011, 1004, 'Reading', '2019.mm@ves.ac.in', '', '');

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
  `branch` varchar(255) NOT NULL,
  `semester` int(255) NOT NULL,
  `roll_no` int(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `phone_no`, `password`, `ves_email`, `first_name`, `last_name`, `branch`, `semester`, `roll_no`, `year`) VALUES
(1001, 2147483647, 'vv', 'nageshnayak2050@gmail.com', 'nagesh', 'nayak', 'INST', 0, 0, ''),
(1003, 2147483647, 'qq', '2018.nagesh.nayak@ves.ac.in', 'nagesh', 'nayak', 'INFT', 1, 0, 'First Year'),
(1004, 2147483647, '1c4f0c6eb8bf8bbf11cc2ae1cdcc5c5d1f3a3c16', '2018.nagesh.nayak@ves.ac.in', 'nagesh', 'nayak', 'INFT', 1, 12, 'First Year'),
(1005, 2147483647, '17ba0791499db908433b80f37c5fbc89b870084b', '2018.nagesh.nayak@ves.ac.in', 'nagesh', 'nayak', 'INFT', 1, 11, 'First Year'),
(1006, 0, '8effee409c625e1a2d8f5033631840e6ce1dcb64', '2018.nagesh.nayak@ves.ac.in', 'nagesh', 'nayak', 'INFT', 1, 66, 'First Year');

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
  ADD KEY `user_fk0` (`user_id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`company_name`);

--
-- Indexes for table `paper_published`
--
ALTER TABLE `paper_published`
  ADD PRIMARY KEY (`topic`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `user_fk1` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `account_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `user_fk0` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `user_fk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;