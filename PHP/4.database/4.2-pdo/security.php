<?php

# GOAL: inject some bug in the website !

$dsn = "mysql:host=localhost; dbname=security";
$login = 'root';
$pwd = '';

$pdo = new PDO($dsn, $login, $pwd);

// var_dump($pdo);

/*
    INJECTIONS EXAMPLE

    #1 pseudo: Joe'#
        => The # allows us to put the second part of the request as a comment

    #2 password: ' OR id_user='1
        => The first part of the request is not anymore important thanks to the OR + we ask to return the id n°1

    #3 pseudo: <p style="color:red;background:blue;">YOOOOOOOOOOO</p>
        => I inject some code and the interpretation is working (<style>)

    #4 password: ' OR 1='1
*/

if ($_POST) 
{
    // echo '<pre>';
    //     print_r($_POST);
    // echo '</pre>';

    echo 'Pseudo: ' . $_POST['pseudo'] . '<br>';
    echo 'Password: ' . $_POST['password'] . '<hr>';

    /*
        How to clean the values written by the user ?
        Preset functions
        addslashes() => clean the behavior of quotes,
        strip_tags() => delete every tags behavior
        htmlspecialchars() => convert the html tags
        htmlentities() => convert the html tags
        prepare() + execute() => avoid injection
    */

    $pseudo = addslashes($_POST['pseudo']);
    $password = addslashes($_POST['password']);

    $req = "SELECT * FROM user WHERE pseudo='$pseudo' AND pwd='$password'";

    $result = $pdo->query($req);

    echo 'Request: ' . $req . "<hr>";

    // var_dump($result);

    if($result->rowCount() > 0) // METHOD rowCount() allows me to return the number of results
    {
        // We enter in this condition if we got a link between a password and a pseudo

        $user = $result->fetch(PDO::FETCH_ASSOC);

        echo "<div style='background:green; padding:5px; color:white;'>";
            echo "<h5>Congrats</h5>";
            echo '<p>you are connected</p>';
            echo '<ul>';
                echo '<li>' . $user['pseudo'] . '</li>';
                echo '<li>' . $user['pwd'] . '</li>';
                echo '<li>' . $user['card'] . '</li>';
            echo '</ul>';
        echo "</div>";
    }  
    else 
    {
        echo "<div style='background:red;padding:5px;color:white;'>Pseudo or password incorrect ! Please try again.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Security</title>
</head>
<body>
    <h1>Login</h1>

    <form action="" method="post">
        <div>
            <label for="pseudo">Pseudo</label>
        </div>
        <div>
            <input type="text" name="pseudo" id="pseudo">
        </div>
        <div>
            <label for="password">Password</label>
        </div>
        <div>
            <input type="text" name='password' id='password'>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>    
    </form>

</body>
</html>