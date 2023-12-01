<?php
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, что данные присутствуют и не пустые
    if (isset($_POST["fname"]) && !empty($_POST["fname"]) && isset($_POST["parol"]) && !empty($_POST["parol"])) {
        $fname = $_POST["fname"];
        $password = $_POST["parol"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $pdo = new mysqli('62.109.2.72', 'avtoparser', '7xXD2rN9i', 'avto1');

        // Проверка, существует ли пользователь с таким именем
        $check_stmt = $pdo->prepare("SELECT name FROM user WHERE name = ?");
        if ($check_stmt) {
            $check_stmt->bind_param("s", $fname);
            $check_stmt->execute();
            $check_stmt->store_result();

            if ($check_stmt->num_rows > 0) {
                echo "Пользователь с именем '$fname' уже существует!";
            } else {
                // Подготовленный запрос для добавления пользователя
                $insert_stmt = $pdo->prepare("INSERT INTO user (name, password) VALUES (?, ?)");
                if ($insert_stmt) {
                    $insert_stmt->bind_param("ss", $fname, $hashed_password);
                    $insert_stmt->execute();

                    if ($insert_stmt->affected_rows > 0) {
                        echo "Пользователь успешно добавлен!";
                    } else {
                        echo "Ошибка при добавлении пользователя!";
                    }
                } else {
                    echo "Ошибка при подготовке запроса добавления пользователя: " . $pdo->error;
                }
            }
        } else {
            echo "Ошибка при подготовке запроса проверки пользователя: " . $pdo->error;
        }

        // Закрытие запросов и соединения с базой данных
        if (isset($check_stmt)) {
            $check_stmt->close();
        }
        if (isset($insert_stmt)) {
            $insert_stmt->close();
        }
        $pdo->close();
    } else {
        echo "Ошибка: Поля не заполнены!";
    }
} else {
    echo "Ошибка: данные не были отправлены методом POST.";
}



/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, что данные присутствуют и не пустые
    if (isset($_POST["fname"]) && !empty($_POST["fname"]) && isset($_POST["parol"]) && !empty($_POST["parol"])) {
        // Получаем данные из формы
        $fname = $_POST["fname"];
        $password = $_POST["parol"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $pdo = new mysqli('62.109.2.72', 'avtoparser', '7xXD2rN9i', 'avto1');

        // Подготовленный запрос для добавления пользователя, если имя не существует в базе
        $stmt = $pdo->prepare("INSERT INTO user (name, password) SELECT ?, ? FROM DUAL WHERE NOT EXISTS (SELECT name FROM user WHERE name = ?)");

        if ($stmt) {
            $stmt->bind_param("sss", $fname, $hashed_password, $fname);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Пользователь успешно добавлен!";
            } else {
                echo "Пользователь с именем '$fname' уже существует!";
            }
        } else {
            echo "Ошибка при подготовке запроса: " . $pdo->error;
        }

        // Очистка результата запроса
        $stmt->close();
    } else {
        echo "Ошибка: Поля не заполнены!";
    }
} else {
    echo "Ошибка: данные не были отправлены методом POST.";
}
*/

/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Проверяем, что данные присутствуют и не пустые
if (isset($_POST["fname"]) && !empty($_POST["fname"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
// Получаем данные из формы
$fname = $_POST["fname"];
$password = $_POST["password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $pdo = new mysqli('62.109.2.72', 'avtoparser', '7xXD2rN9i', 'avto1');
     $stmt = $pdo->prepare("INSERT INTO user (name, password) VALUES (?, ?)");
    // Проверка подготовленного запроса
    if ($stmt) {
        $stmt->bind_param("ss", $fname, $hashed_password);
        $stmt->execute();
        // Другая логика, если запрос выполнен успешно
    } else {
        echo "Ошибка при подготовке запроса: " . $pdo->error;
        // Здесь может быть логика обработки ошибки подготовки запроса
    }

// Выводим данные (можно заменить этот блок кодом обработки данных)
echo "Привет, $fname!<br>";
echo "Твой пароль: $password";
// Здесь можно выполнять другие действия, например, сохранять данные в базу данных
} else {
echo "Ошибка: Поля не заполнены!.";
}
} else {
echo "Ошибка: данные не были отправлены методом POST.";
}*/