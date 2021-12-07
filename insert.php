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

$number_tz = $_POST['number_tz'];
$number_state_proj = $_POST['number_state_proj'];
$name_prod = $_POST['name_prod'];
$sql = "INSERT INTO `договор`(`Номер_технического_задания`, 
`Номер_статуса_готовности_проекта`, `Название_продукта`) VALUES 
($number_tz,$number_state_proj,'$name_prod')";



if (mysqli_query($conn, $sql)) {
    echo "Данные успешно добавлены";
    include('C:\OpenServer\domains\localhost\BD_Proj\index_add.html');
} else {
    echo "Ошибка при подключении к бд";
    include('C:\OpenServer\domains\localhost\BD_Proj\index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>