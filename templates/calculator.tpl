{extends file="layout.tpl"}

{block name="content"}
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
    <a href="logout/index" class="logout-link">Wyloguj</a>
{/block}