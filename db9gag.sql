-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Posts`;
CREATE TABLE `Posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `content` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreationDate` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `photoAdress` varchar(20000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `User_id` (`User_id`),
  CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `Posts` (`id`, `User_id`, `content`, `CreationDate`, `photoAdress`) VALUES
(105,	16,	'la cyber secu c Ã¨ Ã¨ Ã¨ Ã¨Ã¨  trop bien!',	'2019-07-05 07:41:52',	'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm0QkAW24He4TeHXTDJ0U6q2ful4viYa_6SFnI4naMAdK0lulzng'),
(107,	15,	'ezaeaea',	'2019-07-05 09:15:31',	'data:image/jpeg;base64,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'),
(108,	15,	'dzd',	'2019-07-05 12:22:45',	'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTL-WmgdoZYZmvyxAMBgHdvP9hzEqow2oivbpI5v2jDGmZ3KlNaRg');

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `Users` (`id`, `name`, `password`) VALUES
(12,	'alex6969696969',	'$2y$10$CdoXNcy5xYaTR6gAZ9QfFe0uhQAmlD/HVAqacWz9Py7i3CciDJZp6'),
(13,	'dd',	'$2y$10$5nmqvZvfqwiGITu1ApBRfe7f8/2GDba4yhtJ1hYwSTDXXGKOt6WAO'),
(14,	'admin',	'$2y$10$.grePNmvGme3dEWyWMVUJOQ9Bcb4FeGnef59KwWfJynKhdxKyOgcG'),
(15,	'alex',	'$2y$10$RzXEeCzl0b8vTJj3RG7WKe8qsKix5YBv5BFj9L46M0qU5GynlHK0O'),
(16,	'clementLaMouille',	'$2y$10$M.7.6doqLDAw8cPDaX2dXOaQ04B3xsK9JloCp/MvQSeyGSDN3FuBe');

DROP TABLE IF EXISTS `usersCommentVotePosts`;
CREATE TABLE `usersCommentVotePosts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Users_id` int(11) NOT NULL,
  `Posts_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `vote` int(11) DEFAULT NULL,
  `currentDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Users_id` (`Users_id`),
  KEY `Posts_id` (`Posts_id`),
  CONSTRAINT `usersCommentVotePosts_ibfk_1` FOREIGN KEY (`Users_id`) REFERENCES `Users` (`id`),
  CONSTRAINT `usersCommentVotePosts_ibfk_2` FOREIGN KEY (`Posts_id`) REFERENCES `Posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usersCommentVotePosts` (`id`, `Users_id`, `Posts_id`, `comment`, `vote`, `currentDate`) VALUES
(9,	15,	105,	'Ah ouai trop bien lol mdr ptdr xptdr trololo!',	NULL,	'2019-07-05 12:21:27'),
(11,	15,	107,	'lol',	NULL,	'2019-07-05 09:18:37'),
(12,	15,	108,	'dddd',	NULL,	'2019-07-05 12:21:14'),
(13,	15,	105,	'Cte chevre!',	NULL,	'2019-07-05 12:21:45');

-- 2019-07-05 13:05:14
