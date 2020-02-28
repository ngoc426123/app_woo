-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th2 28, 2020 lúc 05:34 CH
-- Phiên bản máy phục vụ: 5.7.17-log
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `app_woo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `code` varchar(7) NOT NULL,
  `content` text NOT NULL,
  `total` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `id_promotion` int(11) NOT NULL,
  `id_method` int(11) NOT NULL,
  `time` varchar(5) NOT NULL,
  `day` varchar(2) NOT NULL,
  `month` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `code` varchar(7) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `cost` int(11) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `code`, `image`, `name`, `cost`, `date`) VALUES
(1, 'MT00001', 'upload/images/item2.jpg', 'Cafe đá', 15000, '28/02/2020'),
(2, 'MT00002', 'upload/images/item1.jpg', 'Cafe sữa đá', 18000, '28/02/2020'),
(3, 'MT00003', 'upload/images/item3.jpg', 'Nước cam', 20000, '28/02/2020'),
(4, 'MT00004', 'upload/images/item10.jpg', 'Nước ép xoài', 13000, '28/02/2020'),
(5, 'MT00005', 'upload/images/item4.jpg', 'Nước chanh', 10000, '28/02/2020'),
(6, 'MT00006', 'upload/images/item6.jpg', 'Capuchino', 27000, '28/02/2020'),
(7, 'MT00007', 'upload/images/item8.jpg', 'Nước dừa', 10000, '29/02/2020'),
(8, 'MT00008', 'upload/images/item9.jpg', 'sinh tố bơ', 24000, '29/02/2020'),
(9, 'MT00009', 'upload/images/item7.jpg', 'Chanh dây', 7000, '29/02/2020');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `method`
--

CREATE TABLE `method` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `cost` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion_bill`
--

CREATE TABLE `promotion_bill` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `promotion` int(6) NOT NULL,
  `type` varchar(3) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion_menu`
--

CREATE TABLE `promotion_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `promotion` varchar(6) NOT NULL,
  `type` varchar(3) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `promotion_menu`
--

INSERT INTO `promotion_menu` (`id`, `id_menu`, `promotion`, `type`, `status`) VALUES
(1, 1, '2000', 'num', 1),
(2, 2, '0', 'per', 0),
(3, 3, '0', 'per', 0),
(4, 4, '0', 'per', 0),
(5, 5, '0', 'per', 0),
(6, 6, '0', 'per', 0),
(7, 7, '4000', 'num', 0),
(8, 8, '0', 'per', 0),
(9, 9, '25', 'per', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `promotion_bill`
--
ALTER TABLE `promotion_bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `promotion_menu`
--
ALTER TABLE `promotion_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `method`
--
ALTER TABLE `method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `promotion_bill`
--
ALTER TABLE `promotion_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `promotion_menu`
--
ALTER TABLE `promotion_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
