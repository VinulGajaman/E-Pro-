<?php

session_start();

require "connection.php";

if (!isset($_SESSION["u"])) {
    header('location:index.php');
    exit();
}

$name = $_POST["n"];
$file = $_FILES["lesson"];

$email = $_SESSION["u"]["email"];
$grade = $_SESSION["u"]["grade_id"];
$subject = $_SESSION["u"]["subject_id"];


// echo $file;

if (empty($name)) {

    header('location:addLessons.php?error=Please Enter the Lesson Name');
    exit();
} else if ($_FILES['lesson']['name'] == "") {

    header('location:addLessons.php?error=Please Select a File.');
    exit();
} else {


    $image = $_FILES['lesson']['tmp_name'];

    $newimageextension;
    if ($file_extension = "application/pdf") {
        $newimageextension = ".pdf";
    }

    $fileName = "resources//notes//" . $name . $newimageextension;

    move_uploaded_file($_FILES['lesson']['tmp_name'], $fileName);

    Database::iud("INSERT INTO `note` (`name`,`teacher_email`,`subject_id`,`grade_id`,`file`) VALUES('" . $name . "','" . $email . "','" . $subject . "','" . $grade . "','" . $fileName . "');");

    header('location:addLessons.php?Success=true');
    exit();
}
