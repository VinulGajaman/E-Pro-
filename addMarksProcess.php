<?php

session_start();

require "connection.php";

if (!isset($_SESSION["u"])) {
    header('location:index.php');
    exit();
}

$s = $_POST["s"];
$a = $_POST["a"];
$m = $_POST["m"];

$release = "2";


// echo $file;


if (empty($m)) {

    echo "Please Enter Marks.";
} else if ($m < 0 || $m > 100) {

    echo "Invalid Marks.";

} else {


   

    $marksCheck = Database::search("SELECT * from `marks` WHERE `assignment_id`='" . $a . "' AND `student_id`='" . $s . "';");

    if ($marksCheck->num_rows == 1) {
        Database::iud("UPDATE `marks` SET `marks`='" . $m . "',`release_id`='" . $release . "' WHERE `student_id`='" . $s . "' AND `assignment_id`='" . $a . "';");

        echo "success";
    } else {


        Database::iud("INSERT INTO `marks` (`student_id`,`marks`,`assignment_id`,`release_id`) VALUES('" . $s . "','" . $m . "','" . $a . "','" . $release . "');");

        echo "success";
    }
}
