<?php 
# GOAL: read the infos in "list.txt"

$file = "list.txt";

$lines = file($file); // function file allows me to do all the work and return an ARRAY

// print '<pre>';
// print_r($lines);
// print '</pre>';

foreach ($lines as $line) 
{
    echo $line . '<br>';
}

echo '<hr>';

echo implode($lines, "<br>"); // function implode() gather the ARRAY infos into string. 2 arguments : ARRAY targeted + gathering rule 

# to delete the document, use function unlink()
// unlink($file);