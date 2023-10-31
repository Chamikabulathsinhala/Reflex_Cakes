<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin SignIn | Reflex Cakes</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css.css/style.scss">

    <link rel="icon" href="img/LOGO.png" />
</head>

<body class="main-body" style="background-image: url(img/b1.jpg);">
    <div class="menu-heading">
        <h3 class="fw-bold text-dark"></h3>
        <!-- <div class="specialoffer"><img src="images/specialoffers.png" alt=""></div> -->
        <!-- <p> <a href="home.php">home</a> / checkout </p> -->
    </div>

    <div class="container-fluid justify-content-center" style="margin-top: 100px;">
        <div class="row align-content-center">

            <div class="col-12">
                <div class="row">


                    <br /><br />
                    <div class="col-12">
                        <p class="text-center text-bg-secondary fw-bold fst-italic fs-1">Wellcome Admins.</p>
                    </div>
                    <div class="col-12 logo"></div>
                </div>
            </div>

            <div class="col-12 p-5">
                <div class="row">
                    <div class="col-12 d-none d-lg-block "></div>

                    <div class="col-12 col-lg-6 d-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="title02 text-light">Sign In to your Account.</p>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-light">Email</label>
                                <input type="email" class="form-control" placeholder="ex : abc@gmail.com" id="e" />
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-warning" onclick="adminVerification();">Send Verification Code</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger" onclick="AGoHome();">Back to Customer Log In</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-12 fixed-bottom text-center text-light">
                    <p>&copy; 2023 ReflexCakes.lk | All Rights Reserved</p>
                </div> -->
            </div>

            <!--  -->

            <div class="modal" tabindex="-1" id="verificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Enter Your Verification Code</label>
                            <input type="text" class="form-control" id="vcode">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
            </br></br></br></br>
            <div class="col-12  text-center text-light">
                <p>&copy; 2023 ReflexCakes.lk | All Rights Reserved</p>
            </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>