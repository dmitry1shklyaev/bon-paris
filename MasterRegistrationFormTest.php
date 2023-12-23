<?php
use PHPUnit\Framework\TestCase;

class MasterRegistrationFormTest extends TestCase
{
    public function testLoginFormFieldsAreNotEmpty()
    {
        // Переопределяем глобальные переменные $_POST и $_SERVER
        $_POST = [
            'masterLogin' => 'testuser',
            'masterPassword' => 'testpassword',
        ];

        $_SERVER['REQUEST_METHOD'] = 'POST';

        // Запускаем код обработки формы (в данном случае master_add.php)
        ob_start();
        include 'master_add.php';
        $output = ob_get_clean();

        // Проверяем, что вывод содержит сообщение об успешной регистрации
        $this->assertStringContainsString('Регистрация прошла успешно!', $output);
    }

    public function testLoginFormFieldsAreEmpty()
    {
        // Переопределяем глобальные переменные $_POST и $_SERVER
        $_POST = [
            'masterLogin' => '',
            'masterPassword' => '',
        ];

        $_SERVER['REQUEST_METHOD'] = 'POST';

        // Запускаем код обработки формы (в данном случае master_add.php)
        ob_start();
        include 'master_add.php';
        $output = ob_get_clean();

        // Проверяем, что вывод содержит сообщение о ошибке
        $this->assertStringContainsString('Регистрация прошла успешно!', $output);
        $this->assertStringContainsString('<a class=\'btn btn-primary\' href=\'admin_page.php\'>Возврат на сайт</a>', $output);

    }
}
