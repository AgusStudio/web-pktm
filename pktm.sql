-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Nov 2017 pada 16.28
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pktm`
--
CREATE DATABASE IF NOT EXISTS `pktm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pktm`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--
-- Pembuatan: 20 Nov 2017 pada 06.44
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nip` varchar(13) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `admin`:
--

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nip`, `username`, `password`, `nama_admin`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `foto`) VALUES
(1, '1765432763', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'BPS', 'Jakarta', '1992-01-12', 'L', 'admin_1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_keluarga`
--
-- Pembuatan: 20 Nov 2017 pada 06.44
--

DROP TABLE IF EXISTS `anggota_keluarga`;
CREATE TABLE `anggota_keluarga` (
  `id_anggota` int(11) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `nama_anggota` varchar(25) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` text NOT NULL,
  `pendidikan` text NOT NULL,
  `pekerjaan` text NOT NULL,
  `status_nikah` text NOT NULL,
  `hubungan` text NOT NULL,
  `kewarganegaraan` text NOT NULL,
  `no_paspor` varchar(20) NOT NULL,
  `no_kitas` varchar(20) NOT NULL,
  `nama_ayah` varchar(25) NOT NULL,
  `nama_ibu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `anggota_keluarga`:
--

--
-- Truncate table before insert `anggota_keluarga`
--

TRUNCATE TABLE `anggota_keluarga`;
--
-- Dumping data untuk tabel `anggota_keluarga`
--

INSERT INTO `anggota_keluarga` (`id_anggota`, `id_keluarga`, `nama_anggota`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `pendidikan`, `pekerjaan`, `status_nikah`, `hubungan`, `kewarganegaraan`, `no_paspor`, `no_kitas`, `nama_ayah`, `nama_ibu`) VALUES
(1, 1, 'Abdul Munawar', '333109734872008', 'L', 'Jakarta', '1992-01-18', 'Islam', 'SMA', 'Wiraswasta', 'Belum Nikah', 'Anak', 'WNI', '', '', 'Maskuri', 'Khalimatussadiyah'),
(2, 2, 'Robert', '333109734872009', 'L', 'Jakarta', '1992-01-18', 'Islam', 'SMA', 'Wiraswasta', 'Belum Nikah', 'Kepala Keluarga', 'WNI', '', '', 'Rokim', 'Surti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot_variabel`
--
-- Pembuatan: 20 Nov 2017 pada 12.44
--

DROP TABLE IF EXISTS `bobot_variabel`;
CREATE TABLE `bobot_variabel` (
  `id_bobot` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `bobot_variabel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `bobot_variabel`:
--

--
-- Truncate table before insert `bobot_variabel`
--

TRUNCATE TABLE `bobot_variabel`;
--
-- Dumping data untuk tabel `bobot_variabel`
--

INSERT INTO `bobot_variabel` (`id_bobot`, `id_variabel`, `id_desa`, `bobot_variabel`) VALUES
(1, 1, 1, 10),
(2, 2, 1, 10),
(3, 3, 1, 10),
(4, 4, 1, 10),
(5, 5, 1, 6),
(6, 6, 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--
-- Pembuatan: 02 Nov 2017 pada 09.09
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `ci_sessions`:
--

--
-- Truncate table before insert `ci_sessions`
--

TRUNCATE TABLE `ci_sessions`;
--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('f55385390bcc25c024c99b8efa9b82166ee883ef', '::1', 1511178725, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313137383637303b6c6f675f72747c733a363a22313233343536223b77696c617961687c733a313a2231223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('6beb2f29df2e8c25c82c55bb2c5c93663d90b864', '::1', 1511179640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313137393531313b6c6f675f72747c733a363a22313233343536223b77696c617961687c733a313a2231223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('0b4768e657be794e02272685ac798ed27bd27d20', '::1', 1511180587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138303538363b6c6f675f72747c733a363a22313233343536223b77696c617961687c733a313a2231223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('6a40172c4600decc54e900e09fd9511a399fbba7', '::1', 1511181551, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138313535313b6c6f675f72747c733a363a22313233343536223b77696c617961687c733a313a2231223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('d465b578eece28b27910ddeaf33db1f4f43e5726', '::1', 1511182233, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138323036383b6c6f675f72747c733a363a22313233343536223b77696c617961687c733a313a2231223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('f680feaa882017e3b7322413c21ccbb60723cf43', '::1', 1511185491, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138353139363b6c6f675f72747c733a363a22313233343536223b77696c617961687c733a313a2231223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('6c7226372ec035a63acaf6ceb15e70dc28c5abc6', '::1', 1511185795, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138353530393b6c6f675f72747c733a363a22313233343536223b77696c617961687c733a313a2231223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('7904f334b2f5b2d4be389f4e782aa3da83df2c38', '::1', 1511185860, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138353836303b6c6f675f72747c733a363a22313233343536223b77696c617961687c733a313a2231223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('6cf25141af1697de64fe96b465ad3e87fdd5396b', '::1', 1511185893, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138353836353b6c6f675f72747c733a31313a223132333435363738393130223b77696c617961687c733a313a2232223b6c6f676765645f696e7c623a313b),
('70d4bbd5d8540afd302cd01bb35554135f47ecc6', '::1', 1511186558, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138363338303b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('11c42f3d552ae33c5a06c18b094a716b1be7edad', '::1', 1511187805, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138373536313b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('67fe85613b8ea4463787d3f65f492b47f157528b', '::1', 1511187871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138373836373b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('222dc9c73eabc5cb98ed76c6f1948efa558c9686', '::1', 1511188423, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138383432333b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('73c8775408c008fa9536bdc6238f5297afd67f50', '::1', 1511189094, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138383934303b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('76960aa7d45e1c2ce4375c3fb19248e1e872d982', '::1', 1511189527, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138393532373b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('117f47206562cbb2555af568352dd8607ba30956', '::1', 1511190064, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313138393933323b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('fc6fc67711bf451e61330f94f6d73340d7379c33', '::1', 1511190538, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313139303234373b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('acb7202f9d122cb649db76ba26b6a6675fbca64d', '::1', 1511190758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313139303632373b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('fc660016763df245feedcf7fd856a7be33584127', '::1', 1511191045, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313139303935343b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('b6842367223f2fa00ba85d262d7fdf894c4c51f4', '::1', 1511191281, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313139313237363b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b),
('1067839c3bbeca34157d4e14077dc08e70e9a516', '::1', 1511191632, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531313139313631393b6c6f675f72747c733a31313a223132333435363738393135223b77696c617961687c733a313a2237223b6c6f676765645f696e7c623a313b6c6f675f61646d696e7c733a353a2261646d696e223b6c6f676765645f61646d696e7c623a313b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--
-- Pembuatan: 02 Nov 2017 pada 09.09
--

DROP TABLE IF EXISTS `desa`;
CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_desa` text NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `nip_kades` varchar(13) NOT NULL,
  `kepala_desa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `desa`:
--

--
-- Truncate table before insert `desa`
--

TRUNCATE TABLE `desa`;
--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `id_kecamatan`, `nama_desa`, `kode_pos`, `nip_kades`, `kepala_desa`) VALUES
(1, 1, 'Bukit Duri', '12840', '', 'Subagyo,S.E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--
-- Pembuatan: 02 Nov 2017 pada 09.09
--

DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE `hak_akses` (
  `id_admin` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `hak_akses`:
--

--
-- Truncate table before insert `hak_akses`
--

TRUNCATE TABLE `hak_akses`;
--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_admin`, `id_desa`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_pendataan`
--
-- Pembuatan: 20 Nov 2017 pada 06.44
--

DROP TABLE IF EXISTS `hasil_pendataan`;
CREATE TABLE `hasil_pendataan` (
  `id_hasil` int(11) NOT NULL,
  `id_pendataan` int(11) NOT NULL,
  `id_variabel` int(11) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `status` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `hasil_pendataan`:
--

--
-- Truncate table before insert `hasil_pendataan`
--

TRUNCATE TABLE `hasil_pendataan`;
--
-- Dumping data untuk tabel `hasil_pendataan`
--

INSERT INTO `hasil_pendataan` (`id_hasil`, `id_pendataan`, `id_variabel`, `id_keluarga`, `nilai`, `status`) VALUES
(1, 1, 1, 1, 10, 1),
(2, 1, 2, 1, 10, 1),
(3, 1, 3, 1, 10, 1),
(4, 1, 4, 1, 10, 1),
(13, 2, 1, 2, 10, 1),
(14, 2, 2, 2, 10, 1),
(15, 2, 3, 2, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_variabel`
--
-- Pembuatan: 20 Nov 2017 pada 06.44
--

DROP TABLE IF EXISTS `kategori_variabel`;
CREATE TABLE `kategori_variabel` (
  `id_kat_variabel` int(11) NOT NULL,
  `kategori_var` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `kategori_variabel`:
--

--
-- Truncate table before insert `kategori_variabel`
--

TRUNCATE TABLE `kategori_variabel`;
--
-- Dumping data untuk tabel `kategori_variabel`
--

INSERT INTO `kategori_variabel` (`id_kat_variabel`, `kategori_var`) VALUES
(1, 'Luas Bangunan'),
(2, 'Luas Lantai'),
(3, 'Jenis Dinding'),
(4, 'Fasilitas Buang Air Besar'),
(5, 'Sumber Air Minum'),
(6, 'Sumber Penerangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--
-- Pembuatan: 02 Nov 2017 pada 09.09
--

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kecamatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `kecamatan`:
--

--
-- Truncate table before insert `kecamatan`
--

TRUNCATE TABLE `kecamatan`;
--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kota`, `kecamatan`) VALUES
(1, 1, 'Tebet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--
-- Pembuatan: 13 Nov 2017 pada 06.47
--

DROP TABLE IF EXISTS `keluarga`;
CREATE TABLE `keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `no_kk` varchar(17) NOT NULL,
  `kepala_keluarga` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `id_rt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `keluarga`:
--

--
-- Truncate table before insert `keluarga`
--

TRUNCATE TABLE `keluarga`;
--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`id_keluarga`, `no_kk`, `kepala_keluarga`, `alamat`, `id_rt`) VALUES
(1, '3329142510110023', 'Maskuri ', 'JL. Kh. Abdullah', 1),
(2, '3329142510110024', 'Robert', 'JL. Kh. Abdullah', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketua_rt`
--
-- Pembuatan: 13 Nov 2017 pada 06.47
--

DROP TABLE IF EXISTS `ketua_rt`;
CREATE TABLE `ketua_rt` (
  `id_ketua_rt` int(11) NOT NULL,
  `id_rt` int(11) NOT NULL,
  `nip` varchar(13) NOT NULL,
  `ketua_rt` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `tempat_lahir_rt` text NOT NULL,
  `tgl_lahir_rt` date NOT NULL,
  `jenis_kelamin_rt` varchar(2) NOT NULL,
  `agama_rt` text NOT NULL,
  `tgl_menjabat` date NOT NULL,
  `tgl_lepas_jabatan` date NOT NULL,
  `foto` text NOT NULL,
  `status_tugas` smallint(1) NOT NULL,
  `status_aktifasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `ketua_rt`:
--

--
-- Truncate table before insert `ketua_rt`
--

TRUNCATE TABLE `ketua_rt`;
--
-- Dumping data untuk tabel `ketua_rt`
--

INSERT INTO `ketua_rt` (`id_ketua_rt`, `id_rt`, `nip`, `ketua_rt`, `username`, `password`, `tempat_lahir_rt`, `tgl_lahir_rt`, `jenis_kelamin_rt`, `agama_rt`, `tgl_menjabat`, `tgl_lepas_jabatan`, `foto`, `status_tugas`, `status_aktifasi`) VALUES
(1, 1, '123456', 'Abdul Rajiman', '123456', '202cb962ac59075b964b07152d234b70', 'Jakarta', '1968-01-03', 'L', 'Islam', '2017-01-01', '0000-00-00', 'userdefault.png', 1, 1),
(2, 2, '12345678910', 'Rosyid', '12345678910', '432f45b44c432414d2f97df0e5743818', 'Jakarta', '1978-11-07', 'L', 'Islam', '2016-11-07', '0000-00-00', '', 1, 1),
(3, 3, '12345678911', 'Akbar', '12345678911', '1e5ce73f4fc4c3b764fb66811f093c87', 'Jakarta', '1975-03-09', 'L', 'Islam', '2016-10-01', '0000-00-00', '', 1, 1),
(4, 4, '12345678912', 'S. Suparman', '12345678912', 'faf5341a39919352a4f9bde4d6de5396', 'Jakarta', '1980-08-10', 'L', 'Islam', '2016-10-15', '0000-00-00', '', 1, 1),
(5, 5, '12345678913', 'M. Roni', '12345678913', 'ffd146c0038ec9921837d4f6c4319e39', 'Jakarta', '1969-05-19', 'L', 'Islam', '2016-10-15', '0000-00-00', '', 1, 1),
(6, 6, '12345678914', 'Suhermanto', '12345678914', 'a04c22f826f52c544e70c9d474a93d62', 'Jakarta', '1980-05-02', 'L', 'Islam', '2016-11-15', '0000-00-00', '', 1, 1),
(7, 7, '12345678915', 'M. Andre', '12345678915', '68ea923a6447135005eef66e8b347d52', 'Jakarta', '1969-05-01', 'L', 'Islam', '2016-11-15', '0000-00-00', '', 1, 1),
(8, 8, '12345678916', 'Jumardi', '12345678916', 'e038112fa199d5b2f5915ecf6307ea75', 'Jakarta', '1980-12-02', 'L', 'Islam', '2016-10-05', '0000-00-00', '', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--
-- Pembuatan: 02 Nov 2017 pada 09.09
--

DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `kota` text NOT NULL,
  `provinsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `kota`:
--

--
-- Truncate table before insert `kota`
--

TRUNCATE TABLE `kota`;
--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`, `provinsi`) VALUES
(1, 'Jakarta Selatan', 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_indeks`
--
-- Pembuatan: 13 Nov 2017 pada 06.47
--

DROP TABLE IF EXISTS `master_indeks`;
CREATE TABLE `master_indeks` (
  `id_master` int(11) NOT NULL,
  `nilai_min_indeks` float NOT NULL,
  `nilai_maks_indeks` float NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `master_indeks`:
--

--
-- Truncate table before insert `master_indeks`
--

TRUNCATE TABLE `master_indeks`;
--
-- Dumping data untuk tabel `master_indeks`
--

INSERT INTO `master_indeks` (`id_master`, `nilai_min_indeks`, `nilai_maks_indeks`, `keterangan`) VALUES
(1, 8, 10, 'Keluarga Sangat Miskin'),
(2, 6, 7.9, 'Keluarga Miskin'),
(3, 4, 5.9, 'Keluarga Mendekati Miskin'),
(4, 0, 3.9, 'Keluarga Tidak Miskin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendataan`
--
-- Pembuatan: 13 Nov 2017 pada 06.47
--

DROP TABLE IF EXISTS `pendataan`;
CREATE TABLE `pendataan` (
  `id_pendataan` int(11) NOT NULL,
  `id_rt` int(11) NOT NULL,
  `tgl_pendataan` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `total_warga` int(11) NOT NULL,
  `warga_terdata` int(11) NOT NULL,
  `warga_tidak_terdata` int(11) NOT NULL,
  `warga_tidak_terdaftar` int(11) NOT NULL,
  `status_aktifasi` smallint(2) NOT NULL,
  `status_pendataan` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `pendataan`:
--

--
-- Truncate table before insert `pendataan`
--

TRUNCATE TABLE `pendataan`;
--
-- Dumping data untuk tabel `pendataan`
--

INSERT INTO `pendataan` (`id_pendataan`, `id_rt`, `tgl_pendataan`, `tgl_selesai`, `total_warga`, `warga_terdata`, `warga_tidak_terdata`, `warga_tidak_terdaftar`, `status_aktifasi`, `status_pendataan`) VALUES
(1, 1, '2017-11-01', '2017-11-03', 1, 1, 0, 0, 1, 1),
(2, 1, '2017-12-01', '2017-12-09', 1, 1, 0, 0, 1, 1),
(3, 7, '2017-12-31', '0000-00-00', 400, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rt`
--
-- Pembuatan: 18 Nov 2017 pada 03.56
--

DROP TABLE IF EXISTS `rt`;
CREATE TABLE `rt` (
  `id_rt` int(11) NOT NULL,
  `rt` int(4) NOT NULL,
  `rw` int(4) NOT NULL,
  `id_desa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `rt`:
--

--
-- Truncate table before insert `rt`
--

TRUNCATE TABLE `rt`;
--
-- Dumping data untuk tabel `rt`
--

INSERT INTO `rt` (`id_rt`, `rt`, `rw`, `id_desa`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 1, 1),
(58, 9, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `variabel`
--
-- Pembuatan: 13 Nov 2017 pada 06.47
--

DROP TABLE IF EXISTS `variabel`;
CREATE TABLE `variabel` (
  `id_variabel` int(11) NOT NULL,
  `id_kat_variabel` int(11) NOT NULL,
  `type_variabel` varchar(10) NOT NULL,
  `isi_variabel` text NOT NULL,
  `status_variabel` text NOT NULL,
  `tgl_on` date NOT NULL,
  `tgl_off` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELASI UNTUK TABEL `variabel`:
--

--
-- Truncate table before insert `variabel`
--

TRUNCATE TABLE `variabel`;
--
-- Dumping data untuk tabel `variabel`
--

INSERT INTO `variabel` (`id_variabel`, `id_kat_variabel`, `type_variabel`, `isi_variabel`, `status_variabel`, `tgl_on`, `tgl_off`) VALUES
(1, 1, 'Nasional', 'Luas Lantai bangunan tempat tinggalnya kurang dari 8m2 per orang.', 'Aktif', '0000-00-00', '0000-00-00'),
(2, 2, 'Nasional', 'Luas bangunn tempat tinggalnya terbuat dari tanah/bambu/kayu murahan', 'Aktif', '0000-00-00', '0000-00-00'),
(3, 3, 'Nasional', 'Dinding bangunan tempat tinggalnya terbuat dari Bambu/Rumbia/Kayu berkualitas rendah atau tembok tanpa plester', 'Aktif', '0000-00-00', '0000-00-00'),
(4, 4, 'Nasional', 'Tidak memiliki fasilitas buang air besar/bersama-sama rumah tangga lain menggunakan satu jamban', 'Aktif', '0000-00-00', '0000-00-00'),
(5, 1, 'Lokal', 'Mempunyai TV', 'Aktif', '0000-00-00', '0000-00-00'),
(6, 2, 'Lokal', 'Mempunyai sapi', 'Aktif', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_keluarga`
--
DROP VIEW IF EXISTS `view_keluarga`;
CREATE TABLE `view_keluarga` (
`id_keluarga` int(11)
,`no_kk` varchar(17)
,`kepala_keluarga` varchar(25)
,`alamat` text
,`id_rt` int(11)
,`id_pendataan` int(11)
,`status_pendataan` smallint(2)
,`indeks` decimal(32,0)
,`ratio_indeks` decimal(36,4)
,`status_kemiskinan` text
,`id_master` bigint(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pendataan`
--
DROP VIEW IF EXISTS `view_pendataan`;
CREATE TABLE `view_pendataan` (
`id_rt` int(11)
,`rt` int(4)
,`rw` int(4)
,`nip` varchar(13)
,`ketua_rt` varchar(25)
,`id_desa` int(11)
,`nama_desa` text
,`kode_pos` varchar(10)
,`nip_kades` varchar(13)
,`kepala_desa` varchar(25)
,`kecamatan` text
,`kota` text
,`provinsi` text
,`id_pendataan` int(11)
,`tgl_pendataan` date
,`tgl_selesai` date
,`total_warga` int(11)
,`warga_terdata` int(11)
,`warga_tidak_terdata` int(11)
,`warga_tidak_terdaftar` int(11)
,`status_pendataan` smallint(2)
,`status_aktifasi` smallint(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_variabel`
--
DROP VIEW IF EXISTS `view_variabel`;
CREATE TABLE `view_variabel` (
`kategori_var` text
,`id_variabel` int(11)
,`id_kat_variabel` int(11)
,`type_variabel` varchar(10)
,`isi_variabel` text
,`status_variabel` text
,`tgl_on` date
,`tgl_off` date
,`bobot_variabel` int(11)
,`id_desa` int(11)
,`nama_desa` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_wilayah`
--
DROP VIEW IF EXISTS `view_wilayah`;
CREATE TABLE `view_wilayah` (
`id_rt` int(11)
,`rt` int(4)
,`rw` int(4)
,`nip` varchar(13)
,`id_ketua_rt` int(11)
,`ketua_rt` varchar(25)
,`status_tugas` smallint(1)
,`status_aktifasi` int(1)
,`id_desa` int(11)
,`nama_desa` text
,`kode_pos` varchar(10)
,`nip_kades` varchar(13)
,`kepala_desa` varchar(25)
,`kecamatan` text
,`kota` text
,`provinsi` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_keluarga`
--
DROP TABLE IF EXISTS `view_keluarga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_keluarga`  AS  select distinct `m1`.`id_keluarga` AS `id_keluarga`,`m1`.`no_kk` AS `no_kk`,`m1`.`kepala_keluarga` AS `kepala_keluarga`,`m1`.`alamat` AS `alamat`,`m1`.`id_rt` AS `id_rt`,`m3`.`id_pendataan` AS `id_pendataan`,`m3`.`status_pendataan` AS `status_pendataan`,sum(`m2`.`nilai`) AS `indeks`,(sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) AS `ratio_indeks`,(case when (((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) >= (select `master_indeks`.`nilai_min_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 1))) and ((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) <= (select `master_indeks`.`nilai_maks_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 1)))) then (select `master_indeks`.`keterangan` from `master_indeks` where (`master_indeks`.`id_master` = 1)) when (((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) >= (select `master_indeks`.`nilai_min_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 2))) and ((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) <= (select `master_indeks`.`nilai_maks_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 2)))) then (select `master_indeks`.`keterangan` from `master_indeks` where (`master_indeks`.`id_master` = 2)) when (((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) >= (select `master_indeks`.`nilai_min_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 3))) and ((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) <= (select `master_indeks`.`nilai_maks_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 3)))) then (select `master_indeks`.`keterangan` from `master_indeks` where (`master_indeks`.`id_master` = 3)) when (((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) >= (select `master_indeks`.`nilai_min_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 4))) and ((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) <= (select `master_indeks`.`nilai_maks_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 4)))) then (select `master_indeks`.`keterangan` from `master_indeks` where (`master_indeks`.`id_master` = 4)) end) AS `status_kemiskinan`,(case when (((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) >= (select `master_indeks`.`nilai_min_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 1))) and ((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) <= (select `master_indeks`.`nilai_maks_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 1)))) then (select `master_indeks`.`id_master` from `master_indeks` where (`master_indeks`.`id_master` = 1)) when (((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) >= (select `master_indeks`.`nilai_min_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 2))) and ((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) <= (select `master_indeks`.`nilai_maks_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 2)))) then (select `master_indeks`.`id_master` from `master_indeks` where (`master_indeks`.`id_master` = 2)) when (((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) >= (select `master_indeks`.`nilai_min_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 3))) and ((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) <= (select `master_indeks`.`nilai_maks_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 3)))) then (select `master_indeks`.`id_master` from `master_indeks` where (`master_indeks`.`id_master` = 3)) when (((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) >= (select `master_indeks`.`nilai_min_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 4))) and ((sum(`m2`.`nilai`) / (select count(`variabel`.`id_variabel`) from `variabel`)) <= (select `master_indeks`.`nilai_maks_indeks` from `master_indeks` where (`master_indeks`.`id_master` = 4)))) then (select `master_indeks`.`id_master` from `master_indeks` where (`master_indeks`.`id_master` = 4)) end) AS `id_master` from ((`keluarga` `m1` join `hasil_pendataan` `m2` on((`m2`.`id_keluarga` = `m1`.`id_keluarga`))) join `view_pendataan` `m3` on((`m3`.`id_pendataan` = `m2`.`id_pendataan`))) group by `m1`.`id_keluarga` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pendataan`
--
DROP TABLE IF EXISTS `view_pendataan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pendataan`  AS  select `m1`.`id_rt` AS `id_rt`,`m1`.`rt` AS `rt`,`m1`.`rw` AS `rw`,`m1`.`nip` AS `nip`,`m1`.`ketua_rt` AS `ketua_rt`,`m1`.`id_desa` AS `id_desa`,`m1`.`nama_desa` AS `nama_desa`,`m1`.`kode_pos` AS `kode_pos`,`m1`.`nip_kades` AS `nip_kades`,`m1`.`kepala_desa` AS `kepala_desa`,`m1`.`kecamatan` AS `kecamatan`,`m1`.`kota` AS `kota`,`m1`.`provinsi` AS `provinsi`,`m2`.`id_pendataan` AS `id_pendataan`,`m2`.`tgl_pendataan` AS `tgl_pendataan`,`m2`.`tgl_selesai` AS `tgl_selesai`,`m2`.`total_warga` AS `total_warga`,`m2`.`warga_terdata` AS `warga_terdata`,`m2`.`warga_tidak_terdata` AS `warga_tidak_terdata`,`m2`.`warga_tidak_terdaftar` AS `warga_tidak_terdaftar`,`m2`.`status_pendataan` AS `status_pendataan`,`m2`.`status_aktifasi` AS `status_aktifasi` from (`view_wilayah` `m1` join `pendataan` `m2` on((`m2`.`id_rt` = `m1`.`id_rt`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_variabel`
--
DROP TABLE IF EXISTS `view_variabel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_variabel`  AS  select `m1`.`kategori_var` AS `kategori_var`,`m2`.`id_variabel` AS `id_variabel`,`m2`.`id_kat_variabel` AS `id_kat_variabel`,`m2`.`type_variabel` AS `type_variabel`,`m2`.`isi_variabel` AS `isi_variabel`,`m2`.`status_variabel` AS `status_variabel`,`m2`.`tgl_on` AS `tgl_on`,`m2`.`tgl_off` AS `tgl_off`,`m3`.`bobot_variabel` AS `bobot_variabel`,`m4`.`id_desa` AS `id_desa`,`m4`.`nama_desa` AS `nama_desa` from (((`kategori_variabel` `m1` join `variabel` `m2` on((`m2`.`id_kat_variabel` = `m1`.`id_kat_variabel`))) join `bobot_variabel` `m3` on((`m3`.`id_variabel` = `m2`.`id_variabel`))) join `desa` `m4` on((`m4`.`id_desa` = `m3`.`id_desa`))) where (`m2`.`status_variabel` = 'Aktif') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_wilayah`
--
DROP TABLE IF EXISTS `view_wilayah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_wilayah`  AS  select `m1`.`id_rt` AS `id_rt`,`m1`.`rt` AS `rt`,`m1`.`rw` AS `rw`,`m5`.`nip` AS `nip`,`m5`.`id_ketua_rt` AS `id_ketua_rt`,`m5`.`ketua_rt` AS `ketua_rt`,`m5`.`status_tugas` AS `status_tugas`,`m5`.`status_aktifasi` AS `status_aktifasi`,`m2`.`id_desa` AS `id_desa`,`m2`.`nama_desa` AS `nama_desa`,`m2`.`kode_pos` AS `kode_pos`,`m2`.`nip_kades` AS `nip_kades`,`m2`.`kepala_desa` AS `kepala_desa`,`m3`.`kecamatan` AS `kecamatan`,`m4`.`kota` AS `kota`,`m4`.`provinsi` AS `provinsi` from ((((`rt` `m1` join `desa` `m2` on((`m2`.`id_desa` = `m1`.`id_desa`))) join `kecamatan` `m3` on((`m3`.`id_kecamatan` = `m2`.`id_kecamatan`))) join `kota` `m4` on((`m4`.`id_kota` = `m3`.`id_kota`))) join `ketua_rt` `m5` on((`m5`.`id_rt` = `m1`.`id_rt`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `bobot_variabel`
--
ALTER TABLE `bobot_variabel`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `hasil_pendataan`
--
ALTER TABLE `hasil_pendataan`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kategori_variabel`
--
ALTER TABLE `kategori_variabel`
  ADD PRIMARY KEY (`id_kat_variabel`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `ketua_rt`
--
ALTER TABLE `ketua_rt`
  ADD PRIMARY KEY (`id_ketua_rt`);

--
-- Indexes for table `master_indeks`
--
ALTER TABLE `master_indeks`
  ADD PRIMARY KEY (`id_master`);

--
-- Indexes for table `pendataan`
--
ALTER TABLE `pendataan`
  ADD PRIMARY KEY (`id_pendataan`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`id_variabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bobot_variabel`
--
ALTER TABLE `bobot_variabel`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hasil_pendataan`
--
ALTER TABLE `hasil_pendataan`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kategori_variabel`
--
ALTER TABLE `kategori_variabel`
  MODIFY `id_kat_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ketua_rt`
--
ALTER TABLE `ketua_rt`
  MODIFY `id_ketua_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_indeks`
--
ALTER TABLE `master_indeks`
  MODIFY `id_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pendataan`
--
ALTER TABLE `pendataan`
  MODIFY `id_pendataan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `id_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `id_variabel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
