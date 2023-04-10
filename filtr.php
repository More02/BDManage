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
            <p>Фильтрация данных</p>

            <form method="post" id="filtr_form" style="margin-left: -100px;">
                <p class="select_table">Выберите поля для фильтрации</p>
                <input type="text" placeholder="Номер договора" name="number_dog" class="check2" id="number_dog"><br>
                <input type="text" placeholder="Введите название команды" name="team" class="check2" id="team"><br>
                <input type="text" placeholder="Введите клиента" name="klient" class="check2" id="klient"><br>
                <input type="text" placeholder="Название продукта" name="nazv_prod" class="check2" id="nazv_prod"><br>
                <input type="text" placeholder="Название набора функций" name="nab_func" class="check2" id="nab_func"><br>

                <p class="select_table">Выберите статус готовности</p>
                <input type="checkbox" name="Working" value="Working" class="check" id="Working">Принято в работу<br>
                <input type="checkbox" name="TZ" value="TZ" class="check" id="TZ">Разработка технического задания<br>
                <input type="checkbox" name="Designin" value="Designin" class="check" id="Designin">Создание макета<br>
                <input type="checkbox" name="Developing" value="Developing" class="check" id="Developing">Написание программного кода<br>
                <input type="checkbox" name="Testing" value="Testing" class="check" id="Testing">Тестирование<br>
                <input type="checkbox" name="Ready" value="Ready" class="check" id="Ready">Готово<br>
                <input type="submit" name="type[filtr_button]"  id="filtr_button" value="Найти">
            </form>
            <?php
            error_reporting(0);

            if (array_keys($_POST['type'])[0]=='filtr_button') {
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

                if (!empty($_POST['number_dog'])) {$number_dog = '`Номер_договора` = '.$_POST['number_dog'];} else {
                    $number_dog = '1';
                }
                if (!empty($_POST['team'])) {$team = "`Название_команды` LIKE '%".$_POST['team']."%'";} else {
                    $team = '1';
                }
                if (!empty($_POST['klient'])) {$klient = "k LIKE '%".$_POST['klient']."%'";} else {
                    $klient = '1';
                }
                if (!empty($_POST['nazv_prod'])) {$nazv_prod = "`Название_продукта` LIKE '%".$_POST['nazv_prod']."%'";} else {
                    $nazv_prod = '1';
                }
                if (!empty($_POST['nab_func'])) {$nab_func = '`Название_набора` = '.$_POST['nab_func'];} else {
                    $nab_func = '1';
                }
                if (!empty($_POST['Ready'])){$Ready = "OR `Название_статуса_готовности_проекта` LIKE '%Готово%'";} else {
                    $Ready = '';
                }
                if (!empty($_POST['Developing'])) {$Developing = "OR `Название_статуса_готовности_проекта` LIKE '%Написание программного кода%'";} else {
                    $Developing = '';
                }
                if (!empty($_POST['Testing'])) {$Testing = "OR `Название_статуса_готовности_проекта` LIKE '%Тестирование%'";} else {
                    $Testing = '';
                }
                if (!empty($_POST['Designin'])){$Designin = "OR `Название_статуса_готовности_проекта` LIKE '%Создание макета%'"; } else {
                    $Designin = '';
                }
                if (!empty($_POST['TZ'])) {$TZ = "OR `Название_статуса_готовности_проекта` LIKE '%Разработка технического задания%'";} else {
                    $TZ = '';
                }
                if (!empty($_POST['Working'])) {$Working = "OR `Название_статуса_готовности_проекта` LIKE '%Принято в работу%'";} else {
                    $Working = '';
                }
                if (empty($TZ)&&empty($Designin)&&empty($Testing)&&empty($Developing)&&empty($Ready)&&empty($Working)) {
                    $Ready="OR 1";
                }


                $sql = "
SELECT 
	`Номер_договора`,
	`Название_команды`,
	k as 'Клиент',
 	`Название_продукта`,
	`Название_набора`,
	`Название_статуса_готовности_проекта` 
FROM 
((((`договор`  
	INNER JOIN (SELECT `техническое_задание`.`Номер_технического_задания`, `название_команды_разработчиков`.`Название_команды` FROM `техническое_задание`
		INNER JOIN `название_команды_разработчиков` on `техническое_задание`.`Номер_названия_команды` = `название_команды_разработчиков`.`Номер_названия_команды`) as s1 ON `договор`.`Номер_технического_задания` = s1.`Номер_технического_задания`)
	INNER JOIN (SELECT `техническое_задание`.`Номер_технического_задания`, `техническое_задание`.`Номер_клиента`, concat(`Фамилия_клиента`,' ',`Имя_клиента`,' ',`Отчество_клиента`) as k FROM `техническое_задание`
		INNER JOIN `клиент` on `техническое_задание`.`Номер_клиента`=`клиент`.`Номер_клиента`) as s2 ON `договор`.`Номер_технического_задания`=s2.`Номер_технического_задания`)
	INNER JOIN (SELECT `техническое_задание`.`Номер_технического_задания`, `название_набора`.`Название_набора` FROM `техническое_задание` INNER JOIN `название_набора` on `техническое_задание`.`Код_названия_набора`=`название_набора`.`Код_названия_набора`) as s3 ON `договор`.`Номер_технического_задания`=s3.`Номер_технического_задания`)
		INNER JOIN `готовность_проекта` ON `договор`.`Номер_статуса_готовности_проекта`=`готовность_проекта`.`Номер_статуса_готовности_проекта`)
WHERE $number_dog AND $team AND $klient AND $nazv_prod AND $nazv_prod AND $nab_func AND ('1' LIKE '0' $Ready"."  $Developing "."$Testing "." $Working "." $TZ "." $Designin)
ORDER BY `Номер_договора`";


//echo $sql;


                if (mysqli_query($conn, $sql)) {

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table style='width: 60%;
                        border: 1px solid #dddddd;
                        border-collapse: collapse;
                        position: absolute;
                        float:right;
                        margin-top: -600px;
                        margin-left: 460px;'>
                        <tbody><tr>
                   <th>" . "Номер договора"
                            . "</th><th>" . "Название команды"
                            . "</th><th>" . "Клиент"
                            . "</th><th>" . "Название продукта"
                            . "</th><th>" . "Название набора"
                            . "</th><th>" . "Название статуса готовности проекта"
                            . "</th>
                 </tr>";
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                            echo
                                "<tr><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Номер_договора"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_команды"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Клиент"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_продукта"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_набора"]
                                . "</td><td style = 'border: 1px solid #dddddd;
                        padding: 5px; text-align: center'>" . $row["Название_статуса_готовности_проекта"]
                                . "</td></tr>";
                        }
                        echo "</tbody></table>";
                    }



                } else {
                    echo "Ошибка при подключении к бд";
                    include('index2.html');
                    printf(mysqli_error($conn));
                }

                mysqli_close($conn);
            }


            ?>
            <style>
                .check {
                    width: 20px;
                    height: 20px;
                    margin-left: -15px;
                }
                .check2 {
                    margin-left: -15px;
                }
                #filtr_form {
                    text-align: left;


                }
            </style>



        </div>


    </div>
    <div id="footer">

    </div>
</div>

</body>
</html>