-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 11:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE USER IF NOT EXISTS 'iutadmin'@'localhost' IDENTIFIED BY '$iutinfo';

REVOKE ALL PRIVILEGES ON `projetr4a10`.*
    FROM 'iutadmin'@'%';
GRANT
    SELECT,
    INSERT,
    UPDATE,
    DELETE,
    CREATE,
    DROP,
    REFERENCES,
    INDEX,
    ALTER,
    CREATE TEMPORARY TABLES,
    LOCK TABLES,
    CREATE VIEW,
    EVENT,
    TRIGGER,
    SHOW VIEW,
    EXECUTE ON `projetr4a10`.*
TO 'iutadmin'@'%';
ALTER USER 'iutadmin'@'%' ;

--
-- Database: `projetr4a10`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Id` int(11) NOT NULL,
  `horaire` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` varchar(20) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `utilisateurs` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    CONSTRAINT PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




-- Ajouter les 20 premiers messages dans la bd
INSERT INTO `messages` (`auteur`, `contenu`) VALUES
('Alice', 'Bonjour tout le monde !'),
('Bob', 'Salut Alice, comment ça va ?'),
('Charlie', 'Quelqu’un a regardé le dernier épisode de la série X ?'),
('Alice', 'Oui, c’était incroyable !'),
('David', 'Je n’ai pas encore regardé, pas de spoilers svp !'),
('Eve', 'Quelqu’un veut jouer en ligne ce soir ?'),
('Frank', 'Je suis partant pour une partie de jeu !'),
('Alice', 'Moi aussi, à quelle heure ?'),
('Bob', 'Vers 21h ça vous va ?'),
('Charlie', 'Parfait pour moi.'),
('David', 'Je suis occupé ce soir, une autre fois !'),
('Eve', 'D’accord, on organisera une autre session bientôt.'),
('Frank', 'Qui veut tester une nouvelle application de messagerie ?'),
('Alice', 'Ça dépend, c’est quoi les fonctionnalités ?'),
('Bob', 'Sécurité, rapidité et interface fluide.'),
('Charlie', 'Intéressant, je vais essayer.'),
('David', 'J’espère que ça supporte le chiffrement de bout en bout.'),
('Eve', 'Oui, la confidentialité est importante.'),
('Frank', 'Exactement, c’est l’objectif principal.'),
('Alice', 'Ok, envoyez-moi le lien pour télécharger.');
