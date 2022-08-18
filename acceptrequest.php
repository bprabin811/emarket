<?php
  include 'config.php';
date_default_timezone_set('Asia/Katmandu');

    $pid=$_GET['acceptid'];
    $sql="SELECT * FROM `ordertable` WHERE id='$pid'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $status =$row['status'];
    $myDate = date("d-m-y h:i:s");

    $sql="UPDATE `ordertable` SET id='$pid',`status`='Accepted',`dateandtime`='$myDate' WHERE id='$pid'";
    $result=mysqli_query($conn,$sql);

    
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions





    $pid=$_GET['acceptid'];
    $sql="SELECT * FROM `ordertable` WHERE id='$pid'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $emailTo=$row["cemail"];
     $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'proworld811@gmail.com';                     //SMTP username
        $mail->Password   = 'Pro@World811';                               //SMTP password
        $mail->SMTPSecure = 'tsl';         //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('atozorganics@gmail.com', 'AtoZ Organics');
        $mail->addAddress("$emailTo");     //Name is optional
        $mail->addReplyTo('no-reply@atozorganics.com', 'No reply');


        //Content
//        $url = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/resetpassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your Order is on the way.';
        $mail->Body    = "Thank you for ordering our products.";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Email has been sent successfully.';
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

echo ("<script LANGUAGE='JavaScript'>
            window.alert('Order Accepted.');
            window.location.href='user.php';
            </script>");

?>
