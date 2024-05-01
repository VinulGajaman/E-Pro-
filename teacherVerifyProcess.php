<?php
session_start();

require "connection.php";

$vc = $_POST["vc"];
$un = $_POST["un"];
$pw = $_POST["pw"];

if (empty($vc)) {

    echo "Please enter the verification code";
} else {

    $rs = Database::search("SELECT * FROM `teacher` WHERE `username`='" . $un . "' AND `password`='" . $pw . "' AND `verification`='".$vc."';");
    

    if ($rs->num_rows == 1) {
        
        $update = Database::iud("UPDATE `teacher` SET `verify_status_id`='1' WHERE `username`='" . $un . "' AND `password`='" . $pw . "';");
        $rd = $rs->fetch_assoc();
        $_SESSION["u"] = $rd;
        echo "success";
    } else {
        echo "Please Enter the Correct Verification Code";
    }
}
