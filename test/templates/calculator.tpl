<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Kalkulator kredytowy</h1>
        <form method="post">
            Kwota kredytu: <input type="number" name="kwota" required><br>
            Oprocentowanie (w %): <input type="number" name="oprocentowanie" step="0.01" required><br>
            Okres spłaty (w latach): <input type="number" name="okres" required><br>
            <input type="submit" value="Oblicz">
        </form>
        {if isset($result)}
            <p>Wynik: {$result}</p>
        {/if}
        <a href="{$logout_link}" class="logout-link">Wyloguj</a> <!-- Dodany odnośnik do wylogowania z klasą logout-link -->
    </div>
</body>
</html>