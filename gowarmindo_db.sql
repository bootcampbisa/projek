-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Jul 2021 pada 11.51
-- Versi server: 10.2.39-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gowarmindo_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(40) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `deskripsi`, `harga`, `foto`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Indomie (Rebus / Goreng) Tante', 'Indomie rebus atau goreng tanpa telur dengan tambahan sayuran', 5000, 'makanan_1624981579.jpg', 1, '2021-06-29 22:47:41', NULL, NULL),
(2, 'Indomie (Rebus / Goreng) Telur', 'Indomie rebus atau goreng telur dengan tambahan sayuran', 7000, 'makanan_1624981679.jpg', 1, '2021-06-29 22:47:41', NULL, NULL),
(3, 'Nasi Telor', 'Nasi dengan telur dadar dan sayuran sehat', 7000, 'makanan_1624985660.jpg', 1, '2021-06-29 17:56:12', 1, '2021-06-29 18:54:20'),
(6, 'Nasi Sarden', 'Nasi putih dengan ikan sarden', 8000, 'makanan_1624986625.jpg', 1, '2021-06-29 19:10:25', NULL, NULL),
(10, 'Nasi Goreng', 'Nasi digoreng', 9000, 'makanan_1625471562.jpg', 1, '2021-07-05 07:52:42', NULL, NULL),
(11, 'Magelangan', 'Nasi dan Mie digoreng', 10000, 'makanan_1625471665.jpg', 1, '2021-07-05 07:54:25', NULL, NULL),
(12, 'Orak Arik', 'Scrambled eggs is a dish made from eggs stirred, whipped or beaten together while being gently heated.', 8000, 'makanan_1625472342.jpg', 1, '2021-07-05 08:05:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` int(11) NOT NULL,
  `nama_minuman` varchar(40) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `nama_minuman`, `deskripsi`, `harga`, `foto`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Teh (Panas/Dingin)', 'Teh panas atau dingin', 2000, 'minuman_1625470962.jpg', 1, '2021-07-05 07:42:42', NULL, NULL),
(2, 'Susu Jahe', 'Manisnya susu berpadu dengan hangatnya jahe, membuat tubuh anda menjadi lebih hangat dan sehat', 5500, 'minuman_1625471098.jpg', 1, '2021-07-05 07:44:58', NULL, NULL),
(3, 'Es Sirop', 'Es dengan larutan sirup marjan', 5500, 'minuman_1625471798.jpg', 1, '2021-07-05 07:56:38', NULL, NULL),
(4, 'Es Milo', 'Milo favorit kita semua', 6000, 'minuman_1625471826.jpg', 1, '2021-07-05 07:57:06', NULL, NULL),
(5, 'Soda Gembira', 'Segarnya soda dengan manisnya susu', 8500, 'minuman_1625471860.jpg', 1, '2021-07-05 07:57:40', NULL, NULL),
(6, 'Es Jeruk', 'Kesegaran jeruk', 3000, 'minuman_1625471903.jpg', 1, '2021-07-05 07:58:23', NULL, NULL),
(7, 'Air Es', 'Sehat', 1000, 'minuman_1625471929.jpg', 1, '2021-07-05 07:58:49', NULL, NULL),
(8, 'Kopi', 'Morning kopi', 3000, 'minuman_1625472113.jpg', 1, '2021-07-05 08:01:53', NULL, NULL),
(9, 'Nutrisari', 'Segar enak ', 3500, 'minuman_1625472473.png', 1, '2021-07-05 08:07:53', NULL, NULL),
(10, 'STMJ', 'tradisional enak sehat ', 4000, 'minuman_1625472529.jpg', 1, '2021-07-05 08:08:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Pengguna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `deskripsi`, `id_user`, `waktu`) VALUES
(2, 'Makanan di sini terjangkau dan enak , terutama nasi gorengnya , pas dengan lidah , pas juga di kantong', 2, '2021-07-01 19:47:24'),
(4, 'Warmindo ini makanannya enak banget , dekat dengan kampus , dan harganya yang terjangkau, sip lah', 4, '2021-07-05 08:38:55'),
(5, 'Mantap jiwa', 6, '2021-07-05 13:10:49'),
(6, 'enaak', 8, '2021-07-05 15:13:38'),
(7, 'favorit semua orang', 3, '2021-07-09 10:36:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama`, `password`, `role`) VALUES
(1, 'admin@mail.com', 'Admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'abdiltegar12@gmail.com', 'Abdil Tegar Arifin', '4c7420670566ee2315c2292921c55166', 2),
(3, 'denis@mail.com', 'Denise Nataya Wibisono', '202cb962ac59075b964b07152d234b70', 2),
(4, 'fulan@mail.com', 'Muhammad Fulan', '8e293d7f527fca0c084a99b191e2b18a', 2),
(5, 'bima07@gmail.com', 'Bima', '25d55ad283aa400af464c76d713c07ad', 2),
(6, 'admin@mail.com', 'Ffm', '3bbe3eba2936d8925f26124568261e6d', 2),
(7, 'test123@gmail.com', 'testaja', 'e10adc3949ba59abbe56e057f20f883e', 2),
(8, 'abc@mail.com', 'test', '098f6bcd4621d373cade4e832627b4f6', 2),
(9, 'cek2@gmail.com', 'kelasb', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(10, 'a@gmail.com', 'p', '83878c91171338902e0fe0fb97a8c47a', 2),
(11, 'a@gmail.com', 'p', '83878c91171338902e0fe0fb97a8c47a', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`),
  ADD KEY `fk_user_makanan` (`created_by`),
  ADD KEY `fk_user_makanan_edited` (`modified_by`);

--
-- Indeks untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`),
  ADD KEY `fk_user_minuman` (`created_by`),
  ADD KEY `fk_user_minuman_edited` (`modified_by`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `fk_user_testimoni` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_minuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `fk_user_makanan` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_makanan_edited` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD CONSTRAINT `fk_user_minuman` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_minuman_edited` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `fk_user_testimoni` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
