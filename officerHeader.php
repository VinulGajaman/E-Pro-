<div class="col-12 bg-secondary p-2">
    <div class="text-center">
        <img src="resources/logo3.png" height="38px">

    </div>

    <div class="offset-6 col-6 offset-lg-9 col-lg-3 mt-3">


        <span class="text-start fs-5 text-end"><b>Welcome</b>

            <?php

            $user = $_SESSION["o"];
            echo $user["fname"];

            ?>

            |<span class="text-start text-light fs-5" style="cursor: pointer;" onclick="signOutOfficer();"> Sign Out</span>

        </span>


    </div>
</div>
<div class="container-fluid justify-content-center vh-100">


    <div class="row r1 g-0 mt-5 mb-4">

        <div class="col-lg-3 col-12 border-end border-2">
            <div class="row">
                <div class="col-12">
                    <div class="text-center fs-2 bg-dark">
                        <a class="text-decoration-none text-light" href="officerPanel.php">Academic Officer Portal</a>
                    </div>
                </div>
                <hr class="border border-light border-2">

                <div class="col-12">
                    <div class="nav flex-column nav-pills me-3 mt-1" role="tablist" aria-orientation="vertical">
                        <nav class="nav flex-column">
                            <a class="nav-link  fs-5 mt-3 text-dark" aria-current="page" href="officerPanel.php">Dashboard</a>
                            <div class="dropdown">
                                <a class="nav-link fs-5 mt-3 text-dark dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Manage Students</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="studentRegister.php">Students Registration</a></li>
                                    <li><a class="dropdown-item" href="viewStudetns.php">View All Students</a></li>

                                </ul>
                            </div>
                            <a class="nav-link fs-5 mt-3 text-dark" href="officerAssignments.php">Assignments Marks</a>
                            <a class="nav-link fs-5 mt-3 text-dark" href="updateOfficer.php">Update Profile</a>

                        </nav>
                    </div>
                </div>

            </div>
        </div>