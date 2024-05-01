<?php

session_start();

require "connection.php";

if (!isset($_SESSION["o"])) {
    header('location:index.php');
    exit();
}

$a = $_POST["a"];



$marksCheck = Database::search("SELECT * from `marks` WHERE `assignment_id`='" . $a . "' ;");


$marksData = $marksCheck->fetch_assoc();
if ($marksData["release_id"] == "2") {

    Database::iud("UPDATE `marks` SET `release_id`='1' WHERE `assignment_id`='" . $a . "';");

    echo "success1";
} else {
    Database::iud("UPDATE `marks` SET `release_id`='2' WHERE `assignment_id`='" . $a . "';");

    echo "success2";
}

