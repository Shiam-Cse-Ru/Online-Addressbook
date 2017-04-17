<?php
session_start();
include 'config.php';

if(!$_SESSION['username'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>This is a simple Addressbook.</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
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
						<li class="current-menu-item"><a href="home.php">Home</a></li>
						<li><a href="insert.php">Insert</a></li>
						<li><a href="view.php">View</a></li>
						
					</ul>
				</div>
				
				<div class="col-md-12">
					<div class="header">
						<h2>Home Page</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="content">
						<p>Addressbook Features</p>
						<div class="col-md-3">
							<div class="custom-home color-3">
								<h2>Insert</h2>
								<div class="home-caption color-3-bg">
									<h4>You can insert your Data.</h4>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="custom-home color-4">
								<h2>View</h2>
								<div class="home-caption color-4-bg">
									<h4>You can view your Data.</h4>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="custom-home color-2">
								<h2>Edit</h2>
								<div class="home-caption color-2-bg">
									<h4>You can edit your Data.</h4>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="custom-home color-1">
								<h2>Delete</h2>
								<div class="home-caption color-1-bg">
									<h4>You can delete your Data.</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 footer-bg">
					<div class="footer">
						<p>&copy; All Right Reserved, Abdullah Al Shiam <span class="mehedi-right">This Addressbook Created By <a href="http://www.facebook.com/shiam.asmshiam" target="_blank">Abdullah Al shiam </a></span></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>