-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2025 at 12:37 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konveksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `no_telepon`, `username`, `password`, `level`) VALUES
(1, 'adi wiryawan', '082145021559', 'adi', 'adi', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama` varchar(150) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `no_telepon`, `username`, `password`) VALUES
(1, 'krisna', '089342348', 'krisna', 'krisna'),
(2, 'yuda shaka kusuma', '089845312', 'yuda', 'yuda'),
(3, 'bayu', '0898342234', 'bayu', 'bayu'),
(4, 'rama', '0893289932', 'rama', 'rama');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_pesanan` varchar(100) NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `jumlah_bayar` float DEFAULT NULL,
  `metode_pembayaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `tanggal_pembayaran`, `jumlah_bayar`, `metode_pembayaran`) VALUES
(1, 'BRG001', '2025-01-04', 2250000, 'cash'),
(2, 'BRG002', '2025-01-04', 5100000, 'cash'),
(3, 'BRG003', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(100) NOT NULL,
  `id_pelanggan` int NOT NULL,
  `kode_produk` int NOT NULL,
  `ukuran_s` int NOT NULL,
  `ukuran_m` int NOT NULL,
  `ukuran_l` int NOT NULL,
  `ukuran_xl` int NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` float NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `status_pesanan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `kode_produk`, `ukuran_s`, `ukuran_m`, `ukuran_l`, `ukuran_xl`, `jumlah`, `total_harga`, `tanggal_pesanan`, `status_pesanan`) VALUES
('BRG001', 4, 1004, 0, 0, 20, 10, 30, 2250000, '2025-01-04', 'lunas'),
('BRG002', 2, 1003, 100, 50, 20, 0, 170, 5100000, '2025-01-04', 'lunas'),
('BRG003', 2, 1002, 50, 100, 0, 10, 160, 6400000, '2025-01-04', 'belum dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` int NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `jenis_produk` varchar(150) NOT NULL,
  `jenis_bahan` varchar(150) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `stok` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `jenis_produk`, `jenis_bahan`, `warna`, `harga`, `stok`) VALUES
(1001, 'adidas', 'baju', 'cotton combed 24s', 'maroon', 50000, 1000),
(1002, 'puma', 'baju', 'katun 30s', 'hitam', 40000, 1000),
(1003, 'h&m', 'baju', 'cotten combod 20s', 'pink', 30000, 2000),
(1004, 'von dutch', 'baju', 'cotten combod premium', 'biru', 75000, 50),
(1005, 'adidas', 'baju', 'cotten combod 20s', 'maroon', 50000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int NOT NULL,
  `id_admin` int NOT NULL,
  `id_pembayaran` int NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status_produksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `id_admin`, `id_pembayaran`, `tanggal_mulai`, `tanggal_selesai`, `status_produksi`) VALUES
(1, 1, 1, '2025-01-04', '2025-01-07', 'berjalan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_pesanan` (`id_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_pelanggan` (`id_pelanggan`),
  ADD KEY `fk_produk` (`kode_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `fk_admin` (`id_admin`),
  ADD KEY `fk_pembayaran` (`id_pembayaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_pembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
