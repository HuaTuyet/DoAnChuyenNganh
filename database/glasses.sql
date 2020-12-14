-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2020 at 08:15 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glasses`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_account`
--

DROP TABLE IF EXISTS `t_account`;
CREATE TABLE IF NOT EXISTS `t_account` (
  `userName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`userName`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_account`
--

INSERT INTO `t_account` (`userName`, `email`, `password`, `level`) VALUES
('iamadmin', 'adminglassesshop@gmail.com', 'admin123', 1),
('user1', 'user1@gmail.com', 'user1123', 2),
('user2', 'user2@gmail.com', 'user2123', 2),
('user3', 'user3@gmail.com', 'user3123', 2),
('user4', 'user4@gmail.com', 'user4123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_brand`
--

DROP TABLE IF EXISTS `t_brand`;
CREATE TABLE IF NOT EXISTS `t_brand` (
  `brandId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_brand`
--

INSERT INTO `t_brand` (`brandId`, `brandName`) VALUES
('br02', 'Taho'),
('br03', 'Chanel'),
('br04', 'Gucci'),
('tk01', 'Chemi'),
('tk02', 'Exfash'),
('tk03', 'Essilor');

-- --------------------------------------------------------

--
-- Table structure for table `t_categories`
--

DROP TABLE IF EXISTS `t_categories`;
CREATE TABLE IF NOT EXISTS `t_categories` (
  `cateId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cateId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_categories`
--

INSERT INTO `t_categories` (`cateId`, `cateName`) VALUES
('gk', 'gọng kính'),
('km', 'kính mát'),
('test', 'loai'),
('tk', 'tròng kính');

-- --------------------------------------------------------

--
-- Table structure for table `t_order`
--

DROP TABLE IF EXISTS `t_order`;
CREATE TABLE IF NOT EXISTS `t_order` (
  `orderId` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createDate` datetime NOT NULL,
  `customer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `userName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_order`
--

INSERT INTO `t_order` (`orderId`, `createDate`, `customer`, `phone`, `address`, `status`, `userName`) VALUES
('order45', '2020-12-05 18:41:57', 'Tuyet Hua', 362048536, '180 cao lo, p4, q8', 2, 'user2'),
('order57', '2020-12-06 15:04:09', 'Trần Nam', 899882877, '7 Cao Lỗ, phường 10, quận 7, TP HCM', 3, 'user1');

-- --------------------------------------------------------

--
-- Table structure for table `t_orderdetail`
--

DROP TABLE IF EXISTS `t_orderdetail`;
CREATE TABLE IF NOT EXISTS `t_orderdetail` (
  `orderId` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`orderId`,`prodId`),
  KEY `FK_Detail_Product` (`prodId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_orderdetail`
--

INSERT INTO `t_orderdetail` (`orderId`, `prodId`, `quantity`, `total`) VALUES
('order45', '10', 1, 362000),
('order45', '11', 1, 360000),
('order45', '12', 1, 326000),
('order57', '13', 2, 690000),
('order57', '15', 1, 1630000);

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

DROP TABLE IF EXISTS `t_product`;
CREATE TABLE IF NOT EXISTS `t_product` (
  `prodId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodDes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `prodBrand` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodType` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodImage` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`prodId`),
  KEY `FK_Product_Brand` (`prodBrand`),
  KEY `FK_Product_Category` (`prodType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_product`
--

INSERT INTO `t_product` (`prodId`, `prodName`, `prodDes`, `price`, `prodBrand`, `prodType`, `prodImage`) VALUES
('1', 'Gọng kính tròn', 'Gọng kính làm bằng chất liệu nhựa TR90 giúp người mang kính được nhẹ nhàng, thoải mái và trọng lượng không quá nặng đè lên sống mũi.', 250000, 'br02', 'gk', 'gongnhua1.jpg'),
('10', 'gọng kính mắt mèo', 'Gọng kính với kiểu dáng hiện đại, thời trang vừa giúp bảo vệ mắt', 362000, 'br02', 'gk', 'gongmatmeo.jpg'),
('11', 'gọng kính cho nữ', 'Gọng kính với kiểu dáng hiện đại, thời trang vừa giúp bảo vệ mắt', 360000, 'br02', 'gk', 'gongtrondep.jpg'),
('12', 'Gọng vuông', 'Gọng kính vuông với kiểu dáng hiện đại, thời trang vừa giúp bảo vệ mắt', 326000, 'br02', 'gk', 'gongvuong.jpg'),
('13', 'Tròng lọc ASX', 'Tròng kính hiện đại, thời trang vừa giúp bảo vệ mắt', 690000, 'tk01', 'tk', 'gia-trong-kinh-chong-anh-sang-xanh-2-768x768.jpg'),
('14', 'Tròng kính chống UV', 'Tròng kính hiện đại, thời trang vừa giúp bảo vệ mắt', 480000, 'tk02', 'tk', 'trong-kinh-exfash-156-768x768.jpg'),
('15', 'Tròng kính đổi màu', 'Tròng kính hiện đại, thời trang vừa giúp bảo vệ mắt', 1630000, 'tk03', 'tk', 'grey-768x768.jpg'),
('2', 'Kính mát hàng hiệu', 'Mắt kính với kiểu dáng hiện đại, thời trang vừa giúp bảo vệ mắt vừa thể hiện đẳng cấp và sự sành điệu của bạn gái.', 345000, 'br03', 'km', '53S-9-800x800.jpg'),
('3', 'Tròng kính chống UV', 'Lớp phủ Emi có tính năng chống tia UV, hạn chế bám hơi, hạn chế trầy xước.', 535000, 'tk01', 'tk', 'trong-kinh-velocity-han-quoc-156.jpg'),
('4', 'Kính mát cho nữ', 'Kính mát hợp thời trang', 263000, 'br02', 'km', 'kinhmatdep.jpg'),
('5', 'Kính mát xịn xò', 'Mắt kính với kiểu dáng hiện đại, thời trang vừa giúp bảo vệ mắt', 250000, 'br02', 'km', 'kinh.jpg'),
('6', 'Kính mát cho nữ', 'Kính mát cho nữ với kiểu dáng hiện đại, thời trang vừa giúp bảo vệ mắt', 360000, 'br03', 'km', 'kinhchonu.jpg'),
('7', 'kính mát đổi tròng', 'Mắt kính với kiểu dáng hiện đại, thay đổi trong linh hoạt', 1100000, 'br04', 'km', 'kinhdoitrong.jpg'),
('9', 'gọng chất', 'Gọng kính với kiểu dáng hiện đại, thời trang vừa giúp bảo vệ mắt', 250000, 'br03', 'gk', 'gongtron.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_orderdetail`
--
ALTER TABLE `t_orderdetail`
  ADD CONSTRAINT `FK_Detail_Order` FOREIGN KEY (`orderId`) REFERENCES `t_order` (`orderId`),
  ADD CONSTRAINT `FK_Detail_Product` FOREIGN KEY (`prodId`) REFERENCES `t_product` (`prodId`);

--
-- Constraints for table `t_product`
--
ALTER TABLE `t_product`
  ADD CONSTRAINT `FK_Product_Brand` FOREIGN KEY (`prodBrand`) REFERENCES `t_brand` (`brandId`),
  ADD CONSTRAINT `FK_Product_Category` FOREIGN KEY (`prodType`) REFERENCES `t_categories` (`cateId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
