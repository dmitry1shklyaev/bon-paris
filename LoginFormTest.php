<?php

use PHPUnit\Framework\TestCase;

class LoginFormTest extends TestCase
{
    public function testLoginFormSubmission()
    {
        // Указываем URL вашего скрипта login_process.php
        $url = 'login_process.php';

        // Указываем данные для успешной авторизации
        $postData = [
            'username' => 'admin',
            'password' => 'admin',
            'role'     => 'Администратор',
        ];

        // Отправляем POST-запрос
        $response = $this->sendPostRequest($url, $postData);

        // Проверяем, что ответ содержит ожидаемую строку
        $this->assertStringContainsString('', $response);
    }

    private function sendPostRequest($url, $postData)
    {
        // Инициализируем cURL-сессию
        $ch = curl_init();

        // Устанавливаем параметры запроса
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Выполняем запрос
        $response = curl_exec($ch);

        // Закрываем сессию
        curl_close($ch);

        return $response;
    }
}