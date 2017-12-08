<?php
include("connect.php");
global $conn;

	$cdesc = $_POST["c_desc"];
	$cname = $_POST["c_name"];

    $sql = "insert into category(cat_name,cat_desc) values('$cname','$cdesc')";
    if($run = mysqli_query($conn,$sql))
    {
    	echo "<script>window.alert('Category added Succesfully')</script>";
    	
    	
    }
    else
    {
        echo "<script>window.alert('Failed to added category')</script>";	
        
    }


?>