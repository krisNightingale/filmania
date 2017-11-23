-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `filmania`;
CREATE DATABASE `filmania` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `filmania`;

DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id_action` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_action`),
  UNIQUE KEY `id_action_UNIQUE` (`id_action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `actions` (`id_action`, `name`) VALUES
(1,	'смотрел'),
(2,	'буду смотреть');

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `admins_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admins` (`id`, `user_id`) VALUES
(1,	7);

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE `favorites` (
  `user_id` int(10) unsigned NOT NULL,
  `film_id` int(10) unsigned NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `film_id` (`film_id`),
  CONSTRAINT `favorites_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `favorites_ibfk_4` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `favorites` (`user_id`, `film_id`) VALUES
(7,	6),
(1,	5),
(8,	6),
(7,	7);

DROP TABLE IF EXISTS `films`;
CREATE TABLE `films` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `release_year` year(4) NOT NULL,
  `duration` int(11) NOT NULL,
  `country` varchar(45) NOT NULL,
  `genre` varchar(64) NOT NULL,
  `rating` float unsigned NOT NULL DEFAULT '0',
  `poster_id` int(10) unsigned NOT NULL DEFAULT '1',
  `description` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_films_UNIQUE` (`id`),
  KEY `poster_id` (`poster_id`),
  CONSTRAINT `films_ibfk_1` FOREIGN KEY (`poster_id`) REFERENCES `posters` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `films` (`id`, `name`, `release_year`, `duration`, `country`, `genre`, `rating`, `poster_id`, `description`) VALUES
(1,	'Побег из Шоушенка',	'1994',	142,	'США',	'Драма, криминал',	5,	2,	'Шоушенк — название тюрьмы. И если тебе нет еще 30-ти, а ты получаешь пожизненное, то приготовься к худшему: для тебя выхода из Шоушенка не будет!'),
(2,	'Зеленая миля',	'1999',	189,	'США',	'Фэнтэзи, драма, криминал',	5,	3,	NULL),
(3,	'Форрест Гамп',	'1994',	142,	'США',	'Драма, мелодрама, комедия',	4,	4,	NULL),
(4,	'Список Шиндлера',	'1993',	195,	'США',	'Драма, биография',	5,	5,	NULL),
(5,	'1+1',	'2011',	112,	'Франция',	'Драма, комедия, биография',	4,	6,	'Пострадав в результате несчастного случая, богатый аристократ Филипп нанимает в помощники человека, который менее всего подходит для этой работы, — молодого жителя предместья Дрисса, только что освободившегося из тюрьмы. Несмотря на то, что Филипп прикован к инвалидному креслу, Дриссу удается привнести в размеренную жизнь аристократа дух приключений.'),
(6,	'Бегущий по лезвию',	'1982',	117,	'США',	'Драма, фэнтези',	3,	8,	'Отставной детектив Рик Декард вновь восстановлен в полиции Лос-Анджелеса для поиска возглавляемой Роем Батти группы киборгов, совершившей побег из космической колонии на Землю.'),
(7,	'Начало',	'2010',	148,	'США, Великобритания',	'Кинофантастика, триллер ',	4,	7,	NULL),
(8,	'Леон',	'1994',	110,	'США',	'Криминальный фильм, триллер',	3,	9,	'Профессиональный убийца Леон, не знающий пощады и жалости, знакомится со своей очаровательной соседкой Матильдой, семью которой расстреливают полицейские, замешанные в торговле наркотиками.');

DROP TABLE IF EXISTS `film_staff`;
CREATE TABLE `film_staff` (
  `film_id` int(10) unsigned NOT NULL,
  `staff_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`film_id`,`staff_id`),
  KEY `fk_stuff_films_idx` (`staff_id`),
  CONSTRAINT `fk_films_stuff` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_stuff_films` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `film_staff` (`film_id`, `staff_id`) VALUES
(1,	1),
(2,	1),
(1,	2),
(5,	2),
(1,	3),
(5,	3),
(4,	4),
(4,	5),
(6,	9),
(7,	10),
(7,	11),
(5,	12),
(3,	13),
(4,	14);

DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres` (
  `id_genre` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_genre`),
  UNIQUE KEY `id_genre_UNIQUE` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8,	'2014_10_12_000000_create_users_table',	1),
(9,	'2014_10_12_100000_create_password_resets_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_position_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `positions` (`id`, `name`) VALUES
(1,	'Режиссёр'),
(2,	'Продюссер'),
(3,	'Оператор'),
(4,	'Композитор'),
(5,	'Монтаж');

DROP TABLE IF EXISTS `posters`;
CREATE TABLE `posters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posters` (`id`, `image_path`) VALUES
(1,	'posters/default.jpg'),
(2,	'posters/film1.jpg'),
(3,	'posters/film2.jpg'),
(4,	'posters/forrest.jpg'),
(5,	'posters/shindler.jpg'),
(6,	'posters/1plus1.jpg'),
(7,	'posters/film7.jpg'),
(8,	'posters/bladerunner1.jpg'),
(9,	'posters/leon.jpg');

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `film_id` int(10) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mark` int(10) unsigned NOT NULL DEFAULT '9',
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_review_UNIQUE` (`id`),
  KEY `fk_review_film_idx` (`film_id`),
  KEY `fk_review_user_idx` (`user_id`),
  CONSTRAINT `fk_review_film` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `reviews` (`id`, `user_id`, `film_id`, `date`, `mark`, `text`) VALUES
(1,	1,	4,	'2017-11-23 00:07:31',	9,	'Замечательно'),
(2,	2,	3,	'2017-11-23 00:07:42',	9,	'Прекрасно'),
(3,	3,	1,	'2017-11-23 00:07:56',	5,	'нууу такое'),
(4,	4,	5,	'2017-10-05 20:25:18',	10,	'Понравилось'),
(5,	5,	2,	'2017-10-06 19:25:18',	8,	NULL),
(6,	1,	5,	'2017-10-07 12:28:14',	7,	'Классный фильм! Огонь,бомба! Всем советую.'),
(7,	2,	4,	'2017-10-07 16:30:06',	8,	NULL),
(8,	3,	3,	'2017-10-09 07:05:10',	9,	NULL),
(9,	4,	2,	'2017-10-09 13:12:24',	6,	NULL),
(10,	5,	1,	'2017-10-10 18:16:00',	8,	NULL),
(11,	4,	6,	'2017-10-18 18:53:07',	9,	NULL),
(12,	3,	7,	'2017-10-18 19:40:50',	10,	'Классный фильм! Огонь,бомба! Всем советую.'),
(13,	2,	6,	'2017-10-18 20:00:07',	8,	NULL),
(14,	7,	6,	'2017-11-23 00:46:12',	9,	'Nice'),
(15,	7,	5,	'2017-11-23 00:50:44',	9,	'Cool'),
(16,	7,	5,	'2017-11-23 00:52:04',	9,	'nice'),
(17,	7,	5,	'2017-11-23 08:07:03',	9,	'great');

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `position_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_stuff_UNIQUE` (`id`),
  KEY `fk_stuff_position_idx` (`position_id`),
  CONSTRAINT `fk_stuff_position` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `position_id`) VALUES
(1,	'Фрэнк',	'Дарабонт',	1),
(2,	'Ники',	'Марвин',	2),
(3,	'Роджер',	'Дикинс',	3),
(4,	'Томас',	'Ньюман',	4),
(5,	'Ричард',	'Фрэнсис-Брюс',	5),
(9,	'Ридли',	'Скотт',	1),
(10,	'Кристофер',	'Нолан',	1),
(11,	'Ли',	'Смит',	5),
(12,	'Дориан',	'Ригаль-Ансу',	1),
(13,	'Роберт',	'Земекис',	1),
(14,	'Стивен',	'Спилберг',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `id` (`id`),
  KEY `photo_id` (`photo_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `user_photos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `photo_id`) VALUES
(1,	'Александра',	'Грасси',	'grassi@gmail.com',	'grassi',	NULL,	NULL,	NULL,	1),
(2,	'Татьяна',	'Бурдыкина',	'burdikina@gmail.com',	'burdikina',	NULL,	NULL,	NULL,	1),
(3,	'Кристина',	'Соловьёва',	'solovyova@gmail.com',	'solovyova',	NULL,	NULL,	NULL,	1),
(4,	'Илья',	'Соловьёв',	'frostyn@gmail.com',	'frostyn',	NULL,	NULL,	NULL,	1),
(5,	'Ольга',	'Пасибаева',	'pasibaeva@gmail.com',	'pasibaeva',	NULL,	NULL,	NULL,	1),
(6,	'Jane',	'Doe',	'secret@gmail.com',	'password',	NULL,	'2017-11-20 18:35:51',	'2017-11-20 18:35:51',	1),
(7,	'Me11',	'Surname',	'email@gmail.com',	'$2y$10$extEbjsx6sjfjawxwcx27etlb4Qmmr6f7JNIa0rij4Nq1O8C5c3mC',	'b1MRGh6dyOiLtdF9cpkDP6141NfKxEcGghLjOUKpZNfgcXbJf6Mu0oWWbzL3',	'2017-11-21 11:20:55',	'2017-11-22 06:04:27',	1),
(8,	'Виталик',	'Антипа',	'antipa@gmail.com',	'$2y$10$Vos3nuVjJoA5zKYqRc27QeglEwB0A/R8AEf.du0ZaVaDQJXFEvh/2',	'DrRIzhAJhdMUIvKTuSSi6imaF7OlVYD6MilAuEpcBd2aXOGtybUNtJWTnKdP',	'2017-11-21 13:33:14',	'2017-11-21 13:33:14',	1);

DROP TABLE IF EXISTS `user_photos`;
CREATE TABLE `user_photos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_photos` (`id`, `image_path`) VALUES
(1,	'user_photos/default.png');

DROP TABLE IF EXISTS `watchlist`;
CREATE TABLE `watchlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `film_id` int(10) unsigned NOT NULL,
  `mark` int(10) unsigned NOT NULL DEFAULT '0',
  `action_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_watchlist_UNIQUE` (`id`),
  KEY `fk_watchlist_user_idx` (`user_id`),
  KEY `fk_watchlist_film_idx` (`film_id`),
  KEY `fk_watchlist_action_idx` (`action_id`),
  CONSTRAINT `fk_watchlist_action` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id_action`) ON UPDATE CASCADE,
  CONSTRAINT `fk_watchlist_film` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `watchlist` (`id`, `user_id`, `film_id`, `mark`, `action_id`) VALUES
(1,	1,	5,	0,	1),
(2,	2,	4,	0,	2),
(3,	3,	3,	0,	1),
(4,	4,	2,	0,	2),
(5,	5,	1,	0,	1),
(6,	4,	4,	0,	1),
(7,	1,	3,	0,	2),
(8,	7,	3,	0,	2),
(9,	7,	4,	0,	1),
(10,	7,	6,	0,	2),
(11,	7,	5,	0,	2),
(12,	8,	8,	5,	2),
(13,	8,	6,	0,	1),
(14,	7,	7,	4,	1),
(15,	7,	8,	1,	2);

-- 2017-11-23 12:50:17
