-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2023 pada 02.42
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spprizki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(9, ' PPLG', 'Rekayasa Perangkat Lunak'),
(10, 'KKR', 'Keramik'),
(11, 'TKJT', 'Teknik Komputer & Jaringan'),
(12, 'MM', 'Multimedia'),
(13, 'ANIM', 'Animasi'),
(24, 'TB', 'Menjahit & Design');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(22, 0, '2021092485', '2023-09-12', 'maret', '2023', 6, 150000),
(23, 0, '2021092485', '2023-09-12', 'maret', '2023', 6, 150000),
(24, 0, '0098743521', '2023-09-12', 'maret', '2023', 7, 100000),
(25, 0, '0098743521', '2023-09-12', 'maret', '2023', 7, 100000),
(26, 0, '0098743521', '2023-09-12', 'maret', '2023', 7, 100000),
(27, 0, '0098743521', '2023-09-12', 'maret', '2023', 7, 100000),
(28, 0, '0098765432', '2023-09-12', 'maret', '2023', 7, 50000),
(29, 0, '0098743521', '2023-09-12', 'maret', '2023', 7, -300000),
(30, 0, '2002100914', '2023-09-12', 'maret', '2023', 6, 150000),
(31, 0, '2002100914', '2023-09-12', 'maret', '2023', 6, 50000),
(32, 0, '2002100914', '2023-09-12', 'maret', '2023', 6, 300000),
(33, 0, '2021839466', '2023-09-12', 'maret', '2023', 7, 100000),
(34, 0, '1807401384', '2023-09-13', 'maret', '2023', 6, 50000),
(35, 0, '1807401384', '2023-09-13', 'maret', '2023', 6, 50000),
(36, 0, '1807401384', '2023-09-13', 'maret', '2023', 6, 150000),
(37, 0, '1872618613', '2023-09-19', 'maret', '2023', 6, 250000),
(38, 0, '1807401384', '2023-09-19', 'maret', '2023', 6, 200000),
(39, 0, '1807401384', '2023-09-19', 'maret', '2023', 6, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'samsul', '1234', 'Samsul airf', 'admin'),
(2, 'sahab', '0000', 'Uciha sahab', 'petugas'),
(7, 'Tyberius', '00000', 'ifan', 'siswa'),
(9, 'messi', '10', 'messi', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('0023456721', '007658325', 'asnawi mangkualam ', 11, 'jl.satria ', '085382734445', 7),
('0098743521', '887765243', 'abian', 13, 'jln.bagaskara tengah', '08665332421', 7),
('0098765432', '5588776045', 'aavan', 13, 'jln.cempaka putih atas', '089526141728', 7),
('02109248500', '1234567834', 'evan dimas ', 10, 'jl.surabaya ', '089753427692', 6),
('09183091827', '0129102109', 'Candra Citra Ningtiyas', 9, 'Jl.Ngantin Selatan No.9', '089123767928', 8),
('1234500987', '221155876', 'adira', 24, 'jln.mawar', '08982544221', 6),
('1234509876', '669934215', 'gayatri', 24, 'jln.bunga sepatu', '08999776612', 6),
('1234512987', '343438897', 'lestari ayu', 13, 'jln.ikan paus', '085523918161', 6),
('1234524319', '110098765', 'aneisha', 24, 'jln.bugis timur', '08754262711', 6),
('1234534112', '232323981', 'rendy bagus', 13, 'jln.cempaka putih', '083345679812', 6),
('1234543231', '765332426', 'wulandari', 24, 'jln.sumpil', '0876543344', 7),
('1234543298', '656598732', 'wulan sari', 13, 'jln.melati', '08127654325', 6),
('1234544321', '232329876', 'ameyra', 24, 'jln.bugis', '08543278612', 7),
('1234565438', '474709873', 'septya dwi', 13, 'jln.kamboja', '08992389543', 6),
('1234567132', '987899825', 'ronaldo totvere', 10, 'Jl.Bugis Ngetan kulon', '087123626721', 7),
('1234567345', '987899098', 'ridho maulana ', 10, 'sudi moro', '0834562314567', 6),
('1234567585', '349986087', 'citra ningrum', 13, 'jln.sembojaland', '081123948477', 6),
('1234567866', '987899875', 'dominic toretto', 11, 'jl.kembangmengkerut', '0857077374323', 8),
('1234567876', '187899879', 'rizky ridho', 10, 'Jl.mburing atas', '085382734454', 7),
('1234567891', '987899877', 'rokim samudra ', 10, 'jl. blimbing tengah atas ', '0834562310098', 8),
('1234576587', '656543217', 'grizelle', 24, 'jln.bumiayu', '083421567432', 8),
('1234576883', '778943267', 'daffin', 13, 'jln.kamboja 1', '0856432876', 8),
('1234578654', '887766995', 'kanzia', 24, 'jln.semboja atas', '086342517821', 7),
('1234588765', '987843219', 'kumala', 24, 'jln.bagaskara', '0857675432', 8),
('1234599887', '989876543', 'dewi sari', 24, 'jln.pupus', '085432617513', 6),
('1313124522', '135455324', 'IVAN BAGOS SADEWO', 10, 'Jl.Piranha bawah Gg.7', '0834562791711', 7),
('1604202306', '978990987', 'ahmad fathul', 10, 'Jl.mburing Gg1', '083456231214', 7),
('1807401384', '701401919', 'Syahrul Rouf', 9, 'Jl.Piranha atas N0.114', '089919562773', 6),
('1827268190', '819831981', 'Fauzi Alas', 9, 'Jl.Malang No.7', '089765123674', 8),
('1872618613', '719728178', 'Fergian Ramadhan', 9, 'Jl.Plaosan Blok I-10', '087891726354', 6),
('200210033', '002899845', 'mister ironi', 11, 'jl.bandung', '0863032493675', 8),
('2002100909', '987899867', 'ardhan pramata', 10, 'jl karang ploso atas', '087292457209', 7),
('2002100910', '987899097', 'defina rizky satria', 10, 'jl lapangan garuda', '087123626730', 7),
('2002100914', '198728376', 'Ifan Dwi Yuliananta', 9, 'Jl.Sumberpasir No.16', '086407829817', 6),
('2002176492', '897529878', 'firaun', 12, 'jl.geger gatel', '085382222341', 7),
('2002989683', '980909086', 'beatrix ', 12, 'jl.atlantis', '087154555397', 8),
('2003298727', '873468576', 'Haydar Najih Marzuki', 9, 'Jl.Sumberpasir No.42', '085704983121', 6),
('2021092421', '987899834', 'wahyu maulana fikri', 10, 'jl.  arjosari', '087292457085', 6),
('2021092445', '9878998890', 'pratama arhan', 10, 'jlTlogomas12', '0872924572567', 6),
('2021092460', '280899878', 'jordi amat', 10, 'Jl.Bugis Ngetan no90', '083456231621', 6),
('2021092480', '987899870', 'soffi irawan', 10, 'blimbing tengah ', '085672365', 8),
('2021092485', '981928918', 'Abdul Moni', 9, 'Jl.Meduran Blimbing No.15', '087829817232', 6),
('2021092487', '987899872', 'makky harianto', 10, 'jl.sendokberkarat', '087292457299', 8),
('2021092671', '987899125', 'egi maulana fikri', 10, 'jl.Sumpil aji', '083456231478', 6),
('2021839466', '132432124', 'Enggal Nur Muktafi', 9, 'Jl.Dinoyo Timur No.8', '083784920983', 7),
('20907182323', '987899878', 'Afrizal Maulana', 9, 'Jl.Piranha Atas Gg.7', '087123626734', 7),
('2502600914', '987399878', 'paul walker', 11, 'jl.kecepirit', '083456231235', 8),
('2541567890', '987899878', 'johan pramata alam ', 10, 'jl dinoyo atas bawah', '085707737551', 7),
('6113117354', '894834535', 'Ade Vina ', 10, 'Jl.Mburing No.19', '085382739183', 6),
('7684563972', '987867498', 'jonathan galindo', 12, 'jl.istana merdeka', '086303666345', 6),
('8274859102', '741973436', 'Ananda Tri Wijaya', 11, 'JL.Blimbing timur No.15', '087912235873', 7),
('8928374685', '189318918', 'Adella Galuh', 10, 'Jl.Piranha Atas Gg.90', '087292458923', 8),
('9034567832', '987899471', 'marselino', 10, 'Jl.Ikan tombro barat atas', '083456231736', 7),
('9182938475', '139818318', 'Diky Agustian', 9, 'Jl.Mburing permai No.11', '087292473811', 8),
('9203847857', '921087311', 'Aisyah Maratussholihah', 9, 'Jl.Ikan tombro barat Blok k-21', '085382734445', 8),
('9876534271', '809876567', 'daniel', 13, 'Tlogomas 2', '0899354271', 8),
('9879887878', '686868546', 'Hera Dwi ', 11, 'Jl.Bugis No.01', '087297827364', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(6, 2023, 500000),
(7, 2024, 100000),
(8, 2025, 225000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
