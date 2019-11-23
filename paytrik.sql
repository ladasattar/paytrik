-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 12:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paytrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `kodelogin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`kodelogin`, `username`, `password`, `namalengkap`, `level`) VALUES
(28, 'adminpaytrik', '$2y$12$wm31fZSKFiGDh24AITdHJuJeXj.PejUDvmoeAW/x/Vk79ybbkBrR6', 'Admin Paytrik', 'super_admin'),
(94, 'ladasattar', '$2y$12$GANw0peVj1Ld6XbAM82LW.J1sA6O0pZEA6f/4oXFMLo2LAkvhEIdC', 'Muqorroba Lada Sattar', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kodepelanggan` int(11) NOT NULL,
  `nometer` varchar(30) NOT NULL,
  `kodetarif` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kodepelanggan`, `nometer`, `kodetarif`, `nama`, `tlp`, `alamat`) VALUES
(29, '12345', 1, 'Muqorroba Lada Sattar', '+62895345409970', 'Jalan Tukad Yeh Panan, Blok 19, No. 32\r\nPerumnas Bukit Sanggulan, Kediri'),
(30, '1454235', 3, 'I Made Atta', '+62895345409970', 'Jalan Tukad Yeh Panan, Blok 19, No. 32\r\nPerumnas Bukit Sanggulan, Kediri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `kodepembayaran` int(11) NOT NULL,
  `kodetagihan` int(11) NOT NULL,
  `tglbayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pemakaian` varchar(30) NOT NULL,
  `totaldibayar` varchar(30) NOT NULL,
  `buktipembayaran` varchar(255) NOT NULL,
  `statuspembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`kodepembayaran`, `kodetagihan`, `tglbayar`, `pemakaian`, `totaldibayar`, `buktipembayaran`, `statuspembayaran`) VALUES
(6, 17, '2019-11-21 01:56:27', '100', '137700', 'img0015dd5eea220b25.jpg', 'Terkonfirmasi'),
(7, 17, '2019-11-21 01:57:26', '150', '205300', 'img0015dd5eefe8a4c9.jpg', 'Terkonfirmasi'),
(8, 17, '2019-11-21 02:05:27', '50', '70100', 'smartphone-015dd5f0da080a0.png', 'Terkonfirmasi'),
(9, 18, '2019-11-21 09:55:57', '50', '75850', 'img0015dd65f0f3c65f.jpg', 'Terkonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `kodetagihan` int(11) NOT NULL,
  `kodepelanggan` int(11) NOT NULL,
  `tahuntagihan` varchar(5) NOT NULL,
  `bulantagihan` varchar(15) NOT NULL,
  `pemakaianakhir` varchar(30) NOT NULL,
  `tglpencatatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `totalbayar` varchar(30) NOT NULL,
  `tglmulaibayar` date NOT NULL,
  `tglakhirbayar` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`kodetagihan`, `kodepelanggan`, `tahuntagihan`, `bulantagihan`, `pemakaianakhir`, `tglpencatatan`, `totalbayar`, `tglmulaibayar`, `tglakhirbayar`, `status`, `keterangan`) VALUES
(17, 29, '2019', 'November', '50', '2019-11-21 02:05:27', '70100', '2019-11-21', '2019-11-21', 'lunas', ''),
(18, 30, '2019', 'November', '50', '2019-11-21 09:55:57', '75850', '2019-11-21', '2019-11-21', 'lunas', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `kodetarif` int(11) NOT NULL,
  `goltarif` varchar(30) NOT NULL,
  `daya` varchar(50) NOT NULL,
  `tarifperkwh` varchar(30) NOT NULL,
  `beban` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tarif`
--

INSERT INTO `tb_tarif` (`kodetarif`, `goltarif`, `daya`, `tarifperkwh`, `beban`) VALUES
(1, 'R-0/TR', '900', '1352', '2500'),
(2, 'R-1/TR', '1300', '1467', '2500'),
(3, 'R-1/TR', '2200', '1467', '2500'),
(4, 'R-2/TR', '3500', '1467', '2500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`kodelogin`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kodepelanggan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`kodepembayaran`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`kodetagihan`);

--
-- Indexes for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`kodetarif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `kodelogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `kodepelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `kodepembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `kodetagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `kodetarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
