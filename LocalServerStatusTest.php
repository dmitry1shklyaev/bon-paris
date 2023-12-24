<?php

use PHPUnit\Framework\TestCase;

class LocalServerStatusTest extends TestCase
{
    /**
     * Тест проверяет доступность локального сервера AMPPS.
     */
    public function testLocalServerIsAccessible()
    {
        // Задаем адрес и порт локального сервера AMPPS
        $serverAddress = 'http://localhost';
        $serverPort = 80;

        // Формируем полный URL сервера
        $serverUrl = $serverAddress . ':' . $serverPort;

        // Проверяем доступность сервера
        $this->assertTrue($this->checkServerAvailability($serverUrl), 'Локальный сервер недоступен');
    }

    /**
     * Проверяет доступность сервера.
     *
     * @param string $url URL сервера.
     * @return bool
     */
    private function checkServerAvailability($url)
    {
        // Пытаемся получить заголовки сервера
        $headers = @get_headers($url);

        // Возвращаем true, если заголовки получены и статус "200 OK"
        return $headers && strpos($headers[0], '200') !== false;
    }
}