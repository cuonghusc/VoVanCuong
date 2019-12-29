-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2019 lúc 08:49 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vovancuong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `capcho`
--

CREATE TABLE `capcho` (
  `machungchi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mahocvien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaycap` date NOT NULL,
  `socap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diemthuchanh` int(11) NOT NULL,
  `diemlythuyet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `capcho`
--

INSERT INTO `capcho` (`machungchi`, `mahocvien`, `ngaycap`, `socap`, `diemthuchanh`, `diemlythuyet`) VALUES
('THUD', 'HV002', '2019-12-29', '25/DQ-DHKC', 10, 10),
('THUD', 'HV003', '2019-12-29', '26/QD', 10, 10),
('THVP', 'HV001', '2007-02-01', '24/QĐ-DHKH', 10, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungchi`
--

CREATE TABLE `chungchi` (
  `machungchi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenchungchi` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chungchi`
--

INSERT INTO `chungchi` (`machungchi`, `tenchungchi`) VALUES
('THVP', 'Tin học văn phòng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `mahocvien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ho` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quequan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noisinh` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`mahocvien`, `ho`, `ten`, `quequan`, `ngaysinh`, `noisinh`) VALUES
('HV001', 'Nguyễn', 'Dũng', 'Thừa Thiên Huế', '1988', 'Huế'),
('HV002', 'Võ Văn', 'Cường', 'Đà Nẵng', '1997', 'Huế'),
('HV003', 'Nguyễn Văn', 'Anh', 'Thừa Thiên Huế', '1997', 'Huế');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `capcho`
--
ALTER TABLE `capcho`
  ADD PRIMARY KEY (`machungchi`,`mahocvien`);

--
-- Chỉ mục cho bảng `chungchi`
--
ALTER TABLE `chungchi`
  ADD PRIMARY KEY (`machungchi`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`mahocvien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
