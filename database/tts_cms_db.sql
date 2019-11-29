-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2019 lúc 02:48 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `slogan` text COLLATE utf8mb4_unicode_ci,
  `multi_image` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `slug`, `image`, `video`, `content`, `slogan`, `multi_image`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'TTS', 'about', NULL, 'https://www.youtube.com', NULL, '<p>- Với đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp c&ugrave;ng c&ocirc;ng nghệ ti&ecirc;n tiến</p>', '[{\"title\":\"UY T\\u00cdN\",\"content\":\"N\\u1ed9i dung 1\",\"icon\":\".\\/uploads\\/abouts\\/icon1.png\"},{\"title\":\"T\\u1eacN T\\u00c2M PH\\u1ee4C V\\u1ee4\",\"content\":\"N\\u1ed9i dung 2\",\"icon\":\".\\/uploads\\/abouts\\/icon2.png\"},{\"title\":\"CH\\u1ea4T L\\u01af\\u1ee2NG\",\"content\":\"N\\u1ed9i dung 3\",\"icon\":\".\\/uploads\\/abouts\\/icon3.png\"}]', 'vn', '2018-06-17 00:25:00', '2019-11-27 01:51:25'),
(3, 'About Us', 'about', NULL, 'https://www.youtube.com/embed/y65GocjN5RE?autoplay=1&loop=1&playlist=uI-_7eDbv_Q', NULL, '<p>- With a team of professional staff with advanced technology - modern machinery imported from the Federal Republic of Germany, VK SPA is honored to serve you with passion and the spirit of High Responsibility. - We wish with our experience, VK SPA will bring beautiful young - healthy - beautiful from the inside to the outside in the most detail.</p>', '[{\"title\":\"REPUTATION\",\"content\":\"Content 1\",\"icon\":\".\\/uploads\\/abouts\\/icon1.png\"},{\"title\":\"TALK SERVICE\",\"content\":\"Content 2\",\"icon\":\".\\/uploads\\/abouts\\/icon2.png\"},{\"title\":\"QUALITY\",\"content\":\"Content 3\",\"icon\":\".\\/uploads\\/abouts\\/icon3.png\"}]', 'en', '2018-10-01 06:47:17', '2018-10-01 06:55:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `branch_hct`
--

CREATE TABLE `branch_hct` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provinces_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `address`, `parent_id`, `description`, `prefix`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kho HCM', '1/4 Đường Võ Thị Sáu, KP7, Phường 3, TP Tây Ninh', 0, 'Kho Hồ Chí Minh', 'WAREHOUSE', NULL, '2018-07-08 06:19:31', '2018-07-08 06:19:31'),
(2, 'Kho NVL', '1/4 Đường Võ Thị Sáu, KP7, Phường 3, TP Tây Ninh', 1, 'Kho chứa nguyên vật liệu', NULL, NULL, '2018-07-08 06:20:03', '2018-07-08 06:20:03'),
(3, 'Kho NVL - HCM', NULL, 1, 'Kho nguyên vật liệu tại HCM', 'WAREHOUSE', '2018-07-08 07:53:04', '2018-07-08 07:51:04', '2018-07-08 07:53:04'),
(4, 'Kho NVL - HCM', NULL, 1, 'Kho nguyên vật liệu tại HCM', 'WAREHOUSE', '2018-07-08 08:09:16', '2018-07-08 07:51:22', '2018-07-08 08:09:16'),
(5, 'Kho NVL - HCM', NULL, 1, 'Kho nguyên vật liệu tại HCM', 'WAREHOUSE', '2018-07-08 08:08:48', '2018-07-08 07:52:12', '2018-07-08 08:08:48'),
(6, 'Kho NVL - HCM', NULL, 1, 'Kho nguyên vật liệu tại HCM', 'WAREHOUSE', '2018-07-08 08:04:22', '2018-07-08 07:52:43', '2018-07-08 08:04:22'),
(7, 'Kho NVL', NULL, 1, 'sadfgb', 'WAREHOUSE', NULL, '2018-07-08 08:10:29', '2018-07-08 08:10:29'),
(8, 'Kho NVL', NULL, 1, 'sadfgb', 'WAREHOUSE', '2018-07-08 08:18:37', '2018-07-08 08:11:21', '2018-07-08 08:18:37'),
(9, 'Kho NVL', NULL, 1, 'sadfgb', 'WAREHOUSE', '2018-07-08 08:18:34', '2018-07-08 08:13:16', '2018-07-08 08:18:34'),
(10, 'Kho NVL', NULL, 1, '1111', 'WAREHOUSE', '2018-07-08 08:18:32', '2018-07-08 08:13:47', '2018-07-08 08:18:32'),
(11, 'Kho thành phẩm', NULL, 1, 'sfsdfsdfs', 'WAREHOUSE', '2018-07-08 08:18:29', '2018-07-08 08:18:15', '2018-07-08 08:18:29'),
(12, 'Đã hoàn thiện', NULL, 0, NULL, 'DOC_STATUS', NULL, '2018-07-08 08:44:44', '2018-07-08 08:44:44'),
(13, 'Duyệt', NULL, 0, NULL, 'DOC_STATUS', NULL, '2018-07-08 08:44:59', '2018-07-08 08:44:59'),
(14, 'Hủy', NULL, 0, NULL, 'DOC_STATUS', NULL, '2018-07-08 08:45:10', '2018-07-08 08:45:10'),
(15, 'Vật tư', NULL, 0, NULL, 'TYPE_OF_MATERIALS', NULL, '2018-07-08 08:49:39', '2018-07-08 08:49:39'),
(16, 'Hàng hóa', NULL, 0, NULL, 'TYPE_OF_MATERIALS', NULL, '2018-07-08 08:49:46', '2018-07-08 08:49:46'),
(17, 'Dịch vụ', NULL, 0, NULL, 'TYPE_OF_MATERIALS', NULL, '2018-07-08 08:49:56', '2018-07-08 08:49:56'),
(18, 'Kho NVL Lạnh', NULL, 7, 'ffsdf', 'WAREHOUSE', NULL, '2018-07-08 10:03:12', '2018-07-08 10:03:12'),
(19, 'Kho HN', NULL, 0, NULL, 'WAREHOUSE', NULL, '2018-07-08 10:07:20', '2018-07-08 10:07:20'),
(20, 'Kho NVL HN', NULL, 19, NULL, 'WAREHOUSE', '2018-07-08 10:08:46', '2018-07-08 10:07:34', '2018-07-08 10:08:46'),
(21, 'Kho NVL HN', NULL, 19, NULL, 'WAREHOUSE', NULL, '2018-07-08 10:09:00', '2018-07-08 10:09:00'),
(22, 'Kho NVL HN Khô', NULL, 21, NULL, 'WAREHOUSE', NULL, '2018-07-08 10:09:15', '2018-07-08 10:09:15'),
(23, 'Kho NVL HN Lạnh', NULL, 21, NULL, 'WAREHOUSE', '2018-07-09 11:14:33', '2018-07-08 10:09:31', '2018-07-09 11:14:33'),
(24, 'Nam', NULL, 0, 'Giới tính nam', 'SEX', NULL, '2018-07-08 10:22:26', '2018-07-08 10:22:26'),
(25, 'Nữ', NULL, 0, 'Giới tính nữ', 'SEX', NULL, '2018-07-08 10:22:39', '2018-07-08 10:22:39'),
(26, 'Đại học', NULL, 0, NULL, 'EDUCATION', NULL, '2018-07-09 09:43:11', '2018-07-09 09:43:11'),
(27, '01632739275', NULL, 0, 'ACB', 'BANK', NULL, '2018-08-20 07:11:10', '2018-08-20 07:11:10'),
(28, 'Nhân Viên', NULL, 0, NULL, 'POSITION', NULL, '2018-08-21 11:29:32', '2018-08-21 11:29:32'),
(29, 'Quản Lý', NULL, 0, NULL, 'POSITION', NULL, '2018-08-21 11:29:42', '2018-08-21 11:29:42'),
(30, 'Nhân Viên Kinh Doanh', NULL, 28, NULL, 'POSITION', NULL, '2018-08-24 08:44:57', '2018-08-24 08:44:57'),
(31, 'Nhân Viên Kỹ Thuật', NULL, 28, NULL, 'POSITION', NULL, '2018-08-24 08:45:11', '2018-08-24 08:45:11'),
(32, 'Cộng Tác Viên', NULL, 0, NULL, 'POSITION', NULL, '2018-08-24 09:37:42', '2018-08-24 09:37:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_post`
--

CREATE TABLE `category_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content_lang_fields`
--

CREATE TABLE `content_lang_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `content_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Json',
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Lang Currently',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `content_lang_fields`
--

INSERT INTO `content_lang_fields` (`id`, `title`, `content`, `content_type`, `table_name`, `json_content`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Tiêu đề 60', '<p>Nội dung 60</p>', 'product', '60', '', 'vn', '2018-09-24 17:00:00', '2018-09-27 03:27:12'),
(2, 'Title 60', 'Content 60', 'product', '60', '', 'en', '2018-09-24 17:00:00', '2018-09-24 17:00:00'),
(3, 'Pin 003', NULL, 'product', '61', '-', 'vn', '2018-09-27 03:33:30', '2018-09-27 03:33:30'),
(4, '它不能否认塑料袋的便利性', '<p>它不能否认塑料袋的便利性，但过度使用塑料袋和缺乏废物处理方法已经破坏了我们的环境。 现在，塑料袋是人类和环境的敌人。自10月以来，除超市外，还禁止糖果向韩国客户提供免费塑料袋。 在澳大利亚，Coles超市连锁店自本月初开始提供一个月的免费环保袋，目的是帮助顾客调整购物习惯，并准备将来停止使用塑料袋。</p>', 'product', '61', '-', 'cn', '2018-09-27 03:34:44', '2018-09-27 03:34:44'),
(5, 'Khuyến mãi mừng khai trương', '<p>khuyen-mai-mung-khai-truong</p>', 'post', '14', '-', 'vn', '2018-09-28 05:57:06', '2018-09-29 04:31:18'),
(6, 'pin 003', NULL, 'product', '62', '-', 'vn', '2018-09-28 06:40:17', '2018-09-28 06:40:17'),
(7, 'Pin004', NULL, 'product', '63', '-', 'vn', '2018-09-28 06:40:55', '2018-09-28 06:40:55'),
(8, 'Pin005', NULL, 'product', '64', '-', 'vn', '2018-09-28 06:41:22', '2018-09-28 06:41:22'),
(9, 'E-lănge', NULL, 'product', '64', '-', 'en', '2018-09-28 06:43:32', '2018-09-28 06:43:32'),
(10, 'Pin006', NULL, 'product', '65', '-', 'vn', '2018-09-28 06:47:38', '2018-09-28 06:47:38'),
(11, 'Pin007', NULL, 'product', '66', '-', 'vn', '2018-09-28 06:47:57', '2018-09-28 06:47:57'),
(12, 'Pin008', NULL, 'product', '67', '-', 'vn', '2018-09-28 06:48:20', '2018-09-28 06:48:20'),
(13, 'Pin009', NULL, 'product', '68', '-', 'vn', '2018-09-28 06:48:43', '2018-09-28 06:48:43'),
(14, 'Pin0010', NULL, 'product', '69', '-', 'vn', '2018-09-28 06:49:14', '2018-09-28 06:49:14'),
(15, 'Pin0011', NULL, 'product', '70', '-', 'vn', '2018-09-28 06:49:34', '2018-09-28 06:49:34'),
(16, 'Sale off date open store', '<p>Sale off date open store</p>', 'post', '14', '-', 'en', '2018-09-29 04:48:27', '2018-09-29 04:48:27'),
(17, 'Giới thiệu', '<p>Giới thiệu</p>', 'page', '1', '', 'vn', '2018-09-30 17:00:00', '2018-10-01 06:17:25'),
(18, 'About Us', '<p>About Us</p>', 'page', '1', '-', 'en', '2018-10-01 06:17:02', '2018-10-01 06:17:02'),
(19, 'Điều kiện và thỏa thuận', '<p>Điều kiện v&agrave; thỏa thuận</p>', 'page', '13', '-', 'vn', '2018-10-01 06:18:42', '2018-10-01 06:18:42'),
(20, 'Terms & Conditions', '<p>Terms &amp; Conditions</p>', 'page', '13', '-', 'en', '2018-10-01 06:19:05', '2018-10-01 06:19:05'),
(21, 'Tin tuyển dụng', 'Tin tuyển dụng', 'post_category', '9', '', 'vn', '2018-09-30 17:00:00', '2018-09-30 17:00:00'),
(22, 'Tin tức', 'Tin tức', 'post_category', '15', '', 'vn', '2018-09-30 17:00:00', '2018-09-30 17:00:00'),
(23, 'Tin nổi bật', 'Tin nổi bật', 'post_category', '19', '', 'vn', '2018-09-30 17:00:00', '2018-09-30 17:00:00'),
(24, 'Khuyến mãi', 'Khuyến mãi', 'post_category', '20', '', 'vn', '2018-09-30 17:00:00', '2018-09-30 17:00:00'),
(25, 'Sự kiện', NULL, 'post_category', '24', '', 'vn', '2018-09-30 17:00:00', '2018-10-01 08:15:46'),
(26, 'Events', 'Events', 'post_category', '24', '', 'en', '2018-09-30 17:00:00', '2018-09-30 17:00:00'),
(27, 'SaleOff', NULL, 'post_category', '20', '-', 'en', '2018-10-01 08:16:21', '2018-10-01 08:16:21'),
(28, 'Redsun', 'Redsun', 'product_category', '6', '-', 'en', '2018-10-01 12:23:38', '2018-10-01 12:35:27'),
(29, 'Nhà máy', 'Nhà máy', 'product_category', '6', '-', 'vn', '2018-10-01 12:35:54', '2018-10-03 04:57:38'),
(30, 'Nhân sự', 'Nhân sự', 'product_category', '1', '-', 'vn', '2018-10-01 12:35:54', '2018-10-03 04:57:52'),
(31, 'Đầu tư', NULL, 'product_category', '9', '-', 'vn', '2018-10-03 04:57:11', '2018-10-03 04:57:11'),
(32, 'Giày Nữ', NULL, 'product_category', '10', '-', 'vn', '2018-10-03 04:58:07', '2018-11-06 02:56:06'),
(33, 'Giày thể thao', NULL, 'product_category', '11', '-', 'vn', '2018-10-03 04:58:19', '2018-11-23 06:43:16'),
(39, 'Giày thể thao nam VIKEN / Vải Lưới', NULL, 'product', '75', '-', 'vn', '2018-10-16 12:59:01', '2018-10-16 12:59:01'),
(40, 'dsfsd', NULL, 'product', '76', '-', 'vn', '2018-10-16 13:03:40', '2018-10-16 13:03:40'),
(41, 'Giày thể thao nam VIKEN / Vải Lưới ( Xám Trắng )', '<p>- Chất liệu mũ gi&agrave;y: vải lưới &amp; dệt cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; nhất hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Bạc trắng / Trắng / Đen trắng / Trắng đen / Xanh đậm trắng / Đen x&aacute;m / Xanh dương</p>\r\n\r\n<p>- Size: 36 - 44</p>\r\n\r\n<p>- Giới t&iacute;nh: Nam</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>\r\n\r\n<p>- Xuất xứ: Việt Nam</p>\r\n\r\n<p>- Bảo h&agrave;nh: 06 th&aacute;ng</p>', 'product', '77', '-', 'vn', '2018-10-19 06:56:59', '2018-10-19 06:56:59'),
(42, 'Giày thể thao nam VIKEN / Vải Dệt ( Xanh Dương )', NULL, 'product', '78', '-', 'vn', '2018-10-19 06:58:59', '2018-10-19 06:58:59'),
(43, 'GIÀY THỂ THAO MỸ VIKEN - NỮ - GIÀY LƯỜI ( Đỏ Bầm )', '<p>- Chất liệu gi&agrave;y: Open Mesh gi&uacute;p th&ocirc;ng tho&aacute;ng, thoải m&aacute;i, &ecirc;m &aacute;i v&agrave; chống ẩm mốc khi mang suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- Gi&agrave;y d&agrave;nh cho giới nữ văn ph&ograve;ng v&agrave; b&agrave; mẹ mang thai v&igrave; c&oacute; trọng lượng nhẹ nhất so với những mẫu gi&agrave;y c&ugrave;ng loại v&igrave; đế bằng Phylon được xem l&agrave; một chất liệu ti&ecirc;n tiến v&agrave; nhẹ nhất hiện hay.</p>\r\n\r\n<p>- M&agrave;u sắc: R&ecirc;u / R&ecirc;u Đen / Đen / Xanh / Đỏ Tươi / Đỏ Bầm</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>\r\n\r\n<p>- Xuất xứ: Việt Nam</p>\r\n\r\n<p>- Bảo h&agrave;nh: 06 th&aacute;ng</p>', 'product', '79', '-', 'vn', '2018-10-19 07:23:24', '2018-10-19 07:23:24'),
(46, 'GIÀY THỂ THAO MỸ VIKEN - NỮ - GIÀY LƯỜI ( Rêu Đậm )', '<p>- Chất liệu gi&agrave;y: Open Mesh gi&uacute;p th&ocirc;ng tho&aacute;ng, thoải m&aacute;i, &ecirc;m &aacute;i v&agrave; chống ẩm mốc khi mang suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- Gi&agrave;y d&agrave;nh cho giới nữ văn ph&ograve;ng v&agrave; b&agrave; mẹ mang thai v&igrave; c&oacute; trọng lượng nhẹ nhất so với những mẫu gi&agrave;y c&ugrave;ng loại v&igrave; đế bằng Phylon được xem l&agrave; một chất liệu ti&ecirc;n tiến v&agrave; nhẹ nhất hiện hay.</p>\r\n\r\n<p>- M&agrave;u sắc: R&ecirc;u / R&ecirc;u Đen / Đen / Xanh / Đỏ Tươi / Đỏ Bầm</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>\r\n\r\n<p>- Xuất xứ: Việt Nam</p>\r\n\r\n<p>- Bảo h&agrave;nh: 06 th&aacute;ng</p>', 'product', '82', '-', 'vn', '2018-10-19 07:37:30', '2018-10-19 07:37:30'),
(47, 'GIÀY THỂ THAO MỸ VIKEN - NỮ - GIÀY LƯỜI', '<p>- Chất liệu gi&agrave;y: Open Mesh gi&uacute;p th&ocirc;ng tho&aacute;ng, thoải m&aacute;i, &ecirc;m &aacute;i v&agrave; chống ẩm mốc khi mang suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- Gi&agrave;y d&agrave;nh cho giới nữ văn ph&ograve;ng v&agrave; b&agrave; mẹ mang thai v&igrave; c&oacute; trọng lượng nhẹ nhất so với những mẫu gi&agrave;y c&ugrave;ng loại v&igrave; đế bằng Phylon được xem l&agrave; một chất liệu ti&ecirc;n tiến v&agrave; nhẹ nhất hiện hay.</p>\r\n\r\n<p>- M&agrave;u sắc: R&ecirc;u / R&ecirc;u Đen / Đen / Xanh / Đỏ Tươi / Đỏ Bầm</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>\r\n\r\n<p>- Xuất xứ: Việt Nam</p>\r\n\r\n<p>- Bảo h&agrave;nh: 06 th&aacute;ng</p>', 'product', '83', '-', 'vn', '2018-10-22 04:01:33', '2018-10-22 04:01:33'),
(48, 'text', '<p>ugugckjgckj</p>', 'product', '84', '-', 'vn', '2018-10-22 04:26:31', '2018-10-22 04:26:31'),
(49, 'giay', 'giay', 'product_category', '12', '-', 'vn', '2018-10-22 05:03:52', '2018-10-22 05:03:52'),
(50, 'kho Govap', '<p>sdfsdfs</p>', 'product', '85', '-', 'vn', '2018-10-22 06:41:54', '2018-10-22 06:41:54'),
(51, 'text', '<p>texttexttexttext</p>', 'post', '15', '-', 'vn', '2018-10-22 06:52:32', '2018-10-22 06:52:32'),
(52, 'sports', 'sports', 'product_category', '12', '-', 'en', '2018-10-22 07:33:45', '2018-10-22 07:33:45'),
(53, 'text', 'asdf', 'product_category', '10', '-', 'en', '2018-10-22 07:34:16', '2018-10-22 07:34:16'),
(54, 'Thường', '<p>adfcsdsd</p>', 'product', '86', '-', 'vn', '2018-10-22 07:36:47', '2018-10-22 07:36:47'),
(55, 'GIÀY THỂ THAO MỸ VIKEN - XANH DƯƠNG', '<p>- Chất liệu mũ gi&agrave;y: vải dệt cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc:Đen X&aacute;m / Xanh Dương Đậm</p>\r\n\r\n<p>- Giới t&iacute;nh: Nam</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>\r\n\r\n<p>- Xuất xứ: Việt Nam</p>', 'product', '87', '-', 'vn', '2018-10-22 07:57:53', '2018-10-22 07:57:53'),
(57, 'GIÀY THỂ THAO MỸ - ĐEN TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Bạc trắng / Trắng / Đen trắng / Trắng đen / Xanh đậm trắng</p>\r\n\r\n<p>- Size: 36 - 44</p>\r\n\r\n<p>- Giới t&iacute;nh: Nam</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '89', '-', 'vn', '2018-10-22 08:14:17', '2018-10-22 08:14:17'),
(58, 'GIÀY THAO MỸ VIKEN - ĐEN TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Bạc trắng / Trắng / Đen trắng / Trắng đen / Xanh đậm trắng</p>\r\n\r\n<p>- Size: 36 - 44</p>\r\n\r\n<p>- Giới t&iacute;nh: Nam</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '90', '-', 'vn', '2018-10-22 08:44:05', '2018-10-22 08:44:05'),
(59, 'GIÀY THỂ THAO MỸ - TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Bạc trắng / Trắng / Đen trắng / Trắng đen / Xanh đậm trắng</p>\r\n\r\n<p>- Size: 36 - 44</p>\r\n\r\n<p>- Giới t&iacute;nh: Nam</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '91', '-', 'vn', '2018-10-22 08:47:20', '2018-10-22 08:47:20'),
(60, 'GIÀY THỂ THAO MỸ - XANH ĐẬM TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Bạc trắng / Trắng / Đen trắng / Trắng đen / Xanh đậm trắng</p>\r\n\r\n<p>- Size: 36 - 44</p>\r\n\r\n<p>- Giới t&iacute;nh: Nam</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '92', '-', 'vn', '2018-10-22 08:51:42', '2018-10-22 08:51:42'),
(61, 'GIÀY LƯỜI VIKEN - NỮ  ( RÊU ĐEN )', '<p>- Chất liệu gi&agrave;y: Open Mesh gi&uacute;p th&ocirc;ng tho&aacute;ng, thoải m&aacute;i, &ecirc;m &aacute;i v&agrave; chống ẩm mốc khi mang suốt cả ng&agrave;y.</p>\r\n\r\n<p>&nbsp;- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>&nbsp;- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- Gi&agrave;y d&agrave;nh cho giới nữ văn ph&ograve;ng v&agrave; b&agrave; mẹ mang thai v&igrave; c&oacute; trọng lượng nhẹ nhất so với những mẫu gi&agrave;y c&ugrave;ng loại v&igrave; đế bằng Phylon được xem l&agrave; một chất liệu ti&ecirc;n tiến v&agrave; nhẹ nhất hiện hay.</p>\r\n\r\n<p>&nbsp;- M&agrave;u sắc: R&ecirc;u / R&ecirc;u Đen / Đen / Xanh / Đỏ Tươi / Đỏ Bầm</p>\r\n\r\n<p>&nbsp;- Size: 35 &ndash; 40</p>\r\n\r\n<p>&nbsp;- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>\r\n\r\n<p>- Xuất xứ: Việt Nam</p>\r\n\r\n<p>&nbsp;- Bảo h&agrave;nh: 06 th&aacute;ng</p>', 'product', '93', '-', 'vn', '2018-10-22 09:00:40', '2018-10-22 09:00:40'),
(62, 'GIÀY THỂ THAO MỸ - XÁM TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Bạc trắng / Trắng / Đen trắng / Trắng đen / Xanh đậm trắng</p>\r\n\r\n<p>- Size: 36 - 44</p>\r\n\r\n<p>- Giới t&iacute;nh: Nam</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '94', '-', 'vn', '2018-10-22 09:04:45', '2018-10-22 09:04:45'),
(63, 'GIÀY THỂ THAO MỸ - XANH TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải dệt cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc:Đen X&aacute;m / Xanh Dương Đậm</p>\r\n\r\n<p>- Giới t&iacute;nh: Nam</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>\r\n\r\n<p>- Xuất xứ: Việt Nam</p>', 'product', '95', '-', 'vn', '2018-10-22 09:07:45', '2018-10-22 09:07:45'),
(65, 'GIÀY THỂ THAO MỸ - XÁM TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải dệt cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc:Đen X&aacute;m / Xanh Dương Đậm</p>\r\n\r\n<p>- Giới t&iacute;nh: Nam</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>\r\n\r\n<p>- Xuất xứ: Việt Nam</p>', 'product', '97', '-', 'vn', '2018-10-22 09:11:11', '2018-10-22 09:11:11'),
(66, 'GIÀY THỂ THAO MỸ - XANH TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Hồng dạ trắng / Cam dạ trắng / Xanh dương dạ trắng / Trắng dạ cam / X&aacute;m dạ trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '98', '-', 'vn', '2018-10-22 09:14:12', '2018-10-22 09:14:12'),
(67, 'GIÀY THỂ THAO MỸ - ĐEN XÁM', '<p>- Chất liệu mũ gi&agrave;y: vải dệt cao cấp, nhiều hoa văn v&agrave; m&agrave;u sắc tươi tắn, cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Đen X&aacute;m / Xanh đậm / Xanh ngọc / Cam hồng / X&aacute;m trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '99', '-', 'vn', '2018-10-22 09:16:57', '2018-10-22 09:16:57'),
(68, 'GIÀY THỂ THAO MỸ - TRẮNG XÁM', '<p>- Chất liệu mũ gi&agrave;y: vải dệt cao cấp, nhiều hoa văn v&agrave; m&agrave;u sắc tươi tắn, cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Đen X&aacute;m / Xanh đậm / Xanh ngọc / Cam hồng / X&aacute;m trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '100', '-', 'vn', '2018-10-22 09:19:49', '2018-10-22 09:19:49'),
(69, 'GIÀY THỂ THAO MỸ - XANH BIỂN', '<p>- Chất liệu mũ gi&agrave;y: vải dệt cao cấp, nhiều hoa văn v&agrave; m&agrave;u sắc tươi tắn, cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Đen X&aacute;m / Xanh đậm / Xanh ngọc / Cam hồng / X&aacute;m trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '101', '-', 'vn', '2018-10-22 09:22:08', '2018-10-22 09:22:08'),
(70, 'GIÀY THỂ THAO MỸ - CAM TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Hồng dạ trắng / Cam dạ trắng / Xanh dương dạ trắng / Trắng dạ cam / X&aacute;m dạ trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '102', '-', 'vn', '2018-10-22 09:25:31', '2018-10-22 09:25:31'),
(71, 'GIÀY THỂ THAO MỸ - HỒNG TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Hồng dạ trắng / Cam dạ trắng / Xanh dương dạ trắng / Trắng dạ cam / X&aacute;m dạ trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '103', '-', 'vn', '2018-10-22 09:27:47', '2018-10-22 09:27:47'),
(72, 'GIÀY THỂ THAO MỸ - CAM TRẮNG (NỮ)', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Hồng dạ trắng / Cam dạ trắng / Xanh dương dạ trắng / Trắng dạ cam / X&aacute;m dạ trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '104', '-', 'vn', '2018-10-22 09:30:05', '2018-11-06 03:05:05'),
(73, 'GIÀY THỂ THAO MỸ - BẠC TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Hồng dạ trắng / Cam dạ trắng / Xanh dương dạ trắng / Trắng dạ cam / X&aacute;m dạ trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '105', '-', 'vn', '2018-10-22 09:33:38', '2018-10-22 09:33:38'),
(74, 'GIÀY THỂ THAO MỸ - XANH TRẮNG', '<p>- Chất liệu mũ gi&agrave;y: vải lưới cao cấp, được phối những m&agrave;u theo xu hướng thời trang tao nh&atilde; hiện nay cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Hồng dạ trắng / Cam dạ trắng / Xanh dương dạ trắng / Trắng dạ cam / X&aacute;m dạ trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '106', '-', 'vn', '2018-10-22 09:37:20', '2018-10-22 09:37:20'),
(75, 'GIÀY THỂ THAO MỸ - XANH NGỌC', '<p>- Chất liệu mũ gi&agrave;y: vải dệt cao cấp, nhiều hoa văn v&agrave; m&agrave;u sắc tươi tắn, cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Đen X&aacute;m / Xanh đậm / Xanh ngọc / Cam hồng / X&aacute;m trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '107', '-', 'vn', '2018-10-22 09:42:25', '2018-10-22 09:42:25'),
(76, 'GIÀY THỂ THAO MỸ - CAM HỒNG', '<p>- Chất liệu mũ gi&agrave;y: vải dệt cao cấp, nhiều hoa văn v&agrave; m&agrave;u sắc tươi tắn, cũng như gi&uacute;p cho đ&ocirc;i ch&acirc;n được th&ocirc;ng tho&aacute;ng suốt cả ng&agrave;y</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới v&agrave; nhẹ trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- K&ecirc;́t hợp được với t&acirc;́t cả các loại trang phục, tính đa dụng r&acirc;́t cao: đi làm, đi học, du lịch, th&ecirc;̉ thao, chạy, t&acirc;̣p Gym...</p>\r\n\r\n<p>- M&agrave;u sắc: Đen X&aacute;m / Xanh đậm / Xanh ngọc / Cam hồng / X&aacute;m trắng</p>\r\n\r\n<p>- Size: 36 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '108', '-', 'vn', '2018-10-22 09:44:40', '2018-10-22 09:44:40'),
(77, 'GIÀY LƯỜI MỸ - ĐỎ TƯƠI', '<p>- Chất liệu gi&agrave;y: Open Mesh gi&uacute;p th&ocirc;ng tho&aacute;ng, thoải m&aacute;i, &ecirc;m &aacute;i v&agrave; chống ẩm mốc khi mang suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- Gi&agrave;y d&agrave;nh cho giới nữ văn ph&ograve;ng v&agrave; b&agrave; mẹ mang thai v&igrave; c&oacute; trọng lượng nhẹ nhất so với những mẫu gi&agrave;y c&ugrave;ng loại v&igrave; đế bằng Phylon được xem l&agrave; một chất liệu ti&ecirc;n tiến v&agrave; nhẹ nhất hiện hay.</p>\r\n\r\n<p>- M&agrave;u sắc: R&ecirc;u / R&ecirc;u Đen / Đen / Xanh / Đỏ Tươi / Đỏ Bầm</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '109', '-', 'vn', '2018-10-22 09:52:57', '2018-10-22 09:52:57'),
(78, 'GIÀY LƯỜI - ĐỎ BẦM', '<p>- Chất liệu gi&agrave;y: Open Mesh gi&uacute;p th&ocirc;ng tho&aacute;ng, thoải m&aacute;i, &ecirc;m &aacute;i v&agrave; chống ẩm mốc khi mang suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- Gi&agrave;y d&agrave;nh cho giới nữ văn ph&ograve;ng v&agrave; b&agrave; mẹ mang thai v&igrave; c&oacute; trọng lượng nhẹ nhất so với những mẫu gi&agrave;y c&ugrave;ng loại v&igrave; đế bằng Phylon được xem l&agrave; một chất liệu ti&ecirc;n tiến v&agrave; nhẹ nhất hiện hay.</p>\r\n\r\n<p>- M&agrave;u sắc: R&ecirc;u / R&ecirc;u Đen / Đen / Xanh / Đỏ Tươi / Đỏ Bầm</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '110', '-', 'vn', '2018-10-22 09:56:21', '2018-10-22 09:56:21'),
(79, 'GIÀY LƯỜI  - XANH', '<p>- Chất liệu gi&agrave;y: Open Mesh gi&uacute;p th&ocirc;ng tho&aacute;ng, thoải m&aacute;i, &ecirc;m &aacute;i v&agrave; chống ẩm mốc khi mang suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- Gi&agrave;y d&agrave;nh cho giới nữ văn ph&ograve;ng v&agrave; b&agrave; mẹ mang thai v&igrave; c&oacute; trọng lượng nhẹ nhất so với những mẫu gi&agrave;y c&ugrave;ng loại v&igrave; đế bằng Phylon được xem l&agrave; một chất liệu ti&ecirc;n tiến v&agrave; nhẹ nhất hiện hay.</p>\r\n\r\n<p>- M&agrave;u sắc: R&ecirc;u / R&ecirc;u Đen / Đen / Xanh / Đỏ Tươi / Đỏ Bầm</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '111', '-', 'vn', '2018-10-22 09:59:21', '2018-10-22 09:59:21'),
(80, 'GIÀY LƯỜI - RÊU ĐẬM', '<p>- Chất liệu gi&agrave;y: Open Mesh gi&uacute;p th&ocirc;ng tho&aacute;ng, thoải m&aacute;i, &ecirc;m &aacute;i v&agrave; chống ẩm mốc khi mang suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- Gi&agrave;y d&agrave;nh cho giới nữ văn ph&ograve;ng v&agrave; b&agrave; mẹ mang thai v&igrave; c&oacute; trọng lượng nhẹ nhất so với những mẫu gi&agrave;y c&ugrave;ng loại v&igrave; đế bằng Phylon được xem l&agrave; một chất liệu ti&ecirc;n tiến v&agrave; nhẹ nhất hiện hay.</p>\r\n\r\n<p>- M&agrave;u sắc: R&ecirc;u / R&ecirc;u Đen / Đen / Xanh / Đỏ Tươi / Đỏ Bầm</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '112', '-', 'vn', '2018-10-22 10:01:30', '2018-10-22 10:01:30'),
(81, 'GIÀY LƯỜI - ĐEN', '<p>- Chất liệu gi&agrave;y: Open Mesh gi&uacute;p th&ocirc;ng tho&aacute;ng, thoải m&aacute;i, &ecirc;m &aacute;i v&agrave; chống ẩm mốc khi mang suốt cả ng&agrave;y.</p>\r\n\r\n<p>- Đế gi&agrave;y: Chất liệu phylon l&agrave; một loại vật liệu mới nhất v&agrave; nhẹ nhất trong nền c&ocirc;ng nghiệp gi&agrave;y sneaker hiện nay. B&ecirc;n dưới đế gi&agrave;y c&oacute; điểm v&agrave;i miếng cao su mỏng nhằm gi&uacute;p chống trơn trợt, tăng độ bền v&agrave; thẩm mỹ cho phần đế của đ&ocirc;i gi&agrave;y.</p>\r\n\r\n<p>- L&oacute;t gi&agrave;y/sockliner: Chất liệu h&uacute;t ẩm tốt, &ecirc;m ái và nhẹ nhàng trong di chuy&ecirc;̉n.</p>\r\n\r\n<p>- Đường chỉ may: Tỉ mỉ, chăm ch&uacute;t &amp; thẩm mỹ.</p>\r\n\r\n<p>- Gi&agrave;y d&agrave;nh cho giới nữ văn ph&ograve;ng v&agrave; b&agrave; mẹ mang thai v&igrave; c&oacute; trọng lượng nhẹ nhất so với những mẫu gi&agrave;y c&ugrave;ng loại v&igrave; đế bằng Phylon được xem l&agrave; một chất liệu ti&ecirc;n tiến v&agrave; nhẹ nhất hiện hay.</p>\r\n\r\n<p>- M&agrave;u sắc: R&ecirc;u / R&ecirc;u Đen / Đen / Xanh / Đỏ Tươi / Đỏ Bầm</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Giới t&iacute;nh: Nữ</p>\r\n\r\n<p>- Trọng lượng: 130-138grs/chiếc (size 36)</p>', 'product', '113', '-', 'vn', '2018-10-22 10:03:56', '2018-11-13 02:44:53'),
(82, 'giầy lười nam', NULL, 'product_category', '13', '-', 'vn', '2018-10-30 01:23:53', '2018-10-30 01:23:53'),
(83, 'thử 1', '<p>&aacute;dfsdfsd</p>', 'product', '114', '-', 'vn', '2018-10-30 01:25:35', '2018-11-29 04:05:06'),
(84, 'kho Govap', NULL, 'product_category', '13', '-', 'en', '2018-10-30 01:28:09', '2018-10-30 01:28:09'),
(85, 'GIÀY THỂ THAO', NULL, 'product_category', '11', '-', 'en', '2018-11-04 09:51:00', '2018-11-04 09:54:55'),
(87, 'text', '<p>texttexttexttexttexttexttexttexttexttexttexttexttexttext<img alt=\"\" src=\"/uploads/images/medias/1533267743Lazada-DSC04098-jpg.jpg\" style=\"height:1200px; width:1200px\" /></p>', 'page', '14', '-', 'vn', '2018-11-06 03:11:05', '2018-11-06 03:11:05');
INSERT INTO `content_lang_fields` (`id`, `title`, `content`, `content_type`, `table_name`, `json_content`, `lang`, `created_at`, `updated_at`) VALUES
(88, 'Khuyến Mãi Mega Sales All', '<p style=\"margin-left:0px; margin-right:0px; text-align:left\">GI&Agrave;Y THỂ THAO MỸ VIKEN - CHO MỘT THẾ HỆ VIỆT NĂNG ĐỘNG</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:left\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">🎁</span></span><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">🎁</span></span><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">🎁</span></span> Sau những chương tr&igrave;nh mua gi&agrave;y tặng qu&agrave; d&agrave;nh cho kh&aacute;ch h&agrave;ng trước đ&acirc;y trong m&ugrave;a tựu trường &amp; mua 1 tặng 1 trong th&aacute;ng 9 đến giữa th&aacute;ng 10/2018 m&agrave; Viken đ&atilde; h&acirc;n hạnh giới thiệu.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:left\">$$$ Nay Viken lại kh&ocirc;ng ngừng nỗ lực đ&aacute;p lại t&igrave;nh y&ecirc;u thương của Q&uacute;i kh&aacute;ch h&agrave;ng bằng chương tr&igrave;nh MEGA SALES ALL - GIẢM TẤT CẢ - từ 20/10 đến 20/11/2018 trực tiếp tr&ecirc;n tất cả c&aacute;c d&ograve;ng sản phẩm của Viken tại to&agrave;n bộ hệ thống cửa h&agrave;ng, đại l&yacute; v&agrave;<span style=\"font-family:helvetica,arial,sans-serif\"> hầu hết top c&aacute;c trang thương mại điện tử tại Việt Nam!</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-family:helvetica,arial,sans-serif\"><img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f6c/1/16/2764.png\" style=\"height:16px; width:16px\" /><span style=\"font-family:helvetica,arial,sans-serif; font-size:0px\">&lt;3</span></span> <span style=\"font-family:helvetica,arial,sans-serif\"><img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f6c/1/16/2764.png\" style=\"height:16px; width:16px\" /><span style=\"font-family:helvetica,arial,sans-serif; font-size:0px\">&lt;3</span></span> <span style=\"font-family:helvetica,arial,sans-serif\"><img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f6c/1/16/2764.png\" style=\"height:16px; width:16px\" /><span style=\"font-family:helvetica,arial,sans-serif; font-size:0px\">&lt;3</span></span> C&aacute;c kh&aacute;ch y&ecirc;u c&oacute; thể đến c&aacute;c showroom để được tư vấn tốt nhất !!! kh&aacute;ch y&ecirc;u tham khảo địa chị trong phần địa chỉ showroom tren fb .</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><a href=\"https://www.facebook.com/hashtag/viken?source=feed_text&amp;__xts__%5B0%5D=68.ARCpQwLmFEKnSJQ8Yt8JIBQ0lrP_l5zJF3hNa4Ey7ljVid9oeT3_QAiOHfFEn-j_bDelsYuhKKSmKjaRAgEr6TXkW61HH-nxz6RrrlMzDkCBvW1L34niTHY4yWUy3NqTXN-JslnrTuxhNk80TQ5DJlfiST0p0DrjW-qgyN-e8LE8_7lB90iPoamr55NfJfpYc5lPeV1PsC1B5ubFcWxakv8h&amp;__tn__=%2ANK-R\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:rgb(54, 88, 153); font-family:helvetica,arial,sans-serif\">#</span><span style=\"font-family:helvetica,arial,sans-serif\">Viken</span></span></a> <a href=\"https://www.facebook.com/hashtag/vikenshoes?source=feed_text&amp;__xts__%5B0%5D=68.ARCpQwLmFEKnSJQ8Yt8JIBQ0lrP_l5zJF3hNa4Ey7ljVid9oeT3_QAiOHfFEn-j_bDelsYuhKKSmKjaRAgEr6TXkW61HH-nxz6RrrlMzDkCBvW1L34niTHY4yWUy3NqTXN-JslnrTuxhNk80TQ5DJlfiST0p0DrjW-qgyN-e8LE8_7lB90iPoamr55NfJfpYc5lPeV1PsC1B5ubFcWxakv8h&amp;__tn__=%2ANK-R\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:rgb(54, 88, 153); font-family:helvetica,arial,sans-serif\">#</span><span style=\"font-family:helvetica,arial,sans-serif\">Vikenshoes</span></span></a> <a href=\"https://www.facebook.com/hashtag/thếhệviệtnăngđộng?source=feed_text&amp;__xts__%5B0%5D=68.ARCpQwLmFEKnSJQ8Yt8JIBQ0lrP_l5zJF3hNa4Ey7ljVid9oeT3_QAiOHfFEn-j_bDelsYuhKKSmKjaRAgEr6TXkW61HH-nxz6RrrlMzDkCBvW1L34niTHY4yWUy3NqTXN-JslnrTuxhNk80TQ5DJlfiST0p0DrjW-qgyN-e8LE8_7lB90iPoamr55NfJfpYc5lPeV1PsC1B5ubFcWxakv8h&amp;__tn__=%2ANK-R\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:rgb(54, 88, 153); font-family:helvetica,arial,sans-serif\">#</span><span style=\"font-family:helvetica,arial,sans-serif\">ThếHệViệtNăngĐộng</span></span></a><br />\r\n----------------------------------<br />\r\n<span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">📜</span></span>Xem sản phẩm tại:</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\">1. Shopee: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2PdaEF9%3Ffbclid%3DIwAR2YRlsx5U88oIKZjiyKIS3fXuPwnGhPSw8tEn4bRrw_PRFVkmWPLYppLq8&amp;h=AT1bSFvespXcKR2_mLuWk-8SBOezL6VOpc9ZnvXP1Fmll1gKP9-w5n5IBaKptAxKl9jnXcleESL7W0DNHDm93bV5YzGRpbsHghp3GC2_I3qywdk46fKHJcELn0lRZ02dn2ZOmKLSEiY8eLioCuXfe0Q6izNpScN6hRiV9eWb2su0fuKiZ5so1DVRtXxZMQeSyMbueFRackhid4aM4SB8S3NFQBYEN2yUT6MWtSmnYl6BGRzitzE43MB2riJkvAFIrsl4kOT1ebcaXKOP0wXvSHmoZM0oUCSbjKkD7FrHPPMb1dz6hxL4ZaEDcvYiH-KGr_5gxAwIiPCNPDIvAJA5FAuIB9H1kYJuACjB6p8pUWZ9XDpi4o3QLEGM1dl9mAUi8xNWC9FtrC9Zcxq797IVG5fIPE_hq_W-a_KpHAC_rX4oWCQ9QnSe0QBGWuYDx101cxAJLFFYuQg\" target=\"_blank\">https://bit.ly/2PdaEF9</a><br />\r\n2. Lazada: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2NmhuEf%3Ffbclid%3DIwAR3_dCIgzy1UPmVhE0CugJ7lPQTqik7W9L3lSn4Voht6mkTec3xvvrnYIzI&amp;h=AT3MbkDYSZ86-V77zmvDOmLukFizbG9zXSOBO-FXxRslbmhScyT439bMf6RI5WKOAx-UZqk2QsD1-Eq04W-gODacgTeI6sIb5An_qGuFV4b37x3H_tT3aLpEeZ1pWFTHjxGoPYNlgIJTnI4xiJVDBpYQC7vQL9A8ei-4R8SvhO65zIttQI3uNSKXctP1pbf_qZL7on6qz9DCmTI53F0Eu-HZ0hExf5m5_vJAOKXjbUua8GXWViPFVFuceYjp7n_0uxGQ8Y-wFufELUwPkicgaCsEOWrq3rLz7YwW-abtPdfOVpUkHhfTlXKk8c-L7w_L70rc2e87LiNpbbeUp9low5orfvsVSHQc8NoppzuIM3LUlnwd_FeY_LEvhfOsvl6h9x0g21NQiS0ykkzCT-miQHWGai2BAbXAc0Ko4DU9n-5lxXIXQ9uxWz2J6cHMz_i1jujxKu-YSwo\" target=\"_blank\">https://bit.ly/2NmhuEf</a><br />\r\n3. Tiki: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2vuCEZf%3Ffbclid%3DIwAR2CYC01tnBfLt4xjGW0o6NaVVmdglwumfHwvw1CvtsvHnMzQf_91cFLDkU&amp;h=AT02oRTVFVZ4tZtnKC0TInuuWzKl63ujIw7fdYsMadi60jEJy6otRYz742YKKqyC9SUYShp4S2zeX8RebvY8DOO2UJ9vrcwgZ5e49HBnqH0Gc1YQk4Hp5m5jnLZWt3lnCI1bYmQky8Hl7zAKJsumWE50e3lToDmLTm0K7hOGqQhX01-L2qWp69AmnpraLCwmXRL405zJBYKnGPTjU9WZ6ny3EkRfQUCIGN0zsg6xR775VUwuP35wJORYAZcBVvTh9q0ErN6Anraz1XW73rIV_Stm3vX0x5-i7-Yr060TQLUjkGuZrmlcWT9Q2523yOoDg9jA5MT8ryrGo1HitXHasja-Bi5AJUJLpmnLOXlnmXwB5Pbs67y4KDVXkhg6QpMzmaPXkLfE3d7v4-Rvj1gziavj18-bsFiFJJhKtxeVcO3NxFRT7nIBkamCTzfLQk6xWG-WwlOak4s\" target=\"_blank\">https://bit.ly/2vuCEZf</a><br />\r\n4. Shop Vnexpress: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2AwA0aW%3Ffbclid%3DIwAR0lPjY7d95YB97gPaw0UqU7VSW28yVYZZdPDqAm-v1rzz8RYElTeFIiFTg&amp;h=AT1O7RyyITB97jerAJdtSEaDZ1jZ_SJEEm0CKxPfCl9hW3b1yFKe4__4M3hMsZOrcuPCNRiYF7wlcijsB_CP7sNrIv8awQNg3QvmHmFbZSwPoj9tQOwGqsZCRZgKniQgq2etregtDwQVWD9wK6TucWFr_wRTNThn6uWLOxYMWnqXvCz16y12JTUeT_o9vQi4qOfsa-HKsQ32TDdwc7oLDOu8anhISvK4WW9X4i7Mv-OTZKiPViFlpCkGJXOrZCgPwzjs4Mj2sdoXnBKCQAP-ibyJijfdJuFXyookLf8E3lqFLs7Lz19fe91tYxjV-aJU9hWB_33LaHkAnOiq-wcoPdmNN4qUEXDC0xfcL5TYYpVZ9CXKpCHhJ0Q-dUJjOytn8NsvSVzjr2JYGFDZwwGommtwlC6ia4Jg21fiz82RK9uIfuP-6llOG8fpvRZcPI6bflgFOUwiKls\" target=\"_blank\">https://bit.ly/2AwA0aW</a><br />\r\n5. AĐ&acirc;yRồi: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2q4sV9v%3Ffbclid%3DIwAR3_FzfJTVrnj44oDEZvQyjH--N97kiiqpTsiV9SLauQFD8-lF68UySndRI&amp;h=AT1IeXmWwnk6Z05F1v24NBgKw5O9N8vyvXU1UxiEJW8S5MYb1OXgOOEiMRq3X3iTDptfMW3pVwXuznsUlnSdMvA-WmfBXc_uv7BvopQaLKZ_Ugiv0F685pC2TLv7w3RWnIe0XTOPVl0aI_jr77F5mRk3DnMPEF636JO35HMDX0uloubISYRfBNoakmLOw0GSZH9mE-5ZdQXbb97BpjAeixLJt2lALz7UYl-UYSyg-RumetNXOYEECPL3fUE7DyiFK1ubRGxE69avQk7z1aZTSd3r-c1evQaPzzhm5l75ch2vjm85yOUwWR4WBiaZLxOZEdRvuAoJA4pRoFhvTTa1ccQDQ8BDa11PvBBG8oEr2nxEQOG1KJN2x3qF2ny36ggIXzSa2-B3CvlGKaS_IE0DK5yJb_ASVsp9LHYDc2cISjSHSRoZ_M6qhDzEBBx9mrWxTLRJjbvngMs\" target=\"_blank\">https://bit.ly/2q4sV9v</a></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">🌎</span></span> Website: <a href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fvikensports.com.vn%2F%3Ffbclid%3DIwAR17s8KrFP_OyBuQNUqfF3faxGPpyUVi4TwNFgwbpZi6RP3ubUZb3hSsJIs&amp;h=AT3nW7j0C4ktXNPKbwMmEGncdUuoQRjFt-ovlZJxiajl0mwubBD-b-ISCnF5VK06-p3mtvriBOOOsHGT1vC5j3m3JM3zbeRbTx2CghI4hhxcFF73ABLuEbx8nkK2YfTkfRx3z1WZGpc6CiW_QkfxttfDOn90zNC8n1TkuJSDmGaEGlqpWewyDQpKRw9jMsFwhHzVHy7Z2bt6o19IgLc_zviDbAbo1Bk8wPYfLNHADfkpUfX6My0d0AUIl1uDQj-hMUHz3jLnsonxvWeSEcrPDQfymavuaG5seFVQ6oO-ThycUtlpuLVNfiIWaDpj7IfaQNAk0-zfGPcVKhqrriJMvMaAc34Zr3ZuulOb115h5nupekGm7E0wX0h8R3W0xEauwVmZwTibmr3eV-t6qbS4EIGO9DooaGm_PX8wIx_ynl4td9mU4BtmUuTnD7s-ZHhC0BIwbitaXMA\" target=\"_blank\">http://vikensports.com.vn</a><br />\r\n<span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">☎️</span></span> Hotline tư vấn v&agrave; hỗ trợ đặt h&agrave;ng: 028 7107 7868<br />\r\n<span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">📩</span></span> Hotline g&oacute;p &yacute; sản phẩm: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fm.me%2FVikensportsvn%3Ffbclid%3DIwAR28SOhvVT8XrVQJgepVKyrlAcD_fNEVSlxnn28IgvfBW_dtetdCSo9Ss7Y&amp;h=AT0UXAIFGlDxVp6l_-QxZg5DbFlXyRVl8batTsKjxRXs3B2EE49qDOJRMagMJIUvglPq9vgSxXlMBiRKUG9SCIxO0wVGtlW0lvw39sQpW7UvAvp03ciGzlC6uHDrGxFn58O8ei_07PicVm5iqdIo8Uia2xj_5-3QTfPQtMetn_d-lQLFY5aJkqvZugNlPDn1Ckfcl5gLFLXUQrePUeDXFWJIK5wzeflbUk4tfxJhxirRhvZkecQgnytIpIml8HCCgFxEhF5L5-FuLQapf9WrXOXNq8Qcad8S9NLCrSV6CGEJR0aMp_mbM4ys8Y9BggRevk2e8ljfNIdejSu0TlLXHt4UcgkKlD15WdJJp7FvZtfC2odDKVDllkJoE9bOAWFtyCNtn-Lc2Li_9s1CZ3ESQoYAURB17RPVRtgR4xV3buOidIVGWdlLKtHGzgjh2Xep82_8HOSe0zo\" target=\"_blank\">m.me/Vikensportsvn</a></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\">&gt;&gt; GI&Agrave;Y THỂ THAO MỸ VIKEN - CHO MỘT THẾ HỆ VIỆT NĂNG ĐỘNG&lt;&lt;<img alt=\"\" src=\"/uploads/images/medias/%5BBannerStandee%5D_MEGA%20SALES%20ALL_FINAL_19-10-11.jpg\" style=\"height:1200px; width:1202px\" /></p>', 'post', '16', '-', 'vn', '2018-11-06 03:30:35', '2018-11-06 03:30:35'),
(89, 'Giày Thể Thao Nam', 'Giầy thể thao dành cho nam', 'product_category', '14', '-', 'vn', '2018-11-06 03:43:48', '2018-11-06 04:00:31'),
(90, 'Người lớn (nam)', 'Giầy thể thao nam dành cho người lớn', 'product_category', '15', '-', 'vn', '2018-11-06 03:44:50', '2018-11-06 04:00:49'),
(91, 'Giày Thể Thao Bé Trai', 'Giầy thể thao nam dành cho trẻ em', 'product_category', '16', '-', 'vn', '2018-11-06 03:45:28', '2018-11-06 04:03:14'),
(92, 'Giày Thể Thao Nữ', 'Giày thể thao nam dành cho nữ', 'product_category', '17', '-', 'vn', '2018-11-06 03:46:43', '2018-11-23 06:43:02'),
(93, 'Người lớn nữ', 'Giầy thể thao nữ dành cho người lớn', 'product_category', '19', '-', 'vn', '2018-11-06 03:47:57', '2018-11-06 03:47:57'),
(94, 'Giày thể thao bé gái', 'Giày thể thao dành cho bé gái', 'product_category', '20', '-', 'vn', '2018-11-06 03:48:45', '2018-11-23 06:42:43'),
(95, 'Slip-On', 'giầy Slip_On', 'product_category', '21', '-', 'vn', '2018-11-06 03:49:23', '2018-11-06 03:49:23'),
(96, 'Giày Slip-On Nữ', 'Giày Slip-On Nữ', 'product_category', '22', '-', 'vn', '2018-11-06 03:50:14', '2018-11-23 06:42:17'),
(97, 'Người lớn (nữ)', NULL, 'product_category', '23', '-', 'vn', '2018-11-06 03:59:07', '2018-11-06 04:01:44'),
(98, 'BALO THỜI TRANG CAO CẤP VIKEN SPORTS', '<p>Vải bố 2 m&agrave;u chống thấm nước</p>\r\n\r\n<p>L&oacute;t 210 d</p>\r\n\r\n<p>Mặt in simili c&ocirc;ng nghệ 4D.</p>\r\n\r\n<p>K&iacute;ch thước : 42 x 32 x 15 cm</p>', 'product', '115', '-', 'vn', '2018-11-19 14:25:07', '2018-11-19 14:25:07'),
(99, 'Section1', NULL, 'home', '10', '-', 'vn', '2018-11-23 03:09:52', '2019-11-27 01:48:50'),
(100, 'Section 2', 'Slogan section 2', 'home', '11', '-', 'vn', '2018-11-23 03:12:00', '2019-11-27 01:49:08'),
(101, 'Section 3', 'slogan section 3', 'home', '12', '-', 'vn', '2018-11-23 03:12:12', '2019-11-27 01:49:38'),
(102, 'Section 4', NULL, 'home', '13', '-', 'vn', '2018-11-23 03:12:28', '2019-11-27 01:50:10'),
(103, 'Section 5', NULL, 'home', '17', '-', 'vn', '2018-11-23 03:12:41', '2019-11-27 01:50:21'),
(104, 'FOOTWEAR SPORTS SHOES', NULL, 'home', '10', '-', 'en', '2018-11-23 03:13:37', '2018-11-23 03:16:17'),
(105, 'HIGH QUALITY PRODUCTS', 'Giày thể thao Mỹ', 'home', '11', '-', 'en', '2018-11-23 03:13:43', '2018-11-23 03:17:01'),
(106, 'SLIP SHOES ON WOMEN', 'Thời trang của công sở', 'home', '12', '-', 'en', '2018-11-23 03:13:51', '2018-11-23 03:17:30'),
(107, 'MEN\'S FASHION SHOES', NULL, 'home', '13', '-', 'en', '2018-11-23 03:13:59', '2018-11-23 03:18:46'),
(108, 'VIKEN SPORTS SALES SYSTEM ON E-COMMERCES', NULL, 'home', '17', '-', 'en', '2018-11-23 03:19:19', '2018-11-29 04:54:45'),
(109, 'men\'s sports shoes', NULL, 'product_category', '24', '-', 'vn', '2018-11-23 03:32:42', '2018-11-23 03:32:42'),
(110, 'Slip-On Shoes', NULL, 'product_category', '25', '-', 'vn', '2018-11-23 08:34:41', '2018-11-23 08:34:41'),
(111, 'Slip-On Shoes Women', NULL, 'product_category', '26', '-', 'vn', '2018-11-23 08:36:20', '2018-11-23 08:36:20'),
(112, 'Slip-On Shoes Women', NULL, 'product_category', '26', '-', 'en', '2018-11-23 08:37:22', '2018-11-23 08:37:22'),
(113, 'Slip-On Shoes', NULL, 'product_category', '25', '-', 'en', '2018-11-23 08:38:02', '2018-11-23 08:38:02'),
(114, 'Sport Shoes', NULL, 'product_category', '27', '-', 'vn', '2018-11-23 08:41:31', '2018-11-23 08:41:31'),
(115, 'Sport Shoes', NULL, 'product_category', '27', '-', 'en', '2018-11-23 08:42:31', '2018-11-23 08:42:31'),
(116, 'Slip-On Shoes', NULL, 'product_category', '28', '-', 'en', '2018-11-23 08:42:57', '2018-11-23 08:42:57'),
(117, 'SLIP SHOES ON WOMEN', NULL, 'product_category', '29', '-', 'en', '2018-11-23 08:43:28', '2018-11-23 08:43:28'),
(118, 'Sport Shoes Women', NULL, 'product_category', '30', '-', 'en', '2018-11-23 08:45:10', '2018-11-23 08:45:10'),
(119, 'Women\'s Shoes', NULL, 'product_category', '31', '-', 'en', '2018-11-23 08:47:31', '2018-11-23 08:47:31'),
(120, 'Baby Girl Shoes', NULL, 'product_category', '32', '-', 'en', '2018-11-23 08:49:05', '2018-11-23 08:49:05'),
(121, 'Sport Shoes Men\'s', NULL, 'product_category', '33', '-', 'en', '2018-11-23 08:50:38', '2018-11-23 08:50:38'),
(122, 'Sport Shoes Boy', NULL, 'product_category', '34', '-', 'en', '2018-11-23 08:51:57', '2018-11-23 08:51:57'),
(123, 'Shoes Men\'s', NULL, 'product_category', '35', '-', 'en', '2018-11-23 08:52:55', '2018-11-23 08:52:55'),
(124, 'FOOTWEAR - BLACK', '<p>- Shoe material: Open Mesh for ventilation, comfort, smoothness and anti-moldy when worn throughout the day.</p>\r\n\r\n<p>Shoe sole: The phylon material is the latest and lightest material in the current sneaker industry. Underneath the soles of the shoes are thin rubber slats to help prevent slipperiness, increase durability and aesthetics for the sole of the shoe.</p>\r\n\r\n<p>- Lining / sockliner: Good absorbent material, smooth and gentle in moving.</p>\r\n\r\n<p>- Sugary: Meticulous, caring &amp; aesthetically pleasing.</p>\r\n\r\n<p>- Shoes for office women and pregnant mothers because it is the lightest weight of the same type of shoes because the Phylon is considered the most advanced and lightest material available.</p>\r\n\r\n<p>- Color: Moss / Moss Black / Black / Green / Red Fresh / Red</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Gender: Female</p>\r\n\r\n<p>- Weight: 130-138grs / pcs (size 36)</p>', 'product', '113', '-', 'en', '2018-11-23 08:58:13', '2018-11-23 08:58:13'),
(125, 'Giày thể thao', NULL, 'product_category', '36', '-', 'vn', '2018-11-24 02:30:06', '2018-11-24 02:30:06'),
(126, 'Sport Shoes', NULL, 'product_category', '36', '-', 'en', '2018-11-24 02:30:39', '2018-11-24 02:30:39'),
(127, 'Người lớn nữ', NULL, 'product_category', '37', '-', 'vn', '2018-11-24 02:35:13', '2018-11-24 02:35:13'),
(128, 'Giày thể thao bé gái', NULL, 'product_category', '38', '-', 'vn', '2018-11-24 02:38:15', '2018-11-24 02:40:00'),
(129, 'Giày thể thao bé trai', NULL, 'product_category', '39', '-', 'vn', '2018-11-24 02:39:36', '2018-11-24 02:40:09'),
(130, 'Sport Shoes Men', NULL, 'product_category', '14', '-', 'en', '2018-11-24 02:42:25', '2018-11-24 02:42:25'),
(131, 'Sport Shoes Adults Men', NULL, 'product_category', '15', '-', 'en', '2018-11-24 02:46:47', '2018-11-24 02:46:47'),
(132, 'Sport Shoes boy', NULL, 'product_category', '39', '-', 'en', '2018-11-24 02:48:46', '2018-11-24 02:48:46'),
(133, 'Sport Shoes Girls', NULL, 'product_category', '38', '-', 'en', '2018-11-24 02:54:28', '2018-11-24 06:17:36'),
(134, 'Adult Women', NULL, 'product_category', '37', '-', 'en', '2018-11-24 02:54:42', '2018-11-24 06:18:32'),
(135, 'Slip-On shoes Women', NULL, 'product_category', '22', '-', 'en', '2018-11-24 02:54:49', '2018-11-24 06:12:35'),
(136, 'Slip-On shoes', NULL, 'product_category', '21', '-', 'en', '2018-11-24 02:54:56', '2018-11-24 06:10:06'),
(137, 'Sport Shoes Women', NULL, 'product_category', '17', '-', 'en', '2018-11-24 02:55:11', '2018-11-24 06:11:38'),
(138, 'SẢN PHẨM', 'ds', 'product_category', '40', '-', 'vn', '2018-11-26 06:52:19', '2018-11-26 06:52:19'),
(139, 'product', NULL, 'product_category', '40', '-', 'en', '2018-11-26 06:53:08', '2018-11-26 06:53:08'),
(140, 'Sport Shoes', '<p>- Shoe material: Open Mesh for ventilation, comfort, smoothness and anti-moldy when worn throughout the day.</p>\r\n\r\n<p>Shoe sole: The phylon material is the latest and lightest material in the current sneaker industry. Underneath the soles of the shoes are thin rubber slats to help prevent slipperiness, increase durability and aesthetics for the sole of the shoe.</p>\r\n\r\n<p>- Lining / sockliner: Good absorbent material, smooth and gentle in moving.</p>\r\n\r\n<p>- Sugary: Meticulous, caring &amp; aesthetically pleasing.</p>\r\n\r\n<p>- Shoes for office women and pregnant mothers because it is the lightest weight of the same type of shoes because the Phylon is considered the most advanced and lightest material available.</p>\r\n\r\n<p>- Color: Moss / Moss Black / Black / Green / Red Fresh / Red</p>\r\n\r\n<p>- Size: 35 - 40</p>\r\n\r\n<p>- Gender: Female</p>\r\n\r\n<p>- Weight: 130-138grs / pcs (size 36)</p>', 'product', '112', '-', 'en', '2018-11-26 06:58:59', '2018-11-26 06:58:59'),
(141, 'KHUYẾN MÃI MEGA SALE ALL', '<p><span style=\"font-size:22px\">GI&Agrave;Y THỂ THAO MỸ VIKEN - CHO MỘT THẾ HỆ VIỆT NĂNG ĐỘNG</span></p>\r\n\r\n<p><span style=\"font-size:20px\">❤️❤️❤️</span>&nbsp;Đ&aacute;p lại l&ograve;ng y&ecirc;u thương của Qu&yacute; kh&aacute;ch h&agrave;ng trong chương tr&igrave;nh Mega Sales All, Viken sẽ tiếp tục k&eacute;o d&agrave;i thời gian khuyến m&atilde;i đến 20/12/2018 d&agrave;nh cho những Qu&yacute; Fan &amp; Qu&yacute; kh&aacute;ch h&agrave;ng chưa mua kịp trong th&aacute;ng 11 th&igrave; vẫn c&ograve;n thời gian để chọn cho m&igrave;nh đ&ocirc;i gi&agrave;y Viken y&ecirc;u th&iacute;ch.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:20px\">❤️❤️❤️&nbsp;</span>Qu&yacute; Fan &amp; Qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể đến c&aacute;c showroom để được tư vấn tốt nhất!!! Qu&yacute; Fan &amp; Qu&yacute; kh&aacute;ch h&agrave;ng vui l&ograve;ng tham khảo địa chỉ showroom tr&ecirc;n Fanpage của Viken.</p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/viken?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD5rfprAaOfsYnhCJtCJJM4b4uC25sClCu6BEju_BvJDfNxadumetH859A3yLRCjcJVt2KkVolVvPvuLmtwWq4HYLxMIqkr0-Oka4szaDgfFjuMaHm33iMQWPhTobdVOIF3o87wTJ_9SQoCi1RYfCO2AboSeVL7WoTlnLgkYbezw2Rf864Dx91ulIOOHR9iN_vXCfscVL0f4minJimW4PhZl7xSv21MK8E_Qz3awsKQq8gK3HOppJ6jSwTD9pMBI8fOsuwYjBfVh4pgQi1HKqyhVLvP49_cAq_YBNbTNN4J7bVg_yCBArSEMqqYOadlfG5POMwnnTIzHAFjn36UDJg&amp;__tn__=%2ANK-R\">#Viken</a>&nbsp;<a href=\"https://www.facebook.com/hashtag/vikenshoes?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD5rfprAaOfsYnhCJtCJJM4b4uC25sClCu6BEju_BvJDfNxadumetH859A3yLRCjcJVt2KkVolVvPvuLmtwWq4HYLxMIqkr0-Oka4szaDgfFjuMaHm33iMQWPhTobdVOIF3o87wTJ_9SQoCi1RYfCO2AboSeVL7WoTlnLgkYbezw2Rf864Dx91ulIOOHR9iN_vXCfscVL0f4minJimW4PhZl7xSv21MK8E_Qz3awsKQq8gK3HOppJ6jSwTD9pMBI8fOsuwYjBfVh4pgQi1HKqyhVLvP49_cAq_YBNbTNN4J7bVg_yCBArSEMqqYOadlfG5POMwnnTIzHAFjn36UDJg&amp;__tn__=%2ANK-R\">#Vikenshoes</a>&nbsp;<a href=\"https://www.facebook.com/hashtag/th%E1%BA%BFh%E1%BB%87vi%E1%BB%87tn%C4%83ng%C4%91%E1%BB%99ng?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD5rfprAaOfsYnhCJtCJJM4b4uC25sClCu6BEju_BvJDfNxadumetH859A3yLRCjcJVt2KkVolVvPvuLmtwWq4HYLxMIqkr0-Oka4szaDgfFjuMaHm33iMQWPhTobdVOIF3o87wTJ_9SQoCi1RYfCO2AboSeVL7WoTlnLgkYbezw2Rf864Dx91ulIOOHR9iN_vXCfscVL0f4minJimW4PhZl7xSv21MK8E_Qz3awsKQq8gK3HOppJ6jSwTD9pMBI8fOsuwYjBfVh4pgQi1HKqyhVLvP49_cAq_YBNbTNN4J7bVg_yCBArSEMqqYOadlfG5POMwnnTIzHAFjn36UDJg&amp;__tn__=%2ANK-R\">#ThếHệViệtNăngĐộng</a><br />\r\n----------------------------------<br />\r\n📜Xem sản phẩm tại:</p>\r\n\r\n<p>1. Shopee:&nbsp;<a href=\"https://bit.ly/2PdaEF9?fbclid=IwAR2zzrzdZ67CmKK9QV4jPc5BOUkQgBkqvguulVJDVahMxiRct5OylynbeiU\" target=\"_blank\">https://bit.ly/2PdaEF9</a><br />\r\n2. Lazada:&nbsp;<a href=\"https://bit.ly/2NmhuEf?fbclid=IwAR3HDEyXS5zvq1HC6R1vVFqlJqTHnFoZ6j4pniHCfHocQ79va48OI7HgDm8\" target=\"_blank\">https://bit.ly/2NmhuEf</a><br />\r\n3. Tiki:&nbsp;<a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2vuCEZf%3Ffbclid%3DIwAR1iAk-RaSPWkeUFI3BdhMo2RRiwR144mMTgnyNK4TheeXUzWTvkhrn8N4M&amp;h=AT0WcVityLlakb5Y1SoWZGpo1BSWSaDcrHUPFaIts10yqA3S4h0lZvSi5l6geF1jlwO2JmL4NNsoJVIQyjsMo1u1dDXhV69iBi7TIzBjUYj80EW04x6uDwkCtQ-rA21TREgFzZjsFOyXBlp765NL8MSAPUqHby8j_I6kvfLFVwEEJZV70iVSbyh3yDQgtDQylPJaUkmOdIhHnd-3O4YsTe0Gu_rs9drhrq-jlZtozHUNRJVoZcHpS7hjCQg8UVTZOvjFc2mcVX0cyZhFhVha5Qgh5Actt3LPmrogsQeo8hNwHa0Ybupac6QUdY2dPfhFK-ox00V2QxLVtjrcaOa7CODYKLevZI1P2FYHOkH1PDIwOdTjlanKzPE2F1GkCwoBa8jta-HR57aBqwQ-2PldjoCjSV2km2wFMq4mzKy4CPkmvjWsN9rTPAteyIOjLzK3Y08Ws-USp9URRmZEZK28LDN6dUJVkScaTamdE82_t6TS5KBI2WBt3f4m7hKfq3v5eQP7VPE2xcowUVTW-npXflt9q5aF74EVtaLQEgBOkbJngy3S325Tvzqk-DzRHn5mMKF7TfulaU0WtVBMCC0jGC7u6zaQ1w8kiw8mXBnfJbuYyWsqm1aaJS-ejjmJYew\" target=\"_blank\">https://bit.ly/2vuCEZf</a><br />\r\n4. Shop Vnexpress:&nbsp;<a href=\"https://bit.ly/2AwA0aW?fbclid=IwAR0GlBoDgHhC07wByr0Fv9BtoEyuQMY4HEAVcuka4s4-ah4pCXYr7x1J3ro\" target=\"_blank\">https://bit.ly/2AwA0aW</a><br />\r\n5. AĐ&acirc;yRồi:&nbsp;<a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2q4sV9v%3Ffbclid%3DIwAR0txVPj0NiVYczObmAd6lM02h_Em26dqG2RmpjyEB9paQjbxRd-4kERas4&amp;h=AT3vamrRohtkbuPfjlbtYHVBBbCpLYmn-3kd-LJtQyRv6V3lilJinEG5DnlAj1O7QBkhmhjHNCX73CY6k7EdWYm1Z5Rgpyw3uVR3n5CbEasCQ0otLmOKphERRYJcXpP1KP_cKEEF-So9rGJzpicByNtAj02vL0VpDqeomnKkPoRkRSBXQZcDYR-7kwgqZzNTCrJMvyzmij7bgz452XIax6qxA_ThxteNz4aoQTgeSOD0yQLDEwE0l9Vr-uN8K_ny3Yf31LbnwMfCO8AIvA-zqNSD156bH5W99AymRFJq7eJ6wRnu08uB2FTT7pVtG0t8D3bAH6_LPXhOTVIRldu-U-rJPtxt5dIqj29PPVr3NOYqSBGzGQIRfbWGVrErFC6jIocaa2XQJdpInHiMIWiUJfRdUygti-MR_yjvqIwb94OP2iLCRx3Zq0OrBgZgJCAi9FPOlrxWcMS9TT-srjD0FNT1PSXzoVST5OlP1YD2DRvA-PLuwzfNCuQjMtBURj8TTcwMDWYjeKOKC37nbNkt2CNWovspTNjqnLLivBp_Grllgl8YNXmi6HscMaOzSALqC11Ihh2rNxrQ-J2KwJRmEtIZnKN-PA_2GypGdO_7Hyj5_AAlA2Xz0gu5UbSWEi8\" target=\"_blank\">https://bit.ly/2q4sV9v</a><br />\r\n6. Sendo:&nbsp;<a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2zsWSVT%3Ffbclid%3DIwAR1k8evYAqi_cx08v7kFWJEX9nT71D48zeHET-OJHvRnCg6DnaxATxPk2rk&amp;h=AT2tonjX50BkandE2y8KalvcutesQmPd08aeBJBxOOIbw5T1c0_GXEIECudQatz0Kqrj4-UwHX9l0ve_WPvIh0ByvPujcMA8-rzBq6oafr57GxEaMaoEdGJSKuQStchH0HWIE-a91kfObFwWZN9k27xnlJmZJAdPOXfu02XkUmk8KB87bTJffsHvKXvjs0gMJCLZqGTZSeCU73zpe15qLAuiYfDNEQwqvocIgJZeijIv1_kxp_HOUQbOdfi981K90aCJ4RXqnxESBNMffPOfr4jO0_GOlkKd0DbGjpdRkAaTNNj5dTrYlsrAmS0mxlhwNnmLPGpqvi1pVFk0hFlT6VRYjjrQNYM07Z-Ej-0ChqX1vTOYh9bQP3jsuVIVEZuuryPAdbWik8OIWbgKSjX7CMu6SPh6V4tvr9mpC6myH2_jRFELH2JhidnlOflcsxwLDkRUAWt0RngizQdgoXBY5ORKaC0OFqygwYo6xEcgYpFbo8fpM6KiSWmcCRG2XGy9p1Wjo6WlEPt7KN_ioDD3ByzhzIcSFCpAIarhtCtKGoP1WPHJ6ZVcMaE5RrD0z3RDkmxVyXXjZer6DpxRGNc-IczvLM-aLBXT9AThuD1rH2bV-P0EG0jrDLMCa2qELVo\" target=\"_blank\">https://bit.ly/2zsWSVT</a></p>\r\n\r\n<p>Facebook :&nbsp;<a href=\"https://www.facebook.com/Vikensportsvn/\">https://www.facebook.com/Vikensportsvn/</a></p>\r\n\r\n<p>🌎&nbsp;Website:&nbsp;<a href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fvikensports.com.vn%2F%3Ffbclid%3DIwAR3soxGbkhDygkf-JpPpJuxNKi5rWyTg_R_ESfl0bgOjOAA67O-lpW5wPkk&amp;h=AT0Nt6w-J5Ew4MkXqC1WC9gBSJcOHtnp4as7IciOHGemu9QfOrlz3UGINSQHLnsCKjzYDZnWH6Ql2K7EE1OYPMfwYk8oqu6oNQ1ZErIIcV0N-ZumznKPvTdn0UZwLtHLt_AqZOueRpqyICt9B_8s_kHtSe5QWB2qZ1ymfYHMW1AejqPaRE_pE9LYBVwPn5YMvRBAnQAl0RatG-BYa0fbkoSerJmJwmsVcapAvSjDYA052WG__4PpxoT9BsVoHVOzppfsFFrey8bvqXsJXPFkV2yuKleTqiTFDZLuXB18J0ElrE7oNwkN2wZhZncjix1_aNjRxMwtYJ5pWkuv1hX00wsAc9H961jsG13gaBCMKLSSVpW9sc4kgPu5HwOBvudH8gx75zaPpWyvrjxnHOF5nAycD6F3edc5rgZaTMNNONXnchAfHAwvy00k3cvJFx-50QzrWchpV0uY1fgvpni-DtV0ahvxaMLw5LcdveN5zwKDs-WsfzKgw8HJGzZkxpi2HUFEbz92MsuG2qGpV6sFoptJSA7fmbyM62fpm2qVmEwz9JxJa9fEUygjreZzpDpwbtrl5P0qAz1vs13tRIj8Y-a02VzLPWobC1Hno_w_4VWgDUTpAH1y7y34zZjxvhs\" target=\"_blank\">http://vikensports.com.vn</a><br />\r\n☎️&nbsp;Hotline tư vấn v&agrave; hỗ trợ đặt h&agrave;ng: 028 7107 7868<br />\r\n📩&nbsp;Hotline g&oacute;p &yacute; sản phẩm:&nbsp;<a href=\"https://m.me/Vikensportsvn?fbclid=IwAR21pWnKrwGM6MBhSeeD3gpK5atQSzaY4qodTDZrxXOWJ3jpoUaw7QOOuTQ\" target=\"_blank\">m.me/Vikensportsvn</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;&gt; GI&Agrave;Y THỂ THAO MỸ VIKEN - CHO MỘT THẾ HỆ VIỆT NĂNG ĐỘNG&lt;&lt;</p>\r\n\r\n<p><a href=\"https://www.facebook.com/Vikensportsvn/photos/a.193870551258333/281911422454245/?type=3&amp;eid=ARDQ9NqWOOLyLG9Bvi9ZPyH_TxahqMMyhyFoVfYD_ZSHehsEJYg6v6YyghRluEkFsPbDjcQxyFv1tpP3&amp;__xts__%5B0%5D=68.ARD5rfprAaOfsYnhCJtCJJM4b4uC25sClCu6BEju_BvJDfNxadumetH859A3yLRCjcJVt2KkVolVvPvuLmtwWq4HYLxMIqkr0-Oka4szaDgfFjuMaHm33iMQWPhTobdVOIF3o87wTJ_9SQoCi1RYfCO2AboSeVL7WoTlnLgkYbezw2Rf864Dx91ulIOOHR9iN_vXCfscVL0f4minJimW4PhZl7xSv21MK8E_Qz3awsKQq8gK3HOppJ6jSwTD9pMBI8fOsuwYjBfVh4pgQi1HKqyhVLvP49_cAq_YBNbTNN4J7bVg_yCBArSEMqqYOadlfG5POMwnnTIzHAFjn36UDJg&amp;__tn__=EHH-R\"><img alt=\"Trong hình ảnh có thể có: giày và văn bản\" src=\"https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/s720x720/46890440_281911425787578_5638639662705672192_o.jpg?_nc_cat=107&amp;_nc_ht=scontent.fsgn2-1.fna&amp;oh=5ecdd1e55dd7073655c9cb401cfc9c7b&amp;oe=5CA3F681\" style=\"height:473px; width:474px\" /></a></p>', 'post', '17', '-', 'vn', '2018-11-29 03:51:01', '2018-11-29 07:24:26'),
(142, 'VIETNAM EXPO IN HOCHIMINH CITY 2018', '<p style=\"text-align: center;\"><span style=\"font-size:26px\">VIETNAM EXPO IN HOCHIMINH CITY 2018</span></p>\r\n\r\n<p style=\"text-align: center;\"><span style=\"font-size:20px\">🎁🎁🎁</span>&nbsp;Viken Sports th&acirc;n mời Q&uacute;i Fan &amp; Q&uacute;i kh&aacute;ch h&agrave;ng đến tham quan gian h&agrave;ng B116 khu A2 trưng b&agrave;y gi&agrave;y thể thao mỹ VIKEN SPORTS. Nhiều chương tr&igrave;nh khuyến m&atilde;i đặc biệt đang chờ Q&uacute;i Fan &amp; Q&uacute;i kh&aacute;ch h&agrave;ng chỉ c&oacute; tại đ&acirc;y trong &iacute;t ng&agrave;y triễn l&atilde;m diễn ra:</p>\r\n\r\n<p style=\"text-align: center;\"><span style=\"font-size:20px\">🏃&zwj;♀️🏃&zwj;♂️🏃&zwj;♀️VIETNAM EXPO IN HOCHIMINH CITY 2018🏃&zwj;♂️🏃&zwj;♀️🏃&zwj;♂️</span><br />\r\nThời gian: 5-8/12/2018.&nbsp;<br />\r\nTại trung t&acirc;m Triển l&atilde;m v&agrave; Hội nghị S&agrave;i G&ograve;n (SECC)<br />\r\n799 Nguyễn Văn Linh, Phường T&acirc;n Ph&uacute;, Q.7, TP. Hồ Ch&iacute; Minh.</p>\r\n\r\n<p style=\"text-align: center;\">Tr&acirc;n trọng k&iacute;nh mời.</p>\r\n\r\n<p style=\"text-align: center;\"><a href=\"https://www.facebook.com/hashtag/viken?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCXMOVH39pSA3MghjsjYp8V3MHNZG_3PdagQEbO-_SqBIGGpUWwDuUT6_4xoB4srBPtrITpgxokO-bxhMDPLsHO-qVBRrxq574yKsjRy3ni0RwgleEeX6SgY1e2-5rnUnHV7g9Rsx-GOboXG1IOhQckBt38svADqCuGvr2l381SxtYUH0ivSAt_m3PDFsvpNGsmASQp4qT8maUqt5GqKOCG-549jNWnMM-HJqibVvF64_AttjC86TSy5kHnC9TEztS-4NQZy82X3W3Haj_98utOn39Xi4jaHJgeB6F1SXJQdO_34OOO5pgHALgEf_dAxuo&amp;__tn__=%2ANK-R-R-R\">#Viken</a>&nbsp;<a href=\"https://www.facebook.com/hashtag/vikenshoes?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCXMOVH39pSA3MghjsjYp8V3MHNZG_3PdagQEbO-_SqBIGGpUWwDuUT6_4xoB4srBPtrITpgxokO-bxhMDPLsHO-qVBRrxq574yKsjRy3ni0RwgleEeX6SgY1e2-5rnUnHV7g9Rsx-GOboXG1IOhQckBt38svADqCuGvr2l381SxtYUH0ivSAt_m3PDFsvpNGsmASQp4qT8maUqt5GqKOCG-549jNWnMM-HJqibVvF64_AttjC86TSy5kHnC9TEztS-4NQZy82X3W3Haj_98utOn39Xi4jaHJgeB6F1SXJQdO_34OOO5pgHALgEf_dAxuo&amp;__tn__=%2ANK-R-R-R\">#Vikenshoes</a>&nbsp;<a href=\"https://www.facebook.com/hashtag/th%E1%BA%BFh%E1%BB%87vi%E1%BB%87tn%C4%83ng%C4%91%E1%BB%99ng?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCXMOVH39pSA3MghjsjYp8V3MHNZG_3PdagQEbO-_SqBIGGpUWwDuUT6_4xoB4srBPtrITpgxokO-bxhMDPLsHO-qVBRrxq574yKsjRy3ni0RwgleEeX6SgY1e2-5rnUnHV7g9Rsx-GOboXG1IOhQckBt38svADqCuGvr2l381SxtYUH0ivSAt_m3PDFsvpNGsmASQp4qT8maUqt5GqKOCG-549jNWnMM-HJqibVvF64_AttjC86TSy5kHnC9TEztS-4NQZy82X3W3Haj_98utOn39Xi4jaHJgeB6F1SXJQdO_34OOO5pgHALgEf_dAxuo&amp;__tn__=%2ANK-R-R-R\">#ThếHệViệtNăngĐộng</a></p>\r\n\r\n<p style=\"text-align: center;\"><a href=\"https://www.facebook.com/Vikensportsvn/photos/a.193870551258333/284802375498483/?type=3&amp;eid=ARD1jHiZo-yOZQYChjNfZYHsJ5g0iurOkq0TfcPbv9FzGaJ4IWR1wXO2uKvyUwspLd0YQ9mPlR7gtLTY&amp;__xts__%5B0%5D=68.ARCXMOVH39pSA3MghjsjYp8V3MHNZG_3PdagQEbO-_SqBIGGpUWwDuUT6_4xoB4srBPtrITpgxokO-bxhMDPLsHO-qVBRrxq574yKsjRy3ni0RwgleEeX6SgY1e2-5rnUnHV7g9Rsx-GOboXG1IOhQckBt38svADqCuGvr2l381SxtYUH0ivSAt_m3PDFsvpNGsmASQp4qT8maUqt5GqKOCG-549jNWnMM-HJqibVvF64_AttjC86TSy5kHnC9TEztS-4NQZy82X3W3Haj_98utOn39Xi4jaHJgeB6F1SXJQdO_34OOO5pgHALgEf_dAxuo&amp;__tn__=EEHH-R-R-R\"><img alt=\"Trong hình ảnh có thể có: văn bản\" src=\"https://scontent.fsgn6-1.fna.fbcdn.net/v/t1.0-9/p843x403/47005831_284802382165149_6550904005004886016_o.jpg?_nc_cat=103&amp;_nc_oc=AWOmI4JTOTlD5Ocal4N61NPO_YgtsFFv1qrmI45aKDqfTDdxKZtj-3wC4Pn19A&amp;_nc_ht=scontent.fsgn6-1.fna&amp;oh=cc1971e819f7a5d9591ac68c8a660080&amp;oe=5C64D9C1\" style=\"height:500px; width:500px\" /></a></p>', 'post', '18', '-', 'vn', '2018-12-04 16:29:20', '2018-12-04 16:29:20'),
(143, 'VIKEN SPORTS TRÊN ĐƯỜNG HỘI NHẬP', '<p><a href=\"http://&lt;iframe width=&quot;560&quot; height=&quot;315&quot; src=&quot;https://www.youtube.com/embed/Io3YCULORHA&quot; frameborder=&quot;0&quot; allow=&quot;accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture&quot; allowfullscreen&gt;&lt;/iframe&gt;\">http://&lt;iframe width=&quot;560&quot; height=&quot;315&quot; src=&quot;https://www.youtube.com/embed/Io3YCULORHA&quot; frameborder=&quot;0&quot; allow=&quot;accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture&quot; allowfullscreen&gt;&lt;/iframe&gt;</a></p>', 'page', '15', '-', 'vn', '2018-12-31 04:44:58', '2018-12-31 04:44:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `type_customer` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `tax_code` int(11) NOT NULL,
  `prefers_sms` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `first_login` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `provinces` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `sex`, `type_customer`, `email`, `password`, `phone_number`, `birth_date`, `tax_code`, `prefers_sms`, `last_login`, `first_login`, `address`, `provinces`, `avatar`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'Nguyễn Tấn', 'Đạt', 1, 0, 'nguyentandat43@gmail.com', '$2y$10$Dm0CXqdDY5/xWgwlai2gkeaol9LAIfpkyQcP5HI5vPYvKoIHHQkEG', '0388912317', NULL, 0, 0, NULL, NULL, '24 Vũ Huy Tấn , Bình Thạnh, Thành Phố Hồ Chí Minh', '87', NULL, NULL, NULL, '2018-11-06 03:50:06', '2018-11-06 03:50:40'),
(8, 'Nguyễn Tấn', 'Đạt', 1, 0, 'itvietnam.code@gmail.com', '$2y$10$EALsArctq7Bf1y2wi9N/5OnrsOiL4eiZpD2rdk3ET/LU9owWn2NHG', '01688912317', NULL, 0, 0, NULL, NULL, '24 Vũ Huy Tấn, P3 , Bình Thạnh, Thành Phố Hồ Chí Minh', NULL, NULL, NULL, NULL, '2018-11-22 03:37:07', '2018-11-22 03:37:07'),
(9, '', 'thy', 1, 0, 'test@gmail.com', '$2y$10$2xM85w.VK.N.0q9wEWF8SeIMubdpQ.9zoMyobQMoSTeDX84j92zcG', '0909123123', NULL, 0, 0, NULL, NULL, '123/123, Tỉnh Đồng Tháp', NULL, NULL, NULL, NULL, '2018-11-22 03:43:01', '2018-11-22 03:43:01'),
(10, '', 'test', 1, 0, 'thy@gmail.com', '$2y$10$TSx0d/x6g5F.52mHap.U1OB3qe37TMJSra7I1mkDGgtrJbSfTWPZS', '0909123123', NULL, 0, 0, NULL, NULL, '123/123, Tỉnh Đồng Nai', NULL, NULL, NULL, NULL, '2018-11-22 03:51:41', '2018-11-22 03:51:41'),
(11, '', 'thien', 1, 0, 'thien@gmail.com', '$2y$10$ugK/Y9j3JBelqxfKsEo68u1eNJkCbEQn8yVJE.KiVL3oecK.zlibC', '0332739275', NULL, 0, 0, NULL, NULL, 'long an, Tỉnh Long An', NULL, NULL, NULL, NULL, '2018-11-22 09:23:22', '2018-11-22 09:23:22'),
(12, '', 'thien', 1, 0, 'thien', '$2y$10$ceCt6MV788kCWIWyZJn6leM59v/iBPodwbWFfLOdhPlALo0K4hxiy', '13213132', NULL, 0, 0, NULL, NULL, 'long an, Tỉnh Điện Biên', NULL, NULL, NULL, NULL, '2018-11-23 03:52:36', '2018-11-23 03:52:36'),
(13, '', 'thien', 1, 0, 'thein', '$2y$10$dhSr7.SLhF7FY5AluyJPsOvRtgmTnRJeYvCevNHSSTLbu4ON8RfQu', '132151', NULL, 0, 0, NULL, NULL, '65635156, Tỉnh Đắk Nông', NULL, NULL, NULL, NULL, '2018-11-23 04:07:21', '2018-11-23 04:07:21'),
(14, '', 'thien', 1, 0, 'quangcaopro.kmy@gmail.com', '$2y$10$Kjh33SMIrJqzpNxRjegNfuYEW/vU5640buHQgl2fHu./PbZ8tx/DK', '1632739275', NULL, 0, 0, NULL, NULL, '229A Điện Biên Phủ, P.15, Q. Bình Thạnh, Tp.HCM., ( Vào hẻm 227 Điện Biên Phủ 50 mét ), Xưởng mộc: 480/60/2 Đường Bình Quới, P.28, Q. Bình Thạnh., Tỉnh Tây Ninh', NULL, NULL, NULL, NULL, '2018-11-23 04:08:03', '2018-11-23 04:08:03'),
(15, 'Le Vinh', 'Phuc', 1, 0, 'vinhphuc591@gmail.com', '$2y$10$ui8DhEa9dL5XZegEg2SssuU9nIwe5ZqAiZNMuSW7AMRY1G18YxGZ6', '0909545966', NULL, 0, 0, NULL, NULL, 'A805 Tecco, 287 Phan Van Hớn, Tỉnh Đồng Tháp', NULL, NULL, NULL, NULL, '2018-11-25 06:48:26', '2018-11-25 06:48:26'),
(16, '', 'Thy', 1, 0, 'thytest@gmail.com', '$2y$10$rhWbYzviMuP9c2B2Y0X0Mu0GwdU0VmzoH8nvYm/91hjtSop95Jauy', '0909123123', NULL, 0, 0, NULL, NULL, '123/123, Tỉnh Thái Nguyên', NULL, NULL, NULL, NULL, '2018-11-26 09:05:24', '2018-11-26 09:05:24'),
(17, 'minh', 'thien', 1, 0, 'tranthien3091995@gmail.com', '$2y$10$RkGyCrQtNNfN1FxOiSGww.DVYFD5ffG4nnQA2oi80Z/aRppVzDPk6', '0332739275', NULL, 0, 0, NULL, NULL, 'long an, Tỉnh Tiền Giang', NULL, NULL, NULL, NULL, '2018-11-29 11:54:13', '2018-11-29 11:54:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_address`
--

CREATE TABLE `customer_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tỉnh/Thành Phố giao hàng',
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Quận/Huyện giao hàng',
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Xã/Phường giao hàng',
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `number_use` int(11) NOT NULL DEFAULT '10',
  `number_already_use` int(11) NOT NULL DEFAULT '10',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1 Khuyến mãi theo giá, 2 Khuyến mãi theo phần trăm',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `course_class_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `code`, `value`, `number_use`, `number_already_use`, `type`, `start_date`, `end_date`, `course_id`, `course_class_id`, `created_at`, `updated_at`) VALUES
(3, 'VIKENSPORT01', 'VIKENSPORT01', 5, 10, 10, 2, '2018-11-05', '2018-11-08', 3, 7, '2018-11-06 03:49:06', '2018-11-06 03:49:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doc_details`
--

CREATE TABLE `doc_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `vat` int(11) NOT NULL,
  `doc_headers_id` int(10) UNSIGNED NOT NULL,
  `kho_id` int(11) NOT NULL,
  `gia_tri` int(11) DEFAULT NULL,
  `gia_tri_vat` int(11) DEFAULT NULL,
  `product_billing_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khoang_muc_phi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doc_headers`
--

CREATE TABLE `doc_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `doc_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_accounts` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operation_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_hoa_don` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_delivery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_pay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `type_order` tinyint(4) NOT NULL DEFAULT '1',
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'COD',
  `discount_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_hong_san_pham`
--

CREATE TABLE `hoa_hong_san_pham` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_cate_id` int(11) NOT NULL,
  `staffs_id` int(11) NOT NULL,
  `tyle_hoahong` int(11) DEFAULT NULL,
  `tien_tua` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `homes`
--

CREATE TABLE `homes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `slogan` text COLLATE utf8mb4_unicode_ci,
  `multi_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `homes`
--

INSERT INTO `homes` (`id`, `title`, `slug`, `image`, `content`, `slogan`, `multi_image`, `created_at`, `updated_at`) VALUES
(10, 'Section1', 'SECTION_1', NULL, '{\"category\":null,\"limit\":\"4\"}', NULL, NULL, NULL, '2019-11-27 01:48:50'),
(11, 'Section 2', 'SECTION_2', NULL, '{\"category\":null,\"limit\":\"1\"}', 'Slogan section 2', NULL, NULL, '2019-11-27 01:49:08'),
(12, 'Section 3', 'SECTION_3', NULL, '{\"category\":null,\"limit\":\"4\"}', 'slogan section 3', NULL, NULL, '2019-11-27 01:49:38'),
(13, 'Section 4', 'SECTION_4', NULL, '{\"category\":null,\"limit\":\"4\"}', NULL, NULL, NULL, '2019-11-27 01:50:10'),
(17, 'Section 5', 'SECTION_8', NULL, '{\"category\":\"SECTION_8\",\"limit\":null}', NULL, NULL, NULL, '2019-11-27 01:50:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locales`
--

CREATE TABLE `locales` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ltm_translations`
--

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', '_json', 'auth::auth.forgot_password', 'Forgot pwd?', '2018-04-20 22:54:44', '2018-04-20 23:12:13'),
(2, 0, 'en', '_json', 'auth::auth.recover_password', 'Recover pwd?', '2018-04-20 22:54:44', '2018-04-20 23:06:12'),
(3, 0, 'en', '_json', 'Action', 'Action', '2018-04-20 22:54:44', '2018-04-20 23:06:12'),
(4, 0, 'en', '_json', 'courses::class.module_name', 'Courses', '2018-04-20 22:54:44', '2018-04-20 23:06:12'),
(5, 0, 'en', '_json', 'courses::class.post_create', 'Create Courses', '2018-04-20 22:54:44', '2018-04-20 23:06:12'),
(6, 0, 'en', '_json', 'Add Category Successful', 'Add category successfully', '2018-04-20 22:54:44', '2018-04-20 23:06:12'),
(7, 0, 'en', 'auth', 'failed', NULL, '2018-04-20 23:01:22', '2018-04-20 23:01:22'),
(8, 0, 'en', 'auth', 'throttle', NULL, '2018-04-20 23:01:22', '2018-04-20 23:01:22'),
(9, 0, 'en', '_json', 'Email or password does not match', NULL, '2018-04-20 23:01:22', '2018-04-20 23:01:22'),
(10, 0, 'en', '_json', 'Please login to manager systems', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(11, 0, 'en', '_json', 'auth::auth.sign_in', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(12, 0, 'en', '_json', 'auth::auth.remember', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(13, 0, 'en', '_json', 'auth::auth.title_recover_password', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(14, 0, 'en', '_json', 'auth::auth.reset', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(15, 0, 'en', '_json', 'contact::contact.module_name', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(16, 0, 'en', '_json', '#', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(17, 0, 'en', '_json', 'Name', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(18, 0, 'en', '_json', 'Email', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(19, 0, 'en', '_json', 'Content', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(20, 0, 'en', '_json', 'Date', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(21, 0, 'en', '_json', 'courses::courses.module_name', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(22, 0, 'en', '_json', 'courses::courses.courses_name', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(23, 0, 'en', '_json', 'courses::courses.class_room', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(24, 0, 'en', '_json', 'bconnect::bconnect.name', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(25, 0, 'en', '_json', 'courses::class.list_post_name', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(26, 0, 'en', '_json', 'courses::class.post_title', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(27, 0, 'en', '_json', 'courses::class.post_max_student', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(28, 0, 'en', '_json', 'courses::class.post_centre', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(29, 0, 'en', '_json', 'courses::class.post_code', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(30, 0, 'en', '_json', 'courses::class.categories', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(31, 0, 'en', '_json', 'courses::class.post_seclect', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(32, 0, 'en', '_json', 'courses::class.post_room', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(33, 0, 'en', '_json', 'courses::class.post_price', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(34, 0, 'en', '_json', 'courses::class.post_date', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(35, 0, 'en', '_json', 'courses::class.post_deadline', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(36, 0, 'en', '_json', 'courses::class.post_total_day', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(37, 0, 'en', '_json', 'courses::class.day_type', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(38, 0, 'en', '_json', 'courses::class.post_session', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(39, 0, 'en', '_json', 'courses::class.post_cancle', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(40, 0, 'en', '_json', 'courses::class.creat_post_name', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(41, 0, 'en', '_json', 'courses::class.post_status', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(42, 0, 'en', '_json', 'courses::class.post_action', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(43, 0, 'en', '_json', 'courses::courses.courses', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(44, 0, 'en', '_json', 'courses::courses.list_post_name', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(45, 0, 'en', '_json', 'courses::courses.post_title', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(46, 0, 'en', '_json', 'courses::courses.post_short_title', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(47, 0, 'en', '_json', 'courses::courses.post_content', NULL, '2018-04-20 23:01:23', '2018-04-20 23:01:23'),
(48, 0, 'en', '_json', 'courses::courses.post_date', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(49, 0, 'en', '_json', 'courses::courses.courses_tags', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(50, 0, 'en', '_json', 'courses::courses.post_meta_title', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(51, 0, 'en', '_json', 'courses::courses.post_meta_keywords', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(52, 0, 'en', '_json', 'courses::courses.post_meta_description', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(53, 0, 'en', '_json', 'courses::courses.post_upload_file', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(54, 0, 'en', '_json', 'courses::courses.post_create', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(55, 0, 'en', '_json', 'courses::courses.post_cancle', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(56, 0, 'en', '_json', 'courses::courses.creat_post_name', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(57, 0, 'en', '_json', 'courses::courses.post_status', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(58, 0, 'en', '_json', 'courses::courses.post_action', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(59, 0, 'en', '_json', 'courses::discount.creat_cate', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(60, 0, 'en', '_json', 'courses::discount.cate_name', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(61, 0, 'en', '_json', 'courses::discount.cate_parent', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(62, 0, 'en', '_json', 'courses::discount.discount_value', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(63, 0, 'en', '_json', 'courses::discount.apply_date', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(64, 0, 'en', '_json', 'courses::discount.apply_courses', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(65, 0, 'en', '_json', 'courses::discount.apply_class', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(66, 0, 'en', '_json', 'post::post.add_new', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(67, 0, 'en', '_json', 'post::post.posts', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(68, 0, 'en', '_json', 'post::category.create_cate_name', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(69, 0, 'en', '_json', 'post::post.list_post_name', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(70, 0, 'en', '_json', 'menu::menu.module_name', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(71, 0, 'en', '_json', 'page::page.module_name', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(72, 0, 'en', '_json', 'page::page.add_page', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(73, 0, 'en', '_json', 'page::page.list_page', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(74, 0, 'en', '_json', 'page::page.posts', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(75, 0, 'en', '_json', 'page::page.list_post_name', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(76, 0, 'en', '_json', 'page::page.post_title', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(77, 0, 'en', '_json', 'page::page.categories', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(78, 0, 'en', '_json', 'page::page.post_seclect', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(79, 0, 'en', '_json', 'page::page.post_content', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(80, 0, 'en', '_json', 'page::page.post_date', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(81, 0, 'en', '_json', 'page::page.post_tags', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(82, 0, 'en', '_json', 'page::page.post_meta_title', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(83, 0, 'en', '_json', 'page::page.post_meta_keywords', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(84, 0, 'en', '_json', 'page::page.post_meta_description', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(85, 0, 'en', '_json', 'page::page.post_upload_file', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(86, 0, 'en', '_json', 'page::page.post_create', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(87, 0, 'en', '_json', 'page::page.post_cancle', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(88, 0, 'en', '_json', 'post::post.post_title', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(89, 0, 'en', '_json', 'post::post.post_content', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(90, 0, 'en', '_json', 'post::post.post_date', NULL, '2018-04-20 23:01:24', '2018-04-20 23:01:24'),
(91, 0, 'en', '_json', 'post::post.categories', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(92, 0, 'en', '_json', 'post::post.post_seclect', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(93, 0, 'en', '_json', 'post::post.post_tags', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(94, 0, 'en', '_json', 'post::post.post_meta_title', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(95, 0, 'en', '_json', 'post::post.post_meta_keywords', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(96, 0, 'en', '_json', 'post::post.post_meta_description', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(97, 0, 'en', '_json', 'post::post.post_upload_file', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(98, 0, 'en', '_json', 'post::post.post_create', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(99, 0, 'en', '_json', 'post::post.post_cancle', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(100, 0, 'en', '_json', 'page::page.creat_post_name', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(101, 0, 'en', '_json', 'page::page.post_status', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(102, 0, 'en', '_json', 'page::page.post_action', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(103, 0, 'en', '_json', 'post::post.module_name', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(104, 0, 'en', '_json', 'post::post.tags', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(105, 0, 'en', '_json', 'post::category.creat_cate', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(106, 0, 'en', '_json', 'post::category.cate_name', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(107, 0, 'en', '_json', 'post::category.cate_slug', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(108, 0, 'en', '_json', 'post::category.cate_parent', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(109, 0, 'en', '_json', 'post::category.cate_desrciption', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(110, 0, 'en', '_json', 'post::category.categories', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(111, 0, 'en', '_json', 'post::category.number_post', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(112, 0, 'en', '_json', 'post::category.created_at', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(113, 0, 'en', '_json', 'post::category.action', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(114, 0, 'en', '_json', 'post::post.creat_post_name', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(115, 0, 'en', '_json', 'post::post.post_status', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(116, 0, 'en', '_json', 'post::post.post_action', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(117, 0, 'en', '_json', 'post::tag.creat_tag', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(118, 0, 'en', '_json', 'post::tag.tag_name', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(119, 0, 'en', '_json', 'post::tag.tag_slug', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(120, 0, 'en', '_json', 'post::tag.tag_desrciption', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(121, 0, 'en', '_json', 'post::tag.tag', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(122, 0, 'en', '_json', 'post::tag.number_post', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(123, 0, 'en', '_json', 'post::tag.action', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(124, 0, 'en', '_json', 'setting::setting.module_name', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(125, 0, 'en', '_json', 'user::user.module_name', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(126, 0, 'en', '_json', 'user::user.user_name', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(127, 0, 'en', '_json', 'user::user.role_name', NULL, '2018-04-20 23:01:25', '2018-04-20 23:01:25'),
(128, 1, 'vn', '_json', 'auth::auth.forgot_password', 'Quên mật khẩu?', '2018-04-20 23:05:43', '2018-04-20 23:08:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `medias`
--

CREATE TABLE `medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'SLIDER,LOI_ICT,DIEU_KHAC_BIET,KHONG_GIAN_HCT,NOI_VE_HCT',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
  `category` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '1',
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vn',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `title`, `slug`, `image`, `url`, `position`, `category`, `parent_id`, `lang`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'TRANG CHỦ', 'trang-chu', NULL, '/', 1, 1, 0, 'vn', NULL, '2018-06-08 16:07:54', '2018-06-15 09:52:21'),
(18, 'Chính sách khách hàng thân thiết', 'tin-tuyen-dung', NULL, '/tin-tuc/tuyen-nhan-vien-lam-viec-tai-hct-5.html', 2, 2, 0, 'vn', NULL, '2018-06-14 03:02:12', '2018-11-06 02:37:23'),
(19, 'Tin tức', 'tin-tuc', NULL, '/tin-tuc.html', 5, 2, 0, 'vn', NULL, '2018-06-14 03:02:12', '2018-06-18 08:19:04'),
(29, 'Liên hệ', 'lien-he', NULL, '/lien-he.html', 4, 2, 0, 'vn', NULL, '2018-06-18 07:49:02', '2018-08-12 05:12:26'),
(36, 'SẢN PHẨM', 'duoc-pham', NULL, '/san-pham.html', 2, 1, 0, 'vn', NULL, '2018-07-02 08:13:31', '2018-11-13 02:18:23'),
(40, 'TIN TỨC', 'tin-tuc', NULL, '/danh-muc/tin-tuc.html', 7, 1, 0, 'vn', NULL, '2018-09-19 03:41:04', '2018-09-19 03:41:25'),
(41, 'Tin tuyển dụng', 'tin-tuyen-dung', NULL, '/danh-muc/tin-tuyen-dung.html', 9, 1, 40, 'vn', NULL, '2018-09-19 03:41:11', '2018-09-19 09:22:09'),
(42, 'Tin nổi bật', 'tin-noi-bat', NULL, 'danh-muc/tin-noi-bat.html', 8, 1, 40, 'vn', NULL, '2018-09-19 03:41:11', '2018-09-19 09:21:48'),
(48, 'Thông tin khuyến mãi', 'khuyen-mai-mung-khai-truong', NULL, '/tin-tuc/khuyen-mai-mung-khai-truong-14.html', 3, 2, 0, 'vn', NULL, '2018-09-29 04:50:00', '2018-11-06 02:37:01'),
(49, 'Sale off date open store', 'khuyen-mai-mung-khai-truong', NULL, '/tin-tuc/khuyen-mai-mung-khai-truong-14.html', 1, 2, 0, 'en', NULL, '2018-09-29 04:50:09', '2018-09-29 04:50:09'),
(50, 'Terms & Conditions 12', 'http://dev.redsun.info/terms-conditions12-12.html', NULL, '/terms-conditions12-12.html', 2, 2, 0, 'en', NULL, '2018-09-29 04:52:02', '2018-09-29 04:52:02'),
(51, 'Terms & Conditions 8', 'http://dev.redsun.info/terms-conditions8-8.html', NULL, 'http://dev.redsun.info/terms-conditions8-8.html', 1, 2, 0, 'en', NULL, '2018-09-29 04:53:45', '2018-09-29 04:53:45'),
(53, 'Giới thiệu', 'gioi-thieu', NULL, 'gioi-thieu.html', 1, 2, 0, 'vn', NULL, '2018-09-29 04:59:30', '2018-09-29 04:59:30'),
(54, 'Home', 'trang-chu', NULL, '/', 1, 1, 0, 'en', NULL, '2018-09-29 05:01:26', '2018-09-29 05:02:00'),
(57, 'Products', 'products', NULL, '/san-pham.html', 2, 1, 0, 'en', NULL, '2018-09-29 05:04:21', '2018-09-29 05:04:21'),
(58, 'News', '', NULL, '#', 4, 1, 0, 'en', NULL, '2018-09-29 05:07:43', '2018-09-29 05:07:56'),
(65, 'Article', 'tin-tuc', NULL, '/danh-muc/tin-tuc.html', 6, 1, 58, 'en', NULL, '2018-09-29 05:19:18', '2018-09-29 05:19:50'),
(66, '家', '', NULL, '/', 1, 1, 0, 'cn', NULL, '2018-09-29 05:33:16', '2018-09-29 05:33:16'),
(67, '关于我们', '', NULL, 'gioi-thieu.html', 1, 1, 0, 'cn', NULL, '2018-09-29 05:33:47', '2018-09-29 05:33:47'),
(70, 'Events', 'su-kien', NULL, 'http://dev.redsun.info/danh-muc/su-kien.html', 5, 1, 58, 'en', NULL, '2018-10-01 08:23:00', '2018-10-01 08:23:00'),
(74, 'Hệ thống cửa hàng', 'he-thong-cua-hang', NULL, '#store', 1, 5, 0, 'vn', NULL, '2018-11-04 09:48:31', '2018-11-04 09:48:31'),
(75, 'Hợp tác', 'hop-tac', NULL, '#', 2, 5, 0, 'vn', NULL, '2018-11-04 09:48:39', '2018-11-04 09:48:39'),
(80, 'Khuyến mãi', 'khuyen-mai', NULL, '/danh-muc/khuyen-mai.html', 6, 1, 0, 'vn', NULL, '2018-11-06 03:32:46', '2018-11-13 02:12:16'),
(81, 'Liên hệ', 'lien-he', NULL, '/lien-he.html', 10, 1, 0, 'vn', NULL, '2018-11-06 03:35:42', '2019-11-26 09:16:33'),
(86, 'SaleOff', 'khuyen-mai', NULL, 'http://vikensports.com.vn/danh-muc/khuyen-mai.html', 3, 1, 0, 'en', NULL, '2018-11-23 08:24:55', '2018-11-23 08:24:55'),
(87, 'Contact', 'contact', NULL, 'http://vikensports.com.vn/lien-he.html', 7, 1, 0, 'en', NULL, '2018-11-23 08:26:19', '2018-11-23 08:26:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identify` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `title`, `identify`, `content`, `status`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Menu Header', 'main_header', NULL, 1, 'vn', '2018-09-28 17:00:00', '2018-09-29 05:19:28'),
(2, 'Menu Footer', 'footer', NULL, 1, 'vn', '2018-09-28 17:00:00', '2018-09-28 17:00:00'),
(4, 'Menu Left Sidebar', 'left_sidebar', NULL, 1, 'vn', '2018-09-29 03:43:15', '2018-09-29 03:43:15'),
(5, 'Top Header', 'top_header', NULL, 1, 'vn', '2018-11-04 09:48:13', '2018-11-04 09:48:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_02_03_180720_create_locales_table', 1),
(4, '2015_02_03_180721_create_translations_table', 1),
(5, '2018_03_12_035618_create_admins_table', 1),
(6, '2018_04_01_071038_create_db_hct_project_table', 1),
(7, '2018_04_01_075444_create_menu_table', 1),
(8, '2018_04_01_083705_create_courses_table', 1),
(9, '2018_04_01_091544_create_settings_table', 2),
(10, '2018_04_01_125132_update_field_student_number_regiter_table', 3),
(11, '2018_04_14_055939_entrust_setup_tables', 4),
(12, '2014_04_02_193005_create_translations_table', 5),
(13, '2018_05_27_122413_create_home_table', 6),
(15, '2018_06_01_111218_add_meta_table', 7),
(16, '2018_06_01_115202_add_image_table', 8),
(18, '2018_06_01_132934_add_content_detail_table', 9),
(20, '2018_06_01_153345_create_table_sliders_table', 10),
(22, '2018_06_02_130614_create_courses_table', 11),
(25, '2018_06_05_164438_create_sections_table', 12),
(26, '2018_06_08_224910_add_caterory_field_table', 13),
(27, '2018_06_09_135224_add_price_class_rooms', 14),
(30, '2018_06_09_141754_create_info_student_table', 15),
(31, '2018_06_09_143908_create_info_branch_hct_table', 15),
(32, '2018_06_09_144417_add_giang_vien_table_courses', 15),
(33, '2018_06_12_093204_add_sex_info_student_table', 16),
(35, '2018_06_14_100634_add_category_slider_sliders_table', 17),
(36, '2018_05_27_122413_create_about_table', 18),
(37, '2018_06_16_185121_add_field_youtube_table', 19),
(38, '2018_06_16_185121_add_field_url_table', 20),
(39, '2018_06_19_093743_create_permission_group_table', 21),
(40, '2018_06_23_110709_add_class_filed_object_table', 22),
(41, '2018_06_23_131903_create_discounts_table', 22),
(42, '2018_06_23_164609_add_field_price_table', 22),
(43, '2018_06_27_132930_add_category_post_table', 23),
(44, '2018_06_28_164205_create_table_module_products_table', 24),
(45, '2018_06_28_171755_create_table_module_order_table', 25),
(46, '2018_07_02_113958_add_column_to_products_table', 26),
(47, '2018_07_04_144145_create_categories_inventories_table', 27),
(48, '2018_07_06_111623_create_status_table', 27),
(49, '2018_07_06_143158_create__doc_headers_table', 27),
(50, '2018_07_06_144139_create_doc_details_table', 27),
(51, '2018_07_06_152426_add_votes_to_doc_headers_table', 27),
(52, '2018_07_06_154016_add_votes_to_doc_headers_2_table', 27),
(53, '2018_07_07_101809_add_votes_to_customers_table', 27),
(54, '2018_07_07_104055_add_votes_to_doc_headers_3_table', 27),
(55, '2018_07_02_113958_add_unit_column_to_products_table', 28),
(56, '2018_07_02_113958_add_unit_exchange_value_column_to_products_table', 29),
(57, '2018_07_07_104055_fix_categories_inventory_table', 30),
(58, '2018_07_07_104055_add_prefix_to_categories_table', 31),
(59, '2018_07_09_123754_create_log_activity_table', 32),
(60, '2018_07_10_154247_add_column_prefix_to_doc_header_table', 33),
(61, '2018_07_10_154849_drop_column_name_to_doc_header_table', 33),
(62, '2018_07_12_103851_add_column_to_customers_table', 33),
(63, '2018_07_12_105454_add_column_to_customers_table', 34),
(64, '2018_07_12_101018_rename_column_data_export_doc_headers_table', 35),
(65, '2018_07_24_144000_add_and_edit_column_homes_table', 36),
(66, '2014_04_02_193005_create_staffs_in_out_table', 37),
(67, '2018_08_20_103544_add_column_to_doc_details_table', 37),
(68, '2018_08_20_112622_add_column_bank_accounts_to_doc_headers_table', 38),
(69, '2018_08_22_100004_create_shoppingcart_table', 39),
(70, '2018_08_25_111736_create_hhsp_pbds_table', 39),
(71, '2018_08_20_112622_add_column_description_to_product_categories_table', 40),
(72, '2018_08_20_112622_add_column_province_to_customers_table', 41),
(73, '2018_09_05_142453_add_column_tien_tua_to_hoa_hong_san_pham_table', 42),
(74, '2018_09_08_131940_add_fields_doc_headers_table', 43),
(75, '2018_09_10_123910_change_column_product_barcode_string_20_product_table', 43),
(76, '2018_09_10_164950_add_fields_phan_bo_doanh_so_table', 43),
(77, '2018_09_10_165957_add_fields_note_doc_headers_table', 43),
(78, '2018_09_10_170548_change_column_description_to_doc_headers_table', 43),
(79, '2018_09_11_190941_add_field_type_order_table', 44),
(81, '2018_09_20_095432_create_tham_so_du_toan_table', 45),
(82, '2018_09_24_203145_create_content_lang_fields_table', 46),
(83, '2018_09_29_082538_add_field_lang_menu_table', 47),
(85, '2018_09_29_084623_create_category_menus_table', 48),
(86, '2018_09_29_093544_add_fields_status_menu_categories_table', 49),
(87, '2018_10_01_133922_add_fields_lang_abouts_table', 50),
(88, '2018_10_03_194520_edit_column_setting_add_lang_settings_table', 51),
(89, '2018_10_16_191036_add_field_product_attribute_mapping_table', 51),
(90, '2018_11_02_093853_add_column_provinces_id_table_branch', 52),
(91, '2018_09_23_193901_add_field_payment_method_doc_headers_table', 53),
(92, '2018_11_03_104717_add_fields_discount_code_and_price_table', 53),
(93, '2018_11_06_095646_add_fields_attrs_table', 53),
(94, '2018_11_24_123304_add_price_sale_table', 54),
(95, '2018_12_02_081000_create_jobs_table', 55),
(96, '2018_12_02_081050_create_failed_jobs_table', 56);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT 'Sắp xếp thứ tự',
  `author_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 Disable , 1 Enable, 2 Pending',
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_display` timestamp NULL DEFAULT NULL,
  `end_display` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyworks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_customer_resets`
--

CREATE TABLE `password_customer_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_group_id` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `permission_group_id`, `description`, `created_at`, `updated_at`) VALUES
(140, 'about-view', 'Về chúng tôi', 28, NULL, '2018-09-01 13:04:00', '2018-09-01 13:04:00'),
(141, 'about-edit', 'Cập nhật về chúng tôi', 28, NULL, '2018-09-01 13:04:00', '2018-09-01 13:04:00'),
(142, 'categories-view', 'Xem Danh mục', 29, NULL, '2018-09-01 13:04:00', '2018-09-01 13:04:00'),
(143, 'contact-view', 'Xem liên hệ', 30, NULL, '2018-09-01 13:04:00', '2018-09-01 13:04:00'),
(144, 'contact-delete', 'Xóa liên hệ', 30, NULL, '2018-09-01 13:04:00', '2018-09-01 13:04:00'),
(145, 'customer-view', 'Xem danh sách khách hàng ', 31, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(146, 'customer-create', 'Tạo khách hàng mới ', 31, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(147, 'customer-edit', 'Cập nhật thông tin khách hàng ', 31, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(148, 'customer-delete', 'Xóa khách hàng ', 31, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(149, 'home-view', 'Danh sách home', 32, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(150, 'home-edit', 'Cập nhật home', 32, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(151, 'inventories-view', 'Quản lý kho', 33, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(152, 'inventories_import-view', 'Xem danh sách phiếu nhập kho', 33, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(153, 'inventories_export-view', 'Xem danh sách xuất nhập kho', 33, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(154, 'inventories_dc-view', 'Xem danh sách phiếu điều chuyển kho', 33, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(155, 'kho_hang-view', 'Xem danh sách kho hàng', 33, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(156, 'report-view', 'Xem danh sách báo cáo kho', 33, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(157, 'media-view', 'Danh sách media', 34, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(158, 'media-create', 'Tạo mới media', 34, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(159, 'media-edit', 'Cập nhật media', 34, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(160, 'media-delete', 'Xóa media', 34, NULL, '2018-09-01 13:04:01', '2018-09-01 13:04:01'),
(161, 'menu-view', 'Danh sách menu', 35, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(162, 'menu-create', 'Thêm menu', 35, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(163, 'menu-edit', 'Cập nhật menu', 35, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(164, 'menu-delete', 'Xóa menu', 35, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(165, 'page-view', 'Danh sách Trang', 36, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(166, 'page-create', 'Thêm Trang', 36, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(167, 'page-edit', 'Cập nhật Trang', 36, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(168, 'page-delete', 'Xóa trang', 36, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(169, 'post-view', 'Danh sách bài viết', 37, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(170, 'post-create', 'Tạo bài viết', 37, NULL, '2018-09-01 13:04:02', '2018-09-01 13:04:02'),
(171, 'post-edit', 'Cập nhật bài viết', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(172, 'post-delete', 'Xóa bài viết', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(173, 'post-category-view', 'Danh sách Category', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(174, 'post-category-create', 'Tạo Category', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(175, 'post-category-edit', 'Cập nhật Category', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(176, 'post-category-delete', 'Xóa Category', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(177, 'post-tag-view', 'Danh sách thẻ', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(178, 'post-tag-create', 'Tạo thẻ', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(179, 'post-tag-edit', 'Cập nhật thẻ', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(180, 'post-tag-delete', 'Xóa thẻ', 37, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(181, 'products-view', 'Xem danh sách sản phẩm', 38, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(182, 'promotion-view', 'Xem danh sách khuyến mãi', 39, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(183, 'promotion-create', 'Tạo chương trình khuyến mãi ', 39, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(184, 'promotion-edit', 'Cập nhật chương trình khuyến mãi ', 39, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(185, 'promotion-delete', 'Xóa chương trình khuyến mãi ', 39, NULL, '2018-09-01 13:04:03', '2018-09-01 13:04:03'),
(186, 'sales-view', 'Xem danh sách đơn hàng ', 40, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(187, 'sales-create', 'Tạo đơn hàng ', 40, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(188, 'sales-edit', 'Cập nhật đơn hàng ', 40, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(189, 'sales-delete', 'Xóa đơn hàng ', 40, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(190, 'setting-view', 'Danh sách', 41, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(191, 'setting-edit', 'Cập nhật', 41, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(192, 'branch-view', 'Danh sách', 41, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(193, 'slider-view', 'Danh sách slider', 42, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(194, 'slider-create', 'Tạo slider', 42, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(195, 'slider-edit', 'Cập nhật slider', 42, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(196, 'slider-delete', 'Xóa slider', 42, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(197, 'user-view', 'Danh sách người dùng', 43, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(198, 'user-create', 'Tạo người dùng', 43, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(199, 'user-edit', 'Cập nhật người dùng', 43, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(200, 'user-delete', 'Xóa người dùng', 43, NULL, '2018-09-01 13:04:04', '2018-09-01 13:04:04'),
(201, 'role-view', 'Danh sách quyền', 43, NULL, '2018-09-01 13:04:05', '2018-09-01 13:04:05'),
(202, 'role-create', 'Tạo quyền mới', 43, NULL, '2018-09-01 13:04:05', '2018-09-01 13:04:05'),
(203, 'role-edit', 'Cập nhật quyền', 43, NULL, '2018-09-01 13:04:05', '2018-09-01 13:04:05'),
(204, 'role-delete', 'Xóa quyền', 43, NULL, '2018-09-01 13:04:05', '2018-09-01 13:04:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_group`
--

CREATE TABLE `permission_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_group`
--

INSERT INTO `permission_group` (`id`, `name`, `descrition`, `created_at`, `updated_at`) VALUES
(28, 'About', 'Quản lý module About', NULL, NULL),
(29, 'Categories', 'Quản lý module Categories', NULL, NULL),
(30, 'Contact', 'Quản lý module Contact', NULL, NULL),
(31, 'Customers', 'Quản lý module Customers', NULL, NULL),
(32, 'Home', 'Quản lý module Home', NULL, NULL),
(33, 'Kho hàng', 'Quản lý module Kho hàng', NULL, NULL),
(34, 'Media', 'Quản lý module Media', NULL, NULL),
(35, 'Menu', 'Quản lý module Menu', NULL, NULL),
(36, 'Page', 'Quản lý module Page', NULL, NULL),
(37, 'Post', 'Quản lý module Post', NULL, NULL),
(38, 'Products', 'Quản lý module Products', NULL, NULL),
(39, 'Promotion', 'Quản lý module Promotion', NULL, NULL),
(40, 'Bán hàng', 'Quản lý module Bán hàng', NULL, NULL),
(41, 'Setting', 'Quản lý module Setting', NULL, NULL),
(42, 'Slider', 'Quản lý module Slider', NULL, NULL),
(43, 'User', 'Quản lý module User', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(140, 1),
(140, 2),
(141, 1),
(141, 2),
(142, 1),
(142, 2),
(143, 1),
(143, 3),
(144, 1),
(144, 3),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(149, 2),
(150, 1),
(150, 2),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(157, 2),
(158, 1),
(158, 2),
(159, 1),
(159, 2),
(160, 1),
(160, 2),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(165, 2),
(166, 1),
(166, 2),
(167, 1),
(167, 2),
(168, 1),
(168, 2),
(169, 1),
(169, 2),
(170, 1),
(170, 2),
(171, 1),
(171, 2),
(172, 1),
(172, 2),
(173, 1),
(173, 2),
(174, 1),
(174, 2),
(175, 1),
(175, 2),
(176, 1),
(176, 2),
(177, 1),
(177, 2),
(178, 1),
(178, 2),
(179, 1),
(179, 2),
(180, 1),
(180, 2),
(181, 1),
(181, 2),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(193, 2),
(194, 1),
(194, 2),
(195, 1),
(195, 2),
(196, 1),
(196, 2),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_bo_doanh_so`
--

CREATE TABLE `phan_bo_doanh_so` (
  `id` int(10) UNSIGNED NOT NULL,
  `doc_detail_id` int(11) NOT NULL,
  `product_cate_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `tyle_hoahong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT 'Sắp xếp thứ tự',
  `author_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 Disable , 1 Enable, 2 Pending',
  `sumary` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `number_view` int(11) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_tag` text COLLATE utf8mb4_unicode_ci,
  `start_display` timestamp NULL DEFAULT NULL,
  `end_display` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `category_id`, `sort_order`, `author_id`, `status`, `sumary`, `content`, `number_view`, `image`, `post_tag`, `start_display`, `end_display`, `meta_title`, `meta_keywords`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(16, 'Khuyến Mãi Mega Sales All', 'khuyen-mai-mega-sales-all', NULL, 0, 7, 1, NULL, '<p style=\"margin-left:0px; margin-right:0px; text-align:left\">GI&Agrave;Y THỂ THAO MỸ VIKEN - CHO MỘT THẾ HỆ VIỆT NĂNG ĐỘNG</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:left\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">🎁</span></span><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">🎁</span></span><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">🎁</span></span> Sau những chương tr&igrave;nh mua gi&agrave;y tặng qu&agrave; d&agrave;nh cho kh&aacute;ch h&agrave;ng trước đ&acirc;y trong m&ugrave;a tựu trường &amp; mua 1 tặng 1 trong th&aacute;ng 9 đến giữa th&aacute;ng 10/2018 m&agrave; Viken đ&atilde; h&acirc;n hạnh giới thiệu.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:left\">$$$ Nay Viken lại kh&ocirc;ng ngừng nỗ lực đ&aacute;p lại t&igrave;nh y&ecirc;u thương của Q&uacute;i kh&aacute;ch h&agrave;ng bằng chương tr&igrave;nh MEGA SALES ALL - GIẢM TẤT CẢ - từ 20/10 đến 20/11/2018 trực tiếp tr&ecirc;n tất cả c&aacute;c d&ograve;ng sản phẩm của Viken tại to&agrave;n bộ hệ thống cửa h&agrave;ng, đại l&yacute; v&agrave;<span style=\"font-family:helvetica,arial,sans-serif\"> hầu hết top c&aacute;c trang thương mại điện tử tại Việt Nam!</span></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-family:helvetica,arial,sans-serif\"><img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f6c/1/16/2764.png\" style=\"height:16px; width:16px\" /><span style=\"font-family:helvetica,arial,sans-serif; font-size:0px\">&lt;3</span></span> <span style=\"font-family:helvetica,arial,sans-serif\"><img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f6c/1/16/2764.png\" style=\"height:16px; width:16px\" /><span style=\"font-family:helvetica,arial,sans-serif; font-size:0px\">&lt;3</span></span> <span style=\"font-family:helvetica,arial,sans-serif\"><img alt=\"\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/f6c/1/16/2764.png\" style=\"height:16px; width:16px\" /><span style=\"font-family:helvetica,arial,sans-serif; font-size:0px\">&lt;3</span></span> C&aacute;c kh&aacute;ch y&ecirc;u c&oacute; thể đến c&aacute;c showroom để được tư vấn tốt nhất !!! kh&aacute;ch y&ecirc;u tham khảo địa chị trong phần địa chỉ showroom tren fb .</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><a href=\"https://www.facebook.com/hashtag/viken?source=feed_text&amp;__xts__%5B0%5D=68.ARCpQwLmFEKnSJQ8Yt8JIBQ0lrP_l5zJF3hNa4Ey7ljVid9oeT3_QAiOHfFEn-j_bDelsYuhKKSmKjaRAgEr6TXkW61HH-nxz6RrrlMzDkCBvW1L34niTHY4yWUy3NqTXN-JslnrTuxhNk80TQ5DJlfiST0p0DrjW-qgyN-e8LE8_7lB90iPoamr55NfJfpYc5lPeV1PsC1B5ubFcWxakv8h&amp;__tn__=%2ANK-R\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:rgb(54, 88, 153); font-family:helvetica,arial,sans-serif\">#</span><span style=\"font-family:helvetica,arial,sans-serif\">Viken</span></span></a> <a href=\"https://www.facebook.com/hashtag/vikenshoes?source=feed_text&amp;__xts__%5B0%5D=68.ARCpQwLmFEKnSJQ8Yt8JIBQ0lrP_l5zJF3hNa4Ey7ljVid9oeT3_QAiOHfFEn-j_bDelsYuhKKSmKjaRAgEr6TXkW61HH-nxz6RrrlMzDkCBvW1L34niTHY4yWUy3NqTXN-JslnrTuxhNk80TQ5DJlfiST0p0DrjW-qgyN-e8LE8_7lB90iPoamr55NfJfpYc5lPeV1PsC1B5ubFcWxakv8h&amp;__tn__=%2ANK-R\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:rgb(54, 88, 153); font-family:helvetica,arial,sans-serif\">#</span><span style=\"font-family:helvetica,arial,sans-serif\">Vikenshoes</span></span></a> <a href=\"https://www.facebook.com/hashtag/thếhệviệtnăngđộng?source=feed_text&amp;__xts__%5B0%5D=68.ARCpQwLmFEKnSJQ8Yt8JIBQ0lrP_l5zJF3hNa4Ey7ljVid9oeT3_QAiOHfFEn-j_bDelsYuhKKSmKjaRAgEr6TXkW61HH-nxz6RrrlMzDkCBvW1L34niTHY4yWUy3NqTXN-JslnrTuxhNk80TQ5DJlfiST0p0DrjW-qgyN-e8LE8_7lB90iPoamr55NfJfpYc5lPeV1PsC1B5ubFcWxakv8h&amp;__tn__=%2ANK-R\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:rgb(54, 88, 153); font-family:helvetica,arial,sans-serif\">#</span><span style=\"font-family:helvetica,arial,sans-serif\">ThếHệViệtNăngĐộng</span></span></a><br />\r\n----------------------------------<br />\r\n<span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">📜</span></span>Xem sản phẩm tại:</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\">1. Shopee: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2PdaEF9%3Ffbclid%3DIwAR2YRlsx5U88oIKZjiyKIS3fXuPwnGhPSw8tEn4bRrw_PRFVkmWPLYppLq8&amp;h=AT1bSFvespXcKR2_mLuWk-8SBOezL6VOpc9ZnvXP1Fmll1gKP9-w5n5IBaKptAxKl9jnXcleESL7W0DNHDm93bV5YzGRpbsHghp3GC2_I3qywdk46fKHJcELn0lRZ02dn2ZOmKLSEiY8eLioCuXfe0Q6izNpScN6hRiV9eWb2su0fuKiZ5so1DVRtXxZMQeSyMbueFRackhid4aM4SB8S3NFQBYEN2yUT6MWtSmnYl6BGRzitzE43MB2riJkvAFIrsl4kOT1ebcaXKOP0wXvSHmoZM0oUCSbjKkD7FrHPPMb1dz6hxL4ZaEDcvYiH-KGr_5gxAwIiPCNPDIvAJA5FAuIB9H1kYJuACjB6p8pUWZ9XDpi4o3QLEGM1dl9mAUi8xNWC9FtrC9Zcxq797IVG5fIPE_hq_W-a_KpHAC_rX4oWCQ9QnSe0QBGWuYDx101cxAJLFFYuQg\" target=\"_blank\">https://bit.ly/2PdaEF9</a><br />\r\n2. Lazada: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2NmhuEf%3Ffbclid%3DIwAR3_dCIgzy1UPmVhE0CugJ7lPQTqik7W9L3lSn4Voht6mkTec3xvvrnYIzI&amp;h=AT3MbkDYSZ86-V77zmvDOmLukFizbG9zXSOBO-FXxRslbmhScyT439bMf6RI5WKOAx-UZqk2QsD1-Eq04W-gODacgTeI6sIb5An_qGuFV4b37x3H_tT3aLpEeZ1pWFTHjxGoPYNlgIJTnI4xiJVDBpYQC7vQL9A8ei-4R8SvhO65zIttQI3uNSKXctP1pbf_qZL7on6qz9DCmTI53F0Eu-HZ0hExf5m5_vJAOKXjbUua8GXWViPFVFuceYjp7n_0uxGQ8Y-wFufELUwPkicgaCsEOWrq3rLz7YwW-abtPdfOVpUkHhfTlXKk8c-L7w_L70rc2e87LiNpbbeUp9low5orfvsVSHQc8NoppzuIM3LUlnwd_FeY_LEvhfOsvl6h9x0g21NQiS0ykkzCT-miQHWGai2BAbXAc0Ko4DU9n-5lxXIXQ9uxWz2J6cHMz_i1jujxKu-YSwo\" target=\"_blank\">https://bit.ly/2NmhuEf</a><br />\r\n3. Tiki: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2vuCEZf%3Ffbclid%3DIwAR2CYC01tnBfLt4xjGW0o6NaVVmdglwumfHwvw1CvtsvHnMzQf_91cFLDkU&amp;h=AT02oRTVFVZ4tZtnKC0TInuuWzKl63ujIw7fdYsMadi60jEJy6otRYz742YKKqyC9SUYShp4S2zeX8RebvY8DOO2UJ9vrcwgZ5e49HBnqH0Gc1YQk4Hp5m5jnLZWt3lnCI1bYmQky8Hl7zAKJsumWE50e3lToDmLTm0K7hOGqQhX01-L2qWp69AmnpraLCwmXRL405zJBYKnGPTjU9WZ6ny3EkRfQUCIGN0zsg6xR775VUwuP35wJORYAZcBVvTh9q0ErN6Anraz1XW73rIV_Stm3vX0x5-i7-Yr060TQLUjkGuZrmlcWT9Q2523yOoDg9jA5MT8ryrGo1HitXHasja-Bi5AJUJLpmnLOXlnmXwB5Pbs67y4KDVXkhg6QpMzmaPXkLfE3d7v4-Rvj1gziavj18-bsFiFJJhKtxeVcO3NxFRT7nIBkamCTzfLQk6xWG-WwlOak4s\" target=\"_blank\">https://bit.ly/2vuCEZf</a><br />\r\n4. Shop Vnexpress: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2AwA0aW%3Ffbclid%3DIwAR0lPjY7d95YB97gPaw0UqU7VSW28yVYZZdPDqAm-v1rzz8RYElTeFIiFTg&amp;h=AT1O7RyyITB97jerAJdtSEaDZ1jZ_SJEEm0CKxPfCl9hW3b1yFKe4__4M3hMsZOrcuPCNRiYF7wlcijsB_CP7sNrIv8awQNg3QvmHmFbZSwPoj9tQOwGqsZCRZgKniQgq2etregtDwQVWD9wK6TucWFr_wRTNThn6uWLOxYMWnqXvCz16y12JTUeT_o9vQi4qOfsa-HKsQ32TDdwc7oLDOu8anhISvK4WW9X4i7Mv-OTZKiPViFlpCkGJXOrZCgPwzjs4Mj2sdoXnBKCQAP-ibyJijfdJuFXyookLf8E3lqFLs7Lz19fe91tYxjV-aJU9hWB_33LaHkAnOiq-wcoPdmNN4qUEXDC0xfcL5TYYpVZ9CXKpCHhJ0Q-dUJjOytn8NsvSVzjr2JYGFDZwwGommtwlC6ia4Jg21fiz82RK9uIfuP-6llOG8fpvRZcPI6bflgFOUwiKls\" target=\"_blank\">https://bit.ly/2AwA0aW</a><br />\r\n5. AĐ&acirc;yRồi: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2q4sV9v%3Ffbclid%3DIwAR3_FzfJTVrnj44oDEZvQyjH--N97kiiqpTsiV9SLauQFD8-lF68UySndRI&amp;h=AT1IeXmWwnk6Z05F1v24NBgKw5O9N8vyvXU1UxiEJW8S5MYb1OXgOOEiMRq3X3iTDptfMW3pVwXuznsUlnSdMvA-WmfBXc_uv7BvopQaLKZ_Ugiv0F685pC2TLv7w3RWnIe0XTOPVl0aI_jr77F5mRk3DnMPEF636JO35HMDX0uloubISYRfBNoakmLOw0GSZH9mE-5ZdQXbb97BpjAeixLJt2lALz7UYl-UYSyg-RumetNXOYEECPL3fUE7DyiFK1ubRGxE69avQk7z1aZTSd3r-c1evQaPzzhm5l75ch2vjm85yOUwWR4WBiaZLxOZEdRvuAoJA4pRoFhvTTa1ccQDQ8BDa11PvBBG8oEr2nxEQOG1KJN2x3qF2ny36ggIXzSa2-B3CvlGKaS_IE0DK5yJb_ASVsp9LHYDc2cISjSHSRoZ_M6qhDzEBBx9mrWxTLRJjbvngMs\" target=\"_blank\">https://bit.ly/2q4sV9v</a></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\"><span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">🌎</span></span> Website: <a href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fvikensports.com.vn%2F%3Ffbclid%3DIwAR17s8KrFP_OyBuQNUqfF3faxGPpyUVi4TwNFgwbpZi6RP3ubUZb3hSsJIs&amp;h=AT3nW7j0C4ktXNPKbwMmEGncdUuoQRjFt-ovlZJxiajl0mwubBD-b-ISCnF5VK06-p3mtvriBOOOsHGT1vC5j3m3JM3zbeRbTx2CghI4hhxcFF73ABLuEbx8nkK2YfTkfRx3z1WZGpc6CiW_QkfxttfDOn90zNC8n1TkuJSDmGaEGlqpWewyDQpKRw9jMsFwhHzVHy7Z2bt6o19IgLc_zviDbAbo1Bk8wPYfLNHADfkpUfX6My0d0AUIl1uDQj-hMUHz3jLnsonxvWeSEcrPDQfymavuaG5seFVQ6oO-ThycUtlpuLVNfiIWaDpj7IfaQNAk0-zfGPcVKhqrriJMvMaAc34Zr3ZuulOb115h5nupekGm7E0wX0h8R3W0xEauwVmZwTibmr3eV-t6qbS4EIGO9DooaGm_PX8wIx_ynl4td9mU4BtmUuTnD7s-ZHhC0BIwbitaXMA\" target=\"_blank\">http://vikensports.com.vn</a><br />\r\n<span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">☎️</span></span> Hotline tư vấn v&agrave; hỗ trợ đặt h&agrave;ng: 028 7107 7868<br />\r\n<span style=\"font-family:helvetica,arial,sans-serif\"><span style=\"color:transparent; font-family:helvetica,arial,sans-serif; font-size:16px\">📩</span></span> Hotline g&oacute;p &yacute; sản phẩm: <a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fm.me%2FVikensportsvn%3Ffbclid%3DIwAR28SOhvVT8XrVQJgepVKyrlAcD_fNEVSlxnn28IgvfBW_dtetdCSo9Ss7Y&amp;h=AT0UXAIFGlDxVp6l_-QxZg5DbFlXyRVl8batTsKjxRXs3B2EE49qDOJRMagMJIUvglPq9vgSxXlMBiRKUG9SCIxO0wVGtlW0lvw39sQpW7UvAvp03ciGzlC6uHDrGxFn58O8ei_07PicVm5iqdIo8Uia2xj_5-3QTfPQtMetn_d-lQLFY5aJkqvZugNlPDn1Ckfcl5gLFLXUQrePUeDXFWJIK5wzeflbUk4tfxJhxirRhvZkecQgnytIpIml8HCCgFxEhF5L5-FuLQapf9WrXOXNq8Qcad8S9NLCrSV6CGEJR0aMp_mbM4ys8Y9BggRevk2e8ljfNIdejSu0TlLXHt4UcgkKlD15WdJJp7FvZtfC2odDKVDllkJoE9bOAWFtyCNtn-Lc2Li_9s1CZ3ESQoYAURB17RPVRtgR4xV3buOidIVGWdlLKtHGzgjh2Xep82_8HOSe0zo\" target=\"_blank\">m.me/Vikensportsvn</a></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px\">&gt;&gt; GI&Agrave;Y THỂ THAO MỸ VIKEN - CHO MỘT THẾ HỆ VIỆT NĂNG ĐỘNG&lt;&lt;<img alt=\"\" src=\"/uploads/images/medias/%5BBannerStandee%5D_MEGA%20SALES%20ALL_FINAL_19-10-11.jpg\" style=\"height:1200px; width:1202px\" /></p>', 0, '/uploads/images/medias/%5BBannerStandee%5D_MEGA%20SALES%20ALL_FINAL_19-10-11.jpg', 'Khuyến mãi giày Viken', '2018-11-06 03:30:35', NULL, 'Khuyến mãi Viken', 'khuyến mãi Viken', 'Khuyến mãi cho tất cả các dòng sản phẩm Viken', '2019-11-27 01:53:11', '2018-11-06 03:30:35', '2019-11-27 01:53:11'),
(17, 'KHUYẾN MÃI MEGA SALE ALL', 'khuyen-mai-mega-sale-all', NULL, 0, 10, 1, NULL, '<p><span style=\"font-size:22px\">GI&Agrave;Y THỂ THAO MỸ VIKEN - CHO MỘT THẾ HỆ VIỆT NĂNG ĐỘNG</span></p>\r\n\r\n<p><span style=\"font-size:20px\">❤️❤️❤️</span>&nbsp;Đ&aacute;p lại l&ograve;ng y&ecirc;u thương của Qu&yacute; kh&aacute;ch h&agrave;ng trong chương tr&igrave;nh Mega Sales All, Viken sẽ tiếp tục k&eacute;o d&agrave;i thời gian khuyến m&atilde;i đến 20/12/2018 d&agrave;nh cho những Qu&yacute; Fan &amp; Qu&yacute; kh&aacute;ch h&agrave;ng chưa mua kịp trong th&aacute;ng 11 th&igrave; vẫn c&ograve;n thời gian để chọn cho m&igrave;nh đ&ocirc;i gi&agrave;y Viken y&ecirc;u th&iacute;ch.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:20px\">❤️❤️❤️&nbsp;</span>Qu&yacute; Fan &amp; Qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể đến c&aacute;c showroom để được tư vấn tốt nhất!!! Qu&yacute; Fan &amp; Qu&yacute; kh&aacute;ch h&agrave;ng vui l&ograve;ng tham khảo địa chỉ showroom tr&ecirc;n Fanpage của Viken.</p>\r\n\r\n<p><a href=\"https://www.facebook.com/hashtag/viken?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD5rfprAaOfsYnhCJtCJJM4b4uC25sClCu6BEju_BvJDfNxadumetH859A3yLRCjcJVt2KkVolVvPvuLmtwWq4HYLxMIqkr0-Oka4szaDgfFjuMaHm33iMQWPhTobdVOIF3o87wTJ_9SQoCi1RYfCO2AboSeVL7WoTlnLgkYbezw2Rf864Dx91ulIOOHR9iN_vXCfscVL0f4minJimW4PhZl7xSv21MK8E_Qz3awsKQq8gK3HOppJ6jSwTD9pMBI8fOsuwYjBfVh4pgQi1HKqyhVLvP49_cAq_YBNbTNN4J7bVg_yCBArSEMqqYOadlfG5POMwnnTIzHAFjn36UDJg&amp;__tn__=%2ANK-R\">#Viken</a>&nbsp;<a href=\"https://www.facebook.com/hashtag/vikenshoes?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD5rfprAaOfsYnhCJtCJJM4b4uC25sClCu6BEju_BvJDfNxadumetH859A3yLRCjcJVt2KkVolVvPvuLmtwWq4HYLxMIqkr0-Oka4szaDgfFjuMaHm33iMQWPhTobdVOIF3o87wTJ_9SQoCi1RYfCO2AboSeVL7WoTlnLgkYbezw2Rf864Dx91ulIOOHR9iN_vXCfscVL0f4minJimW4PhZl7xSv21MK8E_Qz3awsKQq8gK3HOppJ6jSwTD9pMBI8fOsuwYjBfVh4pgQi1HKqyhVLvP49_cAq_YBNbTNN4J7bVg_yCBArSEMqqYOadlfG5POMwnnTIzHAFjn36UDJg&amp;__tn__=%2ANK-R\">#Vikenshoes</a>&nbsp;<a href=\"https://www.facebook.com/hashtag/th%E1%BA%BFh%E1%BB%87vi%E1%BB%87tn%C4%83ng%C4%91%E1%BB%99ng?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARD5rfprAaOfsYnhCJtCJJM4b4uC25sClCu6BEju_BvJDfNxadumetH859A3yLRCjcJVt2KkVolVvPvuLmtwWq4HYLxMIqkr0-Oka4szaDgfFjuMaHm33iMQWPhTobdVOIF3o87wTJ_9SQoCi1RYfCO2AboSeVL7WoTlnLgkYbezw2Rf864Dx91ulIOOHR9iN_vXCfscVL0f4minJimW4PhZl7xSv21MK8E_Qz3awsKQq8gK3HOppJ6jSwTD9pMBI8fOsuwYjBfVh4pgQi1HKqyhVLvP49_cAq_YBNbTNN4J7bVg_yCBArSEMqqYOadlfG5POMwnnTIzHAFjn36UDJg&amp;__tn__=%2ANK-R\">#ThếHệViệtNăngĐộng</a><br />\r\n----------------------------------<br />\r\n📜Xem sản phẩm tại:</p>\r\n\r\n<p>1. Shopee:&nbsp;<a href=\"https://bit.ly/2PdaEF9?fbclid=IwAR2zzrzdZ67CmKK9QV4jPc5BOUkQgBkqvguulVJDVahMxiRct5OylynbeiU\" target=\"_blank\">https://bit.ly/2PdaEF9</a><br />\r\n2. Lazada:&nbsp;<a href=\"https://bit.ly/2NmhuEf?fbclid=IwAR3HDEyXS5zvq1HC6R1vVFqlJqTHnFoZ6j4pniHCfHocQ79va48OI7HgDm8\" target=\"_blank\">https://bit.ly/2NmhuEf</a><br />\r\n3. Tiki:&nbsp;<a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2vuCEZf%3Ffbclid%3DIwAR1iAk-RaSPWkeUFI3BdhMo2RRiwR144mMTgnyNK4TheeXUzWTvkhrn8N4M&amp;h=AT0WcVityLlakb5Y1SoWZGpo1BSWSaDcrHUPFaIts10yqA3S4h0lZvSi5l6geF1jlwO2JmL4NNsoJVIQyjsMo1u1dDXhV69iBi7TIzBjUYj80EW04x6uDwkCtQ-rA21TREgFzZjsFOyXBlp765NL8MSAPUqHby8j_I6kvfLFVwEEJZV70iVSbyh3yDQgtDQylPJaUkmOdIhHnd-3O4YsTe0Gu_rs9drhrq-jlZtozHUNRJVoZcHpS7hjCQg8UVTZOvjFc2mcVX0cyZhFhVha5Qgh5Actt3LPmrogsQeo8hNwHa0Ybupac6QUdY2dPfhFK-ox00V2QxLVtjrcaOa7CODYKLevZI1P2FYHOkH1PDIwOdTjlanKzPE2F1GkCwoBa8jta-HR57aBqwQ-2PldjoCjSV2km2wFMq4mzKy4CPkmvjWsN9rTPAteyIOjLzK3Y08Ws-USp9URRmZEZK28LDN6dUJVkScaTamdE82_t6TS5KBI2WBt3f4m7hKfq3v5eQP7VPE2xcowUVTW-npXflt9q5aF74EVtaLQEgBOkbJngy3S325Tvzqk-DzRHn5mMKF7TfulaU0WtVBMCC0jGC7u6zaQ1w8kiw8mXBnfJbuYyWsqm1aaJS-ejjmJYew\" target=\"_blank\">https://bit.ly/2vuCEZf</a><br />\r\n4. Shop Vnexpress:&nbsp;<a href=\"https://bit.ly/2AwA0aW?fbclid=IwAR0GlBoDgHhC07wByr0Fv9BtoEyuQMY4HEAVcuka4s4-ah4pCXYr7x1J3ro\" target=\"_blank\">https://bit.ly/2AwA0aW</a><br />\r\n5. AĐ&acirc;yRồi:&nbsp;<a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2q4sV9v%3Ffbclid%3DIwAR0txVPj0NiVYczObmAd6lM02h_Em26dqG2RmpjyEB9paQjbxRd-4kERas4&amp;h=AT3vamrRohtkbuPfjlbtYHVBBbCpLYmn-3kd-LJtQyRv6V3lilJinEG5DnlAj1O7QBkhmhjHNCX73CY6k7EdWYm1Z5Rgpyw3uVR3n5CbEasCQ0otLmOKphERRYJcXpP1KP_cKEEF-So9rGJzpicByNtAj02vL0VpDqeomnKkPoRkRSBXQZcDYR-7kwgqZzNTCrJMvyzmij7bgz452XIax6qxA_ThxteNz4aoQTgeSOD0yQLDEwE0l9Vr-uN8K_ny3Yf31LbnwMfCO8AIvA-zqNSD156bH5W99AymRFJq7eJ6wRnu08uB2FTT7pVtG0t8D3bAH6_LPXhOTVIRldu-U-rJPtxt5dIqj29PPVr3NOYqSBGzGQIRfbWGVrErFC6jIocaa2XQJdpInHiMIWiUJfRdUygti-MR_yjvqIwb94OP2iLCRx3Zq0OrBgZgJCAi9FPOlrxWcMS9TT-srjD0FNT1PSXzoVST5OlP1YD2DRvA-PLuwzfNCuQjMtBURj8TTcwMDWYjeKOKC37nbNkt2CNWovspTNjqnLLivBp_Grllgl8YNXmi6HscMaOzSALqC11Ihh2rNxrQ-J2KwJRmEtIZnKN-PA_2GypGdO_7Hyj5_AAlA2Xz0gu5UbSWEi8\" target=\"_blank\">https://bit.ly/2q4sV9v</a><br />\r\n6. Sendo:&nbsp;<a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2zsWSVT%3Ffbclid%3DIwAR1k8evYAqi_cx08v7kFWJEX9nT71D48zeHET-OJHvRnCg6DnaxATxPk2rk&amp;h=AT2tonjX50BkandE2y8KalvcutesQmPd08aeBJBxOOIbw5T1c0_GXEIECudQatz0Kqrj4-UwHX9l0ve_WPvIh0ByvPujcMA8-rzBq6oafr57GxEaMaoEdGJSKuQStchH0HWIE-a91kfObFwWZN9k27xnlJmZJAdPOXfu02XkUmk8KB87bTJffsHvKXvjs0gMJCLZqGTZSeCU73zpe15qLAuiYfDNEQwqvocIgJZeijIv1_kxp_HOUQbOdfi981K90aCJ4RXqnxESBNMffPOfr4jO0_GOlkKd0DbGjpdRkAaTNNj5dTrYlsrAmS0mxlhwNnmLPGpqvi1pVFk0hFlT6VRYjjrQNYM07Z-Ej-0ChqX1vTOYh9bQP3jsuVIVEZuuryPAdbWik8OIWbgKSjX7CMu6SPh6V4tvr9mpC6myH2_jRFELH2JhidnlOflcsxwLDkRUAWt0RngizQdgoXBY5ORKaC0OFqygwYo6xEcgYpFbo8fpM6KiSWmcCRG2XGy9p1Wjo6WlEPt7KN_ioDD3ByzhzIcSFCpAIarhtCtKGoP1WPHJ6ZVcMaE5RrD0z3RDkmxVyXXjZer6DpxRGNc-IczvLM-aLBXT9AThuD1rH2bV-P0EG0jrDLMCa2qELVo\" target=\"_blank\">https://bit.ly/2zsWSVT</a></p>\r\n\r\n<p>Facebook :&nbsp;<a href=\"https://www.facebook.com/Vikensportsvn/\">https://www.facebook.com/Vikensportsvn/</a></p>\r\n\r\n<p>🌎&nbsp;Website:&nbsp;<a href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fvikensports.com.vn%2F%3Ffbclid%3DIwAR3soxGbkhDygkf-JpPpJuxNKi5rWyTg_R_ESfl0bgOjOAA67O-lpW5wPkk&amp;h=AT0Nt6w-J5Ew4MkXqC1WC9gBSJcOHtnp4as7IciOHGemu9QfOrlz3UGINSQHLnsCKjzYDZnWH6Ql2K7EE1OYPMfwYk8oqu6oNQ1ZErIIcV0N-ZumznKPvTdn0UZwLtHLt_AqZOueRpqyICt9B_8s_kHtSe5QWB2qZ1ymfYHMW1AejqPaRE_pE9LYBVwPn5YMvRBAnQAl0RatG-BYa0fbkoSerJmJwmsVcapAvSjDYA052WG__4PpxoT9BsVoHVOzppfsFFrey8bvqXsJXPFkV2yuKleTqiTFDZLuXB18J0ElrE7oNwkN2wZhZncjix1_aNjRxMwtYJ5pWkuv1hX00wsAc9H961jsG13gaBCMKLSSVpW9sc4kgPu5HwOBvudH8gx75zaPpWyvrjxnHOF5nAycD6F3edc5rgZaTMNNONXnchAfHAwvy00k3cvJFx-50QzrWchpV0uY1fgvpni-DtV0ahvxaMLw5LcdveN5zwKDs-WsfzKgw8HJGzZkxpi2HUFEbz92MsuG2qGpV6sFoptJSA7fmbyM62fpm2qVmEwz9JxJa9fEUygjreZzpDpwbtrl5P0qAz1vs13tRIj8Y-a02VzLPWobC1Hno_w_4VWgDUTpAH1y7y34zZjxvhs\" target=\"_blank\">http://vikensports.com.vn</a><br />\r\n☎️&nbsp;Hotline tư vấn v&agrave; hỗ trợ đặt h&agrave;ng: 028 7107 7868<br />\r\n📩&nbsp;Hotline g&oacute;p &yacute; sản phẩm:&nbsp;<a href=\"https://m.me/Vikensportsvn?fbclid=IwAR21pWnKrwGM6MBhSeeD3gpK5atQSzaY4qodTDZrxXOWJ3jpoUaw7QOOuTQ\" target=\"_blank\">m.me/Vikensportsvn</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;&gt; GI&Agrave;Y THỂ THAO MỸ VIKEN - CHO MỘT THẾ HỆ VIỆT NĂNG ĐỘNG&lt;&lt;</p>\r\n\r\n<p><a href=\"https://www.facebook.com/Vikensportsvn/photos/a.193870551258333/281911422454245/?type=3&amp;eid=ARDQ9NqWOOLyLG9Bvi9ZPyH_TxahqMMyhyFoVfYD_ZSHehsEJYg6v6YyghRluEkFsPbDjcQxyFv1tpP3&amp;__xts__%5B0%5D=68.ARD5rfprAaOfsYnhCJtCJJM4b4uC25sClCu6BEju_BvJDfNxadumetH859A3yLRCjcJVt2KkVolVvPvuLmtwWq4HYLxMIqkr0-Oka4szaDgfFjuMaHm33iMQWPhTobdVOIF3o87wTJ_9SQoCi1RYfCO2AboSeVL7WoTlnLgkYbezw2Rf864Dx91ulIOOHR9iN_vXCfscVL0f4minJimW4PhZl7xSv21MK8E_Qz3awsKQq8gK3HOppJ6jSwTD9pMBI8fOsuwYjBfVh4pgQi1HKqyhVLvP49_cAq_YBNbTNN4J7bVg_yCBArSEMqqYOadlfG5POMwnnTIzHAFjn36UDJg&amp;__tn__=EHH-R\"><img alt=\"Trong hình ảnh có thể có: giày và văn bản\" src=\"https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/s720x720/46890440_281911425787578_5638639662705672192_o.jpg?_nc_cat=107&amp;_nc_ht=scontent.fsgn2-1.fna&amp;oh=5ecdd1e55dd7073655c9cb401cfc9c7b&amp;oe=5CA3F681\" style=\"height:473px; width:474px\" /></a></p>', 0, '/uploads/images/medias/46522569_281911429120911_26755271137165312_n.jpg', 'MEGA SALE ALL ,Khuyến mãi giày Viken', '2018-11-28 17:00:00', NULL, 'Khuyến mãi Viken', NULL, NULL, '2019-11-27 01:53:07', '2018-11-29 03:51:01', '2019-11-27 01:53:07'),
(18, 'VIETNAM EXPO IN HOCHIMINH CITY 2018', 'vietnam-expo-in-hochiminh-city-2018', NULL, 0, 4, 1, NULL, '<p style=\"text-align: center;\"><span style=\"font-size:26px\">VIETNAM EXPO IN HOCHIMINH CITY 2018</span></p>\r\n\r\n<p style=\"text-align: center;\"><span style=\"font-size:20px\">🎁🎁🎁</span>&nbsp;Viken Sports th&acirc;n mời Q&uacute;i Fan &amp; Q&uacute;i kh&aacute;ch h&agrave;ng đến tham quan gian h&agrave;ng B116 khu A2 trưng b&agrave;y gi&agrave;y thể thao mỹ VIKEN SPORTS. Nhiều chương tr&igrave;nh khuyến m&atilde;i đặc biệt đang chờ Q&uacute;i Fan &amp; Q&uacute;i kh&aacute;ch h&agrave;ng chỉ c&oacute; tại đ&acirc;y trong &iacute;t ng&agrave;y triễn l&atilde;m diễn ra:</p>\r\n\r\n<p style=\"text-align: center;\"><span style=\"font-size:20px\">🏃&zwj;♀️🏃&zwj;♂️🏃&zwj;♀️VIETNAM EXPO IN HOCHIMINH CITY 2018🏃&zwj;♂️🏃&zwj;♀️🏃&zwj;♂️</span><br />\r\nThời gian: 5-8/12/2018.&nbsp;<br />\r\nTại trung t&acirc;m Triển l&atilde;m v&agrave; Hội nghị S&agrave;i G&ograve;n (SECC)<br />\r\n799 Nguyễn Văn Linh, Phường T&acirc;n Ph&uacute;, Q.7, TP. Hồ Ch&iacute; Minh.</p>\r\n\r\n<p style=\"text-align: center;\">Tr&acirc;n trọng k&iacute;nh mời.</p>\r\n\r\n<p style=\"text-align: center;\"><a href=\"https://www.facebook.com/hashtag/viken?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCXMOVH39pSA3MghjsjYp8V3MHNZG_3PdagQEbO-_SqBIGGpUWwDuUT6_4xoB4srBPtrITpgxokO-bxhMDPLsHO-qVBRrxq574yKsjRy3ni0RwgleEeX6SgY1e2-5rnUnHV7g9Rsx-GOboXG1IOhQckBt38svADqCuGvr2l381SxtYUH0ivSAt_m3PDFsvpNGsmASQp4qT8maUqt5GqKOCG-549jNWnMM-HJqibVvF64_AttjC86TSy5kHnC9TEztS-4NQZy82X3W3Haj_98utOn39Xi4jaHJgeB6F1SXJQdO_34OOO5pgHALgEf_dAxuo&amp;__tn__=%2ANK-R-R-R\">#Viken</a>&nbsp;<a href=\"https://www.facebook.com/hashtag/vikenshoes?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCXMOVH39pSA3MghjsjYp8V3MHNZG_3PdagQEbO-_SqBIGGpUWwDuUT6_4xoB4srBPtrITpgxokO-bxhMDPLsHO-qVBRrxq574yKsjRy3ni0RwgleEeX6SgY1e2-5rnUnHV7g9Rsx-GOboXG1IOhQckBt38svADqCuGvr2l381SxtYUH0ivSAt_m3PDFsvpNGsmASQp4qT8maUqt5GqKOCG-549jNWnMM-HJqibVvF64_AttjC86TSy5kHnC9TEztS-4NQZy82X3W3Haj_98utOn39Xi4jaHJgeB6F1SXJQdO_34OOO5pgHALgEf_dAxuo&amp;__tn__=%2ANK-R-R-R\">#Vikenshoes</a>&nbsp;<a href=\"https://www.facebook.com/hashtag/th%E1%BA%BFh%E1%BB%87vi%E1%BB%87tn%C4%83ng%C4%91%E1%BB%99ng?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARCXMOVH39pSA3MghjsjYp8V3MHNZG_3PdagQEbO-_SqBIGGpUWwDuUT6_4xoB4srBPtrITpgxokO-bxhMDPLsHO-qVBRrxq574yKsjRy3ni0RwgleEeX6SgY1e2-5rnUnHV7g9Rsx-GOboXG1IOhQckBt38svADqCuGvr2l381SxtYUH0ivSAt_m3PDFsvpNGsmASQp4qT8maUqt5GqKOCG-549jNWnMM-HJqibVvF64_AttjC86TSy5kHnC9TEztS-4NQZy82X3W3Haj_98utOn39Xi4jaHJgeB6F1SXJQdO_34OOO5pgHALgEf_dAxuo&amp;__tn__=%2ANK-R-R-R\">#ThếHệViệtNăngĐộng</a></p>\r\n\r\n<p style=\"text-align: center;\"><a href=\"https://www.facebook.com/Vikensportsvn/photos/a.193870551258333/284802375498483/?type=3&amp;eid=ARD1jHiZo-yOZQYChjNfZYHsJ5g0iurOkq0TfcPbv9FzGaJ4IWR1wXO2uKvyUwspLd0YQ9mPlR7gtLTY&amp;__xts__%5B0%5D=68.ARCXMOVH39pSA3MghjsjYp8V3MHNZG_3PdagQEbO-_SqBIGGpUWwDuUT6_4xoB4srBPtrITpgxokO-bxhMDPLsHO-qVBRrxq574yKsjRy3ni0RwgleEeX6SgY1e2-5rnUnHV7g9Rsx-GOboXG1IOhQckBt38svADqCuGvr2l381SxtYUH0ivSAt_m3PDFsvpNGsmASQp4qT8maUqt5GqKOCG-549jNWnMM-HJqibVvF64_AttjC86TSy5kHnC9TEztS-4NQZy82X3W3Haj_98utOn39Xi4jaHJgeB6F1SXJQdO_34OOO5pgHALgEf_dAxuo&amp;__tn__=EEHH-R-R-R\"><img alt=\"Trong hình ảnh có thể có: văn bản\" src=\"https://scontent.fsgn6-1.fna.fbcdn.net/v/t1.0-9/p843x403/47005831_284802382165149_6550904005004886016_o.jpg?_nc_cat=103&amp;_nc_oc=AWOmI4JTOTlD5Ocal4N61NPO_YgtsFFv1qrmI45aKDqfTDdxKZtj-3wC4Pn19A&amp;_nc_ht=scontent.fsgn6-1.fna&amp;oh=cc1971e819f7a5d9591ac68c8a660080&amp;oe=5C64D9C1\" style=\"height:500px; width:500px\" /></a></p>', 0, '/uploads/images/medias/%5BFB%5D_H%E1%BB%98I%20CH%E1%BB%A2%20H%C3%80%20N%E1%BB%98I-02.jpg', 'VIETNAM EXPO IN HOCHIMINH CITY 2018', '2018-12-03 17:00:00', NULL, NULL, NULL, NULL, '2019-11-27 01:53:03', '2018-12-04 16:29:20', '2019-11-27 01:53:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Menu đệ qui nếu có',
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT 'Sắp xếp danh mục theo thứ tự',
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 Disable , 1 Enable, 2 Pending',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyworks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `author_id`, `image`, `status`, `meta_title`, `meta_keyworks`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'Tin tuyển dụng', 'tin-tuyen-dung', 0, 0, 4, NULL, 1, 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)', 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)', 'Tin tuyển dụng', '2019-11-27 01:52:55', '2018-04-12 07:23:36', '2019-11-27 01:52:55'),
(15, 'Tin tức', 'tin-tuc', 0, 0, NULL, NULL, 1, NULL, NULL, 'Tin tức', '2019-11-27 01:52:52', '2018-06-02 04:45:40', '2019-11-27 01:52:52'),
(19, 'Tin nổi bật', 'tin-noi-bat', 0, 0, NULL, NULL, 1, NULL, NULL, NULL, '2019-11-27 01:52:49', '2018-06-26 03:50:06', '2019-11-27 01:52:49'),
(20, 'SaleOff', 'khuyen-mai', 0, 0, NULL, NULL, 1, NULL, NULL, NULL, '2019-11-27 01:52:01', '2018-07-30 07:00:24', '2019-11-27 01:52:01'),
(24, 'Sự kiện', 'su-kien', 0, 0, NULL, NULL, 1, NULL, NULL, NULL, '2019-11-27 01:51:56', '2018-08-22 01:04:46', '2019-11-27 01:51:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(57, 9, 11, NULL, NULL),
(80, 8, 23, NULL, NULL),
(81, 7, 24, NULL, NULL),
(82, 6, 25, NULL, NULL),
(85, 11, 15, NULL, NULL),
(86, 11, 16, NULL, NULL),
(87, 10, 12, NULL, NULL),
(88, 10, 13, NULL, NULL),
(89, 10, 14, NULL, NULL),
(90, 5, 22, NULL, NULL),
(91, 4, 21, NULL, NULL),
(92, 2, 20, NULL, NULL),
(93, 15, 26, NULL, NULL),
(94, 16, 27, NULL, NULL),
(107, 17, 28, NULL, NULL),
(108, 17, 27, NULL, NULL),
(109, 18, 29, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `product_producer_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `multipleImage` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `sku` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantee` int(11) DEFAULT NULL COMMENT 'Đơn vị SL/Tháng',
  `quantity` int(11) NOT NULL DEFAULT '0' COMMENT 'Số lượng sản phẩm nhập hàng',
  `intro` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `specifications` longtext COLLATE utf8mb4_unicode_ci,
  `view` int(11) NOT NULL DEFAULT '0',
  `product_tag` text COLLATE utf8mb4_unicode_ci,
  `type` int(11) DEFAULT NULL COMMENT '1 SP Bán chạy, 2 SP nổi bật, 3 SP mới',
  `status` int(11) NOT NULL DEFAULT '1',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_detail` longtext COLLATE utf8mb4_unicode_ci,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_barcode` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_tax` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `product_min_stock` int(11) DEFAULT NULL,
  `product_max_stock` int(11) DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_exchange` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_exchange_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attribute_mapping`
--

CREATE TABLE `product_attribute_mapping` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_attribute_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_price` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `attribute_price_sale` int(11) NOT NULL DEFAULT '0',
  `attribute_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_sku` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_attribute_json` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_billing_orders`
--

CREATE TABLE `product_billing_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_billing_order_details`
--

CREATE TABLE `product_billing_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_by` int(11) NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_code_discounts`
--

CREATE TABLE `product_code_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `number_use` int(11) NOT NULL DEFAULT '10',
  `number_already_use` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1 Khuyến mãi theo giá, 2 Khuyến mãi theo phần trăm',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `sort_by` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_producers`
--

CREATE TABLE `product_producers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` int(11) NOT NULL DEFAULT '1',
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 Disable , 1 Enable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tag_mapping`
--

CREATE TABLE `product_tag_mapping` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_tag_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

CREATE TABLE `provinces` (
  `id` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `type`) VALUES
('01', 'Hà Nội', 'Thành Phố'),
('02', 'Hà Giang', 'Tỉnh'),
('04', 'Cao Bằng', 'Tỉnh'),
('06', 'Bắc Kạn', 'Tỉnh'),
('08', 'Tuyên Quang', 'Tỉnh'),
('10', 'Lào Cai', 'Tỉnh'),
('11', 'Điện Biên', 'Tỉnh'),
('12', 'Lai Châu', 'Tỉnh'),
('14', 'Sơn La', 'Tỉnh'),
('15', 'Yên Bái', 'Tỉnh'),
('17', 'Hòa Bình', 'Tỉnh'),
('19', 'Thái Nguyên', 'Tỉnh'),
('20', 'Lạng Sơn', 'Tỉnh'),
('22', 'Quảng Ninh', 'Tỉnh'),
('24', 'Bắc Giang', 'Tỉnh'),
('25', 'Phú Thọ', 'Tỉnh'),
('26', 'Vĩnh Phúc', 'Tỉnh'),
('27', 'Bắc Ninh', 'Tỉnh'),
('30', 'Hải Dương', 'Tỉnh'),
('31', 'Hải Phòng', 'Thành Phố'),
('33', 'Hưng Yên', 'Tỉnh'),
('34', 'Thái Bình', 'Tỉnh'),
('35', 'Hà Nam', 'Tỉnh'),
('36', 'Nam Định', 'Tỉnh'),
('37', 'Ninh Bình', 'Tỉnh'),
('38', 'Thanh Hóa', 'Tỉnh'),
('40', 'Nghệ An', 'Tỉnh'),
('42', 'Hà Tĩnh', 'Tỉnh'),
('44', 'Quảng Bình', 'Tỉnh'),
('45', 'Quảng Trị', 'Tỉnh'),
('46', 'Thừa Thiên Huế', 'Tỉnh'),
('48', 'Đà Nẵng', 'Thành Phố'),
('49', 'Quảng Nam', 'Tỉnh'),
('51', 'Quảng Ngãi', 'Tỉnh'),
('52', 'Bình Định', 'Tỉnh'),
('54', 'Phú Yên', 'Tỉnh'),
('56', 'Khánh Hòa', 'Tỉnh'),
('58', 'Ninh Thuận', 'Tỉnh'),
('60', 'Bình Thuận', 'Tỉnh'),
('62', 'Kon Tum', 'Tỉnh'),
('64', 'Gia Lai', 'Tỉnh'),
('66', 'Đắk Lắk', 'Tỉnh'),
('67', 'Đắk Nông', 'Tỉnh'),
('68', 'Lâm Đồng', 'Tỉnh'),
('70', 'Bình Phước', 'Tỉnh'),
('72', 'Tây Ninh', 'Tỉnh'),
('74', 'Bình Dương', 'Tỉnh'),
('75', 'Đồng Nai', 'Tỉnh'),
('77', 'Bà Rịa - Vũng Tàu', 'Tỉnh'),
('79', 'Hồ Chí Minh', 'Thành Phố'),
('80', 'Long An', 'Tỉnh'),
('82', 'Tiền Giang', 'Tỉnh'),
('83', 'Bến Tre', 'Tỉnh'),
('84', 'Trà Vinh', 'Tỉnh'),
('86', 'Vĩnh Long', 'Tỉnh'),
('87', 'Đồng Tháp', 'Tỉnh'),
('89', 'An Giang', 'Tỉnh'),
('91', 'Kiên Giang', 'Tỉnh'),
('92', 'Cần Thơ', 'Thành Phố'),
('93', 'Hậu Giang', 'Tỉnh'),
('94', 'Sóc Trăng', 'Tỉnh'),
('95', 'Bạc Liêu', 'Tỉnh'),
('96', 'Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Admin', 'Quản lý toàn bộ CMS', '2018-06-19 10:04:57', '2018-06-19 10:04:57'),
(2, 'Cộng tác viên đăng bài', 'Cộng tác viên đăng bài', 'Cộng tác viên đăng bài', '2018-06-20 03:26:09', '2018-06-20 03:26:09'),
(3, 'cong tac vien 1', 'cong tac vien 1', 'cong tac vien 1', '2018-11-26 07:27:29', '2019-11-27 01:54:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vn',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'TTSoft', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(2, 'meta_title', 'TTSoft', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(3, 'meta_keywords', 'TTSoft', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(4, 'meta_description', 'TTSoft', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(5, 'text', ' ', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(6, 'cty', 'TTSoft', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(7, 'phone', '###', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(8, 'fax', '###', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(9, 'address', '###', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(10, 'email', '###', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(11, 'maps', ' ', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(12, 'facebook', 'https://facebook.com', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(13, 'google_plus', ' ', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(14, 'twitter', ' ', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(15, 'youtube', ' ', 'vn', '2018-06-09 04:15:14', '2019-11-26 09:25:42'),
(16, 'logo', './uploads/images/settings/logo2018-10-22.png', 'vn', '2018-06-09 04:15:14', '2018-09-24 06:52:03'),
(17, 'fav', './uploads/images/settings/logo2018-10-22.png', 'vn', '2018-06-15 06:05:50', '2018-09-24 06:52:35'),
(18, 'lang', 'vn', 'vn', '2018-11-04 09:03:36', '2019-11-26 09:25:42'),
(19, 'site_name', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(20, 'meta_title', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(21, 'meta_keywords', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(22, 'meta_description', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(23, 'text', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(24, 'cty', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(25, 'phone', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(26, 'fax', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(27, 'address', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(28, 'email', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(29, 'maps', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(30, 'facebook', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(31, 'google_plus', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(32, 'twitter', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(33, 'youtube', ' ', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(34, 'lang', 'en', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32'),
(35, 'logo', './uploads/images/settings/logo2018-11-23.png', 'en', '2018-11-23 03:25:32', '2018-11-23 03:25:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `URL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staffs`
--

CREATE TABLE `staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `education` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `tax_code` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staffs_in_out`
--

CREATE TABLE `staffs_in_out` (
  `id` int(10) UNSIGNED NOT NULL,
  `staffs_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 Disable , 1 Enable',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tham_so_du_toan`
--

CREATE TABLE `tham_so_du_toan` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1 TSC, 2 HSMN, 3 HSMTN, 4 HSGNMN, 5 HSMDHT',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `locale_id` int(10) UNSIGNED NOT NULL,
  `translation_id` int(10) UNSIGNED DEFAULT NULL,
  `translation` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `prefers_sms` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `first_login` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `birth_date`, `prefers_sms`, `last_login`, `first_login`, `address`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$ZP1EP4Ju6qeKq51AYWciluVXxHx93jC4LIuHbriZzQd.pLEo/D64W', NULL, NULL, 0, NULL, NULL, NULL, NULL, 'WmvPiFypGVeXMkGvGLqIMHvQ1iMQQilRoTTwfGDRcA2mR0v9eDw9L5CwjJuE', '2018-06-20 04:52:25', '2018-06-20 04:53:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `branch_hct`
--
ALTER TABLE `branch_hct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post_category_id_foreign` (`category_id`),
  ADD KEY `category_post_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `content_lang_fields`
--
ALTER TABLE `content_lang_fields`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_address_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discounts_course_id_foreign` (`course_id`),
  ADD KEY `discounts_course_class_id_foreign` (`course_class_id`);

--
-- Chỉ mục cho bảng `doc_details`
--
ALTER TABLE `doc_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_details_doc_headers_id_foreign` (`doc_headers_id`);

--
-- Chỉ mục cho bảng `doc_headers`
--
ALTER TABLE `doc_headers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoa_hong_san_pham`
--
ALTER TABLE `hoa_hong_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `homes_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locales_code_unique` (`code`);

--
-- Chỉ mục cho bảng `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medias_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_categories_identify_unique` (`identify`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_author_id_foreign` (`author_id`);

--
-- Chỉ mục cho bảng `password_customer_resets`
--
ALTER TABLE `password_customer_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_admin_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `permission_group`
--
ALTER TABLE `permission_group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `phan_bo_doanh_so`
--
ALTER TABLE `phan_bo_doanh_so`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_author_id_foreign` (`author_id`);

--
-- Chỉ mục cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_author_id_foreign` (`author_id`);

--
-- Chỉ mục cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`),
  ADD KEY `products_product_producer_id_foreign` (`product_producer_id`);

--
-- Chỉ mục cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_attributes_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `product_attribute_mapping`
--
ALTER TABLE `product_attribute_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_mapping_product_attribute_id_foreign` (`product_attribute_id`),
  ADD KEY `product_attribute_mapping_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_billing_orders`
--
ALTER TABLE `product_billing_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_billing_order_details`
--
ALTER TABLE `product_billing_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `product_code_discounts`
--
ALTER TABLE `product_code_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_producers`
--
ALTER TABLE `product_producers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_producers_slug_unique` (`slug`),
  ADD UNIQUE KEY `product_producers_url_unique` (`url`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tag_mapping`
--
ALTER TABLE `product_tag_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tag_mapping_product_tag_id_foreign` (`product_tag_id`),
  ADD KEY `product_tag_mapping_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `staffs_in_out`
--
ALTER TABLE `staffs_in_out`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tham_so_du_toan`
--
ALTER TABLE `tham_so_du_toan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_locale_id_foreign` (`locale_id`),
  ADD KEY `translations_translation_id_foreign` (`translation_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `branch_hct`
--
ALTER TABLE `branch_hct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `content_lang_fields`
--
ALTER TABLE `content_lang_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `doc_details`
--
ALTER TABLE `doc_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `doc_headers`
--
ALTER TABLE `doc_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoa_hong_san_pham`
--
ALTER TABLE `hoa_hong_san_pham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `password_customer_resets`
--
ALTER TABLE `password_customer_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT cho bảng `permission_group`
--
ALTER TABLE `permission_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `phan_bo_doanh_so`
--
ALTER TABLE `phan_bo_doanh_so`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_attribute_mapping`
--
ALTER TABLE `product_attribute_mapping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_billing_orders`
--
ALTER TABLE `product_billing_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_billing_order_details`
--
ALTER TABLE `product_billing_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_code_discounts`
--
ALTER TABLE `product_code_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_producers`
--
ALTER TABLE `product_producers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_tag_mapping`
--
ALTER TABLE `product_tag_mapping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `staffs_in_out`
--
ALTER TABLE `staffs_in_out`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tham_so_du_toan`
--
ALTER TABLE `tham_so_du_toan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
