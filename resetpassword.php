<?php
include 'config.php';
if(!isset($_GET["code"])){
    exit("Page not found");
}
$code=$_GET["code"];
$getEmailQuery=mysqli_query($conn,"SELECT email FROM resetpassword WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery)==0){
    exit("Page not found");
}
if(isset($_POST["password"]))
{
    $pw=$_POST["password"];
    $pw=md5($pw);
    $row=mysqli_fetch_array($getEmailQuery);
    $email=$row["email"];
    $query=mysqli_query($conn,"UPDATE seller SET spassword='$pw' WHERE semail='$email'");
    
    if($query){
        $query=mysqli_query($conn,"DELETE FROM resetpassword WHERE code='$code'");
        echo "<script>alert('Password Updated.')</script>";
        header("location: slogin.php");
    }else{
        exit("Something went wrong.");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
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
           </ul>
       </nav>
       <img src="images/cart.png" width="30px" height="30px">
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
                            <span>Update your New-Password</span>
                            
                        </div>
                        <form action="" method="post">
                           <p>Enter your New-Password:</p>
                            <input type="text" placeholder="New-password" name="password" required>
                            <button name="reset" class="btn">Update Password</button>
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