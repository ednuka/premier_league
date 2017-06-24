-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Haz 2017, 04:38:12
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `premierleague`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `league_table`
--

CREATE TABLE `league_table` (
  `id` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `played` int(11) NOT NULL,
  `won` int(11) NOT NULL,
  `drawn` int(11) NOT NULL,
  `lost` int(11) NOT NULL,
  `goals_for` int(11) NOT NULL,
  `goals_against` int(11) NOT NULL,
  `goal_difference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `match_results`
--

CREATE TABLE `match_results` (
  `id` int(11) NOT NULL,
  `first_team_id` int(11) NOT NULL,
  `second_team_id` int(11) NOT NULL,
  `first_score` int(11) NOT NULL,
  `second_score` int(11) NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `match_results`
--

INSERT INTO `match_results` (`id`, `first_team_id`, `second_team_id`, `first_score`, `second_score`, `week`) VALUES
(9, 3, 4, 5, 3, 1),
(10, 2, 4, 3, 4, 1),
(11, 4, 3, 3, 2, 1),
(12, 2, 3, 4, 4, 1),
(13, 1, 2, 2, 2, 1),
(14, 3, 1, 3, 5, 1),
(15, 4, 1, 2, 1, 1),
(16, 3, 2, 2, 2, 2),
(17, 4, 3, 1, 2, 2),
(18, 4, 1, 1, 0, 2),
(19, 2, 4, 0, 4, 2),
(21, 2, 1, 5, 1, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(30) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `teams`
--

INSERT INTO `teams` (`id`, `team_name`) VALUES
(1, 'Chelsea'),
(2, 'Arsenal'),
(3, 'Manchester City'),
(4, 'Liverpool');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `league_table`
--
ALTER TABLE `league_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_fk` (`team_id`);

--
-- Tablo için indeksler `match_results`
--
ALTER TABLE `match_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first_team_id` (`first_team_id`),
  ADD KEY `secaond_team_id` (`second_team_id`);

--
-- Tablo için indeksler `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `league_table`
--
ALTER TABLE `league_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `match_results`
--
ALTER TABLE `match_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Tablo için AUTO_INCREMENT değeri `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `league_table`
--
ALTER TABLE `league_table`
  ADD CONSTRAINT `league_table_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `match_results`
--
ALTER TABLE `match_results`
  ADD CONSTRAINT `match_results_ibfk_1` FOREIGN KEY (`first_team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `match_results_ibfk_2` FOREIGN KEY (`second_team_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
