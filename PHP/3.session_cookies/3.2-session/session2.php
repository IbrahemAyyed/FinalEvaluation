<?php

session_start(); // function session_start() allows me to read informations linked to my session, no matter where my file is created

#example: can be a good way to save a basket

echo $_SESSION['firstname'];