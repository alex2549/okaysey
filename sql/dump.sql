-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.25 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица okaysey.blocks
DROP TABLE IF EXISTS `blocks`;
CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы okaysey.blocks: ~2 rows (приблизительно)
DELETE FROM `blocks`;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` (`id`, `slug`, `body`, `active`) VALUES
	(1, 'nav', '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><!-- Brand and toggle get grouped for better mobile display -->\r\n<div class="navbar-header"><a class="navbar-brand" href="#"><span class="green">OK<span class="blue">aysey</span></span></a></div>\r\n<!-- Collect the nav links, forms, and other content for toggling -->\r\n<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">{{w:MainMenu}}\r\n<ul class="nav navbar-nav navbar-right">\r\n<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Language <b class="caret"></b></a> {{w:LanguageSwitcherWidget}}</li>\r\n</ul>\r\n</div>\r\n</nav>', 1),
	(2, 'footer', '<div class="footer top-shadow">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-xs-4">\r\n<h3>Навигация</h3>\r\n{{w:FooterMenu}}</div>\r\n<div class="col-xs-4"></div>\r\n<div class="col-xs-4">\r\n<h3>Социальные сети</h3>\r\n<ul>\r\n<li><a href="#">VK</a></li>\r\n<li><a href="#">Facebook</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="copyright">\r\n<p>&copy; {{w:CurrentYear}}</p>\r\n</div>\r\n</div>\r\n</div>', 1);
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;


-- Дамп структуры для таблица okaysey.blocks_lang
DROP TABLE IF EXISTS `blocks_lang`;
CREATE TABLE IF NOT EXISTS `blocks_lang` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `lang_id` varchar(6) NOT NULL,
  `l_body` text,
  PRIMARY KEY (`l_id`),
  KEY `owner_id` (`owner_id`),
  KEY `lang_id` (`lang_id`),
  CONSTRAINT `blocks_lang_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `blocks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы okaysey.blocks_lang: ~4 rows (приблизительно)
DELETE FROM `blocks_lang`;
/*!40000 ALTER TABLE `blocks_lang` DISABLE KEYS */;
INSERT INTO `blocks_lang` (`l_id`, `owner_id`, `lang_id`, `l_body`) VALUES
	(1, 1, 'ru', '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><!-- Brand and toggle get grouped for better mobile display -->\r\n<div class="navbar-header"><a class="navbar-brand" href="#"><span class="green">OK<span class="blue">aysey</span></span></a></div>\r\n<!-- Collect the nav links, forms, and other content for toggling -->\r\n<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">{{w:MainMenu}}\r\n<ul class="nav navbar-nav navbar-right">\r\n<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Language <b class="caret"></b></a> {{w:LanguageSwitcherWidget}}</li>\r\n</ul>\r\n</div>\r\n</nav>'),
	(2, 1, 'en', '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><!-- Brand and toggle get grouped for better mobile display -->\r\n<div class="navbar-header"><a class="navbar-brand" href="#"><span class="green">OK<span class="blue">aysey</span></span></a></div>\r\n<!-- Collect the nav links, forms, and other content for toggling -->\r\n<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">{{w:MainMenu}}\r\n<ul class="nav navbar-nav navbar-right">\r\n<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Language <b class="caret"></b></a> {{w:LanguageSwitcherWidget}}</li>\r\n</ul>\r\n</div>\r\n</nav>'),
	(3, 2, 'ru', '<div class="footer top-shadow">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-xs-4">\r\n<h3>Навигация</h3>\r\n{{w:FooterMenu}}</div>\r\n<div class="col-xs-4"></div>\r\n<div class="col-xs-4">\r\n<h3>Социальные сети</h3>\r\n<ul>\r\n<li><a href="#">VK</a></li>\r\n<li><a href="#">Facebook</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="copyright">\r\n<p>&copy; {{w:CurrentYear}}</p>\r\n</div>\r\n</div>\r\n</div>'),
	(4, 2, 'en', '<div class="footer top-shadow">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-xs-4">\r\n<h3>Навигация</h3>\r\n{{w:FooterMenu}}</div>\r\n<div class="col-xs-4"></div>\r\n<div class="col-xs-4">\r\n<h3>Социальные сети</h3>\r\n<ul>\r\n<li><a href="#">VK</a></li>\r\n<li><a href="#">Facebook</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="copyright">\r\n<p>&copy; {{w:CurrentYear}}</p>\r\n</div>\r\n</div>\r\n</div>');
/*!40000 ALTER TABLE `blocks_lang` ENABLE KEYS */;


-- Дамп структуры для таблица okaysey.pages
DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `begin_body` text,
  `end_body` text,
  `order` int(11) NOT NULL DEFAULT '9999',
  `parent_id` int(11) DEFAULT NULL,
  `show_in_menu` tinyint(1) NOT NULL DEFAULT '0',
  `menu_class` varchar(50) DEFAULT NULL,
  `show_title` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `undeletable` tinyint(1) NOT NULL DEFAULT '0',
  `template` varchar(50) DEFAULT NULL,
  `meta_index` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_description` varchar(300) DEFAULT NULL,
  `meta_keywords` varchar(300) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы okaysey.pages: ~3 rows (приблизительно)
DELETE FROM `pages`;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `title`, `slug`, `begin_body`, `end_body`, `order`, `parent_id`, `show_in_menu`, `menu_class`, `show_title`, `module`, `undeletable`, `template`, `meta_index`, `meta_title`, `meta_description`, `meta_keywords`, `active`) VALUES
	(1, 'Главная', '', '<div class="hero-container">\r\n<div class="container">\r\n<div class="col-xs-8">\r\n<h1><span class="green">OK<span class="blue">aysey</span></span></h1>\r\n<h2>Instant task messenger</h2>\r\n<div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, ea quidem ad cumque vel harum amet sit voluptas saepe necessitatibus sint pariatur non maxime eveniet aliquid eligendi vitae nobis illum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, voluptas, suscipit deleniti delectus temporibus alias earum perferendis. Omnis, iste, numquam, doloremque ut odio veritatis quam ex aperiam explicabo sapiente dicta.</p>\r\n</div>\r\n<div><a href="#"><img src="uploads/app-store-button-en.png" /></a></div>\r\n</div>\r\n<div class="col-xs-4"><img src="uploads/iphone.png" class="img-responsive" width="350" height="736" /></div>\r\n</div>\r\n</div>\r\n<div class="container step-container">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id tortor scelerisque, dictum enim hendrerit, consectetur lectus. Aenean non nisl magna. Fusce mattis iaculis ultricies. Nam sollicitudin laoreet facilisis. Suspendisse mattis felis sed suscipit rutrum. Donec ac ante quis sapien congue luctus. Sed facilisis massa nisl, id porta lorem varius quis. Aenean id ante quis sem vehicula euismod at sed massa.<br /><br />Pellentesque condimentum sem eu dui tristique semper sit amet sit amet justo. Vestibulum suscipit in magna nec faucibus. Donec tincidunt dapibus neque. Nullam cursus aliquet ullamcorper. Quisque a ipsum nec tortor lobortis elementum at gravida turpis. Fusce quam urna, condimentum quis dolor nec, ultricies rutrum eros. Praesent rutrum sapien sed elit mollis auctor. Nulla id sollicitudin nulla. Donec porta vehicula turpis, at malesuada lectus pretium eget.<br /><br />Nunc non nisl mi. Sed ut mi nec tortor varius pretium. Etiam aliquam nec justo non fermentum. Sed laoreet condimentum dui. Vivamus hendrerit massa nec commodo ultrices. Duis sed nulla porta, viverra velit nec, sagittis erat. Nulla facilisi. Quisque ultrices lobortis libero, id imperdiet urna fringilla ultricies. Donec suscipit arcu vel lorem tristique, non tincidunt leo sodales. Donec porttitor, quam et faucibus viverra, nunc erat mollis mauris, sit amet dapibus nisl nulla at ante. Etiam euismod lectus vitae laoreet bibendum. Curabitur et laoreet nulla. Praesent tristique est vitae odio viverra cursus. Cras venenatis porttitor dui eget congue.<br /><br />Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras diam felis, adipiscing eget arcu vel, luctus tincidunt magna. Vivamus lobortis convallis lorem nec bibendum. Sed pulvinar, nulla in interdum malesuada, dui justo blandit mi, sed euismod lectus velit eget enim. Donec accumsan velit et erat facilisis eleifend. Proin luctus ac ipsum ac pulvinar. Curabitur in commodo leo, ac hendrerit ante. Proin tincidunt, magna ut dignissim molestie, lectus enim eleifend tellus, sit amet laoreet enim dolor a mi.<br /><br />Donec velit orci, laoreet porta volutpat sed, placerat nec erat. Integer facilisis adipiscing auctor. Duis cursus tempus augue, at pellentesque est varius in. Etiam ac sollicitudin lectus, id vestibulum nunc. Sed suscipit nulla ac tempor volutpat. Etiam porta bibendum lacus nec mattis. Aenean posuere quis urna a accumsan. Sed iaculis congue risus eget volutpat.</div>', '', 1, NULL, 1, '', 0, NULL, 0, 'homepage', 1, '', '', '', 1),
	(2, 'Инструкция', 'instrukciya', '<p>Инструкция</p>', '', 2, 0, 1, NULL, 1, NULL, 0, '', 1, '', '', '', 1),
	(3, 'Купить &laquo;Enterprise&raquo;', 'enterprise', '', '', 3, 0, 1, 'special', 0, NULL, 0, '', 1, '', '', '', 1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Дамп структуры для таблица okaysey.pages_lang
DROP TABLE IF EXISTS `pages_lang`;
CREATE TABLE IF NOT EXISTS `pages_lang` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `lang_id` varchar(6) NOT NULL,
  `l_title` varchar(200) NOT NULL,
  `l_begin_body` text,
  `l_end_body` text,
  `l_meta_title` varchar(300) NOT NULL,
  `l_meta_keywords` varchar(300) NOT NULL,
  `l_meta_description` varchar(300) NOT NULL,
  PRIMARY KEY (`l_id`),
  KEY `owner_id` (`owner_id`),
  KEY `lang_id` (`lang_id`),
  CONSTRAINT `pages_lang_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы okaysey.pages_lang: ~6 rows (приблизительно)
DELETE FROM `pages_lang`;
/*!40000 ALTER TABLE `pages_lang` DISABLE KEYS */;
INSERT INTO `pages_lang` (`l_id`, `owner_id`, `lang_id`, `l_title`, `l_begin_body`, `l_end_body`, `l_meta_title`, `l_meta_keywords`, `l_meta_description`) VALUES
	(1, 1, 'ru', 'Главная', '<div class="hero-container">\r\n<div class="container">\r\n<div class="col-xs-8">\r\n<h1><span class="green">OK<span class="blue">aysey</span></span></h1>\r\n<h2>Instant task messenger</h2>\r\n<div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, ea quidem ad cumque vel harum amet sit voluptas saepe necessitatibus sint pariatur non maxime eveniet aliquid eligendi vitae nobis illum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, voluptas, suscipit deleniti delectus temporibus alias earum perferendis. Omnis, iste, numquam, doloremque ut odio veritatis quam ex aperiam explicabo sapiente dicta.</p>\r\n</div>\r\n<div><a href="#"><img src="uploads/app-store-button-en.png" /></a></div>\r\n</div>\r\n<div class="col-xs-4"><img src="uploads/iphone.png" class="img-responsive" width="350" height="736" /></div>\r\n</div>\r\n</div>\r\n<div class="container step-container">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id tortor scelerisque, dictum enim hendrerit, consectetur lectus. Aenean non nisl magna. Fusce mattis iaculis ultricies. Nam sollicitudin laoreet facilisis. Suspendisse mattis felis sed suscipit rutrum. Donec ac ante quis sapien congue luctus. Sed facilisis massa nisl, id porta lorem varius quis. Aenean id ante quis sem vehicula euismod at sed massa.<br /><br />Pellentesque condimentum sem eu dui tristique semper sit amet sit amet justo. Vestibulum suscipit in magna nec faucibus. Donec tincidunt dapibus neque. Nullam cursus aliquet ullamcorper. Quisque a ipsum nec tortor lobortis elementum at gravida turpis. Fusce quam urna, condimentum quis dolor nec, ultricies rutrum eros. Praesent rutrum sapien sed elit mollis auctor. Nulla id sollicitudin nulla. Donec porta vehicula turpis, at malesuada lectus pretium eget.<br /><br />Nunc non nisl mi. Sed ut mi nec tortor varius pretium. Etiam aliquam nec justo non fermentum. Sed laoreet condimentum dui. Vivamus hendrerit massa nec commodo ultrices. Duis sed nulla porta, viverra velit nec, sagittis erat. Nulla facilisi. Quisque ultrices lobortis libero, id imperdiet urna fringilla ultricies. Donec suscipit arcu vel lorem tristique, non tincidunt leo sodales. Donec porttitor, quam et faucibus viverra, nunc erat mollis mauris, sit amet dapibus nisl nulla at ante. Etiam euismod lectus vitae laoreet bibendum. Curabitur et laoreet nulla. Praesent tristique est vitae odio viverra cursus. Cras venenatis porttitor dui eget congue.<br /><br />Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras diam felis, adipiscing eget arcu vel, luctus tincidunt magna. Vivamus lobortis convallis lorem nec bibendum. Sed pulvinar, nulla in interdum malesuada, dui justo blandit mi, sed euismod lectus velit eget enim. Donec accumsan velit et erat facilisis eleifend. Proin luctus ac ipsum ac pulvinar. Curabitur in commodo leo, ac hendrerit ante. Proin tincidunt, magna ut dignissim molestie, lectus enim eleifend tellus, sit amet laoreet enim dolor a mi.<br /><br />Donec velit orci, laoreet porta volutpat sed, placerat nec erat. Integer facilisis adipiscing auctor. Duis cursus tempus augue, at pellentesque est varius in. Etiam ac sollicitudin lectus, id vestibulum nunc. Sed suscipit nulla ac tempor volutpat. Etiam porta bibendum lacus nec mattis. Aenean posuere quis urna a accumsan. Sed iaculis congue risus eget volutpat.</div>', '', '', '', ''),
	(2, 1, 'en', 'Homepage', '<div class="hero-container">\r\n<div class="container">\r\n<div class="col-xs-8">\r\n<h1><span class="green">OK<span class="blue">aysey</span></span></h1>\r\n<h2>Instant task messenger</h2>\r\n<div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, ea quidem ad cumque vel harum amet sit voluptas saepe necessitatibus sint pariatur non maxime eveniet aliquid eligendi vitae nobis illum.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, voluptas, suscipit deleniti delectus temporibus alias earum perferendis. Omnis, iste, numquam, doloremque ut odio veritatis quam ex aperiam explicabo sapiente dicta.</p>\r\n</div>\r\n<div><a href="#"><img src="uploads/app-store-button-ru.png" /></a></div>\r\n</div>\r\n<div class="col-xs-4"><img src="uploads/iphone.png" class="img-responsive" width="350" height="736" /></div>\r\n</div>\r\n</div>\r\n<div class="container step-container">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id tortor scelerisque, dictum enim hendrerit, consectetur lectus. Aenean non nisl magna. Fusce mattis iaculis ultricies. Nam sollicitudin laoreet facilisis. Suspendisse mattis felis sed suscipit rutrum. Donec ac ante quis sapien congue luctus. Sed facilisis massa nisl, id porta lorem varius quis. Aenean id ante quis sem vehicula euismod at sed massa.<br /><br />Pellentesque condimentum sem eu dui tristique semper sit amet sit amet justo. Vestibulum suscipit in magna nec faucibus. Donec tincidunt dapibus neque. Nullam cursus aliquet ullamcorper. Quisque a ipsum nec tortor lobortis elementum at gravida turpis. Fusce quam urna, condimentum quis dolor nec, ultricies rutrum eros. Praesent rutrum sapien sed elit mollis auctor. Nulla id sollicitudin nulla. Donec porta vehicula turpis, at malesuada lectus pretium eget.<br /><br />Nunc non nisl mi. Sed ut mi nec tortor varius pretium. Etiam aliquam nec justo non fermentum. Sed laoreet condimentum dui. Vivamus hendrerit massa nec commodo ultrices. Duis sed nulla porta, viverra velit nec, sagittis erat. Nulla facilisi. Quisque ultrices lobortis libero, id imperdiet urna fringilla ultricies. Donec suscipit arcu vel lorem tristique, non tincidunt leo sodales. Donec porttitor, quam et faucibus viverra, nunc erat mollis mauris, sit amet dapibus nisl nulla at ante. Etiam euismod lectus vitae laoreet bibendum. Curabitur et laoreet nulla. Praesent tristique est vitae odio viverra cursus. Cras venenatis porttitor dui eget congue.<br /><br />Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras diam felis, adipiscing eget arcu vel, luctus tincidunt magna. Vivamus lobortis convallis lorem nec bibendum. Sed pulvinar, nulla in interdum malesuada, dui justo blandit mi, sed euismod lectus velit eget enim. Donec accumsan velit et erat facilisis eleifend. Proin luctus ac ipsum ac pulvinar. Curabitur in commodo leo, ac hendrerit ante. Proin tincidunt, magna ut dignissim molestie, lectus enim eleifend tellus, sit amet laoreet enim dolor a mi.<br /><br />Donec velit orci, laoreet porta volutpat sed, placerat nec erat. Integer facilisis adipiscing auctor. Duis cursus tempus augue, at pellentesque est varius in. Etiam ac sollicitudin lectus, id vestibulum nunc. Sed suscipit nulla ac tempor volutpat. Etiam porta bibendum lacus nec mattis. Aenean posuere quis urna a accumsan. Sed iaculis congue risus eget volutpat.</div>', '', '', '', ''),
	(3, 2, 'ru', 'Инструкция', '<p>Инструкция</p>', '', '', '', ''),
	(4, 2, 'en', 'Instruction', '<p>Instruction</p>', '', '', '', ''),
	(5, 3, 'ru', 'Купить Enterprise', '', '', '', '', ''),
	(6, 3, 'en', 'Buy Enterprise', '', '', '', '', '');
/*!40000 ALTER TABLE `pages_lang` ENABLE KEYS */;


-- Дамп структуры для таблица okaysey.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы okaysey.users: ~2 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
	(1, 'zzeraw', '$1$X6..UA2.$jbkt9C4OyqcJXaeaqHxvZ0', 1),
	(2, 'manager', '$1$P65.sy5.$HOm7A0OzhXCzGGca58aC21', 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
