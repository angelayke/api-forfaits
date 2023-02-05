-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 05 fév. 2023 à 19:26
-- Version du serveur : 8.0.28
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forfaits`
--

-- --------------------------------------------------------

--
-- Structure de la table `forfaits`
--

CREATE TABLE `forfaits` (
  `id` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `categories` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `etablissement` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `nouveau_prix` decimal(10,0) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `avis` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forfaits`
--

INSERT INTO `forfaits` (`id`, `nom`, `description`, `code`, `categories`, `etablissement`, `date_debut`, `date_fin`, `prix`, `nouveau_prix`, `premium`, `avis`) VALUES
(1, 'Forfait Trucmuche', 'Description trucmuche ....', 'AAA001', 'Hébergement, Détente', 'Hotel WhyNot', '2023-01-28', '2023-01-31', '149', '119', 1, 'BIen'),
(2, 'Forfait Machin', 'Description machin ....', 'AAA002', 'Hébergement, Restauration', 'Hotel de Glace', '2022-11-10', '2022-11-23', '99', '79', 0, 'Bien'),
(6, 'Forfait Noël', 'Description Noel ....', 'AAA005', 'Hébergement, Restauration, Activités', 'Hotel de Glace', '2022-12-24', '2023-01-26', '249', '-1', 1, 'Très bien'),
(7, 'Forfait Husky', 'Chien de traineau ...', 'AAA005', 'Activités', 'Pourvoirie du Lac', '2023-03-17', '2023-03-19', '99', '59', 1, 'Bien'),
(8, 'Forfait Route des vins', 'Description Routes des vins, dégustations, parcours de quelques vignobles, 2 nuits dans un des vignobles ....', 'AAA006', 'Hébergement, Restauration, Activités', 'Hotel WhyNot', '2023-06-16', '2023-06-19', '699', '-1', 1, 'Très bien'),
(9, 'Forfait St-valentin', 'Profitez d une belle soirée à deux pour déguster notre table dhôte de 5 services, Souper sur bateau mouche pour 2 personnes ', 'AAA007', 'Restauration, Activité', '', '2023-02-14', '2023-02-15', '149', '-1', 0, 'Bien'),
(12, 'Forfait invalide', 'test invalide', 'AAA009', 'test', 'Hotel dupuis', '2023-02-10', '2023-02-12', '20', '-1', 3, 'Bien'),
(13, 'Forfait Activité', 'Description Activité changée, restauration, spa, hiking', 'AAA003', 'Restauration, Détente, Activités', 'Pourvoirie du Lac', '2022-12-14', '2022-12-21', '239', '199', 0, 'Moyen');

-- --------------------------------------------------------

--
-- Structure de la table `visites_touristiques`
--

CREATE TABLE `visites_touristiques` (
  `id` int NOT NULL,
  `nom_visite` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `duree_visite` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prix_visite` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visites_touristiques`
--

INSERT INTO `visites_touristiques` (`id`, `nom_visite`, `duree_visite`, `prix_visite`) VALUES
(1, 'Carrefour Aventure', '1h00', '15'),
(2, 'Tours privés de vignobles', '2h30', '50'),
(3, 'Jardin Cérès', '1h30', '0'),
(4, 'Domaine des 3 vents', '4h00', '16'),
(5, 'Les Moulins de l Isle-aux-Coudres ', '1h45', '12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forfaits`
--
ALTER TABLE `forfaits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visites_touristiques`
--
ALTER TABLE `visites_touristiques`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forfaits`
--
ALTER TABLE `forfaits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `visites_touristiques`
--
ALTER TABLE `visites_touristiques`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
