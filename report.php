<meta charset="UTF-8">
<?php

if (!empty($_POST['report_selection'])) {
    if ($_POST['report_selection'] == "Отчёт_о_рентабельности") {
        include('profitability_report.html');
    }
    else if ($_POST['report_selection'] == "Отчёт_об_эффективности_работ") {
        include('effectivity_report.html');
    }
    else if ($_POST['report_selection'] == "План_работ") {
        include('work_plan.html');
    }
}


?>