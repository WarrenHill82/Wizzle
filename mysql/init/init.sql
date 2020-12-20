CREATE DATABASE IF NOT EXISTS `wizzle`;

CREATE TABLE IF NOT EXISTS `wizzle`.`users` (
	  `id` INT NOT NULL AUTO_INCREMENT,
	  `username` VARCHAR(255) NULL,
	  `email` VARCHAR(255) NULL,
	  `password` VARCHAR(255) NULL,
	  PRIMARY KEY (`id`));
