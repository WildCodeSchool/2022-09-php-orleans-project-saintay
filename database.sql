-- Active: 1665745572078@@127.0.0.1@3306@saint_ay

DROP TABLE `municipalityTeam`;

CREATE TABLE
    municipalityTeam (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        firstname VARCHAR(80) NOT NULL,
        lastname VARCHAR(80) NOT NULL,
        role TEXT NOT NULL,
        image TEXT NOT NULL,
        communal BOOLEAN NOT NULL
    );

INSERT INTO
    municipalityTeam (
        firstname,
        lastname,
        role,
        image,
        communal
    )
VALUES (
        'Frédéric',
        'CUILLERIER',
        'Compétence générale - Police - Sécurité - Etat Civil',
        '/../upload/MairePortrait.png',
        false
    ), (
        'Marie-Françoise ',
        'QUERE',
        'Adjointe aux bâtiments et au développement durable - biodiversité',
        '/../upload/Marie-francoisePortrait.png',
        false
    ), (
        'Pascal ',
        'FOULON',
        'Adjoint aux affaires scolaires, culture, communication et gestion des salles',
        '/../upload/PascalPortrait.png',
        false
    ), (
        'Dominique',
        'RENAULT',
        'Adjoint aux travaux, voirie et traitement des eaux.',
        '/../upload/DominiquePortrait.png',
        false
    ), (
        'Cecile',
        'TULIPE',
        'Accueil, état civil, listes electorales, cimetiere. ',
        '/../upload/cecile.jpg.png',
        true
    ), (
        'Isabelle',
        'PANEL',
        'Urbanisme.',
        '/../upload/isabelle.jpg',
        true
    ), (
        'Anais',
        'MAIS',
        'Comptabilite.',
        '/../upload/Robin-Anais.jpg.png',
        true
    ), (
        'Melanie',
        'PALVINE',
        'Vie associative et Reservation de salles .',
        '/../upload/images.jpeg',
        true
    ), (
        'Justine',
        'BLANDINE',
        'Vie associative et Reservation de salles .',
        '/../upload/Justine-Cesari(1).jpg',
        true
    ), (
        'Justine',
        'POURADIER',
        'Assistante du Maire et Direction Generale/Culture et Communication .',
        '/../upload/thumbnail.jpeg',
        true
    ), (
        'Meline',
        'MALIGNE',
        'Assistante Ressources Humaines, Agence postale communale .',
        '/../upload/meline.jpeg',
        true
    ), (
        'Aurelie',
        'JOLIE',
        'Directrice Generale des Services .',
        '/../upload/aurelie.jpg',
        true
    ), (
        'Adeline',
        'LINE',
        'Directrice Générale Adjointe/Directrice Pole Enfance, Jeunesse et Social.',
        '/../upload/adeline.jpg',
        true
    ), (
        'Hanane',
        'PIONNER',
        'Directrice des Ressources Humaines.',
        '/../upload/Hanane.jpeg',
        true
    ), (
        'David',
        'DOUILLER',
        'Directeur des Services Techniques.',
        '/../upload/David.jpg',
        true
    ), (
        'Zakya',
        'MANDAYA',
        'Charge des projets.',
        '/../upload/zakia.jpeg',
        true
    ), (
        'Adeline',
        'JUVANILE',
        'CCAS.',
        '/../upload/adeline2.jpeg',
        true
    ), (
        'Thierry',
        'MICHON',
        'Police municipale.',
        '/../upload/Thierry_Bollore(1).jpg',
        true
    ), (
        'Karine',
        'FARINE',
        'Police municipale.',
        '/../upload/karine.jpeg',
        true
    );

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

CREATE TABLE
    actuality (
        `id` INT NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL,
        `date` DATE NOT NULL,
        `image` TEXT NOT NULL,
        `description` TEXT NOT NULL,
        `link` TEXT NULL,
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    user (
        'id' INT NOT NULL AUTO_INCREMENT PRIMARY_KEY,
        'email' VARCHAR(255) NOT NULL,
        'password' VARCHAR(255) NOT NULL
    );

INSERT INTO
    'user' ('email', 'password')
VALUES (
        'admin@saintay.fr',
        'password'
    );

INSERT INTO actuality
VALUES (
        1,
        "Nouveau site est en construction",
        20221020,
        "/assets/images/homme-devant-ordinateur.jpg",
        "Un nouveau site est actuellement en cours de construction. Tout le contenu n'est pas encore disponible",
        NULL
    );

INSERT INTO actuality
VALUES (
        2,
        "A Saint-Ay, après l'incendie du mois de janvier, l'usine Ciritec ne sera pas reconstruite.",
        20221003,
        "/assets/images/incendie_saintay.jpeg",
        "Spécialisée dans les circuits imprimés, l'usine de Saint-Ay a été détruite par un incendie fin janvier. Un plan de sauvegarde de l'emploi est en cours pour 53 salariés. Seul un site d'expertise de dix-sept personnes sera conservé dans la commune.",
        "https://www.larep.fr/widgetRss/saint-ay-45130/actualites/les-marcheurs-agyliens-sont-en-forme_14204782/"
    );

INSERT INTO actuality
VALUES (
        3,
        "Les marcheur Agyliens sont en forme !",
        20220923,
        "/assets/images/marcheur_agyliens.jpeg",
        "Les Marcheurs agyliens sont en forme. Les Marcheurs agyliens ont tenu leur assemblée générale, mardi, à laquelle a assisté Joël Girard, conseiller délégué aux sports.",
        "https://www.larep.fr/widgetRss/saint-ay-45130/actualites/a-saint-ay-apres-l-incendie-du-mois-de-janvier-l-usine-ciretec-ne-sera-pas-reconstruite_14203826/"
    );