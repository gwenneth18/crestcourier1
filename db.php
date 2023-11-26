<?php

@define('DB_SERVER', 'localhost');
@define('DB_USERNAME', '2102091');
@define('DB_PASSWORD', '91n08m');
@define('DB_NAME', 'db2102091');

 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>

