<?php

session_start();
include 'config.php';

if(!$_SESSION['username'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}


	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		
    $query="DELETE FROM detail WHERE id='$id'";
	$result=mysqli_query($dbcon,$query);
	echo "<script>
	alert('are you sure you want delete it?');
	window.location.href='view.php';
	</script>
	";
	}

	else{
		header('location: view.php');
	}
?>