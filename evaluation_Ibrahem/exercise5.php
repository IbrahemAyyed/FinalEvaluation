<?php

require_once('inc/header.php');
$i = 0;

$result = $pdo->query('SELECT * FROM driver ', PDO::FETCH_ASSOC);

while ($infos = $result->fetch()) {
        //  echo '<pre>';
        //  var_dump($infos);
        //  echo '</pre>';
    foreach ($infos as $key => $value) {

    }
    $i = $i + 1;

}
echo "Number of drivers are: .<br>" . $i;
echo "<br>";
$i = 0;

$result = $pdo->query('SELECT * FROM vehicle ', PDO::FETCH_ASSOC);

while ($infos = $result->fetch()) {
        //  echo '<pre>';
        //  var_dump($infos);
        //  echo '</pre>';
    foreach ($infos as $key => $value) {

    }
    $i = $i + 1;

}
echo "Number of vehicles are: .<br>" . $i;

echo "<br>";
$i = 0;

$result = $pdo->query('SELECT * FROM association_vehicle_driver ', PDO::FETCH_ASSOC);

while ($infos = $result->fetch()) {
        //  echo '<pre>';
        //  var_dump($infos);
        //  echo '</pre>';
    foreach ($infos as $key => $value) {

    }
    $i = $i + 1;

}
echo "Number of association_vehicle_driver are: .<br>" . $i;
echo "<br>";


echo "drivers without cars are: .<br>";

$result = $pdo->query('SELECT firstname FROM driver WHERE id_driver  NOT IN(SELECT id_driver
    FROM association_vehicle_driver
    WHERE id_driver = id_driver)  ', PDO::FETCH_ASSOC);
while ($infos = $result->fetch()) {
        //   echo '<pre>';
        //    var_dump($infos);
        //    print_r([1]);

    echo '</pre>';
    foreach ($infos as $key => $value) {
        echo '<pre>';
        echo ($value);
        echo '</pre>';
    }
    $i = $i + 1;

}



// $result = $pdo->query("SELECT *
// FROM vehicle
// WHERE id_vehicle IN (
//         SELECT id_driver
//         FROM driver
//         WHERE firstname = 'Philippe'", PDO::FETCH_ASSOC);
//      while($infos = $result->fetch())
//      {
//         //   echo '<pre>';
//         //    var_dump($infos);
//         //    print_r([1]);

//           echo '</pre>';
//          foreach ($infos as $key => $value) 
//          {
//             echo '<pre>';
//             echo ($value);
//             echo '</pre>';
//          }
//          $i= $i+1;
     
//      }
//      echo "<br>";

$result = $pdo->query('SELECT * FROM driver ', PDO::FETCH_ASSOC);

while ($infos = $result->fetch()) {
        //  echo '<pre>';
        //  var_dump($infos);
        //  echo '</pre>';
    echo "The drivers are: .<br>";
    foreach ($infos as $key => $value) {
        echo '<pre>';
        echo ($value);
        echo '</pre>';
    }
    $i = $i + 1;

}

echo "<br>";
$i = 0;

$result = $pdo->query('SELECT * FROM vehicle ', PDO::FETCH_ASSOC);

while ($infos = $result->fetch()) {
        //  echo '<pre>';
        //  var_dump($infos);
        //  echo '</pre>';
    echo "The drivers are: .<br>";
    foreach ($infos as $key => $value) {
        echo '<pre>';

        echo ($value);
        echo '</pre>';
    }


}
?>


    <?php

    require_once('inc/footer.php');

    ?>
