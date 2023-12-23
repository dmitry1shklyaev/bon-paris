<?php
class LoginProcessTest extends PHPUnit\Framework\TestCase
{
    public function testSessionStartCalled()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['username'] = 'admin';
        $_POST['password'] = 'admin';
        $_POST['role'] = 'administrator';
        require_once 'login_process.php';
        $this->assertEquals(PHP_SESSION_ACTIVE, session_status());
    }
}