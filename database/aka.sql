-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2014 at 08:50 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aka`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambil_mk`
--

CREATE TABLE IF NOT EXISTS `ambil_mk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `tahun_akademik` date NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `huruf_mutu` varchar(10) NOT NULL,
  `nilai_mt` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `sks` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `kodemk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ambil_mk`
--


-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(100) NOT NULL,
  `user_agent` varchar(100) NOT NULL,
  `last_activity` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ci_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_absen_kelas`
--

CREATE TABLE IF NOT EXISTS `t_absen_kelas` (
  `id_absen_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kehadiran` varchar(10) NOT NULL,
  `sakit` varchar(10) NOT NULL,
  `izin` varchar(10) NOT NULL,
  `tanpa_keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_absen_kelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_absen_kelas`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_absen_mk`
--

CREATE TABLE IF NOT EXISTS `t_absen_mk` (
  `id_absen_mk` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `kehadiran` varchar(10) NOT NULL,
  `sakit` varchar(10) NOT NULL,
  `izin` varchar(10) NOT NULL,
  `tanpa_keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_absen_mk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_absen_mk`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_ambil_kelas`
--

CREATE TABLE IF NOT EXISTS `t_ambil_kelas` (
  `id_ambil_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  PRIMARY KEY (`id_ambil_kelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_ambil_kelas`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_ambil_kuota_mhs`
--

CREATE TABLE IF NOT EXISTS `t_ambil_kuota_mhs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `id_detail_kuota` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_ambil_kuota_mhs`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_biaya_akademik`
--

CREATE TABLE IF NOT EXISTS `t_biaya_akademik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `harga` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_biaya_akademik`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_bimbingan`
--

CREATE TABLE IF NOT EXISTS `t_bimbingan` (
  `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `is_lulus` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  PRIMARY KEY (`id_bimbingan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_bimbingan`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_cuti_akademik`
--

CREATE TABLE IF NOT EXISTS `t_cuti_akademik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `semester_ajuan_cuti` varchar(100) NOT NULL,
  `semester_cuti` varchar(100) NOT NULL,
  `semester_cuti_masuk` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `alasan` text NOT NULL,
  `is_registrasi` varchar(100) NOT NULL,
  `bayar` int(12) NOT NULL,
  `persen_bayar` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_cuti_akademik`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_daerah`
--

CREATE TABLE IF NOT EXISTS `t_daerah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_daerah`
--

INSERT INTO `t_daerah` (`id`, `id_parent`, `nama`) VALUES
(1, 0, 'bogor'),
(2, 0, 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_frs`
--

CREATE TABLE IF NOT EXISTS `t_detail_frs` (
  `id_detail_frs` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk` int(11) NOT NULL,
  `id_frs` int(11) NOT NULL,
  `status_ambil` varchar(100) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_frs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_detail_frs`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_detail_kuota_matkul`
--

CREATE TABLE IF NOT EXISTS `t_detail_kuota_matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kuota` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `isi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_detail_kuota_matkul`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_donwload_mk`
--

CREATE TABLE IF NOT EXISTS `t_donwload_mk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `path` text NOT NULL,
  `is_tampil` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_donwload_mk`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_dosen`
--

CREATE TABLE IF NOT EXISTS `t_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gelar` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `password_simak` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` text NOT NULL,
  `password_sms` text NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_dosen`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_download_jadwal`
--

CREATE TABLE IF NOT EXISTS `t_download_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tingkat` varchar(100) NOT NULL,
  `path` text NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_download_jadwal`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_dump`
--

CREATE TABLE IF NOT EXISTS `t_dump` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `smt` varchar(100) NOT NULL,
  `sks` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_dump`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_frs`
--

CREATE TABLE IF NOT EXISTS `t_frs` (
  `id_frs` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  PRIMARY KEY (`id_frs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_frs`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_harga_sks`
--

CREATE TABLE IF NOT EXISTS `t_harga_sks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_harga_sks`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_harga_sks2`
--

CREATE TABLE IF NOT EXISTS `t_harga_sks2` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_harga_sks2`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_kalender_akademik`
--

CREATE TABLE IF NOT EXISTS `t_kalender_akademik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ta` int(11) NOT NULL,
  `kegiatan` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_kalender_akademik`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_kbaak`
--

CREATE TABLE IF NOT EXISTS `t_kbaak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nip` int(12) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_kbaak`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE IF NOT EXISTS `t_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`) VALUES
(1, 1, 'AKA1'),
(2, 2, 'AKA 2');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelulusan`
--

CREATE TABLE IF NOT EXISTS `t_kelulusan` (
  `id_lulus` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `tahun_kelulusan` varchar(100) NOT NULL,
  `ipk` varchar(50) NOT NULL,
  `peringkat` varchar(20) NOT NULL,
  PRIMARY KEY (`id_lulus`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_kelulusan`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_konsultasi`
--

CREATE TABLE IF NOT EXISTS `t_konsultasi` (
  `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_bimbingan` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `id_konsultasi_parent` int(11) NOT NULL,
  `dibaca` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `subject` varchar(100) NOT NULL,
  `done_by` varchar(100) NOT NULL,
  `dibacah_mhs` varchar(100) NOT NULL,
  PRIMARY KEY (`id_konsultasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_konsultasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_kuota_matkul_pilihan`
--

CREATE TABLE IF NOT EXISTS `t_kuota_matkul_pilihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mata_kuliah` int(11) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `jumlah_mk` varchar(100) NOT NULL,
  `kuota` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `kode_mk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_kuota_matkul_pilihan`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `t_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_pendaftaran` int(11) NOT NULL,
  `nim` int(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `status_nikah` varchar(50) NOT NULL,
  `golongan_darah` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jalur_masuk` varchar(100) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `alamat_sekolah` varchar(255) NOT NULL,
  `tahun_lulus` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `nama_ortu` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `no_telp_ortu` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `status_kuliah` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `password` text NOT NULL,
  `no_ponsel` varchar(20) NOT NULL,
  `no_ponsel_ortu` varchar(20) NOT NULL,
  `alamat_asal` varchar(255) NOT NULL,
  `no_telp_asal` varchar(255) NOT NULL,
  `tahun_masuk` varchar(100) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `kode_pos_ortu` varchar(100) NOT NULL,
  `angkatan` varchar(100) NOT NULL,
  `instansi_alumni` varchar(100) NOT NULL,
  `alamat_instansi` varchar(255) NOT NULL,
  `telepon_instansi` varchar(255) NOT NULL,
  `tahun_wisuda` varchar(100) NOT NULL,
  `kode_pos_instansi` varchar(100) NOT NULL,
  `tanggal_lulus` date NOT NULL,
  `no_transkrip` varchar(100) NOT NULL,
  `alamat_ortu` varchar(255) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `pend_ortu` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_mahasiswa`
--

INSERT INTO `t_mahasiswa` (`id_mahasiswa`, `id_pendaftaran`, `nim`, `nama`, `jenis_kelamin`, `alamat`, `ttl`, `status_nikah`, `golongan_darah`, `agama`, `jalur_masuk`, `asal_sekolah`, `alamat_sekolah`, `tahun_lulus`, `jurusan`, `nama_ortu`, `pekerjaan`, `no_telp`, `tempat_lahir`, `no_telp_ortu`, `foto`, `status_kuliah`, `id_kelas`, `password`, `no_ponsel`, `no_ponsel_ortu`, `alamat_asal`, `no_telp_asal`, `tahun_masuk`, `id_daerah`, `kode_pos_ortu`, `angkatan`, `instansi_alumni`, `alamat_instansi`, `telepon_instansi`, `tahun_wisuda`, `kode_pos_instansi`, `tanggal_lulus`, `no_transkrip`, `alamat_ortu`, `kode_pos`, `pend_ortu`) VALUES
(1, 1, 10001, 'andry kurniawan', 'Laki-laki', 'Jln. babakan Lebak', 'Bogor, 18-Maret-1996', 'Belum Menikah', 'O', 'Islam', 'Tes', 'SMK Adi Sanggoro', 'Jln.Sengked', '2014', 'Teknologi Informatika', 'Agustiar', 'Karyawan Swasta', '08123456', 'Jakarta', '08123456', '', 'Sedang Kuliah', 1, '1fd07199cca4ff81d01dca373c6e03a9', '081245678', '08123456', 'Jln.babakan', '081234567', '2014', 1, '16880', '70', 'null', 'null', 'null', '2018', 'null', '2018-07-11', 'null', 'null', 'null', 'S3'),
(3, 0, 90, 'ok', 'Laki-laki', 'asd', 'asd', '---pilih---', '---pilih--', '---pilih---', '', '', '', '', '---pilih---', '', '', 'photoworld', '', '', '0', '---pilih---', 0, '6e98dd08f750a6b151d34ea1417b1059', '', '', '', '', '', 0, '', '2001/2002', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(4, 0, 10003, 'ashley', 'Perempuan', 'bandung', '', 'Belum menikah', 'ab', 'Islam', 'undangan', 'smk n bandung', 'bandung', '', 'IPA', 'rudi', 'manager in pt.contoh', '0871263', '', '', '0', 'aktif', 2, 'd41d8cd98f00b204e9800998ecf8427e', '0124876', '019283', '', '', '', 0, '', '2001/2002', '', '', '', '', '', '0000-00-00', '', 'bandung', '1092', 's3 ekonimi'),
(5, 0, 10002, 'okky setiawan', 'Laki-laki', 'balio', '', 'Belum menikah', 'a', 'Islam', 'x', 'x', 'x', '', 'IPA', 'x', 'c', '087678', '', '', '0', 'aktif', 1, 'c821adbe2db2d35a30551480105cb919', '08123', '08', '', '', '', 0, 'sdf', '2010/2011', '', '', '', '', '', '0000-00-00', '', 'x', '1020', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `t_mk`
--

CREATE TABLE IF NOT EXISTS `t_mk` (
  `id_mk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_mk` int(11) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `jumlah_sks` varchar(100) NOT NULL,
  `sks_teori` varchar(100) NOT NULL,
  `sks_praktek` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `id_mk_prasarat` int(11) NOT NULL,
  `id_mk_prak` int(11) NOT NULL,
  `is_pratikum` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_mk`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_mk2`
--

CREATE TABLE IF NOT EXISTS `t_mk2` (
  `id_mk` int(11) NOT NULL,
  `kode_mk` int(11) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `jumlah_sks` varchar(100) NOT NULL,
  `sks_teori` varchar(100) NOT NULL,
  `sks_praktik` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `id_mk_prasarat` int(11) NOT NULL,
  `id_mk_prak` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mk2`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_nilai`
--

CREATE TABLE IF NOT EXISTS `t_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `jumlah_sks` varchar(100) NOT NULL,
  `nilai_uts` int(10) NOT NULL,
  `nilai_uas` int(10) NOT NULL,
  `huruf_mutu` varchar(10) NOT NULL,
  `bobot_nilai` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_nilai`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `t_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ttl` text NOT NULL,
  `status_nikah` varchar(100) NOT NULL,
  `golongan_darah` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jalur_masuk` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `tahun_lulus` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `nama_ortu` varchar(255) NOT NULL,
  `alamat_ortu` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pendaftaran`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_pendaftaran`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_pengajar`
--

CREATE TABLE IF NOT EXISTS `t_pengajar` (
  `id_pengajar` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  PRIMARY KEY (`id_pengajar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_pengajar`
--


-- --------------------------------------------------------

--
-- Table structure for table ` t_pengumuman_akademik`
--

CREATE TABLE IF NOT EXISTS ` t_pengumuman_akademik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `path` text NOT NULL,
  `creator` varchar(100) NOT NULL,
  `tgl_buat` date NOT NULL,
  `is_tampil` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table ` t_pengumuman_akademik`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_pesan`
--

CREATE TABLE IF NOT EXISTS `t_pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `isi_pesan` text NOT NULL,
  `use` text NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_pesan`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_registrasi`
--

CREATE TABLE IF NOT EXISTS `t_registrasi` (
  `id_registrasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `jum_sks_wajib` varchar(100) NOT NULL,
  `jum_sks_pilihan` varchar(100) NOT NULL,
  `jumlah_uang` varchar(20) NOT NULL,
  `sudah_isi` varchar(100) NOT NULL,
  `expired` varchar(100) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `jum_sks_wajib_pr` varchar(100) NOT NULL,
  `jum_sks_pilihan_pr` varchar(100) NOT NULL,
  `biaya_dll` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `biaya_daftar_ulang` varchar(20) NOT NULL,
  `biaya_spp` varchar(20) NOT NULL,
  `biaya_internet` varchar(20) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `sisa_cicilan` varchar(20) NOT NULL,
  `memo` text NOT NULL,
  `biaya_bpp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_registrasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_registrasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_rs_temp`
--

CREATE TABLE IF NOT EXISTS `t_rs_temp` (
  `id_rs_temp` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk` int(11) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `jum_sks` varchar(100) NOT NULL,
  `teori` varchar(100) NOT NULL,
  `praktik` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `ambil` varchar(100) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `semester` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rs_temp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_rs_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_tahun_akademik`
--

CREATE TABLE IF NOT EXISTS `t_tahun_akademik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_akademik` varchar(100) NOT NULL,
  `current` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_tahun_akademik`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_ulang_mk`
--

CREATE TABLE IF NOT EXISTS `t_ulang_mk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `smt_ulang` varchar(100) NOT NULL,
  `smt_sebab` varchar(100) NOT NULL,
  `nilai_sebab` varchar(100) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `kode_mk` int(11) NOT NULL,
  `smt_ulang_rum` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_ulang_mk`
--


-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(100) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gelar` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` text NOT NULL,
  `tipe` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`, `level`, `nip`, `nama`, `alamat`, `no_telp`, `gelar`, `tempat_lahir`, `tgl_lahir`, `foto`, `tipe`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 123456, 'andry kurniawan', 'Jln. babakan Lebak', '08123456', 'S3', 'Bogor', '1996-03-18', 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `t_waktu_frs:`
--

CREATE TABLE IF NOT EXISTS `t_waktu_frs:` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_waktu_frs:`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
