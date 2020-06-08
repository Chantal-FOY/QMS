-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 07 juin 2020 à 08:00
-- Version du serveur :  10.2.32-MariaDB
-- Version de PHP : 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `buttaubc_SIMPLONG`
--

-- --------------------------------------------------------

--
-- Structure de la table `qms_passages`
--

CREATE TABLE `qms_passages` (
  `IDPassage` smallint(6) NOT NULL,
  `IDPatient` smallint(6) NOT NULL,
  `numPassage` varchar(4) NOT NULL,
  `numPosition` int(2) NOT NULL,
  `dateAdd` datetime NOT NULL,
  `dateUpdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `qms_passages`
--
ALTER TABLE `qms_passages`
  ADD PRIMARY KEY (`IDPassage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `qms_passages`
--
ALTER TABLE `qms_passages`
  MODIFY `IDPassage` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
