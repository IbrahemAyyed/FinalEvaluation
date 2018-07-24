<?php

// var_dump($_GET);

if($_GET)
{
    echo $_GET['product'] . " - ";
    echo $_GET['price'] . " - ";
    echo $_GET['size'];
}

?>

<a href="form10_eg.php?success"><button type="submit">Buy it</button></a>