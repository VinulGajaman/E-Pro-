<?php
session_start();

require "connection.php";

$s = $_POST["s"];
$g = $_POST["g"];




$assignment =  Database::search("SELECT * FROM `assignment` WHERE `subject_id`='" . $s . "' AND `grade_id`='" . $g . "';");

?>

<?php

$assignmentNum = $assignment->num_rows;



if ($assignmentNum > 0) {

    for ($i = 0; $i < $assignmentNum; $i++) {
        $assignmentdata = $assignment->fetch_assoc();



?>
        <tr>

            <td><?php echo $assignmentdata["id"]; ?></td>
            <td><?php echo $assignmentdata["name"]; ?> </td>
            <?php
            $subject = Database::search("SELECT * from `subject` WHERE `id`='" . $assignmentdata["subject_id"] . "';");
            $subjectData = $subject->fetch_assoc();
            ?>
            <td><?php echo $subjectData["name"]; ?> </td>
            <?php
            $grade = Database::search("SELECT * from `grade` WHERE `id`='" . $assignmentdata["grade_id"] . "';");
            $gradeData = $grade->fetch_assoc();
            ?>
            <td><?php echo $gradeData["grade"]; ?> </td>

            <td><?php echo $assignmentdata["start_date"]; ?> </td>
            <td><?php echo $assignmentdata["end_date"]; ?> </td>

            <td><a target="_blank" class="btn btn-primary fw-bold" href="<?php echo $assignmentdata["file"]; ?>">Download</a></td>
            <td><?php
                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d");

                $marksCh = Database::search("SELECT * from `marks` WHERE `assignment_id`='" . $assignmentdata["id"] . "' AND `student_id`='" . $_SESSION["s"]["id"] . "';");

                $answerCheck = Database::search("SELECT * from `answer` WHERE `assignment_id`='" . $assignmentdata["id"] . "';");
                if ($date >= $assignmentdata["end_date"] || $marksCh->num_rows == 1) {
                ?>
                    <button class="btn btn-success fw-bold" disabled>Upload</a>
                        <?php
                    } else {

                        if ($answerCheck->num_rows == 1) {

                        ?>
                            <button class="btn btn-danger fw-bold" id="btn<?php echo $_SESSION['s']['id']; ?>or<?php echo $assignmentdata['id'] ?>" onclick="openAnswer('<?php echo $_SESSION['s']['id']; ?>','<?php echo $assignmentdata['id'] ?>');">Reupload</a>
                            <?php
                        } else {
                            ?>
                                <button class="btn btn-success fw-bold" id="btn<?php echo $_SESSION['s']['id']; ?>or<?php echo $assignmentdata['id'] ?>" onclick="openAnswer('<?php echo $_SESSION['s']['id']; ?>','<?php echo $assignmentdata['id'] ?>');">Upload</a>
                            <?php
                        }
                    }
                            ?>


            </td>
            <!-- model -->
            <div class="modal" tabindex="-1" id="openUpload">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><span class="text-primary">E-PRO for Advanced Technology.</span></h5>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger" id="msg"></p>

                            <br />
                            <p><label class="form-label fw-bold fs-5 text-dark">Upload Your Answer File (.pdf)</i></label> &nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <input type="file" id="answerFile" accept="application/pdf" required />
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" onclick="sumbitAnswer('<?php echo $_SESSION['s']['id']; ?>','<?php echo $assignmentdata['id'] ?>');">Sumbit</a>
                            <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- model -->
            <?php
            $marks = Database::search("SELECT * from `marks` WHERE `student_id`='" . $_SESSION["s"]["id"] . "' AND `assignment_id`='" . $assignmentdata["id"] . "';");

            if ($marksNum = $marks->num_rows > 0) {

                $marksData = $marks->fetch_assoc();
                if ($marksData["release_id"] == "1") {
            ?>
                    <td><?php echo $marksData["marks"]; ?>%</td>
                <?php

                } else {
                ?>
                    <td><?php echo "Not Released." ?></td>
                <?php
                }
            } else {

                ?>
                <td><?php echo "Not Released." ?></td>
            <?php
            }
            ?>


        </tr>



    <?php




    }
} else {
    ?>
    <tr>
        <td></td>
        <td colspan="4">
            <span class="fs-4 fw-bold text-center">No Assignment Uploaded Yet.</span>
        </td>
    </tr>
<?php
}
?>


<?php
