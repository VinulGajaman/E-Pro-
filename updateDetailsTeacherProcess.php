<?php

session_start();

require "connection.php";

$grade = $_POST["g"];
$subject = $_POST["s"];
$e = $_POST["e"];


if (empty($grade)) {

    echo "Please Select a Grade";
} else if (empty($subject)) {

    echo "Please Select a Subject";
} else {

    Database::iud("UPDATE `teacher` SET `grade_id`='" . $grade . "',`subject_id`='" . $subject . "' WHERE `email`='" . $e . "';");

    echo "success";
}
