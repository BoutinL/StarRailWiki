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
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `energyGeneration` int DEFAULT '0',
  `energyCost` int DEFAULT '0',
  `dmg` int DEFAULT '0',
  `icon` varchar(255) DEFAULT NULL,
  `playableCharacter_id` int NOT NULL,
  `typeAbility_id` int NOT NULL,
  `tagAbility_id` int NOT NULL,
  PRIMARY KEY (`id_ability`),
  KEY `character_id` (`playableCharacter_id`) USING BTREE,
  KEY `typeAbility_id` (`typeAbility_id`),
  KEY `tag_id` (`tagAbility_id`) USING BTREE,
  CONSTRAINT `FK-ability_playableCharacter` FOREIGN KEY (`playableCharacter_id`) REFERENCES `playablecharacter` (`id_playableCharacter`) ON DELETE CASCADE,
  CONSTRAINT `FK-ability_tagAbility` FOREIGN KEY (`tagAbility_id`) REFERENCES `tagability` (`id_tagAbility`),
  CONSTRAINT `FK-ability_typeAbility` FOREIGN KEY (`typeAbility_id`) REFERENCES `typeability` (`id_typeAbility`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.ability : ~154 rows (environ)
INSERT INTO `ability` (`id_ability`, `name`, `description`, `energyGeneration`, `energyCost`, `dmg`, `icon`, `playableCharacter_id`, `typeAbility_id`, `tagAbility_id`) VALUES
	(1, 'Lightning Rush', 'Deals Lightning DMG equal to 50%–110% of Arlan\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/97f31b5c7f456cadf844b45ee443c93f_4125532999287192258.png', 13, 1, 1),
	(2, 'Shackle Breaker', 'Consumes Arlan\'s HP equal to 15% of his Max HP to deal Lightning DMG equal to 120%–264% of Arlan\'s ATK to a single enemy. If Arlan does not have sufficient HP, his HP will be reduced to 1 after using his Skill.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d8c555f7f9f47b610f2a4b84678df64b_2458479177492742947.png', 13, 2, 1),
	(3, 'Frenzied Punishment', 'Deals Lightning DMG equal to 192%–345.6% of Arlan\'s ATK to a single enemy and Lightning DMG equal to 96%–172.8% of Arlan\'s ATK to enemies adjacent to it.', 5, 110, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/c1b168912e77cc9c91e1bce2eea9f36e_5219776352469082857.png', 13, 3, 3),
	(4, 'Pain and Anger', 'Increases Arlan\'s DMG for every percent of HP below his Max HP, up to a max of 36%–79.2% more DMG.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/4cd4de6a2cb6f1c247bebe52de43635b_1183687854078471674.png', 13, 4, 7),
	(5, 'Swift Harvest', 'Immediately attacks the enemy. After entering battle, deals Lightning DMG equal to 80% of Arlan\'s ATK to all enemies.', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/4cd4de6a2cb6f1c247bebe52de43635b_1183687854078471674.png', 13, 5, 1),
	(6, 'Midnight Tumult', 'Deals Lightning DMG equal to 50%–110% of Kafka\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/689cfe4bc6a597f478ac3b97b07f5020_3033923586790649226.png', 4, 1, 1),
	(7, 'Caressing Moonlight', 'Deals Lightning DMG equal to 80%–176% of Kafka\'s ATK to a target enemy and Lightning DMG equal to 30%–66% of Kafka\'s ATK to enemies adjacent to it.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/04752530243ad830fe2ff6d6b74ec180_2361483496801168705.png', 4, 2, 3),
	(8, 'Twilight Trill', 'Deals Lightning DMG equal to 48%–86.4% of Kafka\'s ATK to all enemies, with a 100% base chance for enemies hit to become Shocked and immediately take DMG from their current Shock state, equal to 80%–104% of its original DMG. Shock lasts for 2 turn(s).', 5, 120, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/ff35ddc6fcd840e03b32c5b1590beda0_4284977392627668044.png', 4, 3, 2),
	(9, 'Gentle but Cruel', 'After an ally of Kafka\'s uses Basic ATK on an enemy target, Kafka immediately launches 1 follow-up attack and deals Lightning DMG equal to 42%–159.6% of her ATK to that target, with a 100% base chance to inflict Shock equivalent to that applied by her Ultimate to the attacked enemy target for 2 turns. This effect can only be triggered 1 time per turn.', 10, 0, 30, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/33dba2c1bd628a3e3db14a92006800bb_208566162545023621.png', 4, 4, 1),
	(10, 'Mercy Is Not Forgiveness', 'Immediately attacks all enemies within a set range. After entering battle, deals Lightning DMG equal to 50% of Kafka\'s ATK to all enemies, with a 100% base chance to inflict Shock equivalent to that applied by her Ultimate on every enemy target for 2 turn(s).', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/8ba9ac70188e687f1ed0b3c6eb5a303e_9062867474936560100.png', 4, 5, 1),
	(11, 'Spectrum Beam', 'Deals Fire DMG equal to 50%–110% of Asta\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/561cdb714bca1356bded73e1b3e24704_2673644565579601470.png', 14, 1, 1),
	(12, 'Meteor Storm', 'Deals Fire DMG equal to 25%–55% of Asta\'s ATK to a single enemy and further deals DMG for 4 extra times, with each time dealing Fire DMG equal to 25%–55.5% of Asta\'s ATK to a random enemy.', 30, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/536e884bd14b5217fcefe8369235ebd6_663172221523735513.png', 14, 2, 8),
	(13, 'Astral Blessing', 'Increases SPD of all allies by 36–51.4 for 2 turn(s).', 5, 120, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/2a92841afdb6db46cc06f5ebeeb7f2c8_1486945396868222946.png', 14, 3, 6),
	(14, 'Astrometry', 'Gains 1 stack of Charging for every different enemy hit by Asta plus an extra stack if the enemy hit has Fire Weakness.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/b5127e104ad193964120be59602b9002_2673644565579601470.png', 14, 4, 6),
	(15, 'Miracle Flash', 'Immediately attacks the enemy. After entering battle, deals Fire DMG equal to 50% of Asta\'s ATK to all enemies.', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/f1fa3a026243fd4284e2b681c939c9b0_663172221523735513.png', 14, 5, 1),
	(16, '	Diagnostic Kick', 'Deals Lightning DMG equal to 50%–110% of Bailu\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/6645f1b8937a21d67c346a2d036dead9_7948460627130319873.png', 7, 1, 1),
	(17, 'Singing Among Clouds', 'Heals a single ally for 7.8%–12.48% of Bailu\'s Max HP plus 78–347.1. Bailu then heals random allies 2 time(s). After each healing, HP restored from the next healing is reduced by 15%.', 30, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/2b5561d50c125d2431a00ead461fa8e8_5955754742858096595.png', 7, 2, 1),
	(18, 'Felicitous Thunderleap', 'Heals all allies for 9%–14.4% of Bailu\'s Max HP plus 90–400.5. Bailu applies Invigoration to allies that are not already Invigorated. For those already Invigorated, Bailu extends the duration of their Invigoration by 1 turn. The effect of Invigoration can last for 2 turn(s). This effect cannot stack.', 0, 100, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/2a1cf842ff8ac7a379e0ceabd5602e70_7424785869292870181.png', 7, 3, 2),
	(19, 'Gourdful of Elixir	', 'After an ally with Invigoration is hit, restores the ally\'s HP for 3.6%–5.76% of Bailu\'s Max HP plus 36–160.2. This effect can trigger 2 time(s). When an ally receives a killing blow, they will not be knocked down. Bailu immediately heals the ally for 12%–19.2% of Bailu\'s Max HP plus 120–534 HP. This effect can be triggered 1 time per battle.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ad4ae23f1ccb93382b67996f0b536015_7948460627130319873.png', 7, 4, 4),
	(20, 'Saunter in the Rain', 'After using Technique, at the start of the next battle, all allies are granted Invigoration for 2 turn(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/027a43c44b3477d461aac312fd5c2113_5955754742858096595.png', 7, 5, 7),
	(21, 'Shard Sword', 'Deals 50%–110% of Blade\'s ATK as Wind DMG to a target enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/5447af673467452a892f7e2a1e9ac493_124035038896462847.png', 3, 1, 1),
	(22, 'Forest of Swords', 'Consumes HP equal to 10% of Blade\'s Max HP and deals Wind DMG equal to the sum of 20%-44% of his ATK and 50%–110% of his Max HP to a single enemy. In addition deals Wind DMG equal to the sum of 8%–17.6% of Blade\'s ATK and 20%-44% of his Max HP to adjacent targets.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/5447af673467452a892f7e2a1e9ac493_124035038896462847.png', 3, 1, 3),
	(23, 'Hellscape', 'Consumes HP equal to 30% of Blade\'s Max HP to enter the Hellscape state.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/e616f8379d57dbbeb76d8e1a38e38665_8333959699175167756.png', 3, 2, 7),
	(24, 'Death Sentence	', 'Sets Blade\'s current HP to 50% of his Max HP and deals to single enemy Wind DMG equal to the sum of 24%–38% of his ATK, 60%–95% of his Max HP, and 60%–95% of the total HP he has lost in the current battle. At the same time, deals Wind DMG to adjacent targets equal to the sum of 9.6%–15.2% of his ATK, 24%–38% of his Max HP, and 24%–38% of the total HP he has lost in the current battle. The total HP Blade has lost in the current battle is capped at 90% of his Max HP. This value will be reset and re-accumulated after his Ultimate is used.', 5, 130, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/7392bbe137436f1b1309cd5d780b3625_6134373856615796550.png', 3, 3, 3),
	(25, 'Shuhu\'s Gift', 'When Blade sustains DMG or consumes his HP, he gains 1 stack of Charge, stacking up to 5 times. A max of 1 Charge stack can be gained every time he is attacked.', 10, 0, 30, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/11c98efc372dcd1b8508a7dc26033d32_5732645460919517685.png', 3, 4, 2),
	(26, 'Karma Wind', 'Immediately attacks the enemy.After entering combat, consumes 20% of Blade\'s Max HP while dealing Wind DMG equal to 40% of his Max HP to all enemies.If Blade\'s current HP is insufficient, his HP will be reduced to 1 when this Technique is used.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/b501405ff8b47c3b0af3c23995313e6e_5722664091204407126.png', 3, 5, 1),
	(27, 'Windrider Bullet', 'Deals Wind DMG equal to 50%–110% of Bronya\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/9b61afee70990e1513625b3440a6d0a4_8716289307662541930.png', 11, 1, 1),
	(28, 'Combat Redeployment', 'Dispels a debuff from a single ally, allows them to immediately take action, and increases their DMG by 33%–72.6% for 1 turn(s).When this Skill is used on Bronya herself, she cannot immediately take action again.', 30, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/3dbed434d0e3bd7ed504fa99bfcea9f7_2615546770694579887.png', 11, 2, 6),
	(29, 'The Belobog March', 'Increases the ATK of all allies by 33%–59.4%, and increases their CRIT DMG equal to 12%–16.8% of Bronya\'s CRIT DMG plus 12%–21.6% for 2 turn(s).', 5, 120, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/638108d773ad540cb227822f9bd008e5_1157224634095066162.png', 11, 3, 6),
	(30, '	Leading the Way', 'After using her Basic ATK, Bronya\'s next action will be Advanced Forward by 15%–33%.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/126c1e2b3c0a11a5e180abec1b53371c_8716289307662541930.png', 11, 4, 7),
	(31, 'Banner of Command', 'After using Bronya\'s Technique, at the start of the next battle, all allies\' ATK increases by 15% for 2 turn(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7e52770570bf3ea2e9ebb0bb835f0c6d_2615546770694579887.png', 11, 5, 6),
	(32, 'I Want to Help', 'Deals Physical DMG equal to 50%–110% of Clara\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/5dfc8b0c4e279a8a64921dcc1280abec_2229920310511211495.png', 22, 1, 1),
	(33, 'Svarog Watches Over You', 'Deals Physical DMG equal to 60%–132% of Clara\'s ATK to all enemies, and additionally deals Physical DMG equal to 60%–132% of Clara\'s ATK to enemies marked by Svarog with a Mark of Counter.\r\nAll Marks of Counter will be removed after this Skill is used.', 30, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/68145c294d2463472fabf8407960365d_796561026501195047.png', 22, 2, 2),
	(34, 'Promise, Not Command', 'After Clara uses Ultimate, DMG dealt to her is reduced by an extra 15%–27%, and she has greatly increased chances of being attacked by enemies for 2 turn(s).\r\nIn addition, Svarog\'s Counter is enhanced. When an ally is attacked, Svarog immediately launches a Counter, and its DMG multiplier against the enemy increases by 96%–172.8%. Enemies adjacent to it take 50% of the DMG dealt to the target enemy. Enhanced Counter(s) can take effect 2 time(s).', 5, 110, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/e659f2d510bf6a552c82724fcc7c633d_2333686872608334148.png', 22, 3, 7),
	(35, 'Because We\'re Family', 'Under the protection of Svarog, DMG taken by Clara when hit by enemy attacks is reduced by 10%. Svarog will mark enemies who attack Clara with his Mark of Counter and retaliate with a Counter, dealing Physical DMG equal to 80%–176% of Clara\'s ATK.', 5, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/91909fb4ca184798f8602fc6d626c2a1_7140770950705873106.png', 22, 4, 1),
	(36, 'A Small Price for Victory', 'Immediately attacks the enemy. Upon entering battle, the chance Clara will be attacked by enemies increases for 2 turn(s).', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/cbb8d6223b04d6e93692a4ed41de4a71_796561026501195047.png', 22, 5, 1),
	(37, 'Cloudlancer Art: North Wind', 'Deals Wind DMG equal to 50%–110% of Dan Heng\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/096ad1e2392e8dc1e97be11a899acc93_8725731303816211947.png', 5, 1, 1),
	(38, 'Cloudlancer Art: Torrent', 'Deals Wind DMG equal to 130%–286% of Dan Heng\'s ATK to a single enemy.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/6df4fcd5c070d21e9ff9cd64fb1594da_1461631157456026954.png', 5, 2, 1),
	(39, '	Ethereal Dream', 'Deals Wind DMG equal to 240%–432% of Dan Heng\'s ATK to a single enemy. If the enemy is Slowed, the Ultimate\'s DMG multiplier increases by 72%–129.6%.', 5, 100, 90, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/06e5fe5d47f9ba7ae0c0d437c64d7b53_8541600586783944355.png', 5, 3, 1),
	(40, 'Superiority of Reach', 'When Dan Heng is the target of an ally\'s Ability, his next attack\'s Wind RES PEN increases by 18%–39.6%. This effect can be triggered again after 2 turn(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/3bf1cddcab1aa763174a34fe187a87f5_900783470661715446.png', 5, 4, 7),
	(41, 'Splitting Spearhead', 'After Dan Heng uses his Technique, his ATK increases by 40% at the start of the next battle for 3 turn(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d1ab481e37f313ba53b6650e6c1ffd8c_8725731303816211947.png', 5, 5, 7),
	(42, 'Fist of Conviction', 'Deals Ice DMG equal to 50%–110% of Gepard\'s ATK to a single enemy.', 0, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/8cfc5518707de5944809f2a6d6251e41_676017818015408657.png', 10, 1, 1),
	(43, 'Daunting Smite', 'Deals Ice DMG equal to 100%–220% of Gepard\'s ATK to a single enemy, with a 65% base chance to Freeze the enemy for 1 turn(s).\r\nWhile Frozen, the enemy cannot take action and will take Additional Ice DMG equal to 30%–66% of Gepard\'s ATK at the beginning of each turn.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d38b4c2bef7bd12928c9ddd661101612_5508906111153315027.png', 10, 2, 9),
	(44, 'Enduring Bulwark', 'Applies a Shield to all allies, absorbing DMG equal to 30%–48% of Gepard\'s DEF plus 150–667.5 for 3 turn(s).', 5, 100, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/6ae7a1aedecffcd3ff81b5f22c0926d8_381114526762976423.png', 10, 3, 5),
	(45, '	Unyielding Will', 'When struck with a killing blow, instead of becoming knocked down, Gepard\'s HP immediately restores to 25%–55% of his Max HP. This effect can only trigger once per battle.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/80210b229c8998bc2a31821bea922213_4973045475441444873.png', 10, 4, 4),
	(46, 'Comradery', 'After Gepard uses his Technique, when the next battle begins, a Shield will be applied to all allies, absorbing DMG equal to 24% of Gepard\'s DEF plus 150 for 2 turn(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/a00b1e72d5e8bd3c160740f4c8ce3267_676017818015408657.png', 10, 5, 5),
	(47, 'What Are You Looking At?', 'Deals Ice DMG equal to 50%–110% of Herta\'s ATK to a single enemy.', 30, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/98dcb3481ceca40bc34d784fef60121b_6697371771478730027.png', 15, 1, 1),
	(48, 'One-Time Offer', 'Deals Ice DMG equal to 50%–110% of Herta\'s ATK to all enemies. If the enemy\'s HP percentage is 50% or higher, DMG dealt to this target increases by 20%.', 30, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/792d45104363047ccf319840de46e519_1937190242671998327.png', 15, 2, 2),
	(49, 'It\'s Magic, I Added Some Magic', 'Deals Ice DMG equal to 120%–216% of Herta\'s ATK to all enemies.', 5, 100, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/e3547f7c51d2c93a27c09d826a5c63e0_4635637507159569590.png', 15, 3, 2),
	(50, 'Fine, I\'ll Do It Myself', 'When an ally\'s attack causes an enemy\'s HP percentage to fall to 50% or lower, Herta will launch a follow-up attack, dealing Ice DMG equal to 25%–43% of Herta\'s ATK to all enemies.', 5, 0, 15, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/166b319f4c0354f9ec2e718d2891017a_5387406539853981989.png', 15, 4, 2),
	(51, 'It Can Still Be Optimized', 'After using her Technique, Herta\'s ATK increases by 40% for 3 turn(s) at the beginning of the next battle.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ed4ea3f04e3dc5efb037eb744b095a5a_6697371771478730027.png', 15, 5, 7),
	(52, 'Sawblade Tuning', 'Deals Fire DMG equal to 50%–110% of Himeko\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/41be414031c376f57dbf8bb522d3e903_212649966676544707.png', 1, 1, 1),
	(53, 'Molten Detonation', 'Deals Fire DMG equal to 100%–220% of Himeko\'s ATK to a single enemy and Fire DMG equal to 40%–88% of Himeko\'s ATK to enemies adjacent to it.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/11d2ae7bbded23ca045ba40f3e63d970_1374505960475558837.png', 1, 2, 3),
	(54, 'Heavenly Flare', 'Deals Fire DMG equal to 138%–248.4% of Himeko\'s ATK to all enemies. Himeko regenerates 5 extra Energy for each enemy defeated.', 5, 120, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ec6121ff3e0894c51a8cc053131ef985_8300156826005676704.png', 1, 3, 2),
	(55, 'Victory Rush', 'When an enemy is inflicted with Weakness Break, Himeko gains 1 point of Charge (max 3 points).\r\nIf Himeko is fully Charged when an ally performs an attack, Himeko immediately performs 1 follow-up attack and deals Fire DMG equal to 70%–154% of her ATK to all enemies, consuming all Charge points.\r\nAt the start of the battle, Himeko gains 1 point of Charge.', 10, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/47fa6acd6b92c09408610a6d5803b787_8300156826005676704.png', 1, 4, 2),
	(56, 'Incomplete Combustion', 'After using Technique, creates a dimension that lasts for 15 second(s). After entering battle with enemies in the dimension, there is a 100% base chance to increase Fire DMG taken by enemies by 10% for 2 turn(s). Only 1 dimension created by allies can exist at the same time.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/571563c594680bf3a8968221f7ba1c75_212649966676544707.png', 1, 5, 9),
	(57, 'Hehe! Don\'t Get Burned!', 'Deals Fire DMG equal to 50%–110% of Hook\'s ATK to a target enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/083bab1000638d1e035e9ebe6bbdbfff_6689490716952148421.png', 16, 1, 1),
	(58, 'Hey! Remember Hook?', 'Single Target: Deals Fire DMG equal to 120%–264% of Hook\'s ATK to a single enemy. In addition, there is a 100% base chance to inflict Burn for 2 turn(s). When afflicted with Burn, enemies will take Fire DoT equal to 25%–71.5% of Hook\'s ATK at the beginning of each turn.\r\n\r\nBlast: Deals Fire DMG equal to 140%–308% of Hook\'s ATK to a single enemy, with a 100% base chance to Burn them for 2 turn(s). Additionally, deals Fire DMG equal to 40%–88% of Hook\'s ATK to enemies adjacent to it. When afflicted with Burn, enemies will take Fire DoT equal to 25%–71.5% of Hook\'s ATK at the beginning of each turn.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/80a9741fff590bd2a84b7e1c28422443_6926300154212229247.png', 16, 2, 1),
	(59, 'Boom! Here Comes the Fire!', 'Deals Fire DMG equal to 240%–432% of Hook\'s ATK to a single enemy. After using Ultimate, the next Skill to be used is Enhanced, which deals DMG to a single enemy and enemies adjacent to it.', 5, 120, 90, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/5fd9ab3dbb73c599a979976474bc796a_8268403247082337415.png', 16, 3, 1),
	(60, 'Ha! Oil to the Flames!', 'When attacking a target afflicted with Burn, deals Additional Fire DMG equal to 50%–110% of Hook\'s ATK and regenerates 5 extra Energy.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/27b5b2976b1cdbd82949a6fa137c8cf9_6689490716952148421.png', 16, 4, 7),
	(61, 'Ack! Look at This Mess!', 'Immediately attacks the enemy. Upon entering battle, Hook deals Fire DMG equal to 50% of her ATK to a random enemy. In addition, there is a 100% base chance to inflict Burn on every enemy for 3 turn(s). When afflicted with Burn, enemies will take Fire DoT equal to 50% of Hook\'s ATK at the beginning of each turn.', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/b9cafc0f3b02a686d083177c79cfdac1_6926300154212229247.png', 16, 5, 1),
	(62, 'Glistening Light', 'Jing Yuan deals Lightning DMG equal to 50%–110% of his ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/04adfb228aa8a11ad28b6cc3de3d036b_4932145576506952883.png', 8, 1, 1),
	(63, 'Rifting Zenith	', 'Deals Lightning DMG equal to 50%–110% of Jing Yuan\'s ATK to all enemies and increases Lightning-Lord\'s Hits Per Action by 2 for the next turn.', 30, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/499d2c6fd6221b9371ce74e421ac742a_6355170759739491343.png', 8, 2, 2),
	(64, 'Lightbringer	', 'Deals Lightning DMG equal to 120%–216% of Jing Yuan\'s ATK to all enemies and increases Lightning-Lord\'s Hits Per Action by 3 for the next turn.', 5, 130, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/6c97f9c2cdb7543cf8fab213593a9abc_8468651980886653214.png', 8, 3, 2),
	(65, 'Prana Extirpated', 'Summons Lightning-Lord at the start of the battle. Lightning-Lord has 60 base SPD and 3 base Hits Per Action. When the Lightning-Lord takes action, its hits are considered as follow-up attacks, with each hit dealing Lightning DMG equal to 33%–72.6% of Jing Yuan\'s ATK to a random single enemy, and enemies adjacent to it also receive Lightning DMG equal to 25% of the DMG dealt to the target enemy.\r\nThe Lightning-Lord\'s Hits Per Action can reach a max of 10. Every time Lightning-Lord\'s Hits Per Action increases by 1, its SPD increases by 10. After the Lightning-Lord\'s action ends, its SPD and Hits Per Action return to their base values.\r\nWhen Jing Yuan is knocked down, the Lightning-Lord will disappear.\r\nWhen Jing Yuan is affected by Crowd Control debuff, the Lightning-Lord is unable to take action.', 0, 0, 15, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ea0630053b5ab0e5f6981c73b92a3714_1718984799195005066.png', 8, 4, 8),
	(66, 'Spirit Invocation', 'After the Technique is used, the Lightning-Lord\'s Hits Per Action in the first turn increases by 3 at the start of the next battle.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/581a42214251fc6b09a6b9e98a086244_6336037995135468235.png', 8, 5, 7),
	(67, 'Direct Punch	', 'Deals Physical DMG equal to 50%–110% of Luka\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/fa8a7923452dfee371f6c2e7438776cf_6588369642498495402.png', 17, 1, 1),
	(68, 'Sky-Shatter Fist', 'Consumes 2 stacks of Fighting Will. First, uses Direct Punch to deal 3 hits, with each hit dealing Physical DMG equal to 10%–22% of Luka\'s ATK to a single enemy target.', 20, 0, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/fa8a7923452dfee371f6c2e7438776cf_6588369642498495402.png', 17, 1, 1),
	(69, 'Lacerating Fist', 'Deals Physical DMG equal to 60%–132% of Luka\'s ATK to a single enemy target. In addition, there is a 100% base chance to inflict Bleed on them, lasting for 3 turn(s).', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/09/5308864/78a436c50bd905a6f924c842aa63336a_5149205530644669867.png', 17, 2, 1),
	(70, '	Coup de Grâce', 'Receives 2 stack(s) of Fighting Will, with a 100% base chance to increase a single enemy target\'s DMG received by 12%–21.6% for 3 turn(s). Then, deals Physical DMG equal to 198%–356.4% of Luka\'s ATK to the target.', 5, 130, 90, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/745239deff2f7d671ec55e51c34f8597_6995238233958895616.png', 17, 3, 1),
	(71, 'Flying Sparks', 'After Luka uses his Basic ATK "Direct Punch" or Skill "Lacerating Fist," he receives 1 stack(s) of Fighting Will, up to 4 stacks. When he has 2 or more stacks of Fighting Will, his Basic ATK "Direct Punch" is enhanced to "Sky-Shatter Fist." After his Enhanced Basic ATK\'s "Rising Uppercut" hits a Bleeding enemy target, the Bleed status will immediately deal DMG for 1 time equal to 68%–88.4% of the original DMG to the target. At the start of battle, Luka will possess 1 stack of Fighting Will.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/499855ec20fdbfd64713bcc4b92e2614_9033922115455418285.png', 17, 4, 7),
	(72, '	Anticipator', 'Immediately attacks the enemy. Upon entering battle, Luka deals Physical DMG equal to 50% of his ATK to a random single enemy with a 100% base chance to inflict his Skill\'s Bleed effect on the target. Then, Luka gains 1 additional stack of Fighting Will.', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/08/07/5308864/7ce848932e30640184edfaa36fe9bcc9_3943386310075001412.png', 17, 5, 1),
	(73, '	Thorns of the Abyss', 'Deals Imaginary DMG equal to 50%–110% of Luocha\'s ATK to a single enemy.', 0, 0, 30, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/11/5308864/bee70cb053fbb83311df9b5a932a4ab4_4627301478103708817.png', 27, 1, 1),
	(74, '	Prayer of Abyss Flower', 'After using his Skill, Luocha immediately restores the target ally\'s HP equal to 40%–64% of Luocha\'s ATK plus 200–890. Meanwhile, Luocha gains 1 stack of Abyss Flower.\r\nWhen any ally\'s HP percentage drops to 50% or lower, an effect equivalent to Luocha\'s Skill will immediately be triggered and applied to this ally for one time (without consuming Skill Points). This effect can be triggered again after 2 turn(s).', 30, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/11/5308864/9e988fc08cbdcb7275a14894559a6e28_8814145433452984116.png', 27, 2, 4),
	(75, '	Death Wish', 'Removes 1 buff(s) from all enemies and deals Imaginary DMG equal to 120%–240% of Luocha\'s ATK to all enemies. Luocha gains 1 stack of Abyss Flower.', 5, 100, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/11/5308864/6c130098854f6c90f105c39e3614653d_6809478288159648413.png', 27, 3, 2),
	(76, '	Cycle of Life', 'When Abyss Flower reaches 2 stacks, Luocha consumes all stacks of Abyss Flower to deploy a Field against the enemy.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/11/5308864/2ab010deec0239542643aee19ccef74b_8199826667217472221.png', 27, 4, 4),
	(77, 'Mercy of a Fool', 'After the Technique is used, the Talent will be immediately triggered at the start of the next battle.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/11/5308864/6eba0917f5ba3adfb4a4e414a5609a67_2000367359301621038.png', 27, 5, 4),
	(78, 'Frigid Cold Arrow', 'Deals Ice DMG equal to 50%–110% of March 7th\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7309dd19c93252844bc2c8a2d555fe32_4280841143732940727.png', 2, 1, 1),
	(79, '	The Power of Cuteness', 'Provides a single ally with a Shield that can absorb DMG equal to 38%–60.8% of March 7th\'s DEF plus 190–845.5 for 3 turn(s).\r\nIf the ally\'s current HP percentage is 30% or higher, greatly increases the chance of enemies attacking that ally.', 30, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/8bc0a94c956b018e8847d4fe49135a93_833170555986271453.png', 2, 2, 5),
	(80, 'Glacial Cascade', 'Deals Ice DMG equal to 90%–162% of March 7th\'s ATK to all enemies. Hit enemies have a 50% base chance to be Frozen for 1 turn(s).\r\nWhile Frozen, enemies cannot take action and will receive Additional Ice DMG equal to 30%–66% of March 7th\'s ATK at the beginning of each turn.', 5, 120, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/79ed0840fa965be876fdb11719b116a2_1733935150091347568.png', 2, 3, 2),
	(81, 'Girl Power', 'After a Shielded ally is attacked by an enemy, March 7th immediately Counters, dealing Ice DMG equal to 50%–110% of her ATK. This effect can be triggered 2 time(s) each turn.', 10, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/8ddab8fd37380a44bf24ebc61437cdee_3704621198674458903.png', 2, 4, 1),
	(82, 'Freezing Beauty', 'Immediately attacks the enemy. After entering battle, there is a 100% base chance to Freeze a random enemy for 1 turn(s).\r\nWhile Frozen, the enemy cannot take action and will take Additional Ice DMG equal to 50% of March 7th\'s ATK at the beginning of each turn."', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/097ef3f0d0db733a2b620fa480c096ce_4280841143732940727.png', 2, 5, 1),
	(83, 'Behind the Kindness', 'Deals Physical DMG equal to 50%–110% of Natasha\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d3eacc5f3e8c42a01d30a71806f0a682_8369501598094468441.png', 18, 1, 1),
	(84, 'Love, Heal, and Choose', 'Restores a single ally for 7%–11.2% of Natasha\'s Max HP plus 70–311.5. Restores the ally for another 4.8%–7.68% of Natasha\'s Max HP plus 48–213.6 at the beginning of each turn for 2 turn(s).', 30, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/07917aa9266597d46a71a248300612c1_3809697317681224415.png', 18, 2, 4),
	(85, 'Gift of Rebirth', 'Heals all allies for 9.2%–14.72% of Natasha\'s Max HP plus 92–409.4.', 5, 0, 90, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/180c86cdca999a083ba51b36a4a1e0fc_8359783337779444110.png', 18, 3, 4),
	(86, 'Innervation', 'When healing allies with HP percentage at 30% or lower, increases Natasha\'s Outgoing Healing by 25%–55%. This effect also works on continuous healing.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ca0a2ee62629d933feb4ea18016ae0cf_8369501598094468441.png', 18, 4, 7),
	(87, 'Hypnosis Research', 'Immediately attacks the enemy. After entering battle, deals Physical DMG equal to 80% of Natasha\'s ATK to a random enemy, with a 100% base chance to Weaken all enemies.\r\nWhile Weakened, enemies deal 30% less DMG to allies for 1 turn(s).', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/bebd997926eeda2922ebcfd4ce9c3c05_3809697317681224415.png', 18, 5, 1),
	(88, '	Frost Shot', 'Deals Ice DMG equal to 50%–110% of Pela\'s ATK to a single enemy.', 20, 0, 20, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/c21abe4723119085a6343d0691b6d6b9_5800924441331146166.png', 19, 1, 1),
	(89, 'Frostbite', 'Removes 1 buff(s) and deals Ice DMG equal to 105%–231% of Pela\'s ATK as to a single enemy.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/cf17b98d17eff52eff6a876e2a02d6f6_8359783337779444110.png', 19, 2, 9),
	(90, 'Zone Suppression', 'Deals Ice DMG equal to 60%–108% of Pela\'s ATK to all enemies, with a 100% base chance to inflict Exposed on all enemies.\r\nWhen Exposed, enemies\' DEF is reduced by 30%–42% for 2 turn(s).', 5, 0, 110, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/f99de512d443cf7e5949bc435ce1d044_4774777776697056273.png', 19, 3, 9),
	(91, 'Data Collecting	', 'If the enemy is debuffed after Pela\'s attack, Pela will restore 5–11 extra Energy. This effect can only be triggered 1 time per attack.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/32bfc49f71e2562959999dab274339e8_5819697006064706810.png', 19, 4, 6),
	(92, 'Preemptive Strike', 'Immediately attacks the enemy. Upon entering battle, Pela deals Ice DMG equal to 80% of her ATK to a random enemy, with a 100% base chance of lowering the DEF of all enemies by 20% for 2 turn(s).', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/70714f84e8f687837a8cfbe411624ed3_5800924441331146166.png', 19, 5, 1),
	(93, '	Flower Pick', 'Tosses 1 jade tile from the suit with the fewest tiles in hand to deal Quantum DMG equal to 50%–110% of Qingque\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/aa02e360a5d481e6786e9ca175d59b5d_5567381387307206888.png', 23, 1, 1),
	(94, 'Cherry on Top!', 'Deals Quantum DMG equal to 120%–288% of Qingque\'s ATK to a single enemy, and deals Quantum DMG equal to 50%–110% of Qingque\'s ATK to enemies adjacent to it.\r\n"Cherry on Top!" cannot recover Skill Points.', 20, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/aa02e360a5d481e6786e9ca175d59b5d_5567381387307206888.png', 23, 1, 3),
	(95, 'A Scoop of Moon', 'Immediately draws 2 jade tile(s) and increases DMG by 14%–30.8% until the end of the current turn. This effect can stack up to 4 time(s). The turn will not end after this Skill is used.', 30, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/25479d03b4b03f06ac552d9c3061cc29_7496872984278059577.png', 23, 2, 7),
	(96, 'A Quartet? Woo-hoo!	', 'Deals Quantum DMG equal to 120%–216% of Qingque\'s ATK to all enemies, and obtain 4 jade tiles of the same suit.', 5, 0, 140, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/9c998c17fad6052b2b367e69965d3dac_7470195633983163316.png', 23, 3, 2),
	(97, 'Celestial Jade', 'When an ally\'s turn starts, Qingque randomly draws 1 tile from 3 different suits and can hold up to 4 tiles at one time.\r\nIf Qingque starts her turn with 4 tiles of the same suit, she consumes all tiles to enter the "Hidden Hand" state.\r\nWhile in this state, Qingque cannot use her Skill again. At the same time, Qingque\'s ATK increases by 36%–79.2%, and her Basic ATK "Flower Pick" is enhanced, becoming "Cherry on Top!" The "Hidden Hand" state ends after using "Cherry on Top!".', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/367d7fcaf99d6707a57b29ce576de016_8879455105364826351.png', 23, 4, 7),
	(98, 'Game Solitaire', 'After using Technique, Qingque draws 2 jade tile(s) when the battle starts.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/dc2d78a41a1b260bd6bc43bab824cb47_5567381387307206888.png', 23, 5, 7),
	(99, 'Dazzling Blades', 'Deals Wind DMG equal to 50%–110% of Sampo\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/84b406ca0522d2fe121ee0fa6e91795b_4674073639784955121.png', 20, 1, 1),
	(100, 'Ricochet Love', 'Deals Wind DMG equal to 28%–61.6% of Sampo\'s ATK to a single enemy, and further deals DMG for 4 extra time(s), with each time dealing Wind DMG equal to 28%–61.6% of Sampo\'s ATK to a random enemy.', 30, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/aa20f3be397f1c042c971327b45cdd35_7976782128534925663.png', 20, 2, 8),
	(101, 'Surprise Present', 'Deals Wind DMG equal to 96%–172.8% of Sampo\'s ATK to all enemies, with a 100% base chance to increase the targets\' DoT taken by 20%–32% for 2 turn(s).', 5, 120, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d03fd3b8b4b2ea96d342b73ab892e3df_2524748353213408690.png', 20, 3, 9),
	(102, 'Windtorn Dagger', 'Sampo\'s attacks have a 65% base chance to inflict Wind Shear for 3 turn(s).\r\nEnemies inflicted with Wind Shear will take Wind DoT equal to 20%–57.2% of Sampo\'s ATK at the beginning of each turn. Wind Shear can stack up to 5 time(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/692392dfbd3333d7061df66529ee48b7_8427918881758812850.png', 20, 4, 7),
	(103, 'Shining Bright', 'After Sampo uses Technique, enemies in a set area are inflicted with Blind for 10 second(s). Blinded enemies cannot detect your team.\r\nWhen initiating combat against a Blinded enemy, there is a 100% fixed chance to delay all enemies\' action by 25%.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/1786273fd1524e9c8d580cd5eb333ec6_4674073639784955121.png', 20, 5, 9),
	(104, 'Thwack', 'Deals Quantum DMG equal to 50%–110% of Seele\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/1acdcd001ebac09823d3c4df48a92723_128522484412670169.png', 9, 1, 1),
	(105, 'Sheathed Blade', 'Increases Seele\'s SPD by 25% for 2 turn(s) and deals Quantum DMG equal to 110%–242% of Seele\'s ATK to a single enemy.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/0c64fa09e982c562695ee014d8783a41_70757813410974498.png', 9, 2, 1),
	(106, 'Butterfly Flurry', 'Seele enters the buffed state and deals Quantum DMG equal to 255%–459% of her ATK to a single enemy.', 5, 120, 90, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/c913a4ccdc00d77fa5a952303d8d1bcb_4399237705449641073.png', 9, 3, 1),
	(107, 'Resurgence', 'Enters the buffed state upon defeating an enemy with Basic ATK, Skill, or Ultimate, and receives an extra turn. While in the buffed state, the DMG of Seele\'s attacks increases by 40%–88% for 1 turn(s).\r\nEnemies defeated in the extra turn provided by "Resurgence" will not trigger another "Resurgence."', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/b27334962f2defcf8e216b7f75088440_4338128316479634658.png', 9, 4, 7),
	(108, 'Phantom Illusion', 'After using her Technique, Seele gains Stealth for 20 second(s). While Stealth is active, Seele cannot be detected by enemies. And when entering battle by attacking enemies, Seele will immediately enter the buffed state.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/5c901cd19959942266960ec756c1efe5_128522484412670169.png', 9, 5, 7),
	(109, 'Roaring Thunderclap', 'Deals Lightning DMG equal to 50%–110% of Serval\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/38ba609e57dc4693f4d70bc597287531_4995735335659635616.png', 21, 1, 1),
	(110, '	Lightning Flash', 'Deals Lightning DMG equal to 70%–154% of Serval\'s ATK to a single enemy and Lightning DMG equal to 30%–66% of Serval\'s ATK to enemies adjacent to it, with a 80% base chance for enemies hit to become Shocked for 2 turn(s).\r\nWhile Shocked, enemies take Lightning DoT equal to 40%–114.4% of Serval\'s ATK at the beginning of each turn.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/4acbce31bf132d902473d20a320984e7_1439228946174806623.png', 21, 2, 3),
	(111, 'Here Comes the Mechanical Fever', 'Deals Lightning DMG equal to 108%–194.4% of Serval\'s ATK to all enemies. Enemies already Shocked will extend the duration of their Shock state by 2 turn(s).', 5, 100, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/43fe25e07ee7052d66fcd870e47ced37_8741248032194605601.png', 21, 3, 2),
	(112, 'Galvanic Chords', 'After Serval attacks, deals Additional Lightning DMG equal to 36%–79.2% of Serval\'s ATK to all Shocked enemies.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/5ab883ac134aa531bd4e1e412db5bf0a_4995735335659635616.png', 21, 4, 7),
	(113, '	Good Night, Belobog', 'Immediately attacks the enemy. After entering battle, deals Lightning DMG equal to 50% of Serval\'s ATK to a random enemy, with a 100% base chance for all enemies to become Shocked for 3 turn(s).\r\nWhile Shocked, enemies will take Lightning DoT equal to 50% of Serval\'s ATK at the beginning of each turn.', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/83eb3eb22c75a56019a551b700d0116e_1439228946174806623.png', 21, 5, 1),
	(114, 'System Warning', 'Deals Quantum DMG equal to 50%–110% of Silver Wolf\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/10/5308864/753f3de2820b5bd3d1136029ff96fee1_4880651879072923404.png', 12, 1, 1),
	(115, '	Allow Changes?', 'There is a 75%–87% base chance to add 1 Weakness of an on-field ally\'s Type to the target enemy. This also reduces the enemy\'s DMG RES to that Weakness Type by 20% for 2 turn(s). If the enemy already has that Type Weakness, the effect of DMG RES reduction to that Weakness Type will not be triggered.\r\nEach enemy can only have 1 Weakness implanted by Silver Wolf. When Silver Wolf implants another Weakness to the target, only the most recent implanted Weakness will be kept.\r\nIn addition, there is a 100% base chance to reduce the All-Type RES of the enemy further by 7.5%–10.5% for 2 turn(s).\r\nDeals Quantum DMG equal to 98%–215.6% of Silver Wolf\'s ATK to this enemy.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/10/5308864/c16c99c2f1b11b7219456482f804d99f_1908034921692139795.png', 12, 2, 9),
	(116, 'User Banned', 'There\'s a 85%–103% base chance to decrease the target enemy\'s DEF by 36%–46.8% for 3 turn(s). And at the same time, deals Quantum DMG equal to 228%–410.4% of Silver Wolf\'s ATK to the target enemy.', 5, 110, 90, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/10/5308864/49d7b3a38a906087cd63e357534795f3_6255845762088151945.png', 12, 3, 9),
	(117, 'Awaiting System Response...', 'Silver Wolf can create three types of Bugs: reduce ATK by 5%–11%, reduce DEF by 4%–8.8%, and reduce SPD by 3%–6.6%.\r\nEvery time Silver Wolf attacks, she has a 60%–74.4% base chance to implant a random Bug that lasts for 3 turn(s) in the enemy target.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/10/5308864/d2a55925350334b55bfee33c87d65c72_8615378322336570820.png', 12, 4, 9),
	(118, 'Force Quit Program', 'Immediately attacks the enemy. After entering battle, deals Quantum DMG equal to 80% of Silver Wolf\'s ATK to all enemies, and ignores Weakness Types and reduces Toughness from all enemies. Enemies with their Weakness Broken in this way will trigger the Quantum Weakness Break effect.', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/05/10/5308864/b0f175c1d90b61fbf43ba775f21733f6_3885458520804096732.png', 12, 5, 1),
	(119, '	Cloudfencer Art: Starshine', 'Deals Physical DMG equal to 50%–110% of Sushang\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/03e374f0a0f89f822c3c964c760ac2cd_5713501086688851293.png', 24, 1, 1),
	(120, '	Cloudfencer Art: Mountainfall', 'Deals Physical DMG equal to 105%–231% of Sushang\'s ATK to a single enemy. In addition, there is a 33% chance to trigger Sword Stance on the final hit, dealing Additional Physical DMG equal to 50%–110% of Sushang\'s ATK to the enemy.\r\nIf the enemy is inflicted with Weakness Break, Sword Stance is guaranteed to trigger.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d687fa21526eae39daa853e135faf6c3_2141656950430570065.png', 24, 2, 1),
	(121, 'Shape of Taixu: Dawn Herald', 'Deals Physical DMG equal to 192%–345.6% of Sushang\'s ATK to a single enemy target, and she immediately takes action again. In addition, Sushang\'s ATK increases by 18%–32.4% and using her Skill has 2 extra chances to trigger Sword Stance for 2 turn(s).\r\nSword Stance triggered from the extra chances deals 50% of the original DMG.', 5, 120, 90, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/cae1d57570ddc033590e74ade8c785e4_6443724312221752413.png', 24, 3, 1),
	(122, 'Dancing Blade', 'When an enemy has their Weakness Broken on the field, Sushang\'s SPD increases by 15%–21% for 2 turn(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/e55bdc52338e2db75d330fb15d6be1c3_5713501086688851293.png', 24, 4, 7),
	(123, 'Cloudfencer Art: Warcry', 'Immediately attacks the enemy. Upon entering battle, Sushang deals Physical DMG equal to 80% of her ATK to all enemies.', 0, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ef6936fddb100d18715bd0a5b8c83fa8_2141656950430570065.png', 24, 5, 1),
	(124, 'Dislodged', 'Tingyun deals Lightning DMG equal to 50%–110% of her ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/e72adcf3235cb2f1099e03bd65746f7c_6976025053470300335.png', 25, 1, 1),
	(125, 'Soothing Melody', 'Grants a single ally with Benediction to increase their ATK by 25%–55%, up to 15%–27% of Tingyun\'s current ATK.\r\nWhen the ally with Benediction attacks, they will deal Additional Lightning DMG equal to 20%–44% of that ally\'s ATK for 1 time.\r\nBenediction lasts for 3 turn(s) and is only effective on the most recent receiver of Tingyun\'s Skill.', 30, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/1b2a80eae973505e6521fbf4e1154811_7470195633983163316.png', 25, 2, 7),
	(126, '	Amidst the Rejoicing Clouds', 'Regenerates 50 Energy for a single ally and increases the target\'s DMG by 20%–56% for 2 turn(s).', 5, 130, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/e46b5240b727bf1992cf4bf95d5e1334_1481709875757522811.png', 25, 3, 6),
	(127, 'Violet Sparknado', 'When an enemy is attacked by Tingyun, the ally with Benediction immediately deals Additional Lightning DMG equal to 30%–66% of that ally\'s ATK to the same enemy.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/5ab883ac134aa531bd4e1e412db5bf0a_4995735335659635616.png', 25, 4, 7),
	(128, 'Gentle Breeze', 'Tingyun immediately regenerates 50 Energy upon using her Technique.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/447c2c78c57f2df6d2d3a6429c4c8b11_6976025053470300335.png', 25, 5, 6),
	(129, 'Gravity Suppression', 'Deals Imaginary DMG equal to 50%–110% of Welt\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/bfe99c39a150b6a14fcc7247402d97c3_5034556978741429915.png', 6, 1, 1),
	(130, 'Edge of the Void', 'Deals Imaginary DMG equal to 36%–79.2% of Welt\'s ATK to a single enemy and further deals DMG 2 extra times, with each time dealing Imaginary DMG equal to 36%–90% of Welt\'s ATK to a random enemy. On hit, there is a 65%–77% base chance to reduce the enemy\'s SPD by 10% for 2 turn(s).', 30, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/f767e93e19e25f0b984536c0e06f3900_6648738534997005833.png', 6, 2, 8),
	(131, 'Synthetic Black Hole', 'Deals Imaginary DMG equal to 90%–162% of Welt\'s ATK to all enemies, with a 100% base chance for enemies hit by this ability to be Imprisoned for 1 turn.\r\nImprisoned enemies have their actions delayed by 32%–41.6% and SPD reduced by 10%.', 5, 120, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d08673ee67b6a822a1e2ad8e1d140b9b_8219753787156836038.png', 6, 3, 2),
	(132, 'Time Distortion', 'When hitting an enemy that is already Slowed, Welt deals Additional Imaginary DMG equal to 30%–66% of his ATK to the enemy.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/576e06f37c870b0339237fe4da6a51a4_5034556978741429915.png', 6, 4, 7),
	(133, '	Gravitational Imprisonment', 'After using Welt\'s Technique, create a dimension that lasts for 15 second(s). Enemies in this dimension have their Movement SPD reduced by 50%. After entering battle with enemies in the dimension, there is a 100% base chance to Imprison the enemies for 1 turn.\r\nImprisoned enemies have their actions delayed by 20% and SPD reduced by 10%. Only 1 dimension created by allies can exist at the same time.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/19eb8a8685d89b4e464348dfa7949972_6648738534997005833.png', 6, 5, 9),
	(134, 'Frost Thorn', 'Deals Ice DMG equal to 50%–110% of Yanqing\'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7d2d1893f491d1ccad40f1f52b541394_3016079638761640415.png', 28, 1, 1),
	(135, '	Darting Ironthorn', 'Deals Ice DMG equal to 110%–242% of Yanqing\'s ATK to a single enemy and activates Soulsteel Sync for 1 turn.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d6bf3d8996daf293416c79888c959526_8363801734095988701.png', 28, 2, 1),
	(136, 'Amidst the Raining Bliss', 'Increases Yanqing\'s CRIT Rate by 60%. When Soulsteel Sync is active, increases Yanqing\'s CRIT DMG by an extra 30%–54%. This buff lasts for one turn. Afterwards, deals Ice DMG equal to 210%–378% of Yanqing\'s ATK to a single enemy.', 5, 140, 90, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/75f71926163fc117170fbff235a25d5f_8349999835807624335.png', 28, 3, 1),
	(137, 'One With the Sword', 'When Soulsteel Sync is active, Yanqing is less likely to be attacked by enemies. Yanqing\'s CRIT Rate increases by 15%–21% and his CRIT DMG increases by 15%–33%. After Yanqing attacks an enemy, there is a 50%–62% fixed chance to perform a follow-up attack, dealing Ice DMG equal to 25%–55% of Yanqing\'s ATK to the enemy, which has a 65% base chance to Freeze the enemy for 1 turn.\r\nThe Frozen target cannot take action and receives Additional Ice DMG equal to 25%–55% of Yanqing\'s ATK at the beginning of each turn.\r\nWhen Yanqing receives DMG, the Soulsteel Sync effect will disappear.', 10, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/fb9feeab0e32724a0fe7d0162c16a331_5526743318712143940.png', 28, 4, 1),
	(138, 'The One True Sword', 'After using his Technique, at the start of the next battle, Yanqing deals 30% more DMG for 2 turn(s) to enemies whose current HP is 50% or higher.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/e8c4a1dd1ddc23dfd78230992825a111_3016079638761640415.png', 28, 5, 7),
	(139, 'Arrowslinger', 'Deals 50%–110% of Yukong\'s ATK as Imaginary DMG to a target enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/06/26/5308864/d26cabdc89245d3144593c16fa9ca721_5133604338987619493.png', 26, 1, 1),
	(140, 'Emboldening Salvo', 'Obtains 2 stack(s) of "Roaring Bowstrings" (to a maximum of 2 stacks). When "Roaring Bowstrings" is active, the ATK of all allies increases by 40%–88%, and every time an ally\'s turn ends, Yukong loses 1 stack of "Roaring Bowstrings."\r\nWhen it\'s the turn where Yukong gains "Roaring Bowstrings" by using Skill, "Roaring Bowstrings" will not be removed.', 30, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/06/26/5308864/2152245b9527163429eb714f46003815_5119359143237780057.png', 26, 2, 7),
	(141, 'Diving Kestrel', 'If "Roaring Bowstrings" is active on Yukong when her Ultimate is used, additionally increases all allies\' CRIT Rate by 21%–29.4% and CRIT DMG by 39%–70.2%. At the same time, deals Imaginary DMG equal to 228%–410.4% of Yukong\'s ATK to a single enemy.', 5, 130, 90, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/06/26/5308864/947e09cecefab2ac54eedc6eefacf407_5019106204495824913.png', 26, 3, 1),
	(142, 'Seven Layers, One Arrow', 'Basic ATK additionally deals Imaginary DMG equal to 40%–88% of Yukong\'s ATK, and increases the Toughness-Reducing DMG of this attack by 100%. This effect can be triggered again in 1 turn(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/06/26/5308864/ca6c09cfb382932adc49824b51da18af_2471273853945427931.png', 26, 4, 7),
	(143, 'Chasing the Wind', 'After using her Technique, Yukong enters Sprint mode for 20 seconds. In Sprint mode, her Movement SPD increases by 35%, and Yukong gains 2 stack(s) of "Roaring Bowstrings" when she enters battle by attacking enemies.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/06/26/5308864/f2f8d30914b6ffdee21151a8cf4a7282_3968890477053310535.png', 26, 5, 7),
	(144, 'Farewell Hit', 'Deals Physical DMG equal to 50%–110% of Trailblazer \'s ATK to a single enemy.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/4dbe20f5dff27356e3647d3685c19123_5175305945877387306.png', 29, 1, 1),
	(145, 'RIP Home Run', 'Deals Physical DMG equal to 62.5%–137.5% of the Trailblazer\'s ATK to a single enemy and enemies adjacent to it.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7b5bf1534e2f099907be9e75d0d6d7da_4932145576506952883.png', 29, 2, 3),
	(146, 'Stardust Ace	', 'Choose between two attack modes to deliver a full strike.', 5, 120, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/4d583a65926e659788f0b3169a15087e_7570196185723352081.png', 29, 3, 3),
	(147, 'Perfect Pickoff', 'Each time after this character inflicts Weakness Break on an enemy, ATK increases by 10%–22%. This effect stacks up to 2 time(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/aaa6a9fe585ba4ea58debfff8f7249f7_147146823650955972.png', 29, 4, 7),
	(148, 'Immortal Third Strike', 'Immediately heals all allies for 15% of their respective Max HP after using this Technique.', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/9928bb5d534b6fcca16ddb7601d85679_6904172830867021099.png', 29, 5, 4),
	(149, 'Ice-Breaking Light', 'Deals Fire DMG equal to 50%–110% of Trailblazer\'s ATK to a single enemy and gains 1 stack of Magma Will.', 20, 0, 30, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/86004c5f9d61b4eee3b02434d05f0241_2168065039813320226.png', 30, 1, 1),
	(150, 'Ice-Breaking Light', 'Consumes 4 stacks of Magma Will to enhance Basic ATK, dealing Fire DMG equal to 90%–146.25% of the Trailblazer\'s ATK to a single enemy and Fire DMG to equal to 36%–58.5% of the Trailblazer\'s ATK to enemies adjacent to it.', 30, 0, 60, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/86004c5f9d61b4eee3b02434d05f0241_2168065039813320226.png', 30, 1, 3),
	(151, 'Ever-Burning Amber', 'Increases the Trailblazer\'s DMG Reduction by 40%–52% and gains 1 stack of Magma Will, with a 100% base chance to Taunt all enemies for 1 turn(s).', 30, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/95038947779ade974b114addc516eac5_9048276669569333820.png', 30, 2, 5),
	(152, '	War-Flaming Lance', 'Deals Fire DMG equal to 50%–110% of the Trailblazer\'s ATK plus 75%–165% of the Trailblazer\'s DEF to all enemies. The next Basic ATK will be automatically enhanced and does not cost Magma Will.', 5, 120, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ba48a52fd48ec8b6ac4268f25ee25ddb_2209490672658195643.png', 30, 3, 2),
	(153, '	Treasure of the Architects', 'Each time the Trailblazer is hit, they gain 1 stack of Magma Will for a max of 8 stack(s).\r\nWhen Magma Will has no fewer than 4 stacks, the Trailblazer\'s Basic ATK becomes enhanced, dealing DMG to a single enemy and enemies adjacent to it.\r\nWhen the Trailblazer uses Basic ATK, Skill, or Ultimate, apply a Shield to all allies that absorbs DMG equal to 4%–6.4% of the Trailblazer\'s DEF plus 20–89. The Shield lasts for 2 turn(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/b970b14752922ce1b95f27a4f630d710_146676646089303252.png', 30, 4, 7),
	(154, 'Call of the Guardian', 'After using Technique, at the start of the next battle, gains a Shield that absorbs DMG equal to 30% of the Trailblazer\'s DEF plus 384 for 1 turn(s).', 0, 0, 0, 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/01e8264c9753114882121abd24b25a9a_9048276669569333820.png', 30, 5, 5);

-- Listage de la structure de table srw_loic. ascend
CREATE TABLE IF NOT EXISTS `ascend` (
  `id_ascend` int NOT NULL AUTO_INCREMENT,
  `capLvl` int DEFAULT NULL,
  `nbr` int NOT NULL,
  PRIMARY KEY (`id_ascend`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='To overcap the lvl limit\r\n';

-- Listage des données de la table srw_loic.ascend : ~9 rows (environ)
INSERT INTO `ascend` (`id_ascend`, `capLvl`, `nbr`) VALUES
	(1, 0, 1),
	(2, 20, 2),
	(3, 30, 3),
	(4, 40, 4),
	(5, 50, 5),
	(6, 60, 6),
	(7, 70, 7),
	(8, 75, 7),
	(9, 80, 7);

-- Listage de la structure de table srw_loic. combattype
CREATE TABLE IF NOT EXISTS `combattype` (
  `id_combatType` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_combatType`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='combatType = character''s element';

-- Listage des données de la table srw_loic.combattype : ~7 rows (environ)
INSERT INTO `combattype` (`id_combatType`, `type`) VALUES
	(1, 'Physical'),
	(2, 'Fire'),
	(3, 'Ice'),
	(4, 'Lightning'),
	(5, 'Wind'),
	(6, 'Quantum'),
	(7, 'Imaginary');

-- Listage de la structure de table srw_loic. comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `dateCreate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trailblazer_id` int DEFAULT '0',
  `playableCharacter_id` int DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `trailblazer_id` (`trailblazer_id`),
  KEY `playableCharacter_id` (`playableCharacter_id`),
  CONSTRAINT `FK-comment_playableCharacter_id` FOREIGN KEY (`playableCharacter_id`) REFERENCES `playablecharacter` (`id_playableCharacter`) ON DELETE SET NULL,
  CONSTRAINT `FK-comment_trailblazer` FOREIGN KEY (`trailblazer_id`) REFERENCES `trailblazer` (`id_trailblazer`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COMMENT='character comment';

-- Listage des données de la table srw_loic.comment : ~7 rows (environ)
INSERT INTO `comment` (`id_comment`, `text`, `dateCreate`, `trailblazer_id`, `playableCharacter_id`) VALUES
	(7, 'a', '2023-09-19 15:41:35', 2, 5),
	(8, 'aaaaaaaaaaaaaaaaaaaaaaaa', '2023-09-19 15:48:04', 2, 5),
	(16, 'a', '2023-09-25 15:34:35', 3, 13),
	(17, 'a', '2023-09-25 15:34:36', 3, 13),
	(18, 'a', '2023-09-25 15:34:38', 3, 13),
	(19, 'a', '2023-09-25 15:34:39', 3, 13),
	(20, 'a', '2023-09-25 15:34:40', 3, 13);

-- Listage de la structure de table srw_loic. eidolon
CREATE TABLE IF NOT EXISTS `eidolon` (
  `id_eidolon` int NOT NULL AUTO_INCREMENT,
  `nbr` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `effect` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `playableCharacter_id` int NOT NULL,
  PRIMARY KEY (`id_eidolon`),
  KEY `character_id` (`playableCharacter_id`) USING BTREE,
  CONSTRAINT `FK-eidolon_playableCharacter` FOREIGN KEY (`playableCharacter_id`) REFERENCES `playablecharacter` (`id_playableCharacter`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1 COMMENT='eidolon = own passive skill tree';

-- Listage des données de la table srw_loic.eidolon : ~180 rows (environ)
INSERT INTO `eidolon` (`id_eidolon`, `nbr`, `name`, `effect`, `icon`, `playableCharacter_id`) VALUES
	(1, 1, 'Chilhood', 'After "Victory Rush" is triggered, Himeko\'s SPD increases by 20% for 2 turn(s).', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/5055f0d7efe7a6a0a7ab8643326c85d9_7226258822720332319.png', 1),
	(2, 2, 'Convergence', 'Deals 15% more DMG to enemies whose HP percentage is 50% or less.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/9c81b39d06d7b2e4f218d273e1f70eec_244646985592578051.png', 1),
	(3, 3, 'Poised', 'Skill Lv. +2, up to a maximum of Lv. 15 / Basic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/11d2ae7bbded23ca045ba40f3e63d970_1518491488393966864.png', 1),
	(4, 4, 'Dedication', 'When Himeko\'s Skill inflicts Weakness Break on an enemy, she gains 1 extra point(s) of Charge.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/706e50425fc52e5611db2eab1f605c1e_6006020162466853659.png', 1),
	(5, 5, 'Aspiration', 'Ultimate Lv. +2, up to a maximum of Lv. 15 / Talent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ec6121ff3e0894c51a8cc053131ef985_244646985592578051.png', 1),
	(6, 6, 'Trailblaze!', 'Ultimate deals DMG 2 extra times, each of which deals Fire DMG equal to 40% of the original DMG to a random enemy.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/987a996c0d08eb95f03125f856295357_6006020162466853659.png', 1),
	(7, 1, 'To the Bitter End', 'When HP is lower than or equal to 50% of Max HP, increases Skill\'s DMG by 10%.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7b53600572dbb577e9103911f9cbead7_2317460015917781615.png', 13),
	(8, 2, 'Breaking Free', 'Using Skill or Ultimate removes 1 debuff from oneself.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ae02d81d379f1659907dbe01eaef6f7b_5648732020738209033.png', 13),
	(9, 3, 'Power Through', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d8c555f7f9f47b610f2a4b84678df64b_6744481196927712577.png', 13),
	(10, 4, 'Turn the Tables', 'When struck by a killing blow after entering battle, instead of becoming knocked down, Arlan immediately restores his HP to 25% of his Max HP. This effect is automatically removed after it is triggered once or after 2 turn(s) have elapsed.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/68943f53201adb5fb9c0a504013ad878_4612350141163240852.png', 13),
	(11, 5, 'Hammer and Tongs', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/c1b168912e77cc9c91e1bce2eea9f36e_207187916340708054.png', 13),
	(12, 6, 'Self-Sacrifice', 'When HP drops to 50% or below, Ultimate deals 20% more DMG. The DMG multiplier of DMG taken by the target enemy now applies to adjacent enemies as well.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/67eb54c3e7dad91bc09b80036ecad201_889988161859419353.png', 13),
	(13, 1, 'The Higher You Fly, the Harder You Fall', 'When the target enemy\'s current HP percentage is greater than or equal to 50%, CRIT Rate increases by 12%.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7881890e393b7dc872fcb6fc954ec12a_1746652745667222531.png', 5),
	(14, 2, 'Quell the Venom Octet, Quench the Vice O\'Flame', 'Reduces Talent cooldown by 1 turn.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/01e8258d8e4b33d12fa83b586531094b_1746652745667222531.png', 5),
	(15, 3, 'Seen and Unseen', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/6df4fcd5c070d21e9ff9cd64fb1594da_1518491488393966864.png', 5),
	(16, 4, 'Roaring Dragon and Soaring Sun', 'When Dan Heng uses his Ultimate to defeat an enemy, he will immediately take action again.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/4e43d523fa7f247a76994aadd8f6abf5_4125643631056849026.png', 5),
	(17, 5, 'A Drop of Rain Feeds a Torrent', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/06e5fe5d47f9ba7ae0c0d437c64d7b53_911755937249800616.png', 5),
	(18, 6, 'The Troubled Soul Lies in Wait', 'The Slow state triggered by Skill reduces the enemy\'s SPD by an extra 8%.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/c163aecc6f8d93fca92d3d1295f1544c_911755937249800616.png', 5),
	(19, 1, 'Star Sings Sans Verses or Vocals', 'When using Skill, deals DMG for 1 extra time to a random enemy.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/27cae19d9e727fef1f72eaa45ac023f9_1895058517391226750.png', 14),
	(20, 2, 'Moon Speaks in Wax and Wane', 'After using her Ultimate, Asta\'s Charging stacks will not be reduced in the next turn.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7b84164bd56bc11e8ca391463e57607d_4039909671596872526.png', 14),
	(21, 3, 'Meteor Showers for Wish and Want', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/536e884bd14b5217fcefe8369235ebd6_2196928527429176668.png', 14),
	(22, 4, 'Aurora Basks in Beauty and Bliss', 'Asta\'s Energy Regeneration Rate increases by 15% when she has 2 or more Charging stacks.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ae65b049d5faa00f2767cefd98b59d59_4039909671596872526.png', 14),
	(23, 5, 'Nebula Secludes in Runes and Riddles', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/2a92841afdb6db46cc06f5ebeeb7f2c8_6483244968225008309.png', 14),
	(24, 6, 'Galaxy Dreams in Calm and Comfort', 'Charging stack(s) lost in each turn is reduced by 1.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/001017730a1109773efd5cc107b8e9ad_8443840165033391053.png', 14),
	(25, 1, 'Ambrosial Aqua', 'If the target ally\'s current HP is equal to their Max HP when Invigoration ends, regenerates 8 extra Energy for this target.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/8bba6963265c1fa52db786f3f9c6dda4_4846210512706640419.png', 7),
	(26, 2, 'Sylphic Slumber', 'After using her Ultimate, Bailu\'s Outgoing Healing increases by an additional 15% for 2 turn(s).', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/c0f0be44cf061d8e12e75eed72e5e7ab_4846210512706640419.png', 7),
	(27, 3, 'Omniscient Opulence', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/2b5561d50c125d2431a00ead461fa8e8_666503982731773378.png', 7),
	(28, 4, 'Evil Excision', 'Every healing provided by the Skill makes the recipient deal 10% more DMG for 2 turn(s). This effect can stack up to 3 time(s).', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/8eefb53f2b5f8d424dcde918742f9121_8397957194455769533.png', 7),
	(29, 5, 'Waning Worries', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/2a1cf842ff8ac7a379e0ceabd5602e70_7937705608936377574.png', 7),
	(30, 6, 'Drooling Drop of Draconic Divinity', 'Bailu can heal allies who received a killing blow 1 more time(s) in a single battle.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/b80857afaee9194b757441b5834a7f05_8397957194455769533.png', 7),
	(31, 1, 'Blade Cuts the Deepest in Hell', 'Blade\'s Ultimate deals additionally increased DMG to a single enemy target, with the increased amount equal to 150% of Blade\'s total HP loss in the current battle.\r\nThe total HP Blade has lost in the current battle is capped at 90% of his Max HP. This value will be reset and re-accumulated after his Ultimate has been used.', 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/277f38331088c0da03c9c4bf65a8536b_5000139623176627188.png', 3),
	(32, 2, 'Ten Thousand Sorrows From One Broken Dream', 'When Blade is in the Hellscape state, his CRIT Rate increases by 15%.', 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/3c951315363a510b6e57a92b3a42b42f_6152652043462430589.png', 3),
	(33, 3, 'Hardened Blade Bleeds Coldest Shade', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/7392bbe137436f1b1309cd5d780b3625_8328538768147720807.png', 3),
	(34, 4, 'Rejected by Death, Infected With Life', 'When Blade\'s current HP drops to 50% or lower of his Max HP, increases his Max HP by 20%. Stacks up to 2 time(s).', 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/fecfa36b5db6b58a5011af636ae2fb08_5775987058057303053.png', 3),
	(35, 5, 'Death By Ten Lords\' Gaze', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/e616f8379d57dbbeb76d8e1a38e38665_1543515104780732169.png', 3),
	(36, 6, 'Reborn Into an Empty Husk', 'The maximum number of Charge stacks is reduced to 4. The DMG of the follow-up attack triggered by Blade\'s Talent additionally increases by 50% of his Max HP.', 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/07/18/5308864/88605bc08c8ca58cba58ebc2fa9d7a5d_5945295101868649507.png', 3),
	(37, 1, 'Hone Your Strength', 'When using Skill, there is 50% fixed chance of recovering 1 Skill Point. This effect has a 1-turn cooldown.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/126c3b9d181820c55bf7b71c782fa035_7297596633404176675.png', 11),
	(38, 2, 'Quick March', 'When using Skill, the target ally\'s SPD increases by 30% after taking action, lasting for 1 turn.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/cfa4394b814be851726e3e300a04ec21_8897508852385138594.png', 11),
	(39, 3, 'Bombardment', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/638108d773ad540cb227822f9bd008e5_5991972744052607848.png', 11),
	(40, 4, 'Take by Surprise', 'After an ally other than Bronya uses Basic ATK on an enemy with Wind Weakness, Bronya immediately launches a follow-up attack on the target, dealing Wind DMG equal to 80% of Bronya\'s Basic ATK DMG. This effect can only be triggered 1 time per turn.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/755f741c42617d85710730d3e9191bdc_8897508852385138594.png', 11),
	(41, 5, 'Unstoppable', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/3dbed434d0e3bd7ed504fa99bfcea9f7_2934588988406802098.png', 11),
	(42, 6, 'Piercing Rainbow', 'The duration of the DMG Boost effect placed by the Skill on the target ally increases by 1 turn(s).', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/374f00212f11662e2302d56ee19358f0_1531343573592924769.png', 11),
	(43, 1, 'A Tall Figure', 'Using Skill will not remove Marks of Counter on the enemy.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/ee7b1e2bb5a7841195f13c0ecc8621a1_7275694641237708807.png', 22),
	(44, 2, 'A Tight Embrace', 'After using the Ultimate, ATK increases by 30% for 2 turn(s).', 'https://upload-static.hoyoverse.com/hoyolab-wiki/2023/03/17/5308864/6edd7ab79b31a018c8ccddc66e1e8346_5737902471066724528.png', 22),
	(45, 3, 'Cold Steel Armor', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/68145c294d2463472fabf8407960365d_7228753759322171863.png', 22),
	(46, 4, 'Family\'s Warmth', 'After Clara is hit, the DMG taken by Clara is reduced by 30%. This effect lasts until the start of her next turn.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/b26df9619f39c03fbb49503d9bcdb156_2854537462043295677.png', 22),
	(47, 5, 'A Small Promise', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/e659f2d510bf6a552c82724fcc7c633d_7858461979939016923.png', 22),
	(48, 6, 'Long Company', 'After other allies are hit, Svarog also has a 50% fixed chance to trigger a Counter on the attacker and mark them with a Mark of Counter. When using Ultimate, the number of Enhanced Counters increases by 1.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/b3f9c13be4fe837d88edc605ac3bf529_7858461979939016923.png', 22),
	(49, 1, 'Due Diligence', 'When using Skill, increases the base chance to Freeze enemies by 35%.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/cbdcf8fd8d564b5f633926e56b2660c8_7460344659616510194.png', 10),
	(50, 2, 'Lingering Cold', 'After an enemy Frozen by Skill is unfrozen, their SPD is reduced by 20% for 1 turn(s).', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/13016470d0e202a8c427ce58cbb86667_4934884593954878237.png', 10),
	(51, 3, 'Never Surrender', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/6ae7a1aedecffcd3ff81b5f22c0926d8_5708703248236612710.png', 10),
	(52, 4, 'Faith Moves Mountains', 'When Gepard is in battle, all allies\' Effect RES increases by 20%.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7704e78e0a77ca813e6f252d2f9ccbf6_4934884593954878237.png', 10),
	(53, 5, 'Cold Iron Fist', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/d38b4c2bef7bd12928c9ddd661101612_7460344659616510194.png', 10),
	(54, 6, 'Unyielding Resolve', 'When his Talent is triggered, Gepard immediately takes action again and restores extra HP equal to 50% of his Max HP.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/1b3cc58c059cbdad4e5fe8f8e730637a_5031578313293207366.png', 10),
	(55, 1, 'Kick You When You\'re Down', 'If the enemy\'s HP percentage is at 50% or less, Herta\'s Basic ATK deals Additional Ice DMG equal to 40% of Herta\'s ATK.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/dba51e18b1ecf22eb9e7b4f22403cd28_8769843336475300403.png', 15),
	(56, 2, 'Keep the Ball Rolling', 'Every time Talent is triggered, this character\'s CRIT Rate increases by 3%. This effect can stack up to 5 time(s).', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/839957b081c952d89045145e723caf01_8685443574379551565.png', 15),
	(57, 3, 'That\'s the Kind of Girl I Am', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/792d45104363047ccf319840de46e519_826024787053386357.png', 15),
	(58, 4, 'Hit Where It Hurts', 'When Talent is triggered, DMG increases by 10%.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/87dbeeb8980a35626a7477a51113741c_4336635309391699200.png', 15),
	(59, 5, 'Cuss Big or Cuss Nothing', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/e3547f7c51d2c93a27c09d826a5c63e0_826024787053386357.png', 15),
	(60, 6, 'No One Can Betray Me', 'After using Ultimate, this character\'s ATK increases by 25% for 1 turn(s).', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/bb96544142a620b1130e99a74e82e6f1_8769843336475300403.png', 15),
	(61, 1, 'Early to Bed, Early to Rise', 'Enhanced Skill deals 20% increased DMG.', '', 16),
	(62, 2, 'Happy Tummy, Happy Body', 'Extends the duration of Burn caused by Skill by 1 turn(s).', NULL, 16),
	(63, 3, 'Don\'t Be Picky, Nothing\'s Icky', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 16),
	(64, 4, 'It\'s Okay to Not Know', 'When Talent is triggered, there is a 100% base chance to Burn enemies adjacent to the target enemy, equivalent to that of Skill.', NULL, 16),
	(65, 5, 'Let the Moles\' Deeds Be Known', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 16),
	(66, 6, 'Always Ready to Punch and Kick', 'Hook deals 20% more DMG to enemies afflicted with Burn.', NULL, 16),
	(67, 1, 'Slash, Seas Split', 'When Lightning-Lord attacks, the DMG multiplier on enemies adjacent to the target enemy increases by an extra amount equal to 25% of the DMG multiplier against the target enemy.', NULL, 8),
	(68, 2, 'Swing, Skies Squashed', 'After Lightning-Lord takes action, DMG caused by Jing Yuan\'s Basic ATK, Skill, and Ultimate increases by 20% for 2 turn(s).', NULL, 8),
	(69, 3, 'Strike, Suns Subdued', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 8),
	(70, 4, 'Spin, Stars Sieged', 'For each hit performed by the Lightning-Lord when it takes action, Jing Yuan regenerates 2 Energy.', NULL, 8),
	(71, 5, 'Stride, Spoils Seized', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 8),
	(72, 6, 'Sweep, Souls Slain', 'Each hit performed by the Lightning-Lord when it takes action will make the target enemy Vulnerable.\r\nWhile Vulnerable, enemies receive 12% more DMG until the end of the Lightning-Lord\'s current turn, stacking up to 3 time(s).', NULL, 8),
	(73, 1, 'Da Capo', 'When the Talent triggers a follow-up attack, there is a 100% base chance to increase the DoT received by the target by 30% for 2 turn(s).', NULL, 4),
	(74, 2, 'Fortississimo', 'While Kafka is on the field, DoT dealt by all allies increases by 25%.', NULL, 4),
	(75, 3, 'Capriccio', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 4),
	(76, 4, 'Recitativo', 'When an enemy target takes DMG from the Shock status inflicted by Kafka, Kafka additionally regenerates 2 Energy.', NULL, 4),
	(77, 5, 'Doloroso', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 4),
	(78, 6, 'Leggiero', 'The Shock inflicted on the enemy target by the Ultimate, the Technique, or the Talent-triggered follow-up attack has a DMG multiplier increase of 156% and lasts 1 turn(s) longer.', NULL, 4),
	(79, 1, 'Fighting Endlessly', 'When Luka takes action, if the target enemy is Bleeding, increases DMG dealt by Luka by 15% for 2 turn(s).', NULL, 17),
	(80, 2, 'The Enemy is Weak, I am Strong', 'If the Skill hits an enemy target with Physical Weakness, gain 1 stack(s) of Fighting Will.', NULL, 17),
	(81, 3, 'Born for the Ring', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 17),
	(82, 4, 'Never Turning Back', 'For every stack of Fighting Will obtained, increases ATK by 5%, stacking up to 4 time(s).', NULL, 17),
	(83, 5, 'The Spirit of Wildfire', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 17),
	(84, 6, 'A Champion\'s Applause', 'After the Enhanced Basic ATK\'s "Rising Uppercut" hits a Bleeding enemy target, the Bleed status will immediately deal DMG 1 time equal to 8% of the original DMG for every hit of Direct Punch already unleashed during the current Enhanced Basic ATK.', NULL, 17),
	(85, 1, 'Ablution of the Quick', 'While the Field is active, ATK of all allies increases by 20%.', NULL, 27),
	(86, 2, 'Bestowal From the Pure', 'When his Skill is triggered, if the target ally\'s HP is lower than 50%, Luocha\'s Outgoing Healing increases by 30%. If the target ally\'s HP is at 50% or higher, the ally receives a Shield that can absorb DMG equal to 10% of Luocha\'s ATK plus 240, lasting for 2 turns.', NULL, 27),
	(87, 3, 'Surveyal by the Fool', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 27),
	(88, 4, 'Heavy Lies the Crown', 'When Luocha\'s Field is active, enemies become Weakened and deal 12% less DMG.', NULL, 27),
	(89, 5, 'Cicatrix \'Neath the Pain', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 27),
	(90, 6, 'Reunion With the Dust', 'When Ultimate is used, there is a 100% fixed chance to reduce all enemies\' All-Type RES by 20% for 2 turn(s).', NULL, 27),
	(91, 1, 'Memory of You', 'Every time March 7th\'s Ultimate Freezes a target, she regenerates 6 Energy.', NULL, 2),
	(92, 2, 'Memory of It', 'Upon entering battle, grants a Shield equal to 24% of March 7th\'s DEF plus 320 to the ally with the lowest HP percentage, lasting for 3 turn(s).', NULL, 2),
	(93, 3, 'Memory of Everything', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 2),
	(94, 4, 'Never Forfeit Again', 'The Talent\'s Counter effect can be triggered 1 more time in each turn. The DMG dealt by Counter increases by an amount that is equal to 30% of March 7th\'s DEF.', NULL, 2),
	(95, 5, 'Never Forget Again', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 2),
	(96, 6, 'Just Like This, Always...', 'Allies under the protection of the Shield granted by the Skill restores HP equal to 4% of their Max HP plus 106 at the beginning of each turn.', NULL, 2),
	(97, 1, 'Pharmacology Expertise', 'After being attacked, if the current HP percentage is 30% or lower, heals self for 1 time to restore HP by an amount equal to 15% of Max HP plus 400. This effect can only be triggered 1 time per battle.', NULL, 18),
	(98, 2, 'Clinical Research', 'When Natasha uses her Ultimate, grant continuous healing for 1 turn(s) to all allies whose HP is at 30% or lower. And at the beginning of their turn, their HP is restored by an amount equal to 6% of Natasha\'s Max HP plus 160.', NULL, 18),
	(99, 3, 'The Right Cure', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 18),
	(100, 4, 'Miracle Cure', 'After being attacked, regenerates 5 extra Energy.', NULL, 18),
	(101, 5, 'Preventive Treatment', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 18),
	(102, 6, 'Doctor\'s Grace', 'Natasha\'s Basic ATK deals Additional Physical DMG equal to 40% of her Max HP.', NULL, 18),
	(103, 1, 'Victory Report', 'When an enemy is defeated, Pela regenerates 5 Energy.', NULL, 19),
	(104, 2, 'Adamant Charge', 'Using Skill to remove buff(s) increases SPD by 10% for 2 turn(s).', NULL, 19),
	(105, 3, 'Suppressive Force', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 19),
	(106, 4, 'Full Analysis', 'When using Skill, there is a 100% base chance to reduce the target enemy\'s Ice RES by 12% for 2 turn(s).', NULL, 19),
	(107, 5, 'Absolute Jeopardy', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 19),
	(108, 6, 'Feeble Pursuit', 'When Pela attacks a debuffed enemy, she deals Additional Ice DMG equal to 40% of Pela\'s ATK to the enemy.', NULL, 19),
	(109, 1, 'Rise Through the Tiles', 'Ultimate deals 10% more DMG.', NULL, 23),
	(110, 2, 'Sleep on the Tiles', 'Every time Draw Tile is triggered, Qingque immediately regenerates 1 Energy.', NULL, 23),
	(111, 3, 'Read Between the Tiles', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 23),
	(112, 4, 'Right on the Tiles', 'After this character\'s Skill is used, there is a 24% fixed chance to gain Autarky, which lasts until the end of the current turn.\r\nWith Autarky, using Basic ATK or Enhanced Basic ATK immediately launches 1 follow-up attack on the same target, dealing Quantum DMG equal to 100% of the previous Basic ATK (or Enhanced Basic ATK)\'s DMG.', NULL, 23),
	(113, 5, 'Gambit for the Tiles', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 23),
	(114, 6, 'Prevail Beyond the Tiles', 'Recovers 1 Skill Point after using Enhanced Basic ATK.', NULL, 23),
	(115, 1, 'Rising Love', 'When using Skill, deals DMG for 1 extra time(s) to a random enemy.', NULL, 20),
	(116, 2, 'Infectious Enthusiasm', 'Defeating an enemy with Wind Shear has a 100% base chance to inflict all enemies with 1 stack(s) of Wind Shear, equivalent to the Talent\'s Wind Shear.', NULL, 20),
	(117, 3, 'Big Money!', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 20),
	(118, 4, 'The Deeper the Love, the Stronger the Hate', 'When Skill hits an enemy with 5 or more stack(s) of Wind Shear, the enemy immediately takes 8% of current Wind Shear DMG.', NULL, 20),
	(119, 5, 'Huuuuge Money!', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 20),
	(120, 6, '	Increased Spending', 'Talent\'s Wind Shear DMG multiplier increases by 15%.', NULL, 20),
	(121, 1, 'Extirpating Slash', 'When dealing DMG to an enemy whose HP percentage is 80% or lower, CRIT Rate increases by 15%.', NULL, 9),
	(122, 2, 'Dancing Butterfly', 'The SPD Boost effect of Seele\'s Skill can stack up to 2 time(s).', NULL, 9),
	(123, 3, 'Dazzling Tumult', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 9),
	(124, 4, 'Flitting Phantasm', 'Seele regenerates 15 Energy when she defeats an enemy.', NULL, 9),
	(125, 5, 'Piercing Shards', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 9),
	(126, 6, 'Shattering Shambles', 'After Seele uses her Ultimate, inflict the target enemy with Butterfly Flurry for 1 turn(s). Enemies suffering from Butterfly Flurry will take Additional Quantum DMG equal to 15% of Seele\'s Ultimate DMG every time they are attacked. If the target enemy is defeated by the Butterfly Flurry DMG triggered by other allies\' attacks, Seele\'s Talent will not be triggered.\r\nWhen Seele is knocked down, the Butterfly Flurry inflicted on the enemies will be removed.', NULL, 9),
	(127, 1, 'Echo Chamber', 'Basic ATK deals Lightning DMG equal to 60% of the Basic ATK\'s DMG to a random enemy adjacent to the target of the Basic ATK.', NULL, 21),
	(128, 2, 'Encore!', 'Every time Serval\'s Talent is triggered to deal Additional DMG, she regenerates 4 Energy.', NULL, 21),
	(129, 3, 'Listen, the Heartbeat of the Gears', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 21),
	(130, 4, 'Make Some Noise!', 'Ultimate has a 100% base chance to apply Shock to any enemies not currently Shocked. This Shock has the same effects as the one applied by Skill.', NULL, 21),
	(131, 5, 'Belobog\'s Loudest Roar!', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 21),
	(132, 6, 'This Song Rocks to Heaven!', 'Serval deals 30% more DMG to Shocked enemies.', NULL, 21),
	(133, 1, 'Social Engineering', 'After using her Ultimate to attack enemies, Silver Wolf regenerates 7 Energy for every debuff that the target enemy currently has. This effect can be triggered up to 5 time(s) in each use of her Ultimate.', NULL, 12),
	(134, 2, 'Zombie Network', 'When an enemy enters battle, reduces their Effect RES by 20%.', NULL, 12),
	(135, 3, 'Payload', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 12),
	(136, 4, 'Bounce Attack', 'After using her Ultimate to attack enemies, deals Additional Quantum DMG equal to 20% of Silver Wolf\'s ATK for every debuff currently on the enemy target. This effect can be triggered for a maximum of 5 time(s) during each use of her Ultimate.', NULL, 12),
	(137, 5, 'Brute Force Attack', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 12),
	(138, 6, 'Overlay Network', 'For every debuff the target enemy has, the DMG dealt by Silver Wolf increases by 20%, up to a limit of 100%.', NULL, 12),
	(139, 1, 'Cut With Ease', 'After using Skill against a Weakness Broken enemy, regenerates 1 Skill Point.', NULL, 24),
	(140, 2, 'Refine in Toil', 'After triggering Sword Stance, the DMG taken by Sushang is reduced by 20% for 1 turn.', NULL, 24),
	(141, 3, 'Rise From Fame', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 24),
	(142, 4, 'Cleave With Heart', 'Sushang\'s Break Effect increases by 40%.', NULL, 24),
	(143, 5, 'Prevail via Taixu', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 24),
	(144, 6, 'Dwell Like Water', 'Talent\'s SPD Boost is stackable and can stack up to 2 times. Additionally, after entering battle, Sushang immediately gains 1 stack of her Talent\'s SPD Boost.', NULL, 24),
	(145, 1, 'Windfall of Lucky Springs', 'After using their Ultimate, the ally with Benediction gains a 12% increase in SPD for 1 turn.', NULL, 25),
	(146, 2, 'Gainfully Gives, Givingly Gains', 'The ally with Benediction regenerates 5 Energy after defeating an enemy. This effect can only be triggered once per turn.', NULL, 25),
	(147, 3, 'Halcyon Bequest', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 25),
	(148, 4, 'Jovial Versatility', 'The DMG multiplier provided by Benediction increases by 20%.', NULL, 25),
	(149, 5, 'Sauntering Coquette', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 25),
	(150, 6, 'Peace Brings Wealth to All', 'Ultimate regenerates 10 more Energy for the target ally.', NULL, 25),
	(151, 1, 'Legacy of Honor', 'After Welt uses his Ultimate, his abilities are enhanced. The next 2 time(s) he uses his Basic ATK or Skill, deals Additional DMG to the target equal to 50% of his Basic ATK\'s DMG multiplier or 80% of his Skill\'s DMG multiplier respectively.', NULL, 6),
	(152, 2, 'Conflux of Stars', 'When his Talent is triggered, Welt regenerates 3 Energy.', NULL, 6),
	(153, 3, 'Prayer of Peace', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 6),
	(154, 4, 'Appellation of Justice', 'Base chance for Skill to inflict SPD Reduction increases by 35%.', NULL, 6),
	(155, 5, 'Power of Kindness', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 6),
	(156, 6, 'Prospect of Glory', 'When using Skill, deals DMG for 1 extra time to a random enemy.', NULL, 6),
	(157, 1, 'Svelte Saber', 'When Yanqing attacks a Frozen enemy, he deals Additional Ice DMG equal to 60% of his ATK.', NULL, 28),
	(158, 2, 'Supine Serenade', 'When Soulsteel Sync is active, Energy Regeneration Rate increases by an extra 10%.', NULL, 28),
	(159, 3, 'Sword Savant', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 28),
	(160, 4, 'Searing Sting', 'When the current HP percentage is 80% or higher, Ice RES PEN increases by 12%', NULL, 28),
	(161, 5, 'Surging Strife', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 28),
	(162, 6, 'Swift Swoop', 'If the Ultimate\'s buffs are still in effect when an enemy is defeated, their duration is extended by 1 turn.', NULL, 28),
	(163, 1, 'Aerial Marshal', 'At the start of battle, increases the SPD of all allies by 10% for 2 turn(s).', NULL, 26),
	(164, 2, 'Skyward Command', 'When any ally\'s current energy is equal to its energy limit, Yukong regenerates an additional 5 energy. This effect can only be triggered once for each ally. The trigger count is reset after Yukong casts her Ultimate.', NULL, 26),
	(165, 3, '	Torrential Fusillade', 'Skill Lv. +2, up to a maximum of Lv. 15. Basic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 26),
	(166, 4, 'Zephyrean Echoes', 'When "Roaring Bowstrings" is active, Yukong deals 30% more DMG to enemies.', NULL, 26),
	(167, 5, 'August Deadshot', 'Ultimate Lv. +2, up to a maximum of Lv. 15. Talent Lv. +2, up to a maximum of Lv. 15.', NULL, 26),
	(168, 6, 'Bowstring Thunderclap', 'When Yukong uses her Ultimate, she immediately gains 1 stack(s) of "Roaring Bowstrings."', NULL, 26),
	(169, 1, 'A Falling Star', 'When enemies are defeated due to the Trailblazer\'s Ultimate, the Trailblazer regenerates 10 extra Energy. This effect can only be triggered once per attack.', NULL, 29),
	(170, 2, 'An Unwilling Host', 'Attacking enemies with Physical Weakness restores the Trailblazer\'s HP equal to 5% of the Trailblazer\'s ATK.', NULL, 29),
	(171, 3, 'A Leading Whisper', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 29),
	(172, 4, 'A Destructing Glance', 'When attacking an enemy with Weakness Break, CRIT Rate is increased by 25%.', NULL, 29),
	(173, 5, 'A Surviving Hope', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 29),
	(174, 6, 'A Trailblazing Will', 'The Trailblazer\'s Talent is also triggered when they defeat an enemy.', NULL, 29),
	(175, 1, 'Earth-Shaking Resonance', 'When the Trailblazer uses their Basic ATK, additionally deals Fire DMG equal to 25% of the Trailblazer\'s DEF. When the Trailblazer uses their enhanced Basic ATK, deal Fire Additional DMG equal to 50% of the Trailblazer\'s DEF.', NULL, 30),
	(176, 2, 'Time-Defying Tenacity', 'The Shield applied to all allies from the Trailblazer\'s Talent will block extra DMG equal to 2% of the Trailblazer\'s DEF plus 27.', NULL, 30),
	(177, 3, 'Trail-Blazing Blueprint', 'Skill Lv. +2, up to a maximum of Lv. 15.\r\nTalent Lv. +2, up to a maximum of Lv. 15.', NULL, 30),
	(178, 4, 'Nation-Building Oath', 'At the start of the battle, immediately gains 4 stack(s) of Magma Will.', NULL, 30),
	(179, 5, 'Spirit-Warming Flame', 'Ultimate Lv. +2, up to a maximum of Lv. 15.\r\nBasic ATK Lv. +1, up to a maximum of Lv. 10.', NULL, 30),
	(180, 6, 'City-Forging Bulwarks', 'After the Trailblazer use enhanced Basic ATK or Ultimate, their DEF increases by 10%. Stacks up to 3 time(s).', NULL, 30);

-- Listage de la structure de table srw_loic. path
CREATE TABLE IF NOT EXISTS `path` (
  `id_path` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_path`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='path = archetype of a character';

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
  `introduction` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `combatType_id` int NOT NULL,
  `path_id` int NOT NULL,
  PRIMARY KEY (`id_playableCharacter`) USING BTREE,
  KEY `combatType_id` (`combatType_id`),
  KEY `path_id` (`path_id`),
  CONSTRAINT `FK-playableCharacter_combatType` FOREIGN KEY (`combatType_id`) REFERENCES `combattype` (`id_combatType`),
  CONSTRAINT `FK-playableCharacter_path` FOREIGN KEY (`path_id`) REFERENCES `path` (`id_path`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.playablecharacter : ~30 rows (environ)
INSERT INTO `playablecharacter` (`id_playableCharacter`, `name`, `image`, `rarity`, `sex`, `specie`, `faction`, `world`, `quote`, `releaseDate`, `introduction`, `combatType_id`, `path_id`) VALUES
	(1, 'Himeko', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Himeko-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'The Nameless', 'Astal Express', 'Alright, crew! This world is the target of our next trailblazing expedition!', '2023-04-26', 'An adventurous scientist who encountered and repaired a stranded train as a child, she now ventures across the universe with the Astral Express as its navigator. She is also an Emanator of the Trailblaze.', 2, 3),
	(2, 'March 7th', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-March-7th-Splash-Art-1024x877.png', 4, 'Female', '???', 'The Nameless', 'Astral Express', 'Well would you listen to that! I saved everyone without causing any trouble! You\'re pretty awesome, March 7th!', '2023-04-26', 'An enthusiastic girl who was saved from eternal ice by the Astral Express Crew, and has the unique ability of being able to use "Six-Phased Ice." When she awoke, she knew nothing of herself or her past, and decided to name herself after the date of her rebirth, "March 7th." She takes many photos using her camera in hopes of discovering a memento from her past.', 3, 6),
	(3, 'Blade', 'https://expertgamereviews.com/wp-content/uploads/2023/07/Honkai-Star-Rail-Blade-Splash-Art-1024x877.png', 5, 'Male', 'Xianzhou Native', 'Stellaron Hunter', '???', 'When will death come for me? My patience is wearing thin.', '2023-07-19', 'A member of the Stellaron Hunters and a swordsman who abandoned his body to become a blade. He pledges loyalty to Destiny\'s Slave and possesses a terrifying self-healing ability.', 5, 1),
	(4, 'Kafka', 'https://expertgamereviews.com/wp-content/uploads/2023/08/Honkai-Star-Rail-Kafka-Splash-Art-768x658.png', 5, 'Female', 'Human', 'Stellaron Hunter', 'Pteruges-V', 'You won\'t remember a thing except me.', '2023-08-09', 'A member of the Stellaron Hunters who is calm, collected, and beautiful. Her record on the wanted list of the Interastral Peace Corporation only lists her name and her hobby. People have always imagined her to be elegant, respectable, and in pursuit of things of beauty even in combat.', 4, 5),
	(5, 'Dan Heng', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Dan-Heng-Splash-Art-1024x877.png', 4, 'Male', 'Vidyadhara', 'The Nameless', 'The Xianzhou Luofu', 'Even as we speak, farewells are happening throughout the universe. The grief that we share is real, but there\'s nothing special about it.', '2023-04-26', 'The cold and reserved train guard and archivist of the Astral Express. Wielding a spear named Cloud-Piercer, he joined the Express crew to escape his secluded past.', 5, 2),
	(6, 'Welt', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Welt-Splash-Art-1024x877.png', 5, 'Male', 'Human', 'The Nameless', 'Astral Express', 'The galaxy is vast beyond compare, containing an infinite number of possibilities. An individual\'s fate shouldn\'t be limited to a single path ordained by heaven', '2023-04-26', 'An animator by trade, Welt is a seasoned member of the Astral Express Crew and the former sovereign of Anti-Entropy who has saved Earth from annihilation time and time again. He inherited the name of the world, "Welt."', 7, 5),
	(7, 'Bailu', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Bailu-Splash-Art-1024x877.png', 5, 'Female', 'Vidyadhara', 'Alchemy Commission', 'The Xianzhou Luofu', 'Lunch is like medicine — it has to have the right balance of ingredients. Two smoked patties and a cup of milk tea is a great way to heal your heart and lift your spirits!', '2023-04-26', 'The vivacious High Elder of the Vidyadhara, also known as the "Healer Lady" in the Xianzhou Luofu who always tries to escape from the Alchemy Commission. Although her skills and knowledge in medicine know no bounds, she often prescribes unconventional remedies.', 4, 7),
	(8, 'Jing Yuan', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Jing-Yuan-Splash-Art-1024x877.png', 5, 'Male', 'Xianzhou Native', 'Cloud Knights', 'The Xianzhou Luofu', 'A truly masterful chess player has no brilliant moves. People clamor excitedly over displays of extreme cunning, forgetting to worry about the overall dangers of the situation.', '2023-05-17', 'He is one of the seven Arbiter-Generals of the Xianzhou Alliance\'s Cloud Knights, and one of the Six Charioteers of the Xianzhou Luofu. Although he appears lazy, Jing Yuan has been a general on the Luofu for centuries, an amount of time exceeding most of his peers. This can be attributed to his wisdom and attention to routine measures, with Jing Yuan preferring to be preventive rather than corrective.', 4, 3),
	(9, 'Seele', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Seele-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'Wildfire', 'Jarilo-VI', 'To use our strength to create a fair society... Isn\'t that the obvious goal?', '2023-04-26', 'A spirited and valiant key member of Wildfire who grew up in the perilous Underworld of Belobog. She is accustomed to being on her own. Like her nickname "Babochka" (Russian: Babochka, "Butterfly"), she flits through the battlefield with grace as she causes a storm.', 6, 2),
	(10, 'Gepard', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Gepard-Splash-Art-1024x877.png', 5, 'Male', 'Human', 'Silvermane Guards', 'Jarilo-VI', 'Loyalty isn\'t an inherent value of humans. As such, the recipient of that loyalty also needs to be worthy.', '2023-04-26', 'He is the captain of the Silvermane Guards and belongs to the noble Landau family in Belobog, responsible for the city\'s defenses and maintaining peace.', 3, 6),
	(11, 'Bronya', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Bronya-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'Supreme Guardian', 'Jarilo-VI', 'This place is always part of our homeland, even when it has been corroded by Fragmentum. Silvermane Guards will never turn their backs on their home.', '2023-04-26', 'She is the commander of the Silvermane Guards and the current (nineteenth) Supreme Guardian of Belobog. Originally from the Underworld and from the same orphanage as Seele, she was picked from a handful of children to become the next Supreme Guardian, and was then adopted by Cocolia.', 5, 4),
	(12, 'Silver Wolf', 'https://expertgamereviews.com/wp-content/uploads/2023/06/Honkai-Star-Rail-Silver-Wolf-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'Stellaron Hunter', 'Punklorde', 'Can you let me have some fun this time?', '2023-06-07', 'A member of the Stellaron Hunters and a genius hacker. Silver Wolf has mastered the skill known as "aether editing," which can be used to tamper with the data of reality. Hence, she always views the universe as a massive immersive simulation game and is eager to clear the stages awaiting ahead.', 6, 5),
	(13, 'Arlan', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Arlan-Splash-Art-1024x877.png', 4, 'Male', 'Human', 'Herta Space Station', 'Herta Space Station', 'I&#039;m proud of my wounds. They&#039;re a reminder of being able to protect everyone.', '2023-04-26', 'He is the head of Herta Space Station&#039;s security department, often seen with a dog named Peppy.', 4, 1),
	(14, 'Asta', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Asta-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Herta Space Station', 'Herta Space Station', 'The \'tortoise\' galaxies are those that slooowly give birth to new stars. The ones that use up their fuel reserves in an instant, are the \'hare\' galaxies.', '2023-04-26', 'She is the inquisitive lead astronomer responsible for handling the Herta Space Station\'s affairs, including managing the staff and responding to the Intelligentsia Guild.', 2, 4),
	(15, 'Herta', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Herta-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Genius Society', 'The Blue', 'I\'m already perfect, so what else should I do?', '2023-04-26', 'She is the master of the eponymous Herta Space Station, who appears in the form of a puppet she modeled after her younger self. She is also an emanator of Nous the Erudition.', 3, 3),
	(16, 'Hook', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Hook-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'The Moles', 'Jarilo-VI', 'Who am I? Heh, I\'m the boss around here, you can call me... Pitch-Dark Hook the Great!', '2023-04-26', 'The self-proclaimed boss of The Moles adventure squad and Fersman\'s adopted daughter. She views life as an opportunity for freedom and countless adventures.', 2, 1),
	(17, 'Luka', 'https://expertgamereviews.com/wp-content/uploads/2023/08/Honkai-Star-Rail-Luka-Splash-Art-1024x877.png', 4, 'Male', 'Human', 'Wildfire', 'Jarilo-VI', 'Tell you a secret — the trick to becoming a champion is training hard while everyone is resting.', '2023-07-19', 'An optimistic and carefree member of Wildfire. He is the renowned boxing champion of the Belobog Underworld with a mixed martial arts prowess. His enthusiasm inspires other people, especially children, to dream big.', 1, 5),
	(18, 'Natasha', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Natasha-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Wildfire', 'Jarilo-VI', 'Where\'s a doctor when you need one?', '2023-04-26', 'Fastidious and kind, she is one of the few doctors from the Underworld where medical resources are scarce. It is later revealed that Natasha is the true leader of Wildfire, with Oleg as her acting leader.', 1, 7),
	(19, 'Pela', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Pela-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Silvermane Guards', 'Jarilo-VI', 'Net markers activated — time for a good old counterattack.', '2023-04-26', 'Admired by the Silvermane Guards, she is the Intelligence Officer who handles their affairs. She can respond to any problem with calm assurance.', 3, 5),
	(20, 'Sampo', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Sampo-Splash-Art-1024x877.png', 4, 'Male', 'Human', 'Wildfire', 'Jarilo-VI', 'All sorts of business are welcome — as long as you\'ve got the cash.', '2023-04-26', 'He is an eloquent mercenary from the Underworld who does all sorts of jobs for his "customers," as long as he doesn\'t get paid off with a higher price.', 5, 5),
	(21, 'Serval', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Serval-Splash-Art-1024x877.png', 4, 'Female', 'Human', 'Landau Family', 'Jarilo-VI', 'How can a rock star not have that kind of confidence?', '2023-04-26', 'She is the eldest daughter of the Landau family and a mechanic who runs the Neverwinter Workshop, a rock \'n\' roll performance workshop in Belobog as a hobby.', 4, 3),
	(22, 'Clara', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Clara-Splash-Art-1024x877.png', 5, 'Female', 'Human', 'Prospectors', 'Jarilo-VI', 'Mr. Svarog... is my family.', '2023-04-26', 'She is a shy young girl orphaned at an early age, accompanied by an ancient mech named Svarog. Her greatest wish is "to have a family."', 1, 1),
	(23, 'Qingque', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Qingque-Splash-Art-1024x877.png', 4, 'Female', 'Xianzhou Native', 'Divination Commission', 'The Xianzhou Luofu', 'Work doesn\'t count as extracting value, it\'s just labor in exchange for payment. Extracting value is when you slack off at work.', '2023-04-26', 'An average Diviner of the Divination Commission on the Xianzhou Luofu, and a librarian. She never slacks off when it comes to slacking off and is about to be demoted to a "door guardian".', 6, 3),
	(24, 'Sushang', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Sushang-Splash-Art-1024x877.png', 4, 'Female', 'Xianzhou Native', 'Cloud Knights', 'The Xianzhou Luofu', 'My name will go down in history, just like those heroes of legend!', '2023-04-26', 'An amateur Cloud Knight on board the Xianzhou Luofu who transferred from the Xianzhou Yaoqing. She aspires to become a renowned figure, but struggles with language.', 1, 2),
	(25, 'Tingyun', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Tingyun-Splash-Art-1024x877.png', 4, 'Female', 'Foxian', 'The Xianzhou Luofu', 'The Xianzhou Luofu', 'In business, it\'s best to work with persuadable types. For those who are less persuadable, cooling them down with a fan works wonders.', '2023-04-26', 'She is a young Foxian, amicassador of the Sky-Faring Commission of the Xianzhou Luofu.', 4, 4),
	(26, 'Yukong', 'https://expertgamereviews.com/wp-content/uploads/2023/06/Honkai-Star-Rail-Yukong-Splash-Art-1024x877.png', 4, 'Female', 'Foxian', 'The Xianzhou Luofu', 'The Xianzhou Luofu', 'Some were born to be poets, some to be warriors — I was born to mingle among the stars.', '2023-06-28', 'The seasoned and authoritative Helm Master of the Xianzhou Alliance\'s Sky-Faring Commission and one of the Xianzhou Luofu\'s Six Charioteers. Despite having feats in piloting starskiffs, she no longer flies due to a brutal battle.', 7, 4),
	(27, 'Luocha', 'https://expertgamereviews.com/wp-content/uploads/2023/06/Honkai-Star-Rail-Luocha-Splash-Art-1024x877.png', 5, 'Male', '???', 'Intergalactic Merchant Guild', 'The Xianzhou Luofu', 'This coffin isn\'t mine. I was merely entrusted to take the body back to the Luofu.', '2023-06-28', 'A foreign trader who came from beyond the seas, he appears on the Xianzhou Luofu with a huge coffin. With his consummate medical skills, he always rescues people in times of danger. As a merchant, he is registered at the Xianzhou Yuque within the Alliance, and at the Star Unity Mall branch at the North Valley Star within the Interastral Peace Corporation.', 7, 7),
	(28, 'Yanqing', 'https://expertgamereviews.com/wp-content/uploads/2023/04/Honkai-Star-Rail-Yanqing-Splash-Art-1024x877.png', 5, 'Male', '???', 'Cloud Knights', 'The Xianzhou Luofu', 'I only called you \'teacher\' because I admire your skill in this area. Don\'t expect me to start taking it easy on you.', '2023-04-26', 'The youngest lieutenant of the Xianzhou Alliance\'s Cloud Knights on board the Xianzhou Luofu, and General Jing Yuan\'s retainer. A swordsman gifted with the art of swordplay and war who has a prodigious interest in swords and always collects them from the Artisanship Commission.', 3, 2),
	(29, 'Trailblazer', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/7e3dcd2464edfca47e45ee7f0b53f32b_1711910135236400099.gif', 5, 'Female / Male', '???', 'Astral Express', 'Astral Express', 'When there is the chance to make a choice, make one that you know you won\'t regret...', '2023-04-26', 'They are awakened during the opening events of the game by Kafka and Silver Wolf, who leave them to be found by March 7th and Dan Heng on Herta Space Station during the Antimatter Legion\'s invasion. The player gets to choose either Stelle (female) or Caelus (male), along with their Receptacle Codename.', 1, 1),
	(30, 'Trailblazer', 'https://upload-static.hoyoverse.com/hoyowiki/2023/02/21/c74eb9c6d1c028fc9813c87612c84a3e_5924273427451673630.gif', 5, 'Female / Male', '???', 'Astral Express', 'Astral Express', 'When there is the chance to make a choice, make one that you know you won\'t regret...', '2023-04-26', 'They are awakened during the opening events of the game by Kafka and Silver Wolf, who leave them to be found by March 7th and Dan Heng on Herta Space Station during the Antimatter Legion\'s invasion. The player gets to choose either Stelle (female) or Caelus (male), along with their Receptacle Codename.', 2, 6);

-- Listage de la structure de table srw_loic. rating
CREATE TABLE IF NOT EXISTS `rating` (
  `id_rating` int NOT NULL AUTO_INCREMENT,
  `rate` int NOT NULL,
  `playableCharacter_id` int DEFAULT NULL,
  `trailblazer_id` int DEFAULT NULL,
  PRIMARY KEY (`id_rating`) USING BTREE,
  KEY `playableCharacter_id` (`playableCharacter_id`),
  KEY `trailblazer_id` (`trailblazer_id`),
  CONSTRAINT `FK-rating_playableCharacter` FOREIGN KEY (`playableCharacter_id`) REFERENCES `playablecharacter` (`id_playableCharacter`) ON DELETE SET NULL,
  CONSTRAINT `FK-rating_trailblazer` FOREIGN KEY (`trailblazer_id`) REFERENCES `trailblazer` (`id_trailblazer`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='character rating';

-- Listage des données de la table srw_loic.rating : ~4 rows (environ)
INSERT INTO `rating` (`id_rating`, `rate`, `playableCharacter_id`, `trailblazer_id`) VALUES
	(1, 3, 13, 2),
	(2, 3, 5, 2),
	(3, 5, 13, 4),
	(4, 1, 13, 3);

-- Listage de la structure de table srw_loic. tagability
CREATE TABLE IF NOT EXISTS `tagability` (
  `id_tagAbility` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tagAbility`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='if the ability is single / multi target etc...';

-- Listage des données de la table srw_loic.tagability : ~9 rows (environ)
INSERT INTO `tagability` (`id_tagAbility`, `type`) VALUES
	(1, 'Single Target'),
	(2, 'AoE'),
	(3, 'Blast'),
	(4, 'Restore'),
	(5, '	Defense'),
	(6, 'Support'),
	(7, 'Enhance'),
	(8, 'Bounce'),
	(9, 'Impair');

-- Listage de la structure de table srw_loic. trace
CREATE TABLE IF NOT EXISTS `trace` (
  `id_trace` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `effect` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(255) DEFAULT NULL,
  `ascend_id` int NOT NULL,
  `playableCharacter_id` int NOT NULL,
  PRIMARY KEY (`id_trace`),
  KEY `playableCharacter_id` (`playableCharacter_id`),
  KEY `ascension_id` (`ascend_id`) USING BTREE,
  CONSTRAINT `FK-trace_ascension` FOREIGN KEY (`ascend_id`) REFERENCES `ascend` (`id_ascend`),
  CONSTRAINT `FK-trace_playableCharacter` FOREIGN KEY (`playableCharacter_id`) REFERENCES `playablecharacter` (`id_playableCharacter`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='trace = passive skill tree';

-- Listage des données de la table srw_loic.trace : ~13 rows (environ)
INSERT INTO `trace` (`id_trace`, `name`, `effect`, `icon`, `ascend_id`, `playableCharacter_id`) VALUES
	(1, 'DMG Boost: Wind', 'Wind DMG increases by 3.2%', NULL, 1, 5),
	(2, ' Hidden Dragon', 'When current HP percentage is 50% or lower, reduces the chance of being attacked by enemies.', NULL, 3, 5),
	(3, ' ATK Boost', 'ATK increases by 4.0%', NULL, 3, 5),
	(4, 'DMG Boost: Wind', 'Wind DMG increases by 3.2%', NULL, 4, 5),
	(5, ' DEF Boost', 'DEF increases by 5.0%', NULL, 4, 5),
	(6, ' Faster Than Light', 'After launching an attack, there is a 50% fixed chance to increase own SPD by 20% for 2 turn(s).', NULL, 5, 5),
	(7, ' DMG Boost: Wind', 'Wind DMG increases by 4.8%', NULL, 5, 5),
	(8, ' ATK Boost', 'ATK increases by 6.0%', NULL, 6, 5),
	(9, ' DMG Boost: Wind', 'Wind DMG increases by 4.8%', NULL, 6, 5),
	(10, ' High Gale', 'Basic ATK deals 40% more DMG to Slowed enemies.', NULL, 7, 5),
	(11, ' DEF Boost', 'DEF increases by 7.5%', NULL, 7, 5),
	(12, ' ATK Boost', 'ATK increases by 8.0%', NULL, 8, 5),
	(13, ' DMG Boost: Wind', 'Wind DMG increases by 6.4%', NULL, 9, 5);

-- Listage de la structure de table srw_loic. trailblazer
CREATE TABLE IF NOT EXISTS `trailblazer` (
  `id_trailblazer` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `dateRegister` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id_trailblazer`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='trailblazer = user';

-- Listage des données de la table srw_loic.trailblazer : ~13 rows (environ)
INSERT INTO `trailblazer` (`id_trailblazer`, `email`, `username`, `password`, `dateRegister`, `role`) VALUES
	(1, 'admin@admin.fr', 'admin', '$2y$10$JtompmQllYSqNPQa0D1lCuDiCLDXBORQJf4gU8o2sPWgPP9RNbDta', '2023-09-12 15:17:57', 'ROLE_ADMIN'),
	(2, 'user@user.fr', 'user', '$2y$10$YY8W2JZrK6UckS4oxKfYQOsxUzOhHXnoEVXh.4Nk4ENiu210Q7z26', '2023-09-12 15:21:09', 'ROLE_MEMBER'),
	(3, 'user1@user.fr', 'user1', '$2y$10$TFjL3OF6SVpZA20/aOnwyeqPryPuP4Du7itonQ6Lnlu7ArxNx8St6', '2023-09-13 09:20:21', 'ROLE_MEMBER'),
	(4, 'user2@user.fr', 'user2', '$2y$10$MZ/VNLB4yZUPMotToXvB2ego6L0f6o18PbcsMZa6W9be/dTjk9F/q', '2023-09-13 09:20:44', 'ROLE_MEMBER'),
	(5, 'user3@user.fr', 'user3', '$2y$10$qKxdOlNgsD8VwrFaPMTiNuRjCI.kS.uLbYICcWSTWv/SQbLYCCqQG', '2023-09-13 09:21:38', 'ROLE_MEMBER'),
	(6, 'user4@user.fr', 'user4', '$2y$10$/ZiFlhvXQedilObmd5CVO.jJ2TBbDJxmitAta7r2EMh9kyr5.SiYe', '2023-09-13 09:21:57', 'ROLE_MEMBER'),
	(7, 'user5@user.fr', 'user5', '$2y$10$ceKAXuBcJC4zclnAd/t/NeS/fyy3WHX9tG/OA9.onPyzaE8C.E1kO', '2023-09-13 09:22:28', 'ROLE_MEMBER'),
	(8, 'user6@user.fr', 'user6', '$2y$10$o8aOrR7iLtAFKUTXt2p8F.6L0wYXYItX7DUmw7OmbBEASPljkuOmW', '2023-09-13 10:02:44', 'ROLE_MEMBER'),
	(9, 'user7@user.fr', 'user7', '$2y$10$dwmFHzgNz.f3wUV2UK9hlOIaZ.koLE9S6vyEVRMk2WWvagEZmNDK6', '2023-09-13 10:03:13', 'ROLE_MEMBER'),
	(10, 'user8@user.fr', 'user8', '$2y$10$rmp9OW6SWf.nyQ8F4lkY3ODrvxsbFwlLogCWDaXgh2EVzHgcXWNRW', '2023-09-13 10:03:32', 'ROLE_MEMBER'),
	(11, 'user9@user.fr', 'user9', '$2y$10$ZZglVekhPveINd7M85LntuM7TRChrS16dJ5G1iPiahBBCCJJQj5PO', '2023-09-13 10:03:58', 'ROLE_MEMBER'),
	(12, 'user10@user.fr', 'user10', '$2y$10$ikZS4vNOjxRcVru8yNUs7.VCNAxsMNF3z4./lOZRlGExEHouHgDSS', '2023-09-13 10:04:20', 'ROLE_MEMBER'),
	(13, 'test@test.fr', 'test', '$2y$10$CjiNpnzLSEpwMwx8I0G0a.5xXmjlu.6cAHhG0u4pTYU6LfWFDGSJa', '2023-09-20 18:21:28', 'ROLE_MEMBER');

-- Listage de la structure de table srw_loic. typeability
CREATE TABLE IF NOT EXISTS `typeability` (
  `id_typeAbility` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_typeAbility`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='type of ability ( defense / heal / etc... )';

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
