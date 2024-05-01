<?php
session_start();

require "connection.php";

$s = $_POST["s"];
$g = $_POST["g"];




$assignment =  Database::search("SELECT * FROM `note` WHERE `subject_id`='" . $s . "' AND `grade_id`='" . $g . "';");

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
            $teacher = Database::search("SELECT * from `teacher` WHERE `email`='" . $assignmentdata["teacher_email"] . "';");
            $teacherData = $teacher->fetch_assoc();
            ?>
            <td><?php echo $teacherData["fname"]; ?>&nbsp;<?php echo $teacherData["lname"]; ?></td>
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


            <td><a target="_blank" class="btn btn-primary fw-bold" href="<?php echo $assignmentdata["file"]; ?>">Download</a></td>
            
            


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
