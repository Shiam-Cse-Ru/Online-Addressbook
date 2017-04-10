<?php
include('config.php');
session_start();
$login_username = $_SESSION['username'];
$login_sql = "SELECT * from admin where user_name='$login_username'";

$login_query = mysqli_query($login_sql);

$number_row = mysqli_num_rows($login_query);

if($number_row!=1){
	header('location: login.php');
} 