-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 09:44 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odlrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `DRUG_ID` int(50) NOT NULL,
  `DRUD_NAME` varchar(255) NOT NULL,
  `COST` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`DRUG_ID`, `DRUD_NAME`, `COST`) VALUES
(1, 'coflyn', 3000),
(2, 'metakeflyn', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `EMPNO` int(10) NOT NULL,
  `EMP_NAME` varchar(25) NOT NULL,
  `EMP_USERNAME` varchar(25) NOT NULL,
  `EMP_PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`EMPNO`, `EMP_NAME`, `EMP_USERNAME`, `EMP_PASSWORD`) VALUES
(123243, 'DR. MWAYINGA', 'DOCTOR', '6c84cbd30cf9350a990bad2bcc1bec5f'),
(123244, 'DR. SHABAN', 'LAB_TEC', '9f892c0b45b546a2fc3fc540bbf73026'),
(123245, 'DR. AGATHA', 'BURSAR', '4d9c6c80e372442cb27b863b68576325'),
(123246, 'MS. NURU', 'ADMIN', '401a15ab7c9f6237311afd802116ddd4'),
(123247, 'RAZACK CHOTA', 'RECEPTIONIST', '0a9b3767c8b9b69cea129110e8daeda2'),
(123248, 'MWAKITOLE', 'PHARMACY', 'fd3051577824ada21b3df777812c66fa');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PATIENT_NUMBER` int(10) NOT NULL,
  `REG_ID` int(10) DEFAULT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BLOOD_GROUP` varchar(5) DEFAULT NULL,
  `DISEASE` varchar(100) DEFAULT NULL,
  `PRESCRIPTION` varchar(255) DEFAULT NULL,
  `DISCHARGE_TIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EMPNO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PATIENT_NUMBER`, `REG_ID`, `DATE_TIME`, `BLOOD_GROUP`, `DISEASE`, `PRESCRIPTION`, `DISCHARGE_TIME`, `EMPNO`) VALUES
(103, 4, '2018-09-04 03:08:43', NULL, NULL, NULL, NULL, NULL),
(106, 1, '2018-09-01 08:00:17', NULL, NULL, NULL, NULL, NULL),
(107, 4, '2019-06-16 19:58:58', NULL, NULL, NULL, '2019-06-16 06:58:58', NULL),
(108, 3, '2019-06-03 13:35:23', NULL, NULL, NULL, '2019-06-03 00:35:23', NULL),
(203, 5, '2019-06-03 13:34:22', 'A+', 'mharage', 'kjga', '2019-06-03 00:34:22', 123243),
(204, 6, '2019-06-03 11:07:29', NULL, NULL, NULL, '2019-06-02 22:07:29', NULL),
(205, 8, '2019-06-16 19:56:51', 'A-', 'kifuaduro', 'panadolp', '2019-06-16 06:56:51', 123243);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PAYMENT_ID` int(10) NOT NULL,
  `PAYMENT_MODE` varchar(255) NOT NULL,
  `PATIENT_NUMBER` int(10) DEFAULT NULL,
  `TOTAL_COST` int(10) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PAYMENT_ID`, `PAYMENT_MODE`, `PATIENT_NUMBER`, `TOTAL_COST`, `DATE_TIME`) VALUES
(12, 'CASH', 106, 45000, '2018-09-01 08:04:21'),
(13, 'BANK', 108, 40000, '2018-09-01 12:55:43'),
(14, 'BANK', 108, 0, '2018-09-01 19:17:42'),
(15, 'AIRTEL-MONEY', 107, 0, '2018-09-01 19:20:32'),
(20, 'M-PESA', 106, 70000, '2018-09-01 20:25:43'),
(34, 'HALLOPESA', 204, 45000, '2018-09-01 20:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `P_ID` int(10) NOT NULL,
  `PATIENT_NUMBER` int(10) NOT NULL,
  `DRUG_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`P_ID`, `PATIENT_NUMBER`, `DRUG_ID`) VALUES
(28, 203, 1),
(29, 203, 2),
(30, 205, 1),
(31, 205, 2),
(32, 205, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `REG_ID` int(10) NOT NULL,
  `FNAME` varchar(255) NOT NULL,
  `MNAME` varchar(255) DEFAULT NULL,
  `LNAME` varchar(255) NOT NULL,
  `GENDER` varchar(7) NOT NULL,
  `DOB` date NOT NULL,
  `M_STATUS` varchar(255) DEFAULT NULL,
  `BIRTH_PLACE` varchar(255) NOT NULL,
  `REGION` varchar(255) NOT NULL,
  `NATIONALITY` varchar(255) NOT NULL,
  `OCUPATION` varchar(255) DEFAULT NULL,
  `HEIGHT` int(50) DEFAULT NULL,
  `WEIGHT` int(50) DEFAULT NULL,
  `MOBILE_NUMBER` varchar(15) NOT NULL,
  `MEMBERSHIP_NUMBER` varchar(30) NOT NULL,
  `VOTE_NUMBER` varchar(30) NOT NULL,
  `STUREGNO` varchar(30) NOT NULL,
  `DATE_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`REG_ID`, `FNAME`, `MNAME`, `LNAME`, `GENDER`, `DOB`, `M_STATUS`, `BIRTH_PLACE`, `REGION`, `NATIONALITY`, `OCUPATION`, `HEIGHT`, `WEIGHT`, `MOBILE_NUMBER`, `MEMBERSHIP_NUMBER`, `VOTE_NUMBER`, `STUREGNO`, `DATE_TIME`) VALUES
(1, 'MWAYINGA', 'PATRICK', 'WILSON', 'male', '0000-00-00', 'MALILA', 'DODOMA TOWN', 'MAKULU', 'UDOM', '0753553555', 0, 0, '', '', '', '', '2018-08-30 21:31:36'),
(2, 'SHABAN', 'ALHAM', 'MNALU', 'male', '0000-00-00', 'KONDEBOY', 'LINDI', 'MTAMA', 'MTAMA', '0717025100', 0, 0, '', '', '', '', '2018-08-30 21:37:08'),
(3, 'Evan', '', 'john', 'male', '0000-00-00', '', 'DODOMA TOWN', 'MAKULU', 'UDOM', '0743951022', 0, 0, '', '', '', '', '2018-08-31 05:57:55'),
(4, 'ROSE', 'WILSON', 'SAINGA', 'female', '0000-00-00', 'MALILA', 'MBEYA(V)', 'USONGWE', 'ZZK', '0753579294', 0, 0, '', '', '', '', '2018-08-31 06:44:20'),
(5, 'NURU', 'LISTER', 'MESHACK', 'female', '0000-00-00', 'GOGO', 'DODOMA TOWN', 'MAKULU', 'UDOM', '0653790049', 0, 0, '', '', '', '', '2018-09-01 20:33:51'),
(6, 'LUCAS', 'EDWIN', 'ATANUS', 'male', '0000-00-00', 'GOGO', 'DODOMA TOWN', 'MAKULU', 'UDOM', '0787100136', 0, 0, '', '', '', '', '2018-09-01 20:39:21'),
(7, 'NURU', 'lister', 'meshack', 'female', '0000-00-00', 'gogo', 'bahi', 'kimara', 'kilungure', '0653790049', 0, 0, '', '', '', '', '2019-05-16 07:22:37'),
(8, 'REUBEN', 'MASHAURI', 'REUBEN', 'male', '0000-00-00', 'HEHE', 'SONGEA', 'CIVE', 'DOM', '0758399061', 0, 0, '', '', '', '', '2019-05-13 19:33:22'),
(9, 'JAMES', 'LISTER', 'KANDONGA', 'male', '0000-00-00', 'MARIED', 'MBEYA', 'DODOMA', 'TANZANIAN', 'IDODOMYA', 34, 58, '0753553555', '101901975863', '86383387', '17855', '0000-00-00 00:00:00'),
(10, 'rose', 'LISTER', 'KANDONGA', 'female', '0000-00-00', 'MARIED', 'MBEYA', 'DODOMA', 'TANZANIAN', 'IDODOMYA', 657, 58, '0753553555', '101901975863', '86383387', '17855', '0000-00-00 00:00:00'),
(11, 'jhaj', 'jhgafda', 'kjhgfgas', 'male', '0000-00-00', 'kjhgsas', 'kjghfas', 'klkjhgf', 'jhgf', 'kjhtgfrr', 78, 67, '0789475404', '097568', '90776y76y7', '7yu7y', '0000-00-00 00:00:00'),
(12, 'iyuga', 'jugxhh', 'kjhgfgas', 'male', '0000-00-00', 'kjgh', 'ikj', 'klkjhgf', 'kjhgg', 'lkkjhgg', 87, 98, '0789475404', 'po9i8u7y', 'oiu765r', 'kjuy65t4re', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `signs`
--

CREATE TABLE `signs` (
  `SIGN_ID` int(10) NOT NULL,
  `PATIENT_NUMBER` int(10) NOT NULL,
  `SIGN_SYMPTOMS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signs`
--

INSERT INTO `signs` (`SIGN_ID`, `PATIENT_NUMBER`, `SIGN_SYMPTOMS`) VALUES
(1, 204, 'kichwa kinauma'),
(2, 204, 'kichwa kuuma, macho kuvimba'),
(3, 203, 'macho yanavimba'),
(4, 205, 'kichwa kinauma,\r\nmkojo wa kijani');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `TEST_ID` int(10) NOT NULL,
  `PATIENT_NUMBER` int(10) NOT NULL,
  `TEST_NAME` varchar(255) NOT NULL,
  `TEST_RESULTS` varchar(255) DEFAULT NULL,
  `TEST_REMARK` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`TEST_ID`, `PATIENT_NUMBER`, `TEST_NAME`, `TEST_RESULTS`, `TEST_REMARK`) VALUES
(8, 204, 'bs', NULL, NULL),
(9, 203, 'H-pylori', 'neg', 'KJBHAJ'),
(10, 203, 'hb level', 'neg', 'jhzx'),
(11, 203, 'histological test', 'pos', ',jhja'),
(12, 203, 'HIV', 'neg', 'jhzx'),
(13, 205, 'HIV', 'pos', 'hiv infected'),
(14, 205, 'mRDT', 'neg', 'no malalia'),
(15, 205, 'ST', 'neg', 'typhoid present'),
(16, 205, 'urine', 'pos', 'no uti'),
(17, 205, 'Widal test', 'pos', 'no malalia');

-- --------------------------------------------------------

--
-- Table structure for table `tests_presents`
--

CREATE TABLE `tests_presents` (
  `T_ID` varchar(50) NOT NULL,
  `TEST_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `tests_presents`
--

INSERT INTO `tests_presents` (`T_ID`, `TEST_NAME`) VALUES
('blood group', 'test for blood group'),
('bs', 'test for malaria'),
('glucose', 'test for diabetic'),
('H-pylori', 'test for ulcers'),
('hb level', 'test for haemoglobin'),
('histological test', 'test for tissue infection'),
('HIV', 'test for AIDs'),
('mRDT', 'test for malaria'),
('mycobacteria tuberculosis test', 'test for TB'),
('pregnant test', 'test for pregnant'),
('semen_test', 'test for male fertility'),
('ST', 'stool analysis'),
('urine', 'urine analysis'),
('Widal test', 'test for typhoid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`DRUG_ID`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`EMPNO`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PATIENT_NUMBER`),
  ADD KEY `FK_P` (`REG_ID`),
  ADD KEY `FK_PE` (`EMPNO`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `FK_P_P` (`PATIENT_NUMBER`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `F_P_P` (`PATIENT_NUMBER`),
  ADD KEY `F_P_D` (`DRUG_ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`REG_ID`);

--
-- Indexes for table `signs`
--
ALTER TABLE `signs`
  ADD PRIMARY KEY (`SIGN_ID`),
  ADD KEY `FK_SIGN` (`PATIENT_NUMBER`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`TEST_ID`),
  ADD KEY `FK_TEST_P` (`PATIENT_NUMBER`);

--
-- Indexes for table `tests_presents`
--
ALTER TABLE `tests_presents`
  ADD PRIMARY KEY (`T_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `DRUG_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PAYMENT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `P_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `REG_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `signs`
--
ALTER TABLE `signs`
  MODIFY `SIGN_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `TEST_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `FK_P` FOREIGN KEY (`REG_ID`) REFERENCES `register` (`REG_ID`),
  ADD CONSTRAINT `FK_PE` FOREIGN KEY (`EMPNO`) REFERENCES `emp` (`EMPNO`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_P_P` FOREIGN KEY (`PATIENT_NUMBER`) REFERENCES `patients` (`PATIENT_NUMBER`);

--
-- Constraints for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD CONSTRAINT `F_P_D` FOREIGN KEY (`DRUG_ID`) REFERENCES `drugs` (`DRUG_ID`),
  ADD CONSTRAINT `F_P_P` FOREIGN KEY (`PATIENT_NUMBER`) REFERENCES `patients` (`PATIENT_NUMBER`);

--
-- Constraints for table `signs`
--
ALTER TABLE `signs`
  ADD CONSTRAINT `FK_SIGN` FOREIGN KEY (`PATIENT_NUMBER`) REFERENCES `patients` (`PATIENT_NUMBER`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `FK_TEST_P` FOREIGN KEY (`PATIENT_NUMBER`) REFERENCES `patients` (`PATIENT_NUMBER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
