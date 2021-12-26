CREATE DATABASE IF NOT EXISTS `weblabproj`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(235) NOT NULL,
  `website` varchar(500) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci