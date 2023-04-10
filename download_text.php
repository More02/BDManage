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
else if (!empty($_POST['development_textarea'])) {
    $file = "develop.txt";
    $text = $_POST['development_textarea'];
    file_put_contents($file, $text);
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"". basename($file) ."\"");
    readfile ($file);
    exit();
}

?>