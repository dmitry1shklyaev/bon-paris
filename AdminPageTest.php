<?php

use PHPUnit\Framework\TestCase;

class AdminPageTest extends TestCase
{
    public function testDatabaseDataIsDisplayed()
    {
        // Создаем объект mysqli и подключаемся к базе данных
        $mysqli = new mysqli("localhost", "root", "mysql", "saloon");

        // Проверяем соединение
        $this->assertTrue(!$mysqli->connect_error, "Connection failed: " . $mysqli->connect_error);

        // Запрос к базе данных
        $result = $mysqli->query("SELECT id, name, login, password FROM users WHERE id_role = 2");

        // Проверяем, что запрос выполнился успешно
        $this->assertTrue($result !== false, "Query execution failed: " . $mysqli->error);

        // Создаем объект DOMDocument и загружаем HTML страницу
        $dom = new DOMDocument();
        $dom->loadHTMLFile('admin_page.php');

        // Находим таблицу в HTML
        $table = $dom->getElementsByTagName('table')->item(0);

        // Получаем количество строк в таблице
        $rowCount = $table->getElementsByTagName('tr')->length;

        // Получаем количество строк в результате запроса
        $resultRowCount = $result->num_rows;

        // Проверяем, что количество строк в таблице соответствует количеству строк в результате запроса
        $this->assertEquals($rowCount, $resultRowCount, "Number of rows in the table does not match the result set");

        // Освобождаем ресурсы
        $result->free();

        // Закрываем соединение
        $mysqli->close();
    }
}