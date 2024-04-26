<?php
require_once __DIR__ . '/../core/FrontController.php';
require_once __DIR__ . '/../core/autoload.php';

use Core\FrontController;

$frontController = new FrontController();
$frontController->run();