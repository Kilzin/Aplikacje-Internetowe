<?php
namespace Controllers;

class CalculatorController {
    private $smarty;

    public function __construct($smarty) {
        $this->smarty = $smarty;
    }

    public function index() {
        session_start();

        if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
            header("Location: LoginController.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Przetwarzanie danych z formularza kalkulatora
            // ...
            // Przekierowanie lub wyświetlenie wyników
        }

        $this->smarty->display('calculator.tpl');
    }
}
?>