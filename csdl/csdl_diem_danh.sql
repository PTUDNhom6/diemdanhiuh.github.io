-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2020 at 09:55 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csdl_diem_danh`
--

-- --------------------------------------------------------

--
-- Table structure for table `giang_vien`
--

CREATE TABLE `giang_vien` (
  `ma_gv` varchar(100) collate utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ten` varchar(100) collate utf8_unicode_ci NOT NULL,
  `khoa` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`ma_gv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giang_vien`
--

INSERT INTO `giang_vien` (`ma_gv`, `mat_khau`, `ten`, `khoa`) VALUES
('1234001', '123456', 'Phạm Nguyễn Hoàng Nam', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Table structure for table `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `ma_sv` varchar(100) collate utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ho_dem` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ten` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ho_dem_ten` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` varchar(100) collate utf8_unicode_ci NOT NULL,
  `lop` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`ma_sv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinh_vien`
--

INSERT INTO `sinh_vien` (`ma_sv`, `mat_khau`, `ho_dem`, `ten`, `ho_dem_ten`, `ngay_sinh`, `gioi_tinh`, `lop`) VALUES
('17055071', '123456', 'Nguyễn Minh', 'Nhật', 'Nguyễn Minh Nhật', '1999-08-30', 'Nam', 'DHHTTT13B');
