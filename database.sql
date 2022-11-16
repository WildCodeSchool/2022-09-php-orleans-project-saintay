-- Active: 1666785953847@@127.0.0.1@3306@saint_ay

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
        '/../assets/images/MairePortrait.png',
        false
    ), (
        'Marie-Françoise ',
        'QUERE',
        'Adjointe aux bâtiments et au développement durable - biodiversité',
        '/../assets/images/Marie-francoisePortrait.png',
        false
    ), (
        'Pascal ',
        'FOULON',
        'Adjoint aux affaires scolaires, culture, communication et gestion des salles',
        '/../assets/images/PascalPortrait.png',
        false
    ), (
        'Dominique',
        'RENAULT',
        'Adjoint aux travaux, voirie et traitement des eaux.',
        '/../assets/images/DominiquePortrait.png',
        false
    ), (
        'Cecile',
        'TULIPE',
        'Accueil, état civil, listes electorales, cimetiere. ',
        '/../uploads/cecile.jpg',
        true
    ), (
        'Isabelle',
        'PANEL',
        'Urbanisme.',
        '/../uploads/isabelle.jpg',
        true
    ), (
        'Anais',
        'MAIS',
        'Comptabilite.',
        '/../uploads/Robin-Anais.jpg',
        true
    ), (
        'Melanie',
        'PALVINE',
        'Vie associative et Reservation de salles .',
        '/../uploads/images.jpeg',
        true
    ), (
        'Justine',
        'BLANDINE',
        'Vie associative et Reservation de salles .',
        '/../uploads/Justine-Cesari(1).jpg',
        true
    ), (
        'Justine',
        'POURADIER',
        'Assistante du Maire et Direction Generale/Culture et Communication .',
        '/../uploads/thumbnail.jpeg',
        true
    ), (
        'Meline',
        'MALIGNE',
        'Assistante Ressources Humaines.',
        '/../uploads/meline.jpeg',
        true
    ), (
        'Aurelie',
        'JOLIE',
        'Directrice Generale des Services .',
        '/../uploads/aurelie.jpg',
        true
    ), (
        'Adeline',
        'LINE',
        'Directrice Générale Adjointe.',
        '/../uploads/adeline.jpg',
        true
    ), (
        'Hanane',
        'PIONNER',
        'Directrice des Ressources Humaines, Agence postale communale.',
        '/../uploads/Hanane.jpeg',
        true
    ), (
        'David',
        'DOUILLER',
        'Directeur des Services Techniques.',
        '/../uploads/David.jpg',
        true
    ), (
        'Zakya',
        'MANDAYA',
        'Charge des projets.',
        '/../uploads/zakia.jpeg',
        true
    ), (
        'Adeline',
        'JUVANILE',
        'CCAS.',
        '/../uploads/adeline2.jpeg',
        true
    ), (
        'Thierry',
        'MICHON',
        'Police municipale.',
        '/../uploads/Thierry_Bollore(1).jpg',
        true
    ), (
        'Karine',
        'FARINE',
        'Police municipale.',
        '/../uploads/karine.jpeg',
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

CREATE TABLE
    user (
        `id` INT NOT NULL AUTO_INCREMENT,
        `email` VARCHAR(255) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        PRIMARY KEY(id)
    );

INSERT INTO
    user (`email`, `password`)
VALUES (
        'admin@saintay.fr',
        'password'
    );

CREATE TABLE
    association (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name VARCHAR(120) NOT NULL,
        category_id INT NOT NULL,
        description TEXT NOT NULL,
        phone_number TEXT NOT NULL
    );

CREATE TABLE
    category (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name VARCHAR(100) NOT NULL,
        image TEXT NOT NULL
    );

INSERT INTO
    `association` (
        name,
        category_id,
        description,
        phone_number
    )
VALUES (
        'Arts en Partage',
        '1',
        'L\'association a pour but de favoriser les échanges entre amateurs d\’arts sous leurs différentes formes, et artistes, de promouvoir l\’art, le patrimoine, la littérature au plan local et plus largement, notamment en diffusant toutes informations sur les manifestations artistiques et culturelles, en organisant de telles manifestations et en créant des liens avec les autres structures locales œuvrant dans le même sens.',
        '0671081351'
    ), (
        'Association Théatrale Le Paradoxe',
        '1',
        'L’objectif visé est de permettre à chacun(e) de s’exprimer et de s’épanouir avec son propre imaginaire et sa personnalité dans le respect de l’autre, en s’appuyant et apprenant les technique d’art dramatique (mise en espace des corps, positionnement de la voix, improvisation…).',
        '0611177961'
    ), (
        'Bibliothèque Municipale',
        '1',
        'La bibliothèque met à votre disposition des romans, albums, revues, documentaires, BD, livres en gros caractères. La bibliothèque acquiert des nouveautés plusieurs fois par an. N’hésitez pas à faire des suggestions d’achats ou d’emprunts à la Bibliothèque.',
        '0238664641'
    ), (
        'Chorale "Ensemble"',
        '1',
        'Notre chorale a un répertoire varié, elle est ouverte à tous, jeunes ou moins jeunes, musiciens ou non. Elle veille à progresser, dans le souci de réussir ses prestations, mais toujours dans la bonne humeur ! Venez nous rejoindre !',
        '0628294145'
    ), (
        'Club Céramique "Les Argyliennes"',
        '1',
        'L\'atélier réunit deux fois par semaine une communauté de passionnés, débutants ou confirmés, qui partagent l\'envie de créees avec la terre et d\'échanger leur savoir-faire.',
        '0631031387'
    ), (
        'Comité des fêtes de Saint-Ay',
        '1',
        'Depuis mars 2015, le Comité des Fêtes compte 14 membres : 7 membres du bureau, 6 membres très actifs et 1 membre d’honneur.',
        '0238888486'
    ), (
        'Harmonie de Saint-Ay',
        '1',
        'Composée d\'environ 40 musiciens, l\'orchestre d\'harmonie se produit lors des concerts, de festivals, de cérémonies et a participé à des concours nationaux.',
        '0683407620'
    ), (
        'Association Jeanne d\'Arc (Centre Paroissial)',
        '1',
        'Contribue au bon déroulement de la vie paroissiale sous toutes ses formes.',
        '0951483820'
    ), (
        'Club Informatique Agylien',
        '2',
        'En toute convivialité, venez quand vous voulez au club, toute l\'année hors vacances scolaires et jours fériés, avec vos appareils, pour partager, évoluer dans votre pratique, pour trouver des solutions. Plusieurs thèmes abordés: photo, vidéo, mail, tableur, traitement de texte, dessin, retouche, sauvegarde, réseaux sociaux, jeux, applications.',
        '0246910119'
    ), (
        'Association des Parents Indépendants de Saint-Ay',
        '3',
        'Une association locale regroupant une trentaine de parents qui a pour objectif d\'améliorer la scolarité de tous les enfants et de répondre aux attentes de tous les parents.',
        '0678641576'
    ), (
        'Association des Parents Indépendants du Collège Nelson Mandela',
        '3',
        'Votre enfant est au collège de Saint AY ? Vous souhaitez vous investir dans sa scolarité ? Vous voulez rejoindre une équipe de parents motivés ? Rejoignez-nous !',
        '0660236629'
    ), (
        'Association Parentale de Soutien aux Actions du PAJ',
        '3',
        'L’APSA-PAJ (Association Parentale de Soutien aux Actions du Point Accueil Jeunes) est une association para municipale, loi de 1901, créée à l’initiative de parents des jeunes adhérents du Point Accueil Jeunes en Juillet 2007.',
        '0238888406'
    ), (
        'Amicale des Retraités de Saint Ay',
        '4',
        'Venez nous rejoindre Tous les jeudis de 14 H à 18 H à la salle Jacques Brel où nous pratiquons divers jeux de sociétés, belote, scrabble, tarot, rumikub, triominos et pétanque. Nous organisons quelques sorties tout au long de l’année, d’une journée, quelques fois plusieurs jours, des repas de temps en temps.',
        '0670600120'
    ), (
        'Amicale des Sapeurs Pompiers',
        '4',
        'Pourquoi pas vous?',
        '0628535854'
    ), (
        'La Médaille Militaire Meung-sur-Loire-Saint-Ay-Beaugency Comité cantonal du Souvenir Français',
        '5',
        'Notre association a pour but de Rassembler les hommes et les femmes qui ont porté l’uniforme pour La défense de la France pendant les conflits ou au titre du Service national, les veuves d’Anciens Combattants et les veuves et orphelins de guerre.',
        '0619385588'
    ), (
        'Union Nationale des Combattants de Saint-Ay',
        '5',
        'Notre association accueille tous ceux qui ont participé à tous les conflits : 1939/1945, Indochine, Corée du Nord, opérations extérieures sous toute forme, tous les Anciens du Service Militaire, Militaires de carrière, Gendarmes, Policiers, Pompiers, Douaniers, Surveillants pénitentiaires, ainsi que tous les sympathisants (Élus locaux et nationaux par exemple) qui se retrouvent dans nos valeurs.',
        '0624249022'
    ), (
        'Association des Donneurs de Sang Bénévoles',
        '6',
        'Les buts de l’association : - seconder l’établissement de Transfusion Sanguine en participant activement au développement de la transfusion sanguine en recrutant de nouveaux donneurs, notamment chez les jeunes. - maintenir entre ses membres des liens d’amitié et de fraternité en organisant des manifestations ou sorties familiales.',
        '0236471584'
    ), (
        'Bouchons, ça roule',
        '6',
        'À Saint-Ay, Danielle, bénévole de Bouchons ça roule, s\'occupe des sept collecteurs de la commune.',
        '0681167694'
    ), (
        'Les façonneurs d\'Agylus',
        '7',
        'Notre association a pour but de produire, promouvoir et soutenir l’expression artistique et culturelle sous toutes ses formes.',
        '0663108538'
    ), (
        'Union Economique Agylienne',
        '7',
        'C’est la dynamique de l’ensemble du tissu économique de Saint-Ay regroupé sous forme d’association pour développer, valoriser et mieux faire connaître toutes les activités proposées par les professionnels de notre commune.',
        '0238888518'
    ), (
        'Association de Sophrologie et Disciplines Associées',
        '8',
        'Ensemble de techniques qui vous permet : - d’apprendre à gérer le stress, - de diminuer l’anxiété, - de découvrir ses propres ressources, - de développer la confiance en soi, - de prendre conscience de ses capacités, - de savoir se détendre à tout moment.',
        '0677734457'
    ), (
        'Cercle Gaston Couté de cyclotourisme',
        '8',
        'Pratique du cyclisme et du clyclotourisme ainsi que toutes initiatives propres a la formation phisique et morale de ses members.',
        '0671433103'
    ), (
        'Cercle Saint Agylien Basket',
        '8',
        'Dynamique et énergique, le club de Saint Ay Basket est composé de joueuses en équipe loisir et en équipe 1ère série départementale, féminines. Un peu d’habileté, d’explosivité, d’endurance, un minimum de qualités techniques et mentales sont les bases du basket !',
        '0660781675'
    ), (
        'Club de Badminton',
        '8',
        'Le club de Badminton est ouvert à tous à partir de 16 ans pour les « adultes » et 7 ans pour le créneau jeunes. En compétition et en loisir.',
        '0623232344'
    ), (
        'Ecole de rugby O\'Val des Mauves',
        '8',
        'Une vingtaine de parents et enfants ont répondu à l\'invitation du nouveau club de rugby de l\'ouest Orléanais, « l\'O\'val des Mauves », pour la réunion de présentation du projet.',
        '0682559377'
    ), (
        'Entente Chaingy Saint Ay Football',
        '8',
        'Déjà la rentrée ! Votre enfant ne fait pas encore de sport ? Avez-vous pensé au football ? Dans le cadre de son Ecole de foot labellisée par la FFF, 1 entraînement gratuit pour les nouveaux enfants en début de saison. Donc n’hésitez pas à venir pour essayer sans engagement !',
        '0625622244'
    ), (
        'Gymnastique volontaire Saint-Ay',
        '8',
        'Assouplissement/Renfort musculaire/Stretching/Zumba',
        '0685464210 '
    ), (
        'Marcheurs Agyliens',
        '8',
        'Le Club organise diverses randonnées durant la saison qui débute à partir du mois de septembre jusqu’au mois de juin suivant.',
        '0613413541'
    ), (
        'Physic Form Agylien',
        '8',
        'Musculation, Espace Cardio, Remise en forme',
        '0620798410'
    ), (
        'Saint-Ay Mad Skaters',
        '8',
        'L\'association Saint-Ay Mad Skaters a été fondée vers la fin des années 80 par des jeunes de la commune de Saint-Ay, passionnés de sports de glisse. Le skatepark de Saint-Ay est géré par l\'association qui pense, fabrique et entretient les modules qui composent le skatepark depuis plus de 20 ans, faisant de lui l\'un des plus vieux skateparks français.',
        '0620277671'
    );

INSERT INTO
    `category` (name, image)
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
        'Associations patriotiques',
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