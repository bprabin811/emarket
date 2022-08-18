<?php

include 'config.php';
//error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seller Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="navbar">
       <div class="logo">
           <a href="user.php"><img src="images/logo.png" width ="125px"></a>
       </div>
       <nav>
           <ul>
                <li><a href="user.php">My Product</a></li>
                <li><a href="logout.php">Logout</a></li>
           </ul>
       </nav>
       <img src="images/cart.png" width="30px" height="30px">
   </div>
  </div> 

<!---------------------------------table--------------------------------------->

<div class="small-container cart-page">
    
    <h2><br><p>Delivered Products History:</p></h2>
    <br>
    <table>
       <thead>
            <tr>
            <th>Delivery ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Custumer Name</th>
            <th>Custumer Address</th>
            <th>Custumer Phone No.</th>
            
        </tr>
       </thead>
       <tbody>
           <?php
            //$sq="SELECT *FROM `delivery`,slogin WHERE `delivery`.sphone=slogin.sphone";
            $sq="select y.*
            from delivery y,slogin
            where y.sphone=slogin.sphone and not exists (select 1 from delivery y2 where y.pname = y2.pname and y2.did < y.did)";
            $result=mysqli_query($conn,$sq);

            $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $pid=$row['did'];
                    $pname=$row['pname'];
                    $quantity=$row['quantity'];
                    $cname=$row['cname'];
                    $caddress=$row['caddress'];
                    $cphone=$row['cphone'];
                    echo '<tr>
            <td> '.$pid.' </td>
            <td> '.$pname.' </td>
            <td> '.$quantity.' </td>
            <td> '.$cname.' </td>
            <td> '.$caddress.' </td>
            <td> '.$cphone.' </td>
        </tr>';
                }
            }
    
    ?>
        
       </tbody>
       
    </table>
   
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