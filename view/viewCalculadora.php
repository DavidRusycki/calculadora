<?php

/**
 * Monta o visor da calculadora.
 */
function montaVisor() {
    echo '<input type="text" name="visor" disabled value="'.$_SESSION['conta'].'"> <br>';
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>

    <form action="" method="POST">

        <?php montaVisor() ?>

        <input type="submit" value="1" name="numero">
        <input type="submit" value="2" name="numero">
        <input type="submit" value="3" name="numero">
        <input type="submit" value="+" name="operacao">
        <br>
        <input type="submit" value="4" name="numero">
        <input type="submit" value="5" name="numero">
        <input type="submit" value="6" name="numero">
        <input type="submit" value="-" name="operacao">
        <br>
        <input type="submit" value="7" name="numero">
        <input type="submit" value="8" name="numero">
        <input type="submit" value="9" name="numero">
        <input type="submit" value="/" name="operacao">
        <br>
        <input type="submit" value="0" name="numero">
        <input type="submit" value="C" name="clear">
        <input type="submit" value="=" name="igual">
        <input type="submit" value="*" name="operacao">

    </form>

</body>

</html>