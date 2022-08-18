<?php

include 'config.php';
if(isset($_POST['add'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
    $topic=$_POST['topic'];
     $message=$_POST['message'];
    $picture=$_POST['picture'];
    
    $sql="INSERT INTO explore(name,email,topic,message,picture) VALUES('$name','$email','$topic','$message','$picture')";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "<script>alert('Added successfully.') </script>";
    }
    else{
        echo "<script>alert('Something went wrong!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blogs</title>
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
                           <div class="form-container">
                        <form action="" method="post">
                            <p>Name:</p>
                            <input type="text" name="name" required>
                            <p>Email:</p>
                            <input type="text" name="email" required>
                            <p>Topic:</p>
                            <input type="text" name="topic" required>
                            <p>Details:</p>
                            <textarea name="message" rows="15" cols="52" required>
                            </textarea>
                            <p>Add Pictures:</p>
                             <input class="File-upload-Choose" type="file" onchange="readURL(this)" accept="Pictures/*" name="picture">
                            <button name="add" class="btn">Post</button>
                        </form>
                    </div>
                </div>
                <div class="col-3">
             <?php
       
            $sq="SELECT *FROM explore LIMIT 1";
            $result=mysqli_query($conn,$sq);

            $num=mysqli_num_rows($result);
            if($num>0){
                while( $row=mysqli_fetch_assoc($result)){
                    $name=$row['name'];
                    $email=$row['email'];
                    $topic=$row['topic'];
                    $message=$row['message'];
                    $picture=$row['picture'];                 
                
            echo ' <div class="col-3">
            <img src="images/'. $picture.'">
            <h2>'.$topic.'</h2>
            <p> '.$message.'.</p>
            <h4>&#x270D;'.$name.'</h4>
            </div>';
                }
            }
        ?>
                </div>
            </div>
        </div>
    </div>
    <a href="explore2.php"><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Next Page&raquo;</h2></a><br>
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