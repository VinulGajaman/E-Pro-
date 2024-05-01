<?php

session_start();

require "connection.php";

$grade = $_POST["grade"];
$e = $_POST["e"];


if (empty($grade)) {

    echo "Please Select a Grade";
} else {

    Database::iud("UPDATE `student` SET `grade_id`='" . $grade . "' WHERE `email`='" . $e. "';");

    echo "success";
}
