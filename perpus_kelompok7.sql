-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2022 pada 18.35
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_kelompok7`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `sinopsi` text NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `penulis`, `tahun`, `judul`, `kota`, `penerbit`, `cover`, `sinopsi`, `stok`) VALUES
(1, 'Sarwidji Widoatmodjo', 2015, 'Pengetahuan pasar modal : untuk konteks Indonesia', 'Jakarta', 'Elex Media Komputindo', 'buku1.jpg', 'Pengetahuan pasar modal menjadi topik yang harus dikuasai mahasiswa Indonesia dan para pelaku bisnis. Paling tidak ada dua balasan yang bisa mendasar statement tersebut. Pertama, kalangan kampus akhir-akhir ini sedang menggalakkan entrepreneurship. Namun, sering kali kewirausahaan ini didapakan pada permasalahan permodalan. Hal yang selalu dijumpai, lulusan perguruan tinggi yang sudah mengusai ilmu entrepreneurship sekalipun tidak berhasil melahirkan usaha sendiri, akibat tidak tersedianya modal. Padahal, pasar modal bisa menyediakan modal yang diperlukan tersebut. Alasan kedua, tiga dekade terakhir dunia sering dilanda krisis ekonomi yang bersumber dari pasar modal. Pasar modal yang niatnya dibentuk untuk menyediakan modal bagi para pengusaha dan menyediakan alternatif penghasilan bagi para pemilik modal, telah menjadi ajang spekulasi, yang selalu berakhir dengan krisis ekonomi.', 2),
(2, 'Andreas Zu', 2016, 'Kitab jomblo', 'Yogyakarta', 'Pohon Cahaya', 'buku2.jpg', 'Kesan pertama setelah buku ini ada di tangan dan saya keluarkan dari plastiknya, covernya ganti. Tampak lebih muda, fresh dan simple. Ada gambar ayam di cover yang sepertinya mengambil ide dari cerita yang ada di dalamnya. Begitu buku saya buka, sial lem nya lepas. Covernya hampir copot, jadi terpaksa bacanya pelan-pelan kayak lagi ngelus tangan mantan.', 1),
(3, 'Sjarif Amin', 2017, 'Bangkarak jurnalistik', 'Bandung', 'Dunia Pustaka Jaya', 'buku3.jpg', 'Membaca tulisan Syarif Amin dalam buku ini, membangunkan kembali rasa penasaran mengenai \"Bayangan Dirinya\" Orang Sunda jaman sekarang. Mohamad Koerdi atau Sjarif Amin adalah salah satu tokoh pers nasional yang lahir di Ciamis pada 10 September 1907. Ia mulai aktif di dunia jurnalistik pada tahun 1929 sebagai wartawan surat kabar berbahasa Sunda, Sipatahoenan. Tahun 1930-an awal, selain aktif di Sipatahoenan, ia juga menjadi penanggung jawab redaktur mingguan Bidjaksana.', 2),
(8, 'Tere Liye', 2014, 'Bumi (Earth)', 'Jakarta', 'Gramedia Pustaka Utama', 'buku4.jpg', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjam`
--

CREATE TABLE `detail_peminjam` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `kuantitas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_peminjam`
--

INSERT INTO `detail_peminjam` (`id_detail_peminjaman`, `id_buku`, `id_peminjam`, `kuantitas`) VALUES
(1, 1, 2, 1),
(2, 2, 1, 1),
(3, 3, 3, 1),
(6, 8, 38, 0),
(7, 8, 40, 1),
(8, 2, 41, 1),
(9, 3, 42, 1),
(10, 3, 43, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengembalian`
--

CREATE TABLE `detail_pengembalian` (
  `id_detail_pengembalian` int(11) NOT NULL,
  `id_pengembalian` int(11) NOT NULL,
  `ada` int(2) NOT NULL,
  `hilang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pengembalian`
--

INSERT INTO `detail_pengembalian` (`id_detail_pengembalian`, `id_pengembalian`, `ada`, `hilang`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 3, 1, 0),
(4, 4, 1, 0),
(6, 6, 1, 0),
(7, 7, 1, 0),
(8, 8, 1, 0),
(9, 9, 1, 0),
(10, 10, 1, 0),
(11, 11, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '7A'),
(2, '8A'),
(3, '9A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_siswa`, `id_petugas`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status`) VALUES
(1, 1, 3, 2, '2022-03-01', '2022-03-15', 'dipinjam'),
(2, 3, 2, 1, '2022-05-01', '2022-05-15', 'dipinjam'),
(3, 2, 1, 3, '2022-07-01', '2022-09-15', 'dipinjam'),
(38, 1, 3, 8, '2022-10-03', '2022-10-10', 'dipinjam'),
(39, 1, 3, 8, '2022-10-03', '2022-10-10', 'dipinjam'),
(40, 1, 3, 8, '2022-10-03', '2022-10-10', 'dikembalikan'),
(41, 3, 3, 2, '2022-09-09', '2022-09-16', 'dikembalikan'),
(42, 1, 3, 3, '2022-10-03', '2022-10-10', 'dikembalikan'),
(43, 1, 3, 3, '2022-10-03', '2022-10-10', 'dikembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `tanggal_pengembalian`, `denda`) VALUES
(1, 1, '2022-03-13', 0),
(2, 3, '2022-05-12', 0),
(3, 2, '2022-09-12', 0),
(4, 1, '2022-03-17', 2000),
(6, 40, '2022-10-10', 0),
(7, 40, '2022-10-10', 0),
(8, 40, '2022-10-10', 0),
(9, 41, '2022-09-10', 6000),
(10, 42, '2022-10-06', 4000),
(11, 43, '2022-10-06', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `nip` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`nip`, `nama`, `jenis_kelamin`, `alamat`, `password`) VALUES
(1, 'Bambang', 'L', 'Malang', 'Bambang'),
(2, 'Endang', 'P', 'Yogyakarta', 'Endang'),
(3, 'Bayu', 'L', 'Medan', 'Bayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `jenis_kelamin`, `alamat`, `id_kelas`) VALUES
(1, 'Rendy', 'L', 'Malang', 1),
(2, 'Silvi', 'P', 'Sidoarjo', 2),
(3, 'Matilda', 'P', 'Tulungagung', 3),
(4, 'Dinda', 'P', 'Malang', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `detail_peminjam`
--
ALTER TABLE `detail_peminjam`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_peminjam` (`id_peminjam`);

--
-- Indeks untuk tabel `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD PRIMARY KEY (`id_detail_pengembalian`),
  ADD KEY `id_pengembalian` (`id_pengembalian`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjam`
--
ALTER TABLE `detail_peminjam`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  MODIFY `id_detail_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_peminjam`
--
ALTER TABLE `detail_peminjam`
  ADD CONSTRAINT `detail_peminjam_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `detail_peminjam_ibfk_2` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Ketidakleluasaan untuk tabel `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD CONSTRAINT `detail_pengembalian_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id_pengembalian`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`nip`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
