-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 04 2022 г., 11:51
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `messenger`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `friends` tinyint(1) NOT NULL DEFAULT 0,
  `user_img` varchar(1000) NOT NULL DEFAULT 'uploads/default.png',
  `time_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `ban` tinyint(1) NOT NULL DEFAULT 0,
  `role` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `active`, `friends`, `user_img`, `time_create`, `ban`, `role`) VALUES
(1, 'root', '3817c3328d0f7985d21bca255749e7e6', 'temok031@gmail.com', 0, 0, 'uploads/duck_170690246.jpg', '2022-03-01 17:10:16', 0, 3),
(2, 'admin', '3817c3328d0f7985d21bca255749e7e6', 'temok031@gmail.com', 0, 0, 'uploads/default.png', '2022-03-01 17:10:30', 0, 2),
(3, 'user14', '202cb962ac59075b964b07152d234b70', 'qgxx@mail.ru', 0, 0, 'uploads/anime-sleep-31.gif', '2022-03-01 17:10:39', 0, 0),
(4, 'user15', '202cb962ac59075b964b07152d234b70', 'temok031@gmail.com', 0, 0, 'uploads/default.png', '2022-03-01 17:10:46', 0, 0),
(6, 'user1', '202cb962ac59075b964b07152d234b70', 'user1', 0, 0, 'uploads/default.png', '2022-03-02 10:35:10', 0, 0),
(7, 'duck', '36846677e3a8f4c0b16d8bdf8ef18608', 'duck@mail.ru', 0, 0, 'uploads/duck_170690246.jpg', '2022-03-02 10:43:32', 0, 0),
(8, 'karlvalentain', '8c5d6aacb90c3e11c9b12087f3c20b3b', 'karlvalentain@gmail.com', 0, 0, 'uploads/pic.jpg', '2022-03-02 10:54:33', 0, 0),
(9, 'user9', '4297f44b13955235245b2497399d7a93', 'user9@gmail.com', 0, 0, 'uploads/default.png', '2022-03-03 23:58:05', 0, 0),
(10, 'userx', '4297f44b13955235245b2497399d7a93', 'userx@gmail.com', 0, 0, 'uploads/CDhRc496xMI.jpg', '2022-03-03 23:58:32', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `worldchat`
--

CREATE TABLE `worldchat` (
  `id` int(11) UNSIGNED NOT NULL,
  `to_id` int(11) NOT NULL,
  `sms` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_id` (`to_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `worldchat`
--
ALTER TABLE `worldchat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `worldchat`
--
ALTER TABLE `worldchat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
