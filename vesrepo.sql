-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 03:19 PM
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
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `approved_status` bit(60) NOT NULL,
  `user_id` int(255) NOT NULL,
  `request_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `approved_status`, `user_id`, `request_id`) VALUES
('sapna@ves.ac.in', 'sapna', b'000000000000000000000000000000000000000000000000000000000001', 101, 1022),
('sapna@ves.ac.in', 'sapna', b'000000000000000000000000000000000000000000000000000000000001', 101, 1022);

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
('DeepBlue', 'Hackathon competition. Received 3rd prize.', 0x323032302d31322d3132, '0000-00-00', 10027),
('SIH', 'hackathon', 0x323032302d31322d3132, '0000-00-00', 10031);

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

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`name`, `start_date`, `end_date`, `cert_pic`, `account_id`) VALUES
('Django Complete', '2020-11-07', '2020-11-15', '', 1012),
('Ethical Hacking', '2020-12-04', '2020-12-27', '', 10027),
('Php', '2020-12-02', '2020-12-20', '', 10027);

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
('CliqStart', '2020-12-11', '2020-12-26', '', 10027, 'Jr Developer'),
('Edunomics', '2020-11-06', '2020-11-29', '', 0, 'Jr Developer'),
('Figma', '2020-11-05', '2020-11-29', 0x616c61726d2e6a7067, 10020, 'Jr Developer'),
('JBD', '2020-11-06', '2020-11-28', '', 10020, 'Web developer'),
('Margo Elec', '2020-12-03', '2020-12-27', '', 10020, 'Jr Developer'),
('Microsoft', '2020-11-06', '2020-11-28', '', 10002, 'Jr Developer'),
('pbj', '0000-00-00', '0000-00-00', '', 0, ''),
('Pikstok', '2020-11-05', '2020-11-28', '', 10020, 'Web developer'),
('Plato', '2020-11-07', '2020-11-21', '', 10020, 'Web developer'),
('Quantiphi', '0000-00-00', '0000-00-00', '', 0, ''),
('TechSolutions', '2020-11-05', '2020-11-26', '', 10021, 'Software Developer'),
('times', '0000-00-00', '0000-00-00', '', 0, ''),
('WebEngage', '2020-12-12', '2020-12-31', '', 10027, 'Web developer'),
('WebTech', '2020-12-12', '2020-12-25', '', 10031, 'Web developer');

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
('Chess winner', 'Won 1st prize', '2020-12-18', '', 10027),
('Chess winner', '3rd prize winner', '2020-12-12', '', 10027);

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
(1011, 1004, 'Reading', '2019.mm@ves.ac.in', '', ''),
(10002, 1009, '', '', '', ''),
(10017, 1010, '', '', '', ''),
(10019, 1011, '', '', '', ''),
(10020, 1012, 'coding', '', '', ''),
(10021, 1013, '', '', '', ''),
(10022, 1014, '', '', '', ''),
(10023, 1015, '', '', '', ''),
(10024, 1016, '', '', '', ''),
(10025, 1017, '', '', '', ''),
(10026, 1018, '', '', '', ''),
(10027, 1019, 'coding', '', '', ''),
(10028, 1020, '', '', '', ''),
(10029, 1021, '', '', '', ''),
(10030, 1022, '', '', '', ''),
(10031, 1023, '', '', '', '');

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
(101, 1234567890, 'sapna', 'sapna@ves.ac.in', 'sapna', 'patwa', 'it', 5, 22, 'first'),
(1000, 1234567890, 'sapna', 'sapna@ves.ac.in', 'sapna', 'patwa', 'it', 5, 22, 'first'),
(1001, 2147483647, 'vv', 'nageshnayak2050@gmail.com', 'nagesh', 'nayak', 'INST', 0, 0, ''),
(1003, 2147483647, 'qq', '2018.nagesh.nayak@ves.ac.in', 'nagesh', 'nayak', 'INFT', 1, 0, 'First Year'),
(1004, 2147483647, '1c4f0c6eb8bf8bbf11cc2ae1cdcc5c5d1f3a3c16', '2018.nagesh.nayak@ves.ac.in', 'nagesh', 'nayak', 'INFT', 1, 12, 'First Year'),
(1005, 2147483647, '17ba0791499db908433b80f37c5fbc89b870084b', '2018.nagesh.nayak@ves.ac.in', 'nagesh', 'nayak', 'INFT', 1, 11, 'First Year'),
(1006, 0, '8effee409c625e1a2d8f5033631840e6ce1dcb64', '2018.nagesh.nayak@ves.ac.in', 'nagesh', 'nayak', 'INFT', 1, 66, 'First Year'),
(1008, 1234568790, 'ff9dedefe9ee78b3339d23163d8b29a3c83c6016', 'jd@gmail.com', 'Jd', 'Jd', 'INFT', 1, 55, 'First Year'),
(1009, 2147483647, '110c8a30c16070bf2813480d9492a1a170a7d80a', 'll@gmail.com', 'Arya', 'lolo', 'INFT', 1, 88, 'First Year'),
(1010, 2147483647, '6d3236ec3c88039ca534b81acad564e847ecb062', 'pp@gmail.com', 'lulu', 'pp', 'INFT', 1, 77, 'First Year'),
(1011, 2147483647, 'cd1b646ebd1f6844c60dd91951c6867e43857114', 'so@gmail.com', 'Shlesha', 'oo', 'COMP', 5, 44, 'Third Year'),
(1012, 2147483647, 'e067b0486639afb997c04c24de3cb95bb74f6b23', 'anu@gmail.com', 'Anu', 'nn', 'INFT', 1, 77, 'First Year'),
(1013, 2147483647, '8b2357213c6def665b79c46ac43e562ce5e10eef', 'rahul@ves.ac.in', 'Rahul', 'Jeet', 'INFT', 1, 45, 'First Year'),
(1014, 2147483647, '89cc476073cdc03fc26699f1dd9be12e8d339baf', 'man@ves.ac.in', 'Manasi', 'Vaidya', 'INFT', 1, 78, 'First Year'),
(1015, 2147483647, '604e0509066c5aa1b16945d040b79d8db4566033', 'meera@ves.ac.in', 'Meera', 'Kadam', 'INFT', 1, 77, 'First Year'),
(1016, 2147483647, '32d991d4868eca38c27f7ef8df10711595ab6558', 'izzy@ves.ac.in', 'Izzy', 'Leroy', 'INFT', 1, 50, 'First Year'),
(1017, 2147483647, 'b42a6d93d796915222f6ffb2ffdd6137d93c1cdb', 'ali@ves.ac.in', 'Ali', 'Goni', 'INFT', 1, 4, 'First Year'),
(1018, 2147483647, '63973ab5058977b0ef4f258e0abf98a3807413fa', 'anmol@ves.ac.in', 'Anmol', 'Rohra', 'INFT', 1, 2, 'First Year'),
(1019, 2147483647, '9f01eccbee39352e8ced117f9a9f9420544fac5c', 'megha@ves.ac.in', 'Megha ', 'Shahri', 'INFT', 1, 5, 'First Year'),
(1020, 2147483647, '974e9e2006ec43d25f7e8b16de63505f31e18473', 'kiran@ves.ac.in', 'Kiran', 'Patel', 'INFT', 1, 6, 'First Year'),
(1021, 2147483647, '168b30c1f2bbc46a23deb01752c3d95e1e3bfca1', 'janak@ves.ac.in', 'Janak', 'Pathak', 'INFT', 1, 45, 'First Year'),
(1022, 2147483647, '5061a9072a55ba0dcafbfe3138da6abfdc2415df', 'karan@ves.ac.in', 'Karan', 'Wahi', 'INFT', 1, 56, 'First Year'),
(1023, 2147483647, '8d7bf2041120a75c66d390a385ccd8ec0dd118e1', 'naina@ves.ac.in', 'Naina', 'Prasad', 'INFT', 1, 23, 'First Year');

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
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`name`, `conducted`, `attended`, `date`, `cert_pic`, `account_id`) VALUES
('Django', b'000000000000000000000000000000000000000000000000000000000000', b'000000000000000000000000000000000000000000000000000000000000', '2020-11-06', '', 10020),
('Tkinter Python', b'000000000000000000000000000000000000000000000000000000000000', b'000000000000000000000000000000000000000000000000000000000000', '2020-12-19', '', 10027);

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
  MODIFY `account_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10032;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

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
