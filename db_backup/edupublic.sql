-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 14 Ağu 2013, 15:01:33
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
(1, 'admin@edupublic.net', '12345');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `feedback`
--

INSERT INTO `feedback` (`fb_id`, `fb_student_name`, `fb_student_surname`, `fb_title`, `fb_detail`, `fb_country`, `fb_lang_school`) VALUES
(1, 'öğrenci adı', ' öğrenci soyadı', ' bildlirim başlık', 'bildirim deratrsdsmosderatrsdsmosderatrsdsmosderatrsdsmoslövlderatrsdsmoslkdovderatrsdsmosderatrsdsmosderatrsdsmos', 'örnek bildirim ülke', 'örnek bildirim dilokulu');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `feedback_photo`
--

INSERT INTO `feedback_photo` (`fb_photo_id`, `fb_id`, `fb_big_photo`, `fb_thumb_photo`) VALUES
(1, 1, 'assets/images/feedback/ogrenci-adi18854.png', 'assets/images/feedback/thumb/ogrenci-adi18854_thumb.png');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `feedback_view`
--
CREATE TABLE IF NOT EXISTS `feedback_view` (
`fb_id` int(11)
,`fb_student_name` text
,`fb_student_surname` text
,`fb_title` text
,`fb_detail` text
,`fb_country` text
,`fb_lang_school` text
,`fb_photo_id` int(11)
,`fb_big_photo` text
,`fb_thumb_photo` text
);
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `language_school`
--

INSERT INTO `language_school` (`school_id`, `country_id`, `school_name`, `school_summary`, `school_detail`, `css_filter`) VALUES
(4, 6, 'arjantin dil enstitüsü', 'arjantin dil enstitürü açıklama özet', 'arjantin dil okulu açıklama detayı', 'arjantin-dil-enstitusu'),
(5, 5, 'amerikan language', 'amerikan dil okulu bu ', 'amerikan dil okulu detayı', 'amerikan-language');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `language_school_photo`
--

INSERT INTO `language_school_photo` (`school_photo_id`, `school_id`, `school_big_photo`, `school_thumb_photo`) VALUES
(4, 4, 'assets/images/schools/arjantin-dil-enstitusu14936.jpg', 'assets/images/schools/thumb/arjantin-dil-enstitusu14936_thumb.jpg'),
(5, 5, 'assets/images/schools/amerikan-language15254.jpg', 'assets/images/schools/thumb/amerikan-language15254_thumb.jpg');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `language_school_view`
--
CREATE TABLE IF NOT EXISTS `language_school_view` (
`country_id` int(11)
,`country_name` text
,`country_css_filter` text
,`school_id` int(11)
,`school_name` text
,`school_summary` text
,`school_detail` text
,`school_css` text
,`school_photo_id` int(11)
,`school_big_photo` text
,`school_thumb_photo` text
);
-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `promo_slider`
--

CREATE TABLE IF NOT EXISTS `promo_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `big_text` text NOT NULL,
  `little_text_1` text NOT NULL,
  `little_text_2` text NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `promo_slider`
--

INSERT INTO `promo_slider` (`slider_id`, `big_text`, `little_text_1`, `little_text_2`) VALUES
(4, 'yeni dönem başladı', 'bizi sizinle heran iletişime geçmeye hazırız', 'promo slider küçük  markadaş  tayt'),
(6, 'saksı değilim ben', 'ben erol büyükburcum erol büyükburç', 'en çok bana soracaksın en çok bana ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `school_slider`
--

CREATE TABLE IF NOT EXISTS `school_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_caption` text NOT NULL,
  `slider_detail` text NOT NULL,
  `slider_css` text NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `school_slider_photo`
--

CREATE TABLE IF NOT EXISTS `school_slider_photo` (
  `slider_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) NOT NULL,
  `slider_big_photo` text NOT NULL,
  `slider_thumb_photo` text NOT NULL,
  PRIMARY KEY (`slider_photo_id`),
  KEY `slider_id` (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `school_slider_view`
--
CREATE TABLE IF NOT EXISTS `school_slider_view` (
`slider_id` int(11)
,`slider_caption` text
,`slider_detail` text
,`slider_css` text
,`slider_photo_id` int(11)
,`slider_big_photo` text
,`slider_thumb_photo` text
);
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `team`
--

INSERT INTO `team` (`t_mem_id`, `t_mem_name`, `t_mem_surname`, `t_mem_position_title`, `t_mem_position_detail`, `t_mem_facebook`, `t_mem_twitter`, `t_mem_linkedin`) VALUES
(1, 'adriana', 'luma', 'uzman', 'yazılım mimarisi uzmanı', 'front end twitter', 'front end twitter', 'frontend linkedin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `team_photo`
--

INSERT INTO `team_photo` (`t_mem_photo_id`, `t_mem_id`, `t_mem_big_photo`, `t_mem_thumb_photo`) VALUES
(1, 1, 'assets/images/team/yunus212276216.jpg', 'assets/images/team/thumb/yunus212276216_thumb.jpg');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `team_view`
--
CREATE TABLE IF NOT EXISTS `team_view` (
`t_mem_id` int(11)
,`t_mem_name` text
,`t_mem_surname` text
,`t_mem_position_title` text
,`t_mem_position_detail` text
,`t_mem_facebook` text
,`t_mem_twitter` text
,`t_mem_linkedin` text
,`t_mem_photo_id` int(11)
,`t_mem_big_photo` text
,`t_mem_thumb_photo` text
);
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `visa`
--

INSERT INTO `visa` (`visa_id`, `visa_title`, `visa_detail`, `visa_css_filter`) VALUES
(1, 'amerika birleşik devletleri', 'amerika birleşik devletlerine gitmek inanın çok zordur çok meşakkatlidir, bu konuda bize güvenebilirsiniz', NULL),
(2, 'gf', 'gfgf', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `visa_photo`
--

INSERT INTO `visa_photo` (`visa_photo_id`, `visa_id`, `visa_big_photo`, `visa_thumb_photo`) VALUES
(2, 1, 'assets/images/visa/amerika-birlesik-devletleri2178622603.png', 'assets/images/visa/thumb/amerika-birlesik-devletleri2178622603_thumb.png'),
(3, 2, 'assets/images/visa/gf26245.jpg', 'assets/images/visa/thumb/gf26245_thumb.jpg');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `visa_view`
--
CREATE TABLE IF NOT EXISTS `visa_view` (
`visa_id` int(11)
,`visa_title` text
,`visa_detail` text
,`visa_css_filter` text
,`visa_photo_id` int(11)
,`visa_big_photo` text
,`visa_thumb_photo` text
);
-- --------------------------------------------------------

--
-- Görünüm yapısı `feedback_view`
--
DROP TABLE IF EXISTS `feedback_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `feedback_view` AS select `feedback`.`fb_id` AS `fb_id`,`feedback`.`fb_student_name` AS `fb_student_name`,`feedback`.`fb_student_surname` AS `fb_student_surname`,`feedback`.`fb_title` AS `fb_title`,`feedback`.`fb_detail` AS `fb_detail`,`feedback`.`fb_country` AS `fb_country`,`feedback`.`fb_lang_school` AS `fb_lang_school`,`feedback_photo`.`fb_photo_id` AS `fb_photo_id`,`feedback_photo`.`fb_big_photo` AS `fb_big_photo`,`feedback_photo`.`fb_thumb_photo` AS `fb_thumb_photo` from (`feedback` join `feedback_photo`) where (`feedback`.`fb_id` = `feedback_photo`.`fb_id`);

-- --------------------------------------------------------

--
-- Görünüm yapısı `language_school_view`
--
DROP TABLE IF EXISTS `language_school_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `language_school_view` AS select `country`.`country_id` AS `country_id`,`country`.`country_name` AS `country_name`,`country`.`css_filter` AS `country_css_filter`,`language_school`.`school_id` AS `school_id`,`language_school`.`school_name` AS `school_name`,`language_school`.`school_summary` AS `school_summary`,`language_school`.`school_detail` AS `school_detail`,`language_school`.`css_filter` AS `school_css`,`language_school_photo`.`school_photo_id` AS `school_photo_id`,`language_school_photo`.`school_big_photo` AS `school_big_photo`,`language_school_photo`.`school_thumb_photo` AS `school_thumb_photo` from ((`country` join `language_school`) join `language_school_photo`) where ((`country`.`country_id` = `language_school`.`country_id`) and (`language_school`.`school_id` = `language_school_photo`.`school_id`));

-- --------------------------------------------------------

--
-- Görünüm yapısı `school_slider_view`
--
DROP TABLE IF EXISTS `school_slider_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `school_slider_view` AS select `school_slider`.`slider_id` AS `slider_id`,`school_slider`.`slider_caption` AS `slider_caption`,`school_slider`.`slider_detail` AS `slider_detail`,`school_slider`.`slider_css` AS `slider_css`,`school_slider_photo`.`slider_photo_id` AS `slider_photo_id`,`school_slider_photo`.`slider_big_photo` AS `slider_big_photo`,`school_slider_photo`.`slider_thumb_photo` AS `slider_thumb_photo` from (`school_slider` join `school_slider_photo`) where (`school_slider`.`slider_id` = `school_slider_photo`.`slider_id`);

-- --------------------------------------------------------

--
-- Görünüm yapısı `team_view`
--
DROP TABLE IF EXISTS `team_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `team_view` AS select `team`.`t_mem_id` AS `t_mem_id`,`team`.`t_mem_name` AS `t_mem_name`,`team`.`t_mem_surname` AS `t_mem_surname`,`team`.`t_mem_position_title` AS `t_mem_position_title`,`team`.`t_mem_position_detail` AS `t_mem_position_detail`,`team`.`t_mem_facebook` AS `t_mem_facebook`,`team`.`t_mem_twitter` AS `t_mem_twitter`,`team`.`t_mem_linkedin` AS `t_mem_linkedin`,`team_photo`.`t_mem_photo_id` AS `t_mem_photo_id`,`team_photo`.`t_mem_big_photo` AS `t_mem_big_photo`,`team_photo`.`t_mem_thumb_photo` AS `t_mem_thumb_photo` from (`team` join `team_photo`) where (`team`.`t_mem_id` = `team_photo`.`t_mem_id`);

-- --------------------------------------------------------

--
-- Görünüm yapısı `view_table_of_team`
--
DROP TABLE IF EXISTS `view_table_of_team`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_table_of_team` AS select `team`.`t_mem_id` AS `t_mem_id`,`team`.`t_mem_name` AS `t_mem_name`,`team`.`t_mem_surname` AS `t_mem_surname`,`team`.`t_mem_position_title` AS `t_mem_position_title`,`team`.`t_mem_position_detail` AS `t_mem_position_detail`,`team`.`t_mem_facebook` AS `t_mem_facebook`,`team`.`t_mem_twitter` AS `t_mem_twitter`,`team`.`t_mem_linkedin` AS `t_mem_linkedin`,`team_photo`.`t_mem_big_photo` AS `t_mem_big_photo`,`team_photo`.`t_mem_thumb_photo` AS `t_mem_thumb_photo` from (`team` join `team_photo`) where (`team`.`t_mem_id` = `team_photo`.`t_mem_id`);

-- --------------------------------------------------------

--
-- Görünüm yapısı `visa_view`
--
DROP TABLE IF EXISTS `visa_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visa_view` AS select `visa`.`visa_id` AS `visa_id`,`visa`.`visa_title` AS `visa_title`,`visa`.`visa_detail` AS `visa_detail`,`visa`.`visa_css_filter` AS `visa_css_filter`,`visa_photo`.`visa_photo_id` AS `visa_photo_id`,`visa_photo`.`visa_big_photo` AS `visa_big_photo`,`visa_photo`.`visa_thumb_photo` AS `visa_thumb_photo` from (`visa` join `visa_photo`) where (`visa`.`visa_id` = `visa_photo`.`visa_id`);

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
-- Tablo kısıtlamaları `school_slider_photo`
--
ALTER TABLE `school_slider_photo`
  ADD CONSTRAINT `school_slider_photo_ibfk_1` FOREIGN KEY (`slider_id`) REFERENCES `school_slider` (`slider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
