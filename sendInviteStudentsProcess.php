<?php

session_start();

require "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



if (isset($_POST["e"])) {

    $email = $_POST["e"];

    if (empty($email)) {
        echo "Please enter your email address.";
    } else {


        $student = Database::search("SELECT * FROM `student` WHERE `email`='" . $email . "'");
        $studentN = $student->num_rows;

        if ($studentN == 1) {

            $studentData = $student->fetch_assoc();
            $fname = $studentData["fname"];
            $lname = $studentData["lname"];
            $username = $studentData["username"];
            $password = $studentData["password"];
            $code = uniqid();

            Database::iud("UPDATE `student` SET `verification`='" . $code . "' WHERE `email`='" . $email . "'");
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
            $bodyContent = '<h1 style="color: blue;" > E-PRO for advanced Technology </h1>
            <br/>
            <br/>
            <h3 style="color: black;" > Welcome : ' . $fname . '&nbsp;' . $lname . '</h3>
            <br/>
            
            <h3 style="color: red;" > Your Username : ' . $username . '</h3>
            
            <h3 style="color: red;" > Your Password : ' . $password . '</h3>
            
            <h3 style="color: red;" > Your verification code : ' . $code . '</h3>
            
            <h2 style="font-weight: bold;">URL :&nbsp; <a>http://localhost/Assignment/index.php</a></h2>
            ';

            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending fail' . $mail->ErrorInfo;
            } else {
                echo "success";
            }
        } else {

            echo "You are not a valid user";
        }
    }
}
