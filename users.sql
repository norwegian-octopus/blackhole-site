-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 30 2022 г., 03:26
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blackhole`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `SURNAME` varchar(50) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ADMIN_STATUS` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`USER_ID`, `NAME`, `SURNAME`, `BIRTHDATE`, `LOGIN`, `EMAIL`, `PASSWORD`, `ADMIN_STATUS`) VALUES
(1, 'Harry', 'Potter', '1980-07-31', 'the_boy_who_survived', 'wizard@hogwarts.uk', 'ginnyweasley', 0),
(4, 'Tony', 'Stark', '1970-05-29', 'ironman', 'ironman@stark.us', 'ironman', 0),
(6, 'Tom', 'Riddle', '0000-00-00', 'voldemort', 'you-know-who@hogwarts.uk', '$2y$10$XaFAeA4hUEp0pMyAAlkmOOm5UFnOVVpj1H9ycgEh8PiQBSQN5xftC', 0),
(9, 'test', 'test', '0000-00-00', 'test', 'test@test.ru', '$2y$10$7of397.LKw3GpQsyJ7cBheAPYJ6O7lrGLlgFqN6mOqabAxE.j1q2G', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
