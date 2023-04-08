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

if (!empty($_POST['name_add_table_dogovor'])) {
    $name_table = $_POST['name_add_table_dogovor'];
}
if (!empty($_POST['name_add_table_client'])) {
    $name_table = $_POST['name_add_table_client'];
}
if (!empty($_POST['name_add_table_plan'])) {
    $name_table = $_POST['name_add_table_plan'];
}
if (!empty($_POST['name_add_table_user_role'])) {
    $name_table = $_POST['name_add_table_user_role'];
}
if (!empty($_POST['name_add_table_function'])) {
    $name_table = $_POST['name_add_table_function'];
}
if (!empty($_POST['name_add_table_status_proj'])) {
    $name_table = $_POST['name_add_table_status_proj'];
}
if (!empty($_POST['name_add_table_nabor_function'])) {
    $name_table = $_POST['name_add_table_nabor_function'];
}
if (!empty($_POST['name_add_table_name_nabor'])) {
    $name_table = $_POST['name_add_table_name_nabor'];
}
if (!empty($_POST['name_add_table_otdel'])) {
    $name_table = $_POST['name_add_table_otdel'];
}
if (!empty($_POST['name_add_table_report'])) {
    $name_table = $_POST['name_add_table_report'];
}
if (!empty($_POST['name_add_table_rabotnik'])) {
    $name_table = $_POST['name_add_table_rabotnik'];
}
if (!empty($_POST['name_add_table_development'])) {
    $name_table = $_POST['name_add_table_development'];
}
if (!empty($_POST['name_add_spec'])) {
    $name_table = $_POST['name_add_spec'];
}
if (!empty($_POST['name_add_table_test'])) {
    $name_table = $_POST['name_add_table_test'];
}
if (!empty($_POST['name_add_table_tech_zad'])) {
    $name_table = $_POST['name_add_table_tech_zad'];
}


if ($name_table=='Договор') {
    $name_prod = $_POST['name_prod'];
    $number_tz = $_POST['number_tz'];
    $number_state_proj = $_POST['number_state_proj'];
    $link_kode = $_POST['link_kode'];
    $link_dogovor = $_POST['link_dogovor'];
    $number_development = $_POST['number_development'];
    $number_test = $_POST['number_test'];
    $cost_dogovor = $_POST['cost_dogovor'];
    $date_begin = $_POST['date_begin'];
    $date_end = $_POST['date_end'];

    $sql = "INSERT INTO `договор`(`Название_продукта`,`Номер_технического_задания`,`Номер_статуса_готовности_проекта`,
 `Ссылка_на_программный_код`,`Ссылка_на_договор`,  `Дата_обновления_статуса`,`Номер_разработки`, `Номер_тестирования`,   `Стоимость_договора`,`Дата_заключения`,`Дата_сдачи`) VALUES 
('$name_prod', $number_tz,$number_state_proj,'$link_kode', '$link_dogovor', NOW(), $number_development, $number_test,$cost_dogovor , '$date_begin', '$date_end')";
}
if ($name_table=='Клиент') {
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $e_mail = $_POST['e_mail'];
    $sql = "INSERT INTO `клиент`(`Фамилия_клиента`, 
`Имя_клиента`, `Отчество_клиента`, `Номер_телефона`, `E_Mail`) VALUES ('$surname','$name','$last_name', '$phone_number', '$e_mail')";
}
if ($name_table=='План') {
    $name_plan = $_POST['name_plan'];
    $link_plan = $_POST['link_plan'];
    $sql = "INSERT INTO `план`(`Название_плана`, 
`Ссылка_на_файл_плана`) VALUES ('$name_plan','$link_plan')";
}
if ($name_table=='Пользовательская_роль') {
    $name_user_role = $_POST['name_user_role'];
    $sql = "INSERT INTO `пользовательская_роль`(`Название_пользовательской_роли`) VALUES ('$name_user_role')";
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
    $number_function = $_POST['number_function'];
    $komment_to_function = $_POST['komment_to_function'];
    $number_name_nabor = $_POST['number_name_nabor'];
    $sql = "INSERT INTO `набор_функционала`(`Номер_функции`, `Комментарий_к_функционалу`, `Код_названия_набора`
) VALUES ($number_function,'$komment_to_function',$number_name_nabor)";
}
if ($name_table=='Название_набора') {
    $name_nabor = $_POST['name_nabor'];
    $sql = "INSERT INTO `название_набора`(`Название_набора`
) VALUES ('$name_nabor')";
}
if ($name_table=='Отдел') {
    $name_otdel = $_POST['name_otdel'];
    $sql = "INSERT INTO `отдел`(`Наименование_отдела`) 
VALUES ('$name_otdel')";
}
if ($name_table=='Отчёт') {
    $name_report = $_POST['name_report'];
    $link_report = $_POST['link_report'];
    $sql = "INSERT INTO `отчёт`(`Название_отчёта`, `Ссылка_на_файл_отчёта`) 
VALUES ('$name_report', '$link_report')";
}
if ($name_table=='Работник') {
    $surname_work = $_POST['surname_work'];
    $name_work = $_POST['name_work'];
    $last_name_work = $_POST['last_name_work'];
    $number_open_proj = $_POST['number_open_proj'];
    $number_spec = $_POST['number_spec'];
    $number_role = $_POST['number_role'];
    $number_otdel = $_POST['number_otdel'];
    $phone_number = $_POST['phone_number'];
    $e_mail = $_POST['e_mail'];
    $user_id = $_POST['user_id'];
    $cost_in_hour = $_POST['cost_in_hour'];


    $sql = "INSERT INTO `работник`(`Фамилия_работника`, `Имя_работника`, `Отчество_работника`,`Количество_открытых_проектов`, `Номер_специализации`, `Номер_пользовательской_роли`, `Номер_отдела`,  `Номер_телефона`, `E_Mail`, `user_id`, `Заработная_плата_в_час`
) VALUES ('$surname_work', '$name_work', '$last_name_work',$number_open_proj,
$number_spec,$number_role, $number_otdel, '$phone_number', '$e_mail', $user_id, $cost_in_hour)";
}
if ($name_table=='Разработка') {
    $link_development = $_POST['link_development'];
    $time_development = $_POST['time_development'];
    $link_maket = $_POST['link_maket'];
    $sql = "INSERT INTO `разработка`(
`Ссылка_на_отчёт_о_разработке`, `Затраченное_количество_часов_на_разработку`, `Ссылка_на_макет`) VALUES ('$link_development', $time_development, '$link_maket')";
}
if ($name_table=='Специализация') {
    $name_spec = $_POST['name_spec'];
    $sql = "INSERT INTO `специализация`(
`Название_специализации`) VALUES ('$name_spec')";
}
if ($name_table=='Тестирование') {
    $link_test = $_POST['link_test'];
    $time_test = $_POST['time_test'];
    $sql = "INSERT INTO `тестирование`(
`Ссылка_на_отчёт_о_тестировании`, `Затраченное_количество_часов_на_тестирование`) VALUES ('$link_test', $time_test)";
}
if ($name_table=='Техническое_задание') {
    $number_rabotnik = $_POST['number_rabotnik'];
    $number_klient = $_POST['number_klient'];
    $komment_to_tz = $_POST['komment_to_tz'];
    $link_tz = $_POST['link_tz'];
    $number_name_nub_func = $_POST['number_name_nub_func'];
    $link_requirements = $_POST['link_requirements'];

    $sql = "INSERT INTO `техническое_задание`(`Номер_работника`,`Номер_клиента`,`Комментарий`,  `Ссылка_на_техническое_задание`, `Код_названия_набора`, `Ссылка_на_файл_с_первоначальными_требованиями`) 
VALUES ($number_rabotnik, $number_klient,'$komment_to_tz','$link_tz',$number_name_nub_func, '$link_requirements')";
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