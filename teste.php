<?php
$bike = isset($_POST['bike']);
$car = isset($_POST['car']);
// check BIKE

if (!empty($bike) && !empty($car)) {
    echo "CARA TA TURBINADO";
}

else if (!empty($bike)) {
    echo "MONARK";
} 

// check Car
else if (isset($_POST['car'])) {
    echo "HONDA CIVIC";
}
else if (empty($bike) && empty($car)) {
    echo "CAMINHAR É BOM";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Form de exemplo com checkboxes</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form action="" method="post">
            <p>
                <input type="checkbox" name="bike" value="on">I have a bike
            </p>
            <p>
                <input type="checkbox" name="car" value="on">I have a car
            </p>
            <p>
                <input type="submit" value="Submit me!" />
            </p>
        </form>
    </body>
</html>