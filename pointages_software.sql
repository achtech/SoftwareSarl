-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 22 déc. 2018 à 16:04
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pointages_software`
--

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `id` int(11) NOT NULL,
  `id_personnels` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `Libelle` text NOT NULL,
  `nbrJour` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id`, `id_personnels`, `date_debut`, `date_fin`, `Libelle`, `nbrJour`) VALUES
(8, 8, '2018-01-31', '2018-01-31', 'Retard', 1),
(9, 8, '2018-02-05', '2018-02-05', 'Inconnue', 1),
(10, 8, '2018-03-19', '2018-03-19', 'Inconnue', 2),
(12, 8, '2018-04-02', '2018-04-02', 'Retard', 1),
(13, 8, '2018-03-30', '2018-03-30', 'Retard', 1),
(14, 3, '2018-01-08', '2018-01-11', 'Conge', 4),
(15, 3, '2018-02-05', '2018-02-09', 'Conge', 5),
(16, 4, '2018-01-24', '2018-01-24', 'Conge', 1),
(17, 4, '2018-04-09', '2018-04-16', 'Conge', 6),
(18, 5, '2018-01-22', '2018-01-23', 'Conge', 2),
(19, 5, '2018-02-12', '2018-02-16', 'Conge', 5),
(21, 7, '2018-02-01', '2018-02-01', 'Conge', 1),
(22, 7, '2018-04-02', '2018-04-04', 'Conge', 3),
(23, 2, '2014-08-18', '2014-08-29', 'Conge', 10),
(24, 2, '2014-12-12', '2014-12-16', 'Weeding party', 2),
(25, 2, '2016-05-05', '2016-05-06', 'Conge', 2),
(26, 2, '2015-09-28', '2015-10-14', 'Conge', 13),
(27, 2, '2016-09-15', '2016-09-16', 'Conge', 2),
(28, 2, '2017-03-17', '2017-03-17', 'Conge', 1),
(29, 2, '2017-05-15', '2017-05-21', 'Conge', 5),
(30, 2, '2017-06-06', '2017-06-06', 'Conge', 0),
(31, 2, '2017-06-09', '2017-06-09', 'Conge', 1),
(32, 2, '2017-08-04', '2017-08-04', 'Conge', 0),
(33, 2, '2017-09-04', '2017-09-10', 'Conge', 5),
(34, 2, '2016-12-05', '2016-12-16', 'Conge payé', 10),
(35, 3, '2018-06-06', '2018-06-06', 'Conge', 1),
(36, 8, '2018-07-05', '2018-07-05', 'Conge ', 1),
(38, 2, '2014-11-24', '2014-11-25', 'Conge', 2),
(40, 2, '2017-11-10', '2017-11-10', 'Conge', 1),
(41, 2, '2017-12-11', '2017-12-12', 'Conge', 2),
(42, 3, '2014-08-04', '2014-08-15', 'Conge', 10),
(43, 3, '2014-12-12', '2014-12-16', 'Conge', 3),
(44, 3, '2015-03-24', '2015-03-24', 'Conge', 1),
(45, 3, '2015-09-28', '2015-10-15', 'Conge', 13),
(46, 3, '2016-09-15', '2016-09-16', 'Conge', 2),
(47, 3, '2017-02-03', '2017-02-03', 'Conge', 1),
(48, 3, '2017-03-21', '2017-03-22', 'Conge', 2),
(49, 3, '2017-05-15', '2017-05-21', 'Conge', 5),
(50, 3, '2017-06-06', '2017-06-07', 'Conge', 2),
(51, 3, '2017-07-04', '2017-07-04', 'Conge', 1),
(52, 3, '2017-08-04', '2017-08-04', 'Conge', 1),
(53, 3, '2017-09-04', '2017-10-09', 'Conge', 5),
(54, 3, '2017-12-04', '2017-12-04', 'Conge', 1),
(55, 3, '2018-01-03', '2018-01-24', 'Conge', 1),
(56, 3, '2018-01-05', '2018-01-05', 'Conge', 1),
(57, 3, '2018-01-08', '2018-01-08', 'Conge', 1),
(58, 3, '2018-02-12', '2018-02-15', 'Conge', 4),
(59, 3, '2018-03-02', '2018-03-02', 'Conge', 1),
(60, 3, '2018-05-14', '2018-05-14', 'Conge', 1),
(61, 3, '2018-06-11', '2018-06-11', 'Conge', 1),
(62, 3, '2018-06-18', '2018-06-18', 'Conge', 1),
(63, 3, '2018-06-06', '2018-06-06', 'Conge', 1),
(64, 3, '2018-07-18', '2018-07-24', 'Conge Maladie', 5),
(65, 7, '2018-07-16', '2018-07-17', 'Conge relaxing', 2),
(66, 8, '2018-11-01', '2018-11-02', 'Malade certifier', 1.5),
(67, 2, '2018-11-02', '2018-11-02', 'Conge certifie : nouvelle naissance', 1),
(68, 3, '2018-11-01', '2019-01-31', 'Conge de maternite', 65),
(69, 2, '2018-11-12', '2018-11-12', 'Conge maladie', 1),
(70, 2, '2018-11-14', '2018-11-14', 'Conge justifier (parmi les 3 jouor du nouvelle naissance)', 1),
(73, 8, '2018-12-04', '2018-12-04', 'Conge', 1),
(74, 4, '2018-12-06', '2018-12-07', 'Conge', 2),
(75, 8, '2018-12-17', '2018-12-18', 'Conge', 2),
(76, 7, '2017-02-13', '2017-02-16', 'Preparation Doctora', 4),
(77, 7, '2017-06-12', '2017-06-14', 'Preparation Doctorat', 3),
(78, 7, '2017-07-17', '2017-07-17', 'fatigue', 1),
(79, 7, '2017-08-01', '2017-08-01', 'fatigue', 1),
(80, 7, '2017-09-25', '2017-09-25', 'fatigue', 1),
(81, 7, '2017-10-25', '2017-10-25', 'trop fatigue', 1),
(82, 7, '2017-11-23', '2017-11-24', 'Preparation Doctorat', 2),
(83, 7, '2018-01-17', '2018-01-17', 'relaxing', 1),
(84, 7, '2018-04-04', '2018-04-06', 'Preparation Doctorat', 3),
(85, 7, '2018-05-15', '2018-05-16', 'Preparation Doctora', 2),
(86, 7, '2018-05-31', '2018-05-31', 'Preparation Doctora', 1),
(87, 7, '2018-08-30', '2018-09-16', '4 jours Mariage + 1 jour fÃ©rier ', 7),
(88, 7, '2018-11-27', '2018-11-27', 'Preparation Doctorat', 1),
(89, 7, '2018-03-23', '2018-03-23', 'Preparation Doctora', 0.5);

-- --------------------------------------------------------

--
-- Structure de la table `freedays`
--

CREATE TABLE `freedays` (
  `id` int(11) NOT NULL,
  `cause` text NOT NULL,
  `nbrJour` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `freedays`
--

INSERT INTO `freedays` (`id`, `cause`, `nbrJour`, `dateDebut`, `dateFin`) VALUES
(1, 'La marche verte', 1, '2018-11-06', '2018-11-07'),
(2, 'Aid Mawlid nabawi', 2, '2018-11-20', '2018-11-21');

-- --------------------------------------------------------

--
-- Structure de la table `pointages`
--

CREATE TABLE `pointages` (
  `id` int(11) NOT NULL,
  `id_personnels` int(11) NOT NULL,
  `date_pointage` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pointages`
--

INSERT INTO `pointages` (`id`, `id_personnels`, `date_pointage`, `timeIn`, `timeOut`) VALUES
(1178, 2, '2018-11-01', '09:05:19', '12:47:04'),
(1179, 5, '2018-11-01', '09:05:24', '17:01:23'),
(1180, 8, '2018-11-01', '09:05:29', '12:24:16'),
(1181, 7, '2018-11-01', '09:11:03', '13:13:01'),
(1182, 4, '2018-11-01', '09:12:40', '09:14:55'),
(1183, 4, '2018-11-01', '09:15:02', '09:50:23'),
(1184, 4, '2018-11-01', '10:05:56', '12:47:06'),
(1185, 8, '2018-11-01', '13:14:55', '14:25:01'),
(1186, 4, '2018-11-01', '13:39:59', '17:05:13'),
(1187, 2, '2018-11-01', '13:40:00', '16:09:01'),
(1188, 7, '2018-11-01', '14:18:06', '18:20:38'),
(1189, 5, '2018-11-02', '09:03:32', '12:46:13'),
(1190, 4, '2018-11-02', '09:10:28', '13:00:35'),
(1191, 7, '2018-11-02', '09:15:47', '13:23:13'),
(1192, 4, '2018-11-02', '13:41:45', '17:26:11'),
(1193, 5, '2018-11-02', '13:56:14', '17:42:24'),
(1194, 7, '2018-11-02', '14:35:04', '18:32:28'),
(1195, 2, '2018-11-05', '09:33:42', '10:55:45'),
(1196, 5, '2018-11-06', '08:36:37', '17:33:41'),
(1197, 2, '2018-11-06', '08:59:17', '12:40:38'),
(1198, 8, '2018-11-06', '09:11:23', '13:02:07'),
(1199, 7, '2018-11-06', '09:20:24', '13:01:14'),
(1200, 4, '2018-11-06', '09:22:27', '12:45:43'),
(1201, 4, '2018-11-06', '13:03:14', '15:37:54'),
(1202, 2, '2018-11-06', '13:45:47', '18:11:56'),
(1203, 8, '2018-11-06', '13:47:05', '17:40:30'),
(1204, 7, '2018-11-06', '14:24:56', '18:38:30'),
(1205, 4, '2018-11-06', '15:39:19', '18:07:09'),
(1206, 2, '2018-11-07', '08:25:42', '12:44:53'),
(1207, 5, '2018-11-07', '08:40:41', '18:03:37'),
(1208, 8, '2018-11-07', '08:57:22', '12:50:43'),
(1209, 4, '2018-11-07', '09:18:53', '11:58:03'),
(1210, 7, '2018-11-07', '09:36:11', '12:20:24'),
(1211, 4, '2018-11-07', '12:06:02', '13:00:56'),
(1212, 2, '2018-11-07', '13:00:58', '17:34:09'),
(1213, 4, '2018-11-07', '13:02:35', '15:00:37'),
(1214, 7, '2018-11-07', '13:51:23', '18:07:24'),
(1215, 8, '2018-11-07', '13:58:43', '18:02:26'),
(1216, 4, '2018-11-07', '15:08:42', '17:17:05'),
(1217, 5, '2018-11-08', '08:26:40', '12:39:15'),
(1218, 2, '2018-11-08', '08:35:02', '17:34:09'),
(1219, 4, '2018-11-08', '09:19:32', '09:42:16'),
(1220, 7, '2018-11-08', '09:20:41', '13:36:42'),
(1221, 8, '2018-11-08', '09:57:29', '12:39:28'),
(1222, 4, '2018-11-08', '10:14:18', '12:51:06'),
(1223, 4, '2018-11-08', '13:06:14', '18:08:40'),
(1224, 8, '2018-11-08', '13:21:48', '18:24:09'),
(1225, 5, '2018-11-08', '14:02:52', '17:50:11'),
(1226, 7, '2018-11-08', '14:04:21', '18:48:20'),
(1227, 5, '2018-11-09', '08:43:10', '12:55:01'),
(1228, 2, '2018-11-09', '08:51:24', '17:55:30'),
(1229, 7, '2018-11-09', '09:13:55', '13:14:03'),
(1230, 4, '2018-11-09', '09:20:53', '09:33:13'),
(1231, 4, '2018-11-09', '09:57:00', '11:43:35'),
(1232, 8, '2018-11-09', '10:00:05', '11:34:54'),
(1233, 8, '2018-11-09', '11:40:17', '12:47:40'),
(1234, 4, '2018-11-09', '11:52:38', '13:48:04'),
(1235, 8, '2018-11-09', '13:47:30', '18:23:03'),
(1236, 4, '2018-11-09', '14:07:48', '17:53:20'),
(1237, 5, '2018-11-09', '14:19:17', '17:46:21'),
(1238, 7, '2018-11-09', '14:47:49', '18:33:37'),
(1239, 4, '2018-11-10', '10:25:14', '13:32:37'),
(1240, 7, '2018-11-10', '10:43:12', '13:32:39'),
(1241, 5, '2018-11-12', '08:10:28', '15:39:50'),
(1242, 8, '2018-11-12', '08:57:43', '12:42:57'),
(1244, 7, '2018-11-12', '09:24:39', '18:04:52'),
(1245, 4, '2018-11-12', '09:54:31', '10:10:27'),
(1246, 4, '2018-11-12', '10:20:04', '13:27:24'),
(1247, 8, '2018-11-12', '13:24:25', '18:03:15'),
(1248, 4, '2018-11-12', '13:42:20', '18:04:54'),
(1249, 5, '2018-11-13', '08:34:14', '12:58:33'),
(1250, 2, '2018-11-13', '09:16:48', '17:15:46'),
(1251, 4, '2018-11-13', '09:22:38', '10:21:35'),
(1252, 7, '2018-11-13', '09:27:03', '13:29:27'),
(1253, 8, '2018-11-13', '09:37:23', '12:32:55'),
(1254, 4, '2018-11-13', '10:27:51', '13:09:47'),
(1255, 8, '2018-11-13', '13:27:27', '18:14:37'),
(1256, 4, '2018-11-13', '13:38:17', '15:10:55'),
(1257, 5, '2018-11-13', '14:04:57', '17:57:34'),
(1258, 7, '2018-11-13', '14:32:03', '18:39:00'),
(1259, 4, '2018-11-13', '15:16:48', '17:25:34'),
(1261, 5, '2018-11-14', '08:46:33', '10:08:55'),
(1262, 4, '2018-11-14', '09:03:11', '10:42:29'),
(1263, 7, '2018-11-14', '09:50:36', '13:38:25'),
(1264, 5, '2018-11-14', '10:15:25', '12:57:49'),
(1265, 8, '2018-11-14', '10:38:03', '13:47:21'),
(1266, 4, '2018-11-14', '11:00:49', '13:59:31'),
(1267, 7, '2018-11-14', '13:46:25', '13:55:07'),
(1268, 8, '2018-11-14', '13:59:41', '18:04:16'),
(1269, 5, '2018-11-14', '14:09:00', '17:59:15'),
(1270, 4, '2018-11-14', '14:12:57', '15:48:17'),
(1271, 4, '2018-11-14', '15:50:22', '17:48:14'),
(1272, 7, '2018-11-14', '18:16:09', '18:41:24'),
(1273, 5, '2018-11-15', '08:51:01', '13:08:46'),
(1274, 2, '2018-11-15', '08:56:45', '13:08:56'),
(1275, 4, '2018-11-15', '09:17:22', '13:08:55'),
(1276, 7, '2018-11-15', '09:25:11', '10:43:27'),
(1277, 8, '2018-11-15', '09:39:18', '13:05:33'),
(1278, 7, '2018-11-15', '11:02:09', '13:38:27'),
(1279, 8, '2018-11-15', '13:31:50', '18:18:24'),
(1280, 4, '2018-11-15', '14:05:37', '16:46:49'),
(1281, 2, '2018-11-15', '14:05:38', '17:45:58'),
(1282, 7, '2018-11-15', '14:07:14', '16:25:42'),
(1283, 5, '2018-11-15', '14:12:59', '17:58:02'),
(1284, 7, '2018-11-15', '16:50:50', '18:20:48'),
(1285, 5, '2018-11-16', '08:48:53', '13:09:52'),
(1286, 2, '2018-11-16', '09:07:16', '13:09:14'),
(1287, 4, '2018-11-16', '09:11:47', '13:09:32'),
(1288, 7, '2018-11-16', '09:23:52', '13:17:49'),
(1289, 8, '2018-11-16', '09:29:29', '09:43:09'),
(1290, 8, '2018-11-16', '09:50:18', '13:37:18'),
(1291, 4, '2018-11-16', '13:09:50', '13:12:46'),
(1292, 2, '2018-11-16', '13:21:13', '18:17:32'),
(1293, 7, '2018-11-16', '14:09:25', '18:19:45'),
(1294, 5, '2018-11-16', '14:12:13', '17:55:00'),
(1295, 8, '2018-11-16', '14:21:25', '18:24:07'),
(1296, 4, '2018-11-16', '14:49:25', '17:00:05'),
(1297, 2, '2018-11-19', '07:36:43', '13:01:29'),
(1298, 2, '2018-11-19', '13:10:38', '14:36:09'),
(1299, 4, '2018-11-19', '14:12:05', '16:43:12'),
(1300, 7, '2018-11-20', '17:11:41', '19:28:38'),
(1301, 5, '2018-11-21', '08:49:40', '18:02:43'),
(1302, 7, '2018-11-21', '09:16:36', '12:31:49'),
(1303, 8, '2018-11-21', '09:34:25', '17:53:29'),
(1304, 4, '2018-11-21', '09:43:47', '11:43:11'),
(1305, 4, '2018-11-21', '11:55:19', '14:42:57'),
(1306, 7, '2018-11-21', '13:28:37', '19:54:10'),
(1307, 4, '2018-11-21', '15:04:30', '17:32:37'),
(1308, 5, '2018-11-22', '08:52:47', '13:29:44'),
(1309, 2, '2018-11-22', '09:04:40', '10:29:02'),
(1310, 8, '2018-11-22', '09:11:44', '09:16:29'),
(1311, 4, '2018-11-22', '09:20:24', '09:45:16'),
(1312, 7, '2018-11-22', '09:24:16', '12:25:36'),
(1313, 8, '2018-11-22', '09:34:26', '13:03:09'),
(1314, 4, '2018-11-22', '10:03:33', '13:25:22'),
(1315, 2, '2018-11-22', '10:37:39', '13:25:15'),
(1316, 4, '2018-11-22', '13:38:22', '14:18:52'),
(1317, 2, '2018-11-22', '13:38:24', '17:32:21'),
(1318, 8, '2018-11-22', '13:52:00', '17:57:16'),
(1319, 4, '2018-11-22', '14:54:31', '17:07:15'),
(1320, 5, '2018-11-23', '08:08:42', '13:14:48'),
(1321, 4, '2018-11-23', '09:09:47', '09:40:39'),
(1322, 7, '2018-11-23', '09:27:53', '13:02:15'),
(1323, 2, '2018-11-23', '09:28:22', '11:05:08'),
(1324, 8, '2018-11-23', '09:41:08', '09:47:45'),
(1325, 8, '2018-11-23', '09:54:56', '14:27:42'),
(1326, 4, '2018-11-23', '10:03:15', '11:49:00'),
(1327, 2, '2018-11-23', '11:08:42', '17:38:13'),
(1328, 4, '2018-11-23', '11:59:27', '14:33:01'),
(1329, 5, '2018-11-23', '14:10:28', '18:03:17'),
(1330, 8, '2018-11-23', '14:31:00', '18:03:16'),
(1331, 4, '2018-11-23', '14:43:22', '16:11:07'),
(1332, 7, '2018-11-23', '15:46:55', '18:13:50'),
(1333, 5, '2018-11-24', '08:40:22', '11:40:39'),
(1334, 4, '2018-11-24', '09:40:02', '12:46:02'),
(1335, 2, '2018-11-24', '10:31:04', '18:01:57'),
(1336, 5, '2018-11-26', '08:57:21', '11:17:18'),
(1337, 2, '2018-11-26', '09:13:23', '13:16:45'),
(1338, 8, '2018-11-26', '09:29:46', '17:54:11'),
(1339, 7, '2018-11-26', '09:38:11', '13:37:12'),
(1340, 4, '2018-11-26', '10:32:56', '12:55:34'),
(1341, 5, '2018-11-26', '11:23:36', '13:34:59'),
(1342, 4, '2018-11-26', '13:06:06', '14:14:59'),
(1343, 2, '2018-11-26', '13:29:26', '17:39:34'),
(1344, 7, '2018-11-26', '14:10:11', '15:16:06'),
(1345, 4, '2018-11-26', '14:22:35', '17:55:11'),
(1346, 5, '2018-11-26', '14:38:41', '15:32:17'),
(1347, 7, '2018-11-26', '15:36:54', '18:54:25'),
(1348, 5, '2018-11-26', '16:29:19', '18:41:06'),
(1349, 5, '2018-11-27', '08:55:53', '09:55:40'),
(1350, 8, '2018-11-27', '09:10:35', '10:55:41'),
(1351, 4, '2018-11-27', '09:16:23', '09:27:23'),
(1352, 2, '2018-11-27', '09:24:44', '12:18:20'),
(1353, 4, '2018-11-27', '09:27:38', '09:37:22'),
(1354, 4, '2018-11-27', '09:55:38', '10:49:39'),
(1355, 5, '2018-11-27', '10:40:45', '14:22:21'),
(1356, 4, '2018-11-27', '10:56:13', '12:33:04'),
(1357, 8, '2018-11-27', '11:00:03', '17:35:36'),
(1358, 4, '2018-11-27', '13:01:55', '17:26:39'),
(1359, 2, '2018-11-27', '13:47:23', '17:41:06'),
(1360, 5, '2018-11-27', '15:50:19', '17:58:07'),
(1361, 5, '2018-11-28', '08:53:35', '12:51:54'),
(1362, 7, '2018-11-28', '09:10:20', '09:53:58'),
(1363, 4, '2018-11-28', '09:22:08', '10:29:14'),
(1364, 2, '2018-11-28', '09:24:07', '12:31:33'),
(1365, 7, '2018-11-28', '10:09:12', '14:04:23'),
(1366, 4, '2018-11-28', '10:40:01', '13:21:28'),
(1367, 8, '2018-11-28', '10:57:04', '17:38:41'),
(1368, 4, '2018-11-28', '13:30:13', '15:08:26'),
(1369, 5, '2018-11-28', '14:09:55', '17:32:13'),
(1370, 2, '2018-11-28', '14:20:09', '17:31:31'),
(1371, 4, '2018-11-28', '15:27:17', '17:22:47'),
(1372, 8, '2018-11-28', '17:44:39', '18:00:08'),
(1373, 5, '2018-11-29', '08:52:10', '13:03:13'),
(1374, 2, '2018-11-29', '09:13:48', '13:13:27'),
(1375, 7, '2018-11-29', '09:28:52', '11:46:20'),
(1376, 4, '2018-11-29', '09:36:44', '09:55:44'),
(1377, 4, '2018-11-29', '10:18:43', '14:39:15'),
(1378, 8, '2018-11-29', '10:24:45', '10:29:27'),
(1379, 8, '2018-11-29', '10:34:50', '17:54:23'),
(1380, 7, '2018-11-29', '11:55:45', '14:36:04'),
(1381, 2, '2018-11-29', '13:31:38', '17:43:40'),
(1382, 5, '2018-11-29', '14:20:57', '18:09:20'),
(1383, 4, '2018-11-29', '15:14:23', '17:21:38'),
(1384, 7, '2018-11-29', '18:46:02', '18:54:04'),
(1385, 7, '2018-11-29', '19:10:51', '20:11:24'),
(1386, 7, '2018-11-29', '20:29:45', '22:15:04'),
(1387, 8, '2018-11-30', '08:31:43', '13:17:23'),
(1388, 5, '2018-11-30', '08:59:02', '13:05:32'),
(1389, 2, '2018-11-30', '09:14:56', '17:38:11'),
(1390, 4, '2018-11-30', '09:23:18', '10:02:58'),
(1391, 7, '2018-11-30', '09:31:08', '09:50:45'),
(1392, 4, '2018-11-30', '10:21:28', '11:35:24'),
(1393, 4, '2018-11-30', '11:41:11', '13:51:41'),
(1394, 7, '2018-11-30', '11:48:01', '13:11:18'),
(1395, 4, '2018-11-30', '13:59:40', '14:26:43'),
(1396, 8, '2018-11-30', '14:02:32', '17:17:49'),
(1397, 7, '2018-11-30', '14:12:57', '17:54:07'),
(1398, 5, '2018-11-30', '14:19:31', '18:04:57'),
(1399, 4, '2018-11-30', '15:00:01', '17:06:36'),
(1400, 4, '2018-12-01', '11:39:14', '15:25:41'),
(1401, 2, '2018-12-01', '13:04:37', '15:25:39'),
(1402, 7, '2018-12-01', '14:28:07', '16:28:10'),
(1403, 4, '2018-12-01', '16:12:18', '17:10:14'),
(1404, 2, '2018-12-01', '16:12:19', '18:51:50'),
(1405, 7, '2018-12-01', '17:03:56', '17:46:10'),
(1406, 4, '2018-12-03', '09:04:53', '09:39:39'),
(1407, 8, '2018-12-03', '09:11:07', '10:04:30'),
(1408, 2, '2018-12-03', '09:18:28', '12:50:35'),
(1409, 7, '2018-12-03', '09:31:15', '12:52:09'),
(1410, 4, '2018-12-03', '09:51:35', '13:19:36'),
(1411, 8, '2018-12-03', '10:08:44', '12:48:58'),
(1412, 5, '2018-12-03', '10:29:46', '13:34:23'),
(1413, 2, '2018-12-03', '13:00:47', '15:58:10'),
(1414, 8, '2018-12-03', '13:31:17', '18:04:31'),
(1415, 4, '2018-12-03', '13:32:40', '15:05:42'),
(1416, 7, '2018-12-03', '14:05:36', '21:23:50'),
(1417, 5, '2018-12-03', '14:27:13', '18:04:01'),
(1418, 4, '2018-12-03', '15:38:38', '17:15:53'),
(1419, 5, '2018-12-04', '08:11:43', '17:57:05'),
(1420, 2, '2018-12-04', '09:26:22', '17:45:59'),
(1421, 4, '2018-12-04', '09:31:52', '09:59:59'),
(1422, 7, '2018-12-04', '09:41:42', '13:39:20'),
(1423, 4, '2018-12-04', '10:16:40', '12:11:16'),
(1424, 4, '2018-12-04', '12:24:55', '13:39:38'),
(1425, 4, '2018-12-04', '13:45:30', '14:18:37'),
(1426, 4, '2018-12-04', '14:53:00', '16:34:49'),
(1427, 7, '2018-12-04', '18:07:35', '19:48:40'),
(1428, 5, '2018-12-05', '08:54:19', '13:03:43'),
(1429, 4, '2018-12-05', '09:14:44', '09:57:51'),
(1430, 2, '2018-12-05', '09:19:40', '17:35:45'),
(1431, 7, '2018-12-05', '09:39:52', '15:00:33'),
(1432, 8, '2018-12-05', '09:32:42', '12:43:44'),
(1433, 4, '2018-12-05', '10:20:30', '12:03:17'),
(1434, 4, '2018-12-05', '12:21:58', '14:21:14'),
(1435, 8, '2018-12-05', '13:00:48', '17:24:39'),
(1436, 5, '2018-12-05', '14:07:24', '17:38:55'),
(1437, 4, '2018-12-05', '15:04:25', '16:22:18'),
(1438, 7, '2018-12-05', '18:22:37', '18:47:49'),
(1439, 7, '2018-12-05', '19:20:30', '21:40:02'),
(1440, 5, '2018-12-06', '09:21:12', '12:34:55'),
(1441, 2, '2018-12-06', '09:21:18', '12:49:51'),
(1442, 8, '2018-12-06', '09:29:12', '09:49:23'),
(1443, 7, '2018-12-06', '09:41:15', '09:49:31'),
(1444, 8, '2018-12-06', '09:54:34', '12:50:25'),
(1445, 7, '2018-12-06', '09:54:35', '13:31:30'),
(1446, 8, '2018-12-06', '13:12:56', '17:28:22'),
(1447, 2, '2018-12-06', '13:26:22', '17:51:27'),
(1448, 5, '2018-12-06', '13:40:07', '17:51:25'),
(1449, 7, '2018-12-06', '15:30:16', '18:35:14'),
(1450, 5, '2018-12-07', '09:28:14', '13:14:19'),
(1451, 8, '2018-12-07', '09:33:01', '09:37:42'),
(1452, 8, '2018-12-07', '09:50:33', '13:14:30'),
(1453, 2, '2018-12-07', '09:50:35', '17:36:45'),
(1454, 7, '2018-12-07', '10:02:15', '13:26:51'),
(1455, 5, '2018-12-07', '14:33:20', '17:36:47'),
(1456, 8, '2018-12-07', '14:37:23', '14:41:56'),
(1457, 8, '2018-12-07', '14:50:10', '17:36:51'),
(1458, 7, '2018-12-07', '15:05:23', '17:36:49'),
(1459, 5, '2018-12-07', '17:36:47', '17:54:34'),
(1460, 7, '2018-12-07', '17:36:50', '18:12:13'),
(1461, 8, '2018-12-07', '17:36:52', '18:03:47'),
(1462, 7, '2018-12-08', '15:53:05', '16:24:52'),
(1463, 7, '2018-12-08', '17:35:05', '19:10:44'),
(1464, 5, '2018-12-10', '08:50:01', '13:49:59'),
(1465, 2, '2018-12-10', '09:16:31', '13:03:48'),
(1466, 8, '2018-12-10', '09:20:12', '17:29:13'),
(1467, 4, '2018-12-10', '09:22:14', '13:03:20'),
(1468, 7, '2018-12-10', '09:33:54', '17:44:41'),
(1469, 2, '2018-12-10', '13:19:38', '17:37:56'),
(1470, 4, '2018-12-10', '13:19:39', '14:42:45'),
(1471, 5, '2018-12-10', '13:57:07', '17:43:23'),
(1472, 4, '2018-12-10', '15:00:45', '17:06:12'),
(1473, 8, '2018-12-10', '17:35:59', '18:30:46'),
(1474, 2, '2018-12-11', '08:20:41', '12:27:32'),
(1475, 5, '2018-12-11', '08:47:17', '13:01:24'),
(1476, 4, '2018-12-11', '09:17:41', '10:44:02'),
(1477, 7, '2018-12-11', '09:29:10', '09:50:57'),
(1478, 8, '2018-12-11', '09:36:43', '10:51:44'),
(1479, 7, '2018-12-11', '10:33:56', '16:56:27'),
(1480, 4, '2018-12-11', '10:54:54', '12:26:35'),
(1481, 8, '2018-12-11', '10:55:18', '18:26:31'),
(1482, 2, '2018-12-11', '12:40:13', '18:26:39'),
(1483, 4, '2018-12-11', '12:40:15', '14:25:13'),
(1484, 5, '2018-12-11', '14:01:30', '18:26:35'),
(1485, 4, '2018-12-11', '14:54:16', '17:34:38'),
(1486, 7, '2018-12-11', '16:59:32', '18:23:38'),
(1487, 2, '2018-12-12', '08:47:04', '13:21:26'),
(1488, 5, '2018-12-12', '08:49:01', '12:54:11'),
(1489, 4, '2018-12-12', '09:17:33', '10:12:08'),
(1490, 7, '2018-12-12', '09:34:28', '13:52:20'),
(1491, 8, '2018-12-12', '09:34:33', '12:42:22'),
(1492, 4, '2018-12-12', '10:18:08', '11:54:59'),
(1493, 4, '2018-12-12', '12:01:07', '13:21:27'),
(1494, 8, '2018-12-12', '13:21:33', '18:17:16'),
(1495, 2, '2018-12-12', '13:35:14', '18:17:20'),
(1496, 4, '2018-12-12', '13:35:09', '14:25:45'),
(1497, 5, '2018-12-12', '14:25:29', '18:17:14'),
(1498, 7, '2018-12-12', '14:25:30', '16:27:58'),
(1499, 4, '2018-12-12', '14:58:01', '17:07:40'),
(1500, 7, '2018-12-12', '16:46:17', '18:17:17'),
(1501, 5, '2018-12-12', '18:17:15', '18:54:58'),
(1502, 8, '2018-12-12', '18:17:17', '18:22:48'),
(1503, 7, '2018-12-12', '18:17:18', '18:17:39'),
(1504, 2, '2018-12-12', '18:17:21', '18:21:33'),
(1505, 2, '2018-12-13', '08:47:43', '12:59:13'),
(1506, 5, '2018-12-13', '09:02:43', '13:04:39'),
(1507, 4, '2018-12-13', '09:27:11', '10:33:11'),
(1508, 7, '2018-12-13', '09:32:29', '13:48:46'),
(1509, 8, '2018-12-13', '09:40:40', '10:56:05'),
(1510, 4, '2018-12-13', '10:40:49', '11:36:34'),
(1511, 8, '2018-12-13', '11:00:59', '13:15:50'),
(1512, 4, '2018-12-13', '12:01:43', '14:29:41'),
(1513, 2, '2018-12-13', '13:16:54', '18:30:42'),
(1514, 8, '2018-12-13', '13:34:18', '14:03:47'),
(1515, 8, '2018-12-13', '14:04:24', '17:38:39'),
(1516, 7, '2018-12-13', '14:10:50', '16:25:30'),
(1517, 5, '2018-12-13', '14:19:45', '18:04:10'),
(1518, 4, '2018-12-13', '14:55:50', '17:40:20'),
(1519, 7, '2018-12-13', '16:46:18', '17:41:53'),
(1520, 2, '2018-12-14', '08:58:44', '13:53:38'),
(1521, 7, '2018-12-14', '09:00:09', '09:00:10'),
(1522, 5, '2018-12-14', '09:00:11', '13:53:37'),
(1523, 4, '2018-12-14', '09:30:58', '10:28:19'),
(1524, 8, '2018-12-14', '09:31:52', '10:16:22'),
(1525, 7, '2018-12-14', '09:32:00', '13:26:14'),
(1526, 8, '2018-12-14', '10:21:33', '12:30:09'),
(1527, 4, '2018-12-14', '10:45:20', '12:25:45'),
(1528, 4, '2018-12-14', '12:35:45', '14:33:16'),
(1529, 8, '2018-12-14', '13:45:31', '15:33:55'),
(1530, 2, '2018-12-14', '14:11:07', '17:38:59'),
(1531, 5, '2018-12-14', '14:11:10', '18:06:39'),
(1532, 7, '2018-12-14', '14:32:04', '18:06:41'),
(1533, 4, '2018-12-14', '14:40:20', '17:28:32'),
(1534, 8, '2018-12-14', '15:47:16', '17:30:47'),
(1535, 7, '2018-12-15', '18:30:13', '21:50:19'),
(1536, 7, '2018-12-16', '16:59:49', '19:25:10'),
(1537, 5, '2018-12-17', '08:50:44', '13:13:05'),
(1538, 2, '2018-12-17', '09:19:06', '12:53:01'),
(1539, 7, '2018-12-17', '09:25:46', '13:23:15'),
(1540, 4, '2018-12-17', '11:29:11', '12:03:39'),
(1541, 4, '2018-12-17', '12:18:01', '18:46:14'),
(1542, 2, '2018-12-17', '13:12:13', '14:14:40'),
(1543, 7, '2018-12-17', '14:12:55', '16:35:38'),
(1544, 5, '2018-12-17', '14:32:19', '14:55:56'),
(1545, 2, '2018-12-17', '14:37:24', '17:34:05'),
(1546, 5, '2018-12-17', '15:02:25', '18:03:37'),
(1547, 7, '2018-12-17', '16:55:12', '17:44:55'),
(1548, 5, '2018-12-18', '08:55:23', '12:59:06'),
(1549, 2, '2018-12-18', '09:21:20', '10:35:02'),
(1550, 4, '2018-12-18', '09:26:15', '09:45:04'),
(1551, 7, '2018-12-18', '09:32:24', '11:58:52'),
(1552, 4, '2018-12-18', '09:58:23', '12:42:38'),
(1553, 2, '2018-12-18', '11:24:15', '17:46:17'),
(1554, 4, '2018-12-18', '12:53:47', '16:56:02'),
(1555, 7, '2018-12-18', '12:56:43', '18:53:49'),
(1556, 8, '2018-12-18', '13:31:09', '17:26:24'),
(1557, 5, '2018-12-18', '14:14:53', '17:31:08'),
(1558, 5, '2018-12-19', '08:58:31', '10:56:07'),
(1559, 4, '2018-12-19', '09:01:27', '09:58:17'),
(1560, 2, '2018-12-19', '09:23:58', '12:56:12'),
(1561, 7, '2018-12-19', '09:30:26', '12:01:52'),
(1562, 8, '2018-12-19', '09:36:55', '12:18:54'),
(1563, 4, '2018-12-19', '10:12:02', '15:20:50'),
(1564, 5, '2018-12-19', '11:02:35', '13:00:12'),
(1565, 8, '2018-12-19', '12:40:53', '17:53:53'),
(1566, 2, '2018-12-19', '13:03:42', '17:36:29'),
(1567, 7, '2018-12-19', '13:13:53', '19:54:06'),
(1568, 5, '2018-12-19', '14:09:29', '17:57:10'),
(1569, 4, '2018-12-19', '15:26:55', '17:10:30'),
(1570, 4, '2018-12-20', '08:30:23', '10:00:50'),
(1571, 5, '2018-12-20', '09:01:25', '13:10:11'),
(1572, 2, '2018-12-20', '09:32:20', '17:27:20'),
(1573, 7, '2018-12-20', '09:32:22', '14:30:38'),
(1574, 8, '2018-12-20', '09:49:05', '09:52:48'),
(1575, 8, '2018-12-20', '09:57:24', '17:50:21'),
(1576, 4, '2018-12-20', '10:20:52', '18:04:57'),
(1577, 5, '2018-12-20', '14:14:00', '17:46:42'),
(1578, 7, '2018-12-20', '15:30:06', '18:20:30'),
(1579, 4, '2018-12-21', '08:31:07', '10:01:42'),
(1580, 5, '2018-12-21', '08:58:19', '13:24:29'),
(1581, 8, '2018-12-21', '09:28:34', '09:48:53'),
(1582, 2, '2018-12-21', '09:31:15', '13:46:14'),
(1583, 7, '2018-12-21', '09:33:04', '13:13:42'),
(1584, 8, '2018-12-21', '09:54:38', '12:41:35'),
(1585, 4, '2018-12-21', '10:17:14', '11:45:12'),
(1586, 4, '2018-12-21', '11:50:34', '16:08:03'),
(1587, 8, '2018-12-21', '14:02:34', '17:53:58'),
(1588, 5, '2018-12-21', '14:12:01', '17:53:57'),
(1589, 2, '2018-12-21', '14:17:16', '17:42:18'),
(1590, 7, '2018-12-21', '14:20:17', '18:55:34'),
(1591, 4, '2018-12-22', '10:38:50', '15:25:03'),
(1592, 2, '2018-12-22', '13:07:33', '16:04:02'),
(1593, 2, '2018-12-22', '16:04:02', '16:04:02');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  `nom` text NOT NULL,
  `date_contrat` date NOT NULL,
  `cin` text NOT NULL,
  `qualite` text NOT NULL,
  `classCss` text NOT NULL,
  `idLogs` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `nom`, `date_contrat`, `cin`, `qualite`, `classCss`, `idLogs`) VALUES
(2, 'achraf.saloumi', 'achtech@1985', 1, 'Achraf Saloumi', '2014-02-01', 'AA3256', 'Devloppeur de logiciel', 'success', 1593),
(3, 'noura.bouchbaat', 'software', 2, 'Noura Bouchbaat', '2014-02-01', 'AA3256', 'Devloppeur de logiciel', 'danger', 1177),
(4, 'brahim.barjali', 'software', 2, 'Brahim Barjali', '2015-01-01', 'AA3256', 'Devloppeur de logiciel', 'danger', 1591),
(5, 'Oumaima.Stitini', 'software', 2, 'Oumaima Stitini', '2015-11-01', 'AA3256', 'Devloppeur de logiciel', 'danger', 1588),
(7, 'mohamed.lechiakh', 'irisiFSTG', 2, 'Mohammed Lechiakh', '2016-11-01', 'AA3256', 'Devloppeur de logiciel', 'danger', 1590),
(8, 'abdellah.taha', '123456', 2, 'Abdellah Taha', '2017-01-01', 'AA3256', 'Devloppeur de logiciel', 'danger', 1587);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `freedays`
--
ALTER TABLE `freedays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `pointages`
--
ALTER TABLE `pointages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conges`
--
ALTER TABLE `conges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pour la table `freedays`
--
ALTER TABLE `freedays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pointages`
--
ALTER TABLE `pointages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1594;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
