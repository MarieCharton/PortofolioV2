-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 05 Février 2021 à 11:29
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portofolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_github` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_in_progress` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`id`, `name`, `presentation`, `slug`, `progress`, `image1`, `image2`, `image3`, `image4`, `information`, `link`, `link_github`, `work_in_progress`) VALUES
(1, 'Espoir sur pattes V1', 'Ce projet est celui que j\'ai préparé en fin de formation lors du dernier mois. C\'est un projet d\'équipe sur lequel nous étions 4 initialement. Nous avons terminé à 2. J\'ai réalisé entièrement la partie back-end du site.Dans le cadre de ma formation, nous avons été amenés à travailler sur plusieurs types de projets, du très ludique, au plus professionnel.\r\n\r\nLe projet Espoir sur Pattes est né conjointement avec un camarade de ma promotion, sensible comme moi à la cause animale.\r\n\r\nL\'idée d\'un projet altruiste, de partage, et faisant avancer la cause s\'est imposé à moi comme une évidence. Il nous semblait réalisable dans le temps imparti (1 mois) et nous avions déjà, à l\'aube du projet une vision assez précise.\r\n\r\nC\'est pourquoi le développement de la base a été plutôt rapide: nous avons gardé de côté les évolutions possibles, nous avons souhaité que le site soit complet et surtout simple et fonctionnel pour son lancement.\r\n\r\nLe travail d\'équipe, lui, a été une grande expérience humaine avec ce qu\'il implique en termes de remise en question, partage, et concessions. Pour la partie technique, toute l\'équipe ayant choisi la spécialisation Symfony, nous avons donc opté pour un projet entièrement développé avec ce framework pour parcourir et réutiliser tout ce que nous avions appris au cours de la formation. Tout en gardant à l\'esprit que nous devrions, pour certaines parties du développement, sortir de notre zone de confort et apprendre encore de nouvelles techniques.', 'espoir-sur-pattes-v1', '#Sprint 0: \r\nPréparation des différents documents utiles : MCD , User Stories , Wireframes\r\n\r\n• Partie Front :\r\n- Intégration de la homepage\r\n- Intégration de la page News\r\n\r\n• Partie Back\r\n- Création des Entity\r\n- Création des Controller\r\n- Gestion des relations entre les entity\r\n- Découpage de l’intégration du front avec Twig en template\r\n\r\n#Sprint 2\r\n• Partie Front :\r\n- Mise en place du responsive \r\n\r\n• Partie Back\r\n- Création des formulaires : Inscription, Connexion, Signalement, ajout d’un article\r\n- Création des Assert  et contraintes\r\n\r\n#Sprint 3\r\n• Partie Front :\r\n- Mise en forme des formulaires et messages d’erreurs\r\n\r\n• Partie Back\r\n- Page Contact et mise en place mailer \r\n- Mise en place CRUD et Voters\r\n- Réalisation Carte de France en Javascript\r\n- Rêquetes Custom en DQL ', 'projet1-visuel.png', 'projet1-image1.png', 'projet1-image2.png', 'projet1-image3.png', 'Bundles Symfony utilisés sur le projet : \r\n\r\n• Symfony/form: Gestion et création des formulaires.\r\n\r\n• Symfony/profiler-pack: Affichage d’une barre de debug.\r\n\r\n• Symfony/google-mailer: Gestion et création du mailer pour la page contact et la possibilité de signaler un article.\r\n\r\n• Symfony/orm-pack: Installe les outils pour gerer la base de données grâce a Doctrine.\r\n\r\n• Symfony/twig-pack: Installation de Twig.\r\n\r\n• Symfony/Asset: Gère la génération d’URL, il permet de raccourcir les liens dans le projet avec un chemin plus direct.\r\n\r\n• Symfony/validator: Apporte le système de \"constraints\" Assert dans les entités.\r\n\r\n• Doctrine/doctrine-fixtures-bundles: Remplir une BDD rapidement avec l’aide du package \"fzaninotto/faker\".\r\n\r\n• Symfony/maker-bundle: Aide a créer des controllers, forms,entity, qu’il faut ensuite paramétrer.\r\n\r\n• Symfony/security-bundle: Permet l’encodage des passwords, et de configurer le systeme de secutité de notre application.', 'https://www.cedricpaje.fr/', 'https://github.com/O-clock-Y/projet-espoirs-sur-patte', 0),
(2, 'Espoir sur pattes V2', 'Ce projet est celui que j\'ai préparé pour la préparation de mon Titre Professionnel. Comme pour la V1 je n’avais pas réalisé la partie Front-end, j’ai voulu me confronter au problème pour maitriser parfaitement cette partie lors de mon oral de présentation.\r\nJ’ai voulu apprendre l’outil Sass que je ne connaissais pas et j’ai découvert les variables, les mixins, l’héritage, etc … Pour cette refonte j’ai également amélioré la carte en ajoutant un menu déroulant. Pour finir je n’ai pas utilisé Bootstrap. J’ai voulu créer des éléments de toute part pour travailler mon apprentissage de Sass. ', 'espoir-sur-pattes-v2', 'Les bases du projet étaient déjà faites. J’ai juste refondu et recréer toutes les pages en front avec Twig et Sass.\r\n\r\nCe site est encore en travail ( problème de taille d\'image a règler, visuel a refaire, etc ...)', 'projet2-visuel.png', 'projet2-image1.png', 'projet2-image2.png', 'projet2-image3.png', 'Bundles Symfony utilisés sur le projet : \r\n\r\n• Symfony/form: Gestion et création des formulaires.\r\n\r\n• Symfony/profiler-pack: Affichage d’une barre de debug.\r\n\r\n• Symfony/google-mailer: Gestion et création du mailer pour la page contact et la possibilité de signaler un article.\r\n\r\n• Symfony/orm-pack: Installe les outils pour gerer la base de données grâce a Doctrine.\r\n\r\n• Symfony/twig-pack: Installation de Twig.\r\n\r\n• Symfony/Asset: Gère la génération d’URL, il permet de raccourcir les liens dans le projet avec un chemin plus direct.\r\n\r\n• Symfony/validator: Apporte le système de \"constraints\" Assert dans les entités.\r\n\r\n• Doctrine/doctrine-fixtures-bundles: Remplir une BDD rapidement avec l’aide du package \"fzaninotto/faker\".\r\n\r\n• Symfony/maker-bundle: Aide a créer des controllers, forms,entity, qu’il faut ensuite paramétrer.\r\n\r\n• Symfony/security-bundle: Permet l’encodage des passwords, et de configurer le systeme de secutité de notre application.', 'https://espoirsurpattes.mariecharton.fr/', 'https://github.com/MarieCharton/EspoirSurPattes-TP', 0),
(3, 'Fais tes < dev > oirs !', 'J\'avais réalisé un premier portofolio à la sortie de ma formation. Avec un peu de recul, il ne me plaisait plus et était assez limité techniquement.\r\n\r\nJ\'ai voulu créer ce site avec une vraie identité. Avec une recherche de création d\'un logo, d\'un nom. La création de tous les contenus visuels à mon image, ne pas utiliser de photos prises sur internet. Travailler un peu le côté graphique. Un vrai projet de A à Z.\r\n\r\nAvec l\'ajout d\'une base de données pour ne pas avoir d\'informations en dur et pouvoir ajouter au quotidien des articles ou des exercices.\r\n\r\nPourquoi \"Fais tes <dev>oirs ?\" ? Car pour moi un développeur doit au quotidien s\'entrainer, se remettre en question .. travailler ... j\'ai donc cherché beaucoup de sites pour pouvoir m\'entraîner et, j\'ai voulu partager ces recherches et mon travail avec d\'autres développeurs, juniors ou non.\r\n\r\nCe site était aussi la pour apprendre le déploiement, c\'est quelque chose que j\'ai très peu étudié au long de la formation, j\'ai voulu voir s\'il m\'était possible de déployer en solo !', 'fais-tes-devoirs', '- Recherche d’un nom puis création d’un logo avec Canva. (article sur le blog concernant la recherche du logo )\r\n\r\n- Création de tout les dessins avec mon avatar pour un site plus personnel.\r\n\r\n- Création des Entités, Controller.\r\n\r\n- Mise en place de la base de données et des relations ( ManyToMany, ManyToOne, etc.)\r\n\r\n- Mise en place du formulaire de contact.\r\n\r\n- Création CRUD pour chaque entités.\r\n\r\n- Mise en place d’un espace login pour ajouter mes articles et mes exercices. ', 'projet3-visuel.png', 'projet3-image1.png', 'projet3-image2.png', 'projet3-image3.png', 'BDD gèrée avec PHPMYADMIN.\r\n\r\nCSS uniquement.\r\n\r\nCanva pour la création des logos et images et Photoshop pour la retouche.', 'http://www.mariecharton.fr/', 'https://github.com/MarieCharton/PortofolioV2', 0),
(4, 'Des étoiles dans la mer', 'Le site \"Des étoiles dans la mer\" est un site associatif pour mettre en avant la lutte contre le Glioblastome (cancer du cerveau).\r\nL\'association s\'est tournée vers moi pour l\'aider à mettre en place et administrer le site. J\'ai accepté cette mission à titre bénévole. ', 'des-etoiles-dans-la-mer', 'WORK IN PROGRESS', 'projet4.png', 'projet4.png', 'projet4.png', 'projet4.png', 'WORK IN PROGRESS', '', '', 1),
(5, 'My Ludispace', 'Ma grande passion pour le milieu ludique m\'a donné l\'idée de me créer une plateforme pour gèrer ce loisir plus facilement. \r\n\r\nAu programme : \r\n- une partie ludothèque avec mes jeux pour pouvoir les partager à mes amis s\'ils veulent m\'en emprunter un, ou partager une partie. \r\n- une partie escape Game avec des reviews des salles que j\'ai faites. \r\n- une partie blog avec des articles sur le milieu ludique.', 'my-ludispace', '', 'projet5.jpg', '', '', '', '', '', '', 1),
(6, 'Teddy pose', 'Site vitrine pour une entreprise de volets roulants,portes, fenêtres, etc...\r\nRéalisé pour un membre de ma famille.', 'teddy-pose', '', 'projet6.png', 'projet6.png', 'projet6.png', 'projet6.png', '', '', '', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
