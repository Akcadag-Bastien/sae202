-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 12 juin 2025 à 08:30
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae202`
--
CREATE DATABASE IF NOT EXISTS `sae202` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sae202`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `commentaire_id` int(11) NOT NULL,
  `auteur_email` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_commentaire` datetime NOT NULL DEFAULT current_timestamp(),
  `approuve` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `expediteur` varchar(255) NOT NULL,
  `destinataire` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_envoi` datetime NOT NULL DEFAULT current_timestamp(),
  `lu` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `participant_nom` varchar(100) NOT NULL,
  `participant_prenom` varchar(100) NOT NULL,
  `participant_email` varchar(100) NOT NULL,
  `participant_adresse` varchar(100) DEFAULT NULL,
  `participant_code_postal` int(5) DEFAULT NULL,
  `participant_ville` varchar(100) DEFAULT NULL,
  `participant_pays` varchar(100) DEFAULT NULL,
  `participant_telephone` varchar(100) DEFAULT NULL,
  `participant_mdp` varchar(500) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`participant_nom`, `participant_prenom`, `participant_email`, `participant_adresse`, `participant_code_postal`, `participant_ville`, `participant_pays`, `participant_telephone`, `participant_mdp`, `role`) VALUES
('Dinh', 'Hien', 'hien06d@gmail.com', 'abc', 10000, 'abc', 'abc', '123', '$2y$10$atXAAVG4VoVj/VkG8yt.3eoRP6Ok9vSv6VjFh8w4ZMNQZsRK3b2ji', 'admin'),
('test_nom', 'test_prenom', 'test@gmail.com', 'abc', 123, 'abc', 'abc', '123', '$2y$10$RAtyGd0eSJJ4jUSNzVq2COo3yMgGuESVlS2FtmtkwXxcsyP61/mfO', 'utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`commentaire_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `commentaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
