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
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `energyGeneration` int DEFAULT NULL,
  `energyCost` int DEFAULT NULL,
  `dmg` int DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `playableCharacter_id` int NOT NULL,
  `typeAbility_id` int NOT NULL,
  `tagAbility_id` int DEFAULT NULL,
  PRIMARY KEY (`id_ability`),
  KEY `character_id` (`playableCharacter_id`) USING BTREE,
  KEY `typeAbility_id` (`typeAbility_id`),
  KEY `tag_id` (`tagAbility_id`) USING BTREE,
  CONSTRAINT `FK-ability_playableCharacter` FOREIGN KEY (`playableCharacter_id`) REFERENCES `playablecharacter` (`id_playableCharacter`),
  CONSTRAINT `FK-ability_tagAbility` FOREIGN KEY (`tagAbility_id`) REFERENCES `tagability` (`id_tagAbility`),
  CONSTRAINT `FK-ability_typeAbility` FOREIGN KEY (`typeAbility_id`) REFERENCES `typeability` (`id_typeAbility`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.ability : ~5 rows (environ)
INSERT INTO `ability` (`id_ability`, `name`, `description`, `energyGeneration`, `energyCost`, `dmg`, `icon`, `playableCharacter_id`, `typeAbility_id`, `tagAbility_id`) VALUES
	(1, 'Lightning Rush', 'Deals Lightning DMG equal to 50%–110% of Arlan\'s ATK to a single enemy.', 20, NULL, 30, NULL, 13, 1, 1),
	(2, 'Shackle Breaker', 'Consumes Arlan\'s HP equal to 15% of his Max HP to deal Lightning DMG equal to 120%–264% of Arlan\'s ATK to a single enemy. If Arlan does not have sufficient HP, his HP will be reduced to 1 after using his Skill.', 30, NULL, 60, NULL, 13, 2, 1),
	(3, 'Frenzied Punishment', 'Deals Lightning DMG equal to 192%–345.6% of Arlan\'s ATK to a single enemy and Lightning DMG equal to 96%–172.8% of Arlan\'s ATK to enemies adjacent to it.', 5, 110, 60, NULL, 13, 3, 3),
	(4, 'Pain and Anger', 'Increases Arlan\'s DMG for every percent of HP below his Max HP, up to a max of 36%–79.2% more DMG.', NULL, NULL, NULL, NULL, 13, 4, 7),
	(5, 'Swift Harvest', 'Immediately attacks the enemy. After entering battle, deals Lightning DMG equal to 80% of Arlan\'s ATK to all enemies.', NULL, NULL, 60, NULL, 13, 5, NULL);

-- Listage de la structure de table srw_loic. combattype
CREATE TABLE IF NOT EXISTS `combattype` (
  `id_combatType` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_combatType`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.combattype : ~7 rows (environ)
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

-- Listage des données de la table srw_loic.path : ~7 rows (environ)
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
  `specie` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '???',
  `faction` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '???',
  `world` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '???',
  `quote` varchar(255) DEFAULT '???',
  `releaseDate` date NOT NULL,
  `rate` int DEFAULT NULL,
  `introduction` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `combatType_id` int NOT NULL,
  `path_id` int NOT NULL,
  PRIMARY KEY (`id_playableCharacter`) USING BTREE,
  KEY `combatType_id` (`combatType_id`),
  KEY `path_id` (`path_id`),
  CONSTRAINT `FK-playableCharacter_combatType` FOREIGN KEY (`combatType_id`) REFERENCES `combattype` (`id_combatType`),
  CONSTRAINT `FK-playableCharacter_path` FOREIGN KEY (`path_id`) REFERENCES `path` (`id_path`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.playablecharacter : ~30 rows (environ)
INSERT INTO `playablecharacter` (`id_playableCharacter`, `name`, `image`, `rarity`, `sex`, `specie`, `faction`, `world`, `quote`, `releaseDate`, `rate`, `introduction`, `combatType_id`, `path_id`) VALUES
	(1, 'Himeko', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Himeko-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'The Nameless', 'Astal Express', 'Alright, crew! This world is the target of our next trailblazing expedition!', '2023-04-26', NULL, 'An adventurous scientist who encountered and repaired a stranded train as a child, she now ventures across the universe with the Astral Express as its navigator. She is also an Emanator of the Trailblaze.', 2, 3),
	(2, 'March 7th', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-March-7th-Splash-Art-1024x877.png', 4, 'Female', '???', 'The Nameless', 'Astral Express', 'Well would you listen to that! I saved everyone without causing any trouble! You\'re pretty awesome, March 7th!', '2023-04-26', NULL, 'An enthusiastic girl who was saved from eternal ice by the Astral Express Crew, and has the unique ability of being able to use "Six-Phased Ice." When she awoke, she knew nothing of herself or her past, and decided to name herself after the date of her rebirth, "March 7th." She takes many photos using her camera in hopes of discovering a memento from her past.', 3, 6),
	(3, 'Blade', 'https://expertgamereviews.com/wp-content/uploads/2023/07/Honkai-Star-Rail-Blade-Splash-Art-1024x877.png', 5, 'Male', 'Xianzhou Native', 'Stellaron Hunter', '???', 'When will death come for me? My patience is wearing thin.', '2023-07-19', NULL, 'A member of the Stellaron Hunters and a swordsman who abandoned his body to become a blade. He pledges loyalty to Destiny\'s Slave and possesses a terrifying self-healing ability.', 5, 1),
	(4, 'Kafka', 'https://expertgamereviews.com/wp-content/uploads/2023/08/Honkai-Star-Rail-Kafka-Splash-Art-768x658.png', 5, 'Female', 'Human', 'Stellaron Hunter', 'Pteruges-V', 'You won\'t remember a thing except me.', '2023-08-09', NULL, 'A member of the Stellaron Hunters who is calm, collected, and beautiful. Her record on the wanted list of the Interastral Peace Corporation only lists her name and her hobby. People have always imagined her to be elegant, respectable, and in pursuit of things of beauty even in combat.', 4, 5),
	(5, 'Dan Heng', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Dan-Heng-Splash-Art-1024x877.png', 4, 'Male', 'Vidyadhara', 'The Nameless', 'The Xianzhou Luofu', 'Even as we speak, farewells are happening throughout the universe. The grief that we share is real, but there\'s nothing special about it.', '2023-04-26', NULL, 'The cold and reserved train guard and archivist of the Astral Express. Wielding a spear named Cloud-Piercer, he joined the Express crew to escape his secluded past.', 5, 2),
	(6, 'Welt', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Welt-Splash-Art-1024x877.png', 5, 'Male', 'Human', 'The Nameless', 'Astral Express', 'The galaxy is vast beyond compare, containing an infinite number of possibilities. An individual\'s fate shouldn\'t be limited to a single path ordained by heaven', '2023-04-26', NULL, 'An animator by trade, Welt is a seasoned member of the Astral Express Crew and the former sovereign of Anti-Entropy who has saved Earth from annihilation time and time again. He inherited the name of the world, "Welt."', 7, 5),
	(7, 'Bailu', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Bailu-Splash-Art-1024x877.png', 5, 'Female', 'Vidyadhara', 'Alchemy Commission', 'The Xianzhou Luofu', 'Lunch is like medicine — it has to have the right balance of ingredients. Two smoked patties and a cup of milk tea is a great way to heal your heart and lift your spirits!', '2023-04-26', NULL, 'The vivacious High Elder of the Vidyadhara, also known as the "Healer Lady" in the Xianzhou Luofu who always tries to escape from the Alchemy Commission. Although her skills and knowledge in medicine know no bounds, she often prescribes unconventional remedies.', 4, 5),
	(8, 'Jing Yuan', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Jing-Yuan-Splash-Art-1024x877.png', 5, 'Male', 'Xianzhou Native', 'Cloud Knights', 'The Xianzhou Luofu', 'A truly masterful chess player has no brilliant moves. People clamor excitedly over displays of extreme cunning, forgetting to worry about the overall dangers of the situation.', '2023-05-17', NULL, 'He is one of the seven Arbiter-Generals of the Xianzhou Alliance\'s Cloud Knights, and one of the Six Charioteers of the Xianzhou Luofu. Although he appears lazy, Jing Yuan has been a general on the Luofu for centuries, an amount of time exceeding most of his peers. This can be attributed to his wisdom and attention to routine measures, with Jing Yuan preferring to be preventive rather than corrective.', 4, 3),
	(9, 'Seele', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Seele-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'Wildfire', 'Jarilo-VI', 'To use our strength to create a fair society... Isn\'t that the obvious goal?', '2023-04-26', NULL, 'A spirited and valiant key member of Wildfire who grew up in the perilous Underworld of Belobog. She is accustomed to being on her own. Like her nickname "Babochka" (Russian: Babochka, "Butterfly"), she flits through the battlefield with grace as she causes a storm.', 6, 2),
	(10, 'Gepard', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Gepard-Splash-Art-1024x877.png', 5, 'Male', 'Human', 'Silvermane Guards', 'Jarilo-VI', 'Loyalty isn\'t an inherent value of humans. As such, the recipient of that loyalty also needs to be worthy.', '2023-04-26', NULL, 'He is the captain of the Silvermane Guards and belongs to the noble Landau family in Belobog, responsible for the city\'s defenses and maintaining peace.', 3, 6),
	(11, 'Bronya', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Bronya-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'Supreme Guardian', 'Jarilo-VI', 'This place is always part of our homeland, even when it has been corroded by Fragmentum. Silvermane Guards will never turn their backs on their home.', '2023-04-26', NULL, 'She is the commander of the Silvermane Guards and the current (nineteenth) Supreme Guardian of Belobog. Originally from the Underworld and from the same orphanage as Seele, she was picked from a handful of children to become the next Supreme Guardian, and was then adopted by Cocolia.', 5, 4),
	(12, 'Silver Wolf', 'https://expertgamereviews.com/wp-content/uploads/2023/06/Honkai-Star-Rail-Silver-Wolf-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'Stellaron Hunter', 'Punklorde', 'Can you let me have some fun this time?', '2023-06-07', NULL, 'A member of the Stellaron Hunters and a genius hacker. Silver Wolf has mastered the skill known as "aether editing," which can be used to tamper with the data of reality. Hence, she always views the universe as a massive immersive simulation game and is eager to clear the stages awaiting ahead.', 6, 5),
	(13, 'Arlan', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Arlan-Splash-Art-1024x877.png', 5, 'Male', 'Human', 'Herta Space Station', 'Herta Space Station', 'I\'m proud of my wounds. They\'re a reminder of being able to protect everyone.', '2023-04-26', NULL, 'He is the head of Herta Space Station\'s security department, often seen with a dog named Peppy.', 4, 1),
	(14, 'Asta', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Asta-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Herta Space Station', 'Herta Space Station', 'The \'tortoise\' galaxies are those that slooowly give birth to new stars. The ones that use up their fuel reserves in an instant, are the \'hare\' galaxies.', '2023-04-26', NULL, 'She is the inquisitive lead astronomer responsible for handling the Herta Space Station\'s affairs, including managing the staff and responding to the Intelligentsia Guild.', 2, 4),
	(15, 'Herta', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Herta-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Genius Society', 'The Blue', 'I\'m already perfect, so what else should I do?', '2023-04-26', NULL, 'She is the master of the eponymous Herta Space Station, who appears in the form of a puppet she modeled after her younger self. She is also an emanator of Nous the Erudition.', 3, 3),
	(16, 'Hook', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Hook-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'The Moles', 'Jarilo-VI', 'Who am I? Heh, I\'m the boss around here, you can call me... Pitch-Dark Hook the Great!', '2023-04-26', NULL, 'The self-proclaimed boss of The Moles adventure squad and Fersman\'s adopted daughter. She views life as an opportunity for freedom and countless adventures.', 2, 1),
	(17, 'Luka', 'https://expertgamereviews.com/wp-content/uploads/2023/08/Honkai-Star-Rail-Luka-Splash-Art-1024x877.png', 4, 'Male', 'Human', 'Wildfire', 'Jarilo-VI', 'Tell you a secret — the trick to becoming a champion is training hard while everyone is resting.', '2023-07-19', NULL, 'An optimistic and carefree member of Wildfire. He is the renowned boxing champion of the Belobog Underworld with a mixed martial arts prowess. His enthusiasm inspires other people, especially children, to dream big.', 1, 5),
	(18, 'Natasha', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Natasha-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Wildfire', 'Jarilo-VI', 'Where\'s a doctor when you need one?', '2023-04-26', NULL, 'Fastidious and kind, she is one of the few doctors from the Underworld where medical resources are scarce. It is later revealed that Natasha is the true leader of Wildfire, with Oleg as her acting leader.', 1, 7),
	(19, 'Pela', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Pela-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Silvermane Guards', 'Jarilo-VI', 'Net markers activated — time for a good old counterattack.', '2023-04-26', NULL, 'Admired by the Silvermane Guards, she is the Intelligence Officer who handles their affairs. She can respond to any problem with calm assurance.', 3, 5),
	(20, 'Sampo', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Sampo-Splash-Art-1024x877.png', 4, 'Male', 'Human', 'Wildfire', 'Jarilo-VI', 'All sorts of business are welcome — as long as you\'ve got the cash.', '2023-04-26', NULL, 'He is an eloquent mercenary from the Underworld who does all sorts of jobs for his "customers," as long as he doesn\'t get paid off with a higher price.', 5, 5),
	(21, 'Serval', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Serval-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Landau Family', 'Jarilo-VI', 'How can a rock star not have that kind of confidence?', '2023-04-26', NULL, 'She is the eldest daughter of the Landau family and a mechanic who runs the Neverwinter Workshop, a rock \'n\' roll performance workshop in Belobog as a hobby.', 4, 3),
	(22, 'Clara', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Clara-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'Prospectors', 'Jarilo-VI', 'Mr. Svarog... is my family.', '2023-04-26', NULL, 'She is a shy young girl orphaned at an early age, accompanied by an ancient mech named Svarog. Her greatest wish is "to have a family."', 1, 1),
	(23, 'Qingque', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Qingque-Splash-Art-1024x877.png', 4, 'Female', 'Xianzhou Native', 'Divination Commission', 'The Xianzhou Luofu', 'Work doesn\'t count as extracting value, it\'s just labor in exchange for payment. Extracting value is when you slack off at work.', '2023-04-26', NULL, 'An average Diviner of the Divination Commission on the Xianzhou Luofu, and a librarian. She never slacks off when it comes to slacking off and is about to be demoted to a "door guardian".', 6, 3),
	(24, 'Sushang', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Sushang-Splash-Art-1024x877.png', 4, 'Female', 'Xianzhou Native', 'Cloud Knights', 'The Xianzhou Luofu', 'My name will go down in history, just like those heroes of legend!', '2023-04-26', NULL, 'An amateur Cloud Knight on board the Xianzhou Luofu who transferred from the Xianzhou Yaoqing. She aspires to become a renowned figure, but struggles with language.', 1, 2),
	(25, 'Tingyun', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Tingyun-Splash-Art-1024x877.png', 4, 'Female', 'Foxian', 'The Xianzhou Luofu', 'The Xianzhou Luofu', 'In business, it\'s best to work with persuadable types. For those who are less persuadable, cooling them down with a fan works wonders.', '2023-04-26', NULL, 'She is a young Foxian, amicassador of the Sky-Faring Commission of the Xianzhou Luofu.', 4, 4),
	(26, 'Yukong', 'https://expertgamereviews.com/wp-content/uploads/2023/06/Honkai-Star-Rail-Yukong-Splash-Art-1024x877.png', 4, 'Female', 'Foxian', 'The Xianzhou Luofu', 'The Xianzhou Luofu', 'Some were born to be poets, some to be warriors — I was born to mingle among the stars.', '2023-06-28', NULL, 'The seasoned and authoritative Helm Master of the Xianzhou Alliance\'s Sky-Faring Commission and one of the Xianzhou Luofu\'s Six Charioteers. Despite having feats in piloting starskiffs, she no longer flies due to a brutal battle.', 7, 4),
	(27, 'Luocha', 'https://expertgamereviews.com/wp-content/uploads/2023/06/Honkai-Star-Rail-Luocha-Splash-Art-1024x877.png', 5, 'Male', '???', 'Intergalactic Merchant Guild', 'The Xianzhou Luofu', 'This coffin isn\'t mine. I was merely entrusted to take the body back to the Luofu.', '2023-06-28', NULL, 'A foreign trader who came from beyond the seas, he appears on the Xianzhou Luofu with a huge coffin. With his consummate medical skills, he always rescues people in times of danger. As a merchant, he is registered at the Xianzhou Yuque within the Alliance, and at the Star Unity Mall branch at the North Valley Star within the Interastral Peace Corporation.', 7, 7),
	(28, 'Yanqing', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Yanqing-Splash-Art-1024x877.png', 5, 'Male', '???', 'Cloud Knights', 'The Xianzhou Luofu', 'I only called you \'teacher\' because I admire your skill in this area. Don\'t expect me to start taking it easy on you.', '2023-04-26', NULL, 'The youngest lieutenant of the Xianzhou Alliance\'s Cloud Knights on board the Xianzhou Luofu, and General Jing Yuan\'s retainer. A swordsman gifted with the art of swordplay and war who has a prodigious interest in swords and always collects them from the Artisanship Commission.', 3, 2),
	(29, 'Trailblazer', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7e3dcd2464edfca47e45ee7f0b53f32b_1711910135236400099.gif', 5, 'Female / Male', '???', 'Astral Express', 'Astral Express', 'When there is the chance to make a choice, make one that you know you won\'t regret...', '2023-04-26', NULL, 'They are awakened during the opening events of the game by Kafka and Silver Wolf, who leave them to be found by March 7th and Dan Heng on Herta Space Station during the Antimatter Legion\'s invasion. The player gets to choose either Stelle (female) or Caelus (male), along with their Receptacle Codename.', 1, 1),
	(30, 'Trailblazer', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/c74eb9c6d1c028fc9813c87612c84a3e_5924273427451673630.gif', 5, 'Female / Male', '???', 'Astral Express', 'Astral Express', 'When there is the chance to make a choice, make one that you know you won\'t regret...', '2023-04-26', NULL, 'They are awakened during the opening events of the game by Kafka and Silver Wolf, who leave them to be found by March 7th and Dan Heng on Herta Space Station during the Antimatter Legion\'s invasion. The player gets to choose either Stelle (female) or Caelus (male), along with their Receptacle Codename.', 2, 6);

-- Listage de la structure de table srw_loic. tagability
CREATE TABLE IF NOT EXISTS `tagability` (
  `id_tagAbility` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tagAbility`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.tagability : ~7 rows (environ)
INSERT INTO `tagability` (`id_tagAbility`, `type`) VALUES
	(1, 'Single Target'),
	(2, 'AoE'),
	(3, 'Blast'),
	(4, 'Restore'),
	(5, '	Defense'),
	(6, 'Support'),
	(7, 'Enhance');

-- Listage de la structure de table srw_loic. typeability
CREATE TABLE IF NOT EXISTS `typeability` (
  `id_typeAbility` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_typeAbility`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.typeability : ~5 rows (environ)
INSERT INTO `typeability` (`id_typeAbility`, `type`) VALUES
	(1, '		Basic ATK'),
	(2, '	Skill'),
	(3, 'Ultimate'),
	(4, 'Talent'),
	(5, 'Technique');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
