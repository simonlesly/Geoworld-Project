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


-- Listage de la structure de la base pour identification
CREATE DATABASE IF NOT EXISTS `identification` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `identification`;

-- Listage de la structure de la table identification. droitutili
CREATE TABLE IF NOT EXISTS `droitutili` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idlog` int(5) NOT NULL,
  `Statut` char(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_droitutili_logutili` (`idlog`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Listage des données de la table identification.droitutili : ~7 rows (environ)
/*!40000 ALTER TABLE `droitutili` DISABLE KEYS */;
INSERT IGNORE INTO `droitutili` (`id`, `idlog`, `Statut`) VALUES
	(1, 1, 'eleve'),
	(2, 2, 'eleve'),
	(3, 3, 'admin'),
	(4, 4, 'admin'),
	(5, 5, 'eleve'),
	(7, 12, 'admin'),
	(8, 14, 'eleve');
/*!40000 ALTER TABLE `droitutili` ENABLE KEYS */;

-- Listage de la structure de la table identification. logutili
CREATE TABLE IF NOT EXISTS `logutili` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idUtili` int(5) DEFAULT NULL,
  `login` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtili` (`idUtili`),
  CONSTRAINT `FK_logutili_utilisateurs` FOREIGN KEY (`idUtili`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Listage des données de la table identification.logutili : ~9 rows (environ)
/*!40000 ALTER TABLE `logutili` DISABLE KEYS */;
INSERT IGNORE INTO `logutili` (`id`, `idUtili`, `login`, `mdp`) VALUES
	(1, 1, 'JCelaire22', 'Drtop12'),
	(2, 2, 'Agoubo99', 'Prdty73'),
	(3, 3, 'Lsimon77', 'Vrepi36'),
	(4, 4, 'Oludundu93', 'Bdfty50'),
	(5, 5, 'Jatant56', 'Iusqa19'),
	(6, 6, 'Ysimon73', 'Aqdcr45'),
	(7, 11, 'Bthorne91', 'Zegfd78'),
	(8, 12, 'Proot', 'Prsio12'),
	(9, 14, 'Zcoleman', 'Kdbya38');
/*!40000 ALTER TABLE `logutili` ENABLE KEYS */;

-- Listage de la structure de la table identification. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Listage des données de la table identification.utilisateurs : ~10 rows (environ)
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT IGNORE INTO `utilisateurs` (`id`, `nom`, `prenom`) VALUES
	(1, 'celair', 'jacques'),
	(2, 'goubo', 'anne-julie'),
	(3, 'simon', 'lesly'),
	(4, 'lunfundu', 'maria'),
	(5, 'atant', 'john'),
	(6, 'simon', 'yohan'),
	(11, 'thorne', 'bella'),
	(12, 'toto', 'nana'),
	(13, 'Root', 'Prof'),
	(14, 'Coleman', 'zendaya');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
