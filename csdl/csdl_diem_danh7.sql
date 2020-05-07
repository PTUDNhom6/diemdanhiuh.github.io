-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2020 at 11:21 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL auto_increment,
  `tai_khoan` varchar(100) collate utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `tai_khoan`, `mat_khau`) VALUES
(1, 'admin', 'admin123');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=96 ;

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
(65, 52, '17001035', '3'),
(66, 53, '17084001', '3'),
(67, 53, '17055071', '3'),
(68, 53, '17082141', '2'),
(69, 53, '17079291', '2'),
(70, 53, '17001035', '1'),
(71, 54, '17084001', '3'),
(72, 54, '17055071', '3'),
(73, 54, '17082141', '2'),
(74, 54, '17079291', '3'),
(75, 54, '17001035', '3'),
(76, 55, '17084001', ''),
(77, 55, '17055071', ''),
(78, 55, '17082141', '2'),
(79, 55, '17079291', ''),
(80, 55, '17001035', ''),
(81, 56, '17084001', ''),
(82, 56, '17055071', ''),
(83, 56, '17082141', ''),
(84, 56, '17079291', ''),
(85, 56, '17001035', '3'),
(86, 57, '17084001', ''),
(87, 57, '17055071', ''),
(88, 57, '17082141', ''),
(89, 57, '17079291', ''),
(90, 57, '17001035', ''),
(91, 58, '17084001', ''),
(92, 58, '17055071', ''),
(93, 58, '17082141', ''),
(94, 58, '17079291', ''),
(95, 58, '17001035', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Dumping data for table `diem_danh`
--

INSERT INTO `diem_danh` (`id_diem_danh`, `ma_lmh`, `ngay_diem_danh`, `lan_diem_danh`) VALUES
(51, '12001', '2020-03-05', 1),
(52, '12001', '2020-03-06', 2),
(53, '12001', '2020-03-07', 3),
(54, '12001', '2020-03-10', 4),
(55, '12001', '2020-03-11', 5),
(56, '12001', '2020-03-12', 6),
(57, '12001', '2020-03-13', 7),
(58, '12001', '2020-03-14', 8);

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
('1234002', '123456', 'Phan Thị Bảo Trân', 'Công nghệ thông tin'),
('1234003', '123456', 'Nguyễn Duyên', 'Kế toán');

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
('12003', 'DHHTTT13A', '123002', '1234001', 2, '2019-2020'),
('12004', 'DHHTTT13A', '123003', '1234003', 2, '2019-2020');

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
('123002', 'Bảo mật cơ sở dữ liệu', 3, 75, 45, 30),
('123003', 'Nguyên lí kế toán', 3, 45, 45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phan_hoi`
--

CREATE TABLE `phan_hoi` (
  `id_phan_hoi` int(100) NOT NULL auto_increment,
  `ma_ng_gui` varchar(100) collate utf8_unicode_ci NOT NULL,
  `ma_ng_nhan` varchar(100) collate utf8_unicode_ci NOT NULL,
  `tieu_de` varchar(255) collate utf8_unicode_ci NOT NULL,
  `noi_dung` varchar(255) collate utf8_unicode_ci NOT NULL,
  `ma_lmh` varchar(100) collate utf8_unicode_ci NOT NULL,
  `thoi_gian` date NOT NULL,
  PRIMARY KEY  (`id_phan_hoi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `phan_hoi`
--

INSERT INTO `phan_hoi` (`id_phan_hoi`, `ma_ng_gui`, `ma_ng_nhan`, `tieu_de`, `noi_dung`, `ma_lmh`, `thoi_gian`) VALUES
(1, '17055071', '1234002', 'Phản hồi việc điểm danh sai', 'Điểm danh sai ngày 12/03/2020', '12001', '2012-00-01'),
(2, '17055071', '1234002', 'Test phản hồi', 'Test phản hồi', '12001', '2020-03-14'),
(3, '17055071', '1234002', 'test điểm danh 3', 'test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 test điểm danh 3 ', '12001', '2020-03-14');

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
('17084001', '123456', 'Nguyễn Anh', 'Huy', 'Nguyễn Anh Huy', '1999-01-01', 'Nam', 'DHHTTT13B');

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
('12001', '17084001', 2, '2019-2020'),
('12004', '17055071', 2, '2019-2020');

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
  ADD CONSTRAINT `sinh_vien_lop_mon_hoc_ibfk_3` FOREIGN KEY (`ma_lmh`) REFERENCES `lop_mon_hoc` (`ma_lmh`),
  ADD CONSTRAINT `sinh_vien_lop_mon_hoc_ibfk_4` FOREIGN KEY (`ma_sv`) REFERENCES `sinh_vien` (`ma_sv`);
