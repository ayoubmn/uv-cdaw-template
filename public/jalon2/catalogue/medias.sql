-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : Dim 21 nov. 2021 à 21:28
-- Version du serveur :  8.0.22
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medias`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(606906473, 'Action', '2021-11-19 14:56:23', '2021-11-19 14:56:34'),
(606906474, 'Comedy', '2021-11-19 14:56:31', '2021-11-19 14:56:36'),
(606906476, 'Drama', '2021-11-19 22:12:29', '2021-11-19 22:12:34'),
(606906477, 'Fantasy', '2021-11-19 22:12:36', '2021-11-19 22:12:39'),
(606906478, 'Mystery', '2021-11-19 22:12:43', '2021-11-19 22:12:47'),
(606906479, 'Romance', '2021-11-19 22:12:50', '2021-11-19 22:12:53');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `name`, `category_id`, `url`, `avatar`, `duree`, `realisateur`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Avatar', 606906477, 'https://www.youtube.com/embed/5PSNL1qE6VY', 'https://fr.web.img6.acsta.net/medias/nmedia/18/78/95/70/19485155.jpg', '2:42', 'James Cameron', '2009', 'Un marine paraplégique envoyé sur la lune Pandora pour une mission unique est tiraillé entre suivre ses ordres et protéger le monde qu\'il considère le sien.', '2021-11-19 21:37:47', '2021-11-19 21:37:47'),
(2, 'Captain Marvel', 606906473, 'https://www.youtube.com/embed/Z1BCujX3pw8', 'https://static.posters.cz/image/750/affiches-et-posters/captain-marvel-epic-i71851.jpg', '2:03', 'Anna', '2018', 'Carol Danvers devient l\'une des super-héros les plus puissants de l\'univers lorsque la Terre est au coeur d\'une guerre galactique entre deux races extraterrestres.', '2021-11-19 21:41:20', '2021-11-19 22:16:25'),
(3, 'Avengers: Endgame', 606906473, 'https://www.youtube.com/embed/TcMBFSGVi1c', 'https://lumiere-a.akamaihd.net/v1/images/p_avengersendgame_19751_e14a0104.jpeg', '3:01', 'Anthony Russo', '2019', 'L\'intrigue n\'a pas encore été révélée. Ce film sera le quatrième volet de la série «Avengers».', '2021-11-19 21:41:23', '2021-11-19 21:41:23'),
(4, 'Titanic', 606906479, 'https://www.youtube.com/embed/Quf4qIkD3KY', 'https://m.media-amazon.com/images/M/MV5BMDdmZGU3NDQtY2E5My00ZTliLWIzOTUtMTY4ZGI1YjdiNjk3XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_.jpg', '3:14', 'James Cameron', '1997', 'Une aristocrate de dix-sept ans tombe amoureuse d\'un artiste pauvre au grand coeur à bord du luxueux Titanic.', '2021-11-19 21:43:08', '2021-11-19 21:43:08'),
(8, 'Star Wars: Episode VII - The Force Awakens', 606906473, 'https://www.youtube.com/embed/sGbxmsDFVnE', 'https://m.media-amazon.com/images/I/814X0lSCJQL._AC_SY445_.jpg', '2:04', 'Irvin Kershner', '1980', 'After the Rebels are brutally overpowered by the Empire on the ice planet Hoth, Luke Skywalker begins Jedi training with Yoda, while his friends are pursued across the galaxy by Darth Vader and bounty hunter Boba Fett.', '2021-11-21 21:17:07', '2021-11-21 21:17:07'),
(9, 'Avengers: Infinity War', 606906477, 'https://www.youtube.com/embed/6ZfuNTqbHE8', 'https://lumiere-a.akamaihd.net/v1/images/p_avengersinfinitywar_19871_cb171514.jpeg', '2:29', 'Anthony Russo', '2018', 'Les Avengers et leurs alliés devront être prêts à tout sacrifier pour tenter de vaincre le redoutable Thanos avant que son attaque éclair ne conduise à la destruction complète de l\'univers.', '2021-11-21 21:18:43', '2021-11-21 21:18:43'),
(10, 'The Lion King', 606906477, 'https://www.youtube.com/embed/GibiNy4d4gc', 'https://images-na.ssl-images-amazon.com/images/I/81WZJ-y1knL.jpg', '1:28', 'Roger Allers', '1994', 'Lion prince Simba and his father are targeted by his bitter uncle, who wants to ascend the throne himself.', '2021-11-21 21:20:06', '2021-11-21 21:20:06'),
(11, 'Furious 7', 606906473, 'https://www.youtube.com/embed/Skpu5HaVkOc', 'https://static.wikia.nocookie.net/fastandfurious/images/a/aa/FF7_officialposter.jpg', '2:17', 'James Wan', '2015', 'Deckard Shaw cherche à se venger de Dominic Toretto et de sa famille pour son frère dans le coma.', '2021-11-21 21:21:22', '2021-11-21 21:21:22'),
(12, 'Black', 606906473, 'https://www.youtube.com/embed/xjDjIWPwcPU', 'https://fr.web.img2.acsta.net/pictures/17/10/16/15/40/0883250.jpg', '2:14', 'Ryan', '2018', 'T\'Challa, héritier du royaume caché mais évolué de Wakanda, doit prendre les mesures nécessaires pour mener son peuple vers un nouvel avenir et affronter un adversaire du passé de son pays.', '2021-11-21 21:22:31', '2021-11-21 21:24:33'),
(13, 'Harry Potter and the Deathly Hallows: Part 2', 606906477, 'https://www.youtube.com/embed/5NYt1qirBWg', 'https://static.wikia.nocookie.net/harrypotter/images/9/95/Harry_Potter_and_the_Deathly_Hallows_Part_2_promotional_poster.jpg', '2:10', 'David Yates', '2011', 'Harry, Ron et Hermione recherchent les Horcruxes restants de Voldemort pour pouvoir détruire le Seigneur des Ténèbres alors que la bataille finale fait rage à Poudlard.', '2021-11-21 21:23:55', '2021-11-21 21:23:55');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_27_073728_create_categories_table', 1),
(6, '2021_11_18_103512_create_films_table', 2),
(7, '2021_11_18_175223_films_table', 3),
(8, '2021_11_19_133120_create_films_table', 4),
(9, '2021_11_19_205830_films_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `films_category_id_foreign` (`category_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606906480;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
