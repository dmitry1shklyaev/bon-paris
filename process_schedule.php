<?php
// Подключение к базе данных
$mysqli = new mysqli("localhost", "root", "mysql", "saloon");

// Проверка соединения
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Получение данных из AJAX-запроса
$masterId = $_POST['masterId'];
$masterLogin = $_POST['masterLogin'];
$date = $_POST['date'];
$service = $_POST['service'];
$clientLogin = $_POST['clientLogin'];

// Ваш SQL-запрос для внесения данных в таблицу
$sql = "INSERT INTO schedule (master_id, master_login, date, service, client_login) VALUES ('$masterId', '$masterLogin', '$date', '$service', '$clientLogin')";

if ($mysqli->query($sql) === TRUE) {
    echo "Запись успешно добавлена";
} else {
    echo "Ошибка при добавлении записи: " . $mysqli->error;
}

// Закрытие соединения
$mysqli->close();
?>