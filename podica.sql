-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 13 nov. 2022 à 16:55
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `podica`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `contenue` longtext NOT NULL,
  `illustration` varchar(100) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `date_publication` date NOT NULL DEFAULT current_timestamp(),
  `nb_signalement` int(11) DEFAULT NULL,
  `id_sous_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `id_categorie`, `titre`, `description`, `contenue`, `illustration`, `id_user`, `date_publication`, `nb_signalement`, `id_sous_categorie`) VALUES
(11, 1, 'Jean-Pierre Mortagne, voi', 'C\'Ã©tait la voix des commentaires sportifs sur FrÃ©quence Nord puis France Bleu Nord pendant prÃ¨s de 40 ans, Jean-Pierre Mortagne nous a...', 'C\'Ã©tait la voix des commentaires sportifs sur FrÃ©quence Nord puis France Bleu Nord pendant prÃ¨s de 40 ans, Jean-Pierre Mortagne nous a quittÃ©s. Il est dÃ©cÃ©dÃ© subitement ce mercredi Ã  l\'Ã¢ge de 74 ans.\r\n\r\nOn ne l\'entendra plus rÃ¢ler sur les arbitres, parler avec beaucoup d\'Ã©motion du LOSC, des filles du basket de Valenciennes-Orchies ou du pilote de rallye nordiste FranÃ§ois Delecour, Ã©voquer ses souvenirs du tour de France. L\'arbitre a sifflÃ© la fin du match pour Jean-Pierre Mortagne, &quot;Mumuche&quot; s\'est effondrÃ© ce mercredi Ã  l\'Ã¢ge de 74 ans.', NULL, 14, '2022-11-10', NULL, 3),
(12, 1, 'God of War RagnarÃ¶k : le', 'AprÃ¨s la claque du prÃ©cÃ©dent God of War infligÃ© au monde vidÃ©oludique, ce nouvel opus Ã©tait attendu de pied ferme. Celui qui peut prÃ©tendre au titre de jeu vidÃ©o de lâ€™annÃ©e', 'Le chauve le plus empli de testostÃ©rone de lâ€™histoire du jeu vidÃ©o est de retour. Comme son nom le laisse deviner, dans God of War : RagnarÃ¶k, Kratos sâ€™en va dÃ©cimer les dieux et dÃ©esses nordiques. Aux quatre coins du Valhalla, pÃ¨re et fils assistent au dÃ©chirement divin autour dâ€™Odin. Sans trop divulgÃ¢cher, RagnarÃ¶k cache en son sein surprises et rebondissements capables d\'Ã©tonner les plus aguerris de la licence.\r\n\r\nAvant mÃªme de dÃ©molir des mÃ¢choires divines, le jeu de Sony et Santa Monica fait dâ€™abord tomber les nÃ´tres. MalgrÃ© le cadre nordique, RagnarÃ¶k troque vite la neige contre dâ€™autres paysages laissant transparaÃ®tre tous les talents du studio, de la verdure Ã  la lave, aucun faux pas nâ€™est Ã  signalerâ€¦ sur next gen. Bien Ã©videmment, le jeu ne perd pas de sa splendeur sur PS4, mais il ne garantira pas le nombre de FPS que le mode performance procure sur la PS5.\r\n', NULL, 14, '2022-11-10', 100, 2),
(13, 1, 'DRX arrache son premier t', 'Finale Champions Lol DRX VS T1', 'Les Sud-CorÃ©ens de DRX ont remportÃ© leur premier titre de champions du monde de League of Legends tÃ´t ce dimanche matin, Ã  San Francisco. Un succÃ¨s acquis au terme d\'une finale complÃ¨tement folle contre leurs compatriotes de T1 (3-2). \r\n\r\nDRX Ã©tait dÃ©sormais clairement la meilleure formation des deux. Elle le prouvait lors de la suivante, facilement maÃ®trisÃ©e cette fois, pour revenir Ã  2-2.', NULL, 15, '2022-11-10', NULL, 2),
(14, 1, 'Nahida le nouvel ARCHON ', 'Genshin Impact : Nahida, l\'unitÃ© la plus rentable pour Hoyoverse ?\r\n\r\nOui et voila pourquoi :', 'Nahida est un succÃ¨s titanesque pour Mihoyo. La petite support dendro a rÃ©ussi Ã  prendre, avec Yoimiya dans la mÃªme banniÃ¨re la premiÃ¨re place du classement des unitÃ©s ayant gÃ©nÃ©rÃ© le plus dâ€™argent depuis la sortie du jeu. Les stats partagÃ©es par GenshinLab recensent les revenus gÃ©nÃ©rÃ©s par le marchÃ© chinois sur iOS et est un trÃ¨s bon indicateur, ayant fait ses preuves depuis longtemps.\r\n\r\nCependant Nahida arrive aussi juste aprÃ¨s lâ€™apparition dâ€™un nouvel Ã©lÃ©ment, et est le premier personnage qui pousse encore plus loin cette mÃ©canique dendro. Sa position de support Ã  forte application dendro est aussi un Ã©lÃ©ment trÃ¨s important dans lâ€™explication de son succÃ¨s. On peut dÃ©jÃ  imaginer de nombreuses teams lâ€™intÃ©grer et lâ€™utiliser pour complÃ¨tement changer le jeu des rÃ©actions Ã©lÃ©mentaires.', NULL, 15, '2022-11-10', NULL, 2),
(16, 2, 'Je suis un titre', 'je suis une description', 'je suis un contenue', NULL, 13, '2022-11-10', NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'Loisirs'),
(2, 'Progammation'),
(3, 'Outils professionnel'),
(4, 'High-Tech');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `pseudo_user` varchar(50) NOT NULL,
  `contenue_com` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `date_publication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `pseudo_user`, `contenue_com`, `id_user`, `id_article`, `date_publication`) VALUES
(2, 'mast2', 'qsfqsfqsfqsfqsfqsfqsfqsfqs', 11, 2, '2022-10-22'),
(3, 'mast', 'je te poste uin truc\r\n', 13, 7, '2022-11-09'),
(4, 'mast', 'bite\r\n', 13, 9, '2022-11-09'),
(5, 'Mehdi', 'Oh non RIP !', 14, 11, '2022-11-10'),
(6, 'Mehdi', 'Trop bien wesh !', 14, 12, '2022-11-10'),
(7, 'Alexandre', 'Lets gooooo , il a l\'air incroyable', 15, 12, '2022-11-10'),
(8, 'pierre', 'c\'est incroyable\r\n', 13, 16, '2022-11-10');

-- --------------------------------------------------------

--
-- Structure de la table `multimedia`
--

CREATE TABLE `multimedia` (
  `id_multimedia` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `signaler`
--

CREATE TABLE `signaler` (
  `id_signal` int(11) NOT NULL,
  `detail` text DEFAULT NULL,
  `motif` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_commentaire` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `signaler`
--

INSERT INTO `signaler` (`id_signal`, `detail`, `motif`, `id_user`, `id_article`, `id_commentaire`, `id_type`) VALUES
(1, NULL, ',4', 9, 2, 0, 0),
(6, NULL, ',1', 16, 12, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sous-categorie`
--

CREATE TABLE `sous-categorie` (
  `id_sous_categorie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sous-categorie`
--

INSERT INTO `sous-categorie` (`id_sous_categorie`, `nom`, `id_cat`) VALUES
(1, 'Esport', 1),
(2, 'Jeux-Video', 1),
(3, 'Sport', 1),
(4, 'Python', 2),
(5, 'Java', 2),
(6, 'Php', 2),
(7, 'Html', 2),
(8, 'Javascript', 2),
(9, 'Excell', 3),
(10, 'Photoshop', 3),
(11, 'Indesign', 3),
(12, 'Hardware', 4),
(13, 'Software', 4);

-- --------------------------------------------------------

--
-- Structure de la table `type-signaler`
--

CREATE TABLE `type-signaler` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `role` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `email`, `mdp`, `role`) VALUES
(1, 'podicadmin', 'podica.pro@gmail.com', 'bea9598d4a8f5171e44db194c2568c89', 'admin'),
(8, 'test', 'visiteurtest@gmail.com', '061bbb63afc4d9bc16788f7c3da76562', NULL),
(10, 'erwan', 'erwan@com', '061bbb63afc4d9bc16788f7c3da76562', NULL),
(11, 'mast2', 'mast2@com', '18219df54fdbf440e98f59a22c32d862', 'admin'),
(12, 'mast3', 'masst3@com', '18219df54fdbf440e98f59a22c32d862', NULL),
(13, 'pierre', 'mast@com', '18219df54fdbf440e98f59a22c32d862', 'admin'),
(14, 'Mehdi', 'mehdi@test.fr', '67a4621cfa4282229b680aadd448e477', NULL),
(15, 'Alexandre', 'alexandretriplets@gmail.com', '74d137bc1bb7e2abc6b11fcd66f8f672', NULL),
(16, 'Thierry', 'thierry130140@gmail.com', '74d137bc1bb7e2abc6b11fcd66f8f672', NULL),
(17, 'PIR', 'Pierre@com', '18219df54fdbf440e98f59a22c32d862', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id_multimedia`);

--
-- Index pour la table `signaler`
--
ALTER TABLE `signaler`
  ADD PRIMARY KEY (`id_signal`);

--
-- Index pour la table `sous-categorie`
--
ALTER TABLE `sous-categorie`
  ADD PRIMARY KEY (`id_sous_categorie`);

--
-- Index pour la table `type-signaler`
--
ALTER TABLE `type-signaler`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id_multimedia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `signaler`
--
ALTER TABLE `signaler`
  MODIFY `id_signal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `sous-categorie`
--
ALTER TABLE `sous-categorie`
  MODIFY `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `type-signaler`
--
ALTER TABLE `type-signaler`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
