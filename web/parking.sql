-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 12:56 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--
CREATE DATABASE parking;
USE parking;

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id_r` int(11) NOT NULL,
  `id_s` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `date_r_fin` date DEFAULT NULL,
  `etat` int(11) NOT NULL,
  `date_r_deb` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id_r`, `id_s`, `id_u`, `date_r_fin`, `etat`, `date_r_deb`) VALUES
(1, 6, 1, '2017-10-18', 1, '2017-10-11'),
(2, 3, 2, '2017-10-19', 1, '2017-10-10'),
(3, 26, 1, '2017-10-20', 2, '2017-10-06'),
(8, 26, 1, '2017-10-26', 0, '2017-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `id_s` int(11) NOT NULL,
  `name_s` varchar(255) DEFAULT NULL,
  `type_s` varchar(1) NOT NULL,
  `state_s` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`id_s`, `name_s`, `type_s`, `state_s`) VALUES
(1, 'A1', 'A', 0),
(2, 'A2', 'A', 0),
(3, 'A3', 'A', 0),
(4, 'A4', 'A', 0),
(5, 'A5', 'A', 0),
(6, 'A6', 'A', 1),
(7, 'A7', 'A', 0),
(8, 'A8', 'A', 0),
(9, 'A9', 'A', 0),
(10, 'A10', 'A', 0),
(11, 'A11', 'A', 0),
(12, 'A12', 'A', 0),
(13, 'A13', 'A', 0),
(14, 'A14', 'A', 0),
(15, 'A15', 'A', 0),
(16, 'A16', 'A', 0),
(17, 'A17', 'A', 0),
(18, 'A18', 'A', 0),
(19, 'A19', 'A', 0),
(20, 'A20', 'A', 0),
(21, 'B1', 'B', 0),
(22, 'B2', 'B', 0),
(23, 'B3', 'B', 0),
(24, 'B4', 'B', 0),
(25, 'B5', 'B', 0),
(26, 'B6', 'B', 0),
(27, 'B7', 'B', 0),
(28, 'B8', 'B', 0),
(29, 'B9', 'B', 0),
(30, 'B10', 'B', 0),
(31, 'B11', 'B', 0),
(32, 'B12', 'B', 0),
(33, 'B13', 'B', 0),
(34, 'B14', 'B', 0),
(35, 'B15', 'B', 0),
(36, 'B16', 'B', 0),
(37, 'B17', 'B', 0),
(38, 'B18', 'B', 0),
(39, 'B19', 'B', 0),
(40, 'B20', 'B', 0),
(41, 'C1', 'C', 0),
(42, 'C2', 'C', 0),
(43, 'C3', 'C', 0),
(44, 'C4', 'C', 0),
(45, 'C5', 'C', 0),
(46, 'C6', 'C', 0),
(47, 'C7', 'C', 0),
(48, 'C8', 'C', 0),
(49, 'C9', 'C', 0),
(50, 'C10', 'C', 0),
(51, 'C11', 'C', 0),
(52, 'C12', 'C', 0),
(53, 'C13', 'C', 0),
(54, 'C14', 'C', 0),
(55, 'C15', 'C', 0),
(56, 'C16', 'C', 0),
(57, 'C17', 'C', 0),
(58, 'C18', 'C', 0),
(59, 'C19', 'C', 0),
(60, 'C20', 'C', 0),
(61, 'A21', 'A', 0),
(62, 'A22', 'A', 0),
(63, 'A23', 'A', 0),
(64, 'A24', 'A', 0),
(65, 'B21', 'B', 0),
(66, 'B22', 'B', 0),
(67, 'B23', 'B', 0),
(68, 'B24', 'B', 0),
(69, 'C21', 'C', 0),
(70, 'C22', 'C', 0),
(71, 'C23', 'C', 0),
(72, 'C24', 'C', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_u` int(11) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lvl` int(1) NOT NULL DEFAULT '0',
  `ip` varchar(255) DEFAULT NULL,
  `date_register` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_u`, `surname`, `name`, `email`, `password`, `lvl`, `ip`, `date_register`) VALUES
(1, 'Huchard', 'Théo', 'admin@admin.com', '9bc34549d565d9505b287de0cd20ac77be1d3f2c', 2, NULL, '10/10/2017'),
(2, 'Vasseur', 'Baptiste', 'bvasseur@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, NULL, '26/10/2017'),
(8, 'Amar', 'Maha', 'amarmaha@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, NULL, '26/10/2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id_r`),
  ADD KEY `id_s` (`id_s`),
  ADD KEY `id_u` (`id_u`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`id_s`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
