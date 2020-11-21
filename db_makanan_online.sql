-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Agu 2017 pada 17.09
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_makanan_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` varchar(50) NOT NULL,
  `nm_admin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `alamt_admin` varchar(100) NOT NULL,
  `notelp_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nm_admin`, `username`, `password`, `email_admin`, `alamt_admin`, `notelp_admin`) VALUES
('AD-0001', 'Admin Makanan Online', 'admin123', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', 'alamat admin', '082295673583');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_pembelian`
--

CREATE TABLE `tbl_detail_pembelian` (
  `id_detail_pembelian` varchar(50) NOT NULL,
  `id_pembelian` varchar(50) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_pembelian`
--

INSERT INTO `tbl_detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_produk`, `jumlah_pembelian`) VALUES
('DP-001', 'PM-001', 'PR-0001', 1),
('DP-002', 'PM-001', 'PR-0002', 1),
('DP-003', 'PM-002', 'PR-0001', 1),
('DP-004', 'PM-002', 'PR-0003', 1),
('DP-005', 'PM-003', 'PR-0002', 1),
('DP-006', 'PM-004', 'PR-0002', 1),
('DP-007', 'PM-005', 'PR-0001', 5),
('DP-008', 'PM-006', 'PR-0006', 1),
('DP-009', 'PM-007', 'PR-0001', 1),
('DP-010', 'PM-008', 'PR-0003', 10),
('DP-011', 'PM-009', 'PR-0002', 1),
('DP-012', 'PM-010', 'PR-0004', 1),
('DP-013', 'PM-010', 'PR-0002', 1),
('DP-014', 'PM-011', 'PR-0002', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `id_kurir` varchar(50) NOT NULL,
  `nm_kurir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kurir`
--

INSERT INTO `tbl_kurir` (`id_kurir`, `nm_kurir`) VALUES
('KR-0001', 'JNE'),
('KR-0002', 'Pos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_kurir` varchar(50) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `status_pembelian` enum('Proses','Bayar','Kirim','Selesai') NOT NULL,
  `foto_transfer` varchar(50) DEFAULT NULL,
  `total_pembelian` int(11) NOT NULL,
  `no_resi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_user`, `id_kurir`, `tgl_pembelian`, `status_pembelian`, `foto_transfer`, `total_pembelian`, `no_resi`) VALUES
('PM-001', 'US-0002', 'KR-0001', '2017-08-14', 'Selesai', '1.png', 30000, ''),
('PM-002', 'US-0003', 'KR-0001', '2017-08-14', 'Proses', NULL, 25000, ''),
('PM-003', 'US-0002', 'KR-0002', '2017-08-14', 'Selesai', '2.png', 15000, ''),
('PM-004', 'US-0002', 'KR-0001', '2017-08-16', 'Selesai', '3.png', 15000, ''),
('PM-005', 'US-0001', 'KR-0001', '2017-08-21', 'Selesai', 'class.jpg', 75000, ''),
('PM-006', 'US-0002', 'KR-0001', '2017-08-21', 'Selesai', 'class1.jpg', 10, ''),
('PM-007', 'US-0001', 'KR-0002', '2017-08-21', 'Proses', NULL, 15000, ''),
('PM-008', 'US-0001', 'KR-0001', '2017-08-21', 'Proses', NULL, 100000, ''),
('PM-009', 'US-0002', 'KR-0001', '2017-08-24', 'Selesai', '21.png', 15000, 'asdasd-0001as'),
('PM-010', 'US-0002', 'KR-0001', '2017-08-27', 'Bayar', '11.png', 25000, ''),
('PM-011', 'US-0002', 'KR-0001', '2017-08-27', 'Bayar', '12.png', 15000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nm_produk` varchar(100) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `kategori_produk` enum('Bumbu Khas','Tahu Kering','Keripik') NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` varchar(100) NOT NULL,
  `foto_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_user`, `nm_produk`, `stok_produk`, `kategori_produk`, `harga_produk`, `deskripsi_produk`, `foto_produk`) VALUES
('PR-0001', 'US-0002', 'Tahu Samosa', 1001, 'Tahu Kering', 15000, 'Tahu khas bandung yang lezat gurihnyoi', '337820_56de1bc8-b997-11e4-be6f-b25f2523fab8.jpg'),
('PR-0002', 'US-0001', 'Cihu', 97, 'Tahu Kering', 15000, 'Cihu enak isi sapi', '337820_d516f340-b995-11e4-a57d-ec882523fab8.jpg'),
('PR-0003', 'US-0002', 'Lotek', 90, 'Bumbu Khas', 10000, 'Lotek Sehat dan Segar', '337820_48c888a6-b998-11e4-a9eb-05942523fab8.jpg'),
('PR-0004', 'US-0003', 'Keripik Buah', 99, 'Keripik', 10000, 'Keripik Buah Gurih', 'jual-keripik-buah-di-batam.jpg'),
('PR-0005', 'US-0003', 'Keripik Setan', 100, 'Keripik', 10000, 'Keripik Setan Pedas', 'keripik_setan.jpg'),
('PR-0006', 'US-0003', 'Keripik Seblak', 100, 'Keripik', 10, 'Keripik Seblak Mantap', 'kerupuk_seblak_sarae.jpg'),
('PR-0007', 'US-0001', 'Galendo', 100, 'Bumbu Khas', 10000, 'Bubuk bermacam rasa', 'Oleh_oleh_khas_Bandung_Galendo_Bubuk_Rasa_original_85gr.jpg'),
('PR-0008', 'US-0001', 'Keripik Pict', 100, 'Keripik', 10000, 'Keripik mantap', 'pict_php-500x5001.jpg'),
('PR-0009', 'US-0002', 'Tahu Buntel', 100, 'Tahu Kering', 15000, 'Tahu Buntel Sedap', 'Label_Tahu_Buntel.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(50) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `alamt_user` varchar(100) NOT NULL,
  `notelp_user` varchar(100) NOT NULL,
  `level_user` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nm_user`, `username`, `password`, `email_user`, `alamt_user`, `notelp_user`, `level_user`) VALUES
('US-0001', 'Admin Makanan Online', 'admin123', '0192023a7bbd73250516f069df18b500', 'dieabra@gmail.com', 'alamat admin', '082295673583', 'Admin'),
('US-0002', 'Aldy Muldanie', 'aldy123', 'b24f9978ebe96b1b507838ff8edf50e1', 'dieabra@gmail.com', 'jl sariasih', '082295673583', 'User'),
('US-0003', 'Sigit Abdurahman', 'sigit123', 'd6916d248b949bb73ee7066f567151f2', 'sigit@gmail.com', 'jl sariasih', '0292092332', 'User'),
('US-0004', 'afasdfsdfa', 'asdfadsfdsf', '64a393066781d84e082764e55812dc6a', 'dlakdf@ma.com', 'sdfasdfa', '2828292', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
