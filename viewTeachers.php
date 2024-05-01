<?php

session_start();

require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>

    <title>All Teachers</title>

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
                                    <h1 class="title2 pt-3">Teachers</h1>
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
                                                <th>Grade</th>
                                                <th>Subject</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $teacher = Database::search("SELECT * FROM `teacher`;");
                                            $teacherNum = $teacher->num_rows;

                                            if ($teacherNum > 0) {

                                                for ($i = 0; $i < $teacherNum; $i++) {
                                                    $teacherdata = $teacher->fetch_assoc();



                                            ?>
                                                    <tr onclick="sendInvite('<?php echo $teacherdata['email']; ?>');">

                                                        <td><?php echo $teacherdata["fname"]; ?>&nbsp;<?php echo $teacherdata["lname"]; ?> </td>
                                                        <td><?php echo $teacherdata["email"]; ?> </td>
                                                        <td><?php echo $teacherdata["mobile"]; ?> </td>
                                                        <td><?php echo $teacherdata["username"]; ?> </td>
                                                        <td><?php echo $teacherdata["password"]; ?> </td>
                                                        <td>
                                                            <?php
                                                            $grade = Database::search("SELECT * FROM `grade` WHERE `id`='" . $teacherdata["grade_id"] . "';");
                                                            $gradedata = $grade->fetch_assoc();
                                                            echo $gradedata["grade"]; ?>

                                                        </td>
                                                        <?php

                                                        $subject = Database::search("SELECT * FROM `subject` WHERE `id`='" . $teacherdata["subject_id"] . "';");
                                                        $subjectdata = $subject->fetch_assoc();

                                                        ?>
                                                        <td><?php echo $subjectdata["name"]; ?></td>

                                                        <?php


                                                        $status = Database::search("SELECT * FROM `verify_status` WHERE `id`='" . $teacherdata["verify_status_id"] . "';");
                                                        $statusdata = $status->fetch_assoc();


                                                        ?>
                                                        <td><?php echo $statusdata["status"]; ?></td>

                                                        <?php
                                                        if ($statusdata["status"] == 'Not Verified') {
                                                        ?>

                                                            <!-- invitation model -->
                                                            <div class="modal" tabindex="-1" id="sendInvite<?php echo $teacherdata["email"]; ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-decoration-underline"><span class="text-primary">E-PRO for advanced Technology</span></h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p class="fw-bold"><?php echo $teacherdata["fname"]; ?>&nbsp;<?php echo $teacherdata["lname"]; ?></p>
                                                                            <br>
                                                                            <span class="fw-bold">UserName :</span> &nbsp;<span><?php echo $teacherdata["username"]; ?></span>
                                                                            <br>
                                                                            <span class="fw-bold">Password :</span> &nbsp;<span><?php echo $teacherdata["password"]; ?></span>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                          
                                                                            <button type="button" class="btn btn-primary" onclick="sendInviteTeacher('<?php echo $teacherdata['email']; ?>');">Send Invitation</button>
                                                                        </div>
                                                                        <hr class="border border-2 border-dark">
                                                                        <p class="fw-bold text-success text-center">Update Grade and Subject :</p>
                                                                        <hr>
                                                                        <div class="col-11 p-3">
                                                                            <label class="form-label fw-bold fs-5 text-dark">Select Grade</label>
                                                                            <select class="form-select" id="g" required>
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
                                                                        <div class="col-11 p-3">
                                                                            <label class="form-label fw-bold fs-6 text-dark">Select Subject</label>
                                                                            <select class="form-select" id="s" required>

                                                                                <?php

                                                                                $rs = Database::search("SELECT * FROM `subject`;");
                                                                                $n = $rs->num_rows;

                                                                                for ($i = 0; $i < $n; $i++) {

                                                                                    $subject = $rs->fetch_assoc();
                                                                                ?>
                                                                                    <option class="fw-bold" value="<?php echo $subject["id"]; ?>"><?php echo $subject["name"]; ?></option>

                                                                                <?php
                                                                                }

                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a type="button" class="btn btn-secondary" href="viewTeachers.php">Close</a>
                                                                            <button type="button" class="btn btn-primary" onclick="updateDetailsTeacher('<?php echo $teacherdata['email']; ?>');">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--invitation model -->
                                                        <?php
                                                        } else {

                                                        ?>

                                                            <!-- invitation model -->
                                                            <div class="modal" tabindex="-1" id="sendInvite<?php echo $teacherdata["email"]; ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"><span class="text-primary text-decoration-underline">E-PRO for advanced Technology</span></h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p class="fw-bold"><?php echo $teacherdata["fname"]; ?>&nbsp;<?php echo $teacherdata["lname"]; ?> Has Been Already Registered.</p>

                                                                        </div>
                                                                        <div class="modal-footer">

                                                                            <button type="button" class="btn btn-primary" onclick="sendInviteTeacher('<?php echo $teacherdata['email']; ?>');">Send Invititation Again.</button>
                                                                        </div>
                                                                        <hr class="border border-2 border-dark">
                                                                        <p class="fw-bold text-success text-center fs-5">Update Grade and Subject :</p>
                                                                        <hr>
                                                                        <div class="col-11 p-3">
                                                                            <label class="form-label fw-bold fs-6 text-dark">Select Grade</label>
                                                                            <select class="form-select" id="g" required>
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
                                                                        <div class="col-11 p-3">
                                                                            <label class="form-label fw-bold fs-6 text-dark">Select Subject</label>
                                                                            <select class="form-select" id="s" required>

                                                                                <?php

                                                                                $rs = Database::search("SELECT * FROM `subject`;");
                                                                                $n = $rs->num_rows;

                                                                                for ($i = 0; $i < $n; $i++) {

                                                                                    $subject = $rs->fetch_assoc();
                                                                                ?>
                                                                                    <option class="fw-bold" value="<?php echo $subject["id"]; ?>"><?php echo $subject["name"]; ?></option>

                                                                                <?php
                                                                                }

                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a type="button" class="btn btn-secondary" href="viewTeachers.php">Close</a>
                                                                            <button type="button" class="btn btn-primary" onclick="updateDetailsTeacher('<?php echo $teacherdata['email']; ?>');">Update</button>
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
                                                    <div class="modal" tabindex="-1" id="openModel1<?php echo $teacherdata["email"]; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-decoration-underline"><span class="text-primary">E-PRO for advanced Technology</span></h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="fw-bold">Invitatiton Send to <?php echo $teacherdata["fname"]; ?>&nbsp;<?php echo $teacherdata["lname"]; ?></p>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" data-bs-dismiss="modal" href="viewTeachers.php">Close</a>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    // model
                                                    // model
                                                    ?>
                                                    <div class="modal" tabindex="-1" id="openModel2<?php echo $teacherdata["email"]; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-decoration-underline"><span class="text-primary">E-PRO for advanced Technology</span></h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="fw-bold">Grade and Subject Updated.</p>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-secondary" data-bs-dismiss="modal" href="viewTeachers.php">Close</a>

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
                                                    <td></td>
                                                    <td colspan="3">
                                                        <span class="fs-4 fw-bold">You haven't Register any Teacher Yet.</span>
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