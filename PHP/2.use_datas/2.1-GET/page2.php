<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page2</title>
</head>
<body>
    <a href="page1.php">Page1</a>

    <?php

    echo '<pre>';
    var_dump($_GET);
    echo '</pre>';

    if($_GET) 
    {
        echo $_GET["product"] . '<br>';
        echo $_GET["color"] . '<br>';
        echo $_GET["price"] . '<br>';
    }
        
    ?>

</body>
</html>