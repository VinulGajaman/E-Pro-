<?php

session_start();

require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>

    <title>Add Assignments</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="resources/logo.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


</head>
<?php
if (isset($_SESSION["u"])) {
?>

    <body onload="selectAssignment();">
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
                                    <h1 class="title2 pt-3">Assignments Answers</h1>
                                </div>

                                <div class="col-lg-6 col-11 p-3">
                                    <label class="form-label fw-bold fs-5 text-dark">Select Assignment</label>
                                    <select class="form-select" id="a" onchange="selectAssignment();">

                                        <?php

                                        $rs = Database::search("SELECT * FROM `assignment` WHERE `teacher_email`='" . $_SESSION["u"]["email"] . "';");
                                        $n = $rs->num_rows;

                                        for ($x = 0; $x < $n; $x++) {


                                            $grade = $rs->fetch_assoc();
                                        ?>
                                            <option class="fw-bold" value="<?php echo $grade["id"]; ?>"><?php echo $grade["name"]; ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <hr class="border border-2 border-dark">
                                </div>

                                <div class=" col-lg-12 col-11 mt-3 mb-3" style="overflow-x:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Assignment Name</th>
                                                <th>Uploaded Date</th>
                                                <th>Assignment File</th>
                                                <th>Student Name</th>
                                                <th>Answer File</th>


                                            </tr>
                                        </thead>
                                        <tbody id="loadAnswers">
                                        </tbody>
                                    </table>
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
                                <h5 class="modal-title"><span class="text-primary">E-PRO for Advanced Technology.</span></h5>
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
                        <h5 class="modal-title"><span class="text-primary">Online Student Management System</span></h5>
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