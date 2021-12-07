<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Разработка программных продуктов</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require_once('ConnectDB.php'); ?>
<div id="page">
    <div id="header">

        <ul>
            <li><a href="index_add.html">Добавление</a></li>
            <li><a href="delete.html">Удаление</a></li>
            <li><a href="update.html">Обновление</a></li>
            <li><a href="look.html">Просмотр</a></li>
            <li><a href="filtr.html">Фильтрация</a></li>
        </ul>

        <h1>Разработка программных продуктов</h1>
    </div>
    <div id="middle">
        <div id="add">
            <p>Просмотр данных в таблице</p>
            <p class="select_table">Выберите таблицу для просмотра данных:</p>
            <form method="post" action="look.php">
                <select name="show_table" id="show_table">
                    <option value="Договор">Договор</option>
                    <option value="Клиент">Клиент</option>
                    <option value="Вид_функционала">Вид функционала</option>
                    <option value="Готовность_проекта">Готовность проекта</option>
                    <option value="Набор_функционала">Набор функционала</option>
                    <option value="Отдел">Отдел</option>
                    <option value="Работник">Работник</option>
                    <option value="Специализация">Специализация</option>
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
                    define("DB_DATABASE", "разработка_программных_продуктов");
                    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

                    if ($conn->connect_error) {
                        printf("Соединение не удалось: %s\n", $conn->connect_error);
                        include('C:\OpenServer\domains\localhost\BD_Proj\index2.html');
                        exit();
                    }

                    $table = $_POST['show_table'];
                    echo "<p style='text-align: left;'>Выбрана таблица: ";
                    echo $table."</p>";
                    $sql = "SELECT * FROM `$table` WHERE 1";



                    if (mysqli_query($conn, $sql)) {

                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;'>
                        <tbody><tr>
                   <th>" . "Номер договора"
                                . "</th><th>" . "Номер технического задания"
                                . "</th><th>" . "Номер статуса готовности проекта"
                                . "</th><th>" . "Название продукта"
                                . "</th>
                 </tr>";
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {

                                echo
                                    "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_договора"]
                                    . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_технического_задания"]
                                    . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_статуса_готовности_проекта"]
                                    . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_продукта"]
                                    . "</td></tr>";
                            }
                            echo "</tbody></table>";
                        }



                    } else {
                        echo "Ошибка при подключении к бд";
                        include('C:\OpenServer\domains\localhost\BD_Proj\index2.html');
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