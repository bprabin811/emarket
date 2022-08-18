<?php

include 'config.php';
 $pid=$_GET['productid'];
    $sql="SELECT *FROM product where id=$pid";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $pname=$row['pname'];    
    $pdetail=$row['pdetail'];
    $availity=$row['availity'];
    $price=$row['price'];
    $picture=$row['picture'];
    $sphone=$row['sphone'];

if(isset($_POST['addcart'])){
    $sphone=$row['sphone'];
    $pname=$row['pname'];
    $price=$row['price'];
    $quantity=$_POST['quantity'];
    $cphone=$_POST['cphone'];
    $total=$price*$quantity;
    
    $sq= "SELECT *FROM costumer WHERE cphone='$cphone'";
    $result=mysqli_query($conn,$sq);
    if(!$result->num_rows>0){ 
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Create Costumer account first.');
            window.location.href='customer.php';
            </script>");
    }else{
        
        $sql="INSERT INTO `order` (`sphone`, `pname`, `price`, `quantity`, `total`, `cphone`) VALUES ('$sphone','$pname', '$price', '$quantity', '$total', '$cphone')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Added on cart successfully.');
            window.location.href='product.php';
            </script>");
        }else{
            echo "<script>alert('Something went wrong.')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add to Cart</title>
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
                <li><a href="product.php">Products</a></li>
                <li><a href="aboutus.php">About</a></li>        
                <li><a href="contact.php">Contact</a></li>
           </ul>
       </nav>
       <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
   </div>
  </div> 
   
   <div class="addproduct-page">
       <div class="container">
           <div class="row">
               <div class="col-3">
                       <form action="" method="post">
                       
                       <div class="col-3">
                       <?php 
                          echo'<img src="images/'.$picture.'">'; 
                            ?>
                           </div>
                       <p><u>Product name:</u></p>
<!--                       <input type="text" name="pname" value=<?php echo $pname;?> readonly>-->
                       <?php echo '<h4>'.$pname.'</h4>';?>
                       <p><u>Product Details:</u></p>
                       <textarea name="pdetail" cols="40" rows="15" readonly><?php echo" $pdetail " ;?></textarea>
                       <p><u>Product Price:</u></p>
                       <?php echo '<h4> RS. '.$price.'/kg </h4>';?>
<!--<p> RS. '.$price.'/kg </p>
                       <p>Total Available (in KG):</p>
                       <input type="text" name="availity"  value=<?php echo $availity;?> readonly>
-->
                       <p><u>Enter Quantity you need:</u></p>
<!--                       <input type="text" name="quantity" autocomplete="off" required>-->
                       <input type="number" min="2" max="10000" name="quantity" autocomplete="off" required>

                        <p><u>Enter Your Phone No:</u></p>
                       <input type="text" name="cphone" autocomplete="off" required>
                        <button name="addcart" type="submit" class="btn">Add to cart</button>
                   </form>
                   
                  
               </div>
           </div>
       </div>
   </div>
    <br>
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
</body>
</html>