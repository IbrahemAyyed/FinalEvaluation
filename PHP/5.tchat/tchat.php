<?php

session_start(); // get the data from the previous page (SESSION)

if(empty($_SESSION['pseudo']))
{
    header('location:index.php');
}

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

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

if($_POST && !empty($_POST['message']))
{
    $result = $pdo->prepare("INSERT INTO comment (id_user, content, datetime) VALUES ('$_SESSION[id_user]', :message, NOW())");

    $result->bindValue(':message', $_POST['message'], PDO::PARAM_STR);

    if($result->execute())
    {
        header('location:tchat.php');
    }

}

// I need to get all the messages from my table content
$req = "SELECT u.*, c.* 
FROM comment c, user u  
WHERE u.id_user = c.id_user
ORDER BY c.datetime ASC";

// var_dump($req);

$result = $pdo->query($req);

$messages = $result->fetchAll();

// echo '<pre>';
// print_r($messages);
// echo '</pre>';

// WE LOGOUT THE USER
if (isset($_GET['a']) && $_GET['a'] == 'logout') 
{
    session_destroy();
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tchat with friends</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <main class="container">
        <h1>Tchat with friends</h1>

        <a href="?a=logout" class="btn btn-warning">Logout</a>

        <?php foreach($messages as $message) : ?>
            <?php extract($message) ?>
            <?php if($id_user == $_SESSION['id_user']) : ?>
                <div class="card">
                    <div class="card-header">
                        <img style='width:25%;' src="uploads/img/<?= $picture ?>" alt="" class="img-thumbnail float-right">
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        <h4 class="alert alert-success"><?= $pseudo ?></h4>
                        <p><?= $content ?></p>
                        <footer class="blockquote-footer"><?= $datetime ?></footer>
                        </blockquote>
                    </div>
                </div>
            <?php else : ?>
                <div class="card">
                    <div class="card-header">
                        <img style='width:25%;' src="uploads/img/<?= $picture ?>" alt="" class="img-thumbnail">
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        <h4 class="alert alert-primary"><?= $pseudo ?></h4>
                        <p><?= $content ?></p>
                        <footer class="blockquote-footer"><?= $datetime ?></footer>
                        </blockquote>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <h4>New message:</h4>
        <form action="" method="post">
            <div class='form-group'>
                <textarea class='form-control' name="message" cols="20" rows="5"></textarea>
            </div>
            <input type="submit" value="Send it" class="btn btn-info">
        </form>
    </main>
</body>
</html>