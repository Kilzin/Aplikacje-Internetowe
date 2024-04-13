<?php
session_start();

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    header("Location: kalkulator.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === "admin" && $password === "password") {
            $_SESSION["logged_in"] = true;
            header("Location: kalkulator.php");
            exit;
        } else {
            $error_message = "Błędne dane logowania. Spróbuj ponownie.";
        }
    } else {
        $error_message = "Proszę podać nazwę użytkownika i hasło.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Logowanie</h1>
        <form action="login.php" method="post">
            <label for="username">Użytkownik:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Zaloguj">
        </form>
        <?php if (isset($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>
    </div>
</body>
</html>