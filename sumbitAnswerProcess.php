<?php

session_start();

require "connection.php";

if (!isset($_SESSION["s"])) {
    header('location:index.php');
    exit();
}

$s = $_POST["s"];
$a = $_POST["a"];



// echo $file;
if (!isset($_FILES['f'])) {


    echo " Please Select a File.";
} else {



    $image = $_FILES['f']['tmp_name'];

    $newimageextension;
    if ($file_extension = "application/pdf") {
        $newimageextension = ".pdf";
    }

    $fileName = "resources//answers//" . uniqid() . $newimageextension;

    move_uploaded_file($_FILES['f']['tmp_name'], $fileName);


    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");

    $answerCheck = Database::search("SELECT * from `answer` WHERE `assignment_id`='" . $a . "' AND `student_id`='" . $s . "';");

    if ($answerCheck->num_rows == 1) {
        Database::iud("UPDATE `answer` SET `answer_file`='" . $fileName . "',`date`='" . $date . "' WHERE `student_id`='" . $s . "' AND `assignment_id`='" . $a . "';");

        echo "success1";
    } else {


        Database::iud("INSERT INTO `answer` (`student_id`,`answer_file`,`assignment_id`,`date`) VALUES('" . $s . "','" . $fileName . "','" . $a . "','" . $date . "');");

        echo "success1";
    }
}
