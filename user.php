<?php

include 'config.php';
//error_reporting(0);
session_start();
if(isset($_POST['submit'])){
 //   $semail = $_POST['semail'];
    $sphone = $_POST['sphone'];
    $spassword = md5($_POST['spassword']);
    $sql = "SELECT *FROM seller WHERE sphone='$sphone' AND spassword = '$spassword'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['sname']=$row['sname'];
        header("location: user.php?userid='$sphone'");
    }else{
        echo "<script>alert('Phone or password wrong.') </script>";
    }
    $sq="INSERT INTO slogin(sphone) VALUES('$sphone')";
    $res=mysqli_query($conn,$sq);
}
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
                <li><a href="deliveryhistory.php">Delivered Product</a></li>
                <li><a href="addproduct.php">Upload Product</a></li>
                <li><a href="logout.php">Logout</a></li>
           </ul>
       </nav>
       <img src="images/cart.png" width="30px" height="30px">
   </div>
  </div> 

<!---------------------------------table--------------------------------------->

<div class="small-container cart-page">
  <h3><br><p>Your profile details:</p></h3>
   <?php
        $sq="SELECT `seller`.sname,`seller`.saddress,`seller`.sphone,`seller`.semail,`seller`.store FROM `seller`,`slogin` WHERE `seller`.sphone=`slogin`.sphone";
         $result=mysqli_query($conn,$sq);
                $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $sname=$row['sname'];
                    $saddress=$row['saddress'];
                    $sphone=$row['sphone'];
                    $semail=$row['semail'];
                    $store=$row['store'];
                    echo '<tr>
            <td><b>Name: </b>'.$sname.'&emsp;&emsp;</td>
            <td><b>Address: </b>'.$saddress.'&emsp;&emsp;</td>
            <td><b>Store name: </b>'.$store.'&emsp;&emsp;</td>
            <td><b>Email: </b>'.$semail.'&emsp;&emsp;</td>
            <td><b>Phone: </b>'.$sphone.'</td>
        </tr>';
                }
            }
            
    ?>
    
    <h2><br><p>Your Products:</p></h2>
    <br>
    <table>
       <thead>
            <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Details</th>
            <th>Price</th>
            <th>Availity</th>
            <th>Category</th>
            <th>Picture</th>
            <th>Operations</th>
        </tr>
       </thead>
       <tbody>
           <?php
            $sq="SELECT product.id,product.pname,product.pdetail,product.price,product.availity,product.category,product.picture FROM product,slogin WHERE product.sphone=slogin.sphone";
            $result=mysqli_query($conn,$sq);

            $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $pid=$row['id'];
                    $pname=$row['pname'];
                    $pdetail=$row['pdetail'];
                    $price=$row['price'];
                    $availity=$row['availity'];
                    $category=$row['category'];
                    $picture=$row['picture'];
                    echo '<tr>
            <td> '.$pid.' </td>
            <td> '.$pname.' </td>
            <td> '.$pdetail.' </td>
            <td> RS. '.$price.'/kg </td>
            <td> '.$availity.' kg</td>
            <td> '.$category.' </td>
            <td> <img src="images/'. $picture.'"> </td> 
            <td>
                <a href="edit.php?editid='.$pid.'" class= "btn-order">Edit</a>
                <a href="remove.php?removepid='.$pid.'" class= "btn-order">Remove</a>
            </td>
        </tr>';
                }
            }
    
    ?>
        
       </tbody>
       
    </table>
   
</div>
    
<!------------------------------------request---------------------------------->
<div class="small-container cart-page">
    <h2><p>Requested Products:</p></h2>
   <br>
    <table>
       <thead>
            <tr>
            <th>Request ID</th>
            <th>Product Name</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Address</th>
            <th>Customer Phone</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Operations</th>
        </tr>
       </thead>
       <tbody>
        <div class="onclick">
           <?php
           
           $sq="SELECT `ordertable`.id,`ordertable`.pname,`ordertable`.cname,`ordertable`.cemail,`ordertable`.caddress,`ordertable`.cphone,`ordertable`.quantity,`ordertable`.total,`ordertable`.status,`ordertable`.sphone FROM `slogin`,`ordertable` WHERE `slogin`.sphone=`ordertable`.sphone";
            $result=mysqli_query($conn,$sq);
            $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $pid=$row['id'];
                    $pname=$row['pname'];
                    $cname=$row['cname'];
                    $cemail=$row['cemail'];
                    $caddress=$row['caddress'];
                    $cphone=$row['cphone'];
                    $quantity=$row['quantity'];
                    $total=$row['total'];
                    $sphone=$row['sphone'];
                    $status=$row['status'];
                    
            if($status=='pending'){
                echo '<tr>
            <td> '.$pid.' </td>
            <td> '.$pname.' </td>
            <td> '.$cname.' </td>
            <td> '.$cemail.' </td>
            <td> '.$caddress.' </td>
            <td> '.$cphone.' </td>
            <td> '.$quantity.' </td>
            <td> Rs. '.$total.' </td>
            <td>
                <a href="acceptrequest.php?acceptid='.$pid.'" class= "btn-order">Accept</a>
                <a href="cancelrequest.php?Cancelid='.$pid.'" class= "btn-order">Decline</a>
            </td>
        </tr>';
            }
                    else if($status=='Accepted'){
                echo '<tr>
            <td> '.$pid.' </td>
            <td> '.$pname.' </td>
            <td> '.$cname.' </td>
            <td> '.$cemail.' </td>
            <td> '.$caddress.' </td>
            <td> '.$cphone.' </td>
            <td> '.$quantity.' </td>
            <td> Rs. '.$total.' </td>
            <td>
                Accepted
            </td>
        </tr>';
//            $sl="DELETE from `delivery` WHERE pid in(select pid from `delivery` GROUP BY pid HAVING COUNT(pid) >2)";
//            $rest=mysqli_query($conn,$sl);           
            $sq="INSERT INTO `delivery`(pname,quantity,cname,caddress,cphone,sphone,pid) VALUES('$pname','$quantity','$cname','$caddress','$cphone','$sphone','$pid')";
            $res=mysqli_query($conn,$sq);              
                
            }
                    else{
                 echo '<tr>
            <td> '.$pid.' </td>
            <td> '.$pname.' </td>
            <td> '.$cname.' </td>
            <td> '.$cemail.' </td>
            <td> '.$caddress.' </td>
            <td> '.$cphone.' </td>
            <td> '.$quantity.' </td>
            <td> Rs. '.$total.' </td>
            <td>
                Cancelled
            </td>
        </tr>';
            }
                }
                }
    
    ?>
           </div>
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