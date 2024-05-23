{extends file="layout.tpl"}

{block name="content"}
    <h1>Logowanie</h1>
    {if isset($error_message)}
        <p>{$error_message}</p>
    {/if}
    <form method="post">
        Nazwa użytkownika: <input type="text" name="username" required><br>
        Hasło: <input type="password" name="password" required><br>
        <input type="submit" value="Zaloguj">
    </form>
{/block}