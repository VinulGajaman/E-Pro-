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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


</head>
<?php
if (isset($_SESSION["s"])) {
?>

    <body onload="selectSubjectAssignment();">

        <?php
        require "studentHeader.php";
        ?>
        <hr class="border border-warning border-2 d-lg-none d-block">
        <div class="col-lg-8 col-12 pb-3 ps-4 mb-3">

            <div class="row">
                <div class="col-12">

                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="title2 pt-3">Assignments</h1>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold text-dark">Select Subject</label>
                            <select class="form-select" id="s" required id="s" onchange="selectSubjectAssignment();">

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

                        <div class="col-lg-6 col-11 p-3">
                            <label class="form-label fw-bold text-dark">Select Grade</label>
                            <select class="form-select" required id="g" onchange="selectSubjectAssignment();">

                                <?php

                                $rs = Database::search("SELECT * FROM `Grade`;");
                                $n = $rs->num_rows;

                                for ($i = 0; $i < $n; $i++) {

                                    $subject = $rs->fetch_assoc();
                                ?>
                                    <option class="fw-bold" value="<?php echo $subject["id"]; ?>"><?php echo $subject["grade"]; ?></option>

                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class=" col-lg-12 col-11 mt-3 mb-3 " style="overflow-x:auto;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Assignment Name</th>
                                        <th>Subject</th>
                                        <th>Grade</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Question File</th>
                                        <th>Answer File</th>
                                        <th>Marks</th>


                                    </tr>
                                </thead>
                                <tbody id="loadAssignments">

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