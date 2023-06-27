-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Cze 2023, 22:28
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `firma_projekt_ti`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzialy`
--

CREATE TABLE `dzialy` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dzialy`
--

INSERT INTO `dzialy` (`Id`, `Nazwa`) VALUES
(1, 'Dział Sprzedaży'),
(2, 'Dział Marketingu'),
(3, 'Dział Finansowy'),
(4, 'Dział Kadr i Płac'),
(5, 'Dział IT'),
(6, 'Dział Obsługi Klienta'),
(7, 'Dział Produkcji'),
(8, 'Dział Logistyki'),
(9, 'Dział Badań i Rozwoju'),
(10, 'Dział Zarządzania Jakością');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `godziny_pracownikow`
--

CREATE TABLE `godziny_pracownikow` (
  `id` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `godziny` int(11) NOT NULL,
  `komentarz` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `godziny_pracownikow`
--

INSERT INTO `godziny_pracownikow` (`id`, `imie`, `nazwisko`, `data`, `godziny`, `komentarz`) VALUES
(24, 'wojciech', 'janicki', '2023-06-27', 5, ''),
(25, 'wojciech', 'janicki', '2023-06-27', 5, ''),
(26, 'wrgw', 'grwgw', '2023-06-22', 4, ''),
(27, 'wrgw', 'grwgw', '2023-06-22', 4, 'rqerqgfqergqerghqhq'),
(28, 'wrgw', 'grwgw', '2023-06-22', 4, 'rqerqgfqergqerghqhq'),
(29, 'wrgw', 'grwgw', '2023-06-22', 4, 'rqerqgfqergqerghqhq'),
(30, 'wrgw', 'grwgw', '2023-06-22', 4, 'rqerqgfqergqerghqhq'),
(31, 'wrgw', 'grwgw', '2023-06-22', 4, 'rqerqgfqergqerghqhq'),
(32, 'Norman', 'Menes', '2023-06-27', 6, 'Zwolniony z dwóch ostanich wizyt z powodu wizyty u lekarza'),
(33, 'dada', 'dwadwa', '2023-06-28', 43, 'fafadsf'),
(34, 'dada', 'dwadwa', '2023-06-28', 43, 'fafadsf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `Id` int(11) NOT NULL,
  `Imie` varchar(250) NOT NULL,
  `Nazwisko` varchar(250) NOT NULL,
  `Data_Urodzenia` date DEFAULT NULL,
  `Telefon` varchar(20) DEFAULT NULL,
  `Mail` varchar(250) DEFAULT NULL,
  `Adres` varchar(500) DEFAULT NULL,
  `Szef_Id` int(11) DEFAULT NULL,
  `Dzial_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`Id`, `Imie`, `Nazwisko`, `Data_Urodzenia`, `Telefon`, `Mail`, `Adres`, `Szef_Id`, `Dzial_Id`) VALUES
(1, 'Norman', 'Menes', NULL, '500211321', 'norman@wp.pl', 'ul. Warszawska 259 Poznań', NULL, NULL),
(2, 'Wojciech', 'Janicki', NULL, '233455677', NULL, 'Grunwaldzka 58', 1, 1),
(3, 'Jan', 'Kowalski', NULL, '123456789', NULL, 'ul. Kwiatowa 1, Warszawa', NULL, 1),
(4, 'Anna', 'Nowak', NULL, '987654321', NULL, 'ul. Słoneczna 2, Kraków', NULL, 2),
(5, 'Piotr', 'Wiśniewski', NULL, '555111222', NULL, 'ul. Główna 3, Wrocław', NULL, 3),
(6, 'Katarzyna', 'Kowalczyk', NULL, '999888777', NULL, 'ul. Polna 4, Poznań', NULL, 4),
(7, 'Michał', 'Lewandowski', NULL, '111222333', NULL, 'ul. Leśna 5, Gdynia', NULL, 5),
(8, 'Alicja', 'Wójcik', NULL, '444333222', NULL, 'ul. Długa 6, Łódź', NULL, 6),
(9, 'Grzegorz', 'Dąbrowski', NULL, '777888999', NULL, 'ul. Topolowa 7, Gdańsk', NULL, 7),
(10, 'Małgorzata', 'Kamińska', NULL, '555444333', NULL, 'ul. Miodowa 8, Warszawa', NULL, 8),
(11, 'Tomasz', 'Zając', NULL, '222111000', NULL, 'ul. Radosna 9, Poznań', NULL, 9),
(12, 'Ewa', 'Król', NULL, '999888777', NULL, 'ul. Cicha 10, Kraków', NULL, 10),
(13, 'Marcin', 'Nowicki', NULL, '555444333', NULL, 'ul. Podgórna 11, Wrocław', NULL, 1),
(14, 'Magdalena', 'Piotrowska', NULL, '111222333', NULL, 'ul. Prosta 12, Warszawa', NULL, 2),
(15, 'Krzysztof', 'Jasnowski', NULL, '777666555', NULL, 'ul. Lipowa 13, Gdynia', NULL, 3),
(16, 'Natalia', 'Witkowska', NULL, '222333444', NULL, 'ul. Słowackiego 14, Kraków', NULL, 4),
(17, 'Paweł', 'Kaczmarek', NULL, '444555666', NULL, 'ul. Mickiewicza 15, Poznań', NULL, 5),
(18, 'Jan', 'Kowalski', NULL, '123456789', NULL, 'ul. Kwiatowa 1, Warszawa', NULL, 1),
(19, 'Anna', 'Nowak', NULL, '987654321', NULL, 'ul. Słoneczna 2, Kraków', NULL, 2),
(20, 'Piotr', 'Wiśniewski', NULL, '555111222', NULL, 'ul. Główna 3, Wrocław', NULL, 3),
(21, 'Ewa', 'Kaczmarek', NULL, '444555666', NULL, 'ul. Piękna 50, Gdańsk', NULL, 10),
(22, 'Tomasz', 'Zawadzki', NULL, '111222333', NULL, 'ul. Radosna 51, Poznań', NULL, 1),
(23, 'Magdalena', 'Sikora', NULL, '777888999', NULL, 'ul. Cicha 52, Warszawa', NULL, 2),
(24, 'Michał', 'Mazurek', NULL, '333444555', NULL, 'ul. Dolna 99, Gdynia', NULL, 10),
(25, 'Agnieszka', 'Sikorska', NULL, '888999000', 'agnieszka@wp.pl', 'ul. Topolowa 200, Gdynia', 21, 1),
(26, 'Marcin', 'Kaczmarek', NULL, '444555666', NULL, 'ul. Cicha 201, Warszawa', NULL, 2),
(27, 'Patrycja', 'Witkowska', NULL, '111222333', NULL, 'ul. Zielona 202, Kraków', NULL, 3),
(28, 'Bartosz', 'Lewicki', NULL, '777888999', NULL, 'ul. Prosta 203, Wrocław', NULL, 4),
(29, 'Natalia', 'Mazurek', NULL, '222333444', NULL, 'ul. Miodowa 204, Poznań', NULL, 5),
(30, 'Marek', 'Kowalewski', NULL, '555666777', NULL, 'ul. Dolna 209, Szczecin', NULL, 10),
(31, 'Joanna', 'Kamińska', NULL, '999888777', NULL, 'ul. Główna 210, Lublin', NULL, 1),
(32, 'Andrzej', 'Piotrowski', NULL, '333444555', NULL, 'ul. Wesoła 211, Katowice', NULL, 2),
(33, 'Katarzyna', 'Nowakowska', NULL, '777666555', NULL, 'ul. Cicha 217, Gdynia', NULL, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `role`
--

INSERT INTO `role` (`Id`, `Nazwa`) VALUES
(1, 'Administrator systemu'),
(2, 'Kierownik'),
(3, 'Pracownik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `Id` int(11) NOT NULL,
  `Login` varchar(250) NOT NULL,
  `Haslo` varchar(250) NOT NULL,
  `Rola_Id` int(11) NOT NULL DEFAULT 3,
  `Pracownik_Id` int(11) DEFAULT NULL,
  `Aktywowane` int(1) NOT NULL,
  `TokenAktywacyjny` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`Id`, `Login`, `Haslo`, `Rola_Id`, `Pracownik_Id`, `Aktywowane`, `TokenAktywacyjny`) VALUES
(14, 'Kacper009', '$2y$10$HCXoBOPHAKTrwG24Vo8SYulMOkcD6i4kydafuKSCLdhay2JIj3UpC', 1, NULL, 0, '6499dad8e91dc');

-- --------------------------------------------------------

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dzialy`
--
ALTER TABLE `dzialy`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `godziny_pracownikow`
--
ALTER TABLE `godziny_pracownikow`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_pracownicy_pracownicy` (`Szef_Id`),
  ADD KEY `fk_Pracownicy_Dzialy` (`Dzial_Id`);

--
-- Indeksy dla tabeli `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Uzytkownicy_Role` (`Rola_Id`),
  ADD KEY `Pracownik_Id` (`Pracownik_Id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dzialy`
--
ALTER TABLE `dzialy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `godziny_pracownikow`
--
ALTER TABLE `godziny_pracownikow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT dla tabeli `role`
--
ALTER TABLE `role`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD CONSTRAINT `fk_Pracownicy_Dzialy` FOREIGN KEY (`Dzial_Id`) REFERENCES `dzialy` (`Id`),
  ADD CONSTRAINT `fk_pracownicy_pracownicy` FOREIGN KEY (`Szef_Id`) REFERENCES `pracownicy` (`Id`);

--
-- Ograniczenia dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `fk_Uzytkownicy_Role` FOREIGN KEY (`Rola_Id`) REFERENCES `role` (`Id`),
  ADD CONSTRAINT `uzytkownicy_ibfk_1` FOREIGN KEY (`Pracownik_Id`) REFERENCES `pracownicy` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
