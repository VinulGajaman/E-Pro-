<?php
session_start();

require "connection.php";

$fn = $_POST["fn"];
$ln = $_POST["ln"];
// $e = $_POST["e"];
$m = $_POST["m"];
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
} else if (empty($m)) {

    echo "Please enter the Mobile Number.";
} else if (strlen($m) != 10) {

    echo "Please enter 10 digit mobile number.";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $m) == 0) {

    echo "Invalid mobile number.";
} else if (empty($un)) {

    echo "Please enter the UserName.";
} else if (empty($pw)) {

    echo "Please enter the Password.";
} else if (strlen(($pw)) < 5 || strlen($pw) > 20) {

    echo "Password length must between 5 to 20";
} else {

    


     Database::iud("UPDATE `teacher` SET `fname`='" . $fn . "',`lname`='" . $ln . "',`username`='" . $un . "',`password`='" . $pw . "',`mobile`='" . $m . "' WHERE `email`='" . $_SESSION["u"]["email"] . "';");
     
    echo "success";
}
