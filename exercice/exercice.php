<?php
$dsn = "mysql:host=localhost; dbname=company";
$login = 'root';
$pwd = '';
$attribute = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
$pdo = new PDO($dsn, $login, $pwd, $attribute);

if ($_POST)
 {
    $req = $pdo->prepare("INSERT INTO employees (firstname, lastname, gender, department,recruitment_date,salary ) VALUES (:firstname, :lastname, :gender, :department,:recruitment_date,:salary )");
    $req->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
            
            $req->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
           $req->bindValue(':gender', $_POST['gender'], PDO::PARAM_STR);
            $req->bindValue(':department', $_POST['department'], PDO::PARAM_STR);
            $req->bindValue(':recruitment_date', $_POST['recruitment_date'], PDO::PARAM_STR);
            $req->bindValue(':salary', $_POST['salary'], PDO::PARAM_STR);
            if($req->execute())
            {
               // header('location:login.php');
               echo "done";
            }


}   



 $msg_error = "";
 $msg_success = "";
 $content = "";
 $result = $pdo->query("SELECT * FROM employees");
 $products = $result->fetchAll();



    $content .= "<table class='table table-striped'>";
    $content .= "<thead class='thead-dark'><tr>";

    for ($i = 0; $i < $result->columnCount(); $i++) 
    {
        $columns = $result->getColumnMeta($i);
        $content .= "<th scope='col'>" . ucfirst(str_replace('_', ' ', $columns['name'])) . "</th>";
    }
    $content .= '<th colspan="2">Actions</th>';
    $content .= "</tr></thead><tbody>";
    foreach ($products as $product) 
    {
        $content .= "<tr>";
        foreach ($product as $key => $value) 
        {
           
                $content .= "<td>" . $value . "</td>";
            }
            $content .= "<td><a href='localhost:8080/exercice/exercice.php?id=" . $product['id_employee'] . "'><i class='fas fa-pen'></i></a></td>";
            $content .= "<td><a href='?id=" . $product['id_employee'] . "'><i class='fas fa-trash-alt'></i></a></td>";
            $content .= "</tr>";
        }
    
    $content .= "</tbody></table>";

    if(isset($_GET['id']) && !empty($_GET['id']) )
    {
        $req = "SELECT * FROM employees WHERE id_employee = :id_employee";

        $result = $pdo->prepare($req);

        $result->bindValue(':id_employee', $_GET['id'], PDO::PARAM_INT);

        $result->execute();

        if($result->rowCount() == 1)
        {
            $product = $result->fetch();

            $delete_req = "DELETE FROM employees WHERE id_employee = $product[id_employee]";

            $delete_result = $pdo->exec($delete_req);

            
        }
        else
        {
            header('location:product_list.php?m=fail');
        }
    }



 if(!empty($_POST['id_employee'])) // we register the update
 {
     $result = $pdo->prepare("UPDATE employees SET firstname=:firstname, lastname=:lastname, gender=:gender, department=:department, color=:color, size=:size, gender=:gender, recruitment_date=:recruitment_date, salary=:salary  WHERE id_employee = :id_employee");

     $result->bindValue(':id_employee', $_POST['id_employee'], PDO::PARAM_INT);
     $result->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
     $result->bindValue(':gender', $_POST['gender'], PDO::PARAM_STR);
     $result->bindValue(':department', $_POST['department'], PDO::PARAM_STR);
     $result->bindValue(':recruitment_date', $_POST['recruitment_date'], PDO::PARAM_STR);
     $result->bindValue(':salary', $_POST['salary'], PDO::PARAM_STR);
     if($result->execute())
     {
         // header('location:login.php');
         echo "done";
        }
    }


?>

<h1>List of employeess</h1>


<?= $msg_error ?>
<?= $msg_success ?>
<?= $content ?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <title>Exercise</title>
</head>
<body>

<form action="" method = "post">
<input type="text" name = "firstname" placeholder = "Your name....">
<br>
<input type="text" name = "lastname" placeholder = "Your last name....">
<br>

<br>
<label for="gender">gender: </label>
<select name="gender" >
<option value="m">M</option>
<option value="f">F</option>
</select>
<br>
<label for="department">Department</label>
<select name="department" id="">
<option value="sales">sales</option>
<option value="management">management</option>
<option value="employeesion">employeesion</option>
<option value="assistant">assistant</option>
<option value="accounting">accounting</option>
<option value="IT">IT</option>
<option value="legal">legal</option>
</select>
<br>
<label for="recruitment_date">	recruitment_date: </label>
<input type="date" name = "recruitment_date">
<br>
<label for="salary">salary: </label>
<input type="text" name="salary">
<br>
<input type="submit" value = "submit">











</form>
    
</body>
</html>