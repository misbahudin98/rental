-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 05:41 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1546834099);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `merk`, `kapasitas`, `harga`, `status`) VALUES
(1, 'kijang inova', 10, 10000, 'tersedia'),
(3, 'mecedes', 2, 21000, 'tidak tersedia'),
(5, 'truck', 2, 40000, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_sewa` int(255) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_sewa`, `id_client`, `id_mobil`, `tanggal_sewa`, `tanggal_kembali`, `total_pembayaran`, `status`) VALUES
(1, 1, 3, '2019-01-01', '2019-01-02', 21000, ''),
(2, 1, 3, '2019-01-03', '2019-01-03', 21000, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'nidu', 'udin', 'nidu@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id_sewa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id`),
  ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
