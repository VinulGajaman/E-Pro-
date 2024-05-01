<?php
session_start();

require "connection.php";

$a = $_POST["a"];




$note =  Database::search("SELECT * FROM `answer` WHERE `assignment_id`='" . $a . "';");

?>

<?php

$noteNum = $note->num_rows;

if ($noteNum > 0) {

    for ($i = 0; $i < $noteNum; $i++) {
        $noteData = $note->fetch_assoc();



?>
        <tr>

            <td><?php echo $noteData["id"]; ?></td>
            <?php

            $subject = Database::search("SELECT * FROM `assignment` WHERE `id`='" . $noteData["assignment_id"] . "';");
            $subjectdata = $subject->fetch_assoc();

            ?>
            <td><?php echo $subjectdata["name"]; ?> </td>

            <td><?php echo $noteData["date"]; ?></td>
            <td><a target="_blank" href="<?php echo $subjectdata["file"]; ?>"><i class="bi bi-filetype-pdf fs-2 text-dark"></i></a></td>
            <?php

            $student = Database::search("SELECT * FROM `student` WHERE `id`='" . $noteData["student_id"] . "';");
            $studentdata = $student->fetch_assoc();

            ?>
            <td><?php echo $studentdata["fname"]; ?>&nbsp;<?php echo $studentdata["lname"]; ?></td>

            <td><a target="_blank" href="<?php echo $noteData["answer_file"]; ?>"><i class="bi bi-filetype-pdf fs-2 text-primary"></i></a></td>
            <td><button class="fw-bold btn btn-primary" onclick="openAddMark('<?php echo $noteData['student_id']; ?>','<?php echo $noteData['assignment_id']; ?>');">Add Marks</button></td>
            <?php
            $marksCheck = Database::search("SELECT * from `marks` WHERE `assignment_id`='" . $noteData["assignment_id"] . "' AND `student_id`='" . $noteData['student_id'] . "';");
            if ($marksCheck->num_rows == 1) {
                $marksCheckdata = $marksCheck->fetch_assoc();
            ?>
                <td><span class="fw-bold fs-5"><?php echo $marksCheckdata["marks"]; ?>%</span></td>

            <?php
            } else {
            ?>
            <td></td>
            <?php

            }

            ?>
            <!-- model -->
            <div class="modal" tabindex="-1" id="marksAdd<?php echo $noteData['student_id']; ?>or<?php echo $noteData['assignment_id']; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><span class="text-primary">E-PRO for Advanced Technology.</span></h5>
                        </div>
                        <div class="modal-body">
                            <?php
                            $student = Database::search("SELECT * FROM `student` WHERE `id`='" . $noteData["student_id"] . "';");
                            $studentdata = $student->fetch_assoc();
                            ?>
                            <p class="fw-bold text-dark">Student Name : <span class="text-secondary"><?php echo $studentdata["fname"] ?>&nbsp;<?php echo $studentdata["lname"] ?></span></p>

                            <?php
                            $ass = Database::search("SELECT * FROM `assignment` WHERE `id`='" . $noteData['assignment_id'] . "';");
                            $assdata = $ass->fetch_assoc();
                            $graders = Database::search("SELECT * FROM `grade` WHERE `id`='" . $assdata["grade_id"] . "';");
                            $gradedata = $graders->fetch_assoc();
                            ?>
                            <p class="fw-bold text-dark">Student Grade : <span class="text-secondary"><?php echo $gradedata["grade"] ?></p>

                            <?php
                            $answer = Database::search("SELECT * FROM `answer` WHERE `student_id`='" . $noteData["student_id"] . "' AND `assignment_id`='" . $noteData['assignment_id'] . "';");
                            $answerdata = $answer->fetch_assoc();
                            ?>
                            <p class="fw-bold text-dark">Upload Date : <span class="text-secondary"><?php echo $answerdata["date"] ?></p>
                            <p class="fw-bold text-dark">Assignment End Date : <span class="text-secondary"><?php echo $assdata["end_date"] ?></p>
                            <hr>

                            <div class="col-lg-4">
                                <p class="fw-bold text-danger" id="warning"></p>
                                <label class="form-label fw-bold fs-5 text-dark">Add Marks</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="number" max="100" min="0" id="mark" />
                                    <span class="input-group-text">/100</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary" onclick="addMarks('<?php echo $noteData['student_id']; ?>','<?php echo $noteData['assignment_id']; ?>');">Add Marks</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- model -->


        </tr>



    <?php




    }
} else {
    ?>
    <tr>
        <td></td>
        <td></td>
        <td colspan="3">
            <span class="fs-4 fw-bold">No any Answers Uploaded Yet.</span>
        </td>
    </tr>
<?php
}
?>


<?php
