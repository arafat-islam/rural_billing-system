<?php
    include "../lib/Session.php";
    Session::init();
    include "../config/config.php";
    include "../lib/Database.php";
    $db = new Database();


    if(!Session::get("userRole") == "admin") {
        header("location: ../login.php");
    } 

    extract($_POST);

 
    $password = md5($_POST['password']);

    $query  = "INSERT INTO users (name, email, password, phone, address, district, userType, meterId) VALUES ('$username', '$email', '$password', '$phone', '$address', '$district', 3, $meterId)";


    $post = $db->insert($query);

    if($post) {
        Session::set("user_added", true);
        header("location: ../users.php");
    }

