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
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notice` (
  `notice_id` int NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(255) NOT NULL,
  `notice_link` varchar(100) NOT NULL,
  `notice_desc` varchar(1000) NOT NULL,
  `notice_date` date NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` VALUES (4,'Exam Schedule Announcement','https://www.google.com/','Notify students about the upcoming exam dates, time slots, and venue details to help them prepare in advance.','2025-03-12'),(5,'Library Closure for Maintenance','https://www.google.com/','Inform students of any planned library closures or limited hours due to maintenance or updates.','2025-03-13'),(6,'Guest Lecture Invitation','https://www.google.com/',' Announce an upcoming guest lecture, including the speaker\'s name, topic, time, and location, inviting students to attend.','2025-03-14'),(7,'Club Membership Registration ','https://www.google.com/','Notify students about the opening of registration for new club memberships or society sign-ups for the semester.','2025-03-15'),(8,'Course Registration Deadline','https://www.google.com/','Remind students about the final date for course registration or adding/dropping courses, along with instructions.','2025-03-16'),(9,'Internship Opportunities','https://www.google.com/','Inform students about available internships or job opportunities, with details on how to apply or deadlines.','2025-03-18'),(10,'Student Health Services Update ','https://www.google.com/',' Provide information about any changes to the student health center, such as new hours, services, or special clinics.','2025-03-19'),(11,'Career Fair Date and Registration ','https://www.google.com/','Announce the date and registration details for an upcoming career fair, encouraging students to sign up in advance.','2025-03-21'),(12,'Holiday Closure','https://www.google.com/','Notify students and staff about any upcoming holiday closures, including dates and affected departments or services.','2025-03-23'),(13,'Workshops and Training Sessions','https://www.google.com/','Announce upcoming workshops or training sessions on topics like resume building, coding, or public speaking.','2025-03-25'),(14,'Parking Permit Renewal Reminder','https://www.google.com/','Remind students about the deadline for renewing their parking permits and provide the necessary steps or links.','2025-03-27'),(15,'Scholarship Application Reminder','https://www.google.com/',' Notify students about upcoming scholarship application deadlines, with details on eligibility and application procedures.','2025-03-29');
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
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
