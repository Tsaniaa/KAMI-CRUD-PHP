<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', '3120500019');
define('DB_PASSWORD', '3120500019');
define('DB_NAME', '3120500019');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>