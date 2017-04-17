<?php
session_start();
include 'config.php';

if(!$_SESSION['username'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
} 




	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
	}else{
		header('location: view.php');
	}


	if(isset($_POST["submit"])){
	$firstname= $_POST["firstname"];
	$lastname= $_POST["lastname"];
	$qualification= $_POST["qualification"];
	$number= $_POST["number"];
	$email= $_POST["email"];
	$address = $_POST["address"];
	//  date_default_timezone_set('Asia/Dacca');
	// $time=getdate();
	 $query="UPDATE detail SET firstname='$firstname',lastname='$lastname',qualification='$qualification',number='$number',email='$email',address='$address' WHERE id='$id'";
    $result=mysqli_query($dbcon,$query);
  

if($result){
	$message="Data Update Successfully";
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
						<li><a href="insert.php">Insert</a></li>
						<li><a href="view.php">View</a></li>
						<li class="current-menu-item"><a href="edit.php" class="disable">Edit</a></li>
					</ul>
				</div>
				
				<div class="col-md-12">
					<div class="header">
						<h2>Edit details</h2>
					</div>
				</div>
				
				<?php 
					$result = mysqli_query($dbcon,"select * from Detail where id='$id'");
					while($row = mysqli_fetch_array($result)){
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$qualification = $row['qualification'];
						$number = $row['number'];
						$email = $row['email'];
						$address = $row['address'];
					}
					
				?>
				<div class="col-md-12">
					<div class="content">
						<p>Edit your Details</p>
 
						<?php
							
							
							if(isset($_POST["submit"])){
							if($message){
								echo '<p class="e-message">'.$message.'<span class="cros">x</span>'.'</p>';
							}else{
								echo "Data Not Update Successfully.";
							}
							}
						?>  

						<form action="edit.php" method="POST">
						  <div class="form-group">
							<label for="exampleInputName">FirstName</label>
							<input type="text" name="firstname" value="<?php echo $firstname;?>" class="form-control" id="exampleInputName" required="required">
						  </div>
						   <div class="form-group">
							<label for="exampleInputName">LastName</label>
							<input type="text" name="lastname" value="<?php echo $lastname;?>" class="form-control" id="exampleInputName" required="required">
						  </div>
						   <div class="form-group">
							<label for="exampleInputName">Qualification</label>
							<input type="text" name="qualification" value="<?php echo $qualification;?>" class="form-control" id="exampleInputName" required="required">
						  </div>
						  <div class="form-group">
							<label for="exampleInputp-number">Phone Number</label>
							<input type="number" name="number" value="<?php echo $number;?>" class="form-control" id="exampleInputp-number" required="required">
						  </div>
						  <div class="form-group">
							<label for="exampleInputEmail">Email</label>
							<input type="email" name="email" value="<?php echo $email;?>" class="form-control" id="exampleInputEmail">
						  </div>
						 
						  <div class="form-group">
							<label for="exampleInputName">Address</label>
							<input type="text" name="address" value="<?php echo $address;?>" class="form-control" id="exampleInputName" required="required">
						  </div>
						  
						  
						  <button type="submit" name="submit" class="btn btn-default btn-submit">Update</button>
						  <input type="hidden" name="id" value="<?php echo $id;?>" />
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
		jQuery(document).ready(function( mehedi ){
			mehedi( '#exampleInputoper' ).dropdown();
			mehedi('.cros').click(function(){
				$(this).parent('.e-message').slideUp();
			});
			mehedi('.disable').click(function(){
				return false;
			});
		});
	</script>
</body>
</html>