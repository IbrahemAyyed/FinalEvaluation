<?php

require_once('inc/header.php');
$page = "drivers";


$result = $pdo->query("SELECT * FROM driver");
$products = $result->fetchAll();

$content .= "<table class='table table-striped'>";
$content .= "<thead class='thead-dark'><tr>";

for ($i = 0; $i < $result->columnCount(); $i++) {
    $columns = $result->getColumnMeta($i);
    $content .= "<th scope='col'>" . ucfirst(str_replace('_', ' ', $columns['name'])) . "</th>";
}

$content .= '<th colspan="1">update</th>';
$content .= '<th colspan="1">Delete</th>';
$content .= "</tr></thead><tbody>";
foreach ($products as $product) {
    $content .= "<tr>";
    foreach ($product as $key => $value) {

        $content .= "<td>" . $value . "</td>";
    }

    $content .= "<td><a href='" . URL . "driver.php?id=" . $product['id_driver'] . "'><i class='fas fa-pen'></i></a></td>";
    $content .= "<td><a href='?id=" . $product['id_driver'] . "'><i class='fas fa-trash-alt'></i></a></td>";
    $content .= "</tr>";
}
$content .= "</tbody></table>";



if ($_POST) {
    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && ($_POST['ceheckbox'] == 'checked'))
     {
        $result = $pdo->prepare("INSERT INTO driver (lastname, firstname)VALUES (:lastname, :firstname )");
        $result->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $result->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        if ($result->execute()) {
                //header('location:driver.php');
            echo "<div class='alert alert-success' role='alert'>
                Congrats! your car is registered    
                </div>";
        }
        header('location:driver.php');
        echo "<div class='alert alert-success' role='alert'>
            Congrats! your car is registered    
            </div>";

    } else {
        $result = $pdo->prepare("UPDATE driver (lastname, firstname)VALUES (:lastname, :firstname )");
        $result->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $result->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        if ($result->execute()) {
                //header('location:driver.php');
            echo "<div class='alert alert-success' role='alert'>
                Congrats! your car is registered    
                </div>";
        }
        header('location:driver.php');
        echo "<div class='alert alert-success' role='alert'>
            Congrats! your car is registered    
            </div>";
    }

    $firstname = (isset($_POST['firstname'])) ? $_POST['firstname'] : '';
    $lastname = (isset($_POST['lastname'])) ? $_POST['lastname'] : '';

if(isset($_GET['id']) && !empty($_GET['id']) )
{
    $req = "SELECT * FROM driver WHERE id_driver = :id_driver";

    $result = $pdo->prepare($req);

    $result->bindValue(':id_driver', $_GET['id'], PDO::PARAM_INT);

    $result->execute();

    if($result->rowCount() == 1)
    {
        $product = $result->fetch();

        $delete_req = "DELETE FROM driver WHERE id_driver = $product[id_driver]";

        $delete_result = $pdo->exec($delete_req);

        
    }
    else
    {
        header('location:driver.php?m=fail');
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
    <title>driver</title>
</head>
<body>
<h1><?= $page ?></h1>
<?= $content ?>
<form action="" method="post">
<div class="form-group">
<input type="text" name= "firstname" class="form-control" placeholder="firstname...">
</div>
<div class="form-group">
<input type="text" class="form-control" name= "lastname" placeholder="lastname....">
</div>
<div class="form-group">

<div class="form-group">
<input type="checkbox"  name="ceheckbox"
               value="checked" />
               <label for="subscribeNews">All the information are correct?</label>
               </div>
<input type="submit" value="Add driver" class="btn btn-info btn-lg btn-block">
</body>
</html>







<?php

require_once('inc/footer.php');

?>
