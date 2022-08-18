<?php

include 'config.php';
error_reporting(0);
session_start();
if(isset($_POST['submit'])){
 //   $semail = $_POST['semail'];
    $cphone = $_POST['cphone'];
    $spassword = md5($_POST['spassword']);
    $sql = "SELECT *FROM costumer WHERE cphone='$cphone' AND spassword = '$spassword'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['sname']=$row['sname'];
        header("location: orderhistory.php?userid='$cphone'");
    }else{
        echo "<script>alert('Phone or password wrong.') </script>";
    }
    $sq="INSERT INTO clogin(cphone) VALUES('$cphone')";
    $res=mysqli_query($conn,$sq);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction History</title>
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
                <li><a href="logout.php">Logout</a></li>
           </ul>
       </nav>
       <a href="printhistory.php"><img src="images/print.png" width="30px" height="30px"></a>
   </div>
  </div> 

<!---------------------------------table--------------------------------------->
<div class="small-container cart-page">
  
   <?php
        $sq="SELECT `costumer`.cname,`costumer`.caddress,`costumer`.cphone,`costumer`.cemail FROM `costumer`,`clogin` WHERE `costumer`.cphone=`clogin`.cphone";
         $result=mysqli_query($conn,$sq);
                $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $cname=$row['cname'];
                    $caddress=$row['caddress'];
                    $cphone=$row['cphone'];
                    $cemail=$row['cemail'];
                    echo '<tr>
            <td><b>Name: </b>'.$cname.'&emsp;&emsp;</td>
            <td><b>Address: </b>'.$caddress.'&emsp;&emsp;</td>
            <td><b>Phone Number: </b>'.$cphone.'&emsp;&emsp;</td>
            <td><b>Email: </b>'.$cemail.'</td>
        </tr>';
                }
            }
            
    ?>
    <h3><br><p>Your Order History:</p></h3>
   <br>
    <table>
       <thead>
            <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Ordered Quantity</th>        
            <th>Total Price</th>
            <th>Status</th>
            <th>Seller Phone No</th>
            <th>Date</th>
        </tr>
       </thead>
       <tbody>
           <?php
            $sq="SELECT `ordertable`.id,`ordertable`.pname,`ordertable`.quantity,`ordertable`.total,`ordertable`.status,`ordertable`.sphone,`ordertable`.dateandtime FROM `ordertable`,`clogin` WHERE `ordertable`.cphone=`clogin`.cphone";
            $result=mysqli_query($conn,$sq);

            $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $pid=$row['id'];
                    $pname=$row['pname'];
                    $quantity=$row['quantity'];
                    $total=$row['total'];
                    $status=$row['status'];
                    $sphone=$row['sphone'];
                    $timestamp = $row['dateandtime'];
                    echo '<tr>
            <td> '.$pid.' </td>
            <td> '.$pname.' </td>
            <td> '.$quantity.'Kg </td>
            <td> Rs.'.$total.' </td>
            <td> <u>'.$status.'</u> </td>
            <td> '.$sphone.' </td>
            <td> '.$timestamp.' </td>
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