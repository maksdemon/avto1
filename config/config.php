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
