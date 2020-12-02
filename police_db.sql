-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 09:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assam_police`
--

-- --------------------------------------------------------

--
-- Table structure for table `accused`
--

CREATE TABLE `accused` (
  `accused_id` int(11) NOT NULL,
  `crime_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accused`
--

INSERT INTO `accused` (`accused_id`, `crime_id`, `name`, `status`, `remarks`, `age`, `gender`) VALUES
(10, 85, 'Samir Raza', 'Custody', 'Relative of victim and probable heir ', 42, 'Male'),
(75, 15, 'Mikhail Vyas', 'On', 'History', 30, 'Male'),
(110, 28, 'Ceylan Fischer', 'Arrested', 'No criminal records previously', 28, 'Male'),
(265, 25, 'Sanket Kale', 'Under arrest', 'Business rivalry', 49, 'Male'),
(354, 96, 'Unknown', 'No suspect', 'None', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complainer`
--

CREATE TABLE `complainer` (
  `complainer_id` int(11) NOT NULL,
  `crime_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complainer`
--

INSERT INTO `complainer` (`complainer_id`, `crime_id`, `name`, `remarks`, `phone`, `age`, `gender`) VALUES
(10, 85, 'Muskan Bhatt', 'Relative of accused and claimed heir', '9852478569', 24, 'Female'),
(75, 15, 'Seema Gupta', 'Friend', '753145870', 29, 'Female'),
(110, 28, 'Murphy Jiso', 'Victim\'s relative', '9512364789', 28, 'Other'),
(265, 25, 'Radhika Sathye', 'Victim\'s Spouse', '8529637412', 32, 'Female'),
(354, 96, 'Geeta Patil', 'Is also the victim', '9638527410', 42, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `db_id` int(11) NOT NULL DEFAULT 0,
  `crime_id` int(11) NOT NULL DEFAULT 0,
  `fir_no` int(11) NOT NULL DEFAULT 0,
  `date_of_report` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `officer_id` int(11) NOT NULL DEFAULT 0,
  `case_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`db_id`, `crime_id`, `fir_no`, `date_of_report`, `description`, `officer_id`, `case_status`) VALUES
(1, 15, 324, '2019-11-12', 'Fraud', 48, 'Pending'),
(1, 25, 635, '2020-02-06', 'Murder', 45, 'Pending'),
(1, 28, 154, '2019-07-08', 'Theft', 20, 'Solved'),
(1, 85, 425, '2020-03-28', 'Property Deception', 42, 'Pending'),
(1, 96, 320, '2018-07-11', 'Chain Snatching', 68, 'Unsolved');

-- --------------------------------------------------------

--
-- Table structure for table `czone`
--

CREATE TABLE `czone` (
  `cz_id` int(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `locn` varchar(255) DEFAULT NULL,
  `no_patients` varchar(255) DEFAULT NULL,
  `munic_id` int(20) DEFAULT NULL,
  `no_hsp` varchar(20) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `czone`
--

INSERT INTO `czone` (`cz_id`, `name`, `locn`, `no_patients`, `munic_id`, `no_hsp`, `remarks`) VALUES
(18, 'Belanagar', 'Jalapur', '69', 42, '3', 'Red Alert'),
(32, 'Mathura Nagar', 'Tulinj Road', '34', 654, '2', 'Yellow Alert'),
(51, 'Papdy', 'Vasai', '75', 22, '5', 'Red Alert'),
(65, 'Bhuigaon', 'Vasai', '42', 47, '3', 'Orange Alert'),
(75, 'Kanchanjuri', 'Kaziranga', '30', 97, '2', 'Yellow Alert'),
(584, 'Central Park', 'Nallasopara', '237', 425, '7', 'Red Alert');

-- --------------------------------------------------------

--
-- Table structure for table `dbtype`
--

CREATE TABLE `dbtype` (
  `db_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `summary` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dbtype`
--

INSERT INTO `dbtype` (`db_id`, `name`, `headline`, `summary`) VALUES
(1, 'Crime Register', 'criminal records', 'victim, accused, complainer, fir_id'),
(2, 'Containment Zones', 'containment regions', 'number of patients, hospitals, etc'),
(3, 'Patients', 'list of covid patients', 'patient_id, date of admission, etc'),
(4, 'Hospitals', 'list of covid hospitals', 'hospitals_id, medical supplies, etc');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hsp_id` int(20) NOT NULL,
  `cz_id` int(20) DEFAULT NULL,
  `no_amb` int(50) DEFAULT NULL,
  `bed_avail` varchar(255) DEFAULT NULL,
  `los` date DEFAULT NULL,
  `exp_range` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hsp_id`, `cz_id`, `no_amb`, `bed_avail`, `los`, `exp_range`) VALUES
(20, 584, 3, '42', '2020-09-01', '3 weeks'),
(52, 75, 63, '752', '2020-09-09', '2 months'),
(69, 584, 6, '34', '2020-05-01', '3 months'),
(75, 32, 5, '54', '2020-09-01', '7 months'),
(77, 65, 5, '53', '2020-06-09', '1 year'),
(96, 18, 3, '41', '2020-08-12', '4 months');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `officer_id` int(11) NOT NULL,
  `position` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `branch` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`officer_id`, `position`, `name`, `branch`, `address`) VALUES
(42, 'Inspector', 'Prakash', 'Assam Police Battalion', 'Guwahati'),
(326, 'Havaldar', 'Leeroy Brown', 'Greystones', 'Caville street'),
(879, 'Sub-inspector', 'Kalyanjit Rao', 'Nagpada', 'Madhuban Road');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pat_id` int(20) NOT NULL,
  `cz_id` int(20) DEFAULT NULL,
  `hsp_id` int(20) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `aadhar_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `proffession` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `age` int(20) DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `no_flymem` int(20) DEFAULT NULL,
  `medic_hist` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pat_id`, `cz_id`, `hsp_id`, `fname`, `lname`, `aadhar_no`, `address`, `proffession`, `phone`, `age`, `gender`, `dob`, `doa`, `no_flymem`, `medic_hist`) VALUES
(26, 75, 75, 'John ', 'Deacon', '526341297548', 'Richard Park', 'Electrician', '7859641230', 20, 'Male', '2000-11-20', '2020-08-20', 2, 'Blood Pressure'),
(30, 32, 75, 'Andrew', 'Byrne', '985232147569', 'Wicklow', 'Professor', '8523674125', 30, 'Male', '1990-03-17', '2020-11-20', 4, 'None'),
(32, 75, 52, 'Seema ', 'Gupta', '951247853256', 'Ashok Nagar', 'Psychiatrist', '8754623651', 20, 'Female', '2001-01-02', '2020-11-10', 3, 'Surgery'),
(69, 584, 75, 'Brian', 'May', '963285147458', 'London', 'Astrophysicist', '7531285965', 44, 'Male', '1991-07-19', '2020-09-03', 3, 'Tuberculosis'),
(75, 584, 69, 'Freddie', 'Mercury', '97852445', 'Garden Lodge', 'Designer', '9075952284', 45, 'Other', '2020-09-05', '2020-07-13', 2, 'AIDS'),
(82, 584, 69, 'Roger', 'Taylor', '753951852123', 'Meadows', 'Dentist', '7530124587', 30, 'Male', '2014-08-19', '2020-07-01', 2, 'Diabetes');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `crime_id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `crime_id`, `description`) VALUES
(415, 85, 'Cheating'),
(745, 15, 'Whoever'),
(420, 28, 'Section 420 in the Indian Penal Code deals with Cheating and dishonestly inducing delivery of property. The maximum punishment which can be awarded is imprisonment for a term of 7 year and fine.'),
(302, 25, ' Whoever commits murder shall be punished with death, or 1[imprisonment for life] and shall also be liable to fine.'),
(379, 96, 'Cases of chain snatching are currently registered under section 379 of the IPC for theft and it carries a maximum punishment of three years, or a fine, or both.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(3, 'Assam Police', 'assam@police.com', '1a52e17fa899cf40fb04cfc42e6352f1'),
(2, 'Chelsea', 'chel@0608.com', '1a52e17fa899cf40fb04cfc42e6352f1'),
(4, 'User', 'db@ms.com', '1a52e17fa899cf40fb04cfc42e6352f1'),
(1, 'Simran', 'sim@1120.com', '1a52e17fa899cf40fb04cfc42e6352f1');

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE `victim` (
  `victim_id` int(11) NOT NULL,
  `crime_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `victim`
--

INSERT INTO `victim` (`victim_id`, `crime_id`, `name`, `remarks`, `phone`, `age`, `gender`) VALUES
(10, 85, 'Muskan Bhatt', 'Relative of accused and claimed heir of property', '9852478569', 24, 'Female'),
(75, 15, 'Sarita Bhosale', 'Accused', '9075952284', 29, 'Female'),
(110, 28, 'Sophie Bricks', 'Spouse of accused', '8458745126', 27, 'Female'),
(265, 25, 'Aditya Sathye', 'Dead and business rival of accused', NULL, 35, 'Male'),
(354, 96, 'Geeta Patil', 'Crime took place at crawford market at 12 pm', '9638527410', 42, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `witness`
--

CREATE TABLE `witness` (
  `witness_id` int(11) NOT NULL,
  `crime_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `witness`
--

INSERT INTO `witness` (`witness_id`, `crime_id`, `name`, `remarks`, `phone`) VALUES
(10, 85, 'Rizwan Bhatt', 'Father of victim', '8796324159'),
(75, 15, 'Seema', 'Has', '/'),
(110, 28, 'Murphy Jiso', 'Also complainer', NULL),
(265, 25, 'None', 'Maid discovered the murder', '7412589632'),
(354, 96, 'Sangeeta Patil', 'Sister of victim and present at the spot', '8563214567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accused`
--
ALTER TABLE `accused`
  ADD PRIMARY KEY (`accused_id`),
  ADD KEY `crime_id` (`crime_id`);

--
-- Indexes for table `complainer`
--
ALTER TABLE `complainer`
  ADD PRIMARY KEY (`complainer_id`),
  ADD KEY `crime_id` (`crime_id`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`crime_id`),
  ADD KEY `db_id` (`db_id`);

--
-- Indexes for table `czone`
--
ALTER TABLE `czone`
  ADD PRIMARY KEY (`cz_id`);

--
-- Indexes for table `dbtype`
--
ALTER TABLE `dbtype`
  ADD PRIMARY KEY (`db_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hsp_id`),
  ADD KEY `cz_id` (`cz_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pat_id`),
  ADD KEY `cz_id` (`cz_id`),
  ADD KEY `hsp_id` (`hsp_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD KEY `crime_id` (`crime_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `victim`
--
ALTER TABLE `victim`
  ADD PRIMARY KEY (`victim_id`),
  ADD KEY `crime_id` (`crime_id`);

--
-- Indexes for table `witness`
--
ALTER TABLE `witness`
  ADD PRIMARY KEY (`witness_id`),
  ADD KEY `crime_id` (`crime_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbtype`
--
ALTER TABLE `dbtype`
  MODIFY `db_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accused`
--
ALTER TABLE `accused`
  ADD CONSTRAINT `accused_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime` (`crime_id`);

--
-- Constraints for table `complainer`
--
ALTER TABLE `complainer`
  ADD CONSTRAINT `complainer_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime` (`crime_id`);

--
-- Constraints for table `crime`
--
ALTER TABLE `crime`
  ADD CONSTRAINT `crime_ibfk_1` FOREIGN KEY (`db_id`) REFERENCES `dbtype` (`db_id`);

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`cz_id`) REFERENCES `czone` (`cz_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`cz_id`) REFERENCES `czone` (`cz_id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`hsp_id`) REFERENCES `hospital` (`hsp_id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime` (`crime_id`);

--
-- Constraints for table `victim`
--
ALTER TABLE `victim`
  ADD CONSTRAINT `victim_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime` (`crime_id`);

--
-- Constraints for table `witness`
--
ALTER TABLE `witness`
  ADD CONSTRAINT `witness_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime` (`crime_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
