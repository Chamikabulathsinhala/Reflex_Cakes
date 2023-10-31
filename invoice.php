<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | eShop</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="img/LOGO.png" />
</head>

<body class="mt-2" style="background-color: #C3B1E1">

    <div class="container-fluid">
        <div class="row">

            <?php

            require "connection.php";

            include "header.php";

            if (isset($_SESSION["u"]) && ($_SESSION["t"])) {

                $umail = $_SESSION["u"]["email"];
                $uid = $_SESSION["t"]["order_id"];
               

                

            ?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12 btn-toolbar justify-content-end">
                    <button class="btn btn-dark me-2" onclick="printInvoice();"><i class="bi bi-printer-fill"></i> Print</button>
                    <button class="btn btn-danger me-2" onclick="create_pdf();"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                </div>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12" id="page">
                    <div class="row">

                        <div class="col-6">
                            <div class="ms-5 invoiceHeaderImage1" ></div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-primary text-decoration-underline text-end">
                                    <h2 style="color: rgb(112, 41, 99);">ReflexCakes</h2>
                                </div>
                                <div class="col-12 fw-bold text-end" style="color: rgb(112, 41, 99);">
                                    <span>Kirulapana, Colombo 06, Sri Lanka</span><br />
                                    <span>+94 77 4000 491</span><br />
                                    <span>ReflexCakes@gmail.com</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 mb-4">
                            <div class="row">

                                <div class="col-6" style="color: rgb(112, 41, 99);">

                                    <h5 class="fw-bold" style="color: rgb(112, 41, 99);">INVOICE TO :</h5>

                                    <?php

                                    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'");
                                    $address_data = $address_rs->fetch_assoc();

                                    ?>

                                    <h2><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h2>
                                    <span><?php echo $address_data["line1"] . ", " . $address_data["line2"]; ?></span><br />
                                    <span><?php echo $umail ?></span>

                                </div>

                                <?php

                                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $uid . "'");
                                $invoice_data = $invoice_rs->fetch_assoc();

                                ?>

                                <div class="col-6 text-end mt-4" style="color: rgb(112, 41, 99);">
                                    <h1 class="text-primary" style="color: rgb(112, 41, 99);">INVOICE 0<?php echo $invoice_data["id"]; ?></h1>
                                    <span class="fw-bold" style="color: rgb(112, 41, 99);">Date & Time of Invoice : </span><br />
                                    <span><?php echo $_SESSION["t"]["date"]; ?></span>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table">

                                <thead>
                                    <tr class="border border-1 border-secondary">
                                        <th>#</th>
                                        <th>Oreder ID & Product</th>
                                        <th class="text-end">Unit Price</th>
                                        <th class="text-end">Quantity</th>
                                        <th class="text-end">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 72px;">
                                        <td style="color: rgb(112, 41, 99);" class="  fs-3"><?php echo $_SESSION["t"]["order_id"]; ?></td>
                                        <td>
                                            <span style="color: rgb(112, 41, 99);" class="fw-bold fs-4   p-2"><?php echo  $_SESSION["t"]["title"]; ?></span><br />

                                            
                                            
                                        </td>
                                        <?php
                                        
                                        $datab_rs = Database::search("SELECT `price` FROM `product` INNER JOIN  `invoice` ON  product.title = invoice.title");
                                        $n = $datab_rs->num_rows;
                                        $product_data = $datab_rs->fetch_assoc();
                                        
                                        ?>
                                        <td style="color: rgb(112, 41, 99);" class="fw-bold fs-4 text-end  ">Rs.<?php echo $product_data["price"]; ?>.00</td>
                                        <td style="color: rgb(112, 41, 99);" class="fw-bold fs-4 text-end "><?php echo  $_SESSION["t"]["qty"]; ?></td>
                                        <td  style="color: rgb(112, 41, 99);" class="fw-bold fs-4 text-end  ">Rs.<?php echo $_SESSION["t"]["total"] *  $_SESSION["t"]["qty"] ?>.00</td>
                                    </tr>
                                </tbody>
                                

                            </table>
                        </div>

                        <div class="col-4 text-center" >
                            <span class="fs-1 fw-bold text-success">Thank You !</span>
                        </div>

                        <div class="col-12 border-start border-5 border-primary mt-3 mb-3 rounded" style="background-color: #e7f2ff;">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <label class="form-label fw-bold fs-5">NOTICE : </label><br />
                                    <label class="form-label fs-6">Purchased items can return befor 7 days of Delivery.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 text-center mb-3">
                            <!-- <label class="form-label fs-5 text-black-50 fw-bold">
                                Invoice was created on a computer and is valid without the Signature and Seal.
                            </label> -->
                        </div>

                    </div>
                </div>


            <?php

            } else {
                # code...
            }

            include "Bfooter.php";

            ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>