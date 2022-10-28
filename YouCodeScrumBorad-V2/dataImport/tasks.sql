-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 oct. 2022 à 17:42
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `youcodeboard`
--

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_title` varchar(255) NOT NULL,
  `task_type` varchar(11) NOT NULL,
  `task_priority` varchar(11) NOT NULL,
  `task_status` varchar(11) NOT NULL,
  `task_date` datetime NOT NULL,
  `task_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `task_title`, `task_type`, `task_priority`, `task_status`, `task_date`, `task_description`) VALUES
(1, '', '', '', '', '0000-00-00 00:00:00', ''),
(2, '', '', '', '', '0000-00-00 00:00:00', ''),
(9, '', '', '', '', '0000-00-00 00:00:00', ''),
(10, '', '', '', '', '0000-00-00 00:00:00', ''),
(11, 'aa', 'Feature', 'High', '', '0000-00-00 00:00:00', ''),
(12, 'aa', 'Feature', 'Low', 'Done', '2022-10-28 14:57:00', 'dddd'),
(13, 'ek', 'Feature', 'High', 'To Do', '2022-10-28 15:02:00', 'rrrrrr'),
(14, 'aaaaaaaaaaaaa', 'Feature', 'Low', 'In Progress', '2022-10-28 15:14:00', 'azaza');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
