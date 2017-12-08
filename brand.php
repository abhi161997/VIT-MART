<?php
include("connect.php");
global $conn;

	$bdesc = $_POST["b_desc"];
	$bname = $_POST["b_name"];
    $bval = urlencode($_POST["b_value"]);
    $bval = floatval($bval);

    $sql = "insert into brand(brand_name, brand_description, popularity) values('$bname','$bdesc',$bval)";
    if($run = mysqli_query($conn,$sql))
    {
    	echo "<script>window.alert('brand added Succesfully')</script>";
    	
    	
    }
    else
    {
        echo "<script>window.alert('Failed to added Brand')</script>";	
        
    }


?>