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
  `tagAbility_id` int DEFAULT NULL,
  PRIMARY KEY (`id_ability`),
  KEY `character_id` (`playableCharacter_id`) USING BTREE,
  KEY `typeAbility_id` (`typeAbility_id`),
  KEY `tag_id` (`tagAbility_id`) USING BTREE,
  CONSTRAINT `FK-ability_playableCharacter` FOREIGN KEY (`playableCharacter_id`) REFERENCES `playablecharacter` (`id_playableCharacter`),
  CONSTRAINT `FK-ability_tagAbility` FOREIGN KEY (`tagAbility_id`) REFERENCES `tagability` (`id_tagAbility`),
  CONSTRAINT `FK-ability_typeAbility` FOREIGN KEY (`typeAbility_id`) REFERENCES `typeability` (`id_typeAbility`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

-- Listage des données de la table srw_loic.ability : ~148 rows (environ)
INSERT INTO `ability` (`id_ability`, `name`, `description`, `energyGeneration`, `energyCost`, `dmg`, `icon`, `playableCharacter_id`, `typeAbility_id`, `tagAbility_id`) VALUES
	(1, 'Lightning Rush', 'Deals Lightning DMG equal to 50%–110% of Arlan\'s ATK to a single enemy.', 20, 0, 30, NULL, 13, 1, 1),
	(2, 'Shackle Breaker', 'Consumes Arlan\'s HP equal to 15% of his Max HP to deal Lightning DMG equal to 120%–264% of Arlan\'s ATK to a single enemy. If Arlan does not have sufficient HP, his HP will be reduced to 1 after using his Skill.', 30, 0, 60, NULL, 13, 2, 1),
	(3, 'Frenzied Punishment', 'Deals Lightning DMG equal to 192%–345.6% of Arlan\'s ATK to a single enemy and Lightning DMG equal to 96%–172.8% of Arlan\'s ATK to enemies adjacent to it.', 5, 110, 60, NULL, 13, 3, 3),
	(4, 'Pain and Anger', 'Increases Arlan\'s DMG for every percent of HP below his Max HP, up to a max of 36%–79.2% more DMG.', 0, 0, 0, NULL, 13, 4, 7),
	(5, 'Swift Harvest', 'Immediately attacks the enemy. After entering battle, deals Lightning DMG equal to 80% of Arlan\'s ATK to all enemies.', 0, 0, 60, NULL, 13, 5, 1),
	(6, 'Midnight Tumult', 'Deals Lightning DMG equal to 50%–110% of Kafka\'s ATK to a single enemy.', 20, 0, 30, NULL, 4, 1, 1),
	(7, 'Caressing Moonlight', 'Deals Lightning DMG equal to 80%–176% of Kafka\'s ATK to a target enemy and Lightning DMG equal to 30%–66% of Kafka\'s ATK to enemies adjacent to it.', 30, 0, 60, NULL, 4, 2, 3),
	(8, 'Twilight Trill', 'Deals Lightning DMG equal to 48%–86.4% of Kafka\'s ATK to all enemies, with a 100% base chance for enemies hit to become Shocked and immediately take DMG from their current Shock state, equal to 80%–104% of its original DMG. Shock lasts for 2 turn(s).', 5, 120, 60, NULL, 4, 3, 2),
	(9, 'Gentle but Cruel', 'After an ally of Kafka\'s uses Basic ATK on an enemy target, Kafka immediately launches 1 follow-up attack and deals Lightning DMG equal to 42%–159.6% of her ATK to that target, with a 100% base chance to inflict Shock equivalent to that applied by her Ultimate to the attacked enemy target for 2 turns. This effect can only be triggered 1 time per turn.', 10, 0, 30, NULL, 4, 4, 1),
	(10, 'Mercy Is Not Forgiveness', 'Immediately attacks all enemies within a set range. After entering battle, deals Lightning DMG equal to 50% of Kafka\'s ATK to all enemies, with a 100% base chance to inflict Shock equivalent to that applied by her Ultimate on every enemy target for 2 turn(s).', 0, 0, 60, NULL, 4, 5, 1),
	(11, 'Spectrum Beam', 'Deals Fire DMG equal to 50%–110% of Asta\'s ATK to a single enemy.', 20, 0, 30, NULL, 14, 1, 1),
	(12, 'Meteor Storm', 'Deals Fire DMG equal to 25%–55% of Asta\'s ATK to a single enemy and further deals DMG for 4 extra times, with each time dealing Fire DMG equal to 25%–55.5% of Asta\'s ATK to a random enemy.', 30, 0, 30, NULL, 14, 2, 8),
	(13, 'Astral Blessing', 'Increases SPD of all allies by 36–51.4 for 2 turn(s).', 5, 120, 0, NULL, 14, 3, 6),
	(14, 'Astrometry', 'Gains 1 stack of Charging for every different enemy hit by Asta plus an extra stack if the enemy hit has Fire Weakness.', 0, 0, 0, NULL, 14, 4, 6),
	(15, 'Miracle Flash', 'Immediately attacks the enemy. After entering battle, deals Fire DMG equal to 50% of Asta\'s ATK to all enemies.', 0, 0, 60, NULL, 14, 5, 1),
	(16, '	Diagnostic Kick', 'Deals Lightning DMG equal to 50%–110% of Bailu\'s ATK to a single enemy.', 20, 0, 30, NULL, 7, 1, 1),
	(17, 'Singing Among Clouds', 'Heals a single ally for 7.8%–12.48% of Bailu\'s Max HP plus 78–347.1. Bailu then heals random allies 2 time(s). After each healing, HP restored from the next healing is reduced by 15%.', 30, 0, 0, NULL, 7, 2, 1),
	(18, 'Felicitous Thunderleap', 'Heals all allies for 9%–14.4% of Bailu\'s Max HP plus 90–400.5. Bailu applies Invigoration to allies that are not already Invigorated. For those already Invigorated, Bailu extends the duration of their Invigoration by 1 turn. The effect of Invigoration can last for 2 turn(s). This effect cannot stack.', 0, 100, 0, NULL, 7, 3, 2),
	(19, 'Gourdful of Elixir	', 'After an ally with Invigoration is hit, restores the ally\'s HP for 3.6%–5.76% of Bailu\'s Max HP plus 36–160.2. This effect can trigger 2 time(s). When an ally receives a killing blow, they will not be knocked down. Bailu immediately heals the ally for 12%–19.2% of Bailu\'s Max HP plus 120–534 HP. This effect can be triggered 1 time per battle.', 0, 0, 0, NULL, 7, 4, 4),
	(20, 'Saunter in the Rain', 'After using Technique, at the start of the next battle, all allies are granted Invigoration for 2 turn(s).', 0, 0, 0, NULL, 7, 5, 7),
	(21, 'Shard Sword', 'Deals 50%–110% of Blade\'s ATK as Wind DMG to a target enemy.', 20, 0, 30, NULL, 3, 1, 1),
	(22, 'Forest of Swords', 'Consumes HP equal to 10% of Blade\'s Max HP and deals Wind DMG equal to the sum of 20%-44% of his ATK and 50%–110% of his Max HP to a single enemy. In addition deals Wind DMG equal to the sum of 8%–17.6% of Blade\'s ATK and 20%-44% of his Max HP to adjacent targets.', 30, 0, 60, NULL, 3, 1, 3),
	(23, 'Hellscape', 'Consumes HP equal to 30% of Blade\'s Max HP to enter the Hellscape state.', 0, 0, 0, NULL, 3, 2, 7),
	(24, 'Death Sentence	', 'Sets Blade\'s current HP to 50% of his Max HP and deals to single enemy Wind DMG equal to the sum of 24%–38% of his ATK, 60%–95% of his Max HP, and 60%–95% of the total HP he has lost in the current battle. At the same time, deals Wind DMG to adjacent targets equal to the sum of 9.6%–15.2% of his ATK, 24%–38% of his Max HP, and 24%–38% of the total HP he has lost in the current battle. The total HP Blade has lost in the current battle is capped at 90% of his Max HP. This value will be reset and re-accumulated after his Ultimate is used.', 5, 130, 60, NULL, 3, 3, 3),
	(25, 'Shuhu\'s Gift', 'When Blade sustains DMG or consumes his HP, he gains 1 stack of Charge, stacking up to 5 times. A max of 1 Charge stack can be gained every time he is attacked.', 10, 0, 30, NULL, 3, 4, 2),
	(26, 'Karma Wind', 'Immediately attacks the enemy.After entering combat, consumes 20% of Blade\'s Max HP while dealing Wind DMG equal to 40% of his Max HP to all enemies.If Blade\'s current HP is insufficient, his HP will be reduced to 1 when this Technique is used.', 0, 0, 0, NULL, 3, 5, 1),
	(27, 'Windrider Bullet', 'Deals Wind DMG equal to 50%–110% of Bronya\'s ATK to a single enemy.', 20, 0, 30, NULL, 11, 1, 1),
	(28, 'Combat Redeployment', 'Dispels a debuff from a single ally, allows them to immediately take action, and increases their DMG by 33%–72.6% for 1 turn(s).When this Skill is used on Bronya herself, she cannot immediately take action again.', 30, 0, 0, NULL, 11, 2, 6),
	(29, 'The Belobog March', 'Increases the ATK of all allies by 33%–59.4%, and increases their CRIT DMG equal to 12%–16.8% of Bronya\'s CRIT DMG plus 12%–21.6% for 2 turn(s).', 5, 120, 0, NULL, 11, 3, 6),
	(30, '	Leading the Way', 'After using her Basic ATK, Bronya\'s next action will be Advanced Forward by 15%–33%.', 0, 0, 0, NULL, 11, 4, 7),
	(31, 'Banner of Command', 'After using Bronya\'s Technique, at the start of the next battle, all allies\' ATK increases by 15% for 2 turn(s).', 0, 0, 0, NULL, 11, 5, 6),
	(32, 'I Want to Help', 'Deals Physical DMG equal to 50%–110% of Clara\'s ATK to a single enemy.', 20, 0, 30, NULL, 22, 1, 1),
	(33, 'Svarog Watches Over You', 'Deals Physical DMG equal to 60%–132% of Clara\'s ATK to all enemies, and additionally deals Physical DMG equal to 60%–132% of Clara\'s ATK to enemies marked by Svarog with a Mark of Counter.\r\nAll Marks of Counter will be removed after this Skill is used.', 30, 0, 30, NULL, 22, 2, 2),
	(34, 'Promise, Not Command', 'After Clara uses Ultimate, DMG dealt to her is reduced by an extra 15%–27%, and she has greatly increased chances of being attacked by enemies for 2 turn(s).\r\nIn addition, Svarog\'s Counter is enhanced. When an ally is attacked, Svarog immediately launches a Counter, and its DMG multiplier against the enemy increases by 96%–172.8%. Enemies adjacent to it take 50% of the DMG dealt to the target enemy. Enhanced Counter(s) can take effect 2 time(s).', 5, 110, 0, NULL, 22, 3, 7),
	(35, 'Because We\'re Family', 'Under the protection of Svarog, DMG taken by Clara when hit by enemy attacks is reduced by 10%. Svarog will mark enemies who attack Clara with his Mark of Counter and retaliate with a Counter, dealing Physical DMG equal to 80%–176% of Clara\'s ATK.', 5, 0, 30, NULL, 22, 4, 1),
	(36, 'A Small Price for Victory', 'Immediately attacks the enemy. Upon entering battle, the chance Clara will be attacked by enemies increases for 2 turn(s).', 0, 0, 60, NULL, 22, 5, 1),
	(37, 'Cloudlancer Art: North Wind', 'Deals Wind DMG equal to 50%–110% of Dan Heng\'s ATK to a single enemy.', 20, 0, 30, NULL, 5, 1, 1),
	(38, 'Cloudlancer Art: Torrent', 'Deals Wind DMG equal to 130%–286% of Dan Heng\'s ATK to a single enemy.', 30, 0, 60, NULL, 5, 2, 1),
	(39, '	Ethereal Dream', 'Deals Wind DMG equal to 240%–432% of Dan Heng\'s ATK to a single enemy. If the enemy is Slowed, the Ultimate\'s DMG multiplier increases by 72%–129.6%.', 5, 100, 90, NULL, 5, 3, 1),
	(40, 'Superiority of Reach', 'When Dan Heng is the target of an ally\'s Ability, his next attack\'s Wind RES PEN increases by 18%–39.6%. This effect can be triggered again after 2 turn(s).', 0, 0, 0, NULL, 5, 4, 7),
	(41, 'Splitting Spearhead', 'After Dan Heng uses his Technique, his ATK increases by 40% at the start of the next battle for 3 turn(s).', 0, 0, 0, NULL, 5, 5, 7),
	(42, 'Fist of Conviction', 'Deals Ice DMG equal to 50%–110% of Gepard\'s ATK to a single enemy.', 0, 0, 30, NULL, 10, 1, 1),
	(43, 'Daunting Smite', 'Deals Ice DMG equal to 100%–220% of Gepard\'s ATK to a single enemy, with a 65% base chance to Freeze the enemy for 1 turn(s).\r\nWhile Frozen, the enemy cannot take action and will take Additional Ice DMG equal to 30%–66% of Gepard\'s ATK at the beginning of each turn.', 30, 0, 60, NULL, 10, 2, 9),
	(44, 'Enduring Bulwark', 'Applies a Shield to all allies, absorbing DMG equal to 30%–48% of Gepard\'s DEF plus 150–667.5 for 3 turn(s).', 5, 100, 0, NULL, 10, 3, 5),
	(45, '	Unyielding Will', 'When struck with a killing blow, instead of becoming knocked down, Gepard\'s HP immediately restores to 25%–55% of his Max HP. This effect can only trigger once per battle.', 0, 0, 0, NULL, 10, 4, 4),
	(46, 'Comradery', 'After Gepard uses his Technique, when the next battle begins, a Shield will be applied to all allies, absorbing DMG equal to 24% of Gepard\'s DEF plus 150 for 2 turn(s).', 0, 0, 0, NULL, 10, 5, 5),
	(47, 'What Are You Looking At?', 'Deals Ice DMG equal to 50%–110% of Herta\'s ATK to a single enemy.', 30, 0, 30, NULL, 15, 1, 1),
	(48, 'One-Time Offer', 'Deals Ice DMG equal to 50%–110% of Herta\'s ATK to all enemies. If the enemy\'s HP percentage is 50% or higher, DMG dealt to this target increases by 20%.', 30, 0, 30, NULL, 15, 2, 2),
	(49, 'It\'s Magic, I Added Some Magic', 'Deals Ice DMG equal to 120%–216% of Herta\'s ATK to all enemies.', 5, 100, 60, NULL, 15, 3, 2),
	(50, 'Fine, I\'ll Do It Myself', 'When an ally\'s attack causes an enemy\'s HP percentage to fall to 50% or lower, Herta will launch a follow-up attack, dealing Ice DMG equal to 25%–43% of Herta\'s ATK to all enemies.', 5, 0, 15, NULL, 15, 4, 2),
	(51, 'It Can Still Be Optimized', 'After using her Technique, Herta\'s ATK increases by 40% for 3 turn(s) at the beginning of the next battle.', 0, 0, 0, NULL, 15, 5, 7),
	(52, 'Sawblade Tuning', 'Deals Fire DMG equal to 50%–110% of Himeko\'s ATK to a single enemy.', 20, 0, 30, NULL, 1, 1, 1),
	(53, 'Molten Detonation', 'Deals Fire DMG equal to 100%–220% of Himeko\'s ATK to a single enemy and Fire DMG equal to 40%–88% of Himeko\'s ATK to enemies adjacent to it.', 30, 0, 60, NULL, 1, 2, 3),
	(54, 'Heavenly Flare', 'Deals Fire DMG equal to 138%–248.4% of Himeko\'s ATK to all enemies. Himeko regenerates 5 extra Energy for each enemy defeated.', 5, 120, 60, NULL, 1, 3, 2),
	(55, 'Victory Rush', 'When an enemy is inflicted with Weakness Break, Himeko gains 1 point of Charge (max 3 points).\r\nIf Himeko is fully Charged when an ally performs an attack, Himeko immediately performs 1 follow-up attack and deals Fire DMG equal to 70%–154% of her ATK to all enemies, consuming all Charge points.\r\nAt the start of the battle, Himeko gains 1 point of Charge.', 10, 0, 30, NULL, 1, 4, 2),
	(56, 'Incomplete Combustion', 'After using Technique, creates a dimension that lasts for 15 second(s). After entering battle with enemies in the dimension, there is a 100% base chance to increase Fire DMG taken by enemies by 10% for 2 turn(s). Only 1 dimension created by allies can exist at the same time.', 0, 0, 0, NULL, 1, 5, 9),
	(57, 'Hehe! Don\'t Get Burned!', 'Deals Fire DMG equal to 50%–110% of Hook\'s ATK to a target enemy.', 20, 0, 30, NULL, 16, 1, 1),
	(58, 'Hey! Remember Hook?', 'Single Target: Deals Fire DMG equal to 120%–264% of Hook\'s ATK to a single enemy. In addition, there is a 100% base chance to inflict Burn for 2 turn(s). When afflicted with Burn, enemies will take Fire DoT equal to 25%–71.5% of Hook\'s ATK at the beginning of each turn.\r\n\r\nBlast: Deals Fire DMG equal to 140%–308% of Hook\'s ATK to a single enemy, with a 100% base chance to Burn them for 2 turn(s). Additionally, deals Fire DMG equal to 40%–88% of Hook\'s ATK to enemies adjacent to it. When afflicted with Burn, enemies will take Fire DoT equal to 25%–71.5% of Hook\'s ATK at the beginning of each turn.', 30, 0, 60, NULL, 16, 2, 1),
	(59, 'Boom! Here Comes the Fire!', 'Deals Fire DMG equal to 240%–432% of Hook\'s ATK to a single enemy. After using Ultimate, the next Skill to be used is Enhanced, which deals DMG to a single enemy and enemies adjacent to it.', 5, 120, 90, NULL, 16, 3, 1),
	(60, 'Ha! Oil to the Flames!', 'When attacking a target afflicted with Burn, deals Additional Fire DMG equal to 50%–110% of Hook\'s ATK and regenerates 5 extra Energy.', 0, 0, 0, NULL, 16, 4, 7),
	(61, 'Ack! Look at This Mess!', 'Immediately attacks the enemy. Upon entering battle, Hook deals Fire DMG equal to 50% of her ATK to a random enemy. In addition, there is a 100% base chance to inflict Burn on every enemy for 3 turn(s). When afflicted with Burn, enemies will take Fire DoT equal to 50% of Hook\'s ATK at the beginning of each turn.', 0, 0, 60, NULL, 16, 5, 1),
	(62, 'Glistening Light', 'Jing Yuan deals Lightning DMG equal to 50%–110% of his ATK to a single enemy.', 20, 0, 30, NULL, 8, 1, 1),
	(63, 'Rifting Zenith	', 'Deals Lightning DMG equal to 50%–110% of Jing Yuan\'s ATK to all enemies and increases Lightning-Lord\'s Hits Per Action by 2 for the next turn.', 30, 0, 30, NULL, 8, 2, 2),
	(64, 'Lightbringer	', 'Deals Lightning DMG equal to 120%–216% of Jing Yuan\'s ATK to all enemies and increases Lightning-Lord\'s Hits Per Action by 3 for the next turn.', 5, 130, 60, NULL, 8, 3, 2),
	(65, 'Prana Extirpated', 'Summons Lightning-Lord at the start of the battle. Lightning-Lord has 60 base SPD and 3 base Hits Per Action. When the Lightning-Lord takes action, its hits are considered as follow-up attacks, with each hit dealing Lightning DMG equal to 33%–72.6% of Jing Yuan\'s ATK to a random single enemy, and enemies adjacent to it also receive Lightning DMG equal to 25% of the DMG dealt to the target enemy.\r\nThe Lightning-Lord\'s Hits Per Action can reach a max of 10. Every time Lightning-Lord\'s Hits Per Action increases by 1, its SPD increases by 10. After the Lightning-Lord\'s action ends, its SPD and Hits Per Action return to their base values.\r\nWhen Jing Yuan is knocked down, the Lightning-Lord will disappear.\r\nWhen Jing Yuan is affected by Crowd Control debuff, the Lightning-Lord is unable to take action.', 0, 0, 15, NULL, 8, 4, 8),
	(66, 'Spirit Invocation', 'After the Technique is used, the Lightning-Lord\'s Hits Per Action in the first turn increases by 3 at the start of the next battle.', 0, 0, 0, NULL, 8, 5, 7),
	(67, 'Direct Punch	', 'Deals Physical DMG equal to 50%–110% of Luka\'s ATK to a single enemy.', 20, 0, 30, NULL, 17, 1, 1),
	(68, 'Sky-Shatter Fist', 'Consumes 2 stacks of Fighting Will. First, uses Direct Punch to deal 3 hits, with each hit dealing Physical DMG equal to 10%–22% of Luka\'s ATK to a single enemy target.', 20, 0, 60, NULL, 17, 1, 1),
	(69, 'Lacerating Fist', 'Deals Physical DMG equal to 60%–132% of Luka\'s ATK to a single enemy target. In addition, there is a 100% base chance to inflict Bleed on them, lasting for 3 turn(s).', 30, 0, 60, NULL, 17, 2, 1),
	(70, '	Coup de Grâce', 'Receives 2 stack(s) of Fighting Will, with a 100% base chance to increase a single enemy target\'s DMG received by 12%–21.6% for 3 turn(s). Then, deals Physical DMG equal to 198%–356.4% of Luka\'s ATK to the target.', 5, 130, 90, NULL, 17, 3, 1),
	(71, 'Flying Sparks', 'After Luka uses his Basic ATK "Direct Punch" or Skill "Lacerating Fist," he receives 1 stack(s) of Fighting Will, up to 4 stacks. When he has 2 or more stacks of Fighting Will, his Basic ATK "Direct Punch" is enhanced to "Sky-Shatter Fist." After his Enhanced Basic ATK\'s "Rising Uppercut" hits a Bleeding enemy target, the Bleed status will immediately deal DMG for 1 time equal to 68%–88.4% of the original DMG to the target. At the start of battle, Luka will possess 1 stack of Fighting Will.', 0, 0, 0, NULL, 17, 4, 7),
	(72, '	Anticipator', 'Immediately attacks the enemy. Upon entering battle, Luka deals Physical DMG equal to 50% of his ATK to a random single enemy with a 100% base chance to inflict his Skill\'s Bleed effect on the target. Then, Luka gains 1 additional stack of Fighting Will.', 0, 0, 60, NULL, 17, 5, 1),
	(73, '	Thorns of the Abyss', 'Deals Imaginary DMG equal to 50%–110% of Luocha\'s ATK to a single enemy.', 0, 0, 30, NULL, 27, 1, 1),
	(74, '	Prayer of Abyss Flower', 'After using his Skill, Luocha immediately restores the target ally\'s HP equal to 40%–64% of Luocha\'s ATK plus 200–890. Meanwhile, Luocha gains 1 stack of Abyss Flower.\r\nWhen any ally\'s HP percentage drops to 50% or lower, an effect equivalent to Luocha\'s Skill will immediately be triggered and applied to this ally for one time (without consuming Skill Points). This effect can be triggered again after 2 turn(s).', 30, 0, 0, NULL, 27, 2, 4),
	(75, '	Death Wish', 'Removes 1 buff(s) from all enemies and deals Imaginary DMG equal to 120%–240% of Luocha\'s ATK to all enemies. Luocha gains 1 stack of Abyss Flower.', 5, 100, 60, NULL, 27, 3, 2),
	(76, '	Cycle of Life', 'When Abyss Flower reaches 2 stacks, Luocha consumes all stacks of Abyss Flower to deploy a Field against the enemy.', 0, 0, 0, NULL, 27, 4, 4),
	(77, 'Mercy of a Fool', 'After the Technique is used, the Talent will be immediately triggered at the start of the next battle.', 0, 0, 0, NULL, 27, 5, 4),
	(78, 'Frigid Cold Arrow', 'Deals Ice DMG equal to 50%–110% of March 7th\'s ATK to a single enemy.', 20, 0, 30, NULL, 2, 1, 1),
	(79, '	The Power of Cuteness', 'Provides a single ally with a Shield that can absorb DMG equal to 38%–60.8% of March 7th\'s DEF plus 190–845.5 for 3 turn(s).\r\nIf the ally\'s current HP percentage is 30% or higher, greatly increases the chance of enemies attacking that ally.', 30, 0, 0, NULL, 2, 2, 5),
	(80, 'Glacial Cascade', 'Deals Ice DMG equal to 90%–162% of March 7th\'s ATK to all enemies. Hit enemies have a 50% base chance to be Frozen for 1 turn(s).\r\nWhile Frozen, enemies cannot take action and will receive Additional Ice DMG equal to 30%–66% of March 7th\'s ATK at the beginning of each turn.', 5, 120, 60, NULL, 2, 3, 2),
	(81, 'Girl Power', 'After a Shielded ally is attacked by an enemy, March 7th immediately Counters, dealing Ice DMG equal to 50%–110% of her ATK. This effect can be triggered 2 time(s) each turn.', 10, 0, 0, NULL, 2, 4, 1),
	(82, 'Freezing Beauty', 'Immediately attacks the enemy. After entering battle, there is a 100% base chance to Freeze a random enemy for 1 turn(s).\r\nWhile Frozen, the enemy cannot take action and will take Additional Ice DMG equal to 50% of March 7th\'s ATK at the beginning of each turn."', 0, 0, 60, NULL, 2, 5, 1),
	(83, 'Behind the Kindness', 'Deals Physical DMG equal to 50%–110% of Natasha\'s ATK to a single enemy.', 20, 0, 30, NULL, 18, 1, 1),
	(84, 'Love, Heal, and Choose', 'Restores a single ally for 7%–11.2% of Natasha\'s Max HP plus 70–311.5. Restores the ally for another 4.8%–7.68% of Natasha\'s Max HP plus 48–213.6 at the beginning of each turn for 2 turn(s).', 30, 0, 0, NULL, 18, 2, 4),
	(85, 'Gift of Rebirth', 'Heals all allies for 9.2%–14.72% of Natasha\'s Max HP plus 92–409.4.', 5, 0, 90, NULL, 18, 3, 4),
	(86, 'Innervation', 'When healing allies with HP percentage at 30% or lower, increases Natasha\'s Outgoing Healing by 25%–55%. This effect also works on continuous healing.', 0, 0, 0, NULL, 18, 4, 7),
	(87, 'Hypnosis Research', 'Immediately attacks the enemy. After entering battle, deals Physical DMG equal to 80% of Natasha\'s ATK to a random enemy, with a 100% base chance to Weaken all enemies.\r\nWhile Weakened, enemies deal 30% less DMG to allies for 1 turn(s).', 0, 0, 60, NULL, 18, 5, 1),
	(88, '	Frost Shot', 'Deals Ice DMG equal to 50%–110% of Pela\'s ATK to a single enemy.', 20, 0, 20, NULL, 19, 1, 1),
	(89, 'Frostbite', 'Removes 1 buff(s) and deals Ice DMG equal to 105%–231% of Pela\'s ATK as to a single enemy.', 30, 0, 60, NULL, 19, 2, 9),
	(90, 'Zone Suppression', 'Deals Ice DMG equal to 60%–108% of Pela\'s ATK to all enemies, with a 100% base chance to inflict Exposed on all enemies.\r\nWhen Exposed, enemies\' DEF is reduced by 30%–42% for 2 turn(s).', 5, 0, 110, NULL, 19, 3, 9),
	(91, 'Data Collecting	', 'If the enemy is debuffed after Pela\'s attack, Pela will restore 5–11 extra Energy. This effect can only be triggered 1 time per attack.', 0, 0, 0, NULL, 19, 4, 6),
	(92, 'Preemptive Strike', 'Immediately attacks the enemy. Upon entering battle, Pela deals Ice DMG equal to 80% of her ATK to a random enemy, with a 100% base chance of lowering the DEF of all enemies by 20% for 2 turn(s).', 0, 0, 60, NULL, 19, 5, 1),
	(93, '	Flower Pick', 'Tosses 1 jade tile from the suit with the fewest tiles in hand to deal Quantum DMG equal to 50%–110% of Qingque\'s ATK to a single enemy.', 20, 0, 30, NULL, 23, 1, 1),
	(94, 'Cherry on Top!', 'Deals Quantum DMG equal to 120%–288% of Qingque\'s ATK to a single enemy, and deals Quantum DMG equal to 50%–110% of Qingque\'s ATK to enemies adjacent to it.\r\n"Cherry on Top!" cannot recover Skill Points.', 20, 0, 60, NULL, 23, 1, 3),
	(95, 'A Scoop of Moon', 'Immediately draws 2 jade tile(s) and increases DMG by 14%–30.8% until the end of the current turn. This effect can stack up to 4 time(s). The turn will not end after this Skill is used.', 30, 0, 0, NULL, 23, 2, 7),
	(96, 'A Quartet? Woo-hoo!	', 'Deals Quantum DMG equal to 120%–216% of Qingque\'s ATK to all enemies, and obtain 4 jade tiles of the same suit.', 5, 0, 140, NULL, 23, 3, 2),
	(97, 'Celestial Jade', 'When an ally\'s turn starts, Qingque randomly draws 1 tile from 3 different suits and can hold up to 4 tiles at one time.\r\nIf Qingque starts her turn with 4 tiles of the same suit, she consumes all tiles to enter the "Hidden Hand" state.\r\nWhile in this state, Qingque cannot use her Skill again. At the same time, Qingque\'s ATK increases by 36%–79.2%, and her Basic ATK "Flower Pick" is enhanced, becoming "Cherry on Top!" The "Hidden Hand" state ends after using "Cherry on Top!".', 0, 0, 0, NULL, 23, 4, 7),
	(98, 'Game Solitaire', 'After using Technique, Qingque draws 2 jade tile(s) when the battle starts.', 0, 0, 0, NULL, 23, 5, 7),
	(99, 'Dazzling Blades', 'Deals Wind DMG equal to 50%–110% of Sampo\'s ATK to a single enemy.', 20, 0, 30, NULL, 20, 1, 1),
	(100, 'Ricochet Love', 'Deals Wind DMG equal to 28%–61.6% of Sampo\'s ATK to a single enemy, and further deals DMG for 4 extra time(s), with each time dealing Wind DMG equal to 28%–61.6% of Sampo\'s ATK to a random enemy.', 30, 0, 30, NULL, 20, 2, 8),
	(101, 'Surprise Present', 'Deals Wind DMG equal to 96%–172.8% of Sampo\'s ATK to all enemies, with a 100% base chance to increase the targets\' DoT taken by 20%–32% for 2 turn(s).', 5, 120, 60, NULL, 20, 3, 9),
	(102, 'Windtorn Dagger', 'Sampo\'s attacks have a 65% base chance to inflict Wind Shear for 3 turn(s).\r\nEnemies inflicted with Wind Shear will take Wind DoT equal to 20%–57.2% of Sampo\'s ATK at the beginning of each turn. Wind Shear can stack up to 5 time(s).', 0, 0, 0, NULL, 20, 4, 7),
	(103, 'Shining Bright', 'After Sampo uses Technique, enemies in a set area are inflicted with Blind for 10 second(s). Blinded enemies cannot detect your team.\r\nWhen initiating combat against a Blinded enemy, there is a 100% fixed chance to delay all enemies\' action by 25%.', 0, 0, 0, NULL, 20, 5, 9),
	(104, 'Thwack', 'Deals Quantum DMG equal to 50%–110% of Seele\'s ATK to a single enemy.', 20, 0, 30, NULL, 9, 1, 1),
	(105, 'Sheathed Blade', 'Increases Seele\'s SPD by 25% for 2 turn(s) and deals Quantum DMG equal to 110%–242% of Seele\'s ATK to a single enemy.', 30, 0, 60, NULL, 9, 2, 1),
	(106, 'Butterfly Flurry', 'Seele enters the buffed state and deals Quantum DMG equal to 255%–459% of her ATK to a single enemy.', 5, 120, 90, NULL, 9, 3, 1),
	(107, 'Resurgence', 'Enters the buffed state upon defeating an enemy with Basic ATK, Skill, or Ultimate, and receives an extra turn. While in the buffed state, the DMG of Seele\'s attacks increases by 40%–88% for 1 turn(s).\r\nEnemies defeated in the extra turn provided by "Resurgence" will not trigger another "Resurgence."', 0, 0, 0, NULL, 9, 4, 7),
	(108, 'Phantom Illusion', 'After using her Technique, Seele gains Stealth for 20 second(s). While Stealth is active, Seele cannot be detected by enemies. And when entering battle by attacking enemies, Seele will immediately enter the buffed state.', 0, 0, 0, NULL, 9, 5, 7),
	(109, 'Roaring Thunderclap', 'Deals Lightning DMG equal to 50%–110% of Serval\'s ATK to a single enemy.', 20, 0, 30, NULL, 21, 1, 1),
	(110, '	Lightning Flash', 'Deals Lightning DMG equal to 70%–154% of Serval\'s ATK to a single enemy and Lightning DMG equal to 30%–66% of Serval\'s ATK to enemies adjacent to it, with a 80% base chance for enemies hit to become Shocked for 2 turn(s).\r\nWhile Shocked, enemies take Lightning DoT equal to 40%–114.4% of Serval\'s ATK at the beginning of each turn.', 30, 0, 60, NULL, 21, 2, 3),
	(111, 'Here Comes the Mechanical Fever', 'Deals Lightning DMG equal to 108%–194.4% of Serval\'s ATK to all enemies. Enemies already Shocked will extend the duration of their Shock state by 2 turn(s).', 5, 100, 60, NULL, 21, 3, 2),
	(112, 'Galvanic Chords', 'After Serval attacks, deals Additional Lightning DMG equal to 36%–79.2% of Serval\'s ATK to all Shocked enemies.', 0, 0, 0, NULL, 21, 4, 7),
	(113, '	Good Night, Belobog', 'Immediately attacks the enemy. After entering battle, deals Lightning DMG equal to 50% of Serval\'s ATK to a random enemy, with a 100% base chance for all enemies to become Shocked for 3 turn(s).\r\nWhile Shocked, enemies will take Lightning DoT equal to 50% of Serval\'s ATK at the beginning of each turn.', 0, 0, 60, NULL, 21, 5, 1),
	(114, 'System Warning', 'Deals Quantum DMG equal to 50%–110% of Silver Wolf\'s ATK to a single enemy.', 20, 0, 30, NULL, 12, 1, 1),
	(115, '	Allow Changes?', 'There is a 75%–87% base chance to add 1 Weakness of an on-field ally\'s Type to the target enemy. This also reduces the enemy\'s DMG RES to that Weakness Type by 20% for 2 turn(s). If the enemy already has that Type Weakness, the effect of DMG RES reduction to that Weakness Type will not be triggered.\r\nEach enemy can only have 1 Weakness implanted by Silver Wolf. When Silver Wolf implants another Weakness to the target, only the most recent implanted Weakness will be kept.\r\nIn addition, there is a 100% base chance to reduce the All-Type RES of the enemy further by 7.5%–10.5% for 2 turn(s).\r\nDeals Quantum DMG equal to 98%–215.6% of Silver Wolf\'s ATK to this enemy.', 30, 0, 60, NULL, 12, 2, 9),
	(116, 'User Banned', 'There\'s a 85%–103% base chance to decrease the target enemy\'s DEF by 36%–46.8% for 3 turn(s). And at the same time, deals Quantum DMG equal to 228%–410.4% of Silver Wolf\'s ATK to the target enemy.', 5, 110, 90, NULL, 12, 3, 9),
	(117, 'Awaiting System Response...', 'Silver Wolf can create three types of Bugs: reduce ATK by 5%–11%, reduce DEF by 4%–8.8%, and reduce SPD by 3%–6.6%.\r\nEvery time Silver Wolf attacks, she has a 60%–74.4% base chance to implant a random Bug that lasts for 3 turn(s) in the enemy target.', 0, 0, 0, NULL, 12, 4, 9),
	(118, 'Force Quit Program', 'Immediately attacks the enemy. After entering battle, deals Quantum DMG equal to 80% of Silver Wolf\'s ATK to all enemies, and ignores Weakness Types and reduces Toughness from all enemies. Enemies with their Weakness Broken in this way will trigger the Quantum Weakness Break effect.', 0, 0, 60, NULL, 12, 5, 1),
	(119, '	Cloudfencer Art: Starshine', 'Deals Physical DMG equal to 50%–110% of Sushang\'s ATK to a single enemy.', 20, 0, 30, NULL, 24, 1, 1),
	(120, '	Cloudfencer Art: Mountainfall', 'Deals Physical DMG equal to 105%–231% of Sushang\'s ATK to a single enemy. In addition, there is a 33% chance to trigger Sword Stance on the final hit, dealing Additional Physical DMG equal to 50%–110% of Sushang\'s ATK to the enemy.\r\nIf the enemy is inflicted with Weakness Break, Sword Stance is guaranteed to trigger.', 30, 0, 60, NULL, 24, 2, 1),
	(121, 'Shape of Taixu: Dawn Herald', 'Deals Physical DMG equal to 192%–345.6% of Sushang\'s ATK to a single enemy target, and she immediately takes action again. In addition, Sushang\'s ATK increases by 18%–32.4% and using her Skill has 2 extra chances to trigger Sword Stance for 2 turn(s).\r\nSword Stance triggered from the extra chances deals 50% of the original DMG.', 5, 120, 90, NULL, 24, 3, 1),
	(122, 'Dancing Blade', 'When an enemy has their Weakness Broken on the field, Sushang\'s SPD increases by 15%–21% for 2 turn(s).', 0, 0, 0, NULL, 24, 4, 7),
	(123, 'Cloudfencer Art: Warcry', 'Immediately attacks the enemy. Upon entering battle, Sushang deals Physical DMG equal to 80% of her ATK to all enemies.', 0, 0, 60, NULL, 24, 5, 1),
	(124, 'Dislodged', 'Tingyun deals Lightning DMG equal to 50%–110% of her ATK to a single enemy.', 20, 0, 30, NULL, 25, 1, 1),
	(125, 'Soothing Melody', 'Grants a single ally with Benediction to increase their ATK by 25%–55%, up to 15%–27% of Tingyun\'s current ATK.\r\nWhen the ally with Benediction attacks, they will deal Additional Lightning DMG equal to 20%–44% of that ally\'s ATK for 1 time.\r\nBenediction lasts for 3 turn(s) and is only effective on the most recent receiver of Tingyun\'s Skill.', 30, 0, 0, NULL, 25, 2, 7),
	(126, '	Amidst the Rejoicing Clouds', 'Regenerates 50 Energy for a single ally and increases the target\'s DMG by 20%–56% for 2 turn(s).', 5, 130, 0, NULL, 25, 3, 6),
	(127, 'Violet Sparknado', 'When an enemy is attacked by Tingyun, the ally with Benediction immediately deals Additional Lightning DMG equal to 30%–66% of that ally\'s ATK to the same enemy.', 0, 0, 0, NULL, 25, 4, 7),
	(128, 'Gentle Breeze', 'Tingyun immediately regenerates 50 Energy upon using her Technique.', 0, 0, 0, NULL, 25, 5, 6),
	(129, 'Gravity Suppression', 'Deals Imaginary DMG equal to 50%–110% of Welt\'s ATK to a single enemy.', 20, 0, 30, NULL, 6, 1, 1),
	(130, 'Edge of the Void', 'Deals Imaginary DMG equal to 36%–79.2% of Welt\'s ATK to a single enemy and further deals DMG 2 extra times, with each time dealing Imaginary DMG equal to 36%–90% of Welt\'s ATK to a random enemy. On hit, there is a 65%–77% base chance to reduce the enemy\'s SPD by 10% for 2 turn(s).', 30, 0, 30, NULL, 6, 2, 8),
	(131, 'Synthetic Black Hole', 'Deals Imaginary DMG equal to 90%–162% of Welt\'s ATK to all enemies, with a 100% base chance for enemies hit by this ability to be Imprisoned for 1 turn.\r\nImprisoned enemies have their actions delayed by 32%–41.6% and SPD reduced by 10%.', 5, 120, 60, NULL, 6, 3, 2),
	(132, 'Time Distortion', 'When hitting an enemy that is already Slowed, Welt deals Additional Imaginary DMG equal to 30%–66% of his ATK to the enemy.', 0, 0, 0, NULL, 6, 4, 7),
	(133, '	Gravitational Imprisonment', 'After using Welt\'s Technique, create a dimension that lasts for 15 second(s). Enemies in this dimension have their Movement SPD reduced by 50%. After entering battle with enemies in the dimension, there is a 100% base chance to Imprison the enemies for 1 turn.\r\nImprisoned enemies have their actions delayed by 20% and SPD reduced by 10%. Only 1 dimension created by allies can exist at the same time.', 0, 0, 0, NULL, 6, 5, 9),
	(134, 'Frost Thorn', 'Deals Ice DMG equal to 50%–110% of Yanqing\'s ATK to a single enemy.', 20, 0, 30, NULL, 28, 1, 1),
	(135, '	Darting Ironthorn', 'Deals Ice DMG equal to 110%–242% of Yanqing\'s ATK to a single enemy and activates Soulsteel Sync for 1 turn.', 30, 0, 60, NULL, 28, 2, 1),
	(136, 'Amidst the Raining Bliss', 'Increases Yanqing\'s CRIT Rate by 60%. When Soulsteel Sync is active, increases Yanqing\'s CRIT DMG by an extra 30%–54%. This buff lasts for one turn. Afterwards, deals Ice DMG equal to 210%–378% of Yanqing\'s ATK to a single enemy.', 5, 140, 90, NULL, 28, 3, 1),
	(137, 'One With the Sword', 'When Soulsteel Sync is active, Yanqing is less likely to be attacked by enemies. Yanqing\'s CRIT Rate increases by 15%–21% and his CRIT DMG increases by 15%–33%. After Yanqing attacks an enemy, there is a 50%–62% fixed chance to perform a follow-up attack, dealing Ice DMG equal to 25%–55% of Yanqing\'s ATK to the enemy, which has a 65% base chance to Freeze the enemy for 1 turn.\r\nThe Frozen target cannot take action and receives Additional Ice DMG equal to 25%–55% of Yanqing\'s ATK at the beginning of each turn.\r\nWhen Yanqing receives DMG, the Soulsteel Sync effect will disappear.', 10, 0, 30, NULL, 28, 4, 1),
	(138, 'The One True Sword', 'After using his Technique, at the start of the next battle, Yanqing deals 30% more DMG for 2 turn(s) to enemies whose current HP is 50% or higher.', 0, 0, 0, NULL, 28, 5, 7),
	(139, 'Arrowslinger', 'Deals 50%–110% of Yukong\'s ATK as Imaginary DMG to a target enemy.', 20, 0, 30, NULL, 26, 1, 1),
	(140, 'Emboldening Salvo', 'Obtains 2 stack(s) of "Roaring Bowstrings" (to a maximum of 2 stacks). When "Roaring Bowstrings" is active, the ATK of all allies increases by 40%–88%, and every time an ally\'s turn ends, Yukong loses 1 stack of "Roaring Bowstrings."\r\nWhen it\'s the turn where Yukong gains "Roaring Bowstrings" by using Skill, "Roaring Bowstrings" will not be removed.', 30, 0, 0, NULL, 26, 2, 7),
	(141, 'Diving Kestrel', 'If "Roaring Bowstrings" is active on Yukong when her Ultimate is used, additionally increases all allies\' CRIT Rate by 21%–29.4% and CRIT DMG by 39%–70.2%. At the same time, deals Imaginary DMG equal to 228%–410.4% of Yukong\'s ATK to a single enemy.', 5, 130, 90, NULL, 26, 3, 1),
	(142, 'Seven Layers, One Arrow', 'Basic ATK additionally deals Imaginary DMG equal to 40%–88% of Yukong\'s ATK, and increases the Toughness-Reducing DMG of this attack by 100%. This effect can be triggered again in 1 turn(s).', 0, 0, 0, NULL, 26, 4, 7),
	(143, 'Chasing the Wind', 'After using her Technique, Yukong enters Sprint mode for 20 seconds. In Sprint mode, her Movement SPD increases by 35%, and Yukong gains 2 stack(s) of "Roaring Bowstrings" when she enters battle by attacking enemies.', 0, 0, 0, NULL, 26, 5, 7),
	(144, 'Farewell Hit', 'Deals Physical DMG equal to 50%–110% of Trailblazer \'s ATK to a single enemy.', 20, 0, 30, NULL, 29, 1, 1),
	(145, 'RIP Home Run', 'Deals Physical DMG equal to 62.5%–137.5% of the Trailblazer\'s ATK to a single enemy and enemies adjacent to it.', 30, 0, 60, NULL, 29, 2, 3),
	(146, 'Stardust Ace	', 'Choose between two attack modes to deliver a full strike.', 5, 120, 60, NULL, 29, 3, 3),
	(147, 'Perfect Pickoff', 'Each time after this character inflicts Weakness Break on an enemy, ATK increases by 10%–22%. This effect stacks up to 2 time(s).', 0, 0, 0, NULL, 29, 4, 7),
	(148, 'Immortal Third Strike', 'Immediately heals all allies for 15% of their respective Max HP after using this Technique.', 0, 0, 0, NULL, 29, 5, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
