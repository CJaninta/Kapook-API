-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2019 at 11:59 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapook`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `Ex_ID` int(11) NOT NULL,
  `List_name` varchar(150) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`Ex_ID`, `List_name`, `Amount`, `Date`, `User_ID`) VALUES
(15, 'อาหาร', 400, '22-Oct-2019 / 05:39:20am', 66),
(16, 'ยา', 1500, '22-Oct-2019 / 05:39:25am', 66),
(18, 'ยา', 8000, '22-Oct-2019 / 05:49:11am', 67),
(19, 'ค่าไฟ', 1800, '22-Oct-2019 / 05:49:19am', 67);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `In_ID` int(11) NOT NULL,
  `List_name` varchar(150) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`In_ID`, `List_name`, `Amount`, `Date`, `User_ID`) VALUES
(223, 'เงินเดือน', 17800, '22-Oct-2019 / 05:45:38am', 67),
(230, 'เก็บได้', 8000, '22-Oct-2019 / 05:54:00am', 67),
(232, 'เงินเดือน', 2000000, '22-Oct-2019 / 05:57:00am', 66),
(233, 'แม่ให้', 5000, '22-Oct-2019 / 06:00:13am', 66),
(235, 'เงินเดือน', 20000, '22-Oct-2019 / 17:37:32pm', 67),
(236, 'แม่ให้', 20000, '22-Oct-2019 / 17:43:41pm', 67);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `Password`, `Email`) VALUES
(66, 'Chawalit_mac', 'password', 'toki_mac002@gmail.com'),
(67, 'macky', 'password', 'Chawalit_mac@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`Ex_ID`),
  ADD KEY `User_ID` (`User_ID`) USING BTREE;

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`In_ID`),
  ADD KEY `User_ID` (`User_ID`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `Ex_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `In_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
