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



CREATE TABLE actuality (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` DATE NOT NULL,
  `image` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  `link` TEXT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE user (
    'id' INT NOT NULL AUTO_INCREMENT PRIMARY_KEY,
    'email' VARCHAR(255) NOT NULL,
    'password' VARCHAR(255) NOT NULL
);

INSERT INTO 'user' ('email', 'password')
VALUES (
    'admin@saintay.fr',
    'password'
);


INSERT INTO actuality
VALUES (1, "Nouveau site est en construction", 20221020 , "/assets/images/homme-devant-ordinateur.jpg", "Un nouveau site est actuellement en cours de construction. Tout le contenu n'est pas encore disponible", NULL);

INSERT INTO actuality
VALUES (2, "A Saint-Ay, après l'incendie du mois de janvier, l'usine Ciritec ne sera pas reconstruite.", 20221003, "/assets/images/incendie_saintay.jpeg", "Spécialisée dans les circuits imprimés, l'usine de Saint-Ay a été détruite par un incendie fin janvier. Un plan de sauvegarde de l'emploi est en cours pour 53 salariés. Seul un site d'expertise de dix-sept personnes sera conservé dans la commune.", "https://www.larep.fr/widgetRss/saint-ay-45130/actualites/les-marcheurs-agyliens-sont-en-forme_14204782/");


INSERT INTO actuality
VALUES (3, "Les marcheur Agyliens sont en forme !", 20220923, "/assets/images/marcheur_agyliens.jpeg", "Les Marcheurs agyliens sont en forme. Les Marcheurs agyliens ont tenu leur assemblée générale, mardi, à laquelle a assisté Joël Girard, conseiller délégué aux sports.", "https://www.larep.fr/widgetRss/saint-ay-45130/actualites/a-saint-ay-apres-l-incendie-du-mois-de-janvier-l-usine-ciretec-ne-sera-pas-reconstruite_14203826/");
