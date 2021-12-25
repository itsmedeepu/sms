-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql202.byetcluster.com
-- Generation Time: Nov 13, 2021 at 08:39 AM
-- Server version: 5.7.35-38
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_29766341_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `PASS` varchar(200) NOT NULL,
  `SECRET` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `NAME`, `EMAIL`, `PASS`, `SECRET`) VALUES
(1, 'admin', 'deekshithagowdan@gmail.com', 'deekshu', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `STUDENTID` varchar(200) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `DOB` varchar(200) NOT NULL,
  `GENDER` varchar(200) NOT NULL,
  `BGROUP` varchar(200) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `PHONE` varchar(200) NOT NULL,
  `STATE` varchar(200) NOT NULL,
  `DISTRICT` varchar(200) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `FATHER` varchar(200) NOT NULL,
  `MOTHER` varchar(200) NOT NULL,
  `SSCREG` varchar(200) NOT NULL,
  `PASSYEAR` varchar(200) NOT NULL,
  `BRANCH` varchar(200) NOT NULL,
  `HOSTEL` varchar(200) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PASS` varchar(200) NOT NULL,
  `USERAVTAR` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `STUDENTID`, `NAME`, `DOB`, `GENDER`, `BGROUP`, `EMAIL`, `PHONE`, `STATE`, `DISTRICT`, `ADDRESS`, `FATHER`, `MOTHER`, `SSCREG`, `PASSYEAR`, `BRANCH`, `HOSTEL`, `TIME`, `PASS`, `USERAVTAR`) VALUES
(6, '1BE21CO508', 'KADIRI PRATHUSHA', '2002-02-04', 'FEMALE', 'O+', 'kadiriprathusha101@gmail.com', '9347900322', 'Andhra Pradesh', 'PRAKASAM', 'Yapral (HI TENSION ROAD)', 'KADIRI', 'KADIRI', '99765433456789', '2017', 'COMPUTERS', 'NO', '2021-10-09 07:48:21', '2aad909b7cd2162ff0fc8cd70520579259937d8a', 'avtar/1633765665.png'),
(3, '1BE21CO875', 'VARSHITHA S', '2002-04-17', 'FEMALE', 'A+', 'varshisuresh1742@gmail.com', '7975522942', 'Karnataka', 'BANGALORE', '#57 tin factory', 'SURESH', 'SHILPA', '2017097123', '2019', 'COMPUTERS', 'NO', '2021-10-04 15:05:21', '3aea7614c44c483dcbbb391140cac79f6757d69c', 'avtar/1633359885.png'),
(7, '1BE21ME129', 'DEEPAK S', '2021-09-14', 'MALE', 'O+', 'dees18me@cmrit.ac.in', '7899197774', 'Karnataka', 'KOLAR', 'hmm', 'DEEPAK', 'DEEPADEEPAK', '201635881936', '2018', 'MECHANICAL', 'NO', '2021-10-29 04:20:06', '14a7287b25c155fd37f35a78a827b97c85c3f7e6', 'avtar/1635481170.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
