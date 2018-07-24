<?php

require_once('inc/header.php');
$page = "association_vehicle_driver";

$action = "Add an associction";
$result = $pdo->query("SELECT * FROM association_vehicle_driver");
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

    $content .= "<td><a href='" . URL . "assocication.php?id=" . $product['id_association'] . "'><i class='fas fa-pen'></i></a></td>";
    $content .= "<td><a href='?id=" . $product['id_association'] . "'><i class='fas fa-trash-alt'></i></a></td>";
    $content .= "</tr>";
}
$content .= "</tbody></table>";
if ($_POST) {
    if (!empty($_POST['id_vehicle']) && !empty($_POST['id_driver']) && ($_POST['ceheckbox'] == 'checked')) {
        $result = $pdo->prepare("INSERT INTO  association_vehicle_driver (id_vehicle, id_driver)VALUES (:id_vehicle, :id_driver )");
        $result->bindValue(':id_vehicle', $_POST['id_vehicle'], PDO::PARAM_STR);
        $result->bindValue(':id_driver', $_POST['id_driver'], PDO::PARAM_STR);
        if ($result->execute()) {
            header('location:assocication.php');
            echo "<div class='alert alert-success' role='alert'>
                    Congrats! your car is registered    
                    </div>";
        }
        else {
            $action = "Update";
            $result = $pdo->prepare("UPDATE  association_vehicle_driver (id_vehicle, id_driver)VALUES (:id_vehicle, :id_driver )");
            $result->bindValue(':id_vehicle', $_POST['id_vehicle'], PDO::PARAM_STR);
            $result->bindValue(':id_driver', $_POST['id_driver'], PDO::PARAM_STR);
            if ($result->execute()) {
                header('location:assocication.php');
                echo "<div class='alert alert-success' role='alert'>
                        Congrats! your car is registered    
                        </div>";
            }
        }
        header('location:assocication.php');
        echo "<div class='alert alert-success' role='alert'>
                Congrats! your car is registered    
                </div>";

    } else {
        echo "<div class='alert alert-danger' role='alert'>
    Please fill all the information
    </div>";
    }
}
if(isset($_GET['id']) && !empty($_GET['id']) )
{
    $req = "SELECT * FROM association_vehicle_driver WHERE id_association = :id_association";

    $result = $pdo->prepare($req);

    $result->bindValue(':id_association', $_GET['id'], PDO::PARAM_INT);

    $result->execute();

    if($result->rowCount() == 1)
    {
        $product = $result->fetch();

        $delete_req = "DELETE FROM association_vehicle_driver WHERE id_association = $product[id_association]";

        $delete_result = $pdo->exec($delete_req);

        
    }
    else
    {
        header('location:assocication.php?m=fail');
    }
}



$id_driver = (isset($_POST['id_driver'])) ? $_POST['id_driver'] : '';
$id_vehicle = (isset($_POST['id_vehicle'])) ? $_POST['id_vehicle'] : '';



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>assocication</title>
</head>
<body>
<h1><?= $page ?></h1>
<?= $content ?>
<form action="" method="post">
<div class="form-group">
<input type="text" name= "id_vehicle" class="form-control" placeholder="id_vehicle...">
</div>
<div class="form-group">
<input type="text" class="form-control" name= "id_driver" placeholder="id_driver....">
</div>
<div class="form-group">

<div class="form-group">
<input type="checkbox"  name="ceheckbox"
               value="checked" />
               <label for="subscribeNews">All the information are correct?</label>
               </div>
<input type="submit" value="<?= $action ?>" class="btn btn-info btn-lg btn-block">
</body>
</html>






<?php

require_once('inc/footer.php');

?>
