<?php

require "connection.php";

session_start();


if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];
    $mobile = $_SESSION["u"]["mobile"];


    if ($_POST["price"]) {

        $price =  $_POST["price"];
        $title = $_POST["title"];
        $qty = $_POST["qty"];
       

        $uid = uniqid();

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `invoice` (`order_id`,`user_email`,`mobile`,`total`,`date`,`qty`,`title`) VALUES ('" . $uid . "' ,'" . $email . "' ,'" . $mobile . "' ,'" . $price . "' ,'" . $date . "' ,'" . $qty . "','" . $title . "' )");

        $data_rs = Database::search("SELECT *  FROM `invoice` WHERE `order_id` = '" . $uid . "' AND `total` = '" . $price . "' ");
        $n = $data_rs->num_rows;
        $dd = $data_rs->fetch_assoc();




        $_SESSION["t"] = $dd;

        echo ("success");
    }
}
