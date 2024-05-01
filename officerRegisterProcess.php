<?php

require "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$un = $_POST["u"];


$status = 2;


if (empty($fname)) {

    echo "Please Enter First Name";
} else if (strlen(($fname)) > 50) {

    echo "First Name must be less than 50 characters";
} else if (empty($lname)) {

    echo "Please Enter Last Name";
} else if (strlen(($lname)) > 50) {

    echo "Last Name must be less than 50 characters";
} else if (empty($email)) {

    echo "Please Enter Email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    echo "Invalid Email Address";
} else if (strlen(($email)) > 100) {

    echo "Email must be less than 100 chracters";
} else if (empty($password)) {

    echo "Please Enter Password";
} else if (strlen(($password)) < 5 || strlen($password) > 20) {

    echo "Password length must between 5 to 20";
} else if (empty($mobile)) {

    echo "Please Enter mobile";
} else if (strlen($mobile) != 10) {

    echo "Please enter 10 digit mobile number";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {

    echo "Invalid mobile number";
} else if (empty($un)) {

    echo "Please Enter an Username";
} else {

    $r = Database::search("SELECT * FROM `officer` WHERE `email`='" . $email . "' OR `mobile` = '" . $mobile . "';");

    if ($r->num_rows > 0) {
        echo "User with the same email address or mobile already exsist";
    } else {

        Database::iud("INSERT INTO  `officer` (`email`,`fname`,`lname`,`username`,`password`,`mobile`,`verify_status_id`) VALUES ('" . $email . "','" . $fname . "','" . $lname . "','".$un."','" . $password . "','" . $mobile . "','".$status."');");
        echo "success";
    }
}
