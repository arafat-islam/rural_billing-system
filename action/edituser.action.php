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

    $query  = "UPDATE users SET name = '$username', email = '$email', phone = '$phone', district = '$district', address = '$address', meterId = '$meterId' WHERE id = $userId";

    $post = $db->update($query);

    if($post) {
        Session::set("user_updated", true);
        header("location: ../users.php");
    }

