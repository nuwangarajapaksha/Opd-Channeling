CREATE DATABASE  IF NOT EXISTS `opd_channeling_db` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `opd_channeling_db`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: opd_channeling_db
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(45) NOT NULL,
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(25) NOT NULL,
  `admin_status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_id_UNIQUE` (`admin_id`),
  UNIQUE KEY `admin_email_UNIQUE` (`admin_email`),
  UNIQUE KEY `admin_username_UNIQUE` (`admin_username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'nuwanga@gmail.com','nuwa','1234',1),(2,'kamal@gmail.com','kamal','1234',1),(3,'nimal@gmail.com','nimal','1234',1),(4,'kasun@gmail.com','kasun','1234',1),(5,'sadun@gmail.com','sadun','1234',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `appointment_date` date NOT NULL,
  `appointment_start_time` time NOT NULL,
  `appointment_end_time` time NOT NULL,
  `doctor_id` int NOT NULL,
  `patient_id` int NOT NULL,
  `appointment_status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`appointment_id`),
  UNIQUE KEY `appointment_id_UNIQUE` (`appointment_id`),
  KEY `fk_appointment_doctor1_idx` (`doctor_id`),
  KEY `fk_appointment_patient1_idx` (`patient_id`),
  CONSTRAINT `fk_appointment_doctor1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  CONSTRAINT `fk_appointment_patient1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (1,'2021-11-30','09:00:00','09:20:00',1,1,1),(2,'2021-11-30','09:20:00','09:40:00',1,2,1),(3,'2021-11-30','09:40:00','10:00:00',1,3,1),(4,'2021-12-01','09:00:00','09:20:00',1,4,1),(5,'2021-11-30','09:20:00','09:40:00',1,5,1),(6,'2021-12-10','09:00:00','09:20:00',2,1,1),(7,'2021-12-10','09:20:00','09:40:00',2,2,1),(8,'2021-12-10','09:40:00','10:00:00',2,3,1);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `doctor_id` int NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(45) NOT NULL,
  `doctor_nic` varchar(20) NOT NULL,
  `doctor_contact_no` varchar(10) NOT NULL,
  `doctor_password` varchar(25) NOT NULL,
  `hospital_id` int NOT NULL,
  `doctor_status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`doctor_id`),
  UNIQUE KEY `doctor_id_UNIQUE` (`doctor_id`),
  UNIQUE KEY `doctor_email_UNIQUE` (`doctor_contact_no`),
  UNIQUE KEY `doctor_nic_UNIQUE` (`doctor_nic`),
  KEY `fk_doctor_hospital_idx` (`hospital_id`),
  CONSTRAINT `fk_doctor_hospital` FOREIGN KEY (`hospital_id`) REFERENCES `hospital` (`hospital_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (1,'Saman Thilekerathna','198819401866','0775558294','1234',1,1),(2,'Nadun Gallege','197729384777','0754448392','1234',2,1),(3,'Madhavee Wijesinghe','198020399938','0712938722','1234',3,1),(4,'Rahula Gunewardana','196639398483','0712837778','1234',4,1),(5,'Pandula Basnayaka','199038477737','0773338292','1234',1,1);
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospital` (
  `hospital_id` int NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(120) NOT NULL,
  `hospital_city` varchar(30) NOT NULL,
  `hospital_contact_no` varchar(10) NOT NULL,
  `hospital_status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`hospital_id`),
  UNIQUE KEY `hospital_id_UNIQUE` (`hospital_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES (1,'National Hospital of Sri Lanka','Colombo','0112691111',1),(2,'Lanka Hospitals','Colombo','0115430000',1),(3,'Nawaloka Hospital','Colombo','0115577111',1),(4,'Sri Jayewardenepura General Hospital','Sri Jayawardenepura Kotte','0112778610',1),(5,'Hemas Hospital Wattala','Wattala','0117888888',1),(6,'Llanka Hospital','Colombo','0115530000',1),(7,'Leesons Hospital','Ragama','0112961300',1);
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patient` (
  `patient_id` int NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(45) NOT NULL,
  `patient_nic` varchar(20) NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `patient_contact_no` varchar(10) NOT NULL,
  `patient_password` varchar(25) NOT NULL,
  `patient_status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`patient_id`),
  UNIQUE KEY `patient_id_UNIQUE` (`patient_id`),
  UNIQUE KEY `patient_nic_UNIQUE` (`patient_nic`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1,'Sadun Perera','199619401866','1996-07-21','Colombo 05','0775551956','1234',1),(2,'Kamal Gunerathna','197794938483','1977-08-12','Wattala','0712744839','1234',1),(3,'Rakitha Soysa','195439302000','1954-12-22','Gampaha','0772636628','1234',1),(4,'Banuka Indula','195593920093','1955-06-14','Kelaniya','0771228394','1234',1),(5,'Chethana Perera','196683839222','1996-02-07','Colombo 08','0753839992','1234',1);
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-21 22:07:15
