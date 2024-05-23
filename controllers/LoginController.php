<?php
namespace Controllers;

use Core\Database;

class LoginController {
    private $smarty;

    public function __construct($smarty) {
        $this->smarty = $smarty;
    }

    public function index() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->authenticate($username, $password)) {
                $_SESSION["logged_in"] = true;
                header("Location: calculator/index");
                exit;
            } else {
                $this->smarty->assign('error_message', 'Nieprawidłowe dane logowania');
            }
        }

        $this->smarty->display('login.tpl');
    }

    private function authenticate($username, $password) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $stmt->execute(['username' => $username, 'password' => $password]);

        return $stmt->fetch() !== false;
    }
}