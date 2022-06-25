-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 01:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifest`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_lombadaftar` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lombadaftar`
--

CREATE TABLE `lombadaftar` (
  `id_lombadaftar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lomba` varchar(32) NOT NULL,
  `bukti` varchar(128) DEFAULT NULL,
  `nim1` varchar(25) NOT NULL,
  `nim2` varchar(25) NOT NULL,
  `nim3` varchar(25) NOT NULL,
  `nim4` varchar(25) NOT NULL,
  `nim5` varchar(25) NOT NULL,
  `ktm1` varchar(128) DEFAULT NULL,
  `ktm2` varchar(128) DEFAULT NULL,
  `ktm3` varchar(128) DEFAULT NULL,
  `ktm4` varchar(128) DEFAULT NULL,
  `ktm5` varchar(128) DEFAULT NULL,
  `sel1` varchar(128) DEFAULT NULL,
  `sel2` varchar(128) DEFAULT NULL,
  `sel3` varchar(128) DEFAULT NULL,
  `sel4` varchar(128) DEFAULT NULL,
  `sel5` varchar(128) DEFAULT NULL,
  `verif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ml`
--

CREATE TABLE `ml` (
  `id_ml` int(11) NOT NULL,
  `id_lombadaftar` int(11) NOT NULL,
  `nama_tim` varchar(128) NOT NULL,
  `nama1` varchar(128) NOT NULL,
  `id1` varchar(25) NOT NULL,
  `server1` varchar(25) NOT NULL,
  `nama2` varchar(128) NOT NULL,
  `id2` varchar(25) NOT NULL,
  `server2` varchar(25) NOT NULL,
  `nama3` varchar(128) NOT NULL,
  `id3` varchar(25) NOT NULL,
  `server3` varchar(25) NOT NULL,
  `nama4` varchar(128) NOT NULL,
  `id4` varchar(25) NOT NULL,
  `server4` varchar(25) NOT NULL,
  `nama5` varchar(128) NOT NULL,
  `id5` varchar(25) NOT NULL,
  `server5` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `id_poster` int(11) NOT NULL,
  `id_lombadaftar` int(11) NOT NULL,
  `ig` varchar(128) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pubgm`
--

CREATE TABLE `pubgm` (
  `id_pubgm` int(11) NOT NULL,
  `id_lombadaftar` int(11) NOT NULL,
  `nama_tim` varchar(128) NOT NULL,
  `nama1` varchar(128) NOT NULL,
  `id1` varchar(25) NOT NULL,
  `nick1` varchar(25) NOT NULL,
  `nama2` varchar(128) NOT NULL,
  `id2` varchar(25) NOT NULL,
  `nick2` varchar(25) NOT NULL,
  `nama3` varchar(128) NOT NULL,
  `id3` varchar(25) NOT NULL,
  `nick3` varchar(25) NOT NULL,
  `nama4` varchar(128) NOT NULL,
  `id4` varchar(25) NOT NULL,
  `nick4` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uiux`
--

CREATE TABLE `uiux` (
  `id_uiux` int(11) NOT NULL,
  `id_lombadaftar` int(11) NOT NULL,
  `nama_tim` varchar(128) NOT NULL,
  `nama1` varchar(128) NOT NULL,
  `nama2` varchar(128) NOT NULL,
  `nama3` varchar(128) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `univ` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `wa` varchar(32) NOT NULL,
  `no_tiket` varchar(45) NOT NULL,
  `referral` varchar(128) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `valorsolo`
--

CREATE TABLE `valorsolo` (
  `id_valorsolo` int(11) NOT NULL,
  `id_lombadaftar` int(11) NOT NULL,
  `id` varchar(25) NOT NULL,
  `nick` varchar(25) NOT NULL,
  `pangkat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `valortim`
--

CREATE TABLE `valortim` (
  `id_valortim` int(11) NOT NULL,
  `id_lombadaftar` int(11) NOT NULL,
  `nama_tim` varchar(128) NOT NULL,
  `nama1` varchar(128) NOT NULL,
  `id1` varchar(25) NOT NULL,
  `nick1` varchar(25) NOT NULL,
  `pangkat1` varchar(25) NOT NULL,
  `nama2` varchar(128) NOT NULL,
  `id2` varchar(25) NOT NULL,
  `nick2` varchar(25) NOT NULL,
  `pangkat2` varchar(25) NOT NULL,
  `nama3` varchar(128) NOT NULL,
  `id3` varchar(25) NOT NULL,
  `nick3` varchar(25) NOT NULL,
  `pangkat3` varchar(25) NOT NULL,
  `nama4` varchar(128) NOT NULL,
  `id4` varchar(25) NOT NULL,
  `nick4` varchar(25) NOT NULL,
  `pangkat4` varchar(25) NOT NULL,
  `nama5` varchar(128) NOT NULL,
  `id5` varchar(25) NOT NULL,
  `nick5` varchar(25) NOT NULL,
  `pangkat5` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_lombadaftar` (`id_lombadaftar`);

--
-- Indexes for table `lombadaftar`
--
ALTER TABLE `lombadaftar`
  ADD PRIMARY KEY (`id_lombadaftar`),
  ADD UNIQUE KEY `id_lombadaftar&lomba` (`id_lombadaftar`,`lomba`) USING BTREE,
  ADD KEY `lombadaftar_ibfk_1` (`id_user`);

--
-- Indexes for table `ml`
--
ALTER TABLE `ml`
  ADD PRIMARY KEY (`id_ml`),
  ADD KEY `id_lombadaftar` (`id_lombadaftar`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id_poster`),
  ADD KEY `id_lombadaftar` (`id_lombadaftar`);

--
-- Indexes for table `pubgm`
--
ALTER TABLE `pubgm`
  ADD PRIMARY KEY (`id_pubgm`),
  ADD KEY `id_lombadaftar` (`id_lombadaftar`);

--
-- Indexes for table `uiux`
--
ALTER TABLE `uiux`
  ADD PRIMARY KEY (`id_uiux`),
  ADD KEY `id_lombadaftar` (`id_lombadaftar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `valorsolo`
--
ALTER TABLE `valorsolo`
  ADD PRIMARY KEY (`id_valorsolo`),
  ADD KEY `id_lombadaftar` (`id_lombadaftar`);

--
-- Indexes for table `valortim`
--
ALTER TABLE `valortim`
  ADD PRIMARY KEY (`id_valortim`),
  ADD KEY `id_lombadaftar` (`id_lombadaftar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lombadaftar`
--
ALTER TABLE `lombadaftar`
  MODIFY `id_lombadaftar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ml`
--
ALTER TABLE `ml`
  MODIFY `id_ml` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `id_poster` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pubgm`
--
ALTER TABLE `pubgm`
  MODIFY `id_pubgm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uiux`
--
ALTER TABLE `uiux`
  MODIFY `id_uiux` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `valorsolo`
--
ALTER TABLE `valorsolo`
  MODIFY `id_valorsolo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `valortim`
--
ALTER TABLE `valortim`
  MODIFY `id_valortim` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_lombadaftar`) REFERENCES `lombadaftar` (`id_lombadaftar`);

--
-- Constraints for table `lombadaftar`
--
ALTER TABLE `lombadaftar`
  ADD CONSTRAINT `lombadaftar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `ml`
--
ALTER TABLE `ml`
  ADD CONSTRAINT `ml_ibfk_1` FOREIGN KEY (`id_lombadaftar`) REFERENCES `lombadaftar` (`id_lombadaftar`);

--
-- Constraints for table `poster`
--
ALTER TABLE `poster`
  ADD CONSTRAINT `poster_ibfk_1` FOREIGN KEY (`id_lombadaftar`) REFERENCES `lombadaftar` (`id_lombadaftar`);

--
-- Constraints for table `pubgm`
--
ALTER TABLE `pubgm`
  ADD CONSTRAINT `pubgm_ibfk_1` FOREIGN KEY (`id_lombadaftar`) REFERENCES `lombadaftar` (`id_lombadaftar`);

--
-- Constraints for table `uiux`
--
ALTER TABLE `uiux`
  ADD CONSTRAINT `uiux_ibfk_1` FOREIGN KEY (`id_lombadaftar`) REFERENCES `lombadaftar` (`id_lombadaftar`);

--
-- Constraints for table `valorsolo`
--
ALTER TABLE `valorsolo`
  ADD CONSTRAINT `valorsolo_ibfk_1` FOREIGN KEY (`id_lombadaftar`) REFERENCES `lombadaftar` (`id_lombadaftar`);

--
-- Constraints for table `valortim`
--
ALTER TABLE `valortim`
  ADD CONSTRAINT `valortim_ibfk_1` FOREIGN KEY (`id_lombadaftar`) REFERENCES `lombadaftar` (`id_lombadaftar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
