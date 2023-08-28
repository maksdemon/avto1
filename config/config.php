<?php



$mysqli = new mysqli('62.109.2.72', 'avtoparser', '7xXD2rN9i', 'avto1');

if ($mysqli->connect_error) {
    echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
} else {
    echo 'Connection established1';
}
//для даты min
$sqlStartDate = "SELECT MIN(date) AS start_date FROM avto1";
$resultStartDate = mysqli_query($mysqli, $sqlStartDate);
$rowStartDate = mysqli_fetch_assoc($resultStartDate);
$start_date = $rowStartDate['start_date'];



$sql=mysqli_query($mysqli,"SELECT name, category FROM avto1 GROUP BY name, category");
//$result=mysqli_fetch_assoc($sql);
//$result=mysqli_fetch_all($sql);
//print_r($result);
$sql2=mysqli_query($mysqli,"SELECT *  FROM avto1 LIMIT 5 ");
$result2 = mysqli_fetch_all($sql2, MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["selectedName"])) {
        $selectedName = $_POST["selectedName"];
        $sql3 = mysqli_query($mysqli, "SELECT
            DATE(date) AS date_day,
            AVG(price) AS avg_price,
            (SELECT AVG(avg_price) FROM (
                SELECT AVG(price) AS avg_price
                FROM avto1
                WHERE name = '$selectedName'
                GROUP BY DATE(date)
            ) AS subquery) AS overall_avg_price
        FROM avto1
        WHERE name = '$selectedName'
        GROUP BY DATE(date);");

        $result3 = mysqli_fetch_all($sql3, MYSQLI_ASSOC);
    }

    if (isset($_POST["selectedNamemin"])) {
        $selectedNamemin = $_POST["selectedNamemin"];
        $sql4 = mysqli_query($mysqli, "SELECT
        MIN(price) AS min_price,
        DATE(date) AS start_date
    FROM
        avto1
    WHERE
        name = '$selectedNamemin'
    GROUP BY
        FLOOR(DATEDIFF(date, (SELECT MIN(date) FROM avto1 WHERE name = '$selectedNamemin')) / 3)
    ORDER BY
        start_date;
    ");

        $result4 = mysqli_fetch_all($sql4, MYSQLI_ASSOC);
    }

}

// Дальше можете использовать $result3 и $result4 для вывода данных в HTML или другие действия

?>
