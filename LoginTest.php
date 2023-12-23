<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testLoginFormFieldsNotEmpty()
    {
        // HTML-код формы
        $html = file_get_contents('login_page.php');

        // Находим позиции для поиска
        $usernamePosition = strpos($html, 'id="username"');
        $passwordPosition = strpos($html, 'id="password"');

        // Получаем значения из HTML-кода
        $usernameValue = $this->getFieldValue($html, $usernamePosition);
        $passwordValue = $this->getFieldValue($html, $passwordPosition);

        // Assert, что значения не пусты
        $this->assertNotEmpty($usernameValue, 'Username should not be empty');
        $this->assertNotEmpty($passwordValue, 'Password should not be empty');
    }

    private function getFieldValue($html, $position)
    {
        // Находим ближайший input после позиции
        $inputPosition = strpos($html, '<input', $position);

        // Находим значение атрибута value
        $valueStart = strpos($html, 'value="', $inputPosition) + 7;
        $valueEnd = strpos($html, '"', $valueStart);

        // Получаем значение
        return substr($html, $valueStart, $valueEnd - $valueStart);
    }
}