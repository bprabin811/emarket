<?php

include 'config.php';
error_reporting(0);
$sql="SELECT *FROM `order`";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
     $oid=$row['id'];
     $sphone =$row['sphone'];
     $pname=$row['pname'];
     $price=$row['price'];
     $quantity=$row['quantity'];
     $total=$row['total'];
     $cphone=$row['cphone'];

if(isset($_POST['update'])){
    $oid=$row['id'];
    $sphone =$row['sphone'];
    $pname=$row['pname'];
    $price=$row['price'];
    $quantity = $_POST['quantity'];
    $total=$quantity*$price;
    $cphone=$row['cphone'];
    
    
    
   $sql="UPDATE `order` SET id='$oid', sphone='$sphone',pname='$pname',price='$price',quantity='$quantity',total='$total',cphone='$cphone' WHERE pname='$pname'";
    $res=mysqli_query($conn,$sql);
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
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
                <li><a href="slogin.php">Seller Account</a></li>
                <li><a href="clogin.php">Customer Account</a></li>
                

           </ul>
       </nav>
       <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
   </div>
  </div> 
<!-----------------------------cart------------------------------>
<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity(In kg)</th>
            <th>Total</th>
        </tr>
        
        
        <tbody>
           <?php
            $sq="SELECT order.pname,order.quantity,order.price,order.total,product.picture FROM `order`,`product` WHERE product.pname=order.pname";
            $result=mysqli_query($conn,$sq);
            $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $pname=$row['pname'];
                    $price=$row['price'];
                    $quantity=$row['quantity'];
                    $picture=$row['picture'];
                    $total=$row['total'];
                    
                    echo '  <tr>
            <td><div class="cartinfo">
             <img src="images/'. $picture.'">
            <div>
                <p>'.$pname.'</p>
                <small>Price: Rs. '.$price.'</small>
                <br>
                <a href="deletefromcart.php?deleteproduct='.$pname.'">Remove</a>
            </div>
        </div></td>
        <td>
        
         <form action="" method="post">
         <input type="number" min="2" max="500" name="quantity" value='.$quantity.'>kg 
         <button name="update" type="submit">Update</button>
         </form></td>
        <td>Rs. '.$total.'</td>
        </tr>';
                }
            }
    
    ?>
        
       </tbody>
       
    </table>
    <div class="total-price">
        <table>
            <tr>
               
                <td>Total</td>
                <td><?php
                     $sql="SELECT SUM(total) AS summ FROM `order`";
                    $result=mysqli_query($conn,$sql);
                    while ($row =mysqli_fetch_assoc($result)){
                        echo 'Rs. '.$row['summ'].'';
                        
                    }
                    
        
                    ?>
                    </td>
            </tr>
            <tr>
                <td></td>
                <td>
                
                <?php 
                    $sq="SELECT cphone from `order`";
            $result=mysqli_query($conn,$sq);
            $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $cphone=$row['cphone'];
                   
                }
            }
                     echo'<a href="Confirmation.php?cid='.$cphone.'" class= "btn-order"> Preview </a>';
                        ?>
                </td>
            </tr>
        </table>
    </div>
</div>





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