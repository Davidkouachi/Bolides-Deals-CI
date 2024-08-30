-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 30 août 2024 à 03:05
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bolides_deals`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `localisation` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `type_carburant` varchar(255) NOT NULL,
  `nbre_place` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `puiss_fiscal` varchar(255) NOT NULL,
  `annee` varchar(255) NOT NULL,
  `cylindre` varchar(255) NOT NULL,
  `type_annonce` varchar(255) NOT NULL,
  `neuf` varchar(255) NOT NULL,
  `hors_taxe` varchar(255) DEFAULT NULL,
  `kilometrage` varchar(255) DEFAULT NULL,
  `prix` varchar(255) NOT NULL,
  `nbre_refresh` int(11) NOT NULL DEFAULT 0,
  `date_refresh` varchar(255) DEFAULT NULL,
  `nbre_cle` varchar(255) DEFAULT NULL,
  `visite_techn` varchar(255) DEFAULT NULL,
  `assurance` varchar(255) DEFAULT NULL,
  `papier` varchar(255) DEFAULT NULL,
  `troc` varchar(255) DEFAULT NULL,
  `nbre_porte` varchar(255) NOT NULL,
  `negociable` varchar(255) DEFAULT NULL,
  `statut` varchar(255) NOT NULL,
  `date_hors_ligne` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `appel` varchar(255) NOT NULL,
  `sms` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `marque_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ville_id` bigint(20) UNSIGNED NOT NULL,
  `type_marque_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id`, `views`, `localisation`, `model`, `transmission`, `type_carburant`, `nbre_place`, `version`, `couleur`, `puiss_fiscal`, `annee`, `cylindre`, `type_annonce`, `neuf`, `hors_taxe`, `kilometrage`, `prix`, `nbre_refresh`, `date_refresh`, `nbre_cle`, `visite_techn`, `assurance`, `papier`, `troc`, `nbre_porte`, `negociable`, `statut`, `date_hors_ligne`, `whatsapp`, `appel`, `sms`, `uuid`, `description`, `marque_id`, `user_id`, `ville_id`, `type_marque_id`, `created_at`, `updated_at`) VALUES
(1, 0, 'quartier residencielle', 'mdx', 'manuelle', 'essence', '5', 'full option', 'Blanc', '14', '2022', '4', 'vente', 'oui', 'non', '24.556', '35.000.000', 0, NULL, '2', '2024-08-08', '2024-08-08', 'non', 'oui', '5', 'non', 'en ligne', NULL, NULL, '0585782723', '0585782723', '8bc73a52-6b1f-4844-b895-878659c66186', 'appel vite', 2, 1, 2, 1, '2024-08-28 22:55:15', '2024-08-29 00:22:07'),
(2, 0, 'Yopougon, maroc', 'A8', 'automatique', 'diesel', '5', 'standard', 'Marron', '12', '2015', '4', 'vente', 'oui', 'oui', '106.789', '25.000.000', 0, NULL, '1', '2024-08-28', '2024-08-28', 'non', 'non', '3', 'oui', 'en ligne', NULL, '0585782723', '0585782723', NULL, '08a526b4-c94e-4528-b6e6-9b357d5a28bb', 'appel vite', 4, 1, 3, 2, '2024-08-28 22:56:50', '2024-08-28 22:56:50'),
(3, 1, 'Yopougon, sideci', 'X7', 'manuelle', 'gas-oil', '7', 'sport', 'vert', '16', '2020', '8', 'vente', 'oui', 'non', '0', '70.500.000', 0, NULL, '2', '2024-08-28', '2024-08-28', 'non', 'non', '5', 'non', 'en ligne', NULL, NULL, '0585782723', NULL, '9819eb3b-3a18-47db-8e0b-69e36e481e30', 'appel vite', 6, 1, 6, 1, '2024-08-28 22:58:30', '2024-08-29 01:03:17'),
(4, 0, 'Yopougon, lubafrquie', 'eado', 'automatique', 'hybride', '5', 'standard', 'Blanc', '14', '2023', '6', 'vente', 'oui', 'non', '100', '20.500.000', 0, NULL, '2', '2024-09-08', '2024-09-08', 'non', 'non', '5', 'oui', 'en ligne', NULL, '0585782723', '0585782723', '0585782723', '85067ee1-6594-4d67-9bae-64c846f67bde', 'appel chap chap', 8, 1, 5, 3, '2024-08-28 23:00:18', '2024-08-29 00:15:31'),
(5, 0, 'Yopougon, lubafrquie', 'tiaggo', 'automatique', 'essence', '5', 'standard', 'grise', '9', '2021', '4', 'vente', 'oui', 'oui', '106.789', '40.500.000', 0, NULL, '2', '2024-08-28', '2024-08-28', 'non', 'oui', '5', 'non', 'en ligne', NULL, NULL, '0585782723', NULL, 'c5e421a8-4384-403f-84fb-7b9dad11472a', 'chap chap', 9, 1, 13, 6, '2024-08-28 23:01:51', '2024-08-28 23:01:51'),
(6, 0, 'Yopougon, maroc', 'camaro', 'automatique', 'essence', '5', 'sport', 'Blanc', '12', '2019', '4', 'location', 'oui', NULL, NULL, '75.000', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, 'en ligne', NULL, '0585782723', '0585782723', NULL, '901d4420-95e2-463b-991d-b5446807a9f3', 'DISPONIBLE', 10, 1, 2, 6, '2024-08-28 23:08:01', '2024-08-28 23:08:01'),
(7, 0, 'Yopougon, sideci', 'C4', 'automatique', 'essence', '5', 'standard', 'noir', '14', '2018', '6', 'location', 'non', NULL, NULL, '40.000', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, 'en ligne', NULL, NULL, '0585782723', '0585782723', '05339abd-8640-4ca2-b238-ff7b5b89b182', 'dispo', 12, 1, 2, 10, '2024-08-28 23:09:50', '2024-08-28 23:09:50'),
(8, 0, 'Yopougon, lubafrquie', 'duster', 'manuelle', 'electrique', '5', 'full option', 'bleu', '10', '2022', '4', 'location', 'oui', NULL, NULL, '60.000', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, 'en ligne', NULL, NULL, '0585782723', NULL, 'f4e8bcdf-1156-4ab7-833a-1338357ba647', 'chap chap', 14, 1, 6, 12, '2024-08-28 23:11:07', '2024-08-28 23:11:07'),
(9, 0, 'Yopougon, lubafrquie', 'challenge', 'automatique', 'essence', '3', 'sport', 'Rouge', '14', '2017', '6', 'location', 'non', NULL, NULL, '50.000', 0, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, 'en ligne', NULL, '0585782723', '0585782723', '0585782723', '7ce1b714-adb5-404d-8ae1-2dbfe1893828', 'appel vite', 15, 1, 4, 6, '2024-08-28 23:14:16', '2024-08-28 23:14:16'),
(10, 0, 'Yopougon, lubafrique', 'escape', 'automatique', 'essence', '5', 'standard', 'vert', '14', '2016', '6', 'location', 'non', NULL, NULL, '25.000', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, 'en ligne', NULL, NULL, '0585782723', NULL, '3e53c64c-1d92-4de1-9cbd-4a47783cbaf9', 'appel', 18, 1, 37, 10, '2024-08-28 23:15:34', '2024-08-28 23:15:34'),
(11, 0, 'Yopougon, lubafrique', 'camaro 2', 'automatique', 'essence', '2', 'sport', 'Rouge', '11', '2024', '4', 'vente', 'oui', 'non', '0', '60.500.000', 0, NULL, '2', '2024-09-08', '2024-09-08', 'oui', 'oui', '3', 'oui', 'en ligne', NULL, NULL, '0585782723', NULL, 'aa018348-2870-49a4-8355-2fab3d11d204', 'appel', 10, 1, 2, 6, '2024-08-29 16:19:01', '2024-08-29 16:19:01'),
(12, 0, 'Yopougon, lubafrique', 'C5', 'automatique', 'essence', '5', 'standard', 'Rouge', '11', '2015', '4', 'vente', 'non', 'non', '106.789', '10.500.000', 0, NULL, 'oui', '2024-08-29', '2024-08-29', 'non', 'non', '5', 'oui', 'en ligne', NULL, NULL, '0585782723', NULL, 'dcd0c7fb-f4f3-4997-9e32-39db35b2e37e', 'appel', 12, 1, 2, 10, '2024-08-29 16:55:46', '2024-08-29 17:14:04'),
(13, 0, 'quartier residencielle', 'rlx', 'manuelle', 'essence', '7', 'standard', 'bleu', '11', '2006', '4', 'location', 'non', NULL, NULL, '25.000', 0, NULL, NULL, NULL, NULL, NULL, NULL, '5', NULL, 'en ligne', NULL, '0585782723', '0585782723', NULL, 'd4e070b6-8e1c-4caf-9a41-bc556be3e26e', 'appel chap', 2, 1, 3, 9, '2024-08-29 16:59:02', '2024-08-29 16:59:02'),
(14, 10, 'quartier residencielle', 'B40 Plus', 'automatique', 'essence', '5', 'full option', 'Rouge', '9', '2024', '4', 'vente', 'oui', 'oui', '0', '35.000.000', 0, NULL, 'non', '2024-08-29', '2024-08-29', 'non', 'non', '5', 'oui', 'en ligne', NULL, NULL, '0585782723', '0585782723', '97df59d0-8b10-4d06-8712-9a73e589856e', 'appel chap', 5, 1, 2, 9, '2024-08-29 17:21:33', '2024-08-30 00:46:46');

-- --------------------------------------------------------

--
-- Structure de la table `annonce_errors`
--

CREATE TABLE `annonce_errors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `motif` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `annonce_photos`
--

CREATE TABLE `annonce_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_nom` varchar(255) NOT NULL,
  `image_chemin` varchar(255) NOT NULL,
  `annonce_id` bigint(20) UNSIGNED NOT NULL,
  `image_nbre` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `annonce_photos`
--

INSERT INTO `annonce_photos` (`id`, `image_nom`, `image_chemin`, `annonce_id`, `image_nbre`, `created_at`, `updated_at`) VALUES
(1, '1724885715_0Xhlv3l60a.2023_Acura_MDX_Overview_Features_Dynamic_Performance.jpg', 'public/images/1724885715_0Xhlv3l60a.2023_Acura_MDX_Overview_Features_Dynamic_Performance.jpg', 1, 1, '2024-08-28 22:55:15', '2024-08-28 22:55:15'),
(2, '1724885715_plAzt58jse.2023-acura-mdx-platinum-elite-02-msp.jpg', 'public/images/1724885715_plAzt58jse.2023-acura-mdx-platinum-elite-02-msp.jpg', 1, 2, '2024-08-28 22:55:15', '2024-08-28 22:55:15'),
(3, '1724885715_aZmWACp9qL.2023-MDX-Type-S-Advance-in-Platinum-White-Pearl.png', 'public/images/1724885715_aZmWACp9qL.2023-MDX-Type-S-Advance-in-Platinum-White-Pearl.png', 1, 3, '2024-08-28 22:55:15', '2024-08-28 22:55:15'),
(4, '1724885715_GTimN5BcFA.acura-mdx-type-s-2023-01-exterior-front-angle-oem-scaled.webp', 'public/images/1724885715_GTimN5BcFA.acura-mdx-type-s-2023-01-exterior-front-angle-oem-scaled.webp', 1, 4, '2024-08-28 22:55:15', '2024-08-28 22:55:15'),
(5, '1724885715_dGSZPBKcc3.mdx_majestic_black_pearl_800x500.png', 'public/images/1724885715_dGSZPBKcc3.mdx_majestic_black_pearl_800x500.png', 1, 5, '2024-08-28 22:55:15', '2024-08-28 22:55:15'),
(6, '1724885715_0KZTAdXkYm.mdx_majestic_black_pearl_800x500.png', 'public/images/1724885715_0KZTAdXkYm.mdx_majestic_black_pearl_800x500.png', 1, 6, '2024-08-28 22:55:16', '2024-08-28 22:55:16'),
(7, '1724885810_VWxt8fjAyh.2022-audi-a8-119-1644872294.jpg', 'public/images/1724885810_VWxt8fjAyh.2022-audi-a8-119-1644872294.jpg', 2, 1, '2024-08-28 22:56:51', '2024-08-28 22:56:51'),
(8, '1724885810_b2V4jwsp8E.2023-Audi-A8-42-front-three-quarter-view.webp', 'public/images/1724885810_b2V4jwsp8E.2023-Audi-A8-42-front-three-quarter-view.webp', 2, 2, '2024-08-28 22:56:51', '2024-08-28 22:56:51'),
(9, '1724885810_01e9ciK6KS.Audi-A8-50-TDI-8.jpg', 'public/images/1724885810_01e9ciK6KS.Audi-A8-50-TDI-8.jpg', 2, 3, '2024-08-28 22:56:51', '2024-08-28 22:56:51'),
(10, '1724885810_nTuVAhXmyL.Audi-A8-50-TDI-15.jpg', 'public/images/1724885810_nTuVAhXmyL.Audi-A8-50-TDI-15.jpg', 2, 4, '2024-08-28 22:56:51', '2024-08-28 22:56:51'),
(11, '1724885810_zwVpkij6EE.Audi-A8-L_01.jpg', 'public/images/1724885810_zwVpkij6EE.Audi-A8-L_01.jpg', 2, 5, '2024-08-28 22:56:51', '2024-08-28 22:56:51'),
(12, '1724885810_70xIxgfp8S.bab41a0972960f05ca972fd6b19d1454x.webp', 'public/images/1724885810_70xIxgfp8S.bab41a0972960f05ca972fd6b19d1454x.webp', 2, 6, '2024-08-28 22:56:51', '2024-08-28 22:56:51'),
(13, '1724885910_s9kPPpJQFv.2023-bmw-x7-001.webp', 'public/images/1724885910_s9kPPpJQFv.2023-bmw-x7-001.webp', 3, 1, '2024-08-28 22:58:30', '2024-08-28 22:58:30'),
(14, '1724885910_aVv5BWbjaD.2023-BMW-X7-Interior1.png', 'public/images/1724885910_aVv5BWbjaD.2023-BMW-X7-Interior1.png', 3, 2, '2024-08-28 22:58:30', '2024-08-28 22:58:30'),
(15, '1724885910_zmDRPyJcoP.2023-bmw-x7-xdrive40i.webp', 'public/images/1724885910_zmDRPyJcoP.2023-bmw-x7-xdrive40i.webp', 3, 3, '2024-08-28 22:58:30', '2024-08-28 22:58:30'),
(16, '1724885910_tOBwnRAqas.bmw-x7-1-jpg-6419cf05da71d-jpg.webp', 'public/images/1724885910_tOBwnRAqas.bmw-x7-1-jpg-6419cf05da71d-jpg.webp', 3, 4, '2024-08-28 22:58:30', '2024-08-28 22:58:30'),
(17, '1724885910_pkokzkUCZa.bmw-x7-nose-and-side.jpg', 'public/images/1724885910_pkokzkUCZa.bmw-x7-nose-and-side.jpg', 3, 5, '2024-08-28 22:58:30', '2024-08-28 22:58:30'),
(18, '1724885910_y0XzHiaEEJ.img-8170-jpg-6418aa50cc285-jpg.webp', 'public/images/1724885910_y0XzHiaEEJ.img-8170-jpg-6418aa50cc285-jpg.webp', 3, 6, '2024-08-28 22:58:30', '2024-08-28 22:58:30'),
(19, '1724886018_63VQmsQG1w.changan-cs75-plus-2021-main-1606989324.jpg', 'public/images/1724886018_63VQmsQG1w.changan-cs75-plus-2021-main-1606989324.jpg', 4, 1, '2024-08-28 23:00:18', '2024-08-28 23:00:18'),
(20, '1724886018_sURhwVEYNY.changan-cs75-plus4220d0eb-8b0c-432d-9c82-960163140d44.webp', 'public/images/1724886018_sURhwVEYNY.changan-cs75-plus4220d0eb-8b0c-432d-9c82-960163140d44.webp', 4, 2, '2024-08-28 23:00:18', '2024-08-28 23:00:18'),
(21, '1724886018_DwoolCz8vh.Changan-CS75-Plus-Car-2023-Third-Generation-1-5t-Automatic-Luxury-Model.webp', 'public/images/1724886018_DwoolCz8vh.Changan-CS75-Plus-Car-2023-Third-Generation-1-5t-Automatic-Luxury-Model.webp', 4, 3, '2024-08-28 23:00:18', '2024-08-28 23:00:18'),
(22, '1724886018_Fl5RIQt8OI.in_643ee1c6253131681842630.jpeg', 'public/images/1724886018_Fl5RIQt8OI.in_643ee1c6253131681842630.jpeg', 4, 4, '2024-08-28 23:00:18', '2024-08-28 23:00:18'),
(23, '1724886018_xeq8kQ9crZ.l-1652353470.7071-627ce9beaca4c.webp', 'public/images/1724886018_xeq8kQ9crZ.l-1652353470.7071-627ce9beaca4c.webp', 4, 5, '2024-08-28 23:00:19', '2024-08-28 23:00:19'),
(24, '1724886018_NSmnFOBJTv.out_6264fe945d7bb1650785940.jpg', 'public/images/1724886018_NSmnFOBJTv.out_6264fe945d7bb1650785940.jpg', 4, 6, '2024-08-28 23:00:19', '2024-08-28 23:00:19'),
(25, '1724886111_5O88kA6qeq.2022-C.webp', 'public/images/1724886111_5O88kA6qeq.2022-C.webp', 5, 1, '2024-08-28 23:01:52', '2024-08-28 23:01:52'),
(26, '1724886111_jrQdF7BXP9.chery-.webp', 'public/images/1724886111_jrQdF7BXP9.chery-.webp', 5, 2, '2024-08-28 23:01:52', '2024-08-28 23:01:52'),
(27, '1724886111_LZmW0WnuAw.chery-arrizo-8-1.jpg', 'public/images/1724886111_LZmW0WnuAw.chery-arrizo-8-1.jpg', 5, 3, '2024-08-28 23:01:52', '2024-08-28 23:01:52'),
(28, '1724886111_LxQBaBRUX1.chery-omoda-5.webp', 'public/images/1724886111_LxQBaBRUX1.chery-omoda-5.webp', 5, 4, '2024-08-28 23:01:52', '2024-08-28 23:01:52'),
(29, '1724886111_LXRSHZai4y.chery-tiggo-4-pro-base-model.jpg', 'public/images/1724886111_LXRSHZai4y.chery-tiggo-4-pro-base-model.jpg', 5, 5, '2024-08-28 23:01:52', '2024-08-28 23:01:52'),
(30, '1724886111_qvrnwY6G0F.s61.webp', 'public/images/1724886111_qvrnwY6G0F.s61.webp', 5, 6, '2024-08-28 23:01:52', '2024-08-28 23:01:52'),
(31, '1724886481_uNrTayVQPJ.22CHCA35014_V3_960x500.jpg', 'public/images/1724886481_uNrTayVQPJ.22CHCA35014_V3_960x500.jpg', 6, 1, '2024-08-28 23:08:01', '2024-08-28 23:08:01'),
(32, '1724886481_2aIoaa3ilk.2016-chevrolet-camaro-ss-049.jpg', 'public/images/1724886481_2aIoaa3ilk.2016-chevrolet-camaro-ss-049.jpg', 6, 2, '2024-08-28 23:08:01', '2024-08-28 23:08:01'),
(33, '1724886481_jJgUE6uxli.2024-chevrolet-new-models.webp', 'public/images/1724886481_jJgUE6uxli.2024-chevrolet-new-models.webp', 6, 3, '2024-08-28 23:08:01', '2024-08-28 23:08:01'),
(34, '1724886481_hthu9ya2Ws.2024-chevrolet-traverse-z71.jpg', 'public/images/1724886481_hthu9ya2Ws.2024-chevrolet-traverse-z71.jpg', 6, 4, '2024-08-28 23:08:01', '2024-08-28 23:08:01'),
(35, '1724886481_5ItsMpFKye.105232079-2018-Chevrolet-Camaro-ZL1-033.jpg', 'public/images/1724886481_5ItsMpFKye.105232079-2018-Chevrolet-Camaro-ZL1-033.jpg', 6, 5, '2024-08-28 23:08:01', '2024-08-28 23:08:01'),
(36, '1724886481_X9BdCPUwRA.Make-Matters-Interesting-Facts-about-Chevrolet-B-14-06-1024x640.jpg', 'public/images/1724886481_X9BdCPUwRA.Make-Matters-Interesting-Facts-about-Chevrolet-B-14-06-1024x640.jpg', 6, 6, '2024-08-28 23:08:01', '2024-08-28 23:08:01'),
(37, '1724886590_ew2dSRDw0x.97-citroen-e-c4x-front-quarter-2022_0.webp', 'public/images/1724886590_ew2dSRDw0x.97-citroen-e-c4x-front-quarter-2022_0.webp', 7, 1, '2024-08-28 23:09:50', '2024-08-28 23:09:50'),
(38, '1724886590_FMpwHmxZ0q.C5-Aircross-bleu_rework.jpg', 'public/images/1724886590_FMpwHmxZ0q.C5-Aircross-bleu_rework.jpg', 7, 2, '2024-08-28 23:09:50', '2024-08-28 23:09:50'),
(39, '1724886590_3Qcoh0FBqU.citroen-c4-cactus-first-drive-review-car-and-driver-photo-653647-s-original.jpg', 'public/images/1724886590_3Qcoh0FBqU.citroen-c4-cactus-first-drive-review-car-and-driver-photo-653647-s-original.jpg', 7, 3, '2024-08-28 23:09:50', '2024-08-28 23:09:50'),
(40, '1724886590_7MjegLrw9F.Citroen-C5-X_022-e1618281115368.webp', 'public/images/1724886590_7MjegLrw9F.Citroen-C5-X_022-e1618281115368.webp', 7, 4, '2024-08-28 23:09:51', '2024-08-28 23:09:51'),
(41, '1724886590_onDMrOTS39.share-now-infleeting-citroenC3-1_ID_8557.webp', 'public/images/1724886590_onDMrOTS39.share-now-infleeting-citroenC3-1_ID_8557.webp', 7, 5, '2024-08-28 23:09:51', '2024-08-28 23:09:51'),
(42, '1724886590_PGnq2JzbKT.C5-Aircross-bleu_rework.jpg', 'public/images/1724886590_PGnq2JzbKT.C5-Aircross-bleu_rework.jpg', 7, 6, '2024-08-28 23:09:51', '2024-08-28 23:09:51'),
(43, '1724886667_yIvt2NqoFM.20719_507.jpg', 'public/images/1724886667_yIvt2NqoFM.20719_507.jpg', 8, 1, '2024-08-28 23:11:07', '2024-08-28 23:11:07'),
(44, '1724886667_jq5zjRDyHP.c29836e229.jpg', 'public/images/1724886667_jq5zjRDyHP.c29836e229.jpg', 8, 2, '2024-08-28 23:11:07', '2024-08-28 23:11:07'),
(45, '1724886667_1At4gvuzff.Dacia_Logan_2023_Front_2_(cropped).jpg', 'public/images/1724886667_1At4gvuzff.Dacia_Logan_2023_Front_2_(cropped).jpg', 8, 3, '2024-08-28 23:11:07', '2024-08-28 23:11:07'),
(46, '1724886667_xgn5WwIVsJ.Dacia-Duster-2023.webp', 'public/images/1724886667_xgn5WwIVsJ.Dacia-Duster-2023.webp', 8, 4, '2024-08-28 23:11:07', '2024-08-28 23:11:07'),
(47, '1724886667_9ufK0BwAMf.e6a4bd3549.jpg', 'public/images/1724886667_9ufK0BwAMf.e6a4bd3549.jpg', 8, 5, '2024-08-28 23:11:07', '2024-08-28 23:11:07'),
(48, '1724886667_elfP3zR6MY.zsedr.jpeg', 'public/images/1724886667_elfP3zR6MY.zsedr.jpeg', 8, 6, '2024-08-28 23:11:07', '2024-08-28 23:11:07'),
(49, '1724886856_AoKDrdeOoM.2023_Dodge_Challenger_Angular_Front_1.jpg', 'public/images/1724886856_AoKDrdeOoM.2023_Dodge_Challenger_Angular_Front_1.jpg', 9, 1, '2024-08-28 23:14:17', '2024-08-28 23:14:17'),
(50, '1724886856_GbI2gd2WFX.107103919-1660581384623-DG022_007MMvbuelk733k0leths8qttqfoo07.jpg', 'public/images/1724886856_GbI2gd2WFX.107103919-1660581384623-DG022_007MMvbuelk733k0leths8qttqfoo07.jpg', 9, 2, '2024-08-28 23:14:17', '2024-08-28 23:14:17'),
(51, '1724886856_KjUuNvRz6K.220817165501-01-dodge-electric-muscle-car.jpg', 'public/images/1724886856_KjUuNvRz6K.220817165501-01-dodge-electric-muscle-car.jpg', 9, 3, '2024-08-28 23:14:17', '2024-08-28 23:14:17'),
(52, '1724886856_ZImCVpe7eY.Car-history-Dodge-Challenger-Cover-27-05.jpg', 'public/images/1724886856_ZImCVpe7eY.Car-history-Dodge-Challenger-Cover-27-05.jpg', 9, 4, '2024-08-28 23:14:17', '2024-08-28 23:14:17'),
(53, '1724886856_iZNNGWPbOw.dodge-hornet-2024-phase-1-hp-bento_c4b603d1cbbb078076dac3ec4d64bd0b-2496x1248.jpg', 'public/images/1724886856_iZNNGWPbOw.dodge-hornet-2024-phase-1-hp-bento_c4b603d1cbbb078076dac3ec4d64bd0b-2496x1248.jpg', 9, 5, '2024-08-28 23:14:17', '2024-08-28 23:14:17'),
(54, '1724886856_RuyKC05YWq.images.jpeg', 'public/images/1724886856_RuyKC05YWq.images.jpeg', 9, 6, '2024-08-28 23:14:17', '2024-08-28 23:14:17'),
(55, '1724886934_7Tio1vmGrU.2024_ford_f-150_crew-cab-pickup_lariat_fq_oem_1_1600.jpg', 'public/images/1724886934_7Tio1vmGrU.2024_ford_f-150_crew-cab-pickup_lariat_fq_oem_1_1600.jpg', 10, 1, '2024-08-28 23:15:34', '2024-08-28 23:15:34'),
(56, '1724886934_2y1AboWkMA.107238183-1683642530891-All-New_Ford_Ranger_Raptor_12.jpg', 'public/images/1724886934_2y1AboWkMA.107238183-1683642530891-All-New_Ford_Ranger_Raptor_12.jpg', 10, 2, '2024-08-28 23:15:35', '2024-08-28 23:15:35'),
(57, '1724886934_K5tKmR5KAg.230509104454-02-ford-ranger-reveal.jpg', 'public/images/1724886934_K5tKmR5KAg.230509104454-02-ford-ranger-reveal.jpg', 10, 3, '2024-08-28 23:15:35', '2024-08-28 23:15:35'),
(58, '1724886934_DlgTR0NPLI.636519786314510593-18-FUSI-SE-34FrntPassStaticRooftop-mj.webp', 'public/images/1724886934_DlgTR0NPLI.636519786314510593-18-FUSI-SE-34FrntPassStaticRooftop-mj.webp', 10, 4, '2024-08-28 23:15:35', '2024-08-28 23:15:35'),
(59, '1724886934_ihfkUJgc3e.cq5dam.web.768.768.webp', 'public/images/1724886934_ihfkUJgc3e.cq5dam.web.768.768.webp', 10, 5, '2024-08-28 23:15:35', '2024-08-28 23:15:35'),
(60, '1724886934_tpUpX2ufWL.images.jpeg', 'public/images/1724886934_tpUpX2ufWL.images.jpeg', 10, 6, '2024-08-28 23:15:35', '2024-08-28 23:15:35'),
(61, '1724948341_1MFXlJYvSe.22CHCA35014_V3_960x500.jpg', 'public/images/1724948341_1MFXlJYvSe.22CHCA35014_V3_960x500.jpg', 11, 1, '2024-08-29 16:19:01', '2024-08-29 16:19:01'),
(62, '1724948341_eT7uuMOiFd.2016-chevrolet-camaro-ss-049.jpg', 'public/images/1724948341_eT7uuMOiFd.2016-chevrolet-camaro-ss-049.jpg', 11, 2, '2024-08-29 16:19:01', '2024-08-29 16:19:01'),
(63, '1724948341_SaiwEhgQDC.2024-chevrolet-new-models.webp', 'public/images/1724948341_SaiwEhgQDC.2024-chevrolet-new-models.webp', 11, 3, '2024-08-29 16:19:01', '2024-08-29 16:19:01'),
(64, '1724948341_Lq1icGqvdm.2024-chevrolet-traverse-z71.jpg', 'public/images/1724948341_Lq1icGqvdm.2024-chevrolet-traverse-z71.jpg', 11, 4, '2024-08-29 16:19:01', '2024-08-29 16:19:01'),
(65, '1724948341_ZiBI0TQavR.105232079-2018-Chevrolet-Camaro-ZL1-033.jpg', 'public/images/1724948341_ZiBI0TQavR.105232079-2018-Chevrolet-Camaro-ZL1-033.jpg', 11, 5, '2024-08-29 16:19:01', '2024-08-29 16:19:01'),
(66, '1724948341_h2IvdbDuNH.Make-Matters-Interesting-Facts-about-Chevrolet-B-14-06-1024x640.jpg', 'public/images/1724948341_h2IvdbDuNH.Make-Matters-Interesting-Facts-about-Chevrolet-B-14-06-1024x640.jpg', 11, 6, '2024-08-29 16:19:01', '2024-08-29 16:19:01'),
(67, '1724951645_vZDevB0oQQ.97-citroen-e-c4x-front-quarter-2022_0.webp', 'public/images/1724951645_vZDevB0oQQ.97-citroen-e-c4x-front-quarter-2022_0.webp', 12, 1, '2024-08-29 16:55:46', '2024-08-29 17:14:05'),
(68, '1724950546_BB2fxt93Ir.C5-Aircross-bleu_rework.jpg', 'public/images/1724950546_BB2fxt93Ir.C5-Aircross-bleu_rework.jpg', 12, 2, '2024-08-29 16:55:46', '2024-08-29 16:55:46'),
(69, '1724950546_WhlHNnrE1V.Citroen-C5-X_022-e1618281115368.webp', 'public/images/1724950546_WhlHNnrE1V.Citroen-C5-X_022-e1618281115368.webp', 12, 3, '2024-08-29 16:55:46', '2024-08-29 16:55:46'),
(70, '1724950546_6NhwN8tVOO.citroen-c4-cactus-first-drive-review-car-and-driver-photo-653647-s-original.jpg', 'public/images/1724950546_6NhwN8tVOO.citroen-c4-cactus-first-drive-review-car-and-driver-photo-653647-s-original.jpg', 12, 4, '2024-08-29 16:55:46', '2024-08-29 16:55:46'),
(71, '1724950546_1TVQXvRvvR.share-now-infleeting-citroenC3-1_ID_8557.webp', 'public/images/1724950546_1TVQXvRvvR.share-now-infleeting-citroenC3-1_ID_8557.webp', 12, 5, '2024-08-29 16:55:46', '2024-08-29 16:55:46'),
(72, '1724950546_ooNVfOnu1b.citroen-c4-driving-front-480x270px.jpg', 'public/images/1724950546_ooNVfOnu1b.citroen-c4-driving-front-480x270px.jpg', 12, 6, '2024-08-29 16:55:46', '2024-08-29 16:55:46'),
(73, '1724951557_huoePO4Ems.2023_Acura_MDX_Overview_Features_Dynamic_Performance.jpg', 'public/images/1724951557_huoePO4Ems.2023_Acura_MDX_Overview_Features_Dynamic_Performance.jpg', 13, 1, '2024-08-29 16:59:03', '2024-08-29 17:12:37'),
(74, '1724950743_ewFLmHML6L.2023-acura-mdx-platinum-elite-02-msp.jpg', 'public/images/1724950743_ewFLmHML6L.2023-acura-mdx-platinum-elite-02-msp.jpg', 13, 2, '2024-08-29 16:59:03', '2024-08-29 16:59:03'),
(75, '1724950743_H6QZN86AQQ.2023-MDX-Type-S-Advance-in-Platinum-White-Pearl.png', 'public/images/1724950743_H6QZN86AQQ.2023-MDX-Type-S-Advance-in-Platinum-White-Pearl.png', 13, 3, '2024-08-29 16:59:03', '2024-08-29 16:59:03'),
(76, '1724950743_mwDPSOe5hq.mdx_majestic_black_pearl_800x500.png', 'public/images/1724950743_mwDPSOe5hq.mdx_majestic_black_pearl_800x500.png', 13, 4, '2024-08-29 16:59:03', '2024-08-29 16:59:03'),
(77, '1724950743_5Frr5Wl45J.acura-mdx-type-s-2023-01-exterior-front-angle-oem-scaled.webp', 'public/images/1724950743_5Frr5Wl45J.acura-mdx-type-s-2023-01-exterior-front-angle-oem-scaled.webp', 13, 5, '2024-08-29 16:59:03', '2024-08-29 16:59:03'),
(78, '1724950743_orWsSj57ax.JDPA_202.webp', 'public/images/1724950743_orWsSj57ax.JDPA_202.webp', 13, 6, '2024-08-29 16:59:03', '2024-08-29 16:59:03'),
(79, '1724952093_5RXNhoklXL.20231206_173148_bis.webp', 'public/images/1724952093_5RXNhoklXL.20231206_173148_bis.webp', 14, 1, '2024-08-29 17:21:33', '2024-08-29 17:21:33'),
(80, '1724952093_hOYrKjvCqK.BAIC SA - Website images.jpg', 'public/images/1724952093_hOYrKjvCqK.BAIC SA - Website images.jpg', 14, 2, '2024-08-29 17:21:33', '2024-08-29 17:21:33'),
(81, '1724952093_NMrdnxroJc.BAIC SA - Website images2.jpg', 'public/images/1724952093_NMrdnxroJc.BAIC SA - Website images2.jpg', 14, 3, '2024-08-29 17:21:33', '2024-08-29 17:21:33'),
(82, '1724952093_yfePrZOlhu.Baic.jpg', 'public/images/1724952093_yfePrZOlhu.Baic.jpg', 14, 4, '2024-08-29 17:21:33', '2024-08-29 17:21:33'),
(83, '1724952093_Qxh5vj9qaQ.BAIC-BJ40-Exterior-1s.jpg', 'public/images/1724952093_Qxh5vj9qaQ.BAIC-BJ40-Exterior-1s.jpg', 14, 5, '2024-08-29 17:21:33', '2024-08-29 17:21:33'),
(84, '1724952163_8YRcvmT8je.678980-700x467.jpg', 'public/images/1724952163_8YRcvmT8je.678980-700x467.jpg', 14, 6, '2024-08-29 17:21:33', '2024-08-29 17:22:43');

-- --------------------------------------------------------

--
-- Structure de la table `annonce_refreshes`
--

CREATE TABLE `annonce_refreshes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_refresh` varchar(255) NOT NULL,
  `annonce_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact_users`
--

CREATE TABLE `contact_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_nom` varchar(255) NOT NULL,
  `image_chemin` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `image_nom`, `image_chemin`, `marque`, `created_at`, `updated_at`) VALUES
(1, 'toyota.webp', 'public/images/toyota.webp', 'TOYOTA', '2024-08-28 22:35:27', '2024-08-28 22:36:36'),
(2, 'acura.jpg', 'public/images/acura.jpg', 'ACURA', '2024-08-28 22:36:57', '2024-08-28 22:36:57'),
(3, 'Alfa romeo.png', 'public/images/Alfa romeo.png', 'ALFA ROMEO', '2024-08-28 22:37:10', '2024-08-28 22:37:10'),
(4, 'audi.png', 'public/images/audi.png', 'AUDI', '2024-08-28 22:37:39', '2024-08-28 22:37:39'),
(5, 'baic.png', 'public/images/baic.png', 'BAIC', '2024-08-28 22:37:52', '2024-08-28 22:37:52'),
(6, 'bmw.png', 'public/images/bmw.png', 'BMW', '2024-08-28 22:38:05', '2024-08-28 22:38:05'),
(7, 'Buick.png', 'public/images/Buick.png', 'BUICK', '2024-08-28 22:38:17', '2024-08-28 22:38:17'),
(8, 'changan.webp', 'public/images/changan.webp', 'CHANGAN', '2024-08-28 22:38:35', '2024-08-28 22:38:35'),
(9, 'chery.webp', 'public/images/chery.webp', 'CHERY', '2024-08-28 22:38:47', '2024-08-28 22:38:47'),
(10, 'chevrolet.png', 'public/images/chevrolet.png', 'CHEVROLET', '2024-08-28 22:39:11', '2024-08-28 22:39:11'),
(11, 'chrysler.png', 'public/images/chrysler.png', 'CHRYSLER', '2024-08-28 22:39:32', '2024-08-28 22:39:32'),
(12, 'citroën.webp', 'public/images/citroën.webp', 'CITRÖEN', '2024-08-28 22:39:57', '2024-08-28 22:39:57'),
(13, 'cupra.webp', 'public/images/cupra.webp', 'CUPRA', '2024-08-28 22:40:14', '2024-08-28 22:40:14'),
(14, 'Dacia.png', 'public/images/Dacia.png', 'DACIA', '2024-08-28 22:40:26', '2024-08-28 22:40:26'),
(15, 'dodge.jpg', 'public/images/dodge.jpg', 'DODGE', '2024-08-28 22:40:42', '2024-08-28 22:40:42'),
(16, 'ds.png', 'public/images/ds.png', 'DS', '2024-08-28 22:40:56', '2024-08-28 22:40:56'),
(17, 'fiat.jpg', 'public/images/fiat.jpg', 'FIAT', '2024-08-28 22:41:13', '2024-08-28 22:41:13'),
(18, 'ford.webp', 'public/images/ford.webp', 'FORD', '2024-08-28 22:41:25', '2024-08-28 22:41:25'),
(19, 'Forthing.jpg', 'public/images/Forthing.jpg', 'FORTHING', '2024-08-28 22:41:41', '2024-08-28 22:41:41'),
(20, 'foton.png', 'public/images/foton.png', 'FOTON', '2024-08-28 22:41:55', '2024-08-28 22:41:55'),
(21, 'gac.png', 'public/images/gac.png', 'GAC', '2024-08-28 22:42:06', '2024-08-28 22:42:06'),
(22, 'geely.webp', 'public/images/geely.webp', 'GEELY', '2024-08-28 22:42:17', '2024-08-28 22:42:17'),
(23, 'Genesis.jpg', 'public/images/Genesis.jpg', 'GENESIS', '2024-08-28 22:42:31', '2024-08-28 22:42:31'),
(24, 'gmc.png', 'public/images/gmc.png', 'GMC', '2024-08-28 22:42:43', '2024-08-28 22:42:43'),
(25, 'great wall.webp', 'public/images/great wall.webp', 'GREAT WALL', '2024-08-28 22:42:56', '2024-08-28 22:42:56'),
(26, 'haval.jpg', 'public/images/haval.jpg', 'HAVAL', '2024-08-28 22:43:15', '2024-08-28 22:43:15'),
(27, 'honda.webp', 'public/images/honda.webp', 'HONDA', '2024-08-28 22:43:31', '2024-08-28 22:43:31'),
(28, 'hyundai.webp', 'public/images/hyundai.webp', 'HYUNDAI', '2024-08-28 22:43:45', '2024-08-28 22:43:45'),
(29, 'infinity.jpg', 'public/images/infinity.jpg', 'INFINITI', '2024-08-28 22:43:58', '2024-08-28 22:43:58'),
(30, 'isuzu.png', 'public/images/isuzu.png', 'ISUZU', '2024-08-28 22:44:15', '2024-08-28 22:44:15'),
(31, 'jac.webp', 'public/images/jac.webp', 'JAC', '2024-08-28 22:44:44', '2024-08-28 22:44:44'),
(32, 'jaguar.jpeg', 'public/images/jaguar.jpeg', 'JAGUAR', '2024-08-28 22:45:04', '2024-08-28 22:45:04'),
(33, 'jeep.png', 'public/images/jeep.png', 'JEEP', '2024-08-28 22:45:18', '2024-08-28 22:45:18'),
(34, 'jetour.png', 'public/images/jetour.png', 'JETOUR', '2024-08-28 22:45:31', '2024-08-28 22:45:31'),
(35, 'kia.png', 'public/images/kia.png', 'KIA', '2024-08-28 22:45:44', '2024-08-28 22:45:44'),
(36, 'lexus.png', 'public/images/lexus.png', 'LEXUS', '2024-08-28 22:46:01', '2024-08-28 22:46:01'),
(37, 'mazda.webp', 'public/images/mazda.webp', 'MAZDA', '2024-08-28 22:46:17', '2024-08-28 22:46:17'),
(38, 'merceders-benz.webp', 'public/images/merceders-benz.webp', 'MERCEDERS-BENZ', '2024-08-28 22:46:31', '2024-08-28 22:46:31'),
(39, 'mg.webp', 'public/images/mg.webp', 'MG', '2024-08-28 22:46:42', '2024-08-28 22:46:42'),
(40, 'mitsubishi.webp', 'public/images/mitsubishi.webp', 'MITSUBIGHI', '2024-08-28 22:47:04', '2024-08-28 22:47:04'),
(41, 'nissan.webp', 'public/images/nissan.webp', 'NISSAN', '2024-08-28 22:47:20', '2024-08-28 22:47:20'),
(42, 'opel.jpg', 'public/images/opel.jpg', 'OPEL', '2024-08-28 22:47:37', '2024-08-28 22:47:37'),
(43, 'peugeot.webp', 'public/images/peugeot.webp', 'PEUGEOT', '2024-08-28 22:47:52', '2024-08-28 22:47:52'),
(44, 'range rover.png', 'public/images/range rover.png', 'RANGE ROVER', '2024-08-28 22:48:09', '2024-08-28 22:48:09'),
(45, 'renault.webp', 'public/images/renault.webp', 'RENAULT', '2024-08-28 22:48:22', '2024-08-28 22:48:22'),
(46, 'seat.jpg', 'public/images/seat.jpg', 'SEAT', '2024-08-28 22:48:41', '2024-08-28 22:48:41'),
(47, 'SKODA.png', 'public/images/SKODA.png', 'SKODA', '2024-08-28 22:48:56', '2024-08-28 22:48:56'),
(48, 'Subaru.jpg', 'public/images/Subaru.jpg', 'SUBARU', '2024-08-28 22:49:11', '2024-08-28 22:49:11'),
(49, 'suziki.webp', 'public/images/suziki.webp', 'SUZIKI', '2024-08-28 22:49:24', '2024-08-28 22:49:24'),
(50, 'volkswagen.jpg', 'public/images/volkswagen.jpg', 'VOLKSWAGEN', '2024-08-28 22:49:48', '2024-08-28 22:49:48'),
(51, 'Volvo.png', 'public/images/Volvo.png', 'VOLVO', '2024-08-28 22:50:05', '2024-08-28 22:50:05'),
(52, 'Bugatti.png', 'public/images/Bugatti.png', 'BUGATTI', '2024-08-29 12:21:50', '2024-08-29 12:21:50'),
(53, 'Abarth.png', 'public/images/Abarth.png', 'ABARTH', '2024-08-29 12:21:59', '2024-08-29 12:21:59'),
(54, 'Aston Martin.jpg', 'public/images/Aston Martin.jpg', 'ASTON MARTIN', '2024-08-29 12:22:42', '2024-08-29 12:22:42');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(32, '0001_00_00_000000_create_villes_table', 1),
(33, '0001_01_00_000000_create_roles_table', 1),
(34, '0001_01_01_000000_create_users_table', 1),
(35, '0001_01_01_000001_create_cache_table', 1),
(36, '0001_01_01_000002_create_jobs_table', 1),
(37, '2024_08_08_224545_create_marques_table', 1),
(38, '2024_08_09_205750_create_contact_users_table', 1),
(39, '2024_08_12_121758_create_phpmailer_errors_table', 1),
(40, '2024_08_13_190213_create_type_marques_table', 1),
(41, '2024_08_13_190214_create_annonces_table', 1),
(42, '2024_08_13_190308_create_annonce_refreshes_table', 1),
(43, '2024_08_13_190309_create_annonce_photos_table', 1),
(44, '2024_08_13_190310_create_annonce_errors_table', 1),
(45, '2024_08_14_221743_create_suggestions_table', 1),
(46, '2024_08_26_171437_create_parametrages_table', 1),
(47, '2024_08_28_125651_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `parametrages`
--

CREATE TABLE `parametrages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nbre_jours_ligne` int(11) NOT NULL DEFAULT 0,
  `nbre_jours_delete` int(11) NOT NULL DEFAULT 0,
  `nbre_refresh` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parametrages`
--

INSERT INTO `parametrages` (`id`, `nbre_jours_ligne`, `nbre_jours_delete`, `nbre_refresh`, `created_at`, `updated_at`) VALUES
(1, 30, 5, 2, '2024-08-28 13:02:30', '2024-08-28 23:11:57');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `click` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `click`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'davidkouachi01@gmail.com', 'AwR4mVhxCf8QLqUAW0k3Cw6egqp3LnReiSyOuCHPryyDsaPjvqCkRXHyqucA', 1, 3, '2024-08-28 13:07:29', '2024-08-28 13:10:24');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `phpmailer_errors`
--

CREATE TABLE `phpmailer_errors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRATEUR', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(2, 'UTILISATEUR', '2024-08-28 13:02:30', '2024-08-28 13:02:30');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('16rd9yjMk0shTBOBhaN0ssR1sIJCNVdJIjhPxNBl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicE5NMHpySGpNSXBlR0N2MFBqTlR3RjQ1Ym1DQXFMMEFOdXBKSmNYVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9Bbm5vbmNlcz9tYXJxdWU9NCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1724978405),
('DCsm5YxTGKbl7qmAdNBxhIuStOxbac4Nx6Fvvbcb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3BLamlhb05BS2ZqZFpneUE0MnQ5blE2NVY3MVNzWVd2b0FmbnQ5TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1724976657),
('iKuCKCYB1ml2s4IdEm1euRdwJIHbt3npc6ZoFaP4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTVlEajc2SXZxb05GSFBYWVRybHZPbnJNbUZ1NUtLc3g4eTZ2M0g0aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJyb2xlIjtPOjE1OiJBcHBcTW9kZWxzXFJvbGUiOjMwOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjU6InJvbGVzIjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6NDp7czoyOiJpZCI7aToxO3M6Mzoibm9tIjtzOjE0OiJBRE1JTklTVFJBVEVVUiI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNC0wOC0yOCAxMzowMjozMCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNC0wOC0yOCAxMzowMjozMCI7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjQ6e3M6MjoiaWQiO2k6MTtzOjM6Im5vbSI7czoxNDoiQURNSU5JU1RSQVRFVVIiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjQtMDgtMjggMTM6MDI6MzAiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjQtMDgtMjggMTM6MDI6MzAiO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjA6e31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjEzOiJ1c2VzVW5pcXVlSWRzIjtiOjA7czo5OiIAKgBoaWRkZW4iO2E6MDp7fXM6MTA6IgAqAHZpc2libGUiO2E6MDp7fXM6MTE6IgAqAGZpbGxhYmxlIjthOjI6e2k6MDtzOjI6ImlkIjtpOjE7czozOiJub20iO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO319czoyMjoic2Vzc2lvbl90aW1lX3JlbWFpbmluZyI7aTo2MDtzOjEzOiJsYXN0X2FjdGl2aXR5IjtpOjE3MjQ5NzY0OTc7fQ==', 1724976497),
('KexQGiVvclml7iiLM1zDgvkS6mslwBMlHt9kjaZ9', NULL, '192.168.1.3', 'Mozilla/5.0 (Linux; Android 10; SM-G9600 Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/127.0.6533.103 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkI5aThocXlDNkRFOW85S2t5N3dpZ0Q3N3cxTkJudVc0eWhXZmZociI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHA6Ly8xOTIuMTY4LjEuMjo4MDAwL0RldGFpbCUyMEFubm9uY2VzLzk3ZGY1OWQwLThiMTAtNGQwNi04NzEyLTlhNzNlNTg5ODU2ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1724974597),
('UzaMGAoeS7PAdIFgx8ijTpv8xRRJqYA3mAKCXK1u', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzZaN292MkZONEZlenZTRE0yYUlCczM5WW55SDRUVWY5Ym9od3gwYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvQW5ub25jZXM/YW5uZWU9dG91dCZrbV9tYXg9JmttX21pbj0mbWFycXVlPXRvdXQmbW9kZWw9JnByaXhfbWF4PSZwcml4X21pbj0mdHlwZV9hbm5vbmNlPXRvdXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1724978591),
('VUaRwaD8vhRQvQbmSXqDJT7tXVzK9UIZ3sQEaZeJ', NULL, '192.168.1.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTV5ZGtna2VsVnRmcEI5MHEyRGRRYVlweGFZdDVOblhuVkdEYjJDeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHA6Ly8xOTIuMTY4LjEuMjo4MDAwL0RldGFpbCUyMEFubm9uY2VzLzk3ZGY1OWQwLThiMTAtNGQwNi04NzEyLTlhNzNlNTg5ODU2ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1724975311),
('xCjxMtl7jOnTqIH6mObRx10S8xBfYQDkv8atIK93', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibU8yaU9FVVhLcXRjdHNkSUJWUzBwaGhvbFBxbDZ2bHVoMVFna1NtdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9EZXRhaWwlMjBBbm5vbmNlcy85N2RmNTlkMC04YjEwLTRkMDYtODcxMi05YTczZTU4OTg1NmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1724978806);

-- --------------------------------------------------------

--
-- Structure de la table `signal_annonces`
--

CREATE TABLE `signal_annonces` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `motif` text NOT NULL,
  `annonce_uuid` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lu` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_marques`
--

CREATE TABLE `type_marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_marques`
--

INSERT INTO `type_marques` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, '4x4', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(2, 'berline', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(3, 'break', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(4, 'bus', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(5, 'camion', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(6, 'coupé', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(7, 'mini-bus', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(8, 'moto', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(9, 'pick-up', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(10, 'suv', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(11, 'tricycle', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(12, 'utilitaire', '2024-08-28 13:02:30', '2024-08-28 13:02:30'),
(13, 'autre', '2024-08-28 13:02:30', '2024-08-28 13:02:30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lock` varchar(255) NOT NULL,
  `nbre_lock` int(11) NOT NULL DEFAULT 0,
  `date_lock` varchar(255) DEFAULT NULL,
  `date_unlock` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `update_mdp` int(11) NOT NULL DEFAULT 0,
  `date_mdp` varchar(255) DEFAULT NULL,
  `image_nom` varchar(255) DEFAULT NULL,
  `image_chemin` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `phone`, `email`, `lock`, `nbre_lock`, `date_lock`, `date_unlock`, `email_verified_at`, `password`, `adresse`, `update_mdp`, `date_mdp`, `image_nom`, `image_chemin`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'DAVID', 'KOUACHI CHRIS EMMANUEL', '0585782723', 'admin@gmail.com', 'non', 0, NULL, NULL, NULL, '$2y$12$dgUb291RCihZRVI5d8Y7Lu5K5XYOpyNUBObSODYq4EsBegZ8urLhm', 'Néant', 0, '2024-08-28 13:02:30', NULL, NULL, 1, NULL, '2024-08-28 13:02:31', '2024-08-29 17:44:11'),
(2, 'Vender', 'vendeur', '0585782725', 'vendeur@gmail.com', 'non', 0, NULL, NULL, NULL, '$2y$12$EVgR2DenyXeIAD89ZQOFs.O.yin51pMAkBbCPFU.vAxGPocDPX.qO', 'Néant', 0, '2024-08-28 13:02:31', NULL, NULL, 2, NULL, '2024-08-28 13:02:31', '2024-08-28 13:02:31'),
(3, 'EMMANUEL', 'DAVID', '0585782722', 'davidkouachi01@gmail.com', 'non', 0, NULL, NULL, NULL, '$2y$12$K7y13Boq93WgOjrTGr.hveaphw6RQbSMUefh6z/OOa5TLJgUOxCRe', 'COCODY, RIVERA ABATTA', 1, '2024-08-28 13:10:24', '1724850690.1c430f1d-bf31-4b7e-a406-8e149b594ad3.jpg', 'public/images/1724850690.1c430f1d-bf31-4b7e-a406-8e149b594ad3.jpg', 2, NULL, '2024-08-28 13:03:55', '2024-08-28 13:11:30');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Abengourou', '2024-08-28 13:02:31', '2024-08-28 13:02:31'),
(2, 'Abidjan', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(3, 'Aboisso', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(4, 'Adiaké', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(5, 'Adzopé', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(6, 'Agnibilékrou', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(7, 'Akoupé', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(8, 'Arrah', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(9, 'Bangolo', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(10, 'Bassawa', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(11, 'Bettié', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(12, 'Bocanda', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(13, 'Bondoukou', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(14, 'Bonoua', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(15, 'Botro', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(16, 'Bouaké', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(17, 'Bouna', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(18, 'Boundiali', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(19, 'Dabou', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(20, 'Daloa', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(21, 'Danané', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(22, 'Daoukro', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(23, 'Dianra', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(24, 'Dimbokro', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(25, 'Divo', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(26, 'Duekoué', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(27, 'Facobly', '2024-08-28 13:02:32', '2024-08-28 13:02:32'),
(28, 'Ferkessédougou', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(29, 'Gagnoa', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(30, 'Grand-Bassam', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(31, 'Grand-Lahou', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(32, 'Gouiné', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(33, 'Guiglo', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(34, 'Guitry', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(35, 'Gbon', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(36, 'Issia', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(37, 'Jacqueville', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(38, 'Katiola', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(39, 'Kong', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(40, 'Korhogo', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(41, 'Kounahiri', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(42, 'Kouassi-Datékro', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(43, 'Kouibly', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(44, 'Lakota', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(45, 'Lomokankro', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(46, 'Man', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(47, 'Mankono', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(48, 'Marcory', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(49, 'Méagui', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(50, 'Minignan', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(51, 'M’Bahiakro', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(52, 'Nassian', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(53, 'Niakaramandougou', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(54, 'Odienné', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(55, 'Oumé', '2024-08-28 13:02:33', '2024-08-28 13:02:33'),
(56, 'Ouellé', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(57, 'San-Pédro', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(58, 'Sakassou', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(59, 'Samoé', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(60, 'Sassandra', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(61, 'Séguéla', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(62, 'Sikensi', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(63, 'Sinfra', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(64, 'Sipilou', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(65, 'Soubré', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(66, 'Tabou', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(67, 'Tanda', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(68, 'Tiassalé', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(69, 'Tiapoum', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(70, 'Tiébissou', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(71, 'Tengréla', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(72, 'Toulepleu', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(73, 'Touba', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(74, 'Toumodi', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(75, 'Transua', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(76, 'Vavoua', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(77, 'Yamoussoukro', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(78, 'Zouan-Hounien', '2024-08-28 13:02:34', '2024-08-28 13:02:34'),
(79, 'Zoukougbeu', '2024-08-28 13:02:34', '2024-08-28 13:02:34');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `annonces_uuid_unique` (`uuid`),
  ADD KEY `annonces_marque_id_foreign` (`marque_id`),
  ADD KEY `annonces_user_id_foreign` (`user_id`),
  ADD KEY `annonces_ville_id_foreign` (`ville_id`),
  ADD KEY `annonces_type_marque_id_foreign` (`type_marque_id`);

--
-- Index pour la table `annonce_errors`
--
ALTER TABLE `annonce_errors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annonce_errors_user_id_foreign` (`user_id`);

--
-- Index pour la table `annonce_photos`
--
ALTER TABLE `annonce_photos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `annonce_photos_image_nom_unique` (`image_nom`),
  ADD UNIQUE KEY `annonce_photos_image_chemin_unique` (`image_chemin`),
  ADD KEY `annonce_photos_annonce_id_foreign` (`annonce_id`);

--
-- Index pour la table `annonce_refreshes`
--
ALTER TABLE `annonce_refreshes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `annonce_refreshes_date_refresh_unique` (`date_refresh`),
  ADD KEY `annonce_refreshes_annonce_id_foreign` (`annonce_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `contact_users`
--
ALTER TABLE `contact_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_users_user_id_foreign` (`user_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marques_image_nom_unique` (`image_nom`),
  ADD UNIQUE KEY `marques_image_chemin_unique` (`image_chemin`),
  ADD UNIQUE KEY `marques_marque_unique` (`marque`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametrages`
--
ALTER TABLE `parametrages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_user_id_foreign` (`user_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `phpmailer_errors`
--
ALTER TABLE `phpmailer_errors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phpmailer_errors_email_index` (`email`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_nom_unique` (`nom`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `signal_annonces`
--
ALTER TABLE `signal_annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_marques`
--
ALTER TABLE `type_marques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_marques_nom_unique` (`nom`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_image_nom_unique` (`image_nom`),
  ADD UNIQUE KEY `users_image_chemin_unique` (`image_chemin`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `villes_nom_unique` (`nom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `annonce_errors`
--
ALTER TABLE `annonce_errors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `annonce_photos`
--
ALTER TABLE `annonce_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `annonce_refreshes`
--
ALTER TABLE `annonce_refreshes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact_users`
--
ALTER TABLE `contact_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `parametrages`
--
ALTER TABLE `parametrages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `phpmailer_errors`
--
ALTER TABLE `phpmailer_errors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `signal_annonces`
--
ALTER TABLE `signal_annonces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_marques`
--
ALTER TABLE `type_marques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_marque_id_foreign` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`),
  ADD CONSTRAINT `annonces_type_marque_id_foreign` FOREIGN KEY (`type_marque_id`) REFERENCES `type_marques` (`id`),
  ADD CONSTRAINT `annonces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `annonces_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`);

--
-- Contraintes pour la table `annonce_errors`
--
ALTER TABLE `annonce_errors`
  ADD CONSTRAINT `annonce_errors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `annonce_photos`
--
ALTER TABLE `annonce_photos`
  ADD CONSTRAINT `annonce_photos_annonce_id_foreign` FOREIGN KEY (`annonce_id`) REFERENCES `annonces` (`id`);

--
-- Contraintes pour la table `annonce_refreshes`
--
ALTER TABLE `annonce_refreshes`
  ADD CONSTRAINT `annonce_refreshes_annonce_id_foreign` FOREIGN KEY (`annonce_id`) REFERENCES `annonces` (`id`);

--
-- Contraintes pour la table `contact_users`
--
ALTER TABLE `contact_users`
  ADD CONSTRAINT `contact_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
