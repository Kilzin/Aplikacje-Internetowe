<?php
namespace Controllers;

class LogoutController {
    public function __construct() {
        // Inicjalizacja
    }

    public function index() {
        session_start();
        session_destroy();
        header("Location: LoginController.php");
        exit;
    }
}
?>