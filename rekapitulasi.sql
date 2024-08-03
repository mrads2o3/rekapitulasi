-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2024 pada 06.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekapitulasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `shift` set('1','2') NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `status` set('perawat','dokter','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `id_pengguna`, `shift`, `waktu`, `status`) VALUES
(19, 1, '2', '2024-07-27 10:12:37', 'admin'),
(20, 2, '1', '2024-08-03 11:08:41', 'dokter'),
(21, 2, '2', '2024-08-03 11:08:44', 'dokter'),
(22, 3, '1', '2024-08-03 11:09:06', 'perawat'),
(23, 3, '2', '2024-08-03 11:09:09', 'perawat'),
(24, 1, '1', '2024-08-03 11:09:13', 'admin'),
(25, 1, '2', '2024-08-03 11:09:16', 'admin'),
(26, 1, '1', '2024-08-03 11:19:20', 'admin'),
(27, 1, '2', '2024-08-03 11:19:54', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` set('perawat','dokter','admin') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `status`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'mimin123'),
(2, 'Hisyam', 'dokter', 'hisyam123', 'hisyam321'),
(3, 'Ari', 'perawat', 'ari123', 'aridwi203');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
