-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2022 lúc 05:39 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `bill_user_id` int(11) NOT NULL,
  `bill_fullname` varchar(255) NOT NULL,
  `bill_address` text NOT NULL,
  `bill_numberphone` text NOT NULL,
  `bill_note` text NOT NULL,
  `bill_total` int(11) NOT NULL,
  `bill_status` varchar(50) NOT NULL,
  `bill_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `bill_id`, `bill_user_id`, `bill_fullname`, `bill_address`, `bill_numberphone`, `bill_note`, `bill_total`, `bill_status`, `bill_date`) VALUES
(19, 861633, 1, 'Nguyen Bui Thien Dat', '312 An Dương Vương', '0988487614', '312 An Dương Vương', 630000, 'Đã thanh toán', '2022-03-19'),
(20, 671108, 1, 'Nguyen Bui Thien Dat', '312 An Dương Vương', '0988487614', '312 An Dương Vương', 230000, 'Mới', '2022-03-19'),
(21, 968905, 1, 'Nguyen Bui Thien Dat', '99 Ngô Quyền, phường 12, quận 7, TP HCM', '0988487614', '99 Ngô Quyền, phường 12, quận 7, TP HCM', 330000, 'Đang xử lý', '2022-03-19'),
(22, 536726, 4, 'Nam Hoang', 'avc', '0988461123', '', 230000, 'Đã thanh toán', '2022-03-19'),
(27, 743468, 1, 'Nguyen Bui Thien Dat', '312 Ngo va tu', '0988487614', 'asdasdasdsa', 400000, 'Đã thanh toán', '2022-03-30'),
(28, 604078, 1, 'Nguyen Bui Thien Dat', 'asdasdasd', '0988487614', 'asdasdadasd', 150000, 'Đã thanh toán', '2022-03-30'),
(33, 306856, 1, 'Nguyen Bui Thien Dat', '312 Ngô Gia Tự, Hà Nội', '0988487614', 'ship giờ hành chính pls', 2470000, 'Đã thanh toán', '2022-05-16'),
(37, 888298, 1, 'Nguyen Bui Thien Dat', '312 Ngô Gia Tự, Hà Nội', '0988487614', '', 1560000, 'Đang xử lý', '2022-05-16'),
(38, 504683, 1, 'Nguyen Bui Thien Dat', '312 Ngô Gia Tự, Hà Nội', '0988487614', '', 300000, 'Đang xử lý', '2022-05-16'),
(39, 720064, 1, 'Nguyen Bui Thien Dat', '312 Ngô Gia Tự, Hà Nội', '0988487614', '', 510000, 'Đang xử lý', '2022-05-17'),
(40, 293733, 1, 'Nguyen Bui Thien Dat', '312 Ngô Gia Tự, Hà Nội', '0988487614', '', 170000, 'Đang xử lý', '2022-05-18'),
(41, 422410, 1, 'Nguyen Bui Thien Dat', '312 Ngô Gia Tự, Hà Nội', '0988487614', 'qeaskldjaskljdkljasd', 9690000, 'Đang xử lý', '2022-05-18'),
(43, 212366, 21, '1 1', '123123', '123123', '', 1370000, 'Đang xử lý', '2022-11-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'Women\'s Clothes'),
(2, 'Men\'s Clothes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details_bill`
--

CREATE TABLE `details_bill` (
  `subbill_id` int(11) NOT NULL,
  `subbill_image` text NOT NULL,
  `subbill_title` text NOT NULL,
  `subbill_price` int(11) NOT NULL,
  `subbill_quantity` int(11) NOT NULL,
  `subbill_size` varchar(30) NOT NULL,
  `subbill_subtotal` int(11) NOT NULL,
  `subbill_bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `details_bill`
--

INSERT INTO `details_bill` (`subbill_id`, `subbill_image`, `subbill_title`, `subbill_price`, `subbill_quantity`, `subbill_size`, `subbill_subtotal`, `subbill_bill_id`) VALUES
(24, 'mp1.jpg', 'Shirt In Camel', 300000, 2, 'M', 600000, 861633),
(25, 'tang-top2.jpg', 'Lace-Up Top', 200000, 1, 'M', 200000, 671108),
(26, 'mp1.jpg', 'Shirt In Camel', 300000, 1, 'S', 300000, 968905),
(27, 'tang-top2.jpg', 'Lace-Up Top', 200000, 1, 'S', 200000, 536726),
(33, 'Lace-Up.jpg', 'Lace-Up V Tee', 370000, 1, 'S', 370000, 743468),
(34, 'tshirt2-front.jpg', 'Tossik Round', 120000, 1, 'S', 120000, 604078),
(36, 'tshirt2-front.jpg', 'Tossik Round', 120000, 5, 'L', 600000, 317805),
(37, 'blues-skinnky-jens.jpg', 'Light Wash Classic', 330000, 1, 'S', 330000, 219096),
(38, 'tang-top2.jpg', 'Lace-Up Top', 200000, 5, 'S', 1000000, 306856),
(39, 'tang-top2.jpg', 'Lace-Up Top', 200000, 3, 'M', 600000, 306856),
(40, 'mp1.jpg', 'Shirt In Camel', 420000, 2, 'XXL', 840000, 306856),
(41, 'tang-top2.jpg', 'Lace-Up Top', 200000, 1, 'S', 200000, 730755),
(44, 'tshirt2-front.jpg', 'Tossik Round', 120000, 3, 'L', 360000, 888298),
(45, 'w-p6.jpg', 'Black Skinny Jeans', 300000, 4, 'S', 1200000, 888298),
(46, 'w-p6.jpg', 'Black Skinny Jeans', 300000, 1, 'S', 300000, 504683),
(47, 'tshirt.jpg', 'Long with Stripes', 170000, 1, 'S', 170000, 720064),
(48, 'tshirt.jpg', 'Long with Stripes', 170000, 2, 'L', 340000, 720064),
(49, 'tshirt.jpg', 'Long with Stripes', 170000, 1, 'S', 170000, 293733),
(50, 'track-jacket.jpg', 'Track Jacket', 510000, 19, 'S', 9690000, 422410),
(52, 'boot3.jpg', 'Juvenate', 1370000, 1, 'S', 1370000, 212366);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_cat_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_images` text NOT NULL,
  `product_description` text NOT NULL,
  `product_introduce` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_cat_id`, `product_price`, `product_images`, `product_description`, `product_introduce`, `product_quantity`, `product_date`) VALUES
(1, 'Retro Stripe Slim', 1, 150000000, 'product3.jpg', '                                                                                                                                                                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.            \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n            ', '                                                                                                                                                                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Retro Stripe Slim Fit T-shirt            \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n            ', 111, '2022-03-17'),
(2, 'Shirt In Camel', 1, 420000, 'mp1.jpg', '                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Retro Stripe Slim Fit T-shirt            \r\n                        \r\n            ', '                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Retro Stripe Slim Fit T-shirt            \r\n                        \r\n            ', 10, '2022-03-17'),
(3, 'Awesome Neckless', 1, 1500000, 'product7.jpg', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Retro Stripe Slim Fit T-shirt', 20, '2022-03-17'),
(4, 'Textured Marl', 2, 150000, 'mp2.jpg', '                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Retro Stripe Slim Fit T-shirt            \r\n                        \r\n            ', '                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Retro Stripe Slim Fit T-shirt            \r\n                        \r\n            ', 20, '2022-03-17'),
(5, 'Boyfriend Jeans', 1, 600000, 'blue-jens-front.jpg', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.', 20, '2022-03-17'),
(6, 'Cardigan Sweater', 1, 120000, 'w-p1.jpg', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 20, '2022-03-17'),
(7, 'Black Skinny Jeans', 1, 300000, 'w-p6.jpg', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 15, '2022-03-17'),
(8, 'Lace-Up Top', 1, 200000, 'tang-top2.jpg', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 18, '2022-03-17'),
(10, 'Lace-Up V Tee', 1, 370000, 'Lace-Up.jpg', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 16, '2022-03-17'),
(11, 'Light Wash Classic', 1, 330000, 'blues-skinnky-jens.jpg', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 13, '2022-03-17'),
(12, 'Tossik Round', 2, 120000, 'tshirt2-front.jpg', 'Add cool detail to your essentials with this raw-edge seam T-shirt. The soft, lightweight slub cotton-jersey makes it seriously comfortable', 'Add cool detail to your essentials with this raw-edge seam T-shirt. The soft, lightweight slub cotton-jersey makes it seriously comfortable', 6, '2022-03-17'),
(13, 'Cut Out Bootie', 1, 454000, 'cut-out-back.jpg', '                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.            \r\n            ', '                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Rounded, open toe. Decorative cut-out pattern. Thin, covered heel. Laced closure.\r\nHeel height 11 cm.            \r\n            ', 20, '2022-05-16'),
(14, 'Leather Jackets', 2, 800000, 'sp1.jpg', '                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.                  \r\n            ', '                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.                  \r\n            ', 20, '2022-05-16'),
(15, 'Track Jacket', 1, 510000, 'track-jacket.jpg', '                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae,            \r\n            ', '                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae,            \r\n            ', 1, '2022-05-16'),
(16, 'Long with Stripes', 2, 170000, 'tshirt.jpg', '                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Diagonal Stitch Acid Wash Grey T-shirt            \r\n            ', '                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Diagonal Stitch Acid Wash Grey T-shirt            \r\n            ', 17, '2022-05-16'),
(18, 'Juvenate', 1, 1370000, 'boot3.jpg', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Boots in faux suede from NLY Shoes. Pointed toe and thin, covered heel. Inside zipper closure. Heel height 10 cm. Shaft height 10 cm.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Boots in faux suede from NLY Shoes. Pointed toe and thin, covered heel. Inside zipper closure. Heel height 10 cm. Shaft height 10 cm.', 19, '2022-05-17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` text NOT NULL,
  `user_numberphone` text NOT NULL,
  `user_image` text NOT NULL,
  `user_address` text NOT NULL,
  `user_role` varchar(30) NOT NULL,
  `user_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_numberphone`, `user_image`, `user_address`, `user_role`, `user_date`) VALUES
(21, 'dt', '123123', '1', '1', '123123@gmail.com', '123123', '256-512.webp', '', 'admin', '2022-11-12'),
(27, 'lekhanh', '123123', 'Lê', 'Khánh', 'lekhanh@gmail.com', '', '256-512.webp', '', 'user', '2022-11-21'),
(28, 'chicong', '123123', 'Nguyễn Chí', 'Công', 'chicong@gmail.com', '', '256-512.webp', '', 'user', '2022-11-21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `details_bill`
--
ALTER TABLE `details_bill`
  ADD PRIMARY KEY (`subbill_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `details_bill`
--
ALTER TABLE `details_bill`
  MODIFY `subbill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
