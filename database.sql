
/* // PAGE MUNICIPALITE ORGANIGRAMME */

CREATE TABLE
    MunicipalityTeam (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        firstname VARCHAR(80) NOT NULL,
        lastname VARCHAR(80) NOT NULL,
        role TEXT NOT NULL,
        image TEXT NOT NULL
    );

INSERT INTO
    MunicipalityTeam (
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

/*     // PAGE MUNICIPALITE ORGANIGRAMME */