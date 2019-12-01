-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2019 г., 17:53
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `idx` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `session` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`idx`, `idProduct`, `session`) VALUES
(134, 1, 'rou797pmgtpncf8mhcc7dgg3u9if5715'),
(135, 2, 'rou797pmgtpncf8mhcc7dgg3u9if5715'),
(136, 3, '4h68t03hohntte5qnale9h2a640dcjna'),
(137, 14, '4h68t03hohntte5qnale9h2a640dcjna'),
(138, 1, 'v9ha82iqh2skb6q7ph1corg1siv7b7os'),
(139, 3, 'v9ha82iqh2skb6q7ph1corg1siv7b7os'),
(140, 14, 'v9ha82iqh2skb6q7ph1corg1siv7b7os');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `idx` int(11) NOT NULL,
  `session` text NOT NULL,
  `status` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`idx`, `session`, `status`, `name`, `phone`, `address`) VALUES
(48, 'rou797pmgtpncf8mhcc7dgg3u9if5715', 1, 'Алексей', '72165451561', 'Москва'),
(49, '4h68t03hohntte5qnale9h2a640dcjna', 2, 'Татьяна', '425745278528', 'Питер'),
(50, 'v9ha82iqh2skb6q7ph1corg1siv7b7os', 3, 'Кирилл', '7995335222356', 'Екатеринбург');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `idx` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`idx`, `name`, `description`, `price`, `image`) VALUES
(1, 'Ручка', 'Чёрного цвета', '20.50', 'pen.jpg'),
(2, 'Карандаш', 'Твёрдость - ТМ', '10.80', 'pencil.jpg'),
(3, 'Ластик', 'Белый', '15.00', 'eraser.jpg'),
(14, 'Скотч', 'Прозрачный, с логотипом', '10.60', 'scotch.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `idx` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idx`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$1/MVuVSdaQ0qTkvj7tq4jeo8tMqeurvjxF.GphORlHMIHJ2.53NZe'),
(2, 'user', '$2y$10$Qq6l4G2OVWH9F3S5mJf5xeMPKLEqYps/05F.F13KIKj/Pc2hzVX3O');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idx`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
