-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 06:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ju_eap_summer_2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records`
--

CREATE TABLE `attendance_records` (
  `ID` int(20) NOT NULL,
  `Employee_ID` int(20) NOT NULL,
  `Check_In_Date_Time` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Check_Out_Date_Time` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Date` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_records`
--

INSERT INTO `attendance_records` (`ID`, `Employee_ID`, `Check_In_Date_Time`, `Check_Out_Date_Time`, `Date`) VALUES
(20, 1, '2024-08-20 06:14:10', '2024-08-20 06:14:13', '2024-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(20) NOT NULL,
  `Full_Name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Type` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Username` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Password` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Total_Vacation_Balance` int(20) NOT NULL,
  `Status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Manager_Status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `Full_Name`, `Type`, `Username`, `Password`, `Total_Vacation_Balance`, `Status`, `Manager_Status`) VALUES
(1, 'Ahmad', 'HR', 'ahmad', '25f9e794323b453885f5181f1b624d0b', 17, 'Active', 'Yes'),
(2, 'Ali', 'HR', 'ali', '25f9e794323b453885f5181f1b624d0b', 21, 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `managers_employees`
--

CREATE TABLE `managers_employees` (
  `ID` int(20) NOT NULL,
  `Manager_ID` int(20) NOT NULL,
  `Employee_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers_employees`
--

INSERT INTO `managers_employees` (`ID`, `Manager_ID`, `Employee_ID`) VALUES
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vacations_leaves`
--

CREATE TABLE `vacations_leaves` (
  `ID` int(20) NOT NULL,
  `Employee_ID` int(20) NOT NULL,
  `Vacation_Leave_Type` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Type` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `From_Date` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `To_Date` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Total_Days` int(20) NOT NULL,
  `From_Time` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `To_Time` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Total_Hours` double NOT NULL,
  `Reason` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Notes` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Manager_Status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `HR_Status` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Add_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacations_leaves`
--

INSERT INTO `vacations_leaves` (`ID`, `Employee_ID`, `Vacation_Leave_Type`, `Type`, `From_Date`, `To_Date`, `Total_Days`, `From_Time`, `To_Time`, `Total_Hours`, `Reason`, `Notes`, `Manager_Status`, `HR_Status`, `Add_Date_Time`) VALUES
(10, 1, 'Leave', 'Official', '2024-08-20', '2024-08-20', 0, '10:00', '12:00', 2, 'dsfdsw', 'dfwfw', 'Pending', 'Pending', '2024-08-20 03:32:36'),
(11, 1, 'Leave', 'Personal', '2024-08-20', '2024-08-20', 0, '10:00', '17:00', 7, 'fdsdfq', 'wewfwefwe', 'Accepted', 'Accepted', '2024-08-20 03:34:36'),
(12, 1, 'Leave', 'Personal', '2024-08-20', '2024-08-20', 0, '10:00', '11:00', 1, 'fds', 'qefwewfw', 'Pending', 'Pending', '2024-08-20 03:35:09'),
(13, 1, 'Vacation', 'Sick', '2024-08-20', '2024-08-21', 2, '', '', 0, 'dsfdsfs', 'dffewfwfw', 'Accepted', 'Accepted', '2024-08-20 03:56:51'),
(14, 1, 'Vacation', 'Annual', '2024-08-20', '2024-09-09', 21, '', '', 0, 'dsfdsfs', 'dffewfwfw', 'Accepted', 'Accepted', '2024-08-20 03:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `vacations_leaves_documents`
--

CREATE TABLE `vacations_leaves_documents` (
  `ID` int(20) NOT NULL,
  `VL_ID` int(20) NOT NULL,
  `Document` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_records`
--
ALTER TABLE `attendance_records`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `managers_employees`
--
ALTER TABLE `managers_employees`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Employee_ID` (`Employee_ID`),
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- Indexes for table `vacations_leaves`
--
ALTER TABLE `vacations_leaves`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Employee_ID` (`Employee_ID`);

--
-- Indexes for table `vacations_leaves_documents`
--
ALTER TABLE `vacations_leaves_documents`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `VL_ID` (`VL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_records`
--
ALTER TABLE `attendance_records`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managers_employees`
--
ALTER TABLE `managers_employees`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vacations_leaves`
--
ALTER TABLE `vacations_leaves`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vacations_leaves_documents`
--
ALTER TABLE `vacations_leaves_documents`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_records`
--
ALTER TABLE `attendance_records`
  ADD CONSTRAINT `attendance_records_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`ID`);

--
-- Constraints for table `managers_employees`
--
ALTER TABLE `managers_employees`
  ADD CONSTRAINT `managers_employees_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`ID`),
  ADD CONSTRAINT `managers_employees_ibfk_2` FOREIGN KEY (`Manager_ID`) REFERENCES `employees` (`ID`);

--
-- Constraints for table `vacations_leaves`
--
ALTER TABLE `vacations_leaves`
  ADD CONSTRAINT `vacations_leaves_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`ID`);

--
-- Constraints for table `vacations_leaves_documents`
--
ALTER TABLE `vacations_leaves_documents`
  ADD CONSTRAINT `vacations_leaves_documents_ibfk_1` FOREIGN KEY (`VL_ID`) REFERENCES `vacations_leaves` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
