-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2020 at 11:48 AM
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
-- Table structure for table `chi_tiet_diem_danh`
--

CREATE TABLE `chi_tiet_diem_danh` (
  `id_chi_tiet_diem_danh` int(100) NOT NULL auto_increment,
  `id_diem_danh` int(100) NOT NULL,
  `ma_sv` varchar(100) collate utf8_unicode_ci NOT NULL,
  `trang_thai_diem_danh` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id_chi_tiet_diem_danh`),
  KEY `id_diem_danh` (`id_diem_danh`),
  KEY `ma_sv` (`ma_sv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=66 ;

--
-- Dumping data for table `chi_tiet_diem_danh`
--

INSERT INTO `chi_tiet_diem_danh` (`id_chi_tiet_diem_danh`, `id_diem_danh`, `ma_sv`, `trang_thai_diem_danh`) VALUES
(56, 51, '17084001', '2'),
(57, 51, '17055071', '3'),
(58, 51, '17082141', '2'),
(59, 51, '17079291', '1'),
(60, 51, '17001035', '2'),
(61, 52, '17084001', '2'),
(62, 52, '17055071', ''),
(63, 52, '17082141', '3'),
(64, 52, '17079291', '2'),
(65, 52, '17001035', '3');

-- --------------------------------------------------------

--
-- Table structure for table `diem_danh`
--

CREATE TABLE `diem_danh` (
  `id_diem_danh` int(100) NOT NULL auto_increment,
  `ma_lmh` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ngay_diem_danh` date NOT NULL,
  `lan_diem_danh` int(100) NOT NULL,
  PRIMARY KEY  (`id_diem_danh`),
  KEY `ma_lmh` (`ma_lmh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `diem_danh`
--

INSERT INTO `diem_danh` (`id_diem_danh`, `ma_lmh`, `ngay_diem_danh`, `lan_diem_danh`) VALUES
(51, '12001', '2020-03-05', 1),
(52, '12001', '2020-03-06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `giang_vien`
--

CREATE TABLE `giang_vien` (
  `ma_gv` varchar(100) collate utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(100) collate utf8_unicode_ci NOT NULL default '123456',
  `ten` varchar(100) collate utf8_unicode_ci NOT NULL,
  `khoa` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`ma_gv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giang_vien`
--

INSERT INTO `giang_vien` (`ma_gv`, `mat_khau`, `ten`, `khoa`) VALUES
('1234001', '123456', 'Phạm Nguyễn Hoàng Nam', 'Công nghệ thông tin'),
('1234002', '123456', 'Phan Thị Bảo Trân', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Table structure for table `lop_mon_hoc`
--

CREATE TABLE `lop_mon_hoc` (
  `ma_lmh` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ten_lmh` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ma_mh` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ma_gv` varchar(100) collate utf8_unicode_ci NOT NULL,
  `hoc_ki` int(100) NOT NULL,
  `nam_hoc` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`ma_lmh`),
  KEY `ma_mh` (`ma_mh`),
  KEY `ma_gv` (`ma_gv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop_mon_hoc`
--

INSERT INTO `lop_mon_hoc` (`ma_lmh`, `ten_lmh`, `ma_mh`, `ma_gv`, `hoc_ki`, `nam_hoc`) VALUES
('12001', 'DHHTTT13B', '123001', '1234002', 2, '2019-2020'),
('12002', 'DHHTTT13B', '123002', '1234001', 2, '2019-2020'),
('12003', 'DHHTTT13A', '123002', '1234001', 2, '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `ma_mh` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ten_mh` varchar(200) collate utf8_unicode_ci NOT NULL,
  `so_tin_chi` int(100) NOT NULL,
  `tong_so_tiet` int(100) NOT NULL,
  `so_tiet_li_thuyet` int(100) NOT NULL,
  `so_tiet_thuc_hanh` int(100) NOT NULL,
  PRIMARY KEY  (`ma_mh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mon_hoc`
--

INSERT INTO `mon_hoc` (`ma_mh`, `ten_mh`, `so_tin_chi`, `tong_so_tiet`, `so_tiet_li_thuyet`, `so_tiet_thuc_hanh`) VALUES
('123001', 'Tương tác người máy', 3, 45, 45, 0),
('123002', 'Bảo mật cơ sở dữ liệu', 3, 75, 45, 30);

-- --------------------------------------------------------

--
-- Table structure for table `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `ma_sv` varchar(100) collate utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(100) collate utf8_unicode_ci NOT NULL default '123456',
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
('17001035', '123456', 'Châu Ngô Anh', 'Tuấn', 'Châu Ngô Anh Tuấn', '1999-01-01', 'Nam', 'DHHTTT13B'),
('17055071', '123456', 'Nguyễn Minh', 'Nhật', 'Nguyễn Minh Nhật', '1999-08-30', 'Nam', 'DHHTTT13B'),
('17079291', '123456', 'Đồng Quang', 'Tiến', 'Đồng Quang Tiến', '1999-01-01', 'Nam', 'DHHTTT13B'),
('17082141', '123456', 'Phan Trí', 'Thông', 'Phan Trí Thông', '1999-01-01', 'Nam', 'DHHTTT13B'),
('17084001', '123456', 'Nguyễn Anh', 'Huy', 'Nguyễn Anh Huy', '1999-01-01', 'Nam', 'DHHHTTT13B');

-- --------------------------------------------------------

--
-- Table structure for table `sinh_vien_lop_mon_hoc`
--

CREATE TABLE `sinh_vien_lop_mon_hoc` (
  `ma_lmh` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ma_sv` varchar(100) collate utf8_unicode_ci NOT NULL,
  `hoc_ki` int(100) NOT NULL,
  `nam_hoc` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`ma_lmh`,`ma_sv`),
  KEY `ma_sv` (`ma_sv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinh_vien_lop_mon_hoc`
--

INSERT INTO `sinh_vien_lop_mon_hoc` (`ma_lmh`, `ma_sv`, `hoc_ki`, `nam_hoc`) VALUES
('12001', '17001035', 2, '2019-2020'),
('12001', '17055071', 2, '2019-2020'),
('12001', '17079291', 2, '2019-2020'),
('12001', '17082141', 2, '2019-2020'),
('12001', '17084001', 2, '2019-2020');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_diem_danh`
--
ALTER TABLE `chi_tiet_diem_danh`
  ADD CONSTRAINT `chi_tiet_diem_danh_ibfk_2` FOREIGN KEY (`id_diem_danh`) REFERENCES `diem_danh` (`id_diem_danh`),
  ADD CONSTRAINT `chi_tiet_diem_danh_ibfk_3` FOREIGN KEY (`ma_sv`) REFERENCES `sinh_vien` (`ma_sv`);

--
-- Constraints for table `diem_danh`
--
ALTER TABLE `diem_danh`
  ADD CONSTRAINT `diem_danh_ibfk_1` FOREIGN KEY (`ma_lmh`) REFERENCES `lop_mon_hoc` (`ma_lmh`);

--
-- Constraints for table `lop_mon_hoc`
--
ALTER TABLE `lop_mon_hoc`
  ADD CONSTRAINT `lop_mon_hoc_ibfk_1` FOREIGN KEY (`ma_mh`) REFERENCES `mon_hoc` (`ma_mh`),
  ADD CONSTRAINT `lop_mon_hoc_ibfk_2` FOREIGN KEY (`ma_gv`) REFERENCES `giang_vien` (`ma_gv`);

--
-- Constraints for table `sinh_vien_lop_mon_hoc`
--
ALTER TABLE `sinh_vien_lop_mon_hoc`
  ADD CONSTRAINT `sinh_vien_lop_mon_hoc_ibfk_1` FOREIGN KEY (`ma_lmh`) REFERENCES `lop_mon_hoc` (`ma_lmh`),
  ADD CONSTRAINT `sinh_vien_lop_mon_hoc_ibfk_2` FOREIGN KEY (`ma_sv`) REFERENCES `sinh_vien` (`ma_sv`);
