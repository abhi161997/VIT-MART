<?php
$item = $_POST["itemid"];
include('connect.php');
global $conn;
$da = date("Y-m-d");
$sql = "update product set quantity = quantity-1 where p_id = $item";

if(mysqli_query($conn,$sql))
{
	$selprod = "select * from product where p_id = '$item'";
	$run = mysqli_query($conn, $selprod);
$row1 = mysqli_fetch_array($run);


 
 if(mysqli_query($conn,$sql1))
 {
 	echo "<script>alert('purchased successfully')</script>";
 } 
}
?>