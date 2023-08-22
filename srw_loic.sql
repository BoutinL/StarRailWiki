-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour srw_loic
CREATE DATABASE IF NOT EXISTS `srw_loic` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `srw_loic`;

-- Listage de la structure de table srw_loic. ability
CREATE TABLE IF NOT EXISTS `ability` (
  `id_ability` int NOT NULL AUTO_INCREMENT,
  `lvl` int NOT NULL DEFAULT '0',
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `energy` varchar(50) DEFAULT NULL,
  `dmg` varchar(50) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `playableCharacter_id` int NOT NULL,
  PRIMARY KEY (`id_ability`),
  KEY `character_id` (`playableCharacter_id`) USING BTREE,
  CONSTRAINT `FK-ability_playableCharacter` FOREIGN KEY (`playableCharacter_id`) REFERENCES `playablecharacter` (`id_playableCharacter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.ability : ~0 rows (environ)

-- Listage de la structure de table srw_loic. combattype
CREATE TABLE IF NOT EXISTS `combattype` (
  `id_combatType` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_combatType`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.combattype : ~6 rows (environ)
INSERT INTO `combattype` (`id_combatType`, `type`) VALUES
	(1, 'Physical'),
	(2, 'Fire'),
	(3, 'Ice'),
	(4, 'Lightning'),
	(5, 'Wind'),
	(6, 'Quantum'),
	(7, 'Imaginary');

-- Listage de la structure de table srw_loic. eidolon
CREATE TABLE IF NOT EXISTS `eidolon` (
  `id_eidolon` int NOT NULL AUTO_INCREMENT,
  `lvl` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `playableCharacter_id` int NOT NULL,
  PRIMARY KEY (`id_eidolon`),
  KEY `character_id` (`playableCharacter_id`) USING BTREE,
  CONSTRAINT `FK-eidolon_playableCharacter` FOREIGN KEY (`playableCharacter_id`) REFERENCES `playablecharacter` (`id_playableCharacter`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.eidolon : ~6 rows (environ)
INSERT INTO `eidolon` (`id_eidolon`, `lvl`, `name`, `description`, `icon`, `image`, `playableCharacter_id`) VALUES
	(1, 1, 'Chilhood', 'After "Victory Rush" is triggered, Himeko\'s SPD increases by 20% for 2 turn(s).', 'https://static.wikia.nocookie.net/houkai-star-rail/images/4/4d/Eidolon_Childhood.png/revision/latest?cb=20230430095516', NULL, 1),
	(2, 2, 'Convergence', 'Deals 15% more DMG to enemies whose HP percentage is 50% or less.', 'https://static.wikia.nocookie.net/houkai-star-rail/images/a/ac/Eidolon_Convergence.png/revision/latest?cb=20230430095605', NULL, 1),
	(3, 3, 'Poised', 'Skill Lv. +2, up to a maximum of Lv. 15 / Basic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://static.wikia.nocookie.net/houkai-star-rail/images/c/c4/Eidolon_Poised.png/revision/latest?cb=20230430095643', NULL, 1),
	(4, 4, 'Dedication', 'When Himeko\'s Skill inflicts Weakness Break on an enemy, she gains 1 extra point(s) of Charge.', 'https://static.wikia.nocookie.net/houkai-star-rail/images/3/38/Eidolon_Dedication.png/revision/latest?cb=20230430095721', NULL, 1),
	(5, 5, 'Aspiration', 'Ultimate Lv. +2, up to a maximum of Lv. 15 / Talent Lv. +2, up to a maximum of Lv. 15.', 'https://static.wikia.nocookie.net/houkai-star-rail/images/3/37/Eidolon_Aspiration.png/revision/latest?cb=20230430095817', NULL, 1),
	(6, 6, 'Trailblaze!', 'Ultimate deals DMG 2 extra times, each of which deals Fire DMG equal to 40% of the original DMG to a random enemy.', 'https://static.wikia.nocookie.net/houkai-star-rail/images/2/2f/Eidolon_Trailblaze%21.png/revision/latest?cb=20230430095830', NULL, 1);

-- Listage de la structure de table srw_loic. path
CREATE TABLE IF NOT EXISTS `path` (
  `id_path` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_path`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.path : ~6 rows (environ)
INSERT INTO `path` (`id_path`, `type`) VALUES
	(1, 'Destruction'),
	(2, 'Hunt'),
	(3, 'Erudition'),
	(4, 'Harmony'),
	(5, 'Nihility'),
	(6, 'Preservation'),
	(7, 'Abundance');

-- Listage de la structure de table srw_loic. playablecharacter
CREATE TABLE IF NOT EXISTS `playablecharacter` (
  `id_playableCharacter` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rarity` int NOT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `specie` varchar(50) DEFAULT NULL,
  `faction` varchar(50) DEFAULT NULL,
  `world` varchar(50) DEFAULT NULL,
  `releaseDate` date NOT NULL,
  `rate` int DEFAULT NULL,
  `combatType_id` int NOT NULL,
  `path_id` int NOT NULL,
  `introduction` text,
  PRIMARY KEY (`id_playableCharacter`) USING BTREE,
  KEY `combatType_id` (`combatType_id`),
  KEY `path_id` (`path_id`),
  CONSTRAINT `FK-playableCharacter_combatType` FOREIGN KEY (`combatType_id`) REFERENCES `combattype` (`id_combatType`),
  CONSTRAINT `FK-playableCharacter_path` FOREIGN KEY (`path_id`) REFERENCES `path` (`id_path`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.playablecharacter : ~11 rows (environ)
INSERT INTO `playablecharacter` (`id_playableCharacter`, `name`, `image`, `rarity`, `sex`, `specie`, `faction`, `world`, `releaseDate`, `rate`, `combatType_id`, `path_id`, `introduction`) VALUES
	(1, 'Himeko', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Himeko-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'The Nameless', 'Astal Express', '2023-04-26', NULL, 2, 3, NULL),
	(2, 'March 7th', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-March-7th-Splash-Art-1024x877.png', 4, 'Female', '', 'The Nameless', 'Astral Express', '2023-04-26', NULL, 3, 6, NULL),
	(3, 'Blade', 'https://expertgamereviews.com/wp-content/uploads/2023/07/Honkai-Star-Rail-Blade-Splash-Art-1024x877.png', 5, 'Male', NULL, 'Stellaron Hunter', NULL, '2023-07-19', NULL, 5, 1, NULL),
	(4, 'Kafka', 'https://expertgamereviews.com/wp-content/uploads/2023/08/Honkai-Star-Rail-Kafka-Splash-Art-768x658.png', 5, 'Female', 'Human', 'Stellaron Hunter', NULL, '2023-08-09', NULL, 4, 5, 'A member of the Stellaron Hunters who is calm, collected, and beautiful. Her record on the wanted list of the Interastral Peace Corporation only lists her name and her hobby. People have always imagined her to be elegant, respectable, and in pursuit of things of beauty even in combat.'),
	(5, 'Dan Heng', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Dan-Heng-Splash-Art-1024x877.png', 4, 'Male', NULL, 'The Nameless', '(NULL)', '2023-04-26', NULL, 5, 2, NULL),
	(6, 'Welt', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Welt-Splash-Art-1024x877.png', 5, 'Male', 'Human', 'The Nameless', 'Astral Express', '2023-04-26', NULL, 7, 5, NULL),
	(7, 'Bailu', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Bailu-Splash-Art-1024x877.png', 5, 'Female', NULL, NULL, NULL, '2023-04-26', NULL, 4, 5, NULL),
	(8, 'Jing Yuan', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Jing-Yuan-Splash-Art-1024x877.png', 5, 'Male', NULL, NULL, NULL, '2023-05-17', NULL, 4, 3, NULL),
	(9, 'Seele', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Seele-Splash-Art-1024x877.png', 5, 'Female', 'Human', NULL, NULL, '2023-04-26', NULL, 6, 2, NULL),
	(10, 'Gepard', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Gepard-Splash-Art-1024x877.png', 5, 'Male', 'Human', NULL, NULL, '2023-04-26', NULL, 3, 6, NULL),
	(11, 'Bronya', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Bronya-Splash-Art-1024x877.png', 5, 'Female', NULL, NULL, NULL, '2023-04-26', NULL, 5, 4, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
