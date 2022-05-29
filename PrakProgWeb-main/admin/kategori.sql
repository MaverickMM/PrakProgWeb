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
-- Table structure for table `data`
--

CREATE TABLE `data`(
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(55) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `kesulitan` enum('Beginner','Intermediate','Advanced') NOT NULL,
  `Tipe_kategori` enum('Workouts','Training') NOT NULL,
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `nama_kategori`, `gambar`,`link`,`kesulitan`,`Tipe_kategori`) VALUES
(1, 'Karate','image/Karate.png','detailvideo/Karate/Karate.html','Beginner','Training'),
(2, 'Tai Chi','image/TaiChi.png','detailvideo/Taichi/Taichi.html','Beginner','Training'),
(3, 'WingChun','image/WingChun.png','detailvideo/Wingchun/Wingchun.html','Intermediate','Training'),
(4, 'Pencak Silat','image/PancakSilat.png','detailvideo/Pencaksilat/Pencaksilat.html','Intermediate','Training'),
(5, 'Muay Thai','image/MuayThai.png','detailvideo/Muaythai/Muaythai.html','Intermediate','Training'),
(6, 'Bridge','image/bridge.png','detailvideo/Bridge/Bridge.html','Beginner','Workouts'),
(7, 'Cardio','image/CARDIO.png','detailvideo/Cardio/Cardio.html','Beginner','Workouts'),
(8, 'HIIT','image/HIIT.png','detailvideo/Hiit/Hiit.html','Advanced','Workouts'),
(9, 'Yoga','image/YOGA.png','detailvideo/Yoga/Yoga.html','Advanced','Workouts'),
(10, 'Aerobic','image/AEROBIC.png','detailvideo/Aerobic/Aerobic.html','Advanced','Workouts'),
(11, 'Chalisthenic','image/CALISTHENIC.png','detailvideo/Chalisthenic/Chalisthenic.html','Advanced','Workouts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
