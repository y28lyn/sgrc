-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 nov. 2023 à 11:17
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sgr_mono_1_2` coucou
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_plat`
--

CREATE TABLE `categorie_plat` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(30) NOT NULL,
  `ordre_affichage_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie_plat`
--

INSERT INTO `categorie_plat` (`id_cat`, `nom_cat`, `ordre_affichage_cat`) VALUES
(1, 'cuisine', 1),
(2, 'bar', 2),
(3, 'sommelier', 3);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_ticket`
--

CREATE TABLE `ligne_ticket` (
  `id_ligne_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_plat` int(11) NOT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `Etat` enum('Demandé','En cours','Prêt','Servi') DEFAULT 'Demandé'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ligne_ticket`
--

INSERT INTO `ligne_ticket` (`id_ligne_ticket`, `id_ticket`, `id_plat`, `commentaire`, `Etat`) VALUES
(412, 23, 69, NULL, 'Demandé'),
(413, 23, 69, NULL, 'Demandé'),
(414, 23, 69, NULL, 'Demandé'),
(415, 23, 25, NULL, 'Demandé'),
(416, 23, 25, NULL, 'Demandé'),
(417, 23, 27, NULL, 'Demandé'),
(418, 23, 27, NULL, 'Demandé');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nom_menu` varchar(50) NOT NULL DEFAULT 'nom du menu',
  `PU` float NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `date_menu` date DEFAULT NULL,
  `vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `nom_menu`, `PU`, `description`, `date_menu`, `vu`) VALUES
(53, 'Menu', 98726, 'fgeggggg', '2023-11-07', 0);

-- --------------------------------------------------------

--
-- Structure de la table `menu_contient_plat`
--

CREATE TABLE `menu_contient_plat` (
  `id_menu` int(11) NOT NULL,
  `id_plat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu_contient_plat`
--

INSERT INTO `menu_contient_plat` (`id_menu`, `id_plat`) VALUES
(53, 9),
(53, 10),
(53, 11),
(53, 12),
(53, 13),
(53, 14),
(53, 15),
(53, 16),
(53, 17),
(53, 18),
(53, 19),
(53, 20),
(53, 21),
(53, 22),
(53, 23),
(53, 24),
(53, 25),
(53, 26),
(53, 27),
(53, 28),
(53, 30),
(53, 31),
(53, 32),
(53, 33),
(53, 34),
(53, 35),
(53, 36),
(53, 37),
(53, 68),
(53, 69);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id_plat` int(11) NOT NULL,
  `nom_plat` varchar(50) NOT NULL DEFAULT 'nom du plat',
  `description` text NOT NULL,
  `type_plat` varchar(10) NOT NULL DEFAULT 'entplades',
  `PU_carte` float(11,2) NOT NULL DEFAULT 0.00,
  `id_sous_cat` int(11) DEFAULT 1,
  `vu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `nom_plat`, `description`, `type_plat`, `PU_carte`, `id_sous_cat`, `vu`) VALUES
(5, 'Verrine Méditerranéenne', 'Mise en bouche', 'entree', 0.00, 1, 0),
(6, 'Oeuf mollet frit aux champignons noir', 'Oeuf mollet frit aux champignons ', 'entree', 0.00, 2, 0),
(7, 'blanquette de veau au lait de coco', 'Pommes Macaire, cèpes et tomates confites', 'plat', 0.00, 3, 0),
(8, 'Profiteroles au Gianduja', 'Profiteroles au Gianduja', 'dessert', 0.00, 4, 0),
(9, 'AOC Côtes du Rhône BLANC 75cl', 'domaine Guigal 2017', 'boisson', 18.00, 9, 0),
(10, 'AOC Côtes du Rhône 1/2   BLANC 37.5cl', 'domaine Guigal 2018', 'boisson', 12.50, 9, 0),
(11, 'AOC Chablis 1/2 BLANC 37.5cl', 'domaine Jean Paul et Benoit  Droin 2018', 'boisson', 17.50, 9, 0),
(12, 'AOC Chablis BLANC 75cl', 'domaine Jean Paul et Benoit  Droin 2019', 'boisson', 27.00, 9, 0),
(13, 'AOC Macon villages BLANC 75cl', 'domaine de Naisse 2020', 'boisson', 13.00, 9, 0),
(14, 'AOC Alsace Riesling  BLANC 75cl', 'domaine  Ostertag', 'boisson', 27.00, 9, 0),
(15, 'AOC coteaux d&#039;AIx en Provence BLANC 75cl', 'Les beatles 2019', 'boisson', 20.00, 9, 0),
(16, 'IGP cotes de gascogne Tariquet BLANC 75cl', '1eres grives (moelleux) 2017', 'boisson', 17.50, 9, 0),
(17, 'le petit scarabée BLANC 75cl', 'vin de france', 'boisson', 12.00, 9, 0),
(18, 'AOC Côtes du Rhône ROSE 75cl', 'Domaine Ogier - le temps est venu 2021', 'boisson', 17.50, 10, 0),
(19, 'AOC cotes de provence ROSE 75cl', 'grande reserve la rouillère 2021', 'boisson', 20.00, 10, 0),
(20, 'AOC Crément de bourgogne 75cl', 'cave de lugny', 'boisson', 19.50, 13, 0),
(21, 'mousseux brut 75cl', 'champs Elysées', 'boisson', 13.00, 13, 0),
(22, 'AOC Macon villages verre', 'domaine de Naisse', 'boisson', 3.50, 12, 0),
(23, 'AOC corbieres 2018 verre', 'chateau etang des colombes', 'boisson', 3.50, 12, 0),
(24, 'AOC bordeaux 2020 verre', 'baron de l\'herme', 'boisson', 3.50, 12, 0),
(25, 'Evian 100cl', 'evian  1l', 'boisson', 2.50, 5, 0),
(26, 'badoit 100cl', 'badoit 1L', 'boisson', 2.50, 5, 0),
(27, 'AOC cotes du rhone ROUGE 75cl ', 'domaine Guigal 2017', 'boisson', 18.00, 11, 0),
(28, 'AOC cotes du rhone 1/2 ROUGE 37.5cl', 'domaine Guigal 2018', 'boisson', 12.50, 11, 0),
(30, 'café', 'café', 'boisson', 0.00, 8, 0),
(31, 'IGP Mediterrannée ROUGE 75cl', '2018 collines de laure', 'boisson', 20.00, 11, 0),
(32, 'AOC bourgogne ROUGE 75cl', 'domaine antonin 2018', 'boisson', 22.00, 11, 0),
(33, 'AOC coteaux bourguignon ROUGE 75cl', 'gachot monot 2018', 'boisson', 20.50, 11, 0),
(34, 'AOC haut Medoc ROUGE 75cl', 'l&#039;instant T 2018', 'boisson', 24.00, 11, 0),
(35, 'AOC Medoc ROUGE 75cl', 'chateau poitevin 2012', 'boisson', 24.50, 11, 0),
(36, 'AOC saumur Champigny ROUGE 75CL', 'domaine la porte saint jean 2017', 'boisson', 24.50, 11, 0),
(37, 'thé', 'thé', 'boisson', 0.00, 8, 0),
(68, 'AOC côtes du Rhône 75cl', 'Domaine Ogier &quot;le temps est venu&quot; 2021', 'boisson', 17.50, 11, 0),
(69, 'Nuggets & Frites', 'Testdesc', 'plat', 5.00, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sgr_table`
--

CREATE TABLE `sgr_table` (
  `id_table` int(11) NOT NULL,
  `numero_table` int(11) NOT NULL,
  `type_table` varchar(3) NOT NULL,
  `id_serveur` int(11) DEFAULT NULL,
  `vu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sgr_table`
--

INSERT INTO `sgr_table` (`id_table`, `numero_table`, `type_table`, `id_serveur`, `vu`) VALUES
(1, 1, 'CAR', NULL, 0),
(2, 2, 'CAR', NULL, 0),
(3, 3, 'CAR', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `id_sous_cat` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nom_sous_cat` varchar(30) NOT NULL,
  `ordre_aff_sous_cat` int(11) NOT NULL,
  `couleur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id_sous_cat`, `id_cat`, `nom_sous_cat`, `ordre_aff_sous_cat`, `couleur`) VALUES
(1, 1, 'mise en bouche', 1, ''),
(2, 1, 'entrée', 2, ''),
(3, 1, 'plat principal', 3, ''),
(4, 1, 'dessert', 4, ''),
(5, 2, 'soft', 1, ''),
(6, 2, 'cocktail sans alcool', 2, ''),
(7, 2, 'cocktail avec alcool', 3, ''),
(8, 2, 'boisson chaude', 4, ''),
(9, 3, 'vin blanc', 3, ''),
(10, 3, 'vin rosé', 2, ''),
(11, 3, 'vin rouge', 1, ''),
(12, 3, 'vin au verre', 4, ''),
(13, 3, 'vin à bulles', 5, '');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `id_table` int(11) NOT NULL,
  `nb_couvert` int(11) NOT NULL,
  `statut` varchar(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `ordre` int(11) NOT NULL,
  `date_c` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `id_table`, `nb_couvert`, `statut`, `commentaire`, `ordre`, `date_c`) VALUES
(23, 1, 2, 'SAI', '', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `role`, `mdp`, `image`) VALUES
(2, 'service', 'service', '$2y$10$V9tCXmdvvknXmXio/7dY2uL201Q1gBP6H/sLZil3XeRvMvjYRHuSi', '1662896572service.jpg'),
(3, 'cuisine', 'cuisine', '$2y$10$gPvZ6Z6OPZoGK/LeCz8mTudPOkAAstZ6PoXN0A9rm.pLr/9mBeNwy', '1662896587cuisine.jpg'),
(4, 'admin', 'admin', '$2y$10$U1la.CrMEVNq9gpWg2.bX.5ysh6lOrRjLSINSTpAHVeGz8TBkIxCy', '1662896600admin.jpg'),
(5, 'bar', 'bar', '$2y$10$jVKHuMHlSjY/zNEh7Fl5xecJU8uNWIKpevvgqi28HFZ5wEZoAp4Pm', '1662896616bar.jpg'),
(9, 'caisse', 'caisse', '$2y$10$ke0VnU6GZyOeHvd9wLlxhe9hgz8Mg1/q7RzMPWCiknyLUoU1WCGRK', '1668412125Capture d’écran (17).png'),
(10, 's20', 'service', '$2y$10$PTvHL2PdOFpDckH9onrkie7Gn0y1sHCfNMvJcnvXQhONO6OzW/Zrm', '1669737931main arc .jpg'),
(11, 's30', 'service', '$2y$10$hCKySw2DZNVhclzxSKZK0u0oq/bHBmydcjp85.u9YRHKVliesZCXC', '1670230352coude.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie_plat`
--
ALTER TABLE `categorie_plat`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `ligne_ticket`
--
ALTER TABLE `ligne_ticket`
  ADD PRIMARY KEY (`id_ligne_ticket`),
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `id_plat` (`id_plat`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Index pour la table `menu_contient_plat`
--
ALTER TABLE `menu_contient_plat`
  ADD PRIMARY KEY (`id_menu`,`id_plat`),
  ADD KEY `id_plat` (`id_plat`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id_plat`),
  ADD KEY `fk_plat_souscat` (`id_sous_cat`);

--
-- Index pour la table `sgr_table`
--
ALTER TABLE `sgr_table`
  ADD PRIMARY KEY (`id_table`),
  ADD KEY `sgr_table_ibfk_1` (`id_serveur`);

--
-- Index pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD PRIMARY KEY (`id_sous_cat`),
  ADD KEY `fk_souscat_cat` (`id_cat`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `ticket_ibfk_1` (`id_table`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie_plat`
--
ALTER TABLE `categorie_plat`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ligne_ticket`
--
ALTER TABLE `ligne_ticket`
  MODIFY `id_ligne_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `sgr_table`
--
ALTER TABLE `sgr_table`
  MODIFY `id_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  MODIFY `id_sous_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ligne_ticket`
--
ALTER TABLE `ligne_ticket`
  ADD CONSTRAINT `ligne_ticket_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ligne_ticket_ibfk_2` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `menu_contient_plat`
--
ALTER TABLE `menu_contient_plat`
  ADD CONSTRAINT `menu_contient_plat_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `menu_contient_plat_ibfk_2` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `fk_plat_souscat` FOREIGN KEY (`id_sous_cat`) REFERENCES `sous_categorie` (`id_sous_cat`);

--
-- Contraintes pour la table `sgr_table`
--
ALTER TABLE `sgr_table`
  ADD CONSTRAINT `sgr_table_ibfk_1` FOREIGN KEY (`id_serveur`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `fk_souscat_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorie_plat` (`id_cat`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_table`) REFERENCES `sgr_table` (`id_table`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
