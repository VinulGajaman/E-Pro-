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


            <td><?php

                $marksCh = Database::search("SELECT * from `marks` WHERE `assignment_id`='" . $assignmentdata["id"] . "';");

                if ($marksCh->num_rows == 0) {
                ?>
                    <span class="fw-bold text-dark">Not Released</span>
                    <?php
                } else {

                    $marksData = $marksCh->fetch_assoc();
                    if ($marksData["release_id"] == "2") {
                    ?>
                        <button class="btn btn-success fw-bold" id="release<?php echo $assignmentdata["id"]; ?>" onclick="markReleaseOfficer('<?php echo $assignmentdata['id']; ?>');">Release Marks</a>
                        <?php
                    } else {
                        ?>
                            <button class="btn btn-danger fw-bold" id="release<?php echo $assignmentdata["id"]; ?>" onclick="markReleaseOfficer('<?php echo $assignmentdata['id']; ?>');">Don't Release Marks</button>
                    <?php
                    }
                }
                    ?>


            </td>



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
