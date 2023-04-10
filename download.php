<meta charset="UTF-8">
<?php

if (isset($_POST['download_tz'])) {
    include('tz.html');
} else if (isset($_POST['download_dogovor'])) {
    include('dogovor.html');
}

?>