CREATE TABLE `breakin_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick1` varchar(64) NOT NULL,
  `nick2` varchar(64) DEFAULT NULL,
  `team_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_name` (`team_name`),
  KEY `nick1` (`nick1`),
  KEY `nick2` (`nick2`),
  KEY `team_name_2` (`team_name`)
) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=latin1;
