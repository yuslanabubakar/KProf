-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Des 2017 pada 15.06
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `idBarang` varchar(10) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `idJenis` varchar(10) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idBarang`, `namaBarang`, `idJenis`, `harga`) VALUES
('MN0002', 'Caramel Latte', 'JNS0001', 30000),
('MN0003', 'Americano', 'JNS0001', 22000),
('MN0004', 'Roti Bakar Chocolate', 'JNS0002', 18000),
('MN0005', 'Roti Bakar Strawberry Jam', 'JNS0002', 18000),
('MN0006', 'Roti Bakar Strawberry Whip', 'JNS0002', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaksi`
--

CREATE TABLE IF NOT EXISTS `detailtransaksi` (
`no` int(10) NOT NULL,
  `idTransaksi` varchar(10) NOT NULL,
  `idBarang` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `diskon` int(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`no`, `idTransaksi`, `idBarang`, `jumlah`, `diskon`) VALUES
(53, 'TRS46', 'MN0003', 1, 0),
(52, 'TRS46', 'MN0002', 1, 0),
(51, 'TRS45', 'MN0002', 3, 15000),
(50, 'TRS44', 'MN0002', 3, 15000),
(49, 'TRS', 'MN0002', 2, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `idJenis` varchar(10) NOT NULL,
  `namaJenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`idJenis`, `namaJenis`) VALUES
('JNS0001', 'Minuman'),
('JNS0002', 'Makanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `idKaryawan` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noTlp` varchar(15) NOT NULL,
  `jabatan` enum('admin','petugas') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `nama`, `alamat`, `noTlp`, `jabatan`, `username`, `password`) VALUES
('KR001', 'Admin Coffee', 'BMAN COFFEE SHOP', '', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `idPelanggan` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `noMeja` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `idSupplier` varchar(10) NOT NULL,
  `namaSuplier` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noTlp` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`ind` int(5) NOT NULL,
  `idTransaksi` varchar(10) NOT NULL,
  `tglTransaksi` date NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ind`, `idTransaksi`, `tglTransaksi`, `total`) VALUES
(47, 'TRS46', '2017-12-22', 38000),
(46, 'TRS45', '2017-12-22', 51000),
(45, 'TRS44', '2017-12-22', 51000),
(44, 'TRS', '2017-12-22', 55000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
 ADD PRIMARY KEY (`idJenis`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`idKaryawan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`idSupplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`ind`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
MODIFY `no` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `ind` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
