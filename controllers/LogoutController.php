<?php
namespace Controllers;

class LogoutController {
    private $smarty;

    public function __construct($smarty) {
        $this->smarty = $smarty;
    }

    public function index() {
        session_start();
        session_destroy();
        header("Location: login/index");
        exit;
    }
}