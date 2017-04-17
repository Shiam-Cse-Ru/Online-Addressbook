<?php
//load the database configuration file
session_start();
include 'config.php';
if(!$_SESSION['username'])
{

    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}

 
$target_dir = dirname(__FILE__)."/Uploads/";

if(isset($_POST["import"]) && !empty($_FILES)) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if($fileType != "csv")  // here we are checking for the file extension. We are not allowing othre then (.csv) extension .
    {
                  echo "<script type=\"text/javascript\">
                        alert(\"Only CSV file is allowed.\");
                        window.location = \"view.php\"
                    </script>";
    }
    else
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       
            
            if (($getdata = fopen($target_file, "r")) !== FALSE) {
               fgetcsv($getdata);   
               while (($data = fgetcsv($getdata)) !== FALSE) {
                    $fieldCount = count($data);
                    for ($c=0; $c < $fieldCount; $c++) {
                      $columnData[$c] = $data[$c];
                    }
                       if (isset($_SESSION['username'])) {
        $username=$_SESSION['username'];
    }

              $identified = mysqli_query($dbcon,"SELECT id FROM admin WHERE user_name = '$username'");
              $row = mysqli_fetch_array($identified);
              $data=$row['id'];

             $firstname = mysqli_real_escape_string($dbcon ,$columnData[0]);
             $lastname = mysqli_real_escape_string($dbcon ,$columnData[1]);
             $qualification = mysqli_real_escape_string($dbcon ,$columnData[2]);
             $number = mysqli_real_escape_string($dbcon ,$columnData[3]);
             $email = mysqli_real_escape_string($dbcon ,$columnData[4]);
             $address = mysqli_real_escape_string($dbcon ,$columnData[5]);
             $import_data[]="('".$data."','".$firstname."','".$lastname."','".$qualification."','".$number."','".$email."','".$address."')";
            // SQL Query to insert data into DataBase
            
             }
             $import_data = implode(",", $import_data);
             $query = "INSERT INTO detail(identified,firstname,lastname,qualification,number,email,address) VALUES  $import_data ;";
             $result = mysqli_query($dbcon ,$query);

          echo "<script type=\"text/javascript\">
                        alert(\"CSV File Has Been Successfully Imported.\");
                        window.location = \"view.php\"
                    </script>";

             fclose($getdata);
            }
                
        } else {
          echo "<script>  alert('Not upload') </script>";
        }
    }
}
   

//redirect to the listing page
//header("Location: view.php".$qstring);

?>
    
