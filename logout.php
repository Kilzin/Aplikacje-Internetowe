<?php
session_start();

// Zniszczenie sesji
session_destroy();

// Przekierowanie użytkownika do strony logowania
header("Location: login.php");
exit;
?>