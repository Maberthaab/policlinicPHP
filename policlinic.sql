-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Feb 2020 pada 03.17
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `policlinic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE IF NOT EXISTS `tb_dokter` (
  `id_dokter` varchar(100) NOT NULL,
  `nm_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `tarif` varchar(100) NOT NULL,
  `kd_poli` varchar(100) NOT NULL,
  `nm_poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nm_dokter`, `spesialis`, `tarif`, `kd_poli`, `nm_poli`) VALUES
('DKT-001', 'Dr.wicis', 'jantung', '50000', 'POL-002', 'Poli Jantung'),
('DKT-002', 'Dr. Reza', 'Gigi', '50000', 'POL-004', 'Poli Gigi'),
('DKT-003', 'dr jenie', 'jantung', '20000', 'POL-002', 'Poli Jantung'),
('DKT-004', 'Dr.Lisa', 'Mata', '50000', 'POL-003', 'Poli Mata'),
('DKT-005', 'Dr Jisoo', 'Kandungan', '50000', 'POL-005', 'Poli Kandungan'),
('DKT-006', 'Dr Jimin', 'Kulit', '50000', 'POL-001', 'Poli Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE IF NOT EXISTS `tb_obat` (
  `kd_obat` int(50) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `stok` int(50) NOT NULL,
  `tarif` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`kd_obat`, `nm_obat`, `jenis_obat`, `stok`, `tarif`) VALUES
(201, 'Proris', 'Sirup', 230, 5000),
(202, 'Oskadon', 'Kaplet', 92, 5000),
(203, 'Vitamin A', 'Kaplet', 200, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE IF NOT EXISTS `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nm_pasien` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `nm_dokter` varchar(100) NOT NULL,
  `kd_poli` varchar(50) NOT NULL,
  `id_dokter` varchar(100) NOT NULL,
  `terdaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nm_pasien`, `jenis_kelamin`, `alamat`, `umur`, `nm_dokter`, `kd_poli`, `id_dokter`, `terdaftar`) VALUES
('PAS-001', 'wicis', 'Perempuan', 'pulo', '18 tahun', 'Dr.wicis', 'POL-002', 'DKT-001', '2020-01-02'),
('PAS-002', 'cecilia', 'Perempuan', 'pulo', '18 tahun', 'dr jenie', 'POL-002', 'DKT-003', '2020-02-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemeriksaan`
--

CREATE TABLE IF NOT EXISTS `tb_pemeriksaan` (
  `id_pemeriksaan` varchar(255) NOT NULL,
  `id_pasien` varchar(255) NOT NULL,
  `nm_pasien` varchar(100) NOT NULL,
  `id_dokter` varchar(100) NOT NULL,
  `kd_poli` varchar(100) NOT NULL,
  `nm_poli` varchar(50) NOT NULL,
  `nm_dokter` varchar(100) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemeriksaan`
--

INSERT INTO `tb_pemeriksaan` (`id_pemeriksaan`, `id_pasien`, `nm_pasien`, `id_dokter`, `kd_poli`, `nm_poli`, `nm_dokter`, `keluhan`, `diagnosa`, `tgl_periksa`) VALUES
('PRKS001', 'PAS-001', 'wicis', 'DKT-001', 'POL-002', 'Poli Jantung', 'Dr.wicis', 'dada sakit', 'jantung', '2020-01-03'),
('PRKS002', 'PAS-002', 'cecilia', 'DKT-003', 'POL-002', 'Poli Jantung', 'dr jenie', 'sesak nafas', 'sakit jantung', '2020-02-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poli`
--

CREATE TABLE IF NOT EXISTS `tb_poli` (
  `kd_poli` varchar(50) NOT NULL,
  `nm_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_poli`
--

INSERT INTO `tb_poli` (`kd_poli`, `nm_poli`) VALUES
('POL-001', 'Poli Umum'),
('POL-002', 'Poli Jantung'),
('POL-003', 'Poli Mata'),
('POL-004', 'Poli Gigi'),
('POL-005', 'Poli Kandungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resep`
--

CREATE TABLE IF NOT EXISTS `tb_resep` (
  `id_resep` varchar(100) NOT NULL,
  `id_pemeriksaan` varchar(100) NOT NULL,
  `nm_pasien` varchar(100) NOT NULL,
  `nm_poli` varchar(100) NOT NULL,
  `nm_dokter` varchar(100) NOT NULL,
  `nm_obat` varchar(100) NOT NULL,
  `kd_obat` varchar(100) NOT NULL,
  `tarif_obat` int(100) NOT NULL,
  `jml_obat` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_resep`
--

INSERT INTO `tb_resep` (`id_resep`, `id_pemeriksaan`, `nm_pasien`, `nm_poli`, `nm_dokter`, `nm_obat`, `kd_obat`, `tarif_obat`, `jml_obat`, `total`) VALUES
('RES-001', 'PRKS001', 'wicis', 'Poli Jantung', 'Dr.wicis', 'Oskadon', '202', 5000, 2, 10000),
('RES-002', 'PRKS001', 'wicis', 'Poli Jantung', 'Dr.wicis', 'Oskadon', '202', 5000, 2, 10000),
('RES-003', 'PRKS001', 'wicis', 'Poli Jantung', 'Dr.wicis', 'Paracetamol 500gr', '202', 5000, 2, 10000),
('RES-004', 'PRKS002', 'cecilia', 'Poli Jantung', 'dr jenie', 'Proris', '201', 5000, 3, 15000);

--
-- Trigger `tb_resep`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `tb_resep`
 FOR EACH ROW BEGIN
UPDATE tb_obat SET stok=stok-NEW.jml_obat
WHERE kd_obat=NEW.kd_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE IF NOT EXISTS `tb_stok` (
  `id` int(255) NOT NULL,
  `kd_obat` int(50) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `stok` int(50) NOT NULL,
  `tarif` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id`, `kd_obat`, `nm_obat`, `jenis_obat`, `stok`, `tarif`) VALUES
(1, 201, ' Proris ', ' Sirup ', 50, 50000),
(2, 202, ' Oskadon ', ' Kaplet ', 20, 5000);

--
-- Trigger `tb_stok`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `tb_stok`
 FOR EACH ROW BEGIN
UPDATE tb_obat SET stok=stok+NEW.stok
WHERE kd_obat=NEW.kd_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `nm_pasien` varchar(100) NOT NULL,
  `nm_poli` varchar(100) NOT NULL,
  `nm_dokter` varchar(100) NOT NULL,
  `total_bayar` varchar(100) NOT NULL,
  `jumlah_bayar` int(100) NOT NULL,
  `kembalian` int(100) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `nm_pasien`, `nm_poli`, `nm_dokter`, `total_bayar`, `jumlah_bayar`, `kembalian`, `tgl_periksa`) VALUES
('TRN-001', 'wicis', 'Poli Jantung', 'Dr.wicis', '60000', 100000, 40000, '2020-02-07'),
('TRN-002', 'cecilia', 'Poli Jantung', 'dr jenie', '35000', 100000, 65000, '2020-02-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_account`
--

INSERT INTO `user_account` (`id_user`, `username`, `password`, `level`) VALUES
(5, 'pendaftaran', 'pendaftaran', 'tpprj'),
(7, 'pemeriksaan', 'pemeriksaan', 'pemeriksaan'),
(9, 'apotek', 'apotek', 'apotek'),
(10, 'admin', 'admin', 'admin'),
(11, 'kasir', 'kasir', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_pemeriksaan`
--
ALTER TABLE `tb_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`kd_poli`);

--
-- Indexes for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
