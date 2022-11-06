-- Active: 1666785953847@@127.0.0.1@3306@saint_ay

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

CREATE TABLE
    Association (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name VARCHAR(120) NOT NULL,
        category_id TEXT NOT NULL,
        description TEXT NOT NULL,
        phone_number INT NOT NULL
    );

CREATE TABLE
    Category (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name VARCHAR(100) NOT NULL,
        image TEXT NOT NULL
    );

INSERT INTO
    `Association` (
        name,
        category_id,
        description,
        phone_number
    )
VALUES (
        'Arts en Partage',
        'Culture',
        'L\'association a pour but de favoriser les échanges entre amateurs d\’arts sous leurs différentes formes, et artistes, de promouvoir l\’art, le patrimoine, la littérature au plan local et plus largement, notamment en diffusant toutes informations sur les manifestations artistiques et culturelles, en organisant de telles manifestations et en créant des liens avec les autres structures locales œuvrant dans le même sens.',
        '06 71 08 13 51'
    ), (
        'Association Théatrale Le Paradoxe',
        'Culture',
        'L’objectif visé est de permettre à chacun(e) de s’exprimer et de s’épanouir avec son propre imaginaire et sa personnalité dans le respect de l’autre, en s’appuyant et apprenant les technique d’art dramatique (mise en espace des corps, positionnement de la voix, improvisation…).',
        '06 11 17 79 61'
    ), (
        'Bibliothèque Municipale',
        'Culture',
        'La bibliothèque met à votre disposition des romans, albums, revues, documentaires, BD, livres en gros caractères. La bibliothèque acquiert des nouveautés plusieurs fois par an. N’hésitez pas à faire des suggestions d’achats ou d’emprunts à la Bibliothèque.',
        '02 38 66 46 41'
    ), (
        'Chorale "Ensemble"',
        'Culture',
        'Notre chorale a un répertoire varié, elle est ouverte à tous, jeunes ou moins jeunes, musiciens ou non. Elle veille à progresser, dans le souci de réussir ses prestations, mais toujours dans la bonne humeur ! Venez nous rejoindre !',
        '06 28 29 41 45'
    ), (
        'Club Céramique "Les Argyliennes"',
        'Culture',
        'L\'atélier réunit deux fois par semaine une communauté de passionnés, débutants ou confirmés, qui partagent l\'envie de créees avec la terre et d\'échanger leur savoir-faire.',
        '06 31 03 13 87'
    ), (
        'Comité des fêtes de Saint-Ay',
        'Culture',
        'Depuis mars 2015, le Comité des Fêtes compte 14 membres : 7 membres du bureau, 6 membres très actifs et 1 membre d’honneur.',
        '02 38 88 84 86'
    ), (
        'Harmonie de Saint-Ay',
        'Culture',
        'Composée d\'environ 40 musiciens, l\'orchestre d\'harmonie se produit lors des concerts, de festivals, de cérémonies et a participé à des concours nationaux.',
        '06 83 40 76 20'
    ), (
        'Association Jeanne d\'Arc (Centre Paroissial)',
        'Culture',
        'Contribue au bon déroulement de la vie paroissiale sous toutes ses formes.',
        '09 51 48 38 20'
    ), (
        'Club Informatique Agylien',
        'Education',
        'En toute convivialité, venez quand vous voulez au club, toute l\'année hors vacances scolaires et jours fériés, avec vos appareils, pour partager, évoluer dans votre pratique, pour trouver des solutions. Plusieurs thèmes abordés: photo, vidéo, mail, tableur, traitement de texte, dessin, retouche, sauvegarde, réseaux sociaux, jeux, applications.',
        '02 46 91 01 19'
    ), (
        'Association des Parents Indépendants de Saint-Ay',
        'Parents',
        'Une association locale regroupant une trentaine de parents qui a pour objectif d\'améliorer la scolarité de tous les enfants et de répondre aux attentes de tous les parents.',
        '06 78 64 15 76'
    ), (
        'Association des Parents Indépendants du Collège Nelson Mandela',
        'Parents',
        'Votre enfant est au collège de Saint AY ? Vous souhaitez vous investir dans sa scolarité ? Vous voulez rejoindre une équipe de parents motivés ? Rejoignez-nous !',
        '06 66 02 366 29'
    ), (
        'Association Parentale de Soutien aux Actions du PAJ',
        'Parents',
        'L’APSA-PAJ (Association Parentale de Soutien aux Actions du Point Accueil Jeunes) est une association para municipale, loi de 1901, créée à l’initiative de parents des jeunes adhérents du Point Accueil Jeunes en Juillet 2007.',
        '02 38 88 84 06'
    ), (
        'Amicale des Retraités de Saint Ay',
        'Communaute',
        'Venez nous rejoindre Tous les jeudis de 14 H à 18 H à la salle Jacques Brel où nous pratiquons divers jeux de sociétés, belote, scrabble, tarot, rumikub, triominos et pétanque. Nous organisons quelques sorties tout au long de l’année, d’une journée, quelques fois plusieurs jours, des repas de temps en temps.',
        '06 70 60 01 20'
    ), (
        'Amicale des Sapeurs Pompiers',
        'Communaute',
        'Pourquoi pas vous?',
        '06 28 53 58 54'
    ), (
        'La Médaille Militaire Meung-sur-Loire-Saint-Ay-Beaugency Comité cantonal du Souvenir Français',
        'Associations patriotiques et d\'Anciens Combattants',
        'Notre association a pour but de Rassembler les hommes et les femmes qui ont porté l’uniforme pour La défense de la France pendant les conflits ou au titre du Service national, les veuves d’Anciens Combattants et les veuves et orphelins de guerre.',
        '06 19 38 55 88'
    ), (
        'Union Nationale des Combattants de Saint-Ay',
        'Associations patriotiques et d\'Anciens Combattants',
        'Notre association accueille tous ceux qui ont participé à tous les conflits : 1939/1945, Indochine, Corée du Nord, opérations extérieures sous toute forme, tous les Anciens du Service Militaire, Militaires de carrière, Gendarmes, Policiers, Pompiers, Douaniers, Surveillants pénitentiaires, ainsi que tous les sympathisants (Élus locaux et nationaux par exemple) qui se retrouvent dans nos valeurs.',
        '06 24 24 90 22'
    ), (
        'Association des Donneurs de Sang Bénévoles',
        'Aide mutuelle',
        'Les buts de l’association : - seconder l’établissement de Transfusion Sanguine en participant activement au développement de la transfusion sanguine en recrutant de nouveaux donneurs, notamment chez les jeunes. - maintenir entre ses membres des liens d’amitié et de fraternité en organisant des manifestations ou sorties familiales.',
        '02 36 47 15 84'
    ), (
        'Bouchons, ça roule',
        'Aide mutuelle',
        'À Saint-Ay, Danielle, bénévole de Bouchons ça roule, s\'occupe des sept collecteurs de la commune.',
        '06 81 16 76 94'
    ), (
        'Les façonneurs d\'Agylus',
        'Professionnelles',
        'Notre association a pour but de produire, promouvoir et soutenir l’expression artistique et culturelle sous toutes ses formes.',
        '06 63 10 85 38'
    ), (
        'Union Economique Agylienne',
        'Professionnelles',
        'C’est la dynamique de l’ensemble du tissu économique de Saint-Ay regroupé sous forme d’association pour développer, valoriser et mieux faire connaître toutes les activités proposées par les professionnels de notre commune.',
        '02 38 88 85 18'
    ), (
        'Association de Sophrologie et Disciplines Associées',
        'Sport',
        'Ensemble de techniques qui vous permet : - d’apprendre à gérer le stress, - de diminuer l’anxiété, - de découvrir ses propres ressources, - de développer la confiance en soi, - de prendre conscience de ses capacités, - de savoir se détendre à tout moment.',
        '06 77 73 44 57'
    ), (
        'Cercle Gaston Couté de cyclotourisme',
        'Sport',
        'Pratique du cyclisme et du clyclotourisme ainsi que toutes initiatives propres a la formation phisique et morale de ses members.',
        '06 71 43 31 03'
    ), (
        'Cercle Saint Agylien Basket',
        'Sport',
        'Dynamique et énergique, le club de Saint Ay Basket est composé de joueuses en équipe loisir et en équipe 1ère série départementale, féminines. Un peu d’habileté, d’explosivité, d’endurance, un minimum de qualités techniques et mentales sont les bases du basket !',
        '06 60 78 16 75'
    ), (
        'Club de Badminton',
        'Sport',
        'Le club de Badminton est ouvert à tous à partir de 16 ans pour les « adultes » et 7 ans pour le créneau jeunes. En compétition et en loisir.',
        '06 23 23 23 44'
    ), (
        'Danse Country',
        'Sport',
        'Vous aimez la musique country ? Vous aimez danser ? Alors n\'hésitez pas, venez nous rejoindre!',
        '06 60 79 75 48'
    ), (
        'Ecole de rugby O\'Val des Mauves',
        'Sport',
        'Une vingtaine de parents et enfants ont répondu à l\'invitation du nouveau club de rugby de l\'ouest Orléanais, « l\'O\'val des Mauves », pour la réunion de présentation du projet.',
        '06 82 55 93 77'
    ), (
        'Entente Chaingy Saint Ay Football',
        'Sport',
        'Déjà la rentrée ! Votre enfant ne fait pas encore de sport ? Avez-vous pensé au football ? Dans le cadre de son Ecole de foot labellisée par la FFF, 1 entraînement gratuit pour les nouveaux enfants en début de saison. Donc n’hésitez pas à venir pour essayer sans engagement !',
        '06 25 62 22 44'
    ), (
        'Gymnastique volontaire Saint-Ay',
        'Sport',
        'Assouplissement/Renfort musculaire/Stretching/Zumba',
        '06 85 46 42 10 '
    ), (
        'Marcheurs Agyliens',
        'Sport',
        'Le Club organise diverses randonnées durant la saison qui débute à partir du mois de septembre jusqu’au mois de juin suivant.',
        '06 13 41 35 41'
    ), (
        'Physic Form Agylien',
        'Sport',
        'Musculation, Espace Cardio, Remise en forme',
        '06 20 79 84 10'
    ), (
        'Saint-Ay Mad Skaters',
        'Sport',
        'L\'association Saint-Ay Mad Skaters a été fondée vers la fin des années 80 par des jeunes de la commune de Saint-Ay, passionnés de sports de glisse. Le skatepark de Saint-Ay est géré par l\'association qui pense, fabrique et entretient les modules qui composent le skatepark depuis plus de 20 ans, faisant de lui l\'un des plus vieux skateparks français.',
        '06 20 27 76 71'
    );

INSERT INTO
    `Category` (
        name,
        image
    )
VALUES (
    'Culture',
    "/assets/images/association_images/culturelles.png"
), (
    'Education',
    "/assets/images/association_images/education.png"
), (
    'Parents',
    "/assets/images/association_images/parents.png"
), (
     'Communaute',
     "/assets/images/association_images/amicale.png"
), (
    'Associations patriotiques et d\'Anciens Combattants',
     "/assets/images/association_images/patriotique.png"
), (
     'Aide mutuelle',
     "/assets/images/association_images/aide.png"
), (
     'Professionnelles',
     "/assets/images/association_images/professionnelles.png"
), (
     'Sport',
     "/assets/images/association_images/sportives.png"
);