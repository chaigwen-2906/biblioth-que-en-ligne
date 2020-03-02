-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour projet_biblio
CREATE DATABASE IF NOT EXISTS `projet_biblio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projet_biblio`;

-- Listage de la structure de la table projet_biblio. atelier
CREATE TABLE IF NOT EXISTS `atelier` (
  `idAtelier` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(10000) NOT NULL,
  `heure` time NOT NULL,
  `age` varchar(255) NOT NULL,
  `capacite` int(11) NOT NULL,
  PRIMARY KEY (`idAtelier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_biblio. auteur
CREATE TABLE IF NOT EXISTS `auteur` (
  `idAuteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`idAuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_biblio. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_biblio. client
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_biblio. coupdecoeur
CREATE TABLE IF NOT EXISTS `coupdecoeur` (
  `idCoupDeCoeur` int(11) NOT NULL AUTO_INCREMENT,
  `idLivre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `commentaire` longtext NOT NULL,
  PRIMARY KEY (`idCoupDeCoeur`),
  KEY `FK_coupdecoeur_livre` (`idLivre`),
  CONSTRAINT `FK_coupdecoeur_livre` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_biblio. faq
CREATE TABLE IF NOT EXISTS `faq` (
  `idFAQ` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(10000) NOT NULL,
  `reponse` varchar(10000) NOT NULL,
  PRIMARY KEY (`idFAQ`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_biblio. livre
CREATE TABLE IF NOT EXISTS `livre` (
  `idLivre` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) NOT NULL DEFAULT '0',
  `idAuteur` int(11) NOT NULL DEFAULT '0',
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `enSavoirPlus` varchar(1000) NOT NULL,
  `dateDePublication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateAchat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` longtext NOT NULL,
  `logoResreaux` varchar(1000) NOT NULL,
  `disponible` varchar(1000) NOT NULL,
  `commentaire` longtext NOT NULL,
  `reference` varchar(100) NOT NULL,
  `editeur` varchar(100) NOT NULL,
  `collection` varchar(500) NOT NULL,
  `nbDePage` int(11) NOT NULL,
  `dimension` varchar(500) NOT NULL,
  `poids` int(11) NOT NULL,
  `langue` varchar(25) NOT NULL,
  `ean` int(11) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `illustration` varchar(200) NOT NULL,
  PRIMARY KEY (`idLivre`),
  KEY `FK_livre_auteur` (`idAuteur`),
  KEY `FK_livre_categorie` (`idCategorie`),
  CONSTRAINT `FK_livre_auteur` FOREIGN KEY (`idAuteur`) REFERENCES `auteur` (`idAuteur`),
  CONSTRAINT `FK_livre_categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table projet_biblio. reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `dateDeDebut` varchar(255) NOT NULL DEFAULT '',
  `statut` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`idReservation`),
  KEY `FK_reservation_client` (`idClient`),
  KEY `FK_reservation_livre` (`idLivre`),
  CONSTRAINT `FK_reservation_client` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  CONSTRAINT `FK_reservation_livre` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
