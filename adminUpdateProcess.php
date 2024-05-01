<?php
session_start();

require "connection.php";

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$e = $_POST["e"];

if (empty($fn)) {

    echo "Please enter the First Name.";
    
} else if (empty($ln)) {

    echo "Please enter the Last Name.";

} else if (empty($e)) {

    echo "Please enter the Email.";
} else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {

    echo "Invalid Email Address";
} else if (strlen(($e)) > 100) {

    echo "Email must be less than 100 chracters";
} else {

    $admin = $_SESSION["a"]["id"];

    

     Database::iud("UPDATE `admin` SET `email`='" . $e . "' ,`fname`='" . $fn . "',`lname`='" . $ln . "' WHERE `id`='".$admin."';");
   
     echo "success";
}
