<?php
session_start();
$dbcon=mysqli_connect("localhost","root","");

mysqli_select_db($dbcon,"addressbook");

if(!$_SESSION['username'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
} 


  if (isset($_SESSION['username'])) 
{
$username= $_SESSION['username'];           
} 


	if(isset($_POST["submit"])){
		$name= $_POST["fname"];
		
		$query = mysqli_query($dbcon,"update admin set name='$name' where user_name='$username' ");
		
		if($query){
			$e_message = "Profile Update Successfully";
		}
	}
	if(isset($_POST["submit_pass"])){
		
		function encryptIt( $q ) {
			$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
			$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
			return( $qEncoded );
		}

		/* function decryptIt( $q ) {
			$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
			$qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
			return( $qDecoded );
		} */
		
		$old_pass = $_POST['olpass'];
		$old_passhach = encryptIt( $old_pass );
		$old_pass_db = mysqli_query($dbcon,"SELECT * FROM admin WHERE user_name = '$username'");
		$old_pass_db_row = mysqli_fetch_array($old_pass_db);
		$db_passee = $old_pass_db_row['password'];
		$ne_pass = $_POST['nwpass'];
		$ne_passhach = encryptIt( $ne_pass ); 
		$ne_passa = $_POST['nwpassa'];

		if($db_passee!=$old_passhach){
			$e_message = "Your Old Password is Incorrect";
		}
		elseif($ne_pass != $ne_passa){
			$e_message = 'Both Password are don\'t match.';
		}
		else{
			mysqli_query($dbcon,"update admin set password='$ne_passhach' WHERE user_name='$username'");
			$e_message = "Password Change Successfully.";
			
		}
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
						<li><a href="index.php">Home</a></li>
						<li><a href="insert.php">Insert</a></li>
						<li><a href="view.php">View</a></li>
						<li class="current-menu-item"><a href="edit.php" class="disable">Profile</a></li>
					</ul>
				</div>
				
				<div class="col-md-12">
					<div class="header">
						<h2>Edit Profile</h2>
					</div>
				</div>
				
				
				<div class="col-md-12">
					<div class="content">
						<p>Edit your Details</p>
						<?php
							if(isset($_POST["submit"]) || isset($_POST["submit_pass"])){
								if(isset($e_message)){
									echo '<p class="e-message">'.$e_message.'<span class="cros">x</span>'.'</p>';
								}else{
									echo "<p class=\"e-message\">Data Not Update Successfully.<span class=\"cros\">x</span></p>";
								}
							}
						?>
						
						
							<form action="" method="POST" id="uename">
							  <div class="form-group">
								<label for="exampleInputName">Name</label>
								<input type="text" name="fname" value="<?php echo $a_row['name'];?>" class="form-control" id="exampleInputName" required="required">
							  </div>
							 
							  <button type="submit" name="submit" class="btn btn-default btn-submit">Update</button>
							</form>
							
							<form action="" method="POST" id="chpass">
							  <div class="form-group">
								<label for="exampleInputp-olpass">Old Password</label>
								<input type="password" name="olpass" placeholder="Enter Old Password" class="form-control" id="exampleInputp-olpass" required="required">
							  </div>
							  <div class="form-group">
								<label for="exampleInputp-npass">New Password</label>
								<input type="password" name="nwpass" placeholder="Enter New Password" class="form-control" id="exampleInputp-npass" required="required">
							  </div>
							  <div class="form-group">
								<label for="exampleInputp-napassn">Again New Password</label>
								<input type="password" name="nwpassa" placeholder="Enter New Password Again" class="form-control" id="exampleInputp-napassn" required="required">
							  </div>
							  <button type="submit" name="submit_pass" class="btn btn-default btn-submit">Update</button>
							</form>
						<button id="trigger_mi" class="btn btn-default btn-submit" style="float:right;position: relative; top: -40px">Change Password</button>
						
					</div>
				</div>
				<div class="col-md-12 footer-bg">
					<div class="footer">
						<p>&copy; All Right Reserved, Abdullah Al Shiam. <span class="mehedi-right">This PhoneBook Created By <a href="http://www.facebook.com/shiam.asmshiam" target="_blank"> Abdullah Al Shiam</a></span></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function( mehedi ){
			
			mehedi('.cros').click(function(){
				$(this).parent('.e-message').slideUp();
			});
			mehedi('.disable').click(function(){
				return false;
			});
			mehedi('#trigger_mi').click(function(){
				$('#uename').slideToggle();
				$('#chpass').slideToggle();
				$(this).text(function(i, v){
				   return v === 'Back' ? 'Change Password' : 'Back'
				});
			});
		});
	</script>
</body>
</html>