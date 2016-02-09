-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lut 2016, 10:45
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `db_stancje`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `imie` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nazwisko` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `imie`, `nazwisko`, `telefon`) VALUES
(1, 'admin', 'admin', 'email@domain.com', 'email@domain.com', 1, 'oxurzjq1ees8c4k84wskwccgko0808k', '$2y$13$oxurzjq1ees8c4k84wskwOPHmlkw5kPEADUajmEPKabm6f5aZK4H.', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'admin', 'admin', 132),
(2, 'user', 'user', 'user@domain.com', 'user@domain.com', 1, 'iyvdkivngiokcwk08084gk8kw4wsoco', '$2y$13$iyvdkivngiokcwk08084gegpzOxWMq40jrbJX1yxk7fSuiUuiM7mS', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Jan', 'Kowalski', 132);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE IF NOT EXISTS `komentarze` (
`id` int(11) NOT NULL,
  `user_komentujacy` int(11) DEFAULT NULL,
  `user_profil` int(11) DEFAULT NULL,
  `komentarz` tinytext COLLATE utf8_unicode_ci,
  `wyslano` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obserwowane`
--

CREATE TABLE IF NOT EXISTS `obserwowane` (
`id` int(11) NOT NULL,
  `oferta` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferty`
--

CREATE TABLE IF NOT EXISTS `oferty` (
`id_oferty` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kategoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `typ` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `wolneod` date NOT NULL,
  `tytul` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `miasto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dzielnica` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ulica` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numer` int(11) NOT NULL,
  `pietro` smallint(6) NOT NULL,
  `liczbapokoi` smallint(6) NOT NULL,
  `maksliczbosob` smallint(6) NOT NULL,
  `metraz` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `dodatkoweoplaty` int(11) DEFAULT NULL,
  `kaucja` int(11) DEFAULT NULL,
  `opis` tinytext COLLATE utf8_unicode_ci,
  `wyslano` datetime NOT NULL,
  `views` int(11) DEFAULT NULL,
  `longitude` decimal(15,12) DEFAULT NULL,
  `latitude` decimal(15,12) DEFAULT NULL,
  `wygasa` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `oferty`
--

INSERT INTO `oferty` (`id_oferty`, `user_id`, `kategoria`, `typ`, `wolneod`, `tytul`, `miasto`, `dzielnica`, `ulica`, `numer`, `pietro`, `liczbapokoi`, `maksliczbosob`, `metraz`, `cena`, `dodatkoweoplaty`, `kaucja`, `opis`, `wyslano`, `views`, `longitude`, `latitude`, `wygasa`) VALUES
(1, 1, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Wynajmę Miejsce w pokoju, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Śródmieście', 'Warszawska', 3, 5, 2, 3, 59, 1400, NULL, NULL, NULL, '2016-02-09 10:40:34', NULL, '22.524415400000', '51.251825200000', '2016-04-09'),
(2, 2, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czuby', 'Chełm', 'Czuby', 'Mickiewicza', 1, 1, 1, 1, 26, 700, NULL, NULL, NULL, '2016-02-09 10:40:37', NULL, '23.470361000000', '51.133806000000', '2016-02-23'),
(3, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wynajmę Kawalerka, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Kalinowszczyzna', 'Targowa', 5, 10, 4, 6, 109, 2500, NULL, NULL, NULL, '2016-02-09 10:40:39', NULL, '22.569990000000', '51.253160000000', '2016-04-09'),
(4, 2, 'Miejsce w pokoju', 'Blok', '2016-02-09', 'Miejsce w pokoju do wynajęcia dla studenta', 'Lublin', 'Czechów', 'Spokojna', 2, 3, 2, 2, 43, 1100, NULL, NULL, NULL, '2016-02-09 10:40:41', NULL, '22.553217000000', '51.249668000000', '2016-02-23'),
(5, 2, 'Miejsce w pokoju', 'Blok', '2016-02-09', 'Miejsce w pokoju do wynajęcia dla studenta', 'Lublin', 'Czechów', 'Spokojna', 2, 3, 2, 2, 44, 1100, NULL, NULL, NULL, '2016-02-09 10:40:43', NULL, '22.553217000000', '51.249668000000', '2016-02-23'),
(6, 1, 'Miejsce w pokoju', 'Blok', '2016-02-09', 'Miejsce w pokoju do wynajęcia dla studenta', 'Lublin', 'Czechów', 'Mikołaja Kopernika', 2, 2, 2, 2, 40, 1050, NULL, NULL, NULL, '2016-02-09 10:40:45', NULL, '22.577159500000', '51.218460800000', '2016-02-23'),
(7, 2, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Tatary', 'Jana Pawła II', 3, 5, 3, 4, 66, 1550, NULL, NULL, NULL, '2016-02-09 10:40:47', NULL, '22.535608000000', '51.224889900000', '2016-03-10'),
(8, 2, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Chełm', 'Chełm', 'Czuby', 'Mickiewicza', 1, 1, 1, 1, 24, 700, NULL, NULL, NULL, '2016-02-09 10:40:49', NULL, '23.470361000000', '51.133806000000', '2016-02-23'),
(9, 1, 'Miejsce w pokoju', 'Blok', '2016-02-09', 'Miejsce w pokoju do wynajęcia dla studenta', 'Lublin', 'Czechów', 'Mikołaja Kopernika', 2, 2, 2, 2, 41, 1050, NULL, NULL, NULL, '2016-02-09 10:40:51', NULL, '22.577159500000', '51.218460800000', '2016-02-23'),
(10, 2, 'Miejsce w pokoju', 'Blok', '2016-02-09', 'Miejsce w pokoju do wynajęcia dla studenta', 'Puławy', 'Czechów', 'Spokojna', 2, 3, 2, 2, 43, 1100, NULL, NULL, NULL, '2016-02-09 10:40:53', NULL, '22.054216900000', '51.410061900000', '2016-02-23'),
(11, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wynajmę Kawalerka, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Kalinowszczyzna', 'Targowa', 5, 10, 4, 6, 108, 2450, NULL, NULL, NULL, '2016-02-09 10:40:56', NULL, '22.569990000000', '51.253160000000', '2016-04-09'),
(12, 2, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Zamość', 'Zamość', 'Czuby', 'Armii Krajowej', 1, 0, 1, 1, 20, 600, NULL, NULL, NULL, '2016-02-09 10:40:58', NULL, '23.264212000000', '50.737012000000', '2016-02-23'),
(13, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wynajmę Kawalerka, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Kalinowszczyzna', 'Fabryczna', 5, 10, 4, 6, 106, 2450, NULL, NULL, NULL, '2016-02-09 10:41:00', NULL, '22.571991300000', '51.237284900000', '2016-04-09'),
(14, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Dziesiąta', 'Lublin', 'Dziesiąta', 'Gęsia', 5, 9, 4, 5, 93, 2150, NULL, NULL, NULL, '2016-02-09 10:41:02', NULL, '22.479499200000', '51.228769800000', '2016-04-09'),
(15, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wynajmę Kawalerka, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Kalinowszczyzna', 'Fabryczna', 5, 10, 4, 6, 104, 2400, NULL, NULL, NULL, '2016-02-09 10:41:04', NULL, '22.571991300000', '51.237284900000', '2016-04-09'),
(16, 1, 'Pokój', 'Blok', '2016-02-09', 'Pokój do wynajęcia dla studenta', 'Puławy', 'Czechów', 'Słowackiego', 2, 2, 1, 2, 37, 950, NULL, NULL, NULL, '2016-02-09 10:41:06', NULL, '21.981552500000', '51.423499200000', '2016-02-23'),
(17, 1, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Tatary', 'Jana Pawła II', 3, 5, 3, 4, 64, 1550, NULL, NULL, NULL, '2016-02-09 10:41:08', NULL, '22.535608000000', '51.224889900000', '2016-03-10'),
(18, 1, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Komfortowa stancja w dogodnej lokalizacji', 'Lublin', 'Tatary', 'Wesoła', 4, 6, 3, 4, 75, 1750, NULL, NULL, NULL, '2016-02-09 10:41:10', NULL, '22.567119000000', '51.241208500000', '2016-03-10'),
(19, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Kalinowszczyzna', 'Lublin', 'Kalinowszczyzna', 'Różana', 5, 9, 4, 6, 98, 2250, NULL, NULL, NULL, '2016-02-09 10:41:13', NULL, '22.515368000000', '51.230933000000', '2016-04-09'),
(20, 1, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czechów', 'Puławy', 'Czechów', 'Kościuszki', 2, 2, 1, 2, 34, 900, NULL, NULL, NULL, '2016-02-09 10:41:15', NULL, '21.975793400000', '51.422321200000', '2016-02-23'),
(21, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wynajmę Kawalerka, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Kalinowszczyzna', 'Fabryczna', 5, 10, 4, 6, 104, 2400, NULL, NULL, NULL, '2016-02-09 10:41:17', NULL, '22.571991300000', '51.237284900000', '2016-04-09'),
(22, 2, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Warszawska', 3, 5, 2, 3, 60, 1450, NULL, NULL, NULL, '2016-02-09 10:41:19', NULL, '22.524415400000', '51.251825200000', '2016-03-10'),
(23, 1, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Wiejska', 3, 4, 2, 3, 56, 1350, NULL, NULL, NULL, '2016-02-09 10:41:21', NULL, '22.581211300000', '51.263531600000', '2016-03-10'),
(24, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Dziesiąta', 'Lublin', 'Dziesiąta', 'Fabryczna', 4, 8, 4, 5, 90, 2100, NULL, NULL, NULL, '2016-02-09 10:41:23', NULL, '22.573289100000', '51.237969500000', '2016-04-09'),
(25, 2, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Tatary', 'Jana Pawła II', 3, 5, 3, 4, 63, 1500, NULL, NULL, NULL, '2016-02-09 10:41:25', NULL, '22.535608000000', '51.224889900000', '2016-03-10'),
(26, 1, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czechów', 'Puławy', 'Czechów', 'Kościuszki', 2, 2, 1, 2, 34, 900, NULL, NULL, NULL, '2016-02-09 10:41:27', NULL, '21.975793400000', '51.422321200000', '2016-02-23'),
(27, 1, 'Pokój', 'Blok', '2016-02-09', 'Pokój do wynajęcia od zaraz w dzielnicy Czechów', 'Puławy', 'Czechów', 'Słowackiego', 2, 2, 1, 2, 38, 950, NULL, NULL, NULL, '2016-02-09 10:41:29', NULL, '21.981552500000', '51.423499200000', '2016-02-23'),
(28, 1, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Tatary', 'Jana Pawła II', 3, 5, 3, 4, 64, 1550, NULL, NULL, NULL, '2016-02-09 10:41:31', NULL, '22.535608000000', '51.224889900000', '2016-03-10'),
(29, 2, 'Mieszkanie', 'Jednorodzinny', '2016-02-09', 'Do wynajęcia dla całej rodziny!', 'Lublin', 'Dziesiąta', 'Ludowa', 4, 7, 3, 5, 82, 1900, NULL, NULL, NULL, '2016-02-09 10:41:34', NULL, '22.585360500000', '51.262778300000', '2016-04-09'),
(30, 2, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Zamość', 'Zamość', 'Czuby', 'Armii Krajowej', 1, 0, 1, 1, 19, 550, NULL, NULL, NULL, '2016-02-09 10:41:36', NULL, '23.264212000000', '50.737012000000', '2016-02-23'),
(31, 1, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Wiejska', 3, 4, 2, 3, 55, 1350, NULL, NULL, NULL, '2016-02-09 10:41:38', NULL, '22.581211300000', '51.263531600000', '2016-03-10'),
(32, 1, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czechów', 'Puławy', 'Czechów', 'Kościuszki', 2, 2, 1, 2, 34, 900, NULL, NULL, NULL, '2016-02-09 10:41:40', NULL, '21.975793400000', '51.422321200000', '2016-02-23'),
(33, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Dziesiąta', 'Lublin', 'Dziesiąta', 'Fabryczna', 4, 8, 4, 5, 90, 2100, NULL, NULL, NULL, '2016-02-09 10:41:42', NULL, '22.573289100000', '51.237969500000', '2016-04-09'),
(34, 2, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Piłsudskiego', 2, 3, 2, 3, 48, 1200, NULL, NULL, NULL, '2016-02-09 10:41:44', NULL, '22.555393500000', '51.241514700000', '2016-03-10'),
(35, 2, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Chełm', 'Chełm', 'Czuby', 'Mickiewicza', 1, 1, 1, 1, 25, 700, NULL, NULL, NULL, '2016-02-09 10:41:46', NULL, '23.470361000000', '51.133806000000', '2016-02-23'),
(36, 1, 'Miejsce w pokoju', 'Blok', '2016-02-09', 'Miejsce w pokoju do wynajęcia dla studenta', 'Lublin', 'Czechów', 'Spokojna', 2, 3, 2, 2, 46, 1150, NULL, NULL, NULL, '2016-02-09 10:41:48', NULL, '22.553217000000', '51.249668000000', '2016-02-23'),
(37, 2, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czuby', 'Chełm', 'Czuby', 'Armii Krajowej', 1, 0, 1, 1, 22, 650, NULL, NULL, NULL, '2016-02-09 10:41:50', NULL, '23.468313700000', '51.130097200000', '2016-02-23'),
(38, 2, 'Mieszkanie', 'Jednorodzinny', '2016-02-09', 'Do wynajęcia dla całej rodziny!', 'Lublin', 'Dziesiąta', 'Letnia', 4, 7, 3, 5, 83, 1950, NULL, NULL, NULL, '2016-02-09 10:41:52', NULL, '22.546815800000', '51.238629200000', '2016-04-09'),
(39, 2, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Zamość', 'Zamość', 'Czuby', 'Armii Krajowej', 1, 0, 1, 1, 20, 600, NULL, NULL, NULL, '2016-02-09 10:41:55', NULL, '23.264212000000', '50.737012000000', '2016-02-23'),
(40, 1, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Piłsudskiego', 2, 4, 2, 3, 49, 1200, NULL, NULL, NULL, '2016-02-09 10:41:57', NULL, '22.555393500000', '51.241514700000', '2016-03-10'),
(41, 1, 'Pokój', 'Blok', '2016-02-09', 'Pokój do wynajęcia dla studenta', 'Puławy', 'Czechów', 'Słowackiego', 2, 2, 1, 2, 36, 950, NULL, NULL, NULL, '2016-02-09 10:41:59', NULL, '21.981552500000', '51.423499200000', '2016-02-23'),
(42, 2, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Komfortowa stancja w dogodnej lokalizacji', 'Lublin', 'Tatary', 'Leśna', 3, 6, 3, 4, 70, 1650, NULL, NULL, NULL, '2016-02-09 10:42:01', NULL, '22.572192100000', '51.226829000000', '2016-03-10'),
(43, 1, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Ogrodowa', 3, 4, 2, 3, 53, 1300, NULL, NULL, NULL, '2016-02-09 10:42:03', NULL, '22.556227700000', '51.249307400000', '2016-03-10'),
(44, 1, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Jana Pawła II', 3, 3, 2, 3, 49, 1200, NULL, NULL, NULL, '2016-02-09 10:42:05', NULL, '22.535608000000', '51.224889900000', '2016-03-10'),
(45, 2, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Tatary', 'Jana Pawła II', 3, 5, 3, 4, 66, 1550, NULL, NULL, NULL, '2016-02-09 10:42:07', NULL, '22.535608000000', '51.224889900000', '2016-03-10'),
(46, 1, 'Mieszkanie', 'Jednorodzinny', '2016-02-09', 'Do wynajęcia dla całej rodziny!', 'Lublin', 'Dziesiąta', 'Letnia', 4, 7, 3, 5, 84, 1950, NULL, NULL, NULL, '2016-02-09 10:42:09', NULL, '22.546815800000', '51.238629200000', '2016-04-09'),
(47, 2, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Tatary', 'Wesoła', 4, 5, 3, 4, 64, 1800, NULL, NULL, NULL, '2016-02-09 10:42:11', NULL, '22.567119000000', '51.241208500000', '2016-03-10'),
(48, 2, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Chełm', 'Chełm', 'Czuby', 'Mickiewicza', 1, 0, 1, 1, 23, 650, NULL, NULL, NULL, '2016-02-09 10:42:13', NULL, '23.470361000000', '51.133806000000', '2016-02-23'),
(49, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Kalinowszczyzna', 'Lublin', 'Kalinowszczyzna', 'Strażacka', 5, 9, 4, 6, 99, 2300, NULL, NULL, NULL, '2016-02-09 10:42:16', NULL, '22.554388500000', '51.240180000000', '2016-04-09'),
(50, 1, 'Pokój', 'Blok', '2016-02-09', 'Komfortowa stancja w dogodnej lokalizacji', 'Chełm', 'Czuby', 'Mickiewicza', 1, 1, 1, 1, 26, 750, NULL, NULL, NULL, '2016-02-09 10:42:18', NULL, '23.470361000000', '51.133806000000', '2016-04-09'),
(51, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Do wynajęcia dla całej rodziny!', 'Lublin', 'Dziesiąta', 'Fabryczna', 4, 8, 4, 5, 88, 2050, NULL, NULL, NULL, '2016-02-09 10:42:20', NULL, '22.573289100000', '51.237969500000', '2016-04-09'),
(52, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wynajmę Kawalerka, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Kalinowszczyzna', 'Fabryczna', 5, 10, 4, 6, 104, 2400, NULL, NULL, NULL, '2016-02-09 10:42:22', NULL, '22.571991300000', '51.237284900000', '2016-04-09'),
(53, 2, 'Miejsce w pokoju', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czechów', 'Lublin', 'Czechów', 'Spokojna', 2, 3, 2, 2, 43, 1100, NULL, NULL, NULL, '2016-02-09 10:42:24', NULL, '22.553217000000', '51.249668000000', '2016-02-23'),
(54, 1, 'Mieszkanie', 'Jednorodzinny', '2016-02-09', 'Do wynajęcia dla całej rodziny!', 'Lublin', 'Dziesiąta', 'Letnia', 4, 7, 3, 5, 84, 1950, NULL, NULL, NULL, '2016-02-09 10:42:26', NULL, '22.546815800000', '51.238629200000', '2016-04-09'),
(55, 1, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czechów', 'Świdnik', 'Czechów', 'Kościuszki', 1, 1, 1, 2, 31, 800, NULL, NULL, NULL, '2016-02-09 10:42:28', NULL, '22.702914000000', '51.219338000000', '2016-02-23'),
(56, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Dziesiąta', 'Lublin', 'Dziesiąta', 'Gęsia', 4, 8, 4, 5, 91, 2100, NULL, NULL, NULL, '2016-02-09 10:42:30', NULL, '22.479095900000', '51.228913000000', '2016-04-09'),
(57, 2, 'Pokój', 'Blok', '2016-02-09', 'Pokój do wynajęcia dla studenta', 'Puławy', 'Czechów', 'Słowackiego', 2, 2, 1, 2, 36, 950, NULL, NULL, NULL, '2016-02-09 10:42:33', NULL, '21.981552500000', '51.423499200000', '2016-02-23'),
(58, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Kalinowszczyzna', 'Lublin', 'Kalinowszczyzna', 'Różana', 5, 9, 4, 6, 98, 2250, NULL, NULL, NULL, '2016-02-09 10:42:35', NULL, '22.515368000000', '51.230933000000', '2016-04-09'),
(59, 2, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Zamość', 'Zamość', 'Czuby', '3 maja', 1, 0, 1, 1, 18, 550, NULL, NULL, NULL, '2016-02-09 10:42:37', NULL, '23.249620000000', '50.738259200000', '2016-02-23'),
(60, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Kalinowszczyzna', 'Lublin', 'Kalinowszczyzna', 'Różana', 5, 9, 4, 6, 97, 2250, NULL, NULL, NULL, '2016-02-09 10:42:39', NULL, '22.515368000000', '51.230933000000', '2016-04-09'),
(61, 2, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czuby', 'Puławy', 'Czuby', 'Słowackiego', 1, 1, 1, 1, 26, 700, NULL, NULL, NULL, '2016-02-09 10:42:41', NULL, '21.982443900000', '51.423935000000', '2016-02-23'),
(62, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Dziesiąta', 'Lublin', 'Dziesiąta', 'Fabryczna', 4, 8, 4, 5, 93, 2050, NULL, NULL, NULL, '2016-02-09 10:42:43', NULL, '22.573289100000', '51.237969500000', '2016-04-09'),
(63, 1, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Chełm', 'Chełm', 'Czuby', 'Mickiewicza', 1, 1, 1, 1, 24, 700, NULL, NULL, NULL, '2016-02-09 10:42:45', NULL, '23.470361000000', '51.133806000000', '2016-02-23'),
(64, 1, 'Miejsce w pokoju', 'Blok', '2016-02-09', 'Miejsce w pokoju do wynajęcia dla studenta', 'Lublin', 'Czechów', 'Spokojna', 2, 3, 2, 2, 43, 1100, NULL, NULL, NULL, '2016-02-09 10:42:47', NULL, '22.553217000000', '51.249668000000', '2016-02-23'),
(65, 1, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Świdnik', 'Świdnik', 'Czuby', 'Długa', 1, 1, 1, 1, 28, 750, NULL, NULL, NULL, '2016-02-09 10:42:49', NULL, '22.636556000000', '51.267361000000', '2016-02-23'),
(66, 2, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czuby', 'Puławy', 'Czuby', 'Długa', 1, 1, 1, 1, 28, 750, NULL, NULL, NULL, '2016-02-09 10:42:52', NULL, '21.911710000000', '51.412214000000', '2016-02-23'),
(67, 2, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Wiejska', 3, 4, 2, 3, 57, 1400, NULL, NULL, NULL, '2016-02-09 10:42:54', NULL, '22.581211300000', '51.263531600000', '2016-03-10'),
(68, 1, 'Kawalerka', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czechów', 'Lublin', 'Czechów', 'Gęsia', 5, 1, 1, 2, 32, 850, NULL, NULL, NULL, '2016-02-09 10:42:56', NULL, '22.479499200000', '51.228769800000', '2016-02-23'),
(69, 2, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Komfortowa stancja w dogodnej lokalizacji', 'Lublin', 'Tatary', 'Lipowa', 4, 6, 3, 4, 74, 1750, NULL, NULL, NULL, '2016-02-09 10:42:58', NULL, '22.552381900000', '51.246848000000', '2016-03-10'),
(70, 2, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Komfortowa stancja w dogodnej lokalizacji', 'Lublin', 'Tatary', 'Lipowa', 4, 6, 3, 4, 72, 1700, NULL, NULL, NULL, '2016-02-09 10:43:00', NULL, '22.552381900000', '51.246848000000', '2016-03-10'),
(71, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Kalinowszczyzna', 'Lublin', 'Kalinowszczyzna', 'Różana', 5, 9, 4, 6, 97, 2250, NULL, NULL, NULL, '2016-02-09 10:43:02', NULL, '22.515368000000', '51.230933000000', '2016-04-09'),
(72, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Eklsuzywna stancja w rozsądnej cenie', 'Lublin', 'Kalinowszczyzna', 'Strażacka', 5, 9, 4, 6, 99, 2250, NULL, NULL, NULL, '2016-02-09 10:43:04', NULL, '22.554388500000', '51.240180000000', '2016-04-09'),
(73, 1, 'Mieszkanie', 'Jednorodzinny', '2016-02-09', 'Do wynajęcia dla całej rodziny!', 'Lublin', 'Dziesiąta', 'Ludowa', 4, 7, 3, 5, 80, 1850, NULL, NULL, NULL, '2016-02-09 10:43:06', NULL, '22.585360500000', '51.262778300000', '2016-04-09'),
(74, 1, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Komfortowa stancja w dogodnej lokalizacji', 'Lublin', 'Tatary', 'Lipowa', 4, 6, 3, 4, 73, 1700, NULL, NULL, NULL, '2016-02-09 10:43:09', NULL, '22.552381900000', '51.246848000000', '2016-03-10'),
(75, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wynajmę super stancję w Lublin', 'Lublin', 'Kalinowszczyzna', 'Różana', 5, 9, 4, 6, 97, 2250, NULL, NULL, NULL, '2016-02-09 10:43:11', NULL, '22.515368000000', '51.230933000000', '2016-04-09'),
(76, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wynajmę Kawalerka, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Kalinowszczyzna', 'Fabryczna', 5, 10, 4, 6, 106, 2450, NULL, NULL, NULL, '2016-02-09 10:43:13', NULL, '22.571991300000', '51.237284900000', '2016-04-09'),
(77, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Dziesiąta', 'Lublin', 'Dziesiąta', 'Gęsia', 5, 9, 4, 5, 93, 2150, NULL, NULL, NULL, '2016-02-09 10:43:15', NULL, '22.479499200000', '51.228769800000', '2016-04-09'),
(78, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Dziesiąta', 'Lublin', 'Dziesiąta', 'Gęsia', 5, 8, 4, 5, 93, 2150, NULL, NULL, NULL, '2016-02-09 10:43:17', NULL, '22.479499200000', '51.228769800000', '2016-04-09'),
(79, 2, 'Miejsce w pokoju', 'Jednorodzinny', '2016-02-09', 'Wynajmę Miejsce w pokoju, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Śródmieście', 'Wiejska', 3, 4, 2, 3, 55, 1350, NULL, NULL, NULL, '2016-02-09 10:43:19', NULL, '22.581211300000', '51.263531600000', '2016-04-09'),
(80, 1, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czechów', 'Puławy', 'Czechów', 'Kościuszki', 2, 2, 1, 2, 34, 900, NULL, NULL, NULL, '2016-02-09 10:43:21', NULL, '21.975793400000', '51.422321200000', '2016-02-23'),
(81, 1, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Piłsudskiego', 2, 3, 2, 3, 47, 1150, NULL, NULL, NULL, '2016-02-09 10:43:23', NULL, '22.555393500000', '51.241514700000', '2016-03-10'),
(82, 1, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czuby', 'Chełm', 'Czuby', 'Mickiewicza', 1, 1, 1, 1, 26, 700, NULL, NULL, NULL, '2016-02-09 10:43:25', NULL, '23.470361000000', '51.133806000000', '2016-02-23'),
(83, 1, 'Mieszkanie', 'Jednorodzinny', '2016-02-09', 'Do wynajęcia dla całej rodziny!', 'Lublin', 'Dziesiąta', 'Ludowa', 4, 7, 3, 5, 82, 1900, NULL, NULL, NULL, '2016-02-09 10:43:27', NULL, '22.585360500000', '51.262778300000', '2016-04-09'),
(84, 2, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Zamość', 'Zamość', 'Czuby', '3 maja', 1, 0, 1, 1, 16, 500, NULL, NULL, NULL, '2016-02-09 10:43:30', NULL, '23.249620000000', '50.738259200000', '2016-02-23'),
(85, 1, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Piłsudskiego', 2, 3, 2, 3, 47, 1150, NULL, NULL, NULL, '2016-02-09 10:43:32', NULL, '22.555393500000', '51.241514700000', '2016-03-10'),
(86, 2, 'Mieszkanie', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Tatary', 'Jana Pawła II', 3, 5, 3, 4, 66, 1550, NULL, NULL, NULL, '2016-02-09 10:43:34', NULL, '22.535608000000', '51.224889900000', '2016-03-10'),
(87, 2, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Wiejska', 3, 4, 2, 3, 55, 1350, NULL, NULL, NULL, '2016-02-09 10:43:36', NULL, '22.581211300000', '51.263531600000', '2016-03-10'),
(88, 1, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Zamość', 'Zamość', 'Czuby', 'Armii Krajowej', 1, 0, 1, 1, 20, 600, NULL, NULL, NULL, '2016-02-09 10:43:38', NULL, '23.264212000000', '50.737012000000', '2016-02-23'),
(89, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Kalinowszczyzna', 'Lublin', 'Kalinowszczyzna', 'Strażacka', 5, 9, 4, 6, 100, 2300, NULL, NULL, NULL, '2016-02-09 10:43:40', NULL, '22.554388500000', '51.240180000000', '2016-04-09'),
(90, 1, 'Mieszkanie', 'Jednorodzinny', '2016-02-09', 'Do wynajęcia dla całej rodziny!', 'Lublin', 'Dziesiąta', 'Letnia', 4, 7, 3, 5, 83, 1950, NULL, NULL, NULL, '2016-02-09 10:43:42', NULL, '22.546815800000', '51.238629200000', '2016-04-09'),
(91, 2, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Miejsce w pokoju do wynajęcia od zaraz w dzielnicy Śródmieście', 'Lublin', 'Śródmieście', 'Wiejska', 3, 4, 2, 3, 56, 1350, NULL, NULL, NULL, '2016-02-09 10:43:44', NULL, '22.581211300000', '51.263531600000', '2016-04-09'),
(92, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wynajmę Kawalerka, komfortowe warunki w rozsądnej cenie!', 'Lublin', 'Kalinowszczyzna', 'Targowa', 5, 10, 4, 6, 108, 2500, NULL, NULL, NULL, '2016-02-09 10:43:46', NULL, '22.569990000000', '51.253160000000', '2016-04-09'),
(93, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Dziesiąta', 'Lublin', 'Dziesiąta', 'Fabryczna', 4, 8, 4, 5, 90, 2100, NULL, NULL, NULL, '2016-02-09 10:43:48', NULL, '22.573289100000', '51.237969500000', '2016-04-09'),
(94, 2, 'Pokój', 'Blok', '2016-02-09', 'Wynajmę super stancję w Zamość', 'Zamość', 'Czuby', '3 maja', 1, 0, 1, 1, 15, 500, NULL, NULL, NULL, '2016-02-09 10:43:50', NULL, '23.249620000000', '50.738259200000', '2016-02-23'),
(95, 1, 'Pokój', 'Blok', '2016-02-09', 'Wygodna stancja w dzielnicy Czechów', 'Świdnik', 'Czechów', 'Kościuszki', 1, 2, 1, 2, 32, 850, NULL, NULL, NULL, '2016-02-09 10:43:52', NULL, '22.702914000000', '51.219338000000', '2016-02-23'),
(96, 2, 'Miejsce w pokoju', 'Kamienica', '2016-02-09', 'Przytulna stancja do wynajęcia', 'Lublin', 'Śródmieście', 'Wiejska', 3, 4, 2, 3, 55, 1350, NULL, NULL, NULL, '2016-02-09 10:43:55', NULL, '22.581211300000', '51.263531600000', '2016-03-10'),
(97, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Wygodna stancja w dzielnicy Dziesiąta', 'Lublin', 'Dziesiąta', 'Fabryczna', 4, 8, 4, 5, 88, 2050, NULL, NULL, NULL, '2016-02-09 10:43:57', NULL, '22.573289100000', '51.237969500000', '2016-04-09'),
(98, 2, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Kalinowszczyzna', 'Lublin', 'Kalinowszczyzna', 'Różana', 5, 9, 4, 6, 98, 2250, NULL, NULL, NULL, '2016-02-09 10:43:59', NULL, '22.515368000000', '51.230933000000', '2016-04-09'),
(99, 1, 'Kawalerka', 'Jednorodzinny', '2016-02-09', 'Kawalerka do wynajęcia od zaraz w dzielnicy Kalinowszczyzna', 'Lublin', 'Kalinowszczyzna', 'Różana', 5, 9, 4, 6, 96, 2200, NULL, NULL, NULL, '2016-02-09 10:44:01', NULL, '22.515368000000', '51.230933000000', '2016-04-09'),
(100, 1, 'Mieszkanie', 'Jednorodzinny', '2016-02-09', 'Do wynajęcia dla całej rodziny!', 'Lublin', 'Dziesiąta', 'Letnia', 4, 7, 3, 5, 83, 1950, NULL, NULL, NULL, '2016-02-09 10:44:03', NULL, '22.546815800000', '51.238629200000', '2016-04-09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `preferencje`
--

CREATE TABLE IF NOT EXISTS `preferencje` (
`id_preferencje` int(11) NOT NULL,
  `typ_preferencji` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `preferencje`
--

INSERT INTO `preferencje` (`id_preferencje`, `typ_preferencji`) VALUES
(1, 'kobiety'),
(2, 'meżczyźni'),
(3, 'palący'),
(4, 'studenci'),
(5, 'pary'),
(6, 'pracujący');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `preferencje_oferty`
--

CREATE TABLE IF NOT EXISTS `preferencje_oferty` (
`id_preferencje` int(11) NOT NULL,
  `oferta` int(11) DEFAULT NULL,
  `preferencja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyposazenie`
--

CREATE TABLE IF NOT EXISTS `wyposazenie` (
`idwyposazenie` int(11) NOT NULL,
  `nazwawyposazenia` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `wyposazenie`
--

INSERT INTO `wyposazenie` (`idwyposazenie`, `nazwawyposazenia`) VALUES
(1, 'internet'),
(2, 'telefon'),
(3, 'telewizor'),
(4, 'kablówka'),
(5, 'pralka'),
(6, 'lodówka'),
(7, 'prysznic'),
(8, 'wanna'),
(9, 'balkon'),
(10, 'taras'),
(11, 'parking'),
(12, 'garaż');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyposazenie_oferty`
--

CREATE TABLE IF NOT EXISTS `wyposazenie_oferty` (
`id_wyposazenie` int(11) NOT NULL,
  `oferta` int(11) DEFAULT NULL,
  `wyposazenie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE IF NOT EXISTS `zdjecia` (
`id` int(11) NOT NULL,
  `oferta` int(11) DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- Indexes for table `komentarze`
--
ALTER TABLE `komentarze`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_D97C0F7AA42DAE88` (`user_komentujacy`), ADD KEY `IDX_D97C0F7A8384A9AA` (`user_profil`);

--
-- Indexes for table `obserwowane`
--
ALTER TABLE `obserwowane`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_2375A0BB7479C8F2` (`oferta`), ADD KEY `IDX_2375A0BB8D93D649` (`user`);

--
-- Indexes for table `oferty`
--
ALTER TABLE `oferty`
 ADD PRIMARY KEY (`id_oferty`), ADD KEY `IDX_671550A4A76ED395` (`user_id`);

--
-- Indexes for table `preferencje`
--
ALTER TABLE `preferencje`
 ADD PRIMARY KEY (`id_preferencje`);

--
-- Indexes for table `preferencje_oferty`
--
ALTER TABLE `preferencje_oferty`
 ADD PRIMARY KEY (`id_preferencje`), ADD KEY `IDX_357E38537479C8F2` (`oferta`), ADD KEY `IDX_357E38539D10CB72` (`preferencja`);

--
-- Indexes for table `wyposazenie`
--
ALTER TABLE `wyposazenie`
 ADD PRIMARY KEY (`idwyposazenie`);

--
-- Indexes for table `wyposazenie_oferty`
--
ALTER TABLE `wyposazenie_oferty`
 ADD PRIMARY KEY (`id_wyposazenie`), ADD KEY `IDX_8DB52DB87479C8F2` (`oferta`), ADD KEY `IDX_8DB52DB825B66309` (`wyposazenie`);

--
-- Indexes for table `zdjecia`
--
ALTER TABLE `zdjecia`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_5D7081D37479C8F2` (`oferta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `fos_user`
--
ALTER TABLE `fos_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `obserwowane`
--
ALTER TABLE `obserwowane`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `oferty`
--
ALTER TABLE `oferty`
MODIFY `id_oferty` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT dla tabeli `preferencje`
--
ALTER TABLE `preferencje`
MODIFY `id_preferencje` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `preferencje_oferty`
--
ALTER TABLE `preferencje_oferty`
MODIFY `id_preferencje` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `wyposazenie`
--
ALTER TABLE `wyposazenie`
MODIFY `idwyposazenie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT dla tabeli `wyposazenie_oferty`
--
ALTER TABLE `wyposazenie_oferty`
MODIFY `id_wyposazenie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
ADD CONSTRAINT `FK_D97C0F7A8384A9AA` FOREIGN KEY (`user_profil`) REFERENCES `fos_user` (`id`),
ADD CONSTRAINT `FK_D97C0F7AA42DAE88` FOREIGN KEY (`user_komentujacy`) REFERENCES `fos_user` (`id`);

--
-- Ograniczenia dla tabeli `obserwowane`
--
ALTER TABLE `obserwowane`
ADD CONSTRAINT `FK_2375A0BB7479C8F2` FOREIGN KEY (`oferta`) REFERENCES `oferty` (`id_oferty`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_2375A0BB8D93D649` FOREIGN KEY (`user`) REFERENCES `fos_user` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `oferty`
--
ALTER TABLE `oferty`
ADD CONSTRAINT `FK_671550A4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

--
-- Ograniczenia dla tabeli `preferencje_oferty`
--
ALTER TABLE `preferencje_oferty`
ADD CONSTRAINT `FK_357E38537479C8F2` FOREIGN KEY (`oferta`) REFERENCES `oferty` (`id_oferty`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_357E38539D10CB72` FOREIGN KEY (`preferencja`) REFERENCES `preferencje` (`id_preferencje`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `wyposazenie_oferty`
--
ALTER TABLE `wyposazenie_oferty`
ADD CONSTRAINT `FK_8DB52DB825B66309` FOREIGN KEY (`wyposazenie`) REFERENCES `wyposazenie` (`idwyposazenie`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_8DB52DB87479C8F2` FOREIGN KEY (`oferta`) REFERENCES `oferty` (`id_oferty`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
ADD CONSTRAINT `FK_5D7081D37479C8F2` FOREIGN KEY (`oferta`) REFERENCES `oferty` (`id_oferty`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
