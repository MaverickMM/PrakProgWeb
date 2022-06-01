-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 03:18 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gofit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `nama`, `password`) VALUES
(1, 'bangtoyib', 'Raden Toyib', 'bangtoyib#12'),
(2, 'Zangbeto', 'Zangbeto', 'adminlogin12'),
(3, 'maverick', 'maverick mikolas', 'adminlogin12'),
(4, 'Michelle', 'Michelle Shannen', 'adminlogin12'),
(5, 'mrblack', 'Leviathan Abraham Orient', 'adminlogin12');

-- --------------------------------------------------------

--
-- Table structure for table `detailpelatih`
--

CREATE TABLE `detailpelatih` (
  `idPelatih` int(11) NOT NULL,
  `idVideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detailperalatan`
--

CREATE TABLE `detailperalatan` (
  `idPeralatan` int(11) NOT NULL,
  `idVideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ketegori`
--

CREATE TABLE `ketegori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(50) NOT NULL,
  `deskripsiKategori` longtext NOT NULL,
  `imgKategori` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ketegori`
--

INSERT INTO `ketegori` (`idKategori`, `namaKategori`, `deskripsiKategori`, `imgKategori`) VALUES
(1, 'Yoga', 'Yoga adalah sebuah aktivitas fisik yang melibatkan meditasi dengan teknik peregangan, pernapasan, keseimbangan, dan kelenturan tubuh untuk mencapai keselarasan dan harmoni antara emosi, jiwa, mental, spiritualitas, dan tubuh Anda.Rutin beryoga akan mengasah fokus mental Anda dan membuang racun keluar dari dalam tubuh. Anda juga akan meningkatkan fleksibilitas tubuh, yang tidak hanya bermanfaat untuk kesiapan fisik sebelum berolahraga tapi juga mencegah cedera.', 'kategori/HIIT.png'),
(2, 'Cardio', 'Cardio didefinisikan sebagai semua jenis latihan yang meningkatkan detak jantung anda dan mempertahankannya untuk jangka waktu yang lama. Sistem pernapasan anda akan mulai bekerja lebih keras saat anda mulai bernapas lebih cepat dan lebih dalam. Pembuluh darah anda akan melebar untuk membawa lebih banyak oksigen ke otot anda, dan tubuh anda akan melepaskan obat penghilang rasa sakit alami (endorfin). Manfaat fisik dan mental dari jenis latihan ini antara lain adalah menurutkan berat badan kita, menangkal penyakit jantung, meningkatkan suasana hati, dan hidup panjang.', 'kategori/CARDIO.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelatih`
--

CREATE TABLE `pelatih` (
  `idPelatih` int(11) NOT NULL,
  `namaPelatih` varchar(50) NOT NULL,
  `imgPelatih` varchar(150) NOT NULL,
  `instagramPelatih` varchar(50) DEFAULT NULL,
  `twitterPelatih` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelatih`
--

INSERT INTO `pelatih` (`idPelatih`, `namaPelatih`, `imgPelatih`, `instagramPelatih`, `twitterPelatih`) VALUES
(1, 'maddielymburner', 'foto pelatih/Pelatih 1.jpg', 'https://www.instagram.com/maddielymburner/', 'https://twitter.com/maddielymburner?lang=en'),
(2, 'Bujang Lapuk Asoi', 'foto pelatih/Pelatih 3.jpeg', 'https://www.instagram.com/thv/?hl=en', NULL),
(3, 'Donnie Yen', 'foto pelatih/Pelatih 2.jpg', NULL, NULL),
(4, 'Bae Suzy', 'foto pelatih/Pelatih 4.jpg', 'https://www.instagram.com/skuukzky/?hl=en', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `idPeralatan` int(11) NOT NULL,
  `namaPeralatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `idVideo` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `namaVideo` varchar(200) NOT NULL,
  `durasiVideo` varchar(20) NOT NULL,
  `kesulitan` enum('Beginner','Intermediate','Advanced') NOT NULL,
  `linkVideo` longtext NOT NULL,
  `deskripsiVideo` longtext NOT NULL,
  `jumlahViews` varchar(50) DEFAULT NULL,
  `videoImg` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`idVideo`, `idAdmin`, `idKategori`, `namaVideo`, `durasiVideo`, `kesulitan`, `linkVideo`, `deskripsiVideo`, `jumlahViews`, `videoImg`) VALUES
(1, 1, 2, '15 MIN BEGINNER CARDIO Workout (At Home No Equipment)', '17:38', 'Beginner', 'https://www.youtube.com/embed/8NnQs3EtoqU', 'Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !\r\n\r\nKalian bisa ikuti saya di:\r\nInstagram : @madfit.ig\r\nTwitter: @maddielymburner\r\nFacebook: facebook.com/madfit.ig', '4.507.210', 'video images/Cardio1.jpg'),
(2, 1, 1, 'Neck Deep - December', '03:51', 'Beginner', 'https://www.youtube.com/embed/HpYdA-06jTc', 'saya sudah capekkk', '10.507.210', 'video images/w644.jfif'),
(3, 1, 1, '20 min MORNING YOGA (Full Body Flow/Stretch for Beginners)', '24:22', 'Intermediate', 'https://www.youtube.com/embed/vJMbsWrGMVA', 'A 20 min full body stretch to wake up and give yourself and energy boost in the morning! Perfect practice for beginners.\r\n⭐️SHOP MY COOKBOOKS!: https://goo.gl/XHwUJg ⭐️\r\n\r\n⭐️DO THIS WARM UP FIRST: http://bit.ly/2riv8T6\r\n⭐️DO THIS COOL DOWN AFTER: http://bit.ly/2YO55PP\r\n\r\n👉🏼SUBSCRIBE TO MY MAIN CHANNEL (what i eat, recipes, vlogs): https://goo.gl/WTpDQk\r\n\r\n📷 GEAR I USE: \r\n👉🏼THE MAT I USE (Exercise 6X4): http://gorillamats.com?aff=19  (MADFIT10 for 10% off)\r\nCAMERA: https://goo.gl/rVQzXd\r\n42.5mm LENS: https://goo.gl/oLRc2u\r\nTRIPOD: https://goo.gl/ihp5br\r\nMICROPHONE: https://goo.gl/fPzkRN\r\nGOPRO: https://goo.gl/D6eMwL\r\n\r\n✘ I N S T A G R A M: @madfit.ig\r\n✘ T W I T T E R: @maddielymburner\r\n✘ F A C E B O O K: facebook.com/madfit.ig\r\n✉ C O N T A C T (business inquiries): madfit95@gmail.com', '5.117.510', 'video images/YOGA2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `detailpelatih`
--
ALTER TABLE `detailpelatih`
  ADD PRIMARY KEY (`idPelatih`,`idVideo`),
  ADD KEY `idVideo` (`idVideo`);

--
-- Indexes for table `detailperalatan`
--
ALTER TABLE `detailperalatan`
  ADD PRIMARY KEY (`idPeralatan`,`idVideo`),
  ADD KEY `idVideo` (`idVideo`);

--
-- Indexes for table `ketegori`
--
ALTER TABLE `ketegori`
  ADD PRIMARY KEY (`idKategori`),
  ADD UNIQUE KEY `namaKategori` (`namaKategori`);

--
-- Indexes for table `pelatih`
--
ALTER TABLE `pelatih`
  ADD PRIMARY KEY (`idPelatih`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`idPeralatan`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`idVideo`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idKategori` (`idKategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ketegori`
--
ALTER TABLE `ketegori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelatih`
--
ALTER TABLE `pelatih`
  MODIFY `idPelatih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `idPeralatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpelatih`
--
ALTER TABLE `detailpelatih`
  ADD CONSTRAINT `detailpelatih_ibfk_1` FOREIGN KEY (`idPelatih`) REFERENCES `pelatih` (`idPelatih`),
  ADD CONSTRAINT `detailpelatih_ibfk_2` FOREIGN KEY (`idVideo`) REFERENCES `video` (`idVideo`);

--
-- Constraints for table `detailperalatan`
--
ALTER TABLE `detailperalatan`
  ADD CONSTRAINT `detailperalatan_ibfk_1` FOREIGN KEY (`idPeralatan`) REFERENCES `peralatan` (`idPeralatan`),
  ADD CONSTRAINT `detailperalatan_ibfk_2` FOREIGN KEY (`idVideo`) REFERENCES `video` (`idVideo`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`),
  ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`idKategori`) REFERENCES `ketegori` (`idKategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
