-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 02:34 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idfoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`nama`, `email`, `password`, `idfoto`) VALUES
('Zero Two', 'zerotwo', '$2y$10$BMGIl.ttBHeWxq/CdEhdVu4RtaB9Cvx0UNPp3Px6eOjIjwt.0zWTq', 'adminpic/desho_1528806773.png'),
('desho', 'desho', '$2y$10$FjNnZJz9VKf5ZWrjUNkpq.UhlbeeGZjIFdedSDWwxUNXE.UCbvrKC', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_imagepost`
--

CREATE TABLE `tb_imagepost` (
  `idallimagepost` varchar(255) NOT NULL,
  `imagename` mediumtext NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `idkomenpost` varchar(255) NOT NULL,
  `namaakun` varchar(255) NOT NULL,
  `isikomentar` mediumtext NOT NULL,
  `waktukomentar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idreply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `idpost` varchar(255) NOT NULL,
  `titlepost` varchar(255) NOT NULL,
  `writter` varchar(255) NOT NULL,
  `waktupost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isipost` longtext NOT NULL,
  `tags` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `idimagepost` varchar(255) NOT NULL,
  `read_time` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_reply`
--

CREATE TABLE `tb_reply` (
  `idcomment` varchar(255) NOT NULL,
  `namaakun` varchar(255) NOT NULL,
  `isikomentar` varchar(255) NOT NULL,
  `waktureply` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
