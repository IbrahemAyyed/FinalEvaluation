<?php

// we open the session (create a tmp file or call the content of this one)
session_start();

// I connect with the DTB
$dsn ='mysql:host=localhost;dbname=tchat';
$login='root';
$pwd='';
$attributes=[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = new PDO($dsn, $login, $pwd, $attributes);

# Declare my error variables
$msg_signup = '';
$msg_signin = '';

// var_dump($pdo);

echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
echo '</pre>';

if ($_POST) 
{
    if(isset($_POST['signup']))
    {
        
        if(empty($_POST['pseudo']) || empty($_POST['password']) || empty($_POST['email']))
        {
            $msg_signup .= "<div class='alert alert-danger'>Please use valid informations. Try again !</div>";
        }

        if(!empty($_FILES['picture']['name'])) 
        {
            $picture = md5(uniqid($_FILES['picture']['name'])); // the function uniqid() allows me to create an unique ID

            copy($_FILES['picture']['tmp_name'], 'uploads/img/' . $picture); // the function copy() allows me to copy/paste a file. It takes 2 arguments: the place where to find my file + the place where I want to store it 
        }
        else
        {
            $picture = "default.png";
        }

        if (empty($msg_signup)) 
        {
            $result = $pdo->prepare("INSERT INTO user (pseudo, password, email, picture) VALUES (:pseudo, :password, :email, :picture)");

            $salt = md5("Once upon a time in the West");
            $hashed_password = md5($_POST['password'] . $salt); // the function md5() allows me to hash my password. Easy to use, easy to hack
            
            $result->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
            $result->bindValue(':password', $hashed_password, PDO::PARAM_STR);
            $result->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $result->bindValue(':picture', $picture, PDO::PARAM_STR);

            if($result->execute())
            {
                $msg_signup .= "<div class='alert alert-success'>Congratulations, you are registered !</div>";
            }

        }
    }

    if(isset($_POST['signin']))
    {
        # USE THE SAME HASH METHOD
        $salt = md5("Once upon a time in the West");
        $test_password = md5($_POST['password'] . $salt); 

        $result = $pdo->prepare("SELECT * FROM user WHERE pseudo = :pseudo AND password = :password");

        $result->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $result->bindValue(':password', $test_password, PDO::PARAM_STR);

        $result->execute();

        if($result->rowCount() == 1) // it means I got one result from the DTB
        {
            $user = $result->fetch();
            
            // echo '<pre>';
            // var_dump($user);
            // echo '</pre>';

            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['picture'] = $user['picture'];
            // We register informations in the SESSION in order to use easily these datas

            header('location:tchat.php'); // function header() allows me to redirect the user. Here we will send him/her to tchat.php
        }
        else 
        {
            $msg_signin .= "<div class='alert alert-danger'>Error, please try again !</div>";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coolest tchat ever</title>

    <!-- Call Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>
<body>

    <main class="container">
        <h1>Come and tchat !</h1>

        <div>
            <h2>Sign'Up</h2>
            <?= $msg_signup ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" type="text" name="pseudo" placeholder="Your pseudo">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Your password">
                </div>
                <div class="form-group">
                    <label>Download your profile picture</label>
                    <input type="file" class="form-control-file" name="picture">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Your email">
                </div>
                <div class="form-group">
                    <input type="submit" value="SignUp" class="btn btn-primary btn-lg btn-block" name="signup">
                </div>
            </form>
        </div>

        <div>
            <h2>Sign'In</h2>
            <?= $msg_signin ?>
            <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="pseudo" placeholder="Your pseudo">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Your password">
                </div>
                <div class="form-group">
                    <input type="submit" value="SignIn" class="btn btn-secondary btn-lg btn-block" name='signin'>
                </div>
            </form>
        </div>
    
    </main>

    <footer>
        <script src="assets/js/bootstrap.min.js"></script>
    </footer>
</body>
</html>