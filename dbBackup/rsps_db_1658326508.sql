

CREATE TABLE `indiv_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `students_id` int(11) NOT NULL,
  `term` varchar(20) NOT NULL,
  `session` varchar(20) NOT NULL,
  `class` varchar(5) NOT NULL,
  `paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `present` int(11) NOT NULL,
  `absent` int(11) NOT NULL,
  `comment` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `students_id` (`students_id`),
  CONSTRAINT `indiv_students_ibfk_2` FOREIGN KEY (`students_id`) REFERENCES `students` (`adm`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO indiv_students VALUES("2","1902","2","2122","JS3","1","0","120","0","He is improving in his arithmetic need to work more on reading and communication","2022-04-06 23:11:15","2022-04-06 23:11:15","0000-00-00 00:00:00");
INSERT INTO indiv_students VALUES("3","1901","2","2122","JS3","0","0","120","0","He is a very neat and intelligent boy. Work more on your personal studies for better performance","2022-04-07 09:19:30","2022-04-07 09:19:30","0000-00-00 00:00:00");
INSERT INTO indiv_students VALUES("4","1903","2","2122","JS3","1","0","120","0","Good performance ❤️, keep the ball rolling. He should work on his non challant attitude.","2022-04-07 09:24:28","2022-04-07 09:24:28","0000-00-00 00:00:00");
INSERT INTO indiv_students VALUES("5","1905","2","2122","JS3","1","0","120","0","Impressive result ?, keep the flag rolling. Need to work more on past courses.","2022-04-07 09:30:23","2022-04-07 09:30:23","0000-00-00 00:00:00");



