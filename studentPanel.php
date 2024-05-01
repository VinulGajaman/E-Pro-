<?php

session_start();

require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>

    <title>Student Portal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="resources/logo.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/calender.css" />
    <link rel="stylesheet" href="css/time.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


</head>
<?php
if (isset($_SESSION["s"])) {
    $exDate = $_SESSION["s"]["registration_date"];
    $date = new DateTime($exDate);
    
   $newDate = $date->format("m/d/y");
    
?>

    <body onload="expireDate('<?php echo date('m/d/y', strtotime($newDate. ' + 30 days')); ?>');">



        <?php
        require "studentHeader.php";
        ?>
        <hr class="border border-warning border-2 d-lg-none d-block">
        <div class="col-lg-8 col-12 pb-3 ps-4 mb-3">

            <div class="row">
                <div class="col-12">

                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="title2 pt-3">Dashboard</h1>
                        </div>
                        <div class="col-12">
                            <hr class="border border-1 border-secondary">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="container">
                                <h1 id="headline" class="fs-4 text-danger fw-bold">Your Portal Expire In :</h1>
                                <div id="countdown">
                                    <ul>
                                        <li><span id="days"></span>days</li>
                                        <li><span id="hours"></span>Hours</li>
                                        <li><span id="minutes"></span>Minutes</li>
                                        <li><span id="seconds"></span>Seconds</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="border border-1 border-secondary">
                        </div>
                        <div class="offset-lg-1 offset-1 col-9 col-lg-5 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-danger rounded" style="background-color: rgb(255, 198, 198);">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <label class="from-label fw-bold">TOTAL ASSIGNMENTS</label>
                                    <br />

                                    <hr class="border border-1 border-danger">
                                    <?php
                                    $users = Database::search("SELECT * FROM `assignment` WHERE `grade_id`='" . $_SESSION["s"]["grade_id"] . "';");
                                    $un = $users->num_rows;

                                    ?>
                                    <label class="from-label mt-1"><?php echo $un; ?> Assignments</label>
                                </div>
                            </div>
                        </div>
                        <div class="offset-lg-1 offset-1 col-9 col-lg-5 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-warning rounded" style="background-color: rgb(250, 249, 173);">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <label class="from-label fw-bold">SUMBITTED ASSIGNMENTS</label>
                                    <br />
                                    <hr class="border border-1 border-warning">
                                    <?php
                                    $users = Database::search("SELECT * FROM `answer` WHERE `student_id`='" . $_SESSION["s"]["id"] . "';");
                                    $un = $users->num_rows;

                                    ?>
                                    <label class="from-label mt-1"><?php echo $un; ?> Assignments</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-11 col-lg-12">
                            <hr class="border border-1 border-secondary">
                        </div>
                        <div class="col-12">

                            <div class="calendar"></div>
                        </div>



                    </div>
                </div>
            </div>

            <!-- model -->
            <div class="modal" tabindex="-1" id="success">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><span class="text-primary">Online Student Management System</span></h5>
                        </div>
                        <div class="modal-body">
                            <p>Academic Officer Registered.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- model -->
        </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="js/calender.js"></script>
        <script src="js/time.js"></script>
        <script src="script.js"></script>


    </body>

</html>
<?php
} else {
?>



    <body onload="GotoIndex();">

        <!-- model -->
        <div class="modal" tabindex="-1" id="alert">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="text-primary">E-PRO for Advanced Technology.</span></h5>
                    </div>
                    <div class="modal-body">
                        <p>Please You Have to Sign In First.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="studentSignIn.php">OK</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- model -->

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>



<?php
}

?>