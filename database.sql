-- Active: 1666773360795@@127.0.0.1@3306@saint_ay
CREATE TABLE
    municipalityTeam (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        firstname VARCHAR(80) NOT NULL,
        lastname VARCHAR(80) NOT NULL,
        role TEXT NOT NULL,
        image TEXT NOT NULL
    );

INSERT INTO
    municipalityTeam (
        firstname,
        lastname,
        role,
        image
    )

VALUES (
        'Frédéric',
        'CUILLERIER',
        'Compétence générale - Police - Sécurité - Etat Civil',
        '/../assets/images/MairePortrait.png'
    ), (
        'Marie-Françoise ',
        'QUERE',
        'Adjointe aux bâtiments et au développement durable - biodiversité',
        '/../assets/images/Marie-francoisePortrait.png'
    ), (
        'Pascal ',
        'FOULON',
        'Adjoint aux affaires scolaires, culture, communication et gestion des salles',
        '/../assets/images/PascalPortrait.png'
    ), (
        'Dominique',
        'RENAULT',
        'Adjoint aux travaux, voirie et traitement des eaux.',
        '/../assets/images/DominiquePortrait.png'
    );

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

INSERT INTO actuality
VALUES (1, "Nouveau site est en construction", 20221020 , "/assets/images/homme-devant-ordinateur.jpg", "Un nouveau site est actuellement en cours de construction. Tout le contenu n'est pas encore disponible", NULL);

INSERT INTO actuality
VALUES (2, "A Saint-Ay, après l'incendie du mois de janvier, l'usine Ciritec ne sera pas reconstruite.", 20221003, "/assets/images/incendie_saintay.jpeg", "Spécialisée dans les circuits imprimés, l'usine de Saint-Ay a été détruite par un incendie fin janvier. Un plan de sauvegarde de l'emploi est en cours pour 53 salariés. Seul un site d'expertise de dix-sept personnes sera conservé dans la commune.", "https://www.larep.fr/widgetRss/saint-ay-45130/actualites/les-marcheurs-agyliens-sont-en-forme_14204782/");


INSERT INTO actuality
VALUES (3, "Les marcheur Agyliens sont en forme !", 20220923, "/assets/images/marcheur_agyliens.jpeg", "Les Marcheurs agyliens sont en forme. Les Marcheurs agyliens ont tenu leur assemblée générale, mardi, à laquelle a assisté Joël Girard, conseiller délégué aux sports.", "https://www.larep.fr/widgetRss/saint-ay-45130/actualites/a-saint-ay-apres-l-incendie-du-mois-de-janvier-l-usine-ciretec-ne-sera-pas-reconstruite_14203826/");

CREATE TABLE report (
`id` INT NOT NULL AUTO_INCREMENT,
`title` varchar(255) NOT NULL,
`date` DATE NOT NULL,
`description` TEXT NOT NULL,
`link` TEXT NULL,
`category_id` INT NOT NULL,
PRIMARY KEY (`id`)
);

CREATE TABLE report_category (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL, 
    `image` TEXT NOT NULL,
    PRIMARY KEY (`id`)
);
INSERT INTO report_category
VALUES (1, "Les réunions du conseil", "/assets/images/reunion-conseil.png");

INSERT INTO report_category
VALUES (2, "Les bulletins municipaux", "/assets/images/logo-conseil-municipal.png");

INSERT INTO report_category
VALUES (3, "Les arrêtés municipaux", "/assets/images/arrete-municipal.jpg");

INSERT INTO report
VALUES (1, "Réunion du 19 Septembre 2022", 20220919,"Voir l'ordre du jour en cliquant ci-dessus.", "http://www.ville-saint-ay.fr/docs/annonces/20220919_cm.pdf", 1);

INSERT INTO report
VALUES (2, "Réunion du 11 Avril 2022", 20220411, "Urbanisme, Vente des parcelles cadastrées. Ressources Humaines. Finances - Budgets, Subventions. Approbations des comptes. Vie associative. Voir le PV ci-dessous.", "http://www.ville-saint-ay.fr/docs/CR_20220411.pdf", 2);

CREATE TABLE user (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO user ('email', 'password')
VALUES (
    'admin@saintay.fr',
    'password'
);

