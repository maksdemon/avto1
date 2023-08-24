<?php

$mysqli = new mysqli('62.109.2.72', 'avtoparser', '7xXD2rN9i', 'avto1');
if ($mysqli->connect_error) {
    echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
} else {
    echo 'Connection established';
}

$sql=mysqli_query($mysqli,"SELECT DISTINCT name FROM avto1");

$sql2=mysqli_query($mysqli,"SELECT *  FROM avto1 LIMIT 5 ");
$result2 = mysqli_fetch_all($sql2, MYSQLI_ASSOC);


// Здесь выполните ваш запрос с использованием $selectedName вместо жестко заданного значения 'VAG 04E-145299N'



$sql4 = mysqli_query($mysqli, "SELECT
        MIN(price) AS min_price,
        DATE(date) AS start_date
    FROM
        avto1
    WHERE
        name = 'BREMBO P85126X'
    GROUP BY
        FLOOR(DATEDIFF(date, (SELECT MIN(date) FROM avto1 WHERE name = 'BREMBO P85126X')) / 3)
    ORDER BY
        start_date;
    ");









    $result4 = mysqli_fetch_all($sql4, MYSQLI_ASSOC);

foreach ($result4 as $row) {
    echo "Start Date: " . $row['start_date'] . ", Min Price: " . $row['min_price'] . "<br>";
}















