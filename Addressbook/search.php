
<?php session_start();
include 'config.php';



if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Members data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}

if(!$_SESSION['username'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
} ?>
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
						<li><a href="home.php">Home</a></li>
						<li><a href="insert.php">Insert</a></li>
						<li class="current-menu-item"><a href="view.php">View</a></li>
					</ul>
				</div>
				
				<div class="col-md-12">
					<div class="header">
						<h2>View Data</h2>

					</div>
				</div>
				<div class="col-md-12">
					<div class="content">

					<div class="padding" style=" padding-left: 790px;">
             <form method="post" action="search.php">
	        <input type="text" name="search_text" ">&nbsp
	        <button class="btn btn-primary">search</button>
	        </form><br>
	        </div>
						<p>View all your details</p>
		
						<table class="table table-striped">
						  <thead>
							<tr>
							  <th>FirstName</th>
							   <th>LastName</th>
							    <th>Qualification</th>
							  <th>Number</th>
							  <th>Email</th>
							   <th>Address</th>
							  <th>Action</th>
							</tr>
						  </thead>

						  <tbody>
						  

						  <?php
						  if (isset($_SESSION['username'])) {
						  	$username=$_SESSION['username'];
						  }
                           
                           if (isset($_POST['search_text'])) {
	                         $search_text=$_POST['search_text'];
                               }

	
                           if (!empty($search_text)) {



						   $identified = mysqli_query($dbcon,"SELECT id FROM admin WHERE user_name = '$username'");
						    $row= mysqli_fetch_array($identified);
                            $data=$row['id'];

							$result = mysqli_query($dbcon,"SELECT * FROM  detail WHERE  firstname LIKE '%$search_text%' OR id LIKE '%$search_text%' AND identified='$data'" );

                             
							
							
							while($row = mysqli_fetch_array($result)){

								
								?>
      
							<tr>
							  <th><?php echo $row['firstname'];?></th>
							    <th><?php echo $row['lastname'];?></th>
							  <td><?php echo $row['qualification'];?></td>
							  <td><?php echo $row['number'];?></td>
							   <th><?php echo $row['email'];?></th>
							  <td><?php echo $row['address'];?></td>



							  <td>
								<a href="edit.php?id=<?php echo $row['id'];?>">Edit</a>
								 | <a href="#"  data-toggle="modal" data-target="#mehedi<?php echo $row['id'];?>">View All</a>
								 | <a href="delete.php?id=<?php echo $row['id'];?>">Delete</a>
							  </td>

							</tr>

								<!-- Modal -->
								<div class="modal fade" id="mehedi<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel">View All your Details</h4>
									  </div>

									  <div class="modal-body">
										<ul>
											<li><h4><span>FirstName : </span> <?php echo $row['firstname'];?></h4></li>
											<li><h4><span>LastName : </span> <?php echo $row['lastname'];?></h4></li>
											<li><h4><span>Qualification : </span> <?php echo $row['qualification'];?></h4></li>
											<li><h4><span>Number : </span> <?php echo $row['number'];?></h4></li>
											<li><h4><span>Email : </span> <?php echo $row['email'];?></h4></li>
											<li><h4><span>Address : </span> <?php echo $row['address'];?></h4></li>
											
										</ul>
									  </div>
									   <div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									  </div>
									</div>
								  </div>
								</div>	
						<?php	}
					}


						  
						  ?>
							
						
						  </tbody>

						</table>
				
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

</body>
</html>



