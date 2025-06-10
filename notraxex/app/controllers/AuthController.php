<?php
class AuthController {
    public function login() {
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function register() {
        require_once __DIR__ . '/../views/auth/register.php';
    }

    public function logout() {
        session_destroy();
        header("Location: /notraxex/login");
        exit;
    }
}
?>
