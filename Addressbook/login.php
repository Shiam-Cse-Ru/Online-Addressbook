
<?php 
session_start();
$dbcon=mysqli_connect("localhost","root","");

mysqli_select_db($dbcon,"addressbook");


if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $userpass=$_POST['password'];

    $check_user="select * from admin WHERE user_name='$username'AND password='$userpass'";

    $run=mysqli_query($dbcon,$check_user);

    if(mysqli_num_rows($run))
    {
        echo "<script>window.open('index.php','_self')</script>";

        $_SESSION['username']=$username;//here session is used and value of $user_email store in $_SESSION.

    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}


if(isset($_POST['signup']))
{
    $name=$_POST['name'];//here getting result from the post array after submitting the form.
    $username=$_POST['username'];//same
    $email=$_POST['email'];//same
  $password=$_POST['password'];//same

    if($name=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the name')</script>";
exit();//this use if first is not work then other will not show
    }

    if($username=='')
    {
        echo"<script>alert('Please enter the username')</script>";
exit();
    }

    if($email=='')
    {
        echo"<script>alert('Please enter the email')</script>";
    exit();
    }

     if($password=='')
    {
        echo"<script>alert('Please enter the password')</script>";
    exit();
    }
//here query check weather if user already registered so can't register again.
    $check_email_query="select * from admin WHERE user_name='$username'";
    $run_query=mysqli_query($dbcon,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Email $username is already exist in our database, Please try another one!')</script>";
exit();
    }
//insert the user into the database.
    $insert_user="insert into admin (name,user_name,email,password) VALUE ('$name','$username','$email','$password')";
    if(mysqli_query($dbcon,$insert_user))
    {
        echo"<script>window.open('login.php','_self')</script>";
    }

}


 ?>



<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	
</head>
<body class="login-body">
	<section>
		<div class="container login-container">
			<div class="row">
				
				<div class="col-md-12">
					<div class="header">
						<h1 class="logo">Addressbook Login</h1>
					</div>
				</div>
				
				<div class="col-md-12">
					<section class="login-form content ">
						<div class="top-text">
						
							
						</div>
						
					
						<form action="login.php" method="POST" class="login">
						
							<div class="form-group">
							<label for="exampleInputName">User Name</label>
							<input type="text" name="username" placeholder="Enter Your User Name" class="form-control" id="exampleInputName" required="required">
						  </div>
						  <div class="form-group">
							<label for="exampleInputp-number">Password</label>
							<input type="password" name="password" placeholder="Enter Your Password" class="form-control" id="exampleInputp-number" required="required">
						  </div> 
						<button type="submit" name="submit" class="btn btn-default btn-submit submit">Login</button> 
						</form>
						
						<!-- Sign UP Form -->
						<form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="POST"  class="register">
						  <div class="form-group">
							<label for="exampleInputName1">Name</label>
							<input type="text" name="name" placeholder="Enter Your Name" class="form-control" id="exampleInputName1" required="required">
						  </div>
						  <div class="form-group">
							<label for="exampleInputp-uname">Username</label>
							<input type="text" name="username" placeholder="Enter Your Username" class="form-control" id="exampleInputp-uname" required="required">
						  </div>
						  <div class="form-group">
							<label for="exampleInputpfafa">Email</label>
							<input type="email" name="email" placeholder="Enter Your email" class="form-control" id="exampleInputpfafa" required="required">
						  </div>
						    <div class="form-group">
							<label for="exampleInputpfafa">Password</label>
							<input type="pass" name="password" placeholder="Enter Your password" class="form-control" id="exampleInputpfafa" required="required">
						  </div>
						  
						  <button type="submit" name="signup" class="btn btn-default btn-submit signup">Sign up</button> 
						</form>
						
						<span class="toggle btn-submit btn btn-default"><?php if(isset($sdf)){echo 'Back';}else{echo 'Sign Up';}?></span>
						
						
					</section>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			
			$('.cros').click(function(){
				$(this).parent('.e-message').slideUp();
			});
			$('.toggle').click(function(){
				$(this).text(function(i, v){
				   return v === 'Back' ? 'Sign Up' : 'Back'
				});
				$('.login').slideToggle();
				$('.register').slideToggle();
				$('#top-text').text(function(l, m){
					return m === 'Need account singup !' ? 'Login your Account' : 'Need account singup !'
				});
				$('title').text(function(f, h){
					return h === 'Need account singup !' ? 'Login your Account' : 'Need account singup !'
				});
			
				
       
				return false;
			});
			$('.forgot-pass p').click(function(){
				$('.for-pass').slideToggle();
			});	
		});

	</script>
</body>
</html>