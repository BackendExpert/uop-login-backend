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
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_desc` varchar(1000) NOT NULL,
  `news_link` varchar(255) NOT NULL,
  `news_img` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (6,'University Research Breakthrough',' Highlight a recent discovery or research breakthrough by university students or faculty members that has the potential to make an impact in the field.','https://www.google.com/','uploads/wp11704432.jpg','2025-03-18'),(7,'Campus Sustainability Initiative ','A feature on the university’s efforts to reduce its carbon footprint, implement recycling programs, or promote green energy.','https://www.google.com/','uploads/wp11704432.jpg','2025-03-19'),(8,'Student Awards Ceremony','A recap of an awards ceremony where outstanding students and faculty are recognized for academic excellence, leadership, or community service.','https://www.google.com/','uploads/wp3396930.jpg','2025-03-20'),(9,'International Collaboration Agreement','Coverage of a new partnership or collaboration agreement between the university and an international institution, enhancing research or student exchange programs.','www.google.com','uploads/wp11704432.jpg','2025-03-22'),(10,'Guest Lecture by Industry Leader','A feature on a notable guest speaker from the industry or academia who visited the university to deliver a lecture on a relevant topic.','https://www.google.com/','uploads/wp11704381.jpg','2025-03-23'),(11,'New Campus Facilities Opening','Coverage of the opening of new facilities such as libraries, labs, or student centers that aim to improve the campus experience.','www.google.com','uploads/wp11704432.jpg','2025-03-25'),(12,'Campus Safety Improvements ','A report on new safety measures implemented on campus, such as enhanced security, emergency systems, or mental health resources for students.','https://www.google.com/','uploads/wp4094503.jpg','2025-03-28'),(13,'Student Organization Milestones','Highlight the achievements or major milestones of a student club or organization, such as hosting a successful event or starting a new initiative.','www.google.com','uploads/wp11704381.jpg','2025-04-02'),(14,'Study Abroad Program Launch','A feature on a new study abroad program offered by the university, encouraging students to expand their horizons and experience different cultures.','https://www.google.com/','uploads/wp11704381.jpg','2025-04-05'),(15,'Technology Integration in Education','A report on how the university is incorporating new technologies, such as virtual classrooms or AI tools, into its educational curriculum.','www.google.com','uploads/wp11704381.jpg','2025-04-07'),(16,'Campus Event Recap','A recap of a recent major campus event, such as a cultural fair, music concert, or charity fundraiser, with highlights from the activities and attendees.','https://www.google.com/','uploads/wp4094503.jpg','2025-04-08'),(17,'Student Mental Health Awareness Campaign','A feature on initiatives or campaigns run by the university to raise awareness about mental health and offer support resources for students.','www.google.com','uploads/wp11704432.jpg','2025-04-10');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-10  6:36:47
