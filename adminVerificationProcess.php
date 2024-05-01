<?php

session_start();

require "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



if(isset($_POST["e"])){

    $email = $_POST["e"];

    if(empty($email)){
        echo "Please enter your email address.";
    }else{


        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'");
        $an = $adminrs->num_rows;

        if($an==1){
           
            $code = uniqid();

            Database::iud("UPDATE `admin` SET `verification`='".$code."' WHERE `email`='".$email."'");
            $mail = new PHPMailer(true);

            
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vinulgajaman2001@gmail.com'; 
            $mail->Password = 'ptmcotqqnekoxsxr'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('vinulgajaman2001@gmail.com', 'E-PRO for advanced Technology'); 
            $mail->addReplyTo('vinulgajaman2001@gmail.com', 'E-PRO for advanced Technology'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);
            $mail->Subject = 'E-PRO for Advanced Technology'; 
            $bodyContent = '<h1 class="text-primary" > Your verification code : '. $code . '</h1>'; 
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending fail'. $mail->ErrorInfo;
            } else {
                echo "success";
            }

        }else{

            echo "You are not a valid user";

        }

    }

}else{
    echo "Please enter your email";
}
