-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2024 pada 02.35
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('0011', 'Iqbal', 'iqbalpanre22021@gmail.com', '$2y$10$iaDdSmAazT6K56ugBXtue.6J3a/7Run0BRxmveTBFFjVvz170jWsm', '0853-9812-677'),
('721124', 'nauval', 'noval', '$2y$10$PmquihXqsEH7n7vXaTOIdOFQger2PE24AjTCf3ashTsmP3G1pafGi', '081344224212'),
('72112412314214', 'sahrul raiya', 'sahrul', '$2y$10$u0bteyTm9S7tTwNmy8QMpemG8VsUW7NOWvs2QJR/vPahE9jLSbdN6', '081344224211'),
('7211241234', 'amar', 'amaradi', '$2y$10$d6kdeMVWU1m83sXB7VfU5e9o285f/7iBVYLuyE973jVEXGzjbuLEG', '081344224211'),
('7471', 'masyarakat', 'masyarakat123', '$2y$10$oHDu4ZGcs5Tch0qvYBIOZu0rZMxqRosHQzpbeqMP3vM7Z0/Felfhi', '0813442242'),
('74710101101020', 'masyarakat', 'user', '$2y$10$SxI9UAS98JKM67fWwPHpWOl4DxzfNjEOiO4QAw.E5fYRrVucUe36y', '081344224211'),
('747101011010211', 'lutfi', 'lutfi_fausan', '$2y$10$gbldLwJbj4AtAdirYIPNtORfckh1UM85mJd3vUteuM68QQ/6YSRMG', '0813442242121'),
('74710101101024', 'msahrul', 'msahrul', '$2y$10$5t/zBrZNSchDSyze97TbcO/nclsMjJIPycTJ2xFQHea0KMfGkMrUq', '081344224213');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `kategori` varchar(40) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','batal') NOT NULL,
  `notif` enum('unseen','seen') NOT NULL,
  `notif_status` enum('unseen','seen') NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `kategori`, `latitude`, `longitude`, `bukti`, `status`, `notif`, `notif_status`, `rating`) VALUES
(2, '2024-06-20', '74710101101020', 'Apa sudah ada kabar lain yang kau tunggu', '', '-5.1511296', '119.4524672', '667447839cbe3.mp4', 'batal', 'seen', 'unseen', 0),
(3, '2024-06-22', '74710101101020', 'latihan', '', '-5.1511296', '119.4524672', '667631f86f2a1.png', 'selesai', 'seen', 'seen', 0),
(4, '2024-06-22', '74710101101020', 'tess', '', '-5.1511296', '119.4524672', '66763d1f3e89a.png', 'selesai', 'seen', 'seen', 0),
(5, '2024-06-22', '74710101101020', 'Jalan Rusak disini 1112', '', '-5.1675136', '119.4524672', '6677032c725f0.jpeg', 'batal', 'seen', 'unseen', 0),
(6, '2024-06-23', '74710101101020', 'huh', '', '-4.0278447', '122.5215386', '6676f60b587a1.jpeg', 'selesai', 'seen', 'seen', 0),
(7, '2024-06-23', '74710101101020', 'cekkk sis', '', '-5.1675136', '119.4524672', '66770107cfc17.jpeg', 'selesai', 'seen', 'seen', 0),
(8, '2024-06-23', '74710101101020', 'latihan', '', '-4.0278476', '122.5215408', '6676fa713e4d0.jpeg', '0', 'seen', 'unseen', 0),
(9, '2024-06-19', '74710101101020', 'halo', '', '-4.0278909', '122.521557', '6677013307aa7.jpeg', '0', 'seen', 'unseen', 0),
(10, '2024-06-01', '74710101101020', 'sedang aku dari badai', '', '-5.1675136', '119.4524672', '6677039a0fd01.jpg', 'selesai', 'seen', 'seen', 0),
(11, '2024-06-15', '74710101101020', 'gtw', '', '-5.1675136', '119.4524672', '667703ced6772.jpg', 'batal', 'seen', 'unseen', 0),
(12, '2024-06-24', '747101011010211', 'Telah Terjadi Kerusakan Sarana Dan Prasarana Disini di jalan merpati 1', '', '-4.0009728', '122.5162752', '6678d6e0df73c.jpg', '0', 'seen', 'unseen', 0),
(13, '2024-06-24', '72112412314214', 'Disini Terjadi perusakan Sarana di jalan kancil', '', '-4.0009728', '122.5162752', '6678db1c6c22a.mp4', 'selesai', 'seen', 'unseen', 0),
(14, '2024-06-27', '74710101101020', 'tess', '', '-4.0009728', '122.519552', '667cc8818d44c.jpeg', 'proses', 'seen', 'seen', 0),
(15, '2024-06-27', '74710101101020', 'kudengannya', '', '-4.0009728', '122.519552', '667cc950c0bd8.png', '0', 'seen', 'unseen', 0),
(16, '2024-06-22', '74710101101020', 'latihan', '', '-4.0278322', '122.5215312', '667ccb2aee1bd.jpeg', '0', 'seen', 'unseen', 0),
(17, '2024-07-02', '74710101101024', 'Tes Pengaduan', '', '-4.0042496', '122.519552', '6683a138de288.png', '0', 'seen', 'unseen', 0),
(18, '2024-07-03', '74710101101020', 'latihan', '', '-5.1576832', '119.455744', '6684e74161179.png', 'proses', 'seen', 'seen', 0),
(19, '2024-07-03', '0011', 'Waduhh', '', '-4.0103196', '122.5183867', '6684f033e0b9a.jpg', 'batal', 'seen', 'unseen', 0),
(21, '2024-07-03', '7211241234', 'hahah', '', '-5.1576832', '119.455744', '6684f99e00e7f.png', 'selesai', 'seen', 'seen', 4),
(22, '2024-07-04', '7211241234', 'Terjadi Kerusakan Jalan di Jl. Kancil', 'infrastruktur', '-5.1511296', '119.455744', '6685d4de613f2.jpg', '0', 'seen', 'unseen', 0),
(23, '2024-07-04', '7211241234', 'TES VIDEO', 'keamanan', '-5.1511296', '119.455744', '6685de5d3fe4e.mp4', 'proses', 'seen', 'seen', 0),
(24, '2024-07-04', '7211241234', 'latihan', 'keamanan', '-4.0279857', '122.5214819', '6685e003adde5.mp4', '0', 'seen', 'unseen', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'admin', 'admin', 'admin123', '08121892123', 'admin'),
(4, 'petugas', 'petugas', '$2y$10$9jn/KVkxFsKNdu9gTqle8uJu3GKWrKj5hbtnDr7YAoaXtmJIuGrH2', '0812897123', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 10, '2024-06-24', 'Terimakasih Atas Pengaduannya, Kami akan segera memprosesnya\r\n', 4),
(2, 11, '2024-06-24', 'Bukti kurang lengkap', 4),
(3, 5, '2024-06-24', 'Bukti Kurang Lengkap', 4),
(4, 13, '2024-06-24', 'Petugas Akan Segara Kesana', 4),
(5, 19, '2024-07-03', 'gajelas', 4),
(6, 21, '2024-07-03', 'Terimakasih Atas Pengaduannya', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
