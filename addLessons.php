<?php

session_start();

require "connection.php";


?>

<!DOCTYPE html>

<html>

<head>

    <title>Add New Lessons</title>

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
                                    <h1 class="title2 pt-3">Add New Lessons</h1>
                                </div>
                                <?php

                                if (isset($_GET["error"])) {
                                ?>
                                    <div class="col-11 col-lg-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo $_GET["error"] ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                <?php
                                }

                                if (isset($_GET["Success"])) {
                                ?>
                                    <div class="col-11 col-lg-12">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Lesson Added Successfully.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                <?php
                                }

                                ?>
                            </div>
                            <form action="addLessonProcess.php" method="POST" enctype="multipart/form-data">
                                <div class="row mt-2">

                                    <div class="col-lg-12 col-11 p-3">
                                        <label class="form-label fw-bold fs-5 text-dark">Lesson Name</label>
                                        <input class="form-control" type="text" name="n" required />
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                    </div>
                                    <div class="col-lg-6 col-11 p-3">
                                        <label class="form-label fw-bold fs-5 text-dark">Select Subject</label>
                                        <select class="form-select" id="s" disabled>

                                            <?php

                                            $rs = Database::search("SELECT * FROM `subject`  WHERE `id`='" . $_SESSION["u"]["subject_id"] . "';");
                                            $n = $rs->num_rows;


                                            $subject = $rs->fetch_assoc();
                                            ?>
                                            <option class="fw-bold" value="<?php echo $subject["id"]; ?>"><?php echo $subject["name"]; ?></option>


                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-11 p-3">
                                        <label class="form-label fw-bold fs-5 text-dark">Select Grade</label>
                                        <select class="form-select" id="g" disabled>

                                            <?php

                                            $rs = Database::search("SELECT * FROM `grade` WHERE `id`='" . $_SESSION["u"]["grade_id"] . "';");
                                            $n = $rs->num_rows;



                                            $grade = $rs->fetch_assoc();
                                            ?>
                                            <option class="fw-bold" value="<?php echo $grade["id"]; ?>"><?php echo $grade["grade"]; ?></option>


                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <hr />
                                    </div>
                                    <div class="col-lg-6 col-11 p-3">
                                        <label class="form-label fw-bold fs-5 text-dark">Upload Lesson File (.pdf)</i></label> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="file" name="lesson" accept="application/pdf" required />
                                    </div>


                                    <div class="col-12">
                                        <hr />
                                    </div>
                                    <div class="col-12 mt-1">
                                        <div class="row">
                                            <div class="offset-2 col-8  d-grid">
                                                <button class="btn btn-primary fw-bold" type="sumbit" onclick="uploadLesson();">Sumbit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="border border-2 border-dark">
                                    </div>
                                    <div class="col-12 text-center">
                                        <h1 class="title2 pt-3">Uploaded Lessons</h1>
                                    </div>
                                    <div class=" col-lg-12 col-11 mt-3 mb-3" style="overflow-x:auto;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Lesson Name</th>
                                                    <th>Subject</th>
                                                    <th>Grade</th>
                                                    <th>Lesson File</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $note = Database::search("SELECT * FROM `note`;");
                                                $noteNum = $note->num_rows;

                                                if ($noteNum > 0) {

                                                    for ($i = 0; $i < $noteNum; $i++) {
                                                        $noteData = $note->fetch_assoc();



                                                ?>
                                                        <tr>

                                                            <td><?php echo $noteData["id"]; ?></td>
                                                            <td><?php echo $noteData["name"]; ?> </td>
                                                            <?php

                                                            $subject = Database::search("SELECT * FROM `subject` WHERE `id`='" . $noteData["subject_id"] . "';");
                                                            $subjectdata = $subject->fetch_assoc();

                                                            ?>
                                                            <td><?php echo $subjectdata["name"]; ?></td>

                                                            <td>
                                                                <?php
                                                                $grade = Database::search("SELECT * FROM `grade` WHERE `id`='" . $noteData["grade_id"] . "';");
                                                                $gradedata = $grade->fetch_assoc();
                                                                echo $gradedata["grade"]; ?>

                                                            </td>
                                                            <td><a target="_blank" href="<?php echo $noteData["file"] ?>"><i class="bi bi-filetype-pdf fs-2 text-dark"></i></a></td>




                                                        </tr>



                                                    <?php




                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="3">
                                                            <span class="fs-4 fw-bold">You haven't Upload any Notes Yet.</span>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                            </form>
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