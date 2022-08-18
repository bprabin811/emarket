<?php

include 'config.php';

if(isset($_GET['updateidupdateid'])){
    $pname=$_GET['updateid'];
    
    if(isset($_POST['update'])){
                $quantity = $_POST['quantity'];
        echo".'$quantity'.";
    }
//    $sql ="UPDATE `order` SET quantity='$quantity' Where pname='$pname'";
//    $result=mysqli_query($conn,$sql);
    if($result)
    {
         echo ("<script LANGUAGE='JavaScript'>
            window.alert('successfully!');
            window.location.href='cart.php';
            </script>");
    }else{
        echo "<script>alert('Something went wrong!') </script>";
    }
}
?>