-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2021 pada 14.59
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypi_new1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(8) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `kategori` varchar(64) NOT NULL,
  `namafile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_kategori`, `kategori`, `namafile`) VALUES
(3, 21, 'PLA2 ATA 2020/2021', '3-2021-07-22-26User - Struktur Navigasi.jpg'),
(5, 23, 'asdsadsa', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `kategori` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(21, 'PLA2 ATA 2020/2021'),
(23, 'asdsadsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(10) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_kategori` int(10) NOT NULL,
  `pertemuan` varchar(10) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `sebagai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `npm`, `waktu`, `id_kategori`, `pertemuan`, `shift`, `sebagai`) VALUES
(59, '51418039', '2021-07-16 00:16:23', 21, '1', '1', 'admin'),
(62, '51418039', '2021-07-22 01:21:57', 21, '2', '2', 'admin'),
(63, '12345678', '2021-07-22 01:25:08', 21, '3', '4', 'asisten'),
(64, '12345678', '2021-07-22 01:27:31', 23, '2', '4', 'asisten'),
(65, '12345678', '2021-07-30 13:23:16', 21, '1', '7', 'asisten'),
(66, '51418039', '2021-07-30 13:30:40', 21, '1', '5', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `npm` varchar(8) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `norek` varchar(32) NOT NULL,
  `password` varchar(16) NOT NULL,
  `status` set('admin','programmer','asisten','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`npm`, `nama`, `kelas`, `norek`, `password`, `status`) VALUES
('12345678', 'Test User', 'XXXXX', 'XXXXXXXXXXX', 'satuduatiga', 'asisten'),
('12345679', 'Test User 2', 'XXXXX', 'XXXXXXXXXXX', 'satuduatiga', 'programmer'),
('51418039', 'Ari Dwi Saputra', '3IA18', '51820036676', 'satuduatiga', 'admin'),
('52418053', 'Ditya Anggraeni', '3IA19', '07123891289371829', 'aridwi203', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `npm` (`npm`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`npm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`npm`) REFERENCES `pengguna` (`npm`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
