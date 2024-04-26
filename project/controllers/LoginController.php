<?php
namespace Controllers;

class LoginController {
    private $smarty;

    public function __construct($smarty) {
        $this->smarty = $smarty;
    }

    public function index() {
        session_start();

        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
            header("Location: CalculatorController.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                if ($username === "admin" && $password === "password") {
                    $_SESSION["logged_in"] = true;
                    header("Location: CalculatorController.php");
                    exit;
                } else {
                    $error_message = "Błędne dane logowania. Spróbuj ponownie.";
                }
            } else {
                $error_message = "Proszę podać nazwę użytkownika i hasło.";
            }
        }

        $this->smarty->assign('error_message', isset($error_message) ? $error_message : '');
        $this->smarty->display('login.tpl');
    }
}
?>