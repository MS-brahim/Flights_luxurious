-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 mai 2020 à 04:13
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5
CREATE DATABASE  app_vols;
USE app_vols;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `app_vols`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `num_passport` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_vol` int(11) NOT NULL,
  `date_reservation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `id_vol` int(11) NOT NULL,
  `nom_vol` varchar(254) DEFAULT NULL,
  `departure` varchar(254) DEFAULT NULL,
  `arrival` varchar(254) DEFAULT NULL,
  `d_depart` datetime DEFAULT NULL,
  `d_arrival` datetime DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `place` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`id_vol`, `nom_vol`, `departure`, `arrival`, `d_depart`, `d_arrival`, `prix`, `place`) VALUES
(1, 'AirBUS', 'Paris', 'Casablanca', '2020-05-03 10:30:00', '2020-05-03 14:30:00', 2000, 200),
(2, 'AIRFRANCE', 'Lyon', 'Wahrane', '2020-05-12 15:30:00', '2020-05-12 19:30:00', 1000, 150),
(3, 'AIRFRANCE', 'Rabat', 'Roma', '2020-05-19 10:54:00', '2020-05-19 14:55:00', 2000, 20),
(4, 'SKY4', 'Tanger', 'Roma', '2020-10-19 10:00:00', '2020-10-19 14:00:00', 800, 90),
(5, 'VUELING', 'Agadir', 'Las Palmas', '2020-07-19 10:00:00', '2020-07-19 14:00:00', 700, 200),
(6, 'VOY4U', 'Casablanca', 'Madrid', '2020-12-19 10:00:00', '2020-12-19 14:00:00', 1200, 60),
(7, 'QATAR', 'Barcalona', 'Marrakesh', '2020-09-19 10:00:00', '2020-09-19 14:00:00', 1000, 100);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `FK_Association_1` (`id_vol`),
  ADD KEY `FK_Association_2` (`id_client`);

--
-- Index pour la table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`id_vol`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Association_1` FOREIGN KEY (`id_vol`) REFERENCES `vols` (`id_vol`),
  ADD CONSTRAINT `FK_Association_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
