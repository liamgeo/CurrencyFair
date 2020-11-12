<?php

session_start();

//will remove memory of temp user that is logged in
unset($_SESSION['admin']);

header('location: login.php');

?>