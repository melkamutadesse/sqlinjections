

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `salary` int(9) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES 
(75,'Melkamu Tadesse','Admin','passadmin',40000,45,'78278'),
(76,'Alemu Abate','Alemu','passalice',20000,44,'32432'),
(77,'Barok James','Barok','passbarok',15000,30,'34244'),
(78,'Ribka Mekonnen','Ribka','passribka',9000,32,'67455'),
(79,'Muluken Tefera','Muluken','passmuluken',14000,27,'58667'),
(80,'Tilahun T/Mariam','Tilahun','passtilahun',11000,28,'87576'),
(91,'Aster Awoke','Aster','passaster',10000,32,'43224');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;