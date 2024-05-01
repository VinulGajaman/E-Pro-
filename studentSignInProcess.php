<?php

session_start();

require "connection.php";

$un = $_POST["un"];
$pw = $_POST["pw"];
$r = $_POST["remember"];

if (empty($un)) {

    echo "Please Enter the Username";
} else if (empty($pw)) {

    echo "Please Enter the Password";
} else {

    $rs = Database::search("SELECT * FROM `student` WHERE `username`='" . $un . "' AND `password`='" . $pw . "';");
    $n = $rs->num_rows;

    //sign in success



    if ($n == 1) {

        $d = $rs->fetch_assoc();

        if ($d["verify_status_id"] == '2') {

            echo "1";
        } else {

            $rs = Database::search("SELECT * FROM `student` WHERE `username`='" . $un . "' AND `password`='" . $pw . "';");

            $rsData = $rs->fetch_assoc();

            $exDate = $rsData["registration_date"];
            $date = new DateTime($exDate);

            $newDate = $date->format("Y-m-d");

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $todayDate = $d->format("Y-m-d");
            $newDate = date('Y-m-d', strtotime($newDate . ' + 30 days'));

            if ($newDate < $todayDate) {
                echo "Your Account Has Been Expired.";
            } else {

                //remember me true

                if ($r == "true") {
                    setcookie("stun", $un, time() + (60 * 60 * 24 * 365));
                    setcookie("stpw", $pw, time() + (60 * 60 * 24 * 365));

                    //remember me false
                } else {
                    setcookie("stun", "", -1);
                    setcookie("stpw", "", -1);
                }


                $_SESSION["s"] = $rsData;
                echo "2";
            }
        }
    } else {
        echo "Invalid Details";
    }
}
