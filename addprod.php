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
  $ptitle = $_POST["p_title"];
  $cat = $_POST["cat_id"];
  $brand = $_POST["brand_id"];
  $p_price = urlencode($_POST["pur_price"]);
  $p_price = floatval($p_price);
  $s_price = urlencode($_POST["sel_price"]);
  $s_price = floatval($s_price);
  $quantity = urlencode($_POST["quantity"]);
  $quantity = floatval($quantity);
  $pdate = $_POST["pdate"];
  $description = $_POST["desc"];
  $manu = $_POST["manufac"];

  $f1name = $_FILES["img1"]["name"];
  $f1type = $_FILES["img1"]["type"];
  
  $f1tmp_name = $_FILES["img1"]["tmp_name"];
  $f1_error = $_FILES["img1"]["error"];

  $ext1= GetImageExtension($f1type);
  $imagename1=date("d-m-Y")."-".time().$f1name;
  $target_path1 = "upload/".$imagename1;
  
  $f2name = $_FILES["img2"]["name"];
  $f2type = $_FILES["img2"]["type"];
  $f2size = $_FILES["img2"]["size"];
  $f2tmp_name = $_FILES["img2"]["tmp_name"];
  $f2_error = $_FILES["img2"]["error"];
  
  $ext2= GetImageExtension($f2type);
  $imagename2=date("d-m-Y")."-".time().$f2name;
  $target_path2 = "upload/".$imagename2;
  
  if(move_uploaded_file($f1tmp_name, $target_path1) or move_uploaded_file($f2tmp_name, $target_path2))
  {
  $sql = "insert into product(p_title, p_category, p_brand, p_pur_price, p_sel_price,date_of_pur,quantity, img_1, img_2, description, m_name) values('$ptitle','$cat','$brand',$p_price,$s_price,'$pdate',$quantity,'$imagename1','$imagename2','$description','$manu');";

  if(mysqli_query($conn, $sql))
  {
  	echo "Product inserted Successfully";
  }
  else
  {
  	echo "Not able to insert product";
  }
 }
 else
 {
 	exit("Error while uploading file into the server");
 }


}
else{
	header("location:index.html");
}

?>