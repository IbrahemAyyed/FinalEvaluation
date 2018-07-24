<h1>1. Display</h1>
<?php 

    echo "Hello world"; // echo allows us to display informations
    echo "<br>"; # I'm another comment
    print 'Welcome on my webpage'; /* 
        I'm a biggest comment
        on several lines
        Oh
        Yeah
    */
?>

<p>Hi friends, I'm your old HTML friend ... remember ?</p>
<br>

<!-- Contracted form of php is often use within html tags  CMS/frameworks. = stands for php + echo -->
<p>Careful to this <?= "contracted form of php" ?></p>

<hr>

<h1>2. Variables</h1>
<?php
# a variable allows me to transport informations

$firstname = "Max";
echo $firstname;
echo '<br>';

$firstname = "Lisa";
echo $firstname;
echo '<br>';

$a = 127;
echo gettype($a);
echo '<br>';

$double = 1.5;
echo gettype($double);
echo '<br>';

$string = "Aloha";
echo gettype($string);
echo '<br>';

$b = "1";
echo gettype($b);
echo '<br>';

$boolean = TRUE;
echo gettype($boolean);
echo '<br>';
/*
integer or INT
double OR float OR real
string
boolean OR bool
unset OR NULL
array
object
*/

?>

<hr>

<h1>3. Concatenation</h1>
<?php

echo "Hello " . "everyone" . "<br>";

$var = "How are you ";

echo $var . ": " . $firstname . " ?" . "<br>";

$firstname = "Cédric";
$firstname .= " Correia";
// $firstname = $firstname . " Correia";
echo $firstname;

?>

<hr>

<h1>4. Quotes & Double quotes</h1>
<?php

echo 'Hello $firstname <br>';
echo "Hello $firstname <br>"; // double quotes allow us interpret PHP
echo 'We got to diggin\' <br>';

$msg = "diggin'";
$msg2 = 'diggin\'';

echo $msg . " \" " . $msg2;

?>

<hr>

<h1>5. Constants</h1>
<?php
# a constant will have the same value from the beginning until the end

define("CITY", "Luxembourg"); // this function define() take 2 arguments: name of the constant + value. By convention, we write it always in UPPER CASE !

echo CITY;

# define("CITY", "London"); // mistake: cannot redefine a constant

// PRESET CONSTANTS
echo '<br>';
echo __FILE__;
echo '<br>';
echo __DIR__;
echo '<br>';
echo '<br>';
echo __LINE__;
echo '<br>';

?>

<h1>6. Arithmetic operators</h1>
<?php
$a = 10; $b = 2;

echo $a + $b . '<br>';
echo $a - $b . '<br>';
echo $a * $b . '<br>';
echo $a / $b . '<br>';

echo $a += $b; // $a = $a + $b;

echo '<br>';

$a++; // $a = $a + 1;
echo $a;
echo '<br>';
$a--;
echo $a;
echo '<br>';

$a = 10; $b = 3;
echo $a % $b; // modulo

echo '<br>';

# echo $a**2;

?>

<hr>

<h1>7. Conditions (if / else / elseif / switch)</h1>
<?php

$a = 10; $b = 5; $c = 2;

if ($a > $b)
{
    echo  "A is superior to B !";
}
else // default case
{
    echo  "B is superior to A.";
}

echo '<br>';

if ($a > $b && $b > $c) // && equals AND
{
    echo 'AND: All conditions are good.';
}

echo '<br>';

if ($a == 10 || $b > $c) // || equals OR
// || for OR
// == check the equality of values
// === check the equality and type of values
// XOR check if just one condition is good. If both are ok, then mistake !
{
    echo 'OR: All conditions are good.';
}
// else 
// {
//     echo "NOPE";
// }

echo '<br>';

if ($a == 8) 
{
    echo 'That\'s right, $a = 8';
}
elseif ($b != 5) 
{
    echo 'That\'s right, $b is not equal to 5';
}
else 
{
    echo "No conditions validated !";
}

// Several IFs are not equivalent to if/elseif/else because the code will not be stopped >> ~die()

echo '<br>';

echo ($a == 10) ? '$a is equal to 10' : "No equality <br>";
echo ($a === "10") ? '$a is equal to 10' : 'No equality <br>';

echo '<br>';

// $var2 = 'NULL';

if(isset($var2)) // function isset() means we want to check if this var was created before
{
    echo '$var exists !';
}
else 
{
    echo '$var2 doesn\'t exist !';
}

echo '<br>';

// $var3 = 0;

if (!empty($var3)) 
{
    echo '$var3 has a value.';
}
else 
{
    echo "The variable is empty.";
}

echo '<br>';

$var4 = isset($var) ? $var : 'No value'; // meaning to fill $var4, I check that $var exists. If it's ok, I give to $var4 the value of $var; if it's not, then I register "No value"

echo $var4;

echo '<br>';

$color = 'red';

switch ($color) 
{
    case 'blue':
        echo "You like blue.";
        break;
    case 'red':
        echo "You like red.";
        break;
    case 'yellow':
        echo "You like yellow.";
        break;
    default:
        echo "You like nothing !";
        break;
}

echo '<br>';


# EXERCISE : convert the switch into if/else
$color = 'blue';

if ($color == 'red') 
{
    echo "You like red.";
}
elseif ($color == 'blue') 
{
    echo "You like blue.";
}
elseif ($color == 'yellow') 
{
    echo "You like yellow.";
}
else 
{
    echo "You like nothing !";
}

echo '<br>';

?>

<hr>

<h1>8. Preset functions</h1>
<?php
# In PHP, a lot of function are already created.

$sent = "I'm a text - éùà";

echo iconv_strlen($sent); // eg: to delimit a name/text for instance
echo '<br>';
echo strlen($sent); // link to the bit length

// phpinfo(); # function phpinfo() is specific to the server infos

echo '<br>';

echo substr($sent, 2, 8); // function substr() take 3 parameters: the var + departure + length/where to stop

echo '<br>';

echo date('D d/m/Y, W, H:i:s'); // 

echo "<h3>Use function + condition</h3>";

$pseudo = "Batman";

// check the pseudo: if you have any value, then display "Hello VALUE_OF_PSEUDO", or display "I don't know you"

$pseudo_display = !empty($pseudo) ? "Hello $pseudo" : 'I don\'t know you'; 

echo $pseudo_display;

echo '<br>';

if (!empty($pseudo)) 
{
    echo "Hello $pseudo";
}
else 
{
    echo "I don't know you ...";
}

?>

<hr>

<h1>9. User functions</h1>
<?php

function hello() # parenthesis can accept arguments
{
    echo "Hello <br>";
}

hello();

function aloha($name)
{
    echo "Aloha $name <br>";
}

aloha($firstname);
aloha('Dany');
aloha('Steve');

echo '<h3>GLOBAL vs LOCAL</h3>';

    function days()
    {
        $day = "Monday";
        return $day;
    }

echo days();

echo '<br>';

$country = "Luxembourg";

    function displayCountry()
    {
        global $country;
        echo $country;
    }

displayCountry();

?>

<hr>

<h1>10. Loops [while/dowhile, for, foreach]</h1>
<?php
# DRY : Don't Repeat Yourself vs WET : Write Everything Twice

echo '<h3>WHILE</h3>';

$i = 0;

while ($i <= 10) 
{
    echo "Hello $i <br>";
    $i++;
}

$i = 0;

# EXERCICE : Display "Hello 0 - Hello 1 - Hello 2 - Hello 3 - Hello 4" on your screen
while ($i <= 4) 
{
    if($i<=3) {
        echo "Hello $i - ";
    }
    else {
        echo "Hello $i";
    }

    $i++;
}

echo '<br>';

$i = 0;

while($i <= 4)
{
    echo "Hello $i " . ($i++ < 4 ? " - " : ""); 
}

echo '<br>';

$i = 0;

while($i <= 3)
{
    echo "Hello $i - ";
    $i++;
}
echo "Hello $i";

echo '<br>';

echo '<h3>FOR</h3>';
for ($i=0; $i <= 15; $i++) // this loop for() takes 3 arguments: value at the beginning + the limit + incrementation rule
{ 
    echo "Loop n°$i <br>";
}

echo "<select>";
    echo "<option>1900</option>";
    echo "<option>1901</option>";
    echo "<option>1902</option>";
    echo "<option>1903</option>";
echo "</select>";

echo '<br>';

# EXERCICE : use a for loop to have the choice of years from 1900 to 2018
echo "<select>";
    for($i= date('Y')-18; $i >= 1900; $i--) 
    { 
        echo "<option>$i</option>";
    }
echo "</select>";

echo '<br>';

# EXERCICE : display the following table on your screen
echo "<table border='1'>";
    for($line = 0; $line < 10; $line++) // repeat it 10 times
    {
        echo "<tr>"; // table row >> 1 ligne
        for($cell = 0; $cell < 10; $cell++)
        {
            echo '<td>' . (10*$line+$cell) . '</td>'; // 1rst line: 10*0+0, 10*0+1 ... 10*0+9 >> then I go out to enter the second loop of the first for: 10*1+0, 10*1+1 ... 10*1+9 ...
        }
        echo "</tr>";
    }
echo "</table>";

?>

<hr>

<h1>11. Files inclusion</h1>
<?php

    // include("files.txt");

    // include_once("file.txt"); // the functions include() & include_once() allow us to call the result of another document and display it within the targeted page
    
    // require('file.txt');

    require_once('file.txt');

    # The main difference between an INCLUDE() and a REQUIRE() is that the first one request the doc, if couldn't find that's ok; the second one request the doc, if could'nt find it = fatal error !

?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>