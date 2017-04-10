<?php

// Connect Server
$servername = "localhost";
$username = "root";
$password = "";
$db = "phonebook";

@mysqli_connect($servername, $username, $password);
@mysqli_select_db($db);



@mysqli_query("CREATE TABLE IF NOT EXISTS Detail (id INT(6)UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(30) NOT NULL,
number varchar(20) NOT NULL,
email VARCHAR(50),
operator VARCHAR(50) NOT NULL,
identified VARCHAR(50),
reg_date TIMESTAMP)");
@mysqli_query("create table if not exists admin (id int(6) unsigned auto_increment primary key,name VARCHAR(30) NOT NULL,user_name VARCHAR(30) NOT NULL,email VARCHAR(60) NOT NULL, password VARCHAR(100) NOT NULL)");





?>