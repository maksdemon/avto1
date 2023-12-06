<?php

session_start();
if (!isset($_SESSION['username'])) {
    // Если сессия не существует, перенаправляем пользователя на страницу входа или выводим сообщение об ошибке
    header("Location: auth.php"); // Замените "login.php" на страницу вашей авторизации
    exit();
}

require('config/config.php');
require('template/odd.php');
// Переменные для хранения значений полей
$url = $notes = "";
$insertQuery = "";
$errors = array();
// Обработка отправленной формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка поля URL
    if (empty($_POST["url"])) {
        $errors["url"] = "URL is required";
    } else {
        $url = test_input($_POST["url"]);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $errors["url"] = "Invalid URL format";
        }
    }

    // Проверка поля заметок
    if (!empty($_POST["notes"])) {
        $notes = test_input($_POST["notes"]);
    }

    // Если нет ошибок, можно выполнять дополнительные действия, например, сохранение в базе данных
    if (empty($errors)) {
        $insertQuery = "INSERT INTO unput (urls,descr) VALUES ('$url', '$notes')";
        if (mysqli_query($mysqli, $insertQuery)) {
            // Успешное добавление
            $url = $notes = "";
            //   echo $insertQuery;
            echo "URL успешно добавлен!";
            // echo($errors);

            //echo($insertQuery);
        } else {
            // Ошибка при добавлении
            echo "Ошибка при добавлении URL: " . mysqli_error($mysqli);
        }
        // echo(mysqli_error($mysqli));


        //print_r($errors);
        ;
    }
    print_r($errors);
}
// Функция для обработки введенных данных
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//echo $insertQuery;

/*echo'<pre>';
print_r($result3);
echo '</pre>';
*/
?>
<!DOCTYPE html>
<?php
include 'template/header.php'; ?>

<body>
<div class="container">
    <?php
    include 'template/head_menu.php'; ?>


    <h2>Add URL and Notes</h2>
    <form method="post" action="<?php
    echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label class="url1" for="url">URL:</label>
        <input class="areas" type="text" name="url" value="<?php
        echo $url; ?>">
        <span class="error"><?php
            echo isset($errors["url"]) ? $errors["url"] : ""; ?></span>
        <br><br>
        <label for="notes">Заметка:</label>
        <textarea name="notes" rows="4" cols="50"><?php
            echo $notes; ?></textarea>
        <br><br>
        <input type="submit" name="submit" value="Добавить">
    </form>

</body>
</div>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>


</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
