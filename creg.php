<?php

require("connect.php");
global $conn;
function GetImageExtension($imagetype)
	     {
	       if(empty($imagetype)) 
	       	   return false;
	       switch($imagetype)
            {
	           case 'image/bmp': return '.bmp';
	           case 'image/gif': return '.gif';
	           case 'image/jpeg': return '.jpg';
	           case 'image/png': return '.png';
	           default: return false;
	        }
	     }

if(isset($_POST["submit"]))
{
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$rno = $_POST["reg_no"];
	$email = $_POST["email_id"];
	$mob = 	$_POST["phone"];
    $gender = $_POST["Gender"];
    $block = $_POST["Address_block"];
    $room = $_POST["Address_Room"];
    $campus = $_POST["Address_Campus"];
    $pw1 = $_POST["pwd1"];
    $pw2 = $_POST["pwd2"];

    if($pw1 === $pw2)
    {
    	  $filename = $_FILES["img"]["name"];
 		    $ftype = $_FILES["img"]["type"];
  
  		  $ftmp_name = $_FILES["img"]["tmp_name"];
  		  $f_error = $_FILES["img"]["error"];

  		  $ext= GetImageExtension($ftype);
  		  $imagename=date("d-m-Y")."-".time().$filename;
          $target_path = "upload/".$imagename;
          
          if(move_uploaded_file($ftmp_name, $target_path))
          {
          	$sql = "insert into customer (c_fn, c_ln, c_regno, c_email, c_image, c_mob, c_gender, c_block, c_rno, c_campus, c_pass) values ('$fname','$lname','$rno','$email','$imagename','$mob','$gender','$block','$room','$campus','$pw1');";


           $run = mysqli_query($conn, $sql);
           if($run)
           {
           	echo "Customer added Successfully";
            $crun = "create table credit".$rno."(cred_id int NOT NULL AUTO_INCREMENT Primary key, balance int, action varchar(200), action_date date);";
            $create = mysqli_query($conn, $crun);
            if($create)
            { $sbal = 1000;
              $date = date("Y-m-d");
              echo $date;
              $createrun = "insert into credit".$rno." (balance, action, action_date) values('$sbal','Joining fund Balance',".$date.")";
              if(mysqli_query($conn, $createrun))
              {
                echo "<script>window.alert('Congratulation You get a joining balance of 1000 Rs.')</script>";
              }
              else
              {
                echo "<script>windows.alert('not able to create credit table')</script>";
              }
            }
           }
           else
           {
           	exit("Error while adding customer to the database");
           }
          }
          else
          {
          	exit("Error while uploading customer image");
          }
          
    }
    else
    {
    	echo "Enter same password at both the fields";
    }

}
else
{
	header("location:home.html");
}
?>