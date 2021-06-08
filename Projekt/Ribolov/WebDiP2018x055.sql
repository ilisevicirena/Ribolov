-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2019 at 06:03 PM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 7.2.17-1+0~20190412070953.20+jessie~1.gbp23a36d

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDiP2018x055`
--

-- --------------------------------------------------------

--
-- Table structure for table `Dnevnik`
--

CREATE TABLE `Dnevnik` (
  `ID_dnevnik` int(11) NOT NULL,
  `Datum_vrijeme` datetime NOT NULL,
  `Opis` text,
  `Tip_radnje_ID_radnja` int(11) NOT NULL,
  `Korisnik_Korisnicko_ime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Dnevnik`
--

INSERT INTO `Dnevnik` (`ID_dnevnik`, `Datum_vrijeme`, `Opis`, `Tip_radnje_ID_radnja`, `Korisnik_Korisnicko_ime`) VALUES
(49, '2019-05-23 14:47:55', 'Uspjesna promjena podataka: Admin Admin!', 1, 'admin'),
(50, '2019-05-23 14:50:23', 'Uspjesna promjena podataka: Admin Admin!', 1, 'admin'),
(51, '2019-05-23 14:51:17', 'Uspjesna promjena podataka: Admin Admin!', 1, 'admin'),
(52, '2019-05-23 14:51:26', 'Uspjesna promjena podataka: Admin Admin!', 1, 'admin'),
(53, '2019-05-23 14:55:36', 'Uspjesna promjena podataka: Admin Admin!', 1, 'admin'),
(54, '2019-05-23 14:57:19', 'Uspjesna promjena podataka: Admin Admin!', 1, 'admin'),
(57, '2019-05-23 15:00:44', 'Uspjesna promjena podataka: Moderator Moderator!', 1, 'moderator'),
(65, '2019-05-23 23:05:13', 'Izmjena: promjenjeni podaci o ribickom klubu', 1, 'admin'),
(66, '2019-05-23 23:05:30', 'Izmjena: promjenjeni podaci o ribickom klubu', 1, 'admin'),
(67, '2019-05-23 23:15:51', 'Izmjena: promjenjeni podaci o ribickom klubu klub novi ', 1, 'admin'),
(68, '2019-05-23 23:18:07', 'Izmjena: promjenjeni podaci o ribickom klubu klub novi ', 1, 'admin'),
(69, '2019-05-23 23:20:12', 'Izmjena: promjenjeni podaci o ribickom klubu klub novi ', 1, 'admin'),
(70, '2019-05-23 23:31:21', 'Izmjena: promjenjeni podaci o ribickom klubu klub novi ', 1, 'admin'),
(71, '2019-05-23 23:34:52', 'Izmjena: promjenjeni podaci o ribickom klubu klub novi ', 1, 'admin'),
(72, '2019-05-23 23:35:19', 'Izmjena: promjenjeni podaci o ribickom klubu Irena ', 1, 'admin'),
(73, '2019-05-23 23:37:40', 'Izmjena: promjenjeni podaci o ribickom klubu klub novi ', 1, 'admin'),
(74, '2019-05-23 23:47:07', 'Izmjena: promjenjeni podaci o ribickom klubu klub novi ', 1, 'admin'),
(75, '2019-05-23 23:49:45', 'Izmjena: promjenjeni podaci o ribickom klubu klub novi ', 1, 'admin'),
(76, '2019-05-23 23:58:35', 'Izmjena: promjenjeni podaci o ribickom klubu Irena', 1, 'admin'),
(77, '2019-05-24 00:05:06', 'Izmjena: promjenjeni podaci o ribickom klubu klub', 1, 'admin'),
(78, '2019-05-24 00:09:21', 'Izmjena: promjenjeni podaci o ribickom klubu klub novi', 1, 'admin'),
(79, '2019-05-24 00:14:51', 'Izmjena: promjenjeni podaci o ribickom klubu Irena', 1, 'admin'),
(80, '2019-05-24 00:24:30', 'Izmjena: promjenjeni podaci o ribickom klubu Irena', 1, 'admin'),
(81, '2019-05-24 00:30:31', 'Izmjena: promjenjeni podaci o ribickom klubu Irena', 1, 'admin'),
(82, '2019-05-24 00:37:26', 'Izmjena: promjenjeni podaci o ribickom klubu gfdgdfgfdgfgfdgf', 1, 'admin'),
(83, '2019-05-24 01:10:03', 'Izmjena: promjenjeni podaci o ribickom klubu klubovi', 1, 'admin'),
(84, '2019-05-24 02:32:29', 'Izmjena: promjenjeni podaci o natjecanju ', 1, 'admin'),
(86, '2019-05-24 14:57:37', 'Unos: dodana nova lokacija', 1, 'admin'),
(87, '2019-05-24 14:57:59', 'Izmjena: promjenjeni podaci o lokaciji Testna lokacija', 1, 'admin'),
(88, '2019-05-24 15:24:14', 'Izmjena: promjenjeni podaci o korisniku Irena Ili', 1, 'admin'),
(89, '2019-05-24 15:26:06', 'Uredi: Blokiran korisnik irenci', 1, 'admin'),
(90, '2019-05-24 15:26:13', 'Uredi: Odblokiran korisnik irenci', 1, 'admin'),
(93, '2019-05-24 15:50:53', 'Brisanje: Obrisan korisnik irena', 1, 'admin'),
(96, '2019-05-24 15:52:16', 'Izmjena: Blokiran korisnik admin', 3, 'admin'),
(97, '2019-05-24 15:52:19', 'Uredi: Odblokiran korisnik admin', 3, 'admin'),
(98, '2019-05-24 15:53:53', 'Odjava: UspjeÅ¡na odjava iz sustava!', 3, 'admin'),
(100, '2019-05-24 16:52:41', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(101, '2019-05-24 16:53:01', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(102, '2019-05-24 17:02:26', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(103, '2019-05-24 17:04:03', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(104, '2019-05-24 17:17:29', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(105, '2019-05-24 17:17:38', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(106, '2019-05-24 17:19:31', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(107, '2019-05-24 17:19:38', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(108, '2019-05-24 17:19:48', 'Prijava: Uspjesna prijava u sustav!', 1, 'moderator'),
(109, '2019-05-24 17:20:15', 'Unos: Neuspjesna prijava na natjecanje', 3, 'moderator'),
(110, '2019-05-26 23:47:42', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(111, '2019-05-26 23:49:15', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(112, '2019-05-26 23:49:32', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(113, '2019-05-26 23:50:41', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(114, '2019-05-26 23:50:51', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(115, '2019-05-26 23:52:29', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(116, '2019-05-26 23:53:37', 'Unos: Neuspjesna prijava na natjecanje', 3, 'admin'),
(117, '2019-05-26 23:55:51', 'Unos: dodana nova prijava', 3, 'admin'),
(118, '2019-05-27 00:06:16', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(119, '2019-05-27 00:06:21', 'Prijava: Uspjesna prijava u sustav!', 1, 'korisnik'),
(120, '2019-05-27 00:06:31', 'Odjava: Uspjesna odjava iz sustava!', 3, 'korisnik'),
(121, '2019-05-27 00:10:55', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(122, '2019-05-27 01:22:34', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(123, '2019-05-27 01:35:09', 'Izmjena: Prihvacena prijava 1', 3, 'admin'),
(124, '2019-05-27 01:35:24', 'Izmjena: Odbijena prijava 4', 3, 'admin'),
(125, '2019-05-27 01:35:35', 'Brisanje: Obrisana prijava 7', 3, 'admin'),
(126, '2019-05-27 15:56:47', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(127, '2019-05-27 22:18:38', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(128, '2019-05-27 22:31:25', 'Izmjena: Prihvacena prijava 3', 3, 'admin'),
(129, '2019-05-27 22:37:37', 'Izmjena: Izmjenjeni podaci o prijavi 1', 3, 'admin'),
(130, '2019-05-28 00:05:57', 'Izmjena: Dodijeljeni bodovi korisniku iilisevic', 3, 'admin'),
(131, '2019-05-28 00:30:36', 'Unos: Novi zahtjev za pobjednikom zzivkovic', 3, 'admin'),
(132, '2019-05-28 00:32:04', 'Unos: Novi zahtjev za pobjednikom iilisevic', 3, 'admin'),
(133, '2019-05-28 00:32:20', 'Unos: Novi zahtjev za pobjednikom iilisevic', 3, 'admin'),
(134, '2019-05-28 00:43:18', 'Unos: Novi zahtjev za pobjednikom pperic', 3, 'admin'),
(135, '2019-05-28 00:44:45', 'Izmjena: Dodijeljeni bodovi korisniku iilisevic', 3, 'admin'),
(136, '2019-05-28 00:44:54', 'Unos: Novi zahtjev za pobjednikom iilisevic', 3, 'admin'),
(137, '2019-05-28 00:44:54', 'Unos: Novi zahtjev za pobjednikom pperic', 3, 'admin'),
(138, '2019-05-28 00:46:48', 'Unos: Novi zahtjev za pobjednikom iilisevic', 3, 'admin'),
(139, '2019-05-28 00:46:48', 'Unos: Novi zahtjev za pobjednikom pperic', 3, 'admin'),
(140, '2019-05-28 00:48:06', 'Unos: Novi zahtjev za pobjednikom iilisevic', 3, 'admin'),
(141, '2019-05-28 00:48:06', 'Unos: Novi zahtjev za pobjednikom pperic', 3, 'admin'),
(142, '2019-05-28 00:50:52', 'Unos: Novi zahtjev za pobjednikom iilisevic', 3, 'admin'),
(143, '2019-05-28 00:50:52', 'Unos: Novi zahtjev za pobjednikom pperic', 3, 'admin'),
(144, '2019-05-28 15:17:20', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(145, '2019-05-28 15:51:19', 'Izmjena: promjenjeni podaci o zahtjevu 3', 3, 'admin'),
(146, '2019-05-28 15:51:54', 'Brisanje: Obrisan zahtjev za pobjednikom 4', 3, 'admin'),
(147, '2019-05-28 15:54:23', 'Unos: Dodan novi pobjednik za natjecanje 2', 3, 'admin'),
(148, '2019-05-28 15:55:14', 'Izmjena: Odbijen zahtjev za pobjednikom 9', 3, 'admin'),
(149, '2019-05-28 16:09:41', 'Aktivacija: Aktiviran korisnik ajurisic', 5, 'admin'),
(150, '2019-05-28 15:40:15', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(151, '2019-05-28 15:40:15', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(152, '2019-05-28 15:40:15', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(153, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(154, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(155, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(156, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(157, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(158, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(159, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(160, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(161, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(162, '2019-05-28 15:40:16', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(163, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(164, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(165, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(166, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(167, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(168, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(169, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(170, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(171, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(172, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(173, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(174, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(175, '2019-05-28 15:42:10', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(176, '2019-05-28 15:42:34', 'Izmjena: Prihvaceni uvjeti koristenja!', 3, 'iilisevic'),
(177, '2019-05-28 16:28:18', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(178, '2019-05-28 16:28:25', 'Prijava: Uspjesna prijava u sustav!', 1, 'moderator'),
(179, '2019-05-28 16:29:07', 'Odjava: Uspjesna odjava iz sustava!', 3, 'moderator'),
(180, '2019-05-28 16:29:12', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(181, '2019-05-28 16:49:34', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(182, '2019-05-28 17:00:11', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(183, '2019-05-28 18:42:34', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(184, '2019-05-28 18:42:36', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(185, '2019-05-28 18:42:38', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(186, '2019-05-28 18:42:39', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(187, '2019-05-28 18:42:39', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(188, '2019-05-28 18:42:41', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(189, '2019-05-28 18:42:41', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(190, '2019-05-28 18:42:42', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(191, '2019-05-28 18:45:32', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(192, '2019-05-28 18:45:32', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(193, '2019-05-28 18:45:32', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(194, '2019-05-28 18:45:32', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(195, '2019-05-28 18:45:32', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(196, '2019-05-28 18:45:32', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(197, '2019-05-28 18:45:33', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(198, '2019-05-28 18:45:33', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(199, '2019-05-28 18:45:33', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(200, '2019-05-28 18:45:33', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(201, '2019-05-28 18:45:33', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(202, '2019-05-28 18:45:33', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(203, '2019-05-28 18:45:33', 'Izmjena: Resetirani uvjeti koristenja!', 3, 'admin'),
(204, '2019-05-28 18:45:50', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(205, '2019-05-28 18:46:00', 'Izmjena: Prihvaceni uvjeti koristenja!', 3, 'iilisevic'),
(206, '2019-05-28 18:56:58', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(207, '2019-05-28 18:57:02', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(208, '2019-05-28 18:57:05', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(209, '2019-05-28 18:57:10', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(210, '2019-05-28 18:57:12', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(211, '2019-05-28 18:59:40', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(212, '2019-05-28 20:27:36', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(213, '2019-05-28 20:27:41', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(214, '2019-05-28 20:27:43', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(215, '2019-05-28 20:27:45', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(216, '2019-05-28 20:28:24', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(217, '2019-05-29 14:25:30', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(218, '2019-05-29 14:25:33', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(219, '2019-05-29 14:25:33', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(220, '2019-05-29 14:25:33', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(221, '2019-05-29 15:09:38', 'Unos: Dodijeljen novi moderator klubu 8', 3, 'admin'),
(222, '2019-05-29 15:12:43', 'Izmjena: Promjenjen moderator kluba 8', 3, 'admin'),
(223, '2019-05-29 15:13:00', 'Izmjena: Promjenjen moderator kluba 8', 3, 'admin'),
(224, '2019-05-29 15:14:41', 'Unos: Dodijeljen novi moderator klubu 8', 3, 'admin'),
(225, '2019-05-29 15:19:40', 'Izmjena: Promjenjen moderator kluba 8', 3, 'admin'),
(226, '2019-05-29 15:20:29', 'Unos: Dodijeljen novi moderator klubu 2', 3, 'admin'),
(227, '2019-05-29 15:21:14', 'Izmjena: Promjenjen moderator kluba 2', 3, 'admin'),
(228, '2019-05-29 15:22:03', 'Izmjena: Promjenjen moderator kluba 2', 3, 'admin'),
(229, '2019-05-29 15:22:11', 'Brisanje: Obrisan moderator kluba 2', 3, 'admin'),
(230, '2019-05-29 17:58:17', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(231, '2019-05-29 18:04:41', 'Izmjena: Blokiran korisnik ffilipovic', 3, 'admin'),
(232, '2019-05-29 18:13:25', 'Izmjena: Promjenjeni podaci o korisniku Andreja Jurisic', 3, 'admin'),
(233, '2019-05-29 18:16:25', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(234, '2019-05-29 18:16:30', 'Prijava: Uspjesna prijava u sustav!', 1, 'moderator'),
(235, '2019-05-29 18:16:30', 'Prijava: Uspjesna prijava u sustav!', 1, 'moderator'),
(236, '2019-05-29 18:16:32', 'Prijava: Uspjesna prijava u sustav!', 1, 'moderator'),
(237, '2019-05-29 18:19:43', 'Odjava: Uspjesna odjava iz sustava!', 3, 'moderator'),
(238, '2019-05-29 18:20:38', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(239, '2019-05-29 18:22:35', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(240, '2019-05-29 18:24:17', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(241, '2019-05-29 18:24:50', 'Prijava: Uspjesna prijava u sustav!', 1, 'jjosipovic'),
(242, '2019-05-29 18:25:13', 'Odjava: Uspjesna odjava iz sustava!', 3, 'jjosipovic'),
(243, '2019-05-29 18:26:56', 'Odjava: Uspjesna odjava iz sustava!', 3, 'jjosipovic'),
(244, '2019-05-29 18:27:08', 'Prijava: Uspjesna prijava u sustav!', 1, 'jjosipovic'),
(245, '2019-05-29 18:27:22', 'Odjava: Uspjesna odjava iz sustava!', 3, 'jjosipovic'),
(246, '2019-05-29 18:27:30', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(247, '2019-05-29 18:29:29', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(248, '2019-05-29 18:29:36', 'Prijava: Uspjesna prijava u sustav!', 1, 'jjosipovic'),
(249, '2019-05-29 18:29:47', 'Odjava: Uspjesna odjava iz sustava!', 3, 'jjosipovic'),
(250, '2019-05-29 18:31:21', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(251, '2019-05-29 18:31:28', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(252, '2019-05-29 18:31:48', 'Prijava: Uspjesna prijava u sustav!', 1, 'jjosipovic'),
(253, '2019-05-29 18:32:01', 'Odjava: Uspjesna odjava iz sustava!', 3, 'jjosipovic'),
(254, '2019-05-29 18:32:36', 'Prijava: Uspjesna prijava u sustav!', 1, 'zzivkovic'),
(255, '2019-05-29 18:33:18', 'Odjava: Uspjesna odjava iz sustava!', 3, 'zzivkovic'),
(256, '2019-05-29 21:14:00', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(257, '2019-05-31 13:46:46', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(258, '2019-05-31 21:42:31', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(259, '2019-06-02 20:22:35', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(260, '2019-06-03 17:46:43', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(261, '2019-06-03 18:40:24', 'Unos: Dodana nova prijava', 3, 'admin'),
(262, '2019-06-03 20:47:02', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(263, '2019-06-03 21:44:49', 'Izmjena: Promjenjeni podaci o korisniku Anja Horvatinovic', 3, 'admin'),
(264, '2019-06-03 22:07:10', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(265, '2019-06-04 00:39:54', 'Prijava: Uspjesna prijava u sustav!', 1, 'korisnik'),
(266, '2019-06-04 00:42:59', 'Odjava: Uspjesna odjava iz sustava!', 3, 'korisnik'),
(267, '2019-06-04 00:43:07', 'Prijava: Uspjesna prijava u sustav!', 1, 'moderator'),
(268, '2019-06-04 00:45:43', 'Odjava: Uspjesna odjava iz sustava!', 3, 'moderator'),
(269, '2019-06-04 00:45:54', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(270, '2019-06-04 00:49:24', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(271, '2019-06-04 15:28:37', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(272, '2019-06-04 15:32:31', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(273, '2019-06-04 15:35:20', 'Registracija: UspjeÅ¡na registracija korisnika: Irena Test!', 4, 'aanic'),
(274, '2019-06-04 15:35:46', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(275, '2019-06-04 15:36:47', 'Aktivacija: UspjeÅ¡na aktivacija korisniÄkog raÄuna!', 5, 'aanic'),
(276, '2019-06-04 15:37:06', 'Prijava: Uspjesna prijava u sustav!', 1, 'aanic'),
(277, '2019-06-04 15:38:20', 'Unos: Dodana nova prijava', 3, 'aanic'),
(278, '2019-06-04 15:38:49', 'Izmjena: Prihvacena prijava 19', 3, 'admin'),
(279, '2019-06-04 15:41:23', 'Izmjena: Promjenjeni podaci o korisniku Irena Test', 3, 'admin'),
(282, '2019-06-04 15:44:50', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(283, '2019-06-05 17:16:42', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(284, '2019-06-05 17:16:57', 'Unos: Novi zahtjev za pobjednikom iilisevic', 3, 'admin'),
(285, '2019-06-05 17:16:57', 'Unos: Novi zahtjev za pobjednikom pperic', 3, 'admin'),
(286, '2019-06-05 17:31:23', 'Izmjena: Promjenjeni podaci o pobjedniku natjecanja 8', 3, 'admin'),
(287, '2019-06-05 18:30:58', 'Izmjena: Blokiran korisnik ahorvatinovicc', 3, 'admin'),
(288, '2019-06-05 19:00:58', 'Uredi: Odblokiran korisnik ahorvatinovicc', 3, 'admin'),
(289, '2019-06-05 19:03:19', 'Uredi: Odblokiran korisnik ajurisicc', 3, 'admin'),
(290, '2019-06-05 19:54:03', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(291, '2019-06-05 21:48:22', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(292, '2019-06-05 21:48:51', 'Brisanje: Obrisan klub 14', 3, 'admin'),
(293, '2019-06-05 22:06:42', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(294, '2019-06-05 22:07:49', 'Prijava: Uspjesna prijava u sustav!', 1, 'moderator'),
(295, '2019-06-05 22:11:32', 'Odjava: Uspjesna odjava iz sustava!', 3, 'moderator'),
(296, '2019-06-05 22:11:38', 'Prijava: 1. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'korisnik'),
(297, '2019-06-05 22:11:56', 'Prijava: Uspjesna prijava u sustav!', 1, 'korisnik'),
(298, '2019-06-05 22:12:51', 'Unos: Dodana nova prijava', 3, 'korisnik'),
(299, '2019-06-05 22:13:55', 'Izmjena: Korisnik Korisnik Korisnik promijenio podatke !', 3, 'korisnik'),
(300, '2019-06-05 22:14:25', 'Odjava: Uspjesna odjava iz sustava!', 3, 'korisnik'),
(301, '2019-06-05 22:14:34', 'Prijava: Uspjesna prijava u sustav!', 1, 'zzivkovic'),
(302, '2019-06-05 22:16:49', 'Odjava: Uspjesna odjava iz sustava!', 3, 'zzivkovic'),
(303, '2019-06-06 15:38:29', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(304, '2019-06-06 15:39:11', 'Izmjena: Promjenjeni podaci o lokaciji Kupa', 3, 'admin'),
(305, '2019-06-06 15:39:41', 'Unos: dodana nova lokacija Testnalokacija', 3, 'admin'),
(306, '2019-06-06 15:40:08', 'Brisanje: Obrisana lokacija 22', 3, 'admin'),
(307, '2019-06-06 15:41:15', 'Unos: dodano novo natjecanje Testno natjecanje', 3, 'admin'),
(308, '2019-06-06 15:41:42', 'Izmjena: promjenjeni podaci o natjecanju ', 3, 'admin'),
(309, '2019-06-06 15:41:56', 'Brisanje: Obrisano natjecanje 23', 3, 'admin'),
(310, '2019-06-06 15:43:12', 'Unos: dodan novi ribicki klub Klub ribicki', 3, 'admin'),
(311, '2019-06-06 15:43:35', 'Izmjena: Promjenjeni podaci o ribickom klubu Klub ribicki', 3, 'admin'),
(312, '2019-06-06 15:45:29', 'Izmjena: Blokiran korisnik aanic', 3, 'admin'),
(313, '2019-06-06 15:45:39', 'Uredi: Odblokiran korisnik aanic', 3, 'admin'),
(314, '2019-06-06 15:47:11', 'Izmjena: Prihvacena prijava 1', 3, 'admin'),
(315, '2019-06-06 15:47:59', 'Unos: Novi zahtjev za pobjednikom hhorvat', 3, 'admin'),
(316, '2019-06-06 15:47:59', 'Unos: Novi zahtjev za pobjednikom sslavkovic', 3, 'admin'),
(317, '2019-06-06 15:49:14', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(318, '2019-06-06 15:56:50', 'Prijava: Uspjesna prijava u sustav!', 1, 'korisnik'),
(319, '2019-06-06 15:58:04', 'Odjava: Uspjesna odjava iz sustava!', 3, 'korisnik'),
(320, '2019-06-06 16:01:55', 'Prijava: 1. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'admin'),
(321, '2019-06-06 16:02:31', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(322, '2019-06-06 16:02:59', 'Izmjena: Blokiran korisnik aanic', 3, 'admin'),
(323, '2019-06-06 16:06:42', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(324, '2019-06-07 14:51:05', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(325, '2019-06-07 14:51:42', 'Izmjena: Prihvacena prijava 9', 3, 'admin'),
(326, '2019-06-07 14:57:13', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(327, '2019-06-07 14:57:20', 'Prijava: Uspjesna prijava u sustav!', 1, 'ajurisic'),
(328, '2019-06-07 14:57:25', 'Odjava: Uspjesna odjava iz sustava!', 3, 'ajurisic'),
(329, '2019-06-07 14:57:32', 'Prijava: 1. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'ajurisic'),
(330, '2019-06-07 14:57:48', 'Prijava: 2. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'ajurisic'),
(331, '2019-06-07 14:58:09', 'Prijava: 3. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'ajurisic'),
(332, '2019-06-07 14:58:09', 'Prijava: Pokusaj prijave u sustav zakljucanog korisnika!', 1, 'ajurisic'),
(333, '2019-06-07 14:58:21', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(334, '2019-06-07 14:58:28', 'Aktivacija: Aktiviran korisnik ajurisic', 5, 'admin'),
(335, '2019-06-07 14:58:57', 'Aktivacija: Aktiviran korisnik ajurisic', 5, 'admin'),
(336, '2019-06-07 14:58:59', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(337, '2019-06-07 14:59:05', 'Prijava: Pokusaj prijave u sustav zakljucanog korisnika!', 1, 'ajurisic'),
(338, '2019-06-07 15:01:57', 'Prijava: Uspjesna prijava u sustav!', 1, 'ajurisic'),
(339, '2019-06-07 15:01:59', 'Odjava: Uspjesna odjava iz sustava!', 3, 'ajurisic'),
(340, '2019-06-07 15:02:05', 'Prijava: 1. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'ajurisic'),
(341, '2019-06-07 15:02:11', 'Prijava: 2. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'ajurisic'),
(342, '2019-06-07 15:02:17', 'Prijava: 3. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'ajurisic'),
(343, '2019-06-07 15:02:17', 'Prijava: Pokusaj prijave u sustav zakljucanog korisnika!', 1, 'ajurisic'),
(344, '2019-06-07 15:02:25', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(345, '2019-06-07 15:02:53', 'Aktivacija: Aktiviran korisnik ajurisic', 5, 'admin'),
(346, '2019-06-07 15:02:58', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(347, '2019-06-07 15:03:03', 'Prijava: Uspjesna prijava u sustav!', 1, 'ajurisic'),
(348, '2019-06-07 15:03:17', 'Odjava: Uspjesna odjava iz sustava!', 3, 'ajurisic'),
(349, '2019-06-07 15:05:50', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(350, '2019-06-07 15:06:08', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(351, '2019-06-07 15:06:15', 'Prijava: 1. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'ajurisic'),
(352, '2019-06-07 15:06:27', 'Prijava: 2. put unesena pogresna lozinka prilikom prijave u sustav!', 1, 'ajurisic'),
(353, '2019-06-07 15:06:27', 'Prijava: Pokusaj prijave u sustav zakljucanog korisnika!', 1, 'ajurisic'),
(354, '2019-06-07 15:06:33', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(355, '2019-06-07 15:06:39', 'Aktivacija: Aktiviran korisnik ajurisic', 5, 'admin'),
(356, '2019-06-07 15:07:22', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin'),
(357, '2019-06-07 15:45:19', 'Prijava: Uspjesna prijava u sustav!', 1, 'admin'),
(358, '2019-06-07 16:09:44', 'Odjava: Uspjesna odjava iz sustava!', 3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Konfiguracija`
--

CREATE TABLE `Konfiguracija` (
  `ID` int(11) NOT NULL,
  `kljuc` varchar(20) NOT NULL,
  `vrijednost` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Konfiguracija`
--

INSERT INTO `Konfiguracija` (`ID`, `kljuc`, `vrijednost`) VALUES
(1, 'pomak', '1'),
(2, 'stranicenje', '7'),
(3, 'aktivacija', '7'),
(4, 'zakljucavanje', '3'),
(5, 'kolacic', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Korisnik`
--

CREATE TABLE `Korisnik` (
  `Korisnicko_ime` varchar(20) NOT NULL,
  `Ime` varchar(45) NOT NULL,
  `Prezime` varchar(45) NOT NULL,
  `Datum_rodenja` date NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Lozinka_citljivo` varchar(45) NOT NULL,
  `Lozinka_kriptirano` char(40) NOT NULL,
  `Adresa` text,
  `Datum_registracije` datetime NOT NULL,
  `Aktiviran` tinyint(4) NOT NULL,
  `Uvjeti_koristenja` text NOT NULL,
  `Blokiran` tinyint(4) NOT NULL,
  `Slika` text,
  `Tip_korisnika_ID_tip` int(11) NOT NULL,
  `Ribicki_klub_ID_klub` int(11) DEFAULT NULL,
  `Status_prijava` int(11) DEFAULT NULL,
  `Status_aktivacije` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Korisnik`
--

INSERT INTO `Korisnik` (`Korisnicko_ime`, `Ime`, `Prezime`, `Datum_rodenja`, `Email`, `Lozinka_citljivo`, `Lozinka_kriptirano`, `Adresa`, `Datum_registracije`, `Aktiviran`, `Uvjeti_koristenja`, `Blokiran`, `Slika`, `Tip_korisnika_ID_tip`, `Ribicki_klub_ID_klub`, `Status_prijava`, `Status_aktivacije`) VALUES
('aanic', 'Ana', 'Anic', '1993-06-05', 'aanic@riba.com', 'aanic', '897017eb5bdd488c71ed104fdeb25328cddaab0c', 'Zagreb', '2019-06-04 15:35:20', 1, '1', 1, 'user.png', 3, 3, 0, '1'),
('admin', 'Admin', 'Admin', '1997-07-07', 'irenailisevic@gmail.com', 'admin', 'c4dbbdbdd5dc0fd0844c10ccf235477d84a4192c', 'Adminova je ovo adresa', '2019-05-22 00:00:00', 1, '1', 0, 'admin.png', 4, NULL, 0, NULL),
('ahorvatinovic', 'Anja', 'Horvatinovic', '1997-05-30', 'ahorvatin@riba.com', 'ahorvatin', 'ec36264bac5972b6d7686c0a7b35d665c58751cd', 'Varazdin', '2019-04-02 13:31:31', 1, '1', 0, 'profilna.jpg', 3, 6, 0, NULL),
('ajurisic', 'Andreja', 'Jurisic', '1997-05-08', 'andreja@riba.com', 'ajurisic', '0a139c483ef765e7be935a3ee48bb0763341eef8', 'Andrejina je ovo adresa', '2019-04-09 08:32:22', 1, '1', 0, 'profilna1.png', 2, 2, 0, NULL),
('bbrankovic', 'Branko', 'Brankovic', '1962-02-02', 'bbrankovic@riba.com', 'bbrankovic', '7620e11e5f7dcb0f1eb492b4ae27c8fd034a4f5a', 'Bjelovar', '2019-06-03 00:00:00', 1, '1', 0, 'profilna2.jpg', 3, 4, 0, NULL),
('dkopic', 'Dajana', 'Kopic', '1997-11-27', 'dkopic@riba.com', 'dkopic', '91778437dcf6172da1b5511d8c049dda662c47ab', 'Orasje', '2019-04-01 00:00:00', 0, '142216773270326955333601422230891', 1, 'profilna3.png', 2, NULL, 0, NULL),
('ffilipovic', 'Filip', 'Filipovic', '1968-12-08', 'ffilipovic@admin.com', 'ffilipovic', 'eb06ec98ce1e0bdfd707e0454b1c87b4f88fe1e0', 'Filipovici 66', '2019-04-01 06:46:31', 0, '27547658134446665481658773761684', 1, 'profilna4.png', 3, NULL, NULL, NULL),
('hhorvat', 'Hrvoje', 'Horvat', '1985-02-20', 'hhorvat@riba.hr', 'hhorvat', '6d707bd66c3849ba2356b0e7d66fcf96e39694d4', 'Horvatinovici 2', '2019-04-01 00:00:00', 0, '5158378998873604822001163192361994', 0, 'profilna5.png', 2, 7, NULL, NULL),
('iilisevic', 'Irena', 'Ilisevic', '1997-07-04', 'iilisevic@riba.com', '4151549866', '579a229700f66476d93db21774503b4219d5badb', 'Julija Merlica 9, 42000 Varazdin', '2019-04-05 10:23:19', 0, '1', 1, 'korisnik1.jpg', 2, NULL, NULL, NULL),
('iivic', 'Ivan', 'Ivic', '1956-03-02', 'iivic@riba.hr', 'iivic', '7c22e5f115aa06d795fbb25a57ff055a3685eae7', 'Jastrebarska 25', '2019-03-06 00:00:00', 0, '8236712343643742063387621119268158', 0, 'profilna5.png', 3, 5, NULL, NULL),
('jjosipovic', 'Josip', 'Josipovic', '1968-12-03', 'jjosipovic@riba.hr', 'jjosipovic', 'ae4f8189448dd31d6db9ef7ff53d53fb596a7ba2', 'B. Radic 258, Zagreb', '2019-04-08 06:15:14', 0, '4123519650079301149601287578505645', 0, NULL, 1, NULL, 0, NULL),
('kkos', 'Karlo', 'Kos', '1995-05-05', 'kkos@riba.com', 'kkos', '84635cdfd4d7fd07362f9dcbc16c79a34df40c1c', 'Karlovac', '2019-06-04 00:00:00', 1, '1', 1, 'profilna7.png', 2, 6, NULL, NULL),
('korisnik', 'Korisnik', 'Korisnik', '1999-09-09', 'korisnik@korisnik.com', 'korisnik', '57c669f19bfbfdd89a8489e987e706c1c3fa051f', 'Korisnikova je ovo adresa', '2019-05-15 00:00:00', 1, '506949939789693377997604768711700', 0, 'korisnik.jpg', 2, NULL, 0, NULL),
('llukic', 'Luka', 'Lukic', '1988-08-08', 'llukic@riba.com', 'llukic', 'b1a92dc947edb77a347f75d7e0719340ea03aa60', 'Lukavac', '2019-06-02 00:00:00', 1, '1', 0, NULL, 2, 4, NULL, NULL),
('mmartinovic', 'Marko', 'Martinovic', '1975-05-05', 'mmartinovic@riba.com', 'mmartinovic', 'fb084fa8aefaf66d94121ebc4a901ccb93536dba', 'Makarska', '2019-06-01 07:50:00', 1, '1', 1, NULL, 2, 4, 3, NULL),
('moderator', 'Moderator', 'Moderator', '2019-05-08', 'moderator@admin.com', 'moderator', '6812d7014f835dc4dc7a1098cd4d473dac933f99', '', '2019-05-14 00:00:00', 1, '6889701497779805158263559746029409', 0, 'moderator.png', 3, NULL, 0, NULL),
('pperic', 'Pero', 'Peric', '1988-08-08', 'pperic@riba.hr', 'pperic', 'cebb9820d2ec685b7a2960e1316de78446fc3bcb', 'Radnicka cesta 3, Zagreb', '2019-04-16 04:32:19', 0, '5013697323637945663321981923034904', 0, NULL, 4, 5, NULL, NULL),
('sslavkovic', 'Slavko', 'Slavkovic', '1953-03-03', 'sslavkovic@riba.com', 'sslavkovic', 'de1404b0d61ec9f7678cd0367ed90a7188b265db', 'Slatina', '2019-06-01 00:00:00', 0, '1', 1, NULL, 2, 10, 2, NULL),
('ttomic', 'Tomislav', 'Tomic', '1986-01-16', 'ttomic@riba.com', 'ttomic', 'aff24502ce5ebaa9353ecf9f58bd050dbb890a45', 'Tomislavgrad', '2019-06-02 16:00:00', 0, '0', 0, NULL, 2, 7, NULL, NULL),
('zzivkovic', 'Zvonimir', 'Zivkovic', '1986-01-16', 'zzivkovic', 'zzivkovic', '1a83d21563f53419889c123c0d5fd8b0c9eaac23', 'Hrvatskog proljeca 10, Zagreb', '2019-03-06 05:12:41', 1, '4584502248755624348673835736089388', 0, 'korisnik3.jpg', 3, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Korisnik_natjecanje`
--

CREATE TABLE `Korisnik_natjecanje` (
  `Bodovi` int(11) DEFAULT NULL,
  `Korisnik_Korisnicko_ime` varchar(20) NOT NULL,
  `Prijava_ID_prijava` int(11) NOT NULL,
  `Natjecanje_ID_natjecanje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Korisnik_natjecanje`
--

INSERT INTO `Korisnik_natjecanje` (`Bodovi`, `Korisnik_Korisnicko_ime`, `Prijava_ID_prijava`, `Natjecanje_ID_natjecanje`) VALUES
(NULL, 'aanic', 19, 7),
(100, 'aanic', 28, 2),
(NULL, 'admin', 24, 4),
(30, 'ahorvatinovic', 32, 20),
(NULL, 'ajurisic', 3, 7),
(NULL, 'dkopic', 22, 5),
(25, 'hhorvat', 27, 1),
(NULL, 'jjosipovic', 5, 4),
(50, 'jjosipovic', 10, 8),
(200, 'kkos', 30, 9),
(80, 'kkos', 31, 16),
(NULL, 'korisnik', 23, 5),
(105, 'korisnik', 29, 3),
(53, 'korisnik', 33, 21),
(NULL, 'llukic', 25, 7),
(NULL, 'pperic', 21, 6),
(25, 'sslavkovic', 26, 1),
(NULL, 'ttomic', 20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Lokacija`
--

CREATE TABLE `Lokacija` (
  `ID_lokacija` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL,
  `Adresa` text NOT NULL,
  `Opis` text,
  `Velicina` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Lokacija`
--

INSERT INTO `Lokacija` (`ID_lokacija`, `Naziv`, `Adresa`, `Opis`, `Velicina`) VALUES
(1, 'Zabnik', 'Zabnik, Sv. Martin na Muri', 'Staza za kategoriju master, dubina 1-1,2m, riba: patuljasti somic, zutooka, keder, deverika, babuska.', '500m^2'),
(2, 'Podturen', 'Stara Mura Podturen', 'Staza za invalide, riba: patuljasti somic, zutooka, keder, deverika, babuska.', '200m^2'),
(3, 'Selnica', 'Ribnjak Selnica', 'Staza za kategoriju veterana, riba: babuska, patuljasti somic, keder, saran, zutooka', '300m^2'),
(4, 'Drava', 'Varazdin', 'Riba: som, saran, stuka, smud, bass, zlatni i crveni karas, amur, manjic...', '65 km'),
(5, 'Mura', 'Sv. Martin na Muri', 'Riba: som, saran, stuka, bass, zlatni i crveni karas, amur, manjic, stukabolen, jez, mrena, pastrva, mladica, babuska, deverika, tolstolobik, klen, linjak, i druga vrsta bijele ribe.', '7 km'),
(6, 'Rasinja', 'Jezero Rasinja na rubu naselja Rasinja', 'Jezero obiluje saranima, prosjecna dubina je od 1 do 6 metara.', '35 ha'),
(7, 'Jeskovo', 'Jezero Jeskovo u blizini sela Gola', 'Jezero je biser Podravine, bogato stukom, saranima, amurima i dr.', '200m^2'),
(8, 'Autoput', 'Jezero Autoput, Koprivnicko-krizevacka zupanija', 'Sastoji se od 15-ak jezerca u kojima je u fazi visok stupanj eutrofizacije tako da su ve?ina od njih bare (mrtvice). Jezero je bogato saranom i drugim vrstama riba, posebno bassom', '200m^2'),
(9, 'Drnic', 'Drnic jezero u Novom Virju', 'Jezero je bogato saranom, bassom i posebno je poznato po kapitalnim primjercima stuke', '3 ha'),
(10, 'Ormosko jezero', 'Dio kraja jezera i pripadajuci rukavci i mrtvaje u opcini Petrijanec (oko 650 metara uzvodno od brane u Strmcu', 'Riba: stuka, smud, mladica, potocna pastrva', '650 m'),
(12, 'Una', 'Unina adresa', 'Ribe: saran, stuka, pastrva', '300km'),
(13, 'Sana', 'Sana', 'Stuka, saran', '200km'),
(14, 'Dunav', 'Dunavska adresa', 'Smud, saran, stuka', '500km'),
(15, 'Drina', 'Drinina adresa', 'Saran, stuka, smud', '200km'),
(16, 'Kupa', 'Kupa', 'Saran', '297km'),
(17, 'Krka', 'Krka', 'Saran, stuka', '79km'),
(18, 'Cetina', 'Cetinska adresa', 'Saran, stuka, smud', '101 km'),
(19, 'Zrmanja', 'Zrmanja', 'Stuka, saran', '69km'),
(20, 'Mreznica', 'Mreznica', 'Stuka, saran, bass', '67km'),
(21, 'Dobra', 'Dobra', 'Bass, saran, stuka', '104km');

-- --------------------------------------------------------

--
-- Table structure for table `Moderator_klub`
--

CREATE TABLE `Moderator_klub` (
  `Datum` datetime NOT NULL,
  `Korisnik_Korisnicko_ime` varchar(20) NOT NULL,
  `Ribicki_klub_ID_klub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Moderator_klub`
--

INSERT INTO `Moderator_klub` (`Datum`, `Korisnik_Korisnicko_ime`, `Ribicki_klub_ID_klub`) VALUES
('2019-06-04 00:00:00', 'moderator', 2),
('2019-04-05 00:00:00', 'ahorvatinovic', 3),
('2019-04-01 00:00:00', 'zzivkovic', 5),
('2019-04-05 00:00:00', 'zzivkovic', 6),
('2019-04-05 00:00:00', 'ahorvatinovic', 7),
('2019-04-05 00:00:00', 'ffilipovic', 9),
('2019-06-02 00:00:00', 'aanic', 15),
('2019-06-07 00:00:00', 'ffilipovic', 16),
('2019-06-09 00:00:00', 'bbrankovic', 17),
('2019-06-04 00:00:00', 'aanic', 18),
('2019-06-03 00:00:00', 'ahorvatinovic', 19),
('2019-06-10 00:00:00', 'moderator', 20),
('2019-06-02 00:00:00', 'moderator', 21),
('2019-06-04 00:00:00', 'bbrankovic', 22),
('2019-06-10 00:00:00', 'bbrankovic', 22),
('2019-06-02 00:00:00', 'aanic', 24);

-- --------------------------------------------------------

--
-- Table structure for table `Natjecanje`
--

CREATE TABLE `Natjecanje` (
  `ID_natjecanje` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL,
  `Opis` text NOT NULL,
  `Pocetak` datetime NOT NULL,
  `Zavrsetak` datetime NOT NULL,
  `Lokacija_ID_lokacija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Natjecanje`
--

INSERT INTO `Natjecanje` (`ID_natjecanje`, `Naziv`, `Opis`, `Pocetak`, `Zavrsetak`, `Lokacija_ID_lokacija`) VALUES
(1, 'Kup Koprivnice', 'Kup Koprivnice na ribnjacima  Rasinja  uz manifestaciju Ribolovci svome gradu', '2019-04-01 12:00:00', '2019-04-01 18:00:00', 6),
(2, 'Carp cup Jeskovo', 'Carp cup Jeskovo svake godine krajem ozujka  na jezeru Jeskovo.', '2019-03-28 10:00:00', '2019-03-31 14:00:00', 7),
(3, 'Carp cup  Autoput 2', 'Carp cup  Autoput 2 krajem svibnja i rujna na jezeru Autoput.', '2019-05-05 08:00:00', '2019-05-05 20:00:00', 8),
(4, 'Spinerski cup Soderica', 'Spinerski cup Soderica tijekom  listopada na jezeru Soderica blinkanjem  iz camca\r\n', '2019-10-10 10:00:00', '2019-10-12 10:00:00', 1),
(5, 'Spinerski cup  Sekuline', 'Spinerski cup Sekuline blinkanjem sa obale, svake godine pocetkom listopada', '2019-10-01 10:00:00', '2019-10-03 17:00:00', 2),
(6, 'Kup Soderica', 'Kup Soderica u sportskom ribolovu tijekom srpnja na jezeru Soderica.', '2019-07-04 06:00:00', '2019-07-06 16:00:00', 3),
(7, 'Kup Podravke', 'Kup Podravke u sportskom ribolovu tijekom srpnja na jezeru Soderica.', '2019-07-12 11:00:00', '2019-07-14 13:00:00', 5),
(8, 'Kup Hlebina', 'Kup Hlebina u sportskom ribolovu na ribnajcima u Rasinji.', '2019-04-03 05:00:00', '2019-04-04 20:00:00', 6),
(9, 'Ribolovci svome gradu', 'Manifestacija Ribolovci svome gradu krajem ozujka u Koprivnici.', '2019-03-21 10:00:00', '2019-04-21 21:00:00', 10),
(10, 'Carp cup  Autoput 3', 'Carp cup Autoput 3 krajem svibnja i rujna na jezeru Autoput.', '2019-09-13 12:00:00', '2019-09-15 23:00:00', 8),
(13, 'Brzi lov', 'Natjecanje u brzom ribolovu', '2019-06-13 11:00:00', '2019-06-13 22:00:00', 2),
(14, 'Riba ribi grize rep', 'Riba ribi grize rep', '2019-06-13 11:00:00', '2019-06-13 22:00:00', 4),
(15, 'Cup Bassa', 'Slavni kup za kralja ribolova', '2019-06-13 09:00:00', '2019-06-04 17:00:00', 17),
(16, 'Ulovi ribu', 'Ribu ulovi ti', '2019-06-02 12:00:00', '2019-06-03 00:00:00', 18),
(17, 'Ribolov I', 'Prvi dio veselog ribolova', '2019-06-14 09:00:00', '2019-06-15 10:00:00', 20),
(18, 'Ribolov II', 'Drugi dio veselog ribolova', '2019-06-14 09:00:00', '2019-06-15 10:00:00', 21),
(19, 'Lovina', '', '2019-06-10 07:00:00', '2019-06-17 17:00:00', 9),
(20, 'Saran', 'Lovimo ribice', '2019-06-03 00:00:00', '2019-06-04 00:00:00', 2),
(21, 'Ribolov III', 'Part 3', '2019-06-01 00:00:00', '2019-06-03 00:00:00', 4),
(22, 'Ribolov IV', 'Part 4', '2019-06-03 00:00:00', '2019-06-24 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Pobjednik`
--

CREATE TABLE `Pobjednik` (
  `Broj_bodova` int(11) NOT NULL,
  `Opis` text,
  `Natjecanje_ID_natjecanje` int(11) NOT NULL,
  `Korisnik_Korisnicko_ime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Pobjednik`
--

INSERT INTO `Pobjednik` (`Broj_bodova`, `Opis`, `Natjecanje_ID_natjecanje`, `Korisnik_Korisnicko_ime`) VALUES
(100, NULL, 2, 'aanic'),
(105, NULL, 3, 'korisnik'),
(50, NULL, 8, 'jjosipovic'),
(200, NULL, 9, 'kkos'),
(30, NULL, 20, 'ahorvatinovic');

-- --------------------------------------------------------

--
-- Table structure for table `Prijava`
--

CREATE TABLE `Prijava` (
  `ID_prijava` int(11) NOT NULL,
  `Datum_prijave` date NOT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Datum_statusa` date DEFAULT NULL,
  `Bodovi_za_prijavu` int(11) DEFAULT NULL,
  `Korisnik_Korisnicko_ime` varchar(20) NOT NULL,
  `Natjecanje_ID_natjecanje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Prijava`
--

INSERT INTO `Prijava` (`ID_prijava`, `Datum_prijave`, `Status`, `Datum_statusa`, `Bodovi_za_prijavu`, `Korisnik_Korisnicko_ime`, `Natjecanje_ID_natjecanje`) VALUES
(1, '2019-05-14', '1', '2019-06-06', 63, 'iilisevic', 6),
(2, '2019-02-01', '0', '2019-04-03', 20, 'hhorvat', 2),
(3, '2019-04-08', '1', '2019-05-27', 56, 'ajurisic', 7),
(4, '2019-04-08', '0', '2019-05-01', 0, 'hhorvat', 3),
(5, '2019-04-16', '1', '2019-04-19', 5, 'jjosipovic', 4),
(6, '2019-04-16', '0', '2019-04-18', 0, 'zzivkovic', 10),
(8, '2019-04-01', '0', '2019-04-02', 5, 'pperic', 6),
(9, '2019-03-06', '1', '2019-06-07', 1, 'ajurisic', 5),
(10, '2019-02-23', '1', '2019-02-25', 0, 'jjosipovic', 8),
(11, '2019-04-01', '0', '2019-04-02', 10, 'ahorvatinovic', 1),
(12, '2019-04-08', '0', '2019-04-09', 20, 'ajurisic', 2),
(13, '2019-04-16', '0', '2019-04-18', NULL, 'dkopic', 3),
(14, '2019-04-08', '0', '2019-04-18', 50, 'ffilipovic', 4),
(15, '2019-04-08', '0', '2019-04-18', 20, 'hhorvat', 5),
(16, '2019-04-08', '0', '2019-04-18', 30, 'iilisevic', 6),
(17, '2019-05-26', NULL, NULL, NULL, 'admin', 6),
(18, '2019-06-03', NULL, NULL, NULL, 'admin', 7),
(19, '2019-06-04', '1', '2019-06-04', 26, 'aanic', 7),
(20, '2019-06-05', '1', '2019-06-06', 19, 'ttomic', 6),
(21, '2019-06-05', '1', '2019-06-07', 20, 'pperic', 6),
(22, '2019-06-03', '1', '2019-06-05', 5, 'dkopic', 5),
(23, '2019-06-03', '1', '2019-06-05', 4, 'korisnik', 5),
(24, '2019-06-05', '1', '2019-06-06', 3, 'admin', 4),
(25, '2019-06-05', '1', '2019-06-05', 0, 'llukic', 7),
(26, '2019-06-05', '1', '2019-06-05', 6, 'sslavkovic', 1),
(27, '2019-06-05', '1', '2019-06-06', 20, 'hhorvat', 1),
(28, '2019-06-05', '1', '2019-06-07', 6, 'aanic', 2),
(29, '2019-06-05', '1', '2019-06-07', 4, 'korisnik', 3),
(30, '2019-06-05', '1', '2019-06-06', 3, 'kkos', 9),
(31, '2019-06-05', '1', '2019-06-06', 4, 'kkos', 16),
(32, '2019-06-05', '1', '2019-06-06', 25, 'ahorvatinovic', 20),
(33, '2019-06-05', '1', '2019-06-06', 4, 'korisnik', 21),
(34, '2019-06-05', NULL, NULL, NULL, 'korisnik', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Ribicki_klub`
--

CREATE TABLE `Ribicki_klub` (
  `ID_klub` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL,
  `Adresa` text NOT NULL,
  `Opis` text,
  `Datum_osnivanja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ribicki_klub`
--

INSERT INTO `Ribicki_klub` (`ID_klub`, `Naziv`, `Adresa`, `Opis`, `Datum_osnivanja`) VALUES
(2, 'Sportsko ribolovni klub Zagreb', 'VRISNICKA 16, ZAGREB\r\n', 'Aktivnosti: sudjelovanje u radu Saveza Sportsko ribolovnih drustava grada Zagreba.', '2007-12-04'),
(3, 'Orada', 'Trnjanska cesta 21, 10000 Zagreb', 'Razvoj i unapredenje sportskog ribolova na moru u Gradu Zagrebu', '1998-02-03'),
(4, 'Linjak', 'LAMINAC 260, STEFANJE, BJELOVARSKO-BILOGORSKA\r\n', 'Aktivnosti: promicanje, razvitak i unapredenje ekoloskih ciljeva.', '1998-03-03'),
(5, 'Sportski ribolovni klub Sesvete', 'Komesova 3, Popovec\r\n', 'Planiranje rada i razvitka ribolovnog sporta', '1978-08-08'),
(6, 'Lokvarka', 'Setalište Golubinjak 6, 51316 Lokve', 'Sluzbeni e-mail : srklokvarka@gmail.com', '1959-04-28'),
(7, 'Jeskovo Gola', 'Gola, Trg Kardinala Stepinca BB', 'PREDSJEDNIK Milivoj Lukcin KONTAKT - 098 495 718\r\n', '1997-07-07'),
(8, 'Stuka Torcec', 'Torcec, Podravska bb', 'PREDSJEDNIK Goran Matijasic KONTAKT-098/902 95 59', '1961-12-02'),
(9, 'Ivan Generalic Sigetec', 'Brace Radica 23, SIGETEC 48 321', 'PREDSJEDNIK Danijel Cizmesija tel: 098 901 40 91', '1998-08-08'),
(10, 'Saran Gotavolo', 'Jadran 1, GOTALOVO', 'PREDSJEDNIK Jakupec Blazenko tel: 098 302 495', '2007-05-13'),
(15, 'Bass', 'Trpinjska cesta 83, Bjelovar', 'Drustvo veselih ribica', '1986-02-04'),
(16, 'Ribice', 'Julija Merlica 9, Varazdin', 'Volimo ribe i ribolov', '1975-05-05'),
(17, 'Cegretusa', 'Vinkovci', 'Samo ribolov', '1975-03-02'),
(18, 'Drustvo riba', 'Cakovec', 'Druzimo se radi ribolova', '1987-09-03'),
(19, 'Klub Gorica', 'Velika Gorica', NULL, '1956-05-03'),
(20, 'Klub Seoski ribici', 'Sesvete, Zagreb', NULL, '1956-03-04'),
(21, 'Klub Ribolovci BJ', 'Bjelovar', 'Razvoj i unapredenje lova i ribolova', '1999-09-09'),
(22, 'Varazdinski ribici', 'Varazdin', 'Razvoj i unapredenje lova i ribolova', '1969-06-09'),
(23, 'Klub Stuka', 'Virovitica', 'Razvoj i unapredenje lova i ribolova', '1975-03-02'),
(24, 'Klub MIOKS', 'Osijek', 'Razvoj i unapredenje lova i ribolova', '1987-02-02'),
(25, 'Klub ribicki', 'Kupa', 'Aplikacija ribolov', '2019-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `Tip_korisnika`
--

CREATE TABLE `Tip_korisnika` (
  `ID_tip` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tip_korisnika`
--

INSERT INTO `Tip_korisnika` (`ID_tip`, `Naziv`) VALUES
(1, 'Neregistrirani korisnik'),
(2, 'Registrirani korisnik'),
(3, 'Moderator'),
(4, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `Tip_radnje`
--

CREATE TABLE `Tip_radnje` (
  `ID_radnja` int(11) NOT NULL,
  `Naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tip_radnje`
--

INSERT INTO `Tip_radnje` (`ID_radnja`, `Naziv`) VALUES
(1, 'Prijava'),
(2, 'Odjava'),
(3, 'Upit u bazu'),
(4, 'Registracija'),
(5, 'Aktivacija'),
(6, 'dodavanje'),
(7, 'brisanje');

-- --------------------------------------------------------

--
-- Table structure for table `Zahtjev_pobjednik`
--

CREATE TABLE `Zahtjev_pobjednik` (
  `Broj_bodova` int(11) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `ID_zahtjeva` int(11) NOT NULL,
  `Korisnik_Korisnicko_ime` varchar(20) NOT NULL,
  `Natjecanje_ID_natjecanje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Zahtjev_pobjednik`
--

INSERT INTO `Zahtjev_pobjednik` (`Broj_bodova`, `Status`, `Datum`, `ID_zahtjeva`, `Korisnik_Korisnicko_ime`, `Natjecanje_ID_natjecanje`) VALUES
(20, '0', '2019-04-05', 1, 'ahorvatinovic', 1),
(100, '0', '2019-04-05', 2, 'dkopic', 3),
(23, '0', '2019-05-21', 3, 'hhorvat', 3),
(100, '0', '2019-04-05', 5, 'ahorvatinovic', 5),
(250, '0', '2019-04-05', 6, 'hhorvat', 5),
(50, '1', '2019-06-05', 27, 'jjosipovic', 8),
(100, '1', '2019-06-05', 28, 'aanic', 2),
(105, '1', '2019-06-05', 29, 'korisnik', 3),
(200, '1', '2019-06-05', 30, 'kkos', 9),
(80, '1', '2019-06-05', 31, 'kkos', 16),
(30, '1', '2019-06-05', 32, 'ahorvatinovic', 20),
(53, NULL, NULL, 33, 'korisnik', 21),
(25, NULL, '2019-06-06', 34, 'hhorvat', 1),
(25, NULL, '2019-06-06', 35, 'sslavkovic', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dnevnik`
--
ALTER TABLE `Dnevnik`
  ADD PRIMARY KEY (`ID_dnevnik`),
  ADD KEY `fk_Dnevnik_Tip_radnje1_idx` (`Tip_radnje_ID_radnja`),
  ADD KEY `fk_Dnevnik_Korisnik1_idx` (`Korisnik_Korisnicko_ime`);

--
-- Indexes for table `Konfiguracija`
--
ALTER TABLE `Konfiguracija`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Korisnik`
--
ALTER TABLE `Korisnik`
  ADD PRIMARY KEY (`Korisnicko_ime`),
  ADD KEY `fk_Korisnik_Tip_korisnika_idx` (`Tip_korisnika_ID_tip`),
  ADD KEY `fk_Korisnik_Ribicki_klub1_idx` (`Ribicki_klub_ID_klub`);

--
-- Indexes for table `Korisnik_natjecanje`
--
ALTER TABLE `Korisnik_natjecanje`
  ADD PRIMARY KEY (`Korisnik_Korisnicko_ime`,`Prijava_ID_prijava`,`Natjecanje_ID_natjecanje`),
  ADD KEY `fk_Korisnik_natjecanje_Prijava1_idx` (`Prijava_ID_prijava`),
  ADD KEY `fk_Korisnik_natjecanje_Natjecanje1_idx` (`Natjecanje_ID_natjecanje`);

--
-- Indexes for table `Lokacija`
--
ALTER TABLE `Lokacija`
  ADD PRIMARY KEY (`ID_lokacija`);

--
-- Indexes for table `Moderator_klub`
--
ALTER TABLE `Moderator_klub`
  ADD PRIMARY KEY (`Korisnik_Korisnicko_ime`,`Ribicki_klub_ID_klub`,`Datum`),
  ADD KEY `fk_Moderator_klub_Ribicki_klub1_idx` (`Ribicki_klub_ID_klub`),
  ADD KEY `Ribicki_klub_ID_klub` (`Ribicki_klub_ID_klub`);

--
-- Indexes for table `Natjecanje`
--
ALTER TABLE `Natjecanje`
  ADD PRIMARY KEY (`ID_natjecanje`),
  ADD KEY `fk_Natjecanje_Lokacija1_idx` (`Lokacija_ID_lokacija`),
  ADD KEY `Lokacija_ID_lokacija` (`Lokacija_ID_lokacija`),
  ADD KEY `Lokacija_ID_lokacija_2` (`Lokacija_ID_lokacija`);

--
-- Indexes for table `Pobjednik`
--
ALTER TABLE `Pobjednik`
  ADD PRIMARY KEY (`Natjecanje_ID_natjecanje`,`Korisnik_Korisnicko_ime`),
  ADD KEY `fk_Pobjednik_Korisnik1_idx` (`Korisnik_Korisnicko_ime`);

--
-- Indexes for table `Prijava`
--
ALTER TABLE `Prijava`
  ADD PRIMARY KEY (`ID_prijava`),
  ADD KEY `fk_Prijava_Korisnik1_idx` (`Korisnik_Korisnicko_ime`),
  ADD KEY `fk_Prijava_Natjecanje1_idx` (`Natjecanje_ID_natjecanje`);

--
-- Indexes for table `Ribicki_klub`
--
ALTER TABLE `Ribicki_klub`
  ADD PRIMARY KEY (`ID_klub`);

--
-- Indexes for table `Tip_korisnika`
--
ALTER TABLE `Tip_korisnika`
  ADD PRIMARY KEY (`ID_tip`);

--
-- Indexes for table `Tip_radnje`
--
ALTER TABLE `Tip_radnje`
  ADD PRIMARY KEY (`ID_radnja`);

--
-- Indexes for table `Zahtjev_pobjednik`
--
ALTER TABLE `Zahtjev_pobjednik`
  ADD PRIMARY KEY (`ID_zahtjeva`),
  ADD KEY `fk_Zahtjev_pobjednik_Korisnik1_idx` (`Korisnik_Korisnicko_ime`),
  ADD KEY `fk_Zahtjev_pobjednik_Natjecanje1_idx` (`Natjecanje_ID_natjecanje`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Dnevnik`
--
ALTER TABLE `Dnevnik`
  MODIFY `ID_dnevnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;
--
-- AUTO_INCREMENT for table `Konfiguracija`
--
ALTER TABLE `Konfiguracija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Lokacija`
--
ALTER TABLE `Lokacija`
  MODIFY `ID_lokacija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `Natjecanje`
--
ALTER TABLE `Natjecanje`
  MODIFY `ID_natjecanje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `Prijava`
--
ALTER TABLE `Prijava`
  MODIFY `ID_prijava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `Ribicki_klub`
--
ALTER TABLE `Ribicki_klub`
  MODIFY `ID_klub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `Tip_korisnika`
--
ALTER TABLE `Tip_korisnika`
  MODIFY `ID_tip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Tip_radnje`
--
ALTER TABLE `Tip_radnje`
  MODIFY `ID_radnja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Zahtjev_pobjednik`
--
ALTER TABLE `Zahtjev_pobjednik`
  MODIFY `ID_zahtjeva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Dnevnik`
--
ALTER TABLE `Dnevnik`
  ADD CONSTRAINT `fk_Dnevnik_Korisnik1` FOREIGN KEY (`Korisnik_Korisnicko_ime`) REFERENCES `Korisnik` (`Korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Dnevnik_Tip_radnje1` FOREIGN KEY (`Tip_radnje_ID_radnja`) REFERENCES `Tip_radnje` (`ID_radnja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Korisnik`
--
ALTER TABLE `Korisnik`
  ADD CONSTRAINT `fk_Korisnik_Ribicki_klub1` FOREIGN KEY (`Ribicki_klub_ID_klub`) REFERENCES `Ribicki_klub` (`ID_klub`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Korisnik_Tip_korisnika` FOREIGN KEY (`Tip_korisnika_ID_tip`) REFERENCES `Tip_korisnika` (`ID_tip`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Korisnik_natjecanje`
--
ALTER TABLE `Korisnik_natjecanje`
  ADD CONSTRAINT `fk_Korisnik_natjecanje_Korisnik1` FOREIGN KEY (`Korisnik_Korisnicko_ime`) REFERENCES `Korisnik` (`Korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Korisnik_natjecanje_Natjecanje1` FOREIGN KEY (`Natjecanje_ID_natjecanje`) REFERENCES `Natjecanje` (`ID_natjecanje`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Korisnik_natjecanje_Prijava1` FOREIGN KEY (`Prijava_ID_prijava`) REFERENCES `Prijava` (`ID_prijava`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Moderator_klub`
--
ALTER TABLE `Moderator_klub`
  ADD CONSTRAINT `fk_Moderator_klub_Ribicki_klub1` FOREIGN KEY (`Ribicki_klub_ID_klub`) REFERENCES `Ribicki_klub` (`ID_klub`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Pobjednik`
--
ALTER TABLE `Pobjednik`
  ADD CONSTRAINT `fk_Pobjednik_Korisnik1` FOREIGN KEY (`Korisnik_Korisnicko_ime`) REFERENCES `Korisnik` (`Korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Pobjednik_Natjecanje1` FOREIGN KEY (`Natjecanje_ID_natjecanje`) REFERENCES `Natjecanje` (`ID_natjecanje`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Prijava`
--
ALTER TABLE `Prijava`
  ADD CONSTRAINT `fk_Prijava_Natjecanje1` FOREIGN KEY (`Natjecanje_ID_natjecanje`) REFERENCES `Natjecanje` (`ID_natjecanje`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Prijava_Korisnik1` FOREIGN KEY (`Korisnik_Korisnicko_ime`) REFERENCES `Korisnik` (`Korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Zahtjev_pobjednik`
--
ALTER TABLE `Zahtjev_pobjednik`
  ADD CONSTRAINT `fk_Zahtjev_pobjednik_Natjecanje1` FOREIGN KEY (`Natjecanje_ID_natjecanje`) REFERENCES `Natjecanje` (`ID_natjecanje`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Zahtjev_pobjednik_Korisnik1` FOREIGN KEY (`Korisnik_Korisnicko_ime`) REFERENCES `Korisnik` (`Korisnicko_ime`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
