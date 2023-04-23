-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 23. 15:39
-- Kiszolgáló verziója: 10.4.25-MariaDB
-- PHP verzió: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `cars`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `model` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `displacement` float NOT NULL,
  `p_date` year(4) NOT NULL,
  `mileage` int(11) NOT NULL,
  `text` text COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `displacement`, `p_date`, `mileage`, `text`, `user_id`, `price`, `image`) VALUES
(23, 'asd', 'sa', 1213, 0000, 123131, 'asdas', NULL, 123123, 'ford4.jpg'),
(24, 'Ford', 'Mustang', 1978, 1969, 132456, 'asdas', NULL, 8700, 'ford1.jpg'),
(25, 'Ford', 'Mustang', 1978, 1969, 132456, 'asdas', NULL, 8700, 'toyota.jpg'),
(26, 'Toyota', 'Hilux', 6495, 1999, 132456, 'drgdrgrdg', NULL, 8700, 'toyota1.jpg'),
(27, 'Toyota', 'Hilux', 6495, 1999, 132456, 'drgdrgrdg', NULL, 8700, 'toyota2.jpg'),
(28, 'Honda', 'Civic', 1567, 1998, 300010, 'vtec just kicked in yo', NULL, 4321, 'honda.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `images`
--

CREATE TABLE `images` (
  `car_id` int(11) NOT NULL,
  `image1` mediumblob NOT NULL,
  `image2` mediumblob DEFAULT NULL,
  `image3` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `nev`, `email`, `password`) VALUES
(1, 'armando', 'miau@vau.com', '$2y$10$1LyHlnz5sGDRvs/CW1sf.Oz');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `images`
--
ALTER TABLE `images`
  ADD KEY `car_id` (`car_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
