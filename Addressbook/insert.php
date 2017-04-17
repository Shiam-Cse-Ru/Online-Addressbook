<?php

session_start();
include 'config.php';

if(!$_SESSION['username'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}



if(isset($_POST["submit"])){
	$firstname= $_POST["firstname"];
	$lastname=$_POST['lastname'];
    $qualification=$_POST['qualification'];
	$number= $_POST["number"];
	$email= $_POST["email"];
	 // date_default_timezone_set('Asia/Dacca');
	// $time=getdate();
	$address=$_POST['address'];

	if($firstname=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the firstname')</script>";
exit();//this use if first is not work then other will not show
    }

	if($lastname=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the lastnname')</script>";
exit();//this use if first is not work then other will not show
    }


	if($qualification=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the qualification')</script>";
exit();//this use if first is not work then other will not show
    }
		    if($number==''){
    
 echo"<script>alert('Please enter the number')</script>";
	exit();
	}

	    if($email==''){
    
 echo"<script>alert('Please enter the mail Address')</script>";
	exit();
	}


	    if($address==''){
    
 echo"<script>alert('Please enter the Address')</script>";
	exit();
	}


	   if (isset($_SESSION['username'])) {
		$username=$_SESSION['username'];
	}

  $identified = mysqli_query($dbcon,"SELECT id FROM admin WHERE user_name = '$username'");
  $row = mysqli_fetch_array($identified);
 $data=$row['id'];
  $insert_data="insert into detail (identified,firstname,lastname,qualification,number,email,address) VALUE ('$data' ,'$firstname','$lastname','$qualification','$number','$email','$address')";
    if(mysqli_query($dbcon,$insert_data))
    {
        echo"<script>window.open('view.php','_self')</script>";
    }
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>This is a simple Addressbook.</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/dropdown.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script src="js/modernizr.custom.63321.js"></script>
</head>
<body>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1 class="logo">Addressbook</h1>

				</div>
					<?php 
                    if (isset($_SESSION['username'])) {
                    	$login_username=$_SESSION['username'];
                    
					$result = mysqli_query($dbcon,"SELECT * FROM admin WHERE user_name = '$login_username'");
					$a_row = mysqli_fetch_array($result);
}
				?>
				<div class="col-md-6">
					<!-- Split button -->
					<div class="btn-group navbar-right custom-toggle">
					  <button type="button" class="btn btn-success"><?php echo $a_row['name'];?></button>
					  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="profile.php">Profile</a></li>
						
						<li class="divider"></li>
						<li><a href="logout.php">Logout</a></li>
					  </ul>
					</div>
				</div>
				
				
				<div class="menu">
					<ul>
						<li><a href="home.php">Home</a></li>
						<li class="current-menu-item"><a href="insert.php">Insert</a></li>
						<li><a href="view.php">View</a></li>
					</ul>
				</div>
				
				<div class="col-md-12">
					<div class="header">
						<h2>Insert Your Data</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="content">
						<p>Please fill up this field</p>
						<?php
							//global $e_message;
							
							if(isset($e_message)){
								echo $e_message;
							}
							
							if(isset($o_messge)){
								echo $o_messge;
							}
							
						?>
						
						
						
						<form action="insert.php" method="POST">
						  <div class="form-group">
							<label for="exampleInputName">FirstName</label>
							<input type="text" name="firstname" class="form-control" id="exampleInputName" placeholder="Enter First Name" required="required">
						  </div>
						   <div class="form-group">
							<label for="exampleInputName">LastName</label>
							<input type="text" name="lastname" class="form-control" id="exampleInputName" placeholder="Enter Last Name" required="required">
						  </div>
						   <div class="form-group">
							<label for="exampleInputName">Qualification</label>
							<input type="text" name="qualification" class="form-control" id="exampleInputName" placeholder="Enter Qualification" required="required">
						  </div>
						  <div class="form-group">
							<label for="exampleInputp-number">Phone Number</label>
							<input type="number" name="number" class="form-control" id="exampleInputp-number" placeholder="Enter Phone Number" required="required">
						  </div>
						  <div class="form-group">
							<label for="exampleInputEmail">Email</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email">
						  </div>
						   <div class="form-group">
							<label for="exampleInputEmail">Address</label>
							<input type="text" name="address" class="form-control" id="exampleInputEmail" placeholder="Enter Address">
						  </div>
						  
						  <button type="submit" name="submit" class="btn btn-default btn-submit">Submit</button>
						</form>
					</div>
				</div>
				<div class="col-md-12 footer-bg">
					<div class="footer">
						<p>&copy; All Right Reserved, Abdullah Al Shiam. <span class="mehedi-right">This Addressbook Created By <a href="http://www.facebook.com/shiam.asmshiam" target="_blank">Abdullah Al Shiam</a></span></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.dropdown.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function( $ ){
			$( '#exampleInputoper' ).dropdown( {
					gutter : 0
			});
			$('.cros').click(function(){
				$(this).parent('.e-message').slideUp();
			});
		});
	</script>
</body>
</html>