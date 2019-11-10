-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 04 2018 г., 23:48
-- Версия сервера: 5.5.53-log
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `izdanus`
--

-- --------------------------------------------------------

--
-- Структура таблицы `magazin`
--

CREATE TABLE `magazin` (
  `id` int(255) NOT NULL COMMENT 'индекс',
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `magazin`
--

INSERT INTO `magazin` (`id`, `name`) VALUES
(1, 'Мурзилка'),
(2, 'Крокодил'),
(3, 'Максим');

-- --------------------------------------------------------

--
-- Структура таблицы `relationship`
--

CREATE TABLE `relationship` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `magazin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `relationship`
--

INSERT INTO `relationship` (`id`, `user_id`, `magazin_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL COMMENT 'индекс',
  `name` char(255) DEFAULT NULL COMMENT 'имя',
  `date` date NOT NULL COMMENT 'дата'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `date`) VALUES
(1, 'name1', '2018-06-08'),
(2, 'name2', '1980-01-01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `magazin`
--
ALTER TABLE `magazin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magazin_id` (`magazin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `magazin`
--
ALTER TABLE `magazin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'индекс', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `relationship`
--
ALTER TABLE `relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'индекс', AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `magazin`
--
ALTER TABLE `magazin`
  ADD CONSTRAINT `magazin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `magazin` (`id`);

--
-- Ограничения внешнего ключа таблицы `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `relationship_ibfk_1` FOREIGN KEY (`magazin_id`) REFERENCES `magazin` (`id`),
  ADD CONSTRAINT `relationship_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
