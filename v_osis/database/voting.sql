-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2022 pada 05.59
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `last_login`) VALUES
(1, 'Ananda', 'Ananda', '0192023a7bbd73250516f069df18b500', '2022-07-14 10:51:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikut_kandidat`
--

CREATE TABLE `ikut_kandidat` (
  `id_ikut_kandidat` int(11) NOT NULL,
  `id_voting` int(11) DEFAULT NULL,
  `id_kandidat` int(11) DEFAULT NULL,
  `poin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ikut_kandidat`
--

INSERT INTO `ikut_kandidat` (`id_ikut_kandidat`, `id_voting`, `id_kandidat`, `poin`) VALUES
(2, 2, 1, 1),
(3, 2, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikut_voting`
--

CREATE TABLE `ikut_voting` (
  `id_ikut` int(11) NOT NULL,
  `id_voting` int(11) DEFAULT NULL,
  `id_pemilih` int(11) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ikut_voting`
--

INSERT INTO `ikut_voting` (`id_ikut`, `id_voting`, `id_pemilih`, `waktu`) VALUES
(1, 2, 1, '2022-07-14 09:10:48'),
(2, 2, 2, '2022-07-14 09:58:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(50) NOT NULL DEFAULT '0',
  `keterangan` text DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `nama_kandidat`, `keterangan`, `foto`) VALUES
(1, 'Ananda ', 'asasas', 'IMG20210427163612.jpg'),
(3, 'Ananda ', 'asasas', 'IMG202104271636121.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT '0',
  `username` varchar(15) DEFAULT '0',
  `password` varchar(32) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `nama`, `username`, `password`) VALUES
(1, 'Ananda', 'Ananda', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'hallo', 'hallo', '10b43971a8295f3720f38fbcdd9d6ac6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voting`
--

CREATE TABLE `voting` (
  `id_voting` int(11) NOT NULL,
  `nama_voting` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voting`
--

INSERT INTO `voting` (`id_voting`, `nama_voting`) VALUES
(2, 'Ketua Osis');

--
-- Trigger `voting`
--
DELIMITER $$
CREATE TRIGGER `delete_voting` BEFORE DELETE ON `voting` FOR EACH ROW BEGIN
	DELETE FROM ikut_kandidat WHERE ikut_kandidat.id_voting=OLD.id_voting;
	DELETE FROM ikut_voting WHERE ikut_voting.id_voting=OLD.id_voting;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ikut_kandidat`
--
ALTER TABLE `ikut_kandidat`
  ADD PRIMARY KEY (`id_ikut_kandidat`);

--
-- Indeks untuk tabel `ikut_voting`
--
ALTER TABLE `ikut_voting`
  ADD PRIMARY KEY (`id_ikut`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indeks untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indeks untuk tabel `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id_voting`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ikut_kandidat`
--
ALTER TABLE `ikut_kandidat`
  MODIFY `id_ikut_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ikut_voting`
--
ALTER TABLE `ikut_voting`
  MODIFY `id_ikut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `voting`
--
ALTER TABLE `voting`
  MODIFY `id_voting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
