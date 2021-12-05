-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2021 at 11:44 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `licitatii`
--

-- --------------------------------------------------------

--
-- Table structure for table `cai`
--

DROP TABLE IF EXISTS `cai`;
CREATE TABLE IF NOT EXISTS `cai` (
  `id_cal` int(4) NOT NULL AUTO_INCREMENT,
  `tip` int(4) NOT NULL,
  `name` varchar(12) NOT NULL,
  `varsta` int(4) NOT NULL,
  `rasa` varchar(12) NOT NULL,
  `poza` varchar(32) NOT NULL,
  PRIMARY KEY (`id_cal`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cai`
--

INSERT INTO `cai` (`id_cal`, `tip`, `name`, `varsta`, `rasa`, `poza`) VALUES
(7, 1, 'Onyx', 5, 'Exmoor', 'Beauty19.jpg'),
(6, 2, 'Napoleon', 8, 'Andaluz', 'andaluz.jpg'),
(5, 1, 'Napoleon', 3, 'Shetland', 'shetlandpony.jpg'),
(8, 2, 'Pippi', 7, 'Mustang', 'beauty24.jpg'),
(9, 2, 'Olimpia', 5, 'Exmoor', 'Beauty2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `licitatie`
--

DROP TABLE IF EXISTS `licitatie`;
CREATE TABLE IF NOT EXISTS `licitatie` (
  `id_licitatie` int(4) NOT NULL AUTO_INCREMENT,
  `id_util` int(4) NOT NULL,
  `data_inceperii` date NOT NULL,
  `timp_alocat` date NOT NULL,
  `pret_curent` int(10) NOT NULL,
  PRIMARY KEY (`id_licitatie`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `licitatie`
--

INSERT INTO `licitatie` (`id_licitatie`, `id_util`, `data_inceperii`, `timp_alocat`, `pret_curent`) VALUES
(8, 2, '2021-05-20', '2021-05-25', 123456),
(7, 2, '2021-05-21', '2021-05-24', 7000),
(6, 2, '2021-05-20', '2021-05-23', 100001),
(5, 2, '2021-05-20', '2021-05-23', 4551),
(9, 4, '2021-05-25', '2021-05-27', 45001);

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

DROP TABLE IF EXISTS `utilizatori`;
CREATE TABLE IF NOT EXISTS `utilizatori` (
  `id_utilizator` int(4) NOT NULL AUTO_INCREMENT,
  `tip` int(11) NOT NULL,
  `nume` varchar(11) NOT NULL,
  `prenume` varchar(11) NOT NULL,
  `parola` varchar(32) NOT NULL,
  `nume_utilizator` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  PRIMARY KEY (`id_utilizator`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`id_utilizator`, `tip`, `nume`, `prenume`, `parola`, `nume_utilizator`, `email`) VALUES
(1, 1, 'Abalasei', 'Raluca', 'cai', 'Raluag', 'raluca.abalasei@ulbsibiu.ro'),
(2, 0, 'Maria', 'Bibi', '827ccb0eea8a706c4c34a16891f84e7b', 'AngelHoya', 'ralu05lasei@gmail.com'),
(3, 0, 'Garry', 'Perry', '8aa21ca12b586724e2c7d2cdbd2c88a7', 'Butter', 'raluca.nuca@yahoo.com'),
(4, 0, 'Garry', 'rrr', 'e10adc3949ba59abbe56e057f20f883e', 'ggg', 'puki_ralu@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `vanzator`
--

DROP TABLE IF EXISTS `vanzator`;
CREATE TABLE IF NOT EXISTS `vanzator` (
  `id_vanzator` int(4) NOT NULL AUTO_INCREMENT,
  `nume` varchar(15) NOT NULL,
  `prenume` varchar(15) NOT NULL,
  `oras` varchar(15) NOT NULL,
  `tara` varchar(15) NOT NULL,
  PRIMARY KEY (`id_vanzator`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vanzator`
--

INSERT INTO `vanzator` (`id_vanzator`, `nume`, `prenume`, `oras`, `tara`) VALUES
(8, 'aaa', 'ccc', 'Suceava', 'Romania'),
(7, 'bbb', 'ccc', 'Constanta', 'Romania'),
(6, ' Baba', ' nam', ' Paris', ' Franta'),
(5, ' Marna', ' rrr', ' Timisoara', 'Romania'),
(9, ' kkk', ' rrr', 'Iasi', 'Romania');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
