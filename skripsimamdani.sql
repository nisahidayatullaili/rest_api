-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2018 pada 14.55
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsimamdani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabelsuhu`
--

CREATE TABLE `tabelsuhu` (
  `id_suhu` int(11) NOT NULL,
  `suhu` varchar(10) NOT NULL,
  `kelembapan` varchar(10) NOT NULL,
  `durasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabelsuhu`
--

INSERT INTO `tabelsuhu` (`id_suhu`, `suhu`, `kelembapan`, `durasi`) VALUES
(89, '33.0', '36.0', '25'),
(90, '33.0', '35.0', '25'),
(91, '32.0', '39.0', '24'),
(92, '30.0', '42.0', '19'),
(93, '29.0', '48.0', '15'),
(94, '29.0', '48.0', '15'),
(95, '29.0', '50.0', '14'),
(96, '28.0', '50.0', '14'),
(97, '28.0', '53.0', '14'),
(98, '27.0', '56.0', '12'),
(99, '26.0', '63.0', '11'),
(100, '25.0', '63.0', '12'),
(101, '24.0', '67.0', '10'),
(102, '24.0', '67.0', '10'),
(103, '24.0', '67.0', '10'),
(104, '24.0', '67.0', '10'),
(105, '23.0', '69.0', '8'),
(106, '23.0', '71.0', '7'),
(107, '23.0', '71.0', '7'),
(108, '23.0', '75.0', '3'),
(109, '23.0', '72.0', '6'),
(110, '22.0', '73.0', '5'),
(111, '23.0', '72.0', '6'),
(112, '22.0', '75.0', '3'),
(113, '22.0', '75.0', '3'),
(114, '22.0', '76.0', '3'),
(115, '22.0', '77.0', '2'),
(116, '22.0', '79.0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabeltanggal`
--

CREATE TABLE `tabeltanggal` (
  `waktu` datetime NOT NULL,
  `isi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabeltanggal`
--

INSERT INTO `tabeltanggal` (`waktu`, `isi`) VALUES
('2018-08-14 15:00:00', '10'),
('2018-08-14 15:15:00', '8');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabelsuhu`
--
ALTER TABLE `tabelsuhu`
  ADD PRIMARY KEY (`id_suhu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabelsuhu`
--
ALTER TABLE `tabelsuhu`
  MODIFY `id_suhu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
