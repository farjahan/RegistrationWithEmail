database name hello;


I am not using `resetToken`and `resetComplete`.


CREATE TABLE `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  `login_attempts` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1



CREATE TABLE `documents` (
`did` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(30) NOT NULL,
  `expdate` date DEFAULT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `uploadTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `filePath` varchar(100) DEFAULT NULL,
  `memberID` int(11) NOT NULL,
  PRIMARY KEY (`did`),
  KEY `memberID` (`memberID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1