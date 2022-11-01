-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 02:36 PM
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
-- Database: `at150252`
--

-- --------------------------------------------------------

--
-- Table structure for table `35dangtienthanh_cauhoikhaosat`
--

CREATE TABLE `35dangtienthanh_cauhoikhaosat` (
  `STT` int(11) NOT NULL,
  `MaKS` varchar(100) NOT NULL,
  `NoiDungKS` varchar(100) NOT NULL,
  `CauHoi` varchar(100) NOT NULL,
  `TraLoiCo` int(11) NOT NULL DEFAULT 0,
  `TraLoiKhong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `35dangtienthanh_dangkykhaosat`
--

CREATE TABLE `35dangtienthanh_dangkykhaosat` (
  `Username` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `35dangtienthanh_inforuser`
--

CREATE TABLE `35dangtienthanh_inforuser` (
  `Username` varchar(25) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Locate` varchar(100) NOT NULL,
  `Role` text NOT NULL,
  `RightUser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `35dangtienthanh_moneysurvey`
--

CREATE TABLE `35dangtienthanh_moneysurvey` (
  `Username` varchar(100) NOT NULL,
  `SoDu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `35dangtienthanh_nguoithamgiakhaosat`
--

CREATE TABLE `35dangtienthanh_nguoithamgiakhaosat` (
  `MaKS` varchar(100) NOT NULL,
  `NoiDungKS` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SDT` varchar(100) NOT NULL,
  `Locate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `35dangtienthanh_quanlykhaosat`
--

CREATE TABLE `35dangtienthanh_quanlykhaosat` (
  `Username` varchar(100) NOT NULL,
  `MaKH` varchar(100) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SDT` varchar(100) NOT NULL,
  `MaDD` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `NDRequest` varchar(100) NOT NULL,
  `GiaTien` varchar(100) NOT NULL,
  `SoLuongKhaoSat` varchar(100) NOT NULL,
  `SoCauKhaoSat` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `View` varchar(100) NOT NULL,
  `Request` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `35dangtienthanh_cauhoikhaosat`
--
ALTER TABLE `35dangtienthanh_cauhoikhaosat`
  ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `35dangtienthanh_dangkykhaosat`
--
ALTER TABLE `35dangtienthanh_dangkykhaosat`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `35dangtienthanh_inforuser`
--
ALTER TABLE `35dangtienthanh_inforuser`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `35dangtienthanh_moneysurvey`
--
ALTER TABLE `35dangtienthanh_moneysurvey`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `35dangtienthanh_nguoithamgiakhaosat`
--
ALTER TABLE `35dangtienthanh_nguoithamgiakhaosat`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `35dangtienthanh_quanlykhaosat`
--
ALTER TABLE `35dangtienthanh_quanlykhaosat`
  ADD PRIMARY KEY (`MaKH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `35dangtienthanh_cauhoikhaosat`
--
ALTER TABLE `35dangtienthanh_cauhoikhaosat`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
