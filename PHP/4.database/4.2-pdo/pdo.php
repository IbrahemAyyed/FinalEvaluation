<?php

// echo '<pre>';
// print_r(get_declared_classes()); # list of all the PHP classes 
// echo '</pre>';

$dsn = "mysql:host=localhost; dbname=company";
$login = 'root';
$pwd = '';
$attribute = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = new PDO($dsn, $login, $pwd, $attribute); // we create a new OBJECT from the PDO CLASS with at least 3 arguments: server/DTB + login + password (+ the attributes meaning the default parameters we want to set)

// $pdo = new PDO("mysql:host=localhost; dbname=company", "root", '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// var_dump($pdo); # check if the the connection is ok (should return an OBJECT)

// echo '<pre>';
// var_dump(get_class_methods($pdo));
// echo '</pre>';

/*
    QUERY => we will use it for SELECT request (INSERT/UPDATE/DELETE but not conventionnal)
        returned values
        > success : PDOSTATEMENT (OBJECT)
        > failure : FALSE (BOOL)

    EXEC => we use it if we don't want to return any result (INSERT/UPDATE/DELETE)
        returne values
        > success : INTEGER (number of results)
        > failure : FALSE (BOOL)
*/

// $pdo->exec('INSERT INTO employees (firstname) VALUES ("David")'); // the arrow means we are asking to get a method/property

// $pdo->exec("UPDATE employees SET lastname='Micanovic' WHERE id_employee = 908");

// $req = $pdo->exec("DELETE FROM employees WHERE id_employee = 909");
// echo $req;

$pdostatement = $pdo->query("SELECT * FROM employees WHERE firstname='Damien'");

var_dump($pdostatement);

// echo '<pre>';
// print_r(get_class_methods($pdo));
// print_r(get_class_methods($pdostatement));
// echo '</pre>';

$employee = $pdostatement->fetch();

echo '<pre>';
var_dump($employee);
echo '</pre>';

/*
    To deal with datas from the DTB, we need to go through 4 steps:
    #1 Connect to the DTB with an OBJECT $pdo;
    #2 We need to call the METHOD query/exec from OBJECT $pdo. We will have as result a new OBJECT PDOstatement (with new methods allowing to convert the result)
    #3 Convert the data into ARRAY thanks to the METHOD fetch() linked to the OBJECT PDOstatement
    #4 I got an ARRAY, I can display the result with a loop for instance
*/

// We will use a loop to display the data
foreach($employee as $key => $value)
{
    echo $value . "<br>";
}
// Use datas one by one
echo $employee['firstname'] . ' ' . $employee['lastname'] . "<br>";

# QUERY versus EXEC: Is query working ot update/insert/delete ?
// $test = $pdo->query("INSERT INTO employees (firstname) VALUES ('Steve')");
// var_dump($test);
# Working but not conventionnal !

$req = $pdo->query("SELECT * FROM employees");

// $employees = $req->fetch();
// echo '<pre>';
// var_dump($employees);
// echo '</pre>';

# How to get multiple results ?
//> 1st solution: WHILE
    echo '<ul>';
        while($employee = $req->fetch(PDO::FETCH_ASSOC)) // If we already have this default behavior for fetch() in the attributes, then no need to ask PDO::FETCH_ASSOC for the following ones
        {
            // echo '<pre>';
            // var_dump($employee);
            // echo '</pre>';
            echo '<li>' . $employee['firstname'] . '</li>';
        }
    echo '</ul>';

//>2nd solution: FOREACH
    $req = $pdo->query("SELECT * FROM employees");

    // print_r(get_class_methods($req));

    $employees = $req->fetchAll();

    // echo '<pre>';
    // var_dump($employees);
    // echo '</pre>';

    foreach($employees as $employee)
    {
        // echo '<pre>';
        // var_dump($employee);
        // echo '</pre>';

        echo '<h3>Welcome ' . $employee['firstname'] . '</h3>';
        echo '<p>Please your informations below:</p><br>';

        foreach ($employee as $key => $value) 
        {
            if($key != 'id_employee')
            {
               echo $key . ': <strong>' . $value . '</strong><br>'; 
            }
        }
    }

    echo '<hr>';

    # I want to display all these results with a table

    $table = $pdo->query("SELECT * FROM employees");

    echo '<table border="1">';
        echo '<tr>';

        // echo '<pre>';
        // print_r(get_class_methods($table));
        // echo '</pre>';

            for ($i=0; $i < $table->columnCount(); $i++) // the METHOD columnCount() return the number of columns in the table 
            { 
                $column = $table->getColumnMeta($i); // the METHOD getColumnMeta() return the names of my table columns

                // echo '<pre>';
                // print_r($column);
                // echo '</pre>';

                echo '<th>' . ucfirst(str_replace('_', ' ', $column['name'])) . '</th>';
                // function ucfirst() allows me to have the first letter in uppercase
                // the function str_replace() allows me to replace a letter/sign in a result. It takes 3 arguments: the sign/letter to change + the way to replace + the subject
            }
        echo '</tr>';

        # WHILE
        // $info = $table->fetch();
        // echo '<pre>';
        // print_r($info);
        // echo '</pre>';
        # NOT WORKING: my request target multiple datas, so I cannot just fetch()

        while($infos = $table->fetch())
        {
            // echo '<pre>';
            // print_r($infos);
            // echo '</pre>';
            echo '<tr>';
                foreach($infos as $key => $value) 
                {
                    echo '<td>' . $value . '</td>';
                }
            echo '</tr>';
        }

        # FOREACH
        foreach ($employees as $employee) 
        {
            // echo '<pre>';
            // print_r($employee);
            // echo '</pre>';
            echo '<tr>';
                foreach ($employee as $key => $value) 
                {
                    echo '<td>' . $value . '</td>';
                }
            echo '</tr>';
        }
        


    echo '</table>';

    // echo '<pre>';
    // print_r($employees);
    // echo '</pre>';