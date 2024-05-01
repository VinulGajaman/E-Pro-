<?php

session_start();

require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>

    <title>All Academic Officers</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="resources/logo.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style.css" />
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
                            <h1 class="title2 pt-3">Academic Officers</h1>
                        </div>

                    </div>
                    <div class="row">

                        <div class=" col-lg-12 col-11 mt-3 mb-3 " style="overflow-x:auto;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Username</th>
                                        <th>Passsword</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $officer = Database::search("SELECT * FROM `officer`;");
                                    $officerNum = $officer->num_rows;

                                    if ($officerNum > 0) {

                                        for ($i = 0; $i < $officerNum; $i++) {
                                            $officerdata = $officer->fetch_assoc();



                                    ?>
                                            <tr onclick="sendInvite('<?php echo $officerdata['email']; ?>');">

                                                <td><?php echo $officerdata["fname"]; ?>&nbsp;<?php echo $officerdata["lname"]; ?> </td>
                                                <td><?php echo $officerdata["email"]; ?> </td>
                                                <td><?php echo $officerdata["mobile"]; ?> </td>
                                                <td><?php echo $officerdata["username"]; ?> </td>
                                                <td><?php echo $officerdata["password"]; ?> </td>

                                                <?php


                                                $status = Database::search("SELECT * FROM `verify_status` WHERE `id`='" . $officerdata["verify_status_id"] . "';");
                                                $statusdata = $status->fetch_assoc();


                                                ?>
                                                <td><?php echo $statusdata["status"]; ?></td>
                                                <?php
                                                if ($statusdata["status"] == 'Not Verified') {
                                                ?>

                                                    <!-- invitation model -->
                                                    <div class="modal" tabindex="-1" id="sendInvite<?php echo $officerdata["email"]; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"><span class="text-primary">E-PRO for advanced Technology</span></h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="fw-bold"><?php echo $officerdata["fname"]; ?>&nbsp;<?php echo $officerdata["lname"]; ?></p>
                                                                    <br>
                                                                    <span class="fw-bold">UserName :</span> &nbsp;<span><?php echo $officerdata["username"]; ?></span>
                                                                    <br>
                                                                    <span class="fw-bold">Password :</span> &nbsp;<span><?php echo $officerdata["password"]; ?></span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary" onclick="sendInviteOfficer('<?php echo $officerdata['email']; ?>');">Send Invitation</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--invitation model -->
                                                <?php
                                                } else {

                                                ?>

                                                    <!-- invitation model -->
                                                    <div class="modal" tabindex="-1" id="sendInvite<?php echo $officerdata["email"]; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"><span class="text-primary">E-PRO for advanced Technology</span></h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="fw-bold"><?php echo $officerdata["fname"]; ?>&nbsp;<?php echo $officerdata["lname"]; ?> Has Been Already Registered.</p>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary" onclick="sendInviteOfficer('<?php echo $officerdata['email']; ?>');">Send Invititation Again.</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--invitation model -->
                                                <?php

                                                }

                                                ?>
                                            </tr>



                                            <?php


                                            // model
                                            ?>
                                            <div class="modal" tabindex="-1" id="openModel2<?php echo $officerdata["email"]; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-decoration-underline"><span class="text-primary">E-PRO for advanced Technology</span></h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="fw-bold">Invitatiton Send to <?php echo $officerdata["fname"]; ?>&nbsp;<?php echo $officerdata["lname"]; ?></p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary" data-bs-dismiss="modal" href="viewOfficers.php">Close</a>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                            // model




                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="4">
                                                <span class="fs-4 fw-bold text-center">You haven't Register any Academic Officer Yet.</span>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr />
                    </div>



                </div>
            </div>
        </div>


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