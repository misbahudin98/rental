-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Agu 2019 pada 16.57
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `auth_key` varchar(50) NOT NULL,
  `access_token` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `auth_key`, `access_token`, `role`, `created_at`, `updated_at`) VALUES
(4, 'udin', '$2y$13$rrvNTtmFHYS0Ng8kzBVplukThPw7J0vIiJ2xGaO4xW52we8eOdlZ2', 'S7_BmZw--dxsv6DpNEpKTUr5EKR-U94z', '', '', '0000-00-00', '0000-00-00'),
(5, 'minuq', '$2y$13$5mEQSthtTB..VldKAQz6o.uCMK6ybnPkCs3mYOfc9NpqbCLiMFany', 'wAbiqIdNTIiXAKokDSwRzJX-a-awjpRk', '', '', '0000-00-00', '0000-00-00'),
(6, 'yolo', '$2y$13$DWnIgB2hpxd8PHNow1Mg5u1EwIXtXzXj3nj8qU9F67ZB2ONa6X2Ke', 'CqIIwEXTqL--nv1GH645UVgxPxRZw1jg', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti`
--

CREATE TABLE `bukti` (
  `id` int(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `id_sewa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukti`
--

INSERT INTO `bukti` (`id`, `bukti`, `id_sewa`) VALUES
(47, 'uploads/sewa48.jpg', 0),
(198, 'uploads/sewa198.png', 0),
(200, 'uploads/sewa200.jpg', 0),
(202, 'uploads/sewa202.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1546834099);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `hingga` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `merk`, `kapasitas`, `harga`, `logo`, `status`, `hingga`) VALUES
(1, 'kijang inova', 10, 10000, 'uploads/kijang.jpg', 'tersedia', '2019-01-21'),
(3, 'mecedes', 2, 21000, 'uploads/mercedes.jpg', 'tidak tersedia', '0000-00-00'),
(5, 'pajero', 2, 40000, 'uploads/pajero.jpg', 'tersedia', '0000-00-00'),
(8, 'luxio', 10, 1000, 'uploads/luxio.jpg', 'tidak tersedia', '2019-02-02'),
(9, 'lamor', 2, 1000, 'uploads/lamor.jpg', 'tidak tersedia', '2019-01-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_sewa` int(255) NOT NULL,
  `id_client` int(255) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `total_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewaan`
--

INSERT INTO `penyewaan` (`id_sewa`, `id_client`, `id_mobil`, `tanggal_pemesanan`, `tanggal_sewa`, `tanggal_kembali`, `total_pembayaran`) VALUES
(26, 12, 8, '2019-01-02', '2019-01-03', '2019-01-04', 0),
(27, 12, 8, '2019-01-02', '2019-01-03', '2019-01-04', 0),
(31, 1, 1, '2019-01-24', '2019-01-19', '2019-01-21', 20000),
(32, 8, 9, '2019-01-27', '2019-01-10', '2019-01-12', 2000),
(33, 8, 9, '2019-01-27', '2019-01-10', '2019-01-12', 2000),
(34, 8, 9, '2019-01-30', '2019-01-23', '2019-01-25', 2000),
(35, 8, 9, '2019-01-30', '2019-01-23', '2019-01-25', 2000),
(36, 8, 9, '2019-01-30', '2019-01-23', '2019-01-25', 2000),
(37, 8, 8, '2019-01-30', '2019-01-24', '2019-01-26', 2000),
(38, 8, 8, '2019-01-30', '2019-01-24', '2019-01-26', 2000),
(39, 8, 8, '2019-01-30', '2019-01-24', '2019-01-26', 2000),
(40, 2, 9, '2019-01-30', '2019-01-24', '2019-01-26', 2000),
(41, 2, 9, '2019-01-30', '2019-01-24', '2019-01-26', 2000),
(47, 2, 8, '2019-01-30', '2019-01-24', '2019-01-26', 2000),
(48, 2, 8, '2019-01-30', '2019-02-07', '2019-02-09', 2000),
(198, 8, 8, '2019-02-01', '2019-01-31', '2019-02-02', 2000),
(199, 14, 1, '2019-02-02', '2019-02-20', '2019-02-22', 20000),
(200, 14, 1, '2019-02-02', '2019-02-20', '2019-02-22', 20000),
(201, 14, 1, '2019-02-02', '2019-02-14', '2019-02-16', 20000),
(202, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(203, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(204, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(205, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(206, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(207, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(208, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(209, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(210, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(211, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(212, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000),
(213, 1, 1, '2019-02-05', '2019-02-06', '2019-02-08', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(225) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipe_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `tipe_akun`) VALUES
(1, 'admin', 'admin', 'nidu@gmail.com', 1),
(2, 'nidu', 'udin', 'minuq98@gmail.com', 2),
(3, 'anime', 'anime', 'anime@gmail.com', 2),
(4, 'kartolo', 'kartolo', 'kartolo@gmail.com', 2),
(5, 'dangdut', 'dangdut', 'dangdut@gmail.com', 2),
(6, 'dompo', 'dompo', 'dompo@gmail.com', 2),
(7, 'yasin', 'yasin', 'yasin@gmail.com', 2),
(8, 'jaja', 'jaja', 'jaja@gmail.com', 2),
(9, 'jojod', 'jojod', 'jojod@gmail.com', 0),
(11, '1', '1', '1@gmail.com', 0),
(12, 'anjay', 'annjay', 'anjay@gmail.com', 0),
(13, 'mi', 'mi', 'mi@gmail.com', 0),
(14, 'lolo', 'lolo', 'lolo@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `penyewaan_ibfk_2` (`id_client`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id_sewa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bukti`
--
ALTER TABLE `bukti`
  ADD CONSTRAINT `bukti_ibfk_1` FOREIGN KEY (`id`) REFERENCES `penyewaan` (`id_sewa`);

--
-- Ketidakleluasaan untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
