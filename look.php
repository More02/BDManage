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
            . "</th><th>" . "Название_продукта"
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


    include('C:\OpenServer\domains\localhost\BD_Proj\look.html');

} else {
    echo "Ошибка при подключении к бд";
    include('C:\OpenServer\domains\localhost\BD_Proj\index2.html');
    printf(mysqli_error($conn));
}

mysqli_close($conn);

?>