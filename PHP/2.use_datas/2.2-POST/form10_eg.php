<?php

    # EXERCISE: Create a form to select few products (t-shirt, shoes, hat, socks, jewels) + the price + the size (select: xs, s , m, l , xl). When we send the result, go on form11.php to display the info on the page. Then on page form11.php, create a submit solution to send arguments in form10.php in order to display a nice message ! 

    echo '<pre>';
    print_r($_GET);
    var_dump($_GET);
    echo '</pre>';

    if(isset($_GET['success']))
    {
        echo "<div style='background:green; color:white;'>Thank you for buying this product !</div>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form10</title>
</head>
<body>
    <h1>Form 10</h1>

    <form action="form11_eg.php" method="get">
        <select name="product" id="">
            <option value="tshirt">t-shirt</option>
            <option value="shoes">shoes</option>
            <option value="hat">hat</option>
            <option value="socks">Loafer socks</option>
            <option value="jwls">jewels</option>
        </select>
        <input type="text" name="price" id="">
        <select name="size" id="">
            <option value="xs">XS</option>
            <option value="s">S</option>
            <option value="m">M</option>
            <option value="l">L</option>
            <option value="xl">XL</option>
        </select>
        <input type="submit" value="Send it">
    </form>
</body>
</html>