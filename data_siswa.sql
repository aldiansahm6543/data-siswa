-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2020 pada 11.16
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(15) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` varchar(225) NOT NULL,
  `jabatan` varchar(120) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `warganegara` varchar(20) NOT NULL,
  `nope` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `photo` text NOT NULL,
  `__active` int(1) NOT NULL,
  `__created` datetime DEFAULT NULL,
  `__updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `ttl`, `jabatan`, `jk`, `agama`, `warganegara`, `nope`, `alamat`, `photo`, `__active`, `__created`, `__updated`) VALUES
('MAKqYV01l3h6Of2', '35544276868', 'Bu harnenih', 'depok 10 - 11 - 1970', 'guru', 'P', 'islam', 'Indonesia', '85771831286', 'jatijajar kecamatan tapos', 'p2.jpg', 1, '2019-04-12 12:26:50', '2019-05-01 04:44:13'),
('O0Ys6VJWuXAt7pf', '982734872', 'Reynaldi', 'Cilodongg 10 - 11 - 2002', 'guru', 'P', 'islam', 'Indonesiaa', '8577183128622', 'jatijajar kecamatan taposs', '5.png', 1, '2019-04-15 16:35:22', '2019-04-25 02:56:22'),
('w4g6ZzFS32fBWTs', '98765432', 'pa nanang', 'depok 11-11-1982', 'guru', 'L', 'islam', 'indonesia', '928379274', 'depok', '201.png', 1, '2019-04-29 07:58:55', '2019-05-04 02:13:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id` varchar(15) NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_awal` varchar(2) NOT NULL,
  `menit_awal` varchar(2) NOT NULL,
  `jam_akhir` varchar(2) NOT NULL,
  `menit_akhir` varchar(2) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id`, `id_kelas`, `kode_mapel`, `hari`, `jam_awal`, `menit_awal`, `jam_akhir`, `menit_akhir`, `nip`) VALUES
('AEFWLGpg296YVIN', 'bU3vQP5T9Z', 'S', 'selasa', '7', '18', '10', '1', '35544276868'),
('osHF2QRGLIKlptv', '2SXHbZYTWo', 'S', 'rabu', '7', '0', '8', '0', '35544276868'),
('QrKXJFqgk2UEMob', 'gNsy7JM4Ee', 'S', 'senin', '7', '5', '8', '35', '35544276868'),
('uTzkID0Xjnf4rqx', 'GOw895A2vL', 'E', 'senin', '7', '0', '8', '0', '982734872'),
('wb2ZMYuhmnONsvo', 'GOw895A2vL', 'P', 'selasa', '8', '0', '9', '0', '982734872');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` varchar(15) NOT NULL,
  `kode_mapel` varchar(25) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode_mapel`, `nama_mapel`) VALUES
('4dkj32LKez7Rhg8', 'N', 'Seni budayaa'),
('bxnD70KLiWogCrs', 'E', 'Pendidikan Kewarganegaraan'),
('D3tcejxGqQWT9IU', 'P', 'Prakarya'),
('eo1fLVIl6QrZ40d', 'K', 'Ilmu Pengetahuan Sosial'),
('kfynSLYH5pZ0zWs', 'H', 'Bahasa Inggris'),
('uZ6tOnzmc10xbwI', 'I', 'Matematika'),
('YLv65ZjyWD7xGMk', 'S', 'Bahasa Sunda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_nilai` varchar(15) NOT NULL,
  `nik_siswa` varchar(20) NOT NULL,
  `id_kelas` varchar(25) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL,
  `tugas` decimal(10,0) NOT NULL,
  `uts` decimal(10,0) NOT NULL,
  `uas` decimal(10,0) NOT NULL,
  `rata` decimal(10,0) NOT NULL,
  `nip_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_nilai`, `nik_siswa`, `id_kelas`, `kode_mapel`, `semester`, `thn_ajaran`, `tugas`, `uts`, `uas`, `rata`, `nip_guru`) VALUES
('E2RKPnz4SUQtajN', '00812378742', '2SXHbZYTWo', 'S', 'Ganjil', '2018-2019', '90', '90', '90', '90', '35544276868'),
('QFADLsNWc3feI4B', '00812378742', '2SXHbZYTWo', 'H', 'Genap', '2018-2019', '90', '90', '90', '90', '982734872'),
('yRHO46UXk3EQMvB', '43928745', 'gNsy7JM4Ee', 'H', 'Ganjil', '2017-2018', '89', '94', '91', '91', '35544276868');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_kelas`
--

CREATE TABLE `ruang_kelas` (
  `id` varchar(20) NOT NULL,
  `nama_ruangan` varchar(25) NOT NULL,
  `jumlah_siswa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang_kelas`
--

INSERT INTO `ruang_kelas` (`id`, `nama_ruangan`, `jumlah_siswa`) VALUES
('2SXHbZYTWo', 'XII RPL 1', 42),
('Av9kbaL1lY', 'X RPL 1', 0),
('bU3vQP5T9Z', 'XII RPL 2', 42),
('djVwFUlLI4', 'X RPL 1', 33),
('gNsy7JM4Ee', 'XI RPL 2', 41),
('GOw895A2vL', 'X RPL 2', 40),
('Q60jSzuOHx', 'X RPL 1', 0),
('VTiwcdDmbt', 'X RPL 1', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(15) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_kelas` varchar(25) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `thn_ajaran` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(55) NOT NULL,
  `ttl` varchar(225) NOT NULL,
  `nope` varchar(13) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `__active` int(1) NOT NULL,
  `__created` datetime DEFAULT NULL,
  `__updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nik`, `id_kelas`, `jk`, `nama`, `thn_ajaran`, `alamat`, `agama`, `ttl`, `nope`, `photo`, `__active`, `__created`, `__updated`) VALUES
('0VdHDql1usNEvk4', '42234124', 'bU3vQP5T9Z', 'L', 'Gadon', '2017-2018', 'jatijajar kecamatan tapos', 'islam', 'depok 10-11-2001', '85771831285', 'eng1.jpg', 1, '2019-04-13 18:57:07', NULL),
('hZHpyal4e5c8BGI', '876364', 'djVwFUlLI4', 'L', 'aldi ansah', '2018-2019', 'jajar', 'Islam', 'depok 08-08-2002', '8577183128622', 'default.jpg', 1, '2019-05-03 14:33:28', NULL),
('uqM8C2fxUtBz0LS', '00812378742', '2SXHbZYTWo', 'L', 'Mohammad Aldiansah', '2017-2018', 'jatijajar kecamatan tapos', 'islam', 'depok 11 - 12 - 2002', '081286121549', 'my_baby1.jpg', 1, '2019-04-13 12:03:52', NULL),
('vyEwKdnBcRmtPV9', '018923831', '2SXHbZYTWo', 'L', 'miji', '2017-2018', 'cilodong', 'islam', 'Cilodong 12 - 12 -2001', '857718312863', 'kuliah.png', 1, '2019-04-13 12:13:00', NULL),
('WrwMTd5vEuksb2A', '43928745', 'gNsy7JM4Ee', 'L', 'seto', '2018-2019', 'paragon', 'islam', 'depok 11-11-1982', '92837927', '17.png', 1, '2019-04-29 08:26:21', NULL),
('ypcJhQAMXTWE9uG', '7654321', 'gNsy7JM4Ee', 'P', 'ALdiansahh', '2018-2019', 'depokk', 'islam', 'depok 08-08-2022', '928379277', 'gulyom.jpg', 1, '2019-04-30 06:32:07', '2019-05-02 00:56:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_has_kelas`
--

CREATE TABLE `siswa_has_kelas` (
  `id` varchar(15) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa_has_kelas`
--

INSERT INTO `siswa_has_kelas` (`id`, `nik`, `id_kelas`) VALUES
('0VdHDql1usNEvk4', '42234124', 'bU3vQP5T9Z'),
('hZHpyal4e5c8BGI', '876364', 'djVwFUlLI4'),
('uqM8C2fxUtBz0LS', '00812378742', '2SXHbZYTWo'),
('vyEwKdnBcRmtPV9', '018923831', '2SXHbZYTWo'),
('WrwMTd5vEuksb2A', '43928745', 'gNsy7JM4Ee'),
('ypcJhQAMXTWE9uG', '7654321', 'gNsy7JM4Ee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(55) NOT NULL,
  `level` enum('admin','guru','siswa') NOT NULL,
  `__active` int(1) DEFAULT NULL,
  `__created` datetime DEFAULT NULL,
  `__updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `nama`, `username`, `password`, `level`, `__active`, `__created`, `__updated`) VALUES
('0VdHDql1usNEvk4', '42234124', 'Gadon', '42234124', 'bcd724d15cde8c47650fda962968f102', 'siswa', 1, '2019-04-13 18:57:07', NULL),
('1', '1', 'Mohammad Aldiansah', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, '2019-04-11 19:56:35', NULL),
('DzKXiMEPGrk96Id', '2352534', 'awdaw', '2352534', '77e69c137812518e359196bb2f5e9bb9', 'guru', 0, '2019-04-29 15:02:43', NULL),
('gKNq3kwSO8D5rPQ', '28489766', 'pa syaefi', '28489766', '77e69c137812518e359196bb2f5e9bb9', 'guru', 0, '2019-04-29 15:00:49', NULL),
('hZHpyal4e5c8BGI', '876364', 'aldi ansah', '876364', 'bcd724d15cde8c47650fda962968f102', 'siswa', 0, '2019-05-03 14:33:28', NULL),
('MAKqYV01l3h6Of2', '35544276868', 'Bu harneni', '35544276868', '77e69c137812518e359196bb2f5e9bb9', 'guru', 1, '2019-04-12 12:26:50', '2019-04-27 07:41:56'),
('O0Ys6VJWuXAt7pf', '982734872', 'Reynaldi', '982734872', '54fe8d299587667020c4b7ea9b535229', 'guru', 1, '2019-04-15 16:35:23', '2019-05-01 03:16:07'),
('Q52pPqRoUWA17ZK', '24234', 'siswa', '24234', 'bcd724d15cde8c47650fda962968f102', 'siswa', 0, '2019-05-02 00:59:38', NULL),
('uqM8C2fxUtBz0LS', '00812378742', 'Mohammad Aldiansah', '00812378742', 'bcd724d15cde8c47650fda962968f102', 'siswa', 1, '2019-04-13 12:03:52', '2019-04-25 08:04:31'),
('vyEwKdnBcRmtPV9', '018923831', 'miji', '018923831', 'bcd724d15cde8c47650fda962968f102', 'siswa', 1, '2019-04-13 12:13:00', NULL),
('w4g6ZzFS32fBWTs', '98765432', 'pananang', '98765432', '77e69c137812518e359196bb2f5e9bb9', 'guru', 1, '2019-04-29 07:58:55', '2019-04-29 08:04:11'),
('WrwMTd5vEuksb2A', '43928745', 'seto', '43928745', 'bcd724d15cde8c47650fda962968f102', 'siswa', 0, '2019-04-29 08:26:22', NULL),
('ypcJhQAMXTWE9uG', '7654321', 'ALdiansah', '7654321', 'bcd724d15cde8c47650fda962968f102', 'siswa', 0, '2019-04-30 06:32:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `kode_mapel_2` (`kode_mapel`);

--
-- Indeks untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nik_siswa` (`nik_siswa`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indeks untuk tabel `ruang_kelas`
--
ALTER TABLE `ruang_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `siswa_has_kelas`
--
ALTER TABLE `siswa_has_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `ruang_kelas` (`id`),
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_2` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`);

--
-- Ketidakleluasaan untuk tabel `siswa_has_kelas`
--
ALTER TABLE `siswa_has_kelas`
  ADD CONSTRAINT `siswa_has_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `ruang_kelas` (`id`),
  ADD CONSTRAINT `siswa_has_kelas_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `siswa` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
