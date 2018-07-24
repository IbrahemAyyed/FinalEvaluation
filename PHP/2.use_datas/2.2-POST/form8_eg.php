<?php

# EXERCISE: create a form to have the lastname + firstname + pseudo + mail of the user. If one field is empty, should display an error and I want to have at least a 3 letters pseudo. If everything is ok, then I register the result into a new file "contact.txt"

if ($_POST) 
{
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    if (empty($_POST['lastname'])) 
    {
        echo "<div style='background:red;'>You need a lastname !</div>";
    }
    elseif (empty($_POST['firstname'])) 
    {
        echo "<div style='background:red;'>You need a firstname !</div>";
    }
    elseif(empty($_POST['mail']))
    {
        echo "<div style='background:red;'>You need a valid email !</div>";
    }
    elseif (strlen($_POST['pseudo']) < 3) 
    {
        echo "<div style='background:red;'>Your pseudo should have at least 3 letters.</div>";
    }
    else 
    {
        $f = fopen("contact.txt", 'a');
        fwrite($f, $_POST['lastname'] . " - ");
        fwrite($f, $_POST['firstname'] . " - ");
        fwrite($f, $_POST['pseudo'] . " - ");
        fwrite($f, $_POST['mail'] . "\n");
        $f = fclose($f); 

        echo "<div style='background:green;'>You are registered !</div>"; 
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise POST #1</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <input type="text" name="firstname" id="" placeholder="Your firstname">
        </div>
        <div>
            <input type="text" name="lastname" id="" placeholder="Your lastname">
        </div>
        <div>
            <input type="text" name="pseudo" id="" placeholder="Your pseudo">
        </div>
        <div>
            <input type="text" name="mail" id="" placeholder="Your mail">
        </div>
    
        <input type="submit" value="Send">
    </form>
</body>
</html>