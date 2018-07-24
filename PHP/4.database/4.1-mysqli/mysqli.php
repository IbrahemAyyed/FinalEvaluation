<?php

$mysqli = new Mysqli('localhost', 'root', '', 'company'); // $mysqli represent our connexion to the DTB. It takes 4 arguments: name of the server + login + password (xampp on windows = empty) + database targeted

# We just created a new OBJECT from the Mysqli CLASS

// echo '<pre>';
// var_dump($mysqli);
// var_dump(get_class_methods($mysqli)); // function get_class_methods() allows me to take a look at the methods of my targeted object
// echo '</pre>';

/*
$mysqli object countain the query() method. It will allows us to write some requests:

    SELECT
    returned values 
    > success => Mysqli_result (OBJECT)
    > failure => FALSE (BOOL)

    INSERT/UPDATE/DELETE
    returned values
    > success => TRUE (BOOL)
    > failure => FALSE (BOOL)

*/

// $mysqli->query("hbfezjhb fsdkj sdkjbnf kjsd"); // by default, errors are not displayed. It means we need to call a property 
// echo $mysqli->error;

#1 INSERT (DELETE, UPDATE)
// $mysqli->query("INSERT INTO employees (firstname, lastname, gender, department, recruitment_date, salary) VALUES ('Goran', 'StripStrap', 'm', 'IT', CURDATE(), '500')");
// echo $mysqli->error;
// echo "Affected line(s): " . $mysqli->affected_rows;

// $mysqli->query("DELETE FROM employees WHERE firstname='joe'");
// echo $mysqli->error;
// echo "Affected line(s): " . $mysqli->affected_rows;

// $mysqli->query("UPDATE employees SET lastname= 'LeBron' WHERE id_employee = 904");
// echo $mysqli->error;
// echo "Affected line(s): " . $mysqli->affected_rows;

#2 SELECT 
    //> only one result

    $result = $mysqli->query("SELECT * FROM employees WHERE id_employee = 904");
    // in order to show the result of a SELECT, we should save the result in a variable

    // echo '<pre>';
    // var_dump($result); // $result is an object, meaning we can not display the result of our request
    // var_dump(get_class_methods($result));
    // echo '</pre>';

    # Convert the OBJECT into an ARRAY
    $employee = $result->fetch_assoc();
    /*
    fetch_assoc() => index the result regarding the association within your table
    fetch_row() => index the result by numeric values
    fetch_array() => index regarding the table + numeric
    */

    echo '<pre>';
    var_dump($employee);
    echo '</pre>';

    echo 'Welcome ' . $employee['firstname'] . ' ' . $employee['lastname'] . ', please check your infos: <br>';

    echo '<ul>';
        foreach($employee as $key => $value)
        {
            if($key != 'id_employee')
            {
               echo '<li>' . $key . ': <strong>' . $value . '</strong></li>';  
            }
        }
    echo '</ul>';

    echo '<ul>';
        foreach($employee as $key => $value)
        {
            if($key == 'id_employee')
            {
                continue;
            }

            echo '<li>' . $key . ': <strong>' . $value . '</strong></li>';
        }
    echo '</ul>';

    //> multiple results

    $results = $mysqli->query("SELECT * FROM employees");

    while($employees = $results->fetch_assoc()) 
    {
        echo '<pre>';
        print_r($employees);
        echo '</pre>';
    }

    # We have to display the result on a table

    // echo '<pre>';
    // print_r($results);
    // echo '</pre>';

    echo 'Number of employees: ' . $results->num_rows;

    echo "<table border='1'>";
    echo "<tr>";

    while ($column = $results->fetch_field()) // METHOD fetch_field() return the name of each columns
    {
        // echo '<pre>';
        // var_dump($column);
        // echo '</pre>';

        echo '<th>' . ucfirst(str_replace('_', ' ' , $column->name)) . '</th>';
        // function ucfirst() allows me to have the first letter in uppercase
        // the function str_replace() allows me to replace a letter/sign in a result. It takes 3 arguments: the sign/letter to change + the way to replace + the subject
    }

    echo "</tr>";

    //print_r($results);

    $results = $mysqli->query("SELECT * FROM employees"); # NOT NECESSARY : bug on the display

    //print_r($results);

    while($infos=$results->fetch_assoc()){
        echo '<tr>';
            foreach($infos as $key => $value) 
            {
                echo '<td>' . $value . '</td>';
            }
        echo '</tr>';
    }

    echo '</table>';