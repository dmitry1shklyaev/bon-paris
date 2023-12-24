<?php
// Параметры для доступа к базе данных
$hostname = "localhost";
$username = "root";
$password = "mysql";
$database = "saloon";

// Подключение к базе данных
$mysqli = new mysqli($hostname, $username, $password, $database);

// Проверка соединения на ошибки
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

$registration_successful = false;
$login_error = false;

// Обработка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем значения из формы
    $name = $_POST["name"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $id_role = 2; // Задаем желаемый id_role

    // Проверка уникальности логина
    $check_login_sql = "SELECT COUNT(*) FROM users WHERE login = ?";

    if ($check_login_stmt = $mysqli->prepare($check_login_sql)) {
        $check_login_stmt->bind_param("s", $login);
        $check_login_stmt->execute();
        $check_login_stmt->bind_result($login_count);
        $check_login_stmt->fetch();
        $check_login_stmt->close();

        if ($login_count > 0) {
            $login_error = true;
        } else {
            // Подготовка SQL-запроса для вставки данных в таблицу users
            $insert_sql = "INSERT INTO users (id_role, login, password, name) VALUES (?, ?, ?, ?)";

            // Подготовка и выполнение запроса
            if ($insert_stmt = $mysqli->prepare($insert_sql)) {
                $insert_stmt->bind_param("isss", $id_role, $login, $password, $name);

                // Выполнение запроса
                if ($insert_stmt->execute()) {
                    $registration_successful = true;
                } else {
                    echo "Ошибка при выполнении запроса: " . $insert_stmt->error;
                }

                // Закрытие подготовленного запроса
                $insert_stmt->close();
            } else {
                echo "Ошибка при подготовке запроса: " . $mysqli->error;
            }
        }
    } else {
        echo "Ошибка при подготовке запроса: " . $mysqli->error;
    }

    // Закрытие соединения с базой данных
    $mysqli->close();
}
?>