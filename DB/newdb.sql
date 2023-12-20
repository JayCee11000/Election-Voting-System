-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 07:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `CandidateID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `positionid` int(11) DEFAULT NULL,
  `partylistid` int(11) DEFAULT NULL,
  `candidatename` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`CandidateID`, `UserID`, `positionid`, `partylistid`, `candidatename`) VALUES
(10, NULL, 1, 1, 'asd'),
(12, NULL, 2, 1, 'janoh'),
(13, NULL, 2, 2, 'jowreyn petlamu'),
(14, NULL, 1, 3, 'Mark Joren Espiritu'),
(15, NULL, 7, 3, 'Janielin La Pena'),
(16, NULL, 8, 2, 'Aaron Lance Martinez'),
(17, NULL, 1, 3, 'Judd Wycoco'),
(18, NULL, 8, 1, 'Jeyyysssii'),
(19, NULL, 4, 2, 'john');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentid` int(11) NOT NULL,
  `departmentcode` varchar(5) NOT NULL,
  `departmentname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `partylist`
--

CREATE TABLE `partylist` (
  `partylistid` int(11) NOT NULL,
  `partyname` varchar(50) NOT NULL,
  `motto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partylist`
--

INSERT INTO `partylist` (`partylistid`, `partyname`, `motto`) VALUES
(1, 'waves', 'DRINKDRINK!'),
(2, 'kahit ano', 'eto rin'),
(3, 'janoh', 'tatatag ang mundo gamit ang isipan ng tao');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `positionid` int(11) NOT NULL,
  `positionname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`positionid`, `positionname`) VALUES
(1, 'President'),
(2, 'Vice President'),
(3, 'Secretary'),
(4, 'Auditor'),
(5, 'Treasurer'),
(6, 'sgt @ arms'),
(7, 'Muse'),
(8, 'Escort');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `resultid` int(11) NOT NULL,
  `votersid` int(11) DEFAULT NULL,
  `candidateid` int(11) DEFAULT NULL,
  `remarks` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`resultid`, `votersid`, `candidateid`, `remarks`) VALUES
(7, 2, 14, 'yes'),
(8, 2, 12, 'yes'),
(9, 2, 15, 'yes'),
(10, 2, 16, 'yes'),
(11, 1, 17, 'yes'),
(12, 1, 12, 'yes'),
(13, 1, 15, 'yes'),
(14, 1, 16, 'yes'),
(15, 3, 17, 'yes'),
(16, 3, 12, 'yes'),
(17, 3, 15, 'yes'),
(18, 3, 16, 'yes'),
(19, 4, 14, 'yes'),
(20, 4, 13, 'yes'),
(21, 4, 15, 'yes'),
(22, 4, 16, 'yes'),
(23, NULL, 14, 'yes'),
(24, NULL, 12, 'yes'),
(25, NULL, 15, 'yes'),
(26, NULL, 16, 'yes'),
(27, 5, 14, 'yes'),
(28, 5, 12, 'yes'),
(29, 5, 15, 'yes'),
(30, 5, 16, 'yes'),
(31, 7, 14, 'yes'),
(32, 7, 12, 'yes'),
(33, 7, 19, 'yes'),
(34, 7, 15, 'yes'),
(35, 7, 16, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `temp_credentials`
--

CREATE TABLE `temp_credentials` (
  `id` int(11) NOT NULL,
  `temp_username` varchar(50) NOT NULL,
  `temp_password` varchar(255) NOT NULL,
  `expiration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_credentials`
--

INSERT INTO `temp_credentials` (`id`, `temp_username`, `temp_password`, `expiration_date`) VALUES
(5, 'temp_yJ8G', 'ljywuDsU', '0000-00-00 00:00:00'),
(7, 'temp_dWS5', 'yDi8aA6t', '0000-00-00 00:00:00'),
(9, 'temp_SXpN', 'nwQSXL4o', '0000-00-00 00:00:00'),
(11, 'juddd', 'Ci7d4wJ2', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `department` varchar(350) NOT NULL,
  `yearlevel` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `barangay` varchar(500) NOT NULL,
  `street` varchar(500) NOT NULL,
  `municipality` varchar(500) NOT NULL,
  `housenumber` varchar(500) NOT NULL,
  `nationality` varchar(500) NOT NULL,
  `imagepath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `firstname`, `lastname`, `middlename`, `department`, `yearlevel`, `age`, `barangay`, `street`, `municipality`, `housenumber`, `nationality`, `imagepath`) VALUES
(1, 'jc', 'pangilinan', 'legaspi', 'bscpe', 3, 19, 'niyugan', 'magtalas', 'jaen', '', 'filipino', 'DB/images/cisco 2 4.2.7.png'),
(2, 'jc', 'pangilinan', 'legaspi', 'asdasd', 2, 12, 'samen', 'don', 'saaa', '', 'filipino', 'DB/images/001.png'),
(3, 'judd', 'wycoco', 'aguilar', 'bscpe', 3, 16, 'plasinan', 'kahit san', 'donlang', '', 'english', 'DB/images/Screenshot 2023-03-01 111014.png'),
(4, 'ano', 'nalang', 'asdasd', 'asdasd', 2, 34, 'asd', 'asd', 'asd', '', 'asd', 'DB/images/03.png'),
(5, 'juan miguel', 'apolonio', 'l', 'cect', 4, 57, 'sapang', 'crossing', 'jaen', '', 'german', 'DB/images/Gaming_5000x3125.jpg'),
(6, 'mark aaron', 'espirimartin', 'JR', 'bscpe', 2, 88, 'dimagiba', 'kalsada', 'jaen', '', 'asian', 'DB/images/Gaming_5000x3125.jpg'),
(7, 'mark aaron', 'espirimartin', 'JR', 'bscpe', 2, 88, 'dimagiba', 'kalsada', 'jaen', '', 'asian', 'DB/images/Gaming_5000x3125.jpg'),
(8, 'mark aaron', 'espirimartin', 'JR', 'bscpe', 2, 88, 'dimagiba', 'kalsada', 'jaen', '', 'asian', 'DB/images/Gaming_5000x3125.jpg'),
(9, 'john sth', 'doe', 'joren', 'bscpe', 3, 55, 'don', 'kalsada', 'san isidro', '', 'german', 'DB/images/Gaming_5000x3125.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `websiteaccounts`
--

CREATE TABLE `websiteaccounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websiteaccounts`
--

INSERT INTO `websiteaccounts` (`account_id`, `username`, `password`, `email`) VALUES
(4, 'temp_3go8', 'jejejojo', ''),
(5, 'temp_1SNb', 'johncarlo', ''),
(6, 'temp_vsvg', 'hahaha', ''),
(7, 'temp_usIJ', 'judd', ''),
(8, 'janie', 'janie', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`CandidateID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `positionid` (`positionid`),
  ADD KEY `partylistid` (`partylistid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `partylist`
--
ALTER TABLE `partylist`
  ADD PRIMARY KEY (`partylistid`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`positionid`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`resultid`),
  ADD KEY `votersid` (`votersid`),
  ADD KEY `candidateid` (`candidateid`);

--
-- Indexes for table `temp_credentials`
--
ALTER TABLE `temp_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `websiteaccounts`
--
ALTER TABLE `websiteaccounts`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `CandidateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partylist`
--
ALTER TABLE `partylist`
  MODIFY `partylistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `positionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `resultid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `temp_credentials`
--
ALTER TABLE `temp_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `websiteaccounts`
--
ALTER TABLE `websiteaccounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `candidate_ibfk_2` FOREIGN KEY (`positionid`) REFERENCES `positions` (`positionid`),
  ADD CONSTRAINT `candidate_ibfk_3` FOREIGN KEY (`partylistid`) REFERENCES `partylist` (`partylistid`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`votersid`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`candidateid`) REFERENCES `candidate` (`CandidateID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
