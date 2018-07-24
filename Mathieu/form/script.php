<?php
if ($_POST) {

if ($_SERVER['REQUSET_METHOD']=='POST') {
    if (empty($_POST['firstname'])&& !strlen($_POST['firstname'])>=2) {
        http_response_code(405);
        echo "firstname need at least 2 characters.";
    }
    if (empty($_POST['lastname'])&& !strlen($_POST['lastname'])>=2) {
        http_response_code(405);
        echo "lastname need at least 2 characters.";
    }
    

}else {
    echo "nock";
    http_response_code(405);
}




}


?>