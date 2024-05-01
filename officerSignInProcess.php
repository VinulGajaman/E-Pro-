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

    $rs = Database::search("SELECT * FROM `officer` WHERE `username`='" . $un . "' AND `password`='" . $pw . "';");
    $n = $rs->num_rows;

    //sign in success



    if ($n == 1) {

        $d = $rs->fetch_assoc();

        if ($d["verify_status_id"] == '2') {

            echo "1";
        } else {

            //remember me true

            if ($r == "true") {
                setcookie("offun", $un, time() + (60 * 60 * 24 * 365));
                setcookie("offpw", $pw, time() + (60 * 60 * 24 * 365));

                //remember me false
            } else {
                setcookie("offun", "", -1);
                setcookie("offpw", "", -1);
            }

            
            $_SESSION["o"] = $d;
            echo "2";
        }
    } else {
        echo "Invalid Details";
    }
}
