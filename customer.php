<?php

include 'config.php';
if(isset($_POST['submit'])){
    $cname=$_POST['cname'];
    $caddress=($_POST['caddress']);
    $cphone=$_POST['cphone'];
    $cemail=$_POST['cemail'];
    
    $cpassword=md5($_POST['cpassword']);
    $password=md5($_POST['password']);
    if($cpassword==$password){
        $sql = "SELECT *FROM costumer WHERE cemail= '$cemail' ";
        $result = mysqli_query($conn,$sql);
        if(!$result->num_rows>0){
            $sql="INSERT INTO costumer(cname,caddress,cphone,cemail,cpassword)
        VALUES('$cname','$caddress','$cphone','$cemail','$cpassword')";
        $result=mysqli_query($conn,$sql);
            if($result){
                echo ("<script LANGUAGE='JavaScript'>
            window.alert('User registrated successfully.');
            window.location.href='product.php';
            </script>");
                  $cname="";
                $cemail="";
                $_POST['cpassword']="";
                
            }else{
                echo "<script>alert('Oops! Something went wrong.')</script>";
            }
        }else{
            echo "<script>alert('E-mail already exist.') </script>";
           
        }
        
    }else{
        echo "<script>alert('Password not matched.') </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Registration</title>
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
                            <span><h2>Customer Registration</h2></span>
                            
                        </div>
                        <form action="" method="post" class="reg">
                           <p>Enter Name:</p>
                            <input type="text" placeholder="Name" name="cname" autocomplete="off" required>
                            <p>Address:</p>
                            <input type="text" placeholder="Enter Address" name="caddress" required>
                            <p>Phone No:</p>
                            <input type="text" placeholder="Enter Phone No" name="cphone" required>
                            <p>Enter Email:</p>
                            <input type="text" placeholder="E-mail" name="cemail" required>
                            <p>Enter Password:</p>
                            <input type="password" placeholder="password" name="cpassword" autocomplete="off" required>
                            <p>Confirm Password:</p>
                            <input type="password" placeholder="Re-enter password" name="password" autocomplete="off" required>
                            <button name="submit" type="submit" class="btn">Register</button>
                            Already have account?
                            <a href="clogin.php"><p>Login</p></a>
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