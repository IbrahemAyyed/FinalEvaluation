<?php

    #EXERCISE : Display the infos in contact.txt
    
    $file = "contact.txt";

    $lines = file($file);

    // echo "<pre>";
    // print_r($lines);
    // echo "</pre>";

    // echo implode($lines, "<br>");

    foreach ($lines as $line) 
    {
        echo $line . "<br>";
    }

    // echo implode(file("contact.txt"), "<br>");