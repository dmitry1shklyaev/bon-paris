<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Подключение к базе данных
    $mysqli = new mysqli("localhost", "root", "mysql", "saloon");

    // Проверка соединения
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Получение данных из формы
    $login = $_POST["masterLogin"];
    $password = $_POST["masterPassword"];
    $isTop = isset($_POST["topMasterCheckbox"]) ? 1 : 0; // Если чекбокс отмечен, устанавливаем 1, иначе 0

    // Убедитесь, что вы определили переменные $id_role и $name, например:
    $id_role = 1; // Значение по умолчанию
    $name = "";  // Пустая строка или укажите значение по умолчанию

    // Подготовка и выполнение запроса
    $stmt = $mysqli->prepare("INSERT INTO users (login, password, id_role, isTop, name) VALUES (?, ?, ?, ?, ?)");



        // Закрытие соединения
        $stmt->close();
    } else {
        echo "Ошибка при подготовке запроса: " . $mysqli->error;
    }

    $mysqli->close();
}
?>