<?php
require('config/config.php');
require('template/odd.php');

if (isset($_POST['selectedNamemin'])) {
    $_SESSION['selectedNamemin'] = $_POST['selectedNamemin'];
}

// Здесь можно получить значение $row['name']
if (isset($_GET['name'])) {
    $elementrow = $_GET['name'];
    // Теперь у вас есть $elementrow, которое можно использовать в SQL-запросе
    $sqldatepop = "SELECT DATE(date) AS date_day, AVG(price) AS avg_price
                   FROM avto1
                   WHERE NAME = '$elementrow'
                   GROUP BY DATE(date)";

    $resultStartpop = mysqli_query($mysqli, $sqldatepop);

    if (!empty($resultStartpop)) {
        $rowsStartpop = mysqli_fetch_all($resultStartpop, MYSQLI_ASSOC);
        // Здесь вы можете обработать результаты запроса
        foreach ($rowsStartpop as $popRow) {
            // Здесь можно использовать $popRow['date_day'] и $popRow['avg_price']
        }
    } else {
        echo "Массив данных пуст.";
    }
}
?>
