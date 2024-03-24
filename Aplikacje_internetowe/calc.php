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
        
        <?php
        $kwota = $_POST["kwota"];
        $oprocentowanie = $_POST["oprocentowanie"] / 100; 
        $okres = $_POST["okres"] * 12; 
        
        $rata = ($kwota * ($oprocentowanie / 12)) / (1 - pow(1 + ($oprocentowanie / 12), -$okres));
        
        $suma = $rata * $okres;
        
        echo "<h2>Podsumowanie</h2>";
        echo "<h3>Miesięczna rata: " . number_format($rata, 2) . " zł</h3>";
        echo "<h3>Całkowita kwota do spłaty: " . number_format($suma, 2) . " zł</h3> ";
    ?>
    </div>
</body>
</html>