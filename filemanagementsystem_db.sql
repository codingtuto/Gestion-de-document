-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 10:21 AM
-- Server version: 10.4.6-MariaDB
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
-- Database: `filemanagementsystem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `AccountType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `StaffID`, `Username`, `Password`, `Status`, `AccountType`) VALUES
(1, 1, 'admin', '$2y$12$5FdKp8EvP8hz2/Yakn8QQuLgSPfs7g10cKLJ2G6wMU9Fpk2gHDxZy', '1', 'Admin'),
(2, 2, 'john', '$2y$12$0TOicQJw1YJP63HT5FPqFu7QIIaiLFOHG8UN2YuJRHVUscMqVRTni', '1', 'Staff'),
(3, 3, 'nancy', '$2y$12$ZVxLkfRbgfTEI3M2/zXhiur.PxfFQYswxyN3f4mtHypHpquz0NhNS', '1', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ChatID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `RecievedID` int(11) NOT NULL,
  `Message` varchar(1000) DEFAULT NULL,
  `AccountType` text NOT NULL,
  `Datetime_created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ChatID`, `SenderID`, `RecievedID`, `Message`, `AccountType`, `Datetime_created`) VALUES
(1, 1, 1, 'hai to all staff member', 'Admin', '2020-10-25 16:16:53'),
(2, 3, 3, 'thank you admin', 'Staff', '2020-10-25 16:17:29'),
(3, 2, 2, 'hai admin and nancy', 'Staff', '2020-10-25 16:18:09'),
(4, 1, 2, 'nice reply', 'Admin', '2020-10-25 16:19:04'),
(5, 3, 3, 'salamt po sa inyo', 'Staff', '2020-10-25 16:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `DivisionID` int(11) NOT NULL,
  `DivisionName` varchar(255) NOT NULL,
  `DivisionAccronym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`DivisionID`, `DivisionName`, `DivisionAccronym`) VALUES
(1, 'Land mining group', 'Land mining group desc'),
(2, 'Houser sales group', 'sales housing desc'),
(3, 'Gamer group inc.', 'gamer desc');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `FileID` int(11) NOT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  `FileDate` varchar(255) DEFAULT NULL,
  `TagID` int(11) NOT NULL,
  `FileTime` varchar(255) DEFAULT NULL,
  `Size` text DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `FileLoc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `FolderID` int(11) NOT NULL,
  `FolderName` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `StaffID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`FolderID`, `FolderName`, `Type`, `StaffID`) VALUES
(1, '../file_uploads/nancy_folder/', 'personalfile', 3),
(2, '../file_uploads/admin_folder/', 'personal', 1),
(3, '../file_uploads/john_folder/', 'personal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `actions` varchar(200) NOT NULL DEFAULT 'Has LoggedOut the system at',
  `ip` text NOT NULL,
  `host` text NOT NULL,
  `login_time` varchar(200) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `id`, `Username`, `actions`, `ip`, `host`, `login_time`, `status`) VALUES
(1, 3, 'nancy', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:21 PM', 'Offline'),
(2, 1, 'admin', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:20 PM', 'Offline'),
(3, 3, 'nancy', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:21 PM', 'Offline'),
(4, 2, 'john', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:07 PM', 'Offline'),
(5, 1, 'admin', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:20 PM', 'Offline'),
(6, 1, 'admin', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:20 PM', 'Offline'),
(7, 3, 'nancy', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:21 PM', 'Offline'),
(8, 2, 'john', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:07 PM', 'Offline'),
(9, 1, 'admin', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:20 PM', 'Offline'),
(10, 3, 'nancy', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:21 PM', 'Offline'),
(11, 1, 'admin', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:20 PM', 'Offline'),
(12, 3, 'nancy', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:21 PM', 'Offline'),
(13, 1, 'admin', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:20 PM', 'Offline'),
(14, 1, 'admin', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:20 PM', 'Offline'),
(15, 3, 'nancy', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:21 PM', 'Offline'),
(16, 2, 'john', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:07 PM', 'Offline'),
(17, 1, 'admin', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:20 PM', 'Offline'),
(18, 2, 'john', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:07 PM', 'Offline'),
(19, 3, 'nancy', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:21 PM', 'Offline'),
(20, 1, 'admin', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:20 PM', 'Offline'),
(21, 3, 'nancy', 'Has LoggedIn the system at', '::1', 'buhayko-PC', 'Oct-25-2020 05:21 PM', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `job_postion`
--

CREATE TABLE `job_postion` (
  `JobID` int(11) NOT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_postion`
--

INSERT INTO `job_postion` (`JobID`, `Position`, `Description`) VALUES
(1, 'Programmer', 'Programmer Description'),
(2, 'Accounting', 'Accounting desc'),
(3, 'Technician', 'Technician desc');

-- --------------------------------------------------------

--
-- Table structure for table `personal_file`
--

CREATE TABLE `personal_file` (
  `PersonalFileID` int(11) NOT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  `Size` varchar(255) DEFAULT NULL,
  `DownLoad` varchar(255) DEFAULT NULL,
  `TimeUpload` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `FilePath` varchar(255) DEFAULT NULL,
  `Status` text DEFAULT NULL,
  `Variable` varchar(255) DEFAULT NULL,
  `StaffID` int(1) NOT NULL,
  `dates` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_file`
--

INSERT INTO `personal_file` (`PersonalFileID`, `FileName`, `Size`, `DownLoad`, `TimeUpload`, `FullName`, `FilePath`, `Status`, `Variable`, `StaffID`, `dates`, `date_created`) VALUES
(1, 'html_tutorial.pdf', '1082273', '0', 'Oct-25-2020 02:21 PM', 'Nancy D. Binay', '../Administrator/file_uploads/../file_uploads/nancy_folder/html_tutorial.pdf', 'Staff', '../file_uploads/nancy_folder/', 3, '2020-10-25', '2020-10-25 14:21:23'),
(2, 'java_tutorial.pdf', '1089150', '0', 'Oct-25-2020 02:24 PM', 'Admin A. Admin', '../file_uploads/../file_uploads/admin_folder/java_tutorial.pdf', 'Staff', '../file_uploads/admin_folder/', 1, '2020-10-25', '2020-10-25 14:24:39'),
(3, 'payroll.pdf', '7554', '0', 'Oct-25-2020 02:25 PM', 'Admin A. Admin', '../file_uploads/../file_uploads/admin_folder/payroll.pdf', 'Staff', '../file_uploads/admin_folder/', 1, '2020-10-25', '2020-10-25 14:25:28'),
(4, 'DEVICES AGREEMENT.docx', '7770', '0', 'Oct-25-2020 05:06 PM', 'John C. Doe', '../Administrator/file_uploads/../file_uploads/john_folder/DEVICES AGREEMENT.docx', 'Staff', '../file_uploads/john_folder/', 2, '2020-10-25', '2020-10-25 17:06:06'),
(5, 'VETSOL Termination letter (template).docx', '20516', '0', 'Oct-25-2020 05:06 PM', 'John C. Doe', '../Administrator/file_uploads/../file_uploads/john_folder/VETSOL Termination letter (template).docx', 'Staff', '../file_uploads/john_folder/', 2, '2020-10-25', '2020-10-25 17:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `shared_file`
--

CREATE TABLE `shared_file` (
  `sharedID` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `shared_filename` varchar(255) DEFAULT NULL,
  `shared_size` varchar(255) DEFAULT NULL,
  `shared_download` varchar(255) DEFAULT NULL,
  `shared_timeupload` varchar(255) DEFAULT NULL,
  `shared_fullname` varchar(255) DEFAULT NULL,
  `shared_status` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `shared_variable` varchar(255) DEFAULT NULL,
  `shared_id` int(11) DEFAULT NULL,
  `date_shared` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shared_file`
--

INSERT INTO `shared_file` (`sharedID`, `StaffID`, `shared_filename`, `shared_size`, `shared_download`, `shared_timeupload`, `shared_fullname`, `shared_status`, `status`, `shared_variable`, `shared_id`, `date_shared`) VALUES
(2, 1, 'html_tutorial.pdf', '1082273', '0', 'Oct-25-2020 02:21 PM', 'Nancy D. Binay', 'Staff', 1, '../Administrator/file_uploads/../file_uploads/nancy_folder/html_tutorial.pdf', 1, '2020-10-25 14:27:38'),
(3, 2, 'html_tutorial.pdf', '1082273', '0', 'Oct-25-2020 02:21 PM', 'Nancy D. Binay', 'Staff', 1, '../Administrator/file_uploads/../file_uploads/nancy_folder/html_tutorial.pdf', 1, '2020-10-25 16:49:13'),
(4, 2, 'html_tutorial.pdf', '1082273', '0', 'Oct-25-2020 02:21 PM', 'Nancy D. Binay', 'Staff', 1, '../Administrator/file_uploads/../file_uploads/nancy_folder/html_tutorial.pdf', 1, '2020-10-25 17:01:41'),
(5, 3, 'VETSOL Termination letter (template).docx', '20516', '0', 'Oct-25-2020 05:06 PM', 'John C. Doe', 'Staff', 1, '../Administrator/file_uploads/../file_uploads/john_folder/VETSOL Termination letter (template).docx', 5, '2020-10-25 17:07:00'),
(7, 3, 'payroll.pdf', '7554', '0', 'Oct-25-2020 02:25 PM', 'Admin A. Admin', 'Staff', 1, '../file_uploads/../file_uploads/admin_folder/payroll.pdf', 3, '2020-10-25 17:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `BirthDate` varchar(255) DEFAULT NULL,
  `CivilStatus` varchar(255) DEFAULT NULL,
  `Nationality` varchar(255) DEFAULT NULL,
  `Religion` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `ContactNo` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `JobPosition` varchar(255) DEFAULT NULL,
  `Division` varchar(255) DEFAULT NULL,
  `DateHire` varchar(255) DEFAULT NULL,
  `JobDescription` varchar(255) DEFAULT NULL,
  `ImageURL` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `FirstName`, `LastName`, `MiddleName`, `Gender`, `BirthDate`, `CivilStatus`, `Nationality`, `Religion`, `Address`, `ContactNo`, `Email`, `JobPosition`, `Division`, `DateHire`, `JobDescription`, `ImageURL`) VALUES
(1, 'Admin', 'Admin', 'A', 'Male', '10/25/2020', 'Single', 'Filipino', 'Catholic', 'Marikina city', '09898789789', 'admin@gmail.com', 'Programmer', 'Land mining group', '10/26/2020', 'JobDescription', '../image_upload/202010251603605214_anduin.png'),
(2, 'John', 'Doe', 'C', 'Male', '10/13/2020', 'Single', 'Filipino', 'Catholic', 'Sana mateo rizal', '09867868676', 'john@gmail.com', 'Accounting', 'Houser sales group', '10/13/2020', 'Accounting officer', '../image_upload/202010251603605710_images.jpg'),
(3, 'Nancy', 'Binay', 'D', 'Female', '10/20/2020', 'Single', 'Korea', 'Korean', 'Korea', '09978979789', 'nancy@gmail.com', 'Accounting', 'Gamer group inc.', '10/19/2020', 'Accounting manager', '../image_upload/202010251603606493_download (1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ChatID`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`DivisionID`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`FileID`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`FolderID`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `job_postion`
--
ALTER TABLE `job_postion`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `personal_file`
--
ALTER TABLE `personal_file`
  ADD PRIMARY KEY (`PersonalFileID`);

--
-- Indexes for table `shared_file`
--
ALTER TABLE `shared_file`
  ADD PRIMARY KEY (`sharedID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ChatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `DivisionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `FileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `FolderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `job_postion`
--
ALTER TABLE `job_postion`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_file`
--
ALTER TABLE `personal_file`
  MODIFY `PersonalFileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shared_file`
--
ALTER TABLE `shared_file`
  MODIFY `sharedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
