<meta charset="UTF-8">
<?php

if (isset($_POST['requirements_textarea'])) {
        $file = "requirements.txt";
        $text = $_POST['requirements_textarea'];
        file_put_contents($file, $text);
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"". basename($file) ."\"");
        readfile ($file);
        exit();
}
else if ((!empty($_POST['development_textarea_1'])) || (!empty($_POST['development_textarea_2']))) {
    $file = "develop.txt";
	$header1 = "Информация о выполненных пунктах из ТЗ:\n";
    $text1 = $_POST['development_textarea_1'] . "\n";
	$header2 = "Иная информация:\n";
	$text2 = $_POST['development_textarea_2'] . "\n";
    file_put_contents($file, $header1);
	file_put_contents($file, $text1, FILE_APPEND);
	file_put_contents($file, $header2, FILE_APPEND);
	file_put_contents($file, $text2, FILE_APPEND);
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"". basename($file) ."\"");
    readfile ($file);
    exit();
}

?>