-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Des 2016 pada 00.19
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd_email` varchar(255) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `level` char(1) NOT NULL,
  `sts` char(1) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `no_ktp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `user`, `pwd`, `foto`, `alamat`, `email`, `pwd_email`, `hp`, `level`, `sts`, `bank`, `no_rek`, `no_ktp`) VALUES
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'admin', 'admin@yahoo.com', '21232f297a57a5a743894a0e4a801fc3', '', '0', '1', 'BRI', '68376474854298438', '9989606082003'),
(3, 'mas ade', 'ade', 'e356e24455acb0af2af59a65f61e88db', '', 'majenang', 'ade@yahoo.com', '', '089606082003', '1', '1', '', '', ''),
(4, 'cinta', 'cinta', 'c3653e4408832e6611f37dcd90544de8', '', 'indonesia', 'cinta@yahoo.com', '', '089606082003', '1', '1', '', '', ''),
(5, 'idam', 'idam', '692670da6ad1522460efeb16e9aef3f0', '', 'indonesia\r\n', 'idam@idam.com', '', '089606082003', '1', '1', '', '', ''),
(6, 'kuncara', 'kuncara', '9de6779102ea780b02125e645e712a00', '', 'kuncara', 'kuncara@kuncara.com', '', '08222222222', '1', '1', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agent`
--

CREATE TABLE `agent` (
  `id_agent` int(5) NOT NULL,
  `nama_agent` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ket` text NOT NULL,
  `foto` text NOT NULL,
  `saldo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agent`
--

INSERT INTO `agent` (`id_agent`, `nama_agent`, `alamat`, `hp`, `ket`, `foto`, `saldo`) VALUES
(1, 'Nusantaraku', 'jawa tengah kabupaten cilacap', '089606082003', 'ini itu semua bisa jelas dan pasti dan WARBIAZA', 'baturaden_yoshiewafa.blogspot_.com_2.jpg', 0),
(2, 'The Company', 'Majenang', '089606082003', 'Percayalah pada usaha kami ', 'images4.jpg', 0),
(3, 'uaha', 'dsfadsf', '32412343124', 'sdfsafa', 'Tempat_Wisata_di_Banyumas_-_Baturaden.jpg', 0),
(4, 'e', 'e', '2', 'as', 'bus.jpg', 0),
(5, 'agent', 'agent indonesia 53234', '089606082003', 'pokoknya epic', 'images.png', 0),
(6, 'agent', 'agent indonesia 53234', '089606082003', 'bagus dan terpercaya', 'images1.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `armada`
--

CREATE TABLE `armada` (
  `id_armada` int(5) NOT NULL,
  `id_operator` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `armada`
--

INSERT INTO `armada` (`id_armada`, `id_operator`, `nama`, `ket`, `foto`) VALUES
(1, 1, 'Bus Rosalia', 'dipercaya dan nyaman dan fasilitas lengkap dan teruji', 'bus1.jpg'),
(2, 2, 'bis kai', 'dfsfasdf', 'bus2.jpg'),
(3, 4, 'sentosa fast', 'dasfasdfdsf', 'Singa-jantan.jpg'),
(4, 6, 'big bus', 'fasilitas', 'BIG_BUS.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_paket`
--

CREATE TABLE `detail_paket` (
  `id_detailpaket` int(11) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `id_wisata` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_paket`
--

INSERT INTO `detail_paket` (`id_detailpaket`, `id_paket`, `id_wisata`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(5, 5, 5),
(6, 5, 7),
(7, 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_thread`
--

CREATE TABLE `detail_thread` (
  `id_thread` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `komentar` text NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(5) NOT NULL,
  `id_operator` int(5) NOT NULL,
  `id_wisata` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  `ket` varchar(300) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `iwisata_sessions`
--

CREATE TABLE `iwisata_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iwisata_sessions`
--

INSERT INTO `iwisata_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('3585d26fffa829d2292f61104b6c0ba0', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36', 1475247256, ''),
('88bcf7b208f50372cb6ad998195a70b1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 1482524910, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `id_operator` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `jenis` char(1) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kustomer`
--

CREATE TABLE `kustomer` (
  `id_kustomer` int(5) NOT NULL,
  `no_ktp` int(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `no_ktp`, `nama`, `alamat`, `email`, `pwd`, `jk`, `tgl_lahir`, `hp`) VALUES
(2, 0, 'Idham Zulkarnaen', 'Indonesia', 'idhamzulkarnaen@yahoo.co.id', 'e356e24455acb0af2af59a65f61e88db', 'l', '0000-00-00', '089606082003'),
(5, 8192333, 'agung', 'agung negara', 'agung@agung.com', 'e59cd3ce33a68f536c19fedb82a7936f', 'p', '1995-05-28', '08222222222'),
(6, 34234, 'arma', 'arma negara', 'arma@arma.com', 'ffce3759c0d736c5365efe989eb2e16e', 'l', '1111-11-11', '0833333'),
(7, 12345, 'idm', 'xik', 'idm@idm.com', '679a4004c55e0afdcf4d4bc5b680162a', 'l', '1995-07-13', '089193'),
(8, 1923, 'joko joko', 'dsafasdf', 'joko@joko.com', '9ba0009aa81e794e628a04b51eaf7d7f', 'l', '2016-07-01', '097781'),
(9, 109, 'kuncara', 'kuncara', 'joko@joko.com', '9ba0009aa81e794e628a04b51eaf7d7f', 'l', '1995-02-02', '0833333'),
(10, 123456, 'wisnu', 'jl wisnu', 'wisnu@wisnu.com', '67340a8acc49d521d7fdd25db913bf9d', 'l', '2016-07-19', '089606082003'),
(11, 123456, 'wisnu', 'jl wisnu', 'wisnu@wisnu.com', '67340a8acc49d521d7fdd25db913bf9d', 'l', '2016-07-19', '089606082003'),
(12, 123456, 'wisnu', 'jl wisnu', 'wisnu@wisnu.com', '67340a8acc49d521d7fdd25db913bf9d', 'l', '2016-07-19', '089606082003'),
(13, 123456, 'wisnu', 'jl wisnu', 'wisnu@wisnu.com', '67340a8acc49d521d7fdd25db913bf9d', 'l', '2016-07-19', '089606082003'),
(14, 55, 'tery', 'teri', 'terry@terry.com', 'dd5585a92b04d4420477ee6082770fd1', 'l', '2016-07-06', '089606082003'),
(15, 19234, 'jiji', 'jiji', 'jiji@jiji.com', 'b19f854c93aa7330289ce0325c7b81ec', 'p', '2016-07-05', '123123'),
(16, 45435, 'krupuk', 'krupuk', 'krupuk@krupuk.com', '636c685043017c51b2fcd770a27c2cd5', 'l', '2016-07-14', '234324');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `id_admin`, `judul`, `isi`) VALUES
(1, 2, 'bank', 'BRI'),
(2, 2, 'no_rekening', '5901-01-000078-50-6'),
(3, 2, 'atas_nama', 'IDHAM ZULKARNAEN'),
(4, 1, 'syarat_ketentuan', '<div class="well" style="background:#fff;padding-left:10px">\r\n<div dir="ltr"><strong>Cara Pemesanan Paket Wisata</strong><br />\r\n<br />\r\n1. Daftarkan data peserta melalui email ke info@putrakarimunjawa.com atau telp / sms ke nomer yang ada di website ini.<br />\r\n<br />\r\n2. Pembayaran DP 40% dari paket yang diambil di bayarkan maksimal 2 minggu sebelum hari H dan dapat ditransfer ke :<br />\r\n<br />\r\n<strong>No Rek BRI</strong>: 5901-01-000078-50-5 A/N IDHAM ZULKARNAEN<br />\r\n<br />\r\n<strong>No Rek BCA</strong> : 2471-669-361 A/N IDHAM ZULKARNAEN<br />\r\ndan sisa pembayaran paket dibayarkan saat di Karimunjawa.<br />\r\n<br />\r\n3. Konfirmasikan kepada kami melalui email,telp/sms apabila telah melakukan transfer.<br />\r\n<br />\r\n4. Peserta Minimal 10 org.<br />\r\n<br />\r\n5. Jika peserta kurang dari 10 org (minimal 2 orang tetap kita layani) peserta akan digabungkan dengan rombongan yang lain.<br />\r\n<br />\r\n6. Jika peserta kurang dari 10 orang dan tidak ada rombongan lain yang bisa digabungkan, biaya akan disesuaikan.<br />\r\n<br />\r\n<strong>Harga Paket Wista Putra Karimunjawa</strong><br />\r\nHarga paket wisata sewaktu- waktu dapat berubah tanpa pemberitahuan terlebih dahulu menyesuaikan harga kebutuhan paket wisata di karimunjawa.<br />\r\n<br />\r\n<strong>PENGALIHAN </strong><br />\r\nApabila ada pengalihan jadwal paket wisata oleh peserta kami akan membebankan kepada peserta untuk penggantian biaya beli tiket kapal dan biaya DP penginapan yg telah di keluarkan.<br />\r\n<br />\r\n<br />\r\n<br />\r\n<strong>Pembatalan Oleh Peserta</strong><br />\r\n<br />\r\n1. Semua jenis pembatalan paket wisata putra karimunjawa akan mengakibatkan DP hilang/hangus<br />\r\n<br />\r\n2. Keterlambatan peserta paket wisata putra karimunjawa tour di pelabuhan (meeting point) yang mengakibatkan peserta tertinggal oleh jam keberangkatan kapal yang diubah oleh pihak yang berwenang (Kepala Syahbandar), dianggap sebagai pembatalan oleh peserta pada hari H<br />\r\n<br />\r\n<strong>Pembatalan Oleh Pihak Berwenang</strong><br />\r\n<br />\r\n1. Pembatalan Jadwal Kapal oleh pihak berwenang (Dishub Semarang/ASDP Cabang Jepara/Syahbandar) dikarenakan alasan teknis dan cuaca, semua biaya yang sudah masuk akan kami kembalikan 100%, maksimal selama 4 Hari Kerja.<br />\r\n<br />\r\n2. Kami Putra Karimunjawa Tour tidak bertanggungjawab atas semua biaya dan kerugian yang diakibatkan oleh pembatalan jadwal penyeberangan yang dilakukan oleh pihak berwenang.<br />\r\n<br />\r\n<strong>Pembatalan Dari Kami Putra Karimunjawa Tour</strong><br />\r\n<br />\r\n1. Pembatalan dikarenakan ketidakmampuan Kami Putra Karimunjawa Tour untuk menyediakan paket wisata, semua biaya yang sudah masuk akan kami kembalikan sebesar 100% maksimal selama 4 Hari kerja.<br />\r\n<br />\r\n2`. Semua biaya yang dikeluarkan oleh peserta yang berasal dari Kota masing-masing dan biaya di luar paket wisata yang dipesan, bukan merupakan tanggung jawab kami.<br />\r\n<br />\r\n<strong>Pembatalan Oleh Sebab Lain</strong><br />\r\n<br />\r\n1. Putra Karimunjawa Tour tidak bertanggungjawab atas pembatalan paket wisata yang disebabkan oleh bencana alam, demonstrasi, peperangan, kecelakaan di jalan, huru-hara, dan keterlambatan peserta yang diakibatkan oleh peserta sendiri ataupun sebab lain.<br />\r\n<br />\r\n2. Seluruh biaya diluar paket wisata yang dipesan yang dikeluarkan oleh peserta yang berasal dari Luar Kota bukan merupakan tanggung jawab kami.<br />\r\n<br />\r\n3. Putra Karimunjawa Tour berhak melarang, menyarankan,dan melaporkan peserta kepada pihak berwenang jika melakukan kegiatan yang bertentangan dengan Peraturan Wisata karimunjawa atau yang berpotensi atau merugikan lingkungan alam Karimunjawa.<br />\r\n<br />\r\n4. Peserta paket wisata berhak mendapat penjelasan tentang Peraturan Wisata Putra Karimunjawa Tour sebelum kegiatan berlangsung.<br />\r\n<br />\r\n5. Demi keselamatan peserta tour, Putra Karimunjawa Tour berhak menentukan dan mengalihkan tujuan wisata bila kondisi alam tidak memungkinkan.<br />\r\n<br />\r\n6. Putra Karimunjawa Tour berhak membatalkan atau mengalihkan tour laut dengan tour darat apabila kondisi laut tidak memungkinkan.<br />\r\n<br />\r\n7. Putra Karimunjawa Tour berhak menolak/membatalkan sesi penyelaman yang akan dilakukan oleh peserta paket wisata yang tidak memiliki, tidak mampu menunjukkan sertifikat selam, atau yang karena kesehatan peserta paket wisata yang dinilai tidak memungkinkan.<br />\r\n<br />\r\n<strong>ASURANSI</strong><br />\r\nKami Putra Karimunjawa Tour bekerja sama dengan Asuransi Raya dan Masa penanggungan Asuransi berlaku selama di karimunjawa saat mengikuti paket wisata putra karimunjawa tour.<br />\r\n<br />\r\n<br />\r\n<strong>LAIN LAIN</strong><br />\r\n<br />\r\n1.&nbsp; Apabila ada penundaan keberangkatan kapal di karimunjawa yg dikarenakan oleh cuaca atau kebijakan dari pihak yg berwenang untuk biaya kebutuhan peserta selama menunggu keberangkatan kapal (penginapan, makan, kebutuhan pribadi) akan dibebankan kepada peserta.<br />\r\n<br />\r\n2. Syarat dan Ketentuan ini bersifat mengikat dan tidak dapat diubah/dibatalkan dengan alasan apapun.<br />\r\n<br />\r\n3. Peserta paket wista putra karimunjawa tour yang sudah memesan paket wisata dianggap sudah membaca dan menyetujui Syarat dan Ketentuan ini.<br />\r\n<br />\r\n<br />\r\n<strong>Peraturan Wisata</strong><br />\r\n<br />\r\nDikarenakan wisata yang kita lakukan adalah di kawasan Taman Nasional Laut yang memiliki aturan yang harus dipatuhi. Untuk menjaga lingkungan dan membuat perjalanan Anda lancar,aman dan nyaman, silakan patuhi beberapa hal dibawah ini :\r\n<ol>\r\n	<li>JANGAN Menginjak Terumbu Karang</li>\r\n	<li>JANGAN Mengaduk sedimen</li>\r\n	<li>JANGAN Mengejar atau menyentuh hewan laut</li>\r\n	<li>JANGAN Membuang Sampah Sembarangan</li>\r\n	<li>JANGAN Mengoleksi Hewan Laut, baik hidup atau mati</li>\r\n	<li>PATUHI Tour Leader dan Guide Anda</li>\r\n	<li>Gunakan Baju Pelampung</li>\r\n	<li>LAKUKAN Pelatihan Daya Apung</li>\r\n	<li>Jaga Sopan Santun.</li>\r\n</ol>\r\n</div>\r\n</div>\r\n'),
(5, 1, 'syarat_ketentuan_agent', '<div class="well" style="background:#fff;padding-left:10px">\r\n<div dir="ltr"><strong>Cara Pemesanan Paket Wisata</strong><br />\r\n<br />\r\n1. Daftarkan data peserta melalui email ke info@putrakarimunjawa.com atau telp / sms ke nomer yang ada di website ini.<br />\r\n<br />\r\n2. Pembayaran DP 40% dari paket yang diambil di bayarkan maksimal 2 minggu sebelum hari H dan dapat ditransfer ke :<br />\r\n<br />\r\n<strong>No Rek BRI</strong>: 5901-01-000078-50-5 A/N IDHAM ZULKARNAEN<br />\r\n<br />\r\n<strong>No Rek BCA</strong> : 2471-669-361 A/N IDHAM ZULKARNAEN<br />\r\ndan sisa pembayaran paket dibayarkan saat di Karimunjawa.<br />\r\n<br />\r\n3. Konfirmasikan kepada kami melalui email,telp/sms apabila telah melakukan transfer.<br />\r\n<br />\r\n4. Peserta Minimal 10 org.<br />\r\n<br />\r\n5. Jika peserta kurang dari 10 org (minimal 2 orang tetap kita layani) peserta akan digabungkan dengan rombongan yang lain.<br />\r\n<br />\r\n6. Jika peserta kurang dari 10 orang dan tidak ada rombongan lain yang bisa digabungkan, biaya akan disesuaikan.<br />\r\n<br />\r\n<strong>Harga Paket Wista Putra Karimunjawa</strong><br />\r\nHarga paket wisata sewaktu- waktu dapat berubah tanpa pemberitahuan terlebih dahulu menyesuaikan harga kebutuhan paket wisata di karimunjawa.<br />\r\n<br />\r\n<strong>PENGALIHAN </strong><br />\r\nApabila ada pengalihan jadwal paket wisata oleh peserta kami akan membebankan kepada peserta untuk penggantian biaya beli tiket kapal dan biaya DP penginapan yg telah di keluarkan.<br />\r\n<br />\r\n<br />\r\n<br />\r\n<strong>Pembatalan Oleh Peserta</strong><br />\r\n<br />\r\n1. Semua jenis pembatalan paket wisata putra karimunjawa akan mengakibatkan DP hilang/hangus<br />\r\n<br />\r\n2. Keterlambatan peserta paket wisata putra karimunjawa tour di pelabuhan (meeting point) yang mengakibatkan peserta tertinggal oleh jam keberangkatan kapal yang diubah oleh pihak yang berwenang (Kepala Syahbandar), dianggap sebagai pembatalan oleh peserta pada hari H<br />\r\n<br />\r\n<strong>Pembatalan Oleh Pihak Berwenang</strong><br />\r\n<br />\r\n1. Pembatalan Jadwal Kapal oleh pihak berwenang (Dishub Semarang/ASDP Cabang Jepara/Syahbandar) dikarenakan alasan teknis dan cuaca, semua biaya yang sudah masuk akan kami kembalikan 100%, maksimal selama 4 Hari Kerja.<br />\r\n<br />\r\n2. Kami Putra Karimunjawa Tour tidak bertanggungjawab atas semua biaya dan kerugian yang diakibatkan oleh pembatalan jadwal penyeberangan yang dilakukan oleh pihak berwenang.<br />\r\n<br />\r\n<strong>Pembatalan Dari Kami Putra Karimunjawa Tour</strong><br />\r\n<br />\r\n1. Pembatalan dikarenakan ketidakmampuan Kami Putra Karimunjawa Tour untuk menyediakan paket wisata, semua biaya yang sudah masuk akan kami kembalikan sebesar 100% maksimal selama 4 Hari kerja.<br />\r\n<br />\r\n2`. Semua biaya yang dikeluarkan oleh peserta yang berasal dari Kota masing-masing dan biaya di luar paket wisata yang dipesan, bukan merupakan tanggung jawab kami.<br />\r\n<br />\r\n<strong>Pembatalan Oleh Sebab Lain</strong><br />\r\n<br />\r\n1. Putra Karimunjawa Tour tidak bertanggungjawab atas pembatalan paket wisata yang disebabkan oleh bencana alam, demonstrasi, peperangan, kecelakaan di jalan, huru-hara, dan keterlambatan peserta yang diakibatkan oleh peserta sendiri ataupun sebab lain.<br />\r\n<br />\r\n2. Seluruh biaya diluar paket wisata yang dipesan yang dikeluarkan oleh peserta yang berasal dari Luar Kota bukan merupakan tanggung jawab kami.<br />\r\n<br />\r\n3. Putra Karimunjawa Tour berhak melarang, menyarankan,dan melaporkan peserta kepada pihak berwenang jika melakukan kegiatan yang bertentangan dengan Peraturan Wisata karimunjawa atau yang berpotensi atau merugikan lingkungan alam Karimunjawa.<br />\r\n<br />\r\n4. Peserta paket wisata berhak mendapat penjelasan tentang Peraturan Wisata Putra Karimunjawa Tour sebelum kegiatan berlangsung.<br />\r\n<br />\r\n5. Demi keselamatan peserta tour, Putra Karimunjawa Tour berhak menentukan dan mengalihkan tujuan wisata bila kondisi alam tidak memungkinkan.<br />\r\n<br />\r\n6. Putra Karimunjawa Tour berhak membatalkan atau mengalihkan tour laut dengan tour darat apabila kondisi laut tidak memungkinkan.<br />\r\n<br />\r\n7. Putra Karimunjawa Tour berhak menolak/membatalkan sesi penyelaman yang akan dilakukan oleh peserta paket wisata yang tidak memiliki, tidak mampu menunjukkan sertifikat selam, atau yang karena kesehatan peserta paket wisata yang dinilai tidak memungkinkan.<br />\r\n<br />\r\n<strong>ASURANSI</strong><br />\r\nKami Putra Karimunjawa Tour bekerja sama dengan Asuransi Raya dan Masa penanggungan Asuransi berlaku selama di karimunjawa saat mengikuti paket wisata putra karimunjawa tour.<br />\r\n<br />\r\n<br />\r\n<strong>LAIN LAIN</strong><br />\r\n<br />\r\n1.&nbsp; Apabila ada penundaan keberangkatan kapal di karimunjawa yg dikarenakan oleh cuaca atau kebijakan dari pihak yg berwenang untuk biaya kebutuhan peserta selama menunggu keberangkatan kapal (penginapan, makan, kebutuhan pribadi) akan dibebankan kepada peserta.<br />\r\n<br />\r\n2. Syarat dan Ketentuan ini bersifat mengikat dan tidak dapat diubah/dibatalkan dengan alasan apapun.<br />\r\n<br />\r\n3. Peserta paket wista putra karimunjawa tour yang sudah memesan paket wisata dianggap sudah membaca dan menyetujui Syarat dan Ketentuan ini.<br />\r\n<br />\r\n<br />\r\n<strong>Peraturan Wisata</strong><br />\r\n<br />\r\nDikarenakan wisata yang kita lakukan adalah di kawasan Taman Nasional Laut yang memiliki aturan yang harus dipatuhi. Untuk menjaga lingkungan dan membuat perjalanan Anda lancar,aman dan nyaman, silakan patuhi beberapa hal dibawah ini :\r\n<ol>\r\n	<li>JANGAN Menginjak Terumbu Karang</li>\r\n	<li>JANGAN Mengaduk sedimen</li>\r\n	<li>JANGAN Mengejar atau menyentuh hewan laut</li>\r\n	<li>JANGAN Membuang Sampah Sembarangan</li>\r\n	<li>JANGAN Mengoleksi Hewan Laut, baik hidup atau mati</li>\r\n	<li>PATUHI Tour Leader dan Guide Anda</li>\r\n	<li>Gunakan Baju Pelampung</li>\r\n	<li>LAKUKAN Pelatihan Daya Apung</li>\r\n	<li>Jaga Sopan Santun.</li>\r\n</ol>\r\n</div>\r\n</div>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id_paket` int(5) NOT NULL,
  `id_armada` int(5) NOT NULL,
  `nama_paket` varchar(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga` int(10) NOT NULL,
  `ket` text NOT NULL,
  `tmpt_jemput` varchar(100) NOT NULL,
  `stok` int(5) NOT NULL,
  `img` varchar(50) NOT NULL,
  `sts` char(1) NOT NULL,
  `laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_paket`, `id_armada`, `nama_paket`, `tgl`, `tgl_berangkat`, `tgl_kembali`, `harga`, `ket`, `tmpt_jemput`, `stok`, `img`, `sts`, `laporan`) VALUES
(1, 1, 'Jogja Istim', '0000-00-00 00:00:00', '2016-06-21', '2016-06-21', 100000, '<p>ijfoajjmaodfmn</p>\r\n', 'unsoed', 8, 'prambanan_11.JPG', '1', ''),
(2, 1, 'BATURADEN', '0000-00-00 00:00:00', '2016-06-22', '2016-06-30', 100000, '<p>hahahahah</p>\r\n', 'alun-alun', 4, '230_north_sumatera_2_article_display_image.jpg', '1', ''),
(3, 2, 'pancuran', '0000-00-00 00:00:00', '2016-06-27', '2016-06-30', 100000, '<p>gsdfgs</p>\r\n', 'sdfs', 8, 'Tempat_Wisata_di_Banyumas_-_Baturaden.jpg', '0', ''),
(5, 3, 'jalan', '0000-00-00 00:00:00', '2016-07-24', '2016-07-31', 5000000, '<p>fdsfadf</p>\r\n', 'dfdadf', 20, 'bus3.jpg', '1', ''),
(6, 4, 'AYO JOGJA', '0000-00-00 00:00:00', '2016-07-24', '2016-07-31', 500000, '<p>AYo rek</p>\r\n', 'GOR UNSOED', 50, 'unduhan.png', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata`
--

CREATE TABLE `pariwisata` (
  `id_wisata` int(5) NOT NULL,
  `id_tag` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `nm_wisata` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `map` text NOT NULL,
  `hotel` text NOT NULL,
  `transpot` text NOT NULL,
  `fasilitas` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata`
--

INSERT INTO `pariwisata` (`id_wisata`, `id_tag`, `id_admin`, `nm_wisata`, `lokasi`, `harga`, `map`, `hotel`, `transpot`, `fasilitas`, `url`, `info`, `img`) VALUES
(1, 0, 0, 'Pariwisata Jogja', 'Indonesia, Jawa tengah, Jogja', '', '', '', '', '<p>becak dan dokar dan lain-lain adalah adalah fasilitas yang digunakan untuk pengerjaan yang digunakan untuk pelayanan sehari hari&nbsp;</p>\r\n', 'www.jogja.com', '                                                jogja adalah kota pelajar dan termasuk kota yang memilik kebudayaan yang mennarik untuk di kembangkan                                                    \r\n                                                ', '11.jpg'),
(2, 0, 0, 'BATURADEN', 'Jawa tengah, Banyumas', '', '', '', '', '<ul>\r\n	<li>keindahan alam yang keren</li>\r\n	<li>bersih</li>\r\n	<li>pelayanan yang baik</li>\r\n	<li>area parkir luas</li>\r\n</ul>\r\n', 'www.baturaden.com', 'baturaden adalah tempat wisata yang keren dimana ada hal yang baik yang terjadi bila  anda kesana dengan keluarga. disana terdapat permainan-permainan menarik bagi pengunjung yang mau mengunjungi tempat tersebut', 'baturaden.jpg'),
(3, 0, 0, 'Raja Ampat', 'Indonesia', '', '', '', '', '<ol>\r\n	<li>indah&nbsp;</li>\r\n	<li>diatas bukit-bukit</li>\r\n</ol>\r\n', 'www.rajaampat.com', 'wow indahnya ternyata indonesia kita ini', 'raja_ampat.jpg'),
(4, 0, 0, 'Telaga warna', 'Indonesia', '', '', '', '', '<p>abcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabc</p>\r\n', 'www.Telagawarna.com', 'abcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabcabc', 'telaga_warna.jpg'),
(5, 0, 0, 'Bali', 'Indonesia', '', '', '', '', '<p>inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;inilah keindahannya&nbsp;</p>\r\n', 'www.bali.com', 'inilah keindahannya inilah keindahannya inilah keindahannya inilah keindahannya inilah keindahannya inilah keindahannya inilah keindahannya inilah keindahannya inilah keindahannya inilah keindahannya inilah keindahannya inilah keindahannya ', 'garuda_wisnu_kencana.jpg'),
(6, 0, 0, 'Curug Bayan', 'Indonesia', '', '', '', '', '<p>gdsfjlajfds</p>\r\n\r\n<p>dfmsdjfj;afj;</p>\r\n\r\n<p>dfl;af&#39;</p>\r\n', 'Indonesia.com', 'fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk fddfsjhk ', 'curug_bayan.jpg'),
(7, 0, 0, 'curug_beliot', 'Indonesia, Jawa tengah, Jogja', '', '', '', '', '<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug</p>\r\n\r\n<p>_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n\r\n<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n\r\n<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n\r\n<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n', 'www.woow.com', '                                                curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot                                                    \r\n                                                ', 'curug_beliot.jpg'),
(8, 0, 0, 'Curug Pancuran', 'Indonesia', '', '', '', '', '<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n', 'www.rajaampat.com', '                                                curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot                                                    \r\n                                                ', '2.jpg'),
(9, 0, 0, 'Jaya Wijaya', 'Indonesia', '', '', '', '', '<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_</p>\r\n\r\n<p>beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug</p>\r\n\r\n<p>_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n\r\n<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n\r\n<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n\r\n<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n\r\n<p>curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;curug_beliot&nbsp;</p>\r\n', 'http://www.indonesia.com', '                                                curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot curug_beliot                                                    \r\n                                                ', '17.jpg'),
(10, 2, 0, 'Bundaran HI', 'Jakarta', '', '', '', '', '<p>ini menjadi semakin menarik</p>\r\n', 'http://www.jakartaindah.com', 'inilah jakarta ku inilah surga ku', 'bundaranhi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `id_reservasi` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  `email` varchar(30) NOT NULL,
  `pemilik_rek` varchar(30) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `dana` int(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_reservasi`, `tgl`, `email`, `pemilik_rek`, `bank`, `dana`, `tgl_bayar`, `foto`) VALUES
(1, 10, '2016-07-19 06:50:30', 'joko@joko.com', 'kuncara', 'Bank BRI', 500000, '2016-07-20', 'unduhan.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(5) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `id_kustomer` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  `jml_dewasa` int(2) NOT NULL,
  `jml_anak` int(2) NOT NULL,
  `sts` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_paket`, `id_kustomer`, `tgl`, `jml_dewasa`, `jml_anak`, `sts`) VALUES
(2, 1, 0, '2016-06-26 13:48:44', 2, 2, '0'),
(5, 1, 6, '2016-06-27 21:33:23', 1, 1, '0'),
(6, 1, 7, '2016-07-10 09:42:20', 2, 1, '0'),
(7, 5, 8, '2016-07-15 09:41:28', 2, 2, '2'),
(10, 6, 9, '2016-07-19 06:41:19', 1, 0, '1'),
(11, 6, 10, '2016-07-19 07:15:07', 1, 0, '0'),
(13, 6, 12, '2016-07-19 07:21:46', 1, 0, '0'),
(15, 6, 14, '2016-07-19 07:24:41', 1, 0, '0'),
(16, 6, 15, '2016-07-20 09:17:39', 1, 0, '0'),
(17, 6, 15, '2016-07-20 09:22:30', 2, 1, '0'),
(18, 6, 16, '2016-07-20 09:23:56', 1, 2, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`) VALUES
(1, 'pantai'),
(2, 'kota'),
(3, 'jawa tengah'),
(4, 'jawa barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `thread`
--

CREATE TABLE `thread` (
  `id_thread` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `id_tag` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_verifikasi` int(5) NOT NULL,
  `id_reservasi` int(5) NOT NULL,
  `jml_dewasa` int(5) NOT NULL,
  `jml_anak` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id_agent`);

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`id_armada`);

--
-- Indexes for table `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD PRIMARY KEY (`id_detailpaket`);

--
-- Indexes for table `detail_thread`
--
ALTER TABLE `detail_thread`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `iwisata_sessions`
--
ALTER TABLE `iwisata_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kustomer`
--
ALTER TABLE `kustomer`
  ADD PRIMARY KEY (`id_kustomer`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pariwisata`
--
ALTER TABLE `pariwisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id_agent` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `armada`
--
ALTER TABLE `armada`
  MODIFY `id_armada` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_paket`
--
ALTER TABLE `detail_paket`
  MODIFY `id_detailpaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_thread`
--
ALTER TABLE `detail_thread`
  MODIFY `id_thread` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kustomer`
--
ALTER TABLE `kustomer`
  MODIFY `id_kustomer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pariwisata`
--
ALTER TABLE `pariwisata`
  MODIFY `id_wisata` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id_thread` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_verifikasi` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
