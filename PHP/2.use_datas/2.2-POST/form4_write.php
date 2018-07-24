<?php

# GOAL : I want to write the infos in an external document called "list.txt"

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if($_POST)
{
    if(!empty($_POST['pseudo'])) // alt way: strlen($_POST['pseudo]) != 0
    {
        echo "Welcome on the website " .  $_POST['pseudo'] . '<br>';

        extract($_POST); # function extract() allows me to create variables automatically regarding the key of my array, which will be equal to the value of that same array

        echo $pseudo . ' - ' . $email;

        # write down these infos in 'list.txt'

        $f = fopen('list.txt', 'a'); // 'a' is a way to open or create a document. The function fopen() take 2 arguments: name of the file + the method
        /*
            r => read only, beginiing of the file
            r+ => read/write, beginning of the file
            w => only write, delete the rest of the data
            w+ => read/write, delete the rest of the data
            a => only write, end of the file
            a+ => read/write, end of the file
        */

        fwrite($f, $_POST['pseudo'] . " - ");
        fwrite($f, $_POST['email'] . "\n");

        $f = fclose($f); // close the document: not mandatory bu useful to save some memory

    }
    else
    {
        echo "Not allowed to be here.";
    }
}