-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2026 at 08:49 AM
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
-- Database: `kios_tendri_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_pengaturan`
--

CREATE TABLE `db_pengaturan` (
  `id` int(10) NOT NULL,
  `nama_toko` varchar(80) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deskripsi_singkat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_pengaturan`
--

INSERT INTO `db_pengaturan` (`id`, `nama_toko`, `alamat`, `telepon`, `email`, `deskripsi_singkat`) VALUES
(1, 'Kios Tendri', 'Rampoang, Sulawesi Selatan', '-', '', 'Temukan kebutuhan sehari-hari di Kios Tendri');

-- --------------------------------------------------------

--
-- Table structure for table `db_produk`
--

CREATE TABLE `db_produk` (
  `id_produk` int(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(80) NOT NULL,
  `kategori` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_produk`
--

INSERT INTO `db_produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `deskripsi`, `foto`, `kategori`) VALUES
(1, 'Teh Pucuk 350ml', 5000, 20, 'Minuman teh kemasan botol 350ml', '', 'minuman'),
(2, 'Mimis Madu', 6000, 20, 'Minuman madu kemasan botol', '', 'minuman'),
(3, 'Mizone', 11000, 15, 'Minuman isotonik kemasan botol', '', 'minuman'),
(4, 'ABC Exo Milk', 16000, 10, 'Minuman susu kemasan botol', '', 'minuman'),
(5, 'Milku Coklat', 5000, 25, 'Minuman susu coklat kemasan botol', '', 'minuman'),
(6, 'Teh Kotak', 5000, 30, 'Minuman teh kemasan kotak', '', 'minuman'),
(7, 'Indomie Coto', 4000, 50, 'Mie instan rasa coto kemasan bungkus', '', 'makanan'),
(8, 'Sedaap Mie Goreng', 4600, 40, 'Mie instan goreng kemasan bungkus', '', 'makanan'),
(9, 'Roma Malkis Abon', 10000, 15, 'Biskuit malkis isi abon', '', 'makanan'),
(10, 'Nabati Wafer Coklat', 2000, 50, 'Wafer coklat per pcs', '', 'makanan'),
(11, 'Kis Mint Barley', 8000, 20, 'Permen mint barley', '', 'makanan'),
(12, 'Es Krim Kaco', 10000, 30, 'Es krim aneka rasa', '', 'minuman'),
(13, 'Putro Sulawesi Coklat', 11000, 25, 'Coklat khas Sulawesi kemasan pack', '', 'makanan'),
(14, 'Roti Jordan Coklat', 20000, 15, 'Roti isi coklat kemasan pax', '', 'makanan'),
(15, 'Goreng Jagung Bakar', 18000, 10, 'Cemilan jagung bakar kemasan pax', '', 'makanan'),
(16, 'Kerupuk Kacang', 20000, 12, 'Kerupuk kacang kemasan btl', '', 'makanan'),
(17, 'Meco', 5000, 30, 'Minuman sari buah kemasan btl', '', 'minuman'),
(18, 'Ichitan Thai Tea', 9000, 15, 'Minuman teh thai kemasan btl', '', 'minuman'),
(19, 'Good Clay Botol', 7000, 20, 'Minuman teh kemasan botol', '', 'minuman'),
(20, 'A. Milo 12', 30000, 10, 'Susu bubuk milo kemasan', '', 'susu & olahan'),
(21, 'Chass Milk 16', 35000, 8, 'Susu bubuk kemasan 16 sachet', '', 'susu & olahan'),
(22, 'Chass Mild 16', 37000, 8, 'Susu bubuk kemasan 16 sachet', '', 'susu & olahan'),
(23, 'Chass Mild 20', 37000, 8, 'Susu bubuk kemasan 20 sachet', '', 'susu & olahan'),
(24, 'GG Surya 15', 40000, 10, 'Cemilan keripik kemasan bungkus', '', ''),
(25, 'Troy 20', 32000, 12, 'Cemilan kemasan bungkus', '', ''),
(26, 'La Bolo 20', 42000, 10, 'Cemilan kemasan bungkus', '', ''),
(27, 'Scorpion 20', 32000, 10, 'Cemilan kemasan bungkus', '', ''),
(28, 'Lampion Mild 16', 27000, 15, 'Cemilan kemasan bungkus', '', ''),
(29, 'Potenza Bold 20', 30000, 12, 'Cemilan kemasan bungkus', '', ''),
(30, 'Potenza Kastela 16', 15000, 18, 'Cemilan kemasan bungkus', '', ''),
(31, 'Tori Nongkrong Leci', 25000, 15, 'Minuman rasa leci kemasan', '', ''),
(32, 'Mount Apple 18', 25000, 12, 'Minuman sari apel kemasan', '', ''),
(33, 'Kinso Doyajul', 6000, 30, 'Cemilan manis kemasan bks', '', ''),
(34, 'Sampo Sunsil', 18000, 10, 'Sampo kemasan botol', '', ''),
(35, 'Beras 5kg', 75000, 5, 'Beras kualitas baik kemasan 5kg', '', ''),
(36, 'Gula Putih 1kg', 20000, 10, 'Gula pasir kemasan 1kg', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_pengaturan`
--
ALTER TABLE `db_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_produk`
--
ALTER TABLE `db_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_pengaturan`
--
ALTER TABLE `db_pengaturan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_produk`
--
ALTER TABLE `db_produk`
  MODIFY `id_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
