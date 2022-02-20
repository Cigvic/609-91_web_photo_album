-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 20 2022 г., 22:45
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webphotoalbum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `folder`
--

CREATE TABLE `folder` (
  `folderId` int UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `userId` int UNSIGNED NOT NULL,
  `createdDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='В этой таблице хранятся папки пользователей';

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `photoId` int UNSIGNED NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `createdDate` date NOT NULL,
  `folderId` int UNSIGNED NOT NULL,
  `tags` varchar(1024) DEFAULT NULL COMMENT 'Теги для поиска',
  `path` varchar(512) NOT NULL COMMENT 'Путь/ссылка'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='В этой таблице хранятся фото пользователей, которые привязаны к определённым папкам';

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `userId` int UNSIGNED NOT NULL COMMENT 'ID пользователя',
  `firstname` varchar(255) NOT NULL COMMENT 'Имя',
  `lastname` varchar(255) NOT NULL COMMENT 'Фамилия',
  `login` varchar(255) NOT NULL,
  `md5password` varchar(255) NOT NULL,
  `isAdmin` int UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Является админом'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Здесь хранятся пользователи';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`folderId`),
  ADD KEY `id_user` (`userId`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photoId`),
  ADD KEY `id_folder` (`folderId`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `folder`
--
ALTER TABLE `folder`
  MODIFY `folderId` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `photoId` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `userId` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID пользователя';

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `folder`
--
ALTER TABLE `folder`
  ADD CONSTRAINT `folder_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`folderId`) REFERENCES `folder` (`folderId`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
