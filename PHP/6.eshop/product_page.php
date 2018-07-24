<?php
    require_once("inc/header.php");

    // if($_GET['id'])
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']))
    {
        $result = $pdo->prepare("SELECT * FROM product WHERE id_product = :id_product");

        $result->bindValue(':id_product', $_GET['id'], PDO::PARAM_INT);

        $result->execute();

        if($result->rowCount() == 1)
        {
            $product_detail = $result->fetch();

            // debug($product_detail);
            extract($product_detail);
        }else
        {
            header('location:eshop.php?m=error');
        }
    }
    else
    {
        header('location:eshop.php?m=error');
    }


    $page = "$title";

    ?>

         <h1><?= $page ?></h1> 
    <img src="uploads/img/<?=$picture?>" alt=""<?=$title?>>
    <p>$product_details: </p>
    <ul>
        <li>Reference: <strong><?= $reference?></strong></li>
        <li>Category: <strong><?= $category?></strong></li>
        <li>Color: <strong><?= $color?></strong></li>
        <li>size: <strong><?= $size?></strong></li>
        <li>Price: <strong><?= $price?></strong></li>
        <li>Gnder: <strong><?= $gender?></strong><em>$ all taxes included </em></li>
    </ul>
<?php
    require_once("inc/footer.php");
?>