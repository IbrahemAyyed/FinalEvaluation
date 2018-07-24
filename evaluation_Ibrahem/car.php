<?php

require_once('inc/header.php');
$page = "cars";


$result = $pdo->query("SELECT * FROM vehicle");
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

    $content .= "<td><a href='" . URL . "car.php?id=" . $product['id_vehicle'] . "'><i class='fas fa-pen'></i></a></td>";
    $content .= "<td><a href='?id=" . $product['id_vehicle'] . "'><i class='fas fa-trash-alt'></i></a></td>";
    $content .= "</tr>";
}
$content .= "</tbody></table>";


if ($_POST) {
    if (!empty($_POST['brand']) && !empty($_POST['model']) && !empty($_POST['color']) && !empty($_POST['license_plate']) && ($_POST['ceheckbox'] == 'checked')) {
        $result = $pdo->prepare("INSERT INTO vehicle (brand, model, color, license_plate)VALUES (:brand, :model, :color, :license_plate)");
        $result->bindValue(':brand', $_POST['brand'], PDO::PARAM_STR);
        $result->bindValue(':model', $_POST['model'], PDO::PARAM_STR);
        $result->bindValue(':color', $_POST['color'], PDO::PARAM_STR);
        $result->bindValue(':license_plate', $_POST['license_plate'], PDO::PARAM_STR);
        if ($result->execute()) {
            header('location:car.php');
            echo "<div class='alert alert-success' role='alert'>
                Congrats! your car is registered    
                </div>";
        }else{
            $result = $pdo->prepare("UPDATE vehicle (brand, model, color, license_plate)VALUES (:brand, :model, :color, :license_plate)");
            $result->bindValue(':brand', $_POST['brand'], PDO::PARAM_STR);
            $result->bindValue(':model', $_POST['model'], PDO::PARAM_STR);
            $result->bindValue(':color', $_POST['color'], PDO::PARAM_STR);
            $result->bindValue(':license_plate', $_POST['license_plate'], PDO::PARAM_STR);
            if ($result->execute()) {
                header('location:car.php');
                echo "<div class='alert alert-success' role='alert'>
                    Congrats! your car is registered    
                    </div>";
    } 
}  

    }
}
    $brand = (isset($_POST['brand'])) ? $_POST['brand'] : '';
    $model = (isset($_POST['model'])) ? $_POST['model'] : '';
    $color = (isset($_POST['color'])) ? $_POST['color'] : '';
    $license_plate = (isset($_POST['license_plate'])) ? $_POST['license_plate'] : '';

if(isset($_GET['id']) && !empty($_GET['id']) )
{
    $req = "SELECT * FROM vehicle WHERE id_vehicle = :id_vehicle";

    $result = $pdo->prepare($req);

    $result->bindValue(':id_vehicle', $_GET['id'], PDO::PARAM_INT);

    $result->execute();

    if($result->rowCount() == 1)
    {
        $product = $result->fetch();

        $delete_req = "DELETE FROM vehicle WHERE id_vehicle = $product[id_vehicle]";

        $delete_result = $pdo->exec($delete_req);

        
    }
    else
    {
        header('location:car.php?m=fail');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>car</title>
</head>
<body>
<h1><?= $page ?></h1>
<?= $content ?>
<form action="" method="post">
<div class="form-group">
<input type="text" name= "brand" class="form-control" placeholder="brand...">
</div>
<div class="form-group">
<input type="text" class="form-control" name= "model" placeholder="model....">
</div>
<div class="form-group">
<input type="text" class="form-control" name= "color" placeholder="color....">
</div>
<div class="form-group">
<input type="text" class="form-control" name= "license_plate" placeholder="license_plate....">
</div>
<div class="form-group">
<input type="checkbox"  name="ceheckbox"
               value="checked" />
               <label for="subscribeNews">All the information are correct?</label>
               </div>
<input type="submit" value="Add car" class="btn btn-info btn-lg btn-block">

</form>
    
</body>
</html>






<?php

require_once('inc/footer.php');

?>
