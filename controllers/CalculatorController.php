<?php
namespace Controllers;

use Core\Database;

class CalculatorController {
    private $smarty;

    public function __construct($smarty) {
        $this->smarty = $smarty;
    }

    public function index() {
        session_start();

        if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
            header("Location: login/index");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $kwota = $_POST['kwota'];
            $oprocentowanie = $_POST['oprocentowanie'];
            $okres = $_POST['okres'];

            $result = $this->calculate($kwota, $oprocentowanie, $okres);

            $this->smarty->assign('result', $result);
        }

        $this->smarty->display('calculator.tpl');
    }

    private function calculate($kwota, $oprocentowanie, $okres) {
        // Logika kalkulacji
        $result = $kwota * (1 + ($oprocentowanie / 100) * $okres);
        return $result;
    }
}