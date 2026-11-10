-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 09, 2026 at 07:08 AM
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
-- Table structure for table `db_admin`
--

CREATE TABLE `db_admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_admin`
--

INSERT INTO `db_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `db_pelanggan`
--

CREATE TABLE `db_pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_whatsapp` text NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_pengaturan`
--

CREATE TABLE `db_pengaturan` (
  `id` int(10) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `banner_beranda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_pengaturan`
--

INSERT INTO `db_pengaturan` (`id`, `nama_website`, `banner_beranda`) VALUES
(1, '', ''),
(2, '', ''),
(3, 'kios_tendri', 'foto_kios_tendri.jpg'),
(4, 'kios_tendri', 'banner.jpg');

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
(1, 'Teh Pucuk 350ml', 5000, 20, 'Minuman teh kemasan botol 350ml', 'teh_pucuk.jpg', 'minuman'),
(2, 'nipis Madu', 6000, 20, 'Minuman madu kemasan botol', 'nipis_madu.jpg', 'minuman'),
(3, 'Mizone', 8000, 15, 'Minuman isotonik kemasan botol', 'mizone.jpg', 'minuman'),
(4, 'ABC Exo Milk', 5000, 10, 'Minuman susu kemasan botol', 'kopi_susu.jpg', 'minuman'),
(5, 'Milku Coklat', 5000, 25, 'Minuman susu coklat kemasan botol', 'milku_coklat.jpg', 'minuman'),
(6, 'Teh Kotak', 5000, 30, 'Minuman teh kemasan kotak', 'teh_kotak.jpg', 'minuman'),
(7, 'Indomie Coto', 4000, 50, 'Mie instan rasa coto kemasan bungkus', 'mie_coto.jpg', 'makanan'),
(8, 'Sedaap Mie Goreng', 4600, 40, 'Mie instan goreng kemasan bungkus', 'sedaap_mie.jpg', 'makanan'),
(9, 'Roma Malkis Abon', 1000, 15, 'Biskuit malkis isi abon', 'malkis_abon.jpg', 'makanan'),
(10, 'Nabati Wafer Coklat', 2000, 50, 'Wafer coklat per pcs', 'nabati.jpg', 'makanan'),
(11, 'Kis Mint Barley', 8000, 20, 'Permen mint barley', 'kis_mint.jpg', 'makanan'),
(13, 'Putro bali', 1000, 25, 'Coklat khas bali kemasan pack', 'kue_coklat.jpg', 'makanan'),
(14, 'Roti Jordan Coklat', 2000, 15, 'Roti isi coklat kemasan pax', 'roti.jpg', 'makanan'),
(21, 'Class Milk 16', 35000, 8, 'rokok', 'rokok_clas.jpg', 'lainnya'),
(24, 'GG Surya 15', 40000, 10, 'rokok', 'rokok_surya.jpg', 'lainnya'),
(25, 'Troy 20', 32000, 12, 'rokok', 'rokok_troy.jpg', 'lainnya'),
(26, 'La Bold 20', 42000, 10, 'rokok', 'rokok_la.jpg', 'lainnya'),
(27, 'Scorpion 20', 32000, 10, 'rokok', 'rokok_scrop.jpg', 'lainnya'),
(34, 'Sampo Sunsil', 18000, 10, 'Sampo kemasan ', 'sampo_sunsil.jpg', 'Perlengkapan rumah'),
(35, 'Beras 5kg', 75000, 5, 'Beras kualitas baik kemasan 5kg', 'beras.jpg', 'Beras'),
(36, 'Gula Putih 1kg', 20000, 10, 'Gula pasir kemasan 1kg', 'gula_putih.jpg', 'Perlengkan Rumah'),
(38, 'masako ayam', 1000, 40, '', 'masako.jpg', ''),
(39, 'minyak goreng', 18000, 0, '', 'minyak.jpg', 'beras'),
(40, 'mama lemon', 5000, 0, '', 'sabun.jpg', 'beras'),
(42, 'pasta gigi', 5000, 13, '', 'pasta_gigi.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_admin`
--
ALTER TABLE `db_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `db_pelanggan`
--
ALTER TABLE `db_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

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
-- AUTO_INCREMENT for table `db_admin`
--
ALTER TABLE `db_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_pelanggan`
--
ALTER TABLE `db_pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_pengaturan`
--
ALTER TABLE `db_pengaturan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_produk`
--
ALTER TABLE `db_produk`
  MODIFY `id_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
