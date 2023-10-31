<?php

session_start();
require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Users | Admins | eShop</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css.css/style.scss">
    <link rel="icon" href="img/LOGO.png" />
</head>

<body style="background-image: url(img/b1.jpg);">

    <div class="container-fluid">
        <div class="row">
        <div class="menu-heading">
                <h3 class="fw-bold text-dark">Manage All Users...</h3>
                <!-- <div class="specialoffer"><img src="images/specialoffers.png" alt=""></div> -->
                <!-- <p> <a href="home.php">home</a> / checkout </p> -->
            </div>

            <div class="col-12 bg-light text-center">
                <label class="form-label text-dark fw-bold fa-rainbow fs-1">Manage All Users</label>
            </div>

            <div class="col-12 mt-3">
                <div class="row">
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn btn-warning">Search User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-dark py-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-warning py-2">
                        <span class="fs-4 fw-bold">Profile Image</span>
                    </div>
                    <div class="col-3 col-lg-2 bg-warning py-2">
                        <span class="fs-4 fw-bold text-white">User Name</span>
                    </div>
                    <div class="col-7 col-lg-2 d-lg-block bg-warning py-2">
                        <span class="fs-4 fw-bold">Email</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-warning py-2">
                        <span class="fs-4 fw-bold text-white">Mobile</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-warning py-2">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class=" d-none col-lg-1 bg-white"></div>
                </div>
            </div>

            <?php

            $pageno;
            $query = "SELECT * FROM `user`";

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $user_rs = Database::search($query);
            $user_num = $user_rs->num_rows;

            $results_per_page = 20;
            $number_of_pages = ceil($user_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

                // profile img

                // $profile_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $selected_data["email"] . "'");

                // $profile_data = $profile_rs->fetch_assoc();

                // profile img


            ?>

                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-secondary py-2 text-end">
                            <span class="fs-5 fw-bold text-white"><?php echo $x + 1; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2" onclick="viewMsgModal('<?php echo $selected_data['email']; ?>');">

                            <?php

                            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $selected_data["email"] . "'");
                            $image_num = $image_rs->num_rows;

                            if ($image_num == 1) {

                                $image_data = $image_rs->fetch_assoc();

                            ?>

                                <img src="<?php echo $image_data["path"]; ?>" style="height: 40px; margin-left: 80px;" />

                            <?php

                            } else {

                            ?>

                                <img src="resource/profile_img/us.svg" style="height: 40px; margin-left: 80px;" />

                            <?php

                            }

                            ?>

                        </div>
                        <div class="col-3 col-lg-2 bg-secondary py-2">
                            <span class="fs-6 fw-bold text-white"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                        </div>
                        <div class="col-7 col-lg-2 d-lg-block bg-secondary py-2">
                            <span class="fs-6 fw-bold"><?php echo $selected_data["email"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-secondary py-2">
                            <span class="fs-6 fw-bold text-white"><?php echo $selected_data["mobile"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-secondary py-2">
                            <span class="fs-6 fw-bold"><?php echo $selected_data["joined_date"]; ?></span>
                        </div>
                        <div class="col-12 col-lg-1 py-2 d-grid">

                            <?php

                            if ($selected_data["status"] == 1) {

                            ?>

                                <button class="btn btn-danger" id="ub<?php echo $selected_data['email']; ?>" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Block</button>

                            <?php

                            } else {

                            ?>

                                <button class="btn btn-success" id="ub<?php echo $selected_data['email']; ?>" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Unblock</button>

                            <?php

                            }


                            ?>

                        </div>
                    </div>
                </div>


                <!-- msg modal -->
                <div class="modal" tabindex="-1" id="userMsgModal<?php echo $selected_data['email']; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                            <div class="modal-body" style="overflow-y: scroll; height: 40vh;">

                                <?php

                                $recever_mail = $_SESSION["au"]["email"];
                                $sender_mail = $selected_data["email"];

                                $msg_rs = Database::search("SELECT * FROM `admin_chat` WHERE `user_email`='" . $sender_mail . "'");
                                $msg_num = $msg_rs->num_rows;

                                for ($y = 0; $y < $msg_num; $y++) {
                                    $msg_data = $msg_rs->fetch_assoc();

                                    if ($msg_data["status"] == "2") {

                                ?>

                                        <!-- send -->
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="offset-4 col-8 rounded bg-primary">
                                                    <div class="row">
                                                        <div class="col-12 pt-2">
                                                            <span class="text-white fw-bold fs-4"><?php echo $msg_data["content"]; ?></span>
                                                        </div>
                                                        <div class="col-12 text-end pb-2">
                                                            <span class="text-white fs-6"><?php echo $msg_data["date_time"]; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- send -->

                                    <?php

                                    } else if ($msg_data["status"] == "1") {
                                    ?>

                                        <!-- received -->
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-8 rounded bg-success">
                                                    <div class="row">
                                                        <div class="col-12 pt-2">
                                                            <span class="text-white fw-bold fs-4"><?php echo $msg_data["content"]; ?></span>
                                                        </div>
                                                        <div class="col-12 text-end pb-2">
                                                            <span class="text-white fs-6"><?php echo $msg_data["date_time"]; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- received -->

                                <?php

                                    }
                                }

                                ?>

                            </div>
                            <div class="modal-footer">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="msgtxt">
                                        </div>
                                        <div class="col-3 d-grid">
                                            <button type="button" class="btn btn-primary" onclick="sendAdminMsg('<?php echo $selected_data['email']; ?>');">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- msg modal -->


            <?php

            }

            ?>

            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="<?php if ($pageno <= 1) {
                                                            echo "#";
                                                        } else {
                                                            echo "?page=" . ($pageno - 1);
                                                        } ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php

                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {

                        ?>
                                <li class="page-item active">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                            <?php

                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }

                        ?>

                        <li class="page-item">
                            <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                            echo "#";
                                                        } else {
                                                            echo "?page=" . ($pageno + 1);
                                                        } ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>