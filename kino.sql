-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Sty 2020, 15:42
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kino`
--
CREATE DATABASE IF NOT EXISTS `kino` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `kino`;
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktualnosci`
--

CREATE TABLE `aktualnosci` (
  `id_wiadomosci` int(11) NOT NULL,
  `wiadomosc` text COLLATE utf8_polish_ci NOT NULL,
  `data_dodania` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bilet`
--

CREATE TABLE `bilet` (
  `id_biletu` int(11) NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `ulga` int(11) NOT NULL,
  `id_rezerwacji` int(11) NOT NULL,
  `id_repertuaru` int(11) NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `film`
--

CREATE TABLE `film` (
  `id_filmu` int(11) NOT NULL,
  `nazwa` int(11) NOT NULL,
  `rezyser` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `repertuar`
--

CREATE TABLE `repertuar` (
  `id_repertuaru` int(11) NOT NULL,
  `id_filmu` int(11) NOT NULL,
  `id_sali` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `id_rezerwacji` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `miejsca` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ilosc_uczen_senior` int(11) NOT NULL,
  `ilosc_student` int(11) NOT NULL,
  `id_repertuaru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sala`
--

CREATE TABLE `sala` (
  `numer_sali` int(11) NOT NULL,
  `liczba_miejsc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `uprawnienia_administracyjne` tinyint(1) NOT NULL,
  `nick` text COLLATE utf8_polish_ci NOT NULL,
  `mail` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `aktualnosci`
--
ALTER TABLE `aktualnosci`
  ADD PRIMARY KEY (`id_wiadomosci`);

--
-- Indeksy dla tabeli `bilet`
--
ALTER TABLE `bilet`
  ADD PRIMARY KEY (`id_biletu`);

--
-- Indeksy dla tabeli `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_filmu`);

--
-- Indeksy dla tabeli `repertuar`
--
ALTER TABLE `repertuar`
  ADD PRIMARY KEY (`id_repertuaru`);

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`id_rezerwacji`);

--
-- Indeksy dla tabeli `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`numer_sali`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
