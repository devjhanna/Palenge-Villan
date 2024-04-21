-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 11:50 AM
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
-- Database: `db_wbtest`
--

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
(13, 'Jero Niko', 'Palenge', 'appointment@gmail.com', '09123456789', '2024-03-06', '00:43:51', 'University Of St. La Salle'),
(14, 'Jero', 'Niko', 'creator@gmail.com', '09123456789', '2024-03-06', '00:37:16', 'University Of St. La Salle');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctors`
--

CREATE TABLE `tbl_doctors` (
  `doctor_id` int(11) NOT NULL,
  `doctor_fullname` varchar(180) NOT NULL,
  `doctor_contact` varchar(180) NOT NULL,
  `doctor_email` varchar(180) NOT NULL,
  `doctor_specialty` varchar(180) NOT NULL,
  `doctor_status` varchar(180) NOT NULL,
  `doctor_date_updated` date NOT NULL DEFAULT current_timestamp(),
  `doctor_time_updated` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_storage`
--

CREATE TABLE `tbl_storage` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(180) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_cost` int(11) NOT NULL,
  `product_brand` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `userType` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`apt_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `apt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_patients`
--
ALTER TABLE `tbl_patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_storage`
--
ALTER TABLE `tbl_storage`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000006;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
