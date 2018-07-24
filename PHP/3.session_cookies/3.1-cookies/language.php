<?php

# Cookie = a file stored on the user computer. He can delete or update this file

# Use of the superglobal $_COOKIE

// print_r($_GET);

if(isset($_GET["country"]))
{
    $country = $_GET["country"];
}
elseif(isset($_COOKIE['country'])) 
{
    $country = $_COOKIE['country'];
}
else
{
    $country = 'en';
}

setcookie('country', $country, time()+365*24*3600); # function setcookie() allows us to save cookies and it takes 3 arguments: name of the cookie + the value + lifetime
# function time() send me a result in seconds from 01/01/1970

// echo '<pre>';
// var_dump($_COOKIE);
// echo '</pre>';

/*
    EXAMPLES:
    > Send personal content, remember a specific choice
    > Add specific retargeting (marketing) link the preferences of the user - eg: Criteo
    > Export some datas for a client (analysis ...)
    > Audit (content, product/services)
    > Deal with informations about the user (anonymous or not)
    > Security - eg: bank are loggin out the user after few minutes without any activity
    ...
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Language</title>
</head>
<body>
    <h1>Choice of languages</h1>

    <ul>
        <li><a href="?country=en">English</a></li>
        <li><a href="?country=fr">French</a></li>
        <li><a href="?country=es">Español</a></li>
        <li><a href="?country=it">Italiano</a></li>
    </ul>

    <?php
        switch($country) 
        {
            case 'en':
                echo "Hello, you are currently visiting the website in english.";
                break;
            case 'fr':
                echo "Bonjour, vous visitez actuellement le site en français.";
                break;
            case 'es':
                echo "Hola, en este momento estais visitando el sitio en español.";
                break;
            case 'it':
                echo "Ciao, si sta attualmente visitando il sito in italiano.";
                break;
            default:
                echo "Please choose your favorite language.";
                break;
        }
    ?>

</body>
</html>