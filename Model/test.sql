-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2020 at 06:52 AM
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
-- Database: `xshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan1`
--

DROP TABLE IF EXISTS `binhluan1`;
CREATE TABLE IF NOT EXISTS `binhluan1` (
  `mabl` int(11) NOT NULL AUTO_INCREMENT,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL,
  `solike` int(11) NOT NULL,
  `sodislike` int(11) NOT NULL,
  PRIMARY KEY (`mabl`),
  KEY `fk_bl_mahh` (`mahh`),
  KEY `fk_bl_kh` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binhluan1`
--

INSERT INTO `binhluan1` (`mabl`, `mahh`, `makh`, `ngaybl`, `noidung`,`solike`,`sodislike`) VALUES
(1, 3, 7, '2020-08-14', '  Ngon',1,0),
(3, 3, 5, '2020-08-14', 'ngon',1,0),
(4, 3, 5, '2020-08-14', 'ngon',1,0),
(5, 3, 5, '2020-08-14', 'ngon',1,0),
(6, 3, 5, '2020-08-14', 'ngon',1,0),
(7, 3, 5, '2020-08-14', 'ngon',1,0),
(8, 3, 5, '2020-08-14', 'ngon',1,0),
(9, 3, 5, '2020-08-14', 'ngon',1,0),
(10, 3, 5, '2020-08-14', '  mac',1,10),
(11, 3, 5, '2020-08-14', '  binhthuong',1,0),
(12, 3, 5, '2020-08-14', '  binhthuong',11,0),
(13, 3, 5, '2020-08-14', '  mac',1,0),
(14, 3, 5, '2020-08-14', '  mac',1,0),
(15, 3, 5, '2020-08-14', '  mac',1,0);


-- --------------------------------------------------------

--
-- Table structure for table `cthoadon1`
--

DROP TABLE IF EXISTS `cthoadon1`;
CREATE TABLE IF NOT EXISTS `cthoadon1` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `size`varchar(10) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  PRIMARY KEY (`masohd`,`mahh`,`size`),
  KEY `fk_cthd_mahh` (`mahh`),
   KEY `fk_cthd_mahd` (`masohd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cthoadon1`
--


INSERT INTO `cthoadon1` (`masohd`, `mahh`, `soluongmua`, `size`, `thanhtien`) VALUES
(9, 3, 2, 'L', 1090000),
(9, 12, 2,'M', 1150000),
(10, 9, 2, 'S',1490000),
(10, 15, 1, 'S', 545000),
(11, 9, 2,  'S', 1490000),
(12, 9, 2,  'XL', 1490000),
(13, 2, 1, 'S', 545000),
(14, 2, 1,  'S', 545000);


-- --------------------------------------------------------
DROP TABLE IF EXISTS `voucher`;
CREATE TABLE IF NOT EXISTS `voucher` (
  `masovoucher` int(11) AUTO_INCREMENT,
  `tenvoucher` varchar(60) NOT NULL,
  `giamgia` int(11) NOT NULL,
   `conlai` int(11) NOT NULL,
  PRIMARY KEY (`masovoucher`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `voucher` (`masovoucher`, `tenvoucher`, `giamgia`, `conlai`) VALUES
(1,'Mã giảm 30k cho đơn hàng từ 0đ', 30000, 100),
(2,'Mã giảm 50k cho đơn hàng từ 0d', 50000, 10),
(3,'Mã free ship', 30000, 100),
(4,'Mã giảm 100k cho đơn hàng từ 0đ', 100000, 5),
(5,'Mã giam 10k cho đơn hàng từ 0d', 10000, 5);

DROP TABLE IF EXISTS `ctvoucher`;
CREATE TABLE IF NOT EXISTS `ctvoucher` (
  `masovoucher` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `masohd` int(11) NOT NULL,
  `sotiengiam` int(11) NOT NULL,
  PRIMARY KEY (`masovoucher`,`masohd`,`makh`),
   KEY `fk_ct_kh` (`makh`),
   KEY `fk_ct_hd` (`masohd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `hanghoa`
--

DROP TABLE IF EXISTS `hanghoa`;
CREATE TABLE IF NOT EXISTS `hanghoa` (
  `mahh` int(11) NOT NULL AUTO_INCREMENT,
  `tenhh` varchar(60) NOT NULL,
  `dongia` float NOT NULL,
  `giamgia` float NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `Nhom` int(11) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  PRIMARY KEY (`mahh`),
    KEY `  FK_hanghoa_maloai` (`Nhom`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `dongia`, `giamgia`, `hinh`, `Nhom`, `soluotxem`, `ngaylap`, `mota`) VALUES
(1, 'WISHES', 259000, 0, '1.jpg', 1, 5, '2020-08-08', '01 Pizza Gấp Đôi Nhân Phủ (Cỡ Vừa), 01 Xà Lách Trộn Cá Ngừ Và Thịt Xông Khói, 01 Chai nước ngọt 1,5L'),
(2, 'SEASON OF JOY', 289000, 0, '2.jpg',1, 3, '2020-08-08', '01 bánh Pizza Dòng Truyền Thống/ Cao Cấp cỡ vừa, 01 Pizza Dòng Truyền Thống cỡ vừa, dùng kèm 01 chai nước ngọt 1.5L tròn vị.'),
(3, 'TASY MEMORIES  ', 379000, 0, '3.jpg',1, 4, '2020-08-08', '01 Pizza Cao Cấp hoặc Truyền Thống Cỡ Lớn, 01 Cánh Gà Nướng BBQ (6 miếng), 01 chai nước ngọt 1.5L'),
(4, 'WINTER DAY', 419000, 0, '4.jpg',1, 1, '2020-08-08', '01 Pizza Cao Cấp hoặc Truyền Thống Cỡ Lớn, 01 Pizza Truyền Thống Cỡ Lớn, 02 Chai nước ngọt 1.5L'),
(5, 'MUA 1 ĐƯỢC 3 (CỠ VỪA)', 525000, 0, '5.jpg',2, 0, '2020-08-08', 'Mua 1 Tặng 2: Mua 01 Bánh Pizza Cỡ Vừa Được Tặng Ngay 01 Pepsi/7Up/Mirinda 1.5 L Cùng 01 Pizza Phô Mai Cao Cấp (P)/ 01 Khoai Tây Chiên/ 01 Bánh Cuộn Phô Mai'),
(6, 'MUA 1 ĐƯỢC 3 (CỠ LỚN)', 525000, 0, '6.jpg',2, 0, '2020-08-08', 'Mua 1 Tặng 2: Mua 01 Bánh Pizza Cỡ Lớn Được Tặng Ngay 01 Pepsi/7Up/Mirinda 1.5 L Cùng 01 Pizza Phô Mai Cao Cấp (R)/ 01 Mì Ý Bò Bằm Xốt Cà Chua'),
(9, 'PHẦN ĂN CHO BÉ 1 ', 89000, 0, '7.jpg', 3, 1, '2020-08-08', '01 Pizza Phô Mai Cao Cấp/ Hawaiian/ Pepperoni Cỡ Nhỏ 01 Khoai Tây Chiên (110g)/ Bánh Cuộn Phô Mai (4 cuộn)/ Bánh Mì Bơ Tỏi (2 miếng) 01 Lon Pepsi/ 7Up/ Mirinda'),
(10, 'PHẦN ĂN CHO BÉ 2 ', 114000, 0, '8.jpg',3, 1, '2020-08-08', '01 Pizza Cỡ Nhỏ Dòng Cao Cấp (Chọn 1 trong 6 loại) 01 Khoai Tây Chiên (110g)/ Bánh Cuộn Phô Mai (4 cuộn)/ Bánh Mì Bơ Tỏi (2 miếng) 01 Lon Pepsi/ 7Up/ Mirinda'),
(11, 'COMBO MY BOX 1', 99000, 0, '9.jpg',4, 1, '2020-08-08', 'Dành Cho 1-2 Người 01 Pizza Truyền Thống (Cỡ Nhỏ) 01 Bánh Mì Bơ Tỏi/ Bánh Cuộn Phô Mai/ Khoai Tây Chiên'),
(12, 'COMBO MY BOX 2', 129000, 0, '10.jpg', 4, 2, '2020-08-08', 'Dành Cho 1-2 Người 01 Pizza Truyền Thống (Cỡ Nhỏ) 02 Bánh Mì Bơ Tỏi/ Bánh Cuộn Phô Mai/ Khoai Tây Chiên'),
(15, 'COMBO MY BOX 3 ', 159000, 0, '11.jpg',4, 1, '2020-08-08', 'Dành Cho 1-2 Người 01 Pizza (Cỡ Nhỏ) 02 Bánh Mì Bơ Tỏi/ Bánh Cuộn Phô Mai/ Khoai Tây Chiên'),
(16, 'COMBO MY BOX 4', 179000, 0, '12.jpg',4, 2, '2020-08-08', 'Dành Cho 1-2 Người 01 Pizza (Cỡ Nhỏ) 01 Bánh Mì Bơ Tỏi/ Bánh Cuộn Phô Mai/ Khoai Tây Chiên 01 Cánh Gà Nướng BBQ (2 Miếng)'),
(17, 'COMBO MY BOX 5 ', 179000, 0, '13.jpg',4, 2, '2020-08-08', 'Dành Cho 1-2 Người 01 Pizza (Cỡ Vừa) 01 Bánh Mì Bơ Tỏi/ Bánh Cuộn Phô Mai/ Khoai Tây Chiên'),
(18, 'THÊM BẠN THÊM NGON - COMBO 1 ', 169000, 0, '14.jpg',5, 1, '2020-08-08', 'Dành cho 2 người 01 Pizza Truyền Thống (cỡ vừa) 01 Mỳ Ý Bò Bằm Xốt Cà Chua/ Xà Lách Trộn Cá Ngừ Và Thịt Xông Khói/ Khoai tây chiên 01 Lon Pepsi/ 7UP/ Mirinda'),
(19, 'THÊM BẠN THÊM NGON - COMBO 2 ', 279000, 0, '15.jpg',5, 1, '2020-08-08', 'Dành cho 3-4 người 01 Pizza ALC (cỡ vừa) 01 Mì Ý bò bằm sốt cà chua/01 Mì Ý hải sản sốt cà chua 01 Xà Lách Trộn Cá Ngừ Và Thịt Xông Khói/ 01 Phô mai cuộn/ 01 Khoai tây chiên/ 01 Bánh mì bơ tỏi 02 Lon Nước Ngọt Pepsi/ 7UP/ Mirinda'),
(20, 'THÊM BẠN THÊM NGON - COMBO 3 ', 449000, 0, '16.jpg',5, 1, '2020-08-08', 'Dành cho 5-6 người 01 Pizza ALC (cỡ lớn) 01 Cánh Gà Nướng BBQ (4 miếng)/ Cánh Gà Chiên Xốt Cay Hàn Quốc (4 miếng) 01 Mì Ý bò bằm sốt cà chua/ 01 Mì Ý hải sản sốt cà chua 01 Xà Lách Trộn Cá Ngừ Và Thịt Xông Khói/ 01 Phô mai cuộn/ 01 Khoai tây chiên/ 01 Bánh mì bơ tỏi 01 Chai Nước Ngọt Pepsi/ 7UP/ Mirinda 1.5L'),
(21, 'COMBO THƠM NGON NHÚN NHẢY ', 299000, 0, '21.jpg',5, 1, '2020-08-15', 'Dành cho 2 người: 01 Pizza bánh xèo tôm nhảy (Cỡ Vừa); 01 Xà Lách Trộn Cá Ngừ và Thịt Xông Khói/Xà Lách Gà Pesto; 02 lon nước ngọt 320ml/ 01 chai nước ngọt 1.5L/ 02 Aquafina 500ml'),
(22, 'COMBO VỊ NGON CHÁY PHỐ', 3990000, 0, '22.jpg',5, 1, '2020-08-04', 'Dành cho 3-4 người: 01 Pizza Bánh Xèo Tôm Nhảy (Cỡ Vừa); 01 Xà Lách; 01 Mỳ hoặc Cơm; 04 lon nước ngọt 320ml hoặc 01 chai nước ngọt 1.5L hoặc 03 chai nước suối 500ml'),
(24, 'LIMO PIZZA', 668000, 0, '24.jpg',5, 1, '2020-07-04', 'Pizza LIMO dài 1m có đến 3 loại nhân phủ đặc trưng của Pizza Hut cùng khoai tây chiên giòn thơm, vàng ươm. Phù hợp cho nhóm từ 8-10 người. Khách hàng có nhu cầu đặt từ 3 Limo Pizza, Xin vui lòng liên hệ tổng đài 1900 1822 để được phục vụ tốt nhất.');

DROP TABLE IF EXISTS `Size`;
CREATE TABLE IF NOT EXISTS `Size` (
  `maSize` int(11) NOT NULL AUTO_INCREMENT,
   `Size` varchar(10) NOT NULL,
  `dongia` float NOT NULL,
  PRIMARY KEY (`maSize`)
)ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
INSERT INTO `Size` (`maSize`, `Size`,`dongia`) VALUES
(1,"S", 0),
(2,"M", 20000),
(3,"L", 40000),
(4,"XL", 60000),
(5,"XXL", 80000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon1`
--
DROP TABLE IF EXISTS `yeuthich`;
CREATE TABLE IF NOT EXISTS `yeuthich` (
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  PRIMARY KEY (`mahh`,`makh`),
  KEY `fk_yt_mahh` (`mahh`),
  KEY `fk_yt_kh` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
INSERT INTO `yeuthich` ( `mahh`, `makh`) VALUES
( 3, 7  );
DROP TABLE IF EXISTS `hoadon1`;
CREATE TABLE IF NOT EXISTS `hoadon1` (
  `masohd` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL,
  PRIMARY KEY (`masohd`),
  KEY `fk_hoadon_kh` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon1`
--

INSERT INTO `hoadon1` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(9, 7, '2020-08-13', 2240000),
(10, 7, '2020-08-13', 2035000),
(11, 7, '2020-08-13', 2035000),
(12, 7, '2020-08-13', 2035000),
(13, 5, '2020-09-02', 545000),
(14, 7, '2020-09-09', 545000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang1`
--

DROP TABLE IF EXISTS `khachhang1`;
CREATE TABLE IF NOT EXISTS `khachhang1` (
  `makh` int(11) NOT NULL AUTO_INCREMENT,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `vaitro` int(1) DEFAULT 0,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang1`
--

INSERT INTO `khachhang1` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`, `vaitro`) VALUES
(3, 'a', 'a', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '', '', 0),
(4, 'a', 'a', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '', '', 0),
(5, 'an', 'an', '202cb962ac59075b964b07152d234b70', 'an@gmail.com', '', '', 0),
(6, 'an', 'an', '202cb962ac59075b964b07152d234b70', 'an@gmail.com', '', '', 0),
(7, 'Nguyên', 'nguyen', '202cb962ac59075b964b07152d234b70', 'nguyen@gmail.com', '', '', 0),
(8,'admin','admin','aab4e37f7f898669ee8427fc3fffaeed','admin@gmail.com','','',1);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maloai` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(50) NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
(1,'MIRACLES'),
(2,'MUA1'),
(3,'KIDS BOX'),
(4,'MY BOX'),
(5,'LIMO COMBO');
--
-- Dumping data for table `loai`
--

-- INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
-- (1, 'Giày Cao Gót', 3),
-- (3, 'Giày Sandals', 3),
-- (4, 'Giày Búp Bê', 3),
-- (5, 'Giày Sneaker', 3),
-- (6, 'Giày Boots', 3),
-- (7, 'Giày Da Thật', 3),
-- (8, 'Giày Lười', 3),
-- (10, 'Túi da', 4),
-- (13, 'túi da', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

-- DROP TABLE IF EXISTS `menu`;
-- CREATE TABLE IF NOT EXISTS `menu` (
--   `idmenu` int(11) NOT NULL AUTO_INCREMENT,
--   `name` varchar(30) NOT NULL,
--   `link` varchar(150) NOT NULL,
--   PRIMARY KEY (`idmenu`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

-- INSERT INTO `menu` (`idmenu`, `name`, `link`) VALUES
-- (1, 'Trang Chủ', 'index.php'),
-- (3, 'Giày', ''),
-- (4, 'Túi Xách', 'View/sanphamtui.php'),
-- (5, 'Liên Hệ', 'View/lienhe.php'),
-- (6, 'Tài Khoản', 'View/gioithieu.php');

-- --
-- Constraints for dumped tables
--
ALTER TABLE `ctvoucher`
  ADD CONSTRAINT `fk_ct_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang1` (`makh`),
    ADD CONSTRAINT `fk_ct_hd` FOREIGN KEY (`masohd`) REFERENCES `hoadon1` (`masohd`);
--
ALTER TABLE `yeuthich`
  ADD CONSTRAINT `fk_yt_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang1` (`makh`),
  ADD CONSTRAINT `fk_yt_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`);
-- Constraints for table `binhluan1`
--
ALTER TABLE `binhluan1`
  ADD CONSTRAINT `fk_bl_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang1` (`makh`),
  ADD CONSTRAINT `fk_bl_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`);

--
-- Constraints for table `cthoadon1`
--
ALTER TABLE `cthoadon1`
  ADD CONSTRAINT `fk_cthd_mahd` FOREIGN KEY (`masohd`) REFERENCES `hoadon1` (`masohd`),
  ADD CONSTRAINT `fk_cthd_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `FK_hanghoa_maloai` FOREIGN KEY (`Nhom`) REFERENCES `loai` (`maloai`);

--
-- Constraints for table `hoadon1`
--
ALTER TABLE `hoadon1`
  ADD CONSTRAINT `fk_hoadon_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang1` (`makh`);

--
-- Constraints for table `loai`
--
-- ALTER TABLE `loai`
--   ADD CONSTRAINT `FK_loai_menu` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
