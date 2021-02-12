CREATE TABLE `membres` (
  `membre` int(11) NOT NULL auto_increment,
  `mdp` varchar(40) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY `mdp`),
  UNIQUE (`membre`),
  UNIQUE (`email`),
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci AUTO_INCREMENT=1