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

$sql = "DELETE FROM `договор` WHERE `Номер_договора`=$number_dog";



if (mysqli_query($conn, $sql)) {
    echo "Данные успешно удалены";
    include('C:\OpenServer\domains\localhost\BD_Proj\index.html');
} else {
    echo "Ошибка при подключении к бд";
    include('C:\OpenServer\domains\localhost\BD_Proj\index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>