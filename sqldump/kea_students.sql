-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Vært: localhost
-- Genereringstid: 24. 10 2019 kl. 17:06:41
-- Serverversion: 10.1.38-MariaDB
-- PHP-version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kea_students`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `courses`
--

CREATE TABLE `courses` (
  `courses_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `ETCS` int(11) DEFAULT NULL,
  `fk_teacher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Data dump for tabellen `courses`
--

INSERT INTO `courses` (`courses_id`, `title`, `start_date`, `ETCS`, `fk_teacher`) VALUES
(1, 'Node.js', '2020-01-15', 10, NULL),
(2, '.Net Core', '2020-01-12', 10, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `courses_students`
--

CREATE TABLE `courses_students` (
  `fk_courses` int(11) NOT NULL,
  `fk_students` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Data dump for tabellen `courses_students`
--

INSERT INTO `courses_students` (`fk_courses`, `fk_students`, `grade`) VALUES
(1, 1, NULL),
(1, 2, NULL),
(2, 1, 12),
(2, 4, NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `students`
--

CREATE TABLE `students` (
  `students_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL,
  `cpr` varchar(50) COLLATE utf8_danish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Data dump for tabellen `students`
--

INSERT INTO `students` (`students_id`, `first_name`, `last_name`, `email`, `cpr`) VALUES
(1, 'Claus', 'Bove', 'clbo@kea.dk', '221070-1109'),
(2, 'Anna', 'Malena', 'anna@kea.dk', '21115345324'),
(4, 'Esther', 'Fallon', 'xtra109@icloud.com', '4990');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courses_id`);

--
-- Indeks for tabel `courses_students`
--
ALTER TABLE `courses_students`
  ADD PRIMARY KEY (`fk_courses`,`fk_students`);

--
-- Indeks for tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`students_id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `students`
--
ALTER TABLE `students`
  MODIFY `students_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
