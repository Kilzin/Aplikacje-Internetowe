<?php
session_start();
require_once('smarty/Smarty.class.php');

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // Jeśli użytkownik nie jest zalogowany, przekierowanie do formularza logowania
    header("Location: login.php");
    exit;
}

// Tworzenie obiektu Smarty
$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sprawdzenie, czy wszystkie pola formularza są ustawione
    if (isset($_POST['kwota']) && isset($_POST['oprocentowanie']) && isset($_POST['okres'])) {
        // Pobranie wartości z formularza
        $kwota = floatval($_POST['kwota']);
        $oprocentowanie = floatval($_POST['oprocentowanie']);
        $okres = intval($_POST['okres']);

        // Obliczenie miesięcznej raty kredytu
        $oprocentowanie_miesieczne = $oprocentowanie / 100 / 12;
        $ilosc_rat = $okres * 12;
        $rata = ($kwota * $oprocentowanie_miesieczne) / (1 - pow(1 + $oprocentowanie_miesieczne, -$ilosc_rat));

        // Zaokrąglenie do dwóch miejsc po przecinku
        $rata = round($rata, 2);

        // Przekazanie wyniku do szablonu Smarty
        $smarty->assign('rata', $rata);
    } else {
        // Jeśli nie wszystkie pola formularza zostały przesłane, ustaw komunikat błędu
        $error_message = "Proszę wypełnić wszystkie pola formularza.";
        $smarty->assign('error_message', $error_message);
    }
}

// Wyświetlenie szablonu
$smarty->assign('logout_link', 'logout.php'); // Przekazanie linku do wylogowania
$smarty->display('calculator.tpl');
?>