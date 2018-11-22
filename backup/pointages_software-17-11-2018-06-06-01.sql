-- Generation time: Sat, 17 Nov 2018 18:06:01 +0100
-- Host: localhost
-- DB name: pointages_software
/*!40030 SET NAMES UTF8 */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `conges`;
CREATE TABLE `conges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnels` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `Libelle` text NOT NULL,
  `nbrJour` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

INSERT INTO `conges` VALUES ('8','8','2018-01-31','2018-01-31','Retard','1'),
('9','8','2018-02-05','2018-02-05','Inconnue','1'),
('10','8','2018-03-19','2018-03-19','Inconnue','2'),
('12','8','2018-04-02','2018-04-02','Retard','1'),
('13','8','2018-03-30','2018-03-30','Retard','1'),
('14','3','2018-01-08','2018-01-11','Conge','4'),
('15','3','2018-02-05','2018-02-09','Conge','5'),
('16','4','2018-01-24','2018-01-24','Conge','1'),
('17','4','2018-04-09','2018-04-16','Conge','6'),
('18','5','2018-01-22','2018-01-23','Conge','2'),
('19','5','2018-02-12','2018-02-16','Conge','5'),
('21','7','2018-02-01','2018-02-01','Conge','1'),
('22','7','2018-04-02','2018-04-04','Conge','3'),
('23','2','2014-08-18','2014-08-29','Conge','10'),
('24','2','2014-12-12','2014-12-16','Weeding party','2'),
('25','2','2016-05-05','2016-05-06','Conge','2'),
('26','2','2015-09-28','2015-10-14','Conge','13'),
('27','2','2016-09-15','2016-09-16','Conge','2'),
('28','2','2017-03-17','2017-03-17','Conge','1'),
('29','2','2017-05-15','2017-05-21','Conge','5'),
('30','2','2017-06-06','2017-06-06','Conge','0'),
('31','2','2017-06-09','2017-06-09','Conge','1'),
('32','2','2017-08-04','2017-08-04','Conge','0'),
('33','2','2017-09-04','2017-09-10','Conge','5'),
('34','2','2016-12-05','2016-12-16','Conge pay�','10'),
('35','3','2018-06-06','2018-06-06','Conge','1'),
('36','8','2018-07-05','2018-07-05','Conge ','1'),
('38','2','2014-11-24','2014-11-25','Conge','2'),
('40','2','2017-11-10','2017-11-10','Conge','1'),
('41','2','2017-12-11','2017-12-12','Conge','2'),
('42','3','2014-08-04','2014-08-15','Conge','10'),
('43','3','2014-12-12','2014-12-16','Conge','3'),
('44','3','2015-03-24','2015-03-24','Conge','1'),
('45','3','2015-09-28','2015-10-15','Conge','13'),
('46','3','2016-09-15','2016-09-16','Conge','2'),
('47','3','2017-02-03','2017-02-03','Conge','1'),
('48','3','2017-03-21','2017-03-22','Conge','2'),
('49','3','2017-05-15','2017-05-21','Conge','5'),
('50','3','2017-06-06','2017-06-07','Conge','2'),
('51','3','2017-07-04','2017-07-04','Conge','1'),
('52','3','2017-08-04','2017-08-04','Conge','1'),
('53','3','2017-09-04','2017-10-09','Conge','5'),
('54','3','2017-12-04','2017-12-04','Conge','1'),
('55','3','2018-01-03','2018-01-24','Conge','1'),
('56','3','2018-01-05','2018-01-05','Conge','1'),
('57','3','2018-01-08','2018-01-08','Conge','1'),
('58','3','2018-02-12','2018-02-15','Conge','4'),
('59','3','2018-03-02','2018-03-02','Conge','1'),
('60','3','2018-05-14','2018-05-14','Conge','1'),
('61','3','2018-06-11','2018-06-11','Conge','1'),
('62','3','2018-06-18','2018-06-18','Conge','1'),
('63','3','2018-06-06','2018-06-06','Conge','1'),
('64','3','2018-07-18','2018-07-24','Conge Maladie','5'),
('65','7','2018-07-16','2018-07-17','Conge relaxing','2'),
('66','8','2018-11-01','2018-11-02','Malade certifier','1.5'),
('67','2','2018-11-02','2018-11-02','Conge certifie : nouvelle naissance','1'),
('68','3','2018-11-01','2019-01-31','Conge de maternite','65'),
('69','2','2018-11-12','2018-11-12','Conge maladie','1'),
('70','2','2018-11-14','2018-11-14','Conge justifier (parmi les 3 jouor du nouvelle naissance)','1'); 


DROP TABLE IF EXISTS `freedays`;
CREATE TABLE `freedays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cause` text NOT NULL,
  `nbrJour` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `freedays` VALUES ('1','La marche verte','1','2018-11-06','2018-11-07'); 


DROP TABLE IF EXISTS `pointages`;
CREATE TABLE `pointages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnels` int(11) NOT NULL,
  `date_pointage` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1297 DEFAULT CHARSET=latin1;

INSERT INTO `pointages` VALUES ('1178','2','2018-11-01','09:05:19','12:47:04'),
('1179','5','2018-11-01','09:05:24','17:01:23'),
('1180','8','2018-11-01','09:05:29','12:24:16'),
('1181','7','2018-11-01','09:11:03','13:13:01'),
('1182','4','2018-11-01','09:12:40','09:14:55'),
('1183','4','2018-11-01','09:15:02','09:50:23'),
('1184','4','2018-11-01','10:05:56','12:47:06'),
('1185','8','2018-11-01','13:14:55','14:25:01'),
('1186','4','2018-11-01','13:39:59','17:05:13'),
('1187','2','2018-11-01','13:40:00','16:09:01'),
('1188','7','2018-11-01','14:18:06','18:20:38'),
('1189','5','2018-11-02','09:03:32','12:46:13'),
('1190','4','2018-11-02','09:10:28','13:00:35'),
('1191','7','2018-11-02','09:15:47','13:23:13'),
('1192','4','2018-11-02','13:41:45','17:26:11'),
('1193','5','2018-11-02','13:56:14','17:42:24'),
('1194','7','2018-11-02','14:35:04','18:32:28'),
('1195','2','2018-11-05','09:33:42','10:55:45'),
('1196','5','2018-11-06','08:36:37','17:33:41'),
('1197','2','2018-11-06','08:59:17','12:40:38'),
('1198','8','2018-11-06','09:11:23','13:02:07'),
('1199','7','2018-11-06','09:20:24','13:01:14'),
('1200','4','2018-11-06','09:22:27','12:45:43'),
('1201','4','2018-11-06','13:03:14','15:37:54'),
('1202','2','2018-11-06','13:45:47','18:11:56'),
('1203','8','2018-11-06','13:47:05','17:40:30'),
('1204','7','2018-11-06','14:24:56','18:38:30'),
('1205','4','2018-11-06','15:39:19','18:07:09'),
('1206','2','2018-11-07','08:25:42','12:44:53'),
('1207','5','2018-11-07','08:40:41','18:03:37'),
('1208','8','2018-11-07','08:57:22','12:50:43'),
('1209','4','2018-11-07','09:18:53','11:58:03'),
('1210','7','2018-11-07','09:36:11','12:20:24'),
('1211','4','2018-11-07','12:06:02','13:00:56'),
('1212','2','2018-11-07','13:00:58','17:34:09'),
('1213','4','2018-11-07','13:02:35','15:00:37'),
('1214','7','2018-11-07','13:51:23','18:07:24'),
('1215','8','2018-11-07','13:58:43','18:02:26'),
('1216','4','2018-11-07','15:08:42','17:17:05'),
('1217','5','2018-11-08','08:26:40','12:39:15'),
('1218','2','2018-11-08','08:35:02','17:34:09'),
('1219','4','2018-11-08','09:19:32','09:42:16'),
('1220','7','2018-11-08','09:20:41','13:36:42'),
('1221','8','2018-11-08','09:57:29','12:39:28'),
('1222','4','2018-11-08','10:14:18','12:51:06'),
('1223','4','2018-11-08','13:06:14','18:08:40'),
('1224','8','2018-11-08','13:21:48','18:24:09'),
('1225','5','2018-11-08','14:02:52','17:50:11'),
('1226','7','2018-11-08','14:04:21','18:48:20'),
('1227','5','2018-11-09','08:43:10','12:55:01'),
('1228','2','2018-11-09','08:51:24','17:55:30'),
('1229','7','2018-11-09','09:13:55','13:14:03'),
('1230','4','2018-11-09','09:20:53','09:33:13'),
('1231','4','2018-11-09','09:57:00','11:43:35'),
('1232','8','2018-11-09','10:00:05','11:34:54'),
('1233','8','2018-11-09','11:40:17','12:47:40'),
('1234','4','2018-11-09','11:52:38','13:48:04'),
('1235','8','2018-11-09','13:47:30','18:23:03'),
('1236','4','2018-11-09','14:07:48','17:53:20'),
('1237','5','2018-11-09','14:19:17','17:46:21'),
('1238','7','2018-11-09','14:47:49','18:33:37'),
('1239','4','2018-11-10','10:25:14','13:32:37'),
('1240','7','2018-11-10','10:43:12','13:32:39'),
('1241','5','2018-11-12','08:10:28','15:39:50'),
('1242','8','2018-11-12','08:57:43','12:42:57'),
('1244','7','2018-11-12','09:24:39','18:04:52'),
('1245','4','2018-11-12','09:54:31','10:10:27'),
('1246','4','2018-11-12','10:20:04','13:27:24'),
('1247','8','2018-11-12','13:24:25','18:03:15'),
('1248','4','2018-11-12','13:42:20','18:04:54'),
('1249','5','2018-11-13','08:34:14','12:58:33'),
('1250','2','2018-11-13','09:16:48','17:15:46'),
('1251','4','2018-11-13','09:22:38','10:21:35'),
('1252','7','2018-11-13','09:27:03','13:29:27'),
('1253','8','2018-11-13','09:37:23','12:32:55'),
('1254','4','2018-11-13','10:27:51','13:09:47'),
('1255','8','2018-11-13','13:27:27','18:14:37'),
('1256','4','2018-11-13','13:38:17','15:10:55'),
('1257','5','2018-11-13','14:04:57','17:57:34'),
('1258','7','2018-11-13','14:32:03','18:39:00'),
('1259','4','2018-11-13','15:16:48','17:25:34'),
('1261','5','2018-11-14','08:46:33','10:08:55'),
('1262','4','2018-11-14','09:03:11','10:42:29'),
('1263','7','2018-11-14','09:50:36','13:38:25'),
('1264','5','2018-11-14','10:15:25','12:57:49'),
('1265','8','2018-11-14','10:38:03','13:47:21'),
('1266','4','2018-11-14','11:00:49','13:59:31'),
('1267','7','2018-11-14','13:46:25','13:55:07'),
('1268','8','2018-11-14','13:59:41','18:04:16'),
('1269','5','2018-11-14','14:09:00','17:59:15'),
('1270','4','2018-11-14','14:12:57','15:48:17'),
('1271','4','2018-11-14','15:50:22','17:48:14'),
('1272','7','2018-11-14','18:16:09','18:41:24'),
('1273','5','2018-11-15','08:51:01','13:08:46'),
('1274','2','2018-11-15','08:56:45','13:08:56'),
('1275','4','2018-11-15','09:17:22','13:08:55'),
('1276','7','2018-11-15','09:25:11','10:43:27'),
('1277','8','2018-11-15','09:39:18','13:05:33'),
('1278','7','2018-11-15','11:02:09','13:38:27'),
('1279','8','2018-11-15','13:31:50','18:18:24'),
('1280','4','2018-11-15','14:05:37','16:46:49'),
('1281','2','2018-11-15','14:05:38','17:45:58'),
('1282','7','2018-11-15','14:07:14','16:25:42'),
('1283','5','2018-11-15','14:12:59','17:58:02'),
('1284','7','2018-11-15','16:50:50','18:20:48'),
('1285','5','2018-11-16','08:48:53','13:09:52'),
('1286','2','2018-11-16','09:07:16','13:09:14'),
('1287','4','2018-11-16','09:11:47','13:09:32'),
('1288','7','2018-11-16','09:23:52','13:17:49'),
('1289','8','2018-11-16','09:29:29','09:43:09'),
('1290','8','2018-11-16','09:50:18','13:37:18'),
('1291','4','2018-11-16','13:09:50','13:12:46'),
('1292','2','2018-11-16','13:21:13','18:17:32'),
('1293','7','2018-11-16','14:09:25','18:19:45'),
('1294','5','2018-11-16','14:12:13','17:55:00'),
('1295','8','2018-11-16','14:21:25','18:24:07'),
('1296','4','2018-11-16','14:49:25','17:00:05'); 


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `roles` VALUES ('1','admin'),
('2','user'); 


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  `nom` text NOT NULL,
  `date_contrat` date NOT NULL,
  `cin` text NOT NULL,
  `qualite` text NOT NULL,
  `classCss` text NOT NULL,
  `idLogs` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `users` VALUES ('2','achraf.saloumi','achtech@1985','1','Achraf Saloumi','2014-02-01','AA3256','Devloppeur de logiciel','danger','1292'),
('3','noura.bouchbaat','software','2','Noura Bouchbaat','2014-02-01','AA3256','Devloppeur de logiciel','danger','1177'),
('4','brahim.barjali','software','2','Brahim Barjali','2015-01-01','AA3256','Devloppeur de logiciel','danger','1296'),
('5','Oumaima.Stitini','software','2','Oumaima Stitini','2015-11-01','AA3256','Devloppeur de logiciel','danger','1294'),
('7','mohammed.lechiakh','software','2','Mohammed Lechiakh','2016-11-01','AA3256','Devloppeur de logiciel','danger','1293'),
('8','abdellah.taha','software','2','Abdellah Taha','2017-01-01','AA3256','Devloppeur de logiciel','danger','1295'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
