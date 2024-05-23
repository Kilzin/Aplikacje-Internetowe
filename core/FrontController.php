<?php
namespace Core;

class FrontController {
    private $smarty;

    public function __construct() {
        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../templates/');
        $this->smarty->setCompileDir(__DIR__ . '/../templates_c/');
        $this->smarty->setCacheDir(__DIR__ . '/../cache/');
    }

    public function run() {
        session_start();

        $url = isset($_GET['url']) ? $_GET['url'] : 'login/index';
        list($controllerName, $action) = explode('/', $url);

        $controllerName = ucfirst($controllerName) . 'Controller';
        $controllerClass = "\\Controllers\\$controllerName";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass($this->smarty);
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                echo "Metoda akcji nie istnieje!";
            }
        } else {
            echo "Kontroler nie istnieje!";
        }
    }
}