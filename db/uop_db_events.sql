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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `envet_desc` varchar(1000) NOT NULL,
  `event_link` varchar(255) NOT NULL,
  `event_img` varchar(255) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (11,'Hackathon ','2025-03-18','A coding competition where students develop innovative solutions to real-world problems within a limited time.','https://www.google.com/','uploads/wp3396930.jpg'),(12,'Startup Pitch Competition','2025-03-21','Aspiring entrepreneurs present their business ideas to judges for feedback and potential funding opportunities.','https://www.google.com/','uploads/wp11704432.jpg'),(13,'Tech Talk Series','2025-03-22','Industry experts or alumni share insights on trending technologies, career paths, and research advancements.','https://www.google.com/','uploads/wp11704381.jpg'),(14,'Cultural Night','2025-03-24',' A celebration of diverse cultures through performances, food, and exhibitions from different backgrounds.','https://www.google.com/','uploads/wp11704432.jpg'),(15,'Research Symposium','2025-03-26','A platform for students to showcase their research projects, papers, and innovative ideas.','https://www.google.com/','uploads/wp3396930.jpg'),(16,'E-Sports Tournament','2025-03-27',' A gaming competition where students can compete in popular multiplayer games like Valorant, FIFA, or Dota 2.','https://www.google.com/','uploads/wp3396930.jpg'),(17,'Career Fair ','2025-03-28',' Companies visit the university to offer internships, job opportunities, and networking sessions for students.','https://www.google.com/','uploads/wp11704432.jpg'),(18,'Sports Fest','2025-03-30','A series of sports events including football, basketball, chess, and relay races to promote fitness and teamwork.','https://www.google.com/','uploads/wp4094503.jpg'),(19,'Photography Contest','2025-04-03','A creative competition where students submit their best photos based on a theme, with prizes for winners.','https://www.google.com/','uploads/wp11704432.jpg'),(20,'Music & Talent Show','2025-04-05','A platform for students to showcase their singing, dancing, and other creative talents.','https://www.google.com/','uploads/wp11704432.jpg'),(21,'Social Impact Challenge','2025-04-07','Students collaborate on projects aimed at solving community or environmental issues.','https://www.google.com/','uploads/wp11704432.jpg'),(22,'Debate & Public Speaking Contest','2025-04-11','A competition to enhance critical thinking, persuasive skills, and public speaking confidence.','https://www.google.com/','uploads/wp4094503.jpg');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
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
