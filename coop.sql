-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2021 lúc 03:14 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bonphans`
--

CREATE TABLE `bonphans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_diary` int(10) UNSIGNED NOT NULL,
  `ngaybon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaiphan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luongbon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_gdsts`
--

CREATE TABLE `detail_gdsts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_diary` int(10) UNSIGNED NOT NULL,
  `id_gdst` int(10) UNSIGNED NOT NULL,
  `time_st` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_warehouses`
--

CREATE TABLE `detail_warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `qty_opening_stock` int(11) NOT NULL,
  `qty_import_warehouse` int(11) NOT NULL,
  `qty_export_warehouse` int(11) NOT NULL,
  `inventory_warehouse` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_warehouses`
--

INSERT INTO `detail_warehouses` (`id`, `id_product`, `qty_opening_stock`, `qty_import_warehouse`, `qty_export_warehouse`, `inventory_warehouse`, `created_at`, `updated_at`) VALUES
(1, 11, 10, 0, 0, 10, '2021-10-29 07:44:31', '2021-10-29 09:02:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `farmer_diarys`
--

CREATE TABLE `farmer_diarys` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_technique` int(10) UNSIGNED NOT NULL,
  `name_diary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_diary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_diary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dientich_diary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_DIARY` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `farmer_diarys`
--

INSERT INTO `farmer_diarys` (`id`, `id_user`, `id_product`, `id_technique`, `name_diary`, `address_diary`, `phone_diary`, `dientich_diary`, `qty_DIARY`, `created_at`, `updated_at`) VALUES
(3, 3, 12, 2, 'Mô hình trồng Mận an phước', 'cần thơ', '0939337416', '1000', '5000', '2021-10-07 03:07:04', '2021-10-07 03:07:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gdsts`
--

CREATE TABLE `gdsts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_gdst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_gdst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gdsts`
--

INSERT INTO `gdsts` (`id`, `name_gdst`, `description_gdst`, `created_at`, `updated_at`) VALUES
(2, 'đồng đồng', 'không có', '2021-09-25 23:31:27', '2021-10-22 06:30:03'),
(3, 'Gieo hạt', 'Giai đoạn gieo hạt', '2021-09-30 05:30:20', '2021-09-30 05:30:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_09_11_180629_create_positions_table', 1),
(5, '2021_09_11_180729_create_role_accesss_table', 1),
(6, '2021_09_11_181332_create_order_caterogys_table', 1),
(7, '2021_09_11_181853_create_product_caterogys_table', 1),
(8, '2021_09_11_181917_create_units_table', 1),
(9, '2021_09_11_181931_create_warehouses_table', 1),
(10, '2021_09_11_182907_create_users_table', 1),
(11, '2021_09_11_183120_create_orders_table', 1),
(12, '2021_09_11_183208_create_products_table', 1),
(13, '2021_09_11_183224_create_order_details_table', 1),
(14, '2021_09_11_183324_create_detail_warehouses_table', 1),
(15, '2021_09_25_220708_create_techniques_table', 1),
(16, '2021_09_25_220952_create_gdsts_table', 1),
(17, '2021_09_25_221443_create_farmer_diarys_table', 1),
(18, '2021_09_25_225455_create_farmer_detail_gdsts_table', 1),
(19, '2021_09_25_225733_create_farmer_phunthuocs_table', 1),
(20, '2021_09_25_225947_create_farmer_bonphans_table', 1),
(21, '2021_09_25_230157_create_tdsbs_table', 1),
(22, '2021_09_25_230315_create_thuhoachs_table', 1),
(23, '2021_10_29_105237_create_table_detail_warehouses_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_cate_order` int(10) UNSIGNED NOT NULL,
  `status_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_checkout` int(11) DEFAULT NULL,
  `discount_order` int(11) NOT NULL,
  `total_price_order` bigint(20) NOT NULL,
  `note_order` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `id_cate_order`, `status_order`, `status_checkout`, `discount_order`, `total_price_order`, `note_order`, `created_at`, `updated_at`) VALUES
(3, 5, 1, '2', 1, 0, 20000, 'Ghi chú trống', '2021-10-16 19:16:55', '2021-10-19 21:45:25'),
(5, 5, 1, '2', 1, 0, 45000, 'Ghi chú trống', '2021-10-16 19:20:59', '2021-10-19 22:30:48'),
(6, 5, 1, '-1', 0, 0, 45000, 'Ghi chú trống', '2021-10-16 19:21:35', '2021-10-19 22:30:53'),
(7, 5, 1, '1', 0, 0, 45000, 'Ghi chú trống', '2021-10-16 19:21:53', '2021-10-19 22:36:11'),
(8, 5, 1, '1', 0, 0, 45000, 'Ghi chú trống', '2021-10-16 19:22:30', '2021-10-19 22:37:40'),
(9, 5, 1, '0', 1, 0, 51250, 'DATHANHTOANVNPAY', '2021-10-16 19:41:38', '2021-10-16 19:41:38'),
(10, 5, 1, '0', 1, 0, 51250, 'DATHANHTOANVNPAY', '2021-10-16 19:42:47', '2021-10-16 19:42:47'),
(11, 5, 1, '0', 0, 0, 45000, 'Ghi chú trống', '2021-10-16 19:43:20', '2021-10-16 19:43:20'),
(12, 5, 1, '0', 1, 0, 126550, 'DATHANHTOANVNPAY', '2021-10-16 20:12:07', '2021-10-16 20:12:07'),
(13, 3, 1, '-1', 2, 0, 45000, 'DATHANHTOANVNPAY', '2021-10-17 03:24:21', '2021-10-28 03:00:28'),
(27, 3, 1, '0', 1, 0, 2047500, 'DATHANHTOANVNPAY', '2021-10-18 07:52:24', '2021-10-18 07:52:24'),
(28, 3, 1, '2', 1, 0, 14400000, 'DATHANHTOANVNPAY', '2021-10-19 18:52:36', '2021-10-28 06:54:40'),
(29, 3, 1, '-1', 0, 0, 67500, 'Ghi chú trống', '2021-10-27 00:10:54', '2021-10-28 03:00:38'),
(31, 9, 1, '-1', 0, 0, 42000, 'Ghi chú trống', '2021-10-27 05:05:05', '2021-10-27 23:18:12'),
(32, 9, 1, '-1', 2, 0, 36000, 'DATHANHTOANVNPAY', '2021-10-27 20:13:37', '2021-10-27 20:13:37'),
(34, 9, 1, '2', 1, 0, 29400, 'DATHANHTOANVNPAY', '2021-10-27 20:17:36', '2021-10-27 20:17:36'),
(35, 9, 1, '0', NULL, 0, 2047500, 'Ghi chú trống', '2021-10-28 09:05:30', '2021-10-28 09:05:30'),
(36, 3, 1, '0', NULL, 0, 29400, 'Ghi chú trống', '2021-10-28 20:07:41', '2021-10-28 20:07:41'),
(37, 3, 1, '0', 1, 0, 40000, 'DATHANHTOANVNPAY', '2021-10-29 21:46:59', '2021-10-29 21:46:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_caterogys`
--

CREATE TABLE `order_caterogys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_cate_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_cate_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_caterogys`
--

INSERT INTO `order_caterogys` (`id`, `name_cate_order`, `description_cate_order`, `created_at`, `updated_at`) VALUES
(1, 'Hóa đơn xuất', 'Dùng cho hoạt động bán hàng', '2021-10-02 07:15:13', '2021-10-18 20:43:17'),
(2, 'Hóa đơn nhập hàng', 'Dùng cho hoạt động nhập hàng', '2021-10-16 03:44:59', '2021-10-19 10:14:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quality_order` int(11) NOT NULL,
  `unit_price_order` bigint(20) NOT NULL,
  `discount_order_detail` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_product`, `quality_order`, `unit_price_order`, `discount_order_detail`, `created_at`, `updated_at`) VALUES
(4, 3, 31, 1, 20000, 0, '2021-10-16 19:16:56', '2021-10-16 19:16:56'),
(6, 5, 16, 1, 45000, 0, '2021-10-16 19:21:00', '2021-10-16 19:21:00'),
(7, 6, 16, 1, 45000, 0, '2021-10-16 19:21:35', '2021-10-16 19:21:35'),
(8, 7, 16, 1, 45000, 0, '2021-10-16 19:21:53', '2021-10-16 19:21:53'),
(9, 8, 16, 1, 45000, 0, '2021-10-16 19:22:30', '2021-10-16 19:22:30'),
(10, 9, 17, 1, 14700, 0, '2021-10-16 19:41:38', '2021-10-16 19:41:38'),
(11, 9, 14, 1, 36550, 0, '2021-10-16 19:41:38', '2021-10-16 19:41:38'),
(12, 10, 17, 1, 14700, 0, '2021-10-16 19:42:47', '2021-10-16 19:42:47'),
(13, 10, 14, 1, 36550, 0, '2021-10-16 19:42:47', '2021-10-16 19:42:47'),
(14, 11, 16, 1, 45000, 0, '2021-10-16 19:43:20', '2021-10-16 19:43:20'),
(15, 12, 16, 2, 90000, 0, '2021-10-16 20:12:07', '2021-10-16 20:12:07'),
(16, 12, 14, 1, 36550, 0, '2021-10-16 20:12:07', '2021-10-16 20:12:07'),
(17, 13, 16, 1, 45000, 0, '2021-10-17 03:24:21', '2021-10-17 03:24:21'),
(30, 27, 18, 20, 22500, 5, '2021-10-18 07:52:24', '2021-10-18 07:52:24'),
(31, 27, 9, 100, 18000, 10, '2021-10-18 07:52:24', '2021-10-18 07:52:24'),
(32, 28, 9, 1000, 18000, 20, '2021-10-19 18:52:36', '2021-10-19 18:52:36'),
(33, 29, 18, 3, 22500, 0, '2021-10-27 00:10:54', '2021-10-27 00:10:54'),
(35, 31, 31, 1, 20000, 0, '2021-10-27 05:05:05', '2021-10-27 05:05:05'),
(36, 31, 32, 1, 22000, 0, '2021-10-27 05:05:05', '2021-10-27 05:05:05'),
(37, 32, 12, 2, 18000, 0, '2021-10-27 20:13:37', '2021-10-27 20:13:37'),
(39, 34, 17, 2, 14700, 0, '2021-10-27 20:17:36', '2021-10-27 20:17:36'),
(40, 35, 18, 20, 22500, 5, '2021-10-28 09:05:30', '2021-10-28 09:05:30'),
(41, 35, 9, 100, 18000, 10, '2021-10-28 09:05:30', '2021-10-28 09:05:30'),
(42, 36, 17, 2, 14700, 0, '2021-10-28 20:07:41', '2021-10-28 20:07:41'),
(43, 37, 31, 2, 20000, 0, '2021-10-29 21:46:59', '2021-10-29 21:46:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phunthuocs`
--

CREATE TABLE `phunthuocs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_diary` int(10) UNSIGNED NOT NULL,
  `ngayphun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaithuoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luongphun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `positions`
--

INSERT INTO `positions` (`id`, `name_position`, `description_position`, `created_at`, `updated_at`) VALUES
(1, 'giám đốc', 'Quyền giám đốc', NULL, NULL),
(2, 'Thư kí', 'Các công việc của thư kí', '2021-09-15 08:52:12', '2021-09-15 08:52:12'),
(3, 'CEO', 'Quản trị', '2021-10-02 07:15:39', '2021-10-02 07:15:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cate_product` int(10) UNSIGNED NOT NULL,
  `id_unit` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_product` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price_product` bigint(20) NOT NULL,
  `sale_price_product` bigint(20) NOT NULL,
  `sale` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_cate_product`, `id_unit`, `name_product`, `description_product`, `status_product`, `image_product`, `cost_price_product`, `sale_price_product`, `sale`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 'Cam xoàn', '- Cam xoàn là một loại quả đặc sản của miền Tây. Cam Xoàn có ruột vàng, vị ngọt thanh hơn quýt, trái to. Những cây có tuổi từ 3 năm trở lên thường ra quả nhiều và quanh năm. Cam xoàn có tác dụng rất tốt đối với sức khỏe con người. Đặc biệt là trẻ em và phụ nữ có thai. Tác dụng tăng cường hệ miễn dịch, làn da tươi trẻ, mịn màng.', 'Mới thêm', '[\"camxoan.jpg\",\"camxoan01.jpg\"]', 20000, 28000, 0, '2021-09-30 16:03:02', '2021-09-30 16:03:02'),
(9, 1, 1, 'Dưa hấu không hạt', '- Dưa hấu không hạt quả đẹp, tròn trông bắt mắt, trọng lượng trung bình 3 - 5kg/quả.\r\n- Điểm nổi bật là giống dưa này có độ đường cao, thịt quả chắc, màu sắc đỏ, bắt mắt.\r\n- Hơn nữa, một điểm cộng của dưa hấu không hạt là khi ăn không mất công nhằn bỏ hạt, an toàn và tiện lợi đối với người già và trẻ nhỏ nên loại dưa này ngày càng được nhiều người tiêu dùng ưa chuộng.', 'Mới thêm', '[\"duahauxx.jpg\",\"duakh.jpg\"]', 8000, 18000, 0, '2021-09-30 20:28:48', '2021-09-30 20:28:48'),
(10, 1, 1, 'Khoai lang mật', 'Bên ngoài nhìn củ khoai lang mật không đẹp, vỏ xù xì, nhưng ruột khoai đỏ và khi nấu lên khoai sẽ mềm, tứa mật khi ăn và dẻo', 'Tạm hết hàng', '[\"khoailang1.jpg\",\"khoailang2.jpg\"]', 6000, 14000, 0, '2021-09-30 20:32:58', '2021-10-03 08:36:28'),
(11, 1, 1, 'lồng mứt', '- Lòng mức là loại trái cây phổ biến ở miền Nam, có vị ngọt và mùi thơm dịu.\r\n- Màu sắc trái không thay đổi nhiều khi chín. Nên khi chọn quả chín nên cảm nhận từ mùi hương và cảm giác ở tay để xem vỏ mềm hay cứng. Lồng mứt xay sinh tố là thức uống rất ngon.', 'Mới thêm', '[\"longmut.png\",\"longmut1.jpg\"]', 25000, 38000, 0, '2021-09-30 20:34:45', '2021-09-30 20:34:45'),
(12, 1, 1, 'Mận an phước', '- Mận (roi) An Phước hình thuôn, màu đỏ sẫm, một số giống có màu trắng hay hồng. Thịt quả màu trắng bao quanh một hạt lớn.\r\n- Sản phẩm tươi ngon, không chứa chất bảo quản đảm bảo an toàn sức khỏe cho người tiêu dùng.\r\n- Đây là loại quả có năng lượng rất thấp, hàm lượng nước cao và đặc biệt, hàm lượng chất xơ trong roi rất cao. Vì vậy, quả roi được xếp vào nhóm có tác dụng giảm béo rất tốt.\r\n- Hàm lượng chất xơ cao có tác dụng quét các chất béo và đường dư thừa ra khỏi đường tiêu hóa qua bài tiết.', 'Mới thêm', '[\"man2.jpg\",\"man3.jpg\",\"mananphuoc.jpg\"]', 13000, 20000, 10, '2021-09-30 20:36:49', '2021-10-15 19:27:46'),
(13, 1, 1, 'Mãng cầu ta', 'Mãng Cầu Ta có mùi thơm của hoa hồng, vị ngọt lịm, dai dai và giàu dinh dưỡng nên được nhiều người ưa chuộng.\r\n- Với ưu điểm các múi dính chặt vào nhau cả khi chín.\r\n- Dễ vận chuyển vì dù có chạm mạnh trái không bị vỡ ra, vỏ mỏng, có thể bóc ra từng mảng như vỏ quít.\r\n- Với lớp vỏ mỏng, thịt trong màu trắng và rất chắc. Trái có mùi thơm đậm đà và đặc biệt ăn rất ngọt khi chín.\r\n- Lưu ý khi bảo quản:\r\n+ Nên để Mãng Cầu Ta ở nhiệt độ thường để trái có thể chín nhanh hơn.', 'Mới thêm', '[\"mangcauta1.jpg\",\"mangcauta2.jpg\"]', 40000, 50000, 0, '2021-09-30 20:38:31', '2021-09-30 20:38:31'),
(14, 1, 1, 'Nhãn xuồng', 'NHÃN XUỒNG THÁI CƠM VÀNG \r\nCơm của trái nhãn xuồng có màu vàng ngà, giòn và rất ngọt. Khi chín vỏ nhãn có màu vàng da bò. \r\nCông dụng của quả nhãn xuồng đối với sức khỏe :\r\n-Tăng cường vitamin C, giàu chất sắc\r\n-Tăng hiệu quả xương khớp. Mỗi ngày, tiêu thụ 100g nhãn xuồng tươi sẽ cung cấp 19% đồng/ 100g nhãn khô cung cấp tới 90% hàm lượng chất này.\r\n      Giúp tăng nồng độ chất khoáng để tránh loãng xương khi về già.\r\n-Bảo vệ mắt trong vitamin nhóm B, riboflavin là thành phần quan trọng. Nếu như không hấp thụ đầy đủ chất này có thể dẫn đến những nguy cơ rối loạn về mắt, đục thủy tinh thể, quáng gà.\r\n-Giảm stress, nhãn có tác dụng kích thích tim mạch và lá lách hoạt động tốt. Từ đó, giúp cho quá trình lưu thông máu suôn sẻ, cung cấp hiệu ứng làm dịu hệ thần kinh, những mệt mỏi trong cuộc sống.', 'Mới thêm', '[\"nhan1.jpg\",\"nhan2.jpg\",\"nhanxuong.jpg\",\"nhanxuongthai.jpg\"]', 35000, 43000, 15, '2021-09-30 20:40:25', '2021-10-15 19:27:54'),
(15, 1, 1, 'ỏi nữ hoàng', 'Ổi nữ hoàng quả to, xanh, giòn, ăn vào có vị chua ngọt, hạt rất ít.\r\nMột đĩa Ổi Nữ Hoàng kèm chèn muối ớt cay nồng sẽ là sự kết hợp hoàn hảo cho bữa ăn vặt thơm ngon, tốt cho sức khỏe.', 'Mới thêm', '[\"oidailoan.jpg\",\"oinuhoang.jpg\"]', 6000, 15000, 0, '2021-09-30 20:41:22', '2021-09-30 20:41:22'),
(16, 1, 1, 'Quýt đường', '-  Quýt đường là loại quýt có kích thước trung bình từ 150 - 200g/1 trái, trái có dạng hình cầu, vỏ mỏng, màu xanh, khi chín hơi ngả vàng (vàng - xanh). Múi quýt có màu cam và vị ngọt đậm nên nó có tên gọi là Quýt đường.\r\n- Quýt đường dễ trồng, dễ chăm sóc, thích nghi rộng với nhiều loại thổ nhưỡng và khí hậu khác nhau, những năm gần đây giá thu mua cao và ổn định góp phần giúp cho nhiều bà con nông dân làm giàu, cải thiện kinh tế.\r\n- Quýt đường sở hữu hương vị ngọt lịm như chính tên gọi của nó là yếu tố khiến rất đông các quý cô nội trợ chọn loại trái cây này để làm món tráng miệng cho gia đình mình.\r\n- Không chỉ tốt cho sức khỏe, ngăn ngừa nhiều loại bệnh mà quả quýt còn tốt cho da và tóc nữa nhé.', 'Mới thêm', '[\"quytduong.jpg\",\"quytduong1.jpg\"]', 35000, 45000, 0, '2021-09-30 20:42:34', '2021-09-30 20:42:34'),
(17, 1, 1, 'Thanh long', 'Thanh long Cần thơ', 'Mới thêm', '[\"thanhlongruottrang.jpg\"]', 8000, 15000, 2, '2021-10-03 07:09:46', '2021-10-03 07:09:46'),
(18, 1, 1, 'Bòn bon', 'Không có thông tin', 'Mới thêm', '[\"bonbon1.jpg\",\"bonbonthai.jpg\"]', 15000, 25000, 10, '2021-10-03 09:56:50', '2021-10-15 19:28:03'),
(21, 2, 1, 'HÀNH LÁ', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Gos-cooperative', 'Mới thêm', '[\"hanhla.jpg\"]', 20000, 35000, 10, '2021-10-15 05:31:26', '2021-10-15 05:31:26'),
(22, 2, 1, 'MƯỚP', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"muop.png\"]', 15000, 22000, 0, '2021-10-15 18:14:03', '2021-10-15 18:14:03'),
(23, 2, 1, 'CÀ TÍM', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"catim.jpg\"]', 18000, 25000, 0, '2021-10-15 18:15:13', '2021-10-15 18:15:13'),
(24, 2, 1, 'ỚT BÚN', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"oibun.jpg\"]', 55000, 70000, 0, '2021-10-15 18:16:01', '2021-10-15 18:16:01'),
(25, 2, 1, 'BẮP CẢI TRẮNG', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"bapcaitrang.jpg\"]', 28000, 35000, 0, '2021-10-15 18:23:32', '2021-10-15 18:23:32'),
(26, 2, 1, 'BÍ ĐỎ NON', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"BIDO.jpg\"]', 22000, 31000, 0, '2021-10-15 18:25:32', '2021-10-15 18:25:32'),
(27, 2, 1, 'CẢI THÌA', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"caithia.jpg\"]', 20000, 30000, 0, '2021-10-15 18:26:27', '2021-10-15 18:26:27'),
(28, 2, 1, 'ĐẬU QUE', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"dauque.jpg\"]', 20000, 35000, 0, '2021-10-15 18:27:07', '2021-10-15 18:27:07'),
(30, 2, 1, 'ĐẬU BẮP', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"DAUBAP.jpg\"]', 24000, 30000, 0, '2021-10-15 18:29:00', '2021-10-15 18:29:00'),
(31, 2, 1, 'CHANH TƯƠI', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"CHANHTUOI.jpg\"]', 14000, 20000, 0, '2021-10-15 18:29:52', '2021-10-15 18:29:52'),
(32, 2, 1, 'CÀ RỐT', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"CAROT.jpg\"]', 18000, 22000, 0, '2021-10-15 18:30:37', '2021-10-15 18:30:37'),
(33, 2, 1, 'CỦ CẢI TRẮNG', 'Sản phẩm được cung cấp tại hợp tác xã nông nghiệp Goscooperative', 'Mới thêm', '[\"CUCAITRANG.jpg\"]', 13000, 20000, 0, '2021-10-15 19:22:03', '2021-10-15 19:22:03'),
(34, 1, 1, 'MĂNG CỤT BẢO LỘC', 'Sản phẩm được cung cấp bởi GOS-COOPERATIVE', 'Mới thêm', '[\"bonbon.jpg\"]', 20000, 28000, 0, '2021-10-17 11:40:02', '2021-10-17 11:40:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_caterogys`
--

CREATE TABLE `product_caterogys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_cate_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_cate_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_caterogys`
--

INSERT INTO `product_caterogys` (`id`, `name_cate_product`, `description_cate_product`, `created_at`, `updated_at`) VALUES
(1, 'Trái cây', 'Được nhập tại nhà các hộ dân', '2021-09-14 18:22:31', '2021-09-14 18:22:31'),
(2, 'Rau củ', 'Bao gồm lúa gạo', '2021-09-30 06:34:47', '2021-09-30 06:34:47'),
(3, 'Gạo', 'Thuộc nhóm lương thực', '2021-10-02 06:44:26', '2021-10-02 06:44:26'),
(4, 'Thịt cá trứng', 'Thực phẩm tươi sống', '2021-10-02 06:53:09', '2021-10-19 09:38:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_accesss`
--

CREATE TABLE `role_accesss` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_accesss`
--

INSERT INTO `role_accesss` (`id`, `role_name`, `role_description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quyền admin', NULL, NULL),
(2, 'Nhân viên', 'Quyền nhân viên', NULL, NULL),
(3, 'Khách hàng', 'Quyền Khách hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tdsbs`
--

CREATE TABLE `tdsbs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_diary` int(10) UNSIGNED NOT NULL,
  `date_phathien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trieutrung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhhuong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `techniques`
--

CREATE TABLE `techniques` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_technique` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_technique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `techniques`
--

INSERT INTO `techniques` (`id`, `name_technique`, `description_technique`, `created_at`, `updated_at`) VALUES
(1, 'Độc canh', 'không có', '2021-09-25 23:16:59', '2021-10-22 06:00:33'),
(2, 'Luân canh', 'Hình thức canh tác xen canh', '2021-10-01 22:48:58', '2021-10-01 22:48:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuhoachs`
--

CREATE TABLE `thuhoachs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_diary` int(10) UNSIGNED NOT NULL,
  `date_thuhoach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl_thuhoach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gd_sd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl_banra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `units`
--

INSERT INTO `units` (`id`, `name_unit`, `description_unit`, `created_at`, `updated_at`) VALUES
(1, 'kg', 'Kí lô gram', '2021-09-14 18:38:19', '2021-09-14 18:38:19'),
(2, 'Bó', '1 bó khoảng nửa kí', '2021-09-14 18:38:53', '2021-09-14 18:38:53'),
(3, 'bao', '1 bao tuowng dduwopng 50 kg', '2021-09-19 08:04:40', '2021-09-19 08:04:40'),
(6, 'bịt', 'một bịt khoảng nửa kí', '2021-10-07 10:51:47', '2021-10-07 10:51:47'),
(10, 'Chai', 'một chai khoảng 1000 ml', '2021-10-19 09:26:38', '2021-10-19 09:27:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `id_position` int(10) UNSIGNED NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_user` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `role_id`, `id_position`, `name_user`, `email`, `email_verified_at`, `password`, `address_user`, `phone_user`, `sex_user`, `birthday_user`, `image_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Nguyễn Hà giang', 'giang@gmail.com', NULL, '$2y$10$uNKbB.MLOCYR07uNBt19K.ykNf.1tatfn7u8kLn5RJK7nsANp3hFO', 'Ninh Kiều, Cần Thơ', '0939337416', '0', '1999-09-13', 'images.PNG', NULL, '2021-09-13 11:53:14', '2021-10-28 04:41:19'),
(5, 3, 1, 'Nguyễn Hà Giang', 'giang123@gmail.com', NULL, '$2y$10$TQXwNek1euj63fHo4XmsSePrjt3oYtpuuv4xSIYp.3xzfnSv4Q37y', 'Ninh Kiều, Cần Thơ', '0939337416', '0', '1999-09-13', 'girl.PNG', NULL, '2021-09-13 15:38:55', '2021-10-23 04:43:22'),
(8, 3, 2, 'Lưu Huỳnh Như', 'nhu@gmail.com', NULL, '$2y$10$uor0u1nVHm8RT637Ac2q/.Hn8WLZM.hWQdnhZy8mQ7b3R52qvTFSO', 'Cần Thơ', '0939337416', '1', '2001-12-07', 'giphy.gif', NULL, '2021-10-19 07:42:44', '2021-10-23 19:13:38'),
(9, 3, 1, 'giang nguyen', 'thuan@gmail.com', NULL, '$2y$10$dU6bGGhiH3a8BGJlLBs8jOWFJj.F1cE4Tv2/QBvR9n2uQh46xapCy', '3/2 ninh kieu can tho', '0939337416', '0', '1999-09-13', 'giphy.gif', NULL, '2021-10-27 04:36:15', '2021-10-27 04:36:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bonphans`
--
ALTER TABLE `bonphans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bonphans_id_diary_foreign` (`id_diary`);

--
-- Chỉ mục cho bảng `detail_gdsts`
--
ALTER TABLE `detail_gdsts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_gdsts_id_diary_foreign` (`id_diary`),
  ADD KEY `detail_gdsts_id_gdst_foreign` (`id_gdst`);

--
-- Chỉ mục cho bảng `detail_warehouses`
--
ALTER TABLE `detail_warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_warehouses_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `farmer_diarys`
--
ALTER TABLE `farmer_diarys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_diarys_id_user_foreign` (`id_user`),
  ADD KEY `farmer_diarys_id_product_foreign` (`id_product`),
  ADD KEY `farmer_diarys_id_technique_foreign` (`id_technique`);

--
-- Chỉ mục cho bảng `gdsts`
--
ALTER TABLE `gdsts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_user_foreign` (`id_user`),
  ADD KEY `orders_id_cate_order_foreign` (`id_cate_order`);

--
-- Chỉ mục cho bảng `order_caterogys`
--
ALTER TABLE `order_caterogys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_id_order_foreign` (`id_order`),
  ADD KEY `order_details_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phunthuocs`
--
ALTER TABLE `phunthuocs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phunthuocs_id_diary_foreign` (`id_diary`);

--
-- Chỉ mục cho bảng `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_cate_product_foreign` (`id_cate_product`),
  ADD KEY `products_id_unit_foreign` (`id_unit`);

--
-- Chỉ mục cho bảng `product_caterogys`
--
ALTER TABLE `product_caterogys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_accesss`
--
ALTER TABLE `role_accesss`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tdsbs`
--
ALTER TABLE `tdsbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tdsbs_id_diary_foreign` (`id_diary`);

--
-- Chỉ mục cho bảng `techniques`
--
ALTER TABLE `techniques`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuhoachs`
--
ALTER TABLE `thuhoachs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thuhoachs_id_diary_foreign` (`id_diary`);

--
-- Chỉ mục cho bảng `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_id_position_foreign` (`id_position`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bonphans`
--
ALTER TABLE `bonphans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `detail_gdsts`
--
ALTER TABLE `detail_gdsts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `detail_warehouses`
--
ALTER TABLE `detail_warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `farmer_diarys`
--
ALTER TABLE `farmer_diarys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `gdsts`
--
ALTER TABLE `gdsts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `order_caterogys`
--
ALTER TABLE `order_caterogys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phunthuocs`
--
ALTER TABLE `phunthuocs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `product_caterogys`
--
ALTER TABLE `product_caterogys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role_accesss`
--
ALTER TABLE `role_accesss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tdsbs`
--
ALTER TABLE `tdsbs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `techniques`
--
ALTER TABLE `techniques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thuhoachs`
--
ALTER TABLE `thuhoachs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bonphans`
--
ALTER TABLE `bonphans`
  ADD CONSTRAINT `bonphans_id_diary_foreign` FOREIGN KEY (`id_diary`) REFERENCES `farmer_diarys` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `detail_gdsts`
--
ALTER TABLE `detail_gdsts`
  ADD CONSTRAINT `detail_gdsts_id_diary_foreign` FOREIGN KEY (`id_diary`) REFERENCES `farmer_diarys` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_gdsts_id_gdst_foreign` FOREIGN KEY (`id_gdst`) REFERENCES `gdsts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `detail_warehouses`
--
ALTER TABLE `detail_warehouses`
  ADD CONSTRAINT `detail_warehouses_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `farmer_diarys`
--
ALTER TABLE `farmer_diarys`
  ADD CONSTRAINT `farmer_diarys_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `farmer_diarys_id_technique_foreign` FOREIGN KEY (`id_technique`) REFERENCES `techniques` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `farmer_diarys_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_cate_order_foreign` FOREIGN KEY (`id_cate_order`) REFERENCES `order_caterogys` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phunthuocs`
--
ALTER TABLE `phunthuocs`
  ADD CONSTRAINT `phunthuocs_id_diary_foreign` FOREIGN KEY (`id_diary`) REFERENCES `farmer_diarys` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_cate_product_foreign` FOREIGN KEY (`id_cate_product`) REFERENCES `product_caterogys` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_id_unit_foreign` FOREIGN KEY (`id_unit`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tdsbs`
--
ALTER TABLE `tdsbs`
  ADD CONSTRAINT `tdsbs_id_diary_foreign` FOREIGN KEY (`id_diary`) REFERENCES `farmer_diarys` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thuhoachs`
--
ALTER TABLE `thuhoachs`
  ADD CONSTRAINT `thuhoachs_id_diary_foreign` FOREIGN KEY (`id_diary`) REFERENCES `farmer_diarys` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_position_foreign` FOREIGN KEY (`id_position`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_accesss` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
