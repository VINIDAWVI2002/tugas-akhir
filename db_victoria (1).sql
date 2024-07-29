-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 02:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_victoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `nama` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `notlp` text DEFAULT NULL,
  `sift` text DEFAULT NULL,
  `jobdesk` text DEFAULT NULL,
  `posisi` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `foto`, `notlp`, `sift`, `jobdesk`, `posisi`, `email`, `password`, `level`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', '$2y$12$zv8iZR2w9C2Ek9uptcW1I.H7IQm4SDcBI1tS56SFk/pgYXfTMi0cu', 1, 1, '2024-07-07 22:25:05', '2024-07-23 10:55:51'),
(2, 'kasir', NULL, '12345', '12345', NULL, NULL, 'kasir@gmail.com', '$2y$12$MrNVnidgswZqXHKB6Gjz8eSGLZubHOWsOKqtfW02Tou3kMoqTLfMe', 2, 1, '2024-07-07 22:29:52', '2024-07-07 22:29:52'),
(3, 'karyawan', NULL, '12345', '12345', NULL, NULL, 'karyawan@gmail.com', '$2y$12$d1BAfTJqrUtFR3MQtH5l5Ob/Qks5swDIs1BttS9oFd.HBgnDGI2fq', 3, 1, '2024-07-23 10:50:44', '2024-07-23 10:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_pokok`
--

CREATE TABLE `bahan_pokok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_nama` text DEFAULT NULL,
  `kategori_foto` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_foto`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', 'app/kategori/ayam.png', 1, '2024-07-07 22:25:05', '2024-07-07 22:25:05'),
(2, 'Minuman', 'app/kategori/jus.jpeg', 0, '2024-07-07 22:25:05', '2024-07-23 09:52:17'),
(3, 'Miuman', 'app/kategori/kategori-1721753681-YvAB9.jpg', 1, '2024-07-23 09:54:41', '2024-07-23 09:54:41'),
(4, 'cemilan', 'app/kategori/kategori-1721755588-s5ED3.jpg', 0, '2024-07-23 10:26:28', '2024-07-23 10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `keranjang_id` bigint(20) UNSIGNED NOT NULL,
  `keranjang_menu_id` text DEFAULT NULL,
  `keranjang_member_id` text DEFAULT NULL,
  `keranjang_qty` int(11) NOT NULL DEFAULT 1,
  `keranjang_status` int(11) NOT NULL DEFAULT 1,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`keranjang_id`, `keranjang_menu_id`, `keranjang_member_id`, `keranjang_qty`, `keranjang_status`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, '4', '1', 1, 1, 0, '2024-07-08 22:50:19', '2024-07-09 03:53:35'),
(2, '5', '1', 2, 1, 1, '2024-07-09 04:49:10', '2024-07-17 02:24:27'),
(3, '2', '1', 1, 1, 1, '2024-07-09 04:49:16', '2024-07-09 04:49:16'),
(4, '5', '4', 2, 1, 0, '2024-07-19 23:32:25', '2024-07-20 20:59:39'),
(5, '4', '4', 1, 1, 0, '2024-07-20 21:00:26', '2024-07-23 09:57:35'),
(6, '2', '4', 1, 1, 0, '2024-07-22 23:37:42', '2024-07-23 09:57:39'),
(7, '5', '4', 1, 1, 0, '2024-07-23 09:58:15', '2024-07-23 12:26:08'),
(8, '6', '4', 1, 1, 0, '2024-07-23 09:58:48', '2024-07-23 12:26:13'),
(9, '5', '4', 1, 1, 0, '2024-07-23 12:27:32', '2024-07-23 12:30:27'),
(10, '7', '4', 1, 1, 0, '2024-07-23 12:28:32', '2024-07-23 12:37:21'),
(11, '5', '4', 1, 1, 0, '2024-07-23 12:35:04', '2024-07-25 05:56:32'),
(12, '2', '4', 1, 1, 0, '2024-07-23 12:35:14', '2024-07-25 05:56:23'),
(13, '6', '4', 1, 1, 0, '2024-07-23 12:35:22', '2024-07-23 12:37:34'),
(14, '8', '4', 1, 1, 0, '2024-07-25 05:56:01', '2024-07-26 03:25:14'),
(15, '10', '4', 2, 1, 0, '2024-07-25 05:56:10', '2024-07-26 04:43:38'),
(16, '13', '4', 1, 1, 1, '2024-07-26 04:42:59', '2024-07-26 04:42:59'),
(17, '12', '4', 1, 1, 1, '2024-07-26 04:43:10', '2024-07-26 04:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `member_nama` text DEFAULT NULL,
  `member_alamat` text DEFAULT NULL,
  `member_jenis_kelamin` text DEFAULT NULL,
  `member_tanggal_lahir` date DEFAULT NULL,
  `member_foto` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `member_notlp` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `remember_token` text DEFAULT NULL,
  `member_kode` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_nama`, `member_alamat`, `member_jenis_kelamin`, `member_tanggal_lahir`, `member_foto`, `email`, `member_notlp`, `password`, `remember_token`, `member_kode`, `flag_erase`, `created_at`, `updated_at`) VALUES
(4, 'Vini Dawvi', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJnx7oz0Cg59-JxIubtElgG7kw7Pjy57m0Ifol2rYHaEbZB6Q=s96-c', 'vinidawvi@gmail.com', NULL, NULL, '16ZwyPUMIFabg3r50WtquTPUY9h4MRyy2UQBAxogCIQlXs6RnPMyc5dydbSV', NULL, 1, '2024-07-18 10:49:49', '2024-07-18 10:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `menu_nama` text DEFAULT NULL,
  `menu_kategori_id` text DEFAULT NULL,
  `menu_foto` text DEFAULT NULL,
  `menu_harga` text DEFAULT NULL,
  `menu_status` int(11) NOT NULL DEFAULT 1,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_nama`, `menu_kategori_id`, `menu_foto`, `menu_harga`, `menu_status`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'Jus Alpukat', '2', 'app/menu/menu-1720416383-qduc4.jpg', '17000', 1, 0, '2024-07-07 22:26:23', '2024-07-08 22:42:41'),
(2, 'Nasi Ayam Geprek', '1', 'app/menu/menu-1720503794-KHw3f.jpg', '25000', 1, 0, '2024-07-08 22:43:16', '2024-07-24 01:19:28'),
(3, 'Indomie Ayam Geprek', '1', 'app/menu/menu-1720503872-7ltZI.jpg', '18000', 1, 0, '2024-07-08 22:44:32', '2024-07-23 09:44:51'),
(4, 'Jus Alpukat', '2', 'app/menu/menu-1720503923-d8PNK.jpg', '15000', 1, 0, '2024-07-08 22:45:23', '2024-07-23 10:19:05'),
(5, 'Jus Mangga', '2', 'app/menu/menu-1720503974-G89ud.jpg', '16000', 1, 0, '2024-07-08 22:46:14', '2024-07-24 01:19:34'),
(6, 'Indomie', '1', 'app/menu/menu-1721400729-ETtdz.jpg', '10000', 1, 0, '2024-07-19 07:52:14', '2024-07-24 01:16:35'),
(7, 'Indomie', '1', 'app/menu/menu-1721754858-ugLfG.jpg', '17000', 1, 0, '2024-07-23 10:14:20', '2024-07-24 01:19:42'),
(8, 'Jus Naga', '3', 'app/menu/menu-1721810496-H3xud.jpg', '15000', 1, 1, '2024-07-24 01:41:36', '2024-07-24 01:41:36'),
(9, 'Es Jeruk', '3', 'app/menu/menu-1721810894-yThGG.jpg', '10000', 1, 1, '2024-07-24 01:48:14', '2024-07-24 01:48:14'),
(10, 'Indomie Goreng', '1', 'app/menu/menu-1721813229-1ftBL.jpg', '18000', 1, 1, '2024-07-24 02:27:09', '2024-07-24 02:27:09'),
(11, 'Nasi Ayam Geprek', '1', 'app/menu/menu-1721992530-Lm989.jpg', '25000', 1, 1, '2024-07-26 04:15:32', '2024-07-26 04:15:32'),
(12, 'Nasi Ayam Geprek Mozarela', '1', 'app/menu/menu-1721992829-2KlGK.jpg', '30000', 1, 1, '2024-07-26 04:20:29', '2024-07-26 04:20:29'),
(13, 'Kentang Goreng', '1', 'app/menu/menu-1721993444-3wN5w.jpg', '15000', 1, 1, '2024-07-26 04:30:44', '2024-07-26 04:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_09_133608_create_kategori_table', 1),
(6, '2024_03_09_143122_create_menu_table', 1),
(7, '2024_03_09_151848_create_admin_table', 1),
(8, '2024_03_31_142005_create_pembayaran_table', 1),
(9, '2024_03_31_142147_create_pesanan_table', 1),
(10, '2024_04_07_132933_create_pesanan_detail_table', 1),
(11, '2024_04_08_152540_create_bahan_pokok_table', 1),
(12, '2024_04_08_163408_create_profil_toko_table', 1),
(13, '2024_04_10_045616_create_member_table', 1),
(14, '2024_04_10_145749_create_keranjang_table', 1),
(15, '2024_07_07_080551_create_modal_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `modal_id` bigint(20) UNSIGNED NOT NULL,
  `modal_jumlah` text DEFAULT NULL,
  `modal_deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran_nama` text DEFAULT NULL,
  `pembayaran_nomor` text DEFAULT NULL,
  `pembayaran_an` text DEFAULT NULL,
  `pembayaran_foto` text DEFAULT NULL,
  `pembayaran_status` int(11) NOT NULL DEFAULT 1,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `pembayaran_nama`, `pembayaran_nomor`, `pembayaran_an`, `pembayaran_foto`, `pembayaran_status`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'Cash/COD', '-', '-', '-', 1, 1, '2024-07-07 22:25:05', '2024-07-07 22:25:05'),
(2, 'Bank BRI', '12345678910', 'RM Victoria', '-', 1, 0, '2024-07-07 22:25:05', '2024-07-23 09:51:12'),
(3, 'Bank BRI', '12345678910', 'RM VICTORIA', NULL, 1, 1, '2024-07-23 09:51:36', '2024-07-23 09:51:59'),
(4, 'Dana', '01987654321', 'vini', NULL, 1, 0, '2024-07-23 10:33:47', '2024-07-23 10:38:52'),
(5, 'Dana', NULL, NULL, NULL, 1, 0, '2024-07-23 10:40:18', '2024-07-23 10:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_member_id` text DEFAULT NULL,
  `pesanan_nama_penerima` text DEFAULT NULL,
  `pesanan_kode` text DEFAULT NULL,
  `pesanan_total_harga` text DEFAULT NULL,
  `pesanan_meja_nomor` text DEFAULT NULL,
  `pesanan_nama` text DEFAULT NULL,
  `pesanan_alamat` text DEFAULT NULL,
  `pesanan_notlp` text DEFAULT NULL,
  `pesanan_pembayaran_id` text DEFAULT NULL,
  `pesanan_bukti` text DEFAULT NULL,
  `pesanan_status` text NOT NULL DEFAULT '0',
  `pesanan_tanggal` text DEFAULT NULL,
  `pesanan_bulan` text DEFAULT NULL,
  `pesanan_tahun` text DEFAULT NULL,
  `pesanan_pesan` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `pesanan_member_id`, `pesanan_nama_penerima`, `pesanan_kode`, `pesanan_total_harga`, `pesanan_meja_nomor`, `pesanan_nama`, `pesanan_alamat`, `pesanan_notlp`, `pesanan_pembayaran_id`, `pesanan_bukti`, `pesanan_status`, `pesanan_tanggal`, `pesanan_bulan`, `pesanan_tahun`, `pesanan_pesan`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, '0', 'dina', 'BG-23505', '17000', '1', 'dina', 'Makan Ditempat', NULL, '1', NULL, '2', '08', '07', '2024', NULL, 1, '2024-07-07 22:30:36', '2024-07-07 22:30:36'),
(2, '0', 'ica', 'BG-46346', '17000', '1', 'ica', 'Makan Ditempat', NULL, '1', NULL, '2', '08', '07', '2024', NULL, 1, '2024-07-07 23:42:39', '2024-07-07 23:42:39'),
(3, '0', 'putri', 'BG-36029', '34000', '2', 'putri', 'Makan Ditempat', NULL, '1', NULL, '2', '09', '07', '2024', NULL, 1, '2024-07-08 22:48:07', '2024-07-08 22:48:07'),
(4, '1', NULL, 'BG-34070', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '09', '7', '2024', NULL, 1, '2024-07-08 22:51:14', '2024-07-09 22:57:14'),
(5, '0', 'dina', 'BG-31086', '106000', '1', 'dina', 'Makan Ditempat', NULL, '1', NULL, '2', '09', '07', '2024', NULL, 1, '2024-07-09 01:31:51', '2024-07-09 01:31:51'),
(6, '1', NULL, 'BG-96079', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '09', '7', '2024', NULL, 1, '2024-07-09 04:49:36', '2024-07-09 22:58:25'),
(7, '0', 'ica', 'BG-81069', '36000', '2', 'ica', 'Makan Ditempat', NULL, '1', NULL, '2', '10', '07', '2024', NULL, 1, '2024-07-09 23:25:14', '2024-07-09 23:25:14'),
(8, '1', NULL, 'BG-54157', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '10', '7', '2024', 'level 1', 1, '2024-07-10 04:29:33', '2024-07-10 04:30:50'),
(9, '1', NULL, 'BG-47563', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '10', '7', '2024', NULL, 1, '2024-07-10 04:43:25', '2024-07-10 19:53:11'),
(10, '1', NULL, 'BG-88683', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '12', '7', '2024', 'level 1', 1, '2024-07-12 01:53:01', '2024-07-12 01:55:24'),
(11, '0', 'dina', 'BG-52588', '20000', '1', 'dina', 'Makan Ditempat', NULL, '1', NULL, '2', '18', '07', '2024', NULL, 1, '2024-07-18 06:35:58', '2024-07-18 06:35:58'),
(12, '1', NULL, 'BG-93746', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '18', '7', '2024', NULL, 1, '2024-07-18 06:42:44', '2024-07-18 06:43:21'),
(13, '0', 'ica', 'BG-75236', '20000', '12', 'ica', 'Makan Ditempat', NULL, '1', NULL, '2', '18', '07', '2024', NULL, 1, '2024-07-18 07:09:43', '2024-07-18 07:09:43'),
(14, '0', 'ica', 'BG-20391', '20000', '11', 'ica', 'Makan Ditempat', NULL, '1', NULL, '2', '18', '07', '2024', NULL, 1, '2024-07-18 07:10:14', '2024-07-18 07:10:14'),
(15, '1', NULL, 'BG-62711', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '18', '7', '2024', NULL, 1, '2024-07-18 07:12:01', '2024-07-18 07:13:35'),
(16, '0', 'ica', 'BG-61169', '35000', '11', 'ica', 'Makan Ditempat', NULL, '1', NULL, '2', '18', '07', '2024', NULL, 1, '2024-07-18 07:14:01', '2024-07-18 07:14:01'),
(17, '0', 'nur', 'BG-67861', '18000', '1', 'nur', 'Makan Ditempat', NULL, '1', NULL, '2', '18', '07', '2024', NULL, 1, '2024-07-18 07:14:31', '2024-07-18 07:14:31'),
(18, '0', 'nur', 'BG-32921', '20000', '1', 'nur', 'Makan Ditempat', NULL, '1', NULL, '2', '18', '07', '2024', NULL, 1, '2024-07-18 10:52:15', '2024-07-18 10:52:15'),
(19, '0', 'ica', 'BG-4726', '54000', '4', 'ica', 'Makan Ditempat', NULL, '1', NULL, '2', '18', '07', '2024', NULL, 1, '2024-07-18 10:53:30', '2024-07-18 10:53:30'),
(20, '4', NULL, 'BG-16956', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '20', '7', '2024', NULL, 1, '2024-07-19 23:32:52', '2024-07-23 09:29:38'),
(21, '4', NULL, 'BG-33732', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2', '21', '7', '2024', NULL, 1, '2024-07-20 21:05:07', '2024-07-23 09:55:58'),
(22, '4', NULL, 'BG-43370', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '23', '7', '2024', 'abcd', 1, '2024-07-22 23:38:19', '2024-07-23 09:56:23'),
(23, '4', 'Vini Dawvi', 'BG-29847', '35000', NULL, NULL, 'kalinilam', '089512877305', '2', 'app/bukti/bukti-1721729865-u8gb2.jpg', '2', '23', '7', '2024', 'asdsgvf', 1, '2024-07-23 03:07:49', '2024-07-23 09:56:39'),
(24, '4', 'Vini Dawvi', 'BG-69324', '26000', NULL, NULL, 'kalinilam', '089512877305', '3', 'app/bukti/bukti-1721754038-0pts4.jpg', '2', '23', '7', '2024', 'tidak pedas', 1, '2024-07-23 10:00:19', '2024-07-23 11:15:15'),
(25, '0', 'ica', 'BG-41187', '42000', '5', 'ica', 'Makan Ditempat', NULL, '1', NULL, '2', '23', '07', '2024', NULL, 1, '2024-07-23 11:11:34', '2024-07-23 11:11:34'),
(26, '4', NULL, 'BG-48332', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '23', '7', '2024', NULL, 1, '2024-07-23 12:33:29', '2024-07-24 02:31:12'),
(27, '4', NULL, 'BG-67414', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '2', '23', '7', '2024', 'tidak pedas', 1, '2024-07-23 12:40:10', '2024-07-25 07:02:14'),
(28, '0', 'syarifah', 'BG-25242', '43000', '1', 'syarifah', 'Makan Ditempat', NULL, '1', NULL, '2', '24', '07', '2024', NULL, 1, '2024-07-24 06:11:46', '2024-07-24 06:11:46'),
(29, '4', 'Vini Dawvi', 'BG-65177', '41000', NULL, NULL, NULL, NULL, '3', NULL, '2', '24', '7', '2024', NULL, 1, '2024-07-24 09:53:57', '2024-07-25 07:02:30'),
(30, '4', NULL, 'BG-33963', NULL, NULL, NULL, 'TRANSITO', '089512877305', '1', NULL, '2', '25', '7', '2024', 'Makanan dibuat pedas', 1, '2024-07-25 05:57:16', '2024-07-25 07:02:54'),
(31, '4', NULL, 'BG-2634', NULL, NULL, NULL, 'TRANSITO', '089512877305', '1', NULL, '2', '26', '7', '2024', 'tidak pedas', 1, '2024-07-26 03:23:07', '2024-07-26 04:48:19'),
(32, '4', 'Vini Dawvi', 'BG-82055', '36000', NULL, NULL, 'kalinilam', '089512877305', '3', 'app/bukti/bukti-1721989602-EyADE.jpg', '2', '26', '7', '2024', NULL, 1, '2024-07-26 03:25:33', '2024-07-26 03:29:27'),
(33, '0', 'hesty', 'BG-46591', '25000', '5', 'hesty', 'Makan Ditempat', NULL, '1', NULL, '2', '26', '07', '2024', NULL, 1, '2024-07-26 04:35:27', '2024-07-26 04:35:27'),
(34, '4', 'Vini Dawvi', 'BG-44001', '45000', NULL, NULL, 'TRANSITO', '089512877305', '3', 'app/bukti/bukti-1721994300-8MBrO.jpg', '2', '26', '7', '2024', 'level 1', 1, '2024-07-26 04:44:47', '2024-07-26 10:01:49'),
(35, '4', NULL, 'BG-89383', NULL, NULL, NULL, 'kalinilam', '089512877305', '1', NULL, '1', '26', '7', '2024', NULL, 1, '2024-07-26 06:01:54', '2024-07-26 06:01:54'),
(36, '0', 'ica', 'BG-49821', '25000', '2', 'ica', 'Makan Ditempat', NULL, '1', NULL, '2', '26', '07', '2024', NULL, 1, '2024-07-26 10:33:05', '2024-07-26 10:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `pesanan_detail_id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` text DEFAULT NULL,
  `pesanan_menu_id` text DEFAULT NULL,
  `kasir_id` text DEFAULT NULL,
  `pesanan_member_id` text DEFAULT NULL,
  `pesanan_menu_kategori_id` text DEFAULT NULL,
  `pesanan_menu_harga` text DEFAULT NULL,
  `pesanan_tanggal` text DEFAULT NULL,
  `pesanan_bulan` text DEFAULT NULL,
  `pesanan_tahun` text DEFAULT NULL,
  `pesanan_menu_qty` int(11) DEFAULT NULL,
  `pesanan_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`pesanan_detail_id`, `pesanan_id`, `pesanan_menu_id`, `kasir_id`, `pesanan_member_id`, `pesanan_menu_kategori_id`, `pesanan_menu_harga`, `pesanan_tanggal`, `pesanan_bulan`, `pesanan_tahun`, `pesanan_menu_qty`, `pesanan_status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2', NULL, '2', '17000', '08', '7', '2024', 1, 1, '2024-07-07 22:30:23', '2024-07-07 22:30:36'),
(4, '2', '1', '2', NULL, '2', '17000', '08', '7', '2024', 1, 1, '2024-07-07 23:42:22', '2024-07-07 23:42:39'),
(7, '3', '3', '2', NULL, '1', '18000', '09', '7', '2024', 1, 1, '2024-07-08 22:47:43', '2024-07-08 22:48:07'),
(8, '3', '5', '2', NULL, '2', '16000', '09', '7', '2024', 1, 1, '2024-07-08 22:47:47', '2024-07-08 22:48:07'),
(9, '4', '4', NULL, '1', '2', '15000', '09', '7', '2024', 1, 2, '2024-07-08 22:51:14', '2024-07-09 22:57:14'),
(11, '5', '2', '2', NULL, '1', '20000', '09', '7', '2024', 2, 1, '2024-07-09 01:31:05', '2024-07-09 01:31:51'),
(12, '5', '5', '2', NULL, '2', '16000', '09', '7', '2024', 3, 1, '2024-07-09 01:31:09', '2024-07-09 01:31:51'),
(13, '5', '3', '2', NULL, '1', '18000', '09', '7', '2024', 1, 1, '2024-07-09 01:31:14', '2024-07-09 01:31:51'),
(17, '6', '5', NULL, '1', '2', '16000', '09', '7', '2024', 1, 2, '2024-07-09 04:49:36', '2024-07-09 22:58:25'),
(18, '6', '2', NULL, '1', '1', '20000', '09', '7', '2024', 1, 2, '2024-07-09 04:49:36', '2024-07-09 22:58:25'),
(19, '7', '2', '2', NULL, '1', '20000', '10', '7', '2024', 1, 1, '2024-07-09 23:24:39', '2024-07-09 23:25:15'),
(22, '7', '5', '2', NULL, '2', '16000', '10', '7', '2024', 1, 1, '2024-07-09 23:24:56', '2024-07-09 23:25:15'),
(27, '8', '5', NULL, '1', '2', '16000', '10', '7', '2024', 1, 2, '2024-07-10 04:29:33', '2024-07-10 04:31:21'),
(28, '8', '2', NULL, '1', '1', '20000', '10', '7', '2024', 1, 2, '2024-07-10 04:29:33', '2024-07-10 04:31:21'),
(29, '9', '5', NULL, '1', '2', '16000', '10', '7', '2024', 1, 2, '2024-07-10 04:43:25', '2024-07-10 19:53:11'),
(30, '9', '2', NULL, '1', '1', '20000', '10', '7', '2024', 1, 2, '2024-07-10 04:43:25', '2024-07-10 19:53:11'),
(31, '10', '5', NULL, '1', '2', '16000', '12', '7', '2024', 1, 2, '2024-07-12 01:53:01', '2024-07-12 01:55:24'),
(32, '10', '2', NULL, '1', '1', '20000', '12', '7', '2024', 1, 2, '2024-07-12 01:53:01', '2024-07-12 01:55:24'),
(33, '11', '2', '2', NULL, '1', '20000', '18', '7', '2024', 1, 1, '2024-07-18 06:35:47', '2024-07-18 06:35:58'),
(35, '12', '5', NULL, '1', '2', '16000', '18', '7', '2024', 2, 2, '2024-07-18 06:42:44', '2024-07-18 06:43:21'),
(36, '12', '2', NULL, '1', '1', '20000', '18', '7', '2024', 1, 2, '2024-07-18 06:42:44', '2024-07-18 06:43:21'),
(37, '13', '2', '2', NULL, '1', '20000', '18', '7', '2024', 1, 1, '2024-07-18 07:09:29', '2024-07-18 07:09:43'),
(38, '14', '2', '2', NULL, '1', '20000', '18', '7', '2024', 1, 1, '2024-07-18 07:10:05', '2024-07-18 07:10:14'),
(39, '15', '5', NULL, '1', '2', '16000', '18', '7', '2024', 2, 2, '2024-07-18 07:12:01', '2024-07-18 07:13:35'),
(40, '15', '2', NULL, '1', '1', '20000', '18', '7', '2024', 1, 2, '2024-07-18 07:12:01', '2024-07-18 07:13:35'),
(41, '16', '2', '2', NULL, '1', '20000', '18', '7', '2024', 1, 1, '2024-07-18 07:13:47', '2024-07-18 07:14:01'),
(42, '16', '4', '2', NULL, '2', '15000', '18', '7', '2024', 1, 1, '2024-07-18 07:13:50', '2024-07-18 07:14:01'),
(43, '17', '3', '2', NULL, '1', '18000', '18', '7', '2024', 1, 1, '2024-07-18 07:14:21', '2024-07-18 07:14:31'),
(48, '18', '2', '2', NULL, '1', '20000', '18', '7', '2024', 1, 1, '2024-07-18 10:52:00', '2024-07-18 10:52:15'),
(49, '19', '5', '2', NULL, '2', '16000', '18', '7', '2024', 1, 1, '2024-07-18 10:52:56', '2024-07-18 10:53:30'),
(50, '19', '3', '2', NULL, '1', '18000', '18', '7', '2024', 1, 1, '2024-07-18 10:52:59', '2024-07-18 10:53:30'),
(51, '19', '2', '2', NULL, '1', '20000', '18', '7', '2024', 1, 1, '2024-07-18 10:53:06', '2024-07-18 10:53:30'),
(52, '20', '5', NULL, '4', '2', '16000', '20', '7', '2024', 1, 2, '2024-07-19 23:32:52', '2024-07-23 09:29:38'),
(56, '21', '4', NULL, '4', '2', '15000', '21', '7', '2024', 1, 2, '2024-07-20 21:05:07', '2024-07-23 09:55:58'),
(57, '22', '4', NULL, '4', '2', '15000', '23', '7', '2024', 1, 2, '2024-07-22 23:38:19', '2024-07-23 09:56:23'),
(58, '22', '2', NULL, '4', '1', '20000', '23', '7', '2024', 1, 2, '2024-07-22 23:38:19', '2024-07-23 09:56:23'),
(59, '23', '4', NULL, '4', '2', '15000', '23', '7', '2024', 1, 2, '2024-07-23 03:07:49', '2024-07-23 09:56:39'),
(60, '23', '2', NULL, '4', '1', '20000', '23', '7', '2024', 1, 2, '2024-07-23 03:07:49', '2024-07-23 09:56:39'),
(61, '24', '5', NULL, '4', '2', '16000', '23', '7', '2024', 1, 2, '2024-07-23 10:00:19', '2024-07-23 11:15:15'),
(62, '24', '6', NULL, '4', '1', '10000', '23', '7', '2024', 1, 2, '2024-07-23 10:00:19', '2024-07-23 11:15:15'),
(65, '25', '2', '2', NULL, '1', '25000', '23', '7', '2024', 1, 1, '2024-07-23 11:11:02', '2024-07-23 11:11:34'),
(66, '25', '7', '2', NULL, '1', '17000', '23', '7', '2024', 1, 1, '2024-07-23 11:11:17', '2024-07-23 11:11:34'),
(67, '26', '7', NULL, '4', '1', '17000', '23', '7', '2024', 1, 2, '2024-07-23 12:33:29', '2024-07-24 02:31:12'),
(68, '27', '5', NULL, '4', '2', '16000', '23', '7', '2024', 1, 2, '2024-07-23 12:40:10', '2024-07-25 07:02:14'),
(69, '27', '2', NULL, '4', '1', '25000', '23', '7', '2024', 1, 2, '2024-07-23 12:40:10', '2024-07-25 07:02:14'),
(74, '28', '8', '2', NULL, '3', '15000', '24', '7', '2024', 1, 1, '2024-07-24 06:11:25', '2024-07-24 06:11:46'),
(75, '28', '9', '2', NULL, '3', '10000', '24', '7', '2024', 1, 1, '2024-07-24 06:11:29', '2024-07-24 06:11:46'),
(76, '28', '10', '2', NULL, '1', '18000', '24', '7', '2024', 1, 1, '2024-07-24 06:11:32', '2024-07-24 06:11:46'),
(78, '29', '5', NULL, '4', '2', '16000', '24', '7', '2024', 1, 2, '2024-07-24 09:53:57', '2024-07-25 07:02:30'),
(79, '29', '2', NULL, '4', '1', '25000', '24', '7', '2024', 1, 2, '2024-07-24 09:53:57', '2024-07-25 07:02:30'),
(80, '30', '8', NULL, '4', '3', '15000', '25', '7', '2024', 1, 2, '2024-07-25 05:57:16', '2024-07-25 07:02:54'),
(81, '30', '10', NULL, '4', '1', '18000', '25', '7', '2024', 1, 2, '2024-07-25 05:57:16', '2024-07-25 07:02:54'),
(82, '31', '8', NULL, '4', '3', '15000', '26', '7', '2024', 1, 2, '2024-07-26 03:23:07', '2024-07-26 04:48:19'),
(83, '31', '10', NULL, '4', '1', '18000', '26', '7', '2024', 1, 2, '2024-07-26 03:23:07', '2024-07-26 04:48:19'),
(84, '32', '10', NULL, '4', '1', '18000', '26', '7', '2024', 2, 2, '2024-07-26 03:25:33', '2024-07-26 03:29:27'),
(85, '33', '9', '2', NULL, '3', '10000', '26', '7', '2024', 1, 1, '2024-07-26 04:33:14', '2024-07-26 04:35:27'),
(86, '33', '13', '2', NULL, '1', '15000', '26', '7', '2024', 1, 1, '2024-07-26 04:33:38', '2024-07-26 04:35:27'),
(88, '34', '13', NULL, '4', '1', '15000', '26', '7', '2024', 1, 2, '2024-07-26 04:44:47', '2024-07-26 10:01:49'),
(89, '34', '12', NULL, '4', '1', '30000', '26', '7', '2024', 1, 2, '2024-07-26 04:44:47', '2024-07-26 10:01:49'),
(90, '35', '13', NULL, '4', '1', '15000', '26', '7', '2024', 1, 0, '2024-07-26 06:01:54', '2024-07-26 06:01:54'),
(91, '35', '12', NULL, '4', '1', '30000', '26', '7', '2024', 1, 0, '2024-07-26 06:01:54', '2024-07-26 06:01:54'),
(97, '36', '8', '2', NULL, '3', '15000', '26', '7', '2024', 1, 1, '2024-07-26 10:32:47', '2024-07-26 10:33:05'),
(98, '36', '9', '2', NULL, '3', '10000', '26', '7', '2024', 1, 1, '2024-07-26 10:32:50', '2024-07-26 10:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `profil_toko`
--

CREATE TABLE `profil_toko` (
  `profil_toko_id` bigint(20) UNSIGNED NOT NULL,
  `nama_toko` text DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `email_toko` text DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `notlp_toko` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_toko`
--

INSERT INTO `profil_toko` (`profil_toko_id`, `nama_toko`, `alamat_toko`, `email_toko`, `maps`, `notlp_toko`, `created_at`, `updated_at`) VALUES
(1, 'rm. victoria', 'Jl. DI. Panjaitan, No 308, Delta Pawan', 'victoria@gmail.com', NULL, '081234567890', '2024-07-07 22:25:05', '2024-07-07 22:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bahan_pokok`
--
ALTER TABLE `bahan_pokok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`modal_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`pesanan_detail_id`);

--
-- Indexes for table `profil_toko`
--
ALTER TABLE `profil_toko`
  ADD PRIMARY KEY (`profil_toko_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`(768)),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bahan_pokok`
--
ALTER TABLE `bahan_pokok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `keranjang_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `modal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `pesanan_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `profil_toko`
--
ALTER TABLE `profil_toko`
  MODIFY `profil_toko_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
