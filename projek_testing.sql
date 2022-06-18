-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2022 pada 05.35
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_testing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `user_id`, `posisi`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Anggia', 2, '1', 'Perempuan', 'werwer, RT 234, RW 234, LABUHAN BAJAU, TEUPAH SELATAN, KABUPATEN SIMEULUE, ACEH', '011221111', 'ilhamlp3i.sda@gmail.com', '', '2022-06-16 12:25:07', '2022-06-16 12:25:07'),
(2, 'anggik', 4, '5', 'Perempuan', '12312, RT 12, RW 12, TAWANGSARI, TAMAN, KABUPATEN SIDOARJO, JAWA TIMUR', '088454545', 'ilhamlp3i.sda@gmail.com', '', '2022-06-16 12:25:31', '2022-06-16 12:25:31'),
(3, 'ihza', 8, '5', 'Laki-Laki', 'Bandung', '086554456778', 'miza@gmail.com', '1655456618.png', '2022-06-17 09:03:38', '2022-06-17 09:03:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `nama`, `posisi`, `gaji`, `lembur`, `total_gaji`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '1', '3', 100000, 20000, 120000, '2022-06-08', 'Lunas', '2022-06-16 12:26:44', '2022-06-16 12:26:44'),
(2, '2', '7', 130000, 20000, 150000, '2022-06-15', 'Lunas', '2022-06-16 12:26:56', '2022-06-16 12:26:56'),
(3, '2', '6', 130000, 0, 130000, '2022-06-28', 'Lunas', '2022-06-16 12:27:12', '2022-06-16 12:27:12'),
(4, '3', '5', 140000, 20000, 160000, '2022-06-17', 'Lunas', '2022-06-17 09:04:20', '2022-06-17 09:04:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_gaji` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_posisi`, `total_gaji`, `created_at`, `updated_at`) VALUES
(1, 'Las', 120000, '2021-04-26 14:06:32', '2022-06-16 07:21:06'),
(3, 'Tukang', 100000, '2021-04-26 14:26:44', '2022-06-16 07:21:21'),
(5, 'engginer', 140000, '2022-06-16 07:22:05', '2022-06-16 07:22:05'),
(6, 'spv', 130000, '2022-06-16 07:22:23', '2022-06-16 07:22:23'),
(7, 'logistik', 130000, '2022-06-16 07:22:43', '2022-06-16 07:22:43'),
(8, 'pic', 130000, '2022-06-16 07:23:02', '2022-06-16 07:23:02'),
(9, 'Tukang fitter', 110000, '2022-06-16 07:23:31', '2022-06-16 07:23:31'),
(10, 'pembantu', 90000, '2022-06-16 07:23:45', '2022-06-16 07:23:45'),
(11, 'tukang rigger', 110000, '2022-06-16 07:24:04', '2022-06-16 07:24:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_04_26_204940_buat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(255) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$WetNGCfluzgaVdAX2qGB1.w7jiHgEBP7tHH8OlPJy14ofERCTqgRK', 'user-2022-c029586c3db760df4be44fd4ee0c8b69013b04.jpg', 1, NULL, '2021-04-26 14:00:37', '2022-06-01 13:27:36'),
(2, 'Anggia', 'user@gmail.com', NULL, '$2y$10$WetNGCfluzgaVdAX2qGB1.w7jiHgEBP7tHH8OlPJy14ofERCTqgRK', NULL, 2, NULL, '2021-04-26 15:17:30', '2021-04-30 11:25:13'),
(4, 'anggik', 'anggik@gmail.com', NULL, '$2y$10$WPj47A274QAmyznjZUjNUeGX4nBy665iy3/DLtJgfjNfIzNGOVZbu', NULL, 2, NULL, '2022-02-03 02:26:01', '2022-02-03 02:26:01'),
(5, 'anggik', 'gia@gmail.com', NULL, '$2y$10$nF5J2C4lWeGc2S1y5C.rfOQpB5qhKnfBTfXLybG/Tu1AUrw09.1Wm', NULL, 2, NULL, '2022-04-15 21:01:23', '2022-04-15 21:01:23'),
(6, 'fafa', 'fadia@gmail.com', NULL, '$2y$10$VzpMX9ucavSEbGplVyIYQOj4kivJI9irWwAvIk5CCXQ51A6IuTjO.', NULL, 2, NULL, '2022-05-31 03:42:14', '2022-05-31 03:42:14'),
(7, 'dodo', 'dodo@gmail.com', NULL, '$2y$10$c5XhH6DdWNgnlsdY8QmgneMxUmvbdPzE4IEoWHscVmCK6XBBvjQZe', NULL, 2, NULL, '2022-05-31 03:49:39', '2022-05-31 03:49:39'),
(8, 'ihza', 'miza@gmail.com', NULL, '$2y$10$XKF89z0CPZdYaMokttukmO2EqpRU8gdxfX4Zvhv61EQWmohvngzgW', NULL, 2, NULL, '2022-06-17 08:43:37', '2022-06-17 08:43:37'),
(9, 'dante', 'dante@gmail.com', NULL, '$2y$10$eSYmxHl20p2S17BgzdE2K.VWdGfg8CxSZto.DwUj7yEHaXwcGTk.S', NULL, 2, NULL, '2022-06-17 08:56:52', '2022-06-17 08:56:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
