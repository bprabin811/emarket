<?php

include 'config.php';

if(isset($_GET['deleteproduct'])){
    $pname=$_GET['deleteproduct'];
    
    $sql ="DELETE FROM `order` WHERE pname='$pname'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
         echo ("<script LANGUAGE='JavaScript'>
            window.alert('Deleted successfully!');
            window.location.href='cart.php';
            </script>");
    }else{
        echo "<script>alert('Something went wrong!') </script>";
    }
}
?>