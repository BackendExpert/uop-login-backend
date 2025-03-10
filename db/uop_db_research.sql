-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: uop_db
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `research`
--

DROP TABLE IF EXISTS `research`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `research` (
  `research_id` int NOT NULL AUTO_INCREMENT,
  `res_titile` varchar(255) NOT NULL,
  `res_desc` varchar(1000) NOT NULL,
  `res_img` varchar(255) NOT NULL,
  `res_link` varchar(255) NOT NULL,
  `res_faculty` varchar(255) NOT NULL,
  PRIMARY KEY (`research_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `research`
--

LOCK TABLES `research` WRITE;
/*!40000 ALTER TABLE `research` DISABLE KEYS */;
INSERT INTO `research` VALUES (3,'Sustainable Smart Cities','Research on using IoT, AI, and renewable energy to design eco-friendly and efficient urban spaces.','uploads/wp2677602.jpg','https://www.google.com/','Faculty of Engineering'),(4,'Next-Gen Battery Technology','Developing high-capacity, fast-charging, and long-lasting battery solutions for electric vehicles and smart devices.','uploads/wp2677602.jpg','https://www.google.com/','Faculty of Engineering'),(5,'Artificial Photosynthesis for Clean Energy','Exploring how plants convert sunlight into energy and applying it to create sustainable fuel sources.','uploads/wp7534295.jpg','https://www.google.com/','Faculty of Science'),(6,'Microplastic Pollution and Its Impact ','Investigating the presence of microplastics in water sources and their long-term effects on human health.','uploads/wp7534295.jpg','https://www.google.com/','Faculty of Science'),(7,'AI in Disease Diagnosis ','Researching how artificial intelligence can assist doctors in early detection of diseases like cancer and Alzheimer’s.','uploads/wp7534312.jpg','https://www.google.com/','Faculty of Medicine & Health Sciences'),(8,'Mental Health in University Students','Studying stress, anxiety, and coping mechanisms among students to develop better campus wellness programs.','uploads/wp7534312.jpg','https://www.google.com/','Faculty of Medicine & Health Sciences'),(9,'Quantum Computing Applications',' Exploring how quantum computing can revolutionize problem-solving in cryptography, AI, and simulations.','uploads/wp2015494.jpg','https://www.google.com/','Faculty of Information Technology & Computer Science'),(10,'Cybersecurity in Smart Devices ','Researching vulnerabilities in IoT devices and developing new protocols to prevent hacking threats.','uploads/wp2015494.jpg','https://www.google.com/','Faculty of Information Technology & Computer Science'),(11,'The Impact of Cryptocurrency on Global Markets ','Analyzing how Bitcoin, Ethereum, and digital assets influence financial stability.','uploads/wp3396930.jpg','https://www.google.com/','Faculty of Business & Economics'),(12,'AI in Customer Service','Studying how AI-powered chatbots and virtual assistants are changing consumer interactions and business efficiency.','uploads/wp3396930.jpg','https://www.google.com/','Faculty of Business & Economics'),(13,'Climate Change and Coastal Erosion','Investigating how rising sea levels affect coastal cities and proposing mitigation strategies.','uploads/wp7534295.jpg','https://www.google.com/','Faculty of Environmental Science'),(14,'Waste-to-Energy Innovations','Researching technologies that convert waste into usable energy to promote sustainability.','uploads/wp2677602.jpg','https://www.google.com/','Faculty of Environmental Science');
/*!40000 ALTER TABLE `research` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-10  6:36:48
