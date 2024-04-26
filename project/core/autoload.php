<?php
spl_autoload_register(function ($class) {
    // Mapowanie przestrzeni nazw na ścieżkę do pliku
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . '/../' . $class . '.php';

    // Sprawdzenie istnienia pliku i załączenie go
    if (file_exists($file)) {
        require_once $file;
    }
});
?>