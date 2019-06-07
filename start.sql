-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 juin 2019 à 12:55
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

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
  `img_dispo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `game_image`
--

INSERT INTO `game_image` (`id`, `game_link`, `game_name`, `work_of_art`, `img_file`, `img_dispo`) VALUES
(74, 'Roulette_Art', 'Roulette Art', 'd2', 'Droite 2.png', 'droite'),
(37, 'Clean_Art', 'Clean Art', 'lesTournesols', 'Les Tournesols - Vincent Van Gogh.PNG', NULL),
(3, 'Quiz_Art', 'Quiz Art', 'test3', 'logo-creteil.png', NULL),
(60, 'Color_Art', 'Color Art', 'MiroPlumes', 'Miro-Plumes-de-paon.png', NULL),
(75, 'Roulette_Art', 'Roulette Art', 'd3', 'Droite 3.png', 'droite'),
(8, 'Quiz_Art', 'Quiz Art', 'La Joconde', 'start-logo.png', NULL),
(9, 'Quiz_Art', 'Quiz Art', 'La liberté guidant le peuple', 'LOGO-START.PNG', NULL),
(10, 'Quiz_Art', 'Quiz Art', 'La scène', 'LOGO-START.PNG', NULL),
(11, 'Quiz_Art', 'Quiz Art', 'La Joconde', 'PAGE-ACCUEIL-START.png', NULL),
(12, 'Quiz_Art', 'Quiz Art', 'La Joconde', 'no_image.png', NULL),
(52, 'Puzzle_art', 'Puzzle_art', 'pompei', 'Hans-Hofmann-Pompeii.png', NULL),
(51, 'Puzzle_art', 'Puzzle_art', 'bigBen', 'Derain-Big-ben.png', NULL),
(50, 'Puzzle_art', 'Puzzle_art', 'marylineMonroe', 'Andy-Warhol-marylin-Monroe.png', NULL),
(76, 'Roulette_Art', 'Roulette Art', 'd4', 'Droite 4.png', 'droite'),
(77, 'Roulette_Art', 'Roulette Art', 'd5', 'Droite 5.png', 'droite'),
(78, 'Roulette_Art', 'Roulette Art', 'd6', 'Droite 6.png', 'droite'),
(79, 'Roulette_Art', 'Roulette Art', 'd7', 'Droite 7.png', 'droite'),
(80, 'Roulette_Art', 'Roulette Art', 'd8', 'Droite 8.png', 'droite'),
(81, 'Roulette_Art', 'Roulette Art', 'd9', 'Droite 9.png', 'droite'),
(72, 'Emotion_Art', 'Emotion_Art', 'toulousseLautrec', 'Toulousse-Lautrec-le-chat.png', NULL),
(33, 'Clean_Art', 'Clean Art', 'laJoconde', 'La Joconde - Léonard de Vinci .PNG', NULL),
(34, 'Clean_Art', 'Clean Art', 'laVictoire', 'La Victoire de Samothrace.jpg', NULL),
(35, 'Clean_Art', 'Clean Art', 'leBaiser', 'Le Baiser - Gustav Klimt.jpg', NULL),
(36, 'Clean_Art', 'Clean Art', 'leCri', 'Le Cri - Edvard Munch.jpg', NULL),
(38, 'Clean_Art', 'Clean Art', 'lesMuses', 'Les Muses Inquiétantes - Giorgio de Chirico.PNG', NULL),
(39, 'Clean_Art', 'Clean Art', 'luckyStrick', 'Lucky strike - Keith Haring.jpg', NULL),
(49, 'Puzzle_art', 'Puzzle_art', 'laVague', 'La-grand-vague-de-kanasawa.png', NULL),
(54, 'Color_Art', 'Color Art', 'compositionC', 'Mondrian-composition-C.png', NULL),
(59, 'Color_Art', 'Color Art', 'deuxSoeurs', 'deux-soeurs-sur-la-terrasse-Renoir.png', NULL),
(57, 'Color_Art', 'Color Art', 'jauneRougeBleu', 'vassily-kandinsky-jaune-rouge-bleu.png', NULL),
(71, 'Emotion_Art', 'Emotion_Art', 'orpheuAntonio', 'Orpheu-Antonio-Canovas.png', NULL),
(64, 'Emotion_Art', 'Emotion_Art', 'balMoulin', 'bal_du_moulin_de_la_galetteRenoir.png', NULL),
(65, 'Emotion_Art', 'Emotion_Art', 'caillebotteParis', 'Caillebotte_Rue_de_Paris.png', NULL),
(66, 'Emotion_Art', 'Emotion_Art', 'degas', 'Degas.png', NULL),
(67, 'Emotion_Art', 'Emotion_Art', 'eduardMuch', 'Eduard-Much-Melancolie.png', NULL),
(68, 'Emotion_Art', 'Emotion_Art', 'laMeduse', 'La-Meduse-Caravage.png', NULL),
(69, 'Emotion_Art', 'Emotion_Art', 'gauguinQuelles', 'Gauguin-Quelles-nouvelles.png', NULL),
(70, 'Emotion_Art', 'Emotion_Art', 'docteurGachet', 'Van gogh docteur gachet.png', NULL),
(73, 'Roulette_Art', 'Roulette Art', 'd1', 'Droite 1.png', 'droite');

-- --------------------------------------------------------

--
-- Structure de la table `game_instructions`
--

DROP TABLE IF EXISTS `game_instructions`;
CREATE TABLE IF NOT EXISTS `game_instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_link` varchar(20) NOT NULL,
  `img_file` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roulette_art`
--

DROP TABLE IF EXISTS `roulette_art`;
CREATE TABLE IF NOT EXISTS `roulette_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
