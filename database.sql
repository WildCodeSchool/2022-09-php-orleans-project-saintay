

CREATE TABLE
    municipalityTeam (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        firstname VARCHAR(80) NOT NULL,
        lastname VARCHAR(80) NOT NULL,
        role TEXT NOT NULL,
        image TEXT,
        communal BOOLEAN NOT NULL
    );

INSERT INTO
    municipalityTeam (
        firstname,
        lastname,
        role,
        communal
    )
VALUES (
        'Frédéric',
        'CUILLERIER',
        'Compétence générale - Police - Sécurité - Etat Civil',
        false
    ), (
        'Marie-Françoise ',
        'QUERE',
        'Adjointe aux bâtiments et au développement durable - biodiversité',
        false
    ), (
        'Pascal ',
        'FOULON',
        'Adjoint aux affaires scolaires, culture, communication et gestion des salles',
        false
    ), (
        'Dominique',
        'RENAULT',
        'Adjoint aux travaux, voirie et traitement des eaux.',
        false
    ), (
        'Cecile',
        'TULIPE',
        'Accueil, état civil, listes electorales, cimetiere. ',
        true
    ), (
        'Isabelle',
        'PANEL',
        'Urbanisme.',
        true
    ), (
        'Anais',
        'MAIS',
        'Comptabilite.',
        true
    ), (
        'Melanie',
        'PALVINE',
        'Vie associative et Reservation de salles .',
        true
    ), (
        'Justine',
        'BLANDINE',
        'Vie associative et Reservation de salles .',
        true
    ), (
        'Justine',
        'POURADIER',
        'Assistante du Maire et Direction Generale/Culture et Communication .',
        true
    ), (
        'Meline',
        'MALIGNE',
        'Assistante Ressources Humaines.',
        true
    ), (
        'Aurelie',
        'JOLIE',
        'Directrice Generale des Services .',
        true
    ), (
        'Adeline',
        'LINE',
        'Directrice Générale Adjointe.',
        true
    ), (
        'Hanane',
        'PIONNER',
        'Directrice des Ressources Humaines, Agence postale communale.',
        true
    ), (
        'David',
        'DOUILLER',
        'Directeur des Services Techniques.',
        true
    ), (
        'Zakya',
        'MANDAYA',
        'Charge des projets.',
        true
    ), (
        'Adeline',
        'JUVANILE',
        'CCAS.',
        true
    ), (
        'Thierry',
        'MICHON',
        'Police municipale.',
        true
    ), (
        'Karine',
        'FARINE',
        'Police municipale.',
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
        20221120,
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
        "Un stage de tennis pour les jeunes",
        20221101,
        "https://img.lamontagne.fr/eGTKYbX5144praL4wVelBV5XBrQfIp-pLhaYX1U3zrc/fit/657/438/sm/0/bG9jYWw6Ly8vMDAvMDAvMDYvMzIvNDYvMjAwMDAwNjMyNDY3NA.jpg",
        "Saint-Ay. Le club de tennis a organisé un stage pour les jeunes. Le club de tennis de Saint-Ay a organisé un stage pour les jeunes durant les vacances de la Toussaint. Huit enfants y ont participé, encadrés par Guillaume, l’un des deux enseignants de l’école de tennis. Grâce à la météo clémente, ils ont profité des courts extérieurs.",
        "https://www.larep.fr/widgetRss/saint-ay-45130/loisirs/un-stage-de-tennis-pour-les-jeunes_14210053/"
    );
INSERT INTO actuality
VALUES (
        4,
        "Une pharmacie toute neuve",
        20221118,
        "https://img.lamontagne.fr/8Coj9-lGJVjnO5iycZnTelM6YQAzJn9OQTpl8CsCzxo/fit/657/438/sm/0/bG9jYWw6Ly8vMDAvMDAvMDYvMzMvNzYvMjAwMDAwNjMzNzY2NA.jpg",
        "Quelques semaines après l’ouverture, les nouveaux locaux de la pharmacie étaient inaugurés mercredi, en présence d’élus municipaux, de professionnels de santé et de partenaires.",
        "https://www.larep.fr/widgetRss/saint-ay-45130/actualites/une-pharmacie-toute-neuve_14218356/"
    );
INSERT INTO actuality
VALUES (
        5,
        "Robert Placidet, un héros anonyme salué !",
        20221115,
        "https://img.lamontagne.fr/pDphg3BxKYVOX6HQiH-rzPtZcsbZocF7UdvQWIKTAKA/fit/657/438/sm/0/bG9jYWw6Ly8vMDAvMDAvMDYvMzMvOTAvMjAwMDAwNjMzOTA1Ng.jpg",
        "Chaque année, lors de la commémoration du 11 novembre sont rappelés les noms des 52 soldats de Saint-Ay tombés au front. L’occasion de mettre en lumière ces héros anonymes, comme Robert Placidet, né à Saint-Ay le 26 septembre 1904. Retour sur son histoire.",
        "https://www.larep.fr/widgetRss/saint-ay-45130/actualites/robert-placidet-un-heros-anonyme-salue_14219227/"
    );
INSERT INTO actuality
VALUES (
        6,
        "Les Journées artistiques sont lancées",
        2022111,
        "https://img.lamontagne.fr/k8xgjzC8qpKXG8FVX03kU3JY8Dxj6H8xssS62KTFCoo/fit/657/438/sm/0/bG9jYWw6Ly8vMDAvMDAvMDYvMzMvMTkvMjAwMDAwNjMzMTk3OA.jpg",
        "Les 27e journées artistiques agyliennes se dérouleront du 11 au 19 novembre. Peinture, théâtre, cinéma et musique sont au programme.",
        "https://www.larep.fr/widgetRss/saint-ay-45130/actualites/les-journees-artistiques-sont-lancees_14214888/"
    );

CREATE TABLE report_category (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `image` TEXT NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE report (
`id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
`title` varchar(255) NOT NULL,
`date` DATE NOT NULL,
`description` TEXT NOT NULL,
`link` TEXT NULL,
`category_id` INT NOT NULL,
CONSTRAINT `fk_report_report_category`
FOREIGN KEY (`category_id`) 
REFERENCES `report_category`(`id`)
);



INSERT INTO report_category
VALUES (
        1,
        "Les réunions du conseil",
        "/assets/images/reunion-conseil.png"
    );

INSERT INTO report_category
VALUES (
        2,
        "Les bulletins municipaux",
        "/assets/images/logo-conseil-municipal.png"
    );

INSERT INTO report_category
VALUES (
        3,
        "Les arrêtés municipaux",
        "/assets/images/arrete-municipal.jpg"
    );

INSERT INTO report
VALUES (
        1,
        "Réunion du 19 Septembre 2022",
        20220919,
        "Voir l'ordre du jour en cliquant ci-dessus.",
        "http://www.ville-saint-ay.fr/docs/annonces/20220919_cm.pdf",
        1
    );

INSERT INTO report
VALUES (2, "Réunion du 11 Avril 2022", 20220411, "Urbanisme, Vente des parcelles cadastrées. Ressources Humaines. Finances - Budgets, Subventions. Approbations des comptes. Vie associative. Voir le PV ci-dessous.", "http://www.ville-saint-ay.fr/docs/CR_20220411.pdf", 2);

INSERT INTO report
VALUES (
    3,
    "Réunion du 7 Mars 2022",
    20220207,
    "Finances - Mise en oeuvre du Débat d’Orientation Budgétaire 2022; Ligne de trésorerie 2022 - Choix de l’organisme prêteur. Centre de gestion - Adhésion à la prestation paie du Centre départemental de gestion du Loiret; Adhésion à la mission chômage du Centre départemental de gestion du Loiret; Service d’aide à l’emploi du Centre départemental de gestion du Loiret.",
    "http://www.ville-saint-ay.fr/docs/CR_20220207.pdf",
    1
);

INSERT INTO report
VALUES (
    4,
    "Arrêté municipal réglementant les activités bruyantes",
    20070330,
    "Cet arrêté annule et remplace celui du 12 juin 2001",
    "http://www.ville-saint-ay.fr/docs/AR_20070330.pdf",
    3
);

INSERT INTO report
VALUES (
    5,
    "Bulletin Municipal - 8 Mars 2022",
    20220308,
    "Lettre aux Agyliens",
    "http://www.ville-saint-ay.fr/docs/BM_20220308.pdf",
    2
);

INSERT INTO report
VALUES (
    6,
    "Bulletin Municipal - 30 Décembre 2021",
    20211230,
    "Album photos 2021 et Voeux 2022",
    "http://www.ville-saint-ay.fr/docs/BM_20211230.pdf",
    2
);

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
        '$2y$10$i48/UEH3zLEZcRwxeN7ND.qY1XH8e90OB.lC96gsBFEZFQ15rkzXO'
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


CREATE TABLE

    schedule (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        day VARCHAR(80) NOT NULL,
        hour VARCHAR(255) NOT NULL
        
    );

    INSERT INTO
    `schedule` (day, hour)
VALUES (
        'Le lundi de',
        "15 à 19 heures (17 heures en août)"
    ), (
        'Le mardi de ',
        "9 à 12 et de 15 à 17 heures"
    ), (
        'Le mercredi de',
        "15 à 17 heures"
    ), (
        'Le jeudi de',
        "9 à 12 heures"
    ), (
        'Le vendredi de',
        "9 à 12 et de 15 à 17 heures"
    ), (
        'Le samedi de ',
        "9 à 12 heures les semaines paires uniquement"
    ), (
        'fermé',
        "tous les samedis en août"
    );

    CREATE TABLE
    contactInformation (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        title VARCHAR(80) NOT NULL,
        info VARCHAR(255) NOT NULL
        
    );

    INSERT INTO
    `contactInformation` (title, info)
VALUES (
        'Adresse:',
        "Place de la Mairie - 45130 Saint-Ay"
    ), (
        'Tél: 02 38 88 44 44',
        "Fax: 02 38 88 82 14"
    ), (
        'Site web:',
        "accueil@ville-saint-ay.fr"
    );
        
    
    CREATE TABLE 
    wordMayor (
        id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
        title TEXT NOT NULL,
        description TEXT NOT NULL,
        image TEXT NULL,
        signature TEXT NOT NULL
    );

INSERT INTO
    wordMayor (title, description, signature)
VALUES (
        'De la force de la douceur, de la douceur de la force.',
        'La situation stratégique de SAINT-AY sur une voie de communication importante, à proximité immédiate mais dans l indépendance d une grande agglomération, génère le caractère attractif de SAINT-AY.
Le dynamisme de ses habitants à travers la vie associative, scolaire et économique, constitue sa principale richesse.
Ses bords de Loire et de Mauve et ses terres champêtres dégagent une impression de douceur et de bien-être.

Depuis plusieurs décennies, la Municipalité conjugue avec détermination ces atouts agyliens, en fondant son action sur trois principes directeurs :
    Développer et moderniser les équipements et les infrastructures,
    Favoriser le plein épanouissement de la vie associative, scolaire et économique,
    Protéger et mettre en valeur le patrimoine naturel et architectural. 

Ainsi, d agréable village de vignerons du début du XXème siècle, SAINT - AY est devenu, en ce début du XXIème siècle, une petite ville attractive dont le dynamisme n a d égal que la douceur de vivre.',
        ' Fréderic CUILLERIER
        Maire de Saint-AY 
        Président du Pays Loire-Beauce '
    );

