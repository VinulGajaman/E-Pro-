<?php
session_start();

require "connection.php";

$fn = $_POST["fn"];
$ln = $_POST["ln"];
// $e = $_POST["e"];
$nic = $_POST["m"];
$un = $_POST["un"];
$pw = $_POST["pw"];

if (empty($fn)) {

    echo "Please enter the First Name.";
} else if (empty($ln)) {

    echo "Please enter the Last Name.";
    // } else if (empty($e)) {

    //     echo "Please enter the Email.";
    // } else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {

    //     echo "Invalid Email Address";
    // } else if (strlen(($e)) > 100) {

    //     echo "Email must be less than 100 chracters";
} else if (empty($nic)) {

    echo "Please enter the NIC.";
} else if (empty($un)) {

    echo "Please enter the UserName.";
} else if (empty($pw)) {

    echo "Please enter the Password.";
} else if (strlen(($pw)) < 5 || strlen($pw) > 20) {

    echo "Password length must between 5 to 20";
} else {




    Database::iud("UPDATE `student` SET `fname`='" . $fn . "',`lname`='" . $ln . "',`username`='" . $un . "',`password`='" . $pw . "',`nic`='" . $nic . "' WHERE `email`='" . $_SESSION["s"]["email"] . "';");

    echo "success";
}
