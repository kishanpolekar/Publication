<?php
//Establishing connection with the database
$server = "localhost";
$db = "library";
$user = "root";
$password = "Yaali521***";
$dbconn = mysqli_connect($server, $user, $password, $db)
    or die('Could not connect: '.mysqli_connect_error());

?>
