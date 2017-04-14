<?php
session_start();
$dbcon=mysqli_connect("localhost","root","");

mysqli_select_db($dbcon,"addressbook");

if (isset($_SESSION['username'])) {
						  	$username=$_SESSION['username'];
						  }

if (isset($_POST['submit'])) {

$filename = "Information.csv";
$fp = fopen('php://output', 'w');

	$header = array(
				           'Firstname',
							'LastName',
							'Qualification',
							 'Phone Number',
							
							'Email',
							'Address',
											
						);	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

 $identified = mysqli_query($dbcon,"SELECT id FROM admin WHERE user_name = '$username'");
  $row= mysqli_fetch_array($identified);
 $data=$row['id'];


$query = "select firstname,lastname,qualification,number,email,address from detail where  identified='$data'";
$result = mysqli_query($dbcon,$query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
}
exit;
?>