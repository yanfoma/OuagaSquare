-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 02 Mars 2018 à 01:03
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ouagasquare`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(50) NOT NULL,
  `resume_titre` varchar(100) NOT NULL,
  `full_titre` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `resume_titre`, `full_titre`, `created_at`, `updated_at`) VALUES
(1, 'TIC1', 'TIC def', '2018-03-01 14:33:50', '2018-03-01 14:33:50'),
(3, 'GC', 'Gestion de la Comptabilité', '2017-09-26 18:43:01', '2017-09-26 16:43:01');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(50) NOT NULL,
  `contenu` varchar(2500) NOT NULL,
  `projet_id` int(50) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `avatar` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `contenu`, `projet_id`, `nom`, `avatar`, `created_at`, `updated_at`) VALUES
(1, '1 - Dans cette dynamique, un Plan d’actions pour le Renforcement de la Gestion Budgétaire (PRGB) a vu le jour en 2002', 4, 'Florent', '1.jpg', '2018-03-01 23:55:06', '2017-07-26 23:41:11'),
(2, '2 - Dans cette dynamique, un Plan d’actions pour le Renforcement de la Gestion Budgétaire (PRGB) a vu le jour en 2002', 4, 'Balkoulga', '2.jpg', '2018-03-01 23:55:16', '2017-07-26 23:42:56'),
(3, '3 - Dans cette dynamique, un Plan d’actions pour le Renforcement de la Gestion Budgétaire (PRGB) a vu le jour en 2002', 4, 'Florent', '3.jpg', '2018-03-01 23:55:24', '2017-07-26 23:46:22'),
(27, '4 - Dans cette dynamique, un Plan d’actions pour le Renforcement de la Gestion Budgétaire (PRGB) a vu le jour en 2002', 12, 'Balkoulga', '4.jpg', '2018-03-02 00:27:05', '2017-10-09 11:49:19');

-- --------------------------------------------------------

--
-- Structure de la table `executeur`
--

CREATE TABLE `executeur` (
  `id` int(50) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `executeur`
--

INSERT INTO `executeur` (`id`, `libelle`, `adresse`, `created_at`, `updated_at`) VALUES
(1, 'Kabore Ali', '70012536', '2017-07-21 21:27:21', '2017-07-21 21:27:21');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(50) NOT NULL,
  `contenu` varchar(2000) NOT NULL,
  `destinataire` bigint(20) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `phase`
--

CREATE TABLE `phase` (
  `id` int(50) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `phase`
--

INSERT INTO `phase` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Début', '2017-07-21 20:56:02', '2017-07-21 20:56:02'),
(2, 'Exécution', '2017-07-21 20:56:19', '2017-07-21 20:56:19'),
(3, 'Fin', '2017-09-26 18:44:33', '2017-09-26 16:44:33');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(50) NOT NULL,
  `resume_titre` varchar(100) DEFAULT NULL,
  `full_titre` varchar(500) DEFAULT NULL,
  `contenu` longtext,
  `cout` int(50) DEFAULT NULL,
  `responsable_id` int(50) DEFAULT NULL,
  `executeur_id` int(50) DEFAULT NULL,
  `date_debut` varchar(100) DEFAULT NULL,
  `date_fin` varchar(100) DEFAULT NULL,
  `phase_id` int(50) DEFAULT NULL,
  `categorie_id` int(50) DEFAULT NULL,
  `avatar` varchar(2550) DEFAULT NULL,
  `vue` int(100) DEFAULT NULL,
  `fichier_joint` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `resume_titre`, `full_titre`, `contenu`, `cout`, `responsable_id`, `executeur_id`, `date_debut`, `date_fin`, `phase_id`, `categorie_id`, `avatar`, `vue`, `fichier_joint`, `created_at`, `updated_at`) VALUES
(1, 'PN', 'Programme national', 'Le ministère de l’Agriculture et des Aménagements Hydrauliques (MAAH) envisage de pallier aux difficultés liées à la remontée et à la consolidation des données de suivi dans le processus de gestion des projets et programmes. En effet, de nombreux manquements sont relevés au niveau du suivi des projets et programmes du fait de l’inexistence d’un système fiable de gestion des différents processus. Le projet d’informatisation du processus de gestion des projets objet de la présente manifestation à intérêt vise à combler le déficit constaté au niveau des outils en répondant aux exigences spécifiques du ministère marquées par : ?	la forte déconcentration de ses services nécessitant ainsi un système plus extensible et adapté à l’environnement ; ?	le nombre élevé des projets (une centaine en cours d’exécution) ; ?	la nécessaire automatisation des traitements garantissant l’intégrité des données et la fiabilisation des différents reportings ;', 2000000, 1, 1, '2018-02-21', '2018-02-23', 1, 1, '1.jpg', 102, '1.pdf', '2018-03-01 23:54:03', '2017-07-21 23:14:54'),
(2, 'PN2', 'Programme national3', 'Le Ministère de l’Economie et des Finances (MEF) a entrepris en 2000 de mener une réflexion afin de définir un cadre global et cohérent de réformes du système de gestion budgétaire. Dans cette dynamique, un Plan d’actions pour le Renforcement de la Gestion Budgétaire (PRGB) a vu le jour en 2002 avec pour objectif global d’« Améliorer durablement la transparence, la fiabilité et l’efficacité dans la gestion budgétaire ». L’amélioration de la transparence dans la gestion budgétaire prônée par le plan d’actions a fait ressortir la nécessité de la mise en place d’un outil de gestion de la comptabilité des matières.', 20000, 1, 1, '2018-02-25', '2018-02-27', 2, 1, '2.jpg', 87, '2.pdf', '2018-03-01 23:53:54', '2017-07-21 23:16:26'),
(4, 'Projet SEP', 'Suivi-Evaluation des Projets du MAAH', 'Le ministère de l’Agriculture et des Aménagements Hydrauliques (MAAH) envisage de pallier aux difficultés liées à la remontée et à la consolidation des données de suivi dans le processus de gestion des projets et programmes. En effet, de nombreux manquements sont relevés au niveau du suivi des projets et programmes du fait de l’inexistence d’un système fiable de gestion des différents processus. \nLe projet d’informatisation du processus de gestion des projets objet de la présente manifestation à intérêt  vise à combler le déficit constaté au niveau des outils en répondant aux exigences spécifiques du ministère marquées par :\n?	la forte déconcentration de ses services nécessitant ainsi un système plus extensible et adapté à l’environnement ; \n?	le nombre élevé des projets (une centaine en cours d’exécution) ;\n?	la nécessaire automatisation des traitements garantissant l’intégrité des données et la fiabilisation des différents reportings ; ', 500000, 1, 1, '2018-02-21', '2018-02-27', 2, 1, '3.jpg', 69, '3.pdf', '2018-03-02 00:22:32', '2018-03-02 00:22:32'),
(5, 'Projet GCM', 'Gestion de la Comptabilité Matières', 'Le Ministère de l’Economie et des Finances (MEF) a entrepris en 2000 de mener une réflexion afin de définir un cadre global et cohérent de réformes du système de gestion budgétaire. Dans cette dynamique, un Plan d’actions pour le Renforcement de la Gestion Budgétaire (PRGB) a vu le jour en 2002 avec pour objectif global d’« Améliorer durablement la transparence, la fiabilité et l’efficacité dans la gestion budgétaire ». \nL’amélioration de la transparence dans la gestion budgétaire prônée par le plan d’actions a fait ressortir la nécessité de la mise en place d’un outil de gestion de la comptabilité des matières. ', 2368420, 2, 1, '2018-02-20', '2018-02-28', 3, 3, '4.jpg', 128, '4.pdf', '2018-03-02 00:51:59', '2018-03-02 00:51:59');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `id` int(50) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `responsable`
--

INSERT INTO `responsable` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Ouédraogo Fabrice', '2017-09-26 19:03:25', '2017-09-26 17:03:25'),
(2, 'Ministère des TIC', '2017-07-21 21:16:45', '2017-07-21 21:16:45');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(6, 'Balkoulga', 'bfo226@gmail.com', '$2y$10$IRKGIrDSJI2fke4oPDbVY.tnPo65Y3IYL3LtH3gWXDrErZCz6bXjK', '2017-10-09 09:09:06', '2017-10-09 09:09:06'),
(4, 'Florent', 'Email2', '$2y$10$FbgONbg8WcfwDlRoYDmx8uJT2rVUV/oZvTfmAS4HNeTQWN7T3o83y\n', '2017-10-09 10:44:14', '2017-09-26 12:37:22');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `full_titre` (`full_titre`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `executeur`
--
ALTER TABLE `executeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phase`
--
ALTER TABLE `phase`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `full_titre` (`full_titre`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle_2` (`libelle`),
  ADD KEY `libelle` (`libelle`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `password_2` (`password`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `executeur`
--
ALTER TABLE `executeur`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `phase`
--
ALTER TABLE `phase`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
