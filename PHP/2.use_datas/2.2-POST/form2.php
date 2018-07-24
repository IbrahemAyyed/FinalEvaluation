<?php

# EXERCISE: create a form with city + zip_code + address AND display the info as form1.php

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    if($_POST) 
    {
        echo "Address : " . $_POST['address'] . "<br>";
        echo "City : " . $_POST['city'] . "<br>";
        echo "Zip code : " . $_POST['zc'] . "<br><hr>";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form2</title>
</head>
<body>
    <h1>Form 2</h1>

    <form action="" method='post'>
        <div>
            <label for="city">City</label>
        </div>
        <div>
            <input type="text" name="city" id="city">
        </div>
        <div>
            <label for="zc">Zip code</label>
        </div>
        <div>
            <input type="text" name="zc" id="zc">
        </div>
        <div>
            <label for="address">address</label>
        </div>
        <div>
            <textarea name="address" id="address" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="Send it">
    </form>
</body>
</html>