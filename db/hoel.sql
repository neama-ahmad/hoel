-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 يونيو 2024 الساعة 05:20
-- إصدار الخادم: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoel`
--

-- --------------------------------------------------------

--
-- بنية الجدول `equiv`
--

CREATE TABLE `equiv` (
  `ID` int(6) NOT NULL,
  `SubjName` varchar(70) NOT NULL,
  `SubjCode` varchar(6) NOT NULL,
  `SubjNum` varchar(4) NOT NULL,
  `SubjHours` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `majorinfo`
--

CREATE TABLE `majorinfo` (
  `ID` int(6) NOT NULL,
  `YourCollege` varchar(120) DEFAULT NULL,
  `YourMajor` varchar(120) DEFAULT NULL,
  `YourResult` varchar(6) DEFAULT NULL,
  `YourHours` float DEFAULT NULL,
  `userID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `transform`
--

CREATE TABLE `transform` (
  `ID` int(6) NOT NULL,
  `newCollege` varchar(120) NOT NULL,
  `newMajor` varchar(120) NOT NULL,
  `userID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `ID` int(6) NOT NULL,
  `fullName` varchar(55) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`ID`, `fullName`, `email`, `pass`, `role`) VALUES
(4, 'Eng.Neama ', 'hoelplatform@gmail.com', 'Aa2022##', 'admin');

-- --------------------------------------------------------

--
-- بنية الجدول `video`
--

CREATE TABLE `video` (
  `ID` int(9) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `video`
--

INSERT INTO `video` (`ID`, `link`) VALUES
(1, 'nRUWT3fiFf8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equiv`
--
ALTER TABLE `equiv`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `majorinfo`
--
ALTER TABLE `majorinfo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `transform`
--
ALTER TABLE `transform`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equiv`
--
ALTER TABLE `equiv`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majorinfo`
--
ALTER TABLE `majorinfo`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transform`
--
ALTER TABLE `transform`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `majorinfo`
--
ALTER TABLE `majorinfo`
  ADD CONSTRAINT `majorinfo_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- القيود للجدول `transform`
--
ALTER TABLE `transform`
  ADD CONSTRAINT `transform_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
