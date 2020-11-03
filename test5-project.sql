-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 nov 2020 om 17:08
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test5-project`
--
CREATE DATABASE IF NOT EXISTS `test5-project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test5-project`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Frankrijk'),
(2, 'Amerika'),
(3, 'Engeland'),
(4, 'china');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201021120728', '2020-10-21 14:07:49', 426);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas`
--

CREATE TABLE `klas` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `niveau_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klas`
--

INSERT INTO `klas` (`id`, `school_id`, `niveau_id`, `name`) VALUES
(1, 1, 6, '1J'),
(2, 1, 7, '1H'),
(3, 2, 5, '1K'),
(4, 3, 1, '1B'),
(5, 3, 2, '2B'),
(6, 3, 5, '3B'),
(7, 3, 2, '2B'),
(8, 3, 5, '3B');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas_has_les`
--

CREATE TABLE `klas_has_les` (
  `id` int(11) NOT NULL,
  `klas_id` int(11) NOT NULL,
  `les_id` int(11) NOT NULL,
  `rooster_id` int(11) NOT NULL,
  `vervallen` int(11) DEFAULT NULL,
  `opvang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klas_has_les`
--

INSERT INTO `klas_has_les` (`id`, `klas_id`, `les_id`, `rooster_id`, `vervallen`, `opvang`) VALUES
(1, 3, 4, 7, 1, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `les`
--

CREATE TABLE `les` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `les`
--

INSERT INTO `les` (`id`, `name`) VALUES
(1, 'Nederlands'),
(2, 'Engels'),
(3, 'Rekenen'),
(4, 'Natuurkunde'),
(5, 'Rekenen'),
(6, 'Natuurkunde');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `niveau`
--

INSERT INTO `niveau` (`id`, `name`) VALUES
(1, 'Mavo'),
(2, 'Havo'),
(5, 'Vwo'),
(6, 'MBO'),
(7, 'HBO'),
(10, 'Universiteit');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rooster`
--

CREATE TABLE `rooster` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `rooster`
--

INSERT INTO `rooster` (`id`, `start`, `end`) VALUES
(1, '2020-01-10 08:00:00', '2020-01-10 09:00:00'),
(2, '2015-01-01 09:00:00', '2015-01-01 10:00:00'),
(3, '2015-01-01 10:00:00', '2015-01-01 11:00:00'),
(4, '2015-01-01 11:00:00', '2015-01-01 12:00:00'),
(5, '2015-01-01 12:00:00', '2015-01-01 13:00:00'),
(6, '2015-01-01 13:00:00', '2015-01-01 14:00:00'),
(7, '2015-01-01 14:00:00', '2015-01-01 15:00:00'),
(8, '2015-01-01 15:00:00', '2015-01-01 16:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `country_id` int(11) NOT NULL,
  `tuition` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `school`
--

INSERT INTO `school` (`id`, `name`, `created_at`, `country_id`, `tuition`) VALUES
(1, 'RoCMondriaan Tinwerf', '2020-10-21 15:27:45', 1, '1500.00'),
(2, 'Universiteit leiden', '2020-10-21 15:27:45', 3, '1200.00'),
(3, 'Middelbare school ROC', '2020-10-21 15:28:59', 2, '1300.00'),
(5, 'bosnia', '2020-10-27 15:17:00', 4, '500.00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `klas_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `take_order`
--

CREATE TABLE `take_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `placed_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `klas_id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `klas_id`, `username`, `roles`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jay', '[]', '$argon2id$v=19$m=65536,t=4,p=1$UjBHT1FuVFVyeFNNWEUvZw$/qc6yafGnU0oHWBZYoLQiEKUXGvC+e5HLIuBN8SV4rU', 'jay@blaztah', '2015-01-01 04:08:00', '0000-00-00 00:00:00'),
(2, 3, 'bob', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Tk5mTlpGYnZ0OGg3RldYUw$HodwOvGiWHOhnd2xJPPq1TQxjcfL17ajqpZ8+v6qHSM', 'bob@debuilder', '2020-10-23 11:12:00', '2020-10-23 11:13:13'),
(3, 7, 'test', '[]', '$argon2id$v=19$m=65536,t=4,p=1$WEZxVVFmMEtvZWxOQU1sVA$RnHSbLLF1DQPBTsc66PzdgaxUUecreRMrm2falDJlDQ', 'test@test', '2020-10-27 15:46:00', '2020-10-27 15:47:28'),
(4, 6, 'test1', '[]', '$argon2id$v=19$m=65536,t=4,p=1$UFRPZFRieHc2RGYxRUVUag$CtlG8d6svP4ibUYWORnxGAHtKa0pJVAKoqd8anYkIV8', 'test1@test6', '2020-10-27 15:56:58', '2020-10-27 15:56:58');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3944E73AC32A47EE` (`school_id`),
  ADD KEY `IDX_3944E73AB3E9C81` (`niveau_id`);

--
-- Indexen voor tabel `klas_has_les`
--
ALTER TABLE `klas_has_les`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C570AD142F3345ED` (`klas_id`),
  ADD KEY `IDX_C570AD147FAC85EF` (`les_id`),
  ADD KEY `IDX_C570AD14DFF0C8D8` (`rooster_id`);

--
-- Indexen voor tabel `les`
--
ALTER TABLE `les`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `rooster`
--
ALTER TABLE `rooster`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F99EDABBF92F3E70` (`country_id`);

--
-- Indexen voor tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B723AF332F3345ED` (`klas_id`),
  ADD KEY `IDX_B723AF33A76ED395` (`user_id`);

--
-- Indexen voor tabel `take_order`
--
ALTER TABLE `take_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CDECD97BA76ED395` (`user_id`),
  ADD KEY `IDX_CDECD97BC32A47EE` (`school_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD KEY `IDX_8D93D6492F3345ED` (`klas_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `klas`
--
ALTER TABLE `klas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `klas_has_les`
--
ALTER TABLE `klas_has_les`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `les`
--
ALTER TABLE `les`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `rooster`
--
ALTER TABLE `rooster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `take_order`
--
ALTER TABLE `take_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD CONSTRAINT `FK_3944E73AB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`),
  ADD CONSTRAINT `FK_3944E73AC32A47EE` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Beperkingen voor tabel `klas_has_les`
--
ALTER TABLE `klas_has_les`
  ADD CONSTRAINT `FK_C570AD142F3345ED` FOREIGN KEY (`klas_id`) REFERENCES `klas` (`id`),
  ADD CONSTRAINT `FK_C570AD147FAC85EF` FOREIGN KEY (`les_id`) REFERENCES `les` (`id`),
  ADD CONSTRAINT `FK_C570AD14DFF0C8D8` FOREIGN KEY (`rooster_id`) REFERENCES `rooster` (`id`);

--
-- Beperkingen voor tabel `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `FK_F99EDABBF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Beperkingen voor tabel `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_B723AF332F3345ED` FOREIGN KEY (`klas_id`) REFERENCES `klas` (`id`),
  ADD CONSTRAINT `FK_B723AF33A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Beperkingen voor tabel `take_order`
--
ALTER TABLE `take_order`
  ADD CONSTRAINT `FK_CDECD97BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_CDECD97BC32A47EE` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Beperkingen voor tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6492F3345ED` FOREIGN KEY (`klas_id`) REFERENCES `klas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
