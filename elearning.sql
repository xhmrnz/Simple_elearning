-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 05:59 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_materi`
--

CREATE TABLE `list_materi` (
  `materi_id` int(64) NOT NULL,
  `pelajaran` varchar(128) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `oleh` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_materi`
--

INSERT INTO `list_materi` (`materi_id`, `pelajaran`, `judul`, `deskripsi`, `image`, `oleh`) VALUES
(2, '', 'Tata cara pernafasan hewan yang hidup di dalam air', '', '', 'Pak Ucok'),
(18, '', 'asdsadsa', 'dsadsadsa', 'default.jpg', 'aaaaaaaaaaaaaa'),
(20, '', 'cxzcxzc', 'cxzczx', 'default.jpg', 'cxzcxz'),
(21, '', 'bbbbbbbb', 'cccccccc', 'target_badak.jpg', 'aaaaaaaaaaa'),
(22, '', 'kamfret', 'kdosakdosako', 'bdkculasatu.jpg', 'anjer'),
(23, '', 'gasdadsa', 'sdasada', 'texture_badak.jpg', 'ssssssss'),
(24, '', 'test link index', 'dsadsadsa', 'tahilalats.jpg', 'saaaaaaaaaaa'),
(29, 'male', 'aaaaaaaa', 'vvvvvvvv', '20662.jpg', 'adsasdsa'),
(32, 'Fisika', 'asdsad', 'dsadsa', '20662.jpg', 'aaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@domain.sch.id', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
(2, 'ilham', 'ilhamriana3@gmail.com', 'qwerty', ''),
(3, 'test', 'test@gmail.com', 'siswa', 'siswa'),
(4, 'test2', 'test2@gmail.com', 'siswa2', 'siswa'),
(5, 'encrypt', 'seharusnya@gmail.com', 'Array', 'siswa'),
(6, 'encrypt ke 2', 'testaja@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'siswa'),
(7, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'siswa'),
(8, 'hahaha', 'dsadas', 'be1153015de6ad014261160babd7b673', 'siswa'),
(9, 'last', 'dsaidjsa', 'ae2d0987c13ad85418765740555d5025', 'siswa'),
(10, 'qweqw', 'ewqe', 'e7f5bfd77f339f3adf83464ff16e22fe', 'siswa'),
(11, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'siswa'),
(12, 'dsa', 'dsa', '5f039b4ef0058a1d652f13d612375a5b', 'siswa'),
(13, 'dsa', 'dsa@gmail.com', '5f039b4ef0058a1d652f13d612375a5b', 'siswa'),
(14, 'dsa', 'dsass@gmail.com', '7276708f84a20520c3a19c50dba48521', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_materi`
--
ALTER TABLE `list_materi`
  ADD PRIMARY KEY (`materi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_materi`
--
ALTER TABLE `list_materi`
  MODIFY `materi_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
