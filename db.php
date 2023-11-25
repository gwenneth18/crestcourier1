<?php

@define('DB_SERVER', 'localhost');
@define('DB_USERNAME', 'karamelh_crestuser');
@define('DB_PASSWORD', '(G#_}_89nYpM');
@define('DB_NAME', 'karamelh_crestdb');

 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>

