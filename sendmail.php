<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
$mail = new PHPMailer(true);

try{
    
    $email =  $_POST['user-email'];

    $link="<a href='localhost/codeblog/forgotpass.php'>Click To Reset password</a>";
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'varun.nagpal@somaiya.edu';                 
    $mail->Password   = 'dfut egjb cbui qmme';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;  
  
    $mail->setFrom('varun.nagpal@somaiya.edu');           
    $mail->addAddress($email);
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'Subject';
    $n = rand(1000,9999);
    $_SESSION['$n'] = $n;
    $mail->Body    = "OTP :".$n;
    $mail->send();
    echo '<script>window.location.href = "forgotpass.php";</script>';
} 

catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

  }	

?>