-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 04:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `consultation_id` int(11) NOT NULL,
  `patient_fullname` varchar(255) NOT NULL,
  `consultation_date` date NOT NULL,
  `consultation_notes` text DEFAULT NULL,
  `medication` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`consultation_id`, `patient_fullname`, `consultation_date`, `consultation_notes`, `medication`, `created_at`) VALUES
(7, 'Jero Niko Palenge', '2024-05-11', 'hvcjc', 'nhfj', '2024-05-11 14:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `patient_visits`
--

CREATE TABLE `patient_visits` (
  `visit_id` int(11) NOT NULL,
  `visit_date` date DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `apt_id` int(11) NOT NULL,
  `apt_firstname` varchar(180) NOT NULL,
  `apt_lastname` varchar(180) NOT NULL,
  `apt_email` varchar(180) NOT NULL,
  `apt_contact` varchar(180) NOT NULL,
  `apt_date` date DEFAULT NULL,
  `apt_time` time DEFAULT NULL,
  `apt_address` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`apt_id`, `apt_firstname`, `apt_lastname`, `apt_email`, `apt_contact`, `apt_date`, `apt_time`, `apt_address`) VALUES
(20, 'Jero', 'Testdone', 'pal@gmail.com', '09261112222', '2024-03-13', '10:00:00', 'University Of St. La Salle');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consultation`
--

CREATE TABLE `tbl_consultation` (
  `consultation_id` int(11) NOT NULL,
  `patient_fullname` varchar(180) NOT NULL,
  `consultation_date` date NOT NULL,
  `consultation_intake` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctors`
--

CREATE TABLE `tbl_doctors` (
  `doctor_id` int(11) NOT NULL,
  `doctor_fullname` varchar(180) NOT NULL,
  `doctor_contact` varchar(180) NOT NULL,
  `doctor_email` varchar(180) NOT NULL,
  `doctor_password` varchar(180) NOT NULL,
  `doctor_specialty` varchar(180) NOT NULL,
  `doctor_status` varchar(180) NOT NULL,
  `doctor_date_updated` date NOT NULL DEFAULT current_timestamp(),
  `doctor_time_updated` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_doctors`
--

INSERT INTO `tbl_doctors` (`doctor_id`, `doctor_fullname`, `doctor_contact`, `doctor_email`, `doctor_password`, `doctor_specialty`, `doctor_status`, `doctor_date_updated`, `doctor_time_updated`) VALUES
(3, 'Jero Niko Palenge', '09998887777', 'doctorjero@gmail.com', '123', 'Internal Medicine', 'Here', '2024-03-10', '22:06:59'),
(4, 'Doctor Jhanna', '09885556464', 'doctorjhanna@gmail.com', '123', 'Physician', 'Here', '2024-03-10', '22:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patients`
--

CREATE TABLE `tbl_patients` (
  `patient_id` int(11) NOT NULL,
  `patient_fullname` varchar(180) NOT NULL,
  `patient_email` varchar(180) NOT NULL,
  `patient_contact` varchar(180) NOT NULL,
  `patient_address` varchar(180) NOT NULL,
  `patient_diagnosis` varchar(180) NOT NULL,
  `patient_date_updated` date NOT NULL DEFAULT current_timestamp(),
  `patient_time_updated` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patients`
--

INSERT INTO `tbl_patients` (`patient_id`, `patient_fullname`, `patient_email`, `patient_contact`, `patient_address`, `patient_diagnosis`, `patient_date_updated`, `patient_time_updated`) VALUES
(3, 'Jero Niko Palenge', 'deleteme@gmail.com', '09261112222', 'University Of St. La Salle', 'Extreme Migraness', '2024-03-10', '21:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_storage`
--

CREATE TABLE `tbl_storage` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(180) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_cost` int(11) NOT NULL,
  `product_brand` varchar(180) NOT NULL,
  `product_date_updated` date DEFAULT NULL,
  `product_time_updated` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_storage`
--

INSERT INTO `tbl_storage` (`product_id`, `product_name`, `product_quantity`, `product_cost`, `product_brand`, `product_date_updated`, `product_time_updated`) VALUES
(2, 'Paracetamol', 1, 6, 'Nuatz', '2024-03-13', '02:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(8) UNSIGNED NOT NULL,
  `user_lastname` varchar(180) NOT NULL DEFAULT '',
  `user_firstname` varchar(180) NOT NULL DEFAULT '',
  `user_email` varchar(180) NOT NULL DEFAULT '',
  `user_password` varchar(180) NOT NULL DEFAULT '',
  `user_date_added` date DEFAULT NULL,
  `user_time_added` time DEFAULT NULL,
  `user_date_updated` date DEFAULT NULL,
  `user_time_updated` time DEFAULT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0,
  `user_token` varchar(255) NOT NULL DEFAULT '',
  `user_access` varchar(255) NOT NULL DEFAULT '',
  `user_address` varchar(255) NOT NULL DEFAULT '',
  `user_birthdate` date DEFAULT NULL,
  `user_nickname` varchar(180) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_email`, `user_password`, `user_date_added`, `user_time_added`, `user_date_updated`, `user_time_updated`, `user_status`, `user_token`, `user_access`, `user_address`, `user_birthdate`, `user_nickname`) VALUES
(10000001, 'admin', 'admin', 'admin@gmail.com', '123', '1000-01-01', '00:00:00', '1000-01-01', '00:00:00', 0, '', 'Admin', 'secret', '2000-01-01', 'theeadmin'),
(10000003, 'User', 'User', 'user@gmail.com', '123', '2024-02-18', '23:58:54', '1000-01-01', '00:00:00', 1, '', 'Supervisor', '', '1000-01-01', 'userer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wbuser`
--

CREATE TABLE `tbl_wbuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wbuser`
--

INSERT INTO `tbl_wbuser` (`email`, `usertype`) VALUES
('admin@gmail.com', 'a'),
('doctor@gmail.com', 'd'),
('staff@gmail.com', 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`consultation_id`);

--
-- Indexes for table `patient_visits`
--
ALTER TABLE `patient_visits`
  ADD PRIMARY KEY (`visit_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`apt_id`);

--
-- Indexes for table `tbl_consultation`
--
ALTER TABLE `tbl_consultation`
  ADD PRIMARY KEY (`consultation_id`);

--
-- Indexes for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_storage`
--
ALTER TABLE `tbl_storage`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_wbuser`
--
ALTER TABLE `tbl_wbuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `consultation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient_visits`
--
ALTER TABLE `patient_visits`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `apt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_consultation`
--
ALTER TABLE `tbl_consultation`
  MODIFY `consultation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_storage`
--
ALTER TABLE `tbl_storage`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
