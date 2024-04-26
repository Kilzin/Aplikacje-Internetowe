<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="/views/css/style.css">
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
        {if isset($error_message)}
            <p class="error">{$error_message}</p>
        {/if}
    </div>
</body>
</html>