-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 05:38 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usim-skp`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_skp`
--

CREATE TABLE `list_skp` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `position_title` varchar(255) NOT NULL,
  `salary_ssm` varchar(255) NOT NULL,
  `skim` varchar(255) NOT NULL,
  `position_number` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_skp`
--

INSERT INTO `list_skp` (`id`, `program_id`, `position_title`, `salary_ssm`, `skim`, `position_number`, `detail`) VALUES
(4, 7, 'pegawai kewangan ', 'w41/w44', '3pw05', 3, 'jawatan tambahan'),
(5, 6, 'pegawai tadbir', 'n48', '3pn06', 1, 'jawatan tambahan'),
(6, 6, 'pegawai tadbir', 'n41', '3pn06', 1, 'jawatan dimansuhkan'),
(7, 6, 'pengawal keselamatan', 'kp11', '3lk15', 1, 'jawatan dimansuhkan'),
(8, 3, 'p', 'p', 'p', 9, 'p');

-- --------------------------------------------------------

--
-- Table structure for table `program_skp`
--

CREATE TABLE `program_skp` (
  `id` int(11) NOT NULL,
  `tahun_id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_skp`
--

INSERT INTO `program_skp` (`id`, `tahun_id`, `program`) VALUES
(3, 2, 'naib canselor'),
(4, 2, 'timbalan naib canselor (akademik dan antarabangsa)'),
(5, 2, 'pembangunan'),
(6, 2, 'pendaftar'),
(7, 2, 'bendahari');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_skp`
--

CREATE TABLE `tahun_skp` (
  `id` int(11) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_skp`
--

INSERT INTO `tahun_skp` (`id`, `tahun`) VALUES
(2, 'S.K.P Bil. S30 /2020'),
(3, 'S.K.P Bil. S9 / 2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phone`, `email`, `role`) VALUES
(1, 'admin', '$2y$10$M.0dv2wwnupcWrnwnnVDduzi0kxz74Y8FY78LPgGHT2l9Z6f/ovK2', '0148452347', 'admin@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_skp`
--
ALTER TABLE `list_skp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `program_skp`
--
ALTER TABLE `program_skp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tahun_id` (`tahun_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_skp`
--
ALTER TABLE `tahun_skp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_skp`
--
ALTER TABLE `list_skp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program_skp`
--
ALTER TABLE `program_skp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tahun_skp`
--
ALTER TABLE `tahun_skp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_skp`
--
ALTER TABLE `list_skp`
  ADD CONSTRAINT `list_skp_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program_skp` (`id`);

--
-- Constraints for table `program_skp`
--
ALTER TABLE `program_skp`
  ADD CONSTRAINT `program_skp_ibfk_1` FOREIGN KEY (`tahun_id`) REFERENCES `tahun_skp` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
