-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Sep 2025 pada 12.07
-- Versi server: 8.0.30
-- Versi PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_kecamatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `desa_id` bigint UNSIGNED DEFAULT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `desa_id`, `log_name`, `description`, `subject_type`, `subject_id`, `properties`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', '2025-09-10 22:06:32', '2025-09-10 22:06:32'),
(2, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-10 22:07:02', '2025-09-10 22:07:02'),
(3, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 02:27:34', '2025-09-11 02:27:34'),
(4, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', '2025-09-11 02:40:02', '2025-09-11 02:40:02'),
(5, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 03:38:15', '2025-09-11 03:38:15'),
(6, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', '2025-09-11 03:53:19', '2025-09-11 03:53:19'),
(7, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 04:14:35', '2025-09-11 04:14:35'),
(8, 2, 1, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 5, '{\"old\": {\"nik\": \"1687193344715\", \"updated_at\": \"2025-09-10T18:34:56.000000Z\", \"updated_by\": 1, \"nama_lengkap\": \"Budi Santoso\", \"update_reason\": null}, \"attributes\": {\"nik\": \"1687193344715148\", \"updated_at\": \"2025-09-11 01:17:02\", \"updated_by\": 2, \"nama_lengkap\": \"Budi Santoso lolok\", \"update_reason\": \"ada perubahan nama\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 04:17:02', '2025-09-11 04:17:02'),
(9, 2, 1, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 5, '{\"old\": {\"nik\": \"1687193344715\", \"updated_at\": \"2025-09-10T18:34:56.000000Z\", \"updated_by\": 1, \"nama_lengkap\": \"Budi Santoso\", \"update_reason\": null}, \"attributes\": {\"nik\": \"1687193344715148\", \"updated_at\": \"2025-09-11 01:17:02\", \"updated_by\": 2, \"nama_lengkap\": \"Budi Santoso lolok\", \"update_reason\": \"ada perubahan nama\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 04:17:02', '2025-09-11 04:17:02'),
(10, 2, 1, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 5, '{\"old\": {\"updated_at\": \"2025-09-11T01:17:02.000000Z\", \"nama_lengkap\": \"Budi Santoso lolok\", \"update_reason\": \"ada perubahan nama\"}, \"attributes\": {\"updated_at\": \"2025-09-11 01:24:06\", \"nama_lengkap\": \"Budi Santoso aja\", \"update_reason\": \"ubah nama\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 04:24:06', '2025-09-11 04:24:06'),
(11, 2, 1, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 5, '{\"old\": {\"updated_at\": \"2025-09-11T01:17:02.000000Z\", \"nama_lengkap\": \"Budi Santoso lolok\", \"update_reason\": \"ada perubahan nama\"}, \"attributes\": {\"updated_at\": \"2025-09-11 01:24:06\", \"nama_lengkap\": \"Budi Santoso aja\", \"update_reason\": \"ubah nama\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 04:24:06', '2025-09-11 04:24:06'),
(12, 2, 1, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 3, '{\"old\": {\"nik\": \"1121629171588\", \"updated_at\": \"2025-09-10T18:34:56.000000Z\", \"updated_by\": 1, \"nama_lengkap\": \"Lukman Putra\", \"update_reason\": null, \"pendidikan_terakhir\": \"SMA\"}, \"attributes\": {\"nik\": \"1121629171588449\", \"updated_at\": \"2025-09-11 01:29:17\", \"updated_by\": 2, \"nama_lengkap\": \"Lukman Putra Hakim\", \"update_reason\": \"ubah nama\", \"pendidikan_terakhir\": \"SD\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 04:29:17', '2025-09-11 04:29:17'),
(13, 2, 1, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 3, '{\"old\": {\"nik\": \"1121629171588\", \"updated_at\": \"2025-09-10T18:34:56.000000Z\", \"updated_by\": 1, \"nama_lengkap\": \"Lukman Putra\", \"update_reason\": null, \"pendidikan_terakhir\": \"SMA\"}, \"attributes\": {\"nik\": \"1121629171588449\", \"updated_at\": \"2025-09-11 01:29:17\", \"updated_by\": 2, \"nama_lengkap\": \"Lukman Putra Hakim\", \"update_reason\": \"ubah nama\", \"pendidikan_terakhir\": \"SD\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 04:29:17', '2025-09-11 04:29:17'),
(14, 2, 1, 'deleted', 'Deleted PerangkatDesa', 'App\\Models\\PerangkatDesa', 1, '{\"attributes\": {\"id\": 1, \"nik\": \"1981216214463\", \"alamat\": \"Dusun 5, Belitang Jaya\", \"status\": \"aktif\", \"desa_id\": 1, \"jabatan\": \"Kepala Urusan Keuangan\", \"jobdesk\": \"Membantu Kepala Desa dalam melaksanakan pengelolaan keuangan desa\", \"created_at\": \"2025-09-10 18:34:56\", \"is_current\": 1, \"no_telepon\": \"08517411502\", \"updated_at\": \"2025-09-10 18:34:56\", \"updated_by\": 1, \"nama_lengkap\": \"Wahyu Gunawan\", \"tempat_lahir\": \"Belitang\", \"jenis_kelamin\": \"L\", \"tanggal_lahir\": \"1995-08-20\", \"update_reason\": null, \"sk_pengangkatan\": null, \"pendidikan_terakhir\": \"D3\", \"tanggal_akhir_tugas\": null, \"tanggal_mulai_tugas\": \"2020-12-28\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 04:29:56', '2025-09-11 04:29:56'),
(15, 2, 1, 'deleted', 'Deleted PerangkatDesa', 'App\\Models\\PerangkatDesa', 1, '{\"attributes\": {\"id\": 1, \"nik\": \"1981216214463\", \"alamat\": \"Dusun 5, Belitang Jaya\", \"status\": \"aktif\", \"desa_id\": 1, \"jabatan\": \"Kepala Urusan Keuangan\", \"jobdesk\": \"Membantu Kepala Desa dalam melaksanakan pengelolaan keuangan desa\", \"created_at\": \"2025-09-10 18:34:56\", \"is_current\": 1, \"no_telepon\": \"08517411502\", \"updated_at\": \"2025-09-10 18:34:56\", \"updated_by\": 1, \"nama_lengkap\": \"Wahyu Gunawan\", \"tempat_lahir\": \"Belitang\", \"jenis_kelamin\": \"L\", \"tanggal_lahir\": \"1995-08-20\", \"update_reason\": null, \"sk_pengangkatan\": null, \"pendidikan_terakhir\": \"D3\", \"tanggal_akhir_tugas\": null, \"tanggal_mulai_tugas\": \"2020-12-28\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 04:29:56', '2025-09-11 04:29:56'),
(16, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 12:12:11', '2025-09-11 12:12:11'),
(17, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 14:52:57', '2025-09-11 14:52:57'),
(18, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 14:59:23', '2025-09-11 14:59:23'),
(19, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-11 21:40:42', '2025-09-11 21:40:42'),
(20, 1, NULL, 'login', 'login ke sistem', 'App\\Models\\User', 1, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2025-09-12 02:18:55', '2025-09-12 02:18:55'),
(21, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 02:27:55', '2025-09-12 02:27:55'),
(22, 2, 1, 'login', 'login ke sistem', 'App\\Models\\User', 2, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 02:29:29', '2025-09-12 02:29:29'),
(23, 1, NULL, 'login', 'login ke sistem', 'App\\Models\\User', 1, '[]', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/17.5 Mobile/15A5370a Safari/602.1', '2025-09-12 04:57:47', '2025-09-12 04:57:47'),
(24, 1, NULL, 'login', 'login ke sistem', 'App\\Models\\User', 1, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 05:17:39', '2025-09-12 05:17:39'),
(25, 1, NULL, 'login', 'login ke sistem', 'App\\Models\\User', 1, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 18:43:50', '2025-09-12 18:43:50'),
(26, 1, NULL, 'created', 'Created PerangkatDesa', 'App\\Models\\PerangkatDesa', 25, '{\"attributes\": {\"id\": 25, \"nik\": \"1552579869268154\", \"alamat\": \"geming\", \"status\": \"aktif\", \"desa_id\": \"1\", \"jabatan\": \"Kepala Dusun 3\", \"jobdesk\": \"kadus dusun 3\", \"created_at\": \"2025-09-12 16:47:31\", \"no_telepon\": \"081236549632\", \"updated_at\": \"2025-09-12 16:47:31\", \"updated_by\": 1, \"nama_lengkap\": \"Tures Polij\", \"tempat_lahir\": \"Lubuk Linggau\", \"jenis_kelamin\": \"L\", \"tanggal_lahir\": \"2000-05-17 00:00:00\", \"sk_pengangkatan\": \"sk-perangkat/A4qSjc2yhrtEngk0nkKQj23d2VpEwqefoQ2fT8t1.pdf\", \"pendidikan_terakhir\": \"S1 Administrasi\", \"tanggal_akhir_tugas\": \"2026-07-31 00:00:00\", \"tanggal_mulai_tugas\": \"2025-09-01 00:00:00\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 19:47:31', '2025-09-12 19:47:31'),
(27, 1, NULL, 'created', 'Created PerangkatDesa', 'App\\Models\\PerangkatDesa', 25, '{\"attributes\": {\"id\": 25, \"nik\": \"1552579869268154\", \"alamat\": \"geming\", \"status\": \"aktif\", \"desa_id\": \"1\", \"jabatan\": \"Kepala Dusun 3\", \"jobdesk\": \"kadus dusun 3\", \"created_at\": \"2025-09-12 16:47:31\", \"no_telepon\": \"081236549632\", \"updated_at\": \"2025-09-12 16:47:31\", \"updated_by\": 1, \"nama_lengkap\": \"Tures Polij\", \"tempat_lahir\": \"Lubuk Linggau\", \"jenis_kelamin\": \"L\", \"tanggal_lahir\": \"2000-05-17 00:00:00\", \"sk_pengangkatan\": \"sk-perangkat/A4qSjc2yhrtEngk0nkKQj23d2VpEwqefoQ2fT8t1.pdf\", \"pendidikan_terakhir\": \"S1 Administrasi\", \"tanggal_akhir_tugas\": \"2026-07-31 00:00:00\", \"tanggal_mulai_tugas\": \"2025-09-01 00:00:00\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 19:47:31', '2025-09-12 19:47:31'),
(28, 1, NULL, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 25, '{\"old\": {\"updated_at\": \"2025-09-12T16:47:31.000000Z\", \"nama_lengkap\": \"Tures Polij\", \"update_reason\": null}, \"attributes\": {\"updated_at\": \"2025-09-12 17:45:08\", \"nama_lengkap\": \"Tures Polijun\", \"update_reason\": \"perubahan nama\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 20:45:08', '2025-09-12 20:45:08'),
(29, 1, NULL, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 25, '{\"old\": {\"updated_at\": \"2025-09-12T16:47:31.000000Z\", \"nama_lengkap\": \"Tures Polij\", \"update_reason\": null}, \"attributes\": {\"updated_at\": \"2025-09-12 17:45:08\", \"nama_lengkap\": \"Tures Polijun\", \"update_reason\": \"perubahan nama\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 20:45:08', '2025-09-12 20:45:08'),
(30, 1, NULL, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 25, '{\"old\": {\"updated_at\": \"2025-09-12T17:45:08.000000Z\", \"nama_lengkap\": \"Tures Polijun\", \"update_reason\": \"perubahan nama\"}, \"attributes\": {\"updated_at\": \"2025-09-12 17:54:39\", \"nama_lengkap\": \"Tures Polijun kiyu\", \"update_reason\": \"perubahan nama lagi\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 20:54:39', '2025-09-12 20:54:39'),
(31, 1, NULL, 'updated', 'Updated PerangkatDesa', 'App\\Models\\PerangkatDesa', 25, '{\"old\": {\"updated_at\": \"2025-09-12T17:45:08.000000Z\", \"nama_lengkap\": \"Tures Polijun\", \"update_reason\": \"perubahan nama\"}, \"attributes\": {\"updated_at\": \"2025-09-12 17:54:39\", \"nama_lengkap\": \"Tures Polijun kiyu\", \"update_reason\": \"perubahan nama lagi\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 20:54:39', '2025-09-12 20:54:39'),
(32, 1, NULL, 'deleted', 'Deleted PerangkatDesa', 'App\\Models\\PerangkatDesa', 25, '{\"attributes\": {\"id\": 25, \"nik\": \"1552579869268154\", \"alamat\": \"geming\", \"status\": \"aktif\", \"desa_id\": 1, \"jabatan\": \"Kepala Dusun 3\", \"jobdesk\": \"kadus dusun 3\", \"created_at\": \"2025-09-12 16:47:31\", \"is_current\": 1, \"no_telepon\": \"081236549632\", \"updated_at\": \"2025-09-12 17:54:39\", \"updated_by\": 1, \"nama_lengkap\": \"Tures Polijun kiyu\", \"tempat_lahir\": \"Lubuk Linggau\", \"jenis_kelamin\": \"L\", \"tanggal_lahir\": \"2000-05-17\", \"update_reason\": \"perubahan nama lagi\", \"sk_pengangkatan\": \"sk-perangkat/A4qSjc2yhrtEngk0nkKQj23d2VpEwqefoQ2fT8t1.pdf\", \"pendidikan_terakhir\": \"S1 Administrasi\", \"tanggal_akhir_tugas\": \"2026-07-31\", \"tanggal_mulai_tugas\": \"2025-09-01\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 20:56:08', '2025-09-12 20:56:08'),
(33, 1, NULL, 'deleted', 'Deleted PerangkatDesa', 'App\\Models\\PerangkatDesa', 25, '{\"attributes\": {\"id\": 25, \"nik\": \"1552579869268154\", \"alamat\": \"geming\", \"status\": \"aktif\", \"desa_id\": 1, \"jabatan\": \"Kepala Dusun 3\", \"jobdesk\": \"kadus dusun 3\", \"created_at\": \"2025-09-12 16:47:31\", \"is_current\": 1, \"no_telepon\": \"081236549632\", \"updated_at\": \"2025-09-12 17:54:39\", \"updated_by\": 1, \"nama_lengkap\": \"Tures Polijun kiyu\", \"tempat_lahir\": \"Lubuk Linggau\", \"jenis_kelamin\": \"L\", \"tanggal_lahir\": \"2000-05-17\", \"update_reason\": \"perubahan nama lagi\", \"sk_pengangkatan\": \"sk-perangkat/A4qSjc2yhrtEngk0nkKQj23d2VpEwqefoQ2fT8t1.pdf\", \"pendidikan_terakhir\": \"S1 Administrasi\", \"tanggal_akhir_tugas\": \"2026-07-31\", \"tanggal_mulai_tugas\": \"2025-09-01\"}}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-12 20:56:08', '2025-09-12 20:56:08'),
(34, 1, NULL, 'login', 'login ke sistem', 'App\\Models\\User', 1, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-13 03:52:47', '2025-09-13 03:52:47'),
(35, 1, NULL, 'login', 'login ke sistem', 'App\\Models\\User', 1, '[]', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-09-13 13:33:38', '2025-09-13 13:33:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_desas`
--

CREATE TABLE `aset_desas` (
  `id` bigint UNSIGNED NOT NULL,
  `desa_id` bigint UNSIGNED NOT NULL,
  `kategori_aset` enum('tanah','bangunan','inventaris') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `nilai_perolehan` decimal(15,2) DEFAULT NULL,
  `nilai_sekarang` decimal(15,2) DEFAULT NULL,
  `tanggal_perolehan` date NOT NULL,
  `kondisi` enum('baik','rusak_ringan','rusak_berat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_kepemilikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `is_current` tinyint(1) NOT NULL DEFAULT '1',
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `update_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aset_desas`
--

INSERT INTO `aset_desas` (`id`, `desa_id`, `kategori_aset`, `nama_aset`, `deskripsi`, `nilai_perolehan`, `nilai_sekarang`, `tanggal_perolehan`, `kondisi`, `lokasi`, `bukti_kepemilikan`, `keterangan`, `is_current`, `updated_by`, `update_reason`, `created_at`, `updated_at`) VALUES
(1, 1, 'inventaris', 'AC 3 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 0, 1, NULL, '2025-09-10 21:34:56', '2025-09-11 22:12:26'),
(2, 1, 'tanah', 'Tanah Pasar Desa', 'Tanah desa yang dibeli dari dana desa', 132000000.00, 116160000.00, '2018-03-08', 'baik', 'Dusun 1, Belitang Jaya', NULL, 'Digunakan secara rutin', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(3, 1, 'tanah', 'Tanah Balai Pertemuan', 'Tanah desa yang digunakan untuk balai pertemuan', 233000000.00, 233000000.00, '2024-06-09', 'baik', 'Dekat Masjid, Belitang Jaya', NULL, 'Digunakan secara rutin', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(4, 1, 'tanah', 'Tanah Kantor Desa', 'Aset tanah milik desa yang berlokasi di pusat desa', 366000000.00, 296460000.00, '2022-06-10', 'baik', 'Dusun 3, Belitang Jaya', NULL, 'Masih berfungsi dengan baik', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(5, 1, 'inventaris', 'Kendaraan Dinas 3 Unit', 'Inventaris untuk pelayanan masyarakat', 44000000.00, 30360000.00, '2019-02-24', 'rusak_ringan', 'Ruang Sekretaris, Belitang Jaya', NULL, 'Perlu perbaikan minor', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(6, 1, 'tanah', 'Tanah Kantor Desa', 'Tanah desa yang diperoleh dari hibah warga', 348000000.00, 222720000.00, '2016-06-18', 'rusak_ringan', 'Dekat Sekolah, Belitang Jaya', NULL, 'Beberapa bagian mulai rusak', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(7, 1, 'inventaris', 'Meja Kantor 2 Unit', 'Aset bergerak untuk kegiatan desa', 25000000.00, 22000000.00, '2018-09-17', 'baik', 'Ruang Sekretaris, Belitang Jaya', NULL, 'Pemeliharaan berkala dilakukan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(8, 1, 'tanah', 'Tanah Lapangan Desa', 'Aset tanah milik desa yang berlokasi di pusat desa', 329000000.00, 315840000.00, '2017-12-31', 'baik', 'Dusun 2, Belitang Jaya', NULL, 'Masih berfungsi dengan baik', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(9, 1, 'inventaris', 'Meja Kantor 2 Unit', 'Peralatan pendukung kegiatan administrasi desa', 10000000.00, 5800000.00, '2022-02-08', 'rusak_ringan', 'Gudang Desa, Belitang Jaya', NULL, 'Perlu perbaikan minor', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(10, 2, 'tanah', 'Tanah Kantor Desa', 'Tanah desa yang dibeli dari dana desa', 170000000.00, 125800000.00, '2019-07-23', 'baik', 'Dekat Pasar, Sumber Makmur', NULL, 'Pemeliharaan berkala dilakukan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(11, 2, 'tanah', 'Tanah Posyandu', 'Tanah desa yang diperoleh dari hibah warga', 438000000.00, 411720000.00, '2021-03-04', 'baik', 'Dekat Masjid, Sumber Makmur', NULL, 'Masih berfungsi dengan baik', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(12, 2, 'tanah', 'Tanah Pemakaman Umum', 'Aset tanah milik desa yang berlokasi di pusat desa', 116000000.00, 102080000.00, '2020-08-20', 'baik', 'Dusun 3, Sumber Makmur', NULL, 'Digunakan secara rutin', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(13, 2, 'tanah', 'Tanah Embung Desa', 'Tanah desa yang dibeli dari dana desa', 195000000.00, 195000000.00, '2016-08-26', 'baik', 'Dekat Pasar, Sumber Makmur', NULL, 'Pemeliharaan berkala dilakukan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(14, 2, 'inventaris', 'Printer 5 Unit', 'Inventaris kantor untuk operasional desa', 38000000.00, 32680000.00, '2015-12-24', 'baik', 'Ruang Rapat, Sumber Makmur', NULL, 'Digunakan secara rutin', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(15, 3, 'tanah', 'Tanah Lapangan Desa', 'Tanah desa yang digunakan untuk lapangan desa', 347000000.00, 225550000.00, '2018-07-06', 'rusak_ringan', 'Dekat Masjid, Maju Bersama', NULL, 'Beberapa bagian mulai rusak', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(16, 3, 'tanah', 'Tanah Posyandu', 'Aset tanah milik desa yang berlokasi di pusat desa', 122000000.00, 109800000.00, '2023-03-23', 'baik', 'Pinggir Desa, Maju Bersama', NULL, 'Pemeliharaan berkala dilakukan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(17, 3, 'inventaris', 'Motor Dinas 3 Unit', 'Peralatan pendukung kegiatan administrasi desa', 43000000.00, 29670000.00, '2022-02-23', 'rusak_ringan', 'Ruang Pelayanan, Maju Bersama', NULL, 'Direncanakan untuk perbaikan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(18, 3, 'bangunan', 'Gedung BUMDes', 'Bangunan semi permanen dengan dinding batako', 229000000.00, 174040000.00, '2023-02-18', 'baik', 'Pusat Desa, Maju Bersama', NULL, 'Dalam kondisi baik dan terawat', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(19, 3, 'inventaris', 'Pompa Air 1 Unit', 'Aset bergerak untuk kegiatan desa', 37000000.00, 21830000.00, '2015-01-23', 'rusak_ringan', 'Balai Desa, Maju Bersama', NULL, 'Masih bisa digunakan dengan keterbatasan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(20, 3, 'inventaris', 'Motor Dinas 5 Unit', 'Aset bergerak untuk kegiatan desa', 41000000.00, 21730000.00, '2018-11-08', 'rusak_ringan', 'Ruang Sekretaris, Maju Bersama', NULL, 'Direncanakan untuk perbaikan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(21, 4, 'tanah', 'Tanah Taman Desa', 'Tanah desa yang dibeli dari dana desa', 166000000.00, 89640000.00, '2024-01-09', 'rusak_ringan', 'Dusun 3, Sejahtera Indah', NULL, 'Beberapa bagian mulai rusak', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(22, 4, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 26000000.00, 18720000.00, '2016-03-03', 'baik', 'Gudang Desa, Sejahtera Indah', NULL, 'Dalam kondisi baik dan terawat', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(23, 4, 'bangunan', 'Kantor Desa', 'Bangunan semi permanen dengan dinding batako', 175000000.00, 122500000.00, '2021-03-30', 'baik', 'Pusat Desa, Sejahtera Indah', NULL, 'Digunakan secara rutin', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(24, 4, 'bangunan', 'Balai Desa', 'Bangunan dengan lantai keramik dan dinding beton', 296000000.00, 222000000.00, '2020-07-08', 'baik', 'Dusun 2, Sejahtera Indah', NULL, 'Dalam kondisi baik dan terawat', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(25, 4, 'tanah', 'Tanah TPS', 'Tanah desa yang dibeli dari dana desa', 215000000.00, 107500000.00, '2014-12-09', 'rusak_ringan', 'Pusat Desa, Sejahtera Indah', NULL, 'Direncanakan untuk perbaikan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(26, 4, 'tanah', 'Tanah Lapangan Desa', 'Aset tanah milik desa yang berlokasi di pusat desa', 479000000.00, 445470000.00, '2019-04-10', 'baik', 'Pusat Desa, Sejahtera Indah', NULL, 'Digunakan secara rutin', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(27, 4, 'tanah', 'Tanah Pemakaman Umum', 'Aset tanah milik desa yang berlokasi di pusat desa', 146000000.00, 132860000.00, '2018-01-08', 'baik', 'Pinggir Desa, Sejahtera Indah', NULL, 'Pemeliharaan berkala dilakukan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(28, 4, 'tanah', 'Tanah Taman Desa', 'Aset tanah milik desa yang berlokasi di pusat desa', 485000000.00, 392850000.00, '2020-01-16', 'baik', 'Dekat Sekolah, Sejahtera Indah', NULL, 'Pemeliharaan berkala dilakukan', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(29, 4, 'inventaris', 'Sound System 3 Unit', 'Aset bergerak untuk kegiatan desa', 12000000.00, 9240000.00, '2015-11-19', 'baik', 'Ruang Rapat, Sejahtera Indah', NULL, 'Masih berfungsi dengan baik', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(30, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 0, 2, 'perubahan jumlah', '2025-09-11 22:12:26', '2025-09-11 22:40:08'),
(31, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 0, 2, 'perubahan jumlah', '2025-09-11 22:12:39', '2025-09-11 22:54:27'),
(32, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 0, 2, 'update jumlah', '2025-09-11 22:19:54', '2025-09-11 22:39:46'),
(33, 1, 'inventaris', 'AC 4 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 1, 2, 'ubah jumlah ac', '2025-09-11 22:40:08', '2025-09-11 22:40:08'),
(35, 4, 'bangunan', 'Aula Tari', NULL, 5000000.00, 500000000.00, '2004-03-05', 'baik', 'jklguyugggugyu', NULL, NULL, 1, 1, 'perubahan sedikit', '2025-09-13 04:00:44', '2025-09-13 04:01:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_tanah_wargas`
--

CREATE TABLE `aset_tanah_wargas` (
  `id` bigint UNSIGNED NOT NULL,
  `desa_id` bigint UNSIGNED NOT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_pemilik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_sph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_sph` date DEFAULT NULL,
  `luas_tanah` decimal(10,2) NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_tanah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kepemilikan` enum('milik_sendiri','warisan','hibah','jual_beli') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_per_meter` decimal(15,2) DEFAULT NULL,
  `tanggal_perolehan` date NOT NULL,
  `bukti_kepemilikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aset_tanah_wargas`
--

INSERT INTO `aset_tanah_wargas` (`id`, `desa_id`, `nama_pemilik`, `nik_pemilik`, `nomor_sph`, `tanggal_sph`, `luas_tanah`, `lokasi`, `jenis_tanah`, `status_kepemilikan`, `nilai_per_meter`, `tanggal_perolehan`, `bukti_kepemilikan`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, 'Santoso', '1126393910969', 'SPH/BEL/467/2009', NULL, 1.39, 'RT 04/RW 02, Belitang Jaya', 'tanah_sawah', 'warisan', 129000.00, '2009-06-20', NULL, 'Sawah dengan panen 2-3 kali setahun', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(3, 1, 'Gunawan Saputra', '1126177156016', 'SPH/BEL/145/2016', NULL, 2.36, 'Dekat Jalan Raya, Belitang Jaya', 'tanah_kering', 'warisan', 140000.00, '2016-06-10', NULL, 'Direncanakan untuk pengembangan usaha', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(4, 1, 'Kurniawan Utama', '1950334222697', 'SPH/BEL/620/2016', NULL, 1.00, 'Sebelah Timur Desa, Belitang Jaya', 'tanah_pekarangan', 'hibah', 519000.00, '2016-08-02', NULL, 'Pekarangan yang terawat dengan baik', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(5, 1, 'Purnomo', '1742631729485', 'SPH/BEL/692/2013', NULL, 4.65, 'Dusun 3, Belitang Jaya', 'tanah_perkebunan', 'jual_beli', 170000.00, '2013-10-29', NULL, 'Perkebunan dengan potensi pengembangan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(6, 1, 'Zahra Gunawan', '1121108440265', 'SPH/BEL/635/2018', NULL, 6.31, 'Sebelah Barat Desa, Belitang Jaya', 'tanah_perkebunan', 'jual_beli', 145000.00, '2018-01-24', NULL, 'Perkebunan kelapa sawit yang menghasilkan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(7, 1, 'Eko Permana', '1424737245772', 'SPH/BEL/372/2020', NULL, 0.30, 'Blok C, Belitang Jaya', 'tanah_pekarangan', 'hibah', 388000.00, '2020-09-27', NULL, 'Pekarangan dengan potensi pengembangan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(8, 1, 'Joko Pratama', '1301906462464', 'SPH/BEL/750/2019', NULL, 9.00, 'Dusun 3, Belitang Jaya', 'tanah_perkebunan', 'warisan', 108000.00, '2019-07-09', NULL, 'Perkebunan karet yang produktif', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(9, 1, 'Hesti Hartono', '1319243857445', 'SPH/BEL/807/2022', NULL, 2.15, 'Blok D, Belitang Jaya', 'tanah_sawah', 'jual_beli', 225000.00, '2022-05-19', NULL, 'Sawah dengan sumber air yang baik', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(10, 1, 'Tono', '1636881999999', 'SPH/BEL/824/2008', NULL, 9.37, 'Sebelah Selatan Desa, Belitang Jaya', 'tanah_perkebunan', 'warisan', 247000.00, '2008-01-30', NULL, 'Perkebunan kelapa sawit yang menghasilkan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(11, 1, 'Purnomo Nugraha', '1249008606634', 'SPH/BEL/543/2005', NULL, 0.50, 'Dusun 3, Belitang Jaya', 'tanah_pekarangan', 'warisan', 766000.00, '2005-10-25', NULL, 'Pekarangan dengan potensi pengembangan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(12, 2, 'Utami Putra', '1783907710163', 'SPH/SUM/851/2019', NULL, 5.59, 'Blok B, Sumber Makmur', 'tanah_perkebunan', 'milik_sendiri', 207000.00, '2019-07-15', NULL, 'Perkebunan karet yang produktif', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(13, 2, 'Hendra Saputra', '1883243449939', 'SPH/SUM/770/2008', NULL, 0.62, 'Dusun 2, Sumber Makmur', 'tanah_sawah', 'warisan', 106000.00, '2008-07-09', NULL, 'Sawah produktif dengan irigasi teknis', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(14, 2, 'Citra Kusuma', '1813002844595', 'SPH/SUM/350/2018', NULL, 2.92, 'Dusun 4, Sumber Makmur', 'tanah_kering', 'milik_sendiri', 67000.00, '2018-04-14', NULL, 'Tanah kering dengan akses jalan yang baik', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(15, 2, 'Dewi Wibowo', '1656777702373', 'SPH/SUM/220/2005', NULL, 5.73, 'RT 03/RW 02, Sumber Makmur', 'tanah_perkebunan', 'warisan', 136000.00, '2005-02-06', NULL, 'Perkebunan kelapa sawit yang menghasilkan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(16, 2, 'Budi Pratama', '1312239343872', 'SPH/SUM/946/2012', NULL, 4.00, 'Dusun 1, Sumber Makmur', 'tanah_kering', 'warisan', 163000.00, '2012-12-14', NULL, 'Tanah kering yang cocok untuk pembangunan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(17, 2, 'Hesti Gunawan', '1134762423417', 'SPH/SUM/367/2013', NULL, 3.65, 'Dusun 2, Sumber Makmur', 'tanah_kering', 'warisan', 97000.00, '2013-11-10', NULL, 'Tanah kering yang cocok untuk pembangunan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(18, 2, 'Wati Kusuma', '1544793126992', 'SPH/SUM/573/2013', NULL, 2.60, 'Dekat Sungai, Sumber Makmur', 'tanah_kering', 'hibah', 168000.00, '2013-08-10', NULL, 'Tanah kering yang cocok untuk pembangunan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(19, 2, 'Irfan Wijaya', '1273485985306', 'SPH/SUM/647/2023', NULL, 3.29, 'Dusun 1, Sumber Makmur', 'tanah_kering', 'jual_beli', 170000.00, '2023-08-25', NULL, 'Direncanakan untuk pengembangan usaha', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(20, 2, 'Gita Setiawan', '1897448208046', 'SPH/SUM/466/2023', NULL, 1.70, 'Dusun 4, Sumber Makmur', 'tanah_sawah', 'hibah', 185000.00, '2023-04-08', NULL, 'Sawah produktif dengan irigasi teknis', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(21, 3, 'Ahmad', '1729675587056', 'SPH/MAJ/211/2007', NULL, 0.50, 'RT 01/RW 01, Maju Bersama', 'tanah_pekarangan', 'warisan', 421000.00, '2007-12-17', NULL, 'Pekarangan rumah dengan tanaman produktif', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(22, 3, 'Hendra Permana', '1686737807199', 'SPH/MAJ/316/2021', NULL, 2.54, 'Sebelah Barat Desa, Maju Bersama', 'tanah_kering', 'milik_sendiri', 150000.00, '2021-03-19', NULL, 'Belum dimanfaatkan secara optimal', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(23, 3, 'Tari', '1977910661043', 'SPH/MAJ/703/2018', NULL, 1.69, 'Sebelah Selatan Desa, Maju Bersama', 'tanah_sawah', 'jual_beli', 249000.00, '2018-06-24', NULL, 'Sawah produktif dengan irigasi teknis', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(24, 3, 'Muhammad', '1239917748837', 'SPH/MAJ/659/2020', NULL, 2.17, 'Dusun 4, Maju Bersama', 'tanah_kering', 'milik_sendiri', 88000.00, '2020-03-15', NULL, 'Tanah kering yang cocok untuk pembangunan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(25, 3, 'Hesti Wijaya', '1635382509439', 'SPH/MAJ/541/2013', NULL, 5.56, 'Sebelah Timur Desa, Maju Bersama', 'tanah_perkebunan', 'jual_beli', 110000.00, '2013-06-12', NULL, 'Perkebunan dengan potensi pengembangan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(26, 3, 'Muhammad', '1946881460554', 'SPH/MAJ/482/2012', NULL, 2.71, 'RT 04/RW 02, Maju Bersama', 'tanah_sawah', 'warisan', 259000.00, '2012-05-13', NULL, 'Sawah dengan panen 2-3 kali setahun', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(27, 3, 'Juwita Hartono', '1459534809765', 'SPH/MAJ/239/2008', NULL, 4.71, 'Blok D, Maju Bersama', 'tanah_perkebunan', 'warisan', 211000.00, '2008-03-31', NULL, 'Perkebunan kelapa sawit yang menghasilkan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(28, 3, 'Tari', '1335955556322', 'SPH/MAJ/755/2019', NULL, 0.30, 'Blok D, Maju Bersama', 'tanah_pekarangan', 'warisan', 429000.00, '2019-01-01', NULL, 'Pekarangan rumah dengan tanaman produktif', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(29, 4, 'Lukman Kurniawan', '1903569793649', 'SPH/SEJ/819/2024', NULL, 0.30, 'Sebelah Timur Desa, Sejahtera Indah', 'tanah_pekarangan', 'warisan', 593000.00, '2024-01-28', NULL, 'Pekarangan yang terawat dengan baik', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(30, 4, 'Gunawan Wijaya', '1397034892571', 'SPH/SEJ/932/2014', NULL, 1.28, 'Blok C, Sejahtera Indah', 'tanah_kering', 'hibah', 121000.00, '2014-03-13', NULL, 'Direncanakan untuk pengembangan usaha', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(31, 4, 'Gunawan Pratama', '1234131674061', 'SPH/SEJ/267/2017', NULL, 1.57, 'Sebelah Barat Desa, Sejahtera Indah', 'tanah_kering', 'milik_sendiri', 136000.00, '2017-07-21', NULL, 'Tanah kering yang cocok untuk pembangunan', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(32, 4, 'Utami', '1320492209735', 'SPH/SEJ/695/2015', NULL, 5.37, 'Blok A, Sejahtera Indah', 'tanah_perkebunan', 'milik_sendiri', 213000.00, '2015-04-03', NULL, 'Perkebunan karet yang produktif', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(33, 4, 'Lestari', '1585728434178', 'SPH/SEJ/313/2016', NULL, 3.68, 'Blok A, Sejahtera Indah', 'tanah_kering', 'milik_sendiri', 60000.00, '2016-11-01', NULL, 'Direncanakan untuk pengembangan usaha', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(34, 4, 'Ani Utama', '1757091277702', 'SPH/SEJ/903/2021', NULL, 1.83, 'Blok B, Sejahtera Indah', 'tanah_sawah', 'jual_beli', 209000.00, '2021-07-09', NULL, 'Sawah dengan sumber air yang baik', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(35, 4, 'Santoso Setiawan', '1409332615829', 'SPH/SEJ/423/2022', NULL, 1.01, 'Sebelah Barat Desa, Sejahtera Indah', 'tanah_kering', 'hibah', 166000.00, '2022-02-25', NULL, 'Direncanakan untuk pengembangan usaha', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(36, 4, 'Hesti Kusuma', '1436937950085', 'SPH/SEJ/996/2006', NULL, 2.51, 'Dusun 2, Sejahtera Indah', 'tanah_sawah', 'warisan', 226000.00, '2006-01-10', NULL, 'Sawah yang dikelola secara tradisional', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(37, 4, 'Budi', '1627961809474', 'SPH/SEJ/914/2018', NULL, 1.84, 'RT 01/RW 01, Sejahtera Indah', 'tanah_kering', 'milik_sendiri', 188000.00, '2018-07-29', NULL, 'Tanah kering dengan akses jalan yang baik', '2025-09-10 21:34:56', '2025-09-10 21:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desas`
--

CREATE TABLE `desas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sk_kepala_desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `luas_wilayah` decimal(10,2) DEFAULT NULL,
  `komoditas_unggulan` text COLLATE utf8mb4_unicode_ci,
  `kondisi_sosial_ekonomi` text COLLATE utf8mb4_unicode_ci,
  `monografi_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','tidak_aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `desas`
--

INSERT INTO `desas` (`id`, `nama_desa`, `kode_desa`, `kepala_desa`, `sk_kepala_desa`, `alamat`, `kode_pos`, `latitude`, `longitude`, `luas_wilayah`, `komoditas_unggulan`, `kondisi_sosial_ekonomi`, `monografi_file`, `status`, `last_updated_at`, `created_at`, `updated_at`) VALUES
(1, 'Belitang Jaya Sentosa', 'BJ001', 'Budi Santoso', 'sk-kepala-desa/jpkvJi5oSMoFn20gWogpw5x0NDJ70XdQrsNxCT7a.pdf', 'Jl. Raya Belitang Jaya No. 1', '30811', -5.41660000, 105.25330000, 25.50, 'Padi, Kelapa Sawit, Karet', 'Mayoritas penduduk bekerja sebagai petani dan buruh perkebunan', 'monografi/3PktPs9fNkpplxQYDpvOlpWPtgHyftLDiAmciEFH.pdf', 'aktif', '2025-09-13 04:39:26', '2025-09-10 21:34:55', '2025-09-13 04:39:26'),
(2, 'Sumber Makmur', 'SM002', 'Ahmad Yani', NULL, 'Jl. Sumber Makmur No. 15', '30812', -2.95840000, 104.74040000, 30.75, 'Kelapa Sawit, Karet, Jagung', 'Desa dengan potensi perkebunan yang baik', NULL, 'aktif', '2025-09-05 21:34:55', '2025-09-10 21:34:55', '2025-09-10 21:34:55'),
(3, 'Maju Bersama', 'MB003', 'Siti Nurhaliza', NULL, 'Jl. Maju Bersama No. 8', '30813', -2.97840000, 104.71940000, 22.30, 'Padi, Sayuran, Perikanan', 'Desa dengan sektor pertanian dan perikanan yang berkembang', NULL, 'aktif', '2025-08-26 21:34:55', '2025-09-10 21:34:55', '2025-09-10 21:34:55'),
(4, 'Sejahtera Indah', 'SI004', 'Rudi Hartono', NULL, 'Jl. Sejahtera No. 25', '30814', -2.94840000, 104.74940000, 28.90, 'Kelapa Sawit, Karet', 'Desa dengan tingkat kesejahteraan yang baik', NULL, 'aktif', '2025-09-13 04:48:01', '2025-09-10 21:34:56', '2025-09-13 04:48:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint UNSIGNED NOT NULL,
  `desa_id` bigint UNSIGNED DEFAULT NULL,
  `nama_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `kategori` enum('surat','laporan','peraturan','pedoman','lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_by` bigint UNSIGNED NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumens`
--

INSERT INTO `dokumens` (`id`, `desa_id`, `nama_dokumen`, `deskripsi`, `kategori`, `file_path`, `file_type`, `file_size`, `uploaded_by`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 1, 'aturan rumah', 'Surat Tanah', 'surat', 'dokumen/1/1757632805_aset-desa-Belitang Jaya.pdf', 'application/pdf', 4810, 2, 0, '2025-09-12 02:20:05', '2025-09-12 02:20:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_07_133101_create_desas_table', 1),
(5, '2025_09_07_133110_create_penduduks_table', 1),
(6, '2025_09_07_133118_create_perangkat_desas_table', 1),
(7, '2025_09_07_133206_create_aset_desas_table', 1),
(8, '2025_09_07_133218_create_aset_tanah_wargas_table', 1),
(9, '2025_09_07_133226_create_dokumens_table', 1),
(10, '2025_09_07_175139_create_riwayat_perangkat_desas_table', 1),
(11, '2025_09_07_175147_create_riwayat_aset_desas_table', 1),
(12, '2025_09_07_175156_add_is_current_to_perangkat_desas_table', 1),
(13, '2025_09_07_175205_add_is_current_to_aset_desas_table', 1),
(14, '2025_09_07_182856_add_fields_to_users_table', 1),
(15, '2025_09_08_165331_update_kategori_enum_in_dokumens_table', 1),
(20, '2025_09_08_184428_create_activities_table', 2),
(21, '2025_09_11_fix_action_type_enum_in_riwayat_aset_desas_table', 3),
(22, '2025_09_11_222513_add_tanggal_sph_to_aset_tanah_wargas_table', 4),
(24, '2025_09_12_181412_create_riwayat_penduduks_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduks`
--

CREATE TABLE `penduduks` (
  `id` bigint UNSIGNED NOT NULL,
  `desa_id` bigint UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buddha','Konghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` enum('Belum Kawin','Kawin','Cerai Hidup','Cerai Mati') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` enum('Tidak Sekolah','SD','SMP','SMA','D3','S1','S2','S3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memiliki_ktp` tinyint(1) NOT NULL DEFAULT '0',
  `tanggal_rekam_ktp` date DEFAULT NULL,
  `klasifikasi_usia` enum('Balita','Anak-anak','Remaja','Dewasa','Lansia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penduduks`
--

INSERT INTO `penduduks` (`id`, `desa_id`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_perkawinan`, `pekerjaan`, `pendidikan_terakhir`, `alamat`, `rt`, `rw`, `memiliki_ktp`, `tanggal_rekam_ktp`, `klasifikasi_usia`, `created_at`, `updated_at`) VALUES
(1, 1, '1602398763559', 'Muhammad', 'L', 'Martapura', '2004-08-16', 'Konghucu', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Belitang Jaya', '09', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(2, 1, '1701707861969', 'Dewi Wibowo', 'P', 'Baturaja', '1994-12-13', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Belitang Jaya', '06', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(3, 1, '1942958813275', 'Dedi Susanto', 'L', 'Pagaralam', '1961-03-05', 'Kristen', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Belitang Jaya', '09', '02', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(5, 1, '1395878124673', 'Bintang Suryadi', 'P', 'Belitang', '1965-12-14', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Belitang Jaya', '09', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(6, 1, '1763900977367', 'Utami Utama', 'P', 'Lubuk Linggau', '1970-09-20', 'Katolik', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Belitang Jaya', '10', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(7, 1, '1768365356923', 'Gunawan Firmansyah', 'L', 'Prabumulih', '1980-03-27', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Belitang Jaya', '05', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(8, 1, '1110383292155', 'Budi Susanto', 'L', 'Palembang', '1981-04-16', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Belitang Jaya', '09', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(9, 1, '1702727324832', 'Dewi Wijaya', 'P', 'Lahat', '2013-06-23', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Belitang Jaya', '09', '04', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(10, 1, '1166765780529', 'Hesti', 'P', 'Muara Enim', '1995-12-15', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Belitang Jaya', '10', '02', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(11, 1, '1445391698192', 'Tari', 'P', 'Muara Enim', '2000-03-09', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Belitang Jaya', '02', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(12, 1, '1438675323868', 'Putri', 'P', 'Martapura', '1995-09-07', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Belitang Jaya', '02', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(13, 1, '1869512831654', 'Putri Setiawan', 'P', 'Indralaya', '1959-01-01', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Belitang Jaya', '06', '03', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(14, 1, '1301581474135', 'Tari', 'P', 'Kayu Agung', '2010-02-19', 'Katolik', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Belitang Jaya', '03', '02', 0, NULL, 'Remaja', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(15, 1, '1344909209679', 'Tari Utama', 'P', 'Kayu Agung', '1987-04-07', 'Kristen', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Belitang Jaya', '08', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(16, 1, '1825889214074', 'Dedi Setiawan', 'L', 'Martapura', '1994-03-22', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Belitang Jaya', '03', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(17, 1, '1231946845088', 'Gita Kusuma', 'P', 'Baturaja', '2018-02-04', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Belitang Jaya', '09', '05', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(18, 1, '1618917600293', 'Purnomo', 'L', 'Pagaralam', '1950-03-28', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Belitang Jaya', '05', '02', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(19, 1, '1823954160827', 'Mawar Hidayat', 'P', 'Pagaralam', '1976-03-18', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Belitang Jaya', '04', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(20, 1, '1839694666244', 'Wati Santoso', 'P', 'Muaradua', '2005-11-27', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Belitang Jaya', '04', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(21, 1, '1210951147158', 'Utami', 'P', 'Palembang', '1998-11-25', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Belitang Jaya', '02', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(22, 1, '1842607234733', 'Muhammad', 'L', 'Pagaralam', '1980-04-12', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Belitang Jaya', '09', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(23, 1, '1894238842173', 'Endang Suryadi', 'P', 'Indralaya', '2007-04-09', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Belitang Jaya', '05', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(24, 1, '1655696375318164', 'Ani Pratama Arhan', 'P', 'Lubuk Linggau', '1976-09-24', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Belitang Jaya', '10', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-11 21:45:57'),
(25, 2, '1912643394967', 'Sari Saputra', 'P', 'Pagaralam', '1963-04-18', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sumber Makmur', '01', '02', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(26, 2, '1994449578116', 'Irfan Ramadhan', 'L', 'Prabumulih', '1967-03-18', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sumber Makmur', '05', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(27, 2, '1593886331234', 'Yusuf Kusuma', 'L', 'Prabumulih', '1981-05-06', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sumber Makmur', '09', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(28, 2, '1727740227586', 'Nita Pradana', 'P', 'Belitang', '1983-01-05', 'Hindu', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sumber Makmur', '05', '02', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(29, 2, '1680999102786', 'Rudi', 'L', 'Lahat', '2004-06-03', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Sumber Makmur', '09', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(30, 2, '1232115555516', 'Ahmad', 'L', 'Martapura', '2017-11-03', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sumber Makmur', '02', '02', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(31, 2, '1890647365486', 'Wahyu Hidayat', 'L', 'Indralaya', '2016-04-15', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sumber Makmur', '02', '01', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(32, 2, '1419401145065', 'Citra Wijaya', 'P', 'Lubuk Linggau', '2017-11-12', 'Hindu', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Sumber Makmur', '01', '01', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(33, 2, '1636518426477', 'Santoso Wibowo', 'L', 'Indralaya', '1979-10-17', 'Hindu', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sumber Makmur', '02', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(34, 2, '1610258885166', 'Wahyu Permana', 'L', 'Indralaya', '2008-12-07', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sumber Makmur', '07', '02', 0, NULL, 'Remaja', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(35, 2, '1524068523469', 'Nita Hartono', 'P', 'Prabumulih', '1964-12-01', 'Hindu', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Sumber Makmur', '09', '04', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(36, 2, '1484405739134', 'Nanda Ramadhan', 'L', 'Indralaya', '1963-09-15', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sumber Makmur', '09', '03', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(37, 2, '1634161451739', 'Faisal Hartono', 'L', 'Baturaja', '1974-12-11', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Sumber Makmur', '08', '02', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(38, 2, '1739457789058', 'Ratna Pratama', 'P', 'Belitang', '1991-04-08', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Sumber Makmur', '08', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(39, 2, '1999435187805', 'Ahmad Putra', 'L', 'Muara Enim', '1987-06-23', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sumber Makmur', '07', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(40, 2, '1558272922028', 'Budi Hidayat', 'L', 'Muaradua', '1976-05-22', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sumber Makmur', '04', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(41, 2, '1881011896282', 'Mawar Pratama', 'P', 'Muara Enim', '2005-07-06', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Sumber Makmur', '07', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(42, 2, '1101523958965', 'Kurniawan', 'L', 'Martapura', '2010-12-15', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Sumber Makmur', '02', '03', 0, NULL, 'Remaja', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(43, 2, '1631274729633', 'Ratna Hidayat', 'P', 'Martapura', '2003-11-18', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sumber Makmur', '02', '02', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(44, 2, '1113367859133', 'Rudi Kurniawan', 'L', 'Belitang', '2005-06-02', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sumber Makmur', '07', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(45, 2, '1605002581639', 'Citra', 'P', 'Kayu Agung', '1960-01-24', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sumber Makmur', '04', '03', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(46, 2, '1823028357372', 'Gunawan Santoso', 'L', 'Lubuk Linggau', '2002-09-22', 'Kristen', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sumber Makmur', '01', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(47, 2, '1152804590458', 'Gita Santoso', 'P', 'Muara Enim', '2007-04-21', 'Hindu', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sumber Makmur', '04', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(48, 2, '1414659867903', 'Hesti Utama', 'P', 'Kayu Agung', '1990-09-04', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sumber Makmur', '08', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(49, 2, '1194340950204', 'Hesti', 'P', 'Belitang', '1953-09-02', 'Kristen', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sumber Makmur', '04', '04', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(50, 3, '1378286526019', 'Yusuf Putra', 'L', 'Pagaralam', '1950-02-15', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Maju Bersama', '07', '03', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(51, 3, '1470425450493', 'Ratna Nugraha', 'P', 'Indralaya', '1974-11-01', 'Katolik', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Maju Bersama', '01', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(52, 3, '1474432406028', 'Vina Permana', 'P', 'Indralaya', '1986-12-02', 'Katolik', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Maju Bersama', '09', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(53, 3, '1811749440788', 'Juwita Gunawan', 'P', 'Prabumulih', '1988-05-17', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Maju Bersama', '10', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(54, 3, '1384713542838', 'Faisal Gunawan', 'L', 'Martapura', '1998-06-24', 'Katolik', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Maju Bersama', '01', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(55, 3, '1934930693488', 'Bintang Permana', 'P', 'Baturaja', '2019-05-24', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Maju Bersama', '02', '05', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(56, 3, '1864164696448', 'Eko Wibowo', 'L', 'Baturaja', '2017-11-27', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Maju Bersama', '05', '02', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(57, 3, '1374928504664', 'Ratna Putra', 'P', 'Belitang', '2011-08-26', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Maju Bersama', '07', '04', 0, NULL, 'Remaja', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(58, 3, '1595531556701', 'Fitri Hartono', 'P', 'Pagaralam', '1956-04-20', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Maju Bersama', '06', '02', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(59, 3, '1530534596451', 'Hendra', 'L', 'Palembang', '1955-10-01', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Maju Bersama', '03', '05', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(60, 3, '1970807151979', 'Kartika', 'P', 'Kayu Agung', '2023-06-22', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Maju Bersama', '05', '02', 0, NULL, 'Balita', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(61, 3, '1263125147875', 'Nanda Setiawan', 'L', 'Lubuk Linggau', '1954-12-17', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Maju Bersama', '08', '05', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(62, 3, '1826076749134', 'Zaenal Wijaya', 'L', 'Muara Enim', '1967-07-07', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Maju Bersama', '07', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(63, 3, '1811061343295', 'Lukman Wibowo', 'L', 'Lahat', '1954-06-21', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Maju Bersama', '03', '05', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(64, 3, '1233335988048', 'Gunawan Suryadi', 'L', 'Lahat', '1987-05-15', 'Katolik', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Maju Bersama', '09', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(65, 3, '1361925617042', 'Hendra Wibowo', 'L', 'Lahat', '1997-03-17', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Maju Bersama', '01', '02', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(66, 3, '1836467120748', 'Indah Permana', 'P', 'Baturaja', '1974-04-13', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Maju Bersama', '10', '02', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(67, 3, '1636622763303', 'Citra Firmansyah', 'P', 'Palembang', '2016-09-03', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Maju Bersama', '03', '01', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(68, 3, '1216887681945', 'Sari Firmansyah', 'P', 'Muara Enim', '2005-11-21', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Maju Bersama', '06', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(69, 3, '1458770643444', 'Kurniawan Utama', 'L', 'Prabumulih', '2015-08-22', 'Buddha', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Maju Bersama', '04', '04', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(70, 3, '1602315246468', 'Kartika Pradana', 'P', 'Indralaya', '2021-08-20', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Maju Bersama', '02', '04', 0, NULL, 'Balita', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(71, 3, '1457022248659', 'Sari Suryadi', 'P', 'Lubuk Linggau', '1960-12-05', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Maju Bersama', '06', '01', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(72, 3, '1562484246167', 'Muhammad', 'L', 'Martapura', '1971-12-05', 'Kristen', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Maju Bersama', '04', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(73, 3, '1703456275429', 'Ahmad Nugraha', 'L', 'Lahat', '1968-05-02', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Maju Bersama', '09', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(74, 3, '1868154806973', 'Nita Putra', 'P', 'Belitang', '1963-04-20', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Maju Bersama', '09', '05', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(75, 4, '1456538187236', 'Kurniawan Wibowo', 'L', 'Muaradua', '1970-06-11', 'Kristen', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sejahtera Indah', '07', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(76, 4, '1276009189605', 'Oktavia Santoso', 'P', 'Indralaya', '1964-07-18', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Sejahtera Indah', '05', '02', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(77, 4, '1943722647938', 'Santoso Wijaya', 'L', 'Prabumulih', '1970-03-10', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Sejahtera Indah', '09', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(78, 4, '1215457925736', 'Wahyu', 'L', 'Indralaya', '1987-09-07', 'Kristen', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Sejahtera Indah', '06', '02', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(79, 4, '1132478605366', 'Mawar Permana', 'P', 'Martapura', '2019-02-11', 'Buddha', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sejahtera Indah', '10', '01', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(80, 4, '1413058803348', 'Hesti', 'P', 'Prabumulih', '1991-10-14', 'Katolik', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Sejahtera Indah', '09', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(81, 4, '1755959848424', 'Gunawan', 'L', 'Pagaralam', '1982-09-24', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sejahtera Indah', '09', '01', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(82, 4, '1799600521524', 'Budi Hidayat', 'L', 'Lubuk Linggau', '1965-03-18', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sejahtera Indah', '02', '02', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(83, 4, '1891895655947', 'Budi Wibowo', 'L', 'Prabumulih', '1965-11-06', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sejahtera Indah', '08', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(84, 4, '1225829632423', 'Hesti Wijaya', 'P', 'Palembang', '1957-01-23', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sejahtera Indah', '02', '05', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(85, 4, '1260891184099458', 'Ahmad Rocksid', 'L', 'Pagaralam', '2000-03-10', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sejahtera Indah', '05', '05', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-13 03:53:40'),
(86, 4, '1478831623581', 'Ani Pratama', 'P', 'Lubuk Linggau', '1998-08-15', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sejahtera Indah', '04', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(87, 4, '1472110373402', 'Yanti', 'P', 'Kayu Agung', '1970-12-02', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Sejahtera Indah', '10', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(88, 4, '1214462293646', 'Tari Wibowo', 'P', 'Kayu Agung', '2022-10-16', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sejahtera Indah', '07', '01', 0, NULL, 'Balita', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(89, 4, '1100455395988', 'Gunawan', 'L', 'Belitang', '2003-11-08', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 1, Sejahtera Indah', '07', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(90, 4, '1107692673483', 'Endang Utama', 'P', 'Pagaralam', '1953-03-19', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sejahtera Indah', '01', '01', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(91, 4, '1843420186665', 'Purnomo Suryadi', 'L', 'Baturaja', '2022-12-06', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sejahtera Indah', '01', '05', 0, NULL, 'Balita', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(92, 4, '1860059789667', 'Wahyu', 'L', 'Muara Enim', '2020-08-07', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 2, Sejahtera Indah', '05', '04', 0, NULL, 'Anak-anak', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(93, 4, '1196449606661', 'Dedi Pradana', 'L', 'Pagaralam', '1954-12-19', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sejahtera Indah', '07', '03', 0, NULL, 'Lansia', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(94, 4, '1825904130788', 'Eko Hartono', 'L', 'Pagaralam', '2004-11-27', 'Kristen', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Sejahtera Indah', '06', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(95, 4, '1249077787159', 'Citra Pratama', 'P', 'Muara Enim', '1992-01-08', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Sejahtera Indah', '09', '03', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(96, 4, '1916387945264', 'Utami Kurniawan', 'P', 'Lubuk Linggau', '2011-07-10', 'Katolik', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 5, Sejahtera Indah', '08', '03', 0, NULL, 'Remaja', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(97, 4, '1286923100727', 'Gita Santoso', 'P', 'Belitang', '1972-07-08', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 3, Sejahtera Indah', '08', '04', 0, NULL, 'Dewasa', '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(99, 3, '1279653201564896', 'Rusdi Turke', 'L', 'Lubuk Linggau', '2016-01-12', 'Islam', 'Belum Kawin', 'Pelajar', 'SD', 'jl. oploi', '004', '002', 0, NULL, 'Anak-anak', '2025-09-12 21:03:16', '2025-09-12 21:03:16'),
(100, 4, '1235496523012360', 'Ahmad Huji', 'L', 'Pagaralam', '2000-03-10', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sejahtera Indah', '05', '05', 0, NULL, 'Dewasa', '2025-09-12 21:09:02', '2025-09-12 21:09:02'),
(101, 2, '1235496956012360', 'Ahmad Jike', 'L', 'Martapura', '2017-11-03', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sumber Makmur', '02', '02', 0, NULL, 'Anak-anak', '2025-09-12 21:09:02', '2025-09-12 21:09:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkat_desas`
--

CREATE TABLE `perangkat_desas` (
  `id` bigint UNSIGNED NOT NULL,
  `desa_id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai_tugas` date NOT NULL,
  `tanggal_akhir_tugas` date DEFAULT NULL,
  `sk_pengangkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jobdesk` text COLLATE utf8mb4_unicode_ci,
  `status` enum('aktif','tidak_aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `is_current` tinyint(1) NOT NULL DEFAULT '1',
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `update_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perangkat_desas`
--

INSERT INTO `perangkat_desas` (`id`, `desa_id`, `nama_lengkap`, `jabatan`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan_terakhir`, `alamat`, `no_telepon`, `tanggal_mulai_tugas`, `tanggal_akhir_tugas`, `sk_pengangkatan`, `jobdesk`, `status`, `is_current`, `updated_by`, `update_reason`, `created_at`, `updated_at`) VALUES
(2, 1, 'Rudi Wijaya', 'Kepala Seksi Pemerintahan', '1270788387441', 'Belitang', '1976-05-13', 'L', 'D3', 'Dusun 3, Belitang Jaya', '08676908307', '2024-03-02', NULL, NULL, 'Menyusun rancangan regulasi desa', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(3, 1, 'Lukman Putra Hakim', 'Kepala Dusun 2', '1121629171588449', 'Indralaya', '1988-07-08', 'L', 'SD', 'Dusun 3, Belitang Jaya', '08184850200', '2024-02-03', '2029-09-10', NULL, 'Melaksanakan keputusan dan kebijakan Kepala Desa', 'aktif', 1, 2, 'ubah nama', '2025-09-10 21:34:56', '2025-09-11 04:29:17'),
(4, 1, 'Vina', 'Kepala Seksi Kesejahteraan', '1104916536179', 'Pagaralam', '1975-04-03', 'P', 'S2', 'Dusun 4, Belitang Jaya', '08949907816', '2020-06-20', NULL, NULL, 'Mengelola program kesejahteraan masyarakat', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(5, 1, 'Budi Santoso aja', 'Kepala Dusun 1', '1687193344715148', 'Pagaralam', '1972-02-13', 'L', 'S2', 'Dusun 2, Belitang Jaya', '08567994357', '2019-10-24', '2028-10-20', NULL, 'Membantu pelaksanaan tugas Kepala Desa di wilayah dusun', 'aktif', 1, 2, 'ubah nama', '2025-09-10 21:34:56', '2025-09-11 04:24:06'),
(6, 2, 'Indah Wibowo', 'Kepala Dusun 3', '1237162519658', 'Belitang', '1979-09-02', 'P', 'SMA', 'Dusun 5, Sumber Makmur', '08427859614', '2022-12-01', NULL, NULL, 'Melaksanakan kegiatan pemerintahan, pembangunan, dan kemasyarakatan di dusun', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(7, 2, 'Joko Santoso', 'Bendahara Desa', '1891928715228', 'Martapura', '1987-04-27', 'L', 'S2', 'Dusun 3, Sumber Makmur', '08927462687', '2022-10-25', NULL, NULL, 'Melakukan tutup buku setiap akhir bulan', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(8, 2, 'Umar', 'Kepala Dusun 1', '1920183281605', 'Baturaja', '1979-02-25', 'L', 'D3', 'Dusun 4, Sumber Makmur', '08583894660', '2023-08-25', NULL, NULL, 'Melaksanakan keputusan dan kebijakan Kepala Desa', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(9, 2, 'Kurniawan Nugraha', 'Kepala Urusan Umum', '1837774342254', 'Indralaya', '2000-10-10', 'L', 'SMA', 'Dusun 3, Sumber Makmur', '08477019773', '2021-09-11', NULL, NULL, 'Melaksanakan urusan perlengkapan, aset, dan inventarisasi', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(10, 2, 'Hesti Wijaya', 'Kepala Seksi Kesejahteraan', '1366522600033', 'Pagaralam', '1979-04-09', 'P', 'SMA', 'Dusun 3, Sumber Makmur', '08993872467', '2022-09-29', '2029-01-04', NULL, 'Melaksanakan pembinaan kemasyarakatan desa', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(11, 3, 'Joko Kurniawan', 'Staf Administrasi', '1523276434551', 'Baturaja', '1986-03-19', 'L', 'S1', 'Dusun 1, Maju Bersama', '08996835074', '2023-08-13', NULL, NULL, 'Membantu persiapan rapat dan notulensi', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(12, 3, 'Oki', 'Operator Desa', '1822571987748', 'Lubuk Linggau', '1975-02-04', 'L', 'SMA', 'Dusun 3, Maju Bersama', '08479301650', '2020-05-27', NULL, NULL, 'Memelihara perangkat teknologi informasi desa', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(13, 3, 'Bintang Pratama', 'Kepala Dusun 2', '1392600362447', 'Martapura', '1981-09-22', 'P', 'D3', 'Dusun 2, Maju Bersama', '08931984714', '2023-12-16', NULL, NULL, 'Membina dan meningkatkan swadaya gotong royong', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(14, 3, 'Tono Saputra', 'Kepala Urusan Umum', '1129623574498', 'Belitang', '1981-04-04', 'L', 'S1', 'Dusun 3, Maju Bersama', '08615537780', '2023-10-30', NULL, NULL, 'Melaksanakan urusan perlengkapan, aset, dan inventarisasi', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(15, 3, 'Lukman Setiawan', 'Kepala Dusun 1', '1368076470383', 'Kayu Agung', '1987-02-20', 'L', 'SMA', 'Dusun 1, Maju Bersama', '08253057773', '2022-05-15', NULL, NULL, 'Melaksanakan kegiatan pemerintahan, pembangunan, dan kemasyarakatan di dusun', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(16, 3, 'Wahyu', 'Bendahara Desa', '1288507138715', 'Lubuk Linggau', '1990-11-06', 'L', 'D3', 'Dusun 3, Maju Bersama', '08329138978', '2024-02-06', NULL, NULL, 'Mempertanggungjawabkan uang melalui laporan pertanggungjawaban', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(17, 3, 'Yanti Firmansyah', 'Kepala Seksi Pelayanan', '1799493716887', 'Lubuk Linggau', '1987-05-18', 'P', 'D3', 'Dusun 2, Maju Bersama', '08516966553', '2024-05-13', NULL, NULL, 'Melaksanakan penyuluhan dan motivasi terhadap pelaksanaan hak dan kewajiban masyarakat', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(18, 3, 'Faisal Pradana', 'Kepala Seksi Kesejahteraan', '1184777287715', 'Kayu Agung', '1991-05-25', 'L', 'D3', 'Dusun 5, Maju Bersama', '08742733277', '2020-04-10', NULL, NULL, 'Melaksanakan pembangunan sarana prasarana desa', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(19, 4, 'Faisal Putra', 'Staf Administrasi', '1855863750726', 'Lubuk Linggau', '1977-12-28', 'L', 'D3', 'Dusun 4, Sejahtera Indah', '08852658296', '2022-05-28', NULL, NULL, 'Membantu persiapan rapat dan notulensi', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(20, 4, 'Nanda Permana', 'Kepala Dusun 2', '1332043588407', 'Pagaralam', '1978-09-22', 'L', 'S1', 'Dusun 1, Sejahtera Indah', '08189194464', '2024-08-29', '2030-04-21', NULL, 'Membantu pelaksanaan tugas Kepala Desa di wilayah dusun', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(21, 4, 'Umar Firmansyah', 'Kepala Seksi Kesejahteraan', '1607036371774', 'Muaradua', '1981-04-14', 'L', 'S2', 'Dusun 3, Sejahtera Indah', '08737353847', '2023-06-04', NULL, NULL, 'Melaksanakan pembinaan kemasyarakatan desa', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(22, 4, 'Sari Wibowo', 'Kepala Urusan Keuangan', '1423939318423', 'Lahat', '1986-09-16', 'P', 'D3', 'Dusun 4, Sejahtera Indah', '08662234663', '2020-12-23', '2028-07-31', NULL, 'Melaksanakan pengelolaan administrasi keuangan desa', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(23, 4, 'Budi', 'Kepala Seksi Pelayanan', '1577628856471', 'Muara Enim', '1976-03-21', 'L', 'S1', 'Dusun 3, Sejahtera Indah', '08919970162', '2022-06-27', NULL, NULL, 'Melaksanakan pelayanan kepada masyarakat', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(24, 4, 'Kurniawan Pradana', 'Bendahara Desa', '1603204777405', 'Lahat', '1974-11-18', 'L', 'S1', 'Dusun 4, Sejahtera Indah', '08937495313', '2020-08-12', NULL, NULL, 'Menerima, menyimpan, menyetorkan, menatausahakan, dan mempertanggungjawabkan keuangan desa', 'aktif', 1, 1, NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_aset_desas`
--

CREATE TABLE `riwayat_aset_desas` (
  `id` bigint UNSIGNED NOT NULL,
  `aset_desa_id` bigint UNSIGNED NOT NULL,
  `desa_id` bigint UNSIGNED NOT NULL,
  `kategori_aset` enum('tanah','bangunan','inventaris') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `nilai_perolehan` decimal(15,2) DEFAULT NULL,
  `nilai_sekarang` decimal(15,2) DEFAULT NULL,
  `tanggal_perolehan` date NOT NULL,
  `kondisi` enum('baik','rusak_ringan','rusak_berat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_kepemilikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `action_type` enum('create','update','delete','created','updated','deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `changed_by` bigint UNSIGNED NOT NULL,
  `change_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_aset_desas`
--

INSERT INTO `riwayat_aset_desas` (`id`, `aset_desa_id`, `desa_id`, `kategori_aset`, `nama_aset`, `deskripsi`, `nilai_perolehan`, `nilai_sekarang`, `tanggal_perolehan`, `kondisi`, `lokasi`, `bukti_kepemilikan`, `keterangan`, `action_type`, `changed_by`, `change_reason`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'inventaris', 'AC 3 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'updated', 2, NULL, '2025-09-11 22:12:26', '2025-09-11 22:12:26'),
(2, 30, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'created', 2, 'Data aset desa baru ditambahkan', '2025-09-11 22:12:26', '2025-09-11 22:12:26'),
(3, 31, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'created', 2, 'Data aset desa baru ditambahkan', '2025-09-11 22:12:39', '2025-09-11 22:12:39'),
(4, 32, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'created', 2, 'Data aset desa baru ditambahkan', '2025-09-11 22:19:54', '2025-09-11 22:19:54'),
(5, 32, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'updated', 2, 'update jumlah', '2025-09-11 22:19:54', '2025-09-11 22:19:54'),
(6, 32, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'updated', 2, 'update jumlah', '2025-09-11 22:39:46', '2025-09-11 22:39:46'),
(7, 32, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'deleted', 2, 'Penghapusan aset', '2025-09-11 22:39:46', '2025-09-11 22:39:46'),
(8, 30, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'updated', 2, 'perubahan jumlah', '2025-09-11 22:40:08', '2025-09-11 22:40:08'),
(9, 33, 1, 'inventaris', 'AC 4 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'created', 2, 'Data aset desa baru ditambahkan', '2025-09-11 22:40:08', '2025-09-11 22:40:08'),
(10, 33, 1, 'inventaris', 'AC 4 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'updated', 2, 'ubah jumlah ac', '2025-09-11 22:40:08', '2025-09-11 22:40:08'),
(11, 31, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'updated', 2, 'perubahan jumlah', '2025-09-11 22:54:27', '2025-09-11 22:54:27'),
(12, 31, 1, 'inventaris', 'AC 2 Unit', 'Inventaris untuk pelayanan masyarakat', 43000000.00, 27520000.00, '2018-02-22', 'rusak_ringan', 'Ruang Kepala Desa, Belitang Jaya', NULL, 'Masih bisa digunakan dengan keterbatasan', 'deleted', 2, 'Penghapusan aset', '2025-09-11 22:54:27', '2025-09-11 22:54:27'),
(14, 35, 4, 'bangunan', 'Aula', NULL, 5000000.00, 500000000.00, '2004-03-05', 'baik', 'jklguyugggugyu', NULL, NULL, 'created', 1, 'Data aset desa baru ditambahkan', '2025-09-13 04:00:44', '2025-09-13 04:00:44'),
(15, 35, 4, 'bangunan', 'Aula Tari', NULL, 5000000.00, 500000000.00, '2004-03-05', 'baik', 'jklguyugggugyu', NULL, NULL, 'updated', 1, 'perubahan sedikit', '2025-09-13 04:01:44', '2025-09-13 04:01:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_penduduks`
--

CREATE TABLE `riwayat_penduduks` (
  `id` bigint UNSIGNED NOT NULL,
  `penduduk_id` bigint UNSIGNED NOT NULL,
  `desa_id` bigint UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memiliki_ktp` tinyint(1) NOT NULL,
  `tanggal_rekam_ktp` date DEFAULT NULL,
  `klasifikasi_usia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_type` enum('created','updated','deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `changed_by` bigint UNSIGNED NOT NULL,
  `change_reason` text COLLATE utf8mb4_unicode_ci,
  `perubahan` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_penduduks`
--

INSERT INTO `riwayat_penduduks` (`id`, `penduduk_id`, `desa_id`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_perkawinan`, `pekerjaan`, `pendidikan_terakhir`, `alamat`, `rt`, `rw`, `memiliki_ktp`, `tanggal_rekam_ktp`, `klasifikasi_usia`, `action_type`, `changed_by`, `change_reason`, `perubahan`, `created_at`, `updated_at`) VALUES
(1, 85, 4, '1260891184099458', 'Ahmad Rocksid', 'L', 'Pagaralam', '2000-03-10', 'Islam', 'Belum Kawin', 'Tidak Bekerja', 'Tidak Sekolah', 'Dusun 4, Sejahtera Indah', '05', '05', 0, NULL, 'Dewasa', 'updated', 1, NULL, '\"{\\\"nama_lengkap\\\":\\\"Ahmad Rocksid\\\",\\\"updated_at\\\":\\\"2025-09-13T00:53:40.000000Z\\\"}\"', '2025-09-13 03:53:40', '2025-09-13 03:53:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_perangkat_desas`
--

CREATE TABLE `riwayat_perangkat_desas` (
  `id` bigint UNSIGNED NOT NULL,
  `perangkat_desa_id` bigint UNSIGNED NOT NULL,
  `desa_id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai_tugas` date NOT NULL,
  `tanggal_akhir_tugas` date DEFAULT NULL,
  `sk_pengangkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jobdesk` text COLLATE utf8mb4_unicode_ci,
  `status` enum('aktif','tidak_aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_type` enum('created','updated','deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `changed_by` bigint UNSIGNED NOT NULL,
  `change_reason` text COLLATE utf8mb4_unicode_ci,
  `perubahan` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_perangkat_desas`
--

INSERT INTO `riwayat_perangkat_desas` (`id`, `perangkat_desa_id`, `desa_id`, `nama_lengkap`, `jabatan`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan_terakhir`, `alamat`, `no_telepon`, `tanggal_mulai_tugas`, `tanggal_akhir_tugas`, `sk_pengangkatan`, `jobdesk`, `status`, `action_type`, `changed_by`, `change_reason`, `perubahan`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Budi Santoso lolok', 'Kepala Dusun 1', '1687193344715148', 'Pagaralam', '1972-02-13', 'L', 'S2', 'Dusun 2, Belitang Jaya', '08567994357', '2019-10-24', '2028-10-20', NULL, 'Membantu pelaksanaan tugas Kepala Desa di wilayah dusun', 'aktif', 'updated', 2, 'ada perubahan nama', '[]', '2025-09-11 04:17:02', '2025-09-11 04:17:02'),
(2, 5, 1, 'Budi Santoso aja', 'Kepala Dusun 1', '1687193344715148', 'Pagaralam', '1972-02-13', 'L', 'S2', 'Dusun 2, Belitang Jaya', '08567994357', '2019-10-24', '2028-10-20', NULL, 'Membantu pelaksanaan tugas Kepala Desa di wilayah dusun', 'aktif', 'updated', 2, 'ubah nama', '{\"nama_lengkap\": {\"new\": \"Budi Santoso aja\", \"old\": \"Budi Santoso lolok\"}}', '2025-09-11 04:24:06', '2025-09-11 04:24:06'),
(3, 5, 1, 'Budi Santoso aja', 'Kepala Dusun 1', '1687193344715148', 'Pagaralam', '1972-02-13', 'L', 'S2', 'Dusun 2, Belitang Jaya', '08567994357', '2019-10-24', '2028-10-20', NULL, 'Membantu pelaksanaan tugas Kepala Desa di wilayah dusun', 'aktif', 'updated', 2, 'ubah nama', '[]', '2025-09-11 04:24:06', '2025-09-11 04:24:06'),
(4, 3, 1, 'Lukman Putra Hakim', 'Kepala Dusun 2', '1121629171588449', 'Indralaya', '1988-07-08', 'L', 'SD', 'Dusun 3, Belitang Jaya', '08184850200', '2024-02-03', '2029-09-10', NULL, 'Melaksanakan keputusan dan kebijakan Kepala Desa', 'aktif', 'updated', 2, 'ubah nama', '[]', '2025-09-11 04:29:17', '2025-09-11 04:29:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0QcCCqZy4v3061XYtyZOiv3hp8Vqb3iyicEfkeoe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieUxzYlF4WVk4d3ROeVpEM09oRUZFbVVYVVF1aUt4U0RuV01GQzh4WiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo3NjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL3N0YXRpc3Rpaz9pZGVfd2Vidmlld19yZXF1ZXN0X3RpbWU9MTc1Nzc2MDAxMDU4OSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757762864),
('0X2AyK70fQvJ6nKI5spqlcFrGeGh9A5eOYZB8Hj6', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMU1RdXRkcE1vaHR4a0lsdkR2UnFybEc0YlRzZjJmMVJWUm1Fa1UwYyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc3RhdGlzdGlrIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1757765040),
('2Zs4GZ7RWRKrDPz1DI8jozdl3tRCfeQA59LmSRpE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibDVwSzlqcWJQdXpkM1FtUWZQQVRlQnFyYngydFh3R1NxS0lCNVUxdSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc3RhdGlzdGlrIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1757732277),
('FulzV4KTzCMFXAYSwKhAqAVawpX219nEzwRH8I9o', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Trae/1.100.3 Chrome/132.0.6834.210 Electron/34.5.1 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibGtJNTcyUGxaenhJMWZLeVJMdmJCbzFiR1JESDczU2NkWTZWSEhHWCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo3NjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3N0YXRpc3Rpaz9pZGVfd2Vidmlld19yZXF1ZXN0X3RpbWU9MTc1Nzc2MTMwMTk1NiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757762863);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin_kecamatan','admin_desa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa_id` bigint UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `desa_id`, `email_verified_at`, `phone`, `address`, `is_active`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Kecamatan Belitang Jaya', 'admin@kecamatan.com', 'admin_kecamatan', NULL, NULL, '081234567890', 'Kantor Kecamatan Belitang Jaya', 1, '$2y$12$eCYWivX8P5lYdkIi71kC1OkBXDxgU.jYPRREhSSrUqGLs6gG.S7H.', NULL, '2025-09-10 21:34:55', '2025-09-10 21:34:55'),
(2, 'Admin Desa Belitang Jaya', 'admin.desa1@desa.com', 'admin_desa', 1, NULL, '08123456781', 'Jl. Raya Belitang Jaya No. 1', 1, '$2y$12$Xy4cWhs3LgFHnVeZJesUq.JrI.kbBGgIeX6EYy3x/Ca08WKnZJpcG', 'RkI2V0iaDeWmQU4zyxxruveec0uZ7SjhO8txkxpmyJkGxM9rljY1KnZBimEY', '2025-09-10 21:34:55', '2025-09-12 02:28:46'),
(3, 'Admin Desa Sumber Makmur', 'admin.desa2@desa.com', 'admin_desa', 2, NULL, '08123456782', 'Jl. Sumber Makmur No. 15', 1, '$2y$12$fCiNnxLnaaxrBPh6gz2kDexeez8.aO1FGG4tnO1L.WeW6n6IQZ612', NULL, '2025-09-10 21:34:55', '2025-09-10 21:34:55'),
(4, 'Admin Desa Maju Bersama', 'admin.desa3@desa.com', 'admin_desa', 3, NULL, '08123456783', 'Jl. Maju Bersama No. 8', 1, '$2y$12$e17alQIOeK7VbF.1RgoDp.zayn0xTd3b/3kVlFFIs0B3qjzmbB1NG', NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(5, 'Admin Desa Sejahtera Indah', 'admin.desa4@desa.com', 'admin_desa', 4, NULL, '08123456784', 'Jl. Sejahtera No. 25', 1, '$2y$12$Md/7sNDVE7DGza4/Dxw8xu58LtMQjnezU1QXWnrWdPedF61eZ9QgO', NULL, '2025-09-10 21:34:56', '2025-09-10 21:34:56'),
(6, 'John', 'admin2belitangjaya@gmail.com', 'admin_desa', 1, NULL, '081265493216', 'ga tau', 1, '$2y$12$y16DhN3xpzUavxny8dSSKetEGzDHHxxvViFU5nHlHoQA6ne7oDd/S', NULL, '2025-09-12 18:52:05', '2025-09-12 18:52:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_user_id_foreign` (`user_id`),
  ADD KEY `activities_desa_id_foreign` (`desa_id`);

--
-- Indeks untuk tabel `aset_desas`
--
ALTER TABLE `aset_desas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aset_desas_desa_id_foreign` (`desa_id`),
  ADD KEY `aset_desas_updated_by_foreign` (`updated_by`);

--
-- Indeks untuk tabel `aset_tanah_wargas`
--
ALTER TABLE `aset_tanah_wargas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aset_tanah_wargas_nomor_sph_unique` (`nomor_sph`),
  ADD KEY `aset_tanah_wargas_desa_id_foreign` (`desa_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `desas`
--
ALTER TABLE `desas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `desas_kode_desa_unique` (`kode_desa`);

--
-- Indeks untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumens_desa_id_foreign` (`desa_id`),
  ADD KEY `dokumens_uploaded_by_foreign` (`uploaded_by`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penduduks_nik_unique` (`nik`),
  ADD KEY `penduduks_desa_id_rt_rw_index` (`desa_id`,`rt`,`rw`);

--
-- Indeks untuk tabel `perangkat_desas`
--
ALTER TABLE `perangkat_desas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perangkat_desas_desa_id_foreign` (`desa_id`),
  ADD KEY `perangkat_desas_updated_by_foreign` (`updated_by`);

--
-- Indeks untuk tabel `riwayat_aset_desas`
--
ALTER TABLE `riwayat_aset_desas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_aset_desas_aset_desa_id_foreign` (`aset_desa_id`),
  ADD KEY `riwayat_aset_desas_desa_id_foreign` (`desa_id`),
  ADD KEY `riwayat_aset_desas_changed_by_foreign` (`changed_by`);

--
-- Indeks untuk tabel `riwayat_penduduks`
--
ALTER TABLE `riwayat_penduduks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_penduduks_penduduk_id_foreign` (`penduduk_id`),
  ADD KEY `riwayat_penduduks_desa_id_foreign` (`desa_id`),
  ADD KEY `riwayat_penduduks_changed_by_foreign` (`changed_by`);

--
-- Indeks untuk tabel `riwayat_perangkat_desas`
--
ALTER TABLE `riwayat_perangkat_desas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_perangkat_desas_perangkat_desa_id_foreign` (`perangkat_desa_id`),
  ADD KEY `riwayat_perangkat_desas_desa_id_foreign` (`desa_id`),
  ADD KEY `riwayat_perangkat_desas_changed_by_foreign` (`changed_by`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_desa_id_foreign` (`desa_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `aset_desas`
--
ALTER TABLE `aset_desas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `aset_tanah_wargas`
--
ALTER TABLE `aset_tanah_wargas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `desas`
--
ALTER TABLE `desas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `perangkat_desas`
--
ALTER TABLE `perangkat_desas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `riwayat_aset_desas`
--
ALTER TABLE `riwayat_aset_desas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `riwayat_penduduks`
--
ALTER TABLE `riwayat_penduduks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `riwayat_perangkat_desas`
--
ALTER TABLE `riwayat_perangkat_desas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `aset_desas`
--
ALTER TABLE `aset_desas`
  ADD CONSTRAINT `aset_desas_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aset_desas_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `aset_tanah_wargas`
--
ALTER TABLE `aset_tanah_wargas`
  ADD CONSTRAINT `aset_tanah_wargas_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD CONSTRAINT `dokumens_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dokumens_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penduduks`
--
ALTER TABLE `penduduks`
  ADD CONSTRAINT `penduduks_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perangkat_desas`
--
ALTER TABLE `perangkat_desas`
  ADD CONSTRAINT `perangkat_desas_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perangkat_desas_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `riwayat_aset_desas`
--
ALTER TABLE `riwayat_aset_desas`
  ADD CONSTRAINT `riwayat_aset_desas_aset_desa_id_foreign` FOREIGN KEY (`aset_desa_id`) REFERENCES `aset_desas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_aset_desas_changed_by_foreign` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_aset_desas_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_penduduks`
--
ALTER TABLE `riwayat_penduduks`
  ADD CONSTRAINT `riwayat_penduduks_changed_by_foreign` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_penduduks_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_penduduks_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduks` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_perangkat_desas`
--
ALTER TABLE `riwayat_perangkat_desas`
  ADD CONSTRAINT `riwayat_perangkat_desas_changed_by_foreign` FOREIGN KEY (`changed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_perangkat_desas_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_perangkat_desas_perangkat_desa_id_foreign` FOREIGN KEY (`perangkat_desa_id`) REFERENCES `perangkat_desas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_desa_id_foreign` FOREIGN KEY (`desa_id`) REFERENCES `desas` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
