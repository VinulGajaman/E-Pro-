<div class="col-12 bg-secondary p-2">

    <div class="text-center">
        <img src="resources/logo3.png" height="38px">

    </div>
    <div class="offset-3 col-9 offset-lg-9 col-lg-3 mt-lg-2 mt-4">


        <span class="text-start fs-5 text-end"><b>Welcome</b>

            <?php

            $user = $_SESSION["s"];
            echo $user["fname"]; ?>&nbsp;<?php
                                            echo $user["lname"];

                                            ?>

            |<span class="text-start text-light fs-5" style="cursor: pointer;" onclick="signOutStudent();"> Sign Out</span>

        </span>


    </div>
</div>
<div class="container-fluid justify-content-center vh-100">


    <div class="row r1 g-0 mt-5 mb-4">

        <div class="col-lg-3 col-12 border-end border-2">
            <div class="row">
                <div class="col-12">
                    <div class="text-center fs-2 bg-dark">
                        <a class="text-decoration-none text-light" href="studentPanel.php">Student Portal</a>
                    </div>
                </div>
                <hr class="border border-light border-2">

                <div class="col-12">
                    <div class="nav flex-column nav-pills me-3 mt-1" role="tablist" aria-orientation="vertical">
                        <nav class="nav flex-column">
                            <a class="nav-link  fs-5 mt-3 text-dark" aria-current="page" href="studentPanel.php">Dashboard</a>

                            <a class="nav-link fs-5 mt-3 text-dark" href="studentAssignments.php">Assignments</a>
                            <a class="nav-link fs-5 mt-3 text-dark" href="studentLessons.php">Lessons Notes</a>
                            <a class="nav-link fs-5 mt-3 text-dark" href="updateStudent.php">Update Profile</a>

                        </nav>
                    </div>
                </div>

            </div>
        </div>