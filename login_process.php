<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем введенные данные
    $login = $_POST["username"];
    $password = $_POST["password"];
    $selectedRole = $_POST["role"];

    if (empty($login) || empty($password) || $selectedRole === "empty") {
        echo("Пожалуйста, заполните все поля!");
        exit;
    }

    // Подключение к базе данных
    $mysqli = new mysqli("localhost", "root", "mysql", "saloon");

    // Проверка соединения
    if ($mysqli->connect_error) {
        die("Ошибка подключения: " . $mysqli->connect_error);
    }

    // Определение ID роли
    switch ($selectedRole) {
        case "administrator":
            $roleId = 0;
            break;
        case "client":
            $roleId = 2;
            break;
        case "master":
            $roleId = 1;
            break;
        default:
            echo "Неверная роль.";
            exit;
    }

    // Подготовка и выполнение запроса
    $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password' AND id_role = $roleId";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        // Успешная авторизация
        switch ($selectedRole) {
            case "master":
                header("Location: /master_page.php");
                break;
            case "administrator":
                header("Location: /admin_page.php");
                break;
            case "client":
                header("Location: /client_page.php");
                break;
            default:
                echo "Неверная роль.";
                exit;
        }
    } else {
        echo "Неверный логин, пароль или роль.";
    }

    // Закрытие соединения
    $mysqli->close();
}
?>