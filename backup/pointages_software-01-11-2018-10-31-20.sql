-- Generation time: Thu, 01 Nov 2018 10:31:20 +0100
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

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
('65','7','2018-07-16','2018-07-17','Conge relaxing','2'); 


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

INSERT INTO `freedays` VALUES ('1','La marche verte','1','2018-11-06','2018-11-06'); 


DROP TABLE IF EXISTS `pointages`;
CREATE TABLE `pointages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnels` int(11) NOT NULL,
  `date_pointage` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1185 DEFAULT CHARSET=latin1;

INSERT INTO `pointages` VALUES ('1178','2','2018-11-01','09:05:19','09:05:19'),
('1179','5','2018-11-01','09:05:24','09:05:24'),
('1180','8','2018-11-01','09:05:29','09:05:29'),
('1181','7','2018-11-01','09:11:03','09:11:03'),
('1182','4','2018-11-01','09:12:40','09:14:55'),
('1183','4','2018-11-01','09:15:02','09:50:23'),
('1184','4','2018-11-01','10:05:56','10:05:56'); 


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

INSERT INTO `users` VALUES ('2','achraf.saloumi','achtech@1985','1','Achraf Saloumi','2014-02-01','AA3256','Devloppeur de logiciel','success','1178'),
('3','noura.bouchbaat','software','2','Noura Bouchbaat','2014-02-01','AA3256','Devloppeur de logiciel','danger','1177'),
('4','brahim.barjali','software','2','Brahim Barjali','2015-01-01','AA3256','Devloppeur de logiciel','success','1184'),
('5','Oumaima.Stitini','software','2','Oumaima Stitini','2015-11-01','AA3256','Devloppeur de logiciel','success','1179'),
('7','mohammed.lechiakh','software','2','Mohammed Lechiakh','2016-11-01','AA3256','Devloppeur de logiciel','success','1181'),
('8','abdellah.taha','software','2','Abdellah Taha','2017-01-01','AA3256','Devloppeur de logiciel','success','1180'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

