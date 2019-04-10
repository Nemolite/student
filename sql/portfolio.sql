-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 02 2017 г., 23:02
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `portfolio`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dostijeniya`
--

CREATE TABLE IF NOT EXISTS `dostijeniya` (
  `Name_dostijeniya` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Kod_dostijeniya` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Kod_kriteriya` int(10) unsigned NOT NULL,
  `Name_rezult` enum('Участие','1 место','2 место','3 место') COLLATE utf8_estonian_ci NOT NULL,
  `Kod_file` int(10) unsigned NOT NULL,
  `Kod_podtverjdeniya` int(10) unsigned NOT NULL,
  `Name_yrovnya` enum('Международный','Российский','Областной','Городской','ННГУ','Подача заявки') COLLATE utf8_estonian_ci NOT NULL,
  `Data_nachala` date NOT NULL,
  `Data_konec` date NOT NULL,
  `Komment` text COLLATE utf8_estonian_ci NOT NULL,
  `Kod_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Kod_dostijeniya`),
  UNIQUE KEY `Код достижения` (`Kod_dostijeniya`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `Name_file` varchar(250) NOT NULL,
  `Kod_file` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pyt_file` varchar(250) NOT NULL,
  PRIMARY KEY (`Kod_file`),
  UNIQUE KEY `Код файла` (`Kod_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `kriteriy_razdela`
--

CREATE TABLE IF NOT EXISTS `kriteriy_razdela` (
  `Name_kriteriya` varchar(250) NOT NULL,
  `Kod_kriteriya` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name_razdel` varchar(100) NOT NULL,
  PRIMARY KEY (`Kod_kriteriya`),
  UNIQUE KEY `Код критерия` (`Kod_kriteriya`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `kriteriy_razdela`
--

INSERT INTO `kriteriy_razdela` (`Name_kriteriya`, `Kod_kriteriya`, `Name_razdel`) VALUES
('Участие в олимпиаде ', 1, '1'),
('Владение иностранными языками', 2, '1'),
('Участие в конкурсах молодежных проектов', 3, '1'),
('Участие в молодежных образовательных программах и форумах ', 4, '1'),
('Участие в различных программах стажировок', 5, '1'),
('Наличие дополнительного образования', 6, '1'),
('Участие в научно-практических мероприятиях', 7, '2'),
('Выступление с докладом на конференции', 8, '2'),
('Наличие публикаций', 9, '2'),
('Объем публикаций', 10, '2'),
('Участие в грантах на выполнение научно-исследовательской работы', 11, '2'),
('Наличие грантов на выполнение научно-исследовательской работы', 12, '2'),
('Наличие открытий или изобретений, программных разработок', 13, '2'),
('Участие в культурно-массовых мероприятиях', 14, '3'),
('Участие в играх в составе команды КВН', 15, '3'),
('Участие в спортивных мероприятиях', 16, '4'),
('Волонтерская деятельность', 17, '5'),
('участие в деятельности молодежных общественных организаций', 18, '5'),
('Иные общественные мероприятия', 19, '5'),
('Участие в работе органов молодежногосамоуправления ННГУ и учебного подразделения', 20, '5'),
('Староста, заместитель старосты академической группы', 21, '5');

-- --------------------------------------------------------

--
-- Структура таблицы `podtverjdenie_file`
--

CREATE TABLE IF NOT EXISTS `podtverjdenie_file` (
  `Tip_podtverjdeniya` varchar(150) NOT NULL,
  `Kod_podtverjdeniya` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Kod_podtverjdeniya`),
  UNIQUE KEY `Код подтверждения` (`Kod_podtverjdeniya`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `podtverjdenie_file`
--

INSERT INTO `podtverjdenie_file` (`Tip_podtverjdeniya`, `Kod_podtverjdeniya`) VALUES
('диплом', 1),
('заявка', 2),
('письмо', 3),
('программа ', 4),
('свидетельство', 5),
('сертификат', 6),
('справка', 7),
('статья', 8),
('удостоверение', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `razdel`
--

CREATE TABLE IF NOT EXISTS `razdel` (
  `Name_razdel` varchar(150) NOT NULL,
  `Kod_razdel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Kod_razdel`),
  UNIQUE KEY `Код раздела` (`Kod_razdel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `razdel`
--

INSERT INTO `razdel` (`Name_razdel`, `Kod_razdel`) VALUES
('Учебная деятельность', 1),
('Научная деятельность', 2),
('Культурно-массовая деятельность', 3),
('Спортивная деятельность', 4),
('Общественная деятельность', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Kod_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Tip_user` enum('Администратор','Пользователь','') NOT NULL,
  `Login` varchar(32) NOT NULL,
  `Gmail` varchar(50) NOT NULL,
  `Telefon` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Familiya` varchar(50) NOT NULL,
  `Otchestvo` varchar(50) NOT NULL,
  `Ychebnoe_podrazdel` varchar(150) NOT NULL,
  `Gruppa` varchar(50) NOT NULL,
  `Kurs` int(32) unsigned NOT NULL,
  `Napravl_podgotovki` varchar(150) NOT NULL,
  `Kvalifikaciya` enum('Бакалавриат','Специалитет','Магистратура','') NOT NULL,
  `Status_obucheniya` varchar(50) NOT NULL,
  `Forma_obucheniya` enum('Очная','Очно-заочная','Заочная','') NOT NULL,
  `Data_rojdeniya` date NOT NULL,
  `Pol` enum('Мужской','Женский','','') NOT NULL,
  PRIMARY KEY (`Kod_user`),
  UNIQUE KEY `Код пользователя` (`Kod_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
