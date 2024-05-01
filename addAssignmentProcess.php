<?php

session_start();

require "connection.php";

if (!isset($_SESSION["u"])) {
    header('location:index.php');
    exit();
}

$name = $_POST["n"];
$sdate = $_POST["s"];
$edate = $_POST["e"];
$file = $_FILES["assignment"];

$email = $_SESSION["u"]["email"];
$grade = $_SESSION["u"]["grade_id"];
$subject = $_SESSION["u"]["subject_id"];


// echo $file;

if (empty($name)) {

    header('location:addAssignments.php?error=Please Enter the Assignment Name');
    exit();
} else if (empty($sdate)) {

    header('location:addAssignments.php?error=Please Select a Start Date.');
    exit();
} else if (empty($edate)) {

    header('location:addAssignments.php?error=Please Select a End Date.');
    exit();
} else if ($edate < $sdate) {

    header('location:addAssignments.php?error=Invalid End Date.');
    exit();
} else if ($_FILES['assignment']['name'] == "") {

    header('location:addAssignments.php?error=Please Select a File.');
    exit();
} else {


    $image = $_FILES['assignment']['tmp_name'];

    $newimageextension;
    if ($file_extension = "application/pdf") {
        $newimageextension = ".pdf";
    }

    $fileName = "resources//assignments//" . $name . $newimageextension;

    move_uploaded_file($_FILES['assignment']['tmp_name'], $fileName);

    Database::iud("INSERT INTO `assignment` (`name`,`teacher_email`,`subject_id`,`grade_id`,`file`,`start_date`,`end_date`) VALUES('" . $name . "','" . $email . "','" . $subject . "','" . $grade . "','" . $fileName . "','" . $sdate . "','" . $edate . "');");

    header('location:addAssignments.php?Success=true');
    exit();
}
