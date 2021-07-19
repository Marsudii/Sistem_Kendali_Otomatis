-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 09:28 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontrol`
--

CREATE TABLE `tb_kontrol` (
  `id_token` int(11) NOT NULL,
  `nama_rumah` varchar(228) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `token_rumah` varchar(228) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `relay1` varchar(228) NOT NULL,
  `relay2` varchar(228) NOT NULL,
  `relay3` varchar(228) NOT NULL,
  `relay4` varchar(228) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kontrol`
--

INSERT INTO `tb_kontrol` (`id_token`, `nama_rumah`, `alamat_rumah`, `token_rumah`, `telp`, `relay1`, `relay2`, `relay3`, `relay4`) VALUES
(11, 'Kel Marsudi', 'sawangan', 'DF1AF1JMZC4P7H3N', '089615870031', 'https://thingspeak.com/channels/1308763/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15', 'https://thingspeak.com/channels/1308763/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15', 'https://thingspeak.com/channels/1308763/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15', 'https://thingspeak.com/channels/1308763/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15'),
(17, 'kel Suryani', 'jl. Akses UI Mako brimpob', 'TDUQK6CX6J2X0O8D', '3243242534654', 'https://thingspeak.com/channels/1137313/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15', 'https://thingspeak.com/channels/1137313/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15', 'https://thingspeak.com/channels/1137313/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15', 'https://thingspeak.com/channels/1137313/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(228) NOT NULL,
  `email` varchar(228) NOT NULL,
  `username` varchar(228) NOT NULL,
  `password` varchar(228) NOT NULL,
  `token_id` int(11) NOT NULL,
  `role` enum('admin','pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `username`, `password`, `token_id`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin'),
(19, 'suryati', 'suryati178@gmail.com', 'suryati', '19ae68be1cf09f7702ffd2ac8d7889cf', 11, 'pengguna'),
(20, 'suryani', 'suryani111@gmail.com', 'suryani', '5347ed5eac4f941049b2a937582847ff', 17, 'pengguna'),
(21, 'zirly ananda', 'zirly_ananda@gmail.com', 'zirly', '93dd4be8bfe2e25045fb4142d5c566ef', 11, 'pengguna'),
(22, 'andri yansyah', 'andri112@gmail.com', 'andri', '6bd3108684ccc9dfd40b126877f850b0', 17, 'pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kontrol`
--
ALTER TABLE `tb_kontrol`
  ADD PRIMARY KEY (`id_token`) USING BTREE,
  ADD KEY `token_rumah` (`token_rumah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `token_id` (`token_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kontrol`
--
ALTER TABLE `tb_kontrol`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
