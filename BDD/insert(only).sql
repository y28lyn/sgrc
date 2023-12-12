--
-- Base de données : `sgr_mono`
--
INSERT INTO
    `categorie_plat` (`id_cat`, `nom_cat`, `ordre_affichage_cat`)
VALUES
    (1, 'cuisine', 1),
    (2, 'bar', 3),
    (3, 'sommelier', 2);

INSERT INTO
    `plat` (
        `id_plat`,
        `nom_plat`,
        `description`,
        `type_plat`,
        `PU_carte`,
        `id_sous_cat`,
        `vu`
    )
VALUES
    (
        5,
        'Verrine Méditerranéenne',
        'Mise en bouche',
        'entree',
        0.00,
        1,
        1
    ),
    (
        6,
        'Oeuf mollet frit aux champignons noir',
        'Oeuf mollet frit aux champignons ',
        'entree',
        0.00,
        2,
        1
    ),
    (
        7,
        'blanquette de veau au lait de coco',
        'Pommes Macaire, cèpes et tomates confites',
        'plat',
        0.00,
        3,
        1
    ),
    (
        8,
        'Profiteroles au Gianduja',
        'Profiteroles au Gianduja',
        'dessert',
        0.00,
        4,
        1
    ),
    (
        9,
        'AOC Côtes du Rhône BLANC 75cl',
        'domaine Guigal',
        'boisson',
        18.00,
        9,
        0
    ),
    (
        10,
        'AOC Côtes du Rhône 1/2   BLANC 37.5cl',
        'domaine Guigal',
        'boisson',
        11.50,
        9,
        0
    ),
    (
        11,
        'AOC Chablis 1/2 BLANC 37.5cl',
        'domaine Jean Paul et Benoit  Droin 2018',
        'boisson',
        15.50,
        9,
        0
    ),
    (
        12,
        'AOC Chablis BLANC 75cl',
        'domaine Jean Paul et Benoit  Droin 2019',
        'boisson',
        26.50,
        9,
        0
    ),
    (
        13,
        'AOC Macon villages BLANC 75cl',
        'domaine de Naisse 2020',
        'boisson',
        13.00,
        9,
        0
    ),
    (
        14,
        'AOC Alsace Riesling  BLANC 75cl',
        'domaine  Ostertag',
        'boisson',
        22.00,
        9,
        0
    ),
    (
        15,
        "AOC Coteaux d'AIx en Provence BLANC",
        'Les beates',
        'boisson',
        18.50,
        9,
        0
    ),
    (
        16,
        'IGP Cotes de gascogne Tariquet BLANC 75cl',
        '1eres grives (moelleux) 2017',
        'boisson',
        15.50,
        9,
        0
    ),
    (
        17,
        'cote de provence BLANC 75cl',
        'sainte roseline',
        'boisson',
        20.00,
        9,
        0
    ),
    (
        18,
        'AOC Côtes du Rhône ROUGE 37.5cl',
        'le temps est venu',
        'boisson',
        9.50,
        11,
        0
    ),
    (
        19,
        'AOC Cotes de provence ROSE 75cl',
        'domaine Barbeiranne',
        'boisson',
        15.50,
        10,
        0
    ),
    (
        20,
        'AOC CrÃ©ment de bourgogne 75cl',
        'cave de lugny',
        'boisson',
        19.50,
        13,
        1
    ),
    (
        21,
        'mousseux brut 75cl',
        'champs Elysées',
        'boisson',
        16.50,
        13,
        0
    ),
    (
        22,
        'AOC Macon villages verre',
        'domaine de Naisse',
        'boisson',
        3.50,
        12,
        0
    ),
    (
        23,
        'AOC corbieres 2018 verre',
        'chateau etang des colombes',
        'boisson',
        3.50,
        12,
        0
    ),
    (
        24,
        'Café de PARIS verre',
        'rouge',
        'boisson',
        2.50,
        12,
        0
    ),
    (
        25,
        'Evian 100cl',
        'evian  1l',
        'boisson',
        2.50,
        16,
        0
    ),
    (
        26,
        'badoit 100cl',
        'badoit 1L',
        'boisson',
        2.50,
        16,
        0
    ),
    (
        27,
        'AOC cotes du rhone ROUGE 75cl ',
        'domaine Guigal',
        'boisson',
        17.00,
        11,
        0
    ),
    (
        28,
        'AOC cotes du rhone 1/2 ROUGE 37.5cl',
        'domaine Guigal 2018',
        'boisson',
        11.50,
        11,
        1
    ),
    (30, 'café', 'café', 'boisson', 1.50, 8, 0),
    (
        31,
        'IGP Mediterrannée ROUGE 75cl',
        '2018 collines de laure',
        'boisson',
        19.00,
        11,
        0
    ),
    (
        32,
        'AOC bourgogne ROUGE 75cl',
        'domaine antonin 2018',
        'boisson',
        22.00,
        11,
        1
    ),
    (
        33,
        'AOC coteaux bourguignon ROUGE 75cl',
        'gachot monot',
        'boisson',
        20.50,
        11,
        0
    ),
    (
        34,
        'AOC haut Medoc ROUGE 75cl',
        "l'instant",
        'boisson',
        24.00,
        11,
        0
    ),
    (
        35,
        'AOC Medoc ROUGE 75cl',
        'chateau poitevin 2012',
        'boisson',
        24.50,
        11,
        0
    ),
    (
        36,
        'AOC saumur Champigny ROUGE 75CL',
        'domaine la porte saint jean 2017',
        'boisson',
        24.50,
        11,
        0
    ),
    (37, 'thé', 'thé', 'boisson', 1.50, 8, 0),
    (
        68,
        'AOC Côtes du Rhône 75cl',
        'il fait soif',
        'boisson',
        20.50,
        11,
        0
    ),
    (
        82,
        'mini wrap Saumon Fumé',
        'mini wrap saumon fumé',
        'plat',
        0.00,
        2,
        1
    ),
    (83, 'karaage', '???', 'plat', 0.00, 2, 1),
    (
        84,
        'Ramen',
        'Ramen de viande et Miso',
        'plat',
        0.00,
        3,
        1
    ),
    (
        85,
        'Dando',
        'raviole japonaise sucrée',
        'plat',
        0.00,
        4,
        1
    ),
    (
        86,
        'cocktail sans alcool du jour',
        'cocktail sans alcool du jour',
        'boisson',
        3.50,
        6,
        0
    ),
    (
        87,
        'cocktail avec alcool du jour',
        'cocktail avec alcool du jour',
        'boisson',
        5.00,
        7,
        0
    ),
    (
        88,
        'Croquette de pomme de terre au jambon',
        'Croquette de pomme de terre au jambon',
        'plat',
        0.00,
        1,
        0
    ),
    (
        89,
        'Baguette façon pizza aubergine tomates mozzarella',
        '',
        'plat',
        0.00,
        3,
        0
    ),
    (
        90,
        'Tarte poire noisette pistache façon pain perdu',
        '',
        'plat',
        0.00,
        4,
        0
    ),
    (
        91,
        'Velouté de poisson pickles salicornes algues',
        '',
        'plat',
        0.00,
        2,
        0
    ),
    (92, 'Kir (Pêche)', '', 'boisson', 3.50, 7, 0),
    (93, 'Kir (Cassis)', '', 'boisson', 3.50, 7, 0),
    (
        94,
        'infusion',
        'infusion au choix',
        'boisson',
        1.50,
        8,
        0
    ),
    (
        95,
        'Digestif',
        'digestif divers',
        'boisson',
        4.00,
        17,
        0
    ),
    (
        96,
        'Chocolat chaud',
        'boisson cacaotée chaude',
        'boisson',
        2.00,
        8,
        0
    ),
    (
        97,
        'jus de fruit',
        'jus de fruit au choix',
        'boisson',
        2.50,
        5,
        0
    ),
    (
        98,
        'kir royal hors champagne',
        'kir à base de vin à bulle hors champagne',
        'boisson',
        4.00,
        7,
        0
    ),
    (
        99,
        'kir royal champagne',
        'kir royal au champagne',
        'boisson',
        6.00,
        7,
        0
    ),
    (
        100,
        'WISKY SCOTCH',
        'WISKY SCOTCH',
        'boisson',
        5.00,
        18,
        0
    ),
    (
        101,
        'Apéritif divers',
        'Apéritif divers',
        'boisson',
        3.50,
        18,
        0
    ),
    (
        102,
        'coupe de champagne',
        'coupe de champagne',
        'boisson',
        6.00,
        12,
        0
    ),
    (
        103,
        'Champagne ROSE 75cl',
        'Champagne ROSE',
        'boisson',
        30.00,
        13,
        0
    ),
    (
        104,
        'coupe Champagne ROSE',
        'coupe de champagne rosé',
        'boisson',
        7.00,
        12,
        0
    ),
    (
        105,
        'Champagne 75cl',
        'champagne standard',
        'boisson',
        24.00,
        13,
        0
    );

INSERT INTO
    `sgr_table` (
        `id_table`,
        `numero_table`,
        `type_table`,
        `id_serveur`,
        `vu`
    )
VALUES
    (1, 1, 'Carrée', NULL, 0),
    (2, 2, 'Carrée', NULL, 0),
    (3, 3, 'Carrée', NULL, 0),
    (4, 4, 'Carrée', NULL, 0),
    (5, 5, 'Carrée', NULL, 0),
    (6, 6, 'Carrée', NULL, 0),
    (7, 7, 'Carrée', NULL, 0),
    (8, 8, 'Carrée', NULL, 0),
    (9, 9, 'Carrée', NULL, 0),
    (10, 10, 'Carrée', NULL, 0);

INSERT INTO
    `sous_categorie` (
        `id_sous_cat`,
        `id_cat`,
        `nom_sous_cat`,
        `ordre_aff_sous_cat`,
        `couleur`
    )
VALUES
    (1, 1, 'mise en bouche', 1, '#000000'),
    (2, 1, 'entrée', 2, '#000000'),
    (3, 1, 'plat principal', 3, '#000000'),
    (4, 1, 'dessert', 4, '#000000'),
    (5, 2, 'soft', 4, '#000000'),
    (6, 2, 'cocktail sans alcool', 2, '#000000'),
    (7, 2, 'cocktail avec alcool', 3, '#000000'),
    (8, 2, 'boisson chaude', 6, '#000000'),
    (9, 3, 'vin blanc', 3, '#000000'),
    (10, 3, 'vin rosé', 2, '#000000'),
    (11, 3, 'vin rouge', 1, '#000000'),
    (12, 3, 'vin au verre', 4, '#000000'),
    (13, 3, 'vin à bulles', 5, '#000000'),
    (16, 2, 'eaux minerales', 5, '#247BA0'),
    (17, 2, 'Digestif', 7, '#B47EB3'),
    (18, 2, 'Apéritif', 1, '#FFE066');

INSERT INTO
    `user` (`id_user`, `login`, `role`, `mdp`, `image`)
VALUES
    (
        1,
        'admin',
        'admin',
        '$2y$10$U1la.CrMEVNq9gpWg2.bX.5ysh6lOrRjLSINSTpAHVeGz8TBkIxCy',
        'profil-1.jpg'
    ),
    (
        2,
        'service',
        'service',
        '$2y$10$V9tCXmdvvknXmXio/7dY2uL201Q1gBP6H/sLZil3XeRvMvjYRHuSi',
        'profil-2.jpg'
    ),
    (
        3,
        'cuisine',
        'cuisine',
        '$2y$10$gPvZ6Z6OPZoGK/LeCz8mTudPOkAAstZ6PoXN0A9rm.pLr/9mBeNwy',
        'profil-3.jpg'
    ),
    (
        4,
        'bar',
        'bar',
        '$2y$10$jVKHuMHlSjY/zNEh7Fl5xecJU8uNWIKpevvgqi28HFZ5wEZoAp4Pm',
        'profil-4.jpg'
    ),
    (
        5,
        'caisse',
        'caisse',
        '$2y$10$ke0VnU6GZyOeHvd9wLlxhe9hgz8Mg1/q7RzMPWCiknyLUoU1WCGRK',
        'profil-5.jpg'
    );