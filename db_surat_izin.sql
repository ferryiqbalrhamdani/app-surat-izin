-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2023 pada 03.30
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat_izin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_01_140539_create_roles_table', 1),
(6, '2023_06_01_141723_add_role_id_column_to_users_table', 1),
(7, '2023_06_06_031737_create_tb_izin_meninggalkan_kantor_table', 1),
(8, '2023_06_06_041254_create_tb_pt_table', 1),
(9, '2023_06_06_062227_create_tb_divisi_table', 1),
(10, '2023_07_06_093813_create_tb_cuti_table', 2),
(11, '2023_07_06_105730_add_column_role_id_to_tb_cuti_table', 2),
(12, '2023_07_21_150035_create_tb_cuti_table', 3),
(13, '2023_07_24_163331_add_column_lama_cuti_to_tb_cuti_table', 4),
(14, '2023_07_31_093041_create_tb_lembur_table', 5),
(15, '2023_07_31_115405_add_column_uang_makan_to_tb_lembur', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL),
(3, 'atasan', NULL, NULL),
(4, 'HRD', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `lama_cuti` varchar(128) DEFAULT NULL,
  `keperluan_cuti` varchar(100) NOT NULL,
  `keterangan_cuti` text DEFAULT 'text',
  `status` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status_hrd` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_cuti`
--

INSERT INTO `tb_cuti` (`id`, `user_id`, `start_date`, `end_date`, `lama_cuti`, `keperluan_cuti`, `keterangan_cuti`, `status`, `status_hrd`, `created_at`, `updated_at`) VALUES
(49, 3, '2023-09-06', '2023-09-06', '1 hari', 'Cuti Pribadi', 'liburan', 1, 1, '2023-09-06 07:51:41', '2023-09-06 07:59:10'),
(50, 18, '2023-09-07', '2023-09-07', '1 hari', 'Cuti Pribadi', 'libur aja', 1, 2, '2023-09-06 07:52:39', '2023-09-06 07:59:15'),
(51, 18, '2023-09-08', '2023-09-08', '1 hari', 'Cuti Khusus', 'Bencana Alam, banjir bandang', 1, 1, '2023-09-06 07:55:14', '2023-09-06 08:00:33'),
(52, 18, '2023-09-13', '2023-09-13', '1 hari', 'Cuti Pribadi', 'tes 1', 1, 1, '2023-09-06 08:01:23', '2023-09-06 08:09:47'),
(53, 3, '2023-09-21', '2023-09-21', '1 hari', 'Cuti Pribadi', 'tes 2', 1, 1, '2023-09-06 08:01:45', '2023-09-06 08:09:38'),
(54, 3, '2023-09-12', '2023-12-12', '3 bulan', 'Cuti Khusus', 'Cuti Melahirkan, tes 3', 1, 1, '2023-09-06 08:02:07', '2023-09-06 08:09:34'),
(55, 3, '2023-09-21', '2023-09-21', '1 hari', 'Cuti Pribadi', 'tes 4', 1, 1, '2023-09-06 08:02:22', '2023-09-06 08:09:29'),
(56, 3, '2023-09-12', '2023-09-12', '1 hari', 'Cuti Pribadi', 'tes 5', 1, 1, '2023-09-06 08:02:36', '2023-09-06 08:09:24'),
(57, 3, '2023-09-06', '2023-09-08', '3 hari', 'Cuti Pribadi', 'tes 6', 1, 1, '2023-09-06 08:02:56', '2023-09-06 08:09:18'),
(58, 18, '2023-09-19', '2023-09-19', '1 hari', 'Cuti Pribadi', 'tes 9', 0, NULL, '2023-09-06 08:14:35', '2023-09-06 08:14:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_divisi`
--

INSERT INTO `tb_divisi` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2023-06-16 12:35:56', '2023-06-16 12:35:56'),
(2, 'Staff', '2023-06-16 12:36:02', '2023-06-16 12:36:02'),
(3, 'Administrator', '2023-06-16 12:36:22', '2023-06-16 12:36:22'),
(6, 'Accounting', '2023-06-20 04:28:07', '2023-06-20 04:29:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_izin_meninggalkan_kantor`
--

CREATE TABLE `tb_izin_meninggalkan_kantor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pt` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username_user` varchar(100) NOT NULL,
  `divisi_user` varchar(100) NOT NULL,
  `tanggal_izin` date DEFAULT NULL,
  `keterangan_izin` text DEFAULT 'text',
  `jam_mulai` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `status_hrd` int(1) DEFAULT NULL,
  `role_id` int(1) NOT NULL DEFAULT 2,
  `keperluan_izin` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_izin_meninggalkan_kantor`
--

INSERT INTO `tb_izin_meninggalkan_kantor` (`id`, `nama_pt`, `nama_user`, `username_user`, `divisi_user`, `tanggal_izin`, `keterangan_izin`, `jam_mulai`, `jam_akhir`, `status`, `status_hrd`, `role_id`, `keperluan_izin`, `created_at`, `updated_at`) VALUES
(75, 'PT. Murni Tunasa Unggul', 'Bayu Aji Santosa', 'bayumtu', 'Staff', '2023-08-23', 'Cek dokumen ke gudang ceper', '13:30:00', '17:00:00', 1, 1, 2, 'Tugas Meninggalkan Kantor', '2023-08-24 23:27:06', '2023-08-25 01:53:50'),
(76, 'PT. Mitra Harapan Abadi', 'Raveena Indah Prastika Haloho', 'raveenaindah', 'Staff', '2023-08-22', 'tugas keluar (multigudang)', '12:20:00', NULL, 1, 1, 2, 'Izin Datang Terlambat', '2023-08-24 23:27:13', '2023-08-25 01:53:41'),
(77, 'PT. Mitra Harapan Abadi', 'Ferry Iqbal Rhamdani', 'rhamdani', 'IT', '2023-08-02', 'Pergi ke MKF, presentasi program izin online ke HRD', '08:23:00', '13:30:00', 1, 1, 2, 'Tugas Meninggalkan Kantor', '2023-08-24 23:31:36', '2023-08-25 01:53:32'),
(79, 'PT. Mitra Harapan Abadi', 'Ferry Iqbal Rhamdani', 'rhamdani', 'IT', '2023-08-21', 'tes', '08:00:00', '10:14:00', 1, 1, 2, 'Izin Datang Terlambat', '2023-08-26 19:14:48', '2023-08-31 02:47:45'),
(80, 'PT. Mitra Harapan Abadi', 'Ferry Iqbal Rhamdani', 'rhamdani', 'IT', '2023-08-28', 'ketiduran', '08:00:00', '08:50:00', 2, NULL, 2, 'Izin Datang Terlambat', '2023-08-28 01:51:06', '2023-08-30 10:06:19'),
(81, 'PT. Mitra Harapan Abadi', 'Ferry Iqbal Rhamdani', 'rhamdani', 'IT', '2023-08-28', 'tes', '08:00:00', '09:09:00', 1, 1, 2, 'Izin Datang Terlambat', '2023-08-28 02:09:05', '2023-09-06 03:02:23'),
(97, 'PT. Mitra Harapan Abadi', 'Ferry Iqbal Rhamdani', 'rhamdani', 'IT', '2023-08-30', 'cobacoba', '08:00:00', '10:59:00', 1, 1, 2, 'Izin Datang Terlambat', '2023-08-30 03:59:17', '2023-09-06 03:02:33'),
(98, 'PT. Mitra Harapan Abadi', 'Ferry Iqbal Rhamdani', 'rhamdani', 'IT', '2023-08-30', 'keluar', '11:00:00', '14:00:00', 1, 1, 2, 'Izin Meninggalkan Kantor', '2023-08-30 04:00:39', '2023-08-31 02:47:27'),
(100, 'PT. Mitra Harapan Abadi', 'Ferry Iqbal Rhamdani', 'rhamdani', 'IT', '2023-09-05', 'tes', '08:00:00', '09:29:00', 1, 1, 2, 'Izin Datang Terlambat', '2023-09-05 02:29:51', '2023-09-06 03:02:37'),
(101, 'PT. Mitra Harapan Abadi', 'Ferry Iqbal Rhamdani', 'rhamdani', 'IT', '2023-07-05', 'tes', '08:00:00', '10:21:00', 1, 1, 2, 'Izin Datang Terlambat', '2023-09-05 03:21:21', '2023-09-06 03:03:41'),
(102, 'PT. Mitra Harapan Abadi', 'Ferry Iqbal Rhamdani', 'rhamdani', 'IT', '2023-09-06', 'tes 1', '08:00:00', '09:46:00', 2, NULL, 2, 'Izin Datang Terlambat', '2023-09-06 02:46:25', '2023-09-06 03:03:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lembur`
--

CREATE TABLE `tb_lembur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_lembur` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `lama_lembur` time NOT NULL,
  `upah_lembur_perjam` int(11) NOT NULL DEFAULT 15000,
  `uang_makan` int(11) NOT NULL DEFAULT 0,
  `upah_lembur` varchar(100) NOT NULL,
  `keterangan_lembur` text DEFAULT 'text',
  `status` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status_hrd` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_lembur`
--

INSERT INTO `tb_lembur` (`id`, `user_id`, `tgl_lembur`, `start_time`, `end_time`, `lama_lembur`, `upah_lembur_perjam`, `uang_makan`, `upah_lembur`, `keterangan_lembur`, `status`, `status_hrd`, `created_at`, `updated_at`) VALUES
(39, 3, '2023-09-06', '14:25:00', '08:25:00', '06:00:00', 0, 0, '100000', 'tes lembur', 1, 0, '2023-09-06 07:26:16', '2023-09-06 07:26:16'),
(40, 18, '2023-09-06', '17:22:00', '21:22:00', '04:00:00', 15000, 20000, '80000', 'tes', 0, NULL, '2023-09-06 10:22:32', '2023-09-06 10:22:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pt`
--

CREATE TABLE `tb_pt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pt`
--

INSERT INTO `tb_pt` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PT. Mitra Harapan Abadi', '2023-06-16 12:34:58', '2023-06-23 08:36:35'),
(3, 'PT. Murni Tunasa Unggul', '2023-06-16 12:35:31', '2023-06-26 07:08:02'),
(20, 'PT. Harapan Sentosa Bersama', '2023-06-23 08:25:29', '2023-06-23 08:40:28'),
(21, 'PT. Multi Tirta Abadi', '2023-06-23 09:48:01', '2023-06-23 09:48:23'),
(24, 'PT. Mitra Sembada Mulia', '2023-06-26 07:08:45', '2023-06-26 07:08:45'),
(25, 'PT. Murni Unggul Sejahtera', '2023-06-26 07:08:59', '2023-06-26 07:08:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pt` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(128) NOT NULL,
  `sisa_cuti` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `divisi`, `password`, `nama_pt`, `jk`, `role_id`, `created_at`, `updated_at`, `status`, `sisa_cuti`) VALUES
(3, 'atasan', 'Fransisca', '-', '$2y$10$mbyGiTCObzzovZMlieDXZeimXTN2nhbUbNxULsHPXMoHS3MnteA5q', '-', 'P', 3, '2023-06-16 13:11:28', '2023-06-16 13:11:28', 'tetap', 6),
(4, 'fikrifaqih', 'Fikri Faqih', 'Staff', '$2y$10$wbQ2lS6yB8LOIAUhisyBY.i2Y/xlthtJlq5FZM2cb90DzaJBqI8Oi', 'PT. Murni Unggul Sejahtera', 'L', 2, '2023-06-21 10:14:59', '2023-06-21 10:14:59', 'tetap', 6),
(5, 'admin', 'admin', '-', '$2y$10$C8Zc9rSE2N5TWdd/BUVu.Onhq8RX3/mVkib6mHwDrKa7xhRvAu1FW', '-', '-', 1, '2023-06-22 02:12:26', '2023-06-22 02:12:26', '-', 0),
(18, 'rhamdani', 'Ferry Iqbal Rhamdani', 'IT', '$2y$10$PXs3AlYxkiTdR.y2eIpBcu9J/qNMDmExFUmNRy.5wJcsgS4BE9oOC', 'PT. Mitra Harapan Abadi', 'P', 2, '2023-06-22 03:03:05', '2023-06-27 03:21:37', 'tetap', 6),
(20, 'hrd', 'HRD', '-', '$2y$10$CHynNhHcr.GUE1FcGeZM6e6lLogPoqbNSvZXKwDrOv8QPZE86VcV6', '-', '-', 4, '2023-06-27 09:33:21', '2023-06-27 09:33:35', '-', 0),
(21, 'vivi0623', 'Vivi Aryani', 'Administrator', '$2y$10$r3bK5qOfT2Lr7VsalZtj.u4VEOe3d8O0/LMopeKzyjmXfV6usDFja', 'PT. Murni Unggul Sejahtera', 'P', 2, '2023-06-27 06:18:26', '2023-06-27 06:18:26', 'tetap', 6),
(27, 'bayumtu', 'Bayu Aji Santosa', 'Staff', '$2y$10$NZkpeae8juJLU8jKVsbdB.Ll2EajQitmLLyEpu/sEvxW5lAaME8GW', 'PT. Murni Tunasa Unggul', 'L', 2, '2023-08-24 23:23:48', '2023-08-24 23:23:48', 'tetap', 6),
(28, 'raveenaindah', 'Raveena Indah Prastika Haloho', 'Staff', '$2y$10$8IZdx3tyb19xj9evYtaqW.p1JOKTtQ9buRDF/abWAxtkUhOoDs0rm', 'PT. Mitra Harapan Abadi', 'P', 2, '2023-08-24 23:24:39', '2023-08-24 23:24:39', 'kontrak', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cuti_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_izin_meninggalkan_kantor`
--
ALTER TABLE `tb_izin_meninggalkan_kantor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lembur`
--
ALTER TABLE `tb_lembur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_lembur_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tb_pt`
--
ALTER TABLE `tb_pt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_izin_meninggalkan_kantor`
--
ALTER TABLE `tb_izin_meninggalkan_kantor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `tb_lembur`
--
ALTER TABLE `tb_lembur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_pt`
--
ALTER TABLE `tb_pt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD CONSTRAINT `tb_cuti_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_lembur`
--
ALTER TABLE `tb_lembur`
  ADD CONSTRAINT `tb_lembur_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
