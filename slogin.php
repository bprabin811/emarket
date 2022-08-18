<?php

include 'config.php';
error_reporting(0);
session_start();
if(isset($_POST['submit'])){
    $sphone = $_POST['sphone'];
    $spassword = md5($_POST['spassword']);
    $sql = "SELECT *FROM seller WHERE sphone='$sphone' AND spassword = '$spassword'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['sname']=$row['sname'];
         $sq="INSERT INTO slogin(sphone) VALUES('$sphone')";
        $res=mysqli_query($conn,$sq);
        header("location: user.php?userid='$sphone'");
    }else{
        echo "<script>alert('Phone or password wrong.') </script>";
    }
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seller Login</title>
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
                <li><a href="clogin.php">Customer Account</a></li>
           </ul>
       </nav>
       <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
   </div>
  </div> 
   
   
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/organic_1.jpg" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span><h2>Seller Login</h2></span>
                            
                        </div>
                        <form action="" method="post">
                            <input type="text" placeholder="Phone No" name="sphone" autocomplete="off" value="<?php echo $sphone; ?>" required>
                            <input type="password" placeholder="password"  value="<?php echo $_POST['password']; ?>" name="spassword" autocomplete="off" required>
                            <button name="submit" class="btn">Login</button>
                            <a href="forgot_password.php"><p>Forgot password?</p></a>
                            Does not have account?
                            <a href="seller.php"><p>Register</p></a>
                        </form>
                    </div>
                </div>
            </div>
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