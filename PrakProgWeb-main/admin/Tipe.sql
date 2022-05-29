-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 07:51 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `Tipe_Olahraga`
--

CREATE TABLE `Tipe_Olahraga`(
  `id_tipe` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `durasi` TIME NOT NULL,
  `peralatan` varchar(255) NOT NULL,
  `nama_instruktor` varchar(55) NOT NULL,
  `link_youtube` varchar(255) NOT NULL,
  `keterangan`  LONGTEXT NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Tipe_Olahraga`
--


INSERT INTO `Tipe_Olahraga`(`id_tipe`, `id`, `nama`, `durasi`,`peralatan`,`nama_instruktor`,`link_youtube`,`keterangan`) VALUES
(1,7, '15 MIN BEGINNER CARDIO Workout (At Home No Equipment)','1700','box','Muh','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(2,1, 'Cara Cepat Jadi Bulky','1700','Dumbell','Ahmad','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(3,2, 'Fassss','1700','Kripik','Haniif','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(4,3, 'Bukan Cardioi','1700','Tentakel','Dedi','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(5,4, 'Saraheo','1700','xone','Chandra','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(6,5, 'Badan Pasti dapet pacar','1700','Aghanim','Cobaa','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(7,6, 'Mau langsing?','1700','Shard','Testing','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(8,8, 'Sebelah sini sepi','1700','Bar','Nikbikl','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(9,9, 'Room Kosong','1700','Kosa','Malaikat','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(10,10, 'Dijamin Mantap','1700','Kira','Jatuh','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !'),
(11,11, 'Keren kalo kamu bisa ini','1700','Yoshi','Surya','https://www.youtube-nocookie.com/embed/VWj8ZxCxrYk?vq=hd1080&rel=0','Lakukan latihan kardio untuk pemula ini untuk melatih seluruh tubuh kita dengan saya selama 15 menit. HANYA DILAKUKAN DI RUMAH SAJA !. Video ini merupakan rutinitas kardio tanpa henti dengan latihan dasar yang tidak terlalu berat untuk pemula. Tidak ada peralatan yang dibutuhkan, Just Yourself !');



--
-- Indexes for dumped tables
--

--
-- Indexes for table `Tipe_Olahraga`
--
ALTER TABLE `Tipe_Olahraga`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Tipe_Olahraga`
--
ALTER TABLE `Tipe_Olahraga`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
