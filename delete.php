<meta charset="UTF-8">
<?php
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

if (!empty($_POST['name_delete_table_dogovor'])) {
    $name_table = $_POST['name_delete_table_dogovor'];
}
if (!empty($_POST['name_delete_table_client'])) {
    $name_table = $_POST['name_delete_table_client'];
}
if (!empty($_POST['name_delete_table_plan'])) {
    $name_table = $_POST['name_delete_table_plan'];
}
if (!empty($_POST['name_delete_table_user_role'])) {
    $name_table = $_POST['name_delete_table_user_role'];
}
if (!empty($_POST['name_delete_table_function'])) {
    $name_table = $_POST['name_delete_table_function'];
}
if (!empty($_POST['name_delete_table_status_proj'])) {
    $name_table = $_POST['name_delete_table_status_proj'];
}
if (!empty($_POST['name_delete_table_nabor_function'])) {
    $name_table = $_POST['name_delete_table_nabor_function'];
}
if (!empty($_POST['name_delete_table_name_function'])) {
    $name_table = $_POST['name_delete_table_name_function'];
}
if (!empty($_POST['name_delete_table_otdel'])) {
    $name_table = $_POST['name_delete_table_otdel'];
}
if (!empty($_POST['name_delete_table_report'])) {
    $name_table = $_POST['name_delete_table_report'];
}
if (!empty($_POST['name_delete_table_rabotnik'])) {
    $name_table = $_POST['name_delete_table_rabotnik'];
}
if (!empty($_POST['name_delete_table_development'])) {
    $name_table = $_POST['name_delete_table_development'];
}
if (!empty($_POST['name_delete_spec'])) {
    $name_table = $_POST['name_delete_spec'];
}
if (!empty($_POST['name_delete_test'])) {
    $name_table = $_POST['name_delete_test'];
}
if (!empty($_POST['name_delete_table_tech_zad'])) {
    $name_table = $_POST['name_delete_table_tech_zad'];
}



if ($name_table=='Договор') {
    $number_dog = $_POST['number_dog'];

    $sql = "DELETE FROM `договор` WHERE `Номер_договора`=$number_dog";
}
if ($name_table=='Клиент') {
    $number_client = $_POST['number_client'];

    $sql = "DELETE FROM `клиент` WHERE `Номер_клиента`=$number_client";
}
if ($name_table=='План') {
    $number_plan = $_POST['number_plan'];

    $sql = "DELETE FROM `план` WHERE `Номер_плана`=$number_plan";
}
if ($name_table=='Пользовательская_роль') {
    $number_user_role = $_POST['number_user_role'];

    $sql = "DELETE FROM `пользовательская_роль` WHERE `Номер_пользовательской_роли`=$number_user_role";
}
if ($name_table=='Вид_функционала') {
    $number_function = $_POST['number_function'];

    $sql = "DELETE FROM `вид_функционала` WHERE `Номер_функции`=$number_function";
}
if ($name_table=='Готовность_проекта') {
    $number_status_proj = $_POST['number_status_proj'];

    $sql = "DELETE FROM `готовность_проекта` WHERE `Номер_статуса_готовности_проекта`=$number_status_proj";
}
if ($name_table=='Набор_функционала') {
    $number_nabor_func = $_POST['number_nabor_func'];

    $sql = "DELETE FROM `набор_функционала` WHERE `Номер_набора_функционала`=$number_nabor_func";
}
if ($name_table=='Название_набора') {
    $number_nazv_nabor = $_POST['number_name_function'];

    $sql = "DELETE FROM `название_набора` WHERE `Код_названия_набора`=$number_nazv_nabor";
}
if ($name_table=='Отдел') {
    $number_otdel = $_POST['number_otdel'];

    $sql = "DELETE FROM `отдел` WHERE `Номер_отдела`=$number_otdel";
}
if ($name_table=='Отчёт') {
    $number_report = $_POST['number_report'];

    $sql = "DELETE FROM `отчёт` WHERE `Номер_отчёта`=$number_report";
}
if ($name_table=='Работник') {
    $number_work = $_POST['number_work'];

    $sql = "DELETE FROM `работник` WHERE `Номер_работника`=$number_work";
}
if ($name_table=='Разработка') {
    $number_devlopment = $_POST['number_devlopment'];

    $sql = "DELETE FROM `разработка` WHERE `Номер_разработки`=$number_devlopment";
}
if ($name_table=='Специализация') {
    $number_spec = $_POST['number_spec'];

    $sql = "DELETE FROM `специализация` WHERE `Номер_специализации`=$number_spec";
}
if ($name_table=='Тестирование') {
    $number_test = $_POST['number_test'];

    $sql = "DELETE FROM `тестирование` WHERE `Номер_тестирования`=$number_test";
}
if ($name_table=='Техническое_задание') {
    $number_tz = $_POST['number_tz'];

    $sql = "DELETE FROM `техническое_задание` WHERE `Номер_технического_задания`=$number_tz";
}



if (mysqli_query($conn, $sql)) {
    echo "Данные успешно удалены";
    include('delete.html');
} else {
    echo "Ошибка при подключении к бд";
    echo "name".$name_table;
    include('index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>