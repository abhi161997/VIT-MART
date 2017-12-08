<?php
$email = $_POST["Email_Id"];
$pass = $_POST["pwd1"];
session_start();
if(isset($email) and isset($pass))
{
	require("connect.php");
	global $conn;

	$sql = "select * from customer where c_email='$email' and c_pass = '$pass'";
	$run = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($run) == 1)
	{
          $row = mysqli_fetch_assoc($run);
          $_SESSION["cname"] = $row["c_fn"]." ".$row["c_ln"];
	}
	else
	{
		header("location:home.html");
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<style type="text/css">
		.ptable{
			width:800px;
			text-align: center;
		    margin: auto;
		}
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
     .main_bar{
     	margin-left:10%;
     	margin-right:10%;
     }
     .slide_bar{
                 width:100%;
                 padding-top:30px;
     }
     .content{
     	margin-top:20px;
     	margin-bottom: 5%;
     	margin-left:10%;
     	margin-right: 10%;
     }
      #img1{
      	margin-left:9%
      	margin-right:10%; 
      	width:100%;
      	height: 350px;
      	position: relative;
      	padding:10px;
      	background:white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        text-align: center;
      }

      .description{
      	margin-right: 10%;
      	margin-left: 10%;
      }
      
      .mid_page{
      	 margin-top:30px; 
         width: 100%;
         background-color:#8A0651 ;
         height: 75px;
      } 

      .mid_page_content{
      	width:100%;
      }
      
      #m_p_c{
      	text-align: center;
      	font-size: 44px;
      	font-family: times;
      	color:#FFFFFF;
      	padding-top: 13px;
      	width:100%;
      }
      div.description{
      	  width: 250px;
      	  height: 150px;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          text-align: center;
          padding-top: 15px;
          margin-top:20px; 


      }
       .desc{
       	margin-top: 40px;
       	padding-left: 110px;
       	width: 100%;
       }
       .footer{
       	 margin-top:30px;
       	 width:100%;
       	 background-color:#434343;
         height:200px;
       }
       .bottom{
       	width:100%;
       	background-color:#000000;
       	height:50px;
       }
       .quote{
       	position:relative;
       	width:200px;
       	height:200px;
       }
       #f_table{
       	margin-left:5%;
       	margin-right:5%; 
       }
       .pa{
       	   width:200px;
       	   height: 400px;
       }
       .b1{
       	float:left;
       	width:49%;
       }
       .b2{
       	float:right;
        width:49%;
       }
       .ptable{
       	margin-top: 20px;
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
                    <li class="li_top"><a href="logout.php" class='a11'>Logout</a> |</li>
                    
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
                    <li class="li_top"><a href="logout.php" class='a11'>Logout</a> |</li>
                    <li class="li_top"><a href="categories.html" class='a11'>Categories</a> |</li>
                    <li class="li_top"><a href="brands.html" class='a11'>Brands</a> |</li>
                    <li class="li_top"><a href="aboutus.html" class='a11'>About Us!</a> </li>
                    <li class="li_top"><a href="edit_cust.html" class='a11'>Edit your details</a> </li>
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

<?php

echo "welcome ".$_SESSION["cname"];
?>


<?php
	$sql1 = "select * from product order by rand() limit 5";
	$result = mysqli_query($conn, $sql1);
	if(mysqli_num_rows($result))
	{
		?>
		<table border="1px black" width="auto" class = "ptable">
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Category</th>
				<th>Brand</th>
				<th>Price(Rs.)</th>
				<th>Manufacturer</th>
				<th>Reviews</th>
				<th>Buy</th>
				<th>view</th>
			<tr>	
		<?php
		while($row1 = mysqli_fetch_array($result))
		{
			?><form method="post" action = "purchase.php">
               <tr>
               	<td><?php echo "<img src='upload/".$row1["img_1"]."' width='180px' height='180px'>"?></td>
                 <td><?php echo $row1["p_title"] ?></td>
                 <td><?php echo $row1["p_category"] ?></td>
                 <td><?php echo $row1["p_brand"] ?></td>
                 <td><?php echo $row1["p_sel_price"] ?></td>
                 <td><?php echo $row1["m_name"] ?></td>
                 <td><?php echo $row1["description"] ?></td>
                 <input type = "text" value=<?php echo $row1['p_id'] ?> name = "pur"class = "ind" hidden>
                 <td><input type = "submit" value= "buy"></td>
                 <td><button>View</button></td>
                 
                 
               </tr>
              </form>
			<?php
		}
	}
}
?>
</table>
<section class="footer">
          <ul>
            <li><center>VIT MART Private Limited</center></li>
            <li></li>
          </ul>
     </section>
     <section class="bottom">
          <center><p id = "bot"><b>Made By Abhinaw Gupta(15BCE0677)</b></p></center>
     </section>

</body>
</html>

