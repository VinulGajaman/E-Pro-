<?php
session_start();

require "connection.php";

$vc = $_POST["vc"];
$un = $_POST["un"];
$pw = $_POST["pw"];

if (empty($vc)) {

    echo "Please enter the verification code";
} else {

    $rs = Database::search("SELECT * FROM `officer` WHERE `username`='" . $un . "' AND `password`='" . $pw . "' AND `verification`='".$vc."';");
    

    if ($rs->num_rows == 1) {
        
        $update = Database::iud("UPDATE `officer` SET `verify_status_id`='1' WHERE `username`='" . $un . "' AND `password`='" . $pw . "';");
        $rd = $rs->fetch_assoc();
        $_SESSION["o"] = $rd;
        echo "success";
    } else {
        echo "Please Enter the Correct Verification Code";
    }
}
