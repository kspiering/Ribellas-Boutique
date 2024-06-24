-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 23. Jun 2024 um 13:05
-- Server-Version: 5.7.39
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ribellas_boutique`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `imagepath` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `subtitle`, `location`, `date`, `text`, `imagepath`, `alt`, `tags`, `created_at`) VALUES
(1, 'Parisian Elegance: A Timeless Affair with Fashion', 'Unveiling the Secrets of Effortless Chic', 'Paris, France', '08.06.2023', 'Discover Parisian elegance—a lifestyle where every cobblestone whispers haute couture tales. Streets transform into runways, adorned with ensembles blending classic sophistication and modern trend', 'uploads/2024/06/23/haute-couture_667801e663991.jpg', 'Haute Couture', 'fashion', '2024-06-23 11:07:18'),
(2, 'Metropolitan Maven: Modern Elegance in the Concrete Jungle', 'Navigating Contemporary Fashion in the Urban Landscape', 'New York City, USA', '02.11.2023', 'Dive into the world of metropolitan fashion—a realm where concrete jungles become catwalks. Explore the fusion of modern elegance with the ever-evolving trends of the urban landscape.', 'uploads/2024/06/23/metropolitan-maven_6678020e74815.jpg', 'Metropolitan', 'urban', '2024-06-23 11:07:58'),
(3, 'Mediterranean Chic: Sailing Through Style in Capri', 'A Fashionable Odyssey on the Island of Glamour', 'Capri, Italy', '07.02.2023', 'Embark on a fashionable odyssey in Capri, where the Mediterranean breeze carries whispers of chic style. Explore ensembles that mirror the island&#039;s effortless and sun-kissed allure.', 'uploads/2024/06/23/mediterranean-chic_66780244dae3a.jpg', 'Mediteran', 'chic', '2024-06-23 11:08:52'),
(4, 'Barcelona Bliss: Flamenco Flair Meets Urban Chic', 'Dancing Through the Intersection of Tradition and Modernity', 'Barcelona, Spain', '09.09.2023', 'Experience the bliss of Barcelona, where Flamenco flair intertwines with urban chic. Explore ensembles that capture the essence of tradition while embracing the vibrant spirit of modernity.', 'uploads/2024/06/23/barcelona-bliss_6678026c3fb13.jpg', 'Barcelona', 'flamenco', '2024-06-23 11:09:32'),
(5, 'Santorini Serenity: Grecian Elegance Amidst Azure Horizons', 'A Fashionable Odyssey in the Aegean Paradise', 'Santorini, Greece', '12.10.2023', 'Embark on a fashionable odyssey in Santorini, where Grecian elegance meets azure horizons. Explore ensembles that mirror the island&#039;s timeless charm against a backdrop of breathtaking views.', 'uploads/2024/06/23/santorini-serenity_667802956469f.jpg', 'Santorini', 'elegance', '2024-06-23 11:10:13');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agb` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `country`, `firstname`, `lastname`, `username`, `gender`, `email`, `password`, `agb`) VALUES
(2, 'switzerland', 'Kim', 'Spiering', 'admin123', 'male', 'admin@gmail.com', '$2y$10$a00L8e.Ub4luSdjogNQFTOEBXXnINdePc8hjNVvfTXZHgbFIqN/8C', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
