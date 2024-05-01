<?php

session_start();

require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>

    <title>Teacher Portal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="resources/logo.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/calender.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


</head>
<?php
if (isset($_SESSION["u"])) {
?>

    <body>
        <?php
        require "header.php";
        ?>
        <div class="container-fluid justify-content-center vh-100">


            <div class="row r1 g-0 mt-5 mb-4">

                <?php
                require_once "teacherHeader.php";
                ?>
                <hr class="border border-warning border-2 d-lg-none d-block">
                <div class="col-lg-8 col-12 pb-3 ps-4 mb-3">

                    <div class="row">
                        <div class="col-12">

                            <div class="row">
                                <div class="col-12 text-center">
                                    <h1 class="title2 pt-3">Dashboard</h1>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-6 col-11">
                                    <div class="calendar"></div>
                                </div>
                                <div class="col-lg-6 col-11">
                                    <div class="row">
                                        <div class="col-11 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-warning rounded p-3" style="background-color: rgb(250, 249, 173);">
                                            <div class="row">
                                                <div class="col-12 mt-3 mb-3">
                                                    <label class="from-label fs-4 fw-bold">TOTAL UPLOADED LESSONS</label>
                                                    <br />
                                                   
                                                    <hr class="border border-1 border-danger">
                                                    <?php
                                                    $users = Database::search("SELECT * FROM `note` WHERE `teacher_email`='".$_SESSION["u"]["email"]."';");
                                                    $un = $users->num_rows;

                                                    ?>
                                                    <label class="from-label mt-1 fs-5"><?php echo $un; ?> Lessons</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-11 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-primary rounded p-3" style="background-color: #e7f2ff;">
                                            <div class="row">
                                                <div class="col-12 mt-3 mb-3">
                                                    <label class="from-label fs-4 fw-bold">TOTAL UPLOADED ASSIGNMENTS</label>
                                                    <br />
                                                   
                                                    <hr class="border border-1 border-danger">
                                                    <?php
                                                    $users = Database::search("SELECT * FROM `assignment` WHERE `teacher_email`='".$_SESSION["u"]["email"]."';");
                                                    $un = $users->num_rows;

                                                    ?>
                                                    <label class="from-label mt-1 fs-5"><?php echo $un; ?> Assignemnts</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="js/calender.js"></script>
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
                        <a class="btn btn-secondary" href="teacherSignIn.php">OK</a>
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