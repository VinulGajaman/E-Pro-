<?php

session_start();

require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>

    <title>Admin Panel</title>

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
if (isset($_SESSION["a"])) {
?>

    <body>
        
                <?php
                require_once "adminHeader.php";
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


                                <div class="offset-lg-1 offset-1 col-9 col-lg-3 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-danger rounded" style="background-color: rgb(255, 198, 198);">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-3">
                                            <label class="from-label fw-bold">TOTAL TEACHERS</label>
                                            <br />
                                            <br />
                                            <hr class="border border-1 border-danger">
                                            <?php
                                            $users = Database::search("SELECT * FROM `teacher`;");
                                            $un = $users->num_rows;

                                            ?>
                                            <label class="from-label mt-1"><?php echo $un; ?> Teachers</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-1 offset-1 col-9 col-lg-3 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-warning rounded" style="background-color: rgb(250, 249, 173);">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-3">
                                            <label class="from-label fw-bold">TOTAL ACADEMIC OFFICERS</label>
                                            <br />
                                            <hr class="border border-1 border-warning">
                                            <?php
                                            $users = Database::search("SELECT * FROM `officer`;");
                                            $un = $users->num_rows;

                                            ?>
                                            <label class="from-label mt-1"><?php echo $un; ?> Officers</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-1 offset-1 col-9 col-lg-3 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-primary rounded" style="background-color: #e7f2ff;">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-3">
                                            <label class="from-label fw-bold">TOTAL STUDENTS</label>
                                            <br />
                                            <br />
                                            <hr class="border border-1 border-danger">
                                            <?php
                                            $users = Database::search("SELECT * FROM `student`;");
                                            $un = $users->num_rows;

                                            ?>
                                            <label class="from-label mt-1"><?php echo $un; ?> Students</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="calendar"></div>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="admin();">OK</button>
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