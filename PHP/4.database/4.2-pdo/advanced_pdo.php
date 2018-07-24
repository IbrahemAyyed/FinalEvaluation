<?php

$dsn = "mysql:host=localhost;dbname=company";
$login = "root";
$pwd = "";
$attributes = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

/*
    ERRMODE:
        > ERRMODE_WARNING: display the error on the page (~working alone)
        > ERRMODE_EXCEPTION: return the error thanks to the PDOexception CLASS. It means more details
        > ERRMODE_SILENT: by default. Not displaying any error (~for production)
*/

$pdo = new PDO($dsn, $login, $pwd, $attributes);

// var_dump($pdo);

/*
    EXEC + QUERY = please see the pdo.php

    PREPARE/EXECUTE
    We will use it when we will deal with sensitive informations (infos written by a user)
        SELECT/INSERT/UPDATE/DELETE
            returned values
            > success : PDOSTATEMENT (OBJ)
            > failure: FALSE (BOOL)
*/

$result = $pdo->prepare('SELECT * FROM employees WHERE lastname = :name');

$result->bindValue(':name', 'Lagarde', PDO::PARAM_STR); // we call the METHOD bindValue(). It takes 3 arguments: changing marker + value + security parameter (PDO::PARAM_STR or PDO::PARAM_INT)
// the METHOD bindParam() is also accepted instead of bindValue()

$check = $result->execute();

echo '<pre>';
print_r($result);
print_r($check);
echo '</pre>';

$info = $result->fetch();

echo '<pre>';
print_r($info);
echo '</pre>';

/*
    Interest of this way to deal with info:
        > optimization for the DTB;
        > the request is dynamic (the value can change);
        > we secure the request
    
    If we have sensitive datas (from the user), can be useful to deal with GET/POST
*/

/*
# Q&A => QUERY, EXEC or PREPARE/EXECUTE ?

# SELECT * FROM employees => query
$result = $pdo->query('SELECT * FROM employees');

# SELECT * FROM employees WHERE firstname = 'Joe' => query
$result = $pdo->query("SELECT * FROM employees WHERE firstname = 'Joe'");

# SELECT * FROM employees WHERE id_employee = '$_GET[id]' => prepare/execute
$result = $pdo->prepare("SELECT * FROM employees WHERE id_employee = :id");
$result->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$result->execute();

# INSERT INTO employees (firstname, lastname) VALUES ('$_POST[firstname]', '$_POST[lastname]') => prepare/execute
$result = $pdo->prepare("INSERT INTO employees (firstname, lastname) VALUES (:firstname, :lastname)");
$result->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
$result->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
$result->execute();
*/

# ERRMODE_EXCEPTION : try & catch

try
{
    // $result = $pdo->query("SELCT * FROM employees");

    $result = $pdo->exec("UPDATE employees SET salary = (salary + 200)");

    echo 'Number of lines affected: ' . $result . '<br>';

    if($result)
    {
        echo "CONGRATS ! Let's enjoy this moooooooooney $$$$$ <br>";
    }
}
catch(PDOException $error) // Thanks to the PDO::ERRMODE_EXCEPTION, I can display the details of my error
{
    echo '<div style="background:red; color:white; padding:20px">';
        echo '<h5>SQL Error</h5>';
        echo 'Message: ' . $error->getMessage() . '<br>';
        echo 'Code: ' . $error->getCode() . '<br>';
        echo 'File: ' . $error->getFile() . '<br>';
        echo 'Line: ' . $error->getLine() . '<br>';
    echo '</div>';

    // I need to write the error in a new file
    $f = fopen('error.txt', 'a');
    $error_board = date('d/m/Y - W - H:i:s') . ' -Error SQL: ' . "\r\n";
    $error_board .= 'Message: ' . $error->getMessage() . "\r\n\r\n";
    fwrite($f, $error_board);
    fclose($f);
    exit;
}

# ARGUMENTS with PREPARE/EXECUTE

    //> ?
    $_POST['firstname'] = 'Bahaa';
    $_POST['lastname'] = 'Almahamid';

    $result = $pdo->prepare('SELECT * FROM employees WHERE firstname = ?');

    $info = $result->execute(array($_POST['firstname']));

    var_dump($info);

    $result = $pdo->prepare('SELECT * FROM employees WHERE firstname = ? AND lastname = ?');

    $info = $result->execute(array($_POST['lastname'], $_POST['firstname']));

    var_dump($info);

    //> :marker
    $result = $pdo->prepare('SELECT * FROM employees WHERE firstname = :firstname AND lastname = :lastname');

    $result->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
    $result->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);

    $info = $result->execute();

    var_dump($info);

    # Examples

    $_GET['id'] = 904;

    echo '<pre>';
    print_r($_POST);
    print_r($_GET);
    echo '</pre>';

    $result = $pdo->prepare("SELECT * FROM employees WHERE firstname = :firstname AND lastname = :lastname");

    $result->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
    $result->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);

    $info = $result->execute();

    var_dump($info);

    $display_result = $result->fetch();

    echo '<pre>';
    var_dump($display_result);
    echo '</pre>';

    $result = $pdo->prepare("SELECT * FROM employees WHERE id_employee = :id");

    $result->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

    $info = $result->execute();

    var_dump($info);

    $display_result = $result->fetch();

    echo '<pre>';
    var_dump($display_result);
    echo '</pre>';

    # Exercise

    $result = $pdo->query("SELECT * FROM employees", PDO::FETCH_ASSOC);

    echo '<pre>';
    var_dump($result);
    echo '</pre>';

    while($infos = $result->fetch())
    {
        // echo '<pre>';
        // var_dump($infos);
        // echo '</pre>';
        foreach ($infos as $key => $value) 
        {
            echo $value . '<br>';
        }
        echo '<br>';
    }

    # Return the last id  registered on the DTB 
    $result = $pdo->exec("INSERT INTO employees (firstname, lastname) VALUES ('Tamara', 'Pupac')");

    echo "Last ID registered: " . $pdo->lastInsertId();