-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 02 2023 г., 17:35
-- Версия сервера: 5.5.53
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `разработка_программных_продуктов`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`%` PROCEDURE `Proc2` ()  NO SQL
BEGIN
declare a int;
set a=(SELECT COUNT( * ) FROM  `техническое_задание`);
if(a > 4)THEN
	SELECT 'Количество проектов', a, 'высокая загрузка';
ELSE
	SELECT 'Количество проектов', a, 'маленькая нагрузка';
END IF;
END$$

--
-- Функции
--
CREATE DEFINER=`root`@`%` FUNCTION `Func2` (`work_numb` INT) RETURNS VARCHAR(50) CHARSET utf8 NO SQL
BEGIN
declare a VARCHAR(50);
set a=(SELECT `Фамилия_работника` FROM `Работник` WHERE `работник`.`Номер_работника`=work_numb);
RETURN a;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `unique_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `encrypted_password` varchar(60) NOT NULL,
  `salt` varchar(60) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`unique_id`, `name`, `email`, `encrypted_password`, `salt`, `created_at`) VALUES
(61, 'More', 'mbakanova2016@yandex.ru', 'POGCsDqIyGMnNisR2Po6DtVWvSswNjhhNjhjMzIx', '068a68c321', '2021-12-07'),
(61, 'More2', 'mbaka@yandex.ru', 'kpdKgoTU5aR5AopxPH/27cI2bLM4NTZiZGZkMTI4', '856bdfd128', '2021-12-08'),
(61, 'more3', 'mbaka2@yandex.ru', 'fAm4S685GIkfidrD9H2QpmleG51lN2NmMThjMTNm', 'e7cf18c13f', '2021-12-11'),
(61, 'Moremore', 'more@yandex.ru', 'MbfHQJDA2p3Yrk+W1aoKejesROw3NDdhMzUzZjFh', '747a353f1a', '2021-12-13'),
(61, 'Ivan', 'ivan@yandex.ru', 'AEcvdLceK9R+x2DkyRLGLIqBLmAyYmNmMTRmNDRh', '2bcf14f44a', '2021-12-13');

-- --------------------------------------------------------

--
-- Структура таблицы `договор`
--

CREATE TABLE `договор` (
  `Номер_договора` int(11) NOT NULL,
  `Номер_технического_задания` int(11) NOT NULL,
  `Номер_статуса_готовности_проекта` int(11) NOT NULL,
  `Название_продукта` varchar(20) DEFAULT NULL,
  `Ссылка_на_программный_код` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `договор`
--

INSERT INTO `договор` (`Номер_договора`, `Номер_технического_задания`, `Номер_статуса_готовности_проекта`, `Название_продукта`, `Ссылка_на_программный_код`) VALUES
(1, 1, 1, 'Сайт', 'https://23.ru'),
(2, 2, 2, 'Интернет магазин', 'https://abc.ru'),
(3, 3, 3, 'Сайт', 'https://21.ru'),
(4, 4, 4, 'Android приложение', 'https://25.ru'),
(5, 5, 5, 'Desktop', 'https://desc.ru'),
(6, 5, 4, 'IOS приложение', 'https://ios.ru'),
(8, 5, 3, 'Desktop2', 'https://desc2.ru'),
(9, 5, 3, 'Desktop2', 'https://desc4.ru'),
(11, 5, 4, 'новое2', 'https://new.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `клиент`
--

CREATE TABLE `клиент` (
  `Номер_клиента` int(11) NOT NULL,
  `Фамилия_клиента` varchar(20) DEFAULT NULL,
  `Имя_клиента` varchar(20) DEFAULT NULL,
  `Отчество_клиента` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `клиент`
--

INSERT INTO `клиент` (`Номер_клиента`, `Фамилия_клиента`, `Имя_клиента`, `Отчество_клиента`) VALUES
(1, 'Иванов', 'Иван', 'Иванович'),
(2, 'Дмитров', 'Дмитрий', 'Дмитриевич'),
(3, 'Михалков', 'Михаил', 'Михайлович'),
(4, 'Семёнов', 'Семён', 'Семёнович'),
(5, 'Степанов', 'Степан', 'Степанович'),
(8, 'sur', 'im', 'otch');

-- --------------------------------------------------------

--
-- Структура таблицы `вид_функционала`
--

CREATE TABLE `вид_функционала` (
  `Номер_функции` int(11) NOT NULL,
  `Описание_функции` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `вид_функционала`
--

INSERT INTO `вид_функционала` (`Номер_функции`, `Описание_функции`) VALUES
(1, 'Форма обратной связи'),
(2, 'Регистрация'),
(3, 'Авторизация'),
(4, 'Адаптивный дизайн'),
(5, 'Анимация'),
(8, 'сяк');

-- --------------------------------------------------------

--
-- Структура таблицы `готовность_проекта`
--

CREATE TABLE `готовность_проекта` (
  `Номер_статуса_готовности_проекта` int(11) NOT NULL,
  `Название_статуса_готовности_проекта` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `готовность_проекта`
--

INSERT INTO `готовность_проекта` (`Номер_статуса_готовности_проекта`, `Название_статуса_готовности_проекта`) VALUES
(1, 'Готово'),
(2, 'В разработке'),
(3, 'Тестируется'),
(4, 'Размещение на серв'),
(5, 'Поддержка'),
(6, 'Почти почти'),
(8, 'Почти почти');

-- --------------------------------------------------------

--
-- Структура таблицы `набор_функционала`
--

CREATE TABLE `набор_функционала` (
  `Номер_набора_функционала` int(11) NOT NULL,
  `Номер_набора` int(11) NOT NULL,
  `Комментарий_к_функционалу` varchar(20) DEFAULT NULL,
  `Номер_функции` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `набор_функционала`
--

INSERT INTO `набор_функционала` (`Номер_набора_функционала`, `Номер_набора`, `Комментарий_к_функционалу`, `Номер_функции`) VALUES
(1, 1, 'Форма со стандартным', 1),
(2, 2, 'С тремя полями', 2),
(3, 3, 'С двумя полями', 3),
(4, 4, 'Для мобильных устрой', 4),
(5, 5, 'Анимация смены окон', 5),
(7, 1, 'Полностью', 2),
(8, 1, 'С одним полем', 3),
(9, 1, 'Для браузера', 4),
(10, 1, 'Анимация', 5),
(12, 4, 'новый', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `отдел`
--

CREATE TABLE `отдел` (
  `Номер_отдела` int(11) NOT NULL,
  `Наименование_отдела` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `отдел`
--

INSERT INTO `отдел` (`Номер_отдела`, `Наименование_отдела`) VALUES
(1, 'Отдел Android разраб'),
(2, 'Отдел Тестировщиков'),
(3, 'Отдел WEB разработчи'),
(4, 'Отдел Дизайнеров'),
(5, 'Отдел Верстальщиков'),
(6, 'Новый отдел'),
(8, 'Новый');

-- --------------------------------------------------------

--
-- Структура таблицы `отчёты`
--

CREATE TABLE `отчёты` (
  `Номер_отчёта` int(11) NOT NULL,
  `Номер_технического_задания` int(11) NOT NULL,
  `Название_отчёта` varchar(20) NOT NULL,
  `Ссылка_на_файл_отчёта` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `отчёты`
--

INSERT INTO `отчёты` (`Номер_отчёта`, `Номер_технического_задания`, `Название_отчёта`, `Ссылка_на_файл_отчёта`) VALUES
(1, 2, 'Отчёт о рентабельнос', 'https://otch2.ru'),
(2, 3, 'Отчёт о рентабельнос', 'https://otch3.ru'),
(3, 4, 'Отчёт о рентабельнос', 'https://otch4.ru'),
(4, 5, 'Отчёт о рентабельнос', 'https://otch5.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `работник`
--

CREATE TABLE `работник` (
  `Номер_специализации` int(11) NOT NULL,
  `Номер_отдела` int(11) NOT NULL,
  `Фамилия_работника` varchar(20) DEFAULT NULL,
  `Имя_работника` varchar(20) DEFAULT NULL,
  `Отчество_работника` varchar(20) DEFAULT NULL,
  `Количество_открытых_проектов` int(11) DEFAULT NULL,
  `Номер_работника` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `работник`
--

INSERT INTO `работник` (`Номер_специализации`, `Номер_отдела`, `Фамилия_работника`, `Имя_работника`, `Отчество_работника`, `Количество_открытых_проектов`, `Номер_работника`) VALUES
(1, 1, 'Алексов', 'Алексей', 'Алексеевич', 5, 1),
(2, 2, 'Владимиров', 'Владимир', 'Владимирович', 5, 2),
(3, 3, 'Евгеньев', 'Евгений', 'Евгеньевич', 7, 3),
(4, 4, 'Витальев', 'Виталий', 'Витальевич', 6, 4),
(4, 4, 'Павлов', 'Павел', 'Павлович', 2, 5),
(2, 3, 'нов', 'ново', 'новое', 2, 7);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `работники_и_тз`
-- (See below for the actual view)
--
CREATE TABLE `работники_и_тз` (
`Номер_технического_задания` int(11)
,`Комментарий` varchar(20)
,`Номер_работника` int(11)
,`Номер_набора_функционала` int(11)
,`Номер_клиента` int(11)
);

-- --------------------------------------------------------

--
-- Структура таблицы `специализация`
--

CREATE TABLE `специализация` (
  `Номер_специализации` int(11) NOT NULL,
  `Название_специализации` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `специализация`
--

INSERT INTO `специализация` (`Номер_специализации`, `Название_специализации`) VALUES
(1, 'Android разработчик'),
(2, 'Тестировщик'),
(3, 'WEB разработчик'),
(4, 'Дизайнер'),
(5, 'Верстальщик'),
(7, 'новое');

-- --------------------------------------------------------

--
-- Структура таблицы `техническое_задание`
--

CREATE TABLE `техническое_задание` (
  `Номер_технического_задания` int(11) NOT NULL,
  `Комментарий` varchar(20) DEFAULT NULL,
  `Номер_работника` int(11) NOT NULL,
  `Номер_набора_функционала` int(11) NOT NULL,
  `Номер_клиента` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `техническое_задание`
--

INSERT INTO `техническое_задание` (`Номер_технического_задания`, `Комментарий`, `Номер_работника`, `Номер_набора_функционала`, `Номер_клиента`) VALUES
(1, 'Стандартная реализац', 1, 1, 1),
(2, 'Полная проблема', 2, 2, 2),
(3, 'Тёмные тона', 3, 3, 3),
(4, 'Светлые тона', 4, 4, 4),
(5, 'Поддержка всех брауз', 5, 5, 5),
(6, 'Полноэкранный', 4, 4, 4),
(7, 'Светлый', 4, 4, 4),
(8, 'Кратко', 4, 4, 4),
(10, 'новый', 2, 3, 4);

--
-- Триггеры `техническое_задание`
--
DELIMITER $$
CREATE TRIGGER `Trigger1` AFTER INSERT ON `техническое_задание` FOR EACH ROW BEGIN
UPDATE `работник` set `работник`.`Количество_открытых_проектов` =`работник`.`Количество_открытых_проектов`+1 
WHERE 
`работник`.`Номер_работника`=
(SELECT `техническое_задание`.`Номер_работника` FROM `техническое_задание` where `техническое_задание`.`Номер_технического_задания`=
 (SELECT MAX(`техническое_задание`.`Номер_технического_задания`) FROM `техническое_задание`));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура для представления `работники_и_тз`
--
DROP TABLE IF EXISTS `работники_и_тз`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `работники_и_тз`  AS  select `техническое_задание`.`Номер_технического_задания` AS `Номер_технического_задания`,`техническое_задание`.`Комментарий` AS `Комментарий`,`техническое_задание`.`Номер_работника` AS `Номер_работника`,`техническое_задание`.`Номер_набора_функционала` AS `Номер_набора_функционала`,`техническое_задание`.`Номер_клиента` AS `Номер_клиента` from ((`техническое_задание` join `работник` on((`техническое_задание`.`Номер_работника` = `работник`.`Номер_работника`))) join `клиент` on((`техническое_задание`.`Номер_клиента` = `клиент`.`Номер_клиента`))) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `договор`
--
ALTER TABLE `договор`
  ADD PRIMARY KEY (`Номер_договора`),
  ADD KEY `Номер_технического_задания` (`Номер_технического_задания`),
  ADD KEY `Номер_статуса_готовности_проекта` (`Номер_статуса_готовности_проекта`);

--
-- Индексы таблицы `клиент`
--
ALTER TABLE `клиент`
  ADD PRIMARY KEY (`Номер_клиента`);

--
-- Индексы таблицы `вид_функционала`
--
ALTER TABLE `вид_функционала`
  ADD PRIMARY KEY (`Номер_функции`);

--
-- Индексы таблицы `готовность_проекта`
--
ALTER TABLE `готовность_проекта`
  ADD PRIMARY KEY (`Номер_статуса_готовности_проекта`);

--
-- Индексы таблицы `набор_функционала`
--
ALTER TABLE `набор_функционала`
  ADD PRIMARY KEY (`Номер_набора_функционала`),
  ADD KEY `R_6` (`Номер_функции`);

--
-- Индексы таблицы `отдел`
--
ALTER TABLE `отдел`
  ADD PRIMARY KEY (`Номер_отдела`);

--
-- Индексы таблицы `отчёты`
--
ALTER TABLE `отчёты`
  ADD PRIMARY KEY (`Номер_отчёта`),
  ADD KEY `Номер_технического_задания` (`Номер_технического_задания`);

--
-- Индексы таблицы `работник`
--
ALTER TABLE `работник`
  ADD PRIMARY KEY (`Номер_работника`),
  ADD KEY `R_2` (`Номер_отдела`),
  ADD KEY `R_3` (`Номер_специализации`);

--
-- Индексы таблицы `специализация`
--
ALTER TABLE `специализация`
  ADD PRIMARY KEY (`Номер_специализации`);

--
-- Индексы таблицы `техническое_задание`
--
ALTER TABLE `техническое_задание`
  ADD PRIMARY KEY (`Номер_технического_задания`),
  ADD KEY `R_7` (`Номер_набора_функционала`),
  ADD KEY `R_5` (`Номер_работника`),
  ADD KEY `R_8` (`Номер_клиента`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `договор`
--
ALTER TABLE `договор`
  MODIFY `Номер_договора` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `клиент`
--
ALTER TABLE `клиент`
  MODIFY `Номер_клиента` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `вид_функционала`
--
ALTER TABLE `вид_функционала`
  MODIFY `Номер_функции` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `готовность_проекта`
--
ALTER TABLE `готовность_проекта`
  MODIFY `Номер_статуса_готовности_проекта` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `набор_функционала`
--
ALTER TABLE `набор_функционала`
  MODIFY `Номер_набора_функционала` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `отдел`
--
ALTER TABLE `отдел`
  MODIFY `Номер_отдела` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `отчёты`
--
ALTER TABLE `отчёты`
  MODIFY `Номер_отчёта` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `работник`
--
ALTER TABLE `работник`
  MODIFY `Номер_работника` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `специализация`
--
ALTER TABLE `специализация`
  MODIFY `Номер_специализации` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `техническое_задание`
--
ALTER TABLE `техническое_задание`
  MODIFY `Номер_технического_задания` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `договор`
--
ALTER TABLE `договор`
  ADD CONSTRAINT `договор_ibfk_1` FOREIGN KEY (`Номер_технического_задания`) REFERENCES `техническое_задание` (`Номер_технического_задания`),
  ADD CONSTRAINT `договор_ibfk_2` FOREIGN KEY (`Номер_статуса_готовности_проекта`) REFERENCES `готовность_проекта` (`Номер_статуса_готовности_проекта`);

--
-- Ограничения внешнего ключа таблицы `набор_функционала`
--
ALTER TABLE `набор_функционала`
  ADD CONSTRAINT `набор_функционала_ibfk_1` FOREIGN KEY (`Номер_функции`) REFERENCES `вид_функционала` (`Номер_функции`);

--
-- Ограничения внешнего ключа таблицы `отчёты`
--
ALTER TABLE `отчёты`
  ADD CONSTRAINT `отчёты_ibfk_1` FOREIGN KEY (`Номер_технического_задания`) REFERENCES `техническое_задание` (`Номер_технического_задания`);

--
-- Ограничения внешнего ключа таблицы `работник`
--
ALTER TABLE `работник`
  ADD CONSTRAINT `работник_ibfk_1` FOREIGN KEY (`Номер_отдела`) REFERENCES `отдел` (`Номер_отдела`),
  ADD CONSTRAINT `работник_ibfk_2` FOREIGN KEY (`Номер_специализации`) REFERENCES `специализация` (`Номер_специализации`);

--
-- Ограничения внешнего ключа таблицы `техническое_задание`
--
ALTER TABLE `техническое_задание`
  ADD CONSTRAINT `техническое_задание_ibfk_1` FOREIGN KEY (`Номер_набора_функционала`) REFERENCES `набор_функционала` (`Номер_набора_функционала`),
  ADD CONSTRAINT `техническое_задание_ibfk_2` FOREIGN KEY (`Номер_работника`) REFERENCES `работник` (`Номер_работника`),
  ADD CONSTRAINT `техническое_задание_ibfk_3` FOREIGN KEY (`Номер_клиента`) REFERENCES `клиент` (`Номер_клиента`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
