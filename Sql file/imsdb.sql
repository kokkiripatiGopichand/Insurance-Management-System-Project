-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 07:30 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `CategoryName` varchar(45) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `CategoryName`, `CreationDate`) VALUES
(1, 'Health Insurance', '2019-02-09 18:30:00'),
(3, 'Life insurance', '2019-02-11 09:00:19'),
(4, 'Vehicle Insurance', '2019-02-14 07:03:05'),
(5, 'Crop Insurance', '2019-02-14 07:50:55'),
(6, 'Marine Insurance', '2019-02-14 10:43:46'),
(7, 'Test Demo', '2019-02-21 17:00:32'),
(8, 'Demo Cat', '2019-02-21 17:07:16'),
(9, 'test category', '2019-02-21 17:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblimsadmin`
--

CREATE TABLE `tblimsadmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminUsername` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblimsadmin`
--

INSERT INTO `tblimsadmin` (`ID`, `AdminName`, `AdminUsername`, `Password`, `AdminRegdate`) VALUES
(1, 'Sarita', 'Admin', 'Test@123', '2019-02-10 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpolicy`
--

CREATE TABLE `tblpolicy` (
  `ID` int(11) NOT NULL,
  `SubcategoryId` varchar(50) NOT NULL,
  `CategoryId` varchar(25) DEFAULT NULL,
  `PolicyName` varchar(45) DEFAULT NULL,
  `Sumassured` int(11) DEFAULT NULL,
  `Premium` varchar(45) DEFAULT NULL,
  `Tenure` int(10) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpolicy`
--

INSERT INTO `tblpolicy` (`ID`, `SubcategoryId`, `CategoryId`, `PolicyName`, `Sumassured`, `Premium`, `Tenure`, `CreationDate`) VALUES
(8, '5', '1', 'Jeevan1.1', 500000, '500', 12, '2019-02-14 15:18:29'),
(9, '20', '3', 'Jeevan Dhara', 800000, '500 p/m', 10, '2019-02-18 13:06:48'),
(10, '12', '4', 'Accidental Policy', 200000, '100 p/m', 12, '2019-02-18 13:09:17'),
(11, '29', '6', 'Freight Damage', 700000, '800 p/m', 8, '2019-02-18 13:10:26'),
(12, '7', '1', 'test policy', 500000, '4250', 15, '2019-02-21 17:08:58'),
(13, '17', '5', 'demo policy', 1000000, '54244', 15, '2019-02-21 17:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblpolicyholder`
--

CREATE TABLE `tblpolicyholder` (
  `ID` int(11) NOT NULL,
  `UserId` char(20) DEFAULT NULL,
  `PolicyId` char(20) DEFAULT NULL,
  `PolicyNumber` char(9) DEFAULT NULL,
  `PolicyApplyDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `PolicyStatus` int(1) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpolicyholder`
--

INSERT INTO `tblpolicyholder` (`ID`, `UserId`, `PolicyId`, `PolicyNumber`, `PolicyApplyDate`, `PolicyStatus`, `UpdationDate`) VALUES
(2, '2', '8', '618412450', '2019-02-17 18:34:03', 2, '2019-02-18 10:16:56'),
(3, '2', '9', '772157660', '2019-02-18 16:33:44', 1, '2019-02-18 16:36:27'),
(5, '14', '13', '984815191', '2019-02-21 17:23:54', 1, '2019-02-21 17:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `id` int(11) NOT NULL,
  `CategoryId` char(5) NOT NULL,
  `SubcategoryName` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`id`, `CategoryId`, `SubcategoryName`, `CreationDate`, `UpdationDate`) VALUES
(5, '1', 'Health Maintenance Organization (HMO) plans', '2019-02-14 06:58:18', NULL),
(6, '1', 'Preferred Provider Organization (PPO) plans', '2019-02-14 06:58:52', '2019-02-14 15:22:24'),
(7, '1', 'Exclusive Provider Organization (EPO) plans', '2019-02-14 07:00:30', '2019-02-14 15:22:34'),
(8, '1', 'Point of Service (POS) plans', '2019-02-14 07:00:50', '2019-02-14 15:22:31'),
(9, '1', 'High Deductible Health Plan (HDHP) plans', '2019-02-14 07:02:11', NULL),
(10, '4', 'Liability Coverage', '2019-02-14 07:11:06', NULL),
(11, '4', 'Collision Coverage', '2019-02-14 07:11:30', NULL),
(12, '4', 'Personal Injury Coverage', '2019-02-14 07:11:58', NULL),
(13, '4', 'Uninsured Motorist Protection', '2019-02-14 07:12:19', NULL),
(14, '4', 'Comprehensive Coverage', '2019-02-14 07:12:38', '2019-02-14 15:23:49'),
(15, '5', 'Multiple Peril Crop Insurance', '2019-02-14 08:03:17', NULL),
(16, '5', 'Actual Production History', '2019-02-14 08:04:10', NULL),
(17, '5', 'Group Risk Plan', '2019-02-14 08:05:03', NULL),
(18, '5', 'Crop Revenue Coverage', '2019-02-14 08:05:45', '2019-02-14 15:21:45'),
(19, '5', 'Actual Production History', '2019-02-14 10:35:25', NULL),
(20, '3', 'Term Plan', '2019-02-14 10:37:03', NULL),
(21, '3', 'Unit linked insurance plan(ULIP)', '2019-02-14 10:37:25', NULL),
(22, '3', 'Endowment Plan', '2019-02-14 10:37:46', NULL),
(23, '3', 'Money Back', '2019-02-14 10:38:13', NULL),
(24, '3', 'Whole Life Insurance', '2019-02-14 10:38:29', NULL),
(25, '6', 'Hull Insurance', '2019-02-14 10:44:21', NULL),
(26, '6', 'Machinery Insurance', '2019-02-14 10:44:37', NULL),
(27, '6', 'Protection & Indemnity (P&I) Insurance', '2019-02-14 10:44:54', NULL),
(28, '6', 'Liability Insurance', '2019-02-14 10:45:17', NULL),
(29, '6', 'Freight, Demurrage and Defense (FD&D) Insurance', '2019-02-14 10:45:33', NULL),
(30, '6', 'Freight Insurance', '2019-02-14 10:45:49', NULL),
(31, '6', 'Marine Cargo Insurance', '2019-02-14 10:46:00', NULL),
(32, '3', 'Test Subcat', '2019-02-21 17:01:07', '2019-02-21 17:04:19'),
(33, '5', 'Demo subcat test', '2019-02-21 17:07:54', '2019-02-21 17:08:09'),
(34, '9', 'test scatgry', '2019-02-21 17:20:48', '2019-02-21 17:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `tblticket`
--

CREATE TABLE `tblticket` (
  `ID` int(11) NOT NULL,
  `UserId` varchar(25) DEFAULT NULL,
  `Subject` varchar(45) DEFAULT NULL,
  `NatureofIssue` varchar(120) DEFAULT NULL,
  `Description` varchar(120) DEFAULT NULL,
  `AdminRemark` varchar(120) DEFAULT NULL,
  `TicketGenerationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemarkdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblticket`
--

INSERT INTO `tblticket` (`ID`, `UserId`, `Subject`, `NatureofIssue`, `Description`, `AdminRemark`, `TicketGenerationDate`, `AdminRemarkdate`) VALUES
(3, '7', 'Claim Issue', 'claim  issue', 'Please go through my policy and tell me my claim amount.', 'Issue has been resolve soon.', '2019-02-16 15:39:58', '2019-02-16 18:16:29'),
(4, '5', 'Payment Issue', 'payment issue', 'Kindly tell me about my policy issue', NULL, '2019-02-16 15:42:38', NULL),
(5, '2', 'Reactivate my policy', 'Other', 'Kindly reactivate my policy and tell me what are the procedure for this.', NULL, '2019-02-16 15:44:05', '2019-02-16 15:45:21'),
(6, '5', 'Claim Issue', 'claim  issue', 'bgjhgjkj', NULL, '2019-02-16 16:12:55', NULL),
(7, '14', 'premium issue', 'Other', 'This is sample text for testing.', 'Your issue solved', '2019-02-21 17:29:52', '2019-02-21 17:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `ContactNo` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `ContactNo`, `Email`, `Gender`, `Password`, `CreationDate`) VALUES
(2, 'Manu sharma', 8285099422, 'manu@gmail.com', 'Male', 'Test@123', '2019-02-13 07:07:39'),
(5, 'bhanu', 1234567899, 'gmai@gmail.com', 'Female', '123456', '2019-02-13 07:14:27'),
(6, 'dasd', 3123123123, 'dqwhjqe@gmail.com', 'Male', '1', '2019-02-14 15:41:49'),
(7, 'fdsd', 4767687686, 'ghjhj@gmail.com', 'Male', '123', '2019-02-14 16:14:52'),
(8, 'ddasd', 1233333333, 'dasda@fd.com', 'Male', '12', '2019-02-14 16:45:09'),
(9, 'dcasfa', 2133333333, 'dfwer@jjdas.com', 'Male', '1', '2019-02-14 16:45:48'),
(10, 'ddsasaf', 2132423423, 'dswerr@jjdah.com', 'Male', '1', '2019-02-14 16:46:54'),
(11, 'dfsdfsdf', 2144444444, 'ddasd@jdjasdj.com', 'Male', '1', '2019-02-14 16:48:02'),
(14, 'Demo user', 4324234234, 'testuser@gmail.com', 'Male', 'Test@123', '2019-02-21 17:22:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblimsadmin`
--
ALTER TABLE `tblimsadmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpolicy`
--
ALTER TABLE `tblpolicy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpolicyholder`
--
ALTER TABLE `tblpolicyholder`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblticket`
--
ALTER TABLE `tblticket`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblimsadmin`
--
ALTER TABLE `tblimsadmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpolicy`
--
ALTER TABLE `tblpolicy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblpolicyholder`
--
ALTER TABLE `tblpolicyholder`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblticket`
--
ALTER TABLE `tblticket`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
