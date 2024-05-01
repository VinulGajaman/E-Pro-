<div class="col-12 bg-secondary p-2">

    <div class="text-center">
        <img src="resources/logo3.png" height="38px">

    </div>
    <div class="offset-3 col-9 offset-lg-9 col-lg-3 mt-lg-2 mt-4">


        <span class="text-start fs-5 text-end"><b>Welcome</b>

            <?php

            $user = $_SESSION["a"];
            echo $user["fname"]; ?>&nbsp;<?php
                                            echo $user["lname"];

                                            ?>

            |<span class="text-start text-light fs-5" style="cursor: pointer;" onclick="signOutAdmin();"> Sign Out</span>

        </span>


    </div>
</div>
<div class="container justify-content-center vh-100">

    <div class="row r1 g-0 mt-3 mb-4">

        <div class="col-lg-3 col-12 border-end border-2 mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="text-center fs-2 bg-secondary">
                        <a class="text-decoration-none text-light" href="adminPanel.php"><i class="bi bi-person-fill"></i> ADMIN</a>
                        <hr class="border border-light border-2">
                    </div>
                </div>


                <div class="col-12">
                    <div class="nav flex-column nav-pills me-3 mt-1" role="tablist" aria-orientation="vertical">
                        <nav class="nav flex-column">
                            <a class="nav-link  fs-5 mt-3 text-dark" aria-current="page" href="adminPanel.php">Dashboard</a>

                            <div class="dropdown">
                                <a class="nav-link fs-5 mt-3 text-dark dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Manage Teachers</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="teacherRegister.php">Teacher Registration</a></li>
                                    <li><a class="dropdown-item" href="viewTeachers.php">View All Teachers</a></li>

                                </ul>
                            </div>
                            <div class="dropdown">
                                <a class="nav-link fs-5 mt-3 text-dark dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Manage Academic Officers</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="officerRegister.php">Academic Officer Registration</a></li>
                                    <li><a class="dropdown-item" href="viewOfficers.php">View All Academic Officers</a></li>
                                </ul>
                            </div>

                            <a class="nav-link fs-5 mt-3 text-dark" href="manageStudents.php">Manage Students</a>


                            
                            <a class="nav-link fs-5 mt-3 text-dark" href="updateAdmin.php">Update Profile</a>
                            
                        </nav>
                    </div>
                </div>

            </div>
        </div>