<?php
    # GOAL: send infos into form4.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 3</title>
</head>
<body>
    <h1>Form 3</h1>

    <form action="form4_write.php" method="post">
        <input type="text" name="pseudo" placeholder="Type your pseudo here">
        <input type="text" name="email" placeholder="Your email here">
        <input type="submit" value="Send it">
    </form>

</body>
</html>