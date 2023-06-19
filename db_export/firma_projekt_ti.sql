-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 19, 2023 at 01:27 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firma_projekt_ti`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ilość_godzin`
--

CREATE TABLE `ilość_godzin` (
  `id_pracownika` int(4) NOT NULL,
  `godziny_dzien` int(12) NOT NULL,
  `godziny_tydzien` int(12) NOT NULL,
  `godziny_miesiac` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownika` int(4) NOT NULL,
  `Imie` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Numer_Tel` int(9) NOT NULL,
  `Miejscowość_zamieszkania` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Adres_zamieszkania` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Oddział` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `Boss_ID` int(4) NOT NULL,
  `Departament` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `Imie`, `Nazwisko`, `Numer_Tel`, `Miejscowość_zamieszkania`, `Adres_zamieszkania`, `Oddział`, `Boss_ID`, `Departament`) VALUES
(2233, 'Wojciech', 'Janicki', 233455677, 'Poznań', 'Grunwaldzka 58', 'Poznań', 0, 'Informatycy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wynagordzenia`
--

CREATE TABLE `wynagordzenia` (
  `id_pracownika` int(4) NOT NULL,
  `Wypłata` int(10) NOT NULL,
  `Nadgodziny` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ilość_godzin`
--
ALTER TABLE `ilość_godzin`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indeksy dla tabeli `wynagordzenia`
--
ALTER TABLE `wynagordzenia`
  ADD PRIMARY KEY (`id_pracownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
