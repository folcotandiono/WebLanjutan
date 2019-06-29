-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2019 at 03:53 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_lanjutan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_skor`
--

CREATE TABLE `tabel_skor` (
  `id_skor` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `skor` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_skor`
--

INSERT INTO `tabel_skor` (`id_skor`, `nama`, `skor`) VALUES
(1, 'haha', 100),
(2, 'hehe', -300),
(3, 'hehehe', -300),
(4, 'fdas', 0),
(5, 'fadsfdas', -300),
(6, 'fdsafas', -400),
(7, 'erwqasar', 200),
(8, 'hehe', -400),
(9, 'a', 0),
(10, 'toto', -100),
(11, 'asfasa', 100),
(12, 'jfdalfka', 200),
(13, '', -200),
(14, 'fdklala', -400),
(15, 'dlkfasf', -100),
(16, 'flkdaslljkasjowuir', -300),
(17, 'folco', -200),
(18, 'fdjflakfjlka', -200),
(19, 'fdasfas', 200),
(20, 'fdafads', -500),
(21, 'fdasfad', -100),
(22, 'fdafads', -200),
(23, 'fdasfads', 0),
(24, 'fdasfdas', 100),
(25, 'fdafdas', 300),
(26, 'fdfa', 100),
(27, 'fdas', -300),
(28, 'fdafas', -100),
(29, 'fdafas', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_skor`
--
ALTER TABLE `tabel_skor`
  ADD PRIMARY KEY (`id_skor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_skor`
--
ALTER TABLE `tabel_skor`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
