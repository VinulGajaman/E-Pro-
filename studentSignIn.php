<?php

session_start();

if (!isset($_SESSION["s"])) {



?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Student</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="icon" href="resources/logo.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="style.css" />

    </head>


    <body>

        <div class="container justify-content-center">

            <div class="row r1 g-0 mt-5 mb-4">

                <!-- <div class="col-lg-5 d-lg-none d-block">
                <img src="resourses/index_small.jpg" class="img-fluid login_img" alt="" style="background-size: contain;" />
            </div> -->
                <div class="col-lg-7 text-center mt-4">
                    <div class="row">
                    <div class="col-12 d-lg-block ms-lg-5 ms-md-5">
                            <img src="resources/logo2.png" height="50px" class="d-lg-block d-md-block d-none">
                            <img src="resources/logo2.png" height="35px" class="d-lg-none d-md-none">
                            <hr>
                            <h1 class="mt-1 animate__animated animate__fadeIn animate__infinite infinite title1" style="font-size: 5rem;">Studnet Sign In</h1>
                        </div>
                    </div>

                    <div class="row p-3 pb-3">
                        <div class="col-12 g-5">
                            <h3>Sign In to your Account</h3>
                        </div>
                        <p id="msg2" class="text-danger"></p>

                        <?php

                        $u = "";
                        $p = "";

                        if (isset($_COOKIE["stun"])) {
                            $u = $_COOKIE["stun"];
                        }

                        if (isset($_COOKIE["stpw"])) {
                            $p = $_COOKIE["stpw"];
                        }

                        ?>

                        <div class="offset-1 col-10 mt-4 rounded rounded-2 ">
                            <input type="text" class="form-control border border-secondary" value="<?php echo $u; ?>" placeholder="Username" id="un" />
                        </div>
                        <div class="offset-1 col-10 mt-4 rounded rounded-2">
                            <input type="password" class="form-control border border-secondary" value="<?php echo $p; ?>" placeholder="Password" id="pw" />
                        </div>
                        <div class="offset-1 col-lg-3 col-4 mt-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label">Remember Me</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10 mt-4 offset-1 col-lg-5 d-grid">
                                <button class="btn btn-primary" onclick="studentSignIn();">Sign In</button>
                            </div>

                            <div class="col-10 mt-4 offset-1 col-lg-5 d-grid">
                                <a class="btn btn-dark" href="index.php">Back to Home</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 d-lg-block d-none">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resources/carosel/bk1.jpg" class="img-fluid login_img" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/carosel/bk2.jpg" class="img-fluid login_img" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/carosel/bk3.jpg" class="img-fluid login_img" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>


            </div>


        </div>

        <!-- model -->

        <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Teacher Verification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="msg3" class="text-danger"></p>

                        <label class="text-danger fw-bold" id="msg"></label>
                        <label for="" class="form-label">Enter the Verification Code you got by an Email</label>
                        <input type="text" class="form-control" id="vc" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="studentVerify();">Verify</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- model -->





        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>


    </body>

    </html>

<?php
} else {
?>
    <script>
        window.location = "studentPanel.php";
    </script>
<?php
}
?>