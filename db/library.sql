-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 03:32 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nm_ang_depan` varchar(255) NOT NULL,
  `nm_ang_blakang` varchar(255) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `no_telp_anggota` varchar(255) NOT NULL,
  `alamat_anggota` varchar(255) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nm_ang_depan`, `nm_ang_blakang`, `ttl`, `no_telp_anggota`, `alamat_anggota`, `tgl_daftar`) VALUES
(1945081, 'Iwan', 'Harli Trisambudi', 'Malang, 27-Mei-1998', '085755000398', 'Perumahan Bumi Banjararum Asri C-26', '1945-08-17'),
(2016011, 'Budi Raharjo', 'Pramoedya', 'Surabaya, 18 Mei 1990', '085712301239', 'Makarton City', '2016-01-08'),
(2016012, 'Joko Tingkir', 'Nyengir', 'Permata Bunda, 17-01-2001', '081628310419', 'Jl. Yang Lurus bosquuu', '2016-01-15'),
(2016021, 'Kaka', 'de Rosi', 'Surakarta, 11-12-1989', '085345412345', 'Soekarno Hatta Malang', '2016-02-05'),
(2016022, 'Budi', 'Max', 'Meikarta, 22-Juni-1990', '081231241251', 'Meikarta Raya Rumah Idaman', '2016-02-09'),
(2016031, 'Helpi', 'Salmon', 'Pangkalan Bun, 31-4-2022	', '087654202843', 'Bumi Mondoroko Indah Permata Jingga Araya\r\n', '2016-03-01'),
(2016051, 'Sole Latur', 'Kancil', 'Medan, 18 Agustus 1984', '081273816573', 'Pamekasan Ganur', '2016-05-16'),
(2016052, 'Pomade', 'Mahal', 'Solo, 30 April 1990', '081129519239', 'Perumahan Mondoroko, Malang', '2016-05-22'),
(2017011, 'Lema', 'Taro', 'Sumbawa, 28-April-1990', '085725432397', 'Permata Mata blok C-19, Mataram', '2017-01-14'),
(2017012, 'Rara', 'Depansos', 'Meikarta, 28-April-1998', '076549381231', 'Perumahan Tidar Malang', '2017-01-17'),
(2017031, 'Akik', 'Mahal', 'Tanah Abang, 28-Oktober-1992', '085743298112', 'Tanah Abang, Kav 7 ', '2017-03-19'),
(2017121, 'Tester', 'Id', 'Barcode 28-Mei-1998', '000000000011', 'Barcode kotak koordinat x2, y5', '2017-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `bahasa` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `isbn`, `judul`, `bahasa`, `tahun_terbit`, `pengarang`, `penerbit`, `stok`, `tgl_input`) VALUES
(1, 7, '978-979-29-0471-0', 'Dasar Web Pemrograman Dinamis Menggunakan PHP', 'Indonesia', 2002, 'Abdul Kadir', 'Andi Yogyakarta', 10, '2017-12-08'),
(2, 9, '978-602-03-2476-0', 'Di Hadapan Rahasia', 'Indonesia', 2015, 'Adimas Immanuel', 'Gramedia Pustaka', 1, '2017-12-08'),
(3, 7, '978-979-29-0521-2', 'Microsoft Visual Basic 6.0', 'Indonesia', 2008, 'Madcoms', 'Andi Yogyakarta', 3, '2017-12-08'),
(4, 9, '978-602-2200-34-2', 'Boys Will Be Boys', 'Indonesia', 2002, 'Ryandi Rachman', 'Bukune', 3, '2017-12-08'),
(5, 9, '978-602-8519-93-9', 'Satu Per Tiga', 'Indonesia', 2001, 'Ryandi Rachman', 'Bukune', 2, '2017-12-08'),
(6, 9, '978-602-0324-78-4', 'Hujan', 'Indonesia', 2002, 'Tere Liye', 'Gramedia Pustaka', 7, '2017-12-08'),
(7, 9, '978-979-79-4535-0', 'Konspirasi Alam Semesta', 'Indonesia', 2017, 'Fiersa Besari', 'Mediakita', 12, '2017-12-08'),
(8, 9, '978-602-7888-55-5', 'Inferno - terjemahan', 'Indonesia', 2013, 'Dan Brown', 'Bentang Pustaka', 1, '2017-12-08'),
(9, 9, '978-979-22-1034-2', 'Man of Fire - terjemahan', 'Indonesia', 2004, 'A.J. Quinnel', 'Gramedia Pustaka', 6, '2017-12-08'),
(10, 9, '978-979-22-9469-9', 'Sparkling Cyanide', 'Inggris', 1988, 'Agatha Christie', 'PAN-books', 4, '2017-12-08'),
(11, 7, '978-602-8388-50-4', 'Kamus Akor dan Melodi Gitar', 'Indonesia', 2012, 'Hendro S.D', 'Lingua Kata', 8, '2017-12-08'),
(12, 9, '978-979-18-3468-1', 'My Idiot Brother', 'Indonesia', 2011, 'Agnes Davonar', 'Inandra Published', 7, '2017-12-08'),
(13, 9, '978-602-25-1132-8', 'Sepotong Kata Maaf', 'Indonesia', 2013, 'Yunisa K.D', 'Grasindo', 2, '2017-12-08'),
(14, 1, '978-979-22-1521-1', 'Tubuh Ajaib - terjemahan', 'Indonesia', 2004, 'Dr. Stephen Juan', 'Gramedia Pustaka', 5, '2017-12-08'),
(15, 3, '978-602-8519-93-12', 'Hidup Sederhana', 'Indonesia', 1999, 'Ust. Rando', 'Nurrahman ', 3, '2017-12-13'),
(16, 5, '978-602-8519-93-9', 'IndoChina', 'Indonesia', 1995, 'Rambo Muda', 'Penggalang', 6, '2017-12-19'),
(17, 2, '978-602-8519-93-9', 'Lentera Ibu Pertiwi', '', 0, '', '', 2, '2017-12-19'),
(18, 3, '', 'Saat Dunia Berputar', '', 0, '', '', 1, '2017-12-19'),
(19, 6, '', 'Matematika Menyenangkan', '', 0, '', '', 1, '2017-12-19'),
(20, 2, '', 'Jalan Panjang', '', 0, '', '', 1, '2017-12-19'),
(21, 2, '', 'Lingkup Dunia', '', 0, '', '', 1, '2017-12-22'),
(22, 1, '978-602-8519-93-9', 'tester', '', 0, '', '', 1, '2017-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `kd_donasi` varchar(255) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `judul_donasi` varchar(255) NOT NULL,
  `jml_donasi` int(11) NOT NULL,
  `tgl_donasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`kd_donasi`, `id_anggota`, `judul_donasi`, `jml_donasi`, `tgl_donasi`) VALUES
('d1', 1945081, 'Rindu Ruang', 1, '2017-12-19'),
('d10', 2016012, 'Lingkup Dunia', 1, '2017-12-22'),
('d11', 2016011, 'tester', 1, '2017-12-23'),
('d2', 2016011, 'Lentera Ibu Pertiwi', 2, '2017-12-19'),
('d3', 2016012, 'IndoChina', 1, '2017-12-19'),
('d4', 2016021, 'Saat Dunia Berputar', 1, '2017-12-19'),
('d5', 1945081, 'Hujan', 5, '2017-12-19'),
('d6', 2016022, 'Matematika Menyenangkan', 1, '2017-12-19'),
('d7', 2017121, 'Jalan Panjang', 1, '2017-12-19'),
('d8', 2016012, 'ikkeh', 1, '2017-12-20'),
('d9', 2016031, '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` enum('Karya Umum','Filsafat','Agama','Ilmu Sosial','Bahasa','Ilmu Murni','Ilmu Terapan','Kesenian Hiburan Olahraga','Kesusastraan','Geografi dan Sejarah Umum') NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `lokasi`) VALUES
(1, 'Karya Umum', 'rak1'),
(2, 'Filsafat', 'rak1'),
(3, 'Agama', 'rak2'),
(4, 'Ilmu Sosial', 'rak2'),
(5, 'Bahasa', 'rak3'),
(6, 'Ilmu Murni', 'rak3'),
(7, 'Ilmu Terapan', 'rak4'),
(8, 'Kesenian Hiburan Olahraga', 'rak4'),
(9, 'Kesusastraan', 'rak5'),
(10, 'Geografi dan Sejarah Umum', 'rak5'),
(11, 'Geografi dan Sejarah Umum', 'rak 6');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nm_petugas` varchar(255) NOT NULL,
  `no_telp_petugas` varchar(255) NOT NULL,
  `alamat_petugas` varchar(255) NOT NULL,
  `shift` enum('pagi','siang') NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nm_petugas`, `no_telp_petugas`, `alamat_petugas`, `shift`, `user_level`) VALUES
(0, 'Iwan', '085755000398', 'PERUMAHAN BUMI BANJARARUM ASRI C-26 SINGOSARI-MALANG', 'siang', 1),
(1, 'Agus', '085721741412', 'Jln. Raya Pinggir Kali', 'pagi', 2),
(2, 'Budi', '085721741434', 'Jln. Agrowisata Pandean', 'pagi', 2),
(3, 'Jajang', '085721741434', 'Jln. Agrowisata Pandean', 'siang', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `kd_pinjam` int(255) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(255) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `due_date` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `status` enum('pinjam','kembali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`kd_pinjam`, `id_anggota`, `id_buku`, `id_petugas`, `tgl_pinjam`, `due_date`, `tgl_kembali`, `denda`, `status`) VALUES
(1, 1945081, 1, 0, '2017-12-21', '2018-01-04', '2017-12-21', 0, 'kembali'),
(2, 2016011, 2, 1, '2017-12-21', '2018-01-04', '2017-12-21', 0, 'kembali'),
(3, 2016012, 3, 2, '2017-12-21', '2018-01-04', '2017-12-21', 0, 'kembali'),
(4, 2016022, 2, 1, '2017-12-21', '2018-01-04', '0000-00-00', 0, 'pinjam'),
(5, 2016022, 3, 1, '2017-12-22', '2018-01-05', '0000-00-00', 0, 'pinjam'),
(6, 2016031, 3, 1, '2017-12-22', '2017-12-01', '0000-00-00', 0, 'pinjam'),
(7, 2016012, 2, 1, '2017-12-22', '2018-01-05', '0000-00-00', 0, 'pinjam'),
(8, 2016021, 5, 2, '2017-12-22', '2018-01-05', '0000-00-00', 0, 'pinjam'),
(9, 2016031, 4, 2, '2017-12-22', '2018-01-05', '0000-00-00', 0, 'pinjam'),
(10, 2017121, 6, 0, '2017-12-22', '2018-01-05', '0000-00-00', 0, 'pinjam'),
(11, 2016012, 3, 2, '2017-12-22', '2018-01-05', '0000-00-00', 0, 'pinjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `fk_buku_kategori` (`id_kategori`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`kd_donasi`),
  ADD KEY `fk_anggota_id` (`id_anggota`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`kd_pinjam`),
  ADD KEY `fk_anggota_pinjaman` (`id_anggota`),
  ADD KEY `fk_petugas_pinjaman` (`id_petugas`),
  ADD KEY `fk_buku_pinjaman` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `kd_pinjam` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `fk_anggota_id` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `fk_anggota_pinjaman` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `fk_buku_pinjaman` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `fk_petugas_pinjaman` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
