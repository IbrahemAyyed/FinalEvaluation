<?php

# GOAL = use some datas hidden from a form (register in DTB the result or send email ...)

if($_POST)
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    echo "pseudo: " . $_POST['pseudo'] . '<br>' ;
    echo "description: " . $_POST['description'] . '<br><hr>' ;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form1</title>
</head>
<body>
    
    <form action="" method="post"> 
    <!-- the method is asking the arguments: POST or GET + action is a way to redirect to another page (if I don't want any action, then empty is ok) -->

        <div>
            <label for="pseudo">Pseudo</label>
            <!-- for is linked to the id (input): when I click on it, I can directly type some text -->
        </div>
        <div>
            <input type="text" name="pseudo" id="pseudo" placeholder="Your pseudo">
            <!-- name is the key that we will have in our result/array -->
        </div>
        <div>
            <label for="description">Describe yourself</label>
        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="I'm a dev working on PHP ..."></textarea>
        </div>
        <input type="submit" value="Send it" name="joe">
    </form>

</body>
</html>