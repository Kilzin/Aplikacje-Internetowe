<?php
/* Smarty version 4.3.2, created on 2024-04-13 14:30:44
  from 'C:\xampp\htdocs\test\templates\calculator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_661a7af4478411_86853869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a24ad250c559568791d2f3287f33fc11926f8ffc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\templates\\calculator.tpl',
      1 => 1713011439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661a7af4478411_86853869 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
        <?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
            <p>Wynik: <?php echo $_smarty_tpl->tpl_vars['result']->value;?>
</p>
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['logout_link']->value;?>
" class="logout-link">Wyloguj</a> <!-- Dodany odnośnik do wylogowania z klasą logout-link -->
    </div>
</body>
</html><?php }
}
