-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 17 2020 г., 13:13
-- Версия сервера: 8.0.15
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document`
--

INSERT INTO `document` (`id`, `name`) VALUES
(9, 'Документ 1.docx'),
(13, 'Документ 3.docx'),
(14, 'Документ 2.docx'),
(15, 'Документ 4.docx');

-- --------------------------------------------------------

--
-- Структура таблицы `document_status`
--

CREATE TABLE `document_status` (
  `document_id` int(11) NOT NULL,
  `id_set_by` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document_status`
--

INSERT INTO `document_status` (`document_id`, `id_set_by`, `status_id`) VALUES
(9, 18, 2),
(13, 18, 1),
(14, 18, 1),
(15, 18, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `document_type`
--

CREATE TABLE `document_type` (
  `type_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document_type`
--

INSERT INTO `document_type` (`type_id`, `document_id`) VALUES
(1, 9),
(1, 13),
(1, 14),
(1, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `document_uploader`
--

CREATE TABLE `document_uploader` (
  `docupload_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document_uploader`
--

INSERT INTO `document_uploader` (`docupload_id`, `user_id`, `document_id`) VALUES
(9, 18, 9),
(13, 18, 13),
(14, 18, 14),
(15, 18, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `last_document_modify`
--

CREATE TABLE `last_document_modify` (
  `document_id` int(11) NOT NULL,
  `modify_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `last_document_modify`
--

INSERT INTO `last_document_modify` (`document_id`, `modify_id`) VALUES
(9, 3),
(13, 3),
(14, 3),
(15, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `modified_by`
--

CREATE TABLE `modified_by` (
  `id_manage` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modified_by`
--

INSERT INTO `modified_by` (`id_manage`, `user_id`) VALUES
(3, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `modify`
--

CREATE TABLE `modify` (
  `id` int(11) NOT NULL,
  `name` enum('viewed','edited','changed_status') NOT NULL DEFAULT 'viewed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modify`
--

INSERT INTO `modify` (`id`, `name`) VALUES
(1, 'viewed'),
(2, 'edited'),
(3, 'changed_status');

-- --------------------------------------------------------

--
-- Структура таблицы `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Пользователь'),
(2, 'Админ');

-- --------------------------------------------------------

--
-- Структура таблицы `role_permission`
--

CREATE TABLE `role_permission` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `setstatus_by`
--

CREATE TABLE `setstatus_by` (
  `id_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `setstatus_by`
--

INSERT INTO `setstatus_by` (`id_status`, `user_id`) VALUES
(1, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` enum('approved','disapproved') NOT NULL DEFAULT 'disapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(2, 'approved'),
(1, 'disapproved');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Документ'),
(2, 'Отчет');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(18, 'sdfsdfsdfssdf', 'fdssdfdsfdsffd@mail.sd', 'aaed6726d51be3c536e921656a263ea9'),
(19, 'sdfsdfsdfsdf', 'sdf@mail.dsf', '39c8e9953fe8ea40ff1c59876e0e2f28'),
(23, 'sdfdsffgjhty', 'sdfdsffgjhty@mail.ru', '7770733e772bf4754c490842a30e1893');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(23, 1),
(18, 2),
(19, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `document_status`
--
ALTER TABLE `document_status`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `fk_document_status_setstatus_by1_idx` (`id_set_by`),
  ADD KEY `fk_document_status_status1_idx` (`status_id`);

--
-- Индексы таблицы `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`type_id`,`document_id`),
  ADD KEY `fk_document_type_document1_idx` (`document_id`),
  ADD KEY `fk_document_type_type1_idx` (`type_id`);

--
-- Индексы таблицы `document_uploader`
--
ALTER TABLE `document_uploader`
  ADD PRIMARY KEY (`docupload_id`),
  ADD UNIQUE KEY `document_id_UNIQUE` (`document_id`),
  ADD KEY `fk_document_owner_document1_idx` (`document_id`),
  ADD KEY `fk_document_owner_user1_idx` (`user_id`);

--
-- Индексы таблицы `last_document_modify`
--
ALTER TABLE `last_document_modify`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `fk_document_modify_document1_idx` (`document_id`),
  ADD KEY `fk_last_document_modify_modify1_idx` (`modify_id`);

--
-- Индексы таблицы `modified_by`
--
ALTER TABLE `modified_by`
  ADD PRIMARY KEY (`id_manage`),
  ADD KEY `fk_managed_by_user1_idx` (`user_id`);

--
-- Индексы таблицы `modify`
--
ALTER TABLE `modify`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `fk_role_permission_permission1_idx` (`permission_id`),
  ADD KEY `fk_role_permission_role1_idx` (`role_id`);

--
-- Индексы таблицы `setstatus_by`
--
ALTER TABLE `setstatus_by`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `fk_setstatus_by_user1_idx` (`user_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `fk_user_role_role1_idx` (`role_id`),
  ADD KEY `fk_user_role_user1_idx` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `document_uploader`
--
ALTER TABLE `document_uploader`
  MODIFY `docupload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `modified_by`
--
ALTER TABLE `modified_by`
  MODIFY `id_manage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `modify`
--
ALTER TABLE `modify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `setstatus_by`
--
ALTER TABLE `setstatus_by`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `document_status`
--
ALTER TABLE `document_status`
  ADD CONSTRAINT `fk_document_status_document1` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_document_status_setstatus_by1` FOREIGN KEY (`id_set_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_document_status_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `document_type`
--
ALTER TABLE `document_type`
  ADD CONSTRAINT `fk_document_type_document1` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_document_type_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `document_uploader`
--
ALTER TABLE `document_uploader`
  ADD CONSTRAINT `document_uploader_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `document_uploader_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `last_document_modify`
--
ALTER TABLE `last_document_modify`
  ADD CONSTRAINT `fk_document_modify_document1` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_last_document_modify_modify1` FOREIGN KEY (`modify_id`) REFERENCES `modify` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `modified_by`
--
ALTER TABLE `modified_by`
  ADD CONSTRAINT `fk_managed_by_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `modified_by_ibfk_1` FOREIGN KEY (`id_manage`) REFERENCES `modify` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `fk_role_permission_permission1` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`),
  ADD CONSTRAINT `fk_role_permission_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Ограничения внешнего ключа таблицы `setstatus_by`
--
ALTER TABLE `setstatus_by`
  ADD CONSTRAINT `fk_setstatus_by_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `setstatus_by_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_user_role_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_role_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
