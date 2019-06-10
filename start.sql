-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 juin 2019 à 01:13
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `start`
--

-- --------------------------------------------------------

--
-- Structure de la table `game_card`
--

DROP TABLE IF EXISTS `game_card`;
CREATE TABLE IF NOT EXISTS `game_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_link` varchar(50) NOT NULL,
  `game_name` varchar(50) NOT NULL,
  `card_picture` varchar(50) NOT NULL,
  `card_title` varchar(50) NOT NULL,
  `card_content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `game_card`
--

INSERT INTO `game_card` (`id`, `game_link`, `game_name`, `card_picture`, `card_title`, `card_content`) VALUES
(1, 'roulette_art', 'Roulette Art', 'start-logo4.png', 'hbhbi', 'ffcygv'),
(2, 'clean_art', 'Clean Art', 'LOGO-START.PNG', 'test', 'testnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn'),
(3, 'quiz_art', 'Quiz Art', 'start-logo.png', 'test', 'testnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn'),
(4, 'color_art', 'Color Art', 'no_image.png', 'test', 'testnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn'),
(5, 'puzzle_art', 'Puzzle Art', 'PAGE-ACCUEIL-START2.png', 'test', 'testnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn');

-- --------------------------------------------------------

--
-- Structure de la table `game_image`
--

DROP TABLE IF EXISTS `game_image`;
CREATE TABLE IF NOT EXISTS `game_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_link` varchar(50) NOT NULL,
  `game_name` varchar(50) NOT NULL,
  `work_of_art` varchar(100) NOT NULL,
  `img_file` text NOT NULL,
  `img_file_right` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `game_image`
--

INSERT INTO `game_image` (`id`, `game_link`, `game_name`, `work_of_art`, `img_file`, `img_file_right`, `description`) VALUES
(37, 'Clean_Art', 'Clean Art', 'lesTournesols', 'Les Tournesols - Vincent Van Gogh.PNG', NULL, ''),
(60, 'Color_Art', 'Color Art', 'MiroPlumes', 'Miro-Plumes-de-paon.png', NULL, 'test'),
(8, 'Quiz_Art', 'Quiz Art', 'La Joconde', 'start-logo.png', NULL, ''),
(9, 'Quiz_Art', 'Quiz Art', 'La liberté guidant le peuple', 'LOGO-START.PNG', NULL, ''),
(10, 'Quiz_Art', 'Quiz Art', 'La scène', 'LOGO-START.PNG', NULL, ''),
(11, 'Quiz_Art', 'Quiz Art', 'La Joconde', 'PAGE-ACCUEIL-START.png', NULL, ''),
(12, 'Quiz_Art', 'Quiz Art', 'La Joconde', 'no_image.png', NULL, ''),
(52, 'Puzzle_art', 'Puzzle_art', 'pompei', 'Hans-Hofmann-Pompeii.png', NULL, ''),
(51, 'Puzzle_art', 'Puzzle_art', 'bigBen', 'Derain-Big-ben.png', NULL, ''),
(50, 'Puzzle_art', 'Puzzle_art', 'marylineMonroe', 'Andy-Warhol-marylin-Monroe.png', NULL, ''),
(82, 'Roulette_Art', 'Roulette Art', 'g1', 'Gauche 1.png', 'Droite 1.png', ''),
(83, 'Roulette_Art', 'Roulette Art', 'g2', 'Gauche 2.png', 'Droite 2.png', ''),
(84, 'Roulette_Art', 'Roulette Art', 'g3', 'Gauche 3.png', 'Droite 3.png', ''),
(85, 'Roulette_Art', 'Roulette Art', 'g4', 'Gauche 4.png', 'Droite 4.png', ''),
(86, 'Roulette_Art', 'Roulette Art', 'g5', 'Gauche 5.png', 'Droite 5.png', ''),
(87, 'Roulette_Art', 'Roulette Art', 'g6', 'Gauche 6.png', 'Droite 6.png', ''),
(88, 'Roulette_Art', 'Roulette Art', 'g7', 'Gauche 7.png', 'Droite 7.png', ''),
(89, 'Roulette_Art', 'Roulette Art', 'g8', 'Gauche 8.png', 'Droite 8.png', ''),
(90, 'Roulette_Art', 'Roulette Art', 'g9', 'Gauche 9.png', 'Droite 9.png', ''),
(72, 'Emotion_Art', 'Emotion_Art', 'toulousseLautrec', 'Toulousse-Lautrec-le-chat.png', NULL, ''),
(33, 'Clean_Art', 'Clean Art', 'laJoconde', 'La Joconde - Léonard de Vinci .PNG', NULL, ''),
(34, 'Clean_Art', 'Clean Art', 'laVictoire', 'La Victoire de Samothrace.jpg', NULL, ''),
(35, 'Clean_Art', 'Clean Art', 'leBaiser', 'Le Baiser - Gustav Klimt.jpg', NULL, ''),
(36, 'Clean_Art', 'Clean Art', 'leCri', 'Le Cri - Edvard Munch.jpg', NULL, ''),
(38, 'Clean_Art', 'Clean Art', 'lesMuses', 'Les Muses Inquiétantes - Giorgio de Chirico.PNG', NULL, ''),
(39, 'Clean_Art', 'Clean Art', 'luckyStrick', 'Lucky strike - Keith Haring.jpg', NULL, ''),
(49, 'Puzzle_art', 'Puzzle_art', 'laVague', 'La-grand-vague-de-kanasawa.png', NULL, ''),
(54, 'Color_Art', 'Color Art', 'compositionC', 'Mondrian-composition-C.png', NULL, 'test'),
(59, 'Color_Art', 'Color Art', 'deuxSoeurs', 'deux-soeurs-sur-la-terrasse-Renoir.png', NULL, 'test'),
(57, 'Color_Art', 'Color Art', 'jauneRougeBleu', 'vassily-kandinsky-jaune-rouge-bleu.png', NULL, 'test'),
(71, 'Emotion_Art', 'Emotion_Art', 'orpheuAntonio', 'Orpheu-Antonio-Canovas.png', NULL, ''),
(64, 'Emotion_Art', 'Emotion_Art', 'balMoulin', 'bal_du_moulin_de_la_galetteRenoir.png', NULL, ''),
(65, 'Emotion_Art', 'Emotion_Art', 'caillebotteParis', 'Caillebotte_Rue_de_Paris.png', NULL, ''),
(66, 'Emotion_Art', 'Emotion_Art', 'degas', 'Degas.png', NULL, ''),
(67, 'Emotion_Art', 'Emotion_Art', 'eduardMuch', 'Eduard-Much-Melancolie.png', NULL, ''),
(68, 'Emotion_Art', 'Emotion_Art', 'laMeduse', 'La-Meduse-Caravage.png', NULL, ''),
(69, 'Emotion_Art', 'Emotion_Art', 'gauguinQuelles', 'Gauguin-Quelles-nouvelles.png', NULL, ''),
(70, 'Emotion_Art', 'Emotion_Art', 'docteurGachet', 'Van gogh docteur gachet.png', NULL, ''),
(95, 'Clean_Art', 'Clean Art', 'Test', 'bal_du_moulin_de_la_galetteRenoir1.png', NULL, 'blablabla');

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `player`
--

INSERT INTO `player` (`id`, `name`, `score`) VALUES
(1, 'Kamelaar', 172),
(2, 'Kamelaar', 177),
(3, 'Kamel', 171),
(4, 'Kamel', 171),
(5, 'Kamel', 166),
(6, 'Kamel', 166),
(7, 'Kamel', 166),
(8, 'Kamel', 166),
(9, 'Kamel', 166),
(10, 'Kamel', 166),
(11, 'Kamel', 166),
(12, 'Kamelaar', 178),
(13, 'Kamelaar', 183);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`) VALUES
(1, 'Administrateur', '$2y$10$OsFRhbU6BHDArHdd5obvKe8txGlxqWAZ5E89H1H0bcGHQkmjFifFC', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
