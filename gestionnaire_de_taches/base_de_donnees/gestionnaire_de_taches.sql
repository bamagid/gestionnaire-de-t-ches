-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : dim. 22 oct. 2023 à 09:17
-- Version du serveur : 8.0.34
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionnaire_de_taches`
--

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE `taches` (
  `id` int NOT NULL,
  `titre` varchar(100) NOT NULL,
  `echeance` datetime NOT NULL,
  `priorite` enum('Haute','Moyenne','Basse') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `statut` enum('En attente','En cours','Terminer') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text NOT NULL,
  `creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`id`, `titre`, `echeance`, `priorite`, `statut`, `description`, `creation`, `id_user`) VALUES
(1, 'test1', '2023-10-20 17:24:24', 'Haute', 'Terminer', 'description de la tache test1', '2023-10-20 15:27:03', 1),
(2, 'test2', '2023-10-24 17:24:24', 'Haute', 'Terminer', 'description de la tache test2', '2023-10-20 15:28:08', 1),
(3, 'test3', '2023-10-28 20:54:00', 'Basse', 'En cours', 'desc3', '2023-10-20 16:02:10', 1),
(4, 'korse task1', '2023-10-22 03:30:00', 'Moyenne', 'Terminer', 'decscription de la tache 1', '2023-10-21 00:59:04', 2),
(5, 'korse task2', '2023-10-21 01:01:00', 'Moyenne', 'Terminer', 'Description de la tache korse task2', '2023-10-21 01:02:54', 2),
(6, 'korse task3', '2023-10-21 04:05:00', 'Moyenne', 'En cours', 'Description de la tache korse task3', '2023-10-21 01:06:08', 2),
(8, 'test4', '2023-11-04 04:02:00', 'Haute', 'Terminer', 'desc test4', '2023-10-21 04:04:14', 1),
(9, 'test5', '2023-11-23 04:22:00', 'Haute', 'En attente', 'desc test5', '2023-10-21 04:22:31', 3),
(10, 'test6', '2023-10-27 04:22:00', 'Basse', 'Terminer', 'desc test6', '2023-10-21 04:23:13', 3),
(11, 'tache 1 apres validation', '2023-10-23 03:27:00', 'Moyenne', 'En attente', 'description rapide de la 1ere tache apres la validation de la saisie add_task', '2023-10-22 03:33:25', 4),
(12, 'test1', '2023-10-23 09:00:00', 'Haute', 'Terminer', 'desc1', '2023-10-22 05:01:08', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom`, `email`, `mot_de_passe`, `date_inscription`) VALUES
(1, 'magid ba', 'magid@magid.com', 'adaf9d4ffdd9be9c795f35a994cb86a3', '2023-10-20 13:03:03'),
(2, 'korse', 'korse@solution.com', 'c795ae671ca7d944fd0f563fc79a386c', '2023-10-21 00:56:41'),
(3, 'mariama diallo', 'mariama@diallo.com', 'df86158c63620f07bf7b7abd1609edb9', '2023-10-21 04:20:47'),
(4, 'Abdoul Magid Ba', 'Abdoul@magid.uk', 'adaf9d4ffdd9be9c795f35a994cb86a3', '2023-10-22 00:55:10'),
(5, 'hanamontana', 'hana@montana.git', '6579a92e7f5ac7c57055196b3afe3ddd', '2023-10-22 04:56:07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_FK_1` (`id_user`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `taches`
--
ALTER TABLE `taches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `users_FK_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
