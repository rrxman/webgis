-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2020 at 06:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_dataponpes` varchar(32) NOT NULL,
  `x1` double NOT NULL,
  `x2` double NOT NULL,
  `x3` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_dataponpes`, `x1`, `x2`, `x3`) VALUES
(1, 'P0001', 0.06, 0.33, 0.38),
(2, 'P0002', 0.91, 1, 1),
(3, 'P0003', 0.11, 0.4, 0.38),
(4, 'P0004', 0.2, 0.45, 0.38),
(5, 'P0007', 0.07, 0.4, 0.69),
(6, 'P0008', 0.08, 0.36, 0.31),
(7, 'P0009', 0.24, 0.17, 0.46),
(8, 'P0010', 0.47, 0.59, 0.38),
(9, 'P0011', 0.2, 0.64, 0.46),
(10, 'P0012', 1, 0.95, 0.46),
(11, 'P0013', 0.07, 0.52, 0.31);

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `id` varchar(5) DEFAULT NULL,
  `angka` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `id_daerah` int(11) NOT NULL,
  `jenis_daerah` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`id_daerah`, `jenis_daerah`) VALUES
(1, 'Kabupaten'),
(2, 'Kota');

-- --------------------------------------------------------

--
-- Table structure for table `dataponpes`
--

CREATE TABLE `dataponpes` (
  `id_ponpes` varchar(11) NOT NULL,
  `nspp` varchar(32) NOT NULL,
  `nama_ponpes` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `id_kecamatan` int(2) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `yayasan` varchar(128) DEFAULT NULL,
  `id_daerah` float NOT NULL,
  `jumlah_santri` float NOT NULL,
  `jumlah_tenaga` float NOT NULL,
  `jumlah_unit` float NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `pengupdate` varchar(128) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataponpes`
--

INSERT INTO `dataponpes` (`id_ponpes`, `nspp`, `nama_ponpes`, `alamat`, `id_kecamatan`, `tgl_berdiri`, `yayasan`, `id_daerah`, `jumlah_santri`, `jumlah_tenaga`, `jumlah_unit`, `lat`, `lon`, `pengupdate`, `tgl_update`) VALUES
('P0001', '510335160001', 'Ainur Rohman', 'Dusun Bangon Rt. 006 Rw.002, Bleberan, Jatirejo ', 6, '1951-03-24', 'Yayasan Pondok Pesantren Al-Hamid Bangon', 1, 71, 19, 5, -7.618203, 112.442069, 'already@gmail.com', 1565362115),
('P0002', '510035160002', 'Rizky Maulana', 'Jl. Kh. Yahdi, Dsn. Mojogeneng, Mojogeneng, Jatirejo', 6, '1940-12-31', '', 1, 1000, 58, 13, -7.581419, 112.442123, 'already@gmail.com', 1565362124);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_ponpes` varchar(11) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `id_cluster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_ponpes`, `c1`, `c2`, `c3`, `id_cluster`) VALUES
(1, 'P0001', 0.0033096918019556, 0.042943201180155, 0.95374710701789, 1),
(2, 'P0002', 0.89409045990509, 0.064173867049732, 0.041735673045179, 2),
(3, 'P0003', 0.00082487990157935, 0.016995382933528, 0.98217973716489, 3),
(4, 'P0004', 0.0086650704849927, 0.38598031606591, 0.60535461344909, 4),
(5, 'P0007', 0.046507043431954, 0.39473384968955, 0.55875910687849, 5),
(6, 'P0008', 0.0054478722798562, 0.075621191080272, 0.91893093663987, 6),
(7, 'P0009', 0.034503189490127, 0.27085531655298, 0.69464149395689, 7),
(8, 'P0010', 0.063892488241543, 0.74952063010713, 0.18658688165133, 8),
(9, 'P0011', 0.01298395690049, 0.87118871241479, 0.11582733068472, 9),
(10, 'P0012', 0.83055828261827, 0.10566136346854, 0.063780353913192, 10),
(11, 'P0013', 0.01701355888057, 0.33458716288688, 0.64839927823255, 11);

-- --------------------------------------------------------

--
-- Table structure for table `jurus`
--

CREATE TABLE `jurus` (
  `id` varchar(5) DEFAULT NULL,
  `jurusan` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurus`
--

INSERT INTO `jurus` (`id`, `jurusan`) VALUES
('1', 'Manajemen'),
('2', 'Akuntansi'),
('3', 'Ilmu Komunikasi'),
('4', 'Ilmu Pemerintah'),
('5', 'Pendidikan Agama Islam'),
('6', 'Pendidikan Bahasa Indonesia'),
('7', 'Pendidikan Bahasa Inggris'),
('8', 'Pendidikan Matematika'),
('9', 'Teknik Mesin'),
('10', 'Teknik Sipil'),
('11', 'Teknik Industri'),
('12', 'Teknik Informatika'),
('13', 'Teknologi Hasil Pertanian');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` varchar(5) DEFAULT NULL,
  `kab` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `kab`) VALUES
('1', 'Mojokerto'),
('2', 'Jombang'),
('3', 'Sidoarjo'),
('4', 'Malang'),
('5', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kec` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kec`) VALUES
(1, 'Bangsal'),
(2, 'Dawarblandong'),
(3, 'Dlanggu'),
(4, 'Gedeg'),
(5, 'Gondang'),
(6, 'Jatirejo'),
(7, 'Jetis'),
(8, 'Kemlagi'),
(9, 'Kutorejo'),
(10, 'Mojoanyar'),
(11, 'Mojosari'),
(12, 'Ngoro'),
(13, 'Pacet'),
(14, 'Pungging'),
(15, 'Puri'),
(16, 'Sooko'),
(17, 'Trawas'),
(18, 'Trowulan');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(32) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `keterangan`) VALUES
(1, 'Jumlah Santri', NULL),
(2, 'Jumlah Tenaga', NULL),
(3, 'Jumlah Unit Pendidikan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `max_cluster`
--

CREATE TABLE `max_cluster` (
  `id_cluster` int(11) NOT NULL,
  `max` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `max_cluster`
--

INSERT INTO `max_cluster` (`id_cluster`, `max`) VALUES
(1, 'C3'),
(2, 'C1'),
(3, 'C3'),
(4, 'C3'),
(5, 'C3'),
(6, 'C3'),
(7, 'C3'),
(8, 'C2'),
(9, 'C2'),
(10, 'C1'),
(11, 'C3');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `kewarganegaraan` varchar(5) DEFAULT NULL,
  `stts_sipil` varchar(20) DEFAULT NULL,
  `kec` varchar(25) NOT NULL,
  `kab/kot` varchar(25) NOT NULL,
  `prov` varchar(25) NOT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `lat` varchar(16) NOT NULL,
  `lon` varchar(16) NOT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `jurusan` varchar(25) DEFAULT NULL,
  `thn_lulus` int(4) DEFAULT NULL,
  `prodi1` varchar(25) DEFAULT NULL,
  `prodi2` varchar(25) DEFAULT NULL,
  `prodi3` varchar(25) DEFAULT NULL,
  `dtail_pres` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nama`, `jk`, `kewarganegaraan`, `stts_sipil`, `kec`, `kab/kot`, `prov`, `alamat`, `lat`, `lon`, `asal_sekolah`, `jurusan`, `thn_lulus`, `prodi1`, `prodi2`, `prodi3`, `dtail_pres`) VALUES
('M0001', 'ABDULLAH KHASIB AGUS JAUHARI', '1', '1', '2', '15', '1', '1', 'DUSUN KENANTEN RT. 003 RW. 002 Kel. KENANTEN', '-7.497093', '112.445048', '1', '1', 2014, '12', '10', '7', '-'),
('M0002', 'DANY SUWARNO', '1', '1', '2', '16', '1', '1', 'Dsn. Kedawung Ds. Gemekan Kec. Sooko', '-7.526350', '112.405222', '2', '2', 2016, '12', '7', '2', '-'),
('M0003', 'SYAM ABDUL RAHMAN A.S', '1', '1', '2', '16', '1', '1', 'jl.balongrawe baru ', '-7.467554', '112.451936', '3', '4', 2017, '7', '4', '10', '-'),
('M0004', 'YOGIN YUANITA', '2', '1', '2', '16', '1', '1', 'Griya permata meri D-1 / 08', '-7.482691', '112.448935', '4', '1', 2017, '8', '11', '1', '-');

-- --------------------------------------------------------

--
-- Table structure for table `ponpes_unit`
--

CREATE TABLE `ponpes_unit` (
  `id` int(11) NOT NULL,
  `id_ponpes` varchar(11) NOT NULL,
  `nama_unit` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ponpes_unit`
--

INSERT INTO `ponpes_unit` (`id`, `id_ponpes`, `nama_unit`) VALUES
(32, 'P0001', 'TK/PAUD'),
(33, 'P0001', 'Madrasah Tsanawiyah'),
(34, 'P0001', 'Madrasah Aliyah'),
(35, 'P0001', 'MIT'),
(36, 'P0001', 'Pondok Pesantren'),
(37, 'P0002', 'Madrasah Ibtidaiyah'),
(38, 'P0002', 'Madrasah Tsanawiyah'),
(39, 'P0002', 'Madrasah Aliyah'),
(40, 'P0002', 'Madrasah Diniyah'),
(41, 'P0002', 'RA'),
(42, 'P0002', 'ULA'),
(43, 'P0002', 'Wustha'),
(44, 'P0002', 'Aliyah'),
(45, 'P0002', 'Kitab Kuning'),
(46, 'P0002', 'Tahfidzul Quran'),
(47, 'P0002', 'Tilawatil Quran'),
(48, 'P0002', 'Khotil Quran'),
(49, 'P0002', 'Albaniari'),
(50, 'P0003', 'Madrasah Diniyah'),
(51, 'P0003', 'Pondok Pesantren'),
(52, 'P0003', 'Madrasah Aliyah Hidayatul Falah'),
(53, 'P0003', 'Majelis Ta\'lim Ismul Haq'),
(54, 'P0004', 'Madrasah Ibtidaiyah'),
(55, 'P0004', 'Madrasah Tsanawiyah'),
(56, 'P0004', 'Madrasah Aliyah'),
(57, 'P0004', 'Madrasah Diniyah'),
(58, 'P0004', 'Tahfid'),
(59, 'P0005', 'TK/PAUD'),
(60, 'P0005', 'Madrasah Ibtidaiyah'),
(61, 'P0005', 'Madrasah Tsanawiyah'),
(62, 'P0005', 'Madrasah Diniyah'),
(63, 'P0005', 'Tahfidzul Quran'),
(64, 'P0006', 'Madrasah Tsanawiyah'),
(65, 'P0006', 'Madrasah Aliyah'),
(66, 'P0007', 'Madrasah Ibtidaiyah'),
(67, 'P0007', 'Madrasah Tsanawiyah'),
(68, 'P0007', 'Madrasah Aliyah'),
(69, 'P0007', 'RA'),
(70, 'P0007', 'PT'),
(71, 'P0007', 'Kursus'),
(72, 'P0007', 'PKM'),
(73, 'P0007', 'Pondok Pesantren'),
(74, 'P0007', 'TPQ'),
(75, 'P0008', 'TK/PAUD'),
(76, 'P0008', 'Madrasah Diniyah'),
(77, 'P0008', 'TPQ'),
(78, 'P0008', 'Tahfidzul Quran'),
(79, 'P0009', 'Madrasah Diniyah'),
(80, 'P0009', 'SMK Al-Istiqomah II'),
(81, 'P0009', 'MTs Al-Istiqomah II'),
(82, 'P0009', 'Jurusan'),
(83, 'P0009', 'Pengajian Kitab Kuning'),
(84, 'P0009', 'TPQ Al-Istiqomah'),
(85, 'P0010', 'Madrasah Diniyah'),
(86, 'P0010', 'Jamiyyah Muchadloroh'),
(87, 'P0010', 'Organisasi Alumni'),
(88, 'P0010', 'Majelis Ta\'lim'),
(89, 'P0010', 'Tahfidzul Quran'),
(90, 'P0011', 'Madrasah Diniyah'),
(91, 'P0011', 'Mts \"Unggulan\"'),
(92, 'P0011', 'MA \"Unggulan\"'),
(93, 'P0011', 'Institut KH Abdul Chalim Mojokerto'),
(94, 'P0003', 'TPQ/LPQ'),
(95, 'P0011', 'PAUD/TK'),
(96, 'P0011', 'Madrasah Ibtidaiyah'),
(97, 'P0011', 'SMP IT'),
(98, 'P0011', 'Madrasah Aliyah'),
(99, 'P0011', 'SMK'),
(100, 'P0011', 'Pondok Pesantren'),
(101, 'P0012', 'PAUD/TK'),
(102, 'P0012', 'Madrasah Ibtidaiyah'),
(103, 'P0012', 'SMP IT'),
(104, 'P0012', 'Madrasah Aliyah'),
(105, 'P0012', 'SMK'),
(106, 'P0012', 'Pondok Pesantren'),
(107, 'P0013', 'TPQ/LPQ'),
(108, 'P0013', 'Diniyah'),
(109, 'P0013', 'PP. Umum'),
(110, 'P0013', 'PP. Wajar DIKDAS'),
(111, 'P0014', 'Diniyah'),
(112, 'P0014', 'PP. Umum'),
(113, 'P0014', 'PP. Wajar DIKDAS');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` varchar(5) DEFAULT NULL,
  `prodi` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `prodi`) VALUES
('1', 'Manajemen'),
('2', 'Akuntansi'),
('3', 'Ilmu Komunikasi'),
('4', 'Ilmu Pemerintah'),
('5', 'Pendidikan Agama Islam'),
('6', 'Pendidikan Bahasa Indonesia'),
('7', 'Pendidikan Bahasa Inggris'),
('8', 'Pendidikan Matematika'),
('9', 'Teknik Mesin'),
('10', 'Teknik Sipil'),
('11', 'Teknik Industri'),
('12', 'Teknik Informatika'),
('13', 'Teknologi Hasil Pertanian');

-- --------------------------------------------------------

--
-- Table structure for table `program_pendidikan`
--

CREATE TABLE `program_pendidikan` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_pendidikan`
--

INSERT INTO `program_pendidikan` (`id_program`, `nama_program`) VALUES
(1, 'Salafiyah'),
(2, 'Tahfiz'),
(3, 'Modern'),
(4, 'Campuran');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` varchar(5) NOT NULL,
  `prov` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `prov`) VALUES
('1', 'Jawa Timur'),
('2', 'Jawa Tengah'),
('3', 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `sklh`
--

CREATE TABLE `sklh` (
  `id` varchar(15) NOT NULL,
  `nama_sklh` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `lat` varchar(16) NOT NULL,
  `lon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sklh`
--

INSERT INTO `sklh` (`id`, `nama_sklh`, `alamat`, `lat`, `lon`) VALUES
('1', 'SMAN 1 KOTA MOJOKERTO', 'JL IRIAN JAYA NO 01', '-7.484346', '112.43511'),
('2', 'MA Bidayatul Hidayah', 'Mojogeneng, Jatirejo, Mojokerto', '-7.582033', '112.420493'),
('3', 'smk negeri 1', 'jl.kedungsari', '-7.469124', '112.456552'),
('4', 'SMA Tamansiswa', 'Jalan Taman siswa, No.30', '-7.465485', '112.438828');

-- --------------------------------------------------------

--
-- Table structure for table `tb_access`
--

CREATE TABLE `tb_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_access`
--

INSERT INTO `tb_access` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(19, 1, 3),
(20, 1, 4),
(22, 2, 3),
(23, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nspp` varchar(32) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `almt` text NOT NULL,
  `tgl_lhr` date NOT NULL,
  `telp` int(16) NOT NULL,
  `is_active` int(1) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `gambar`, `password`, `role_id`, `nspp`, `nip`, `almt`, `tgl_lhr`, `telp`, `is_active`, `status`, `tgl_buat`) VALUES
(1, 'RXXMAN', 'already@gmail.com', 'default1.jpg', '$2y$10$XfT.NN86V2fVtX9iZJm3ceqoO5tdGGHQDgzUj9fWr2zEj19iw53rK', 1, '', '', '', '2019-04-05', 0, 1, 1, 1557215287),
(2, 'Gilang Permadi', 'gilangpermadi66@gmail.com', 'default.jpg', '$2y$10$LC7TrlHjIHCQvMUDgLzqw.wXU12f9qtuKsYuys8m.BGnCOz2ykIWe', 2, '510035160003', '0', 'Pacet', '2001-11-25', 815492482, 0, 0, 1566432670),
(3, 'Ainur Rohman', 'rohman.rrxman@gmail.com', 'default.jpg', '$2y$10$OAAOQuS71hkdEC44gKmJb.C5WWt/H5u0nhW3VkUNCZYgb7poM1hRG', 2, '928342984', '1234', 'Jombang', '2020-06-13', 8574544, 1, 1, 1592032119);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usermenu`
--

CREATE TABLE `tb_usermenu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `alias` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_usermenu`
--

INSERT INTO `tb_usermenu` (`id`, `menu`, `alias`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Lembaga', 'Profile'),
(3, 'Pengguna', 'User'),
(4, 'SIG', 'Map'),
(6, 'Menu', 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usersubmenu`
--

CREATE TABLE `tb_usersubmenu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_usersubmenu`
--

INSERT INTO `tb_usersubmenu` (`id`, `id_menu`, `judul`, `url`, `icon`, `aktif`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(3, 3, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 6, 'Kelola Menu', 'menu', 'fas fa-fw fa-folder-plus', 1),
(5, 6, 'Kelola Sub-Menu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 4, 'Peta', 'gis', 'fas fa-fw fa-globe', 1),
(9, 3, 'Ganti Kata Sandi', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Data Mahasiswa', 'admin/dataMahasiswa', 'fas fa-fw fa-database', 1),
(11, 2, 'Profil Lembaga', 'user/profile_company', 'fas fa-fw fa-building', 1),
(12, 2, 'Edit Pondok Pesantren', 'user/change_company', 'fas fa-fw fa-edit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_usertoken`
--

CREATE TABLE `tb_usertoken` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_usertoken`
--

INSERT INTO `tb_usertoken` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'gilangpermadi66@gmail.com', 'JPdZzQA2mks3fFqY3Ay5N7rxg3+z7x8wqGSN52ssc/g=', 1566432670),
(2, 'rohman.rrxman@gmail.com', 'O+PWszvvc1NlKBZKv8Kn0wsAujhjj0tPMX+dgZigd7U=', 1592030879),
(3, 'rohman.rrxman@gmail.com', 'L9BhqA99OrFl+6IqfuM90eOSRG1o4hB0E/K1frCOiy8=', 1592031621),
(4, 'rohman.rrxman@gmail.com', 'ndt+4B4UOiq8YYd+JifTOWOra/0RdCrMf7H8fIXsO/8=', 1592032119);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indexes for table `dataponpes`
--
ALTER TABLE `dataponpes`
  ADD PRIMARY KEY (`id_ponpes`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_keterangan` (`id_daerah`),
  ADD KEY `id_ponpes` (`id_ponpes`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `max_cluster`
--
ALTER TABLE `max_cluster`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ponpes_unit`
--
ALTER TABLE `ponpes_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ponpes` (`id_ponpes`);

--
-- Indexes for table `program_pendidikan`
--
ALTER TABLE `program_pendidikan`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sklh`
--
ALTER TABLE `sklh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_access`
--
ALTER TABLE `tb_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tb_usermenu`
--
ALTER TABLE `tb_usermenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usersubmenu`
--
ALTER TABLE `tb_usersubmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usertoken`
--
ALTER TABLE `tb_usertoken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `max_cluster`
--
ALTER TABLE `max_cluster`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ponpes_unit`
--
ALTER TABLE `ponpes_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `program_pendidikan`
--
ALTER TABLE `program_pendidikan`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_access`
--
ALTER TABLE `tb_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_usermenu`
--
ALTER TABLE `tb_usermenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_usersubmenu`
--
ALTER TABLE `tb_usersubmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_usertoken`
--
ALTER TABLE `tb_usertoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_access`
--
ALTER TABLE `tb_access`
  ADD CONSTRAINT `tb_access_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`),
  ADD CONSTRAINT `tb_access_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `tb_usermenu` (`id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
