<?php
include("connect.php");
global $conn;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
    <style type="text/css">
     *{
       margin:0px;
       padding:0px;
     }
     .top_bar{
          width: 100%;
          height:60px;
          background-color:#8A0651; 
     }
     .top_side_left{
         margin-left: 10%;
         color:#FFFFFF;
         padding-top: 18px;
         float: left;
     }
      .top_mid_side_left{
         margin-left: 10%;
         color:#FFFFFF;
         padding-top: 8px;
         float: left;
     }
     .top_side_right{
     	margin-right: 10%;
     	color:#FFFFFF;
     	padding-top: 18px;
     	float: right;
     }
     .top_mid_side_right{
         margin-right: 10%;
         color:#FFFFFF;
         padding-top: 8px;
         float: right;
     }
     #offer{
     	border: 1px solid #FFFFFF;
     	width: 200px;
     	text-align: center;
     }
     #a1{
         color:#FFFFFF;
         font-size: 16px;
         transition: 1s;
     }
     #a1:hover{
          background-color: #FFFFFF;
          color: #8A0651;
     }
     .top_ul{
     	    list-style-type: none;
     }
     .li_top{
         display:inline-block;
         color:#FFFFFF;
     }
     .a11{
          text-decoration: none;
     	  color: #ffffff;
     }
     .s_bar{
     	  width: 100%;
          height: 40px;
          background-color:#424242; 
     }
     .top_ul_1{
     	    list-style-type: none;
     	    margin: 0px;
     }
     .prod_ins{
     	margin-left:20%;
     	margin-right:20%;
     	padding-top: 30px;
     }
     #h{
     	margin-bottom:10px; 
     }
     td{
     	padding-left: 10px;
     }
     .footer{
       	margin-top: 30px;
       	 width:100%;
       	 background-color:#434343;
         height:200px;
       }
       .bottom{
       	width:100%;
       	background-color:#000000;
       	height:50px;
       }
     </style>
</head>
<body>
      <section class="top_bar">
            <div class="top_side_left">
            	<p id="offer"><a href="#" id="a1">Get flat 35% off on order 50$</a></p>
            </div>
            <div class="top_side_right">
                 <ul class="top_ul">
                    <li class="li_top"><a href="#" class='a11'>Login</a> |</li>
                    <li class="li_top"><a href="#" class='a11'>Register</a> |</li>
                    <li class="li_top"><a href="#" class='a11'>Contact</a> |</li>
                    <li class="li_top"><a href="#" class='a11'>About Us!</a> </li>
                 </ul>
            </div>
     </section>
     <section class="s_bar">
          <div class="top_mid_side_left">
                 <ul class="top_ul_1">
                    <li class="li_top"><a href="home.html" class='a11'><b>VIT-MART</b></a> |</li>
                    <li class="li_top"><a href="home.html" class='a11'>Home</a> |</li>
                    <li class="li_top"><a href="signin.html" class='a11'>Sign In</a> |</li>
                    <li class="li_top"><a href="registration_form.html" class='a11'>Sign Up</a> |</li>
                    <li class="li_top"><a href="#" class='a11'>About Us!</a> </li>
                 </ul>
            </div>
            <div class="top_mid_side_right">
                    <form>
                    <table>
                    <tr>
                    <td><input type="text" placeholder="Search..."></input></td> 
                    <td><input type="submit" value="OK!"></input></td> 
                    </tr>
                    </table>
                    </form>
                 </ul>
            </div>
     </section>
     <section class="prod_ins">
     	<h1 id="h"><b>ADD Product</b></h1>
     	<form name="insert_product" method="post" action="addprod.php" enctype="multipart/form-data">
            <table width="95%" height="500px" align="center" cellpadding="5" cellspacing="5" border="1px">
               <tr>
                  <td><b>Product Title</b></td>
                  <td><input type = "text" name="p_title" placeholder="Product Name" pattern="[A-Za-z0-9 ]{1,50}" title="Product name should contain only alphabet"></td>  
               </tr>
               
                <tr>
                <td><b>Select Category</b></td>
                 <td><select name="cat_id">
                <?php
                $sql = "select * from category order by rand()";
                $run = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($run))
                {
                ?>
               
                	 
                    <?php
                     echo "<option value='".$row["cat_name"]."'>".$row["cat_name"]."</option>";
                    
                    ?>
               
                    <?php
                }
                ?>
                </select>
                 </td>
                </tr>
                <tr>
                  <td><b>Select Brand</b></td>
                  <td><select name="brand_id">
                     <?php
                $sql = "select * from brand order by rand()";
                $run = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($run))
                {
                ?>
               <?php
                     echo "<option value='".$row["brand_name"]."'>".$row["brand_name"]."</option>";
                    
                    ?>
               
                    <?php
                }
                ?>
                      </select>
                  </td>  
               </tr> 
                <tr>
                <td><b>Purchase Price</b></td>
                <td><input type="text" name="pur_price">
                </td>
                </tr> 
                <tr>
                <td><b>Selling Price</b></td>
                <td><input type="text" name="sel_price">
                </td>
                </tr>
                <tr>
                <td><b>Quantity</b></td>
                <td><input type="text" name="quantity">
                </td>
                </tr>
                <tr>
                <td><b>Date</b></td>
                <td><input type="date" name="pdate">
                </td>
                </tr>
                <tr>
                <td><b>Image-1</b></td>
                <td><input type="file" name="img1">
                </td>
                </tr>
                <tr>
                <td><b>Image-2</b></td>
                <td><input type="file" name="img2">
                </td>
                </tr>
                <tr>
                <td><b>Description</b></td>
                <td><input type="text" name="desc" placeholder="description" maxlength="255">
                </td>
                </tr>
                <tr>
                <td><b>Manufacturer</b></td>
                <td><input type="text" name="manufac" placeholder="Manufacturer Name" maxlength="255">
                </td>
                </tr>
                <tr>
                <td><b>Confirm</b></td>
                <td><input type="submit" name="submit" value="ADD PRODUCT">
                </td>
                </tr>
            </table>
     	</form>
     </section>
     <section class="footer">
     </section>
     <section class="bottom">
     	
     </section>
</body>
</html>