<?php
use PHPUnit\Framework\TestCase;

class MasterRegistrationTest extends TestCase
{
    public function testRegistrationWithNullValues()
    {
        $_POST = [
            'masterLogin' => null,
            'masterPassword' => null,
            'topMasterCheckbox' => null,
        ];
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $this->expectOutputString("Ошибка при регистрации: Column 'login' cannot be null");

        include 'master_add.php';
    }

    public function testRegistrationWithLargeValues()
    {
        $_POST = [
            'masterLogin' => 'very_long_master_login_string_that_exceeds_the_limit',
            'masterPassword' => 'very_long_master_password_string_that_exceeds_the_limit',
            'topMasterCheckbox' => 1,
        ];
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $this->expectOutputRegex('/^Ошибка при регистрации: .+$/');

        include 'master_add.php';
    }

    public function testRegistrationWithValidValues()
    {
        $_POST = [
            'masterLogin' => 'test_master',
            'masterPassword' => 'test_password',
            'topMasterCheckbox' => 1,
        ];
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $this->expectOutputString("Регистрация прошла успешно!<br><a class='btn btn-primary' href='admin_page.php'>Возврат на сайт</a>");

        include 'master_add.php';
    }
}