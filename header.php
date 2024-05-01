<!DOCTYPE html>

<html>


<head>


    <title>Teacher Panel</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="new/logo2.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


</html>


<body>

    <div class="col-12 bg-secondary p-2">

        <div class="text-center">
            <img src="resources/logo3.png" height="38px">

        </div>
        <div class="offset-4 col-8 offset-lg-9 col-lg-3 mt-lg-2 mt-4">


            <span class="text-start fs-5 text-end"><b>Welcome</b>

                <?php

                $user = $_SESSION["u"];
                echo $user["fname"];?>&nbsp;<?php
                echo $user["lname"];

                ?>

                |<span class="text-start text-light fs-5" style="cursor: pointer;" onclick="signOut();"> Sign Out</span>

            </span>


        </div>
    </div>



    <script src="script.js">
    </script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>