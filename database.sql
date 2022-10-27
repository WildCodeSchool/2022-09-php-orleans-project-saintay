-- Active: 1666773360795@@127.0.0.1@3306@saint_ay
-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simple-mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `title`) VALUES
(1, 'Stuff'),
(2, 'Doodads');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




/* // PAGE MUNICIPALITE ORGANIGRAMME */

DROP TABLE `Organigramme`;

CREATE TABLE
    Organigramme (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        firstname VARCHAR(80) NOT NULL,
        lastname VARCHAR(80) NOT NULL,
        role TEXT NOT NULL,
        image TEXT NOT NULL
    );

INSERT INTO Organigramme (firstname, lastname, role, image)
VALUES 
    ('Frédéric', 'CUILLERIER', 'Compétence générale - Police - Sécurité - Etat Civil','/../assets/images/MairePortrait.png'),
    ('Marie-Françoise ', 'QUERE', 'Adjointe aux bâtiments et au développement durable - biodiversité','/../assets/images/Marie-francoisePortrait.png'),
    ('Pascal ', 'FOULON', 'Adjoint aux affaires scolaires, culture, communication et gestion des salles','/../assets/images/PascalPortrait.png'),
    ('Dominique', 'RENAULT', 'Adjoint aux travaux, voirie et traitement des eaux.','/../assets/images/DominiquePortrait.png');

/*     // PAGE MUNICIPALITE ORGANIGRAMME */