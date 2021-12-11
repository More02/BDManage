<meta charset="UTF-8">
<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "разработка_программных_продуктов");
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if ($conn->connect_error) {
    printf("Соединение не удалось: %s\n", $conn->connect_error);
    include('index2.html');
    exit();
}

if (!empty($_POST['name_add_table_dogovor'])) {
    $name_table = $_POST['name_add_table_dogovor'];
}
if (!empty($_POST['name_add_table_client'])) {
    $name_table = $_POST['name_add_table_client'];
}
if (!empty($_POST['name_add_table_function'])) {
    $name_table = $_POST['name_add_table_function'];
}
if (!empty($_POST['name_add_table_status_proj'])) {
    $name_table = $_POST['name_add_table_status_proj'];
}
if (!empty($_POST['name_add_table_status_nabor_function'])) {
    $name_table = $_POST['name_add_table_status_nabor_function'];
}
if (!empty($_POST['name_add_table_otdel'])) {
    $name_table = $_POST['name_add_table_otdel'];
}
if (!empty($_POST['name_add_table_rabotnik'])) {
    $name_table = $_POST['name_add_table_rabotnik'];
}
if (!empty($_POST['name_add_spec'])) {
    $name_table = $_POST['name_add_spec'];
}
if (!empty($_POST['name_add_table_tech_zad'])) {
    $name_table = $_POST['name_add_table_tech_zad'];
}



if ($name_table=='Договор') {
    $number_tz = $_POST['number_tz'];
    $number_state_proj = $_POST['number_state_proj'];
    $name_prod = $_POST['name_prod'];
    $sql = "INSERT INTO `договор`(`Номер_технического_задания`, 
`Номер_статуса_готовности_проекта`, `Название_продукта`) VALUES 
($number_tz,$number_state_proj,'$name_prod')";
}
if ($name_table=='Клиент') {
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $sql = "INSERT INTO `клиент`(`Фамилия_клиента`, 
`Имя_клиента`, `Отчество_клиента`) VALUES ('$surname','$name','$last_name')";
}
if ($name_table=='Вид_функционала') {
    $type_function = $_POST['type_function'];
    $sql = "INSERT INTO `вид_функционала`(`Описание_функции`) 
VALUES ('$type_function')";
}
if ($name_table=='Готовность_проекта') {
    $name_status_proj = $_POST['name_status_proj'];
    $sql = "INSERT INTO `готовность_проекта`(`Название_статуса_готовности_проекта`) 
VALUES ('$name_status_proj')";
}
if ($name_table=='Набор_функционала') {
    $number_nabor = $_POST['number_nabor'];
    $komment_to_function = $_POST['komment_to_function'];
    $number_function = $_POST['number_function'];
    $sql = "INSERT INTO `набор_функционала`(`Номер_набора`, `Комментарий_к_функционалу`, 
`Номер_функции`) VALUES ($number_nabor,'$komment_to_function',$number_function)";
}
if ($name_table=='Отдел') {
    $name_otdel = $_POST['name_otdel'];
    $sql = "INSERT INTO `отдел`(`Наименование_отдела`) 
VALUES ('$name_otdel')";
}
if ($name_table=='Работник') {
    $number_spec = $_POST['number_spec'];
    $number_otdel = $_POST['number_otdel'];
    $surname_work = $_POST['surname_work'];
    $name_work = $_POST['name_work'];
    $last_name_work = $_POST['last_name_work'];
    $number_open_proj = $_POST['number_open_proj'];
    $sql = "INSERT INTO `работник`(`Номер_специализации`, 
`Номер_отдела`, `Фамилия_работника`, `Имя_работника`, `Отчество_работника`, 
`Количество_открытых_проектов`) VALUES ($number_spec, $number_otdel, '$surname_work','$name_work',
'$last_name_work',$number_open_proj)";
}
if ($name_table=='Специализация') {
    $name_spec = $_POST['name_spec'];
    $sql = "INSERT INTO `специализация`(
`Название_специализации`) VALUES ('$name_spec')";
}
if ($name_table=='Техническое_задание') {
    $komment_to_tz = $_POST['komment_to_tz'];
    $number_rabotnik = $_POST['number_rabotnik'];
    $number_nub_func = $_POST['number_nub_func'];
    $number_klient = $_POST['number_klient'];
    $sql = "INSERT INTO `техническое_задание`(`Комментарий`, `Номер_работника`, 
`Номер_набора_функционала` , `Номер_клиента`) 
VALUES ('$komment_to_tz',$number_rabotnik,$number_nub_func,$number_klient)";
}








if (mysqli_query($conn, $sql)) {
    echo "Данные успешно добавлены";
    include('index_add.html');
} else {
    echo "Ошибка при подключении к бд";
    echo "name".$name_table;
    include('index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>