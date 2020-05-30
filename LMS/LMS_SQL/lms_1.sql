-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: lms_1
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Staff`
--

DROP TABLE IF EXISTS `Staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Staff` (
  `EmpID` char(15) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Designation` varchar(15) NOT NULL,
  `cc_of` varchar(4) DEFAULT NULL,
  `mentor_of` char(3) DEFAULT NULL,
  `HintQ` tinytext NOT NULL,
  `Answer` tinytext NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `Address` varchar(125) NOT NULL,
  `Department` varchar(25) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`EmpID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Staff`
--

LOCK TABLES `Staff` WRITE;
/*!40000 ALTER TABLE `Staff` DISABLE KEYS */;
INSERT INTO `Staff` VALUES ('C2K12100000','aaaaAAAA1!','Preeti Jain','3','TE1','K1','3','red','Female','apoorvdixit619@gmail.com','9999999999','Baner','Computer Engineering','1990-01-01'),('C2K12100001','aaaaAAAA1!','Snehal Shintre','3','TE2','K2','3','blue','Female','spshintre@pict.edu','7777777777','Kondwa','Computer Engineering','1991-02-02'),('C2K13100000','aaaaAAAA1!','M Takalikar','4','TE3','L2','3','green','Female','mstakalikar@pict.edu','9999999998','Koregaon Park','Computer Engineering','1990-03-03'),('C2K15100000','aaaaAAAA1!','Mayur Chavan','2','','','3','black','Male','mschavan@pict.edu','9999999997','Viman Nagar','Computer Engineering','1995-05-05');
/*!40000 ALTER TABLE `Staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Student` (
  `EnrollID` char(15) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Class` varchar(4) NOT NULL,
  `Batch` char(3) NOT NULL,
  `Mentor` char(15) NOT NULL,
  `ClassCordinator` char(15) NOT NULL,
  `HintQ` tinytext NOT NULL,
  `Answer` tinytext NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `Address` varchar(125) NOT NULL,
  `Department` varchar(25) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`EnrollID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Student`
--

LOCK TABLES `Student` WRITE;
/*!40000 ALTER TABLE `Student` DISABLE KEYS */;
INSERT INTO `Student` VALUES ('C2K12002222','aaaaAAAA1!','Dhruv Inamdar','TE1','K1','C2K12100000','C2K12100000','1','Dhruv','Male','dhruv@gmail.com','9028610141','Pune','Computer Engineering','1999-01-01'),('C2K17100001','aaaaAAAA1!','Anish Dhage','TE1','K1','','','1','Anni','Male','anishdhage@gmail.com','9999999999','Jarvis Society','Computer Engineering','1999-12-06'),('C2K17100002','aaaaAAAA1!','Akhil Gandhi','TE1','K1','','','1','Akki','Male','akhilgandhi@gmail.com','9999999999','Hostel','Computer Engineering','1999-01-01'),('C2K17100003','aaaaAAAA1!','Aditya Brahme','TE2','K2','','','1','Adi','Male','adibrahme@gmail.com','9999999999','Hostel','Computer Engineering','1999-01-01'),('C2K17100004','aaaaAAAA1!','Hrishikesh Dange','TE2','K2','','','1','Hrishi','Male','hdange@gmail.com','9999999999','Hostel','Computer Engineering','1999-01-01'),('C2K17100005','aaaaAAAA1!','Vidhi Dhoka','TE2','K2','','','1','Vidhi','Female','vd@gmail.com','9999999999','Hostel','Computer Engineering','1999-01-01'),('C2K17100006','aaaaAAAA1!','Vishal Ingle','TE2','L2','','','1','Vishu','Male','vishalingle@gmail.com','9999999999','Hostel','Computer Engineering','1999-01-01'),('C2K17100007','aaaaAAAA1!','Siddhesh Jadhav','TE2','L2','','','1','Sid','Male','sidjad@gmail.com','9999999999','Hostel','Computer Engineering','1999-01-01'),('C2K17100008','aaaaAAAA1!','Atharva Kulkarni','TE2','L2','','','1','Atharva','Male','atharvakulkarni@gmail.com','9999999999','Hostel','Computer Engineering','1999-01-01'),('C2K17100010','password','Gautam Nahar','TE1','K1','','','4','Shraddha','Male','gtnahar2@gmail.com','8989898989','Pimpri','Computer Engineering','1996-06-06'),('C2K17100011','password','Mayuresh Pingale','TE1','K1','','','3','pink','Male','mping@gmail.com','8787878989','Sinhagad Road','Computer Engineering','2000-08-08'),('C2K17105725','aaaaAAAA1!','Apoorv Dixit','TE1','K1','','','1','Appu','Male','apoorvdixit619@gmail.com','9028610141','Mukundnagar, Pune','Computer Engineering','1999-01-09');
/*!40000 ALTER TABLE `Student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batches` (
  `name` varchar(4) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL,
  `division` int(3) NOT NULL,
  `cc_id` varchar(20) DEFAULT NULL,
  `mentor_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
INSERT INTO `batches` VALUES ('K1','Computer Engineering','TE',1,NULL,'C2K12100001'),('K2','Computer Engineering','TE',2,NULL,'C2K12100001'),('L2','Computer Engineering','TE',2,NULL,'C2K13100000');
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `ID` int(11) NOT NULL,
  `Department_name` varchar(200) NOT NULL,
  `Department_code` varchar(10) NOT NULL,
  `HOD_ID` varchar(50) NOT NULL,
  `Creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `Department_name` (`Department_name`),
  UNIQUE KEY `Department_code` (`Department_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (4,'Applied Science','PHY','777','2020-04-09 12:59:59'),(1,'Computer Engineering','CSE','C2K17101111','2020-03-30 17:21:35'),(2,'Electronics and Telecommunication','ENTC','56','2020-04-01 10:09:26'),(3,'Information Technology','IT','789','2020-04-01 10:10:10');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_leave_application`
--

DROP TABLE IF EXISTS `employee_leave_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_leave_application` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Leave_type` varchar(100) NOT NULL,
  `To_date` varchar(100) NOT NULL,
  `From_date` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `HOD_remark` mediumtext,
  `HOD_remark_date` varchar(100) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `Is_read` int(1) NOT NULL,
  `Emp_ID` varchar(50) NOT NULL,
  `Leave_address` mediumtext,
  `Leave_contact` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_leave_application`
--

LOCK TABLES `employee_leave_application` WRITE;
/*!40000 ALTER TABLE `employee_leave_application` DISABLE KEYS */;
INSERT INTO `employee_leave_application` VALUES (1,'Medical Leave','2020-03-04','2020-03-01','Fever','2020-04-15 06:59:03','Take Care','2020-04-15 12:33:15 ',1,0,'C2K12100000','Baner',9999999999),(2,'Medical Leave','2020-02-05','2020-02-01','Sick','2020-04-15 13:32:54','Take Care','2020-04-15 19:09:33 ',1,0,'C2K12100000','Pune',9999999999);
/*!40000 ALTER TABLE `employee_leave_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leave_types` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Carry_forward` int(1) NOT NULL,
  `start_balance` int(11) DEFAULT NULL,
  `lapse` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `Type` (`Type`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_types`
--

LOCK TABLES `leave_types` WRITE;
/*!40000 ALTER TABLE `leave_types` DISABLE KEYS */;
INSERT INTO `leave_types` VALUES (1,'Casual Leave','Casual Leave','2020-04-05 15:51:05',0,0,0),(2,'Medical Leave','Medical Leave','2020-04-05 15:51:56',0,15,1),(3,'Paid Leave','Paid Leave','2020-04-05 15:53:09',0,3,0),(7,'CoronaVirus Leave','CoronaVirus Leave','2020-04-14 17:14:38',0,15,0),(8,'Maternity Leave','Maternity Leave','2020-04-15 03:16:45',0,21,0);
/*!40000 ALTER TABLE `leave_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail` mediumtext NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notices`
--

LOCK TABLES `notices` WRITE;
/*!40000 ALTER TABLE `notices` DISABLE KEYS */;
INSERT INTO `notices` VALUES (10,'Leaves won\'t be granted after 25/04/2020.','2020-04-08'),(11,'Test from Database','2020-01-01'),(12,'Test from Database2','2020-01-02'),(16,'Test from website into DB1','2020-04-14'),(18,'The mock practicals are taking place today!','2020-04-15'),(19,'Test Notices','2020-04-15');
/*!40000 ALTER TABLE `notices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_leave_application`
--

DROP TABLE IF EXISTS `student_leave_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_leave_application` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Student_ID` varchar(50) NOT NULL,
  `To_date` date NOT NULL,
  `From_date` date NOT NULL,
  `Description` mediumtext NOT NULL,
  `Attendance` int(3) NOT NULL DEFAULT '75',
  `Batch_name` varchar(10) NOT NULL,
  `Class_name` varchar(10) NOT NULL,
  `Leave_address` mediumtext NOT NULL,
  `Leave_contact` bigint(20) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  `Urgent` int(1) NOT NULL DEFAULT '0',
  `Staff_remark` varchar(100) DEFAULT '',
  `Staff_remark_date` varchar(100) DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_leave_application`
--

LOCK TABLES `student_leave_application` WRITE;
/*!40000 ALTER TABLE `student_leave_application` DISABLE KEYS */;
INSERT INTO `student_leave_application` VALUES (1,'C2K17105725','2020-04-10','2020-04-01','Dengue',75,'K1','TE1','Mukundnagar, Pune',9028610141,1,0,'Take Care','2020-04-15 12:45:11 '),(2,'C2K17100001','2020-04-08','2020-04-03','Vacation',75,'K1','TE1','Jarvis Society',9999999999,2,0,'Attend','2020-04-15 12:45:20 '),(3,'C2K17105725','2020-02-04','2020-02-02','Sick',75,'K1','TE1','Mukundnagar, Pune',9028610141,1,0,'Take Care','2020-04-15 19:01:34 ');
/*!40000 ALTER TABLE `student_leave_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'lms_1'
--

--
-- Dumping routines for database 'lms_1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-18 17:58:47
