<!DOCTYPE html>
<html>
<head>
	<title>Purchase Page</title>
	<style>
    
    .pd, td,th{
    	border:2px solid black;
    }
</style>

</head>
<body>
<form action = "buy.php" method = "post">
<?php
$pur = $_POST["pur"];
echo $pur;
include("connect.php");
global $conn;
$sql = "select * from product where p_id =".$pur;
$run = mysqli_query($conn,$sql);
if($run)
{
	$row = mysqli_fetch_array($run);
	$source = "upload/".$row["img_1"];
	?>
       <table class="pd">
       	 <tr>
       	 	<th>Image</th>
       	 	<th>Product Name</th>
       	 	<th>Product Category</th>
       	 	<th>Product Brand</th>
       	 	<th>Price</th>
       	 </tr>
       	 <tr>
       	 	<td><img src="<?php echo $source ?>" height="300px"></td>
       	 	<td><?php echo $row["p_title"]?></td>
       	 	<td><?php echo $row["p_category"]?></td>
       	 	<td><?php echo $row["p_brand"]?></td>
       	 	<td><?php echo $row["p_pur_price"]?></td>
       	 </tr>
       </table>

	<?php
}
else
	{
		echo "error";
	}

?>
<form method = "post" action = "buy.php">

	<input type = "text" value=<?php echo $pur ?> name = "itemid" class = "ind" hidden>
	<input type = "submit" value="BUY confirm">
</form>
</body>
</html>
