<?php

include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="navbar">
       <div class="logo">
           <a href="index.php"><img src="images/logo.png" width ="125px"></a>
       </div>
       <nav>
           <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>        
                <li><a href="contact.php">Contact</a></li>
                <li><a href="slogin.php">Seller Account</a></li>
                <li><a href="clogin.php">Customer Account</a></li>
                
           </ul>
       </nav>
       <a href="cart.php?custid='$cust_mail'"><img src="images/cart.png" width="30px" height="30px"></a>
   </div>
  </div> 
  	<section class="search-product">
        <div class="container">

            <form action="search.php" method="POST">
                <input type="search" name="search" placeholder="Search your needs.." required>
                <input type="submit" name="submit" value="Search" class="search-btn">
            </form>

        </div>
    	</section>
  
  <div class="small-container">
   <div class="row row-2">
       <h2>ALL PRODUCTS</h2>
      <nav>
           <ul>
                <li><a href="productbyprice.php"><u>View by Price</u></a></li>
                <li><a href="productbyname.php"><u>View by Name</u></a></li>
                <li><a href="bycategory.php"><u>View by Category</u></a></li>
           </ul>
       </nav>
   </div>
    <div class="row">
       
       
        <?php
            $sq="SELECT product.id,product.pname,product.pdetail,product.price,product.availity,product.picture,product.category,seller.store,seller.saddress FROM product,seller where product.sphone=seller.sphone LIMIT 8,8";
            $result=mysqli_query($conn,$sq);

            $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $pid=$row['id'];
                    $saddress=$row['saddress'];
                    $store=$row['store'];
                    $pname=$row['pname'];
                    $pdetail=$row['pdetail'];
                    $price=$row['price'];
                    $availity=$row['availity'];
                    $category=$row['category'];
                    $picture=$row['picture'];                    
                
            echo ' <div class="col-4">
            <img src="images/'. $picture.'">
            <h4>'.$pname.'</h4>
            <p> RS. '.$price.'/kg </p>
            <h3> '.$store.' </h3>
            <p> '.$saddress.' <p>
            <a href="order.php?productid='.$pid.'" class= "btn-order">Order Now</a>
            </div>';
                }
            }
        ?>
  
    </div>
</div>

<a href="product.php"><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&laquoPrevious Page</h2></a><br>
<!------------------------------------footer-------------------------------->
<div class="footer">
    <div class="container">
        <div class="row">

            <div class="footer-col">
                <h3>Follow Us On</h3>
                <ul>
                    <li>
                        <a href=""><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                    </li>
                    <li>
                        <a href=""><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                    </li>
                    <li>
                        <a href=""><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                    </li>
                </ul>
            </div>
        </div> 
    </div>
     <div class="copyright"><p>All rights reserved.</p></div>
</div>  
</body>
</html>