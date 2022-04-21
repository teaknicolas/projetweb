-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 21 avr. 2022 à 21:38
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test1`
--

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
CREATE TABLE IF NOT EXISTS `catalogue` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qte` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `catalogue`
--

INSERT INTO `catalogue` (`id`, `categorie`, `produit`, `prix`, `qte`, `description`, `img`) VALUES
(1, 'Processeur', 'AMD RYZEN 5 3600', '200€', '10', 'AMD RYZEN 5 3600, socket : AM4, 3.6/4.2 GHZ, 6 core/12 threads, TDP : 65W, chipset CM : A320, A520, B350, B450, B550, X370, X470, X570', 'img/amdryzen53600.jpg'),
(2, 'Processeur', 'AMD RYZEN 7 3700x', '300€', '10', 'AMD RYZEN 7 3700x, socket : AM4, 3.6/4.4 GHZ, 8 core/16 threads, TDP : 65W, chipset CM : A320, A520, B350, B450, B550, X370, X470, X570', 'img/amdryzen73700x.jpg'),
(4, 'Processeur', 'AMD RYZEN 3 3200g', '150€', '10', 'AMD RYZEN 3 3200g, socket : AM4, 3.6/4.4 GHZ, 4 core/8 threads, TDP : 65W, chipset CM : A320, A520, B350, B450, B550, X370, X470, X570', 'img/amdryzen33200g.jpg'),
(6, 'Processeur', 'AMD RYZEN 5 5500', '204€', '10', 'AMD RYZEN 5 5500, socket : AM4, 3.2/4.2 GHZ, 6 core/12 threads, TDP : 65W, chipset CM : A320, A520, B350, B450, B550, X370, X470, X570', 'img/amdryzen55500.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `cg`
--

DROP TABLE IF EXISTS `cg`;
CREATE TABLE IF NOT EXISTS `cg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cg`
--

INSERT INTO `cg` (`id`, `produit`, `description`, `prix`, `stock`) VALUES
(1, 'RTX 3060 ti', 'Carte graphique architecture Ray tracing, 1665 Mhz', '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_utilisateur`, `qte`, `id_produit`) VALUES
(1, 72, 3, 2),
(2, 72, 1, 1),
(3, 75, 7, 2),
(4, 72, 1, 2),
(18, 72, 1, 1),
(6, 75, 1, 2),
(7, 75, 1, 2),
(8, 72, 1, 2),
(9, 75, 1, 2),
(10, 72, 1, 6),
(11, 72, 0, 1),
(12, 72, 0, 4),
(13, 72, 0, 4),
(14, 72, 4, 4),
(15, 72, 10, 4),
(16, 72, 4, 4),
(17, 75, 5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `pseudo`, `email`, `mdp`, `date_inscription`, `photo`) VALUES
(63, 'weed', 'weed@gmail.com', '$2y$10$DDkvNmeLbju3iswjRVSIqu/rQj7ga.H04GnPPxFe36/lugtrw2t82', '2021-07-22 12:08:11', ''),
(72, 'marc', 'marc@gmail.com', '123456', '2021-07-22 14:26:34', ''),
(75, 'teaknicolas', 'teaknicolas@gmail.com', 'teak23', '2021-12-14 17:28:14', 'IMG_20200927_145151.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
