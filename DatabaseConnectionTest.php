<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function testDatabaseConnection()
    {
        // Подготовка параметров соединения с базой данных
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        $dbname = "saloon";

        // Попытка соединения с базой данных
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Проверка соединения и вывод результата теста
        $this->assertTrue(!$conn->connect_error, 'Could not connect to the database: ' . $conn->connect_error);

        // Закрытие соединения
        $conn->close();
    }
}

?>