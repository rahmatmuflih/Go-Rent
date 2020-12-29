-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2020 pada 08.48
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(120) NOT NULL,
  `Password` varchar(120) NOT NULL DEFAULT '482c811da5d5b4bc6d497ffa98491e38',
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-12-15 04:22:44'),
(3, 'admin1', '482c811da5d5b4bc6d497ffa98491e38', '2020-12-15 04:33:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `Nama_kendaraan` varchar(120) NOT NULL,
  `Merek_kendaraan` int(11) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Bahanbakar` varchar(120) NOT NULL,
  `Tahun_kendaraan` int(6) NOT NULL,
  `transmisi` varchar(50) NOT NULL,
  `gambar_kendaraan` varchar(120) NOT NULL,
  `AirConditioner` int(11) NOT NULL,
  `Multimedia` int(11) NOT NULL,
  `Harga_perhari` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `Nama_kendaraan`, `Merek_kendaraan`, `Deskripsi`, `Bahanbakar`, `Tahun_kendaraan`, `transmisi`, `gambar_kendaraan`, `AirConditioner`, `Multimedia`, `Harga_perhari`, `status`, `RegDate`, `UpdationDate`) VALUES
(1, 'Agya', 1, 'ini deskripsi', 'ini deskripsi', 2018, 'MANUAL', '5ecf1d864a962.jpg', 1, 1, 120000, 1, '2020-12-15 08:57:42', '2020-12-23 23:29:28'),
(2, 'Camaro', 4, 'ini deskripsi', 'PERTAMAX', 2020, 'AUTO', '2019_Chevrolet_Camaro_2SS_6.2L_front_3.16.19.jpg', 1, 1, 1000000, 1, '2020-12-16 01:40:12', '2020-12-24 04:47:52'),
(3, 'Ayla', 5, 'Daihatsu Ayla siap menemani keseruan hari-harimu.', 'PERTALITE', 2019, 'MANUAL', 'Daihatsu-Ayla-01.jpg', 1, 1, 250000, 1, '2020-12-16 06:54:14', '2020-12-16 07:03:04'),
(4, 'All New Ertiga', 6, 'Rasakan pengalaman menyenangkan bersama orang-orang tercinta\r\ndengan kendaraan yang mampu memberikan kenyamanan,\r\nperforma irit dan bertenaga, serta kebanggaan memilikinya.', 'PERTAMAX', 2020, 'AUTO', 'all-new-ertiga-thumb2.jpg', 1, 1, 207000, 1, '2020-12-21 03:11:05', NULL),
(5, 'Avanza', 1, 'ini deskripsi', 'PERTAMAX', 2020, 'AUTO', 'wp6720264.jpg', 1, 1, 544000, 1, '2020-12-21 03:16:16', NULL),
(6, 'Corolla Altis', 1, 'ini deskripsi', 'PERTALITE', 2018, 'AUTO', '3785707459.jpg', 1, 1, 486000, 1, '2020-12-21 03:19:21', NULL),
(7, 'Camry', 1, 'ini deskripsi', 'PERTAMAX', 2020, 'AUTO', '2021-toyota-camry-hybrid-xle-mmp-1-1603215410.png', 1, 1, 641900, 1, '2020-12-21 03:23:02', NULL),
(8, 'Alphard', 1, 'Toyota Alphard adalah mobil MPV premium terbaik untuk kalangan menengah keatas dengan design dan kenyamanan mumpuni.', 'PERTAMAX', 2018, 'AUTO', 'Harga-Mobil-Toyota-Alphard-Terbaru-Feature-Image-1024x576.jpg', 1, 1, 1041000, 1, '2020-12-24 04:34:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `id` int(11) NOT NULL,
  `NamaMerek` varchar(120) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merek`
--

INSERT INTO `merek` (`id`, `NamaMerek`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Toyota', '2020-12-14 04:13:39', NULL),
(2, 'Honda', '2020-12-14 04:13:59', '2020-12-14 04:22:13'),
(4, 'Chevrolet', '2020-12-16 01:37:38', NULL),
(5, 'Daihatsu', '2020-12-16 06:52:24', '2020-12-16 07:03:20'),
(6, 'Suzuki', '2020-12-21 03:08:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `userEmail` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_transaksi` int(11) NOT NULL,
  `pesan` varchar(120) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `userEmail`, `id_kendaraan`, `tanggal_pemesanan`, `tanggal_kembali`, `status_transaksi`, `pesan`, `PostingDate`) VALUES
(1, 1, 4, '2020-12-15', '2020-12-24', 0, 'pesen ayam satu', '2020-12-29 05:17:47'),
(2, 1, 2, '2020-12-29', '2021-01-19', 1, 'buk ayamnya ada?', '2020-12-29 06:08:53'),
(3, 1, 3, '2020-12-31', '2021-01-27', 0, 'kukuruyuk', '2020-12-29 06:16:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `NamaLengkap` varchar(120) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `no_telepon` varchar(30) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `NamaLengkap`, `Email`, `Password`, `no_telepon`, `no_ktp`, `alamat`, `RegDate`, `UpdationDate`) VALUES
(1, 'Rahmat Muflih Arifin', 'muflih@example.com', '21232f297a57a5a743894a0e4a801fc3', '14045', '578787872372632737', 'jl.jalan', '2020-12-29 01:39:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `merek`
--
ALTER TABLE `merek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
