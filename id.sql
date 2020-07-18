/*
SQLyog Community v9.32 GA
MySQL - 5.5.5-10.1.28-MariaDB : Database - idcard_creation
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`idcard_creation` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `idcard_creation`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`admin_id`,`username`,`password`,`isActive`) values (1,'admin','admin',1);

/*Table structure for table `course_master` */

DROP TABLE IF EXISTS `course_master`;

CREATE TABLE `course_master` (
  `course_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Courses` varchar(500) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`course_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `course_master` */

insert  into `course_master`(`course_Id`,`Courses`,`isActive`) values (1,'Automobile Engineering',1),(2,'Civil Engineering',1),(3,'Computer Science and Engineering',1),(4,'Electrical and Electronics Engineering',1),(5,'Electronics and Communication Engineering',1),(6,'Mechanical Engineering',1);

/*Table structure for table `design_patterns` */

DROP TABLE IF EXISTS `design_patterns`;

CREATE TABLE `design_patterns` (
  `desg_id` int(11) NOT NULL AUTO_INCREMENT,
  `desg_pattern` varchar(2000) DEFAULT NULL,
  `desg_yearwise` varchar(2000) DEFAULT NULL,
  `desg_cre_date` datetime DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`desg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `design_patterns` */

insert  into `design_patterns`(`desg_id`,`desg_pattern`,`desg_yearwise`,`desg_cre_date`,`isActive`) values (1,'des1.jpg','1st','2018-03-05 11:55:28',1),(2,'des4.jpg','2nd','2018-03-05 11:56:02',1),(3,'des3.jpg','3rd','2018-03-05 11:56:18',1);

/*Table structure for table `request_idcard` */

DROP TABLE IF EXISTS `request_idcard`;

CREATE TABLE `request_idcard` (
  `Req_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_email` varchar(200) DEFAULT NULL,
  `stu_uniqueidfk` varchar(100) DEFAULT NULL,
  `stu_year` varchar(100) DEFAULT NULL,
  `Req_idcard` text,
  `Req_date` datetime DEFAULT NULL,
  `Confirm_Req` tinyint(1) DEFAULT '0',
  `Cre_date` datetime DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`Req_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `request_idcard` */

insert  into `request_idcard`(`Req_id`,`stu_email`,`stu_uniqueidfk`,`stu_year`,`Req_idcard`,`Req_date`,`Confirm_Req`,`Cre_date`,`isActive`) values (1,'allusk008@gmail.com','CPC-Polytechnic-2018-2','2nd','Dear Admin,can you please accept my request & create id card','2018-03-05 11:49:26',1,NULL,1),(2,'shareef@veritonsoftware.com','CPC-Polytechnic-2018-1','1st','Dear Admin,can you please accept my request & create id card','2018-03-05 11:49:59',1,NULL,1),(3,'anoop123@gmail.com','CPC-Polytechnic-2018-3','3rd','Dear Admin,can you please accept my request & create id card','2018-03-05 11:50:52',1,NULL,1),(4,'thriveniu9@gmail.com','CPC-Polytechnic-2018-4','3rd','hgrtry','2018-03-14 16:19:34',1,NULL,1);

/*Table structure for table `student_reg` */

DROP TABLE IF EXISTS `student_reg`;

CREATE TABLE `student_reg` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_uniqueid` varchar(300) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `blood_group` varchar(100) DEFAULT NULL,
  `course` varchar(500) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `address` text,
  `created_date` datetime DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `student_reg` */

insert  into `student_reg`(`stu_id`,`stu_uniqueid`,`name`,`mobile`,`email`,`password`,`blood_group`,`course`,`year`,`dob`,`image`,`address`,`created_date`,`isActive`) values (1,'CPC-Polytechnic-2018-1','Althaf Shareef','0123456987','shareef@veritonsoftware.com','123456','O positive','3','1st','08/24/1990','StudProf_1520229927.jpg','Bangalore','2018-03-05 11:35:27',1),(2,'CPC-Polytechnic-2018-2','Mak','3201456987','allusk008@gmail.com','123456','A positive','1','2nd','03/04/1992','StudProf_1520230001.jpg','Mysore','2018-03-05 11:36:41',1),(3,'CPC-Polytechnic-2018-3','Chirag Anoop','9874563210','anoop123@gmail.com','123456','AB positive','5','3rd','03/03/1989','StudProf_1520230097.jpg','Mysore','2018-03-05 11:38:17',1),(4,'CPC-Polytechnic-2018-4','thriveni u','9901987243','thriveniu9@gmail.com','9743214471','O positive','3','3rd','09/15/1999','StudProf_1521024477.jpg','Mysore','2018-03-14 16:17:57',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
