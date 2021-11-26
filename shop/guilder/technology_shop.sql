-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2021 lúc 07:46 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `technology_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `is_deleted`) VALUES
(2, 'Laptop', 0),
(4, 'Camera', 0),
(7, 'Phụ kiện', 0),
(9, 'Điện thoại', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `is_seen` int(11) DEFAULT 0,
  `marked` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `subject`, `content`, `created_at`, `updated_at`, `is_seen`, `marked`) VALUES
(1, 102, 'Bình luận chỉ mang tính chất nhận xu ^^', 'Sản phẩm đẹp vái nồi ông ôi, nhất là chị chụp ảnh mẫu í :3', '2021-11-03 15:12:49', '2021-11-03 15:12:49', 0, 0),
(2, 105, 'Xịn xò con bò', 'Mọi người nên mua sản phẩm này nha, tuy nó không nói lên độ giàu có của bạn nhưng nó cho thấy độ thừa tiền của bạn.', '2021-11-03 15:12:49', '2021-11-03 15:12:49', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(60) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 4, 'Máy ảnh Fujifilm', 40000000, 0, 'http://localhost/shop/mvc/views/assets/thumbnail/product/3559d83d6393c2a5458b067dd10d2074/may-anh.jpg', 'Muốn sở hữu một chiếc máy ảnh với mức giá vừa phải nhưng vẫn có đủ những tính năng cũng như đạt chuẩn chất lượng, JShop sẽ là những gì bạn tìm kiếm. JShop được biết đến là cửa hàng chuyên cung cấp các loại máy ảnh cũ, đã qua sử dụng nổi tiếng trong giới yêu máy ảnh. Không chỉ được đánh giá cao bởi chất lượng máy, JShop còn được lựa chọn bởi sản phẩm đa dạng với nhiều dòng máy ảnh được nhiều khách hàng sử dụng. Ngoài máy ảnh cũ, cửa hàng còn cung cấp các loại linh kiện rời như ống kính, phụ kiện chụp như đèn flash, chân máy, giá đỡ…', '2021-10-28 05:18:37', '2021-10-29 18:10:36', 0),
(2, 2, 'Laptop xịn nhất thế giới', 60000000, 0, 'https://vnreview.vn/image/21/09/36/2109365.jpg?t=1598539261256', 'ASUS Republic of Gamers (ROG) vừa tổ chức sự kiện trực tuyến RISE BEYOND để công bố chiếc laptop gaming 2 màn hình ROG Zephyrus Duo 15 cùng dải sản phẩm laptop chuyên game trang bị CPU Intel Core thế hệ 10 với thiết kế đột phá, mang lại trải nghiệm tối ưu cho game thủ và các nhà sáng tạo nội dung.', '2021-10-28 05:18:37', '2021-10-29 04:10:03', 0),
(4, 7, 'Màn hình PC xịn nhất thế giới', 12000000, 0, 'https://img.websosanh.vn/v10/users/review/images/3wp211hk373d2/1562902770235_3087482.jpg?compress=85', '', '2021-10-28 18:10:43', '2021-10-29 05:10:01', 0),
(12, 9, 'Điện thoại RedMi siêu cấp vjppro', 48000000, 0, 'http://localhost/shop/mvc/views/assets/thumbnail/product/1706b967cf03fe4938d2d171769abd5b/note-8-x.jpg', '', '2021-10-28 19:10:07', '2021-10-29 18:10:14', 0),
(13, 9, 'Điện thoại Nokia 1280 huyền thoại', 1000000, 0, 'https://media.vov.vn/uploaded/g3zdcpr1cvuly8uzveukg/2017_02_12/dienthoainokia1110igiarehcm0758490_essx.jpg', '', '2021-10-28 19:10:48', '2021-10-29 11:10:15', 0),
(17, 7, 'Tai nghe blutooth xịn nhất thế giới', 48000000, 0, 'http://localhost/shop/mvc/views/assets/thumbnail/product/d8ec0c0d1a1a5183713eb8924add6cb2/images.jpg', '', '2021-10-29 18:10:42', '2021-10-29 18:10:42', 0),
(18, 4, 'Máy ảnh xịn nhất thế giới', 12000000, 0, 'http://localhost/shop/mvc/views/assets/thumbnail/product/d8ec0c0d1a1a5183713eb8924add6cb2/download.jpg', '', '2021-10-29 18:10:10', '2021-10-29 18:10:10', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(3, 'User'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `token` varchar(300) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `token`
--

INSERT INTO `token` (`user_id`, `token`, `created_at`) VALUES
(102, '7df259c4c645e02df5ff9b33d205ca3a', '2021-11-08 19:11:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `pwd` varchar(300) NOT NULL,
  `birthday` datetime DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `addr`, `pwd`, `birthday`, `role_id`, `created_at`, `updated_at`, `is_deleted`) VALUES
(102, 'Trọng Thuyên', 'pandorakazira@gmail.com', '0123456789', '', '$2y$10$X27AziG7AfaFeL/NY7k0nOOri.o1pdVQCmCNj2rthxvIB3SUi0CJW', '0000-00-00 00:00:00', 4, '2021-10-27 17:10:40', '2021-11-03 09:11:19', 0),
(105, 'Thế Thân', 'abc@gmail.com', '', '', '$2y$10$lEqwLPF8uO9RuSO949WXz.jFsYa3v.2wzC8Z6zOTTTqqFBoqRabSe', '0000-00-00 00:00:00', 3, '2021-10-27 18:10:31', '2021-10-27 18:10:31', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `use_id` (`user_id`);

--
-- Chỉ mục cho bảng `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`user_id`,`token`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
