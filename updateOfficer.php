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
                            <h1 class="title2 pt-3">Update Profile</h1>
                        </div>
                        <p class="text-danger fw-bold" id="msg"></p>
                    </div>
                    <div class="row mt-2">
                        <?php
                        $officer = Database::search("SELECT * FROM `officer` WHERE `email`='" . $_SESSION["o"]["email"] . "';");
                        $officerdata = $officer->fetch_assoc();
                        ?>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">First Name</label>
                            <input class="form-control" type="text" id="fn" value="<?php echo $officerdata["fname"]; ?>" required />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">Last Name</label>
                            <input class="form-control" type="text" id="ln" value="<?php echo $officerdata["lname"]; ?>" required />
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">Email</label>
                            <input class="form-control" type="text" id="e" value="<?php echo $officerdata["email"]; ?>" disabled />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">Mobile</label>
                            <input class="form-control" type="text" id="m" value="<?php echo $officerdata["mobile"]; ?>" required />
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">UserName</label>
                            <input class="form-control" type="text" id="un" value="<?php echo $officerdata["username"]; ?>" required />
                        </div>
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold fs-5 text-dark">Password</label>
                            <input class="form-control" type="text" id="pw" value="<?php echo $officerdata["password"]; ?>" required />
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>



                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-12 mt-1">
                            <div class="row">
                                <div class="offset-2 col-8  d-grid">
                                    <button class="btn btn-primary fw-bold" type="sumbit" onclick="officerUpdate();">Update</button>
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
                            <p>Profile Updated.</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" data-bs-dismiss="modal" href="updateOfficer.php">OK</a>
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
                        <a class="btn btn-secondary" href="officerSignIn.php">OK</a>
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