<meta charset="UTF-8">
<?php
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

$number_dog = $_POST['number_dog'];
$new_number_tz = $_POST['new_number_tz'];
$new_number_state_proj = $_POST['new_number_state_proj'];
$new_name_prod = $_POST['new_name_prod'];

$sql = "UPDATE `договор` SET `Номер_технического_задания`=$new_number_tz,
`Номер_статуса_готовности_проекта`=$new_number_state_proj,
`Название_продукта`='$new_name_prod' WHERE `Номер_договора`=$number_dog";



if (mysqli_query($conn, $sql)) {
    echo "Данные успешно обновлены";
    include('C:\OpenServer\domains\localhost\BD_Proj\updte.html');
} else {
    echo "Ошибка при подключении к бд";
    include('C:\OpenServer\domains\localhost\BD_Proj\index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>