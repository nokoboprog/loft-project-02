-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 09 2020 г., 00:27
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `name`, `user_id`) VALUES
(1, '/images/0e71d081168db6c64c4e68b884d136c9.png', 1),
(2, '/images/39cb02960b002b724fffbde7d255f980.png', 2),
(3, '/images/b408dd613a1ac3855cfd4dfe53e816f7.png', 3),
(4, '/images/6bdb1a8f50d852c5b71020fce7646d07.png', 4),
(5, '/images/cdeb222531694687ac8dbdb8dacd8eba.png', 5),
(6, '/images/0c45071d9916d3180a5f63fcf084ef72.png', 6),
(7, '/images/2b9e21df56a94e8c026d53ab53081dcb.png', 7),
(8, '/images/ac7e3cb21af88a7670e19f35c31f6107.png', 8),
(9, '/images/e14e7f9cf15c622746c9991c3fa53b23.png', 9),
(10, '/images/755538d6ce25348455273a7ceb97e098.png', 10),
(11, '/images/f8c64ca17362725b73088530e4dfe272.png', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `age`, `description`, `password`) VALUES
(1, 'Люся Максимовна Королёва', 'antonova.lidiy@bk.ru', 30, 'Отдохнувши, он написал на лоскутке бумаги, что задаток двадцать пять рублей? Ни, ни, ни! И не то.', 'Eq_B14+z\"FVcazMhsPGS'),
(2, 'Денис Дмитриевич Николаев', 'nfrolov@uvarov.ru', 10, 'Насчет главного предмета Чичиков выразился очень осторожно: никак не будет: или нарежется в буфете.', 'AH;NYu8ShFm\'&sB'),
(3, 'Пахомова Эльвира Львовна', 'eanisimova@cernov.ru', 25, 'Что ж другое? Разве пеньку? Да вить и пеньки у меня знает дорогу, только ты — меня нет ни одной.', 'sa(w1MGj/W2M_'),
(4, 'Беляев Иммануил Романович', 'jsiryeva@yandex.ru', 20, 'Нет, — сказал он наконец, когда Чичиков вылезал из — брички. — — все это подавалось и разогретое.', '%TMEENu/+JJg'),
(5, 'Маслова Нонна Александровна', 'gordei.korolev@kulikov.net', 16, 'Цвет лица имел каленый, горячий, какой бывает только на мельницы да на корабли. Словом, все, на.', '6>,)?1xgOQo2'),
(6, 'Носкова Флорентина Алексеевна', 'ignatev.klavdiy@gmail.com', 20, 'Плюшкина: восемьсот душ имеет, а живет и — какой искусник! я даже тебя предваряю, что я вовсе не.', '1u5QwcGJJ\'=s'),
(7, 'Август Алексеевич Лаврентьевa', 'smatveeva@yandex.ru', 19, 'Фемистоклюс сказал: «Париж». — А что же, батюшка, вы так — вот только что за силища была! Служи он.', 'T5Vkzy.~.'),
(8, 'Пётр Иванович Киселёв', 'eva13@hotmail.com', 29, 'Вы, матушка, — сказал — Ноздрев, схвативши за руку Чичикова, стал тащить его в боковую комнату.', 'R;i09KL1xfv!v'),
(9, 'Валериан Сергеевич Афанасьев', 'zykova.garri@rambler.ru', 23, 'Насыщенные богатым летом, и без всякого следа, не оставивши потомков, не доставив будущим детям ни.', 'TW;EdL_L~::e<c0\\h2t'),
(10, 'Беляев Павел Александрович', 'boleslav.melnikov@rozkov.org', 19, 'Петрушка ходил в несколько широком коричневом сюртуке с барского плеча, малый немного суровый на.', 'YOV@q!YY5'),
(11, 'Test', 'test@mail.ru', 40, 'Hello World!', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
