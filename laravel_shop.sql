-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2014 at 06:58 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_shop`
--
CREATE DATABASE IF NOT EXISTS `laravel_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `laravel_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE IF NOT EXISTS `ban` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sp` int(11) NOT NULL,
  `id_dh` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`id`, `id_sp`, `id_dh`, `soluong`, `gia`, `created_at`, `updated_at`) VALUES
(19, 18, 10, 15, 430000, '2014-03-06 08:07:09', '2014-03-06 08:07:09'),
(20, 17, 11, 10, 580000, '2014-03-06 08:22:07', '2014-03-06 08:22:07'),
(21, 5, 12, 34, 100000, '2014-03-06 08:44:49', '2014-03-06 08:44:49'),
(22, 5, 13, 12, 100000, '2014-03-06 08:45:18', '2014-03-06 08:45:18'),
(23, 19, 14, 1, 8000000, '2014-03-07 13:11:33', '2014-03-07 13:11:33'),
(24, 14, 15, 1, 680000, '2014-03-08 03:40:10', '2014-03-08 03:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `chitietnhap`
--

CREATE TABLE IF NOT EXISTS `chitietnhap` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `id_phieunhap` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `chitietnhap`
--

INSERT INTO `chitietnhap` (`id`, `soluong`, `dongia`, `id_phieunhap`, `id_sanpham`, `created_at`, `updated_at`) VALUES
(11, 10, 300000, 7, 3, '2014-02-26 03:52:07', '2014-02-26 03:52:07'),
(12, 10, 200000, 7, 5, '2014-02-26 03:52:07', '2014-02-26 03:52:07'),
(15, 15, 100000, 9, 3, '2014-02-26 09:53:22', '2014-02-26 09:53:22'),
(16, 10, 250000, 9, 5, '2014-02-26 09:53:22', '2014-02-26 09:53:22'),
(17, 14, 150000, 9, 6, '2014-02-26 09:53:22', '2014-02-26 09:53:22'),
(22, 1, 50000, 11, 3, '2014-02-28 14:20:03', '2014-02-28 14:20:03'),
(23, 165, 5000, 12, 3, '2014-03-01 03:42:20', '2014-03-01 03:42:20'),
(24, 15, 5000, 12, 5, '2014-03-01 03:42:20', '2014-03-01 03:42:20'),
(25, 12, 500000, 13, 18, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(26, 10, 300000, 13, 17, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(27, 14, 500000, 13, 16, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(28, 15, 20000, 13, 15, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(29, 23, 250000, 13, 14, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(30, 14, 150000, 13, 13, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(31, 12, 40000, 13, 12, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(32, 14, 4000000, 13, 11, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(33, 12, 3000000, 13, 10, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(34, 14, 3500000, 13, 9, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(35, 24, 6000000, 13, 8, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(36, 13, 8000000, 13, 7, '2014-03-06 07:58:42', '2014-03-06 07:58:42'),
(37, 1, 4000000, 14, 19, '2014-03-06 08:34:25', '2014-03-06 08:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `chung_loais`
--

CREATE TABLE IF NOT EXISTS `chung_loais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tenchungloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `chung_loais`
--

INSERT INTO `chung_loais` (`id`, `tenchungloai`, `created_at`, `updated_at`) VALUES
(1, 'Điện Thoại', '2014-02-24 18:54:15', '2014-02-27 02:11:52'),
(3, 'Quần-Áo Nam', '2014-02-24 19:58:45', '2014-02-27 07:05:58'),
(5, 'Giầy-Dép', '2014-02-24 19:59:06', '2014-02-25 05:26:09'),
(7, 'LapTop', '2014-02-25 05:26:28', '2014-02-25 05:26:28'),
(8, 'Nhẫn', '2014-02-26 08:51:39', '2014-02-26 08:51:39'),
(10, 'Đồ gia dụng', '2014-02-27 01:16:18', '2014-02-27 01:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ngaymua` datetime NOT NULL,
  `ngaygiao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `noigiaohang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tonggia` int(11) NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_hinhthuc` int(11) NOT NULL,
  `id_trangthai` int(11) NOT NULL DEFAULT '4',
  `xem` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `ngaymua`, `ngaygiao`, `noigiaohang`, `tonggia`, `ghichu`, `created_at`, `updated_at`, `id_hinhthuc`, `id_trangthai`, `xem`, `id_user`) VALUES
(10, '2014-03-06 15:07:09', '2014-03-06 15:07:34', '157h/6 an khánh, cần thơ', 6469000, 'test', '2014-03-06 08:07:09', '2014-03-06 08:07:35', 1, 3, 1, 2),
(11, '2014-03-06 15:22:07', '2014-03-06 15:22:27', '157h/6 an khánh, cần thơ', 5819000, '', '2014-03-06 08:22:07', '2014-03-06 08:22:28', 1, 3, 1, 2),
(12, '2014-03-06 15:44:49', '2014-03-06 15:45:36', '157h/6 an khánh, cần thơ', 3419000, '', '2014-03-06 08:44:49', '2014-03-06 08:45:36', 1, 3, 1, 2),
(13, '2014-03-06 15:45:18', '0000-00-00 00:00:00', '157h/6 an khánh, cần thơ', 1219000, '', '2014-03-06 08:45:18', '2014-03-06 01:50:35', 1, 4, 1, 2),
(14, '2014-03-07 20:11:33', '2014-03-07 20:12:09', '157h/6 an khánh, cần thơ', 8019000, 'test', '2014-03-07 13:11:33', '2014-03-07 13:12:09', 1, 3, 1, 2),
(15, '2014-03-08 10:40:10', '2014-03-08 10:40:55', '157h/6 an khánh, cần thơ', 699000, '', '2014-03-08 03:40:10', '2014-03-08 03:40:55', 1, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gia`
--

CREATE TABLE IF NOT EXISTS `gia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ngay` date NOT NULL DEFAULT '0000-00-00',
  `gia` int(11) NOT NULL,
  `apdung` tinyint(1) NOT NULL DEFAULT '0',
  `id_sanpham` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `gia`
--

INSERT INTO `gia` (`id`, `ngay`, `gia`, `apdung`, `id_sanpham`, `created_at`, `updated_at`) VALUES
(3, '2014-02-17', 60000, 0, 4, '0000-00-00 00:00:00', '2014-02-25 21:14:11'),
(5, '2014-02-12', 800000, 1, 4, '2014-02-25 21:11:23', '2014-02-26 09:38:40'),
(6, '2014-02-27', 650000, 0, 4, '2014-02-25 23:23:11', '2014-02-25 23:23:41'),
(7, '2014-02-27', 500000, 1, 6, '2014-02-26 09:38:08', '2014-02-27 08:11:45'),
(8, '2014-02-27', 100000, 1, 5, '2014-02-27 02:20:10', '2014-03-03 02:04:08'),
(9, '2014-03-03', 800000, 0, 5, '2014-03-03 02:04:42', '2014-03-03 02:04:42'),
(10, '2014-03-03', 600000, 1, 3, '2014-03-03 02:05:03', '2014-03-03 02:05:07'),
(11, '2014-03-03', 6700000, 1, 7, '2014-03-03 03:39:51', '2014-03-03 03:39:57'),
(12, '2014-03-03', 500000, 1, 8, '2014-03-03 03:40:14', '2014-03-03 03:40:19'),
(13, '2014-03-03', 3000000, 1, 9, '2014-03-03 03:40:36', '2014-03-03 03:40:51'),
(14, '2014-03-04', 400000, 1, 10, '2014-03-03 03:41:08', '2014-03-03 03:41:16'),
(15, '2014-03-03', 5000000, 1, 11, '2014-03-03 07:14:59', '2014-03-03 07:38:03'),
(16, '2014-03-03', 600000, 1, 12, '2014-03-03 07:41:16', '2014-03-03 07:41:21'),
(17, '2014-03-04', 550000, 1, 13, '2014-03-03 07:41:42', '2014-03-03 07:41:46'),
(18, '2014-03-03', 680000, 1, 14, '2014-03-03 07:42:04', '2014-03-03 07:42:10'),
(19, '2014-03-04', 560000, 1, 15, '2014-03-03 07:42:28', '2014-03-03 07:42:32'),
(20, '2014-03-03', 450000, 1, 16, '2014-03-03 07:42:50', '2014-03-03 07:42:55'),
(21, '2014-03-03', 580000, 1, 17, '2014-03-03 07:43:13', '2014-03-03 07:43:52'),
(22, '2014-03-03', 430000, 1, 18, '2014-03-03 07:43:27', '2014-03-03 07:43:31'),
(23, '2014-03-06', 8000000, 1, 19, '2014-03-06 01:33:48', '2014-03-06 01:33:53');

-- --------------------------------------------------------

--
-- Stand-in structure for view `giaapdung`
--
CREATE TABLE IF NOT EXISTS `giaapdung` (
`id` int(10) unsigned
,`tensp` varchar(255)
,`hinhanh` varchar(255)
,`chitietsp` text
,`khuyenmai` tinyint(1)
,`id_loai` int(11)
,`gia` int(11)
,`luotxem` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `hangs`
--

CREATE TABLE IF NOT EXISTS `hangs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tenhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `hangs`
--

INSERT INTO `hangs` (`id`, `tenhang`, `diachi`, `dienthoai`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Noikia VIệt Nam', 'Hà Nội', '098822777', 'nokiavietnam@gmail.com', '2014-02-24 18:09:49', '2014-02-27 07:01:37'),
(4, 'Thái Tuấn', 'Hà Nội', '098822777', 'thaituan@gmail.com', '2014-02-24 19:59:53', '2014-02-27 08:16:08'),
(5, 'HP Việt Nam', 'Hà Nội', '0999777666', 'HPvietnam@gmail.com', '2014-02-24 20:00:45', '2014-02-27 03:19:31'),
(7, 'Công ty cung cấp thiết bị di động Cần Thơ', '1 Thới Bình, Cần Thơ', '0999888777', 'ccdd@gmail.com', '2014-02-26 08:38:38', '2014-02-27 06:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `loais`
--

CREATE TABLE IF NOT EXISTS `loais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_chungloai` int(11) NOT NULL,
  `id_hang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `loais`
--

INSERT INTO `loais` (`id`, `tenloai`, `id_chungloai`, `id_hang`, `created_at`, `updated_at`) VALUES
(16, 'Laptop HP2', 7, 1, '2014-02-25 05:29:47', '2014-02-28 13:58:10'),
(17, 'DELL', 7, 1, '2014-02-25 05:30:07', '2014-02-25 05:30:07'),
(18, 'Laptop Lenovo', 7, 1, '2014-02-25 05:30:33', '2014-02-27 07:04:33'),
(19, 'Điện SamSung', 1, 7, '2014-02-25 05:30:47', '2014-03-03 10:31:54'),
(20, 'Sony', 7, 3, '2014-02-25 05:31:04', '2014-02-25 05:31:04'),
(21, 'Áo Thun', 3, 4, '2014-02-25 05:32:08', '2014-02-25 05:32:08'),
(22, 'Áo Sơ Mi', 3, 3, '2014-02-25 05:32:25', '2014-02-25 05:32:25'),
(23, 'Áo Khoác', 3, 4, '2014-02-25 05:32:46', '2014-02-25 05:32:46'),
(24, 'Quần Jean', 3, 4, '2014-02-25 05:33:12', '2014-02-25 05:33:12'),
(26, 'Điện thoại Nokia', 1, 1, '2014-02-25 05:33:43', '2014-02-25 07:19:40'),
(27, 'Áo dài', 3, 4, '2014-02-25 06:14:20', '2014-02-25 06:14:20'),
(28, 'Điện Thoại Apple', 1, 7, '2014-03-03 03:31:26', '2014-03-03 03:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `logfileadmin`
--

CREATE TABLE IF NOT EXISTS `logfileadmin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hoatdong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenbang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_thanhphan` int(11) NOT NULL,
  `ten_thanhphan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `thongtin_cu` text COLLATE utf8_unicode_ci,
  `datetime` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=157 ;

--
-- Dumping data for table `logfileadmin`
--

INSERT INTO `logfileadmin` (`id`, `hoatdong`, `tenbang`, `id_thanhphan`, `ten_thanhphan`, `created_at`, `updated_at`, `thongtin_cu`, `datetime`) VALUES
(92, 'Áp Dụng', 'Giá', 8, '5( ID Sản Phẩm)', '2014-03-03 09:04:08', '2014-03-03 09:04:08', 'apdung:Chưa áp dụng \n', '2014-03-03 16:04:08'),
(93, 'Thêm', 'Giá', 9, '5( ID Sản Phẩm)', '2014-03-03 09:04:42', '2014-03-03 09:04:42', NULL, '2014-03-03 16:04:42'),
(94, 'Thêm', 'Giá', 10, '3( ID Sản Phẩm)', '2014-03-03 09:05:03', '2014-03-03 09:05:03', NULL, '2014-03-03 16:05:03'),
(95, 'Áp Dụng', 'Giá', 10, '3( ID Sản Phẩm)', '2014-03-03 09:05:07', '2014-03-03 09:05:07', 'apdung:Chưa áp dụng \n', '2014-03-03 16:05:07'),
(96, 'Sửa', 'Sản Phẩm', 3, 'Điện thoại Nokia', '2014-03-03 09:44:00', '2014-03-03 09:44:00', 'id:3 \ntensp:Điện thoại Nokia \ndonvitinh:1 \nhinhanh:2bdfd0.jpg \nchitietsp:Điện thoại đập đá thế hệ mới \nkhuyenmai:0 \nluotxem:3 \nid_loai:26 \n', '2014-03-03 16:44:00'),
(97, 'Thêm', 'Loại', 28, 'Điện Thoại Apple', '2014-03-03 10:31:26', '2014-03-03 10:31:26', NULL, '2014-03-03 17:31:26'),
(98, 'Sửa', 'Loại', 19, 'Điện SamSung', '2014-03-03 10:31:53', '2014-03-03 10:31:53', 'id:19 \ntenloai:SamSung \nid_chungloai:7 \nid_hang:3 \n', '2014-03-03 17:31:53'),
(99, 'Thêm', 'Sản Phẩm', 7, 'Apple Ipad Air', '2014-03-03 10:33:08', '2014-03-03 10:33:08', NULL, '2014-03-03 17:33:08'),
(100, 'Thêm', 'Sản Phẩm', 8, 'Iphone 4', '2014-03-03 10:34:25', '2014-03-03 10:34:25', NULL, '2014-03-03 17:34:25'),
(101, 'Thêm', 'Sản Phẩm', 9, 'Galaxy Grand', '2014-03-03 10:35:33', '2014-03-03 10:35:33', NULL, '2014-03-03 17:35:33'),
(102, 'Thêm', 'Sản Phẩm', 10, 'Samsung Mega China', '2014-03-03 10:38:53', '2014-03-03 10:38:53', NULL, '2014-03-03 17:38:53'),
(103, 'Thêm', 'Giá', 11, '7( ID Sản Phẩm)', '2014-03-03 10:39:51', '2014-03-03 10:39:51', NULL, '2014-03-03 17:39:51'),
(104, 'Áp Dụng', 'Giá', 11, '7( ID Sản Phẩm)', '2014-03-03 10:39:57', '2014-03-03 10:39:57', 'apdung:Chưa áp dụng \n', '2014-03-03 17:39:57'),
(105, 'Thêm', 'Giá', 12, '8( ID Sản Phẩm)', '2014-03-03 10:40:14', '2014-03-03 10:40:14', NULL, '2014-03-03 17:40:14'),
(106, 'Áp Dụng', 'Giá', 12, '8( ID Sản Phẩm)', '2014-03-03 10:40:19', '2014-03-03 10:40:19', 'apdung:Chưa áp dụng \n', '2014-03-03 17:40:19'),
(107, 'Thêm', 'Giá', 13, '9( ID Sản Phẩm)', '2014-03-03 10:40:36', '2014-03-03 10:40:36', NULL, '2014-03-03 17:40:36'),
(108, 'Áp Dụng', 'Giá', 13, '9( ID Sản Phẩm)', '2014-03-03 10:40:51', '2014-03-03 10:40:51', 'apdung:Chưa áp dụng \n', '2014-03-03 17:40:51'),
(109, 'Thêm', 'Giá', 14, '10( ID Sản Phẩm)', '2014-03-03 10:41:08', '2014-03-03 10:41:08', NULL, '2014-03-03 17:41:08'),
(110, 'Áp Dụng', 'Giá', 14, '10( ID Sản Phẩm)', '2014-03-03 10:41:16', '2014-03-03 10:41:16', 'apdung:Chưa áp dụng \n', '2014-03-03 17:41:16'),
(111, 'Thêm', 'Sản Phẩm', 11, 'T585', '2014-03-03 14:14:25', '2014-03-03 14:14:25', NULL, '2014-03-03 21:14:25'),
(112, 'Thêm', 'Giá', 15, '11( ID Sản Phẩm)', '2014-03-03 14:14:59', '2014-03-03 14:14:59', NULL, '2014-03-03 21:14:59'),
(113, 'Thêm', 'Sản Phẩm', 12, 'T2KAGDX', '2014-03-03 14:27:50', '2014-03-03 14:27:50', NULL, '2014-03-03 21:27:50'),
(114, 'Thêm', 'Sản Phẩm', 13, 'wbiR1380', '2014-03-03 14:28:37', '2014-03-03 14:28:37', NULL, '2014-03-03 21:28:37'),
(115, 'Thêm', 'Sản Phẩm', 14, 'zCVx13807', '2014-03-03 14:29:13', '2014-03-03 14:29:13', NULL, '2014-03-03 21:29:13'),
(116, 'Thêm', 'Sản Phẩm', 15, 'oK2V13501', '2014-03-03 14:30:06', '2014-03-03 14:30:06', NULL, '2014-03-03 21:30:06'),
(117, 'Thêm', 'Sản Phẩm', 16, '2ffo1386911', '2014-03-03 14:31:05', '2014-03-03 14:31:05', NULL, '2014-03-03 21:31:05'),
(118, 'Thêm', 'Sản Phẩm', 17, 'l1By1', '2014-03-03 14:31:50', '2014-03-03 14:31:50', NULL, '2014-03-03 21:31:50'),
(119, 'Thêm', 'Sản Phẩm', 18, 'gRFG1', '2014-03-03 14:33:41', '2014-03-03 14:33:41', NULL, '2014-03-03 21:33:41'),
(120, 'Áp Dụng', 'Giá', 15, '11( ID Sản Phẩm)', '2014-03-03 14:38:03', '2014-03-03 14:38:03', 'apdung:Chưa áp dụng \n', '2014-03-03 21:38:03'),
(121, 'Thêm', 'Giá', 16, '12( ID Sản Phẩm)', '2014-03-03 14:41:16', '2014-03-03 14:41:16', NULL, '2014-03-03 21:41:16'),
(122, 'Áp Dụng', 'Giá', 16, '12( ID Sản Phẩm)', '2014-03-03 14:41:21', '2014-03-03 14:41:21', 'apdung:Chưa áp dụng \n', '2014-03-03 21:41:21'),
(123, 'Thêm', 'Giá', 17, '13( ID Sản Phẩm)', '2014-03-03 14:41:42', '2014-03-03 14:41:42', NULL, '2014-03-03 21:41:42'),
(124, 'Áp Dụng', 'Giá', 17, '13( ID Sản Phẩm)', '2014-03-03 14:41:46', '2014-03-03 14:41:46', 'apdung:Chưa áp dụng \n', '2014-03-03 21:41:46'),
(125, 'Thêm', 'Giá', 18, '14( ID Sản Phẩm)', '2014-03-03 14:42:04', '2014-03-03 14:42:04', NULL, '2014-03-03 21:42:04'),
(126, 'Áp Dụng', 'Giá', 18, '14( ID Sản Phẩm)', '2014-03-03 14:42:10', '2014-03-03 14:42:10', 'apdung:Chưa áp dụng \n', '2014-03-03 21:42:10'),
(127, 'Thêm', 'Giá', 19, '15( ID Sản Phẩm)', '2014-03-03 14:42:28', '2014-03-03 14:42:28', NULL, '2014-03-03 21:42:28'),
(128, 'Áp Dụng', 'Giá', 19, '15( ID Sản Phẩm)', '2014-03-03 14:42:32', '2014-03-03 14:42:32', 'apdung:Chưa áp dụng \n', '2014-03-03 21:42:32'),
(129, 'Thêm', 'Giá', 20, '16( ID Sản Phẩm)', '2014-03-03 14:42:50', '2014-03-03 14:42:50', NULL, '2014-03-03 21:42:50'),
(130, 'Áp Dụng', 'Giá', 20, '16( ID Sản Phẩm)', '2014-03-03 14:42:55', '2014-03-03 14:42:55', 'apdung:Chưa áp dụng \n', '2014-03-03 21:42:55'),
(131, 'Thêm', 'Giá', 21, '17( ID Sản Phẩm)', '2014-03-03 14:43:13', '2014-03-03 14:43:13', NULL, '2014-03-03 21:43:13'),
(132, 'Thêm', 'Giá', 22, '18( ID Sản Phẩm)', '2014-03-03 14:43:27', '2014-03-03 14:43:27', NULL, '2014-03-03 21:43:27'),
(133, 'Áp Dụng', 'Giá', 22, '18( ID Sản Phẩm)', '2014-03-03 14:43:32', '2014-03-03 14:43:32', 'apdung:Chưa áp dụng \n', '2014-03-03 21:43:32'),
(134, 'Áp Dụng', 'Giá', 21, '17( ID Sản Phẩm)', '2014-03-03 14:43:52', '2014-03-03 14:43:52', 'apdung:Chưa áp dụng \n', '2014-03-03 21:43:52'),
(135, 'Thêm', 'Hóa dơn nhập', 13, 'Hóa đơn nhập', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(136, 'Thêm', 'Chi tiết hóa đơn nhập', 25, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:18\n Giá:500000\n Số lượng:12 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(137, 'Thêm', 'Chi tiết hóa đơn nhập', 26, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:17\n Giá:300000\n Số lượng:10 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(138, 'Thêm', 'Chi tiết hóa đơn nhập', 27, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:16\n Giá:500000\n Số lượng:14 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(139, 'Thêm', 'Chi tiết hóa đơn nhập', 28, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:15\n Giá:20000\n Số lượng:15 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(140, 'Thêm', 'Chi tiết hóa đơn nhập', 29, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:14\n Giá:250000\n Số lượng:23 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(141, 'Thêm', 'Chi tiết hóa đơn nhập', 30, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:13\n Giá:150000\n Số lượng:14 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(142, 'Thêm', 'Chi tiết hóa đơn nhập', 31, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:12\n Giá:40000\n Số lượng:12 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(143, 'Thêm', 'Chi tiết hóa đơn nhập', 32, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:11\n Giá:4000000\n Số lượng:14 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(144, 'Thêm', 'Chi tiết hóa đơn nhập', 33, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:10\n Giá:3000000\n Số lượng:12 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(145, 'Thêm', 'Chi tiết hóa đơn nhập', 34, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:9\n Giá:3500000\n Số lượng:14 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(146, 'Thêm', 'Chi tiết hóa đơn nhập', 35, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:8\n Giá:6000000\n Số lượng:24 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(147, 'Thêm', 'Chi tiết hóa đơn nhập', 36, 'ID Hóa đơn nhập:13\n ID Sản Phẩm:7\n Giá:8000000\n Số lượng:13 ', '2014-03-06 07:58:42', '2014-03-06 07:58:42', NULL, '2014-03-06 14:58:42'),
(148, 'Thêm', 'Sản Phẩm', 19, 'Laptop hp ProBook 550', '2014-03-06 08:33:21', '2014-03-06 08:33:21', NULL, '2014-03-06 15:33:21'),
(149, 'Thêm', 'Giá', 23, '19( ID Sản Phẩm)', '2014-03-06 08:33:48', '2014-03-06 08:33:48', NULL, '2014-03-06 15:33:48'),
(150, 'Áp Dụng', 'Giá', 23, '19( ID Sản Phẩm)', '2014-03-06 08:33:53', '2014-03-06 08:33:53', 'apdung:Chưa áp dụng \n', '2014-03-06 15:33:53'),
(151, 'Thêm', 'Hóa dơn nhập', 14, 'Hóa đơn nhập', '2014-03-06 08:34:25', '2014-03-06 08:34:25', NULL, '2014-03-06 15:34:25'),
(152, 'Thêm', 'Chi tiết hóa đơn nhập', 37, 'ID Hóa đơn nhập:14\n ID Sản Phẩm:19\n Giá:4000000\n Số lượng:1 ', '2014-03-06 08:34:25', '2014-03-06 08:34:25', NULL, '2014-03-06 15:34:25'),
(153, 'Thêm', 'Loại', 29, 'Laptop HP', '2014-03-12 14:19:31', '2014-03-12 14:19:31', NULL, '2014-03-12 21:19:31'),
(154, 'Xóa', 'Loại', 29, 'Laptop HP', '2014-03-12 14:19:42', '2014-03-12 14:19:42', NULL, '2014-03-12 21:19:42'),
(155, 'Thêm', 'Loại', 30, 'Laptop HP2', '2014-03-12 14:19:54', '2014-03-12 14:19:54', NULL, '2014-03-12 21:19:54'),
(156, 'Xóa', 'Loại', 30, 'Laptop HP2', '2014-03-12 14:20:03', '2014-03-12 14:20:03', NULL, '2014-03-12 21:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_02_24_075738_create_nguoi_dungs_table', 1),
('2014_02_24_101754_create_chung_loais_table', 2),
('2014_02_25_010333_create_hangs_table', 3),
('2014_02_25_015028_create_loais_table', 4),
('2014_02_25_124753_create_sanpham_table', 5),
('2014_02_26_021612_create_gia_table', 6),
('2014_02_26_072216_create_phieunhap_table', 7),
('2014_02_26_072650_create_chitietnhap_table', 7),
('2014_02_27_080349_create_logfileadmin_table', 8),
('2014_03_05_010910_create_trangthais_table', 9),
('2014_03_05_011016_create_vanchuyens_table', 9),
('2014_03_05_011316_create_ban_table', 9),
('2014_03_05_011546_create_donhang_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dungs`
--

CREATE TABLE IF NOT EXISTS `nguoi_dungs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tennd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `matkhau_tam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`id`, `tennd`, `taikhoan`, `matkhau`, `diachi`, `email`, `dienthoai`, `quyen`, `created_at`, `updated_at`, `matkhau_tam`) VALUES
(2, 'Nguyễn Thành Nam', 'administrator', 'd93a5def7511da3d0f2d171d9c344e91', '157h/6 an khánh, cần thơ', 'thanhnam192@gmail.com', '0986329076', 1, '2014-02-24 01:22:27', '2014-02-28 20:37:29', 'db3960'),
(3, 'hoang duy', 'hoangduya4', 'afda1feb31ae9c3bff0ec654cefc20db', '22 cần thơ', 'hoangduy@gmail.com', '0986329058', 0, '2014-02-28 19:04:02', '2014-03-06 02:50:29', NULL),
(4, 'hoang duy', 'hoangduya44', 'd93a5def7511da3d0f2d171d9c344e91', '21 cần thơ', 'thanhnam1924@gmail.com', '0986329076', 0, '2014-02-28 20:36:52', '2014-03-03 08:07:30', '0bc1b8'),
(5, 'thanh nam', 'thanhnam', 'd93a5def7511da3d0f2d171d9c344e91', '1 ly tu trong', 'thanhnam@gmail.com', '0998833744', 0, '2014-03-03 08:57:26', '2014-03-03 08:57:26', NULL),
(6, 'thanh nam', 'thanhnam2', 'd93a5def7511da3d0f2d171d9c344e91', '23 nguyen van linh', 'thanhnam194@gmail.com', '0999888777', 0, '2014-03-03 09:02:41', '2014-03-03 09:02:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE IF NOT EXISTS `phieunhap` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ngaynhap` date NOT NULL,
  `tonggia` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `ngaynhap`, `tonggia`, `created_at`, `updated_at`) VALUES
(7, '2014-02-27', 5000000, '2014-02-26 03:52:07', '2014-02-26 03:52:07'),
(9, '2014-02-27', 6100000, '2014-02-26 09:53:22', '2014-02-26 09:53:22'),
(11, '2014-02-28', 50000, '2014-02-28 07:20:02', '2014-02-28 07:20:02'),
(12, '2014-03-01', 900000, '2014-02-28 20:42:20', '2014-02-28 20:42:20'),
(13, '2014-03-06', 413630000, '2014-03-06 00:58:42', '2014-03-06 00:58:42'),
(14, '2014-03-06', 4000000, '2014-03-06 01:34:25', '2014-03-06 01:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tensp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donvitinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chitietsp` text COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai` tinyint(1) NOT NULL DEFAULT '0',
  `luotxem` int(11) NOT NULL DEFAULT '0',
  `id_loai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `donvitinh`, `hinhanh`, `chitietsp`, `khuyenmai`, `luotxem`, `id_loai`, `created_at`, `updated_at`) VALUES
(3, 'Điện thoại Nokia', '1', '2bdfd0.jpg', 'Điện thoại đập đá thế hệ mới', 1, 5, 26, '2014-02-25 07:48:37', '2014-03-14 21:16:21'),
(4, 'Áo thun nam', '1', '3a969b.jpg', 'Áo thun cao cấp dành cho FA', 0, 5, 21, '2014-02-25 18:10:47', '2014-03-06 04:05:54'),
(5, 'Áo sơ mi body', '1', '04530a.jpg', 'Áo sơ mi cao cấp cho đàn ông đích thực', 0, 2, 22, '2014-02-25 18:16:46', '2014-03-06 01:45:02'),
(6, 'Áo thun nữ LO3824', '1', 'ab724c.jpg', 'Áo thun nữ cao cấp.', 0, 0, 21, '2014-02-26 09:12:25', '2014-02-27 04:16:23'),
(7, 'Apple Ipad Air', '1', '4826f5.png', '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus.', 1, 1, 28, '2014-03-03 03:33:08', '2014-03-15 00:35:13'),
(8, 'Iphone 4', '1', '73dfc9.png', '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus.', 0, 0, 28, '2014-03-03 03:34:25', '2014-03-03 03:34:25'),
(9, 'Galaxy Grand', '1', '0b02d7.png', ' Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm.', 1, 4, 19, '2014-03-03 03:35:33', '2014-03-14 21:37:59'),
(10, 'Samsung Mega China', '1', '42ad8f.png', ' Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm.', 0, 3, 19, '2014-03-03 03:38:53', '2014-03-14 21:38:46'),
(11, 'T585', '1', '413170.png', 'Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card). ', 0, 3, 19, '2014-03-03 07:14:25', '2014-03-14 21:21:20'),
(12, 'T2KAGDX', '1', '2dd7c4.jpg', 'ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with B', 0, 1, 24, '2014-03-03 07:27:50', '2014-03-05 03:50:59'),
(13, 'wbiR1380', '1', 'c66307.jpg', 'ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Bl', 1, 1, 21, '2014-03-03 07:28:36', '2014-03-05 03:27:23'),
(14, 'zCVx13807', '1', '1f1e26.jpg', 'link detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card). ', 1, 2, 21, '2014-03-03 07:29:13', '2014-03-07 20:39:54'),
(15, 'oK2V13501', '1', 'ea56a6.jpg', '8.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. T', 1, 4, 24, '2014-03-03 07:30:06', '2014-03-14 21:32:47'),
(16, '2ffo1386911', '1', '3c28b0.jpg', 'Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm', 0, 1, 24, '2014-03-03 07:31:04', '2014-03-05 23:39:03'),
(17, 'l1By1', '1', '57d8cb.jpg', ' x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. Wx', 1, 5, 23, '2014-03-03 07:31:50', '2014-03-14 21:39:13'),
(18, 'gRFG1', '1', '1593f0.jpg', 'WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card). ', 1, 20, 24, '2014-03-03 07:33:41', '2014-03-14 21:38:57'),
(19, 'Laptop hp ProBook 550', '1', 'baf261.jpg', 'laptop hp the he moi', 0, 21, 16, '2014-03-06 01:33:21', '2014-03-14 21:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tennd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `tennd`, `created_at`, `updated_at`) VALUES
(1, 'nguyễn Thành Nam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Nguyễn Văn Nam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'nguyễn tiến dũng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'nguyễn tiến bình', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Nguyễn phú trọng', '2014-05-19 06:17:12', '2014-05-19 06:17:12'),
(6, 'Nguyễn phú trọng', '2014-05-19 06:19:15', '2014-05-19 06:19:15'),
(7, 'Nguyễn phú trọng', '2014-05-19 06:19:30', '2014-05-19 06:19:30');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tongkho`
--
CREATE TABLE IF NOT EXISTS `tongkho` (
`id` int(10) unsigned
,`tensp` varchar(255)
,`soluong` decimal(32,0)
,`tonggia` decimal(42,0)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `tong_sp_xuat`
--
CREATE TABLE IF NOT EXISTS `tong_sp_xuat` (
`id_sp` int(11)
,`tensp` varchar(255)
,`tongso` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ton_kho`
--
CREATE TABLE IF NOT EXISTS `ton_kho` (
`id` int(10) unsigned
,`tensp` varchar(255)
,`soluong` decimal(33,0)
);
-- --------------------------------------------------------

--
-- Table structure for table `trangthais`
--

CREATE TABLE IF NOT EXISTS `trangthais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `trangthais`
--

INSERT INTO `trangthais` (`id`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Chưa Xem', '2014-03-04 18:25:17', '2014-03-04 18:25:17'),
(2, 'Đã Xem', '2014-03-04 18:35:16', '2014-03-04 18:35:16'),
(3, 'Đã chuyển hàng', '2014-03-04 18:35:28', '2014-03-04 18:35:28'),
(4, 'Chưa chuyển hàng', '2014-03-04 18:35:48', '2014-03-04 18:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `vanchuyens`
--

CREATE TABLE IF NOT EXISTS `vanchuyens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hinhthuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vanchuyens`
--

INSERT INTO `vanchuyens` (`id`, `hinhthuc`, `gia`, `created_at`, `updated_at`) VALUES
(1, 'Chuyển phát nhanh', 19000, '2014-03-04 18:49:33', '2014-03-04 18:49:33'),
(2, 'Chuyển phát thường(3 tuần-free)', 0, '2014-03-04 18:49:57', '2014-03-04 18:49:57'),
(3, 'Thu tiền khi giao hàng(chuyển phát nhanh+phí thu hộ)', 44000, '2014-03-04 18:51:03', '2014-03-04 18:55:44');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_don_hang`
--
CREATE TABLE IF NOT EXISTS `view_don_hang` (
`ghichu` text
,`id_user` int(11)
,`id` int(10) unsigned
,`ngaymua` datetime
,`noigiaohang` varchar(255)
,`tonggia` int(11)
,`taikhoan` varchar(255)
,`hinhthuc` varchar(255)
,`xem` int(11)
,`trangthai` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_don_hang_da_chuyen`
--
CREATE TABLE IF NOT EXISTS `view_don_hang_da_chuyen` (
`ngaygiao` datetime
,`id_user` int(11)
,`id` int(10) unsigned
,`ngaymua` datetime
,`noigiaohang` varchar(255)
,`tonggia` int(11)
,`taikhoan` varchar(255)
,`hinhthuc` varchar(255)
,`xem` int(11)
,`trangthai` varchar(255)
);
-- --------------------------------------------------------

--
-- Structure for view `giaapdung`
--
DROP TABLE IF EXISTS `giaapdung`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `giaapdung` AS select `a`.`id` AS `id`,`a`.`tensp` AS `tensp`,`a`.`hinhanh` AS `hinhanh`,`a`.`chitietsp` AS `chitietsp`,`a`.`khuyenmai` AS `khuyenmai`,`a`.`id_loai` AS `id_loai`,`b`.`gia` AS `gia`,`a`.`luotxem` AS `luotxem` from (`sanpham` `a` join `gia` `b`) where ((`a`.`id` = `b`.`id_sanpham`) and (`b`.`apdung` = 1));

-- --------------------------------------------------------

--
-- Structure for view `tongkho`
--
DROP TABLE IF EXISTS `tongkho`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tongkho` AS select `b`.`id` AS `id`,`b`.`tensp` AS `tensp`,sum(`a`.`soluong`) AS `soluong`,sum((`a`.`soluong` * `a`.`dongia`)) AS `tonggia` from (`chitietnhap` `a` join `sanpham` `b`) where (`a`.`id_sanpham` = `b`.`id`) group by `b`.`id`,`b`.`tensp`;

-- --------------------------------------------------------

--
-- Structure for view `tong_sp_xuat`
--
DROP TABLE IF EXISTS `tong_sp_xuat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tong_sp_xuat` AS select `b`.`id_sp` AS `id_sp`,`c`.`tensp` AS `tensp`,sum(`b`.`soluong`) AS `tongso` from ((`donhang` `a` join `ban` `b`) join `sanpham` `c`) where ((`a`.`id` = `b`.`id_dh`) and (`a`.`id_trangthai` = 3) and (`c`.`id` = `b`.`id_sp`)) group by `b`.`id_sp`,`c`.`tensp`;

-- --------------------------------------------------------

--
-- Structure for view `ton_kho`
--
DROP TABLE IF EXISTS `ton_kho`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ton_kho` AS select `a`.`id` AS `id`,`a`.`tensp` AS `tensp`,if(isnull((`a`.`soluong` - `b`.`tongso`)),`a`.`soluong`,(`a`.`soluong` - `b`.`tongso`)) AS `soluong` from (`tongkho` `a` left join `tong_sp_xuat` `b` on((`a`.`id` = `b`.`id_sp`)));

-- --------------------------------------------------------

--
-- Structure for view `view_don_hang`
--
DROP TABLE IF EXISTS `view_don_hang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_don_hang` AS select `a`.`ghichu` AS `ghichu`,`a`.`id_user` AS `id_user`,`a`.`id` AS `id`,`a`.`ngaymua` AS `ngaymua`,`a`.`noigiaohang` AS `noigiaohang`,`a`.`tonggia` AS `tonggia`,`b`.`taikhoan` AS `taikhoan`,`c`.`hinhthuc` AS `hinhthuc`,`a`.`xem` AS `xem`,`d`.`trangthai` AS `trangthai` from (((`donhang` `a` join `nguoi_dungs` `b`) join `vanchuyens` `c`) join `trangthais` `d`) where ((`a`.`id_user` = `b`.`id`) and (`c`.`id` = `a`.`id_hinhthuc`) and (`d`.`id` = `a`.`id_trangthai`) and (`a`.`id_trangthai` <> 3));

-- --------------------------------------------------------

--
-- Structure for view `view_don_hang_da_chuyen`
--
DROP TABLE IF EXISTS `view_don_hang_da_chuyen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_don_hang_da_chuyen` AS select `a`.`ngaygiao` AS `ngaygiao`,`a`.`id_user` AS `id_user`,`a`.`id` AS `id`,`a`.`ngaymua` AS `ngaymua`,`a`.`noigiaohang` AS `noigiaohang`,`a`.`tonggia` AS `tonggia`,`b`.`taikhoan` AS `taikhoan`,`c`.`hinhthuc` AS `hinhthuc`,`a`.`xem` AS `xem`,`d`.`trangthai` AS `trangthai` from (((`donhang` `a` join `nguoi_dungs` `b`) join `vanchuyens` `c`) join `trangthais` `d`) where ((`a`.`id_user` = `b`.`id`) and (`c`.`id` = `a`.`id_hinhthuc`) and (`d`.`id` = `a`.`id_trangthai`) and (`a`.`id_trangthai` = 3));

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delLogfile` ON SCHEDULE EVERY 1 DAY STARTS '2014-03-06 17:06:19' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM logfileadmin WHERE created_at <= DATE_SUB(NOW(), INTERVAL 5 DAY)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
