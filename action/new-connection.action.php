<?php
    include "../lib/Session.php";
    Session::init();
    include "../config/config.php";
    include "../lib/Database.php";
    $db = new Database();


    if(Session::get("userRole") == "admin") {
        header("location: ../login.php");
    } 

    extract($_POST);


    $query = "INSERT INTO new_applications (name, email, phone, district, address) VALUES ('$name', '$email' , '$phone', '$district', '$address')";



    if($db->insert($query)) {
        Session::set("connection_sent", true);
        header('location: ../new-connection.php');
    }


