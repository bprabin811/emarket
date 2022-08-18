
<?php

include 'config.php';
$emailErr=$nameErr="";
$sname = $saddress = $store = $sphone = $semail = $spassword=$cpassword="";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sname = test_input($_POST["sname"]);
  $saddress = test_input($_POST["saddress"]);
  $store = test_input($_POST["store"]);
  $sphone = test_input($_POST["sphone"]);
  $semail = test_input($_POST["semail"]);
    $spassword = test_input($_POST["spassword"]);
    $cpassword = test_input($_POST["cpassword"]);

    
    
    $sname = test_input($_POST["sname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/%@#)<>&!",$sname)) {
      $nameErr = "*Only letters and white space allowed";
    }
    
$semail = test_input($_POST["semail"]);
if (!filter_var($semail, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "*Invalid email format";
}

//if(isset($_POST['submit'])){
//    $sname=$_POST['sname'];
//    $saddress=($_POST['saddress']);
//    $store=$_POST['store'];
//    $sphone=$_POST['sphone'];
//    $semail=$_POST['semail'];
//    $spassword=md5($_POST['spassword']);  
//    $cpassword=md5($_POST['cpassword']);   
//
//    
    
    elseif($spassword==$cpassword){
        $sql = "SELECT *FROM seller WHERE semail= '$semail' ";
        $result = mysqli_query($conn,$sql);
        if(!$result->num_rows>0){
            $sql="INSERT INTO seller(sname,saddress,store,sphone,semail,spassword)
        VALUES('$sname','$saddress','$store','$sphone','$semail','$spassword')";
        $result=mysqli_query($conn,$sql);
            if($result){
                 echo ("<script LANGUAGE='JavaScript'>
            window.alert('User registrated successfully.');
            window.location.href='slogin.php';
            </script>");
                $sname="";
                $semail="";
                $_POST['spassword']="";
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
    <title>Seller Registration</title>
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
                            <span><h2>Seller Registration</h2></span>
                            
                        </div>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  class="reg" >
                           <p>Enter Name:</p>
                            <input type="text" placeholder="Name" name="sname" autocomplete="off" required>
                            <span class="error"><?php echo $nameErr;?></span>
                            <p>Address:</p>
                            <input type="text" placeholder="Enter Address" name="saddress" required>
                            <p>Store Name:</p>
                            <input type="text" placeholder="Store" name="store" required>
                            <p>Phone No:</p>
                            <input type="text" placeholder="Enter Phone No" name="sphone" autocomplete="off" required>
                            <p>Enter Email:</p>
                            <input type="text" placeholder="E-mail" name="semail" autocomplete="off" required>
                            <span class="error"><?php echo $emailErr;?></span>
                            <p>Enter Password:</p>
                            <input type="password" placeholder="password" name="spassword" autocomplete="off" required>
                            <p>Confirm Password:</p>
                            <input type="password" placeholder="Re-enter password" name="cpassword" autocomplete="off" required>
                            <button name="submit" type="submit" class="btn">Register</button>
                            Already have account?
                            <a href="slogin.php"><p>Login</p></a>
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