-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Sep 2023 pada 09.39
-- Versi server: 10.6.15-MariaDB-cll-lve
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pratechb_Ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_ag`
--

CREATE TABLE `hasil_ag` (
  `id_ag` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `jadwal_kuliah` varchar(255) NOT NULL,
  `tipe_prak` varchar(15) NOT NULL,
  `jadwal_prak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil_ag`
--

INSERT INTO `hasil_ag` (`id_ag`, `nim`, `jadwal_kuliah`, `tipe_prak`, `jadwal_prak`) VALUES
(6, 1103194006, '', 'ptk4', ''),
(7, 1103201049, '001100000110000000000000', 'ptk1', '000000110000000010000000'),
(13, 1103204035, '100010000000000000000000', 'ptk1', ''),
(14, 1103202187, '100000000000000000000000', 'ptk1', '000100000001000010000000'),
(15, 1103213015, '001111110111011000000000', 'ptk2', '000000000000000000001100'),
(16, 1103213021, '001111110111011000000000', 'ptk2', '000000000000000100001000'),
(17, 1103213159, '001111110111011000000000', 'ptk2', '000000000000000100001000'),
(18, 12345, '100000001100011000000000', 'ptk2', '000000110000000000000000'),
(19, 123456, '100000000000000000000000', 'ptk1', '000000100100100000000000'),
(20, 1234567, '000000001111111111111111', 'ptk1', '000100110000000000000000'),
(21, 1103210241, '11100000000', 'ptk2', '000001100000000000000000'),
(22, 1103190108, '11100000000', 'ptk2', '000100000010000000000000'),
(23, 1103194050, '11100000000', 'ptk2', '000010010000000000000000'),
(24, 1103194122, '11100000000', 'ptk2', '000100000010000000000000'),
(25, 1103200148, '11100000000', 'ptk2', '000000011000000000000000'),
(26, 1103202020, '111000000000000000000000', 'ptk2', '000010000001000000000000'),
(27, 1103202123, '11100000000', 'ptk2', '000010100000000000000000'),
(28, 1103202131, '110100000000000000000000', 'ptk2', '000010000001000000000000'),
(29, 1103202133, '11100000000', 'ptk2', '000010010000000000000000'),
(30, 1103202153, '11100000000', 'ptk2', '000001001000000000000000'),
(31, 1103202189, '11100000000', 'ptk2', '000000001010000000000000'),
(32, 1103202269, '11100000000', 'ptk2', '000000101000000000000000'),
(33, 1103204081, '11100000000', 'ptk2', '000000100010000000000000'),
(34, 1103204094, '11100000000', 'ptk2', '000000101000000000000000'),
(35, 1103204127, '11100000000', 'ptk2', '000011000000000000000000'),
(36, 1103204206, '11100000000', 'ptk2', '000000010100000000000000'),
(37, 1103210001, '111000000000000000000000', 'ptk2', ''),
(38, 1103210004, '11100000000', 'ptk2', '000001000100000000000000'),
(39, 1103210006, '11100000000', 'ptk2', '000000000110000000000000'),
(40, 1103210008, '11100000000', 'ptk2', '000011000000000000000000'),
(41, 1103210009, '11100000000', 'ptk2', '000001100000000000000000'),
(42, 1103210010, '11100000000', 'ptk2', '000011000000000000000000'),
(43, 1103210016, '11100000000', 'ptk2', '000000001100000000000000'),
(44, 1103210017, '11100000000', 'ptk2', '000001000100000000000000'),
(45, 1103210018, '111000000000000000000000', 'ptk2', ''),
(46, 1103210024, '111000000000000000000000', 'ptk2', ''),
(47, 1103210027, '11100000000', 'ptk2', '000010001000000000000000'),
(48, 1103210031, '11100000000', 'ptk2', '000001001000000000000000'),
(49, 1103210032, '11100000000', 'ptk2', '000000101000000000000000'),
(50, 1103210035, '00100000011', 'ptk2', '110000000000000000000000'),
(51, 1103210037, '00000000111', 'ptk2', '100001000000000000000000'),
(52, 1103210038, '00000000111', 'ptk2', '000010100000000000000000'),
(53, 1103210041, '00000000111', 'ptk2', '001000100000000000000000'),
(54, 1103210042, '00000000111', 'ptk2', '100010000000000000000000'),
(55, 1103210046, '00000000111', 'ptk2', '010010000000000000000000'),
(56, 1103210049, '00000000111', 'ptk2', '001000100000000000000000'),
(57, 1103210050, '00000000111', 'ptk2', '000010100000000000000000'),
(58, 1103210052, '00000000111', 'ptk2', '010010000000000000000000'),
(59, 1103210053, '00000000111', 'ptk2', '100010000000000000000000'),
(60, 1103210056, '00000000111', 'ptk2', '011000000000000000000000'),
(61, 1103210057, '00000000111', 'ptk2', '000010100000000000000000'),
(62, 1103210060, '00000000111', 'ptk2', '000001100000000000000000'),
(63, 1103210061, '00000000111', 'ptk2', '001001000000000000000000'),
(64, 1103210063, '00000000111', 'ptk2', '010001000000000000000000'),
(65, 1103210064, '00000000111', 'ptk2', '001001000000000000000000'),
(66, 1103210066, '00000000111', 'ptk2', '010001000000000000000000'),
(67, 1103210074, '00000000111', 'ptk2', '011000000000000000000000'),
(68, 1103210075, '00000000111', 'ptk2', '011000000000000000000000'),
(69, 1103210076, '00000000111', 'ptk2', '001010000000000000000000'),
(70, 1103210082, '00000000111', 'ptk2', '000001100000000000000000'),
(71, 1103210089, '00000000111', 'ptk2', '010001000000000000000000'),
(72, 1103210094, '00000000111', 'ptk2', '010010000000000000000000'),
(73, 1103210097, '00000000111', 'ptk2', '010010000000000000000000'),
(74, 1103210100, '00000000111', 'ptk2', '100010000000000000000000'),
(75, 1103210101, '00000000111', 'ptk2', '000011000000000000000000'),
(76, 1103210102, '00000000111', 'ptk2', '000011000000000000000000'),
(77, 1103210103, '00000000111', 'ptk2', '011000000000000000000000'),
(78, 1103210108, '00000000111', 'ptk2', '011000000000000000000000'),
(79, 1103210113, '00000000111', 'ptk2', '000100010000000000000000'),
(80, 1103210115, '00001110000', 'ptk2', '100000001000000000000000'),
(81, 1103210125, '00001110000', 'ptk2', '100000000100000000000000'),
(82, 1103210126, '00001110000', 'ptk2', '000000010100000000000000'),
(83, 1103210128, '00001110000', 'ptk2', '000000001010000000000000'),
(84, 1103210129, '00001110000', 'ptk2', '001000000010000000000000'),
(85, 1103210132, '00001110000', 'ptk2', '000000000110000000000000'),
(86, 1103210133, '00001110000', 'ptk2', '101000000000000000000000'),
(87, 1103210134, '00001110000', 'ptk2', '100000001000000000000000'),
(88, 1103210138, '00001110000', 'ptk2', '101000000000000000000000'),
(89, 1103210139, '00001110000', 'ptk2', '110000000000000000000000'),
(90, 1103210140, '00001110000', 'ptk2', '110000000000000000000000'),
(91, 1103210143, '00001110000', 'ptk2', '010000000010000000000000'),
(92, 1103210146, '00001110000', 'ptk2', '000000000110000000000000'),
(93, 1103210147, '00001110000', 'ptk2', '100000000100000000000000'),
(94, 1103210151, '00001110000', 'ptk2', '101000000000000000000000'),
(95, 1103210153, '00001110000', 'ptk2', '100000001000000000000000'),
(96, 1103210154, '00001110000', 'ptk2', '110000000000000000000000'),
(97, 1103210156, '00001110000', 'ptk2', '001000001000000000000000'),
(98, 1103210157, '00001110000', 'ptk2', '100000000100000000000000'),
(99, 1103210158, '01001010000', 'ptk2', '100000000010000000000000'),
(100, 1103210161, '00001110000', 'ptk2', '001000000100000000000000'),
(101, 1103210171, '00001110000', 'ptk2', '010000001000000000000000'),
(102, 1103210172, '00001110000', 'ptk2', '011000000000000000000000'),
(103, 1103210173, '00001110000', 'ptk2', '001000000100000000000000'),
(104, 1103210174, '00001110000', 'ptk2', '010000001000000000000000'),
(105, 1103210176, '00001110000', 'ptk2', '100000001000000000000000'),
(106, 1103210177, '00001110000', 'ptk2', '010000001000000000000000'),
(107, 1103210181, '00001110000', 'ptk2', '010000001000000000000000'),
(108, 1103210182, '00001110000', 'ptk2', '010000001000000000000000'),
(109, 1103210183, '00001110000', 'ptk2', '000000001010000000000000'),
(110, 1103210184, '00001110000', 'ptk2', '000000001010000000000000'),
(111, 1103210185, '00001110000', 'ptk2', '100000001000000000000000'),
(112, 1103210187, '00001110000', 'ptk2', '101000000000000000000000'),
(113, 1103210189, '00001110000', 'ptk2', '100000000010000000000000'),
(114, 1103210190, '00001110000', 'ptk2', '000000001100000000000000'),
(115, 1103210191, '00001110000', 'ptk2', '001000001000000000000000'),
(116, 1103210192, '00001110000', 'ptk2', '000000001010000000000000'),
(117, 1103210193, '00001110000', 'ptk2', '100000000010000000000000'),
(118, 1103210194, '00001110000', 'ptk2', '101000000000000000000000'),
(119, 1103210197, '00001110000', 'ptk2', '101000000000000000000000'),
(120, 1103210200, '11100000000', 'ptk2', '000010000010000000000000'),
(121, 1103210201, '11100000000', 'ptk2', '000011000000000000000000'),
(122, 1103210202, '11100000000', 'ptk2', '000010000010000000000000'),
(123, 1103210203, '11100000000', 'ptk2', '000010000010000000000000'),
(124, 1103210205, '11100000000', 'ptk2', '000011000000000000000000'),
(125, 1103210206, '11100000000', 'ptk2', '000011000000000000000000'),
(126, 1103210207, '111000000000000000000000', 'ptk2', ''),
(127, 1103210208, '111000000000000000000000', 'ptk2', ''),
(128, 1103210209, '11100000000', 'ptk2', ''),
(129, 1103210210, '11100000000', 'ptk2', ''),
(130, 1103210211, '00000000111', 'ptk2', ''),
(131, 1103210216, '00000000111', 'ptk2', ''),
(132, 1103210218, '00000000111', 'ptk2', ''),
(134, 1103210219, '00000000111', 'ptk2', ''),
(135, 1103210220, '00000000111', 'ptk2', ''),
(136, 1103210221, '00000000111', 'ptk2', ''),
(137, 1103210222, '00000000111', 'ptk2', ''),
(138, 1103210223, '000000001110000000000000', 'ptk2', ''),
(139, 1103210226, '000100000110000000000000', 'ptk2', ''),
(140, 1103210227, '00000000111', 'ptk2', '100010000000000000000000'),
(141, 1103202162, '111000000000000000000000', 'ptk2', '000010000001000000000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_ag_asisten`
--

CREATE TABLE `hasil_ag_asisten` (
  `id_ag` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_prak` varchar(100) NOT NULL,
  `jadwal_kuliah` varchar(255) NOT NULL,
  `jadwal_ngajar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil_ag_asisten`
--

INSERT INTO `hasil_ag_asisten` (`id_ag`, `nim`, `nama_prak`, `jadwal_kuliah`, `jadwal_ngajar`) VALUES
(15, 1103194173, 'Pengolahan Sinyal Digital', '000000000001', '101011001100000000000000'),
(16, 1103194031, 'Pengolahan Sinyal Digital', '000100000000', '110001101001000000000000'),
(17, 1103194044, 'Pengolahan Sinyal Digital', '000000000000', '110010101010000000000000'),
(18, 1103194011, 'Pengolahan Sinyal Digital', '000100000000', '110010101100000000000000'),
(19, 1103190112, 'Pengolahan Sinyal Digital', '000001000000', '011010010011000000000000'),
(20, 1103194071, 'Desain Sistem Digital', '000100000000', '011011001010000000000000'),
(21, 1103190111, 'Desain Sistem Digital', '000000100000', '011011001010000000000000'),
(22, 1103194104, 'Desain Sistem Digital', '000100010000', '101011000101000000000000'),
(23, 1103190052, 'Desain Sistem Digital', '000001000010', '100100111100000000000000'),
(24, 1103194006, 'Desain Sistem Digital', '000000110100', '101011000011000000000000'),
(27, 1103204160, 'Pemrograman Berbasis Objek', '100001000100100000000110', ''),
(28, 1103201261, 'Pemrograman Berbasis Objek', '100100000000110000000011', ''),
(29, 1103201247, 'Pemrograman Berbasis Objek', '111000000000000000000110', ''),
(30, 1103202201, 'Pemrograman Berbasis Objek', '110000000110000000000110', ''),
(31, 1103240126, 'Pemrograman Berbasis Objek', '100010001000100010001000', ''),
(32, 1103201243, 'Pemrograman Berbasis Objek', '111100010001000000000000', ''),
(33, 1103201257, 'Pemrograman Berbasis Objek', '110000000000000000001100', ''),
(34, 1103203238, 'Pemrograman Berbasis Objek', '110000000000110011001100', ''),
(35, 1103202211, 'Pemrograman Berbasis Objek', '011001100000000000000000', '001100100110001000111001'),
(36, 1101190350, 'Rangkaian Listrik', '100010001000100010001000', ''),
(37, 1101204418, 'Rangkaian Listrik', '011001100000000000000000', ''),
(38, 1101194068, 'Rangkaian Listrik', '011001100000000000000000', ''),
(39, 1102194109, 'Rangkaian Listrik', '011001100000000000000000', ''),
(40, 1102204392, 'Pemrograman Berbasis Objek', '011001100000000000000000', ''),
(41, 1102194122, 'Rangkaian Listrik', '011001100000000000000000', ''),
(42, 1101194104, 'Rangkaian Listrik', '011001100000000000000000', ''),
(43, 1102192265, 'Rangkaian Listrik', '011001100000000000000000', ''),
(44, 1101204422, 'Rangkaian Listrik', '011001100000000000000000', ''),
(45, 1102202584, 'Rangkaian Listrik', '011001100000000000000000', ''),
(46, 1102204529, 'Rangkaian Listrik', '011001100000000000000000', '000010010010000110010000'),
(47, 12345, 'Pemrograman Berbasis Objek', '100000001100000001100000', '001101100010000110000010'),
(48, 123456, 'Pemrograman Berbasis Objek', '000010000000000000000000', '011000000000000000000110'),
(49, 11, 'Pemrograman Berbasis Objek', '100010001000100010001000', '011000000010010100010000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_mahasiswa`
--

CREATE TABLE `jadwal_mahasiswa` (
  `id_kegiatan` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `shift` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_mahasiswa`
--

INSERT INTO `jadwal_mahasiswa` (`id_kegiatan`, `nim`, `hari`, `shift`) VALUES
(1, 1103190052, 'Senin', '4'),
(2, 1103190111, 'Selasa', '3'),
(3, 1103190112, 'Selasa', '2'),
(4, 1103194044, 'Sabtu', '4'),
(5, 1103194173, 'Kamis', '2'),
(6, 1103194173, 'Kamis', '3'),
(7, 1103194011, 'Senin', '4'),
(8, 1103194071, 'Senin', '4'),
(9, 1103194031, 'Senin', '4'),
(10, 1103194104, 'Senin', '4'),
(11, 1103194104, 'Selasa', '4'),
(12, 1103194104, 'Jumat', '3'),
(13, 1103194104, 'Sabtu', '2'),
(14, 1103194006, 'Selasa', '3'),
(15, 1103194006, 'Selasa', '4'),
(16, 1103194006, 'Rabu', '2'),
(17, 1103190052, 'Senin', '4'),
(18, 11, 'Senin', '1'),
(19, 11, 'Selasa', '1'),
(20, 11, 'Rabu', '1'),
(21, 11, 'Kamis', '1'),
(22, 11, 'Jumat', '1'),
(23, 11, 'Sabtu', '1'),
(24, 1103190052, 'Senin', '1'),
(25, 1103190052, 'Selasa', '1'),
(26, 1103190052, 'Rabu', '1'),
(27, 1103190052, 'Kamis', '1'),
(28, 1103190052, 'Jumat', '1'),
(29, 1103190052, 'Sabtu', '1'),
(30, 1103204160, 'Senin', '1'),
(31, 1103204160, 'Selasa', '2'),
(32, 1103204160, 'Rabu', '2'),
(33, 1103204160, 'Kamis', '1'),
(34, 1103204160, 'Sabtu', '2'),
(35, 1103204160, 'Sabtu', '3'),
(36, 12345, 'Senin', '1'),
(37, 12345, 'Rabu', '1'),
(38, 12345, 'Rabu', '2'),
(39, 12345, 'Kamis', '2'),
(40, 12345, 'Kamis', '3'),
(41, 1103210024, 'Senin', '1'),
(42, 1103210024, 'Senin', '2'),
(43, 1103210024, 'Selasa', '3'),
(44, 1103210024, 'Senin', '1'),
(45, 1103210024, 'Senin', '2'),
(46, 1103210024, 'Senin', '3'),
(47, 1103202020, 'Senin', '1'),
(48, 1103202020, 'Senin', '2'),
(49, 1103202020, 'Senin', '3'),
(50, 1103202131, 'Senin', '1'),
(51, 1103202131, 'Senin', '2'),
(52, 1103202131, 'Senin', '4'),
(53, 1103202162, 'Senin', '1'),
(54, 1103202162, 'Senin', '2'),
(55, 1103202162, 'Senin', '3'),
(56, 1103210001, 'Senin', '1'),
(57, 1103210001, 'Senin', '2'),
(58, 1103210001, 'Senin', '3'),
(59, 1103210001, 'Senin', '1'),
(60, 1103210001, 'Senin', '2'),
(61, 1103210001, 'Senin', '3'),
(62, 1103210018, 'Senin', '1'),
(63, 1103210018, 'Senin', '2'),
(64, 1103210018, 'Senin', '3'),
(65, 1103210018, 'Senin', '1'),
(66, 1103210018, 'Senin', '2'),
(67, 1103210018, 'Selasa', '3'),
(68, 1103210018, 'Senin', '1'),
(69, 1103210018, 'Senin', '2'),
(70, 1103210018, 'Senin', '3'),
(71, 1103210024, 'Senin', '1'),
(72, 1103210024, 'Senin', '2'),
(73, 1103210024, 'Senin', '3'),
(74, 1103210207, 'Senin', '1'),
(75, 1103210207, 'Senin', '2'),
(76, 1103210207, 'Senin', '3'),
(77, 1103210207, 'Senin', '2'),
(78, 1103210207, 'Senin', '3'),
(79, 1103210207, 'Selasa', '1'),
(80, 1103210207, 'Rabu', '2'),
(81, 1103210207, 'Senin', '1'),
(82, 1103210207, 'Senin', '2'),
(83, 1103210207, 'Senin', '3'),
(84, 1103210208, 'Senin', '1'),
(85, 1103210208, 'Senin', '2'),
(86, 1103210208, 'Senin', '3'),
(87, 1103210226, 'Senin', '4'),
(88, 1103210226, 'Rabu', '2'),
(89, 1103210226, 'Rabu', '3'),
(90, 1103210223, 'Rabu', '1'),
(91, 1103210223, 'Rabu', '2'),
(92, 1103210223, 'Rabu', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ngajar`
--

CREATE TABLE `jadwal_ngajar` (
  `id_jadwal` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `id_praktikum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_ngajar`
--

INSERT INTO `jadwal_ngajar` (`id_jadwal`, `nim`, `name`, `hari`, `shift`, `id_praktikum`) VALUES
(1, 11, 'asisten', 'Senin', '3', 5),
(2, 11, 'asisten', 'Selasa', '3', 5),
(3, 11, 'asisten', 'Selasa', '4', 5),
(4, 11, 'asisten', 'Rabu', '4', 5),
(5, 11, 'asisten', 'Kamis', '4', 5),
(6, 11, 'asisten', 'Sabtu', '3', 5),
(7, 11, 'asisten', 'Senin', '3', 5),
(8, 11, 'asisten', 'Senin', '4', 5),
(9, 11, 'asisten', 'Kamis', '4', 5),
(10, 11, 'asisten', 'Jumat', '4', 5),
(11, 11, 'asisten', 'Sabtu', '2', 5),
(12, 11, 'asisten', 'Sabtu', '3', 5),
(13, 11, 'asisten', 'Selasa', '3', 5),
(14, 11, 'asisten', 'Selasa', '4', 5),
(15, 11, 'asisten', 'Rabu', '3', 5),
(16, 11, 'asisten', 'Kamis', '2', 5),
(17, 11, 'asisten', 'Kamis', '4', 5),
(18, 11, 'asisten', 'Jumat', '4', 5),
(19, 11, 'asisten', 'Senin', '2', 5),
(20, 11, 'asisten', 'Senin', '3', 5),
(21, 11, 'asisten', 'Selasa', '2', 5),
(22, 11, 'asisten', 'Selasa', '3', 5),
(23, 11, 'asisten', 'Sabtu', '2', 5),
(24, 11, 'asisten', 'Sabtu', '4', 5),
(25, 11, 'asisten', 'Senin', '2', 5),
(26, 11, 'asisten', 'Senin', '3', 5),
(27, 11, 'asisten', 'Rabu', '3', 5),
(28, 11, 'asisten', 'Kamis', '2', 5),
(29, 11, 'asisten', 'Kamis', '4', 5),
(30, 11, 'asisten', 'Jumat', '4', 5),
(31, 1103190052, 'Taufiq Salman Syabani', 'Senin', '4', 5),
(32, 1103190052, 'Taufiq Salman Syabani', 'Selasa', '2', 5),
(33, 1103190052, 'Taufiq Salman Syabani', 'Rabu', '3', 5),
(34, 1103190052, 'Taufiq Salman Syabani', 'Rabu', '4', 5),
(35, 1103190052, 'Taufiq Salman Syabani', 'Kamis', '2', 5),
(36, 1103190052, 'Taufiq Salman Syabani', 'Kamis', '4', 5),
(37, 1103194173, 'Aura Syafa Aprillia Radim', 'Senin', '1', 5),
(38, 1103194173, 'Aura Syafa Aprillia Radim', 'Senin', '3', 5),
(39, 1103194173, 'Aura Syafa Aprillia Radim', 'Selasa', '1', 5),
(40, 1103194173, 'Aura Syafa Aprillia Radim', 'Selasa', '2', 5),
(41, 1103194173, 'Aura Syafa Aprillia Radim', 'Rabu', '1', 5),
(42, 1103194173, 'Aura Syafa Aprillia Radim', 'Rabu', '3', 5),
(43, 1103194173, 'Aura Syafa Aprillia Radim', 'Senin', '1', 5),
(44, 1103194173, 'Aura Syafa Aprillia Radim', 'Senin', '3', 5),
(45, 1103194173, 'Aura Syafa Aprillia Radim', 'Selasa', '2', 5),
(46, 1103194173, 'Aura Syafa Aprillia Radim', 'Selasa', '4', 5),
(47, 1103194173, 'Aura Syafa Aprillia Radim', 'Rabu', '1', 5),
(48, 1103194173, 'Aura Syafa Aprillia Radim', 'Rabu', '3', 5),
(49, 1103194173, 'Aura Syafa Aprillia Radim', 'Senin', '1', 5),
(50, 1103194173, 'Aura Syafa Aprillia Radim', 'Senin', '3', 5),
(51, 1103194173, 'Aura Syafa Aprillia Radim', 'Selasa', '1', 5),
(52, 1103194173, 'Aura Syafa Aprillia Radim', 'Selasa', '2', 5),
(53, 1103194173, 'Aura Syafa Aprillia Radim', 'Rabu', '1', 5),
(54, 1103194173, 'Aura Syafa Aprillia Radim', 'Rabu', '2', 5),
(55, 1103194031, 'Muhammad Rakan Fawwaz', 'Senin', '1', 5),
(56, 1103194031, 'Muhammad Rakan Fawwaz', 'Senin', '2', 5),
(57, 1103194031, 'Muhammad Rakan Fawwaz', 'Selasa', '2', 5),
(58, 1103194031, 'Muhammad Rakan Fawwaz', 'Selasa', '3', 5),
(59, 1103194031, 'Muhammad Rakan Fawwaz', 'Rabu', '1', 5),
(60, 1103194031, 'Muhammad Rakan Fawwaz', 'Rabu', '4', 5),
(61, 1103194044, 'Eka Oktaviani', 'Senin', '1', 5),
(62, 1103194044, 'Eka Oktaviani', 'Senin', '2', 5),
(63, 1103194044, 'Eka Oktaviani', 'Selasa', '1', 5),
(64, 1103194044, 'Eka Oktaviani', 'Selasa', '3', 5),
(65, 1103194044, 'Eka Oktaviani', 'Rabu', '1', 5),
(66, 1103194044, 'Eka Oktaviani', 'Rabu', '3', 5),
(67, 1103194011, 'Alfaridzi Muhammad Ariefani', 'Senin', '2', 5),
(68, 1103194011, 'Alfaridzi Muhammad Ariefani', 'Selasa', '1', 5),
(69, 1103194011, 'Alfaridzi Muhammad Ariefani', 'Senin', '1', 5),
(70, 1103194011, 'Alfaridzi Muhammad Ariefani', 'Selasa', '3', 5),
(71, 1103194011, 'Alfaridzi Muhammad Ariefani', 'Rabu', '1', 5),
(72, 1103194011, 'Alfaridzi Muhammad Ariefani', 'Rabu', '2', 5),
(73, 1103190112, 'Asep Irawan', 'Rabu', '4', 5),
(74, 1103190112, 'Asep Irawan', 'Senin', '2', 5),
(75, 1103190112, 'Asep Irawan', 'Senin', '3', 5),
(76, 1103190112, 'Asep Irawan', 'Selasa', '1', 5),
(77, 1103190112, 'Asep Irawan', 'Selasa', '4', 5),
(78, 1103190112, 'Asep Irawan', 'Rabu', '3', 5),
(79, 1103194071, 'Agung Sulaksono Ramdhani', 'Senin', '2', 4),
(80, 1103194071, 'Agung Sulaksono Ramdhani', 'Senin', '3', 4),
(81, 1103194071, 'Agung Sulaksono Ramdhani', 'Selasa', '1', 4),
(82, 1103194071, 'Agung Sulaksono Ramdhani', 'Selasa', '2', 4),
(83, 1103194071, 'Agung Sulaksono Ramdhani', 'Rabu', '1', 4),
(84, 1103194071, 'Agung Sulaksono Ramdhani', 'Rabu', '3', 4),
(85, 1103190111, 'Alvin Anandra Brilliandy', 'Senin', '2', 4),
(86, 1103190111, 'Alvin Anandra Brilliandy', 'Selasa', '1', 4),
(87, 1103190111, 'Alvin Anandra Brilliandy', 'Selasa', '2', 4),
(88, 1103190111, 'Alvin Anandra Brilliandy', 'Rabu', '1', 4),
(89, 1103190111, 'Alvin Anandra Brilliandy', 'Senin', '3', 4),
(90, 1103190111, 'Alvin Anandra Brilliandy', 'Rabu', '3', 4),
(91, 1103194104, 'Wahyu Mubarak Sukiman', 'Senin', '1', 4),
(92, 1103194104, 'Wahyu Mubarak Sukiman', 'Senin', '3', 4),
(93, 1103194104, 'Wahyu Mubarak Sukiman', 'Selasa', '1', 4),
(94, 1103194104, 'Wahyu Mubarak Sukiman', 'Selasa', '2', 4),
(95, 1103194104, 'Wahyu Mubarak Sukiman', 'Rabu', '2', 4),
(96, 1103194104, 'Wahyu Mubarak Sukiman', 'Rabu', '4', 4),
(97, 1103194006, 'Tegar Pandji Asmoro', 'Senin', '1', 4),
(98, 1103194006, 'Tegar Pandji Asmoro', 'Senin', '3', 4),
(99, 1103194006, 'Tegar Pandji Asmoro', 'Selasa', '1', 4),
(100, 1103194006, 'Tegar Pandji Asmoro', 'Selasa', '2', 4),
(101, 1103194006, 'Tegar Pandji Asmoro', 'Rabu', '3', 4),
(102, 1103194006, 'Tegar Pandji Asmoro', 'Rabu', '4', 4),
(103, 1103190052, 'Taufiq Salman Syabani', 'Senin', '1', 4),
(104, 1103190052, 'Taufiq Salman Syabani', 'Selasa', '3', 4),
(105, 1103190052, 'Taufiq Salman Syabani', 'Selasa', '4', 4),
(106, 1103190052, 'Taufiq Salman Syabani', 'Rabu', '1', 4),
(107, 1103190052, 'Taufiq Salman Syabani', 'Rabu', '2', 4),
(108, 1103190052, 'Taufiq Salman Syabani', 'Senin', '4', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_prak`
--

CREATE TABLE `jadwal_prak` (
  `id_jadwal` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `id_praktikum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_prak`
--

INSERT INTO `jadwal_prak` (`id_jadwal`, `nim`, `name`, `hari`, `shift`, `id_praktikum`) VALUES
(97, 1103202187, 'Fazri Ardhana', 'Selasa', '1', 1),
(98, 1103202187, 'Fazri Ardhana', 'Kamis', '1', 2),
(99, 1103202187, 'Fazri Ardhana', 'Jumat', '2', 3),
(103, 1103213021, 'Diaz Abdi', 'Jumat', '1', 4),
(104, 1103213021, 'Diaz Abdi', 'Sabtu', '2', 5),
(105, 1103213159, 'Andifa Rifqi Aquila ', 'Jumat', '1', 4),
(106, 1103213159, 'Andifa Rifqi Aquila ', 'Sabtu', '2', 5),
(107, 1103213015, 'Muhammad Faishal Abdurrahman', 'Sabtu', '2', 4),
(108, 1103213015, 'Muhammad Faishal Abdurrahman', 'Sabtu', '3', 5),
(175, 12345, 'User Praktikan', 'Senin', '3', 1),
(176, 12345, 'User Praktikan', 'Kamis', '1', 2),
(177, 12345, 'User Praktikan', 'Sabtu', '1', 3),
(178, 1234567, 'coba', 'Senin', '4', 1),
(179, 1234567, 'coba', 'Selasa', '3', 2),
(180, 1234567, 'coba', 'Selasa', '4', 3),
(181, 12345, 'User Praktikan', 'Selasa', '3', 5),
(182, 12345, 'User Praktikan', 'Selasa', '4', 4),
(183, 1103210241, 'ANDREANSYAH AKMAL CHAERUDDIN', 'Selasa', '2', 4),
(184, 1103210241, 'ANDREANSYAH AKMAL CHAERUDDIN', 'Selasa', '3', 5),
(185, 1103190108, 'MUHAMAD IBNU FAJAR WIBAWA', 'Senin', '4', 4),
(186, 1103190108, 'MUHAMAD IBNU FAJAR WIBAWA', 'Rabu', '3', 5),
(187, 1103194050, 'ARIQ ADHITYA', 'Selasa', '1', 4),
(188, 1103194050, 'ARIQ ADHITYA', 'Selasa', '4', 5),
(189, 1103210113, 'SYAHRUL REZA ANANDA', 'Senin', '4', 4),
(190, 1103210113, 'SYAHRUL REZA ANANDA', 'Selasa', '4', 5),
(191, 1103194122, 'MUH.NASHAR', 'Senin', '4', 4),
(192, 1103194122, 'MUH.NASHAR', 'Rabu', '3', 5),
(193, 1103200148, 'AHMAD LUTHFI MUHAJIR MUNANDAR', 'Selasa', '4', 4),
(194, 1103200148, 'AHMAD LUTHFI MUHAJIR MUNANDAR', 'Rabu', '1', 5),
(195, 1103210115, 'AUGRYES FARHA SULISTYA NEGARA', 'Senin', '1', 4),
(196, 1103210115, 'AUGRYES FARHA SULISTYA NEGARA', 'Rabu', '1', 5),
(197, 1103210125, 'HAFIZ MUHAMMAD FADHEL', 'Senin', '1', 4),
(198, 1103210125, 'HAFIZ MUHAMMAD FADHEL', 'Rabu', '2', 5),
(199, 1103202123, 'RAIHAN ATHA', 'Selasa', '1', 4),
(200, 1103202123, 'RAIHAN ATHA', 'Selasa', '3', 5),
(201, 1103202133, 'FAHAR NAIL HAKIM', 'Selasa', '1', 4),
(202, 1103202133, 'FAHAR NAIL HAKIM', 'Selasa', '4', 5),
(203, 1103202153, 'MUHAMMAD SADAM ERLANGGA', 'Selasa', '2', 4),
(204, 1103202153, 'MUHAMMAD SADAM ERLANGGA', 'Rabu', '1', 5),
(205, 1103210128, 'MOCHAMAD ARIEF DERMAWAN', 'Rabu', '1', 4),
(206, 1103210128, 'MOCHAMAD ARIEF DERMAWAN', 'Rabu', '3', 5),
(207, 1103202189, 'DAFI RASYADAN DJAUHARI', 'Rabu', '1', 4),
(208, 1103202189, 'DAFI RASYADAN DJAUHARI', 'Rabu', '3', 5),
(209, 1103202269, 'MUHAMMAD LUTHFAN HASNANTO', 'Selasa', '3', 4),
(210, 1103202269, 'MUHAMMAD LUTHFAN HASNANTO', 'Rabu', '1', 5),
(211, 1103204081, 'RAFEAL SEPRIADI', 'Selasa', '3', 4),
(212, 1103204081, 'RAFEAL SEPRIADI', 'Rabu', '3', 5),
(213, 1103204094, 'IBNUTSANY TEGAR BHAGASKORO', 'Selasa', '3', 4),
(214, 1103204094, 'IBNUTSANY TEGAR BHAGASKORO', 'Rabu', '1', 5),
(215, 1103210129, 'FARDY ALIF MAHARDHIKA YUSUF', 'Senin', '3', 4),
(216, 1103210129, 'FARDY ALIF MAHARDHIKA YUSUF', 'Rabu', '3', 5),
(217, 1103204127, 'RASYID ABDI GANTORO', 'Selasa', '1', 4),
(218, 1103204127, 'RASYID ABDI GANTORO', 'Selasa', '2', 5),
(219, 1103204206, 'ENRICO ANDRESON PATTIPEILOHY', 'Selasa', '4', 4),
(220, 1103204206, 'ENRICO ANDRESON PATTIPEILOHY', 'Rabu', '2', 5),
(221, 1103210004, 'MARCELLENO YOGA', 'Selasa', '2', 4),
(222, 1103210004, 'MARCELLENO YOGA', 'Rabu', '2', 5),
(223, 1103210132, 'MUHAMMAD JIBRAN HADY', 'Rabu', '2', 4),
(224, 1103210132, 'MUHAMMAD JIBRAN HADY', 'Rabu', '3', 5),
(225, 1103210006, 'GHIFARI SEPTANDI HERMANSYAH', 'Rabu', '2', 4),
(226, 1103210006, 'GHIFARI SEPTANDI HERMANSYAH', 'Rabu', '3', 5),
(227, 1103210133, 'M. ANDRIAN TOPAZ FIRDAUS', 'Senin', '1', 5),
(228, 1103210133, 'M. ANDRIAN TOPAZ FIRDAUS', 'Senin', '3', 4),
(229, 1103210008, 'MUHAMMAD THORIQ ZAM', 'Selasa', '1', 5),
(230, 1103210008, 'MUHAMMAD THORIQ ZAM', 'Selasa', '2', 4),
(231, 1103210009, 'MUHAMMAD FADHIL NARARYA BASUKI', 'Selasa', '2', 4),
(232, 1103210009, 'MUHAMMAD FADHIL NARARYA BASUKI', 'Selasa', '3', 5),
(233, 1103210010, 'DAVIN MAHESA PRASETYO', 'Selasa', '1', 4),
(234, 1103210010, 'DAVIN MAHESA PRASETYO', 'Selasa', '2', 5),
(235, 1103210134, 'GLEN DERY HAWILANDO SIREGAR', 'Senin', '1', 4),
(236, 1103210134, 'GLEN DERY HAWILANDO SIREGAR', 'Rabu', '1', 5),
(237, 1103210016, 'DIMAS RIZQIE PRATIKTA', 'Rabu', '1', 5),
(238, 1103210016, 'DIMAS RIZQIE PRATIKTA', 'Rabu', '2', 4),
(239, 1103210017, 'AXEL DAVID', 'Selasa', '2', 4),
(240, 1103210017, 'AXEL DAVID', 'Rabu', '2', 5),
(241, 1103210138, 'FAZRI AHMAD MUSTAQIM', 'Senin', '1', 4),
(242, 1103210138, 'FAZRI AHMAD MUSTAQIM', 'Senin', '3', 5),
(243, 1103210027, 'RANGGA KHALID PERDANA', 'Selasa', '1', 4),
(244, 1103210027, 'RANGGA KHALID PERDANA', 'Rabu', '1', 5),
(245, 1103210031, 'IKHSAN MEIZA', 'Selasa', '2', 5),
(246, 1103210031, 'IKHSAN MEIZA', 'Rabu', '1', 4),
(247, 1103210139, 'FAJAR KURNIAWAN', 'Senin', '1', 4),
(248, 1103210139, 'FAJAR KURNIAWAN', 'Senin', '2', 5),
(249, 1103210032, 'ANGELICA SHARON AMELIA SIMANJUNTAK', 'Selasa', '3', 5),
(250, 1103210032, 'ANGELICA SHARON AMELIA SIMANJUNTAK', 'Rabu', '1', 4),
(251, 1103210140, 'KEVIN OLIND HASUDUNGAN NAINGGOLAN', 'Senin', '1', 4),
(252, 1103210140, 'KEVIN OLIND HASUDUNGAN NAINGGOLAN', 'Senin', '2', 5),
(253, 1103210035, 'DAFA RHESA SUDIBYO', 'Senin', '1', 4),
(254, 1103210035, 'DAFA RHESA SUDIBYO', 'Senin', '2', 5),
(255, 1103210037, 'DANNY HAMTAR PANGESTU', 'Senin', '1', 5),
(256, 1103210037, 'DANNY HAMTAR PANGESTU', 'Selasa', '2', 4),
(257, 1103210143, 'M TSANI FAISHAL AZHAR', 'Senin', '2', 5),
(258, 1103210143, 'M TSANI FAISHAL AZHAR', 'Rabu', '3', 4),
(259, 1103210038, 'RAFI FADHLURRAHMAN', 'Selasa', '1', 4),
(260, 1103210038, 'RAFI FADHLURRAHMAN', 'Selasa', '3', 5),
(261, 1103210146, 'REY RIZQI ANUGERAH', 'Rabu', '2', 5),
(262, 1103210146, 'REY RIZQI ANUGERAH', 'Rabu', '3', 4),
(263, 1103210041, 'MUHAMMAD ABI KURNIAWAN', 'Senin', '3', 4),
(264, 1103210041, 'MUHAMMAD ABI KURNIAWAN', 'Selasa', '3', 5),
(265, 1103210147, 'REFFA KRESNA DWIFAYANGGA', 'Senin', '1', 4),
(266, 1103210147, 'REFFA KRESNA DWIFAYANGGA', 'Rabu', '2', 5),
(267, 1103210042, 'MUHAMMAD MIRZA FAUZAN MARTONO', 'Senin', '1', 4),
(268, 1103210042, 'MUHAMMAD MIRZA FAUZAN MARTONO', 'Selasa', '1', 5),
(269, 1103210046, 'DHESVIRA NURSEHA PUTRI', 'Senin', '2', 5),
(270, 1103210046, 'DHESVIRA NURSEHA PUTRI', 'Selasa', '1', 4),
(271, 1103210049, 'MUHAMMAD FAUZAN ALDI', 'Senin', '3', 4),
(272, 1103210049, 'MUHAMMAD FAUZAN ALDI', 'Selasa', '3', 5),
(273, 1103210151, 'BARA KHRISNA RAKYAN N.', 'Senin', '1', 5),
(274, 1103210151, 'BARA KHRISNA RAKYAN N.', 'Senin', '3', 4),
(275, 1103210050, 'AFDZULIAH NURANTI', 'Selasa', '1', 4),
(276, 1103210050, 'AFDZULIAH NURANTI', 'Selasa', '3', 5),
(277, 1103210052, 'KINANTI RAHAYU AZ-ZAHRA', 'Senin', '2', 4),
(278, 1103210052, 'KINANTI RAHAYU AZ-ZAHRA', 'Selasa', '1', 5),
(279, 1103210153, 'AHMAD HARITS BURHANI', 'Senin', '1', 4),
(280, 1103210153, 'AHMAD HARITS BURHANI', 'Rabu', '1', 5),
(281, 1103210053, 'MUHAMMAD ABYAN RIDHAN SIREGAR', 'Senin', '1', 4),
(282, 1103210053, 'MUHAMMAD ABYAN RIDHAN SIREGAR', 'Selasa', '1', 5),
(283, 1103210154, 'PARIKESIT', 'Senin', '1', 5),
(284, 1103210154, 'PARIKESIT', 'Senin', '2', 4),
(285, 1103210056, 'NISRINA NURJAUZA FASYA', 'Senin', '2', 4),
(286, 1103210056, 'NISRINA NURJAUZA FASYA', 'Senin', '3', 5),
(287, 1103210057, 'YOGI WIJAYA', 'Selasa', '1', 4),
(288, 1103210057, 'YOGI WIJAYA', 'Selasa', '3', 5),
(289, 1103210156, 'KERESNA DESTIN PERMANA', 'Senin', '3', 5),
(290, 1103210156, 'KERESNA DESTIN PERMANA', 'Rabu', '1', 4),
(291, 1103210060, 'WIDIONO', 'Selasa', '2', 4),
(292, 1103210060, 'WIDIONO', 'Selasa', '3', 5),
(293, 1103210157, 'FAJRI DWI KURNIA', 'Senin', '1', 5),
(294, 1103210157, 'FAJRI DWI KURNIA', 'Rabu', '2', 4),
(295, 1103210061, 'MUHAMMAD NUGRAHA SADEWA', 'Senin', '3', 4),
(296, 1103210061, 'MUHAMMAD NUGRAHA SADEWA', 'Selasa', '2', 5),
(297, 1103210063, 'ANDHIKA YUDHA PRADANA', 'Senin', '2', 4),
(298, 1103210063, 'ANDHIKA YUDHA PRADANA', 'Selasa', '2', 5),
(299, 1103210158, 'RIZQY ASYRAFF ATHALLAH', 'Senin', '1', 5),
(300, 1103210158, 'RIZQY ASYRAFF ATHALLAH', 'Rabu', '3', 4),
(301, 1103210064, 'FARHAN RIZKI FAUZI', 'Senin', '3', 4),
(302, 1103210064, 'FARHAN RIZKI FAUZI', 'Selasa', '2', 5),
(303, 1103210066, 'MIFTAH FARID MAULANA', 'Senin', '2', 4),
(304, 1103210066, 'MIFTAH FARID MAULANA', 'Selasa', '2', 5),
(305, 1103210161, 'MUHAMMAD AFIF FADHLURRAHMAN', 'Senin', '3', 5),
(306, 1103210161, 'MUHAMMAD AFIF FADHLURRAHMAN', 'Rabu', '2', 4),
(307, 1103210074, 'A. MUH. FAIZHUL ISLAM', 'Senin', '2', 4),
(308, 1103210074, 'A. MUH. FAIZHUL ISLAM', 'Senin', '3', 5),
(309, 1103210075, 'KEVIN ALIF BAGASKARA', 'Senin', '2', 4),
(310, 1103210075, 'KEVIN ALIF BAGASKARA', 'Senin', '3', 5),
(311, 1103210171, 'MUHAMMAD MAKHLUFI MAKBULLAH', 'Senin', '2', 4),
(312, 1103210171, 'MUHAMMAD MAKHLUFI MAKBULLAH', 'Rabu', '1', 5),
(313, 1103210076, 'KURNIAWAN DWI PRASETYO', 'Senin', '3', 4),
(314, 1103210076, 'KURNIAWAN DWI PRASETYO', 'Selasa', '1', 5),
(315, 1103210172, 'FAIZ HIBATULLAH', 'Senin', '2', 5),
(316, 1103210172, 'FAIZ HIBATULLAH', 'Senin', '3', 4),
(317, 1103210082, 'ARYA FRIDAYANA GASTIADI', 'Selasa', '2', 4),
(318, 1103210082, 'ARYA FRIDAYANA GASTIADI', 'Selasa', '3', 5),
(319, 1103210173, 'MUHAMMAD IRFAN PERMANA', 'Senin', '3', 5),
(320, 1103210173, 'MUHAMMAD IRFAN PERMANA', 'Rabu', '2', 4),
(321, 1103210089, 'MUHAMMAD NAUFAL AFIF', 'Senin', '2', 5),
(322, 1103210089, 'MUHAMMAD NAUFAL AFIF', 'Selasa', '2', 4),
(323, 1103210094, 'IRMAN PRAYISTA', 'Senin', '2', 5),
(324, 1103210094, 'IRMAN PRAYISTA', 'Selasa', '1', 4),
(325, 1103210174, 'IRAWAN MARDIANSYAH', 'Senin', '2', 5),
(326, 1103210174, 'IRAWAN MARDIANSYAH', 'Rabu', '1', 4),
(327, 1103210097, 'DIFI RAHMANIZA', 'Senin', '2', 5),
(328, 1103210097, 'DIFI RAHMANIZA', 'Selasa', '1', 4),
(329, 1103210100, 'TRIWARDANA TEGAR PRAMUDYA', 'Senin', '1', 5),
(330, 1103210100, 'TRIWARDANA TEGAR PRAMUDYA', 'Selasa', '1', 4),
(331, 1103210176, 'RHONNI IRAMA NOORHUDA', 'Senin', '1', 5),
(332, 1103210176, 'RHONNI IRAMA NOORHUDA', 'Rabu', '1', 4),
(333, 1103210101, 'EVA FIORINA SIAHAAN', 'Selasa', '1', 5),
(334, 1103210101, 'EVA FIORINA SIAHAAN', 'Selasa', '2', 4),
(335, 1103210177, 'MUHAMMAD FARREL AHADI TAMA', 'Senin', '2', 5),
(336, 1103210177, 'MUHAMMAD FARREL AHADI TAMA', 'Rabu', '1', 4),
(337, 1103210181, 'M.ASJAUN', 'Senin', '2', 5),
(338, 1103210181, 'M.ASJAUN', 'Rabu', '1', 4),
(339, 1103210102, 'RAIHANA FAWAZ', 'Selasa', '1', 5),
(340, 1103210102, 'RAIHANA FAWAZ', 'Selasa', '2', 4),
(341, 1103210103, 'TRI MULIA BAHAR', 'Senin', '2', 5),
(342, 1103210103, 'TRI MULIA BAHAR', 'Senin', '3', 4),
(343, 1103210182, 'MOCHAMAD IRGI', 'Senin', '2', 5),
(344, 1103210182, 'MOCHAMAD IRGI', 'Rabu', '1', 4),
(345, 1103210183, 'ANGGI AMALIA', 'Rabu', '1', 5),
(346, 1103210183, 'ANGGI AMALIA', 'Rabu', '3', 4),
(347, 1103210108, 'ALIF IBNU FATHIAN', 'Senin', '2', 5),
(348, 1103210108, 'ALIF IBNU FATHIAN', 'Senin', '3', 4),
(349, 1103210184, 'HAFIDZ SHIDIQ', 'Rabu', '1', 5),
(350, 1103210184, 'HAFIDZ SHIDIQ', 'Rabu', '3', 4),
(351, 1103210185, 'NELLA APRILIA', 'Senin', '1', 5),
(352, 1103210185, 'NELLA APRILIA', 'Rabu', '1', 4),
(353, 1103210187, 'AMELIA PUTRI ANIYANTO', 'Senin', '1', 5),
(354, 1103210187, 'AMELIA PUTRI ANIYANTO', 'Senin', '3', 4),
(355, 1103210189, 'JAMES MESAKH PRAKOSO', 'Senin', '1', 5),
(356, 1103210189, 'JAMES MESAKH PRAKOSO', 'Rabu', '3', 4),
(357, 1103210190, 'KAVILLA ZOTA QURZIAN', 'Rabu', '1', 5),
(358, 1103210190, 'KAVILLA ZOTA QURZIAN', 'Rabu', '2', 4),
(359, 1103210191, 'NUR IHSAN IBRAHIM ABDUL FATTAH', 'Senin', '3', 4),
(360, 1103210191, 'NUR IHSAN IBRAHIM ABDUL FATTAH', 'Rabu', '1', 5),
(361, 1103210192, 'MUHAMAD RIZQ RIHAZ', 'Rabu', '1', 5),
(362, 1103210192, 'MUHAMAD RIZQ RIHAZ', 'Rabu', '3', 4),
(363, 1103210193, 'ARIF AL IMRAN', 'Senin', '1', 5),
(364, 1103210193, 'ARIF AL IMRAN', 'Rabu', '3', 4),
(365, 1103210194, 'FACHRUROZI', 'Senin', '1', 5),
(366, 1103210194, 'FACHRUROZI', 'Senin', '3', 4),
(367, 1103210197, 'NAUFAL HANIF HAMDANI', 'Senin', '1', 5),
(368, 1103210197, 'NAUFAL HANIF HAMDANI', 'Senin', '3', 4),
(369, 1103210200, 'ADRIAN NAUFAL MAULANA', 'Selasa', '1', 5),
(370, 1103210200, 'ADRIAN NAUFAL MAULANA', 'Rabu', '3', 4),
(371, 1103210201, 'YOHANES YOGAS HERLAMBANG', 'Selasa', '1', 5),
(372, 1103210201, 'YOHANES YOGAS HERLAMBANG', 'Selasa', '2', 4),
(373, 1103210202, 'HENDRI MAULANA AZWAR', 'Selasa', '1', 5),
(374, 1103210202, 'HENDRI MAULANA AZWAR', 'Rabu', '3', 4),
(375, 1103210203, 'ANTARIKSA NUGRAHA', 'Selasa', '1', 5),
(376, 1103210203, 'ANTARIKSA NUGRAHA', 'Rabu', '3', 4),
(377, 1103210205, 'HERO KARTIKO', 'Selasa', '1', 5),
(378, 1103210205, 'HERO KARTIKO', 'Selasa', '2', 4),
(379, 1103210206, 'ANDIKA PRATAMA', 'Selasa', '1', 5),
(380, 1103210206, 'ANDIKA PRATAMA', 'Selasa', '2', 4),
(381, 1103210227, 'FRANSISKUS ALEXANDER MARTUAHMAN', 'Senin', '1', 5),
(382, 1103210227, 'FRANSISKUS ALEXANDER MARTUAHMAN', 'Selasa', '1', 4),
(383, 1103202020, 'TOPAZ TAUHID', 'Selasa', '1', 5),
(384, 1103202020, 'TOPAZ TAUHID', 'Rabu', '4', 4),
(385, 1103202131, 'RIZKI HIDAYAT', 'Selasa', '1', 5),
(386, 1103202131, 'RIZKI HIDAYAT', 'Rabu', '4', 4),
(387, 1103202162, 'SADAM PORISKOVA MARCHIANO', 'Selasa', '1', 4),
(388, 1103202162, 'SADAM PORISKOVA MARCHIANO', 'Rabu', '4', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuota_prak`
--

CREATE TABLE `kuota_prak` (
  `id_tambah_sh` int(11) NOT NULL,
  `nama_prak` varchar(30) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `shift` varchar(30) NOT NULL,
  `kuota` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuota_prak`
--

INSERT INTO `kuota_prak` (`id_tambah_sh`, `nama_prak`, `hari`, `shift`, `kuota`) VALUES
(1, 'Rangkaian Listrik', 'senin', '1', 0),
(2, 'Rangkaian Listrik', 'senin', '2', 0),
(3, 'Rangkaian Listrik', 'senin', '3', 0),
(4, 'Rangkaian Listrik', 'senin', '4', 0),
(5, 'Rangkaian Listrik', 'selasa', '1', 0),
(6, 'Rangkaian Listrik', 'selasa', '2', 0),
(7, 'Rangkaian Listrik', 'selasa', '3', 0),
(8, 'Rangkaian Listrik', 'selasa', '4', 0),
(9, 'Rangkaian Listrik', 'rabu', '1', 0),
(10, 'Rangkaian Listrik', 'rabu', '2', 0),
(11, 'Rangkaian Listrik', 'rabu', '3', 0),
(12, 'Rangkaian Listrik', 'rabu', '4', 0),
(13, 'Rangkaian Listrik', 'kamis', '1', 0),
(14, 'Rangkaian Listrik', 'kamis', '2', 0),
(15, 'Rangkaian Listrik', 'kamis', '3', 0),
(16, 'Rangkaian Listrik', 'kamis', '4', 0),
(17, 'Rangkaian Listrik', 'jumat', '1', 0),
(18, 'Rangkaian Listrik', 'jumat', '2', 0),
(19, 'Rangkaian Listrik', 'jumat', '3', 0),
(20, 'Rangkaian Listrik', 'jumat', '4', 0),
(21, 'Rangkaian Listrik', 'sabtu', '1', 0),
(22, 'Rangkaian Listrik', 'sabtu', '2', 0),
(23, 'Rangkaian Listrik', 'sabtu', '3', 0),
(24, 'Rangkaian Listrik', 'sabtu', '4', 0),
(25, 'Pengolahan Sinyal Digital', 'senin', '1', 1),
(26, 'Pengolahan Sinyal Digital', 'senin', '2', 1),
(27, 'Pengolahan Sinyal Digital', 'senin', '3', 1),
(28, 'Pengolahan Sinyal Digital', 'senin', '4', 0),
(29, 'Pengolahan Sinyal Digital', 'selasa', '1', 1),
(30, 'Pengolahan Sinyal Digital', 'selasa', '2', 1),
(31, 'Pengolahan Sinyal Digital', 'selasa', '3', 1),
(32, 'Pengolahan Sinyal Digital', 'selasa', '4', 1),
(33, 'Pengolahan Sinyal Digital', 'rabu', '1', 1),
(34, 'Pengolahan Sinyal Digital', 'rabu', '2', 1),
(35, 'Pengolahan Sinyal Digital', 'rabu', '3', 0),
(36, 'Pengolahan Sinyal Digital', 'rabu', '4', 7),
(37, 'Pengolahan Sinyal Digital', 'kamis', '1', 0),
(38, 'Pengolahan Sinyal Digital', 'kamis', '2', 0),
(39, 'Pengolahan Sinyal Digital', 'kamis', '3', 0),
(40, 'Pengolahan Sinyal Digital', 'kamis', '4', 0),
(41, 'Pengolahan Sinyal Digital', 'jumat', '1', 0),
(42, 'Pengolahan Sinyal Digital', 'jumat', '2', 0),
(43, 'Pengolahan Sinyal Digital', 'jumat', '3', 0),
(44, 'Pengolahan Sinyal Digital', 'jumat', '4', 0),
(45, 'Pengolahan Sinyal Digital', 'sabtu', '1', 0),
(46, 'Pengolahan Sinyal Digital', 'sabtu', '2', 0),
(47, 'Pengolahan Sinyal Digital', 'sabtu', '3', 0),
(48, 'Pengolahan Sinyal Digital', 'sabtu', '4', 0),
(49, 'Desain Sistem Digital', 'senin', '1', 1),
(50, 'Desain Sistem Digital', 'senin', '2', 0),
(51, 'Desain Sistem Digital', 'senin', '3', 1),
(52, 'Desain Sistem Digital', 'senin', '4', 1),
(53, 'Desain Sistem Digital', 'selasa', '1', 1),
(54, 'Desain Sistem Digital', 'selasa', '2', 1),
(55, 'Desain Sistem Digital', 'selasa', '3', 1),
(56, 'Desain Sistem Digital', 'selasa', '4', 1),
(57, 'Desain Sistem Digital', 'rabu', '1', 1),
(58, 'Desain Sistem Digital', 'rabu', '2', 1),
(59, 'Desain Sistem Digital', 'rabu', '3', 1),
(60, 'Desain Sistem Digital', 'rabu', '4', 6),
(61, 'Desain Sistem Digital', 'kamis', '1', 0),
(62, 'Desain Sistem Digital', 'kamis', '2', 0),
(63, 'Desain Sistem Digital', 'kamis', '3', 0),
(64, 'Desain Sistem Digital', 'kamis', '4', 0),
(65, 'Desain Sistem Digital', 'jumat', '1', 0),
(66, 'Desain Sistem Digital', 'jumat', '2', 0),
(67, 'Desain Sistem Digital', 'jumat', '3', 0),
(68, 'Desain Sistem Digital', 'jumat', '4', 0),
(69, 'Desain Sistem Digital', 'sabtu', '1', 0),
(70, 'Desain Sistem Digital', 'sabtu', '2', 0),
(71, 'Desain Sistem Digital', 'sabtu', '3', 0),
(72, 'Desain Sistem Digital', 'sabtu', '4', 0),
(73, 'Pemrograman Berbasis Objek', 'senin', '1', 0),
(74, 'Pemrograman Berbasis Objek', 'senin', '2', 0),
(75, 'Pemrograman Berbasis Objek', 'senin', '3', 0),
(76, 'Pemrograman Berbasis Objek', 'senin', '4', 0),
(77, 'Pemrograman Berbasis Objek', 'selasa', '1', 0),
(78, 'Pemrograman Berbasis Objek', 'selasa', '2', 0),
(79, 'Pemrograman Berbasis Objek', 'selasa', '3', 0),
(80, 'Pemrograman Berbasis Objek', 'selasa', '4', 0),
(81, 'Pemrograman Berbasis Objek', 'rabu', '1', 0),
(82, 'Pemrograman Berbasis Objek', 'rabu', '2', 0),
(83, 'Pemrograman Berbasis Objek', 'rabu', '3', 0),
(84, 'Pemrograman Berbasis Objek', 'rabu', '4', 0),
(85, 'Pemrograman Berbasis Objek', 'kamis', '1', 0),
(86, 'Pemrograman Berbasis Objek', 'kamis', '2', 0),
(87, 'Pemrograman Berbasis Objek', 'kamis', '3', 0),
(88, 'Pemrograman Berbasis Objek', 'kamis', '4', 0),
(89, 'Pemrograman Berbasis Objek', 'jumat', '1', 0),
(90, 'Pemrograman Berbasis Objek', 'jumat', '2', 0),
(91, 'Pemrograman Berbasis Objek', 'jumat', '3', 0),
(92, 'Pemrograman Berbasis Objek', 'jumat', '4', 0),
(93, 'Pemrograman Berbasis Objek', 'sabtu', '1', 0),
(94, 'Pemrograman Berbasis Objek', 'sabtu', '2', 0),
(95, 'Pemrograman Berbasis Objek', 'sabtu', '3', 0),
(96, 'Pemrograman Berbasis Objek', 'sabtu', '4', 0),
(97, 'Elektronika Dasar', 'senin', '1', 0),
(98, 'Elektronika Dasar', 'senin', '2', 0),
(99, 'Elektronika Dasar', 'senin', '3', 0),
(100, 'Elektronika Dasar', 'senin', '4', 0),
(101, 'Elektronika Dasar', 'selasa', '1', 0),
(102, 'Elektronika Dasar', 'selasa', '2', 0),
(103, 'Elektronika Dasar', 'selasa', '3', 0),
(104, 'Elektronika Dasar', 'selasa', '4', 0),
(105, 'Elektronika Dasar', 'rabu', '1', 0),
(106, 'Elektronika Dasar', 'rabu', '2', 0),
(107, 'Elektronika Dasar', 'rabu', '3', 0),
(108, 'Elektronika Dasar', 'rabu', '4', 0),
(109, 'Elektronika Dasar', 'kamis', '1', 0),
(110, 'Elektronika Dasar', 'kamis', '2', 0),
(111, 'Elektronika Dasar', 'kamis', '3', 0),
(112, 'Elektronika Dasar', 'kamis', '4', 0),
(113, 'Elektronika Dasar', 'jumat', '1', 0),
(114, 'Elektronika Dasar', 'jumat', '2', 0),
(115, 'Elektronika Dasar', 'jumat', '3', 0),
(116, 'Elektronika Dasar', 'jumat', '4', 0),
(117, 'Elektronika Dasar', 'sabtu', '1', 0),
(118, 'Elektronika Dasar', 'sabtu', '2', 0),
(119, 'Elektronika Dasar', 'sabtu', '3', 0),
(120, 'Elektronika Dasar', 'sabtu', '4', 0),
(121, 'Komputasi Awam ', 'senin', '1', 0),
(122, 'Komputasi Awam ', 'senin', '2', 0),
(123, 'Komputasi Awam ', 'senin', '3', 0),
(124, 'Komputasi Awam ', 'senin', '4', 0),
(125, 'Komputasi Awam ', 'selasa', '1', 0),
(126, 'Komputasi Awam ', 'selasa', '2', 0),
(127, 'Komputasi Awam ', 'selasa', '3', 0),
(128, 'Komputasi Awam ', 'selasa', '4', 0),
(129, 'Komputasi Awam ', 'rabu', '1', 0),
(130, 'Komputasi Awam ', 'rabu', '2', 0),
(131, 'Komputasi Awam ', 'rabu', '3', 0),
(132, 'Komputasi Awam ', 'rabu', '4', 0),
(133, 'Komputasi Awam ', 'kamis', '1', 0),
(134, 'Komputasi Awam ', 'kamis', '2', 0),
(135, 'Komputasi Awam ', 'kamis', '3', 0),
(136, 'Komputasi Awam ', 'kamis', '4', 0),
(137, 'Komputasi Awam ', 'jumat', '1', 0),
(138, 'Komputasi Awam ', 'jumat', '2', 0),
(139, 'Komputasi Awam ', 'jumat', '3', 0),
(140, 'Komputasi Awam ', 'jumat', '4', 0),
(141, 'Komputasi Awam ', 'sabtu', '1', 0),
(142, 'Komputasi Awam ', 'sabtu', '2', 0),
(143, 'Komputasi Awam ', 'sabtu', '3', 0),
(144, 'Komputasi Awam ', 'sabtu', '4', 0),
(145, 'Kecerdasan Buatan ', 'senin', '1', 0),
(146, 'Kecerdasan Buatan ', 'senin', '2', 0),
(147, 'Kecerdasan Buatan ', 'senin', '3', 0),
(148, 'Kecerdasan Buatan ', 'senin', '4', 0),
(149, 'Kecerdasan Buatan ', 'selasa', '1', 0),
(150, 'Kecerdasan Buatan ', 'selasa', '2', 0),
(151, 'Kecerdasan Buatan ', 'selasa', '3', 0),
(152, 'Kecerdasan Buatan ', 'selasa', '4', 0),
(153, 'Kecerdasan Buatan ', 'rabu', '1', 0),
(154, 'Kecerdasan Buatan ', 'rabu', '2', 0),
(155, 'Kecerdasan Buatan ', 'rabu', '3', 0),
(156, 'Kecerdasan Buatan ', 'rabu', '4', 0),
(157, 'Kecerdasan Buatan ', 'kamis', '1', 0),
(158, 'Kecerdasan Buatan ', 'kamis', '2', 0),
(159, 'Kecerdasan Buatan ', 'kamis', '3', 0),
(160, 'Kecerdasan Buatan ', 'kamis', '4', 0),
(161, 'Kecerdasan Buatan ', 'jumat', '1', 0),
(162, 'Kecerdasan Buatan ', 'jumat', '2', 0),
(163, 'Kecerdasan Buatan ', 'jumat', '3', 0),
(164, 'Kecerdasan Buatan ', 'jumat', '4', 0),
(165, 'Kecerdasan Buatan ', 'sabtu', '1', 0),
(166, 'Kecerdasan Buatan ', 'sabtu', '2', 0),
(167, 'Kecerdasan Buatan ', 'sabtu', '3', 0),
(168, 'Kecerdasan Buatan ', 'sabtu', '4', 0),
(169, 'Mikroprosessor Dan Antarmuka', 'senin', '1', 0),
(170, 'Mikroprosessor Dan Antarmuka', 'senin', '2', 0),
(171, 'Mikroprosessor Dan Antarmuka', 'senin', '3', 0),
(172, 'Mikroprosessor Dan Antarmuka', 'senin', '4', 0),
(173, 'Mikroprosessor Dan Antarmuka', 'selasa', '1', 0),
(174, 'Mikroprosessor Dan Antarmuka', 'selasa', '2', 0),
(175, 'Mikroprosessor Dan Antarmuka', 'selasa', '3', 0),
(176, 'Mikroprosessor Dan Antarmuka', 'selasa', '4', 0),
(177, 'Mikroprosessor Dan Antarmuka', 'rabu', '1', 0),
(178, 'Mikroprosessor Dan Antarmuka', 'rabu', '2', 0),
(179, 'Mikroprosessor Dan Antarmuka', 'rabu', '3', 0),
(180, 'Mikroprosessor Dan Antarmuka', 'rabu', '4', 0),
(181, 'Mikroprosessor Dan Antarmuka', 'kamis', '1', 0),
(182, 'Mikroprosessor Dan Antarmuka', 'kamis', '2', 0),
(183, 'Mikroprosessor Dan Antarmuka', 'kamis', '3', 0),
(184, 'Mikroprosessor Dan Antarmuka', 'kamis', '4', 0),
(185, 'Mikroprosessor Dan Antarmuka', 'jumat', '1', 0),
(186, 'Mikroprosessor Dan Antarmuka', 'jumat', '2', 0),
(187, 'Mikroprosessor Dan Antarmuka', 'jumat', '3', 0),
(188, 'Mikroprosessor Dan Antarmuka', 'jumat', '4', 0),
(189, 'Mikroprosessor Dan Antarmuka', 'sabtu', '1', 0),
(190, 'Mikroprosessor Dan Antarmuka', 'sabtu', '2', 0),
(191, 'Mikroprosessor Dan Antarmuka', 'sabtu', '3', 0),
(192, 'Mikroprosessor Dan Antarmuka', 'sabtu', '4', 0),
(193, 'Keamanan Sistem', 'senin', '1', 0),
(194, 'Keamanan Sistem', 'senin', '2', 0),
(195, 'Keamanan Sistem', 'senin', '3', 0),
(196, 'Keamanan Sistem', 'senin', '4', 0),
(197, 'Keamanan Sistem', 'selasa', '1', 0),
(198, 'Keamanan Sistem', 'selasa', '2', 0),
(199, 'Keamanan Sistem', 'selasa', '3', 0),
(200, 'Keamanan Sistem', 'selasa', '4', 0),
(201, 'Keamanan Sistem', 'rabu', '1', 0),
(202, 'Keamanan Sistem', 'rabu', '2', 0),
(203, 'Keamanan Sistem', 'rabu', '3', 0),
(204, 'Keamanan Sistem', 'rabu', '4', 0),
(205, 'Keamanan Sistem', 'kamis', '1', 0),
(206, 'Keamanan Sistem', 'kamis', '2', 0),
(207, 'Keamanan Sistem', 'kamis', '3', 0),
(208, 'Keamanan Sistem', 'kamis', '4', 0),
(209, 'Keamanan Sistem', 'jumat', '1', 0),
(210, 'Keamanan Sistem', 'jumat', '2', 0),
(211, 'Keamanan Sistem', 'jumat', '3', 0),
(212, 'Keamanan Sistem', 'jumat', '4', 0),
(213, 'Keamanan Sistem', 'sabtu', '1', 0),
(214, 'Keamanan Sistem', 'sabtu', '2', 0),
(215, 'Keamanan Sistem', 'sabtu', '3', 0),
(216, 'Keamanan Sistem', 'sabtu', '4', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laborat`
--

CREATE TABLE `laborat` (
  `id_lab` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `nama_lab` varchar(30) NOT NULL,
  `kapasitas_praktikan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laborat`
--

INSERT INTO `laborat` (`id_lab`, `id_ruang`, `nama_lab`, `kapasitas_praktikan`) VALUES
(1, 1, 'Elektronika', 480),
(2, 2, 'Rangkaian_Listrik', 480),
(3, 3, 'EvCon', 480),
(4, 4, 'Seculab', 480),
(5, 5, 'RnEST', 480),
(6, 6, 'Sea', 480),
(7, 7, 'MAGICS', 480),
(8, 8, 'i-SMILE', 480),
(9, 0, 'Elektronika Dasar', 480);

-- --------------------------------------------------------

--
-- Struktur dari tabel `praktikum`
--

CREATE TABLE `praktikum` (
  `id_praktikum` int(11) NOT NULL,
  `nama_prak` varchar(35) NOT NULL,
  `tipe_prak` varchar(15) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `praktikum`
--

INSERT INTO `praktikum` (`id_praktikum`, `nama_prak`, `tipe_prak`, `id_ruang`, `id_lab`) VALUES
(1, 'Rangkaian Listrik', 'ptk1', 1, 2),
(2, 'Pemrograman Berbasis Objek', 'ptk1', 6, 6),
(3, 'Elektronika Dasar', 'ptk1', 1, 1),
(4, 'Desain Sistem Digital ', 'ptk2', 5, 5),
(5, 'Pengolahan Sinyal Digital', 'ptk2', 7, 7),
(6, 'Komputasi Awan ', 'ptk3', 3, 3),
(7, 'Kecerdasan Buatan ', 'ptk3', 8, 8),
(8, 'Mikroprosessor Dan Antarmuka', 'ptk4', 5, 5),
(9, 'Keamanan Sistem', 'ptk4', 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_prak`
--

CREATE TABLE `ruang_prak` (
  `id_ruang` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `kapasitas_ruang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruang_prak`
--

INSERT INTO `ruang_prak` (`id_ruang`, `id_lab`, `kapasitas_ruang`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `role` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nim` int(10) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`role`, `id_user`, `name`, `nim`, `pass`) VALUES
('praktikan', 2, 'Muhammad Raihan Baswara', 1101190350, '1101190350'),
('asisten', 3, 'Vionalisa Oktavia Kusuma Ningrum', 1101194068, '110119406869'),
('asisten', 4, 'Jihan Luthfia Fauziah', 1101204418, '110120441869'),
('asisten', 5, 'Sania Bahrullah', 1102194109, '110219410969'),
('asisten', 6, 'Hana Fitri Fikriyah', 1102204392, '110220439269'),
('asisten', 7, 'Nur Sulistia Wijaya', 1102194122, '110219412269'),
('asisten', 8, 'Erni Yanthy Pardede', 1101194104, '110119410469'),
('asisten', 9, 'Rakhmad Hidayat', 1102192265, '110219226569'),
('asisten', 10, 'Andi Zhagyta Amalia Azrika', 1101204422, '110120442269'),
('asisten', 11, 'Hanif A Rahadiansyah', 1102202584, '110220258469'),
('asisten', 12, 'Camelia Sari Salsabil', 1102204529, '110220452969'),
('asisten', 13, 'Ivana Meiska', 1103194118, '110319411869'),
('asisten', 14, 'Daffa Ahmadhan Khusumah', 1103194146, '110319414669'),
('asisten', 15, 'Annisa Aprilia Putri Sakri', 1103194005, '110319400569'),
('asisten', 16, 'Rama Pratama', 1103190049, '110319004969'),
('asisten', 17, ' Muhammad Fakhri Zain Rifqi', 1103194017, '110319401769'),
('asisten', 18, 'Adlan Afif Nugroho', 1103194089, '110319408969'),
('asisten', 19, 'Ihza Aulia Syakir', 1103194005, '110319400569'),
('asisten', 20, 'Raif Haidar Darmawan', 1103190133, '110319013369'),
('asisten', 21, 'Fauzi Ananta', 1103194110, '110319411069'),
('asisten', 22, 'Mikhael Prausdian Arruan Wijaya', 1103192200, '110319220069'),
('asisten', 23, 'Raden Rofiq Yudha Setyawan', 1103190064, '110319006469'),
('asisten', 24, 'Sultan Chisson Obie', 1103194158, '110319415869'),
('asisten', 25, 'Muhammad Althaf   Dhiaulhaq', 1103194046, '110319404669'),
('asisten', 26, 'Faris Alim Mirzani', 1103193163, '110319316369'),
('asisten', 27, 'Anak Agung Ngurah Dhita Pratanca', 1103194097, '110319409769'),
('asisten', 28, 'Muhamad Fauzan Anshori', 1103190035, '110319003569'),
('asisten', 29, 'Gregorius Belva Ivander', 1103190007, '110319000769'),
('asisten', 30, 'Alwi Zulfauzi Toscana', 1103190065, '110319006569'),
('asisten', 31, 'Muhammad Iqbaal Hibatullah', 1103190026, '110319002669'),
('asisten', 32, 'Fhadil Ghathfan', 1103193175, '110319317569'),
('asisten', 33, 'Figo Plambudi Dwigantara', 1103192202, '110319220269'),
('asisten', 34, 'Zahrandika Putra', 1103190054, '110319005469'),
('asisten', 35, 'Irfan Setiawan', 1103194034, '110319403469'),
('asisten', 36, 'Ilham Faiz Firmansyah', 1103190073, '110319007369'),
('asisten', 37, 'Hamzah Fatihulhaq', 1103192193, '110319219369'),
('asisten', 38, 'Muhammad Rifat Widiyana', 1103190066, '110319006669'),
('asisten', 39, 'M Haikal Ferbrian P ', 1103193053, '110319305369'),
('asisten', 40, 'Ayub Rosihan Ambarita', 1103193154, '110319315469'),
('asisten', 41, 'Rizky Araffathia', 1103194025, '110319402569'),
('asisten', 42, 'Luthfiana Zahra Firdausi', 1103194081, '110319408169'),
('asisten', 43, 'M. Atoilla Chabibi', 1103192208, '110319220869'),
('asisten', 44, 'Yusup Diva Pratama', 1103194090, '110319409069'),
('asisten', 45, 'Mohammad Dafa Dhiyaul Haq', 1103194123, '110319412369'),
('asisten', 46, 'Willy Prasetyo', 1103190107, '110319010769'),
('asisten', 47, 'Muhammad Irfan Fauzi', 1103194013, '110319401369'),
('asisten', 48, 'Muhammad Ariyanta Triputro', 1103191010, '110319101069'),
('asisten', 49, 'Fahran Dani', 1103190003, '110319000369'),
('asisten', 50, 'Muklisin', 1103194058, '110319405869'),
('asisten', 51, 'Alkika Raja Kaniskha', 1103194129, '110319412969'),
('asisten', 52, 'Harvan Nurluthfi Irawan', 1103204038, '110320403869'),
('asisten', 53, 'Evan Pradipta Hardinatha', 1103204160, '110320416069'),
('asisten', 54, 'Gunawan Tri Mardani', 1103201261, '110320126169'),
('asisten', 55, 'Ibrahim Maulana', 1103201247, '110320124769'),
('asisten', 56, 'Jaisy Malikulmulki Arasy', 1103202201, '110320220169'),
('asisten', 57, 'Mohammad Rizki Ramdhan', 1103240126, '110324012669'),
('asisten', 58, 'Ario Syawal Muhammad', 1103201243, '110320124369'),
('asisten', 59, 'Jean Jeasenn Timotius Zipazi', 1103201257, '110320125769'),
('asisten', 60, 'Zaidan Luthfi', 1103203238, '110320323869'),
('asisten', 61, 'Giovanni Nathaniel', 1103202211, '110320221169'),
('asisten', 62, 'Muhammad Tharreq An Nahl', 1103204040, '110320404069'),
('asisten', 63, 'Muhammad Irfan Al Rasyid', 1103200080, '110320008069'),
('asisten', 64, 'Rizky Ramadhani Syam', 1103204086, '110320408669'),
('asisten', 65, 'Achmad Rionov Faddillah Ramadhan', 1103204030, '110320403069'),
('asisten', 66, 'Edwin Malik Makarim', 1103202079, '110320207969'),
('asisten', 67, 'Muhammad Syarif', 1103194184, '110319418469'),
('asisten', 68, 'Brilliant Friezka Aina', 1103194186, '110319418669'),
('asisten', 69, 'Delatifa Putri Sugandi', 1103194080, '110319408069'),
('asisten', 70, 'Berliana Putri Buwono', 1103194067, '110319406769'),
('asisten', 71, 'Hanif Shafwan Mahib', 1103194150, '110319415069'),
('asisten', 72, 'Muhammat Lio Pratama', 1103194020, '110319402069'),
('asisten', 73, 'Rahmad Hidayad', 1103193178, '110319317869'),
('asisten', 74, 'Muhammad Rizki Afandy', 1103194151, '110319415169'),
('asisten', 75, 'Siti An-nisaa', 1103190023, '110319002369'),
('asisten', 76, 'Atala Nauval Kenandy', 1103194082, '110319408269'),
('asisten', 77, 'Muhammad Rakan Fawwaz', 1103194031, '1103194031'),
('asisten', 78, 'Agung Sulaksono Ramdhani', 1103194071, '1103194071'),
('asisten', 79, 'Alvin Anandra Brilliandy', 1103190111, '1103190111'),
('asisten', 80, 'Eka Oktaviani', 1103194044, '1103194044'),
('asisten', 81, 'Tegar Pandji Asmoro', 1103194006, '1103194006'),
('asisten', 82, 'Wahyu Mubarak Sukiman', 1103194104, '1103194104'),
('asisten', 83, 'Alfaridzi Muhammad Ariefani', 1103194011, '1103194011'),
('asisten', 84, 'Asep Irawan', 1103190112, '1103190112'),
('asisten', 85, 'Aura Syafa Aprillia Radim', 1103194173, '1103194173'),
('asisten', 86, 'Taufiq Salman Syabani', 1103190052, '1103190052'),
('asisten', 87, 'Ariana Novanti', 1103194144, '110319414469'),
('asisten', 88, 'Abraham Merari Sebayang', 1101190423, '110119042369'),
('asisten', 89, 'Daffa Bintang Yudistira', 1102194103, '110219410369'),
('asisten', 90, 'Dewi Diah Pontiasri', 1101190328, '110119032869'),
('asisten', 91, 'Muhammad Raga Titipan', 1103194185, '110319418569'),
('asisten', 92, 'Sayid Huseini Elfarizi', 1101194232, '110119423269'),
('asisten', 93, 'Muhammad Tabah Rizky Perdana', 1102190033, '110219003369'),
('asisten', 94, 'Muhammad Izzudin Islam', 1103194012, '110319401269'),
('asisten', 95, 'Fajrul Falah Fillah', 1102194061, '110219406169'),
('asisten', 96, 'Sekhah Ulyana', 1102190067, '110219006769'),
('praktikan', 97, 'Fikri Novaldy', 1103200055, '1103200055'),
('praktikan', 98, 'Lazzuardi Sholehuddin Nursuhud', 1103200110, '1103200110'),
('praktikan', 99, 'Fasya Hanifah Putti', 1103200149, '1103200149'),
('praktikan', 100, 'Hans Harison Taufiq', 1103200173, '1103200173'),
('praktikan', 101, 'Muthie Armalia Soeriamaritsa', 1103200178, '1103200178'),
('praktikan', 102, 'Rully Lukas Tampubolon', 1103200181, '1103200181'),
('praktikan', 103, 'Yasser Martin', 1103201259, '1103201259'),
('praktikan', 105, 'Dony Tri Nugroho', 1103202041, '1103202041'),
('praktikan', 106, 'Adifa Syahira', 1103202067, '1103202067'),
('praktikan', 107, 'Edwin Malik Makarim', 1103202079, '1103202079'),
('praktikan', 108, 'Juan Meta Sirgianto', 1103202092, '1103202092'),
('praktikan', 109, 'Galih Karya Gemilang', 1103202098, '1103202098'),
('praktikan', 111, 'Fazri Ardhana', 1103202187, '1103202187'),
('praktikan', 112, 'Abyan Hafiizh', 1103202245, '1103202245'),
('praktikan', 113, 'Ade Tirta Rahmat Hidayat', 1103203212, '1103203212'),
('praktikan', 114, 'Loaeza Septavial', 1103204003, '1103204003'),
('praktikan', 115, 'Tassya Ramadhanti', 1103204016, '1103204016'),
('praktikan', 116, 'Bagus Mahardika Santoso', 1103204028, '1103204028'),
('praktikan', 117, 'Ivan Fernanda Prayoga', 1103204035, '1103204035'),
('praktikan', 118, 'Resti Nugratullah Arif', 1103204043, '1103204043'),
('praktikan', 119, 'Rizky Ramadhani Syam', 1103204086, '1103204086'),
('praktikan', 120, 'Akbar Prastowo', 1103204104, '1103204104'),
('praktikan', 121, 'Dewa Theisyatta Asharo Heisenda', 1103204125, '1103204125'),
('praktikan', 122, 'Ahmad Adil Taufani', 1103204144, '1103204144'),
('praktikan', 123, 'Arshie Fathrezza Suryatama Hendrady', 1103204165, '1103204165'),
('praktikan', 124, 'Muhammad Fariq Taqi Pasai', 1103204193, '1103204193'),
('praktikan', 125, 'Geril Hidayat Saputra', 1103204199, '1103204199'),
('praktikan', 126, 'Azam Auliyaa ', 1103204205, '1103204205'),
('praktikan', 127, 'Hans Nur Ichsan', 1103204224, '1103204224'),
('praktikan', 128, 'Zulian Wahid', 1103201049, '1103201049'),
('admin', 132, 'admin', 2, '2'),
('praktikan', 136, 'bambankuuu', 1, '2'),
('praktikan', 156, 'Tegar Pandji Asmoro', 1103194006, '1103194006'),
('praktikan', 164, 'Muhammad Faishal Abdurrahman', 1103213015, '1103213015'),
('praktikan', 165, 'Diaz Abdi', 1103213021, '1103213021'),
('praktikan', 166, 'Andifa Rifqi Aquila ', 1103213159, '1103213159'),
('praktikan', 167, 'User Praktikan', 12345, '12345'),
('asisten', 168, 'User Asisten', 12345, '12345'),
('praktikan', 169, 'tegarrrr', 123456, '12345'),
('asisten', 170, 'teg', 123456, '123456'),
('praktikan', 171, 'coba', 1234567, '1234567'),
('asisten', 172, 'asisten', 11, '11'),
('praktikan', 173, 'ANDREANSYAH AKMAL CHAERUDDIN', 1103210241, '1103210241'),
('praktikan', 174, 'MUHAMAD IBNU FAJAR WIBAWA', 1103190108, '1103190108'),
('praktikan', 175, 'ARIQ ADHITYA', 1103194050, '1103194050'),
('praktikan', 176, 'MUH.NASHAR', 1103194122, '1103194122'),
('praktikan', 177, 'AHMAD LUTHFI MUHAJIR MUNANDAR', 1103200148, '1103200148'),
('praktikan', 178, 'TOPAZ TAUHID', 1103202020, '1103202020'),
('praktikan', 179, 'RAIHAN ATHA', 1103202123, '1103202123'),
('praktikan', 180, 'RIZKI HIDAYAT', 1103202131, '1103202131'),
('praktikan', 181, 'FAHAR NAIL HAKIM', 1103202133, '1103202133'),
('praktikan', 182, 'MUHAMMAD SADAM ERLANGGA', 1103202153, '1103202153'),
('praktikan', 183, 'SADAM PORISKOVA MARCHIANO', 1103202162, '1103202162'),
('praktikan', 184, 'DAFI RASYADAN DJAUHARI', 1103202189, '1103202189'),
('praktikan', 185, 'MUHAMMAD LUTHFAN HASNANTO', 1103202269, '1103202269'),
('praktikan', 186, 'RAFEAL SEPRIADI', 1103204081, '1103204081'),
('praktikan', 187, 'IBNUTSANY TEGAR BHAGASKORO', 1103204094, '1103204094'),
('praktikan', 188, 'RASYID ABDI GANTORO', 1103204127, '1103204127'),
('praktikan', 189, 'ENRICO ANDRESON PATTIPEILOHY', 1103204206, '1103204206'),
('praktikan', 190, 'MUHAMAD AFRI MARLIANSYAH', 1103210001, '1103210001'),
('praktikan', 191, 'MARCELLENO YOGA', 1103210004, '1103210004'),
('praktikan', 192, 'GHIFARI SEPTANDI HERMANSYAH', 1103210006, '1103210006'),
('praktikan', 193, 'MUHAMMAD THORIQ ZAM', 1103210008, '1103210008'),
('praktikan', 194, 'MUHAMMAD FADHIL NARARYA BASUKI', 1103210009, '1103210009'),
('praktikan', 195, 'DAVIN MAHESA PRASETYO', 1103210010, '1103210010'),
('praktikan', 196, 'DIMAS RIZQIE PRATIKTA', 1103210016, '1103210016'),
('praktikan', 197, 'AXEL DAVID', 1103210017, '1103210017'),
('praktikan', 198, 'MUHAMMAD NADHIM ABDIRRAHMAN', 1103210018, '1103210018'),
('praktikan', 199, 'MIZAN GHAZY PRARAYA', 1103210024, '1103210024'),
('praktikan', 200, 'RANGGA KHALID PERDANA', 1103210027, '1103210027'),
('praktikan', 201, 'IKHSAN MEIZA', 1103210031, '1103210031'),
('praktikan', 202, 'ANGELICA SHARON AMELIA SIMANJUNTAK', 1103210032, '1103210032'),
('praktikan', 203, 'DAFA RHESA SUDIBYO', 1103210035, '1103210035'),
('praktikan', 204, 'DANNY HAMTAR PANGESTU', 1103210037, '1103210037'),
('praktikan', 205, 'RAFI FADHLURRAHMAN', 1103210038, '1103210038'),
('praktikan', 206, 'MUHAMMAD ABI KURNIAWAN', 1103210041, '1103210041'),
('praktikan', 207, 'MUHAMMAD MIRZA FAUZAN MARTONO', 1103210042, '1103210042'),
('praktikan', 208, 'DHESVIRA NURSEHA PUTRI', 1103210046, '1103210046'),
('praktikan', 209, 'MUHAMMAD FAUZAN ALDI', 1103210049, '1103210049'),
('praktikan', 210, 'AFDZULIAH NURANTI', 1103210050, '1103210050'),
('praktikan', 211, 'KINANTI RAHAYU AZ-ZAHRA', 1103210052, '1103210052'),
('praktikan', 212, 'MUHAMMAD ABYAN RIDHAN SIREGAR', 1103210053, '1103210053'),
('praktikan', 213, 'NISRINA NURJAUZA FASYA', 1103210056, '1103210056'),
('praktikan', 214, 'YOGI WIJAYA', 1103210057, '1103210057'),
('praktikan', 215, 'WIDIONO', 1103210060, '1103210060'),
('praktikan', 216, 'MUHAMMAD NUGRAHA SADEWA', 1103210061, '1103210061'),
('praktikan', 217, 'ANDHIKA YUDHA PRADANA', 1103210063, '1103210063'),
('praktikan', 218, 'FARHAN RIZKI FAUZI', 1103210064, '1103210064'),
('praktikan', 219, 'MIFTAH FARID MAULANA', 1103210066, '1103210066'),
('praktikan', 220, 'A. MUH. FAIZHUL ISLAM', 1103210074, '1103210074'),
('praktikan', 221, 'KEVIN ALIF BAGASKARA', 1103210075, '1103210075'),
('praktikan', 222, 'KURNIAWAN DWI PRASETYO', 1103210076, '1103210076'),
('praktikan', 223, 'ARYA FRIDAYANA GASTIADI', 1103210082, '1103210082'),
('praktikan', 224, 'MUHAMMAD NAUFAL AFIF', 1103210089, '1103210089'),
('praktikan', 225, 'IRMAN PRAYISTA', 1103210094, '1103210094'),
('praktikan', 226, 'DIFI RAHMANIZA', 1103210097, '1103210097'),
('praktikan', 227, 'TRIWARDANA TEGAR PRAMUDYA', 1103210100, '1103210100'),
('praktikan', 228, 'EVA FIORINA SIAHAAN', 1103210101, '1103210101'),
('praktikan', 229, 'RAIHANA FAWAZ', 1103210102, '1103210102'),
('praktikan', 230, 'TRI MULIA BAHAR', 1103210103, '1103210103'),
('praktikan', 231, 'ALIF IBNU FATHIAN', 1103210108, '1103210108'),
('praktikan', 232, 'SYAHRUL REZA ANANDA', 1103210113, '1103210113'),
('praktikan', 233, 'AUGRYES FARHA SULISTYA NEGARA', 1103210115, '1103210115'),
('praktikan', 234, 'HAFIZ MUHAMMAD FADHEL', 1103210125, '1103210125'),
('praktikan', 235, 'IZZAN MUHAMMAD FAIZ', 1103210126, '1103210126'),
('praktikan', 236, 'MOCHAMAD ARIEF DERMAWAN', 1103210128, '1103210128'),
('praktikan', 237, 'FARDY ALIF MAHARDHIKA YUSUF', 1103210129, '1103210129'),
('praktikan', 238, 'MUHAMMAD JIBRAN HADY', 1103210132, '1103210132'),
('praktikan', 239, 'M. ANDRIAN TOPAZ FIRDAUS', 1103210133, '1103210133'),
('praktikan', 240, 'GLEN DERY HAWILANDO SIREGAR', 1103210134, '1103210134'),
('praktikan', 241, 'FAZRI AHMAD MUSTAQIM', 1103210138, '1103210138'),
('praktikan', 242, 'FAJAR KURNIAWAN', 1103210139, '1103210139'),
('praktikan', 243, 'KEVIN OLIND HASUDUNGAN NAINGGOLAN', 1103210140, '1103210140'),
('praktikan', 244, 'M TSANI FAISHAL AZHAR', 1103210143, '1103210143'),
('praktikan', 245, 'REY RIZQI ANUGERAH', 1103210146, '1103210146'),
('praktikan', 246, 'REFFA KRESNA DWIFAYANGGA', 1103210147, '1103210147'),
('praktikan', 247, 'BARA KHRISNA RAKYAN N.', 1103210151, '1103210151'),
('praktikan', 248, 'AHMAD HARITS BURHANI', 1103210153, '1103210153'),
('praktikan', 249, 'PARIKESIT', 1103210154, '1103210154'),
('praktikan', 250, 'KERESNA DESTIN PERMANA', 1103210156, '1103210156'),
('praktikan', 251, 'FAJRI DWI KURNIA', 1103210157, '1103210157'),
('praktikan', 252, 'RIZQY ASYRAFF ATHALLAH', 1103210158, '1103210158'),
('praktikan', 253, 'MUHAMMAD AFIF FADHLURRAHMAN', 1103210161, '1103210161'),
('praktikan', 254, 'MUHAMMAD MAKHLUFI MAKBULLAH', 1103210171, '1103210171'),
('praktikan', 255, 'FAIZ HIBATULLAH', 1103210172, '1103210172'),
('praktikan', 256, 'MUHAMMAD IRFAN PERMANA', 1103210173, '1103210173'),
('praktikan', 257, 'IRAWAN MARDIANSYAH', 1103210174, '1103210174'),
('praktikan', 258, 'RHONNI IRAMA NOORHUDA', 1103210176, '1103210176'),
('praktikan', 259, 'MUHAMMAD FARREL AHADI TAMA', 1103210177, '1103210177'),
('praktikan', 260, 'M.ASJAUN', 1103210181, '1103210181'),
('praktikan', 261, 'MOCHAMAD IRGI', 1103210182, '1103210182'),
('praktikan', 262, 'ANGGI AMALIA', 1103210183, '1103210183'),
('praktikan', 263, 'HAFIDZ SHIDIQ', 1103210184, '1103210184'),
('praktikan', 264, 'NELLA APRILIA', 1103210185, '1103210185'),
('praktikan', 265, 'AMELIA PUTRI ANIYANTO', 1103210187, '1103210187'),
('praktikan', 266, 'JAMES MESAKH PRAKOSO', 1103210189, '1103210189'),
('praktikan', 267, 'KAVILLA ZOTA QURZIAN', 1103210190, '1103210190'),
('praktikan', 268, 'NUR IHSAN IBRAHIM ABDUL FATTAH', 1103210191, '1103210191'),
('praktikan', 269, 'MUHAMAD RIZQ RIHAZ', 1103210192, '1103210192'),
('praktikan', 270, 'ARIF AL IMRAN', 1103210193, '1103210193'),
('praktikan', 271, 'FACHRUROZI', 1103210194, '1103210194'),
('praktikan', 272, 'NAUFAL HANIF HAMDANI', 1103210197, '1103210197'),
('praktikan', 273, 'ADRIAN NAUFAL MAULANA', 1103210200, '1103210200'),
('praktikan', 274, 'YOHANES YOGAS HERLAMBANG', 1103210201, '1103210201'),
('praktikan', 275, 'HENDRI MAULANA AZWAR', 1103210202, '1103210202'),
('praktikan', 276, 'ANTARIKSA NUGRAHA', 1103210203, '1103210203'),
('praktikan', 277, 'HERO KARTIKO', 1103210205, '1103210205'),
('praktikan', 278, 'ANDIKA PRATAMA', 1103210206, '1103210206'),
('praktikan', 279, 'NICHOLAS ALVITO DIANDRA', 1103210207, '1103210207'),
('praktikan', 280, 'ARDIUS EBEN EZER SIMANJUNTAK', 1103210208, '1103210208'),
('praktikan', 281, 'HAEKAL ZAKI', 1103210209, '1103210209'),
('praktikan', 282, 'MUHAMMAD RAYYAN AQIILAH MANNA', 1103210210, '1103210210'),
('praktikan', 283, 'MUHAMMAD RAFLIKA DWIYANSYAH', 1103210211, '1103210211'),
('praktikan', 284, 'MUHAMMAD ASHLAH AFIFI', 1103210216, '1103210216'),
('praktikan', 285, 'DIMAS AHMAD NOORSAID', 1103210218, '1103210218'),
('praktikan', 286, 'BAYU ADITYA RAMADHANI PUTRA', 1103210219, '1103210219'),
('praktikan', 287, 'DWI SAPUTRA SOPAR SIAGIAN', 1103210220, '1103210220'),
('praktikan', 288, 'AFIF IBADURRAHMAN JALALUDDIN', 1103210221, '1103210221'),
('praktikan', 289, 'RAFI RABBANI EKANANDA', 1103210222, '1103210222'),
('praktikan', 290, 'SALMAN FARIS ROHIMAN', 1103210223, '1103210223'),
('praktikan', 291, 'KANSHA AIDIL FITRI BRAMANTYA', 1103210226, '1103210226'),
('praktikan', 292, 'FRANSISKUS ALEXANDER MARTUAHMAN', 1103210227, '1103210227');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil_ag`
--
ALTER TABLE `hasil_ag`
  ADD PRIMARY KEY (`id_ag`),
  ADD KEY `nim` (`nim`),
  ADD KEY `nim_2` (`nim`);

--
-- Indeks untuk tabel `hasil_ag_asisten`
--
ALTER TABLE `hasil_ag_asisten`
  ADD PRIMARY KEY (`id_ag`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `jadwal_mahasiswa`
--
ALTER TABLE `jadwal_mahasiswa`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `jadwal_ngajar`
--
ALTER TABLE `jadwal_ngajar`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_praktikum` (`id_praktikum`),
  ADD KEY `nim` (`nim`),
  ADD KEY `nim_2` (`nim`),
  ADD KEY `nim_3` (`nim`);

--
-- Indeks untuk tabel `jadwal_prak`
--
ALTER TABLE `jadwal_prak`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nim` (`nim`,`id_praktikum`),
  ADD KEY `id_praktikum` (`id_praktikum`),
  ADD KEY `nim_2` (`nim`);

--
-- Indeks untuk tabel `kuota_prak`
--
ALTER TABLE `kuota_prak`
  ADD PRIMARY KEY (`id_tambah_sh`);

--
-- Indeks untuk tabel `laborat`
--
ALTER TABLE `laborat`
  ADD PRIMARY KEY (`id_lab`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indeks untuk tabel `praktikum`
--
ALTER TABLE `praktikum`
  ADD PRIMARY KEY (`id_praktikum`),
  ADD KEY `id_praktikum` (`id_praktikum`,`id_ruang`),
  ADD KEY `id_lab` (`id_lab`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indeks untuk tabel `ruang_prak`
--
ALTER TABLE `ruang_prak`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nim` (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil_ag`
--
ALTER TABLE `hasil_ag`
  MODIFY `id_ag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT untuk tabel `hasil_ag_asisten`
--
ALTER TABLE `hasil_ag_asisten`
  MODIFY `id_ag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `jadwal_mahasiswa`
--
ALTER TABLE `jadwal_mahasiswa`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ngajar`
--
ALTER TABLE `jadwal_ngajar`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `jadwal_prak`
--
ALTER TABLE `jadwal_prak`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT untuk tabel `kuota_prak`
--
ALTER TABLE `kuota_prak`
  MODIFY `id_tambah_sh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT untuk tabel `laborat`
--
ALTER TABLE `laborat`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `praktikum`
--
ALTER TABLE `praktikum`
  MODIFY `id_praktikum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ruang_prak`
--
ALTER TABLE `ruang_prak`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_ag`
--
ALTER TABLE `hasil_ag`
  ADD CONSTRAINT `hasil_ag_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `users` (`nim`);

--
-- Ketidakleluasaan untuk tabel `hasil_ag_asisten`
--
ALTER TABLE `hasil_ag_asisten`
  ADD CONSTRAINT `hasil_ag_asisten_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `users` (`nim`);

--
-- Ketidakleluasaan untuk tabel `jadwal_mahasiswa`
--
ALTER TABLE `jadwal_mahasiswa`
  ADD CONSTRAINT `jadwal_mahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `users` (`nim`);

--
-- Ketidakleluasaan untuk tabel `jadwal_ngajar`
--
ALTER TABLE `jadwal_ngajar`
  ADD CONSTRAINT `jadwal_ngajar_ibfk_1` FOREIGN KEY (`id_praktikum`) REFERENCES `praktikum` (`id_praktikum`),
  ADD CONSTRAINT `jadwal_ngajar_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `users` (`nim`);

--
-- Ketidakleluasaan untuk tabel `jadwal_prak`
--
ALTER TABLE `jadwal_prak`
  ADD CONSTRAINT `jadwal_prak_ibfk_2` FOREIGN KEY (`id_praktikum`) REFERENCES `praktikum` (`id_praktikum`),
  ADD CONSTRAINT `jadwal_prak_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `users` (`nim`);

--
-- Ketidakleluasaan untuk tabel `praktikum`
--
ALTER TABLE `praktikum`
  ADD CONSTRAINT `praktikum_ibfk_1` FOREIGN KEY (`id_lab`) REFERENCES `laborat` (`id_lab`),
  ADD CONSTRAINT `praktikum_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang_prak` (`id_ruang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
