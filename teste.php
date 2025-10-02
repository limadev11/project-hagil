<?php

/**
 * Aqui teríamos algum código para
 * recuperar de uma fonte de dados
 * as informações do formulário.
 *
 * Utilizaremos o código abaixo, apenas como fins ilustrativo,
 * imaginando que ele vem de alguma fonte.
 */
$bike = (bool) rand(0, 1) ? "checked" : null;
$car  = (bool) rand(0, 1) ? "checked" : null;

if isset(($_POST['submit'])) {

    echo ""
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Form de exemplo com checkboxes</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post">
            <p>
                <input type="checkbox" name="bike" value="on" <?php echo $bike; ?> >I have a bike
            </p>
            <p>
                <input type="checkbox" name="car" value="on" <?php echo $car; ?> >I have a car
            </p>
            <p>
                <input type="submit" value="Submit me!" />
            </p>
        </form>
    </body>
</html>