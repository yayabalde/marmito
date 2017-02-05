-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 07 Octobre 2016 à 01:04
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `marmito`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
`com_id` int(10) unsigned NOT NULL COMMENT 'identifient de la commande',
  `com_date` datetime NOT NULL COMMENT 'stock la date et heure de commande',
  `com_etat` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT 'permet d''annuler une commande(3=commande livrée)',
  `fk_uti_id` int(10) unsigned NOT NULL COMMENT 'stock identifient de lutilisateur de la commande'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Stocke les commandes des clients';

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`com_id`, `com_date`, `com_etat`, `fk_uti_id`) VALUES
(1, '2016-09-28 10:38:19', '1', 1),
(2, '2016-04-28 10:38:19', '0', 1),
(3, '2016-05-28 08:50:19', '1', 1),
(4, '2016-08-12 11:08:06', '2', 2),
(5, '2016-09-20 10:38:19', '0', 3),
(6, '0000-00-00 00:00:00', '2', 3),
(7, '0000-00-00 00:00:00', '1', 3),
(8, '2016-10-06 00:00:00', '1', 3);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`con_id` int(10) unsigned NOT NULL COMMENT 'identifient de message',
  `con_date` datetime NOT NULL COMMENT 'stock la date et heure du message',
  `con_genre` enum('h','f') NOT NULL COMMENT 'stock le genre de l''utilisateur',
  `con_nom` varchar(32) NOT NULL COMMENT 'stock le nom de l''auteur du message',
  `con_email` varchar(32) NOT NULL COMMENT 'stock le email de l''auteur',
  `con_sujet` varchar(32) NOT NULL COMMENT 'stock le sujet du message',
  `con_message` varchar(255) NOT NULL COMMENT 'stock le sujet du message'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Stocke les commandes des clients';

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`con_id`, `con_date`, `con_genre`, `con_nom`, `con_email`, `con_sujet`, `con_message`) VALUES
(1, '2016-10-04 15:08:09', '', 'bolet balde', 'contact@yayabalde.com', 'fgfgddggd', 'gfggdgdgd'),
(2, '2016-10-04 15:08:09', '', 'bolet balde', 'contact@yayabalde.com', 'fgfgddggd', 'gfggdgdgd'),
(3, '2016-10-05 08:37:24', '', 'edeerer', 'yayabalde1@gmail.com', 'django', 'ezrerrezrer'),
(4, '2016-10-05 08:37:24', '', 'edeerer', 'yayabalde1@gmail.com', 'django', 'ezrerrezrer'),
(5, '2016-10-05 08:47:12', '', 'rezrezrze', 'yayabalde1@gmail.com', 'retrrt', 'trrrteretrte'),
(6, '2016-10-05 08:47:12', '', 'rezrezrze', 'yayabalde1@gmail.com', 'retrrt', 'trrrteretrte'),
(7, '2016-10-05 09:07:39', '', 'azee', 'yayabalde1@gmail.com', 'django', 'eeea'),
(8, '2016-10-05 09:07:39', '', 'azee', 'yayabalde1@gmail.com', 'django', 'eeea');

-- --------------------------------------------------------

--
-- Structure de la table `detailcommande`
--

CREATE TABLE IF NOT EXISTS `detailcommande` (
`detc_id` int(10) unsigned NOT NULL COMMENT 'identifient de detaile sur une commande',
  `fk_pla_id` int(10) unsigned NOT NULL COMMENT 'stock l''identifient du plat lié à une commande',
  `fk_com_id` int(10) unsigned NOT NULL COMMENT 'stock l''identifient de la commande',
  `detc_qte` int(10) unsigned NOT NULL COMMENT 'stock la quantité de plats sur une commande',
  `detc_date_rdv` date NOT NULL COMMENT 'stock le date du jour du rdv de la cuisine'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Stock les details d''une commande';

--
-- Contenu de la table `detailcommande`
--

INSERT INTO `detailcommande` (`detc_id`, `fk_pla_id`, `fk_com_id`, `detc_qte`, `detc_date_rdv`) VALUES
(1, 1, 1, 2, '0000-00-00'),
(2, 2, 1, 3, '0000-00-00'),
(3, 1, 2, 1, '0000-00-00'),
(4, 2, 2, 5, '0000-00-00'),
(5, 3, 2, 1, '0000-00-00'),
(6, 4, 2, 2, '0000-00-00'),
(7, 4, 3, 2, '0000-00-00'),
(8, 2, 3, 3, '0000-00-00'),
(9, 3, 4, 1, '0000-00-00'),
(10, 2, 4, 1, '0000-00-00'),
(11, 5, 4, 2, '0000-00-00'),
(12, 2, 5, 1, '0000-00-00'),
(13, 5, 5, 1, '0000-00-00'),
(14, 4, 6, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `detailplat`
--

CREATE TABLE IF NOT EXISTS `detailplat` (
`detp_id` int(10) unsigned NOT NULL COMMENT 'identifient de detaile d''un plat',
  `fk_ing_id` int(10) unsigned NOT NULL COMMENT 'identifiant de l''ingredient dans le plat',
  `fk_pla_id` int(10) unsigned NOT NULL COMMENT 'identifiant du plat de l''ingédiant',
  `detp_ing_dose` varchar(32) NOT NULL COMMENT 'quantité de l''ingrédiant dans un plat',
  `detc_date_rdv` date NOT NULL COMMENT 'stock le date du jour du rdv de la cuisine'
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COMMENT='Stok les details sur un plat';

--
-- Contenu de la table `detailplat`
--

INSERT INTO `detailplat` (`detp_id`, `fk_ing_id`, `fk_pla_id`, `detp_ing_dose`, `detc_date_rdv`) VALUES
(1, 1, 1, '1', '0000-00-00'),
(2, 2, 1, '4', '0000-00-00'),
(3, 3, 1, '400g', '0000-00-00'),
(4, 4, 1, '1', '0000-00-00'),
(5, 5, 1, '4', '0000-00-00'),
(6, 6, 1, 'quelques feuilles', '0000-00-00'),
(7, 7, 1, '10g', '0000-00-00'),
(8, 8, 1, '5g', '0000-00-00'),
(9, 9, 1, '10g', '0000-00-00'),
(10, 10, 1, '8g', '0000-00-00'),
(11, 11, 1, '1/2', '0000-00-00'),
(12, 12, 1, '1 cuilère à café', '0000-00-00'),
(13, 13, 1, '5g', '0000-00-00'),
(14, 14, 1, '10g', '0000-00-00'),
(15, 19, 1, '15 cl', '0000-00-00'),
(16, 15, 2, '200g', '0000-00-00'),
(17, 16, 2, '1/2 sachet', '0000-00-00'),
(18, 17, 2, '2', '0000-00-00'),
(19, 18, 2, '50g', '0000-00-00'),
(20, 20, 2, '2 tranches', '0000-00-00'),
(21, 21, 2, '12', '0000-00-00'),
(22, 13, 2, '5g', '0000-00-00'),
(23, 22, 2, '200g', '0000-00-00'),
(24, 23, 2, '1 cuil. à soupe', '0000-00-00'),
(25, 24, 2, '1 cuil. à soupe', '0000-00-00'),
(26, 17, 3, '12', '0000-00-00'),
(27, 25, 3, '150g', '0000-00-00'),
(28, 26, 3, '3 tranches', '0000-00-00'),
(29, 27, 3, '25cl', '0000-00-00'),
(30, 18, 3, '20g', '0000-00-00'),
(31, 13, 3, '5g', '0000-00-00'),
(32, 14, 3, '5g', '0000-00-00'),
(33, 28, 4, '300g', '0000-00-00'),
(34, 29, 4, '2 tranches', '0000-00-00'),
(35, 30, 4, '40g', '0000-00-00'),
(36, 31, 4, '40g', '0000-00-00'),
(37, 17, 4, '3', '0000-00-00'),
(38, 18, 4, '30g', '0000-00-00'),
(39, 32, 4, '250g', '0000-00-00'),
(40, 13, 4, '5g', '0000-00-00'),
(41, 14, 4, '10g', '0000-00-00'),
(42, 33, 4, '100g', '0000-00-00'),
(43, 28, 5, '1 rouleau', '0000-00-00'),
(44, 34, 5, '1 botte', '0000-00-00'),
(45, 17, 5, '3', '0000-00-00'),
(46, 32, 5, '20cl', '0000-00-00'),
(47, 19, 5, '10cl', '0000-00-00'),
(48, 25, 5, '100g', '0000-00-00'),
(49, 35, 5, '3', '0000-00-00'),
(50, 13, 5, '5g', '0000-00-00'),
(51, 14, 5, '8g', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
`ing_id` int(10) unsigned NOT NULL COMMENT 'identifient de l''ingrédient',
  `ing_descr` varchar(255) NOT NULL COMMENT 'description d''un ingrédiant',
  `ing_est_dispo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'verifie si un ingrédiant est disponible'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='Stock les ingrédients disponibles';

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`ing_id`, `ing_descr`, `ing_est_dispo`) VALUES
(1, 'barquette de St Môret de 150g', 1),
(2, 'bagels au sésame', 1),
(3, 'bar cru', 1),
(4, 'concombre épluché', 1),
(5, 'tomates moyennes', 1),
(6, 'feuilles de salades de couleurs', 1),
(7, 'cerfeuil', 1),
(8, 'ciboulette', 1),
(9, 'graines de moutarde', 1),
(10, 'graines de coriandre', 1),
(11, 'jus de citron', 1),
(12, 'huile d’olive', 1),
(13, 'sel', 1),
(14, 'poivre', 1),
(15, 'farine', 1),
(16, 'sachet de levure', 1),
(17, 'œufs', 1),
(18, 'beurre', 1),
(19, 'lait', 1),
(20, 'viande des Grisons très fines', 1),
(21, 'rosettes de Tête de Moine AOP', 1),
(22, 'sucre glace', 1),
(23, 'blanc d’œuf', 1),
(24, 'jus de betterave', 1),
(25, 'gruyère râpé', 1),
(26, 'jambon blanc', 1),
(27, 'crème liquide', 1),
(28, 'pâte brisée', 1),
(29, 'jambon cru', 1),
(30, 'fromage de cantal', 1),
(31, 'fourme d''ambert', 1),
(32, 'crème fraîche', 1),
(33, 'muscade râpée', 1),
(34, 'asperges vertes', 1),
(35, 'oignons nouveaux', 1);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE IF NOT EXISTS `plat` (
`pla_id` int(10) unsigned NOT NULL COMMENT 'stock l''identifient d''un plat',
  `pla_titre` varchar(255) NOT NULL COMMENT 'stock le nom du plat',
  `pla_descr` text NOT NULL COMMENT 'stock la description d''un plat',
  `pla_prix` decimal(10,0) NOT NULL COMMENT 'stock le prix d''un plat',
  `pla_est_dispo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'permet de verifier si un plat est disponible ou pas(1=commande dispo)',
  `pla_img` varchar(255) NOT NULL COMMENT 'stock le nom de la photo du plat'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Stock les plats disponibles';

--
-- Contenu de la table `plat`
--

INSERT INTO `plat` (`pla_id`, `pla_titre`, `pla_descr`, `pla_prix`, `pla_est_dispo`, `pla_img`) VALUES
(1, 'Bagel au St Môret et bar mariné', 'C’est le sandwich qui monte dans le snacking branché. En forme d’anneau, il se déguste souvent garni de fromage frais, de saumon fumé et de quelques légumes et herbes… Voici la version Marmito !', '50', 1, 'photo_1'),
(2, 'Cupcakes à la tête de moine', 'Les fromages ont une vie en dehors du plateau. Dans les plats salés on connaît, mais dans des gâteaux… c’est pas banal. Grâce à Marmito, découvrez l’alliance inédite du fromage et de la pâtisserie.', '52', 1, 'photo_2'),
(3, 'Omelette au jambon', 'Un grand classique revisité façon Tony. Vous allez vous régaler.', '39', 1, 'photo_3'),
(4, 'La quiche auvergnate', 'Si vous voulez satisfaire les appétits les plus voraces, lancez-vous sans hésiter dans cette recette. Marmito vous conseille un acompagnement de salade verte ou quelques tomates en morceaux. Simple et efficace.', '45', 1, 'photo_4'),
(5, 'La quiche aux asperges', 'Une jolie tarte toute verte et originale qui saura ravir vos invités.', '65', 1, 'photo_5');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`uti_id` int(10) unsigned NOT NULL COMMENT 'identifient de l''utilisateur',
  `uti_nom` varchar(32) NOT NULL COMMENT 'stock le nom de l''utilisateur',
  `uti_prenom` varchar(32) NOT NULL COMMENT 'stok le prenom de l''utilisateur',
  `uti_genre` enum('h','f') NOT NULL COMMENT 'stock le genre de l''utilisateur',
  `uti_email` varchar(32) NOT NULL COMMENT 'stock le email de l''utilisateur',
  `uti_motpass` char(40) NOT NULL COMMENT 'stock le mot de pass de l''utilisateur',
  `uti_tel` char(10) NOT NULL COMMENT 'stock le telephone de l''utilisateur',
  `uti_est_actif` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permet d''activer desactiver un utilisateur(1=actif)',
  `uti_role` enum('client','employe','admin') NOT NULL DEFAULT 'client' COMMENT 'stock le role de l''utilisateur',
  `uti_hash_val` char(32) NOT NULL COMMENT 'stock la clé de validation de email de l''utilisateur',
  `uti_date_ins` date NOT NULL COMMENT 'stock la date d''inscription de l''utilisateur',
  `uti_num_rue` int(11) NOT NULL COMMENT 'stock le numero de la rue de l''utilisateur',
  `uti_rue` varchar(255) NOT NULL COMMENT 'stock le nom de la rue de l''utilisateur',
  `uti_cp` int(6) NOT NULL COMMENT 'stock le code postal de l''utilisateur',
  `uti_ville` varchar(32) NOT NULL COMMENT 'stock la ville de l''utilisateur'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Stock les informations des utilisateurs';

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`uti_id`, `uti_nom`, `uti_prenom`, `uti_genre`, `uti_email`, `uti_motpass`, `uti_tel`, `uti_est_actif`, `uti_role`, `uti_hash_val`, `uti_date_ins`, `uti_num_rue`, `uti_rue`, `uti_cp`, `uti_ville`) VALUES
(1, 'Baldé', 'yaya', 'h', 'yayabalde1@gmail.com', 'ddefa8e69f07309808cf51f12cd28ce166377e76', '0652566991', 1, 'admin', 'jksdjkjqdklklkldkl', '2016-09-30', 0, '', 0, ''),
(2, 'dupon', 'gean', 'h', 'dupon@gmail.com', 'ddefa8e69f07309808cf51f12cd28ce166377e76', '0734965210', 1, 'client', '', '2016-05-10', 0, '', 0, ''),
(3, 'camara', 'fanta', 'f', 'fanta@gmail.com', 'ddefa8e69f07309808cf51f12cd28ce166377e76', '0294635489', 1, 'employe', '', '2016-02-04', 0, '', 0, ''),
(10, 'marmito', 'marmito', 'h', 'contact@yayabalde.com', 'ddefa8e69f07309808cf51f12cd28ce166377e76', '0546321564', 1, 'client', '', '2016-10-03', 4, 'pierre bayle', 31240, 'toulouse'),
(11, 'balde', 'yaya', 'f', 'fifa@gmail.fr', 'aa07259ed9d427acbaa837c5d1f22d80a5b4cc87', '0652561245', 0, 'client', '3e8aa4451456376e7325f1482fb7baba', '2016-10-05', 4, 'yaya balde', 31400, 'Toulouse'),
(12, 'BALDÉ', 'Yaya', 'f', 'contacterzrez@yayabalde.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '0652566900', 0, 'client', '6c497b02b54cc0c50c8592ca3ab46f8e', '2016-10-05', 4, 'Yaya BALDÉ', 31400, 'Toulouse'),
(13, 'balde', 'yaya', 'f', 'yayabalderrrr1@gmail.com', 'de271790913ea81742b7d31a70d85f50a3d3e5ae', '0652560000', 0, 'client', 'b29bb6f8ffc64fa1ea7bc7bb947d43bb', '2016-10-06', 5, '6 allée des sciences appliquées', 31400, 'Toulouse'),
(14, 'balde', 'yaya', 'f', 'yayadgfdgfddfgbalde1@gmail.com', '7e240de74fb1ed08fa08d38063f6a6a91462a815', '0650066991', 0, 'client', '0861ec6607b13baf8839d9d2e3813e27', '2016-10-06', 4, '6 allée des sciences appliquées', 31400, 'Toulouse');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`com_id`), ADD KEY `uti_com` (`fk_uti_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`con_id`);

--
-- Index pour la table `detailcommande`
--
ALTER TABLE `detailcommande`
 ADD PRIMARY KEY (`detc_id`), ADD KEY `detCom_plat` (`fk_pla_id`), ADD KEY `detCom_com` (`fk_com_id`);

--
-- Index pour la table `detailplat`
--
ALTER TABLE `detailplat`
 ADD PRIMARY KEY (`detp_id`), ADD KEY `detPla_pla` (`fk_pla_id`), ADD KEY `detPla_ing` (`fk_ing_id`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
 ADD PRIMARY KEY (`ing_id`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
 ADD PRIMARY KEY (`pla_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`uti_id`), ADD UNIQUE KEY `uti_email` (`uti_email`), ADD UNIQUE KEY `uti_tel` (`uti_tel`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
MODIFY `com_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identifient de la commande',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
MODIFY `con_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identifient de message',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `detailcommande`
--
ALTER TABLE `detailcommande`
MODIFY `detc_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identifient de detaile sur une commande',AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `detailplat`
--
ALTER TABLE `detailplat`
MODIFY `detp_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identifient de detaile d''un plat',AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
MODIFY `ing_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identifient de l''ingrédient',AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
MODIFY `pla_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'stock l''identifient d''un plat',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `uti_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identifient de l''utilisateur',AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
ADD CONSTRAINT `uti_com` FOREIGN KEY (`fk_uti_id`) REFERENCES `utilisateur` (`uti_id`);

--
-- Contraintes pour la table `detailcommande`
--
ALTER TABLE `detailcommande`
ADD CONSTRAINT `detCom_com` FOREIGN KEY (`fk_com_id`) REFERENCES `commande` (`com_id`),
ADD CONSTRAINT `detCom_plat` FOREIGN KEY (`fk_pla_id`) REFERENCES `plat` (`pla_id`);

--
-- Contraintes pour la table `detailplat`
--
ALTER TABLE `detailplat`
ADD CONSTRAINT `detPla_ing` FOREIGN KEY (`fk_ing_id`) REFERENCES `ingredient` (`ing_id`),
ADD CONSTRAINT `detPla_pla` FOREIGN KEY (`fk_pla_id`) REFERENCES `plat` (`pla_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
