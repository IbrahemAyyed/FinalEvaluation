<?php

session_start(); #the function session_start() allows us to initialize a session. If no file created before, it will do it automatically

# Use of the superglobal $_SESSION

$_SESSION['firstname'] = 'Miroslav';
$_SESSION['lastname'] = 'Nedeljkovic';

/*
The session is a link between a temporary file saved on a server and a cookie
*/

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

unset($_SESSION['lastname']); // function unset() allows us to delete specific datas about our session.
# example: for an eshop, it's good way to delete the user connection but keep infos about the basket 

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// session_destroy(); // meaning I destroy all the values

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// useful to give quick datas instead a request on the DTB