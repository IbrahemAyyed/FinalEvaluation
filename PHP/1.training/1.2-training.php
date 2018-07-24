<h1>12. ARRAY</h1>
<?php

$color = 'blue';
$color .= ' - green';

echo $color;

echo '<br>';

$array = array('blue', 'yellow', 'red');

echo '<pre>'; // <pre> will give me a better view on my results
print_r($array); // display my ARRAY informations (key + value)
var_dump($array); // display my ARRAY informations (key + value) + type/length of my data
echo '</pre>';

echo $array[1];

echo '<br>';

$array2 = ["green", "pink", "indigo"];

echo $array2[2];

$array3[] = "France";
$array3[] = "Switzerland";
$array3[] = "Brazil";
$array3[] = "Italy";

echo '<pre>';
print_r($array3);
echo '</pre>';

echo $array3[2];

$array3[] = "Ireland";

echo '<pre>';
print_r($array3);
echo '</pre>';

# How to get all the info displayed as we want ?
foreach ($array3 as $key => $value) // the foreach() loop is linked to ARRAY. It will cut the ARRAY with one side the keys; on the other side the values. It takes at least 2 arguments: the ARRAY + the key (+ value)
{
    echo "$key - $value <br>";
}

echo '<br>';

echo count($array3);
echo '<br>';
echo sizeof($array3);
echo '<br>';
$array3[] = "South Africa";
echo sizeof($array3);

echo '<br>';

echo implode($array3, ' | '); // function implode() will take 2 arguments: the ARRAY + rule to gather the datas

echo "<h3>Multidimensionnal array</h3>";

$multi_array = [
    [
        "firstname" => 'Dany',
        "lastname" => 'Thill'
    ],
    [
        "firstname" => 'Julien',
        "lastname" => 'Webert'
    ]
];

echo '<pre>';
print_r($multi_array);
echo '</pre>';

$multi_array2 = array(
    0 => array(
        "firstname" => 'Max',
        "lastname" => 'Klepper'
    ),
    1 => array(
        "firstname" => "Lisa",
        "lastname" => "Prevault"
    )
);

echo '<pre>';
var_dump($multi_array2);
echo '</pre>';

echo $multi_array2[0]['lastname'];

echo '<br>';

foreach ($multi_array2 as $multi_details) 
{

    foreach ($multi_details as $key => $value) 
    {
        echo "$key - $value | ";
    }
}

?>

<hr>

<h1>13. CLASS/OBJECT</h1>
<?php

    class Student # a class allows me to gather infos, properties & methods linked to a subject: here = student
    {
        public $firstname = 'Yohan'; # variable in an object is called PROPERTY

        public $age = "33";

        public function country() # function in an object is called METHOD
        {
            return "Belgium";
        }
    }

    $student = new Student; # the keyword new allows us to initialize a new object

    echo '<pre>';
    var_dump($student);
    echo '</pre>';

    # How to call the infos of an object ?
    echo $student->firstname;
    echo '<br>';
    echo $student->age;
    echo '<br>';
    echo $student->country();
?>