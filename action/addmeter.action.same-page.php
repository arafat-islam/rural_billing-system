<?php
    include "../lib/Session.php";
    Session::init();
    include "../config/config.php";
    include "../lib/Database.php";
    $db = new Database();


    if(!Session::get("userRole") == "admin") {
        header("location: ../login.php");
    } 

    $meterName = $_POST['name'];

    if(!empty($meterName)) {
    $get_meter_name = "SELECT * FROM meters WHERE name = '$meterName'";

    $post = $db->select($get_meter_name);


    if($post) {
        Session::set("meter_already_exists", true);
        header("location: ../meters.php");
    } else {
        $query  = "INSERT INTO meters (name) VALUES ('$meterName')";
        $db->insert($query);

        header("location: ../meters.php");
    }
    } else {
        Session::set("meter_name_empty", true);
        header("location: ../meters.php");
    }