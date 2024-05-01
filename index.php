<!-- <?php

// session_start();

// if (!isset($_SESSION["a"])) {



?> -->

    <!DOCTYPE html>

    <html>

    <head>

        <title>Index</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="icon" href="resources/logo.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    </head>


    <body>

        <div class="container-fluid">
            <div class="row">

                <div class="col-12 text-center mb-0">

                    <div class="text-center mt-2">
                        <img src="resources/logo2.png" height="38px">

                    </div>

                </div>

                <hr class="border border-1 border-dark mb-1 mt-2" />

                <div class="col-12 col-lg-7 mt-2 mb-3">
                    <div class="row text-center">
                        <div class="col-12 col-lg-3 d-grid mt-1 ">
                            <button class="btn btn-primary" onclick="goToAdmin();">
                                <a class="fs-1 text-light text-decoration-none"><i class="bi bi-eye"></i>
                                    <p class="fs-2">Admin</p>
                                </a>
                            </button>
                        </div>
                        <div class="col-12 col-lg-3 d-grid mt-1">
                            <button class="btn btn-danger" onclick="goToOfficer();">
                                <a class="fs-1 text-light text-decoration-none"><i class="bi bi-gear"></i>
                                    <p class="fs-2">Academic Officer</p>
                                </a>
                            </button>
                        </div>
                        <div class="col-12 col-lg-3 d-grid mt-1">
                            <button class="btn btn-success" onclick="goToTeacher();">
                                <a class="fs-1 text-light text-decoration-none"><i class="bi bi-person-check"></i>
                                    <p class="fs-2">Teacher</p>
                                </a>
                            </button>
                        </div>
                        <div class="col-12 col-lg-3 d-grid mt-1">
                            <button class="btn btn-dark" onclick="goToStudent();">
                                <a class="fs-1 text-light text-decoration-none" href="studentSignIn.php"><i class="bi bi-mortarboard"></i>
                                    <p class="fs-2 ">Student</p>
                                </a>
                            </button>
                        </div>
                    </div>
                    <hr class="border border-1 border-secondary d-lg-block d-none">
                    <div class="row d-lg-block d-none">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <h3 class="fw-bold">Our Vision <i class="bi bi-caret-right-fill text-primary"></i></h2>
                                        <hr>
                                        <p>To become the national leader in research-based education.</p>
                                </div>
                                <div class="col-4">
                                    <h3 class="fw-bold">Our Way <i class="bi bi-caret-right-fill text-danger"></i></h2>
                                        <hr>
                                        <p>Disseminate 100% of existing knowledge and let students discover new knowledge.</p>
                                </div>
                                
                                <div class="col-4">
                                    <h3 class="fw-bold">Our People <i class="bi bi-caret-right-fill text-secondary"></i></h2>
                                        <hr>
                                        <p>A wonderful set of academics with the passion to teach.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 d-lg-none d-block">
                    <hr class="border border-1 border-secondary">
                </div>
                <div class="col-12 col-lg-5 mb-2 mt-0">

                    <div class="row">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="resources/home/1.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/home/2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/home/3.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/home/4.jpg" class="d-block w-100" alt="...">
                                </div>

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>


                    </div>


                </div>


                <?php
                require "footer.php";
                ?>
            </div>


        </div>




        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>


    </body>

    </html>

<!-- <?php 
// } else {
// ?>
//     <script>
//         window.location = "home.php";
//     </script>
// <?php
// }
//  ?>