<?php

require "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$email = $_POST["e"];
$password = $_POST["p"];
$nic = $_POST["n"];
$un = $_POST["u"];
$grade = $_POST["g"];


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
} else if (empty($nic)) {

    echo "Please Enter NIC";
} else if (empty($un)) {

    echo "Please Enter an Username";
} else if (empty($grade)) {

    echo "Please Select a Grade";
} else {

    $r = Database::search("SELECT * FROM `student` WHERE `email`='" . $email . "';");

    if ($r->num_rows > 0) {
        echo "Student with the same email address already exsist";
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO  `student` (`email`,`fname`,`lname`,`username`,`password`,`nic`,`grade_id`,`verify_status_id`,`registration_date`) VALUES ('" . $email . "','" . $fname . "','" . $lname . "','" . $un . "','" . $password . "','" . $nic . "','" . $grade . "','" . $status . "','".$date."');");
        echo "success";
    }
}
