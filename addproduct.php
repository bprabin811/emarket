<?php

include 'config.php';
if(isset($_POST['upload'])){
     $pname =$_POST['pname'];
     $pdetail=$_POST['pdetail'];
     $availity=$_POST['availity'];
     $price=$_POST['price'];
     $category=$_POST['category'];
     $picture=$_POST['picture']; 
     $sphone=$_POST['sphone'];
    $sql = "SELECT *FROM seller WHERE sphone= '$sphone' ";
    $result = mysqli_query($conn,$sql);
        if($result->num_rows>0){
            $sql="INSERT INTO product(pname,pdetail,availity,price,category,picture,sphone) VALUES('$pname','$pdetail','$availity','$price','$category','$picture','$sphone')";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "<script>alert('Inserted successfully.') </script>";
    }
    else{
        echo "<script>alert('Inserted not successfully.')</script>";
    }
        }else{
            echo "<script>alert('Your Phone Number does not matched.') </script>";
        }
    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
      <div class="navbar">
       <div class="logo">
           <a href=""><img src="images/logo.png" width ="125px"></a>
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
   
   <div class="addproduct-page">
       <div class="container">
           <div class="row">
               <div class="col-2">
                       <form action="" method="post">
                       <p>Enter Product Name:</p>
                       <input type="text" name="pname" required>
                       <p>Enter Product Details:</p>
                       <textarea name="pdetail" rows="15" cols="52" autocomplete="off">
                       </textarea>
                       <p>Product Availity:</p>
<!--                       <input type="text" name="availity" required>-->
                       <input type="number" min="10" max="10000" name="availity" required> 
                       <p>Product Price:</p>
                       <input type="text" name="price" autocomplete="off" required>
                       <p>Select Category:</p>
                       <select name="category">
                            <option>Default</option>
                           <option>Leafy Green</option>
                           <option>Cruciferous</option>
                           <option>Marrow</option>
                           <option>Root</option>
                           <option>Allium</option>
                       </select>
                       <br>
                       <p>Add Pictures:</p>
                        <input class="File-upload-Choose" type="file" onchange="readURL(this)" accept="Pictures/*" name="picture" required>
                        <p>Your Phone Number:</p>
                       <input type="text" name="sphone" required>
                        <button name="upload" type="submit" class="btn">Upload</button>
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