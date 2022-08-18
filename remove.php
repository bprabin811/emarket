<?php

include 'config.php';

if(isset($_GET['removepid'])){
    $pid=$_GET['removepid'];
    
    $sql ="DELETE FROM product WHERE id=$pid";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Deleted successfully!');
            window.location.href='user.php';
            </script>");
    }else{
        echo "<script>alert('Something went wrong!') </script>";
    }
}
?>