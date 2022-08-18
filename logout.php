<?php 
    include 'config.php';
    $sql="DELETE FROM slogin";
    $sq="DELETE FROM clogin";
    $result=mysqli_query($conn,$sql);
    $result=mysqli_query($conn,$sq);
    session_start();
    session_destroy();
    header("Location: index.php");
?>