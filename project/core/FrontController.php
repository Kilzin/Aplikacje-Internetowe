<?php
namespace Core;

require_once __DIR__ . '/../vendor/smarty/libs/Smarty.class.php';

class FrontController {
    private $smarty;

    public function __construct() {
        // Tutaj możesz umieścić kod inicjalizacji, np. inicjalizację sesji, połączenie z bazą danych, itp.
        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../templates/');
        $this->smarty->setCompileDir(__DIR__ . '/../templates_c/');
        // Dodaj inne niezbędne inicjalizacje...
    }

    public function run() {
        // Tutaj obsługuj żądania użytkownika, np. routuj do odpowiednich kontrolerów i akcji
        $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'LoginController';
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        $controllerClass = "\\Controllers\\$controllerName";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass($this->smarty);
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                // Obsługa braku metody
                echo "Metoda akcji nie istnieje!";
            }
        } else {
            // Obsługa braku kontrolera
            echo "Kontroler nie istnieje!";
        }
    }
}
?>