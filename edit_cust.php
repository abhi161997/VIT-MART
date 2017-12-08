<?php

	$email = $_POST["email_id"];
	$c_fn = $_POST["fname"];
	$c_ln = $_POST["lname"];
	$c_mob = $_POST["phone"];
    $gender = $_POST["Gender"];
    $block = $_POST["Address_block"];
    $rno = $_POST["Address_Room"];
    $cpass = $_POST["pwd1"];

    require('connect.php');

global $conn;

if(isset($email))
{
	$sql = "select * from customer where c_email = '$email'";
	$run = mysqli_query($conn, $sql);
	if($run)
	{
		$sqlupdate = "update customer set c_fn = '$c_fn', c_ln = '$c_ln', c_mob='$c_mob', c_gender='$gender', c_block = '$block', c_rno = '$rno', c_pass = '$cpass' where c_email = '$email'";

		$run1 = mysqli_query($conn, $sqlupdate);
		if($run1)
		{
			echo "<script>window.alert('updated successfully')</script>";
			header("location:custlogin.html");
		    
		}
		else
			echo "error";

	}
	else
	{
	 echo "mysqli_run_error";
     header("location:home.html");
    }
}

?>