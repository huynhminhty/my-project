-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2024 lúc 11:43 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sales_manager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_customer_table`
--

CREATE TABLE `account_customer_table` (
  `id_customer` int(11) NOT NULL,
  `name_customer` varchar(100) NOT NULL,
  `email_customer` varchar(100) NOT NULL,
  `phone_customer` varchar(100) NOT NULL,
  `password_customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account_customer_table`
--

INSERT INTO `account_customer_table` (`id_customer`, `name_customer`, `email_customer`, `phone_customer`, `password_customer`) VALUES
(1, 'Minh Tỷ ', 'mty10052003@gmail.com', '0932830936', 'mt1234'),
(2, 'Đình Quân', 'dquan27032003@gmail.com', '0935800933', 'dq1234'),
(3, 'Mỹ Ngân', 'mngan15112000@gmail.com', '0922506769', 'mn1234');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_table`
--

CREATE TABLE `admin_table` (
  `id_admin` int(11) NOT NULL,
  `user_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_table`
--

INSERT INTO `admin_table` (`id_admin`, `user_admin`, `password_admin`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_table`
--

CREATE TABLE `bill_table` (
  `id_bill` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `address_bill` varchar(100) NOT NULL,
  `price_bill` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_table`
--

INSERT INTO `bill_table` (`id_bill`, `id_customer`, `address_bill`, `price_bill`) VALUES
(5, 1, 'Cần Thơ', 914000),
(6, 1, 'Vĩnh Long', 1110000),
(7, 1, 'Vĩnh Long', 420000),
(8, 1, 'Vĩnh Long', 420000),
(12, 2, 'Cần Thơ', 1520000),
(13, 1, 'Cần Thơ', 1480000),
(14, 1, 'Cần Thơ', 740000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_table`
--

CREATE TABLE `cart_table` (
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `size_product` int(11) NOT NULL,
  `price_cart` int(20) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `pay_cart` tinyint(1) NOT NULL,
  `date_bill` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_table`
--

INSERT INTO `cart_table` (`id_cart`, `id_product`, `id_customer`, `quantity_product`, `size_product`, `price_cart`, `id_bill`, `pay_cart`, `date_bill`) VALUES
(8, 3, 1, 4, 2, 1480000, 5, 0, '2023-12-13'),
(9, 4, 1, 2, 3, 840000, 5, 0, '2023-12-13'),
(10, 1, 1, 12, 2, 11840000, 6, 0, '2023-12-14'),
(11, 4, 1, 1, 4, 420000, 7, 0, '2023-12-14'),
(12, 4, 1, 1, 2, 420000, 8, 0, '2023-12-14'),
(13, 7, 2, 4, 4, 1520000, 12, 0, '2023-12-14'),
(16, 1, 2, 1, 2, 370000, 0, -1, ''),
(17, 3, 2, 1, 2, 370000, 0, -1, ''),
(19, 1, 1, 2, 3, 740000, 13, 0, '2024-02-03'),
(22, 12, 1, 2, 3, 740000, 13, 0, '2024-02-03'),
(23, 1, 1, 2, 2, 740000, 14, 0, '2024-02-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_table`
--

CREATE TABLE `product_table` (
  `id_product` int(11) NOT NULL,
  `code_product` varchar(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `value_product` int(11) NOT NULL,
  `type_product` varchar(20) NOT NULL,
  `img_first_product` varchar(999) NOT NULL,
  `img_last_product` varchar(999) NOT NULL,
  `information_product` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_table`
--

INSERT INTO `product_table` (`id_product`, `code_product`, `name_product`, `value_product`, `type_product`, `img_first_product`, `img_last_product`, `information_product`) VALUES
(1, 'LMPPB01', 'LEVENTS® MINI POPULAR POLO', 370000, 'Áo Polo', 'POPULAR-POLO-TEE-B1-scaled.jpg', 'POPULAR-POLO-TEE-B2-scaled.jpg', '<p><span style=\"font-size:14px\">+ LEVENTS&reg; MINI POPULAR POLO</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Chất liệu: L&Igrave; VEN ORIGINAL&nbsp; &ndash;&nbsp; Phi&ecirc;n bản bề mặt vải kh&ocirc;ng đổ l&ocirc;ng mang cảm gi&aacute;c tho&aacute;ng m&aacute;t</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">L&igrave; ven Original kh&ocirc;ng l&ocirc;ng được &aacute;p dụng cho to&agrave;n bộ sản phẩm &aacute;o thun m&agrave;u đen</span></li>\r\n	<li><span style=\"font-size:14px\">L&igrave; ven Original 2.0 c&oacute; l&ocirc;ng vẫn được &aacute;p dụng cho c&aacute;c &aacute;o thun m&agrave;u kh&aacute;c</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">Sản phẩm&nbsp;<a href=\"https://levents.asia/product-category/ao/polo/\">&aacute;o Polo</a>&nbsp;thuộc Bộ sưu tập Xu&acirc;n/ H&egrave; 2022 của Levents</span></p>\r\n'),
(3, 'LMPPW1', 'LEVENTS® MINI POPULAR POLO', 370000, 'Áo Polo', 'POPULAR-POLO-TEE-W1-1-scaled.jpg', 'POPULAR-POLO-TEE-W2-1-scaled.jpg', '<p><span style=\"font-size:14px\">+ LEVENTS&reg; MINI POPULAR POLO</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Chất liệu: L&Igrave; VEN ORIGINAL&nbsp; &ndash;&nbsp; Phi&ecirc;n bản bề mặt vải kh&ocirc;ng đổ l&ocirc;ng mang cảm gi&aacute;c tho&aacute;ng m&aacute;t</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">L&igrave; ven Original kh&ocirc;ng l&ocirc;ng được &aacute;p dụng cho to&agrave;n bộ sản phẩm &aacute;o thun m&agrave;u đen</span></li>\r\n	<li><span style=\"font-size:14px\">L&igrave; ven Original 2.0 c&oacute; l&ocirc;ng vẫn được &aacute;p dụng cho c&aacute;c &aacute;o thun m&agrave;u kh&aacute;c</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">Sản phẩm&nbsp;<a href=\"https://levents.asia/product-category/ao/polo/\">&aacute;o Polo</a>&nbsp;thuộc Bộ sưu tập Xu&acirc;n/ H&egrave; 2022 của Levents</span></p>\r\n'),
(4, 'LSPW1', 'LEVENTS® STRIPE POLO', 420000, 'Áo Polo', 'POLO-TEE-W1-1-scaled.jpg', 'POLO-TEE-W2-scaled.jpg', '<p><span style=\"font-size:14px\">+&nbsp;LEVENTS&reg; STRIPE POLO</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Chất liệu: L&Igrave; VEN FABRIC</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Sản phẩm&nbsp;<a href=\"https://levents.asia/product-category/ao/polo/\">&aacute;o Polo</a>&nbsp;thuộc Bộ sưu tập Xu&acirc;n/ H&egrave; 2021 của&nbsp;<a href=\"https://levents.asia/\">Levents</a></span></p>\r\n'),
(7, 'LCTB1', 'LEVENTS® COLOR TEE', 380000, 'Áo Thun', 'COTTON-COLOR-TEE-B1-scaled.jpg', 'COTTON-COLOR-TEE-B2-scaled.jpg', '<p><span style=\"font-size:14px\">LEVENTS&reg; COLOR TEE</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Sản phẩm: L&Igrave; VEN ORIGINAL 2.0 &ndash; Phi&ecirc;n bản bề mặt vải c&oacute; l&ocirc;ng, khắc phục t&igrave;nh trạng bị nhăn của sản phẩm.</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">L&igrave; ven Original kh&ocirc;ng l&ocirc;ng được &aacute;p dụng cho to&agrave;n bộ sản phẩm &aacute;o thun m&agrave;u đen</span></li>\r\n	<li><span style=\"font-size:14px\">L&igrave; ven Original 2.0 c&oacute; l&ocirc;ng vẫn được &aacute;p dụng cho c&aacute;c &aacute;o thun m&agrave;u kh&aacute;</span><span style=\"font-size:12px\">c</span></li>\r\n</ul>\r\n'),
(8, 'LCMBT01', 'Levents® Company & Mates Boxy Tee/ Dark Green', 390000, 'Áo Thun', 'Company-Mates-Boxy-Tee-Dark-Green-b1.jpg', 'Company-Mates-Boxy-Tee-Dark-Green-b2.jpg', '<p><span style=\"font-size:14px\">Levents&reg; Company &amp; Mates Boxy Tee<br />\r\n<br />\r\n&Aacute;o form boxy cứng c&aacute;p, dạng như chiếc hộp vu&ocirc;ng. Dễ phối đồ, gi&uacute;p t&ocirc;n d&aacute;ng người được thon gọn v&agrave; cao r&aacute;o. Ph&ugrave; hợp để sử dụng hằng ng&agrave;y, kết hợp với mọi trang phục, phụ kiện<br />\r\n<br />\r\nMặt trước: Chữ Mates được in ở ngực tr&aacute;i của &aacute;o</span></p>\r\n\r\n<p><br />\r\n<span style=\"font-size:14px\">Mặt sau: H&igrave;nh ảnh sử dụng kỹ thuật in dập nổi cao cấp để giữ cho m&agrave;u sắc graphic được chuẩn nhất. Đảm bảo giữ được chất lượng của graphic sau nhiều lần giặt<br />\r\n<br />\r\nLogo Levents th&ecirc;u ở g&oacute;c phải dưới c&ugrave;ng của &aacute;o<br />\r\n<br />\r\n- Cấu tr&uacute;c sản phẩm: L&igrave; Ven Compact</span></p>\r\n'),
(9, 'LSBT01', 'Levents® \"My Animals\" Series Bear Tee / Black', 369000, 'Áo Thun', 'Levents-Series-Bear-Tee-b1.jpg', 'Levents-Series-Bear-Tee-b2.jpg', '<p><span style=\"font-size:14px\"><strong>LEVENTS&reg; &quot;MY ANIMALS&quot; BEAR TEE</strong><br />\r\n<br />\r\n&Aacute;o oversize c&oacute; độ d&agrave;i phủ qu&aacute; m&ocirc;ng,phần tay &aacute;o rộng r&atilde;i, d&agrave;i tay &aacute;o chạm khuỷu tay người mặc, form d&aacute;ng thoải m&aacute;i, rộng r&atilde;i khi mặc.<br />\r\n<br />\r\nMặt trước: Graphic gấu x&aacute;m đội mũ k&egrave;m phụ kiện k&iacute;nh r&acirc;m v&agrave; v&aacute;n trượt mang m&agrave;u sắc baby blue tươi s&aacute;ng l&agrave;m nổi bật graphic, tạo sự năng động v&agrave; dễ thương. Kết hợp c&ugrave;ng d&ograve;ng chữ levents ở g&oacute;c dưới graphic. Sử dụng kỹ thuật in lụa cao cấp để giữ cho m&agrave;u sắc được chuẩn nhất. Đảm bảo giữ được chất lượng v&agrave; m&agrave;u sắc sau nhiều lần giặt<br />\r\n<br />\r\nMặt sau: Lưng &aacute;o được tạo điểm nhấn với graphic chữ viết tay &quot;levents my animal series&quot; in lụa<br />\r\n<br />\r\nLogo Levents th&ecirc;u ở g&oacute;c phải dưới c&ugrave;ng của &aacute;o<br />\r\n<br />\r\n- Cấu tr&uacute;c sản phẩm: L&igrave; Ven Original - cotton.<br />\r\n- L&igrave; Ven Original - bề mặt vải kh&ocirc;ng đổ l&ocirc;ng mang cảm gi&aacute;c tho&aacute;ng m&aacute;t.</span></p>\r\n'),
(10, 'L1LT01', 'Levents® 2Lip Tee/ Cream', 390000, 'Áo Thun', '2Lip-Tee-Cream-b1.jpg', '2Lip-Tee-Cream-b2.jpg', '<p><span style=\"font-size:14px\">LEVENTS&reg; 2LIP TEE/ CREAM<br />\r\n<br />\r\n&Aacute;o oversize c&oacute; độ d&agrave;i phủ qu&aacute; m&ocirc;ng,phần tay &aacute;o rộng r&atilde;i, d&agrave;i tay &aacute;o chạm khuỷu tay người mặc, form d&aacute;ng thoải m&aacute;i, rộng r&atilde;i khi mặc. Ph&ugrave; hợp với mọi giới t&iacute;nh<br />\r\n<br />\r\nMặt trước: Graphic hoa Tulip được phối m&agrave;u bắt mắt kết hợp c&ugrave;ng hoạt tiết bầu trời v&agrave; l&aacute; c&acirc;y c&ugrave;ng với chữ k&yacute; Levents ở g&oacute;c tr&aacute;i b&ecirc;n dưới graphic. Graphic sử dụng kỹ thuật in lụa cao cấp để giữ cho m&agrave;u sắc graphic được chuẩn nhất. Đảm bảo giữ được chất lượng của graphic sau nhiều lần giặt<br />\r\n<br />\r\nMặt sau: Graphic viết tay &quot;Levents the artist&quot; được in lụa tạo điểm nhấn cho phần lưng &aacute;o<br />\r\n<br />\r\nLogo Levents th&ecirc;u ở g&oacute;c phải dưới c&ugrave;ng của &aacute;o<br />\r\n<br />\r\n- Cấu tr&uacute;c sản phẩm: L&igrave; Ven Compact<br />\r\n- L&igrave; ven Compact &ndash; chất vải d&agrave;y dặn, tho&aacute;ng m&aacute;t, mềm mịn, kh&ocirc;ng bị nhăn, x&ugrave;.</span></p>\r\n'),
(11, 'LSPB1', 'LEVENTS® STRIPE POLO', 420000, 'Áo Polo', 'POLO-TEE-B1-scaled.jpg', 'POLO-TEE-B2-scaled.jpg', '<p><span style=\"font-size:14px\">LEVENTS&reg; STRIPE POLO<br />\r\n<br />\r\n&Aacute;o oversize c&oacute; độ d&agrave;i phủ qu&aacute; m&ocirc;ng,phần tay &aacute;o rộng r&atilde;i, d&agrave;i tay &aacute;o chạm khuỷu tay người mặc, form d&aacute;ng thoải m&aacute;i, rộng r&atilde;i khi mặc. Ph&ugrave; hợp với mọi giới t&iacute;nh<br />\r\n<br />\r\nLogo Levents th&ecirc;u ở g&oacute;c phải dưới c&ugrave;ng của &aacute;o<br />\r\n<br />\r\n- Cấu tr&uacute;c sản phẩm: L&igrave; Ven Fabric.<br />\r\n- L&igrave; Ven Fabric - d&agrave;y dặn nhưng tho&aacute;ng m&aacute;t, mềm mịn v&agrave; kh&ocirc;ng bị nhăn.</span></p>\r\n'),
(12, 'LCRT', 'Levents® Classic Regular Tee', 370000, 'Áo Thun', 'Classic-Regular-Tee-b1.jpg', 'Classic-Regular-Tee-b2.jpg', '<p><span style=\"font-size:14px\">Levents&reg; Classic Regular Tee<br />\r\n<br />\r\n&Aacute;o form regular fit c&oacute; độ d&agrave;i ngang m&ocirc;ng ,phần tay &aacute;o vừa vặn, form d&aacute;ng thoải m&aacute;i, t&ocirc;n d&aacute;ng nhưng vẫn rất thoải m&aacute;i khi mặc.<br />\r\n<br />\r\nMặt trước: Logo Levents th&ecirc;u nổi với m&agrave;u xanh đặc trưng của Nh&agrave; L&igrave;<br />\r\n<br />\r\nLogo Levents th&ecirc;u ở g&oacute;c phải dưới c&ugrave;ng của &aacute;o<br />\r\n<br />\r\n- Cấu tr&uacute;c sản phẩm: L&igrave; Ven Original - cotton.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">- L&igrave; Ven Original - bề mặt vải kh&ocirc;ng đổ l&ocirc;ng mang cảm gi&aacute;c tho&aacute;ng m&aacute;t.</span></p>\r\n'),
(13, 'LVSXL', 'Lvs Xl \"Lấp Lánh\" Logo Black / Pink', 420000, 'Áo Thun', 'Lvs-Xl-b1.jpg', 'Lvs-Xl-b2.jpg', '<p><span style=\"font-size:14px\">LEVENTS&reg; LVS XL LOGO TEE<br />\r\n<br />\r\n&Aacute;o oversize c&oacute; độ d&agrave;i phủ qu&aacute; m&ocirc;ng,phần tay &aacute;o rộng r&atilde;i, d&agrave;i tay &aacute;o chạm khuỷu tay người mặc, form d&aacute;ng thoải m&aacute;i, rộng r&atilde;i khi mặc. Ph&ugrave; hợp với mọi giới t&iacute;nh<br />\r\n<br />\r\nMặt trước: Logo Levents đặc trưng c&ugrave;ng phối m&agrave;u trắng được sử dụng kỹ thuật th&ecirc;u cao cấp để giữ cho m&agrave;u sắc v&agrave; độ bền qua thời gian sử dụng<br />\r\n<br />\r\nMặt sau: Logo levents đặc trưng được in&nbsp;hiệu ứng lấp l&aacute;nh,&nbsp;tạo điểm nhấn cho phần lưng &aacute;o<br />\r\n<br />\r\nLogo Levents th&ecirc;u ở g&oacute;c phải dưới c&ugrave;ng của tay &aacute;o<br />\r\n<br />\r\n- Cấu tr&uacute;c sản phẩm: L&igrave; Ven Original - cotton.<br />\r\n- L&igrave; Ven Original - bề mặt vải kh&ocirc;ng đổ l&ocirc;ng mang cảm gi&aacute;c tho&aacute;ng m&aacute;t.</span></p>\r\n');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account_customer_table`
--
ALTER TABLE `account_customer_table`
  ADD PRIMARY KEY (`id_customer`);

--
-- Chỉ mục cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `bill_table`
--
ALTER TABLE `bill_table`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account_customer_table`
--
ALTER TABLE `account_customer_table`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bill_table`
--
ALTER TABLE `bill_table`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
