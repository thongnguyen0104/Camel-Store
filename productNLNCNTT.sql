-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 07:52 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_product` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_product`, `id_user`, `amount`) VALUES
(1, 2, 1),
(1, 17, 2),
(2, 3, 3),
(3, 4, 1),
(4, 5, 2),
(5, 2, 1),
(6, 3, 2),
(7, 6, 1),
(8, 6, 4),
(9, 5, 3),
(10, 3, 3),
(11, 4, 1),
(12, 5, 1),
(13, 8, 1),
(13, 17, 1),
(14, 9, 2),
(15, 5, 3),
(16, 2, 1),
(17, 5, 1),
(18, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `content` varchar(255) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `star` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `id_user`, `id_product`, `star`, `date`) VALUES
(1, 'Chất lượng sản phẩm ổn', 17, 1, 2, '2022-03-25 10:59:02'),
(2, 'Chất lượng tạm', 2, 1, 4, '2022-03-24 22:03:04'),
(3, 'Chất lượng kém', 6, 2, 2, '2022-03-18 22:03:47'),
(4, 'Chất lượng rất tệ, không giống mô tả', 17, 71, 1, '2022-03-30 10:20:33'),
(5, 'Tốt tốt tốt', 3, 23, 5, '2022-03-24 10:22:49'),
(6, 'Tạm ổn', 4, 71, 4, '2022-03-08 10:23:23'),
(7, '123', 10, 1, 2, '2022-03-30 18:32:22'),
(8, 'Nhat quyet phai lam cho ra trong buôi hom nay', 6, 26, 4, '2022-03-30 19:07:56'),
(9, 'Nhat quyet phai lam cho ra trong buôi hom nay', 8, 1, 1, '2022-03-30 19:11:45'),
(10, 'Nhat quyet phai lam cho ra trong buôi hom nay', 11, 4, 4, '2022-03-30 19:11:57'),
(11, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 54, 4, '2022-03-30 19:12:12'),
(12, 'Nhat quyet phai lam cho ra trong buôi hom nay', 9, 1, 1, '2022-03-30 19:13:10'),
(13, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 21, 4, '2022-03-30 19:22:37'),
(14, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 12, 3, '2022-03-30 19:23:47'),
(15, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 55, 4, '2022-03-30 19:24:36'),
(16, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 11, 4, '2022-03-30 19:24:39'),
(17, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 45, 3, '2022-03-30 19:26:24'),
(18, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 1, 4, '2022-03-30 19:26:29'),
(19, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 13, 4, '2022-03-30 19:26:32'),
(20, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 4, 4, '2022-03-30 19:26:46'),
(21, 'Nhat quyet phai lam cho ra trong buôi hom nay', 7, 1, 3, '2022-03-30 19:27:08'),
(22, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 6, 3, '2022-03-30 19:27:30'),
(23, 'Nhat quyet phai lam cho ra trong buôi hom nay', 11, 6, 2, '2022-03-30 19:27:38'),
(24, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 35, 2, '2022-03-30 19:27:53'),
(25, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 52, 4, '2022-03-30 19:33:18'),
(26, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 50, 3, '2022-03-30 19:36:22'),
(27, 'Nhat quyet phai lam cho ra trong buôi hom nay', 17, 14, 3, '2022-03-30 19:37:36'),
(28, 'th4', 17, 63, 4, '2022-03-30 19:38:00'),
(29, 'Sản phẩm tốt, phù hợp với giá tiền. Nếu săn vào dúng ngày KM thì sản phẩm còn rẽ hơn nửa', 17, 1, 4, '2022-04-01 19:43:23'),
(30, 'san pham tot', 17, 1, 5, '2022-04-05 18:50:33'),
(31, '1235 ngày', 17, 1, 4, '2022-04-06 05:10:53'),
(32, 'Day la test', 17, 26, 3, '2022-04-06 08:49:47'),
(33, 'Day la test', 17, 26, 3, '2022-04-06 08:58:53'),
(34, 'Day la test', 17, 26, 3, '2022-04-06 09:02:35'),
(35, 'Day la test', 17, 26, 3, '2022-04-06 09:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `id_status` char(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `delivery_date`, `id_user`, `id_status`, `address`, `phone`) VALUES
(1, '2021-05-20', '2021-05-20', 3, 'DG', '124 đường Mạc Thiên Tích, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0338309523'),
(2, '2021-05-21', '2021-05-21', 3, 'DG', '12 đường Lý Tự Trọng, phường An Lạc, quận Ninh Kiều, TP.Cần Thơ', '0358309329'),
(3, '2021-05-21', '2021-05-22', 3, 'DG', '45 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0123763585'),
(4, '2021-05-21', '2021-05-21', 5, 'DG', '82 đường Trần Văn Hoài, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0925385162'),
(5, '2021-05-24', '2021-05-24', 6, 'DG', '97 đường Hùng Vương, phường An Cư, quận Ninh Kiều, TP.Cần Thơ', '0873174284'),
(6, '2021-05-24', '2021-05-25', 11, 'DG', '48 đường Trần Ngọc Quế, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0836109481'),
(7, '2021-05-24', '2021-05-25', 7, 'DG', '178 đường Nguyễn Việt Hồng, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0927385387'),
(8, '2021-05-25', '2021-05-26', 7, 'DG', '132 đường Mậu Thân, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0391278359'),
(9, '2021-05-25', '2021-05-26', 8, 'DG', '228 đường Nguyễn Trãi, phường Cái Khế, quận Ninh Kiều, TP.Cần Thơ', '0331489511'),
(10, '2021-05-25', '2022-03-17', 9, 'DCB', '124 đường Mạc Thiên Tích, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0702137273'),
(11, '2021-05-26', NULL, 1, 'DGH', '12 đường Lý Tự Trọng, phường An Lạc, quận Ninh Kiều, TP.Cần Thơ', '0338309523'),
(12, '2021-05-26', NULL, 8, 'DGH', '45 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0358309329'),
(13, '2021-05-26', NULL, 8, 'DCB', '82 đường Trần Văn Hoài, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0123763585'),
(14, '2021-05-27', NULL, 6, 'DCB', '97 đường Hùng Vương, phường An Cư, quận Ninh Kiều, TP.Cần Thơ', '0925385162'),
(15, '2021-05-28', NULL, 5, 'CXL', '48 đường Trần Ngọc Quế, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0873174284'),
(16, '2021-05-28', NULL, 9, 'CXL', '178 đường Nguyễn Việt Hồng, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0836109481'),
(29, '2022-03-16', NULL, 17, 'CXL', '132 đường Mậu Thân, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0927385387');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id_order` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `price_product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id_order`, `id_product`, `amount`, `price_product`) VALUES
(1, 7, 1, 720000),
(2, 8, 2, 590000),
(3, 9, 3, 170000),
(4, 10, 1, 260000),
(5, 11, 3, 750000),
(6, 12, 3, 490000),
(7, 13, 4, 290000),
(8, 14, 2, 370000),
(9, 15, 3, 520000),
(10, 16, 2, 280000),
(11, 17, 3, 790000),
(12, 18, 3, 850000),
(29, 4, 2, 900000),
(29, 8, 2, 590000),
(29, 51, 1, 790000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_product_type` int(10) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `id_promotion` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `id_product_type`, `image1`, `image2`, `image3`, `image4`, `image5`, `id_promotion`) VALUES
(1, 'Nồi cơm nắp gài Kangaroo 1.5 lít KG825', '950000', 'Nồi cơm nắp gài thiết kế đẹp mắt đáp ứng nhu cầu nấu cơm cơ bản; Nấu cơm chín nhanh chóng qua công nghệ nấu 1D, công suất 500W', 1, '1.jpg', '1.1.jpg', '1.2.jpg', '1.3.jpg', '1.4.jpg', 0),
(2, 'Nồi cơm điện tử Joyoung 1.8 lít F-50FY13', '1790000', 'Nấu cơm thơm ngon, chín đều nhờ công nghệ nấu gia nhiệt tuần hoàn; Gia nhiệt đều, nấu cơm nhanh, giữ ấm lâu với công suất 860W cùng lòng nồi dạng niêu', 1, '2.jpg', '2.1.jpg', '2.2.jpg', '2.3.jpg', '2.4.jpg', 0),
(3, 'Nồi cơm nắp gài Kangaroo 2.2 lít KG829', '1150000', 'Nồi cơm nắp gài nhỏ gọn, đẹp mắt phù hợp cho nhu cầu nấu cơm cơ bản; Nấu cơm chín đều, tơi xốp, thơm ngon nhớ công nghệ nấu 1D, công suất 900W', 1, '3.jpg', '3.1.jpg', '3.2.jpg', '3.3.jpg', '3.4.jpg', 0),
(4, 'Nồi cơm nắp gài Kangaroo 1.2 lít KG822', '900000', 'Nồi cơm nắp gài nhỏ gọn, đẹp mắt sử dụng cho nhu cầu nấu cơm cơ bản; Nấu cơm chín đều, tơi xốp, thơm ngon nhờ công nghệ nấu 3D', 1, '4.jpg', '4.1.jpg', '4.2.jpg', '4.3.jpg', '4.4.jpg', 0),
(5, 'Nồi cơm nắp gài Delites 1.8 lít NCG1010', '790000', 'Nồi cơm nắp gài thiết kế đẹp mắt đáp ứng nhu cầu nấu cơm cơ bản; Nấu cơm chín nhanh đều, tơi xốp, thơm ngon nhờ công nghệ nấu 3D', 1, '5.jpg', '5.1.jpg', '5.2.jpg', '5.3.jpg', '5.4.jpg', 0),
(6, 'Nồi cơm nắp gài Kangaroo 2.2 lít KG572', '890000', 'Nồi cơm nắp gài thiết kế nổi bật phù hợp cho nhu cầu nấu cơm cơ bản; Cơm nấu nhín ngon, nhanh chóng qua công nghệ nấu 1D, công suất 700W', 1, '6.jpg', '6.1.jpg', '6.2.jpg', '6.3.jpg', '6.4.jpg', 0),
(7, 'Nồi cơm nắp gài Ava 1.8 lít NCG1806', '720000', 'Thiết kế đơn giản, màu sắc trẻ trung; Công nghệ nấu 1D, công suất 700W truyền nhiệt từ đáy nồi, cơm chín nhanh', 1, '7.jpg', '7.1.jpg', '7.2.jpg', '7.3.jpg', '7.4.jpg', 0),
(8, 'Nồi cơm điện Midea 0.6 lít MR-CM06SD', '590000', 'Thiết kế màu cam tơi tắn, nhỏ gọn; Công nghệ nấu 1D nấu chín từ 20 - 30 phút', 1, '8.jpg', '8.1.jpg', '8.2.jpg', '8.3.jpg', '8.4.jpg', 0),
(9, 'Bình đun siêu tốc Delites 1.5 lít ST15S01', '170000', 'Đáp ứng nhu cầu pha cà phê, nấu mì… với dung tích 1.5 lít; Nấu nước sôi nhanh 5- 7  phút với công suất 1500W', 2, '9.jpg', '9.1.jpg', '9.2.jpg', '9.3.jpg', '9.4.jpg', 0),
(10, 'Bình đun siêu tốc Delites 1.8 lít ST18DB01', '260000', 'Đáp ứng nhu cầu pha cà phê, nấu mì… với dung tích 1.8 lít; Nấu nước sôi nhanh 7 - 8 phút với công suất 1800W', 2, '10.jpg', '10.1.jpg', '10.2.jpg', '10.3.jpg', '10.4.jpg', 0),
(11, 'Bình đun siêu tốc Electrolux 1.7 lít EEK3505', '750000', 'Đáp ứng nhu cầu pha cà phê, nấu mì… với dung tích 1.7 lít; Nấu nước sôi nhanh 4 - 6 phút với công suất 2200W', 2, '11.jpg', '11.1.jpg', '11.2.jpg', '11.3.jpg', '11.4.jpg', 0),
(12, 'Bình đun siêu tốc Sunhouse 1.7 lít SHD1382B', '490000', 'Dung tích 1.7 lít, tay cầm to bản dễ dàng cầm nắm; Mâm nhiệt từ inox bền bỉ truyền nhiệt tốt, an toàn', 2, '12.jpg', '12.1.jpg', '12.2.jpg', '12.3.jpg', '12.4.jpg', 0),
(13, 'Bình đun siêu tốc Delites 1.7 lít ST17P01WG', '290000', 'Dung tích 1.7 lít, thang đo mực nước tiện châm nước khi đun; Chất liệu nhựa PP an toàn sức khỏe, đế tiếp tiện xoay 360 độ lấy nước dễ dàng', 2, '13.jpg', '13.1.jpg', '13.2.jpg', '13.3.jpg', '13.4.jpg', 0),
(14, 'Bình đun siêu tốc Delites 1.8 lít ST18G02', '370000', 'Đáp ứng nhu cầu pha cà phê, nấu mì… với dung tích 1.8 lít; Nấu nước sôi nhanh 5 - 7 phút với công suất 2200W', 2, '14.jpg', '14.1.jpg', '14.2.jpg', '14.3.jpg', '14.4.jpg', 0),
(15, 'Bình đun siêu tốc Kangaroo 1.5 lít KG-18K1', '520000', 'Đáp ứng nhu cầu pha cà phê, nấu mì… với dung tích 1.5 lít; Nấu nước sôi nhanh 5 - 7 phút với công suất 1800W', 2, '15.jpg', '15.1.jpg', '15.2.jpg', '15.3.jpg', '15.4.jpg', 0),
(16, 'Bình đun siêu tốc Delites 1.5 lít ST10P01', '280000', 'Đáp ứng nhu cầu pha cà phê, nấu mì… với dung tích 1.0 lít; Nấu nước sôi nhanh 4 - 6 phút với công suất 2200W', 2, '16.jpg', '16.1.jpg', '16.2.jpg', '16.3.jpg', '16.4.jpg', 0),
(17, 'Máy xay đa năng Kangaroo KG2B3', '790000', 'Công suất 380W, 2 tố độ xay và 1 chức năng nhồi; Xay hạt, sinh tố, rau củ, gia vị\n2 cối xay nhự nguyên sinh:cối lớn 1 lít và cối nhỏ 0.2 lít', 3, '17.jpg', '17.1.jpg', '17.2.jpg', '17.3.jpg', '17.4.jpg', 0),
(18, 'Máy xay sinh tố Electrolux EBR3416', '850000', 'Công suất 400W, 3 tốc độ xay, 1 chức năng nhồi; 2 cối xay nhựa, cối lớn 1.25 lít và cối nhỏ 0.2 lít; Xay hạt, sinh tố, rau củ, gia vị', 3, '18.jpg', '18.1.jpg', '18.2.jpg', '18.3.jpg', '18.4.jpg', 0),
(19, 'Máy xay sinh tố đa năng Haf3le GS-603 (535.43.262)', '1990000', 'Công suất 1000W, tốc độ linh hoạt và 3 nút chức năng; Cối thủy tinh 1.5 lít, dễ vệ sinh, tránh ám mùi thực phẩm; Xay đá, súp, sin tố, rau củ', 3, '19.jpg', '19.1.jpg', '19.2.jpg', '19.3.jpg', '19.4.jpg', 0),
(20, 'Máy xay sinh tố đa năng Sunhouse SHD5340', '1090000', 'Công suất 500W, 1 tốc độ xay; 3 cối xay, cối lớn 1.2 lít và 2 cối nhỏ 0.57 lít, 0.25 lít; Xay đá, hạt, thịt, sinnh tố', 3, '20.jpg', '20.1.jpg', '20.2.jpg', '20.3.jpg', '20.4.jpg', 0),
(21, 'Máy xay sinh tố đa năng chân không Hafele BR230-19E00 (535.43.271)', '3990000', 'Công suất 1000w, 2 tốc độ xay và 3 nút chức năng; Cối nhự 1 lít gọn nhẹ, dễ vệ sinh; Xay đá, hạt, sinh tố, ép trái cây', 3, '21.jpg', '21.1.jpg', '21.2.jpg', '21.3.jpg', '21.4.jpg', 0),
(22, 'Máy xay cầm tay Bosch MSM64110', '1880000', 'Công suất 450W; 2 tốc đọ xay; Máy xay cầm tay, cốc xay bằng nhựa 0.6 lít; Xay cháo, sinh tố, rau củ', 3, '22.jpg', '22.1.jpg', '22.2.jpg', '22.3.jpg', '22.4.jpg', 0),
(23, 'Máy xay sinh tố Electrolux E7TB1 84SM', '4490000', 'Công suất 900W, 3 tốc độ xay, 5 nút chức năng; 2 cối xay nhựa, cối lớn 1.5 lít và cối nhỏ 0.4 lít; Xay đá, thịt, sinh tố, rau củ', 3, '23.jpg', '23.1.jpg', '23.2.jpg', '23.3.jpg', '23.4.jpg', 0),
(24, 'Máy xay sinh tố Electrolux E7TB1-50CW', '3490000', 'Công suất 900W, 3 tốc độ xay và 4 nút chức năng; Cối xay nhựa Tritan 1.5 lít gọn nhẹ dễ vệ sinh; Xay đá, súp, sinh tố, rau củ', 3, '24.jpg', '24.1.jpg', '24.2.jpg', '24.3.jpg', '24.4.jpg', 0),
(25, 'Máy ép chậm Kalite KL-550', '4190000', 'Công nghệ ép chậm J.H.C.S bảo toàn vitamin, Enzym gáp 4 lần; Ép tối ưu: Giữ 98% chất dinh dưỡng, giữ nguyên 100% hương vị tự nhiên; Công suất 240W, trụ quay chắc chắn ép kiệt bã với vòng quay 55 vòng/phút', 4, '25.jpg', '25.1.jpg', '25.2.jpg', '25.3.jpg', '25.4.jpg', 0),
(26, 'Máy ép chậm Kalite KL-565', '4625000', 'Máy ép chậm, ép khô bã giữ được 98% vitamin và dưỡng chất; Tốc độ 60 vòng/phút cùng công suất 240W giúp ép thực phẩm nhanh và gọn hơn; Điều khiển nút nhấn với 1 tốc độ có đảo chiều tránh ngẹt nguyên liệu', 4, '26.jpg', '26.1.jpg', '26.2.jpg', '26.3.jpg', '26.4.jpg', 0),
(27, 'Máy ép chậm Hafele GS-133 (535.43.811)', '3390000', 'Máy ép chậm ép khô bã, kiệt nước giữ lại hầu hết vitamin và dưỡng chất; Ép hiệu suất cao, thu được nhiều nước ép động cơ DC, công suất 200W; Lưới lọc, khay chứa bền bỉ, dùng an toàn, chất liệu inox, nhựa không chứa BPA', 4, '27.jpg', '27.1.jpg', '27.2.jpg', '27.3.jpg', '27.4.jpg', 0),
(28, 'Máy ép trái cây Hafele GS-353 (535.43.086)', '1290000', 'Công suất 400W mạnh mẽ xay ép nhanh; Điều khiển bằng núm xoay với 2 tốc độ dễ dàng ép trái cây: dứa, táo, cà rốt; Cắt nhuyễn trái cây, lọc nước ép mịn với lưới lọc bằng thép không gỉ', 4, '28.jpg', '28.1.jpg', '28.2.jpg', '28.3.jpg', '28.4.jpg', 0),
(29, 'Máy ép chậm Hafele JE230-BL (535.43.531)', '6990000', 'Máy ép chậm giúp ép khô bã, nhiều nước lưu giữ phần lớn vitamin, dưỡng chất;\nĐộnh cơ lõi dồng, trục ép hoạt động êm ái công suất 250W, tốc độ quay 34 vòng/phút; Vòi ra nước ép chống nhỏ giọt ngăn rò rỉ, chỉnh được lượng nước ép chảy ra', 4, '29.jpg', '29.1.jpg', '29.2.jpg', '29.3.jpg', '29.4.jpg', 0),
(30, 'Máy ép chậm Kalite KL-530', '2740000', 'Bảo toàn 100% hương vị, 90% lượng vitamin nhờ công nghệ ép chậm; Ép kiệt bã, thu được nhiều nước ép với công suất 200W, tốc độ ép 60 vòng/phút; Chất liệu cao cấp, an toàn với thực phẩm lưới lọc inox 304, bình chứa bằng nhựa ABS', 4, '30.jpg', '30.1.jpg', '30.2.jpg', '30.3.jpg', '30.4.jpg', 0),
(31, 'Máy ép chậm Kalite KL-598', '6990000', 'Công suất 400W 1 tốc độ ép và chức năng xoay đảo chiều; Máy ép chậm đa năng, ép kiệt bã, giữ nguyên dưỡng chất; Trang bị 3 lưới lọc tiện lợi, thay đổi linh hoạt', 4, '31.jpg', '31.1.jpg', '31.2.jpg', '31.3.jpg', '31.4.jpg', 0),
(32, 'Máy ép trái cây Hommy GS-321', '1420000', 'Công suất 800W, lưới lọc bằng inox 430 ép nhanh chóng, thu được nhiều nước ep;\nỐng tiếp nguyên liệu đường kính 7.5 cm dễ dàng ép trái cây cỡ nhỏ, vừa nguyên trái;\nMáy ép trái cây gọn đẹp đáp ứng nhu cầu ép cơ bản', 4, '32.jpg', '32.1.jpg', '32.2.jpg', '32.3.jpg', '32.4.jpg', 0),
(33, 'Nồi chiên không dầu Joyoung KL35-D981 3.5 lít', '3590000', 'Dung tích 3.5 lít, công suất 1300W, chiên được 0.8kg khoai tây;\nCông nghệ làm nóng điện trở nhiệt, giảm lượng chất béo đến 80%;\nCài đặt nhiệt độ 80 - 200 độ C, thời gian 0 - 24 tiếng', 5, '33.jpg', '33.1.jpg', '33.2.jpg', '33.3.jpg', '33.4.jpg', 0),
(34, 'Nồi chiên không dầu Tefal EY201815 4.2 lít', '3999000', 'Dung tích 4.2 lít, công suất 1500W, chiên được gà nguyên con 1kg;\nCông nghệ Rapid Air, giảm lượng chất béo đến 90%;\nCài đặt nhiệt độ 80 - 200 độ C, thời gian 0 - 60 phút', 5, '34.jpg', '34.1.jpg', '34.2.jpg', '34.3.jpg', '34.4.jpg', 0),
(35, 'Nồi chiên không dầu Tefal EY701D15 5.6 lít', '5999000', 'Dung tích 5.6 lít, công suất 1850W, chiên được gà nguyên con 1.2kg;\nCông nghệ luân chuyển khí nóng 3D, chiên thực phẩm hạn chế dầu mỡ;\nCài đặt nhiệt độ 80 - 200 độ C, thời gian 0 - 60 phút', 5, '35.jpg', '35.1.jpg', '35.2.jpg', '35.3.jpg', '35.4.jpg', 0),
(36, 'Nồi chiên không dầu Ava 55K07A 5.5 lít', '2190000', 'Dung tích 5.5 lít, công suất 1350W, phù hợp cho gí đình 2 -4 người;\nCông nghệ Rapid Air không khí đối lưu, chiên thực phẩm hạn chế dầu mỡ;\nCài đặt nhiệt độ 80 - 200 độ C, thời gian 0 - 30 phút', 5, '36.jpg', '36.1.jpg', '36.2.jpg', '36.3.jpg', '36.4.jpg', 0),
(37, 'Nồi chiên không dầu Ava AF40155D 5 lít', '1990000', 'Dung tích 5 lít, công suất 1700W, chiên được khoai tây 1kg;\nCông nghệ Rapid Air không khí đối lưu, giảm lượng chất béo 80 - 90%;\nCài đặt nhiệt độ 80 - 200 độ C, thời gian 0 - 60 phút', 5, '37.jpg', '37.1.jpg', '37.2.jpg', '37.3.jpg', '37.4.jpg', 0),
(38, 'Nồi chiên không dầu Bluestone AFB-5866 3.5 lít', '2700000', 'Dung tích 5 lít, công suất 1700W, chiên được khoai tây 1kg;\nCông nghệ Rapid Air không khí đối lưu, giảm lượng chất béo đến 80%;\nCài đặt nhiệt độ tối đa 200 độ C, thời gian 0 - 30 phút', 5, '38.jpg', '38.1.jpg', '38.2.jpg', '38.3.jpg', '38.4.jpg', 0),
(39, 'Nồi chiên không dầu Mishio MK-221 5 lít', '3190000', 'Dung tích 5 lít, công suất 1500W, chiên được khoai tây 1kg;\nCông nghệ Rapid Air không khí đối lưu, giảm lượng chất béo đến 80%;\nCài đặt nhiệt độ 80 - 200 độ C, thời gian 0 - 30 phút', 5, '39.jpg', '39.1.jpg', '39.2.jpg', '39.3.jpg', '39.4.jpg', 0),
(40, 'Nồi chiên không dầu Kalite Q10 10 lít', '2790000', 'Dung tích 10 lít, công suất 1800W, nướng gà nguyên con ~ 1.2kg;\nCông nghệ Rapid Air không khí đối lưu, giảm lượng chất bé 80 - 90%;\nCài đặt nhiệt độ 40 - 200 độ C, thời gian 0 - 90 phút', 5, '40.jpg', '40.1.jpg', '40.2.jpg', '40.3.jpg', '40.4.jpg', 0),
(41, 'Nồi lẩu điện Delites CBR35-80 3.5 lít', '540000', 'Thiết kế đơn giản, gọn đẹp, phù hợp nấu ăn tại gia đình;\nDung tích 3.5 lít phù hợp gia đình 4 - 6 người; Công suất 1300W nấu thức ăn nhanh chín', 6, '41.jpg', '41.1.jpg', '41.2.jpg', '41.3.jpg', '41.4.jpg', 0),
(42, 'Nồi lẩu điện Happycook HCHP-350ST 3.5 lít', '469000', 'Nấu ăn nhanh, tiết kiệm điện với công suất 1300W;\nPhù hợp gia đình 3 - 5 người cùng dung tích nồi 3.5 lít;\nTùy chỉnh nhiệt độ dễ dàng nhờ điều khiển dạng núm xoay', 6, '42.jpg', '42.1.jpg', '42.2.jpg', '42.3.jpg', '42.4.jpg', 0),
(43, 'Nồi lẩu điện Delites NL001 3 lít', '65000', 'Đun sôi nước lẩu nhanh nhờ công suất 1300W;\nPhù hợp cho gia đình 2 - 4 người với dung tích nồi đến 3 lít;\nĐiều khiển núm xoay linh hoạt dễ dàng tùy chỉnh nhiệt độ', 6, '43.jpg', '43.1.jpg', '43.2.jpg', '43.3.jpg', '43.4.jpg', 0),
(44, 'Nồi lẩu điện Delites CBR45-90 4.5 lít', '670000', 'Thiết kế trang nhã, hiện đại, có tay cầm dễ dàng di chuyển;\nDung tích 4.5 lít, đáp ứng nhu cầu ăn của gia đình 4 - 6 người;\nLòng nòi tráng men chống dính dễ vệ sinh sau khi sử dụng', 6, '44.jpg', '44.1.jpg', '44.2.jpg', '44.3.jpg', '44.4.jpg', 0),
(45, 'Nồi lẩu điện Sunhouse SHD4526 4 lít', '990000', 'Nấu lẩu, chiên xào nhanh với công suất 1300W;\nPhù hợp gia đình 4 - 6 người cùng dung tích nồi 4 lít;\nTùy chỉnh nhiệt độ dễ dàng nhờ điều khiển dạng nút gạt', 6, '45.jpg', '45.1.jpg', '45.2.jpg', '45.3.jpg', '45.4.jpg', 0),
(46, 'Nồi lẩu điện Mishio MK-112 5 lít', '490000', 'Thiết kế sang trọng phù hợp mọi không gian bếp;\nCông suất cao 1500W giúp thức ăn nhanh chín, tiết kiệm thời gian;\nDung tích 5 lít, đáp ứng nhu cầu sử dụng cho gia đình 4 - 6 người', 6, '46.jpg', '46.1.jpg', '46.2.jpg', '46.3.jpg', '46.4.jpg', 0),
(47, 'Nồi lẩu điện Sunhouse SH-525L 4 lít', '680000', 'Nấu lẩu ngon, tiết kiệm điện với công suất 1600W;\nPhù hợp gia đình đông người cùng dung tích nồi 4 lít;\nLòng nồi dễ về sinh, an toàn với nhôm phủ men chống dính', 6, '47.jpg', '47.1.jpg', '47.2.jpg', '47.3.jpg', '47.4.jpg', 0),
(48, 'Nồi lẩu điện Sunhouse SHD 4521 3 lít', '590000', 'Nấu lẩu thơm ngon, tiết kiệm điện với công suất 1300W;\nPhù hợp gia đình 3 - 5 người cùng dung tích nồi 3 lít;\nLòng nồi dễ về sinh, an toàn với nhôm phủ men chống dính', 6, '48.jpg', '48.1.jpg', '48.2.jpg', '48.3.jpg', '48.4.jpg', 0),
(49, 'Bếp nướng điện Sunhouse SHD4600 1600 W', '675000', 'Làm nóng, nướng thực phẩm nhanh với công suất 1600W;\nNướng ngon, an toàn, dễ lau chùi cùng bề mặt vân đá hoa cương Whitford;\nHứng dầu trực tiếp vào khay inox nhờ miệng rót dầu', 7, '49.jpg', '49.1.jpg', '49.2.jpg', '49.3.jpg', '49.4.jpg', 0),
(50, 'Bếp nướng điện Kangaroo KG 699 2000 W', '690000', 'Kiểu dáng hiện đại, tiện dụng với thiết kế nhỏ gọn, đẹp mắt;\nNấu chín thực phẩm nhanh dưới công suất 2000W mạnh mẽ;\nNướng ngon, an toàn, dễ lau chùi, mặt bếp phủ lớp chống dính bền bỉ', 7, '50.jpg', '50.1.jpg', '50.2.jpg', '50.3.jpg', '50.4.jpg', 0),
(51, 'Bếp nướng điện Kangaroo KG 699G 2000 W', '790000', 'Công suất 2000W nướng nhanh chóng;\nMặt bếp hạn chế dính thức ăn, dễ vệ sinh nhờ bề mặt phủ chống dính đá hoa cương; Món nướng ngon, ít dầu mỡ với bếp thiết kế miệng rót dầu', 7, '51.jpg', '51.1.jpg', '51.2.jpg', '51.3.jpg', '51.4.jpg', 0),
(52, 'Bếp nướng điện Delites BN02 1800 W', '850000', 'Công suất 1800W nướng nhanh chóng;\nMặt bếp chống trầy, dễ lau chùi với bề mặt phủ chống dính bền tốt cương;\nChủ động kiểm soát nhiệt độ nướng bằng núm xoay điều chỉnh nhiệt độ', 7, '52.jpg', '52.1.jpg', '52.2.jpg', '52.3.jpg', '52.4.jpg', 0),
(53, 'Bếp nướng điện Delites BN03 2000W', '760000', 'Công suất 1800W nướng nhanh chóng;\nMặt bếp chống trầy, dễ lau chùi với bề mặt phủ chống dính bền tốt cương;\nChủ động kiểm soát nhiệt độ nướng bằng núm xoay điều chỉnh nhiệt độ', 7, '53.jpg', '53.1.jpg', '53.2.jpg', '53.3.jpg', '53.4.jpg', 0),
(54, 'Bếp nướng điện Sunhouse SHD4607 1500 W', '450000', 'Kiểu dáng hiện đại, tiện dụng với thiết kế nhỏ gọn, đẹp mắt;\nNấu chín thực phẩm nhanh dưới công suất 1500W mạnh mẽ;\nNướng ngon, an toàn, dễ lau chùi, nhờ mặt bếp phủ lớp chống dính bền bỉ', 7, '54.jpg', '54.1.jpg', '54.2.jpg', '54.3.jpg', '54.4.jpg', 0),
(55, 'Bếp nướng điện Sunhouse SHD4602', '1150000', 'Công suất 2000W nướng nhanh chóng;\nMặt bếp kháng khuẩn, an toàn nhờ lớp phủ chống dính Whitford - USA;\nTiện quan sát thức ăn bên trong với nắp kính cường lực trong suốt', 7, '55.jpg', '55.1.jpg', '55.2.jpg', '55.3.jpg', '55.4.jpg', 0),
(56, 'Bếp nướng điện Sunhouse SHD4603 1500 W', '1350000', 'Làm nóng, nướng thực phẩm nhanh với công suất 1500W;\nNướng ngon, an toàn, dễ lau chùi cùng bề mặt vân đá hoa cương Whitford;\nThéo dõi thực phẩm, chống bắn bẩn nhờ nắp  kính cường lực trong suốt', 7, '56.jpg', '56.1.jpg', '56.2.jpg', '56.3.jpg', '56.4.jpg', 0),
(57, 'Bếp hồng ngoại Sunhouse SHD 6015', '1090000', 'Một vùng nấu, nhỏ gọn, tiết kiệm diện tích; Công suất 2000W nấu nhanh chóng;\nMặt kính chịu nhiệt bền tốt, dễ lau chìu; Khóa bảng điều khiển dùng an toàn', 8, '57.jpg', '57.1.jpg', '57.2.jpg', '57.3.jpg', '57.4.jpg', 0),
(58, 'Bếp hồng ngoại Sunhouse SHD 6005', '975000', 'Tiết kiệm thời gian nấu nướng với công suất 2000W;\nChống nứt vỡ, dày bền, dễ vệ sinh cùng mặt bếp kính chịu lực, chịu nhiệt;\nChế đọ an toàn: khóa bảng điều khiển tự ngắt khi quá tải và đèn báo bếp nóng', 8, '58.jpg', '58.1.jpg', '58.2.jpg', '58.3.jpg', '58.4.jpg', 0),
(59, 'Bếp hồng ngoại Kangaroo KG20IFP1', '750000', 'Nhỏ gọn, dễ dàng di chuyển bếp hồng ngoại với 1 vùng nấu;\nNấu ăn nhanh chóng công suất 2000W; \nChịu lực, chịu nhiệt tốt mặt bếp bằng kính chịu nhiệt bền bỉ', 8, '59.jpg', '59.1.jpg', '59.2.jpg', '59.3.jpg', '59.4.jpg', 0),
(60, 'Bếp hồng ngoại Sanaky SNK-2103HGN', '1110000', 'Một vùng nấu, nhỏ gọn, dễ đặt bàn tiện dụng; Công suất 2000W tiết kiệm điện;\nMặt kính chịu nhiệt bền tốt, dễ lau chìu; 6 chế độ nấu có hẹn giờ tiện dụng', 8, '60.jpg', '60.1.jpg', '60.2.jpg', '60.3.jpg', '60.4.jpg', 0),
(61, 'Bếp hồng ngoại Sanaky SNK2102HG', '1040000', 'Một vùng nấu, nhỏ gọn, dễ mang đi, đặt được trên bàn ăn;\nCông suất 2000W nấu ăn nhanh; Mặt kính chịu nhiệt sáng bóng, chịu nhiệt tốt', 8, '61.jpg', '61.1.jpg', '61.2.jpg', '61.3.jpg', '61.4.jpg', 0),
(62, 'Bếp hồng ngoại Sanaky SNK-2101HG', '1080000', 'Một vùng nấu, đặt được trên bàn ăn; Công suất 2000W nấu ăn nhanh;\nMặt kính chịu nhiệt, chịu lực tố; 5 chế độ nấu, có hện giờ tiện dụng', 8, '62.jpg', '62.1.jpg', '62.2.jpg', '62.3.jpg', '62.4.jpg', 0),
(63, 'Bếp hồng ngoại Hommy KT861', '990000', 'Tiện để bàn, tiết kiệm diện tích thiết kế bếp đơn 1 vùng nấu; Công suất 2000W nấu nhanh chóng; Đơn giản dễ sử dụng điều khiển cảm ứng bằng tiếng Việt', 8, '63.jpg', '63.1.jpg', '63.2.jpg', '63.3.jpg', '63.4.jpg', 0),
(64, 'Bếp hồng ngoại Whirlpool ACT209/BLV', '1290000', 'Nấu chín thức ăn nhanh nhờ công suất nấu 2200W; Sử dụng bền bỉ, dễ vệ sinh với mặt bếp chịu lực chịu nhiệt; an toàn với khóa bẳng điều khiển, tắt ngắt điện khi quá nhiệt', 8, '64.jpg', '64.1.jpg', '64.2.jpg', '64.3.jpg', '64.4.jpg', 0),
(71, 'San pham test', '9999999999', 'Day la san pham test', 6, '1647439510.png', '1647439511.png', '1647439512.png', '1647439513.png', '1647439514.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `description`, `image`) VALUES
(1, 'Nồi cơm điện', 'Mang đến những bửa cơm đầy dinh dưỡng cho gia đình bạn', 'comdien.jpg'),
(2, 'Ấm đun siêu tốc', 'Giải pháp hiệu quả cho người bận rộn', 'amdun.jpg'),
(3, 'Máy xay sinh tố', 'Lựa chọn tốt nhất hàng đàu mang lại vitamin trái cây', 'mayxay.jpg'),
(4, 'Máy ép trái cây', 'Chắc lọc sự tinh túy từ thiện nhiên trong ly nước ép', 'mayep.jpg'),
(5, 'Nồi chiên không dầu', 'Cắt giảm lượng dầu mỡ tối đa cho gia đình bạn', 'noichien.jpg'),
(6, 'Lẩu điện', 'Sự lựa chọn tối ưu cho bửa xum họp gia đình', 'laudien.jpg'),
(7, 'Bếp nướng', 'Những buổi tiệc nướng đầy ấm áp bên người thân được mang lại', 'bepnuong.jpg'),
(8, 'Bếp hồng ngoại', 'Căn bếp đầy tiện nghi và sang trọng khi có mặt sản phẩm này', 'bephongngoai.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percent` int(10) DEFAULT NULL,
  `statr_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `check` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `name`, `percent`, `statr_date`, `end_date`, `check`) VALUES
(1, 'Gia khong giam', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` char(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
('CXL', 'Chưa xử lý'),
('DCB', 'Đang chuẩn bị đơn hàng'),
('DG', 'Đã giao'),
('DGH', 'Đang giao hàng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(2) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `id_cmt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `password`, `email`, `role`, `avatar`, `id_cmt`) VALUES
(1, 'Quản trị viên', '0000000000', '0000000000', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'admin@gmail.com', 0, NULL, 0),
(2, 'Nguyễn Tùng Lâm', '0338309523', '124 đường Mạc Thiên Tích, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'lam@gmail.com', 1, '1648306909.jpg', 0),
(3, 'Nguyễn Hoàng Thông', '0358309329', '12 đường Lý Tự Trọng, phường An Lạc, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'thong@gmail.com', 1, NULL, 0),
(4, 'Hầu Diễm Xuân', '0123763585', '45 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'xuan@gmail.com', 1, NULL, 0),
(5, 'Phạm Chí Trung', '0925385162', '82 đường Trần Văn Hoài, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'trung@gmail.com', 1, NULL, 0),
(6, 'Đoàn Duy Thanh', '0873174284', '97 đường Hùng Vương, phường An Cư, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'thanh@gmail.com', 1, '1648306931.jpg', 0),
(7, 'Nguyễn Huỳnh Hoàng Phúc', '0836109481', '48 đường Trần Ngọc Quế, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'phuc@gmail.com', 1, NULL, 0),
(8, 'Trần Văn Thiệt', '0927385387', '178 đường Nguyễn Việt Hồng, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'thiet@gmail.com', 1, NULL, 0),
(9, 'Nguyễn Thị Thúy Lựu', '0391278359', '132 đường Mậu Thân, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'luu@gmail.com', 1, NULL, 0),
(10, 'Trịnh Kim Chi', '0331489511', '228 đường Nguyễn Trãi, phường Cái Khế, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'chi@gmail.com', 1, NULL, 0),
(11, 'Trần Phương Thảo', '0702137273', '312 đường Nguyễn Văn Linh, phường Hưng Lợi, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'thao@gmail.com', 1, NULL, 0),
(17, 'Nguyễn Hoàng Thông', '0358576500', '125 đường Mạc Thiên Tích, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$ekh6Tw/UE3VO80qoitZX2ujAfaes4CO4dzUdwuXUjBSsPP92Nrh.u', 'nguyenhoangthong@gmail.com', 1, '1648306880.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_product`,`id_user`) USING BTREE,
  ADD KEY `fk_id_users_cart` (`id_user`) USING BTREE;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user_comment` (`id_user`),
  ADD KEY `fk_id_product_comment` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_id_status_orders` (`id_status`) USING BTREE,
  ADD KEY `fk_id_users_orders` (`id_user`) USING BTREE;

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_order`,`id_product`) USING BTREE,
  ADD KEY `fk_product_id` (`id_product`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_id_type_product_products` (`id_product_type`) USING BTREE,
  ADD KEY `fk_id_promotion_products` (`id_promotion`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_id_products_cart` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_users_cart` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_id_product_comment` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_id_user_comment` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_id_status_orders` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_users_orders` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_id_type_product_products` FOREIGN KEY (`id_product_type`) REFERENCES `product_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
