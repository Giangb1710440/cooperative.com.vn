-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 25, 2021 lúc 11:43 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cooperative`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_customer` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id_warehouse` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `detail_warehouses` (`id`, `id_product`, `id_warehouse`, `qty_opening_stock`, `qty_import_warehouse`, `qty_export_warehouse`, `inventory_warehouse`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 100, 0, 0, 100, '2021-09-22 05:07:40', '2021-09-22 05:07:40');

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
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `id_cate_invoice` int(10) UNSIGNED NOT NULL,
  `status_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_invoice` int(11) NOT NULL,
  `total_price_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_caterogys`
--

CREATE TABLE `invoice_caterogys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_cate_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_cate_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice_caterogys`
--

INSERT INTO `invoice_caterogys` (`id`, `name_cate_invoice`, `description_cate_invoice`, `created_at`, `updated_at`) VALUES
(1, 'hóa đơn nhập', 'Dùng cho việc nhập hàng', '2021-09-15 13:57:17', '2021-09-15 13:57:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_invoice` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quality_invoice` int(11) NOT NULL,
  `unit_price_invoice` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2021_09_11_181747_create_customers_table', 1),
(8, '2021_09_11_181802_create_invoice_caterogys_table', 1),
(9, '2021_09_11_181823_create_suppliers_table', 1),
(10, '2021_09_11_181853_create_product_caterogys_table', 1),
(11, '2021_09_11_181917_create_units_table', 1),
(12, '2021_09_11_181931_create_warehouses_table', 1),
(13, '2021_09_11_182907_create_users_table', 1),
(14, '2021_09_11_182931_create_invoices_table', 1),
(15, '2021_09_11_183120_create_orders_table', 1),
(16, '2021_09_11_183208_create_products_table', 1),
(17, '2021_09_11_183224_create_order_details_table', 1),
(18, '2021_09_11_183236_create_invoice_details_table', 1),
(19, '2021_09_11_183306_create_supplier_products_table', 1),
(20, '2021_09_11_183324_create_detail_warehouses_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_cate_order` int(10) UNSIGNED NOT NULL,
  `status_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_order` int(11) NOT NULL,
  `total_price_order` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Thư kí', 'Các công việc của thư kí', '2021-09-15 22:52:12', '2021-09-15 22:52:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cate_product` int(10) UNSIGNED NOT NULL,
  `id_unit` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price_product` bigint(20) NOT NULL,
  `sale_price_product` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_cate_product`, `id_unit`, `name_product`, `description_product`, `status_product`, `image_product`, `cost_price_product`, `sale_price_product`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'xoài cát hòa lộc', 'dsadas', 'Mới thêm', '[\"p2.jpg\",\"p3.jpg\"]', 15000, 25000, '2021-09-19 12:32:45', '2021-09-19 12:32:45'),
(2, 1, 2, 'mận đài loan', 'dsada', 'Mới thêm', '[\"d\\u01b0aleo.jfif\",\"dualeoss.jfif\",\"p1.jpg\"]', 20000, 25000, '2021-09-19 12:41:26', '2021-09-19 12:41:26'),
(3, 1, 1, 'Dưa leo én vàng', 'Lấy từ Hộ dân Nguyễn Văn A', 'Mới thêm', '[\"dualeoss.jfif\"]', 14000, 25000, '2021-09-21 06:58:25', '2021-09-21 06:58:25');

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
(1, 'Trái cây', 'Được nhập tại nhà các hộ dân', '2021-09-15 08:22:31', '2021-09-15 08:22:31');

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
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_supplier` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `name_supplier`, `phone_supplier`, `email_supplier`, `address_supplier`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen van A', '0939337416', 'giangb@gmail.com', 'Cần thơ', '2021-09-15 13:43:57', '2021-09-15 13:43:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier_products`
--

CREATE TABLE `supplier_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
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
(1, 'kg', 'Kí lô gram', '2021-09-15 08:38:19', '2021-09-15 08:38:19'),
(2, 'Bó', '1 bó khoảng nửa kí', '2021-09-15 08:38:53', '2021-09-15 08:38:53'),
(3, 'bao', '1 bao tuowng dduwopng 50 kg', '2021-09-19 22:04:40', '2021-09-19 22:04:40'),
(4, 'Củ', '1 củ khoảng 300g', '2021-09-23 11:04:39', '2021-09-23 11:04:39');

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
(3, 1, 1, 'Nguyen ha giang', 'giang@gmail.com', NULL, '$2y$10$uNKbB.MLOCYR07uNBt19K.ykNf.1tatfn7u8kLn5RJK7nsANp3hFO', 'can tho', '0939337416', 'Nam', '1999-09-13', 'images.PNG', NULL, '2021-09-14 01:53:14', '2021-09-14 01:53:14'),
(5, 3, 1, 'giangphpsmart', 'thuan@gmail.com', NULL, '$2y$10$3gAUg.nCv.HfQ5SvkslccOd7SyO6tUgfD2Dv.0DQaFWg.uWJ39iky', '3/2 ninh kieu can tho', '0939337416', 'Nam', '1999-09-13', 'girl.PNG', NULL, '2021-09-14 05:38:55', '2021-09-14 05:38:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `address_warehouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_warehouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_warehouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouses`
--

INSERT INTO `warehouses` (`id`, `address_warehouse`, `image_warehouse`, `description_warehouse`, `created_at`, `updated_at`) VALUES
(2, '391, đường 30/4, ninh kiều, cần thơ', 'IMG_0833.JPG', 'kho rau củ quả', '2021-09-15 23:39:24', '2021-09-15 23:39:24');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_warehouses`
--
ALTER TABLE `detail_warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_warehouses_id_product_foreign` (`id_product`),
  ADD KEY `detail_warehouses_id_warehouse_foreign` (`id_warehouse`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_id_customer_foreign` (`id_customer`),
  ADD KEY `invoices_id_cate_invoice_foreign` (`id_cate_invoice`);

--
-- Chỉ mục cho bảng `invoice_caterogys`
--
ALTER TABLE `invoice_caterogys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_details_id_invoice_foreign` (`id_invoice`),
  ADD KEY `invoice_details_id_product_foreign` (`id_product`);

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
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `supplier_products`
--
ALTER TABLE `supplier_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_products_id_supplier_foreign` (`id_supplier`),
  ADD KEY `supplier_products_id_product_foreign` (`id_product`);

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
-- Chỉ mục cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detail_warehouses`
--
ALTER TABLE `detail_warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `invoice_caterogys`
--
ALTER TABLE `invoice_caterogys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_caterogys`
--
ALTER TABLE `order_caterogys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product_caterogys`
--
ALTER TABLE `product_caterogys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role_accesss`
--
ALTER TABLE `role_accesss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `supplier_products`
--
ALTER TABLE `supplier_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `detail_warehouses`
--
ALTER TABLE `detail_warehouses`
  ADD CONSTRAINT `detail_warehouses_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `detail_warehouses_id_warehouse_foreign` FOREIGN KEY (`id_warehouse`) REFERENCES `warehouses` (`id`);

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_id_cate_invoice_foreign` FOREIGN KEY (`id_cate_invoice`) REFERENCES `invoice_caterogys` (`id`),
  ADD CONSTRAINT `invoices_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_id_invoice_foreign` FOREIGN KEY (`id_invoice`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoice_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_cate_order_foreign` FOREIGN KEY (`id_cate_order`) REFERENCES `order_caterogys` (`id`),
  ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_cate_product_foreign` FOREIGN KEY (`id_cate_product`) REFERENCES `product_caterogys` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_id_unit_foreign` FOREIGN KEY (`id_unit`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `supplier_products`
--
ALTER TABLE `supplier_products`
  ADD CONSTRAINT `supplier_products_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `supplier_products_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_position_foreign` FOREIGN KEY (`id_position`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role_accesss` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
