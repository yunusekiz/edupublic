-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 18 May 2013, 23:57:24
-- Sunucu sürümü: 5.5.25a
-- PHP Sürümü: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `edupublic`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'admin@edupublic.com', '12345');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `fax` text,
  `email` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `gplus` text,
  `linkedin` text,
  `pinterest` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `address`, `phone`, `fax`, `email`, `facebook`, `twitter`, `gplus`, `linkedin`, `pinterest`) VALUES
(1, 'ornek adres', 'ornek telefon', 'ornek faks', 'ornek email', 'ornek face', 'ornek twit', 'ornek gplus', 'ornek linkedin', 'ornek pinterest');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` text NOT NULL,
  `css_filter` text,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `css_filter`) VALUES
(5, 'amerika birleşik devletleri', 'amerika-birlesik-devletleri'),
(6, 'arjantin', 'arjantin'),
(7, 'fransa', 'fransa'),
(8, 'birleşik krallık', 'birlesik-krallik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_student_name` text NOT NULL,
  `fb_student_surname` text NOT NULL,
  `fb_title` text NOT NULL,
  `fb_detail` text NOT NULL,
  `fb_country` text NOT NULL,
  `fb_lang_school` text NOT NULL,
  PRIMARY KEY (`fb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `feedback_photo`
--

CREATE TABLE IF NOT EXISTS `feedback_photo` (
  `fb_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` int(11) NOT NULL,
  `fb_big_photo` text NOT NULL,
  `fb_thumb_photo` text NOT NULL,
  PRIMARY KEY (`fb_photo_id`),
  KEY `fb_id` (`fb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `language_school`
--

CREATE TABLE IF NOT EXISTS `language_school` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `school_name` text NOT NULL,
  `school_summary` text NOT NULL,
  `school_detail` text NOT NULL,
  `css_filter` text,
  PRIMARY KEY (`school_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `language_school_photo`
--

CREATE TABLE IF NOT EXISTS `language_school_photo` (
  `school_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `school_big_photo` text NOT NULL,
  `school_thumb_photo` text NOT NULL,
  PRIMARY KEY (`school_photo_id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `t_mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_mem_name` text NOT NULL,
  `t_mem_surname` text NOT NULL,
  `t_mem_position_title` text NOT NULL,
  `t_mem_position_detail` text NOT NULL,
  `t_mem_facebook` text NOT NULL,
  `t_mem_twitter` text NOT NULL,
  `t_mem_linkedin` text NOT NULL,
  PRIMARY KEY (`t_mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `team_photo`
--

CREATE TABLE IF NOT EXISTS `team_photo` (
  `t_mem_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_mem_id` int(11) NOT NULL,
  `t_mem_big_photo` text NOT NULL,
  `t_mem_thumb_photo` text NOT NULL,
  PRIMARY KEY (`t_mem_photo_id`),
  KEY `t_mem_id` (`t_mem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `view_table_of_team`
--
CREATE TABLE IF NOT EXISTS `view_table_of_team` (
`t_mem_id` int(11)
,`t_mem_name` text
,`t_mem_surname` text
,`t_mem_position_title` text
,`t_mem_position_detail` text
,`t_mem_facebook` text
,`t_mem_twitter` text
,`t_mem_linkedin` text
,`t_mem_big_photo` text
,`t_mem_thumb_photo` text
);
-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `visa`
--

CREATE TABLE IF NOT EXISTS `visa` (
  `visa_id` int(11) NOT NULL AUTO_INCREMENT,
  `visa_title` text NOT NULL,
  `visa_detail` text NOT NULL,
  `visa_css_filter` text,
  PRIMARY KEY (`visa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `visa_photo`
--

CREATE TABLE IF NOT EXISTS `visa_photo` (
  `visa_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `visa_id` int(11) NOT NULL,
  `visa_big_photo` text NOT NULL,
  `visa_thumb_photo` text NOT NULL,
  PRIMARY KEY (`visa_photo_id`),
  KEY `visa_id` (`visa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `view_table_of_team`
--
DROP TABLE IF EXISTS `view_table_of_team`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_table_of_team` AS select `team`.`t_mem_id` AS `t_mem_id`,`team`.`t_mem_name` AS `t_mem_name`,`team`.`t_mem_surname` AS `t_mem_surname`,`team`.`t_mem_position_title` AS `t_mem_position_title`,`team`.`t_mem_position_detail` AS `t_mem_position_detail`,`team`.`t_mem_facebook` AS `t_mem_facebook`,`team`.`t_mem_twitter` AS `t_mem_twitter`,`team`.`t_mem_linkedin` AS `t_mem_linkedin`,`team_photo`.`t_mem_big_photo` AS `t_mem_big_photo`,`team_photo`.`t_mem_thumb_photo` AS `t_mem_thumb_photo` from (`team` join `team_photo`) where (`team`.`t_mem_id` = `team_photo`.`t_mem_id`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `feedback_photo`
--
ALTER TABLE `feedback_photo`
  ADD CONSTRAINT `feedback_photo_ibfk_1` FOREIGN KEY (`fb_id`) REFERENCES `feedback` (`fb_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `language_school`
--
ALTER TABLE `language_school`
  ADD CONSTRAINT `language_school_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `language_school_photo`
--
ALTER TABLE `language_school_photo`
  ADD CONSTRAINT `language_school_photo_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `language_school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `team_photo`
--
ALTER TABLE `team_photo`
  ADD CONSTRAINT `team_photo_ibfk_1` FOREIGN KEY (`t_mem_id`) REFERENCES `team` (`t_mem_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `visa_photo`
--
ALTER TABLE `visa_photo`
  ADD CONSTRAINT `visa_photo_ibfk_1` FOREIGN KEY (`visa_id`) REFERENCES `visa` (`visa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
