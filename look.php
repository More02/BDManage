<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Разработка программных продуктов</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require_once('ConnectDB.php'); ?>
<div id="header">
    <ul id="main_menu">
        <li><a href="index_add.html">Работа с базой данных</a></li>
        <li><a href="requirements.html">Введение информации в файлы</a></li>
        <li><a href="report.html">Формирование отчётов/планов</a></li>
        <li><a href="download.html">Загрузка файлов</a></li>
    </ul>
    <ul>
        <li><a href="index_add.html">Добавление</a></li>
        <li><a href="delete.html">Удаление</a></li>
        <li><a href="update.html">Обновление</a></li>
        <li><a href="look.php">Просмотр</a></li>
        <li><a href="filtr.php">Фильтрация</a></li>
    </ul>

    <h1>Разработка программных продуктов</h1>
</div>
<div id="page">
    <div id="middle">
        <div id="add">
            <p>Просмотр данных в таблице</p>
            <p class="select_table">Выберите таблицу для просмотра данных:</p>
            <form method="post" action="look.php">
                <select name="show_table" id="show_table">
                    <option value="Договор">Договор</option>
                    <option value="Клиент">Клиент</option>
                    <option value="Команда_разработчиков">Команда разработчиков</option>
                    <option value="План">План</option>
                    <option value="Пользовательская_роль">Пользовательская роль</option>
                    <option value="Вид_функционала">Вид функционала</option>
                    <option value="Готовность_проекта">Готовность проекта</option>
                    <option value="Набор_функционала">Набор функционала</option>
                    <option value="Название_команды_разработчиков">Название команды разработчиков</option>
                    <option value="Название_набора">Название набора</option>
                    <option value="Отдел">Отдел</option>
                    <option value="Отчёт">Отчёт</option>
                    <option value="Работник">Работник</option>
                    <option value="Разработка">Разработка</option>
                    <option value="Специализация">Специализация</option>
                    <option value="Тестирование">Тестирование</option>
                    <option value="Техническое_задание">Техническое задание</option>
                </select><br>
                <input type="submit" name="type[look_send]"  id="look_button" value="Отобразить данные из таблицы">
                <style>
                    #look_button {
                        margin-top: 10px;
                        margin-left: 0px;
                        width: 300px;
                    }


                </style>
                <meta charset="UTF-8">
                <?php
                error_reporting(0);

                if (array_keys($_POST['type'])[0]=='look_send') {
                    define("DB_HOST", "localhost");
                    define("DB_USER", "root");
                    define("DB_PASSWORD", "");
                    define("DB_DATABASE", "develop");
                    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

                    if ($conn->connect_error) {
                        printf("Соединение не удалось: %s\n", $conn->connect_error);
                        include('index2.html');
                        exit();
                    }

                    $name_table = $_POST['show_table'];
                    echo "<p style='text-align: left;'>Выбрана таблица: ";
                    echo $name_table."</p>";
                    $sql = "SELECT * FROM `$name_table` WHERE 1";



                    if (mysqli_query($conn, $sql)) {
                        if ($name_table=='Договор') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                                       <th>" . "Номер договора"
                                    . "</th><th>" . "Название продукта"
                                    . "</th><th>" . "Номер технического задания"
                                    . "</th><th>" . "Номер статуса готовности проекта"
                                    . "</th><th>" . "Ссылка на программный код"
                                    . "</th><th>" . "Ссылка на договор"
                                    . "</th><th>" . "Дата обновления статуса"
                                    . "</th><th>" . "Номер разработки"
                                    . "</th><th>" . "Номер тестирования"
                                    . "</th><th>" . "Стоимость договора"
                                    . "</th><th>" . "Дата заключения"
                                    . "</th><th>" . "Дата сдачи"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_договора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_продукта"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_технического_задания"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_статуса_готовности_проекта"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Ссылка_на_программный_код"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Ссылка_на_договор"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Дата_обновления_статуса"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_разработки"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_тестирования"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Стоимость_договора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Дата_заключения"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Дата_сдачи"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Клиент') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер клиента"
                                    . "</th><th>" . "Фамилия клиента"
                                    . "</th><th>" . "Имя клиента"
                                    . "</th><th>" . "Отчество клиента"
                                    . "</th><th>" . "Номер телефона"
                                    . "</th><th>" . "E-Mail"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Фамилия_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Имя_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Отчество_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_телефона"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["E_Mail"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Команда_разработчиков') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер команды разработчиков"
                                    . "</th><th>" . "Номер работника"
                                    . "</th><th>" . "Затраченное количество часов на работу"
                                    . "</th><th>" . "Номер названия команды"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_команды_разработчиков"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Затраченное_количество_часов_на_работу"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_названия_команды"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='План') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер плана"
                                    . "</th><th>" . "Название плана"
                                    . "</th><th>" . "Ссылка на файл плана"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_плана"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_плана"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Ссылка_на_файл_плана"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Пользовательская_роль') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер пользовательской роли"
                                    . "</th><th>" . "Название пользовательской роли"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_пользовательской_роли"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_пользовательской_роли"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Вид_функционала') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер функции"
                                    . "</th><th>" . "Описание функции"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_функции"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Описание_функции"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Готовность_проекта') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер статуса готовности проекта"
                                    . "</th><th>" . "Название статуса готовности проект"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_статуса_готовности_проекта"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_статуса_готовности_проекта"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Набор_функционала') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер набора функционала"
                                    . "</th><th>" . "Номер функции"
                                    . "</th><th>" . "Комментарий к функционалу"
                                    . "</th><th>" . "Код названия набора"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_набора_функционала"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_функции"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Комментарий_к_функционалу"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_названия_набора"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Название_команды_разработчиков') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер названия команды"
                                    . "</th><th>" . "Название команды"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_названия_команды"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_команды"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Название_набора') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Код названия набора"
                                    . "</th><th>" . "Название набора"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_названия_набора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_набора"]
                                         . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Отдел') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер отдела"
                                    . "</th><th>" . "Наименование отдела"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_отдела"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Наименование_отдела"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Отчёт') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер отчёта"
                                    . "</th><th>" . "Название отчёта"
                                    . "</th><th>" . "Ссылка на файл отчёта"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_отчёта"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_отчёта"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Ссылка_на_файл_отчёта"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Работник') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер работника"
                                    . "</th><th>" . "Фамилия работника"
                                    . "</th><th>" . "Имя работника"
                                    . "</th><th>" . "Отчество работника"
                                    . "</th><th>" . "Количество открытых проектов"
                                    . "</th><th>" . "Номер специализации"
                                    . "</th><th>" . "Номер пользовательской роли"
                                    . "</th><th>" . "Номер отдела"
                                    . "</th><th>" . "Номер телефона"
                                    . "</th><th>" . "E-Mail"
                                    . "</th><th>" . "user_id"
                                    . "</th><th>" . "Заработная плата в час"

                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Фамилия_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Имя_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Отчество_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Количество_открытых_проектов"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_специализации"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_пользовательской_роли"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_отдела"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_телефона"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["E_Mail"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["user_id"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Заработная_плата_в_час"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Разработка') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер разработки"
                                    . "</th><th>" . "Ссылка на отчёт о разработке"
                                    . "</th><th>" . "Затраченное количество часов на разработку"
                                    . "</th><th>" . "Ссылка на макет"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_разработки"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Ссылка_на_отчёт_о_разработке"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Затраченное_количество_часов_на_разработку"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Ссылка_на_макет"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Специализация') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер специализации"
                                    . "</th><th>" . "Название специализации"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_специализации"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_специализации"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Тестирование') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер тестирования"
                                    . "</th><th>" . "Ссылка на отчёт о тестировании"
                                    . "</th><th>" . "Затраченное количество часов на тестирование"
                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_тестирования"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Ссылка_на_отчёт_о_тестировании"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Затраченное_количество_часов_на_тестирование"]

                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }
                        if ($name_table=='Техническое_задание') {
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер технического задания"
                                    . "</th><th>" . "Номер работника"
                                    . "</th><th>" . "Номер клиента"
                                    . "</th><th>" . "Комментарий"
                                    . "</th><th>" . "Ссылка на техническое задание"
                                    . "</th><th>" . "Код названия набора"
                                    . "</th><th>" . "Ссылка на файл с первоначальными требованиями"

                                    . "</th>
                 </tr>";
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {

                                    echo
                                        "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_технического_задания"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_работника"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_клиента"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Комментарий"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Ссылка_на_техническое_задание"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Код_названия_набора"]
                                        . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Ссылка_на_файл_с_первоначальными_требованиями"]
                                        . "</td></tr>";
                                }
                                echo "</tbody></table>";
                            }
                        }







                    } else {
                        echo "Ошибка при подключении к бд";
                        include('index2.html');
                        printf(mysqli_error($conn));
                    }

                    mysqli_close($conn);
                }


                ?>
            </form>



        </div>



    </div>
    <div id="footer">

    </div>
</div>

</body>
</html>