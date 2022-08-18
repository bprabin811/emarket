<?php

include 'config.php';
if(isset($_POST['sendfeedback'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $feedback=$_POST['feedback'];
    
    $sql="INSERT INTO contact(name,email,feedback) VALUES('$name','$email','$feedback')";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "<script>alert('Message Send successfully.') </script>";
    }
    else{
        echo "<script>alert('Message not send successfully.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
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
   
   
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/organic_1.jpg" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span><u>Leave your Message or Feedback:</u></span>
                            
                        </div>
                        <form action="" method="post">
                            <p>Name:</p>
                            <input type="text" name="name" required>
                            <p>Email:</p>
                            <input type="text" name="email" required>
                            <p>Message:</p>
                            <textarea name="feedback" rows="15" cols="52" required>
                            </textarea>
                            If any query leave your phone number on message, we will contact you.
                            Thank you!!!
                            <button name="sendfeedback" class="btn">Send</button>
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