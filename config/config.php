<?php



$mysqli = new mysqli('62.109.2.72', 'avtoparser', '7xXD2rN9i', 'avto1');

if ($mysqli->connect_error) {
    echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
} else {
    echo 'Connection established';
}

$sql=mysqli_query($mysqli,"SELECT DISTINCT name FROM avto1");
//$result=mysqli_fetch_assoc($sql);
//$result=mysqli_fetch_all($sql);
//print_r($result);
$sql2=mysqli_query($mysqli,"SELECT *  FROM avto1 LIMIT 5 ");
$result2 = mysqli_fetch_all($sql2, MYSQLI_ASSOC);

$sql3=mysqli_query($mysqli," SELECT DATE(date) AS date_day, AVG(price) AS avg_price, name, art, category, countdown, id
FROM avto1
WHERE name = 'VAG 04E-109119F'
GROUP BY DATE(date_day), name, art, category, countdown, id;");



$result3 = mysqli_fetch_all($sql3, MYSQLI_ASSOC);


$count = 0;
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}
$result_array = array();
$count1=0;
while ($row = mysqli_fetch_assoc($sql)&& $count1=0) {
    $result_array[] = $row;
    $count1++;
}













/*

        // Create Connection
    //$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn = mysqli_connect('62.109.2.72', 'avtoparser', '7xXD2rN9i', 'avto1');
    // Check Connection
    if(mysqli_connect_errno()){
        // Connection Failed
        echo 'Failed to connect to MySQL '. mysqli_connect_errno();
    }
    else{
        echo 'соединение установлено ';
    }
*/
