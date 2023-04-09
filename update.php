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

if (!empty($_POST['name_update_table_dogovor'])) {
    $name_table = $_POST['name_update_table_dogovor'];
}
if (!empty($_POST['name_update_table_client'])) {
    $name_table = $_POST['name_update_table_client'];
}
if (!empty($_POST['name_update_table_development_team'])) {
    $name_table = $_POST['name_update_table_development_team'];
}
if (!empty($_POST['name_update_table_plan'])) {
    $name_table = $_POST['name_update_table_plan'];
}
if (!empty($_POST['name_update_table_user_role'])) {
    $name_table = $_POST['name_update_table_user_role'];
}
if (!empty($_POST['name_update_table_function'])) {
    $name_table = $_POST['name_update_table_function'];
}
if (!empty($_POST['name_update_table_status_proj'])) {
    $name_table = $_POST['name_update_table_status_proj'];
}
if (!empty($_POST['name_update_table_nabor_function'])) {
    $name_table = $_POST['name_update_table_nabor_function'];
}
if (!empty($_POST['name_update_development_name_team'])) {
    $name_table = $_POST['name_update_development_name_team'];
}
if (!empty($_POST['name_update_table_name_nabor'])) {
    $name_table = $_POST['name_update_table_name_nabor'];
}
if (!empty($_POST['name_update_table_otdel'])) {
    $name_table = $_POST['name_update_table_otdel'];
}
if (!empty($_POST['name_update_table_report'])) {
    $name_table = $_POST['name_update_table_report'];
}
if (!empty($_POST['name_update_table_rabotnik'])) {
    $name_table = $_POST['name_update_table_rabotnik'];
}
if (!empty($_POST['name_update_table_development'])) {
    $name_table = $_POST['name_update_table_development'];
}
if (!empty($_POST['name_update_spec'])) {
    $name_table = $_POST['name_update_spec'];
}
if (!empty($_POST['name_update_table_test'])) {
    $name_table = $_POST['name_update_table_test'];
}
if (!empty($_POST['name_update_table_tech_zad'])) {
    $name_table = $_POST['name_update_table_tech_zad'];
}


if ($name_table=='Договор') {
    $number_dog = $_POST['number_dog'];
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

    $sql = "UPDATE `договор` SET `Название_продукта` = '$name_prod',`Номер_технического_задания` = $number_tz,`Номер_статуса_готовности_проекта` = $number_state_proj,
 `Ссылка_на_программный_код` = '$link_kode',`Ссылка_на_договор` = '$link_dogovor',  `Дата_обновления_статуса` = NOW(),`Номер_разработки` = '$number_development', `Номер_тестирования` = $number_test,   `Стоимость_договора` = $cost_dogovor,`Дата_заключения` = '$date_begin',`Дата_сдачи` = '$date_end' WHERE `Номер_договора`=$number_dog";

}
if ($name_table=='Клиент') {
    $number_client = $_POST['number_client'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $e_mail = $_POST['e_mail'];
    $sql = "UPDATE `клиент` SET `Фамилия_клиента` = '$surname',
`Имя_клиента` = '$name', `Отчество_клиента` = '$last_name', `Номер_телефона` = '$phone_number', `E_Mail` = '$e_mail' WHERE `Номер_клиента`=$number_client";
}
if ($name_table=='Команда_разработчиков') {
    $number_team_development = $_POST['number_team_development'];
    $number_rabotnik = $_POST['number_rabotnik'];
    $number_hours = $_POST['number_hours'];
    $number_team_name = $_POST['number_team_name'];
    $sql = "UPDATE `команда_разработчиков` SET `Номер_работника` = $number_rabotnik, `Затраченное_количество_часов_на_работу` = $number_hours, `Номер_названия_команды` = $number_team_name WHERE `Номер_команды_разработчиков`=$number_team_development";
}
if ($name_table=='План') {
    $number_plan = $_POST['number_plan'];
    $name_plan = $_POST['name_plan'];
    $link_plan = $_POST['link_plan'];
    $sql = "UPDATE `план` SET `Название_плана` = '$name_plan', 
`Ссылка_на_файл_плана`= '$link_plan' WHERE `Номер_плана`=$number_plan";
}
if ($name_table=='Пользовательская_роль') {
    $number_user_role = $_POST['number_user_role'];
    $name_user_role = $_POST['name_user_role'];
    $sql = "UPDATE `пользовательская_роль` SET `Название_пользовательской_роли` = '$name_user_role' WHERE `Номер_пользовательской_роли`=$number_user_role";
}
if ($name_table=='Вид_функционала') {
    $number_function = $_POST['number_function'];
    $type_function = $_POST['type_function'];
    $sql = "UPDATE `вид_функционала` SET `Описание_функции`='$type_function' 
WHERE `Номер_функции`=$number_function";
}
if ($name_table=='Готовность_проекта') {
    $number_status_proj = $_POST['number_status_proj'];
    $name_status_proj = $_POST['name_status_proj'];
    $sql = "UPDATE `готовность_проекта` SET `Название_статуса_готовности_проекта`=
'$name_status_proj' WHERE `Номер_статуса_готовности_проекта`=$number_status_proj";
}
if ($name_table=='Набор_функционала') {
    $number_nabor_func = $_POST['number_nabor_function'];
    $number_function = $_POST['number_function'];
    $komment_to_function = $_POST['komment_to_function'];
    $number_name_nabor = $_POST['number_name_nabor'];
    $sql = "UPDATE `набор_функционала` SET `Номер_функции` = $number_function, `Комментарий_к_функционалу` = '$komment_to_function', `Код_названия_набора` = $number_name_nabor WHERE `Номер_набора_функционала`=$number_nabor_func";
}
if ($name_table=='Название_команды_разработчиков') {
    $number_name_team = $_POST['number_name_team'];
    $name_team = $_POST['name_team'];
    $sql = "UPDATE `название_команды_разработчиков` SET `Название_команды` = '$name_team' WHERE `Номер_названия_команды`=$number_name_team";
}
if ($name_table=='Название_набора') {
    $number_name_nabor = $_POST['number_name_nabor'];
    $name_nabor = $_POST['name_nabor'];
    $sql = "UPDATE `название_набора` SET `Название_набора`=
'$name_nabor' WHERE `Код_названия_набора`=$number_name_nabor";
}
if ($name_table=='Отдел') {
    $number_otdel = $_POST['number_otdel'];
    $name_otdel = $_POST['name_otdel'];
    $sql = "UPDATE `отдел` SET `Наименование_отдела`='$name_otdel' WHERE 
`Номер_отдела`=$number_otdel";
}
if ($name_table=='Отчёт') {
    $number_report = $_POST['number_report'];
    $name_report = $_POST['name_report'];
    $link_report = $_POST['link_report'];
    $sql = "UPDATE `отчёт` SET `Название_отчёта` = '$name_report', `Ссылка_на_файл_отчёта`='$link_report' WHERE 
`Номер_отчёта`=$number_report";
}
if ($name_table=='Работник') {
    $number_work = $_POST['number_work'];
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
    $sql = "UPDATE `работник` SET `Фамилия_работника` = '$surname_work', `Имя_работника` = '$name_work', `Отчество_работника` = '$last_name_work',`Количество_открытых_проектов` = $number_open_proj, `Номер_специализации` = $number_spec, `Номер_пользовательской_роли` = $number_role, `Номер_отдела` = $number_otdel,  `Номер_телефона` = '$phone_number', `E_Mail` = '$e_mail', `user_id` = $user_id, `Заработная_плата_в_час` = $cost_in_hour WHERE `Номер_работника`=$number_work";
}
if ($name_table=='Разработка') {
    $number_development = $_POST['number_development'];
    $link_development = $_POST['link_development'];
    $time_development = $_POST['time_development'];
    $link_maket = $_POST['link_maket'];
    $sql = "UPDATE `разработка` SET `Ссылка_на_отчёт_о_разработке` = '$link_development', `Затраченное_количество_часов_на_разработку` = $time_development, `Ссылка_на_макет` = '$link_maket' WHERE 
`Номер_разработки`=$number_development";
}
if ($name_table=='Специализация') {
    $number_spec = $_POST['number_spec'];
    $name_spec = $_POST['name_spec'];
    $sql = "UPDATE `специализация` SET `Название_специализации`='$name_spec'
WHERE `Номер_специализации`=$number_spec";
}
if ($name_table=='Тестирование') {
    $number_test = $_POST['number_test'];
    $link_test = $_POST['link_test'];
    $time_test = $_POST['time_test'];
    $sql = "UPDATE `тестирование` SET `Ссылка_на_отчёт_о_тестировании` = '$link_test', `Затраченное_количество_часов_на_тестирование` = $time_test WHERE 
`Номер_тестирования`=$number_test";
}
if ($name_table=='Техническое_задание') {
    $number_tz = $_POST['number_tz'];
    $number_rabotnik = $_POST['number_rabotnik'];
    $number_klient = $_POST['number_klient'];
    $komment_to_tz = $_POST['komment_to_tz'];
    $link_tz = $_POST['link_tz'];
    $number_name_nub_func = $_POST['number_name_nub_func'];
    $link_requirements = $_POST['link_requirements'];
    $sql = "UPDATE `техническое_задание` SET `Номер_работника` = $number_rabotnik,`Номер_клиента` = $number_klient,`Комментарий` = '$komment_to_tz',  `Ссылка_на_техническое_задание` = '$link_tz', `Код_названия_набора` = $number_name_nub_func, `Ссылка_на_файл_с_первоначальными_требованиями` = '$link_requirements' WHERE `Номер_технического_задания`=$number_tz";
}

if (mysqli_query($conn, $sql)) {
    echo "Данные успешно обновлены";
    include('update.html');
} else {
    echo "Ошибка при подключении к бд";
    include('index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>