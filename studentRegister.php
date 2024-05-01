<?php

session_start();

require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>

    <title>Academic Officer Portal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="resources/logo.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


</head>
<?php
if (isset($_SESSION["o"])) {
?>

    <body>
        <?php
        require "officerHeader.php";
        ?>
        <hr class="border border-warning border-2 d-lg-none d-block">
        <div class="col-lg-8 col-12 pb-3 ps-4 mb-3">

            <div class="row">
                <div class="col-12">

                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="title2 pt-3">Student Registration</h1>
                        </div>
                        <p id="msg"></p>
                    </div>
                    <div class="row mt-2">

                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">First Name</label>
                            <input class="form-control" type="text" id="fn" required />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">Last Name</label>
                            <input class="form-control" type="text" id="ln" required />
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">Email</label>
                            <input class="form-control" type="text" id="e" required />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">NIC</label>
                            <input class="form-control" type="text" id="n" required />
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">Username</label>
                            <input class="form-control" type="text" id="u" required />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">Password</label>
                            <input class="form-control" type="password" id="p" required />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">Select Grade</label>
                            <select class="form-select" id="g" required>
                                <option hidden></option>
                                <?php

                                $rs = Database::search("SELECT * FROM `grade`;");
                                $n = $rs->num_rows;

                                for ($i = 0; $i < $n; $i++) {

                                    $grade = $rs->fetch_assoc();
                                ?>
                                    <option class="fw-bold" value="<?php echo $grade["id"]; ?>">Grade &nbsp;<?php echo $grade["grade"]; ?></option>

                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12 mt-1">
                            <div class="row">
                                <div class="offset-2 col-8  d-grid">
                                    <button class="btn btn-primary fw-bold" type="sumbit" onclick="studentRegiser()">Register</button>
                                </div>
                            </div>
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
                            <p>Student Registered.</p>
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