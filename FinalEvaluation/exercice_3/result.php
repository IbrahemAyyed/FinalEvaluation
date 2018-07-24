<?php
// we are using the validations ogf the entries
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $ok = true;
    #checking if the make is more than 2 and not empty
    if(empty($_POST['Make']) || strlen($_POST['Make']) < 2)
    {
        // display error
        echo 'Make need at least 2 characters.';
        
        $ok = false;
    }
        #checking if the model is more than 2 and not empty

    if(empty($_POST['Model']) || strlen($_POST['Model']) < 2)
    {
        // display error
        echo 'Model need at least 2 characters.';
        
        $ok = false;
    }
        #checking if the Year is not empty

    if(empty($_POST['Year']))
    {
        // display error
        echo 'enter a valid Year.';
        
        $ok = false;
    }
    #checking if the color is not empty
    if(empty($_POST['Color']))
    {
        // display error
        echo 'Color can\'t be empty';
        
        $ok = false;
    }
    
    
    
}
else
{
    // display error
    http_response_code(202);
    echo 'Your result is been accepted';
}
?>