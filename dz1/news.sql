-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 18 2015 г., 17:25
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id_article` int(5) NOT NULL,
  `title` varchar(32) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=cp1250;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `content`) VALUES
(6, 'Жаба', 'Новый текст статьи'),
(7, 'Европа', 'Новый текст статьи'),
(8, 'Париж', 'Новый текст статьи'),
(9, 'Пляж', 'Новый текст статьи'),
(11, 'Корова', 'Новый текст статьи'),
(12, 'Нападение на город', 'Новый текст статьи'),
(13, 'Авария', 'Новый текст статьи'),
(14, 'Гонщик', 'Новый текст статьи'),
(16, 'Правительство', 'Правительство Украины ввело режим ЧС в Донецкой и Луганской областях. Об этом на заседании кабмина заявил премьер-министр Арсений Яценюк, передает ЛІГАБізнесІнформ.\r\n\r\nПо его словам, на всей остальной территории страны вводится режим повышенной готовности. «Прошу не путать с чрезвычайным положением или военным положением. Такие решения вводятся парламентом», — отметил Яценюк.\r\n\r\nПремьер уточнил, что решение о режиме чрезвычайной ситуации принято в соответствии с Кодексом гражданской защиты, передает «Корреспондент.net». Правительство также создало госкомиссию по ЧС, которую возглавил премьер, и региональные комиссии.\r\n\r\nЯценюк пояснил, что целью таких мер является «полная координация всех органов власти для обеспечения безопасности граждан и защиты населения».'),
(21, 'Путин', 'Президент России Владимир Путин допустил возможность продления срока пребывания на территории России граждан Украины. Как сообщает РИА Новости, в первую очередь это касается лиц призывного возраста.\r\n\r\n«Кстати говоря, многие люди уже уклоняются от мобилизации, стараются к нам переехать, пересидеть здесь какое-то время. И правильно делают, потому что их просто толкают туда, как пушечное мясо, под пули», — заявил Путин.'),
(41, 'Гнуться, шведы!', 'В среду, 28 января, в Стокгольме стартует чемпионат Европы по фигурному катанию, который пройдет без олимпийских чемпионок Сочи Юлии Липницкой и Аделины Сотниковой. Но даже в этой ситуации все внимание будет приковано к соревнованиям девушек, где Россию представят Елена Радионова, Елизавета Туктамышева и Анна Погорилая, каждая из которых имеет все шансы на победу. В трех других дисциплинах отечественные спортсмены также претендуют на медали');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id_article`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
MODIFY `id_article` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
