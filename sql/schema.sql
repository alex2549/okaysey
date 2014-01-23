



-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'pages'
-- Страницы сайта
-- ---

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `club_id` INT(11) NOT NULL,
  `slug` VARCHAR(200) NOT NULL,
  `title` VARCHAR(300) NOT NULL,
  `body` MEDIUMTEXT NULL DEFAULT NULL,
  `order` INT(11) NOT NULL DEFAULT 0,
  `parent_id` INT(11) NOT NULL DEFAULT 0,
  `show_in_menu` TINYINT(1) NOT NULL DEFAULT 0,
  `meta_index` TINYINT(1) NOT NULL DEFAULT 1,
  `meta_title` VARCHAR(300) NULL DEFAULT NULL,
  `meta_keywords` VARCHAR(500) NULL DEFAULT NULL,
  `meta_description` VARCHAR(500) NULL DEFAULT NULL,
  `fixed` TINYINT(1) NOT NULL DEFAULT 0,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  `created_user` INT(11) NOT NULL,
  `modified_user` INT(11) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) COMMENT 'Страницы сайта';

-- ---
-- Table 'articles'
-- Статьи сайта
-- ---

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `type_id` INT(11) NOT NULL,
  `club_id` INT(11) NOT NULL,
  `slug` VARCHAR(200) NOT NULL,
  `title` VARCHAR(300) NOT NULL,
  `annotation` MEDIUMTEXT NOT NULL,
  `image` VARCHAR(512) NULL DEFAULT NULL,
  `image_attr_title` VARCHAR(512) NULL DEFAULT NULL,
  `image_attr_alt` VARCHAR(512) NULL DEFAULT NULL,
  `body` MEDIUMTEXT NULL DEFAULT NULL,
  `pubdate` DATE NOT NULL,
  `meta_index` TINYINT(1) NOT NULL DEFAULT 1,
  `meta_title` VARCHAR(300) NULL DEFAULT NULL,
  `meta_keywords` VARCHAR(500) NULL DEFAULT NULL,
  `meta_description` VARCHAR(500) NULL DEFAULT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  `created_user` INT(11) NOT NULL,
  `modified_user` INT(11) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) COMMENT 'Статьи сайта';

-- ---
-- Table 'types_of_articles'
-- Типы статей на сайте
-- ---

DROP TABLE IF EXISTS `types_of_articles`;

CREATE TABLE `types_of_articles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(200) NOT NULL,
  `title` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`slug`)
) COMMENT 'Типы статей на сайте';

-- ---
-- Table 'catalog'
-- Каталог товаров
-- ---

DROP TABLE IF EXISTS `catalog`;

CREATE TABLE `catalog` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `club_id` INT(11) NOT NULL,
  `slug` VARCHAR(200) NOT NULL,
  `group_id` INT(11) NOT NULL,
  `title` VARCHAR(300) NOT NULL,
  `image` VARCHAR(512) NULL DEFAULT NULL,
  `image_attr_alt` VARCHAR(512) NULL DEFAULT NULL,
  `image_attr_title` VARCHAR(512) NULL DEFAULT NULL,
  `body` MEDIUMTEXT NULL DEFAULT NULL,
  `price` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `special` TINYINT(1) NOT NULL DEFAULT 0,
  `new_price` DECIMAL(10.2) NULL DEFAULT NULL,
  `order` INT(11) NOT NULL DEFAULT 0,
  `meta_index` TINYINT(1) NOT NULL DEFAULT 1,
  `meta_title` VARCHAR(300) NULL DEFAULT NULL,
  `meta_keywords` VARCHAR(500) NULL DEFAULT NULL,
  `meta_description` VARCHAR(500) NULL DEFAULT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`slug`)
) COMMENT 'Каталог товаров';

-- ---
-- Table 'orders'
-- �?стория заказов
-- ---

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` INT(11) NOT NULL,
  `fio` VARCHAR(300) NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `email` VARCHAR(300) NOT NULL,
  `address` VARCHAR(1024) NOT NULL,
  `price` DECIMAL(10.2) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 0,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) COMMENT 'История заказов';

-- ---
-- Table 'users'
--
-- ---

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARBINARY(64) NOT NULL,
  `password` VARBINARY(256) NOT NULL,
  `role_id` INT(11) NOT NULL,
  `club_id` INT NULL DEFAULT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`username`)
);

-- ---
-- Table 'workouts'
-- Расписание клуба
-- ---

DROP TABLE IF EXISTS `workouts`;

CREATE TABLE `workouts` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `hall_id` INT(11) NOT NULL,
  `day_of_week` INT(11) NOT NULL,
  `time_start` TIME NOT NULL,
  `time_finish` TIME NOT NULL,
  `body` VARCHAR(500) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) COMMENT 'Расписание клуба';

-- ---
-- Table 'halls'
-- Залы клуба
-- ---

DROP TABLE IF EXISTS `halls`;

CREATE TABLE `halls` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `club_id` INT(11) NOT NULL,
  `title` VARCHAR(300) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `new field` TINYINT NULL DEFAULT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) COMMENT 'Залы клуба';

-- ---
-- Table 'clubs'
-- Клубы
-- ---

DROP TABLE IF EXISTS `clubs`;

CREATE TABLE `clubs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `town_id` INT(11) NOT NULL,
  `title` VARCHAR(300) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `new field` TINYINT NULL DEFAULT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) COMMENT 'Клубы';

-- ---
-- Table 'blocks'
-- Блоки на сайте
-- ---

DROP TABLE IF EXISTS `blocks`;

CREATE TABLE `blocks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(200) NOT NULL,
  `title` VARCHAR(300) NOT NULL,
  `body` MEDIUMTEXT NULL DEFAULT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`slug`)
) COMMENT 'Блоки на сайте';

-- ---
-- Table 'banners'
--
-- ---

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` TINYINT NULL AUTO_INCREMENT DEFAULT NULL,
  `title` VARCHAR(256) NOT NULL,
  `body` VARCHAR(512) NULL DEFAULT NULL,
  `link` VARCHAR(256) NULL DEFAULT NULL,
  `image` VARCHAR(512) NOT NULL,
  `image_attr_title` VARCHAR(512) NULL DEFAULT NULL,
  `image_attr_alt` VARCHAR(512) NULL DEFAULT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'block_beginners'
--
-- ---

DROP TABLE IF EXISTS `block_beginners`;

CREATE TABLE `block_beginners` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(300) NOT NULL,
  `link` VARCHAR(200) NOT NULL,
  `annotation` MEDIUMTEXT NULL DEFAULT NULL,
  `image` VARCHAR(512) NULL DEFAULT NULL,
  `image_attr_title` VARCHAR(512) NULL DEFAULT NULL,
  `image_attr_alt` VARCHAR(512) NULL DEFAULT NULL,
  `order` INT(11) NOT NULL DEFAULT 0,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'towns'
--
-- ---

DROP TABLE IF EXISTS `towns`;

CREATE TABLE `towns` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  `new field` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`title`)
);

-- ---
-- Table 'workouts_requests'
--
-- ---

DROP TABLE IF EXISTS `workouts_requests`;

CREATE TABLE `workouts_requests` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `club_id` INT(11) NOT NULL,
  `fio` VARCHAR(300) NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `email` VARCHAR(300) NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'catalog_groups'
--
-- ---

DROP TABLE IF EXISTS `catalog_groups`;

CREATE TABLE `catalog_groups` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(200) NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`slug`)
);

-- ---
-- Foreign Keys
-- ---

ALTER TABLE `pages` ADD FOREIGN KEY (club_id) REFERENCES `clubs` (`id`);
ALTER TABLE `pages` ADD FOREIGN KEY (parent_id) REFERENCES `pages` (`id`);
ALTER TABLE `articles` ADD FOREIGN KEY (type_id) REFERENCES `types_of_articles` (`id`);
ALTER TABLE `articles` ADD FOREIGN KEY (club_id) REFERENCES `clubs` (`id`);
ALTER TABLE `catalog` ADD FOREIGN KEY (club_id) REFERENCES `clubs` (`id`);
ALTER TABLE `catalog` ADD FOREIGN KEY (group_id) REFERENCES `catalog_groups` (`id`);
ALTER TABLE `orders` ADD FOREIGN KEY (catalog_id) REFERENCES `catalog` (`id`);
ALTER TABLE `workouts` ADD FOREIGN KEY (hall_id) REFERENCES `halls` (`id`);
ALTER TABLE `halls` ADD FOREIGN KEY (club_id) REFERENCES `clubs` (`id`);
ALTER TABLE `clubs` ADD FOREIGN KEY (town_id) REFERENCES `towns` (`id`);
ALTER TABLE `workouts_requests` ADD FOREIGN KEY (club_id) REFERENCES `clubs` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `pages` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `articles` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `types_of_articles` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `catalog` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `orders` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `users` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `workouts` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `halls` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `clubs` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `blocks` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `banners` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `block_beginners` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `towns` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `workouts_requests` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `catalog_groups` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `pages` (`id`,`club_id`,`slug`,`title`,`body`,`order`,`parent_id`,`show_in_menu`,`meta_index`,`meta_title`,`meta_keywords`,`meta_description`,`fixed`,`created`,`modified`,`created_user`,`modified_user`,`active`) VALUES
-- ('','','','','','','','','','','','','','','','','','');
-- INSERT INTO `articles` (`id`,`type_id`,`club_id`,`slug`,`title`,`annotation`,`image`,`image_attr_title`,`image_attr_alt`,`body`,`pubdate`,`meta_index`,`meta_title`,`meta_keywords`,`meta_description`,`created`,`modified`,`created_user`,`modified_user`,`active`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `types_of_articles` (`id`,`slug`,`title`) VALUES
-- ('','','');
-- INSERT INTO `catalog` (`id`,`club_id`,`slug`,`group_id`,`title`,`image`,`image_attr_alt`,`image_attr_title`,`body`,`price`,`special`,`new_price`,`order`,`meta_index`,`meta_title`,`meta_keywords`,`meta_description`,`created`,`modified`,`active`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `orders` (`id`,`catalog_id`,`fio`,`phone`,`email`,`address`,`price`,`status`,`created`,`modified`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `users` (`id`,`username`,`password`,`role_id`,`club_id`,`new field`,`new field`) VALUES
-- ('','','','','','','');
-- INSERT INTO `workouts` (`id`,`hall_id`,`day_of_week`,`time_start`,`time_finish`,`body`,`created`,`modified`,`new field`,`new field`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `halls` (`id`,`club_id`,`title`,`created`,`modified`,`active`,`new field`,`new field`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `clubs` (`id`,`town_id`,`title`,`created`,`modified`,`active`,`new field`,`new field`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `blocks` (`id`,`slug`,`title`,`body`,`created`,`modified`,`active`) VALUES
-- ('','','','','','','');
-- INSERT INTO `banners` (`id`,`title`,`body`,`link`,`image`,`image_attr_title`,`image_attr_alt`,`created`,`modified`) VALUES
-- ('','','','','','','','','');
-- INSERT INTO `block_beginners` (`id`,`title`,`link`,`annotation`,`image`,`image_attr_title`,`image_attr_alt`,`order`,`created`,`modified`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `towns` (`id`,`title`,`new field`,`new field`,`new field`,`new field`) VALUES
-- ('','','','','','');
-- INSERT INTO `workouts_requests` (`id`,`club_id`,`fio`,`phone`,`email`,`created`) VALUES
-- ('','','','','','');
-- INSERT INTO `catalog_groups` (`id`,`slug`,`title`) VALUES
-- ('','','');

