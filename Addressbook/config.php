<?php

// Connect Server
$servername = "localhost";
$username = "root";
$password = "";
$db = "addressbook";

$dbcon=mysqli_connect($servername, $username, $password);
mysqli_select_db($dbcon,$db);


?>